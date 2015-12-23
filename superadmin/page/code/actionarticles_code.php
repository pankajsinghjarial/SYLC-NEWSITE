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
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error='';
		/*validate required fields*/
		$obj->add_fields($category_id, 'req', 'Please Select Category');
		$obj->add_fields($title, 'req', 'Please Enter Title Name');
		$obj->add_fields($content, 'req', 'Please Enter Content');
		
		$error = $obj->validate();		   

			if ($error) {
				$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
			} else {
				
				/*save category*/					
			
				$slug = str_replace(' ', '_', strtolower($title));
				$dataArr  =  array('category_id' => $category_id, 'title' => $title, 'content' => $content, 'slug' => $slug);
				if ($id == "") {
					$categoryInsert   = $obj_setting->save('news_articles', $dataArr);
				} else {
					$categoryInsert   = $obj_setting->update('news_articles', $dataArr, "id=".$id);
				}
				$_SESSION['success_msg'] = 'Successfully Saved';
			
				echo '<script>location.href="'.DEFAULT_URL.'/superadmin/page/articles.php";</script>';
			
				exit;
			}
		}		
        /*Fetch banner section content*/
        if (isset($_GET['id'])) {
			$fetchSetting 	= $obj_setting->read('news_articles', 'id = '.$_GET['id']);
			$getSetting 	= $db->fetchNextObject($fetchSetting);
			$id	= $getSetting->id;
			$categoryId	= $getSetting->category_id;			
			$title			= $getSetting->title;			
			$content		= $getSetting->content;			
			$heading 		= "Edit";	
		} else {
			$heading 		= "Add New";	
		}
		$allCategories = $obj_setting->customQuery("SELECT id,category_name FROM  news_category order by category_name ASC");

		
