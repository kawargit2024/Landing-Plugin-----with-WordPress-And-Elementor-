<?php

add_action( 'cmb2_admin_init', 'landing_post_metaboxes' );
function landing_post_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'post_metaboxs',
		'title'         => esc_html__( 'Post Format Settings', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Select Post Format Option //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Select Post Format','landing' ),
	'desc'             => esc_html__( 'Select Post Format Option','landing' ),
	'id'               => 'pf_settings',
	'type'             => 'select',
	'show_option_none' => false,
	'default'          => 'pf_standard',
	'options_cb'       => 'pf_select_options',
	) );


    // Standard / Image Post Format
	$cmb->add_field( array(
	'name'    => esc_html__( 'Standard','landing' ),
	'desc'    => esc_html__( 'Add or Upload Image','landing' ),
	'id'      => 'pf_standard_box',
	'type'    => 'file',
	'text'    => array(
		'upload_file_text' => 'Upload Image',
	),
	'query_args' => array(
		'type' => array(
		'image/jpeg',
		'image/png',
		),
	),
	'preview_size' => 'full', 
	) );


    // Vimeo / Youtube Video Post Format
	$cmb->add_field( array(
	'name' => esc_html__( 'Vimeo/Youtube Video','landing' ),
	'desc' => esc_html__('Add Vimeo / Youtube Embed Video Link; 
		        Example : https://player.vimeo.com/video/319038756?h=1e5f8841ca','landing' ),
	'id'   => 'pf_vmytvideo_box',
	'type' => 'oembed',
	) );


	// Gallery Images Post Format
	$cmb->add_field( array(
	'name'    => esc_html__( 'Gallery','landing' ),
	'desc'    => esc_html__( 'Add or Upload Images','landing' ),
	'id'      => 'pf_gallery_box',
	'type'    => 'file_list',
	'text'    => array(
		'upload_file_text' => 'Upload Images for Gallery',
	),
	'query_args' => array(
		'type' => array(
		'image/jpeg',
		'image/png',
		),
	),
	'preview_size' => 'full', 
	) );


	// Slider Post Format
	$cmb->add_field( array(
	'name' => esc_html__( 'Slider','landing' ),
	'desc' => esc_html__( 'Add or Upload Slider Images','landing' ),
	'id'   => 'pf_slider_box',
	'type' => 'file_list',
	'text'    => array(
		'upload_file_text' => 'Upload Images for Slider',
	),
	'query_args' => array(
		'type' => array(
		'image/jpeg',
		'image/png',
		),
	),
	'preview_size' => 'full', 
	) );


	// Audio Post Format
	$cmb->add_field( array(
	'name' => esc_html__( 'Audio','landing' ),
	'desc' => esc_html__('First, Select Your Audio And Add or Copy/Paste Embed Iframe Src Link; Example ( default ): https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/189742438','landing' ),
	'id'   => 'pf_audio_box',
	'type' => 'textarea',
	) );

    // Blockquote Post Format
    $group_field_id = $cmb->add_field( array(
		'id'          => 'pf_quote_box',
		'type'        => 'group',
		'description' => __( 'Blockquote', 'cmb2' ),
		'repeatable'  => false, 
		'options'     => array(
			'group_title'       => __( 'Blockquote', 'cmb2' ), 
			'sortable'          => false,
			'closed'         => false, 
		),
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Blockquote Icon',
		'id'   => 'title',
		'type' => 'text',
		'repeatable' => false, 
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Description',
		'id'   => 'desc',
		'type' => 'wysiwyg',
	) );

}

// post foramts list
function pf_select_options() {
    return array(
	'pf_standard'	=> esc_html__( 'Standard Post Format', 'landing' ),
	'pf_gallery' 	=> esc_html__( 'Gallery Post Format ', 'landing' ),
	'pf_slider'  	=> esc_html__( 'Slider Post Format', 'landing' ),
	'pf_vmytvideo'  => esc_html__( 'Video Post Format', 'landing' ),
	'pf_audio'   	=> esc_html__( 'Audio Post Format', 'landing' ),
	'pf_quote'   	=> esc_html__( 'Quote Post Format', 'landing' ),
	);
}



// post-format-scripts
function metabox_scripts_loading(){

 wp_enqueue_script('landing_plugin_custom_scripts', plugins_url('/js/plugin-script.js', __FILE__), array(), true);
}
add_action('admin_enqueue_scripts','metabox_scripts_loading');













