<?php

class Landing_Team_Member extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team-member';
	}

	public function get_title() {
		return esc_html__( 'Landing Team', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'landing', 'team' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Team Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );


   $this->add_control(
		'team_img',
		[
			'label' => esc_html__( 'Image', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			],	
		]
	);



  	$this->add_control(
		'team_name',
		[
			'label' => esc_html__( 'Name', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Belly', 'landing_plugin' ),				
		]
	);

	$this->add_control(
		'team_designa',
		[
			'label' => esc_html__( 'Designation', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( ' UI/UX Designer ', 'landing_plugin' ),				
		]
	);


	$this->add_control(
		'team_profa',
		[
			'label' => esc_html__( 'View Profile', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'view profile', 'landing_plugin' ),				
		]
	);


	$this->end_controls_section();

   $this->start_controls_section(
			'style_section_sh',
			[
				'label' => esc_html__( 'Team Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
	);


   $this->add_control(
			'name_title_stl',
			[
				'label' => esc_html__( 'Name Title Style ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);

   $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_name_typo',
				'selector' => '{{WRAPPER}} .title-caption h4',
			]
	);

   $this->add_control(
		'name_title_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title-caption h4' => 'color: {{VALUE}}',
			],
		]
	);

   $this->add_control(
		'cap_bg_color',
		[
			'label' => esc_html__( 'Caption BG Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title-caption' => 'background-color: {{VALUE}}',
			],
		]
	);


   $this->add_control(
			'designa_stl',
			[
				'label' => esc_html__( 'Designation Style ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
	);


    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_designa_typo',
				'selector' => '{{WRAPPER}} .title-caption p',
			]
	);


	$this->add_control(
		'designa_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title-caption p' => 'color: {{VALUE}}',
			],
		]
	);
    

    $this->add_control(
			'profile_stl',
			[
				'label' => esc_html__( 'Profile Style ', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',

			]
	);


	 $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_profile_typo',
				'selector' => '{{WRAPPER}} .profile-caption h4',
			]
	);


	$this->add_control(
		'profile_color',
		[
			'label' => esc_html__( 'Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .profile-caption h4' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_control(
		'profile_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'landing_plugin' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .profile-caption' => 'background-color: {{VALUE}}',
			],
		]
	);


    $this->end_controls_section();


   }


	protected function render() { 
    
    $settings = $this->get_settings_for_display();

	?>


  		<!-- START TEAM -->
	
	    <figure class="single-team-item-wrapper">	
	         <?php if($settings['team_img']["url"]):?>				  
			    <img class="img-responsive" src="<?php 
			       echo esc_url ( $settings['team_img']["url"] );?>" alt="__e('team image','landing_plugin');" />
             <?php endif;?>
				<figcaption class="single-team-item-caption">	
                     <div class="title-caption">

                        <?php if( $settings['team_name'] ):?>	
						   <h4> <?php echo wp_kses_post($settings['team_name'] );?> </h4>
 						<?php endif;?>

						<?php if( $settings['team_designa'] ):?>	
						   <p><?php echo wp_kses_post($settings['team_designa'] );?></p>
						<?php endif;?> 	

					</div><!--title-caption-->
					 <div class="profile-caption">	
                       <?php if( $settings['team_profa'] ):?>	
						 <h4> <?php echo wp_kses_post( $settings['team_profa'] );?> </h4>
                       <?php endif;?> 	
					</div><!--profile-caption-->									
				</figcaption><!--single-team-item-caption-->
		</figure>	<!--single-team-item-wrapper-->

	
		<!-- END TEAM -->

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