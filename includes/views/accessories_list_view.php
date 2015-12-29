<section class="list-car-details" id="accessories">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
                <?php
					$newurl =  DEFAULT_URL."/accessories.php".$addtopaging;
				?>
                  <div class="panel-body no-padding">
                      <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab1default">
                            <div class="col-md-12 no-padding list-tabs-top">
                              <div class="col-md-6 annonces no-padding">
                               
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
                                      <li <?php if($sort =='price~asc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."sort=price~asc" ?>">Price: Low to High</a></li>
                                      <li <?php if($sort =='price~desc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."sort=price~desc" ?>">Price: High to Low</a></li>
                                      <li <?php if($sort =='title~asc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."sort=title~asc" ?>">Name: Ascending</a></li>
                                      <li <?php if($sort =='title~desc') { ?> class="activesort" <?php } ?>><a href="<?php echo $newurl.$addtopaging1."sort=title~desc" ?>">Name: Descinding</a></li>
                                    </ul>                                   
                                  </li>
                                </ul>
                              </div> <!-- col-md-6 -->
                            </div> <!-- col-md-12 -->

							 <?php 
								  if ($total_rows > 0) {
									$ii = 1;
									while($getPageData = mysql_fetch_object($allAccessories)) {
										$galleryURL = DEFAULT_URL."/images/accessories/".$getPageData->image;
							?>
							 <form method="post" action="process.php">
								 	<input type="hidden" name="itemname" value="<?php echo $getPageData->productname;?>" /> 
									<input type="hidden" name="itemnumber" value="<?php echo $getPageData->id;?>" /> 
									<input type="hidden" name="itemdesc" value="<?php echo $getPageData->description;?>" /> 
									<input type="hidden" name="itemprice" value="<?php echo $common->CurrencyConverter($getPageData->amount);?>" />
								<div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
								  <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
									<img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $galleryURL; ?>&newWidth=291&newHeight=227"
								width="291" height="227" class="img-responsive">
								  </div>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <div class="list-top-right col-md-12 no-padding">
									  
										<div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
										  <h2><?php echo $getPageData->productname;?></h2>
										  <h3>Prix De Vente:  <span> &nbsp € <?php echo $common->CurrencyConverter($getPageData->amount);?></span></h3>
										</div>
									
									
										<div class="col-md-6 col-sm-6 col-xs-12 date-list"> 
										</div>
									 </div>
									  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
										<h6><?php echo $getPageData->description;?></h6>
									  </div>

									  <div class="col-md-12 no-padding">
										<div class="col-md-6 no-padding">
										  <div class="form-group">
											<label for="inputPassword3" class="col-sm-2 control-label no-left-padding">Quantité</label>
											<div class="col-sm-3 no-padding">
											  <select class="form-control" name="itemQty">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											  </select>
											</div>
										  </div>
										</div>

										<div class="col-md-6 no-padding accessoris-btn">
										  <button name="submitbutt" class="btn btn-primary" type="submit">Acheter Maintenant <i class="fa fa-angle-double-right"></i></button>
										</div>
										
									  </div>
									</div>
									<div class="col-md-12 border-img-border bottom-border-bottom no-padding hidden-sm">
									  <img src="images/listing/border.png" class="img-responsive">
									</div>
								 </div>
							</form>

                           <?php $ii++; 
							  } 
							 } else {
							?>
								<div>
								 No record found.
								</div>
							<?php } ?>
							
                           <div class="pagination">
								<?php echo $pages->display_pages(); ?>
							</div>
                             </div>

                          </div> <!-- tab1default -->

                          <div class="tab-pane fade" id="tab2default">


                          </div> <!-- tab2default -->
                          
                      </div> <!-- tab-content -->
                  </div><!-- panel body -->
              </div><!-- panel -->
          </div><!-- col-md-12 -->
     </div><!-- tab2default -->
  </section>
