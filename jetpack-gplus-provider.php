<?php
/*
 * Plugin Name: Google plus one (+1) button for Sharedaddy (Jetpack)
 * Plugin URI: http://magnetik.org/en/tech/wordpress/english-google-plus-one-1-button-for-sharedaddy-jetpack/
 * Description: Add google plus to sharedaddy (included in jetpack).
 * Author: magnetik
 * Version: 0.2
 * Author URI: http://magnetik.org
 * License: GPL2+
 */
define('JETPACK_GPLUS_PROVIDER_VERSION',0.1);
 
require_once 'jetpack-gplus-provider.class.php';
 
/* Add headers for googe plus button */
// Not such a good way to do this :
add_action('wp_head', array( 'GPlusProvider', 'add_headers' ) );
add_action('admin_head', array( 'GPlusProvider', 'add_headers' ) );

 
/* sharing-sources contain a class that extend "Sharing_Advanced_Source" */
require_once plugin_dir_path( __FILE__ ).'sharing-sources.php';
 
/* Adds a custom service to Sharedaddy */
add_filter( 'sharing_services', array( 'GPlusProvider', 'add_sharing_service' ) );

/* Add CSS for admin */
add_action( 'load-settings_page_sharing', array( 'GPlusProvider', 'add_admin_style' ) );
 
 
 ?>