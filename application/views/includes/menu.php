<!-- <style>
	.account-validated, .mobile-validated{
		font: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;	
		color: #00FA9A;
		font-weight: bold;
		text-transform: uppercase;
	}
	.account-validated{
		text-align: center;
	}

	.mobile-validated{
		font-size: 16px;
		margin-left: 18px;
	}
	

</style> -->

<div id="mobile-menu" >
	<div class="close-menu">
			<a href="javascript:void(0)" id="close-menu">
				<i class="fa fa-times" ></i>
			</a>
		</div>
		<ul class="menu vertical">
		<li><a href="<?php echo site_url('properties');?>">Properties</a></li>
		<li><a href="<?=site_url('completed-investments')?>">Completed Investments</a></li> 
		<li><a href="<?php echo site_url('faq');?>">Resources</a></li> 
		<li><a href="<?=base_url()?>about">About</a></li> 
		<li class="divider"></li> 
		<li><a href="#">Sell with us</a></li> 

		<?php if($this->ion_auth->logged_in()): ?>
		<?php 
			// $ci =& get_instance();
			// $ci->load->model('Users_model');
			// $user =  $ci->Users_model->get_user($this->ion_auth->user()->row()->id);
		?>
			<!-- <li><a href="#">My Account</a><span class="mobile-validated"><?php// if($user->kyc_status == 1) echo "Account Validated!" ;?></span></li> -->
			<ul class="mobile-sub-logged">
				<!-- <li><a href="<?php echo site_url('messages');?>">Messages<span class="messages-counter"></span></a></li> -->
				<li><a href="<?php echo site_url('watch-list');?>">Watchlists</a></li>
				<li><a href="<?php echo site_url('orders');?>">Orders</a></li>
				<li><a href="<?php echo site_url('portfolio');?>">Portfolio</a></li>
				<li><a href="<?php echo site_url('credit-balance'); ?>">Credit Balance</a></li>
				<li><a href="<?php echo site_url('transactions');?>">Transactions</a></li>
			</ul>
			</li>
			<div class="mobile-help">
					<a href="<?php echo site_url('faq');?>" class="action-sub help"><span class="fa fa-life-ring"></span> Help</a>
					<a href="<?php echo site_url('my-profile');?>" class="action-sub settings"><span class="fa fa-cog"></span> My Profile</a>
			</div>
			<li><a href="<?php echo site_url('logout');?>">Logout</a></li> 
		<?php else: ?>
			<li><a href="<?php echo site_url('login');?>" class="loginlink">Login</a></li> 
			<li><a href="<?php echo site_url('register');?>">Register</a></li>
		<?php endif; ?>

	</ul>			
