<?php //echo "<pre>";print_r($item); die;?>
<?php if(isset($_SESSION['sentmail_txt'])){ echo $_SESSION['sentmail_txt']; unset($_SESSION['sentmail_txt']);}?>
<section class="product-page">
    <div class="container">
        <div class="row">
            <div class="col-md-7 product-page-couple wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
            <h1><?php echo strtoupper($item->title);?></h1>
            <img class="primary-image" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[0]); ?>&newWidth=581&newHeight=431" class="img-responsive" style="width:100%">
            <div class="col-md-12 product-full-carosel no-padding">
                <div id="Carousel" class="carousel slide">
                <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php 
                        $totalImages = count($gallery);
                        for($imageCount = 1;$imageCount<=$totalImages;$imageCount++){
                            if(($imageCount%4) == 1){
                                if($imageCount != 1){
                                    echo "</div></div>";
                                }
                                ?>
                                <div class="item <?php if($imageCount == 1){echo 'active';} ?>">
                                <div class="row">
                                <?php
                            }
                            ?>
                            <div class="col-md-3 paroduct-carosel"><img src="<?php echo $gallery[$imageCount - 1]; ?>" alt="Image" style="max-width:100%;" class="center"></div>
                            <?php
                            if($imageCount == $totalImages){
                            ?>
                            </div><!--.row-->
                            </div><!--.item-->
                            <?php
                            }
                        }
                        ?>
                    </div><!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                </div><!--.Carousel-->  
            </div><!--col-md-12-->
            <div class="col-md-12 product-btn-group no-padding">
                <div class="col-md-4 no-padding btn-1">
                    <button class="btn btn-default"  id="btn-1-product" type="submit">Reserver ce vehicule <i class="fa fa-angle-right"></i> </button>
                </div><!--col-md-4-->
                <?php 
                    if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
                        if(!($isSelect['count(id)']>0)){ ?>
                            <div class="col-md-4 no-padding btn-2" id="saved<?php echo $carid;?>">
                                <button class="btn btn-default" onclick="wishlistcar('<?php echo $carid;?>','ebay','<?php echo $item->title;?>','<?php echo $gallery[0];?>','<?php echo $item->buyItNowPrice; ?>')" type="submit">Ajouter a ma selection <i class="fa fa-angle-right"></i> </button>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="col-md-4 no-padding btn-2" id="saved<?php echo $carid;?>">
                            <button class="btn btn-default example5" href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" type="submit">Ajouter a ma selection <i class="fa fa-angle-right"></i> </button>
                        </div>
                    <?php } ?>
                <div class="col-md-4 no-padding btn-3">
                    <button class="btn btn-default example5" href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" type="submit">Demande D'information <i class="fa fa-angle-right"></i></button>
                </div><!--col-md-4-->
            </div><!--col-md-12-->
            <!-- Hide Show Section -->
            <div class="col-md-12 product-hide-show-form no-padding">
                <div class="col-md-12 no-right-padding product-close-icon">
                    <i class="fa fa-times-circle"></i>
                </div>
                <h2>Pour effectuer la réservation de ce véhicule, s'il vous plaît procéder et de remplir vos informations de facturation et de carte de crédit informations ci-dessous pour traiter les paiements.</h2>
                <div class="col-md-12 no-padding product-right-bottom">
                    <form class="form-horizontal" onsubmit="javascript:return validatePayment(event);">
                        <div class="form-group">
                            <div class="col-sm-6 product-fst-input">
                                <input type="text" class="form-control" id="first_name" placeholder="PreNom">
                            </div>
                            <div class="col-sm-6 product-snd-input">
                                <input type="text" class="form-control" id="last_name" placeholder="Nom de famille">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 product-fst-input">
                                <input type="text" class="form-control" id="telephone" placeholder="Numero de telephone">
                            </div>
                            <div class="col-sm-3 product-duta-input">
                                <input type="text" class="form-control" id="city" placeholder="Ville">
                            </div>
                            <div class="col-sm-3 product-thrd-input">
                                <input type="text" class="form-control" id="province" placeholder="Province">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 product-fst-input">
                                <input type="text" class="form-control" id="postal_code" placeholder="Code postal">
                            </div>
                            <div class="col-sm-6 product-fst-input">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                    <h2>Information de paiment :</h2>
                    <div class="col-md-12 no-padding product-right-bottom">
                            <div class="form-group">
                                <div class="col-sm-6 product-fst-input">
                                    <input type="text" class="form-control" id="card_number" placeholder="Numero de carte">
                                </div>
                                <div class="col-sm-6 product-snd-input">
                                    <select id="card_type" class="form-control">
                                        <option value="">Type</option>
                                        <option value="Visa">Visa</option>
                                        <option value="MasterCard">MasterCard</option>
                                        <option value="Discover">Discover</option>
                                        <option value="Amex">Amex</option>
                                        <option value="JCB">JCB</option>
                                        <option value="Maestro">Maestro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <p>Date d'expiration :</p>
                                </div>
                                <div class="col-sm-3 product-fst-input">
                                    <input type="text" class="form-control" maxlength="2" id="month" placeholder="Mois">
                                </div>
                                <div class="col-sm-3 product-duta-input">
                                    <input type="text" class="form-control" maxlength="4" id="year" placeholder="Année">
                                </div>
                                <div class="col-sm-3 product-thrd-input">
                                    <input type="text" class="form-control" maxlength="4" id="cvv" placeholder="cvv">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" id="chkTerms"> J’ai lu et j’accepte expressement la <a href="">politique de confidential</a>
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
                                    <h6>Montant <?php echo (isset($item->buyItNowPrice))?'€'.$common->CurrencyConverter($item->buyItNowPrice):'NA';?></h6>
                                </div>
                                <div class="col-md-3 no-left-padding">
                                    <button type="submit" class="btn btn-default" id="btnPayment"> Soumettre <i class="fa fa-angle-right"></i></button>
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
                                    <h3><?php echo $item->title;?> Stock ID: #</h3> 
                                    <div class="col-md-4 frst-text">
                                        <h2>Vin &nbsp  &nbsp <span><?php echo (isset($item->vin))?strtoupper($item->vin):'NA';?></span></h2>
                                    </div>
                                    <div class="col-md-5 middle-text">    
                                        <h2>Mileage &nbsp  &nbsp <span><?php echo (isset($item->Mileage))?number_format($item->Mileage,2):'NA';?> Mi</span></h2>
                                    </div>
                                    <div class="col-md-3 prdtlast-text">   
                                        <h2>Prix  &nbsp &nbsp <span> <?php echo (isset($item->buyItNowPrice))?$common->CurrencyConverter($item->buyItNowPrice):'NA';?> &euro;</span></h2>
                                    </div>
                                    <div class="col-md-12 Caract no-padding">
                                        <h3>Caractéristiques  Features</h3> 
                                    </div>
                                    <!-- row 1-->
                                    <div class="col-md-12 tab-cardescription-1 no-padding">
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Year</h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border">
                                            <h2><?php echo (isset($item->Year))?$item->Year:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Make</h2>
                                        </div>
                                        <div class="col-md-2 side-border">
                                            <h2><?php echo (isset($item->Make))?$item->Make:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Model </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border-bottom">
                                            <h2><?php echo (isset($item->Model))?$item->Model:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 2-->
                                    <div class="col-md-12 tab-cardescription-2 no-padding">
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Trim</h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border no-left-padding">
                                            <h2><?php echo (isset($specs['Trim']))?$specs['Trim']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Engine</h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border">
                                            <h2><?php echo (isset($specs['Engine']))?$specs['Engine']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Drive Type </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border-bottom">
                                            <h2><?php echo (isset($specs['Drive Type']))?$specs['Drive Type']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 3-->
                                    <div class="col-md-12 tab-cardescription-1 no-padding">
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Mileage </h2>
                                        </div>
                                        <div class="col-md-2  col-xs-6 side-border">
                                            <h2><?php echo (isset($item->Mileage))?number_format($item->Mileage,2):'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">Exterior Color  </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border">
                                            <h2><?php echo (isset($specs['Exterior Color']))?$specs['Exterior Color']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">Interior Color </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border-bottom">
                                            <h2><?php echo (isset($specs['Interior Color']))?$specs['Interior Color']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 4-->
                                    <div class="col-md-12 tab-cardescription-2 no-padding">
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Transmission</h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border">
                                            <h2><?php echo (isset($specs['Transmission']))?$specs['Transmission']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Fuel Type</h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border">
                                            <h2><?php echo (isset($specs['Fuel Type']))?$specs['Fuel Type']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Body Type </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border-bottom">
                                            <h2><?php echo (isset($specs['Body Type']))?$specs['Body Type']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 5-->
                                    <div class="col-md-12 tab-cardescription-1 no-padding">
                                        <div class="col-md-2 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">Vehicle Title</h2>
                                        </div>
                                        <div class="col-md-2 side-border col-xs-6">
                                            <h2><?php echo (isset($specs['Vehicle Title']))?$specs['Vehicle Title']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">For Sale By </h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6 side-border-saller no-padding">
                                            <h2><?php echo (isset($specs['For Sale By']))?$specs['For Sale By']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-3 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">Number of Cylinders  </h2>
                                        </div>
                                        <div class="col-md-1 side-border-bottom">
                                            <h2><?php echo (isset($specs['Number of Cylinders']))?$specs['Number of Cylinders']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 6 -->
                                    <div class="col-md-12 col-sm-12 col-xs-12 tab-cardescription-2 no-padding">
                                        <div class="col-md-3 col-xs-6">
                                            <h2 class="text-hlka-color">Safety Features </h2>
                                        </div>
                                        <div class="col-md-3 col-xs-6 side-border-saller">
                                            <h2><?php echo (isset($specs['Safety Features']))?$specs['Safety Features']:'NA';?></h2>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h2 class="text-hlka-color">Options  </h2>
                                        </div>
                                        <div class="col-md-4 col-xs-6 no-left-padding">
                                            <h2><?php echo (isset($specs['Options']))?$specs['Options']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 7 -->
                                    <div class="col-md-12 tab-cardescription-1 no-padding">
                                        <div class="col-md-2 col-xs-6 no-right-padding">
                                            <h2 class="text-hlka-color">Warranty  </h2>
                                        </div>
                                        <div class="col-md-9 col-xs-6 no-left-padding">
                                            <h2><?php echo (isset($specs['Warranty']))?$specs['Warranty']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                    <!-- row 8 -->
                                    <div class="col-md-12 tab-cardescription-2 no-padding">
                                        <div class="col-md-3 col-xs-6">
                                            <h2 class="text-hlka-color">Power Options  </h2>
                                        </div>
                                        <div class="col-md-8 col-xs-6 no-left-padding">
                                            <h2><?php echo (isset($specs['Power Options']))?$specs['Power Options']:'NA';?></h2>
                                        </div>
                                    </div> <!-- col-md-12 -->
                                </div>   
                            </div>
                            <div class="tab-pane fade" id="tab2default">
                                <div class="col-md-12 tabs-snd-body no-padding">
                                    <iframe src="<?php echo DEFAULT_URL?>/includes/code/ajax_ebay_desc.php" width="543" height="400" scroll="no" style="border: none;">
                            </iframe>
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
                        <h4 class="product-right-price"><?php echo $common->CurrencyConverter($item->buyItNowPrice);?> &euro;</h4>
                    </div>
                </div>
                <div class="col-md-12 appels no-padding">
                    <h1 class="product-right-oneline">Appelez nous en Direct 01.76.63.32.16</h1>
                    <h5 class="product-right-reser">SÉLECTIONNEZ LES SERVICES DÉSIRÉS</h5>
                    <h6 class="product-right-pour">Pour la France, les véhicules arriveront à Trappes (Yvelines 78). Une livraison à Domicile est possible, merci de nous contacter</h6>
                </div>
                <div class="col-md-12 product-form-right">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label trans-leb">Prestation SYLC:</label>
                            <div class="col-sm-4 product-form-1">
                                <select class="form-control" name="logistique_pays" id="logistique_pays">
                                    <option selected="selected" class="list_select_1" value="France (Le Havre)">France </option>
                                    <option class="list_select_0" value="Allemagne (Hambourg)">Allemagne </option>
                                    <option class="list_select_1" value="Belgique (Anvers)">Belgique </option>
                                    <option class="list_select_0" value="Espagne (Barcelone)">Espagne </option>
                                22374
                                    <option class="list_select_0" value="Luxembourg">Luxembourg</option>
                                    <option class="list_select_1" value="Rotterdam">Rotterdam</option>
                                    <option class="list_select_0" value="Suisse">Suisse</option>
                                </select>
                            </div>
                            <div class="col-sm-4 product-form-2">
                                <input type="text" readonly="readonly" class="form-control" name="logistique_pays1" id="inputPassword" placeholder="$3000.00" value="<?php echo $prestation;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Transport Terrestre USA:<br>
                            <span style="font-size:14px">Assurance incluse:</span></label>
                            <div class="col-sm-4 product-form-1">
                                <select class="form-control" name="transport_terrestre" id="transport_terrestre">
                                    <option value="groupé">groupé</option>
                                    <option value="sécurisé">sécurisé</option>
                                </select>
                            </div>
                            <div class="col-sm-4 product-form-2">
                                <input type="text" readonly="readonly" class="form-control" name="transport_terrestre1" id="inputPassword" value="<?php echo $transportUSA;?>" placeholder="$1200.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label trans-leb">Transport - International:</label>
                            <div class="col-sm-4 product-form-1">
                                <select class="form-control" name="transport_international" id="transport_international">
                                    <option value="économique">économique</option>
                                    <option value="conteneur">conteneur</option>
                                    <option value="avion">avion</option>
                                </select>
                            </div>
                            <div class="col-sm-4 product-form-2">
                                <input type="text" readonly="readonly" class="form-control" name="transport_international1" id="inputPassword" placeholder="$2000.00" value="<?php echo $transport;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label trans-leb">Bank, fedex and doc fees:</label>
                            <div class="col-sm-4 product-form-2">
                                <input type="text" readonly="readonly" class="form-control" value="<?php echo $bank;?>" id="inputPassword" placeholder="$260.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-7 control-label trans-leb">Frais Transitaire - Débarquement, Traction & Dépotage:</label>
                            <div class="col-sm-5 product-form-2">
                                <input type="text" readonly="readonly" class="form-control" value="<?php echo $frais;?>" id="inputPassword" placeholder="€780.00">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 select-text-bottom-form">
                    <h1>Sélectionnez les options désirés</h1>
                    <div class="col-md-9 no-padding">
                        <div class="checkbox">
                            <label>
                                <input id="chkHomologation" type="checkbox"> Homologation - Francisation, passage aux mines<br> 
                                <h3 class="leger">pour tous vehicule léger obligatoire pout tout vehicule de moins de 30 ans</h3>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 homolgy no-padding"> 
                        <input type="text" class="form-control" readonly="readonly" id="txtHomologation" placeholder="€">
                    </div>
                </div>
                <div class="col-md-12 prixi-1">
                    <h1>PRIX TOTAL </h1>
                    <div class="col-md-6 no-padding">
                        <div class="checkbox">
                            <h3 class="rendu">H.T rendu le port sélectionné </h3>
                            <label>
                                <input id="chkOverThirty" type="checkbox"> Voiture 30 ans et plus 
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 form-150"> 
                        <input type="text" class="form-control" id="priceHT" readonly="readonly" value="<?php echo $priceHT;?>" placeholder="15068">
                    </div>
                </div>
                <div class="col-md-12 prixi-2">
                <h1>PRIX TOTAL </h1>
                    <div class="col-md-6 no-padding rendu">
                        <h3>Prix Total TTC tout inclus rendu </h3>
                        <h3>le port selectionné </h3> 
                    </div>
                    <div class="col-md-6 no-padding"> 
                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $priceTTC;?>" id="priceTTC" placeholder="26,848.80">
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
<input type="hidden" id="prestation" value="<?php echo $prestation;?>" />
<input type="hidden" id="transportUSA" value="<?php echo $transportUSA;?>" />
<input type="hidden" id="transport" value="<?php echo $transport;?>" />
<input type="hidden" id="bank" value="<?php echo $bank;?>" />
<input type="hidden" id="frais" value="<?php echo $frais;?>" />
<input type="hidden" id="carPrice" value="<?php echo $item->buyItNowPrice;?>" />
<input type="hidden" id="item" value="<?php echo strtoupper($item->title);?>" />
<script>
    $(document).ready(function(){
        $(".example5").colorbox();
        $("#btn-1-product").click(function(){
            $(".product-hide-show-form").show('blind');
        });
        $(".product-close-icon").click(function(){
            $(".product-hide-show-form").hide('blind');
        });
        $('#chkHomologation').on('change',function(){
            if($('#chkHomologation:checked').length){
                $('#txtHomologation').val(3500);
            }else{
                $('#txtHomologation').val('€');
            }
            updatePrix();
        });
        $('#chkOverThirty').on('change',function(){
            updatePrix();
        });
        $("#year,#cvv").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
        $("#month").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
    });
    $('.paroduct-carosel img').click(function(){
        $('.primary-image').attr('src',$(this).attr('src'));
    });
    function wishlistcar(carid,cartype,carname,carimg,carprice){
        if(!confirm("Are you sure to add this car to Favorite")){
            return false;
        }
        var wishlist = $('#car_'+carid);
        var chk = 'checked';
        divname = "#saved"+carid;
        $.ajax({
            type: "POST",
            url: "<?php echo DEFAULT_URL?>/ajax_wishlistcar.php",
            data: { carid: carid, cartype: cartype, carname: carname, carimg: carimg, carprice: carprice, ischk: chk},
            dataType: "html",
            success: function(data) {
                  $(divname).remove();
                  alert('Ajouté à la liste');
            }
        });
    }
    function updatePrix(){
        var prestation = $('#prestation').val();
        var transportUSA = $('#transportUSA').val();
        var transport = $('#transport').val();
        var bank = $('#bank').val();
        var frais = $('#frais').val();
        var carPrice = $('#carPrice').val();
        var homologation = 0;
        //check homologation
        if($('#chkHomologation:checked').length){
            homologation = 3500;
        }
        var priceHT = parseFloat(carPrice) + parseFloat(prestation) + parseFloat(transportUSA) + parseFloat(transport) + parseFloat(bank) + parseFloat(frais) + parseFloat(homologation);
        //over 30 year
        if($('#chkOverThirty:checked').length){
            priceTTC = ( (parseFloat(carPrice) + 2000) * 0.05) + parseFloat(carPrice) + parseFloat(prestation) + parseFloat(transportUSA) + parseFloat(transport) + parseFloat(bank) + parseFloat(frais);
        }else{
            priceTTC = ( (parseFloat(carPrice) + 2000) * 0.10 * 0.20) + parseFloat(carPrice) + parseFloat(prestation) + parseFloat(transportUSA) + parseFloat(transport) + parseFloat(bank) + parseFloat(frais) + parseFloat(homologation);
        }
        $('#priceHT').val(parseFloat(priceHT).toFixed(2));
        $('#priceTTC').val(parseFloat(priceTTC).toFixed(2));
    }
    function validatePayment(e){
        e.preventDefault();
        $('.validateError').remove();
        $('.validateSuccess').remove();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var address = $('#address').val();
        var telephone = $('#telephone').val();
        var city = $('#city').val();
        var province = $('#province').val();
        var postal_code = $('#postal_code').val();
        var email = $('#email').val();
        var card_number = $('#card_number').val();
        var card_type = $('#card_type').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var cvv = $('#cvv').val();
        var car_price = $('#carPrice').val();
        var item = $('#item').val();
        if(first_name.trim() == ""){
            $('#first_name').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrez le nom</div>");
            return false;
        }
        if(last_name.trim() == ""){
            $('#last_name').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Nom de famille</div>");
            return false;
        }
        if(address.trim() == ""){
            $('#address').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Address</div>");
            return false;
        }
        if(telephone.trim() == ""){
            $('#telephone').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Numero de telephone</div>");
            return false;
        }
        if(city.trim() == ""){
            $('#city').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Ville</div>");
            return false;
        }
        if(province.trim() == ""){
            $('#province').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Province</div>");
            return false;
        }
        if(postal_code.trim() == ""){
            $('#postal_code').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Code Postal</div>");
            return false;
        }
        if(email.trim() == ""){
            $('#email').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Email</div>");
            return false;
        }
        if(card_number.trim() == ""){
            $('#card_number').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Numero de carte</div>");
            return false;
        }
        if($('#card_type').val() == ''){
            $('#card_type').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît sélectionner le type de carte</div>");
            return false;
        }
        if(month.trim() == ""){
            $('#month').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Mois</div>");
            return false;
        }
        if(year.trim() == ""){
            $('#year').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Année</div>");
            return false;
        }
        if(cvv.trim() == ""){
            $('#cvv').focus();
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer cvv</div>");
            return false;
        }
        if($('#chkTerms:checked').length == 0){
            $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît accepter politique de confidentialité</div>");
            return false;
        }
        
        $('#btnPayment').hide();
        jQuery("#btnPayment").after('<img class="ajaxLoader" src="<?php echo DEFAULT_URL; ?>/images/popup/loading.gif" />');
        //ajax request
        $.ajax({
            type: "POST",
            url: "<?php echo DEFAULT_URL?>/ajax_paypal_direct_payment.php",
            data: { first_name: first_name, last_name: last_name, address: address, telephone: telephone, city: city, province: province,postal_code: postal_code,email: email,card_number: card_number,card_type: card_type,month: month,year: year,cvv: cvv,car_price:car_price,item:item},
            success: function(response) {
                response = $.parseJSON(response);
                if(response.ACK == 'Failure'){
                    $('.product-close-icon').after("<div class=\"validateError\">"+response.L_LONGMESSAGE0+"</div>");
                }
                if(response.ACK == 'Success'){
                    $('.product-close-icon').after("<div class=\"validateSuccess\">Payment Successfully Done. Please check email for details.</div>");
                }
                $('.ajaxLoader').remove();
                $('#btnPayment').show();
            }
        });
    }
</script>
<style>
.validateError{  color: red;  border: 1px solid red;  margin: 10px 0px;  padding: 5px 5px;}
.validateSuccess{  color: green;  border: 1px solid green;  margin: 10px 0px;  padding: 5px 5px;}
</style>
