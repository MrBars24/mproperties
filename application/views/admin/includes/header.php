<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>MicroProperties | Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/morris/morris.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/jqvmap/jqvmap/jqvmap.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/fastselect/fastselect.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/datetimepicker/zebra_datepicker.min.css'); ?>" rel="stylesheet" type="text/css" />
    
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url('assets/global/css/components.min.css'); ?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url('assets/global/css/plugins.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url('assets/layouts/layout/css/layout.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/layouts/layout/css/themes/microproperties.css'); ?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url('assets/layouts/layout/css/custom.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/layouts/layout/css/extend.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <!-- END THEME LAYOUT STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico" />  -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-57x57.png'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-60x60.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-76x76.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-114x114.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-120x120.png'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-144x144.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-152x152.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/frontend/images/favicon/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/frontend/images/favicon/android-icon-192x192.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/frontend/images/favicon/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/frontend/images/favicon/favicon-96x96.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/frontend/images/favicon/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?php echo base_url('assets/frontend/images/favicon/manifest.json'); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/frontend/images/favicon/ms-icon-70x70.png'); ?>">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/frontend/images/favicon/ms-icon-144x144.png'); ?>">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/frontend/images/favicon/ms-icon-150x150.png'); ?>">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/frontend/images/favicon/ms-icon-310x310.png'); ?>">
        <meta name="theme-color" content="#ffffff">

        <script>
            // var base_url = '<?=base_url()?>';
            // var user_group = <?php echo $this->ion_auth->get_users_groups()->row()->id; ?>;
        </script>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner ">
<!-- BEGIN LOGO -->
<div class="page-logo">
    <a href="<?php echo base_url('admin'); ?>">
    <a href="<?php echo base_url('admin'); ?>"><img src="<?php echo base_url('assets/frontend/images/logo.svg'); ?>" alt="logo" class="logo-default" style="height:30px;"> </a>
    <!--div class="menu-toggler sidebar-toggler">
        <span></span>
    </div-->
</div>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    <span></span>
</a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">
<!-- BEGIN NOTIFICATION DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

<!-- END NOTIFICATION DROPDOWN -->
<!-- BEGIN INBOX DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

<!-- END INBOX DROPDOWN -->
<!-- BEGIN TODO DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

<!-- END TODO DROPDOWN -->
<!-- BEGIN USER LOGIN DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-extended dropdown-notification open" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
        <i class="icon-bell"></i>
        <span class="badge badge-default"></span>
    </a>
    <ul class="dropdown-menu" style="display: none;">
        <!--li class="external">
            <h3>
                <span class="bold">12 pending</span> notifications</h3>
            <a href="page_user_profile_1.html">view all</a>
        </li-->
    </ul>
</li>

<li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="<?php echo base_url('assets/layouts/layout/img/avatar3_small.jpg'); ?>" />
        <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('admin_name'); ?> </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <!--li>
            <a href="page_user_profile_1.html">
                <i class="icon-user"></i> My Profile </a>
        </li-->
        <li class="divider"> </li>
        <li>
            <a href="<?php echo base_url('logout'); ?>">
                <i class="icon-key"></i> Log Out </a>
        </li>
    </ul>
</li>
<!-- END USER LOGIN DROPDOWN -->
<!-- BEGIN QUICK SIDEBAR TOGGLER -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<!--
<li class="dropdown dropdown-quick-sidebar-toggler">
    <a href="javascript:;" class="dropdown-toggle">
        <i class="icon-logout"></i>
    </a>
</li>
->
<!-- END QUICK SIDEBAR TOGGLER -->
</ul>
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->