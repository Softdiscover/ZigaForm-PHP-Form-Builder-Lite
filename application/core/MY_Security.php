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

	/**
	 * Handle a failed CSRF check.
	 *
	 * CodeIgniter's default is show_error('The action you have requested is not
	 * allowed.'), a bare error page. On the login form that fires for an ordinary
	 * reason -- the page was restored from the browser cache or left open past
	 * csrf_expire (2h), so it posts a token older than the cookie -- and it looks
	 * to the user like the site crashed. Signing in again always works.
	 *
	 * Auth routes are sent back to the login form with an explanatory flash
	 * instead. Everything else keeps the default hard failure.
	 *
	 * @return void
	 */
	public function csrf_show_error() {
		// csrf_verify() runs from CI_Input's constructor, before the URI class is
		// usable, so match on the raw request path rather than uri->segment().
		$path = isset( $_SERVER['REQUEST_URI'] ) ? strtolower( (string) $_SERVER['REQUEST_URI'] ) : '';

		$is_auth_route = ( false !== strpos( $path, '/intranet/authenticate' )
			|| false !== strpos( $path, '/intranet/login' )
			|| false !== strpos( $path, '/intranet/recoverpass' ) );

		if ( $is_auth_route ) {
			$base = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '';
			// TLS terminates at the proxy, so $_SERVER['HTTPS'] is unset here and
			// a naive check would redirect an https login to http.
			$forwarded = isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ? strtolower( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) : '';
			$scheme    = ( 'https' === $forwarded
				|| ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== strtolower( $_SERVER['HTTPS'] ) )
				|| ( isset( $_SERVER['SERVER_PORT'] ) && '443' === (string) $_SERVER['SERVER_PORT'] ) ) ? 'https' : 'http';
			header( 'Cache-Control: no-store, no-cache, must-revalidate, max-age=0' );
			header( 'Location: ' . $scheme . '://' . $base . '/index.php/default/intranet/login?expired=1', true, 302 );
			exit;
		}

		parent::csrf_show_error();
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
