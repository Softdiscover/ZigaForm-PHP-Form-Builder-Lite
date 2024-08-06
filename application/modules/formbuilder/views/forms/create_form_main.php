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
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
 
<div class="uiform-editing-main clearfix" data-uiform-page="form_edit">
        <div class="uifm-edit-panel-left uifm-edit-panel">
                <div class="uiform-builder-fields">
                    <div 
                        data-intro="<?php echo __('Fields section. Drag and Drop or just click to add to the preview section', 'FRocket_admin'); ?>"
                        class="uiform-sidebar-fields">
                         <?php require 'fields_available.php'; ?>
                    </div>

                </div>
            <div id="uifm-panel-arrow-left" style="" 
                 class="uifm-panel-toggler uifm-panel-toggler-west uifm-layout-toggler-open"
                 title="Close">
                <span class="uifm-arrow uifm-arrow-open" style="display: block; margin-top: 17px;">
                    <i class="fa fa-caret-left"></i>
                </span>
                <span class="uifm-arrow uifm-arrow-closed" style="display: none; margin-top: 17px;">
                    <i class="fa fa-caret-right"></i>
                </span>
            </div>
        </div>
        <div id="zgpb-editor-container" class="uifm-edit-panel-center uifm-edit-panel">
        <div id="uifm_mm_form_not_selected" style="display:none;">
    <div class="content">
    <?php echo __('Form not selected yet. Select one in the Multi-step Manager tab.', 'FRocket_admin'); ?>
    </div>
