<?php

/**
 * @link              https://www.briscoweb.com/
 * @since             1.0.9
 * @package           Wp_Css_Version_History
 *
 * @wordpress-plugin
 * Plugin Name:       WP CSS Version History
 * Plugin URI:        https://www.briscoweb.com/wp-css-version-history
 * Description:       A Custom CSS file editor using CSS versioning and CSS post lock for team collaboration
 * Version:           1.0.9
 * Author:            Briscoweb
 * Author URI:        https://www.briscoweb.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-css-version-history
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPCSSVERSIONHISTORY_VERSION', '1.0.9' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-css-version-history-activator.php
 */
function activate_wp_css_version_history() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-css-version-history-activator.php';
	Wp_Css_Version_History_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-css-version-history-deactivator.php
 */
function deactivate_wp_css_version_history() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-css-version-history-deactivator.php';
	Wp_Css_Version_History_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_css_version_history' );
register_deactivation_hook( __FILE__, 'deactivate_wp_css_version_history' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-css-version-history.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.9
 */
function run_wp_css_version_history() {

	$plugin = new Wp_Css_Version_History();
	$plugin->run();

}
run_wp_css_version_history();
