<?php
include("conf/config.inc.php"); 
// CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
// Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
// Set this to 0 once you go live or don't require logging.
define("DEBUG", 0);

// Set to 0 once you're ready to go live
define("USE_SANDBOX", 1);
define("DB_HOST", 'localhost'); //DB_HOST, DB_USER, DB_PASS
define("DB_USER", 'seobrand_dbuser');
define("DB_PASS", 'PJisGr*Mn');
define("DB_SYL_NAME", 'seobrand_sylcexpo_sylcorp');
define("LIST_FOLDER", 'newsite');
define('DEFAULT_URL', "http://".$_SERVER["HTTP_HOST"].LIST_FOLDER);

define("LOG_FILE", "./ipn.log");

// Read POST data
// reading posted data directly from $_POST causes serialization
// issues with array data in POST. Reading raw POST data from input stream instead.
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
		$myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		$value = urlencode(stripslashes($value));
	} else {
		$value = urlencode($value);
	}
	$req .= "&$key=$value";
}

// Post IPN data back to PayPal to validate the IPN data is genuine
// Without this step anyone can fake IPN data

if(USE_SANDBOX == true) {
	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
} else {
	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}

$ch = curl_init($paypal_url);
if ($ch == FALSE) {
	return FALSE;
}

curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

if(DEBUG == true) {
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
}

// CONFIG: Optional proxy configuration
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);

// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
// of the certificate as shown below. Ensure the file is readable by the webserver.
// This is mandatory for some environments.

//$cert = __DIR__ . "./cacert.pem";
//curl_setopt($ch, CURLOPT_CAINFO, $cert);

$res = curl_exec($ch);
if (curl_errno($ch) != 0) // cURL error
	{
	if(DEBUG == true) {	
		error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
	}
	curl_close($ch);
	exit;

} else {
		// Log the entire HTTP response if debug is switched on.
		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
			error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
		}
		curl_close($ch);
}

// Inspect IPN validation result and act accordingly

