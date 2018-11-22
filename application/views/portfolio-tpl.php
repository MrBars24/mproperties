<?php include("includes/header.php"); ?>

		<?php include("includes/menu.php"); ?>
		<div class="row">
			<div class="small-12 medium-10 large-11 align-center">
				<div class="portfolio">
					<div class="row relative">
						<div class="medium-12 columns">
			          		<div class="portfolio-title">
				          		<h3>Investment Portfolio</h3>
				          		<!-- <div class="pdf-dl">
				          			<a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Download PDF</a>
				          		</div> -->
				          	</div>
				          	<div class="sub-title">
					      		<h3><?=count($portfolio)?> Completed Investments</h3>
					      	</div>
		        		</div>
					</div>
					<div class="row pft-table">
						<div class="samll-12 columns">
							<div class="ovf-x">
								<table class="hover responsive centered completed-investments">
								  <thead>
								    <tr>
								      <th>Property</th>
								      <th>Valuation</th>
								      <th>Price / Sq.Ft.</th>
								      <th>Units</th>
								      <th>NAV</th>
								      <th>Original Investment</th>
								      <th>Profit / Loss</th>
								      <th>Rental Yield</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php foreach($portfolio as $p): ?>
									<tr>
										<td><?= $p->property_name ?></td>
										<td>$<?= number_format($p->property_value, 2) ?></td>
										<td>$<?= $p->property_size ?></td>
										<td><?= (int) $p->units_invested ?></td>
										<td>$<?= number_format($p->nav, 2) ?></td>
										<td>$<?= number_format($p->invested_amount, 2) ?></td>
										<td class="<?=($p->profit >= 0) ? 'txt-green' : 'txt-red' ?>"><?= number_format($p->profit, 2) ?>%</td>
										<td class="<?=($p->rental_yield >= 0) ? 'txt-green' : 'txt-red' ?>"><?=empty($p->rental_yield) ? 0 : number_format($p->rental_yield, 2)?>%</td>
									</tr>
									<?php endforeach; ?>
								  </tbody>
								</table>
							</div>
							
								<!-- <div class="load-more">
									<a href="javascript:void(0);" class="polygon-btn-outline load-more-btn">Load more</a> 
								</div> -->
						</div>
					</div><!--row-->
					<!-- <div class="row bg-grey mt30">
						<div class="medium-12 columns">
							<div class="sub-title">
					      		<h3>Summary</h3>
					      		<span class="summary-info-text">What are Insights and Recommendations?</span>
					      	</div>
						</div>
						<div class="row no-margin summary-holder">
								<div class="medium-6 small-12 columns">
									<div class="row no-margin">
											<div class="medium-6 small-12 columns">
												<div class="chart-holder relative">
													<div class="chart-title">Themes</div>
													<div class="property-chart-portfolio" id="chartContainer-1"></div>
												</div>
											</div>
											<div class="medium-6 small-12 columns">
												<div class="portfolio-chart-info">
														<ul>
															<li>Luxury</li>
															<li>En Bloc</li>
															<li>Capital Returns</li>
															<li>Income</li>
														</ul>
													</div>
											</div>
									</div>
									
								</div>
								<div class="medium-6 small-12 columns">
									<div class="row no-margin">
											<div class="medium-6 small-12 columns">
												<div class="chart-holder relative">
													<div class="chart-title">District</div>
													<div class="property-chart-portfolio" id="chartContainer-2"></div>
												</div>
											</div>
											<div class="medium-6 small-12 columns">
												<div class="portfolio-chart-info">
														<ul>
												<li>D9 - Orchard / River Valley </li>
												<li>D11 - Newton / Novena </li>
												<li>D4 - Sentosa / harbourfront</li>
												<li>D10 - Tanglin / Holland / Bukit timah </li>
											</ul>
													</div>
											</div>
									</div>
									
								</div>
						</div>
						<div class="row no-margin summary-holder no-border">
							<div class="medium-6 small-12 columns">
								<div class="row no-margin">
									<div class="medium-2 small-12 columns">
										<div class="item-center">
											<img src="<?php echo base_url('assets/frontend/images/insights-icon.png'); ?>" >
										</div>
									</div>
									<div class="medium-10 small-12 columns">
										<div class="">
										<h5>Insights</h5>
										<ul>
											<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
											doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
											inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</li>
										</ul>
											
										</div>
									</div>
								</div>
							</div>
							<div class="medium-6 small-12 columns">
								<div class="row no-margin">
									<div class="medium-2 small-12 columns">
										<div class="item-center">
											<img src="<?php echo base_url('assets/frontend/images/recommend-icon.png'); ?>" >
										</div>
									</div>
									<div class="medium-10 small-12 columns">
										<div class="">
										<h5>Recommendation</h5>
										<ul>
											<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
											doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
											inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</li>
										</ul>
										<a href="" class="common-btn">Explore Properties</a>
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div>-->
					<!--row bg-grey-->
					<!-- <div class="row bg-grey mt20">
						<div class="medium-12 columns">
							<div class="sub-title relative">
					      		<h3>Total Portfolio Value History</h3>
					      		<div class="view-monthly clearfix">
				          			<span>view:</span>
				          			<div>
				          				<select>
				          				<option value="" selected disabled>MONTHLY</option>
				          				<option>Jan</option>
				          				<option>Feb</option>
				          				<option>March</option>
				          				<option>April</option>
				          				<option>May</option>
				          				<option>June</option>
				          				<option>July</option>
				          				<option>Aug</option>
				          				<option>Sept</option>
				          				<option>Oct</option>
				          				<option>Nov</option>
				          				<option>Dec</option>
				          			</select>
				          			</div>			          			
				          		</div>
					      	</div>
					      	<div class="value-history">
					      		<div class="chart-holder">
					      			 <div class="property-chart" id="chartContainer1"></div>
					      		</div>
					      	</div>
						</div> 
					</div>-->
					<!--row-->
				 </div> <!--portfolio-->
			</div>
		</div>
		<div class="large-6 small-12 medium-8 align-center reveal-modal" id="select_property_box" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
  		<div class="popup-container">
		 	<div class="row">
		 		<div class="small-12 medium-12 columns no_padding">
		 			<div class="text-center">
		 				<h3 class="common-h3">Select One of Your Properties</h3>
		 				<div class="user-total-ppt"><span>4</span> properties</div>
		 			</div>
		 			<div class="row select-property-table">
						<div class="samll-12 columns">
							<div class="ovf-x">
								<table class="hover centered">
								  <thead>
								    <tr>
								      <th width="200">Property</th>
								      <th class="grey-text">Address</th>
								      <th width="200">Investment Completed On</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>ICON Residences</td>
								      <td class="grey-text">10 Gopeng Street, 078878Chinatown, Tanjong Pagar (D02)</td>
								      <td>21 Sep 2018</td>
								    </tr>
								    <tr>
								      <td>River place</td>
								      <td class="grey-text">10 Gopeng Street, 078878Chinatown, Tanjong Pagar (D02)</td>
								      <td>21 Sep 2018</td>
								    </tr>
								    <tr>
								      <td>Robertson 100</td>
								      <td class="grey-text">10 Gopeng Street, 078878Chinatown, Tanjong Pagar (D02)</td>
								      <td>21 Sep 2018</td>
								    </tr>
								     <tr>
								      <td>Ardmore Park</td>
								     <td class="grey-text">10 Gopeng Street, 078878Chinatown, Tanjong Pagar (D02)</td>
								      <td>21 Sep 2018</td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div><!--row-->
		 		</div>
		 	</div>
		 </div><!--popup-container-->
  	</div>
