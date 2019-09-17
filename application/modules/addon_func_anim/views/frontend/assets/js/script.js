;if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_addon_anim_front = zgfm_addon_anim_front || null;
if(!$uifm.isFunction(zgfm_addon_anim_front)){
(function($, window) {
 "use strict";  
    
var zgfm_addon_animFront = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        this.load_events();
    };
    
    this.load_events = function(){
        
         var tmp_obj_anim = $(".zgfm_addon_anim_prevtostart:not(.zgfm_addon_anim_start)");
       
       tmp_obj_anim.each(function (i) {
           var tmp_obj_sel=$(this);
             //run animation
                void 0 !== $.fn.waypoint && tmp_obj_sel.waypoint(function() {
                  tmp_obj_sel.addClass("zgfm_addon_anim_start animated");
              }, {
                  offset: "85%"
              })
            
        });
    };
   
   
   
};
window.zgfm_addon_anim_front = zgfm_addon_anim_front = $.zgfm_addon_anim_front = new zgfm_addon_animFront();


})($uifm,window);
} 