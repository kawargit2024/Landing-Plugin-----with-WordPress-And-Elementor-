<?php
/**
 * Plugin Name: Landing WordPress Theme Plugin Bundle
 * Plugin URI: http://themeforest.net/user/abushop
 * Description: This is plugin bundle for Landing WordPress Theme.
 * Author: abuShop
 * Author URI: http://themeforest.net/user/abushop
 * Version: 1.0
 */

define('LANDING__FILE__',__FILE__);
define('LANDING_URL', plugins_url('/', LANDING__FILE__) );


function landing_plugins_load(){

	// load plugin localization file
	load_plugin_textdomain('landing_plugin');

	// Load plugin file
	require_once( __DIR__ . '/plugin.php' );
	

	// only file if Kirki Installed
	if(class_exists('Kirki')){
		include 'inc/customizer.php';
	}

	// only file if CMB2 Installed
	if(defined('CMB2_LOADED')){

		// page metabox
		include 'inc/metabox.php';

		// header metabox
		include 'inc/header-metabox.php';

		// footer metabox
		include 'inc/footer-metabox.php';

		// post metabox
		include 'inc/post-metabox.php';

		// header
		include 'inc/header.php';
		
      // footer
		include 'inc/footer.php';

      // portfolio
		include 'inc/portfolio.php';

		// portfolio metabox
		include 'inc/portfolio-metabox.php';
	}
}
add_action('plugins_loaded','landing_plugins_load');


// plugin translation
function landing_plugin_translation(){

// load plugin localization file
   load_plugin_textdomain('landing_plugin', false, dirname( plugin_basename(__FILE__) ) . '/lang/');

} 
add_action('after_setup_theme','landing_plugin_translation');


function landing_plugin_out_of_date(){

	if( !current_user_can('update_plugins')){
	return;
	}

	$file_path = 'elementor/elementor.php';
    $upgrad_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path,'upgrade-plugin_' . $file_path );
    $message = '<p>' .__('Landing Plugin is not working because you are using an old version of Elementor.','landing_plugin') . '</p>';
    $message .= '<p>'. sprintf('<a href="%s" class="">%s</a>', $upgrad_link, __('Update Elementor Now','landing_plugin')) . '</p>' ;

    echo '<div class="error-message">'. $message .'</div>';
} 


// custom widget
include 'inc/flickr-feed.php';
include 'inc/flickr-feed-scripts.php';
include 'inc/elementor-addon.php';




