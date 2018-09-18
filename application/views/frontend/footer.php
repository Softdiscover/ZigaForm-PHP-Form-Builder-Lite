<?php
/**
 * Footer
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: frontend_est_footer.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div id="footer" class="clearfix">
      <div class="container wrapper">
       <div class="zgfm-credit-company">
           <?php echo __('All Rights Reserved.','FRocket_admin'); ?>  <?php echo model_settings::$db_config['site_title']; ?>
             .</div>
        <div class="zgfm-credit-log-wrapper">
            <a href="http://zigaform.com/?uifm_v=<?php echo model_settings::$db_config['version']; ?>">
                 <img src="<?php echo base_url(); ?>assets/frontend/images/zigaform-logo-credit.png" title="<?php echo __('Powered by ZigaForm','FRocket_admin'); ?>" alt="Zigaform"> 
            </a>    
        </div>
      </div>
    </div>