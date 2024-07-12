<?php
// register new custom post type 'footer'
add_action('init','register_custom_footer_post_type');
function register_custom_footer_post_type(){
  register_post_type('footer', 
  	array(
	  'labels'=>array(
	  	'name' => __('Custom Footers','landing_plugin'),
	  	'singular_name' => __('Custom Footer','landing_plugin'),
	  	'menu_name' => __('Custom Footer','landing_plugin'),
	  	'add_new' => __('Add New','landing_plugin'),
  ),
  'public' => true,
  'rewrite' => array('slug' => 'footer'),
  'menu_position' => 100,
  'capability_type'    => 'post',
  'supports' => array( 'title',),
  'menu_icon' => 'dashicons-menu',

  ));
}
