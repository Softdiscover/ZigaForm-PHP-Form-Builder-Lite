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
            <!-- options -->
            <script type="text/html" id="tmpl-zgfm-field-opt-type-9">
&lt;div id=&quot;uifm-field-opt-content&quot;&gt;
  
&lt;input type=&quot;hidden&quot; id=&quot;uifm-field-selected-id&quot; value=&quot;&quot;&gt;
&lt;input type=&quot;hidden&quot; id=&quot;uifm-field-selected-type&quot; value=&quot;9&quot;&gt;
 
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
                                        &lt;!-- first panel --&gt;
                                            &lt;div class=&quot;uiform-set-panel-1 &quot;&gt;
                                                    &lt;div class=&quot;uiform-set-options-tabs&quot;&gt;
                                                        &lt;!-- Nav tabs --&gt;
                                                        &lt;ul class=&quot;sfdc-nav sfdc-nav-tabs&quot; style=&quot;left:0;&quot;&gt;
                                                        &lt;li class=&quot;sfdc-active&quot;&gt;
                                                            &lt;a data-uifm-title=&quot;label&quot; href=&quot;#uiform-settings-tab-1&quot; class=&quot;uifm-tab-fld-label&quot; 
                                                            data-toggle=&quot;sfdc-tab&quot;&gt;Label&lt;/a&gt;
                                                        &lt;/li&gt;
                                                        &lt;li&gt;&lt;a data-uifm-title=&quot;input&quot; href=&quot;#uiform-settings-tab-2&quot; 
                                                            class=&quot;uifm-tab-fld-input&quot;  
                                                            data-toggle=&quot;sfdc-tab&quot; &gt;Input&lt;/a&gt;
                                                        &lt;/li&gt;
                                                        &lt;li&gt;&lt;a data-uifm-title=&quot;helpb&quot; href=&quot;#uiform-settings-tab-3&quot; 
                                                            class=&quot;uifm-tab-fld-helpblock&quot;  
                                                            data-toggle=&quot;sfdc-tab&quot; &gt;Help Block&lt;/a&gt;
                                                        &lt;/li&gt;
                                                        &lt;li&gt;&lt;a data-uifm-title=&quot;validate&quot; href=&quot;#uiform-settings-tab-4&quot; 
                                                            class=&quot;uifm-tab-fld-validation&quot;  
                                                            data-toggle=&quot;sfdc-tab&quot; &gt;Validators&lt;/a&gt;
                                                        &lt;/li&gt;       
                                                        
                                                        &lt;li&gt;&lt;a data-uifm-title=&quot;logic&quot; href=&quot;#uiform-settings-tab-6&quot; 
                                                            class=&quot;uifm-tab-fld-logicrls&quot;  
                                                            data-toggle=&quot;sfdc-tab&quot; &gt;C.Logic&lt;/a&gt;
                                                        &lt;/li&gt;
                                                        &lt;li&gt;&lt;a data-uifm-title=&quot;more&quot; href=&quot;#uiform-settings-tab-7&quot; 
                                                            class=&quot;uifm-tab-fld-moreopt last-child&quot;  
                                                            data-toggle=&quot;sfdc-tab&quot; &gt;More&lt;/a&gt;
                                                        &lt;/li&gt;      
                                                        &lt;/ul&gt;
                                                        &lt;div class=&quot;uifm-tab-navigation&quot; style=&quot;display:none;&quot;&gt;
                                                            &lt;div&gt;
                                                                &lt;a class=&quot;uifm-previous-tab&quot; href=&quot;javascript:void(0);&quot; onclick=&quot;javascript:rocketform.setScrollTab(1,this);&quot; &gt;&amp;lt;&lt;/a&gt;
                                                                &lt;a class=&quot;uifm-next-tab&quot; href=&quot;javascript:void(0);&quot; onclick=&quot;javascript:rocketform.setScrollTab(-1,this);&quot;&gt;&amp;gt;&lt;/a&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                    &lt;!-- Tab panes --&gt;
                                                    &lt;div class=&quot;sfdc-tab-content  &quot;&gt;
                                                            &lt;div class=&quot;sfdc-tab-pane sfdc-in sfdc-active uifm-tab-fld-label&quot; id=&quot;uiform-settings-tab-1&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                        &lt;!--\container --&gt;
                                                                         &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-field-lbl-panel&quot;&gt;
        
    &lt;div class=&quot;uifm-set-section-label&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_lbl_txt&quot;&gt;Label text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;div class=&quot;uifm-set-section-label-lbltxt&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;label-text&quot;
                               id=&quot;uifm_fld_lbl_txt&quot;
                               name=&quot;uifm_fld_lbl_txt&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot; &gt;
                            &lt;select data-field-store=&quot;label-size&quot;
                                    id=&quot;uifm_fld_lbl_size&quot;
                                    data-width=&quot;80px&quot;
                                    name=&quot;uifm_fld_lbl_size&quot;
                                    data-live-search=&quot;true&quot; 
                                    data-style=&quot;sfdc-btn-primary&quot; 
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;label-bold&quot;
                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_lbl_bold&quot;
                                       name=&quot;uifm_fld_lbl_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button data-field-store=&quot;label-italic&quot;
                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_lbl_italic&quot; name=&quot;uifm_fld_lbl_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;label-underline&quot;
                                     class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                     type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_lbl_u&quot; name=&quot;uifm_fld_lbl_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Color&lt;/label&gt;
                    &lt;div data-field-store=&quot;label-color&quot; class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input 
                            type=&quot;text&quot; 
                            value=&quot;&quot; 
                            id=&quot;uifm_fld_lbl_color&quot; 
                            name=&quot;uifm_fld_lbl_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Font&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                        &lt;!--&lt;input type=&quot;hidden&quot;
                               value=&quot;&quot;
                               id=&quot;uifm_fld_lbl_font&quot;
                               name=&quot;uifm_fld_lbl_font&quot;&gt;--&gt;
                                                

&lt;select name=&quot;uifm_fld_lbl_font&quot;id=&quot;uifm_fld_lbl_font&quot;data-field-store=&quot;label-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;label-font_st&quot;
                            id=&quot;uifm_fld_lbl_font_st&quot;
                            name=&quot;uifm_fld_lbl_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Shadow&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;label-shadow_st&quot;
                                   id=&quot;uifm_fld_lbl_sha_st&quot;
                                   name=&quot;uifm_fld_lbl_sha_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;label-shadow_color&quot;  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_fld_lbl_sha_co&quot;
                                                        name=&quot;uifm_fld_lbl_sha_co&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                            
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                           &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;horizontal&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                             data-field-store=&quot;label-shadow_x&quot;
                                        id=&quot;uifm_fld_lbl_sha_x&quot;
                                       name=&quot;uifm_fld_lbl_sha_x&quot;      
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                          &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;vertical&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                           data-field-store=&quot;label-shadow_y&quot;  
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_fld_lbl_sha_y&quot;
                                        name=&quot;uifm_fld_lbl_sha_y&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;blur&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                        data-field-store=&quot;label-shadow_blur&quot;     
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_fld_lbl_sha_blur&quot;
                                        name=&quot;uifm_fld_lbl_sha_blur&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class=&quot;uifm-set-section-sublabel&quot;&gt;
    &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Sub label&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_lbl_txt&quot;&gt;Sublabel text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;div class=&quot;uifm-set-section-label-sublbltxt&quot;&gt;
                             &lt;input type=&quot;text&quot;
                               data-field-store=&quot;sublabel-text&quot;
                               id=&quot;uifm_fld_sublbl_txt&quot;
                               name=&quot;uifm_fld_sublbl_txt&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot; &gt;
                            &lt;select 
                                data-field-store=&quot;sublabel-size&quot;
                                id=&quot;uifm_fld_sublbl_size&quot;
                                name=&quot;uifm_fld_sublbl_size&quot;
                                data-live-search=&quot;true&quot;
                                data-width=&quot;80px&quot;
                                data-style=&quot;sfdc-btn-primary&quot;
                                class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button 
                                    data-field-store=&quot;sublabel-bold&quot;
                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; 
                                       id=&quot;uifm_fld_sublbl_bold&quot; 
                                       name=&quot;uifm_fld_sublbl_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button 
                                data-field-store=&quot;sublabel-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; 
                                type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot;
                                       id=&quot;uifm_fld_sublbl_italic&quot; 
                                       name=&quot;uifm_fld_sublbl_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button 
                                data-field-store=&quot;sublabel-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; 
                                type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot;
                                       id=&quot;uifm_fld_sublbl_u&quot;
                                       name=&quot;uifm_fld_sublbl_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Color&lt;/label&gt;
                    &lt;div data-field-store=&quot;sublabel-color&quot; 
                         class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; 
                               value=&quot;&quot; 
                               id=&quot;uifm_fld_sublbl_color&quot;
                               name=&quot;uifm_fld_sublbl_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text font&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_sublbl_font&quot;id=&quot;uifm_fld_sublbl_font&quot;data-field-store=&quot;sublabel-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;sublabel-font_st&quot;
                            id=&quot;uifm_fld_sublbl_font_st&quot;
                            name=&quot;uifm_fld_sublbl_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
   &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text shadow&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;sublabel-shadow_st&quot;
                                   id=&quot;uifm_fld_sublbl_sha_st&quot;
                                   name=&quot;uifm_fld_sublbl_sha_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;sublabel-shadow_color&quot;  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_fld_sublbl_sha_co&quot;
                                                        name=&quot;uifm_fld_sublbl_sha_co&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                           &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;x&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                             data-field-store=&quot;sublabel-shadow_x&quot;
                                        id=&quot;uifm_fld_sublbl_sha_x&quot;
                                       name=&quot;uifm_fld_sublbl_sha_x&quot;      
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;y&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                           data-field-store=&quot;sublabel-shadow_y&quot;  
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_fld_sublbl_sha_y&quot;
                                        name=&quot;uifm_fld_sublbl_sha_y&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;blur&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                        data-field-store=&quot;sublabel-shadow_blur&quot;     
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_fld_sublbl_sha_blur&quot;
                                        name=&quot;uifm_fld_sublbl_sha_blur&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class=&quot;uifm-set-section-blocktxt&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Text Block&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot; id=&quot;uifm_fld_lbl_blo_pos_opts&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Block position&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-primary&quot;
                        data-toggle-disable=&quot;sfdc-btn-primary&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_blo_pos_1&quot; 
                           name=&quot;uifm_fld_lbl_blo_pos&quot;   
                           value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-hand-o-left&quot;&gt;&lt;/i&gt;Left                    &lt;/label&gt;
                    &lt;label
                        data-field-store=&quot;txt_block-block_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-primary&quot;
                        data-toggle-disable=&quot;sfdc-btn-primary&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_blo_pos_2&quot; 
                           name=&quot;uifm_fld_lbl_blo_pos&quot; 
                           value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-hand-o-up&quot;&gt;&lt;/i&gt;Top                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-primary&quot;
                        data-toggle-disable=&quot;sfdc-btn-primary&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_blo_pos_3&quot; 
                           name=&quot;uifm_fld_lbl_blo_pos&quot;  
                           value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-hand-o-right&quot;&gt;&lt;/i&gt;Right                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-primary&quot;
                        data-toggle-disable=&quot;sfdc-btn-primary&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_blo_pos_4&quot; 
                           name=&quot;uifm_fld_lbl_blo_pos&quot;  
                           value=&quot;3&quot;&gt; &lt;i class=&quot;fa fa-hand-o-down&quot;&gt;&lt;/i&gt;Bottom                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
&lt;div id=&quot;uifm_fld_lbl_glay_container&quot; style=&quot;display:none&quot;  class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Grid layout of label block when is on left or right position&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_1&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;   
                           value=&quot;1&quot;&gt; 1|11                    &lt;/label&gt;
                    &lt;label
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_2&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot; 
                           value=&quot;2&quot;&gt;  2|10                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_3&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;3&quot;&gt;  3|9                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_4&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;4&quot;&gt;  4|8                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_5&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;5&quot;&gt;  5|7                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_6&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;6&quot;&gt;  6|6                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_7&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;7&quot;&gt;  7|5                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_8&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;8&quot;&gt;  8|4                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_9&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;9&quot;&gt;  9|3                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_10&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;10&quot;&gt;  10|2                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-grid_layout&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_lbl_glay_pos_11&quot; 
                           name=&quot;uifm_fld_lbl_glay_pos&quot;  
                           value=&quot;11&quot;&gt;  11|1                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Show Block&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;input class=&quot;switch-field&quot;
                       data-field-store=&quot;txt_block-block_st&quot;
                       name=&quot;uifm_fld_lbl_block_st&quot;
                       id=&quot;uifm_fld_lbl_block_st&quot;
                       type=&quot;checkbox&quot; checked/&gt;
            &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Block alignment&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_align&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  id=&quot;uifm_fld_lbl_blo_align_1&quot; name=&quot;uifm_fld_lbl_blo_align&quot; value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_align&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  id=&quot;uifm_fld_lbl_blo_align_2&quot; name=&quot;uifm_fld_lbl_blo_align&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;txt_block-block_align&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  id=&quot;uifm_fld_lbl_blo_align_3&quot; name=&quot;uifm_fld_lbl_blo_align&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
