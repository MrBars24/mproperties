<?php include("includes/header.php"); ?>
<header>
	<a href="<?php echo site_url();?>"><div class="logo"></div></a>
</header>
		<div class="large-6 small-12 medium-8 align-center order-sum">
		    <?=form_open('transaction/action/add_investment?q=' . rawurlencode($_GET['q']), ['class' => 'home-body-container'])?>
		      <div class="row">
		        <div class="medium-12 columns">
		        	<div class="con-status">
		        		<div class="one order-active">
		        			<span>1</span>
		        		</div>
		        		<div class="status">
		        		</div>
		        		<div class="two">
		        			<span>2</span>
		        		</div>
		        	</div>
		          	<div class="order-title">
		          		Order Summary
		          	</div>
		        </div>
		      </div>      
		      <div class="row bg-grey-w-pd">
		      	<div class="small-12 medium-12 align-center">
		      		<div class="row">
		      			<div class="large-4 medium-12 small-12 columns">
				        	<div class="cost-holder">
				        		<h3 class="common-h3">Investment Cost Breakdown</h3>
				        	</div>
				        </div>
				         <div class="large-8 medium-12 small-12 columns">
				          	<div class="order-info">
				          		<ul class="cost-infos">
				          			<li>Propert Value <span>(<?=$property_value_p?>)</span>
				          				<span rel="tooltip" title="<?=$property_value_p?> of your investments will go towards the purchase price of the Property."><i class="fa fa-info-circle" aria-hidden="true"></i>
										</span>
					          			<!-- <div class="tooltip-info">
	                                      <i class="fa fa-info-circle" aria-hidden="true">
	                                      </i>
	                                      <span class="tooltiptext tooltip-top">Tooltip text</span>
                                    	</div> -->
                                    </li>
				          			<li>Stamp Duty <span>(<?=$bsd_p?>)</span>
				          			<span rel="tooltip" title="Stamp Duties is a tax charged by the Inland Revenue Authority of Singapore on all Property Transactions.<br>
				          			Please refer to www.iras.gov.sg for more information.
									<br>This Stamp Duty together with the ABSD & Setup Cost will form part of the Trust’s asset, to be straight-line depreciated over the tenure of the investment and reflected in calculation of monthly NAV."><i class="fa fa-info-circle" aria-hidden="true"></i>
										</span></li>
				          			<li>Additional Buyer Stamp Duty <span>(<?=$absd_p?>)</span>
				          			<span rel="tooltip" title="Additional Stamp Duties (ABSD) is a tax charged by the Inland Revenue Authority of Singapore on Property Transactions as referred to entities buying any residential property.<br>Please refer to www.iras.gov.sg for more information.<br>This ABSD together with the Stamp Duty & Setup Cost will form part of the Trust’s asset, to be straight-line depreciated over the tenure of the investment and reflected in calculation of monthly NAV."><i class="fa fa-info-circle" aria-hidden="true"></i></span><br><a href="javascript:void(0);" data-open="adv_box_modal"> <span>What is this</span></a></li>
				          			<li>Cash Reserve <span>(<?=$cash_p?>)</span><span rel="tooltip" title="The Trust keeps <?=$cash_p?> of the Property Value as cash reserve in order to maintain the upkeep of the Property which may include incidental repairs/upgrades or for contingency expenses during a time when the Property remains vacant.<br>Future rental income will increase this Cash Reserve and excesses above <?=$cash_p?> shall be paid to investors on a quarterly basis. <br>The Cash Reserve forms part of the Trust’s asset and always included in the calculation of monthly NAV."><i class="fa fa-info-circle" aria-hidden="true"></i></span></li>
				          			<li>Setup Cost <span>(<?=$setup_p?>)</span><span rel="tooltip" title="<?=$setup_p?> of the Property Value is collected to meet costs associated with the Property Transaction and Trust expenses at the initial phase.<br>This Setup Cost together with the Stamp Duty & ABSD will form part of the Trust’s asset, to be straight-line depreciated over the tenure of the investment and reflected in calculation of monthly NAV."> <i class="fa fa-info-circle" aria-hidden="true"></i></span></li>
				          		</ul>
				          		<ul class="ul-bold">
				          			<li>&#36; <?=$property_value?></li>
				          			<li>&#36; <?=$bsd?></li>
				          			<li>&#36; <?=$absd?></li>
				          			<li class="cus-pd">&#36; <?=$cash?></li>
				          			<li class="cus-pd">&#36; <?=$setup?></li>
				          		</ul>
				          		<br clear="all">
				          		<div class="alter-font">
				          			<ul class="total-invt">
				          				<li>Total Investment <span>(100%)</span></li>
					          		</ul>
					          		<ul class="total-value">
				          				<li>&#36; <?=$invested_amount?></li>
					          		</ul>
					          		<br clear="all">
				          		</div>
				          		<ul class="current-cb">
				          			<li>Current Credit Balance</li>
				          			<li>Credit Balance After Deduction</li>
				          		</ul>
				          		<ul class="ul-bold">
				          			<li>&#36; <?=$balance?></li>
				          			<li>&#36; <?=$balance_remain?></li>
				          		</ul>
				          		<br clear="all">
							</div>
				        </div>
				        
		      		</div>
		      	</div>
		      </div> 
		      <div class="row">
		      	<div class="btns-holder">
					<button type="button"><a class="blue-rectangle-btn" href="<?=site_url('property-details/' . $property_id)?>">Cancel</a></button>
					<button type="submit"><a class="blue-rectangle-btn" >Place Order</a></button>
		      	</div>
		      </div>
		 </form><!--home-body-container-->
  </div>

  	<div class="large-7 small-12 medium-8 align-center reveal-modal" id="adv_box_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  	<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
  		<div class="popup-container">
		 	<div class="row">
		 		<div class="small-12 medium-12 columns no_padding">
		 			<div class="text-center">
		 				<h3 class="common-h3">Our Advantage!</h3>
		 				<p class="adv_info">Investment Outcome after consideration of both BSD/ABSD and SSD vs MicroProperties </p>
		 			</div>
		 			<div class="what-is-this-table">
		  				<div class="ovf-x">
		  					<table>
						  <thead>
						    <tr>
						      <th width="100"></th>
						      <th>Y1</th>
						      <th>Y2</th>
						      <th>Y3</th>
						      <th>Y4</th>
						      <th>Y5</th>
						      <th>Y6</th>
						      <th>Y7</th>
						      <th>Y8</th>
						      <th>Y9</th>
						      <th>Y10</th>
						      <th>...</th>
						      <th>Y15</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<tr> <td colspan="13" class="uppercase">Stamp Duties under current Tax Regime</td></tr>
						    <tr>
						      <td>BSD</td>
						      <td>4%</td>
						      <td class="img-ct"><img src="<?php echo base_url('assets/frontend/images/red-ct.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-1"><img src="<?php echo base_url('assets/frontend/images/red-ct-arrow.png');?>"></td>
						    </tr>
						    <tr>
						      <td>ABSD<br><small><em>(2<sup>nd</sup> Property)*</em></small></td>
						      <td>12%</td>
						      <td class="img-ct"><img src="<?php echo base_url('assets/frontend/images/red-ct.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-1"><img src="<?php echo base_url('assets/frontend/images/red-ct-arrow.png');?>"></td>
						    </tr>
						    <tr>
						      <td>SSD</td>
						      <td>12%</td>
						      <td>8%</td>
						      <td>4%</td>
						      <td>0%</td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-0"><img src="<?php echo base_url('assets/frontend/images/red-ct-alt.png'); ?>"></td>
						      <td class="img-ct-1"><img src="<?php echo base_url('assets/frontend/images/red-ct-arrow.png');?>"></td>
						    </tr>
						    <tr>
						      <td>Total Stamp Duties Paid</td>
						      <td>28%</td>
						      <td>24%</td>
						      <td>20%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>16%</td>
						      <td>...</td>
						      <td>16%</td>
						    </tr>
						    <tr>
						     	<td colspan="13">* A Singaporean Citizen making a 2<sup>nd</sup> private residential property purchase for investment</td>
						    </tr>
						    <tr>
						     	<td colspan="13" class="uppercase">MicroProperties Amortisation</td>
						    </tr>
						    <tr>
						     <td>Armotised Tax</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>1.9%</td>
						      <td>...</td>
						      <td>1.9%</td>
						    </tr><tr>
						      <td>Total Stamp Duties Paid</td>
						      <td>1.9%</td>
						      <td>3.9%</td>
						      <td>5.8%</td>
						      <td>7.7%</td>
						      <td>9.7%</td>
						      <td>11.6%</td>
						      <td>13.5%</td>
						      <td>15.5%</td>
						      <td>17.4%</td>
						      <td>19.3%</td>
						      <td>...</td>
						      <td>29%</td>
						    </tr>
						  </tbody>
						</table>
		  				</div>
  					</div> 
		 			
		 			<div class="bg-f4 adv">
		 				<div class="adv_list_holder">
		 					<ul class="adv_list">
							<li> Above comparison is based on the scenario a Singapore Citizen making a 2<sup>nd</sup> private residential property purchase for investment under current Buyer Stamp Duties, Additional Buyer Stamp Duties & Seller Stamp Duties rules. Actual outcome with cost amortization on your investment held at the MicroProperties Platform varies with your investment horizon and liquidity on secondary market participation.</li>

							<li>As your tax status may be different from others, we strongly encourage that your seek your own professional advice</li>
							</ul>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div><!--popup-container-->
  	</div>
  
 <div class="checkout-footer">
 	<div class="custom-pd">
 		<div class="list-holder">
	 		<ul>
	 			<li><a href="<?php echo site_url('terms-of-use');?>">Terms of use</a></li>
	 			<li><span class="point"></span></li>
	 			<li><a href="">Privacy Policy</a></li>
	 		</ul>
 		</div>
	 	<div class="copyright">
	 		&copy;2018 <span>MICROPROPERTIES</span>. All Rights Reserved.
	 	</div>
 	</div>
 </div>
</body><!--body-->
<?php include("includes/scripts.php"); ?>