<?php
/*************************************************************************************************************
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting    = new common();
$commonFunction = new commonFunction();
$obj 		    = new validation();

#Code to Fetch page category data  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error = '';
	/*validate required fields*/
	$obj->add_fields($category_name, 'req', 'Please Enter Category Name');
	if ($id == "") {
		$obj->add_fields($category_name, 'uniquevalue', 'Please Enter Unique Category Name', array('news_category', "category_name='". mysql_real_escape_string($category_name) ."'"));
	} else {
		$obj->add_fields($category_name, 'uniquevalue', 'Please Enter Unique Category Name', array('news_category', "category_name='". mysql_real_escape_string($category_name) ."' and id!=".$id));
	}
	
	$error = $obj->validate();

	if ($error) {
		$errorMsg = "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	} else {		
		/*save category*/	
		$slug = $commonFunction->url_slug(strtolower($category_name));
		$dataArr  =  array('category_name' => htmlentities($category_name), 'slug' => ($slug));
		if ($id == "") {
			$categoryInsert = $obj_setting->save('news_category', $dataArr);
		} else {
			$categoryInsert = $obj_setting->update('news_category', $dataArr, "id=".$id);
		}
		$_SESSION['success_msg'] = 'Successfully Saved';
	
		echo '<script>location.href="'.DEFAULT_URL.'/superadmin/page/news_category.php";</script>';
	
		exit;
	}
}
	
	/*Fetch banner section content*/
	if (isset($_GET['id'])) {
		$fetchSetting = $obj_setting->read('news_category', 'id = '.$_GET['id']);
		$getSetting   = $db->fetchNextObject($fetchSetting);
		$id			  = $getSetting->id;
		$catgoryName  = $getSetting->category_name;
		$heading 	  = "Edit";	
	} else {
		$heading 	  = "Add New";
	}
