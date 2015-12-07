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
              <li><a href="">Tracking</a></li>
              <?php if($_SESSION['User']['id']==''){?>
              <li><a href="<?php echo DEFAULT_URL."/loginaccount"?>">Créez un compte</a></li>
              <li class='last'><a href="<?php echo DEFAULT_URL."/wishlist"?>"> Ma sélection</a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Header Section End -->

  

 <!-- <section class="nav-header">
    <div class="container">
      <div class="col-md-5 left-nav no-padding">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="">Accueil</a></li>
            <li><a href="">Presentation</a></li>
            <li><a href="">Voitures Americaines a vendre</a></li>
            <li class='last'><a href=""> Média</a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 logo-size">
        <img src="<?php echo DEFAULT_URL; ?>/images/main-logo.png" class="img-responsive logo">
      </div>


      <div class="col-md-5 right-nav text-right no-padding">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="">Revues Automobiles  </a></li>
            <li><a href="">Logistique </a></li>
            <li><a href="">News </a></li>
            <li class='last'><a href=""> Contact </a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>-->

  
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
            <li><a href="">Accueil</a></li>
            <li><a href="Presentation.html">Presentation</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Voitures Americaines a vendre </a>
              <ul class="dropdown-menu">
                <li><a href="list.html"><i class="fa fa-angle-right"></i> Annonces USA actuelles</a></li>
                <li><a href="list.html"><i class="fa fa-angle-right"></i> Notre Inventaire </a></li>
                <li><a href="recherche-personalise.html"><i class="fa fa-angle-right"></i> Recherche Personnalisée</a></li>
                <li><a href="accessories.html"><i class="fa fa-angle-right"></i> Accessoires Vintages</a></li>
              </ul>
            </li>
            <li class='last'><a href="media.html"> Média</a></li>
          </ul>
        </div>
      </div>
  </ul>
      

      <a class="navbar-brand" href="index.html"><img src="<?php echo DEFAULT_URL; ?>/images/logo.png" class="img-responsive"></a>


      <ul class="nav navbar-nav">
        <div id='cssmenu'>
          <ul class="list-unstyled list-inline">
            <li><a href="car-review.html">Revues Automobiles  </a></li>
            <li><a href="">Logistique </a></li>
            <li><a href="">News </a></li>
            <li class='last'><a href=""> Contact </a></li>
          </ul>
        </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <!-- Navigation Section End -->

<!--header-bg Section start  -->
<section class="header-bg">
</section>

<div class="rightTabs wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
  <ul>
    <li><a href=""><img src="<?php echo DEFAULT_URL; ?>/images/facebook.png"></a></li>
    <li><a href=""><img src="<?php echo DEFAULT_URL; ?>/images/youtube-new-logo.png"></a></li>
  </ul>
</div>
<!--header-bg Section end  -->




<section class="ciiii">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <img src="<?php echo DEFAULT_URL; ?>/images/home-page-background-design.png" class="img-responsive commence">
        <div class="commence-text">
          <h1>Ca Commence ICI</h1>
          
          <div class="form-group form-inline">
            <div class="col-md-3 col-xs-12 col-sm-6">
              <h2>Recherche</h2>
              <a href="">Recherche Avancée</a>
            </div>

            <div class="all-slect-form">
            
              <div class=" form-group for-sm">
                <div class="">
                  <select class="form-control prothom">
                    <option>Sélectionner</option>
                    <option>Sélectionner</option>
                    <option>Sélectionner</option>
                    <option>Sélectionner</option>
                    <option>Sélectionner</option>
                  </select>
                 </div> 
              </div>

               <div class="form-group for-sm">
                <div class="selt-box">
                  <select class="form-control">
                    <option>Modèles</option>
                    <option>Modèles</option>
                    <option>Modèles</option>
                    <option>Modèles</option>
                    <option>Modèles</option>
                  </select>
                </div>
              </div>

               <div class="form-group for-sm">
                <div class="selt-box">
                  <select class="form-control">
                    <option>Année De</option>
                    <option>Année De</option>
                    <option>Année De</option>
                    <option>Année De</option>
                    <option>Année De</option>
                  </select>
                </div>
              </div>

               <div class="form-group for-sm">
                <div class="selt-box">
                <select class="form-control">
                  <option>Année A</option>
                  <option>Année A</option>
                  <option>Année A</option>
                  <option>Année A</option>
                  <option>Année A</option>
                </select>
                </div>
              </div>

               <div class="form-group for-sm">
                <div class="selt-box">
                <select class="form-control">
                  <option>Prix min</option>
                  <option>Prix min</option>
                  <option>Prix min</option>
                  <option>Prix min</option>
                  <option>Prix min</option>
                </select>
                </div>
              </div>

              <div class="form-group for-sm">
                <div class="selt-box">
                  <select class="form-control">
                    <option>Prix max</option>
                    <option>Prix max</option>
                    <option>Prix max</option>
                    <option>Prix max</option>
                    <option>Prix max</option>
                  </select>
                </div>
              </div>
              <div class="research-img"><a href=""><img src="<?php echo DEFAULT_URL; ?>/images/rechange-search-form.png"></a></div>
            </div>
           
            </div>

        </div>

        
      </div>
    </div>
  </div>
</section>
