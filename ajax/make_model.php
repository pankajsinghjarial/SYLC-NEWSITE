<?php

include_once('../conf/config.inc.php'); 
include(LIST_ROOT."/getEntity.php");

if(isset($_GET['make_id']) && ($_GET['make_id'] != null)){
	$makeID = $_GET['make_id'];
	$getEntityObj = new getEntity;
	$models = $getEntityObj->getEntityOutput($makeID,4);
	$retOpt =''; 
	foreach($models as $id =>$model){
			 $retOpt .= '<option value="'.$id.'" >'.$model.'</option>';
	}
	echo $retOpt;
}

?>
