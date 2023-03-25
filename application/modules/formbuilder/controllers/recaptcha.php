<?php

/**
 * Recaptcha
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: intranet.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      http://php-form-builder.uiform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Estimator intranet class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://php-form-builder.uiform.com/
 */
class Recaptcha extends BackendController {
	/**
	 * max number of forms in order show by pagination
	 *
	 * @var int
	 */

	const VERSION = '0.1';

	/**
	 * name of form estimator table
	 *
	 * @var string
	 */
	private $model_fields = '';

	/**
	 * Recaptcha::__construct()
	 *
	 * @return
	 */
	function __construct() {
		parent::__construct();
		$this->load->language_alt( model_settings::$db_config['language'] );
		$this->template->set( 'controller', $this );
		$this->load->model( 'model_fields' );
	}

	/**
	 * Recaptcha::front_verify_recaptcha()
	 *
	 * @return
	 */
	public function front_verify_recaptcha() {
		require_once FCPATH . 'libs/recaptcha2/appengine-https.php';
		require_once FCPATH . 'libs/recaptcha2/autoload.php';

		$uid_field = ( isset( $_POST['rockfm-uid-field'] ) ) ? Uiform_Form_Helper::sanitizeInput( $_POST['rockfm-uid-field'] ) : '';
		$form_id   = ( isset( $_POST['form_id'] ) ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_id'] ) : 0;
		$fmf_json  = $this->model_fields->getDataByUniqueId( $uid_field, $form_id );
		$secret    = '';
		$success   = false;
		if ( ! empty( $fmf_json ) ) {
			$fmf_data = json_decode( $fmf_json->fmf_data, true );

			$secret  = ( isset( $fmf_data['input5']['g_key_secret'] ) ) ? $fmf_data['input5']['g_key_secret'] : '';
			$siteKey = ( isset( $fmf_data['input5']['g_key_public'] ) ) ? $fmf_data['input5']['g_key_public'] : '';

			if ( $siteKey === '' || $secret === '' ) {

			} elseif ( isset( $_POST['rockfm-code-recaptcha'] ) ) {

				$recaptcha = new \ReCaptcha\ReCaptcha( $secret );

				// If file_get_contents() is locked down on your PHP installation to disallow
				// its use with URLs, then you can use the alternative request method instead.
				// This makes use of fsockopen() instead.
				// $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost());
				// Make the call to verify the response and also pass the user's IP address
				$resp = $recaptcha->setExpectedHostname( $_SERVER['SERVER_NAME'] )
								  ->verify( $_POST['rockfm-code-recaptcha'], $_SERVER['REMOTE_ADDR'] );

				if ( $resp->isSuccess() ) :
					$success = true;
				else :
					$success = false;
				endif;

				// in case false, using method 2 to get validation
				if ( $success === false ) {
					if ( is_callable( 'curl_init' ) ) {
						$recaptcha = new \ReCaptcha\ReCaptcha( $secret, new \ReCaptcha\RequestMethod\CurlPost() );

						$resp = $recaptcha->setExpectedHostname( $_SERVER['SERVER_NAME'] )
								  ->verify( $_POST['rockfm-code-recaptcha'], $_SERVER['REMOTE_ADDR'] );
						if ( $resp->isSuccess() ) :
							$success = true;
						else :
							$success = false;
						endif;

					}
				}
			} else {

			}
		}

		$json            = array();
		$json['success'] = $success;
		// return data to ajax callback
		header( 'Content-Type: application/json' );
		echo json_encode( $json );
		die();
	}

}
