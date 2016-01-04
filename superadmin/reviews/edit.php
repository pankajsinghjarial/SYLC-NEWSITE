<?php include_once('../../conf/config.inc.php'); 
//Checking admin login or not
if(!$loginCheck->isLoggedIn() && !$loginCheck->isUserLoggedIn()){

    echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
	exit;
}
//echo "<pre>";
include_once(LIST_ROOT_ADMIN."/reviews/code/page_edit_code.php"); 
include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");
include(LIST_ROOT_ADMIN."/reviews/form/page_edit_form.php");
include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   
?>
