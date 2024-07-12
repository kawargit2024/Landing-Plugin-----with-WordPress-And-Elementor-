<?php
add_action( 'cmb2_admin_init', 'landing_footer_metaboxes' );
function landing_footer_metaboxes() {

	 // Initiate the metabox
	$cmb = new_cmb2_box( array(
		'id' => 'landing_footer_metabox',
		'title' => esc_html__( 'Footer Position Settings', 'landing_plugin' ),
		'object_types'  => array( 'footer', ), // Post type

	) );


    // notice 
   $cmb->add_field( array(
	'name' => esc_html__( 'Please Read : ','landing_plugin' ),
	'desc' => wp_kses( 'You can build your custom footer with <strong> Elementor </strong> and use it in any page using the <strong> Page Settings </strong>.<br> For <strong> Global Settings </strong>, you can set it on <strong> Customizer-> Footer Settings </strong>.<br> If You Want To Edit this footer with <strong> Elementor </strong>,make sure you have Checklist the <strong> Custom Footer </strong> in <strong> Elementor Settings -> General -> Post Types </strong>','landing_plugin' ),
	'id'               => 'header_notice',
	'type'             => 'title',
	) );


	// Select Footer Position //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Choose Footer Position','landing_plugin' ),
	'desc'             => esc_html__( 'Select Your Footer Position From Here','landing_plugin' ),
	'id'               => 'landing_footer_position',
	'type'             => 'select',
	'show_option_none' => false,
	'default'          => 'default',
	'options'       => array(
       'default'  => esc_html('Relative Footer','landing_plugin'),
	    ),
	) );
}












