if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_evts = zgfm_front_evts || null;
if(!$uifm.isFunction(zgfm_front_evts)){
(function($, window) {
 "use strict";  
    
var zgfm_front_evts = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
 
        //field 41 & 42
        this.refresh_fieldDynBoxes();
    }
   
    this.refresh_fieldDynBoxes= function() {
        var obj = $('.rockfm-dyncheckbox');
        
       /* $.each( obj, function( key, value ) {
          let tmp_wrap = $(this).find('.rockfm-input17-wrap');
          let tmp_wrap_w = tmp_wrap.width();
          
          let tmp_wrap_canvas = $(this).find('.rockfm-input17-wrap canvas');
          
          
        });*/
    }
   
};
window.zgfm_front_evts = zgfm_front_evts = $.zgfm_front_evts = new zgfm_front_evts();


})($uifm,window);
} 