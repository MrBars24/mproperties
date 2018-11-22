<?php include('includes/header.php'); ?>
<style>
.form-control {
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    background-color: #fff;
    border: 1px solid #c2cad8;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.fstResults span, .fstControls div{
    font-size: 12px;
}

.fstQueryInput{
    font-size: 12px!important;
}
</style>
<!-- <pre> -->
<?php 
//print_r($images);
//exit;

?>
<!-- </pre> -->
<div class="page-container">
    <?php include('includes/sidebar.php'); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Property</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Property</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if($property_id == 0): ?>
                            <a href="#">Add Property</a>
                        <?php else: ?>
                            <a href="#">Edit Property</a>
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
                                <i class="icon-grid"></i>Property <?php echo $listed_at ?>
                            </div>
                        </div>
                        <div class="portlet-body form" id="country-container">
                            <?php if($this->session->flashdata()): ?>
                                <?php foreach($this->session->flashdata() as $flashdata): ?>
                                <div class="alert alert-success">
                                    <?php echo $flashdata; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php echo form_open_multipart('admin/property/form/'.$property_id, array('class'=>'form-horizontal', 'id'=>'company_form')); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Property Details</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Listing ID <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="listing_id" id="listing_id" class="form-control" data-required="1" value="<?php echo $listing_id; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Listed at<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="listed_at" id="listed_at" class="form-control" data-required="1" value="<?php echo $property_id != 0 ? date("Y-m-d H:i:s", strtotime($listed_at)) : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Property Name <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_name" id="property_name" class="form-control" data-required="1" value="<?php echo $property_name; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Property Size(SQ. FT.) <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_size" id="property_size" class="form-control" data-required="1" value="<?php echo $property_size != "" ? number_format($property_size, 2) : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Price / SQ. FT. <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" required name="property_sqft" id="property_sqft" class="form-control" data-required="1" value="<?php echo $property_sqft !="" ? number_format($property_sqft, 2) : ""; ?>" readonly="readonly">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Address <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input required name="address" id="address" class="form-control" data-required="1" value="<?php echo $address; ?>">
                                                    <input type="hidden" value="<?php echo $lat ?>" id="lat" name="lat">
                                                    <input type="hidden" value="<?php echo $lng ?>" id="lng" name="lng">
                                                    <!-- <input type="hidden" value="<?php echo $postalcode; ?>" id="postal" name="postal"> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Postal Code <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" value="<?php echo $postalcode; ?>" id="postal" name="postal" readonly class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">District <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select required name="district_id" id="district_id" class="form-control" data-required="1">
                                                        <option value="">Select District</option>
                                                        <?php 
                                                
                                                        foreach($districts as $district): 
                                                        ?>
                                                        <option value="<?php echo $district->district_id; ?>" <?php echo ($district_id == $district->district_id ? 'selected' : ''); ?>><?php echo "District ".$district->district_number." - ".$district->district_name; ?></option>
                                                        <?php
                                                    
                                                        endforeach; 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- 

                                             -->
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Bedrooms <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_bedrooms" id="property_bedrooms" class="form-control" data-required="1" value="<?php echo $property_bedrooms; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Bath <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_bath" id="property_bath" class="form-control" data-required="1" value="<?php echo $property_baths; ?>">                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Top <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_top" id="property_top" class="form-control" data-required="1" value="<?php echo $property_top; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Description <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea required name="property_description" id="property_description" class="form-control" data-required="1" cols="10" rows="10"><?php echo $property_description; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Property Tags</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Tags <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-10">
                                                   <!-- <input type="text" name="property_tags" id="property_tags" class="form-control typeahead" data-required="1" value="<?php echo $property_tags; ?>" data-role="tagsinput"> -->
                                                    <select multiple="multiple" name="property_tags[]" id="property_tags">
                                                        <?php 
                                                            $tags = ['Income', 'Growth', 'Entry', 'Value', 'Luxury', 'New Release'];
                                                            $property_tag = empty($property_tags) ? [] :explode(",", $property_tags);
                                                            foreach ($tags as $key => $tag):
                                                                if($tag == $property_tag[$key]){
                                                                    $selected = 'selected';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                        
                                                        ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $tag ?>"><?php echo $tag?></option>  
                                                        <?php
                                                            endforeach;
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Development Details</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Developer <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="developer" id="developer" class="form-control" data-required="1" value="<?php echo $developer; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-5">Floor Level <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="property_floor_level" id="property_floor_level" class="form-control" data-required="1" value="<?php echo $property_floor_level; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Furnishing <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="property_furnishing" id="property_furnishing" class="form-control" data-required="1" value="<?php echo $property_furnishing; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Tenure <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="property_tenure" id="property_tenure" class="form-control" data-required="1" value="<?php echo $property_tenure; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Tenancy Terms <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="property_years" id="property_years" class="form-control" data-required="1" value="<?php echo $property_years; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Strata Fee <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" required name="strata_fee" id="strata_fee" class="form-control" data-required="1" value="<?php echo $strata_fee; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <?php

                                    $locked = $is_locked == 1 ? "readonly" : ""; 
                                
                                ?>
                                <div class="col-md-6">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Trust Accounts</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <!-- <div class="form-group">
                                                <label class="control-label col-md-7">Rental (%) <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <input type="text" required name="property_rental" id="property_rental" class="form-control" data-required="1" value="<?php echo $rental; ?>">
                                                </div>
                                            </div>  -->
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Unit Issued <span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="units_issued" id="units_issued" class="form-control" data-required="1" value="<?php echo $units_issued != "" ? number_format($units_issued, 2) : ""; ?>"  <?=$locked?>>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Property Price ($)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="property_price" id="property_price" class="form-control" data-required="1" value="<?php echo $property_price != "" ? number_format($property_price, 2) : ""; ?>" <?=$locked?>>
                                                </div>
                                            </div>                                        
                                            
                                            <div class="form-group" style="display:none;">
                                                <label class="control-label col-md-7">Ammortised Tax per Months (%)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="ammortised_tax_months" id="ammortised_tax_months" class="form-control" data-required="1" value="<?php echo $ammortised_tax_months != "" ? number_format($ammortised_tax_months, 2) : ""; ?>" <?=$locked?>>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display:none;">
                                                <label class="control-label col-md-7">Platform Fee Percentage (%)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="platform_fee_percentage" id="platform_fee_percentage" class="form-control" data-required="1" value="<?php echo $platform_fee_percentage != "" ? number_format($platform_fee_percentage, 2) : ""; ?>" <?=$locked?>>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-7">NAV ($)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="nav" id="nav" class="form-control" data-required="1" value="<?php echo $nav != "" ? number_format($nav, 2) : ""; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Price Per Unit ($)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="price_per_unit" id="price_per_unit" class="form-control" data-required="1" value="<?php echo $price_per_unit != "" ? number_format($price_per_unit, 2) : ""; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Setup cost (%)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="set_up_cost_p" id="set_up_cost_p" class="form-control" data-required="1" value="<?php echo $setup_cost_percentage; ?>" <?=$locked?>>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Setup cost ($)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="set_up_cost" id="set_up_cost" class="form-control" data-required="1" value="<?php echo $setup_cost != "" ? number_format($setup_cost, 2) : $setup_cost; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Cash buffer %<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="cash_buffer_p" id="cash_buffer_p" class="form-control" data-required="1" value="<?php echo $cash_buffer_percentage; ?>" <?=$locked?>>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Cash buffer ($)<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="cash_buffer" id="cash_buffer" class="form-control" data-required="1" value="<?php echo $cash_buffer != "" ? number_format($cash_buffer, 2) : $cash_buffer; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Tax<span class="required">
                                                    * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required name="tax" id="tax" class="form-control" data-required="1" value="<?= $tax != "" ? number_format($tax, 2) : ""; ?>" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Cash Account</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <h2 class="text-center cash-text">$<?=$cash_account != "" ? number_format($cash_account, 2) : 0;?></h2>
                                            <!-- <input type="hidden" value="" id="cash_type" name="cash_type">
                                            <input type="hidden" value="" id="cash_amount" name="cash_amount">
                                            <input type="hidden" value="" id="cash_date" name="cash_date">
                                            <input type="hidden" value="" id="cash_description" name="cash_description"> -->
                                           
                                            <?php if($property_id != 0): ?>
                                                <div class="text-center">
                                                    <a href="<?=base_url()?>admin/property/transactions/<?=$trust_id?>">Transaction Records</a>
                                                </div>
                                                <a href="javascript:void(0)" class="pull-left btn btn-primary btn-sm" onclick="income_expense('income')"><i class="fa fa-plus"></i> Income</a>
                                                <a href="javascript:void(0)" class="pull-right btn btn-danger btn-sm" id="modal-expense" onclick="income_expense('expense')"><i class="fa fa-minus"></i> Expense</a>
                                            <?php endif; ?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> NAV</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <h2 class="text-center nav-text">$<?=$nav != "" ? number_format($nav, 2) : 0?></h2>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject bold font-yellow-casablanca uppercase"> Rental</span>
                                            </div>
                                        </div>
                                        <div id="rental-res"></div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Rental($) <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" name="rental_amount" id="rental_amount" class="form-control" data-required="1" <?=$property_id == 0 ? "required" : "" ?>>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-5">Rental(%) <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" name="rental_percentage" id="rental_percentage" class="form-control" data-required="1" readonly <?=$property_id == 0 ? "required" : "" ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Contract Start Date <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" name="start_date" id="start_date" class="form-control" data-required="1" <?=$property_id == 0 ? "required" : "" ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Contract End Date <span class="required">
                                                * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <input type="text" name="end_date" id="end_date" class="form-control" data-required="1" <?=$property_id == 0 ? "required" : "" ?>>
                                            </div>
                                        </div>
                                        <?php if($property_id != 0): ?>
                                            <a href="javascript:void(0)" class="pull-left btn btn-primary btn-sm" id="add-contract"><i class="fa fa-plus"></i>Add Contract</a>
                                            <a href="javascript:void(0)" class="pull-right btn" onclick="showCollectModal()"> Click to view past contracts</a>
                                        <?php endif; ?>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>                           
                            </div>

                            <div class="row">
                                 <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>
                                            <span class="caption-subject bold font-yellow-casablanca uppercase"> Images </span>
                                        </div>                                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                            <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
                                                <i class="fa fa-plus"></i> Select Files </a>
                                            <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                                                <i class="fa fa-share"></i> Upload Files </a>
                                        </div>

                                        <div class="row">
                                            <div id="tab_images_uploader_filelist" class="col-md-12 col-sm-12"> </div>
                                        </div>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th>  </th>
                                                    <th class="text-center"> Label </th>                                                                
                                                    <th class="text-center"> Alt </th>
                                                    <th class="text-center"> Order </th>
                                                    <th class="text-center"> Default </th>
                                                    <th class="text-center"> 360 </th>
                                                    <th class="text-center"> Link to 360insta.com </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody id="gc_photos">
                                                <?php
                                                //print_r($images);
                                                if(!empty($images))
                                                {
                                                    foreach($images as  $image)
                                                    {
                                                        $image_id = $image->image_id;
                                                        $chk = '';
                                                        $is_360 = '';
                                                        if($image->is_default == 1)
                                                        {
                                                            $chk = 'checked=checked';
                                                        }
                                                        if($image->is_360 == 1)
                                                        {
                                                            $is_360 = 'checked=checked';
                                                        }

                                                ?>
                                                     <tr id="product_image_<?php echo $image_id;?>" onclick="is_threesixty('<?php echo $image_id;?>')">
                                                        <td>
                                                            <input type="hidden" required name="images[<?php echo $image_id;?>][filename]" value="<?php echo $image->filename;?>"/>
                                                            <input type="hidden" required name="images[<?php echo $image_id;?>][image_id]" value="<?php echo $image->image_id;?>"/>
                                                            <img class="gc_thumbnail" src="<?php echo base_url("uploads/images/thumbnails") . '/' . $image->filename; ?>" style="padding:5px; border:1px solid #ddd"/>
                                                        </td>
                                                        <td>
                                                            <input name="images[<?php echo $image_id;?>][caption]" value="<?php echo $image->caption;?>" class="form-control" placeholder="<?php echo $image->caption;?>"/>
                                                        </td>
                                                        <td>
                                                            <input name="images[<?php echo $image_id;?>][alt]" value="<?php echo $image->alt;?>" class="form-control" placeholder="<?php echo $image->alt;?>"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="images[<?php echo $image_id;?>][sort_order]" value="<?php echo $image->sort_order; ?>">
                                                        </td>
                                                        <td class="text-center">
                                                            <label><input type="radio" name="primary_image" value="<?php echo $image_id;?>" <?php echo $chk;?>/> </label>
                                                        </td> 
                                                        <td class="text-center">
                                                            <label><input type="checkbox" name="is_360[<?php echo $image_id;?>]" value="1" <?php echo $is_360;?> class="is_360"/> </label>
                                                        </td>
                                                        <td class="text-center">
                                                            <label><input type="text" name="images[<?php echo $image_id;?>][link]" class="image-link" value="<?=$image->link?>" <?php echo $image->is_360 == "1" ? "required" : "disabled";?>/> </label>
                                                        </td>        
                                                        <td class="text-center">
                                                            <a href="#remove_portlet" class="btn btn-default btn-sm" rel="<?php echo $image_id;?>" data-toggle="modal" data-img-id="<?php echo $image_id;?>" data-type="img">
                                                                <i class="fa fa-times"></i> Remove </a>
                                                        </td>
                                                    </tr>    

                                                <?php
                                                    }
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                                                                                                                             
                                    </div>
                                </div>
                            </div>                                                         
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><?php echo ($property_id != 0) ? "Save & Continue Edit" : "Submit"; ?></button>
                                        <a href="<?php echo site_url('admin/property');?>" class="btn default">Back</a>
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

<div id="income_expense_modal" class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <?=form_open('admin/Property/expense_income/'.$trust_id)?>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Amount<span class="required">
                                * </span>
                            </label>
                            <input type="text" class="form-control" name="amount" id="cash_amount" required>         
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Date<span class="required">
                                * </span>
                            </label>
                            <input type="date" class="form-control" name="date" id="cash_date" required>         
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Description<span class="required">
                                * </span>
                            </label>
                            <textarea name="description" id="cash_description" cols="30" rows="10" class="form-control" required></textarea>
                        </div> 
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
                    </div> 
                    <input type="hidden" name="modal_cash_type" id="modal_cash_type">
                    <input type="hidden" name="property_id" value="<?=$property_id?>">                            
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline expense_income_cancel">Cancel</button>
                <button type="submit" class="btn red">Save</button>  
            </div>
            <?=form_close()?>

        </div>
    </div>
</div>

<div id="collection_modal" class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="rental-table">
                                <thead>
                                    <tr>
                                        <th>Rental Payment</th>
                                        <th>Rental Percentage</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($rental_collections)): ?>
                                        <?php foreach($rental_collections as $collect): ?>
                                            <tr>
                                                <td><?=number_format($collect->rental_payment, 2); ?></td>
                                                <td><?=number_format($collect->rental_pct, 2)."%"; ?></td>
                                                <td><?=$collect->rental_contract_start_date; ?></td>
                                                <td><?=$collect->rental_contract_end_date; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>                             
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline expense_income_cancel">Close</button>
            </div>
        </div>
    </div>
</div>




<div id="rental_modal" class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
         <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Rental Contract.</h4>
        </div>
        <div class="modal-content">
            <?=form_open("")?>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Amount<span class="required">
                                    * </span>
                                </label>
                                <input type="text" class="form-control" name="amount" id="cash_amount" required>         
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Date<span class="required">
                                    * </span>
                                </label>
                                <input type="date" class="form-control" name="date" id="cash_date" required>         
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Description<span class="required">
                                    * </span>
                                </label>
                                <textarea name="description" id="cash_description" cols="30" rows="10" class="form-control" required></textarea>
                            </div> 
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
                        </div> 
                        <input type="hidden" name="modal_cash_type" id="modal_cash_type">
                        <input type="hidden" name="property_id" value="<?=$property_id?>">                            
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline expense_income_cancel">Cancel</button>
                    <button type="submit" class="btn red">Save</button>  
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="remove_portlet" class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="modal-msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                <button type="button" data-dismiss="modal" class="btn red modal-btn-confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>


<script type="text/javascript">

function showCollectModal()
{
    $("#collection_modal").modal();
}

function is_threesixty(id)
{
    var tr = $("#product_image_"+id);
    var check = tr.find("input[type=checkbox]");
    var link = tr.find(".image-link");

    check.on("change", function(){
        if($(this).is(":checked")){
            link.removeAttr("disabled");
            link.attr("required", "required");
        }else{
            link.attr("disabled", "disabled");
        }
    });
    
}


$(function(){
    
    

    $("#rental-table").dataTable();

    $("#add-contract").on("click", function(e){
        
        $.ajax({
            url: '<?=base_url()?>admin/property/ajax/insert_rental_collections',
            type: "POST",
            data: {
                property_id: <?=$this->uri->segment(4); ?>,
                rental_percentage: $("#rental_percentage").val(),
                rental_amount: $("#rental_amount").val(),
                start_date: $("#start_date").val(),
                end_date: $("#end_date").val(),
                <?=$this->security->get_csrf_token_name()?> : '<?=$this->security->get_csrf_hash()?>'
            },
            success: function(res){
                if(res == 1){
                    $("#rental-res").html("<p class='alert alert-success'>Rental added successfully</p>");
                    $("#rental_percentage").val("")
                    $("#rental_amount").val("")
                    $("#start_date").val("")
                    $("#end_date").val("")
                }else if(res == 3){
                    $("#rental-res").html("<p class='alert alert-danger'>Fields are empty</p>");
                }else{
                    $("#rental-res").html("<p class='alert alert-danger'>Wrong</p>");
                }
            }

        });
        
        
        

    });

    $("#rental_amount").on("change", function() {

        var rental = $(this).val() != "" ? parseFloat($(this).val()) : "";
        var pp = $("#property_price").val() != "" ? parseInt($("#property_price").val().replace(/,/g , "")) : "";
        
        $("#rental_percentage").val((((rental * 12) / pp) * 100).toFixed(2));
    });

    $("#rental_amount").on('focus', function(){
        var price = $(this).val()
        price = price.replace(/,/g , "");
        $(this).val(price)
    });

    $("#rental_amount").on('focusout', function(){
        var price = $(this).val()
        $(this).val(numeral(price).format('0,0.00'))
    });

    $("#start_date").Zebra_DatePicker({
        format: 'Y-m-d H:i:s'
    });

    $("#end_date").Zebra_DatePicker({
        format: 'Y-m-d H:i:s'
    });


    $('#property_tags').fastselect();

    $(".expense_income_cancel").click(function(){
        $("#cash_amount").val("");
        $("#cash_description").val("");
        $("#cash_date").val("");
    });

});

function income_expense(type)
{
    $("#income_expense_modal").modal();
    $("#income_expense_modal .modal-title").text("Add " + type);
    $("#modal_cash_type").val(type);
}

function rental_modal(){
    $("#rental_modal").modal();
}

var EcommerceProductsEdit = function () {

    var handleImages = function () {

        // see http://www.plupload.com/
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',

            browse_button: document.getElementById('tab_images_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself

            url: base_url + 'admin/Property/product_image_pupload',

            filters: {
                max_file_size: '10mb',
                mime_types: [
                    {title: "Image files", extensions: "jpg,gif,png,jpeg"}
                ]
            },
            multipart_params: {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            },
            // Flash settings
            flash_swf_url: 'assets/plugins/plupload/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url: 'assets/plugins/plupload/js/Moxie.xap',

            init: {
                PostInit: function () {
                    $('#tab_images_uploader_filelist').html("");

                    $('#tab_images_uploader_uploadfiles').click(function () {
                        uploader.start();
                        return false;
                    });

                    $('#tab_images_uploader_filelist').on('click', '.added-files .remove', function () {
                        uploader.removeFile($(this).parent('.added-files').attr("id"));
                        $(this).parent('.added-files').remove();
                    });
                },

                FilesAdded: function (up, files) {
                    plupload.each(files, function (file) {
                        $('#tab_images_uploader_filelist').append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
                    });
                },

                UploadProgress: function (up, file) {
                    $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
                },

                FileUploaded: function (up, file, response) {
                    var response = $.parseJSON(response.response);

                    if (response.result && response.result == 'OK') {
                        var id = response.id; // uploaded file's unique name. Here you can collect uploaded file names and submit an jax request to your server side script to process the uploaded files and update the images tabke

                        $('#gc_photos').append(response.template);
                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-success").html('<i class="fa fa-check"></i> Done'); // set successfull upload

                    } else {
                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed'); // set failed upload
                        /*
                        Metronic.alert({
                            type: 'danger',
                            message: 'One of uploads failed. Please retry.',
                            closeInSeconds: 10,
                            icon: 'warning'
                        });
                        */
                    }
                },

                Error: function (up, err) {
                    //Metronic.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
                }
            }
        });

        uploader.init();

    }


    var handleProductImage = function () {

         $('#remove_portlet').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)

         var image_id = button.data('imgId');

         var modal = $(this)

         modal.find('.modal-title').html('Remove Product Image');
         modal.find('.modal-msg').html('Are you sure you want to delete image from this product? .');
         modal.find('.modal-btn-confirm').attr('onclick','EcommerceProductsEdit.removeProductImage(\''+image_id+'\')');

         })
    }


    return {

        //main function to initiate the module
        init: function () {
            //initComponents();

            handleImages();
            //handleReviews();
            //handleHistory();
            //handleRemovePortlet();
            handleProductImage();
        },
        removeProductAttribute: function (option_id, option_name, portlet) {

            if (option_id != '') {
                /*
                Metronic.blockUI({
                    target: '.tab-content',
                    animate: true
                });
                */

                $.post(base_url + 'products/ajax/remove_product_attribute', {
                    'product_id': $('#product_id').val(),
                    'option_id': option_id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }, function (data) {
                    Cafebond.removePortlet($('#portlet_' + option_name));
                    $("#optionTypes").children('option[value=' + option_name + ']').removeAttr("disabled");
                    attribute_action();
                    //Metronic.unblockUI('.tab-content');
                });
            } else {
                Cafebond.removePortlet($('#portlet_' + option_name));
                $("#optionTypes").children('option[value=' + option_name + ']').removeAttr("disabled");
                attribute_action();
            }
        },
        removeProductVaration: function (variation_id, option_name, portlet) {

            if (variation_id != '') {
                /*
                Metronic.blockUI({
                    target: '.tab-content',
                    animate: true
                });
                */


                $.post(base_url + 'products/ajax/remove_product_variation', {
                    'product_id': $('#product_id').val(),
                    'variation_id': variation_id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }, function (data) {
                    Cafebond.removePortlet($('#portlet_' + option_name));

                    //Metronic.unblockUI('.tab-content');
                });
            } else {
                Cafebond.removePortlet($('#portlet_' + option_name));

            }
        },
        removeProductCustomField: function (customfield_id, customfield_name, portlet) {
            if (customfield_id != '') {
                /*
                Metronic.blockUI({
                    target: '#customfield-container',
                    animate: true
                });
                */

                $.post(base_url + 'products/ajax/remove_product_customfields', {
                    'product_id': $('#product_id').val(),
                    'customfield_id': customfield_id,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }, function (data) {
                    Cafebond.removePortlet($('#portlet_' + customfield_name));
                    $("#customFieldTypes").children('option[value=' + customfield_name + ']').removeAttr("disabled");
                    customfield_action();
                    //Metronic.unblockUI('#customfield-container');
                });
            } else {
                Cafebond.removePortlet($('#portlet_' + customfield_name));
                $("#customFieldTypes").children('option[value=' + customfield_name + ']').removeAttr("disabled");
                customfield_action();
            }

            customfield_action();
            loadCustomFields();
        }, removeProductImage: function (img_id) {

            var property_id = <?php echo $this->uri->segment(4); ?>;
            $('#product_image_' + img_id).remove();
            
            if(property_id != 0){
                window.location.href = base_url + "admin/Property/delete_property_image/"+property_id+"/"+img_id;
            }
            //$.post("admin/Property/delete_property_image/"+property_id+"/"+img_id);
            

        }

    };


}();



