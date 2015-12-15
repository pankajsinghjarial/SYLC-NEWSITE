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
		$obj->add_fields($brand_name, 'req', 'Please Enter Brand Name');
		$id = $_GET['id'];		
		$obj->add_fields($brand_name, 'unique', 'Please Enter Unique Brand Name', 'car_brands', "brand_name='". $brand_name . "' and id!=". $id);			
		
		$error = $obj->validate();		   

		if ($error) {
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error ."</font>";
		} else {
			
			/*save welcome section content*/
			

			$dataArr  =  array('brand_name' => $brand_name);
			if (!isset($_GET['id'])) {
				$aboutusInsert   = $obj_setting->save('car_brands', $dataArr);
			} else {
				$aboutusInsert   = $obj_setting->update('car_brands', $dataArr, 'id = '. $_GET['id']);
			}
			$_SESSION['success_msg'] = 'Successfully Saved';
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/home/brands.php";</script>'; 
			exit;
		}
		}
		
		/*Fetch brandn content*/
       
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('car_brands', 'id = '. $_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$brandName		= $getSetting->brand_name;
		}
		
