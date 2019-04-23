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
 * @link      http://wordpress-form-builder.uiform.com/
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>
 <script type="text/html" id="tmpl-zgpb-modal-field-loader">
	<div id="zgpb-modal-field-loader" >
           <div class="zgpb-loader-header-wrap"> <div class="zgpb-icon-uifm-logo-black"></div> <div class="zgpb-loader-header-1"></div> </div>
	</div>
</script>
 <script type="text/html" id="tmpl-zgpb-quick-options">

                                    <# switch(parseInt(data.type)) { 
                                    /*only columns*/
                                    case 1:
                                    case 2:
                                    case 3:
                                    case 4:
                                    case 5:
                                        #>
                                        <div class="zgpb-fields-quick-options">
                                            <div class="zgpb-fields-quick-options-wrap"> 
                                                <div class="zgpb-fields-quick-options-side1 zgpb-fields-qopt-color1">
                                                     <a class="zgpb-fields-qopt-move uiform-field-move" title="Move field block" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block">
                                                             <# switch(parseInt(data.type)) { 
                                                            /*only columns*/
                                                            case 1:
                                                            case 2:
                                                            case 3:
                                                            case 4:
                                                            case 5:
                                                                #>
                                                            <span><?php echo __('Row','FRocket_admin'); ?></span>
                                                             <# break;
                                                            default:
                                                                #>
                                                            <# } #>
                                                            <i class="fa fa-arrows"></i></span>
                                                      </a>
                                                    <a class="zgpb-fields-qopt-edit" title="Edit" onclick="javascript:rocketform.fields2_fieldQuickOptions_EditField(this,true);" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                    </a>
                                                    <a class="zgpb-fields-qopt-copy" title="Duplicate" onclick="javascript:rocketform.fields2_fieldQuickOptions_DuplicateField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-files-o"></i></span>
                                                    </a>
                                                     <a class="zgpb-fields-qopt-remove" title="Remove" onclick="javascript:rocketform.fields2_fieldQuickOptions_deleteField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-trash-o"></i></span>
                                                      </a> 
                                                </div>
                                                 <div class="zgpb-fields-quick-options-side2 zgpb-fields-qopt-color2">
                                                     <a class="zgpb-fields-qopt-edit" title="Edit field block" onclick="javascript:rocketform.fields2_fieldQuickOptions_EditField(this,false);" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block">
                                                            <# switch(parseInt(data.type)) { 
                                                            /*only columns*/
                                                            case 1:
                                                            case 2:
                                                            case 3:
                                                            case 4:
                                                            case 5:
                                                                #>
                                                            <span><?php echo __('Column','FRocket_admin'); ?></span> 
                                                            <# break;
                                                            default:
                                                                #>
                                                            <# } #>
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                      </a>
                                                </div>
                                         
                                            </div>
                                        </div>
                                      <# break;
                                    case 31:#> 
                                        <div class="zgpb-fields-quick-options">
                                            <div class="zgpb-fields-quick-options-wrap"> 
                                                <div class="zgpb-fields-quick-options-side1 zgpb-fields-qopt-color1">
                                                     <a class="zgpb-fields-qopt-move uiform-field-move" title="Move field block" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block">
                                                            <span><?php echo __('Field','FRocket_admin'); ?></span>
                                                            <i class="fa fa-arrows"></i></span>
                                                      </a>
                                                    <a class="zgpb-fields-qopt-edit" title="Edit" onclick="javascript:rocketform.fields2_fieldQuickOptions_EditField(this,true);" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                    </a>
                                                    <a class="zgpb-fields-qopt-copy" title="Duplicate" onclick="javascript:rocketform.fields2_fieldQuickOptions_DuplicateField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-files-o"></i></span>
                                                    </a>
                                                     <a class="zgpb-fields-qopt-remove" title="Remove" onclick="javascript:rocketform.fields2_fieldQuickOptions_deleteField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-trash-o"></i></span>
                                                      </a> 
                                                </div>
                                                
                                         
                                            </div>
                                        </div>
                                      <# break;
                                    default:
                                        #>
                                        
                                        <div class="zgpb-fields-quick-options2">
                                    <div class="zgpb-fields-quick-options-wrap zgpb-fields-qopt-color3">
                                         <a class="zgpb-fields-qopt-move uiform-field-move" title="Move field block" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><span><?php echo __('Field','FRocket_admin'); ?></span> <i class="fa fa-arrows"></i></span>
                                         </a>
                                         <a class="zgpb-fields-qopt-edit" title="Edit" onclick="javascript:rocketform.fields2_fieldQuickOptions_EditField(this,true);" href="javascript:void(0);">
                                                <span class="zgpb-field-qopt-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                         </a>
                                          <a class="zgpb-fields-qopt-copy" title="Duplicate" onclick="javascript:rocketform.fields2_fieldQuickOptions_DuplicateField('{{data.id}}');" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><i class="fa fa-files-o"></i></span>
                                          </a>
                                        
                                          <a class="zgpb-fields-qopt-remove" title="Remove" onclick="javascript:rocketform.fields2_fieldQuickOptions_deleteField('{{data.id}}');" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><i class="fa fa-trash-o"></i></span>
                                          </a> 
                                    </div>
                                        
                                     <# } #>            
                                        
                                               
                                   
