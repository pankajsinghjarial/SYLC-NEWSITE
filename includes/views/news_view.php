<section class="presentation-tabs">
  <div class="container">
      <div class="col-md-12 tabbable tabs-right">
        <div class="col-md-8 tab-content">
          <ul class="nav nav-tabs hidden-md hidden-lg">         
			<?php 
				
				if ($total_rows > 0) {
					$ii = 1;
					while($getPageData = mysql_fetch_object($allCategories)) {
						$class = '';
						
						if($category_name != '') {
							if($category_name == $getPageData->slug) {
								$class = "active";
							}
						} else {
							if ($ii == 1) {
								$class = "active";
							}
						}
						if ($slug == '') {
							
			?>				
							<li class="<?php echo $class;?>">
								<a href="#<?php echo $getPageData->id;?>" data-toggle="tab"><?php echo $getPageData->category_name;?></a>
							</li>
			<?php
						} else {
			?>
							<li class="<?php echo $class;?>">
								<a href="/news/<?php echo $getPageData->slug;?>" ><?php echo $getPageData->category_name;?></a>
							</li>
			<?php
					}
						$ii++;
					}
				}
				mysql_data_seek($allCategories, 0);
			?>
          </ul>
			<?php
			if($slug == '') {			
				if ($total_rows > 0) {
					$ii = 1;
					while($getCategory = mysql_fetch_object($allCategories)) {
						$class = '';
						
						if($category_name != '') {
							if($category_name == $getCategory->slug) {
								$class = "active";
							}
						} else {
							if ($ii == 1) {
								$class = "active";
							}
						}
			?>
				<div class="tab-pane wow fadeInLeft <?php echo $class;?>" data-wow-duration="2s" data-wow-delay=".5s" id="<?php echo $getCategory->id;?>">
			<?php
				if ($total_articles > 0) {
					$ii = 1;
					while ($getPageData = mysql_fetch_object($allArticles)) {
						
						if ($getCategory->id == $getPageData->id) {		
			?>
				
				<h1 class="heading"><?php echo $getPageData->title;?></h1>
				<?php
						if ($slug == '') {
							echo $common_function->getSubstring($getPageData->content);
						} else {
							echo $getPageData->content;
						}
						if(strlen($getPageData->content) > 200 && $slug == '') {
				?>
						<a href="/latest_news/<?php echo $getPageData->slug;?>">Read More>></a>
				<?php
						}
					}
						
					}
					mysql_data_seek($allArticles, 0);
					
				}?>
				</div>
				<?php
						$ii++;
					}
				}
			} else {
				mysql_data_seek($allCategories, 0);
				mysql_data_seek($allArticles, 0);
			?>
					<div class="tab-pane wow fadeInLeft active" data-wow-duration="2s" data-wow-delay=".5s" id="1">
			<?php
				if ($total_articles > 0) {
					$ii = 1;
					while($getPageData = mysql_fetch_object($allArticles)) {
			?>
				
				<h1 class="heading"><?php echo $getPageData->title;?></h1>
				<?php
						if ($slug == '') {
							echo $common_function->getSubstring($getPageData->content);
						} else {
							echo $getPageData->content;
						}
						if(strlen($getPageData->content) > 200 && $slug == '') {
				?>
							<a href="/latest_news/<?php echo $getPageData->slug;?>">Read More>></a>
				<?php						
						}						
					}
					mysql_data_seek($allArticles, 0);
				}
				?>
				</div>
       <?php
			} 
	   ?>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <ul class="nav nav-tabs hidden-xs hidden-sm">
			<?php 
				mysql_data_seek($allCategories, 0);
				if ($total_rows > 0) {
					$ii = 1;
					while($getPageData = mysql_fetch_object($allCategories)) {
						$class = '';
						if($category_name != '') {
							if($category_name == $getPageData->slug) {
								$class = "active";
							}
						} else {
							if ($ii == 1) {
								$class = "active";
							}
						}
						if ($slug == '') {
							
			?>				
							<li class="<?php echo $class;?>">
								<a href="#<?php echo $getPageData->id;?>" data-toggle="tab"><?php echo $getPageData->category_name;?></a>
							</li>
			<?php
						} else {
			?>
							<li class="<?php echo $class;?>">
								<a href="/news/<?php echo $getPageData->slug;?>" ><?php echo $getPageData->category_name;?></a>
							</li>
			<?php
					}
						$ii++;
					}
				}
			?>
          </ul>
          <img src="/images/presentation-img-2.png" class="img-responsive center">
        </div>
      </div>
      <!-- /tabs -->
  </div>
</section>

