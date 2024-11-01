<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.briscoweb.com/
 * @since      1.0.0
 *
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/includes
 * @author     Brian Holzberger <bkeith@briscoweb.com>
 */
class Wp_Css_Version_History_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-css-version-history',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
