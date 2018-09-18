<?php
/*
Plugin Name: Styles: Font Menu
Plugin URI: http://github.com/stylesplugin/styles-font-menu
Description: Display an up-to-date menu of Google Fonts. Include it in your own plugins and themes, or install as a plugin for testing and a live demo. Uses the Chosen library to allow menu search and styles.
Version: 1.0.2
Author: Brainstorm Media
Author URI: http://brainstormmedia.com
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Only include library in admin by default. Override with the filter
 *
 * @example add_filter( 'styles_font_menu_include_on_frontend', '__return_true' );
 */

	require_once dirname( __FILE__ ) . '/classes/sfm-plugin.php';

	SFM_Plugin::get_instance();

