<?php
/**
 * Initiate Portfolio Metabox
 */

add_action( 'cmb2_admin_init', 'portfolio_metabox' );
function portfolio_metabox() {
	$cmb = new_cmb2_box( array(
		'id'            => 'landing_portfolio_metabox',
		'title'         => __( 'Portfolio Metabox Setting', 'landing_plugin' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'      => 'high',
	) );

	$cmb->add_field( array(
		'name'             => 'Select Portfolio Option',
		'id'               => 'portfolio_options',
		'type'             => 'select',
		'default'          => 'image_port',
		'options'          => array(
			'image_port' 	=> __( 'Image Single', 'landing_plugin' ),
			'gallery_port' 	=> __( 'Gallery Image ', 'landing_plugin' ),
			'slider_port'  	=> __( 'Slider Image', 'landing_plugin' ),
			'yt_vid_port'   => __( 'Youtube Video ', 'landing_plugin' ),
			'vim_vid_port'  => __( 'Vimeo Video', 'landing_plugin' ),
			'audio_port'  	=> __( 'Audio Portfolio', 'landing_plugin' ),
			'custom_port'   => __( 'Custom Portfolio', 'landing_plugin' ),
		),
	) );

	// Single Image
	$cmb->add_field( array(
	'name'    => esc_html__( 'Single Image','landing_plugin' ),
	'desc'    => 'Upload Single Image',
	'id'      => 'single_image_port',
	'type'    => 'file',
		'preview_size' => array( 1920, 900 ), // Default: array( 50, 50 )
	'query_args' => array( 'type' => 'image' ), // Only images attachment
	'text'    => array(
		'add_upload_file_text' => 'Upload Single Image' // Change upload button text. Default: "Add or Upload File"
	),
	'query_args' => array(
		'type' => array(
			'image/gif',
			'image/jpeg',
			'image/png',
		),
	),
	'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

// Gallery Image
$cmb->add_field( array(
	'name' => esc_html__( 'Gallery Image','landing_plugin' ),
	'id'   => 'single_gallery_port',
	'type' => 'file_list',
	'preview_size' => array( 800, 500 ), // Default: array( 50, 50 )
	'query_args' => array( 'type' => 'image' ), // Only images attachment
	'text' => array(
		'add_upload_files_text' => 'Upload Gallery Images', 
	),
) );

// Youtube Video
$cmb->add_field( array(
	'name' => esc_html__( 'Youtube Video','landing_plugin' ),
	'desc' => esc_html__( 'Insert Youtube Embed Link ID here. e.g LOSxFOcCKLs', 'landing_plugin' ),
	'id'   => 'single_yt_port',
	'type' => 'text',
	'default' => esc_html__( 'LOSxFOcCKLs','landing_plugin' ),
) );


// Slider Image
$cmb->add_field( array(
	'name' => esc_html__( 'Slider Image','landing_plugin' ),
	'id'   => 'single_slider_port',
	'type' => 'file_list',
	'text' => array(
		'add_upload_files_text' => 'Upload Slider Images', 
	),
) );


// Vimeo Video
$cmb->add_field( array(
	'name' => esc_html__( 'Vimeo Video','landing_plugin' ),
	'desc' => esc_html__( 'Insert Vimeo Embed Link ID / Code here. e.g 895348136 ', 'landing_plugin' ),
	'id'   => 'single_vim_port',
	'type' => 'text',
	'default' => esc_html__( '895348136','landing_plugin' ),
) );


// Audio Portfolio
$cmb->add_field( array(
	'name' => esc_html__( 'Audio','landing_plugin' ),
	'desc' => esc_html__( 'Insert Audio Link here. e.g ', 'landing_plugin' ),
	'id'   => 'single_audio_port',
	'type' => 'text_url',
	'default' => esc_html__( 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/189742438','landing_plugin' ),
) );


// Custom Portfolio
	$cmb->add_field( array(
	'name'    => esc_html__( 'Custom Portfolio','landing_plugin' ),
	'desc'    => 'Upload Website Image Preview',
	'id'      => 'single_custom_port',
	'type'    => 'file',
		'preview_size' => array( 1920, 900 ), // Default: array( 50, 50 )
	'query_args' => array( 'type' => 'image' ), // Only images attachment
	'text'    => array(
		'add_upload_file_text' => 'Upload Image' // Change upload button text. Default: "Add or Upload File"
	),
	'query_args' => array(
		'type' => array(
			'image/gif',
			'image/jpeg',
			'image/png',
		),
	),
	'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );


$cmb->add_field( array(
	'name'    => esc_html__( 'Single Portfolio Title','landing_plugin' ),
	'id'      => 'single_port_title',
	'type'    => 'text',
) );

$cmb->add_field( array(
	'name'    => esc_html__( 'Site Title','landing_plugin' ),
	'id'      => 'go_to_site_title_text',
	'type'    => 'text',
	'default' => esc_html__( 'View Website','landing_plugin' ),
) );

$cmb->add_field( array(
	'name'    => esc_html__( 'Link','landing_plugin' ),
	'id'      => 'go_to_site_link',
	'type'    => 'text_url',
	'default' => esc_url( 'https//www.themeforest.net','landing_plugin' ),
) );


}

// portfolio-metabox-scripts
function landing_sinlge_portfolio_metabox_scripts(){
   wp_enqueue_script('landing_single_portfolio_metabox_scripts', plugins_url('/js/single-portfolio-scripts.js', __FILE__), array(), true);
}
add_action('admin_enqueue_scripts','landing_sinlge_portfolio_metabox_scripts');


