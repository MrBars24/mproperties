<?php $user_info = $this->Users_model->get_user($this->session->userdata('user_id')); ?>
<!-- <div class="dashed-divider mt-25" id="divider-<?php  echo $counter ?>"></div> -->
<div class="row bank-information" id="bank-<?php echo $counter ?>" style="display: none;">
	<div class="large-6 medium-12 columns">
		<span class="home-body-left-tagline">Bank Information </span>
	</div>
	<div class="large-6 medium-12 columns">

		<div class="form-style"> 
			<div class="custom-form-group">
				<div class="input-holder">
                    <div class="error_msg bank_name_msg"></div>
					<label for="bank_name-<?php echo $counter ?>"><small class="heading">Bank Name</small></label>
					<input type="text" class="account_name" id="bank_name-<?php echo $counter ?>" placeholder="Enter Bank Name" value="" required>
					<a href="javascript:void(0);" class="form-enabler" data-target="#bank_name-<?php echo $counter ?>">CHANGE</a>
				</div>  
		
			</div> 
			<div class="custom-form-group">
				<div class="input-holder">
					<label for="swift_code-<?php echo $counter ?>"><small class="heading">SWIFT Code</small></label>
					<input type="text" class="swift_code" id="swift_code-<?php echo $counter ?>" placeholder="Enter SWIFT Code" required> 
					<a href="javascript:void(0);" class="form-enabler" data-target="#swift_code-<?php echo $counter ?>">CHANGE</a>
				</div>
			</div> 
			<div class="custom-form-group">
				<div class="input-holder">
                    <div class="error_msg acc_no_msg"></div>
					<label for="account_no-<?php echo $counter ?>"><small class="heading">Account Number</small></label>
					<input type="text" class="account_no" id="account_no-<?php echo $counter ?>" placeholder="Enter Account Number" required> 
					<a href="javascript:void(0);" class="form-enabler" data-target="#account_no-<?php echo $counter ?>">CHANGE</a>
				</div>
				
			</div>
			<div class="custom-form-group">
				<div class="input-holder">
                    <div class="error_msg acc_name_msg"></div>
					<label for="account_name-<?php echo $counter ?>"><small class="heading">Account Name</small> <button tooltip="Payments are made to the main account holder. Payment to a third part is not allowed." tooltip-position="top"><i class="fa fa-info-circle" aria-hidden="true"></i></button></label>
					<input type="text" class="account_name" id="account_name-<?php echo $counter ?>" placeholder="Enter Account Name" value="<?=$user_info->first_name.' '.$user_info->last_name?>" readonly> 
					<!-- <a href="javascript:void(0);" class="form-enabler" data-target="#account_name-<?php echo $counter ?>">CHANGE</a> -->
				</div> 
			</div>  
			<!--input hidden for bank id-->
				<input type="hidden" name="bank_account_id-<?php echo $counter?>" id="bank_account_id-<?php echo $counter?>" value="" />

			<div class="btns-holder clearfix">
				<div class="cancle-btn-div">
					<a href="javascript:void(0);" class="cancle-btn">Cancel</a>
				</div>
				<div class="save-btn-div">
					<a href="javascript:void(0);" onClick="bank_save(<?php echo $counter ?>)" class="save-btn">Save</a>
				</div>
				
				<div class="delete-btn-div">
					<a href="javascript:void(0);" class="delete-btn" onClick="delete_user_bank(<?php echo $counter ?>)">Delete</a>
				</div>

			</div>

		</div>
	</div>
</div> 
<div class="dashed-divider" id="divider-<?php  echo $counter ?>"></div>
<script type="text/javascript">
	
	// $('.swift_code, .account_no').on('keyup',function(){
	// 			$('.swift_code').mask('000000');
	// 			$('.account_no').mask('000-000-000');
	// 			});
</script>