<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Users</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Users</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if($user_id == 0): ?>
                            <a href="#">Add Bank</a>
                        <?php else: ?>
                            <a href="#">Edit Bank</a>
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
                                <i class="icon-grid"></i>Bank
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/users/bank/form/'.$bank_account_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Bank Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Bank Name <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="bank_name" id="bank_name" class="form-control" data-required="1" value="<?php echo $bank_name; ?>" >
                                                </div>
                                            </div>                                        
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Swift Code <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="swift_code" id="swift_code" class="form-control" data-required="1" value="<?php echo $swift_code; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Account Number <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="account_no" id="account_no" class="form-control" data-required="1" value="<?php echo $account_no; ?>">
                                                </div>
                                            </div>    
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Account Name <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="account_name" id="account_name" class="form-control" data-required="1" value="<?php echo $account_name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo site_url('admin/users/bank/details').'/'.$user_id;?>" class="btn default">Cancel</a>
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

</script>