</div>
<div class="small-12 medium-11 large-11 align-center menu-holder">
	<header class="clearfix row">
	<div class="menu">
		<ul class="relative small-12 medium-5 columns" id="left">
			<li <?=echoActiveClassIfRequestMatches("properties")?>><a href="<?php echo site_url('properties');?>">Properties</a></li>
			<li <?=echoActiveClassIfRequestMatches("completed-investment")?>><a href="<?=site_url('completed-investments')?>">Completed Investments</a></li> 
			<li <?=echoActiveClassIfRequestMatches("faq")?>><a href="<?php echo site_url('faq');?>">Resources</a></li>
		</ul>
		<ul class="relative small-12 medium-2 columns" id="center">
			<li><a href="<?php echo site_url('');?>"><img src="<?php echo base_url('assets/frontend/images/logo.svg'); ?>" class="menu-logo"></a></li>
		</ul>
		<ul class="relative small-12 medium-5 columns" id="right">
			<li><a href="<?=base_url()?>about">About</a></li>
			<li><a href="#">Sell with us</a></li>
			<?php if($this->ion_auth->logged_in()): ?>
			<li><a href="javascript:void(0)" class="btn-my-account">My account</a></li>	
			<?php else: ?>
			<li><a href="javascript:void(0)" class="login-item" >Login</a></li>
			<li class="register_btn"><a href="<?php echo site_url('register');?>" class="blue-rectangle-btn">Register <span class="fa fa-long-arrow-right"></span></a></li>
		    <?php endif; ?>
		</ul>
	</div>
	<div class="mobile-menu">
		<i class="fa fa-bars icon-mobile-menu"></i>
	</div>
	<a href="<?php echo site_url('');?>" class="mobile-logo"><img src="<?php echo base_url('assets/frontend/images/logo.svg'); ?>" class="menu-logo"></a>
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
<?php if($this->ion_auth->logged_in()): ?>
	<?php 
	// $ci =& get_instance();
	// $ci->load->model('Users_model');
	// $user =  $ci->Users_model->get_user($this->ion_auth->user()->row()->id);
	?>
	<div class="my-account-menu">
		<div class="my-account-menu-container">
			<div class="action close"><span class="fa fa-times"></span> Close</div>
			<div class="title">My Account</div>
			<!-- <div class="account-validated">
				<?php 
				// if($user->kyc_status == 1){
				// 	echo "Account Validated!";
				// }
				?>
			</div> -->
			<?php 
				$ci = &get_instance();
				$ci->load->model('Notification_model');
				$notif_count = count($ci->Notification_model->get_unread_notif_by_user());
			?>
			<?php if($notif_count > 0): ?>
				<div class="notificiation"><a href="<?=base_url()?>notifications"><span class="fa fa-bell"></span> <span class="notification-counter"><?=$notif_count?></span> New Notification</a></div>
			<?php endif; ?>
			<div class="menu-list">
				<ul>
					<!-- <li><a href="<?php echo site_url('messages');?>">Messages</a></li> -->
					<li><a href="<?php echo site_url('watch-list');?>"href="#">Watchlists</a></li>
					<li><a href="<?php echo site_url('orders');?>">Orders</a></li>
					<li><a href="<?php echo site_url('portfolio');?>">Portfolio</a></li>
					<li><a href="<?php echo site_url('credit-balance'); ?>">Credit Balance</a></li>
					<li><a href="<?php echo site_url('transactions');?>">Transactions</a></li>
				</ul>
			</div>
			<a href="<?php echo site_url('faq');?>" class="action-sub help"><span class="fa fa-life-ring"></span> Help</a>
			<a href="<?php echo site_url('my-profile');?>" class="action-sub settings"><span class="fa fa-cog"></span> My Profile</a>
			<a href="<?php echo site_url('logout');?>" class="action-sub logout"><span class="fa fa-sign-out"></span> Logout</a>
		</div>
	</div>
	<?php endif; ?>
	<div style="display:none">
		<div id="login" class="popup-form">
		     <div class="login-overlay-container">
				<div class="title">Login</div>
				<p class="text-center"><a href="<?php echo site_url('register'); ?>">Register </a>if you don't have an account</p>
				<div class="">
				
						<div class="white-bg form-style">		
							<input type="email" name="username" placeholder="Enter Your email*" />
							<div class="relative">
			          			<input type="password" name="password" placeholder="Password*">
			          			<span class="fa fa-eye"></span>
								<a href="<?php echo site_url('forgot-password'); ?>" class="form-enabler">Forgot Password?</a>
			          		</div>
							<div class="div-center">
								<a href="javascript:;" class="blue-rectangle-btn login-account">Login<span class="fa fa-arrow-right"></span></a>
							</div>
						</div>				
				</div>
			</div>
		</div>
	</div>
<div class="login-overlay">
		<div class="login-loading" id="login-loading-div"  style="display: none;">
			<div class="login-loading-wrap">
				<div class="loading-gift">
					<img src="<?php echo base_url('assets/frontend/images/loader.gif');?>">
				</div>
			</div>
		</div>
		<div class="login-overlay-container">
			<div class="action close"><span class="fa fa-times"></span> Close</div>
			<div class="title">Login</div>
			<p class="text-center"><a href="<?php echo site_url('register');?>">Register </a>if you don't have an account.</p>
			<!--added css-->
			<style type="text/css">
				.login-error {
				 margin-left:45px;
				}
				.login-error p{
				 margin-bottom: 0;	
				 color:#C91F37 !important;
				 font-family: inherit;
				}
			</style>

			<div class="">
				<?php echo form_open('login', array('id'=>'login_form_slider'));
					$hide_error = 'display: none;';
					if (isset($login_error_msg) && $login_error_msg)
					{
						$hide_error = '';
					}

				?>
				<div class="white-bg form-style">
					<div data-abide-error class="alert callout login_error" style="<?php echo $hide_error;?>">
						<p><i class="fi-alert"></i> 
							<div class='error_msg' id='error_msg'>
							<?php
								if (isset($login_error_msg) && $login_error_msg)
								{
									echo $login_error_msg;			
								}else
								{
									echo 'Incorrect Login.';
								}
							?>						
							</div>	
						</p>
					</div>
					<input type="email" name="username" placeholder="Email*" />
					<div class="relative">
	          			<input type="password" name="password" placeholder="Password*" id="pwd-field">
	          			<span class="fa fa-eye toggle-password" toggle="#pwd-field"></span>
						<a href="<?php echo site_url('forgot-password'); ?>" class="form-enabler">Forgot Password?</a>
	          		</div>
					<div class="div-center">
						<a href="javascript:0;" class="blue-rectangle-btn login-account" id="submit-login-slider">Login<span class="fa fa-arrow-right"></span></a>
					</div>`
				</div>
				
				
				</form>
			</div>
		</div>
		
	</div>
<?php 
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
        if ($current_file_name == $requestUri)
            echo 'class="selected"';
    }
?>

