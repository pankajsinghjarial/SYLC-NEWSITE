<?php
/*************************************************************************************************************
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();
$path = LIST_ROOT.'/images/home/banner/';
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
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
		} else {		
			
			$dataArr  =  array('content' => $content);
			
			$banner_insert   = $obj_setting->update('content_page', $dataArr, "id=".$id);
			
			$_SESSION['success_msg'] = 'Successfully Saved';
		
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/presentation/index.php";</script>';
		
			exit;
		}
	}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('content_page', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$tabTitle	= $getSetting->tab_title;			
			$content	= $getSetting->content;
			$heading 		= "Edit";	
		} 