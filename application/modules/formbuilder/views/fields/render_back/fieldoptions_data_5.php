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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
            <!-- options -->
            <script type="text/html" id="tmpl-zgfm-field-opt-type-5">&lt;div id=&quot;uifm-field-opt-content&quot;&gt;
    &lt;input type=&quot;hidden&quot; id=&quot;uifm-field-selected-id&quot; value=&quot;&quot;&gt;
    &lt;input type=&quot;hidden&quot; id=&quot;uifm-field-selected-type&quot; value=&quot;5&quot;&gt;
    &lt;input type=&quot;hidden&quot; id=&quot;zgpb-field-selected-block&quot; value=&quot;0&quot;&gt;
    &lt;div class=&quot;uiform-builder-maintab-container&quot;&gt;
        
                &lt;div class=&quot;uiform-set-panel-header&quot;&gt;
            &lt;div class=&quot;uiform-set-panel-header-inner&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-7&quot;&gt;
                        &lt;div class=&quot;uifm-set-section-fieldname&quot;&gt;
                            &lt;div class=&quot;uiform-set-panel-header-fldnme&quot;&gt;
                                &lt;label for=&quot;&quot;&gt;Field name &lt;a href=&quot;javascript:void(0);&quot;
                                    data-toggle=&quot;tooltip&quot; data-placement=&quot;right&quot;
                                    data-original-title=&quot;This is important to identify the field on reports and conditional logic&quot;
                                    &gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;&lt;/label&gt;
                                &lt;input type=&quot;text&quot; id=&quot;uifm_fld_main_fldname&quot; 
                                       class=&quot;sfdc-form-control&quot; 
                                       placeholder=&quot;Type field name&quot;&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-col-md-5&quot;&gt;
                        &lt;div class=&quot;uiform-set-panel-header-opts&quot;&gt;
                        &lt;span&gt; Options:&lt;/span&gt;
                        &lt;div class=&quot;sfdc-btn-group &quot;&gt;

                            &lt;button class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;
                                    onclick=&quot;javascript:rocketform.fieldsetting_deleteFieldDialog();&quot;&gt;
                                &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Remove&lt;/button&gt;
                        &lt;/div&gt;  
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt; 
                
        &lt;div class=&quot;uiform-set-panel-container&quot;&gt;
            &lt;div class=&quot;uiform-set-panel-1 &quot;&gt;
            
            &lt;div class=&quot;uiform-set-options-tabs&quot;&gt;
                    &lt;!-- Nav tabs --&gt;
                &lt;ul class=&quot;sfdc-nav sfdc-nav-tabs&quot;&gt;
                  &lt;li class=&quot;sfdc-active&quot;&gt;&lt;a href=&quot;#sfdc-fields-opt-col-1&quot; data-toggle=&quot;sfdc-tab&quot;&gt;Skin&lt;/a&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;a href=&quot;#sfdc-fields-opt-col-2&quot; data-toggle=&quot;sfdc-tab&quot; class=&quot;last-child&quot;&gt;More Options&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt; 
            &lt;/div&gt;
            
            &lt;!-- Tab panes --&gt;
            &lt;div class=&quot;sfdc-tab-content &quot;&gt;
              &lt;div class=&quot;sfdc-tab-pane sfdc-in sfdc-active&quot; id=&quot;sfdc-fields-opt-col-1&quot;&gt;
                  &lt;div class=&quot;uiform-tab-content scroll-pane-arrows&quot;&gt;
                      &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                          &lt;div class=&quot;uiform-set-field-wrap&quot;&gt;
                               &lt;div class=&quot;sfdc-tab-content2&quot;&gt;
                      &lt;div id=&quot;zgpb_fld_col_style_wrapper&quot; style=&quot;display:none;&quot;&gt;

                           &lt;fieldset&gt;
                                &lt;legend&gt;Center &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;

                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable Center position&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable center position&quot; 
                                                       data-placement=&quot;right&quot; 
                                                       data-toggle=&quot;tooltip&quot; 
                                                       href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                     &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-align-show_st&quot;
                                                        id=&quot;zgpb_fld_col_style_st&quot;
                                                        name=&quot;zgpb_fld_col_style_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;

                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable Width&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable Width&quot;
                                                       data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;
                                                        &lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;


                                                    &lt;!-- &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-align-max_width_st&quot;
                                                        id=&quot;zgpb_fld_col_style_maxwidth_st&quot;
                                                        name=&quot;zgpb_fld_col_style_maxwidth_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;--&gt;
                                                &lt;/div&gt; 
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                         &lt;input  
                                                            id=&quot;zgpb_fld_col_style_maxwidth&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-align-max_width&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;

                      &lt;/div&gt;


                      &lt;fieldset&gt;
                                &lt;legend&gt;Margin &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Top&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Top margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_margin_top&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-margin-top&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Bottom&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Bottom margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_margin_bottom&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-margin-bottom&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;left&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Left margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_margin_left&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-margin-left&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;right&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Right margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_margin_right&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-margin-right&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;

                      &lt;fieldset&gt;
                                &lt;legend&gt;Padding &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Top&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Top margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_padding_top&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-padding-top&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Bottom&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Bottom margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_padding_bottom&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-padding-bottom&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;left&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Left margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_padding_left&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-padding-left&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;right&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Right margin (px)&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input  
                                                            id=&quot;zgpb_fld_col_padding_right&quot;
                                                            class=&quot;zgpb_fld_settings_spinner&quot; 
                                                            data-field-store=&quot;skin-padding-right&quot;
                                                            type=&quot;text&quot; &gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt; 


                     &lt;fieldset&gt;
                                &lt;legend&gt;Text &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Color&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Color for texts inner field&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div 
                                                        data-field-store=&quot;skin-text-color&quot;
                                                        class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                               id=&quot;zgpb_fld_col_text_color&quot; 
                                                               name=&quot;zgpb_fld_col_text_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                    &lt;/div&gt;


                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;

                     &lt;fieldset&gt;
                                &lt;legend&gt;Background &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable background&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable background&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-background-show_st&quot;
                                                        id=&quot;zgpb_fld_col_bg_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                     &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Background type&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Choose background type&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                                        &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                             data-toggle=&quot;buttons&quot;&gt;
                                                            &lt;label 
                                                                data-field-store=&quot;skin-background-type&quot;
                                                                data-field-value=&quot;1&quot;
                                                                data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                                data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                                data-settings-option=&quot;sfdc-group-radiobutton&quot;
                                                                id=&quot;zgpb_fld_col_bg_type_1&quot;
                                                                class=&quot;sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn&quot; &gt;
                                                            &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                            &lt;/label&gt;
                                                            &lt;label 
                                                                data-field-store=&quot;skin-background-type&quot;
                                                                data-field-value=&quot;2&quot;
                                                                data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                                data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                                data-settings-option=&quot;sfdc-group-radiobutton&quot;
                                                                id=&quot;zgpb_fld_col_bg_type_2&quot;
                                                                class=&quot;sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn&quot; &gt;
                                                            &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Gradient                                                            &lt;/label&gt;
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                     &lt;div id=&quot;zgpb_fld_col_bg_type_1_cont&quot;&gt;
                                         &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                        &lt;div class=&quot;sfdc-row &quot;&gt;
                                           &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                   &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;label for=&quot;&quot;&gt;Color&lt;/label&gt; 
                                                       &lt;a data-original-title=&quot;Color for background&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                   &lt;/div&gt;
                                                   &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;div 
                                                           data-field-store=&quot;skin-background-cl_solid_color&quot;
                                                           class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                           &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                                  id=&quot;zgpb_fld_col_bg_clsolidcolor&quot; 
                                                                  name=&quot;zgpb_fld_col_bg_clsolidcolor&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                           &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                       &lt;/div&gt;


                                                   &lt;/div&gt;    

                                               &lt;/div&gt;
                                           &lt;/div&gt;
                                       &lt;/div&gt;
                                     &lt;/div&gt;

                                     &lt;div id=&quot;zgpb_fld_col_bg_type_2_cont&quot;&gt;
                                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                        &lt;div class=&quot;sfdc-row &quot;&gt;
                                           &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                   &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;label for=&quot;&quot;&gt;Start color&lt;/label&gt; 
                                                       &lt;a data-original-title=&quot;Start color for background&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                   &lt;/div&gt;
                                                   &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;div 
                                                           data-field-store=&quot;skin-background-cl_start_color&quot;
                                                           class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                           &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                                  id=&quot;zgpb_fld_col_bg_clstartcolor&quot; 
                                                                  name=&quot;zgpb_fld_col_bg_clstartcolor&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                           &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                       &lt;/div&gt;
                                                   &lt;/div&gt;
                                               &lt;/div&gt;
                                           &lt;/div&gt;
                                       &lt;/div&gt;


                                     &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;End color&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;End color for background&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div 
                                                        data-field-store=&quot;skin-background-cl_end_color&quot;
                                                        class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                               id=&quot;zgpb_fld_col_bg_clendcolor&quot; 
                                                               name=&quot;zgpb_fld_col_bg_clendcolor&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                     &lt;/div&gt;

                                      &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Image&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Background image&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                        &lt;div class=&quot;zgpb_fld_col_bg_thumbnail&quot; id=&quot;zgpb_fld_col_bg_srcimg_wrap&quot;&gt;

                                                        &lt;/div&gt;
                                                        &lt;input 
                                                            name=&quot;zgpb_fld_col_bg_imgsource&quot; 
                                                            id=&quot;zgpb_fld_col_bg_imgsource&quot; 
                                                            value=&quot;&quot;                                                
                                                            type=&quot;hidden&quot;&gt;
                                                            &lt;input 
                                                                data-field-store=&quot;skin-background-img_source&quot;
                                                                id=&quot;zgpb_fld_col_bg_imgsourcebtnadd&quot; 
                                                                value=&quot;Update Image&quot; 
                                                                class=&quot;sfdc-btn sfdc-btn-default&quot; 
                                                                type=&quot;button&quot;&gt;
                                                            &lt;a href=&quot;javascript:void(0);&quot;
                                                               onclick=&quot;javascript:rocketform.modal_editfield_col_bg_delimg();&quot;
                                                               class=&quot;sfdc-btn sfdc-btn-default&quot;
                                                               &gt;
                                                                &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt;
                                                            &lt;/a&gt;

                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Size&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Background size&quot;
                                                       data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;
                                                    &lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                       &lt;select 
                                                            data-field-store=&quot;skin-background-img_size_type&quot;
                                                            id=&quot;zgpb_fld_col_bg_sizetype&quot;
                                                            name=&quot;zgpb_fld_col_bg_sizetype&quot;
                                                            class=&quot;sfdc-form-control zgpb-f-setoption&quot;&gt;
                                                                &lt;option value=&quot;0&quot;&gt;auto&lt;/option&gt;
                                                                &lt;option value=&quot;1&quot;&gt;length&lt;/option&gt;
                                                                &lt;option value=&quot;2&quot;&gt;percentage&lt;/option&gt;
                                                                &lt;option value=&quot;3&quot;&gt;cover&lt;/option&gt;
                                                                &lt;option value=&quot;4&quot;&gt;contain&lt;/option&gt;
                                                                &lt;option value=&quot;5&quot;&gt;initial&lt;/option&gt;
                                                                &lt;option value=&quot;6&quot;&gt;inherit&lt;/option&gt;

                                                        &lt;/select&gt; 

                                                        &lt;div id=&quot;zgpb_fld_col_bg_sizetype_len_wrap&quot;&gt;
                                                            &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
                                                            &lt;input type=&quot;text&quot; class=&quot;sfdc-form-control zgpb-f-setoption&quot; 
                                                             name=&quot;zgpb_fld_col_bg_sizetype_len&quot; 
                                                             id=&quot;zgpb_fld_col_bg_sizetype_len&quot; 
                                                             data-field-store=&quot;skin-background-img_size_len&quot;&gt;
                                                        &lt;/div&gt;


                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt; 
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Repeat&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Background repeat&quot;
                                                       data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;
                                                    &lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                       &lt;select 
                                                            data-field-store=&quot;skin-background-img_repeat&quot;
                                                            id=&quot;zgpb_fld_col_bg_repeat&quot;
                                                            name=&quot;zgpb_fld_col_bg_repeat&quot;
                                                            class=&quot;sfdc-form-control zgpb-f-setoption&quot;&gt;
                                                                &lt;option value=&quot;0&quot;&gt;repeat&lt;/option&gt;
                                                                &lt;option value=&quot;1&quot;&gt;repeat-x&lt;/option&gt;
                                                                &lt;option value=&quot;2&quot;&gt;repeat-y&lt;/option&gt;
                                                                &lt;option value=&quot;3&quot;&gt;no-repeat&lt;/option&gt;
                                                                &lt;option value=&quot;4&quot;&gt;initial&lt;/option&gt;
                                                                &lt;option value=&quot;5&quot;&gt;inherit&lt;/option&gt;
                                                        &lt;/select&gt; 

                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Position&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Background position&quot;
                                                       data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;
                                                    &lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                       &lt;input type=&quot;text&quot; class=&quot;sfdc-form-control zgpb-f-setoption&quot; 
                                                             name=&quot;zgpb_fld_col_bg_pos&quot; 
                                                             id=&quot;zgpb_fld_col_bg_pos&quot; 
                                                             data-field-store=&quot;skin-background-img_position&quot;&gt;

                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;

                                &lt;/div&gt;
                     &lt;/fieldset&gt; 

                       &lt;fieldset&gt;
                                &lt;legend&gt;Border &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable Border&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable border&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-border-show_st&quot;
                                                        id=&quot;zgpb_fld_col_border_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;
                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                       &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Color&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Color for border&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;div 
                                                        data-field-store=&quot;skin-border-color&quot;
                                                        class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                               id=&quot;zgpb_fld_col_border_color&quot; 
                                                               name=&quot;zgpb_fld_col_border_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                      &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Border type&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Choose border type&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                       &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                                        &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                             data-toggle=&quot;buttons&quot;&gt;
                                                            &lt;label 
                                                                data-field-store=&quot;skin-border-type&quot;
                                                                data-field-value=&quot;1&quot;
                                                                data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                                data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                                data-settings-option=&quot;sfdc-group-radiobutton&quot;
                                                                id=&quot;zgpb_fld_col_border_type_1&quot;
                                                                class=&quot;sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn&quot; &gt;
                                                            &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                            &lt;/label&gt;
                                                            &lt;label 
                                                                data-field-store=&quot;skin-border-type&quot;
                                                                data-field-value=&quot;2&quot;
                                                                data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                                data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                                data-settings-option=&quot;sfdc-group-radiobutton&quot;
                                                                id=&quot;zgpb_fld_col_border_type_2&quot;
                                                                class=&quot;sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn&quot; &gt;
                                                            &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Dotted                                                            &lt;/label&gt;
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Width&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Border width&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                                    data-field-store=&quot;skin-border-width&quot;
                                                    data-slider-value=&quot;14&quot;
                                                    data-slider-step=&quot;1&quot;
                                                    data-slider-max=&quot;60&quot;
                                                    data-slider-min=&quot;0&quot; 
                                                    data-slider-id=&quot;&quot; 
                                                    id=&quot;zgpb_fld_col_border_width&quot; 
                                                    class=&quot;zgpb-custom-slider&quot;&gt; 
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;

                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;
                       &lt;fieldset&gt;
                                &lt;legend&gt;Border radius &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable border radius&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable border radius&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                      &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-border_radius-show_st&quot;
                                                        id=&quot;zgpb_fld_col_bradius_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;
                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Size&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Drag the slider to increase the size of border radius&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                                    data-field-store=&quot;skin-border_radius-size&quot;
                                                    data-slider-value=&quot;14&quot;
                                                    data-slider-step=&quot;1&quot;
                                                    data-slider-max=&quot;60&quot;
                                                    data-slider-min=&quot;0&quot; 
                                                    data-slider-id=&quot;&quot; 
                                                    id=&quot;zgpb_fld_col_bradius_size&quot; 
                                                    class=&quot;zgpb-custom-slider&quot;&gt; 

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;
                        &lt;fieldset&gt;
                                &lt;legend&gt;Shadow &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Enable shadow&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Enable shadow&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                      &lt;input class=&quot;zgpb-switch-field&quot;
                                                        data-field-store=&quot;skin-shadow-show_st&quot;
                                                        id=&quot;zgpb_fld_col_shadow_st&quot;
                                                        type=&quot;checkbox&quot;/&gt;
                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                     &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Color&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Shadow color&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                     &lt;div 
                                                        data-field-store=&quot;skin-shadow-color&quot;
                                                        class=&quot;sfdc-input-group zgpb-custom-color&quot;&gt;
                                                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                                                               id=&quot;zgpb_fld_col_shadow_color&quot; 
                                                               name=&quot;zgpb_fld_col_shadow_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;

                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                      &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Horizontal&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Drag the slider to modify horizontal value&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                                    data-field-store=&quot;skin-shadow-h_shadow&quot;
                                                    data-slider-value=&quot;14&quot;
                                                    data-slider-step=&quot;1&quot;
                                                    data-slider-max=&quot;60&quot;
                                                    data-slider-min=&quot;0&quot; 
                                                    data-slider-id=&quot;&quot; 
                                                    id=&quot;zgpb_fld_col_shadow_h&quot; 
                                                    class=&quot;zgpb-custom-slider&quot;&gt; 

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                     &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                      &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Vertical&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Drag the slider to modify vertical value&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                                    data-field-store=&quot;skin-shadow-v_shadow&quot;
                                                    data-slider-value=&quot;14&quot;
                                                    data-slider-step=&quot;1&quot;
                                                    data-slider-max=&quot;60&quot;
                                                    data-slider-min=&quot;0&quot; 
                                                    data-slider-id=&quot;&quot; 
                                                    id=&quot;zgpb_fld_col_shadow_v&quot; 
                                                    class=&quot;zgpb-custom-slider&quot;&gt; 

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                      &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                      &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Blur&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Drag the slider to modify blur value&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                                    data-field-store=&quot;skin-shadow-blur&quot;
                                                    data-slider-value=&quot;14&quot;
                                                    data-slider-step=&quot;1&quot;
                                                    data-slider-max=&quot;60&quot;
                                                    data-slider-min=&quot;0&quot; 
                                                    data-slider-id=&quot;&quot; 
                                                    id=&quot;zgpb_fld_col_shadow_blur&quot; 
                                                    class=&quot;zgpb-custom-slider&quot;&gt; 

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;
                  &lt;/div&gt;
                    
                          &lt;/div&gt;
                        
                      &lt;/div&gt;    
                  &lt;/div&gt;
              &lt;/div&gt;
             &lt;div class=&quot;sfdc-tab-pane &quot; id=&quot;sfdc-fields-opt-col-2&quot;&gt;
                  &lt;div class=&quot;uiform-tab-content scroll-pane-arrows&quot;&gt;
                      &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                  &lt;div class=&quot;sfdc-tab-content2&quot;&gt;
                      &lt;fieldset&gt;
                                &lt;legend&gt;Additional &lt;/legend&gt;
                                &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;

                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;ID selector&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;ID selector let you control through css or javascript&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                  &lt;input type=&quot;text&quot; 
                                                          data-field-store=&quot;skin-custom_css-ctm_id&quot;
                                                         id=&quot;zgpb_fld_col_ctmid&quot; name=&quot;zgpb_fld_col_ctmid&quot; placeholder=&quot;&quot; class=&quot;zgpb-field-col-event-txt sfdc-form-control&quot;&gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;CSS class&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;CSS class let you control through css or javascript&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                  &lt;input type=&quot;text&quot; 
                                                         data-field-store=&quot;skin-custom_css-ctm_class&quot;
                                                         id=&quot;zgpb_fld_col_ctmclass&quot; name=&quot;zgpb_fld_col_ctmclass&quot; placeholder=&quot;&quot; class=&quot;zgpb-field-col-event-txt sfdc-form-control&quot;&gt;

                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                     &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                                    &lt;div class=&quot;sfdc-row &quot;&gt;
                                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                    &lt;label for=&quot;&quot;&gt;Additional css&lt;/label&gt; 
                                                    &lt;a data-original-title=&quot;Additional css&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                                &lt;/div&gt;
                                                &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                                  &lt;textarea class=&quot;zgpb-field-col-event-txt sfdc-form-control &quot; 
                                                            data-field-store=&quot;skin-custom_css-ctm_additional&quot;
                                                            style=&quot;width: 100%; height: 200px;&quot; name=&quot;zgpb_fld_ctmaddt&quot; id=&quot;zgpb_fld_ctmaddt&quot;&gt;&lt;/textarea&gt; 
                                                &lt;/div&gt;    

                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                   &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                                &lt;/div&gt;
                     &lt;/fieldset&gt;
                  &lt;/div&gt; 
                      &lt;/div&gt;    
                  &lt;/div&gt;
              &lt;/div&gt;  
            &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&lt;/div&gt;
&lt;script type=&quot;text/javascript&quot;&gt;
zgfm_back_fld_options.selfld_field_opt_column();
&lt;/script&gt;
</script>