<!--scripts-->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<!-- <script
  src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js"
  integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8="
  crossorigin="anonymous"></script> -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/js_cookie.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery-ui.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/what-input.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/foundation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.bxslider.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/owl.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/modernizr-custom.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/classie.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/main.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/math.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.mousewheel.pack.js?v=3.1.3'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.fancybox.pack.js?v=2.1.5'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.fancybox-buttons.js?v=1.0.5'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.fancybox-thumbs.js?v=1.0.7'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.fancybox-media.js?v=1.0.6'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.mask.min.js?v=1.14.15'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/jquery.panorama360.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/perfect-scrollbar.js'); ?>"></script>


<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/perfect-scrollbar.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/global/plugins/jssocials/dist/jssocials.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/vendor/AutoNumeric.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/global/plugins/collapser/collapser.min.js'); ?>"></script>



<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/account.js'); ?>"></script>
<script src="<?=base_url('assets/frontend/js/vendor/numeral.min.js')?>"></script>

<script type="text/javascript">
$( function()
{



	$("#subscribe-form").on("submit", function(e){
		e.preventDefault();
		var data = $(this).serialize();
		
		$.ajax({
			url: '<?=base_url()?>users/subscribe',
			type: 'POST',
			data: data,
			success: function(res){
				$("#subs-email").val("");
				$("#subs-message").text(res);
			}
		});

	});

    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function(e)
    {	
    	e.stopPropagation();
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 430 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
    });
});

