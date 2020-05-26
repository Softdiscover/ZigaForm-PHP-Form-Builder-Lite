<?php  if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}

class MY_Input extends CI_Input {

	function _sanitize_globals() {
		$ignore_csrf = config_item( 'csrf_ignore' );

		if ( is_array( $ignore_csrf ) && count( $ignore_csrf ) ) {
			global $URI,$RTR;
			$haystack = $URI->uri_string();

			foreach ( $ignore_csrf as $needle ) {
				if ( strlen( $haystack ) >= strlen( $needle ) && substr( $haystack, 0, strlen( $needle ) ) == $needle ) {
					$this->_enable_csrf = false;
					$RTR->config->set_item( 'csrf_protection', false );
					break;
				}
			}
		}

		parent::_sanitize_globals();
	}
}
/* EOF: MY_Input */
