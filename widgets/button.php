<?php

class Landing_Button extends \Elementor\Widget_Base {

	public function get_name() {
		return 'button';
	}

	public function get_title() {
		return esc_html__( 'Landing Button', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'landing', 'button' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Button Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );

   $this->add_control(
			'btn_text',
			[
			'label' => esc_html__( 'Button Text', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'know about us', 'landing_plugin' ),				
			]
	);

   $this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link Address', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#about',
				],
				'label_block' => false,
			]
	);


   $this->add_control(
			'btn_icon',
			[
				'label' => esc_html__( 'Button Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-right',
					'library' => 'fa-solid fa-chevron-right',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);


	$this->end_controls_section();

   $this->start_controls_section(
			'style_button',
			[
				'label' => esc_html__( 'Button Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);

    $this->add_control(
			'btn_width',
			[
				'label' => esc_html__( 'Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 120,
				],
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'btn_height',
			[
				'label' => esc_html__( 'Height', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

         $this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'top' => 15,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'selector' => '{{WRAPPER}} .slogan-box-wrapper a.slogan-btn',
			]
		);

    $this->add_control(
			'btn_border_rad',
			[
				'label' => esc_html__( 'Border Radius', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .slogan-box-wrapper a.slogan-btn',
			]
		);

    $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Button Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Button BG Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

        $this->add_control(
			'btn_color_on_hover',
			[
				'label' => esc_html__( 'Button Color On Hover', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'btn_bg_color_on_hover',
			[
				'label' => esc_html__( 'Button BG Color On Hover', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper a.slogan-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		

		$this->end_controls_tab();

		$this->end_controls_tabs();


   $this->end_controls_section();


   }

	protected function render() { 
    
    $settings = $this->get_settings_for_display();

	?>


  		<!-- START BUTTON -->
  		  <button class="slogan-box-wrapper slogan-button">
		    <a class="section-scroll slogan-btn" href="<?php echo esc_attr ( $settings['btn_link'] ["url"] );?>" >
				<i class="<?php echo esc_attr ( $settings['btn_icon'] ["value"] );?>"></i> 
				<?php echo  wp_kses_post( $settings['btn_text'] );?>  
	        </a>
	      </button>	
	   
		<!-- END BUTTON -->

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