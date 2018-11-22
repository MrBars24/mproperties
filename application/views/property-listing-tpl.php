<?php include("includes/header.php"); ?>
	<?php include("includes/menu.php"); ?>
	<!--body-->
	<div class="row hidden-mobile ppt-listing">
		<div class="large-12 medium-12 columns">
			<div class="advanced-search layered">
				<div class="form clearfix">
					<div class="dropdown residential">
								<div class="dropdown-title">Theme<span class="selected-items"></span></div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:;" class="clear-all-selected">Clear All</a>
									</div>
									<ul class="residential theme clearfix" id="theme-selector">
										<li>ALL</li>
										<li>Income</li>
										<li>Growth</li>
										<li>Entry</li>
										<li>Value</li>
										<li>Luxury</li>
										<li>New Release</li>
									</ul>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply themes-apply">Apply</a>
									</div>
								</div>
								<div class="dropdown-result residential annex"></div>
							</div>
							<div class="dropdown district">
								<div class="dropdown-title">District<span class="selected-items"></span></div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:;" class="clear-all-selected">Clear All</a>
									</div>
									<div class="more">
										&#43;22 more
									</div>
									<ul class="district clearfix" id="district-selector">
										<li>ALL</li>
										<?php
											$count = 1;
											foreach($districts as $district){
												if($count < 4){
										?>
													<li id="<?php echo $district->district_id; ?>"><?php echo $district->district_name; ?></li>
										<?php
												}else{
										?>
													<li id="<?php echo $district->district_id; ?>" class="vhide"><?php echo $district->district_name; ?></li>       
										<?php                                                    
												}

												$count++;
											}
										?>
									</ul>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply district-apply">Apply</a>
									</div>
								</div>
								<div class="dropdown-result district annex"></div>
							</div>
							<div class="dropdown price-picker">
								<div class="dropdown-title">Price</div>
								<div class="dropdown-list">
									<div class="clear-all">
										<a href="javascript:;" class="clear-all-selected">Clear All</a>
									</div>
									<div class="range-info">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									</div>

									<div class="range-container price">
										<div class="range-units"><span class="value-sgd">Valuation(SGD):</span><span class="range-min" id="price-range-min">1</span> &ndash; <span class="range-max" id="price-range-max">10,000+</span></div>

										<div class="range-bar">
											<input class="range-price-slider" type="hidden" value="1,900000"/>
										</div>
									</div>

									<div class="range-container price_per_sqft">
										<div class="range-units"><span class="value-sgd">Price/Sq.ft(SGD):</span><span class="range-min" id="psqft-range-min">1</span> &ndash; <span class="range-max" id="psqft-range-max">5,000</span></div>

										<div class="range-bar">
											<input class="range-price-sqft-slider" type="hidden" value="1,5000"/>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="cta-wrapper">
										<a href="javascript:void(0);" class="cta-cancel">Cancel</a>
										<a href="javascript:void(0);" class="cta-apply price-apply">Apply</a>
									</div>
									<!-- <div class="range-cta price">
										<div class="range-cta-apply price">Apply</div>
										<div class="range-cta-clear price">Clear</div>
									</div> -->
								</div>
								<div class="dropdown-result price annex"></div>
							</div>
							<br clear="all">
						</div>
				</div>
			</div>
		</div>
		<br clear="all">
	</div>
	<div class="property-individual-details">
		<div class="row">
			<div class="large-6 medium-6 small-12 columns">
				<div class="watch-list"><span class="fa fa-map-pin"></i></span>watchlist</div>
				<div class="sort-list">
					Sort Listings
				</div>
				<div class="clearfix"></div>
				<div id="listing-container"></div>
			</div>
			<div class="large-6 medium-6 small-12 columns">
				<div class="row">
					<div class="small-12 medium-12 columns">
					  <div id="map-canvas"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	
	<input type="hidden" id="theme-selected" value="">
	<input type="hidden" id="district-selected" value="">
	<input type="hidden" id="price-range" value="">
	<input type="hidden" id="psqft-range" value="">

	<?php include("includes/footer.php"); ?>

	<?php include("includes/scripts.php"); ?>

