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
    
     
    
    
}
