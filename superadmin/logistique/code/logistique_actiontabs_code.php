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
		$error = '';
		/*validate required fields*/
		$obj->add_fields($tabtitle, 'req', 'Please Enter Tab Title');		
		
		if ($id == "") {
			$obj->add_fields($tabtitle, 'uniquevalue', 'Please Enter Unique Tab Title', array('content_page', "tab_title='". mysql_real_escape_string($tabtitle) ."' and page_name= 'Logistique'"));
		} else {
			$obj->add_fields($tabtitle, 'uniquevalue', 'Please Enter Unique Tab Title', array('content_page', "tab_title='". mysql_real_escape_string($tabtitle) ."' and page_name= 'Logistique' and id!=".$id));
		}
	
		$obj->add_fields($content, 'req', 'Please Enter Content');		
		
		if (!isset($_GET['id'])) {
			$obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Banner Image');
		}
		$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Banner Image');
		if ($_FILES['file']['name'] != "") {
			$obj->add_fields($_FILES['file'], "imgwh=251,207", "Please Upload Valid Banner Image(251pxX207px)");
		}		
		
		$error = $obj->validate();		   

			if ($error) {
				$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
			} else {
				
				/*save bannr section content*/		
				
			if ($_FILES['file']['name'] != "" ) {
			  $image_name = time().$_FILES['file']['name'];
			  $path = LIST_ROOT.'/images/logistique/';
			  move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_name);
			} else {
				$image_name = $oldimage;
			}

				$slug = str_replace(' ', '_', strtolower($tabtitle));
				$dataArr  =  array('tab_title' => htmlentities($tabtitle), 'banner_image' => $image_name, 'content' => $content, 'page_name' => 'Logistique', 'slug' => $slug);
				if ($id == "") {
					$banner_insert   = $obj_setting->save('content_page', $dataArr);
				} else {
					$banner_insert   = $obj_setting->update('content_page', $dataArr, "id=".$id);
				}
				$_SESSION['success_msg'] = 'Successfully Saved';
			
				echo '<script>location.href="'.DEFAULT_URL.'/superadmin/logistique/index.php";</script>';
			
				exit;
			}
		}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('content_page', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$tabTitle	= $getSetting->tab_title;
			$bannerImage	= $getSetting->banner_image;
			$content	= $getSetting->content;
			$heading 		= "Edit";	
		} else {
			$heading 		= "Add New";	
		}
		
		
