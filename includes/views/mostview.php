<!---********************** carosul 2 **********************-->
<?php
extract($_POST);
extract($_GET);

include_once("functions/ebay_functions.php");
$search = new search();
$common = new common();

$carids = array();
$ebayidExists = array();	
$ebayids = $common->CustomQuery("Select itemid from product_banner order by id asc");
while ($row = mysql_fetch_object($ebayids)) {
   $carids[] = $row->itemid;
}	

$no_exists_carids  = $ebayidExists = array();
$ebayids = $common->CustomQuery("Select itemId from ebay_car where itemId in (" . implode(",", $carids) . ")");

while ($row = mysql_fetch_object($ebayids)) {
   $ebayidExists[] = $row->itemId;
}
		
$no_exists_carids = array_diff($carids, $ebayidExists);

foreach ($no_exists_carids as $insertid) {
	$ebayid = fetchEbayCar($insertid, "save");				
}
$ebayid = $common->CustomQuery("Select * from ebay_car where itemId in (" . implode(",", $carids) . ")");
$item = '';
if (mysql_num_rows($ebayid) > 0) {			
?>
<section class="carousel-2 wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Les annonces de voitures americaines les plus vues:</h1>
      </div>
      <div id="owl-demo" class="mostview owl-carousel">
		  <?php
				while ($data = mysql_fetch_object($ebayid)) {
					$jtemId = $data->itemId;					
					$title  =  $data->title;
					$galleryURL = $data->galleryURL;
					$convertedCurrentPrice = $data->buyItNowPrice;
					if ($galleryURL == '') {
						$galleryURL = LIST_ROOT."/images/default.jpg";
					}
					
		?>
			<div class="item">
			  <div class="row">
				<div class="col-md-12">
				  <img class="lazyOwl" data-src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=130&newHeight=100" alt="<?php echo $title;?>">
				  <div class="car-details-bottom">
					<h6><?php echo substr($title, 0, strpos($title, " ", 35) ? strlen($title) : 35);?></h6>
					<div class="col-md-12 no-padding">
					  <div class="col-md-6 no-padding">
						<h6>Prix :  $ <?php echo $convertedCurrentPrice;?></h6>
					  </div>
					  <div class="col-md-6 product-arrow">
						<a href="<?php echo DEFAULT_URL; ?>/ebay/<?php echo $jtemId; ?>"><i class="fa fa-arrow-right"></i></a>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
	<?php
			
			if ($data->vin == '') {
				$ebayids = fetchEbayCar($jtemId, "update");
			}
		} 	

	?>
      </div>
    </div>
  </div>  
</section>
<?php
	}
?>
<link href="<?php echo DEFAULT_URL; ?>/css/owl.carousel.css" rel="stylesheet">
<script src="<?php echo DEFAULT_URL; ?>/js/owl.carousel.js"></script>

<script type="text/javascript">
$("#owl-demo").owlCarousel({
    items : 5,
    lazyLoad : true,
    navigation : true,
    navigation : true,
    pagination : false,
    navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
  });  
</script>
