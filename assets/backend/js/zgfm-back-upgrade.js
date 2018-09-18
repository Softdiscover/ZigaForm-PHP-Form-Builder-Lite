if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_upgrade = zgfm_back_upgrade || null;
if(!$uifm.isFunction(zgfm_back_upgrade)){
(function($, window) {
 "use strict";  
    
var zgfm_back_upgrade = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {

        let cur_core_arr=rocketform.getUiData('app_ver');
        //if version prev to 3.4.1
        
        //only calculators
        switch(zgfm_back_helper.versionCompare(String(cur_core_arr),"3.4.1")){
            case 1:
                break;
            case -1:
            case 0:
                    this.upgrade_prev_3_4_1();
                break;
        }
        
    }
    
   this.upgrade_prev_3_4_1 = function(){
       
      
   }
    
};
window.zgfm_back_upgrade = zgfm_back_upgrade = $.zgfm_back_upgrade = new zgfm_back_upgrade();


})($uifm,window);
} 