<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($id) and $id!='' and isset($action) and $action=='delete'){

	$obj_setting->delete('accessories'," id=$id");
	$_SESSION['success_msg'] = 'Product deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/accessories/index.php'.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('accessories'," id=$id");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT productname FROM accessories where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'There is no Product exists with this page id.';
}
unset($obj_setting);

