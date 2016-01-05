<?php

include_once('../conf/config.inc.php'); 
$obj_setting = new common();

if(isset($_GET['make_id']) && ($_GET['make_id'] != null)){
	$makeID = $_GET['make_id'];
	$all_makes_query  = $obj_setting->customQuery("SELECT model, model_name FROM  reviews WHERE make =".$makeID);
	$all_makes = array();

	while($makerow = mysql_fetch_object($all_makes_query)){
			$model_id=$makerow->model;
			$model_name=$makerow->model_name;
			$all_makes[$model_id]= $model_name;
		
	}

	$retOpt = "<option value='' >-- Models --</option>";
	foreach($all_makes as $id =>$make){
			 $retOpt .= '<option value="'.$id.'" >'.$make.'</option>';
	}
	echo $retOpt;
}


if(isset($_GET['model_id']) && ($_GET['model_id'] != null)){
	$modelID = $_GET['model_id'];
	$all_makes_query  = $obj_setting->customQuery("SELECT year FROM  reviews WHERE model =".$modelID);
	$all_makes = array();

	while($makerow = mysql_fetch_object($all_makes_query)){
			$year=$makerow->year;
			
			$all_makes[$year]= $year;
		
	}
	
	$retOpt = "<option value='' >-- Years --</option>";
	foreach($all_makes as $id =>$make){
			 $retOpt .= '<option value="'.$id.'" >'.$make.'</option>';
	}
	echo $retOpt;
}


?>