</div>
            <div class="uiform-builder-preview">
            <div 
                data-intro="<?php echo __('preview section. you can view how the fields will look like and you can change the settings on live mode  ', 'FRocket_admin'); ?>"
                class="uiform-preview-base">
                <?php if ( $is_multistep === 'yes') { ?>
                        <div class="rockfm_form_hook_outertop"></div>
                <?php } ?>
                <div class="uiform-main-form">
                    
                <?php if ( $is_multistep !== 'yes') { ?>
                    <div class="uiform-step-list uiform-wiztheme0" style="display:none;">
                        <ul class="uiform-steps">
                            <li class="uifm-current">
                                <a data-tab-nro="0" href="#uifm-step-tab-0">
                                    <span class="uifm-number">1</span>
                                    <span class="uifm-title"><?php echo __('Tab title', 'FRocket_admin'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                    <?php if ( $is_multistep === 'yes') { ?>
                        <div class="rockfm_form_hook_innertop"></div>
                    <?php } ?>
                    <div class="uiform-step-content" style="min-height:100px;">
                        <div data-uifm-step="0" id="uifm-step-tab-0" class="uiform-step-pane">
                            <div id="" class="uiform-items-container uiform-tab-container">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
               
            </div>
        </div>
        <div class="uifm-edit-panel-right uifm-edit-panel">
           <div class="uiform-builder-data">
              <!-- Nav tabs -->
                            <div class="uiformc-menu-wrap-2">
                                <ul class="sfdc-nav sfdc-nav-tabs">
                                  <li class="sfdc-active"><a href="#uiform-build-form-tab" data-toggle="sfdc-tab"><?php echo __('Form', 'FRocket_admin'); ?></a></li>
                                  <li class="uifm-tab-selectedfield"  style="display:none;"><a href="#uiform-build-field-tab"  data-toggle="sfdc-tab" ><?php echo __('Selected Field', 'FRocket_admin'); ?> </a><i id="uifm-close-setting-tab" class="sfdc-glyphicon sfdc-glyphicon-remove"></i></li>
                                  </ul> 
                            </div>
               <!-- Tab panes -->
                            <div class="sfdc-tab-content" id="zgfm-panel-right-field-tabopt">
                                
                                    <div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-build-form-tab">
                                        <div 
                                            data-intro="<?php echo __('Form settings. you can set all options related to the form', 'FRocket_admin'); ?>"
                                            class="uiform-builder-maintab-container">
                                            <div class="uiform-set-panel-header">
                                            <div class="uiform-set-panel-header-inner">
                                                <div class="sfdc-row">
                                                    <div class="sfdc-col-md-12">
                                                            <div class="uiform-set-panel-header-fldnme">
                                                                <label for=""><?php echo __('Form name', 'FRocket_admin'); ?> 
                                                                    <a data-original-title="This is important to identify the form on backend" 
                                                                       data-placement="right" 
                                                                       data-toggle="tooltip" 
                                                                       href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                                                </label>
                                                                <input type="text" placeholder="Type form name" 
                                                                       class="" 
                                                                       id="uifm_frm_main_title"
                                                                        name="uifm_frm_main_title" >
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                    <div class="uiform-set-panel-container">
                                        <!-- first panel -->
                                            <div class="uiform-set-panel-1 ">
                                                    <!-- Nav tabs -->
                                                    <ul class="sfdc-nav sfdc-nav-tabs">
                                                        <!--<li>
                                                            <a 
                                                                class="uiform-settings-main"
                                                                data-intro="<?php echo __('setting section. you can change the submit mode between ajax and post', 'FRocket_admin'); ?>"
                                                                href="#uiform-settings-tab3-1"
                                                                              data-toggle="tab"><?php echo __('Settings', 'FRocket_admin'); ?></a></li>-->
                                                        <li  class="sfdc-active"><a 
                                                                class="uiform-settings-skin"
                                                                data-intro="<?php echo __('skin section. you can change skin options of your form', 'FRocket_admin'); ?>"
                                                                href="#uiform-settings-tab3-2" data-toggle="sfdc-tab" ><?php echo __('Skin', 'FRocket_admin'); ?></a>
                                                        </li>
                                                        <?php if ( $is_multistep === 'yes') {?>
                                                        <li>
                                                            <a 
                                                                class="uiform-settings-progressbar"
                                                                data-intro="<?php echo __('Add step progress indicator', 'FRocket_admin'); ?>"
                                                                href="#uiform-settings-tab3-6" data-toggle="sfdc-tab" ><?php echo __('Progress Bar', 'FRocket_admin'); ?>
                                                            </a>
                                                        </li>
                                                        <?php }?>
                                                        <?php if ( $is_multistep !== 'yes') {?>
                                                        <li>
                                                            <a 
                                                                class="uiform-settings-wizard"
                                                                data-intro="<?php echo __('wizard section. you can enable the wizard form and add many forms', 'FRocket_admin'); ?>"
                                                                href="#uiform-settings-tab3-3" data-toggle="sfdc-tab" ><?php echo __('Wizard', 'FRocket_admin'); ?>
                                                            </a>
                                                        </li>
                                                        <?php }?>
                                                       
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="sfdc-tab-content  ">

                                                            <!--<div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-settings-tab3-1">
                                                                <div class="uiform-tab-content scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                                            <div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-settings-tab3-2">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                     <!--container -->
                                                                        <?php require 'settings_form_skin.php'; ?>
                                                                    <!--\end container -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if ( $is_multistep !== 'yes') {?>
                                                        <div class="sfdc-tab-pane" id="uiform-settings-tab3-3">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                        <!--container -->
                                                                        <?php require 'settings_form_wizard.php'; ?>
                                                                        <!--\end container -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ( $is_multistep === 'yes') {?>
                                                            <div class="sfdc-tab-pane" id="uiform-settings-tab3-6">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                        <!--container -->
                                                                        <?php require 'settings_form_progressbar.php'; ?>
                                                                        <!--\end container -->
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <?php } ?>
                                                      <!--  <div class="sfdc-tab-pane" id="uiform-settings-tab3-4">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div> --> 
                                                        <!--<div class="sfdc-tab-pane" id="uiform-settings-tab3-5">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                      
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                                    </div>
                                                    <!--\ End Tab panes --> 
                                            </div>
                                            
                                    </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="sfdc-tab-pane" id="uiform-build-field-tab" >
                                        <div class="uiform-builder-maintab-container">
                                            <img src="<?php echo base_url(); ?>assets/backend/image/ajax-loader-black.gif">
                                        </div>
                                    </div>
                            </div>
                            <!--\ End Tab panes --> 
                              
              
           
            </div>
            <div id="uifm-panel-arrow-right" style="" 
                 class="uifm-panel-toggler uifm-panel-toggler-west uifm-layout-toggler-open"
                 title="Close">
                <span class="uifm-arrow uifm-arrow-open" style="display: block; margin-top: 17px;">
                    <i class="fa fa-caret-right"></i>
                </span>
                <span class="uifm-arrow uifm-arrow-closed" style="display: none; margin-top: 17px;">
                    <i class="fa fa-caret-left"></i>
                </span>
            </div>
        </div>
    
</div>

<?php  if ($is_multistep === 'yes') { ?>
    <div id="uiform-mm-set-clogic-tmpl" style="display:none;">
    <select 
                class="uifm_clogic_fieldsel" 
                onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeField(this);" >
        </select>
    
    <input 
        onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeMinput(this);"
        class="uifm_clogic_minput_2" type="text">
    <select 
                class="uifm_clogic_minput_1" 
                onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeMinput(this);" >
        </select>
    <select 
        onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeMtype(this);"
        class="sfdc-form-control uifm_clogic_mtypeinp uifm_clogic_mtypeinp_1">
        <option selected="selected" value="1"><?php echo __('is', 'FRocket_admin'); ?></option>
        <option value="2"><?php echo __('is not', 'FRocket_admin'); ?></option>
    </select>
    <select 
        onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeMtype(this);"
        class="sfdc-form-control uifm_clogic_mtypeinp uifm_clogic_mtypeinp_2">
        <option selected="selected" value="1"><?php echo __('is', 'FRocket_admin'); ?></option>
        <option value="2"><?php echo __('is not', 'FRocket_admin'); ?></option>
        <option value="3"><?php echo __('greater than', 'FRocket_admin'); ?></option>
        <option value="4"><?php echo __('less than', 'FRocket_admin'); ?></option>
    </select>
    
    <div data-row-index="0"
                        class="uifm-conditional-row clearfix">
                        <div class="">
                            <div  class="uifm_clogic_deloption">
                                
                                <a href="javascript:void(0)" class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
                               onclick="javascript:rocketform.getInnerVariable('multistepobj').clogic_deleteConditional(this);" >
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                            <div  class="uifm_clogic_field">
                                
                            </div>
                            
                            <div class="uifm_clogic_mtype">
                                
                            </div>

                            <div  class="uifm_clogic_minput">
                                
                            </div>
                        
                    </div>
                    </div>
</div>

<script type="text/javascript">
  jQuery(window).load(function() {
    rocketform.loadForm_globalSettings_multistep();
    <?php
    if (isset($form_id) && intval($form_id) > 0) {
        ?>
    rocketform.loadFormSavedMultiStep(<?php echo $form_id; ?>);
        <?php
    } else {
        ?>
      
     rocketform.loadNewFormMultiStep();
        <?php if (isset($_GET['opt']) && Uiform_Form_Helper::sanitizeInput($_GET['opt']) === 'import') { ?>
          rocketform.importForm_openModal(); 
        <?php } else { ?>
          rocketform.formsetting_setFieldName(); 
        <?php } ?>  
        <?php
    }

    ?>
            rocketform.loadForm_globalSettings_end();
});
</script>
<?php  }else { ?>
<script type="text/javascript">
  jQuery(window).load(function() {
    rocketform.loadForm_globalSettings();
    <?php
    if (isset($form_id) && intval($form_id) > 0) {
        ?>
    rocketform.loadFormSaved(<?php echo $form_id; ?>);
        <?php
    } else {
        ?>
      
     rocketform.loadNewForm();
        <?php if (isset($_GET['opt']) && Uiform_Form_Helper::sanitizeInput($_GET['opt']) === 'import') { ?>
          rocketform.importForm_openModal(); 
        <?php } else { ?>
          rocketform.formsetting_setFieldName(); 
        <?php } ?>    
        <?php
    }

    ?>
            rocketform.loadForm_globalSettings_end();
});
</script>
<?php  } ?>


<?php
if (isset($form_id) && intval($form_id) > 0) {
    ?>
    
    <?php  if ($is_multistep === 'yes') { ?>
    <input type="hidden" id="uifm_frm_main_id" value="" >
    <?php  } else {?>
    <input type="hidden" id="uifm_frm_main_id" value="<?php echo $form_id; ?>" >
    <?php  }?>



<input type="hidden" id="uifm_frm_mm_main_id" value="<?php echo $form_id; ?>" >
    <?php
} else {
    ?>
<input type="hidden" id="uifm_frm_main_id" value="0" >
<input type="hidden" id="uifm_frm_mm_main_id" value="0" >
    <?php
}
?>
<input type="hidden" id="uifm_frm_main_ismultistep" value="<?php echo $is_multistep; ?>"  >
<input type="hidden" id="uifm_frm_main_isnewform" value="0" >
<input type="hidden" id="uifm_frm_title_required" value="<?php echo __('Title is required', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_msg_notsaved" value="<?php echo __('You need to save the form before seeing the preview', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_msg_desktop_title" value="<?php echo __('Preview for desktops', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_msg_tablet_title" value="<?php echo __('Preview for tablets', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_msg_phone_title" value="<?php echo __('Preview for smartphone', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_import_title" value="<?php echo __('Import form', 'FRocket_admin'); ?>">
<input type="hidden" id="uifm_frm_preview_import_onfail" value="<?php echo __('The import has failed. press the accept button', 'FRocket_admin'); ?>">
<?php  if ($is_multistep === 'yes') { ?>
    <input type="hidden" id="uifm_mm_frm_variables_field" value="<?php echo __('Field', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_codes" value="<?php echo __('Codes', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_label" value="<?php echo __('label', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_input" value="<?php echo __('input', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_quantity" value="<?php echo __('quantity', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_wrapper" value="<?php echo __('wrapper', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_modal_btn_close" value="<?php echo __('Close', 'FRocket_admin'); ?>">
    <input type="hidden" id="uifm_mm_frm_variables_modal_title" value="<?php echo __('Form variables', 'FRocket_admin'); ?>">
    
<?php  } ?>