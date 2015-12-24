<!--header-bg Section end  -->
<?php
	$pageName = basename($_SERVER['PHP_SELF']);
	if ($pageName == 'index.php') {
		$class = "ciiii";
		$text = '<h1>Ca Commence ICI</h1><img src="<?php echo DEFAULT_URL; ?>/images/home-page-background-design.png" class="img-responsive commence">';
	} else {
		$class = "list-ciiii";
		$text = '<img src="<?php echo DEFAULT_URL; ?>/images/ash-bg.png" class="img-responsive commence">';
	}

    //Get Selected Brands
    $selectedBrands = array();
    if(isset($_GET['manufacturer'])){
        $selectedBrands = $_GET['manufacturer'];
    }
    $brands = unserialize(MAKE_LIST);
    $modelLists = array();
    if(!empty($selectedBrands)){
        $modelLists = $common->getModelsByBrands($selectedBrands);
    }
?>
<section class="ciiii">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <img src="<?php echo DEFAULT_URL; ?>/images/home-page-background-design.png" class="img-responsive commence">
        <div class="commence-text">               
        <form action="products.php" id="searchcars" method="get" >	
			<input type="hidden" name="products" value="products" />
			<h1>Ca Commence ICI</h1>
          
			 <div class="form-group form-inline">
				<div class="col-md-3 col-xs-12 col-sm-6">
				  <h2>Recherche</h2>
				  <a href="<?php echo DEFAULT_URL ?>/advancesearch">Recherche Avancée</a>
			</div>

				<div class="all-slect-form">
				
                    <div class=" form-group for-sm">
                        <div class="">                  
                            <select class="form-control prothom"  id="manufacturer_select" multiple="multiple" name="manufacturer[]" >
                                <?php
                                foreach($brands as $brand) { ?>
                                    <option value="<?php echo trim($brand) ?>" <?php if (!empty($selectedBrands)) { if(in_array($brand,$selectedBrands)){ ?>selected="selected"<?php }} ?> ><?php echo $brand; ?></option>
                                <?php }?> 
                            </select>
                        </div> 
                    </div>

				   <div class="form-group for-sm">
					<div class="selt-box-model">
					  <select class="form-control prothom" name="model[]" multiple="multiple" id="model_select">
					  </select>					  
					</div>
						<div id="loader">
							<img class="loader" src="/images/loading.gif">
						</div>
				  </div>

				   <div class="form-group for-sm">
					<div class="selt-box">
						<?php
							if (!isset($manufacturer)) {
								$manufacturer = '';
							}
						?>  
						<select name="madeYear[]" class="form-control year_de" onchange="changeSel(this.value)">
							<option value="">Ann&eacute;e De</option>
								<?php
									for ($i = 1986; $i >= 1920; $i--) {
										echo '<option value="'.$i.'">'.$i.'</option>';
										if ($madeYear[0] == $i) {
											echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
											}
										}
								?>
						</select>
					</div>
				  </div>

				   <div class="form-group for-sm">
					<div class="selt-box">						
						<?php
							if (isset($madeYear) && $madeYear[0] != '') { ?>
								<select name="madeYear[]" class="form-control year_a">
									<option value="" <?php if ($madeYear[1] == '') {?> <?php }?>>Ann&eacute;e
													&Agrave;</option>
									<?php 
										for ($i = date("Y",strtotime("+1 years")); $i > $madeYear[0] ; $i--) {        
											if ($madeYear[1] == $i) {
											echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
											} else{
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										}
									?>
								</select>
									<?php } else { ?>
											<select name="madeYear[]" class="form-control year_a">
												<option value="">Ann&eacute;e &Agrave;</option>
											</select>
									<?php }?>
					</div>
				  </div>

				   <div class="form-group for-sm">
					<div class="selt-box">
						<input type="text" class="form-control" placeholder="Prix min"/>
					</div>
				  </div>

				  <div class="form-group for-sm">
					<div class="selt-box">
						<input type="text" class="form-control" placeholder="Prix max" />
					</div>
				  </div>
				  <input id="Slider1" type="hidden" name="price" class="combo_box min_box1" />
				  <div class="research-img"><a id="search_submit" href="javascript:void(0);"><img src="<?php echo DEFAULT_URL; ?>/images/rechange-search-form.png"></a></div>
				</div>
			   
				</div>
		</form>
        </div>
      </div>
    </div>
  </div>
</section>
