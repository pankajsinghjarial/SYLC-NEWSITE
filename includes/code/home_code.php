<?php 
extract($_POST);
extract($_GET);
$search = new search();
$obj_setting = new common();

$modelList = array();
$manf= $obj_setting ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)){
    $modelList[] = $row;
}
/*Fetch welcome section content*/
$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 1');
$getSetting 	= $db->fetchNextObject($fetchSetting);
$content	    = $getSetting->content;

/*Fetch rotating banner section content*/
$allBanner = $obj_setting->customQuery("SELECT * FROM  rot_banner where status=1 order by id asc");
$totalBanners = mysql_num_rows($allBanner); 

/*Fetch about us section content*/
$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 2');
$getSetting 	= $db->fetchNextObject($fetchSetting);
$aboutUsContent = $getSetting->content;

/*Fetch about us section content*/
$fetchSetting 	= $obj_setting->read('editor_rows', 'id = 3');
$getSetting 	= $db->fetchNextObject($fetchSetting);
$realFactsContent = $getSetting->content;
$realFactBackgroundImage = $getSetting->image;


// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
	global $urlfilter;
	global $i;
	// Iterate through each filter in the array
	foreach($filterarray as $itemfilter) {
		// Iterate through each key in the filter
		foreach ($itemfilter as $key =>$value) {
			if (is_array($value)) {
				foreach($value as $j => $content) { // Index the key for each value
					$urlfilter .= "&itemFilter($i).$key($j)=$content";
				}
			}
			else {
				if ($value != "") {
					$urlfilter .= "&itemFilter($i).$key=$value";
				}
			}
		}
		$i++;
	}

	return "$urlfilter";
} // End of buildURLArray function


