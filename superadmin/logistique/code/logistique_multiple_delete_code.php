<?php
extract($_GET);
extract($_POST);
#getting array of ids from multiple checkbox and then imploding those ids with ',' to put in IN()
$totalIds = implode("','",$allselect);

$obj_setting = new common();

# Here we are deleting all selected pages
if (isset($id) and $id!='' and isset($action) and $action=='delete'){


    $obj_setting->delete('content_page'," id IN('$id')");
	$_SESSION['success_msg'] = 'Tab deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/logistique/index.php'.'";</script>'; 
}
#taking imploded ids and checking if these ids exists in database or not 
#if not then we are showing error message and if found then we are fetching names
#of those pages to show
$total_rows = $obj_setting->numberOfRows('content_page'," id IN('$totalIds')");
if ($total_rows < 0){
	$pageName  = 'There are no tab exists with these ids.';
}
unset($obj_setting);