function update_price_per_unit()
{
    var units_issued = $("#units_issued").val() === "" ? 0 : parseFloat($("#units_issued").val());
    var nav = $("#nav").val() === "" ? 0 : $("#nav").val();
    if(nav != 0){
        nav = parseFloat(nav.replace(/,/g , ""));
    }
    var ppu = nav / units_issued;

    $("#price_per_unit").val(numeral(ppu).format('0,0.00'));

}

function updateNAV()
{   
    var price =  $("#property_price").val() === "" ? 0 : $("#property_price").val();
    price = parseFloat(price.replace(/,/g , ""));
    var cash = $("#cash_buffer").val() === "" ? 0 : $("#cash_buffer").val();
    cash = parseFloat(cash.replace(/,/g , ""));
    var setups = $("#set_up_cost").val() === "" ? 0 : $("#set_up_cost").val();
    if(setups != 0) {
        setups = parseFloat(setups.replace(/,/g , ""));
    }
    
    var tax = $("#tax").val() === "" ? 0 : $("#tax").val();
    if(tax != 0) {
        tax = parseFloat(tax.replace(/,/g , ""));
    }

    var compute = price + tax + cash + setups;

    $('#tax').val(numeral(tax).format('0,0.00'));
    $("#nav").val(numeral(compute).format('0,0.00'));
    $(".nav-text").text("$"+numeral(compute).format('0,0.00'));
}

