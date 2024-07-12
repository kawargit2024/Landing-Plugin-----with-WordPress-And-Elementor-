<?php

class Landing_Portfolio extends \Elementor\Widget_Base {

	public function get_name() {
		return 'landing-portfolio';
	}

	public function get_script_depends() {
		return [ 'jquery-isotope','imagesloaded'];
	}

	public function get_title() {
		return esc_html__( 'Landing Portfolio', 'landing_plugin' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'landing-wp' ];
	}

	public function get_keywords() {
		return [ 'work', 'portfolio' ];
	}

   
   protected function register_controls() {

   $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Portfolio Settings', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );

    $this->add_control(
			'filters',
			[
				'label' => esc_html__( 'All Filters', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'All', 'landing_plugin' ),
				
			]
	);


	$this->add_control(
			'port_icon',
			[
				'label' => esc_html__( 'Single Item Icon', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-image',
					'library' => 'fa-solid',
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


	$this->add_control(
			'items_qty',
			[
				'label' => esc_html__( 'No of Items Show', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 8,
			]
		);

	$this->add_control(
			'item_grid',
			[
				'label' => esc_html__( 'Item Columns', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'3' => esc_html__( '3 Columns', 'landing_plugin' ),
					'4' => esc_html__( '4 Columns', 'landing_plugin' ),
					'2' => esc_html__( '2 Columns', 'landing_plugin' ),
				],
				
			]
		);

    $this->add_control(
			'item_blog_cat',
			[
				'label' => esc_html__( 'Sort By Porfolio Category', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'landing_plugin' ),
				'label_off' => esc_html__( 'Hide', 'landing_plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
	);

	$this->add_control(
			'item_sort_by_cat',
			[
				'label' => esc_html__( 'Item Category Display', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => portfolio_terms_list(),
				'condition' => [ 
					'item_blog_cat' => 'yes',
				 ],
			]
		);

   $this->end_controls_section();

   $this->start_controls_section(
			'filter_style_content_section',
			[
				'label' => esc_html__( 'Filter Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );


   $this->add_responsive_control(
			'portfolio_filter_alighment',
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
					'{{WRAPPER}} .work-menu' => 'text-align: {{VALUE}};',
				],
			]
		);

   $this->add_responsive_control(
			'portfolio_filter_margin',
			[
				'label' => esc_html__( 'Margin', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 0,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .work-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

   $this->add_responsive_control(
			'portfolio_filter_pad',
			[
				'label' => esc_html__( 'Padding', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 10,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .work-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

   $this->add_control(
			'portfolio_filter_bg_color',
			[
				'label' => esc_html__( 'BG Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-menu' => 'background: {{VALUE}}',
				],
			]
		);

    $this->end_controls_section();

    $this->start_controls_section(
			'filter_list_style_content_section',
			[
				'label' => esc_html__( 'Filter List Item Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );

    
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'filter_list_style_typo',
				'selector' => '{{WRAPPER}} .work-menu li a',
			]
		);


		$this->add_responsive_control(
			'portfolio_filter_list_pad',
			[
				'label' => esc_html__( 'Padding', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 7,
					'right' => 25,
					'bottom' => 7,
					'left' => 25,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .work-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'portfolio_filter_list_mar',
			[
				'label' => esc_html__( 'Margin', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 0,
					'right' => 5,
					'bottom' => 0,
					'left' => 5,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .work-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'portfolio_filter_list_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-menu li a' => 'color: {{VALUE}}',
				],
			]
		);

    $this->add_control(
			'portfolio_filter_list_color_hover',
			[
				'label' => esc_html__( 'Hover Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-menu li a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'portfolio_filter_list_border_hover',
				'selector' => '{{WRAPPER}} .work-menu li a:hover',
			]
		);

    $this->add_control(
			'portfolio_filter_list_color_active',
			[
				'label' => esc_html__( 'Active Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-menu li a.selected' => 'color: {{VALUE}}',
				],
			]
		);

   
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'portfolio_filter_list_border_selected',
				'selector' => '{{WRAPPER}} .work-menu li a.selected',
			]
		);

    $this->end_controls_section();

    $this->start_controls_section(
			'item_style_content_section',
			[
				'label' => esc_html__( 'Item Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );

		$this->add_responsive_control(
					'portfolio_item_padding',
					[
						'label' => esc_html__( 'Padding', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
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
							'size' => 15,
						],
						'selectors' => [
							'{{WRAPPER}} .element-item' => 'padding: {{SIZE}}{{UNIT}};',
						],
					]
				);

		 $this->add_control(
			'portfolio_item_overlay_bg_color',
			[
				'label' => esc_html__( 'Item BG Overlay Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} figure.single-work-item-wrapper:after' => 'background: {{VALUE}}',
				],
			]
		);

		 $this->add_responsive_control(
					'portfolio_item_overlay_opacity',
					[
						'label' => esc_html__( 'Opacity', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
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
							'unit' => '%',
							'size' => 0,
						],
						'selectors' => [
							'{{WRAPPER}} figure.single-work-item-wrapper:after' => 'opacity: {{SIZE}}{{UNIT}};',
						],
					]
				);


		 $this->add_responsive_control(
					'portfolio_item_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
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
							'{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

		 $this->add_responsive_control(
					'portfolio_item_overlay_opacity_hover',
					[
						'label' => esc_html__( 'Opacity On Hover', 'landing_plugin' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					  ],

						'selectors' => [
							'{{WRAPPER}} figure.single-work-item-wrapper:after:after' => 'opacity: {{SIZE}}{{UNIT}};',
						],
					]
				);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'portfolio_item_css_filters',
				'selector' => '{{WRAPPER}} figure.single-work-item-wrapper >img',
			]
		);
    
    $this->end_controls_section();

    
		$this->start_controls_section(
			'caption_title_style_content_section',
			[
				'label' => esc_html__( 'Caption Title Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );

    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'caption_title_typo',
				'selector' => '{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption h6',
			]
		);

     $this->add_control(
			'caption_title_style_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption h6' => 'color: {{VALUE}}',
				],
			]
		);

     $this->add_control(
			'caption_title_style_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption h6' => 'background: {{VALUE}}',
				],
			]
		);

     $this->end_controls_section();


		$this->start_controls_section(
			'cat_title_style_content_section',
			[
				'label' => esc_html__( 'Category Title Style', 'landing_plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );

    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_title_typo',
				'default' => 'cat_title_typo',
				'selector' => '{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption ul li p.item-cat.post-cat-title',
			]
		);

     $this->add_control(
			'caption_title_style_color',
			[
				'label' => esc_html__( 'Color', 'landing_plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} figure.single-work-item-wrapper figcaption.image-caption ul li p.item-cat.post-cat-title' => 'color: {{VALUE}}',
				],
			]
		);

     $this->end_controls_section();


	}

	protected function render() { 
    
    $settings = $this->get_settings_for_display();

      $portfolio_tax = 'portfolio_category';
	  $portfolio_term_filter_lists =  get_terms( $portfolio_tax );

	?>

	    <!--ajax work  will shown here-->
			<div id="workslist clear">
				<div class="worksajax main-wrapper clearfix"></div>
			</div> 
		   <!--end ajax work will shown here-->	

    <!-- START-PORTFOLIO -->

				<ul class="work-menu list-unstyled">
						<?php
                            if( ! empty( $portfolio_term_filter_lists )  && ! is_wp_error( $portfolio_term_filter_lists ) ):
						?>                     
						<li title="All">
							<a href="#" data-filter="*" class="selected">
							 <?php 

                              if( $settings['filters'] ){
                                echo $settings['filters'];
                              } else{                              
                                echo esc_html_e( 'All' );
                              }

							 ?>
							</a>
						</li>

                        <?php foreach( $portfolio_term_filter_lists as $filter_list ): ?>

					    <li title="<?php echo esc_html ( $filter_list->name );?>"> 
					      <a href="#" data-filter=".<?php echo esc_attr ( $filter_list->slug );?>"> <?php echo $filter_list->name;?> </a>
					    </li>

						<?php endforeach;
					     endif;
					     ?>
				</ul><!-- work-menu -->						  
			 <div class="project-items">
             <?php

               if($settings['item_sort_by_cat'] === 'yes'){

               	 $portWork = new WP_Query( array(
                  'posts_per_page'  => $settings['items_qty'],
                  'post_type' => 'portfolio',                    
                ) );

               } else{

               	 $portWork = new WP_Query( array(
                  'posts_per_page'  => $settings['items_qty'],
                  'post_type' => 'portfolio',                    
                ) );

               } 

              
               while( $portWork->have_posts( ) ) : $portWork->the_post( );
               	global $post;
             ?>
			<div id="post-<?php the_ID();?>" class="
				<?php 
				     if($settings['item_grid'] == '4'){
                         echo 'col-md-3';
                    } elseif($settings['item_grid'] == '2'){
                         echo 'col-md-6';
				     } else{
				     	echo 'col-md-4';
				     }
				?> element-item <?php $port_item_term_lists = get_the_terms(get_the_ID(), $portfolio_tax);
                 if( is_array( $port_item_term_lists ) && count( $port_item_term_lists ) > 0 ){

                 	foreach($port_item_term_lists as $item_term_list){
                      echo preg_replace( '/[^a-zA-Z]+/','-', $item_term_list->slug ) .' ';
                 	}

                    $item_classes = get_post_class();
                    foreach($item_classes as $item_class){
                      echo esc_attr($item_class . " ");
                    }

                 }?>">					
				<figure class="single-work-item-wrapper" data-link="<?php the_permalink();?>">
					<img class="img-responsive" src="<?php echo esc_url ( get_the_post_thumbnail_url() );?>" alt="<?php esc_html_e('post-image','landing_plugin');?>" />
					<figcaption class="image-caption">
						<h6 class="work-title"> <?php echo the_title();?> </h6>
							<ul class="list-unstyled">
								<li>
									<p class="item-cat post-cat-title">
										<strong> <?php 

                      $portfolio_tax = 'portfolio_category';
                      $post_cats =  wp_get_post_terms($post->ID, $portfolio_tax);
                        $item_cats=[];
                      foreach($post_cats as $post_cat){
											$item_cats[] = $post_cat->name;
                            }

                        echo implode(', ', $item_cats);

									?> </strong>
								    </p>
								</li>
								<li>
									<a class="work-link" href="#" data-link="<?php the_permalink();?>">
									   <i class="<?php echo esc_attr ( $settings['port_icon']['value'] );?>"></i> 
								  </a>
							  </li>
							</ul>
					</figcaption><!-- figcaption -->			
				</figure><!-- figure -->				
			</div><!--/.col-md-4 -->

			<?php endwhile;
             wp_reset_query();
		    ?>			
			</div><!-- project-items -->																												
	    <!-- END-PORTFOLIO -->


	<script>
    (function($) {
		"use strict";

		jQuery(document).ready( function(){

			 /*---------- WORK-AJAX-SETTING -------*/

	   var singleWorkItem = $('.single-work-item-wrapper,.work-link'); 
	   var workAjaxContent = $('.worksajax'); 	   
	   singleWorkItem.on('click', function() {
		   var toLoad = $(this).attr('data-link') + ' .worksajax > *';
		   workAjaxContent.slideUp('slow',loadContent);
		   function loadContent(){
			   workAjaxContent.load(toLoad, '', showNewContent)
			 
		 }
		 
		 function showNewContent(){
			 $.getScript('<?php echo get_template_directory_uri().'/assets/js/work.js' ?>'); 
			 workAjaxContent.slideDown('slow'); 				  
		 }
		 
		 return false;

         });

	/*--------- ISOTOPE SETTING -------------*/

		var $container = $('.project-items');		
			$container.imagesLoaded(function(){
			$container.isotope();

		});
 

    /*------- WORK-FILTER ------------*/

	 var workFilterMenuAnchor = $('.work-menu li a'); 	 
	 var workGridItem = '.element-item'; 	 
	 workFilterMenuAnchor.on('click', function() {		 
     workFilterMenuAnchor.removeClass('selected');        
	 $(this).addClass('selected');
	 
	 var selector = $(this).attr('data-filter');	
	 $container.isotope({
		 itemSelector: workGridItem,
		 filter: selector,
		 animationOptions: {
			 duration: 5000,
			 easing: 'easeInOutExpo',
			 queue: false
            }
        });
        return false;
		
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