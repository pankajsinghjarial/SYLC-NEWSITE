<section class="media-header-section">
</section>
<!-- End header section -->
<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
        <div class="contact-us-top-text">
          <h1>Contact Us</h1>
          <p>Besoin d'aide, vous avez besoin d'un agent francais Sur Le territoire U.S</p>
        </div>
        
          <form action="" id="sylContactForm" name="sylContactForm" method="POST" >
            <div class="col-md-6 form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control"  name="email" id="exampleInputEmail1" placeholder=" ">
            </div>
            <div class="col-md-6 form-group">
              <label for="exampleInputEmail1">Contact:</label>
              <input type="text" class="form-control" name="fax" id="exampleInputEmail1" placeholder=" ">
            </div>
            <div class="col-md-12 form-group">
              <label for="exampleInputEmail1">Telephone:</label>
              <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder=" ">
            </div>
            <div class="col-md-12 form-group">
              <label for="exampleInputEmail1">Notes:</label>
              <textarea class="form-control" name="notes" rows="3"></textarea>
            </div>
            <div class="col-md-12 form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="contacAgreement"> J’ai lu et j’accepte expressement la  <a href="">politique de  confidential</a>
                </label>
              </div>
            </div>
            <div class="col-md-12 contact-btn">
              <a href=""><input class="btn btn-default" id="default-btn" type="submit" value="Envoyer"><i class="fa fa-angle-right"></i></a>
            </div>
          </form>
          
      </div>
      <div class="col-md-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".5s">
        <div class="contact-goole-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3585.1823150828336!2d-80.15243520522093!3d26.027590132433634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9abae94d2b971%3A0x46f97982966d75e7!2s1822+N+Dixie+Hwy%2C+Hollywood%2C+FL+33020%2C+USA!5e0!3m2!1sbn!2sbd!4v1449399916567" width="100%" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="contact-address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
          <h2>Address:</h2>
          <p>1822 N Dixie Hwy Hollywood, FL 33020</p>
          <p>Tel:   (Fr) 01.76.63.32.16</p>
          <p>Email: <a href="">  info@sylc-export.com</a></p>
        </div>
        </div>
      </div>
      <div class="col-md-12 no-right-padding">
        <hr class="contact-hr">
      </div>
      
    </div>
  </div>
</section>
	<script>
	$().ready(function() {
	    // validate signup form on keyup and submit
		$("#sylContactForm").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				fax: "required",
				contacAgreement: "required"
			},
			messages: {
				email: "Please enter a valid email address",
				contacAgreement: "Please accept our policy"
			}
		});

	});
	</script>
