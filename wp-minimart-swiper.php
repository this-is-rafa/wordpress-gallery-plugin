<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.rrdesign.us
 * @since             0.1.0
 * @package           Wp_Minimart_Swiper
 *
 * @wordpress-plugin
 * Plugin Name:       Swiper for Minimart Wordpress theme
 * Plugin URI:        github.com/this-is-rafa/wp-minimart-swiper
 * Description:       Integrate iDangero.us Swiper with Minimart Wordpress theme.
 * Version:           0.1.0
 * Author:            Rafa
 * Author URI:        http://www.rrdesign.us
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-minimart-swiper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-minimart-swiper-activator.php
 */
function activate_Wp_Minimart_Swiper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-minimart-swiper-activator.php';
	Wp_Minimart_Swiper_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-minimart-swiper-deactivator.php
 */
function deactivate_Wp_Minimart_Swiper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-minimart-swiper-deactivator.php';
	Wp_Minimart_Swiper_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Wp_Minimart_Swiper' );
register_deactivation_hook( __FILE__, 'deactivate_Wp_Minimart_Swiper' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-minimart-swiper.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_Wp_Minimart_Swiper() {

	$plugin = new Wp_Minimart_Swiper();
	$plugin->run();

}
run_Wp_Minimart_Swiper();