<script>

	var themes = [];
	var districts = [];
	var lat, lng;
	var search = '<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>';
	let map;

	function property_listing_ajax(theme, district, valuation, psqft, search, page){

		$.ajax({
			url: site_url+"property-listing/ajax/listings",
			data:{'theme' : theme, 'district' : district, 'valuation' : valuation, 'psqft' : psqft, 'page' : page, 'search' : search ,'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'},
			dataType: 'html',
			success: function(data) {             
				$("#listing-container").html(data);
				lat = $('.left-property-list > div:nth-child(1)').find('input:hidden[name=lat]').val();
				lng = $('.left-property-list > div:nth-child(1)').find('input:hidden[name=lng]').val();
				google.maps.event.addDomListener(window, 'load', initialize(lat, lng));
				initFunded();
			},
			type: 'POST',
		});


	}

	$(document).on('click', ".pagi-left",  function (){

		var prev = $('#prev').val();

		var theme = $('#theme-selected').val();
		var district = $('#district-selected').val();
		var valuation = $('#price-range').val();
		var psqft = $('#psqft-range').val();
		var page = $('#prev').val();
		var search = '<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>';

		property_listing_ajax(theme, district, valuation, psqft, search, page);
	});

	$(document).on('click', '.pagi-right', function (){

		var next = $('#next').val();

		var theme = $('#theme-selected').val();
		var district = $('#district-selected').val();
		var valuation = $('#price-range').val();
		var psqft = $('#psqft-range').val();
		var page = $('#next').val();
		var search = '<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>';

		property_listing_ajax(theme, district, valuation, psqft, search, page);

	});  

	$(".clear-all-selected").on('click', function (){

		$('#theme-selected').val('')
		$('#district-selected').val('')
		$('#price-range').val('');
		$('#psqft-range').val('');

		themes = [];
		districts = [];

		var onload_theme = 'ALL';
		var onload_district = 'ALL';
		var onload_valuation = 0;
		var onload_psqft = 0;
		var onload_page = 1;

		property_listing_ajax(onload_theme, onload_district, onload_valuation, onload_psqft, search, onload_page);    
	});   

	$("#theme-selector").on('click','li',function (){
		var idx = $.inArray($(this).text(), themes);
		if(idx == -1){
			themes.push($(this).text());
		}else{
			themes.splice(idx, 1);
		}
	});

	$("#district-selector").on('click','li',function (){
		// districts.push($(this).attr('id'));
		var idx = $.inArray($(this).text(), districts);
		if(idx == -1){
			districts.push($(this).attr('id'));
		}else{
			districts.splice(idx, 1);
		}        
	});

	$(".themes-apply").on('click', function (){
		$('#theme-selected').val(themes);

		$('#district-selected').val(districts);

		var price_min = $('#price-range-min').text();        
		var price_max = $('#price-range-max').text();        
		var psqft_min = $('#psqft-range-min').text();        
		var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

		$('#price-range').val(price_min+'-'+price_max);
		$('#psqft-range').val(psqft_min+'-'+psqft_max);

		var theme = $('#theme-selected').val();
		var district = $('#district-selected').val();
		var valuation = $('#price-range').val();
		var psqft = $('#psqft-range').val();
		var page = $('#page').val();

		property_listing_ajax(theme, district, valuation, psqft, search, page);
	});

	$(".district-apply").on('click', function (){
		$('#theme-selected').val(themes);

		$('#district-selected').val(districts);
		console.log(districts);
		var price_min = $('#price-range-min').text();        
		var price_max = $('#price-range-max').text();        
		var psqft_min = $('#psqft-range-min').text();        
		var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

		$('#price-range').val(price_min+'-'+price_max);
		$('#psqft-range').val(psqft_min+'-'+psqft_max);

		var theme = $('#theme-selected').val();
		var district = $('#district-selected').val();
		var valuation = $('#price-range').val();
		var psqft = $('#psqft-range').val();
		var page = $('#page').val();

		property_listing_ajax(theme, district, valuation, psqft, search, page);
	});

	$(".price-apply").on('click', function (){

		$('#theme-selected').val(themes);

		$('#district-selected').val(districts);

		var price_min = $('#price-range-min').text();        
		var price_max = $('#price-range-max').text();        
		var psqft_min = $('#psqft-range-min').text();        
		var psqft_max = $('#psqft-range-max').text().replace(/,/g, '');

		$('#price-range').val(price_min+'-'+price_max);
		$('#psqft-range').val(psqft_min+'-'+psqft_max);

		var theme = $('#theme-selected').val();
		var district = $('#district-selected').val();
		var valuation = $('#price-range').val();
		var psqft = $('#psqft-range').val();
		var page = $('#page').val();

		property_listing_ajax(theme, district, valuation, psqft, search, page);

	});

	function initFunded() {
		var funded = $('.funded > div');
		$.each(funded, function (index, value) {

			var class_name = $(value).attr('class');
			var percentage = $(value).data('value');
			var arr = class_name.split(' ');
			$('.' + arr[0] + '.circle').circleProgress({
				startAngle: -Math.PI / 4 * 2,
				fill: {
					gradient: ['#ec3a2a', '#fedd06'],
					gradientAngle: Math.PI / 4
				},
				lineCap: "round"
			}).on('circle-animation-progress', function (event, progress, stepValue) {

				$(this).find('strong').html(percentage + '<sup>%</sup><span class="funded">FUNDED</span>');
			});
		});
	}

	<?php 
		if($this->input->post()):
		$post = $this->input->post();
	?>
		var onload_theme = '<?=$post['theme_selected'] ?>';
		var onload_district = "<?=$post['district_selected'] ?>";
		var onload_valuation = "<?=$post['price_range'] != '' ? $post['price_range'] : 0; ?>";
		var onload_psqft = "<?=$post['psqft_range'] != '' ? $post['psqft_range'] : 0; ?>";
		var onload_page = 1;

	<?php else: ?>
	
		var onload_theme = 'ALL';
		var onload_district = 'ALL';
		var onload_valuation = 0;
		var onload_psqft = 0;
		var onload_page = 1;
	<?php endif; ?>

	property_listing_ajax(onload_theme, onload_district, onload_valuation, onload_psqft, search, onload_page);
	
