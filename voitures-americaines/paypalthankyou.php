<?php session_start();
require_once ('conf/config.inc.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Syl Corporation</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="http://www.sylc-export.com/voitures-americaines/admin/images/favicon.ico" rel="shortcut icon">
</head>

<body>
<div id="header">
  <div class="wrapper"> <a href="http://www.sylc-export.com" class="logo"></a>
    
  </div>
</div>
<?php $id=$_SESSION['lead_detail'];?>
<?php echo '<script>location.href="'.DEFAULT_URL.'/landing.php?lead_detail='.$id.'&msgthank=paymentdone"</script>'; ?>
<div id="container">

  <div id="wrapper_content">


    <div id="content">
    <div class="content_inner">
    
    <div class="thankyou">
    
   <img src="images/thnakyou.png" alt="Thankyou" />
  <div class="thankcontent">Nous vous remercions pour votre achat</div>  
   <img src="images/thankyou_ig.jpg" alt="Thankyou" />
    
    
    </div>
     
    </div>
    
     
  
    <!--footer start from here-->
    <div id="footer">
     <!-- <p>Copyright &copy; 2011. All Rights Reserved.</p>
      <p class="links"><a href="http://www.sylc-export.com/voitures-americaines">Terms &amp; Conditions</a>&nbsp;  |  &nbsp;<a href="http://www.sylc-export.com/voitures-americaines">Privacy Policy</a>&nbsp;  |  &nbsp;<a href="http://www.sylc-export.com/voitures-americaines">DMCA Policy</a>&nbsp;  |  &nbsp;<a href="http://www.sylc-export.com/voitures-americaines">Product Label</a></p>
      -->
      <div id='basic-modal'>
        	<p class="biglink"><a href="http://www.sylc-export.com" target="_blank">www.sylc-export.com</a></p>
           <p class="links"><a href='#' class='basic1'>Politique de Confidentialité </a></p>
          <p class="biglink">Copyright &copy; 2011. All Rights Reserved.</p>
          
          <p class="links"><a href='#' class='basic'>Mentions Légales </a></p>
        </div>
        <div id="basic-modal-content">
          <h3></h3>
          <div class="poppadding">
            <h2 class="pop_heading">Editeur du Site</h2>
            <p>Le site SYLC Corporation est édité par SYLC Corporation. </p>
            <h2 class="pop_heading">Droits d'auteur</h2>
            <p>Le site SYLC Corporation est protégé par les dispositions du Code de la propriété intellectuelle, notamment par celles relatives à la propriété littéraire et artistique et au droit des marques.</p>
            <h2 class="pop_heading">CNIL – Protection des données personnelles</h2>
            <p>Les informations que nous sommes amenés à recueillir proviennent :</p>
            <ul>
              <li>soit de l'inscription volontaire d'une adresse e-mail de votre part vous permettant de recevoir notre newsletter,</li>
              <li>soit d'un abonnement de votre part aux services proposés par notre site,</li>
              <li>soit de la saisie complète de vos coordonnées par vos soins à l'occasion d'une opération événementielle.</li>
            </ul>
            <p>Ces informations nous permettent de mieux vous connaître. Elles pourront être utilisées, en outre, pour vous informer de l'existence de nos produits et services. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi « Informatique et Libertés » n<sup>°</sup> 78-17 du 6 janvier 1978 ). </p>
            <h2 class="pop_heading">Cookies</h2>
            <p><strong>SYLC Corporation</strong> vous informe qu'un cookie est placé dans votre ordinateur lorsque vous naviguez sur son site. Un cookie ne nous permet pas de vous identifier. De manière générale, il enregistre des informations relatives à la navigation de votre ordinateur sur notre site (les pages que vous avez consultées, la date et l'heure de la consultation, etc.) que nous pourrons lire lors de vos visites ultérieures. Son but unique est de mettre en place un comptage du nombre de visiteurs et de limiter éventuellement le nombre de délivrance d'une même bannière publicitaire à un même utilisateur. La durée de conservation de ces informations dans votre ordinateur est de un an. Nous vous informons que vous pouvez vous opposer à l'enregistrement de « cookies » en désactivant cette option dans les paramètres de votre navigateur.</p>
          </div>
        </div>
        <div id="basic-modal-content1">
          <h3></h3>
          <div class="poppadding">
          
           <h2 class="pop_heading">Politique de Confidentialité</h2>

