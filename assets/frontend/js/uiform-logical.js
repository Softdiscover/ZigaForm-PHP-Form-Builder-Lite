/* @projectDescription Conditional logic for uiForm
 * @author Raimundo
 * @version 1.0
 * @website: http://www.softdiscover.com/
*/
(function($){
        
        var zgfmLogicFrm = function(element, options){
            var cur_form_obj = $(element);
            var obj = this;
           var logical_fields = [];
            var fields_cond=[];
            var fields_fire=[];
            var cur_field_fire_value;
            var cur_field_fire_id;
            
           logical_fields =  JSON && JSON.parse(options) || $.parseJSON(options);
           
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };

            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            
            var runExtraTasks = function(field){
                
            };
            
            
            this.setData = function() {
                   this.processData();

		};
            
            this.processData = function(){
                fields_cond=logical_fields.cond;
                 fields_fire=logical_fields.fire;
            };
            
            this.getValueFieldFire = function(element){
                 cur_field_fire_value= $(element).val();
            };
            
            this.getValueFieldById = function(id_field,input){
                 var getrow=cur_form_obj.find('#rockfm_'+id_field);
                            /*
                             * 
                             * value_field -> the value of current field on the form
                             * input_field -> the value of conditional
                             * 
                             */
                             var tmp_theme_type;
                            var response = {
                                    value_field:null,
                                    input_field:null
                                }; 
                            if(getrow){
                            var type=getrow.attr("data-typefield");
                            var tempvar;
                            var searchInput;
                            switch (parseInt(type)) {
                                        case 8:
                                            /*radiobtn*/
                                            
                                             tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                    tempvar=getrow.find('.rockfm-inp2-rdo');
                                            
                                                    searchInput = tempvar.map(function(index){
                                                                    if($(this).parent().hasClass('checked')){
                                                                       
                                                                           return $(this).val();
                                                                       }else{
                                                                           return null;
                                                                       }



                                                       }).toArray();
                                                   
                                                   response["value_field"]=searchInput[0];
                                                   response["input_field"]=input;
                                                   
                                                    break;
                                                default:
                                                   tempvar=getrow.find('.rockfm-inp2-rdo');
                                            
                                                   searchInput = tempvar.map(function(index){
                                                                    if($(this).is(':checked')){
                                                                           return $(this).val();
                                                                       }else{
                                                                           return null;
                                                                       }



                                                       }).toArray();
                                                   
                                                   response["value_field"]=searchInput[0];
                                                   response["input_field"]=input;
                                                    break;
                                            }
                                            
                                                    
                                             
                                            break;
                                        case 9:
                                            /*checkbox*/
                                             tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                 case 1:
                                                    tempvar=getrow.find('.rockfm-inp2-chk');
                                            
                                                    searchInput = tempvar.map(function(index){
                                                                    if($(this).parent().hasClass('checked')){
                                                                            return $(this).val();
                                                                       }else{
                                                                           return null;
                                                                       }



                                                       }).toArray();
                                                    
                                                    /*search if value is in the array*/
                                                    var tmp_found_val='';   
                                                    if($.inArray(input, searchInput) != -1) {
                                                       tmp_found_val=input;
                                                    } else {
                                                        tmp_found_val='';
                                                    }    
                                                    
                                                   response["value_field"]=tmp_found_val;
                                                   response["input_field"]=input;
                                                    break;
                                                default:
                                                       tempvar=getrow.find('.rockfm-inp2-chk');
                                                            searchInput = tempvar.map(function(index){
                                                                           if($(this).is(':checked')){
                                                                                  return $(this).val();
                                                                              }else{
                                                                                  return null;
                                                                              }



                                                              }).toArray();

                                                          response["value_field"]=searchInput;
                                                          response["input_field"]=input;
                                                    break;
                                            }
                                            
                                            
                                               
                                            
                                                    break;
                                        case 41:
                                            /*dyn checkbox*/
                                            tempvar=getrow.find('.uifm-dcheckbox-item-chkst');
                                            
                                              searchInput = tempvar.map(function(index){
                                                             if($(this).hasClass("uifm-dcheckbox-checked")){
                                                                    return index;
                                                                }else{
                                                                    return null;
                                                                }
                                                            
                                                        
                                                        
                                                }).toArray();
                                                
                                            response["value_field"]=searchInput;
                                            response["input_field"]=input;
                                            
                                            break;
                                        case 42:
                                            /*dyn radiobtn*/
                                            tempvar=getrow.find('.uifm-dcheckbox-item-chkst');
                                            
                                             searchInput = tempvar.map(function(index){
                                                             if($(this).hasClass("uifm-dcheckbox-checked")){
                                                                    return index;
                                                                }else{
                                                                    return null;
                                                                }
                                                            
                                                        
                                                        
                                                }).toArray();
                                                
                                            response["value_field"]=searchInput[0];
                                            response["input_field"]=input;
                                            break;    
                                        case 10:
                                            //select
                                            tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                    tempvar=getrow.find('.rockfm-input2-sel-styl1');
                                                     response["value_field"]=tempvar.selectpicker('val');
                                                     response["input_field"]=input;
                                                    break;
                                                default:
                                                    tempvar=getrow.find('.uifm-input2-opt-main');
                                                    response["value_field"]=tempvar.val();
                                                    response["input_field"]=input;
                                                    break;
                                            }
                                            
                                            
                                            
                                            break;
                                        case 11:
                                            //multiselect
                                            tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');
                                            
                                            switch(parseInt(tmp_theme_type)){
                                                case 1:
                                                    tempvar=getrow.find('.rockfm-input2-sel-styl1');
                                                     response["value_field"]=tempvar.selectpicker('val');
                                                     response["input_field"]=input;
                                                     
                                                    break;
                                                default:
                                                     searchInput = $.map(getrow.find('.uifm-input2-opt-main option:selected'), function(elem){
                                                                return $(elem).attr('value');;
                                                            });     

                                                        response["value_field"]=searchInput;
                                                        response["input_field"]=input;
                                                    break;
                                            }
                                         
                                         
                                            
                                            break;    
                                        case 16:
                                            //slider
                                            tempvar=getrow.find('.rockfm-input4-slider');
                                            response["value_field"]=tempvar.val();
                                            response["input_field"]=input;
                                            break;
                                        case 18:
                                            //spinner
                                            tempvar=getrow.find('.rockfm-input4-spinner');
                                            response["value_field"]=tempvar.val();
                                            response["input_field"]=input;
                                            break;
                                        case 40:
                                            //switch
                                            
                                          var  uifm_fld_value = getrow.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state');
                                          var tmp_val=0;
                                            if(uifm_fld_value){
                                              tmp_val=1; 
                                            }else{
                                              tmp_val=0; 
                                            }
                                            tempvar=getrow.find('.rockfm-input15-switch');
                                            response["value_field"]=tmp_val;
                                            response["input_field"]=input;
                                            
                                            break;    
                                        
                                    }   
                            }
                            
                           return response; 
            };
            
            
            
             this.refreshfields = function(){
                //finding conditional fields. ones which have conditional assigned   
                var found=fields_cond;
                for( var i in found) {
                this.processFieldCond(found[i].field_cond);
                }
            };
            
            
            this.triggerConditional=function(element,id){
                 /*var idfield=cur_field_fire_id=id;
                            
                var found=this.findFieldFire(idfield);

                for( var i in found) {


                this.processFieldCond(found[i].field_cond);
                }*/
                obj.refreshfields();
            }
            
            this.enableFields = function(element){
               element.removeClass('rockfm-conditional-hidden');
            };
            
            this.disableFields = function(element){
               element.addClass('rockfm-conditional-hidden');
            };
            
            this.processFieldCond = function(field_cond){
                //verifying if is showed
                var getElement;
                getElement=cur_form_obj.find('#rockfm_'+field_cond);
                /*verify if field is inside array cond and get list*/
                var foundsource=this.findFieldCond(field_cond);
                if(!foundsource){
                    return;
                }

                /*
               *  f_all: 1 -> All requirements, 2 -> Any requirement
               *  req_match: -> count requirements (already processed)
               * 
               */
                var required=parseInt(foundsource.req_match);
                var action=parseInt(foundsource.action);
                var list_source=foundsource.list;

                var match_count=0;
                var fire_temp;
                 var flag_firevisible;

                 //checking fieldfires (dependant) inside field conditional
                for( var i in list_source) {

                    fire_temp=String(list_source[i].field_fire);
                    if(cur_form_obj.find('#rockfm_'+fire_temp).is(":visible") || String(cur_form_obj.find('#rockfm_'+fire_temp).css("display")) === "block"){
                        flag_firevisible=true;
                    }else{
                        flag_firevisible=false;
                    }
                    //check visible fire
                    if(flag_firevisible===true){
                        if(this.calculateMatchs(list_source[i].field_fire,list_source[i].minput,list_source[i].mtype)===true){
                        match_count++;
                        }
                    } 
                }

              /*
               * action: -> f_show: 1 -> show field, 0 -> hide field
               * 
               */
                //verify matches
                if(required>0 && required<=match_count){
                   //success
                        if (action===1) {
                            //show

                            this.enableFields(getElement);
                            getElement.show();
                        } else if (action===2) {
                            //hide

                            this.disableFields(getElement);
                            getElement.hide();
                        }
                }else{
                   //failed
                        if (action===1) {
                            //show

                            this.disableFields(getElement);
                            getElement.hide();
                        } else if (action===2) {
                            //hide

                            this.enableFields(getElement);
                            getElement.show();
                        }

                }
            };
            
            
            this.calculateMatchs= function(field_fire,input,mtype) {
                 var response;
                            var fire_input=this.getValueFieldById(field_fire,input);
                            switch (parseInt(mtype)) {
                                    case 1:
                                        //is
                                        if($.isArray(fire_input.value_field)){
                                            //it happens when checkbox has multiple options selected
                                             for( var i in fire_input.value_field ) {
                                                if(String(fire_input.value_field[i])===String(fire_input.input_field)){
                                                     response=true;
                                                     break;
                                                }else{
                                                    response=false;
                                                }
                                            }
                                            
                                        } else if($.isNumeric(fire_input.value_field)){
                                            if(parseFloat(fire_input.value_field)===parseFloat(fire_input.input_field)){
                                            response=true;
                                            }else{
                                                response=false;
                                            }
                                        }else{
                                            if(String(fire_input.value_field)===String(fire_input.input_field)){
                                                response=true;
                                            }else{
                                                response=false;
                                            }
                                        }
                                        
                                        
                                        break;
                                    case 2:
                                        //is not
                                        if($.isNumeric(fire_input.value_field)){
                                            if(parseFloat(fire_input.value_field)!=parseFloat(fire_input.input_field)){
                                            response=true;
                                            }else{
                                                response=false;
                                            }
                                        }else{
                                            if(String(fire_input.value_field)!=String(fire_input.input_field)){
                                            response=true;
                                            }else{
                                                response=false;
                                            }
                                        }
                                        
                                        break;
                                    case 3:
                                        //greater than
                                        if(parseFloat(fire_input.value_field)>=parseFloat(fire_input.input_field)){
                                            response=true;
                                        }else{
                                            response=false;
                                        }
                                        break;
                                    case 4:
                                        //lessthan
                                        if(parseFloat(fire_input.value_field)<=parseFloat(fire_input.input_field)){
                                            response=true;
                                        }else{
                                            response=false;
                                        }
                                        break;
                                }
                            return response;    
            }
            
            this.findFieldFire = function(needle) {
                for( var i in fields_fire ) {
                               if(String(fields_fire[i].field_fire)===String(needle)){
                                return fields_fire[i].list;
                               }
                            }
            }
            
            this.findFieldCond = function(needle) {
                for( var i in fields_cond ) {
                               if(String(fields_cond[i].field_cond)===String(needle)){
                                return fields_cond[i];
                               }
                            }
            }
           
        };
        
        $.fn.zgfm_logicfrm = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('zgfm_logicfrm')) return;

                // pass options to plugin constructor
                var myplugin = new zgfmLogicFrm(this, options);

                // Store plugin object in this element's data
                element.data('zgfm_logicfrm', myplugin);
            });
        };
})($uifm);

