<?php

/**
 * @link              https://wpdeveloper.net
 * @since             1.0.0
 * @package           Wp_Fomo
 *
 * @wordpress-plugin
 * Plugin Name:       WP Fomo
 * Plugin URI:        https://wpdeveloper.net/wp-fomo
 * Description:       Show fomo notification on your site.
 * Version:           1.0.0
 * Author:            WP Developer
 * Author URI:        https://wpdeveloper.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-fomo
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-fomo-activator.php
 */
function activate_wp_fomo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-fomo-activator.php';
	Wp_Fomo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-fomo-deactivator.php
 */
function deactivate_wp_fomo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-fomo-deactivator.php';
	Wp_Fomo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_fomo' );
register_deactivation_hook( __FILE__, 'deactivate_wp_fomo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-fomo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_fomo() {

	$plugin = new Wp_Fomo();
	$plugin->run();

}
run_wp_fomo();
