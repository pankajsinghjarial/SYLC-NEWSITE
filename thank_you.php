<?php include("conf/config.inc.php"); ?>
<?php include(LIST_ROOT."/includes/views/header.php"); ?>
 <style type="text/css">
	.contact_website{
		visibility: hidden;
	}					
</style>
 
<?php if($_SESSION['success'] == 'ok'){ ?>
 <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
   <script type="text/javascript">
		$ = jQuery.noConflict();	
	</script>
	<script src="<?php echo DEFAULT_URL; ?>/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="<?php echo DEFAULT_URL; ?>/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$.msgBox({
					title:"Merci",
					content:"Nous avons ajout&eacute; votre demande avec succ&egrave;s",
					type:"info",
					timeOut:5000,
					opacity:0.6,
					autoClose:true
				});
			});
		})(jQuery); 
		</script>  
  <?php unset($_SESSION['success']);} ?>
    <div class="main_middle">
    <div class="middle">
    <div class="middle_two">
        <div class="bread-crumbs">
            <ul class="brb-ul">
                <li><a href="<?php echo DEFAULT_URL; ?>"><img
                        src="/images/car-icon.png" alt=""> </a></li>
                <li><a href="<?php echo DEFAULT_URL; ?>/thank_you.php">Thank you</a></li>
            </ul>
        </div>
        <div class="middle_two_mid_announces"> 
            <span class="annonces_bold" ></span>
            <br/><br/>
        <div>
        <div class="contact_address1">
          <span class="annonces_txt" ><strong>&nbsp;Merci de nous avoir contacter</strong><br/>
          <span class="annonces_txt" > <span>&nbsp;</span><br/>
          <span class="annonces_txt" >Nous avons ajouté votre demande avec succès</span></span>
          <span class="annonces_txt" >Un de nos représentant devrais vous contacter sous peu .</span>
        </div>
    </div>
    <div class="clear"></div>
    <div class="contact_address1">
        <span class="annonces_txt" > <span>American Car Centrale<br>Hollywood, FL 33020<br ><br>Numéro gratuit depuis la France vers Miami</span><br/>

        <span class="annonces_txt_phone">
            <span class="phoneNumberRoot">
                <span class="phoneNumber" title="Call '01.60.29.99.02' with Kerio Operator">01.60.29.99.02
                    <span class="phoneNumberIcon"></span>
                </span>
            </span><br>
            <span class="phoneNumberRoot">
                <span class="phoneNumber" title="Call '06.98.22.51.82' with Kerio Operator">06.98.22.51.82
                    <span class="phoneNumberIcon"></span>
                </span>
            </span>
        </span>
    </div>

</div>
 <?php  include(LIST_ROOT."/includes/views/sidebar.php"); ?>
</div>
</div>
</div>
<?php include(LIST_ROOT."/includes/views/footer.php"); ?>
