
<?php include("includes/header.php"); ?>
	<?php include("includes/menu.php"); ?>

	<style>
	
		#property_description{
			text-align: justify;
			text-indent: 50px;
		}

		.overlays{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 10;
			background-color: rgba(244,244,244, 0.95);

		}

		.threesixty-view{
			position: absolute;
			bottom: 0;
			left: 65px;
			display: inline-block;
			font-weight: bold;
			font-size: 14px;
			z-index: 999;
			color: #00c0f3!important;
			background: none!important;
		}

	</style>

	<!--carousel-->
	<div class="owl-carousel owl-theme">
		<?php  
		if (!empty($images)) 
		{	

			usort($images, function($a, $b){
				return $a->sort_order > $b->sort_order;
			});
			foreach ($images as $image){		
		?>
				<div class="item"><img src="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>"></div>
			<?php } ?>
		<?php 
		}
		else 
		{
		?>
			<div class="item"><img src=""></div>
		<?php 
		} 

		?>
	</div>

   <!--<div class="customNavigation">
				<a class="btn-prev prev">Previous</a>
				<a class="btn-next next">Next</a>
	</div> -->
   <!--  <div class="carousel-property-details">
		<div class="slide"><img src="images/property-details-01.jpg"></div>
		<div class="slide"><img src="images/property-details-02.jpg"></div>
		<div class="slide"><img src="images/property-details-03.jpg"></div>
		<div class="slide"><img src="images/property-details-04.jpg"></div>
	</div>
	<div class="carousel-property-details-controls">
		<span id="property-details-slider-prev"></span>
		<span id="property-details-slider-next"></span>
	</div>-->
	<div class="cta-view-gallery">
		<div>
			<i class="fa fa-arrows-alt" aria-hidden="true"></i>
			<p>View Gallery</p>
		</div>
	</div>
	<!--carousel-->
	<div class="property-individual-details yes_padding">
		<div class="row">
			<div class="small-12 medium-10 align-center">
				<div class="row">
					<div class="large-12 columns padtb-10">
						<a href="<?php echo base_url() ?>properties" class="cta-link"><i class="fa fa-arrow-left"></i> BACK TO LISTING</a>
					</div>
				</div>
				<div class="clearfix">  
					<div class="small-12 medium-8 columns">
						<!--loop-->
						<div class="property-details">
							<a href="javascript:void(0);">
								<div class="property-image">
									<div class="progressbar-container">
										<div class="progress-inner">
											<div class="property circle" data-value="0.9" data-size="75" data-thickness="10">
												<strong></strong>
											</div>
										</div>
										<div class="progress-type">Purchased</div>
									</div>
								</div>
								<div class="property-name">
									<h2><?php echo $property->property_name; ?></h2>
								</div>
								<div class="property-address">
									<i class="fa fa-map-marker"></i> <span> <?php echo $property->address; ?></span>
								</div>
								<div class="property-date property-two-col">
									<div class="list-date padtb-10">
										Listed on <strong><?php echo date("Y-m-d" ,strtotime($property->listed_at)); ?></strong>
									</div> 
									<div class="list-id padtb-10">
									   Listing ID <strong><?php echo $property->listing_id; ?></strong>
									</div>
								</div>
								<div class="cta-details">
									<?php 
									$tags = explode(',', $property->tags);
									foreach ($tags as $tag): 
									?>
										<a href="javascript:void(0);" class="cta-rounded-outline"><?php echo $tag; ?></a>
									<?php 
									endforeach; 
									?>
								</div> 
								<div class="clearfix"></div>
								<div class="property-list-profile clearfix text-center">
									<div class="dashed-divider mt-10 mb-0"></div>
									<div class="row">
										<div class="medium-12 small-12 columns">
											<div class="property-data">
												<p><?php echo number_format($property->property_size); ?><br/><span>SQ. FT.</span></p>
											</div>
											<div class="property-data">
												<p><?php echo $property->bedrooms; ?><br/> <span>Bedrooms</span></p>
											</div>
											<div class="property-data">
												<p><?php echo $property->baths; ?><br/> <span>Baths</span></p>
											</div>
											<div class="property-data">
												<p><?php echo $property->top; ?><br/> <span>Top Year</span></p>
											</div>
											<div class="property-data">
												<p><?php echo number_format($rental, 2) ?>%<br/> <span>Gross Rental</span></p>
											</div>
										</div>
									</div>
									<div class="dashed-divider mt-0 mb-10"></div>
								</div>
								<div class="property-description">
									<p id="property_description"><?php echo $property->property_description; ?></p>
									<!-- <p id="elipses">...</p>
								
									<p><a href="javascript:void(0);" class="cta-link mt-10 mb-10" id="read-more"><i class="fa fa-plus"></i> READ MORE</a></p> -->
								</div>
								<div class="dv-details mt-10"> 
									<div class="dashed-divider mt-20 mb-20"></div>
									<h6>Development Details</h6>
									<div class="property-dev-details property-two-col">
										<!--div class="">
											Floor size: <strong>1,394 sq.ft.</strong> <br>
											Floor level: <strong>High Floor</strong> <br>
											Furnishing: <strong>Fully furnished</strong> <br>
										</div> 
										<div class="">
										   Developer: <strong>Lucky Pinnacle Pte Ltd</strong> <br>
										   Tenure: <strong>3% Rental</strong> <br>
										   TOP: <strong>2007</strong> <br>
										</div-->
										<div class="">
											Tenancy Term: <strong><?php echo $property->years ?> years</strong> <br>
											Furnishing: <strong><?php echo $property->furnishing ?></strong> <br>
											Strata Fee: <strong><?php echo number_format($property->strata_fee) ?> Per Month</strong> <br>
										</div> 
										<div class="">
											Developer: <strong><?php echo $property->developer ?></strong> <br>
											Tenure: <strong><?php echo $property->tenure ?></strong> <br>
											Floor Level: <strong><?php echo $property->floor_level ?></strong> <br>
										</div> 
									</div>
								</div>
							</a>
						</div>
						<!--loop-->
					</div>
					<div class="small-12 medium-4 columns">
						<div class="property-form clearfix">
							<div class="property-icon-list property-two-col clearfix">
								<div class="text-center">
									<a class="cta-link cta-sm <?=($property->is_watchlist) ? 'unwatchlist' : 'watchlist'?>">
										<i class="fa fa-map-pin"></i> <span class="watchlist-text"><?=($property->is_watchlist) ? 'Remove to watchlist' : 'Add to watchlist'?></span>
									</a>
								</div>
								<div class="text-center">
									<a href="javascript:void(0);" class="cta-link cta-sm" data-open="prompt-share">
										<i class="fa fa-share-alt"></i> Share
									</a>
								</div>
							</div>
							<div class="right-price-list text-center clearfix">

								<div class="small-6 medium-6 columns">
									<p><span>Asking Price</span></p>
									<p>
									 $<?php echo number_format($property->property_price); ?>
									<!-- <?php// echo @$property_valuation[0]->value; ?> -->
									</p>
									<p><span><em>Excludes tax and charges</em></span></p>
								</div>
								<div class="small-6 medium-6 columns">
									<p><span>Price / SQ. FT.</span></p>
									<p>$<?php echo number_format($property->sqft); ?></p>
									<p><span style="font-size:9px;">Price round to nearest $</span></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<form style="position:relative;">
								<?php if(!$this->session->userdata("user_id")): ?>
								<div class="overlays">
									<div class="v_center_wrap">
										<div class="v_center">
											<a href="<?php echo site_url('login');?>">Login</a> or <a href="<?php echo site_url('register');?>">Register</a><br>
											to start on this investment.
										</div>
										
									</div>
								</div>
								<?php endif; ?>
								<div class="medium-6 small-5 columns">
									<div class="property-details circle text-center" data-value="0.9" data-size="100" data-thickness="5" id="detail-funding">
										<strong></strong>
									</div>
								</div>
								<?php if(!empty($trust_account)): ?>
								<div class="medium-6 small-7 columns">
									<div class="property-size-text">
										<span>Investment Status</span>
										<p><?= count($investment) ?> <span>investors</span></p>
										<p><?php echo $trust_account->units_issued - $total_order->units_invested;?> <span>units left to completion</span></p>
									</div>
								</div>
								<?php endif; ?>
								<?php if(!$has_investment): ?>
								<div class="clearfix"></div>
								<div class="property-purchased text-center">
									<div>Start on this investment</div>
									<div class="unit-cluster">
										<div>
											<input type="text" id="sliderOutput1">
										</div>
										<div>
											units =
										</div>
										<div>
											<div class="amount-box amount-medium">
												<span class="cur">$</span>
												<span class="balance_amount"></span>
											</div>
										</div>  
									</div> 
								</div>
								<!-- <?php echo $units_issued - $total_order->units_invested;?> (33/100) * -->
								<div class="postlog-slider">
									<div class="invest-units-slider">
										<div class="slider" data-slider data-start="1" data-initial-start="1" data-end="<?= $investment_limit ?>" data-step="1">
										  <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
										  <span class="slider-fill" data-slider-fill></span>
										</div>
									</div>
								</div>
								<?php if($this->session->flashdata('message')): ?>
									<div class="error_msg insufficient_error">
										<?=$this->session->flashdata('message')['message']?>
									</div>
								<?php endif; ?>
								<?php endif; ?>
								<div class="property-account-link cta-inline" style="padding: 10px; font-size: 9pt;">
									<?php if($has_investment): ?>
										<a href="<?=site_url('orders')?>" class="cta-btn cta-invest blue-rectangle-btn-wider">Go to My Orders<i class="fa fa-arrow-right"></i></a>
									<?php else: ?>
										<a href="<?=($this->session->userdata('user_id') ? 'javascript:void(0)' : site_url('login'))?>" class="cta-btn cta-invest blue-rectangle-btn-wider">Invest in this property <i class="fa fa-arrow-right"></i></a> 
									<?php endif; ?>
								</div>
							</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
	<div class="large-7 small-12 medium-10 align-center reveal-modal" id="investor-declaration" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
		 <div class="popup-container">
			<div class="row">
				<div class="small-12 medium-12 columns">
					<h3 class="common-h3">Investor Declaration:</h3>
					<div id="investor-info-holder">
						<div class="investor-info" id="investor-info">
							<p>I/We acknowledge and agree:</p>
							<ol type="a">
								<li>That I/ we have carefully and fully read all the Trust documents including the Term Sheet and that I/we fully understand their contents and the risks described therein at the time of application and am/are willing to accept that holding Units in the Trust is subject to investment risk, including possible delays in repayment; loss of income and principal invested.</li>
								<li>That I/we shall be bound by the terms of the Term Sheet with respect to my/our unitholding by this application.</li>
								<li>To be bound by the terms of the Trust Deed governing the Master Trust and Sub-Trusts as amended.</li>
								<li>That the Trustee, the Investment Manager or their affiliates, subsidiaries or associates shall hereby be held harmless and indemnified by the undersigned against any loss arising as a result of a failure to process the application, if any information requested has not been provided by the undersigned.</li>
								<li>That I/we have such knowledge and experience in financial and business matters or we have obtained advice from a financial advisor such that I am/we are capable of evaluating the merits and risks of my/our acquisition of the Units.</li>
								<li>That neither the performance of the Trust, nor any particular return from, or any repayment of capital invested in, the Trust is guaranteed by the Trustee or the Investment Manager, any of their subsidiaries or any other person or organisation.</li>
								<li>To not offer, sell or deliver any of such Units directly or indirectly to a U.S. Person or to a Person who is not an Eligible Investor.</li>
								<li>That I/we have the right and authority to make the investment pursuant to this Application Form whether the investment is my/our own name or is made on behalf of another person whether natural or legal or body or association of persons and that I / we am/are not in breach of any laws or regulations of any competent jurisdiction and I/we hereby indemnify the Trustee, the Investment Manager and any third party administrator for any loss suffered by them as a result of this warranty /representation not being true in every respect.</li>
								<li>To provide such confirmations and representations to any third-party administrator as they may from time to time request and to provide on request such certificates, documents or other evidence as they may reasonably require to substantiate such confirmations and representations.</li>
							</ol>
						</div>
					</div>
					
					<p class="dl-link">Download Subscription Agreement <a href="<?=site_url('docs/Subscription_Agreement.docx')?>">here</a></p>
					<p class="applicant-msg">By typing my name below, I acknowledge my receipt and review of, and agreement to the above document</p>
					<div class="error_msg applicant_msg"></div>
					<div class="medium-4 applicant">
						<input type="text" id="name" name="name" placeholder="Enter applicant name" style="text-transform:uppercase"/>
					</div>
					<div class="property-account-link cta-inline">
						<button class="cta-btn cta-confirm cursor-pointer" data-close>Don't Acknowledge</button>
						<button class="cta-btn cta-confirm cursor-pointer cta-confirm-btn cta-ack" id="acknowledge">Acknowledge</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="reveal-modal" id="purchase_box_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="confirm-purchase-box">
			<?=form_open('transaction/action/check_investment/' . $this->uri->segment(2), ['class' => 'row'])?>
			<input type="hidden" name="units" value="1">
			<div class="small-12 medium-10 large-7 align-center pop-up-white">
					<div class="row flex-style">
						<div class="small-12 medium-6 columns left-ppt">
							<img src="<?php echo base_url("uploads/images/full") . '/' . @$images[0]->filename; ?>">
						</div>
						<div class="small-12 medium-6 columns pt-10">
							<div class="confirm-info">
								<h3>Confirm Purchase</h3>
								<div class="cf-ppt-address">
									<h5><?php echo $property->property_name; ?></h5>
									<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $property->address; ?></p>
								</div>
							</div>
							<div class="charges-container">
								<div class="bg-f4">
									<span class="unit-count">2</span> units = <sup>&#36;</sup> <span class="per-unit">40,000</span>
								</div>
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
	<!-- <div class="property-list-container"> -->
	<div class="row">
		<div class="medium-12 columns">
			<div class="dashed-divider mt-20 mb-20"></div>
		</div>
	</div>
	<div class="property-individual-details">
		<div class="row">
			<div class="small-12 medium-11 align-center">
				<ul class="tabs" data-tabs id="example-tabs">
					<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Last Transaction Price</a></li>
					<li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">Price Trends</a></li>
					<li class="tabs-title"><a data-tabs-target="panel3" href="#panel3">Capital Gain</a></li>
					<li class="tabs-title"><a data-tabs-target="panel4" href="#panel4">Rental Yield</a></li>
				</ul>
				<div class="tabs-content" data-tabs-content="example-tabs">
					<div class="tabs-panel is-active" id="panel1">
						<div class="property-chart" id="chartContainer"></div>
					</div>
					<div class="tabs-panel" id="panel2">
						<div class="property-chart" id="chartContainer2"></div>
					</div>
					<div class="tabs-panel" id="panel3">
						<div class="property-chart" id="chartContainer3"></div>
					</div>
					<div class="tabs-panel" id="panel4">
						<div class="property-chart" id="chartContainer4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>  
	<div class="google-maps">
		<!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8121432663265!2d103.8523073503161!3d1.2867891990568687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19085926dadb%3A0x9f427391c9f64c38!2sMerlion!5e0!3m2!1sen!2ssg!4v1493572722041"
			width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe-->
		<?php
		echo '<iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace("
		,", "", str_replace(" ", "+", $property->address)) . '&z=14&output=embed" width="600" height="450" frameborder="0"
		style="border:0" allowfullscreen></iframe>';
		?>
	</div>
	<div class="property-individual-details full-width">
		<div class="row">
			<div class="large-11 medium-11 small-12 align-center">
				<div class="property-list-title text-center">
					<h1>Properties nearby</h1>
				</div>
				<div class="row no-margin">
					<?php foreach ($nearby as $rand_property): ?>
						<?php
						if (!empty($rand_property->images) && $rand_property->images !== "null"){
							$rand_images = $rand_property->images;
							foreach($rand_images as $img){
								if($img->is_default == 1){
									$rand_image = $img->filename;
								}else{
									$rand_image = $rand_images[0]->filename;
								}
							}

						} else{
							$rand_image = '';
						}
						?>
						<div class="large-3 medium-6 small-12 columns">
							<div class="property-wrapper">
								<div class="property-img"><img src="<?= base_url() ?>uploads/images/full/<?php echo $rand_image; ?>"></div>
								<div class="property-name"><?php echo $rand_property->property_name; ?></div>
								<div class="property-address">
									<?php echo $rand_property->address; ?>
								</div>
								<div class="property-description clearfix">
									<div class="row">
										<div class="medium-7 small-7 columns pdr">
											<p><?php echo number_format($rand_property->property_price, 2); ?> <br/> <span>Excludes tax and charges</span></p>
										</div>
										<div class="medium-5 small-5 columns no_padding">
											<div class="property-details circle text-center" data-value="<?=$rand_property->percent?>" data-size="75" data-thickness="10">
												<strong></strong>
											</div>
										</div>
									</div>
								</div>
								<div class="apartment-info">
									<ul class="clearfix">
										<li><?php echo number_format($rand_property->sqft); ?><br><span>SQ.FT</span></li>
										<li><?php echo $rand_property->bedrooms; ?><br><span>Bedroom</span></li>
										<li>$<?php echo number_format($rand_property->sqft, 2); ?><br><span>/SQ.FT</span></li>
									</ul>
								</div>
								<div class="property-btn text-center"><a href="<?php echo base_url() ?>property-details/<?php echo $rand_property->property_id ?>">view property</a><span class="fa fa-arrow-right"></span></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="small-12 medium-8 large-7 align-center reveal-modal" id="gallery_box" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="counting"><span class="current-no">1</span> of <span class="total-imgs">3</span></div>
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
		<div class="popup-container no_padding">
		   <div class="align-center">
			  
			  <!-- <div class="product-image-gallery ">
				<div class="imgs-holder"> --> -->

					<!--div class="case active-img">
						<div class="panorama round" style="width:100%;height:500px;padding:0px;background-color:transparent;">
							<div class="panorama-view" style="height: 500px;">
								<div class="panorama-container">
									<img id="main-product-image" src="images/demo500px.jpg" data-width="4077" data-height="500" alt="Panorama" class="pdp-product-image"/>
								</div>
							</div>
						</div>
					</div-->

					<!-- <?php if (!empty($images)) {
						foreach ($images as $key => $image) :

							if($key == 0){
								$active = 'active-img';
							}else{
								$active = '';
							}
					?>
							<div class="case <?php echo $active; ?>">
								<div class="panorama round" style="width:100%;height:500px;padding:0px;background-color:transparent;">
									<div class="panorama-view" style="height: 500px;">
										<div class="panorama-container">
											<img id="main-product-image" data-panorama="<?=$image->is_360?>" src="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>" data-width="4077"
												 data-height="500" alt="Panorama" class="pdp-product-image"/>
										</div>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
					<?php } ?>
				</div>
				<button class="prev-img"><span>Previous</span></button>
				<button class="next-img"><span>Next</span></button>
				 <div class="product-thumbs-wrapper" id="product-thumbs-wrapper">
					<div class="menu product-thumbs align-center clearfix">
						<?php if (!empty($images)) {
							foreach ($images as $key => $image) :

								if ($key == 0) {
									$active = 'active';
								} else {
									$active = '';
								}
						?>
								<div class="sim-thumb <?php echo $active; ?>" data-image="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>">
									<img src="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>" alt=""></div>
							<?php endforeach; ?>
						<?php } ?>
					</div>
				</div>
			  </div> -->
			  <!--product-image-gallery-->

			 <!-- Normal Image Gallery -->
			
			<div class="product-image-gallery normal-img-gallery">
				<div class="imgs-holder">
					<?php if (!empty($images)) {
						foreach ($images as $key => $image) :

							if($key == 0){
								$active = 'active-img';
							}else{
								$active = '';
							}
					?>
							<?php if($image->is_360 == 0): ?>
								<style>
									div.panorama-container[style]
									{
										width: 100%!important;
									}
									img#main-product-image[style]{
										width: 100%!important;
									}
								</style>
							<?php endif; ?>

							<div class="case <?php echo $active; ?>">
								<div class="panorama round" style="width:100%;height:500px;padding:0px;background-color:transparent;">
									<div class="panorama-view" style="height: 500px;">
										<div class="panorama-container">	
												<img id="main-product-image" data-panorama="<?=$image->is_360?>" src="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>" data-width="4077"
												 data-height="500" alt="Panorama" class="pdp-product-image"/>
										</div>
									</div>
								</div>
							</div>
							
						<?php endforeach; ?>
					<?php } ?>
				</div>
				<button class="prev-img"><span>Previous</span></button>
				<button class="next-img"><span>Next</span></button>
				<div class="product-thumbs-wrapper" id="product-thumbs-wrapper">
					<div class="menu product-thumbs align-center clearfix">
						<?php if (!empty($images)) {
							foreach ($images as $key => $image) :

								if ($key == 0) {
									$active = 'active';
								} else {
									$active = '';
								}

								if($image->is_360 == 1){
									$class_360 = "three-sixty";
								}else{
									$class_360 = '';
								}
						?>
								
								<div class="sim-thumb <?php echo $active; ?> <?=$class_360?>" data-panorama="<?=$image->is_360?>" data-image="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>">
									<img src="<?php echo base_url("uploads/images/full") . '/' . $image->filename; ?>" alt="">
									<?php if($image->is_360 == 1): ?>					
										<a href="<?=$image->link?>" class="threesixty-view" target="_blank">View as 360</a>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						<?php } ?>
					</div>
				</div>
			  </div> 

			  <!--product-image-gallery-->
			   <!--End of Normal Image Gallery -->

			</div>
		 </div><!--popup-container-->
	</div>
	<!--body-->

	<div class="large-7 small-12 medium-10 align-center reveal-modal" id="prompt-share" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" style="display: none;">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
		<div class="popup-container">
			<div class="row">
				<div class="small-12 medium-12 columns no_padding">
					<h3 class="common-h3 text-center" id="prompt-title">Share</h3>
					<div id="share-container" class="text-center">
						
					</div>  
				</div><!--row-->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<?php include("includes/footer.php"); ?>

	<?php include("includes/scripts.php"); ?>
