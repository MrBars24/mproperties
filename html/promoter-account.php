<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="row">
	<div class="small-11 medium-11 large-11 align-center promoter-account">
		<div class="row relative">
			<div class="medium-12 columns">
				<div class="tt-title">
					<h3>Referrals & Commissions</h3>
					<span class="ts-info-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. voluptatum deleniti atque corrupti quos dolores </span>
				</div>
			</div>
		</div>
		<div class="row tst-table">
			<div class="small-12 medium-4 columns">
				<div class="ovf-x">
					<h4 class="text-center">Referrals</h4>
					<p class="text-center">
						A total of <span class="bold">20</span> referrals.
					</p>
					<table class="hover responsive centered">
						<thead>
							<tr>
								<th>Referrals</th>
								<th>Commissions Earned</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr>
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr class="hide-row-1" style="display: none;">
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr class="hide-row-1" style="display: none;">
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr class="hide-row-1" style="display: none;">
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>
							<tr class="hide-row-1" style="display: none;">
								<td class="referrals">
									<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
								</td>
								<td>$99, 999</td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="load-more small-12 columns">
					<a href="javascript:void(0);" id="view-all-1" class="polygon-btn-outline">View All</a> 
				</div>
			</div>
			<div class="small-12 medium-8 columns">
				<div class="ovf-x">	
					<h4 class="text-center">Commissions</h4>
						<p class="text-center">
						A total of <span class="bold">$999,999</span> earned.
					</p>
					<table class="hover responsive centered">
						<thead>
							<tr>
								<th>Date</th>
								<th>Property Name</th>
								<th>Commission Earned</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr>
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr class="hide-row-2" style="display: none;">
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr class="hide-row-2" style="display: none;">
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
							<tr class="hide-row-2" style="display: none;">
								<td>21 Sep 2018</td>
								<td>ICON Residences</td>
								<td>$999, 999</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="load-more small-12 columns">
					<a href="javascript:void(0);" id="view-all-2" class="polygon-btn-outline">View All</a> 
				</div>
			</div>
		</div><!--row-->
	</div>
</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>
<script type="text/javascript">
	$('#view-all-1').on('click', function(){
		var $this = this;
		$('.hide-row-1').slideDown('400', function() {
			$($this).hide();
		});
	});
	$('#view-all-2').on('click', function(){
		var $this = this;
		$('.hide-row-2').slideDown('400', function() {
			$($this).hide();
		});
	});
</script>