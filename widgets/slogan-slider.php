<?php

class Landing_Slogan_Slider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ticker-slider';
	}

	public function get_title() {
		return esc_html__( 'Landing Ticker', 'landing_plugin' );
	}

	public function get_script_depends() {
		return [ 'landing-ticker'];
	}

	public function get_icon() {
		return 'eicon-slider-vertical';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'landing', 'ticker' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
		'content_section',
		[
				'label' => esc_html__( 'Slogan Slider Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
    );


    $this->add_control(
			'slogan_lists',
			[
				'label' => esc_html__( 'Slogan List', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'slogan_title',
						'label' => esc_html__( 'Slogan Title', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'We’re a Company Moving Forward' , 'landing_plugin' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'slogan_title' => esc_html__( 'Company Moving Forward', 'landing_plugin' ),
					],
					[
						'slogan_title' => esc_html__( 'Working With Design', 'landing_plugin' ),						
					],
				],
				'title_field' => '{{{ slogan_title }}}',
			]
		);

  
  $this->add_control(
			'slogan_speed',
			[
				'label' => esc_html__( 'Slogan Speed', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 20000,
				'step' => 5,
				'default' => 8000,
			]
		);


  $this->add_control(
			'slogan_effect',
			[
				'label' => esc_html__( 'Slogan Effect', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fade',
				'options' => [
					'fade' => esc_html__( 'Fade', 'landing_plugin' ),
					'slide' => esc_html__( 'Slide', 'landing_plugin' ),
				],
			]
		);


	$this->end_controls_section();

	$this->start_controls_section(
		'style_section',
			[
					'label' => esc_html__( 'Ticker Slider Style', 'landing_plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );


	$this->add_control(
			'wrapper_style_options',
			[
				'label' => esc_html__( 'Wrapper Style', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);


	$this->add_responsive_control(
			'ticker_align',
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
					'{{WRAPPER}} .slogan-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'ticker_space_top_btm',
			[
				'label' => esc_html__( 'Padding Top & Bottom', 'landing_plugin' ),
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
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ticker_h1_options',
			[
				'label' => esc_html__( 'Heading Style', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ticker_h1_typography',
				'selector' => '{{WRAPPER}} .slogan-box-wrapper .single-slogan-content h1',
			]
		);


		$this->add_control(
			'ticker_h1_color',
			[
				'label' => esc_html__( 'H1 Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slogan-box-wrapper .single-slogan-content h1' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


   
   }


	protected function render() { 
    
    $settings = $this->get_settings_for_display();

     $slogan_speed = '';
     $slogan_effect = '';

     $unique_id = rand('36985','14785');

	?>

  		<!-- START SLOGAN SLIDER -->

		   <div id="<?php echo $unique_id;?>" class="slogan-box-wrapper">							 		
				<ul class="single-slogan-content list-unstyled">

	            <?php 
	              if( $settings['slogan_lists'] ):
	              foreach( $settings['slogan_lists'] as $list ): ?>

				  <li><h1> <?php echo wp_kses_post( $list['slogan_title'] );?> </h1></li>

				<?php endforeach; endif; ?>	
				 	
				</ul>
			</div>	<!--slogan-box-wrapper-->	
		<!-- END SLOGAN SLIDER -->

     <script>

	   (function($) {
	    "use strict";

	   /*--------- SLOGAN ----*/
		 
	   jQuery(document).ready( function(){

		  var sloganContent = $('.single-slogan-content');	  
		  sloganContent.list_ticker({
			  speed:<?php echo $slogan_speed  = $settings['slogan_speed'] ? $settings['slogan_speed'] : '';?>,
	      effect:'<?php echo $slogan_effect  = $settings['slogan_effect'];?>',
		   });

	    });

	  }(jQuery));

     </script>



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