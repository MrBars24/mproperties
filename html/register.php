<?php include("includes/header.php"); ?>
		<?php include("includes/menu.php"); ?>
		
		<!-- main content -->
		<div class="blue-bg-img">
			<div class="row">
				<h1 class="text-center white">Start Your Property Portfolio with Us Today!</h1>
					<div class="relative">
						<div class="loading-wrap" id="loadingDiv">
							<div class="loading-wrap2">
								<div class="loading-gift">
									<img src="images/loader.gif">
								</div>
							</div>
						</div>
						<div class="form-wrap" id="form-wrap">
							<div class="white-bg form-style">
								<form data-abide novalidate class="register_form">
									<div data-abide-error class="alert callout" style="display: none;">
										<p><i class="fi-alert"></i> There are some errors in your form.</p>
									</div>

									<div class="small-12">
										<input type="text" placeholder="First Name*" aria-errormessage="firstname-error" required pattern="alpha">
										<span class="form-error" id="firstname-error">
											This field is required.
										</span>
									</div>
									<div class="small-12">
										<input type="email" placeholder="Email*" aria-errormessage="email-error" required pattern="email">
										<span class="form-error" id="email-error">
											This field is required.
										</span>
									</div>
									<fieldset class="small-12">
										<input id="checkbox1" type="checkbox"><label for="checkbox1">Subscribe to our monthly newsletter</label>
									</fieldset>

									<div class="g-recaptcha" data-sitekey="6LdFglIUAAAAAMC450AumqKSvgBgSerZiqekzE_A"></div>
									<p><i>By clicking CREATE FREE ACCOUNT and CONTINUE, I agree to the <a href="#">TERMS OF USE</a> and <a href="#">PRIVACY POLICY</a>.</i></p>
									<div class="center-div">
										<button class="blue-rectangle-btn create-account" type="submit" value="Submit">create free account <span class="fa fa-long-arrow-right"></span></button>
									</div>
									<div class="hr-dotted"></div>
									<p class="text-center">Already have an account?  <a href="javascript:void(0);" class="text-upper go-to-login">Login</a></p>

								</form>
							</div>
						</div>
						<div class="thankyouDiv" id="thankyouDiv">
							<div class="thank-you-wrap">
									<h2>Thank You for Your Registration!</h2>
									<p>We hope you’ll find MicroProperties useful in helping you build your property portfolio. You can now start browsing for the properties you want to invest in!</p>
									<div class="back-to-home">
										<a href="#" class="blue-rectangle-btn btn-bth">Back To Home</a>
									</div>
							</div>
						</div>
					</div>
			</div>
		</div>
		<!-- end main content -->
			
		<?php include("includes/footer.php"); ?>

		<?php include("includes/scripts.php"); ?>

		<script>
			$(document).ready(function(){

				$("#loadingDiv").hide();
				$("#thankyouDiv").hide();
				$(".register_form").on("invalid.zf.abide", function(ev,el) {
					// alert("Input field foo is invalid");
				});
				$(".register_form").on("formvalid.zf.abide", function(ev,frm) {

					$("#loadingDiv").show();


					setTimeout(function(){ 
						$("#thankyouDiv").show();
					}, 1000);
				});
				$(".register_form")
				.on('invalid', function () {
					var invalid_fields = $(this).find('[data-invalid]');
					console.log(invalid_fields);
					alert('gdere');
				})
				.on('valid', function () {
					return false;        
				})
				.on('submit', function(){
					return false;
				});



			});





		</script>
	</body>
</html>
