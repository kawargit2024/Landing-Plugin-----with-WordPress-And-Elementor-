<?php

function custom_addon_category( $elements_manager ) {

	$elements_manager->add_category(
		'landing-wp',
		[
			'title' => esc_html__( 'LANDING WP THEME', 'landing_plugin' ),
			'icon' => 'fa fa-cog',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'custom_addon_category' );



add_action( 'elementor/editor/after_enqueue_scripts', function(){
   wp_enqueue_script( 'landing-element', LANDING_URL . 'widgets/js/landing-element.js', array('jquery'), '', true );
});


// portfolio taxonomy term list //
function portfolio_terms_list(){

 $portfolio_tax = 'portfolio_category';
 $portfolio_terms =  get_terms( $portfolio_tax );
 $terms_list = [];
 $i = 0;
 foreach( $portfolio_terms as $term){
    if( $i == 0 ){  	
    $default = $term->name;
    $i++;
    }

    $terms_list[$term->term_id] = $term->name;
 }

return $terms_list;

}

