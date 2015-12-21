
<section class="presentation-tabs">
  <div class="container">
      <div class="col-md-12 no-padding tabbable tabs-right">
        <div class="col-md-8 tab-content">
          <ul class="nav nav-tabs hidden-md hidden-lg">
			<?php 	
				if ($total_rows > 0) {					
					while ($tab = mysql_fetch_object($allTabs)) { 
			?>
					<li <?php if($slug == $tab->slug) {echo 'class="active"';}?>><a href="/logistic/<?php echo $tab->slug;?>"><?php echo $tab->tab_title;?></a></li>
			<?php
					}
				}
			?>
          </ul>

           <div class="tab-pane active wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s"  id="1">
			<?php echo $content;?>
             <div class="col-md-12 no-padding lagic-form">
                <form>
                  <div class="col-md-12 no-padding">
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Type de transportation: </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder=" ">
                    </div>
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Nom:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder=" ">
                    </div>
                  </div>
                  <div class="col-md-12 no-padding">
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder=" ">
                    </div>
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Telephone:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder=" ">
                    </div>
                  </div>
                  <div class="col-md-12 no-padding form-group">
                    <div class="col-md-10 form-group">
                      <label for="exampleInputEmail1">Notes:</label>
                      <textarea class="form-control" rows="3"></textarea>
                    </div> 
                  </div>
                  <div class="col-md-12 form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> J’ai lu et j’accepte expressement la  <a href="">politique de  confidential</a>
                      </label>
                    </div>
                  </div>
                <div class="col-md-12 contact-btn">
                  <a href=""><button class="btn btn-default" id="default-btn" type="submit">Envoyer<i class="fa fa-angle-right"></i></button></a>
                </div>
              </form>
             </div>
           </div>
        </div>
        <div class="col-md-4 no-right-padding wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <ul class="nav nav-tabs hidden-xs hidden-sm">            
            <?php mysql_data_seek($allTabs, 0);
					if ($total_rows > 0) {					
						while ($tab = mysql_fetch_object($allTabs)) { 
				?>
						<li <?php if($slug == $tab->slug) {echo 'class="active"';}?>><a href="/logistic/<?php echo $tab->slug;?>"><?php echo $tab->tab_title;?></a></li>
				<?php
						}
					}
				?>
           
          </ul>
          <img src="<?php echo DEFAULT_URL. '/images/logistique/' .$bannerImage;?>" class="img-responsive center">
        </div>
      </div>
      <!-- /tabs -->
  </div>
</section>

