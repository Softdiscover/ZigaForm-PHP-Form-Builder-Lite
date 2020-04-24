<?php
/**
 * Frontend
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: frontend.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */

if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Default frontend class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Error extends MX_Controller {


	/**
	 * Error::__construct()
	 *
	 * @return
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * Error::index()
	 * Show error page
	 *
	 * @return array
	 */
	public function index() {
		$this->output->set_status_header( '404' );
		$data            = array();
		$data['heading'] = '404 Page Not Found';
		$data['message'] = '<p>The page you requested was not found.</p>';
		$this->load->view( 'error/error', $data );
	}

}
