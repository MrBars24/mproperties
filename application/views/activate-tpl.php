<?php include("includes/header.php"); ?>
	<style>
		.pw-very-weak .pwd_str {
		    color: #d00;
		}

		.pw-weak .pwd_str {
		    color: #d00;
		}

		.pw-mediocre .pwd_str {
		    color: #f3f01a;
		}

		.pw-strong .pwd_str {
		    color: #f3b31a;
		}

		.pw-very-strong .pwd_str {
		    color: #0d0;
		}
	</style>
	<body>

		<?php include("includes/menu-2.php"); ?>
		
		<!-- main content -->
	
			<div class="row activate-account">
				<div class="large-6 columns">
				<h1 class="text-center ">Activate your account</h1>
					
				</div>
				<div class="large-6 columns">

					<?php echo form_open_multipart('activate-account', array('class'=>'form-horizontal', 'id'=>'activate_form')); ?>
					<div class="form-style">
						<p>Before you can log in, you’ll need to create a new password below. </p>
						<br>
						<div class="pos-rel">
							<input type="password" id="new_password" name="new_password" placeholder="New Password" data-indicator="pwindicator"/>
							<span class="fa fa-eye"></span>
							<input type="hidden" name="user_id" value="<?php echo $user_info->id; ?>">
						</div>
						<p class="password-status">Password Strength: <span id="pwindicator"><span class="red pwd_str" style="text-transform: capitalize;"></span></span></p>
						
						<br>

						<a href="javascript:;" class="blue-rectangle-btn" id='submit-activate'>confirm <span class="fa fa-long-arrow-right"></span></a>
					</div>
					</form>

				</div>
			</div>
		
		<!-- end main content -->
			
		
		<?php include("includes/footer-2.php"); ?>

		<?php include("includes/scripts.php"); ?>

	</body>
</html>
<script src="<?php echo base_url('assets/frontend/js/vendor/jquery.pwstrength.js'); ?>"></script>
<script>

$( document ).ready(function() {
 	$('#new_password').pwstrength(); 
});

$( "#submit-activate" ).click(function() {
  $( "#activate_form" ).submit();
});		
</script>