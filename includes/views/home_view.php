<!--Search scripts-->
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/home_functions.js"></script>
<!--css-->
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/jquery.multiselect.css" />
<!--slider-->
<script src="<?php echo DEFAULT_URL ?>/js/bootstrap.min.js"></script>

<!--header-bg Section start  -->
<section class="header-bg"></section>

<!--Social widget start  -->
<div class="rightTabs wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
  <ul>
    <li>
		<a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=Florida%2Cmarion+&amp;p[summary]=Zunis+Top+10+page+is+the+best+place+to+view+offers+and+discounts+for+Marion+County+in+the+state+of+Florida.Visit+Zunis+Top+10+Page+for+the+latest+coupons+and+local+savings+offers+for+Marion+County+in+the+state+of+Florida+.&amp;p[url]=https://zuni.com/state/florida/marion&amp;&amp;p[images][0]=https://zuni.com/img/front/zuni_logo.png', 'sharer', 'toolbar=0,status=0,width=500,height=400,top=160,left=390');" href="javascript: void(0)" title="Click to share on facebook"><img src="images/facebook.png"></a>
    </li>
    <li>
		<a href=""><img src="images/youtube-new-logo.png"></a>
    </li>
  </ul>
</div>

<?php
    /*search box*/
	include(LIST_ROOT."/includes/views/inc/search.php");
?>   

