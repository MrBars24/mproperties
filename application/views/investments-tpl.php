<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
		<div class="large-8 small-12 medium-10 align-center">
			<!-- Credit Balance -->
			<div class="investments setting">
				
				<!-- Title -->
				<div class="row title-block">
					<div class="medium-12 columns">
						<div class="_title">
							Orders
						</div>
					</div>
				</div>       

				<!-- Overview Block -->
				<div class="row overview-block"> 
					<div class="large-8 large-offset-2 medium-12  columns">
						<div class="wide-block gray">
							<div class="row">
								<div class="medium-5 small-12 columns">
									<h2 class="heading">Overview</h2>
								</div>
								<div class="medium-7 small-12 columns">
									<div class="current-balance">
										<p>Number of Pending Investments:</p>
										<div class="amount-box amount-large"> 
											<span class="balance_amount"><?=$balance['pending_investment_count']?></span>
										</div>
									</div> 
									<div class="pending-investment">
										<p>Total Pending investment Amount:</p>
										<div class="amount-box amount-medium">
											<span class="cur">$</span>
											<span class="balance_amount"><?=number_format($balance['pending_investment'], 2)?></span>
										</div>

										<ul class="overview-list">
											<li>Current Credit Balance: <strong class="amount">$<?=number_format($balance['credit_balance'], 2)?></strong></li>
											<!-- <li>Amount needed to fulfill all investments: <strong class="amount">$300,000</strong></li> -->
											<!-- <li><strong>3 investments</strong> close to completion valuing at: <strong class="amount"><span class="cur">$</span>150,000</strong></li> -->
										</ul>
									</div>
									<div class="error_msg no-bank-account"></div>
									<div class="cta-overview cta-inline">
										<a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide" data-open="deposit_fun_modal" id="deposit_fund">Deposit Funds</a> 
									</div>
								</div>
							</div>
						</div>
						<!-- .wide-block -->
					</div>
				</div>   

				<!--  -->
				<div class="heading-wrapper">
					<h1><?=$balance['pending_investment_count']?> Pending Investments</h1>
					<div class="sort-right">
						<a href="javascript:void(0);"> <i class="fa fa-sort-amount-asc  fa-flip-vertical"></i> Sort Investments</a>
					</div>
				</div>
				<div class="dashed-divider mt-20 mb-20"></div>

				<!-- Investments -->
				<div class="investments-box">
					<?php 
						$i = 0;
						foreach($pending_investment as $pending):
						$my_investment = $this->Users_model->get_current_user_investments($pending->property_id);
						$trust = $this->Property_model->get_trust_account($pending->property_id);
						$limit = ($trust->units_issued - $my_investment->units_invested < 0.30 * $trust->units_issued) ? $pending->units_issued - $pending->current_investments : 0.30 * $pending->units_issued ;
						//$current_percent_invested = ($trust->units_issued * 0.30 ) - $my_investment->units_invested;	
						// echo '<pre>';	
						// print_r($pending);
						// echo '</pre>';
					?>
						<div <?=($i <= 3) ? 'class="invest-row invest"' : 'class="hidden-investments invest" style="display: none;"' ?>>
							<?php 
							$images = $this->Property_model->get_property_images($pending->property_id);
							$img = "";
							foreach($images as $image){
								if($image->is_default == 1){
									$img = $image->filename;
									break;
								}else{
									$img = $images[0]->filename;
								}
							}
							?>
							<div><?=$i + 1?></div>
							<div class="investment-details">
								<span class="hidden unit-price"><?=$pending->invested_amount / $pending->units_invested?></span>
								<span class="hidden unit-issued"><?=$pending->units_issued?></span>
								<input type="hidden" name="property_image" class="property_image" value="<?=$img?>" id="property_image">
								<input type="hidden" name="address" id="address" value="<?=$pending->address?>">
								<input type="hidden" name="limit" id="limit" value="<?=$limit?>">
								<div class="funded-graph">
									<div class="property-details investment-circle circle text-center" data-value="<?=$pending->percent / 100?>" data-size="100" data-thickness="10">
										<strong class=""></strong>
									</div>
								</div>
								<div class="detail-1">
									
									<small class="heading">Property</small>
									<div class="property_name"><?=$pending->property_name?></div>
									<small class="heading">Investment Made On</small>
									<div class="investment_made"><strong><?=date('d M Y', strtotime($pending->date_of_investment))?></strong></div>
								</div>
								<div class="detail-2">
									<small class="heading">Valuation Price</small>
									<div class="amount-box amount-medium">
										<span class="cur">$</span>
										<span class="balance_amount"><?=number_format($pending->property_price, 2)?></span>
									</div> 
									<small class="heading">Price / Sq. Ft.</small>
									<div class="amount-box amount-medium">
										<span class="cur">$</span>
										<span class="balance_amount"><?=$pending->sqft?></span>
									</div>
								</div>
								<div class="detail-3">
									<small class="heading">Units Ordered</small>
									<div class="units_invested"><?=number_format($pending->units_invested)?></div>

									<small class="heading">Units Left till Completion:</small> 
									<div class="investment_made"><strong class="amount"><?=mp_format($pending->units_issued - $pending->current_investments)?></strong>
									</div>
								</div>
								<div class="cta-invest" data-id="<?=$pending->property_id?>">
									<a href="javascript:void(0);" class="cta-btn blue-rectangle-btn-wide edit-order">Edit order</a> 
									<a href="javascript:void(0);" class="cancel-order"> CANCEL ORDER </a>
								</div>
							</div>
						</div>
					<?php 
					$i++;
					endforeach; ?>
				</div>
				<!-- Investment Box -->
				
				<?php if(count($pending_investment) > 3): ?>
				<div class="load-more">
					<a href="javascript:void(0);" id="load-more" class="polygon-btn-outline">Load more</a> 
				</div>
				<?php endif; ?>


				<div class="heading-wrapper">
					<h1><?=count($processing_investment)?> Processing Investments</h1> 
				</div>

				

				<div class="row investment-table">
					<div class="small-12 column">
						<div class="ovf-x">
								<table summary="Shows Completed Investments" class="responsive centered"> 
								<thead>
									<tr>
									<th><a href="javascript:void(0);">Property <i class="fa fa-chevron-down"></i></a></th> 
									<th><a href="javascript:void(0);">Investment Fulfilled <i class="fa fa-chevron-down"></i></a></th> 
									<th><a href="javascript:void(0);">Valuation Price <i class="fa fa-chevron-down"></i></a></th>
									<th><a href="javascript:void(0);">Units Invested <i class="fa fa-chevron-down"></i></a></th> 
									<th><a href="javascript:void(0);">Amount Invested <i class="fa fa-chevron-down"></i></a></th> 

									</tr>
								</thead>
								<tbody>
									<?php foreach($processing_investment as $process): ?>
									<tr>
										<td><?=$process->property_name?></td>
										<td><?=date('d M Y', strtotime($process->fulfilled_at))?></td>
										<td>$<?=number_format($process->property_price, 2)?></td>
										<td><?=$process->units_invested?></td>
										<td>$<?=number_format($process->invested_amount, 2)?></td>
									</tr>
									<?php endforeach; ?>
								</tbody> 
							</table>
						</div>
					</div>
				</div>


				<div class="heading-wrapper">
					<h1><?=count($completed_investment)?> Completed Investments</h1> 
				</div>

 

