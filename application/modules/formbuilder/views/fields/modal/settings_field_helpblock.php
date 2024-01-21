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
<div class="uiform-set-field-wrap" id="uiform-set-field-lbl-panel">
    <div class="space20"></div>
    <div class="uifm-set-section-helpblock">
        <div class="uifm-set-section-helpblock-text">
            <div class="sfdc-row">
                <div class="sfdc-col-sm-12">
                    <div class="sfdc-form-group">
                    <label class="sfdc-control-label" for="">
                        <?php echo __('Help block text', 'FRocket_admin'); ?>
                    </label>
                    <div class="sfdc-controls sfdc-form-group">
                         <?php
                            /*pending add this tinymce*/
                            $settings = array(
                                'media_buttons' => true,
                                'textarea_rows' => 5,
                                'wpautop'       => true,
                            );
                            // wp_editor('', 'uifm_fld_msc_text',$settings );
                            ?>
                         <textarea 
                            class="uifm_tinymce_obj"
                            name="uifm_fld_msc_text"
                            id="uifm_fld_msc_text"></textarea>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        
        
    <div class="sfdc-row">
            <div class="sfdc-col-md-4">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Show help block', 'FRocket_admin'); ?></label>
                    <div class="sfdc-controls sfdc-form-group">
                        <input class="switch-field"
                                   data-field-store="help_block-show_st"
                                   id="uifm_fld_hblock_st"
                                   name="uifm_fld_hblock_st"
                                   type="checkbox"/>
                        
                        
                    </div>
                </div>
            </div>
         <div class="sfdc-col-sm-8">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Text Font', 'FRocket_admin'); ?></label>
                    <div class="sfdc-input-group uifm-custom-font">
                        <input type="hidden" value="" name="uifm_fld_lbl_font">
                        <?php
                        $attributes    = array(
                            'name'             => 'uifm_fld_hblock_font',
                            'id'               => 'uifm_fld_hblock_font',
                            'data-field-store' => 'help_block-font',
                        );
                        $default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
                        ?>
                        <?php $obj_sfm->get_view_menu($attributes, $default_value); ?>
                        <span class="sfdc-input-group-addon">
                        <input 
                            data-field-store="help_block-font_st"
                            id="uifm_fld_hblock_font_st"
                            name="uifm_fld_hblock_font_st"
                            class="uifm-f-setoption-st"
                            value="1"
                            type="checkbox">
                        </span>
                    </div>

                </div>
            </div>
        </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <label ><?php echo __('Help block position', 'FRocket_admin'); ?></label>
            <div class="sfdc-controls sfdc-form-group">
                <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                    <label 
                        data-field-store="help_block-pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                        <input type="radio"  
                           id="uifm_fld_hblock_pos_1" 
                           name="uifm_fld_hblock_pos"   
                           value="0"> <i class="fa fa-hand-o-down"></i> <?php echo __('At bottom', 'FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="help_block-pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_hblock_pos_2" 
                           name="uifm_fld_hblock_pos"   
                           value="1"> <i class="fa fa-hand-o-up"></i> <?php echo __('At Top', 'FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="help_block-pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_hblock_pos_3" 
                           name="uifm_fld_hblock_pos"   
                           value="2"> <i class="fa fa-question-circle"></i> <?php echo __('Tooltip', 'FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="help_block-pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_hblock_pos_4" 
                           name="uifm_fld_hblock_pos"   
                           value="3"><i class="fa fa-question-circle"></i> <?php echo __('Pop up', 'FRocket_admin'); ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
</div>
