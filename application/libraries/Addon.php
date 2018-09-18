<?php
/**
 * Auth
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: Auth.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      http://php-cost-estimator.zigaform.com/
 */

/**
 * Auth
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://php-cost-estimator.zigaform.com/
 */
class Addon
{
    var $CI;
    var $_username;
    
    /**
     * Auth::__construct()
     * 
     * @return 
     */
    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('string');
        $this->CI->load->helper('cookie');
        $this->CI->load->model('addon/model_addon');
         
    }
    
    /**
     * Auth::Auth
     * 
     * @return void
     */
    function Addon()
    {
        self::__construct();
        
      
    }
    
    
    function load_addons_Head(){
       $tmp_addons = $this->CI->model_addon->getListAddonsByBack();
       
          //flag variables
      $tmp_addons_arr=array();
    //  $tmp_modules_arr=self::$_addons;
      $output='';
     //main addon
     // $output.=modules::run('addon/backend/load_back_heads', array());
      
      foreach ($tmp_addons as $key => $value) {
           
          $output.=modules::run('addon_'.$value->add_name.'/backend/load_back_heads', array());
         /* $tmp_add_new_contr=array();
          $tmp_add_new_contr['back'] = call_user_func(array('zgfm_addon_back_'.$value->add_name, 'get_instance'));
          $tmp_add_new_flag = array();
          $tmp_add_new_flag = call_user_func(array($tmp_add_new_contr['back'], 'add_controllers'));
          
          $tmp_add_new_contr = array_merge($tmp_add_new_contr,$tmp_add_new_flag);
          
          $tmp_modules_arr['addon_'.$value->add_name] = $tmp_add_new_contr;*/
          
      }
       
      echo $output;
    }
    
    function load_addonsbyBack(){
         //get addons
      $tmp_addons=$this->CI->model_addon->getListAddonsByBack();
      
      //flag variables
      $tmp_addons_arr=array();
      $tmp_modules_arr=array();
      
     
      foreach ($tmp_addons as $key => $value) {
          
          $tmp_add_new_contr=array();
          $tmp_add_new_contr['backend'] = 'zgfm_addon_back_'.$value->add_name;
          
          $tmp_add_new_flag = array();
          //$tmp_add_new_flag = call_user_func(array($tmp_add_new_contr['back'], 'add_controllers'));
          $tmp_add_new_flag = modules::run('addon_'.$value->add_name.'/backend/add_controllers', array());
           
          $tmp_add_new_contr = array_merge($tmp_add_new_contr,$tmp_add_new_flag);
          
          $tmp_modules_arr['addon_'.$value->add_name] = $tmp_add_new_contr;
          
      }
     
      return $tmp_modules_arr;
     
    }
    
    function load_addonsByFront(){
       
      //get addons
      $tmp_addons=$this->CI->model_addon->getListAddonsByFront();
     
      //flag variables
      $tmp_addons_arr=array();
      $tmp_modules_arr=array();
      
     
      foreach ($tmp_addons as $key => $value) {
          //$tmp_addons_arr[$value->add_section][$value->add_name]=$tmp_addons[$key];
          
          //load addons
          //require_once( UIFORM_FORMS_DIR . '/modules/addon_'.$value->add_name.'/controllers/frontend.php');
           
           //$tmp_modules_arr['addon_'.$value->add_name]=array( 'back' => call_user_func( array( 'zgfm_addon_back_'.$value->add_name, 'get_instance' ) ));
           
          //$tmp_add_new_contr=array();
          //$tmp_add_new_contr['frontend'] = array('class_name'=> 'zgfm_addon_front_'.$value->add_name,);
          $tmp_add_new_flag = array();
          $tmp_add_new_flag = modules::run('addon_'.$value->add_name.'/frontend/add_controllers', array());
          //$tmp_add_new_flag = call_user_func(array($tmp_add_new_contr['front'], 'add_controllers'));
          
         // $tmp_add_new_contr = array_merge($tmp_add_new_contr,$tmp_add_new_flag);
          
          $tmp_modules_arr['addon_'.$value->add_name] = $tmp_add_new_flag;
          
      }
      
      return $tmp_modules_arr;
     
     
    }
    
    function load_addRoutes(){
        
        $this->CI->load->library('cache');
        
        $tmp_addons = $this->CI->cache->get('addon_back');
        
        $tmp_addons_routes = array();
        
        /*pending to add cache*/
        //loop addons
        foreach ($tmp_addons as $key => $value) {
            //loop controllers
            foreach ($value as $key2 => $value2) {
                 
                $tmp_flag= array();
                
                $tmp_flag= modules::run($key.'/'.$key2.'/get_localbackroutes', array());
                
                if(!empty($tmp_flag)){
                   foreach ($tmp_flag as $key3 => $value3) {
                        $tmp_addons_routes[$value3['section']][$value3['priority']][$key] = array(
                                'function' => $value3['function'],
                                'accepted_args' => $value3['accepted_args'] ,
                                'controller' =>$key2

                        );
                    }  
                }
                
            } 
        }
         
       // self::$_addons_routes=$tmp_addons_routes;
        return $tmp_addons_routes;
      
      
    }
    
 
   function get_modulesBySection($section=''){
        
       
       $this->CI->load->library('cache');
        $tmp_cache=$this->CI->cache->get('addon_routes');
        
         if(empty($tmp_cache[$section])){
           return ''; 
        }
        $tmp_addons=$tmp_cache[$section];
         $tmp_str='';
        if(!empty($tmp_addons)){
           foreach ($tmp_addons as $key => $value) {
               foreach ($value as $key2 => $value2) {
                   $tmp_str.=modules::run($key2.'/'.$value2['controller'].'/'.$value2['function'], array());
               }
               
           } 
        }
        return $tmp_str;
        
    }
   
     
    
    
}
