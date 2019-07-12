(function($){
        
        var uiformCheckbox = function(element, options){
             /* main form data*/
           var field_step = null;
            var field_oncreation = false;
            var elem = $(element);
            var obj_main = this;
            var obj_quick_options = null;
            var defaults = {
                            data:{
                            type: 9,
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
                            type_n:'checkbox', 
                            input2: {
                                size:'14',
                                bold:0,
                                italic:0,
                                underline:0,
                                color:'#000',
                                font:'',
                                font_st:1,
                                block_align:0,
                                style_type:1,
                                options:{},
                                stl1:{
                                    border_color:'#337ab7',
                                    bg_color:'#ffffff',
                                    icon_color:'#337ab7',
                                    icon_mark:'fa-check',
                                    size:'14'
                                }
                                
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
                            var fieldhtml=$('#uiform-fields-templates .uiform-checkbox').clone();
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
                                    ,'.uifm-set-section-input2'
                                    ,'.uifm-set-section-helpblock'
                                    ,'.uifm-set-section-validator'
                                    /*validators*/
                                    ,'#uifm-custom-val-req-btn'
                                    /*input2*/
                                    ,'#uifm-fld-inp2-block-align-box'
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
                        }
                        
                        this.input2settings_preview_genAllOptions=function(){
                            //status
                                
                                var f_id=settings['data']['id'];
                                var obj=$('#'+f_id);
                                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');

                                var f_block_align=rocketform.getUiData5('steps_src',f_step,f_id,'input2','block_align');
                                var f_type=rocketform.getUiData4('steps_src',f_step,f_id,'type');
                                var values=rocketform.getUiData5('steps_src',f_step,f_id,'input2','options');
                                var stl1_st=rocketform.getUiData5('steps_src',f_step,f_id,'input2','style_type');
                                
                                var input2_check=rocketform.getUiData4('steps_src',f_step,f_id,'input2');
                                
                                var valhash = CryptoJS.MD5(JSON.stringify(input2_check));
                                var f_checkhash=$('#'+f_id).attr('data-zgfm-input2-hash');
                            
                                if(String(f_checkhash)===String(valhash)){
                                    
                                }else{
                                    $('#'+f_id).attr('data-zgfm-input2-hash',valhash);
                                     
                                    var newoptprev;
                                obj.find('.uifm-input2-wrap').html('');

                                switch(parseInt(f_type)){
                                    case 8:
                                        /*radio button*/

                                         $.each(values, function(index, value) {
                                                    newoptprev=$('#uifm_frm_inp2_templates').find('.sfdc-radio').clone();
                                                    newoptprev.attr('data-inp2-opt-index',index);
                                                    newoptprev.find('.uifm-inp2-rdo').prop( "checked",parseInt(value['checked']));
                                                    newoptprev.find('.uifm-inp2-rdo').attr('name','uifm_'+f_id+'_opt');
                                                    newoptprev.find('.uifm-inp2-label').html(value['label']);

                                                    obj.find('.uifm-input2-wrap').append(newoptprev.prop('outerHTML'));


                                                });

                                            if(parseInt(f_block_align)===1 ){
                                                obj.find('.uifm-input2-wrap .sfdc-radio').attr('class','sfdc-radio-inline');
                                            }else{
                                                obj.find('.uifm-input2-wrap .sfdc-radio-inline').attr('class','sfdc-radio');
                                            }
                                        break;
                                    case 9:
                                        /*checkbox*/
                                         $.each(values, function(index, value) {
                                                    newoptprev=$('#uifm_frm_inp2_templates').find('.sfdc-checkbox').clone();
                                                    newoptprev.attr('data-inp2-opt-index',index);
                                                    newoptprev.find('.uifm-inp2-chk').prop( "checked",parseInt(value['checked']));
                                                    newoptprev.find('.uifm-inp2-chk').attr('name','uifm_'+f_id+'_opt');
                                                    newoptprev.find('.uifm-inp2-label').html(value['label']);
                                                    obj.find('.uifm-input2-wrap').append(newoptprev);
                                                });

                                            if(parseInt(f_block_align)===1 ){
                                                obj.find('.uifm-input2-wrap .sfdc-checkbox').attr('class','sfdc-checkbox-inline');
                                            }else{
                                                obj.find('.uifm-input2-wrap .sfdc-checkbox-inline').attr('class','sfdc-checkbox');
                                            }
                                            
                                            //update
                                          
                                            $('#'+f_id).attr('data-zgfm-stl1-hash','');
                                            
                                            if(parseInt(stl1_st)===1){
                                               this.previewfield_input2_stl1();
                                            }
                                            
                                            
                                        break;
                                    case 10:
                                        /*select*/
                                        obj.find('.uifm-input2-wrap').append('<select class="sfdc-form-control uifm-input2-opt-main" ></select>');
                                         $.each(values, function(index, value) { 
                                                    newoptprev= '<option data-inp2-opt-index="'+index+'" ';

                                                    if(parseInt(value['checked'])===1){
                                                        newoptprev+=' selected ';
                                                    }
                                                    newoptprev+= ' > '+value['label']+' </option>';
                                                    obj.find('.uifm-input2-wrap select').append(newoptprev);
                                                });
                                        break;
                                    case 11:
                                        /*multiselect*/
                                         obj.find('.uifm-input2-wrap').append('<select class="sfdc-form-control uifm-input2-opt-main" multiple ></select>');
                                         $.each(values, function(index, value) { 
                                                    newoptprev= '<option data-inp2-opt-index="'+index+'" ';

                                                    if(parseInt(value['checked'])===1){
                                                        newoptprev+=' selected ';
                                                    }
                                                    newoptprev+= ' > '+value['label']+' </option>';
                                                    obj.find('.uifm-input2-wrap select').append(newoptprev);
                                                });
                                        break;
                                }
                                
                                //add some other options
                                var f_size=rocketform.getUiData5('steps_src',f_step,f_id,'input2','size'),
                                        f_bold=rocketform.getUiData5('steps_src',f_step,f_id,'input2','bold'),
                                        f_italic=rocketform.getUiData5('steps_src',f_step,f_id,'input2','italic'),
                                        f_underline=rocketform.getUiData5('steps_src',f_step,f_id,'input2','underline'),
                                        f_color=rocketform.getUiData5('steps_src',f_step,f_id,'input2','color');
                                
                                if(f_size){
                                    obj.find('.uifm-input2-opt-main').css('font-size',f_size+'px');
                                }
                                
                                if(parseInt(f_bold)===1){
                                    obj.find('.uifm-input2-opt-main').css('font-weight','bold');    
                                  }else{
                                   obj.find('.uifm-input2-opt-main').css('font-weight','normal');    
                                 }
                                 
                                  if(parseInt(f_italic)===1){
                                    obj.find('.uifm-input2-opt-main').css('font-style','italic');    
                                  }else{
                                    obj.find('.uifm-input2-opt-main').removeCss('font-style'); 
                                  } 
                                  
                                     if(parseInt(f_underline)===1){
                                        obj.find('.uifm-input2-opt-main').css('text-decoration','underline');    
                                      }else{
                                        obj.find('.uifm-input2-opt-main').removeCss('text-decoration');
                                      } 
                                      
                                   obj.find('.uifm-input2-opt-main').removeCss('color');
                                    if(f_color){
                                        obj.find('.uifm-input2-opt-main').css('color',f_color);
                                    }   
                                
                                //font update
                                rocketform.previewfield_fontfamily(obj,'input2','.uifm-input2-opt-main');
                                    
                                }
                                
                                
                                
                        }
                        
                        this.input2settings_statusRdoOption=function(el){
                            
                            var f_id=settings['data']['id'];
                            
                            var opt_index=el.closest('.uifm-fld-inp2-options-row').data('opt-index');
                                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                               var f_type=rocketform.getUiData4('steps_src',f_step,f_id,'type');
                               var opt_value;
                               
                               var stl1_st=rocketform.getUiData5('steps_src',f_step,f_id,'input2','style_type');
                               

                               //get options
                               var options=rocketform.getUiData5('steps_src',parseInt(f_step),f_id,'input2','options');

                               switch(parseInt(f_type)){
                                   case 8:
                                       /*radio button*/
                                   case 10:
                                       /*select*/
                                        //set all checked to zero
                                       if(options){
                                                       $.each(options, function(index2, value2) {
                                                           rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input2','options',index2,'checked',0);
                                                       });
                                                   }
                                       break;
                                   case 9:
                                       /*checkbox*/
                                   case 11:
                                       /*multiselect*/
                                       var el_checked=(el.is(":checked"))?1:0;
                                       var el_box_index=el.closest('.uifm-fld-inp2-options-row');
                                       rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input2','options',el_box_index,'checked',el_checked);
                                       
                                       
                                       break; 
                                   }

                               switch(parseInt(f_type)){
                                   case 8:
                                       /*radio button*/
                                       opt_value=($('#uifm_frm_inp2_opt'+opt_index+'_rdo').prop( "checked" ))?1:0;
                                       break;
                                   case 9:
                                       /*checkbox*/
                                       opt_value=($('#uifm_frm_inp2_opt'+opt_index+'_chk').prop( "checked" ))?1:0;
                                       break;
                                   case 10:
                                       /*select*/
                                       opt_value=($('#uifm_frm_inp2_opt'+opt_index+'_rdo').prop( "checked" ))?1:0;
                                       break;
                                   case 11:
                                       /*multiselect*/
                                       opt_value=($('#uifm_frm_inp2_opt'+opt_index+'_chk').prop( "checked" ))?1:0;
                                       break; 
                                   }

                                rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input2','options',opt_index,'checked',opt_value);
                                //preview field
                                var prev_el_sel=$('#'+f_id).find('.uifm-input2-wrap ').find("[data-inp2-opt-index='" + opt_index + "']");

                                switch(parseInt(f_type)){
                                   case 8:
                                       /*radio button*/
                                   case 9:
                                       /*checkbox*/
                                       prev_el_sel.find('input').prop('checked',opt_value);
                                       
                                       if(parseInt(stl1_st)===1){
                                           
                                           if(opt_value===1){
                                               prev_el_sel.find('input').data('checkradios').form.checkboxEnable(prev_el_sel.find('input'));
                                           }else{
                                               prev_el_sel.find('input').data('checkradios').form.checkboxDisable(prev_el_sel.find('input'));
                                           }
                                           
                                       }
                                       
                                       
                                       break;
                                   case 10:
                                       /*select*/
                                       prev_el_sel.prop('selected',opt_value);
                                       break;
                                   case 11:
                                       /*multiselect*/
                                       prev_el_sel.prop('selected',opt_value);
                                       break; 
                                   }
                        }
                        
                        
                        this.previewfield_input2_stl1=function(){
                            
                            var f_id=settings['data']['id'];
                            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            
                            var stl_type=rocketform.getUiData5('steps_src',f_step,f_id,'input2','style_type'),
                                stl1_border_color=rocketform.getUiData6('steps_src',f_step,f_id,'input2','stl1','border_color'),
                                stl1_bg_color=rocketform.getUiData6('steps_src',f_step,f_id,'input2','stl1','bg_color'),
                                stl1_icon_color=rocketform.getUiData6('steps_src',f_step,f_id,'input2','stl1','icon_color'),
                                stl1_icon_mark=rocketform.getUiData6('steps_src',f_step,f_id,'input2','stl1','icon_mark'),
                                stl1_size=rocketform.getUiData6('steps_src',f_step,f_id,'input2','stl1','size');
                        
                             var f_values=rocketform.getUiData5('steps_src',f_step,f_id,'input2','stl1');
                             //merge type to f_values
                             $.extend( f_values, {'style_type':stl_type} );
                             
                            var valhash = CryptoJS.MD5(JSON.stringify(f_values));
                            
                            var f_checkhash=$('#'+f_id).attr('data-zgfm-stl1-hash');
                            
                            if(String(f_checkhash)===String(valhash)){
                                 
                            }else{
                               
                                $('#'+f_id).attr('data-zgfm-stl1-hash',valhash);
                               //disabling checkradio 
                               $('#'+f_id).find('.uifm-input2-wrap input').unbind().removeData();
                                    
                                    var tmp_inp,tmp_wrap;
                                    $.each($('#'+f_id).find('.uifm-input2-wrap .sfdc-checkbox'), function(index, value) {
                                        tmp_inp = $(this).find('.checkradios-checkbox input');
                                        tmp_wrap = $(this).find('.checkradios-checkbox');
                                        tmp_wrap.replaceWith(tmp_inp);
                                    }); 
                                
                                
                               if(parseInt(stl_type)===1){
                                  //enabling checkradio  
                                 
                                    $('#'+f_id).find('.uifm-input2-wrap input').checkradios({
                                                    checkbox: {

                                                                iconClass:'fa '+stl1_icon_mark
                                                    },
                                                    radio: {

                                                                iconClass:'fa '+stl1_icon_mark

                                                    }


                                                });
                                    
                                    
                                  //building style css  
                                    var str_css='';
                                   $('#'+f_id+'_stl1_css').remove(); 
                                    
                                   str_css='<style type="text/css" id="'+f_id+'_stl1_css">'; 
                                   str_css+='#'+f_id+' .checkradios-checkbox, #'+f_id+' .checkradios-radio {';
                                   
                                   if(stl1_border_color){
                                      str_css+='border:2px solid '+stl1_border_color+';'; 
                                   }
                                   if(stl1_bg_color){
                                      str_css+='background: '+stl1_bg_color+';'; 
                                   }
                                   if(stl1_icon_color){
                                      str_css+='color: '+stl1_icon_color+';'; 
                                   }
                                   if(stl1_size){
                                      str_css+='font-size: '+stl1_size+'px;'; 
                                   }
                                   str_css+='} ';
                                   str_css+='</style>';
                                   $('head').append(str_css);
                                   
                               }else{
                                 
                                    
                               }
                                
                            }
                        }
                        
                        var getTestData= function() {
                            var id_element=$('.uiform-items-container .uiform-field:first').attr("id");
                            console.log(id_element);
                            var data=rocketform.getFieldById(id_element);
                            console.log(data.input.type);
			}
                         
        };
        
        $.fn.uiform_checkbox = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('uiform_checkbox')) return;

                // pass options to plugin constructor
                var myplugin = new uiformCheckbox(this, options);

                // Store plugin object in this element's data
                element.data('uiform_checkbox', myplugin);
            });
        };
})($uifm);

