<?php 
extract($_POST);
extract($_GET);

$search = new search();
$common = new common();

/*Fetch accessories*/

if (!isset($_GET['page'])) {
	$page = 1;
}
$pages = new Paginator;
$pages->default_ipp = 1;
$total_rows			 = $common->numberOfRows('accessories'); 
$pages->items_total  = $total_rows;
$pages->paginate();
$limit = 1;
$eu = $limit * ($page-1);
$addtopaging  = "?";
$addtopaging1 = '';

if ($_SERVER['QUERY_STRING']) {
	$args = explode("&", $_SERVER['QUERY_STRING']);
	foreach($args as $arg) {
		if($arg == '') continue;
		$keyval = explode("=", $arg);
		if($keyval[0] == "page" ) $addtopaging1 .=  $arg;
		if($keyval[0] == "ipp" )  $addtopaging1  .= "&" . $arg;
		if($keyval[0] != "page" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;
	}	
}
if($addtopaging1 != '') {
	$addtopaging1 .= '&';
}
//number of rows in pages table

if ($sort == "") {
	$now_sort  = "amount";
	$now_order = "ASC";
} else {
	$oder = explode("~", $sort);
	$now_sort = $oder[0];
	if($now_sort == 'price') {
		$now_sort = "amount";
	} else {
		$now_sort = "productname";
	}
	$now_order = $oder[1];
}

$allAccessories = $common->customQuery("SELECT * FROM  accessories ORDER BY $now_sort $now_order limit $eu, $limit");
