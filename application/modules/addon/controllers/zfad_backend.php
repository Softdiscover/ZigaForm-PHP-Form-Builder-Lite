<?php

/**
 * Settings
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: intranet.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      http://php-cost-estimator.zigaform.com/
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
 * @link      http://php-cost-estimator.zigaform.com/
 */
class zfad_backend extends BackendController {

	const VERSION       = '0.1';
	private $pagination = '';
	var $per_page       = 100;

	protected $modules;



	/**
	 * Constructor
	 *
	 * @mvc Controller
	 */
	function __construct() {

			 parent::__construct();
		$this->load->language_alt( model_settings::$db_config['language'] );
		$this->template->set( 'controller', $this );
		$this->load->model( 'model_addon' );

		 // admin resources
		add_action( 'admin_enqueue_scripts', array( &$this, 'loadStyle' ) );

		add_filter( 'zgfm_back_filter_globalvars', array( &$this, 'filter_add_globalvariable' ) );
	}

	/*
	 * update addon status
	 */
	public function listaddon_updateStatus() {

		$data       = array();
		$add_name   = ( $_POST['add_name'] ) ? Uiform_Form_Helper::sanitizeInput( trim( $_POST['add_name'] ) ) : '';
		$add_status = ( $_POST['add_status'] ) ? Uiform_Form_Helper::sanitizeInput( trim( $_POST['add_status'] ) ) : '0';

		$data['flag_status'] = $add_status;
		$json                = array();
		if ( $this->model_addon->existAddon( $add_name ) ) {

			$this->db->set( $data );
			$this->db->where( 'add_name', $add_name );
			$this->db->update( $this->model_addon->table );

		}

		$json['status'] = 'updated';

		// return data to ajax callback
		header( 'Content-Type: application/json' );
		echo json_encode( $json );
		die();
	}

	public function filter_add_globalvariable( $value ) {
		$value['addon'] = self::$_addons_jsactions;
		return $value;
	}

	/*
	* Show extensions
	*/
	public function list_extensions() {

		$data          = array();
		$data['query'] = $this->model_addon->getListAddons( 100, 0 );

		// $this->template->loadPartial('layout', 'addon/zfad_backend/list_extensions', $data);
		$this->template->loadPartial( 'layout', 'backend/list_extensions', $data );
	}


	public function loadStyle() {
		// load

		ob_start();
		?>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/modules/addon/views/backend/assets/back-addon.js"></script>    
		<link href="<?php echo base_url(); ?>application/modules/addon/views/backend/assets/back-addon.css" rel="stylesheet">
		<?php
		 $str_output = ob_get_contents();
		ob_end_clean();
		echo $str_output;
	}

	public function load_addonsbyBack() {

		// get addons
		$tmp_addons = $this->model_addon->getListAddonsByBack();

		// flag variables
		$tmp_addons_arr  = array();
		$tmp_modules_arr = self::$_addons;

		// storing lib objects
		foreach ( $tmp_addons as $key => $value ) {

			// load addons
			// require_once( UIFORM_FORMS_DIR . '/modules/addon_'.$value->add_name.'/controllers/backend.php');

			$tmp_add_new_contr = array();

			// $tmp_add_new_contr['backend'] = 'zfad_'.$value->add_name.'_back';
			$tmp_add_new_contr['backend'] = modules::run( 'addon_' . $value->add_name . '/zfad_' . $value->add_name . '_back/get_instance' );

			$tmp_add_new_flag = array();

			// $tmp_add_new_flag = call_user_func(array($tmp_add_new_contr['backend'], 'add_controllers'));
			// $tmp_add_new_flag = modules::run('addon_'.$value->add_name.'/'.$tmp_add_new_contr['backend'].'/add_controllers');
			$tmp_add_new_flag = call_user_func( array( $tmp_add_new_contr['backend'], 'add_controllers' ) );

			$tmp_add_new_contr = array_merge( $tmp_add_new_contr, $tmp_add_new_flag );

			self::$_addons[ $value->add_name ] = $tmp_add_new_contr;

		}

	}


