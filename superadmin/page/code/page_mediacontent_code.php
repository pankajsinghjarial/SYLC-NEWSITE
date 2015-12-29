<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting = new common();
$obj 		 = new validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error = '';
	/*validate required fields*/

	$obj->add_fields($content, 'req', 'Please Enter Content');
	$obj->add_fields($_FILES['topbanner'], 'ftype=jpg,gif,png', 'Please Upload Valid Banner');
	$obj->add_fields($_FILES['topbanner'], "imgwh=1250,300", "Please Upload Valid Banner(1250pxX00px)");
	
	$error = $obj->validate();

	if ($error) {
		$errorMsg = "<font color='#FF0000' family='verdana' size=2>$error</font>";
	} else {		
		/*save media content*/
		
		if ($_FILES['topbanner']['name'] != "" ) {
			$image_name = time().$_FILES['topbanner']['name'];
			$path = LIST_ROOT.'/images/pages/media/';
			move_uploaded_file($_FILES["topbanner"]["tmp_name"], $path.$image_name);
		} else {
			$image_name = $oldtopimage;
		}
		
		$dataArr  =  array('page_name' => 'media', 'content' => $content, 'banner_image' => $image_name);
		$aboutus_insert = $obj_setting->update('content_page', $dataArr, "id=16");
		
		$_SESSION['success_msg'] = 'Successfully Saved';
		echo '<script>location.href="'.DEFAULT_URL.'/superadmin/page/mediacontent.php";</script>'; 
		exit;
	}
	}
	/*Fetch media content*/
	$fetchSetting = $obj_setting->read('content_page', 'id = 16');
	$getSetting   = $db->fetchNextObject($fetchSetting);
	$content	  = $getSetting->content;
	$topBanner	  = $getSetting->banner_image;
