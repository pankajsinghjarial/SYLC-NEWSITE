
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
                <form id="addvalidation" method="post">
                  <div class="col-md-12 no-padding">
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Type de transportation: </label>
                      <input type="text" class="form-control" name="type_transport" id="type_transport" placeholder="Type de transportation">
                    </div>
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Nom:</label>
                      <input type="text" name="fname" class="form-control" id="fname" placeholder="Nom">
                    </div>
                  </div>
                  <div class="col-md-12 no-padding">
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Email:</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-5 form-group">
                      <label for="exampleInputEmail1">Telephone:</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Telephone-">
                    </div>
                  </div>
                  <div class="col-md-12 no-padding form-group">
                    <div class="col-md-10 form-group">
                      <label for="exampleInputEmail1">Notes:</label>
                      <textarea class="form-control" name="comment" rows="3"></textarea>
                    </div> 
                  </div>
                  <div class="col-md-12 form-group">
                    <div class="checkbox">
                      <label id="checkcover">
                        <input type="checkbox" name="accept"> J’ai lu et j’accepte expressement la  <a href="">politique de  confidential</a>
                      </label>
                    </div>
                  </div>
                <div class="col-md-12 contact-btn">					
                    <input type="hidden" name="logisticform" class="form-control" id="logisticform" value="logisticform">
					<button class="btn btn-default" id="default-btn" type="submit">Envoyer<i class="fa fa-angle-right"></i></button>
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

