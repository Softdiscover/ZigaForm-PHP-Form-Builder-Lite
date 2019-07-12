$uifm(document).ready(function ($) {
    //load only in edit panel
   
   
   //autocomplete off - chrome issue
   $('input,textarea').attr('autocomplete', 'off');
        $('#zgfm_edit_panel').disableAutoFill({
         passwordField: '.password'}
     );
   
   
    // Attaching our method to the String Object
    String.prototype.cleanup = function() {
       return this.toLowerCase().replace(/[^a-zA-Z0-9]+/g, "_");
    };
    
    //add class to body
    //$('body').addClass('sfdc-wrap');
    
    var setfield_tab_active;
    
	
        $('.uiform-editing-main').ColumnToggle();
        
        /*settings tab*/
        /*$('.uiform-sidebar-fields a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
            e.preventDefault();
            var target = $(e.target).attr("href");
            testAnim(target,'zoomInDown','uifm-transition-effect1');
        });*/
        $('.uiform-builder-data a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
            e.preventDefault();
        var target = $(e.target).attr("href");
            /*$('.scroll-pane-arrows').jScrollPane({autoReinitialise: true,showArrows: true,
                        horizontalGutter: 10});*/
        });
        
      function testAnim(target,x,duration) {
        $(target).addClass(x + ' animated '+duration).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(target).removeClass(x + ' animated '+duration);
        });
        }  
      /*selects*/
      /*$('.uifm_selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
        });*/
      /*scroll pane*/
    /* $('.scroll-pane-arrows').jScrollPane(
                {
                        showArrows: true,
                        horizontalGutter: 10
                }
        );*/
     /* tooltip*/       
     $('[data-toggle="tooltip"]').tooltip({container: "body"});  
     
     /*colorpicker*/
     $('.uifm-custom-color').colorpicker(); 
    
      /*wizard theme changer*/  
      $("#uifm_frm_wiz_theme_typ").on("change", function(e) {
            var f_val=$(e.target).val();
            rocketform.wizardtab_changeTheme(f_val);
        });
   
  
    
    
   
    
    /*selects*/
    $(".chzn-select").chosen({width: "100%",search_contains: true}); 
      
   
   
              /* slider, range*/
       $(".uifm_main_spinner_1").TouchSpin({
        verticalbuttons: true,
       min: 0,
        max: 200,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
   
    
   
    /*tooltip enable field*/
    $(".tooltip-option-enable input").tooltip({
        title : 'Enable',
        container: "body"
    });
    $(".tooltip-val-demo").tooltip({
        title : 'Validator text',
        container: "body"
    });
   
   
    /*autogrow*/
    $(".autogrow").autogrow();
    /*isolate button image*/
    $(".wp-media-buttons").find('#insert-media-button').siblings().hide();
    /*close seeting tab*/
    
    $( "#uifm-close-setting-tab" ).on( "click", function() {
    rocketform.closeSettingTab();
    });
    /*quick options*/
    
    $(document).on( "click", "a.uiform-fields-qopt-select", function(e) {
        var tmp_input=$(this).find('input');
        var id_field=tmp_input.closest('.uiform-field').attr('id');
        if(e.target.tagName != "INPUT") {
            if(tmp_input.is(':checked')){
                tmp_input.prop( "checked",false);
            }else{
                tmp_input.prop( "checked",true);
            }
        } else {
            
        }
        rocketform.fieldQuickOptions_selectField(id_field);
    });
  
    /*
    $(document).on( "click", ".uiform-main-form .uiform-field", function(e) {
        if($(e.target).closest('.uiform-fields-quick-options').index()>0){
           
        }else{
            //clicked outside quick option box
            //disable all checkbox
            if(parseInt($('.uiform-main-form .uiform-fields-qopt-select input:checked').length)>0){
                $('.uiform-main-form .uiform-fields-qopt-select input:checked').prop('checked',false);
            }
            $('.uiform-main-form .uiform-fields-qopt-select input').closest('.uiform-fields-quick-options').removeCss('display');
              //load the tab settings for selected field
            var pickfield = $(e.target).closest('.uiform-field');
           
                if(pickfield && pickfield.attr("id")){
                    var idselected= $('#uifm-field-selected-id').val();
                    var pickOption = $(e.target).closest('.uifm-f-option');
                    if(idselected!=pickfield.attr("id") || (!$('.uifm-tab-selectedfield').is(':visible') && idselected)){
                        //hide popovers
                        rocketform.previewfield_hidePopOver();
                        rocketform.previewfield_removeAllPopovers();
                        rocketform.previewfield_removeAllUndesiredObj(pickfield);
                        //show tabs and load data to preview
                        rocketform.enableSettingTabOnPick(pickfield.attr("id"),pickfield.data("typefield"));
                        //add enhance
                        rocketform.setHighlightPicked(pickfield);
                    }
                    //show fields tabs
                    rocketform.enableSettingTabOption(pickOption.data("field-option"));
                }
        }
     
   
    });*/
    
    
    
    /*tab title*/
    $(document).on( "change keyup focus keypress", ".uifm_frm_skin_tab_title_evt", function(e) {
        var tabnro = $(e.target).closest('.uifm_frm_skin_tab_content').data('tab-nro');
        rocketform.wizardtab_changeTabTitle(tabnro);
    });
    /*options checked*/
    
    
    /* tinymce text*/
    var uifm_obj_txtarea_editors = [ 
                             $('#uifm_frm_summbox_skintxt_txt')
                             
                            ];
    
    
     $(document).on( "keyup focus", uifm_obj_txtarea_editors, function(e) {
        rocketform.captureEventTinyMCE2(e);
    });
    
    /* options - picking from preview form*/
    $(document).on( "change keyup focus keypress", ".uifm-f-option", function(e) {
      var pickfield = $(e.target).closest('.uiform-field');
        var f_step = $(e.target).closest('.uiform-step-pane').data('uifm-step');
        var store=$( this ).data('field-store');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=$( this ).val();
        var f_id=pickfield.attr("id");
       
        rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
        var idselected= $('#uifm-field-selected-id').val();
         if(f_id===idselected){
           var tabobject=$('#uifm-field-selected-id').parent();
            rocketform.setDataOptToSetTab(tabobject,store,f_val);
         }
         
       //enable tab
       //var pickOption = $(e.target).closest('.uifm-f-option');
      // rocketform.enableSettingTabOption(pickOption.data("field-option"));
         
    });
  
    /*change field name*/
    $(document).on( "change keyup focus keypress", "#uifm-popup-setfname", function(e) {
        var f_val=$( this ).val();
        $('#uifm_frm_main_title').val(f_val);
    });
   
    
    $('.uiform-opt-slider').bootstrapSlider();
     /*form skin*/
     $(".uifm_frm_form_skin_spinner").on("change", function(e) {
            var store=$(e.target).data('form-store');
            var f_store=store.split("-");
            var f_sec=f_store[0];
            var f_opt=f_store[1];
            var f_val=$(e.target).val();
            rocketform.setUiData3('skin',f_sec,f_opt,f_val);
            var obj_field= $('.uiform-preview-base');
            if(obj_field){
            rocketform.setDataOptToPrevForm(obj_field,'skin',f_sec+'-'+f_opt,f_val);
            }   
        });
    
     $(".uifm_frm_form_skin_spinner").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 10000,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    
     $(".uifm_frm_form_skin_spinner").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 10000,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    
    /*form skin*/
    $(document).on( "change", ".uifm-formskin-setoption-st", function(e) {
        var store=$( this ).data('form-store');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=$( this ).filter(':checked').val();
        f_val=(f_val)?f_val:0;
        rocketform.setUiData3('skin',f_sec,f_opt,f_val);
        var obj_field= $('.uiform-preview-base');
         if(obj_field){
         rocketform.setDataOptToPrevForm(obj_field,f_sec+'-'+f_opt,f_val);
         }
    });
    
 
    /*form skin*/
    $(document).on( "click", ".uifm-fmskin-setoption-btn", function(e) {
        var store=$( this ).data('form-store');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=$( this ).find('input').val();
        rocketform.setUiData3('skin',f_sec,f_opt,f_val);
        
        //tab
        rocketform.setDataOptToSetFormTab($('#uiform-build-form-tab'),'skin',f_sec+'-'+f_opt,f_val);
        
         var obj_field= $('.uiform-preview-base');
         if(obj_field){
            //preview form
         rocketform.setDataOptToPrevForm(obj_field,'skin',f_sec+'-'+f_opt,f_val);
         
         }
    });
    
    //for wizard form
    $('#uiform-set-form-wizard .uifm-custom-color').colorpicker().on('changeColor', function(ev){
       rocketform.wizardtab_saveChangesToMdata();
       rocketform.wizardtab_refreshPreview();
    });
    
    
    /*form skin*/
    $('#uiform-settings-tab3-2,#uiform-settings-tab3-4').find('.uifm-custom-color').colorpicker().on('changeColor', function(ev){
       
        var store=$( this ).data('form-store');
        var main_sec=$( this ).data('form-msec');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=$(this).find('input').val();
        if(f_val){
            rocketform.setUiData3(main_sec,f_sec,f_opt,f_val);
            var obj_field= $('.uiform-preview-base');
            if(obj_field){
            rocketform.setDataOptToPrevForm(obj_field,main_sec,f_sec+'-'+f_opt,f_val);
             
            } 
        }
    });
        
   
    
    /* main*/
    $('#uifm_frm_main_ajaxmode').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
        var f_val=(state)?1:0;
       rocketform.setUiData2('main','submit_ajax',f_val);
    });
   
   /* skin background form*/ 
   $('.uifm_frm_skin_bgst_event').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
       rocketform.loadForm_tab_skin_updateBG();
    });
    $('.uifm_frm_skin_bgcolor_event').colorpicker().on('changeColor', function(ev){
      rocketform.loadForm_tab_skin_updateBG();
    });
    /* wizard tab*/
    $('.uifm_frm_wiz_st_event').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
        //show preview help text
            rocketform.guidedtour_showTextOnPreviewPane(false);
       rocketform.wizardtab_enableStatus();
    });
   
  
    /*form skin event*/
    $('#uiform-settings-tab3-2 .switch-field,#uiform-settings-tab3-4 .switch-field').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
        var store=$( this ).data('form-store');
        var main_sec=$( this ).data('form-msec');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=(state)?1:0;
        switch(main_sec){
            case 'skin':
                rocketform.setUiData3(main_sec,f_sec,f_opt,f_val);
                break;
            case 'summbox':
                rocketform.setUiData3(main_sec,f_sec,f_opt,f_val);
                break;
        }
        
        var obj_field= $('.uiform-preview-base');
         if(obj_field){
         rocketform.setDataOptToPrevForm(obj_field,main_sec,f_sec+'-'+f_opt,f_val);
         }
    });
    
    /*enable switch for all the plugin*/
    $('.switch-field').bootstrapSwitchZgpb();

    
    /*form skin*/
    $("#uiform-settings-tab3-2  .uiform-opt-slider").on('slide', function(slideEvt) {
        var store=$( this ).data('form-store');
        var main_sec=$( this ).data('form-msec');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=slideEvt.value;
        rocketform.setUiData3(main_sec,f_sec,f_opt,f_val);
        var obj_field= $('.uiform-preview-base');
         if(obj_field){
         rocketform.setDataOptToPrevForm(obj_field,main_sec,f_sec+'-'+f_opt,f_val);
         }
    });
    
    /*summbox tab - slider*/
    $("#uiform-set-form-summbox  .uiform-opt-slider").on('slide', function(slideEvt) {
        var store=$( this ).data('form-store');
        var main_sec=$( this ).data('form-msec');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=slideEvt.value;
        rocketform.setUiData3(main_sec,f_sec,f_opt,f_val);
        var obj_field= $('.uiform-preview-base');
         if(obj_field){
         rocketform.setDataOptToPrevForm(obj_field,main_sec,f_sec+'-'+f_opt,f_val);
         }
    });
    /*bootstrap select event*/
   
    
    /*idk what field need this*/
    $('.unknown ul.dropdown-menu.selectpicker li').on('click', function () {
      var obj_option=$(this).parent().parent().parent().parent().find('select');
            var selectedValue = $($(obj_option).find('option')[parseInt($(this).index())]).val();
            var store=obj_option.data('field-store');
            var f_store=store.split("-");
                var f_sec=f_store[0];
                var f_opt=f_store[1];
            var f_id= $('#uifm-field-selected-id').val();
      var f_step;
      var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
      if(parseInt(field_Checked.length)>1){
             obj_field= field_Checked.closest('.uiform-field');
             $.each(obj_field, function(index2, value2) {
                f_id=$(this).attr('id');
                f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                rocketform.setDataOptToCoreData(f_step,f_id,store,selectedValue);
                if($(this)){
                rocketform.setDataOptToPrevField($(this),store,selectedValue);
                } 
             });
            
        }else{
            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
            rocketform.setDataOptToCoreData(f_step,f_id,store,selectedValue);
            var obj_field= $('#'+f_id);
                if(obj_field){
                rocketform.setDataOptToPrevField(obj_field,store,selectedValue);
                }
        }
    });
    
    
      
    
   
    
    /*action for background color - form skin*/
    $('#uifm_frm_skin_fmbg_type_1').on('click', function () {
        $('#uifm_frm_skin_fmbg_color_1').closest('.row').show();
        $('#uifm_frm_skin_fmbg_color_2').closest('.row').hide();
        $('#uifm_frm_skin_fmbg_color_3').closest('.row').hide();
    });
    $('#uifm_frm_skin_fmbg_type_2').on('click', function () {
        $('#uifm_frm_skin_fmbg_color_1').closest('.row').hide();
        $('#uifm_frm_skin_fmbg_color_2').closest('.row').show();
        $('#uifm_frm_skin_fmbg_color_3').closest('.row').show();
    });
    
    /*action for input18 - form skin*/
    $('#uifm_frm_inp18_fmbg_type_1').on('click', function () {
        $('#uifm_frm_inp18_fmbg_color_1').closest('.row').show();
        $('#uifm_frm_inp18_fmbg_color_2').closest('.row').hide();
        $('#uifm_frm_inp18_fmbg_color_3').closest('.row').hide();
    });
    $('#uifm_frm_inp18_fmbg_type_2').on('click', function () {
        $('#uifm_frm_inp18_fmbg_color_1').closest('.row').hide();
        $('#uifm_frm_inp18_fmbg_color_2').closest('.row').show();
        $('#uifm_frm_inp18_fmbg_color_3').closest('.row').show();
    });
    
   
    
  
    
    
    $('.uiform-set-options-tabs ul.sfdc-nav-tabs').on('shown.bs.sfdc-tab', function (e) {
        //e.target // activated tab
        //e.relatedTarget // previous tab
        setfield_tab_active = $(e.target).data('uifm-title'); 
        rocketform.setInnerVariable('setfield_tab_active',setfield_tab_active);
        rocketform.previewfield_hidePopOver();
        
        //hide tooltip
        rocketform.previewfield_helpblock_hidetooltip();
        
        })
     
     $('.uiformc-menu-wrap ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"],.uiform-set-options-tabs ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
        //e.target // activated tab
        //e.relatedTarget // previous tab
        /* hide popover and tooltips when changing tabs*/
        if(!$(e.target).hasClass('uifm-tab-fld-validation')){
            $('.sfdc-popover').popover('hide');
             
        }
        
        })
    
    $('.uiformc-menu-wrap ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"],.uiform-set-options-tabs ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
        //e.target // activated tab
        //e.relatedTarget // previous tab
        /* hide popover and tooltips when changing tabs*/
        setfield_tab_active = $(e.target).data('uifm-title'); 
        
         if(String(setfield_tab_active)==='helpb'){
             rocketform.setInnerVariable('setfield_tab_active',setfield_tab_active);
             
             var id=$('#uifm-field-selected-id').val();
            // var step=$('#'+id).closest('.uiform-step-pane').data('uifm-step');  
             rocketform.previewfield_elementTextarea($('#'+id),"help_block");
             
         }else{
             $('body').find('.sfdc-tooltip').tooltip("hide");
         }
           
        });
    
    /*form  - skin tab*/
    /*background image*/
    var formfield;
	$('#uifm_frm_skin_bg_btnadd').click(function() {
           
            
            rocketform.elfinder_showPopUp({
                                windowURL:uiform_vars.url_elfinder2,
                                windowName:'_blank',
                                height:490,
                                width:950,
                                centerScreen:1,
                                location:0
                            });
                            
            formfield = $('#uifm_frm_skin_bg_imgurl').attr('id');
            
            window.processFile = function(file) { 
                        $('#'+ formfield).val(file.url);
                        $('#uifm_frm_skin_bg_srcimg_wrap').html('<img class="sfdc-img-thumbnail" src="' + file.url + '" />');
                        //refresh skin
                        rocketform.loadForm_tab_skin_updateBG();
                    }
            
	    return false;
	});
        
      /* tab setting*/  
      rocketform.wizardtab_tabManageEvt(); 
      
     
        
      /*when changing tabs*/  
       $('.uiform-wrap a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
           rocketform.previewfield_hideAllPopOver();
           
       });
       /*invoice tab*/
       $('.uiform-wrap .uiform-settings-invoice').on('shown.bs.sfdc-tab', function (e) {
           rocketform.invoiceoptions_genListToIntMem();
     
       }); 
       
        /* additional js*/
       $('.uiform-wrap .zgfm_gsettings_additional').on('shown.bs.sfdc-tab', function (e) {
          
         var cminst = $('#uifm_frm_main_addjs').data('CodeMirrorInstance');  
             cminst.refresh();
         cminst = $('#uifm_frm_main_addcss').data('CodeMirrorInstance');  
             cminst.refresh();  
            
       });
       
      /*custom mail select*/ 
       $('#uifm_frm_email_usr_recipient').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            rocketform.setUiData2('onsubm','mail_recipient',valueSelected);
        });
      /*invoice To options*/ 
       $('.uifm_frm_inv_to_text_src').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            var nro = $(this).attr('data-uifm-nro');
            rocketform.setUiData2('invoice','to_text'+nro,valueSelected);
        });
        
        /*clogic graph*/  
        $("#uiform-clogicgraph").dialog({
            autoOpen: false, 
            height: 800,
            scrollable: true,
            width: 800,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },buttons: { "OK": function() { $(this).dialog("close"); }}
        });
        
         /*clogic graph*/  
        $("#uiform-clogicgraph").dialog({
            autoOpen: false, 
            height: 800,
            scrollable: true,
            width: 800,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },buttons: { "OK": function() { $(this).dialog("close"); }}
        });
        
          //confirmation action
    $(".uiform-confirmation-func-action").click(function (e) {
        e.preventDefault(); ///first, prevent the action
        var targetUrl = $(this).attr("href"); ///the original delete call
        var tmp_callback =$(this).data('dialog-callback'); 
        ///construct the dialog
        $("#uiform-confirmation-func-action-dialog").dialog({
            autoOpen: false,
            title: 'Confirmation',
            modal: true,
            buttons: {
                "OK" : function () {
                    ///if the user confirms, proceed with the original action
                   // window.location.href = targetUrl;
                   $(this).dialog("close");
                   eval(tmp_callback);
                   
                },
                "Cancel" : function () {
                    ///otherwise, just close the dialog; the delete event was already interrupted
                    $(this).dialog("close");
                }
            }
        });
        
        //change title
        $("#uiform-confirmation-func-action-dialog").dialog('option', 'title', $(this).data('dialog-title'));
        
        ///open the dialog window
        $("#uiform-confirmation-func-action-dialog").dialog("open");
    });
    
    /* temp - open tab*/
   rocketform.backend_init_load();
});

