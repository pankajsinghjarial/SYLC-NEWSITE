<!--Search scripts-->
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/popup.css" />
<script type="text/javascript">
	window.onload = function(){
		jQuery(".example5").colorbox();
	};

</script>
<?php
	$newurl =  DEFAULT_URL."/products.php".$addtopaging;
?>
<section class="list-car-details">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
            <ul class="nav nav-tabs">
                <li class="<?php echo ($auctionClass)?'active':'marque';?>"><a href="#tab1default" data-toggle="tab" id="hover-tab-1">
					<img src="images/listing/1st-icon.png" class="fst-icon"> <img src="images/listing/hover-icon.png" class="hover-icon"> Achat Immédiat</a>
				</li>
                <li class="<?php echo (!$auctionClass)?'active':'marque';?>" id="hover-tab-2">
					<a href="#tab2default" data-toggle="tab"><i class="fa fa-car"></i>Notre Inventaire</a>
                </li>
            </ul>
                 
            <div class="panel-body no-padding">
			   <div class="tab-content">
				  <div class="tab-pane fade <?php echo ($auctionClass)?'in active':'';?>" id="tab1default">
					<div class="col-md-12 no-padding list-tabs-top">
					  <div class="col-md-6 annonces no-padding">
						<h4><?php echo $pages->items_total;?> Annonces Correspondent</h4>
					  </div>
					  <div class="col-md-6 tri-par no-padding">
						<ul class="list-unstyled list-inline">
						  <li class="trier">Trier par:</li>
						  <li class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							  Prix Bas au plus élevé
							  <i class="fa fa-angle-down"></i>
							</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li <?php if(@$sort =='price~asc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."&sort=price~asc" ?>">Prix: Bas au plus chers</a></li>
                                <li <?php if(@$sort =='price~desc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."&sort=price~desc" ?>">Prix: Chers au plus bas</a></li>
                            </ul>
						  </li>
						</ul>
					  </div> <!-- col-md-6 -->
					</div> <!-- col-md-12 -->

					<?php 
				
						while($data = mysql_fetch_object($list)){
						
							if($data->type == 1){
								$car = $data->itemId;
					?>

					<div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
					  <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
						<a href="product.html"><img src="images/listing/img1.png" class="img-responsive"></a>
					  </div>
						<div class="col-md-8 col-sm-8 col-xs-12">
						  <div class="list-top-right col-md-12 no-padding">
						  
							<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
							  <h2><a href="product.html">Corvette</a></h2>
							  <h3>Prix De Vente:  <span> &nbsp € 379.23</span></h3>
							</div>
						
						
							<div class="col-md-6 col-sm-6 col-xs-12 date-list">
							  <h5>Fin De La Vente</h5>
							  <div class="btn-group" role="group" aria-label="...">
								<button type="button" class="btn btn-default">6d</button>
								<button type="button" class="btn btn-default" id="btn">19h</button>
								<button type="button" class="btn btn-default">57m</button>
							  </div>
							</div>
						 </div>
						  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
							<h6>Chevrolet Corvette Base Convertible 2-Door 2007 used 6 lv August 16 v automatic rear wheel drive premium</h6>
						  </div>

						  <div class="col-md-12 bottom-link no-padding">
							<ul class="list-inline list-unstyled">
							  <li class="list-border-right"><a href=""><i class="fa fa-star-o"></i> Ajouter a ma selection</a></li>
							  <li class="list-border"><a href="product.html"><i class="fa fa-external-link"></i> Consultez cette annonce</a></li>
							  <li class="list-border-last"><a href=""><i class="fa fa-headphones"></i> Contactez un specialisted</a></li>
							</ul>
						  </div>
						</div>
						<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
						  <img src="images/listing/border.png" class="img-responsive">
						</div>
					 </div>

					<?php
						}
					 if($data->type == 2){
						$itemId = $data->itemId;
						$link = $ebay_arr[$itemId]['link'];
						preg_match("/[0-9]{4}/",$ebay_arr[$itemId]['title'],$title,PREG_OFFSET_CAPTURE);
						$year = $title[0][0];
						if($title[0][0] != ''){
							$title = explode($title[0][0], $ebay_arr[$itemId]['title']);
							$title[1] = $year.$title[1];
						}
						else{
							$title = array();
							$title[0] = $item->primaryCategory->categoryName;
							$title[1] = $item->title;
						}
						$buyItNowPrice = $ebay_arr[$itemId]['buyItNowPrice'];
						$time = $ebay_arr[$itemId]['time'];
						$explode_time = explode(' ', $time);                                        
						$galleryURL = $ebay_arr[$itemId]['galleryURL'];
						if($galleryURL == ''){
							$galleryURL = DEFAULT_URL."/images/default.jpg";
						}
						$forward_str = $ebay_arr[$itemId]['forward_str'];
					?>
					  <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
						  <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
							<a href="<?php echo $link;?>"><img alt="<?php echo $title[0];?>"
								src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $galleryURL; ?>&newWidth=291&newHeight=227"
								width="291" height="227" class="img-responsive"></a>
						  </div>
							<div class="col-md-8 col-sm-8 col-xs-12">
							  <div class="list-top-right col-md-12 no-padding">
							  
								<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
								  <h2><a href="<?php echo $link;?>"><?php echo $title[0];?></a></h2>
								  <h3>Prix De Vente:  <span> &nbsp;&euro; <?php echo $common->CurrencyConverter($buyItNowPrice);?> </span></h3>
								</div>
							
							
								<div class="col-md-6 col-sm-6 col-xs-12 date-list">
								  <h5>Fin De La Vente</h5>
								  <div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><?php echo $explode_time[0];?></button>
									<button type="button" class="btn btn-default" id="btn"><?php echo $explode_time[1];?></button>
									<button type="button" class="btn btn-default"><?php echo $explode_time[2];?></button>
								  </div>
								</div>
							 </div>
							  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
								<h6><?php echo $title[1];?></h6>
							  </div>

						  <div class="col-md-12 bottom-link no-padding">
							<ul class="list-inline list-unstyled">
								<?php 
									if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
										if (in_array($itemId, $favList)) {
								?>											
									<li class="list-border-right">
										<a href="javascript:voide(0);">
											<i class="fa fa-star-o"></i> 
											<span class="read_btn">													
												Ajouter à ma selection 
											</span>
										</a>
									</li>
								<?php } else { ?>
										<li class="list-border-right">
											<a href="javascript:void(0);"  onclick="wishlistcar('<?php echo $itemId;?>','ebay','<?php echo $title[0]?>','<?php echo $galleryURL; ?>','<?php echo $buyItNowPrice?>')">
												<span class="read_btn" id="add_fav_link<?php echo $itemId; ?>">Ajouter à ma selection 
												</span>
											</a>
										</li>
									
									<?php }
									} else { ?>
										<li class="list-border-right">
											<a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="example5">
											<span class="read_btn">Ajouter à ma selection</span>
											</a>
										</li>
								<?php } ?>
								
								<li class="list-border"><a href="<?php echo $link;?>"><i class="fa fa-external-link"></i> Consultez cette annonce</a></li>
								
								<li class="list-border-last"><a href="consult_to_specialist.php?carId=<?php echo $itemId.$forward_str;?>"><i class="fa fa-headphones"></i> Contactez un specialisted</a></li>
								
							</ul>
						  </div>
						</div>
						<?php echo $orderfield;?>
						<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
						  <img src="images/listing/border.png" class="img-responsive">
						</div>
					 </div>
				<?php } } ?>

				  
					<div class="pagination">
						<?php echo $pages->display_pages(); ?>
					</div>



				  
				  </div> <!-- tab1default -->

				  <div class="tab-pane fade <?php echo (!$auctionClass)?'in active':'';?>" id="tab2default">
						<?php 
							foreach($all_car as $car) {
                                $carImage = explode(',',$car['images']);
						?>
							<div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
							<div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
								<a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>">									
									<img alt="<?php echo $title[0];?>"
									src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $carImage[0]; ?>&newWidth=291&newHeight=227"
									width="291" height="227" class="img-responsive">
								</a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
							  <div class="list-top-right col-md-12 no-padding">
							  
								<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
								  <h2><a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>"><?php echo $car['title'];?></a></h2>
								  <h3>Prix De Vente:  <span> &nbsp &nbsp;&euro; <?php echo $common->CurrencyConverter($car['price']);?></span></h3>
								</div>
							
							
								<div class="col-md-6 col-sm-6 col-xs-12 date-list">
								  <h5>Fin De La Vente</h5>
								  <div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default">6d</button>
									<button type="button" class="btn btn-default" id="btn">19h</button>
									<button type="button" class="btn btn-default">57m</button>
								  </div>
								</div>
							 </div>
							  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
								<h6><?php echo $car['description'];?></h6>
							  </div>

							  <div class="col-md-12 bottom-link no-padding">
								<ul class="list-inline list-unstyled">
								  <li class="list-border-right"><a href=""><i class="fa fa-star-o"></i> Ajouter a ma selection</a></li>
								  <li class="list-border"><a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>"><i class="fa fa-external-link"></i> Consultez cette annonce</a></li>
								  <li class="list-border-last"><a href=""><i class="fa fa-headphones"></i> Contactez un specialisted</a></li>
								</ul>
							  </div>
							</div>
							<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
							  <img src="images/listing/border.png" class="img-responsive">
							</div>
						 </div>
						<?php
						}

						?>
					<div class="col-md-12 pagination text-center">
						<?php echo $carPages->display_pages(); ?>
					</div>

				  </div> <!-- tab2default -->
				  
			  </div> <!-- tab-content -->
		  </div><!-- panel body -->
	  </div><!-- panel -->
  </div><!-- col-md-12 -->
</div><!-- tab2default -->
</section>