</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.30&key=AIzaSyAUnmq_rZa0KOPBeZQFnT2DMeUvtL2q7dM"></script>

<script type="text/javascript"></script>

<script type="text/javascript">
	/*
 * 5 ways to customize the Google Maps infowindow
 * 2015 - en.marnoto.com
 * http://en.marnoto.com/2014/09/5-formas-de-personalizar-infowindow.html
*/

// map center



function initialize(lat_val, lng_val, element) {
	var center = new google.maps.LatLng(lat_val, lng_val);

	// marker position
  	var mapOptions = {
		center: center,
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP
  	};

	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	
	if(!element) {
		element = $('.property-wrapper').first().parent();
	}

	placeMap(element, lat_val, lng_val)
}

	
$(document).on( "click", '.property-wrapper', function() {
	lat = $(this).find('input:hidden[name=lat]').val();
	lng = $(this).find('input:hidden[name=lng]').val();
	placeMap($(this), lat, lng);
});

function placeMap(element, lat = null, lng = null) {
	// InfoWindow content
	var content = element.find('.map-content').html();

	// A new Info Window is created and set content
	var infowindow = new google.maps.InfoWindow({
		content: content,
		// Assign a maximum value for the width of the infowindow allows
		// greater control over the various content elements
		Width: 250
	});

	var center = map.getCenter();
	if(lat != null && lng != null) {
		center = {
			lat: +lat,
			lng: +lng
		}
	}
	// marker options
	var marker = new google.maps.Marker({
		position: center,
		map: map,
		icon : 'assets/frontend/images/map-marker.png'
		// title:"Porcelain Factory of Vista Alegre"
	});
 
	// This event expects a click on a marker
	// When this event is fired the Info Window is opened.
	infowindow.open(map,marker);

	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});

	// Event that closes the Info Window with a click on the map
	google.maps.event.addListener(map, 'click', function() {
		infowindow.close();
	});

	$(document).on( "click", '.property-wrapper', () => {
		infowindow.close();
	});

	// *
	// START INFOWINDOW CUSTOMIZE.
	// The google.maps.event.addListener() event expects
	// the creation of the infowindow HTML structure 'domready'
	// and before the opening of the infowindow, defined styles are applied.
	// *
	google.maps.event.addListener(infowindow, 'domready', () => {
		// for load cirleprogress
		$('.gm-style-iw').find('canvas').last().remove()
		$('.property-details.circle').circleProgress({
			startAngle: -Math.PI / 4 * 2,
			fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
		}).on('circle-animation-progress', function(event, progress, stepValue) {
			//$(this).find('strong').html(Math.round(100 * stepValue) + '<sup>%</sup><span class="funded">FUNDED</span>');
			$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
		});

		// Reference to the DIV that wraps the bottom of infowindow
		var iwOuter = $('.gm-style-iw');

		/* Since this div is in a position prior to .gm-div style-iw.
		* We use jQuery and create a iwBackground variable,
		* and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
		*/
		var iwBackground = iwOuter.prev();
		$('.gm-style-iw').children('div').children('div').css("overflow", "hidden");
		// Removes background shadow DIV
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});

		// Removes white background DIV
		iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		// Moves the infowindow 115px to the right.
		iwOuter.parent().parent().addClass('infowindow-pos');

		// Moves the shadow of the arrow 76px to the left margin.
		iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 100px!important'});
		// Moves the arrow 76px to the left margin.
		iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left:  100px!important;'});

		
		// for triangle color.
		$('.gm-style').children().first().children(':nth-child(4)').children().children().children(':nth-child(1)').addClass('triangle');
		// Changes the desired tail shadow color.

		iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'none', 'z-index' : '1'});

		// Reference to the div that groups the close button elements.
		var iwCloseBtn = iwOuter.next();

		// Apply the desired effect to the close button
		iwCloseBtn.addClass('closebtn');
		// $('.closebtn').children('img').src();

		// The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
		iwCloseBtn.mouseout(function() {
			$(this).css({opacity: '1'});
		});
	});
}
</script>
</body>

</html>