<section class="car-details">
  <div class="container">
    <h1 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">Les voitures americaines ça se passe chez Sylc Export</h1>
  

    <div class="col-md-12">
      <h2 class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">Recherche Rapide:</h2>
              <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
                  
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1default" data-toggle="tab">Type</a></li>
                      <li class="marque"><a href="#tab2default" data-toggle="tab">Marque</a></li>
                  </ul>
                 
                  <div class="panel-body no-padding">
                      <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab1default">
                            <div class="col-md-12 no-padding car-imgs1">
                              <div class="col-md-3 no-padding">
                                <a title="PONY" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Chevrolet&manufacturer[]=Ford&manufacturer[]=Pontiac&manufacturer[]=Mercury&model[]=Mustang&model[]=Camaro&model[]=cougar&model[]=Firebird&madeYear[]=1965&madeYear[]=1968"><img src="images/pony-car.png" class="img-responsive"></a>
                                <a title="PONY" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Chevrolet&manufacturer[]=Ford&manufacturer[]=Pontiac&manufacturer[]=Mercury&model[]=Mustang&model[]=Camaro&model[]=cougar&model[]=Firebird&madeYear[]=1965&madeYear[]=1968"><h3>PONY</h3></a>
                              </div>
                              <div class="col-md-3 no-padding">
                                <a title="Muscle Car" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Dodge&manufacturer[]=Chevy&model[]=Mustang&model[]=Charger&model[]=cougar&model[]=Challenger&model[]=Chevelle&madeYear[]=1965&madeYear[]=1973"><img src="images/muscl-car.png" class="img-responsive"></a>
                                <a title="Muscle Car" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Dodge&manufacturer[]=Chevy&model[]=Mustang&model[]=Charger&model[]=cougar&model[]=Challenger&model[]=Chevelle&madeYear[]=1965&madeYear[]=1973"><h3>Muscle Car</h3></a>
                              </div>
                              <div class="col-md-3 no-padding">
                                <a title="Pick ups" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Chevy&manufacturer[]=Chevrolet&manufacturer[]=GMC&model[]=Pickup&model[]=Other Pickups&madeYear[]=1940&madeYear[]=1979"><img src="images/pick-car.png" class="img-responsive"></a>
                                <a title="Pick ups" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Chevy&manufacturer[]=Chevrolet&manufacturer[]=GMC&model[]=Pickup&model[]=Other Pickups&madeYear[]=1940&madeYear[]=1979"><h3>Pick ups</h3></a>
                                
                              </div>
                              <div class="col-md-3 no-padding">
                                <a title="Cabriolet" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Chevy&manufacturer[]=Corvette&manufacturer[]=Cadillac&manufacturer[]=Buick&model[]=Thunderbird&model[]=Mustang&model[]=Camaro&model[]=C1&model[]=C2&model[]=C3&model[]=Eldorado&model[]=Riviera&model[]=Model A&madeYear[]=1920&madeYear[]=1980"><img src="images/cab-car.png" class="img-responsive"></a>
                                <a title="Cabriolet" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&manufacturer[]=Chevy&manufacturer[]=Corvette&manufacturer[]=Cadillac&manufacturer[]=Buick&model[]=Thunderbird&model[]=Mustang&model[]=Camaro&model[]=C1&model[]=C2&model[]=C3&model[]=Eldorado&model[]=Riviera&model[]=Model A&madeYear[]=1920&madeYear[]=1980"><h3>Cabriolet</h3></a>
                              </div>
                            </div>
                            <div class="col-md-12 no-padding car-imgs2">
                              <div class="col-md-3 no-padding">
                                <a title="SEDAN" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Chevrolet&manufacturer[]=Cadillac&manufacturer[]=Buick&style[]=Sedan&madeYear[]=1920&madeYear[]=1960"><img src="images/sedan-car.png" class="img-responsive"></a>
                                <a title="SEDAN" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Chevrolet&manufacturer[]=Cadillac&manufacturer[]=Buick&style[]=Sedan&madeYear[]=1920&madeYear[]=1960"><h3>SEDAN</h3></a>
                              </div>
                              <div class="col-md-3 no-padding">
                                <a title="HOT ROD" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&model[]=Model A&model[]=Model T&madeYear[]=1920&madeYear[]=1960"><img src="images/hot-car.png" class="img-responsive"></a>
                                <a title="HOT ROD" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Ford&model[]=Model A&model[]=Model T&madeYear[]=1920&madeYear[]=1960"><h3>HOT ROD</h3></a>
                              </div>
                              <div class="col-md-3 no-padding">
                               <a title="Porsche US" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Porsche&model[]=911&model[]=356&madeYear[]=1956&madeYear[]=1986"><img src="images/porsche-car.png" class="img-responsive"></a>
                                <a title="Porsche US" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Porsche&model[]=911&model[]=356&madeYear[]=1956&madeYear[]=1986"><h3>Porsche US</h3></a>
                               
                              </div>
                              <div class="col-md-3 no-padding">
                                <a title="Mercedes US" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Mercedes-Benz&madeYear[]=1950&madeYear[]=1986"><img src="images/merceds-car.png" class="img-responsive"></a>
                                <a title="Mercedes US" href="<?php echo DEFAULT_URL ?>/products.php?products=products&manufacturer[]=Mercedes-Benz&madeYear[]=1950&madeYear[]=1986"><h3>Mercedes US</h3></a>
                                
                              </div>
                            </div>
                            <div class="col-md-12 see-more-btn">
                              <div class="col-md-2 col-md-offset-5 no-padding">
                                <p class="toggle-btn" id="show"> VOIR PLUS DE TYPE<br><i class="fa fa-angle-down" id="voir-icon"></i>
                                </p>
                                <p class="toggle-btn" id="hide"> VOIR MOINS DE TYPE<br><i class="fa fa-angle-up" id="voir-icon"></i>
                                </p>
                              </div>
                              <div class="voir-border"></div>
                            </div>
                          </div>
                        
                          <div class="tab-pane fade" id="tab2default">
                            <?php $searchUrl = DEFAULT_URL."/products.php?products=products&";?>
                            <div class="col-md-12 tabs-2">
                              <div class="col-md-3">
                                <ul class="list-unstyled">
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Alfa+Romeo&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Alfa Romeo</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Bentley&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Bentley</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Chevrolet&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Chevrolet</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=DeSoto&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> DeSoto</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Ferrari&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Ferrari</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Jaguar&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Jaguar</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Maserati&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Maserati</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Nissan&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Nissan</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Porsche&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Porsche</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Shelby&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Shelby</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Volkswagen&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Volkswagen</li>
                                  
                                </ul>
                              </div>
                              <div class="col-md-3">
                                <ul class="list-unstyled">
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=AMC&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> AMC</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=BMW&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> BMW</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Chrysler&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Chrysler</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=De+Tomaso&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> De Tomaso</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Fiat&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> FIAT</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Jeep&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Jeep</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=McLaren&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> McLaren</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Oldsmobile&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Oldsmobile</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Ram&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> RAM</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Studebaker&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Studebaker</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Willys&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Willys</a></li>
                                </ul>
                              </div>
                              <div class="col-md-3">
                                <ul class="list-unstyled">
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Aston+Martin&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Aston Martin</li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Buick&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Buick</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Datsun&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Datsun</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Dodge&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Dodge</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Ford&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Ford</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Lamborghini&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Lamborghini</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Mercedes-Benz&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Mercedes-Benz</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Plymouth&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Plymouth</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Replica%20%26%20Kit%20Makes&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Replica</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Triumph&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Triumph</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Zimmer&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Zimmer</a></li>
                                </ul>
                              </div>

                              <div class="col-md-3">
                                <ul class="list-unstyled">
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Audi&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Audi</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Cadillac&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Cadillac</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=DeLorean&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> DeLorean</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Excalibur&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Excalibur</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=GMC&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> GMC</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Lincoln&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Lincoln</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Mercury&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Mercury</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Pontiac&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Pontiac</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=Rolls-Royce&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> Rolls-Royce</a></li>
                                  <li><a href="<?php echo $searchUrl.'manufacturer[]=TVR&madeYear[]=1920&madeYear[]=1986' ?>"><i class="fa fa-chevron-circle-right"></i> TVR</a></li>
                                </ul>
                              </div>
                            </div>

                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
     </div>
  </section>

  <section class="export">
    <div class="container">
      <div class="row">
        <?php echo $content;?>
      </div>
    </div>
  </section>

