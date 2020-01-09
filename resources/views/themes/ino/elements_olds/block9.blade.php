<section class="get_touch-area" id="contact">
	<div class="map" style="width: calc(50% - 14px);">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.570582258283!2d-76.53660598464721!3d38.97947227955803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7f6c5aaaf54d5%3A0x1addc21959043e3e!2s41+Old+Solomons+Island+Rd+%23101%2C+Annapolis%2C+MD+21401!5e0!3m2!1sen!2sus!4v1561833301867!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	</div>
	<div class="get_touch">
		<div class="left_inner_content" style="width: 0px;"></div>
		<div class="right_inner_content">
			<h2 class="th-h2">{{setting('home.location_37')}}</h2>
			<form method="post" id="contact-form" class="row m0 contact-form">
			    {{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6 form-group">
						<input type="text" id="name" name="name" class="form-control contact-lname" placeholder="Name" required>
					</div>
					<div class="col-sm-6 form-group">
						<input type="text" id="email" name="email" class="form-control contact-mail" placeholder="Email" required>
					</div>
					<div class="col-sm-12 form-group">
						<textarea name="message" id="message" class="form-control contact-message" placeholder="Message" required></textarea>
					</div>
					<div class="row">
                        <div id="blue-loader" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                             <img src="{{ asset('storage/company/images/loader-blue.gif')}}" style="height:50px;">   
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                    <p id="contact-submit-message"></p>
                    </div>
					<div class="col-sm-12 form-group">
						<input id="submit" type="submit" value="Contact Us" class="btn thm-btn">
						<span class="contact-submit-progress"></span>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
$("#contact-form").validate({
      rules: {
          name: {required: true},
          email: {required: true, email: true},
          message: {required: true}
      },
      submitHandler: function(form) {
          $('#blue-loader').show();
          $('#submit-button').hide();
          $('#card-message').hide();
				$.ajax({
					type: 'post',
					url: '/contact-send',
					data: {
					    '_token': $('input[name="_token"]').val(),
					    'name': $("#name").val(),
					    'email': $("#email").val(),
						'message': $("#message").val(),
					},
				   success: function(data) {
			
				           $('#contact-submit-message').show();
				           $('#contact-submit-message').html(data);
				           $('#blue-loader').hide();
                           $('#submit-button').show();
				     
					} 
				}).done(function(data) {
				    
				});
		
            }	
		});

</script>

