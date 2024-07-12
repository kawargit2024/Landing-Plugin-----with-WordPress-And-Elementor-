<?php

class Landing_Google_Map extends \Elementor\Widget_Base {

	public function get_name() {
		return 'google_maps';
	}

	public function get_script_depends() {
		return [ 'jquery-gmap3','google-map-api' ];
	}

	public function get_title() {
		return esc_html__( 'Landing Google Map', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'google-map', 'gmap','google' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'google_map_content_section',
			[
				'label' => esc_html__( 'Google Map Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

			$api_key = get_option( 'gmap_api_key' );

			if ( ! $api_key ) {
				$this->add_control(
					'api_key_notification',
					[
						'type' => \Elementor\Controls_Manager::RAW_HTML,
						'raw' => sprintf(
						/* translators: 1: Integration settings link open tag, 2: Create API key link open tag, 3: Link close tag. */
							esc_html__( 'Set your Google Maps API Key in Elementor\'s %1$sIntegrations Settings%3$s page. Create your key %2$shere.%3$s', 'elementor' ),
							'<a href="' . \Elementor\Settings::get_url() . '#tab-integrations" target="_blank">',
							'<a href="https://developers.google.com/maps/documentation/embed/get-api-key" target="_blank">',
							'</a>'
						),
					]
				);
			}
		


		$default_address = esc_html__( 'Dhaka University, Bangladesh', 'landing_plugin' );
		$this->add_control(
			'gmap_address',
			[
				'label' => esc_html__( 'Location', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => $default_address,
				'default' => $default_address,
				'label_block' => true,
			]
		);

		$this->add_control(
			'gmap_zoom',
			[
				'label' => esc_html__( 'Zoom', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'map_height',
			[
				'label' => esc_html__( 'Map Height', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 40,
						'max' => 1440,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
			    ],
				'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'gmap_lat',
			[
			  'label' => esc_html__( 'Latitude', 'landing_plugin' ),
			  'type' => \Elementor\Controls_Manager::TEXT,
			  'default' => esc_html__( 23.6850, 'landing_plugin' ),
			]
		);

		$this->add_control(
			'gmap_lon',
			[
			  'label' => esc_html__( 'Longitude', 'landing_plugin' ),
			  'type' => \Elementor\Controls_Manager::TEXT,
			  'default' => esc_html__( 90.3563, 'landing_plugin' ),
			]
		);




		$this->end_controls_section();

	   }



	protected function render() { 
    
    $settings = $this->get_settings_for_display();

    ?>


    <?php

    if ( empty( $settings['gmap_address'] ) ) {
			return;
		}

	if ( 0 === absint( $settings['gmap_zoom']['size'] ) ) {
			$settings['gmap_zoom']['size'] = 10;
		}

	$api_key = esc_html( get_option( 'gmap_api_key' ) );

	$params = [
			rawurlencode( $settings['gmap_address'] ),
			absint( $settings['gmap_zoom']['size'] ),
		];

	if ( $api_key ) {
			$params[] = $api_key;
			$url = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-43o03x3sAq89stGgFDHVFgqi7wiEuM';
		} else {
			$url = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near';
		}


   
	?>

    <!-- START-GMAP -->

    <div id="<?php echo rand('17855','36985');?>"class="map-area">
       	<div id="gmap" class="gMap">
			<iframe loading="lazy"
				src="<?php echo esc_url( vsprintf( $url, $params ) ); ?>"
				title="<?php echo esc_attr( $settings['gmap_address'] ); ?>"
				aria-label="<?php echo esc_attr( $settings['gmap_address'] ); ?>">	
			</iframe>
		</div>

       </div> 




	<!-- END-GMAP -->



  <?php

    // function google_api_key(){

    // wp_enqueue_script('google-map-api', '//maps.googleapis.com/maps/api/js?key=AIzaSyBw-43o03x3sAq89stGgFDHVFgqi7wiEuM', array(), wp_get_theme()->get( 'Version' ), true);
    // }


  ?>
          


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