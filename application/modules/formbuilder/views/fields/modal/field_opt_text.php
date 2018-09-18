<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://zigapage.softdiscover.com
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

<div id="uifm-field-opt-content">
  
<input type="hidden" id="uifm-field-selected-id" value="<?php echo $field_id;?>">
<input type="hidden" id="uifm-field-selected-type" value="<?php echo $field_type;?>">
 
  <div class="uiform-builder-maintab-container">
                                            <div class="uiform-set-panel-header">
                                            <div class="uiform-set-panel-header-inner">
                                                <div class="sfdc-row">
                                                    <div class="sfdc-col-md-7">
                                                        <div class="uifm-set-section-fieldname">
                                                            <div class="uiform-set-panel-header-fldnme">
                                                                <label for=""><?php echo __('Field name','FRocket_admin'); ?> <a href="javascript:void(0);"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    data-original-title="<?php echo __('This is important to identify the field on reports and conditional logic','FRocket_admin'); ?>"
                                                                    ><span class="fa fa-question-circle"></span></a></label>
                                                                <input type="text" id="uifm_fld_main_fldname" 
                                                                       class="sfdc-form-control" 
                                                                       placeholder="<?php echo __('Type field name','FRocket_admin'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sfdc-col-md-5">
                                                        <div class="uiform-set-panel-header-opts">
                                                        <span> <?php echo __('Options','FRocket_admin'); ?>:</span>
                                                        <div class="sfdc-btn-group ">
                                                            
                                                            <button class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
                                                                    onclick="javascript:rocketform.fieldsetting_deleteFieldDialog();">
                                                                <i class="fa fa-trash-o"></i> <?php echo __('Remove','FRocket_admin'); ?></button>
                                                        </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                         
                                    <div class="uiform-set-panel-container">
                                        <!-- first panel -->
                                            <div class="uiform-set-panel-1 ">
                                                    <div class="uiform-set-options-tabs">
                                                        <!-- Nav tabs -->
                                                        <ul class="sfdc-nav sfdc-nav-tabs" style="left:0;">
                                                        <li class="sfdc-active">
                                                            <a data-uifm-title="label" href="#uiform-settings-tab-1" class="uifm-tab-fld-label" 
                                                            data-toggle="sfdc-tab"><?php echo __('Label','FRocket_admin'); ?></a>
                                                        </li>
                                                        <li><a data-uifm-title="input" href="#uiform-settings-tab-2" 
                                                            class="uifm-tab-fld-input"  
                                                            data-toggle="sfdc-tab" ><?php echo __('Input','FRocket_admin'); ?></a>
                                                        </li>
                                                        <li><a data-uifm-title="helpb" href="#uiform-settings-tab-3" 
                                                            class="uifm-tab-fld-helpblock"  
                                                            data-toggle="sfdc-tab" ><?php echo __('Help Block','FRocket_admin'); ?></a>
                                                        </li>
                                                        <li><a data-uifm-title="validate" href="#uiform-settings-tab-4" 
                                                            class="uifm-tab-fld-validation"  
                                                            data-toggle="sfdc-tab" ><?php echo __('Validators','FRocket_admin'); ?></a>
                                                        </li>       
                                                       
                                                        <li><a data-uifm-title="logic" href="#uiform-settings-tab-6" 
                                                            class="uifm-tab-fld-logicrls"  
                                                            data-toggle="sfdc-tab" ><?php echo __('C.Logic','FRocket_admin'); ?></a>
                                                        </li>
                                                        <li><a data-uifm-title="more" href="#uiform-settings-tab-7" 
                                                            class="uifm-tab-fld-moreopt last-child"  
                                                            data-toggle="sfdc-tab" ><?php echo __('More','FRocket_admin'); ?></a>
                                                        </li>      
                                                        </ul>
                                                        <div class="uifm-tab-navigation" style="display:none;">
                                                            <div>
                                                                <a class="uifm-previous-tab" href="javascript:void(0);" onclick="javascript:rocketform.setScrollTab(1,this);" >Ã¢â€”â‚¬</a>
                                                                <a class="uifm-next-tab" href="javascript:void(0);" onclick="javascript:rocketform.setScrollTab(-1,this);">Ã¢â€“Â¶</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tab panes -->
                                                    <div class="sfdc-tab-content  ">
                                                            <div class="sfdc-tab-pane sfdc-in sfdc-active uifm-tab-fld-label" id="uiform-settings-tab-1">
                                                                <div class="uiform-tab-content scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                        <!--\container -->
                                                                         <?php include('settings_field_label.php');?>
                                                                        <!--\end container -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sfdc-tab-pane uifm-tab-fld-input" id="uiform-settings-tab-2">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                          <!--container -->  
                                                                        <?php include('settings_field_input.php');?>
                                                                        <!--\end container -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="sfdc-tab-pane uifm-tab-fld-helpblock" id="uiform-settings-tab-3">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                         <?php include('settings_field_helpblock.php');?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="sfdc-tab-pane uifm-tab-fld-validation" id="uiform-settings-tab-4">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                        <?php include('settings_field_validate.php');?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="sfdc-tab-pane uifm-tab-fld-logicrls" id="uiform-settings-tab-6">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                       <?php include('settings_form_clogic.php');?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="sfdc-tab-pane uifm-tab-fld-more" id="uiform-settings-tab-7">
                                                                <div class="uiform-tab-content  scroll-pane-arrows">
                                                                    <div class="uiform-tab-content-inner">
                                                                       <?php include('settings_form_more.php');?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!--\ End Tab panes --> 
                                            </div>
                                            <!-- second panel -->
                                           
                                    </div>
                                        </div>
  </div>                                      
 
<script type="text/javascript">
jQuery(function($) 
	{
        $('#zgpb-field-opt-content').find('select.sfm').change( function(){
            var font_sel=$(this).data('stylesFontMenu').uifm_preview_font_change();
            var f_store=$( this ).data('field-store');
            var f_val=JSON.stringify(font_sel);
            zgpb_core.updateModalFieldCoreAndPreview(f_store,f_val);
        });
         
        
	}); 
$uifm(function($) 
	{
           $("#zgpb-field-opt-content .sfdc-input-group-btn > .sfdc-btn").click(function(){
         var element = $(this),
             input=element.find('input');
         if(parseInt(input.val())===0){
            element.addClass('sfdc-active');
            input.val(1);
         }else{
            element.removeClass('sfdc-active'); 
            input.val(0);
         }
    }); 
    
     
            /*radio buttons groups*/
    $("#zgpb-field-opt-content .sfdc-btn-group > .sfdc-btn[data-settings-option='group-radiobutton']").click(function(){
        var element = $(this),
            parent = element.parent();
            parent.children(".sfdc-btn[data-toggle-enable]").removeClass(function(){
                return $(this).data("toggle-enable")
            }).addClass(function(){
                return $(this).data("toggle-disable")
            }).children("input").prop('checked', false);
            element.removeClass($(this).data("toggle-disable")).addClass(element.data("toggle-enable"));
            element.children("input").prop('checked', true);
           
    });    
        
    
	});
</script>

<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>