<!--Search scripts-->
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/popup.css" />
<script type="text/javascript">
	window.onload = function(){
		jQuery(".example5").colorbox();


	};
    function wishlistcar(carid,cartype,carname,carimg,carprice){
        if(!confirm("Are you sure to add this car to Favorite")){
            return false;
        }
        var wishlist = $('#wishcar_'+carid);
        var chk = 'checked';
        divname = "#saved"+carid;
        $.ajax({
            type: "POST",
            url: "<?php echo DEFAULT_URL?>/ajax_wishlistcar.php",
            data: { carid: carid, cartype: cartype, carname: carname, carimg: carimg, carprice: carprice, ischk: chk},
            dataType: "html",
            success: function(data) {
                  $(divname).remove();
                  wishlist.show();
                  alert('Ajouté à la liste');
            }
        });
    }
</script>
<?php
	$newurl =  DEFAULT_URL."/products.php".$addtopaging.'&products=products';
	$newurl1 =  DEFAULT_URL."/products.php".$addtopaging.'&products=inventory';
    if(!isset($search)){
        $newurl =  DEFAULT_URL."/annouce_usa_actuelle".$addtopaging;
        $newurl1 =  DEFAULT_URL."/notre_inventaire".$addtopaging;
    }
?>

<div style="display:none">
	 <img id="popup" src="<?php echo DEFAULT_URL; ?>/images/product_tooltip.jpg"/>
