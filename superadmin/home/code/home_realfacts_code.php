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

		$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		if ($_FILES['file']['name'] != "") {
			$obj->add_fields($_FILES['file'], "imgwh=1100,450", "Please Upload Valid Image(1100pxX450px)");
		}	
		$error = $obj->validate();		   

		if ($error) {
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>$error</font>";
		} else {
			
			/*save real facts section content*/
			
			if ($_FILES['file']['name'] != "" ) {
			  $image_name = time().$_FILES['file']['name'];
			  $path = LIST_ROOT.'/images/home/';
			  move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_name);
			} else {
				$image_name = $oldimage;
			}
			
			$dataArr  =  array('content' => $content, 'image' => $image_name,);
			$aboutus_insert   = $obj_setting->update('editor_rows', $dataArr, "id=3");
			$_SESSION['success_msg'] = 'Successfully Saved';
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/home/real_facts.php";</script>'; 
			exit;
		}
		}		
        /*Fetch real facts section content*/
		$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 3');
		$getSetting 	= $db->fetchNextObject($fetchSetting);
		$content		= $getSetting->content;		
		$backgroundImage		= $getSetting->image;		
		
