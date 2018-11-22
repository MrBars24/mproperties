<!--scripts-->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<!-- <script
  src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js"
  integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8="
  crossorigin="anonymous"></script> -->
  <!--Modal script-->



<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/js_cookie.js"></script>
<script src="js/vendor/jquery-ui.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/vendor/perfect-scrollbar.js"></script>
<script src="js/vendor/jquery.bxslider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/vendor/owl.carousel.min.js"></script>
<script src="js/vendor/modernizr-custom.js"></script>
<script src="js/vendor/classie.js"></script>
<script src="js/vendor/main.js"></script>
<script src="js/vendor/math.min.js"></script>
<!--Modal-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
    //this function can remove a array element.
  Array.remove = function(array, from, to) {
      var rest = array.slice((to || from) + 1 || array.length);
      array.length = from < 0 ? array.length + from : from;
      return array.push.apply(array, rest);
  };

  //this variable represents the total number of popups can be displayed according to the viewport width
  var total_popups = 0;
  
  //arrays of popups ids
  var popups = [];

  function popup_toggle(id) {
		$('#'+id+  " .popup-messages").slideToggle();
  }
  //this is used to close a popup
  function close_popup(id)
  {
      for(var iii = 0; iii < popups.length; iii++)
      {
          if(id == popups[iii])
          {
              Array.remove(popups, iii);
              
              document.getElementById(id).style.display = "none";
              
              calculate_popups();
              
              return;
          }
      }   
  }

  //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
  function display_popups()
  {

      var right = 300;
      
      var iii = 0;
      for(iii; iii < total_popups; iii++)
      {
          if(popups[iii] != undefined)
          {
              var element = document.getElementById(popups[iii]);
              element.style.right = right + "px";
              right = right + 320;
              element.style.display = "block";
          }
      }
      
      for(var jjj = iii; jjj < popups.length; jjj++)
      {
          var element = document.getElementById(popups[jjj]);
          element.style.display = "none";
      }
  }
  
  //creates markup for a new popup. Adds the id to popups array.
  function register_popup(id, name, img_src, user_status, noti_count)
  {
      
      for(var iii = 0; iii < popups.length; iii++)
      {   
          //already registered. Bring it to front.
          if(id == popups[iii])
          {
              Array.remove(popups, iii);
          
              popups.unshift(id);
              
              calculate_popups();
              
              
              return;
          }
      }
      var messages, chatbox, noti_txt;
      if (user_status == 'new-user') {
	    	messages = '<div class="con-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>';
	      messages = messages + '<a href="#" class="send_greet_mes">Send greeting message</a></div>';
	      chat_box = '<div class="chat-text hide"><input type="text" placeholder="Type a message..."> <i class="fa fa-paper-plane" aria-hidden="true"></i></div>';
      }
      else {
      	messages = '<div class="messages-wrap">';
      	messages = messages + '<div class="msg-left"><div class="msg-gray msg-toltip">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</div>';
      	messages = messages + '<div class="time">12.30pm</div></div>';

      	messages = messages + '<div class="msg-right msg-toltip"><div class="msg-red">Hello there!</div>';
      	messages = messages + '<div class="time">12.32pm</div></div>';

      	messages = messages + '<div class="msg-left"><div class="msg-gray msg-toltip">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</div>';
      	messages = messages + '<div class="time">12.35pm</div></div>';
      	messages = messages + '</div>';
      	chat_box = '<div class="chat-text"><input type="text" placeholder="Type a message..."> <i class="fa fa-paper-plane" aria-hidden="true"></i></div>';
      }
     	if (noti_count > 0) {
     		noti_txt = '<div class="noti-txt">'+noti_count+'</div>';
     	}
     	else {
     		noti_txt = '';
     	}

      var element = '<div class="chat-popup chat-popup" id="'+ id +'">';
      element = element + '<div class="popup-head">';
      element = element + '<a class="closechat" href="javascript:popup_toggle(\''+ id +'\');"><div class="popup-head-left"><img src="'+img_src+'" >';
      element = element + '<div class="name-txt">'+ name +'</div><img src="images/messenger-icon.png">'+ noti_txt +'</div></a>';
      element = element + '<div class="popup-head-right"><a class="closechat" href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
      element = element + '<div style="clear: both"></div></div><div class="popup-messages">'+messages+chat_box+'</div></div>';
      // console.log(document.getElementsByTagName("body")[0].innerHTML);
      //document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
      $('.pop-wrapper').append(element);
      popups.unshift(id);
              
      calculate_popups();
      
			

  }
  
  //calculate the total number of popups suitable and then populate the toatal_popups variable.
  function calculate_popups()
  {
      var width = window.innerWidth;
      if(width < 540)
      {
          total_popups = 0;
      }
      else
      {
          width = width - 200;
          //320 is width of a single popup box
          total_popups = parseInt(width/320);
      }
      
      display_popups();

      
  }
  

  //recalculate when window is loaded and also when window is resized.
  window.addEventListener("resize", calculate_popups);
  window.addEventListener("load", calculate_popups);
