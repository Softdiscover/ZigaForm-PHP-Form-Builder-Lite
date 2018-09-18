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
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>

<div class="uifm-set-section-input5">
   
    <div class="space10"></div>
    <div class="sfdc-row">
            <div class="sfdc-col-md-6">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Public key','FRocket_admin'); ?></label>
                    <input type="text"
                               data-field-store="input5-g_key_public"
                               id="uifm_fld_inp5_kpublic"
                               class="sfdc-form-control uifm-f-setoption">
                </div>
            </div>
         <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Secret key','FRocket_admin'); ?></label>
                    <input type="text"
                               data-field-store="input5-g_key_secret"
                               id="uifm_fld_inp5_ksecret"
                               
                               class="sfdc-form-control uifm-f-setoption">

                </div>
            </div>
        </div>
    <div class="space10"></div>
    <div class="sfdc-row">
            <div class="sfdc-col-md-12">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Theme','FRocket_admin'); ?></label>
                    <div class="sfdc-controls sfdc-form-group">
                        <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                    <label 
                        data-field-store="input5-g_theme"
                        data-toggle-enable="sfdc-btn-default"
                        data-toggle-disable="sfdc-btn-default"
                        data-settings-option="group-radiobutton"
                        id="uifm_fld_inp5_theme_1" 
                        class="sfdc-btn sfdc-btn-default uifm-f-setoption-btn" >
                    <input type="radio"  value="0">   <?php echo __('Light','FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="input5-g_theme"
                        data-toggle-enable="sfdc-btn-default"
                        data-toggle-disable="sfdc-btn-default"
                        data-settings-option="group-radiobutton"
                       id="uifm_fld_inp5_theme_2" 
                        class="sfdc-btn sfdc-btn-default uifm-f-setoption-btn" >
                    <input type="radio"  value="1">  <span class="uifm_fld_inp5_theme_2_lbl"><?php echo __('Dark','FRocket_admin'); ?></span>
                    </label>
                </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="space10"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-alert sfdc-alert-info">
           <?php echo __('Get private and publi key from Recaptcha site: ','FRocket_admin'); ?> <a href="https://www.google.com/recaptcha"  target="_blank"> <b><?php echo __('Go to Recaptcha site','FRocket_admin'); ?></b></a>
          </div>
            
        </div>
    </div>
 
</div>
