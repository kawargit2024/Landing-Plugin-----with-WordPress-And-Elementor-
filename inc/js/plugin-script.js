( function($){
  "use strict";

  $(window).on('load',function(){

   // ----------- custom header --------------- //

   $('#landing_header_options').on('change', function(){

     if($('#landing_header_options').val() == 'custom'){
       $('.cmb2-id-select-custom-header').slideDown();
     } else {
     	 $('.cmb2-id-select-custom-header').slideUp();
     }

     if($('#landing_header_options').val() == 'default'){
       $('.cmb2-id-landing-header-default').slideDown();
     } else {
     	 $('.cmb2-id-landing-header-default').slideUp();
     }

   });

   //when first load header custom

		if($('#landing_header_options').val() == 'custom'){
       $('.cmb2-id-select-custom-header').slideDown();
     } else {
     	 $('.cmb2-id-select-custom-header').slideUp();
     }

    //when first load header default

   if($('#landing_header_options').val() == 'default'){
       $('.cmb2-id-landing-header-default').slideDown();
     } else {
     	 $('.cmb2-id-landing-header-default').slideUp();
     }  

     // ----------- custom footer --------------- //

   $('#landing_footer_options').on('change', function(){
     if($('#landing_footer_options').val() == 'custom'){
       $('.cmb2-id-select-custom-footer').slideDown();
     } else {
     	 $('.cmb2-id-select-custom-footer').slideUp();
     }
   });

   // when first load

		if($('#landing_footer_options').val() == 'custom'){
       $('.cmb2-id-select-custom-footer').slideDown();
     } else {
     	 $('.cmb2-id-select-custom-footer').slideUp();
     }


    //------------- for post metabox ------------- //

    // if post standard
	  $('#pf_settings').on('change', function(){
		if( $ ('#pf_settings').val() == 'pf_standard'){
		   	   $('.cmb2-id-pf-standard-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-standard-box').slideUp();
		}
	  });

      // when first load
		if( $ ('#pf_settings').val() == 'pf_standard'){
		   	$('.cmb2-id-pf-standard-box').slideDown();
		} else{
		   	$('.cmb2-id-pf-standard-box').slideUp();
		}

	// if post gallery
	  $('#pf_settings').on('change',function(){
		if( $ ('#pf_settings').val() == 'pf_gallery'){
		   	   $('.cmb2-id-pf-gallery-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-gallery-box').slideUp();
		}
	  });

    // when first load
		if( $ ('#pf_settings').val() == 'pf_gallery'){
		   	   $('.cmb2-id-pf-gallery-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-gallery-box').slideUp();
		}


    // if post slider//
	  $('#pf_settings').on('change',function(){
		if( $ ('#pf_settings').val() == 'pf_slider'){
		   	   $('.cmb2-id-pf-slider-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-slider-box').slideUp();
		}
	  });

    // when first load
		if( $ ('#pf_settings').val() == 'pf_slider'){
		   	   $('.cmb2-id-pf-slider-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-slider-box').slideUp();
		}


    // if video //

	$('#pf_settings').on('change', function(){
        if($('#pf_settings').val() == 'pf_vmytvideo'){
           $('.cmb2-id-pf-vmytvideo-box').slideDown();
        } else{
          $('.cmb2-id-pf-vmytvideo-box').slideUp();
        }
	});

    // when first load
		if( $ ('#pf_settings').val() == 'pf_vmytvideo'){
		   	   $('.cmb2-id-pf-vmytvideo-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-vmytvideo-box').slideUp();
		}

   // if audio //

	$('#pf_settings').on('change', function(){
        if($('#pf_settings').val() == 'pf_audio'){
           $('.cmb2-id-pf-audio-box').slideDown();
        } else{
          $('.cmb2-id-pf-audio-box').slideUp();
        }
	});

    // when first load
		if( $ ('#pf_settings').val() == 'pf_audio'){
		   	   $('.cmb2-id-pf-audio-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-audio-box').slideUp();
		}

	// if quote //

	$('#pf_settings').on('change', function(){
        if($('#pf_settings').val() == 'pf_quote'){
           $('.cmb2-id-pf-quote-box').slideDown();
        } else{
          $('.cmb2-id-pf-quote-box').slideUp();
        }
	});

    // when first load
		if( $ ('#pf_settings').val() == 'pf_quote'){
		   	   $('.cmb2-id-pf-quote-box').slideDown();
		} else{
		   	  $('.cmb2-id-pf-quote-box').slideUp();
		}

  });

}( jQuery ));