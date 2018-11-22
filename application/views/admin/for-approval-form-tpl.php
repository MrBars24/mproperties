<?php include('includes/header.php'); ?>

<div class="page-container">
<style>
.fstResults span, .fstControls div{
    font-size: 12px;
}

.fstQueryInput{
    font-size: 12px!important;
}

</style>
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">For Approval</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?=site_url('admin')?>">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">For Approval</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Edit</a>
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
                                <i class="icon-grid"></i>For Approval
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/forApproval/form/'.$user_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase">Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">First Name <span class="required">
                                                    </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control" data-required="1"
                                                           value="<?php echo $first_name; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Last Name <span class="required">
                                                    </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control" data-required="1"
                                                           value="<?php echo $last_name; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Phone <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="phone" id="phone" class="form-control" data-required="1" value="<?php echo $phone; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Date of Birth <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dob" id="dob" class="form-control" data-required="1" value="<?php echo $dob; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Country of Birth <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="country_of_birth" id="country_of_birth" class="form-control" data-required="1" value="<?php echo $country_of_birth; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">U.S Residence<span class="required">
                                                            </span> 
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$us_resident == 1 ? "checked" : "" ?> class="form-check-input" name="us_residence" id="us_residence" value="1">
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$us_resident == 0 ? "checked" : "" ?> class="form-check-input" name="us_residence" id="us_residence" value="0">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Nationality <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nationality" id="nationality" class="form-control" data-required="1" value="<?php echo $nationality; ?>">
                                                </div>
                                            </div>
<!--
                                           End Personal Information
-->                                        
<!--
                                            Residential Address
--> 
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Country of Residence <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="country_of_residence" id="postal_code" class="form-control" data-required="1" value="<?php echo $residence_country; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Postal Code <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="postal_code" id="postal_code" class="form-control" data-required="1" value="<?php echo $postal_code; ?>">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Unit Number <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="unit_number" id="unit_number" class="form-control" data-required="1" value="<?php echo $unit_number; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Address <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="address" id="address" class="form-control" data-required="1" cols="10" rows="5"><?php echo $address; ?></textarea>
                                                </div>
                                            </div>
<!--
                                            End Residential Address
--> 
<!--
                                           Occupation Details
--> 
                                            <div class="form-group">
                                                <div class="form-check">
                                                        <label class="control-label col-md-2">Employment Status<span class="required">
                                                                </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <label class="form-check-label">
                                                                <input type="radio" <?=$employment_status == "employee" ? "checked" : "" ?> class="form-check-input" name="employment_status" id="employment_status" value="Employee">
                                                                Employee
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input type="radio" <?=$employment_status == "self-employed" ? "checked" : "" ?> class="form-check-input" name="employment_status" id="employment_status" value="Self-employed">
                                                                Self-Employed
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group">
                                                 <label class="control-label col-md-2">Occupation<span class="required">
                                                        </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="occupation" id="occupation" class="form-control" data-required="1" value="<?php echo $occupation; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-md-2">Annual Income Level<span class="required">
                                                        </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="occupation" id="occupation" class="form-control" data-required="1" value="<?php echo $annual_income; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">Accredited Investor<span class="required">
                                                            </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_accredited_investor == 1 ? "checked" : "" ?> class="form-check-input" name="is_accredited_investor" id="is_accredited_investor" value="1">
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_accredited_investor == 0 ? "checked" : "" ?> class="form-check-input" name="is_accredited_investor" id="is_accredited_investor" value="0">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">Holding Public Office<span class="required">
                                                            </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_holding_public_office == 1 ? "checked" : "" ?> class="form-check-input" name="is_holding_public_office" id="is_holding_public_office" value="1">
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_holding_public_office == 0 ? "checked" : "" ?> class="form-check-input" name="is_holding_public_office" id="is_holding_public_office" value="0">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-md-2">Source of Account funds<span class="required">
                                                        </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="account_fund_resource" id="account_fund_resource" class="form-control" data-required="1" value="<?php echo $account_fund_source; ?>">
                                                </div>
                                            </div>
                                            
    

