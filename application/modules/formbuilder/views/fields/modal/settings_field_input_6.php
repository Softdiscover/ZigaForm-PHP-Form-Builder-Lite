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

<div class="uifm-set-section-input6">
   
    <div class="space10"></div>
     <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom text color','FRocket_admin'); ?></label>
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
                                   <label ><?php echo __('Color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input6-txt_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
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
                    <label ><?php echo __('Custom Background color','FRocket_admin'); ?></label>
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
                                   <label ><?php echo __('Color','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                        <div class="sfdc-form-group">
                                            <div data-field-store="input6-background_color"
                                                 class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
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
                    <label ><?php echo __('Custom Behind lines','FRocket_admin'); ?></label>
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
                                   <label ><?php echo __('Lines','FRocket_admin'); ?></label>
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
                    <label ><?php echo __('Custom front lines','FRocket_admin'); ?></label>
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
                                   <label ><?php echo __('Lines','FRocket_admin'); ?></label>
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
                    <label ><?php echo __('Distortion','FRocket_admin'); ?></label>
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
