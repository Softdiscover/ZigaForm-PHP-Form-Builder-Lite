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
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
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
 * @link      https://php-form-builder.zigaform.com/
 */
class zfad_frontend extends FrontendController
{

    const VERSION       = '0.1';
    private $pagination = '';
    private $per_page       = 5;

    protected $modules;

    /**
     * Constructor
     *
     * @mvc Controller
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        // $this->template->set('controller', $this);
        $this->load->model('model_addon');
    }



    public function load_addonsByFront()
    {

        // get addons
        $tmp_addons = $this->model_addon->getListAddonsByFront();

        // flag variables
        $tmp_addons_arr  = array();
        $tmp_modules_arr = self::$_addons;

        foreach ( $tmp_addons as $key => $value) {
            // $tmp_addons_arr[$value->add_section][$value->add_name]=$tmp_addons[$key];

            // load addons
            // require_once( UIFORM_FORMS_DIR . '/modules/addon_'.$value->add_name.'/controllers/frontend.php');

             // $tmp_modules_arr['addon_'.$value->add_name]=array( 'back' => call_user_func( array( 'zfaddn_back_'.$value->add_name, 'get_instance' ) ));

            $tmp_add_new_contr = array();
            // $tmp_add_new_contr['frontend'] = call_user_func(array('zfaddn_'.$value->add_name.'_front', 'get_instance'));
            $tmp_add_new_contr['frontend'] = modules::run('addon_' . $value->add_name . '/zfad_' . $value->add_name . '_front/get_instance');

            $tmp_add_new_flag = array();
            $tmp_add_new_flag = call_user_func(array( $tmp_add_new_contr['frontend'], 'add_controllers' ));

            $tmp_add_new_contr = array_merge($tmp_add_new_contr, $tmp_add_new_flag);

            // $tmp_modules_arr['addon_'.$value->add_name] = $tmp_add_new_contr;
            self::$_addons[ $value->add_name ] = $tmp_add_new_contr;
        }

        // self::$_addons = $tmp_addons_arr;
    }

    public function load_addActions()
    {

        $tmp_addons = self::$_addons;

        $tmp_addons_actions = array();

        /*
        pending to add cache*/
        // loop addons
        foreach ( $tmp_addons as $key => $value) {
            // loop controllers
            foreach ( $value as $key2 => $value2) {
                $tmp_flag = array();
                $tmp_flag = $value2->local_actions;

                if ( ! empty($tmp_flag)) {
                    foreach ( $tmp_flag as $key3 => $value3) {
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
        foreach ( $tmp_addons as $key => $value) {
            // loop controllers
            foreach ( $value as $key2 => $value2) {
                $tmp_flag = array();
                $tmp_flag = $value2->js_actions;

                if ( ! empty($tmp_flag)) {
                    foreach ( $tmp_flag as $key3 => $value3) {
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

    public function addons_doActions($section = '')
    {

        if ( empty(self::$_addons_actions[ $section ])) {
            return '';
        }

        $tmp_addons = self::$_addons_actions[ $section ];

        $tmp_str = '';

        if ( ! empty($tmp_addons)) {
            foreach ( $tmp_addons as $key => $value) {
                foreach ( $value as $key2 => $value2) {
                    $tmp_str .= call_user_func(array( self::$_addons[ $key2 ][ $value2['controller'] ], $value2['function'] ));
                }
            }
        }

        return $tmp_str;
    }


    /**
     * Register callbacks for actions and filters
     *
     * @mvc Controller
     */
    public function register_hook_callbacks()
    {
    }

    /**
     * Initializes variables
     *
     * @mvc Controller
     */
    public function init()
    {

        try {
            // $instance_example = new WPPS_Instance_Class( 'Instance example', '42' );
            // add_notice('ba');
        } catch ( Exception $exception) {
            add_notice(__METHOD__ . ' error: ' . $exception->getMessage(), 'error');
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
    public function activate($network_wide)
    {

        return true;
    }

    /**
     * Rolls back activation procedures when de-activating the plugin
     *
     * @mvc Controller
     */
    public function deactivate()
    {
        return true;
    }

    /**
     * Checks if the plugin was recently updated and upgrades if necessary
     *
     * @mvc Controller
     *
     * @param string $db_version
     */
    public function upgrade($db_version = 0)
    {
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
    protected function is_valid($property = 'all')
    {
        return true;
    }
}
