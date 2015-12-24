<?php
extract($_GET);
extract($_POST);

$obj_setting = new common();

if (isset($id) and $id != '' and isset($action) and $action == 'delete') {
	$obj_setting->delete('media', "id=$id");
	$_SESSION['success_msg'] = 'Media deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page/media.php'.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('news_category', "id=$id");
if ($total_rows > 0) {
	$singlePage 	= $obj_setting->customQuery("SELECT title FROM media id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->tab_title;
} else {
	$pageName  = 'There is no Media exists with this id.';
}

unset($obj_setting);