<!--************ slider ***********-->

  <div id="mySlider" class="carousel slide hidden-xs wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">
			<?php
				/*fetch banners*/
				if ($totalBanners > 0) {
					$i = 0;				
					while($i < $totalBanners) {
					
						$class = "";
						if ($i == 1) {
							$class = "active";
						}					
			?>
				<li data-target="#mySlider" data-slide-to="<?php echo $i;?>" class="<?php echo $class;?>"></li>
           <?php
						$i++;
					}
				}
           ?>         
        </ol>
        <!-- Wrapper for slides -->
        <?php
			if ($totalBanners > 0) {
		?>
         <div class="carousel-inner" role="listbox">
			<?php 				
					$ii = 1;
				
					while($getPageData = mysql_fetch_object($allBanner)) {
					
						$class = "";
						if ($ii == 1) {
							$class = "active";
						}
			?>
						<div class="item <?php echo $class;?>">
						  <img src="<?php echo DEFAULT_URL. '/images/home/banner/' . $getPageData->banner_image;?>" alt="Slider Image 1">
						  <div class="carousel-caption">
							<p class="lead"><?php echo $getPageData->content;?></p>   
						  </div>
						</div>
            <?php
						$ii++;
					}
			
			?>           
        </div>
        <!-- Controls -->
        <a class="left carousel-control keru-l-one" href="#mySlider" role="button" data-slide="prev">
            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control keru-l-two" href="#mySlider" role="button" data-slide="next">
            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <?php
		}
		?>
    </div>

<?php include(LIST_ROOT."/includes/views/mostview.php"); ?>
<!-- ******************* parallex  Section start******************-->

<section class="parallex" style="background: url('<?php echo '/images/home/'.$realFactBackgroundImage;?>')no-repeat fixed center center / cover;">
  <div class="container">
    <div class="row">
		<?php echo $realFactsContent;?>
     <form class="form-inline wow fadeInDown" name="realfact" id="addvalidation" method="post" data-wow-duration="2s" data-wow-delay=".5s">

        <div class="col-md-4 col-sm-12 col-xs-12 form-group no-padding">
          <input type="text" class="form-control" id="exampleInputEmail3" name="fname" placeholder="Nom">
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12 form-group email">
          <input type="text" class="form-control" id="exampleInputPassword3" name="email" placeholder="Email">
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12 form-group no-padding">
          <input type="text" class="form-control" id="exampleInputPassword3" name="phone" placeholder="Phone">
        </div>
        

        <div class="col-md-12 form-group no-padding">
          <div class="col-md-10 col-sm-12 col-xs-12 no-padding">
            <input type="text" class="form-control" id="inputPassword3" name="comment" placeholder="Comments">            
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
			<input type="hidden" id="realfactform" name="realfactform" value="reafacts">
            <button type="submit" name=realfactsub" class="btn btn-default">Envoyez <i class="fa fa-angle-right"></i></button>
          </div>
        </div>

        <div class="checkbox">
          <label id="checkcover">
            <input type="checkbox" value="1" name="accept">
            J'ai lu et j'accepte expréssement la <a href=""> politique de confidentialité</a>
          </label>
        </div>
      </form>

    </div>
  </div>
</section>

<!-- ******************* parallex  Section End ******************-->

<!-- ******************* video Section End ******************-->

<?php

$channelName = 'yoathome';
$Apikey = 'AIzaSyAp_iOTFoV4bo_Y9eVNim-lX_AqTE56O40';
$ChannelUrl  = 'https://www.googleapis.com/youtube/v3/channels?key='.$Apikey.'&forUsername='.$channelName.'&part=contentDetails';
$Channeljson = file_get_contents($ChannelUrl);
$Channelobj = json_decode($Channeljson);
$channelID = $Channelobj->items[0]->id;
$channeluploadID = $Channelobj->items[0]->contentDetails->relatedPlaylists->uploads;

//$url  = 'https://www.googleapis.com/youtube/v3/search?part=snippet&order=date&channelId='.$channeluploadID.'&key='.$Apikey;
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$channelID.'&maxResults=10&order=date&key='.$Apikey;
//$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCEiq60VEWjogm67Qt2Ujl9g&order=date&'
$json = file_get_contents($url);
$obj = json_decode($json);
$videos = array();

