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

<div class="uifm-set-section-input18">
 
 <div class="sfdc-row">
                <div class="sfdc-col-sm-12">
                    <div class="sfdc-form-group">
                    <label class="sfdc-control-label" for="">
                        <?php echo __('Custom text','FRocket_admin'); ?>
                    </label>
                    <div class="sfdc-controls sfdc-form-group">
                        <?php
                        /*pending add this tinymce*/
                        $settings = array( 'media_buttons' => true,'textarea_rows'=>5);
                           // wp_editor('', 'uifm_frm_inp18_txt_cont',$settings );
                        ?>
                        <textarea 
                            class="uifm_tinymce_obj"
                            name="uifm_frm_inp18_txt_cont"
                            id="uifm_frm_inp18_txt_cont"></textarea>
                    </div>

                    </div>
                </div>
            </div>   
  <div class="sfdc-row">
            <div class="sfdc-col-md-12">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Show text','FRocket_admin'); ?></label>
                    <div class="sfdc-controls sfdc-form-group">
                        <input class="switch-field"
                                   data-field-store="input18-text-show_st"
                                   id="uifm_frm_inp18_txt_st"
                                   name="uifm_frm_inp18_txt_st"
                                   type="checkbox"/>
                    </div>
                </div>
            </div>
         
        </div>  
 <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <label ><?php echo __('Help block position','FRocket_admin'); ?></label>
            <div class="sfdc-controls sfdc-form-group">
                <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                    <label 
                        data-field-store="input18-text-html_pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                        <input type="radio"  
                           id="uifm_fld_inp18_txt_pos_1" 
                           name="uifm_fld_inp18_txt_pos"   
                           value="1"> <i class="fa fa-hand-o-down"></i> <?php echo __('Top','FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="input18-text-html_pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_inp18_txt_pos_2" 
                           name="uifm_fld_inp18_txt_pos"   
                           value="2"> <i class="fa fa-hand-o-up"></i> <?php echo __('Right','FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="input18-text-html_pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_inp18_txt_pos_3" 
                           name="uifm_fld_inp18_txt_pos"   
                           value="3"> <i class="fa fa-question-circle"></i> <?php echo __('bottom','FRocket_admin'); ?>
                    </label>
                    <label 
                        data-field-store="input18-text-html_pos"
                        data-toggle-enable="sfdc-btn-warning"
                        data-toggle-disable="sfdc-btn-warning"
                        data-settings-option="group-radiobutton"
                        class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                    <input type="radio"  
                           id="uifm_fld_inp18_txt_pos_4" 
                           name="uifm_fld_inp18_txt_pos"   
                           value="0"><i class="fa fa-question-circle"></i> <?php echo __('left','FRocket_admin'); ?>
                    </label>
                </div>
            </div>
        </div>
    </div>   
 <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom padding','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-field-store="input18-pane_padding-show_st"
                                   name="uifm_frm_inp18_padd_st"
                                   id="uifm_frm_inp18_padd_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding top','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_padd_top"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_padding-pos_top"
                                                type="text" >
                                </div>
                            </div>
                          <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding right','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                id="uifm_frm_inp18_padd_right"    
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_padding-pos_right"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding bottom','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_padd_bottom"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_padding-pos_bottom"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Padding left','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_padd_left"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_padding-pos_left"
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
                    <label ><?php echo __('Custom margin','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-field-store="input18-pane_margin-show_st"
                                   name="uifm_frm_inp18_marg_st"
                                   id="uifm_frm_inp18_marg_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Margin top','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_marg_top"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_margin-pos_top"
                                                type="text" >
                                </div>
                            </div>
                          <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Margin right','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                id="uifm_frm_inp18_marg_right"    
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_margin-pos_right"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Margin bottom','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_marg_bottom"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_margin-pos_bottom"
                                                type="text" >
                                </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Margin left','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    id="uifm_frm_inp18_marg_left"
                                                class="uifm_fld_input16_spinner"
                                                data-field-store="input18-pane_margin-pos_left"
                                                type="text" >
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
            <span><i><?php echo __('Background','FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Background color','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input18-pane_background-show_st"
                                   id="uifm_frm_inp18_fmbg_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                             <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Type','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified"
                                                 data-toggle="buttons">
                                                <label 
                                                    data-field-store="input18-pane_background-type"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_inp18_fmbg_type_1"
                                                    class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','FRocket_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="input18-pane_background-type"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_inp18_fmbg_type_2"
                                                    class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                                                <input type="radio"  value="2" checked> <?php echo __('Gradient','FRocket_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input18-pane_background-solid_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
                                                        id="uifm_frm_inp18_fmbg_color_1"
                                                        type="text" 
                                                        value="" 
                                                        name="" 
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Start color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div 
                                                data-field-store="input18-pane_background-start_color"
                                                class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
                                                        type="text" value=""
                                                        id="uifm_frm_inp18_fmbg_color_2"
                                                        name="" class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('End color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div 
                                                data-field-store="input18-pane_background-end_color"
                                                class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>" 
                                                        id="uifm_frm_inp18_fmbg_color_3"
                                                        type="text" value="" name="" class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                             <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Background image','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                            <div class="uifm_frm_inp18_bg_thumbnail" id="uifm_frm_inp18_bg_srcimg_wrap">
                                                
                                            </div>
                                            <input 
                                                name="uifm_frm_inp18_bg_imgurl" 
                                                id="uifm_frm_inp18_bg_imgurl" 
                                                value=""                                                
                                                type="hidden">
                                                <input id="uifm_frm_inp18_bg_btnadd" onclick="javascript:rocketform.input18settings_changeSrcImg(this);"
                                                    value="<?php echo __('Update Image','flexy_admin');?>" 
                                                    class="button-secondary" 
                                                    type="button">
                                                <a href="javascript:void(0);"
                                                   onclick="javascript:rocketform.input18settings_deleteBgImagePane();"
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
    
    
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Border','FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Border radius','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   data-field-store="input18-pane_border_radius-show_st"
                                   class="switch-field"
                                   name="uifm_frm_inp18_fmbora_st"
                                   id="uifm_frm_inp18_fmbora_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <input type="text" style="width:100%;"
                                   data-field-store="input18-pane_border_radius-size"
                                   data-slider-value="14"
                                   data-slider-step="1"
                                   data-slider-max="60"
                                   data-slider-min="0" 
                                   data-slider-id="" 
                                   id="uifm_frm_inp18_fmbora_size" 
                                   class="uiform-opt-slider">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Border','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   data-field-store="input18-pane_border-show_st"
                                   class="switch-field"
                                   name="uifm_frm_inp18_fmbor_st"
                                   id="uifm_frm_inp18_fmbor_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input18-pane_border-color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>" 
                                                        type="text" 
                                                        value="" 
                                                        name="uifm_frm_inp18_fmbor_color"
                                                        id="uifm_frm_inp18_fmbor_color"
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                           
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('border style','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                                                <label 
                                                    data-field-store="input18-pane_border-style"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_inp18_fmbor_style_1"
                                                    class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                                                <input type="radio"  value="1" checked><?php echo __('Solid','FRocket_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="input18-pane_border-style"
                                                    data-toggle-enable="sfdc-btn-warning"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="group-radiobutton"
                                                    id="uifm_frm_inp18_fmbor_style_2"
                                                    class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn" >
                                                <input type="radio"  value="2">  <?php echo __('Dotted','FRocket_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Border width','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input 
                                        data-field-store="input18-pane_border-width"
                                        type="text" style="width:100%;"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="20"
                                        data-slider-min="0"
                                        data-slider-id="" 
                                        id="uifm_frm_inp18_fmbor_width"
                                        class="uiform-opt-slider">
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
                    <label ><?php echo __('Box Shadow','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input18-pane_shadow-show_st"
                                   id="uifm_frm_inp18_sha_st"
                                   name="uifm_frm_inp18_sha_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div  data-field-store="input18-pane_shadow-color"
                                                  class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="uifm_frm_inp18_sha_co"
                                                        name="uifm_frm_inp18_sha_co"
                                                        class="sfdc-form-control" />
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>
                            <div class="space20"></div>
                           <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('horizontal','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                             data-field-store="input18-pane_shadow-h_shadow"
                                        id="uifm_frm_inp18_sha_x"
                                       name="uifm_frm_inp18_sha_x"      
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0"
                                        data-slider-id="" class="uiform-opt-slider">
                                    </div>
                            </div>
                          <div class="space20"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('vertical','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                           data-field-store="input18-pane_shadow-v_shadow"
                                             style="width:100%;"
                                        id="uifm_frm_inp18_sha_y"
                                        name="uifm_frm_inp18_sha_y"
                                        
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0" data-slider-id="" class="uiform-opt-slider">
                                    </div>
                            </div>
                            <div class="space20"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('blur','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                        data-field-store="input18-pane_shadow-blue"
                                             style="width:100%;"
                                        id="uifm_frm_inp18_sha_blur"
                                        name="uifm_frm_inp18_sha_blur"
                                        
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
