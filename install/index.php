<?php
/**
 * Index
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
?>
<?php
error_reporting( E_ALL );
require_once 'includes/functions.php';
define( 'ZIGAFORM_F_LITE', 1 );
session_start();
$step = 0;
if ( $_POST ) {
	$step = ( isset( $_POST['step'] ) ) ? $_POST['step'] : 0;
	// Load the classes and create the new objects
	include_once 'includes/core_class.php';
	include_once 'includes/database_class.php';

	$core     = new Core();
	$database = new Database();
	$message  = $string = '';


	if ( ZIGAFORM_F_LITE === 1 ) {
		switch ( intval( $step ) ) {
			case 1:
				break;
			case 2:
				// Verify licence
				$step = 3;
			case 3:
				$idsup = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;
				// Validate the post data
				$errors = $core->validatePost( $_POST );
				if ( count( $errors ) > 0 ) {
					$step   = 2;
					$string = '<ul style="margin-left:10px;">';
					foreach ( $errors as $valor ) {
						$string .= '<li>' . $valor . '</li>';
					}
					$string .= '</ul>';
					$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
				} else {
					// First create the database, then create tables, then write config file
					if ( $database->create_database( $_POST ) == true ) {

						if ( $database->create_tables( $_POST ) == true ) {

							$step = 3;
						} else {
							$step    = 2;
							$string  = 'The database could not be created, please verify your settings.';
							$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
						}
					} else {
						$step    = 2;
						$string  = 'The database could not be created, please verify your settings.';
						$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
					}
				}
				break;

			case 4:
				// process data
				$idsup = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;

				$errors = $core->validatePost2( $_POST );
				if ( count( $errors ) > 0 ) {
					$step   = 3;
					$string = '<ul style="margin-left:10px;">';
					foreach ( $errors as $valor ) {
						$string .= '<li>' . $valor . '</li>';
					}
					$string .= '</ul>';
					$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
				} else {
					if ( $database->save_settings( $_POST ) ) {

						$core->writeDbconfig( $_POST );
						$core->writeConfigFile( $_POST );
						$core->writeIndexFile();

						$step   = 5;
						$method = '';
					} else {
						$step    = 3;
						$message = '<div class="alert alert-warning"><i class="icon-warning-sign icon-2x pull-left"></i>Warning! Database is processing. just wait a minute and try again</div>';
					}
				}
				// ob_end_clean();
				$errors = 1;
				break;
			case 5:
				$idsup  = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;
				$method = ( isset( $_POST['method'] ) ) ? $_POST['method'] : 0;
				// ob_start();
				break;

		}
	} else {
		switch ( intval( $step ) ) {
			case 1:
				break;
			case 2:
				// Verify licence
				$idsup = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;

				break;
			case 3:
				$idsup = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;
				// Validate the post data
				$errors = $core->validatePost( $_POST );
				if ( count( $errors ) > 0 ) {
					$step   = 2;
					$string = '<ul style="margin-left:10px;">';
					foreach ( $errors as $valor ) {
						$string .= '<li>' . $valor . '</li>';
					}
					$string .= '</ul>';
					$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
				} else {
					// First create the database, then create tables, then write config file
					if ( $database->create_database( $_POST ) == true ) {

						if ( $database->create_tables( $_POST ) == true ) {

							$step = 3;
						} else {
							$step    = 2;
							$string  = 'The database could not be created, please verify your settings.';
							$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
						}
					} else {
						$step    = 2;
						$string  = 'The database could not be created, please verify your settings.';
						$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
					}
				}
				break;

			case 4:
				// process data
				$idsup = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;

				$errors = $core->validatePost2( $_POST );
				if ( count( $errors ) > 0 ) {
					$step   = 3;
					$string = '<ul style="margin-left:10px;">';
					foreach ( $errors as $valor ) {
						$string .= '<li>' . $valor . '</li>';
					}
					$string .= '</ul>';
					$message = '<div class="alert alert-danger"><i class="icon-warning-sign icon-2x pull-left"></i>' . $string . '</div>';
				} else {
					if ( $database->save_settings( $_POST ) ) {

						$core->writeDbconfig( $_POST );
						$core->writeConfigFile( $_POST );
						$core->writeIndexFile();

						$step   = 5;
						$method = '';
					} else {
						$step    = 3;
						$message = '<div class="alert alert-warning"><i class="icon-warning-sign icon-2x pull-left"></i>Warning! Database is processing. just wait a minute and try again</div>';
					}
				}
				// ob_end_clean();
				$errors = 1;
				break;
			case 5:
				$idsup  = ( isset( $_POST['idsup'] ) ) ? $_POST['idsup'] : 0;
				$method = ( isset( $_POST['method'] ) ) ? $_POST['method'] : 0;
				// ob_start();
				break;

		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>INSTALLING ZIGAFORM - PHP FORM BUILDER</title>
		<script type="text/javascript"  src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="assets/js/global.js"></script>
		<script type="text/javascript" src="assets/js/jquery.blockUI.min.js"></script>
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<!--[if IE 7]>
		<link href="assets/css/font-awesome-ie7.css" rel="stylesheet">
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="logo"> 
				<img alt="ZIGAFORM - PHP FORM BUILDER" src="assets/img/logo-uiform-black.png">          
			</div>
			<div class="box-install clearfix">
<?php

switch ( $step ) {
	default:
		include 'templates/pre_install.php';
		break;
	case 1:
		$step = 2;
	case 2:
		include 'templates/database_config.php';
		break;
	case 3:
		include 'templates/data_config.php';
		break;
	case 5:
		include 'templates/completed.php';
		break;
}


?>
			</div>
		</div>
	</body>
</html>
