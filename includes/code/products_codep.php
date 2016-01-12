<?php 
//Make QueryString Parameters as Variables
extract($_POST);
extract($_GET);
session_start();
if (!isset($_COOKIE['visited'])) { // no cookie, so probably the first time here
	setcookie('visited', 'visited', time()+3600 * 24 * 365);
?>
<script>
$(document).ready(function() {
	$.colorbox({width:"80%", inline:true, href:"#popup"});	
});
</script>
<?php
}
//Init neccessary classes
$common = new common();

//Choosing which tab is selected
$auctionClass = true;
$productTab = true;
if (isset($_GET['products']) && $_GET['products'] == 'inventory') { // Our Inventory Admin
	$auctionClass = false;
	$productTab = false;
}
//Get Wishlist Cars
$favList = array();
if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
    $getSelectedCarListSQL = "SELECT car_id from wishlist where user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    while($row = mysql_fetch_assoc($result)) {
        $favList[] = $row['car_id'];
    }
}
////////////////////////////////////////////// EBAY CARS SECTION //////////////////////////////////////////////////



//Make URL for sorting and paging
$addtopaging = "?";
$addtopaging1 = '';
if($_GET){
    $args = explode("&",$_SERVER['QUERY_STRING']);
    foreach($args as $arg){
        if($arg == '') continue;
        $keyval = explode("=",$arg);
        if($keyval[0] != "page" && $keyval[0] != "products" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;
    }
}
//Start creating request URL from the query string
$aspect_count = 0;
$searched = '<br>You Searched for ';
$where = "&outputSelector(0)=PictureURLLarge&outputSelector(1)=AspectHistogram";
$searchedCar = $searchedModel = '';

//Check if brand selected while search
$where .= "&aspectFilter(".$aspect_count.").aspectName=Make";
if (isset($manufacturer) && $productTab) {
    $manfCount = 0;
    if (is_array($manufacturer)) {
        $searched .= ' Manufacturer: <span class="searched">';
        $manufacturer = array_filter($manufacturer);
        foreach($manufacturer as $mnf) {
            $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
            $manfCount++;
            if($manfCount<count($manufacturer)){
                $searched .=$mnf.",";
                $searchedCar .= "'".$mnf."',";
            }else{
                $searched .=$mnf;
                $searchedCar .= "'".$mnf."'";
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
if (isset($madeYear) && $productTab) {
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
}else{
    if(!isset($search)){
        $where .= "&aspectFilter(".$aspect_count.").aspectName=Model%20Year";
        for($i= 1920,$k = 0;$i <= 1986 ; $i++,$k++) {
            $where .= "&aspectFilter(".$aspect_count.").aspectValueName(".$k.")=".$i;
        }
        $aspect_count++;
    }
}

//Check if model selected while search
if (isset($model) && $model != '' && $model != 'Not+Specified' && $productTab) {
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
if (isset($style) && $style != '' && $style != 'Not+Specified' && $productTab) {
    $where .= "&aspectFilter(".$aspect_count.").aspectName=Style";
    $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($style));
    $searched .= ', Style: <span class="searched">'.urldecode($style).'</span>';
    $dataArray['style'] = urldecode($style); 
    $aspect_count++;
}

//Check if price selected while search
$filterarray = array();
if (isset($price) && ($price[0] != "" || $price[1] != "") && $productTab) {
    $price[0]= ($price[0])?$price[0]:0;
    $price[1]= ($price[1])?$price[1]:0;
    $filterarray[] = array(
                        'name' => 'MaxPrice',
                        'value' => (string)1500,
                        'paramName' => 'Currency',
                        'paramValue' => 'EUR');
    $filterarray[] = array(
                        'name' => 'MinPrice',
                        'value' => (string)0,
                        'paramName' => 'Currency',
                        'paramValue' => 'EUR');
}

//Only Buy It Now Section
$val = array('FixedPrice','StoreInventory','AuctionWithBIN');

$filterarray[] =  array(
					'name' => 'ListingType',
					'value' => $val,
					'paramName' => '',
					'paramValue' => ''
					);

//Get Pagination Parameters
$current_page = 1;
if (isset($_GET['page']) && $productTab) {
    $current_page = $_GET['page'];
}
$limit = 20;
$orderfield='';
$fillfor = true;


// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'car';  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0

function buildURLArray ($filterarray) {
    global $urlfilter;
    global $i;
    foreach($filterarray as $itemfilter) {
        foreach ($itemfilter as $key =>$value) {
            if (is_array($value)) {
                foreach($value as $j => $content) {
                    $urlfilter .= "&itemFilter($i).$key($j)=$content";
                }
            } else {
                if ($value != "") {
                    $urlfilter .= "&itemFilter($i).$key=$value";
                }
            }
        }
        $i++;
    }
    return "$urlfilter";
}

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
$apicall .= "&paginationInput.entriesPerPage=".$limit;
if (isset($page)) {
    $apicall .= "&paginationInput.pageNumber=".$current_page;
}
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "$urlfilter";

//Sorting
$order ='&sortOrder=PricePlusShippingLowest';
if (isset($sort) && $sort != "") {
    $orderBy = explode('~',$sort);
    $order = '';
    if ($orderBy[0] == 'price') {
        if ($orderBy[1] == 'asc'){
            $order ='&sortOrder=CurrentPriceHighest';
        }else{ 
            $order = '&sortOrder=PricePlusShippingLowest';
        }
    }
    $orderfield = '<input type="hidden" name="sort" value="'.$orderBy[0].'~'.$orderBy[1].'">';
    
}
$apicall .= $order;
$apicall .= $where;

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);
$ebay_total = (int)$resp->paginationOutput->totalEntries;
$ebay_arr = array();
foreach($resp->searchResult->item as $item) {
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
    
}

$pages = new Paginator;
$pages->default_ipp = $limit;
$pages->pageUrl = 'products.php';
$pages->tab = 'products';
if(!isset($search)){
    $pages->pageUrl = 'annouce_usa_actuelle';
}
//$pages->extraParam = 'annouce_usa_actuelle';
$pages->items_total = $ebay_total;
$pages->paginate();

$carPages = new Paginator;


//////////////////////////////////////////////OUR INVENTORY SECTION ///////////////////////////////////////////

$invCurPage = 1;
$invPageLimit = 20;
$invSort = "price~asc";
$whereCondition = '';
$first = true;
$carPages->current_page = 1;
$carPages->tab = 'inventory';
if( !$productTab){
    if(isset($page) && $page!=""){
        $invCurPage = $page;
    }
    if (isset($sort) && $sort != "") {
        $invSort = $sort;
    }
    if(isset($manufacturer)){
        $whereCondition .= " make in ('".implode("','",$manufacturer)."')";
        $first = false;
    }
    if(isset($model)){
        if($first){
            $whereCondition .= " model in ('".implode("','",$model)."')";
            $first = false;
        }else{
            $whereCondition .= " and model in ('".implode("','",$model)."')";
        }
    }
    if(isset($madeYear) && $madeYear[0]!="" && $madeYear[1]!=""){
        if($first){
            $whereCondition .= 'year between '. $madeYear[0] .' and '.$madeYear[1] ;
            $first = false;
        }else{
            $whereCondition .= ' and year between '. $madeYear[0] .' and '.$madeYear[1] ;
        }
    }
    if(isset($price) && $price[0]!="" && $price[1]!=""){
        if($first){
            $whereCondition .= 'price between '. $price[0] .' and '.$price[1] ;
            $first = false;
        }else{
            $whereCondition .= ' and price between '. $price[0] .' and '.$price[1] ;
        }
    }
    if(isset($page)){
        $carPages->current_page = $page;
    }
}
$invOrderBy = explode('~',$invSort);

$carPages->default_ipp = $invPageLimit;
$carPages->pageUrl = 'products.php';
if(!isset($search)){
    $carPages->pageUrl = 'notre_inventaire';
}

$eu = $invPageLimit * ($invCurPage-1) ;
$inventoryTotalRows = $common->numberOfRows('car_flat', $whereCondition); //number of rows in pages table

$addCarToQuery = '';

$carPages->items_total  = $inventoryTotalRows;
$carPages->paginate();

$all_cars = $common->read('car_flat', $whereCondition,$invOrderBy[0]." ".$invOrderBy[1]." LIMIT 0, ".$invPageLimit);
$all_car = array();
while($row = mysql_fetch_array($all_cars)){
    $all_car[] = $row;
}
