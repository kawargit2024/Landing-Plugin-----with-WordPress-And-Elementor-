(function($) {
    "use strict";

//*----------------WORKSAJAX-CLOSE-BUTTON-------------------*//
	var closeLink = $('.page-close-link');
	var workAjaxContent = $('.worksajax'); 
		closeLink.on('click', function() {
		workAjaxContent.slideUp("slow");
        return false;
      });
	
	
	  
//*----------------EASING-WORK--SCROLLING-------------------*//

    var closeLink = $('.page-close-link');
	closeLink.on('click', function(event) {
	  
	  var $anchor = $('#workslist');
	  
       $('html,body').stop().animate({
		  
		  scrollTop: $($anchor).offset().top - 80
		   
	   },1000,'linear');
	   
	   event.preventDefault();

      });
			
}(jQuery));