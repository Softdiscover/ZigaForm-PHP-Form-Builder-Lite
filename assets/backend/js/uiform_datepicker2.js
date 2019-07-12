(function($){
        
        var uifmFlatPickr = function(element, options){
             /* main form data*/
            var field_step = null;
            var field_oncreation = false;
            var elem = $(element);
            var obj_main = this;
            var obj_quick_options = null;
            var defaults = {
                            data:{
                            type: 43,
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
                            order_frm:'0',
                            type_n:'datepicker2', 
                            input_date2: {
                                enabletime:'0',
                                nocalendar:'0',
                                time_24hr:'0',
                                altinput:'0',
                                altformat:'F j, Y',
                                dateformat:'Y-m-d',
                                language:'en',
                                mindate:'today',
                                maxdate:'',
                                defaultdate:'',
                                inline:'0'
                            },
                            label:{
                                text:'Text label',
                                size:'14',
                                bold:0,
                                italic:0,
                                underline:0,
                                color:'#000',
                                font:'{"family":"\'Comic Sans MS\', Arial, sans-serif","name":"Comic Sans MS","classname":"comicsansms"}',
                                font_st:1,
                                shadow_st:0,
                                shadow_color:'#666',
                                shadow_x:1,
                                shadow_y:1,
                                shadow_blur:3
                            },
                            sublabel:{
                                text:'',
                                size:'14',
                                bold:1,
                                italic:1,
                                underline:0,
                                color:'#000',
                                font:'{"family":"\'Comic Sans MS\', Arial, sans-serif","name":"Comic Sans MS","classname":"comicsansms"}',
                                font_st:1,
                                shadow_st:0,
                                shadow_color:'#666',
                                shadow_x:1,
                                shadow_y:1,
                                shadow_blur:3
                            },
                            txt_block:{
                                block_pos:'1',
                                block_st:'1',
                                block_align:'0'
                            },
                            help_block:{
                                text:'here your content',
                                show_st:'0',
                                font:'',
                                font_st:'0',
                                pos:''
                            },
                            validate:{
                                typ_val:'0',
                                typ_val_custxt:'',
                                pos:'0',
                                tip_col:'#000000',
                                tip_bg:'#ffffff',
                                reqicon_st:'0',
                                reqicon_pos:'0',
                                reqicon_img:'glyphicon-asterisk'
                            },
                            clogic:{
                                show_st:'0',
                                f_show:'1',
                                f_all:'1',
                                list:[]
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
                            
                            
                            var fieldhtml=$('#uiform-fields-templates .uiform-datepicker2').clone();
                            
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
                                    ,'.uifm-tab-fld-label'
                                    ,'.uifm-tab-fld-input'
                                    ,'.uifm-tab-fld-helpblock'
                                    ,'.uifm-tab-fld-validation'
                                    ,'.uifm-tab-fld-logicrls'
                                    ,'.uifm-set-section-label'
                                    ,'.uifm-set-section-sublabel'
                                    ,'.uifm-set-section-blocktxt'
                                    ,'.uifm-set-section-helpblock'
                                    ,'.uifm-set-section-validator'
                                    /*validators*/
                                    ,'#uifm-custom-val-req-btn'
                                    /*input2*/
                                    ,'#uifm-fld-inp-date2-box'
                                    //,'.uifm-set-section-input4-defaultvalue'
                                    /*label */
                                    ,'.uifm-set-section-label-lbltxt'
                                    ,'.uifm-set-section-label-sublbltxt'
                                    /*help block*/
                                    ,'.uifm-set-section-helpblock-text'
                                    /* more opt*/
                                    ,'.uifm-tab-fld-moreopt'
                                    
                                ];
                                $.each(clvars,function(){
                                    $(String(this)).removeClass("uifm-hide");
                                });
                          
                                
                            if('#uiform-settings-tab-1'){
                                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-1"]').sfdc_tab('show');
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
                        };
                        
                        this.inputsettings_refresh_Options = function(option,tab,value){
                            switch(String(option)) {
                                case 'enabletime':
                                  if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp19_enabletime').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp19_enabletime').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'nocalendar':
                                    if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp19_nocalendar').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp19_nocalendar').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'nocalendar':
                                    if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp19_time24h').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp19_time24h').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                 case 'time_24hr':
                                    if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp19_time24hr').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp19_time24hr').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;    
                                case 'altinput':
                                    if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp19_altinput').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp19_altinput').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'altformat':
                                    tab.find('#uifm_fld_inp19_altformat').val(value);
                                    break;
                                case 'dateformat':
                                    tab.find('#uifm_fld_inp19_dateformat').val(value);
                                    break;
                                case 'language':
                                    tab.find('#uifm_fld_inp19_language').val(value);
                                    break;    
                                case 'mindate':
                                    tab.find('#uifm_fld_inp19_mindate').val(value);
                                    break;      
                                case 'maxdate':
                                    tab.find('#uifm_fld_inp19_maxdate').val(value);
                                    break;
                                case 'defaultdate':
                                    tab.find('#uifm_fld_inp19_defaultdate').val(value);
                                    break;
                            }
                        };
                        
                        this.inputsettings_preview_genAllOptions = function(obj,section){
                            var f_type=obj.data('typefield');
                            var f_id=obj.attr('id');
                            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            

                            var enabletime=rocketform.getUiData5('steps_src',f_step,f_id,section,'enabletime');
                            var nocalendar=rocketform.getUiData5('steps_src',f_step,f_id,section,'nocalendar');
                            var time_24hr=rocketform.getUiData5('steps_src',f_step,f_id,section,'time_24hr');
                            var altinput=rocketform.getUiData5('steps_src',f_step,f_id,section,'altinput');
                            var altformat=rocketform.getUiData5('steps_src',f_step,f_id,section,'altformat');
                            var dateformat=rocketform.getUiData5('steps_src',f_step,f_id,section,'dateformat');
                            var language=rocketform.getUiData5('steps_src',f_step,f_id,section,'language');
                            var mindate=rocketform.getUiData5('steps_src',f_step,f_id,section,'mindate');
                            var maxdate=rocketform.getUiData5('steps_src',f_step,f_id,section,'maxdate');
                            var defaultdate=rocketform.getUiData5('steps_src',f_step,f_id,section,'defaultdate');
                            var inline=rocketform.getUiData5('steps_src',f_step,f_id,section,'inline');
                            
                            var f_values=rocketform.getUiData4('steps_src',f_step,f_id,section);
                            
                            var valhash = CryptoJS.MD5(JSON.stringify(f_values));
                            
                            var f_checkhash=$('#'+f_id).attr('data-check-hash');

                            if(String(f_checkhash)===String(valhash)){
                            }else{
                                $('#'+f_id).attr('data-check-hash',valhash);
                                
                                var tmp = {};
                                tmp['wrap']=true;
                                //enable time
                                if(parseInt(enabletime)===1){
                                    tmp['enableTime']=true;
                                }else{
                                    tmp['enableTime']=false;
                                }
                                 
                                //nocalendar 
                                if(parseInt(nocalendar)===1){
                                    tmp['noCalendar']=true;
                                }else{
                                    tmp['noCalendar']=false;
                                }
                                
                                //time_24hr
                                if(parseInt(time_24hr)===1){
                                    tmp['time_24hr']=true;
                                }else{
                                    tmp['time_24hr']=false;
                                }
                                
                                //alt input
                                if(parseInt(altinput)===1){
                                    tmp['altInput']=true;
                                }else{
                                    tmp['altInput']=false;
                                }
                                
                                
                                //alt format
                                if(String(altformat).length>0){
                                    tmp['altFormat']=altformat;
                                }else{
                                    tmp['altFormat']="F j, Y";
                                }
                                
                                //date format
                                if(String(dateformat).length>0){
                                    tmp['dateFormat']=dateformat;
                                }else{
                                    tmp['dateFormat']="Y-m-d";
                                }
                                
                                //language
                                 tmp['locale']=language;
                                
                                //min date
                                if(String(mindate).length>0){
                                    tmp['minDate']=mindate;
                                }
                                
                                //max date
                                if(String(maxdate).length>0){
                                    tmp['maxDate']=maxdate;
                                }
                                
                                
                                //date format
                                if(String(defaultdate).length>0){
                                    tmp['defaultDate']=defaultdate;
                                }
                                
                                 flatpickr(obj.find('.uifm-input-flatpickr')[0], tmp);
                                
                            }
                        };
                        
                        var getTestData= function() {
                            var id_element=$('.uiform-items-container .uiform-field:first').attr("id");
                            console.log(id_element);
                            var data=rocketform.getFieldById(id_element);
                            console.log(data.input.type);
			}
        };
        
        $.fn.uifm_datepickr_flat = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('uifm_datepickr_flat')) return;

                // pass options to plugin constructor
                var myplugin = new uifmFlatPickr(this, options);

                // Store plugin object in this element's data
                element.data('uifm_datepickr_flat', myplugin);
            });
        };
})($uifm);

