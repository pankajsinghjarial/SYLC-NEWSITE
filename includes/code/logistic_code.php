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

$title		 = $getSetting->tab_title;
$content     = $getSetting->content;
$bannerImage = $getSetting->banner_image;

/*Recherche Transport Inquiry*/
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logisticform'])) {
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
			$subject = $title.'-NEW Recherche Transport Inquiry Received:';		
			 $message = "<p>NEW Recherche Transport Inquiry Received:</p>
						<table>
						<tr>
						<td><strong>Type de transportation</strong>:</td>
						<td>$type_transport</td>
						</tr>
						<tr>
						<td><strong>Nom</strong>:</td>
						<td>$fname</td>
						</tr>
						<tr>
						<td><strong>Email</strong>:</td>
						<td>$email</td>
						</tr>
						<tr>
						<td><strong>Telephone</strong>:</td>
						<td>$phone</td>
						</tr>
						<tr>
						<td><strong>Notes</strong>:</td>
						<td>$comment</td>
						</tr>                           
						</table>";
			$mail = new PHPMailer(true); //New instance, with exceptions enabled
				
			$body             = $message;
			$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
				
			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP server port
			$mail->Host       = SMTP_HOST; // SMTP server
			$mail->Username   = SMTP_USERNAME;     // SMTP server username
			$mail->Password   = SMTP_PASSWORD;            // SMTP server password
				
			$mail->IsSendmail();  // tell the class to use Sendmail
				
			$mail->AddReplyTo("no-reply@example.com","First Last");				
			$mail->From       = "info@sylc-export.com";
			$mail->FromName   = SMTP_FROMNAME;					
			$mail->AddAddress(SITE_ADMIN_EMAIL);				
			$mail->Subject  = $subject;			
			$mail->WordWrap   = 80; // set word wrap
				
			$mail->MsgHTML($body);				
			$mail->IsHTML(true); // send as HTML				
			$mail->Send();
			echo '<script>location.href = "/thank_you.php";</script>';
			exit;
		
		} catch (Exception $oException) {
			// Catch any exceptions
			// Dump errors
			var_dump($oiContact->getErrors());                   
			// Grab the last raw response data
			var_dump($oiContact->getLastResponse());
        }
}
