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

<div class="uifm-set-section-input7">
    <div class="space10"></div>
    <div class="sfdc-row">
            <div class="sfdc-col-md-6">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Language','FRocket_admin'); ?></label>
                    <select id="uifm_fld_inp7_lang"
                            data-field-store="input7-language"
                            class="sfdc-form-control input-sm uifm-f-setoption">
                        <option value=""><?php echo __('English','FRocket_admin'); ?></option>
                        <option value="es"><?php echo __('Spanish','FRocket_admin'); ?></option>
                        <option value="fr"><?php echo __('French','FRocket_admin'); ?></option>
                        <option value="it"><?php echo __('Italian','FRocket_admin'); ?></option>
                        <option value="ja"><?php echo __('Japanese','FRocket_admin'); ?></option>
                        <option value="pt"><?php echo __('Portuguese','FRocket_admin'); ?></option>
                        <option value="ru"><?php echo __('Russian','FRocket_admin'); ?></option>
                        <option value="zh-cn"><?php echo __('Chinese','FRocket_admin'); ?></option>
                    </select>
                </div>
            </div>
         <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Format','FRocket_admin'); ?></label>
                    <select id="uifm_fld_inp7_format" 
                            data-field-store="input7-format"
                            class="sfdc-form-control input-sm uifm-f-setoption">
                    <option value="" selected=""><?php echo __('Default','FRocket_admin'); ?></option>
                    <option value="dddd ,D MMM, YYYY">dddd ,D MMM, YYYY</option>
                    <option value="dddd ,MMM D, YYYY">dddd ,MMM D, YYYY</option>
                    <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                    <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                    </select>
                </div>
            </div>
        </div>
    <div class="space10"></div>
   
</div>