<!--
                                           End Occupation Details
--> 
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-2">E-mail <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="email" id="email" class="form-control"
                                                           data-required="1" value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Identification
                                                </label>

                                                <div class="col-md-4">
                                                    <?php if (empty($id_scan)): ?>

                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $id_scan; ?>" width="100px">
                                                        <br>
                                                        <a href="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $id_scan; ?>" download>
                                                            Download
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Identification Back
                                                </label>

                                                <div class="col-md-4">
                                                    <?php if (empty($id_back_scan)): ?>

                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $id_back_scan; ?>" width="100px">
                                                        <br>
                                                        <a href="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $id_back_scan; ?>" download>
                                                        Download
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Proof of Address
                                                </label>

                                                <div class="col-md-4">
                                                    <?php if (empty($billing_scan)): ?>

                                                    <?php else: ?>
                                                        <img src="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $billing_scan; ?>" width="100px">
                                                        <br>
                                                        <a href="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $billing_scan; ?>" download>
                                                            Download
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group status-form">
                                                
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">Status <span class="required">
                                                        * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input for_approval_status" name="for_approval_status"  value="1">
                                                            Approve
                                                        </label><br>
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input for_approval_status" name="for_approval_status" value="2">
                                                            Reject
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-4 for_approval-status">
                                                    <?php// foreach ($for_approval_status as $key => $value) {
                                                       // $selected = '';
                                                        //if (in_array($key, array($selected_for_approval_status))) $selected = 'checked';?>
                                                        <input type="radio"
                                                               value="<?php //echo $key; ?>" <?php //echo $selected; ?>
                                                               name="for_approval_status" <?php //echo $value; ?> />
                                                        <?php //echo $value; ?>
                                                        <br/>
                                                    <?php //} ?>
                                                </div> -->
                                            </div>

                                            <div class="form-group rejected-fields" style="display: none;">    
                                                <label class="control-label col-md-2">Rejected Fields
                                                </label>
                                                <div class="col-md-10">
                                                    <select multiple="multiple" name="rejected_fields[]" id="rejected_fields">
                                                    <?php 
                                                        foreach ($reject_fields as $fields):?>
                                                        <option value="<?= $fields ?>"><?= $fields ?></option>  
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group for-approval-status-form" style="display: none;">
                                                <label class="control-label col-md-2">Reason for rejection<span
                                                        class="required">
                                                    </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <div class="si-form">
                                                        <textarea type="text" name="reason_for_rejection" id="reason_for_rejection" class="form-control"><?php echo $reason_for_rejection; ?></textarea>
                                                    </div>
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
                                        <a href="<?php echo site_url('admin/forApproval');?>" class="btn default">Cancel</a>
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
$('#rejected_fields').fastselect();

jQuery(document).ready(function() {   
   // initiate layout and plugins
   //Metronic.init(); // init metronic core components
    // Layout.init(); // init current layout    
});

$(function () {
    $(".for_approval_status").change(function(){
        if($(this).is(':checked')){
            if($(this).val() == 1){
                $('.for-approval-status-form').hide();
                $('#reason_for_rejection').removeAttr("required");
                
                $('.rejected-fields').hide();
            }else if(($(this).val() == 2)){
                $('.for-approval-status-form').show();
                $('#reason_for_rejection').attr("required");
                $('.rejected-fields').show();
            }
        };
    });
    // if ($('.for_approval_status [value=2]').is(':checked')) {
    //     $('.for-approval-status-form').show();

    // } else {
    //     $('.for-approval-status-form').hide();
    // }
});


// $('.for_approval-status input').on('click', function () {

//     if ($('.for_approval-status [value=2]').is(':checked')) {
//         $('.for-approval-status-form').show();

//     } else {
//         $('.for-approval-status-form').hide();

//     }
// });

</script>