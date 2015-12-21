<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
/*Fetch real facts section content*/
	$ebayidExists = array();	
	$ebayids = $common->CustomQuery("Select itemid from product_banner order by id asc");
	while ($row = mysql_fetch_object($ebayids)) {
	   $ebayidExists[] = $row->itemid;
	}	 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error='';
		/*validate required fields*/		
		$obj->add_fields($carid, 'req', 'Please Enter Content');			
		$obj->add_fields($carid, 'num', 'Please Enter Numeric value');			
		$obj->add_fields($carid, 'uniquearray', 'Please Enter Unique value');

		$error = $obj->validate();		   

		if ($error) {
			$errorMsg = "<font color='#FF0000' family='verdana' size=2>$error</font>";
		} else {
			
			/*save banner car ids*/				
			$terms = $obj_setting->CustomQuery("UPDATE product_banner  SET `itemid` = CASE `ID`
			WHEN '1' THEN '$carid[0]'
			WHEN '2' THEN '$carid[1]'
			WHEN '3' THEN '$carid[2]'
			WHEN '4' THEN '$carid[3]'
			WHEN '5' THEN '$carid[4]'
			WHEN '6' THEN '$carid[5]'
			WHEN '7' THEN '$carid[6]'
			WHEN '8' THEN '$carid[7]'
			WHEN '9' THEN '$carid[8]'
			WHEN '10' THEN '$carid[9]'
			END
			WHERE `ID` between 1 and 10");	
			$_SESSION['success_msg'] = 'Successfully Saved';
			echo '<script>location.href="'.DEFAULT_URL.'/superadmin/home/product_banner.php";</script>'; 
			exit;
		}
	} else {
		$carid = $ebayidExists;
	}

		

