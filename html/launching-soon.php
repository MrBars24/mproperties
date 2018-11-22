
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Micro Properties</title>
		<link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="css/app.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/jquery.range.css">
		<link rel="stylesheet" href="css/style.css">  
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/component.css">
		<link rel="stylesheet" href="css/panorama360.css">
		<!-- <link rel="stylesheet" href="css/style-extended.css">   -->
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css?v=1.0.5" />
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-thumbs.css?v=1.0.7" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="css/superslides.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
		<link rel="manifest" href="images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="images/favicon/ms-icon-70x70.png">
		<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
		<meta name="msapplication-TileImage" content="images/favicon/ms-icon-150x150.png">
		<meta name="msapplication-TileImage" content="images/favicon/ms-icon-310x310.png">

		
	</head>

	<style>
	.text-alter p{
		font-family: "lato-bold";
		color: #fff;
		margin-bottom: 0;
	}
	.countdown-container {
		position: relative;
		margin-bottom: 20px;
	}

	.clock-item .inner {
		height: 0px;
		padding-bottom: 100%;
		position: relative;	
		width: 100%;
	}

	.clock-canvas {
		background-color: rgba(255, 255, 255, .3);
		border-radius: 50%;
		height: 0px;
		padding-bottom: 100%;
	}

	.text-alter {
		color: #fff;	
		font-size: 30px;
		font-weight: bold;	
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		text-align: center;
		text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
		width: 100%;
	}

	.text-alter .val {
		font-size: 50px;
		margin-bottom: 0;
	}

	.text-alter .type-time {
		font-size: 20px;
	}
	@media (max-width: 768px) {
		.text-alter .type-time {
			font-size: 12px;
		}
		.text-alter .val , .text-alter{
			font-size: 11px;
		}

	}
	.coming-soon {background-color: #e3e3e3; background-size: cover; background-position: center right;}
	.coming-soon header {background-color: #fff; position: absolute; z-index: 99999999; width: 100%;}
	.coming-soon .logo {top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%);}
	.coming-soon .text {position: absolute; top: 50%;
		transform:translateY(-50%);width: 100%; text-align: center; z-index: 99999;}
	.coming-soon .text .text-big {font-family: 'lato-regular'; color: #ffffff; font-size: 60px; line-height: 60px; text-shadow: 0px 0px 5px rgba(0, 0, 0, 1); width: 100%; text-align: center; margin: 10px auto;}
	.coming-soon .text .text-small {font-family: 'lato-regular'; color: #ffffff; font-size: 20px;text-shadow: 0px 0px 5px rgba(0, 0, 0, 1); width: 100%; text-align: center; margin: 10px auto}
 	.form-field-wrapper{
	 	width: 35%;
	 	margin:20px auto;
	 }
	 .form-field {
	 	float: right;
	 	text-align: center;
	 }
	 .form-field input{
	 	font-family: "lato-bold";
	 	color:#333;
	 	font-size:14px;
	 	margin:0;
	 }
	 .form-field input[type="submit"]{
	 	background: #00c0f3;
	    border: 0;
	    color: #fff;
	    padding: 11px 30px;
	    transition: all 0.3s ease 0s;
	    cursor: pointer;
	 }
	 .form-field input[type="submit"]:hover{
	 	background: #4c57a6;
	 }
	 .form-field.email-wrapper{
	 	width: 70%;
	 	float:left;
	 }
	 @media screen and (max-width: 1120px){
		.form-field-wrapper{
			width: 35%;
		}
		.form-field.email-wrapper , .form-field{
			float:none;
		}
		.form-field.email-wrapper{
			width: 100%;
			margin-bottom: 20px;
		}
	}
	@media screen and (max-width: 480px){
		.coming-soon .text .text-big {font-size: 40px; line-height: 50px;}
		.coming-soon .text .text-small {font-size: 15px;padding: 0 25px;}
		.coming-soon .text .text-small br{
			display: none;
		}
		.form-field-wrapper{
			width: 75%;
		}
		.slides-pagination{
			bottom: 20px;
		}
	}
	.slides-pagination a {border: 2px solid #d3d3d3;}
	
	/* The alert message box */
	.alert.danger {
	    padding: 20px;
	    background-color: #f44336; /* Red */
	    color: white;
	    margin-bottom: 15px;
	}

	.alert.success {
	    padding: 20px;
	    background-color: #4CAF50; /* Red */
	    color: white;
	    margin-bottom: 15px;
	}

	/* The close button */
	.closebtn {
	    margin-left: 15px;
	    color: white;
	    font-weight: bold;
	    float: right;
	    font-size: 22px;
	    line-height: 20px;
	    cursor: pointer;
	    transition: 0.3s;
	}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}

.alert {
    opacity: 1;
    transition: opacity 0.6s; /* 600ms to fade out */
}

	</style>
	<body class="coming-soon">

		<header class="clearfix">
			<div class="logo"></div>
		</header>

		<div id="slides">
			<div class="text">
				<div class="countdown countdown-container large-7 small-12 medium-10 align-center">
			    <div class="clock row">
			        <div class="clock-item clock-days countdown-time-value medium-3 small-3 large-3 columns">
			            <div class="wrap">
			                <div class="inner">
			                    <div id="canvas-days" class="clock-canvas"></div>

			                    <div class="text-alter">
			                        <p class="val">0</p>
			                        <p class="type-days type-time">DAYS</p>
			                    </div><!-- /.text -->
			                </div><!-- /.inner -->
			            </div><!-- /.wrap -->
			        </div><!-- /.clock-item -->

			        <div class="clock-item clock-hours countdown-time-value medium-3 small-3 large-3 columns">
			            <div class="wrap">
			                <div class="inner">
			                    <div id="canvas-hours" class="clock-canvas"></div>

			                    <div class="text-alter">
			                        <p class="val">0</p>
			                        <p class="type-hours type-time">HOURS</p>
			                    </div><!-- /.text -->
			                </div><!-- /.inner -->
			            </div><!-- /.wrap -->
			        </div><!-- /.clock-item -->

			        <div class="clock-item clock-minutes countdown-time-value medium-3 small-3 large-3 columns">
			            <div class="wrap">
			                <div class="inner">
			                    <div id="canvas-minutes" class="clock-canvas"></div>

			                    <div class="text-alter">
			                        <p class="val">0</p>
			                        <p class="type-minutes type-time">MINUTES</p>
			                    </div><!-- /.text -->
			                </div><!-- /.inner -->
			            </div><!-- /.wrap -->
			        </div><!-- /.clock-item -->

			        <div class="clock-item clock-seconds countdown-time-value medium-3 small-3 large-3 columns">
			            <div class="wrap">
			                <div class="inner">
			                    <div id="canvas-seconds" class="clock-canvas"></div>

			                    <div class="text-alter">
			                        <p class="val">0</p>
			                        <p class="type-seconds type-time">SECONDS</p>
			                    </div><!-- /.text -->
			                </div><!-- /.inner -->
			            </div><!-- /.wrap -->
			        </div><!-- /.clock-item -->
			    </div><!-- /.clock -->
			</div><!-- /.countdown-wrapper -->
				<div class="text-big">Launching Soon!</div>
				<div class="text-small">Investing in properties is going to be so much easier and affordable.<br> Leave your email here and we will show you how!</div>
				<div class="form-field-wrapper clearfix">
					<form method="post">
												<div class="form-field email-wrapper">
							<input type="email" name="email" placeholder="Enter your email address"> 
						</div>
						<div class="form-field">
							<input type="submit" name="submit" value="Sign Up">
						</div>
					</form>
				</div>
				
			</div>
			<div class="slides-container">
			  <img src="images/coming-soon.jpg" style="width: 100%;">
			  <!--<img src="images/launching-soon/demo01.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo02.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo03a.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo03b.jpg" style="width: 100%;">-->
			</div>

			<!--nav class="slides-navigation">
			  <a href="#" class="next">Next</a>
			  <a href="#" class="prev">Previous</a>
			</nav-->
		</div>

	</body>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/jquery.easing.1.3.js"></script>
	<script src="js/vendor/query.animate-enhanced.min.js"></script>
	<script src="js/vendor/hammer.min.js"></script>
	<script src="js/vendor/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://clients.in-uat.com/demo/countdownjs/jquery.final-countdown.js"></script>
	<script src="http://clients.in-uat.com/demo/countdownjs/kinetic.js"></script>

	<script>
		$(function() {
		  var $slides = $('#slides');

		  Hammer($slides[0]).on("swipeleft", function(e) {
		    $slides.data('superslides').animate('next');
		  });

		  Hammer($slides[0]).on("swiperight", function(e) {
		    $slides.data('superslides').animate('prev');
		  });

		  $slides.superslides({
		    hashchange: true
		  });
		  var current = new Date().getTime();
            currenttime = Math.floor(current / 1000);
            console.log(currenttime);
            future = new Date("Nov 7, 2018 20:00").getTime();
            futuretime = Math.floor(future / 1000);
            console.log(futuretime);
	    	$('.countdown').final_countdown({
	            'start': currenttime,
	            'end': futuretime,
	            'now': currenttime        
	        });
		});
	</script>
	
	<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
</html>
