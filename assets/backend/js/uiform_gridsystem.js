(function($){
        
        var uiform_gridsystem = function(element, options){
            var elem = $(element);
            var obj = this;
            var defaults = {
                            data:{
                            type: 4,
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
                            type_n:'column4'
                            }
                        };
           var settings = $.extend(true,{}, defaults, options);
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };
            this.showSettingTab= function(id_element) {
                            
                            var idselected= $('#uifm-field-selected-id').val();
                            if(String(idselected)!=String(id_element)){
                                //cleaning setting tab
                                rocketform.cleanSettingTab();
                            }
                            
                            rocketform.checkScrollTab();
                              
			}
           
            this.enableSettingOptions= function(id_element) {
                               this.showSettingTab();
                            
                                   if(rocketform.checkIntegrityDataField(id_element)){
                                   //setting data values to settings tab
                                    rocketform.setDataToSettingTabAndPreview(id_element,settings.data);    
                                 
                                     
                            
                                    
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
            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            
                        var typeID=function(){
                           return field_type;
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
                        this.setToDatalvl1=function(option,value){
                            settings.data[option]=value;
                        }
                        
                        
                        this.setDataToCoreStore =function(step_pane,id){
                            //set to main array
                            rocketform.setUiData3('steps_src',step_pane,id,settings.data);
                            //set to correct step
                        }
                        
        };
        
        $.fn.uiform_gridsystem = function(options){
            return this.each(function(){
            var element = $(this);

            // Return early if this element already has a plugin instance
            if (element.data('uiform_gridsystem')) return;

            // pass options to plugin constructor
            var myplugin = new uiform_gridsystem(this, options);

            // Store plugin object in this element's data
            element.data('uiform_gridsystem', myplugin);
            });
        };
})($uifm);

