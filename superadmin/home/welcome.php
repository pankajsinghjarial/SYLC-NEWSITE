<?php include_once('../../conf/config.inc.php'); 
//Checking admin login or not
if (!$loginCheck->isLoggedIn() && !$loginCheck->isUserLoggedIn()){

    echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
	exit;
}
include_once(LIST_ROOT_ADMIN."/home/code/home_welcome_code.php"); 
include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");
include(LIST_ROOT_ADMIN."/home/form/home_welcome_form.php");
include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   
?>
