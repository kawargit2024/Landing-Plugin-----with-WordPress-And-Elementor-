// (function ($) {
// 	"use strict";


//    jQuery(document).ready(function($){ 


// 	        /* ======================			
// 			   Freelancer Map 						
// 			====================== */
             			 
// 			 $('#map')
// 			  .gmap3({
// 			    address:"bangladesh",
// 				center: [23.6850,90.3563],
// 				zoom:9,
// 				scrollwheel:false,
// 				mapTypeId: "shadeOfGrey",
				
// 			}) 
			  
// 			//marker with animation

// 			.marker({				
// 				position:[23.8103,90.4125],
// 				icon:'assets/img/map-marker.png'	 
// 			})   
			
						
// 		//infowindow
												
// 			.infowindow({
// 				content:'<span class="content-text"><strong>Address:</strong><br>Dhaka-1230,Bangladesh<br>' +
// 						' <strong>Contact:</strong><br>0088 01234 567890' +
// 						'</span>',
				
// 			})
			
// 			.then(function (infowindow) {
// 				var map = this.get(0);
// 				var marker = this.get(1);
// 				 var el = $('.gm-style-iw');
//                 el.siblings().css('visibility', 'hidden');
// 				marker.addListener('click', function() {
// 				  infowindow.open(map, marker);
// 				});
// 			}) 
			
	
// 			// map style
							
// 	.styledmaptype(
//         "shadeOfGrey",
//         [
//           {"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},
//           {"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},
//           {"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
//           {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},
//           {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},
//           {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},
//           {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},
//           {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},
//           {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},
//           {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},
//           {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},
//           {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},
//           {"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}
//         ],
//         {name: "Shades of Grey"}
//       )
	  
// 	 });	

// }(jQuery));	