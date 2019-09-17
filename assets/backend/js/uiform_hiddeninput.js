(function($){
        
        var uiformHiddeninput = function(element, options){
             /* main form data*/
            var field_step = null;
            var field_oncreation = false;
            var elem = $(element);
            var obj_main = this;
            var obj_quick_options = null;
            var defaults = {
                            data:{
                            type: 21,
                            id: '',
                            skin:{
                                    margin:{
                                           show_st:1,
                                           top:'5',
                                           bottom:'5',
                                           left:'0',
                                           right:'0'
                                    },
                                    padding:{
                                           show_st:1, 
                                           top:'0',
                                           bottom:'0',
                                           left:'0',
                                           right:'0'
                                    },
                                    custom_css:{
                                        ctm_id:'',
                                        ctm_class:'',
                                        ctm_additional:''
                                    }
                                  },
                            field_name:'',
                            type_n:'hiddeninput', 
                            input8: {
                                value: 'Hidden text'
                            }
                            }
                        };
           var settings = $.extend(true,{}, defaults, options);
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };

            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            
            var typeID=function(){
                           return field_type;
			}
			var getHtmlField= function (element) {
                            
                            
                            var fieldhtml=$('#uiform-fields-templates .uiform-hiddeninput').clone();
                            
                            var id='ui'+rocketform.generateUniqueID();
                            fieldhtml.attr("id",id);
                            //get step number
                            var step_pane=$(element).closest('.uiform-step-pane').data("uifm-step");
                            
                            //update store data
                            var settings = $.extend(true,{}, defaults, options || {});
                            settings.id=id;
                            //store to object
                            $('#'+id).data('uifm-settings',settings);
                            
                            
                            return fieldhtml;
			}
                        var setData= function(step_index,id_element) {
                            
                                
			}
                        
                        this.testingdata= function() {
                            console.log('data from plugin : '+rocketform.dumpvar2(settings.data));
                        }
                        this.updateVarData=function(id){
                            $('#'+id).data('uifm-settings',settings);
                        }
                        this.update_previewfield=function(id_element){
                            var obj_field= $('#'+id_element);
                            if(obj_field){
                            rocketform.loadForm_updatePreviewField(id_element,settings.data);
                            }
                        }
                        this.loadSettingDataTab=function(id_element){
                            this.showSettingTab(id_element);
                            
                               //setting data values to settings tab
                               
                        }
                        this.onWholeHover = function(e){
                            if(e) { e.stopPropagation(); e.preventDefault();}
                /*adding quick option to column*/  
                var tmp_tmpl= wp.template("zgpb-quick-options");
                if(parseInt($(this).find('.zgpb-fields-quick-options2').length)===0){
                      $(this).append(tmp_tmpl( { 
                                          type : settings.data.type,
                                          id:settings.data.id
                                  } ));
                }


                    obj_quick_options = elem.find('.zgpb-fields-quick-options2');
                    obj_main.refresh_quickopt_position();


                  }

              this.offWholeHover = function(e){
if(e) { e.stopPropagation(); e.preventDefault();}
                  if(parseInt($(this).find('.zgpb-fields-quick-options2').length)>0){
                      $(this).find('.zgpb-fields-quick-options2').remove();
                    } 


              }
            
            this.init_events=function(){
                            
                            elem.on( "mouseenter", obj_main.onWholeHover );
                            elem.on( "mouseleave", obj_main.offWholeHover );
                          
                          
                             $(window).scroll(function(){
                               
                                obj_main.refresh_quickopt_position();
                             
                              });
                          
                        }
            
            this.refresh_quickopt_position = function(){
                            if(obj_quick_options && obj_quick_options.is(':visible')){
                                      var elemTop = $(elem).offset().top||null;
                                      var elemBottom = elemTop + $(elem).height();
                                       
                                      var docViewTop = $(window).scrollTop();
                                     
                                        var docViewBottom = docViewTop + $(window).height();
                                      
                                      var tmp_new_top;
                                      
                                      if((elemTop > docViewTop) &&  (elemBottom < docViewBottom)){
                                           
                                          tmp_new_top = ((elemBottom - elemTop)/2).toString()+'px';
                                      }  else if(( elemTop > docViewTop ) &&  (elemBottom > docViewBottom)){
                                          
                                           tmp_new_top = ((docViewBottom - elemTop)/2).toString()+'px';
                                      }  else if((elemTop < docViewTop) &&  (elemBottom < docViewBottom)){
                                          
                                          tmp_new_top = ((docViewTop - elemTop)+(elemBottom - docViewTop)/2).toString()+'px';
                                      
                                      } else if((elemTop < docViewTop) &&  (elemBottom > docViewBottom)){
                                          
                                          tmp_new_top = ((docViewTop - elemTop)+($(window).height())/2).toString()+'px';
                                      }else{
                                         
                                          tmp_new_top ='50%';
                                      }
                                      
                                      obj_quick_options.css('top',tmp_new_top); 
                            }
                             
                        }
            
                        
                        
                      this.enableSettingOptions= function(f_data,addt) {
                            
                                 /*show tabs according to field- this line will be removed soon*/   
                                  this.showSettingTab();
                                     
                                    if(rocketform.checkIntegrityDataField(f_data['id'])){
                                     
                                    this.enableSettingOptions_process(f_data,true,true);   
                                       
                                   //setting data values to settings tab
                                    rocketform.setDataToSettingTabAndPreview(f_data['id'],settings.data);    
                                  /*add loading on setting  tab*/
                                    rocketform.loading_boxField("zgfm-panel-right-field-tabopt",0); 
                                  
                                    
                                    if(field_oncreation){
                                         rocketform.loading_boxField(f_data['id'],0);
                                         //setting creation to false
                                         field_oncreation=false;
                                    }
                                    //remove load flag on tab
                                    $('#uiform-build-field-tab').removeClass('zgfm-fieldtab-flag-loading');
                                  }
                                  
			}
                        
                        this.setVariables=function($vars){
                            field_oncreation=$vars['oncreation']||false;
                        }
                        
                 
                        
                         this.enableSettingOptions_process =function(f_data,update_modal,update_preview){
                            
                            
                                  /*loading events*/
                                var tab=$('#uifm-field-opt-content');
                                 rocketform.fields_events_bswitch(tab);
                                  rocketform.fields_events_spinner(tab);rocketform.fields2_events_spinner(tab);
                                  rocketform.fields_events_general();
                                 rocketform.fields_events_cpicker(tab);
                                 rocketform.fields_events_slider(tab);
                                 rocketform.fields_events_select(tab);
                            
                        }
                        
                        
                        this.showSettingTab= function(id_element) {
                            
                            var idselected= $('#uifm-field-selected-id').val();
                            if(String(idselected)!=String(id_element)){
                                //cleaning setting tab
                                rocketform.cleanSettingTab();
                               var clvars = [
                                    '.uifm-set-section-fieldname'
                                    ,'.uifm-tab-fld-input'
                                    ,'.uifm-set-section-input8'
                                    /* more opt*/
                                    ,'.uifm-tab-fld-moreopt'
                                ];
                                $.each(clvars,function(){
                                    $(String(this)).removeClass("uifm-hide");
                                });
                          
                                
                            if('#uiform-settings-tab-1'){
                                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-2"]').sfdc_tab('show');
                                }
                            }
                            
                            rocketform.checkScrollTab();
                              
			}
                        this.setToDatalvl1=function(option,value){
                            settings.data[option]=value;
                        }
                        this.setFieldName=function(id){
                            settings.data['field_name']=settings.data['type_n']+id;
                        }
                        this.setDataToCoreStore =function(step_pane,id){
                            //set to main array
                            
                            rocketform.setUiData3('steps_src',step_pane,id,settings.data);
                            //set to correct step
                        }
                        
                        this.update_settingsData =function(options){
                          
                          var settings2 = $.extend(true,{}, settings, {data:options});
                          var settings3 = uifm_validate_field(settings2,settings);
                          //updating
                          settings = settings3;
                               
                        }
                        
                        this.setDataToCore =function(tmp_vars){
                         
                            var id=tmp_vars['id'],
                                f_opt1=tmp_vars['opt1'],
                                f_opt2=tmp_vars['opt2'],
                                f_opt3=tmp_vars['opt3'],
                                f_opt4=tmp_vars['opt4'];
                                
                            switch(String(f_opt1)){
                                case 'skin': 
                                default:
                                    rocketform.setUiData6('steps_src',field_step,String(id),String(f_opt1),String(f_opt2),String(f_opt3),f_opt4);
                            }    
                             
                        }
                        
                        this.setStep=function(step){
                            field_step=step;
                        }
                        
                        var getTestData= function() {
                            var id_element=$('.uiform-items-container .uiform-field:first').attr("id");
                            console.log(id_element);
                            var data=rocketform.getFieldById(id_element);
                            console.log(data.input.type);
			}
        };
        
        $.fn.uiform_hiddeninput = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('uiform_hiddeninput')) return;

                // pass options to plugin constructor
                var myplugin = new uiformHiddeninput(this, options);

                // Store plugin object in this element's data
                element.data('uiform_hiddeninput', myplugin);
            });
        };
})($uifm);

