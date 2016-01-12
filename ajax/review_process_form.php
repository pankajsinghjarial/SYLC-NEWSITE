<?php include("../conf/config.inc.php");

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		
        // Get the form fields and remove whitespace.
        $name 	 = strip_tags(trim($_POST["inputName"]));
		$name 	 = str_replace(array("\r","\n"),array(" "," "),$name);
        $email 	 = filter_var(trim($_POST["inputEmail"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["inputMessage"]);
        $phone 	 = strip_tags(trim($_POST["inputPhone"]));
        $make_name = trim($_POST["makeName"]);
        $model_name = trim($_POST["modelName"]);
        $Year = trim($_POST["Year"]);
        $currenturl = trim($_POST["currentUrl"]);
        $title = $make_name.' '.$model_name.' '.$Year;
        $listName = 'Revue_automobile( '.$make_name.'-'.$model_name.'-'.$Year.' )';
        $title_url = $title.'( <a href="'.$currenturl.'">'.$currenturl.'</a> )';        
        if(isset($_POST["InputCheckbox"])){
			$checked = "Yes";
		}else{
			$checked = "--";
		}
        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
		
        
    require_once('../lib/iContactApi.php'); 
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
            $getLists = $oiContact->getLists();
            $found= 0;
           
            foreach($getLists as $aList){
				$nameExisting = $aList->name;
				if($nameExisting == $listName){
						$id =  $aList->listId;
						$found =1;
						break;
				}
				
			}
			$cid = $oiContact->CustomaddContactForm($email, 'normal', '', null, $phone, $message, $name, null, $make_name, $model_name, $Year);
			
			if($found){
				
				$res = $oiContact->subscribeContactToList($cid->contactId, $id, 'normal');
				
			}else{
				
				$createdList = $oiContact->addList($listName, 411803, true, false, false, $listName, $listName);
				$res = $oiContact->subscribeContactToList($cid->contactId, $createdList[0]->listId, 'normal');
			}
            
            //$cid = $oiContact->CustomaddContactForm($email, 'normal', '', null, $phone, $comment, $fname);
			//$res = $oiContact->subscribeContactToList($cid->contactId, 80005, 'normal');
			/* Send Notification to Admin about this Lead */				
            $message = "<p>New Revue Automobile Enquiry received:</p>
						<table>
						<tr>
						<td><strong>Name:</strong>:</td>
						<td>$name</td>
						</tr>
						<tr>
						<td><strong>Email</strong>:</td>
						<td>$email</td>
						</tr>
						<tr>
						<td><strong>Numero de telephone</strong>:</td>
						<td>$phone</td>
						</tr>
						<tr>
						<td><strong>Message</strong>:</td>
						<td>$message</td>
						</tr>
						<tr>
						<td><strong>Recherchez vous ce type de vehicule? </strong>:</td>
						<td>$checked</td>
						</tr>
						</tr>
						<tr>
						<td><strong>Voiture </strong>:</td>
						<td>$title_url</td>
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
			$mail->AddAddress('seobrandtester003@gmail.com');				
			$mail->Subject  = 'New Revue Automobile Enquiry received.';			
			$mail->WordWrap   = 100; // set word wrap
				
			$mail->MsgHTML($body);				
			$mail->IsHTML(true); // send as HTML				
			$mail->Send();
			echo 1;
			exit;
		
		} catch (Exception $oException) { // Catch any exceptions
             http_response_code(500);
             echo "Oops! Something went wrong and we couldn't send your message.";      
        }
               

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>

