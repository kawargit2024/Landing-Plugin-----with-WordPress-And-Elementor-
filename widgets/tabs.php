<?php

class Landing_Tabs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tab-section';
	}

	public function get_script_depends() {
		return [ 'jquery-fancybox' ];
	}

	public function get_title() {
		return esc_html__( 'Landing Tabs', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'tab', 'section' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'tab_section_settings',
			[
				'label' => esc_html__( 'Tab Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );

   	$this->add_control(
			'tab_lists',
			[
				'label' => esc_html__( 'Tab List', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => esc_html__( 'Tab #1', 'landing_plugin' ),
					],
					[
						'title' => esc_html__( 'Tab #2', 'landing_plugin' ),
					],
					[
						'title' => esc_html__( 'Tab #3', 'landing_plugin' ),
					],

				],
				'fields' => [
					[
						'name' => 'tab_sections',
						'label' => esc_html__( 'Select Tab Sections', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'about_tabs',
						'options' => [
							'about_tabs' => esc_html__( 'Default ( About Tabs )', 'landing_plugin' ),
							'service_tabs' => esc_html__( 'Service Tabs', 'landing_plugin' ),
							'contact_tabs' => esc_html__( 'Contact Tabs', 'landing_plugin' ),
						],
						
					],

					[
						'name' => 'tab_options',
						'label' => esc_html__( 'Select Formats', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'tab_single_image',
						'options' => [
							'tab_single_image' 	   => esc_html__( 'Default', 'landing_plugin' ),
							'tab_yt_vid' 		   => esc_html__( 'Youtue With Poster', 'landing_plugin' ),
							'tab_single_yt_vid'    => esc_html__( 'Youtue Video', 'landing_plugin' ),
							'tab_single_vimeo_vid' => esc_html__( 'Vimeo Video', 'landing_plugin' ),
							'tab_slider_list' 	   => esc_html__( 'Slider Image', 'landing_plugin' ),
							'tab_gmap' 			   => esc_html__( 'Google Map', 'landing_plugin' ),
						],
						
					],

					[
						'name' => 'tab_col_right_s',
						'label' => esc_html__( 'Select Column Right', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'devices' => [ 'desktop', 'tablet', 'mobile' ],
						'default' => 'col-md-7',
						'options' => [
							'col-md-12' => esc_html__( 'One Column (12/12)', 'landing_plugin' ),
							'col-md-6' => esc_html__( 'Two Columns (6/12)', 'landing_plugin' ),
							'col-md-4' => esc_html__( 'Three Columns (4/12)', 'landing_plugin' ),
							'col-md-3' => esc_html__( 'Four Columns (3/12)', 'landing_plugin' ),
							'col-md-5' => esc_html__( 'Five Columns (5/12)', 'landing_plugin' ),
							'col-md-7' => esc_html__( 'Default (7/12)', 'landing_plugin' ),
						],
						
					],

					[
						'name' => 'tab_col_left_s',
						'label' => esc_html__( 'Select Column Left', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'devices' => [ 'desktop', 'tablet', 'mobile' ],
						'default' => 'col-md-5',
						'options' => [
							'col-md-12' => esc_html__( 'One Column (12/12)', 'landing_plugin' ),
							'col-md-6' => esc_html__( 'Two Columns (6/12)', 'landing_plugin' ),
							'col-md-4' => esc_html__( 'Three Columns (4/12)', 'landing_plugin' ),
							'col-md-3' => esc_html__( 'Four Columns (3/12)', 'landing_plugin' ),
							'col-md-5' => esc_html__( 'Default  (5/12)', 'landing_plugin' ),
							'col-md-7' => esc_html__( 'Seven Columns (7/12)', 'landing_plugin' ),
						],
						
					],


					[
						'name' => 'side_rev',
						'label' => esc_html__( 'Side Reverse', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Yes', 'landing_plugin' ),
						'label_off' => esc_html__( 'No', 'landing_plugin' ),
						'return_value' => 'yes',
				        'default' => 'no',
					],

					[
						'name' => 'tab_yt_vid',
						'label' => esc_html__( 'Youtube Video', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
						    'url' => 'http://www.youtube.com/embed/M5g19QIfKwI',
						 ],
						'condition' => [
					       'tab_options' => 'tab_yt_vid',
				        ],
					],	
					[
						'name' => 'tab_vid_poster',
						'label' => esc_html__( 'Video Poster', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
						    'url' => \Elementor\Utils::get_placeholder_image_src(),
						 ],
						 'condition' => [
					       'tab_options' => 'tab_yt_vid',
				        ],
					],

                    [
						'name' => 'play_icon',
						'label' => esc_html__( 'Play Icon', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-play',
							'library' => 'fa-solid',
						],
						'condition' => [
					       'tab_options' => 'tab_yt_vid',
				        ],
					],
					[
						'name' => 'tab_single_image',
						'label' => esc_html__( 'Image', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
						    'url' => \Elementor\Utils::get_placeholder_image_src(),
						 ],
						 'condition' => [
					       'tab_options' => 'tab_single_image',
				        ],
					],
					
					[
						'name' => 'tab_single_yt_vid',
						'label' => esc_html__( 'Youtube Video', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
						    'url' => 'http://www.youtube.com/embed/M5g19QIfKwI',
						 ],
						 'condition' => [
					       'tab_options' => 'tab_single_yt_vid',
				        ],
					],
						
					[
						'name' => 'tab_single_vimeo_vid',
						'label' => esc_html__( 'Vimeo Video', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
						    'url' => 'https://player.vimeo.com/video/118408599',
						 ],
						 'condition' => [
					       'tab_options' => 'tab_single_vimeo_vid',
				        ],
					],	

					[
						'name' => 'tab_gmap',
						'label' => esc_html__( 'Google Map', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
						    'url' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-43o03x3sAq89stGgFDHVFgqi7wiEuM',
						 ],
						 'condition' => [
					       'tab_options' => 'tab_gmap',
				        ],
					],					
					[
						'name' => 'tab_heading',
						'label' => esc_html__( 'Heading', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Company Overview' , 'landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['about_tabs','service_tabs'],
				        ],
					],
					[
						'name' => 'tab_desc',
						'label' => esc_html__( 'Description', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'We started its operations in May 2002, with the vision to be the leading IT Company in Bangladesh. From our office we offer IT support to all major centres through strategic partnerships with other ICT services companies as well as industry leading remote technology.' , 'landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['about_tabs','service_tabs'],
				        ],
					],
					[
						'name' => 'tab_title',
						'label' => esc_html__( 'Tab Title', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'History' , 'landing_plugin' ),
					],
					[
						'name' => 'office_title_col',
						'label' => esc_html__( 'Select Column', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'col-md-5',
						'options' => [
							'col-md-4' => esc_html__( 'Three Columns (4/12)', 'landing_plugin' ),
							'col-md-3' => esc_html__( 'Four Columns (3/12)', 'landing_plugin' ),
							'col-md-5' => esc_html__( 'Default  (5/12)', 'landing_plugin' ),
						],
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
						
					],
					[
						'name' => 'tab_contact_office_heading',
						'label' => esc_html__( 'Office Title', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Office Address' , 'landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],
					[

						'name' => 'api_key_notification',
						'type' => \Elementor\Controls_Manager::RAW_HTML,
						'raw' => sprintf(
						/* translators: 1: Integration settings link open tag, 2: Create API key link open tag, 3: Link close tag. */
							esc_html__( 'Set your Google Maps API Key in Elementor\'s %1$sIntegrations Settings%3$s page. Create your key %2$shere.%3$s', 'elementor' ),
							'<a href="' . \Elementor\Settings::get_url() . '#tab-integrations" target="_blank">',
							'<a href="https://developers.google.com/maps/documentation/embed/get-api-key" target="_blank">',
							'</a>'
						),

						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],
					[
						'name' => 'gmap_height',
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
					],

					[
						'name' => 'gmap_address',
						'label' => esc_html__( 'Location', 'landing_plugin' ),
				        'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Dhaka University, Bangladesh', 'landing_plugin' ),
						'default' => esc_html__( 'Dhaka University, Bangladesh', 'landing_plugin' ),
						'label_block' => true,
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],

					[
						'name' => 'gmap_lat',
						'label' => esc_html__( 'Latitude','landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( '23.6850', 'landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],

					[
						'name' => 'gmap_lon',
						'label' => esc_html__( 'Longitude','landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( '90.3563','landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],

					[
						'name' => 'gmap_zoom',
						'label' => esc_html__( 'Map Zoom','landing_plugin' ),
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
				 			'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],

					[
						'name' => 'office_location_col',
						'label' => esc_html__( 'Select Column', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'col-md-4',
						'options' => [
							'col-md-4' => esc_html__( 'Default (4/12)', 'landing_plugin' ),
							'col-md-3' => esc_html__( 'Four Columns (3/12)', 'landing_plugin' ),
							'col-md-5' => esc_html__( 'Five Columns  (5/12)', 'landing_plugin' ),
						],
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
						
					],
                    
                    [
						'name' => 'tab_contact_office_list',
						'label' => esc_html__( 'Office Location List', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::REPEATER,
						'default' => [
							[
								'title' => esc_html__( 'Location #1', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Phone #2', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Time #3', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Email #4', 'landing_plugin' ),
							],
							
						],
						'condition' => [  
					        'tab_sections' => 'contact_tabs',
				        ],
						
						'fields' => [
							[
							  'name' => 'tab_contact_office_title',
							  'label' => esc_html__( 'Title', 'landing_plugin' ),
							  'type' => \Elementor\Controls_Manager::TEXT,
							  'default' => esc_html__( 'Dhaka-1230, Bangladesh ','landing_plugin'),
								
							],
							[
							   'name' => 'tab_contact_office_icon',
								'label' => esc_html__( 'Icon', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::ICONS,
								'default' => [
									'value' => 'fa-solid fa-location-pin',
									'library' => 'fa-solid',
								],
							],
						],

					],

					[
						'name' => 'office_social_col',
						'label' => esc_html__( 'Select Column', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'col-md-3',
						'options' => [
							'col-md-4' => esc_html__( 'Three Columns (4/12)', 'landing_plugin' ),
							'col-md-3' => esc_html__( 'Default (3/12)', 'landing_plugin' ),
							'col-md-5' => esc_html__( 'Five Columns  (5/12)', 'landing_plugin' ),
						],

						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],
					[
						'name' => 'tab_contact_office_social_title',
						'label' => esc_html__( 'Office Social Title', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Office Social Title' , 'landing_plugin' ),
						'condition' => [
					       'tab_sections' => ['contact_tabs'],
				        ],
					],

					[
						'name' => 'tab_contact_office_social_list',
						'label' => esc_html__( 'Office Social List', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::REPEATER,
						'default' => [
							[
								'title' => esc_html__( 'Social #1', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Social #2', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Social #3', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Social #4', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Social #5', 'landing_plugin' ),
							],

						],
						'condition' => [  
					        'tab_sections' => 'contact_tabs',
				        ],
						
						'fields' => [
							[
							   'name' => 'tab_contact_office_social_url',
								'label' => esc_html__( 'Icon', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::URL,
							],
							[
							   'name' => 'tab_contact_office_social_icons',
								'label' => esc_html__( 'Icon', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::ICONS,
								'default' => [
									'value' => 'fa-brands fa-twitter',
									'library' => 'fa-solid',
								],
							],
							
						],

					],
                            
                    [
						'name' => 'tab_slider_list',
						'label' => esc_html__( 'Slider List', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::REPEATER,
						'default' => [
							[
								'title' => esc_html__( 'Slider #1', 'landing_plugin' ),
							],
							[
								'title' => esc_html__( 'Slider #2', 'landing_plugin' ),
							],
							
						],
						'condition' => [  
					        'tab_options' => 'tab_slider_list',
				        ],
						
						'fields' => [
							[
								'name' => 'tab_slider_image',
								'label' => esc_html__( 'Upload Images', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::MEDIA,
								'default' => [
								    'url' => \Elementor\Utils::get_placeholder_image_src(),
								 ],
							],
							[
								'name' => 'tab_slider_title',
								'label' => esc_html__( 'Title', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::TEXT,
								'default' => esc_html__( 'Slider One ','landing_plugin'),
								
							],
							[
								'name' => 'tab_slider_content',
								'label' => esc_html__( 'Slider Content', 'landing_plugin' ),
								'type' => \Elementor\Controls_Manager::WYSIWYG,
								'default' => esc_html__( 'Some representative placeholder content','landing_plugin'),
								
							],

						],

					],
					
				],

				'title_field' => '{{{ tab_title }}}','{{{ tab_slider_title }}}',
				'{{{ tab_contact_office_title }}}','{{{ tab_contact_office_social_list }}}',
			]

		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_style_settings',
			[
				'label' => esc_html__( 'Tab Style Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
          );

		$this->add_control(
			'tab_h2_p_link',
			[
				'label' => esc_html__( 'Heading', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_h2_typography',
				'selector' => '{{WRAPPER}} .profilie-info h2',
			]
		);

		$this->add_control(
			'tab_h2_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .profilie-info h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_p',
			[
				'label' => esc_html__( 'Paragraphy', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_p_typography',
				'selector' => '{{WRAPPER}} .profile-info p',
			]
		);

		$this->add_control(
			'tab_btn',
			[
				'label' => esc_html__( 'Button', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_btn_text_typography',
				'selector' => '{{WRAPPER}} .nav-pills .nav-link',
			]
		);

		$this->add_control(
			'tab_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-pills .nav-link' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'tab_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-pills .nav-link' => 'background: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'tab_btn_text_active_color',
			[
				'label' => esc_html__( 'Active Text Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-pills .nav-link.active' => 'color: {{VALUE}}',
				],
			]
		);


        $this->add_control(
			'tab_btn_text_active_bg_color',
			[
				'label' => esc_html__( 'Active Text Bg Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-pills .nav-link.active' => 'background: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();


	   }

	protected function render() { 
    
    $tabLists = $this->get_settings_for_display('tab_lists');
    $id_int = substr( $this->get_id_int(), 0, 3 );
	?>

    <!-- START-TAB -->
     <div id="pills-tabContent-<?php echo $id_int;?>" class="tabWrapper site-tab-content tab-content">
      <?php 
	    $i=0;
	    foreach( $tabLists as $tab ):
	    $i++;
      ?>
	 <div id="pills-<?php echo strtolower ( $tab['tab_title'] );?>" aria-selected="<?php if( $i==1 ){ echo "true"; } else 
	  { echo "false";}?>" class="tab-pane <?php if( $i==1 ){ echo "show active"; } else{ echo "fade"; }?>">		
		 <div class="row <?php if( 'yes' === $tab['side_rev'] ){ echo 'row_reverse'; }?>">

		  <?php

		   // for right side
           $on_grd_rs = $tab['tab_col_right_s'] == 'col-md-12' ?  'col-md-12' : '';
           $tw_grd_rs = $tab['tab_col_right_s'] == 'col-md-6' ?  'col-md-6' : '';
           $th_grd_rs = $tab['tab_col_right_s'] == 'col-md-4' ?  'col-md-4' : '';
           $fo_grd_rs = $tab['tab_col_right_s'] == 'col-md-3' ?  'col-md-3' : '';
           $fi_tw_grd_rs = $tab['tab_col_right_s'] == 'col-md-5' ?  'col-md-5' : '';
           $se_tw_grd_rs = $tab['tab_col_right_s'] == 'col-md-7' ?  'col-md-7' : '';

           // for left side
           $on_grd_ls = $tab['tab_col_left_s'] == 'col-md-12' ?  'col-md-12' : '';
           $tw_grd_ls = $tab['tab_col_left_s'] == 'col-md-6' ?  'col-md-6' : '';
           $th_grd_ls = $tab['tab_col_left_s'] == 'col-md-4' ?  'col-md-4' : '';
           $fo_grd_ls = $tab['tab_col_left_s'] == 'col-md-3' ?  'col-md-3' : '';
           $fi_tw_grd_ls = $tab['tab_col_left_s'] == 'col-md-5' ?  'col-md-5' : '';
           $se_tw_grd_ls = $tab['tab_col_left_s'] == 'col-md-7' ?  'col-md-7' : '';


           // columns office title
           $th_grd_off_title_col = $tab['office_title_col'] == 'col-md-4' ?  'col-md-4' : '';
           $fo_grd_off_title_col = $tab['office_title_col'] == 'col-md-3' ?  'col-md-3' : '';
           $fi_grd_off_title_col = $tab['office_title_col'] == 'col-md-5' ?  'col-md-5' : '';


           // columns office location list
           $th_grd_loc_col = $tab['office_location_col'] == 'col-md-4' ?  'col-md-4' : '';
           $fo_grd_loc_col = $tab['office_location_col'] == 'col-md-3' ?  'col-md-3' : '';
           $fi_grd_loc_col = $tab['office_location_col'] == 'col-md-5' ?  'col-md-5' : '';
           

           // columns social list
           $th_grd_soc_col = $tab['office_social_col'] == 'col-md-4' ?  'col-md-4' : '';
           $fo_grd_soc_col = $tab['office_social_col'] == 'col-md-3' ?  'col-md-3' : '';
           $fi_grd_soc_col = $tab['office_social_col'] == 'col-md-5' ?  'col-md-5' : '';
   
		   ?>	

		   <div class="<?php echo $on_grd_rs . $tw_grd_rs . $th_grd_rs . $fo_grd_rs . $fi_tw_grd_rs . 
		   $se_tw_grd_rs;?> col-xs-12">
             <?php 
 			 $tabSliderLists = $tab['tab_slider_list'];
             if($tab['tab_options'] == 'tab_slider_list'){ ?>

		       <!-- Slider--> 
				<div id="tabSlider-<?php echo $id_int.$i;?>" class="carousel slide" data-bs-ride="true">
				  <div class="carousel-inner">
				  	<?php 
                     $x=0;
				  	 foreach ( $tabSliderLists as $tabSlider ) { 
                     $x++;
				  	?>
				  	<div class="carousel-item <?php if( $x==1 ){ echo "active"; }?>">
				      <img src="<?php echo esc_url( $tabSlider['tab_slider_image']['url'] )?>" class="d-block w-100" alt="<?php esc_html_e('slider-image','landing_plugin');?>">
				       <div class="carousel-caption d-none d-md-block">
				        <h5> <?php echo esc_html( $tabSlider['tab_slider_title'] );?></h5>
				       <?php echo wpautop( $tabSlider['tab_slider_content'] );?>
				      </div>
				    </div>
				  	<?php } ?>

				  </div>

				  <button class="carousel-control-prev" type="button" data-bs-target="#tabSlider-<?php echo $id_int.$i;?>" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">
				    	<?php esc_html_e('Previous','landing_plugin');?>">
				    </span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#tabSlider-<?php echo $id_int.$i;?>" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">
				    	<?php esc_html_e('Next','landing_plugin');?>">
				    </span>
				  </button>
				</div>

				<?php } elseif($tab['tab_options'] == 'tab_yt_vid'){ ?>

               <!-- Single Youtube & Poster -->
			   <div id="<?php echo $id_int;?>" style="background:url( <?php echo esc_url ( $tab['tab_vid_poster']['url'] )?> );" class="video-poster-bg">				
			   		<div class="profile-video-content-wrapper">				
						<div class="profile-video-content">	
							<a class="fancybox-media video" href="<?php echo esc_url( $tab['tab_yt_vid']['url'] );?>">
								<i class="<?php echo esc_attr( $tab['play_icon']['value'] );?>"></i>
							</a>
						</div><!-- profile-video-content -->										
					</div><!-- profile-video-content-wrapper -->										
				</div><!-- video-poster-bg -->

				<?php } elseif( $tab['tab_options'] == 'tab_single_yt_vid' ){ ?>
                
                <!-- Single Youtube -->
				<div id="<?php echo $id_int;?>" class="embed-video">
                	<iframe title="youtube-video" width="100%" height="400" src="<?php echo esc_url( $tab['tab_single_yt_vid']['url'] );?>" frameborder="0"></iframe>
                </div>

                <?php } elseif( $tab['tab_options'] == 'tab_single_vimeo_vid' ){ ?>

                <!-- Single Vimeo -->
				<div id="<?php echo $id_int;?>" class="embed-video">
                	<iframe title="vimeo-video" width="100%" height="400" 
                	   src="<?php echo esc_url( $tab['tab_single_vimeo_vid']['url'] );?>" frameborder="0">
                	</iframe>
                </div>

                <?php } elseif( $tab['tab_options'] == 'tab_gmap' ){ ?>

             	<!-- Google Map -->

             	<?php

				    if ( empty( $tab['gmap_address'] ) ) {
							return;
						}
					if ( empty( $tab['gmap_height'] ) ) {
							return;
						}
							
					if ( 0 === absint( $tab['gmap_zoom']['size'] ) ) {
							$tab['gmap_zoom']['size'] = 10;
						}

					$api_key = esc_html( get_option( 'gmap_api_key' ) );

					$params = [
							rawurlencode( $tab['gmap_address'] ),
							absint( $tab['gmap_height'] ),
							absint( $tab['gmap_zoom']['size'] ),
						];

					if ( $api_key ) {
							$params[] = $api_key;
							$url = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-43o03x3sAq89stGgFDHVFgqi7wiEuM';
						} else {
							$url = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near';
						}

				?>
					<!-- START-GMAP -->

				   <div id="<?php $id_int;?>" class="map-area">
				       	<div id="gmap" class="gMap">
							<iframe loading="lazy"
								src="<?php echo esc_url( vsprintf( $url, $params ) ); ?>"
								title="<?php echo esc_attr( $tab['gmap_address'] ); ?>"
								aria-label="<?php echo esc_attr( $tab['gmap_address'] ); ?>">	
							</iframe>
						</div>
				    </div>
				<!--map-area -->

				<!-- END-GMAP -->

                <?php } else { ?>

             	<!-- Single Image -->
			    <div id="<?php $id_int;?>" class="video-poster-bg single-image">
			     <img src="<?php echo esc_url ( $tab['tab_single_image']['url'] )?>" class="d-block w-100" alt="<?php esc_html_e('single-image',
			     'landing_plugin');?>">
			    </div>

                <?php } ?>

			</div><!-- /.col-md-7 -->
			<div class="<?php echo $on_grd_ls . $tw_grd_ls . $th_grd_ls . $fo_grd_ls . $fi_tw_grd_ls . $se_tw_grd_ls;?> col-xs-12">	

			<?php if( $tab['tab_sections'] == 'about_tabs' || $tab['tab_sections'] == 'service_tabs' ) { ?>
				<div class="profile-info wow fadeIn">
					<h2 class="profile-info-heading"> 
						<?php echo $tab['tab_heading'];?>
					</h2>
					<hr class="profile-border">							
					<?php echo wpautop( $tab['tab_desc'] );?>	
				</div><!-- profile-info -->	
            <?php } ?>

           </div>

           <?php if( $tab['tab_sections'] == 'contact_tabs' ){ ?>
			<!--for contact section-->
			<div class="<?php echo $fi_grd_off_title_col . $th_grd_off_title_col . $fo_grd_off_title_col;?> col-xs-12">
			  <h1 class="office-info-heading wow fadeIn"> 
				<?php echo $tab['tab_contact_office_heading'];?>	
			  </h1>
			</div>
			<!-- /.col-md-12 -->

            <div class="<?php echo $fi_grd_loc_col . $th_grd_loc_col . $fo_grd_loc_col;?> col-xs-12">
             <div class="office-location-content">	
				<ul class="office-address list-unstyled inline-block">
                <?php 
                  $tabOfficeLocations = $tab['tab_contact_office_list'];
                  foreach( $tabOfficeLocations as $officeLocation ): 
                 ?>
					<li data-toggle="tooltip" data-placement="left">
						<i class="<?php echo $officeLocation['tab_contact_office_icon']['value']?>"></i>
						<span> <?php echo $officeLocation['tab_contact_office_title']?> </span> 
					</li>
	              <?php endforeach; ?>
				</ul><!-- office-address -->
			  </div><!-- office-location-content -->
			</div>
			<!-- /.col-md-12 -->

           <div class="<?php echo $fi_grd_soc_col . $th_grd_soc_col . $fo_grd_soc_col;?> col-xs-12">
	            <h4 class="social-media-heading">
					<?php echo $tab['tab_contact_office_social_title'];?>
			    </h4>
				<ul class="office-social-media list-unstyled list-inline">	
		          <?php
	               $tabOfficeSocials = $tab['tab_contact_office_social_list'];
		           foreach( $tabOfficeSocials as $tabOfficeSocial ):?>
		           <li data-toggle="tooltip">
		            <a href="<?php echo esc_attr($tabOfficeSocial['tab_contact_office_social_url']['url']);?>">
		           <i class="<?php echo $tabOfficeSocial['tab_contact_office_social_icons']['value'];?>"></i>
		            </a>
		           </li>
			      <?php endforeach; ?>
	            </ul><!-- office-social-media -->		
			</div>
			<!-- /.col-md-12 -->
			<?php } ?>	

		</div><!--/.row-->
	</div>

	<?php endforeach;?>

	<!--tab-pane-->	

	<div class="col-md-12 text-right">			
		<ul id="<?php echo $id_int;?>" class="tab-nav nav nav-pills" id="pills-tab" role="tablist">
	        <?php 
			   $i=0;
			   foreach( $tabLists as $tab ):
			   $i++;
		    ?>
	        <li class="nav-item" role="presentation">
				<button class="nav-link <?php if( $i==1 ){echo "active";} else{echo "";}?>" id="pills-<?php echo strtolower ( $tab['tab_title'] );?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo strtolower ( $tab['tab_title'] );?>" type="button" role="tab" aria-controls="pills-<?php echo strtolower ( $tab['tab_title'] );?>" aria-selected="<?php if( $i==1){echo "true";} else { echo "false";}?>">
			     <?php echo $tab['tab_title'];?>
		       </button>
		    </li>
		    <?php endforeach;?>
		</ul><!-- tab-nav -->	
	</div><!-- /.col-md-12 -->
	<!--tab-pane-->	
</div><!-- tabWrapper -->
	<!-- END-TAB -->
    
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

