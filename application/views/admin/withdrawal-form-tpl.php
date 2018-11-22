<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Withdrawal</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Transactions</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Withdrawal</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Update Withdrawal</a>
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
                                <i class="icon-grid"></i>Withdrawal Detail
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/transactions/withdrawal_form/'.$id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Withdrawal Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Date of Withdrawal
                                                </label>
                                                <div class="col-md-4">
                                                    <?php echo $date_deposit; ?>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Reference Number
                                                </label>
                                                <div class="col-md-4">
                                                    <?php echo $ref_number; ?>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Amount</label>
                                                <div class="col-md-4">
                                                    <?php echo $amount; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Status <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value='0' <?php echo ($status == 0 ? 'selected' : ''); ?>>Pending</option>
                                                        <option value='1' <?php echo ($status == 1 ? 'selected' : ''); ?>>Approved</option>
                                                        <option value='2' <?php echo ($status == 2 ? 'selected' : ''); ?>>Unsuccesfull</option>
                                                    </select>
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
                                        <a href="<?php echo site_url('admin/transactions/withdrawals');?>" class="btn default">Cancel</a>
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