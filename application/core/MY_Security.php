<?php ( defined( 'BASEPATH' ) ) or exit( 'No direct script access allowed' );


/**
 * CodeIgniter version 2
 * Note: Put this on your application/core folder
 */

class MY_Security extends CI_Security {

	/**
	 * Method: __construct();
	 * magic
	 */
	function __construct() {
		parent::__construct();
	}

	function xss_clean( $str, $is_image = false ) {
		$bypass = false;

		/**
		 * By pass controllers set in /application/config/config.php
		 * config.php
		 * $config['xss_exclude_uris'] = array('controller/method')
		 */

		$config = new CI_Config();
		$uri    = new CI_URI();
		$uri->_fetch_uri_string();
		$uri->_explode_segments();

		$controllers_list = $config->item( 'xss_exclude_uris' );

		// we need controller class and method only
		if ( ! empty( $controllers_list ) ) {
			$segments = array(
				0 => null,
				1 => null,
			);
			$segments = $uri->segment_array();

			if ( ! empty( $segments ) ) {
				if ( ! empty( $segments[2] ) ) {
					$action = $segments[0] . '/' . $segments[1] . '/' . $segments[2];
				} elseif ( ! empty( $segments[1] ) ) {
					$action = $segments[0] . '/' . $segments[1];
				} else {
					$action = $segments[0];
				}

				if ( in_array( $action, $controllers_list ) ) {
					$bypass = true;
				}
			}

			// we unset the variable
			unset( $config );
			unset( $uri );
		}

		if ( $bypass ) {
			return $str;
		} else {
			return parent::xss_clean( $str, $is_image );
		}
	}

}
