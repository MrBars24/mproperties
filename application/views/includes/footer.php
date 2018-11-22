<!-- footer-->
<footer>
	<div class="footer-1">
		<div class="back-to-top">
		</div>
			<div class="bg-right">
				<div class="row">
					<div class="small-12 medium-5 medium-push-1 columns">
					</div>
				</div>
			</div>
			<div class="row col-wrap">
				<div class="small-12 large-11 medium-11 align-center">
					<div class="large-6 columns bg-gray-1">
					<div class="quick-links-container">
						
						<div class="row quick-links-content">
							<div class="small-2 columns">
								<ul class="quick-links-list">
									<li><a href="<?php echo site_url('properties');?>">Properties</a></li>
								</ul>
							</div>
							<div class="small-3 columns">
								<ul class="quick-links-list">
									<li><a href="<?php echo site_url('faq');?>">Resources</a></li>
									<li><a href="<?php echo site_url('faq');?>">FAQs</a></li>
								</ul>
							</div>
							<div class="small-3 columns">
								<ul class="quick-links-list">
									<li><a href="<?php echo site_url('about');?>">About</a></li>
									<li><a href="<?php echo site_url('faq');?>">Contact us</a></li>
								</ul>
							</div>

							<div class="small-4 columns">
								<ul class="quick-links-list">
									<li><a href="<?php echo site_url('register');?>">Register</a></li>
									<li><a href="javascript:void(0)" class="go-to-login-alter">Login</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="social-container">
						<span>Connect with us</span>
						<ul class="footer-social-icons">
							<li><a href="https://www.facebook.com/mymicroproperties/" target="_blank" class="fa fa-facebook"></a></li>
						</ul>
					</div>
					<ul class="footer-link-list">
						<li><a href="<?php echo site_url('terms-of-use');?>">Terms of Use</a></li>

						<li>&#9642;&#160;&#160;<a href="#" style="margin-left: 10px;">Privacy Policy</a></li>
					</ul>
					<div class="copy-right">
					&copy;2018 <b> MICROPROPERTIES</b>. All Rights Reserved.
					</div>
				</div>
				<div class="large-6 columns bg-gray-2">
					
					<div class="subscribe-container">
						<div class="subscribe-text">Subscribe to our newsletter<br> to receive the latest updates<br>and valuable property insights.
<br>
						<div class="subscribe-form">
							<!-- <?php if($this->session->flashdata('subscribe')): ?>
								<div>
									<?=$this->session->flashdata('subscribe')?>
								</div>
							<?php endif; ?> -->
							<?=form_open('test/subscribe', ['id' => 'subscribe-form'])?>
								<p id="subs-message"><p>
								<input type="email" placeholder="Enter Your Email" name="email" id="subs-email"/>
								<button class="subscribe-button" type="submit">Subscribe <span class="fa fa-long-arrow-right"></span></button>
							<?=form_close()?>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--footer-->
</body>