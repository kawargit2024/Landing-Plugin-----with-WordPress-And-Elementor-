(function($) {
	"use strict";
jQuery( window ).on( 'elementor/frontend/init', function () {
	elementorFrontend.hooks.addAction( 
		'frontend/element_ready/hero-carousel.default', function( $scope ) {
		 $scope.find( '.home-sliders' ).each( function(){
	       $(this).owlCarousel({
			   items: 1,
			    loop: <?php echo $loop = $settings['loop'] === 'yes' ? 'true' : 'false'; ?>,
			lazyLoad: <?php echo $lazy = $settings['lazy'] === 'yes' ? 'true' : 'false'; ?>,
		    autoplay: <?php echo $autoplay = $settings['autoplay'] === 'yes' ? 'true' : 'false'; ?>,
		  smartSpeed: <?php echo $playSpeed = $settings['play_speed'] ? $autoplay : 'false'; ?>,
		   animateIn: '<?php echo $in_anima = $settings['in_anima']; ?>',
		  animateOut: '<?php echo $out_anima = $settings['out_anima']; ?>',
			    dots: <?php if($dots){echo $dots;}?>,
			     nav: <?php if($nav){echo $nav;}?>,
			 navText: 
			 [
	          '"<i class='<?php echo $prev_nav_icon = $settings['prev_nav_icon']['value'] ? $settings['prev_nav_icon']['value'] : 'fas fa-chevron-left';
			  ?>'></i>",'

			  '"<i class='<?php echo $next_nav_icon = $settings['next_nav_icon']['value'] ? $settings['next_nav_icon']['value'] : 'fas fa-chevron-right';
			  ?>'></i>"'

			  ]
			});	
		 });

	} );

} );

}(jQuery));


