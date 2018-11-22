<?php include("includes/header.php"); ?>
		<?php include("includes/menu.php"); ?>
		<div class="carousel" id="carousel">
		<div class="slides">
			<?php 
				foreach($featured_properties as $key => $property):
					
					$percentage = $this->Property_model->get_invesments_percent($property->property_id);
					if($percentage == NULL){
						$percent = 0;
					}else{
						$percent = $percentage / 100;
					}

					if (!empty($property->images) && $property->images !== "null"){
						$images = $property->images;

						foreach($images as $img){
							if($img->is_default == 1){
								$image = $img->filename; 
								break;
							}else{
								$image = $images[0]->filename;
							}
						}
					} else{
						$image = '';
					}

				
					if ($key === 0){
						$current = "slide-current";
					}else{
						$current = "";
					}
			?>
			<div class="slide <?php echo $current; ?>">
				<img src="<?=base_url() ?>uploads/images/full/<?php echo $image; ?>" style="max-height: 480px; min-height:480px;" class="feature_imgs">
				<div class="banner-details-wrap">
					<div class="banner-details">
						<div class="row">
							<div class="large-4 medium-4 small-4 columns">
								<div class="property-progress progress-inner">
						          <div class="property-home circle" data-value="<?=$percent?>" data-size="90" data-thickness="8">
						            <div><strong></strong></div>
						          </div>
			       				</div>
							</div>
							<div class="large-8 medium-8 small-8 columns">
								<div class="ppt-info-holder">
			       					<div class="property-name">
									<h2><?=$property->property_name; ?></h2>
									<span class="dp-block address"><?=$property->address?></span>
									<div class="ppt-value">
										<h3>$<?=number_format($property->property_price, 2)?></h3>
										<span class="dp-block txc">Exclusive of taxes and charges</span>
									</div>
									</div>
									<div class="info-total">
										<ul>
											<li><a><?=number_format($property->property_size); ?><br><span>SQ.FT.</span></a></li>
											<li><a><?=$property->bedrooms; ?><br><span>Bedroom</span></a></li>
											<li><a>$<?=number_format($property->sqft); ?><br><span>/SQ.FT.</span></a></li>
											<br clear="all">
										</ul>
									</div>
									<div class="view-btn">
										<a href="<?=base_url()?>property-details/<?=$property->property_id; ?>" class="common-btn">View Property
										<span class="fa fa-arrow-right"></span></a>
									</div>
			       				</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<?php 
				endforeach;	
			?>


			
			
			<!-- <div class="slide">
				<img src="<?php// echo base_url('assets/frontend/images/slider02.jpg'); ?>">
				<div class="banner-heading"></div> 	
				<div class="banner-details clearfix">
					<div class="property-progress progress-inner">
			          <div class="property-home circle" data-value="0.8" data-size="90" data-thickness="8">
			            <div><strong></strong></div>
			          </div>
       				</div>
       				<div class="ppt-info-holder float-left">
       					<div class="property-name">
						<h2>SPARK Residence</h2>
						<span class="dp-block address">10 Gopeng Street, 078878 Chinatown</span>
						<div class="ppt-value">
							<h3>$3,875,400</h3>
							<span class="dp-block txc">Exclusive of taxes and charges</span>
						</div>
						</div>
						<div class="info-total">
							<ul>
								<li><a>2153<br><span>SQ.FT</span></a></li>
								<li><a>1<br><span>Bedroom</span></a></li>
								<li><a>$1,800<br><span>/SQ.FT</span></a></li>
								<br clear="all">
							</ul>
						</div>
						<div class="view-btn">
							<a href="#" class="common-btn">View Property
							<span class="fa fa-arrow-right"></span></a>
						</div>
       				</div>
					
				</div>
			</div>
			<div class="slide">
				<img src="<?php// echo base_url('assets/frontend/images/slider03.jpg'); ?>">
				<div class="banner-heading"></div>
				 
				<div class="banner-details clearfix">
					<div class="property-progress progress-inner">
			          <div class="property-home circle" data-value="0.8" data-size="90" data-thickness="8">
			            <div><strong></strong></div>
			          </div>
       				</div>
       				<div class="ppt-info-holder float-left">
       					<div class="property-name">
						<h2>WIND Residence</h2>
						<span class="dp-block address">10 Gopeng Street, 078878 Chinatown</span>
						<div class="ppt-value">
							<h3>$$3,875,400</h3>
							<span class="dp-block txc">Exclusive of taxes and charges</span>
						</div>
						</div>
						<div class="info-total">
							<ul>
								<li><a>2153<br><span>SQ.FT</span></a></li>
								<li><a>1<br><span>Bedroom</span></a></li>
								<li><a>$1,800<br><span>/SQ.FT</span></a></li>
								<br clear="all">
							</ul>
						</div>
						<div class="view-btn">
							<a href="#" class="common-btn">View Property
							<span class="fa fa-arrow-right"></span></a>
						</div>
       				</div>
				</div>
			</div> -->
			
			</div>
			
			<!-- <div class="reveal__holder">
				<div class="revealer__layer"></div>
			</div> -->
			<nav class="pagenav" id="pagenav">
				<button class="pagenav__button pagenav__button--cornertopleft" aria-label="Navigate top left" id="a"><svg class="icon icon--rtopleft"><use xlink:href="#icon-arrow"><svg id="icon-arrow" viewBox="0 0 39 51.43" width="100%" height="100%">
					<title>Arrow Left</title>
					<polygon points="7 25.71 36 45.71 36 26.08 36 5.71 7 25.71" stroke-miterlimit="10" stroke-width="6"></polygon><line x1="3" y1="5.71" x2="3" y2="45.71" fill="none" stroke-miterlimit="10" stroke-width="6"></line>
				</svg></use></svg></button>
				<button class="pagenav__button pagenav__button--cornertopright" aria-label="Navigate top right" id="b"><svg class="icon icon--rtopright"><use xlink:href="#icon-arrow"></use></svg></button>
				<button class="pagenav__button pagenav__button--cornerbottomleft" aria-label="Navigate bottom left" id="c" ><svg class="icon icon--rbottomleft"><use xlink:href="#icon-arrow"></use></svg></button>
				<button class="pagenav__button pagenav__button--cornerbottomright" aria-label="Navigate bottom right" id="d" ><svg class="icon icon--rbottomright"><use xlink:href="#icon-arrow"></use></svg></button>
			</nav>
		</div>
		<!-- <p id="cf7_controls">
			  <span class="selected">Image 1</span>
			  <span>Image 2</span>
			  <span>Image 3</span>
			</p> -->
		<!--carousel-->
		
		<div class="home">
			<!-- <div class="bg-rgba large-12 align-center">
			</div> -->
			<div class="row">
				<div class="large-8 medium-12 small-12 align-center">
					<div class="advanced-search layered">
						<div class="form-heading">
							<div class="form-title"> Accessible. Affordable. Available<span>Choose the properties you want now.</span></div>
							<!-- <a href="property-list.html" class="view-all"><span class="fa fa-eye"></span> View all</a> -->
						</div>
						<br clear="all">
						<div class="form">
							<div class="dropdown residential">
								<div class="dropdown-title">Theme <span class="selected-items"></span></div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:void(0);">Clear All</a>
									</div>
									<ul class="residential theme clearfix">
											<li>ALL</li>
											<li>Income</li>
											<li>Growth</li>
											<li>Entry</li>
											<li>Value</li>
											<li>Luxury</li>
											<li>New Release</li>
										</ul>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply themes-apply">Apply</a>
									</div>
								</div>
								<div class="dropdown-result residential annex"></div>
							</div>
							<div class="dropdown district">
								<div class="dropdown-title">District <span class="selected-items"></span></div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:void(0);">Clear All</a>
									</div>
									<div class="more">
										&#43;<?=count($districts) - 5?> more
									</div>
									<ul class="district clearfix">
										<li>All</li>
										<?php 
											$count = 0;
											foreach($districts as $district):
												$count++;
												if($count > 5){
													$vhide = "vhide";
												}else{
													$vhide = '';
												}
										?>
											<li class="<?=$vhide ?>"><?=$district->district_name; ?></li>
										<?php endforeach; ?>
									</ul>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply district-apply">Apply</a>
									</div>
								</div>
								<div class="dropdown-result district annex"></div>
							</div>
							<div class="dropdown price-picker">
								<div class="dropdown-title">Price</div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:void(0);">Clear All</a>
									</div>
									<div class="range-info">
										Move left or right to select the values you want.
									</div>
									<div class="range-container price">
										<div class="range-units"><span class="value-sgd">Valuation(SGD):</span><span class="range-min" id="price-range-min">1</span> &ndash; <span class="range-max" id="price-range-max">10,000+</span></div>

										<div class="range-bar">
											<input class="range-price-slider" type="hidden" value="1,900000"/>
										</div>
									</div>
									<div class="range-container price_per_sqft">
										<div class="range-units"><span class="value-sgd">Price/Sq.Ft.(SGD):</span><span class="range-min" id="psqft-range-min">1</span> &ndash; <span class="range-max" id="psqft-range-max">5,000</span></div>

										<div class="range-bar">
											<input class="range-price-sqft-slider" type="hidden" value="1,5000"/>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply price-apply">Apply</a>
									</div>
									<!-- <div class="range-cta price">
										<div class="range-cta-apply price">Apply</div>
										<div class="range-cta-clear price">Clear</div>
									</div> -->
								</div>
								<div class="dropdown-result price annex"></div>
							</div>
							<br clear="all">
							<div class="ppt-search">
								<button class="home-ppt-search-btn">Search Properties<span class="fa fa-arrow-right"></span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 
		<!--body-->
		<div class="row bg-grey">
			<div class="small-12 medium-11 large-11 align-center">
				<div class="home-body-container ">
					<div class="row relative pdbt_30 no-margin">
						<div class="large-3 medium-12 small-12 columns">
							<span class="home-body-left-tagline">
								How does MicroProperties create opportunities for you?
							</span>
							<div class="learn-more-btn">
								<a href="<?php echo site_url('about');?>" class="common-btn">Learn More
								<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>
						<div class="large-9 medium-12 small-12 columns">
							<div class="home-invest-grow-collect clearfix">
								<div class="igc-container invest">
									<div class="igc-img"><img src="<?php echo base_url('assets/frontend/images/invest.png'); ?>" /></div>
									<div class="igc-invest">
										<img src="<?php echo base_url('assets/frontend/images/flag1.png'); ?>" class="flag">
										<div class="igc-name">Invest</div>
										<div class="igc-details">See any properties you like? Great! Click “Buy” to start investing!</div>
									</div>
								</div>
								<div class="igc-container grow">
									<div class="igc-img"><img src="<?php echo base_url('assets/frontend/images/grow.png'); ?>" /></div>
									<div class="igc-grow">
										<img src="<?php echo base_url('assets/frontend/images/flag2.png'); ?>" class="flag">
										<div class="igc-name">Grow</div>
										<div class="igc-details">Invest in as many properties as you like and build your financial portfolio.</div>
									</div>
								</div>
								<div class="igc-container collect">
									<div class="igc-img"><img src="<?php echo base_url('assets/frontend/images/collect.png'); ?>" /></div>
									<div class="igc-collect">	
										<img src="<?php echo base_url('assets/frontend/images/flag3.png'); ?>" class="flag">
										<div class="igc-name">Earn</div>
										<div class="igc-details">Sell or rent, and collect your earnings!</div>
									</div>
								</div>
							</div>							
