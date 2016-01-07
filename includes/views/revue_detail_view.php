<script type="text/javascript"src="https://content.jwplatform.com/libraries/GxpjMdbJ.js"></script>
<!-- car deatails -->
<section class="car-details-1">
  <div class="container">
    <div class="col-md-12 accueil-line">
      <ul class="list-inline list-unstyled">
        <li><a href="<?php echo DEFAULT_URL ?>">Accueil </a><i class="fa fa-angle-right"></i></li>
        <li><a href="<?php echo DEFAULT_URL.'/revue_automobiles' ?>">Revues Automobiles</a> <i class="fa fa-angle-right"></i> </li>
        <li ><a href="<?php echo DEFAULT_URL.'/revue_automobiles?makeID='.$make.'&modelID=&Year='; ?>"><?php echo $make_name." "; ?></a><i class="fa fa-angle-right"></i></li>
        <li ><a href="<?php echo DEFAULT_URL.'/revue_automobiles?makeID='.$make.'&modelID='.$model.'&Year=' ?>"><?php echo $model_name." "; ?></a><i class="fa fa-angle-right"></i></li>
        <li class="car-details-active"><a href="<?php echo DEFAULT_URL.'/revue_automobiles?makeID='.$make.'&modelID='.$model.'&Year='.$year; ?>"><?php echo $year; ?></a></li>
      </ul>
    </div>
    <div class="col-md-12 details-car">
      <div class="col-md-6 col-sm-6 col-xs-12 img-1">
        <img src="<?php echo DEFAULT_URL.'/image_resizer.php?img='.DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$image.'&newHeight=359&newWidth=565';?>" class="img-responsive">
      </div>
      <div class="col-md-5 col-sm-6 col-xs-12 col-md-offset-1 left-content-car">
        <div class="car-left-content-heading">
          <h1><?php echo $title; ?></h1>
        </div>
        <div class="car-left-content">
          <h2>PDSF de départ</h2>
          <h3><?php echo $pdsf; ?></h3>
        </div>
        <div class="car-left-content">
          <h2>MPG Estimé</h2>
          <h3><?php echo $mpg; ?></h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!--End car deatails -->

<!-- start tab section -->

<section class="list-car-details">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
            <ul class="nav nav-tabs">
                <li class="first-tab"><a href="#tab1default" data-toggle="tab"> Vue d'ensemble</a></li>
                <li class="marque"><a href="#tab2default" data-toggle="tab"> Photos & Vidéos</a></li>
                <li class="active" id="active-car-details"><a href="#tab3default" data-toggle="tab"> Avis d'experts</a></li>
                <li class="marque"><a href="#tab4default" data-toggle="tab"> Caractéristiques et spécifications</a></li>
            </ul>
                <div class="panel-body no-padding">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab1default">
                          <!--div class="col-md-12 feature-list no-padding">
                            <h1 class="feature-tab-heading">Notable Features</h1>
                            <div class="col-md-4">
                              <ul style="list-style-type:square">
                                <li><span>Fold-into-floor second and third rows</span></li>
                                <li><span>Available dual-screen Blu-ray entertainment system</span></li>
                                <li><span>Seats seven</span></li>
                                <li><span>Value-priced American Value Package</span></li>
                                <li><span>Related to Chrysler Town & Country</span></li>
                              </ul>
                            </div>
                            <div class="col-md-4">
                              <h2>Available Engines:</h2>
                              <p>283-hp, 3.6-liter V-6 (regular gas)</p>
                            </div>
                            <div class="col-md-4">
                              <h2>Transmissions:</h2>
                              <p>6-speed multi-speed automatic w/OD and auto-manual<p>
                            </div>
                          </div>

                          <div class="col-md-12 feature-list no-padding">
                             <h1 class="feature-tab-heading">Notable Features</h1>
                            <div class="col-md-6">
                               <h2 class="list-what">What We Like:</h2>
                              <ul style="list-style-type:square">
                                <li><span>Seating flexibility </span></li>
                                <li><span>Value </span></li>
                                <li><span>Visibility</span></li>
                                <li><span>Feature-packed rear entertainment system </span></li>
                                <li><span>Soft ride</span></li>
                              </ul>
                            </div>
                            <div class="col-md-6">
                               <h2 class="list-what">What We Don't Like:</h2>
                              <ul style="list-style-type:square">
                                <li><span>Accelerator lag </span></li>
                                <li><span>Comfort of Stow 'n Go seats </span></li>
                                <li><span>Outdated dashboard multimedia system </span></li>
                                <li><span>Spotty crash tests </span></li>
                                <li><span>Reliability for current generation </span></li>
                              </ul>
                            </div>
                          </div-->
