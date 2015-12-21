<?php 
extract($_POST);
extract($_GET);

$common = new common();

/*Fetch personalized search content*/
	$fetchSetting 	= $common->read('content_page', "page_name = 'Personalized Search'");
	$getSetting 	= $db->fetchNextObject($fetchSetting);
	$content	= $getSetting->content;

/*Fetch car brand names*/
	$modelList = array();
	$manf	   = $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
	while ($row = mysql_fetch_assoc($manf)) {
		$modelList[] = $row;
	}
