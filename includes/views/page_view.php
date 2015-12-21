<section class="presentation-tabs">
  <div class="container">
      <div class="col-md-12 no-padding tabbable tabs-right wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
        <div class="col-md-8 tab-content">
          <ul class="nav nav-tabs hidden-md hidden-lg">
            <li class="active">
              <a href="#1" data-toggle="tab"><?php  echo $terms->name; ?></a>
            </li>
          </ul>

           <div class="tab-pane active" id="1"> 
             <?php  echo $terms->desc; ?> g
           </div>
        </div>
        <div class="col-md-4 no-right-padding wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
          <ul class="nav nav-tabs hidden-xs hidden-sm">
            <li class="active">
              <a href="#1" data-toggle="tab">Comment ça marche?</a>
            </li>
          </ul>
          <img src="images/condition-img-1.png" class="img-responsive center condition-img-1">
          <img src="images/presentation-img-2.png" class="img-responsive center">
        </div>
      </div>
      <!-- /tabs -->
  </div>
</section>

