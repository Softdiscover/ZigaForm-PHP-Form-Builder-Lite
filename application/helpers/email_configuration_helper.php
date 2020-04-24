<?php
/**
 * Email Configuration
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: email_configuration_helper.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

if ( ! function_exists( 'emailConfiguration' ) ) {
	/**
	 * Set email configuration
	 *
	 * @param int $type type of email configuration
	 *
	 * @return array
	 */
	function emailConfiguration( $type ) {
		$config = array();
		switch ( $type ) {
			case 2:
				$config = array(
					'protocol'     => 'smtp',
					'smtp_host'    => model_settings::$db_config['smtp_host'],
					'smtp_port'    => model_settings::$db_config['smtp_port'],
					'smtp_user'    => model_settings::$db_config['smtp_user'],
					'smtp_pass'    => model_settings::$db_config['smtp_pass'],
					'smtp_timeout' => 30,
					'mailtype'     => 'html',
					'charset'      => 'utf-8',
					'crlf'         => "\r\n",
					'newline'      => "\r\n",
					'wordwrap'     => true,
				);
				break;
			case 3:
				$config = array(
					'protocol' => 'sendmail',
					'mailpath' => model_settings::$db_config['sendmail_path'],
					'charset'  => 'utf-8',
					'wordwrap' => true,
					'mailtype' => 'html',
					'newline'  => "\r\n",
				);
				break;
		}

		return $config;
	}
}
