<?php 
extract($_POST);
extract($_GET);
$search = new search();
$common = new common();

$modelList = array();
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)) {
    $modelList[] = $row;
}

/*Fetch car listings from ebay API*/

$inventoryClass = $auctionClass = '';
if (isset($_GET['products']) && $_GET['products'] == 'products') {
	unset($_SESSION['mysearch']);
	$_SESSION['mysearch'][] = $_GET;
}
if (isset($_GET['products']) && $_GET['products'] == 'inventory') {
	$inventoryClass = 'active';
} else {
	$auctionClass = 'active';
}
if (isset($_REQUEST['manufacturer'])) {
	unset($_SESSION['mysearch']);
	$_SESSION['mysearch'][] = $_REQUEST;
}
extract($_SESSION['mysearch'][0]);


if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
    $getSelectedCarListSQL = "SELECT car_id from wishlist where user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    while($row = mysql_fetch_assoc($result)) {
        $favList[] = $row['car_id'];
    }
}


$where 		 = "&outputSelector(0)=PictureURLLarge";
$searched    = '';
$addtopaging = "?";


include("functions/ebay_functions.php");

$addtopaging1 = '';

if ($_GET) {
	$args = explode("&", $_SERVER['QUERY_STRING']);
	foreach($args as $arg) {
		if($arg == '') continue;
		$keyval = explode("=", $arg);
		if($keyval[0] == "page" ) $addtopaging1 .=  $arg . "&";
		if($keyval[0] == "ipp" )  $addtopaging1  .=  $arg. "&";
		if($keyval[0] != "page" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;
	}	
}


$aspect_count = 0;

if (isset($manufacturer)) {
	
	$searched = '<br>You Searched for ';
	if (isset($manufacturer)) {
		$where .= "&outputSelector(1)=AspectHistogram";                
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Make";
                $manfCount = 0;                
                if (is_array($manufacturer)) {
                    $searched .= ' Manufacturer: <span class="searched">';
                    $manufacturer = array_filter($manufacturer);
                    foreach($manufacturer as $mnf) {
                        $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
                        $manfCount++;
                        if ($manfCount<count($manufacturer)) {
                            $searched .=$mnf.",";
                        }else{
                             $searched .=$mnf;
                        }
                    }
                    $searched .= '</span>';
                }else{
                    $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($manufacturer));
                    $searched .= ' Manufacturer: <span class="searched">'.urldecode($manufacturer).'</span>';
                }		
		
		$dataArray['manufacturer'] = $common->getIdByOptionName(2,urldecode($manufacturer));
		$aspect_count++;
	}
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
	if (isset($model) && $model != '' && $model != 'Not+Specified') {
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Model";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($model));
		$searched .= ', Model: <span class="searched">'.urldecode($model).'</span>';
		$dataArray['carName'] = urldecode($model); 
		$aspect_count++;
	}
	
} else {
	$where .= "&aspectFilter(0).aspectName=Make";
	$where .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
	$where .= "&aspectFilter(0).aspectValueName(1)=Oldsmobile";
	$where .= "&aspectFilter(0).aspectValueName(2)=Buick";
	$where .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
	$where .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
	$where .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
	$where .= "&aspectFilter(0).aspectValueName(6)=Dodge";
	$where .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
	$where .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
	$where .= "&aspectFilter(0).aspectValueName(9)=Ford";
	$where .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
	$where .= "&aspectFilter(0).aspectValueName(11)=GMC";
	$where .= "&aspectFilter(0).aspectValueName(12)=Hummer";
	$where .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
	$where .= "&aspectFilter(0).aspectValueName(14)=Morgan";
	$where .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
	$where .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
	$where .= "&aspectFilter(0).aspectValueName(17)=Porsche";
	$where .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
	$where .= "&aspectFilter(0).aspectValueName(19)=Toyota";
}

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
$val = array('FixedPrice','StoreInventory','AuctionWithBIN');
	
$filterarray[] =  array(
					'name' => 'ListingType',
					'value' => $val,
					'paramName' => '',
					'paramValue' => ''
					);

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


if (!isset($_GET['page'])) {
	$_SESSION['products'] = array();
	$_SESSION['products']['fill'] = true;
	$page = 1;
	$_SESSION['products']['page']    = 8;
	$_SESSION['products']['fillfor'] = 1;
	$common->customQuery("DELETE FROM ".$userTblName);
} else {
	$DbPage = ceil($page/$_SESSION['products']['page']);
	if ($_SESSION['products']['fillfor'] != $DbPage) {
		$_SESSION['products']['fill'] = true;
		$_SESSION['products']['fillfor'] = $DbPage;
	}
}

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
	$apicall .= "&paginationInput.entriesPerPage=90";
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
		
		$ins_str .= "(2, $itemId, \"".mysql_real_escape_string($arr[title])."\", $arr[buyItNowPrice],'".base64_encode(serialize($arr))."'),";	
	}
	
	if ($ins_str != '') {
		$common->customQuery("DELETE FROM ". $userTblName);
		$ins_str = substr($ins_str, 0, strlen($ins_str)-1);
		$query = "INSERT INTO ". $userTblName ." Values " . $ins_str;
		$common->customQuery($query);
	}
	
	$_SESSION['products']['page'] = ceil($dbCarCount/20);
	
	$_SESSION['products']['total'] = $ebay_total + $total_rows;
	$_SESSION['products']['fill']  = false;
}


if ($sort == "") {
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
$pages->items_total = $_SESSION['products']['total'] ;
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


if (count($_GET) == 0 && count($_POST) == 0 && !is_array($_SESSION['mysearch'][0])) {
	$my_file = 'file.txt';
	$handle = fopen($my_file, 'w+') or die('Cannot open file:  '.$my_file);
	fwrite($handle, $pages->items_total);
	fclose($handle);
}




$carPages = new AdminPaginator;

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//

$carPages->default_ipp = 20;
$limit = 20;
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
$all_car = $common->getCarListWithAttr($carPages->limit, array("fullName", "mileage", "price", "features", "description"));	
//print_r($all_car );


