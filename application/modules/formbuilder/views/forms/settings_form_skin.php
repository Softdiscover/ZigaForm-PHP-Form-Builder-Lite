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
<div class="uiform-set-field-wrap" id="uiform-set-form-skin">
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom width', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-form-msec="skin"
                                   data-form-store="form_width-show_st"
                                   name="uifm_frm_skin_width_st"
                                   id="uifm_frm_skin_width_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Max width', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    class="uifm_frm_form_skin_spinner"
                                                id="uifm_frm_skin_maxwidth"
                                                data-form-msec="skin"
                                                data-form-store="form_width-max"
                                                type="text" >
                                    </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom padding', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-form-msec="skin"
                                   data-form-store="form_padding-show_st"
                                   name="uifm_frm_skin_padd_st "
                                   id="uifm_frm_skin_padd_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding top', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_skin_padd_top"
                                                class="uifm_frm_form_skin_spinner"
                                                data-form-msec="skin"
                                                data-form-store="form_padding-pos_top"
                                                type="text" >
                                </div>
                            </div>
                            <div class="space10"></div>     
                          <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding right', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                id="uifm_frm_skin_padd_right"    
                                                class="uifm_frm_form_skin_spinner"
                                                data-form-msec="skin"
                                                data-form-store="form_padding-pos_right"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding bottom', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_skin_padd_bottom"
                                                class="uifm_frm_form_skin_spinner"
                                                data-form-msec="skin"
                                                data-form-store="form_padding-pos_bottom"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding left', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_skin_padd_left"
                                                class="uifm_frm_form_skin_spinner"
                                                data-form-msec="skin"
                                                data-form-store="form_padding-pos_left"
                                                type="text" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    
     <div >
   <div class="space10"></div>      
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Background', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Background color', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-form-msec="skin"
                                   data-form-store="form_background-show_st"
                                   id="uifm_frm_skin_fmbg_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                             <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Type', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified"
                                                 data-toggle="buttons">
                                                <label 
                                                    data-form-store="form_background-type"
                                                    data-form-msec="skin"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_skin_fmbg_type_1"
                                                    class="sfdc-btn sfdc-btn-warning uifm-fmskin-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid', 'FRocket_admin'); ?>
                                                </label>
                                                <label 
                                                    data-form-store="form_background-type"
                                                    data-form-msec="skin"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_skin_fmbg_type_2"
                                                    class="sfdc-btn sfdc-btn-warning uifm-fmskin-setoption-btn" >
                                                <input type="radio"  value="2" checked> <?php echo __('Gradient', 'FRocket_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div id="uifm_frm_skin_fmbg_type_opts1">
                                    <div class="sfdc-row">
                                        <div class="sfdc-col-md-3">
                                           <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                        </div>
                                        <div class="sfdc-col-sm-9">
                                                <div class="sfdc-form-group">
                                                    <div data-form-store="form_background-solid_color"
                                                         data-form-msec="skin"
                                                         class="sfdc-input-group uifm-custom-color">
                                                        <span class="sfdc-input-group-addon"><i></i></span>
                                                        <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                                id="uifm_frm_skin_fmbg_color_1"
                                                                type="text" 
                                                                value="" 
                                                                name="" 
                                                                class="sfdc-form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div id="uifm_frm_skin_fmbg_type_opts2">
                                    <div class="sfdc-row">
                                        <div class="sfdc-col-md-3">
                                           <label ><?php echo __('Start color', 'FRocket_admin'); ?></label>
                                        </div>
                                        <div class="sfdc-col-sm-9">
                                                <div class="sfdc-form-group">
                                                    <div 
                                                        data-form-store="form_background-start_color"
                                                        data-form-msec="skin"
                                                        class="sfdc-input-group uifm-custom-color">
                                                        <span class="sfdc-input-group-addon"><i></i></span>
                                                        <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                                type="text" value=""
                                                                id="uifm_frm_skin_fmbg_color_2"
                                                                name="" class="sfdc-form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="sfdc-row">
                                        <div class="sfdc-col-md-3">
                                           <label ><?php echo __('End color', 'FRocket_admin'); ?></label>
                                        </div>
                                        <div class="sfdc-col-sm-9">
                                                <div class="sfdc-form-group">
                                                    <div 
                                                        data-form-store="form_background-end_color"
                                                        data-form-msec="skin"
                                                        class="sfdc-input-group uifm-custom-color">
                                                        <span class="sfdc-input-group-addon"><i></i></span>
                                                        <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>" 
                                                                id="uifm_frm_skin_fmbg_color_3"
                                                                type="text" value="" name="" class="sfdc-form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            
                            
                             <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Background image', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                            <div class="uifm_frm_skin_bg_thumbnail" id="uifm_frm_skin_bg_srcimg_wrap">
                                                
                                            </div>
                                            <input 
                                                name="uifm_frm_skin_bg_imgurl" 
                                                id="uifm_frm_skin_bg_imgurl" 
                                                value=""                                                
                                                type="hidden">
                                                <input id="uifm_frm_skin_bg_btnadd" 
                                                    value="<?php echo __('Update Image', 'flexy_admin'); ?>" 
                                                    class="button-secondary" 
                                                    type="button">
                                                <a href="javascript:void(0);"
                                                   onclick="javascript:rocketform.loadForm_tab_skin_delbgimg();"
                                                   class="sfdc-btn sfdc-btn-default"
                                                   >
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
    
                                        </div>
                                    </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    </div>
    <div >
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Border', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Border radius', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   data-form-store="form_border_radius-show_st"
                                   data-form-msec="skin"
                                   class="switch-field"
                                   name="uifm_frm_skin_fmbora_st"
                                   id="uifm_frm_skin_fmbora_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <input type="text" style="width:100%;"
                                   data-form-store="form_border_radius-size"
                                   data-form-msec="skin"
                                   data-slider-value="14"
                                   data-slider-step="1"
                                   data-slider-max="60"
                                   data-slider-min="0" 
                                   data-slider-id="" 
                                   id="uifm_frm_skin_fmbora_size" 
                                   class="uiform-opt-slider">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="space10"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Border', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   data-form-store="form_border-show_st"
                                   data-form-msec="skin"
                                   class="switch-field"
                                   name="uifm_frm_skin_fmbor_st"
                                   id="uifm_frm_skin_fmbor_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-form-store="form_border-color"
                                                 data-form-msec="skin"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>" 
                                                        type="text" 
                                                        value="" 
                                                        name="uifm_frm_skin_fmbor_color"
                                                        id="uifm_frm_skin_fmbor_color"
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('border style', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                                                <label 
                                                    data-form-store="form_border-style"
                                                    data-form-msec="skin"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_skin_fmbor_style_1"
                                                    class="sfdc-btn sfdc-btn-warning uifm-fmskin-setoption-btn" >
                                                <input type="radio"  value="1" checked><?php echo __('Solid', 'FRocket_admin'); ?>
                                                </label>
                                                <label 
                                                    data-form-store="form_border-style"
                                                    data-form-msec="skin"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_skin_fmbor_style_2"
                                                    class="sfdc-btn sfdc-btn-warning uifm-fmskin-setoption-btn" >
                                                <input type="radio"  value="2">  <?php echo __('Dotted', 'FRocket_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Border width', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input 
                                        data-form-store="form_border-width"
                                        data-form-msec="skin"
                                        type="text" style="width:100%;"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="20"
                                        data-slider-min="0"
                                        data-slider-id="" 
                                        id="uifm_frm_skin_fmbor_width"
                                        class="uiform-opt-slider">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    </div>
     <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Box Shadow', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-form-store="form_shadow-show_st"
                                   data-form-msec="skin"
                                   id="uifm_frm_skin_sha_st"
                                   name="uifm_frm_skin_sha_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div  data-form-store="form_shadow-color"
                                                  data-form-msec="skin"
                                                  class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="uifm_frm_skin_sha_co"
                                                        name="uifm_frm_skin_sha_co"
                                                        class="sfdc-form-control" />
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>
                            <div class="space20"></div>
                           <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('horizontal', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                             data-form-store="form_shadow-h_shadow"
                                             data-form-msec="skin"
                                        id="uifm_frm_skin_sha_x"
                                       name="uifm_frm_skin_sha_x"      
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0"
                                        data-slider-id="" class="uiform-opt-slider">
                                    </div>
                            </div>
                          <div class="space20"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('vertical', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                           data-form-store="form_shadow-v_shadow"
                                           data-form-msec="skin"
                                             style="width:100%;"
                                        id="uifm_frm_skin_sha_y"
                                        name="uifm_frm_skin_sha_y"
                                        
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0" data-slider-id="" class="uiform-opt-slider">
                                    </div>
                            </div>
                            <div class="space20"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('blur', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                        data-form-store="form_shadow-blur"
                                        data-form-msec="skin"
                                             style="width:100%;"
                                        id="uifm_frm_skin_sha_blur"
                                        name="uifm_frm_skin_sha_blur"
                                        
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0" data-slider-id="" class="uiform-opt-slider">
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
