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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="uiform-set-field-wrap" id="zgfm-set-progress-bar">
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">

                <label for="uifm_frm_pbar_st"><?php echo __('Enable progressbar', 'FRocket_admin'); ?></label>
                <input class="uifm_frm_pbar_st_event switch-field" id="uifm_frm_pbar_st" name="uifm_frm_pbar_st" type="checkbox" />



            </div>
        </div>
    </div>
    <div class="uiform_frm_pbar_main_content" style="display:none;">
        <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                    <label class="sfdc-control-label col-sm-12" for="">
                        <div class="uifm_frm_skin_tabs_options">
                            <div class="sfdc-row">
                                <div class="sfdc-col-sm-6 no-padding-left">
                                    <?php echo __('Tabs management', 'FRocket_admin'); ?>
                                </div>
                                <div class="sfdc-col-sm-6">
                                    <div class="sfdc-btn-group  ">
                                        <button href="#" onclick="javascript:rocketform.getInnerVariable('multistepobj').progresstab_cleanTabs();" class="sfdc-btn sfdc-btn-sm sfdc-btn-primary">
                                            <?php echo __('Clean Tabs', 'FRocket_admin'); ?></button>
                                        <button href="#" onclick="javascript:rocketform.getInnerVariable('multistepobj').progresstab_addNewTab();" class="sfdc-btn sfdc-btn-sm sfdc-btn-success">
                                            <i class="fa fa-plus"></i> <?php echo __('Add new', 'FRocket_admin'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                    <div class="clear"></div>
                    <div class="controls">
                        <div id="uifm_frm_skin_tabs_box"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="space20"></div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="divider2">
                    <div class="mask"></div>
                    <span><i><?php echo __('Skin tab', 'FRocket_admin'); ?></i></span>
                </div>
            </div>
        </div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <select id="uifm_frm_pbar_theme_type" class="sfdc-form-control">
                        <option value="numbers"><?php echo __('Theme 1', 'FRocket_admin'); ?></option>
                        <option value="default"><?php echo __('Theme 2', 'FRocket_admin'); ?></option>
                        <option value="numbers2"><?php echo __('Theme 3', 'FRocket_admin'); ?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="sfdc-row">
            <div class="sfdc-col-sm-3 ">
            <label><?php echo __('Position', 'FRocket_admin'); ?></label>
            </div>
            <div class="sfdc-col-sm-9">
                <div class="sfdc-btn-group  ">
                    <select id="uifm_frm_pbar_theme_position" class="sfdc-form-control">
                        <option value="outertop"><?php echo __('Outer Top', 'FRocket_admin'); ?></option>
                        <option value="innertop"><?php echo __('Inner Top', 'FRocket_admin'); ?></option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="zgfm_pbar_theme_options_container" id="zgfm_pbar_theme_options_default">
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Global', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_bgcolor_wrap">
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background for Number', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_default_txt_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_default_txt_bgcolor"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Inactive mode', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_bgcolor_wrap">
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_inac_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_inactive_bgcolor"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_txtcolor_wrap">
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Text color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_inac_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_inactive_txtcolor"  class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>

                            <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_numtxtcolor_wrap">
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_inac_numtxtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_inactive_numtxtcolor"  class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Active Mode', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" >
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_cur_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_active_bgcolor"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-row" >
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Title color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_cur_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" id="uifm_frm_pbar_tab_active_txtcolor"  class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-row" >
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_cur_numtxtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_active_numtxtcolor"  class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sfdc-row" id="uifm_frm_pbar_tab_done_wrap">
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Done mode', 'FRocket_admin'); ?>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this when the tab is completed. this will be shown on frontend', 'FRocket_admin'); ?>"><span class="fa fa-question-circle"></span></a>
                    </label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_done_bgcolor_wrap">
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_done_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_done_bgcolor" name="uifm_frm_pbar_tab_done_bgcolor" class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_done_txtcolor_wrap">
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Title color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_done_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" id="uifm_frm_pbar_tab_done_txtcolor" name="uifm_frm_pbar_tab_done_txtcolor" class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_done_numtxtcolor_wrap">
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_done_numtxtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_done_numtxtcolor" name="uifm_frm_pbar_tab_done_numtxtcolor" class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sfdc-row" id="uifm_frm_pbar_tab_cont_wrap">
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Tab container ', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" id="uifm_frm_pbar_tab_cont_bgcolor_wrap">
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_cont_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_cont_bgcolor" name="uifm_frm_pbar_tab_cont_bgcolor" class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>

                            <div class="sfdc-row" id="uifm_frm_pbar_tab_cont_borcol_wrap">
                                <div class="space10"></div>
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Border color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_cont_borcol" class="sfdc-input-group uifm-evt-progressbar-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_tab_cont_borcol" name="uifm_frm_pbar_tab_cont_borcol" class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="zgfm_pbar_theme_options_container" id="zgfm_pbar_theme_options_number">
            <div class="sfdc-row" >
                <div class="sfdc-col-md-12">
                    <div class="sfdc-form-group">
                        <label><?php echo __('Inactive mode', 'FRocket_admin'); ?></label>
                        <div class="">
                            <div class="sfdc-col-md-1">
    
                            </div>
                            <div class="sfdc-col-md-11">
                                <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_bgcolor_wrap">
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_inac_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_inactive_bgcolor"  class="sfdc-form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_txtcolor_wrap">
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Text color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_inac_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_inactive_txtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
    
                                <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_numtxtcolor_wrap">
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_inac_numtxtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_inactive_numtxtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
            <div class="sfdc-row" >
                <div class="sfdc-col-md-12">
                    <div class="sfdc-form-group">
                        <label><?php echo __('Active Mode', 'FRocket_admin'); ?></label>
                        <div class="">
                            <div class="sfdc-col-md-1">
    
                            </div>
                            <div class="sfdc-col-md-11">
                                <div class="sfdc-row" >
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_active_bgcolor"  class="sfdc-form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" >
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Title color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" id="uifm_frm_pbar_tab2_active_txtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" >
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_numtxtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_active_numtxtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" >
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Background for number container', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_bg_numtxt" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab2_active_bg_numtxt"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <div class="zgfm_pbar_theme_options_container" id="zgfm_pbar_theme_options_number2">
            <div class="sfdc-row" >
                <div class="sfdc-col-md-12">
                    <div class="sfdc-form-group">
                        <label><?php echo __('Inactive mode', 'FRocket_admin'); ?></label>
                        <div class="">
                            <div class="sfdc-col-md-1">
    
                            </div>
                            <div class="sfdc-col-md-11">
                                <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_bgcolor_wrap">
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_inac_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab3_inactive_bgcolor"  class="sfdc-form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" id="uifm_frm_pbar_tab_inactive_txtcolor_wrap">
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Text color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_inac_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab3_inactive_txtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
    
                               
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
            <div class="sfdc-row" >
                <div class="sfdc-col-md-12">
                    <div class="sfdc-form-group">
                        <label><?php echo __('Active Mode', 'FRocket_admin'); ?></label>
                        <div class="">
                            <div class="sfdc-col-md-1">
    
                            </div>
                            <div class="sfdc-col-md-11">
                                <div class="sfdc-row" >
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_bgcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" value="" id="uifm_frm_pbar_tab3_active_bgcolor"  class="sfdc-form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-row" >
                                    <div class="space10"></div>
                                    <div class="sfdc-col-md-5">
                                        <label><?php echo __('Text color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-7">
                                        <div data-form-store="skin_tab_cur_txtcolor" class="sfdc-input-group uifm-evt-progressbar-color">
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                            <input type="text" id="uifm_frm_pbar_tab3_active_txtcolor"  class="sfdc-form-control" />
    
                                        </div>
                                    </div>
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/html" id="tmpl-zgfm-frm-pbar-templates">
    <div data-tab-key="" class="uifm_frm_skin_tab_content">
        <div class="sfdc-row">
            <div class="sfdc-col-sm-1">
                <div class="uifm-wz-opt-sort">
                    <i class="fa fa-sort"></i>
                </div>
            </div>
            <div class="sfdc-col-sm-7">
                <div class="sfdc-form-group">
                    <label><?php echo __('Tab', 'FRocket_admin'); ?> <span>0</span> : </label>
                    <input type="text" id="uifm_frm_skin_tab0_title" class="sfdc-form-control uifm_frm_skin_tab_title_evt" onchange="rocketform.getInnerVariable('multistepobj').progresstab_tabManualEvt(this);" onkeyup="rocketform.getInnerVariable('multistepobj').progresstab_tabManualEvt(this);" placeholder="<?php echo __('Type tab title', 'FRocket_admin'); ?>" class="sfdc-form-control">
                </div>
                <div class="sfdc-form-group">
                    <label><?php echo __('Forms', 'FRocket_admin'); ?>: </label>
                    <select id="uifm_frm_skin_tab0_forms" class="uifm_frm_skin_tab_forms_evt" multiple></select>
                </div>
            </div>
            <div class="sfdc-col-sm-4">
                <div class="sfdc-btn-group  ">
                    <button onclick="javascript:rocketform.getInnerVariable('multistepobj').progresstab_deleteTab(this);" class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"><i class="fa fa-trash-o"></i> <?php echo __('Delete', 'FRocket_admin'); ?></button>

                </div>
            </div>
        </div>
    </div>
</script>