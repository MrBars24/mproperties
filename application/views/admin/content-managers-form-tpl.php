<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Content Managers</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?=site_url('admin')?>">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/content-managers')?>">Content Managers</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if($user_id == 0): ?>
                            <a href="#">Add Content Manager</a>
                        <?php else: ?>
                            <a href="#">Edit Content Manager</a>
                        <?php endif; ?>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <?php include('includes/notes.php'); ?>
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-grid"></i>Content Manager
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/content-managers/form/'.$user_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Content Manager Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">First Name <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="first_name" id="first_name" class="form-control" data-required="1" value="<?php echo $first_name; ?>" >
                                                </div>
                                            </div>                                        
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Last Name <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="last_name" id="last_name" class="form-control" data-required="1" value="<?php echo $last_name; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">E-mail <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="email" id="email" class="form-control" data-required="1" value="<?php echo $email; ?>">
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Password <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="password" name="password" id="password" class="form-control" data-required="1" value="">
                                                </div>                                        
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Confirm Password <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" data-required="1" value="">
                                                </div>                                        
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Profile Photo
                                                </label>

                                                <div class="col-md-4">
                                                    <?php if (empty($profile_photo)): ?>
                                                        <input type="file" id="profile-photo" name="profile-photo"/>
                                                    <?php else: ?>
                                                        <?php //echo $profile_photo; ?>
                                                        <img src="<?php echo site_url('uploads') . '/profile/' . $profile_photo; ?>">
                                                        <br/><br/>
                                                        <input type="button" value="Change Profile Photo" id="profile-photo-edit"/>
                                                        <input type="file" id="profile-photo" name="profile-photo" style="display: none;"/>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo site_url('admin/admins');?>" class="btn default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>


<script type="text/javascript">

jQuery(document).ready(function() {   
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
    Layout.init(); // init current layout    
});

$("#profile-photo-edit").click(function () {
    $("#profile-photo").trigger('click');
});
</script>