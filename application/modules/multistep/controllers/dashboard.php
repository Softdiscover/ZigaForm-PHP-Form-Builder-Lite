<?php

/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if ( class_exists('dashboard')) {
    return;
}


/**
 * Controller Form class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://wordpress-form-builder.zigaform.com/
 */
class dashboard extends BackendController
{

    const VERSION = '0.1';

    /**
     * @var
     */
    public $gen_post_src;

    /*
     * Magic methods
     */

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
        $this->load->model('addon/model_addon');
        $this->load->model('formbuilder/model_forms');
    }

    public function ajax_load_multistep()
    {
        $json    = array();
        try {
            $form_id = (isset($_POST['form_id'])) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['form_id'])) : '';

            $data_form           = $this->model_forms->getFormById($form_id);

            if (empty($data_form->fmb_data)) {
                throw new Exception(__('Error! Data was not saved', 'FRocket_admin'));
            }

            $data_form->fmb_data = json_decode($data_form->fmb_data);
            $data_form->fmb_data2 = json_decode($data_form->fmb_data2);
            $json['data']        = $data_form;

            // temp
            /*$tmp_addon_names = self::$_models['addon']['addon']->getActiveAddonsNamesOnBack( $form_id );

        $tmp_addon = array();

        foreach ( $tmp_addon_names as $key => $value ) {
            $tmp_data = self::$_models['addon']['addon_details']->getAddonDataByForm( $value, $form_id );
            if ( ! empty( $tmp_data ) ) {
                $tmp_addon[ $value ] = json_decode( $tmp_data->adet_data, true );
            }
        }

        $json['addons'] = $tmp_addon;*/
        } catch (Exception $e) {
            $json['success'] = false;
            $json['error'] = 'An error has ocurred';
        }
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    public function ajax_save_newform()
    {
    
        $json = array();
        try {
            if (!Uiform_Form_Helper::check_User_Access()) {
                throw new Exception(__('Error! User has no permission to edit this form', 'FRocket_admin'));
            }

            $data             = array();
            
            $fmb_data = Uiform_Form_Helper::sanitizeInput_data_html($_POST['form_data']);
            $fmb_data = urldecode($fmb_data);
            $fmb_data = (isset($_POST['form_data'])) ? $fmb_data : '';
            $fmb_data         = (isset($fmb_data) && $fmb_data) ? array_map(array('Uiform_Form_Helper', 'sanitizeRecursive_html'), json_decode($fmb_data, true)) : array();
            $data['fmb_data'] = json_encode($fmb_data);

            $data['fmb_type'] = 2; //child
            $data['fmb_parent'] = (!empty($_POST['uifm_frm_main_multistep_parent'])) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['uifm_frm_main_multistep_parent'])) : '';
   
            $totalRecords = $this->model_forms->CountFormsByParent($data['fmb_parent']);
 
            if (intval($totalRecords) ===  0) {
                $data['fmb_name'] = 'Initial Form ';
            } else {
                $data['fmb_name'] = 'Form ' . (intval($totalRecords) + 1);
            }

           
            
            $this->db->set($data);
            $this->db->insert($this->model_forms->table);
            $idActivate = $this->db->insert_id();
            
            $json['status'] = 'created';
            $json['id']     = $idActivate;
            $json['name']     = $data['fmb_name'];
        } catch (Exception $e) {
        }
        // return data to ajax callback
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    public function list()
    {
        $data = [];
        $data['test'] = '';
        echo self::loadPartial('layout_editform.php', 'multistep/views/dashboard/list.php', $data);
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
        } catch (Exception $exception) {
            //add_notice(__METHOD__ . ' error: ' . $exception->getMessage(), 'error');
        }
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
