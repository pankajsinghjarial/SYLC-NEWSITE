<?php
/*************************************************************************************************************
#Coder         : Ishan Siddiqui
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
include(LIST_ROOT."/getEntity.php");
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('reviews', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting); 

//print_r($getSetting);

$id	 					= $getSetting->id;
$short_description		= $getSetting->short_description;
$old_new				= $getSetting->old_new;
$make					= $getSetting->make;
$model                  = $getSetting->model;
$year                   = $getSetting->year;
$expert                 = $getSetting->expert;
$ensemble               = $getSetting->ensemble;
$ensemble               = $getSetting->ensemble;
$characteristique       = $getSetting->characteristique;
$image       			= $getSetting->image;

$getEntityObj = new getEntity;
$makes = $getEntityObj->getEntityOutput(6001,3);

foreach($makes as $make_id => $name)
{
	$first = $make_id;
	break; 
}	 
$models = $getEntityObj->getEntityOutput($make,4);





	$medias=array();
	$all_reviews_media = $obj_setting->customQuery("SELECT * FROM reviews_media where review_id = $id");
    while($all_reviews_m = mysql_fetch_object($all_reviews_media))
    {
			
			$mediaType = $all_reviews_m->media_type;
			$order = $all_reviews_m->order_id;
			$value = $all_reviews_m->media_name;
			$medias[] = array('mediatype'=>$mediaType,'order'=>$order,'value'=>$value);
	}
//print_r($medias); die;	
	/*
		 
		 $count = 0;
		 $order = 1;
		 $medias=array();
		 foreach($_POST as $key =>$value){
			 $count++;
			 if($count>8)
			 {
				$explodedkey = explode("-",$key);
				$mediaType = $explodedkey[0]; 
				$order = $explodedkey[1];
				$medias[] = array('mediatype'=>$mediaType,'order'=>$order,'value'=>$value);   
				$order++; 
			 }
		 }
*/
	
//print_r($ensemble);	


extract($_POST);




/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
#saving data in database after validation
if($_SERVER['REQUEST_METHOD']=='POST')
    {
			
		 
		 $count = 0;
		 $order = 1;
		 $medias=array();
		 
		// print_r($medias);
		// die;
		 
		 
		  $error='';
		  
		  $obj->add_fields($short_description, 'req', 'Please Enter Short Description');
		  $obj->add_fields($make, 'req', 'Please select a Make');
		  $obj->add_fields($old_new, 'req', 'Please select a Make');
		  //$obj->add_fields($model, 'req', 'Please select a Model');
		  $obj->add_fields($year, 'req', 'Please Enter year');
		  $obj->add_fields($expert, 'req', 'Please Enter Excerpt');
		  $obj->add_fields($ensemble, 'req', 'Please Enter Ensemble');
		  $obj->add_fields($characteristique, 'req', 'Please Enter Characteristique');
		 
		 if(isset($main_image) ){
			if($main_image){
					
				
			} else{
				$obj->add_fields($_FILES['image']['name'], 'req', 'Please Upload Image');
					$obj->add_fields($_FILES['image'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		 
		
			}
			 
		 }
		  
		 
		  foreach($_POST as $key =>$value){
			 $count++;
			 if($count>9)
			 {
				$explodedkey = explode("-",$key);
				$mediaType = $explodedkey[0]; 
				$order = $explodedkey[1];
				$medias[] = array('mediatype'=>$mediaType,'order'=>$order,'value'=>$value);   
				$order++; 
			 }
		 }
		  
		 
		  $error = $obj->validate();		   
		  
		  if($error){
				
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		   }
		  else
		    {
				$make_name = $makes[$make];
				$models_new = $getEntityObj->getEntityOutput($make,4);
				$model_name = $models_new[$model];	
				/*
				 echo "<pre>";
				 print_r($_FILES);
				 print_r($_POST); 
				 print_r($medias);
				 die;
				 */
				 
					if(isset($main_image) ){
						if($main_image){
						
							$image_name = $main_image;	
						}else{
							
							$image_name = time().'-'.$_FILES['image']['name'];
							//$path = LIST_ROOT.'/images/reviews/media/';
							$path = LIST_ROOT_ADMIN_REVIEW_IMAGEPATH.'/';
							move_uploaded_file($_FILES["image"]["tmp_name"],$path.$image_name);
						}
					}
					$_SESSION['success_msg'] = 'Review has been updated successfully.';
					
					$dataArr = array('short_description'=>$short_description,'old_new'=>$old_new,'image'=>$image_name,'make'=>$make,'model'=>$model,'year'=>$year,'expert'=>$expert,'ensemble'=>$ensemble,'characteristique'=>$characteristique,'updated'=>getCurrentTimestamp(),'make_name'=>$make_name,'model_name'=>$model_name);
					
					$review_id		=	$obj_setting->update('reviews', $dataArr,"id=".$id);
					
					$obj_setting->delete('reviews_media'," review_id IN('$id')");
					
					foreach($medias as $media){
						
						
						$dataArrMedia = array('review_id'=>$id,'media_type'=>$media['mediatype'],'order_id'=>$media['order'],'media_name'=>$media['value'],'updated'=>getCurrentTimestamp());
						$review_media_id =	$obj_setting->save('reviews_media', $dataArrMedia);
					}
					echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/reviews";</script>'; 
					exit;
				
			}
		}
		
unset($obj_setting);
unset($obj);
			
?>
