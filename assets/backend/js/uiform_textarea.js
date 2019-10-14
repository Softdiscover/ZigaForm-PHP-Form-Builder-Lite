(function($){
        
        var uiformTextarea = function(element, options){
            
             /* main form data*/
            var field_step = null;
            var field_oncreation = false;
            var elem = $(element);
            var obj_main = this;
            var obj_quick_options = null;
            var defaults = {
                            data:{
                            type: 7,
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
                            type_n:'textarea', 
                            input: {
                                value: '',
                                size:'14',
                                bold:0,
                                italic:0,
                                underline:0,
                                placeholder:'',
                                color:'#000',
                                font:'',
                                font_st:1,
                                val_align:''
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
                            el_background:{
                                show_st:'1',
                                type:'1',
                                start_color:'',
                                end_color:'',
                                solid_color:'#ffffff'
                            },
                            el_border_radius:{
                                show_st:'1',
                                size:'0'
                            },
                            el_border:{
                               show_st:'1',  
                               color:'#ddd',
                               color_focus_st:'0',
                               color_focus:'#000',
                               style:'1',
                               width:'1'
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
            
            var typeID=function(){
                           return field_type;
			}
			var getHtmlField= function (element) {
                            var fieldhtml=$('#uiform-fields-templates .uiform-textarea').clone();
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
                                    ,'.uifm-set-section-input-placeh'
                                    ,'.uifm-set-section-inputtextbox'
                                    ,'.uifm-set-section-inputboxbg'
                                    ,'.uifm-set-section-inputboxborder'
                                    ,'.uifm-set-section-helpblock'
                                    ,'.uifm-set-section-validator'
                                    /*validators*/
                                    ,'#uifm-custom-val-req-btn'
                                    ,'#uifm-custom-val-alpha-btn'
                                    ,'#uifm-custom-val-alphanum-btn'
                                    ,'#uifm-custom-val-num-btn'
                                    ,'#uifm-custom-val-mail-btn'
                                    /*label */
                                    ,'.uifm-set-section-label-lbltxt'
                                    ,'.uifm-set-section-label-sublbltxt'
                                    /*input 1*/
                                    ,'.uifm-set-section-input1-txtvalue'
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
                        }
                        
                        var getTestData= function() {
                            var id_element=$('.uiform-items-container .uiform-field:first').attr("id");
                            console.log(id_element);
                            var data=rocketform.getFieldById(id_element);
                            console.log(data.input.type);
			}
        };
        
        $.fn.uiform_textarea = function(options){
            return this.each(function(){
            var element = $(this);

            // Return early if this element already has a plugin instance
            if (element.data('uiform_textarea')) return;

            // pass options to plugin constructor
            var myplugin = new uiformTextarea(this, options);

            // Store plugin object in this element's data
            element.data('uiform_textarea', myplugin);
            });
        };
})($uifm);