</div>
<section class="list-car-details">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
            <ul class="nav nav-tabs">
                <li class="<?php echo ($auctionClass)?'active':'marque';?>"><a href="#tab1default" data-toggle="tab" id="hover-tab-1">
					<img <?php echo (!$auctionClass)?'style="display:inline"':'';?> src="images/listing/1st-icon.png" class="fst-icon">
					 <img src="images/listing/hover-icon.png" <?php echo (!$auctionClass)?'style="display:none"':'';?> class="hover-icon"> Achat Immédiat</a>
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
						foreach($ebay_arr as $carId =>$carData){
					?>

					<div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
					  <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                        <?php 
                            $carHeading = explode(':',$carData['title']);
                            $carTitle = $carHeading[0];
                            $carDescription = "";
                            if(isset($carHeading[1])){
                                $carDescription = $carHeading[1];
                            }
                        ?>
						<a href="<?php echo $carData['link'];?>"><img alt="<?php echo $carTitle;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $carData['galleryURL']; ?>&newWidth=291&newHeight=227" class="img-responsive"></a>
					  </div>
						<div class="col-md-8 col-sm-8 col-xs-12">
						  <div class="list-top-right col-md-12 no-padding">
						  
							<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
							  <h2><a href="<?php echo $carData['link'];?>"><?php echo $carTitle;?></a></h2>
							  <h3>Prix De Vente:  <span> &nbsp € <?php echo $common->CurrencyConverter($carData['buyItNowPrice']);?></span></h3>
							</div>
                            <?php 
                                $explode_time = explode(' ', $time);
                            ?>
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
							<h6><?php echo $carDescription;?></h6>
						  </div>

						  <div class="col-md-12 bottom-link no-padding">
							<ul class="list-inline list-unstyled">
								<?php 
									if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
										if (in_array($carId, $favList)) {
								?>											
									<li class="list-border-right">
										<a href="javascript:void(0);">
											<i class="fa fa-star-o"></i> 
											<span class="read_btn">	
												Ajouter à ma selection 
											</span>
										</a>
									</li>
								<?php } else { ?>
										<li class="list-border-right" id="saved<?php echo $carId; ?>">
											<a href="javascript:void(0);"  onclick="wishlistcar('<?php echo $carId;?>','ebay','<?php echo $carData['title'];?>','<?php echo $carData['galleryURL']; ?>','<?php echo $carData['buyItNowPrice']; ?>')">
												<span class="read_btn" id="add_fav_link<?php echo $carId; ?>">Ajouter à ma selection 
												</span>
											</a>
										</li>
                                        <li class="list-border-right" id="wishcar_<?php echo $carId; ?>" style="display:none;">
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-star-o"></i> 
                                                <span class="read_btn">													
                                                    Ajouter à ma selection 
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
								
								<li class="list-border"><a href="<?php echo $carData['link'];?>"><i class="fa fa-external-link"></i> Consultez cette annonce</a></li>
								
								<li class="list-border-last"><a href="<?php echo DEFAULT_URL; ?>/consult_to_specialist.php?carId=<?php echo $carId.$carData['forward_str'];?>"><i class="fa fa-headphones"></i> Contactez un specialisted</a></li>
								
							</ul>
						  </div>


						</div>
						<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
						  <img src="<?php echo DEFAULT_URL; ?>/images/listing/border.png" class="img-responsive">
						</div>
					 </div>

                <?php } ?>
                <?php echo $orderfield;?>
				  
                <div class="pagination">
                    <?php echo $pages->display_pages(); ?>
                </div>



				  
				  </div> <!-- tab1default -->

				  <div class="tab-pane fade <?php echo (!$auctionClass)?'in active':'';?>" id="tab2default">
						<div class="col-md-12 no-padding list-tabs-top">
						  <div class="col-md-6 annonces no-padding">
							<h4><?php echo $inventoryTotalRows;?> Annonces Correspondent</h4>
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
									<li <?php if(@$sort =='price~asc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl1.$addtopaging1."&sort=price~asc" ?>">Prix: Bas au plus chers</a></li>
									<li <?php if(@$sort =='price~desc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl1.$addtopaging1."&sort=price~desc" ?>">Prix: Chers au plus bas</a></li>
								</ul>
							  </li>
							</ul>
						  </div> <!-- col-md-6 -->
						</div> <!-- col-md-12 -->

					
						<?php 
                        if($inventoryTotalRows){
							foreach($all_car as $car) {
                                $consultLink = "http://acc.local/consult_to_specialist.php?carId=".$car['car_id']."&title=".$car['title']."&buyItNowPrice=".$car['price']."&postalCode=NA&location=NA&listingType=OurInventory&endson=0&endtimestamp=0&buyItNowAvailable=0";
                                $carImage = explode(',',$car['images']);
                                $primaryImage =  DEFAULT_URL."/uploads/car/".$carImage[0];
						?>
							<div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
							<div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
								<a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>">
									<img alt="<?php echo $car['title'];?>"
									src="<?php echo DEFAULT_URL;?>/image_resizer.php?img=<?php echo $primaryImage; ?>&newWidth=291&newHeight=227"
									width="291" height="227" class="img-responsive">
								</a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
							  <div class="list-top-right col-md-12 no-padding">
							  
								<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
								  <h2><a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>"><?php echo $car['title'];?></a></h2>
								  <h3>Prix De Vente:  <span> &nbsp &nbsp;&euro; <?php echo $common->CurrencyConverter($car['price']);?></span></h3>
								</div>
								<!--<div class="col-md-6 col-sm-6 col-xs-12 date-list">
								  <h5>Fin De La Vente</h5>
								  <div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default">6d</button>
									<button type="button" class="btn btn-default" id="btn">19h</button>
									<button type="button" class="btn btn-default">57m</button>
								  </div>
								</div>-->
							 </div>
							  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
								<h6><?php echo strip_tags($car['description']);?></h6>
							  </div>

							  <div class="col-md-12 bottom-link no-padding">
								<ul class="list-inline list-unstyled">
								<?php 
									if (isset($_SESSION['User']['id']) && $_SESSION['User']['id'] > 0) {
										if (in_array($car['car_id'], $favList)) {
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
										<li class="list-border-right" id="saved<?php echo $car['car_id']; ?>">
											<a href="javascript:void(0);"  onclick="wishlistcar('<?php echo $car['car_id'];?>','inventory','<?php echo $car['title'];?>','<?php echo $primaryImage; ?>','<?php echo $car['price']; ?>')">
												<span class="read_btn" id="add_fav_link<?php echo $car['car_id']; ?>">Ajouter à ma selection 
												</span>
											</a>
										</li>
                                        <li class="list-border-right" id="wishcar_<?php echo $car['car_id']; ?>" style="display:none;">
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-star-o"></i> 
                                                <span class="read_btn">													
                                                    Ajouter à ma selection 
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
								  <li class="list-border">
                                    <a href="<?php echo DEFAULT_URL;?>/inventaire/<?php echo $car['car_id'];?>"><i class="fa fa-external-link"></i> Consultez cette annonce</a></li>
								  <li class="list-border-last">
                                    <a href="<?php echo $consultLink; ?>"><i class="fa fa-headphones"></i> Contactez un specialisted</a>
                                  </li>
								</ul>
							  </div>
							</div>
							<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
							  <img src="images/listing/border.png" class="img-responsive">
							</div>
						 </div>
						<?php
                            }
                        }else{
                            echo "<br/><br/><br/>No Product Found";
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
