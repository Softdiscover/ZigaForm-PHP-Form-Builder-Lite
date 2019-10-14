if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_addon_anim = zgfm_back_addon_anim || null;
if(!$uifm.isFunction(zgfm_back_addon_anim)){
(function($, window) {
 "use strict";  
    
var zgfm_fn_addon_anim = function(){
     var variable = [];
    variable.innerVars = {};
    variable.externalVars = {};
    
    var defaults = {
        data:{
            steps_src:{}
        }
    };
    
    var settings = $.extend(true,{}, defaults);
    
    this.initialize = function() {
              
             
    };
   
   
   this.dump_data = function(){
      
       console.log(this.dumpvar3(settings));
   };
   
   this.load_settings = function(options){
                     
                     var tmp_merge_opts=true;
                      try {
                            if (options.hasOwnProperty('steps_src')) {
                               tmp_merge_opts=true;
                            }else{
                                tmp_merge_opts=false;
                            }
                        }
                        catch(err) {
                            tmp_merge_opts=false;
                        }
                        
                      if(tmp_merge_opts){
                        settings = $.extend(true,{}, defaults, {data:options});
                      }else{
                        settings = $.extend(true,{}, defaults);  
                      }
       
                       
    };
    
    this.get_currentDataToSave = function(){
        var tmp_data={};
        tmp_data['data'] = settings['data'];
        tmp_data['opt1'] = '';
        tmp_data['controller'] = 'animation';
        //tmp_data['controller'] = 'zgfm_addon_back_func_anim';
        return tmp_data;
    }
    
    
    this.load_fieldsettings = function(step_pane,field_id){
        //check data
        var tmp_id_exist = false;
        var tmp_step_exist = false;
         try {
               if (settings['data']['steps_src'].hasOwnProperty(step_pane)) {
                               tmp_step_exist=true;
                            }else{
                               tmp_step_exist=false;
                            }           
            }
            catch(err) {
                tmp_step_exist=false;    
            }
        
        if(tmp_step_exist){
            
        }else{
            settings['data']['steps_src'][step_pane]={}
        }
        
        
        
        try {
               if (settings['data']['steps_src'][step_pane].hasOwnProperty(field_id)) {
                               tmp_id_exist=true;
                            }else{
                               tmp_id_exist=false;
                            }           
            }
            catch(err) {
                tmp_id_exist=false;    
            }
        
        if(tmp_id_exist){
            //id exists
            
        }else{
            //id no exists
            
            settings['data']['steps_src'][step_pane][field_id]={};
            settings['data']['steps_src'][step_pane][field_id]['type']='none';
            settings['data']['steps_src'][step_pane][field_id]['delay']='0';
        }
        
        this.show_options(step_pane,field_id);
        this.load_events();
    };
    
    
    this.preview_showAnimation = function(){
        
    };
    
    this.load_events = function(){
        
        $('#zgfm_fld_addn_anim_select').on('changed.bs.select', function (e) {
            if(e) { e.stopPropagation(); e.preventDefault();}
            var obj_option=$(this);
            var store=obj_option.data('addn-field');
            var selectedValue = obj_option.selectpicker('val');
            zgfm_back_addon_anim.update_settings(store,selectedValue);
            
            //run preview
            zgfm_back_addon_anim.run_animation();
            
          });
          
        /*animate button*/
        
        $('#zgfm-back-addon-anim-opt-animate').click(
                function(e){
                    if(e) { e.stopPropagation(); e.preventDefault();}
                    
                    zgfm_back_addon_anim.run_animation();
                
                }
                );
        
        //load spinner
        $(".zgpb_back_anim_spinner").TouchSpin({
                verticalbuttons: true,
                min: 0,
                max: 1500,
                initval:'0',
                decimals: 1,
                stepinterval: 0.1,
                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
            }); 
                                               
       
       $(".zgpb_back_anim_spinner").on("change", function(e) {
          
           if(e) { e.stopPropagation(); e.preventDefault();}
           
            var f_store=$(e.target).data('addn-field');
            var f_val=$(e.target).val();
            
            zgfm_back_addon_anim.update_settings(f_store,f_val);
        }); 
    };
    
    
    this.run_animation =function(){
          function addon_go_animation(elem,x){
                        $(elem).removeClass().addClass(x + " animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
                            $(this).removeClass();
                        });
                        
                        let tmp_id=$('#uifm-field-selected-id').val();
                        $('#'+tmp_id).removeClass(x + " animated").addClass(x + " animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
                            $(this).removeClass(x + " animated");
                        });
                    }
                    
                    var tmp_anim = $("#zgfm_fld_addn_anim_select").selectpicker('val');
                    "none" !== tmp_anim && addon_go_animation($('#zgfm-back-addon-anim-opt-preview'), tmp_anim);  
    };
    
    this.update_settings = function(f_store,value){
       var opt1,opt2,tmp_store; 
       var f_id= $('#uifm-field-selected-id').val();
       var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
       
       tmp_store=f_store.split("-");
                 opt1=tmp_store[0];
                 opt2=tmp_store[1];
                 
        switch(String(opt1)) {
            case 'type':
            case 'delay':    
                zgfm_back_helper.setData4(settings.data,'steps_src',f_step,f_id,opt1,value);
            break;   
        }
    };
    
    
    
    this.show_options =function(step_pane,field_id){
      
     //load settings on tab
     
     //type
      let tmp_type=settings['data']['steps_src'][step_pane][field_id]['type'];
       $('#zgfm_fld_addn_anim_select').selectpicker('val',tmp_type);
       
     //delay  
      let tmp_delay=settings['data']['steps_src'][step_pane][field_id]['delay'];
       $('#zgfm-back-addon-anim-opt-delay').val(parseFloat(tmp_delay));
    };                 
        
    this.setExternalVars = function() {
          
            };
    this.getExternalVars = function(name) {
                if (variable.externalVars[name]) {
                    return variable.externalVars[name];
                } else {
                    return '';
                }
            };         
    this.setInnerVariable = function(name, value) {
                variable.innerVars[name] = value;
            };
             
    this.getInnerVariable = function(name) {
                if (variable.innerVars[name]) {
                    return variable.innerVars[name];
                } else {
                    return '';
                }
            };
       
    this.dumpvar3 = function (object) {
        return JSON.stringify(object, null, 2);
    };
    this.dumpvar2 = function (object) {
        return JSON.stringify(object);
    };
     
    this.dumpvar = function (object) {
       var seen = []
       var json =JSON.stringify(object, function(key, val) {
        if (val != null && typeof val == "object") {
                if (seen.indexOf(val) >= 0)
                    return
                seen.push(val)
            }
            return val
        });
        return seen;
    };
    
    this.redirect_tourl = function (redirect) {
              if(window.event ) {/*IE 6*/
                    window.event.returnValue = false;
                    window.location =redirect;
                    //return false;
                }else {/*firefox*/
                    location.href =redirect;
                }
             };
             
  
    
};
window.zgfm_back_addon_anim = zgfm_back_addon_anim = $.zgfm_back_addon_anim = new zgfm_fn_addon_anim();

})($uifm,window);
} 