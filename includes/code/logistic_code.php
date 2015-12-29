<?php 
extract($_POST);
extract($_GET);

$search = new search();
$common = new common();

/*Fetch tabs*/

$total_rows = $common->numberOfRows('content_page', "page_name='Logistique'"); 

$allTabs = $common->customQuery("SELECT slug,tab_title FROM  content_page where page_name='Logistique' ORDER BY id ASC");
if($slug == '') {
	$slug = 'notre_mission';
}
/*Fetch banner section content*/
$fetchSetting 	= $common->read('content_page', "slug = '".mysql_real_escape_string($slug)."'");		
$getSetting 	= $db->fetchNextObject($fetchSetting);
if (empty($getSetting)) {
	echo '<script>location.href = "/logistic";</script>';
}

$content		= $getSetting->content;
$bannerImage	= $getSetting->banner_image;

/*Recherche Transport Inquiry*/
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logisticform']) ) {
	require_once('lib/iContactApi.php'); 
	// code for lead save on iContact                        
	iContactApi::getInstance()->setConfig(array(
		'appId'       => ICONTACT_APPID,
		'apiPassword' => ICONTACT_APIPASSWORD,
		'apiUsername' => ICONTACT_APIUSERNAME
	));
	
	// Store the singleton
	$oiContact = iContactApi::getInstance();
	try {
			//Create a contact
            $cid = $oiContact->CustomaddContactForm($email, 'normal', '', null, $phone, $comment, $fname, $type_transport);
			$res = $oiContact->subscribeContactToList($cid->contactId, 80263, 'normal');
			
			/* Send Notification to Admin about this Lead */			
			$subject= 'NEW Recherche Transport Inquiry Received:';		
			$message = nl2br("NEW Recherche Transport Inquiry Received:
							Type de transportation :  ".trim($type_transport)."
							Name :  ".trim($fname)."
							Email :  ".trim($email)."
							Phone : ".$phone."
							Comment : ".$comment."");		
		
			$message = html_entity_decode(htmlentities($message, ENT_QUOTES, "UTF-8"));
			//$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );
			echo '<script>location.href = "/thank_you.php";</script>';
			exit;
		
		} catch (Exception $oException) { // Catch any exceptions
                    // Dump errors
                    var_dump($oiContact->getErrors());                   
                    // Grab the last raw response data
                    var_dump($oiContact->getLastResponse());
        }
}
