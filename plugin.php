<?php

namespace LandingPlugin;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class Landing {


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Elementor_Test_Addon\Plugin The single instance of the class.
	 */
	 private static $_instance = null;

	/**
	 * Instance
	*/
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/*
	 * Constructor
	*/
	public function __construct() {
		//$this->register_widgets_scripts();
		add_action( 'elementor/init', [ $this, 'include_widgets' ] );
        add_action( 'elementor/frontend/after_register_scripts',[ $this,'loading_widgets_scripts'] );
	}



	public function include_widgets(){
		$this->include_widgets_file();
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		//add_action( 'elementor/frontend/after_register_scripts',[ $this,'register_widgets_scripts'] );
		add_action( 'elementor/frontend/after_enqueue_styles',[ $this,'loading_widgets_style'] );
       // add_action( 'wp_enqueue_scripts', [ $this, 'register_widgets_scripts' ] );

	}



	/*
	 * Register Widgets Style
	*/

	function loading_widgets_style() {
		wp_enqueue_style('landing-plugin-style', LANDING_URL . 'widgets/css/style.css', array(), '', 'all');
   }



    /*
	 * Register Widgets Scripts
	*/
	public function loading_widgets_scripts(){

	     wp_register_script('landing-carousel',LANDING_URL .'widgets/js/owl-carousel.min.js', array('jquery'), null, true);
		 wp_register_script('landing-ticker', LANDING_URL . 'widgets/js/ticker.js', array('jquery'), null, true);
	     wp_register_script('landing-fontawesome', LANDING_URL . 'widgets/js/all.min.js', array('jquery'), null, true);
	     wp_register_script('jquery-isotope', LANDING_URL . 'widgets/js/isotope.pkgd.min.js', array('jquery'), null, true);
	     wp_register_script('jquery-imagesloaded', LANDING_URL . 'widgets/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	     wp_register_script('jquery-gmap3', LANDING_URL . 'widgets/js/gmap3.min.js', array('jquery'), null, true);
	     wp_register_script('jquery-fancybox', LANDING_URL . 'inc/js/jquery.fancybox.js', array('jquery'), null, true);

        wp_enqueue_script('landing-carousel');
        wp_enqueue_script('landing-ticker');
        wp_enqueue_script('landing-fontawesome');
        wp_enqueue_script('jquery-isotope');
        wp_enqueue_script('jquery-imagesloaded');
        wp_enqueue_script('jquery-gmap3');
        wp_enqueue_script('jquery-fancybox');
	}

     /**
	 * theme style
	//  *
	//  */
	// public function techvantage_style_loading() {
    //     wp_enqueue_style( 'owl-carousel-style', TECHVANTAGE_URL . 'assets/css/owl-carousel.min.css', '__FILE__');
   
	// }


    //  /**
	//  * theme script 
	//  *
	//  */
	// public function techvantage_scripts_loading() {
    //     wp_enqueue_script( 'slider-js', TECHVANTAGE_URL . 'assets/js/slider.js', array('jquery'),'',true);
    //     wp_enqueue_script( 'owl-carousel-scripts', TECHVANTAGE_URL . 'assets/js/owl-carousel.min.js', array('jquery'),'',true);
	// }

    // add_action( 'elementor/frontend/after_register_scripts', function() { 
	//      wp_enqueue_script('jquery-fancybox', LANDING_URL . 'inc/js/jquery.fancybox.js', array('jquery'), null, true);
	//     });


	

    /*
	 * Include Widgets
	*/
    public function include_widgets_file(){

    // include files
	  require_once( __DIR__ . '/widgets/hero-banner.php' );
	  require_once( __DIR__ . '/widgets/hero-carousel.php' );
	  require_once( __DIR__ . '/widgets/portfolio.php' );
	  require_once( __DIR__ . '/widgets/hero-yt-video.php' );
	  require_once( __DIR__ . '/widgets/team-member.php' );
	  require_once( __DIR__ . '/widgets/section-title.php' );
	  require_once( __DIR__ . '/widgets/slogan-slider.php' );
	  require_once( __DIR__ . '/widgets/testimonial.php' );
	  require_once( __DIR__ . '/widgets/tabs.php' );
     require_once( __DIR__ . '/widgets/goolge-map.php' );
     require_once( __DIR__ . '/widgets/pricing-table.php' );
     require_once( __DIR__ . '/widgets/brand-logo.php' );
     require_once( __DIR__ . '/widgets/button.php' );
     }


	/*
	 * Register Widgets
	*/
	public function register_widgets( $widgets_manager ) {
     
     // register file class
	   $widgets_manager->register( new \Landing_Hero_Banner() );
	   $widgets_manager->register( new \Landing_Carousel_Slider() );
	   $widgets_manager->register( new \Landing_Portfolio() );
	   $widgets_manager->register( new \Landing_Hero_YT_Video() );
      $widgets_manager->register( new \Landing_Team_Member() );
      $widgets_manager->register( new \Landing_Section_Title() );
      $widgets_manager->register( new \Landing_Slogan_Slider() );
      $widgets_manager->register( new \Landing_Pricing_Table() );
      $widgets_manager->register( new \Landing_Brand_Carousel() );
      $widgets_manager->register( new \Testimonial_Slider() ); 
      $widgets_manager->register( new \Landing_Button() );
      $widgets_manager->register( new \Landing_Tabs() );
      $widgets_manager->register( new \Landing_Google_Map() );
	}

}
\LandingPlugin\Landing::instance();

