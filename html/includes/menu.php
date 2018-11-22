<div id="mobile-menu" >
	<div class="close-menu">
		<a href="javascript:void(0)" id="close-menu">
			<i class="fa fa-times" ></i>
		</a>
	</div>
	<ul class="menu vertical">
	<li><a href="property-listing.php">Properties</a></li>
	<li><a href="#">Completed Investments</a></li>
	<li><a href="#">Resources</a></li> 
	<li><a href="#">About</a></li> 
	<li class="divider"></li> 
	<li><a href="#">Sell with us</a></li> 

	<?php if($_GET['s'] == "logged"): ?>
	<li><a href="#">My Account</a>
	<ul class="mobile-sub-logged">
		<li><a href="messages.php?s=logged">Messages <span class="messages-counter">999+</span></a></li>
		<li><a href="watchlist">Watchlists</a></li>
		<li><a href="investments.php?s=logged">Orders</a></li>
		<li><a href="portfolio.php?s=logged">Portfolio</a></li>
		<li><a href="credit_balance.php?s=logged">Credit Balance</a></li>
		<li><a href="transactions">Transactions</a></li>
	</ul>
	</li>
	<div class="mobile-help">
			<a href="#" class="action-sub help"><span class="fa fa-life-ring"></span> Help</a>
			<a href="setting.php?s=logged" class="action-sub settings"><span class="fa fa-cog"></span> Settings</a>
	</div>
	<li><a href="#">Logout</a></li> 
	<?php else: ?>
	<li><a href="javascript:void(0);" class="loginlink">Login</a></li> 
	<li><a href="register.php">Register</a></li>
	<?php endif; ?>

	</ul>
</div>
<div class="small-12 medium-11 large-11 align-center menu-holder">
<header class="clearfix row">
	<div class="menu">
		<ul class="relative small-12 medium-5 columns" id="left">
			<li <?=echoActiveClassIfRequestMatches("property-listing")?>><a href="property-listing.php">Properties</a></li>
			<li <?=echoActiveClassIfRequestMatches("investments")?>><a href="investments.php">Completed Investments</a></li> 
			<li <?=echoActiveClassIfRequestMatches("faq")?>><a href="faq.php">Resources</a></li>
		</ul>
		<ul class="relative mall-12 medium-2 columns" id="center">
			<li><a href="index.php" class="selected"><img src="images/logo.svg" width="155" height="34" class="menu-logo"></a></li>
		</ul>
		<ul class="relative small-12 medium-5 columns" id="right">
			<li><a href="#">Sell with us</a></li>
			<?php if($_GET['s'] == "logged"): ?>
			<li><a href="javascript:void(0)" class="btn-my-account">My account</a></li>	
			<?php else: ?>
			<li><a href="javascript:void(0)" class="login-item">Login</a></li>
			<li class="register_btn"><a href="register.php" class="blue-rectangle-btn">Register <span class="fa fa-long-arrow-right"></span></a></li>
		    <?php endif; ?>
		</ul>
	</div>
	<!-- <a href="index.php"><div class="logo"></div></a> -->
	<!-- 
	<div class="admin">
		<ul>
			<li><a href="#">About</a></li>
			<li><a href="#">Sell with us</a></li>
			<?php if($_GET['s'] == "logged"): ?>
			<li><a href="javascript:void(0)" class="btn-my-account">My account</a></li>	
			<?php else: ?>
			<li><a href="javascript:void(0)" class="login-item">Login</a></li>
			<li><a href="register.php" class="blue-rectangle-btn">Register <span class="fa fa-long-arrow-right"></span></a></li>
		    <?php endif; ?>
		</ul>
		<div class="search-form">
			<div class="ss-title">Search Site</div>
			<div class="fields clearfix">
				<input type="text" class="search-text" />
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
			 <button class="search-close">X</button> 
		</div> -->
	</div>
	<div class="mobile-menu">
		<i class="fa fa-bars icon-mobile-menu"></i>
	</div>
	<a href="index.php" class="mobile-logo"><img src="images/logo.svg" class="menu-logo"></a>

	<div class="my-account-menu">
		<div class="my-account-menu-container">
			<div class="action close"><span class="fa fa-times"></span> Close</div>
			<div class="title">My Account</div>
			<div class="notificiation"><span class="fa fa-bell"></span> <span class="notification-counter">1</span> new notification</div>
			<div class="menu-list">
				<ul>
					<li><a href="messages.php?s=logged">Messages <span class="messages-counter">999+</span></a></li>
					<li><a href="promoter-account.php?s=logged">Referrals & Commissions</a></li>
					<li><a href="watchlist.php?s=logged">Watchlists</a></li>
					<li><a href="investments.php?s=logged">Orders</a></li>
					<li><a href="portfolio.php?s=logged">Portfolio</a></li>
					<li><a href="credit_balance.php?s=logged">Credit Balance</a></li>
					<li><a href="transactions.php?s=logged">Transactions</a></li>
				</ul>
			</div>
			<a href="#" class="action-sub help"><span class="fa fa-life-ring"></span> Help</a>
			<a href="setting.php?s=logged" class="action-sub settings"><span class="fa fa-cog"></span> Settings</a>
			<a href="#" class="action-sub logout"><span class="fa fa-sign-out"></span> Logout</a>
		</div>
	</div>
