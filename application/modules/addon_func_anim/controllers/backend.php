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
class Backend extends MX_Controller {
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
    public $local_controllers=array('animation' => 'zgfm_addon_anim_back_lib');
    
    //adding routes
    public $local_back_routes = array(
        1=>array(
            'section' =>'back_field_opt_more',
            'function' =>'get_field_back_animation',
            'accepted_args' =>0,
            'priority' => 1
        )
        
    );
    
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
    
    public function get_localbackroutes(){
        return $this->local_back_routes;
        
    }
    
    
    public function load_back_heads(){
        $string='';
        foreach ($this->local_controllers as $key => $value) {
             $string.=modules::run('addon_func_anim/'.$key.'/loadStyle', array());
        }
        
        //load js variables
        ob_start();
        ?>
         <script type="text/javascript">
             uiform_vars['addon']={};
             uiform_vars['addon']['func_anim']={'func_name':'zgfm_back_addon_anim'};
        </script>
        <?php
        $str_output=ob_get_contents();
        ob_end_clean();
        
        $string.=$str_output;
        
        return $string;
    }
   
    /**
     * Adding new controllers
     *
     * @mvc Controller
     */
    public function add_controllers(){
        
        $tmp_flag=array();
        
        foreach ($this->local_controllers as $key => $value) {
             //load controllers
           // require_once( UIFORM_FORMS_DIR . '/modules/addon_func_anim/controllers/'.$key.'.php');
            
            $tmp_flag[$key]=$value;
            
        }
         
        return $tmp_flag;
    }
    
    
    public function get_field_back_animation(){
        
       $data = array();
       $data['select_types'] = modules::run('addon_func_anim/animation/getBackHtml', array());       
       return $this->load->view('addon_func_anim/backend/get_field_back_animation', $data, true);

    }
    

}
