$(document).ready(function() {



	$('#header_notification_bar').click(function(e){

		$('#header_notification_bar .dropdown-menu').toggle();

	
		$.ajax({
			url : base_url + "admin/transactions/action/get_notification", // url here
			success : function(res) {
				
				console.log(res);
				// do templating here
				var tags = "";
				if(res.notif.length > 0){
					res.notif.forEach(function (val, key) {

						tags += `<li>
									<a href="${base_url + val.link}">
										<span class="time"></span>
										<span class="details">
											<span class="label label-sm label-icon label-success"><i class="fa fa-user"></i>
											</span style="font-weight:700;"> ${val.summary}
											</span></br>
											<span style="padding-left:35px;display:inline-block"> ${val.message}</span>
										</span>
									</a>
								</li>
						`;
	
					});
				}
				
				var template = `<li>
									<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
										<ul class="dropdown-menu-list scroller" style="height: auto; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
											${tags}
										</ul>
									</div>
								</li>`;

				$('#header_notification_bar .dropdown-menu').html(template);
	
			}
		});
	});




})