<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="about-banner row">
	<img src="<?=base_url('assets/frontend/images/about-banner-alter.jpg');?>" class="about-banner-img">
	<div class="small-12 medium-11 large-11 align-center">
		<div class="row no-margin pos-abs">
			<div class="small-5 medium-5 large-6">
				<div class="text-wrapper">
					<h1>Welcome to MicroProperties!</h1>
					<p>No mortgage. Better Returns. Many opportunities. At MicroProperties, you are all set to invest in a slew of Singapore properties from just S$5,000. Online.</p>
				</div>
			</div>
		</div>
	</div>
	<img src="<?=base_url('assets/frontend/images/Ellipse-2.png');?>" class="scroll-to-down">
</div>
<div class="small-12 medium-11 large-11 align-center">
	<div class="video-about row" id="video-about">
		<div class="small-12 medium-6 large-7 columns">
			<div class="hover_layer" data-open="info_graphic_modal">
				<img src="<?=base_url('assets/frontend/images/info_investment_flow.jpg');?>" class="info_graphic">
				 <div class="middle">
				    <div class="zoom-icon"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
				 </div>
			</div>
		</div>
		<div class="small-12 medium-6 large-5 columns">
			<h1>
				How Does<br> MicroProperties Work?
			</h1>
			<p>Investing on our platform is easy and straightforward. But we understand you may still need some guidance. Have a look at this video and you’ll see how we work to help you grow your property portfolio.
			</p>
		</div>
	</div>
</div>
<div class="carousel-wrapper row">
	<div class="small-12 medium-11 large-11 align-center">
	<div role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="false">
		<div class="orbit-wrapper">
			<div class="orbit-controls">
				<button class="orbit-previous"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
				<nav class="orbit-bullets">
					<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
					<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
					<button data-slide="3"><span class="show-for-sr">Third slide details.</span></button>
			</nav>
				<button class="orbit-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
				
		</div>
			<ul class="orbit-container">
				<li class="is-active orbit-slide">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<h6>Key Feature #1</h6>
							<h1>
								Fractional Investing made possible instant Access & Affordability 
							</h1>
						</div>
						<div class="small-12 medium-6 columns text-center">
							<img src="<?=base_url('assets/frontend/images/funding.png');?>" class="funding-graph">
						</div>
					</div>
				</li>
				<li class="orbit-slide">
					<div class="row">
						<div class="small-12 medium-5 columns">
						<h6>Key Feature #2</h6>
							<h1>
								Manage all your Properties at your Fingertip
							</h1>
						</div>
						<div class="small-12 medium-7 columns">
							<img src="<?=base_url('assets/frontend/images/pie-chart.png');?>">
						</div>
					</div>
				</li>
				<li class="orbit-slide">
					<div class="row">
						<div class="small-12 medium-6 columns">
						<h6>Key Feature #3</h6>
							<h1>
								Transact and Interact in Real Time.
							</h1>
						</div>
						<div class="small-12 medium-6 columns">
							<img src="<?=base_url('assets/frontend/images/macbook-alter.png');?>">
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<div class="small-12 medium-12 large-12 align-center reveal-modal" id="info_graphic_modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
			<div class="row">
				<div class="small-12 medium-10 large-10 align-center">
					<div class="popup-container">
						<img src="<?=base_url('assets/frontend/images/info_investment_flow_large.jpg');?>">
					</div>
				</div>
			</div>
</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>
<script type="text/javascript">
	$(".scroll-to-down").on("click", function(){
		$('html,body').animate({
    'scrollTop':   $('#video-about').offset().top
		}, 2000);
	});
</script>