$objVideos = $obj->items;

$sorti = array();
foreach($objVideos as $objVideo){
	
	$videosUnit['videoThumb'] = $objVideo->snippet->thumbnails->default->url;
	$videosUnit['videoTitle'] = $objVideo->snippet->title;
	$videosUnit['videoDescription'] = $objVideo->snippet->description;
	$videosUnit['videoID'] = $objVideo->id->videoId;
	$videos[] = $videosUnit;
	//$sorti[] =  $objVideo->snippet->publishedAt;
}

//$sortif = arsort($sorti);
//$final =array();
//$check = 0;
//while($check <10){
//foreach($sorti as $key =>$val){
		
	//$final[] = $videos[$key]; 
//}
//$check++;
//}
//$videos = $final;

?>

<section class="notre">
  <div class="container">
    <div class="text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
      <h1>Notre Chaîne YouTube</h1>
      <p>Bienvenue sur la chaine Youtube de Sylc Export, l'expert en importation de voitures americaines. Vous y retrouverez toutes nos automobiles
      de collection, des Rockstars utilisant nos locaux et vehicule pour leur clip,temoignage client, Sylc Export a la TV sur AB Moteur et pleins
      d'autres exclusivites, a tout de suite dans le monde de l'american car.</p>
    </div>
    <div class="col-md-5 box-scroller-section wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
		
		<?php
		
		  $counting = 0;
		 foreach($videos as $video) { 
			
			if($counting++){
				$classSelected = 'box-scroller-section-middle';
				
			}else{
				$classSelected = 'box-scroller-section-left';
				$firstVideoID = $video['videoID'];
			}
			?>
			<div class="videoOfList col-md-12 <?php echo $classSelected; ?>" id="<?php echo $video['videoID'];?>">

			  <div class="col-md-3">
				<img height="76" width="76" src="<?php echo $video['videoThumb']; ?>">
			  </div>
			  <div class="col-md-9">
				<h2><?php echo $video['videoTitle']; ?></h2>
				<p><?php echo  $string = substr($video['videoDescription'],0,30).'...'; ?></p>
			  </div>
			</div>
		<?php } ?>
        
        
      </div>
      <div class="col-md-7 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
        <iframe id="MainVideo" width="560" height="306" src="https://www.youtube.com/embed/<?php echo $firstVideoID;?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    
  </div>
</section>


<section class="big-car-details">
    <div class="container">
      <div class="text-center big-car-details-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
        <h1>Sylc Export Avis et Revues des voitures americaines</h1>
        <h3 class="big-car-details-heading">Retrouvez les revues des grands classiques américains, des automobiles iconiques de part leur histoire ou par leurs innovations.</h3>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 big-car">
        <div class="big-car-hover wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
          <img src="images/big-car-img-1.png" class="img-responsive">
        </div>
        <div class="dummy-text wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
          <h2>Lorem Ipsum is Simply Dummy</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry
            has been the industry's standard dummy text ever since the 1500s, when an 
            unknown printer took a galley of type and scrambled it ...</p>      
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 big-car">
        <div class="big-car-hover wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <img src="images/big-car-img-2.png" class="img-responsive">
        </div>
        <div class="dummy-text wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
          <h2>Lorem Ipsum is Simply Dummy</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry
            has been the industry's standard dummy text ever since the 1500s, when an 
            unknown printer took a galley of type and scrambled it ...</p>      
        </div>
      </div>
       <div class="bottom-common-btn text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
        <a href=""><button type="button" class="btn btn-default"> Voir tous les avis <i class="fa fa-angle-right"></i></button></a>
      </div>
    </div>
  </section>

<!-- About us -->
<section class="miex">
  <div class="container">
    <div class="row">
		<h1>Mieux Nous Connaitre</h1>
		<?php echo $aboutUsContent;?>
     </div>
  </div>
</section>
<!--middle end-->

        <section class="footer-top">
            <div class="container">
                <div class="row">
                  <h1>Pourquoi choisir Sylc-Export</h1>
                  <div class="col-md-3 no-padding icon-img">
                    <p class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/power-off.png"> Jusqu'à 40% d'économies</p>
                    <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/user.png"> 97.4% de clients satisfaits</p>
                  </div>

                  <div class="col-md-4 no-padding icon-img">
                    <p class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/thumbs.png">Tarifs logistique imbattables</p>
                    <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/earth.png">L'exportateur la plus réactive du marché</p>
                  </div>

                  <div class="col-md-5 no-padding icon-img">
                    <p class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/fil.png">Un interlocuteur français aux US et en France.</p>
                    <p class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s"><img src="images/lock.png">Fonds sécurisés et garantis par Bank of America</p>
                  </div>
                </div>
            </div>
        </section>