</body><!--body-->
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>
<script type="text/javascript">

			$(document).ready(function(){

				 var popup = new Foundation.Reveal($('#select_property_box'));
			    $(".completed-investments tbody tr").on('click',function(){
			    	 //popup.open();
			    })

				$(".completed-investments tr").each(function() {
				  //$(this).children("td:nth-child(6)").text("adaad");
				//   amount_invested = parseInt($(this).children("td:nth-child(5)").text().replace(/\$|,/g, ''));
				//   profit_loss = parseFloat($(this).children("td:nth-child(6)").text())/100;
				  
				//   total_returns = parseInt(amount_invested) * parseFloat(profit_loss);

				//   $(this).children("td:nth-child(8)").text("$"+total_returns.toFixed(2));

				});
			});


			$.fn.digits = function(){ 
			    return this.each(function(){ 
			        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
			    })
			}

			$(document).ready(function(){



				CanvasJS.addColorSet("colorShades",
                [//colorSet Array

                "#00bcf1",
                "#fed900",
                "#fd9691",
                "#ee3e34"               
                ]);
				 var chart = new CanvasJS.Chart("chartContainer1",
			  	{  animationEnabled: true,
			  		backgroundColor: "#f4f4f4",
		        axisX: {
		            interval: 1,
		            title : "MONTH",
		            titleFontColor: "#999",
		            labelFontSize: 12,
		            titleFontSize: 13
		            // fontFamily:"lato-bold"
		        },
		        axisY:{
						title : "VALUE(SGD)",
						titleFontColor: "#999",
						titleFontSize: 13,
						lineThickness: 0,
						labelFontSize: 12
						// fontFamily:"lato-bold"

					},
		        data: [
		        {
		            type: "columns",
		            color: "rgba(0,192,243,.3)",
		            type: "area",
		            markerType: "circle",
		            markerSize: 15,
		            markerColor: "#00b8f1",
		            dataPoints: [
		                { label: "Aug", y:750000},
		                { label: "Sep", y:800000  },
		                { label: "Oct", y:850000  },
		                { label: "Nov", y:850000 },
		                { label: "Dec", y:900000 },
		                { label: "Jan", y:890000  },
		                { label: "Feb", y:890000  },
		                { label: "Mar", y:900000 },
		                { label: "April",y:950000  },
		                { label: "May", y:1000000  },
		                { label: "June", y:1300000  },
		                { label: "July", y:1500000  },
		                
		            ]
		        },
		        ]
		    });
			chart.render();	
			var chart = new CanvasJS.Chart("chartContainer-1", {
				animationEnabled: true,
				backgroundColor: "#f4f4f4",
				colorSet: "colorShades",
				title:{
					horizontalAlign: "left"
				},
				toolTip:{
					   fontStyle: "normal",
					   content:"<b>{label}:</b> {y} (#percent%)",
					   borderThickness: 1,
					   borderColor: "#ffffff",
					   fontSize:10,
					   fontColor:"#333"
					  },
				data: [{
					bevelEnabled: true,
					type: "doughnut",
					startAngle: 90,
					indexLabelFormatter: function() {
				        return "";
				    },
					dataPoints: [
						{ y: 60, label: "LUXURY" },
						{ y: 10, label: "EN BLOC" },
						{ y: 10, label: "CAPITAL RETURNS" },
						{ y: 40, label: "INCOMES"}
					]
				}]
			});
			chart.render();							
			var chart = new CanvasJS.Chart("chartContainer-2", {
				animationEnabled: true,
				backgroundColor: "#f4f4f4",
				colorSet: "colorShades",
				title:{
					horizontalAlign: "left"
				},
				toolTip:{
					   fontStyle: "normal",
					   content:"<b>{label}:</b> {y} (#percent%)",
					   borderThickness: 1,
					   borderColor: "#ffffff",
					   fontSize:10,
					   fontColor:"#333"
					  },
				data: [{
					bevelEnabled: true,
					type: "doughnut",
					startAngle: 90,
					indexLabelFormatter: function() {
				        return "";
				    },
					dataPoints: [
						{ y: 60, label: "LUXURY" },
						{ y: 10, label: "EN BLOC" },
						{ y: 10, label: "CAPITAL RETURNS" },
						{ y: 40, label: "INCOMES"}
					]
				}]
			});
			chart.render();
			$('.load-more-btn').on('click', function(){
			var $this = this;
			$('.hidden-row').slideDown('400');
			$($this).css('visibility','hidden');
			});
			// responsive-tables.js
			// $(document).ready(function() {
			//   var switched = false;
			//   var updateTables = function() {
			//     if (($(window).width() < 767) && !switched ){
			//       switched = true;
			//       $("table.responsive").each(function(i, element) {
			//         splitTable($(element));
			//       });
			//       return true;
			//     }
			//     else if (switched && ($(window).width() > 767)) {
			//       switched = false;
			//       $("table.responsive").each(function(i, element) {
			//         unsplitTable($(element));
			//       });
			//     }
			//   };
			   
			//   $(window).load(updateTables);
			//   $(window).on("redraw",function(){switched=false;updateTables();}); // An event to listen for
			//   $(window).on("resize", updateTables);
			   
				
			// 	function splitTable(original)
			// 	{
			// 		original.wrap("<div class='table-wrapper' />");
					
			// 		var copy = original.clone();
			// 		copy.find("td:not(:first-child), th:not(:first-child)").css("display", "none");
			// 		copy.removeClass("responsive");
					
			// 		original.closest(".table-wrapper").append(copy);
			// 		copy.wrap("<div class='pinned' />");
			// 		original.wrap("<div class='scrollable' />");

			//     setCellHeights(original, copy);
			// 	}
				
			// 	function unsplitTable(original) {
			//     original.closest(".table-wrapper").find(".pinned").remove();
			//     original.unwrap();
			//     original.unwrap();
			// 	}

			//   function setCellHeights(original, copy) {
			//     var tr = original.find('tr'),
			//         tr_copy = copy.find('tr'),
			//         heights = [];

			//     tr.each(function (index) {
			//       var self = $(this),
			//           tx = self.find('th, td');

			//       tx.each(function () {
			//         var height = $(this).outerHeight(true);
			//         heights[index] = heights[index] || 0;
			//         if (height > heights[index]) heights[index] = height;
			//       });

			//     });

			//     tr_copy.each(function (index) {
			//       $(this).height(heights[index]);
			//     });
			//   }

			// });

			// $(window).on('load resize', function () {
			//   if ($(this).width() < 767) {
			//     $('table tfoot').hide();
			//   } else {
			//     $('table tfoot').show();
			//   }  
			// });



});
			</script>