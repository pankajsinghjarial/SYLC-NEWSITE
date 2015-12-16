<?php
    /*selected tab*/
    $productTab = true;
    $inventoryClass = 'marque';
    if(isset($products)){
        if($products == 'inventory'){
            $productTab = false;
        }
    }
?>
<section class="list-car-details">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
            <ul class="nav nav-tabs">
                <li class="<?php echo ($productTab)?'active':'marque';?>"><a href="#tab1default" data-toggle="tab" id="hover-tab-1"><img src="<?php echo DEFAULT_URL ?>/images/listing/1st-icon.png" class="fst-icon"> <img src="<?php echo DEFAULT_URL ?>/images/listing/hover-icon.png" class="hover-icon"> Achat Immédiat</a></li>
                <li class="<?php echo ($productTab)?'marque':'active';?>" id="hover-tab-2"><a href="#tab2default" data-toggle="tab"><i class="fa fa-car"></i>
                Notre Inventaire</a></li>
            </ul>
                 
                  <div class="panel-body no-padding">
                      <div class="tab-content" id="list-tab-content">
                          <div class="tab-pane fade <?php echo ($productTab)?'in active':'';?>" id="tab1default">
                            <div class="col-md-12 no-padding list-tabs-top">
                              <div class="col-md-6 annonces no-padding">
                                <h4>17829 Annonces Correspondent</h4>
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
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </li>
                                </ul>
                              </div> <!-- col-md-6 -->
                            </div> <!-- col-md-12 -->


                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img1.png" class="img-responsive listing-car-img"></a>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -2 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img2.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac GTO Coupe 2-Door Base</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">22h</button>
                                        <button type="button" class="btn btn-default">22m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">2006 pontac gto rolling brazen orange full frame</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -3 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img3.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Buick Roadmaster</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">20h</button>
                                        <button type="button" class="btn btn-default">48m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1993 Buick Roadmaster Sedan 5.7L Base Clean Drives</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -4 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img4.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac Firebird</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3390.74</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">19h</button>
                                        <button type="button" class="btn btn-default">00m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1997 pontiac firebird 5 speed manual 115k miles flat black custom paint</h6>
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
                                  <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive"></a>
                                </div>
                             </div>

                             

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img1.png" class="img-responsive listing-car-img"></a>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -2 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img2.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac GTO Coupe 2-Door Base</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">22h</button>
                                        <button type="button" class="btn btn-default">22m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">2006 pontac gto rolling brazen orange full frame</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -3 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img3.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Buick Roadmaster</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">20h</button>
                                        <button type="button" class="btn btn-default">48m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1993 Buick Roadmaster Sedan 5.7L Base Clean Drives</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -4 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img4.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac Firebird</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3390.74</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">19h</button>
                                        <button type="button" class="btn btn-default">00m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1997 pontiac firebird 5 speed manual 115k miles flat black custom paint</h6>
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
                                  <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive"></a>
                                </div>
                             </div>

                             


                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img1.png" class="img-responsive listing-car-img"></a>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -2 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img2.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac GTO Coupe 2-Door Base</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">22h</button>
                                        <button type="button" class="btn btn-default">22m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">2006 pontac gto rolling brazen orange full frame</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -3 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img3.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Buick Roadmaster</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">20h</button>
                                        <button type="button" class="btn btn-default">48m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1993 Buick Roadmaster Sedan 5.7L Base Clean Drives</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -4 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img4.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac Firebird</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3390.74</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">19h</button>
                                        <button type="button" class="btn btn-default">00m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1997 pontiac firebird 5 speed manual 115k miles flat black custom paint</h6>
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
                                  <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive"></a>
                                </div>
                             </div>

                            

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img1.png" class="img-responsive listing-car-img"></a>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -2 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img2.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac GTO Coupe 2-Door Base</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">22h</button>
                                        <button type="button" class="btn btn-default">22m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">2006 pontac gto rolling brazen orange full frame</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -3 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img3.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Buick Roadmaster</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3123.05</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">20h</button>
                                        <button type="button" class="btn btn-default">48m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1993 Buick Roadmaster Sedan 5.7L Base Clean Drives</h6>
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
                                  <img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive">
                                </div>
                             </div>

                             <!-- list - section -4 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding list-first-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                              <div class="col-md-4 col-sm-4 col-xs-12 no-right-padding">
                                <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/img4.png" class="img-responsive listing-car-img"></a>
                              </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <div class="list-top-right col-md-12 no-padding">
                                  
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding list-right-text">
                                      <h2><a href="product.html">Pontiac Firebird</a></h2>
                                      <h3>Prix De Vente:  <span> &nbsp € 3390.74</span></h3>
                                    </div>
                                
                                
                                    <div class="col-md-6 col-sm-6 col-xs-12 date-list">
                                      <h5>Fin De La Vente</h5>
                                      <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">6d</button>
                                        <button type="button" class="btn btn-default" id="btn">19h</button>
                                        <button type="button" class="btn btn-default">00m</button>
                                      </div>
                                    </div>
                                
                                 </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 listmiddle-text no-padding">
                                    <h6 class="list-small-text">1997 pontiac firebird 5 speed manual 115k miles flat black custom paint</h6>
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
                                  <a href="product.html"><img src="<?php echo DEFAULT_URL ?>/images/listing/border.png" class="img-responsive"></a>
                                </div>
                             </div>

                            <div class="col-md-12 pagination text-center">
                              <ul class="list-inline list-unstyled">
                                <li class="pre"><i class="fa fa-angle-double-left"></i> Précédent</li>
                                <li class="active">1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>...</li>
                                <li>10</li>
                                <li>11</li>
                                <li class="next"> Suivant <i class="fa fa-angle-double-right"></i></li>
                              </ul>
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




    <!---********************** carosul 2 **********************-->

<section class="carousel-2 wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Les annonces de voitures americaines les plus vues:</h1>
      </div>
      <div id="owl-demo" class="owl-carousel">
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-1.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-2.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-3.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-4.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-5.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-1.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-2.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-3.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-4.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-5.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-1.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-2.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-3.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-4.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-md-12">
              <img class="lazyOwl" data-src="<?php echo DEFAULT_URL ?>/images/car-slide-5.png" alt="Lazy Owl Image">
              <div class="car-details-bottom">
                <h6>Ford :  Chevrolet: Camaro Ls</h6>
                <div class="col-md-12 no-padding">
                  <div class="col-md-6 no-padding">
                    <h6>Prix :  $19,845</h6>
                  </div>
                  <div class="col-md-6 product-arrow">
                    <a href="product.html"><i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>




    <!---********************** End carosul 2 **********************-->

<!-- ******************* footer  Section ******************-->
