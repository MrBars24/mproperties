<?php 
	if(isset($_GET['c'])){
		$c = $_GET['c']; 
	}else{
		$c = 'na';
	}
 ?>
<div class="dashed-divider mt-25"></div>
<div class="row bank-information" id="bank-<?php echo $c ?>" style="display: none;">
	<div class="large-6 medium-12 columns">
		<span class="home-body-left-tagline">Bank Information </span>
	</div>
	<div class="large-6 medium-12 columns">
		<div class="form-style"> 
			<div class="custom-form-group">
				<div class="input-holder">
					<label for="bank_name-<?php echo $c ?>"><small class="heading">Bank Name</small></label>
					<input type="text" class="bank_name" id="bank_name-<?php echo $c ?>" placeholder="Enter Bank Name" value="CITIBANK Singapore Ltd">
					<div class="bank_logo_wrapper">
						<img src="./images/bank_logo/citibank.png" alt="citibank" class="bank-logo">
					</div>
					<a href="javascript:void(0);" class="form-enabler" data-target="#bank_name-<?php echo $c ?>">CHANGE</a>
				</div>  
				<div class="bank-choices">
					<div data-bank="citibank">
						
					</div>
				</div>
			</div> 
			<div class="custom-form-group">
				<div class="input-holder">
					<label for="swift_code-<?php echo $c ?>"><small class="heading">SWIFT Code</small></label>
					<input type="text" class="swift_code" id="swift_code-<?php echo $c ?>" placeholder="Enter SWIFT Code" > 
					<a href="javascript:void(0);" class="form-enabler" data-target="#swift_code-<?php echo $c ?>">CHANGE</a>
				</div>
				
			</div> 
			<div class="custom-form-group">
				<div class="input-holder">
					<label for="account_no-<?php echo $c ?>"><small class="heading">Account Number</small></label>
					<input type="text" class="account_no" id="account_no-<?php echo $c ?>" placeholder="Enter Account Number"> 
					<a href="javascript:void(0);" class="form-enabler" data-target="#account_no-<?php echo $c ?>">CHANGE</a>
				</div>
				
			</div>
			<div class="custom-form-group">
				<div class="input-holder">
					<label for="account_name-<?php echo $c ?>"><small class="heading">Account Name</small></label>
					<input type="text" class="account_name" id="account_name-<?php echo $c ?>" placeholder="Enter Account Name"> 
					<a href="javascript:void(0);" class="form-enabler" data-target="#account_name-<?php echo $c ?>">CHANGE</a>
				</div> 
			</div>  
			<div class="btns-holder clearfix">
				<div class="cancle-btn-div">
					<a href="#" class="cancle-btn">Cancel</a>
				</div>
				<div class="save-btn-div">
					<a href="#" class="save-btn">Save</a>
				</div>
			</div>
		</div>
	</div>
</div> 