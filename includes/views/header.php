<?php include_once(LIST_ROOT.'/includes/views/head.php'); ?>
<?php $page = explode("/",$_SERVER['REQUEST_URI']);$page = end($page);?>
  <!-- Header Section Start -->
  <section class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
          <h1>Voitures americaines: Comment trouver et importer votre voiture de collection...</h1>
        </div>
        <div class="col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <div id='cssmenu'>
            <ul class="list-unstyled list-inline">
                <!-- Acc login -->
                <?php
                if(isset($_SESSION['User']['id'])) { ?>
                <li><a <?php if($page=='editaccount'){?> class="active" <?php }?> title="Mon compte" href="<?php echo DEFAULT_URL."/editaccount"?>"> Mon compte</a></li>
                <li <?php if($page=='wishlist'){?> class="active" <?php }?>><a title="Ma sélection" href="<?php echo DEFAULT_URL."/wishlist"?>"> Ma sélection</a></li>
                <li class='last'><a title="Déconnexion" href="<?php echo DEFAULT_URL."/logout"?>">Déconnexion</a></li>
                <?php } ?>
                <!-- Acc login end -->
                <!-- Tracking login -->
                <?php
                if(isset($_SESSION['loginuser']['id'])) { ?>
                <li class='last'><a title="Déconnexion" onclick="logoutajaxrequest()">Déconnexion</a></li>
                <?php } ?>
                <!-- Tracking login End-->
                <!-- Logged out -->
                <?php if(!isset($_SESSION['User']['id']) && !isset($_SESSION['loginuser']['id'])){?>
                <li><a href="#inline_content_log" class="inlinelog">Tracking</a></li>
                <li <?php if($page=='loginaccount' || $page=='createaccount'){?> class="active" <?php }?>><a title="Créez un compte" href="<?php echo DEFAULT_URL."/loginaccount"?>">Créez un compte</a></li>
                <li class='last<?php if($page=='wishlist'){echo " active"; }?>'><a title="Ma sélection" href="<?php echo DEFAULT_URL."/wishlist"?>"> Ma sélection</a></li>
                <?php } ?>
                <!-- Logged out -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Header Section End -->
  
<!-- Navigation Section Start -->
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <div class="">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="<?php echo DEFAULT_URL;?>">Accueil</a></li>
            <li><a href="<?php echo DEFAULT_URL;?>/presentation">Presentation</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Voitures Americaines a vendre </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo DEFAULT_URL;?>/annouce_usa_actuelle"><i class="fa fa-angle-right"></i> Annonces USA actuelles</a></li>
                <li><a href="<?php echo DEFAULT_URL;?>/products?products=inventory"><i class="fa fa-angle-right"></i> Notre Inventaire </a></li>
                <li><a href="/recherche_personalise"><i class="fa fa-angle-right"></i> Recherche Personnalisée</a></li>
                <li><a href="<?php echo DEFAULT_URL;?>/accessories"><i class="fa fa-angle-right"></i> Accessoires Vintages</a></li>
              </ul>
            </li>
            <li class='last'><a href="<?php echo DEFAULT_URL;?>/media"> Média</a></li>
          </ul>
        </div>
      </div>
  </ul>
      

      <a class="navbar-brand" href="<?php echo DEFAULT_URL;?>"><img src="<?php echo DEFAULT_URL; ?>/images/logo.png" class="img-responsive"></a>


      <ul class="nav navbar-nav">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="<?php echo DEFAULT_URL;?>/revue_automobiles">Revues Automobiles  </a></li>
            <li><a href="<?php echo DEFAULT_URL;?>/logistic">Logistique </a></li>
            <li><a href="<?php echo DEFAULT_URL;?>/news">News </a></li>
            <li class='last'><a href="<?php echo DEFAULT_URL;?>/contact"> Contact </a></li>
          </ul>
        </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <!-- Navigation Section End -->

<!--header-bg Section start  -->

<div class="rightTabs wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
  <ul>
    <li>
     <?php
		 if(!isset($title)) {
			$title = '$title_for_layout';
		 }
		 if(!isset($content)) {
			$content = '$description_for_layout';
		 }
		 if(!isset($img)) {
			$img ='';
		 }
	 ?>
      
      <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(ucwords(strtolower(addslashes(str_replace('&','and',$title)))));?>&amp;p[summary]=<?php echo urlencode(preg_replace('/[^a-zA-Z0-9_!@#$%,.() -]/s','',strip_tags(str_replace('&','and',str_replace('&amp;','',str_replace('&nbsp;','',nl2br($content)))))));?>&amp;p[url]=<?=FULL_BASE_URL.$_SERVER['REQUEST_URI'];?>&amp;&p[images][0]=<?php echo $img;?>', 'sharer', 'toolbar=0,status=0,width=500,height=400,top=160,left=390');" href="javascript: void(0)" title="Click to share on facebook">
			<img src="<?php echo DEFAULT_URL; ?>/images/facebook.png">
        </a>
     </li>              
    <li><a href=""><img src="<?php echo DEFAULT_URL; ?>/images/youtube-new-logo.png"></a></li>
  </ul>
</div>
<!--header-bg Section end  -->

