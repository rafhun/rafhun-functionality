<?php
/**
 * Plugin Name: Functionality Plugins
 * Plugin URI: https://github.com/rafhun/rafhun-functionality
 * Description: A collection of useful and typical WP optimizations  brought together in one plugin. Comment out everything you do no need to keep your code base clean. Add more partials where needed. Always make sure to keep theme related stuff in the functions.php file of your theme while whole page related stuff should be here. For now there are two plugins in this collection, an editor optimization and a category navigation one. More will follow.
 * Version: 0.1.0
 * Author: rafhun
 * Author URI: https://github.com/rafhun
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: rafhun-functionality
 * Domain Path: /languages
 */

require 'rafhun-functionality-adjacent-category.php';
// require 'rafhun-functionality-custom-post-types.php';
require 'rafhun-functionality-head-cleanup.php';

function rafhun_load_textdomain() {
  load_plugin_textdomain( 'rafhun-functionality', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'rafhun_load_textdomain' );
