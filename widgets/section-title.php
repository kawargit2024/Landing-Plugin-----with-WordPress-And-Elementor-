<?php

class Landing_Section_Title extends \Elementor\Widget_Base {

	public function get_name() {
		return 'section-title';
	}

	public function get_title() {
		return esc_html__( 'Landing Section Title', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-post-title';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'landing', 'title' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Section Title Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );



  	$this->add_responsive_control(
		'section_t_h1',
		[
			'label' => esc_html__( 'Heading', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'About Us', 'landing_plugin' ),				
		]
	);

	$this->add_responsive_control(
		'section_t_p',
		[
			'label' => esc_html__( 'Description', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'ai' => [
			'type' => 'text',
		],
			'default' => esc_html__( 'professional & outstanding ideasof our passionate team makes us unique in every sense. ', 'landing_plugin' ),				
		]
	);


	$this->add_responsive_control(
		'section_t_h4',
		[
			'label' => esc_html__( 'Sub Heading', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Who We Are', 'landing_plugin' ),				
		]
	);


	$this->end_controls_section();

   $this->start_controls_section(
			'section_title_stl',
			[
				'label' => esc_html__( 'Section Title Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);



	$this->add_responsive_control(
		'section_t_align',
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
				'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}}',
			],
		]
	);


   $this->add_control(
			'h1_stl',
			[
				'label' => esc_html__( 'Heading ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);




   $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'h1_typo',
				'selector' => '{{WRAPPER}} .section-title h1',
			]
	);

   $this->add_control(
		'h1_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .section-title h1' => 'color: {{VALUE}}',
			],
		]
	);

   $this->add_control(
		'h1_bg_color',
		[
			'label' => esc_html__( 'Caption BG Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .section-title h1' => 'background-color: {{VALUE}}',
			],
		]
	);


   $this->add_control(
			's_desc_stl',
			[
				'label' => esc_html__( 'Description ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);


    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 's_desc_typo',
				'selector' => '{{WRAPPER}} .section-title p',
			]
	);


	$this->add_control(
		's_t_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
			],
		]
	);
    

    $this->add_responsive_control(
			's_h4_stl',
			[
				'label' => esc_html__( 'Sub Heading ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',

			]
	);


	 $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 's_h4_typo',
				'selector' => '{{WRAPPER}} .section-title h4',
			]
	);


	$this->add_control(
		's_h4_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_control(
		's_h4_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .section-title h4' => 'background-color: {{VALUE}}',
			],
		]
	);


    $this->end_controls_section();

    
   $this->start_controls_section(
			'section_hr_stl',
			[
				'label' => esc_html__( 'Top Divider Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);

   $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'top_hr',
				'selector' => '{{WRAPPER}} hr.divider.sep1',
			]
	);
    
	$this->add_responsive_control(
		'top_hr_width',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%'],
			'range' => [
				'px' => [
					'min' => -100,
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
				'size' => 25,
			],
			'selectors' => [
				'{{WRAPPER}} hr.divider.sep1' => 'width: {{SIZE}}{{UNIT}};',
			],
		]
	);


	$this->add_responsive_control(
		'top_hr_align',
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
				'{{WRAPPER}} hr.divider.sep1' => 'text-align: {{VALUE}}',
				'{{WRAPPER}} hr.divider.sep1' => 'margin: 0 auto; margin-{{VALUE}}: 0',
			],
		]
	);

	$this->add_responsive_control(
			'top_hr_top_space',
			[
				'label' => esc_html__( 'Spacing From Top', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'default' => [
				'unit' => 'px',
				'size' => 0,
			],
				'selectors' => [
					'{{WRAPPER}} hr.divider.sep1' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
   

        $this->add_responsive_control(
			'top_hr_btm_space',
			[
				'label' => esc_html__( 'Spacing From Bottom', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'default' => [
				'unit' => 'px',
				'size' => 30,
			],
				'selectors' => [
					'{{WRAPPER}} hr.divider.sep1' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

   $this->end_controls_section();

   $this->start_controls_section(
			'section_hr_st2',
			[
				'label' => esc_html__( 'Bottom Divider Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);

   $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btm_hr',
				'selector' => '{{WRAPPER}} hr.divider.sep2',
			]
	);
    
	$this->add_responsive_control(
		'btm_hr_width',
		[
			'label' => esc_html__( 'Width', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%'],
			'range' => [
				'px' => [
					'min' => -100,
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
				'size' => 25,
			],
			'selectors' => [
				'{{WRAPPER}} hr.divider.sep2' => 'width: {{SIZE}}{{UNIT}};',
			],
		]
	);


	$this->add_responsive_control(
		'btm_hr_align',
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
				'{{WRAPPER}} hr.divider.sep2' => 'text-align: {{VALUE}}',
				'{{WRAPPER}} hr.divider.sep2' => 'margin: 0 auto; margin-{{VALUE}}: 0',
			],
		]
	);

	$this->add_responsive_control(
			'btm_hr_top_space',
			[
				'label' => esc_html__( 'Spacing From Top', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'default' => [
				'unit' => 'px',
				'size' => 0,
			],
				'selectors' => [
					'{{WRAPPER}} hr.divider.sep2' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
   

        $this->add_responsive_control(
			'btm_hr_btm_space',
			[
				'label' => esc_html__( 'Spacing From Bottom', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'default' => [
				'unit' => 'px',
				'size' => 30,
			],
				'selectors' => [
					'{{WRAPPER}} hr.divider.sep2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);



   $this->end_controls_section();

   }


	protected function render() { 
    
    $settings = $this->get_settings_for_display();

	?>


  		<!-- START SECTION TITLE -->
	
	   <div class="section-title">

	   	<?php if($settings['section_t_h1']):?>
			<h1 class="section-heading"> <?php echo wp_kses_post ( $settings['section_t_h1'] );?> </h1>
         <?php endif;?>

			<hr class="divider sep1">

         <?php if($settings['section_t_p']):?>
			<p class="section-title-para"> <?php echo wp_kses_post ( $settings['section_t_p'] );?></p>
 			<?php endif;?>

			<hr class="divider sep2">	

			<?php if($settings['section_t_h4']):?>
			<h4 class="section-sub-heading"> <?php echo wp_kses_post ( $settings['section_t_h4'] );?> </h4> 
			<?php endif;?>

		</div><!-- section-title -->	    

		<!-- END SECTION TITLE -->

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