</script>
<script type="text/javascript">
$(document).ready(function(){
	// for chatbox toggle
	 // $(".chat-popup .popup-head .popup-head-left").click(function(){
	 //  		$(this).parent().parent().find(".popup-messages").slideToggle();
	  		
		// 	});
	$(".chat-header .fa").click(function(){
		if ($(this).hasClass('fa-plus')) {
			$(this).removeClass('fa-plus').addClass('fa-minus');
			if($('.broad-mes').css('display') == 'none'){
				$('.exit-group').hide();
			}
			else {
				$('.exit-group').show();
			}
			
		}
		else {
			$(this).removeClass('fa-minus').addClass('fa-plus');
			if($('.broad-mes').css('display') == 'none'){
				$('.exit-group').hide();
			}
			else {
				$('.exit-group').hide();
			}
			
		}
		$(".chat-body").slideToggle();
	});
	$(".join-group").click(function(){
		$('.broad-mes').show();
		$('.exit-group').show();
		$('.overlay-gray').css('position','static');
		$(this).hide();
	});

	
	// end chatbox
	// for individual message checkbox
	$('.message input:checkbox').click(function(event) { 

		
	  if($(this).prop('checked') == true){
	    	$(this).closest(".message").addClass('selected');
		}
		else {
			$(this).closest(".message").removeClass('selected');
		}
		
  });
  
	// for messages page select all
	$('.messages-wrapper #select-all').click(function(event) { 
	
	  if(this.checked) {
	      // Iterate each checkbox
	      $('.message input:checkbox').each(function() {
          this.checked = true;
          $(this).closest(".message").addClass('selected');
	      });
	  } else {
	      $('.message input:checkbox').each(function() {
	          this.checked = false;
	          $(this).closest(".message").removeClass('selected');                  
	      });
	  }
	});

	// for accordion.
	// if ($('.accordion').length >0 ) {
	// 	var acc = document.getElementsByClassName("accordion");
	// 	var i;

	// 	for (i = 0; i < acc.length; i++) {
	// 	  acc[i].addEventListener("click", function() {
	// 	      /* Toggle between adding and removing the "active" class,
	// 	      to highlight the button that controls the panel */
	// 	      this.classList.toggle("active");

	// 	      /* Toggle between hiding and showing the active panel */
	// 	      var panel = this.nextElementSibling;
	// 	      if (panel.style.display == "block") {
	// 	          panel.style.display = "none";
	// 	      } else {
	// 	          panel.style.display = "block";
	// 	      }
	// 	  });
	// }
	// }
	

	// Read more read less paragraph
	if ($('.read-more-content').length >0 ) {
		$('.read-more-content').addClass('hide')
		$('.read-more-show, .read-more-hide').removeClass('hide')
	
		// Set up the toggle effect:
		$('.read-more-show').on('click', function(e) {
		  $(this).next('.read-more-content').removeClass('hide');
		  $(this).addClass('hide');
		  e.preventDefault();
		});

		// Changes contributed by @diego-rzg
		$('.read-more-hide').on('click', function(e) {
		  var p = $(this).parent('.read-more-content');
		  p.addClass('hide');
		  p.prev('.read-more-show').removeClass('hide'); // Hide only the preceding "Read More"
		  e.preventDefault();
		});
	}
	

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
	 	// $(".admin").css("z-index","2");

	});
	$('.search-close-fa').on("click", function(e){
		 e.stopPropagation();
		$('.search').removeClass("active").siblings(".admin").find(".search-form").fadeOut("fast");
		$('.search-s-fa').css("visibility","visible");
		$('.search-close-fa').css("visibility","hidden");
		// $(".admin").css("z-index","1");

	});
	$("body").on("click" , function(){
		// e.preventDefault();
		if($('#search-close-fa').is(":visible")){
				$(".search-form").fadeOut("fast");
				$('#search-close-fa').css("visibility","hidden");
				$('#search-s-fa').css("visibility","visible");								
			}
	})
	$(".search-text").on('click',function(e){
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
		$('ul.residential li').removeClass('active-state');
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
	
	$('.btn-my-account').on("click", function(){
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

	$('.my-account-menu-container .close').on("click", function(){
		$('.my-account-menu').hide("slide", { direction: "right" }, 1000);
	});

	$('.login-item').on("click", function(){
		$('.login-overlay').show("slide", {direction: "right" }, 1000);
		
	});

	$('.login-overlay-container .close').on("click", function(){
		$('.login-overlay').hide("slide", { direction: "right" }, 1000);
	});

	$(window).resize(function() {
		var viewportWidth = $(window).width();
		if(viewportWidth <= 985){
			$('.my-account-menu-container .close').trigger("click");
		}
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
    $(location).attr('href');
	//pure javascript
	var pathname = window.location.pathname;
	var pathArray = window.location.pathname.split( '/' );
	var secondLevelLocation = pathArray[3];
	if ( secondLevelLocation == "property-listing.php")
	{
		$("#ppt-listing-onload").foundation("open");
	}
	// to show it in an alert window
    //alert(window.location);
    //console.log(secondLevelLocation);

    var popup = new Foundation.Reveal($('#select_property_box'));
    $(".completed-investments tbody tr").on('click',function(){
    	 popup.open();
    })
    var special_announcement_popup = new Foundation.Reveal($('#special_announcement'));
    $(".message .ov-special-wrap").on('click',function(){
    	 special_announcement_popup.open();
    })

	if(Cookies.get('showed_modal') != "true") {
    	$("#popup-modal").foundation("open");
    	Cookies.set('showed_modal', 'true', { expires: 1, path: '/'}); 
  	}
  	$(".got_it , .an_gt").click(function(){
    	$("#popup-modal").foundation("close");
    }) 		
});
</script>
<script src="js/app.js"></script>

<script src="js/vendor/jquery.range.js"></script>
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
	$('.postlog-slider .slider').on('moved.zf.slider', function(){
	   var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
	   var balance_amount = parseInt(unit * 5000);
	   $(".balance_amount").text(balance_amount).digits();
	   

	   var detail_funding_preset = $("#detail-funding").data("value");
	   var detail_funding_total = parseFloat($("#detail-funding").data("value")) + parseFloat(unit/242);

	   $('#detail-funding').circleProgress('value',+parseFloat(detail_funding_total).toFixed(2));
	   //console.log("detail funding original: "+$("#detail-funding").data("value"));
	   //console.log("detail funding total: "+detail_funding_total.toFixed(2));
	   //console.log("orginal unit: "+(unit/240).toFixed(2));
	});

	$('.prelog-slider .slider').on('moved.zf.slider', function(){
	   var unit = ($(this).find('.slider-handle').attr('aria-valuenow'));
	   var balance_amount = parseInt(unit * 5000);
	   $(".balance_amount").text(balance_amount).digits();
	   //$('#prelog-detail').circleProgress('value',"0."+unit);
	});



	 $("a.loginlink").on("click", function(){
      $("a.loginlink").fancybox({
        'href'   : '#login',
        wrapCSS : 'mobile-popup',
        closeBtn  : false, 
        padding: 0,
        helpers: {
          overlay: {
            locked: false
          }
        }
      });
      $('#mobile-menu').css('width',  '0px');
    });
});
</script>
<script src="js/vendor/circle-progress.js"></script>
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
<script src="js/vendor/canvasjs.min.js"></script>

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
<script type="text/javascript" src="js/vendor/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="js/vendor/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="js/vendor/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="js/vendor/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="js/vendor/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript" src="js/vendor/jquery.mask.min.js?v=1.14.15"></script>
<script type="text/javascript" src="js/vendor/jquery.panorama360.js"></script>

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
			  $('#main-product-image:first-child').attr('src', href);
			  $('#main-product-image:last-child').attr('src',href);
			   $(".sim-thumb").removeClass("active");
			   $(this).addClass("active");
		    });
		 //move next
		$(".next-img").click(function(){
		    if($(".sim-thumb.active").next(".sim-thumb").length>0){
		        $(".sim-thumb.active").next().trigger("click");
		    } 
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
		    return false;
		});
		
		
	});
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.30&key=AIzaSyAUnmq_rZa0KOPBeZQFnT2DMeUvtL2q7dM"></script>

