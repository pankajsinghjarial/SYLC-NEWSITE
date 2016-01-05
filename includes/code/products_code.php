<?php 
//Make QueryString Parameters as Variables
extract($_POST);
extract($_GET);
//Init neccessary classes
$search = new search();
$common = new common();

//Choosing which tab is selected
$auctionClass = true;
if (isset($_GET['products']) && $_GET['products'] == 'products') { //Buy Now API Default
	unset($_SESSION['mysearch']);
	$_SESSION['mysearch'][] = $_GET;
}
if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == "/notre_inventaire") { // Our Inventory Admin
	$auctionClass = false;
}

//Checking if Brand Selected
//~ if (isset($_REQUEST['manufacturer'])) {
	//~ unset($_SESSION['mysearch']);
	//~ $_SESSION['mysearch'][] = $_REQUEST;
//~ }

//Check if search is done previously and stored in session
//~ if(isset($_SESSION['mysearch'][0])){
    //~ extract($_SESSION['mysearch'][0]);
//~ }

//Get Wishlist Cars
//~ if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
    //~ $getSelectedCarListSQL = "SELECT car_id from wishlist where user_id = ".$_SESSION['User']['id'];
    //~ $result = mysql_query($getSelectedCarListSQL);
    //~ while($row = mysql_fetch_assoc($result)) {
        //~ $favList[] = $row['car_id'];
    //~ }
//~ }

/*Fetch car listings from ebay API*/
//Start creating request URL from the query string
$where 		 = "&outputSelector(0)=PictureURLLarge";
$searched    = '';

//Make URL for sorting and paging
$addtopaging = "?";
include("functions/ebay_functions.php");
$addtopaging1 = '';
if($_GET){
    $args = explode("&",$_SERVER['QUERY_STRING']);
    foreach($args as $arg){
        if($arg == '') continue;
        $keyval = explode("=",$arg);
        if($keyval[0] != "page" && $keyval[0] != "products" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;
    }
}

$aspect_count = 0;
$searched = '<br>You Searched for ';
$where .= "&outputSelector(1)=AspectHistogram";
$searchedCar = $dataId = $searchedModel = '';
//Check if brand selected while search
$where .= "&aspectFilter(".$aspect_count.").aspectName=Make";
if (isset($manufacturer)) {
    $manfCount = 0;                
    if (is_array($manufacturer)) {
        $searched .= ' Manufacturer: <span class="searched">';
        $manufacturer = array_filter($manufacturer);
        foreach($manufacturer as $mnf) {
            $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
            $manfCount++;
            if ($manfCount<count($manufacturer)) {
                $searched .=$mnf.",";
                $searchedCar .=$mnf.",";
                $dataId .= $common->getIdByOptionName(2,urldecode($mnf));
                $dataId .= ',';
            }else{
                 $searched .=$mnf;
                 $searchedCar .=$mnf;
                 $dataId .= $common->getIdByOptionName(2,urldecode($mnf));
            }
        }
        $searched .= '</span>';
    }else{
        $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($manufacturer));
        $searched .= ' Manufacturer: <span class="searched">'.urldecode($manufacturer).'</span>';
    }
    $dataArray['manufacturer'] = $common->getIdByOptionName(2,urldecode($manufacturer));
    $aspect_count++;
}else{
    $manfCount = 0;
    foreach(unserialize(MAKE_LIST) as $mnf) {
        $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
        $manfCount++;
    }
    $aspect_count++;
}

//Check if Year range selected while search
if (isset($madeYear)) {
    $madeYearArr = array_filter($madeYear);
    if (count($madeYearArr) == 2) {
        if ($madeYearArr[0] < $madeYearArr[1]) {
            $madeYearStr = 	$madeYearArr[0]."-".substr($madeYearArr[1],2);
            $where .= "&aspectFilter(".$aspect_count.").aspectName=Model%20Year";
            for($i= $madeYearArr[0],$k = 0;$i <= $madeYearArr[1] ; $i++,$k++) {
                $where .= "&aspectFilter(".$aspect_count.").aspectValueName(".$k.")=".$i;
            }
            $searched .= ', Year: <span class="searched">'.$madeYearStr.'</span>';
            $dataArray['madeYear'] = $madeYearArr;
            $aspect_count++;
        }
    }
    else if (count($madeYearArr) == 1) {
        $madeYearStr = 	$madeYearArr[0];
        $where .= "&aspectFilter(".$aspect_count.").aspectName=Model+Year";
        $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".$madeYearStr;
        $searched .= ', Year: <span class="searched">'.$madeYearStr.'</span>';
        $dataArray['madeYear'] = $madeYearArr;
        $aspect_count++;
    }
}

