<?php  
extract($_POST);
extract($_GET);
$search = new search();
$common = new common();
if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){ 
    $getSelectedCarListSQL = "SELECT count(id) from wishlist where car_id = $carid AND user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    $isSelect = mysql_fetch_assoc($result);    
}
$modelList = array();
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)) {
    $modelList[] = $row;
}
include("functions/ebay_functions.php");


$ebayid = $common->CustomQuery("Select * from ebay_car where itemId = ".$carid);
$item = '';
if(mysql_num_rows($ebayid) > 0){
	$item = mysql_fetch_object($ebayid);
	if($item->vin == ''){
		$ebayid = fetchEbayCar($carid, "update");
	}
	
}
else{
	$ebayid = fetchEbayCar($carid,"save");
	$item = mysql_fetch_object($ebayid);
}


if(isset($_POST) && isset($_POST["add_to_sel"]))
{
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>0);
	$common_obj->save("contact",$arr);
	
	//echo "<pre>";var_dump($item);die;
	
	// Your subject
	$heading = $subject= $_POST['name']." ".$_POST['prename'].' ajouter une voiture à sa sélection';
	
	$subHeading = 'Les détails sont comme ci-dessous : ';
	
	$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
	$emailData['Adresse e-mail'] = $_POST['email'];
	$emailData['Numéro de téléphone'] = $_POST['phone'];
	
	// Cart details
	$emailData['Détails du véhicule'] = null;
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $item->title;
	$emailData['vin'] =  $item->vin;
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($item->buyItNowPrice).' &euro;';
	$emailData['Construire'] =  $item->Make;
	$emailData['Modèle'] =  $item->Model;
	$emailData['Kilométrage'] =  number_format($item->Mileage, 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/ebay/".$_POST['car_id'];
	
	$message = emailContentsWrapper($emailData,$heading,$subHeading);
	
	$adminEmails = $common_obj->getAdminNotificationEmails(); 
	foreach($adminEmails as $email ) {
	    sendSmtpMail( $email, $subject, $message);
	}
	
	//Send confirmation to User
	$heading = 'Merci';
	$subHeading = 'Vous ajoutez une voiture de votre choix avec les détails suivants.';
	$footerHeading = 'Merci encore<br/>Americamcarcentrale.com';
	$emailData = null;
	$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
	$emailData['Adresse e-mail'] = $_POST['email'];
	$emailData['Numéro de téléphone'] = $_POST['phone'];
	
	$message = emailContentsWrapper($emailData, $heading, $subHeading, $footerHeading);
	
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
	$_SESSION['sentmail_txt'] = '
	<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$.msgBox({
				title:"Merci",
				content:"Nous avons ajouté votre demande avec succès",
				type:"info",
				timeOut:5000,
				opacity:0.6,
				autoClose:true
			});
		});
	})(jQuery); 
	</script>';
}
elseif(isset($_POST) && isset($_POST["add_to_enquire"]))
{
	global $db;
	//error_reporting(E_ALL);
//ini_set('display_errors', '1');
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"email"=>$_POST['email'],"submit_date"=>date("Y-m-d H:i:s"));
	$common_obj->save("car_inquiry",$arr);	
	
	$mailHeading = (!empty($_POST['order']) && $_POST['order'] == 1 ) ? "A fait une demande de L’historique de cette voiture ici." : "A fait une demande de fiche technique de cette voiture ici.";
	
	//Send confirmation to User
	
	$heading = 'Merci';
	$subHeading = 'Votre adresse e-mail a été reçu, un de nos représentants vous contactera avec les informations de la voiture.<br><br>Merci encore<br/>Americamcarcentrale.com';
	$message = emailContentsWrapper(null,$heading,$subHeading);
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
	
	// Send admin Notifications
	
	$heading = "Un invité envoyé demande d'enquête pour une voiture";
	$subHeading = 'ce client '.$_POST['email'].' '.$mailHeading.'<br/>Détails du véhicule';
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $item->title;
	$emailData['vin'] =  $item->vin;
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($item->buyItNowPrice).' &euro;';
	$emailData['Construire'] =  $item->Make;
	$emailData['Modèle'] =  $item->Model;
	$emailData['Kilométrage'] =  number_format($item->Mileage, 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/ebay/".$_POST['car_id'];
	
	$message = emailContentsWrapper($emailData,$heading,$subHeading);
	
	$adminEmails = $common_obj->getAdminNotificationEmails();
	foreach($adminEmails as $email ) {
	    $sentmail = sendSmtpMail( $email, $heading,$message);
	}
	
	
	// Send Success message to User.
	
	$_SESSION['sentmail_txt'] = '
	<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$.msgBox({
				title:"Merci",
				content:"Nous avons ajouté votre demande avec succès",
				type:"info",
				timeOut:60000,
				opacity:0.4,
				autoClose:true
			});
		});
	})(jQuery); 
	</script>';
}
elseif(isset($_POST) && isset($_POST["send_invite"]))
{
	global $db;
	// Your subject
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	//$headers .= 'From:  . \r\n';
	$message = '
		-----------------------------------------------
		One of your friend send you a link for a car. 
		Please visit the below link to view the detail of car
		<a href="'.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'"> '.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'</a>
			Thank you
		-----------------------------------------------';
	$sentmail = sendSmtpMail( $_POST['email'], "Merci", $message );
	
	$_SESSION['sentmail_txt'] = '
		<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
			<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
			<script type="text/javascript">
				(function($){
					$(document).ready(function(){
						$.msgBox({
							title:"Merci",
							content:"Lien envoy� avec succ�s",
							type:"info",
							timeOut:60000,
							opacity:0.4,
							autoClose:true
						});
					});
				})(jQuery); 
		</script>';
}


$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
$car_meta_values['title'] = $item->title;
$car_meta_values['description'] = '';
$_SESSION['ebay_desc'] = base64_decode($item->description);
$specs = array();
$spec = explode("~",$item->stdequip);
foreach($spec as $spex)
{
	$spexs = explode("^",$spex)	;
	$car_meta_values['description'] .= $spexs[0].": ". $spexs[1].", ";
    $specs[$spexs[0]] = $spexs[1];
}

$gallery = explode("**",$item->galleryURL);
$prestation = 3000;
$transportUSA = 1200;
$transportUSAFermee = 1800;
$transport = 2000;
$bank = 260;
$frais = 780;
$carPrice = $common->ConvertPrice($item->buyItNowPrice);
//$priceHT = $carPrice + $prestation + $transportUSA + $transport + $bank + $frais;
$initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.10 * 0.20);
if($item->Year < 1985){
    $initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.05);
}
$priceTTC = $initPrice + $carPrice + $common->ConvertPrice($transport)+ $common->ConvertPrice($prestation) + $common->ConvertPrice($transportUSA) + $common->ConvertPrice($bank) + $frais;

$firstVid = $common->getValueByField("superadmin_options" ,"option_name='firstVid'" ,"option_value" );
$secondVid = $common->getValueByField("superadmin_options" ,"option_name='secondVid'" ,"option_value" );