</script>
<script type="text/html" id="tmpl-zgpb-field-hover-hlight">
   <div class="zgpb-fields-hover-hlight-box"></div>

</script>



<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">�</a>
    <a class="next">�</a>
    <a class="close">�</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="sfdc-modal-dialog">
            <div class="sfdc-modal-content">
                <div class="sfdc-modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="sfdc-modal-title"></h4>
                </div>
                <div class="sfdc-modal-body next"></div>
                <div class="sfdc-modal-footer">
                    <button type="button" class="sfdc-btn sfdc-btn-default pull-left prev">
                        <i class="sfdc-glyphicon sfdc-glyphicon-chevron-left"></i>
                        <?php echo __('Previous','FRocket_admin'); ?>
                    </button>
                    <button type="button" class="sfdc-btn sfdc-btn-primary next">
                        <?php echo __('Next','FRocket_admin'); ?>
                        <i class="sfdc-glyphicon sfdc-glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--\ Fields templates -->
<div id="uiform-fields-templates" style="display:none;">
 
    <!--\ Grid System -->
     
      <!--\ one -->
     <div id="" data-typefield="1" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-one uiform-field">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="12"
                        class="zgpb-fl-gs-block-style sfdc-col-md-12">
                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt"></div>
                          <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  
                  </div>
            </div>
        </div>
     <!--\two -->
     <div id="" data-typefield="2" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-two uiform-field">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="6"
                        class="zgpb-fl-gs-block-style sfdc-col-md-6 ">
                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                        <div class="zgpb-fl-gridsystem-opt">
                            <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                            </div>
                            
                        </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="6"
                        class="zgpb-fl-gs-block-style sfdc-col-md-6 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                        </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
         
        </div>
     <!--\three -->
     <div id="" data-typefield="3" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-three uiform-field">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">
                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                             
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                               
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt"></div>
                       <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>
     
      <!--\four -->
     <div id="" data-typefield="4" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-four uiform-field">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">
                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="4"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>
          <!--\ five -->
     <div id="" data-typefield="5" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-five uiform-field">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">
                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="4"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                      <div  
                        data-zgpb-blocknum="5"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                        <div  
                        data-zgpb-blocknum="6"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="uiform-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>
    <!--\ Standard Fields -->
    <!--\ textbox -->
        <div id=""  data-typefield="6" class="uiform-textbox uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <input data-field-store="input-value"
                                   data-field-option="uifm-txtbox-inp-val"
                                   class="uifm-txtbox-inp-val form-control uifm-f-option"
                                   type="text" value="">
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--\ Textarea -->
        <div id=""  data-typefield="7" class="uiform-textarea uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textarea label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textarea sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <textarea data-field-store="input-value"
                                   data-field-option="uifm-txtbox-inp-val"
                                   class="uifm-txtbox-inp-val form-control uifm-f-option"
                                   ></textarea>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
     <!--\ radio button -->
        <div id=""  data-typefield="8" class="uiform-radiobtn uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input2-wrap">
                                <div class="sfdc-radio" data-inp2-opt-index="0">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="radio"
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 1</span>
                                    </label>
                                 </div>
                                <div class="sfdc-radio" data-inp2-opt-index="1">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="radio"
                                            value="" 
                                            name="" 
                                            >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 2</span>
                                    </label>
                                 </div>
                                <div class="sfdc-radio" data-inp2-opt-index="2">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="radio" 
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 3</span>
                                    </label>
                                 </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- checkbox -->
     <div id=""  data-typefield="9" class="uiform-checkbox uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input2-wrap">
                                <div class="sfdc-checkbox" data-inp2-opt-index="0">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="checkbox"
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 1</span>
                                    </label>
                                 </div>
                                <div class="sfdc-checkbox" data-inp2-opt-index="1">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="checkbox"
                                            value="" 
                                            name="" 
                                            >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 2</span>
                                    </label>
                                 </div>
                                <div class="sfdc-checkbox" data-inp2-opt-index="2">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="checkbox" 
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label  uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 3</span>
                                    </label>
                                 </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- select -->
     <div id=""  data-typefield="10" class="uiform-select uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input2-wrap">
                                <select class="sfdc-form-control uifm-input2-opt-main" >
                                    <option data-inp2-opt-index="0" > <?php echo __('option','FRocket_admin'); ?> 1 </option> 
                                    <option data-inp2-opt-index="1"> <?php echo __('option','FRocket_admin'); ?> 2 </option> 
                                    <option data-inp2-opt-index="2"> <?php echo __('option','FRocket_admin'); ?> 3 </option> 
                                </select>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- multiselect -->
     <div id=""  data-typefield="11" class="uiform-multiselect uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input2-wrap">
                                <select class="sfdc-form-control uifm-input2-opt-main" multiple >
                                    <option data-inp2-opt-index="0" > 
                                        <?php echo __('option','FRocket_admin'); ?> 1 
                                    </option> 
                                    <option data-inp2-opt-index="1"> <?php echo __('option','FRocket_admin'); ?> 2 </option> 
                                    <option data-inp2-opt-index="2"> <?php echo __('option','FRocket_admin'); ?> 3 </option> 
                                </select>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- File upload -->
     <div id=""  data-typefield="12" class="uiform-fileupload uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-fileinput-wrap">
                                <div class="fileinput fileinput-new sfdc-input-group" data-provides="fileinput-test">
                                <div class="sfdc-form-control" data-trigger="fileinput">
                                    <i class="sfdc-glyphicon sfdc-glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="sfdc-input-group-addon sfdc-btn sfdc-btn-default btn-file">
                                    <span class="fileinput-new"><?php echo __('Select file','FRocket_admin'); ?></span>
                                    <span class="fileinput-exists"><?php echo __('Change','FRocket_admin'); ?></span>
                                    <input type="file" name="..."></span>
                                <a href="#" class="sfdc-input-group-addon sfdc-btn sfdc-btn-default fileinput-exists" 
                                   data-dismiss="fileinput"><?php echo __('Remove','FRocket_admin'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- Image upload -->
     <div id=""  data-typefield="13" class="uiform-imageupload uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-fileinput-wrap">
                               <div class="fileinput fileinput-new" data-provides="fileinput-test">
                                <div class="fileinput-preview sfdc-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="sfdc-btn sfdc-btn-default btn-file">
                                        <span class="fileinput-new"><?php echo __('Select image','FRocket_admin'); ?></span>
                                        <span class="fileinput-exists"><?php echo __('Change','FRocket_admin'); ?></span>
                                        <input type="file" name="..."></span>
                                    <a href="#" class="sfdc-btn sfdc-btn-default fileinput-exists" 
                                       data-dismiss="fileinput"><?php echo __('Remove','FRocket_admin'); ?></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- Custom html -->
     <div id=""  data-typefield="14" class="uiform-customhtml uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input3-customhtml">
                                
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
      <!-- Password -->
     <div id=""  data-typefield="15" class="uiform-password uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <input data-field-store="input-value"
                                   data-field-option="uifm-txtbox-inp-val"
                                   class="uifm-txtbox-inp-val form-control uifm-f-option"
                                   type="password" value="">
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- Prepended text -->
     <div id=""  data-typefield="28" class="uiform-preptext uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="sfdc-input-group">
                                <div class="sfdc-input-group-addon uifm-inp-preptxt">@</div>
                                <input data-field-store="input-value"
                                   data-field-option="uifm-txtbox-inp-val"
                                   class="uifm-txtbox-inp-val form-control uifm-f-option"
                                   type="text" value="">
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- Appended text -->
     <div id=""  data-typefield="29" class="uiform-appetext uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="sfdc-input-group">
                                <input data-field-store="input-value"
                                   data-field-option="uifm-txtbox-inp-val"
                                   class="uifm-txtbox-inp-val form-control uifm-f-option"
                                   type="text" value="">
                                <div class="sfdc-input-group-addon uifm-inp-apptxt">@</div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- Prepended and Appended text -->
     <div id=""  data-typefield="30" class="uiform-prepapptext uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="sfdc-input-group">
                                    <div class="sfdc-input-group-addon uifm-inp-preptxt">@</div>
                                    <input data-field-store="input-value"
                                    data-field-option="uifm-txtbox-inp-val"
                                    class="uifm-txtbox-inp-val form-control uifm-f-option"
                                    type="text" value="">
                                    <div class="sfdc-input-group-addon uifm-inp-apptxt">@</div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- slider -->
     <div id=""  data-typefield="16" class="uiform-slider uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input4-wrap">
                                    <div class="uifm-inp4-number"></div>
                                    <input class="uifm-inp4-fld" 
                                           type="text"
                                           data-check-hash=""
                                           />
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- range -->
     <div id=""  data-typefield="17" class="uiform-range uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input4-wrap">
                                    <input 
                                           type="text" 
                                           class="uifm-inp4-fld" 
                                           data-check-hash=""
                                           />
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- spinner -->
     <div id=""  data-typefield="18" class="uiform-spinner uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input4-wrap">
                                   <input class="uifm-inp4-fld"
                                          type="text"
                                          data-check-hash="">
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- captcha -->
     <div id=""  data-typefield="19" class="uiform-captcha uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                 <div class="uifm-inp6-captcha">
                                <div class="uifm-inp6-wrap-imagegen">
                                <img width="175" 
                                    height="60" 
                                    title="CAPTCHA" 
                                    alt="CAPTCHA"
                                    src="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver=eyJjYV90eHRfZ2VuIjoiN3BmcTcifQ==" 
                                    class="uifm-inp6-captcha-img" 
                                    >

                                    <input type="hidden" 
                                        value="L14qrGTc45G1Tb50" 
                                        class="uifm-inp6-captcha-code">

                            <div class="uifm-inp6-wrap-refrescaptcha">
                                    <a  title="Refresh captcha" 
                                        rel="nofollow"
                                        data-rkver="eyJjYV90eHRfZ2VuIjoiN3BmcTcifQ=="
                                        data-rkurl="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver="
                                        onclick="javascript:rocketform.input6settings_refreshCaptcha(this);"
                                        href="javascript:void(0);">
                                        <i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                            <div class="uifm-inp6-wrap-input-source"> 
                                <input type="text" 
                                    size="6" 
                                    data-check-hash=""
                                    class="sfdc-form-control uifm-inp6-captcha-inputcode">
                                <label for="rockfm-inp6-captcha-inputcode" 
                                    class="rockfm-inp6-captcha-label"><?php echo __('CAPTCHA Code','FRocket_admin'); ?></label>
                                <span ><i class="sfdc-glyphicon sfdc-glyphicon-asterisk"></i></span>
                            </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- Re captcha -->
     <div id=""  data-typefield="27" class="uiform-recaptcha uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input5-wrap">
                                   <div class="uifm-input-recaptcha" ></div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
  <!-- Date picker -->
     <div id=""  data-typefield="24" class="uiform-datepicker uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input7-wrap">
                                     <div class="sfdc-form-group">
                                        <div class="uifm-input7-datepic sfdc-input-group date">
                                            <input type="text" class="sfdc-form-control">
                                            <span class="sfdc-input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
  <!-- Time picker -->
     <div id=""  data-typefield="25" class="uiform-timepicker uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input7-wrap">
                                    <div class="sfdc-form-group">
                                        <div class="uifm-input7-timepic sfdc-input-group date">
                                            <input type="text" class="sfdc-form-control">
                                            <span class="sfdc-input-group-addon">
                                                <span class="sfdc-glyphicon sfdc-glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- Date Time picker -->
     <div id=""  data-typefield="26" class="uiform-datetime uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input7-wrap">
                                    <div class="sfdc-form-group">
                                        <div class="uifm-input7-datetimepic sfdc-input-group date">
                                            <input type="text" class="sfdc-form-control">
                                            <span class="sfdc-input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- Submit button -->
     <div id=""  data-typefield="20" class="uiform-submitbtn uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            
                               <input 
                                   class="sfdc-btn uifm-txtbox-inp-val"
                                   type="submit" 
                                   value="Submit button">
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- hidden input -->
     <div id=""  data-typefield="21" class="uiform-hiddeninput uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-12">
                        <input type="text" value="" class="uifm-txtbox-inp8-val form-control" readonly>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- Star rating -->
     <div id=""  data-typefield="22" class="uiform-ratingstar uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                              <input class="uifm-input-ratingstar"
                                     data-min="1" 
                                     data-max="5" 
                                     data-step="1">
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- Color picker -->
     <div id=""  data-typefield="23" class="uiform-colorpicker uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                              <div class="sfdc-input-group uiform-colorpicker-wrap">
                                <input type="text" value="" 
                                         class="sfdc-form-control" />
                                <span class="sfdc-input-group-addon"><i></i></span>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- Divider -->
     <div id=""  data-typefield="32" class="uiform-divider uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-12">
                        <div class="uiform-divider-bar">
                            <span class="uiform-divider-text"></span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- heading 1 -->
     <div id=""  data-typefield="33" class="uiform-heading1 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h1 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H1 here','FRocket_admin'); ?></h1>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <!-- heading 2 -->
     <div id=""  data-typefield="34" class="uiform-heading2 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h2 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H2 here','FRocket_admin'); ?></h2>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <div id=""  data-typefield="35" class="uiform-heading3 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h3 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H3 here','FRocket_admin'); ?></h3>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <div id=""  data-typefield="36" class="uiform-heading4 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h4 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H4 here','FRocket_admin'); ?></h4>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <div id=""  data-typefield="37" class="uiform-heading5 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h5 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H5 here','FRocket_admin'); ?></h5>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     <div id=""  data-typefield="38" class="uiform-heading6 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2" style="display: none;">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">
                            <div class="uifm-input-heading-wrap">
                                <h6 class="uifm-txtbox-inp-val"><?php echo __('Type your heading H6 here','FRocket_admin'); ?></h6>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- wizard button -->
     <div id=""  data-typefield="39" class="uiform-wizardbtn uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">                               
                            <button class="sfdc-btn uiform-btn-wizprev uifm-txtbox-inp13-val">
                                    <i class="fa fa-arrow-left"></i>
                                    <div class="uifm-inp-lbl"><?php echo __('Prev','FRocket_admin'); ?></div>
                            </button>
                            <button class="sfdc-btn uiform-btn-wiznext uifm-txtbox-inp12-val">
                                   <div class="uifm-inp-lbl"><?php echo __('Next','FRocket_admin'); ?></div>
                                    <i class="fa fa-arrow-right"></i>
                            </button>								
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- Switch -->
     <div id=""  data-typefield="40" class="uiform-switch uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input15-wrap">
                                <input 
                                   class="uifm-inp15-fld"
                                   type="checkbox"/>
                            </div>
                            <span class="uifm_frm_price_lbl_cont"></span>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- dyn checkbox -->
     <div id=""  data-typefield="41" class="uiform-dyncheckbox uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input17-wrap">
                               <div 
                                   data-thopt-height="100"
                                   data-thopt-width="100"
                                   class="uiform-opt-din-chkbox uifm-dcheckbox-group " >
                                
                                </div>
                            </div>
                            <span class="uifm_frm_price_lbl_cont"></span>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <!-- dyn radiobtn -->
     <div id=""  data-typefield="42" class="uiform-dynradiobtn uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                            <div class="uifm-input17-wrap">
                               <div data-thopt-height="100"
                                   data-thopt-width="100" class="uiform-opt-din-rdobox uifm-dradiobtn-group" >
                                
                                </div>
                            </div>
                            <span class="uifm_frm_price_lbl_cont"></span>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- panel field -->
     <div id=""  data-typefield="31" data-iscontainer="1" class="uiform-panelfld uiform-field  uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                 <div class="uifm-input31-wrap">
                                <div class="uifm-input31-container">
                                     <div class="rkfm-inp18-row">
                                         <div class="rkfm-inp18-col-sm-5">
                                             <div class="uifm-inp31-txthtml-content"></div>
                                         </div>
                                         <div class="rkfm-inp18-col-sm-7">
                                             <div class="uifm-input31-main-wrap">
                                                 <div class="uiform-items-container uiform-grid-inner-col">
   
                                                 </div>
   
                                             </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                 
            </div>
        </div> 
   
    <!-- Date Time picker 2-->
     <div id=""  data-typefield="43" class="uiform-datetime2 uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                <div class="uifm-input7-wrap">
                                    <div class="sfdc-form-group">
                                        <div class="uifm-input-flatpickr sfdc-input-group date">
                                            <input type="text" class="sfdc-form-control" data-input>
                                            <span class="sfdc-input-group-addon" data-toggle>
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                             <span class="sfdc-input-group-addon" data-clear>
                                                <span class="fa fa-times"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="modaltemplate" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="sfdc-modal-dialog">
      <div class="sfdc-modal-content">
         <div class="sfdc-modal-header">
            <button type="button" class="sfdc-close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="sfdc-modal-title" id="myModalLabel">
              <span class="fa fa-question-circle"></span>
            </h4>
         </div>
         <div class="sfdc-modal-body">
           
         </div>
         <div class="sfdc-modal-footer">
            <button type="button" class="sfdc-btn sfdc-btn-default" 
               data-dismiss="modal"><?php echo __('Close','FRocket_admin'); ?>
            </button>
           
         </div>
      </div><!-- /.modal-content -->
