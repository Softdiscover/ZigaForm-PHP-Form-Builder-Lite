<?php
/**
 * Intranet
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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Estimator dashboard class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Dashboard extends BackendController {

    /**
     * Intranet::__construct()
     * 
     * @return 
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);

        $this->load->model('user/model_user');
        $this->load->model('visitor/model_visitor');
        
    }

    /**
     * Intranet::index()
     * Print the dashboard of the HTML page.
     * 
     * @return void
     */
    public function index() 
    {
        
        //generate cache
            //check if cache exist
            
        /*$this->load->library('cache');
            $data1 = $this->cache->get('addon_back');
            $data2 = $this->cache->get('addon_front');
            $data3 = $this->cache->get('addon_routes');
                            
            if( !file_exists(FCPATH .'application/cache/addon_back.cache') 
                    &&  !file_exists(FCPATH .'application/cache/addon_front.cache') 
                    && !file_exists(FCPATH .'application/cache/addon_routes.cache')   
                    ){
               if (empty($data1) ) {
                    $tmp_addon=$this->addon->load_addonsbyBack();
                    $this->cache->write($tmp_addon, 'addon_back');
               }

              if (empty($data2) ) {
                   $tmp_addon=$this->addon->load_addonsByFront();
                    $this->cache->write($tmp_addon, 'addon_front');
               } 

               if (empty($data3) ) {
                   $tmp_addon=$this->addon->load_addRoutes();
                    $this->cache->write($tmp_addon, 'addon_routes');
               } 
                            
               
               
            }*/
        redirect(site_url() . 'formbuilder/forms/list_uiforms');    
    }
    

}