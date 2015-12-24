<section class="recherche">
  <div class="container">
    <div class="row">
		<div class="col-md-8 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
			<?php echo $content;?>
		</div>

        <div class="col-md-4 col-sm-6 col-xs-12 recherche-right-content no-right-padding wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <div id="flag-lg">
            <h3 class="besoin">Besoin D'aide</h3>
            <h6 class="vous">Vous avez besoin d'un agent francais sur Le territoire U.S.</h6>
            
          </div>
          <div class="hidden-xs hidden-sm">
            <div id="flag"></div>
           </div>
            <div class="recherche-right-form">
              <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Marque:</label>
                  <select class="form-control">                    
                    <?php
						foreach(unserialize(MAKE_LIST) as $brand) { ?>
							<option value="<?php echo trim($brand) ?>" ><?php echo $brand; ?></option>
					<?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Modele:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Achat:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <label for="exampleInputPassword1">Annee de:</label>
                <div class="col-md-12 form-group no-padding">
                  <div class="col-md-6 no-padding">
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="col-md-1 no-padding text-center">
                    <p class="form-a">A:</p>
                  </div>
                  <div class="col-md-5 no-padding">
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Commentaires:</label>
                  <textarea class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Societe:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email:</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> J’ai lu et j’accepte expressement la  <a href="">politique de  confidential</a>
                  </label>
                </div>
                <a href=""><button class="btn btn-primary" type="submit">Soumettre <i class="fa fa-angle-double-right"></i></button></a>
              </form>
            </div>
        </div>
    </div>
  </div>
</section>