</div>
</div><!-- /.modal --> 

</div><!--\ Fields templates -->
   
 <div style="display:none;">
     
    <div class="zgpb-hidden-editor">
            <?php //wp_editor(' ', 'zgpbrefeditor', array('wpautop' => true)); ?>
        <textarea 
                            class=""
                            name="zgpbrefeditor"
                            id="zgpbrefeditor"></textarea>
    </div>
    
</div> 
<div class="sfdc-wrap">
     <!-- Modal -->
    <div class="sfdc-modal sfdc-fade" id="zgpb-modal1" role="dialog">
      <div class="sfdc-modal-dialog">

        <!-- Modal content-->
        <div class="sfdc-modal-content zgpb-scroll-pane-arrows">
          <div class="sfdc-modal-header" >
            <button type="button" class="sfdc-close" data-dismiss="modal">&times;</button>
            <div class="zgpb-modal-header-inner">
                <img src="<?php echo base_url();?>assets/backend/image/ajax-loader-black.gif"/>
            </div>
          </div>
          <div class="sfdc-modal-body" style="padding:40px 50px;">
                <img src="<?php echo base_url();?>assets/backend/image/ajax-loader-black.gif"/>
          </div>
          <div class="sfdc-modal-footer">
                 <div class="zgpb-modal-footer-wrap">
                    <img src="<?php echo base_url();?>assets/backend/image/ajax-loader-black.gif"/>
              </div>
          </div>
        </div>

      </div>
    </div> 
