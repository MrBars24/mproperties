<?php include("includes/header.php"); ?>
		<?php include("includes/menu.php"); ?>
		<!--carousel-->
		<!-- <div class="relative">
			<div id="carousel">
			    <img class="carousel-img" src="images/slider01.jpg" />
			    <img class="carousel-img" src="images/slider02.jpg" />
			    <img class="carousel-img" src="images/slider03.jpg" />
			</div>
			<nav class="pagenav">
				<button class="pagenav__button pagenav__button--cornertopleft" aria-label="Navigate top left"><svg class="icon icon--rtopleft"><use xlink:href="#icon-arrow"></use></svg></button>
				<button class="pagenav__button pagenav__button--cornertopright" aria-label="Navigate top right"><svg class="icon icon--rtopright"><use xlink:href="#icon-arrow"></use></svg></button>
				<button class="pagenav__button pagenav__button--cornerbottomleft" aria-label="Navigate bottom left"><svg class="icon icon--rbottomleft"><use xlink:href="#icon-arrow"></use></svg></button>
				<button class="pagenav__button pagenav__button--cornerbottomright" aria-label="Navigate bottom right"><svg class="icon icon--rbottomright"><use xlink:href="#icon-arrow"></use></svg></button>
			</nav>
		</div> -->
		
		<!-- <div class="banners">
			  <input type="radio" id="slide1" name="slides" checked="checked" />
			  <label class="image slide1" for="slide1">
			    <div class="content">
			      Slide 1
			    </div>
			    <div class="spanner"></div>
			  </label>
			  <input type="radio" id="slide2" name="slides"  />
			  <label class="image slide2" for="slide2">
			    <div class="content">
			      Slide 2
			    </div>
			    <div class="spanner"></div>
			  </label>
			  <input type="radio" id="slide3" name="slides"  />
			  <label class="image slide3" for="slide3">
			    <div class="content">
			      Slide 3
			    </div>
			    <div class="spanner"></div>
			  </label>
			</div> -->
		<div class="carousel" id="carousel">
			<div class="slides">
				<div class="slide slide-current">
				<img src="images/slider01.jpg">
				<div class="banner-heading"></div>
				 	
				<div class="banner-details clearfix">
					<div class="property-progress progress-inner">
			          <div class="property-home circle" data-value="0.8" data-size="90" data-thickness="8">
			            <strong></strong>
			          </div>
       				</div>
       				<div class="ppt-info-holder float-left">
       					<div class="property-name">
						<h2>ICON Residence</h2>
						<span class="dp-block address">10 Gopeng Street, 078878 Chinatown</span>
						<div class="ppt-value">
							<h3>$3,875,400</h3>
							<span class="dp-block txc">Exclusive of taxes and charges</span>
						</div>
						</div>
						<div class="info-total">
							<ul>
								<li><a>2153<br><span>SQ.FT</span></a></li>
								<li><a>3<br><span>Bedroom</span></a></li>
								<li><a>$1,800<br><span>/SQ.FT</span></a></li>
							</ul>
						</div>
						<div class="view-btn">
							<a href="property-details-prelog.php" class="common-btn">View Property
							<span class="fa fa-arrow-right"></span></a>
						</div>
       				</div>
				</div>
			</div>
			<div class="slide">
				<img src="images/slider02.jpg">
				<div class="banner-heading"></div>
				 	
				<div class="banner-details clearfix">
					<div class="property-progress progress-inner">
			          <div class="property-home circle" data-value="0.8" data-size="90" data-thickness="8">
			            <strong></strong>
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
							</ul>
						</div>
						<div class="view-btn">
							<a href="property-details-prelog.php" class="common-btn">View Property
							<span class="fa fa-arrow-right"></span></a>
						</div>
       				</div>
					
				</div>
			</div>
			<div class="slide">
				<img src="images/slider03.jpg">
				<div class="banner-heading"></div>
				 
				<div class="banner-details clearfix">
					<div class="property-progress progress-inner">
			          <div class="property-home circle" data-value="0.8" data-size="90" data-thickness="8">
			            <strong></strong>
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
							</ul>
						</div>
						<div class="view-btn">
							<a href="property-details-prelog.php" class="common-btn">View Property
							<span class="fa fa-arrow-right"></span></a>
						</div>
       				</div>
				</div>
			</div>
			
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
				<div class="large-8 medium-12 small-12 align-center hidden-mobile">
					<div class="advanced-search layered">
						<div class="form-heading">
							<div class="form-title">Browse through more than<span>100 properties</span></div>
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
										<a href="javascript:void(0);" class="cta-apply">Apply</a>
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
										&#43;22 more
									</div>
									<ul class="district clearfix">
										<li>All</li>
										<li>D1 - Boat Quay / Raffles Place / Marina</li>
										<li>D4 - Sentosa / Harbourfront</li>
										<li>D9 - Orchard / River Valley</li>
										<li>D10 - Tanglin / Holland / Bukit Timah</li>
										<li>D11 - Newton / Novena</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D08 Lorem Ipsum</li>
										<li class="vhide">D09 Lorem Ipsum</li>
										<li class="vhide">D10 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
										<li class="vhide">D07 Lorem Ipsum</li>
									</ul>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply">Apply</a>
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
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									</div>
									<div class="range-container price">
										<div class="range-units"><span class="value-sgd">Valuation(SGD):</span><span class="range-min">1</span> &ndash; <span class="range-max">10,000+</span></div>

										<div class="range-bar">
											<input class="range-price-slider" type="hidden" value="1,900000"/>
										</div>
									</div>
									<div class="range-container price_per_sqft">
										<div class="range-units"><span class="value-sgd">Price/Sq.ft(SGD):</span><span class="range-min">1</span> &ndash; <span class="range-max">5,000</span></div>

										<div class="range-bar">
											<input class="range-price-sqft-slider" type="hidden" value="1,5000"/>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply">Apply</a>
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
			<div class="small-12 medium-10 medium-push-1 columns">
				<div class="home-body-container ">
					<div class="row relative">
						<div class="medium-3 columns">
							<span class="home-body-left-tagline">
								How does MicroProperties work?
							</span>
							<div class="learn-more-btn">
								<a href="" class="common-btn">Learn More
								<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>
						<div class="medium-9 columns">
							<div class="home-invest-grow-collect clearfix">
								<div class="igc-container invest">
									<div class="igc-img"><img src="images/invest.png" /></div>
									<div class="igc-invest">
										<img src="images/flag1.png" class="flag">
										<div class="igc-name">Invest</div>
										<div class="igc-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </div>
									</div>
								</div>
								<div class="igc-container grow">
									<div class="igc-img"><img src="images/grow.png" /></div>
									<div class="igc-grow">
										<img src="images/flag2.png" class="flag">
										<div class="igc-name">Grow</div>
										<div class="igc-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </div>
									</div>
								</div>
								<div class="igc-container collect">
									<div class="igc-img"><img src="images/collect.png" /></div>
									<div class="igc-collect">	
										<img src="images/flag3.png" class="flag">
										<div class="igc-name">Collect</div>
										<div class="igc-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </div>
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
			<div class="small-12 medium-10 medium-push-1 columns">
				<div class="home-body-container-res">
					<div class="resource-title relative">
						<h3>Resources</h3>
						<div class="learn-more-btn">
								<a href="" class="common-btn">View More Resources
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
											Things to note before you start <span class="em-light">investing</span>
										</div>
										<div class="read-article-btn">
											<a href="" class="common-btn">Read Article
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
								<div class="medium-5 columns">
									<div class="article-img">
										<img src="images/gfx.png">
									</div>
									<div class="time-to-read">
										<div class="icon-wrap">
											<img src="images/icon-white.png" style="display: inline-block;"><br>
											<img src="images/Shape1.png" style="display: inline-block;" class="icon-white">
											<br>
											<div class="text-wrap">
												20 mins read
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="medium-3 columns">
							<div class="center-white relative">
								<div class="time-to-read-white">
										<div class="icon-wrap">
											<img src="images/icon-grey.png" style="display: inline-block;"><br>
											<img src="images/Shape2.png" style="display: inline-block;" class="icon-white">
											<br>
											<div class="text-wrap grey">
												20 mins read
											</div>
										</div>
									</div>
								<div class="article-info-text-wrap">
										<span class="date">
											20 November 2018
										</span>
										<div class="article-info-text">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod ...
										</div>
										<div class="read-article-btn">
											<a href="" class="common-btn">Read Article
											<span class="fa fa-arrow-right"></span></a>
										</div>
								</div>
							</div>							
						</div>
						<div class="medium-3 columns">
							<div class="faq-holder bg-orange relative">
								<div>
									<h1>Frequently Asked Questions</h1>
									<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia</p>
									<div class="learn-more-btn">
										<a href="" class="common-btn">Learn More
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
							<h3>Completed Investments</h3>
							<div class="learn-more-btn">
								<a href="" class="common-btn">View More Completed Investments
								<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>
						<div class="row">
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="images/apt-img.png">
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
											<a href="property-details-prelog.php" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="images/apt-img02.png">
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
											<a href="property-details-prelog.php" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="images/apt-img03.png">
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
											<a href="property-details-prelog.php" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
							<div class="large-3 medium-6 small-12 columns completed">
								<div class="invest-holder">
									<div class="apartment-img">
										<img src="images/apt-img04.png">
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
											<a href="property-details-prelog.php" class="common-btn">View Property
											<span class="fa fa-arrow-right"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--completed-invest-holder!-->

				</div>
			</div>
		</div>
		<div class="row bg-violet">
			<div class="small-12 medium-10 medium-push-1 columns">
				<div class="home-body-container ">
					<div class="live-stat">
						<div class="row">
							<div class="medium-6 columns">
								<div class="row mt30">
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="images/billion-icon.png">
												</div>
											</div>
											<div class="total-value">
												$1.5 billion
												<br>
												<span class="sm-text">total real estate value</span>
											</div>
										</div>
									</div>
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="images/investor-icon.png">
												</div>
											</div>
											<div class="total-value">
												1500
												<br>
												<span class="sm-text">Total Investors</span>
											</div>
										</div>
									</div>
									<div class="medium-4 columns">
										<div class="billion-holder">
											<div class="bg-white">
												<div class="img-holder">
													<img src="images/completed-icon.png">
												</div>
											</div>
											<div class="total-value">
												250
												<br>
												<span class="sm-text">Completed Investments</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="medium-6 columns">
								<div class="row">
									<div class="right-live-stat">
										<div class="live-stat-title">
											<h3>Sed ut perspiciatis unde omnis iste natus error sit volupt.</h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
										</div>
										<div class="start-now-holder">
											<button class="live-stat-start-btn">Start Now<span class="fa fa-arrow-right"></span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<!--body-->
			
		
		<?php include("includes/footer.php"); ?>

		<?php include("includes/scripts.php"); ?>
		<script type="text/javascript">
		$(document).ready(function(){

						var slides = document.querySelectorAll('#carousel .slide');
						var currentSlide = 0;
						//var slideInterval = setInterval(nextSlide,2000);
						//var timeout = setTimeout(nextSlide,1000)
						function nextSlide(){
						    goToSlide(currentSlide+1);
						}
						function previousSlide(){
						    goToSlide(currentSlide-1);
						}

						function goToSlide(n){
						    slides[currentSlide].className = 'slide';
						    currentSlide = (n+slides.length)%slides.length;
						    slides[currentSlide].className = 'slide slide-current';
						    //classie.add(pages[currentSlide], 'slide-current');
						}
			var a = document.getElementById("a");
			a.onclick = function(){
				setTimeout(nextSlide,500);
			};
			var b = document.getElementById("b");
			b.onclick = function(){
			    setTimeout(nextSlide,500);
			};
			var c = document.getElementById("c");
			c.onclick = function(){
			    setTimeout(nextSlide,500);
			};
			var d = document.getElementById("d");
			d.onclick = function(){
			    setTimeout(nextSlide,500);
			};

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
			       }

			    revealer.reveal(direction, callbackTime, callbackFn);
			}	
			var largest = 0; //start with 0

			$(".completed").each(function(){ //loop through each section
			   var findHeight = $(this).height(); //find the height
			   if(findHeight > largest){ //see if this height is greater than "largest" height
			      largest = findHeight; //if it is greater, set largest height to this one 
			  		console.log(largest);
			   }  
			});

			//$(".invest-holder , .completed").css({"height":largest+"px"});
		});
		</script>
	</body>
</html>
