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
if (!defined('BASEPATH')) {
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
 * @link      http://php-cost-estimator.zigaform.com/
 */
class Frontend extends MX_Controller {
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
    protected $modules;
    
     //adding libs
    public $local_controllers=array('animation' => array(
        'class_name'=>'zgfm_addon_anim_back_lib',
        'scripts'=>array(
            2=>array(
                'src'=>'application/modules/addon_func_anim/views/frontend/assets/js/script.js',
                'id'=>'zgfm_addon_front_script_js'
            )
        ),
        'styles'=>array(
            1=>array(
                'src'=>'application/modules/addon_func_anim/views/frontend/assets/style-front.css',
                'id'=>'zgfm_addon_front_animate_style'
            ),
            2=>array(
                'src'=>'application/modules/addon_func_anim/views/common/assets/css/animate.min.css',
                'id'=>'zgfm_addon_front_animate_style-2'
            ),
            3=>array(
                'src'=>'application/modules/addon_func_anim/views/common/assets/css/customs.css',
                'id'=>'zgfm_addon_front_animate_style-3'
            )
            
            
        )
    ));
    
    
    /**
     * Settings::__construct()
     * 
     * @return 
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        //$this->load->model('model_addon');
        $this->auth->authenticate(true);
    }

    /**
     * Adding new controllers
     *
     * @mvc Controller
     */
    public function add_controllers(){
         
        $tmp_flag=array();
        $tmp_val = $this->local_controllers;
        foreach ($tmp_val as $key => $value) {
             //load controllers
            //require_once( UIFORM_FORMS_DIR . '/modules/addon_func_anim/controllers/'.$key.'.php');
            
            
            foreach ($value['scripts'] as $key2 => $value2) {
                
                
                $tmp_val[$key]['scripts'][$key2]['src'] = base_url().$value2['src'];
                
                
            }
            
            foreach ($value['styles'] as $key2 => $value2) {
                $tmp_val[$key]['styles'][$key2]['src'] = base_url().$value2['src'];
            }
            
            //$tmp_flag[$key]=$value;
            
        }
        
        return $tmp_val;
    }
    
    

}
