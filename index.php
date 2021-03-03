<?php

/**
 * @link              https://itech-softsolutions.com
 * @since             1.0.0
 * @package           Woo Catalog & Enquiry
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Catalog & Enquiry
 * Plugin URI:        
 * Description:       This plugin will hide add to cart button and add equiry button with form
 * Version:           1.0.0
 * Author:            itechtheme 
 * Author URI:        https://itech-softsolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wci
 * Domain Path:       /languages
 */


// If this file is called directly, abort.

if ( ! defined( 'WPINC' ) ) {
  die;
}

// Currently plugin version.

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

// Load Textdomain

class wci{

  	function __construct() {
    	add_action( 'plugins_loaded', array( $this,'load_textdomain' ) );
  	}

  	function load_textdomain() {
    	load_plugin_textdomain( 'wci', true, plugin_dir_url( __FILE__ ) . "/languages" );
  	}
}

new wci();

// Settings Tab

require plugin_dir_path( __FILE__ ) . 'inc/settings.php';

// Remove Add to Cart Button

require plugin_dir_path( __FILE__ ) . 'inc/remove-cart.php';

// Display Button and Echo CF7
 
require plugin_dir_path( __FILE__ ) . 'inc/form.php';

// Load Style
 
require plugin_dir_path( __FILE__ ) . 'inc/style.php';

/* Activation */

require_once plugin_dir_path( __FILE__ ) . 'lib/class-tgm-plugin-activation.php';

function wci_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
		),

	);

	$config = array(
		'id'           => 'wci',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'wci_register_required_plugins' );
