<?php include("includes/header.php"); ?>
<style>
	.txt-red{
		color: red!important;
	}
	.txt-orange{
		color: orange!important;
	}
	.txt-green{
		color: green!important;
	}
</style>
<?php include("includes/menu.php"); ?>
<div class="row">
			<div class="small-12 medium-11 large-11 align-center transaction">
					<div class="row relative">
						<div class="medium-12 columns">
			        <div class="tt-title">
				        <h3>Transactions</h3>
				        <span class="ts-info-text">Here is a record of all your transactions for you to keep track easily.</span>
				      </div>
				      <?=form_open('transactions', ['method' => 'GET', 'class' => 'select-section relative'])?>
				      	<div class="transaction-type clearfix">
				        	<span>Transaction Type:</span>
				          <div>
				          	<select name="types" onchange="this.form.submit()">
					          	<option value="" <?=(!isset($_GET['types']) || $_GET['types'] == '') ? "selected" : ""?>>All</option>
											<option value="1" <?=@($_GET['types'] == '1') ? "selected" : ""?>>Funds deposit</option>
											<option value="2" <?=@($_GET['types'] == '2') ? "selected" : ""?>>Funds withdrawal</option>
											<option value="3" <?=@($_GET['types'] == '3') ? "selected" : ""?>>Investment purchase</option>
											<option value="4" <?=@($_GET['types'] == '4') ? "selected" : ""?>>Investment sold</option>
											<option value="5" <?=@($_GET['types'] == '5') ? "selected" : ""?>>Rental payment</option>
				          	</select>
				          </div>			          			
				        </div>
				        <div class="time-period clearfix">
				          <span>Time Period:</span>
									<div>
										<select name="duration" onchange="this.form.submit()">
											<option value="6" <?=(!isset($_GET['duration']) || $_GET['duration'] == '6') ? "selected" : ""?>>Last 6 months</option>
											<option value="5" <?=@($_GET['duration'] == '5') ? "selected" : ""?>>Last 5 months</option>
											<option value="4" <?=@($_GET['duration'] == '4') ? "selected" : ""?>>Last 4 months </option>
											<option value="3" <?=@($_GET['duration'] == '3') ? "selected" : ""?>>Last 3 months</option>
											<option value="2" <?=@($_GET['duration'] == '2') ? "selected" : ""?>>Last 3 months</option>
											<option value="1" <?=@($_GET['duration'] == '1') ? "selected" : ""?>>Last 1 months</option>
										</select>
				          </div>			          			
				        </div>
				      </form>
						</div>
					</div>
					<div class="row tst-table">
						<div class="samll-12 columns">
							<div class="ovf-x">	
								<div class="total-transaction">
									<span><?=count($transactions)?></span> total transactions
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

									<?php foreach($transactions as $transaction): ?>
									<?php 
										if($transaction->status == 1){
											$class = "txt-green";
											$text = "Completed";
										}else if($transaction->status == -1){
											$class = "txt-red";
											$text = "Expired";
										}else{
											$class = "txt-orange";
											$text = "Pending";
										}
									?>
									<tr>
										<td><?=date('d M Y', strtotime($transaction->created_at))?></td>
										<td><?=$transaction->id?></td>
										<td><?=$transaction->type?></td>
										<td><?=($transaction->transaction_type ==  $this->config->item('funds_deposit') || $transaction->transaction_type ==  $this->config->item('investment_sold')) ? '$'.number_format($transaction->absolute_amount, 2) : "-"?></td>
										<td><?=($transaction->transaction_type == $this->config->item('funds_withdrawal') || $transaction->transaction_type ==  $this->config->item('investment_purchase')) ? '$'.number_format($transaction->absolute_amount, 2) : "-"?></td>
										<td class="<?=$class?>"><?=$text?></td>
									</tr>
									<?php endforeach; ?>
								     
								  </tbody>
								</table>
							</div>
							
								
						</div>
					</div><!--row-->
			</div>
		</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>