$(window).load(function(){
		ele_max_height();
	var shortContent = function() {
		var height_doc = $('body').height();
		if($(window).height() < height_doc) {
		$('footer').removeClass('fixed');
		$('.checkout-footer').removeClass('fixed');
		}else {
		$('footer').addClass('fixed');
		$('.checkout-footer').addClass('fixed');
		}
		// console.log($('footer').outerHeight(true));
		// console.log($('body').height());
		// console.log(height_doc);
		// console.log($(window).height());
	};
	shortContent();
})
$(window).resize(function() {
	var shortContent = function() {
		var height_doc = $('body').height();
		if($(window).height() < height_doc) {
		$('footer').removeClass('fixed');
		$('.checkout-footer').removeClass('fixed');
		}else {
		$('footer').addClass('fixed');
		$('.checkout-footer').addClass('fixed');
		}
		// console.log($('footer').outerHeight(true));
		// console.log($('body').height());
		// console.log(height_doc);
		// console.log($(window).height());
	};
		shortContent();
	ele_max_height();
});
function ele_max_height(){
	var maxHeight = -1;
	  $('.article-wrapper').each(function() {
	    maxHeight = maxHeight > $(this).height() ? maxHeight :     $(this).height();
	 });

	 $('.article-wrapper').each(function() {
	   $(this).height(maxHeight);
	 });
}
$(document).ready(function(){
	$("body").removeClass("vhide");
	$("body").addClass("load");
	
	$('.carousel-property-details').bxSlider({
		mode: 'horizontal',
		pager: false,
		controls: true,
		nextSelector: '#property-details-slider-next',
		prevSelector: '#property-details-slider-prev',
		nextText: '&gt;',
		prevText: '&lt',
		onSlideAfter: function(){

		}
	});
	// $(window).bind("load", function () {
	// 	var footer = $("footer");
	// 	var pos = footer.position();
	// 	var height = $(window).height();
	// 	height = height - pos.top;
	// 	height = height - footer.height();
	// 	if (height > 0) {
	// 		footer.css({
	// 			'margin-top': height + 'px'
	// 		});
	// 	}
	// });
	
	// $(window).bind("resize", function () {
	// 	var footer = $("footer");
	// 	var pos = footer.position();
	// 	var height = $(window).height();
	// 	height = height - pos.top;
	// 	height = height - footer.height();
	// 	if (height > 0) {
	// 		footer.css({
	// 			'margin-top': height + 'px'
	// 		});
	// 	}
	// });
	
	
	$('.dropdown').on({
		mousemove: function() {
			event.preventDefault(event);
			$(this).addClass("dropdown-active");
			$(this).children(".dropdown-list").fadeIn("fast");
			//$('.bg-rgba').css('display','block');
			//$(".home .advanced-search .form-heading , .row.bg-grey").addClass('z-index-1');
			$(this).find('.dropdown-title').addClass('z-index5');
			$(this).siblings().addClass('z-index-2 , opacity-fill');
			
		},
		mouseleave: function(event) {
			event.preventDefault();
			$(this).removeClass("dropdown-active");
			$(this).children(".dropdown-list").fadeOut("slow");
			$(this).find('.dropdown-title').removeClass('z-index5');
			$(this).siblings().removeClass('z-index-2 , opacity-fill');
		}
	});
	$("header .menu ul li:nth-child(2)").on({
		mousemove: function() {
			event.preventDefault(event);
			$(this).find(".dropdown-main-nav").fadeIn("fast");
			
		},
		mouseleave: function(event) {
			event.preventDefault();
			$(this).find(".dropdown-main-nav").fadeOut("fast");
		}
	});
		// $('.search-s-fa').on({
		// click: function(e) {
		// 	$(".search").addClass("active").siblings(".admin").find(".search-form").fadeIn("fast");
		// 	$('.search-close-fa').css("visibility","visible");
		// 	$('.search-s-fa').css("visibility","hidden");

		// }
		// ,
		// mouseleave: function(event) {
		// 	event.preventDefault();
		// 	$(this).removeClass("active").siblings(".admin").find(".search-form").fadeOut("fast");
		// }
	// });
	$('#search-s-fa').on("click", function(e){
		 e.stopPropagation();
		$(".search").addClass("active").siblings(".admin").find(".search-form").fadeIn("fast");
		$('#search-s-fa').css("visibility","hidden");
		$('#search-close-fa').css("visibility","visible");
		$(".header-search").css("z-index","2");
	});
	$('.search-close-fa').on("click", function(e){
		 e.stopPropagation();
		$('.search').removeClass("active").siblings(".admin").find(".search-form").fadeOut("fast");
		$('.search-s-fa').css("visibility","visible");
		$('.search-close-fa').css("visibility","hidden");
		$(".header-search").css("z-index","1");
	});
	$("body").on("click" , function(){
		// e.preventDefault();
		if($('#search-close-fa').is(":visible")){
				$(".search-form").fadeOut("fast");
				$('#search-close-fa').css("visibility","hidden");
				$('#search-s-fa').css("visibility","visible");
				$(".header-search").css("z-index","1");								
			}
		if($(".login-overlay").is(":visible")){
			$('.login-overlay').hide("slide", { direction: "right" }, 1000);
		}
		if($(".my-account-menu").is(":visible")){
			$('.my-account-menu').hide("slide", { direction: "right" }, 1000);
		}
	})
	$(".search-text").on('click',function(e){
		e.stopPropagation();
	})
	$(".login-overlay-container").on('click',function(e){
		e.stopPropagation();
	})
	$(".my-account-menu-container").on('click',function(e){
		e.stopPropagation();
	})


 	var flag_1 = "";
 	var flag_2 = "";
 	var flag_3 = "";
	$('ul.district li').on("click", function(){
		$(".dropdown-result.district").text($(this).text());
		$( this ).toggleClass("active-state");
		var items = $("ul.district li.active-state").length;
		console.log(items);
		$('.district .selected-items').css("display","inline-block");
		$('.district .selected-items').html(items);
		//$('ul.district').parent(".dropdown-list").hide();
		
	});
	$('ul.district li:first-child').on("click", function(){
		$(".dropdown-result.district").text($(this).text());
		$( this ).removeClass("active-state");
		$('ul.district li:not(:first)').addClass("active-state");
		var items = $("ul.district li.active-state").length;
		console.log(items);
		$('.district .selected-items').css("display","inline-block");
		$('.district .selected-items').html(items);
		//$('ul.residential').parent(".dropdown-list").hide();
		
	});
	$('.district .cta-apply').on("click", function(){
		$('ul.district').parent(".dropdown-list").hide();
		$('ul.district li').removeClass('active-state');
		// $('.selected-items').css("display","none");
	});
	$('.district .cta-cancel').on("click", function(){
		$('ul.district').parent(".dropdown-list").hide();
		$('ul.district li').removeClass('active-state');
		$('.district .selected-items').css("display","none");
	});

	
	$('ul.residential li').on("click", function(){
		$(".dropdown-result.residential").text($(this).text());
		$( this ).toggleClass("active-state");
		var items = $("ul.residential li.active-state").length;
		console.log(items);
		$('.residential .selected-items').css("display","inline-block");
		$('.residential .selected-items').html(items);
		//$('ul.residential').parent(".dropdown-list").hide();
		
	});
	$('ul.residential li:first-child').on("click", function(){
		$(".dropdown-result.residential").text($(this).text());
		$( this ).removeClass("active-state");
		$('ul.residential li:not(:first)').addClass("active-state");
		var items = $("ul.residential li.active-state").length;
		console.log(items);
		$('.residential .selected-items').css("display","inline-block");
		$('.residential .selected-items').html(items);
		//$('ul.residential').parent(".dropdown-list").hide();
		
	});
	$('.residential .cta-apply').on("click", function(){
		$('ul.residential').parent(".dropdown-list").hide();
		// $('ul.residential li').removeClass('active-state');
		// $('.selected-items').css("display","none");
	});
	$('.residential .cta-cancel').on("click", function(){
		$('ul.residential').parent(".dropdown-list").hide();
		$('ul.residential li').removeClass('active-state');
		$('.residential .selected-items').css("display","none");
	});

	
	$('.range-cta-apply.size').on("click", function(){
		$(".dropdown-result.size").text($(".range-container.size .pointer-label.low").text()+" - "+$(".range-container.size .pointer-label.high").text()+"sqm");
		$('.range-container.size').parent(".dropdown-list").hide();
		//var flag = true;
	});

	$('.price-picker .cta-wrapper .cta-apply').on("click", function(){
		$(".dropdown-result.price").text("SGD $"+$(".range-container.price .pointer-label.low").text()+" - "+$(".range-container.price .pointer-label.high").text());
		$('.range-container.price').parent(".dropdown-list").hide();
		 flag_3 = 3;
		console.log(flag_3);
	});
	$('.price-picker .cta-wrapper .cta-cancel').on("click", function(){
		$(".dropdown-result.price").text("SGD $"+$(".range-container.price .pointer-label.low").text()+" - "+$(".range-container.price .pointer-label.high").text());
		$('.range-container.price').parent(".dropdown-list").hide();
	});

	$(".residential .clear-all").on("click",function(){
		$("ul.residential li").removeClass("active-state");
		$('.residential .selected-items').css("display","none");
	})
	$(".district .clear-all").on("click",function(){
		$("ul.district li").removeClass("active-state");
		$('.district .selected-items').css("display","none");
	})
	// if($(".bg-rgba").css('display','block')){
	// 	if( flag_1 == 1 && flag_2 == 2 && flag_3 == 3 ){
	// 		console.log("12");
	// 		$('.bg-rgba').css('display','none');
	// 	}
	// }
	
	// var res_anx = $(".dropdown-result.residential.annex").text().length;
	// console.log(res_anx);
	// var dis_anx = $(".dropdown.district .annex").html();
	// var price_anx = $(".dropdown.price-picker .annex").html();
	// if ( res_anx != '' && dis_anx == '' && price_anx == ''){ 
	// 	// console.log("text");
	// 	$('.bg-rgba').css('display','none');
	// }
	
	$('.btn-my-account').on("click", function(e){
		e.stopPropagation();
		$('.my-account-menu').show("slide", {direction: "right" }, 1000);
	});

	$(".go-to-login").on("click", function(){
		$('.login-overlay').show("slide", {direction: "right" }, 1000);
	});
	$(".go-to-login-alter").on("click", function(){
		$('.login-overlay').show("slide", {direction: "right" }, 1000);
		$('html, body').animate({scrollTop : 0},800);
        return false;
	});

	$('.my-account-menu-container .close').on("click", function(e){
		e.stopPropagation();
		$('.my-account-menu').hide("slide", { direction: "right" }, 1000);
	});

	$('.login-item').on("click", function(e){
		e.stopPropagation();
		$('.login-overlay').show("slide", {direction: "right" }, 1000);
		
	});

	$('.login-overlay-container .close').on("click", function(e){
		e.stopPropagation();
		$('.login-overlay').hide("slide", { direction: "right" }, 1000);
	});

	$(window).resize(function() {
		var viewportWidth = $(window).width();
		if(viewportWidth <= 985){
			$('.my-account-menu-container .close').trigger("click");
		}
		 $(".center-white , .bg-orange").css("height", $(".bg-green").height());
	});
	 $(window).scroll(function(){ 
        if ($(this).scrollTop() > 2000) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 
    //Click event to scroll to top
    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    $(".center-white , .bg-orange").css("height", $(".bg-green").height());
    $('.more').on('click', function(){
			var $this = this;
			$('li').removeClass('.vhide').slideDown('400');
			$($this).css('visibility','hidden');
			});
    $(".owl-carousel").owlCarousel({
  		  center: true,
  		  nav: true,
  		  loop: true,
  		  responsiveClass:true,
		    responsive:{
		        0 : {
			       items:1,
	          	 	 nav:true
			    },
			    // breakpoint from 480 up
			    480 : {
			       items:1,
            		nav:true
			    },
			    // breakpoint from 768 up
			    768 : {
			       items:3,
           		   nav:true
		    	}
			}
  	});
    $('.owl-carousel').find('.owl-nav').removeClass('disabled');
	$('.owl-carousel').on('changed.owl.carousel', function(event) {
		$(this).find('.owl-nav').removeClass('disabled');
	});
   	
});
</script>
<script src="<?php echo base_url('assets/frontend/js/app.js'); ?>"></script>

<script src="<?php echo base_url('assets/frontend/js/vendor/jquery.range.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.range-size-slider').jRange({
        from: 1500,
        to: 10000,
        scale: [1500,10000],
        format: '%s',
        width: '100%',
        showLabels: true,
        isRange : true,
		onstatechange: function(){
			$(".range-container.size .range-min").text($(".range-container.size .pointer-label.low").text());
			$(".range-container.size .range-max").text($(".range-container.size .pointer-label.high").text());
		}
    });
	
	$(".range-container.size .range-min").text($(".range-container.size .pointer-label.low").text());
	$(".range-container.size .range-max").text($(".range-container.size .pointer-label.high").text());
	
	
	$('.range-price-slider').jRange({
        from: 1,
        to: 900000,
        scale: [1,900000],
        format: '%s',
        width: '100%',
        showLabels: true,
        isRange : true,
		onstatechange: function(){
			var range_container_name = ".range-container.price";

			$(range_container_name + " .range-min").text($(range_container_name + " .pointer-label.low").text());
			$(range_container_name + " .range-max").text($(range_container_name + " .pointer-label.high").text());
			
			$(range_container_name).addClass('selected_range_bar');
			
			
		}
  });
  //   $('.sqft-price-slider').jRange({
  //       from: 1,
  //       to: 100000,
  //       scale: [1,900000],
  //       format: '%s',
  //       width: '100%',
  //       showLabels: true,
  //       isRange : true,
		// onstatechange: function(){
		// 	$(".range-container.sqft .range-min").text($(".range-container.sqft .pointer-label.low").text());
		// 	$(".range-container.sqft .range-max").text($(".range-container.sqft .pointer-label.high").text());
		// }
  //   });
	if ($('.hidden-mobile .range-price-slider').length > 0) {
		
    $(".hidden-mobile .range-price-slider~.slider-container .back-bar .selected-bar").css("width","100%");
    $(".hidden-mobile .range-price-slider~.slider-container .back-bar .pointer.high").css("left","90%");
  }
	$('.range-price-sqft-slider').jRange({
		from: 1,
		to: 5000,
		scale: [1,5000],
		format: '%s',
		width: '100%',
		showLabels: true,
		isRange : true,
		onstatechange: function(){
			var range_container_name = ".range-container.price_per_sqft";

			$(range_container_name + " .range-min").text($(range_container_name + " .pointer-label.low").text());
			$(range_container_name + " .range-max").text($(range_container_name + " .pointer-label.high").text());

			$(range_container_name).addClass('selected_range_bar');
		
		}
    });
	if ($('.hidden-mobile .range-price-sqft-slider').length > 0) {

    $(".hidden-mobile .range-price-sqft-slider~.slider-container .back-bar .selected-bar").css("width","100%");
    $(".hidden-mobile .range-price-sqft-slider~.slider-container .back-bar .pointer.high").css("left","90%");
  }

	$(".range-container.price .range-min").text($(".range-container.price .pointer-label.low").text());
	$(".range-container.price .range-max").text($(".range-container.price .pointer-label.high").text());


	$('.mobile-menu').on('click', function(){
		$('#mobile-menu').css('width', '320px'); 
	}); 
	$('#close-menu').on('click', function(){
		$('#mobile-menu').css('width',  '0px'); 
	}); 
	$.fn.digits = function(){ 
	    return this.each(function(){ 
	        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    	})
	}
	// $('.postlog-slider .slider').on('moved.zf.slider', function(){
	//    var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
	//    var balance_amount = parseInt(unit * 10000);
	//    $(".balance_amount").text(balance_amount).digits();
	//    $('#detail-funding').circleProgress('value',"0."+unit);
	// });

	// $('.prelog-slider .slider').on('moved.zf.slider', function(){
	//    var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
	//    var balance_amount = parseInt(unit * 10000);
	//    $(".balance_amount").text(balance_amount).digits();
	//    $('#prelog-detail').circleProgress('value',"0."+unit);
	// });
	 // $("a.loginlink").on("click", function(){
  //     $("a.loginlink").fancybox({
  //       'href'   : '#login',
  //       wrapCSS : 'mobile-popup',
  //       closeBtn  : false, 
  //       padding: 0,
  //       helpers: {
  //         overlay: {
  //           locked: false
  //         }
  //       }
  //     });
  //     $('#mobile-menu').css('width',  '0px');
  //   });
});
</script>
<script src="<?php echo base_url('assets/frontend/js/vendor/circle-progress.js'); ?>"></script>
<script>
$('.property-image').on({
	mouseenter: function() {
		event.preventDefault(event);
		$(this).find(".progressbar-container").fadeIn("fast");
		
		$('.property.circle').circleProgress({
			startAngle: -Math.PI / 4 * 2,
			fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
		}).on('circle-animation-progress', function(event, progress, stepValue) {
			$(this).find('strong').html(Math.round(100 * stepValue) + '<i>%</i>');
		}); 
	},
	mouseleave: function(event) {
		event.preventDefault();
		$(this).find(".progressbar-container").fadeOut("fast");
	}
});

