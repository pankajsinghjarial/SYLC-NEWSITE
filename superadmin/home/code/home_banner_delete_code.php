<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($id) and $id!='' and isset($action) and $action=='delete'){

	$obj_setting->delete('rot_banner'," id=$id");
	$_SESSION['success_msg'] = 'Banner deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/home/index.php'.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('rot_banner'," id=$id");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT name FROM rot_banner where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'There is no banner exists with this page id.';
}
unset($obj_setting);

