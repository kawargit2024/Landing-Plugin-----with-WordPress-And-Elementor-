<?php

// landing page config //
Kirki::add_config( 'landing_theme_option' );


Kirki::add_section( 'land_section_head', [
	'title'    => esc_html__( 'HEADER SETTINGS', 'landing_plugin' ),
    'priority' => 10,
] );


// header settings //

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'select',
	'settings'  => 'choose_header_settings',
	'label'     => esc_html__( 'CUSTOM HEADER SETTINGS', 'landing_plugin' ),
	'description' => __('Choose Header type for all pages but you still can set different/overwrite header type for specific page in page/post settings.','landing_plugin'),
	'section'   => 'land_section_head',
	'priority'  => 10,
	'multiple' => 1,
	'default'  => 'standard',
	'choices'  => [
		'standard' => esc_html__( 'Standard Header', 'landing_plugin' ),
		'custom' => esc_html__( 'Custom Header', 'landing_plugin' ),
	],
] );



Kirki::add_field( 'landing_theme_option', [
	'type'      => 'select',
	'settings'  => 'landing_choose_header',
	'label'     => esc_html__( 'Choose Custom Header', 'landing_plugin' ),
	'description' => __('Select Your Custom Header ','landing_plugin'),
	'section'   => 'land_section_head',
	'priority'  => 15,
	'multiple' => 1,
	'default'  => 'standard',
	'choices' => Kirki\Util\Helper::get_posts(array('post_type' => 'header')),

	//conditional/only appear in value
    'required' => array(
        array(
            'setting' => 'choose_header_settings',
            'value' => 'custom',
            'operator' => '==',

        ),
    ),

] );


// page header settings//

Kirki::add_section( 'land_page_header_info', [
	'title'    => esc_html__( 'PAGE HEADER SETTINGS', 'landing_plugin' ),
    'priority' => 10,
] );

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'text',
	'settings'  => 'the_page_header_title',
	'label'     => esc_html__( 'Page Header Title', 'landing_plugin' ),
	'section'   => 'land_page_header_info',
	'default'     => esc_html__( 'Our Blog', 'landing_plugin' ), 
	'priority'  => 10,
] );

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'textarea',
	'settings'  => 'the_page_header_desc',
	'label'     => esc_html__( 'Page Header Desc', 'landing_plugin' ),
	'section'   => 'land_page_header_info',
	'default'     => esc_html__( 'get regulary update latest post, news or articles and topics etc. </span> from our blog', 'landing_plugin' ), 
	'priority'  => 10,
] );

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'text',
	'settings'  => 'the_page_sub_header',
	'label'     => esc_html__( 'Page Sub Heading', 'landing_plugin' ),
	'section'   => 'land_page_header_info',
	'default'     => esc_html__( 'Page Subheading', 'landing_plugin' ), 
	'priority'  => 10,
] );


// Kirki::add_field( 'landing_theme_option', [
// 	'type'      => 'text',
// 	'settings'  => 'section_title_typo',
// 	'label'       => esc_html__( 'Typography Control', 'kirki' ),
// 		'description' => esc_html__( 'The full set of options.', 'kirki' ),
// 		'section'     => 'section_id',
// 		'priority'    => 10,
// 		'transport'   => 'auto',
// 		'output'      => '.section-title-para',
// 		'default'     => [
// 			'font-family'     => 'Roboto',
// 			'variant'         => '',
// 			'font-style'      => '',
// 			'color'           => '',
// 			'font-size'       => '',
// 			'line-height'     => '',
// 			'letter-spacing'  => '',
// 			'text-transform'  => '',
// 			'text-decoration' => '',
// 			'text-align'      => '',
// 		],
// ] );




Kirki::add_section( 'land_section_foot', [
	'title'    => esc_html__( 'FOOTER SETTINGS', 'landing_plugin' ),
	'priority'    => 11,
] );


// footer settings //

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'select',
	'settings'  => 'choose_footer_settings',
	'label'     => esc_html__( 'CUSTOM FOOTER SETTINGS', 'landing_plugin' ),
	'description' => __('Choose Footer type for all pages but you still can set different/overwrite header type for specific page in page/post settings.','landing_plugin'),
	'section'   => 'land_section_foot',
	'priority'  => 11,
	'multiple' => 1,
	'default'  => 'standard',
	'choices'  => [
		'standard' => esc_html__( 'Standard Footer', 'landing_plugin' ),
		'custom' => esc_html__( 'Custom Footer', 'landing_plugin' ),
	],
] );


Kirki::add_field( 'landing_theme_option', [
	'type'      => 'select',
	'settings'  => 'landing_choose_footer',
	'label'     => esc_html__( 'Choose Footer', 'landing_plugin' ),
	'section'   => 'land_section_foot',
	'priority'  => 11,
	'multiple' => 1,
	'default'  => 'standard',
	'choices' => Kirki\Util\Helper::get_posts(array('post_type' => 'footer')),
	'required' => array(
	 array(
     	'setting' => 'choose_footer_settings',
     	'value' =>'custom',
     	'operator' =>'==',
     ),
	),

] );



// footer logo settings //

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'image',
	'settings'  => 'footer_logo_settings',
	'label'     => esc_html__( 'UPLOAD FOOTER LOGO', 'landing_plugin' ),
	'section'   => 'land_section_foot',
	'priority'  => 15,
	
] );



// footer social icons settings //

Kirki::add_field( 'landing_theme_option',[
    'type' => 'multicheck',
	'settings' => 'footer_icons_setting',
	'label'    => esc_html__( 'FOOTER ICON SETTINGS ', 'landing_plugin' ),
	'section'  => 'land_section_foot',
	'default'  => [ 'twitter', 'linkedin', 'pinterest' ],
	'priority' => 16,
	'choices'  => [
		'twitter' => esc_html__( 'Twitter', 'landing_plugin' ),
		'linkedin' => esc_html__( 'Linkedin', 'landing_plugin' ),
		'pinterest' => esc_html__( 'Pinterest', 'landing_plugin' ),
		'flickr' => esc_html__( 'Flickr', 'landing_plugin' ),
		'google-plus' => esc_html__( 'Google Plus', 'landing_plugin' ),
		
	],
]

);



// footer recent posts //

Kirki::add_field( 'landing_theme_option',[
	   'type'    => 'number',
		'settings'    => 'recent_posts_setting',
		'label'       => esc_html__( 'FOOTER POSTS SETTINGS', 'landing_plugin' ),
		'section'     => 'land_section_foot',
		'default'  => 3,
		'priority' => 17,
		'choices'  => [
			'min'  => 1,
			'max'  => 5,
			'step' => 1,
		],
	]
);


// footer copyright text //

Kirki::add_field( 'landing_theme_option', [
	'type'      => 'editor',
	'settings'  => 'footer_text_settings',
	'label'     => esc_html__( 'FOOTER TEXT SETTINGS', 'landing_plugin' ),
	'section'   => 'land_section_foot',
	'default'     => esc_html__( 'Copyright 2023 | Landing, WP Theme  by <a href="#"> abuShop </a> | All Rights Reserved.', 'landing_plugin' ), 
	'priority'  => 18,
] );




