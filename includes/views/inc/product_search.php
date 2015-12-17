<?php
//Get Brands List
//~ $modelList = array();
//~ $manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
//~ while($row = mysql_fetch_assoc($manf)) {
    //~ $modelList[] = $row;
//~ }
?>

<!--Search scripts-->
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.multiselect.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/home_functions.js"></script>

<section class="list-ciiii">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
        <img src="<?php echo DEFAULT_URL; ?>/images/ash-bg.png" class="img-responsive commence">
        <div class="commence-text">
			 <form action="products.php" id="searchcars" method="get" >
				 <input type="hidden" name="products" value="products" />
          <div class="form-group form-inline">
            <div class="col-md-3 col-xs-12 col-sm-6">
              <h2>Recherche</h2>
              <a href="<?php echo DEFAULT_URL ?>/advancesearch">Recherche Avancée</a>
            </div>
			<?php if(!empty($manufacturer)){
				$manufacturerNameArray = array();
				foreach( $manufacturer as $key => $value ) {
					$manufacturerNameArray[trim($value)] = trim($value);
					?> 
					<script type="text/javascript"> 
						ajaxcallNew('<?php echo trim($value)?>','manufacturer','model','','append','<?php echo $model; ?>');
					</script>
					<?php
				} 

			}?>
            <div class="all-slect-form">
            
             <div class=" form-group for-sm">
                <div class="">                  
                  <select class="form-control prothom"  id="manufacturer_select" multiple="multiple"  name="manufacturer[]" >
							<?php
								foreach($modelList as $model) { ?>
									<option value="<?php echo trim($model['value']) ?>" <?php if ( @$manufacturerNameArray[trim($model['value'])] == trim($model['value']) )  { ?>selected="selected"<?php } ?> ><?php echo $model['value']; ?></option>
							<?php }?> 
						 </select>
                 </div> 
              </div>

               <div class="form-group for-sm">
                <div class="selt-box">
                    <select class="form-control" name="model" id="model_select">
						<option value="">Modèles</option>         
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
										if (@$madeYear[0] == $i) {
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
              <div class="list-research-img"><a id="search_submit" href="javascript:void(0);"><img src="<?php echo DEFAULT_URL; ?>/images/recharche-btn.png"></a></div>
            </div>
           
            </div>
			</form>
        </div>

        
      </div>
    </div>
  </div>
</section>
