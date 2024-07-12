<?php
 /*--- flilckr feed scripts--*/
 function landing_flickr_feed_script(){

  wp_enqueue_script('flickr-feed-script', plugins_url('js/jflickrfeed.min.js', __FILE__), array(),'', 'in_footer');
  wp_enqueue_script('fancybox-script', plugins_url('js/jquery.fancybox.js', __FILE__), array(),'', 'in_footer');
 }
 add_action('wp_enqueue_scripts','landing_flickr_feed_script',100,1);



function flickr_feed_script(){ ?>

<script>
(function($){
'use strict';
	jQuery(window).on("load", function($){
	  var fancyboxImage = jQuery('.fancybox').attr('rel', 'gallery');
		fancyboxImage.fancybox({
	        'speedIn': 600,
	        'speedOut': 200,
	        'transitionIn': 'elastic',
	        'transitionOut': 'elastic',

		});

	});

 	var flickerPhotoGal = $('#photo-gallery');		 
 	flickerPhotoGal.jflickrfeed({
	 limit:<?php if(get_option('flickr_feed_img') != ''){ echo get_option('flickr_feed_img');} else{echo "8";}
	 ?>,
	 qstrings: {id:'<?php if(get_option('flickr_feed_id') != ''){ echo get_option('flickr_feed_id');} else
	 {echo "199342056@N05";}
	 ?>'},
	 itemTemplate: '<li>' +'<a class="fancybox" rel="gallery" href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +'</li>'
   });
	
})(jQuery);
</script>
<?php } 
add_action('wp_footer','flickr_feed_script', 100);


