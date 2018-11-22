$(document).ready(function(){
	$( "#submit-login-slider" ).click(function() {		
		$.ajax({
	  		type: "POST",
	  		url: site_url+"user/ajax/login", 
	  		data: $('#login_form_slider').serialize(),
	  		success: function(result){

	  			$('.login_error > #error_msg').html('');
	  			$('.login_error').hide();
	  			
	  			if(result.status=='error'){
	  				$('.login_error > #error_msg').html(result.msg)
	  				$('.login_error').show();
	  			}else{
	  				if(result.status=='success'){
	  					location.replace(result.redirect_url);
	  				}
	  			}	            	
            	$("#login-loading-div").hide();
        	}
        });
	});	
	$('#login_form_slider input').keypress(function (e) {
	    if (e.which == '13') {
	        $.ajax({
		  		type: "POST",
		  		url: site_url+"user/ajax/login", 
		  		data: $('#login_form_slider').serialize(),
		  		success: function(result){

		  			$('.login_error > #error_msg').html('');
		  			$('.login_error').hide();
		  			
		  			if(result.status=='error'){
		  				$('.login_error > #error_msg').html(result.msg)
		  				$('.login_error').show();
		  			}else{
		  				if(result.status=='success'){
		  					location.replace(result.redirect_url);
		  				}
		  			}	            	
	            	$("#login-loading-div").hide();
	        	}
	        });
	    }
	});
});	