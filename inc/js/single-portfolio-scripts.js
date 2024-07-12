( function($){
  "use strict";

  $(window).on('load',function(){

   // ----------- single portfolio metabox  --------------- //

   $('#portfolio_options').on('change', function(){

     //when single image
     if($('#portfolio_options').val() == 'image_port'){
       $('.cmb2-id-single-image-port').slideDown();
     } else {
     	 $('.cmb2-id-single-image-port').slideUp();
     }
     

     //when gallery
     if($('#portfolio_options').val() == 'gallery_port'){
       $('.cmb2-id-single-gallery-port').slideDown();
     } else {
     	 $('.cmb2-id-single-gallery-port').slideUp();
     }

     
     //when slider
     if($('#portfolio_options').val() == 'slider_port'){
       $('.cmb2-id-single-slider-port').slideDown();
     } else {
     	 $('.cmb2-id-single-slider-port').slideUp();
     }


     //when youtube video
     if($('#portfolio_options').val() == 'yt_vid_port'){
       $('.cmb2-id-single-yt-port').slideDown();
     } else {
     	 $('.cmb2-id-single-yt-port').slideUp();
     }


     //when vimeo vimeo
	   if($('#portfolio_options').val() == 'vim_vid_port'){
       $('.cmb2-id-single-vim-port').slideDown();
     } else {
     	 $('.cmb2-id-single-vim-port').slideUp();
     }


     //when gallery
     if($('#portfolio_options').val() == 'audio_port'){
       $('.cmb2-id-single-audio-port').slideDown();
     } else {
     	 $('.cmb2-id-single-audio-port').slideUp();
     }


     //when custom portfolio
     if($('#portfolio_options').val() == 'custom_port'){
       $('.cmb2-id-single-custom-port').slideDown();
     } else {
     	 $('.cmb2-id-single-custom-port').slideUp();
     }

   });

   //when first load single image
	if($('#portfolio_options').val() == 'image_port'){
       $('.cmb2-id-single-image-port').slideDown();
     } else {
     	 $('.cmb2-id-single-image-port').slideUp();
    }


   //when first load gallery
  if($('#portfolio_options').val() == 'gallery_port'){
       $('.cmb2-id-single-gallery-port').slideDown();
     } else {
     	 $('.cmb2-id-single-gallery-port').slideUp();
  }

   //when first load slider
  if($('#portfolio_options').val() == 'slider_port'){
       $('.cmb2-id-single-slider-port').slideDown();
     } else {
     	 $('.cmb2-id-single-slider-port').slideUp();
  }

   //when first load youtube
  if($('#portfolio_options').val() == 'yt_vid_port'){
       $('.cmb2-id-single-yt-port').slideDown();
     } else {
     	 $('.cmb2-id-single-yt-port').slideUp();
     }

   //when first load vimeo
   if($('#portfolio_options').val() == 'vim_vid_port'){
       $('.cmb2-id-single-vim-port').slideDown();
     } else {
     	 $('.cmb2-id-single-vim-port').slideUp();
     }

   //when first load auto
   if($('#portfolio_options').val() == 'audio_port'){
       $('.cmb2-id-single-audio-port').slideDown();
     } else {
     	 $('.cmb2-id-single-audio-port').slideUp();
    }

    //when first load cutom
     if($('#portfolio_options').val() == 'custom_port'){
       $('.cmb2-id-single-custom-port').slideDown();
     } else {
     	 $('.cmb2-id-single-custom-port').slideUp();
    }




    //when first load header default

   // if($('#landing_header_options').val() == 'default'){
   //     $('.cmb2-id-landing-header-default').slideDown();
   //   } else {
   //   	 $('.cmb2-id-landing-header-default').slideUp();
   //   }  

  //    // ----------- custom footer --------------- //

  //  $('#landing_footer_options').on('change', function(){
  //    if($('#landing_footer_options').val() == 'custom'){
  //      $('.cmb2-id-select-custom-footer').slideDown();
  //    } else {
  //    	 $('.cmb2-id-select-custom-footer').slideUp();
  //    }
  //  });

  //  // when first load

	// 	if($('#landing_footer_options').val() == 'custom'){
  //      $('.cmb2-id-select-custom-footer').slideDown();
  //    } else {
  //    	 $('.cmb2-id-select-custom-footer').slideUp();
  //    }


  //   //------------- for post metabox ------------- //

  //   // if post standard
	//   $('#pf_settings').on('change', function(){
	// 	if( $ ('#pf_settings').val() == 'pf_standard'){
	// 	   	   $('.cmb2-id-pf-standard-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-standard-box').slideUp();
	// 	}
	//   });

  //     // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_standard'){
	// 	   	$('.cmb2-id-pf-standard-box').slideDown();
	// 	} else{
	// 	   	$('.cmb2-id-pf-standard-box').slideUp();
	// 	}

	// // if post gallery
	//   $('#pf_settings').on('change',function(){
	// 	if( $ ('#pf_settings').val() == 'pf_gallery'){
	// 	   	   $('.cmb2-id-pf-gallery-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-gallery-box').slideUp();
	// 	}
	//   });

  //   // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_gallery'){
	// 	   	   $('.cmb2-id-pf-gallery-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-gallery-box').slideUp();
	// 	}


  //   // if post slider//
	//   $('#pf_settings').on('change',function(){
	// 	if( $ ('#pf_settings').val() == 'pf_slider'){
	// 	   	   $('.cmb2-id-pf-slider-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-slider-box').slideUp();
	// 	}
	//   });

  //   // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_slider'){
	// 	   	   $('.cmb2-id-pf-slider-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-slider-box').slideUp();
	// 	}


  //   // if video //

	// $('#pf_settings').on('change', function(){
  //       if($('#pf_settings').val() == 'pf_vmytvideo'){
  //          $('.cmb2-id-pf-vmytvideo-box').slideDown();
  //       } else{
  //         $('.cmb2-id-pf-vmytvideo-box').slideUp();
  //       }
	// });

  //   // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_vmytvideo'){
	// 	   	   $('.cmb2-id-pf-vmytvideo-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-vmytvideo-box').slideUp();
	// 	}

  //  // if audio //

	// $('#pf_settings').on('change', function(){
  //       if($('#pf_settings').val() == 'pf_audio'){
  //          $('.cmb2-id-pf-audio-box').slideDown();
  //       } else{
  //         $('.cmb2-id-pf-audio-box').slideUp();
  //       }
	// });

  //   // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_audio'){
	// 	   	   $('.cmb2-id-pf-audio-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-audio-box').slideUp();
	// 	}

	// // if quote //

	// $('#pf_settings').on('change', function(){
  //       if($('#pf_settings').val() == 'pf_quote'){
  //          $('.cmb2-id-pf-quote-box').slideDown();
  //       } else{
  //         $('.cmb2-id-pf-quote-box').slideUp();
  //       }
	// });

  //   // when first load
	// 	if( $ ('#pf_settings').val() == 'pf_quote'){
	// 	   	   $('.cmb2-id-pf-quote-box').slideDown();
	// 	} else{
	// 	   	  $('.cmb2-id-pf-quote-box').slideUp();
	// 	}

  });

}( jQuery ));