<div class="row investment-table">
  <div class="small-12 column">
  <div class="ovf-x">
  		<table summary="Shows Completed Investments" class="responsive centered"> 
		<thead>
			<tr>
			<th><a href="javascript:void(0);">Property <i class="fa fa-chevron-down"></i></a></th> 
			<th><a href="javascript:void(0);">Investment Completed On <i class="fa fa-chevron-down"></i></a></th> 
			<th><a href="javascript:void(0);">Valuation Price <i class="fa fa-chevron-down"></i></a></th>
			<th><a href="javascript:void(0);">Units Invested <i class="fa fa-chevron-down"></i></a></th> 
			<th><a href="javascript:void(0);">Amount Invested <i class="fa fa-chevron-down"></i></a></th> 

			</tr>
		</thead>
		<tbody>
			<?php foreach($completed_investment as $complete): ?>
			<tr>
				<td><?=$complete->property_name?></td>
				<td><?=date('d M Y', strtotime($complete->completed_at))?></td>
				<td>$<?=number_format($complete->property_price, 2)?></td>
				<td><?=$complete->units_invested?></td>
				<td>$<?=number_format($complete->invested_amount, 2)?></td>
			</tr>
			<?php endforeach; ?>
		</tbody> 
    </table>
  </div>
    
  </div>
