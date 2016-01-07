<?php
extract($_POST);
extract($_GET); 
$search      = new search();
$obj_setting = new common();
$page_name = 'revue_automobiles';
/******************************************************/
//fetch all makes entered so far from the admin
/*******************************************************/
$all_makes_query    = $obj_setting->customQuery("SELECT make, make_name FROM  reviews ");
$all_makes = array();

while($makerow = mysql_fetch_object($all_makes_query)){
		$make_id=$makerow->make;
		$make_name=$makerow->make_name;
		$all_makes[$make_id]= $make_name;
	
}
$QueryString='';

$limit = PAGING_LIMIT;
    
if(strlen($start) > 0 and !is_numeric($start)){
	$start=0;
}

$eu = ($start - 0); 

$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 




if(isset($makeID) || isset($modelID) || isset($Year)){

	if(($makeID != '')){
		
		$QueryString= " make=".$makeID;
	}
	if(($modelID != '')){
		
		$QueryString .= " AND model=".$modelID;
		
		$all_model_query    = $obj_setting->customQuery("SELECT model, model_name FROM  reviews WHERE make=".$makeID);
		$all_models = array();

		while($modelrow = mysql_fetch_object($all_model_query)){
				$model_id=$modelrow->model;
				$model_name=$modelrow->model_name;
				$all_models[$model_id]= $model_name;
		}
		
		
	}else{
		if($makeID != ''){
		$all_model_query    = $obj_setting->customQuery("SELECT model, model_name FROM  reviews WHERE make=".$makeID);
		$all_models = array();

		while($modelrow = mysql_fetch_object($all_model_query)){
				$model_id=$modelrow->model;
				$model_name=$modelrow->model_name;
				$all_models[$model_id]= $model_name;
		}
		}
	}
	if(($Year != '')){
		
		$QueryString .= " AND year='".$Year."'";
		
		$all_year_query    = $obj_setting->customQuery("SELECT year FROM  reviews WHERE model=".$modelID);
		$all_years = array();

		while($yearrow = mysql_fetch_object($all_year_query)){
				$year=$yearrow->year;
				$all_years[$year]= $year;
		}
		
	}else{
		if($modelID != ''){
		$all_year_query    = $obj_setting->customQuery("SELECT year FROM  reviews WHERE model=".$modelID);
		$all_years = array();

		while($yearrow = mysql_fetch_object($all_year_query)){
				$year=$yearrow->year;
				$all_years[$year]= $year;
		}
		}
	}

}

$reviewsArrNew = array();
$reviewsArrOld = array();

$total_rows = $obj_setting->numberOfRows('reviews', $QueryString);
if($QueryString){
	$QueryString	= 'WHERE '.$QueryString;
}

if(isset($start)){
	$QueryString .= ' limit '.$eu.', '.$limit;
}else{
	$QueryString .= ' limit '.$eu.', '.$limit;
}

$all_reviews_new = $obj_setting->customQuery("SELECT * FROM  reviews ".$QueryString);
//$all_reviews_old = $obj_setting->customQuery("SELECT * FROM  reviews WHERE old_new=0 ".$QueryString);
//
while ($revNew = mysql_fetch_object($all_reviews_new)) {
	
	$short_description = $revNew->short_description;
    $id = $revNew->id;
    $make = $revNew->make_name;
    $model = $revNew->model_name;
    $year = $revNew->year;
    $old_new = $revNew->old_new;
    $title = $make.' '.$model.' '.$year;
    $image = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$revNew->image;
    if($old_new){
		$reviewsArrNew[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}else{
		$reviewsArrOld[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}
}
/*
echo "<pre>";
$_SERVER['REQUEST_URI'];
print_r($reviewsArrOld); die;
*/
/*
while ($revOld = mysql_fetch_object($all_reviews_old)) {
	$short_description = $revOld->short_description;
    $make = $revOld->make_name;
    $model = $revOld->model_name;
    $year = $revOld->year;
    $old_new = $revOld->old_new;
    $title = $make.' '.$model.' '.$year;
    $image = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$revOld->image;
    $reviewsArrOld[] = array('short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
}
*/
//echo "<pre>";
//print_r($reviewsArrNew);
//print_r($reviewsArrOld);
//die;

?>
