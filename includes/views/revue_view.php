<script src="<?php echo DEFAULT_URL; ?>/js/review_function.js"></script>
<section class="list-ciiii">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
        <img src="images/ash-bg.png" class="img-responsive commence">
        <div class="commence-text">
          <div class="form-group form-inline">
            <div class="col-md-4 col-xs-12 col-sm-6 no-right-padding">
              <h3>Lire l'avis d'une voiture americaine en particulier</h3>
              <h4>Sélectionnez Marque, modèle et l'année:</h4>
            </div>

              <div class="all-slect-form">
              <form method="GET" action=""  > 
                <div class=" form-group for-sm">
                  <div class="">
                    <select name="makeID" id="makeID" class="form-control prothom">
						
						<option value="">-- Makes --</option>
                    <?php 
                    if(!empty($all_makes)){ 
						foreach($all_makes as $idkey => $make_name){
						?>  
                      <option value="<?php echo $idkey;?>"  
<?php if(isset($makeID) ){

if(($makeID != '') && ($makeID == $idkey)){ echo "selected='selected'"; }}?>><?php echo $make_name; ?></option>
                    <?php
						}
                     } ?>
                    </select>
                   </div> 
                </div>

                 <div class=" form-group for-sm">
                  <div class="">
                    <select name="modelID" id="modelID" class="form-control prothom">
                      <option value="">-- Models --</option>
                      
                      <?php 
                    if(!empty($all_models)){ 
						foreach($all_models as $idkey => $model_name){
						?>  
                      <option value="<?php echo $idkey;?>"  
<?php if(isset($modelID) ){

if(($modelID != '') && ($modelID == $idkey)){ echo "selected='selected'"; }}?>><?php echo $model_name; ?></option>
                    <?php
						}
                     } ?>
                    </select>
                   </div> 
                </div>

                <div class=" form-group for-sm">
                  <div class="">
                    <select name="Year" id="Year" class="form-control prothom">
                      <option value="">-- Years --</option>
                      
                      <?php 
                    if(!empty($all_years)){ 
						foreach($all_years as $yeaid => $yea){
						?>  
                      <option value="<?php echo $yeaid;?>"  
<?php if(isset($Year) ){

if(($Year != '') && ($Year == $yeaid )){ echo "selected='selected'"; }}?>><?php echo $yea; ?></option>
                    <?php
						}
                     } ?>
                    </select>
                   </div> 
                </div>
               
                <div class="list-research-img"><input type="submit" value="submit" /></div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
</section>

<section class="review-scetion-2 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
  <div class="container">
    <div class="row">
      <div class="review-scetion-heading">
        <h1>Sylc Export Avis</h1>
        <p>Lire sur les avantages et les inconvénients de chacune de ces voitures, sélectionnés par nos rédacteurs et mises à jour régulièrement afin de vous aider dans votre recherche de voiture.</p>
      </div>
    </div>
  </div>
</section>