function cash_buffer(){
    var price = $("#property_price").val() === "" ? 0 : $("#property_price").val();
    price = price.replace(/,/g , "");

    var ammortised_tax_months = $("#cash_buffer_p").val() === "" ? 0 : parseFloat($("#cash_buffer_p").val() / 100.00);
    var cash = $("#cash_buffer");
    cash.val(numeral(price * ammortised_tax_months).format('0,0.00'));
    $(".cash-text").text("$"+numeral(price * ammortised_tax_months).format('0,0.00'));
}

function setup_cost() {
    var price = $("#property_price").val() === "" ? 0 : $("#property_price").val();
    price = price.replace(/,/g , "");

    var setup = $("#set_up_cost_p").val() === "" ? 0 : parseFloat($("#set_up_cost_p").val() / 100.00);
    var cash = $("#set_up_cost");
    cash.val(numeral(price * setup).format('0,0.00'));
}

function price_per_sqft()
{
    var property_price = $("#property_price").val() === "" ? 0 : parseFloat($("#property_price").val().replace(/,/g , ""));
    var property_size = $("#property_size").val() === "" ? 0 : parseFloat($("#property_size").val());
    var temp = numeral(property_price / property_size).format('0,0.00');
    $("#property_sqft").val(temp);
}

function tax()
{
    /**
    * BSD
    * PURCHASE PRICE | RATE | AMOUNT
    * 180k			  | 1%   | 1,800
    * 180k			  | 2%   | 3,600
    * 640k			  | 3%   | 19,200
    * Amount remain  | 4%   | property_value - 1,000,000
    */
    var $pp = $("#property_price").val();
    $pp = parseFloat($pp.replace(/,/g , ""));
    var bsd = {
        'first' : Math.min($pp * 0.01, 1800),
        'second' : Math.min($pp * 0.02, 3600),
        'third' : Math.min($pp * 0.03, 19200),
        'remain' : Math.max(($pp - 1000000) * 0.04, 0)
    }

    //   Property_value * 0.25 
    // + MIN(B3*0.01,1800)
    // + MIN((B3-180000)*0.02,3600)
    // + MIN((B3-360000)*0.03,19200)
    // + MAX((B3-1000000)*0.04,0)

			
    var price = $("#property_price").val() != "" ? parseFloat(($pp * 0.25) + bsd.first + bsd.second + bsd.third + bsd.remain) : 0;
    $("#tax").val((price).toFixed(2));
}

