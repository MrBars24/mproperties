<?php include("application/views/includes/header.php"); ?>
<?php include("application/views/includes/menu.php"); ?>
	<div class="large-8 small-12 medium-10 align-center setting">
		<div class="setting">
			<div class="row">
				<div class="large-12 medium-12 columns">
					<div class="setting-title">
						My Profile
						<span class="setting-info-text">Please fill in all your details correctly and accurately as they are needed for our internal processes.</span>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-8 medium-8 align-center mb-padding">
					<!-- <progress max="100" value="25"></progress> -->
					<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100">
						<div class="progress-meter" style="width: <?=$user_summary['total_percent']?>%"></div>
					</div>
					<div class="completed-percent">
						<span><?=$user_summary['total_percent']?></span>% complete.
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-12 medium-12 columns">
					<?php if($account->kyc_status == null): ?>
					<div class="validation-info">
						<div class="row align-middle">
							<div class="large-2 medium-2 small-12 columns align-self-middle">
								<div class="icon-wrapper">
									<img src="<?=site_url('assets\frontend\images/validate-icon.png')?>">
								</div>
							</div>
							<div class="large-7 medium-6 small-12 columns align-self-middle">
								<div class="validate-alert-text">
									<h4>Validate your account</h4>
									<p>
										Complete your profile and validate your account to start investing. Validation process takes about <span>3 working days</span>. Once your account is validated, you will be notified via email and the website.
									</p>
								</div>
							</div>
							<div class="large-3 medium-4 small-12 columns align-self-middle">
								<div class="validate-btn-wrap">
									<!-- <a href="javascript:void(0)" class="validate-btn">Validate account</a> -->
								</div>
							</div>
						</div>
					</div>
					<?php elseif($account->kyc_status == 0): ?>
					<div class="validation-info">
						<div class="row align-middle">
							<div class="large-2 medium-2 small-12 columns align-self-middle">
								<div class="icon-wrapper">
									<img src="<?=site_url('assets\frontend\images/validate-icon2.png')?>">
								</div>
							</div>
							<div class="large-7 medium-6 small-12 columns align-self-middle">
								<div class="validate-alert-text">
									<h4>Validation in Progress</h4>
									<p>
										Your account is in the process of validation. You may ammend your details if you wish to and click on the validate account button again. If you encounter any problems drop us an email at <a href="mailto:hello@mymicroproperties.com">hello@mymicroproperties.com</a>
									</p>
						
								</div>
								
							</div>
							<div class="large-3 medium-4 small-12 columns align-self-middle">
								<div class="validate-btn-wrap">
									<!-- <a href="" class="validate-btn">Validate account</a> -->
								</div>
							</div>
						</div>
					</div>
					<?php elseif($account->kyc_status == 1): ?>
					<div class="validation-info">
						<div class="row align-middle">
							<div class="large-2 medium-2 small-12 columns align-self-middle">
								<div class="icon-wrapper">
									<img src="<?=site_url('assets\frontend\images/validate-icon3.png')?>">
								</div>
							</div>
							<div class="large-7 medium-6 small-12 columns align-self-middle">
								<div class="validate-alert-text">
									<h4>Account Validated!</h4>
									<p>
										Account Validated! Your account has been validated and you may start investing with MicroProperties!  If you wish to ammend the details, do not hesitate to drop us an email at <a href="mailto:hello@mymicroproperties.com">hello@mymicroproperties.com</a>  
									</p>
									<p>
										<a href="<?=base_url()?>properties"> Browse properties here!</a>
									</p>								
								</div>
							</div>
							<div class="large-3 medium-4 small-12 columns align-self-middle">
								<div class="validate-btn-wrap">
									<!-- <a href="" class="validate-btn">Validate account</a> -->
								</div>
							</div>
						</div>
					</div>
					<?php elseif($account->kyc_status == 2): ?>
					<div class="validation-info">
						<div class="row align-middle">
							<div class="large-2 medium-2 small-12 columns align-self-middle">
								<div class="icon-wrapper">
									<img src="<?=site_url('assets\frontend\images/validate-icon.png')?>">
								</div>
							</div>
							<div class="large-7 medium-6 small-12 columns align-self-middle">
								<div class="validate-alert-text">
									<h4>Account Rejected</h4>
									<p>
										Please complete the following details and click on the Validate button.
									</p>
									<p>
										The following fields are rejected : <b><?=$account->rejected_fields?></b>
									</p>
									<p>
										Reason for rejection : <b><?=$account->reason_for_rejection?></b>
									</p>
								</div>
							</div>
							<div class="large-3 medium-4 small-12 columns align-self-middle">
								<div class="validate-btn-wrap">
									<!-- <a href="" class="validate-btn">Validate account</a> -->
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php
			$state = ($account->kyc_status == 1) ? "readonly" : "";
			$submit_state = ($account->kyc_status == 1) ? "hidden" : "";

			if($this->session->flashdata('message')):
			?>
			<div class="row">
				<div class="large-12 medium-12 columns">
					<div class="callout <?=($this->session->flashdata('message')['status']) ? 'success' : 'alert'?>">
						<div class="success-msg-text">
							<h4>
								<?=$this->session->flashdata('message')['message']?>
							</h4>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?=form_open_multipart('account/action/update_all_information', ['class' => 'row'])?>
				<ul class="accordion relative" data-accordion>
					<!-- Account Information -->
					<li class="accordion-item medium-12 columns relative" data-accordion-item>
						<a href="#" class="accordion-title account-info">
							<span class="right-status blue-text">Edit</span>
							<span class="home-body-left-tagline">
							Account Information <span class="filling-form-status green-text">Completed</span><br>
							<small>* Please do not leave this blank.</small>

							</span>
						</a>
						<div class="accordion-content" data-tab-content >
							<div class="row">
								<div class="medium-12 columns">
									<div class="form-style">
										<input name="email" type="email" placeholder="Email*" value="<?=$account->email?>">
										<div class="relative pwd-holder">
											<input name="password" type="password" placeholder="Password*">
											<input type="hidden" name="is_changepass" value="0" />
											<a type="submit" class="form-enabler btn-change-password">CHANGE PASSWORD</a>
										</div>
									
										<input type="checkbox" name="receive_letter" <?=($account->newsletter) ? 'checked' : '' ?> > <label>Subscribe to our monthly newsletter</label>
										<div class="btns-holder clearfix">
											<div class="cancle-btn-div">
												<a href="#" class="cancle-btn">Cancel</a>
											</div>
											<div class="save-btn-div">
												<a type="submit" class="save-btn save-account">Save</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- END Account Information -->
					<div class="clearfix"></div>
					<!-- Personal Information -->
					<li class="accordion-item medium-12 columns relative" data-accordion-item>
						<a href="#" class="accordion-title"> 
							<span class="right-status blue-text"><?=($user_summary['personal']=='required') ? 'Complete' : 'Edit'?></span>
							<span class="home-body-left-tagline">
							Personal Information <span class="filling-form-status <?=($user_summary['personal']=='required') ? 'red' : 'green'?>-text"><?=ucfirst($user_summary['personal'])?></span><br>
							<small>* Please do not leave this blank.</small>
							</span>
						</a>
						<div class="accordion-content" data-tab-content >
							<div class="row">
								<div class="medium-12 columns">
									<div class="form-style">
										<div class="error_msg first_err"></div>
										<input name="first_name" type="text" placeholder="First Name" value="<?=$account->first_name?>" <?=$state?> id="first_name">
										<div class="error_msg last_err"></div>
										<input name="last_name" type="text" placeholder="Last Name/SurName*" value="<?=$account->last_name?>" <?=$state?> id="last_name">
										<!-- <input type="number" placeholder="Identification  Number*"> -->
										<div class="error_msg phone_err"></div>
										<input name="phone" type="number" placeholder="Contact Number*" value="<?=$account->phone?>" <?=$state?> id="contact_number">
										<div class="error_msg dob_err"></div>
										<input name="dob" type="date" placeholder="Date of Birth*" value="<?=$account->dob?>" <?=$state?> id="dob">
										<div class="error_msg cob_err"></div>
										<select name="country" <?=$state?> id="country" required>
											<option selected="true" disabled="disabled" value="">Country of Birth* (Select one)</option>
											<?php foreach($countries as $country): ?>
												<option value="<?=$country->printable_name?>" <?=($account->country == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
											<?php endforeach; ?>
										</select>
										<!-- <input type="number" placeholder="Postal Code*">
										<input type="text" placeholder="Address Line*">
										<input type="text" placeholder="Unit Number*"> -->
										
										<div class="us-status-question">
											Are you a resident in the US for tax purposes, or born in the US?* 
											<small>(This site is not sed ut perspiciatis unde omnis iste natus error sit voluptatem)</small>
										</div>
										<div class="error_msg us_tax_err"></div>
										<div class="us-option" id="us-option">
											<div>
												<input type="radio" name="us" value="1" id="us-yes" <?=($account->us_resident == '1') ? "checked" : "" ?> <?=$state?>>
												<label>Yes</label>
											</div>
											<div>
												<input type="radio" name="us" value="0" id="us-no" <?=($account->us_resident == '0') ? "checked" : "" ?> <?=$state?>>
												<label>No</label>
											</div>
										</div>
										<div class="error_msg us_error" style="display: none;">
											<div>Sorry we will not accept applicants who have the following U.S. person indicias: 
												<ol type="1">
													<li>U.S. citizenship or U.S. permanent resident (green card) status </li>
													<li>A U.S. residence and/or mailing address </li>
													<li>A U.S. Taxpayer Identification Number (TIN)</li>
												</ol>
											</div>
										</div>
										<div class="error_msg nat_err" style="margin-top:5px;"></div>
										<select name="nationality" class="nationality" <?=$state?> id="nationality">
											<option disabled="disabled" selected="true" value="">Nationality* (Select one)</option>
											<?php foreach($countries as $country): ?>
												<option value="<?=$country->printable_name?>" <?=($account->country == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
											<?php endforeach; ?>
										</select>
									
										
										<div class="btns-holder clearfix" <?=$submit_state?>>
											<div class="cancle-btn-div">
												<a href="#" class="cancle-btn">Cancel</a>
											</div>
											<div class="save-btn-div">
												<a href="javascript:void(0)" class="save-btn save-personal">Save</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- END Personal Information -->
					<div class="clearfix"></div>
					<!-- Residential Address -->
					<li class="accordion-item medium-12 columns relative" data-accordion-item>
						<a href="#" class="accordion-title"> 
							<span class="right-status blue-text"><?=($user_summary['residential']=='required') ? 'Complete' : 'Edit'?></span>
							<span class="home-body-left-tagline">
							Residential Address <span class="filling-form-status <?=($user_summary['residential']=='required') ? 'red' : 'green'?>-text"><?=ucfirst($user_summary['residential'])?></span><br>
							<small>* Please do not leave this blank.</small>
							</span>
						</a>
						<div class="accordion-content" data-tab-content >
							<div class="row">
								<div class="medium-12 columns">
									<div class="form-style">
										<div class="error_msg res_err"></div>
										<select name="residence" <?=$state?> id="residence">
											<option selected="true" disabled="disabled">Country of Residence* (Select one)</option>
											<?php foreach($countries as $country): ?>
												<option value="<?=$country->printable_name?>" <?=($account->residence_country == $country->printable_name) ? "selected" : "" ?>><?=$country->printable_name?></option>
											<?php endforeach; ?>
										</select>
										<div class="error_msg postal_err"></div>
										<input type="text" name="postal-code" placeholder="Postal Code*" value="<?=$account->postal_code?>" <?=$state?> id="postal_code">
										<div class="error_msg add_err"></div>
										<input type="text" name="address-line" placeholder="Address Line*" value="<?=$account->address?>" <?=$state?> id="address_line">
										<div class="error_msg unit_err"></div>
										<input type="text" name="unit-number" placeholder="Unit Number*" value="<?=$account->unit_no?>" <?=$state?> id="unit_number">
										<div class="btns-holder clearfix" <?=$submit_state?>>
											<div class="cancle-btn-div">
												<a href="#" class="cancle-btn">Cancel</a>
											</div>
											<div class="save-btn-div">
												<a href="javascript:void(0);" class="save-btn save-residential">Save</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- END Residential Address -->
					<div class="clearfix"></div>
					<!-- Occupation Details -->
					<li class="accordion-item medium-12 columns relative" data-accordion-item>
						<a href="#" class="accordion-title"> 
							<span class="right-status blue-text"><?=($user_summary['occupation']=='required') ? 'Complete' : 'Edit'?></span>
							<span class="home-body-left-tagline">
								Occupation Details <span class="filling-form-status <?=($user_summary['occupation']=='required') ? 'red' : 'green'?>-text"><?=ucfirst($user_summary['occupation'])?></span><br>
								<small>* Please do not leave this blank.</small>
							</span>
						</a>
						<div class="accordion-content" data-tab-content >
							<div class="row">
								<div class="medium-12 columns">
									<div class="form-style">
										
										<div class="employee-status">
											<div class="employee-status-question">
												Are you an employee or self-employed?* 
											</div>
											<div class="error_msg emp_err"></div>
											<div class="employee-status-option">
												<div>
													<input type="radio" name="employee-type" value="employee" <?=($account->employment_status == 'employee') ? "checked" : "" ?> <?=$state?>>
													<label>Employee</label>
												</div>
												<div>
													<input type="radio" name="employee-type" value="self-employed" <?=($account->employment_status == 'self-employed') ? "checked" : "" ?> <?=$state?>>
													<label>Self-Employed</label>
												</div>
											</div>
										</div>
										<div class="error_msg occ_err"></div>
										<select name="occupation" <?=$state?> id="occupation">
											<option selected="true" disabled="disabled">Occupation* (Select one)</option>
											<option value="account_finance" <?=($account->occupation == 'account_finance') ? "selected" : "" ?>>Account/Finance</option>
											<option value="consulting" <?=($account->occupation == 'consulting') ? "selected" : "" ?>>Consulting</option>
											<option value="engineering" <?=($account->occupation == 'engineering') ? "selected" : "" ?>>Engineering</option>
											<option value="executive_senior_management" <?=($account->occupation == 'executive_senior_management') ? "selected" : "" ?>>Executive/ Senior Management</option>
											<option value="government_military" <?=($account->occupation == 'government_military') ? "selected" : "" ?>>Government / Military</option>
											<option value="retired" <?=($account->occupation == 'retired') ? "selected" : "" ?>>Retired </option>
											<option value="professional_services" <?=($account->occupation == 'professional_services') ? "selected" : "" ?>>Professional Services</option>
											<option value="research_development" <?=($account->occupation == 'research_development') ? "selected" : "" ?>>Research & Development</option>
											<option value="sales_advertising_marketing" <?=($account->occupation == 'sales_advertising_marketing') ? "selected" : "" ?>>Sales / Advertising / Marketing</option>
											<option value="student" <?=($account->occupation == 'student') ? "selected" : "" ?>>Student </option>
											<option value="others" <?=($account->occupation == 'others') ? "selected" : "" ?>>Others </option>
										</select>
										<div class="error_msg inc_err"></div>
										<select name="annual_income" <?=$state?> id="annual_income">
											<option selected="true" disabled="disabled">Annual Income Level* (Select one)</option>
											<option value="<30000" <?=($account->annual_income == "<30000") ? "selected" : "" ?>>Less than $30,000 </option>
											<option value="30,000-60,000" <?=($account->annual_income == "30,000-60,000") ? "selected" : "" ?>>$30,000 - $60,000</option>
											<option value="60,001-100,000" <?=($account->annual_income == "60,001-100,000") ? "selected" : "" ?>>$60,001 - $100,000</option>
											<option value="100,001-150,000" <?=($account->annual_income == "100,001-150,000") ? "selected" : "" ?>>$100,001 - $150,000</option>
											<option value="150,001-200,000" <?=($account->annual_income == "150,001-200,000") ? "selected" : "" ?>>$150,001 - $200,000 </option>
											<option value="200,001-300,000" <?=($account->annual_income == "200,001-300,000") ? "selected" : "" ?>>$200,001 - $300,000</option>
											<option value=">300,000" <?=($account->annual_income == ">300,000") ? "selected" : "" ?>>Above $300,000 </option>

										</select>
										<div class="investor-status">
											<div class="investor-question">
												Are you an Accredited Investor?*
												<span rel="tooltip" title="Include the following persons:
													<ol type='1'>
													<li>
														Individuals whose net personal assets exceed SGD 2,000,000 or its equivalent in foreign currency or such other amount as the Monetary Authority of Singapore (“MAS”) may prescribe, the value of their primary residence not accounting for more than SGD 1,000,000 of net personal assets, such value calculated by deducting any outstanding amount on any credit facility secured from the residence from the estimated fair market value of the residence;
													</li>
													<li>
														Individuals whose income in the preceding 12 months is not less than SGD 300,000 or such other amount as MAS may prescribe in place of the first amount; 
													</li>
													<li>
														Individuals whose financial assets as legislatively defined net of related liabilities exceed SGD 1,000,000 or its equivalent in foreign currency or such other amount as MAS may prescribe in place of the first amount
													</li>
													</ol>"><i class="fa fa-info-circle" aria-hidden="true"></i>
													</span>
											</div>
											<div class="error_msg accr_err"></div>
											<div class="investor-option">
												<div class="error_msg accredited_error" style="display:none">
													<p>Sorry, our current Capital Market Licence restricts our coverage to only
													Accredited Investors. Whilst we are unable to validate your account as this stage, please stay
													tuned for our further developments. 
													</p>
												</div>
												<div>
													<input type="radio" name="accredited" value="1" <?=($account->is_accredited_investor == '1') ? "checked" : "" ?> <?=$state?> id="accredited_yes">
													<label>Yes</label>
												</div>
												<div>
													<input type="radio" name="accredited" value="0" <?=($account->is_accredited_investor == '0') ? "checked" : "" ?> <?=$state?> id="accredited_no">
													<label>No</label>
												</div>
											</div>
										</div>
										<!-- <div class="office-hold-status"> -->
											<!-- <div class="error_msg inc_err"></div> -->
											<div class="office-status-question">
											Are you a Politically Exposed Persons "PEP" / close associate of a PEP / family member of a PEP? 
											<span rel="tooltip" title='PEP means a domestic PEP, foreign PEP or international organisation PEP; "Close associate" means a natural person who is closely connected to a PEP, either socially or professionally; "Domestic PEP" means a natural person who is or has been entrusted domestically with prominent public functions; "Family member" means a parent, step-parent, child, step-child, adopted child, spouse, sibling, step-sibling and adopted sibling of the PEP; "Foreign PEP" means a natural person who is or has been entrusted with prominent public functions in a foreign country; "International organisation" means an entity established by formal political agreements between member countries that have the status of international treaties, whose existence is recognized by law in member countries and which is not treated as a resident institutional unit of the country in which it is located; "International organisation PEP" means a natural person who is or has been entrusted with prominent public functions in an international organization; "Prominent public functions" includes the roles held by a head of state, a head of government, government ministers, senior civil or public servants, senior judicial or military officials, senior executives of state owned corporations, senior political party officials, members of the legislature and senior management of international organisations.'>
												<i class="fa fa-info-circle" aria-hidden="true">
													</i>
											</span>
											
											</div>
											<!-- <div class="error_msg office_error" style="display: none;">
												<p>Please drop us an email directly at hello@mymicroproperties.com</p>
											</div> -->
											<div class="error_msg office_err"></div>
											<div class="office-hold-option">
												<div>
													<input type="radio" name="office" value="1" <?=($account->is_holding_public_office == '1') ? "checked" : "" ?> <?=$state?> id="office-yes">
													<label>Yes</label>
												</div>
												<div>
													<input type="radio" name="office" value="0" <?=($account->is_holding_public_office == '0') ? "checked" : "" ?> <?=$state?> id="office-no">
													<label>No</label>
												</div>
											</div>
										<!-- </div> -->
										<div class="error_msg fund_err"></div>
										<select name="fund_source" <?=$state?> class="fund_source" id="fund_source">
											<option selected="true" disabled="disabled">Source of Account Funds* (Select one)</option>
											<?php foreach($employment as $emp): ?>
												<option value="<?=$emp?>" <?=($account->account_fund_source == $emp) ? "selected" : "" ?>><?=$emp?></option>
											<?php endforeach; ?>
										</select>
										<div class="btns-holder clearfix" <?=$submit_state?>>
											<div class="cancle-btn-div">
												<a href="#" class="cancle-btn">Cancel</a>
											</div>
											<div class="save-btn-div">
												<a href="javascript:void(0);" class="save-btn save-occupation">Save</a>
											</div>
										</div>
									</div>
								</div>
							</div>    
						</div>
					</li>
					<!-- END Occupation Details -->
					<div class="clearfix"></div>
					<!-- Documents -->
					<li class="accordion-item medium-12 columns relative" data-accordion-item>
						<a href="#" class="accordion-title"> 
							<span class="right-status blue-text"><?=($user_summary['documents']=='required') ? 'Complete' : 'Edit'?></span>
							<span class="home-body-left-tagline">Documents 
								<span class="filling-form-status <?=($user_summary['documents']=='required') ? 'red' : 'green'?>-text"><?=ucfirst($user_summary['documents'])?></span><br>
								<small>* Please do not leave this blank.</small>
							</span>
						</a>
						<div class="accordion-content" data-tab-content >
							<div class="row">
								<div class="medium-12 columns">
									<div class="identy-holder">
										<div>
											<span class="title">Identification*</span><br>
											<span class="txt">You need to upload copies of your IC or valid Passport here.</span>
											<small>(Filesize max: 2MB, Filesize format: JPG, PNG, PDF)</small>
										</div>
										<div class="upload-files scan-front" id="scan-front">
											<?php if(empty($account->id_scan)): ?>
												<div class="uploaded-file-path"></div>
												<div class="error_msg front_err"></div>
												<input type="file" name="id_scan_front" id="id-scan-front" class="inputfile inputfile-3" accept="image/*,application/pdf">
												<label for="id-scan-front"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>NRIC FRONT</span></label>
												
													<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar-front">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php else: ?>
												<div class="relative">
													<div class="uploaded-file-path">
														<a target="_blank" href="<?php echo site_url('uploads') . '/documents/'.$account->id.'/' . $account->id_scan; ?>"><?php echo $account->id_scan ?></a>
													<!-- <img src="<?php echo site_url('uploads') . '/documents/'.$account->id.'/' . $account->id_scan; ?>" width="100%"> -->
													</div>
													<div class="change-holder">
														<input type="file" name="id_scan_front" id="id-scan-front" class="inputfile inputfile-3" accept="image/*,application/pdf">
														<?php if($account->kyc_status != 1): ?>
														<label for="id-scan-front">Change
														</label>
														<?php endif; ?>
													</div>
												</div>
												<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar-front">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php endif; ?>
										</div>
										
										<div class="upload-files scan-back" id="scan-back">
											<?php if (empty($account->id_scan_back)): ?>
												<div class="uploaded-file-path"></div>
												<div class="error_msg back_err"></div>
												<input type="file" name="id_scan_back" id="id-scan-back" class="inputfile inputfile-3" accept="image/*,application/pdf">
												<label for="id-scan-back"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>NRIC BACK</span></label>
												
													<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar-back">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php else: ?>
												<div class="relative">
													<div class="uploaded-file-path"><a target="_blank" href="<?php echo site_url('uploads') . '/documents/'.$account->id.'/' . $account->id_scan_back; ?>"><?php echo $account->id_scan_back ?></a></div>
													<div class="change-holder">
														<input type="file" name="id_scan_back" id="id-scan-back" class="inputfile inputfile-3" accept="image/*,application/pdf">
														<?php if($account->kyc_status != 1): ?>
														<label for="id-scan-back">Change
														</label>
														<?php endif; ?>
													</div>
												</div>
												<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar-back">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php endif; ?>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="identy-holder mt20">
										<div>
											<span class="title">Proof of Address*</span><br>
											<span class="txt">You need to upload proof of your valid address here.</span>
											<small>(Filesize max: 2MB, Filesize format: JPG, PNG, PDF)</small>
										</div>
										<div class="upload-files scan-address" id="scan-address">
											<?php if (empty($account->billing_scan)): ?>
												<div class="uploaded-file-path"></div>
												<div class="error_msg bill_err"></div>
												<input type="file" name="billing_scan" id="billing-scan" class="inputfile inputfile-3" accept="image/*,application/pdf">
											
												<label for="billing-scan"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Proof of Address</span></label>
												
												<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php else: ?>
												<div class="relative">
												<div class="uploaded-file-path"><a target="_blank" href="<?php echo site_url('uploads') . '/documents/'.$account->id.'/' . $account->billing_scan; ?>"><?php echo $account->billing_scan ?></a></div>
													<div class="change-holder">
														<input type="file" name="billing_scan" id="billing-scan" class="inputfile inputfile-3" accept="image/*,application/pdf">
														<?php if($account->kyc_status != 1): ?>
														<label for="billing-scan">Change
														</label>
														<?php endif; ?>
													</div>
												</div>
												<div class="progress" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100" id="progressBar">
													<div class="progress-meter" id="progress-meter"></div>
												</div>
												<div class="progress-info" id="progress-info"></div>
												<div id="file-upload-date" class="file-upload-date">Uploaded On <span></span></div>
											<?php endif; ?>
										</div>
										
										<div class="clearfix"></div>
										<div class="btns-holder clearfix" <?=$submit_state?>>
											<div class="cancle-btn-div">
												<a href="#" class="cancle-btn">Cancel</a>
											</div>
											<div class="save-btn-div">
												<a href="javascript:void(0)" class="save-btn save-document">Save</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- END Documents -->
					<div class="clearfix"></div>
					<div class="last-li-border"></div>
				</ul>	

				<button type="submit" style="display:none" id="form_submit">Submit</button>						
			</form>
			<div class="large-12 medium-12 small-12">
				<div class="validate-btn-wrap">
					<a href="javascript:void(0)" class="validate-btn">Validate account</a>
				</div>
			</div>
		</div>
	</div>

	 <div class="large-7 small-12 medium-10 align-center reveal-modal" id="prompt-overlay" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" style="display: none;">
        <div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
            <div class="popup-container">
                <div class="row">
                    <div class="small-12 medium-12 columns no_padding">
                            <h3 class="common-h3 text-center" id="prompt-title">All information is confidential and is held for Customer Due Diligence purposes</h3>
                                <div id="container">
                                    <div class="setting-popup-info" id="prompt-msg">
                                    <p>
                                        NCPL is a company incorporated in Singapore having Unique Entity Number 201802295D which is registered and licensed as a fund management company with the Monetary Authority of Singapore.
                                    </p>
                                    <p>By signing this document, the Client acknowledges and agrees as follows: </p>
                                        <ol type="a">
                                            <li>The Client is applying for the Accounts and/or Services as set out in this Account Opening as specified by the Client</li>
                                            <li>The Client represents and warrants that all information provided to NCPL is true and complete; and will provide NCPL, upon request by NCPL, with any information required for NCPL to fulfill its contractual, regulatory and other legal obligations, </li>
                                            <li>
                                                The Client undertakes to notify NCPL immediately in writing of any change to such information 
                                            </li>
                                            <li>The Client is fully aware of the nature and extent of possible risks involved in the investments of transactions </li>
                                            <li>The Client acknowledges and understood that any reports, analysis or other material or information in relation to investments or transactions are offered to the Client for reference only and shall not constitute to an offer or solicitation of an offer for the Client to transact </li>
                                            <li>The Client, when acting as a trustee/nominee, will notify NCPL the residency status or any permanent establishment status of the beneficiaries involved. </li>
                                            <li>The Personal Data Protection Act 2012 (the "Act"), which regulates the processing of personal data in commercial transactions, applies to the NCPL. For the purpose of this written notice, the terms "personal data" and "processing" shall have the meaning prescribed in the Act. 
                                        <br>
                                       This written notice serves to inform the Client that his/her personal data is being processed by or on behalf of the NCPL and his/her personal data was, or may be collected in the future, from the information you have provided the Account Opening and/or any other forms issued by the NCPL, or otherwise required in connection with any application. NCPL will be processing your personal data, including any additional information you may subsequently provide, for the following purposes ("Purposes"): 
                                       
                                           <ol type="i">
                                               <li>
                                                   Process Client investments or
                                               </li>
                                               <li>
                                                   Complete the information on the register of the relevant investments; 
                                               </li>
                                               <li>
                                                   Contact the Client and to send statements/notices to you relating to the Client account and holdings therein; 
                                               </li>
                                               <li>
                                                   Carry out your instructions or respond to any enquiry from the Client 
                                               </li>
                                               <li>
                                                   Deal with any other matters relating to your account and holdings therein;
                                               </li>
                                               <li>
                                                   Form part of the records of the recipient as to the business carried out by it; 
                                               </li>
                                               <li>
                                                    Observe any legal, government or regulatory requirements of Singapore or other relevant jurisdiction including any disclosure or notification requirements to which any recipient of the data is subject; 
                                               </li>
                                               <li>
                                                   To satisfy the NCPL's responsibility relating to 'Know Your Customer' (KYC) requirements; and 
                                               </li>
                                               <li>
                                                    Other purposes, directly or indirectly relating to any of the above and the NCPL's 
                                               </li>
                                           </ol>
                                           </li>
                                           <li>
                                                The Client acknowledges and agrees that the Client's personal data may be disclosed to NCPL's affiliates, delegates, business partners, and/or service providers, or any third party and/or agents (including outsourcing agents and data processors), any and all governmental and/or quasi-governmental departments and/or agencies, regulatory and/or statutory bodies, any court and/or officer of the court for any of the above Purposes or any other purpose for which your personal data was to be disclosed at the time of its collection or any other purpose directly related to any of the above Purposes. 
                                           </li>
                                           <li>
                                               The Client has read, understood and agreed with the relevant financial institutions or NCPL's risk profiling, client risk categorization deriving from this Agreement. The Client recognize that the risk profiling and risk categorization determined by the relevant financial institutions or NCPL may be shared between the relevant financial institutions and NCPL for the purpose of processing the account and the risk disclosures. 
                                           </li>
                                           <li>
                                               The Client acknowledges and agrees that NCPL may from time to time make available to the Client additional products or Services and/or open additional Accounts for the Client. Those Accounts, products and Services shall be subject to terms of this Agreement and any additional in terms of specific to those Accounts, products and Services. 
                                           </li>
                                           <li>
                                               The Client acknowledges that NCPL is regulated by the Monetary Authority of Singapore (the "MAS") and is subject to anti-money laundering / countering the financing of terrorism ('AML/CFT") laws and regulations including serious tax crimes) have been designated as money laundering offences in Singapore. The Client thereby represent and warrants to NCPL that: 
                                                <ol type="i">
                                                    <li>The Client is advised to seek independent tax advice for his investments and transactions. The Client acknowledges and agrees that the Client is solely responsible for, and NCPL is not responsible for, the tax affairs and obligations of the Client </li>
                                                    <li>
                                                        The Client is not aware of, and no reasonable grounds to suspect, that any assets in, or to be deposited in, the Account are or may be proceeds from any serious crime activity or conduct, whether in Singapore or outside Singapore 
                                                    </li>
                                                    <li>
                                                        The Client has not committed or been investigated for or convicted of any serious tax crimes 
                                                    </li>
                                                    <li>
                                                        The Client undertakes to provide NCPL all the information and documents relating to Client's affairs as may be required by NCPL to comply with its AML/CFT obligations; and 
                                                    </li>
                                                    <li>
                                                         The Client acknowledges that NCPL shall not provide tax advice to the Client and agrees that NCPL shall assume no liability for claims relating to any investment or administration of Client's assets by NCPL which arises from the lack of such advice or from incorrect/insufficient advice. 
                                                    </li>
                                                </ol>
                                           </li>
                                          
                                           </ol>
                                       
                                    </div>
                                </div>  
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="cta-wrapper">
                        <div>
                            <a href="javascript:void(0)" class="btn-no-ack" data-close >Don’t Acknowledge</a>
                        </div>
                        <div>
                            <a href="<?php echo base_url() ?>account/action/account_validation" class="btn-yes-ack">Acknowledge</a>
                        </div>
                        
                    </div>
                </div><!--row-->
            </div><!--popup-container-->
    </div>
	
</body><!--body-->
<?php include("application/views/includes/footer.php"); ?>
<?php include("application/views/includes/scripts.php"); ?>

<script type="text/javascript">


$("#update_personal_info_form").bind("submit",function(e) {
  e.preventDefault();
  console.log("submit intercepted");
  return false;
});

$("#update_personal_info_form").on("formvalid.zf.abide", function(ev,frm) {
		
		
		$.ajax({
		  		type: "POST",
		  		url: site_url+"account/ajax/update_personal_information", 
		  		data: $('#update_personal_info_form').serialize(),
		  		success: function(result){

		  			$('html, body').animate({
						scrollTop: $("#documents").offset().top
					}, 2000);
				}
			});												

		return false;
		
});

// function formEnabler(x){
// 			$(x).removeAttr('readonly');
// 			}
// 			$('.form-enabler').on('click', function(){
// 				formEnabler($(this).data('target')); 
// 				$(this).data('target').focus();
// 			});

function update_personal_information(){

$("#update_personal_info_form").submit();
/*
var fname=$("#first-name").val();
var lname=$("#last-name").val();
var id_num=$("#identification-number").val();
var phone=$("#contact-number").val();
var postal_code=$("#postal-code").val();
var address=$("#address-line").val();
var unit_number=$("#unit-number").val();
var nationality=$("#nationality").val();
var race=$("#race").val();
var religion=$("#religion").val();
var dob=$("#dob").val();

			   $.ajax({

					type: "POST",
					url: site_url+"ajax/update_personal_information",
					data: {"first_name":fname,"last_name":lname,"identification_number":id_num,"phone":phone,"postal_code":postal_code,"address":address,"unit_number":unit_number,"nationality":nationality,"race":race,"religion":religion,"dob":dob},
		 
				   success: function(data) {

			  		if(data== "Success User Information Update"){

			  			alert("Success User Information Update");

					 $("#message").html(data);
			  		}
				   $("p").addClass("alert alert-success");
				   },
				   error: function(err) {
				   alert(err);
				   }
			   });

				*/
			}
</script>
<script type="text/javascript">
	$(document).ready(function () {
		
			// front progress
			var front_uploaded_file_path = $('#scan-front .uploaded-file-path').html();
		if( front_uploaded_file_path == "" || front_uploaded_file_path == undefined){
			$('#id-scan-front').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-front #progress-info').html("Uploading");
				$('#progressBar-front').show();
				NRCF_progress(100, $('#progressBar-front'));
				
				setTimeout(function(){  
					$('#progressBar-front').hide();
					$("#scan-front #progress-meter").css('width','0');
					$('#scan-front #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
					$('#id-scan-front').parent('.upload-files').children('.uploaded-file-path').html(fileName);
					$("#scan-front .file-upload-date").show();
					$("#scan-front label").text('Change').addClass("label-class");
				},3000)	 
			});
		}
		else{
			$('#id-scan-front').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-front #progress-info').html("Uploading");
				$('#progressBar-front').show();
				NRCF_progress(100, $('#progressBar-front'));
				
				setTimeout(function(){  
					$('#progressBar-front').hide();
					$("#scan-front #progress-meter").css('width','0');
					$('#scan-front #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
					//$('#id_scan_front').parent('.change-holder').parent('.relative').find('.uploaded-file-path').html(fileName);
					$('#id-scan-front').parents('.upload-files').find('.uploaded-file-path').html(fileName);
					$("#scan-front .file-upload-date").show();
				},3000)	 
			});
		}

		// back progress
		var back_uploaded_file_path = $('#scan-back .uploaded-file-path').html();
	 	if( back_uploaded_file_path == "" || back_uploaded_file_path == undefined){
			$('#id-scan-back').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-back #progress-info').html("Uploading");
				$('#progressBar-back').show();
				NRCB_progress(100, $('#progressBar-back'));
				
				setTimeout(function(){  
					$('#progressBar-back').hide();
					$("#scan-back #progress-meter").css('width','0');
					$('#scan-back #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
					$('#id-scan-back').parent('.upload-files').children('.uploaded-file-path').html(fileName)
					$("#scan-back .file-upload-date").show();
					$("#scan-back label").text('Change').addClass("label-class");

				},3000)
			});
		}
		else{
			$('#id-scan-back').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-back #progress-info').html("Uploading");
				$('#progressBar-back').show();
				NRCB_progress(100, $('#progressBar-back'));
				
				setTimeout(function(){  
					$('#progressBar-back').hide();
					$("#scan-back #progress-meter").css('width','0');
					$('#scan-back #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
					//$('#id_scan_back').parent('.change-holder').parent('.relative').find('.uploaded-file-path').html(fileName);
					$('#scan-back .uploaded-file-path').parents('.upload-files').find('.uploaded-file-path').html(fileName)
					$("#scan-back .file-upload-date").show();
				},3000)	 
			});
		}


		// for file upload progress bar
		var address_uploaded_file_path = $('#scan-address .uploaded-file-path').html();
		if( address_uploaded_file_path == ""){
			$('#billing-scan').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-address #progress-info').html("Uploading");
				$('#progressBar').show();
				progress(100, $('#progressBar'));
				
				setTimeout(function(){  
				$('#progressBar').hide();
				$("#scan-address #progress-meter").css('width','0');
				$('#scan-address #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
				$('#billing-scan').parent('.upload-files').children('.uploaded-file-path').html(fileName);
				$("#scan-address .file-upload-date").show();
				$("#scan-address label").text('Change').addClass("label-class");
				},3000)	 
			});
		}
		else{
			$('#billing-scan').change(function(e){
				var fileName = e.target.files[0].name;
				$('#scan-address #progress-info').html("Uploading");
				$('#progressBar').show();
				progress(100, $('#progressBar'));
				
				setTimeout(function(){  
				$('#progressBar').hide();
				$("#scan-address #progress-meter").css('width','0');
				$('#scan-address #progress-info').html("");
				}, 3000);	
				setTimeout(function(){
				$('#billing-scan').parent('.change-holder').parent('.relative').find('.uploaded-file-path').html(fileName);
				$("#scan-address .file-upload-date").show();
				},3000)	 
			});
		}
		

		var today = new Date();
		$('#file-upload-date span').html( today.toDateString() );
		$('#file-upload-date-1 span').html( today.toDateString() );
		var progress_meter = $("#progress-meter");
		var progress_info = $("#progress-info").text();
		//$('.change-holder label').hide();
		$(".identy-holder .progress").hide();
		$("#file-upload-date").hide();
		$('#file-3').change(function(e){
			var fileName = e.target.files[0].name;
			$('#progress-info').html("Uploading");
			$(".identy-holder .progress").show();
			progress(100, $('#progressBar'));

			// if(progress_meter.css('width','362px')){
				setTimeout(function(){  
				$(".identy-holder .progress").hide();
				$("#progress-meter").css('width','0');
				$('label[for="file-3"]').hide()
				$('#progress-info').html("");
				}, 3000);	
				setTimeout(function(){
				$("#file-3").parent('.upload-files').find('.uploaded-file-path').html(fileName);
				$('.change-holder label').show();
				$("#file-upload-date").show();
				},3000)	  	
			// }

		});
		$('#file-4').change(function(e){
			var fileName1 = e.target.files[0].name;
			$('#progress-info').html("Uploading");
			$(".identy-holder .progress").show();
			progress(100, $('#progressBar'));
				setTimeout(function(){  
				$(".identy-holder .progress").hide();
				$("#progress-meter").css('width','0');
				$('#progress-info').html("");
				}, 3000);	
				setTimeout(function(){
				$("#file-4").parent('.change-holder').parent('.relative').find('.uploaded-file-path').html(fileName1);
				},3000)
		});
		function progress(percent, $element) {
			var progressBarWidth = percent * $element.width() / 100;
			$element.find('div').animate({ width: progressBarWidth }, 2500);
			setTimeout(function(){  
				$('#progress-info').html("Uploaded");
			}, 2000); 
		}
		
		function check_personal_information(){

			var first_name = $("#first_name"),
				last_name = $("#last_name"),
				phone = $("#contact_number"),
				dob = $("#dob"),
				country = $("#country"),
				us_option = $("#us-no"),
				nationality	= $("#nationality");

			if(first_name.val() == ""){
				$(".first_err").html("<p>First Name is required.</p>");
			}

			if(last_name.val() == ""){
				$(".last_err").html("<p>Last Name is required.</p>");;
			}

			if(phone.val() == ""){
				$(".phone_err").html("<p>Phone number is required.</p>");
			}

			if(dob.val() == ""){
				$(".dob_err").html("<p>Date of birth is required.</p>");
			}

			if(country.val() == null){
				$(".cob_err").html("<p>Country of birth is required.</p>");
			}

			if(nationality.val() == null){
				$(".nat_err").html("<p>Nationality is required.</p>");
			}

			if(us_option.is(":checked") === false){
				$(".us_tax_err").html("<p>This field is required.</p>");
			}

			if(first_name.val() != "" && last_name.val() != "" && phone.val() != "" && dob.val() != "" && country.val() != null && nationality.val() != null && us_option.is(':checked')){
				return true;
			}

			return false;
		}

		function residential_address()
		{
			var residence = $("#residence"),
				postal_code = $("#postal_code"),
				address_line = $("#address_line"),
				unit_number = $("#unit_number")

			if(residence.val() == null){
				$(".res_err").html("<p>Country of residence is required</p>");
			}

			if(postal_code.val() == ""){
				$(".postal_err").html("<p>Postal code is required</p>");
			}

			if(address_line.val() == ""){
				$(".add_err").html("<p>Address Line is required</p>");
			}

			if(unit_number.val() == ""){
				$(".unit_err").html("<p>Unit number is required</p>");
			}

			if(residence.val() != "" && postal_code.val() != "" && address_line.val() != "" && unit_number.val() != ""){
				return true;
			}
			
			return false;
		}

		function occupation_details()
		{
			var occupation = $("#occupation"),
				annual_income = $("#annual_income"),
				fund_source = $("#fund_source");


			if(occupation.val() == null){
				$(".occ_err").html("<p>Occupation is required</p>");
			}

			if(annual_income.val() == null){
				$(".inc_err").html("<p>Annual income is required</p>");
			}

			if(fund_source.val() == null){
				$(".fund_err").css("margin-top", "5px");
				$(".fund_err").html("<p>Source of account fund is required</p>");
			}

			if ($('input[name=office]:checked').length == '0'){
				$(".office_err").html("<p>This field is required</p>");
			}

			if($('input[name=accredited]:checked').length == '0'){
				$(".accr_err").html("<p>This field is required</p>");
			}

			if($('input[name=employee-type]:checked').length == '0'){
				$(".emp_err").html("<p>Employee type is required</p>");
			}

			if(occupation.val() != null && annual_income.val() != null && fund_source.val() != null && $('input[name=office]:checked').length > 0 && $('input[name=accredited]:checked').length > 0 && $('input[name=employee-type]:checked').length > 0){
				return true;
			}
			
			return false;

		}

		function documents()
		{
			var front = $("#id-scan-front"),
				back = $("#id-scan-back"),
				bill = $("#billing-scan");


			if(front[0].files.length == 0){
				$(".front_err").html("<p>This field is required</p>");
			}

			if(back[0].files.length == 0){
				$(".back_err").html("<p>This field is required</p>");
			}

			if(bill[0].files.length == 0){
				$(".bill_err").html("<pThis field is required</p>");
			}
			
			if(front[0].files.length > 0 && back[0].files.length > 0 && bill[0].files.length > 0){
				return true;
			}

			return false;
		}

		// update account information
		// $('.save-account, .save-personal, .save-residential, .save-occupation, .save-document').click(function(e) {
		// 	//$(this).parents('form').submit();
		// })

		$('.save-account').click(function(e){
			$(this).parents('form').submit();
		});
		
		$('.save-personal').click(function(e){
			if(check_personal_information()){
				$(this).parents('form').submit()
			}
		});

		$('.save-residential').click(function(e){
			if(residential_address()){
				$(this).parents('form').submit()
			}
		});

		$('.save-occupation').click(function(e){
			if(occupation_details()){
				$(this).parents('form').submit()
			}
		});

		$('.save-document').click(function(e){
			<?php if (empty($account->billing_scan)): ?>
			if(documents()){
				$(this).parents('form').submit();
			}
			<?php else: ?>
				$(this).parents('form').submit()
			<?php endif; ?>
		});


		// change password
		$('.btn-change-password').click(function(e) {
			$('input[name=is_changepass]').val(1)

			$(this).parents('form').submit()
		})


		// helper functions
		function progress(percent, $element) {
			var progressBarWidth = percent * $element.width() / 100;
			$element.find('div').animate({ width: progressBarWidth }, 2500);
			setTimeout(function(){  
				$('#scan_address #progress-info').html("Uploaded");
			}, 2000); 
		}
		function NRCF_progress(percent, $element) {
			var progressBarWidth = percent * $element.width() / 100;
			$element.find('div').animate({ width: progressBarWidth }, 2500);
			setTimeout(function(){  
				$('#scan_front #progress-info').html("Uploaded");
			}, 2000); 
		}
		function NRCB_progress(percent, $element) {
			var progressBarWidth = percent * $element.width() / 100;
			$element.find('div').animate({ width: progressBarWidth }, 2500);
			setTimeout(function(){  
				$('#scan_back #progress-info').html("Uploaded");
			}, 2000); 
		}

		var today = new Date();
		$('#file-upload-date span').html( today.toDateString() );

		$("#us-no").on('change',function(e){
			$(".us_error").css('display','none');
			 e.preventDefault();
			$('.nationality').prop("disabled", false);
		})

		$("#us-yes").on('change',function(e){
			$(".us_error").css('display','block');
			 e.preventDefault();
			$('.nationality').prop("disabled", true);
		})

		// $("#office-yes").on('change',function(e){
		// 	$(".office_error").css('display','block');
		// 	e.preventDefault();
		// 	$('.fund_source').prop("disabled", true);
		// })

		// $("#office-no").on('change',function(e){
		// 	$(".office_error").css('display','none');
		// 	e.preventDefault();
		// 	$('.fund_source').prop("disabled", false);
		// })
		
		$("#accredited_no").on('change', function(e){
			$(".accredited_error").css('display', 'block');
			e.preventDefault();
		})

		$("#accredited_yes").on('change', function(e){
			$(".accredited_error").css('display', 'none');
			e.preventDefault();
		})
		
		$(".validate-btn").click(function(e){
			if(<?=$user_summary['total_percent']?> === 100){	
				var popup = new Foundation.Reveal($('#prompt-overlay'));
				popup.open();
				$(".btn-yes-ack").attr("href", "<?php echo base_url() ?>account/action/account_validation");
				
			}else{
				alert("Please complete the information above!");
			}
			new PerfectScrollbar('#container');
		});
		var cp_span =$(".completed-percent span").text();
		if(cp_span == "100"){
			$(".validate-btn").addClass("validate-btn-hover");
		}
		else{
			$(".validate-btn").removeClass("validate-btn-hover");
		}

	});
</script>