// Split response headers and payload, a better way for strcmp
$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp ($res, "VERIFIED") == 0) {
	// check whether the payment_status is Completed
	// check that txn_id has not been previously processed
	// check that receiver_email is your PayPal email
	// check that payment_amount/payment_currency are correct
	// process payment and mark item as paid.

	// assign posted variables to local variables
	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$payer_email = $_POST['payer_email'];
	$custom = $_POST['custom'];
	
	if(DEBUG == true) {
		error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
	}
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link) {
        error_log(date('[Y-m-d H:i e] '). "Coulssd not connect: " . mysql_error() . PHP_EOL, 3, LOG_FILE);
    }
    if(!mysql_select_db(DB_SYL_NAME, $link)){
        error_log("Could not select databassse.", 3, LOG_FILE);
    }
    $message = var_dump($_POST);
    if(strtolower($payment_status)=='completed'){
        $data = unserialize($custom);
        if($data['pg'] == 1){
            $getQuery = 'SELECT first_name, last_name, address, telephone, country, city, postal_code,email, make, model, year, price, exterior_color, interior_color, trim FROM temp_car_detail_payment_info WHERE id ='.$data['id'];
            $infoResource = mysql_query($getQuery);
            $info = mysql_fetch_array($infoResource);
            //error_log(serialize($info), 3, LOG_FILE);
            $first_name = mysql_real_escape_string($info['last_name']);
            $name = mysql_real_escape_string($info['first_name']);
            $email=mysql_real_escape_string($info['email']);
            $phone=mysql_real_escape_string($info['telephone']);
            $car_brand = mysql_real_escape_string($info['make']);
            $model = mysql_real_escape_string($info['model']);
            $year = mysql_real_escape_string($info['year']).',';
            $service = mysql_real_escape_string($info['country']);
            $city = mysql_real_escape_string($info['city']);
            $address = mysql_real_escape_string($info['address']);
            $postal_code = mysql_real_escape_string($info['postal_code']);
            $exterior_color = mysql_real_escape_string($info['exterior_color']);
            $interior_color = mysql_real_escape_string($info['interior_color']);
            $trim = mysql_real_escape_string($info['trim']);
            $price = mysql_real_escape_string($info['price']);

            $sql="INSERT INTO `leads`( name, first_name, email,phone, car_brand,model, car_brand1, car_model1, year, service, country ,address, city, postcode ) VALUES ( '". $name ."', '". $first_name ."', '". $email ."', '". $phone ."', '". $car_brand ."', '". $model ."', '". $car_brand ."', '". $model ."', '". $year ."', '". $service ."', '". $service ."', '". $address ."', '". $city ."', '". $postal_code ."' )";

            $sel_query2="Select * from users WHERE role='admin' and id = '2'";

            $rs_sel2=mysql_query($sel_query2);
            if(!$rs_sel2){
                error_log("Error : ".mysql_error(), 3, LOG_FILE);
            }
            while($arr_sel2=mysql_fetch_array($rs_sel2))
            {
                $adminemail = $arr_sel2['email'];
            }
            $rs_sel=mysql_query($sql);
            if(!$rs_sel){
                error_log("Error : ".mysql_error(), 3, LOG_FILE);
            }
            $lastid = mysql_query('select id from leads order by id DESC limit 0,1');
            $lastfetch = mysql_fetch_object($lastid);
            $brad = str_replace(",","",$car_brand);
            $mod = str_replace(",","",$model);
            $yr = str_replace(",","",$year);
            mysql_query("INSERT INTO `lead_details`(lead_id,car_brand,model,created_at,year,destination,carprice,exterior,interior,trimpack) VALUES ('$lastfetch->id','".$brad."','".$mod."','".$current_time."','".$yr."','".$service."','".$price."','".$exterior_color."','".$interior_color."','".$trim."');");
            //SMTP MAIL STARTS
            $getLeadId = mysql_query('select id from lead_details where lead_id='.$lastfetch->id);
            $leadId = mysql_fetch_object($getLeadId);
            
            try {
                $to_email = $adminemail;
                //$to_email = 'pankaj.jarial@netsolutionsindia.com';
                $message = "<meta charset=\"utf-8\">
                            <p>Voici les détails:</p>
                            <table>
                            <tr>
                            <td><strong>Nom</strong>:</td>
                            <td>$name $first_name</td>
                            </tr>
                            <tr>
                            <td><strong>Email</strong>:</td>
                            <td>$email</td>
                            </tr>
                            <tr>
                            <td><strong>Téléphone</strong>:</td>
                            <td>$phone</td>
                            </tr>
                            <tr>
                            <td><strong>Marque</strong>:</td>
                            <td>$brad</td>
                            </tr>
                            <tr>
                            <td><strong>Modèle</strong>:</td>
                            <td>$mod</td>
                            </tr>
                            </table><table>
                    
                      <tr>
                      <td colspan='2'><p><strong>Sylc Corporation<br/>Tracking Departement</strong></p></td>
                      </tr>
                     </table>";
                $mail = new PHPMailer(true); //New instance, with exceptions enabled
                    
                $body             = $message;
                $body             = preg_replace('/\\\\/','', $body); //Strip backslashes
                $mail->CharSet    = 'UTF-8';
                $mail->IsSMTP();                           // tell the class to use SMTP
                $mail->SMTPAuth   = true;                  // enable SMTP authentication
                $mail->Port       = 25;                    // set the SMTP server port
                $mail->Host       = "mail.livemarketnews.com"; // SMTP server
                $mail->Username   = "mails@livemarketnews.com";     // SMTP server username
                $mail->Password   = "Stone!@#";            // SMTP server password
                    
                $mail->IsSendmail();  // tell the class to use Sendmail
                    
                $mail->AddReplyTo("no-reply@example.com","First Last");
                    
                $mail->From       = "info@sylc-export.com";
                $mail->FromName   = "Sylc-Export Update";
                    
                    
                $mail->AddAddress($to_email);
                    
                $mail->Subject  = 'Enquête de voiture reçu';
                    
                //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->WordWrap   = 80; // set word wrap
                    
                $mail->MsgHTML($body);
                    
                $mail->IsHTML(true); // send as HTML
                    
                $mail->Send();

                
                //echo 'Message has been sent.';
            } catch (phpmailerException $e) {
                error_log("Error : ".$e->errorMessage(), 3, LOG_FILE);
            }
            try {
                $to_email = $email;
                //$to_email = 'pankaj.jarial@netsolutionsindia.com';
                $message = "<meta charset=\"utf-8\"><p>Merci pour vos Détails:</p>
                <table>
                <tr>
                <td><strong>Nom</strong>:</td>
                <td>$name $first_name</td>
                </tr>
                <tr>
                <td><strong>Email</strong>:</td>
                <td>$email</td>
                </tr>
                <tr>
                <td><strong>Téléphone</strong>:</td>
                <td>$phone</td>
                </tr>
                <tr>
                <td><strong>Marque</strong>:</td>
                <td>$brad</td>
                </tr>
                <tr>
                <td><strong>Modèle</strong>:</td>
                <td>$mod</td>
                </tr>
                </table><table>

                <tr>
                <td colspan='2'><p><strong>Sylc Corporation<br/>Tracking Departement</strong></p></td>
                </tr>
                </table>";

                $mail = new PHPMailer(true); //New instance, with exceptions enabled
                $mail->CharSet = 'UTF-8';
                $body             = $message;
                $body             = preg_replace('/\\\\/','', $body); //Strip backslashes
                    
                $mail->IsSMTP();                           // tell the class to use SMTP
                $mail->SMTPAuth   = true;                  // enable SMTP authentication
                $mail->Port       = 25;                    // set the SMTP server port
                $mail->Host       = "mail.livemarketnews.com"; // SMTP server
                $mail->Username   = "mails@livemarketnews.com";     // SMTP server username
                $mail->Password   = "Stone!@#";            // SMTP server password
                    
                $mail->IsSendmail();  // tell the class to use Sendmail
                    
                $mail->AddReplyTo("no-reply@example.com","First Last");
                    
                $mail->From       = "info@sylc-export.com";
                $mail->FromName   = "Sylc-Export Update";
                    
                    
                $mail->AddAddress($to_email);
                    
                $mail->Subject  = 'Enquête de voiture reçu';
                    
                //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->WordWrap   = 80; // set word wrap
                    
                $mail->MsgHTML($body);
                    
                $mail->IsHTML(true); // send as HTML
                    
                $mail->Send();

                //echo 'Message has been sent.';
            } catch (phpmailerException $e) {
                error_log("Error : ".$e->errorMessage(), 3, LOG_FILE);
            }
            try {
                
                $to_email = $email;
                //$to_email = 'pankaj.jarial@netsolutionsindia.com';
                $message = "
                <table>
                <tr>
                <td colspan='2'>
                <p>Vous êtes invités à signer votre facture par Sylc Corporation:</p>
                </td>
                <table>
                </tr>
                <tr>
                <td>Ouvrez votre facture pdf en <a href='".DEFAULT_URL."/voitures-americaines/pop_form_details.php?id=".$lastfetch->id."&lead_id=".$leadId->id."&from=user'>Cliquant Ici</a><br/><br/>
                La signature électronique est simple, rapide et économise le papier. Il suffit juste de signer avec votre souris.</td>
                </tr>
                          <tr>
                          <td colspan='2'><p>Merci de votre confiance, SYLC Corporation</p></td>
                          </tr>
                         </table>";

                $mail = new PHPMailer(true); //New instance, with exceptions enabled
                $mail->CharSet = 'UTF-8';
                $body             = $message;
                $body             = preg_replace('/\\\\/','', $body); //Strip backslashes
                    
                $mail->IsSMTP();                           // tell the class to use SMTP
                $mail->SMTPAuth   = true;                  // enable SMTP authentication
                $mail->Port       = 25;                    // set the SMTP server port
                $mail->Host       = "mail.livemarketnews.com"; // SMTP server
                $mail->Username   = "mails@livemarketnews.com";     // SMTP server username
                $mail->Password   = "Stone!@#";            // SMTP server password
                    
                $mail->IsSendmail();  // tell the class to use Sendmail
                    
                $mail->AddReplyTo("no-reply@example.com","First Last");
                    
                $mail->From       = "info@sylc-export.com";
                $mail->FromName   = "Sylc-Export Update";
                    
                    
                $mail->AddAddress($to_email);
                    
                $mail->Subject  = 'Votre facture Sylc Corporation';
                    
                //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->WordWrap   = 80; // set word wrap
                    
                $mail->MsgHTML($body);
                    
                $mail->IsHTML(true); // send as HTML
                    
                $mail->Send();
                $date = date("Y-m-d H:i:s");
                mysql_query("Update lead_details Set `mail_sent` = '1' ,`mail_sent_date` ='$date' where id = ".$leadId->id);
                //echo 'Message has been sent.';
            } catch (phpmailerException $e) {
                error_log("Error : ".$e->errorMessage(), 3, LOG_FILE);
            }



               ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //																ICONTACT API																				//		
             ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // icontact username

            $user = 'sylccorp';

            // application password

            $pass = 'sylctmppwd';

            // API Key

            $key  = '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels';


            // Build iContact authentication

            $headers = array(

            'Accept: text/xml',

            'Content-Type: text/xml',

            'Api-Version: 2.0',

            'Api-AppId:' . $key,

            'Api-Username:' . $user,

            'Api-Password:' . $pass

            );

            // get accountID

            $ch=curl_init("https://app.icontact.com/icp/a/");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $buf = curl_exec($ch);

            curl_close($ch);

            $account_id = "";

            if (($pos=strpos($buf,"<accountId>"))!==false)

            {

            $account_id = substr($buf, strlen("<accountId>")+$pos);

            if (($pos=strpos($account_id,"<"))!==false)

            {

            $account_id = substr($account_id, 0, $pos);

            }

            }

            //echo "<br>".$account_id;

            // Connect to iContact to retrieve the client folder id

            $ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $buf = curl_exec($ch);

            curl_close($ch);

            // Extract client folder id from response

            $client_folder_id = "";

            if (($pos=strpos($buf,"<clientFolderId>"))!==false)

            {

            $client_folder_id = substr($buf, strlen("<clientFolderId>")+$pos);

            if (($pos=strpos($client_folder_id,"<"))!==false)

            {

            $client_folder_id = substr($client_folder_id, 0, $pos);

            }

            }

            //echo "<br>".$client_folder_id;

            // Connect to iContact to retrieve the list id

            $ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/lists");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $buf = curl_exec($ch);

            curl_close($ch);

            // Extract client folder id from response

            $list_id = "";

            if (($pos=strpos($buf,"<listId>"))!==false)

            {

            $list_id = substr($buf, strlen("<listId>")+$pos);

            if (($pos=strpos($list_id,"<"))!==false)

            {

            $list_id = substr($list_id, 0, $pos);

            }

            }

            $list_id = 14886;

            $last_name = $name;

            //$find_car_brand = mysql_fetch_row(mysql_query("SELECT car_brand FROM car_brand WHERE id=$car_brand"));

            //$find_car_model = mysql_fetch_row(mysql_query("SELECT model FROM model WHERE id=$model"));

            $find_car_brand = $car_brand;
            $find_car_model = $model;

            $data = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n<contacts>\r\n";

            $data.= "<contact>\r\n";

            $data.= "<email>$email</email>\r\n";

            $data.= "<firstName>$first_name</firstName>\r\n";

            $data.= "<lastName>$last_name</lastName>\r\n";

            $data.= "<phone>$phone</phone>\r\n";

            $data.= "<carbrand>$find_car_brand[0]</carbrand>\r\n";

            $data.= "<model>$find_car_model[0]</model>\r\n";

            $data.= "<year>$year</year>\r\n";

            $data.= "<service>$service</service>\r\n";

            $data.= "</contact>\r\n</contacts>";

            // Add contact

            $ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/contacts/");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $buf = curl_exec($ch);

            curl_close($ch);

            $contact_id = "";

            if (($pos=strpos($buf,"<contactId>"))!==false)

            {

            $contact_id = substr($buf, $pos+strlen("<contactId>"));

            if (($pos=strpos($contact_id,"<"))!==false)

            {

            $contact_id = substr($contact_id,0,$pos);

            }

            }
            //echo $contact_id;
            // Build contact record

            $detail = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n";

            $detail.= "<subscriptions>\r\n";

            $detail.= "<subscription>\r\n";

            $detail.= "<contactId>$contact_id</contactId>\r\n";

            $detail.= "<listId>$list_id</listId>\r\n";

            $detail.= "<status>normal</status>\r\n";

            $detail.= "</subscription>\r\n</subscriptions>";

            //add subscription

            $ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/subscriptions");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $detail);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $buf = curl_exec($ch);

            curl_close($ch);

            $subscription_id = "";

            if (($pos=strpos($buf,"<subscriptionId>"))!==false)

            {

            $subscription_id = substr($buf, $pos+strlen("<subscriptionId>"));

            if (($pos=strpos($subscription_id,"<"))!==false)

            {

            $subscription_id = substr($subscription_id,0,$pos);

            }

            }

            //echo $subscription_id;

            // If we have a subscription id OR this subscription already existed, we're good

            $result = !empty($subscription_id) || strpos($buf,"could not be updated")!==false;

            // Set result string

            $result_str = ($result ? "Updated subscription $subscription_id" : $buf);

            error_log($result_str, 3, LOG_FILE);
        }
    }
} else if (strcmp ($res, "INVALID") == 0) {
	// log for manual investigation
	// Add business logic here which deals with invalid IPN messages
	if(DEBUG == true) {
		error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
	}
}

?>
