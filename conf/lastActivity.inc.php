<?php

/* Get Current Date Time Stamp */
$currentTimestamp   = getCurrentTimestamp();

if(isset($_SESSION['unique_id'][0]) ){
	$tbl_resultSet =  $objCommon->customQuery("SELECT tbl_name FROM master_temp WHERE `user_id` = '".$_SESSION['unique_id'][0]."'");
	if(mysqli_num_rows($tbl_resultSet) > 0){
		if($tbl_row = mysqli_fetch_object($tbl_resultSet)){
			$objCommon->customQuery("UPDATE master_temp SET `lastAct` = '".$currentTimestamp."' WHERE `tbl_name` = '".$tbl_row->tbl_name."'");
		}
	}
}
