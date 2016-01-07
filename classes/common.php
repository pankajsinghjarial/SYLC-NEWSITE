<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common
 *
 * @author SUPERCOMUTER
 */
class common extends utility {
    //put your code here
	var $exch_rate;
	
    function common(){}

    function read($tblName,$whereCondition='',$orderBy='',$groupBy=''){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition, $orderBy,$groupBy);        
        return $db->query($result);
    }

    function save($tblName,$dataArray){
        global $db;
        $result = $this->am_createInsertQuery($tblName, $dataArray);
        $db->query($result);
        return mysql_insert_id();
    }

    function delete($tblName,$whereCondition){
        global $db;
        $result = $this->am_createDeleteQuery($tblName, $whereCondition);
        $db->query($result);
        //return affectedRows();
    }
    function update($tblName,$dataArray,$whereCondition){
        global $db;
        $result = $this->am_createUpdateQuery($tblName, $dataArray,$whereCondition);        
        $db->query($result);
        //return affectedRows();
    }
    function numberOfRows($tblName,$whereCondition=''){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition);
        return mysql_num_rows($db->query($result));
    }    
    function customQuery($sqlQuery){
        global $db;
        $result = $db->query($sqlQuery);
        return $result;
    }    
    function getValueByField($tblName,$condition,$field){
        global $db;
        $sqlQuery = $this->am_createSelectAllQuery($tblName, $condition);
        $result = $db->query($sqlQuery);        
        $row = $db->fetchNextObject($result);         
        return $row->$field;
    }    

	function final_paginate($total_pages,$targetpage,$table,$cond,$order_by) {
 
	/* Setup vars for query. */
	//$targetpage = "webinar_listing.php"; 	
	//your file name  (the name of this file)
	$limit = 5; 								
	//how many items to show per page
	if(isset($page))
		$page = $_GET['page'];
	else 
		$page = 0;
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$result = $this->read($table,$cond,$order_by." LIMIT $start,$limit",'');
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pager\">";
		$pagination .= "<ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$prev\">&#171; Previous</a></li>";
		else
			$pagination.= "<li class=\"active\">&#171; Previous</li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\">$counter</li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\">$counter</li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next\">Next &#187;</a></li>";
		else
			$pagination.= "<li class=\"active\">Next &#187;</li>";
		$pagination .= "</ul>";
		$pagination.= "</div>\n";		
	}
	return $pagination;
 }
 
 function countCars(){
        /*global $db;
        $result = $this->customQuery("Select count(car_id) as cou from car");
		$result = mysql_fetch_object($result);
        echo number_format($result->cou + 22766) ;*/
		$my_file = 'file.txt';
		$handle = fopen($my_file, 'r+') or die('Cannot open file:  '.$my_file);
		$data = fread($handle,filesize($my_file));
		fclose($handle);
		echo number_format($data);
 } 
 
 
 
 /* */
 public $attributs = array();
 public function setAttributsToArray(){
        global $db;
		$for_option= array("select", "multiselect", "radio", "checkbox");
		$result = $this->customQuery("Select attribute_id, attribute_code, backend_type, frontend_type, frontend_label From attribute", $db)or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_object($result)){
				if(in_array($row->frontend_type, $for_option)){
					$query = "Select value_id, value From attribute_option_value Where attribute_id = ".$row->attribute_id;
					$option_result = $this->customQuery($query, $db) or die(mysql_error());
					$options= array();
					if(mysql_num_rows($option_result) > 0){
						while($option_row = mysql_fetch_object($option_result)){
							$options[$option_row->value_id] = $option_row->value;
						}
					} 
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "label"=>$row->frontend_label, "front"=>$row->frontend_type, "back"=>$row->backend_type, "options" => $options);
				} else{
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "label"=>$row->frontend_label, "front"=>$row->frontend_type, "back"=>$row->backend_type);
				}
			}
		}
	}
 	
	public function getAttributes(){
		$this->setAttributsToArray();
		return $this->attributs;
	}
	
	

	function CarAttributesFromID($carIds = array(), $attr_list =  false){
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
        if(!$attr_list){
            $attr_list = array_keys($this->attributs);
        }
		$table_prefix="car_";
		$temp = array();
		foreach($carIds as $carId){
			$car_list = $this->customQuery("Select * From car WHERE car_id = ".$carId);
			while($value = mysql_fetch_object($car_list)){
				$temp[$value->car_id]["id"] = $value->car_id;
				$temp[$value->car_id]["stock_id"] = $value->stock_id;
				foreach($attr_list as $attr){
					$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$value->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
					$option_result  = mysql_fetch_object($option_result);
					$temp[$value->car_id][$attr] = @$option_result->value;
				}	
			}
		}
		
		return $temp;
	}
	
	function getCar($id, $view =false){
		global $db;
		$attrs = $this->getAttributes();
		$postArr = array();
		
		$result = $this->customQuery("Select stock_id,brand_id, vin From car Where car_id = ".$id);
		$value = $db->fetchNextObject($result);
		$postArr['stock_id'] = $value->stock_id;
		$postArr['vin'] = $value->vin;
		$postArr['brand_id'] = $value->brand_id;
		$for_option= array("select", "multiselect", "radio", "checkbox");
		foreach($attrs as $key=>$attr ){
			
			$result = $this->customQuery("Select value From car_".$attr["back"]." Where car_id = ".$id." and attribute_id = ".$attr["id"]);
			$value = $db->fetchNextObject($result);
			
			$value = $value->value;
			if($view){
				if(in_array($attr["front"],$for_option)){
					$value = $attr["options"][$value];
				}
			}
			if($attr["front"] == "media_upload"){
				
				
				$query = "Select value From car_".$attr["back"]." Where car_id = ".$id." and attribute_id = ".$attr["id"];
				$queryResult = mysql_query($query);
				while($image = mysql_fetch_array($queryResult)) {
					$postArr[$key][] = $image['value'];
				}
				
				/*$value = $db->fetchNextObject($result);
			
				
				$postArr[$key][images_1] = $value;
				$val = $db->fetchNextObject($result);
				$val = $val->value;
				$postArr[$key][images_2] = $val;*/
			}
			else{
				$postArr[$key] = $value;
			}	  
		}
		return $postArr;
	}
	
	public function total_getCarListWithAttr($condition = ''){
        $where = '';
        if($condition != ''){
            $where = " where ".$condition;
        }
		$car_list = $this->customQuery("Select * From car ".$where);
		return mysql_num_rows($car_list);
	}
	
	public function getCarListWithAttr($limit, $attr_list, $conditions = null ){
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
		
		if( $conditions != null ) {
		    $conditions = " where ".$conditions;
		}
		$table_prefix="car_";
		$temp = array();
		$where = '';
		$car_list = $this->customQuery("Select * From car ".$conditions.' '.$limit);
		while($value = mysql_fetch_object($car_list)){
			$temp[$value->car_id]["id"] = $value->car_id;
			$temp[$value->car_id]["stock_id"] = $value->stock_id;
			foreach($attr_list as $attr){
				$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$value->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
				$option_result  = mysql_fetch_object($option_result);
				$temp[$value->car_id][$attr] = $option_result->value;
			}	
		}
		return $temp;
	}
	public $total_getSearchCarListWithAttr;
	
	public function getSearchCarListWithAttr($start = 0, $limit = 25,$searchcar,$searchattr,$searchmodel=''){
		$temp = array();
		$searchcar = trim($searchcar);
		$attr_list = array("fullName", "mileage", "price", "features", "description", "images");
		if(count($this->attributs) == 0){
			$this->setAttributsToArray();
		}
		
		$backtype = explode("~",$searchattr); 
		if($backtype[2] == "select" or $backtype[2] == "radio" or $backtype[2] == "multiselect" or $backtype[2] == "checkbox"){ 
			$option_result	= $this->customQuery("select a.car_id from car_".$backtype['1']." as a left join attribute_option_value as b on b.value_id = a.value where a.attribute_id = '".$backtype['0']."' and b.value like '"."%".$searchcar."%"."' ");
		} 
		else{
			if(($backtype[1] == 'int' && $backtype[2] == 'text') || ($backtype[1] == 'decimal' && $backtype[2] == 'text'))
			{
				$option_result	= $this->customQuery("select car_id from car_".$backtype['1']." where attribute_id = '".$backtype['0']."' and value = '".$searchcar."'");
			}
			else{
				
				//$option_result	= $this->customQuery("select car_int.car_id from car_".$backtype['1'].", car_varchar where car_int.attribute_id = '".$backtype['0']."' and car_int.value in ("."".$searchcar."".") and car_varchar.car_id= car_int.car_id and car_varchar.attribute_id = '".$backtype['2']."' and car_varchar.value in ("."".$searchmodel."".") and car_int.attribute_id='1' and car_int.value=1980");
				if($searchcar != '') {
					if($searchmodel != '') {
						$option_result	= $this->customQuery("select car_int.car_id from car_decimal,car_varchar,car_".$backtype['1']."  JOIN car_int ints on car_int.car_id=ints.car_id and ints.value between ".$backtype['3']." and ".$backtype['4']." and  ints.attribute_id=1 where car_int.attribute_id = '".$backtype['0']."' and car_int.value in ("."".$searchcar."".") and car_varchar.car_id= car_int.car_id and car_varchar.attribute_id = '".$backtype['2']."' and car_varchar.value in ("."".$searchmodel."".") and car_decimal.car_id= car_int.car_id  ");
					} else {
						$option_result	= $this->customQuery("select car_int.car_id from car_decimal,car_varchar,car_".$backtype['1']."  JOIN car_int ints on car_int.car_id=ints.car_id and ints.value between ".$backtype['3']." and ".$backtype['4']." and  ints.attribute_id=1 where car_int.attribute_id = '".$backtype['0']."' and car_int.value in ("."".$searchcar."".")  and car_decimal.car_id= car_int.car_id  ");
						//and car_decimal.attribute_id = '11' and car_decimal.value=000000002000
					}
				} else {
					$option_result	= $this->customQuery("select car_int.car_id from car_decimal,car_varchar,car_".$backtype['1']."  JOIN car_int ints on car_int.car_id=ints.car_id and ints.value between ".$backtype['3']." and ".$backtype['4']." and  ints.attribute_id=1 where car_varchar.car_id= car_int.car_id and  car_decimal.car_id= car_int.car_id ");
				}
				
			}
		} 
		
		$i = 1;
		$count = 1;
		$this->total_getSearchCarListWithAttr = mysql_num_rows($option_result);
		
		while($row = mysql_fetch_object($option_result)){
			if($start < $i){
				if($count > $limit){
					break;
				}
				$count++;
			}
			else{
				$i++;
				continue;
			}
			
			$attr_result = $this->customQuery("select stock_id from car where car_id = ".$row->car_id);
			$fetch_value = mysql_fetch_object($attr_result);
			$temp[$row->car_id]["id"] = $row->car_id;
			$temp[$row->car_id]["stock_id"] = $fetch_value->stock_id;
			
			foreach ($attr_list as $attr) { 
					$option_resulte = $this->customQuery("SELECT value From car_".$this->attributs[$attr]["back"]." Where car_id = ".$row->car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
					$option_resulte  = mysql_fetch_object($option_resulte);
					$temp[$row->car_id][$attr] = $option_resulte->value;
			}	
			
			$i++;
		}
		
		return $temp;
	 }
	 
	 
	 
	public function getFeatureForListing($string,$num=4){
		$arr= explode(",", $string);
		$string ='';
		$i=0;
		foreach($arr as $ar){
			if($i == $num) break;
			$string.= $ar.",";
			$i++;
		}
		return substr( trim($string,","), 0, 300);
	}
	
	public function uploadImportFile($fileArr){
		$path = UPLOAD_IMPORT_FILES.'/'.$fileArr["name"];
		if ( !file_exists(UPLOAD_IMPORT_FILES)) {
			mkdir(UPLOAD_IMPORT_FILES ,0777,true);
		}
		try{
			if(move_uploaded_file($fileArr["tmp_name"], $path)){
				return $path;
			}
			else{
				throw new Exception();
				return false;
			}
		}
		catch (Exception $e) {
			echo 'Temp dir path :- '.$fileArr["tmp_name"]."<br>";
			echo 'Upload dir path :- '.$path."<br>";
			echo 'Temp dir path :- '.$fileArr["error"]."<br>";
			echo 'Is Write Permission - ' .is_writable(UPLOAD_IMPORT_FILES)."<br>";
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	
	public function getCarWithAttrList($car_id, $attr_list){
		
		$this->setAttributsToArray();
		
		$table_prefix="car_";
		$temp = array();
	$attr_result = $this->customQuery("select * from car where car_id = $car_id");
			$fetch_value = mysql_fetch_object($attr_result);
			$temp[$car_id]["stock_id"] = $fetch_value->stock_id;
			$temp[$car_id]["vin"] = $fetch_value->vin;

			foreach($attr_list as $attr){
				$option_result = $this->customQuery("SELECT value From ".$table_prefix.$this->attributs[$attr]["back"]." Where car_id = ".$car_id." and attribute_id = ".$this->attributs[$attr]["id"]);
				$option_result  = mysql_fetch_object($option_result);
				
				$for_option= array("select", "multiselect", "radio", "checkbox");
				if(in_array($this->attributs[$attr]["front"],$for_option)){
					$option_result->value = $this->attributs[$attr]["options"][$option_result->value];
				}
				$temp[$car_id][$attr] = $option_result->value;
			}	
		
		return $temp;
	}
	
	
	function getImageUrl($url){
		if($url == ''){
			return DEFAULT_URL.'/images/default.jpg';
		}
		else{
			if((strpos($url,"http://") !==false) || (strpos($url,"https://") !== false)){
				return $url;
			}
			else{
				return CAR_IMAGES_URL.'/'.$url;
			}
		}
	 	
	}
	function getAllImage($carid)
	{	
		$tempo = array();
		$imgArr = array();
		$images_result = $this->customQuery("select * from car_media_gallery where car_id = $carid  and attribute_id = 10");
		while($images = mysql_fetch_object($images_result))
		{
			//$imageArr[] = $this->getImageUrl($images->value);
			$imageArr[] = $images->value;
		}
			return	$tempo[$carid]["allImage"] = $imageArr;
		}
		
		
		
		function mostView($carid)
		{
			$sql = $this->customQuery("Select car_id from car_view where car_id = $carid");
			if(mysql_num_rows($sql) > 0)
			{
				$query = $this->customQuery("Update car_view set view_count = view_count + 1 where car_id = $carid");
			}
			else
			{
				$query = $this->customQuery("INSERT INTO car_view (`car_id`,`view_count`)
VALUES ($carid,1) ");
			}
			
				
			}
	
	function getPageSlug($id)
	{ 
		$sql = $this->customQuery("Select slug from pages where id = $id");
		$slug = mysql_fetch_object($sql);
		return $slug->slug;
		
		}
	function CurrencyConverter($price){
		if($this->exch_rate ==''){
			$this->getExchangeRate();
		}
		
		//$rateid = $this->customQuery("select * from currency where id = 1");
		//$rate = mysql_fetch_object($rateid);	
		//$finalprice = (($price + $rate->boat) * $rate->custom * $rate->tva) + $rate->transp + $rate->com;
		//$finalprice = ($price + $rate->boat + $rate->transp + $rate->com)*$this->exch_rate;
		//jitendra
		
		$finalprice = ($price)*$this->exch_rate;
		return number_format($finalprice, 2);	
	}
    
	function ConvertPrice($price){
		if($this->exch_rate ==''){
			$this->getExchangeRate();
		}
		
		//$rateid = $this->customQuery("select * from currency where id = 1");
		//$rate = mysql_fetch_object($rateid);	
		//$finalprice = (($price + $rate->boat) * $rate->custom * $rate->tva) + $rate->transp + $rate->com;
		//$finalprice = ($price + $rate->boat + $rate->transp + $rate->com)*$this->exch_rate;
		//jitendra
		
		$finalprice = ($price)*$this->exch_rate;
		return number_format($finalprice,2, '.', '');
	}

    function ConvertPriceRev($price){
		if($this->exch_rate ==''){
			$this->getExchangeRate();
		}
		
		//$rateid = $this->customQuery("select * from currency where id = 1");
		//$rate = mysql_fetch_object($rateid);	
		//$finalprice = (($price + $rate->boat) * $rate->custom * $rate->tva) + $rate->transp + $rate->com;
		//$finalprice = ($price + $rate->boat + $rate->transp + $rate->com)*$this->exch_rate;
		//jitendra
		
		$finalprice = ($price)/$this->exch_rate;
		return number_format($finalprice,2, '.', '');
    }

	function getOptionNameById($id){
		$sql = $this->customQuery("Select value from attribute_option_value where value_id = $id");
		$slug = mysql_fetch_object($sql);
		return $slug->value;
	}
	
	function getIdByOptionName($attr_id,$val){
		$sql = $this->customQuery("Select value_id from attribute_option_value where attribute_id = $attr_id and value = '$val'");
		$slug = mysql_fetch_object($sql);
		return $slug->value_id;
	}
	
	function getExchangeRate(){
		//$resp = simplexml_load_file("http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml");
//		$name = 'USD';
//		$nodes = $resp->xpath(sprintf('/*/*/*/*[@currency = "%s"]', $name));
//		$this->exch_rate = (float) $nodes[0][rate];

		$url = "https://www.google.com/finance/converter?a=1&from=USD&to=EUR";
		$ch = curl_init();
		$timeout = 0;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$rawdata = curl_exec($ch);
		curl_close($ch);
		
		$data = explode('currency_converter_result', $rawdata);
		$data = explode("bld", $data[1]);
		$data = explode("EUR", $data[1]);
		$number = preg_replace("/[^0-9.]/", '', $data[0]);
		$this->exch_rate =  $number;
	}
	
	function getAdminNotificationEmails() {
	    
	    $sql = $this->customQuery('SELECT `email` FROM `notification_emails`');
	    $admin_emails = array();
	    while( $emails = mysql_fetch_assoc($sql)) {
		$admin_emails[] = $emails['email'];
	    }
	    return $admin_emails;
	}
    
    /* *
     * Function to get list of Models using Brands
     * @brands : string or array
     * @return array/bool
     */
    function getModelsByBrands($brands = NULL){
        $version = 849;
        $devid = "E69WP8Z16P996R8H2K1EWU7LC2F4P4";
        $appid = "francois-1656-442d-bf2d-37b84676c2fb";
        $certid = "2f56d2cd-9d4b-45a5-8945-67c432f53d29";
        $siteid = 0;
        $callname = "GetCategories";
        $accesToken="AgAAAA**AQAAAA**aAAAAA**fqSbVQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AGkISjAJWBpg6dj6x9nY+seQ**An0BAA**AAMAAA**F5lNYkkTF5+eh9ORJHXXaAi0kOFTeYMNzeVxybYeVyTcvJWc8bn4auZqxUK25zO8gqfChFLU1b3UbRcgJmhoQcVqb0L7rmNpFctACptDN7zUw+iv9ZLeePmxUFivtc5KUtPa7XLYKF4khJc7l5MWBwtzGC7+QKPWNRBoccYnpz5X6n7KHymsf1sH00toTpSczFBzQGFQcP65pyioz45/QQ//8f90jOyFXs60nR0RGHItNnwjjfQy/J2U6AhXSorLl3jOhqJhMErkNrmzkv9hjTYlpVoWhlJWGz93O5YKzneDW3h/pgikw7taeC63EUNCMHqM5eP16e+o2iOUFJ+AhvN0t4joK8/7JLuhUggOJLDQFvp9T5wzRMSmhhPobmI/ABfN0EgxFbiNb/9hDelf9HotFt2MvCsoupqVzat3Kz+hGWlovE+qieoKrQOzSi8Rzm/DTNBEequJtPd7MOSX/boW0Y/Hl0hnyzPoszj6wCepHtSilZrLHL0RO3+9ocSmmTJKgi038+oIJS4wC81YP0bTBReu3HHM9/cb5b457JJZ0TSo/mX9Mv+tPfrsWmzo4huyXspp3KdjeaTOvn+IzfiOekrE3JDRi7aPUFgY00A/gpQTkT1bgabdIm9V86zJVXvRDJXfa7vp2nCaA2BuQzJF2RLIoW6CYDnOV7oLJsYRo7QKRaCY6S8rDmiJTgrd99zZSusNYldBCJuFAj4g0abmEmiJr2aCKEtL5wFb9UDNWM7v0J2IELjzAf+p0dF1";
        $xml = '<?xml version="1.0" encoding="utf-8"?>
                <GetCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                <RequesterCredentials>
                <eBayAuthToken>'.$accesToken.'</eBayAuthToken>
                </RequesterCredentials>';
        $manufacturers = unserialize(MAKE_LIST);
        if(is_array($brands)){
            foreach($brands as $brand){
                $key = array_search(strtolower($brand),array_map('strtolower',$manufacturers));
                if($key){
                    $xml .= '<CategoryParent>'.$key.'</CategoryParent>';
                }
            }
        }else{
            $key = array_search(strtolower($brands),array_map('strtolower',$manufacturers));
            if($key){
                $xml .= '<CategoryParent>'.$key.'</CategoryParent>';
            }
        }
        $xml .='<DetailLevel>ReturnAll</DetailLevel>
                <LevelLimit>4</LevelLimit>
                </GetCategoriesRequest>';

        $ch = curl_init("https://api.ebay.com/ws/api.dll?siteid=$siteid");

        $headers =	array('X-EBAY-API-COMPATIBILITY-LEVEL: '.$version,
                          'X-EBAY-API-DEV-NAME: '.$devid,
                          'X-EBAY-API-APP-NAME: '.$appid,
                          'X-EBAY-API-CERT-NAME: '.$certid,
                          'X-EBAY-API-CALL-NAME: '.$callname,
                          'X-EBAY-API-SITEID: '.$siteid);

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $output = curl_exec($ch);
        curl_close($ch);
        $res =  simplexml_load_string($output);
        $models = array();
        foreach($res->CategoryArray->Category as $category){
            if($category->CategoryLevel == 4){
                $models[] = (string)$category->CategoryName;
            }
        }
        if(!empty($models)){
            $models = array_unique($models);
            sort($models);
            return $models;
        }else{
            return false;
        }
    }
}