$('.property-like').on( "click", function() {
  $(this).toggleClass("liked")
});

$('.property-home.circle').circleProgress({
	startAngle: -Math.PI / 4 * 2,
	fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
}).on('circle-animation-progress', function(event, progress, stepValue) {
					$(this).find('strong').html(Math.round(100 * stepValue) + '<sup>%</sup><span class="funded">FUNDED</span>');
				}); 

$('.property-details.circle').circleProgress({
	startAngle: -Math.PI / 4 * 2,
	fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
}).on('circle-animation-progress', function(event, progress, stepValue) {
					$(this).find('strong').html(Math.round(100 * stepValue) + '<sup>%</sup><span class="funded">FUNDED</span>');
				}); 
</script>
<script src="<?php echo base_url('assets/frontend/js/vendor/canvasjs.min.js'); ?>"></script>

<script type="text/javascript">
	if ($('#chartContainer').length > 0 ) {


		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				exportEnabled: true,
				title: {
					text: ""
				},
				axisX: {
					title: "TIME",
					titleFontColor: "#999",
					minimum: new Date(2009,0),
					maximum: new Date(2018,0)
					
				},
				axisY:{
						title : "yield (%)",
						titleFontColor: "#999",
						includeZero: false

						// minimum: 3.8,
						// minimum: 4,
					},
				data: [
				{
					type: "area",
					color: "rgba(0,159,257,0.6)",
					
					dataPoints: [
					{ x: new Date(2009,0), y: 3.95 },
					{ x: new Date(2010,0), y: 3.9 },
					{ x: new Date(2011,0), y: 3.98 },
					{ x: new Date(2012,0), y: 3.91 },
					{ x: new Date(2013,0), y: 3.99 },
					{ x: new Date(2014,0), y: 3.94 },
					{ x: new Date(2015,0), y: 3.93 },
					{ x: new Date(2016,0), y: 3.93 },
					{ x: new Date(2017,0), y: 3.82 }
					// { x: new Date(2018,0), y: 3.9 },
					
					]
				}
				]
			});
			chart.render();
			
			var chart = new CanvasJS.Chart("chartContainer2", {
				title: {
					text: ""
				},
				data: [
				{
					type: "splineArea",
					dataPoints: [
					{ x: new Date(2009, 0), y: 2506 },
					{ x: new Date(2010, 0), y: 2798 },
					{ x: new Date(2011, 0), y: 3386 },
					{ x: new Date(2012, 0), y: 6944 },
					{ x: new Date(2013, 0), y: 6026 },
					{ x: new Date(2014, 0), y: 2394 },
					{ x: new Date(2015, 0), y: 1872 },
					{ x: new Date(2016, 0), y: 2140 },
					{ x: new Date(2017, 0), y: 7289 }
					]
				}
				]
			});
			chart.render();

			var chart = new CanvasJS.Chart("chartContainer3", {
				title: {
					text: ""
				},
				data: [
				{
					type: "splineArea",
					dataPoints: [
					{ x: new Date(2009, 0), y: 2506 },
					{ x: new Date(2010, 0), y: 2798 },
					{ x: new Date(2011, 0), y: 3386 },
					{ x: new Date(2012, 0), y: 6944 },
					{ x: new Date(2013, 0), y: 6026 },
					{ x: new Date(2014, 0), y: 2394 },
					{ x: new Date(2015, 0), y: 1872 },
					{ x: new Date(2016, 0), y: 2140 },
					{ x: new Date(2017, 0), y: 7289 }
					]
				}
				]
			});
			chart.render();
			
			var chart = new CanvasJS.Chart("chartContainer4", {
				title: {
					text: ""
				},
				data: [
				{
					type: "splineArea",
					dataPoints: [
					{ x: new Date(2009, 0), y: 2506 },
					{ x: new Date(2010, 0), y: 2798 },
					{ x: new Date(2011, 0), y: 3386 },
					{ x: new Date(2012, 0), y: 6944 },
					{ x: new Date(2013, 0), y: 6026 },
					{ x: new Date(2014, 0), y: 2394 },
					{ x: new Date(2015, 0), y: 1872 },
					{ x: new Date(2016, 0), y: 2140 },
					{ x: new Date(2017, 0), y: 7289 }
					]
				}
				]
			});
			chart.render();
		}
}
</script>


