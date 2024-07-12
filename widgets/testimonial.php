<?php

class Testimonial_Slider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'testimonial-slider';
	}

	public function get_script_depends() {
		return [ 'landing-carousel','landing-fontawesome' ];
	}

	public function get_title() {
		return esc_html__( 'Landing Testimonial', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'testimonial', 'slider' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section_testi',
			[
				'label' => esc_html__( 'Testimonial Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );


   $this->add_control(
			'clients_quote',
			[
				'label' => esc_html__( 'Clients Quote Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'skin' => 'inline',
				'label_block' => false,
				'skin_settings' => [
					'inline' => [
						'none' => [
							'label' => 'Default',
							'icon' => 'fas fa-quote-right',
						],
						'icon' => [
					      'icon' => 'fas fa-cog',
				        ],
				    ],    
				],
			],
			
		);


   	$this->add_control(
			'clients_carousel',
			[
				'label' => esc_html__( 'Testimonial Slide List', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => esc_html__( 'Testimonial #1', 'landing_plugin' ),
					],
					[
						'title' => esc_html__( 'Testimonial #2', 'landing_plugin' ),
					],
					[
						'title' => esc_html__( 'Testimonial #3', 'landing_plugin' ),
					],

				],
				'fields' => [
					[
						'name' => 'client_image',
						'label' => esc_html__( 'Upload Testimonial Image', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
						    'url' => \Elementor\Utils::get_placeholder_image_src(),
						 ],
					],
					

					[
						'name' => 'display_desc',
						'label' => esc_html__( 'Show / Hide Descrption', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Yes', 'landing_plugin' ),
						'label_off' => esc_html__( 'No', 'landing_plugin' ),
						'return_value' => 'yes',
				        'default' => 'yes',
					],

					[
						'name' => 'desc',
						'label' => esc_html__( 'Testimonial Description', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Great work I got a lot more than what I ordered, they are very legítimas and catchy. I went for one of them for my brand but is always better to have more options.' , 'landing_plugin' ),
						'condition' => [
					      'display_desc' => 'yes',
				        ],
					],
					[
						'name' => 'title',
						'label' => esc_html__( 'Testimonial Name', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( '- Miss Kelly -' , 'landing_plugin' ),
					],

				],

				
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
				'clients_content_section',
				[
					'label' => esc_html__( 'Additional Settings', 'landing_plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
	    );

		$this->add_control(
				'client_loop',
				[
					'label' => esc_html__( 'Loop', 'landing_plugin' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'landing_plugin' ),
					'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
		 			'return_value' => 'yes',
		 			'default' => 'yes',
					'frontend_available' => true,

				]
			);

		$this->add_control(
			'client_lazy',
			[
				'label' => esc_html__( 'Lazyload', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
		 		'return_value' => 'yes',
		 		'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'client_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
		 		'return_value' => 'yes',
		 		'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'client_play_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 200,
				'max' => 15000,
				'step' => 5,
				'default' => 1500,
				'condition' => [
                  'client_autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'client_in_anima',
			[
				'label' => esc_html__( 'In Animation', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [
				'fadeIn' => esc_html__( 'FadeIn','landing_plugin' ),
					'fadeInUp' => esc_html__( 'FadeInUp','landing_plugin' ),
					'fadeInDown' => esc_html__( 'FadeInDown','landing_plugin' ),
					'fadeInDownBig' => esc_html__( 'FadeInDownBig','landing_plugin' ),
					'fadeInLeft' => esc_html__( 'FadeInLeft','landing_plugin' ),
					'fadeInLeftBig' => esc_html__( 'FadeInLeftBig','landing_plugin' ),
					'fadeInRight' => esc_html__( 'FadeInRight','landing_plugin' ),
					'fadeInRightBig' => esc_html__('FadeInRightBig','landing_plugin' ),
					'fadeInUpBig' => esc_html__( 'FadeInUpBig','landing_plugin' ),
					'fadeInTopLeft' => esc_html__( 'FadeInTopLeft','landing_plugin' ),
					'fadeInTopRight' => esc_html__( 'FadeInTopRight','landing_plugin' ),
					'fadeInBottomLeft' => esc_html__( 'FadeInBottomLeft','landing_plugin' ),
					'fadeInBottomRight' => esc_html__( 'FadeInBottomRight','landing_plugin' ),

					'slideInLeft' => esc_html__( 'SlideInLeft','landing_plugin' ),		
					'slideInDown' => esc_html__( 'SlideInDown','landing_plugin' ),
					'slideInLeft' => esc_html__( 'SlideInLeft','landing_plugin' ),
					'slideInRight' => esc_html__( 'SlideInRight','landing_plugin' ),
					'slideInUp' => esc_html__( 'SlideInUp','landing_plugin' ),

					'bounceIn' => esc_html__( 'BounceIn','landing_plugin' ),
					'backInDown' => esc_html__( 'BackInDown','landing_plugin' ),
					'backInLeft' => esc_html__( 'BackInLeft','landing_plugin' ),
					'backInRight' => esc_html__( 'BackInRight','landing_plugin' ),
					'backInUp' => esc_html__( 'BackInUp','landing_plugin' ),
					'bounceInDown' => esc_html__( 'BounceInDown','landing_plugin' ),
					'bounceInLeft' => esc_html__( 'BounceInLeft','landing_plugin' ),
					'bounceInRight' => esc_html__( 'BounceInRight','landing_plugin' ),
					'bounceInUp' => esc_html__( 'BounceInUp','landing_plugin' ),

					'flip' => esc_html__( 'Flip','landing_plugin' ),
					'flipInX' => esc_html__( 'FlipInX','landing_plugin' ),
					'flipInY' => esc_html__( 'FlipInY','landing_plugin' ),


					'lightSpeedInRight' => esc_html__( 'LightSpeedInRight','landing_plugin' ),
					'lightSpeedInLeft' => esc_html__( 'LightSpeedInLeft','landing_plugin' ),


	            	'rotateIn' => esc_html__( 'RotateIn','landing_plugin' ),
					'rotateInDownLeft' => esc_html__( 'RotateInDownLeft','landing_plugin' ),
					'rotateInDownRight' => esc_html__( 'RotateInDownRight','landing_plugin' ),
					'rotateInUpLeft' => esc_html__( 'RotateInUpLeft','landing_plugin' ),
					'rotateInUpRight' => esc_html__( 'RotateInUpRight','landing_plugin' ),

                	'hinge' => esc_html__( 'Hinge','landing_plugin' ),
					'jackInTheBox' => esc_html__( 'JackInTheBox','landing_plugin' ),
					'rollIn' => esc_html__( 'RollIn','landing_plugin' ),

					'zoomIn' => esc_html__( 'Zoom In','landing_plugin' ),
					'zoomInDown' => esc_html__( 'zoomInDown','landing_plugin' ),
					'zoomInLeft' => esc_html__( 'zoomInLeft','landing_plugin' ),
					'zoomInRight' => esc_html__( 'zoomInRight','landing_plugin' ),
					'zoomInUp' => esc_html__( 'zoomInUp','landing_plugin' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'client_out_anima',
			[
				'label' => esc_html__( 'Out Animation', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fadeOut',
				'options' => [
				'fadeOut' => esc_html__( 'FadeOut','landing_plugin' ),
					'fadeOutDown' => esc_html__( 'FadeOutDown','landing_plugin' ),
					'fadeOutDownBig' => esc_html__( 'FadeOutDownBig','landing_plugin' ),
					'fadeOutLeft' => esc_html__( 'FadeOutLeft','landing_plugin' ),
					'fadeOutLeftBig' => esc_html__( 'FadeOutLeftBig','landing_plugin' ),
					'fadeOutRight' => esc_html__( 'FadeOutRight','landing_plugin' ),
					'fadeOutRightBig' => esc_html__('FadeOutRightBig','landing_plugin' ),
					'fadeOutUp' => esc_html__( 'FadeOutUp','landing_plugin' ),
					'fadeOutUpBig' => esc_html__( 'FadeOutUpBig','landing_plugin' ),
					'fadeOutTopLeft' => esc_html__( 'FadeOutTopLeft','landing_plugin' ),
					'fadeOutTopRight' => esc_html__( 'FadeOutTopRight','landing_plugin' ),
					'fadeOutBottomRight' => esc_html__( 'FadeOutBottomRight','landing_plugin' ),
					'fadeOutBottomLeft' => esc_html__( 'FadeOutBottomLeft','landing_plugin' ),

					'slideOutDown' => esc_html__( 'SlideOutDown','landing_plugin' ),
					'slideOutLeft' => esc_html__( 'SlideOutLeft','landing_plugin' ),
					'slideOutRight' => esc_html__( 'SlideOutRight','landing_plugin' ),
					'slideOutUp' => esc_html__( 'SlideOutUp','landing_plugin' ),


					'backOutDown' => esc_html__( 'BackOutDown','landing_plugin' ),
					'backOutLeft' => esc_html__( 'BackOutLeft','landing_plugin' ),
					'backOutRight' => esc_html__( 'BackOutRight','landing_plugin' ),
					'backOutUp' => esc_html__( 'BackOutUp','landing_plugin' ),

					'bounceOutDown' => esc_html__( 'BounceOutDown','landing_plugin' ),
					'bounceOutLeft' => esc_html__( 'BounceOutLeft','landing_plugin' ),
					'bounceOutRight' => esc_html__( 'BounceOutRight','landing_plugin' ),
					'bounceOutUp' => esc_html__( 'BounceOutUp','landing_plugin' ),

					'flipOutX' => esc_html__( 'FlipOutX','landing_plugin' ),
					'flipOutY' => esc_html__( 'FlipOutY','landing_plugin' ),

					'lightSpeedOutRight' => esc_html__( 'LightSpeedOutRight','landing_plugin' ),
					'lightSpeedOutLeft' => esc_html__( 'LightSpeedOutLeft','landing_plugin' ),

	                'rotateOut' => esc_html__( 'RotateOut','landing_plugin' ),
					'rotateOutDownLeft' => esc_html__( 'RotateOutDownLeft','landing_plugin' ),
					'rotateOutDownRight' => esc_html__( 'RotateOutDownRight','landing_plugin' ),
					'rotateOutUpLeft' => esc_html__( 'RotateOutUpLeft','landing_plugin' ),
					'rotateOutUpRight' => esc_html__( 'RotateOutUpRight','landing_plugin' ),

                    'hinge' => esc_html__( 'Hinge','landing_plugin' ),
					'jackInTheBox' => esc_html__( 'JackInTheBox','landing_plugin' ),
					'rollOut' => esc_html__( 'RollOut','landing_plugin' ),

				    'zoomOut' => esc_html__( 'ZoomOut','landing_plugin' ),
					'zoomOutDown' => esc_html__( 'ZoomOutDown','landing_plugin' ),
					'zoomOutLeft' => esc_html__( 'ZoomOutLeft','landing_plugin' ),
					'zoomOutRight' => esc_html__( 'ZoomOutRight','landing_plugin' ),
					'zoomOutUp' => esc_html__( 'ZoomOutUp','landing_plugin' ),
				],
				'frontend_available' => true,
			]
		);

	    $this->end_controls_section();

	 	$this->start_controls_section(
				'testi_style',
				[
					'label' => esc_html__( 'Testimonial Style', 'landing_plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
	    );


         $this->add_control(
				'testi_wrap_setting',
				[
					'label' => esc_html__( 'Testimonial Wrapper Settings', 'landing_plugin' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'after',
				]
		);

         $this->add_control(
			'testi_wrap_marr',
			[
				'label' => esc_html__( 'Margin', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} section.testimonial-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

         $this->add_control(
			'testi_wrap_pad',
			[
				'label' => esc_html__( 'Padding', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} section.testimonial-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


         $this->add_control(
			'testi_wrap_icon_color',
			[
				'label' => esc_html__( 'Quote Icon Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff4a',
				'selectors' => [
					'{{WRAPPER}} section.testimonial-wrap .quote-icon' => 'color: {{VALUE}}',
				],
			]
		);


        $this->add_control(
			'testi_wrap_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} section.testimonial-wrap' => 'background: {{VALUE}}',
				],
			]
		);

	    $this->add_control(
				'client__title_s1',
				[
					'label' => esc_html__( 'Title Style', 'landing_plugin' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'after',
				]
		);


		$this->add_control(
		'client__title_align',
		[
			'label' => esc_html__( 'Alignment', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => esc_html__( 'Left', 'landing_plugin' ),
					'icon' => 'eicon-text-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'landing_plugin' ),
					'icon' => 'eicon-text-align-center',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'landing_plugin' ),
					'icon' => 'eicon-text-align-right',
				],
			],
			'default' => 'center',
			'toggle' => true,
			'selectors' => [
				'{{WRAPPER}} .carousel-box h3.client-title' => 'text-align: {{VALUE}};',
			],
		]
	);


	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'client__title_typo',
			'selector' => '{{WRAPPER}} .carousel-box h3.client-title',
		]
	);


	$this->add_control(
		'client__title_color',
		[
			'label' => esc_html__( 'Title Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .carousel-box h3.client-title' => 'color: {{VALUE}}',
			],
		]
	);

	 $this->add_control(
				'client__desc_s1',
				[
					'label' => esc_html__( 'Descrption Style', 'landing_plugin' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'after',
				]
		);

	    $this->add_control(
				'client__desc_s2',
				[
					'label' => esc_html__( 'Show / Hide', 'landing_plugin' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'landing_plugin' ),
					'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
		);


		$this->add_control(
		'client__desc_align',
		[
			'label' => esc_html__( 'Alignment', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => esc_html__( 'Left', 'landing_plugin' ),
					'icon' => 'eicon-text-align-left',
				],
				'center' => [
					'title' => esc_html__( 'Center', 'landing_plugin' ),
					'icon' => 'eicon-text-align-center',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'landing_plugin' ),
					'icon' => 'eicon-text-align-right',
				],
			],
			'default' => 'center',
			'toggle' => true,
			'selectors' => [
				'{{WRAPPER}} .carousel-box p' => 'text-align: {{VALUE}};',
			],
		]
	);


	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'client__desc_typo',
			'selector' => '{{WRAPPER}} .carousel-box p',
		]
	);


	$this->add_control(
		'client__desc_color',
		[
			'label' => esc_html__( 'Descrption Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .carousel-box p' => 'color: {{VALUE}}',
			],
		]
	);



    $this->end_controls_section();


	$this->start_controls_section(
			'client_style_section_nav',
			[
				'label' => esc_html__( 'Navigation Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);

	    $this->add_control(
			'client_owl_nav_dots',
			[
				'label' => esc_html__( 'Navigation', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both' => esc_html__( 'Nav and Dots', 'landing_plugin' ),
					'nav' => esc_html__( 'Nav', 'landing_plugin' ),
					'dots' => esc_html__( 'Dots', 'landing_plugin' ),
					'none' => esc_html__( 'None', 'landing_plugin' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'client_prev_nav_icon',
			[
				'label' => esc_html__( 'Prev Arrow Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'skin' => 'inline',
				'label_block' => false,
				'skin_settings' => [
					'inline' => [
						'none' => [
							'label' => 'Default',
							'icon' => 'fas fa-chevron-left',
						],
						'icon' => [
					      'icon' => 'fas fa-cog',
				        ],
				    ],    
				],
				'condition' =>[
                   'client_owl_nav_dots' => ['both','nav']
				]
			],
			
		);


		$this->add_control(
			'client_next_nav_icon',
			[
				'label' => esc_html__( 'Next Arrow Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'skin' => 'inline',
				'label_block' => false,
				'skin_settings' => [
					'inline' => [
						'none' => [
							'label' => 'Default',
							'icon' => 'fas fa-chevron-right',
						],
						'icon' => [
					      'icon' => 'fas fa-cog',
				        ],
				    ],    
				],
				'condition' =>[
                   'client_owl_nav_dots' => ['both','nav']
				]
			],
			
		);

        $this->end_controls_section();

		$this->start_controls_section(
				'client_prev_nav_style_section',
				[
					'label' => esc_html__( 'Previous Nav', 'landing_plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
	    );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'client_owl_prev_border',
				'selector' => '{{WRAPPER}} .owl-prev',
				'condition' =>[
                   'client_owl_nav_dots' => ['both','nav'],
			    ],
			]
		);

        $this->add_control(
			'client_owl_prev_nav_width_height',
			[
				'label' => esc_html__( 'Prev Nav Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-prev' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .owl-prev' => 'heigth: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'client_owl_prev_nav_margin_from_left',
			[
				'label' => esc_html__( 'Space Left', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-prev' => 'position:absolute',
					'{{WRAPPER}} .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
				],

			]
		);


        $this->add_control(
			'client_owl_prev_nav_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-prev' => 'border-radius: {{SIZE}}{{UNIT}};',
				],

			]
		);


        $this->add_control(
			'client_prev_nav_size',
			[
				'label' => esc_html__( 'Nav Arrow Size', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-prev > i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

       $this->start_controls_section(
			'client_next_nav_style_options',
			[
				'label' => esc_html__( 'Next Nav', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	    );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'client_owl_next_border',
				'selector' => '{{WRAPPER}} .owl-next',
				'condition' =>[
                   'owl_nav_dots' => ['both','nav'],
			    ],
			]
		);


		 $this->add_control(
			'client_owl_next_nav_width_height',
			[
				'label' => esc_html__( 'Next Nav Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .owl-next' => 'heigth: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'client_owl_next_nav_margin_from_left',
			[
				'label' => esc_html__( 'Space Right', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-next' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);



        $this->add_control(
			'client_owl_next_nav_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-next' => 'border-radius: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'client_next_nav_size',
			[
				'label' => esc_html__( 'Nav Arrow Size', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-next > i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'client_dot_style_options',
			[
				'label' => esc_html__( 'Dots', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	    );


		$this->add_responsive_control(
			'client_owl_dots_alignment',
			[
				'label' => esc_html__( 'Owl Dots Alignment', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'landing_plugin' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'landing_plugin' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'landing_plugin' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .owl-dots' => 'text-align: {{VALUE}};',
				],

			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'client_owl_dot_border',
				'selector' => '{{WRAPPER}} .owl-dot',
				'condition' =>[
                   'owl_nav_dots' => ['both','dots'],
			    ],
			],
			
		);


		$this->add_control(
			'client_owl_dot_bg_color',
			[
				'label' => esc_html__( 'Background Overlay', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-dot' => 'background-color: {{VALUE}}',
				],

			]
		);


        $this->add_control(
			'client_owl_dot_nav_width_height',
			[
				'label' => esc_html__( 'Owl Dot Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-dot' => 'width: {{SIZE}}{{UNIT}};!important',
					'{{WRAPPER}} .owl-dot' => 'heigth: {{SIZE}}{{UNIT}};!important',
				],
			]
		);

		$this->add_control(
			'client_owl_dot_margin_from_left',
			[
				'label' => esc_html__( 'Space Left', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-dot' => 'position:absolute',
					'{{WRAPPER}} .owl-dot' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);


        $this->add_control(
			'client_owl_dot_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .owl-dot' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

	    $this->end_controls_section();

	   }



	protected function render() { 
    
    $settings = $this->get_settings_for_display();

    $client_id  = rand('25873','14784');

      $nav = '';
      $dots = '';
      $loop = '';  
      $lazy = '';
      $autoplay = '';
      $playSpeed = '';
      $in_anima = '';
      $out_anima = '';
      $prev_nav_icon = '';
      $next_nav_icon = '';

      $nav = $settings['client_owl_nav_dots'] === 'nav' ? 'true' : 'false';
      $dots = $settings['client_owl_nav_dots'] === 'dots' ? 'true' : 'false';

      if( $settings['client_owl_nav_dots'] === 'both'){
        $nav = $settings['client_owl_nav_dots'] === 'both' ? 'true' : 'false';
        $dots = $settings['client_owl_nav_dots'] === 'both' ? 'true' : 'false';
      }

      if($nav && $dots == 'none'){
      	$nav && $dots === 'false';
      }
   
	?>

    
	<script>

    (function($) {
	    "use strict";
     // slider scripts //

        jQuery(document).ready(function ($){

         /*-------- CLIENTS-SLIDER ---------*/
                var clientsSlider =  $('.clients-carousel');	
                clientsSlider.owlCarousel({
                        items: 1,
                            loop: <?php echo $loop = $settings['client_loop'] === 'yes' ? 'true' : 'false'; ?>,
                        lazyLoad: <?php echo $lazy = $settings['client_lazy'] === 'yes' ? 'true' : 'false'; ?>,
                        autoplay: <?php echo $autoplay = $settings['client_autoplay'] === 'yes' ? 'true' : 'false'; ?>,
                    smartSpeed: <?php echo $playSpeed = $settings['client_play_speed'] ? $autoplay : 'false'; ?>,
                    animateIn: '<?php echo $in_anima = $settings['client_in_anima']; ?>',
                    animateOut: '<?php echo $out_anima = $settings['client_out_anima']; ?>',
                            dots: <?php if($dots){echo $dots;}?>,
                            nav: <?php if($nav){echo $nav;}?>,
                        navText: 
                        [

                        "<i class='<?php echo $prev_nav_icon = $settings['client_prev_nav_icon']['value'] ? $settings['client_prev_nav_icon']['value'] : 'fas fa-chevron-left';
                        ?>'></i>",

                        "<i class='<?php echo $next_nav_icon = $settings['client_next_nav_icon']['value'] ? $settings['client_next_nav_icon']['value'] : 'fas fa-chevron-right';
                        ?>'></i>"

                ]
                });	
        });

     }(jQuery));

    </script>

    <!-- START-TESTIMONIAL -->

	<section  id="<?php echo $client_id;?>" class="testimonial-wrap"> 
	    <div class="quote-icon">
			<?php $client_quote  = $settings['clients_quote']['value'] ? $settings['clients_quote']['value'] : 'fas fa-quote-right';
				?>
			<i class="<?php echo $client_quote;?>"></i>
	    </div>

		<div class="clients-carousel owl-carousel">	
          
	        <?php foreach( $settings['clients_carousel'] as $singleClient ):?>

				<div class="carousel-box">
					 <?php echo wpautop( $singleClient['desc']);?>			
					<div class="client-avatar">
						<img src="<?php echo esc_url( $singleClient['client_image']['url'] );?>" alt="<?php esc_html_e('client image','landing_plugin');?>">
						<figcaption>
							 <h3 class="client-title">
							 	<?php echo wp_kses_post( $singleClient['title']);?>
							 </h3>
						</figcaption>									
					</div>																		 				
				</div><!--carousel-box-->

		      <?php endforeach;?>

		</div><!--clients-carousel-->
	</section><!-- sliders -->
	
	<!-- END-TESTIMONIAL -->

	<?php
	    
	}
/**
 * Render the widget output in the editor.
 *
 * Written as a Backbone JavaScript template and used to generate the live preview.
 *
 * @since 1.1.0
 *
 * @access protected
 */
protected function _content_template()
{ }
}