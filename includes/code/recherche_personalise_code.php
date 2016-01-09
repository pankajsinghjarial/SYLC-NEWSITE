<?php 
extract($_POST);
extract($_GET);

$common = new common();

/*Fetch personalized search content*/
$fetchSetting = $common->read('content_page', "page_name = 'Personalized Search'");
$getSetting   = $db->fetchNextObject($fetchSetting);
$content	  = $getSetting->content;

/*Fetch car brand names*/
$modelList = array();

$manf = $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`, `sort_order` ASC");

while ($row = mysql_fetch_assoc($manf)) {
	$modelList[] = $row;
}

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

/*Recherche personnalisee Inquiry*/
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once('lib/iContactApi.php');
	
	// code for lead save on iContact
	iContactApi::getInstance()->setConfig(array(
		'appId'		  => ICONTACT_APPID,
		'apiPassword' => ICONTACT_APIPASSWORD,
		'apiUsername' => ICONTACT_APIUSERNAME
	));
	
	// Store the singleton
	$oiContact = iContactApi::getInstance();
	
	try {
		//Create a contact
		 $oiContact->addList('testing listd',410014, true, false, false, 'Jusdt', 'ASomedList');
		
		/* $cid = $oiContact->CustomaddContactForm($email, 'normal',
		'', null, $phone, $comment,$fname, null);
		 $res   = $oiContact->subscribeContactToList($cid->contactId, 80263, 'normal');
			
		/* Send Notification to Admin about this Lead * /			
		$subject = 'NEW Recherche Personnalisee Inquiry Received:';		
		$message = nl2br("NEW Recherche Personnalisee Inquiry Received:
						Type de transportation :  ".trim($type_transport)."
						Name :  ".trim($fname)."
						Email :  ".trim($email)."
						Phone : ".$phone."
						Comment : ".$comment."");
	
		$message = html_entity_decode(htmlentities($message, ENT_QUOTES, "UTF-8"));
		//$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );
		echo '<script>location.href = "/thank_you.php";</script>';*/
		//exit;
		
	} catch (Exception $oException) {
		// Catch any exceptions
		// Dump errors
		$oiContact->getErrors();                   
		// Grab the last raw response data
		$oiContact->getLastResponse();
	}
//}
