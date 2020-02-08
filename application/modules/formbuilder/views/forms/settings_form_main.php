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
<div class="uiform-set-field-wrap " >
  <div class="space20"></div>
     
    <div class="sfdc-row">
         <div class="sfdc-col-md-12">
            <div class="sfdc-col-sm-4">
            <label for=""><?php echo __('REFRESH AND CLEAN FORM','FRocket_admin'); ?></label>
            </div>
            <div class="sfdc-col-sm-8">
                <a href="javascript:void(0);"
                   onclick="javascript:rocketform.refreshPreviewSection();"
                   class="sfdc-btn sfdc-btn-success"
                   ><?php echo __('Refresh','FRocket_admin'); ?></a>
                <a href="javascript:void(0);"
                           data-toggle="tooltip" data-placement="top" 
                           data-original-title="<?php echo __('this is used in order to fix if something is not showing fine on the preview editor panel','FRocket_admin'); ?>"
                           ><span class="fa fa-question-circle"></span></a>
            </div>
        </div>
        <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-col-sm-4">
            <label for=""><?php echo __('REFRESH FORM FROM DATA','FRocket_admin'); ?></label>
            </div>
            <div class="sfdc-col-sm-8">
                <a href="javascript:void(0);"
                   onclick="javascript:rocketform.refreshPreviewSectionFromData();"
                   class="sfdc-btn sfdc-btn-success"
                   ><?php echo __('Refresh From Data','FRocket_admin'); ?></a>
                <a href="javascript:void(0);"
                           data-toggle="tooltip" data-placement="top" 
                           data-original-title="<?php echo __('this is used in order to fix if something is not showing fine on the preview editor panel','FRocket_admin'); ?>"
                           ><span class="fa fa-question-circle"></span></a>
            </div>
        </div>
        <!--<div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-col-sm-4">
            <label for=""><?php echo __('REFRESH AND MIGRATE TO VERSION 3','FRocket_admin'); ?></label>
            <p class="help-block"><?php echo __('Use only if you upgraded from version 2.x to 3','FRocket_admin'); ?></p>
            </div>
            <div class="sfdc-col-sm-8">
                <a href="javascript:void(0);"
                   onclick="javascript:rocketform.migrateToVersion3();"
                   class="sfdc-btn sfdc-btn-success"
                   ><?php echo __('Refresh and migrate','FRocket_admin'); ?></a>
                <a href="javascript:void(0);"
                           data-toggle="tooltip" data-placement="top" 
                           data-original-title="<?php echo __('this is used in order to fix if something is not showing fine on the preview editor panel','FRocket_admin'); ?>"
                           ><span class="fa fa-question-circle"></span></a>
            </div>
        </div>  -->
        <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                 <div class="sfdc-col-sm-4">
                     <label for=""><?php echo __('AUTOSCROLL AFTER LOADING FORM','FRocket_admin'); ?></label>
                 </div>
                <div class="sfdc-col-sm-8">
                    <input class="switch-field"
                                   id="uifm_frm_main_onload_scroll"
                                   name="uifm_frm_main_onload_scroll"
                                   type="checkbox"/>
                     <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('if you want to stop the autoscroll when the form is loaded','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                </div>
            </div>
        </div>
 
    </div>
  <!--  <div class="space10 zgfm-opt-divider-stl1"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                 <div class="sfdc-col-sm-4">
                    <label for=""><?php echo __('ENABLE NO CONFLICT OPTION','FRocket_admin'); ?></label>    
                 </div>
                 <div class="sfdc-col-sm-8">
                    <input class="switch-field"
                                   id="uifm_frm_main_preload_noconflict"
                                   name="uifm_frm_main_preload_noconflict"
                                   type="checkbox"/>
                     <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('if you see something weird when the form is loaded, maybe there is a conflict with your site, just enable this option','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                 </div>   
                     
            </div>
        </div>
        
    </div> -->
    
</div>