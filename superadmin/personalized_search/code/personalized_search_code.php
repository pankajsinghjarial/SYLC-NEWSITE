<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
		$error='';
		/*validate required fields*/		
		$obj->add_fields($content, 'req', 'Please Enter Content');	
		
		$error = $obj->validate();		   

		if ($error) {
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>$error</font>";
		} else {
			
			/*save personalized search content*/				
			$dataArr  =  array('content' => $content);
			$aboutus_insert   = $obj_setting->update('content_page', $dataArr, "page_name = 'Personalized Search'");
			$_SESSION['success_msg'] = 'Successfully Saved';
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/personalized_search/index.php";</script>'; 
			exit;
			}
		}
		
        /*Fetch personalized search content*/
		$fetchSetting 	= $obj_setting->read('content_page', "page_name = 'Personalized Search'");
		$getSetting 	= $db->fetchNextObject($fetchSetting);
		$content		= $getSetting->content;
		
