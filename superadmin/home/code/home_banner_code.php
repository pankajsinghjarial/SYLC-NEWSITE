<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
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
		
		 if ($url != "") {
			$obj->add_fields($url, 'validURL', 'Please Enter A Valid  Url');
  
		}
		if (!isset($_GET['id'])) {
			$obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Image');
		}
		$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		if ($_FILES['file']['name'] != "") {
			$obj->add_fields($_FILES['file'], "imgwh=300,150", "Please Upload Valid Image(300pxX150px)");
		}		
		
		$error = $obj->validate();		   

			if ($error) {
				$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
			} else {
				
				/*save bannr section content*/		
				
			if ($_FILES['file']['name'] != "" ) {
			  $image_name = time().$_FILES['file']['name'];
			  $path = LIST_ROOT.'/images/home/banner/';
			  move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_name);
			} else {
				$image_name = $oldimage;
			}
				$dataArr  =  array( 'banner_image' => $image_name, 'content' => $content, 'url' => $url, 'status' => $status);
				if ($id == "") {
					$banner_insert   = $obj_setting->save('rot_banner', $dataArr);
				} else {
					$banner_insert   = $obj_setting->update('rot_banner', $dataArr, "id=".$id);
				}
				$_SESSION['success_msg'] = 'Successfully Saved';
			
				echo '<script>location.href="'.DEFAULT_URL.'/superadmin/home/index.php";</script>';
			
				exit;
			}
		}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('rot_banner', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$bannerImage	= $getSetting->banner_image;
			$content	 	= $getSetting->content;
			$url	 		= $getSetting->url;
			$status	 		= $getSetting->status;
		}
		
		