jQuery(document).ready(function () {
    // initiate layout and plugins
    //Metronic.init(); // init metronic core components
    // Layout.init(); // init current layout
    EcommerceProductsEdit.init();

    // $("#company_form").submit(function(e){
    //     e.preventDefault();
    // });
    
    $("#set_up_cost").on('change', function(){
        updateNAV();
    });

    //  $("#set_up_cost").on('focus', function(){
    //     var price = $(this).val()
    //     price = price.replace(/,/g , "");
    //     $(this).val(price)
    // });

    // $("#set_up_cost").on('focusout', function(){
    //     var price = $(this).val()
    //     $(this).val(numeral(price).format('0,0.00'))
    // });

    $("#property_price").on('change', function(){
        tax();
        cash_buffer()
        update_price_per_unit();
        price_per_sqft();
        updateNAV();
    });

    $("#property_price").on('focus', function(){
        var price = $(this).val()
        price = price.replace(/,/g , "");
        $(this).val(price)
    });

    $("#property_price").on('focusout', function(){
        var price = $(this).val()
        $(this).val(numeral(price).format('0,0.00'))
    });

    $("#cash_buffer_p").on('change', function(){
        cash_buffer();
        update_price_per_unit();
        updateNAV();
    });

    $('#set_up_cost_p').on('change', function() {
        setup_cost();
        update_price_per_unit();
        updateNAV();
    })

    $("#property_size").on('change', function(){
        price_per_sqft();
    });

    $("#property_size").on('focus', function(){
        var size = $(this).val()
        size = size.replace(/,/g , "");
        $(this).val(size)
    });

    $("#property_size").on('focusout', function(){
        var size = $(this).val()
        $(this).val(numeral(size).format('0,0.00'))
    });


    $("#ammortised_tax_months").on('change', function(){  
        tax();
        updateNAV();
        update_price_per_unit();
        cash_buffer();
    })

    // $("#cash_buffer").on('change', function(e){
    //     var cash = $(this).val() === "" ? 0 : parseFloat($(this).val());
    //     var price = $("#property_price").val() === "" ? 0 : parseFloat($("#property_price").val());
    //     updateNAV(price, cash);
    //     update_price_per_unit();
    // });

    $("#units_issued").on('change', function(e){
        update_price_per_unit();
    });


 
    $("#cash_amount").on('focus', function(){
        var amount = $(this).val();
        amount = amount.replace(/,/g , "");
        $(this).val(amount);
    });

    $("#cash_amount").on('focusout', function(){
        var amount = $(this).val();
        $(this).val(numeral(amount).format('0,0.00'));
    });



});


function remove_image(img) {
    if (confirm('Confirm remove image')) {
        var id = img.attr('rel');

        console.log(img.attr('rel'));
        $('#gc_photo_' + id).remove();
    }
}

$(function(){
        $("#listed_at").Zebra_DatePicker({
            format: 'Y-m-d H:i:s'
        });
});


</script>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAUnmq_rZa0KOPBeZQFnT2DMeUvtL2q7dM&libraries=places" type="text/javascript"></script>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('address').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);
            //console.log(place.address_components);
            for (var i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "postal_code") {
                        document.getElementById('postal').value = place.address_components[i].long_name;
                    }
                }
            }

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUnmq_rZa0KOPBeZQFnT2DMeUvtL2q7dM&libraries=places&callback=initAutocomplete" -->
        <!-- async defer></script> -->