</div>
<div style="display:none;">
    
    
    <input type="hidden" id="zgpb_fld_del_box_title" value="<?php echo __('Delete field selected','FRocket_admin'); ?>" >
    <input type="hidden" id="zgpb_fld_del_box_msg" value="<?php echo __('Are you sure?','FRocket_admin'); ?>" >
    <input type="hidden" id="zgpb_fld_del_box_bt1_title" value="<?php echo __('Cancel','FRocket_admin'); ?>" >
    <input type="hidden" id="zgpb_fld_del_box_bt2_title" value="<?php echo __('Yes','FRocket_admin'); ?>" >
</div>
<div id="zgpb_confirmation-func-action-dialog" style="display: none;">
    <?php echo __('Are you sure about this?','FRocket_admin'); ?>
</div>

<!--  template option input 2--->
<div id="uifm_frm_inp2_templates" style="display:none;">
    <div data-opt-index="0" class="uifm-fld-inp2-options-row clearfix">
        <div class="sfdc-col-md-1">
            <input type="checkbox" 
                class="uifm_frm_inp2_opt_checked"   
                value="1"
                onclick="javascript:rocketform.input2settings_statusRdoOption(this);"
                id="uifm_frm_inp2_opt0_rdo">
        </div>
        <div class="sfdc-col-md-5">
            <div class="sfdc-form-group">
                <textarea id="uifm_frm_inp2_opt0_label"
                            onkeyup="rocketform.input2settings_labelOption(this);"
                            onfocus="rocketform.input2settings_labelOption(this);"
                            onchange="rocketform.input2settings_labelOption(this);"
                            class="uifm_frm_inp2_opt_label_evt col-md-12"
                            placeholder="<?php echo __('Type label','FRocket_admin'); ?>"  class="sfdc-form-control"></textarea>
            </div>
        </div>
        <div class="sfdc-col-md-4">
            <div class="sfdc-form-group">
                    <input type="text" 
                            id="uifm_frm_inp2_opt0_value"
                            onkeyup="rocketform.input2settings_valueOption(this);"
                            onfocus="rocketform.input2settings_valueOption(this);"
                            onchange="rocketform.input2settings_valueOption(this);"
                            class="uifm_frm_inp2_opt_value_evt col-md-12"
                            placeholder="<?php echo __('Type value','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
        <div class="sfdc-col-md-2">
            <a href="javascript:void(0);"
            class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
            onclick="javascript:rocketform.input2settings_deleteOption(this);"
            >
                <i class="fa fa-trash-o"></i> 
            </a>
        </div>
    </div>
    <div class="sfdc-radio" data-inp2-opt-index="0">
                                    <label>
                                        <input class="uifm-inp2-rdo" type="radio" 
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 3</span>
                                    </label>
                                 </div>
    <div class="sfdc-checkbox" data-inp2-opt-index="0">
                                    <label>
                                        <input class="uifm-inp2-chk" type="checkbox" 
                                            value="" 
                                            name="" 
                                             >
                                        <span class="uifm-inp2-label uifm-input2-opt-main"><?php echo __('option','FRocket_admin'); ?> 3</span>
                                    </label>
                                 </div>
