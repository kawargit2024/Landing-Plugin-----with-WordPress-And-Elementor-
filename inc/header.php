<?php
// register new custom post type 'header'
add_action('init','register_custom_header_post_type');
function register_custom_header_post_type(){
  register_post_type('header', 
  	array(
	  'labels'=>array(
	  	'name' => __('Custom Headers','landing_plugin'),
	  	'singular_name' => __('Custom Header','landing_plugin'),
	  	'menu_name' => __('Custom Header','landing_plugin'),
	  	'add_new' => __('Add New Custom Header','landing_plugin'),
  ),
  'public' => true,
  'rewrite' => array('slug' => 'header'),
  'menu_position' => 90,
  'capability_type'    => 'post',
  'supports' => array( 'title'),
  'menu_icon' => 'dashicons-menu',

  ));
}
