<?php

/********************************************************************************************************************

#Coder       : Manoj Pandit

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_block = new common();

$currentTimestamp = getCurrentTimestamp();

if($model_id!='' && $action=='delete')

  {
	
	$logoname = $obj_block->getNameById(TBL__HTMLTEMPLATE,'id='.$model_id);
	
	
	
	/*if($logoname->image!='') {
		@chmod(LIST_ROOT_ADMIN."/images/new_model/",0777);
		unlink(LIST_ROOT_ADMIN."/images/new_model/".$logoname->image);
				
	}*/
	
  $deleteProduct = $obj_block->delete(TBL__HTMLTEMPLATE, 'id ='.$model_id);

  $_SESSION['msg']= 'Car Template Successfully Deleted';
  
  unset($obj_block);

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/htmltemplate/index.php";</script>';
   
  exit;

  }

$getBlock = $obj_block->read(TBL__HTMLTEMPLATE,'',' creation_date DESC');

unset($obj_block);

?>