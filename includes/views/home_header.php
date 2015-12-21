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
                <li <?php if($page=='editaccount'){?> class="active" <?php }?>><a title="Mon compte" href="<?php echo DEFAULT_URL."/editaccount"?>"> Mon compte</a></li>
                <li><a title="Ma sélection" href="<?php echo DEFAULT_URL."/wishlist"?>"> Ma sélection</a></li>
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
                <li class='last'><a title="Ma sélection" href="<?php echo DEFAULT_URL."/wishlist"?>"> Ma sélection</a></li>
                <?php } ?>
                <!-- Logged out -->
            </ul>
          </div>
        </div>
      </div>
    </div>
<div style="display: none;">
 <a href="#inline_content_detail" id="cardetailpop" class="inlinedetail" >Member Login</a>
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
                <li><a href="/products"><i class="fa fa-angle-right"></i> Annonces USA actuelles</a></li>
                <li><a href="/products?products=inventory"><i class="fa fa-angle-right"></i> Notre Inventaire </a></li>
                <li><a href="/recherche_personalise"><i class="fa fa-angle-right"></i> Recherche Personnalisée</a></li>
                <li><a href="/accessories"><i class="fa fa-angle-right"></i> Accessoires Vintages</a></li>
              </ul>
            </li>
            <li class='last'><a href="media.html"> Média</a></li>
          </ul>
        </div>
      </div>
  </ul>
      

      <a class="navbar-brand" href="<?php echo DEFAULT_URL; ?>/"><img src="<?php echo DEFAULT_URL; ?>/images/logo.png" class="img-responsive"></a>


      <ul class="nav navbar-nav">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="car-review.html">Revues Automobiles  </a></li>
            <li><a href="/logistic">Logistique </a></li>
            <li><a href="">News </a></li>
            <li class='last'><a href=""> Contact </a></li>
          </ul>
        </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <!-- Navigation Section End -->
