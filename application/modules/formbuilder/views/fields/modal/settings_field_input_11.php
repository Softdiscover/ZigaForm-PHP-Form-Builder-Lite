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

<div class="uifm-set-section-input11">
    <div class="space10"></div>
    <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Text','FRocket_admin'); ?></label>
                    <div class="sfdc-input-group">
                        <input type="text"
                               data-field-store="input11-text_val"
                               id="uifm_fld_input11_textval"
                               class="sfdc-form-control uifm-f-setoption">
                        
                            <div class="sfdc-input-group-btn">
                            <select data-field-store="input11-text_size"
                                    id="uifm_fld_input11_size"
                                    data-live-search="true"
                                    data-width="80px"
                                    data-style="sfdc-btn-primary"
                                    class="uifm_field_font_selectpicker uifm-f-setoption-font">
                                <optgroup label="Font size" data-max-options="2">
                                    <?php 
                                    for ($i = 8; $i <= 48; $i++) {
                                    ?>
                                        <option value="<?php echo $i;?>"><?php echo $i.' px';?></option>
                                    <?php    
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="sfdc-input-group-btn">
                            <button data-field-store="input11-bold"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                type="button">
                                <i class="fa fa-bold"></i>
                                <input type="hidden" id="uifm_fld_input11_textbold"  value="0">
                            </button>
                            <button  data-field-store="input11-italic"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                    type="button"><i class="fa fa-italic"></i>
                                <input type="hidden" id="uifm_fld_input11_textitalic" value="0">
                            </button>
                            <button  data-field-store="input11-underline"
                                class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
                                    type="button"><i class="fa fa-underline"></i>
                                <input type="hidden" id="uifm_fld_input11_textu"  value="0">
                            </button>
                        </div>
                        
                        
                        
                    </div>

                </div>
            </div>
        </div>
    <div class="sfdc-row">
            <div class="sfdc-col-md-4">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Color','FRocket_admin'); ?></label>
                    <div 
                        data-field-store="input11-text_color"
                        class="sfdc-input-group uifm-custom-color">
                        <input type="text" value="" 
                               id="uifm_fld_input11_textcolor"
                                 class="sfdc-form-control" />
                        <span class="sfdc-input-group-addon"><i></i></span>
                    </div>

                </div>
            </div>
         <div class="sfdc-col-sm-8">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Font family','FRocket_admin'); ?></label>
                    <div class="sfdc-input-group uifm-custom-font">
                        <?php 
                        $attributes = array(
                            'name' => 'uifm_fld_input11_font',
                            'id' => 'uifm_fld_input11_font',
                            'data-field-store'=>'input11-font'
                            );
                        $default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
                        ?>
                        <?php $obj_sfm->get_view_menu($attributes,$default_value); ?>
                        <span class="sfdc-input-group-addon">
                        <input 
                            data-field-store="input11-font_st"
                            id="uifm_fld_input11_font_st"
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
               <div class="sfdc-form-group">
                    <label ><?php echo __('Divider bar Color','FRocket_admin'); ?></label>
                    <div data-field-store="input11-div_color" class="sfdc-input-group uifm-custom-color">
                        <span class="sfdc-input-group-addon"><i></i></span>
                        <input 
                            type="text" 
                            value="" 
                            id="uifm_fld_input11_barcolor"
                            class="sfdc-form-control" />
                         <span class="sfdc-input-group-addon">
                        <input 
                            data-field-store="input11-div_col_st"
                            id="uifm_fld_input11_divcol_st"
                            class="uifm-f-setoption-st"
                            value="1"
                            type="checkbox">
                         </span>
                    </div>
                    
                </div>
            </div>
    </div>
    <div class="space10"></div>
   
</div>
