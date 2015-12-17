<?php
	/* if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler");
	else ob_start(); */
	//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) header('Content-Encoding: gzip');
     session_start();
     
	/*==================================================================*\
	#   Coder		: Kapil Verma
	\*==================================================================*/

	
    # ----------------------------------------------------------------------------------------------------
	# DATABASE CONNECTION PARAMETERS
	# ----------------------------------------------------------------------------------------------------

        define("DB_HOST","192.168.0.238");
        define("DB_USER","httpsylc");
        define("DB_PASS","NetsoL_123");
        define("DB_NAME","httpsylc_sylc");

        define("LIST_FOLDER","");

    # ----------------------------------------------------------------------------------------------------
	# DEFINE ROOT
	# ----------------------------------------------------------------------------------------------------
	//checking if last char in DOCUMENT_ROOT is '/' than remove it
	$lastchar	= substr($_SERVER["DOCUMENT_ROOT"], -1, 1);
	if($lastchar=='/'){
		$rest = substr($_SERVER["DOCUMENT_ROOT"], 0, -1);
		define('LIST_ROOT', $rest.LIST_FOLDER);
	}else{
		define('LIST_ROOT', $_SERVER["DOCUMENT_ROOT"].LIST_FOLDER);
	}
	
    # ----------------------------------------------------------------------------------------------------
	# DEFAULT URL
	# ----------------------------------------------------------------------------------------------------
	if ((!isset($_SERVER["HTTPS"])) || ($_SERVER["HTTPS"] == "off")) {

		define('HTTPS_MODE', "off");
		define('DEFAULT_URL', "http://".$_SERVER["HTTP_HOST"].LIST_FOLDER);
	} else {
		define('HTTPS_MODE', "on");
		define('DEFAULT_URL', "https://".$_SERVER["HTTP_HOST"].LIST_FOLDER);
	}
	/*define('LIST_ROOT', "/home/httpsylc/public_html/");
	define('DEFAULT_URL', "http://199.102.229.146/~httpsylc");*/
	
	include(LIST_ROOT."/conf/includes.inc.php");