<!-- 							<div>
								<button class="home-start-now-button">Start Now <span class="fa fa-long-arrow-right"></span></button>
							</div> -->
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-12 medium-11 large-11 align-center">
				<div class="home-body-container-res">
					<div class="resource-title relative">
						<h3>Resources</h3>
						<div class="learn-more-btn">
								<a href="<?php echo site_url('faq');?>" class="common-btn">View More Resources
								<span class="fa fa-arrow-right"></span></a>
							</div>
					</div>
					<div class="row dotted-bg">
						<div class="medium-6 columns">
							<div class="row bg-green relative">
								<div class="medium-7 columns">
									<div class="relative article">
										<span class="date">
											20 November 2018
										</span>
										<div class="article-title">
											Singapore properties price<span class="em-light">1995-2018</span>
										</div>
										<div class="read-article-btn">
											<a class="common-btn watch" data-open="video-overlay">Watch
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
								<div class="medium-5 columns">
									<div class="article-img">
										<img src="<?php echo base_url('assets/frontend/images/gfx.png'); ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="center-white relative">
								<div class="article-info-text-wrap">
										<span class="date">
											29 October 2018
										</span>
										<div class="article-info-text">
											Taking out the guesswork properties, the winning asset class
										</div>
										<div class="read-article-btn">
											<a href="<?php echo base_url('assets/frontend/pdf/01-Properties-TheWinningAssetClass.pdf'); ?>" class="common-btn" target="_blank">Read Article
											<span class="fa fa-arrow-right"></span></a>
										</div>
								</div>
							</div>							
						</div>
						<div class="medium-3 columns">
							<div class="faq-holder bg-orange relative">
								<div>
									<h1>Frequently Asked Questions</h1>
									<p>Need us to clarify and answer some questions? Just click here.</p>
									<div class="learn-more-btn">
										<a href="<?php echo site_url('faq');?>" class="common-btn">Learn More
										<span class="fa fa-arrow-right"></span></a>
									</div>
								</div>
							</div>							
						</div>
						<div>
							
						</div>
					</div>
					<div class="completed-invest-holder">
						<div class="completed-invest-title relative">
							<!-- <h3>Completed Investments</h3> -->
							<h3>Hot Properties</h3>
							<div class="learn-more-btn">
								<a href="<?=site_url('properties')?>" class="common-btn">View More Hot Properties
								<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>
						<div class="row">
							<?php foreach($hots as $hot): 
								if (!empty($hot->images) && $hot->images !== "null"){
									$images = $hot->images;
									$image = $images[0]->filename;
					
								} else{
									$image = '';
								}
								?>
								<div class="large-3 medium-6 small-12 columns completed">
									<div class="invest-holder">
										<div class="apartment-img">
											<img src="<?=base_url() ?>uploads/images/full/<?php echo $image; ?>" alt="" />
										</div>
										<div class="apartment-descp">
											<div class="property-name">
												<h2><?=$hot->property_name?></h2>
												<!-- <span class="dp-block address"><?=$hot->address?></span> -->
											</div>
											<div class="property-address">
									             <?=$hot->address?>
									         </div>
											<div class="property-description clearfix">
												<div class="row">
													<div class="medium-7 small-7 columns">
														<div class="ppt-value">
															<span class="dp-block sold-at">Price</span>
															<!-- <span class="dp-block sold-at">Sold at</span> -->
															<h2><?=number_format($hot->property_price)?></h2>
														</div>
													</div>
													<div class="medium-5 small-5 columns no_padding funded">
														<div class="property-details property-details-<?php echo $hot->property_id; ?> circle text-center" data-value="<?=$hot->percent / 100?>" data-size="70" data-thickness="8">
															<strong></strong>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="apartment-info">
											<ul class="clearfix">
												<li><?= number_format($hot->property_size); ?><br><span>SQ. FT.</span></li>
												<li><?= $hot->bedrooms; ?><br><span>Bedroom</span></li>
												<li>$<?= number_format($hot->sqft); ?><br><span>/SQ. FT.</span></li>
											</ul>
										</div>
										<div class="ppt-view-btn-holder">
											<div class="ppt-view-btn">
												<a href="<?=site_url('property-details/' . $hot->property_id)?>" class="common-btn">View Property
												<span class="fa fa-arrow-right"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- <div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="<?php echo base_url('assets/frontend/images/apt-img.png'); ?>">
									</div>
									<div class="apartment-descp">
										<div class="property-name">
											<h2>Et harum quidem rerum facilis est et expedita</h2>
											<span class="dp-block address">10 Gopeng Street, 078878 Chinatown Tanjong Pagar (D02)</span>
											<div class="ppt-value">
												<span class="dp-block sold-at">Sold at</span>
												<h2>$2,269,530</h2>
											</div>
										</div>
									</div>
									<div class="apartment-info">
										<ul class="clearfix">
											<li>1359<br><span>SQ.FT</span></li>
											<li>4<br><span>Bedroom</span></li>
											<li>$1,670<br><span>/SQ.FT</span></li>
										</ul>
									</div>
									<div class="ppt-view-btn-holder">
										<div class="ppt-view-btn">
											<a href="#" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="<?php echo base_url('assets/frontend/images/apt-img02.png'); ?>">
									</div>
									<div class="apartment-descp">
										<div class="property-name">
											<h2>Consectetur adipisicing elit sit amet</h2>
											<span class="dp-block address">10 Gopeng Street, 078878 Chinatown Tanjong Pagar (D02)</span>
											<div class="ppt-value">
												<span class="dp-block sold-at">Sold at</span>
												<h2>$1,322,400</h2>
											</div>
										</div>
									</div>
									<div class="apartment-info">
										<ul class="clearfix">
											<li>1200<br><span>SQ.FT</span></li>
											<li>6<br><span>Bedroom</span></li>
											<li>$1,100<br><span>/SQ.FT</span></li>
										</ul>
									</div>
									<div class="ppt-view-btn-holder">
										<div class="ppt-view-btn">
											<a href="#" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="<?php echo base_url('assets/frontend/images/apt-img03.png'); ?>">
									</div>
									<div class="apartment-descp">
										<div class="property-name">
											<h2>Ut enim ad minim veniam conseqteur</h2>
											<span class="dp-block address">10 Gopeng Street, 078878 Chinatown Tanjong Pagar (D02)</span>
											<div class="ppt-value">
												<span class="dp-block sold-at">Sold at</span>
												<h2>$1,787,108</h2>
											</div>
										</div>
									</div>
									<div class="apartment-info">
										<ul class="clearfix">
											<li>1394<br><span>SQ.FT</span></li>
											<li>3<br><span>Bedroom</span></li>
											<li>$1,282<br><span>/SQ.FT</span></li>
										</ul>
									</div>
									<div class="ppt-view-btn-holder">
										<div class="ppt-view-btn">
											<a href="#" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="<?php echo base_url('assets/frontend/images/apt-img04.png'); ?>">
									</div>
									<div class="apartment-descp">
										<div class="property-name">
											<h2>Excepteur sint occaecat cupidatat non proident</h2>
											<span class="dp-block address">10 Gopeng Street, 078878 Chinatown Tanjong Pagar (D02)</span>
											<div class="ppt-value">
												<span class="dp-block sold-at">Sold at</span>
												<h2>$4,523,600</h2>
											</div>
										</div>
									</div>
									<div class="apartment-info">
										<ul class="clearfix">
											<li>2104<br><span>SQ.FT</span></li>
											<li>3<br><span>Bedroom</span></li>
											<li>$2,150<br><span>/SQ.FT</span></li>
										</ul>
									</div>
									<div class="ppt-view-btn-holder">
										<div class="ppt-view-btn">
											<a href="#" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div><!--completed-invest-holder!-->

				</div>
			</div>
		</div>
		<div class="row bg-violet">
			<div class="small-12 medium-11 large-11 align-center">
				<div class="home-body-container ">
					<div class="live-stat">
						<div class="row no-margin">
							<div class="medium-6 columns">
								<div class="row mt30">
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="<?php echo base_url('assets/frontend/images/billion-icon.png'); ?>">
												</div>
											</div>
											<div class="total-value">
												28
												<br>
												<span class="sm-text">Districts</span>
											</div>
										</div>
									</div>
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="<?php echo base_url('assets/frontend/images/investor-icon.png'); ?>">
												</div>
											</div>
											<div class="total-value">
												6
												<br>
												<span class="sm-text">Different Themes</span>
											</div>
										</div>
									</div>
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="<?php echo base_url('assets/frontend/images/completed-icon.png'); ?>">
												</div>
											</div>
											<div class="total-value">
											$5,000
												<br>
												<span class="sm-text">Minimum Investment</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="medium-6 columns">
								<div class="row">
									<div class="right-live-stat">
										<div class="live-stat-title">
											<h3>Many properties to suit every appetite!</h3>
											<p>At MicroProperties, we have a wide range of properties with different themes and at every district for you to choose from. Have a look at them now!</p>
										</div>
										<div class="start-now-holder">
											<a href="<?php echo site_url('properties');?>" class="live-stat-start-btn">Start Now<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="small-12 medium-12 large-12 align-center reveal-modal" id="video-overlay" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
			<div class="row">
				<div class="small-12 medium-8 large-7 align-center">
					<div class="popup-container">
						<video id="vid" controls autoplay loop muted playsinline width="100%">
							<source src="<?php echo base_url('assets/frontend/video/SGHPA9518_Medium.mp4'); ?>" type="video/mp4">
  							<source src="<?php echo base_url('assets/frontend/video/SGHPA9518_Medium.ogv'); ?>" type="video/ogv">
  							<source src="<?php echo base_url('assets/frontend/video/SGHPA9518_Medium.webm'); ?>" type="video/webm">
						</video>
					</div>
				</div>
			</div>
		</div>
		<div class="popup-boxes reveal-modal" id="popup-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" data-modalname="this">
			<div class="annoucement" style="display: none;">
				<p>
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
				</p>
				<a class="an_gt" aria-label="Close">OK, Got it!</a>
			</div>
			<div class="privacy_policy clearfix">
				<p>
					We use cookies on <strong>microproperties.com</strong> to improve your experience. By continuing to use the website, you will be agreeing to our <a href="" class="data_pp">Data Protection Policy</a>.
				</p>
				<a class="got_it" aria-label="Close">OK, Got it!</a>
			</div>
		</div>	
				
		<!--body-->
		<form action="<?=base_url()?>properties" id="search" method="POST">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
			<input type="hidden" id="theme-selected" value="" name="theme_selected">
			<input type="hidden" id="district-selected" value="" name="district_selected">
			<input type="hidden" id="price-range" value="" name="price_range">
			<input type="hidden" id="psqft-range" value="" name="psqft_range">	
		</form>
		
		
		<?php include("includes/footer.php"); ?>

		<?php include("includes/scripts.php"); ?>

		<!-- Search -->
		<script>

		$(function(){
			var themes = [];
			var districts = [];
			
			var funded = $('.funded > div');
			$.each(funded, function (index, value) {
				console.log(value)
				var class_name = $(value).attr('class');
				var percentage = $(value).data('value');
				var arr = class_name.split(' ');
				$('.' + arr[0] + '.circle').circleProgress({
					startAngle: -Math.PI / 4 * 2,
					fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
				}).on('circle-animation-progress', function (event, progress, stepValue) {
					$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
				});
			});
			
			$(".theme li").click(function(){
				var idx = $.inArray($(this).text(), themes);
				if(idx == -1){
					themes.push($(this).text());
				}else{
					themes.splice(idx, 1);
				}
			});

			$(".district li").click(function(e){
				var idx = $.inArray($(this).text(), districts);
				if(idx == -1){
					districts.push($(this).text());
				}else{
					districts.splice(idx, 1);
				}
			});

			$(".price-apply").click(function(){

				$('#theme-selected').val(themes);

				$('#district-selected').val(districts);

				var price_min = $('#price-range-min').text();        
				var price_max = $('#price-range-max').text();        
				var psqft_min = $('#psqft-range-min').text();        
				var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

				$('#price-range').val(price_min+'-'+price_max);
				$('#psqft-range').val(psqft_min+'-'+psqft_max);

				var theme = $('#theme-selected').val();
				var district = $('#district-selected').val();
				var valuation = $('#price-range').val();
				var psqft = $('#psqft-range').val();
			});

			$(".themes-apply").click(function(){

				$('#theme-selected').val(themes);

				$('#district-selected').val(districts);

				var price_min = $('#price-range-min').text();        
				var price_max = $('#price-range-max').text();        
				var psqft_min = $('#psqft-range-min').text();        
				var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

				$('#price-range').val(price_min+'-'+price_max);
				$('#psqft-range').val(psqft_min+'-'+psqft_max);

				var theme = $('#theme-selected').val();
				var district = $('#district-selected').val();
				var valuation = $('#price-range').val();
				var psqft = $('#psqft-range').val();
				
			});

			$(".district-apply").click(function(){
				$('#theme-selected').val(themes);

				$('#district-selected').val(districts);

				var price_min = $('#price-range-min').text();        
				var price_max = $('#price-range-max').text();        
				var psqft_min = $('#psqft-range-min').text();        
				var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

				$('#price-range').val(price_min+'-'+price_max);
				$('#psqft-range').val(psqft_min+'-'+psqft_max);

				var theme = $('#theme-selected').val();
				var district = $('#district-selected').val();
				var valuation = $('#price-range').val();
				var psqft = $('#psqft-range').val();
			});
			

			$(".home-ppt-search-btn").click(function(){
				$("#search").submit();
			});

		});


		</script>
		<!-- End search -->
		<script type="text/javascript">
		$(document).ready(function(){
			var pages = [].slice.call(document.querySelectorAll('.slides > .slide')),
		    currentPage = 0,

		    revealerOpts = {
		        // the layers are the elements that move from the sides
		        nmbLayers : 1,
		        // bg color of each layer
		        bgcolor :'#252133',
		        // effect classname
		        effect : 'anim--effect-1'
		    };
		    revealer = new Revealer(revealerOpts);

// clicking the page nav
			document.querySelector("#a").addEventListener('click', function() { reveal('cornertopleft'); });
			document.querySelector("#b").addEventListener('click', function() { reveal('cornertopright'); });
			document.querySelector("#c").addEventListener('click', function() { reveal('cornerbottomleft'); });
			document.querySelector("#d").addEventListener('click', function() { reveal('cornerbottomright'); });

// triggers the effect by calling instance.reveal(direction, callbackTime, callbackFn)
			function reveal(direction) {
			        var callbackTime = 750;

			        callbackFn = function() {
			        	classie.remove(pages[currentPage], 'slide-current');
						currentPage = (currentPage+1)%pages.length;
						classie.add(pages[currentPage], 'slide-current');	
						console.log(currentPage);
			       }

			    revealer.reveal(direction, callbackTime, callbackFn);
			}	
		});
		$(document).ready(function() {
		    function ele_adjust(){
		     if ($(window).width() > 767)
		            {   
	                    var maxHeight = -1;
	                    var completed_div = $('.apartment-descp')
	                    $(completed_div).each(function() {
	                        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
	                    });

	                    $(completed_div).each(function() {
	                        $(this).height(maxHeight );
	                    });
	            	}
			}
			$(window).on("resize", ele_adjust);
			ele_adjust();
		});
		$(".watch").click(function(){
			document.getElementById('vid').play();
		})
		$("#video-overlay .close").click(function(){
			document.getElementById('vid').pause();
			$('#vid').prop('muted', true);
		})
		</script>
	</body>
</html>
