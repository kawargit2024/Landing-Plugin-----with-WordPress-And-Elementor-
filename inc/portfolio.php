<?php
// register new custom post type 'portfolio'
add_action('init','register_custom_portfolio_post_type');
function register_custom_portfolio_post_type(){
  register_post_type('portfolio', 
  	array(
	  'labels'=>array(
	  	'name' => __('Custom Portfolios','landing_plugin'),
	  	'singular_name' => __('Custom Portfolio','landing_plugin'),
	  	'menu_name' => __('Custom Portfolio','landing_plugin'),
	  	'add_new' => __('Add Single Portfolio','landing_plugin'),
  ),
  'public' => true,
  'rewrite' => array('slug' => 'portfolio'),
  'menu_position' => 100,
  'capability_type'    => 'post',
  'supports' => array( 'title','thumbnail','editor'),
  'menu_icon' => 'dashicons-portfolio',

  ));
}

// register portfolio texonomy
add_action('init','register_custom_portfolio_taxonomy');
function register_custom_portfolio_taxonomy() {
  register_taxonomy( 
    'portfolio_category', 'portfolio', 
    array(
          'labels'            => array(
          'name'              => _x( 'Portfolio Categories', 'landing_plugin' ),
          'singular_name'     => _x( 'Portfolio Category','landing_plugin' ),
          'menu_name' => __('Portfolio Category','landing_plugin'),
          'add_new' => __('Add Category','landing_plugin'),
        ),
    'public'            => true,
    'rewrite'           => array( 'slug' => 'portfolio_category' ),
   ));
}
