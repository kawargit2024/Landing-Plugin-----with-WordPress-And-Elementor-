<?php

add_action( 'cmb2_admin_init', 'landing_header_metaboxes' );
function landing_header_metaboxes() {

	 // Initiate the metabox
	$cmb = new_cmb2_box( array(
		'id'            => 'landing_header_metabox',
		'title'         => esc_html__( 'Header Position Settings', 'landing_plugin' ),
		'object_types'  => array( 'header', ), // Post type

	) );


    // notice 
   $cmb->add_field( array(
	'name'             => esc_html__( 'Please Read : ','landing_plugin' ),
	'desc'             => wp_kses( 'You can build your custom header with <strong> Elementor </strong> and use it in any page using the <strong> Page Settings </strong>.<br> For <strong> Global Settings </strong>, you can set it on <strong> Customizer-> Header Settings </strong>.<br> If You Want To Edit this header with <strong> Elementor </strong>,make sure you have Checklist the <strong> Custom Header </strong> in <strong> Elementor Settings -> General -> Post Types </strong>','landing_plugin' ),
	'id'               => 'header_notice',
	'type'             => 'title',
	) );


	// Select Header Position Option //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Choose Header Position','landing_plugin' ),
	'desc'             => esc_html__( 'Select Your Header Position From Here','landing_plugin' ),
	'id'               => 'landing_header_position',
	'type'             => 'radio',
	'show_option_none' => false,
	'default'          => 'default',
	'options'       => array(
       'default'  => esc_html('Relative Header','landing_plugin'),
       'custom-absolute-menu'  => esc_html('Absolute Header','landing_plugin'),
       'custom-fixed-menu'  => esc_html('Fixed Header','landing_plugin'),
       'custom-sticky-menu'  => esc_html('Sticky Header','landing_plugin'),
       'custom-sticky-menu custom-absolute-menu'  => esc_html('Absolute Then Sticky Header ( On Scolling )','landing_plugin'),
	    ),
	) );


    // Select White or Derk Background //
	$cmb->add_field( array(
	'name'             => esc_html__( 'Default / Dark Background Option','landing_plugin' ),
	'desc'             => wp_kses( 'Only for <strong> Preview / Editor </strong> purpose only.For better preview in header element with <strong> White / Bright </strong> color  or with <strong> opacity </strong>.','landing_plugin' ),
	'id'               => 'landing_dark_background',
	'type'             => 'radio',
	'show_option_none' => false,
	'default'          => 'default',
	'options'       => array(
       'default'  => esc_html('Use Default Background','landing_plugin'),
       'dark-bg'  => esc_html('Use Dark Background','landing_plugin'),
	    ),
	) );


}












