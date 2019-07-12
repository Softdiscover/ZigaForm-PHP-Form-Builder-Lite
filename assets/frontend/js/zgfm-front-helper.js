if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_helper = zgfm_front_helper || null;
if(!$uifm.isFunction(zgfm_front_helper)){
(function($, window) {
 "use strict";  
    
var zgfm_front_helper = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    }
    
    var runExtraTasks = function(field){
                
                var obj_form= $(field).closest('.rockfm-form');
                
            };    
    
    this.event_isDefined_toEl = function(el,search_evt,list_events){
        var flag=false;
        try{
            $.each(list_events, function(i, event){
                if(String(i)==='zgfm'){
                    $.each(event, function(i2, handler){
                    if($.isPlainObject(handler)){
                        $.each(handler, function(i3, handler3){
                            if(String(i3)==='namespace'){
                               if($.isPlainObject(handler3)){

                                    $.each(handler3, function(i4, handler4){
                                        //console.log( handler4 );
                                    });

                                }else{
                                    
                                    if(String(handler3)===String(search_evt)){
                                        throw true;
                                    }


                                } 
                            }

                        });

                    }else{
                         
                    }

                });
                }
            });
        }
        catch (e)
        {
            flag=e;
        }
        
        return flag;
         
    };
    
    this.load_cssfiles = function(id) {
        
         var uifm_loadcssfile = function(cssFilesArr){
               for(var i in cssFilesArr) { 
                    if (!document.getElementById(cssFilesArr[i].id))
                    {
                        var fileref=document.createElement("link");
                    fileref.setAttribute("rel", "stylesheet");
                    fileref.setAttribute("type", "text/css");
                    fileref.setAttribute("id", cssFilesArr[i].id);
                    fileref.setAttribute("media", "all");
                    fileref.setAttribute("href", cssFilesArr[i].href);
                    document.getElementsByTagName("head")[0].appendChild(fileref);
                    }
                }
                
         }
         
            //load css
        var uifm_cssFiles = [{id:"uifm_b_css_form_"+id,
                              href:rockfm_vars.url_plugin+'/assets/frontend/css/rockfm_form'+id+'.css?'+Math.round(+new Date()/1000)}];
         uifm_loadcssfile(uifm_cssFiles);
    }
    
    this.load_form_init_events = function(obj_form){
      
                        var tmp_field;
                        var tmp_field_id;
                        var tmp_field_inp;
                        var tmp_action;
                        
                        var tmp_theme_type;
         var all_fields=obj_form.find('.rockfm-field');
         
         $.each(all_fields,function(){
                                tmp_field=$(this);
                                if(tmp_field.length){
                                switch (parseInt(tmp_field.attr('data-typefield'))) {
                                    case 6:
                                    case 7:
                                    case 28:
                                    case 29:
                                    case 30:
                                        tmp_field_inp=tmp_field.find('.rockfm-txtbox-inp-val');
                                        break;
                                        case 8:
                                            /*radio button*/
                                             tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');
                                                
                                                    switch(parseInt(tmp_theme_type)){
                                                        case 1:
                                                           tmp_field_inp=tmp_field.find('.checkradios-radio');
                                                            break;
                                                        default:
                                                           tmp_field_inp=tmp_field.find('.rockfm-inp2-rdo');
                                                            break;
                                                    }
                                            break;
                                        case 9:
                                            /*checkbox*/
                                             tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');
                                                
                                                    switch(parseInt(tmp_theme_type)){
                                                        case 1:
                                                           tmp_field_inp=tmp_field.find('.checkradios-checkbox');
                                                            break;
                                                        default:
                                                           tmp_field_inp=tmp_field.find('.rockfm-inp2-chk');
                                                            break;
                                                    }
                                            break;
                                        case 10:
                                        case 11:    
                                            //select
                                            //multiselect
                                            
                                            tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                     tmp_field_inp = tmp_field.find('.rockfm-input2-sel-styl1');
                                                    break;
                                                default:
                                                     tmp_field_inp=tmp_field.find('.uifm-input2-opt-main');
                                                    break;
                                            }
                                            
                                            break;
                                        case 16:
                                            //slider
                                            tmp_field_inp=tmp_field.find('.rockfm-input4-slider');
                                            break;
                                        case 18:
                                            //spinner
                                            tmp_field_inp=tmp_field.find('.rockfm-input4-spinner');
                                            break;
                                        case 40:
                                            //switch
                                            tmp_field_inp=tmp_field.find('.rockfm-input15-switch');
                                            break;    
                                        case 41:
                                            //dyn checkbox
                                            tmp_field_inp=tmp_field.find('.uifm-dcheckbox-item');
                                            break;
                                        case 42:
                                            //dyn radiobutton
                                            tmp_field_inp=tmp_field.find('.uifm-dradiobtn-item');
                                            break;    
                                        
                                    }
                                
                               switch (parseInt(tmp_field.attr('data-typefield'))) {
                                        case 6:
                                        case 7:
                                        case 28:
                                        case 29:
                                        case 30:
                                            tmp_action="change keyup";
                                            
                                            tmp_field_inp.on(tmp_action, function(e) {
                                                           if(e) {   e.preventDefault();} 
                                                         
                                                            //resize when applygin clogic
                                                        if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                                    if ('parentIFrame' in window) {
                                                                        parentIFrame.size(); // autoresize
                                                                      } 
                                                            }
                                                            
                                                       //runExtraTask
                                                       runExtraTasks($(this));
                                                       
                                                    }); 
                                            
                                            break;
                                        case 8:
                                            /*radio button*/
                                        case 9:
                                            /*checkbox*/
                                            
                                                tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');
                                                
                                                    switch(parseInt(tmp_theme_type)){
                                                        case 1:
                                                            tmp_action="click change";
                                                            break;
                                                        default:
                                                            tmp_action="change";
                                                            break;
                                                    }
                                            
                                            
                                                   tmp_field_inp.on(tmp_action, function(e) {
                                                           if(e) {   e.preventDefault();} 
                                                          
                                                        tmp_field_id=$( this ).attr('data-idfield');
                                                       if(obj_form.find('.rockfm-clogic-fcond').length){ 
                                                       obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                        }
                                                            //resize when applygin clogic
                                                        if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                                    if ('parentIFrame' in window) {
                                                                        parentIFrame.size(); // autoresize
                                                                      } 
                                                            }
                                                            
                                                       //runExtraTask
                                                       runExtraTasks($(this));
                                                       
                                                    });     
                                                
                                            
                                            break;
                                        case 10:
                                            //select
                                        case 11:
                                            //multiselect 
                                             
                                             switch(parseInt(tmp_theme_type)){
                                                    case 1:
                                                        //style 1
                                                          tmp_field_inp.on('changed.bs.select', function (e) {
                                                                 if(e) {  e.preventDefault();}
                                                                tmp_field_id=$( this ).attr('data-idfield');

                                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                                }
                                                                 
                                                                    //resize when applygin clogic
                                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                                            if ('parentIFrame' in window) {
                                                                                parentIFrame.size(); // autoresize
                                                                              } 
                                                                    }
                                                               //runExtraTask
                                                                runExtraTasks($(this));     
                                                                    
                                                          });
                                                        break;
                                                    default:
                                                        
                                                          tmp_field_inp.on("change", function(e) {
                                                                if(e) {  e.preventDefault();}
                                                                tmp_field_id=$( this ).attr('data-idfield');
                                                                
                                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                                    }

                                                                    //resize when applygin clogic
                                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                                            if ('parentIFrame' in window) {
                                                                                parentIFrame.size(); // autoresize
                                                                              } 
                                                                    }
                                                                    
                                                                 //runExtraTask
                                                                 runExtraTasks($(this));   
                                                                    
                                                            });
                                                        
                                                        
                                                }
                                            
                                            
                                            
                                            break;
                                        case 16:
                                            //slider
                                            tmp_field_inp.on("slideStop", function(e) {
                                                if(e) {  e.preventDefault();}
                                                tmp_field_id=$( this ).attr('data-idfield');
                                                
                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                    } 
                                                 
                                                    //resize when applygin clogic
                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                            if ('parentIFrame' in window) {
                                                                parentIFrame.size(); // autoresize
                                                              } 
                                                    }
                                                    
                                                 //runExtraTask
                                                 runExtraTasks($(this));   
                                                    
                                            });
                                            break;
                                        case 18:
                                            //spinner
                                            tmp_field_inp.on("change keyup", function(e) {
                                                if(e) {  e.preventDefault();}
                                                tmp_field_id=$( this ).attr('data-idfield');
                                                
                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                    }
                                                 
                                                    //resize when applygin clogic
                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                            if ('parentIFrame' in window) {
                                                                parentIFrame.size(); // autoresize
                                                              } 
                                                    }
                                                    
                                                 //runExtraTask
                                                 runExtraTasks($(this));   
                                                    
                                            });
                                            break;
                                        case 40:
                                            // switch
                                            tmp_field_inp.on("switchChange.bootstrapSwitchZgpb", function(e) {
                                                if(e) {  e.preventDefault();}
                                                tmp_field_id=$( this ).attr('data-idfield');
                                                
                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                    }
                                                 
                                                    //resize when applygin clogic
                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                            if ('parentIFrame' in window) {
                                                                parentIFrame.size(); // autoresize
                                                              } 
                                                    }
                                                 
                                                 //runExtraTask
                                                 runExtraTasks($(this));   
                                                    
                                            });
                                            break;
                                        case 41:
                                            //dyn checkbox
                                        case 42:
                                            //dyn radiobutton
                                                tmp_field_inp.on("click", function(e) {
                                                    if(e) {  e.preventDefault();}
                                                tmp_field_id=$(this).attr('data-idfield');
                                                
                                                if(obj_form.find('.rockfm-clogic-fcond').length){
                                                 obj_form.data('zgfm_logicfrm').triggerConditional(e.target,tmp_field_id);
                                                    }
                                                
                                                    //resize when applygin clogic
                                                if(String(rocketfm.getExternalVars("fm_loadmode"))==="iframe"){
                                                            if ('parentIFrame' in window) {
                                                                parentIFrame.size(); // autoresize
                                                              } 
                                                    }
                                                    
                                                  //runExtraTask
                                                  runExtraTasks($(this));  
                                                    
                                                 });
                                                 
                                            break;    
                                        
                                    }
                               
                               
                                
                            }
                             });    
         
        
    };
    
};
window.zgfm_front_helper = zgfm_front_helper = $.zgfm_front_helper = new zgfm_front_helper();


})($uifm,window);
} 