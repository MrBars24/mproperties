<?php include("includes/header.php"); ?>

<header>
	<a href="<?=site_url('')?>"><div class="logo"></div></a>
</header>
		<div class="large-5 small-12 medium-7 align-center checkout">
		    <div class="home-body-container">
		      <div class="row">
		        <div class="medium-12 columns">
		        	<div class="con-status">
		        		<div class="one">
		        			<span>1</span>
		        		</div>
		        		<div class="status">
		        		</div>
		        		<div class="two ck-active">
		        			<span>2</span>
		        		</div>
		        	</div>
		          	<div class="checkout-title">
		          		Congratulations!
		          		<span class="checkout-info-text"> You’re now a unitholder of this property <span><?=$property->property_name?></span>! </span>
		          	</div>
		        </div>
		      </div>    
		      <div class="row">
		      	<div class="next-title">
		      		<h3>What’s Next?</h3>
		      	</div>
		      </div>    
		      <div class="row">
		        <div class="medium-4 columns">
		        	<div class="icon-img-holder">
		        		<img src="<?php echo base_url('assets/frontend/images/large-mail-icon.png'); ?>" >
		        	</div>
		        </div>
		        <div class="medium-8 columns">
		          	<div class="congrat">
		          		<h4>Check It!</h4>
		          		<p>Check your details and information to make sure they are correct. You will also receive some verification emails and notices. Do look out for them.</p>
					</div>
		        </div>
		      </div>  
		       <div class="row">
			        <div class="medium-4 columns">
			        	<div class="icon-img-holder">
			        		 <img src="<?php echo base_url('assets/frontend/images/security-icon.png'); ?>" >
			        	</div>
			        </div>
			        <div class="medium-8 columns">
			          	<div class="congrat">
			          		<h4>Watch It Closely!</h4>
			          		<p>You are now ready to transact with this property. Sell, rent, or simply chat with potential buyers!</p>
			          		<a href="<?php echo site_url('orders');?>" class="common-btn">Go To My Investments</a>
						</div>
						<div class="btn-holder">
			          		<a href="<?=site_url('property-details/' . $property->property_id)?>" class="blue-rectangle-btn great-btn">Let's Go!<span class="fa fa-arrow-right"></span></a>
						</div>
			        </div>
		     	</div>  
		    </div>

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
