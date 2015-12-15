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
		$obj->add_fields($productName, 'req', 'Please Enter Content');
		$obj->add_fields($description, 'req', 'Please Enter Content');
		$obj->add_fields($amount, 'req', 'Please Enter Content');
		
		 
		if (!isset($_GET['id'])) {
			$obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Image');
		}
		$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		if ($_FILES['file']['name'] != "") {
			$obj->add_fields($_FILES['file'], "imgwh=251,207", "Please Upload Valid Image(251pxX207px)");
		}		
		
		$error = $obj->validate();		   

			if ($error) {
				$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
			} else {
				
				/*save bannr section content*/		
				
			if ($_FILES['file']['name'] != "" ) {
			  $image_name = time().$_FILES['file']['name'];
			  $path = LIST_ROOT.'/images/accessories/banner/';
			  move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_name);
			} else {
				$image_name = $oldimage;
			}
				$dataArr  =  array('productname' => $productName,  'image' => $image_name, 'description' => $description, 'amount' => $amount);
				if ($id == "") {
					$banner_insert   = $obj_setting->save('accessories', $dataArr);
				} else {
					$banner_insert   = $obj_setting->update('accessories', $dataArr, "id=".$id);
				}
				$_SESSION['success_msg'] = 'Successfully Saved';
			
				echo '<script>location.href="'.DEFAULT_URL.'/superadmin/accessories/index.php";</script>';
			
				exit;
			}
		}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('accessories', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$productName	= $getSetting->productname;
			$productImage	= $getSetting->image;
			$description	= $getSetting->description;
			$amount	 		= $getSetting->amount;
			$heading 		= "Edit";	
		} else {
			$heading 		= "Add New";	
		}
		
		
