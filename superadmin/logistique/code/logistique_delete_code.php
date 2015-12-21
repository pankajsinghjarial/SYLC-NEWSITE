<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($id) and $id!='' and isset($action) and $action=='delete'){

	$obj_setting->delete('content_page'," id=$id");
	$_SESSION['success_msg'] = 'Tab deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/logistique/index.php'.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('content_page'," id=$id");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT tab_title FROM content_page where page_name='logistique' and id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->tab_title;
}else{
	$pageName  = 'There is no Tab exists with this id.';
}
unset($obj_setting);

