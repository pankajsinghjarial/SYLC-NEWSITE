<?php
$limit = 10;

$apicall ='';
// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$j = '0';  // Initialize the item filter index to 0
$filterarrays = array();
// Create a PHP array of the item filters you want to use in your request
$filterarrays =
array(
		array(
				'name' => 'MaxPrice',
				'value' => '10000000',
				'paramName' => 'Currency',
				'paramValue' => 'USD',
				//'paramName' => 'itemid',
				//'paramValue' => '272064815498'
				),
		/*array(
				'name' => 'ListingType',
				'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
				'paramName' => '',
				'paramValue' => ''),*/
);

function buildURLArrays ($filterarray) {
	  global $mosturlfilter;
	  global $j;
	  // Iterate through each filter in the array
	  foreach($filterarray as $jtemfilter) {
		// Iterate through each key in the filter
		foreach ($jtemfilter as $key =>$value) {
		  if (is_array($value)) {
			foreach($value as $j => $content) { // Index the key for each value
			  $mosturlfilter .= "&itemFilter($j).$key($j)=$content";
			}
		  }
		  else {
			if ($value != "") {
			  $mosturlfilter .= "&itemFilter($j).$key=$value";
			}
		  }
		}
		$j++;
	  }
	  
	  return "$mosturlfilter";
	} // End of buildURLArray function
// Build the indexed item filter URL snippet
buildURLArrays($filterarrays);

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsAdvanced";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&categoryId=6001";
$apicall .= "&paginationInput.entriesPerPage=".$limit;
$apicall .= "&aspectFilter(0).aspectName=Make";
$apicall .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
$apicall .= "&aspectFilter(0).aspectValueName(1)=Aston+Martin";
$apicall .= "&aspectFilter(0).aspectValueName(2)=Buick";
$apicall .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
$apicall .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
$apicall .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
$apicall .= "&aspectFilter(0).aspectValueName(6)=Dodge";
$apicall .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
$apicall .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
$apicall .= "&aspectFilter(0).aspectValueName(9)=Ford";
$apicall .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
$apicall .= "&aspectFilter(0).aspectValueName(11)=GMC";
$apicall .= "&aspectFilter(0).aspectValueName(12)=Hummer";
$apicall .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
$apicall .= "&aspectFilter(0).aspectValueName(14)=Morgan";
$apicall .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
$apicall .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
$apicall .= "&aspectFilter(0).aspectValueName(17)=Porsche";
$apicall .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
$apicall .= "&aspectFilter(0).aspectValueName(19)=Toyota";
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "$mosturlfilter";
$apicall .= '&sortOrder=EndTimeSoonest&outputSelector=PictureURLLarge';

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);
$j = 0;
if ($resp->ack == "Success") {

	foreach( $resp->searchResult->item as $jtem ) {

		$j++;
		$jtemId = $jtem->itemId;
		$title = $jtem->title;
		$galleryURL = $jtem->pictureURLLarge;
		$convertedCurrentPrice = $jtem->sellingStatus->convertedCurrentPrice;
		if ($galleryURL == ''){
			$galleryURL = LIST_ROOT."/images/default.jpg";
		}
		if ($j == 1 ) {
			echo '<div class="item active">
			<div class="row">';
		}
		if ($j == 6) {
			echo '<div class="item">
			<div class="row">';
		}
		
		$class =  '';
		if ($j == 1 || $j == 6) {
			$class = 'col-md-offset-1 col-sm-3';
		}
		if ($j == 5 || $j == 10) {
			$class = 'hidden-xs hidden-sm col-sm-2';
		}
?>		 
		
		  <div class="col-md-2   <?php echo $class;?> no-padding1">
			<a href="<?php echo DEFAULT_URL ?>/ebay/<?php echo $jtemId;?>">
				<img alt="<?php echo $title;?>"
			src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=130&newHeight=100" class="img-responsive"></a>
			<div class="car-details-bottom">
			  <h6><?php echo substr($title, 0, 30);?></h6>
			  <h6>Prix :  $ <?php echo $convertedCurrentPrice;?></h6>
			</div>
		  </div>             
		         
<?php
		if ($j == 5 || $j == 10) {
			echo '</div>
				</div>';
		}
	}
} else {
 ?>
<li><span class="img_txt">No record found.</span></li>
<?php
	} 
/*
 * extract($_POST);
extract($_GET);
$search = new search();
$common = new common();
$carid = "151881383829";
include("functions/ebay_functions.php");


$ebayid = $common->CustomQuery("Select * from ebay_car where itemId = ".$carid);
$item = '';
if(mysql_num_rows($ebayid) > 0){
	$item = mysql_fetch_object($ebayid);
	//echo "<pre>";print_r($item);die;
	if($item->vin == ''){
		$ebayid = fetchEbayCar($carid, "update");
	}
	
}
else{
	$ebayid = fetchEbayCar($carid,"save");
	$item = mysql_fetch_object($ebayid);
}

*/
