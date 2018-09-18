if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_addon = zgfm_back_addon || null;
if(!$uifm.isFunction(zgfm_back_addon)){
(function($, window) {
 "use strict";  
    
var zgfm_fn_addon = function(){
     var variable = [];
    variable.innerVars = {};
    variable.externalVars = {};
    
    
    
    this.initialize = function() {
              
             
            };
    
    this.load_addon = function(addon_name, addon_data) {
        
              switch(String(addon_name)) {
                        case 'func_anim':
                           zgfm_back_addon_anim.load_settings(addon_data);
                            break;
                        default:
                            
                    }  
               
    };
    
    
    this.get_currentDataFromBack =function(){
        var tmp_data={};
        
        let tmp_addon_arr = uiform_vars.addon;
        
       
        for (var property1 in tmp_addon_arr) {
            
            
            tmp_data['addon_'+property1]=window[tmp_addon_arr[property1]['func_name']].get_currentDataToSave();
            
            //creating obj
          //  tmp_data[property1]={};
            
           /* switch(String(property1)){
                case 'func_anim':
                    
                break;
            }*/
             
            
          }
          
        return tmp_data;
    }
        
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
window.zgfm_back_addon = zgfm_back_addon = $.zgfm_back_addon = new zgfm_fn_addon();

})($uifm,window);
} 