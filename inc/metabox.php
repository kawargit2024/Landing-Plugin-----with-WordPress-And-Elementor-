<?php
add_action( 'cmb2_admin_init', 'landing_custom_header_footer_metaboxes' );
function landing_custom_header_footer_metaboxes() {
	/**
	 * Header Option Settings Metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'landing_custom_header_setting_box',
		'title'         => esc_html__( 'Header Settings', 'landing_plugin' ),
		'object_types'  => array( 'post','page' ), // Post type
	) );

	// Select Header Options //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Select Header Settings','landing_plugin' ),
	'desc'             => esc_html__( 'Select Header You Want To Set','landing' ),
	'id'               => 'landing_header_options',
	'type'             => 'select',
	'show_option_none' => false,
	'default'          => 'global',
	'options'          => array(
     'global'        => esc_html__('Use Global Settings','landing_plugin'),
     'default'       => esc_html__('Use Default Header','landing_plugin'),
     'custom'        => esc_html__('Use Custom Header','landing_plugin'),
     'none'          => esc_html__('No Header','landing_plugin'),
	 ),
	) );


	// Select Header Format //
		$cmb->add_field( 
			array(
				'name'             => esc_html__( 'Header Format','landing_plugin' ),
				'id'               => 'landing_header_default',
				'type'             => 'select',
				'default'          => 'head_clean',
					'options'          => array(
				     'head_clean'    => esc_html__('Black Text with White Background Header in Relative Position','landing_plugin'),
				     'head_standard' => esc_html__('White Text with Transparent Background Header in Absolute Position','landing_plugin'),
					 ),
				) 
		);


   // Select Header List //
   $cmb->add_field( array(
	'name'             => esc_html__( 'Choose Header','landing_plugin' ),
	'desc'             => esc_html__( 'The Custom Header only appear on the actual page, not in elementor editor.','landing' ),
	'id'               => 'select_custom_header',
	'type'             => 'select',
	'options'          => choose_header_list_item(),
	) );


   /**
	 * Footer Option Settings Metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'landing_custom_footer_setting_box',
		'title'         => esc_html__( 'Footer Settings', 'landing_plugin' ),
		'object_types'  => array( 'post','page' ), // Post type
	) );

	// Select Footer Options //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Select Footer Settings','landing_plugin' ),
	'desc'             => esc_html__( 'Select Footer You Want To Set','landing' ),
	'id'               => 'landing_footer_options',
	'type'             => 'select',
	'show_option_none' => false,
	'default'          => 'global',
	'options'          => array(
       'global'        => esc_html__('Use Global Settings','landing_plugin'),
       'default'       => esc_html__('Use Default Footer','landing_plugin'),
       'custom'        => esc_html__('Use Custom Footer','landing_plugin'),
       'none'          => esc_html__('No Footer', 'landing_plugin' ),
	 ),
	) );


   // Select Header List //
   $cmb->add_field( array(
	'name'             => esc_html__( 'Choose Footer','landing_plugin' ),
	'desc'             => esc_html__( 'The Custom Footer only appear on the actual page, not in elementor editor.','landing' ),
		'id'               => 'select_custom_footer',
		'type'             => 'select',
		'options'          => choose_footer_list_item(),
		) );

}



// header_list_item
function choose_header_list_item(){

	$header_posts = get_posts(['post_type' => 'header']);
	$header = [];
	$i = 0;
	foreach($header_posts as $header_post){
      if( $i == 0 ){
        $header_post->post_title;
        $i++;
      }
       $header[ $header_post->ID ] =  $header_post->post_title;
	}
	 return $header;

	 // print_r($header);


}


// footer list item

function choose_footer_list_item(){
 
 $footer_posts = get_posts(['post_type' => 'footer']);
 $footer = [];
 $i = 0;
 foreach( $footer_posts as  $footer_post){
 if($i == 0){
    $footer_post->post_title;
    $i++;
   }
   $footer[$footer_post->ID] = $footer_post->post_title;
 }
  return $footer;
}




// post-format-scripts
function post_metabox_scripts_loading(){

 wp_enqueue_script('landing_plugin_custom_scripts', plugins_url('/js/plugin-script.js', __FILE__), array(), true);
}
add_action('admin_enqueue_scripts','post_metabox_scripts_loading');