<section class="list-car-details">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
            <ul class="nav nav-tabs">
                <li class="<?php if(!isset($startNew)){echo "active";}else{echo "";} ?>">
					<a href="#tab1default" data-toggle="tab" id="hover-tab-1">
						<img src="images/car-review/1st-car-black.png" class="fst-icon" style="<?php if(isset($startNew)){echo "display:inline;";}else{echo "";} ?>"> 
						<img src="images/car-review/hover-white-caar.png" class="hover-icon" style="<?php if(isset($startNew)){echo "display:none;";}else{echo "";} ?>"> 
						Plus de 30 ans
					</a>
				</li>
                <li class="marque <?php if(isset($startNew)){echo "active";}else{echo "";} ?>" id="hover-tab-2">
					<a href="#tab2default" data-toggle="tab">
						<i class="fa fa-car"></i>
                Voitures neuves</a>
                </li>
            </ul>
                <div class="panel-body no-padding">
                    <div class="tab-content">
                        <div class="tab-pane fade in <?php if(!isset($startNew)){echo "active in";}else{echo "";} ?>" id="tab1default">
						<?php if(!empty($reviewsArrOld)){
							foreach($reviewsArrOld as $reviewArrOld){ //print_r($reviewArrNew);die;
							 ?>
                          <div class="col-md-12 col-xs-12 col-sm-12 car-rivew-details post">
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
                              <h3><?php echo $reviewArrOld['title']; ?></h3>
                              <a target="_blank" href="/detail-review?reviewID=<?php echo base64_encode(convert_uuencode($reviewArrOld['id'])); ?>"><img src="<?php echo DEFAULT_URL.'/image_resizer.php?img='.$reviewArrOld['image'].'&newWidth=565&newHeight=359'; ?>" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s" id="car-details-car-review">
                              <img src="images/car-review/left-qute.png" class="left-qute">
                              <h2>
                                <?php echo $reviewArrOld['short_description']; ?>
                                <img src="images/car-review/right-qute.png" class="right-qute"></i>
                              </h2>
                              <a target="_blank" href="/detail-review?reviewID=<?php echo base64_encode(convert_uuencode($reviewArrOld['id'])); ?>"><button class="btn btn-default" id="default-btn" type="submit">En savoir plus</button></a>
                            </div>
                          </div>
                        <?php 
							}
                        }else{ echo "No records found.";} ?> 
                        

                  
                        <div class="col-md-12 pagination text-center">
							<ul class="list-inline list-unstyled">        
								  <?php
								
									if($backOld >=0) { 
										echo '<li class="pre"><i class="fa fa-angle-double-left"></i><a href="'.$page_name.'?makeID='.$makeID.'&modelID='.$modelID.'&Year='.$Year.'&startOld='.$backOld.'&limit='.$limit.$addToPagging.'" class="page-left">
										 Précédent</a></li>';
									}else{
										echo '<li class="pre"><i class="fa fa-angle-double-left"></i><a href="javascript:" class="page-left" onclick="void(0);"> Précédent</a></li>';
									}
								 ?>
								  
									<?php
									$i=0;
									$l=1;
									for($i=0;$i < $total_rowsOld;$i=$i+$limit){
									if($i <> $euOld){
										echo "<li><a href='".$page_name."?makeID=".$makeID."&modelID=".$modelID."&Year=".$Year."&startOld=".$i."&limit=".$limit.$addToPagging."'>$l</a></li>";
									}
										else { echo '<li class="active" >'.$l.'</li>';}        /// Current page is not displayed as link and given font color red
										$l=$l+1;
									}
								?>
								 
								  <?php
									if($this1Old < $total_rowsOld) { 
										echo '<li class="next"> <a href="'.$page_name.'?makeID='.$makeID.'&modelID='.$modelID.'&Year='.$Year.'&startOld='.$nextOld.'&limit='.$limit.$addToPagging.'" class="page-right">Suivant </a><i class="fa fa-angle-double-right"></i></li>';
									}else{
										echo '<li class="next"><a href="javascript:" class="page-right" onclick="void(0);"> Suivant </a><i class="fa fa-angle-double-right"></i></li>';
									}
								 ?>  
							   </ul>
										   
									  <!--ul class="list-inline list-unstyled">
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
									  </ul-->
									
									
									
						</div>
						
                            
                       
                        </div> <!-- tab1default -->
                        
                        <div class="tab-pane fade <?php if(isset($startNew)){echo "active in";}else{echo "";}?>" id="tab2default">
                          
                       <?php if(!empty($reviewsArrNew)){
							foreach($reviewsArrNew as $reviewArrNew){ //print_r($reviewArrNew);die;
							 ?>
                          <div class="col-md-12 col-xs-12 col-sm-12 car-rivew-details">
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
                              <h3><?php echo $reviewArrNew['title']; ?></h3>
                              <img src="<?php echo DEFAULT_URL.'/image_resizer.php?img='.$reviewArrNew['image'].'&newWidth=565&newHeight=359'; ?>" class="img-responsive">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s" id="car-details-car-review">
                              <img src="images/car-review/left-qute.png" class="left-qute">
                              <h2>
                                <?php echo $reviewArrNew['short_description']; ?>
                                <img src="images/car-review/right-qute.png" class="right-qute"></i>
                              </h2>
                              <a target="_blank" href="/detail-review?reviewID=<?php echo base64_encode(convert_uuencode($reviewArrNew['id'])); ?> "><button class="btn btn-default" id="default-btn" type="submit">En savoir plus</button></a>
                            </div>
                          </div>
						<?php 
							}
                        }else{ echo "No records found.";} ?> 
                        
                        
                        
                        
                        <div class="col-md-12 pagination text-center">
							<ul class="list-inline list-unstyled">        
								  <?php
								
									if($backNew >=0) { 
										echo '<li class="pre"><i class="fa fa-angle-double-left"></i><a href="'.$page_name.'?makeID='.$makeID.'&modelID='.$modelID.'&Year='.$Year.'&startNew='.$backNew.'&limit='.$limit.$addToPagging.'" class="page-left">
										 Précédent</a></li>';
									}else{
										echo '<li class="pre"><i class="fa fa-angle-double-left"></i><a href="javascript:" class="page-left" onclick="void(0);"> Précédent</a></li>';
									}
								 ?>
								  
									<?php
									$i=0;
									$l=1;
									for($i=0;$i < $total_rowsNew;$i=$i+$limit){
									if($i <> $euNew){
										echo "<li><a href='".$page_name."?makeID=".$makeID."&modelID=".$modelID."&Year=".$Year."&startNew=".$i."&limit=".$limit.$addToPagging."'>$l</a></li>";
									}
										else { echo '<li class="active" >'.$l.'</li>';}        /// Current page is not displayed as link and given font color red
										$l=$l+1;
									}
								?>
								 
								  <?php
									if($this1New < $total_rowsNew) { 
										echo '<li class="next"> <a href="'.$page_name.'?makeID='.$makeID.'&modelID='.$modelID.'&Year='.$Year.'&startNew='.$nextNew.'&limit='.$limit.$addToPagging.'" class="page-right">Suivant </a><i class="fa fa-angle-double-right"></i></li>';
									}else{
										echo '<li class="next"><a href="javascript:" class="page-right" onclick="void(0);"> Suivant </a><i class="fa fa-angle-double-right"></i></li>';
									}
								 ?>  
							   </ul>
										   
									  <!--ul class="list-inline list-unstyled">
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
									  </ul-->
									
									
									
						</div>
						
                        
                        </div> <!-- tab2default -->
                        <?php //if($total_rows > $limit) {?>
                        
									
                            <?php //} ?>
                    </div> <!-- tab-content -->
                </div><!-- panel body -->
              </div><!-- panel -->
          </div><!-- col-md-12 -->
    </div><!-- tab2default -->
    </div><!-- container --> 
  </section>

