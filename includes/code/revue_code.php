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

//$limit = PAGING_LIMIT;
$limit = 1;
    
if(strlen($start) > 0 and !is_numeric($start)){
	$start=0;
}

$eu = ($start - 0); 

$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit;

if(strlen($startOld) > 0 and !is_numeric($startOld)){
	$startOld=0;
}

$euOld = ($startOld - 0); 

$this1Old = $euOld + $limit; 
$backOld = $euOld - $limit; 
$nextOld = $euOld + $limit;

if(strlen($startNew) > 0 and !is_numeric($startNew)){
	$startNew=0;
}

$euNew = ($startNew - 0); 

$this1New = $euNew + $limit; 
$backNew = $euNew - $limit; 
$nextNew = $euNew + $limit;






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

$total_rowsOld = $obj_setting->numberOfRows('reviews', $QueryString);

if($QueryString){
	
	$total_rowsOld = $obj_setting->numberOfRows('reviews', 'old_new = 0 AND '.$QueryString);
	$total_rowsNew = $obj_setting->numberOfRows('reviews', 'old_new = 1 AND '.$QueryString);
	
	$QueryStringOld	= 'WHERE old_new =0 AND '.$QueryString;
	$QueryStringNew	= 'WHERE old_new =1 AND '.$QueryString;
}else{
	
	
	$total_rowsOld = $obj_setting->numberOfRows('reviews', 'old_new = 0 '.$QueryString);
	$total_rowsNew = $obj_setting->numberOfRows('reviews', 'old_new = 1 '.$QueryString);
	
	
	//$QueryString	= 'WHERE '.$QueryString;
	$QueryStringOld	= 'WHERE old_new =0 '.$QueryString;
	$QueryStringNew	= 'WHERE old_new =1 '.$QueryString;
	
}

//print_r($total_rowsOld);echo "kgjrkh"; print_r($total_rowsNew);die;

if(isset($start)){
	$QueryString .= ' limit '.$eu.', '.$limit;
	//$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	//$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}else{
	$QueryString .= ' limit '.$eu.', '.$limit;
	//$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	//$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}
if(isset($startNew)){
	//$QueryString .= ' limit '.$eu.', '.$limit;
	//$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}else{
	//$QueryString .= ' limit '.$eu.', '.$limit;
	//$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}

if(isset($startOld)){
	//$QueryString .= ' limit '.$eu.', '.$limit;
	$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	//$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}else{
	//$QueryString .= ' limit '.$eu.', '.$limit;
	$QueryStringOld	.= ' limit '.$euOld.', '.$limit;
	//$QueryStringNew	.= ' limit '.$euNew.', '.$limit;
}




$all_reviews_new = $obj_setting->customQuery("SELECT * FROM  reviews ".$QueryStringOld);
$all_reviews_old = $obj_setting->customQuery("SELECT * FROM  reviews ".$QueryStringNew);

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
		//$reviewsArrNew[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}else{
		$reviewsArrOld[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}
}

while ($revOld = mysql_fetch_object($all_reviews_old)) {
	
	$short_description = $revOld->short_description;
    $id = $revOld->id;
    $make = $revOld->make_name;
    $model = $revOld->model_name;
    $year = $revOld->year;
    $old_new = $revOld->old_new;
    $title = $make.' '.$model.' '.$year;
    $image = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$revOld->image;
    if($old_new){
		$reviewsArrNew[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}else{
		//$reviewsArrOld[] = array('id'=>$id,'short_description'=>$short_description, 'image'=>$image, 'title'=>$title, 'old_new'=>$old_new); 
	}
}
/*
print_r("<pre>");
print_r($reviewsArrOld);
print_r($reviewsArrNew);
die;
*/
$editorialReviews = array();

$all_editorial_reviews = $obj_setting->customQuery("SELECT * FROM  reviews WHERE editorial=1");

while ($revEditorial = mysql_fetch_object($all_editorial_reviews)) {

	$idEditorial = $revEditorial->id;
	$makeEditorial = $revEditorial->make_name;
    $modelEditorial = $revEditorial->model_name;
    $yearEditorial = $revEditorial->year;
    $titleEditorial = $makeEditorial.' '.$modelEditorial.' '.$yearEditorial;
	$imageEditorial = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/'.$revEditorial->image;
	$editorialReviews[] = array('id'=>$idEditorial,'image'=>$imageEditorial, 'title'=>$titleEditorial); 

}

$editorialReviews = array_chunk($editorialReviews,3);


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
