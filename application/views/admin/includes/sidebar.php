<?php
$ci =& get_instance();
$ci->load->model('Users_model');

$user_info = $ci->Users_model->get_user_group($_SESSION['user_id']);

$user_menu = array();
if($user_info->group_id == 8){
    $user_menu = array(
        'transactions' => '',
        'orders' => '',
        'trades' => '',
        'deposits' => '',
        'property_management' => '',
        'listings' => '',
        'admins' => '',
        'users' => '',
        'account_managers' => '',
        'property_managers' => '',
        'content_managers' => '',
        'real_estate_agents' => '',
        'escrow_managers' => '',
        'promoters' => ''
    );
}

if($user_info->group_id == 9){
    $user_menu = array(
        'orders' => '',
        'trades' => '',
        'property_management' => '',
        'listings' => '',
        'admins' => '',
        'users' => '',
        'account_managers' => '',
        'property_managers' => '',
        'content_managers' => '',
        'real_estate_agents' => '',
        'escrow_managers' => '',
        'promoters' => '',
        'user_management' => ''
    );
}
?>

<!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <li class="sidebar-toggler-wrapper hide">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
            <span></span>
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
    </li>

    <li class="nav-item start <?php echo menu::getSelected('dashboard', $user_menu); ?>">
        <a href="<?php echo site_url('admin/'); ?>" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li class="nav-item start <?php echo menu::getSelected('transactions', $user_menu); ?> ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-map"></i>
            <span class="title">Transactions</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item start <?php echo menu::getSelected('orders', $user_menu); ?>">
                <a href="<?php echo site_url('admin/transactions/orders'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Orders</span>
                </a>
            </li>           
            <li class="nav-item start <?php echo menu::getSelected('trades', $user_menu); ?>">
                <a href="<?php echo site_url('admin/transactions/trades'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Trades</span>
                </a>
            </li>   
            <li class="nav-item start <?php echo menu::getSelected('deposits', $user_menu); ?>">
                <a href="<?php echo site_url('admin/transactions/deposits'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Deposits</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('deposits', $user_menu); ?>">
                <a href="<?php echo site_url('admin/transactions/withdrawals'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Withdrawals</span>
                </a>
            </li>
        </ul>        
    </li>

    <li class="nav-item start <?php echo menu::getSelected('property_management', $user_menu); ?>">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-map"></i>
            <span class="title">Property Management</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item start <?php echo menu::getSelected('listings', $user_menu); ?>">
                <a href="<?php echo site_url('admin/property/listings'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Property Listings</span>
                </a>
            </li> 
            <li class="nav-item start <?php echo menu::getSelected('listings', $user_menu); ?>">
                <a href="<?=base_url()?>admin/property/rental-collections" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Rental Collections</span>
                </a>
            </li>
            <!-- <li class="nav-item start <?php echo menu::getSelected('listings', $user_menu); ?>">
                <a href="#" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Cash Account</span>
                </a>
            </li> -->
            <li class="nav-item start <?php echo menu::getSelected('listings', $user_menu); ?>">
                <a href="<?php echo site_url('admin/property/distribution-table'); ?>" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">Distribution</span>
                </a>
            </li>       
            <!-- <li class="nav-item start <?php echo menu::getSelected('listings', $user_menu); ?>">
                <a href="#" class="nav-link ">
                    <i class="icon-docs"></i>
                    <span class="title">NAV and Platform Fee</span>
                </a>
            </li>      -->
        </ul>
    </li>

    <li class="nav-item start <?php echo menu::getSelected('user_management', $user_menu); ?>">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-users"></i>
            <span class="title">User Management</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item start <?php echo menu::getSelected('admins', $user_menu); ?>">
                <a href="<?php echo site_url('admin/admins'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Admins</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('users', $user_menu); ?>">
                <a href="<?php echo site_url('admin/users'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('for_approval', $user_menu); ?>">
                <a href="<?php echo site_url('admin/forApproval'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">For Approval</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('account_managers', $user_menu); ?>">
                <a href="<?php echo site_url('admin/account-managers'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Account Managers</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('property_managers', $user_menu); ?>">
                <a href="<?php echo site_url('admin/property-managers'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Property Managers</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('content_managers', $user_menu); ?>">
                <a href="<?php echo site_url('admin/content-managers'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Content Managers</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('real_estate_agents', $user_menu); ?>">
                <a href="<?php echo site_url('admin/real-estate-agents'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Real Estate Agents</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('escrow_managers', $user_menu); ?>">
                <a href="<?php echo site_url('admin/escrow-managers'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Escrow Managers</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('escrow_managers', $user_menu); ?>">
                <a href="<?php echo site_url('admin/know-your-client'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">KYC Managers</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('promoters', $user_menu); ?>">
                <a href="<?php echo site_url('admin/promoters'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Promoters</span>
                </a>
            </li>
            <li class="nav-item start <?php echo menu::getSelected('promoters', $user_menu); ?>">
                <a href="<?php echo site_url('admin/subscribers'); ?>" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">Subscribers</span>
                </a>
            </li>      
                    
        </ul>
    </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->

