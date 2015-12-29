<?php
extract($_GET);
extract($_POST);

$obj_setting = new common();

if (isset($id) and $id != '' and isset($action) and $action == 'delete') {
	$obj_setting->delete('news_category', "id=$id");
	$obj_setting->delete('news_articles', "category_id=$id");
	
	$_SESSION['success_msg'] = 'Category and its associated articles deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page/news_category.php'.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('news_category', "id=$id");
if ($total_rows > 0) {
	$singlePage 	= $obj_setting->customQuery("SELECT category_name FROM news_category id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->tab_title;
} else {
	$pageName  = 'There is no Category exists with this id.';
}

unset($obj_setting);
