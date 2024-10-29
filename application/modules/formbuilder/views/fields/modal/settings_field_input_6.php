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
<div class="uifm-set-section-input6">
<div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Indicator text', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                    <label for="uifm_fld_lbl_txt"><?php echo __('Text', 'FRocket_admin'); ?></label>
                    <div class="sfdc-input-group">
                        <div class="uifm-set-section-input6-txtvalue">
                             <input type="text"
                               data-field-store="input6-indtext_txt"
                               id="uifm_fld_input6_indtext_txt"
                               name="uifm_fld_input6_indtext_txt"
                               class="sfdc-form-control uifm-f-setoption">   
                        </div>
                            <div class="sfdc-input-group-btn">
                            <select data-field-store="input6-indtext_size"
                                    id="uifm_fld_inp6_indtext_size"
                                    data-live-search="true"
                                    data-style="sfdc-btn-primary"
                                    data-width="80px"
                                    class="uifm_field_font_selectpicker uifm-f-setoption-font">
                                <optgroup label="Font size" data-max-options="2">
                                    <?php
                                    for ( $i = 8; $i <= 48; $i++) {
                                        ?>
                                <option value="<?php echo $i; ?>"><?php echo $i . ' px'; ?></option>
                                        <?php
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="sfdc-input-group-btn">
                            <button data-field-store="input6-indtext_bold"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                type="button">
                                <i class="fa fa-bold"></i>
                                <input type="hidden" id="uifm_fld_inp6_indtext_bold"  value="0">
                            </button>
                            <button  data-field-store="input6-indtext_italic"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                    type="button"><i class="fa fa-italic"></i>
                                <input type="hidden" id="uifm_fld_inp6_indtext_italic"   value="0">
                            </button>
                            <button  data-field-store="input6-indtext_underline"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                    type="button"><i class="fa fa-underline"></i>
                                <input type="hidden" id="uifm_fld_inp6_indtext_underline"   value="0">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
     <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-indtext_color_st"
                                   id="uifm_fld_inp6_indtext_color_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                              
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input6-indtext_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        id="uifm_fld_inp6_indtext_color"
                                                        type="text" 
                                                       
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    
    <div class="space10"></div>
<div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Captcha Image', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="space10"></div>
     <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom text color', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-txt_color_st"
                                   id="uifm_fld_inp6_txtcolor_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                              
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input6-txt_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        id="uifm_fld_inp6_txtcolor"
                                                        type="text" 
                                                        value="" 
                                                        name="" 
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
        
    <div class="space10"></div>
   <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom Background color', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-background_st"
                                   id="uifm_fld_inp6_bgcolor_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                              
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input6-background_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        id="uifm_fld_inp6_bgcolor"
                                                        type="text" 
                                                        value="" 
                                                        name="" 
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="space10"></div>
   <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom Behind lines', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-behind_lines_st"
                                   id="uifm_fld_inp6_behlines_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                              
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Lines', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <input  
                                            id="uifm_fld_inp6_behlines"
                                            data-field-store="input6-behind_lines"
                                            class="uifm_fld_inp6_spinner"
                                            type="text"
                                            value="2">
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
                    <label ><?php echo __('Custom front lines', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-front_lines_st"
                                   id="uifm_fld_inp6_frontlines_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Lines', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <input  
                                            id="uifm_fld_inp6_frontlines"
                                            data-field-store="input6-front_lines"
                                            class="uifm_fld_inp6_spinner"
                                            type="text" value="2" >
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
                    <label ><?php echo __('Distortion', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="switch-field"
                                   data-field-store="input6-distortion"
                                   id="uifm_fld_inp6_distortion_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
