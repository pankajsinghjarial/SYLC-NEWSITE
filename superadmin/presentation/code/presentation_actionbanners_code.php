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
	
		$obj->add_fields($_FILES['topbanner'], 'ftype=jpg,gif,png', 'Please Upload Valid Top Banner');
		$obj->add_fields($_FILES['topbanner'], "imgwh=1250,300", "Please Upload Valid Top Banner(1250pxX00px)");
		
		$obj->add_fields($_FILES['sidebanner'], 'ftype=jpg,gif,png', 'Please Upload Valid Side Banner');
		$obj->add_fields($_FILES['sidebanner'], "imgwh=145,350", "Please Upload Valid Side Banner(145pxX350px)");
		
		$error = $obj->validate();		 

		if ($error) {
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>$error</font>";
		} else {
			
			/*save real facts section content*/
			
			if ($_FILES['topbanner']['name'] != "" ) {
			  $image_name = time().$_FILES['topbanner']['name'];
			  $path = LIST_ROOT.'/images/presentation/';
			  move_uploaded_file($_FILES["topbanner"]["tmp_name"],$path.$image_name);
			} else {
				$image_name = $oldtopimage;
			}
			
			if ($_FILES['sidebanner']['name'] != "" ) {
			  $sideBannerName = time().$_FILES['sidebanner']['name'];
			  $path = LIST_ROOT.'/images/presentation/';
			  move_uploaded_file($_FILES["sidebanner"]["tmp_name"],$path.$sideBannerName);
			} else {
				$sideBannerName = $oldsideimage;
			}
			
			$dataArr  =  array( 'content' => $image_name);
			$aboutus_insert   = $obj_setting->update('content_page', $dataArr, "id=6");
			
			$dataArr  =  array( 'content' => $sideBannerName,);
			$aboutus_insert   = $obj_setting->update('content_page', $dataArr, "id=7");
			$_SESSION['success_msg'] = 'Successfully Saved';
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/presentation/actionbanners.php";</script>'; 
			exit;
		}
		}		
        /*Fetch banner section content*/
		$fetchSetting 	= $obj_setting->read('content_page', 'id = 6');		
		$getSetting 	= $db->fetchNextObject($fetchSetting);
		$topBanner		= $getSetting->content;
		
		$fetchSetting 	= $obj_setting->read('content_page', 'id = 7');		
		$getSetting 	= $db->fetchNextObject($fetchSetting);
		$sideBanner		= $getSetting->content;		
	
		
