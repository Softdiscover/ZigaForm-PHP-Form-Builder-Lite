;if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}

var uifmsetting;
(function($, window) {
window.uifmsetting = uifmsetting=$.uifmsetting || function(){
    
    function initialize() {
        
    }
    
    arguments.callee.redirect = function (redirect) {
        if(window.event ) {/*IE 6*/
        window.event.returnValue = false;
        window.location =redirect;
        //return false;
    }else {/*firefox*/
        location.href =redirect;
    }
    };
    
    arguments.callee.settings_saveFormSettings = function () {
             // validation
            $('#frmform').validate({
                errorClass: "help-inline",
                errorElement: "span",
                rules: {
                    site_title: {
                    required: true
                    },
                    admin_mail:{
                    required:true, email: true  
                    }
                },
                messages: {
                site_title: {
                    required: "Please specify site title"
                },
                admin_mail: {
                    required: "We need email address"
                }
                },
                highlight: function(label) {
                $(label).closest('.control-group').addClass('error').removeClass('success');
                },
                success: function(label) {

                $(label).text('').closest('.control-group').addClass('success');

                } ,
                submitHandler: function(form) {

                form.submit(); //submit it the form

            }
            }); 
            $("#frmform").submit();
         
    };
   
   
   arguments.callee.user_SaveUser = function () {
              // validation
  $('#frmform').validate({
    errorClass: "help-inline",
    errorElement: "span",
    rules: {
        use_login: {
          required: true
        },
        use_password: { 
                required: true, minlength: 5
          }, 
          use_password2: { 
                required: true, equalTo: "#use_password", minlength: 5
          }
    },
     messages: {
       nameform: {
        required: "Please specify your username"
       },
       descriptionform: {
         required: "We need your email address"
       }
     },
    highlight: function(label) {
      $(label).closest('.control-group').addClass('error').removeClass('success');
    },
    success: function(label) {
         
      $(label).text('').closest('.control-group').addClass('success');
     
    } ,
    submitHandler: function(form) {
  
    form.submit(); //submit it the form
    
  }
  }); 
  
      $("#frmform").submit();
   }
   
   
   arguments.callee.user_CancelUser = function () {
        this.redirect(uiform_vars.url_admin+'user/intranet/index')
   }
   
             
};
uifmsetting();
})($uifm,window);



