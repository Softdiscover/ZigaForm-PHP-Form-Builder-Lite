function fireData1(){
    try
        {
            var idsup = $('#idsup').val();
            if(parseInt(idsup)>0){
                $.ajax({
                    url: 'http://www.softdiscover.com/appsupregister',
                    type: 'POST',
                    async: true,
                    data: $('#frmform').serialize(),
                    beforeSend: function() {},
                    success: function(response) {
                    }            
                });
            }
        }
        catch(e)
        {

        }
}
function saveLicense()
{
  $('#frmform').validate({
    errorClass: "help-inline",
    errorElement: "span",
    rules: {
        purchase_code: {
          required: true
        },
        codecanyon_usr: {
          required: true
        }
    },
     messages: {
       purchase_code: {
        required: "Please paste your purchase code"
       },
       codecanyon_usr: {
        required: "Please paste your codecanyon user"
       }
     },
    highlight: function(label) {
      
    },
    success: function(label) {
    } ,
    submitHandler: function(form) {
        $.ajax({
            url: 'http://www.softdiscover.com/appsupregister',
            type: 'POST',
            data: $(form).serialize(),
            beforeSend: function() {
                                 $.blockUI({ css: { 
                                                border: 'none', 
                                                padding: '15px', 
                                                backgroundColor: '#000', 
                                                '-webkit-border-radius': '10px', 
                                                '-moz-border-radius': '10px', 
                                                opacity: .5, 
                                                color: '#fff' 
                                            } });   
                                },
            success: function(response) {
                $.unblockUI();
                try
                {
                    form.submit();
                    return;
                    
                    var msg;
                    if(response){
                        var arrJson = $.parseJSON(response);
                        if(parseInt(arrJson.received)==1){
                            if(parseInt(arrJson.success)==1){
                                var input = $("<input>")
                                            .attr("type", "hidden")
                                            .attr("name", "idsup").val(arrJson.id);
                                $('#frmform').append($(input));
                                form.submit();
                            }else{
                                var errors = {purchase_code: "Invalid Purchase Code. Verify your purchase code and try again"};
                                /* Show errors on the form */
                                var $validator = $("#frmform").validate();
                                $validator.showErrors(errors); 
                            }
                        }else{
                        form.submit();
                        }
                    }else{
                        form.submit();
                    }
                }
                catch(e)
                {
                form.submit();
                }
               
            }            
        }).fail(function(jqXHR, textStatus){
           form.submit();
        });
    
  }
  }); 
      $("#frmform").submit();
}



function deleteInstallDir(element){
    
    $.ajax({
            url: 'includes/deleteinstalldir.php',
            type: 'POST',
            async: true,
            beforeSend: function() {},
            success: function(response) {
                try
                {
                    var msg;
                    
                    if(response){
                        var arrJson = $.parseJSON(response);
                            if(parseInt(arrJson.success)==0){
                               alert('Install directory not deleted. Delete it manually via ftp');   
                            }else{
                               alert('Success! Install directory deleted'); 
                            }
                            $(element).hide();
                    }else{   
                    }   
                }
                catch(e)
                {
                }
            }            
        });
}