</div>

 
				

	 
			</div>
			<!-- /credit_balance --> 
		</div>

		<div class="large-8 small-12 medium-10 align-center reveal-modal global-overlay" id="investor-declarations" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
			<div class="popup-container">
				<div class="row">
					<h3 class="common-h3">EDIT ORDER:</h3>
					<!-- <?=form_open('transaction/action/edit_order', ['class' => 'small-12 medium-12 columns hm'])?> -->
						<span class="hidden unit-price">0</span>
						<span class="hidden unit-issued">1</span>
						<span class="hidden unit-free">1</span>
						<span class="hidden unit-invested">1</span>
						<input name="property" class="hidden property" type="number" value="">
						<input name="unit" class="hidden unit" type="number" value="">
						<input name="image" class="hidden image" type="text" value=""> 

						<div class="large-5 medium-12 small-12 columns">
							<div class="property-details edit-circle circle text-center" data-value="" data-size="150" data-thickness="10">
								<strong class=""></strong>
							</div>
						</div>
						<div class="large-7 medium-12 small-12 columns">
							<div class="order_fields_wrap">
								<label>Total units ordered = </label>
								<input type="text" name="" id="total_units_order" readonly>
							</div>
							<div class="order_fields_wrap">
								<label>Total percentage ordered = </label>
								<input type="text" name="" id="percent_ordered" readonly>
							</div>
							<div class="order_fields_wrap">
								<label>Total amount invested = </label>
								<input type="text" name="" id="amount_invested" readonly>
							</div>
							<div>
								<input type="text" id="sliderOutput1" name="units" class="hidden">
							</div>
							<div>
								units =
							</div>
							<div>
								<div class="amount-box amount-medium">
									<span class="cur">$</span>
									<span class="balance_amounts"></span>
								</div>
							</div>  

							<div class="slider" data-slider data-start="1" data-initial-start="1" data-end="100" data-step="1">
								<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
								<span class="slider-fill" data-slider-fill></span>
							</div>

							<div>
								<button type="submit" class="cta-btn blue-rectangle-btn" id="edit_order">Edit order</button> 
							</div>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
		<div class="reveal-modal" id="purchase_box_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="confirm-purchase-box">
				<?=form_open('transaction/action/edit_order', ['class' => 'row', 'id' => 'edit_form'])?>
				<input type="hidden" name="units" value="1" id="units">
				<div class="small-12 medium-10 large-7 align-center pop-up-white">
						<div class="row flex-style">
							<div class="small-12 medium-6 columns left-ppt">
								<img src="<?php echo base_url("uploads/images/full") . '/' . @$images[0]->filename; ?>">
							</div>
							<div class="small-12 medium-6 columns pt-10">
								<div class="confirm-info">
									<h3>Confirm Purchase</h3>
									<div class="cf-ppt-address">
										<h5><?php echo @$property->property_name; ?></h5>
										<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo @$property->address; ?></p>
									</div>
								</div>
								<div class="charges-container">
									<div class="bg-f4">
										<span class="unit-count">2</span> units = <sup>&#36;</sup> <span class="per-unit">40,000</span>
									</div>
									<input name="property" class="hidden property" type="number" value="">
									<input name="unit" class="hidden unit" type="number" value="">
									<div class="cta-btn-wrapper">
										<a href="javascript:void(0);"  data-close aria-label="Close modal" class="cta-cancel-btn">Cancel<i class="fa fa-arrow-right"></i></a>
										<button type="submit" data-close aria-label="Close modal" class="cta-confirm-btn cursor-pointer">Confirm<i class="fa fa-arrow-right"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div><!--confirm-purchase-bos-->
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
			
		<?php include("includes/footer.php"); ?>
		<?php include("includes/scripts.php"); ?>

		<!-- Custom Scripts -->
		<script type="text/javascript">
		var banks = <?php echo count($banks); ?>;

			$(document).ready(function(){
				

				new AutoNumeric('#deposit-amount', 'dotDecimalCharCommaSeparator');
				
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

				$("#deposit_fund").click(function(){
					if(banks == 0){
						var type = $(this).data("type");

						
						$(".no-bank-account").html("<p>It seems we currently do not have a record of bank account.<br>" +
													"We require this information to track your "+ type +" with us as well as using it as your designated account for you to receive your future payments.<br>" +
													"Please complete the information below.</p>");
						$(".no-bank-account p").css("text-align", "justify");
						//alert('You don\'t have a bank account. Please complete the information below.');
						return false;
					}else{
						$(".no-bank-account").html("");
					}
				});

				$(".investment-table tr").each(function() {
				  //$(this).children("td:nth-child(6)").text("adaad");
				  units_invested = parseInt($(this).children("td:nth-child(5)").text().replace(/\$|,/g, ''));
				  profit_loss = parseFloat($(this).children("td:nth-child(6)").text())/100;
				  
				  amount_invested = parseInt(units_invested) * 5000;

				  //$(this).children("td:nth-child(6)").text("$"+total_returns.toFixed(2));
				  $(this).children("td:nth-child(6)").text("$"+amount_invested.toFixed(2));

				});

				$('.cancel-order').click(function() {
					var id = $(this).parent().data('id')
					var that = $(this);
					
					var confirm = window.confirm("Are you sure you want to cancel your order?");

					if(confirm){
						$.ajax({
							url : '<?=site_url('transaction/action/cancel_order')?>/' + id,
							type: 'POST',
							data: {
								'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
							},
							success: function(res) {
								if(res) {
									that.parents('.invest-row').remove();
								}
							}
						})
					}
					
				})
				
				$('.edit-order').click(function() {
					var id = $(this).parent().data('id')
					var that = $(this);
					var percent = $(this).parents('.invest').find('.investment-circle').data('value');
					var invested = $(this).parents('.invest').find('div.units_invested').text();
					var totalFree = $(this).parents('.invest').find('strong.amount').text();
					var price = $(this).parents('.invest').find('.unit-price').text();
					var units = $(this).parents('.invest').find('.unit-issued').text();
					var image = $(this).parents('.invest').find('#property_image').val();
					var property_name = $(this).parents('.invest').find('.property_name').text();
					var address = $(this).parents('.invest').find('#address').val();

					//var end = +totalFree + +invested
					
					var end = $(this).parents('.invest').find('#limit').val();
					//console.log(+Number(percent * 100).toFixed(2));
					// console.log(percent);
					
					$('.slider').data('end', +end);
					new Foundation.Slider($('.slider'));
					
					//$pending->percent / 100?
					//console.log(address);
					// show overlay
					$('#investor-declarations').foundation('open');
					$('#investor-declarations .edit-circle').circleProgress('value', +Number(percent * 100).toFixed(2));
					$('#investor-declarations #sliderOutput1').val(invested).change();
					$('#investor-declarations .unit-price').text(price);
					$('#investor-declarations .unit-issued').text(units);
					$('#investor-declarations .unit-free').text(totalFree);
					$('#investor-declarations .unit-invested').text(invested);
					$('#investor-declarations .property').val(id);
					$('#investor-declarations .image').val(image);


					$("#total_units_order").val(units);
					$("#percent_ordered").val(+Number(percent * 100).toFixed(2));
					$("#amount_invested").val(invested);
		
					$('.slider-handle').attr('aria-valuenow', invested);

					$('#edit_order').click(function(){

						
						$('#purchase_box_modal').foundation('open');
						$('.cf-ppt-address h5').text(property_name);
						$('.cf-ppt-address p').html('<i class="fa fa-map-marker"></i> '+address);
						$('.unit-count').text($("#total_units_order").val());
						$('.per-unit').text($("#amount_invested").val());
						$('.left-ppt img').attr("src", "<?=base_url("uploads/images/full")?>"+"/"+image);
						$("#purchase_box_modal .property").val(id);
						$("#purchase_box_modal .unit").val($('#investor-declarations .unit').val());
						
						$("#edit_form #units").val($('#total_units_order').val());
						$("#edit_form").attr('action', 'transaction/action/check_investment/'+id);
					});


					

				});

				$('#investor-declarations .slider').on('moved.zf.slider', function(){
					var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
					$('#investor-declarations .unit').val(unit);

					var price_per_unit = $('#investor-declarations .unit-price').text();
					$(".balance_amounts").text((unit * price_per_unit).toFixed(2)).digits();
					var total = $('#investor-declarations .unit-issued').text();
					
					var free = $('#investor-declarations .unit-free').text();
					var invested = $('#investor-declarations .unit-invested').text();
					var remain = (+total - +free) - invested;
					
					var detail_funding_total = (+remain + +unit) / total;
					var val = detail_funding_total;
					
					$("#total_units_order").val(unit);
					$("#percent_ordered").val((val * 100).toFixed(2));
					$("#amount_invested").val($('.balance_amounts').text());


					$('#investor-declarations .edit-circle').circleProgress('value', +val);
				});

				

			});


			$(function(){
				$('.property-details.circle, #investor-declarations .edit-circle').circleProgress({
					startAngle: -Math.PI / 4 * 2,
					fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
				}).on('circle-animation-progress', function(event, progress, stepValue) {
					$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
					//$(this).find('strong').html(Math.round(100 * stepValue) + '<sup>%</sup><span class="funded">FUNDED</span>');
				}); 
			});

			// Events
			$('#load-more').on('click', function(){
				var $this = this;
				$('.hidden-investments').slideDown('400', function() {
					$($this).hide();
				});
			});

			//responsive-tables.js
			// $(document).ready(function() {
			//   var switched = false;
			//   var updateTables = function() {
			//     if (($(window).width() < 767) && !switched ){
			//       switched = true;
			//       $("table.responsive").each(function(i, element) {
			//         splitTable($(element));
			//       });
			//       return true;
			//     }
			//     else if (switched && ($(window).width() > 767)) {
			//       switched = false;
			//       $("table.responsive").each(function(i, element) {
			//         unsplitTable($(element));
			//       });
			//     }
			//   };
			   
			//   $(window).load(updateTables);
			//   $(window).on("redraw",function(){switched=false;updateTables();}); // An event to listen for
			//   $(window).on("resize", updateTables);
			   
				
			// 	function splitTable(original)
			// 	{
			// 		original.wrap("<div class='table-wrapper' />");
					
			// 		var copy = original.clone();
			// 		copy.find("td:not(:first-child), th:not(:first-child)").css("display", "none");
			// 		copy.removeClass("responsive");
					
			// 		original.closest(".table-wrapper").append(copy);
			// 		copy.wrap("<div class='pinned' />");
			// 		original.wrap("<div class='scrollable' />");

			//     setCellHeights(original, copy);
			// 	}
				
			// 	function unsplitTable(original) {
			//     original.closest(".table-wrapper").find(".pinned").remove();
			//     original.unwrap();
			//     original.unwrap();
			// 	}

			//   function setCellHeights(original, copy) {
			//     var tr = original.find('tr'),
			//         tr_copy = copy.find('tr'),
			//         heights = [];

			//     tr.each(function (index) {
			//       var self = $(this),
			//           tx = self.find('th, td');

			//       tx.each(function () {
			//         var height = $(this).outerHeight(true);
			//         heights[index] = heights[index] || 0;
			//         if (height > heights[index]) heights[index] = height;
			//       });

			//     });

			//     tr_copy.each(function (index) {
			//       $(this).height(heights[index]);
			//     });
			//   }

			// });

			// $(window).on('load resize', function () {
			//   if ($(this).width() < 767) {
			//     $('table tfoot').hide();
			//   } else {
			//     $('table tfoot').show();
			//   }  
			// });
 
			
		</script>
	</body><!--body-->  
