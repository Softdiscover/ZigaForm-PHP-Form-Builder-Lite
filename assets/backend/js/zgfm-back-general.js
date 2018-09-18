if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_general = zgfm_back_general || null;
if(!$uifm.isFunction(zgfm_back_general)){
(function($, window) {
 "use strict";  
    
var zgfm_back_general = function(){
    var zgfm_variable = [];
    zgfm_variable.innerVars = {};
    zgfm_variable.externalVars = {};
    
    this.initialize = function() {
        
    }
    
    this.formslist_search_refresh = function(){
      this.formslist_search_process(0);
    };
    
    this.formslist_search_refresh_save = function(){
      this.formslist_search_process(1);
      
      alert('Filter paramaters saved');
    }
    
    this.formslist_search_process = function(opt_save){
         var tmp_params = $('#zgfm-listform-filter-panel-form').serialize();
      
      $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+'formbuilder/forms/ajax_formlist_sendfilter',
                    data: {
                       'action': 'zgfm_fbuilder_formlist_filter',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'data_filter':tmp_params,
                       'opt_save':opt_save,
                       'opt_offset':$('#uifm_listform_offset_val').val(),
                       'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                       $('#zgfm-back-listform-maintable-container').html(msg['content']);
                       
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
                    }
                });
    }
    
    
};
window.zgfm_back_general = zgfm_back_general = $.zgfm_back_general = new zgfm_back_general();


})($uifm,window);
} 