<!--************************** xs sectoion *******************-->

<!--<section class="xs-car-section">
  <div class="container">
    <div class="row">
    </div>
  </div>
</section> -->


    <!---********************** carosul 2 **********************-->
    

    
<section class="car-rivew-carosel wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Choix Éditoriale</h1> 
        <div id="Carousel" class="carousel slide"> 
          <!-- Carousel items -->
          <div class="carousel-inner"> 
            
            
            
            <?php 
            if(!empty($editorialReviews)) { 
				
				foreach($editorialReviews as $key => $editorialReview){
					
					if($key ==0) {
					
				
			 ?>
            
            
            <div class="item active">
                
                <div class="row" id="carosel-all-img">
					<?php foreach($editorialReview as $editorialRev) {?>
					<div class="col-md-4">
						<a target="_blank" href="/detail-review?reviewID=<?php echo base64_encode(convert_uuencode($editorialRev['id'])); ?>" class="">
							<img src="<?php echo DEFAULT_URL.'/image_resizer.php?img='.$editorialRev['image'].'&newWidth=308&newHeight=225'; ?>" alt="Image" style="max-width:100%;">
						</a>
						<h2><?php echo $editorialRev['title'];?></h2>
					</div>
					<?php } ?>
				</div><!--.row-->
            
            </div><!--.item-->
             <?php }else{ ?>
            <div class="item hidden-xs">
             
				<div class="row" id="carosel-all-img">
                <?php foreach($editorialReview as $editorialRev) {?>
					<div class="col-md-4">
						<a target="_blank" href="/detail-review?reviewID=<?php echo base64_encode(convert_uuencode($editorialRev['id'])); ?>" class="">
							<img src="<?php echo DEFAULT_URL.'/image_resizer.php?img='.$editorialRev['image'].'&newWidth=308&newHeight=225'; ?>" alt="Image" style="max-width:100%;">
						</a>
						<h2><?php echo $editorialRev['title'];?></h2>
					</div>
                <?php } ?>

                </div><!--.row-->
            
            </div><!--.item-->
             
            <?php } 
				
				}
			}
			 ?>
               
            </div><!--.carousel-inner-->
              <a data-slide="prev" href="#Carousel" class="left carousel-control hidden-xs  hidden-sm"><span class="fa fa-arrow-left" aria-hidden="true" id="arrow-left"></span></a>
              <a data-slide="next" href="#Carousel" class="right carousel-control hidden-xs hidden-sm"><span class="fa fa-arrow-right" aria-hidden="true"></span></a>
            </div><!--.Carousel-->      
       </div>
     </div>
   </div><!--.container-->
</section>
<script>
      $(document).ready(function(){
          $("#hover-tab-1").click(function(){
          $(".fst-icon").css('display','none');
          $(".hover-icon").show();
              

              //$(".voir-icon2").show();
          });
          $("#hover-tab-2").click(function(){
          $(".fst-icon").css('display','none');
          $(".hover-icon").hide();
          $(".fst-icon").show();

        });
         
      });
    </script>
