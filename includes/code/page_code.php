<?php 
extract($_POST);
extract($_GET);

$common = new common();

$modelList = array();
$manf= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)){
    $modelList[] = $row;
}

if($parent_id ){
	$terms = $common->CustomQuery("Select mainpage.* from pages as mainpage left join pages as parentCat on (mainpage.page_cat = parentCat.id) where mainpage.slug = '$page_id' AND parentCat.slug = '$parent_id'");	
}
else{
	$terms = $common->CustomQuery("Select * from pages where slug = '$page_id' and page_cat = 0");	
}

$terms = mysql_fetch_object($terms);