<script>
	 $(window).load(function(){
            $('.cta-view-gallery').click(function() {
                $('#gallery_box').foundation('open');	
                if($("#gallery_box").length != 0){
                     var width = 0;
                     $("div.sim-thumb").each(function() { 
                       width += $(this).outerWidth() + 7;
                    });
                    console.log(width);
                       $('.product-thumbs').css('width', width);
                      new PerfectScrollbar('#product-thumbs-wrapper');
                    }
            });
      });
	var watchlist_flag = true;
	const total_percentage = <?=$percentage?>;

	$('.property-details.circle').circleProgress({
		startAngle: -Math.PI / 4 * 2,
		value: total_percentage,
		fill: {
			gradient: ['#ec3a2a', '#fedd06'],
			gradientAngle: Math.PI / 4
		},
		lineCap: "round"
	}).on('circle-animation-progress', function (event, progress, stepValue) {
		$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
		//$(this).find('strong').html(percentage + '<sup>%</sup><span class="funded">FUNDED</span>');


	});

	// slider move event
	$('.postlog-slider .slider').on('moved.zf.slider', function(){
	
		var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
		var price_per_unit = <?php echo @$trust_account->price_per_unit; ?>;
		
		var total_price = <?php echo @$trust_account->price_per_unit * @$trust_account->units_issued ?>;
		// (33/100) * 

		// if(unit * price_per_unit >  (33/100) * total_price){
		// 	return;
		// }
		// console.log(33/100 * (unit * price_per_unit) > total_price);
		
		$(".balance_amount").text((unit * price_per_unit).toFixed(2)).digits();

		var total = <?= $units_issued ?>;
		var detail_funding_total = unit / total;

		var val = Number(detail_funding_total).toFixed(4);

		$('#detail-funding').circleProgress('value', + val + total_percentage);
	});

	$('.cta-invest').on('click',function(e){
		var units = $('#sliderOutput1').val();
		var unitPrice = $('.amount-medium .balance_amount').html();

		$('#purchase_box_modal [name=units]').val(units);
		$('.bg-f4 .unit-count').html(units);
		$('.bg-f4 .per-unit').html(unitPrice);
	})

	$(document).on('click', '.watchlist', function() {
		var id = <?php echo $this->uri->segment(2)?>;
		var that = $(this)
		that.find('.watchlist-text').text('Remove to watchlist');

		if(watchlist_flag) {
			watchlist_flag = false;
		
			$.ajax({
				url: '<?=site_url('PropertyListing/action/add_to_watchlist')?>/' + id,
				type: 'POST',
				data: {
					'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
				},
				success: function(res) {
					if(res.success) {
						watchlist_flag = true;
						that.removeClass('watchlist')
						that.addClass('unwatchlist')
					} else {
						that.find('.watchlist-text').text('Add to watchlist');
					}
				},
				error: function(msg) {
					that.find('.watchlist-text').text('Add to watchlist');
				}
			})
		}
	});

	$(document).on('click', '.unwatchlist', function() {
		var id = <?php echo $this->uri->segment(2)?>;
		var that = $(this)
		that.find('.watchlist-text').text('Add to watchlist');

		if(watchlist_flag) {
			watchlist_flag = false;
		
			$.ajax({
				url: '<?=site_url('PropertyListing/action/remove_to_watchlist')?>/' + id,
				type: 'POST',
				data: {
					'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
				},
				success: function(res) {
					if(res.success) {
						watchlist_flag = true;
						that.removeClass('unwatchlist')
						that.addClass('watchlist')
					} else {
						that.find('.watchlist-text').text('Remove to watchlist');
					}
				}
			})
		}
	});

	$("#share-container").jsSocials({
		showCount: false,
		showLabel: true,
		shares: [
			"twitter",
			{ share: "facebook", label: "Share" },
			"linkedin",
		]
	});

	$('.cta-invest').click(function() {
		$('#investor-declaration').foundation('open');
		$(".applicant input").removeClass("red-border");
		 $(".applicant input").val("");
		//$('#purchase_box_modal').foundation('open')
	})
	
	$('a.cta-confirm-btn').click(function() {

		var applicant_name = $("#name");
		
		
		// $('#purchase_box_modal').foundation('open')
	})


	$('.cta-ack').click(function() {
		//$('#investor-declaration').foundation('close')
		var applicant_name = $(".applicant input").val().replace(/\s/g, "");	
		var current_user = "<?php echo isset($current_user->first_name) && isset($current_user->last_name) ? $current_user->first_name.$current_user->last_name : "" ?>";
		
		//console.log(current_user);
		if(applicant_name == "" ){
			$(".applicant input").addClass("red-border");
		}
		
		if(applicant_name.toLowerCase() == current_user.toLowerCase().replace(/\s/g, "")){
			$(".applicant input").removeClass("red-border");
			$('#purchase_box_modal').foundation('open');
		}else{
			$(".applicant_msg").html("<p>Please enter your first name followed by your last name without spacing e.g. BOBBYTAN</p>");
		}
	})

	// $('#name').on('change', function(e){
	// 	//val.replace(/\s/g, '')
	// 	console.log(1);
	// });
	// function RestrictSpace() {
	// 	if (event.keyCode == 32) {
	// 		return false;
	// 	}
	// }

	$('#name').keypress(function(event){
		if (event.keyCode == 32 || event.which == 32) {
			return false;
		}
	});


	// $('.applicant input').on('keyup', function() {
	// 	if($(this).val().length > 0) {
	// 		$('.cta-ack').prop('disabled', false)
	// 	} else {
	// 		$('.cta-ack').prop('disabled', true)
	// 	}
	// });

	

