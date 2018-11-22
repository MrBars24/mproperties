<?php include("application/views/includes/header.php"); ?>
	<body>

		<?php include("application/views/includes/menu.php"); ?>
		
		<!-- main content -->
		<div class="blue-bg-img">
			<div class="row">
				<h1 class="text-center white">Forgot Password</h1>
				<div class="relative forgot-pwd">
						<div class="loading-wrap" id="loadingDiv" style="display: none;">
							<div class="loading-wrap2">
								<div class="loading-gift">
									<img src="<?php echo base_url('assets/frontend/images/loader.gif');?>">
								</div>
							</div>
						</div>
						<div class="form-wrap" id="form-wrap">
							<?php echo form_open('account/forgot_password', 'class="form-horizontal" id="forgot_password_form" data-abide novalidate '); ?>
								<div class="white-bg form-style">
									<?php 
										$err = $this->session->flashdata('message');
										if(!empty($err)): ?>
										<div data-abide-error class="alert callout reg_error">
											<p><i class="fi-alert"></i> 
												<div class='error_msg' id='error_msg'>
													<?=$this->session->flashdata('message')?>
												</div>	
											</p>
										</div>
									<?php endif; ?>
									<div class="small-12">
										<input type="email" name='email' placeholder="Enter Your Email*" aria-errormessage="email-error" required pattern="email">
										<span class="form-error" id="email-error">
											Email is required.
										</span>
									</div>																																
									
									<div class="center-div mt30">
										<button class="blue-rectangle-btn login-account" type="submit" value="Submit">Retrieve Password <span class="fa fa-long-arrow-right"></span></button>
									</div>
									<div class="to-create-register">
										<p class="text-center">Already have an account? <a href="<?php echo site_url('login');?>">Login </a></p>
									</div>
								</div>
							</form>
						</div>
						<div class="thankyouDiv" id="thankyouDiv" style="display: none;">
							<div class="thank-you-wrap">
									<h2>Thank you sed do eiusmod tempor</h2>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
									<div class="back-to-home">
										<a href="#" class="blue-rectangle-btn btn-bth">Back To Home</a>
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
	
	


</script>