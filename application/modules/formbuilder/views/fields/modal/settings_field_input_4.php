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

<div class="uifm-set-section-input4">
   
    <div class="space10"></div>
    <div class="sfdc-row">
            <div class="sfdc-col-md-6">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Minimum','FRocket_admin'); ?></label>
                    <input  
                        id="uifm_fld_inp4_spinner_opt1"
                        data-field-store="input4-set_min"
                        class="uifm_fld_inp4_spinner"
                        type="text" >
                </div>
            </div>
         <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Maximum','FRocket_admin'); ?></label>
                    <input  
                        id="uifm_fld_inp4_spinner_opt2"
                        data-field-store="input4-set_max"
                        class="uifm_fld_inp4_spinner"
                        type="text" >

                </div>
            </div>
        </div>
    <div class="space10"></div>
    
    <div class="sfdc-row">
            <div class="sfdc-col-md-6">
                <div class="uifm-set-section-input4-defaultvalue">
        <div class="sfdc-form-group">
                    <label ><?php echo __('Default value','FRocket_admin'); ?></label>
                    <input  
                        id="uifm_fld_inp4_spinner_opt3"
                        data-field-store="input4-set_default"
                        class="uifm_fld_inp4_spinner"
                        type="text" value="">
                </div>
    </div>
               
            </div>
         <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Step','FRocket_admin'); ?></label>
                    <input  
                        id="uifm_fld_inp4_spinner_opt4"
                        data-field-store="input4-set_step"
                        class="uifm_fld_inp4_spinner"
                        type="text" value="">

                </div>
            </div>
        </div>
    <div class="uifm-set-section-input4-range">
    <div class="sfdc-row">
            <div class="sfdc-col-md-6">
               <div class="sfdc-form-group">
                    <label ><?php echo __('Range 1','FRocket_admin'); ?></label>
                    <input  
                        id="uifm_fld_inp4_spinner_opt5"
                        data-field-store="input4-set_range1"
                        class="uifm_fld_inp4_spinner"
                        type="text" value="">
                </div>
            </div>
         <div class="sfdc-col-sm-6">
                <div class="sfdc-form-group">
                    <label ><?php echo __('Range 2','FRocket_admin'); ?></label>
                    <input
                        id="uifm_fld_inp4_spinner_opt6"
                        data-field-store="input4-set_range2"
                        class="uifm_fld_inp4_spinner"
                        type="text" value="">

                </div>
            </div>
        </div>
    </div>
    
    
    <div class="uifm-set-section-input4-skin-maxwidth">
        <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="divider2">
                        <div class="mask"></div>
                        <span><i><?php echo __('Skin','FRocket_admin'); ?></i></span>
                        </div>
                    </div>
                </div>
        <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Custom width','FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input 
                                   class="switch-field"
                                   data-field-store="input4-skin_maxwidth_st"
                                   name="uifm_fld_inp4_spinner_skin_maxwith_st"
                                   id="uifm_fld_inp4_spinner_skin_maxwith_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Max width','FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                                <input  
                                                    class="uifm_fld_inp4_spinner"
                                                    id="uifm_fld_inp4_spinner_skin_maxwith"
                                                    data-field-store="input4-skin_maxwidth"
                                                    type="text" >
                                               
                                           
                                    </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
    </div>
</div>