<script type="text/javascript"></script>

<script type="text/javascript">
	/*
 * 5 ways to customize the Google Maps infowindow
 * 2015 - en.marnoto.com
 * http://en.marnoto.com/2014/09/5-formas-de-personalizar-infowindow.html
*/

// map center



function initialize(lat_val,lng_val) {

	var center = new google.maps.LatLng(lat_val, lng_val);

	// marker position
	var factory = new google.maps.LatLng(lat_val, lng_val);
  var mapOptions = {
    center: center,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

  // InfoWindow content
  var content = '<div class="property-wrapper">'+
                  '<div class="property-img"><span class="fa fa-map-pin"></i></span><img src="images/property-img-01.jpg" alt="" /></div>'+
                    '<div class="property-name">Et harum quidem rerum facilis est et expedita</div>'+
                      '<div class="property-address">'+
                        ' 10 Gopeng Street, 078878 Chinatown Tanjong Pagar (D02)'+
                            '</div>'+
                            '<div class="property-description clearfix">'+
                                '<div class="row">'+
                                   '<div class="medium-7 small-7 columns">'+
                                      '<p>$1,400,000 <br/><span><em>Excludes tax and charges</em></span></p>'+
                                    '</div>'+
                                    '<div class="medium-5 small-5 columns">'+
                                        '<div class="property-details circle text-center" data-value="0.3" data-size="70" data-thickness="8">'+
                                            '<strong></strong>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="property-profile clearfix text-center">'+
                              '<div class="row">'+
                                '<div class="medium-4 small-4 columns">'+
                                  '<p>1,394 <br/><span>sqft</span></p>'+
                                 '</div>'+
                                    '<div class="medium-4 small-4 columns">'+
                                        '<p>3<br/> <span>Bedrooms</span></p>'+
                                    '</div>'+
                                    '<div class="medium-4 small-4 columns">'+
                                        '<p>$9,999<br/> <span>/sq ft</span></p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="property-btn text-center"><a href="property-details-postlog.php">view property <span class="fa fa-arrow-right"></span></a></div>'+
                        '</div>';

  // A new Info Window is created and set content
  var infowindow = new google.maps.InfoWindow({
    content: content,

    // Assign a maximum value for the width of the infowindow allows
    // greater control over the various content elements
    Width: 250
  });

 
   
  // marker options
  var marker = new google.maps.Marker({
    position: factory,
    map: map,
    icon : 'images/map-marker.png'
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

  // *
  // START INFOWINDOW CUSTOMIZE.
  // The google.maps.event.addListener() event expects
  // the creation of the infowindow HTML structure 'domready'
  // and before the opening of the infowindow, defined styles are applied.
  // *
  google.maps.event.addListener(infowindow, 'domready', function() {
  	// for load cirleprogress

  	$('.property-details.circle ').circleProgress({
			startAngle: -Math.PI / 4 * 2,
			fill: {
						gradient: ['#ec3a2a', '#fedd06'],
						gradientAngle: Math.PI / 4
					},
					lineCap: "round"
		}).on('circle-animation-progress', function(event, progress, stepValue) {
				$(this).find('strong').html(Math.round(100 * stepValue) + '<sup>%</sup><span class="funded">FUNDED</span>');
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
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });
  });

}
// default first data show.
	var lat, lng;
	lat = $('.left-property-list').children(':nth-child(1)').children().children().children('input:hidden[name=lat]').val();
	
	lng = $('.left-property-list').children(':nth-child(1)').children().children().children('input:hidden[name=lng]').val();
	google.maps.event.addDomListener(window, 'load', initialize(lat, lng));
	
$('.property-wrapper .fa-map-pin').on( "click", function() {

	lat = $(this).siblings('input:hidden[name=lat]').val();
	lng = $(this).siblings('input:hidden[name=lng]').val();
	google.maps.event.addDomListener(window, 'load', initialize(lat,lng));
});

</script>

<!--scripts-->