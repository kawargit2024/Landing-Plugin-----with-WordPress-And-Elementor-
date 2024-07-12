<?php

class Landing_Hero_Banner extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hero-banner';
	}

	public function get_title() {
		return esc_html__( 'Landing Hero Banner', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'hero', 'Banner' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Hero Banner Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );


   $this->add_control(
			'hero_h',
			[
				'label' => esc_html__( 'Heading and Subheading Info', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);


   $this->add_control(
			'show_hero_sub_heading',
			[
				'label' => esc_html__( 'Show / Hide Subheading', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
	);



   $this->add_responsive_control(
			'hero_sub_heading',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Subheading', 'landing_plugin' ),
				'default' => 'Hello',
				'condition' => [
					'show_hero_sub_heading' => 'yes',
				],
			]
	);



    $this->add_responsive_control(
			'hero_heading',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Heading', 'landing_plugin' ),
			   'default' => 'We are ConCat',
			]
	);


   $this->add_control(
			'hero_bg',
			[
				'label' => esc_html__( 'Banner Image Info', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);
   
	$this->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name' => 'background',
			'types' => [ 'classic', 'gradient', 'video' ],
			'selector' => '{{WRAPPER}} .single-hero-bg-item.hero-bg',
		]
	);

	$this->add_control(
		'hero_width',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ '%' ],
			'range' => [
				'%' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'default' => [
				'unit' => '%',
				'size' => 100,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .single-hero-bg-item' => 'width: {{SIZE}}{{UNIT}};',
			],
		]
	);


	$this->add_control(
		'hero_height',
		[
			'label' => esc_html__( 'Height', 'landing_plugin' ),
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
				'size' => 850,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .single-hero-bg-item' => 'height: {{SIZE}}{{UNIT}};',
			],
		]
	);

   $this->end_controls_section();

   $this->start_controls_section(
		'downarrow_section',
		[
			'label' => esc_html__( 'Down Arrow Settings', 'landing_plugin' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);



	$this->add_control(
			'show_arrow',
			[
				'label' => esc_html__( 'Show / Hide Arrow', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
	);


	$this->add_control(
			'downarrow_icon',
			[
				'label' => esc_html__( 'Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-down',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'dot-circle',
						'fa-chevron-down',
					],
				],
				'condition' => [
					'show_arrow' => 'yes',
				],
			]
	);

	$this->add_control(
			'downarrow_icon_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.down-arrow.section-scroll.hidden-xs svg' => 'background-color: {{VALUE}}',
				],
			]
		);


	$this->add_control(
			'arrow_h_s',
			[
				'label' => esc_html__( 'Arrow Line Height & Space ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);



	$this->add_responsive_control(
		'downarrow_lh',
		[
			'label' => esc_html__( 'Line Height', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => -100,
					'max' => 100,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 31,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'line-height: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
					'show_arrow' => 'yes',
			],
		]
	);



	$this->add_responsive_control(
		'downarrow_mr_top',
		[
			'label' => esc_html__( 'Space From Top', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => -500,
					'max' => 1000,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 145,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'top: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
					'show_arrow' => 'yes',
			],
		]
	);


	$this->add_responsive_control(
		'downarrow_mr_left',
		[
			'label' => esc_html__( 'Space From Left', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => -500,
					'max' => 1000,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 0,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'left: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
					'show_arrow' => 'yes',
			],
		]
	);


	$this->add_control(
			'arrow_w_h',
			[
				'label' => esc_html__( 'Arrow Width & Height ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);


	$this->add_responsive_control(
		'downarrow_w',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 10,
					'max' => 100,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 14,
			],
			'selectors' => [
				'{{WRAPPER}} a.down-arrow.section-scroll.hidden-xs svg' => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);

	$this->add_control(
		'downarrow_h',
		[
			'label' => esc_html__( 'Height', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 10,
					'max' => 100,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 34,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'height: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);



	$this->add_control(
			'arrow_url_text',
			[
				'label' => esc_html__( 'Link Url & Link Text ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);



	$this->add_control(
		'downarraow_link',
		[
			'label' => esc_html__( 'Url', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::URL,
			'options' => [ 'url'],
			'default' => [
				'url' => '#',
			],
			'label_block' => false,
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);


	$this->add_control(
		'downarraow_link_text',
		[
			'type' => \Elementor\Controls_Manager::TEXT,
			'label' => esc_html__( 'Text', 'landing_plugin' ),
			'default' => esc_html__('work', 'landing_plugin' ),
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);


   $this->end_controls_section();


   $this->start_controls_section(
			'style_section_sh',
			[
				'label' => esc_html__( 'Hero Sub Heading Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);


	$this->add_control(
			'b_sh_stl',
			[
				'label' => esc_html__( 'Sub Heading Typography', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);



	$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hero_sub_heading_typo',
				'selector' => '{{WRAPPER}} h2.hero-bg-subheading',
			]
	);
	$this->add_control(
		'hero_sub_heading_align',
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
			'default' => 'left',
			'toggle' => true,
			'selectors' => [
				'{{WRAPPER}} h2.hero-bg-subheading' => 'text-align: {{VALUE}};',
			],
		]
	);

	$this->add_control(
			'hero_bg_sub_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.hero-bg-subheading' => 'color: {{VALUE}}',
				],
			]
		);


   $this->add_control(
			'b_bdr_stl',
			[
				'label' => esc_html__( 'Sub Heading Border Space & Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);

   
	$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'top_border',
				'selector' => '{{WRAPPER}} .single-hero-bg-content-wrapper h2.hero-bg-subheading span.top-border',
			]
		);



	$this->add_responsive_control(
		'top_border_top_btm',
		[
			'label' => esc_html__( 'Space From Top / Bottom', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range' => [
				'px' => [
					'min' => -500,
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
				'size' => 105,
			],
			'selectors' => [
				'{{WRAPPER}} .single-hero-bg-content-wrapper h2.hero-bg-subheading span.top-border' => 'top: {{SIZE}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'top_border_w',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
			'range' => [
				'px' => [
					'min' => -500,
					'max' => 1000,
					'step' => 5,
				],
				'%' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'default' => [
				'unit' => '%',
				'size' => 100,
			],
			'selectors' => [
				'{{WRAPPER}} .single-hero-bg-content-wrapper h2.hero-bg-subheading span.top-border' => 'width: {{SIZE}}{{UNIT}};',
			],
		]
	);



	$this->add_responsive_control(
		'top_border_align',
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
			'default' => 'left',
			'toggle' => true,
			'selectors' => [
				'{{WRAPPER}} .single-hero-bg-content-wrapper h2.hero-bg-subheading span.top-border' => 'text-align: {{VALUE}}',
				'{{WRAPPER}} .single-hero-bg-content-wrapper h2.hero-bg-subheading span.top-border' => 'margin: 0 auto; margin-{{VALUE}}: 0',
			],
		]
	);

    $this->end_controls_section();



   $this->start_controls_section(
			'style_section_h',
			[
				'label' => esc_html__( 'Hero Heading Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);


	$this->add_responsive_control(
			'style_section_h1',
			[
				'label' => esc_html__( 'Typography', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);


  
   $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hero_heading_typo',
				'selector' => '{{WRAPPER}} h1.hero-bg-heading',
			]
		);

   $this->add_control(
		'hero_heading_align',
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
				'{{WRAPPER}} h1.hero-bg-heading' => 'text-align: {{VALUE}};',
			],
		]
	);

   $this->add_control(
		'hero-bg-heading_color',
		[
			'label' => esc_html__( 'Text Color', 'textdomain' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} h1.hero-bg-heading' => 'color: {{VALUE}}',
			],
		]
	);

  $this->add_control(
			'style_section_bdr',
			[
				'label' => esc_html__( 'Heading Border Space & Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);

    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'bottom_border',
				'selector' => '{{WRAPPER}} .single-hero-bg-content-wrapper h1.hero-bg-heading span.bottom-border',
			]
		);


	$this->add_responsive_control(
		'bottom_border_top_btm',
		[
			'label' => esc_html__( 'Space From Top / Bottom', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%'],
			'range' => [
				'px' => [
					'min' => -500,
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
				'size' => -69,
			],
			'selectors' => [
				'{{WRAPPER}} .single-hero-bg-content-wrapper h1.hero-bg-heading span.bottom-border' => 'bottom: {{SIZE}}{{UNIT}};',
			],
		]
	);


	$this->add_control(
		'bottom_border_w',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%'],
			'range' => [
				'px' => [
					'min' => -500,
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
				'size' => 100,
			],
			'selectors' => [
				'{{WRAPPER}} .single-hero-bg-content-wrapper h1.hero-bg-heading span.bottom-border' => 'width: {{SIZE}}{{UNIT}};',
			],
		]
	);


	$this->add_responsive_control(
		'bottom_border_align',
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
				'{{WRAPPER}} .single-hero-bg-content-wrapper h1.hero-bg-heading span.bottom-border' => 'text-align: {{VALUE}}',
				'{{WRAPPER}} .single-hero-bg-content-wrapper h1.hero-bg-heading span.bottom-border' => 'margin: 0 auto; margin-{{VALUE}}: 0',
			],
		]
	);

	$this->end_controls_section();


    $this->start_controls_section(
		'style_section',
		[
			'label' => esc_html__( 'Overlay Settings', 'landing_plugin' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);


    $this->add_control(
			'hero_bg_overlay_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>'#2c2c2c',
				'selectors' => [
					'{{WRAPPER}} .hero-bg-wrapper .single-hero-bg-item:after' => 'background: {{VALUE}}',
				],
			]
		);

    $this->add_control(
			'hero_bg_overlay_opacity',
			[
				'label' => esc_html__( 'Opacity', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-bg-wrapper .single-hero-bg-item:after' => 'opacity: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->end_controls_section();


	$this->start_controls_section(
				'style_section_arr',
				[
					'label' => esc_html__( 'Arrow Style', 'landing_plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
		);

	$this->add_control(
		'downarrow_size',
		[
			'label' => esc_html__( 'Size', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 10,
					'max' => 100,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 20,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);


  $this->add_control(
			'arrow_bdr',
			[
				'label' => esc_html__( 'Border ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);



	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'downarrow_border',
			'selector' => '{{WRAPPER}} .hero-bg-wrapper .down-arrow',
			'condition' => [
					'show_arrow' => 'yes',
			],
		]
	);

	$this->add_control(
		'arrow_bdr_rad',
		[
			'label' => esc_html__( 'Border Radius', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 10,
					'max' => 100,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 50,
			],
			'selectors' => [
				'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'border-radius: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'show_arrow' => 'yes',
			],
		]
	);

	$this->add_control(
			'arrow__clr',
			[
				'label' => esc_html__( 'Arrow Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'color: {{VALUE}}',
				],
			]
		);


	$this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>'transparent',
				'selectors' => [
					'{{WRAPPER}} .hero-bg-wrapper .down-arrow' => 'background: {{VALUE}}',
				],
			]
		);

    $this->end_controls_section();



   }


	protected function render() { 
    
    $settings = $this->get_settings_for_display();

	?>

	<!-- START-HERO-BACKGROUND -->
	
	<section class="hero-bg-wrapper">
		<div class="single-hero-bg-item hero-bg overay-color">
			<div class="single-hero-bg-content-wrapper">
				<div class="container content-inner">
				    <h2 class="hero-bg-subheading"> 
						<?php 
						   if($settings['hero_sub_heading']){
							    if('yes' === $settings['show_hero_sub_heading']){
						 	        echo wp_kses_post ( $settings['hero_sub_heading'] );
						    }
					      }
						?> 						 	  
					    <span class="top-border"></span>
					</h2>					
					<?php if($settings['hero_heading']):?>
					   <h1 class="hero-bg-heading"> 
					       <?php echo wp_kses_post( $settings['hero_heading'] );?> 
					        <span class="bottom-border"></span>
					   </h1>	
					<?php endif;?>
				</div><!--/.content-inner-->
			</div><!--single-hero-bg-content-wrapper-->
		</div><!--single-hero-bg-item-->
       
         <?php if('yes' === $settings['show_arrow']):?>

			<a class="down-arrow section-scroll hidden-xs" href="<?php  
			 if($settings['downarraow_link']["url"] && $settings['downarraow_link_text']){
			    echo esc_attr ( $settings['downarraow_link']["url"].$settings['downarraow_link_text']);
	        }
		   ?>">
				<?php 
				if($settings['downarrow_icon']){
				   \Elementor\Icons_Manager::render_icon( $settings['downarrow_icon']);
				}
				 ?>
			</a>	
		
		<?php endif;?>

	</section>

	
	<!-- END-HERO-BACKGROUND -->
		
		<?php
	}
}