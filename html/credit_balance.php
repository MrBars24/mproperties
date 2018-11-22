<?php include("includes/header.php"); ?>
		<?php include("includes/menu.php"); ?>
		<div class="small-12 medium-8 align-center">
			<!-- Credit Balance -->
			<div class="home-body-container credit_balance setting">
				
				<!-- Title -->
				<div class="row title-block">
					<div class="medium-12 columns">
						<div class="_title">
							Credit Balance
						</div>
					</div>
				</div>       

				<!-- Overview Block -->
				<div class="row overview-block"> 
					<div class="large-8 large-offset-2   columns">
						<div class="wide-block gray">
							<div class="row">
								<div class="large-5 medium-12 columns">
									<h2 class="heading">Overview</h2>
								</div>
								<div class="large-7 medium-12 columns">
									<div class="current-balance">
										<small class="heading">Current Balance</small>
										<div class="amount-box amount-large">
											<span class="cur">$</span>
											<span class="balance_amount">11,000,000</span>
										</div>
									</div> 
									<div class="pending-investment">
										<p>Total Pending Investment Amount:</p>
										<div class="amount-box amount-medium">
											<span class="cur">$</span>
											<span class="balance_amount">13,888,000</span>
										</div>

										<ul class="overview-list">
											<li>Current Credit Balance: <strong class="amount">$50,000</strong></li>
											<li>Amount needed to fulfill all investments: <strong class="amount">$150,000,000</strong></li>
											<li><strong>3 investments</strong> close to completion valuing at: <strong class="amount">$115,000,000</strong></li>
										</ul>
									</div>
									<div class="cta-overview cta-inline">
										<a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide" data-open="deposit_fun_modal">Deposit Funds</a>
										<a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide">Withdraw Funds</a>
									</div>
								</div>
							</div>
						</div>
						<!-- .wide-block -->
					</div>
				</div>   

				<!--  -->
				<div class="dashed-divider"></div>

				<!-- Bank information -->
				<div class="row bank-information">
					<div class="large-6 medium-12 columns">
						<span class="home-body-left-tagline">Bank Information </span>
					</div>
					<div class="large-6 medium-12 columns">
						<div class="form-style"> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="bank_name-1"><small class="heading">Bank Name</small></label>
									<input type="text" class="bank_name" id="bank_name-1" placeholder="Enter Bank Name" value="CITIBANK Singapore Ltd" readonly>
									<div class="bank_logo_wrapper">
										<img src="./images/bank_logo/citibank.png" alt="citibank" class="bank-logo">
									</div>
									<a href="javascript:void(0);" class="form-enabler" data-target="#bank_name-1">CHANGE</a>
								</div>  
								<div class="bank-choices">
									<div data-bank="citibank">
										
									</div>
								</div>
							</div> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="swift_code-1"><small class="heading">SWIFT Code</small></label>
									<input type="text" class="swift_code" id="swift_code-1" placeholder="Enter SWIFT Code" value="999999" readonly > 
									<a href="javascript:void(0);" class="form-enabler" data-target="#swift_code-1">CHANGE</a>
								</div>
								
							</div> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="account_no-1"><small class="heading">Account Number</small></label>
									<input type="text" class="account_no" id="account_no-1" placeholder="Enter Account Number" value="999999999" readonly> 
									<a href="javascript:void(0);" class="form-enabler" data-target="#account_no-1">CHANGE</a>
								</div>
								
							</div>
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="account_name-1"><small class="heading">Account Name</small></label>
									<input type="text" class="account_name" id="account_name-1" placeholder="Enter Account Name" value="John Doe account" readonly> 
									<a href="javascript:void(0);" class="form-enabler" data-target="#account_name-1">CHANGE</a>
								</div> 
							</div>  
							<div class="btns-holder clearfix">
								<div class="cancle-btn-div">
									<a href="#" class="cancle-btn">Cancel</a>
								</div>
								<div class="save-btn-div">
									<a href="#" class="save-btn">Save</a>
								</div>
							</div>
						</div>
					</div>
				</div>   
 
				<div class="other-banks-container">
					
				</div>


				<div class="dashed-divider mb-25 mt-0"></div> 
				<div class="add-bank-wrapper">
					<a href="javascript:void(0);" id="add-correspondent"><i class="fa fa-plus"></i> ADD CORRESPONDENT BANK </a>
				</div>


	 
			</div>
			<!-- /credit_balance --> 
		</div>
				
		<div class="small-12 medium-5 align-center reveal-modal" id="deposit_fun_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
  		<div class="popup-container">
		 	<div class="row">
		 		<div class="small-12 medium-12 columns no_padding">
		 			<div class="text-center">
		 				<h1 class="deposit-header">Depositing Funds</h1>
		 				<p class="deposit_info">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod.</p>
		 			</div>
		 			<div class="drop_a_cheque">
		 				<h3 class="fun_head">Step 1: Drop a Cheque</h3>
		 				<div class="cheque_box">
		 					<div class="row no-margin payable-row">
		 						<div class="small-4 columns">
		 							<span>Payable to</span>
		 						</div>
		 						<div class="small-8 columns">
		 							<p>Sed ut perspiciatis PTE LTD</p>
		 						</div>
		 					</div>
		 					<div class="row no-margin amount-row">
		 						<div class="small-4 columns">
		 							<span>Amount</span>
		 						</div>
		 						<div class="small-8 columns">
		 							<p>At vero eos et accusamus et iusto odio dignissi
									ducimus qui blanditiis praesentium voluptatum
									deleniti atque corrupti quos dolores et quas</p>
		 						</div>
		 					</div>
		 					<div class="row no-margin details-row">
		 						<div class="small-4 columns">
		 							<span>Your Details</span>
		 						</div>
		 						<div class="small-8 columns">
		 							<p>At vero eos et accusamus et iusto odio dignissi
									ducimus qui blanditiis praesentium voluptatum
									deleniti atque corrupti quos dolores et quas</p>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="let_us_know">
		 				<h3 class="fun_head">Step 2: Let Us Know</h3>
		 				<p class="deposit_info">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod.</p>
		 				<div class="row no-margin contact-row">
		 						<div class="small-4 columns">
		 							<span>Email:</span>
		 						</div>
		 						<div class="small-8 columns">
		 							<p><a href="mailto:Excepteur.sinaecat@microproperties.com">Excepteur.sinaecat@microproperties.com</a></p>
		 						</div>
		 					</div>
		 					<div class="row no-margin ct-num-row">
		 						<div class="small-4 columns">
		 							<span>Contact Number:</span>
		 						</div>
		 						<div class="small-8 columns">
		 							<p>+65 1234 5678</p>
		 						</div>
		 					</div>
		 			</div>
		 			<div class="note">
		 				<h4>Note</h4>
		 				<ul>
		 					<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</li>
		 				</ul>
		 				<div class="cta-ok">
		 					<a href="javascript:void(0)" class="cta-btn blue-rectangle-btn-wide">
		 						Ok
		 					</a>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div> <!--popup-container-->
  	</div>
		<?php include("includes/footer.php"); ?>
		<?php include("includes/scripts.php"); ?>



	<!-- Custom Scripts -->
		<script type="text/javascript">
			$(function(){
				$('.swift_code').mask('000000');
				$('.account_no').mask('000-000-000');
			});

			function formEnabler(x){
				$(x).removeAttr('readonly');
			}

			// Events
			$('.form-enabler').on('click', function(){
				formEnabler($(this).data('target')); 
				$(this).data('target').focus();
			});
			var counter = 2;
			$('#add-correspondent').on('click', function(){ 
				$.ajax({
			        type: 'POST',
			        url: './includes/add-bank-correspondent.php?c=' + counter,  
			        success: function(data){
			            $('.other-banks-container').append(data);
			            $('#bank-'+counter).slideDown('400', function() {
			            });
			            counter++; 
			            console.log(counter);
			            $('.form-enabler').on('click', function(){
							formEnabler($(this).data('target')); 
							$(this).data('target').focus();
						});
			        }
			    });
			});
			
		</script>
	</body><!--body-->  
</html>