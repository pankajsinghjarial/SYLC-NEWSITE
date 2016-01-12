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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
         //Create a contact
			$listName = "RecherchePersonaliseeEnquiry($marque)";
            $getLists = $oiContact->getLists();
            $found= 0;
           
            foreach($getLists as $aList){
				$nameExisting = $aList->name;
				if($nameExisting == $listName){
						$id =  $aList->listId;
						$found = 1;
						break;
				}
				
			}
			$cid = $oiContact->CustomaddContactForm($email, 'normal', '', $contact, $phone, $commentaires, '', null, $marque, $modele, $annee, $atext, $societe);
			
			if($found){
				
				$res = $oiContact->subscribeContactToList($cid->contactId, $id, 'normal');
				
			}else{
				
				$createdList = $oiContact->addList($listName, 411803, true, false, false, $listName, $listName);
				$res = $oiContact->subscribeContactToList($cid->contactId, $createdList[0]->listId, 'normal');
			}
			
			/* Send Notification to Admin about this Lead */				
            $message = "
						<p>Recherche Personalisee Enquiry($marque):</p>
						<table>
						<tr>
						<td><strong>Marque</strong>:</td>
						<td>$marque</td>
						</tr>
						<tr>
						<td><strong>Modele</strong>:</td>
						<td>$modele</td>
						</tr>
						<tr>
						<td><strong>Achat</strong>:</td>
						<td>$achat</td>
						</tr>
						<tr>
						<td><strong>Annee de</strong>:</td>
						<td>$annee</td>
						</tr>
						<tr>
						<tr>
						<td><strong>A</strong>:</td>
						<td>$atext</td>
						</tr>
						<tr>
						<tr>
						<td><strong>Commentaires</strong>:</td>
						<td>$commentaires</td>
						</tr>
						<tr>
						<tr>
						<td><strong>Societe</strong>:</td>
						<td>$societe</td>
						</tr>
						<tr>
						<td><strong>Contact</strong>:</td>
						<td>$contact</td>
						</tr>                  
						<tr>
						<td><strong>Telephone</strong>:</td>
						<td>$phone</td>
						</tr>                           
						<tr>
						<td><strong>Email</strong>:</td>
						<td>$email</td>
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
			$mail->Subject  = "Recherche Personalisee Enquiry($marque)";			
			$mail->WordWrap   = 80; // set word wrap
				
			$mail->MsgHTML($body);				
			$mail->IsHTML(true); // send as HTML				
			$mail->Send();
			echo '<script>location.href = "/thank_you.php";</script>';
			exit;
		
		} catch (Exception $oException) { // Catch any exceptions
                   
        }
}
