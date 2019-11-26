if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_fld_options = zgfm_back_fld_options || null;
if(!$uifm.isFunction(zgfm_back_fld_options)){
(function($, window) {
 "use strict";  
    
var zgfm_back_fld_options = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    }
    
    this.generate_field_htmldata = function(){
        $.ajax({
                        type: 'POST',
                        url: rockfm_vars.uifm_siteurl+"formbuilder/fields/ajax_dev_genfieldopts",
                        data: {
                        'action': 'rocket_fbuilder_dev_generate_fieldopt',
                        'page':'zgfm_form_builder',
                        'zgfm_security':uiform_vars.ajax_nonce,
                        'csrf_field_name':uiform_vars.csrf_field_name
                            },
                        beforeSend: function() {
                                     
                                    },    
                        success: function(response) {
                             alert('generate field options finished');
                        }
                    });
    };
    
    this.load_on_selecteField = function(tmp_fld_load,msg) {
        
        var block;
            
           var id=tmp_fld_load['id'];
           var type=tmp_fld_load['typefield'];
           var step_pane=tmp_fld_load['step_pane'];
           var addt=tmp_fld_load['addt'];
           var oncreation=tmp_fld_load['oncreation']||false;
           
           var field_vars=[];
           field_vars['oncreation']=oncreation;
           
           var flag_tinymce_loaded;
           
            var tmp_field_inst;
        //removing instance of tinyMCE of previous ajax content
                                     rocketform.tinymceEvent_removeInst();
                                     
                                    //load data on modal
                                    if(false){
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html('');
                                        rocketform.modal_field_loader(1);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').append(msg.modal_body);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                                    }else{
                                        //load data on tab
                                        $('#uiform-build-field-tab').html(msg.modal_body);
                                        
                                    }
                                     
                                    //autocomplete off - chrome issue
                                    $('input,textarea').attr('autocomplete', 'off');
                                       $('#zgfm_edit_panel').disableAutoFill({
                                        passwordField: '.password'}
                                    );
                                     
                                    //refresh type and id
                                    $('#uifm-field-selected-id').val(id);
                                    $('#uifm-field-selected-type').val(type);
                                     
                                    var f_data=rocketform.getUiData3('steps_src',step_pane,id);
                                    
                                     
                                     switch (parseInt(type)) {
                                                case 1:
                                                case 2:
                                                case 3:
                                                case 4:
                                                case 5:
                                                    //grid system
                                                    var block=(addt)?addt['block']:0;
                                                     $('#zgpb-field-selected-block').val(block);
                                                     tmp_field_inst= $('#'+id).data('zgpbld_gridsystem');
                                                     
                                                     tmp_field_inst.setVariables(field_vars);
                                                     tmp_field_inst.enableSettingOptions(f_data,addt); 
                                                     
                                                    break;     
                                                case 6:
                                                    //text
                                                case 7:
                                                    //textarea 
                                                case 8:
                                                    //radio button field
                                                    //enable options related

                                                case 9:
                                                    //checkbox field

                                                case 10:
                                                    //select field

                                                case 11:
                                                    //multiselect field

                                                case 12:
                                                    /*fileupload*/

                                                case 13:
                                                    /*imageupload*/

                                                case 14:
                                                    /*customhtml*/

                                                case 15:
                                                    /*password*/

                                                case 16:
                                                    /*slider*/

                                                case 17:
                                                    /*range*/

                                                case 18:
                                                    /*spinner*/

                                                case 19:
                                                    /*captcha*/

                                                case 20:
                                                    /*submit button*/

                                                case 21:
                                                    /*hidden field*/

                                                case 22:
                                                    /*star rating*/

                                                case 23:
                                                    /*color picker*/

                                                case 24:
                                                    /*datepicker*/

                                                case 25:
                                                    /*time picker*/

                                                case 26:
                                                    /*date time*/

                                                case 27:
                                                    /*recaptcha*/
                                                case 28:
                                                    /*prepended txt*/
                                                case 29:
                                                    /*appended txt*/
                                                case 30:
                                                    /*prep - app txt*/
                                                case 31:
                                                    /* panel */
                                                case 32:
                                                    /*divider*/
                                                case 33:
                                                case 34:
                                                case 35:
                                                case 36:
                                                case 37:
                                                case 38:
                                                    //columns
                                                case 39:
                                                    /*wizard buttons*/
                                                case 40:
                                                    /*wizard buttons*/
                                                case 41:
                                                    /*dyn checkbox*/
                                                case 42:
                                                    
                                                case 43:    
                                                    /*date beta*/
                                                     rocketform.tinymceEvent_init();
                                                     
                                                        flag_tinymce_loaded=false;
                                                       var zgpb_afterdrag_timer_2;
                                                       /*  setTimeout(function(){ 
                                                                        if(zgpb_afterdrag_timer_2!=null){
                                                                             clearInterval(zgpb_afterdrag_timer_2);
                                                                        zgpb_afterdrag_timer_2=null;
                                                                         }
                                                                    }, 10000);*/
                                                                    
                                                          zgpb_afterdrag_timer_2 = setInterval(function(){
                                                                if(rocketform.checkIntegrityTinyMCE(type)){
                                                                     var tmp_field_inst;
                                                                     switch (parseInt(type)) {
                                                                                case 6:
                                                                                    //textbox
                                                                                   tmp_field_inst= $('#'+id).data('uiform_textbox');
                                                                                break;
                                                                                case 7:
                                                                                    //textarea
                                                                                    tmp_field_inst= $('#'+id).data('uiform_textarea');
                                                                                break;
                                                                                case 8:
                                                                                    //radio button field
                                                                                    //enable options related
                                                                                    tmp_field_inst= $('#'+id).data('uiform_radiobtn');  
                                                                                    break;
                                                                                case 9:
                                                                                    //checkbox field
                                                                                     tmp_field_inst= $('#'+id).data('uiform_checkbox');  
                                                                                    break;
                                                                                case 10:
                                                                                    //select field
                                                                                    tmp_field_inst= $('#'+id).data('uiform_select'); 
                                                                                    break;
                                                                                case 11:
                                                                                    //multiselect field
                                                                                    tmp_field_inst= $('#'+id).data('uiform_multiselect');
                                                                                    break;
                                                                                case 12:
                                                                                    /*fileupload*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_fileupload');
                                                                                    break;
                                                                                case 13:
                                                                                    /*imageupload*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_imageupload');
                                                                                    break;
                                                                                case 14:
                                                                                    /*customhtml*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_customhtml');
                                                                                    break;
                                                                                case 15:
                                                                                    /*password*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_password');
                                                                                    break;
                                                                                case 16:
                                                                                    /*slider*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_slider');
                                                                                    break;
                                                                                case 17:
                                                                                    /*range*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_range');
                                                                                    break;
                                                                                case 18:
                                                                                    /*spinner*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_spinner'); 
                                                                                    break;
                                                                                case 19:
                                                                                    /*captcha*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_captcha'); 
                                                                                    break;
                                                                                case 20:
                                                                                    /*submit button*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_submitbtn');
                                                                                    break;
                                                                                case 21:
                                                                                    /*hidden field*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_hiddeninput');
                                                                                    break;
                                                                                case 22:
                                                                                    /*star rating*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_ratingstar');    
                                                                                    break;
                                                                                case 23:
                                                                                    /*color picker*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_colorpicker');
                                                                                    break;    
                                                                                case 24:
                                                                                    /*datepicker*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_datepicker');
                                                                                    break;
                                                                                case 25:
                                                                                    /*time picker*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_timepicker');
                                                                                    break;
                                                                                case 26:
                                                                                    /*date time*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_datetime');
                                                                                    break;    
                                                                                case 27:
                                                                                    /*recaptcha*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_recaptcha');
                                                                                    break;
                                                                                case 28:
                                                                                    /*prepended txt*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_preptext');  
                                                                                    break;
                                                                                case 29:
                                                                                    /*appended txt*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_appetext');
                                                                                    break;
                                                                                case 30:
                                                                                    /*prep - app txt*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_prepapptext');
                                                                                    break;
                                                                                case 31:
                                                                                    /* panel */
                                                                                    tmp_field_inst= $('#'+id).data('uiform_panelfld');
                                                                                    break;
                                                                                case 32:
                                                                                    /*divider*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_divider');
                                                                                    break;
                                                                                case 33:
                                                                                case 34:
                                                                                case 35:
                                                                                case 36:
                                                                                case 37:
                                                                                case 38:
                                                                                    //heading
                                                                                    //enable options related
                                                                                    tmp_field_inst= $('#'+id).data('uiform_heading');
                                                                                    break;
                                                                                case 39:
                                                                                    /*wizard buttons*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_wizardbtn');
                                                                                    break;
                                                                                case 40:
                                                                                    /*wizard buttons*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_switch');
                                                                                    break;
                                                                                case 41:
                                                                                    /*dyn checkbox*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_dyncheckbox');
                                                                                    break; 
                                                                                case 42:
                                                                                    /*dyn radiobtn*/
                                                                                    tmp_field_inst= $('#'+id).data('uiform_dynradiobtn');  
                                                                                    break;
                                                                                case 43:
                                                                                    /*date beta*/
                                                                                    tmp_field_inst= $('#'+id).data('uifm_datepickr_flat');  
                                                                                    break;    
                                                                                
                                                                            }
                                                                            
                                                                     
                                                                     tmp_field_inst.setVariables(field_vars);
                                                                     tmp_field_inst.enableSettingOptions(f_data,addt); 
                                                                     

                                                                 clearInterval(zgpb_afterdrag_timer_2);
                                                                 zgpb_afterdrag_timer_2=null;
                                                                 
                                                                }
                                                             },300);
                                                    
                                                    
                                                    
                                                     
                                                     
                                                    break;
                                               
                                                default: 
                                            } 
                                            
                                   var tmp_fast_load=uiform_vars.fields_fastload;
                                   if(parseInt(tmp_fast_load)===1){
                                        //js scripts        
                                        zgfm_back_fld_options.selfld_settings_form_more();    
                                        zgfm_back_fld_options.selfld_field_opt_column();
                                        zgfm_back_fld_options.selfld_field_opt_text();
                                   }
                                   
                                    /* reenable tooltip*/
                                        /*modal*/
                                    if(false){
                                        $("#zgpb-modal1").find('[data-toggle="tooltip"]').tooltip();
                                    }else{
                                        $('#uiform-build-field-tab').find('[data-toggle="tooltip"]').tooltip();
                                    }
                                     
                                    //update selected id 
                                    $('#uifm-field-selected-id').val(id);
                                    
                                    
                                    //update height tab content
                                    var tmp_height= $('.uiform-builder-maintab-container .uiform-tab-content').first().height();
                                    
                                    $('#uifm-field-opt-content .uiform-tab-content').height(tmp_height);
                                    
                                    //load addons
                                    for (var key in msg.addons) {
                                            if (msg.addons.hasOwnProperty(key)) {
                                                
                                                switch(String(msg.addons[key])){
                                                    case 'func_anim':
                                                        zgfm_back_addon_anim.load_fieldsettings(step_pane,id);
                                                    break;
                                                }
                                            }
                                        }
                                    
                                    //showing tab container
                                    var pickfield=$('#'+id);
                                    
                                    if(pickfield && pickfield.attr("id")){
                                        var idselected= $('#uifm-field-selected-id').val();

                                        if(idselected!=pickfield.attr("id") || (!$('.uifm-tab-selectedfield').is(':visible') && idselected)){
                                            //hide popovers
                                            rocketform.previewfield_hidePopOver();
                                            rocketform.previewfield_removeAllPopovers();
                                            rocketform.previewfield_removeAllUndesiredObj(pickfield);
                                             //hide tooltip
                                            rocketform.previewfield_helpblock_hidetooltip();
                                            
                                        }
                                        //show fields tabs
                                        //rocketform.enableSettingTabOption('uifm-label');
                                    }
    };


/*
* script for settings form more
*/
    
    this.selfld_settings_form_more = function() {
        $uifm(function($) 
        {    
             /*add id to more tab*/
             $('#zgpb_fld_col_ctmid').val('rockfm_'+$('#uifm-field-selected-id').val()); 
            
        });
    };

/*
* script for field opt column
*/
    
    this.selfld_field_opt_column = function() {
              $uifm(function($) 
            {
                    $("#zgpb_fld_col_bg_type_1").on("click", function() {
                        
                       $('#zgpb_fld_col_bg_type_1_cont').show();
                       $('#zgpb_fld_col_bg_type_2_cont').hide();
                        
                    });
                    
                    $("#zgpb_fld_col_bg_type_2").on("click", function() {
                        
                       $('#zgpb_fld_col_bg_type_1_cont').hide();
                       $('#zgpb_fld_col_bg_type_2_cont').show();
                        
                    });
                    
                    $("#zgpb_fld_col_bg_sizetype").on("click", function () {
                        var sVal = $(this).val();
                        if(parseInt(sVal)===1 || parseInt(sVal)===2){
                             $('#zgpb_fld_col_bg_sizetype_len_wrap').show();
                         }else{
                             $('#zgpb_fld_col_bg_sizetype_len_wrap').hide();
                         }
                    });
             
            });
         
        jQuery(function($) 
            {     
                 /*add id to more tab*/
                 $('#zgpb_fld_col_ctmid').val('rockfm_'+$('#uifm-field-selected-id').val()); 
                
            });
    };    


/*
* script for field opt text
*/
    
    this.selfld_field_opt_text = function() {
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
    }; 
    
};
window.zgfm_back_fld_options = zgfm_back_fld_options = $.zgfm_back_fld_options = new zgfm_back_fld_options();


})($uifm,window);
} 