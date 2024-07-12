<?php

class Landing_Pricing_Table extends \Elementor\Widget_Base {

	public function get_name() {
		return 'pricing-table';
	}

	// public function get_script_depends() {
	// 	return [ 'landing-pricing' ];
	// }

	public function get_title() {
		return esc_html__( 'Landing Pricing Table', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-pricing-table';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'pricing-table', 'pricing' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'pt_content_section',
			[
				'label' => esc_html__( 'Pricing Table Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );

   $this->add_control(
			'pt_active',
			[
				'label' => esc_html__( 'Active ( Yes / Not )', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);



   $this->add_control(
			'pt_title',
			[
				'label' => esc_html__( 'Title', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'BASIC' , 'landing_plugin' ),
			]
	);


   $this->add_control(
			'pt_dur',
			[
				'label' => esc_html__( 'Duration', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'YEAR' , 'landing_plugin' ),
			]
	);


   $this->add_control(
		'pt_curr_amount',
		[
			'label' => esc_html__( 'Currency Amount', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 5,
			'max' => 100,
			'step' => 5,
			'default' => 9.99,
		]
	);


   $this->add_control(
		'pt_curr_symble',
		[
			'label' => esc_html__( 'Currency Symble', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
					'value' => 'fas fa-dollar-sign',
					'library' => 'fa-solid',
				],
		]
	);

$this->add_control(
			'pt_content_list_items',
			[
				'label' => esc_html__( 'Content List Item', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'default' => [
					[
						'list_content' => esc_html__( '10GB Storage', 'landing_plugin' ),
					],
					[
						'list_content' => esc_html__( '10 Emails', 'landing_plugin' ),
					],
					[
						'list_content' => esc_html__( '10 Domains', 'landing_plugin' ),
					],
					[
						'list_content' => esc_html__( '1GB Bandwidth', 'landing_plugin' ),
					],
					[
						'list_content' => esc_html__( 'Unlimited Downloads', 'landing_plugin' ),
					],
					[
						'list_content' => esc_html__( 'Free Updates', 'landing_plugin' ),
					],


				],
				'fields' => [
					[
						'name' => 'list_uncheck',
						'label' => esc_html__( 'Uncheck Item ( Yes / Not )', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'landing_plugin' ),
						'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
						'return_value' => 'yes',
						'default' => 'no',
					],
					[
						'name' => 'list_content',
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( '10GB Storage' , 'landing_plugin' ),
						'label_block' => true,
					],
				],
				
				'title_field' => '{{{ list_content }}}',
			]
		);
   	$this->add_control(
			'pt_btn_txt',
			[
				'label' => esc_html__( 'Button Text', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Started', 'landing_plugin' ),
			]
		);

   	   $this->add_control(
			'pt_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_style_section',
			[
				'label' => esc_html__( 'Pricing Table Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
         );


         $this->add_responsive_control(
			'pricing_wrapper_width',
			[
				'label' => esc_html__( 'Wrapper Width', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
                'frontend_available' => true,
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
					'size' => 350,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-wrapper' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_table_heading_typo',
				'selector' => '{{WRAPPER}} .single-pricing-table-wrapper .single-pricing-body ul li.heading',
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pricing_table_border',
				'selector' => '{{WRAPPER}} .single-pricing-table-wrapper',
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pricing_table_border_active',
				'selector' => '{{WRAPPER}} .active.single-pricing-table-wrapper',
			]
		);


        $this->add_control(
			'pricing_table_bg_color',
			[
				'label' => esc_html__( 'Pricing Table Bg Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-pricing-table-wrapper .single-pricing-body' => 'background: {{VALUE}}',
				],
			]
		);

         $this->add_control(
			'pricing_table_bg_color_active',
			[
				'label' => esc_html__( 'Active Bg Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .active.single-pricing-table-wrapper .single-pricing-body' => 'background: {{VALUE}}',
				],
			]
		);

         $this->add_control(
			'pricing_table_content_color',
			[
				'label' => esc_html__( 'Pricing Table Content Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-pricing-table-wrapper .single-pricing-body ul li' => 'color: {{VALUE}}',
				],
			]
		);

       $this->add_control(
			'pricing_table_content_color_active',
			[
				'label' => esc_html__( 'Active Content Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-pricing-table-wrapper.active .single-pricing-body ul li' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pricing_table_body_box_shadow',
				'selector' => '{{WRAPPER}} .single-pricing-table-wrapper .single-pricing-body',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pricing_table_body_box_shadow_active',
				'selector' => '{{WRAPPER}} .active.single-pricing-table-wrapper .single-pricing-body',
			]
		);

       $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_table_content_typo',
				'selector' => '{{WRAPPER}} .single-pricing-table-wrapper .single-pricing-body .pricing-content ul li',
			]
		);




        $this->add_responsive_control(
			'pricing_btn_width',
			[
				'label' => esc_html__( 'Button Width', 'landing_plugin' ),
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
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .single-pricing-table-wrapper .pricing-content ul li a.select-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'pricing_btn_width_active',
			[
				'label' => esc_html__( 'Active Button Width', 'landing_plugin' ),
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
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .active.single-pricing-table-wrapper .pricing-content ul li a.select-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
    

		$this->end_controls_section();


	   }

	protected function render(){ 
    
    $settings = $this->get_settings_for_display();
    $unique_id  = rand('25873','14784');
  
	?>

    <!-- START-PRICING-TABLE -->

	<section  id="<?php echo $unique_id;?>" class="pricing-table-wrapper"> 
       <div class="single-pricing-table-wrapper <?php if( 'yes' === $settings['pt_active'] ){ echo "active"; }?>">
			<div class="single-pricing-body">
				<div class="pricing-header">
					<ul>
						<li class="heading"> <?php echo $settings['pt_title']; ?>  </li>
						<li><span class="currency"><i class="<?php echo esc_attr( $settings['pt_curr_symble']['value']);?>"></i>
							<?php echo $settings['pt_curr_amount']; ?> </span> / <span class="time"> <?php echo $settings['pt_dur']; ?> 
							<?php \Elementor\Icons_Manager::render_icon( $settings['pt_curr_symble']['value'], [ 'aria-hidden' => 'true' ] ); ?>
						    </span>
						</li>
					</ul>
				</div><!-- pricing-header -->		
				<div class="pricing-content">
					<ul>
						<?php 
                         $ptContentLists = $settings['pt_content_list_items'];
						foreach( $ptContentLists as  $ptContent ):?>
						<li> 
							<?php if('yes' === $ptContent['list_uncheck']){ ?>
							   <del> <?php echo ($ptContent['list_content']);?> </del>
						   <?php } else { ?>
						      <?php echo ($ptContent['list_content']);?>
						   <?php } ?>
						</li>
                        <?php endforeach;?>

					    <li>
                           <a class="select-btn" href="<?php echo esc_url($settings['pt_btn_link']['url']);?>"> 
							<?php echo ($settings['pt_btn_txt']);?> 
                            </a>
						</li>
					</ul><!-- ul -->
				</div><!-- pricing-content -->								
			</div><!-- single-pricing-body -->
		</div><!-- single-pricing-table-wrapper -->
	</section>
	
	<!-- END-PRICING-TABLE -->
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