<?php echo $ensemble; ?>
                        </div> <!-- tab1default -->
                        
                        <div class="tab-pane fade" id="tab2default">
                          <div class="col-md-12 car-details-thumbnail no-padding">
                          <?php   
                          $video_divs = '';
                            if(!empty($all_media)){
								foreach($all_media as $media)
								{ 
                            ?>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
							<?php if($media['media_type'] =='youtube_link') { ?>
                              <a href="<?php echo $media['media_name']; ?>" class="fancybox-media-youtube" id="<?php echo $media['id']; ?>" class="thumbnail">
                              <?php }else if($media['media_type'] =='image'){?>
								  <a href="<?php echo DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$media['media_name']; ?>" class="fancybox-media-youtube" id="<?php echo $media['id']; ?>" class="thumbnail">
								 <?php }else{
									 
									//$video_divs .= "<div id='vid".$media['id']."' style='width:600px;height:400px;display:none;'></div>" 
										
												
								 ?>
								  <a data-width="352" data-height="270" data-thumb='<?php echo $media['video_thumb'];?>'  rel="<?php echo DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$media['media_name']; ?>" class="fancybox-media-video<?php echo $media['id']; ?>" id="<?php echo $media['id']; ?>" class="thumbnail">  
                                <?php }?>
                                <img  src="<?php /*echo $media['video_thumb'];*/echo DEFAULT_URL.'/image_resizer.php?img='.$media['video_thumb'].'&newHeight=140&newWidth=220';?>" alt="...">
                                <?php if($media['media_type'] =='youtube_link'  || $media['media_type'] =='video') { ?>
                                <div class="video-play"><img  src="<?php echo DEFAULT_URL.'/images/video-play.png';?>" alt="..."></div>
								<?php }?>
                              </a>
                            </div>
                            
                            <?php
                            
								}
                            }
                            ?>
                            <!--div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/listing/img2.png" alt="...">
                              </a>
                            </div>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/listing/img3.png" alt="...">
                              </a>
                            </div>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/listing/img4.png" alt="...">
                              </a>
                            </div>

                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/recherche/img-1.png" alt="...">
                              </a>
                            </div>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/recherche/img-2.png" alt="...">
                              </a>
                            </div>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/recherche/img-1.png" alt="...">
                              </a>
                            </div>
                            <div class="col-xs-6 col-md-3 car-details-thumbnail-img">
                              <a href="#" class="thumbnail">
                                <img src="images/recherche/img-5.png" alt="...">
                              </a>
                            </div-->

                          </div>
                        </div> <!-- tab2default -->

                        <div class="tab-pane fade in active" id="tab3default">
                          <div class="col-md-12 no-padding details-car-content">
                            <div class="col-md-8 col-sm-6 col-xs-12 no-padding">
                           <?php echo $expert;?>
							</div>
                            <div class="col-md-4 col-sm-6 col-xs-12 right-content no-right-padding">
                              <div id="flag-lg">
                                <h3 class="merci">Merci pour votre demande</h3>
                                <div class="text-center" id="fst-hide-btn">
                                  <a href="car-details-1.html"><button type="button" class="btn btn-primary">Télécharger la brochure <i class="fa fa-angle-double-right"></i></button></a>
                                </div>
                                <div class="after-hide" id="PlaceButtonAfterSubmission">
                                  <h4>Telechargez gratutement la brochure. Rentrez simplement vos informations pour avoir acces a votre brochure.</h4>
                                  <h5>Le lien de telechargeement apparaitra sous la forme une fois celle-ci completee, enjoy!!!</h5>
                                </div>
                              </div>
                              <div id="flag"></div>
                                <div class="car-details-form" id="carDetailsForm">
                                  <form class="form-horizontal" id="ReviewForm" action="ajax/review_process_form.php"  method="POST">
                                    <input type="hidden" value="<?php echo $make_name;?>"  name="makeName">
                                    <input type="hidden" value="<?php echo $model_name;?>"  name="modelName">
                                    <input type="hidden" value="<?php echo $year;?>"  name="Year">
                                    <input type="hidden" value="<?php echo $currentUrl;?>"  name="currentUrl">
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                        <input type="text" required class="form-control" name="inputName" id="inputName" placeholder="Name">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                        <input type="email" required class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                        <input type="tel" pattern='\d{10}' title='Phone Number (Format: 10 digit number)' required class="form-control" name="inputPhone" id="inputPhone" placeholder="Phone">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                        <textarea class="form-control" required placeholder="Message" name="inputMessage" id="inputMessage" rows="2"></textarea>
                                      </div>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox"  name="InputCheckbox">Recherchez vous ce type de vehicule?
                                      </label>
                                    </div>
                                    <div class="main-btn">
                                      <button type="submit" class="btn btn-primary">Soumettre  <i class="fa fa-angle-double-right"></i></button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                          </div>
				
                        </div> <!-- tab3default -->

                        <div class="tab-pane fade" id="tab4default">
                          <!--div class="col-md-12 forth-tab no-padding">
                            <div class="col-md-12">
                              <h1 class="feature-tab-heading">Warranty</h1>
                                <div class="col-md-3 no-padding">
                                  <p class="basic-table">Basic</p>
                                  <p class="basic-table">Powertrain</p>
                                  <p class="basic-table">Corrosion Perforation</p>
                                  <p class="basic-table">Roadside Assistance Coverage</p>
                                </div>
                                <div class="col-md-3 text-right no-padding">
                                  <p class="basic-table">36 months/36,000 miles</p>
                                  <p class="basic-table">60 months/100,000 miles</p>
                                  <p class="basic-table">60 months/100,000 miles</p>
                                  <p class="basic-table">60 months/100,000 miles</p>
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                              <h1 class="feature-tab-heading">Standard Features & Options</h1>
                              <table class="table table-striped table-condensed">
                                    <tr>
                                        <td class="table-head">Styles</td>
                                        <td>AVP/SE</td>
                                        <td>SXT</td>
                                        <td>R/T</td>                                          
                                    </tr>
                                
                                <tbody>
                                  <tr>
                                      <td class="table-head">Starting MSRP</td>
                                      <td>$21,795</td>
                                      <td>$27,395</td>
                                      <td>$30,995</td>                                       
                                  </tr>
                                  <tr>
                                      <td class="table-head">Body Exterior</td>
                                      <td>AVP/SE</td>
                                      <td>SXT</td>
                                      <td>R/T</td>                                       
                                  </tr>
                                  <tr>
                                      <td class="table-head">Heated door mirrors</td>
                                      <td><i class="fa fa-circle"></i></td>
                                      <td><i class="fa fa-circle"></i></td>
                                      <td><i class="fa fa-circle"></i></td>                                      
                                  </tr>
                                  <tr>
                                      <td class="table-head">Power door mirrors</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>                                       
                                  </tr>
                                  <tr>
                                      <td class="table-head">Right rear passenger:power sliding</td>
                                      <td>--</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                    </tr> 

                                    <tr>
                                      <td class="table-head">Spoiler</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                    </tr>

                                    <tr class="table-head">
                                      <td>Trailer hitch receiver</td>
                                      <td>--</td>
                                      <td>--</td>
                                      <td class="price">$895</td>
                                    </tr>

                                    <tr class="table-head">
                                      <td>Left rear passenger door:power sliding</td>
                                      <td>--</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                    </tr>

                                    <tr class="table-head">
                                      <td>Right rear passenger:power sliding</td>
                                      <td>--</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                    </tr>
                                    <tr class="table-head">
                                      <td>Number of doors:4</td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                      <td><i class="fa fa-circle"></td>
                                    </tr>

                                </tbody>
                              </table>
                              </div>
                          </div-->
                          <?php echo $characteristique; ?>
                        </div> <!-- tab4default -->
                        
                    </div> <!-- tab-content -->
                </div><!-- panel body -->
              </div><!-- panel -->
          </div><!-- col-md-12 -->
    </div><!-- tab2default -->
    </div><!-- container --> 
  </section>
<script type="text/javascript">
  $(document).ready(function(){
<?php 
 if(!empty($all_media)){
								foreach($all_media as $media)
								{ 

if($media['media_type'] =='video'){
	
	$vid = $media['id'];
	$video = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$media['media_name']; 
	$defurl = DEFAULT_URL;
	$thumb = $media['video_thumb'];
										
?>

	
  var idv = '<?php echo $vid; ?>';
  var thmb = '<?php echo $thumb; ?>';
  var vid = '<?php echo $video; ?>';
  var defurl = '<?php echo $defurl; ?>';
 $(".fancybox-media-video"+idv).fancybox({
        'content':'<div id="mediaspace">--------------------------------------------------------</div>',
        maxWidth:800,
        maxHeight:600,
        fitToView:false,
        width:'700',
        height:'400',
        autoSize:false,
        closeClick:false,
        openEffect:'none',
        closeEffect:'none',
        afterShow:function () {
            jwplayer('mediaspace').setup({
                'flashplayer': defurl+'/jwplayer/jwplayer.flash.swf',
                'file':vid,
                'image':thmb,
                'provider':'youtube',
                'height':400,
                'width':700,
                'controlbar.position':'bottom'

            });
        }
    });
    
<?php } }}?>
});
   </script>
