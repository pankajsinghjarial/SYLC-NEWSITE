<?php
	include_once('../../conf/config.inc.php'); 
	//Checking admin login or not
	if (!$loginCheck->isLoggedIn() && !$loginCheck->isUserLoggedIn()) {
		echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
		exit;
	}

	include_once(LIST_ROOT_ADMIN."/page/code/articles_multiple_delete_code.php"); 
	include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");
	include(LIST_ROOT_ADMIN."/page/view/articles_multiple_delete_view.php");
	include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   

