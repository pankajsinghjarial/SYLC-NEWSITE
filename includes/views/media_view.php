<!-- header section -->

<section class="media-header-section">
</section>
<!-- End header section -->

<section class="media-content-section wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
  <div class="container">
    <div class="row">
      <h1>Média</h1>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
      1500s, when an unknown printer took a galley of type and scrambled it to.</p>
    </div>
  </div>
</section>

<section class="media-section">
  <div class="container">
    <div class="col-md-12 no-padding">
          <div class="panel with-nav-tabs wow fadeInDown" data-wow-duration="2s" data-wow-delay=".5s">
              <ul class="nav nav-tabs">
				  <?php				
						if(isset($_GET['media'])) {							
							if($_GET['media'] == 'video') {
								$classLeft  = 'in active';
								$classRight = ''; 
							} else {
								$classRight = 'in active';
								$classLeft  = '';
							}
						} else {
							$classLeft = 'in active';
						}
					?>
                  <li class="<?php echo $classLeft;?>"><a href="#tab1default" data-toggle="tab">Vidéo</a></li>
                  <li class="marque <?php echo $classRight;?>" id="hover-tab-2"><a href="#tab2default" data-toggle="tab">Photo</a></li>
              </ul>
                <div class="panel-body no-padding">
                    <div class="tab-content">
						
                        <div class="tab-pane fade <?php echo $classLeft;?>" id="tab1default">		
							<?php
							
								if ($totalVideos > 0) {
									$ii = 1;
									while($getPageData = mysql_fetch_object($allVideo)) {
										if ($ii%5 == 0 || $ii == 1){
											echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding video-img-row wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">';
										}
							?>
								<div class="col-md-3 col-sm-4 col-xs-12 no-padding fst-img">
									<a class="fancybox-media" rel="group" href="<?php echo $getPageData->youtubeurl;?>">
										<img alt="<?php echo $getPageData->title;?>"
									src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo DEFAULT_URL.'/images/pages/media/'.$getPageData->image;?>&newWidth=291&newHeight=227"
									width="291" height="227" class="img-responsive listing-car-img"></a>
								  <h2><?php echo $getPageData->title;?></h2>
								  <div id="triangle-up"></div>
								</div><!-- col-md-3 -->
							<?php										
									if ($ii%4 == 0 || $ii == 4) {
										echo "</div>";
									}
									$ii++;
									}
									
									if ($ii != 9 && $ii != 5) {
											echo "</div>";
									}
								}
							?>
                           
                          <div class="col-md-12 pagination text-center">
							  <?php echo $pages->display_pages(); ?>
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
                        
                        <!-- ************** Tab 2 *******************-->

                        <div class="tab-pane fade <?php echo $classRight;?>" id="tab2default">
                          <div class="list-of-posts">

							<?php 
								if ($total_rows > 0) {
									$ii = 1;
									while($getPageData = mysql_fetch_object($allMedia)) {
										if ($ii%5 == 0 || $ii == 1) {
											echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding video-img-row">';
										}
							?>
								<div class="col-md-3 col-sm-4 col-xs-12 no-padding fst-img">
								    <img alt="<?php echo $getPageData->title;?>"
									src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo DEFAULT_URL.'/images/pages/media/'.$getPageData->image;?>&newWidth=291&newHeight=227"
									width="291" height="227" class="img-responsive listing-car-img">
								  <h2><?php echo $getPageData->title;?></h2>
								  <div id="triangle-up"></div>
								</div><!-- col-md-3 -->
							<?php
										
										if ($ii % 4 == 0 || $ii == 4){
											echo "</div>";
										}
										$ii++;
									}
									if ($ii != 9 && $ii != 5) {
											echo "</div>";
									}
								}
							?>
                           
                          <!-- col-md-12 -->                          

                          <div class="col-md-12 pagination text-center">
							  <?php echo $pagesPhoto->display_pages(); ?>
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
                          
                        </div> <!-- tab2default -->

                    </div> <!-- tab-content -->
                </div><!-- panel body -->
              </div><!-- panel -->
          </div><!-- col-md-12 -->
    </div><!-- tab2default -->
    </div><!-- container --> 
  </section>