<script type="text/javascript">
	$(document).ready(function() {

		// $(".cta-view-gallery").on("click", function(){
		// 	console.log("10");
		// 	$('.fancybox-thumbs:eq(0)').trigger("click");
		// });
		// $('.fancybox-thumbs').fancybox({
		// 	prevEffect : 'none',
		// 	nextEffect : 'none',

		// 	closeBtn  : true,
		// 	arrows    : true,
		// 	nextClick : true,

		// 	helpers : {
		// 		thumbs : {
		// 			width  : 50,
		// 			height : 50
		// 		}
		// 	}
		// });
		$('.panorama-view').panorama360();
		 $('.sim-thumb').on('click', function() {
			 var href = $(this).data('image');
			 var mode = $(this).data('panorama');
			 
		 	  // $("#gallery_img").css('background-image', 'url(' + href + ')');
			  $('#main-product-image:first-child').attr('src', href);
			  $('#main-product-image:first-child').attr('data-panorama', mode);
			  $('#main-product-image:last-child').attr('src',href);
			  $('#main-product-image:last-child').attr('data-panorama', mode);
			   $(".sim-thumb").removeClass("active");
			   $(this).addClass("active");
			  resetPanorama();
		    });
		 $('.normal-img-gallery .sim-thumb').on('click', function() {
		 	  var href = $(this).data('image');
		 	  $("#gallery_img").css('background-image', 'url(' + href + ')');
			   $(".normal-img-gallery .sim-thumb").removeClass("active");
			   $(this).addClass("active");
		    });
		 //move next
		$(".next-img").click(function(){
		    if($(".sim-thumb.active").next(".sim-thumb").length>0){
		        $(".sim-thumb.active").next().trigger("click");
				console.log(1);
			}
			resetPanorama();
		    return false;
		});
		//move previous 
		$(".prev-img").click(function(){
		    if($(".sim-thumb.active").prev(".sim-thumb").length>0){
		        $(".sim-thumb.active").prev().trigger("click");
		    }
		    //  else {            
		    //     $(".sim-thumb:last").trigger("click");//go to end
			// }
			resetPanorama();			
		    return false;
		});

		function resetPanorama() {
			var settings = {
				start_position: 0,
				image_width: 0,
				image_height: 0,
			};

			var panoramaContainer = $('.panorama-view').children('.panorama-container');
			var viewportImage = panoramaContainer.children('img:first');

			if(settings.image_width<=0 && settings.image_height<=0){
				settings.image_width = parseInt(viewportImage.data("width"));
				settings.image_height = parseInt(viewportImage.data("height"));
				if (!(settings.image_width) || !(settings.image_height)) return;
			}

			var image_ratio = settings.image_height/settings.image_width;
			var elem_height = parseInt($('.panorama-view').height());
			var elem_width = parseInt(this.elem_height/image_ratio);

			$('.panorama-view').children('.panorama-container').css({
				'margin-left': '-'+settings.start_position+'px',
				'width': (elem_width*2)+'px',
				'height': (elem_height)+'px'
			});
		}
		
		/*Show Password*/
		$(".toggle-password").click(function() {
		  $(this).toggleClass("fa-eye fa-eye-slash");
		  var input = $($(this).attr("toggle"));
		  if (input.attr("type") == "password") {
		    input.attr("type", "text");
		  } else {
		    input.attr("type", "password");
		  }
		});
	});
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>


<?php
if (isset($login_error_msg) && $login_error_msg){
?>
<script type="text/javascript">
$(function() {
	$( ".login-item" ).trigger("click");
});		

</script>
<?php
} ?>


<!-- SEARCH -->
<script type="text/javascript">

$(document).ready(function(){

	$(".search-text").on('keyup', function(e){
		if(e.which === 13 || e.keyCode === 13){
			window.location.href = site_url + 'properties?search=' + e.target.value;
		}
	});

});
</script>


<!--scripts-->

<?php include("application/views/includes/overlays.php"); ?>