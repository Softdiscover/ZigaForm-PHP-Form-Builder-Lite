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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<div class="uifm-set-section-input15">
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Settings', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="space10"></div>
  <div class="sfdc-row">
            <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('label Yes', 'FRocket_admin'); ?></label>
                    
                        <input type="text"
                               data-field-store="input15-txt_yes"
                               id="uifm_fld_inp15_txt_yes"
                               name="uifm_fld_inp15_txt_yes"
                               class="sfdc-form-control uifm-f-setoption">
                    
                </div>
            </div>
      <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('label no', 'FRocket_admin'); ?></label>
                  
                        <input type="text"
                               data-field-store="input15-txt_no"
                               id="uifm_fld_inp15_txt_no"
                               name="uifm_fld_inp15_txt_no"
                               class="sfdc-form-control uifm-f-setoption">
                        
                   
                </div>
            </div>
        </div>
    <div class="space10"></div>
</div>
