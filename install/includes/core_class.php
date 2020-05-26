<?php
/**
 * Core class
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: core_class.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */


/**
 * Core class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */

class Core {

	/**
	 * Core::validatePost()
	 * Function to validate the post data
	 *
	 * @param array $data information
	 *
	 * @return array
	 */
	function validatePost( $data ) {
		$error_messages = array();
		if ( empty( $data['mysqlhostname'] ) ) {
			$error_messages[] = 'mysql hosttname is required';
		}
		if ( empty( $data['mysqlusername'] ) ) {
			$error_messages[] = 'mysql username is required';
		}
		/*
		 if(empty($data['mysqlpassword'])){
		  $error_messages[]='mysql password is required';
		  } */
		if ( empty( $data['mysqldbname'] ) ) {
			$error_messages[] = 'mysql database name is required';
		}

		return $error_messages;
	}

	/**
	 * Core::validatePost2()
	 * Function to validate the post data
	 *
	 * @param array $data information
	 *
	 * @return array
	 */
	function validatePost2( $data ) {
		$error_messages = array();
		if ( empty( $data['company_name'] ) ) {
			$error_messages[] = 'Company name is required';
		}
		if ( empty( $data['site_email'] ) ) {
			$error_messages[] = 'Site email is required';
		}
		if ( ! empty( $data['site_email'] ) && ! ( preg_match( '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $data['site_email'] ) ) ) {
			$error_messages[] = 'Site email is no valid';
		}
		if ( empty( $data['username'] ) ) {
			$error_messages[] = 'Admin username is required';
		}
		if ( empty( $data['password'] ) ) {
			$error_messages[] = 'Admin password is required';
		}
		if ( empty( $data['repassword'] ) ) {
			$error_messages[] = 'Admin password confirmation is required';
		}
		if ( ! empty( $data['password'] ) && ! empty( $data['repassword'] ) && $data['password'] != $data['repassword'] ) {
			$error_messages[] = 'Entered passwords do not match';
		}
		return $error_messages;
	}



	/**
	 * Core::writeConfig()
	 * Function to write the config file
	 *
	 * @param array $data information
	 *
	 * @return array
	 */
	function writeDBConfig( $data ) {
		// Config path
		$template_path = 'config/database.php';
		$output_path   = '../application/config/database.php';

		// Open the file
		$database_file = file_get_contents( $template_path );

		$new = str_replace( '%HOSTNAME%', $data['mysqlhostname'], $database_file );
		$new = str_replace( '%USERNAME%', $data['mysqlusername'], $new );
		$new = str_replace( '%PASSWORD%', $data['mysqlpassword'], $new );
		$new = str_replace( '%DATABASE%', $data['mysqldbname'], $new );

		if ( isset( $data['mysqldbdriver'] ) && intval( $data['mysqldbdriver'] ) === 1 && extension_loaded( 'mysql' ) ) {
				$new = str_replace( '%DBDRIVER%', 'mysql', $new );
		} elseif ( function_exists( 'mysqli_init' ) && extension_loaded( 'mysqli' ) ) {
			$new = str_replace( '%DBDRIVER%', 'mysqli', $new );
		} else {

		}

		// Write the new database.php file
		$handle = fopen( $output_path, 'w+' );

		// Chmod the file, in case the user forgot
		@chmod( $output_path, 0755 );

		// Verify file permissions
		if ( is_writable( $output_path ) ) {

			// Write the file
			if ( fwrite( $handle, $new ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	/**
	 * Core::writeConfig()
	 * Function to write the config file
	 *
	 * @param array $data information
	 *
	 * @return array
	 */
	function writeIndexFile() {
		// Config path
		$template_path = 'config/index.php';
		$output_path   = '../index.php';

		// Open the file
		$index_file = file_get_contents( $template_path );

		// Write the new database.php file
		$handle = fopen( $output_path, 'w+' );

		// Chmod the file, in case the user forgot
		@chmod( $output_path, 0755 );

		// Verify file permissions
		if ( is_writable( $output_path ) ) {

			// Write the file
			if ( fwrite( $handle, $index_file ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


		 /**
		  * Core::writeDbconfig()
		  * Write db config
		  *
		  * @param string $data     information
		  * @param string $pathfile path file
		  *
		  * @return array
		  */
	function writeConfigFile( $data ) {
		  // Config path
		$template_path = 'config/config.php';
		$output_path   = '../application/config/config.php';

		// Open the file
		$database_file = file_get_contents( $template_path );
		if ( isset( $data['ssloption'] ) && intval( $data['ssloption'] ) === 1 ) {
			$new = str_replace( '%SSL%', 'TRUE', $database_file );
		} else {
			$new = str_replace( '%SSL%', 'FALSE', $database_file );
		}

		// Write the new database.php file
		$handle = fopen( $output_path, 'w+' );

		// Chmod the file, in case the user forgot
		@chmod( $output_path, 0755 );

		// Verify file permissions
		if ( is_writable( $output_path ) ) {

			// Write the file
			if ( fwrite( $handle, $new ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


}
