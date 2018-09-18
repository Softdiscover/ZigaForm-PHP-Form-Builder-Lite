if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_err = zgfm_back_err || null;
if(!$uifm.isFunction(zgfm_back_err)){
(function($, window) {
 "use strict";  
    
var zgfm_back_err = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    }
    
      this.integrity_check = function() {
        
        if(this.error_is_found()){
            //show modal
             this.error_openModal();
            
        }else{
            
        }
        
        
    }
    
    
    /**
     * Check for errors
     */
    
    this.error_is_found = function() {
        var result;
        result=false;
        
        //check from array to html
        
        var result_err=[];
        
        var tmp_arr= rocketform.getUiData('steps_src');
        var tmp_fld_exist;
        for(var i in tmp_arr){
            
            for(var i2 in tmp_arr[i]){
                 
                tmp_fld_exist= $('#zgpb-editor-container').find('#'+tmp_arr[i][i2]['id']).length;
                if(tmp_fld_exist==0){
                    result_err.push(tmp_arr[i][i2]['id']);
                }
            }
            
        }
         
        if(result_err.length){
           result=true; 
        }
        
        //checking from html to array
        result_err=[];
        var tmp_arr2= $('#zgpb-editor-container').find('.uiform-main-form .uiform-items-container .zgpb-field-template');
        $.each(tmp_arr2, function(index, element) {
              
             if(zgfm_back_err.check_IdIsInArray(tmp_arr,$(element).attr('id'))){
                 
             }else{
                 result_err.push($(element).attr('id'));
             }
             
             
            });
            
        if(result_err.length){
           result=true; 
        }
          
        //free memory
        tmp_arr=null;
        
        return result;
    }
    
    /**
     * error_openModal
     */
    
    this.check_IdIsInArray = function(tmp_arr,id) {
        var result=false;
        
        for(var i in tmp_arr){
            
            for(var i2 in tmp_arr[i]){
                 
                 if(String(tmp_arr[i][i2]['id'])===String(id)){
                     result=true;
                     break;
                 }else{
                     
                 }
            }
            
        }
        
        
        return result;
    }
    
    /**
     * error_openModal
     */
    
    this.error_openModal = function() {
        try {
            
            rocketform.fields_showModalOptions();
            
            $.ajax({
                                type: 'POST',
                                url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_integrity_openmodal",
                                data: {
                                    'action': 'rocket_fbuilder_integrity_openmodal',
                                    'page':'zgfm_form_builder',
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'csrf_field_name':uiform_vars.csrf_field_name
                                    },
                                success: function(msg) {
                                    $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html(msg.modal_body);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                                }
                            }); 
       
        }/* end try*/
            catch (ex) {
            console.error("zgfm_back_err error_openModal ", ex.message);
        }
    }
    
};
window.zgfm_back_err = zgfm_back_err = $.zgfm_back_err = new zgfm_back_err();


})($uifm,window);
} 