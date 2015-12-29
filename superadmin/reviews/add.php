<?php include_once('../../conf/config.inc.php'); 

//Checking admin login or not
if(!$loginCheck->isLoggedIn() && !$loginCheck->isUserLoggedIn()){

    echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
	exit;
}

error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


include_once(LIST_ROOT_ADMIN."/reviews/code/page_add_code.php"); 

include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");
include(LIST_ROOT_ADMIN."/reviews/form/page_add_form.php");
include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   
?>
