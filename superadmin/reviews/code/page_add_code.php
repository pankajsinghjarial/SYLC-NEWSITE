<?php
/*************************************************************************************************************
#Coder         : ishan Siddiqui
#Description : This Code is used to Manage Pages
*************************************************************************************************************/
include(LIST_ROOT."/getEntity.php");
extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();

$getEntityObj = new getEntity;
$makes = $getEntityObj->getEntityOutput(6001,3);

foreach($makes as $make_id => $name)
{
	$first = $make_id;
	break; 
}	 

$models = $getEntityObj->getEntityOutput($first,4);


if($_SERVER['REQUEST_METHOD']=='POST')
    {

		 $count = 0;
		 $order = 1;
		 $medias=array();
		 foreach($_POST as $key =>$value){
			 $count++;
			 if($count>11)
			 {
				$explodedkey = explode("-",$key);
				$mediaType = $explodedkey[0]; 
				$order = $explodedkey[1];
				$medias[] = array('mediatype'=>$mediaType,'order'=>$order,'value'=>$value);   
				$order++;
			 }
		 }
		// print_r($medias);
		// die;
		 
		 
		  $error='';
		  
		  $obj->add_fields($short_description, 'req', 'Please Enter Short Description');
		  $obj->add_fields($make, 'req', 'Please select a Make');
		  $obj->add_fields($old_new, 'req', 'Please select a Value');
		  $obj->add_fields($pdsf, 'req', 'Please Enter this field');
		  $obj->add_fields($mpg, 'req', 'Please Enter this field');
		  //$obj->add_fields($model, 'req', 'Please select a Model');
		  $obj->add_fields($year, 'req', 'Please Enter year');
		  $obj->add_fields($expert, 'req', 'Please Enter Excerpt');
		  $obj->add_fields($ensemble, 'req', 'Please Enter Ensemble');
		  $obj->add_fields($characteristique, 'req', 'Please Enter Characteristique');
		  
		  $obj->add_fields($_FILES['image']['name'], 'req', 'Please Upload Image');
		  $obj->add_fields($_FILES['image'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		  $error = $obj->validate();		   
		  //echo "<pre>";
		  //print_r($error); die;
		  
		  
		  
		  if($error){
 				$errorMsg = "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 				
 		   }  
		  else
		    {
				$make_name = $makes[$make];
				$models_new = $getEntityObj->getEntityOutput($make,4);
				$model_name = $models_new[$model];	
				$image_name = time().'-'.$_FILES['image']['name'];
				//$path = LIST_ROOT.'/images/reviews/media/';
				$path = LIST_ROOT_ADMIN_REVIEW_IMAGEPATH.'/';
				move_uploaded_file($_FILES["image"]["tmp_name"],$path.$image_name);
				$_SESSION['success_msg'] = 'New review has been saved successfully.';
					
				$dataArr = array('short_description'=>$short_description,'old_new'=>$old_new,'editorial'=>$editorial,'pdsf'=>$pdsf,'mpg'=>$mpg,'image'=>$image_name,'make'=>$make,'model'=>$model,'year'=>$year,'expert'=>$expert,'ensemble'=>$ensemble,'characteristique'=>$characteristique,'updated'=>getCurrentTimestamp(),'make_name'=>$make_name,'model_name'=>$model_name);
					
				$review_id		=	$obj_setting->save('reviews', $dataArr);
					
				foreach($medias as $media){
					$dataArrMedia = array('review_id'=>$review_id,'media_type'=>$media['mediatype'],'order_id'=>$media['order'],'media_name'=>$media['value'],'updated'=>getCurrentTimestamp());
					$review_media_id =	$obj_setting->save('reviews_media', $dataArrMedia);
				}
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/reviews";</script>'; 
				exit;
				
			}
		}
		
	
?>
