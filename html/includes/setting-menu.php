<div id="mobile-menu" >
	<div class="close-menu">
		<a href="javascript:void(0)" id="close-menu">
			<i class="fa fa-times" ></i>
		</a>
	</div>
	<ul class="menu vertical">
	  <li><a href="#">Properties</a></li>
	  <li><a href="property-list.php">Resources</a></li> 
	  <li><a href="#">About</a></li> 
	  <li class="divider"></li> 
	  <li><a href="#">Sell with us</a></li> 
	  <li><a href="#">Login</a></li> 
	  <li><a href="register.php">Register</a></li>
	</ul>
</div>
<header>
	<div class="search">
		<img src="images/icon-search.svg" class="icon-search" />
	</div>
	<div class="menu">
		<ul>
			<li><a href="property-listing.php">Properties</a></li>
			<li><a href="">Resources</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
	<a href="index.php"><div class="logo"></div></a>
	
	<div class="admin">
		<ul>
			<li><a href="#">Sell with us</a></li>
			<li><a href="javascript:void(0)" class="btn-my-account">My account</a></li>	
			<!-- <li><a href="#">Login</a></li> -->
			<!-- <?php if($_GET['s'] == "logged"): ?> -->
			<!-- <li><a href="javascript:void(0)" class="btn-my-account">My account</a></li>	 -->
			<!-- <?php else: ?> -->
			<!-- <li><a href="register.php" class="blue-rectangle-btn">Register <span class="fa fa-long-arrow-right"></span></a></li>
		    <?php endif; ?> -->
		</ul>
	</div>

	<div class="mobile-menu">
		<i class="fa fa-bars icon-mobile-menu"></i>
	</div>
	<div class="search-form">
		<input type="text" class="search-text" />
		<button class="search-close">X</button>
	</div>

	<div class="my-account-menu">
		<div class="my-account-menu-container">
			<div class="action close"><span class="fa fa-times"></span> Close</div>
			<div class="title">My Account</div>
			<div class="notificiation"><span class="fa fa-bell"></span> <span class="notification-counter">1</span> new notification</div>
			<div class="menu-list">
				<ul>
					<li><a href="#" target="_blank">Messages <span class="messages-counter">999+</span></a></li>
					<li><a href="#" target="_blank">Watchlists</a></li>
					<li><a href="investments.php" target="_blank">Investments</a></li>
					<li><a href="portfolio.php" target="_blank">Portfolio</a></li>
					<li><a href="credit_balance.php" target="_blank">Credit Balance</a></li>
					<li><a href="#" target="_blank">Transactions</a></li>
				</ul>
			</div>
			<a href="#" target="_blank" class="action-sub help"><span class="fa fa-life-ring"></span> Help</a>
			<a href="#" target="_blank" class="action-sub settings"><span class="fa fa-cog"></span> Settings</a>
			<a href="#" target="_blank" class="action-sub logout"><span class="fa fa-sign-out"></span> Logout</a>
		</div>
	</div>
</header>