&lt;/div&gt;
 &lt;script type=&quot;text/javascript&quot;&gt;
      jQuery(function($) 
        {    
           $(&quot;#uifm_fld_lbl_blo_pos_opts label&quot;).on(&quot;click&quot;, function(){
                let tmp_val=$(this).find(&#039;input&#039;).attr(&#039;value&#039;);
                $(&#039;#uifm_fld_lbl_glay_container&#039;).hide();
                switch(parseInt(tmp_val)){
                    case 1:

                    break;
                    case 2:
                    $(&#039;#uifm_fld_lbl_glay_container&#039;).show();
                    break;
                    case 3:
                    break;
                    case 0:
                    default:
                    $(&#039;#uifm_fld_lbl_glay_container&#039;).show();
                    break;

                }
          });
            
        });
    
    
&lt;/script&gt;  
                                                                        &lt;!--\end container --&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                            &lt;div class=&quot;sfdc-tab-pane uifm-tab-fld-input&quot; id=&quot;uiform-settings-tab-2&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content  scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                          &lt;!--container --&gt;  
                                                                        &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-field-input-panel&quot;&gt;
     &lt;!--container for text box, textarea ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-inputprepend&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Prepend&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               id=&quot;uifm_fld_input_prep_ed&quot;
                               placeholder=&quot;Text&quot;
                               class=&quot;sfdc-form-control&quot;&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_prep_ed&quot;
                                data-option=&quot;1&quot;
                                data-pos=&quot;1&quot;
                                data-field-store=&quot;input-prepe_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
             &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                       &lt;button class=&quot;sfdc-btn sfdc-btn-default&quot; 
                    data-iconset=&quot;glyphicon&quot;
                    data-placement=&quot;left&quot;
                    data-icon=&quot;glyphicon-asterisk&quot;
                    id=&quot;uifm_fld_input_prep_icon1&quot;
                    role=&quot;iconpicker&quot;&gt;
                &lt;/button&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_prep_icon1&quot;
                                data-option=&quot;2&quot;
                                data-pos=&quot;1&quot;
                                data-field-store=&quot;input-prepe_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
             &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                       &lt;button class=&quot;sfdc-btn sfdc-btn-default&quot;
                    data-placement=&quot;left&quot;
                    data-iconset=&quot;fontawesome&quot;
                    id=&quot;uifm_fld_input_prep_icon2&quot;
                    role=&quot;iconpicker&quot;&gt;
                &lt;/button&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_prep_icon2&quot;
                                data-option=&quot;3&quot;
                                data-pos=&quot;1&quot;
                                data-field-store=&quot;input-prepe_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;center&gt;
                &lt;div id=&quot;uifm_fld_input_prep_preview&quot;&gt;@&lt;/div&gt;
            &lt;button 
                data-source-txt=&quot;uifm_fld_input_prep_preview&quot;
                                data-option=&quot;4&quot;
                                data-pos=&quot;1&quot;
                                data-field-store=&quot;input-prepe_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;&gt; &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Clean&lt;/button&gt;
                
            &lt;/center&gt;
            
            &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_input_prep&quot; value=&quot;&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;uifm-set-section-inputappend&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Append&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               id=&quot;uifm_fld_input_appe_ed&quot;
                               placeholder=&quot;Text&quot;
                               class=&quot;sfdc-form-control&quot;&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_appe_ed&quot;
                                data-option=&quot;1&quot;
                                data-pos=&quot;2&quot;
                                data-field-store=&quot;input-append_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
             &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                       &lt;button class=&quot;sfdc-btn sfdc-btn-default&quot; 
                    data-iconset=&quot;glyphicon&quot;
                    data-placement=&quot;left&quot;
                    data-icon=&quot;glyphicon-asterisk&quot;
                    id=&quot;uifm_fld_input_appe_icon1&quot;
                    role=&quot;iconpicker&quot;&gt;
                &lt;/button&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_appe_icon1&quot;
                                data-option=&quot;2&quot;
                                data-pos=&quot;2&quot;
                                data-field-store=&quot;input-append_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
             &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                       &lt;button class=&quot;sfdc-btn sfdc-btn-default&quot;
                    data-placement=&quot;left&quot;
                    data-iconset=&quot;fontawesome&quot;
                    id=&quot;uifm_fld_input_appe_icon2&quot;
                    role=&quot;iconpicker&quot;&gt;
                &lt;/button&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button  
                                data-source-txt=&quot;uifm_fld_input_appe_icon2&quot;
                                data-option=&quot;3&quot;
                                data-pos=&quot;2&quot;
                                data-field-store=&quot;input-append_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-plus-square&quot;&gt;&lt;/i&gt; Add                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;center&gt;
                &lt;div id=&quot;uifm_fld_input_appe_preview&quot;&gt;@&lt;/div&gt;
            &lt;button 
                data-source-txt=&quot;uifm_fld_input_appe_preview&quot;
                                data-option=&quot;4&quot;
                                data-pos=&quot;2&quot;
                                data-field-store=&quot;input-append_txt&quot;
                                onclick=&quot;rocketform.inputsettings_addingPrepAppe(this);&quot;
                class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;&gt; &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Clean&lt;/button&gt;
                
            &lt;/center&gt;
            
            &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_input_prep&quot; value=&quot;&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

    &lt;div class=&quot;uifm-set-section-inputtextbox&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Input&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_lbl_txt&quot;&gt;Text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;div class=&quot;uifm-set-section-input1-txtvalue&quot;&gt;
                             &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input-value&quot;
                               id=&quot;uifm_fld_input_value&quot;
                               name=&quot;uifm_fld_inp_value&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;   
                        &lt;/div&gt;
                            &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;select data-field-store=&quot;input-size&quot;
                                    id=&quot;uifm_fld_inp_size&quot;
                                    name=&quot;uifm_fld_inp_size&quot;
                                    data-live-search=&quot;true&quot;
                                    data-style=&quot;sfdc-btn-primary&quot;
                                    data-width=&quot;80px&quot;
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;input-bold&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp_bold&quot; name=&quot;uifm_fld_inp_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp_italic&quot; name=&quot;uifm_fld_inp_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp_u&quot; name=&quot;uifm_fld_inp_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                        
                        
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input-placeh&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_inp_pholdr&quot;&gt;Place holder&lt;/label&gt;
                     &lt;input 
                            data-field-store=&quot;input-placeholder&quot;
                            type=&quot;text&quot; 
                            id=&quot;uifm_fld_inp_pholdr&quot; 
                            name=&quot;uifm_fld_inp_pholdr&quot;  
                            placeholder=&quot;&quot;
                            class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;   
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;    
    
        
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Color&lt;/label&gt;
                    &lt;div 
                        data-field-store=&quot;input-color&quot;
                        class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                               id=&quot;uifm_fld_inp_color&quot; 
                               name=&quot;uifm_fld_inp_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Font family&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_inp_font&quot;id=&quot;uifm_fld_inp_font&quot;data-field-store=&quot;input-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input-font_st&quot;
                            id=&quot;uifm_fld_inp_font_st&quot;
                            name=&quot;uifm_fld_inp_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class=&quot;uifm-set-section-input-valign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Input value alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_align_1&quot;
                                    name=&quot;uifm_fld_inp_align_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_align_2&quot;
                                    name=&quot;uifm_fld_inp_align_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_align_3&quot; 
                                    name=&quot;uifm_fld_inp_align_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;    
    &lt;div class=&quot;uifm-set-section-input-objalign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Button alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_objalign_1&quot;
                                    name=&quot;uifm_fld_inp_objalign_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_objalign_2&quot;
                                    name=&quot;uifm_fld_inp_objalign_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp_objalign_3&quot; 
                                    name=&quot;uifm_fld_inp_objalign_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-inputboxbg&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Background&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Background color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;el_background-show_st&quot;
                                   id=&quot;uifm_fld_elbg_st&quot;
                                   name=&quot;uifm_fld_elbg_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Type&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                 data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg_type_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg_type_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Gradient                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el_background-solid_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_fld_elbg_color_1&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Start color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el_background-start_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot; value=&quot;&quot;
                                                        id=&quot;uifm_fld_elbg_color_2&quot;
                                                        name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;End color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el_background-end_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        id=&quot;uifm_fld_elbg_color_3&quot;
                                                        type=&quot;text&quot; value=&quot;&quot; name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-inputboxborder&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Border&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border radius&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el_border_radius-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbora_st&quot;
                                   id=&quot;uifm_fld_elbora_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                   data-field-store=&quot;el_border_radius-size&quot;
                                   data-slider-value=&quot;14&quot;
                                   data-slider-step=&quot;1&quot;
                                   data-slider-max=&quot;60&quot;
                                   data-slider-min=&quot;0&quot; 
                                   data-slider-id=&quot;&quot; 
                                   id=&quot;uifm_fld_elbora_size&quot; 
                                   class=&quot;uiform-opt-slider&quot;&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el_border-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbor_st&quot;
                                   id=&quot;uifm_fld_elbor_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el_border-color&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor_color&quot;
                                                        id=&quot;uifm_fld_elbor_color&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color (focus)&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el_border-color_focus&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor_colorfocus&quot;
                                                        id=&quot;uifm_fld_elbor_colorfocus&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon tooltip-option-enable&quot;&gt;
                                                &lt;input 
                                                data-field-store=&quot;el_border-color_focus_st&quot;
                                                id=&quot;uifm_fld_elbor_colorfocus_st&quot;
                                                name=&quot;uifm_fld_elbor_colorfocus_st&quot;
                                                class=&quot;uifm-f-setoption-st&quot;
                                                value=&quot;1&quot;
                                                type=&quot;checkbox&quot;&gt;
                                                &lt;/span&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;border style&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor_style_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot; checked&gt;Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor_style_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot;&gt;  Dotted                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Border width&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input 
                                        data-field-store=&quot;el_border-width&quot;  
                                        type=&quot;text&quot; style=&quot;width:100%;&quot;
                                        data-slider-value=&quot;14&quot;
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;20&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; 
                                        id=&quot;uifm_fld_elbor_width&quot;
                                        class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container for options ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input2&quot;&gt;
    &lt;div id=&quot;uifm-section-input2-custom-opts-theme1&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;&quot;&gt;Settings label option&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot; style=&quot;width:0.01%;&quot;&gt;
                            &lt;select data-field-store=&quot;input2-size&quot;
                                    id=&quot;uifm_fld_inp2_size&quot;
                                    name=&quot;uifm_fld_inp2_size&quot;
                                    data-live-search=&quot;true&quot;
                                    data-width=&quot;150px&quot;
                                    data-style=&quot;sfdc-btn-primary&quot;
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;input2-bold&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp2_bold&quot; name=&quot;uifm_fld_inp2_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input2-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp2_italic&quot; name=&quot;uifm_fld_inp2_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input2-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp2_u&quot; name=&quot;uifm_fld_inp2_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Color&lt;/label&gt;
                    &lt;div 
                        data-field-store=&quot;input2-color&quot;
                        class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                               id=&quot;uifm_fld_inp2_color&quot; 
                               name=&quot;uifm_fld_inp2_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Font family&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_inp2_font&quot;id=&quot;uifm_fld_inp2_font&quot;data-field-store=&quot;input2-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input2-font_st&quot;
                            id=&quot;uifm_fld_inp2_font_st&quot;
                            name=&quot;uifm_fld_inp2_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    
    &lt;/div&gt;
    &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Options&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
   &lt;div class=&quot;uifm-set-section-input2-optbox&quot;&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;a href=&quot;javascript:void(0);&quot;
               onclick=&quot;javascript:rocketform.input2settings_addNewRdoOption();&quot;
               class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-success&quot;
               &gt;Add new option&lt;/a&gt;
            &lt;button onclick=&quot;javascript:rocketform.input2settings_deleteAllOptions();&quot; 
                    class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;&gt;
             &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Remove all options&lt;/button&gt;
             &lt;button onclick=&quot;javascript:rocketform.input2settings_fillBlankValues();&quot; 
                    class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-success&quot;&gt;
             &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Copy Label to Value&lt;/button&gt;
             &lt;button onclick=&quot;javascript:rocketform.input2settings_ImportBulkData();&quot; 
                    class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-warning&quot;&gt;
             &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Import bulk data&lt;/button&gt;
        &lt;/div&gt;
        &lt;/div&gt;
       &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
       &lt;div class=&quot;sfdc-clearfix&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                &lt;div class=&quot;sfdc-col-md-1&quot;&gt;
                    &lt;label &gt;Check&lt;/label&gt;   
                &lt;/div&gt;
                &lt;div class=&quot;sfdc-col-md-1&quot;&gt;
                    &lt;/div&gt;
                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                    &lt;label &gt;Label&lt;/label&gt;   
                &lt;/div&gt;
                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                    &lt;label &gt;Value&lt;/label&gt;   
                &lt;/div&gt;
                &lt;div class=&quot;sfdc-col-md-2&quot;&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div id=&quot;uifm-fld-inp2-options-container&quot;&gt;
            &lt;/div&gt;
        &lt;/div&gt;
       
   &lt;/div&gt; 
    &lt;div id=&quot;uifm-fld-inp2-block-align-box&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                &lt;label &gt;Block alignment&lt;/label&gt;
                &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                    &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                        &lt;label 
                            data-field-store=&quot;input2-block_align&quot;
                            data-toggle-enable=&quot;sfdc-btn-success&quot;
                            data-toggle-disable=&quot;sfdc-btn-success&quot;
                            data-settings-option=&quot;group-radiobutton&quot;
                            class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                        &lt;input type=&quot;radio&quot;  
                            id=&quot;uifm_fld_inp2_blo_align_1&quot;
                            value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Block                        &lt;/label&gt;
                        &lt;label 
                            data-field-store=&quot;input2-block_align&quot;
                            data-toggle-enable=&quot;sfdc-btn-success&quot;
                            data-toggle-disable=&quot;sfdc-btn-success&quot;
                            data-settings-option=&quot;group-radiobutton&quot;
                            class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                        &lt;input type=&quot;radio&quot;  
                            id=&quot;uifm_fld_inp2_blo_align_2&quot;
                            value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Inline                        &lt;/label&gt;

                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
      &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Theme&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
   &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
             &lt;label &gt;Choose Theme&lt;/label&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                &lt;select class=&quot;sfdc-form-control uifm-f-setoption&quot;
                        data-field-store=&quot;input2-style_type&quot;
                        id=&quot;uifm_fld_inp2_style_type&quot;&gt;
                    &lt;option value=&quot;0&quot;&gt;Default&lt;/option&gt;
                    &lt;option value=&quot;1&quot;&gt;Theme 1&lt;/option&gt;
                    &lt;option value=&quot;2&quot;&gt;Theme 2&lt;/option&gt;
                &lt;/select&gt;
            &lt;/div&gt;
        &lt;/div&gt; 
    &lt;/div&gt;
    
    
    
      &lt;div class=&quot;uifm-set-section-input2-stl1&quot;&gt;
         &lt;div class=&quot;sfdc-row&quot;&gt;
             &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                  &lt;label &gt;Theme 1&lt;/label&gt;
                 &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Icon&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                       &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                           &lt;div 
                                               id=&quot;uifm_fld_inp2_stl1_icmark&quot;
                                                data-field-store=&quot;input2-stl1-icon_mark&quot;
                                                class=&quot;sfdc-btn sfdc-btn-default&quot; 
                                                data-placement=&quot;top&quot;
                                                data-iconset=&quot;fontawesome&quot;
                                                
                                               data-search=&quot;true&quot; data-search-text=&quot;Search...&quot; role=&quot;iconpicker&quot;&gt;&lt;/div&gt;
                                           
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Border Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;input2-stl1-border_color&quot;  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_fld_inp2_stl1_brdcolor&quot;
                                                        name=&quot;uifm_fld_inp2_stl1_brdcolor&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Background Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;input2-stl1-bg_color&quot;  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_fld_inp2_stl1_bgcolor&quot;
                                                        name=&quot;uifm_fld_inp2_stl1_bgcolor&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Icon Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;input2-stl1-icon_color&quot;  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_fld_inp2_stl1_iconcolor&quot;
                                                        name=&quot;uifm_fld_inp2_stl1_iconcolor&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Icon Size&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                         &lt;input  
                                            id=&quot;uifm_fld_inp2_stl1_size&quot;
                                            data-field-store=&quot;input2-stl1-size&quot;
                                            class=&quot;uifm_fld_inp2_stl1&quot;
                                            type=&quot;text&quot; &gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;  
                 &lt;/div&gt;
             &lt;/div&gt;
         &lt;/div&gt;
    &lt;/div&gt;
    

    
   
    
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container for custom html ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input3&quot;&gt;
   &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                &lt;label class=&quot;sfdc-control-label&quot; for=&quot;&quot;&gt;
                    Custom html content                &lt;/label&gt;
                &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                        &lt;textarea 
                            class=&quot;uifm_tinymce_obj&quot;
                            name=&quot;uifm_fld_inp3_html&quot;
                            id=&quot;uifm_fld_inp3_html&quot;&gt;&lt;/textarea&gt;
                &lt;/div&gt;
                                   
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container for custom html ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input4&quot;&gt;
   
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Minimum&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_opt1&quot;
                        data-field-store=&quot;input4-set_min&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; &gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Maximum&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_opt2&quot;
                        data-field-store=&quot;input4-set_max&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; &gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                &lt;div class=&quot;uifm-set-section-input4-defaultvalue&quot;&gt;
        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Default value&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_opt3&quot;
                        data-field-store=&quot;input4-set_default&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; value=&quot;&quot;&gt;
                &lt;/div&gt;
    &lt;/div&gt;
                
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Step&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_opt4&quot;
                        data-field-store=&quot;input4-set_step&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; value=&quot;&quot;&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;uifm-set-section-input4-spinner-opts&quot;&gt;  
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                 
        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Decimals&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_decimals&quot;
                        data-field-store=&quot;input4-set_decimal&quot;
                        class=&quot;uifm_fld_inp2_stl1&quot;
                        type=&quot;text&quot; value=&quot;0&quot;&gt;
                &lt;/div&gt;
     
                
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                 
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
            
    &lt;div class=&quot;uifm-set-section-input4-range&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Range 1&lt;/label&gt;
                    &lt;input  
                        id=&quot;uifm_fld_inp4_spinner_opt5&quot;
                        data-field-store=&quot;input4-set_range1&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; value=&quot;&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Range 2&lt;/label&gt;
                    &lt;input
                        id=&quot;uifm_fld_inp4_spinner_opt6&quot;
                        data-field-store=&quot;input4-set_range2&quot;
                        class=&quot;uifm_fld_inp4_spinner&quot;
                        type=&quot;text&quot; value=&quot;&quot;&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
    
    &lt;div class=&quot;uifm-set-section-input4-skin-maxwidth&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;div class=&quot;divider2&quot;&gt;
                        &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
                        &lt;span&gt;&lt;i&gt;Skin&lt;/i&gt;&lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom width&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   class=&quot;switch-field&quot;
                                   data-field-store=&quot;input4-skin_maxwidth_st&quot;
                                   name=&quot;uifm_fld_inp4_spinner_skin_maxwith_st&quot;
                                   id=&quot;uifm_fld_inp4_spinner_skin_maxwith_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Max width&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    class=&quot;uifm_fld_inp4_spinner&quot;
                                                    id=&quot;uifm_fld_inp4_spinner_skin_maxwith&quot;
                                                    data-field-store=&quot;input4-skin_maxwidth&quot;
                                                    type=&quot;text&quot; &gt;
                                                
                                            
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input5&quot;&gt;
   
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Public key&lt;/label&gt;
                    &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input5-g_key_public&quot;
                               id=&quot;uifm_fld_inp5_kpublic&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Secret key&lt;/label&gt;
                    &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input5-g_key_secret&quot;
                               id=&quot;uifm_fld_inp5_ksecret&quot;
                                
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Theme&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;input5-g_theme&quot;
                        data-toggle-enable=&quot;sfdc-btn-default&quot;
                        data-toggle-disable=&quot;sfdc-btn-default&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        id=&quot;uifm_fld_inp5_theme_1&quot; 
                        class=&quot;sfdc-btn sfdc-btn-default uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  value=&quot;0&quot;&gt;   Light                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;input5-g_theme&quot;
                        data-toggle-enable=&quot;sfdc-btn-default&quot;
                        data-toggle-disable=&quot;sfdc-btn-default&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                       id=&quot;uifm_fld_inp5_theme_2&quot; 
                        class=&quot;sfdc-btn sfdc-btn-default uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  &lt;span class=&quot;uifm_fld_inp5_theme_2_lbl&quot;&gt;Dark&lt;/span&gt;
                    &lt;/label&gt;
                &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-alert sfdc-alert-info&quot;&gt;
           Get private and publi key from Recaptcha site, and choose reCAPTCHA v2 type. only recaptcha v2 is supported. Get recaptcha keys here:  &lt;a href=&quot;https://www.google.com/recaptcha&quot;  target=&quot;_blank&quot;&gt; &lt;b&gt;Go to Recaptcha site&lt;/b&gt;&lt;/a&gt;
          &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
 
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input6&quot;&gt;
   
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
     &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom text color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input6-txt_color_st&quot;
                                   id=&quot;uifm_fld_inp6_txtcolor_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                              
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;input6-txt_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_fld_inp6_txtcolor&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
        
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom Background color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input6-background_st&quot;
                                   id=&quot;uifm_fld_inp6_bgcolor_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                              
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;input6-background_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_fld_inp6_bgcolor&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom Behind lines&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input6-behind_lines_st&quot;
                                   id=&quot;uifm_fld_inp6_behlines_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                              
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Lines&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;input  
                                            id=&quot;uifm_fld_inp6_behlines&quot;
                                            data-field-store=&quot;input6-behind_lines&quot;
                                            class=&quot;uifm_fld_inp6_spinner&quot;
                                            type=&quot;text&quot;
                                            value=&quot;2&quot;&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom front lines&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input6-front_lines_st&quot;
                                   id=&quot;uifm_fld_inp6_frontlines_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Lines&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;input  
                                            id=&quot;uifm_fld_inp6_frontlines&quot;
                                            data-field-store=&quot;input6-front_lines&quot;
                                            class=&quot;uifm_fld_inp6_spinner&quot;
                                            type=&quot;text&quot; value=&quot;2&quot; &gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Distortion&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input6-distortion&quot;
                                   id=&quot;uifm_fld_inp6_distortion_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  ,.. --&gt;    
            
&lt;div class=&quot;uifm-set-section-input7&quot;&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Language&lt;/label&gt;
                    &lt;select id=&quot;uifm_fld_inp7_lang&quot;
                            data-field-store=&quot;input7-language&quot;
                            class=&quot;sfdc-form-control input-sm uifm-f-setoption&quot;&gt;
                        &lt;option value=&quot;&quot;&gt;English&lt;/option&gt;
                        &lt;option value=&quot;es&quot;&gt;Spanish&lt;/option&gt;
                        &lt;option value=&quot;fr&quot;&gt;French&lt;/option&gt;
                        &lt;option value=&quot;it&quot;&gt;Italian&lt;/option&gt;
                        &lt;option value=&quot;ja&quot;&gt;Japanese&lt;/option&gt;
                        &lt;option value=&quot;pt&quot;&gt;Portuguese&lt;/option&gt;
                        &lt;option value=&quot;ru&quot;&gt;Russian&lt;/option&gt;
                        &lt;option value=&quot;zh-cn&quot;&gt;Chinese&lt;/option&gt;
                        &lt;option value=&quot;de&quot;&gt;German&lt;/option&gt;
                        &lt;option value=&quot;da&quot;&gt;Danish&lt;/option&gt;
                    &lt;/select&gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Format&lt;/label&gt;
                    &lt;select id=&quot;uifm_fld_inp7_format&quot; 
                            data-field-store=&quot;input7-format&quot;
                            class=&quot;sfdc-form-control input-sm uifm-f-setoption&quot;&gt;
                    &lt;option value=&quot;&quot; selected=&quot;&quot;&gt;Default&lt;/option&gt;
                    &lt;option value=&quot;dddd ,D MMM, YYYY&quot;&gt;dddd ,D MMM, YYYY&lt;/option&gt;
                    &lt;option value=&quot;dddd ,MMM D, YYYY&quot;&gt;dddd ,MMM D, YYYY&lt;/option&gt;
                    &lt;option value=&quot;DD/MM/YYYY&quot;&gt;DD/MM/YYYY&lt;/option&gt;
                    &lt;option value=&quot;MM/DD/YYYY&quot;&gt;MM/DD/YYYY&lt;/option&gt;
                    &lt;/select&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input8&quot;&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_lbl_txt&quot;&gt;Text&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input8-value&quot;
                               id=&quot;uifm_fld_input8_value&quot;
                               
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                    
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input9&quot;&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text star 1&lt;/label&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_star1&quot;
                               id=&quot;uifm_fld_input9_star1&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text star 2&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_star2&quot;
                               id=&quot;uifm_fld_input9_star2&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text star 3&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_star3&quot;
                               id=&quot;uifm_fld_input9_star3&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text star 4&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_star4&quot;
                               id=&quot;uifm_fld_input9_star4&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text star 5&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_star5&quot;
                               id=&quot;uifm_fld_input9_star5&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Not rated text&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input9-txt_norate&quot;
                               id=&quot;uifm_fld_input9_norate&quot;
                               class=&quot;sfdc-form-control  uifm-f-setoption&quot;&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input11&quot;&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input11-text_val&quot;
                               id=&quot;uifm_fld_input11_textval&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                        
                            &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;select data-field-store=&quot;input11-text_size&quot;
                                    id=&quot;uifm_fld_input11_size&quot;
                                    data-live-search=&quot;true&quot;
                                    data-width=&quot;80px&quot;
                                    data-style=&quot;sfdc-btn-primary&quot;
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                            &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                                &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                                &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                                &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                                &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                                &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                                &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                                &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                                &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                                &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                                &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                                &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                                &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                                &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                                &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                                &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                                &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                                &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                                &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                                &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                                &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                                &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                                &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                                &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                                &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                                &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                                &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                                &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                                &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                                &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                                &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                                &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                                &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                                &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                                &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                                &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                                &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                                &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                                &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                                &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                                &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;input11-bold&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_input11_textbold&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input11-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_input11_textitalic&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input11-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_input11_textu&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                        
                        
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Color&lt;/label&gt;
                    &lt;div 
                        data-field-store=&quot;input11-text_color&quot;
                        class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                               id=&quot;uifm_fld_input11_textcolor&quot;
                                 class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Font family&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_input11_font&quot;id=&quot;uifm_fld_input11_font&quot;data-field-store=&quot;input11-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input11-font_st&quot;
                            id=&quot;uifm_fld_input11_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
  
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Divider bar Color&lt;/label&gt;
                    &lt;div data-field-store=&quot;input11-div_color&quot; class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                        &lt;input 
                            type=&quot;text&quot; 
                            value=&quot;&quot; 
                            id=&quot;uifm_fld_input11_barcolor&quot;
                            class=&quot;sfdc-form-control&quot; /&gt;
                         &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input11-div_col_st&quot;
                            id=&quot;uifm_fld_input11_divcol_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                         &lt;/span&gt;
                    &lt;/div&gt;
                    
                &lt;/div&gt;
            &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
   
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input14&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Settings&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
  &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Buttons alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input14-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp14_objalign_1&quot;
                                    name=&quot;uifm_fld_inp14_objalign_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input14-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp14_objalign_2&quot;
                                    name=&quot;uifm_fld_inp14_objalign_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input14-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp14_objalign_3&quot; 
                                    name=&quot;uifm_fld_inp14_objalign_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
    &lt;div class=&quot;uifm-set-section-input12&quot;&gt;
        &lt;div  class=&quot;uiform-setting-divider-bar&quot;&gt;
    &lt;span  class=&quot;uiform-setting-divider-text&quot;&gt;Next Button&lt;/span&gt;
&lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Input&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label&gt;Text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input12-value_lbl&quot;
                               id=&quot;uifm_fld_input12_value&quot;
                               name=&quot;uifm_fld_inp12_value&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;select data-field-store=&quot;input12-size&quot;
                                    id=&quot;uifm_fld_inp12_size&quot;
                                    name=&quot;uifm_fld_inp12_size&quot;
                                    data-live-search=&quot;true&quot;
                                    data-width=&quot;80px&quot;
                                    data-style=&quot;sfdc-btn-primary&quot;
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;input12-bold&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp12_bold&quot; name=&quot;uifm_fld_inp12_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input12-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp12_italic&quot; name=&quot;uifm_fld_inp12_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input12-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp12_u&quot; name=&quot;uifm_fld_inp12_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                        
                        
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label&gt;Text for last button                    &lt;a href=&quot;javascript:void(0);&quot;
                       data-toggle=&quot;tooltip&quot; data-placement=&quot;right&quot; 
                       data-original-title=&quot;you can check this on frontend page or preview&quot;
                       &gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                    &lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input12-value_lbl_last&quot;
                               id=&quot;uifm_fld_input12_value_lbl_last&quot;
                               name=&quot;uifm_fld_inp12_value_lbl_last&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input-placeh&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_inp12_pholdr&quot;&gt;Place holder&lt;/label&gt;
                     &lt;input 
                            data-field-store=&quot;input12-placeholder&quot;
                            type=&quot;text&quot; 
                            id=&quot;uifm_fld_inp12_pholdr&quot; 
                            name=&quot;uifm_fld_inp12_pholdr&quot;  
                            placeholder=&quot;&quot;
                            class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;   
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;    
    
        
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Color&lt;/label&gt;
                    &lt;div 
                        data-field-store=&quot;input12-color&quot;
                        class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                               id=&quot;uifm_fld_inp12_color&quot; 
                               name=&quot;uifm_fld_inp12_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Font family&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_inp12_font&quot;id=&quot;uifm_fld_inp12_font&quot;data-field-store=&quot;input12-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input12-font_st&quot;
                            id=&quot;uifm_fld_inp12_font_st&quot;
                            name=&quot;uifm_fld_inp12_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class=&quot;uifm-set-section-input-valign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Input value alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_align_1&quot;
                                    name=&quot;uifm_fld_inp12_align_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_align_2&quot;
                                    name=&quot;uifm_fld_inp12_align_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_align_3&quot; 
                                    name=&quot;uifm_fld_inp12_align_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;    
    &lt;div class=&quot;uifm-set-section-input-objalign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Button alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_objalign_1&quot;
                                    name=&quot;uifm_fld_inp12_objalign_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_objalign_2&quot;
                                    name=&quot;uifm_fld_inp12_objalign_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input12-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp12_objalign_3&quot; 
                                    name=&quot;uifm_fld_inp12_objalign_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input12boxbg&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Background&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Background color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;el12_background-show_st&quot;
                                   id=&quot;uifm_fld_elbg12_st&quot;
                                   name=&quot;uifm_fld_elbg12_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Type&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                 data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el12_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg12_type_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el12_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg12_type_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Gradient                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el12_background-solid_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_fld_elbg12_color_1&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Start color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el12_background-start_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot; value=&quot;&quot;
                                                        id=&quot;uifm_fld_elbg12_color_2&quot;
                                                        name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;End color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el12_background-end_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        id=&quot;uifm_fld_elbg12_color_3&quot;
                                                        type=&quot;text&quot; value=&quot;&quot; name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input12boxborder&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Border&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border radius&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el12_border_radius-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbora12_st&quot;
                                   id=&quot;uifm_fld_elbora12_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                   data-field-store=&quot;el12_border_radius-size&quot;
                                   data-slider-value=&quot;14&quot;
                                   data-slider-step=&quot;1&quot;
                                   data-slider-max=&quot;60&quot;
                                   data-slider-min=&quot;0&quot; 
                                   data-slider-id=&quot;&quot; 
                                   id=&quot;uifm_fld_elbora12_size&quot; 
                                   class=&quot;uiform-opt-slider&quot;&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el12_border-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbor12_st&quot;
                                   id=&quot;uifm_fld_elbor12_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el12_border-color&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor12_color&quot;
                                                        id=&quot;uifm_fld_elbor12_color&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color (focus)&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el12_border-color_focus&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor12_colorfocus&quot;
                                                        id=&quot;uifm_fld_elbor12_colorfocus&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon tooltip-option-enable&quot;&gt;
                                                &lt;input 
                                                data-field-store=&quot;el12_border-color_focus_st&quot;
                                                id=&quot;uifm_fld_elbor12_colorfocus_st&quot;
                                                name=&quot;uifm_fld_elbor12_colorfocus_st&quot;
                                                class=&quot;uifm-f-setoption-st&quot;
                                                value=&quot;1&quot;
                                                type=&quot;checkbox&quot;&gt;
                                                &lt;/span&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;border style&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el12_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor12_style_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot; checked&gt;Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el12_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor12_style_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot;&gt;  Dotted                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Border width&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input 
                                        data-field-store=&quot;el12_border-width&quot;  
                                        type=&quot;text&quot; style=&quot;width:100%;&quot;
                                        data-slider-value=&quot;14&quot;
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;20&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; 
                                        id=&quot;uifm_fld_elbor12_width&quot;
                                        class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
    &lt;div class=&quot;uifm-set-section-input13&quot;&gt;
  
&lt;div  class=&quot;uiform-setting-divider-bar&quot;&gt;
    &lt;span  class=&quot;uiform-setting-divider-text&quot;&gt;Prev Button&lt;/span&gt;
&lt;/div&gt;
                       
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Input&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label&gt;Text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group&quot;&gt;
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input13-value_lbl&quot;
                               id=&quot;uifm_fld_input13_value&quot;
                               name=&quot;uifm_fld_inp13_value&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;select data-field-store=&quot;input13-size&quot;
                                    id=&quot;uifm_fld_inp13_size&quot;
                                    name=&quot;uifm_fld_inp13_size&quot;
                                    data-live-search=&quot;true&quot;
                                    data-width=&quot;80px&quot;
                                    data-style=&quot;sfdc-btn-primary&quot;
                                    class=&quot;uifm_field_font_selectpicker uifm-f-setoption-font&quot;&gt;
                                &lt;optgroup label=&quot;Font size&quot; data-max-options=&quot;2&quot;&gt;
                                                                    &lt;option value=&quot;8&quot;&gt;8 px&lt;/option&gt;
                                                                        &lt;option value=&quot;9&quot;&gt;9 px&lt;/option&gt;
                                                                        &lt;option value=&quot;10&quot;&gt;10 px&lt;/option&gt;
                                                                        &lt;option value=&quot;11&quot;&gt;11 px&lt;/option&gt;
                                                                        &lt;option value=&quot;12&quot;&gt;12 px&lt;/option&gt;
                                                                        &lt;option value=&quot;13&quot;&gt;13 px&lt;/option&gt;
                                                                        &lt;option value=&quot;14&quot;&gt;14 px&lt;/option&gt;
                                                                        &lt;option value=&quot;15&quot;&gt;15 px&lt;/option&gt;
                                                                        &lt;option value=&quot;16&quot;&gt;16 px&lt;/option&gt;
                                                                        &lt;option value=&quot;17&quot;&gt;17 px&lt;/option&gt;
                                                                        &lt;option value=&quot;18&quot;&gt;18 px&lt;/option&gt;
                                                                        &lt;option value=&quot;19&quot;&gt;19 px&lt;/option&gt;
                                                                        &lt;option value=&quot;20&quot;&gt;20 px&lt;/option&gt;
                                                                        &lt;option value=&quot;21&quot;&gt;21 px&lt;/option&gt;
                                                                        &lt;option value=&quot;22&quot;&gt;22 px&lt;/option&gt;
                                                                        &lt;option value=&quot;23&quot;&gt;23 px&lt;/option&gt;
                                                                        &lt;option value=&quot;24&quot;&gt;24 px&lt;/option&gt;
                                                                        &lt;option value=&quot;25&quot;&gt;25 px&lt;/option&gt;
                                                                        &lt;option value=&quot;26&quot;&gt;26 px&lt;/option&gt;
                                                                        &lt;option value=&quot;27&quot;&gt;27 px&lt;/option&gt;
                                                                        &lt;option value=&quot;28&quot;&gt;28 px&lt;/option&gt;
                                                                        &lt;option value=&quot;29&quot;&gt;29 px&lt;/option&gt;
                                                                        &lt;option value=&quot;30&quot;&gt;30 px&lt;/option&gt;
                                                                        &lt;option value=&quot;31&quot;&gt;31 px&lt;/option&gt;
                                                                        &lt;option value=&quot;32&quot;&gt;32 px&lt;/option&gt;
                                                                        &lt;option value=&quot;33&quot;&gt;33 px&lt;/option&gt;
                                                                        &lt;option value=&quot;34&quot;&gt;34 px&lt;/option&gt;
                                                                        &lt;option value=&quot;35&quot;&gt;35 px&lt;/option&gt;
                                                                        &lt;option value=&quot;36&quot;&gt;36 px&lt;/option&gt;
                                                                        &lt;option value=&quot;37&quot;&gt;37 px&lt;/option&gt;
                                                                        &lt;option value=&quot;38&quot;&gt;38 px&lt;/option&gt;
                                                                        &lt;option value=&quot;39&quot;&gt;39 px&lt;/option&gt;
                                                                        &lt;option value=&quot;40&quot;&gt;40 px&lt;/option&gt;
                                                                        &lt;option value=&quot;41&quot;&gt;41 px&lt;/option&gt;
                                                                        &lt;option value=&quot;42&quot;&gt;42 px&lt;/option&gt;
                                                                        &lt;option value=&quot;43&quot;&gt;43 px&lt;/option&gt;
                                                                        &lt;option value=&quot;44&quot;&gt;44 px&lt;/option&gt;
                                                                        &lt;option value=&quot;45&quot;&gt;45 px&lt;/option&gt;
                                                                        &lt;option value=&quot;46&quot;&gt;46 px&lt;/option&gt;
                                                                        &lt;option value=&quot;47&quot;&gt;47 px&lt;/option&gt;
                                                                        &lt;option value=&quot;48&quot;&gt;48 px&lt;/option&gt;
                                                                        &lt;/optgroup&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-input-group-btn&quot;&gt;
                            &lt;button data-field-store=&quot;input13-bold&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                type=&quot;button&quot;&gt;
                                &lt;i class=&quot;fa fa-bold&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp13_bold&quot; name=&quot;uifm_fld_inp13_bold&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input13-italic&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-italic&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp13_italic&quot; name=&quot;uifm_fld_inp13_italic&quot;  value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                            &lt;button  data-field-store=&quot;input13-underline&quot;
                                class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot;
                                    type=&quot;button&quot;&gt;&lt;i class=&quot;fa fa-underline&quot;&gt;&lt;/i&gt;
                                &lt;input type=&quot;hidden&quot; id=&quot;uifm_fld_inp13_u&quot; name=&quot;uifm_fld_inp13_u&quot; value=&quot;0&quot;&gt;
                            &lt;/button&gt;
                        &lt;/div&gt;
                        
                        
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input-placeh&quot;&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;uifm_fld_inp13_pholdr&quot;&gt;Place holder&lt;/label&gt;
                     &lt;input 
                            data-field-store=&quot;input13-placeholder&quot;
                            type=&quot;text&quot; 
                            id=&quot;uifm_fld_inp13_pholdr&quot; 
                            name=&quot;uifm_fld_inp13_pholdr&quot;  
                            placeholder=&quot;&quot;
                            class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;   
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;    
    
        
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Color&lt;/label&gt;
                    &lt;div 
                        data-field-store=&quot;input13-color&quot;
                        class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input type=&quot;text&quot; value=&quot;&quot; 
                               id=&quot;uifm_fld_inp13_color&quot; 
                               name=&quot;uifm_fld_inp13_color&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Font family&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_inp13_font&quot;id=&quot;uifm_fld_inp13_font&quot;data-field-store=&quot;input13-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;input13-font_st&quot;
                            id=&quot;uifm_fld_inp13_font_st&quot;
                            name=&quot;uifm_fld_inp13_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class=&quot;uifm-set-section-input-valign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Input value alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_align_1&quot;
                                    name=&quot;uifm_fld_inp13_align_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_align_2&quot;
                                    name=&quot;uifm_fld_inp13_align_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-val_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_align_3&quot; 
                                    name=&quot;uifm_fld_inp13_align_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;    
    &lt;div class=&quot;uifm-set-section-input-objalign&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Button alignment&lt;/label&gt;
                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_objalign_1&quot;
                                    name=&quot;uifm_fld_inp13_objalign_1&quot;   value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-align-left&quot;&gt;&lt;/i&gt; Left                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_objalign_2&quot;
                                    name=&quot;uifm_fld_inp13_objalign_2&quot; value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-align-center&quot;&gt;&lt;/i&gt; Center                                &lt;/label&gt;
                                &lt;label 
                                    data-field-store=&quot;input13-obj_align&quot;
                                    data-toggle-enable=&quot;sfdc-btn-success&quot;
                                    data-toggle-disable=&quot;sfdc-btn-success&quot;
                                    data-settings-option=&quot;group-radiobutton&quot;
                                    class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                                &lt;input type=&quot;radio&quot; 
                                    id=&quot;uifm_fld_inp13_objalign_3&quot; 
                                    name=&quot;uifm_fld_inp13_objalign_3&quot; value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-align-right&quot;&gt;&lt;/i&gt; Right                                &lt;/label&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input13boxbg&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Background&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Background color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;el13_background-show_st&quot;
                                   id=&quot;uifm_fld_elbg13_st&quot;
                                   name=&quot;uifm_fld_elbg13_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Type&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                 data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el13_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg13_type_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el13_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbg13_type_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Gradient                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el13_background-solid_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_fld_elbg13_color_1&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Start color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el13_background-start_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot; value=&quot;&quot;
                                                        id=&quot;uifm_fld_elbg13_color_2&quot;
                                                        name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;End color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;el13_background-end_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        id=&quot;uifm_fld_elbg13_color_3&quot;
                                                        type=&quot;text&quot; value=&quot;&quot; name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-input13boxborder&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Border&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border radius&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el13_border_radius-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbora13_st&quot;
                                   id=&quot;uifm_fld_elbora13_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                   data-field-store=&quot;el13_border_radius-size&quot;
                                   data-slider-value=&quot;14&quot;
                                   data-slider-step=&quot;1&quot;
                                   data-slider-max=&quot;60&quot;
                                   data-slider-min=&quot;0&quot; 
                                   data-slider-id=&quot;&quot; 
                                   id=&quot;uifm_fld_elbora13_size&quot; 
                                   class=&quot;uiform-opt-slider&quot;&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;el13_border-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_fld_elbor13_st&quot;
                                   id=&quot;uifm_fld_elbor13_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el13_border-color&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor13_color&quot;
                                                        id=&quot;uifm_fld_elbor13_color&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color (focus)&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;el13_border-color_focus&quot; 
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; value=&quot;&quot; 
                                                        name=&quot;uifm_fld_elbor13_colorfocus&quot;
                                                        id=&quot;uifm_fld_elbor13_colorfocus&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon tooltip-option-enable&quot;&gt;
                                                &lt;input 
                                                data-field-store=&quot;el13_border-color_focus_st&quot;
                                                id=&quot;uifm_fld_elbor13_colorfocus_st&quot;
                                                name=&quot;uifm_fld_elbor13_colorfocus_st&quot;
                                                class=&quot;uifm-f-setoption-st&quot;
                                                value=&quot;1&quot;
                                                type=&quot;checkbox&quot;&gt;
                                                &lt;/span&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;border style&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el13_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor13_style_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot; checked&gt;Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;el13_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_fld_elbor13_style_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot;&gt;  Dotted                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Border width&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input 
                                        data-field-store=&quot;el13_border-width&quot;  
                                        type=&quot;text&quot; style=&quot;width:100%;&quot;
                                        data-slider-value=&quot;14&quot;
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;20&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; 
                                        id=&quot;uifm_fld_elbor13_width&quot;
                                        class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input15&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Settings&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
  &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;label Yes&lt;/label&gt;
                    
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input15-txt_yes&quot;
                               id=&quot;uifm_fld_inp15_txt_yes&quot;
                               name=&quot;uifm_fld_inp15_txt_yes&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                    
                &lt;/div&gt;
            &lt;/div&gt;
      &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;label no&lt;/label&gt;
                  
                        &lt;input type=&quot;text&quot;
                               data-field-store=&quot;input15-txt_no&quot;
                               id=&quot;uifm_fld_inp15_txt_no&quot;
                               name=&quot;uifm_fld_inp15_txt_no&quot;
                               class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                        
                   
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input16&quot;&gt;
   
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
  &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label for=&quot;&quot;&gt;allowed extensions&lt;/label&gt;
                    
                        
                            &lt;textarea 
                               data-field-store=&quot;input16-extallowed&quot;
                               id=&quot;uifm_fld_input16_extallowed&quot;
                               name=&quot;uifm_fld_input16_extallowed&quot;
                               style=&quot;width:100%;&quot;
                               class=&quot;sfdc-form-control autogrow uifm-f-setoption&quot;&gt;&lt;/textarea&gt;
                            &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;   
                       &lt;div class=&quot;sfdc-alert sfdc-alert-info&quot; role=&quot;alert&quot;&gt;Put the extensions between commas&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;label &gt;Maximum size (MB)&lt;/label&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;input  
                                            id=&quot;uifm_fld_input16_maxsize&quot;
                                            data-field-store=&quot;input16-maxsize&quot;
                                            class=&quot;uifm_fld_input16_spinner&quot;
                                            type=&quot;text&quot; value=&quot;2&quot; &gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
     &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Attach files to mail notification&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;input 
                                   class=&quot;switch-field&quot;
                                   data-field-store=&quot;input16-attach_st&quot;
                                   id=&quot;uifm_fld_input16_attachst&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
           &lt;div class=&quot;sfdc-alert sfdc-alert-warning&quot; role=&quot;alert&quot;&gt;if you enable attachment option, make sure your web server (hosting) and mail server support your maximum size file&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
      &lt;fieldset&gt;
        &lt;legend&gt;Custom Translations &lt;/legend&gt;
         &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;label &gt;Select image&lt;/label&gt;
            &lt;/div&gt;
            &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                       &lt;input type=&quot;text&quot; class=&quot;sfdc-form-control uifm-f-setoption&quot;
                              placeholder=&quot;&quot; 
                              name=&quot;uifm_fld_input16_txtselimage&quot;
                              id=&quot;uifm_fld_input16_txtselimage&quot; 
                              data-field-store=&quot;input16-stl1-txt_selimage&quot;&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;label &gt;Change&lt;/label&gt;
            &lt;/div&gt;
            &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                       &lt;input type=&quot;text&quot; class=&quot;sfdc-form-control uifm-f-setoption&quot;
                              placeholder=&quot;&quot; 
                              name=&quot;uifm_fld_input16_txtchange&quot;
                              id=&quot;uifm_fld_input16_txtchange&quot; 
                              data-field-store=&quot;input16-stl1-txt_change&quot;&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;label &gt;Remove&lt;/label&gt;
            &lt;/div&gt;
            &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                       &lt;input type=&quot;text&quot; class=&quot;sfdc-form-control uifm-f-setoption&quot;
                              placeholder=&quot;&quot; 
                              name=&quot;uifm_fld_input16_txtremove&quot;
                              id=&quot;uifm_fld_input16_txtremove&quot; 
                              data-field-store=&quot;input16-stl1-txt_remove&quot;&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input17&quot;&gt;
   
&lt;div class=&quot;uifm-set-section-input17-optbox&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
           &lt;label &gt;Image Height&lt;/label&gt;
            &lt;input  
                class=&quot;uifm-f-setoption uifm_fld_inp17_thopt_spinner&quot;
            id=&quot;uifm_fld_inp17_thopt_height&quot;
            data-field-store=&quot;input17-thopt_height&quot;
            type=&quot;text&quot; &gt;
                                    
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;label &gt;Image width&lt;/label&gt;
            &lt;input  
                class=&quot;uifm-f-setoption uifm_fld_inp17_thopt_spinner_2&quot;
            id=&quot;uifm_fld_inp17_thopt_width&quot;
            data-field-store=&quot;input17-thopt_width&quot;
            type=&quot;text&quot; &gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
     &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row uifm_fld_inp17_thopt_mode_wrap&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-3&quot; &gt;
           &lt;label &gt;Layout mode&lt;/label&gt;                     
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-6&quot; &gt;
               &lt;select id=&quot;uifm_fld_inp17_thopt_mode&quot; 
                                style=&quot;width:73px;&quot;
                                onchange=&quot;javascript:zgfm_input17_onChangeLayout();&quot;
                                data-field-store=&quot;input17-thopt_mode&quot;
                                class=&quot;sfdc-form-control&quot;&gt;
                            &lt;option value=&quot;1&quot;&gt;one&lt;/option&gt;
                            &lt;option value=&quot;2&quot;&gt;two&lt;/option&gt;
                        &lt;/select&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    
    
    
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-6&quot; id=&quot;uifm_fld_inp17_thopt_zoom_wrap&quot;&gt;
           &lt;label &gt;Show zoom option&lt;/label&gt;
            &lt;input class=&quot;switch-field&quot;
                   data-field-store=&quot;input17-thopt_zoom&quot;
                   id=&quot;uifm_fld_inp17_thopt_zoom&quot;
                   name=&quot;uifm_fld_inp17_thopt_zoom&quot;
                   type=&quot;checkbox&quot;/&gt;
                                    
        &lt;/div&gt;
        &lt;div class=&quot;sfdc-col-md-6&quot;id=&quot;uifm_fld_inp17_thopt_usethmb_wrap&quot;&gt;
               &lt;label &gt;Use Thumbnail&lt;/label&gt;
            &lt;input class=&quot;switch-field&quot;
                   data-field-store=&quot;input17-thopt_usethmb&quot;
                   id=&quot;uifm_fld_inp17_thopt_usethmb&quot;
                   name=&quot;uifm_fld_inp17_thopt_usethmb&quot;
                   type=&quot;checkbox&quot;/&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot; &gt;
        &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot; id=&quot;uifm_fld_inp17_thopt_showhvrtxt_wrap&quot; &gt;
           &lt;label &gt;Label&lt;/label&gt;
            
           &lt;select id=&quot;uifm_fld_inp17_thopt_showhvrtxt&quot;  
                                data-field-store=&quot;input17-thopt_showhvrtxt&quot;
                                class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;option value=&quot;0&quot;&gt;hide&lt;/option&gt;
                            &lt;option value=&quot;1&quot;&gt;show on hover&lt;/option&gt;
                            &lt;option value=&quot;2&quot;&gt;put below image&lt;/option&gt;
                            &lt;option value=&quot;3&quot;&gt;put above image&lt;/option&gt;
                        &lt;/select&gt;
            
                                    
            &lt;/div&gt;
        
         &lt;div class=&quot;sfdc-col-md-6&quot; id=&quot;uifm_fld_inp17_thopt_showcheckb_wrap&quot; &gt;
           &lt;label &gt;Show Check Box&lt;/label&gt;
            &lt;input class=&quot;switch-field&quot;
                   data-field-store=&quot;input17-thopt_showcheckb&quot;
                   id=&quot;uifm_fld_inp17_thopt_showcheckb&quot;
                   name=&quot;uifm_fld_inp17_thopt_showcheckb&quot;
                   type=&quot;checkbox&quot;/&gt;
                                    
            &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class=&quot;space10&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;a href=&quot;javascript:void(0);&quot;
               onclick=&quot;javascript:rocketform.input17settings_addNewOption();&quot;
               class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-success&quot;
               &gt;Add new option&lt;/a&gt;
            &lt;button onclick=&quot;javascript:rocketform.input17settings_deleteAllOptions();&quot; 
                    class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;&gt;
             &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Remove all options&lt;/button&gt;
        &lt;/div&gt;
        &lt;/div&gt;
       &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                &lt;div id=&quot;uifm-fld-inp17-options-container&quot;&gt;
                        
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
       
   &lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
&lt;!--container  --&gt;    
            
&lt;div class=&quot;uifm-set-section-input18&quot;&gt;
 
 &lt;div class=&quot;sfdc-row&quot;&gt;
                &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label class=&quot;sfdc-control-label&quot; for=&quot;&quot;&gt;
                        Custom text                    &lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                                &lt;textarea 
                            class=&quot;uifm_tinymce_obj&quot;
                            name=&quot;uifm_frm_inp18_txt_cont&quot;
                            id=&quot;uifm_frm_inp18_txt_cont&quot;&gt;&lt;/textarea&gt;
                    &lt;/div&gt;

                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;   
  &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Show text&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input18-text-show_st&quot;
                                   id=&quot;uifm_frm_inp18_txt_st&quot;
                                   name=&quot;uifm_frm_inp18_txt_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
          
        &lt;/div&gt;  
 &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Help block position&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;input18-text-html_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                        &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_inp18_txt_pos_1&quot; 
                           name=&quot;uifm_fld_inp18_txt_pos&quot;   
                           value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-hand-o-down&quot;&gt;&lt;/i&gt; Top                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;input18-text-html_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_inp18_txt_pos_2&quot; 
                           name=&quot;uifm_fld_inp18_txt_pos&quot;   
                           value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-hand-o-up&quot;&gt;&lt;/i&gt; Right                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;input18-text-html_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_inp18_txt_pos_3&quot; 
                           name=&quot;uifm_fld_inp18_txt_pos&quot;   
                           value=&quot;3&quot;&gt; &lt;i class=&quot;fa fa-question-circle&quot;&gt;&lt;/i&gt; bottom                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;input18-text-html_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_inp18_txt_pos_4&quot; 
                           name=&quot;uifm_fld_inp18_txt_pos&quot;   
                           value=&quot;0&quot;&gt;&lt;i class=&quot;fa fa-question-circle&quot;&gt;&lt;/i&gt; left                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;   
 &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom padding&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   class=&quot;switch-field&quot;
                                   data-field-store=&quot;input18-pane_padding-show_st&quot;
                                   name=&quot;uifm_frm_inp18_padd_st&quot;
                                   id=&quot;uifm_frm_inp18_padd_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Padding top&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_padd_top&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_padding-pos_top&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                          &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Padding right&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                id=&quot;uifm_frm_inp18_padd_right&quot;    
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_padding-pos_right&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Padding bottom&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_padd_bottom&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_padding-pos_bottom&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Padding left&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_padd_left&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_padding-pos_left&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Custom margin&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   class=&quot;switch-field&quot;
                                   data-field-store=&quot;input18-pane_margin-show_st&quot;
                                   name=&quot;uifm_frm_inp18_marg_st&quot;
                                   id=&quot;uifm_frm_inp18_marg_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Margin top&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_marg_top&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_margin-pos_top&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                          &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Margin right&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                id=&quot;uifm_frm_inp18_marg_right&quot;    
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_margin-pos_right&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Margin bottom&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_marg_bottom&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_margin-pos_bottom&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Margin left&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                                &lt;input  
                                                    id=&quot;uifm_frm_inp18_marg_left&quot;
                                                class=&quot;uifm_fld_input16_spinner&quot;
                                                data-field-store=&quot;input18-pane_margin-pos_left&quot;
                                                type=&quot;text&quot; &gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
     &lt;div &gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Background&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Background color&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input18-pane_background-show_st&quot;
                                   id=&quot;uifm_frm_inp18_fmbg_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Type&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot;
                                                 data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;input18-pane_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_frm_inp18_fmbg_type_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;  Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;input18-pane_background-type&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_frm_inp18_fmbg_type_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot; checked&gt; Gradient                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;input18-pane_background-solid_color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        id=&quot;uifm_frm_inp18_fmbg_color_1&quot;
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;&quot; 
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Start color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;input18-pane_background-start_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot; value=&quot;&quot;
                                                        id=&quot;uifm_frm_inp18_fmbg_color_2&quot;
                                                        name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;End color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div 
                                                data-field-store=&quot;input18-pane_background-end_color&quot;
                                                class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        id=&quot;uifm_frm_inp18_fmbg_color_3&quot;
                                                        type=&quot;text&quot; value=&quot;&quot; name=&quot;&quot; class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                             &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
                                   &lt;label &gt;Background image&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;uifm_frm_inp18_bg_thumbnail&quot; id=&quot;uifm_frm_inp18_bg_srcimg_wrap&quot;&gt;
                                                
                                            &lt;/div&gt;
                                            &lt;input 
                                                name=&quot;uifm_frm_inp18_bg_imgurl&quot; 
                                                id=&quot;uifm_frm_inp18_bg_imgurl&quot; 
                                                value=&quot;&quot;                                                
                                                type=&quot;hidden&quot;&gt;
                                                &lt;input id=&quot;uifm_frm_inp18_bg_btnadd&quot; onclick=&quot;javascript:rocketform.input18settings_changeSrcImg(this);&quot;
                                                    value=&quot;Update Image&quot; 
                                                    class=&quot;button-secondary&quot; 
                                                    type=&quot;button&quot;&gt;
                                                &lt;a href=&quot;javascript:void(0);&quot;
                                                   onclick=&quot;javascript:rocketform.input18settings_deleteBgImagePane();&quot;
                                                   class=&quot;sfdc-btn sfdc-btn-default&quot;
                                                   &gt;
                                                    &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt;
                                                &lt;/a&gt;
    
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
    
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Border&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border radius&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;input18-pane_border_radius-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_frm_inp18_fmbora_st&quot;
                                   id=&quot;uifm_frm_inp18_fmbora_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;input type=&quot;text&quot; style=&quot;width:100%;&quot;
                                   data-field-store=&quot;input18-pane_border_radius-size&quot;
                                   data-slider-value=&quot;14&quot;
                                   data-slider-step=&quot;1&quot;
                                   data-slider-max=&quot;60&quot;
                                   data-slider-min=&quot;0&quot; 
                                   data-slider-id=&quot;&quot; 
                                   id=&quot;uifm_frm_inp18_fmbora_size&quot; 
                                   class=&quot;uiform-opt-slider&quot;&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Border&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input 
                                   data-field-store=&quot;input18-pane_border-show_st&quot;
                                   class=&quot;switch-field&quot;
                                   name=&quot;uifm_frm_inp18_fmbor_st&quot;
                                   id=&quot;uifm_frm_inp18_fmbor_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div data-field-store=&quot;input18-pane_border-color&quot;
                                                 class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot; 
                                                        type=&quot;text&quot; 
                                                        value=&quot;&quot; 
                                                        name=&quot;uifm_frm_inp18_fmbor_color&quot;
                                                        id=&quot;uifm_frm_inp18_fmbor_color&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;border style&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                            &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                                                &lt;label 
                                                    data-field-store=&quot;input18-pane_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_frm_inp18_fmbor_style_1&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;1&quot; checked&gt;Solid                                                &lt;/label&gt;
                                                &lt;label 
                                                    data-field-store=&quot;input18-pane_border-style&quot;
                                                    data-toggle-enable=&quot;sfdc-btn-warning&quot;
                                                    data-toggle-disable=&quot;sfdc-btn-warning&quot;
                                                    data-settings-option=&quot;group-radiobutton&quot;
                                                    id=&quot;uifm_frm_inp18_fmbor_style_2&quot;
                                                    class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                                                &lt;input type=&quot;radio&quot;  value=&quot;2&quot;&gt;  Dotted                                                &lt;/label&gt;
                                            &lt;/div&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Border width&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input 
                                        data-field-store=&quot;input18-pane_border-width&quot;
                                        type=&quot;text&quot; style=&quot;width:100%;&quot;
                                        data-slider-value=&quot;14&quot;
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;20&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; 
                                        id=&quot;uifm_frm_inp18_fmbor_width&quot;
                                        class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Box Shadow&lt;/label&gt;
                    &lt;div class=&quot;&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                            &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;input18-pane_shadow-show_st&quot;
                                   id=&quot;uifm_frm_inp18_sha_st&quot;
                                   name=&quot;uifm_frm_inp18_sha_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-9&quot;&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;Color&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                        &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                            &lt;div  data-field-store=&quot;input18-pane_shadow-color&quot;
                                                  class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                                                &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                                                &lt;input  placeholder=&quot;Pick the color&quot;
                                                        type=&quot;text&quot;
                                                        value=&quot;&quot;
                                                        id=&quot;uifm_frm_inp18_sha_co&quot;
                                                        name=&quot;uifm_frm_inp18_sha_co&quot;
                                                        class=&quot;sfdc-form-control&quot; /&gt;
                                            &lt;/div&gt;
                                            
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                           &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;horizontal&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                             data-field-store=&quot;input18-pane_shadow-h_shadow&quot;
                                        id=&quot;uifm_frm_inp18_sha_x&quot;
                                       name=&quot;uifm_frm_inp18_sha_x&quot;      
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot;
                                        data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                          &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;vertical&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                           data-field-store=&quot;input18-pane_shadow-v_shadow&quot;
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_frm_inp18_sha_y&quot;
                                        name=&quot;uifm_frm_inp18_sha_y&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
                            &lt;div class=&quot;sfdc-row&quot;&gt;
                                &lt;div class=&quot;sfdc-col-md-3&quot;&gt;
                                   &lt;label &gt;blur&lt;/label&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;sfdc-col-sm-9&quot;&gt;
                                      &lt;input type=&quot;text&quot;
                                        data-field-store=&quot;input18-pane_shadow-blue&quot;
                                             style=&quot;width:100%;&quot;
                                        id=&quot;uifm_frm_inp18_sha_blur&quot;
                                        name=&quot;uifm_frm_inp18_sha_blur&quot;
                                        
                                        data-slider-step=&quot;1&quot;
                                        data-slider-max=&quot;30&quot;
                                        data-slider-min=&quot;0&quot; data-slider-id=&quot;&quot; class=&quot;uiform-opt-slider&quot;&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;!--\end container --&gt;
        &lt;!--container  --&gt;    
            
&lt;div id=&quot;uifm-fld-inp-date2-box&quot;&gt;
    
    &lt;fieldset&gt;
                    &lt;legend&gt;Margin &lt;/legend&gt;
                    &lt;div class=&quot;zgpb-modal-body-tab-inner&quot;&gt;
                        &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Enable time&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Enable time&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                       &lt;input class=&quot;switch-field&quot;
                                            data-field-store=&quot;input_date2-enabletime&quot;
                                            id=&quot;uifm_fld_inp19_enabletime&quot;
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
                                        &lt;label for=&quot;&quot;&gt;No calendar&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;No calendar&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                       &lt;input class=&quot;switch-field&quot;
                                            data-field-store=&quot;input_date2-nocalendar&quot;
                                            id=&quot;uifm_fld_inp19_nocalendar&quot;
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
                                        &lt;label for=&quot;&quot;&gt;time 24 hour&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;No calendar&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                       &lt;input class=&quot;switch-field&quot;
                                            data-field-store=&quot;input_date2-time_24hr&quot;
                                            id=&quot;uifm_fld_inp19_time24hr&quot;
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
                                        &lt;label for=&quot;&quot;&gt;Alternative input&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Alternative input&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                       &lt;input class=&quot;switch-field&quot;
                                            data-field-store=&quot;input_date2-altinput&quot;
                                            id=&quot;uifm_fld_inp19_altinput&quot;
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
                                        &lt;label for=&quot;&quot;&gt;Alternative input format&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Alternative format input&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        
                                       &lt;input type=&quot;text&quot; 
                                              class=&quot;sfdc-form-control uifm-f-setoption&quot; 
                                              name=&quot;uifm_fld_inp19_altformat&quot; 
                                              id=&quot;uifm_fld_inp19_altformat&quot; data-field-store=&quot;input_date2-altformat&quot;&gt; 
                                        &lt;/div&gt;    

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                        &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Inline display&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Inline display&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                       &lt;input class=&quot;switch-field&quot;
                                            data-field-store=&quot;input_date2-isinline&quot;
                                            id=&quot;uifm_fld_inp19_isinline&quot;
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
                                        &lt;label for=&quot;&quot;&gt;Date format&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Date format&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        
                                       &lt;input type=&quot;text&quot; 
                                              class=&quot;sfdc-form-control uifm-f-setoption&quot; 
                                              name=&quot;uifm_fld_inp19_dateformat&quot; 
                                              id=&quot;uifm_fld_inp19_dateformat&quot; 
                                              data-field-store=&quot;input_date2-dateformat&quot;&gt; 
                                        &lt;/div&gt;    

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                        &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Language&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Language&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;select id=&quot;uifm_fld_inp19_language&quot; 
                                                style=&quot;width:73px;&quot;
                                                onchange=&quot;&quot;
                                                data-field-store=&quot;input_date2-language&quot;
                                                class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                                            &lt;option value=&quot;en&quot;&gt;English&lt;/option&gt;
                                            &lt;option value=&quot;es&quot;&gt;Spanish&lt;/option&gt;
                                            &lt;option value=&quot;fr&quot;&gt;French&lt;/option&gt;
                                            &lt;option value=&quot;ir&quot;&gt;Italian&lt;/option&gt;
                                            &lt;option value=&quot;ja&quot;&gt;Japanese&lt;/option&gt;
                                            &lt;option value=&quot;pt&quot;&gt;Portuguese&lt;/option&gt;
                                            &lt;option value=&quot;ru&quot;&gt;Russian&lt;/option&gt;
                                            &lt;option value=&quot;zh&quot;&gt;Chinese&lt;/option&gt;
                                            &lt;option value=&quot;de&quot;&gt;German&lt;/option&gt;
                                            &lt;option value=&quot;da&quot;&gt;Danish&lt;/option&gt;
                                        &lt;/select&gt;
                                        
                                       
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                         &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Minimum date&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Minimum date&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        
                                       &lt;input type=&quot;text&quot; 
                                              class=&quot;sfdc-form-control uifm-f-setoption&quot; 
                                              name=&quot;uifm_fld_inp19_mindate&quot; 
                                              id=&quot;uifm_fld_inp19_mindate&quot; 
                                              data-field-store=&quot;input_date2-mindate&quot;&gt; 
                                        &lt;/div&gt;    

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                         &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Maximum date&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Maximum date&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        
                                       &lt;input type=&quot;text&quot; 
                                              class=&quot;sfdc-form-control uifm-f-setoption&quot; 
                                              name=&quot;uifm_fld_inp19_maxdate&quot; 
                                              id=&quot;uifm_fld_inp19_maxdate&quot; 
                                              data-field-store=&quot;input_date2-maxdate&quot;&gt; 
                                        &lt;/div&gt;    

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                        &lt;div class=&quot;sfdc-row &quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        &lt;label for=&quot;&quot;&gt;Default date&lt;/label&gt; 
                                        &lt;a data-original-title=&quot;Default date&quot; data-placement=&quot;right&quot; data-toggle=&quot;tooltip&quot; href=&quot;javascript:void(0);&quot;&gt;&lt;span class=&quot;fa fa-question-circle&quot;&gt;&lt;/span&gt;&lt;/a&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                        
                                       &lt;input type=&quot;text&quot; 
                                              class=&quot;sfdc-form-control uifm-f-setoption&quot; 
                                              name=&quot;uifm_fld_inp19_defaultdate&quot; 
                                              id=&quot;uifm_fld_inp19_defaultdate&quot; 
                                              data-field-store=&quot;input_date2-defaultdate&quot;&gt; 
                                        &lt;/div&gt;    

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;zgpb-opt-divider-stl1&quot;&gt;&lt;/div&gt;
                    &lt;/div&gt;
    &lt;/fieldset&gt;                
    
&lt;/div&gt; 
        &lt;!--\end container --&gt;
&lt;/div&gt;
                                                                        &lt;!--\end container --&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;div class=&quot;sfdc-tab-pane uifm-tab-fld-helpblock&quot; id=&quot;uiform-settings-tab-3&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content  scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                         &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-field-lbl-panel&quot;&gt;
    &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-helpblock&quot;&gt;
        &lt;div class=&quot;uifm-set-section-helpblock-text&quot;&gt;
            &lt;div class=&quot;sfdc-row&quot;&gt;
                &lt;div class=&quot;sfdc-col-sm-12&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label class=&quot;sfdc-control-label&quot; for=&quot;&quot;&gt;
                        Help block text                    &lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                                                  &lt;textarea 
                            class=&quot;uifm_tinymce_obj&quot;
                            name=&quot;uifm_fld_msc_text&quot;
                            id=&quot;uifm_fld_msc_text&quot;&gt;&lt;/textarea&gt;
                    &lt;/div&gt;

                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
        
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Show help block&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;input class=&quot;switch-field&quot;
                                   data-field-store=&quot;help_block-show_st&quot;
                                   id=&quot;uifm_fld_hblock_st&quot;
                                   name=&quot;uifm_fld_hblock_st&quot;
                                   type=&quot;checkbox&quot;/&gt;
                        
                        
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Font&lt;/label&gt;
                    &lt;div class=&quot;sfdc-input-group uifm-custom-font&quot;&gt;
                        &lt;input type=&quot;hidden&quot; value=&quot;&quot; name=&quot;uifm_fld_lbl_font&quot;&gt;
                                                

&lt;select name=&quot;uifm_fld_hblock_font&quot;id=&quot;uifm_fld_hblock_font&quot;data-field-store=&quot;help_block-font&quot; class=&quot;sfm&quot; data-selected=&quot;{&amp;quot;family&amp;quot;:&amp;quot;Arial, Helvetica, sans-serif&amp;quot;,&amp;quot;name&amp;quot;:&amp;quot;Arial&amp;quot;,&amp;quot;classname&amp;quot;:&amp;quot;arial&amp;quot;}&quot; data-placeholder=&quot;Select a Font...&quot;&gt;
	&lt;option value=&quot;&quot;&gt;&lt;/option&gt;


&lt;/select&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;
                        &lt;input 
                            data-field-store=&quot;help_block-font_st&quot;
                            id=&quot;uifm_fld_hblock_font_st&quot;
                            name=&quot;uifm_fld_hblock_font_st&quot;
                            class=&quot;uifm-f-setoption-st&quot;
                            value=&quot;1&quot;
                            type=&quot;checkbox&quot;&gt;
                        &lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Help block position&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;help_block-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                        &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_hblock_pos_1&quot; 
                           name=&quot;uifm_fld_hblock_pos&quot;   
                           value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-hand-o-down&quot;&gt;&lt;/i&gt; At bottom                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;help_block-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_hblock_pos_2&quot; 
                           name=&quot;uifm_fld_hblock_pos&quot;   
                           value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-hand-o-up&quot;&gt;&lt;/i&gt; At Top                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;help_block-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_hblock_pos_3&quot; 
                           name=&quot;uifm_fld_hblock_pos&quot;   
                           value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-question-circle&quot;&gt;&lt;/i&gt; Tooltip                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;help_block-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-warning&quot;
                        data-toggle-disable=&quot;sfdc-btn-warning&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-warning uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  
                           id=&quot;uifm_fld_hblock_pos_4&quot; 
                           name=&quot;uifm_fld_hblock_pos&quot;   
                           value=&quot;3&quot;&gt;&lt;i class=&quot;fa fa-question-circle&quot;&gt;&lt;/i&gt; Pop up                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
    
&lt;/div&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;div class=&quot;sfdc-tab-pane uifm-tab-fld-validation&quot; id=&quot;uiform-settings-tab-4&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content  scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                        &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-field-lbl-panel&quot;&gt;
    &lt;div class=&quot;space20&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;uifm-set-section-validator&quot;&gt;
    
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label&gt;Add validator&lt;/label&gt;
            &lt;div class=&quot;controls form-group tooltip-val-container validators-options-container&quot;&gt;
                
                &lt;div class=&quot;uifm-fld-val-opts&quot;&gt;
                    &lt;!-- checkbox group buttons --&gt;
                    &lt;div class=&quot; sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                            
                            &lt;!-- validetor button --&gt;
                            &lt;label 
                                id=&quot;uifm-custom-val-req-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;5&quot;
                                data-field-select-box=&quot;uifm-custom-val-req&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks&quot;  &gt;
                                     Required                            &lt;/label&gt;
                            &lt;!--/ validetor button --&gt;
                            &lt;label 
                                id=&quot;uifm-custom-val-regex-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;6&quot;
                                data-field-select-box=&quot;uifm-custom-val-req&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks zgfm-set-section-custominput-box&quot;  &gt;
                                     Custom                            &lt;/label&gt;
                          &lt;/div&gt;
                        &lt;div class=&quot; sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                            &lt;!-- validetor button --&gt;
                            &lt;label 
                                id=&quot;uifm-custom-val-alpha-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;1&quot;
                                data-field-select-box=&quot;uifm-custom-val-alpha&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks&quot;  &gt;
                                     Letters                            &lt;/label&gt;
                            &lt;!--/ validetor button --&gt;
                            &lt;label 
                                id=&quot;uifm-custom-val-alphanum-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;2&quot;
                                data-field-select-box=&quot;uifm-custom-val-alphanum&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks&quot; &gt;
                                 Letter &amp; Numbers                            &lt;/label&gt;
                          &lt;/div&gt;
                         &lt;div class=&quot; sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;   
                            &lt;label 
                                id=&quot;uifm-custom-val-num-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;3&quot;
                                data-field-select-box=&quot;uifm-custom-val-num&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks&quot; &gt;
                                  Only numbers                            &lt;/label&gt;
                            &lt;label 
                                id=&quot;uifm-custom-val-mail-btn&quot;
                                data-field-store=&quot;validate-typ_val&quot;
                                data-field-value=&quot;4&quot;
                                data-field-select-box=&quot;uifm-custom-val-mail&quot;
                                data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks&quot; &gt;
                                 Email                            &lt;/label&gt;
                        &lt;/div&gt;
                &lt;/div&gt;
                
                        &lt;!--&lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;    
                            &lt;label data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary&quot; &gt;
                            &lt;input type=&quot;checkbox&quot;  value=&quot;0&quot;&gt; Greater than                            &lt;/label&gt;
                            &lt;label data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary&quot; &gt;
                            &lt;input type=&quot;checkbox&quot;  value=&quot;0&quot;&gt; Identical                            &lt;/label&gt;
                            &lt;label data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary&quot; &gt;
                                &lt;input type=&quot;checkbox&quot;  value=&quot;0&quot;&gt; Less than                            &lt;/label&gt;
                            &lt;label data-toggle-enable=&quot;sfdc-btn-primary&quot;
                                data-toggle-disable=&quot;sfdc-btn-primary&quot;
                                data-settings-option=&quot;group-checkboxes&quot;
                                class=&quot;sfdc-btn sfdc-btn-primary&quot; &gt;
                                &lt;input type=&quot;checkbox&quot;  value=&quot;0&quot;&gt; Length                            &lt;/label&gt;
                       &lt;/div&gt;--&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
        &lt;div class=&quot;sfdc-row&quot; id=&quot;uifm-custom-val-title-added&quot; style=&quot;display:none;&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                &lt;label &gt;Validator:             &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;uifm-custom-wrap-validators&quot;&gt;
            &lt;!-- Required --&gt;
            &lt;div class=&quot;uifm-custom-validator uifm-custom-val-req&quot; style=&quot;display:none;&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Validator configuration:  Required&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;uifm-custom-val-errormsg&quot;&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;span class=&quot;uifm-custom-val-title1&quot;&gt;Translate error message &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                &lt;label &gt;Default Message&lt;/label&gt;
                                &lt;input id=&quot;uifm-custom-val-req-deftxt&quot;
                                       type=&quot;hidden&quot;
                                       value=&quot;this is required&quot;
                                       &gt;
                                &lt;div&gt;
                                    this is required                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom Error Message&lt;/label&gt;
                                    &lt;textarea 
                                        data-field-store=&quot;validate-typ_val_custxt&quot;
                                            style=&quot;width:100%;padding: 5px;&quot;
                                              rows=&quot;2&quot;
                                              class=&quot;autogrow uifm-f-setoption uifm-custom-val-custxt&quot;
                                              id=&quot;uifm-custom-val-req-custxt&quot;&gt;&lt;/textarea&gt;
                                    &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div id=&quot;zgfm-field-val-custominput-box&quot; style=&quot;display:none;&quot; class=&quot;sfdc-row zgfm-set-section-custominput-box&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom validation&lt;/label&gt;
                                    &lt;div class=&quot;sfdc-alert sfdc-alert-warning&quot;&gt;
                                        &lt;strong&gt;Info!&lt;/strong&gt; Validation using a character pattern or regular expression                                        e.g. &lt;code&gt;^[a-zA-Zа-яА-ЯёЁ&#039;][a-zA-Z-а-яА-ЯёЁ&#039; ]+[a-zA-Zа-яА-ЯёЁ&#039;]?$&lt;/code&gt;
                                    &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                &lt;input id=&quot;uifm-custom-val-req-regexinput&quot; 
                                data-field-store=&quot;validate-customval_regex&quot;
                                        class=&quot;uifm-f-setoption sfdc-form-control&quot;
                                       placeholder=&quot;Add your character pattern here&quot;
                                       value=&quot;&quot;&gt;
                                
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;!-- Alphabet --&gt;
            &lt;div class=&quot;uifm-custom-validator uifm-custom-val-alpha&quot; style=&quot;display:none;&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Validator configuration:  Letters&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;uifm-custom-val-errormsg&quot;&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;span class=&quot;uifm-custom-val-title1&quot;&gt;Translate error message &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Default Message&lt;/label&gt;
                                    &lt;input id=&quot;uifm-custom-val-alpha-deftxt&quot; 
                                       type=&quot;hidden&quot;
                                       value=&quot;Required only letters&quot;
                                       &gt;
                                &lt;div&gt;
                                    Required only letters                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom Error Message&lt;/label&gt;
                                    &lt;textarea data-field-store=&quot;validate-typ_val_custxt&quot;
                                            style=&quot;width:100%;padding: 5px;&quot;
                                              rows=&quot;2&quot;
                                              class=&quot;autogrow uifm-f-setoption uifm-custom-val-custxt&quot;
                                              id=&quot;uifm-custom-val-alpha-custxt&quot;&gt;&lt;/textarea&gt;
                                    &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;!-- Alphabet numbers--&gt;
            &lt;div class=&quot;uifm-custom-validator uifm-custom-val-alphanum&quot; style=&quot;display:none;&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Validator configuration:  Letters and Numbers&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;uifm-custom-val-errormsg&quot;&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;span class=&quot;uifm-custom-val-title1&quot;&gt;Translate error message &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Default Message&lt;/label&gt;
                                    &lt;input id=&quot;uifm-custom-val-alphanum-deftxt&quot; 
                                       type=&quot;hidden&quot;
                                       value=&quot;Required only Letters and Numbers&quot;
                                       &gt;
                                &lt;div&gt;
                                    Required only Letters and Numbers                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom Error Message&lt;/label&gt;
                                    &lt;textarea data-field-store=&quot;validate-typ_val_custxt&quot;
                                              style=&quot;width:100%;padding: 5px;&quot;
                                              rows=&quot;2&quot;
                                              class=&quot;autogrow uifm-f-setoption uifm-custom-val-custxt&quot;
                                              id=&quot;uifm-custom-val-alphanum-custxt&quot;&gt;&lt;/textarea&gt;
                                    &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
             &lt;!-- Only numbers--&gt;
            &lt;div class=&quot;uifm-custom-validator uifm-custom-val-num&quot; style=&quot;display:none;&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Validator configuration:  Only numbers&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;uifm-custom-val-errormsg&quot;&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;span class=&quot;uifm-custom-val-title1&quot;&gt;Translate error message &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Default Message&lt;/label&gt;
                                    &lt;input id=&quot;uifm-custom-val-numbers-deftxt&quot; 
                                       type=&quot;hidden&quot;
                                       value=&quot;Required only numbers&quot;
                                       &gt;
                                &lt;div&gt;
                                    Required only numbers                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom Error Message&lt;/label&gt;
                                    &lt;textarea data-field-store=&quot;validate-typ_val_custxt&quot;
                                              style=&quot;width:100%;padding: 5px;&quot;
                                              rows=&quot;2&quot;
                                              class=&quot;autogrow uifm-f-setoption uifm-custom-val-custxt&quot;
                                              id=&quot;uifm-custom-val-numbers-custxt&quot;&gt;&lt;/textarea&gt;
                                    &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
              &lt;!-- Email --&gt;
            &lt;div class=&quot;uifm-custom-validator uifm-custom-val-mail&quot; style=&quot;display:none;&quot;&gt;
                &lt;div class=&quot;sfdc-row&quot;&gt;
                    &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                        &lt;label &gt;Validator configuration:  Email&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;uifm-custom-val-errormsg&quot;&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
                            &lt;span class=&quot;uifm-custom-val-title1&quot;&gt;Translate error message &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;sfdc-row&quot;&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Default Message&lt;/label&gt;
                                    &lt;input id=&quot;uifm-custom-val-email-deftxt&quot; 
                                       type=&quot;hidden&quot;
                                       value=&quot;Required a valid mail&quot;
                                       &gt;
                                &lt;div&gt;
                                    Required a valid mail                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                                    &lt;label &gt;Custom Error Message&lt;/label&gt;
                                    &lt;textarea data-field-store=&quot;validate-typ_val_custxt&quot;
                                              style=&quot;width:100%;padding: 5px;&quot;
                                              rows=&quot;2&quot;
                                              class=&quot;autogrow uifm-f-setoption uifm-custom-val-custxt&quot;
                                              id=&quot;uifm-custom-val-email-custxt&quot;&gt;&lt;/textarea&gt;
                                    &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;label &gt;Alert position&lt;/label&gt;
            &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;validate-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;
                           id=&quot;uifm_fld_val_pos_1&quot; 
                           name=&quot;uifm_fld_val_pos&quot;
                           value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-hand-o-up&quot;&gt;&lt;/i&gt; Top                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;validate-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;
                           id=&quot;uifm_fld_val_pos_2&quot; 
                           name=&quot;uifm_fld_val_pos&quot;
                           value=&quot;1&quot;&gt; &lt;i class=&quot;fa fa-hand-o-right&quot;&gt;&lt;/i&gt; Right                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;validate-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;
                           id=&quot;uifm_fld_val_pos_3&quot; 
                           name=&quot;uifm_fld_val_pos&quot;
                           value=&quot;2&quot;&gt; &lt;i class=&quot;fa fa-hand-o-down&quot;&gt;&lt;/i&gt; Bottom                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;validate-pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;
                        id=&quot;uifm_fld_val_pos_4&quot; 
                        name=&quot;uifm_fld_val_pos&quot;
                        value=&quot;3&quot;&gt; &lt;i class=&quot;fa fa-hand-o-left&quot;&gt;&lt;/i&gt; Left                    &lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Text Color&lt;/label&gt;
                    &lt;div data-field-store=&quot;validate-tip_col&quot;
                         class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;input 
                            type=&quot;text&quot; 
                            value=&quot;&quot; 
                            id=&quot;uifm_fld_val_tipcolor&quot; 
                            name=&quot;uifm_fld_val_tipcolor&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-6&quot;&gt;
             &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Background Color&lt;/label&gt;
                    &lt;div data-field-store=&quot;validate-tip_bg&quot;
                         class=&quot;sfdc-input-group uifm-custom-color&quot;&gt;
                        &lt;span class=&quot;sfdc-input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt;
                        &lt;input 
                            type=&quot;text&quot; 
                            value=&quot;&quot; 
                            id=&quot;uifm_fld_val_tipbg&quot; 
                            name=&quot;uifm_fld_val_tipbg&quot; class=&quot;sfdc-form-control&quot; /&gt;
                        
                    &lt;/div&gt;

                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;    
        &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;divider2&quot;&gt;
            &lt;div class=&quot;mask&quot;&gt;&lt;/div&gt;
            &lt;span&gt;&lt;i&gt;Required icon&lt;/i&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-4&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Set required icon&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;input class=&quot;switch-field&quot;
                               data-field-store=&quot;validate-reqicon_st&quot;
                                id=&quot;uifm_fld_val_reqicon_st&quot;
                                name=&quot;uifm_fld_val_reqicon_st&quot;
                               type=&quot;checkbox&quot; /&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
         &lt;div class=&quot;sfdc-col-sm-8&quot;&gt;
                &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Choose required icon&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;button 
                            id=&quot;uifm_fld_val_reqicon_img&quot;
                            data-field-store=&quot;validate-reqicon_img&quot;
                            class=&quot;sfdc-btn sfdc-btn-default&quot; 
                            data-iconset=&quot;glyphicon&quot;
                            role=&quot;iconpicker&quot;&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
            &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
               &lt;div class=&quot;sfdc-form-group&quot;&gt;
                    &lt;label &gt;Required icon position&lt;/label&gt;
                    &lt;div class=&quot;sfdc-controls sfdc-form-group&quot;&gt;
                        &lt;div class=&quot;sfdc-btn-group sfdc-btn-group-justified&quot; data-toggle=&quot;buttons&quot;&gt;
                    &lt;label 
                        data-field-store=&quot;validate-reqicon_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        id=&quot;uifm_fld_val_reqicon_pos_1&quot; 
                        name=&quot;uifm_fld_val_reqicon_pos_1&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  value=&quot;0&quot;&gt; &lt;i class=&quot;fa fa-asterisk&quot;&gt;&lt;/i&gt; Before label                    &lt;/label&gt;
                    &lt;label 
                        data-field-store=&quot;validate-reqicon_pos&quot;
                        data-toggle-enable=&quot;sfdc-btn-success&quot;
                        data-toggle-disable=&quot;sfdc-btn-success&quot;
                        data-settings-option=&quot;group-radiobutton&quot;
                        id=&quot;uifm_fld_val_reqicon_pos_2&quot; 
                        name=&quot;uifm_fld_val_reqicon_pos_2&quot;
                        class=&quot;sfdc-btn sfdc-btn-success uifm-f-setoption-btn&quot; &gt;
                    &lt;input type=&quot;radio&quot;  value=&quot;1&quot;&gt;&lt;i class=&quot;fa fa-asterisk&quot;&gt;&lt;/i&gt; After label                    &lt;/label&gt;
                &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    
&lt;/div&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;div class=&quot;sfdc-tab-pane uifm-tab-fld-logicrls&quot; id=&quot;uiform-settings-tab-6&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content  scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                       &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-form-clogic&quot;&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
            &lt;div class=&quot;sfdc-form-group&quot;&gt;
                  
                                             &lt;label &gt;Enable Conditional logic&lt;/label&gt;
                        &lt;div class=&quot;&quot;&gt;
                            &lt;div class=&quot;sfdc-col-md-6&quot;&gt;
                                &lt;input 
                                       class=&quot;switch-field&quot;
                                       data-field-store=&quot;clogic-show_st&quot;
                                       id=&quot;uifm_frm_clogic_st&quot;
                                       type=&quot;checkbox&quot;/&gt;
                            &lt;/div&gt;

                        &lt;/div&gt;
                
                                         
                &lt;/div&gt;
        &lt;/div&gt;
        
    &lt;/div&gt;
    &lt;div class=&quot;sfdc-row&quot;&gt;
        &lt;div class=&quot;sfdc-col-md-12&quot;&gt;
           &lt;div id=&quot;uifm-show-conditional-logic&quot; class=&quot;sfdc-clearfix&quot; style=&quot;display:none;&quot;&gt;
    &lt;div class=&quot;sfdc-form-group&quot;&gt;
        
        &lt;div class=&quot;&quot;&gt;
            &lt;div class=&quot;conditional-logic-box form-inline&quot;&gt;
                &lt;div class=&quot;&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                        &lt;select id=&quot;uifm_frm_clogic_show&quot; 
                                style=&quot;width:85px;display: inline;&quot; 
                                data-field-store=&quot;clogic-f_show&quot;
                                class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;option selected=&quot;selected&quot; value=&quot;1&quot;&gt;Show&lt;/option&gt;
                            &lt;option value=&quot;2&quot;&gt;Hide&lt;/option&gt;
                        &lt;/select&gt;
                        &lt;label style=&quot;display: inline;&quot; &gt; this field if&lt;/label&gt;
                        &lt;select id=&quot;uifm_frm_clogic_all&quot; 
                                style=&quot;width:64px;display:inline;&quot; 
                                data-field-store=&quot;clogic-f_all&quot;
                                class=&quot;sfdc-form-control uifm-f-setoption&quot;&gt;
                            &lt;option value=&quot;1&quot;&gt;All&lt;/option&gt;
                            &lt;option selected=&quot;selected&quot; value=&quot;2&quot;&gt;Any&lt;/option&gt;
                        &lt;/select&gt;
                        &lt;label style=&quot;display: inline;&quot; &gt;of the following rule match:&lt;/label&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;space20&quot;&gt;

                &lt;/div&gt;
                &lt;div class=&quot;&quot;&gt;
                    &lt;div class=&quot;sfdc-form-group&quot;&gt;
                        &lt;button onclick=&quot;javascript:rocketform.clogic_addNewConditional();&quot; 
                                class=&quot;sfdc-btn sfdc-btn-primary&quot; type=&quot;button&quot;&gt;
                            Add new conditional Logic                        &lt;/button&gt;
                        &lt;button class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot; onclick=&quot;javascript:rocketform.clogic_removeAll();&quot;&gt;
             &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt; Remove all&lt;/button&gt;
                    &lt;/div&gt;


                &lt;/div&gt;
                &lt;div id=&quot;uifm-conditional-logic-list&quot;&gt;&lt;/div&gt;
 
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;div class=&quot;clear&quot;&gt;&lt;/div&gt;
&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div id=&quot;uiform-set-clogic-tmpl&quot; style=&quot;display:none;&quot;&gt;
    &lt;select 
                class=&quot;uifm_clogic_fieldsel&quot; 
                onchange=&quot;javascript:rocketform.clogic_changeField(this);&quot; &gt;
        &lt;/select&gt;
    
    &lt;input 
        onchange=&quot;javascript:rocketform.clogic_changeMinput(this);&quot;
        class=&quot;uifm_clogic_minput_2&quot; type=&quot;text&quot;&gt;
    &lt;select 
                class=&quot;uifm_clogic_minput_1&quot; 
                onchange=&quot;javascript:rocketform.clogic_changeMinput(this);&quot; &gt;
        &lt;/select&gt;
    &lt;select 
        onchange=&quot;javascript:rocketform.clogic_changeMtype(this);&quot;
        class=&quot;sfdc-form-control uifm_clogic_mtypeinp uifm_clogic_mtypeinp_1&quot;&gt;
        &lt;option selected=&quot;selected&quot; value=&quot;1&quot;&gt;is&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;is not&lt;/option&gt;
    &lt;/select&gt;
    &lt;select 
        onchange=&quot;javascript:rocketform.clogic_changeMtype(this);&quot;
        class=&quot;sfdc-form-control uifm_clogic_mtypeinp uifm_clogic_mtypeinp_2&quot;&gt;
        &lt;option selected=&quot;selected&quot; value=&quot;1&quot;&gt;is&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;is not&lt;/option&gt;
        &lt;option value=&quot;3&quot;&gt;greater than&lt;/option&gt;
        &lt;option value=&quot;4&quot;&gt;less than&lt;/option&gt;
    &lt;/select&gt;
    
    &lt;div data-row-index=&quot;0&quot;
                        class=&quot;uifm-conditional-row&quot;&gt;
                        &lt;div class=&quot;&quot;&gt;
                            &lt;div  class=&quot;uifm_clogic_deloption&quot;&gt;
                                
                                &lt;a href=&quot;javascript:void(0)&quot; class=&quot;sfdc-btn sfdc-btn-sm sfdc-btn-danger&quot;
                               onclick=&quot;javascript:rocketform.clogic_deleteConditional(this);&quot; &gt;
                                    &lt;i class=&quot;fa fa-trash-o&quot;&gt;&lt;/i&gt;
                                &lt;/a&gt;
                            &lt;/div&gt;
                            &lt;div  class=&quot;uifm_clogic_field&quot;&gt;
                                
                            &lt;/div&gt;
                            
                            &lt;div class=&quot;uifm_clogic_mtype&quot;&gt;
                                
                            &lt;/div&gt;

                            &lt;div  class=&quot;uifm_clogic_minput&quot;&gt;
                                
                            &lt;/div&gt;
                        
                    &lt;/div&gt;
                    &lt;/div&gt;
&lt;/div&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;div class=&quot;sfdc-tab-pane uifm-tab-fld-more&quot; id=&quot;uiform-settings-tab-7&quot;&gt;
                                                                &lt;div class=&quot;uiform-tab-content  scroll-pane-arrows&quot;&gt;
                                                                    &lt;div class=&quot;uiform-tab-content-inner&quot;&gt;
                                                                       &lt;div class=&quot;uiform-set-field-wrap&quot; id=&quot;uiform-set-form-more&quot;&gt;
    
    
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
           
           
          &lt;fieldset &gt;
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
                                             id=&quot;zgpb_fld_col_ctmid&quot;
                                             readonly=&quot;readonly&quot;
                                             class=&quot;sfdc-form-control&quot;&gt;
                                        
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
                        
                        &lt;div style=&quot;display:none;&quot;&gt;
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
                        &lt;/div&gt;
                        
                       &lt;div class=&quot;space5&quot;&gt;&lt;/div&gt;
                    &lt;/div&gt;
         &lt;/fieldset&gt;
    &lt;!-- load modules --&gt;
            
    &lt;!--/ load modules --&gt;
    
&lt;/div&gt;
 &lt;script type=&quot;text/javascript&quot;&gt;
   
 zgfm_back_fld_options.selfld_settings_form_more();

&lt;/script&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                    &lt;/div&gt;
                                                    &lt;!--\ End Tab panes --&gt; 
                                            &lt;/div&gt;
                                            &lt;!-- second panel --&gt;
                                            
                                    &lt;/div&gt;
                                        &lt;/div&gt;
  &lt;/div&gt;                                      
 
&lt;script type=&quot;text/javascript&quot;&gt;
 zgfm_back_fld_options.selfld_field_opt_text();
&lt;/script&gt;

</script>