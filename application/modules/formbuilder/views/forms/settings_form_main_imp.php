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
    <div class="sfdc-row">
        <div class="sfdc-col-sm-4">
            <label for=""><?php echo __('IMPORT FORM','FRocket_admin'); ?></label>
        </div>
        <div class="sfdc-col-sm-8">
            
            
             <?php if(ZIGAFORM_F_LITE == 1){ ?>
       <a onclick="javascript:rocketform.showFeatureLocked(this);"
                  data-blocked-feature="IMPORT FORM"
                   href="javascript:void(0);"
               class="sfdc-btn sfdc-btn-warning"
               ><?php echo __('Import form','FRocket_admin'); ?> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span></a>
                         
               
                         
        <?php }else{ ?>
           <a href="javascript:void(0);"
               onclick="javascript:rocketform.importForm_openModal();"
               class="sfdc-btn sfdc-btn-warning"
               ><?php echo __('Import form','FRocket_admin'); ?></a>
               
            <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('Import the backuped form','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
        <?php } ?>
            
         
        </div>
    </div>
     <?php if(ZIGAFORM_F_LITE == 1){ ?>
        <div id="zgfm-blocked-feature-pdf-box">
        <?php $message= __('IMPORT FORM','FRocket_admin');?>
                <?php include(APPPATH . '/modules/formbuilder/views/settings/blocked_getmessage.php');?>
            </div>
        <?php }else{ ?>
           
            
        <?php } ?>
    
   
    
                        
    <div class="space10"></div>
    
</div>