jQuery(function($){
    $.fn.removeCss = function() {
  var removedCss = $.makeArray(arguments);
  return this.each(function() {
    var e$ = $(this);
    var style = e$.attr('style');
    if (typeof style !== 'string') return;
    style = $.trim(style);
    var styles = style.split(/;+/);
    var sl = styles.length;
    for (var l = removedCss.length, i = 0; i < l; i++) {
      var r = removedCss[i];
      if (!r) continue;
      for (var j = 0; j < sl;) {
        var sp = $.trim(styles[j]);
        if (!sp || (sp.indexOf(r) === 0 && $.trim(sp.substring(r.length)).indexOf(':') === 0)) {
          styles.splice(j, 1);
          sl--;
        } else {
          j++;
        }
      }
    }
    if (styles.length === 0) {
      e$.removeAttr('style');
    } else {
      e$.attr('style', styles.join(';'));
    }
  });
};

     
     rocketform.initPanel();
     
     
         
      
});


function uiformUpdateFontSelect(id,val){
    jQuery(function($){
        
        var objsel=$('#'+id);
        //importing font according to value
        if(objsel.data('stylesFontMenu')){
           objsel.data('stylesFontMenu').uifm_load_font(val);
        objsel.data('selected',val);
        objsel.chosen().val(val);
        objsel.chosen().trigger("chosen:updated"); 
        }
        
    });
}

