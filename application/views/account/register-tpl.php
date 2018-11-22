<?php include("application/views/includes/header.php"); ?>
	<body>

		<?php include("application/views/includes/menu.php"); ?>
		
		<!-- main content -->
		<div class="blue-bg-img">
			<div class="row">
				<h1 class="text-center white">Start investing easily and affordably with us today!</h1>
				<div class="relative">
						<div class="loading-wrap" id="loadingDiv" style="display: none;">
							<div class="loading-wrap2">
								<div class="loading-gift">
									<img src="<?php echo base_url('assets/frontend/images/loader.gif');?>">
								</div>
							</div>
						</div>
						<div class="form-wrap" id="form-wrap">
							<?php echo form_open('register', 'class="form-horizontal" id="register_form" data-abide novalidate '); ?>
								<div class="white-bg form-style">
									<div data-abide-error class="alert callout reg_error" style="display: none;">
										<p><i class="fi-alert"></i> 
											<div class='error_msg' id='error_msg'>
											<?php
												if(isset($error))
												{
													echo $error;
												}else
												{
													echo 'Please fill in all the required fields.';
												}
											?>						
											</div>	
										</p>
									</div>
									

									<div class="small-12">
										<input type="text" name='first_name' placeholder="First Name*" aria-errormessage="firstname-error" required pattern="[a-zA-Z0-9\s]+">
										<span class="form-error" id="firstname-error">
											Invalid First name
										</span>
									</div>
									<div class="small-12">
										<input type="text" name='last_name' placeholder="Last Name*" aria-errormessage="lastname-error" required pattern="[a-zA-Z0-9\s]+">
										<span class="form-error" id="lastname-error">
											Invalid Last name
										</span>
									</div>
									<div class="small-12">
										<input type="text" name='email' placeholder="Email*" aria-errormessage="email-error" required pattern="email">
										<span class="form-error" id="email-error">
											Email Address is required.
										</span>
									</div>
									
									<input type="checkbox" name="newsletter" value="1"> <label>Subscribe to our monthly newsletter</label>
									<?php
										if(config('show_registration_captcha')==1) :
									?>
										<div class="g-recaptcha" data-sitekey="<?php echo config('recaptcha_site_key');?>"></div>
									<?php
										endif;
									?>
									<p><i>By clicking CREATE FREE ACCOUNT and CONTINUE, I agree to the <a href="<?php echo site_url('terms'); ?>">TERMS OF USE</a> and <a href="<?php echo site_url('privacy-policy'); ?>">PRIVACY POLICY</a>.</i></p>
									<div class="center-div">
										<button class="blue-rectangle-btn create-account" type="submit" value="Submit">create free account <span class="fa fa-long-arrow-right"></span></button>
									</div>
									<div class="hr-dotted"></div>
									<p class="text-center">Already have an account?  <a href="<?php echo site_url('login'); ?>" class="text-upper">Login</a></p>
								</div>
							</form>
						</div>
						<div class="thankyouDiv" id="thankyouDiv" style="display: none;">
							<div class="thank-you-wrap">
									<h2>Thank you for your registration! </h2>
									<p>An email will be send to you for your verification. Please verify and log in again.</p>
									<div class="back-to-home">
										<a href="<?php echo site_url(); ?>" class="blue-rectangle-btn btn-bth">Back To Home</a>
									</div>
							</div>
						</div>
					</div>
			</div>
		</div>

		
		<!-- end main content -->
			
		
		<?php include("application/views/includes/footer.php"); ?>

		<?php include("application/views/includes/scripts.php"); ?>

	</body>
</html>
<script>

	$(document).ajaxStart(function () {
        $("#loadingDiv").show();				
    }).ajaxStop(function () {
        $('#loadingDiv').hide();
    });

   $(document).ready(function(){

  //  		$("#register_form").bind("submit",function(e) {
		//   e.preventDefault();
		//   console.log("submit intercepted");
		//   return false;
		// });
		
		//$("#register_form").on("formvalid.zf.abide", function(ev,frm) {
			$("#register_form").on("submit", function(ev) {
				ev.preventDefault();
				$("#loadingDiv").show();
				
			    
			    $.ajax({
			  		type: "POST",
			  		url: site_url + "account/action/register", //"user/ajax/register", 
			  		data: $('#register_form').serialize(),
			  		success: function(result){
			  			console.log(result);
			  			$('.reg_error > #error_msg').html('');
			  			$('.reg_error').hide();
			  			
			  			if(result.status=='error')
			  			{
			  				$('.reg_error > #error_msg').html(result.msg)
			  				$('.reg_error').show();

			  				
			  			}else
			  			{
			  				if(result.status=='success')
			  				{
			  					$("#thankyouDiv").show();
			  				}
			  			}
		            	

		            	$("#loadingDiv").hide();
		        	}
		        });												

				return false;
				
		});

	});



</script>