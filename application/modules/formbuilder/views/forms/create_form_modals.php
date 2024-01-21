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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_preview_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="sfdc-modal-title"></h4>

            </div>
            <div class="sfdc-modal-body"><div class="te"></div></div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-default"
                        onclick="javascript:rocketform.previewform_onClosePopUp();"
                        data-dismiss="modal"><?php echo __('Close', 'FRocket_admin'); ?></button>
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.previewform_resizeBox(1);"
                        ><?php echo __('Desktop', 'FRocket_admin'); ?></button>
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.previewform_resizeBox(2);"
                        ><?php echo __('Tablet', 'FRocket_admin'); ?></button>
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.previewform_resizeBox(3);"
                        ><?php echo __('Smartphone', 'FRocket_admin'); ?></button>
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_form_import_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="sfdc-modal-title"></h4>

            </div>
            <div class="sfdc-modal-body">
                <textarea id="uifm_frm_importform_code" 
                               rows="10" 
                               style="width: 100%; padding: 5px; min-height: 92px;"></textarea>
            </div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.importForm_loadForm();"
                        ><?php echo __('Load form', 'FRocket_admin'); ?></button>
               
                
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_form_import_onfail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                 <h4 class="sfdc-modal-title"></h4>

            </div>
            <div class="sfdc-modal-body">
                
            </div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.importForm_onfailExit();"
                        ><?php echo __('Accept', 'FRocket_admin'); ?></button>
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_form_setting_setfname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                 <h4 class="sfdc-modal-title">
                     <?php echo __('Set Form name', 'FRocket_admin'); ?>
                 </h4>
            </div>
            <div class="sfdc-modal-body">
                <div id="uifm-poup-setfname-container">
                    <div class="sfdc-form-group">
                        <label for=""><?php echo __('Form name', 'FRocket_admin'); ?></label>
                        <input type="text" class="sfdc-form-control" id="uifm-popup-setfname" placeholder="Type Field name">
                        <p class="help-block"><?php echo __('e.g. My custom form', 'FRocket_admin'); ?></p>
                    </div>
                </div>
            </div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-primary"
                        onclick="javascript:rocketform.formsetting_setFieldName_check();"
                        ><?php echo __('Accept', 'FRocket_admin'); ?></button>
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<div style="display:none;"id="uiform-hidden-box-tools">
 <div class="uiform-newform-help-highlight">
    <span class="uifm-text-one"><?php echo __('Drag and Drop the fields to this area ', 'FRocket_admin'); ?></span>
    <span class="uifm-text-two"><?php echo __('or just click the button fields to add it here ', 'FRocket_admin'); ?></span>
    </div>   
    <div id="uiform-clogicgraph" title="<?php echo __('Conditional Logic graph', 'FRocket_admin'); ?>"></div>
    
</div>
