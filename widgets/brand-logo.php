<?php

class Landing_Brand_Carousel extends \Elementor\Widget_Base {

	public function get_name() {
		return 'brand-carousel';
	}

	public function get_script_depends() {
		return [ 'landing-carousel' ];
	}

	public function get_title() {
		return esc_html__( 'Landing Brand Carousel', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-media-carousel';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'logo', 'brand','carousel'];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'bl_content_section',
			[
				'label' => esc_html__( 'Brand Carousel Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );


   $this->add_control(
		'brand_img',
		[
			'label' => esc_html__( 'Upload Images', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::GALLERY,
			'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			],	
		]
	);


   $item_slides = range( 1, 12 );
   $item_slides = array_combine( $item_slides, $item_slides );
	$this->add_responsive_control(
			'item_show',
			[
				'label' => esc_html__( 'Item To Show', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 6,
				'options' => [
					''=> esc_html__( 'Default', 'landing_plugin' ),
				] + $item_slides,
			]
	);

	$this->add_control(
			'brand_nav',
			[
				'label' => esc_html__( 'Navigation', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'landing_plugin' ),
					'nav' => esc_html__( 'Nav', 'landing_plugin' ),
					'dots' => esc_html__( 'Dots', 'landing_plugin' ),

				],

			]
		);

	$this->end_controls_section();

	$this->start_controls_section(
			'bl_content_section_addition',
			[
				'label' => esc_html__( 'Additional Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );


   $this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => esc_html__( 'No', 'landing_plugin' ),
					'true' => esc_html__( 'Yes', 'landing_plugin' ),
				],

			]
		);

   $this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => esc_html__( 'No', 'landing_plugin' ),
					'true' => esc_html__( 'Yes', 'landing_plugin' ),
				],

			]
	);

	$this->end_controls_section();

   }


	protected function render() { 
    
    $settings = $this->get_settings();

    $item_slide_to_show ='';
    $nav ='';
    $dots ='';
    $loop ='';
    $autoplay ='';
   
   if(!empty($settings['item_show'])){
    $item_slide_to_show = $settings['item_show'];
   }

    $nav = $settings['brand_nav'] == 'nav' ? 'true' : 'false';
    $dots = $settings['brand_nav'] == 'dots' ? 'true' : 'false';
    $loop = $settings['loop'] == 'true' ? 'true' : 'false';
    $autoplay = $settings['autoplay'] == 'true' ? 'true' : 'false';
	?>

	<script>

		(function($) {
      "use strict";

      jQuery( document ).ready(function ($) {

			var brandSlider = $('.brand-carousel');		
			brandSlider.owlCarousel({
		        items:<?php echo $item_slide_to_show;?>,
		        loop: <?php echo $loop;?>,
		        margin:30,
		        smartSpeed: 800,
		        autoplay: <?php echo $autoplay;?>,
		        animation: true,
		        responsiveClass: true,
		        dots: <?php echo $dots;?>,
		        nav: <?php echo $nav;?>,
		        navText: ["<i class='fas fa-chevron-left'></i>",
            "<i class='fas fa-chevron-right'></i>"]

		    });
      });

    }(jQuery));
		</script>

  		<!-- START BRAND CAROUSEL -->
	    
	    <section id="<?php echo rand('14785','36985');?>" class="brand-logos-wrapper">
            <div class="single-brand-wrapper brand-carousel owl-carousel">
               <?php 
                  $brandCarouselSliders = $settings['brand_img'];
                  foreach( $brandCarouselSliders as $brandCarouselSlider ):?>

						<div class="single-brand-item wow fadeIn">
							<a href="#"><img src="<?php echo esc_url($brandCarouselSlider['url']);?>" alt=""></a>
						</div>

				   <?php endforeach;?>

					<!-- single-brand-item -->

		    </div>
		    <!--single-brand-wrapper -->
       </section>
	
		<!-- END BRAND CAROUSEL -->

		
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