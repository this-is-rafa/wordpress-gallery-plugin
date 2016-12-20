<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.rrdesign.us
 * @since      0.1.0
 *
 * @package    Wp_Minimart_Swiper
 * @subpackage Wp_Minimart_Swiper/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.0
 * @package    Wp_Minimart_Swiper
 * @subpackage Wp_Minimart_Swiper/includes
 * @author     Rafa <rafael@rrdesign.us>
 */
class Wp_Minimart_Swiper_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-minimart-swiper',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