//Check if model selected while search
if (isset($model) && $model != '' && $model != 'Not+Specified') {
    $where .= "&aspectFilter(".$aspect_count.").aspectName=Model";
    $manfCount = 0;                
    if (is_array($model)) {
        $searched .= ' Model: <span class="searched">';
        $manufacturer = array_filter($model);
        foreach($model as $mnf) {
            $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
            $manfCount++;
            if ($manfCount<count($model)) {
                $searched .=$mnf.",";
                $searchedModel .="'".$mnf."'".",";
            }else{
                 $searched .=$mnf;
                 $searchedModel .="'".$mnf."'";
            }
        }
        $searched .= '</span>';
    }else{
        $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($model));
        $searched .= ', Model: <span class="searched">'.urldecode($model).'</span>';
    }
    $dataArray['carName'] = urldecode($model); 
    $aspect_count++;
}

//Check if style selected while search
if (isset($style) && $style != '' && $style != 'Not+Specified') {
    $where .= "&aspectFilter(".$aspect_count.").aspectName=Style";
    $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($style));
    $searched .= ', Style: <span class="searched">'.urldecode($style).'</span>';
    $dataArray['style'] = urldecode($style); 
    $aspect_count++;
}

//Check if price selected while search
$filterarray = array();
if (isset($price) && $price != '') {
	$price = explode('~', $price);	
	$filterarray[] = array(
						'name' => 'MaxPrice',
						'value' => (string)($price[1] * 1000),
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	$filterarray[] = array(
						'name' => 'MinPrice',
						'value' => (string)($price[0] * 1000),
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	
	$searched .= " with price range <span class=\"searched\"> $".$price[0] * 1000 ." USD  to $".$price[1] * 1000 ." USD </span>";	
	$dataArray['price'] = array('0'=>(int)$price[0]*1000,'1'=>(int)$price[1]*1000);
}

//Only Buy It Now Section
$val = array('FixedPrice','StoreInventory','AuctionWithBIN');

$filterarray[] =  array(
					'name' => 'ListingType',
					'value' => $val,
					'paramName' => '',
					'paramValue' => ''
					);

//Create Table for cache
$userTblName = 'temp_'.$_SESSION['unique_id'][0];

if (!isset($_SESSION['products'])) {
    $common->customQuery('DROP TABLE IF EXISTS `'.$userTblName.'`');
    $common->customQuery('CREATE TABLE `'.$userTblName.'` (
                            `type` int(10) NOT NULL,
                            `itemId` bigint(20) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `Price` float NOT NULL,
                            `content` longtext
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1');
    $common->customQuery('INSERT INTO master_temp (user_id, tbl_name, lastAct) VALUES ("'.$_SESSION['unique_id'][0].'","'.$userTblName.'",'.getCurrentTimestamp().')');
}

//Get Pagination Parameters
if (!isset($_GET['page'])) {
	$_SESSION['products'] = array();
	$_SESSION['products']['fill'] = true;
	$page = 1;
	$_SESSION['products']['page']    = 8;
	$_SESSION['products']['fillfor'] = 1;
	$common->customQuery("DELETE FROM ".$userTblName);
} else {
	if ($_SESSION['products']['fillfor'] != $_GET['page']) {
		$_SESSION['products']['fill'] = true;
		$_SESSION['products']['fillfor'] = $_GET['page'];
	}
}
$orderfield='';
if ($_SESSION['products']['fill']) {
	
	$fillfor = $_SESSION['products']['fillfor'];

	// API request variables
	$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
	$version = '1.0.0';  // API version supported by your application
	$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
	$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
	$query = 'car';  // You may want to supply your own query
	$safequery = urlencode($query);  // Make the query URL-friendly
	$i = '0';  // Initialize the item filter index to 0
	
	
		// Create a PHP array of the item filters you want to use in your request
	// Generates an indexed URL snippet from the array of item filters
	function buildURLArray ($filterarray) {
	  global $urlfilter;
	  global $i;
	  // Iterate through each filter in the array
	  foreach($filterarray as $itemfilter) {
		// Iterate through each key in the filter
		foreach ($itemfilter as $key =>$value) {
		  if (is_array($value)) {
			foreach($value as $j => $content) { // Index the key for each value
			  $urlfilter .= "&itemFilter($i).$key($j)=$content";
			}
		  }
		  else {
			if ($value != "") {
			  $urlfilter .= "&itemFilter($i).$key=$value";
			}
		  }
		}
		$i++;
	  }
	  
	  return "$urlfilter";
	} // End of buildURLArray function

	// Build the indexed item filter URL snippet
	buildURLArray($filterarray);

	// Construct the findItemsByKeywords HTTP GET call 
	$apicall = "$endpoint?";
	$apicall .= "OPERATION-NAME=findItemsAdvanced";
	$apicall .= "&SERVICE-VERSION=$version";
	$apicall .= "&SECURITY-APPNAME=$appid";
	$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
	$apicall .= "&GLOBAL-ID=$globalid";
	$apicall .= ($where == '') ? "&keywords=$safequery": '' ;
	$apicall .= "&categoryId=6001";
	$apicall .= "&paginationInput.entriesPerPage=20";
	if (isset($page)) {
		$apicall .= "&paginationInput.pageNumber=".$fillfor;
	}
	$apicall .= "&sellingStatus.sellingState=Active";
	$apicall .= "&descriptionSearch=true";
	$apicall .= "$urlfilter";
	if (isset($sort) && $sort != '') {
		$orderBy = explode('~',$sort);
		$order = '';
		if ($orderBy[0] == 'buyItNowPrice') {
			if ($orderBy[1] == 'asc') $order ='&sortOrder=CurrentPriceHighest';
			else $order = '&sortOrder=PricePlusShippingLowest';
		}
		if ($orderBy[0] == 'time') {
			if ($orderBy[1] == 'asc') $order ='&sortOrder=EndTimeSoonest';
			else $order = '&sortOrder=StartTimeNewest';
		}
		
		$orderfield = '<input type="hidden" name="sort" value="'.$orderBy[0].'~'.$orderBy[1].'">';
		$apicall .= $order;
	}
	$apicall .= $where;

	// Load the call and capture the document returned by eBay API
	$resp = simplexml_load_file($apicall);

	$ebay_total = (int)$resp->paginationOutput->totalEntries; 
	
	
	$ins_str = '';
	$ebay_arr = array();
    $dbCarCount = 0;
	foreach($resp->searchResult->item as $item) {
		$dbCarCount++;
		
		$itemId = (string)$item->itemId;
		$link   = $item->viewItemURL;
		$postalCode = $item->postalCode;
		$location   = $item->location;
		$country    = $item->country;
		$listingType = $item->listingInfo->listingType;
		$buyItNowAvailable = $item->listingInfo->buyItNowAvailable;
		$buyItNowPrice = $item->sellingStatus->convertedCurrentPrice;
		if ($item->listingInfo->buyItNowAvailable == 'true') {
			$buyItNowPrice = $item->listingInfo->buyItNowPrice;
			$buyItNowAvailable = 1;
		}
		else{
			$buyItNowAvailable = 0;
		}
		
		$time = convertTimeLeft($item->sellingStatus->timeLeft);
		$endson = $item->listingInfo->endTime;
		$endtimestamp = strtotime($endson);
		$galleryURL = (isset($item->galleryPlusPictureURL)) ? $item->galleryPlusPictureURL : $item->pictureURLLarge;
				
		
		$forward_str = "&title=".urlencode($item->title)."&buyItNowPrice=".$buyItNowPrice."&postalCode=".$postalCode."&location=".urlencode($location)."&listingType=".$listingType."&endson=".$endson."&endtimestamp=".$endtimestamp."&buyItNowAvailable=".$buyItNowAvailable;
		
		$arr = array(
				"link"=>DEFAULT_URL."/ebay/".$itemId,
				"time"=>$time,
				"title" => (string)$item->title,
				"buyItNowPrice" => (int)$buyItNowPrice,
				"galleryURL" => (string)$galleryURL,
				"forward_str" => $forward_str
				);
				
		$ebay_arr[$itemId] = $arr;	
		
		$ins_str .= "(2, $itemId, \"".mysql_real_escape_string($arr['title'])."\", $arr[buyItNowPrice],'".base64_encode(serialize($arr))."'),";	
	}
	
	if ($ins_str != '') {
		$common->customQuery("DELETE FROM ". $userTblName);
		$ins_str = substr($ins_str, 0, strlen($ins_str)-1);
		$query = "INSERT INTO ". $userTblName ." Values " . $ins_str;
		$common->customQuery($query);
	}
	
	$_SESSION['products']['page'] = ceil($dbCarCount/20);
	
	$_SESSION['products']['total'] = $ebay_total;
	$_SESSION['products']['fill']  = false;
}


if (!isset($sort)) {
	$now_sort  = "price";
	$now_order = "ASC";
} else {
	$oder = explode("~",$sort);
	$now_sort  = $oder[0];
	$now_order = $oder[1];
}
$num = $common->numberOfRows($userTblName);
if (!isset($_GET['page'])) {
	$page = 1;
}
$pages = new Paginator;
$pages->default_ipp = 20;
$pages->pageUrl = 'annouce_usa_actuelle';
$pages->extraParam = 'annouce_usa_actuelle';
$pages->items_total = $_SESSION['products']['total'];
$pages->paginate();

if ($num != 0) {
	if ( $page % $_SESSION['products']['page'] == 0) {
		$startLim = ( $_SESSION['products']['page'] - 1 ) * 20;
	}  
	else{
		$startLim = ( ( $page % $_SESSION['products']['page'] ) - 1 ) * 20;
	}
	
	$list = $common->customQuery("SELECT * FROM ".$userTblName." ORDER BY $now_sort $now_order LIMIT $startLim ,20");
	
	if (!isset($cars_arr) && !isset($ebay_arr)) {
		$cars_arr = array();
		$ebay_arr = array();
		while($resource_data = mysql_fetch_object($list)) {
			if ($resource_data->type == 1) {
				$cars_arr[$resource_data->itemId] = unserialize(base64_decode($resource_data->content));
			}
			elseif ($resource_data->type == 2) {
				$ebay_arr[$resource_data->itemId] = unserialize(base64_decode($resource_data->content));
			}
		}
		mysql_data_seek($list, 0);
	}
}


$carPages = new Paginator;

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//

$carPages->default_ipp = 20;
$carPages->pageUrl = 'notre_inventaire';
$carPages->extraParam = 'notre_inventaire';
$limit = 20;

$carPages->current_page = 1;

$eu = $limit * ($page-1) ;

$total_rows = $common->numberOfRows('car');

if (isset($_GET['field'])and $_GET['field']!='') {
	$field = $_GET['field'];
} else {
	$field = 'car_id';
}
if (isset($_GET['orderBy'])and $_GET['orderBy']!='') {
	$orderby = $_GET['orderBy'];
}else{
	$orderby = 'ASC';
}

$total_rows = $common->numberOfRows('car'); //number of rows in pages table

$addCarToQuery = '';

$carPages->items_total  = $common->total_getCarListWithAttr();
$carPages->paginate();
$fromYear = $_GET['madeYear'][0];
if($fromYear == '') {
	$fromYear = 1920;
}
$toYear   = $_GET['madeYear'][1];
if($toYear == '') {
	$toYear = 2017;
}
$all_car = $common->getSearchCarListWithAttr('limit '.$limit, array("fullName", "mileage", "price", "features", "description"), $dataId, "2~int~4~".$fromYear."~".$toYear,$searchedModel);