<p>Cette politique de confidentialité porte sur l'utilisation des données collectées par <a href="http://www.sylc-export.com/voitures-americaines">www.sylc-export.com/voitures-americaines</a>. Elle s'applique à toutes les données collectées au moment de votre utilisation de ce site ou de systèmes associés à Sylc-export.</p>
<p>Vous disposez d'un droit d'accès, de rectification et de suppression relatif aux données vous concernant. Vous pouvez nous contacter en tout temps :</p>
  <h2 class="pop_heading">Téléphone:</h2>
<p>01.76.63.32.16</p>

<p>OU</p>


<p>305.520.9761</p>
  <h2 class="pop_heading">Email:</h2>
<p>info@sylc-export.com</p>
<h2 class="pop_heading">Collecte invisible d'informations relatives à la navigation du visiteur :</h2>
<p>Nous enregistrons automatiquement certaines données relatives à vos habitudes sur notre site. Nous utilisons ces données en interne pour faire des statistiques sur nos utilisateurs, leurs intérêts et leurs comportements toujours dans le but de mieux les servir. Ces données sont compilées et analysées dans leur globalité, et peuvent inclure l'URL que vous venez juste de visiter, celui sur lequel vous allez vous rendre (que ces URL soient sur notre site ou pas), le navigateur que vous utilisez, l'heure de connexion et votre adresse IP.</p>
  <h2 class="pop_heading">Informations COOKIE :</h2>
<p>Nous n'implantons aucun cookie dans votre ordinateur.</p>
  <h2 class="pop_heading">Destination des informations recueillies :</h2>
<p>Les messages électroniques envoyés par l'intermédiaire des formulaires et liens du présent site sont conservés pendant la durée nécessaire à leur traitement. Lorsque vous indiquez votre nom (ou pseudonyme), votre adresse électronique, votre adresse postale ou votre numéro de téléphone et que vous acceptez l'utilisation de ces informations, www.sylc-export.com/voitures-americaines pourra utiliser ces informations pour vous avertir de mises à jour, d'offres de biens, de nouveaux services ou d'autres informations reçues par Sylc-export. Sylc-export n'offre pas, et ne permet pas la vente, des informations vous concernant.</p>


  <h2 class="pop_heading">Responsabilité</h2>
<p>Sylc-export ne pourra en aucun cas être tenue responsable des pratiques ou du contenu des sites web dont les liens hypertextes mis en place dans le cadre du présent site renvoient en direction d'autre site ou de ressources présentes sur le réseau Internet. Nous ne pouvons que vous encourager à prendre connaissance de la politique Informatique et libertés de ces sites, qui n'est pas forcément la même que la nôtre.</p>
  <h2 class="pop_heading">Mise à jour des mentions légales</h2>

<p>Sylc-export se réserve le droit de mettre à jour la présente notice légale à tout moment, en fonction de l'évolution du contenu du site et des contraintes supplémentaires de protection nécessaires. Veuillez donc consulter cette page à chaque fois que vous consultez le site web afin de vous tenir au courant des conditions et modalités en vigueur. </p>




          </div>
        </div>
        <!-- preload the images -->
        <div style='display:none'> <img src='images/fancy_close.png' alt='' /> </div>
      <!-- Google Code for Lead Conversion Page -->

<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 1035562125;

var google_conversion_language = "fr";

var google_conversion_format = "2";

var google_conversion_color = "ffffff";

var google_conversion_label = "nTAzCP_D1wIQjdnl7QM";

var google_conversion_value = 0;

/* ]]> */

</script>

<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1035562125/?label=nTAzCP_D1wIQjdnl7QM&amp;guid=ON&amp;script=0"/>

</div>

</noscript>


    </div>
    </div>
    
   
    
    <!--footer start from here--> 
    
  </div>
</div>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>

</body>
</html>
