<?php
	include("conf/config.inc.php");
	include(LIST_ROOT."/includes/code/products_code.php"); 
    include(LIST_ROOT."/includes/views/header.php");
  
	if (!isset($_COOKIE['visitonce'])) { // no cookie, so probably the first time here					
	?>
	<script>
	$(document).ready(function() {
		$.colorbox({width:"80%", inline:true, href:"#popup"});	
	});
	</script>
	<?php
	}
	include(LIST_ROOT."/includes/views/inc/product_search.php");
	include(LIST_ROOT."/includes/views/product_list_view.php"); 
	include(LIST_ROOT."/includes/views/mostview.php"); 
	include(LIST_ROOT."/includes/views/footer.php"); 
