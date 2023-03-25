<?php ( defined( 'BASEPATH' ) ) or exit( 'No direct script access allowed' );

class CommonController extends MX_Controller {


	private static $instances = array();

	public static $_addons           = array();
	public static $_addons_actions   = array();
	public static $_addons_jsactions = array();
	public static $_form_data        = array();


	public function __construct() {
		 parent::__construct();
	}

			/*
	 * Non-abstract methods
	 */

	/**
	 * Provides access to a single instance of a module using the singleton pattern
	 *
	 * @mvc Controller
	 *
	 * @return object
	 */
	public static function get_instance() {
		$module = get_called_class();

		if ( isset( self::$instances[ $module ] ) ) {

			 return self::$instances[ $module ];
		}

	}

	public static function set_instance( $obj ) {
		$module = get_called_class();

		if ( ! isset( self::$instances[ $module ] ) ) {
			// self::$instances[$module] = new $module();
			self::$instances[ $module ] = $obj;
		}

	}
}

class FrontendController extends CommonController {


	public function __construct() {
		 parent::__construct();
		$this->init();
	}

	public function init() {
		// add new addons
		modules::run( 'addon/zfad_frontend/load_addonsByFront' );

		// add addon routes
		modules::run( 'addon/zfad_frontend/load_addActions' );
	}

}

class BackendController extends CommonController {


	public function __construct() {
		 parent::__construct();

		$this->auth->authenticate( true );

		$this->init();

	}

	public function init() {
		// add new addons
		modules::run( 'addon/zfad_backend/load_addonsbyBack' );

		// add addon routes
		modules::run( 'addon/zfad_backend/load_addActions' );
	}



}

