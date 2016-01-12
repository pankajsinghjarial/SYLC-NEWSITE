<?php 
extract($_POST);
extract($_GET);
$search      = new search();
$obj_setting = new common();

$modelList = array();
$manf = $obj_setting->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while ($row = mysql_fetch_assoc($manf)) {
    $modelList[] = $row;
}
/*Fetch welcome section content*/
$fetchSetting = $obj_setting->read('editor_rows', 'id = 1');
$getSetting   = $db->fetchNextObject($fetchSetting);
$content	  = $getSetting->content;

/*Fetch rotating banner section content*/
$allBanner    = $obj_setting->customQuery("SELECT * FROM  rot_banner where status=1 order by id asc");
$totalBanners = mysql_num_rows($allBanner); 

/*Fetch about us section content*/
$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 2');
$getSetting 	= $db->fetchNextObject($fetchSetting);
$aboutUsContent = $getSetting->content;

/*Fetch about us section content*/
$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 3');
$getSetting 	= $db->fetchNextObject($fetchSetting);
$realFactsContent        = $getSetting->content;
$realFactBackgroundImage = $getSetting->image;

/*Fetch homepage review content*/
/////
$check_home_review_one = $obj_setting->getValueByField("superadmin_options" ,"option_name='HomeReviewOne'" ,"option_value" );
$check_home_review_two = $obj_setting->getValueByField("superadmin_options" ,"option_name='HomeReviewTwo'" ,"option_value" );
$check_home_review = $check_home_review_one."','".$check_home_review_two;
$home_reviews    = $obj_setting->customQuery("SELECT * FROM  reviews WHERE id IN ('".$check_home_review."')  ");
$reviewsArr = array();
$review_calsses = array('fadeInLeft','fadeInRight');
while ($rev = mysql_fetch_object($home_reviews)) {
	$short_description = $rev->short_description;
    $make = $rev->make_name;
    $model = $rev->model_name;
    $year = $rev->year;
    $title = $make.' '.$model.' '.$year;
    $image = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$rev->image;
    $reviewsArr[] = array('short_description'=>$short_description, 'image'=>$image, 'title'=>$title ); 
}
/////
// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
	global $urlfilter;
	global $i;
	// Iterate through each filter in the array
	foreach($filterarray as $itemfilter) {
		
		// Iterate through each key in the filter
		foreach ($itemfilter as $key => $value) {
			
			if (is_array($value)) {
				foreach($value as $j => $content) { // Index the key for each value
					$urlfilter .= "&itemFilter($i).$key($j)=$content";
				}
			} else {
				if ($value != "") {
					$urlfilter .= "&itemFilter($i).$key=$value";
				}
			}
		}
		$i++;
	}

	return "$urlfilter";
} // End of buildURLArray function


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['realfactform']) ) {
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
            $cid = $oiContact->CustomaddContactForm($email, 'normal', '', null, $phone, $comment, $fname);
			$res = $oiContact->subscribeContactToList($cid->contactId, 80005, 'normal');
			
			/* Send Notification to Admin about this Lead */				
            $message = "
						<p>Demande de recherche:</p>
						<table>
						<tr>
						<td><strong>Nom</strong>:</td>
						<td>$fname</td>
						</tr>
						<tr>
						<td><strong>Email</strong>:</td>
						<td>$email</td>
						</tr>
						<tr>
						<td><strong>Phone</strong>:</td>
						<td>$phone</td>
						</tr>
						<tr>
						<td><strong>Comments</strong>:</td>
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
			$mail->Subject  = 'Demande de recherche';			
			$mail->WordWrap   = 80; // set word wrap
				
			$mail->MsgHTML($body);				
			$mail->IsHTML(true); // send as HTML				
			$mail->Send();
			echo '<script>location.href = "'.DEFAULT_URL.'/thank_you.php";</script>';
			exit;
		
		} catch (Exception $oException) { // Catch any exceptions
                   
        }
}
