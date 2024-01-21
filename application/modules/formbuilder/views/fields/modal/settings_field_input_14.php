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
 * @link      https://softdiscover.com/zigaform/wordpress-form-builder/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<div class="uifm-set-section-input14">
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
                    <div class="sfdc-col-md-12">
                        <label ><?php echo __('Buttons alignment', 'FRocket_admin'); ?></label>
                        <div class="sfdc-controls sfdc-form-group">
                            <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                                <label 
                                    data-field-store="input14-obj_align"
                                    data-toggle-enable="sfdc-btn-success"
                                    data-toggle-disable="sfdc-btn-success"
                                    data-settings-option="group-radiobutton"
                                    class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
                                <input type="radio" 
                                    id="uifm_fld_inp14_objalign_1"
                                    name="uifm_fld_inp14_objalign_1"   value="0"> <i class="fa fa-align-left"></i> <?php echo __('Left', 'FRocket_admin'); ?>
                                </label>
                                <label 
                                    data-field-store="input14-obj_align"
                                    data-toggle-enable="sfdc-btn-success"
                                    data-toggle-disable="sfdc-btn-success"
                                    data-settings-option="group-radiobutton"
                                    class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
                                <input type="radio" 
                                    id="uifm_fld_inp14_objalign_2"
                                    name="uifm_fld_inp14_objalign_2" value="1"> <i class="fa fa-align-center"></i> <?php echo __('Center', 'FRocket_admin'); ?>
                                </label>
                                <label 
                                    data-field-store="input14-obj_align"
                                    data-toggle-enable="sfdc-btn-success"
                                    data-toggle-disable="sfdc-btn-success"
                                    data-settings-option="group-radiobutton"
                                    class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
                                <input type="radio" 
                                    id="uifm_fld_inp14_objalign_3" 
                                    name="uifm_fld_inp14_objalign_3" value="2"> <i class="fa fa-align-right"></i> <?php echo __('Right', 'FRocket_admin'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
    <div class="space10"></div>
</div>
