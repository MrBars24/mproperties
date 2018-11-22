<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="row">
			<div class="small-12 medium-10 medium-push-1 columns transaction">
					<div class="row relative">
						<div class="medium-12 columns">
			          		<div class="tt-title">
				          		<h3>Transactions</h3>
				          		<span class="ts-info-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. voluptatum deleniti atque corrupti quos dolores </span>
				          	</div>
				          	<div class="select-section relative">
				          		<div class="transaction-type clearfix">
				          			<span>Transaction Type:</span>
				          			<div>
				          				<select>
					          				<option value="" selected>All</option>
					          				<option>Investment purchase</option>
					          				<option>Investment sold</option>
					          				<option>Funds deposit</option>
					          				<option>Funds withdrawal</option>
					          				<option>Rental income</option>
				          				</select>
				          			</div>			          			
				          		</div>
				          		<div class="time-period clearfix">
				          			<span>Time Period:</span>
				          			<div>
				          				<select>
				          				<option value="" selected>Last 6 months</option>
				          				<option>Last 5 months</option>
				          				<option>Last 4 months </option>
				          				<option>Last 3 months</option>
				          				<option>Last 3 months</option>
				          				<option>Last 1 months</option>
				          			</select>
				          			</div>			          			
				          		</div>
				          	</div>

		        		</div>
					</div>
					<div class="row tst-table">
						<div class="samll-12 columns">
							<div class="ovf-x">	
								<div class="total-transaction">
									<span>5</span> total transactions
								</div>
								<table class="hover responsive centered">
								  <thead>
								    <tr>
								      <th>Date</th>
								      <th>Transaction ID</th>
								      <th>Transaction Type</th>
								      <th>Amount (DR)</th>
								      <th>Amount (CR)</th>
								      <th>Status</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>21 Sep 2018</td>
								      <td>123456789Z</td>
								      <td>Investment purchase</td>
								      <td>-</td>
								      <td>$9,999,999</td>
								      <td class="txt-green">Completed</td>
								    </tr>
								    <tr>
								      <td>21 Sep 2018</td>
								      <td>123456789Z</td>
								      <td>Investment sold</td>
								      <td>$1,300,000</td>
								      <td>-</td>
								      <td class="txt-green">Completed</td>
								    </tr>
								    <tr>
								      <td>21 Sep 2018</td>
								      <td>123456789Z</td>
								      <td>Funds deposit</td>
								      <td>$700,000</td>
								      <td>$9,999,999</td>
								      <td class="txt-orange">Processing</td>
								    </tr>
								     <tr>
								      <td>21 Sep 2018</td>
								      <td>123456789Z</td>
								      <td>Funds withdrawal</td>
								      <td>-</td>
								      <td>$9,999,999</td>
								      <td class="txt-orange">Processing</td>
								    </tr>
								     <tr>
								      <td>21 Sep 2018</td>
								      <td>123456789Z</td>
								      <td>Rental income</td>
								      <td>$1,200,000</td>
								      <td>-</td>
								      <td class="txt-orange">-</td>
								    </tr>
								     
								  </tbody>
								</table>
							</div>
							
								
						</div>
					</div><!--row-->
			</div>
		</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>