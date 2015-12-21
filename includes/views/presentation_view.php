<!-- header section -->

<section class="media-header-section" style="background:url('<?php echo DEFAULT_URL. '/images/presentation/' .$topBanner;?>') no-repeat scroll 0% 0% / 100% auto transparent"></section>
<!-- End header section -->

<section class="presentation-tabs">
  <div class="container">
      <div class="col-md-12 tabbable tabs-right">
        <div class="col-md-8 tab-content">
          <ul class="nav nav-tabs hidden-md hidden-lg">
            <li class="active"><a href="#1" data-toggle="tab">Présentation</a></li>
            <li><a href="#2" data-toggle="tab">Pourquoi nous choisir?</a></li>
            <li><a href="#3" data-toggle="tab">Nos services</a></li>
            <li>
              <a href="#4" data-toggle="tab">Comment ça marche?</a>
            </li>
            <li><a href="#5" data-toggle="tab">Fournisseurs</a></li>
          </ul>

           <div class="tab-pane active wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s" id="1"> 
				<?php echo $content;?>
			</div>
			</div>
        <div class="col-md-4 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <ul class="nav nav-tabs hidden-xs hidden-sm">
            <li <?php if($tab_title == 'presentation') { echo 'class="active"';}?>>
				<a href="/presentation/">Présentation</a>
			</li>
            <li <?php if($tab_title == 'pourquoi_nous_choisir') { echo 'class="active"';}?>>
				<a href="/presentation/pourquoi_nous_choisir" >Pourquoi nous choisir?</a>
			</li>
            <li <?php if($tab_title == 'nos_services') { echo 'class="active"';}?>>
				<a href="/presentation/nos_services">Nos services</a>
			</li>
            <li <?php if($tab_title == 'comment_ça_marche') { echo 'class="active"';}?>>
              <a href="/presentation/comment_ça_marche">Comment ça marche?</a>
            </li>
            <li <?php if($tab_title == 'fournisseurs') { echo 'class="active"';}?>>
				<a href="/presentation/fournisseurs">Fournisseurs</a>
			</li>
          </ul>
          <img src="<?php echo DEFAULT_URL. '/images/presentation/' .$sideBanner;?>" class="img-responsive center">
        </div>
      </div>
      <!-- /tabs -->
  </div>
</section>
