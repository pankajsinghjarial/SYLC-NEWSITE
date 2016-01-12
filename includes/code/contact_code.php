<?php 
require_once('lib/iContactApi.php'); 
include("functions/ebay_functions.php");
$obj_setting 		= new common();
$fetchContactPage = $obj_setting->customQuery("SELECT * FROM pages where id=123");
$ContactPageContent = mysql_fetch_array($fetchContactPage);
if(isset($_POST['contacAgreement']) &&  $_POST['contacAgreement'] == 'on'){
extract($_POST);
// code for lead save on iContact                        
                iContactApi::getInstance()->setConfig(array(
                    'appId' => '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels',
                    'apiPassword' => '230300AY1',
                    'apiUsername' => 'Sylccorp'
                ));
                // Store the singleton
                $oiContact = iContactApi::getInstance();
		try {
                //Create a contact
                $oiContact = iContactApi::getInstance();
		$cid = $oiContact->CustomaddContactForm($email,'normal' , NULL ,$fax,$phone,$notes);
		$res = $oiContact->subscribeContactToList($cid->contactId, 80172, 'normal');
		/* Send Notification to Admin about this Lead */
		// Your subject/*
		$subject= 'New SYLC Export contact us page Enquiry:';		
		$message = nl2br("New SYLC Export contact us page Enquiry:
							
							Email :  ".trim($email)."
							
							Contact :  ".$fax."
							
							Telephone : ".$phone."
							
							Notes : ".$notes."");
		
		
		$message = html_entity_decode(htmlentities($message, ENT_QUOTES, "UTF-8"));
		$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );
		echo '<script>location.href = '.DEFAULT_URL.'"/thank_you.php";</script>';
		exit;
		
		} catch (Exception $oException) { // Catch any exceptions
                    // Dump errors
                    var_dump($oiContact->getErrors());
                    // Grab the last raw request data
                    //var_dump($oiContact->getLastRequest());
                    // Grab the last raw response data
                    var_dump($oiContact->getLastResponse());
                }
		
}
?>
