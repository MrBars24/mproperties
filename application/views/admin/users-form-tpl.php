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
                        <a href="index.html">Dashboard </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Users</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if($user_id == 0): ?>
                            <a href="#">Add User</a>
                        <?php else: ?>
                            <a href="#">Edit User</a>
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
                                <i class="icon-grid"></i>User
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php echo form_open_multipart('admin/users/form/'.$user_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
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
                                                           value="<?php echo $first_name; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Last Name <span class="required">
                                                    </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control" data-required="1"
                                                           value="<?php echo $last_name; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Phone <span class="required" required>
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="phone" id="phone" class="form-control" data-required="1" value="<?php echo $phone; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Date of Birth <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dob" id="dob" class="form-control" data-required="1" value="<?php echo $dob; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Country of Birth <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="country_of_birth" class="form-control" required>
                                                        <option selected="true" disabled="disabled">Country of Birth* (Select one)</option>
                                                        <?php foreach($countries as $country): ?>
                                                            <option value="<?=$country->printable_name?>" <?=($nationality == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">U.S Residence<span class="required">
                                                            </span> 
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input required type="radio" <?=$us_resident == "1" ? "checked" : "" ?> class="form-check-input" name="us_residence" id="us_residence" value="1">
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input required type="radio" <?=$us_resident == "0" ? "checked" : "" ?> class="form-check-input" name="us_residence" id="us_residence" value="0">
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
                                                    <select name="nationality" class="form-control" required>
                                                        <option selected="true" disabled="disabled">Nationality* (Select one)</option>
                                                        <?php foreach($countries as $country): ?>
                                                            <option value="<?=$country->printable_name?>" <?=($nationality == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
                                                        <?php endforeach; ?>
                                                    </select> 
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
                                                <select name="country_of_residence" class="form-control" required>
                                                    <option selected="true" disabled="disabled">Country of Residence* (Select one)</option>
                                                    <?php foreach($countries as $country): ?>
                                                        <option value="<?=$country->printable_name?>" <?=($residence_country == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Postal Code <span class="required" >
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="postal_code" id="postal_code" class="form-control" data-required="1" value="<?php echo $postal_code; ?>" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Unit Number <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="unit_number" id="unit_number" class="form-control" data-required="1" value="<?php echo $unit_number; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Address <span class="required">
                                                    </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="address" id="address" class="form-control" data-required="1" value="<?php echo $address; ?>"required>
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
                                                                <input type="radio" <?=$employment_status == "employee" ? "checked" : "" ?> class="form-check-input" name="employment_status" id="employment_status" value="employee" required>
                                                                Employee
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input type="radio" <?=$employment_status == "self-employed" ? "checked" : "" ?> class="form-check-input" name="employment_status" id="employment_status" value="self-employed" required>
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
                                                    <select name="occupation" class="form-control" required>
                                                        <option selected="true" disabled="disabled">Occupation* (Select one)</option>
                                                        <option value="account_finance" <?=($occupation == 'account_finance') ? "selected" : "" ?>>Account/Finance</option>
                                                        <option value="consulting" <?=($occupation == 'consulting') ? "selected" : "" ?>>Consulting</option>
                                                        <option value="engineering" <?=($occupation == 'engineering') ? "selected" : "" ?>>Engineering</option>
                                                        <option value="executive_senior_management" <?=($occupation == 'executive_senior_management') ? "selected" : "" ?>>Executive/ Senior Management</option>
                                                        <option value="government_military" <?=($occupation == 'government_military') ? "selected" : "" ?>>Government / Military</option>
                                                        <option value="retired" <?=($occupation == 'retired') ? "selected" : "" ?>>Retired </option>
                                                        <option value="professional_services" <?=($occupation == 'professional_services') ? "selected" : "" ?>>Professional Services</option>
                                                        <option value="research_development" <?=($occupation == 'research_development') ? "selected" : "" ?>>Research & Development</option>
                                                        <option value="sales_advertising_marketing" <?=($occupation == 'sales_advertising_marketing') ? "selected" : "" ?>>Sales / Advertising / Marketing</option>
                                                        <option value="student" <?=($occupation == 'student') ? "selected" : "" ?>>Student </option>
                                                        <option value="unemployed" <?=($occupation == 'unemployed') ? "selected" : "" ?>>Unemployed </option>
                                                        <option value="others" <?=($occupation == 'others') ? "selected" : "" ?>>Others </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="control-label col-md-2">Annual Income Level<span class="required">
                                                        </span>
                                                </label>
                                                <div class="col-md-4">
                                                <select name="annual_income" class="form-control" required> 
                                                    <option selected="true" disabled="disabled">Annual Income Level* (Select one)</option>
                                                    <option value="<30000" <?=($annual_income == "<30000") ? "selected" : "" ?>>Less than $30,000 </option>
                                                    <option value="30,000-60,000" <?=($annual_income == "30,000-60,000") ? "selected" : "" ?>>$30,000 - $60,000</option>
                                                    <option value="60,001-100,000" <?=($annual_income == "60,001-100,000") ? "selected" : "" ?>>$60,001 - $100,000</option>
                                                    <option value="100,001-150,000" <?=($annual_income == "100,001-150,000") ? "selected" : "" ?>>$100,001 - $150,000</option>
                                                    <option value="150,001-200,000" <?=($annual_income == "150,001-200,000") ? "selected" : "" ?>>$150,001 - $200,000 </option>
                                                    <option value="200,001-300,000" <?=($annual_income == "200,001-300,000") ? "selected" : "" ?>>$200,001 - $300,000</option>
                                                    <option value=">300,000" <?=($annual_income == ">300,000") ? "selected" : "" ?>>Above $300,000 </option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="control-label col-md-2">Accredited Investor<span class="required">
                                                            </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_accredited_investor == "1" ? "checked" : "" ?> class="form-check-input" name="is_accredited_investor" id="is_accredited_investor" value="1" required>
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_accredited_investor == "0" ? "checked" : "" ?> class="form-check-input" name="is_accredited_investor" id="is_accredited_investor" value="0" required>
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
                                                            <input type="radio" <?=$is_holding_public_office == "1" ? "checked" : "" ?> class="form-check-input" name="is_holding_public_office" id="is_holding_public_office" value="1" required>
                                                            Yes
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" <?=$is_holding_public_office == "0" ? "checked" : "" ?> class="form-check-input" name="is_holding_public_office" id="is_holding_public_office" value="0" required>
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
                                                    <?=$account_fund_source?>
                                                    <select name="account_fund_source" class="form-control" required>
                                                        <option selected="true" disabled="disabled">Source of Account Funds* (Select one)</option>
                                                        <?php foreach($employment as $emp): ?>
                                                            <option value="<?=$emp?>" <?=($account_fund_source == $emp) ? "selected" : "" ?>><?=$emp?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                                           data-required="1" value="<?php echo $email; ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Password <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="password" name="password" id="password" class="form-control"
                                                           data-required="1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Confirm Password <span class="required">
                                                    * </span>
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                                                           data-required="1">
                                                </div>
                                            </div>
                                            
                                            <?php if($user_id != 0): ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Identification
                                                </label>

                                                <div class="col-md-4">
                                                    <?php if (empty($id_scan)): ?>
                                                        <input type="file" name="id_scan">
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
                                                        <input type="file" name="id_scan_back">
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
                                                        <input type="file" name="billing_scan">
                                                    <?php else: ?>
                                                        <img src="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $billing_scan; ?>" width="100px">
                                                        <br>
                                                        <a href="<?php echo site_url('uploads') . '/documents/' . $user_id . '/' . $billing_scan; ?>" download>
                                                            Download
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Identification
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="file" name="id_scan">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Identification Back
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="file" name="id_scan_back">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Proof of Address
                                                </label>

                                                <div class="col-md-4">
                                                    <input type="file" name="billing_scan">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a href="<?php echo site_url('admin/users');?>" class="btn default">Cancel</a>
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

$("#dob").Zebra_DatePicker({
    format: 'Y-m-d'
});


</script>