</script>

<script type="text/javascript">
	if ($('#chartContainer').length > 0) {


		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				exportEnabled: true,
				title: {
					text: ""
				},
				axisX: {
					title: "TIME",
					titleFontColor: "#999"
					//minimum: new Date(2009,0),
					//maximum: new Date(2018,0)

				},
				axisY: {
					title: "yield (%)",
					titleFontColor: "#999",
					includeZero: false

					// minimum: 3.8,
					// minimum: 4,
				},
				data: [
					{
						type: "area",
						color: "rgba(0,159,257,0.6)",
						dataPoints: <?php echo $data_points; ?>
					}
				]
			});
			chart.render();

			var chart = new CanvasJS.Chart("chartContainer2", {
				title: {
					text: ""
				},
				data: [
					{
						type: "splineArea",
						dataPoints: [
							{x: new Date(2009, 0), y: 2506},
							{x: new Date(2010, 0), y: 2798},
							{x: new Date(2011, 0), y: 3386},
							{x: new Date(2012, 0), y: 6944},
							{x: new Date(2013, 0), y: 6026},
							{x: new Date(2014, 0), y: 2394},
							{x: new Date(2015, 0), y: 1872},
							{x: new Date(2016, 0), y: 2140},
							{x: new Date(2017, 0), y: 7289}
						]
					}
				]
			});
			chart.render();

			var chart = new CanvasJS.Chart("chartContainer3", {
				title: {
					text: ""
				},
				data: [
					{
						type: "splineArea",
						dataPoints: [
							{x: new Date(2009, 0), y: 2506},
							{x: new Date(2010, 0), y: 2798},
							{x: new Date(2011, 0), y: 3386},
							{x: new Date(2012, 0), y: 6944},
							{x: new Date(2013, 0), y: 6026},
							{x: new Date(2014, 0), y: 2394},
							{x: new Date(2015, 0), y: 1872},
							{x: new Date(2016, 0), y: 2140},
							{x: new Date(2017, 0), y: 7289}
						]
					}
				]
			});
			chart.render();

			var chart = new CanvasJS.Chart("chartContainer4", {
				title: {
					text: ""
				},
				data: [
					{
						type: "splineArea",
						dataPoints: [
							{x: new Date(2009, 0), y: 2506},
							{x: new Date(2010, 0), y: 2798},
							{x: new Date(2011, 0), y: 3386},
							{x: new Date(2012, 0), y: 6944},
							{x: new Date(2013, 0), y: 6026},
							{x: new Date(2014, 0), y: 2394},
							{x: new Date(2015, 0), y: 1872},
							{x: new Date(2016, 0), y: 2140},
							{x: new Date(2017, 0), y: 7289}
						]
					}
				]
			});
			chart.render();
		}
	}
	
	$(function(){
		//console.log($("#property_description").height());
	
		// $("#read-more").on("click", function(){
		// 	if($("#property_description").height() == 50){
		// 		$("#property_description").css("height", "auto");
		// 		$(this).text("READ LESS");
		// 		$("#elipses").hide();
		// 	}else{
		// 		$("#property_description").css("height", "50px");
		// 		$(this).text("READ MORE");
		// 		$("#elipses").show();
		// 	}
		// });
		
	
		$("#property_description").collapser({
			mode: 'words',
			truncate: 75,
			showText: 'Show more',
			hideText: 'Show less',
		});	
		new PerfectScrollbar('#investor-info-holder');
	});
	
</script>
</body>

</html>