	public function load_addActions() {

		$tmp_addons = self::$_addons;

		$tmp_addons_actions = array();

		/*
		pending to add cache*/
		// loop addons
		foreach ( $tmp_addons as $key => $value ) {
			// loop controllers
			foreach ( $value as $key2 => $value2 ) {

				$tmp_flag = array();
				$tmp_flag = $value2->local_back_actions;

				if ( ! empty( $tmp_flag ) ) {
					foreach ( $tmp_flag as $key3 => $value3 ) {
						$tmp_addons_actions[ $value3['action'] ][ $value3['priority'] ][ $key ] = array(
							'function'      => $value3['function'],
							'accepted_args' => $value3['accepted_args'],
							'controller'    => $key2,

						);
					}
				}
			}
		}

		self::$_addons_actions = $tmp_addons_actions;

		// add js actions
		$tmp_addons_actions = array();

		/*
		pending to add cache*/
		// loop addons
		foreach ( $tmp_addons as $key => $value ) {
			// loop controllers
			foreach ( $value as $key2 => $value2 ) {

				$tmp_flag = array();
				$tmp_flag = $value2->js_back_actions;

				if ( ! empty( $tmp_flag ) ) {
					foreach ( $tmp_flag as $key3 => $value3 ) {
						$tmp_addons_actions[ $value3['action'] ][ $value3['priority'] ][ $key ] = array(
							'function'      => $value3['function'],
							'accepted_args' => $value3['accepted_args'],
							'controller'    => $value3['controller'],

						);
					}
				}
			}
		}

		self::$_addons_jsactions = $tmp_addons_actions;

	}



	public function addons_doActions( $section = '', $return_array = false ) {

		if ( empty( self::$_addons_actions[ $section ] ) ) {
			return '';
		}

		$tmp_addons = self::$_addons_actions[ $section ];

		if ( $return_array ) {
			$tmp_str = array();
		} else {
			$tmp_str = '';
		}

		if ( ! empty( $tmp_addons ) ) {
			foreach ( $tmp_addons as $key => $value ) {
				foreach ( $value as $key2 => $value2 ) {
					if ( $return_array ) {
						$tmp_str[] = call_user_func( array( self::$_addons[ $key2 ][ $value2['controller'] ], $value2['function'] ) );
					} else {
						$tmp_str .= call_user_func( array( self::$_addons[ $key2 ][ $value2['controller'] ], $value2['function'] ) );
					}
				}
			}
		}

		return $tmp_str;

	}

	public function get_addon_content( $addon_name ) {

		// return 'here loading content of addon '.$addon_name;
	}


	/**
	 * Register callbacks for actions and filters
	 *
	 * @mvc Controller
	 */
	public function register_hook_callbacks() {

	}

	/**
	 * Initializes variables
	 *
	 * @mvc Controller
	 */
	public function init() {

		try {
			// $instance_example = new WPPS_Instance_Class( 'Instance example', '42' );
			// add_notice('ba');
		} catch ( Exception $exception ) {
			add_notice( __METHOD__ . ' error: ' . $exception->getMessage(), 'error' );
		}
	}

	/*
	 * Instance methods
	 */

	/**
	 * Prepares sites to use the plugin during single or network-wide activation
	 *
	 * @mvc Controller
	 *
	 * @param bool $network_wide
	 */
	public function activate( $network_wide ) {

		return true;
	}

	/**
	 * Rolls back activation procedures when de-activating the plugin
	 *
	 * @mvc Controller
	 */
	public function deactivate() {
		return true;
	}

	/**
	 * Checks if the plugin was recently updated and upgrades if necessary
	 *
	 * @mvc Controller
	 *
	 * @param string $db_version
	 */
	public function upgrade( $db_version = 0 ) {
		return true;
	}

	/**
	 * Checks that the object is in a correct state
	 *
	 * @mvc Model
	 *
	 * @param string $property An individual property to check, or 'all' to check all of them
	 * @return bool
	 */
	protected function is_valid( $property = 'all' ) {
		return true;
	}

}

?>