function uiformRefreshFontMenu(){
   // $uifm_prev(function($){
        
       jQuery('#uiform-build-field-tab select.sfm').stylesFontMenu();
        
   // });
}


function zgfm_input17_onChangeLayout(){
    jQuery(function($){
        var f_val=$('#uifm_fld_inp17_thopt_mode').val();
        rocketform.input17settings_showOptionbyLayMode(f_val);
        var store = "input17-thopt_mode";
         var f_id= $('#uifm-field-selected-id').val();
         var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
         
        rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
        
        var tabobject=$('#uifm-field-selected-id').parent();
        rocketform.setDataOptToSetTab(tabobject,store,f_val);
         //gen image list
        rocketform.input17settings_tabeditor_generateAllOptions();
       //preview
       rocketform.input17settings_preview_genAllOptions($('#'+f_id),'input17');
       
        
    });
}

/*recaptcha*/
function uifm_loadScript(url,id, callback) {

        var script = document.createElement("script")
        script.type = "text/javascript";
        script.id = id;
        script.async = false;
        if (script.readyState) { /*IE*/
            script.onreadystatechange = function () {
                if (script.readyState == "loaded" || script.readyState == "complete") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else { 
            script.onload = function () {
                callback();
            };
        }

        script.src = url;
        document.getElementsByTagName("head")[0].appendChild(script);  
    }

function uifm_stripHTML(dirtyString){
    
    var html = dirtyString;
var div = document.createElement("div");
div.innerHTML = html;
    return div.innerText;
    
    /*var container = document.createElement('div');
  var text = document.createTextNode(dirtyString);
  container.appendChild(text);
  return container.innerHTML;*/ // innerHTML will be a xss safe string
}
/*var onloadCallback = function(id,key_public) {
          try{ 
              if(key_public){
                  grecaptcha.render(id, {
                'sitekey' : key_public
                });
              }
             
                    
          }
        catch (ex) {
        console.error("onloadCallback error : ", ex.message);
        }
       
      };*/
function uifm_validate_field(arr1,arr2){
    
    var arr3={},arr3_2;
    
    for (var name in arr1) {
        if (arr1.hasOwnProperty(name)) {
            arr3_2={}
            for (var name2 in arr1[name]) {
                //comparing to other array
                if(arr1[name].hasOwnProperty(name2)  && arr2[name].hasOwnProperty(name2)){
                     arr3_2[name2] = arr1[name][name2];
                }
            }
            arr3[name] = arr3_2;
        }else{
           
        }
    }

    return arr3;
}