<section class="product-page">
  <div class="container">
    <div class="row">
      
      <div class="col-md-7 product-page-couple wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
        <h1><?php echo strtoupper($item->title);?></h1>
        <?php $gallery = explode("**",$item->galleryURL);?>
        <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[0]); ?>&newWidth=581&newHeight=431" class="img-responsive" style="width:100%">
          <div class="col-md-12 product-full-carosel no-padding">
            <div id="Carousel" class="carousel slide">
            
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <div class="item active">
                  <div class="row">
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-2.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-3.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-4.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-5.png" alt="Image" style="max-width:100%;" class="center"></div>
                  </div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                  <div class="row">
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-2.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-3.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-4.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-5.png" alt="Image" style="max-width:100%;" class="center"></div>
                  </div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                  <div class="row">
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-2.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-3.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-4.png" alt="Image" style="max-width:100%;" class="center"></div>
                    <div class="col-md-3 paroduct-carosel"><img src="<?php echo DEFAULT_URL; ?>/images/product/img-5.png" alt="Image" style="max-width:100%;" class="center"></div>
                  </div><!--.row-->
                </div><!--.item-->
                 
                </div><!--.carousel-inner-->
                <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
              </div><!--.Carousel-->  

            </div><!--col-md-12-->

            <div class="col-md-12 product-btn-group no-padding">
              <div class="col-md-4 no-padding btn-1">
                <button class="btn btn-default"  id="btn-1-product" type="submit">Reserver ce vehicule <i class="fa fa-angle-right"></i> </button>

              </div><!--col-md-4-->
              <div class="col-md-4 no-padding btn-2">
                <button class="btn btn-default" type="submit">Ajouter a ma selection <i class="fa fa-angle-right"></i> </button>

              </div><!--col-md-4-->
              <div class="col-md-4 no-padding btn-3">
                <button class="btn btn-default" type="submit">Demande D'information <i class="fa fa-angle-right"></i></button>
              </div><!--col-md-4-->
            </div><!--col-md-12-->


            <!-- Hide Show Section -->
                <div class="col-md-12 product-hide-show-form no-padding">
                    <div class="col-md-12 no-right-padding product-close-icon">
                      <i class="fa fa-times-circle"></i>
                    </div>
                    <h2>Pour effectuer la réservation de ce véhicule, s'il vous plaît procéder et de remplir vos informations de facturation et de carte de crédit informations ci-dessous pour traiter les paiements.</h2>
                    <div class="col-md-12 no-padding product-right-bottom">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <div class="col-sm-6 product-fst-input">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Nom">
                          </div>
                          <div class="col-sm-6 product-snd-input">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="PreNom">
                          </div>
                        </div> 

                        <div class="form-group">
                          
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Address">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-6 product-fst-input">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Numero de telephone">
                          </div>
                          <div class="col-sm-3 product-duta-input">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Ville">
                          </div>
                          <div class="col-sm-3 product-thrd-input">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Province">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-6 product-fst-input">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Code postal">
                          </div>
                          <div class="col-sm-6 product-fst-input">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                          </div>
                        </div>
                      </form>

                       <h2>Information de paiment :</h2>
                      <div class="col-md-12 no-padding product-right-bottom">
                        <form class="form-horizontal">
                          <div class="form-group">
                            <div class="col-sm-6 product-fst-input">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Numero de cart">
                            </div>
                            <div class="col-sm-6 product-snd-input">
                              <select class="form-control">
                                <option>Type</option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                              </select>
                            </div>
                          </div>

                          

                          <div class="form-group">
                            <div class="col-sm-3">
                              <p>Date d'expiration :</p>
                            </div>
                            <div class="col-sm-3 product-fst-input">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Mois">
                            </div>
                            <div class="col-sm-3 product-duta-input">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Année">
                            </div>
                            <div class="col-sm-3 product-thrd-input">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Sec">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> J’ai lu et j’accepte expressement la <a href="">politique de confidential</a>
                              </label>
                            </div>
                          </div>


                          <div class="form-group hide-show-bottom">
                            <div class="col-md-3 no-right-padding">
                              <h6>Paiement traité par </h6>
                            </div>
                            <div class="col-md-3 no-left-padding">
                              <img src="<?php echo DEFAULT_URL; ?>/images/product/paypal.png">
                            </div>
                            <div class="col-md-3 no-left-padding">
                              <h6>Montant €2000.00</h6>
                            </div>

                            <div class="col-md-3 no-left-padding">
                              <button type="submit" class="btn btn-default"> Soumettre <i class="fa fa-angle-right"></i></button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                </div>

            <!-- tab Section -->

            <div class="col-md-12 no-padding product-tabs">
              <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
                  
                  <ul class="nav nav-tabs nav-justify">
                      <li class="active"><a href="#tab1default" data-toggle="tab">Caractéristiques</a></li>
                      <li class="marque"><a href="#tab2default" data-toggle="tab">Description</a></li>
                      <li class="marque"><a href="#tab3default" data-toggle="tab">Les Étapes de La Reservation</a></li>
                  </ul>
                 
                  <div class="panel-body no-padding">
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="tab1default">
                         <div class="col-md-12 tabs-fst-body no-padding">
                            <h3>Buick : Reatta 2 door coupe. Stock ID: #</h3> 
                            <div class="col-md-4 frst-text">
                               <h2>Vin &nbsp  &nbsp <span>1G4EC11C3kb900244</span></h2>
                            </div>

                            <div class="col-md-5 middle-text">    
                              <h2>Mileage &nbsp  &nbsp <span>88,591.00 Mi</span></h2>
                            </div>

                            <div class="col-md-3 prdtlast-text">   
                              <h2>Prix  &nbsp &nbsp <span> 883.90 €</span></h2>
                            </div>

                            <div class="col-md-12 Caract no-padding">
                              <h3>Caractéristiques  Features</h3> 
                            </div>

                            <div class="col-md-12 tab-cardescription-1 no-padding">
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Year</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border">
                                <h2>1989</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Make</h2>
                              </div>

                              <div class="col-md-2 side-border">
                                <h2>Buick</h2>
                              </div>

                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Model </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border-bottom">
                                <h2>Reatta</h2>
                              </div>
                            </div> <!-- col-md-12 -->

                            <!-- row 2-->

                            <div class="col-md-12 tab-cardescription-2 no-padding">
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Trim</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border no-left-padding">
                                <h2>2 door coupe</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Engine</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border">
                                <h2>3.8</h2>
                              </div>

                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Drive Type </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border-bottom">
                                <h2>FWD</h2>
                              </div>
                            </div> <!-- col-md-12 -->


                            <!-- row 3-->

                            <!-- row 2-->

                            <div class="col-md-12 tab-cardescription-1 no-padding">
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Mileage </h2>
                              </div>

                              <div class="col-md-2  col-xs-6 side-border">
                                <h2>88591</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">Exterior Color  </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border">
                                <h2>Blue</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">Interior Color </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border-bottom">
                                <h2>Blue</h2>
                              </div>
                            </div> <!-- col-md-12 -->



                            <!-- row 4-->


                            <div class="col-md-12 tab-cardescription-2 no-padding">
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Transmission</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border">
                                <h2>Automatic</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Fuel Type</h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border">
                                <h2>Gasoline</h2>
                              </div>

                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Body Type </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border-bottom">
                                <h2>Coupe</h2>
                              </div>
                            </div> <!-- col-md-12 -->


                            <!-- row 5-->

                           

                            <div class="col-md-12 tab-cardescription-1 no-padding">
                              <div class="col-md-2 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">Vehicle Title</h2>
                              </div>

                              <div class="col-md-2 side-border col-xs-6">
                                <h2>Clear</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">For Sale By </h2>
                              </div>

                              <div class="col-md-2 col-xs-6 side-border-saller no-padding">
                                <h2>Private Seller</h2>
                              </div>

                              <div class="col-md-3 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">Number of Cylinders  </h2>
                              </div>

                              <div class="col-md-1 side-border-bottom">
                                <h2>6</h2>
                              </div>
                            </div> <!-- col-md-12 -->


                            <!-- row 6 -->

                            <div class="col-md-12 col-sm-12 col-xs-12 tab-cardescription-2 no-padding">
                              <div class="col-md-3 col-xs-6">
                                <h2 class="text-hlka-color">Safety Features </h2>
                              </div>

                              <div class="col-md-3 col-xs-6 side-border-saller">
                                <h2> Anti-Lock Brakes</h2>
                              </div>
                     
                              <div class="col-md-2 col-xs-6">
                                <h2 class="text-hlka-color">Options  </h2>
                              </div>

                              <div class="col-md-4 col-xs-6 no-left-padding">
                                <h2>Cassette Player, Leather Seats</h2>
                              </div>
                            </div> <!-- col-md-12 -->

                            <!-- row 7 -->

                            <div class="col-md-12 tab-cardescription-1 no-padding">
                              <div class="col-md-2 col-xs-6 no-right-padding">
                                <h2 class="text-hlka-color">Warranty  </h2>
                              </div>

                              <div class="col-md-9 col-xs-6 no-left-padding">
                                <h2> Vehicle does NOT have an existing warranty</h2>
                              </div>
                            </div> <!-- col-md-12 -->

                            <!-- row 8 -->

                            <div class="col-md-12 tab-cardescription-2 no-padding">
                              <div class="col-md-3 col-xs-6">
                                <h2 class="text-hlka-color">Power Options  </h2>
                              </div>

                              <div class="col-md-8 col-xs-6 no-left-padding">
                                <h2> Air Conditioning, Cruise Control, Power Locks, Power Windows, Power Seats</h2>
                              </div>
                            </div> <!-- col-md-12 -->
                         </div>   
                      </div>

                      <div class="tab-pane fade" id="tab2default">
                        <div class="col-md-12 tabs-snd-body no-padding">
                          <p>Has Been Mine For 17 Years it Came From Texas in 98 I Had it Painted Blue Then As A kid I Sold it To A</p>
                        </div>    
                      </div>

                      <div class="tab-pane fade" id="tab3default">
                        <div class="col-md-12 tabs-fst-body no-padding">
                          <div class="col-md-12 no-padding row-bottom">
                            <div class="col-md-3 tab-3-nmbr">
                              <h2>1</h2>
                            </div>
                            <div class="col-md-9 no-padding tab-3-text">
                             <p class="first-text"> Vous pouvez nous appelez en direct au 01.76.63.32.16 pour reserver le vehicule immediatement.</p>
                            </div>
                          </div>

                          <div class="col-md-12 no-padding row-bottom">
                            <div class="col-md-3 tab-3-nmbr">
                              <h2>2</h2>
                            </div>
                            <div class="col-md-9 no-padding tab-3-text">
                             <p class="second-text"> Cliquez sur le bouton "Réserver ce véhicule" et remplissez le formulaire afin de réserver immédiatement le véhicule. Des la réservation faite nous vous contacterons afin d’établir ensemble les dernières modalités de votre export.</p>
                            </div>
                          </div>
                          <div class=" col-md-12 success-btn text-center">
                            <button class="btn btn-success" type="submit">Reserver ce vehicule <i class="fa fa-angle-right"></i></button>
                          </div>
                        </div>
                            
                      </div>

                    </div>
                  </div>
              </div>
            </div>

          </div><!--  col-md-7 -->

      <div class="col-md-5 product-right-content no-padding wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
        <h2>RÉSERVEZ CE VÉHICULE</h2>
        <div class="appels">
          
          <div class="col-md-6 text-left no-padding">
            <h3 class="product-right-prix">Prix du véhicules actuelle</h3>
          </div>
          <div class="col-md-6 text-right no-padding">
            <h4 class="product-right-price">882.70 €</h4>
          </div>
        </div>
        <div class="col-md-12 appels no-padding">
          <h1 class="product-right-oneline">
            Appelez nous en Direct 01.76.63.32.16
          </h1>
          <h5 class="product-right-reser">SÉLECTIONNEZ LES SERVICES DÉSIRÉS</h5>
          <h6 class="product-right-pour">Pour la France, les véhicules arriveront à Trappes (Yvelines 78). Une livraison à Domicile est possible, merci de nous contacter</h6>
        </div>
        <div class="col-md-12 product-form-right">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 control-label trans-leb">Prestation SYLC:</label>
              <div class="col-sm-4 product-form-1">
                <select class="form-control">
                    <option>France</option>
                    <option>France</option>
                    <option>France</option>
                    <option>France</option>
                    <option>France</option>
                  </select>
              </div>
              <div class="col-sm-4 product-form-2">
                <input type="text" class="form-control" id="inputPassword" placeholder="$3000.00">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Transport Terrestre USA:<br>
              <span style="font-size:14px">Assurance incluse:</span></label>
              <div class="col-sm-4 product-form-1">
                 <select class="form-control">
                    <option>Camion</option>
                    <option>Camion</option>
                    <option>Camion</option>
                    <option>Camion</option>
                    <option>Camion</option>
                  </select>
              </div>
              <div class="col-sm-4 product-form-2">
                <input type="text" class="form-control" id="inputPassword" placeholder="$1200.00">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label trans-leb">Transport - International:</label>
              <div class="col-sm-4 product-form-1">
                <select class="form-control">
                    <option>Conteneur</option>
                    <option>Conteneur</option>
                    <option>Conteneur</option>
                    <option>Conteneur</option>
                    <option>Conteneur</option>
                  </select>
              </div>
              <div class="col-sm-4 product-form-2">
                <input type="text" class="form-control" id="inputPassword" placeholder="$2000.00">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-8 control-label trans-leb">Bank, fedex and doc fees:</label>
              <div class="col-sm-4 product-form-2">
                <input type="text" class="form-control" id="inputPassword" placeholder="$260.00">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-7 control-label trans-leb">Frais Transitaire - Débarquement, Traction & Dépotage:</label>
              <div class="col-sm-5 product-form-2">
                <input type="text" class="form-control" id="inputPassword" placeholder="€780.00">
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-12 select-text-bottom-form">
          <h1>Sélectionnez les options désirés</h1>
          <div class="col-md-9 no-padding">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Homologation - Francisation, passage aux mines<br> 
                <h3 class="leger">pour tous vehicule léger obligatoire pout tout vehicule de moins de 30 ans</h3>
              </label>
            </div>
          </div>
          <div class="col-md-3 homolgy no-padding"> 
            <input type="text" class="form-control" id="inputPassword" placeholder="€">
          </div>
        </div>

        <div class="col-md-12 prixi-1">
          <h1>PRIX TOTAL </h1>
          <div class="col-md-6 no-padding">
            <div class="checkbox">
              <h3 class="rendu">H.T rendu le port sélectionné </h3>
              <label>
                
                <input type="checkbox"> Voiture 30 ans et plus 
              </label>
            </div>
          </div>
          <div class="col-md-6 form-150"> 
            <input type="text" class="form-control" id="inputPassword" placeholder="15068">
          </div>
        </div>

        <div class="col-md-12 prixi-2">
          <h1>PRIX TOTAL </h1>
          <div class="col-md-6 no-padding rendu">
            <h3>Prix Total TTC tout inclus rendu </h3>
            <h3>le port selectionné </h3> 
          </div>
          <div class="col-md-6 no-padding"> 
            <input type="text" class="form-control" id="inputPassword" placeholder="26,848.80">
          </div>
        </div>

        <div class="col-md-12 product-right-bottom">
         <h1>A PROPOS DE VOUS </h1>
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-6 product-fst-input">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
              <div class="col-sm-6 product-snd-input">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="text-right" style="padding-right: 14px">
                <button type="submit" class="btn btn-default">Etape Suivante <i class="fa fa-angle-right"></i></button>
              </div>
            </div>
          </form>
          <p>Nous sommes disponible de 12H a 22H pour la France du Lundi au Jeudi/ de 12h a 18h le Vendredi / Samedi a partir de 19h au 01.76.63.32.16</p>
        </div>
      </div><!--  col-md-4 -->
    </div>
  </div>
</section>

<section class="product-video-section">
  <div class="container">
    <div class="row">
      <h1>VIDEOS</h1>
      <div class="col-md-6">
        <img src="<?php echo DEFAULT_URL; ?>/images/product/video-img-1.png" class="img-responsive">
      </div>
      <div class="col-md-6">
        <img src="<?php echo DEFAULT_URL; ?>/images/product/video-img-2.png" class="img-responsive">
      </div>
      <div class="col-md-10 col-md-offset-1  product-video-product">
        
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function(){
      $("#btn-1-product").click(function(){
      $(".product-hide-show-form").show('blind');


          //$(".voir-icon2").show();
      });
      $(".product-close-icon").click(function(){
      $(".product-hide-show-form").hide('blind');
    });
     
  });
</script>
