<!-- header section -->

<section class="media-header-section" style="background:url('<?php echo DEFAULT_URL. '/images/presentation/' .$topBanner;?>') no-repeat scroll 0% 0% / 100% auto transparent"></section>
<!-- End header section -->

<section class="presentation-tabs">
  <div class="container">
      <div class="col-md-12 tabbable tabs-right">
        <div class="col-md-8 tab-content">
          <ul class="nav nav-tabs hidden-md hidden-lg">            
			<?php 	
				if ($total_rows > 0) {					
					while ($tab = mysql_fetch_object($allTabs)) { 
			?>
					<li <?php if($slug == $tab->slug) {echo 'class="active"';}?>><a href="/presentation/<?php echo $tab->slug;?>"><?php echo $tab->tab_title;?></a></li>
			<?php
					}
				}
			?>
          </ul>

           <div class="tab-pane active wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s" id="1"> 
				<?php echo $content;?>
			</div>
			</div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <ul class="nav nav-tabs hidden-xs hidden-sm">
            
			<?php mysql_data_seek($allTabs, 0);
					if ($total_rows > 0) {					
						while ($tab = mysql_fetch_object($allTabs)) { 
				?>
						<li <?php if($slug == $tab->slug) {echo 'class="active"';}?>><a href="/presentation/<?php echo $tab->slug;?>"><?php echo stripslashes($tab->tab_title);?></a></li>
				<?php
						}
					}
				?>
          </ul>
          <img src="<?php echo DEFAULT_URL. '/images/presentation/' .$sideBanner;?>" class="img-responsive center">
        </div>
      </div>
      <!-- /tabs -->
  </div>
</section>
