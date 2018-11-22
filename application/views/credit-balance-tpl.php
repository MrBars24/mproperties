<?php include("includes/header.php"); ?>
	<?php include("includes/menu.php"); ?>
		<style>
		.bank-information{
			margin-bottom: 20px;
		}
		</style>
		<div class="small-12 medium-8 align-center">
			<!-- Credit Balance -->
			<div class="credit_balance setting">
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
					<div class="large-10 large-offset-1  columns">
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
											<span class="balance_amount"><?=number_format($balance['credit_balance'], 2)?></span>
										</div>
									</div> 
									<div class="pending-investment">
										<p>Total Pending Investment Amount:</p>
										<div class="amount-box amount-medium">
											<span class="cur">$</span>
											<span class="balance_amount"><?=number_format($balance['pending_investment'], 2)?></span>
										</div>

										<ul class="overview-list">
											<!-- <li>Current Credit Balance: <strong class="amount">$<?=number_format($balance['credit_balance'], 2)?></strong></li> -->
											<!-- <li>Amount needed to fulfill all investments: <strong class="amount">$0</strong></li> -->
											<li><strong><?=isset($get_close_investment['close_complete_investment_count']) ? number_format($get_close_investment['close_complete_investment_count']) : 0 ?>  <a href='<?=base_url()?>orders'>investments</a></strong> close to completion. valuing at: <strong class="amount">$<?=isset($get_close_investment['close_complete_investment_total']) ? number_format($get_close_investment['close_complete_investment_total'], 2) : 0?></strong></li>
										</ul>
									</div>
									<div class="cta-overview cta-inline">
										<div class="error_msg no-bank-account"></div>
										<a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide" data-open="deposit_fun_modal" id="deposit_fund" data-type="deposit">Deposit Funds</a>
                                        <input type="hidden" data-open="deposit_fun_modal" id="deposit_fund_hidden">
                                        <a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide" data-open="widthdraw_fund_modal" id="withdraw_funds" data-type="withdraw">Withdraw Funds</a>
                                    </div>
								</div>
							</div>
						</div>
						<!-- .wide-block -->
					</div>
				</div>   

				<div class="callout callout-custom small hidden" data-closable>
					<p></p>
					<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<?php 

				$counter=1;
				if (count($banks) > 0): ?>
								

				<div class="dashed-divider"></div>


				<?php

				// if user bank = empty echo empty bank detail else show foreach statement

				foreach ($banks as $bank) {
				
				
				?>


				<!-- Bank information -->
				<div class="row bank-information" id="bank-<?php echo $counter?>">
					<div class="large-6 medium-12 columns">
						<span class="home-body-left-tagline">Bank Information </span>
					</div>
					<div class="large-6 medium-12 columns">
						<div class="form-style"> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="bank_name-1"><small class="heading">Bank Name</small></label>
									<input type="text" class="account_name" id="bank_name-<?php echo $counter?>" placeholder="Enter Bank Name" value="<?php echo $bank->bank_name ?>" readonly>
									<a href="javascript:void(0);" class="form-enabler" data-target="#bank_name-<?php echo $counter?>" >CHANGE</a>
								</div>  
							</div> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="swift_code-1"><small class="heading">SWIFT Code</small></label>
									<input type="text" class="swift_code" id="swift_code-<?php echo $counter?>" placeholder="Enter SWIFT Code" value="<?php echo $bank->swift_code ?>" readonly > 
									<a href="javascript:void(0);" class="form-enabler" data-target="#swift_code-<?php echo $counter?>">CHANGE</a>
								</div>
								
							</div> 
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="account_no-1"><small class="heading">Account Number</small></label>
									<input type="text" class="account_no" id="account_no-<?php echo $counter?>" placeholder="Enter Account Number" value="<?php echo $bank->account_no ?>" readonly> 
									<a href="javascript:void(0);" class="form-enabler" data-target="#account_no-<?php echo $counter?>">CHANGE</a>
								</div>
								
							</div>
							<div class="custom-form-group">
								<div class="input-holder">
									<label for="account_name-1"><small class="heading">Account Name</small>
									<button tooltip="Payments are made to the main account holder. Payment to a third part is not allowed." tooltip-position="top"><i class="fa fa-info-circle" aria-hidden="true"></i></button></label>
									<input type="text" class="account_name" id="account_name-<?php echo $counter?>" placeholder="Enter Account Name" value="<?php echo $bank->account_name ?>" readonly> 
									<!-- <a href="javascript:void(0);" class="form-enabler" data-target="#account_name-<?php echo $counter?>">CHANGE</a> -->
								</div> 
							</div>  

							<!--input hidden for bank id-->
							<input type="hidden" name="bank_account_id-<?php echo $counter?>" id="bank_account_id-<?php echo $counter?>" value="<?php echo $bank->bank_account_id?>" />


							<div class="btns-holder clearfix">
								<div class="cancle-btn-div">
									<a href="#" class="cancle-btn">Cancel</a>
								</div>
								<div class="save-btn-div">
									<a href="#" class="save-btn" onClick="update_user_bank(<?php echo $counter ?>)" >Update</a>
								</div>
								<div class="delete-btn-div">
									<a href="#" class="delete-btn" onClick="delete_user_bank(<?php echo $counter ?>)">Delete</a>
								</div>									
							</div>
						</div>
					</div>
				</div>   
 				<div class="dashed-divider mb-25" id="divider-<?php  echo $counter ?>"></div> 
				<?php

				 $counter++;  } 

				 endif;  ?>

				<div class="other-banks-container">
					

				</div>


				
				<div class="add-bank-wrapper">
					<a href="javascript:void(0);" id="add-correspondent"></a>
				</div>

				 <!-- <i class="fa fa-plus"></i> ADD CORRESPONDENT BANK  -->
	 
			</div>
			<!-- /credit_balance --> 
		</div>
		<div class="small-12 medium-12 large-12 align-center reveal-modal" id="deposit_fun_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
			<div class="row">
				<div class="small-12 medium-8 large-5 align-center">
					<div class="popup-container"><!-- FORM -->
						<?=form_open('credit-balance/action/add_deposit', ['class' => 'row deposit-row'])?>
							<div class="small-12 medium-12 columns">
								<h1 class="deposit-header text-center">Depositing Funds</h1>
								<div class="first-step">
									<p class="deposit_info"></p>
									<div class="white-bg form-style">
										<!--<label>Name</label>
										<input type="text" name='name' placeholder="Enter name" />
										<label>Email</label>
										<input type="email" name='email' placeholder="Enter email" /> -->
										<div id="deposit-message"></div>
										<label>Amount</label>
										<input type="text" name='amount' placeholder="Enter amount" id="deposit-amount"/>
										<div class="g-recaptcha hidden" data-sitekey="<?php echo config('recaptcha_site_key');?>"></div>
										<p><i>By clicking Next, I agree to the <a href="<?php echo site_url('terms-of-use');?>" target="_blank">Terms of Use</a> and <a href="#" target="_blank">Privacy Policy</a>.</i></p>
										<br><br>
										<div class="btns-wrapper">
											<div class="pull-left">
												<a href="#" class="cta-btn blue-rectangle-btn-wide" id="deposit-close" data-close>Cancel</a>
											</div>
											<div class="pull-right">

												<a href="javascript:void(0)" class="cta-btn blue-rectangle-btn-wide next-btn-div">
													Next <span class="fa fa-long-arrow-right"></span>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div style="display: none;" class="second-step">
									<ul class="tabs" data-tabs id="deposit-fund-tabs">
										<li class="tabs-title is-active"><a href="#panel1" >Bank Transfer</a></li>
										<li class="tabs-title"><a data-tabs-target="panel2" aria-selected="true" href="#panel2">Drop a Cheque</a></li>   
									</ul>
									<div class="tabs-content is-active" data-tabs-content="deposit-fund-tabs">
										<div class="tabs-panel" id="panel1">
											<div class="drop_a_cheque">
												<!-- <h3 class="fun_head">Step 1: Bank Transfer</h3> -->
												<div class="cheque_box">
													<div class="row no-margin payable-row">
														<div class="small-4 columns">
															<span>Payable to</span>
														</div>
														<div class="small-8 columns">
															<p>TBA</p>
														</div>
													</div>
													<div class="row no-margin amount-row">
														<div class="small-4 columns">
															<span>Amount</span>
														</div>
														<div class="small-8 columns amount-value">
															<p>At vero eos et accusamus et iusto odio dignissi
																ducimus qui blanditiis praesentium voluptatum
															deleniti atque corrupti quos dolores et quas</p>
														</div>
													</div>
													<div class="row no-margin details-row">
														<div class="small-4 columns">
															<span>Payment Reference</span>
														</div>
														<div class="small-8 columns">
															<p><strong><?=$user_info->id; ?><?=$user_info->first_name; ?><?=$user_info->last_name; ?></strong></p>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="let_us_know">
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
											</div> -->
											<div class="note">
												<h4>Note</h4>
												<ul>
													<li>Please note processing of funds may take up to 10 working days. An email confirmation will be sent to you upon receipt. Please contact us at <a href="mailto:hello@mymicroproperties.com">hello@mymicroproperties.com</a> for further assistance.
													</li>
												</ul>
												<div class="cta-ok">
												<button type="submit" class="cta-btn blue-rectangle-btn-wide">
													Ok
												</button>
												</div>
											</div>
									</div>
									<div class="tabs-panel" id="panel2">
										<div class="drop_a_cheque">
											<div class="cheque_box">
												<div class="row no-margin payable-row">
													<div class="small-4 columns">
														<span>Payable to</span>
													</div>
													<div class="small-8 columns">
														<p>TBA</p>
													</div>
												</div>
												<div class="row no-margin amount-row">
													<div class="small-4 columns">
														<span>Amount</span>
													</div>
													<div class="small-8 columns amount-value">
														<p>At vero eos et accusamus et iusto odio dignissi
															ducimus qui blanditiis praesentium voluptatum
														deleniti atque corrupti quos dolores et quas</p>
													</div>
												</div>
												<div class="row no-margin details-row">
													<div class="small-4 columns">
														<span>Payment Reference</span>
													</div>
													<div class="small-8 columns">
														<p><strong><?=$user_info->id; ?><?=$user_info->first_name; ?><?=$user_info->last_name; ?></strong></p>
													</div>
												</div>
											</div>
										</div>
										<div class="note">
											<h4>Note</h4>
											<ul>
												<li>Please note processing of funds may take up to 10 working days. An email confirmation will be sent to you upon receipt. Please contact us at <a href="mailto:hello@mymicroproperties.com">hello@mymicroproperties.com</a> for further assistance.</li>
											</ul>
											<div class="cta-ok">
												<button type="submit" class="cta-btn blue-rectangle-btn-wide">
													Ok
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
							</div>
						</div>
					</div> <!--popup-container-->
			</div>
		</div>

		<!-- Withdraw fund modal -->
		<div class="small-12 medium-12 large-12 align-center reveal-modal" id="widthdraw_fund_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
			<div class="row">
				<div class="small-12 medium-8 large-5 align-center">
					<div class="popup-container"><!-- FORM -->
						<?=form_open('credit-balance/action/withdraw_funds', ['class' => 'row withdraw-row'])?>
							<div class="small-12 medium-12 columns">
								<h1 class="deposit-header text-center">Withdraw Funds</h1>
								<div class="first-step">
									<p class="deposit_info"></p>
									<div class="white-bg form-style">
										<!--<label>Name</label>
										<input type="text" name='name' placeholder="Enter name" />
										<label>Email</label>
										<input type="email" name='email' placeholder="Enter email" /> -->
										<div id="withdraw-message">
							 
										</div>
										<label>Amount</label>
										<input type="text" name='amount' placeholder="Enter amount" id="withdraw_ammount"/>
										<div class="g-recaptcha hidden" data-sitekey="<?php echo config('recaptcha_site_key');?>"></div>
										<p><i>By clicking Next, I agree to the <a href="http://microproperties:8888/terms">Terms of Use</a> and <a href="http://microproperties:8888/privacy-policy">Privacy Policy</a>.</i></p>
										<br><br>
										<div class="btns-wrapper">
											<div class="pull-left">
												<a href="#" class="cta-btn blue-rectangle-btn-wide" data-close style="display:block;" id="cancel-withdraw">Cancel</a>
											</div>
											<div class="pull-right">
												<button class="cta-btn blue-rectangle-btn-wide next-btn-div" style="display:block;cursor:pointer;">
													Withdraw <span class="fa fa-long-arrow-right"></span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
							</div>
						</div>
				</div>
			</div>
		</div>



		<!-- End Withdraw fund moda; -->
	</div>
		<?php include("includes/footer.php"); ?>
		<?php include("includes/scripts.php"); ?>

		<!-- Custom Scripts -->
		<script type="text/javascript">
			var banks = <?php echo count($banks); ?>;
            $(function () {
				
				new AutoNumeric('#deposit-amount', 'dotDecimalCharCommaSeparator');

				new AutoNumeric('#withdraw_ammount', 'dotDecimalCharCommaSeparator');

                var first_time_deposit = <?php echo $user_info->first_time_deposit; ?>;
                //console.log(first_time_deposit);


				


                if(first_time_deposit == 0){
                    $("#deposit_fund").attr('data-open', 'prompt-overlay');

                }else{
                    $("#deposit_fund").attr('data-open', 'deposit_fun_modal');

                }

                $('#deposit_fund').on('click', function (e) {
                    $.ajax({
                        url: site_url + "user/ajax/update_first_time_deposit",
                        success: function (data) {

                        },
                        error: function (err) {
                        }
                    });
                });

                $('div#prompt-overlay div.close, div#prompt-overlay a.btn-no-ack, div#prompt-overlay a.btn-yes-ack').on('click', function (e) {

                    $('#deposit_fund_hidden').trigger('click');

                });

            });


			$(function(){
				// $('.swift_code').mask('000000');
				// $('.account_no').mask('000-000-000');
			});
				// $('.swift_code, .account_no').on('keyup',function(){
				// $('.swift_code').mask('000000');
				// $('.account_no').mask('000-000-000');
				// });

			function formEnabler(x){
				$(x).removeAttr('readonly');
			}

			// Events
			$('.form-enabler').on('click', function(){
				formEnabler($(this).data('target'));
				$($(this).data('target')).focus();
			});

			var counter = <?php echo $counter ?>;
			$('#add-correspondent').on('click', function(){
				$.ajax({
					type: 'POST',
					data:{
						'counter' : counter,
						'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
					},
					dataType: 'html',
					url: site_url+"bank/action/bank_correspondent",
					success: function(data){
						$('.other-banks-container').append(data);
						$('#bank-'+counter).slideDown('400', function() {
						});
						counter++;
						$('.form-enabler').on('click', function(){
							formEnabler($(this).data('target'));
							$($(this).data('target')).focus();
						});
					}
				});
			});
			//console.log(counter);
			if(counter==1){
				$('#add-correspondent').trigger("click");

			}


			function bank_save(counter){

				var bank_name=$("#bank_name-"+counter).val();
				var swift_code=$("#swift_code-"+counter).val();
				var account_no=$("#account_no-"+counter).val();
				var account_name=$("#account_name-"+counter).val();
				
				
				if(bank_name != "" && account_no != "" && account_name != ""){
					$.ajax({
						type: "POST",
						url: site_url+"bank/action/insert_user_bank",
						data: {
							"bank_name": bank_name,
							"swift_code": swift_code,
							"account_no": account_no,
							"account_name": account_name,
							'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
						},
						success: function(data) {
							if(data == "Error"){
								//alert("Failed");
								toggleCallout('Bank failed to be added.', 'alert');
								$("#message").html(data);
							} else {
								$("#bank_account_id-"+counter).val(data);
								//alert("Success");
								toggleCallout('Bank successfully been added.');
								banks++
								$(".bank_name_msg").html("");
								$(".acc_no_msg").html("");
								$(".acc_name_msg").html("");
								$('.save-btn').text('Update');
								$('.save-btn').attr("onclick", "update_user_bank("+counter+")");
							}

							$("p").addClass("alert alert-success");

						},
						error: function(err) {
							//alert(err);
							toggleCallout(error, 'alert');
						}
					});
				}else{
		
					if(bank_name == ""){
						$(".bank_name_msg").html('<p>Bank name is required</p>');
					}
					if(account_no == ""){
						$(".acc_no_msg").html('<p>Account number is required</p>');
					}
					if(account_name == ""){
						$(".acc_name_msg").html('<p>Account name is required</p>');
					}
				}

			}

			function update_user_bank(counter){

				var bank_name=$("#bank_name-"+counter).val();
				var swift_code=$("#swift_code-"+counter).val();
				var account_no=$("#account_no-"+counter).val();
				var account_name=$("#account_name-"+counter).val();
				var bank_account_id=$("#bank_account_id-"+counter).val();

				$.ajax({
					type: "POST",
					url: site_url+"bank/action/update_user_bank",
					data: {
						"bank_account_id": bank_account_id,
						"bank_name": bank_name,
						"swift_code": swift_code,
						"account_no": account_no,
						"account_name": account_name,
						'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
					},
					success: function(data) {

			  			if(data == "Success Update") {
							//alert("Success Update");
							toggleCallout('Bank updated successfully.');
							$("#message").html(data);
			  			}

						$("p").addClass("alert alert-success");
					},
					error: function(err) {
						alert(err);
					}
				});

			}

			function delete_user_bank(counter){

				var bank_name=$("#bank_name-"+counter).val();
				var swift_code=$("#swift_code-"+counter).val();
				var account_no=$("#account_no-"+counter).val();
				var account_name=$("#account_name-"+counter).val();
				var bank_account_id=$("#bank_account_id-"+counter).val();

				//code here
				var delete_btn = confirm("Are you sure you want to delete bank " + bank_name +" with Account Number "+account_no + "?");

				if (delete_btn == true) {

				$.ajax({
					type: "POST",
					url: site_url+"bank/action/delete_user_bank",
					data: {
						"bank_account_id": bank_account_id,
						'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
					},
					success: function(data) {
						if(data== "Delete Success"){
							$('#bank-' + counter).remove();
			  				$('#divider-' + counter).remove();

			  				//alert("Delete Success");
							toggleCallout('Bank successfully been deleted.');

					 		$("#message").html(data);
							banks--;
							console.log(banks);
			  			}
				   		$("p").addClass("alert alert-success");
				   	},
				   	error: function(err) {
						toggleCallout(err, 'alert');
				   	}
			   	});

				}

			}

			Number.prototype.toMoney = function(decimals, decimal_sep, thousands_sep)
			{
				var n = this,
				c = isNaN(decimals) ? 2 : Math.abs(decimals), //if decimal is zero we must take it, it means user does not want to show any decimal
				d = decimal_sep || '.', //if no decimal separator is passed we use the dot as default decimal separator (we MUST use a decimal separator)

				/*
				according to [https://stackoverflow.com/questions/411352/how-best-to-determine-if-an-argument-is-not-sent-to-the-javascript-function]
				the fastest way to check for not defined parameter is to use typeof value === 'undefined'
				rather than doing value === undefined.
				*/
				t = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep, //if you don't want to use a thousands separator you can pass empty string as thousands_sep value

				sign = (n < 0) ? '-' : '',

				//extracting the absolute value of the integer part of the number and converting to string
				i = parseInt(n = Math.abs(n).toFixed(c)) + '',

				j = ((j = i.length) > 3) ? j % 3 : 0;
				return sign + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '');
			}

			function toggleCallout(message, status = 'success') {
				var $callout = $('.callout-custom');

				if($callout.hasClass('hidden')) {
					$callout.removeClass('hidden');
				}

				$('.callout-custom p').html(message);
				$callout.addClass(status);

				setTimeout(() => {
					$callout.trigger('close');
				}, 3000);
			}

			// for next
			$('.next-btn-div').on('click', function(){
				if(banks == 0){
					$('#deposit-message').html('<div class="error_msg" style="display: block;"><p>'+
													'You don\'t have a bank account. Please complete the information below.'+
												'</p></div>');
				}else if($('.deposit-row input[name=amount]').val().length > 0) {
					$('.first-step').hide();
					$('.second-step').show();

					var amount = $('input[name=amount]').val()
					$('.amount-row .amount-value p').html(amount)
				}
			});

			

			$('#deposit-close').on('click', function(){
				$('#deposit-message').html("");
				$('#withdraw-message').html("");
				$("#withdraw_ammount").val("");
				$(".error_msg").html("");
			});

			$('.reveal-modal .row')

			var submitting = false;
			$('.deposit-row').submit(function() {
				if(submitting) return false;
				submitting = true;
			});


		</script>

		<!-- Widtraw funds -->
		<script>

			$(function(){

				$("#deposit_fund, #withdraw_funds").on("click", function(e){
					if(banks == 0){
						var type = $(this).data("type");

						$(".no-bank-account p").css("text-align", "justify");
						$(".no-bank-account").html("<p>It seems we currently do not have a record of bank account.<br>" +
													"We require this information to track your "+ type +" with us as well as using it as your designated account for you to receive your future payments.<br>" +
													"Please complete the information below.</p>");
						//alert('You don\'t have a bank account. Please complete the information below.');
						return false;
					}else{
						$(".no-bank-account").html("");
					}
				});

				$(".withdraw-row").on('submit', function(e){
					var current_balance = <?php echo $balance['credit_balance']; ?>;
					if(banks == 0){
						e.preventDefault();
						$('#withdraw-message').html('<div class="error_msg" style="display: block;"><p>'+
														'You don\'t have a bank account. Please complete the information below.'+
													'</p></div>');
					}else if($("#withdraw_ammount").val() > current_balance){
						e.preventDefault();
						$('#withdraw-message').html('<div class="error_msg" style="display: block;"><p>'+
														'You only have '+ current_balance.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') +' balance'+
													'</p></div>');
					}else if($("#withdraw_ammount").val() == ""){
						e.preventDefault();
						$('#withdraw-message').html('<div class="error_msg" style="display: block;"><p>'+
														'Invalid input'+
													'</p></div>');
					}else if(current_balance == 0){
						e.preventDefault();
						$('#withdraw-message').html('<div class="error_msg" style="display: block;"><p>'+
														'You don\'t have enough balance'+
													'</p></div>');
					}else{
						var amount = $("#withdraw_ammount").val();
						amount = amount.replace(/,/g , "");
						$("#withdraw_ammount").val(amount);
						$(this).submit();
					}
				});
			});
			
			$("#withdraw_ammount").on('focus', function(){
				var price = $(this).val()
				price = price.replace(/,/g , "");
				$(this).val(price)
			});

			$("#withdraw_ammount").on('focusout', function(){
				var price = $(this).val()
				$(this).val(numeral(price).format('0,0.00'))
			});

			$("#cancel-withdraw").on('click',function(){
				$("#withdraw_ammount").val("");
				$('#withdraw-message').html("");
			});

		</script>
		<!-- End withdraw funds -->
	</body><!--body-->  
</html>



