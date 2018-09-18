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
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>
<div class="uiform-set-field-wrap"  >
  <div class="space20"></div>
    
       <div class="sfdc-row ">
        
            <div class="sfdc-form-group">
                <div class="sfdc-col-md-4">
                    <label for=""><?php echo __('CONTROL WHOLE HTML CONTENT OF MAIL NOTIFICATION','FRocket_admin'); ?></label>
                </div>
                <div class="sfdc-col-md-8">
                    
                    <input class="switch-field"
                           id="uifm_frm_main_email_htmlfullpage"
                           name="uifm_frm_main_email_htmlfullpage"
                           type="checkbox"/>
                     <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('Enable control whole html content','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                       <p class="sfdc-help-block">
                           <div class="sfdc-alert sfdc-alert-info">
                               <?php echo __('When you active this option, you have to add html, head, and body tag in the message because it allows you to have whole control of html content in the mail notifications. remember this is only for all mail notification of zigaform','FRocket_admin'); ?>
                    </div>
                           
                           
                         </p>
                </div>    
                     
            </div>
       
    </div>
     
</div>