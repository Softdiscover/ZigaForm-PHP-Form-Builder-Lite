(function($){
        
        var zgpbld_gridsystem = function(element, options){
            
            var field_step = null;
            var field_oncreation = false;
            var field_onprocess = false;
            var elem = $(element); var cur_blockmain_st=true;
            var obj_main = this;
            var tmp_init_data={
                                        skin:{
                                            align:{
                                              show_st:0,
                                              max_width:'1200',
                                              max_width_st:'1'
                                            },
                                            margin:{
                                                   show_st:1, 
                                                   top:'0',
                                                   bottom:'0',
                                                   left:'0',
                                                   right:'0'
                                            },
                                            padding:{
                                                   show_st:1,
                                                   top:'5',
                                                   bottom:'5',
                                                   left:'0',
                                                   right:'0'
                                            },
                                            text:{
                                                color:''
                                            },
                                            background:{
                                                show_st:'0',
                                                type:'1',
                                                cl_start_color:'#eeeeee',
                                                cl_end_color:'#ffffff',
                                                cl_solid_color:'#eeeeee',
                                                img_source:'',
                                                img_repeat:'0',
                                                img_position:'Center',
                                                img_attachment:'Scroll',
                                                img_scale:'Fill',
                                                img_overlay_color:'',
                                                img_overlay_opacity:'',
                                                img_size_type:'3',
                                                img_size_len:'100% 100%',
                                                opacity:'100'
                                            },
                                            border:{
                                               show_st:'0',  
                                               color:'#000',
                                               color_focus_st:'0',
                                               color_focus:'#000',
                                               type:'1',
                                               width:'1'
                                            },
                                            border_radius:{
                                               show_st:'0',
                                               size:'17'
                                            },
                                            custom_css:{
                                            ctm_id:'',
                                            ctm_class:'',
                                            ctm_additional:''
                                            
                                            },
                                            shadow:{
                                                show_st:'0',
                                                color:'#CCCCCC',
                                                h_shadow:'3',
                                                v_shadow:'3',
                                                blur:'10'
                                            }

                                      }
            };
            var defaults = {
                            data:{
                                type: 0,
                                id: '',
                                type_n:'Grid',
                                field_name:'',
                                main:{
                                   
                                },       
                                blocks:{} 
                                }
                        };
            
           
            var settings = $.extend(true,{}, defaults);
            
            var cur_block_var;
           var zgpbvariable = [];
                zgpbvariable.innerVars = {};
                
           var setInnerVariable = function(name, value) {
                zgpbvariable.innerVars[name] = value;
            };
             
            var getInnerVariable = function(name) {
                if (zgpbvariable.innerVars[name]) {
                    return zgpbvariable.innerVars[name];
                } else {
                    return '';
                }
            };
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };
            this.showSettingTab= function(id_element) {
                            
                          //  var idselected= $('#zgpbld-field-selected-id').val();
                        
			}
           
             
            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            
                        var typeID=function(){
                           return field_type;
			}
			
                        this.setOptionsToModal = function(vars){
                            
                            var tab=$('#uifm-field-opt-content');
                            var opt1=vars['opt1'],
                                opt2=vars['opt2'],
                                opt3=vars['opt3'],
                                opt4=vars['opt4'];
                            switch(String(opt1)) {
                              
                               case 'skin':
                                    switch(String(opt2)) {
                                            case 'align':
                                                /*check if touchspin is enabled*/
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                    if(parseInt(opt4)===1){
                                                                    tab.find('#zgpb_fld_col_style_st').prop('checked', true);    
                                                                    }else{
                                                                    tab.find('#zgpb_fld_col_style_st').prop('checked', false);    
                                                                    }
                                                                    break;
                                                                case 'max_width_st':
                                                                    if(parseInt(opt4)===1){
                                                                    tab.find('#zgpb_fld_col_style_maxwidth_st').prop('checked', true);    
                                                                    }else{
                                                                    tab.find('#zgpb_fld_col_style_maxwidth_st').prop('checked', false);    
                                                                    }
                                                                    break;
                                                                case 'max_width':
                                                                    tab.find('#zgpb_fld_col_style_maxwidth').val(opt4);
                                                                    break;
                                                                 
                                                            }
                                                          
                                                break;
                                            case 'margin':
                                                /*check if touchspin is enabled*/
                                                switch(String(opt3)) {
                                                                case 'top':
                                                                    tab.find('#zgpb_fld_col_margin_top').val(opt4);
                                                                    break;
                                                                case 'bottom':
                                                                    tab.find('#zgpb_fld_col_margin_bottom').val(opt4);
                                                                    break;
                                                                case 'left':
                                                                    tab.find('#zgpb_fld_col_margin_left').val(opt4);
                                                                    break;
                                                                case 'right':
                                                                    tab.find('#zgpb_fld_col_margin_right').val(opt4);
                                                                    break;    
                                                            }
                                                          
                                                break;
                                            case 'padding':
                                                  /*check if touchspin is enabled*/
                                                switch(String(opt3)) {
                                                                case 'top':
                                                                    tab.find('#zgpb_fld_col_padding_top').val(opt4);
                                                                    break;
                                                                case 'bottom':
                                                                    tab.find('#zgpb_fld_col_padding_bottom').val(opt4);
                                                                    break;
                                                                case 'left':
                                                                    tab.find('#zgpb_fld_col_padding_left').val(opt4);
                                                                    break;
                                                                case 'right':
                                                                    tab.find('#zgpb_fld_col_padding_right').val(opt4);
                                                                    break;    
                                                            }
                                                          
                                                break;
                                            case 'text':
                                                
                                                switch(String(opt3)) {
                                                                case 'color':
                                                                     tab.find('#zgpb_fld_col_text_color').parent().colorpicker('setValue',opt4);
                                                                     tab.find('#zgpb_fld_col_text_color').val(opt4);
                                                                    break;    
                                                            }
                                                break;
                                            case 'background':
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                        if(parseInt(opt4)===1){
                                                                         tab.find('#zgpb_fld_col_bg_st').bootstrapSwitchZgpb('state', true);
                                                                        }else{
                                                                         tab.find('#zgpb_fld_col_bg_st').bootstrapSwitchZgpb('state', false);    
                                                                        }
                                                                    break;
                                                                case 'type':
                                                                       switch (parseInt(opt4)) {
                                                                            case 2:
                                                                                tab.find('#zgpb_fld_col_bg_type_2').addClass('sfdc-active');
                                                                                //refresh option
                                                                                tab.find('#zgpb_fld_col_bg_type_1_cont').hide();
                                                                                tab.find('#zgpb_fld_col_bg_type_2_cont').show();
                                                                               
                                                                                break;
                                                                            case 1:
                                                                            default:
                                                                                tab.find('#zgpb_fld_col_bg_type_1').addClass('sfdc-active');
                                                                                //refresh option
                                                                                tab.find('#zgpb_fld_col_bg_type_1_cont').show();
                                                                                tab.find('#zgpb_fld_col_bg_type_2_cont').hide();
                                                                                break;    
                                                                        }
                                                                    break;
                                                              case 'cl_start_color':
                                                                       tab.find('#zgpb_fld_col_bg_clstartcolor').parent().colorpicker('setValue',opt4);
                                                                       tab.find('#zgpb_fld_col_bg_clstartcolor').val(opt4);   
                                                                    break;
                                                             case 'cl_end_color':
                                                                     tab.find('#zgpb_fld_col_bg_clendcolor').parent().colorpicker('setValue',opt4);
                                                                     tab.find('#zgpb_fld_col_bg_clendcolor').val(opt4);
                                                                    break;
                                                             case 'cl_solid_color':
                                                                     tab.find('#zgpb_fld_col_bg_clsolidcolor').parent().colorpicker('setValue',opt4);
                                                                     tab.find('#zgpb_fld_col_bg_clsolidcolor').val(opt4);   
                                                                    break;
                                                             case 'img_source':
                                                                     tab.find('#zgpb_fld_col_bg_imgsource').val(opt4);
                                                                     
                                                                     if(opt4){
                                                                         tab.find('#zgpb_fld_col_bg_srcimg_wrap').html("<img class='sfdc-img-thumbnail' src='"+opt4+"' />");
                                                                     }
                                                                     
                                                                    break;
                                                             case 'img_size_type':
                                                                     tab.find('#zgpb_fld_col_bg_sizetype').val(opt4);
                                                                     if(parseInt(opt4)===1 || parseInt(opt4)===2){
                                                                         $('#zgpb_fld_col_bg_sizetype_len_wrap').show();
                                                                     }else{
                                                                         $('#zgpb_fld_col_bg_sizetype_len_wrap').hide();
                                                                     }
                                                                    break;
                                                             case 'img_size_len':
                                                                     tab.find('#zgpb_fld_col_bg_sizetype_len').val(opt4);
                                                                    break;       
                                                             case 'img_repeat':
                                                                     tab.find('#zgpb_fld_col_bg_repeat').val(opt4);
                                                                    break;
                                                            case 'img_position':
                                                                     tab.find('#zgpb_fld_col_bg_pos').val(opt4);
                                                                    break;     
                                                            }
                                                break;
                                            case 'border':
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                        if(parseInt(opt4)===1){
                                                                        tab.find('#zgpb_fld_col_border_st').bootstrapSwitchZgpb('state', true);
                                                                        }else{
                                                                        tab.find('#zgpb_fld_col_border_st').bootstrapSwitchZgpb('state', false);    
                                                                        }
                                                                    break;
                                                                case 'type':
                                                                       switch (parseInt(opt4)) {
                                                                            case 2:
                                                                                tab.find('#zgpb_fld_col_border_type_2').addClass('sfdc-active');
                                                                                break;
                                                                            case 1:
                                                                            default:
                                                                                tab.find('#zgpb_fld_col_border_type_1').addClass('sfdc-active');
                                                                                break;    
                                                                        }
                                                                    break;
                                                              case 'color':
                                                                     tab.find('#zgpb_fld_col_border_color').parent().colorpicker('setValue',opt4);
                                                                     tab.find('#zgpb_fld_col_border_color').val(opt4);   
                                                                    break;
                                                             case 'width':
                                                                     tab.find('#zgpb_fld_col_border_width').val(opt4);
                                                                    
                                                                    break;        
                                                            }
                                                break; 
                                              case 'border_radius':
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                        if(parseInt(opt4)===1){
                                                                        tab.find('#zgpb_fld_col_bradius_st').bootstrapSwitchZgpb('state', true);
                                                                        }else{
                                                                        tab.find('#zgpb_fld_col_bradius_st').bootstrapSwitchZgpb('state', false);    
                                                                        }
                                                                    break;
                                                             case 'size':
                                                                     tab.find('#zgpb_fld_col_bradius_size').val(opt4);
                                                                    
                                                                     
                                                                    break;        
                                                            }
                                                break;
                                            case 'shadow':
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                        if(parseInt(opt4)===1){
                                                                        tab.find('#zgpb_fld_col_shadow_st').bootstrapSwitchZgpb('state', true);
                                                                        }else{
                                                                        tab.find('#zgpb_fld_col_shadow_st').bootstrapSwitchZgpb('state', false);    
                                                                        }
                                                                    break;
                                                             case 'color':
                                                                     //tab.find('#zgpb_fld_col_shadow_color').parent().colorpicker('setValue',opt4);
                                                                     tab.find('#zgpb_fld_col_shadow_color').val(opt4); 
                                                                    break;
                                                             case 'h_shadow':
                                                                     tab.find('#zgpb_fld_col_shadow_h').bootstrapSlider('setValue', parseInt(opt4));
                                                                    break;
                                                             case 'v_shadow':
                                                                     tab.find('#zgpb_fld_col_shadow_v').bootstrapSlider('setValue', parseInt(opt4));
                                                                    break;
                                                             case 'blur':
                                                                     tab.find('#zgpb_fld_col_shadow_blur').bootstrapSlider('setValue', parseInt(opt4));
                                                                    break;   
                                                            }
                                                break; 
                                           case 'custom_css':
                                                switch(String(opt3)) {
                                                             case 'ctm_id':
                                                                     //tab.find('#zgpb_fld_col_ctmid').val(opt4);  
                                                                    break;
                                                             case 'ctm_class':
                                                                     tab.find('#zgpb_fld_col_ctmclass').val(opt4);  
                                                                    break;
                                                             case 'ctm_additional':
                                                                     tab.find('#zgpb_fld_ctmaddt').val(opt4);  
                                                                    break;       
                                                            }
                                                break;     
                                        }
                                    break;     
                            }
                        }
                        
                        
                        
                        this.previewfield_maxwidth = function (f_obj) {
                             
                              //get all variables
                           var show_st,
                                max_width,
                                max_width_st;
                       
                            var cur_el_obj;
                             var cur_el_obj_str;
                             var all_values;
                             var hash_str_all_values;
                       
                            if(cur_blockmain_st){
                                //=settings.data
                                 
                                
                                show_st = settings['data']['main']['skin']['align']['show_st'],
                                max_width = settings['data']['main']['skin']['align']['max_width'],
                                max_width_st = settings['data']['main']['skin']['align']['max_width_st'];
                                
                        
                                all_values = settings['data']['main']['skin']['align'];
                                
                                cur_el_obj = f_obj.find('.sfdc-container-fluid');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid';
                                
                            }else{
                                
                            }   
                            
                            
                            //for hash purposes
                            hash_str_all_values = 'zgpb_'+settings.data.id+'_skin_align_'+cur_block_var;
                            
                            if(hash_check(hash_str_all_values,all_values)){
                                if($('#'+hash_str_all_values)){
                                    $('#'+hash_str_all_values).remove();
                                }
                                
                                if(parseInt(show_st)===1){
                                      
                                     var str_ouput='<style type="text/css" id="'+hash_str_all_values+'">';
                                      str_ouput+=cur_el_obj_str+' { ';
                                      //if(parseInt(max_width_st)===1){
                                            str_ouput+='max-width:'+max_width+'px; ';
                                      //  }   
                                    str_ouput+='margin-left: auto !important;';
                                    str_ouput+='margin-right: auto !important;';
                                    
                                    str_ouput+='} ';
                                    str_ouput+='</style>';
                                    
                                    $('head').append(str_ouput);
                                     
                                }           
                            }
                            
                        };
                        
                        this.setOptionsToPreview = function(vars){
                             
                            var f_obj = elem;
                            var block=opt1=vars['block'],
                                opt1=vars['opt1'],
                                opt2=vars['opt2'],
                                opt3=vars['opt3'],
                                opt4=vars['opt4'];
                        
                                 cur_blockmain_st=true;
                                 cur_block_var =0;
                                if(parseInt(block)>0){
                                    cur_blockmain_st=false;
                                    cur_block_var = parseInt(block);
                                    
                                }
                               
                            switch(String(opt1)) {
                                
                               case 'skin':
                                    switch(String(opt2)) {
                                            case 'align':
                                                switch(String(opt3)) {
                                                                case 'show_st':
                                                                case 'max_width':
                                                                case 'max_width_st':
                                                                    this.previewfield_maxwidth(f_obj);
                                                                    break;    
                                                            }
                                                       
                                                break;
                                        
                                            case 'margin':
                                                switch(String(opt3)) {
                                                                case 'top':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('margin-top',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('margin-top',opt4+'px');
                                                                    }
                                                                     
                                                                    break;
                                                                case 'bottom':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('margin-bottom',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('margin-bottom',opt4+'px');
                                                                    }
                                                                    break;
                                                                case 'left':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('margin-left',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('margin-left',opt4+'px');
                                                                    }
                                                                    break;
                                                                case 'right':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('margin-right',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('margin-right',opt4+'px');
                                                                    }
                                                                    break;    
                                                            }
                                                       
                                                break;
                                            case 'padding':
                                                    switch(String(opt3)) {
                                                                case 'top':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('padding-top',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('padding-top',opt4+'px');
                                                                    }
                                                                    
                                                                    break;
                                                                case 'bottom':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('padding-bottom',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('padding-bottom',opt4+'px');
                                                                    }
                                                                    break;
                                                                case 'left':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('padding-left',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('padding-left',opt4+'px');
                                                                    }
                                                                    break;
                                                                case 'right':
                                                                    if(cur_blockmain_st){
                                                                        f_obj.find('>.sfdc-container-fluid').css('padding-right',opt4+'px');
                                                                    }else{
                                                                        //blocks
                                                                        f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] > .zgpb-fl-gs-block-inner').css('padding-right',opt4+'px');
                                                                    }
                                                                    break;    
                                                            }
                                                break;
                                            case 'text':
                                                switch(String(opt3)) {
                                                                case 'color':
                                                                    
                                                                     if(cur_blockmain_st){
                                                                        f_obj.find('.sfdc-container-fluid').css('color',opt4);
                                                                    }else{
                                                                        //blocks
                                                                       f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+block+'"] >.zgpb-fl-gs-block-inner').css('color',opt4);
                                                                    }
                                                                    
                                                                    break;    
                                                            }
                                                break;
                                            case 'background':
                                                skin_preview_background(f_obj);
                                                break;
                                            case 'border':
                                                skin_preview_border(f_obj);
                                                break;
                                            case 'border_radius':
                                                skin_preview_border_radius(f_obj);
                                                break;
                                            case 'shadow':
                                                skin_preview_shadow(f_obj);
                                                break;     
                                        }
                                    break;     
                            }
                        }
                        
                        var skin_preview_shadow = function(f_obj){
                            //get all variables
                           var show_st,
                                color,
                                h_shadow,
                                v_shadow,
                                blur;
                       
                       var cur_el_obj;
                        var cur_el_obj_str;
                        var all_values;
                        var hash_str_all_values;
                       
                            if(cur_blockmain_st){
                                //=settings.data
                                
                                show_st = settings['data']['main']['skin']['shadow']['show_st'],
                                color = settings['data']['main']['skin']['shadow']['color'],
                                h_shadow = settings['data']['main']['skin']['shadow']['h_shadow'],
                                v_shadow = settings['data']['main']['skin']['shadow']['v_shadow'],
                                blur = settings['data']['main']['skin']['shadow']['blur'];
                        
                                all_values = settings['data']['main']['skin']['shadow'];
                                cur_el_obj = f_obj.find('.sfdc-container-fluid');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid';
                                
                            }else{
                                //blocks
                                 
                                show_st = settings['data']['blocks'][cur_block_var]['skin']['shadow']['show_st'],
                                color = settings['data']['blocks'][cur_block_var]['skin']['shadow']['color'],
                                h_shadow = settings['data']['blocks'][cur_block_var]['skin']['shadow']['h_shadow'],
                                v_shadow = settings['data']['blocks'][cur_block_var]['skin']['shadow']['v_shadow'],
                                blur = settings['data']['blocks'][cur_block_var]['skin']['shadow']['blur'];
                                
                        
                                all_values = settings['data']['blocks'][cur_block_var]['skin']['shadow'];
                                cur_el_obj = f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid > .sfdc-row > .zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner';
                            }   
                       
                            //for hash purposes
                            hash_str_all_values = 'zgpb_'+settings.data.id+'_skin_shadow_'+cur_block_var;
                            
                            if(hash_check(hash_str_all_values,all_values)){
                                if($('#'+hash_str_all_values)){
                                    $('#'+hash_str_all_values).remove();
                                }
                                
                                if(parseInt(show_st)===1){
                                    var style;
                                     var str_ouput='<style type="text/css" id="'+hash_str_all_values+'">';
                                      str_ouput+=cur_el_obj_str+' { ';
                                   style=h_shadow+'px '+v_shadow+'px '+blur+'px '+color;
                                    str_ouput+='box-shadow:'+style+';'; 
                                    
                                    str_ouput+='} ';
                                    str_ouput+='</style>';
                                    $('head').append(str_ouput);
                                     
                                }           
                            }
                        }
                        
                        var skin_preview_border_radius = function(f_obj){
                            //get all variables
                           var show_st,  
                               size;
                       
                       var cur_el_obj;
                        var cur_el_obj_str;
                        var all_values;
                        var hash_str_all_values;
                       
                            if(cur_blockmain_st){
                                //=settings.data
                                
                                show_st = settings['data']['main']['skin']['border_radius']['show_st'],
                                size = settings['data']['main']['skin']['border_radius']['size'];
                        
                                all_values = settings['data']['main']['skin']['border_radius'];
                                cur_el_obj = f_obj.find('.sfdc-container-fluid');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid';
                                
                            }else{
                                //blocks
                                show_st = settings['data']['blocks'][cur_block_var]['skin']['border_radius']['show_st'],
                                size = settings['data']['blocks'][cur_block_var]['skin']['border_radius']['size'];
                                
                        
                                all_values = settings['data']['blocks'][cur_block_var]['skin']['border_radius'];
                                cur_el_obj = f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner');
                                cur_el_obj_str = '#'+settings.data.id+' .zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner';
                            }   
                       
                            //for hash purposes
                            hash_str_all_values = 'zgpb_'+settings.data.id+'_skin_borderradius_'+cur_block_var;
                            
                            if(hash_check(hash_str_all_values,all_values)){
                                if($('#'+hash_str_all_values)){
                                    $('#'+hash_str_all_values).remove();
                                }
                                
                                if(parseInt(show_st)===1){
                                    
                                     var str_ouput='<style type="text/css" id="'+hash_str_all_values+'">';
                                      str_ouput+=cur_el_obj_str+' { ';
                                   
                                    str_ouput+='border-radius:'+size+'px;'; 
                                    
                                    str_ouput+='} ';
                                    str_ouput+='</style>';
                                    $('head').append(str_ouput);
                                     
                                }           
                            }
                        }
                        
                        var skin_preview_border = function(f_obj){
                            //get all variables
                           var show_st,  
                               color,
                               color_focus_st,
                               color_focus,
                               type,
                               width;
                       
                       var cur_el_obj;
                        var cur_el_obj_str;
                        var all_values;
                        var hash_str_all_values;
                       
                            if(cur_blockmain_st){
                                //=settings.data
                                
                                show_st = settings['data']['main']['skin']['border']['show_st'],
                                color = settings['data']['main']['skin']['border']['color'],
                                color_focus_st = settings['data']['main']['skin']['border']['color_focus_st'],
                                color_focus = settings['data']['main']['skin']['border']['color_focus'],
                                type = settings['data']['main']['skin']['border']['type'],
                                width = settings['data']['main']['skin']['border']['width'];
                        
                                all_values = settings['data']['main']['skin']['border'];
                                cur_el_obj = f_obj.find('.sfdc-container-fluid');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid';
                                
                            }else{
                                //blocks
                                show_st = settings['data']['blocks'][cur_block_var]['skin']['border']['show_st'],
                                color = settings['data']['blocks'][cur_block_var]['skin']['border']['color'],
                                color_focus_st = settings['data']['blocks'][cur_block_var]['skin']['border']['color_focus_st'],
                                color_focus = settings['data']['blocks'][cur_block_var]['skin']['border']['color_focus'],
                                type = settings['data']['blocks'][cur_block_var]['skin']['border']['type'],
                                width = settings['data']['blocks'][cur_block_var]['skin']['border']['width'];
                        
                                all_values = settings['data']['blocks'][cur_block_var]['skin']['border'];
                                cur_el_obj = f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner');
                                cur_el_obj_str = '#'+settings.data.id+' .zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner';
                            }   
                       
                            //for hash purposes
                            hash_str_all_values = 'zgpb_'+settings.data.id+'_skin_border_'+cur_block_var;
                            
                            if(hash_check(hash_str_all_values,all_values)){
                                if($('#'+hash_str_all_values)){
                                    $('#'+hash_str_all_values).remove();
                                }
                                
                                var border_sty;
                                if(parseInt(show_st)===1){
                                    
                                     var str_ouput='<style type="text/css" id="'+hash_str_all_values+'">';
                                      str_ouput+=cur_el_obj_str+' { ';
                                    
                                    border_sty=width+'px';
                                    if(parseInt(type)===1){
                                    border_sty+=' solid ';
                                    }else{
                                    border_sty+=' dotted ';    
                                    }
                                    border_sty+=color;
                                    str_ouput+='border:'+border_sty+';'; 
                                    
                                    str_ouput+='} ';
                                    str_ouput+='</style>';
                                    $('head').append(str_ouput);
                                     
                                }
                                
                                        
                            }
                       
                        }
                        
                        // Private method - can only be called from within this object
                        var skin_preview_background = function(f_obj){
                            //get all variables
                           var show_st,
                                type,
                                cl_start_color,
                                cl_end_color,
                                cl_solid_color,
                                img_source,
                                img_repeat,
                                img_position,
                                img_attachment,
                                img_scale,
                                img_overlay_color,
                                img_overlay_opacity,
                                img_size_type,
                                img_size_len,
                                opacity;
                       
                                //cl_start_color = settings['data']['main']['skin']['show_st'];
                        var cur_el_obj;
                        var cur_el_obj_str;
                        var all_values;
                        var hash_str_all_values;
                          if(cur_blockmain_st){
                                //=settings.data
                                
                                show_st = settings['data']['main']['skin']['background']['show_st'],
                                type = settings['data']['main']['skin']['background']['type'],
                                cl_start_color = settings['data']['main']['skin']['background']['cl_start_color'],
                                cl_end_color = settings['data']['main']['skin']['background']['cl_end_color'],
                                cl_solid_color = settings['data']['main']['skin']['background']['cl_solid_color'],
                                img_source = settings['data']['main']['skin']['background']['img_source'],
                                img_repeat = settings['data']['main']['skin']['background']['img_repeat'],
                                img_position = settings['data']['main']['skin']['background']['img_position'],
                                img_attachment = settings['data']['main']['skin']['background']['img_attachment'],
                                img_scale = settings['data']['main']['skin']['background']['img_scale'],
                                img_overlay_color = settings['data']['main']['skin']['background']['img_overlay_color'],
                                img_overlay_opacity = settings['data']['main']['skin']['background']['img_overlay_opacity'],
                                img_size_type = settings['data']['main']['skin']['background']['img_size_type'],
                                img_size_len = settings['data']['main']['skin']['background']['img_size_len'],
                                opacity = settings['data']['main']['skin']['background']['opacity'];
                                all_values = settings['data']['main']['skin']['background'];
                                
                                cur_el_obj = f_obj.find('.sfdc-container-fluid');
                                cur_el_obj_str = '#'+settings.data.id+' > .sfdc-container-fluid';
                            }else{
                                //blocks
                                show_st = settings['data']['blocks'][cur_block_var]['skin']['background']['show_st'],
                                type = settings['data']['blocks'][cur_block_var]['skin']['background']['type'],
                                cl_start_color = settings['data']['blocks'][cur_block_var]['skin']['background']['cl_start_color'],
                                cl_end_color = settings['data']['blocks'][cur_block_var]['skin']['background']['cl_end_color'],
                                cl_solid_color = settings['data']['blocks'][cur_block_var]['skin']['background']['cl_solid_color'],
                                img_source = settings['data']['blocks'][cur_block_var]['skin']['background']['img_source'],
                                img_repeat = settings['data']['blocks'][cur_block_var]['skin']['background']['img_repeat'],
                                img_position = settings['data']['blocks'][cur_block_var]['skin']['background']['img_position'],
                                img_attachment = settings['data']['blocks'][cur_block_var]['skin']['background']['img_attachment'],
                                img_scale = settings['data']['blocks'][cur_block_var]['skin']['background']['img_scale'],
                                img_overlay_color = settings['data']['blocks'][cur_block_var]['skin']['background']['img_overlay_color'],
                                img_overlay_opacity = settings['data']['blocks'][cur_block_var]['skin']['background']['img_overlay_opacity'],
                                img_size_type = settings['data']['main']['skin']['background']['img_size_type'],
                                img_size_len = settings['data']['main']['skin']['background']['img_size_len'],
                                opacity = settings['data']['blocks'][cur_block_var]['skin']['background']['opacity'];
                                all_values = settings['data']['blocks'][cur_block_var]['skin']['background'];
                                cur_el_obj = f_obj.find('.zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner');
                                cur_el_obj_str = '#'+settings.data.id+' .zgpb-fl-gs-block-style[data-zgpb-blocknum="'+cur_block_var+'"] >.zgpb-fl-gs-block-inner';
                            }
                            
                            //for hash purposes
                            hash_str_all_values = 'zgpb_'+settings.data.id+'_skin_background_'+cur_block_var;
                          
                            if(hash_check(hash_str_all_values,all_values)){
                                if($('#'+hash_str_all_values)){
                                    $('#'+hash_str_all_values).remove();
                                }
                                
                                if(parseInt(show_st)===1){
                                    
                                     var str_ouput='<style type="text/css" id="'+hash_str_all_values+'">';
                                      str_ouput+=cur_el_obj_str+' { ';
                                    
                                    switch (parseInt(type)) {
                                         case 2:
                                             //gradient
                                             
                                                if(cl_start_color && cl_end_color){
                                                    str_ouput+='background-color:'+cl_start_color+';'; 
                                                    str_ouput+='background-image:'+"-webkit-linear-gradient(top, "+cl_start_color+", "+cl_end_color+")"+';';
                                                    str_ouput+='background-image:'+"-moz-linear-gradient(top, "+cl_start_color+", "+cl_end_color+")"+';';
                                                    str_ouput+='background-image:'+"-ms-linear-gradient(top, "+cl_start_color+", "+cl_end_color+")"+';';
                                                    str_ouput+='background-image:'+"-o-linear-gradient(top, "+cl_start_color+", "+cl_end_color+")"+';';
                                                    str_ouput+='background-image:'+"linear-gradient(to bottom, "+cl_start_color+","+cl_end_color+")"+';';
                                                }  
                                             break; 
                                         case 1:
                                         default:
                                             //solid
                                           
                                              if(cl_solid_color){
                                                    str_ouput+='background-color:'+cl_solid_color+';';    
                                                }
                                             
                                         break;
                                     } 
                                     
                                     if(img_source){
                                         str_ouput+='background-image: url("'+img_source+'");';
                                         
                                     }
                                     
                                     var tmp_bg_str;
                                     /*background size*/
                                     switch(parseInt(img_size_type)){
                                         case 1:
                                             //length
                                             tmp_bg_str=img_size_len;
                                             break;
                                         case 2:
                                             //percentage
                                             tmp_bg_str=img_size_len;
                                             break;    
                                         case 3:
                                             //cover
                                             tmp_bg_str='cover';
                                             break;     
                                         case 4:
                                             //contain
                                             tmp_bg_str='contain';
                                             break;
                                         case 5:
                                             //initial
                                             tmp_bg_str='initial';
                                             break;
                                         case 6:
                                             //inherit
                                             tmp_bg_str='inherit';
                                             break;    
                                         case 0:
                                         default:
                                            //auto
                                             tmp_bg_str='auto';
                                            break;
                                     }
                                     str_ouput+='background-size: '+tmp_bg_str+';';
                                     
                                     /*background repeat*/
                                       switch(parseInt(img_repeat)){
                                         case 1:
                                             //repeat-x
                                             tmp_bg_str='repeat-x';
                                             break;
                                         case 2:
                                             //repeat-y
                                             tmp_bg_str='repeat-y';
                                             break;    
                                         case 3:
                                             //no-repeat
                                             tmp_bg_str='no-repeat';
                                             break;     
                                         case 4:
                                             //initial
                                             tmp_bg_str='initial';
                                             break;
                                         case 5:
                                             //inherit
                                             tmp_bg_str='inherit';
                                             break;
                                         case 0:
                                         default:
                                            //repeat
                                             tmp_bg_str='auto';
                                            break;
                                     }
                                     str_ouput+='background-repeat: '+tmp_bg_str+';';
                                     
                                     /*background position*/
                                     str_ouput+='background-position: '+img_position+';';
                                     
                                     
                                        str_ouput+='} ';
                                        str_ouput+='</style>';
                                        $('head').append(str_ouput);
                                     
                                 }
                                
                            }
                             
                        };
                        
                        
                        /* check hash and refresh preview once*/
                        var hash_check=function(opt_str_hash,all_values){
                             var hash_str_all_values = opt_str_hash;
                            
                            var valhash = CryptoJS.MD5(JSON.stringify(all_values));
                          
                            var f_checkhash = getInnerVariable(hash_str_all_values);
                             
                            if(String(f_checkhash)===String(valhash)  ){
                                
                                return false;
                            }else{
                                //update check hash to avoid refresh preview again
                                 setInnerVariable(hash_str_all_values,CryptoJS.MD5(JSON.stringify(all_values))) ;
                                return true;
                               
                            }
                        }
                        
                        this.updateVarData=function(id){
                            $('#'+id).data('zgpb-settings',settings);
                        }
                        this.update_previewfield=function(id_element){
                            var obj_field= $('#'+id_element);
                            if(obj_field){
                                
                                this.enableSettingOptions_process(settings.data,false,true,null);
                                
                            //zgpb_front.loadForm_updatePreviewField(id_element,settings.data);
                            }
                        }
                        this.setToDatalvl1=function(option,value){
                            settings.data[option]=value;
                        }
                        
                        this.setFieldName=function(id){
                            settings.data['field_name']=settings.data['type_n']+id;
                        }
                        this.setStep=function(step){
                            field_step=step;
                        }
                        this.setDataToCoreStore =function(step_pane,id){
                            //set to main array
                            
                           rocketform.setUiData3('steps_src',step_pane,id,settings.data);
                            
                            
                        }
                        
                        this.update_settingsData =function(options){
                          
                          var settings2;
                          //check if data object has object in it
                          if (options.hasOwnProperty("data")) {
                                settings2 = $.extend(true,{}, settings, options); 
                            }
                            else {
                                settings2 = $.extend(true,{}, settings, {data:options}); 
                            }
                          
                          var settings3 = uifm_validate_field(settings2,settings);
                          //updating
                          settings = settings3;
                              
                        }
                        
                        this.createBlockAttributes =function(){
                            var num_blocks=settings.data.type;
                             
                            var tmp_new_block={}
                            switch(parseInt(num_blocks)){
                                case 1:
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    break;
                                case 2:
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[2]=$.extend(true,{},tmp_init_data);
                                    break;
                                case 3:
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[2]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[3]=$.extend(true,{},tmp_init_data);
                                    break;
                                case 4:
                                    //four
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[2]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[3]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[4]=$.extend(true,{},tmp_init_data);
                                    break;
                                case 5:
                                    //six
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[2]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[3]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[4]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[5]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[6]=$.extend(true,{},tmp_init_data);
                                    break;
                                case 6:
                                    //doce
                                    tmp_new_block[1]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[2]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[3]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[4]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[5]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[6]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[7]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[8]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[9]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[10]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[11]=$.extend(true,{},tmp_init_data);
                                    tmp_new_block[12]=$.extend(true,{},tmp_init_data);
                                    break;    
                            }
                           
                            settings.data.main=$.extend(true,{},tmp_init_data);
                            settings.data.blocks=tmp_new_block;
                             
                        }
                        
                        this.setDataToCore =function(tmp_vars){
                            
                            var id=tmp_vars['id'],
                                block=tmp_vars['block'],
                                f_opt1=tmp_vars['opt1'],
                                f_opt2=tmp_vars['opt2'],
                                f_opt3=tmp_vars['opt3'],
                                f_opt4=tmp_vars['opt4'];
                               
                              if(parseInt(block)>0){
                                  var block_index=parseInt(block);
                                  rocketform.setUiData8('steps_src',field_step,String(id),'blocks',block_index,String(f_opt1),String(f_opt2),String(f_opt3),f_opt4);
                              }else{
                                   
                                  rocketform.setUiData7('steps_src',field_step,String(id),'main',String(f_opt1),String(f_opt2),String(f_opt3),f_opt4);
                              }
                              
                        }
                        
                        this.enableSettingOptions_process =function(f_data,update_modal,update_preview,addt){
                          
                           if(update_modal){ 
                                /*loading events*/
                               var tab=$('#uifm-field-opt-content');
                                rocketform.fields2_events_bswitch(tab);
                                rocketform.fields2_events_groupbtn(tab);
                                rocketform.fields2_events_cpicker(tab);
                                 rocketform.fields2_events_spinner(tab);
                                rocketform.fields2_events_bgimages(tab);
                                 rocketform.fields2_events_slider(tab);
                                rocketform.fields2_events_txts(tab);
                                 rocketform.fields2_events_general();
                                
                            }
                           
                            
                           var tmp_vars;
                           
                           var block=(addt)?addt['block']:0;
                                    
                                var cur_blockmain_st=true;
                                if(parseInt(block)>0){
                                    cur_blockmain_st=false; 
                                } 
                            
                            //show align box
                            
                            if(cur_blockmain_st){
                                $('#zgpb_fld_col_style_wrapper').show();
                            }else{
                                $('#zgpb_fld_col_style_wrapper').hide();
                            }
                            
                            
                            
                             //update field name
                             var fldname=settings.data['field_name']||'';
                            if(cur_blockmain_st){
                               
                                 if(fldname){
                                    $('#uifm_fld_main_fldname').val(fldname);
                                }
                            }else{
                                var str_col= $('#zgfm-field-col-fldname-lbl-bl2').html();
                                $('#zgfm-field-col-fldname-lbl-bl1').html(fldname+' - ');
                            }
                            
                            
                            $.each(f_data, function(index3, value3) {
                                    if($.isPlainObject(value3)){
                                                 $.each(value3, function(index4, value4) {
                                                        if($.isPlainObject(value4)){
                                                            $.each(value4, function(index5, value5) {
                                                                    if($.isPlainObject(value5)){
                                                                        $.each(value5, function(index6, value6) {
                                                                                if($.isPlainObject(value6)){
                                                                                    $.each(value6, function(index7, value7) {
                                                                                        
                                                                                        tmp_vars=[];
                                                                                       
                                                                                        if(String(index3)==='main'){
                                                                                             tmp_vars['block']=0;
                                                                                        }else{
                                                                                            tmp_vars['block']=parseInt(index4);
                                                                                        }
                                                                                         
                                                                                        tmp_vars['opt1']=index5;
                                                                                        tmp_vars['opt2']=index6;
                                                                                        tmp_vars['opt3']=index7;
                                                                                        tmp_vars['opt4']=value7;
                                                                                      
                                                                                        
                                                                                        if(cur_blockmain_st===false && String(index3)==='blocks' && parseInt(block)===parseInt(index4)){
                                                                                            if(update_modal){
                                                                                                 obj_main.setOptionsToModal(tmp_vars);
                                                                                            }
                                                                                        } 
                                                                                        
                                                                                        if(update_preview){
                                                                                            //preview
                                                                                             obj_main.setOptionsToPreview(tmp_vars);
                                                                                        }
                                                                                        

                                                                                    });
                                                                                }else{
                                                                                   if(String(index3)==='main'){
                                                                                       tmp_vars=[];
                                                                                        tmp_vars['block']=0;
                                                                                        tmp_vars['opt1']=index4;
                                                                                        tmp_vars['opt2']=index5;
                                                                                        tmp_vars['opt3']=index6;
                                                                                        tmp_vars['opt4']=value6;     
                                                                                        
                                                                                        if(cur_blockmain_st===true){
                                                                                             if(update_modal){
                                                                                                
                                                                                                  obj_main.setOptionsToModal(tmp_vars);
                                                                                             }
                                                                                        } 
                                                                                        
                                                                                        
                                                                                        if(update_preview){
                                                                                            //preview
                                                                                             obj_main.setOptionsToPreview(tmp_vars);
                                                                                        }
                                                                                  
                                                                                    }  
                                                                                }
                                                                                
                                                                                 
                                                                                
                                                                                
                                                                         });
                                                                    }
                                                             });
                                                        }
                                                 });    
                                            }else{
                                                 
                                            }  
                                      
                                     
                                 
                            });
                            
                            
                            //process finished and updating variable
                            //field_onprocess = false;
                           
                        }
                        
                        
                        this.showSettingTab= function(id_element) {
                            
                            var idselected= $('#uifm-field-selected-id').val();
                            if(String(idselected)!=String(id_element)){
                                //cleaning setting tab
                                rocketform.cleanSettingTab();
                               var clvars = [
                                    '.uifm-set-section-fieldname'
                                    ,'.uifm-tab-fld-input'
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
                            
                            //rocketform.checkScrollTab();
                              
			}
                        
                        this.enableSettingOptions =function(f_data,addt){
                            
                             /*show tabs according to field- this line will be removed soon*/   
                             this.showSettingTab();
                            
                            
                            this.enableSettingOptions_process(f_data,true,true,addt);
                            
                            
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
                                  
			this.getOnProcessStatus=function(){
                            return field_onprocess;
                        }
                        
                        this.setVariables=function($vars){
                            field_oncreation=$vars['oncreation']||false;
                           // field_onprocess=$vars['onprocess']||false;
                        }
                        
                        
        };
        
        $.fn.zgpbld_gridsystem = function(options){
            return this.each(function(){
            var element = $(this);

            // Return early if this element already has a plugin instance
            if (element.data('zgpbld_gridsystem')) return;

            // pass options to plugin constructor
            var myplugin = new zgpbld_gridsystem(this, options);

            // Store plugin object in this element's data
            element.data('zgpbld_gridsystem', myplugin);
            });
        };
})($uifm);

