<?php

extract($_GET); 


$url_listing = DEFAULT_URL.'/revue_automobiles';

if(isset($_GET['reviewID'])){
$id = convert_uudecode(base64_decode($_GET['reviewID']));

$obj_setting = new common();
	
$fetchSetting 			= $obj_setting->read('reviews', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting); 

$id	 					= $getSetting->id;
$short_description		= $getSetting->short_description;
$old_new				= $getSetting->old_new;
$make					= $getSetting->make;
$model                  = $getSetting->model;
$pdsf					= $getSetting->pdsf;
$mpg					= $getSetting->mpg;
$make_name				= $getSetting->make_name;
$model_name             = $getSetting->model_name;
$year                   = $getSetting->year;
$expert                 = $getSetting->expert;
$ensemble               = $getSetting->ensemble;
$ensemble               = $getSetting->ensemble;
$characteristique       = $getSetting->characteristique;
$image       			= $getSetting->image;
$title = $make_name.' '.$model_name.' '.$year;

$currentUrl = DEFAULT_URL.$_SERVER['REQUEST_URI'];

$all_media_query    = $obj_setting->customQuery("SELECT * FROM  reviews_media WHERE review_id=".$id);
$all_media = array();

while($mediaRow = mysql_fetch_object($all_media_query)){

		$mediaid =  $mediaRow->id;
		$review_id =  $mediaRow->review_id;
		$media_type =  $mediaRow->media_type;
		$media_name =  $mediaRow->media_name;
		$order_id =  $mediaRow->order_id;
		
		if($media_type=='video'){
		
				$Exploded = explode('-',$media_name);
				
				$video_thumb = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$Exploded[0].'.jpg'; 
			
		}else if($media_type=='youtube_link'){
			
			$Exploded = explode('=',$media_name);
			$video_thumb = 'http://img.youtube.com/vi/'.$Exploded[1].'/0.jpg'; 
			
			
		}else{
			
			$video_thumb = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$media_name;
		}
		$all_media[] = array('id'=>$mediaid,'review_id'=>$review_id,'media_type'=>$media_type,'media_name'=>$media_name,'order_id'=>$order_id, 'video_thumb'=>$video_thumb);		
		//$mediaid =  $mediaRow->id;
}

/*
echo "<pre>";
print_r($all_media); die;
die;
*/
}else{
	echo "<script type='text/javascript'>window.location = '".$url_listing."'; </script>";
}





?>