</header>
</div>
<header class="header-search">
	<div class="search">
		<!-- <img src="images/icon-search.svg" class="icon-search" /> -->
		<i class="fa fa-search search-s-fa" aria-hidden="true" id="search-s-fa"></i>
		<i class="fa fa-times fa-1 search-close-fa" aria-hidden="true" id="search-close-fa"></i>
	</div>
	<div class="admin">
		<div class="search-form">
			<div class="ss-title">Search Site</div>
			<div class="fields clearfix">
				<input type="text" class="search-text" />
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
			<!-- <button class="search-close">X</button> -->
		</div>
	</div>
</header>
	<div class="login-overlay">
		<div class="login-loading" id="login-loading-div">
			<div class="login-loading-wrap">
				<div class="loading-gift">
					<img src="images/loader.gif">
				</div>
			</div>
		</div>
		<div class="login-overlay-container">
			<div class="action close"><span class="fa fa-times"></span> Close</div>
			<div class="title">Login</div>
			<p class="text-center"><a href="register.php">Register </a>if you don't have an account</p>
			<div class="">
					<div class="white-bg form-style ">
						<input type="email" placeholder="Enter Your email*" />
						<div class="relative">
		          			<input type="text" placeholder="Password*">
		          			<span class="fa fa-eye"></span>
							<a href="javascript:void(0);" class="form-enabler">Forgot Password?</a>
		          		</div>
						<div class="div-center">
							<a href="#" class="blue-rectangle-btn login-account">Login<span class="fa fa-arrow-right"></span></a>
						</div>
					</div>
			</div>
		</div>
		<div class="thankyouDiv" id="login-thankyouDiv">
			<div class="login-thank-you-wrap">
				<h2>Thank You for Your Registration!</h2>
					<p>We hope you’ll find MicroProperties useful in helping you build your property portfolio. You can now start browsing for the properties you want to invest in!</p>
					<div class="back-to-home">
						<a href="#" class="blue-rectangle-btn btn-bth">Back To Home</a>
					</div>
			</div>
		</div>
	</div>
	<div style="display:none">
		<div id="login" class="popup-form">
		     <div class="login-overlay-container">
				<div class="title">Login</div>
				<p class="text-center"><a href="register.php">Register </a>if you don't have an account</p>
				<div class="row">
						<div class="white-bg form-style">
							<input type="email" placeholder="Enter Your email*" />
							<div class="relative">
			          			<input type="text" placeholder="Password*">
			          			<span class="fa fa-eye"></span>
								<a href="javascript:void(0);" class="form-enabler">Forgot Password?</a>
			          		</div>
							<div class="div-center">
								<a href="#" class="blue-rectangle-btn login-account">Login<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div>
</header>
 	<?php 
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

        if ($current_file_name == $requestUri)
            echo 'class="selected"';
    }
    ?>