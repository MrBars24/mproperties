<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="row">
			<div class="small-12 medium-11 large-11 align-center transaction">
					<div class="row relative">
						<div class="medium-12 columns">
			        <div class="tt-title">
				        <h3>Completed Investment</h3>
				        <span class="ts-info-text">Here’s an overview of all your investments including the number of units you have purchased.</span>
				      </div>
						</div>
					</div>
                    <div class="row investment-table">
                        <div class="small-12 column">
                        <div class="ovf-x">
                                <table summary="Shows Completed Investments" class="responsive centered"> 
                                <thead>
                                    <tr>
                                    <th><a href="javascript:void(0);">Property <i class="fa fa-chevron-down"></i></a></th> 
                                    <th><a href="javascript:void(0);">Investment Completed On <i class="fa fa-chevron-down"></i></a></th> 
                                    <th><a href="javascript:void(0);">Valuation Price <i class="fa fa-chevron-down"></i></a></th>
                                    <th><a href="javascript:void(0);">Units Invested <i class="fa fa-chevron-down"></i></a></th> 
                                    <th><a href="javascript:void(0);">Amount Invested <i class="fa fa-chevron-down"></i></a></th> 

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($completed_investment as $complete): ?>
                                    <tr>
                                        <td><a href="<?=base_url()?>property-details/<?=$complete->property_id?>"><?=$complete->property_name?></a></td>
                                        <td><?=date('d M Y', strtotime($complete->completed_at))?></td>
                                        <td>$<?=number_format($complete->property_price, 2)?></td>
                                        <td><?=$complete->total_units_invested?></td>
                                        <td>$<?=number_format($complete->total_invested_amount, 2)?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody> 
                            </table>
                        </div>
                            
                        </div>
                        </div>
			</div>
		</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>