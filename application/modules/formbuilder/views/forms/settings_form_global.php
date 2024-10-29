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
<div class="uiform-set-field-wrap" id="uiform-set-form-global">
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Font', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-form-msec="skin"
                                   data-form-store="form_font-show_st"
                                   name="uifm_frm_global_font_st"
                                   id="uifm_frm_global_font_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-sm-12">
                                    <div class="sfdc-form-group">
                                        <div class="sfdc-input-group uifm-skin-global-custom-font">
                                            <?php
                                            $attributes    = array(
                                                'name'             => 'uifm_frm_global_font',
                                                'id'               => 'uifm_frm_global_font',
                                                'data-form-msec' => 'skin',
                                                'data-form-store' => 'form_font-font',
                                            );
                                            $default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
                                            ?>
                                            <?php $obj_sfm->get_view_menu($attributes, $default_value); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-alert sfdc-alert-warning" role="alert">
                            <?php echo __('It will overwrite all fonts of the fields.', 'FRocket_admin'); ?>
                        </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
 
</div>