</div>
<!--/ template option input 2 --> 
<!--  template option input 17--->
<div id="uifm_frm_inp17_templates" style="display:none;">
    <div class="uifm-fld-inp17-options-row clearfix" data-opt-index="0">
        <div class="sfdc-col-md-1">
            <input type="checkbox" 
                   data-option-store="checked"
                   onclick="javascript:rocketform.input17settings_enableCheckOption(this);"
                   value="1" class="uifm_frm_inp17_opt_ckeck">
            <div class="space10"></div>
                <a onclick="javascript:rocketform.input17settings_deleteOption(this);"
                   class="sfdc-btn sfdc-btn-sm sfdc-btn-danger" href="javascript:void(0);">
                    <i class="fa fa-trash-o"></i> 
                </a>

        </div>
        <div class="sfdc-col-md-11">
            <div class="sfdc-col-md-12">
                <div class="sfdc-col-md-12">
                    <textarea 
                        onkeyup="rocketform.input17settings_onChangeOption(this);"
                    onfocus="rocketform.input17settings_onChangeOption(this);"
                    onchange="rocketform.input17settings_onChangeOption(this);"
                        data-option-store="label"
                        class="sfdc-form-control autogrow uifm_frm_inp17_opt_label" 
                        style="width: 100%; height: 34px;" 
                        placeholder="Type your content" ></textarea>
                </div>

            </div>
             
            <div class="space10"></div>
            <div class="sfdc-col-md-12 uifm_frm_inp17_opt_img_list_1">
                <div class="sfdc-col-md-12">
                        <div class="sfdc-form-group">
                        <label><?php echo __('Images','FRocket_admin'); ?></label>
                        <a href="javascript:void(0);" class="sfdc-btn sfdc-btn-sm sfdc-btn-success"
                    onclick="javascript:rocketform.input17settings_addNewImg(this);">
                    <i class="fa fa-plus-square"></i> <?php echo __('Add new','FRocket_admin'); ?>
                </a>
                        <div class="space10"></div>
                        <div class="uifm_frm_inp17_opt_img_list_wrap clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="sfdc-col-md-12 uifm_frm_inp17_opt_img_list_2">
                <div class="sfdc-col-md-12">
                        <div class="sfdc-form-group">
                        <label><?php echo __('Images','FRocket_admin'); ?></label>
                        <div class="space10"></div>
                        <div class="uifm_frm_inp17_opt_img_list_2_wrap clearfix">
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <div class="uifm_frm_inp17_opt_imgwrap clearfix" data-opt-index="0" >
        <div class="sfdc-col-md-3">
        <div class="uifm_frm_inp17_opt_imgitem">
            <img class="sfdc-img-thumbnail" src="">
            <div class="uifm_frm_inp17_opt_imgitem_addsrc">
                <a href="javascript:void(0);" class="sfdc-btn sfdc-btn-sm sfdc-btn-info"
                    onclick="javascript:rocketform.input17settings_changeSrcImg(this);">
                    <i class="fa fa-pencil-square-o"></i> 
                </a>
            </div>
        </div>
        </div>
        <div class="sfdc-col-md-8">
            <textarea class="sfdc-form-control autogrow uifm_frm_inp17_opt_imgitem_title"
                      onkeyup="rocketform.input17settings_labelOption(this);"
                    onfocus="rocketform.input17settings_labelOption(this);"
                    onchange="rocketform.input17settings_labelOption(this);"
                              style="width: 100%; height: 34px;" 
                              placeholder="Type your content" ></textarea>
        </div>
        <div class="sfdc-col-md-1">
            
        </div>
            <div class="uifm_frm_inp17_opt_imgitem_del">
                <a href="javascript:void(0);" class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
                    onclick="javascript:rocketform.input17settings_delImglistIndex(this);">
                    <i class="fa fa-trash-o"></i> 
                </a>
            </div>
    </div>
     <div class="uifm_frm_inp17_opt2_imgwrap clearfix" data-opt-index="0" >
        <div class="sfdc-col-md-3">
            <div class="uifm_frm_inp17_opt_imgitem">
                <img class="sfdc-img-thumbnail" src="">
                <div class="uifm_frm_inp17_opt_imgitem_addsrc">
                    <a href="javascript:void(0);" class="sfdc-btn sfdc-btn-sm sfdc-btn-info"
                        onclick="javascript:rocketform.input17settings_changeSrcImg(this);">
                        <i class="fa fa-pencil-square-o"></i> 
                    </a>
                </div>
            </div>
        </div>
        <div class="sfdc-col-md-8">
            <p class="sfdc-alert sfdc-alert-info">Custom Option</p>
        </div>
         
            
    </div>
    <!--  item --->
                                    <div 
                                        data-gal-id="blueimp-gallery" 
                                        data-backend="1"
                                        data-opt-label=""
                                        data-opt-checked=""
                                        data-opt-price=""
                                        data-opt-qtyst=""
                                        data-opt-qtymax=""
                                        data-inp17-opt-index="0"
                                        data-toggle="tooltip" data-placement="bottom" data-html="true" title="Checkbox content"
                                        class="uifm-dcheckbox-item">
                                        <div class="uifm-dcheckbox-label uifm-dcheckbox-label-up"></div>
                                        <div class="uifm-dcheckbox-item-wrap">
                                            
                                            <div class="uifm-dcheckbox-item-chkst sfdc-btn-default">
                                                <i class="fa fa-square-o"></i>
                                            </div>
                                            <div style="display:none" class="uifm-dcheckbox-item-qty-wrap">
                                                <div class="sfdc-input-group">
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="decrease">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <input type="text" 
                                                               data-max="40"
                                                               data-min="1"
                                                               class="uifm-dcheckbox-item-qty-num" value="1">   
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="increase">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uifm-dcheckbox-item-showgallery  sfdc-btn-primary">
                                              <i class="sfdc-glyphicon sfdc-glyphicon-search"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-nextimg sfdc-btn-primary">
                                                <i class="fa fa-chevron-right"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-previmg sfdc-btn-primary">
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <div style="display: none;">
                                                <input class="uifm-dcheckbox-item-chkval" type="checkbox"  value="0">
                                            </div>
                                            <!-- image gallery -->
                                            <div style="display:none;">
                                                <div class="uifm-dcheckbox-item-gal-imgs">
                                               </div>
                                            </div>
                                            <canvas 
                                                data-uifm-nro="0"
                                                width="100" height="100" class="uifm-dcheckbox-item-viewport"></canvas>
                                        </div>
                                        <div class="uifm-dcheckbox-label uifm-dcheckbox-label-below"></div>
                                    </div>
    <div 
                                        data-gal-id="blueimp-gallery" 
                                        data-backend="1"
                                        data-opt-isrdobtn="1"
                                        data-opt-label=""
                                        data-opt-checked=""
                                        data-opt-price=""
                                        data-opt-qtyst=""
                                        data-opt-qtymax=""
                                        data-inp17-opt-index="0"
                                        data-toggle="tooltip" data-placement="bottom" data-html="true" title="Checkbox content"
                                        class="uifm-dradiobtn-item">
                                        <div class="uifm-dcheckbox-label uifm-dcheckbox-label-up"></div>
                                        <div class="uifm-dcheckbox-item-wrap">
                                            
                                            <div class="uifm-dcheckbox-item-chkst sfdc-btn-default">
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div style="display:none" class="uifm-dcheckbox-item-qty-wrap">
                                                <div class="sfdc-input-group">
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="decrease">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <input type="text" 
                                                               data-max="40"
                                                               data-min="1"
                                                               class="uifm-dcheckbox-item-qty-num" value="1">   
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="increase">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uifm-dcheckbox-item-showgallery  sfdc-btn-primary">
                                              <i class="sfdc-glyphicon sfdc-glyphicon-search"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-nextimg sfdc-btn-primary">
                                                <i class="fa fa-chevron-right"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-previmg sfdc-btn-primary">
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <div style="display: none;">
                                                <input class="uifm-dcheckbox-item-chkval" type="checkbox"  value="0">
                                            </div>
                                            <!-- image gallery -->
                                            <div style="display:none;">
                                                <div class="uifm-dcheckbox-item-gal-imgs">
                                               </div>
                                            </div>
                                            <canvas 
                                                data-uifm-nro="0"
                                                width="100" height="100" class="uifm-dcheckbox-item-viewport"></canvas>
                                        </div>
                                        <div class="uifm-dcheckbox-label uifm-dcheckbox-label-below"></div>
                                    </div>
                                    <!--/ end item --->
    <a 
                data-inp17-opt2-index="0"
                href="" 
                class="uifm-dcheckbox-item-imgsrc"
                title="" data-gallery="">
                <img src=""></a>
   
</div>
<!--/ template option input 17--> 
<script type="text/javascript">
                         jQuery(document).ready(function($) {
                           
                        }); 
                    </script>