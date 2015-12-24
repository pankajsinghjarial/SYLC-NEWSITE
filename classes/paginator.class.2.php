<?php
/*
 * PHP Pagination Class
 * @author admin@catchmyfame.com - http://www.catchmyfame.com
 * @version 2.0.0
 * @date October 18, 2011
 * @copyright (c) admin@catchmyfame.com (www.catchmyfame.com)
 * @license CC Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0) - http://creativecommons.org/licenses/by-sa/3.0/
 */
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $ipp_array;
	var $extraParam;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->ipp_array = array(10,25,50,100,'All');
		$this->items_per_page = (!empty($_GET['ipp'])) ? $_GET['ipp']:$this->default_ipp;		
	}

	function paginate()
	{
		if(!isset($this->default_ipp)) $this->default_ipp=25;
		if(isset($_GET['ipp']) && $_GET['ipp'] == 'All')
		{
			$this->num_pages = 1;
//			$this->items_per_page = $this->default_ipp;
		}
		else
		{
			if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
			$this->num_pages = ceil($this->items_total/$this->items_per_page);
		}
			$this->current_page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1 ; // must be numeric > 0
			//customization for media page
		if(basename($_SERVER['SCRIPT_NAME']) == 'media.php') {
			if($this->extraParam == "video" && $_GET['media'] == "video") {
				$this->current_page = (isset($_GET['page']) ) ? (int) $_GET['page'] : 1 ; // must be numeric > 0
			} elseif($this->extraParam == "photo" && $_GET['media'] == "photo") {
				$this->current_page = (isset($_GET['page']) ) ? (int) $_GET['page'] : 1 ; // must be numeric > 0
			} else {
				$this->current_page = (isset($_GET['page']) ) ? 1 : 1 ; // must be numeric > 0
			}
		}
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;
				
		if($_GET || basename($_SERVER['SCRIPT_NAME']) == 'media.php')
		{
			//customization for media page
			if(basename($_SERVER['SCRIPT_NAME']) == 'media.php') {
				$_SERVER['QUERY_STRING'] = 'media='.$this->extraParam;
			}		
			$args = explode("&",$_SERVER['QUERY_STRING']);
			foreach($args as $arg)
			{
				$keyval = explode("=",$arg);
				if($keyval[0] != "page" And $keyval[0] != "ipp") $this->querystring .= "&" . $arg;
			}
		}

		if($_POST)
		{
			foreach($_POST as $key=>$val)
			{
				if(is_array($val)){
					foreach($val as $v){
						$this->querystring .= "&".$key."[]=$v";
					}
				}
				else if($key != "page" And $key != "ipp") $this->querystring .= "&$key=$val";
			}
		}
		if($this->num_pages > 10)
		{
			$this->return .= "<ul class=\"list-inline list-unstyled\">";
			$this->return .= ($this->current_page > 1 And $this->items_total >= 10) ? "<li class=\"pre\"><a class=\"paginate\" href=\"$_SERVER[PHP_SELF]?page=$prev_page&ipp=$this->items_per_page$this->querystring\"><i class=\"fa fa-angle-double-left\"></i> Précédent</a></li></a></li> ":"<li class=\"pre\"><i class=\"fa fa-angle-double-left\"></i> Précédent</li>";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " <li><a><span class=\"dots\">...</span></a></li> ";
				// loop through all pages. if first, last, or in range, display
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And @$_GET['page'] != 'All') ? "<li class=\"active\"><a title=\"Go to page $i of $this->num_pages\" href=\"javascript:void(0)\">$i</a></li> ":"<li><a class=\"paginate\" title=\"Go to page $i of $this->num_pages\" href=\"$_SERVER[PHP_SELF]?page=$i&ipp=$this->items_per_page$this->querystring\">$i</a></li> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= "<li><a><span class=\"dots\"> ...</span></a></li>  ";
			}
			$this->return .= (($this->current_page < $this->num_pages And $this->items_total >= 10) And ($_GET['page'] != 'All') And $this->current_page > 0) ? "<li class=\"next\"><a class=\"paginate\" href=\"$_SERVER[PHP_SELF]?page=$next_page&ipp=$this->items_per_page$this->querystring\"> Suivant <i class=\"fa fa-angle-double-right\"></i></a></li>\n":"<li class=\"next\"> Suivant <i class=\"fa fa-angle-double-right\"></i></li>\n";
			/*$this->return .= ($_GET['page'] == 'All') ? "<a class=\"current\" style=\"margin-left:10px\" href=\"#\">All</a> \n":"<a class=\"paginate\" style=\"margin-left:10px\" href=\"$_SERVER[PHP_SELF]?page=1&ipp=All$this->querystring\">All</a> \n";*/
			$this->return .= "</ul>";
		}
		else
		{
            $this->return .= "<ul class=\"list-inline list-unstyled\">";

            for($i=1;$i<=$this->num_pages;$i++)
            {
                $this->return .= ($i == $this->current_page) ? "<li class=\"active\"><a href=\"javascript:void(0)\">$i</a></li> ":"<li><a href=\"$_SERVER[PHP_SELF]?page=$i&ipp=$this->items_per_page$this->querystring\">$i</a></li> ";
            }
            $this->return .= "</ul>";
        }
		$this->low = ($this->current_page <= 0) ? 0:($this->current_page-1) * $this->items_per_page;
		if($this->current_page <= 0) $this->items_per_page = 0;
		$this->limit = (isset($_GET['ipp']) && $_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}
	function display_items_per_page()
	{
		$items = '';
		if(!isset($_GET[ipp])) $this->items_per_page = $this->default_ipp;
		foreach($this->ipp_array as $ipp_opt) $items .= ($ipp_opt == $this->items_per_page) ? "<option selected value=\"$ipp_opt\">$ipp_opt</option>\n":"<option value=\"$ipp_opt\">$ipp_opt</option>\n";
		return "<span class=\"paginate\">Items per page:</span><select class=\"paginate\" onchange=\"window.location='$_SERVER[PHP_SELF]?page=1&ipp='+this[this.selectedIndex].value+'$this->querystring';return false\">$items</select>\n";
	}
	function display_jump_menu()
	{
		for($i=1;$i<=$this->num_pages;$i++)
		{
			$option .= ($i==$this->current_page) ? "<option value=\"$i\" selected>$i</option>\n":"<option value=\"$i\">$i</option>\n";
		}
		return "<span class=\"paginate\">Page:</span><select class=\"paginate\" onchange=\"window.location='$_SERVER[PHP_SELF]?page='+this[this.selectedIndex].value+'&ipp=$this->items_per_page$this->querystring';return false\">$option</select>\n";
	}
	function display_pages() {		
		return $this->return;
	}
}
