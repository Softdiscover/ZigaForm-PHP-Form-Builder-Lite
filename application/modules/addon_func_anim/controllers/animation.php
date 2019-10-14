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
class Animation extends MX_Controller {
    /**
     * max number of forms in order show by pagination
     *
     * @var int
     */

    const VERSION = '0.1';
    
    public $local_controllers=array();
    
    public static $local_back_routes = array( );
    
    /**
     * name of form estimator table
     *
     * @var string
     */
    protected $modules;

    /**
     * Settings::__construct()
     * 
     * @return 
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('addon/model_addon');
        $this->load->model('addon/model_addon_details');
        $this->load->model('addon/model_addon_details_log');
        $this->auth->authenticate(true);
    }

   
    
    public function loadStyle(){
        ob_start();
        ?>
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/backend/assets/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/common/assets/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/common/assets/css/customs.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/addon_func_anim/views/backend/assets/back-anim.js"></script>    
        <?php
         $str_output=ob_get_contents();
        ob_end_clean();
        return $str_output;
    }
    
    public function loadStyleOnFront(){
        ob_start();
        ?>
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/frontend/assets/style-front.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/common/assets/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/modules/addon_func_anim/views/common/assets/css/customs.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/addon_func_anim/views/frontend/assets/js/waypoints/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/addon_func_anim/views/frontend/assets/js/script.js"></script>
        <?php
         $str_output=ob_get_contents();
        ob_end_clean();
        return $str_output;
    }
    
    
    public function saveData($form_id,$data_addon){
         
        $data_addon_store = json_encode($data_addon);
        
        
        $newdata = array();
       
        
        if($this->model_addon_details->existRecord('func_anim',$form_id)){
            
            $where = array(
                    'add_name' => 'func_anim',
                    'fmb_id' => $form_id
                );
                $data = array(
                    'adet_data' => $data_addon_store
                );
                
                $this->db->set($data);
                $this->db->where(array('add_name' => 'func_anim','fmb_id'=>$form_id));
                $this->db->update($this->model_addon_details->table);
                
            
        }else{
            
            $newdata['add_name'] ='func_anim';
            $newdata['fmb_id'] =$form_id;
            $newdata['adet_data'] =$data_addon_store;
            
            $this->db->set($newdata);
            $this->db->insert($this->model_addon_details->table);
            
        }
        
    }
    
    public function mergeData($current_data_form,$data_addon){
       $tmp_data=$current_data_form;
        if(!empty($data_addon['steps_src'])){
            foreach ($data_addon['steps_src'] as $key => $value) {
                if(isset($tmp_data[$key]) && !empty($value)){
                    foreach ($value as $key2 => $value2) {
                        if(isset($tmp_data[$key][$key2])){                            
                            $tmp_data[$key][$key2]['addon_func_anim']=$value2;   
                        }
                    }
                }
            }
        }
        
        return $tmp_data;
        
    }
    
    public function getExtraDataField (&$data){
        //set extraclass
        $str_class='';
         
        if(strval($data['addon_func_anim']['type'])==='none'){
            $str_class.=''; 
         }else{
            $str_class.='zgfm_addon_anim_prevtostart '.$data['addon_func_anim']['type'];
         }
        
        $data['addon_extraclass'] = $str_class;
    }
    
    public function getExtraDataField2 ($data){
        //set extraclass
        $str_class='';
         
        if(strval($data['addon_func_anim']['type'])==='none'){
            $str_class.=''; 
         }else{
            $str_class.='zgfm_addon_anim_prevtostart '.$data['addon_func_anim']['type'];
         }
        
        $data['addon_extraclass'] = $str_class;
        
        return $data;
    }
    
    public function saveLog($form_id,$save_log_st,$log_id,$data_addon){
       
        $data_addon_store = json_encode($data_addon);
       
        
        //save log
        if($save_log_st){
            $data5= array();
            $data5["add_name"]='func_anim';
            $data5["adet_data"]=$data_addon_store;
            $data5["log_id"]=$log_id;
            $data5["fmb_id"]=$form_id;
            $data5['created_ip'] = $_SERVER['REMOTE_ADDR'];
            $data5['created_by'] = 1;
            $data5['created_date'] = date('Y-m-d h:i:s');
            
            $this->db->set($data5);
            $this->db->insert($this->model_addon_details_log->table);
            
            //$this->wpdb->insert(self::$_models['addon']['addon_details_log']->table, $data5);
        } 
    }
    
    public function getData(){
        $data = array(
			array(
				'values' => array(
					__( 'None', 'FRocket_admin' ) => 'none',
				),
			),
                        array(
				'label' => __( 'Customs', 'FRocket_admin' ),
				'values' => array(
					__( 'Top to Bottom', 'FRocket_admin' ) => array(
						'value' => 'zgfm-anim-top-to-bottom',
						'type' => 'in',
					),
					__( 'Bottom to Top', 'FRocket_admin' ) => array(
						'value' => 'zgfm-anim-bottom-to-top',
						'type' => 'in',
					),
					__( 'Left to Right', 'FRocket_admin' ) => array(
						'value' => 'zgfm-anim-left-to-right',
						'type' => 'in',
					),
					__( 'Right to Left', 'FRocket_admin' ) => array(
						'value' => 'zgfm-anim-right-to-left',
						'type' => 'in',
					),
                                        __( 'Appear from center', 'FRocket_admin' ) => array(
						'value' => 'zgfm-anim-from-center',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Attention Seekers', 'FRocket_admin' ),
				'values' => array(
					__( 'bounce', 'FRocket_admin' ) => array(
						'value' => 'bounce',
						'type' => 'other',
					),
					__( 'flash', 'FRocket_admin' ) => array(
						'value' => 'flash',
						'type' => 'other',
					),
					__( 'pulse', 'FRocket_admin' ) => array(
						'value' => 'pulse',
						'type' => 'other',
					),
					__( 'rubberBand', 'FRocket_admin' ) => array(
						'value' => 'rubberBand',
						'type' => 'other',
					),
					__( 'shake', 'FRocket_admin' ) => array(
						'value' => 'shake',
						'type' => 'other',
					),
					__( 'swing', 'FRocket_admin' ) => array(
						'value' => 'swing',
						'type' => 'other',
					),
					__( 'tada', 'FRocket_admin' ) => array(
						'value' => 'tada',
						'type' => 'other',
					),
					__( 'wobble', 'FRocket_admin' ) => array(
						'value' => 'wobble',
						'type' => 'other',
					),
				),
			),
			array(
				'label' => __( 'Bouncing Entrances', 'FRocket_admin' ),
				'values' => array(
					// text to display => value
					__( 'bounceIn', 'FRocket_admin' ) => array(
						'value' => 'bounceIn',
						'type' => 'in',
					),
					__( 'bounceInDown', 'FRocket_admin' ) => array(
						'value' => 'bounceInDown',
						'type' => 'in',
					),
					__( 'bounceInLeft', 'FRocket_admin' ) => array(
						'value' => 'bounceInLeft',
						'type' => 'in',
					),
					__( 'bounceInRight', 'FRocket_admin' ) => array(
						'value' => 'bounceInRight',
						'type' => 'in',
					),
					__( 'bounceInUp', 'FRocket_admin' ) => array(
						'value' => 'bounceInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Bouncing Exits', 'FRocket_admin' ),
				'values' => array(
					// text to display => value
					__( 'bounceOut', 'FRocket_admin' ) => array(
						'value' => 'bounceOut',
						'type' => 'out',
					),
					__( 'bounceOutDown', 'FRocket_admin' ) => array(
						'value' => 'bounceOutDown',
						'type' => 'out',
					),
					__( 'bounceOutLeft', 'FRocket_admin' ) => array(
						'value' => 'bounceOutLeft',
						'type' => 'out',
					),
					__( 'bounceOutRight', 'FRocket_admin' ) => array(
						'value' => 'bounceOutRight',
						'type' => 'out',
					),
					__( 'bounceOutUp', 'FRocket_admin' ) => array(
						'value' => 'bounceOutUp',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Fading Entrances', 'FRocket_admin' ),
				'values' => array(
					// text to display => value
					__( 'fadeIn', 'FRocket_admin' ) => array(
						'value' => 'fadeIn',
						'type' => 'in',
					),
					__( 'fadeInDown', 'FRocket_admin' ) => array(
						'value' => 'fadeInDown',
						'type' => 'in',
					),
					__( 'fadeInDownBig', 'FRocket_admin' ) => array(
						'value' => 'fadeInDownBig',
						'type' => 'in',
					),
					__( 'fadeInLeft', 'FRocket_admin' ) => array(
						'value' => 'fadeInLeft',
						'type' => 'in',
					),
					__( 'fadeInLeftBig', 'FRocket_admin' ) => array(
						'value' => 'fadeInLeftBig',
						'type' => 'in',
					),
					__( 'fadeInRight', 'FRocket_admin' ) => array(
						'value' => 'fadeInRight',
						'type' => 'in',
					),
					__( 'fadeInRightBig', 'FRocket_admin' ) => array(
						'value' => 'fadeInRightBig',
						'type' => 'in',
					),
					__( 'fadeInUp', 'FRocket_admin' ) => array(
						'value' => 'fadeInUp',
						'type' => 'in',
					),
					__( 'fadeInUpBig', 'FRocket_admin' ) => array(
						'value' => 'fadeInUpBig',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Fading Exits', 'FRocket_admin' ),
				'values' => array(
					__( 'fadeOut', 'FRocket_admin' ) => array(
						'value' => 'fadeOut',
						'type' => 'out',
					),
					__( 'fadeOutDown', 'FRocket_admin' ) => array(
						'value' => 'fadeOutDown',
						'type' => 'out',
					),
					__( 'fadeOutDownBig', 'FRocket_admin' ) => array(
						'value' => 'fadeOutDownBig',
						'type' => 'out',
					),
					__( 'fadeOutLeft', 'FRocket_admin' ) => array(
						'value' => 'fadeOutLeft',
						'type' => 'out',
					),
					__( 'fadeOutLeftBig', 'FRocket_admin' ) => array(
						'value' => 'fadeOutLeftBig',
						'type' => 'out',
					),
					__( 'fadeOutRight', 'FRocket_admin' ) => array(
						'value' => 'fadeOutRight',
						'type' => 'out',
					),
					__( 'fadeOutRightBig', 'FRocket_admin' ) => array(
						'value' => 'fadeOutRightBig',
						'type' => 'out',
					),
					__( 'fadeOutUp', 'FRocket_admin' ) => array(
						'value' => 'fadeOutUp',
						'type' => 'out',
					),
					__( 'fadeOutUpBig', 'FRocket_admin' ) => array(
						'value' => 'fadeOutUpBig',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Flippers', 'FRocket_admin' ),
				'values' => array(
					__( 'flip', 'FRocket_admin' ) => array(
						'value' => 'flip',
						'type' => 'other',
					),
					__( 'flipInX', 'FRocket_admin' ) => array(
						'value' => 'flipInX',
						'type' => 'in',
					),
					__( 'flipInY', 'FRocket_admin' ) => array(
						'value' => 'flipInY',
						'type' => 'in',
					),
					__( 'flipOutX', 'FRocket_admin' ) => array(
						'value' => 'flipOutX',
						'type' => 'out',
					),
					__( 'flipOutY', 'FRocket_admin' ) => array(
						'value' => 'flipOutY',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Lightspeed', 'FRocket_admin' ),
				'values' => array(
					__( 'lightSpeedIn', 'FRocket_admin' ) => array(
						'value' => 'lightSpeedIn',
						'type' => 'in',
					),
					__( 'lightSpeedOut', 'FRocket_admin' ) => array(
						'value' => 'lightSpeedOut',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Rotating Entrances', 'FRocket_admin' ),
				'values' => array(
					__( 'rotateIn', 'FRocket_admin' ) => array(
						'value' => 'rotateIn',
						'type' => 'in',
					),
					__( 'rotateInDownLeft', 'FRocket_admin' ) => array(
						'value' => 'rotateInDownLeft',
						'type' => 'in',
					),
					__( 'rotateInDownRight', 'FRocket_admin' ) => array(
						'value' => 'rotateInDownRight',
						'type' => 'in',
					),
					__( 'rotateInUpLeft', 'FRocket_admin' ) => array(
						'value' => 'rotateInUpLeft',
						'type' => 'in',
					),
					__( 'rotateInUpRight', 'FRocket_admin' ) => array(
						'value' => 'rotateInUpRight',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Rotating Exits', 'FRocket_admin' ),
				'values' => array(
					__( 'rotateOut', 'FRocket_admin' ) => array(
						'value' => 'rotateOut',
						'type' => 'out',
					),
					__( 'rotateOutDownLeft', 'FRocket_admin' ) => array(
						'value' => 'rotateOutDownLeft',
						'type' => 'out',
					),
					__( 'rotateOutDownRight', 'FRocket_admin' ) => array(
						'value' => 'rotateOutDownRight',
						'type' => 'out',
					),
					__( 'rotateOutUpLeft', 'FRocket_admin' ) => array(
						'value' => 'rotateOutUpLeft',
						'type' => 'out',
					),
					__( 'rotateOutUpRight', 'FRocket_admin' ) => array(
						'value' => 'rotateOutUpRight',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Specials', 'FRocket_admin' ),
				'values' => array(
					__( 'hinge', 'FRocket_admin' ) => array(
						'value' => 'hinge',
						'type' => 'out',
					),
					__( 'rollIn', 'FRocket_admin' ) => array(
						'value' => 'rollIn',
						'type' => 'in',
					),
					__( 'rollOut', 'FRocket_admin' ) => array(
						'value' => 'rollOut',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Zoom Entrances', 'FRocket_admin' ),
				'values' => array(
					__( 'zoomIn', 'FRocket_admin' ) => array(
						'value' => 'zoomIn',
						'type' => 'in',
					),
					__( 'zoomInDown', 'FRocket_admin' ) => array(
						'value' => 'zoomInDown',
						'type' => 'in',
					),
					__( 'zoomInLeft', 'FRocket_admin' ) => array(
						'value' => 'zoomInLeft',
						'type' => 'in',
					),
					__( 'zoomInRight', 'FRocket_admin' ) => array(
						'value' => 'zoomInRight',
						'type' => 'in',
					),
					__( 'zoomInUp', 'FRocket_admin' ) => array(
						'value' => 'zoomInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Zoom Exits', 'FRocket_admin' ),
				'values' => array(
					__( 'zoomOut', 'FRocket_admin' ) => array(
						'value' => 'zoomOut',
						'type' => 'out',
					),
					__( 'zoomOutDown', 'FRocket_admin' ) => array(
						'value' => 'zoomOutDown',
						'type' => 'out',
					),
					__( 'zoomOutLeft', 'FRocket_admin' ) => array(
						'value' => 'zoomOutLeft',
						'type' => 'out',
					),
					__( 'zoomOutRight', 'FRocket_admin' ) => array(
						'value' => 'zoomOutRight',
						'type' => 'out',
					),
					__( 'zoomOutUp', 'FRocket_admin' ) => array(
						'value' => 'zoomOutUp',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Slide Entrances', 'FRocket_admin' ),
				'values' => array(
					__( 'slideInDown', 'FRocket_admin' ) => array(
						'value' => 'slideInDown',
						'type' => 'in',
					),
					__( 'slideInLeft', 'FRocket_admin' ) => array(
						'value' => 'slideInLeft',
						'type' => 'in',
					),
					__( 'slideInRight', 'FRocket_admin' ) => array(
						'value' => 'slideInRight',
						'type' => 'in',
					),
					__( 'slideInUp', 'FRocket_admin' ) => array(
						'value' => 'slideInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Slide Exits', 'FRocket_admin' ),
				'values' => array(
					__( 'slideOutDown', 'FRocket_admin' ) => array(
						'value' => 'slideOutDown',
						'type' => 'out',
					),
					__( 'slideOutLeft', 'FRocket_admin' ) => array(
						'value' => 'slideOutLeft',
						'type' => 'out',
					),
					__( 'slideOutRight', 'FRocket_admin' ) => array(
						'value' => 'slideOutRight',
						'type' => 'out',
					),
					__( 'slideOutUp', 'FRocket_admin' ) => array(
						'value' => 'slideOutUp',
						'type' => 'out',
					),
				),
			),
                        
		);
        
        
        return $data;
    }
    
    
    public function getBackHtml(){
         
        $data=array();
        $data['options'] = $this->getData();
        return $this->load->view('addon_func_anim/animation/getbackhtml', $data, true);
    }
    
    

}
