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
		$obj->add_fields($category_name, 'req', 'Please Enter Category Name');
		
		$error = $obj->validate();		   

			if ($error) {
				$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
			} else {
				
				/*save category*/					
			
				$slug = str_replace(' ', '_', strtolower($category_name));
				$dataArr  =  array('category_name' => $category_name, 'slug' => $slug);
				if ($id == "") {
					$categoryInsert   = $obj_setting->save('news_category', $dataArr);
				} else {
					$categoryInsert   = $obj_setting->update('news_category', $dataArr, "id=".$id);
				}
				$_SESSION['success_msg'] = 'Successfully Saved';
			
				echo '<script>location.href="'.DEFAULT_URL.'/superadmin/page/news_category.php";</script>';
			
				exit;
			}
		}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('news_category', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$catgoryName	= $getSetting->category_name;			
			$heading 		= "Edit";	
		} else {
			$heading 		= "Add New";	
		}
		
		
