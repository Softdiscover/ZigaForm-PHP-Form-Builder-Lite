<?php

class SFM_Admin {

	/**
	 * @var Styles_Font_Menu Pointer to parent/wrapper object.
	 */
	var $plugin;

	/**
	 * @var string Slug for readme at /wp-admin/plugins.php?page=$readme_page_slug
	 */
	var $readme_page_slug = 'styles-font-menu';

	public function __construct( $plugin ) {
		$this->plugin = $plugin;

		// Readme page
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
		add_action( 'admin_menu', array( $this, 'add_readme_page' ) );
		add_action( 'network_admin_menu', array( $this, 'add_readme_page' ) );
	}

	/**
	 * Add additional links to the plugin row
	 * If we're not running as a plugin, this won't do anything,
	 * because plugin_basename won't match any active plugin path.
	 */
	public function plugin_row_meta( $meta, $basename ) {
		if ( $basename == $this->plugin->plugin_basename ) {
			$meta[] = '<a href="' . network_admin_url( 'plugins.php?page=' . $this->readme_page_slug ) . '">How to use this plugin</a>';
		}
		return $meta;
	}

	/**
	 * Display readme and working example in WordPress admin
	 * Does not add a menu item
	 * @link /wp-admin/plugins.php?page=styles-font-menu
	 */
	public function add_readme_page() {
		add_submenu_page( null, 'Font Menu', 'Font Menu', 'manage_options', $this->readme_page_slug, array( $this, 'get_view_readme' ) );
	}

	/**
	 * Display views/readme.php, which modifies readme.md to show a working example.
	 */
	public function get_view_readme() {
		if ( !function_exists( 'Markdown' ) ) {
			require_once dirname( __FILE__ ) . '/markdown/markdown.php';
		}
		$this->plugin->get_view( 'readme' );
	}

}