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

		
	</head>

	<style>
	.coming-soon {background-color: #e3e3e3; background-size: cover; background-position: center right;}
	.coming-soon header {background-color: #fff; position: absolute; z-index: 99999999; width: 100%;}
	.coming-soon .logo {top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%);}
	.coming-soon .text {position: absolute; top: 50%; width: 100%; text-align: center; z-index: 99999;}
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
		.coming-soon .text{
			top:40%;
		}
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
		.coming-soon .text{
			top:40%;
		}
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
	</style>
	<body class="coming-soon">

		<header class="clearfix">
			<div class="logo"></div>
		</header>

		<div id="slides">
			<div class="text">
				<div class="text-big">Launching Soon!</div>
				<div class="text-small">Investing in properties is going to be so much easier and affordable.<br> Leave your email here and we will show you how!*</div>
				<div class="form-field-wrapper clearfix">
					<div class="form-field email-wrapper">
						<input type="email" name="email" placeholder="Enter your email address"> 
					</div>
					<div class="form-field">
						<input type="submit" name="submit" value="Sign Up">
					</div>
				</div>
			</div>
			<div class="slides-container">
			  <img src="images/coming-soon.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo01.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo02.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo03a.jpg" style="width: 100%;">
			  <img src="images/launching-soon/demo03b.jpg" style="width: 100%;">
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
		});
	</script>
</html>
