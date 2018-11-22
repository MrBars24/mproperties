<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Trades</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Trades</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Trades</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if($trade_id == 0): ?>
                            <a href="#">Add Trade</a>
                        <?php else: ?>
                            <a href="#">Edit Trade</a>
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
                                <i class="icon-grid"></i>Trades
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/transactions/trade_form/'.$trade_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Trade Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Units <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="units" id="units" class="form-control" data-required="1" value="<?php echo $units; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Final Amount <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="final_amount" id="final_amount" class="form-control"
                                                           data-required="1" value="<?php echo $final_amount; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Amount Before Tax <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="amount_before_tax" id="amount_before_tax" class="form-control"
                                                           data-required="1" value="<?php echo $amount_before_tax; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Platform Fee Amount <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="platform_fee_amount" id="platform_fee_amount" class="form-control"
                                                           data-required="1" value="<?php echo $platform_fee_amount; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Tax Percentage <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="tax_percentage" id="tax_percentage" class="form-control"
                                                           data-required="1" value="<?php echo $tax_percentage; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Tax Amount <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="tax_amount" id="tax_amount" class="form-control"
                                                           data-required="1" value="<?php echo $tax_amount; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group status-form">
                                                <label class="control-label col-md-4">Status <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-6 status">
                                                    <?php foreach ($status as $key => $value) {
                                                        $selected = '';
                                                        if (in_array($key, array($selected_status))) $selected = 'checked';?>
                                                        <input type="radio"
                                                               value="<?php echo $key; ?>" <?php echo $selected; ?>
                                                               name="status" <?php echo $value; ?> />
                                                        <?php echo $value; ?>
                                                        <br/>
                                                    <?php } ?>
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
                                        <a href="<?php echo site_url('admin/transactions/trades');?>" class="btn default">Cancel</a>
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