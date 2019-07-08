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
<div class="">
    <div class="uiform-editing-dashboard">
        
    
    <div class="uiformc-menu-wrap">
        <ul class="sfdc-nav sfdc-nav-tabs">
            <li class="sfdc-active">
                <a data-toggle="sfdc-tab" href="#uiformc-menu-sec1"><?php echo __('Form editor','FRocket_admin'); ?></a></li>
            <li><a data-toggle="sfdc-tab"
                   class="uiform-settings-email"
                   data-intro="<?php echo __('email section. you can set mail options. e.g. the recipient mail','FRocket_admin');?>"
                   href="#uiformc-menu-sec2"><?php echo __('Email Settings','FRocket_admin'); ?></a></li>
            <li><a data-toggle="sfdc-tab"
                   class="uiform-settings-subm"
                   data-intro="<?php echo __('submission section. you can modify the success message and other messages','FRocket_admin');?>"
                   href="#uiformc-menu-sec3"><?php echo __('On Submission','FRocket_admin'); ?></a></li>
            <li><a data-toggle="sfdc-tab"
                   class="uiform-settings-main"
                   data-intro="<?php echo __('main settings','FRocket_admin');?>"
                   href="#uiformc-menu-sec5"><?php echo __('Global settings','FRocket_admin'); ?></a></li> 
        </ul>
    </div>
    <div class="sfdc-tab-content">
        <div id="uiformc-menu-sec1" class="sfdc-tab-pane sfdc-in sfdc-active">
            <!-- editing form -->    
            <?php include('create_form_main.php');?>
            <!--\end editing form -->
        </div>
        <div id="uiformc-menu-sec2" class="sfdc-tab-pane ">
            <div class="uiformc-tab-content-inner">
                <?php include('settings_form_email.php');?>
            </div>
        </div>
        <div id="uiformc-menu-sec3" class="sfdc-tab-pane ">
            <div class="uiformc-tab-content-inner">
               <?php include('settings_form_submission.php');?>
            </div>
        </div>
       
        <div id="uiformc-menu-sec5" class="sfdc-tab-pane ">
           <div class="uiformc-tab-content-inner2">
                    <!-- Nav tabs -->
                    <ul class="sfdc-nav sfdc-nav-tabs zgfm-nav-tabs-settings" role="tablist">
                      <li  class="sfdc-active"><a href="#zgfm-menu-main-tab-1"  role="tab" data-toggle="sfdc-tab"><?php echo __('Main','FRocket_admin'); ?></a></li>
                      <li ><a href="#zgfm-menu-main-tab-2"  role="tab" data-toggle="sfdc-tab"><?php echo __('Import','FRocket_admin'); ?></a></li>
                      <li ><a href="#zgfm-menu-main-tab-4"  class="zgfm_gsettings_additional" role="tab" data-toggle="sfdc-tab"><?php echo __('Additional','FRocket_admin'); ?></a></li>
                      <li ><a href="#zgfm-menu-main-tab-5"  role="tab" data-toggle="sfdc-tab"><?php echo __('PDF','FRocket_admin'); ?></a></li>
                      <li ><a href="#zgfm-menu-main-tab-6"  role="tab" data-toggle="sfdc-tab"><?php echo __('Email','FRocket_admin'); ?></a></li>
                      <li ><a href="#zgfm-menu-main-tab-7"  role="tab" data-toggle="sfdc-tab"><?php echo __('Records','FRocket_admin'); ?></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="sfdc-tab-content">
                      <div  class="sfdc-tab-pane sfdc-in sfdc-active" id="zgfm-menu-main-tab-1">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main.php');?>
                          </div>
                      </div>
                      <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-2">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main_imp.php');?>
                          </div>
                      </div>
                      <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-4">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main_add.php');?>
                          </div>
                      </div>
                      <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-5">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main_pdf.php');?>
                          </div>
                      </div>
                        <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-6">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main_email.php');?>
                          </div>
                      </div>
                      <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-7">
                          <div class="uiformc-tab-content-inner3">
                            <?php  include('settings_form_main_record.php');?>
                          </div>
                      </div>  
                    </div>
                
              
            </div>
        </div>
    </div>
<div id="uiform-editing-mbuttons">
        <?php if(UIFORM_DEBUG===1){?>
     <div class="zgfm-mbuttons-single">
        <div class="sfdc-dropdown">
            <button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo __('Dev Options','FRocket_admin'); ?> 
            <span class="sfdc-caret"></span>
            </button>
            <ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
            <li><a onclick="javascript:rocketform.testing_summbox();"
            href="javascript:void(0);"><?php echo __('test','FRocket_admin'); ?> </a></li>
            <li><a onclick="javascript:rocketform.printmaindata();"
                href="javascript:void(0);"><?php echo __('Show data','FRocket_admin'); ?> </a></li>
           <li><a onclick="javascript:zgfm_back_fld_options.generate_field_htmldata();"
                href="javascript:void(0);"><?php echo __('Generate field static data','FRocket_admin'); ?> </a></li>
            
            </ul>
            </div>
    </div>
     
        <?php }?>
    <div class="zgfm-mbuttons-single">
            <div class="sfdc-dropdown">
            <button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo __('Options','FRocket_admin'); ?> 
            <span class="sfdc-caret"></span>
            </button>
            <ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
            <li><a onclick="javascript:rocketform.rollback_openModal();"
            href="javascript:void(0);"><i class="fa fa-retweet" aria-hidden="true"></i> <?php echo __('Rollback','FRocket_admin');?></a></li>
            <li><a onclick="javascript:rocketform.variables_openModal();"
            href="javascript:void(0);"><i class="fa fa-table" aria-hidden="true"></i> <?php echo __('Variables','FRocket_admin');?></a></li>
            <?php if(ZIGAFORM_F_LITE===0){?>     
            <li><a onclick="javascript:rocketform.clogicgraph_popup();"
            href="javascript:void(0);"><span class="fa fa fa-map"></span> <?php echo __('C.Logic Graph','FRocket_admin');?></a></li>
            <?php }?>
            
            </ul>
            </div>
    </div>
    <div class="zgfm-mbuttons-single">
        <a 
            class="sfdc-btn sfdc-btn-primary"
            onclick="javascript:rocketform.previewform_showForm(1);"
            href="javascript:void(0);">
           <span class="fa fa-desktop"></span> <?php echo __('preview','FRocket_admin');?>
        </a> 
    </div>
    <div class="zgfm-mbuttons-single">
         <a 
            class="sfdc-btn sfdc-btn-success"
            id="uiform-set-button-save"
            onclick="javascript:rocketform.saveForm();"
            href="javascript:void(0);">
            <i class="fa fa-floppy-o"></i> <?php echo __('Save form','FRocket_admin'); ?> 
        </a> 
    </div>
     
        
       
    </div>
    </div>
   
</div>
<!--templates -->    
    <?php include('templates_fields.php');?>
<!--\end templates -->
<!-- modals -->    
    <?php include('create_form_modals.php');?>
<!--\ modals -->
<!-- modals -->    
    <?php include('fieldoptions_data.php');?>
<!--\ modals -->