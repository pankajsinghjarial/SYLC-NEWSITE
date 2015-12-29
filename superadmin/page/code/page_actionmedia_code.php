<?php
/*************************************************************************************************************
#Description : This Code is used to Manage media
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting = new common();
$obj 		 = new validation();
$path = LIST_ROOT.'/images/home/banner/';
#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error = '';
	/*validate required fields*/
	$obj->add_fields($mediaTitle, 'req', 'Please Enter Title');
	
	if ($media_type == '0') {
		$obj->add_fields($url, 'req', 'Please Enter Youtube URL');
		$obj->add_fields($url, 'url', 'Please Enter Valid Youtube URL');
		$obj->add_fields($url, 'youtubeurl', 'Please Enter Valid Youtube URL' );
	} else {
		$url = '';
	}
	 
	if (!isset($_GET['id'])) {
		$obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Image');
	}
	$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
	if ($_FILES['file']['name'] != "") {
		$obj->add_fields($_FILES['file'], "imgwh=200,100", "Please Upload Valid Image(200pxX100px)");
	}		
	
	$error = $obj->validate();		   

	if ($error) {
		$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	} else {
		
		/*save bannr section content*/		
		
	if ($_FILES['file']['name'] != "" ) {
	  $image_name = time().$_FILES['file']['name'];
	  $path       = LIST_ROOT.'/images/pages/media/';
	  move_uploaded_file($_FILES["file"]["tmp_name"], $path.$image_name);
	} else {
		$image_name = $oldimage;
	}

		$slug = str_replace(' ', '_', strtolower($tabtitle));
		$dataArr  =  array('title' => $mediaTitle, 'image' => $image_name, 'youtubeurl' => $url, 'type' => $media_type);
		if ($id == "") {
			$banner_insert = $obj_setting->save('media', $dataArr);
		} else {
			$banner_insert = $obj_setting->update('media', $dataArr, "id=".$id);
		}
		$_SESSION['success_msg'] = 'Successfully Saved';
	
		echo '<script>location.href="'.DEFAULT_URL.'/superadmin/page/media.php";</script>';
	
		exit;
	}
}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('media', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$mediaType	= $getSetting->type;
			$mediaTitle	 = $getSetting->title;
			$bannerImage = $getSetting->image;
			$url	= $getSetting->youtubeurl;
			$heading 		= "Edit";	
		} else {
			$heading 		= "Add New";	
		}
		
		

