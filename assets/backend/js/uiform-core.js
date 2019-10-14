;if(typeof($uifm) === 'undefined') {
	$uifm = jQuery;
}
var uiform_is_dragging = false;
var uiform_is_children = false;
var rocketform= rocketform || null;

if(!$uifm.isFunction(rocketform)){
(function($, window) {
window.rocketform = rocketform = $.rocketform = function(){
    /* main form data*/
    var uifmvariable = [];
    uifmvariable.innerVars = {};
    uifmvariable.setfield_tab_active = '';
    uifmvariable.fields_flag_stored = [];
    
    var mainrformb = {
                        app_ver:'1.6.3',
                        main: {
                            submit_ajax:'1',
                            add_css:'',
                            add_js:'',
                            onload_scroll:'0',
                            preload_noconflict:'1',
                            pdf_charset:'UTF-8',
                            pdf_font:"2",
                            pdf_paper_size:"a4",
                            pdf_paper_orie:"landscape",
                            pdf_html_fullpage:"0",
                            email_html_fullpage:"0"
                        },
                        skin: {
                            form_width:{
                                show_st:'0',
                                max:'800'
                            },
                            form_padding:{
                                show_st:'1',
                                pos_top:'20',
                                pos_right:'17',
                                pos_bottom:'20',
                                pos_left:'17'
                            },
                            form_background:{
                                show_st:'1',
                                type:'1',
                                start_color:'#eeeeee',
                                end_color:'#ffffff',
                                solid_color:'#ffffff',
                                image:''
                            },
                            form_border_radius:{
                                show_st:'0',
                                size:'5'
                            },
                            form_border:{
                               show_st:'0',  
                               color:'#000',
                               style:'1',
                               width:'1'
                            },
                            form_shadow:{
                                show_st:'1',
                                color:'#CCCCCC',
                                h_shadow:'3',
                                v_shadow:'3',
                                blur:'10'
                            }
                        },
                        wizard:{
                            enable_st:'0',
                            theme_type:0,
                            theme:{
                                0:{ skin_tab_cur_bgcolor:'#4798E7',
                                    skin_tab_cur_txtcolor:'#ffffff',
                                    skin_tab_cur_numtxtcolor:'#4798E7',
                                    skin_tab_inac_bgcolor:'#ECF0F1',
                                    skin_tab_inac_txtcolor:'#95A5A6',
                                    skin_tab_inac_numtxtcolor:'#ECF0F1',
                                    skin_tab_done_bgcolor:'#9a8afa',
                                    skin_tab_done_txtcolor:'#ffffff',
                                    skin_tab_done_numtxtcolor:'#ECF0F1',
                                    skin_tab_cont_bgcolor:'#F9F9F9',
                                    skin_tab_cont_borcol:'#D4D4D4'
                                  },
                                1:{
                                   skin_tab_cur_bgcolor:'#4798E7',
                                   skin_tab_cur_txtcolor:'#000000',
                                   skin_tab_cur_numtxtcolor:'#4798E7',
                                   skin_tab_cur_bg_numtxt:'#ffffff',
                                   skin_tab_inac_bgcolor:'#cccccc',
                                   skin_tab_inac_txtcolor:'#95A5A6'
                                }
                            } 
                        },
                        onsubm:{
                            sm_successtext:'<div class="rockfm-alert rockfm-alert-success" role="alert">Success! Form was sent successfully.</div>',
                            sm_boxmsg_bg_st:'0',
                            sm_boxmsg_bg_type:'1',
                            sm_boxmsg_bg_solid: "",
                            sm_boxmsg_bg_start: "",
                            sm_boxmsg_bg_end: "",
                            sm_redirect_st: "0",
                            sm_redirect_url: "",
                            mail_from_email:"",
                            mail_from_name:"",
                            mail_template_msg: "",
                            mail_recipient: "",
                            mail_cc: "",
                            mail_bcc: "",
                            mail_subject: "",
                            mail_usr_st: "0",
                            mail_usr_template_msg: "",
                            mail_usr_pdf_st: "0",
                            mail_usr_pdf_store: "0",
                            mail_usr_pdf_template_msg: "",
                            mail_usr_pdf_fn:"",
                            mail_usr_recipient: "",
                            mail_usr_recipient_name: "",
                            mail_usr_cc: "",
                            mail_usr_bcc: "",
                            mail_usr_subject: ""
                        },
                        num_tabs:1,
                        steps: {
                                tab_title:[],
                                tab_cont:[]  
                        },
                        steps_src:[]
                    };
  
     
    function initialize() {
       enableDraggableItems();
       enableSortableItems();
    }
    
    arguments.callee.backend_init_load = function() {
        initialize();
    };
    
    function enableDraggableItems(){
        $( "ul.uiform-list-fields a" ).draggable({
        connectToSortable: ".uiform-items-container",
        helper: "clone",
        revert: "invalid",
        distance: 0,
        cursorAt: { top: 20, left: 10 },
        cursor: 'move',
        handle:'.sfdc-btn1-icon-left',
        appendTo: '.uiform-main-form',
        drag: function( event, ui ) {
          
        }
        }).disableSelection();
    }
   
    function enableSortableItems(){
     $(".uiform-items-container").sortable({
            placeholder: 'uiform-draggable-placeholder',
            connectWith: ".uiform-items-container",
            revert: false,
             
            helper: function (event, item) 
		{
                        var field_type = $(item).attr('data-typefield');
                        var tmp_text=$('.uiform-builder-fields').first().find('a[data-type="'+field_type+'"]').html();
                        return $('<div class="zgpb-draggable-helper" style="width: 130px; height: 35px;">'+tmp_text+'</div>');
		},
            handle: '.uiform-field-move',
            sort: function(event, ui) {
               if(typeof ui.placeholder === 'undefined') {
			 return;
		 }
                 
                //ui.placeholder.html('testing ...'); 
            },
            receive: function(event, ui) {
               
               var field_type = ui.item.data('type');
              
              //verify if field was not created
               if(!ui.item.attr('id')){
               uiform_is_dragging = false;
               rocketform.showLoader(1,true,true);
               rocketform.getFieldsAfterDraggable(this,field_type,false,'');    
               } 
               
            },
            stop: function (event, ui) {
                   /*remove helper when finish drag*/
                if($('#zgpb-editor-container').find('.zgpb-draggable-helper').length){
                   $('#zgpb-editor-container').find('.zgpb-draggable-helper').remove();
               }
                if($('#zgpb-editor-container').find('.zgpb-fl-gs-block-style-hover').length){
                   $('#zgpb-editor-container').find('.zgpb-fl-gs-block-style-hover').removeClass('zgpb-fl-gs-block-style-hover');
                }
               
                
                //check if only is dragged and moved
                if(uiform_is_dragging===true){
                    rocketform.hideLoader();
                    //verify if fields is inside grid
                    if(uiform_is_children===true){
                        $(window).trigger('resize');
                    }
                     
                }
                
            },
            start: function (e, ui) {
              uiform_is_dragging = true;
              uiform_is_children=false;
              var id_field = ui.item.attr('id');
              //rocketform.guidedtour_showTextOnPreviewPane(false);
             
              //check if field is inside grid
              /*if (parseInt($('#'+ui.item.attr('id')).parents('.uiform-grid-inner-col').length)!=0) {
                        uiform_is_children=true;
                        $(window).trigger('resize');
                    }*/
			        //ui.placeholder.html('<span/>');
	    },
            tolerance: 'pointer',
            opacity: 0.5
        });
    }
    
    function enableDroppableItems(){
      $( "#uiform-items-container div" ).droppable({
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        accept: ".uiform-draggable-field",
        drop: function( event, ui ) {
           
           return;
            $( this ).addClass( "ui-state-highlight" );
            if($(ui.draggable).hasClass('uiform-draggable-field'))
                $( ui.draggable ).clone().appendTo( this );
            else
                $( ui.draggable ).appendTo( this );
                
            
        }
    });
    
    
    //$( ".dragPlace" ).disableSelection();
        /*$uifm( ".uiform-fieldset-inner .uiform-field" ).each(function(){
           $uifm(this).draggable({
               connectToSortable: "#sortable",
                helper: "clone"
            });
        });*/  
    }
    arguments.callee.setInnerVariable = function(name, value) {
                uifmvariable.innerVars[name] = value;
            };
    arguments.callee.getInnerVariable = function(name) {
                if (uifmvariable.innerVars[name]) {
                    return uifmvariable.innerVars[name];
                } else {
                    return '';
                }
            };
    arguments.callee.generateUniqueID = function () {
                var number = Math.random() // 0.9394456857981651
                number.toString(36); // '0.xtis06h6'
                var id = number.toString(36).substr(2, 9); // 'xtis06h6'
                return id;
             };
    arguments.callee.generateSuffixID = function (min,max) {
                return Math.floor(Math.random()*(max-min+1)+min);
             };         
    /*temp*/         
    arguments.callee.setUiVar = function(name, value) {
                uivars[name] = value;
            };         
    arguments.callee.setUiArray = function(name,id,value) {
                uivars[name][id] = value;
            };
    arguments.callee.getUiArray = function(name,id) {
                return uivars[name][id];
            };
    arguments.callee.getUiVar = function(name) {
                return uivars[name];
            };
    arguments.callee.getFieldById = function(id) {
                return uivars['fields'][id]
            };        
    arguments.callee.getFieldArray = function(id,name) {
                return uivars['fields'][id][name];
            };
    /* end temp*/
    arguments.callee.showLoader = function(type,is_loading,is_fading) {
                switch(parseInt(type)){
                    case 2:
                        /*processing*/
                        rocketform.alerts_msg(3,$('#alert_header_msg_processing').val());
                        break;
                    case 3:
                        /*saving*/
                        rocketform.alerts_msg(1,$('#alert_header_saving').val());
                        break;    
                    case 4:
                        /*removing*/
                        rocketform.alerts_msg(3,$('#alert_header_msg_removing').val());
                        break;
                    case 5:
                        /*form saved*/
                        rocketform.alerts_msg(1,$('#alert_header_form_saved').val());
                        break;     
                    case 1:
                    default:
                        /*loading*/
                        rocketform.alerts_msg(2,$('#alert_header_loading').val());
                        break;
                }
                
                  //is loading
                if(is_loading){
                    $('#uifm-loading-box').find('.sfdc-alert').append(' <span class="uifm-loader-header-1"></span>');
                }else{
                    $('#uifm-loading-box').find('.uifm-loader-header-1').remove();
                }
                
                //is fading
                if(is_fading){
                    $("#uifm-loading-box").fadeTo(2000, 500).slideUp(500, function(){
                    $("#uifm-loading-box").slideUp(500);
                     }); 
                }else{
                    $('#uifm-loading-box').show();
                }
                
                $('#uifm-loading-box').show();
            };
    arguments.callee.hideLoader = function() {
                $('#uifm-loading-box').hide();
               $('#uifm-loading-box').find('.alert').attr('class','alert').html('');
            };
    arguments.callee.loading_boxField = function(id,st) {
               if(parseInt(st)===1){
                   $('<div class="uiform-field-loadingst"><div class="zgpb-loader-header-1"></div></div>').appendTo($("#"+id).css("position", "relative"));
               }else{
                   $("#"+id).find('.uiform-field-loadingst').remove();
               }
            };
          
    arguments.callee.loading_panelbox2 = function(st) {
               if(parseInt(st)===1){
                   $('#uiform-panel-loadingst').parent().css('position','relative');
                   $('#uiform-panel-loadingst').show();
               }else{
                   $('#uiform-panel-loadingst').parent().removeCss('position','relative');
                   $('#uiform-panel-loadingst').hide();
               }
            };         
            
    arguments.callee.loading_panelbox = function(id,st) {
               if(parseInt(st)===1){
                   $("#"+id).show('fast',function(){
                       $(window).trigger('resize');
                    });
               }else{
                   $('#uiform-panel-loadingst').hide();
               }
            };      
    arguments.callee.alerts_global_msg = function(type,txt_msg) {
        var rockfm_class;
                switch(parseInt(type)){
                    case 1:
                        /*success*/
                        rockfm_class='alert-success';
                        break;
                    case 2:
                        /*info*/
                        rockfm_class='alert-info';
                        break;
                    case 3:
                        /*warning*/
                        rockfm_class='alert-warning';
                        break;
                    case 4:
                        /*danger*/
                        rockfm_class='alert-danger';
                        break;
                }
        var content='';
            content+='<div class="alert '+rockfm_class+'">';
            content+='<a href="#" class="close" data-dismiss="alert">&times;</a>';
            content+=txt_msg;
            content+='</div>';
            
            return content;
    };     
    arguments.callee.alerts_msg = function(type,txt_msg) {
            var rockfm_class;
                switch(parseInt(type)){
                    case 1:
                        /*success*/
                        rockfm_class='uifm-alert-success';
                        break;
                    case 2:
                        /*info*/
                        rockfm_class='uifm-alert-info';
                        break;
                    case 3:
                        /*warning*/
                        rockfm_class='uifm-alert-warning';
                        break;
                    case 4:
                        /*danger*/
                        rockfm_class='uifm-alert-danger';
                        break;
                }
              $('#uifm-loading-box').find('.uifm-alert').attr('class','uifm-alert '+rockfm_class).html(txt_msg).append(' <span class="uifm-loader-header-1"></span>');    
            };        
    arguments.callee.setHighlightPicked = function(obj) {
                if($(document).find('.uifm-highlight-edited')){
                  $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
                }
                obj.addClass('uifm-highlight-edited');
            };
    arguments.callee.getUiData = function(name) {
                return mainrformb[name];
            };
    arguments.callee.setUiData = function(name,value) {
                mainrformb[name]=value;
            };
    arguments.callee.getUiData2 = function(name,index) {
                try{
                return mainrformb[name][index];
                    }
                catch(err) {
                    console.log('error getUiData2: '+err.message);
                } 
            };
            
     arguments.callee.delUiData2 = function(name,index) {
                delete mainrformb[name][index];
            };
            
    arguments.callee.spliceUiData2 = function(name,index) {
                if (parseInt(index) > -1) {
                  mainrformb[name].splice(parseInt(index), 1);
                }
               
            }; 
            
    arguments.callee.setUiData2 = function(name,index,value) {
       if (!mainrformb.hasOwnProperty(name)){
            mainrformb[name]= {};
          }
      if (!mainrformb[name].hasOwnProperty(index)){
            mainrformb[name][index]= {};
          }
        mainrformb[name][index]=value;   
    };
    arguments.callee.addIndexUiData2 = function(name,index,value) {
            if(typeof mainrformb[name][index] == 'undefined') {
              
            }else{
                mainrformb[name][index][value]={};
            }    
    };
    arguments.callee.getUiData3 = function(name,index,key) {
                try{
                return mainrformb[name][index][key];
                    }
                catch(err) {
                    console.log('error getUiData3: '+err.message);
                } 
            };
    arguments.callee.delUiData3 = function(name,index,key) {
                delete mainrformb[name][index][key];
            };

    arguments.callee.spliceUiData3 = function(name,index,key) {
                if (parseInt(key) > -1) {
                  mainrformb[name][index].splice(parseInt(key), 1);
                }
               
            }; 

    arguments.callee.setUiData3 = function(name,index,key,value) {
       if (!mainrformb.hasOwnProperty(name)){
            mainrformb[name]= {};
          }
       if (!mainrformb[name].hasOwnProperty(index)){
           mainrformb[name][index]={};
          }
        
       mainrformb[name][index][key]=value;   
    };
    arguments.callee.setUiData4 = function(name,index,key,option,value) {
        
        if (!mainrformb.hasOwnProperty(name)){
            mainrformb[name]= {};
        }
        if (!mainrformb[name].hasOwnProperty(index)){
            mainrformb[name][index]={};
        }

        if (!mainrformb[name][index].hasOwnProperty(key)){
            mainrformb[name][index][key]={};
        }
        
        mainrformb[name][index][key][option]=value;
        
           
    };
    arguments.callee.getUiData4 = function(name,index,key,option) {
        try{
                return mainrformb[name][index][key][option];
             }
        catch(err) {
            console.log('error getUiData4: name: '+name+' index:'+index+' key:'+key+' option:'+option+' error:'+err.message);
        }     
    };
    arguments.callee.getUiData5 = function(name,index,key,section,option) {
        try {
            if(typeof mainrformb[name][index] == 'undefined') {
              return '';
            }else{
                return mainrformb[name][index][key][section][option];
            } 
        }
        catch(err) {
            console.log('error getUiData5: '+err.message);
            return '';
        } 
       }; 
       arguments.callee.setUiData5 = function(name,index,key,section,option,value) {
            
            if (!mainrformb.hasOwnProperty(name)){
            mainrformb[name]= {};
            }
            if (!mainrformb[name].hasOwnProperty(index)){
                mainrformb[name][index]={};
            }

            if (!mainrformb[name][index].hasOwnProperty(key)){
                mainrformb[name][index][key]={};
            }
            
            if (!mainrformb[name][index][key].hasOwnProperty(section)){
                mainrformb[name][index][key][section]={};
            }
            
            mainrformb[name][index][key][section][option]=value;
               
    };
    arguments.callee.addIndexUiData5 = function(name,index,key,section,option,value) {
            if(typeof mainrformb[name][index][key][section][option] == 'undefined') {
              
            }else{
                mainrformb[name][index][key][section][option][value]={};
            }    
    };
    
    arguments.callee.getUiData6 = function(name,index,key,section,option,option2) {
        try {
            if(typeof mainrformb[name][index][key][section][option][option2] == 'undefined') {
              return '';
            }else{
                return mainrformb[name][index][key][section][option][option2];
            } 
        }
        catch(err) {
            console.log('error handled - getUiData6: '+err.message);
            return '';
        } 
       };
      
       
      arguments.callee.setUiData6 = function(name,index,key,section,option,option2,value) {
            
            if (!mainrformb.hasOwnProperty(name)){
                mainrformb[name]= {};
            }
            if (!mainrformb[name].hasOwnProperty(index)){
                mainrformb[name][index]={};
            }

            if (!mainrformb[name][index].hasOwnProperty(key)){
                mainrformb[name][index][key]={};
            }
            
            if (!mainrformb[name][index][key].hasOwnProperty(section)){
                mainrformb[name][index][key][section]={};
            }
            
            if (!mainrformb[name][index][key][section].hasOwnProperty(option)){
                mainrformb[name][index][key][section][option]={};
            }
            
            mainrformb[name][index][key][section][option][option2]=value;
             
    };
    
    arguments.callee.delUiData6 = function(name,index,key,section,option,option2) {
                delete mainrformb[name][index][key][section][option][option2];
            }; 
    
    arguments.callee.getUiData7 = function(name,index,key,section,option,option2,option3) {
        try {
            if(typeof mainrformb[name][index][key][section][option][option2][option3] == 'undefined') {
              return '';
            }else{
                return mainrformb[name][index][key][section][option][option2][option3];
            } 
        }
        catch(err) {
            console.log('error handled - getUiData7: '+err.message);
            return '';
        } 
       };
    arguments.callee.setUiData7 = function(name,index,key,section,option,option2,option3,value) {
            
            if (!mainrformb.hasOwnProperty(name)){
                mainrformb[name]= {};
            }
            if (!mainrformb[name].hasOwnProperty(index)){
                mainrformb[name][index]={};
            }

            if (!mainrformb[name][index].hasOwnProperty(key)){
                mainrformb[name][index][key]={};
            }
            
            if (!mainrformb[name][index][key].hasOwnProperty(section)){
                mainrformb[name][index][key][section]={};
            }
            
            if (!mainrformb[name][index][key][section].hasOwnProperty(option)){
                mainrformb[name][index][key][section][option]={};
            }
            
            if (!mainrformb[name][index][key][section][option].hasOwnProperty(option2)){
                mainrformb[name][index][key][section][option][option2]={};
            }
           
           mainrformb[name][index][key][section][option][option2][option3]=value;
              
    };
    arguments.callee.addIndexUiData7 = function(name,index,key,section,option,option2,value) {
            if(typeof mainrformb[name][index][key][section][option][option2] == 'undefined') {
              
            }else{
                mainrformb[name][index][key][section][option][option2][value]={};
            }    
    };
    arguments.callee.setUiData8 = function(name,index,key,section,option,option2,option3,option4,value) {
            
            if (!mainrformb.hasOwnProperty(name)){
                mainrformb[name]= {};
            }
            if (!mainrformb[name].hasOwnProperty(index)){
                mainrformb[name][index]={};
            }

            if (!mainrformb[name][index].hasOwnProperty(key)){
                mainrformb[name][index][key]={};
            }
            
            if (!mainrformb[name][index][key].hasOwnProperty(section)){
                mainrformb[name][index][key][section]={};
            }
            
            if (!mainrformb[name][index][key][section].hasOwnProperty(option)){
                mainrformb[name][index][key][section][option]={};
            }
            
            if (!mainrformb[name][index][key][section][option].hasOwnProperty(option2)){
                mainrformb[name][index][key][section][option][option2]={};
            }
            
            if (!mainrformb[name][index][key][section][option][option2].hasOwnProperty(option3)){
                mainrformb[name][index][key][section][option][option2][option3]={};
            }
            
            mainrformb[name][index][key][section][option][option2][option3][option4]=value;
                
    };
    arguments.callee.addIndexUiData8 = function(name,index,key,section,option,option2,option3,value) {
            if(typeof mainrformb[name][index][key][section][option][option2][option3] == 'undefined') {
              
            }else{
                mainrformb[name][index][key][section][option][option2][option3][value]={};
            }    
    };
    arguments.callee.delUiData8 = function(name,index,key,section,option,option2,option3,option4) {
                delete mainrformb[name][index][key][section][option][option2][option3][option4];
            };
    
    arguments.callee.setUiData9 = function(name,index,key,section,option,option2,option3,option4,option5,value) {
            
            if (!mainrformb.hasOwnProperty(name)){
                mainrformb[name]= {};
            }
            if (!mainrformb[name].hasOwnProperty(index)){
                mainrformb[name][index]={};
            }

            if (!mainrformb[name][index].hasOwnProperty(key)){
                mainrformb[name][index][key]={};
            }
            
            if (!mainrformb[name][index][key].hasOwnProperty(section)){
                mainrformb[name][index][key][section]={};
            }
            
            if (!mainrformb[name][index][key][section].hasOwnProperty(option)){
                mainrformb[name][index][key][section][option]={};
            }
            
            if (!mainrformb[name][index][key][section][option].hasOwnProperty(option2)){
                mainrformb[name][index][key][section][option][option2]={};
            }
            
            if (!mainrformb[name][index][key][section][option][option2].hasOwnProperty(option3)){
                mainrformb[name][index][key][section][option][option2][option3]={};
            }
            
            if (!mainrformb[name][index][key][section][option][option2][option3].hasOwnProperty(option4)){
                mainrformb[name][index][key][section][option][option2][option3][option4]={};
            }
            mainrformb[name][index][key][section][option][option2][option3][option4][option5]=value;
              
    };
    
    arguments.callee.checkIntegrityDataField = function (id) {
        
        var status=false;
        try {
        //verify each array
        
        
            if('.uiform-step-content #'+id){
                var f_step=$('#'+id).closest('.uiform-step-pane').data('uifm-step');
                 
                
                if(typeof mainrformb['steps_src'][parseInt(f_step)][id] == 'undefined') {
                    status=false;
                }else{
                    status=true;
                }
            }else{
                status=false;
            }
            return status;
        }
        catch(err) {
            console.log('error handled - checkIntegrityDataField : '+err.message);
            return false;
        } 
        
    };
    
    
    arguments.callee.dumpvar3 = function (object) {
        return JSON.stringify(object, null, 2);
    };
    arguments.callee.dumpvar2 = function (object) {
        return JSON.stringify(object);
    };
    
    arguments.callee.dumpvar = function (object) {
       var seen = []
       var json =JSON.stringify(object, function(key, val) {
        if (val != null && typeof val == "object") {
                if (seen.indexOf(val) >= 0)
                    return
                seen.push(val)
            }
            return val
        });
        return seen;
    };
    
    arguments.callee.checkScrollTab = function (){
         //get current width tabs
       var tablist=$('.uiform-set-options-tabs').find('ul.sfdc-nav-tabs');
       var currentWidth=0;
       tablist.find('li').each(function (i) {
            currentWidth=currentWidth+parseInt($(this).width());
        });
        if(currentWidth>480){
            $('.uiform-set-options-tabs').find('.uifm-tab-navigation').show();
        }else{
            $('.uiform-set-options-tabs').find('.uifm-tab-navigation').hide();
        }
        
    };
    arguments.callee.setScrollTab = function (offset,element) {
        var tablist=$(element).parent().parent().parent().find('ul.sfdc-nav-tabs');
        var currentScroll;
        currentScroll=tablist.css("left");
            currentScroll.replace("px", "");
       if(offset>0){
         //previous  
         currentScroll=parseInt(currentScroll)+10;   
       }else{
        //next   
        currentScroll=parseInt(currentScroll)-10;   
       }
       //get current width tabs
       var currentWidth=0;
       tablist.find('li').each(function (i) {
            currentWidth=currentWidth+parseInt($(this).width());
        });
        if(currentScroll>0){
            currentScroll=0;
        }
        var checkLimitNext=currentWidth+currentScroll;
        if(checkLimitNext<410){
           //next   
            currentScroll=parseInt(currentScroll)+10;
        }
        tablist.css("left", currentScroll + "px");
    };
    arguments.callee.cleanSettingTab = function () {
        var clvars;
            clvars = [
            '.uifm-set-section-fieldname'    
            ,'.uifm-tab-fld-label'
            ,'.uifm-tab-fld-input'
            ,'.uifm-tab-fld-helpblock'
            ,'.uifm-tab-fld-validation'
            ,'.uifm-tab-fld-misc'
            ,'.uifm-tab-fld-appendimgs'
            ,'.uifm-tab-fld-logicrls'
            ,'.uifm-set-section-label'
            ,'.uifm-set-section-sublabel'
            ,'.uifm-set-section-blocktxt'
            ,'.uifm-set-section-inputtextbox'
            ,'.uifm-set-section-input12boxbg'
            ,'.uifm-set-section-input13boxbg'
            ,'.uifm-set-section-input-placeh'
            ,'.uifm-set-section-input-valign'
            ,'.uifm-set-section-input-objalign'
            ,'.uifm-set-section-inputboxbg'
            ,'.uifm-set-section-inputboxborder'
            ,'.uifm-set-section-input12boxborder'
            ,'.uifm-set-section-input13boxborder'
            ,'.uifm-set-section-input2'
            ,'.uifm-set-section-input3'
            ,'.uifm-set-section-input4'
            ,'.uifm-set-section-input4-skin-maxwidth'
            ,'.uifm-set-section-input5'
            ,'.uifm-set-section-input6'
            ,'.uifm-set-section-input7'
            ,'.uifm-set-section-input8'
            ,'.uifm-set-section-input9'
            ,'.uifm-set-section-input11'
            ,'.uifm-set-section-input12'
            ,'.uifm-set-section-input13'
            ,'.uifm-set-section-input14'
            ,'.uifm-set-section-input15'
            ,'.uifm-set-section-input16'
            ,'.uifm-set-section-input17'
            ,'.uifm-set-section-input18'
            ,'#uifm-fld-inp-date2-box'
            ,'.uifm-set-section-helpblock'
            ,'.uifm-set-section-validator'
            /*validators*/
            ,'#uifm-custom-val-req-btn'
            ,'#uifm-custom-val-alpha-btn'
            ,'#uifm-custom-val-alphanum-btn'
            ,'#uifm-custom-val-num-btn'
            ,'#uifm-custom-val-mail-btn'
            /*input2*/
            ,'#uifm-fld-inp2-block-align-box'
            /*prep - app*/
            ,'.uifm-set-section-inputprepend'
            ,'.uifm-set-section-inputappend'
            /*range*/
            ,'.uifm-set-section-input4-range'
            ,'.uifm-set-section-input4-defaultvalue'
            /*label */
            ,'.uifm-set-section-label-lbltxt'
            ,'.uifm-set-section-label-sublbltxt'
            /*input 1*/
            ,'.uifm-set-section-input1-txtvalue'
            /*help block*/
            ,'.uifm-set-section-helpblock-text'
            /*more*/
            ,'.uifm-tab-fld-moreopt'
        ];
        $.each(clvars,function(){
            $(String(this)).addClass("uifm-hide");
        });
        $('#uifm_fld_main_fldname').val('');
        
        /*input val align*/
        clvars = [
                                '#uifm_fld_inp_align_1'
                                ,'#uifm_fld_inp_align_2'
                                ,'#uifm_fld_inp_align_3'
        /*label block block pos*/
                                ,'#uifm_fld_lbl_blo_pos_1'
                                ,'#uifm_fld_lbl_blo_pos_2'
                                ,'#uifm_fld_lbl_blo_pos_3'
                                ,'#uifm_fld_lbl_blo_pos_4'
        /*label block align*/
        
                                ,'#uifm_fld_lbl_blo_align_1'
                                ,'#uifm_fld_lbl_blo_align_2'
                                ,'#uifm_fld_lbl_blo_align_3'
        /*style*/
                                ,'#uifm_fld_elbor_style_1'
                                ,'#uifm_fld_elbor_style_2'
        /* help block*/
                                ,'#uifm_fld_hblock_pos_1'
                                ,'#uifm_fld_hblock_pos_2'
                                ,'#uifm_fld_hblock_pos_3'
                                ,'#uifm_fld_hblock_pos_4'
        /****validate***/
        //reseting alert option
                                ,'#uifm_fld_val_pos_1'
                                ,'#uifm_fld_val_pos_2'
                                ,'#uifm_fld_val_pos_3'
                                ,'#uifm_fld_val_pos_4'
                                ];
                            $.each(clvars,function(){
                                $(String(this)).prop('checked',false);
                                $(String(this)).parent().removeClass('sfdc-active');
                            }); 
       //Required icon position
                            clvars = ['#uifm_fld_val_reqicon_pos_2'
                                ,'#uifm_fld_val_reqicon_pos_1'
                            ];
                            $.each(clvars,function(){
                                $(String(this)).prop('checked',false);
                                $(String(this)).removeClass('sfdc-active');
                            }); 
                //buttons validators
                         clvars = [
                                '#uifm-custom-val-req-custxt'
                                ,'#uifm-custom-val-alpha-custxt'
                                ,'#uifm-custom-val-alphanum-custxt'
                                ,'#uifm-custom-val-numbers-custxt'
                                ,'#uifm-custom-val-email-custxt'
                            ];
                            $.each(clvars,function(){
                                $(String(this)).val("");
                            });               
        
    };
    
    arguments.callee.closeSettingTab = function () {
        /*open settings form*/
        $('.sfdc-nav-tabs a[href="#uiform-build-form-tab"]').sfdc_tab('show');
        $('.sfdc-nav-tabs a[href="#uiform-settings-tab3-2"]').sfdc_tab('show');
        //reset settings tab
        $('.uifm-tab-selectedfield').hide();
        $('#uifm-field-selected-id').val('');
        
        
    };
    
    arguments.callee.loadDataOptionByFieldId = function (id_field) {
        console.log('loadDataOptionByFieldId not using');
        return;
        var idselected= $('#uifm-field-selected-id').val();
         
         if(id_field===idselected){
           var tabobject=$('#uifm-field-selected-id').parent();
             $.each(data_field, function(index, value) {
                if($.isPlainObject(value)){
                    $.each(value, function(index2, value2) {
                        rocketform.setDataOptToSetTab(tabobject,index,index2,value2);
                    });
                }

            });
         }
        /*switch (parseInt(option)) {
            case 6:
                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-1"]').sfdc_tab('show');
                break;
            
            default: 
        }*/
    }
    arguments.callee.enableSettingTabOption = function (option) {
        
        switch (option) {
            case 'uifm-label':
            case 'uifm-sublabel':
                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-1"]').sfdc_tab('show');
                rocketform.setInnerVariable('setfield_tab_active','label');
                break;
            case 'uifm-txtbox-inp-val':
                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-2"]').sfdc_tab('show');
                rocketform.setInnerVariable('setfield_tab_active','input');
                break;     
            case 'uifm-help-block':
                 $('.sfdc-nav-tabs a[href="#uiform-settings-tab-3"]').sfdc_tab('show');
                 rocketform.setInnerVariable('setfield_tab_active','helpb');
                 break; 
            default: 
        }
    };
    arguments.callee.setDataToSettingTab = function (id_field,data_field) {
        //field by field
         var idselected= $('#uifm-field-selected-id').val();
          var obj_field= $('#'+id_field);
          var f_store_a;
         if(id_field===idselected){
           var tabobject=$('#uifm-field-selected-id').parent();
             $.each(data_field, function(index, value) {
                if($.isPlainObject(value)){
                    $.each(value, function(index2, value2) {
                       
                        if($.isPlainObject(value2)){
                            $.each(value2, function(index3, value3) {  
                                f_store_a=[];
                                f_store_a.push(index);
                                f_store_a.push(index2);
                                f_store_a.push(index3);
                                rocketform.setDataOptToSetTab(tabobject,f_store_a.join("-"),value3);
                            });
                        }else{
                            f_store_a=[];
                            f_store_a.push(index);
                            f_store_a.push(index2);
                            rocketform.setDataOptToSetTab(tabobject,f_store_a.join("-"),value2);
                        }
                        
                        
                    });
                }
            });
         }
    }
    arguments.callee.setDataToSettingTabAndPreview = function (id_field,data_field) {
        //field by field
         var idselected= $('#uifm-field-selected-id').val();
          var obj_field= $('#'+id_field);
          var f_store_a;
         if(id_field===idselected){
           var tabobject=$('#uifm-field-selected-id').parent();
           
             $.each(data_field, function(index, value) {
             
                if($.isPlainObject(value)){
                     
                    $.each(value, function(index2, value2) {
                        
                        if($.isPlainObject(value2)){
                            $.each(value2, function(index3, value3) {
                                  
                                if($.isPlainObject(value3)){
                                        $.each(value3, function(index4, value4) {
                                            f_store_a=[];
                                            f_store_a.push(index);
                                            f_store_a.push(index2);
                                            f_store_a.push(index3);
                                            f_store_a.push(index4);
                                             
                                            rocketform.setDataOptToSetTab(tabobject,f_store_a.join("-"),value4);
                                            rocketform.setDataOptToPrevField(obj_field,f_store_a.join("-"),value4); 
                                        });
                                    }else{
                                        
                                        f_store_a=[];
                                        f_store_a.push(index);
                                        f_store_a.push(index2);
                                        f_store_a.push(index3);
                                        
                                        rocketform.setDataOptToSetTab(tabobject,f_store_a.join("-"),value3);
                                        rocketform.setDataOptToPrevField(obj_field,f_store_a.join("-"),value3); 
                                    }
                                 
                            });
                        }else{
                           
                           f_store_a=[];
                           f_store_a.push(index);
                           f_store_a.push(index2); 
                           
                            rocketform.setDataOptToSetTab(tabobject,f_store_a.join("-"),value2);
                            rocketform.setDataOptToPrevField(obj_field,f_store_a.join("-"),value2); 
                            
                           
                        }
                        
                    });
                }else{
                      
                     rocketform.setDataOptToSetTab_1(tabobject,index,value,data_field['type']);
                }

            });
         }
         
       
    };
    arguments.callee.loadForm_updatePreviewField = function (id_field,data_field) {
        
         try{
          var obj_field= $('#'+id_field);
             $.each(data_field, function(index, value) {
                    if($.isPlainObject(value)){
                            $.each(value, function(index2, value2) {
                                
                                if($.isPlainObject(value2)){
                                    $.each(value2, function(index3, value3) {
                                        rocketform.setDataOptToPrevField(obj_field,index+'-'+index2+'-'+index3,value3);
                                    });
                                }else{
                                    rocketform.setDataOptToPrevField(obj_field,index+'-'+index2,value2);
                                }
                                
                                
                            });
                        }
            });
            
        }catch(e){
            console.log('id_field:'+id_field+' - error: ' +e.message);
        }    
    };
    arguments.callee.setDataToPreviewField = function (id_field,data_field) {
        //field by field
       var obj_field= $('#'+id_field);
         if(obj_field){
             $.each(data_field, function(index, value) {
                if($.isPlainObject(value)){
                    $.each(value, function(index2, value2) {
                        rocketform.setDataOptToPrevField(obj_field,index+'-'+index2,value2);
                    });
                }

            });
         } 
    }
    arguments.callee.setDataOptToCoreData = function (step,id,f_store,value) {
        
        try {
            
            var f_sec,f_opt,f_opt2,f_opt3,tmp_store;
            
            tmp_store=f_store.split("-");
            
             //check number of variables      
              var length = tmp_store.length; 
              
                     f_sec=tmp_store[0];
                     f_opt=tmp_store[1];
                     f_opt2=tmp_store[2]||null;
                     
                    
            switch (String(f_sec)) {
                case 'input18':
                    f_opt2=tmp_store[2]||'';
                    this.setUiData6('steps_src',String(step),String(id),String(f_sec),String(f_opt),String(f_opt2),value);
                    break;
               default:
                   //update core data according to variables
                    switch (parseInt(length)) {
                        case 3:
                            this.setUiData6('steps_src',String(step),String(id),String(f_sec),String(f_opt),String(f_opt2),value);
                            break;
                        case 2:
                            
                            this.setUiData5('steps_src',String(step),String(id),String(f_sec),String(f_opt),value);
                            break;
                    }
                    
                    
                    break;
            }
       
        }/* end try*/
            catch (ex) {
            console.error("error setDataOptToCoreData ", ex.message);
        }   
    };
    arguments.callee.previewform_shadowBox = function (obj) {
        var style,s_x,s_y,s_blur,s_st,s_color;
        
         //status
        
         s_st=this.getUiData3('skin','form_shadow','show_st');
          s_x=this.getUiData3('skin','form_shadow','h_shadow');    
          s_y=this.getUiData3('skin','form_shadow','v_shadow');
          s_blur=this.getUiData3('skin','form_shadow','blur');
          s_color=this.getUiData3('skin','form_shadow','color');
          
          if(parseInt(s_st)===1){
              style=s_x+'px '+s_y+'px '+s_blur+'px '+s_color;
             obj.find('.uiform-main-form').css('box-shadow',style);
          }else{
              obj.find('.uiform-main-form').removeCss('box-shadow');
          }
    };
    arguments.callee.previewfield_shadowBox = function (obj,section,container) {
        var style,s_x,s_y,s_blur,s_st,s_color;
        
         //status
         var f_id=obj.attr('id');
         var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
         s_st=this.getUiData5('steps_src',f_step,f_id,section,'shadow_st');
          s_x=this.getUiData5('steps_src',f_step,f_id,section,'shadow_x');    
          s_y=this.getUiData5('steps_src',f_step,f_id,section,'shadow_y');
          s_blur=this.getUiData5('steps_src',f_step,f_id,section,'shadow_blur');
          s_color=this.getUiData5('steps_src',f_step,f_id,section,'shadow_color');
          
          if(parseInt(s_st)===1){
              style=s_x+'px '+s_y+'px '+s_blur+'px '+s_color;
             obj.find(container).css('text-shadow',style);
          }else{
              obj.find(container).removeCss('text-shadow');
          }
    };
    arguments.callee.previewfield_elementBorderRadius = function (obj,section,inputClass) {
        var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var size=this.getUiData5('steps_src',f_step,f_id,section,'size');
        if(parseInt(show_st)===1){
            obj.find(inputClass).css('border-radius',size+'px');
        }else{
            obj.find(inputClass).removeCss('border-radius'); 
        }
         
    };
    arguments.callee.previewform_elementBorderRadius = function (obj,section) {
        var show_st=this.getUiData3('skin','form_border_radius','show_st');
        var size=this.getUiData3('skin','form_border_radius','size');
        if(parseInt(show_st)===1){
            obj.find('.uiform-main-form').css('border-radius',size+'px');
        }else{
            obj.find('.uiform-main-form').removeCss('border-radius'); 
        }
         
    };
    
    arguments.callee.previewfield_elementHelpBlockText = function (obj,section) {
       var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var text=this.getUiData5('steps_src',f_step,f_id,section,'text');
        var font=this.getUiData5('steps_src',f_step,f_id,section,'font');
        var font_st=this.getUiData5('steps_src',f_step,f_id,section,'font_st'); 
        var block_pos=this.getUiData5('steps_src',f_step,f_id,section,'pos');
        var block_input=obj.find('.uifm-input-container');
        var block_helpb=obj.find('.uifm-help-block');
        var blt=obj.find('.uifm-label-helpblock');
        
        if(parseInt(show_st)===1){
            switch (parseInt(block_pos)) {
                case 1:
                    //top
                    obj.find('.uifm-help-block').html(decodeURIComponent(text));
                    break;
                case 2:
                   //tooltip
                   if (blt.attr('data-original-title')) {
                       blt.attr('data-original-title',decodeURIComponent(text)); 
                        blt.tooltip('hide');
                                    blt.tooltip({
                                    animation: false,
                                    placement: blt.data("placement") || "top",
                                    container: "body", 
                                    html: true,
                                    title:decodeURIComponent(text)
                                    });
                        blt.tooltip('show');
                   }
                     
                    break;
                case 3:
                    //pop up
                    if($( "#"+f_id+'_hb_modal' )){
                        $( "#"+f_id+'_hb_modal' ).find('.sfdc-modal-body').html(decodeURIComponent(text));
                    }
                    
                    break;
                case 0:
                default:
                    //bottom
                    //removing tooltip if existed 
                    obj.find('.uifm-help-block').html(decodeURIComponent(text));
                    break;    
            }
        }
    }
    
    arguments.callee.previewfield_elementTextarea = function (obj,section) {
        var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var text=this.getUiData5('steps_src',f_step,f_id,section,'text');
        var font=this.getUiData5('steps_src',f_step,f_id,section,'font');
        var font_st=this.getUiData5('steps_src',f_step,f_id,section,'font_st');
        if(parseInt(show_st)===1){
            //manage mode help block
            this.previewfield_elementHelpBlockText(obj,section);
            
            if(parseInt(font_st)===1 && font){
                var font_sel = JSON.parse(font);
                obj.find('.uifm-help-block').css('font-family',font_sel.family);
            }else{
                obj.find('.uifm-help-block').removeCss('font-family');
            }
        }else{
            obj.find('.uifm-help-block').css('display','none');
            obj.find('.uifm-label-helpblock').hide();
        }
    }
    
   
    
    arguments.callee.previewfield_helpBlockPosition = function (obj,section) {
       var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var block_pos=this.getUiData5('steps_src',f_step,f_id,section,'pos');
        var block_text=this.getUiData5('steps_src',f_step,f_id,section,'text');
        var block_input=obj.find('.uifm-input-container');
        var block_helpb=obj.find('.uifm-help-block');
        var blt=obj.find('.uifm-label-helpblock');
        //only positions
        if(parseInt(show_st)===1){
            switch (parseInt(block_pos)) {
                case 1:
                    //top
                    //removing tooltip if existed
                    if (blt.attr('data-original-title')) {
                        if(blt.data && blt.data('tooltip')){
                           
                        }else{
                           blt.tooltip('hide');
                           blt.tooltip('destroy');   
                        }
                        blt.removeAttr("data-original-title");
                    }
                    //removing modal if existed
                    if($( "#"+f_id+'_hb_modal' )){
                        $( "#"+f_id+'_hb_modal' ).remove();    
                    }
                    
                    blt.hide();
                    block_helpb.show();
                    $(block_helpb).insertBefore(block_input);
                    break;
                case 2:
                   //removing modal if existed
                    if($( "#"+f_id+'_hb_modal' )){
                        $( "#"+f_id+'_hb_modal' ).remove();    
                    } 
                    
                      //removing tooltip if existed
                    if (blt.attr('data-original-title')) {
                        if(blt.data && blt.data('tooltip')){
                           
                        }else{
                           blt.tooltip('hide');
                           blt.tooltip('destroy');   
                        }
                        blt.removeAttr("data-original-title");
                    } 
                    
                   //tooltip
                   blt.show();
                   block_helpb.hide();
                   
                   // if (blt.data('tooltip') === undefined) {
                    blt.tooltip({
                        'animation' : false,
                        placement: blt.data("placement") || "top",
                        container: "body", 
                        html: true,
                        title:block_text
                    });
                    blt.attr('data-original-title',decodeURIComponent(block_text));
                     //  }
                   if(String(this.getInnerVariable('setfield_tab_active'))==='helpb'){
                       blt.tooltip('show');
                     }
                    break;
                case 3:
                    //pop up
                    //removing tooltip if existed
                    if (blt.attr('data-original-title')) {
                        if(blt.data && blt.data('tooltip')){
                           
                        }else{
                           blt.tooltip('hide');
                           blt.tooltip('destroy');
                        }
                        blt.removeAttr("data-original-title");
                    }
                    
                    blt.show();
                    block_helpb.hide();
                    //enable popup
                    var modalhtml=$( "#modaltemplate" ).clone()
                    modalhtml.attr("id",f_id+'_hb_modal');
                    modalhtml.find('.sfdc-modal-body').html(decodeURIComponent(block_text));
                    $('body').append(modalhtml);
                    blt.attr('data-target','#'+f_id+'_hb_modal');
                    blt.attr('data-toggle','modal');
                    break;
                case 0:
                default:
                    //bottom
                    if (blt.attr('data-original-title')) {
                        if(blt.data && blt.data('tooltip')){
                        }else{
                           blt.tooltip('hide');
                           blt.tooltip('destroy');  
                        }
                        blt.removeAttr("data-original-title");
                    }
                    //removing modal if existed
                    if($( "#"+f_id+'_hb_modal' )){
                        $( "#"+f_id+'_hb_modal' ).remove();    
                    }
                    
                    blt.hide();
                    block_helpb.show();
                    $(block_input).insertBefore(block_helpb);
                    break;    
            }
        }else{
            //destroy tooltip
            if (blt.attr('data-original-title')) {
                        if(blt.data && blt.data('tooltip')){
                            
                        }else{
                            blt.tooltip('hide');
                            blt.tooltip('destroy');  
                        }
                        blt.removeAttr("data-original-title");
                    }
            //removing modal if existed
                    if($( "#"+f_id+'_hb_modal' )){
                        $( "#"+f_id+'_hb_modal' ).remove();    
                    }
            blt.hide();
            block_helpb.hide();
        }
    }
    
    arguments.callee.previewfield_validateRecIcon = function (obj,section) {
        var f_id=obj.attr('id'),
        f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step'),
        req_icon_st=this.getUiData5('steps_src',f_step,f_id,section,'reqicon_st'),
        req_icon_pos=this.getUiData5('steps_src',f_step,f_id,section,'reqicon_pos'),
        req_icon_img=this.getUiData5('steps_src',f_step,f_id,section,'reqicon_img'),
        objlbl=obj.find('.uifm-label');
        if(parseInt(req_icon_st)===1){
            $("#"+f_id+"_val_iconreq_img").remove();
            if(parseInt(req_icon_pos)===1){
                objlbl.after('<i id="'+f_id+'_val_iconreq_img" class="glyphicon '+req_icon_img+'"></i>' );
            }else{
                objlbl.before('<i id="'+f_id+'_val_iconreq_img" class="glyphicon '+req_icon_img+'"></i>' );
            }
        }else{
            $("#"+f_id+"_val_iconreq_img").remove();
        }
        
    };
    arguments.callee.previewfield_hideAllPopOver = function () {
        var f_id= $('#uifm-field-selected-id').val();
        var obj= $('#'+f_id);
         if(obj){
             var el=obj.find('.uifm-txtbox-inp-val');
             if(el.data && el.data('bs.popover')){
                el.popover('destroy'); 
             }
         }
    };
    arguments.callee.previewfield_removeAllPopovers = function () {
        var tmp_popover=$('.uiform-main-form [aria-describedby^=popover]');
        if(tmp_popover){
            $.each(tmp_popover, function(index, element) {
             if($(element).data && $(element).data('bs.popover')){
                    $(element).popover('destroy');
                }
            });
        }
    };
    arguments.callee.previewfield_removeAllUndesiredObj = function (current) {
        
        /*datetime*/
        var tmp_dtimes=$('.uiform-main-form .uiform-datepicker').not(current);
        var tmp_dtimes_others=tmp_dtimes.find('.bootstrap-datetimepicker-widget');
        if(tmp_dtimes_others){
            tmp_dtimes_others.remove();
        }
    };
    arguments.callee.previewfield_hidePopOver = function () {
        
        var f_id= $('#uifm-field-selected-id').val();
        var obj= $('#'+f_id);
         if(obj){
             
             var el=obj.find('.uifm-txtbox-inp-val');
             
            switch (String(this.getInnerVariable('setfield_tab_active'))) {
                case 'label':
                case 'input':
                case 'helpb':
                     if(el.data && el.data('bs.popover')){
                        el.popover('destroy');
                    }
                    
                    break; 
                case 'validate':
                    this.previewfield_validatePopover(obj,'validate');
                    break; 
                default:
                    break;
            }
         }
         
    }
    
    arguments.callee.previewfield_helpblock_hidetooltip = function () {
        
        var f_id= $('#uifm-field-selected-id').val();
        var obj= $('#'+f_id);
         if(obj){
             
             var el=obj.find('.uifm-label-helpblock');
             
            switch (String(this.getInnerVariable('setfield_tab_active'))) {
               
                case 'helpb':
                     
                    break; 
                default:
                 case 'label':
                case 'input':
                case 'helpb':
                    if(el.data && el.data('bs.tooltip')){
                        el.tooltip('destroy');
                    }
                    break; 
            }
         }
    }
    
    arguments.callee.previewfield_validatePopover = function (obj,section) {
        var f_id=obj.attr('id'),
        f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step'),
        f_type=this.getUiData4('steps_src',f_step,f_id,'type'),
        typ_val=this.getUiData5('steps_src',f_step,f_id,section,'typ_val'),
        typ_val_custxt=this.getUiData5('steps_src',f_step,f_id,section,'typ_val_custxt'),
        pos=this.getUiData5('steps_src',f_step,f_id,section,'pos'),
        tip_col=this.getUiData5('steps_src',f_step,f_id,section,'tip_col'),
        tip_bg=this.getUiData5('steps_src',f_step,f_id,section,'tip_bg');
        
        var el;
        switch(parseInt(f_type)){
            case 6:
            case 7:
                el=obj.find('.uifm-txtbox-inp-val');
                break;
            case 8:
            case 9:
            case 10:
            case 11:
                el=obj.find('.uifm-input2-wrap');
                break;
            case 12:
                /*fileupload*/
                el=obj.find('.uifm-fileinput-wrap');
                break;
            case 13:
                /*Imageupload*/    
                el=obj.find('.uifm-fileinput-wrap .fileinput-preview');
                break;
            case 15:
                /*password*/
                el=obj.find('.uifm-txtbox-inp-val');
                break;
            case 19:
                /*captcha*/
                el=obj.find('.uifm-inp6-captcha-inputcode');
                break;    
            case 23:
                /*color picker*/
                el=obj.find('.uiform-colorpicker-wrap'); 
                break;
            case 24:
                /*date picker*/
                el=obj.find('.uifm-input7-datepic');
                break;
            case 25:
                /*time picker*/
                el=obj.find('.uifm-input7-timepic');
                break;
            case 26:
                /*date time*/
                el=obj.find('.uifm-input7-datetimepic');
                break;
            case 27:
                /*recaptcha*/
                el=obj.find('.uifm-input-recaptcha');
                break;
            case 28:
                /*preppended text*/
            case 29:
                /*appended text*/
            case 30:
                /*prep - appended text*/    
                el=obj.find('.uifm-txtbox-inp-val');
                break;
            case 43:
                /*date beta*/
                return;
                break;
            default:
                return;
                break;
        }
         
       var showPopover = function () {
           el.popover('show');
        }
        , hidePopover = function () {
           el.popover('hide');
        };
        var custom_txt,
            default_txt,
            content_txt;
        //showing
        switch (parseInt(typ_val)) {
                case 1:
                //only letters
                default_txt=$('#uifm-custom-val-alpha-deftxt').val();
                custom_txt=typ_val_custxt;
                if(custom_txt){
                    content_txt=custom_txt;
                }else{
                    content_txt=default_txt;
                }
                 break;
                case 2:
                //letters and numbers
                default_txt=$('#uifm-custom-val-alphanum-deftxt').val();
                custom_txt=typ_val_custxt;
                if(custom_txt){
                    content_txt=custom_txt;
                }else{
                    content_txt=default_txt;
                }
                 break;
                case 3:
                //Only numbers
                default_txt=$('#uifm-custom-val-numbers-deftxt').val();
                custom_txt=typ_val_custxt;
                if(custom_txt){
                    content_txt=custom_txt;
                }else{
                    content_txt=default_txt;
                }
                 break;
                case 4:
                //emails
                default_txt=$('#uifm-custom-val-email-deftxt').val();
                custom_txt=typ_val_custxt;
                if(custom_txt){
                    content_txt=custom_txt;
                }else{
                    content_txt=default_txt;
                }
                 break;
                case 5:
                //only required
                
                default_txt=$('#uifm-custom-val-req-deftxt').val();
                custom_txt=typ_val_custxt;
                if(custom_txt){
                    content_txt=custom_txt;
                }else{
                    content_txt=default_txt;
                }
                 break; 
                default:
                    
                break;
        }
        
            //pos
            var cus_placement;
            switch (parseInt(pos)) {
                    case 1:
                        cus_placement='right';
                    break;
                    case 2:
                        cus_placement='bottom';
                    break;
                    case 3:
                        cus_placement='left';
                    break;
                    case 0:
                    default:
                        //top
                        cus_placement='top';
                    break;
            }
            
      
      switch (parseInt(typ_val)) {
                case 1:
                //only letters
                case 2:
                //letters and numbers
                case 3:
                //Only numbers
                case 4:
                //emails
                case 5:
                //only required
               
                  var id_popover;
       if(el.data && el.data('bs.popover')){
                        el.popover('destroy');
                    }
        el.popover({
                    placement: cus_placement,
                    content: content_txt,
                    trigger: 'manual',
                    animation: false,
                    container: "body",
                    html:true
                    }).focus(showPopover)
                .blur(hidePopover);
      
               // .hover(showPopover, hidePopover);
            //shown only when tab validate is actived    
         if(String(this.getInnerVariable('setfield_tab_active'))==='validate'){
             el.popover('show');   
                }
         
         
         id_popover=el.attr('aria-describedby');
            var border_focus_str='';
            if($('#'+f_id)){
                $('#'+f_id+'_val_ppbox').remove();
                border_focus_str='<style type="text/css" id="'+f_id+'_val_ppbox">';
                border_focus_str+='#'+id_popover+'.sfdc-popover {';
                border_focus_str+='background:'+tip_bg+'!important;';
                border_focus_str+='color:'+tip_col+';';
                border_focus_str+='} ';
                border_focus_str+='#'+id_popover+'.sfdc-popover .sfdc-popover-arrow:after,';
                border_focus_str+='#'+id_popover+'.sfdc-popover.sfdc-top > .sfdc-arrow::after{';
                switch (parseInt(pos)) {
                        case 1:
                            border_focus_str+='border-right-color:'+tip_bg+'!important;';
                        break;
                        case 2:
                            border_focus_str+='border-bottom-color:'+tip_bg+'!important;';
                        break;
                        case 3:
                            border_focus_str+='border-left-color:'+tip_bg+'!important;';
                        break;
                        case 0:
                        default:
                            //top
                            border_focus_str+='border-top-color:'+tip_bg+'!important;';
                        break;
                }
                border_focus_str+='} ';
                border_focus_str+='</style>';
                    $('head').append(border_focus_str);
            }
                //show title label
                $('#uifm-custom-val-title-added').show();
                 break; 
                default:
                    $('#uifm-custom-val-title-added').hide();
                    if(el.data && el.data('bs.popover')){
                        el.popover('destroy');
                    }
                break;
        }
      
    };
    arguments.callee.previewfield_elementBorder = function (obj,section,inputClass) {
        var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var color=this.getUiData5('steps_src',f_step,f_id,section,'color');
        var color_focus_st=this.getUiData5('steps_src',f_step,f_id,section,'color_focus_st');
        var color_focus=this.getUiData5('steps_src',f_step,f_id,section,'color_focus');
        var style=this.getUiData5('steps_src',f_step,f_id,section,'style');
        var width=this.getUiData5('steps_src',f_step,f_id,section,'width');
        var border_sty;
        var border_focus_str;
        if(parseInt(show_st)===1){
            if(parseInt(style)===1){
            border_sty='solid ';
            }else{
            border_sty='dotted ';    
            }
            border_sty+=color+' '+width+'px';
            obj.find(inputClass).css('border',border_sty);
 
        }else{
            obj.find(inputClass).removeCss('border'); 
        }
         
    };
    arguments.callee.previewform_elementBorder = function (obj,section) {
       
        var show_st=this.getUiData3('skin','form_border','show_st');
        var color=this.getUiData3('skin','form_border','color');
        var style=this.getUiData3('skin','form_border','style');
        var width=this.getUiData3('skin','form_border','width');
        var border_sty;
        if(parseInt(show_st)===1){
            if(parseInt(style)===1){
            border_sty='solid ';
            }else{
            border_sty='dotted ';    
            }
            border_sty+=color+' '+width+'px';
            obj.find('.uiform-main-form').css('border',border_sty);
 
        }else{
            obj.find('.uiform-main-form').removeCss('border'); 
        }
         
    };
    arguments.callee.previewfield_elementBackground = function (obj,section,inputClass) {
        var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var show_st=this.getUiData5('steps_src',f_step,f_id,section,'show_st');
        var type=this.getUiData5('steps_src',f_step,f_id,section,'type');
        var start_color=this.getUiData5('steps_src',f_step,f_id,section,'start_color');
        var end_color=this.getUiData5('steps_src',f_step,f_id,section,'end_color');
        var solid_color=this.getUiData5('steps_src',f_step,f_id,section,'solid_color');
        
        if(parseInt(show_st)===1){
           switch (parseInt(type)) {
                case 2:
                    //gradient
                    obj.find(inputClass).css({
                            'background': start_color, 
                            'background-image': "-webkit-linear-gradient(top, "+start_color+", "+end_color+")", 
                            'background-image': "-moz-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-ms-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-o-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "linear-gradient(to bottom, "+start_color+","+end_color+")"
                        });
                    break; 
                case 1:
                default:
                    //solid
                    if(solid_color){
                        obj.find(inputClass).css('background',solid_color);
                    }
                break;
            } 
        }else{
           obj.find(inputClass).removeCss('background'); 
           obj.find(inputClass).removeCss('background-image');
        }
    };
    arguments.callee.previewform_elementPadding = function (obj,section) {
        var show_st=this.getUiData3('skin','form_padding','show_st');
        var pos_top=this.getUiData3('skin','form_padding','pos_top');
        var pos_right=this.getUiData3('skin','form_padding','pos_right');
        var pos_bottom=this.getUiData3('skin','form_padding','pos_bottom');
        var pos_left=this.getUiData3('skin','form_padding','pos_left');
        if(parseInt(show_st)===1){
            var pad_tmp=pos_top+'px '+pos_right+'px '+pos_bottom+'px '+pos_left+'px';
            obj.find('.uiform-main-form').css('padding',pad_tmp);
        }else{
            obj.find('.uiform-main-form').removeCss('padding');
        }
    };
    arguments.callee.previewform_elementBackground = function (obj,section) {
        var show_st=this.getUiData3('skin','form_background','show_st');
        var type=this.getUiData3('skin','form_background','type');
        var start_color=this.getUiData3('skin','form_background','start_color');
        var end_color=this.getUiData3('skin','form_background','end_color');
        var solid_color=this.getUiData3('skin','form_background','solid_color');
        var skin_bg_imgurl=this.getUiData3('skin','form_background','image');
        
        if(parseInt(show_st)===1){
           switch (parseInt(type)) {
                case 2:
                    //gradient 
                    obj.find('.uiform-main-form').css({
                            'background': start_color, 
                            'background-image': "-webkit-linear-gradient(top, "+start_color+", "+end_color+")", 
                            'background-image': "-moz-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-ms-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-o-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "linear-gradient(to bottom, "+start_color+","+end_color+")"
                        });
                     /*update divider bg text*/
                         if($('.uiform-main-form').find('.uiform-divider-text')){
                             $('.uiform-main-form').find('.uiform-divider-text').css({
                            'background': start_color, 
                            'background-image': "-webkit-linear-gradient(top, "+start_color+", "+end_color+")", 
                            'background-image': "-moz-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-ms-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "-o-linear-gradient(top, "+start_color+", "+end_color+")",
                            'background-image': "linear-gradient(to bottom, "+start_color+","+end_color+")"
                        });
                         }     
                    break; 
                case 1:
                default:
                    //solid
                    if(solid_color){
                        obj.find('.uiform-main-form').css('background',solid_color);
                    }
                    /*update divider bg text*/
                         if($('.uiform-main-form').find('.uiform-divider-text')){
                             $('.uiform-main-form').find('.uiform-divider-text').css('background',solid_color);
                         } 
                    
                break;
            }
          if(skin_bg_imgurl){
               obj.find('.uiform-main-form').removeCss('background-image');
               obj.find('.uiform-main-form').css({
                                'background-image': "url('"+skin_bg_imgurl+"')", 
                                'background-repeat': "repeat"
                            });
               /*update divider bg text*/
                         if($('.uiform-main-form').find('.uiform-divider-text')){
                             $('.uiform-main-form').find('.uiform-divider-text').css({
                                'background-image': "url('"+skin_bg_imgurl+"')", 
                                'background-repeat': "repeat"
                            });
                         }             
            }else{
                
            }  
            
        }else{
           obj.find('.uiform-main-form').removeCss('background'); 
           obj.find('.uiform-main-form').removeCss('background-image');
           /*update divider bg text*/
            if($('.uiform-main-form').find('.uiform-divider-text')){
                $('.uiform-main-form').find('.uiform-divider-text').removeCss('background');
                $('.uiform-main-form').find('.uiform-divider-text').removeCss('background-image');
                $('.uiform-main-form').find('.uiform-divider-text').removeCss('background-repeat');
            }
        }
    };
    
    arguments.callee.previewfield_controlBlockLabel = function (obj,section) {
        var f_id=obj.attr('id');
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        var block_pos=this.getUiData5('steps_src',f_step,f_id,section,'block_pos');
        var block_st=this.getUiData5('steps_src',f_step,f_id,section,'block_st');
        var block_align=this.getUiData5('steps_src',f_step,f_id,section,'block_align');
       var col_block=obj.find('.uifm-control-label').parent();
        var col_input=obj.find('.uifm-control-label').parent().siblings();
        var col_block_pos=parseInt(col_block.index());
        if(parseInt(block_st)===1){
            
            col_block.show();
            
            switch (parseInt(block_pos)) {
                case 1:
                    //top
                    if(col_block_pos===1){
                        //return original pos
                        $(col_block).insertBefore(col_input);
                    }
                    obj.find('.uifm-control-label').parent().attr('class', 'rkfm-col-sm-12');
                    obj.find('.uifm-control-label').parent().siblings().attr('class', 'rkfm-col-sm-12');
                    break;
                case 2:
                    //right
                    if(col_block_pos===0){
                        $(col_input).insertBefore(col_block);
                    }
                    obj.find('.uifm-control-label').parent().attr('class', 'rkfm-col-sm-2');
                    obj.find('.uifm-control-label').parent().siblings().attr('class', 'rkfm-col-sm-10');

                    break;
                case 3:
                    //bottom
                    if(col_block_pos===0){
                        $(col_input).insertBefore(col_block);
                    }
                    obj.find('.uifm-control-label').parent().attr('class', 'rkfm-col-sm-12');
                    obj.find('.uifm-control-label').parent().siblings().attr('class', 'rkfm-col-sm-12');
                    break;
                case 0:
                default:
                    //left
                    if(col_block_pos===1){
                        //return original pos
                        $(col_block).insertBefore(col_input);
                    }
                    obj.find('.uifm-control-label').parent().attr('class', 'rkfm-col-sm-2');
                    obj.find('.uifm-control-label').parent().siblings().attr('class', 'rkfm-col-sm-10');
                    break;    
            }
            
            switch (parseInt(block_align)) {
                case 1:
                    //center
                    obj.find('.uifm-control-label').css('text-align', 'center');
                    break;
                case 2:
                    //right
                    obj.find('.uifm-control-label').css('text-align', 'right');
                    break;
                case 0:
                default:
                    //left
                    obj.find('.uifm-control-label').css('text-align', 'left');
                    break;    
            }
            
        }else{
            col_block.hide();
            col_input.attr('class', 'rkfm-col-sm-12');
        }
        
    };
    arguments.callee.previewfield_fontfamily = function (obj,section,container) {
        var f_st,f_font;
        var tmp_font_id;
         //status
         var f_id=obj.attr('id');
         var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
         f_st=this.getUiData5('steps_src',f_step,f_id,section,'font_st');
          f_font=this.getUiData5('steps_src',f_step,f_id,section,'font');  
        
          if(parseInt(f_st)===1 && f_font){
               var font_sel = JSON.parse(f_font);
             obj.find(container).css('font-family',font_sel.family);
              /*load font*/
                if ( undefined !== font_sel.import_family ) {
                   
                        var atImport = '@import url(//fonts.googleapis.com/css?family='+font_sel.import_family;
                        tmp_font_id = 'zgfm_font_'+String(font_sel.import_family).cleanup();    
                        if(parseInt($('#'+tmp_font_id).length)===0){
                            $( '<style type="text/css" id="'+tmp_font_id+'">' ).append( atImport ).appendTo( 'head' );
                        }
                }
             
          }else{
             obj.find(container).removeCss('font-family');
          }
    };
    
    arguments.callee.previewfield_fontfamily2 = function (obj,section) {
        var f_st,f_font;
        var tmp_font_id;
         //status
         var f_id=obj.attr('id');
         var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
         f_st=this.getUiData5('steps_src',f_step,f_id,section,'font_st');
          f_font=this.getUiData5('steps_src',f_step,f_id,section,'font');  
        
          if(parseInt(f_st)===1 && f_font){
               var font_sel = JSON.parse(f_font);
             //obj.find(container).css('font-family',font_sel.family);
              /*load font*/
                if ( undefined !== font_sel.import_family ) {
                   
                        var atImport = '@import url(//fonts.googleapis.com/css?family='+font_sel.import_family;
                        tmp_font_id = 'zgfm_font_'+String(font_sel.import_family).cleanup();
                       
                            
                        if(parseInt($('#'+tmp_font_id).length)===0){
                            
                           
                            $( '<style type="text/css" id="'+tmp_font_id+'">' ).append( atImport ).appendTo( 'head' );
                        }
                        
                }
             
          } 
    };
    arguments.callee.setDataOptToPrevForm = function (obj,section,f_store,value) {
       
         var section2,option,option2,tmp_store;
        
        tmp_store=f_store.split("-");
        section2=tmp_store[0];
         option=tmp_store[1];
         option2=tmp_store[2]||null;
        
        //setting data to section
        switch(String(section)) {
            case 'main':
                switch(String(section2)) {
                    case 'submit_ajax':
                        
                        break;
                    case 'add_css':
                         
                        break;
                    case 'add_js':
                         
                        break; 
                    case 'onload_scroll':
                         
                        break; 
                    case 'preload_noconflict':
                         
                        break; 
                    case 'pdf_charset':
                         
                        break; 
                    case 'pdf_font':
                         
                        break;     
                }
                break;
            case 'wizard':
                switch(String(section2)) {
                    case 'enable_st':
                        
                        break;
                    case 'tabs':
                         
                        break;
                    case 'theme_type':
                         
                        break; 
                    case 'theme':
                         switch(parseInt(option)) {
                            case 0:
                                 switch(String(option2)) {
                                        case 'skin_tab_cur_bgcolor':
                                             
                                            break;
                                        case 'skin_tab_cur_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_done_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_done_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_done_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_cont_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_cont_borcol':
                                            
                                            break;    
                                    }
                                break;
                            case 1:
                                 switch(String(option2)) {
                                        case 'skin_tab_cur_bgcolor':
                                             
                                            break;
                                        case 'skin_tab_cur_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_bg_numtxt':
                                            
                                            break;    
                                        case 'skin_tab_inac_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_txtcolor':
                                            
                                            break;
                                           
                                    }
                                break;
                        }
                        break;   
                }
                break;
            case 'onsubm':
                switch(String(section2)){
                     case 'sm_successtext':
                         
                         break;
                     case 'sm_boxmsg_bg_st':
                         
                         break;
                     case 'sm_boxmsg_bg_type':
                         
                         break;
                     case 'sm_boxmsg_bg_solid':
                         
                         break;
                     case 'sm_boxmsg_bg_start':
                         
                         break;
                     case 'sm_boxmsg_bg_end':
                         
                         break;
                     case 'sm_redirect_st':
                         
                         break;
                     case 'sm_redirect_url':
                         
                         break;
                     case 'mail_from_email':
                         
                         break;
                     case 'mail_from_name':
                         
                         break;
                     case 'mail_template_msg':
                         
                         break;
                     case 'mail_recipient':
                         
                         break;
                     case 'mail_cc':
                         
                         break;
                     case 'mail_bcc':
                         
                         break; 
                     case 'mail_subject':
                         
                         break;
                     case 'mail_usr_st':
                         
                         break; 
                     case 'mail_usr_template_msg':
                         
                         break;
                     case 'mail_usr_pdf_st':
                         
                         break;
                     case 'mail_usr_pdf_store':
                         
                         break;  
                     case 'mail_usr_pdf_st':
                         
                         break;
                     case 'mail_usr_pdf_template_msg':
                         
                         break;
                     case 'mail_usr_pdf_fn':
                         
                         break;
                     case 'mail_usr_recipient':
                         
                         break;
                     case 'mail_usr_recipient_name':
                         
                         break;
                     case 'mail_usr_cc':
                         
                         break;
                     case 'mail_usr_bcc':
                         
                         break;
                     case 'mail_usr_subject':
                         
                         break;    
                 }
                break;
            case 'skin':
                //skin
                switch(String(section2)) {
                        case 'form_shadow':
                             switch(String(option)) {
                                    case 'show_st':
                                    case 'color':
                                    case 'h_shadow':
                                    case 'h_shadow':  
                                    case 'blur':
                                        this.previewform_shadowBox(obj);
                                        break; 
                                    default:
                                }   
                        break;
                        case 'form_width':
                             switch(String(option)) {
                                    case 'show_st':
                                    case 'max':
                                    this.previewform_skin_maxwidth();
                                    $(window).trigger('resize');
                                        break; 
                                    default:
                                }   
                        break;
                        case 'form_padding':
                             switch(String(option)) {
                                    case 'show_st':
                                    case 'pos_top':
                                    case 'pos_right':
                                    case 'pos_bottom':
                                    case 'pos_left':
                                    this.previewform_elementPadding(obj,section);
                                    $(window).trigger('resize');
                                        break; 
                                    default:
                                }   
                        break;
                        
                         case 'form_background':
                            //background
                            switch(String(option)) {
                                    case 'show_st':
                                    case 'type':
                                    case 'start_color':
                                    case 'end_color':
                                    case 'solid_color':
                                    case 'image':
                                    this.previewform_elementBackground(obj,section);
                                        break; 
                                    default:
                                }
                            break;
                        case 'form_border_radius':
                            //border radius
                            switch(String(option)) {
                                    case 'show_st':
                                    case 'size':
                                    this.previewform_elementBorderRadius(obj,section);
                                        break; 
                                    default:
                                }
                            break;
                        case 'form_border':
                            //border
                            switch(String(option)) {
                                    case 'show_st':
                                    case 'color':
                                    case 'color_focus_st':
                                    case 'color_focus':
                                    case 'style':
                                    case 'width':
                                    this.previewform_elementBorder(obj,section);
                                    break; 
                                    default:
                                }
                            break;
                }
                
            break;
        }  
    }
    
    arguments.callee.previewform_skin_maxwidth = function () {
        var maxwidth_st=this.getUiData3('skin','form_width','show_st');
        var maxwidth=this.getUiData3('skin','form_width','max');
       if(parseInt(maxwidth_st)===1){
           $('.uiform-main-form').css('max-width',maxwidth+'px');
       }else{
           $('.uiform-main-form').removeCss('max-width');
       }
       
    }
    arguments.callee.setDataOptToPrevField = function (obj,f_store,value) {
        try {
        var id=obj.attr('id');
        var step=$('#'+id).closest('.uiform-step-pane').data('uifm-step');        
        var type=this.getUiData4('steps_src',String(step),String(id),'type');
        var section,option,opt1,opt2,tmp_store;
        
        tmp_store=f_store.split("-");
                 section=tmp_store[0];
                 option=tmp_store[1];
        
        switch (parseInt(type)) {
            case 31:
                //console.log('setDataOptToPrevField to field 31');
                opt2=tmp_store[2]||null;
                break;
            default:
                opt2=tmp_store[2]||null;
        
        }
         
        var inputClass;
        //setting data to section
        switch(String(section)) {
            case 'input':
            case 'input12':
            case 'input13':
                switch(String(section)){
                    case 'input':
                        inputClass=".uifm-txtbox-inp-val";
                        break;
                    case 'input12':
                        inputClass=".uifm-txtbox-inp12-val";
                        break;
                    case 'input13':
                        inputClass=".uifm-txtbox-inp13-val";
                        break;
                }
                //input
                switch(String(option)) {
                        case 'value_lbl':
                            obj.find(inputClass).find('.uifm-inp-lbl').html(value);
                            break;
                        case 'value':
                            /*check if is input*/
                            var tmp_val=obj.find(inputClass).get(0)||null;
                            if(tmp_val){
                               var type_el=tmp_val.tagName.toLowerCase();
                                switch(type_el){
                                    case 'h1':
                                    case 'h2':
                                    case 'h3':
                                    case 'h4':
                                    case 'h5':
                                    case 'h6':
                                      obj.find(inputClass).html(value);  
                                      break;
                                    default:
                                       obj.find(inputClass).val(value); 
                                      break;
                                }
                            }
                            break;
                        case 'size':
                          obj.find(inputClass).css('font-size',value+'px');
                            break; 
                        case 'bold':
                          if(parseInt(value)===1){
                            obj.find(inputClass).css('font-weight','bold');    
                          }else{
                           obj.find(inputClass).css('font-weight','normal');    
                          }
                            break;
                        case 'italic':
                           if(parseInt(value)===1){
                            obj.find(inputClass).css('font-style','italic');    
                          }else{
                            obj.find(inputClass).removeCss('font-style'); 
                          } 
                            break;
                        case 'underline':
                             if(parseInt(value)===1){
                            obj.find(inputClass).css('text-decoration','underline');    
                          }else{
                            obj.find(inputClass).removeCss('text-decoration');
                          } 
                            break;
                        case 'placeholder':
                            obj.find(inputClass).attr("placeholder",value);
                            break;    
                        case 'color':
                            obj.find(inputClass).removeCss('color');
                            if(value){
                                obj.find(inputClass).css('color',value);
                            }
                            break;
                        case 'font':
                        case 'font_st':
                            this.previewfield_fontfamily(obj,section,inputClass);
                            break;
                        case 'val_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        obj.find(inputClass).css('text-align','center');
                                        break; 
                                    case 2:
                                        obj.find(inputClass).css('text-align','right');
                                        break;
                                    case 0:    
                                    default:
                                        obj.find(inputClass).css('text-align','left');
                                        break;
                                }
                            
                            break;
                         case 'obj_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        obj.find(inputClass).parent().css('text-align','center');
                                        
                                        break; 
                                    case 2:
                                        obj.find(inputClass).parent().css('text-align','right');
                                        
                                        break;
                                    case 0:    
                                    default:
                                        obj.find(inputClass).parent().css('text-align','left');
                                        
                                        break;
                                }
                            break;   
                         case 'prepe_txt':
                         case 'append_txt':
                             this.previewfield_prepappTxtOnInput(obj,option);
                             break;
                        default:
                    }
                break;
            case 'input2':
                //input
                switch(String(option)) {
                        
                        case 'font':
                        case 'font_st':
                        case 'size':
                        case 'bold':
                        case 'italic':
                        case 'underline':
                        case 'color':    
                        case 'block_align':
                        case 'options':
                            switch(parseInt(type)){
                                        case 8:
                                            //radio button
                                            $('#'+id).data('uiform_radiobtn').input2settings_preview_genAllOptions();
                                            break;
                                        case 9:
                                            //checkbox
                                            $('#'+id).data('uiform_checkbox').input2settings_preview_genAllOptions();
                                            break;
                                        case 10:
                                            //select
                                            $('#'+id).data('uiform_select').input2settings_preview_genAllOptions();
                                            break;
                                        case 11:
                                            //multiselect
                                            $('#'+id).data('uiform_multiselect').input2settings_preview_genAllOptions();
                                            break;
                                    }
                            //rocketform.input2settings_preview_genAllOptions(obj,section,option);
                            break;
                        case 'style_type':    
                        case 'stl1':
                            switch(String(opt2)) {
                                
                                case 'border_color':
                                case 'bg_color':
                                case 'icon_color':
                                case 'icon_mark':
                                case 'size':
                                default:
                                    switch(parseInt(type)){
                                        case 8:
                                            //radio button
                                            $('#'+id).data('uiform_radiobtn').previewfield_input2_stl1();
                                            break;
                                        case 9:
                                            //checkbox
                                            $('#'+id).data('uiform_checkbox').previewfield_input2_stl1();
                                            break;
                                        case 10:
                                            //select
                                            $('#'+id).data('uiform_select').previewfield_input2_stl1();
                                            break;
                                        case 11:
                                            //multiselect
                                            $('#'+id).data('uiform_multiselect').previewfield_input2_stl1();
                                            break;    
                                    }
                                 break;
                            }
                           break;
                        default:
                    }
                break;
            case 'input3':
                //input
                switch(String(option)) {
                        case 'text':
                          obj.find('.uifm-input3-customhtml').html(decodeURIComponent(value));
                            break;
                        case 'size':
                          obj.find('.uifm-input3-customhtml').css('font-size',value+'px');
                            break; 
                        case 'bold':
                          if(parseInt(value)===1){
                            obj.find('.uifm-input3-customhtml').css('font-weight','bold');    
                          }else{
                           obj.find('.uifm-input3-customhtml').css('font-weight','normal');    
                          }
                            break;
                        case 'italic':
                           if(parseInt(value)===1){
                                obj.find('.uifm-input3-customhtml').css('font-style','italic');    
                            }else{
                                obj.find('.uifm-input3-customhtml').removeCss('font-style'); 
                            } 
                            break;
                        case 'underline':
                             if(parseInt(value)===1){
                            obj.find('.uifm-input3-customhtml').css('text-decoration','underline');    
                          }else{
                            obj.find('.uifm-input3-customhtml').removeCss('text-decoration');
                          } 
                            break;
                           
                        case 'color':
                            obj.find('.uifm-input3-customhtml').removeCss('color');
                            if(value){
                                obj.find('.uifm-input3-customhtml').css('color',value);
                            }
                            break;
                        case 'font':
                        case 'font_st':
                            this.previewfield_fontfamily(obj,section,'.uifm-input3-customhtml');
                            break;
                        default:
                    }
                break;
            case 'input4':
                //input
                switch(String(option)) {
                        case 'set_min':
                        case 'set_max':
                        case 'set_default':
                        case 'set_step':
                        case 'set_range1':    
                        case 'set_range2':
                        case 'skin_maxwidth_st':
                        case 'skin_maxwidth':
                           this.input4settings_generateField(obj,section);
                            break;
                    }
                break;
             case 'input5':
                //input
                switch(String(option)) {
                        case 'g_key_public':
                        case 'g_key_secret':
                        case 'g_theme':
                           this.input5settings_checkRecaptcha(obj,section,option);
                            break;
                    }
                break;
            case 'input6':
                //input
                switch(String(option)) {
                        case 'txt_color_st':
                        case 'txt_color':
                        case 'background_st':  
                        case 'background_color':
                        case 'distortion':
                        case 'behind_lines_st':
                        case 'behind_lines':
                        case 'front_lines_st':
                        case 'front_lines':
                           this.input6settings_checkCaptcha(obj,section,option);
                            break;
                    }
                break;
            case 'input7':
                //input
                switch(String(option)) {
                        case 'format':
                        case 'language':
                           this.input7settings_updateField(obj,section,option);
                            break;
                    }
                break;   
            case 'input8':
                //input
                switch(String(option)) {
                        case 'value':
                           obj.find('.uifm-txtbox-inp8-val').val(value);
                           break;
                    }
                break;
            case 'input9':
                //input
                switch(String(option)) {
                        case 'txt_star1':
                        case 'txt_star2':
                        case 'txt_star3':
                        case 'txt_star4':
                        case 'txt_star5':    
                        case 'txt_norate':
                           this.input9settings_updateField(obj,section);
                            break;
                    }
                break; 
            case 'input10':
                //input
                switch(String(option)) {
                        case 'value':
                           obj.find('.uiform-colorpicker-wrap').colorpicker();
                            break;
                    }
                break;
            case 'input11':
                //input
                switch(String(option)) {
                        case 'size':
                          obj.find('.uiform-divider-text').css('font-size',value+'px');
                            break; 
                        case 'bold':
                          if(parseInt(value)===1){
                            obj.find('.uiform-divider-text').css('font-weight','bold');    
                          }else{
                           obj.find('.uiform-divider-text').css('font-weight','normal');    
                          }
                            break;
                        case 'italic':
                           if(parseInt(value)===1){
                            obj.find('.uiform-divider-text').css('font-style','italic');    
                          }else{
                            obj.find('.uiform-divider-text').removeCss('font-style'); 
                          } 
                            break;
                        case 'underline':
                             if(parseInt(value)===1){
                            obj.find('.uiform-divider-text').css('text-decoration','underline');    
                          }else{
                            obj.find('.uiform-divider-text').removeCss('text-decoration');
                          } 
                            break;   
                        case 'font_st':
                        case 'font':
                            this.previewfield_fontfamily(obj,section,'.uiform-divider-text');
                            break;
                        case 'div_color':  
                        case 'div_col_st':
                        case 'text_color':  
                        case 'text_val':
                              
                           this.input11settings_updateField(obj,section,option);
                            break;
                    }
                break;
            case 'input14':
                //input
                switch(String(option)) {
                    case 'obj_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        obj.find('.uifm-input-container').css('text-align','center');
                                        break; 
                                    case 2:
                                        obj.find('.uifm-input-container').css('text-align','right');
                                        break;
                                    case 0:    
                                    default:
                                        obj.find('.uifm-input-container').css('text-align','left');
                                        break;
                                }
                            break;    
                    }
                break;
             case 'input15':
                //input
                switch(String(option)) {
                    case 'txt_yes':
                           obj.find('.uifm-inp15-fld').bootstrapSwitchZgpb('onText',value);
                            break;
                    case 'txt_no':
                           obj.find('.uifm-inp15-fld').bootstrapSwitchZgpb('offText',value);
                            break;        
                    }
                break;
           case 'input17':
                //input
                switch(String(option)) {
                        case 'thopt_mode':
                        case 'thopt_height':
                        case 'thopt_width':
                        case 'options':
                        case 'thopt_zoom':
                        case 'thopt_usethmb':
                        case 'thopt_showhvrtxt':
                        case 'thopt_showcheckb': 
                           this.input17settings_preview_genAllOptions(obj,section);
                            break;
                    }
                break;
            case 'input18':
                //panel
                this.input18settings_preview_genAllOptions(obj,section); 
                break;
            case 'input_date2':
                //panel
                $('#'+id).data('uifm_datepickr_flat').inputsettings_preview_genAllOptions(obj,section);        
                break;
            case 'label':
                //label
                inputClass='.uifm-label';
                
                switch(String(option)) {
                        case 'text':
                          obj.find(inputClass).html(value);  
                            break;
                        case 'size':
                          obj.find(inputClass).css('font-size',value+'px');
                            break;
                        case 'bold':
                          if(parseInt(value)===1){
                            obj.find(inputClass).css('font-weight','bold');    
                          }else{
                           obj.find(inputClass).css('font-weight','normal');    
                          }
                            break;
                        case 'italic':
                           if(parseInt(value)===1){
                            obj.find(inputClass).css('font-style','italic');    
                          }else{
                            obj.find(inputClass).removeCss('font-style'); 
                          } 
                            break;
                        case 'underline':
                             if(parseInt(value)===1){
                            obj.find(inputClass).css('text-decoration','underline');    
                          }else{
                            obj.find(inputClass).removeCss('text-decoration');
                          } 
                            break;
                        case 'color':
                            obj.find(inputClass).removeCss('color');
                            if(value){
                                obj.find(inputClass).css('color',value);
                            }
                            break;
                        case 'font':
                        case 'font_st':
                            this.previewfield_fontfamily(obj,section,inputClass);
                            break;
                        case 'shadow_st':
                        case 'shadow_color':
                        case 'shadow_x':
                        case 'shadow_y':
                        case 'shadow_blur':
                            this.previewfield_shadowBox(obj,section,inputClass);
                            break; 
                        default:
                    }
                break;
            case 'sublabel':
                //label
                switch(String(option)) {
                        case 'text':
                          obj.find('.uifm-sublabel').html(value);  
                            break;
                        case 'size':
                          obj.find('.uifm-sublabel').css('font-size',value+'px') 
                            break;
                        case 'bold':
                          if(parseInt(value)===1){
                            obj.find('.uifm-sublabel').css('font-weight','bold');    
                          }else{
                           obj.find('.uifm-sublabel').css('font-weight','normal');    
                          }
                            break;
                        case 'italic':
                           if(parseInt(value)===1){
                            obj.find('.uifm-sublabel').css('font-style','italic');    
                          }else{
                            obj.find('.uifm-sublabel').removeCss('font-style'); 
                          } 
                            break;
                        case 'underline':
                             if(parseInt(value)===1){
                            obj.find('.uifm-sublabel').css('text-decoration','underline');    
                          }else{
                            obj.find('.uifm-sublabel').removeCss('text-decoration');
                          } 
                            break;
                        case 'color':
                            obj.find('.uifm-sublabel').removeCss('color');
                            if(value){
                                obj.find('.uifm-sublabel').css('color',value);
                            }
                            break;
                        case 'font':
                        case 'font_st':
                            this.previewfield_fontfamily(obj,section,'.uifm-sublabel');
                            break;
                        case 'shadow_st':
                        case 'shadow_color':
                        case 'shadow_x':
                        case 'shadow_y':
                        case 'shadow_blur':
                            this.previewfield_shadowBox(obj,section,'.uifm-sublabel');
                            break; 
                        default:
                    }
                break;
             case 'txt_block':
                //txt block
                switch(String(option)) {
                        case 'block_pos':
                        case 'block_st':
                        case 'block_align':
                           this.previewfield_controlBlockLabel(obj,section);
                            break; 
                        default:
                    }
                break;
             case 'el_background':
             case 'el12_background':
             case 'el13_background':
                 
                switch(String(section)){
                    case 'el_background':
                        inputClass=".uifm-txtbox-inp-val";
                        break;
                    case 'el12_background':
                        inputClass=".uifm-txtbox-inp12-val";
                        break;
                    case 'el13_background':
                        inputClass=".uifm-txtbox-inp13-val";
                        break;
                }
                 
                //background
                switch(String(option)) {
                        case 'show_st':
                        case 'type':
                        case 'start_color':
                        case 'end_color':
                        case 'solid_color':
                           this.previewfield_elementBackground(obj,section,inputClass);
                            break; 
                        default:
                    }
                break;
              case 'el_border_radius':
              case 'el12_border_radius':   
              case 'el13_border_radius':
                //border radius
                switch(String(section)){
                    case 'el_border_radius':
                        inputClass=".uifm-txtbox-inp-val";
                        break;
                    case 'el12_border_radius':
                        inputClass=".uifm-txtbox-inp12-val";
                        break;
                    case 'el13_border_radius':
                        inputClass=".uifm-txtbox-inp13-val";
                        break;
                }
                
                switch(String(option)) {
                        case 'show_st':
                        case 'size':
                           this.previewfield_elementBorderRadius(obj,section,inputClass);
                            break; 
                        default:
                    }
                break;
              case 'el_border':
              case 'el12_border': 
              case 'el13_border':
                //border
                 switch(String(section)){
                    case 'el_border':
                        inputClass=".uifm-txtbox-inp-val";
                        break;
                    case 'el12_border':
                        inputClass=".uifm-txtbox-inp12-val";
                        break;
                    case 'el13_border':
                        inputClass=".uifm-txtbox-inp13-val";
                        break;
                }
                
                switch(String(option)) {
                        case 'show_st':
                        case 'color':
                        case 'color_focus_st':
                        case 'color_focus':
                        case 'style':
                        case 'width':
                           this.previewfield_elementBorder(obj,section,inputClass);
                           break; 
                        default:
                    }
                break;
                case 'help_block':
                //help_block
                switch(String(option)) {
                        case 'text':
                        
                        case 'font':
                           this.previewfield_elementTextarea(obj,section);
                           break;
                        case 'pos':
                           this.previewfield_helpBlockPosition(obj,section);
                           break;
                        case 'show_st':
                           this.previewfield_helpBlockPosition(obj,section);
                           
                        break;
                        default:
                    }
                break;
                case 'validate':
                //validate
                
                switch(String(option)) {
                        case 'typ_val':
                               rocketform.fieldsdata_email_genListToIntMem(); 
                        case 'typ_val_custxt':
                        case 'pos':
                        case 'tip_col':
                        case 'tip_bg':
                           this.previewfield_validatePopover(obj,section);
                           
                        break;
                        case 'reqicon_st':
                        case 'reqicon_pos':
                        case 'reqicon_img':
                            this.previewfield_validateRecIcon(obj,section);
                        break;
                        default:
                    }
                break;
                case 'skin':
                    
                    switch(String(option)) {
                            case 'margin':
                                switch(String(opt2)) {
                                                case 'top':
                                                        obj.css('margin-top',value+'px');
                                                    break;
                                                case 'bottom':
                                                        obj.css('margin-bottom',value+'px');

                                                    break;
                                                case 'left':
                                                        obj.css('margin-left',value+'px');

                                                    break;
                                                case 'right':

                                                        obj.css('margin-right',value+'px');

                                                    break;    
                                            }

                                break;
                            case 'padding':
                                    switch(String(opt2)) {
                                                case 'top':

                                                        obj.css('padding-top',value+'px');

                                                    break;
                                                case 'bottom':

                                                        obj.css('padding-bottom',value+'px');

                                                    break;
                                                case 'left':

                                                        obj.css('padding-left',value+'px');

                                                    break;
                                                case 'right':

                                                        obj.css('padding-right',value+'px');

                                                    break;    
                                            }
                                break;

                        }
                    break; 
            default:
                
        }
        
        }/* end try*/
        catch (ex) {
        console.error("error setDataOptToPrevField obj.id : "+obj.attr('id')+' type: '+obj.attr('data-typefield')+' - store: '+f_store+' - value: '+value+' - error:'+ ex.message);
        }
    }
    arguments.callee.setDataOptToSetTab_1 = function (tab,section,value,type) {
       /*assign the name field to input editor*/
        switch(String(section)) {
            case 'field_name':
                switch (parseInt(type)) {
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                    case 11:
                    case 12:
                        /*fileupload*/
                    case 13:
                        /*imageupload*/
                    case 15:
                        /*password*/
                    case 16:
                        /*slider*/
                    case 17:
                        /*range*/
                    case 18:
                        /*spinner*/
                    case 21:
                        /*hidden input*/    
                    case 22:
                        /*star rating*/
                    case 23:
                        /*color picker*/     
                    case 24:
                        /*date picker*/     
                    case 25:
                        /*time picker*/     
                    case 26:
                        /*date time*/     
                    case 28:
                        /*prepended txt*/
                    case 29:
                        /*appended txt*/   
                    case 30:
                        /*appended txt*/
                    case 40:
                        /*switch*/
                    case 41:
                        /*dyn checkbox*/
                    case 42:
                        /*dyn radiobtn*/
                    case 43:
                        /*date beta*/    
                        if(value){
                            tab.find('#uifm_fld_main_fldname').val(value);
                        }
                        break;
                }
                break;
        }   
    }
    arguments.callee.setDataOptToSetFormTab = function (tab,section,f_store,value) {
        
        var section2,option,option2,tmp_store;
        var editor,content;
        tmp_store=f_store.split("-");
        section2=tmp_store[0];
         option=tmp_store[1];
         option2=tmp_store[2]||null;
        
        
        switch(String(section)) {  
            case 'main':
                switch(String(section2)) {
                    case 'submit_ajax':
                         /*save main settings*/
                        var skin_main_ajaxst=(parseInt(value)===1)?true:false;
                        $('#uifm_frm_main_ajaxmode').bootstrapSwitchZgpb('state',skin_main_ajaxst);
                        break;
                    case 'add_css':
                        if(value){
                                   $('textarea#uifm_frm_main_addcss').val(decodeURIComponent(value));    
                               }
                                                       //enable html editor
 
                               var te_html;
                                var field_obj_inp_html;

                                te_html = document.getElementById("uifm_frm_main_addcss");
                                                                                field_obj_inp_html =  CodeMirror.fromTextArea(te_html, {
                                                                                                        lineNumbers: true,
                                                                                                        lineWrapping: true,
                                                                                                        mode: "css",
                                                                                                        keyMap: "sublime",
                                                                                                        autoCloseBrackets: true,
                                                                                                        matchBrackets: true,
                                                                                                        showCursorWhenSelecting: true,
                                                                                                        theme: "monokai",
                                                                                                        // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
                                                                                                        enableCodeFolding: true,
                                                                                                        // Whether or not to enable code formatting
                                                                                                        enableCodeFormatting: true,
                                                                                                        // Whether or not to highlight all matches of current word/selection
                                                                                                        highlightMatches: true,
                                                                                                        // Whether or not to show the comment button on the toolbar
                                                                                                        showCommentButton: true,

                                                                                                        // Whether or not to show the uncomment button on the toolbar
                                                                                                        showUncommentButton: true,
                                                                                                        // Whether or not to highlight the currently active line
                                                                                                        styleActiveLine: true,
                                                                                                        tabSize: 2 
                                                                                                       });
                                 field_obj_inp_html.foldCode(CodeMirror.Pos(0, 0));
                                 field_obj_inp_html.foldCode(CodeMirror.Pos(21, 0));
                                 field_obj_inp_html.setSize('100%', '100%');
                                 // store it
                                 $("#uifm_frm_main_addcss").data('CodeMirrorInstance', field_obj_inp_html);
                        
                        break;
                    case 'add_js':
                        if(value){
                                 $('textarea#uifm_frm_main_addjs').val(decodeURIComponent(value));    
                             } 
                             
                         var te_html;
                                var field_obj_inp_html;
                              te_html = document.getElementById("uifm_frm_main_addjs");
                                                                              field_obj_inp_html =  CodeMirror.fromTextArea(te_html, {
                                                                                                      lineNumbers: true,
                                                                                                      lineWrapping: true,
                                                                                                      mode: "javascript",
                                                                                                      keyMap: "sublime",
                                                                                                      autoCloseBrackets: true,
                                                                                                      matchBrackets: true,
                                                                                                      showCursorWhenSelecting: true,
                                                                                                      theme: "monokai",
                                                                                                      // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
                                                                                                      enableCodeFolding: true,
                                                                                                      // Whether or not to enable code formatting
                                                                                                      enableCodeFormatting: true,
                                                                                                      // Whether or not to highlight all matches of current word/selection
                                                                                                      highlightMatches: true,
                                                                                                      // Whether or not to show the comment button on the toolbar
                                                                                                      showCommentButton: true,

                                                                                                      // Whether or not to show the uncomment button on the toolbar
                                                                                                      showUncommentButton: true,
                                                                                                      // Whether or not to highlight the currently active line
                                                                                                      styleActiveLine: true,
                                                                                                      tabSize: 2 
                                                                                                     });
                               
                               field_obj_inp_html.setSize('100%', '100%');
                               // store it
                                 $("#uifm_frm_main_addjs").data('CodeMirrorInstance', field_obj_inp_html);     
                             
                        break; 
                    case 'onload_scroll':
                        var main_onload_scroll=(parseInt(value)===1)?true:false;
                        if(main_onload_scroll){
                                   $('#uifm_frm_main_onload_scroll').bootstrapSwitchZgpb('state',main_onload_scroll);   
                               } 
                        break; 
                    case 'preload_noconflict':
                         var main_preload_noconflict=(parseInt(value)===1)?true:false;
                        if(main_preload_noconflict){
                                 $('#uifm_frm_main_preload_noconflict').bootstrapSwitchZgpb('state',main_preload_noconflict);  
                             } 
                        break;
                    case 'pdf_paper_size':
                        $('#uifm_frm_main_pdf_papersize').val(value);
                        break; 
                    case 'pdf_paper_orie':
                        $('#uifm_frm_main_pdf_paperorien').val(value);
                        break;
                    case 'pdf_charset':
                         var mail_usr_pdf_charset=value||"UTF-8";
                         $('#uifm_frm_email_usr_pdf_charset').val(mail_usr_pdf_charset);
                        break; 
                    case 'pdf_font':
                         var mail_usr_pdf_font=value;
                        $('#uifm_frm_email_usr_tmpl_pdf_font').val(mail_usr_pdf_font);
                        break;
                    case 'email_html_fullpage':
                        $('#uifm_frm_main_email_htmlfullpage').val(value);
                        break; 
                    case 'pdf_html_fullpage':
                        $('#uifm_frm_main_pdf_htmlfullpage').val(value);
                        break; 
                }
                break;
            case 'wizard':
                switch(String(section2)) {
                    case 'enable_st':
                        
                        break;
                    case 'tabs':
                         
                        break;
                    case 'theme_type':
                         
                        break; 
                    case 'theme':
                         switch(parseInt(option)) {
                            case 0:
                                 switch(String(option2)) {
                                        case 'skin_tab_cur_bgcolor':
                                             
                                            break;
                                        case 'skin_tab_cur_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_done_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_done_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_done_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_cont_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_cont_borcol':
                                            
                                            break;    
                                    }
                                break;
                            case 1:
                                 switch(String(option2)) {
                                        case 'skin_tab_cur_bgcolor':
                                             
                                            break;
                                        case 'skin_tab_cur_txtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_numtxtcolor':
                                            
                                            break;
                                        case 'skin_tab_cur_bg_numtxt':
                                            
                                            break;    
                                        case 'skin_tab_inac_bgcolor':
                                            
                                            break;
                                        case 'skin_tab_inac_txtcolor':
                                            
                                            break;
                                           
                                    }
                                break;
                        }
                        break;   
                }
                break;
            case 'onsubm':
                switch(String(section2)){
                     case 'sm_successtext':
                         //success message
                            if( typeof tinymce != "undefined" ) {
                                            editor = tinymce.get("uifm_frm_subm_msg");
                                            if( editor && editor instanceof tinymce.Editor ) {
                                                content = decodeURIComponent(value);
                                                editor.setContent( content, {format : 'html'} );
                                            }else{
                                                $('textarea#uifm_frm_subm_msg').val(decodeURIComponent(value));
                                            }
                                        }
                         break;
                     case 'sm_boxmsg_bg_st':
                         //success message bg status
                        var subm_bgst=(parseInt(value)===1)?true:false;
                        $('#uifm_frm_subm_bgst').bootstrapSwitchZgpb('state',subm_bgst);
                         break;
                     case 'sm_boxmsg_bg_type':
                         //success message bg type
                        var subm_bgtyp=(value)?value:1;
                        if(parseInt(subm_bgtyp)===1){
                            $('#uifm_frm_subm_bgst_typ1').addClass('sfdc-active');
                            $('#uifm_frm_subm_bgst_typ2').removeClass('sfdc-active');
                            $('#uifm_frm_subm_bgst_typ1').find('input').prop( "checked", true );
                            $('#uifm_frm_subm_bgst_typ1_handle').show();
                            $('#uifm_frm_subm_bgst_typ2_handle').hide();
                        }else{
                            $('#uifm_frm_subm_bgst_typ2').addClass('sfdc-active');
                            $('#uifm_frm_subm_bgst_typ1').removeClass('sfdc-active');
                            $('#uifm_frm_subm_bgst_typ2').find('input').prop( "checked", true );
                            $('#uifm_frm_subm_bgst_typ1_handle').hide();
                            $('#uifm_frm_subm_bgst_typ2_handle').show();
                        }
                         break;
                     case 'sm_boxmsg_bg_solid':
                         
                         break;
                     case 'sm_boxmsg_bg_start':
                         
                         break;
                     case 'sm_boxmsg_bg_end':
                         
                         break;
                     case 'sm_redirect_st':
                         //url redirection
                            var subm_redirect_st=(parseInt(value)===1)?true:false;
                            $('#uifm_frm_subm_redirect_st').bootstrapSwitchZgpb('state',subm_redirect_st);
                         break;
                     case 'sm_redirect_url':
                          //url redirection content
                            $('#uifm_frm_subm_redirect_url').val(decodeURIComponent(value));
                         break;
                     case 'mail_from_email':
                         //save mail template 
                            if(value){
                                $('#uifm_frm_from_email').val(value);    
                            }
                         break;
                     case 'mail_from_name':
                        if(value){
                            $('#uifm_frm_from_name').val(value);    
                        }
                         break;
                     case 'mail_template_msg':
                         //admin
                            if(value){
                                if( typeof tinymce != "undefined" ) {
                                            editor = tinymce.get("uifm_frm_email_tmpl");
                                            if( editor && editor instanceof tinymce.Editor ) {
                                                content = decodeURIComponent(value);
                                                editor.setContent( content, {format : 'html'} );
                                            }else{
                                                $('textarea#uifm_frm_email_tmpl').val(decodeURIComponent(value));
                                            }
                                        }
                            }
                         break;
                     case 'mail_recipient':
                         
                            if(value){
                                $('#uifm_frm_email_recipient').val(value);    
                            }
                         break;
                     case 'mail_cc':
                         
                        if(value){
                            $('#uifm_frm_email_cc').val(value);    
                        }
                         break;
                     case 'mail_bcc':
                            if(value){
                                $('#uifm_frm_email_bcc').val(value);    
                            }
                         break; 
                     case 'mail_subject':
                        if(value){
                            $('#uifm_frm_email_subject').val(value);    
                        }
                         break;
                     case 'mail_usr_st':
                          //customer
                            var mail_usr_st=(parseInt(value)===1)?true:false;
                           $('#uifm_frm_email_usr_sendst').bootstrapSwitchZgpb('state',mail_usr_st);
                         break; 
                     case 'mail_usr_template_msg':
                         if(value){
                            if( typeof tinymce != "undefined" ) {
                                        editor = tinymce.get("uifm_frm_email_usr_tmpl");
                                        if( editor && editor instanceof tinymce.Editor ) {
                                            content = decodeURIComponent(value);
                                            editor.setContent( content, {format : 'html'} );
                                        }else{
                                            $('textarea#uifm_frm_email_usr_tmpl').val(decodeURIComponent(value));
                                        }
                                    }
                        }
                         break;
                     case 'mail_usr_pdf_st':
                         //attach pdf
                        var mail_usr_pdf_st=(parseInt(value)===1)?true:false;
                       $('#uifm_frm_email_usr_attachpdfst').bootstrapSwitchZgpb('state',mail_usr_pdf_st);

                         break;
                     case 'mail_usr_pdf_store':
                         
                         break;  
                     case 'mail_usr_pdf_st':
                         
                         break;
                     case 'mail_usr_pdf_template_msg':
                         if(value){
                            if( typeof tinymce != "undefined" ) {
                                        editor = tinymce.get("uifm_frm_email_usr_tmpl_pdf");
                                        if( editor && editor instanceof tinymce.Editor ) {
                                            content = decodeURIComponent(value);
                                            editor.setContent( content, {format : 'html'} );
                                        }else{
                                            $('textarea#uifm_frm_email_usr_tmpl_pdf').val(decodeURIComponent(value));
                                        }
                                    }
                        }
                         break;
                     case 'mail_usr_pdf_fn':
                         var mail_usr_pdf_fn=decodeURIComponent(value);
                        if(mail_usr_pdf_fn){
                            $('#uifm_frm_email_usr_tmpl_pdf_fn').val(mail_usr_pdf_fn);    
                        }
                         break;
                     case 'mail_usr_recipient':
                         
                         break;
                     case 'mail_usr_recipient_name':
                         
                         break;
                     case 'mail_usr_cc':
                         var mail_usr_cc=value;
                        if(mail_usr_cc){
                            $('#uifm_frm_email_usr_cc').val(mail_usr_cc);    
                        }
                         break;
                     case 'mail_usr_bcc':
                         var mail_usr_bcc=value;
                        if(mail_usr_bcc){
                            $('#uifm_frm_email_usr_bcc').val(mail_usr_bcc);    
                        }
                         break;
                     case 'mail_usr_subject':
                         var mail_usr_subject=value;
                        if(mail_usr_subject){
                            $('#uifm_frm_email_usr_subject').val(mail_usr_subject);    
                        }
                         break;    
                 }
                break;
            case 'skin':
                switch(String(section2)){
                     case 'form_width':
                        switch(String(option)) {
                            case 'show_st':
                                if(parseInt(value)===1){
                                tab.find('#uifm_frm_skin_width_st').bootstrapSwitchZgpb('state', true);
                                }else{
                                tab.find('#uifm_frm_skin_width_st').bootstrapSwitchZgpb('state', false);    
                                }
                                break;
                            case 'max':
                                tab.find('#uifm_frm_skin_maxwidth').val(value);
                                break; 
                        }
                    break;
                    case 'form_padding':
                        switch(String(option)) {
                            case 'show_st':
                                if(parseInt(value)===1){
                                tab.find('#uifm_frm_skin_padd_st').bootstrapSwitchZgpb('state', true);
                                }else{
                                tab.find('#uifm_frm_skin_padd_st').bootstrapSwitchZgpb('state', false);    
                                }
                                break;
                            case 'pos_top':
                                tab.find('#uifm_frm_skin_padd_top').val(value);
                                break;
                            case 'pos_right':
                             tab.find('#uifm_frm_skin_padd_right').val(value);
                             break; 
                            case 'pos_bottom':
                             tab.find('#uifm_frm_skin_padd_bottom').val(value);
                             break; 
                            case 'pos_left':
                             tab.find('#uifm_frm_skin_padd_left').val(value);
                             break;  
                        }
                    break;
                    case 'form_background':
                    //background
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_frm_skin_fmbg_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_frm_skin_fmbg_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'type':
                            switch (parseInt(value)) {
                                    case 2:
                                        
                                        tab.find('#uifm_frm_skin_fmbg_type_2').prop('checked', true);
                                        tab.find('#uifm_frm_skin_fmbg_type_2').addClass('sfdc-active');
                                        //refresh option
                                        tab.find('#uifm_frm_skin_fmbg_type_opts1').hide();
                                        tab.find('#uifm_frm_skin_fmbg_type_opts2').show();
                                         
                                        break;
                                    case 1:
                                    default:
                                        
                                        tab.find('#uifm_frm_skin_fmbg_type_1').prop('checked', true);
                                        tab.find('#uifm_frm_skin_fmbg_type_1').addClass('sfdc-active');
                                        //refresh option
                                        tab.find('#uifm_frm_skin_fmbg_type_opts1').show();
                                        tab.find('#uifm_frm_skin_fmbg_type_opts2').hide();
                                        break;    
                                }
                            break;
                        case 'start_color':
                            tab.find('#uifm_frm_skin_fmbg_color_2').parent().colorpicker('setValue',value);
                            tab.find('#uifm_frm_skin_fmbg_color_2').val(value);
                            break;
                        case 'end_color':
                            tab.find('#uifm_frm_skin_fmbg_color_3').parent().colorpicker('setValue',value);
                            tab.find('#uifm_frm_skin_fmbg_color_3').val(value);
                            break;
                        case 'solid_color':
                            tab.find('#uifm_frm_skin_fmbg_color_1').parent().colorpicker('setValue',value);
                            tab.find('#uifm_frm_skin_fmbg_color_1').val(value);
                            break;
                        case 'image':
                            if(value){
                                $('#uifm_frm_skin_bg_imgurl').val(value);
                                $('#uifm_frm_skin_bg_srcimg_wrap').html('<img class="sfdc-img-thumbnail" src="'+value+'">');
                            }else{
                                $('#uifm_frm_skin_bg_imgurl').val('');
                                $('#uifm_frm_skin_bg_srcimg_wrap').html('');
                            }
                            break;    
                        }
                break;
                case 'form_border_radius':
                    //border radius
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_frm_skin_fmbora_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_frm_skin_fmbora_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'size':
                            tab.find('#uifm_frm_skin_fmbora_size').bootstrapSlider('setValue', parseInt(value));
                            break;
                        }
                break;
                case 'form_border':
                    //border
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_frm_skin_fmbor_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_frm_skin_fmbor_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'color':
                            tab.find('#uifm_frm_skin_fmbor_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_frm_skin_fmbor_color').val(value);
                            break;
                        case 'style':
                            switch (parseInt(value)) {
                                    case 2:
                                        tab.find('#uifm_frm_skin_fmbor_style_2').prop('checked', true);
                                        tab.find('#uifm_frm_skin_fmbor_style_2').addClass('sfdc-active');
                                        break;
                                    case 1:
                                    default:
                                        tab.find('#uifm_frm_skin_fmbor_style_1').prop('checked', true);
                                        tab.find('#uifm_frm_skin_fmbor_style_1').addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        case 'width':
                            
                            tab.find('#uifm_frm_skin_fmbor_width').bootstrapSlider('setValue', parseInt(value));
                            break;    
                        }
                break;
                case 'form_shadow':
                    //form shadow
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_frm_skin_sha_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_frm_skin_sha_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'color':
                            tab.find('#uifm_frm_skin_sha_co').parent().colorpicker('setValue',value);
                            tab.find('#uifm_frm_skin_sha_co').val(value);
                            break;
                        case 'h_shadow':
                           
                            tab.find('#uifm_frm_skin_sha_x').bootstrapSlider('setValue', parseInt(value));
                            
                            break; 
                        case 'v_shadow':
                            
                            tab.find('#uifm_frm_skin_sha_y').bootstrapSlider('setValue', parseInt(value));
                            
                            break;
                        case 'blur':
                            
                            tab.find('#uifm_frm_skin_sha_blur').bootstrapSlider('setValue', parseInt(value));
                            
                            break;    
                        }
                break;
                }
            break;
        }       
    };
    arguments.callee.setDataOptToSetTab = function (tab,f_store,value) {
        
        try {
        var id= $('#uifm-field-selected-id').val();
        var step=$('#'+id).closest('.uiform-step-pane').data('uifm-step');
        var type=this.getUiData4('steps_src',String(step),String(id),'type');
        var section,option,opt1,opt2,tmp_store;
        switch (parseInt(type)) {
            case 31:
                tmp_store=f_store.split("-");
                 section=tmp_store[0];
                 option=tmp_store[1];
                 opt2=tmp_store[2]||'';
                break;
            default:
                 tmp_store=f_store.split("-");
                 section=tmp_store[0];
                 option=tmp_store[1];
                 opt2=tmp_store[2]||null;
        
        }    
         
        //setting data to section
        var prefix_ind;
         
        switch(String(section)) {
            case 'input':  
            case 'input12':
            case 'input13':
                    switch(String(section)) {
                        case 'input':
                            prefix_ind='';
                            break;
                        case 'input12':
                            prefix_ind='12';
                            break;
                        case 'input13':
                            prefix_ind='13';
                            break;
                    }
                //input
                switch(String(option)) {
                        case 'value_lbl':
                            tab.find('#uifm_fld_input'+prefix_ind+'_value').val(value);
                            break;
                        case 'value_lbl_last':
                            tab.find('#uifm_fld_input'+prefix_ind+'_value_lbl_last').val(value);
                            break;    
                        case 'value':
                            tab.find('#uifm_fld_input_value').val(value);
                            break;
                        case 'size':
                            tab.find('#uifm_fld_inp'+prefix_ind+'_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp'+prefix_ind+'_bold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp'+prefix_ind+'_bold').val(1);
                            }else{
                            tab.find('#uifm_fld_inp'+prefix_ind+'_bold').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp'+prefix_ind+'_bold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp'+prefix_ind+'_italic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp'+prefix_ind+'_italic').val(1);
                            }else{
                            tab.find('#uifm_fld_inp'+prefix_ind+'_italic').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_inp'+prefix_ind+'_italic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp'+prefix_ind+'_u').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp'+prefix_ind+'_u').val(1);
                            }else{
                            tab.find('#uifm_fld_inp'+prefix_ind+'_u').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp'+prefix_ind+'_u').val(0);
                            }
                            break;
                        case 'placeholder':
                            tab.find('#uifm_fld_inp'+prefix_ind+'_pholdr').val(value);
                            break;
                        case 'color':
                            tab.find('#uifm_fld_inp'+prefix_ind+'_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_inp'+prefix_ind+'_color').val(value);
                            break;
                        case 'font':
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_inp'+prefix_ind+'_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp'+prefix_ind+'_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_inp'+prefix_ind+'_font_st').prop('checked', false);    
                            }
                            break;
                        case 'val_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_2').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_3').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_3').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                    
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_1').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_align_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break; 
                         case 'obj_align':
                             /*reset*/
                             tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_2').parent().parent().find('input').prop('checked', false);
                             tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_2').parent().parent().find('label').removeClass('sfdc-active');
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_2').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_3').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_3').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                    
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_1').prop('checked', true);
                                        tab.find('#uifm_fld_inp'+prefix_ind+'_objalign_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;   
                         case 'prepe_txt':
                             tab.find('#uifm_fld_input_prep_preview').html(decodeURIComponent(value));
                            break;
                         case 'append_txt':
                             tab.find('#uifm_fld_input_appe_preview').html(decodeURIComponent(value));
                             break;   
                        default:
                    }
                break;
            case 'input2':
                //input2
                switch(String(option)) {
                        case 'size':
                            tab.find('#uifm_fld_inp2_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_bold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_bold').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_bold').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_bold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_italic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_italic').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_italic').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_inp2_italic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_u').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_u').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_u').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_u').val(0);
                            }
                            break;
                       
                        case 'color':
                            tab.find('#uifm_fld_inp2_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_inp2_color').val(value);
                            break;
                        case 'font':
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_inp2_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_inp2_font_st').prop('checked', false);    
                            }
                            break;
                        case 'block_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_inp2_blo_align_2').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_inp2_blo_align_2').find('input').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                        tab.find('#uifm_fld_inp2_blo_align_1').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_inp2_blo_align_1').find('input').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;    
                        case 'options':
                            
                            rocketform.input2settings_tabeditor_generateAllOptions(value);
                            break;
                        case 'style_type':
                            tab.find('#uifm_fld_inp2_style_type').val(value);
                            
                            switch(parseInt(value)){
                                case 1:
                                    tab.find('.uifm-set-section-input2-stl1').show();
                                    break;
                                default:
                                    tab.find('.uifm-set-section-input2-stl1').hide();
                            }
                            
                            break;
                        case 'stl1':
                            
                            switch(String(opt2)) {
                                case 'border_color':
                                    tab.find('#uifm_fld_inp2_stl1_brdcolor').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_brdcolor').val(value);
                                    break;
                                case 'bg_color':
                                    tab.find('#uifm_fld_inp2_stl1_bgcolor').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_bgcolor').val(value);
                                    break;
                                case 'icon_color':
                                    tab.find('#uifm_fld_inp2_stl1_iconcolor').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_iconcolor').val(value);
                                    break;
                                case 'icon_mark':
                                    tab.find('#uifm_fld_inp2_stl1_icmark').iconpicker('setIcon', value);
                                    break;
                                case 'size':
                                    tab.find('#uifm_fld_inp2_stl1_size').val(parseFloat(value));

                                    break;
                                case 'bg1_color1':
                                    tab.find('#uifm_fld_inp2_stl1_bg1_color1').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_bg1_color1').val(value); 
                                    break;
                                case 'bg1_color2':
                                    tab.find('#uifm_fld_inp2_stl1_bg1_color2').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_bg1_color2').val(value);  
                                    break;
                                case 'bg2_color1_h':
                                    tab.find('#uifm_fld_inp2_bg2_color1_h').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_bg2_color1_h').val(value);  
                                    break;
                                case 'bg2_color2_h':
                                    tab.find('#uifm_fld_inp2_stl1_bg2_color2_h').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_fld_inp2_stl1_bg2_color2_h').val(value);  
                                    break;
                                case 'search_st':
                                    if(parseInt(value)===1){
                                        tab.find('#uifm_fld_inp2_stl1_search_st').bootstrapSwitchZgpb('state', true);
                                    }else{
                                        tab.find('#uifm_fld_inp2_stl1_search_st').bootstrapSwitchZgpb('state', false);    
                                    } 
                                    break;
                                case 'txt_noselected':
                                    tab.find('#uifm_fld_inp2_stl1_txtnoselected').val(value);  
                                    break;
                                case 'txt_noresult':
                                    tab.find('#uifm_fld_inp2_stl1_txtnoresult').val(value);  
                                    break;
                                case 'txt_countsel':
                                    tab.find('#uifm_fld_inp2_stl1_txtcountsel').val(value);  
                                    break;    
                                    
                            }
                         
                         break;
                        default:
                    }
                break;
            case 'input3':
                //input2
                switch(String(option)) {
                    case 'text':
                            if( typeof tinymce != "undefined" ) {
                                var editor = tinymce.get("uifm_fld_inp3_html");
                                if( editor && editor instanceof tinymce.Editor ) {
                                    var content = decodeURIComponent(value);
                                    editor.setContent( content, {format : 'html'} );
                                }else{
                                    $('textarea#uifm_fld_inp3_html').val(decodeURIComponent(value));
                                }
                            }else{
                            }
                            break;
                        case 'size':
                            tab.find('#uifm_fld_inp2_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_bold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_bold').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_bold').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_bold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_italic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_italic').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_italic').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_inp2_italic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_u').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_u').val(1);
                            }else{
                            tab.find('#uifm_fld_inp2_u').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp2_u').val(0);
                            }
                            break;
                       
                        case 'color':
                            tab.find('#uifm_fld_inp2_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_inp2_color').val(value);
                            break;
                        case 'font':
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_inp2_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp2_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_inp2_font_st').prop('checked', false);    
                            }
                            break;
                        default:
                    }
                break;
            case 'input4':
                //input
                switch(String(option)) {
                        case 'set_min':
                            tab.find('#uifm_fld_inp4_spinner_opt1').val(parseFloat(value));
                            break;
                        case 'set_max':
                            tab.find('#uifm_fld_inp4_spinner_opt2').val(parseFloat(value));
                            break;
                        case 'set_default':
                            tab.find('#uifm_fld_inp4_spinner_opt3').val(parseFloat(value));
                            break;
                        case 'set_step':
                            tab.find('#uifm_fld_inp4_spinner_opt4').val(parseFloat(value));
                            break;
                        case 'set_range1':
                            tab.find('#uifm_fld_inp4_spinner_opt5').val(parseFloat(value));
                            break;
                        case 'set_range2':
                            tab.find('#uifm_fld_inp4_spinner_opt6').val(parseFloat(value));
                            break;
                        case 'skin_maxwidth_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp4_spinner_skin_maxwith_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp4_spinner_skin_maxwith_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'skin_maxwidth':
                            tab.find('#uifm_fld_inp4_spinner_skin_maxwith').val(parseFloat(value));
                            break;
                           
                    }
                break;
            case 'input5':
                //input
                switch(String(option)) {
                        case 'g_key_public':
                            tab.find('#uifm_fld_inp5_kpublic').val(value);
                            break;
                        case 'g_key_secret':
                            tab.find('#uifm_fld_inp5_ksecret').val(value);
                            break;
                        case 'g_theme':
                            tab.find('#uifm_fld_inp5_theme_2').parent().children("label").removeClass('sfdc-active');
                            tab.find('#uifm_fld_inp5_theme_2').parent().children("input").prop('checked', false);
                            switch (parseInt(value)) {
                                    case 1:                                        
                                        tab.find('#uifm_fld_inp5_theme_2').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_inp5_theme_2').addClass('sfdc-active');
                                        break;
                                    default:
                                        tab.find('#uifm_fld_inp5_theme_1').addClass('sfdc-active');
                                        tab.find('#uifm_fld_inp5_theme_1').find('input').prop('checked', true);
                                        break;    
                                }
                            break;
                    }
                break;
            case 'input6':
                //input
                switch(String(option)) {
                        case 'txt_color_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp6_txtcolor_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp6_txtcolor_st').bootstrapSwitchZgpb('state', false);    
                            }
                          break;
                        case 'txt_color':
                            tab.find('#uifm_fld_inp6_txtcolor').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_inp6_txtcolor').val(value);
                          break;
                        case 'background_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp6_bgcolor_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp6_bgcolor_st').bootstrapSwitchZgpb('state', false);    
                            }
                          break;
                        case 'background_color':
                            tab.find('#uifm_fld_inp6_bgcolor').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_inp6_bgcolor').val(value);
                          break;
                        case 'distortion':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp6_distortion_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp6_distortion_st').bootstrapSwitchZgpb('state', false);    
                            }
                          break;
                        case 'behind_lines_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp6_behlines_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp6_behlines_st').bootstrapSwitchZgpb('state', false);    
                            }
                          break;  
                        case 'behind_lines':
                            tab.find('#uifm_fld_inp6_behlines').val(parseFloat(value));
                          break;  
                        case 'front_lines_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_inp6_frontlines_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_inp6_frontlines_st').bootstrapSwitchZgpb('state', false);    
                            }
                          break; 
                        case 'front_lines':
                            tab.find('#uifm_fld_inp6_frontlines').val(parseFloat(value));
                          break;
                    }
                break;
            case 'input7':
                //input
                switch(String(option)) {
                        case 'language':
                            tab.find('#uifm_fld_inp7_lang').val(value);
                            break;
                        case 'format':
                            tab.find('#uifm_fld_inp7_format').val(value);
                            break;
                    }
                break;   
            case 'input8':
                //input
                switch(String(option)) {
                        case 'value':
                            tab.find('#uifm_fld_input8_value').val(value);
                            break;
                    }
                break;
            case 'input9':
                //input
                switch(String(option)) {
                        case 'txt_star1':
                            tab.find('#uifm_fld_input9_star1').val(value);
                            break;
                        case 'txt_star2':
                            tab.find('#uifm_fld_input9_star2').val(value);
                            break;    
                        case 'txt_star3':
                            tab.find('#uifm_fld_input9_star3').val(value);
                            break;
                        case 'txt_star4':
                            tab.find('#uifm_fld_input9_star4').val(value);
                            break;    
                        case 'txt_star5':
                            tab.find('#uifm_fld_input9_star5').val(value);
                            break;    
                        case 'txt_norate':
                            tab.find('#uifm_fld_input9_norate').val(value);
                            break;    
                    }
                break;
            case 'input11':
                //input
                switch(String(option)) {
                        case 'text_val':
                            tab.find('#uifm_fld_input11_textval').val(value);
                            break;
                        case 'text_color':
                            tab.find('#uifm_fld_input11_textcolor').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_input11_textcolor').val(value);
                            break;    
                        case 'div_color':
                            tab.find('#uifm_fld_input11_barcolor').val(value);
                            break;
                        case 'div_col_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input11_divcol_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_input11_divcol_st').prop('checked', false);    
                            }
                            break;    
                        case 'text_size':
                            tab.find('#uifm_fld_input11_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input11_textbold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_input11_textbold').val(1);
                            }else{
                            tab.find('#uifm_fld_input11_textbold').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_input11_textbold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input11_textitalic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_input11_textitalic').val(1);
                            }else{
                            tab.find('#uifm_fld_input11_textitalic').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_input11_textitalic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input11_textu').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_input11_textu').val(1);
                            }else{
                            tab.find('#uifm_fld_input11_textu').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_input11_textu').val(0);
                            }
                            break;
                        
                        case 'font':
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_input11_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input11_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_input11_font_st').prop('checked', false);    
                            }
                            break;    
                    }
                break;
            case 'input14':
                //input
                switch(String(option)) { 
                    case 'obj_align':
                             /*reset*/
                             tab.find('#uifm_fld_inp14_objalign_2').parent().parent().find('input').prop('checked', false);
                             tab.find('#uifm_fld_inp14_objalign_2').parent().parent().find('label').removeClass('sfdc-active');
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_inp14_objalign_2').prop('checked', true);
                                        tab.find('#uifm_fld_inp14_objalign_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_inp14_objalign_3').prop('checked', true);
                                        tab.find('#uifm_fld_inp14_objalign_3').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                    
                                        tab.find('#uifm_fld_inp14_objalign_1').prop('checked', true);
                                        tab.find('#uifm_fld_inp14_objalign_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;
                    }
                break;
             case 'input15':
                //input
                switch(String(option)) { 
                    case 'txt_yes':
                            tab.find('#uifm_fld_inp15_txt_yes').val(value);
                            break;
                    case 'txt_no':
                            tab.find('#uifm_fld_inp15_txt_no').val(value);
                            break;      
                    }
                break;   
             case 'input16':
                //input
                switch(String(option)) { 
                    case 'extallowed':
                            tab.find('#uifm_fld_input16_extallowed').val(value);
                            break;
                    case 'maxsize':
                            tab.find('#uifm_fld_input16_maxsize').val(value);
                            break;        
                    case 'attach_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_input16_attachst').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_input16_attachst').bootstrapSwitchZgpb('state', false);    
                            }
                            break; 
                    case 'stl1':
                            switch(String(opt2)) {
                                case 'txt_selimage':
                                    tab.find('#uifm_fld_input16_txtselimage').val(value);  
                                    break;
                                case 'txt_change':
                                    tab.find('#uifm_fld_input16_txtchange').val(value);  
                                    break;
                                case 'txt_remove':
                                    tab.find('#uifm_fld_input16_txtremove').val(value);  
                                    break;  
                                    
                            }
                         
                         break;    
                    }
                break;
            case 'input17':
                //input2
                switch(String(option)) { 
                        case 'thopt_mode':
                            tab.find('#uifm_fld_inp17_thopt_mode').val(value);
                            break;
                        case 'thopt_height':
                            tab.find('#uifm_fld_inp17_thopt_height').val(value);
                            break;
                        case 'thopt_width':
                            tab.find('#uifm_fld_inp17_thopt_width').val(value);
                            break;
                        case 'thopt_zoom':
                            if(parseInt(value)===1){
                                tab.find('#uifm_fld_inp17_thopt_zoom').bootstrapSwitchZgpb('state', true);
                            }else{
                                tab.find('#uifm_fld_inp17_thopt_zoom').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'thopt_usethmb':
                            if(parseInt(value)===1){
                                tab.find('#uifm_fld_inp17_thopt_usethmb').bootstrapSwitchZgpb('state', true);
                            }else{
                                tab.find('#uifm_fld_inp17_thopt_usethmb').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'thopt_showhvrtxt':
                            tab.find('#uifm_fld_inp17_thopt_showhvrtxt').val(value);
                            break;   
                        case 'thopt_showcheckb':
                            if(parseInt(value)===1){
                                tab.find('#uifm_fld_inp17_thopt_showcheckb').bootstrapSwitchZgpb('state', true);
                            }else{
                                tab.find('#uifm_fld_inp17_thopt_showcheckb').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'options':
                            rocketform.input17settings_tabeditor_generateAllOptions();
                            break;
                        default:
                    }
                break;
            case 'input18':
                //input18
                switch(String(option)) { 
                        case 'text':
                            switch(String(opt2)) { 
                                case 'show_st':
                                       if(parseInt(value)===1){
                                        tab.find('#uifm_frm_inp18_txt_st').bootstrapSwitchZgpb('state', true);
                                        }else{
                                        tab.find('#uifm_frm_inp18_txt_st').bootstrapSwitchZgpb('state', false);    
                                        }
                                        break;
                                case 'html_cont':
                                       if( typeof tinymce != "undefined" ) {
                                            var editor = tinymce.get("uifm_frm_inp18_txt_cont");
                                            if( editor && editor instanceof tinymce.Editor ) {
                                                var content = decodeURIComponent(value);
                                                editor.setContent( content, {format : 'html'} );
                                            }else{
                                                $('textarea#uifm_frm_inp18_txt_cont').val(decodeURIComponent(value));

                                            }
                                        }else{
                                        }
                                        break;        
                                case 'html_pos':
                                        switch (parseInt(value)) {
                                            case 1:
                                                tab.find('#uifm_fld_inp18_txt_pos_2').prop('checked', true);
                                                tab.find('#uifm_fld_inp18_txt_pos_2').parent().addClass('sfdc-active');
                                                break;
                                            case 2:
                                                tab.find('#uifm_fld_inp18_txt_pos_3').prop('checked', true);
                                                tab.find('#uifm_fld_inp18_txt_pos_3').parent().addClass('sfdc-active');
                                                break;
                                            case 3:
                                                tab.find('#uifm_fld_inp18_txt_pos_4').prop('checked', true);
                                                tab.find('#uifm_fld_inp18_txt_pos_4').parent().addClass('sfdc-active');
                                                break;
                                            case 0:
                                            default:

                                                tab.find('#uifm_fld_inp18_txt_pos_1').prop('checked', true);
                                                tab.find('#uifm_fld_inp18_txt_pos_1').parent().addClass('sfdc-active');
                                                break;    
                                        }
                                        break;        
                                } 
                            break;
                        case 'pane_margin':
                            switch(String(opt2)) {
                                    case 'show_st':
                                        if(parseInt(value)===1){
                                        tab.find('#uifm_frm_inp18_marg_st').bootstrapSwitchZgpb('state', true);
                                        }else{
                                        tab.find('#uifm_frm_inp18_marg_st').bootstrapSwitchZgpb('state', false);    
                                        }
                                        break;
                                    case 'pos_top':
                                        tab.find('#uifm_frm_inp18_marg_top').val(value);
                                        break;
                                    case 'pos_right':
                                     tab.find('#uifm_frm_inp18_marg_right').val(value);
                                     break; 
                                    case 'pos_bottom':
                                     tab.find('#uifm_frm_inp18_marg_bottom').val(value);
                                     break; 
                                    case 'pos_left':
                                     tab.find('#uifm_frm_inp18_marg_left').val(value);
                                     break;  
                                } 
                            break;
                        case 'pane_padding':
                            switch(String(opt2)) {
                                    case 'show_st':
                                        if(parseInt(value)===1){
                                        tab.find('#uifm_frm_inp18_padd_st').bootstrapSwitchZgpb('state', true);
                                        }else{
                                        tab.find('#uifm_frm_inp18_padd_st').bootstrapSwitchZgpb('state', false);    
                                        }
                                        break;
                                    case 'pos_top':
                                        tab.find('#uifm_frm_inp18_padd_top').val(value);
                                        break;
                                    case 'pos_right':
                                     tab.find('#uifm_frm_inp18_padd_right').val(value);
                                     break; 
                                    case 'pos_bottom':
                                     tab.find('#uifm_frm_inp18_padd_bottom').val(value);
                                     break; 
                                    case 'pos_left':
                                     tab.find('#uifm_frm_inp18_padd_left').val(value);
                                     break;  
                                }
                            break;
                        case 'pane_background':    
                            //background
                            switch(String(opt2)) {
                                case 'show_st':
                                    if(parseInt(value)===1){
                                    tab.find('#uifm_frm_inp18_fmbg_st').bootstrapSwitchZgpb('state', true);
                                    }else{
                                    tab.find('#uifm_frm_inp18_fmbg_st').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'type':
                                    switch (parseInt(value)) {
                                            case 2:
                                                tab.find('#uifm_frm_inp18_fmbg_type_2').prop('checked', true);
                                                tab.find('#uifm_frm_inp18_fmbg_type_2').addClass('sfdc-active');
                                                //refresh option
                                                tab.find('#uifm_frm_inp18_fmbg_color_1').closest('.sfdc-row').hide();
                                                tab.find('#uifm_frm_inp18_fmbg_color_2').closest('.sfdc-row').show();
                                                tab.find('#uifm_frm_inp18_fmbg_color_3').closest('.sfdc-row').show();
                                                break;
                                            case 1:
                                            default:

                                                tab.find('#uifm_frm_inp18_fmbg_type_1').prop('checked', true);
                                                tab.find('#uifm_frm_inp18_fmbg_type_1').addClass('sfdc-active');
                                                //refresh option
                                                tab.find('#uifm_frm_inp18_fmbg_color_1').closest('.sfdc-row').show();
                                                tab.find('#uifm_frm_inp18_fmbg_color_2').closest('.sfdc-row').hide();
                                                tab.find('#uifm_frm_inp18_fmbg_color_3').closest('.sfdc-row').hide();
                                                break;    
                                        }
                                    break;
                                case 'start_color':
                                    tab.find('#uifm_frm_inp18_fmbg_color_2').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_frm_inp18_fmbg_color_2').val(value);
                                    break;
                                case 'end_color':
                                    tab.find('#uifm_frm_inp18_fmbg_color_3').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_frm_inp18_fmbg_color_3').val(value);
                                    break;
                                case 'solid_color':
                                    tab.find('#uifm_frm_inp18_fmbg_color_1').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_frm_inp18_fmbg_color_1').val(value);
                                    break;
                                case 'image':
                                    if(value){
                                        $('#uifm_frm_inp18_bg_imgurl').val(value);
                                        $('#uifm_frm_inp18_bg_srcimg_wrap').html('<img class="sfdc-img-thumbnail" src="'+value+'">');
                                    }else{
                                        $('#uifm_frm_inp18_bg_imgurl').val('');
                                        $('#uifm_frm_inp18_bg_srcimg_wrap').html('');
                                    }
                break;    
                                }
                            break;
                        case 'pane_border_radius':
                             //border radius
                                switch(String(opt2)) {
                                    case 'show_st':
                                        if(parseInt(value)===1){
                                        tab.find('#uifm_frm_inp18_fmbora_st').bootstrapSwitchZgpb('state', true);
                                        }else{
                                        tab.find('#uifm_frm_inp18_fmbora_st').bootstrapSwitchZgpb('state', false);    
                                        }
                                        break;
                                    case 'size':
                                        tab.find('#uifm_frm_inp18_fmbora_size').bootstrapSlider('setValue', parseInt(value));
                                        break;
                                    }
                            break;
                        case 'pane_border':
                            //border
                            switch(String(opt2)) {
                                case 'show_st':
                                    if(parseInt(value)===1){
                                    tab.find('#uifm_frm_inp18_fmbor_st').bootstrapSwitchZgpb('state', true);
                                    }else{
                                    tab.find('#uifm_frm_inp18_fmbor_st').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'color':
                                    tab.find('#uifm_frm_inp18_fmbor_color').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_frm_inp18_fmbor_color').val(value);
                                    break;
                                case 'style':
                                    switch (parseInt(value)) {
                                            case 2:
                                                tab.find('#uifm_frm_inp18_fmbor_style_2').prop('checked', true);
                                                tab.find('#uifm_frm_inp18_fmbor_style_2').addClass('sfdc-active');
                                                break;
                                            case 1:
                                            default:
                                                tab.find('#uifm_frm_inp18_fmbor_style_1').prop('checked', true);
                                                tab.find('#uifm_frm_inp18_fmbor_style_1').addClass('sfdc-active');
                                                break;    
                                        }
                                    break;
                                case 'width':
                                    tab.find('#uifm_frm_inp18_fmbor_width').bootstrapSlider('setValue', parseInt(value));
                                    break;    
                                }
                            break;
                        case 'pane_shadow':
                            // shadow
                            switch(String(opt2)) {
                                case 'show_st':
                                    if(parseInt(value)===1){
                                    tab.find('#uifm_frm_inp18_sha_st').bootstrapSwitchZgpb('state', true);
                                    }else{
                                    tab.find('#uifm_frm_inp18_sha_st').bootstrapSwitchZgpb('state', false);    
                                    }
                                    break;
                                case 'color':
                                    tab.find('#uifm_frm_inp18_sha_co').parent().colorpicker('setValue',value);
                                    tab.find('#uifm_frm_inp18_sha_co').val(value);
                                    break;
                                case 'h_shadow':

                                    tab.find('#uifm_frm_inp18_sha_x').bootstrapSlider('setValue', parseInt(value));

                                    break; 
                                case 'v_shadow':
                                    tab.find('#uifm_frm_inp18_sha_y').bootstrapSlider('setValue', parseInt(value));
                                    break;
                                case 'blur':
                                    tab.find('#uifm_frm_inp18_sha_blur').bootstrapSlider('setValue', parseInt(value));
                                    break;    
                                }
                             
                            break;
                        default:
                    }
                break;
                
            case 'input_date2':    
                $('#'+id).data('uifm_datepickr_flat').inputsettings_refresh_Options(option,tab,value); 
                break;
            case 'label':
                //label
                 
                switch(String(option)) {
                        case 'text':
                          tab.find('#uifm_fld_lbl_txt').val(value);
                            break;
                        case 'size':
                            
                            tab.find('#uifm_fld_lbl_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_bold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_lbl_bold').val(1);
                            }else{
                            tab.find('#uifm_fld_lbl_bold').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_lbl_bold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_italic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_lbl_italic').val(1);
                            }else{
                            tab.find('#uifm_fld_lbl_italic').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_lbl_italic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_u').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_lbl_u').val(1);
                            }else{
                            tab.find('#uifm_fld_lbl_u').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_lbl_u').val(0);
                            }
                            break;
                        case 'color':
                            
                            tab.find('#uifm_fld_lbl_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_lbl_color').val(value);
                            break;
                        case 'font':
                            
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_lbl_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_lbl_font_st').prop('checked', false);    
                            }
                            break;
                        case 'shadow_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_sha_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_lbl_sha_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'shadow_color':
                            tab.find('#uifm_fld_lbl_sha_co').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_lbl_sha_co').val(value);
                            break;
                        case 'shadow_x':
                            
                            tab.find('#uifm_fld_lbl_sha_x').bootstrapSlider('setValue', parseInt(value));
                            
                            
                            break;
                        case 'shadow_y':
                            
                            tab.find('#uifm_fld_lbl_sha_y').bootstrapSlider('setValue', parseInt(value));
                            
                            
                            break;
                        case 'shadow_blur':
                              
                            tab.find('#uifm_fld_lbl_sha_blur').bootstrapSlider('setValue', parseInt(value));
                            break;
                            
                        default:
                    }
                break;
            case 'sublabel':
                //sublabel
                switch(String(option)) {
                        case 'text':
                          tab.find('#uifm_fld_sublbl_txt').val(value);
                            break;
                       case 'size':
                            tab.find('#uifm_fld_sublbl_size').selectpicker('val', value);
                            break;
                        case 'bold':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_sublbl_bold').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_sublbl_bold').val(1);
                            }else{
                            tab.find('#uifm_fld_sublbl_bold').parent().removeClass('sfdc-active');    
                            tab.find('#uifm_fld_sublbl_bold').val(0);
                            }
                            break;
                        case 'italic':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_sublbl_italic').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_sublbl_italic').val(1);
                            }else{
                            tab.find('#uifm_fld_sublbl_italic').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_sublbl_italic').val(0);
                            }
                            break;
                        case 'underline':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_sublbl_u').parent().addClass('sfdc-active');
                            tab.find('#uifm_fld_sublbl_u').val(1);
                            }else{
                            tab.find('#uifm_fld_sublbl_u').parent().removeClass('sfdc-active');
                            tab.find('#uifm_fld_sublbl_u').val(0);
                            }
                            break;
                        case 'color':
                            tab.find('#uifm_fld_sublbl_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_sublbl_color').val(value);
                            break;
                        case 'font':
                            //if(value){
                            //tab.find('#uifm_fld_lbl_font').val('Marcellus SC')
                              uiformUpdateFontSelect('uifm_fld_sublbl_font',value);
                           // }
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_sublbl_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_sublbl_font_st').prop('checked', false);    
                            }
                            break;
                        case 'shadow_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_sublbl_sha_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_sublbl_sha_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'shadow_color':
                            tab.find('#uifm_fld_sublbl_sha_co').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_sublbl_sha_co').val(value);
                            break;
                        case 'shadow_x':
                            
                            tab.find('#uifm_fld_sublbl_sha_x').bootstrapSlider('setValue', parseInt(value));
                            
                            break;
                        case 'shadow_y':
                            
                            tab.find('#uifm_fld_sublbl_sha_y').bootstrapSlider('setValue', parseInt(value));
                            break;
                        case 'shadow_blur':
                            
                            tab.find('#uifm_fld_sublbl_sha_blur').bootstrapSlider('setValue', parseInt(value));
                            break;
                        default:
                    }
                break;
              case 'txt_block':
                //txt block
                switch(String(option)) {
                        case 'block_pos':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_lbl_blo_pos_2').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_pos_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_lbl_blo_pos_3').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_pos_3').parent().addClass('sfdc-active');
                                        break;
                                    case 3:
                                        tab.find('#uifm_fld_lbl_blo_pos_4').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_pos_4').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                    
                                        tab.find('#uifm_fld_lbl_blo_pos_1').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_pos_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        case 'block_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_lbl_block_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_lbl_block_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'block_align':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_lbl_blo_align_2').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_align_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_lbl_blo_align_3').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_align_3').parent().addClass('sfdc-active');
                                        break;
                                    case 0:
                                    default:
                                    
                                        tab.find('#uifm_fld_lbl_blo_align_1').prop('checked', true);
                                        tab.find('#uifm_fld_lbl_blo_align_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        default:
                    }
                break;
                case 'el_background':
                case 'el12_background':    
                case 'el13_background':
                      switch(String(section)) {
                        case 'el_background':
                            prefix_ind='';
                            break;
                        case 'el12_background':
                            prefix_ind='12';
                            break;
                        case 'el13_background':
                            prefix_ind='13';
                            break;
                    }
                    //background
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'type':
                            switch (parseInt(value)) {
                                    case 2:
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_type_2').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_type_2').find('input').parent().addClass('sfdc-active');
                                        //refresh option
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_1').closest('.sfdc-row').hide();
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_2').closest('.sfdc-row').show();
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_3').closest('.sfdc-row').show();
                                        break;
                                    case 1:
                                    default:
                                        
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_type_1').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_type_1').find('input').parent().addClass('sfdc-active');
                                        //refresh option
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_1').closest('.sfdc-row').show();
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_2').closest('.sfdc-row').hide();
                                        tab.find('#uifm_fld_elbg'+prefix_ind+'_color_3').closest('.sfdc-row').hide();
                                        break;    
                                }
                            break;
                        case 'start_color':
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_2').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_2').val(value);
                            break;
                        case 'end_color':
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_3').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_3').val(value);
                            break;
                        case 'solid_color':
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_1').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_elbg'+prefix_ind+'_color_1').val(value);
                            break;
                        }
                break;
                case 'el_border_radius':
                case 'el12_border_radius':
                case 'el13_border_radius':
                     switch(String(section)) {
                        case 'el_border_radius':
                            prefix_ind='';
                            break;
                        case 'el12_border_radius':
                            prefix_ind='12';
                            break;
                        case 'el13_border_radius':
                            prefix_ind='13';
                            break;
                    }
                    //border radius
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_elbora'+prefix_ind+'_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_elbora'+prefix_ind+'_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'size':
                            
                            tab.find('#uifm_fld_elbora'+prefix_ind+'_size').bootstrapSlider('setValue', parseInt(value));
                            break;
                        }
                break;
                case 'el_border':
                case 'el12_border':
                case 'el13_border':
                    switch(String(section)) {
                        case 'el_border':
                            prefix_ind='';
                            break;
                        case 'el12_border':
                            prefix_ind='12';
                            break;
                        case 'el13_border':
                            prefix_ind='13';
                            break;
                    }
                    //border
                    switch(String(option)) {
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'color':
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_color').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_color').val(value);
                            break;
                        case 'color_focus_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_colorfocus_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_colorfocus_st').prop('checked', false);    
                            }
                            break;
                        case 'color_focus':
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_colorfocus').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_colorfocus').val(value);
                            break;
                        case 'style':
                            switch (parseInt(value)) {
                                    case 2:
                                        tab.find('#uifm_fld_elbor'+prefix_ind+'_style_2').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_elbor'+prefix_ind+'_style_2').find('input').parent().addClass('sfdc-active');
                                        break;
                                    case 1:
                                    default:
                                        tab.find('#uifm_fld_elbor'+prefix_ind+'_style_1').find('input').prop('checked', true);
                                        tab.find('#uifm_fld_elbor'+prefix_ind+'_style_1').find('input').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        case 'width':
                           
                            tab.find('#uifm_fld_elbor'+prefix_ind+'_width').bootstrapSlider('setValue', parseInt(value));
                            break;    
                        }
                break;
                case 'help_block':
                    //help block
                    switch(String(option)) {
                        case 'text':
                            if( typeof tinymce != "undefined" ) {
                                
                                var editor = tinymce.get("uifm_fld_msc_text");
                                if( editor && editor instanceof tinymce.Editor ) {
                                    var content = decodeURIComponent(value);
                                    editor.setContent( content, {format : 'html'} );
                                }else{
                                    $('textarea#uifm_fld_msc_text').val(decodeURIComponent(value));
                                    
                                }
                            }else{
                            }
                          
                            break;
                        case 'show_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_hblock_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_hblock_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'font':
                            uiformUpdateFontSelect('uifm_fld_hblock_font',value);
                            break;
                        case 'font_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_hblock_font_st').prop('checked', true);    
                            }else{
                            tab.find('#uifm_fld_hblock_font_st').prop('checked', false);    
                            }
                            break;
                        case 'pos':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_hblock_pos_2').prop('checked', true);
                                        tab.find('#uifm_fld_hblock_pos_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_hblock_pos_3').prop('checked', true);
                                        tab.find('#uifm_fld_hblock_pos_3').parent().addClass('sfdc-active');
                                        break;
                                    case 3:
                                        tab.find('#uifm_fld_hblock_pos_4').prop('checked', true);
                                        tab.find('#uifm_fld_hblock_pos_4').parent().addClass('sfdc-active');
                                        break;    
                                    case 0:
                                    default:
                                        tab.find('#uifm_fld_hblock_pos_1').prop('checked', true);
                                        tab.find('#uifm_fld_hblock_pos_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;    
                        }
                break;
                case 'validate':
                    switch(String(option)) {
                        case 'typ_val':
                           //type validation
                        $('.uifm-f-setoption-gchecks').removeClass('sfdc-active'); 
                        $('.uifm-custom-validator').hide();
                            switch (parseInt(value)) {
                                    case 1:
                                        //alpha
                                        tab.find("#uifm-custom-val-alpha-btn").addClass('sfdc-active');
                                        tab.find('.uifm-custom-val-alpha').show();
                                        break;
                                    case 2:
                                        //alpha num
                                        tab.find("#uifm-custom-val-alphanum-btn").addClass('sfdc-active');
                                        tab.find('.uifm-custom-val-alphanum').show();
                                        break;
                                    case 3:
                                        //numeric
                                        tab.find("#uifm-custom-val-num-btn").addClass('sfdc-active');
                                        tab.find('.uifm-custom-val-num').show();
                                        break;
                                    case 4:
                                        //mail
                                        tab.find("#uifm-custom-val-mail-btn").addClass('sfdc-active');
                                       tab.find('.uifm-custom-val-mail').show();
                                        break;
                                    case 5:
                                        //required
                                         tab.find("#uifm-custom-val-req-btn").addClass('sfdc-active');
                                       tab.find('.uifm-custom-val-req').show();
                                        break;
                                }
                            
                            break;
                        case 'typ_val_custxt':
                            tab.find('.uifm-custom-val-custxt').val(value);
                            break;
                        case 'pos':
                            
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_val_pos_2').prop('checked', true);
                                        tab.find('#uifm_fld_val_pos_2').parent().addClass('sfdc-active');
                                        break;
                                    case 2:
                                        tab.find('#uifm_fld_val_pos_3').prop('checked', true);
                                        tab.find('#uifm_fld_val_pos_3').parent().addClass('sfdc-active');
                                        break;
                                    case 3:
                                        tab.find('#uifm_fld_val_pos_4').prop('checked', true);
                                        tab.find('#uifm_fld_val_pos_4').parent().addClass('sfdc-active');
                                        break;    
                                    case 0:
                                    default:
                                        tab.find('#uifm_fld_val_pos_1').prop('checked', true);
                                        tab.find('#uifm_fld_val_pos_1').parent().addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        case 'tip_col':
                            tab.find('#uifm_fld_val_tipcolor').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_val_tipcolor').val(value);
                            break;
                        case 'tip_bg':
                            tab.find('#uifm_fld_val_tipbg').parent().colorpicker('setValue',value);
                            tab.find('#uifm_fld_val_tipbg').val(value);
                            break;
                        case 'reqicon_st':
                            if(parseInt(value)===1){
                            tab.find('#uifm_fld_val_reqicon_st').bootstrapSwitchZgpb('state', true);
                            }else{
                            tab.find('#uifm_fld_val_reqicon_st').bootstrapSwitchZgpb('state', false);    
                            }
                            break;
                        case 'reqicon_pos':
                            switch (parseInt(value)) {
                                    case 1:
                                        tab.find('#uifm_fld_val_reqicon_pos_2').prop('checked', true);
                                        tab.find('#uifm_fld_val_reqicon_pos_2').addClass('sfdc-active');
                                        break;    
                                    case 0:
                                    default:
                                        tab.find('#uifm_fld_val_reqicon_pos_1').prop('checked', true);
                                        tab.find('#uifm_fld_val_reqicon_pos_1').addClass('sfdc-active');
                                        break;    
                                }
                            break;
                        case 'reqicon_img':
                            tab.find('#uifm_fld_val_reqicon_img').iconpicker('setIcon',value);
                            break;    
                        }
                break;
            case 'clogic':
                    //clogic
                    switch(String(option)) {
                        case 'show_st':
                             
                            if(parseInt(value)===1){
                                tab.find('#uifm_frm_clogic_st').bootstrapSwitchZgpb('state', true);
                                tab.find('#uifm-show-conditional-logic').show();
                            }else{
                                tab.find('#uifm_frm_clogic_st').bootstrapSwitchZgpb('state', false);    
                                tab.find('#uifm-show-conditional-logic').hide();
                            }
                            break;
                        case 'f_show':
                            tab.find('#uifm_frm_clogic_show').val(value);
                            break;
                        case 'f_all':
                            tab.find('#uifm_frm_clogic_all').val(value);
                            break;
                        case 'list':
                            rocketform.clogic_tabeditor_generateAllOptions(value);
                            break;    
                        }
                break;
            case 'skin':
                switch(String(option)) {
                                            case 'margin':
                                                /*check if touchspin is enabled*/
                                                switch(String(opt2)) {
                                                                case 'top':
                                                                    tab.find('#zgpb_fld_col_margin_top').val(value);
                                                                    break;
                                                                case 'bottom':
                                                                    tab.find('#zgpb_fld_col_margin_bottom').val(value);
                                                                     
                                                                    break;
                                                                case 'left':
                                                                    tab.find('#zgpb_fld_col_margin_left').val(value);
                                                                    break;
                                                                case 'right':
                                                                    tab.find('#zgpb_fld_col_margin_right').val(value);
                                                                    break;    
                                                            }
                                                          
                                                break;
                                            case 'padding':
                                                  /*check if touchspin is enabled*/
                                                switch(String(opt2)) {
                                                                case 'top':
                                                                    tab.find('#zgpb_fld_col_padding_top').val(value);
                                                                    break;
                                                                case 'bottom':
                                                                    tab.find('#zgpb_fld_col_padding_bottom').val(value);
                                                                    break;
                                                                case 'left':
                                                                    tab.find('#zgpb_fld_col_padding_left').val(value);
                                                                    break;
                                                                case 'right':
                                                                    tab.find('#zgpb_fld_col_padding_right').val(value);
                                                                    break;    
                                                            }
                                                break;
                                           
                                           case 'custom_css':
                                                switch(String(opt2)) {
                                                             case 'ctm_id':
                                                                     //tab.find('#zgpb_fld_col_ctmid').val(value);  
                                                                    break;
                                                             case 'ctm_class':
                                                                     tab.find('#zgpb_fld_col_ctmclass').val(value);  
                                                                    break;
                                                             case 'ctm_additional':
                                                                     tab.find('#zgpb_fld_ctmaddt').val(value);  
                                                                    break;       
                                                            }
                                                break;     
                                        }
                break;
            default:
                break;
        }
        }/* end try*/
        catch (ex) {
        console.error("setDataOptToSetTab ", ex.message);
        }
    }
   
    
    arguments.callee.enableSettingTabOnPick = function (id,type) {
         
        //show tabs
        switch (parseInt(type)) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
               $('#uifm-field-selected-id').val(id);
                $('.uifm-tab-selectedfield').show();
                $('.sfdc-nav-tabs a[href="#uiform-build-field-tab"]').sfdc_tab('show');
                /*$('.sfdc-nav-tabs a[href="#uiform-settings-tab-1"]').sfdc_tab('show');*/
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
               /*fileupload*/
            case 13:
               /*imageupload*/
            case 14:
                /*customhtml*/
            case 15:
                /*password*/
            case 16:
                /*slider*/
            case 17:
                /*range*/
            case 18:
                /*spinner*/
            case 19:
                /*captcha*/
            case 20:
                /*submit button*/
            case 21:
                /*hidden field*/    
            case 22:
                /*star rating*/    
            case 23:
                /*color picker*/    
            case 24:
                /*date picker*/    
            case 25:
                /*time picker*/    
            case 26:
                /*date time*/    
            case 27:
                /*recaptcha*/     
            case 28:
                /*prepended txt*/
            case 29:
                /*appended txt*/
            case 30:
                /*prepended - appended txt*/
            
            case 32:
                /*divider*/ 
            case 33:
                /*heading 1*/    
            case 34:
                /*heading 2*/
            case 35:
                /*heading 3*/
            case 36:
                /*heading 4*/
            case 37:
                /*heading 5*/
            case 38:
                /*heading 6*/
            case 40:
                /*switch*/
            case 41:
                /*dyn checkbox*/    
            case 42:
                /*dyn radiobtn*/
            case 43:
                /*date beta*/    
               $('#uifm-field-selected-id').val(id);
                $('.uifm-tab-selectedfield').show();
                $('.sfdc-nav-tabs a[href="#uiform-build-field-tab"]').sfdc_tab('show');
                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-1"]').sfdc_tab('show');
                break;
           case 31:
                /*panel*/  
           case 39:
                /*wizard buttons*/     
               $('#uifm-field-selected-id').val(id);
                $('.uifm-tab-selectedfield').show();
                
                $('.sfdc-nav-tabs a[href="#uiform-build-field-tab"]').sfdc_tab('show');
                /*pending to pass this to plugin instance*/
                $('.sfdc-nav-tabs a[href="#uiform-settings-tab-2"]').sfdc_tab('show');
                
                break;     
            case 0:
                
                break; 
            default: 
        }
        
        
        
    };
    arguments.callee.enableSettingTabOnCreate = function (id,type) {
        try{
        $('#uifm-field-selected-id').val(id);
        $('.uifm-tab-selectedfield').show();
        $('.sfdc-nav-tabs a[href="#uiform-build-field-tab"]').sfdc_tab('show');
        
       
        }/* end try*/
        catch (ex) {
        console.error(" error enableSettingTabOnCreate ", ex.message);
        }

    };
    arguments.callee.loadDataTabFromFStore = function (id,field_type) {
        switch (parseInt(field_type)) {
                        case 6:
                            //get textbox field
                             $('#'+id).data('uiform_textbox').loadSettingDataTab(id);
                            break;
        }
    }
    
    arguments.callee.loadForm_globalSettings = function () {
        //skin tab
        $('#uifm_frm_skin_bg_st').bootstrapSwitchZgpb('state',true);
        $('.uifm_frm_skin_bgcolor_event').colorpicker('setValue','#eeeeee');
        $('#uifm_frm_skin_bg_color').val('#eeeeee');
        rocketform.loadForm_tab_skin_updateBG();
        //refresh scrollpane
      /* $('.scroll-pane-arrows').jScrollPane(
                {
                        showArrows: true,
                        horizontalGutter: 10
                }
        ); */
        //set default tab
         $('.sfdc-nav-tabs a[href="#uiform-settings-tab3-2"]').sfdc_tab('show');
        
        
    }
    
    arguments.callee.loadForm_globalSettings_end = function () {
       
       
        
    }
    
    arguments.callee.loadFormSaved = function (id) {
        rocketform.showLoader(1,true,true);
       $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+'formbuilder/forms/ajax_load_form',
                    data: {
                       'action': 'rocket_fbuilder_load_form',
                       'page':'zgfm_form_builder',
                       'form_id':id,
                            'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        rocketform.loadFormToEditPanel(msg);
                        rocketform.loading_panelbox('rocketform-bk-dashboard',0);
                        
                        //core data refresh
                        rocketform.refresh_coreData();
                        
                        //wizard refresh
                        rocketform.wizardform_refresh();
                        
                         //set form variables
                        rocketform.formvariables_genListToIntMem();
                        //set customer mail select
                        rocketform.fieldsdata_email_genListToIntMem();
                        
                        
                        
                        /*hiding tooltip after loading form*/
                        zgfm_back_helper.tooltip_removeall();
                         
                    }
                });
    };
/*
* Refresh core data
*/
    arguments.callee.refresh_coreData = function () {
        //refresh core data
                                        var tmp_tab_title=mainrformb['steps']['tab_title'];
                                        var tmp_new_tab_title=[];
                                         
                                        for (var elem in tmp_tab_title) {  
                                                tmp_new_tab_title.push(tmp_tab_title[elem]);
                                               //tmp_new_tab_title[]=tmp_tab_title[elem];
                                            }
                                        mainrformb['steps']['tab_title']= tmp_new_tab_title;                                       

                                        var tmp_tab_cont=mainrformb['steps']['tab_cont'];
                                        var tmp_new_tab_cont=[];
                                        for (var elem in tmp_tab_cont) {  
                                                tmp_new_tab_cont.push(tmp_tab_cont[elem]);
                                               //tmp_new_tab_cont[]=tmp_tab_cont[elem];
                                            }
                                        mainrformb['steps']['tab_cont']= tmp_new_tab_cont;
                                        

                                        var tmp_steps_src=mainrformb['steps_src'];
                                        var tmp_new_steps_src=[];
                                        for (var elem in tmp_steps_src) {  
                                               tmp_new_steps_src.push(tmp_steps_src[elem]); 
                                               //tmp_new_steps_src[]=tmp_steps_src[elem];
                                            }
                                        mainrformb['steps_src']= tmp_new_steps_src;

                                        //num tabs
                                        mainrformb['num_tabs']= $.map(tmp_new_tab_title, function(n, i) { return i; }).length;
    };
    
    arguments.callee.loadFormToEditPanel_default = function (form_data) {
             
                                        
        if (typeof form_data != 'undefined' && form_data) {
     
        $('#uifm_frm_record_tpl_enable').bootstrapSwitchZgpb('state',form_data.data['fmb_rec_tpl_st']);
       
         var editor,content;
         if( typeof tinymce != "undefined" && form_data.data.hasOwnProperty('fmb_rec_tpl_html') && form_data.data['fmb_rec_tpl_html']!=null) {
                                            editor = tinymce.get("uifm_frm_record_tpl_content");
                                            if( editor && editor instanceof tinymce.Editor ) {
                                                content = form_data.data['fmb_rec_tpl_html'];
                                                editor.setContent( content, {format : 'html'} );
                                            }else{
                                                $('textarea#uifm_frm_record_tpl_content').val(form_data.data['fmb_rec_tpl_html']);
                                            }
                                        }  
}        
       
           //main tab
           if(typeof mainrformb['main'] == 'undefined') {
            this.setUiData('main',form_data.data.fmb_data['main']);
           }
         var tab;
        
             tab=$('#uiform-build-form-tab');
            
        $.each(mainrformb, function(i, value) {
           
                    switch(String(i)){
                        case 'main':
                        case 'onsubm':
                           
                          if($.isPlainObject(value)){
                               $.each(value, function(i2, value2) {
                                    rocketform.setDataOptToSetFormTab(tab,i,i2,value2);
                                        });
                             }else{
                             } 
                         break;
                    }
             
                });
          
             //form skin
              
            var form_tab_skin=this.getUiData('skin');
           tab=$('#uiform-settings-tab3-2');
            var obj_field=$('.uiform-preview-base');
        $.each(form_tab_skin, function(i, value) {
                    if($.isPlainObject(value)){
                               $.each(value, function(i2, value2) {
                                    rocketform.setDataOptToSetFormTab(tab,'skin',i+'-'+i2,value2);
                                    rocketform.setDataOptToPrevForm(obj_field,'skin',i+'-'+i2,value2);
                                });
                     }else{
                        rocketform.setDataOptToSetFormTab(tab,'skin',i+'-'+'',value);
                        rocketform.setDataOptToPrevForm(obj_field,'skin',i+'-',value);
                    }
                });
                
             //refresh live change
                rocketform.loadForm_tab_skin_updateBG();
              //refresh max width
        //rocketform.previewform_skin_maxwidth();
           
       
         var wiz_bg_st=(parseInt(this.getUiData2('wizard','enable_st'))===1)?true:false;
         
         if(wiz_bg_st){
             //refresh sortable forms
            enableSortableItems();
            //show wizard options
            $('.uiform_frm_wiz_main_content').show();
         }else{
            rocketform.wizardtab_gotoFirstPosition();
            //show wizard options
            $('.uiform_frm_wiz_main_content').hide();
         }
         
          //refresh event for clicking tabs
        rocketform.wizardtab_tabManageEvt();
          //load wizard options 
        rocketform.wizardtab_showOptions();
        //refresh setting tab
        rocketform.wizardtab_refreshTabSettings();
        //refresh tab skin
        rocketform.wizardtab_refreshPreview();
         
         rocketform.hideLoader();

        /*go to editor tab*/
        $('a[href="#uiformc-menu-sec1"]').sfdc_tab('show');
        //trigger resize - For grid
        $(window).trigger('resize');
    }
    
    arguments.callee.loadFormToEditPanel = function (form_data) {
        try {
            /* set variables*/
            
            var mainrformb_tmp = {
                        main:form_data.data.fmb_data['main'],
                        skin:form_data.data.fmb_data['skin'],
                        wizard:form_data.data.fmb_data['wizard'],
                        onsubm:form_data.data.fmb_data['onsubm'],
                        num_tabs:form_data.data.fmb_data['num_tabs'],
                        steps: form_data.data.fmb_data['steps'],
                        steps_src:form_data.data.fmb_data['steps_src']
                    };
            mainrformb = $.extend( true,{}, mainrformb, mainrformb_tmp );
            
             //get addon info
            for (var key in form_data.addons) {
                if (form_data.addons.hasOwnProperty(key)) {
                   //update settings
                    zgfm_back_addon.load_addon(key,form_data.addons[key]);
                }
            }
            
            //clean again
            rocketform.saveform_cleanForm2();
            
            //check for upgrade changes
            zgfm_back_upgrade.initialize();
            
             //show preview help text
            rocketform.guidedtour_showTextOnPreviewPane(false);
            
            $('.uiform-preview-base').html(form_data.data.fmb_html_backend);
            
            //autocomplete off - chrome issue
            $('input,textarea').attr('autocomplete', 'off');
                            $('#zgfm_edit_panel').disableAutoFill({
                 passwordField: '.password'}
             );
            
            /*check if preview html was loaded properly*/
            if(parseInt($('.uiform-main-form').length)!=0){
            }else{
                rocketform.loadFormSaved_regenerateForm();
                return;
            }
       
        //form title
        $('#uifm_frm_main_title').val(form_data.data.fmb_name);
        $.each(mainrformb['steps_src'], function(index, value) {
            $.each(value, function(index2, value2) {
                 
                rocketform.enableFieldPlugin(index,value2.id,value2.type,value2);
            });
         });
        
        
         if(typeof mainrformb['steps'] == 'undefined') {
                mainrformb['steps']={};
                this.setUiData('num_tabs',form_data.data.fmb_data['num_tabs']);
                this.setUiData('steps',form_data.data.fmb_data['steps']);
                
              }
            
       
         //load form content tab
         //on submission tab
         if(typeof mainrformb['onsubm'] == 'undefined') {
                mainrformb['onsubm']={};
                this.setUiData('onsubm',form_data.data.fmb_data['onsubm']);
                
              }    
             //skin tab
            if(typeof mainrformb['skin'] == 'undefined') {
                mainrformb['skin']={};
                this.setUiData('skin',form_data.data.fmb_data['skin']);

            }    
                
           /* wizard tab*/
            if(typeof mainrformb['wizard'] == 'undefined') {
                mainrformb['wizard']={};
                this.setUiData('wizard',form_data.data.fmb_data['wizard']);
            }     
          rocketform.loadFormToEditPanel_default(form_data);       
                
                
            
        }/* end try*/
        catch (ex) {
        console.error(" load form error : ", ex.message);
        }
        
    }
     
    
    arguments.callee.validateFieldOptions = function (data_field) {
        var data_return = {};
       // data_return= {data:{}};
       data_return= {data:data_field};
        $.each(data_field, function(index, value) {
            if($.isPlainObject(value)) {
                $.each(value, function(index2, value2) {
                 data_return['data'][index][index2]=rocketform.validateValueFieldOptions(index,index2,value2);
                });
            } else {
                 data_return['data'][index]=rocketform.validateValueFieldOptions(index,value,false);
            }
        });
        
        return data_return;
    }
    
    arguments.callee.validateValueFieldOptions = function (section,option,value) {
        
        var value_return;
        value_return=value;
         //setting data to section
        switch(String(section)) {
            case 'id':
            case 'type_n':
            case 'field_name':
            case 'order_frm':    
            case 'order_rec':    
                value_return=option;
            break;
            case 'skin':
                value_return=[];
            break;
            case 'type':
                value_return=parseInt(option);
                break;
            case 'input':
                //input
                switch(String(option)) {
                        case 'value':
                            value_return=value;
                            break;
                        case 'size':
                        case 'bold':
                        case 'italic':
                        case 'underline':
                           value_return=parseInt(value);
                            break;
                        case 'placeholder':
                         case 'color':
                            value_return=value;
                            break;
                        case 'font':
                            value_return=value;
                            this.loadFontSaved(value);
                            break;
                        case 'font_st':
                        case 'val_align':
                            value_return=parseInt(value); 
                            break;
                        default:
                    }
                break;   
            case 'label':
                //label
                switch(String(option)) {
                        case 'text':
                          value_return=value;
                            break;
                        case 'size':
                        case 'bold':
                        case 'italic':
                        case 'underline':
                           value_return=parseInt(value);
                            break;
                        case 'color':
                            value_return=value;
                            break;
                        case 'font':
                            value_return=value;
                            this.loadFontSaved(value);
                            break;
                        case 'font_st':
                        case 'shadow_st':
                            value_return=parseInt(value);
                            break;
                        case 'shadow_color':
                            value_return=value;
                            break;
                        case 'shadow_x':
                        case 'shadow_y':
                        case 'shadow_blur':
                            value_return=parseInt(value);
                            break;
                        default:
                    }
                break;
            case 'sublabel':
                //label
                switch(String(option)) {
                        case 'text':
                          value_return=value;
                            break;
                        case 'size':
                        case 'bold':
                        case 'italic':
                        case 'underline':
                           value_return=parseInt(value);
                            break;
                        case 'color':
                            value_return=value;
                            break;
                        case 'font':
                            value_return=value;
                            this.loadFontSaved(value);
                            break;
                        case 'font_st':
                        case 'shadow_st':
                            value_return=parseInt(value);
                            break;
                        case 'shadow_color':
                            value_return=value;
                            break;
                        case 'shadow_x':
                        case 'shadow_y':
                        case 'shadow_blur':
                            value_return=parseInt(value);
                            break;
                        default:
                    }
                break;
             case 'txt_block':
                //txt_block
                switch(String(option)) {
                        
                        case 'block_pos':
                        case 'block_st':
                        case 'block_align':
                            value_return=parseInt(value);
                            break;
                        default:
                    }
                break;
             case 'validate':
                //validate
                switch(String(option)) {
                        case 'typ_val':
                         value_return=parseInt(value);
                         
                            break;
                        case 'typ_val_custxt':
                        case 'pos':
                        case 'tip_col':
                        case 'tip_bg':
                        case 'reqicon_st':
                        case 'reqicon_pos':
                        case 'reqicon_img':
                        default:
                            value_return=value;
                            break;
                        
                    }
                break;   
            default:
                value_return=value;
                break;
                
        }
        
        return value_return;
    }
    arguments.callee.loadFontSaved = function (value) {
			if ( value!='' ) {
                            // Convert JSON string value to JSON object
                            var font = JSON.parse( value );

                            // Add @import to <head> if needed 
                            if ( undefined !== font.import_family ) {
                                    var atImport = '@import url(//fonts.googleapis.com/css?family='+font.import_family;
                                    $( '<style>' ).append( atImport ).appendTo( 'head' );
                            }	
			}
    }
    arguments.callee.enableFieldPlugin = function (step_pane,id,field_type,data_field) {
      
      try{
           
      var set_option
        ,field_instance;
         var el_table;
         
        //  set_option= {data:data_field};
         
        switch (parseInt(field_type)) {
                        case 6:
                        /*TEXTBOX*/
                        case 7:
                        /*TEXTAREA*/
                        case 8:
                        /* radio button*/
                        case 9:
                        /* checkbox*/
                        case 10:
                        /* select*/
                        case 11:
                        /* multiselect*/
                        case 12:  
                             /*fileupload*/
                        case 13:  
                             /*imageupload*/
                        case 14:  
                             /*customhtml*/
                        case 15:  
                             /*password*/
                        case 16:  
                             /*slider*/
                        case 17:  
                             /*range*/
                        case 18:  
                             /*spinner*/
                        case 19:
                            /*captcha*/
                        case 20:
                            /*submit btn*/    
                        case 21:
                            /*hidden field*/    
                        case 22:
                            /*star rating*/    
                        case 23:
                            /*color picker*/    
                        case 24:
                            /*date picker*/     
                        case 25:
                            /*time picker*/    
                        case 26:
                            /*date time*/    
                        case 27:
                            /*recaptcha*/
                        case 28:  
                             /*prep text*/
                        case 29:  
                             /*app text*/
                        case 30:
                             /*prep - app text*/
                        case 31:
                             /*panel*/     
                        case 32:
                             /*divider*/     
                        case 39:
                             /*wizard buttons*/
                        case 40:
                             /*switch*/
                        case 41:
                             /*dyn checkbox*/
                        case 42:
                             /*dyn radiobtn*/
                        case 43:
                             /*date beta*/     
                             
                            //enable field
                            //set_option=rocketform.validateFieldOptions(data_field);
                            
                           set_option= data_field;
                            
                            switch (parseInt(field_type)) {
                                case 6:
                                    $('#'+id).uiform_textbox();
                                    field_instance =$('#'+id).data('uiform_textbox');
                                  break;
                                case 7:
                                    $('#'+id).uiform_textarea();
                                    field_instance =$('#'+id).data('uiform_textarea');
                                  break;
                                case 8:
                                    $('#'+id).uiform_radiobtn();
                                    field_instance =$('#'+id).data('uiform_radiobtn');
                                    break;
                                case 9:
                                    $('#'+id).uiform_checkbox();
                                    field_instance =$('#'+id).data('uiform_checkbox');
                                    break;
                                case 10:
                                    $('#'+id).uiform_select();
                                    field_instance =$('#'+id).data('uiform_select');
                                    break;
                                case 11:
                                    $('#'+id).uiform_multiselect();
                                    field_instance =$('#'+id).data('uiform_multiselect');
                                    break;
                                case 12:
                                    /*fileupload*/
                                    $('#'+id).uiform_fileupload();
                                    field_instance =$('#'+id).data('uiform_fileupload');
                                    break;
                                case 13:
                                    /*imageupload*/
                                    $('#'+id).uiform_imageupload();
                                    field_instance =$('#'+id).data('uiform_imageupload');
                                    break;
                                case 14:
                                    /*customhtml*/
                                    $('#'+id).uiform_customhtml();
                                    field_instance =$('#'+id).data('uiform_customhtml');
                                    break;
                                case 15:
                                    /*password*/
                                    $('#'+id).uiform_password();
                                    field_instance =$('#'+id).data('uiform_password');
                                    break;
                                case 16:
                                    /*slider*/
                                    $('#'+id).uiform_slider();
                                    field_instance =$('#'+id).data('uiform_slider');
                                    break;
                                case 17:
                                    /*range*/
                                    $('#'+id).uiform_range();
                                    field_instance =$('#'+id).data('uiform_range');
                                    break;
                                case 18:
                                    /*spinner*/
                                    $('#'+id).uiform_spinner();
                                    field_instance =$('#'+id).data('uiform_spinner');
                                    break;
                                case 19:
                                    /*captcha*/
                                    $('#'+id).uiform_captcha();
                                    field_instance =$('#'+id).data('uiform_captcha');
                                    break;
                                case 20:
                                    /*submit button*/
                                    $('#'+id).uiform_submitbtn();
                                    field_instance =$('#'+id).data('uiform_submitbtn');
                                    break;
                                case 21:
                                    /*hidden input*/
                                    $('#'+id).uiform_hiddeninput();
                                     field_instance =$('#'+id).data('uiform_hiddeninput');    
                                    break;
                                case 22:
                                    /*star rating*/
                                    $('#'+id).uiform_ratingstar();
                                    field_instance =$('#'+id).data('uiform_ratingstar');
                                    break;
                                case 23:
                                    /*color picker*/
                                    $('#'+id).uiform_colorpicker();
                                    field_instance =$('#'+id).data('uiform_colorpicker');
                                    break;    
                                case 24:
                                    /*datepicker*/
                                    $('#'+id).uiform_datepicker();
                                    field_instance =$('#'+id).data('uiform_datepicker');
                                    break;
                                case 25:
                                    /*timepicker*/
                                    $('#'+id).uiform_timepicker();
                                    field_instance =$('#'+id).data('uiform_timepicker');
                                    break;    
                                case 26:
                                    /*date time*/
                                    $('#'+id).uiform_datetime();
                                    field_instance =$('#'+id).data('uiform_datetime');
                                    break;    
                                case 27:
                                    /*recaptcha*/
                                    $('#'+id).uiform_recaptcha();
                                    field_instance =$('#'+id).data('uiform_recaptcha');
                                    break;    
                                case 28:
                                    /*prep txt*/
                                    $('#'+id).uiform_preptext();
                                    field_instance =$('#'+id).data('uiform_preptext');
                                    break;
                                case 29:
                                    /*app txt*/
                                    $('#'+id).uiform_appetext();
                                    field_instance =$('#'+id).data('uiform_appetext');
                                    break;
                                case 30:
                                    /*prep - app txt*/
                                    $('#'+id).uiform_prepapptext();
                                    field_instance =$('#'+id).data('uiform_prepapptext');
                                    break;
                                case 31:
                                    /*panel*/
                                    $('#'+id).uiform_panelfld();
                                    field_instance =$('#'+id).data('uiform_panelfld');
                                    break;    
                                case 32:
                                    /*divider*/
                                    $('#'+id).uiform_divider();
                                    field_instance =$('#'+id).data('uiform_divider');
                                    break;
                                case 39:
                                    /*wizard buttons*/
                                    $('#'+id).uiform_wizardbtn();
                                    field_instance =$('#'+id).data('uiform_wizardbtn');
                                    break;    
                                case 40:
                                    /*switch*/
                                    $('#'+id).uiform_switch();
                                    field_instance =$('#'+id).data('uiform_switch');
                                    break;
                                case 41:
                                    /*dyn checkbox*/
                                    $('#'+id).uiform_dyncheckbox();
                                    field_instance =$('#'+id).data('uiform_dyncheckbox');
                                    break;
                                case 42:
                                    /*dyn radiobtn*/
                                    $('#'+id).uiform_dynradiobtn();
                                    field_instance =$('#'+id).data('uiform_dynradiobtn');
                                    break;
                                case 43:
                                    /*date beta*/
                                    $('#'+id).uifm_datepickr_flat();
                                    field_instance =$('#'+id).data('uifm_datepickr_flat');
                                    break;
                            }
                            
                            //assign settings data
                            field_instance.update_settingsData(set_option); 
                            
                            //assign step
                            field_instance.setStep(step_pane);
                            
                            field_instance.updateVarData(id);
                            
                            //init events
                            field_instance.init_events();
                            
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            //update preview field
                            field_instance.update_previewfield(id);
                            
                            break;   
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                            //columns
                            set_option= data_field;
                            
                           // set_option=data_field;
                            $('#'+id).zgpbld_gridsystem();
                           
                            field_instance =$('#'+id).data('zgpbld_gridsystem');
                             
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                             
                            
                            switch (parseInt(field_type)) {
                                    case 1:
                                        field_instance.setToDatalvl1('type',1);
                                        field_instance.setToDatalvl1('type_n','grid1');
                                        break;
                                    case 2:
                                        field_instance.setToDatalvl1('type',2);
                                        field_instance.setToDatalvl1('type_n','grid2');
                                        break;
                                    case 3:
                                        field_instance.setToDatalvl1('type',3);
                                        field_instance.setToDatalvl1('type_n','grid3');
                                        break;    
                                    case 4:
                                        field_instance.setToDatalvl1('type',4);
                                        field_instance.setToDatalvl1('type_n','grid4');
                                        break;
                                    case 5:
                                        //six columns
                                        field_instance.setToDatalvl1('type',5);
                                        field_instance.setToDatalvl1('type_n','grid6');
                                        break;    
                                }
                           
                             
                            //delete this because when enabling, you dont neet to create again the blocks    
                            //generate block attributes
                            //field_instance.createBlockAttributes();
                            
                            //assign settings data
                            field_instance.update_settingsData(set_option);  
                            
                            //assign step
                            field_instance.setStep(step_pane);
                            
                            //attach data to object
                            field_instance.updateVarData(id);
                            
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                            //update preview field
                            field_instance.update_previewfield(id);
                           
                            //assign effecto col resizable
                            $('#'+id).zgpbld_grid();
                            //$('#'+id).zgpbld_grid(); 
                             
                             
                            break; 
                        case 33:
                        case 34:
                        case 35:
                        case 36:
                        case 37:
                        case 38:
                            //headings
                            //set_option=rocketform.validateFieldOptions(data_field);
                          //  set_option=data_field;
                            
                            set_option= data_field;
                            
                            $('#'+id).uiform_heading();
                          
                            field_instance =$('#'+id).data('uiform_heading');
                            
                            
                            //init events
                            //field_instance.init_events();
                            
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            
                            //assign settings data
                            field_instance.update_settingsData(set_option);  
                            
                            //assign step
                            field_instance.setStep(step_pane);
                            
                            //init events
                            field_instance.init_events();
                            
                            field_instance.updateVarData(id);
                            
                            switch (parseInt(field_type)) {
                                    case 33:
                                        /*heading1*/
                                        field_instance.setToDatalvl1('type',33);
                                        field_instance.setToDatalvl1('type_n','heading1');
                                        break;
                                    case 34:
                                        /*heading2*/
                                        field_instance.setToDatalvl1('type',34);
                                        field_instance.setToDatalvl1('type_n','heading2');
                                        break;
                                    case 35:
                                        /*heading3*/
                                        field_instance.setToDatalvl1('type',35);
                                        field_instance.setToDatalvl1('type_n','heading3');
                                        break;    
                                    case 36:
                                        /*heading4*/
                                        field_instance.setToDatalvl1('type',36);
                                        field_instance.setToDatalvl1('type_n','heading4');
                                        break;
                                    case 37:
                                        /*heading5*/
                                        field_instance.setToDatalvl1('type',37);
                                        field_instance.setToDatalvl1('type_n','heading5');
                                        break;
                                    case 38:
                                        /*heading6*/
                                        field_instance.setToDatalvl1('type',38);
                                        field_instance.setToDatalvl1('type_n','heading6');
                                        break;    
                                }
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                           //update preview field
                            field_instance.update_previewfield(id);
                            break;
        }
        
        
        //refresh sortable
        enableDraggableItems();
        enableSortableItems();
        
        }/* end try*/
        catch (ex) {
          console.error(" enableFieldPlugin error : ", ex.message+' - type: '+field_type+' - id : '+id+' - options : '+rocketform.dumpvar2(set_option));
      }
        
    }
    
    arguments.callee.getFieldsAfterDraggable = function (element,field_type,isClicked,id_doubled) {
            //hide popups
            
            this.previewfield_hideAllPopOver();
                var fieldhtml=''
                    ,id,suffixid,field_instance;
              //hide preview help text
              rocketform.guidedtour_showTextOnPreviewPane(false);
              /*check if is duplicated*/
              var Opt_Doubled={};
              if(parseInt(id_doubled.length)>0){
                  var f_step = $('#'+id_doubled).closest('.uiform-step-pane').data('uifm-step');
                  var tmp_Opt_Doubled=rocketform.getUiData3('steps_src',f_step,id_doubled);
                  var tmp2_Opt_Doubled=$.extend(true, {}, tmp_Opt_Doubled);
                  Opt_Doubled={data:tmp2_Opt_Doubled};
              }
             
              //generating id
              id='ui'+rocketform.generateUniqueID();
              suffixid=rocketform.generateSuffixID(999,9999);
              //get step number
              var step_pane=$(element).closest('.uiform-step-pane').data("uifm-step");
              
              var tmp_fld_load=[];
              
              var uifm_afterdrag_timer;              
              switch (parseInt(field_type)) {
                        case 6:
                            /*TEXTBOX*/
                            //get textbox field
                            fieldhtml=$('#uiform-fields-templates .uiform-textbox').clone();
                            fieldhtml.attr("id",id);

                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                             
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            
                            //assign plugin
                             
                            $('#'+id).uiform_textbox(Opt_Doubled);
                           
                            //refresh grid when fields are inserted
                           /* if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                $(window).trigger('resize');
                                }*/
                                        
                            field_instance =$('#'+id).data('uiform_textbox');
                           
                           //assign step
                            field_instance.setStep(step_pane);
                           //init events
                            field_instance.init_events();
                           
                            //enable tab
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            
                            field_instance.setFieldName(suffixid);
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                            
                             var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                           
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                        //enable setting tab
                                        
                                        rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        //load field options
                                        
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        rocketform.setHighlightPicked($('#'+id));
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        
                                        //rocketform.loading_boxField(id,0);
                                        
                                        
                                        
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                    
                                    //refresh grid when fields are inserted
                                    /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                        $(window).trigger('resize');
                                        
                                        }*/
                                   }
                                },1000);
                           }
                            
                            
                            break;
                        case 7:
                            /*TEXTAREA*/
                            //get field
                            fieldhtml=$('#uiform-fields-templates .uiform-textarea').clone();
                            fieldhtml.attr("id",id);
                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            //assign plugin
                            $('#'+id).uiform_textarea(Opt_Doubled);
                            
                            //refresh grid when fields are inserted
                           /* if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                $(window).trigger('resize');
                                }*/
                                        
                            field_instance =$('#'+id).data('uiform_textarea');
                            
                            //assign step
                            field_instance.setStep(step_pane);
                             //init events
                            field_instance.init_events();
                            
                            //enable tab
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            field_instance.setFieldName(suffixid);
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                              var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                           
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                        //enable setting tab
                                        rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        
                                         //load field options
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        
                                        rocketform.setHighlightPicked($('#'+id));
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        //rocketform.loading_boxField(id,0);
                                        
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                    
                                    //refresh grid when fields are inserted
                                    /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                        $(window).trigger('resize');
                                        
                                        }*/
                                   }
                                },1000);
                           }
                           
                            break;
                        case 27:
                            /*recaptcha*/
                             fieldhtml=$('#uiform-fields-templates .uiform-recaptcha').clone();
                            fieldhtml.attr("id",id);
                            fieldhtml.find('.uifm-input-recaptcha').attr('id','uifmobj-'+id);
                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            //assign plugin
                            $('#'+id).uiform_recaptcha(Opt_Doubled);
                            //refresh grid when fields are inserted
                            /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                $(window).trigger('resize');
                                }*/
                                        
                            field_instance =$('#'+id).data('uiform_recaptcha');
                            //assign step
                            field_instance.setStep(step_pane);
                            //init events
                            field_instance.init_events();
                            
                            //enable tab
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                             var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                           
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                        //enable setting tab
                                        rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                         //load field options
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        rocketform.setHighlightPicked($('#'+id));
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        //rocketform.loading_boxField(id,0);
                                        
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                    
                                    //refresh grid when fields are inserted
                                    /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                        $(window).trigger('resize');
                                        
                                        }*/
                                   }
                                },1000);
                            }
                            break;
                        case 8:
                        /*RADIO BUTTON*/
                        case 9:
                        /*CHECKBOX*/
                        case 10:
                        /*SELECT*/
                        case 11:
                        /*MULTISELECT*/
                        case 12:    
                            /*fileupload*/
                        case 13:    
                            /*imageupload*/
                        case 14:    
                            /*customhtml*/
                        case 15:    
                            /*password*/
                        case 16:    
                            /*slider*/
                        case 17:    
                            /*range*/
                        case 18:    
                            /*spinner*/
                        case 19:    
                            /*captcha*/
                        case 20:    
                            /*submit button*/    
                        case 21:    
                            /*hidden input*/
                        case 22:    
                            /*star rating*/    
                        case 23:    
                            /*color picker*/    
                        case 24:    
                            /*date picker*/
                        case 25:    
                            /*time picker*/
                        case 26:    
                            /*date time*/    
                        case 28:    
                            /*prep txt*/
                        case 29:    
                            /*app txt*/
                        case 30:
                            /*prep - app txt*/
                        case 31:
                            /*panel*/    
                        case 32:
                            /*divider*/
                        case 39:
                            /*wizard buttons*/
                        case 40:
                            /*switch*/
                        case 41:
                            /*dyn checkbox*/
                        case 42:
                            /*dyn radiobutton*/ 
                        case 43:
                            /*date beta*/     
                            //get field
                            switch (parseInt(field_type)) {
                                case 8:
                                    fieldhtml=$('#uiform-fields-templates .uiform-radiobtn').clone();
                                 break;
                                case 9:
                                    fieldhtml=$('#uiform-fields-templates .uiform-checkbox').clone();    
                                 break;
                                case 10:
                                    fieldhtml=$('#uiform-fields-templates .uiform-select').clone();    
                                break;
                                case 11:
                                    fieldhtml=$('#uiform-fields-templates .uiform-multiselect').clone();    
                                break;
                                case 12:
                                    /*fileupload*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-fileupload').clone();
                                break;
                                case 13:
                                    /*imageupload*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-imageupload').clone();
                                    break;
                                case 14:
                                    /*customhtml*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-customhtml').clone();    
                                    break;
                                case 15:
                                    /*password*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-password').clone();    
                                    break;
                                case 16:
                                    /*slider*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-slider').clone();    
                                    break;
                                case 17:
                                    /*range*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-range').clone();    
                                    break;
                                case 18:
                                    /*spinner*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-spinner').clone();    
                                    break;
                                case 19:
                                    /*captcha*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-captcha').clone();    
                                    break;
                                case 20:
                                    /*submit button*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-submitbtn').clone();    
                                    break;
                                case 21:
                                    /*hidden field*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-hiddeninput').clone();    
                                    break;
                                case 22:
                                    /*star rating*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-ratingstar').clone();    
                                    break;
                                case 23:
                                    /*color picker*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-colorpicker').clone();    
                                    break;    
                                case 24:
                                    /*date picker*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-datepicker').clone();    
                                    break;
                                case 25:
                                    /*time picker*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-timepicker').clone();    
                                    break;
                                case 26:
                                    /*date time*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-datetime').clone();    
                                    break;     
                                case 28:
                                    /*prep txt*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-preptext').clone();    
                                    break;
                                case 29:
                                    /*app txt*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-appetext').clone();    
                                    break;
                                case 30:
                                    /*prep - app txt*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-prepapptext').clone();
                                    break;
                                case 31:
                                    /*panel*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-panelfld').clone();
                                    break;    
                                case 32:
                                    /*divider*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-divider').clone();
                                    break;
                                case 39:
                                    /*wizard buttons*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-wizardbtn').clone();
                                    break;
                                case 40:
                                    /*switch*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-switch').clone();
                                    break;
                                case 41:
                                    /*dyn checkbox*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-dyncheckbox').clone();
                                    break;
                                case 42:
                                    /*dyn radiobtn*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-dynradiobtn').clone();
                                    break;
                                case 43:
                                    /*date beta*/
                                    fieldhtml=$('#uiform-fields-templates .uiform-datetime2').clone();
                                    break;    
                            }
                            
                            fieldhtml.attr("id",id);
                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            //assign plugin
                            switch (parseInt(field_type)) {
                                case 8:
                                    $('#'+id).uiform_radiobtn(Opt_Doubled);
                                 break;
                                case 9:
                                    $('#'+id).uiform_checkbox(Opt_Doubled);
                                 break;
                                case 10:
                                    $('#'+id).uiform_select(Opt_Doubled);
                                break;
                                case 11:
                                    $('#'+id).uiform_multiselect(Opt_Doubled);
                                    break;
                                case 12:
                                    /*fileupload*/
                                    $('#'+id).uiform_fileupload(Opt_Doubled);
                                break;
                                case 13:
                                    /*imageupload*/
                                    $('#'+id).uiform_imageupload(Opt_Doubled);
                                break;
                                case 14:
                                    /*customhtml*/
                                    $('#'+id).uiform_customhtml(Opt_Doubled);
                                    break;
                                case 15:
                                    /*password*/
                                    $('#'+id).uiform_password(Opt_Doubled);
                                    break;
                                case 16:
                                    /*slider*/
                                    $('#'+id).uiform_slider(Opt_Doubled);
                                    break;
                                case 17:
                                    /*range*/
                                    $('#'+id).uiform_range(Opt_Doubled);
                                    break;
                                case 18:
                                    /*spinner*/
                                    $('#'+id).uiform_spinner(Opt_Doubled);
                                    break;
                                case 19:
                                    /*captcha*/
                                    $('#'+id).uiform_captcha(Opt_Doubled);
                                    break;
                                case 20:
                                    /*submit button*/
                                    $('#'+id).uiform_submitbtn(Opt_Doubled);
                                    break;
                                case 21:
                                    /*hidden field*/
                                    $('#'+id).uiform_hiddeninput(Opt_Doubled);
                                    break;
                                case 22:
                                    /*star rating*/
                                    $('#'+id).uiform_ratingstar(Opt_Doubled);
                                    break;
                                case 23:
                                    /*color picker*/
                                    $('#'+id).uiform_colorpicker(Opt_Doubled);
                                    break;    
                                case 24:
                                    /*datepicker*/
                                    $('#'+id).uiform_datepicker(Opt_Doubled);
                                    break;
                                case 25:
                                    /*timepicker*/
                                    $('#'+id).uiform_timepicker(Opt_Doubled);
                                    break;
                                case 26:
                                    /*datetime*/
                                    $('#'+id).uiform_datetime(Opt_Doubled);
                                    break;    
                                case 28:
                                    /*prepended txt*/
                                    $('#'+id).uiform_preptext(Opt_Doubled);
                                    break;
                                case 29:
                                    /*appended txt*/
                                    $('#'+id).uiform_appetext(Opt_Doubled);
                                    break;
                                case 30:
                                    /*prep - app txt*/
                                    $('#'+id).uiform_prepapptext(Opt_Doubled);
                                    break;
                                case 31:
                                    /*panel*/
                                    $('#'+id).uiform_panelfld(Opt_Doubled);
                                    break;
                                case 32:
                                    /*divider*/
                                    $('#'+id).uiform_divider(Opt_Doubled);
                                    break;
                                case 39:
                                    /*wizard buttons*/
                                    $('#'+id).uiform_wizardbtn(Opt_Doubled);
                                    break;
                                case 40:
                                    /*switch*/
                                    $('#'+id).uiform_switch(Opt_Doubled);
                                    break;
                                case 41:
                                    /*dyn checkbox*/
                                    $('#'+id).uiform_dyncheckbox(Opt_Doubled);
                                    break;
                                case 42:
                                    /*dyn radiobtn*/
                                    $('#'+id).uiform_dynradiobtn(Opt_Doubled);
                                    break;
                                case 43:
                                    /*date beta*/
                                    $('#'+id).uifm_datepickr_flat(Opt_Doubled);
                                    break;    
                            }
                            
                            
                            //refresh grid when fields are inserted
                            if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                $(window).trigger('resize');
                                }
                            switch (parseInt(field_type)) {
                                case 8:
                                    field_instance =$('#'+id).data('uiform_radiobtn');
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 9:
                                    field_instance =$('#'+id).data('uiform_checkbox');
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 10:
                                    field_instance =$('#'+id).data('uiform_select');
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 11:
                                    field_instance =$('#'+id).data('uiform_multiselect');
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 12:
                                    /*fileupload*/
                                    field_instance =$('#'+id).data('uiform_fileupload');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 13:
                                    /*imageupload*/
                                    field_instance =$('#'+id).data('uiform_imageupload');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 14:
                                    /*customhtml*/
                                    field_instance =$('#'+id).data('uiform_customhtml');  
                                    break;
                                case 15:
                                    /*password*/
                                    field_instance =$('#'+id).data('uiform_password');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 16:
                                    /*slider*/
                                    field_instance =$('#'+id).data('uiform_slider');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 17:
                                    /*range*/
                                    field_instance =$('#'+id).data('uiform_range');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 18:
                                    /*spinner*/
                                    field_instance =$('#'+id).data('uiform_spinner');    
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 19:
                                    /*captcha*/
                                    field_instance =$('#'+id).data('uiform_captcha');    
                                    break;
                                case 20:
                                    /*submit button*/
                                    field_instance =$('#'+id).data('uiform_submitbtn');    
                                    break;
                                case 21:
                                    /*hidden input*/
                                    field_instance =$('#'+id).data('uiform_hiddeninput'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 22:
                                    /*star rating*/
                                    field_instance =$('#'+id).data('uiform_ratingstar');  
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 23:
                                    /*color picker*/
                                    field_instance =$('#'+id).data('uiform_colorpicker');    
                                    field_instance.setFieldName(suffixid);
                                    break;    
                                case 24:
                                    /*datepicker*/
                                    field_instance =$('#'+id).data('uiform_datepicker'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 25:
                                    /*timepicker*/
                                    field_instance =$('#'+id).data('uiform_timepicker');
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 26:
                                    /*date time*/
                                    field_instance =$('#'+id).data('uiform_datetime'); 
                                    field_instance.setFieldName(suffixid);
                                    break;    
                                case 28:
                                    /*prep txt*/
                                    field_instance =$('#'+id).data('uiform_preptext');  
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 29:
                                    /*app txt*/
                                    field_instance =$('#'+id).data('uiform_appetext'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 30:
                                    /*prep - app txt*/
                                    field_instance =$('#'+id).data('uiform_prepapptext'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 31:
                                    /*panel*/
                                    field_instance =$('#'+id).data('uiform_panelfld');
                                     
                                    break;   
                                case 32:
                                    /*divider*/
                                    field_instance =$('#'+id).data('uiform_divider');
                                    /*update divider bg text*/
                                    rocketform.previewform_elementBackground($('.uiform-main-form'),false);
                                    break;
                                case 39:
                                    /*wizard buttons*/
                                    field_instance =$('#'+id).data('uiform_wizardbtn');
                                    /*update divider bg text*/
                                    rocketform.previewform_elementBackground($('.uiform-main-form'),false);
                                    break; 
                                case 40:
                                    /*switch*/
                                    field_instance =$('#'+id).data('uiform_switch'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 41:
                                    /*dyn checkbox*/
                                    field_instance =$('#'+id).data('uiform_dyncheckbox'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                                case 42:
                                    /*dyn radiobtn*/
                                    field_instance =$('#'+id).data('uiform_dynradiobtn'); 
                                    field_instance.setFieldName(suffixid);
                                    break;  
                                case 43:
                                    /*date beta*/
                                    field_instance =$('#'+id).data('uifm_datepickr_flat'); 
                                    field_instance.setFieldName(suffixid);
                                    break;
                            }     
                            
                            //assign step
                            field_instance.setStep(step_pane);
                            
                            //init events
                            field_instance.init_events();
                            
                            //enable tab
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                          
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                        //enable setting tab
                                        rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        
                                        //load field options
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        //adding highlight class
                                        rocketform.setHighlightPicked($('#'+id));
                                        
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        //rocketform.loading_boxField(id,0);
                                         
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                    
                                    //refresh grid when fields are inserted
                                    /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                        $(window).trigger('resize');
                                        
                                        }*/
                                   }
                                },1000);
                            }  
                            break;
                        case 1:    
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                            
                            //grid columns
                            switch (parseInt(field_type)) {
                                    case 1:
                                        fieldhtml=$('#uiform-fields-templates .zgpb-gridsystem-one').clone();
                                        break;
                                    case 2:
                                        fieldhtml=$('#uiform-fields-templates .zgpb-gridsystem-two').clone();
                                        break;
                                    case 3:
                                        fieldhtml=$('#uiform-fields-templates .zgpb-gridsystem-three').clone();
                                        break;
                                    case 4:
                                        fieldhtml=$('#uiform-fields-templates .zgpb-gridsystem-four').clone();
                                        break;
                                    case 5:
                                        fieldhtml=$('#uiform-fields-templates .zgpb-gridsystem-five').clone();
                                        break;    
                                }
                            
                            fieldhtml.attr("id",id);
                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            //assign plugin
                            //$('#'+id).zgpbld_gridsystem(Opt_Doubled);
                            $('#'+id).zgpbld_gridsystem();
                            
                            field_instance =$('#'+id).data('zgpbld_gridsystem');
                            
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            switch (parseInt(field_type)) {
                                    case 1:
                                        field_instance.setToDatalvl1('type',1);
                                        field_instance.setToDatalvl1('type_n','grid1_');
                                        break;
                                    case 2:
                                        field_instance.setToDatalvl1('type',2);
                                        field_instance.setToDatalvl1('type_n','grid2_');
                                        break;
                                    case 3:
                                        field_instance.setToDatalvl1('type',3);
                                        field_instance.setToDatalvl1('type_n','grid3_');
                                        break;
                                    case 4:
                                        field_instance.setToDatalvl1('type',4);
                                        field_instance.setToDatalvl1('type_n','grid4_');
                                        break;
                                    case 5:
                                        field_instance.setToDatalvl1('type',5);
                                        field_instance.setToDatalvl1('type_n','grid6_');
                                        break;    
                                }
                            
                            
                            //generate block attributes
                            field_instance.createBlockAttributes();
                            
                             //assign settings data
                            field_instance.update_settingsData(Opt_Doubled);
                            
                            //important for updating the id of the object
                            field_instance.setToDatalvl1('id',id);
                            
                            //add name
                            field_instance.setFieldName(suffixid);
                                
                            //assign step
                            field_instance.setStep(step_pane);
                            
                            //attach data to object
                            field_instance.updateVarData(id);
                            
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                            $('#'+id).zgpbld_grid();
                            
                            rocketform.hideLoader();
                            /*load setting tab*/
                              var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                           
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                       
                                       
                                       rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        
                                       
                                        //enable setting tab
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        
                                        //rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        
                                        //adding hightlight class
                                        //rocketform.setHighlightPicked($('#'+id));
                                        
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        //rocketform.loading_boxField(id,0);
                                        
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                   
                                   }
                                },1000);
                            }  
                                
                            break;
                        case 33:    
                        case 34:
                        case 35:
                        case 36:
                        case 37:
                        case 38:
                            //headings
                            switch (parseInt(field_type)) {
                                    case 33:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading1').clone();
                                        break;
                                    case 34:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading2').clone();
                                        break;
                                    case 35:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading3').clone();
                                        break;
                                    case 36:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading4').clone();
                                        break;
                                    case 37:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading5').clone();
                                        break;
                                    case 38:
                                        fieldhtml=$('#uiform-fields-templates .uiform-heading6').clone();
                                        break;    
                                }
                            
                            fieldhtml.attr("id",id);
                            if(isClicked){
                                $(element).replaceWith(fieldhtml);
                            }else{
                                $(element).find('a.uiform-draggable-field').replaceWith(fieldhtml);
                            }
                            /*add loading msg on field*/
                            rocketform.loading_boxField(id,1);
                            //assign plugin
                            $('#'+id).uiform_heading(Opt_Doubled);
                            field_instance =$('#'+id).data('uiform_heading');
                            //assign step
                            field_instance.setStep(step_pane);
                            //init events
                            field_instance.init_events();
                            
                            //assign data to object
                            field_instance.setToDatalvl1('id',id);
                            
                            //do not update the following when it is duplicating
                          if(parseInt($.map(Opt_Doubled, function(n, i) { return i; }).length)==0){
                              switch (parseInt(field_type)) {
                                    case 33:
                                        field_instance.setToDatalvl1('type',33);
                                        field_instance.setToDatalvl1('type_n','heading1');
                                        field_instance.setToDatalvl2('input','value','Type your heading H1 here');
                                        field_instance.setToDatalvl2('input','size','32');
                                        break;
                                    case 34:
                                        field_instance.setToDatalvl1('type',34);
                                        field_instance.setToDatalvl1('type_n','heading2');
                                        field_instance.setToDatalvl2('input','value','Type your heading H2 here');
                                        field_instance.setToDatalvl2('input','size','24');
                                        break;
                                    case 35:
                                        field_instance.setToDatalvl1('type',35);
                                        field_instance.setToDatalvl1('type_n','heading3');
                                        field_instance.setToDatalvl2('input','value','Type your heading H3 here');
                                        field_instance.setToDatalvl2('input','size','20');
                                        break;
                                    case 36:
                                        field_instance.setToDatalvl1('type',36);
                                        field_instance.setToDatalvl1('type_n','heading4');
                                        field_instance.setToDatalvl2('input','value','Type your heading H4 here');
                                        field_instance.setToDatalvl2('input','size','16');
                                        break;
                                    case 37:
                                        field_instance.setToDatalvl1('type',37);
                                        field_instance.setToDatalvl1('type_n','heading5');
                                        field_instance.setToDatalvl2('input','value','Type your heading H5 here');
                                        field_instance.setToDatalvl2('input','size','13');
                                        break;
                                    case 38:
                                        field_instance.setToDatalvl1('type',38);
                                        field_instance.setToDatalvl1('type_n','heading6');
                                        field_instance.setToDatalvl2('input','value','Type your heading H6 here');
                                        field_instance.setToDatalvl2('input','size','10');
                                        break;    
                                }
                          }
                            
                            
                            
                            //assign data to data core
                            field_instance.setDataToCoreStore(step_pane,id);
                            
                            rocketform.hideLoader();
                           
                            /*load setting tab*/
                            var tmp_fld_load_options=rocketform.getInnerVariable('fields_load_settings');
                           
                           if(parseInt(tmp_fld_load_options)===2){
                               rocketform.hideLoader();
                               rocketform.loading_boxField(id,0);
                           }else{
                            uifm_afterdrag_timer = setInterval(function(){
                                   if(rocketform.checkIntegrityDataField(id)){
                                        //enable setting tab
                                        rocketform.enableSettingTabOnCreate(fieldhtml.attr("id"),fieldhtml.data("typefield"));
                                        
                                        //load field options
                                        tmp_fld_load['id']= fieldhtml.attr("id");
                                        tmp_fld_load['typefield']= fieldhtml.data("typefield");
                                        tmp_fld_load['step_pane']= step_pane;
                                        tmp_fld_load['addt']= null;
                                        tmp_fld_load['oncreation']= true;
                                        
                                        rocketform.loadFieldSettingTab(tmp_fld_load);
                                        
                                        
                                        rocketform.setHighlightPicked($('#'+id));
                                        rocketform.hideLoader();
                                        /*hide loading msg on field*/
                                        //rocketform.loading_boxField(id,0);
                                        
                                    clearInterval(uifm_afterdrag_timer);
                                    uifm_afterdrag_timer=null;
                                    
                                    //refresh grid when fields are inserted
                                    /*if (parseInt($('#'+id).parents('.uiform-grid-inner-col').length)!=0) {
                                        $(window).trigger('resize');
                                        
                                        }*/
                                   }
                                },1000);
                            }
                                
                            break;   
                    }
                    
                     /*add new value*/
                    rocketform.formvariables_generateTable();
                    
                    //tuning draggable handle
                     var field_handle1=$(element).find('.uiform-field-move');
                     field_handle1.mouseover(function() {
                                  $( this ).css( "overflow", "hidden" );
                                  $( this ).css( "cursor", "move" );
                    }).mouseout(function() {
                           $( this ).css( "overflow", "visible" );       
                    });
                    enableDraggableItems();
                    //refresh sortable
                    enableSortableItems();
                    
                    //check integrity
                    zgfm_back_err.integrity_check();
                    
                    return id;   
             };
     arguments.callee.captureEventTinyMCE_process = function (tab_opt,f_id,f_content) {
         
         //check if tab is currently loading
         if($('#uiform-build-field-tab').hasClass('zgfm-fieldtab-flag-loading')){
             
             return;
         }
         
         var store;
        switch (tab_opt) {
            case 'uifm_fld_msc_text':
                store = "help_block-text";
                break;
            case 'uifm_fld_inp3_html':
                store = "input3-text";
                break;    
            case 'uifm_fld_price_lbl_format':
                store = "price-lbl_show_format";
                break;
            case 'uifm_frm_summbox_skintxt_txt':
                store = "skin_text-text";
                break;
            case 'uifm_frm_inp18_txt_cont':
                store = "input18-text-html_cont";
                break;   
            default: 
               
        }
        
        var f_store,f_sec,f_opt,f_val,f_step,obj_field;
        /*load according to field or form*/
        switch (tab_opt) {
            case 'uifm_fld_msc_text':
             case 'uifm_fld_inp3_html':
             case 'uifm_fld_price_lbl_format':
             case 'uifm_frm_inp18_txt_cont':    
             if(store){
                 
                 f_val=encodeURIComponent(f_content);
                 f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                obj_field= $('#'+f_id);
                if(obj_field){
                    rocketform.setDataOptToPrevField(obj_field,store,f_val);
                }
            }
                break;
             case 'uifm_frm_summbox_skintxt_txt':
               if(store){
                 f_store=store.split("-");
                 f_sec=f_store[0];
                 f_opt=f_store[1];
                 f_val=encodeURIComponent(f_content);
                rocketform.setUiData3('summbox',f_sec,f_opt,f_val);
                obj_field= $('.uiform-preview-base');
                if(obj_field){
                    rocketform.setDataOptToPrevForm(obj_field,'summbox',f_sec+'-'+f_opt,f_val);
                } 
               } 
                break;   
            default: 
               
        }
     };
    arguments.callee.captureEventTinyMCE2 = function (e) {
        var tab_opt= $(e.target).attr('id');
        var tmp_content=$(e.target).val();
        var tmp_id=$('#uifm-field-selected-id').val();
        
        switch (tab_opt) {
            case 'uifm_frm_subm_msg':
            case 'uifm_frm_email_usr_tmpl':
            case 'uifm_frm_email_tmpl':
            case 'uifm_frm_email_usr_tmpl_pdf':
                 if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get(tab_opt);
                        if( editor && editor instanceof tinymce.Editor ) {
                             tinymce.get(tab_opt).setContent(tmp_content);
                        }
                    }
                break; 
            default: 
                rocketform.captureEventTinyMCE_process(tab_opt,tmp_id,tmp_content);    
        }
        
    };         
    arguments.callee.captureEventTinyMCE = function (ed,e) {
        var tab_opt= ed.id;
         switch (tab_opt) {
            case 'uifm_frm_subm_msg':
            case 'uifm_frm_email_usr_tmpl':
            case 'uifm_frm_email_tmpl':
            case 'uifm_frm_email_usr_tmpl_pdf':
                 $('#'+tab_opt).val(ed.getContent());
                break; 
            default: 
               var tmp_id= $('#uifm-field-selected-id').val();
                var tmp_content=ed.getContent();
                rocketform.captureEventTinyMCE_process(tab_opt,tmp_id,tmp_content);
        }
        
    }; 
    arguments.callee.initPanel = function () {
              this.loading_panelbox('rocketform-bk-dashboard',1);
             };
    arguments.callee.showLogMessage = function (msg) {
              console.log(msg);
              
             };
    arguments.callee.printmaindata = function () {
              // zgfm_back_addon_anim.dump_data();
              console.log(this.dumpvar3(mainrformb));
             };
    arguments.callee.redirect_tourl = function (redirect) {
              if(window.event ) {/*IE 6*/
                    window.event.returnValue = false;
                    window.location =redirect;
                    //return false;
                }else {/*firefox*/
                    location.href =redirect;
                }
             };
    arguments.callee.getLayoutFormByStep_checkInColumn = function (children,f_step,type) {
        var fields = {};
                var values_tmp
                    ,el_container
                    ,el_id
                    ,el_type
                    ,el_children_count
                    ,el_children
                    ,children_tmp_a
                    ,children_tmp_ob
                    ,child_id
                    ,check_field
                    ,num_columns;
                    
                    var tmp_wrap_class='';
                  
                  switch(parseInt(type)){
                        case 1:
                        case 2: 
                        case 3:
                        case 4:
                        case 5:
                            //columns
                            tmp_wrap_class = '.zgpb-fl-gs-block-inner > .uiform-field';
                            break;
                        case 31:
                            //panel
                            tmp_wrap_class = '.uiform-grid-inner-col > .uiform-field';
                            break;
                  }
                  
                    $(children).find(tmp_wrap_class).each(function(index, element){
                        
                        values_tmp= {};
                        children_tmp_ob= {};
                        children_tmp_a=[];
                        element=$(element);
                        //verify is container
                        el_container=(element.data('iscontainer'))?element.data('iscontainer'):0;
                        values_tmp.iscontainer=parseInt(el_container);
                        //get type of field
                        el_type=element.data('typefield');
                        values_tmp.type=el_type;
                        el_id=(element.attr('id'))?element.attr('id'):0;
                        values_tmp.id=el_id;
                        values_tmp.num_tab=parseInt(f_step);
                        
                        if(el_container===1){
                            values_tmp.children={};
                            /*children count*/
                            el_children_count=element.find('.uiform-field').length
                            values_tmp.count_children=parseInt(el_children_count);
                            /*children elements*/
                            el_children=element.find('.uiform-field');
                            if(parseInt(el_children_count)>0){
                                $(el_children).each( function( index2, element2 ){
                                        child_id=($( this ).attr('id'))?$( this ).attr('id'):0;
                                        children_tmp_a.push(child_id);
                                        //children_tmp_ob[child_id]={};
                                    });
                                values_tmp.children_str=children_tmp_a.join(',');
                                //values_tmp.children_arr=children_tmp_ob;
                               
                            }    
                             values_tmp.inner=rocketform.getLayoutFormByStep_checkChildren(el_id,el_children,el_type,element,f_step);
                         }
                        
                        
                        check_field=$.inArray(el_id,rocketform.getInnerVariable('fields_flag_stored'));
                        if(check_field < 0){
                            rocketform.getLayoutFormByStep_addFieldFlag(el_id);
                            fields[index]=values_tmp;
                        }
                        
                        
                    });
                    return fields;
                    
                    
    };
    
    arguments.callee.getLayoutFormByStep_checkChildren = function (id,children,type,el,f_step) {
        
            var fields = {};
                var num_columns,values_tmp,num_cols;
             
             switch (parseInt(type)) {
                case 1:
                case 2: 
                case 3:
                case 4:
                case 5:
                    //column 4
                    num_columns=el.find('.sfdc-row:eq(0) > .zgpb-fl-gs-block-style');
                    num_columns.each(function(index, element){
                             values_tmp= {};
                             element=$(element);
                             num_cols=element.attr('data-zgpb-blockcol');
                             blocknum_cols=element.attr('data-zgpb-blocknum');
                             values_tmp.cols=num_cols;
                            
                             values_tmp.num_tab=blocknum_cols;
                           
                              values_tmp.children=rocketform.getLayoutFormByStep_checkInColumn(num_columns[index],f_step,type);
                            
                            fields[index]=values_tmp;
                       });
                    break;
                case 31:
                    /*panel*/
                    values_tmp= {};
                              
                             values_tmp.cols=0;
                             values_tmp.num_tab=parseInt(f_step);
                            
                             values_tmp.children=rocketform.getLayoutFormByStep_checkInColumn($(el).find('.uifm-input31-main-wrap').first(),f_step,type);
                            
                            fields[0]=values_tmp;
                    
                    break;
                case 0:
                    
                    break; 
                default: 
                   
            }
            return fields;  
                
             };
    arguments.callee.getLayoutFormByStep_addFieldFlag = function (value) {
              var temp;
              temp=this.getInnerVariable('fields_flag_stored');
              temp.push(value);
              this.setInnerVariable('fields_flag_stored',temp);
             }; 
    arguments.callee.getLayoutFormByStep = function (f_step) {
              if($('#uifm-step-tab-'+f_step)){
                //var check_fields=[];
                var fields = {};
                var values_tmp
                    ,el_container
                    ,el_id
                    ,el_type
                    ,el_children_count
                    ,el_children
                    ,children_tmp_a
                    ,children_tmp_ob
                    ,child_id
                    ,check_field;

                  rocketform.setInnerVariable('fields_flag_stored',[]);
                   
                 $('#uifm-step-tab-'+f_step+' .uiform-field').each(function(index, element){
                         values_tmp= {};
                         children_tmp_ob= {};
                         children_tmp_a=[];
                         element=$(element);
                         //verify is container
                         el_container=(element.data('iscontainer'))?element.data('iscontainer'):0;
                         values_tmp.iscontainer=parseInt(el_container);
                         values_tmp.num_tab=parseInt(f_step);
                         
                         //get type of field
                         el_type=element.data('typefield');
                         values_tmp.type=el_type;
                         el_id=(element.attr('id'))?element.attr('id'):0;
                         values_tmp.id=el_id;
                         
                         
                         if(el_container===1){
                            values_tmp.children={};
                            /*children count*/
                            el_children_count=element.find('.uiform-field').length;
                            values_tmp.count_children=parseInt(el_children_count);
                            
                            /*children elements*/
                            el_children=element.find('.uiform-field')||null;
                            if(parseInt(el_children_count)>0){
                                children_tmp_a =[];
                                $(el_children).each( function( index2, element2 ){
                                        child_id=($( this ).attr('id'))?$( this ).attr('id'):0;
                                        children_tmp_a.push(child_id);
                                        //children_tmp_ob[child_id]={};
                                    });
                                values_tmp.children_str=children_tmp_a.join(',');
                                
                            }
                            
                            //values_tmp.children_arr=children_tmp_ob;
                            values_tmp.inner=rocketform.getLayoutFormByStep_checkChildren(el_id,el_children,el_type,element,f_step);
                         }
                         
                         check_field=$.inArray(el_id,rocketform.getInnerVariable('fields_flag_stored'));
                         if(check_field < 0){
                             
                             rocketform.getLayoutFormByStep_addFieldFlag(el_id);
                             fields[index]=values_tmp;
                         }else{
                             
                         }
                         
                });
                
               
              }
              return fields;
             };
    
    arguments.callee.loadNewForm = function () {
        
       rocketform.loadFormToEditPanel_default(null);
       
        //hide panel loader
        if(parseInt($('#rocketform-bk-dashboard').length)!=0){
            rocketform.loading_panelbox('rocketform-bk-dashboard',0);
        }
         //set form variables
        rocketform.formvariables_genListToIntMem();
    };
  arguments.callee.formsetting_setFieldName = function () {
      var modal_obj=$('#uifm_form_setting_setfname');
          modal_obj.sfdc_modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
         modal_obj.on('show.bs.modal',rocketform.modal_centerPos(modal_obj));
  };
  arguments.callee.formsetting_setFieldName_check = function () {
     var modal_obj=$('#uifm_form_setting_setfname');
     
      modal_obj.sfdc_modal('hide');
  };
    arguments.callee.saveTabContent = function () {
        var steps=this.getUiData('num_tabs');
        var tab_content={}, 
            tab_titles={},
            tabcontent_tmp,
            tabtitle_tmp;
       var var_steps_src=this.getUiData('steps_src');     
       /*get layout order*/
        if(parseInt(steps)>0){
            $.each(var_steps_src, function(i, value) {
                    /*generating for each step*/
                    tabcontent_tmp={};
                    tabcontent_tmp.content=rocketform.getLayoutFormByStep(i);
                    tab_content[i]=tabcontent_tmp;
                    //get title tabs
                   /* tabtitle_tmp={};
                    tabtitle_tmp.title='';
                    tab_titles[i]=tabtitle_tmp;*/ 
                });
        }
       this.setUiData2('steps','tab_cont',tab_content);
        
      // this.setUiData2('steps','tab_title',tab_titles);
       //save form tabs content
       var editor,content;
       //onsubmission
       mainrformb['onsubm']= {};
       var onsubm_msgsuc;
       if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get("uifm_frm_subm_msg");
                        if( editor && editor instanceof tinymce.Editor ) {
                            onsubm_msgsuc = tinymce.get("uifm_frm_subm_msg").getContent();
                        }else{
                            onsubm_msgsuc=($('#uifm_frm_subm_msg').val())?$('#uifm_frm_subm_msg').val():'';
                        }
                    }
       var onsubm_bg_st=($('#uifm_frm_subm_bgst').prop( "checked" ))?1:0;
       var onsubm_bg_type=($('#uifm_frm_subm_bgst_handle').find('input:checked'))?$('#uifm_frm_subm_bgst_handle').find('input:checked').val():1;
       var onsubm_bg_solid=$('#uifm_frm_subm_bgst_typ1_col').val();
       var onsubm_bg_start=$('#uifm_frm_subm_bgst_typ2_col1').val();
       var onsubm_bg_end=$('#uifm_frm_subm_bgst_typ2_col2').val();
       var onsubm_redirect_st=$('#uifm_frm_subm_redirect_st').bootstrapSwitchZgpb('state')?1:0;
       var onsubm_redirect_url=$('#uifm_frm_subm_redirect_url').val();
       this.setUiData2('onsubm','sm_successtext',encodeURIComponent(onsubm_msgsuc));
       this.setUiData2('onsubm','sm_boxmsg_bg_st',onsubm_bg_st);
       this.setUiData2('onsubm','sm_boxmsg_bg_type',onsubm_bg_type);
       this.setUiData2('onsubm','sm_boxmsg_bg_solid',onsubm_bg_solid);
       this.setUiData2('onsubm','sm_boxmsg_bg_start',onsubm_bg_start);
       this.setUiData2('onsubm','sm_boxmsg_bg_end',onsubm_bg_end);
       this.setUiData2('onsubm','sm_redirect_st',onsubm_redirect_st);
       this.setUiData2('onsubm','sm_redirect_url',encodeURIComponent(onsubm_redirect_url));
       //main tab
       var main_addcss=$('textarea#uifm_frm_main_addcss').data('CodeMirrorInstance').getValue();
       var main_addjs=$('textarea#uifm_frm_main_addjs').data('CodeMirrorInstance').getValue();
       var main_onload_scroll=($('#uifm_frm_main_onload_scroll').prop( "checked" ))?1:0;
       var main_preload_noconf=($('#uifm_frm_main_preload_noconflict').prop( "checked" ))?1:0;
       this.setUiData2('main','add_css',encodeURIComponent(main_addcss));
       this.setUiData2('main','add_js',encodeURIComponent(main_addjs));
       this.setUiData2('main','onload_scroll',main_onload_scroll);
       this.setUiData2('main','preload_noconflict',main_preload_noconf);
       
       var main_pdf_onpage=($('#uifm_frm_main_pdf_show_onpage').bootstrapSwitchZgpb('state'))?1:0;
       this.setUiData2('main','pdf_show_onpage',main_pdf_onpage);
       this.setUiData2('main','pdf_paper_size',$('#uifm_frm_main_pdf_papersize').val());
       
       this.setUiData2('main','pdf_paper_orie',$('#uifm_frm_main_pdf_paperorien').val());
       var mail_usr_pdf_font=$('#uifm_frm_email_usr_tmpl_pdf_font').val();
       this.setUiData2('main','pdf_font',mail_usr_pdf_font);
       
       var mail_usr_pdf_charset=$('#uifm_frm_email_usr_pdf_charset').val();
       this.setUiData2('main','pdf_charset',mail_usr_pdf_charset);
       
       var mail_usr_email_html_fullpage=($('#uifm_frm_main_email_htmlfullpage').bootstrapSwitchZgpb('state'))?1:0;
       this.setUiData2('main','email_html_fullpage',mail_usr_email_html_fullpage);
       
       var mail_usr_pdf_html_fullpage=($('#uifm_frm_main_pdf_htmlfullpage').bootstrapSwitchZgpb('state'))?1:0;
       this.setUiData2('main','email_pdf_fullpage',mail_usr_pdf_html_fullpage);
       
       //save mail template 
       var email_template_msg;
       
       var mail_from_email=$('#uifm_frm_from_email').val();
       var mail_from_name=$('#uifm_frm_from_name').val();
       this.setUiData2('onsubm','mail_from_email',mail_from_email);
       this.setUiData2('onsubm','mail_from_name',mail_from_name); 
       
       
       //mail notification
        if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get("uifm_frm_email_tmpl");
                        if( editor && editor instanceof tinymce.Editor ) {
                            email_template_msg = tinymce.get("uifm_frm_email_tmpl").getContent();
                        }else{
                            email_template_msg=($('#uifm_frm_email_tmpl').val())?$('#uifm_frm_email_tmpl').val():'';
                        }
                    }
       var email_recipient=$('#uifm_frm_email_recipient').val();             
       var email_cc=$('#uifm_frm_email_cc').val();
       var email_bcc=$('#uifm_frm_email_bcc').val();
       var email_subject=$('#uifm_frm_email_subject').val();
       var email_replyto=$('#uifm_frm_email_replyto').val();
       
       this.setUiData2('onsubm','mail_template_msg',encodeURIComponent(email_template_msg));
       this.setUiData2('onsubm','mail_recipient',email_recipient);
       this.setUiData2('onsubm','mail_cc',email_cc);
       this.setUiData2('onsubm','mail_bcc',email_bcc);
       this.setUiData2('onsubm','mail_subject',email_subject);
       this.setUiData2('onsubm','mail_replyto',email_replyto);
       
       //customer
       var mail_usr_st=($('#uifm_frm_email_usr_sendst').bootstrapSwitchZgpb('state'))?1:0;
       if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get("uifm_frm_email_usr_tmpl");
                        if( editor && editor instanceof tinymce.Editor ) {
                            email_template_msg = tinymce.get("uifm_frm_email_usr_tmpl").getContent();
                        }else{
                            email_template_msg=($('#uifm_frm_email_usr_tmpl').val())?$('#uifm_frm_email_usr_tmpl').val():'';
                        }
                    }
        var email_template_pdf_msg;             
       var mail_usr_pdf_st=($('#uifm_frm_email_usr_attachpdfst').bootstrapSwitchZgpb('state'))?1:0;
       if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get("uifm_frm_email_usr_tmpl_pdf");
                        if( editor && editor instanceof tinymce.Editor ) {
                            email_template_pdf_msg = tinymce.get("uifm_frm_email_usr_tmpl_pdf").getContent();
                        }else{
                            email_template_pdf_msg=($('#uifm_frm_email_usr_tmpl_pdf').val())?$('#uifm_frm_email_usr_tmpl_pdf').val():'';
                        }
                    } 
                    
       var mail_usr_recipient=$('#uifm_frm_email_usr_recipient').val();             
       var mail_usr_cc=$('#uifm_frm_email_usr_cc').val();
       var mail_usr_bcc=$('#uifm_frm_email_usr_bcc').val();
       var mail_usr_subject=$('#uifm_frm_email_usr_subject').val();
       var mail_usr_pdf_fn=$('#uifm_frm_email_usr_tmpl_pdf_fn').val();
       var mail_usr_replyto=$('#uifm_frm_email_usr_replyto').val();
       
       
       this.setUiData2('onsubm','mail_usr_st',mail_usr_st);
       this.setUiData2('onsubm','mail_usr_template_msg',encodeURIComponent(email_template_msg));
       this.setUiData2('onsubm','mail_usr_pdf_st',mail_usr_pdf_st);
       this.setUiData2('onsubm','mail_usr_pdf_template_msg',encodeURIComponent(email_template_pdf_msg));
       this.setUiData2('onsubm','mail_usr_pdf_fn',encodeURIComponent(mail_usr_pdf_fn));
       this.setUiData2('onsubm','mail_usr_recipient',mail_usr_recipient);
       this.setUiData2('onsubm','mail_usr_cc',mail_usr_cc);
       this.setUiData2('onsubm','mail_usr_bcc',mail_usr_bcc);
       this.setUiData2('onsubm','mail_usr_subject',mail_usr_subject);
       this.setUiData2('onsubm','mail_usr_replyto',mail_usr_replyto);
      
       //wizard tab
       if(typeof mainrformb['wizard'] == 'undefined') {
                mainrformb['wizard']= {};
            }
       
       var tmpTabs=this.getUiData2('steps','tab_title');
       var tabCount=this.getUiData2('steps','num_tabs');
       
       var wiz_st=($('#uifm_frm_wiz_st').prop( "checked" ))?1:0;
       //this.setUiData2('steps','tab_title',tmpTabs);
       //store to ..
       this.setUiData2('steps','tab_title',tmpTabs);
       if(wiz_st===0){
           tabCount=1;
       }
       this.setUiData('num_tabs',tabCount);
       
       this.wizardtab_saveChangesToMdata();
      
    };
    
    
    arguments.callee.records_delreg = function (rec_id) {
        rocketform.showLoader(4,true,true);
        
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/records/ajax_delete_record",
                    data: {
                       'action': 'rocket_fbuilder_delete_records',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'rec_id':rec_id,
                        'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        $("#uiform-container a[data-recid='" + rec_id + "']").closest('tr').fadeOut( "slow" );
                        
                        rocketform.hideLoader();
                    }
                });
                
             };
    arguments.callee.records_loadDataByForm = function (el) {
        var idform=$('#uifm-record-form-cmb').val();
        rocketform.showLoader(1,true,true);
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/records/ajax_load_record_byform",
                    data: {
                       'action': 'rocket_fbuilder_load_records_byform',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'form_id':parseInt(idform),
                        'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        $('#uifm-record-results').html(msg);
                        $('#table_id').DataTable();
                        rocketform.hideLoader();
                    }
                });
                
             };
   arguments.callee.exportForm_loadCodebyForm = function () {
        var idform=$('#uifm-list-form-cmb').val();
        rocketform.showLoader(1,true,true);
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_load_export_form",
                    data: {
                       'action': 'rocket_fbuilder_export_form',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'form_id':parseInt(idform),
                                    'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        $('#uifm_frm_exportform_code').html(msg);
                        rocketform.hideLoader();
                    }
                });
                
             }; 
             
   arguments.callee.importForm_onfailExit = function () {
      var re_url= rockfm_vars.uifm_siteurl+'/formbuilder/forms/create_uiform';
      rocketform.redirect_tourl(re_url);
   };          
   arguments.callee.importForm_onfailPopup = function () {
       $('#uifm_form_import_modal').sfdc_modal('hide');
       $('#uifm_form_import_onfail .sfdc-modal-title').html($('#uifm_frm_preview_import_title').val());
       $('#uifm_form_import_onfail .sfdc-modal-body').html('<p>'+$('#uifm_frm_preview_import_onfail').val()+'</p>');
       $('#uifm_form_import_onfail').sfdc_modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
       
   };
    
   arguments.callee.importForm_loadForm = function () {
               try{
                    var importcode=$('#uifm_frm_importform_code').val();
                    rocketform.showLoader(1,true,true);
                    $.ajax({
                        type: 'POST',
                        url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_load_import_form",
                        data: {
                        'action': 'rocket_fbuilder_import_form',
                        'page':'zgfm_form_builder',
                        'zgfm_security':uiform_vars.ajax_nonce,
                        'importcode':importcode,
                                    'csrf_field_name':uiform_vars.csrf_field_name
                            },
                        error: function(xhr, error){
                            rocketform.importForm_onfailPopup();
                            },    
                        success: function(response) {
                            /*load form*/
                            if($.isPlainObject(response)){
                                
                                if(String(response.data.fmb_html_backend)){
                                    rocketform.loadFormToEditPanel(response);
                                    
                                    //wizard refresh
                                    rocketform.wizardform_refresh();
                                    
                                rocketform.loading_panelbox('rocketform-bk-dashboard',0);
                                $('#uifm_form_import_modal').sfdc_modal('hide');
                                }else{
                                    mainrformb=response.data.fmb_data;
                                    rocketform.refreshPreviewSection_process();
                                    rocketform.loading_panelbox('rocketform-bk-dashboard',0);
                                $('#uifm_form_import_modal').sfdc_modal('hide');
                                }
                                
                            }else{
                                rocketform.importForm_onfailPopup();
                            }
                            
                        }
                    });
               }/* end try*/
                catch (ex) {
                rocketform.importForm_onfailPopup();
                } 
                
   };          
   arguments.callee.genpdf_inforecord = function (rec_id) {
       
       try{
       $("body").append("<iframe src='" + uiform_vars.url_admin+ "/formbuilder/frontend/pdf_show_record/?uifm_mode=pdf&id="+rec_id+"' style='display: none;' ></iframe>");
       
       }/* end try*/
        catch (ex) {
          console.error(" genpdf_inforecord : ", ex.message);
         /*send post data to iframe*/
        var uifm_iframeform=function(url)
            {
                var object = this;
                object.time = new Date().getTime();
                object.form = $('<form action="'+url+'" target="iframe'+object.time+'" method="post" style="display:none;" id="form'+object.time+'"></form>');

                object.addParameter = function(parameter,value)
                {
                    $("<input type='hidden' />")
                    .attr("name", parameter)
                    .attr("value", value)
                    .appendTo(object.form);
                }

                object.send = function()
                {
                    var iframe = $('<iframe data-time="'+object.time+'" style="display:none;" id="iframe'+object.time+'"></iframe>');
                    $( "body" ).append(iframe); 
                    $( "body" ).append(object.form);
                    object.form.submit();
                    iframe.load(function(){$('#form'+$(this).data('time')).remove();$(this).remove();});
                }
            };
        var tmpSend = new uifm_iframeform(uiform_vars.url_site+'?uifm_fbuilder_api_handler&action=uifm_fb_api_handler&uifm_action=show_record&uifm_mode=pdf&id='+rec_id);
            tmpSend.send(); 
            
           
        }    
   };
   
   arguments.callee.importForm_openModal = function () {
                $('#uifm_form_import_modal .sfdc-modal-title').html($('#uifm_frm_preview_import_title').val());
                $('#uifm_form_import_modal .sfdc-modal-body').find('.uifm_frm_importform_code').val('');
                $('#uifm_form_import_modal').sfdc_modal('show');
   };
   arguments.callee.customReport_loadFieldbyForm = function () {
        var idform=$('#uifm-record-form-cmb').val();
        rocketform.showLoader(1,true,true);
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/records/ajax_load_customreport",
                    data: {
                       'action': 'rocket_fbuilder_creport_byform',
                       'page':'zgfm_form_builder',
                       'form_id':parseInt(idform),
                            'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        $('#uifm-customreport-results').html(msg);
                        rocketform.hideLoader();
                    }
                });
                
             };
    arguments.callee.customReport_saveFields = function () {
        var idform=$('#uifm-record-form-cmb').val();
        var myCheckboxes = new Array();
        $("#uifm-customreport-form input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
        rocketform.showLoader(3,true,true);
        var elems = $( ".uifm-cusreport-order-rec" );
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/records/ajax_load_savereport",
                    data: {
                       'action': 'rocket_fbuilder_creport_savefields',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'form_id':parseInt(idform),
                       'data':myCheckboxes,
                       'data2':elems.serializeArray(),
                            'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        
                        rocketform.hideLoader();
                    }
                });
                
             };
    arguments.callee.saveForm_showModalSuccess = function (idval) {
      
         $.ajax({
                        type: 'POST',
                       url: rockfm_vars.uifm_siteurl+"formbuilder/forms/form_success",
                        data: {
                        'page':'zgfm_form_builder',
                        'zgfm_security':uiform_vars.ajax_nonce,
                        'form_id':idval,
                        'csrf_field_name':uiform_vars.csrf_field_name
                            },
                        beforeSend: function() {
                                     $( "#uifm_modal_msg .sfdc-modal-body" ).html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
                                    },    
                        success: function(response) {
                             var arrJson = JSON && JSON.parse(response) || $.parseJSON(response);
                            $('#uifm_modal_msg').sfdc_modal('show');
                            $('#uifm_modal_msg .sfdc-modal-title').html(arrJson.html_title);
                            $('#uifm_modal_msg .sfdc-modal-body').html(arrJson.html);
                                 
                             
                        }
                    }); 
        
        
    };
    arguments.callee.loadFormSaved_regen_closePopUp = function (idval) {
        $('#uifm_modal_alert_regen_msg').sfdc_modal('hide');
    };
    arguments.callee.loadFormSaved_regenerateForm = function () {
        $('#uifm_modal_alert_regen_msg').sfdc_modal({
            backdrop: 'static',
            keyboard: false ,
            show:true
        });
        $('#uifm_modal_alert_regen_msg .sfdc-modal-title').html($('#alert_uifm_loading_reg_title').val());
        var content='<p>'+$('#alert_uifm_loading_reg_cont').val()+'</p>';
        $('#uifm_modal_alert_regen_msg .sfdc-modal-body').html(content);
    };
    
    arguments.callee.saveform_updateOptionsToFields = function () {
            
           //assigning order
           var numtabs=$('.uiform-steps li');
                var currentTab,currentIndex,currentVal,currentFields;
                var numorder=1;
                var field_cur;
                var field_type;
                 $.each(numtabs, function(index, value) {
                    currentTab= $(this).find('a').attr('href');
                    if(parseInt($(currentTab).length)!=0){
                        currentIndex=$(this).find('a').attr('data-tab-nro');
                        
                        currentFields=$(currentTab).find('.uiform-field');
                            if(parseInt(currentFields.length)!=0){
                                $.each(currentFields, function(index2, value2) {
                                    
                                    field_cur=$(this).attr('id');
                                    
                                    field_type=$(this).attr('data-typefield');
                                    switch(parseInt(field_type)){
                                        case 6:case 7:case 8:case 9:case 10:case 11:case 12:case 13:case 15:
                                        case 16:case 17:case 18:case 21:case 22:case 23:case 24:case 25:    
                                        case 26:case 28:case 29:case 30:case 39:case 40:case 41:case 42:   
                                                                        
                                            rocketform.setUiData4('steps_src',currentIndex,field_cur,'order_frm',numorder);
                                            if(parseInt(rocketform.getUiData4('steps_src',currentIndex,field_cur,'order_rec'))===0){
                                             rocketform.setUiData4('steps_src',currentIndex,field_cur,'order_rec',numorder);   
                                            }
                                        break;
                                        case 19:case 20:case 27:
                                            rocketform.setUiData4('steps_src',currentIndex,field_cur,'order_frm',numorder);   
                                        break;
                                        
                                        } 
                                   numorder++;
                                });
                            }
                    }else{
                       
                    }
                    
                });
       };
    
    arguments.callee.saveForm = function () {
         
        /*show loader window*/
        rocketform.loading_panelbox2(1);
        
        
        //show loader
        rocketform.showLoader(3,true,false);
        
        //hide popovers
        
        rocketform.previewfield_removeAllPopovers();
                                    
        
        this.saveform_cleanForm();
        
        /*assigning option to fields*/
        this.saveform_updateOptionsToFields();
        
        /*hide highlighted fields*/
         /*highlight field boxes*/
        if($(document).find('.uifm-highlight-edited')){
            $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
        }
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').prop('checked',false);
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').closest('.uiform-fields-quick-options').removeCss('display');
        this.closeSettingTab();
        //show loader
        rocketform.showLoader(3,true,true);
        //save tabs content
        this.saveTabContent();
        
       rocketform.setUiData('app_ver',uiform_vars.app_version);
       //process fonts for fields
       var tmp_frm = mainrformb;  
        /*problem on form data variable when sending data, fixed putting on last */
                /*destroying rating star*/
               if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  var rockfm_tmp_rs=$('.uiform-main-form').find('.uifm-input-ratingstar');
                  rockfm_tmp_rs.each(function (i) {
                           $(this).rating('destroy');
                      });
                }
               
                
              var html_backend=$(".uiform-preview-base").html();
              
              /*enabling stars*/
              if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  $('.uiform-main-form').find('.uifm-input-ratingstar').each(function (i) {
                           rocketform.input9settings_updateField($(this).closest('.uiform-field'),'input9')
                      });
                }
                
                //addon data
                var tmp_addon_data = zgfm_back_addon.get_currentDataFromBack();  
                               //add more options
               var editor;
              
   //record template
   var uifm_frm_rec_tpl_html;             
       var uifm_frm_rec_tpl_st=($('#uifm_frm_record_tpl_enable').bootstrapSwitchZgpb('state'))?1:0;
       if( typeof tinymce != "undefined" ) {
                        editor = tinymce.get("uifm_frm_record_tpl_content");
                        if( editor && editor instanceof tinymce.Editor ) {
                            uifm_frm_rec_tpl_html = tinymce.get("uifm_frm_record_tpl_content").getContent();
                        }else{
                            uifm_frm_rec_tpl_html = ($('#uifm_frm_record_tpl_content').val())?$('#uifm_frm_record_tpl_content').val():'';
                        }
                    } 
                
                $.ajax({
                    type: 'POST',
                    url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_save_form",
                    data: {
                       'action': 'rocket_fbuilder_save_form',
                       'page':'zgfm_form_builder',
                       'zgfm_security':uiform_vars.ajax_nonce,
                       'uifm_frm_main_title':$('#uifm_frm_main_title').val(),
                       'uifm_frm_main_id':$('#uifm_frm_main_id').val(),
                       'uifm_frm_rec_tpl_st':uifm_frm_rec_tpl_st,
                       'uifm_frm_rec_tpl_html':encodeURIComponent(uifm_frm_rec_tpl_html),                       
                       'form_data':encodeURIComponent(JSON.stringify(tmp_frm)),
                       'addon_data':encodeURIComponent(JSON.stringify(tmp_addon_data)),
                       'csrf_field_name':uiform_vars.csrf_field_name
                        },
                    success: function(msg) {
                        if(String(msg.status)==="failed"){
                            rocketform.fields_showModalOptions();
                            $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                            $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html(msg.Message);
                            $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                            
                        }
                        
                        rocketform.loading_panelbox2(0);
                        //show loader
                         rocketform.showLoader(5,false,true);
                         
                                        if(parseInt(msg.id)>0){
                                           if(parseInt($('#uifm_frm_main_id').val())=== 0){
                                                /*show modal success*/
                                            rocketform.saveForm_showModalSuccess(msg.id);
                                            }
                                            $('#uifm_frm_main_id').val(msg.id);
                                        }
                        //rocketform.hideLoader();
                        
                        /*
                        if(parseInt(msg.id)>0){
                            //pdate form html backend 
                            $.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: {
                                    'action': 'rocket_fbuilder_save_form_updopts',
                                    'page':'zgfm_form_builder',
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'uifm_frm_main_id':msg.id,
                                    'form_html_backend':LZString.compressToEncodedURIComponent(html_backend)
                                        },
                                    success: function(msg) {
                                        
                                    }
                                });
                           
                        }*/
                           
                    }
                });
                
             };
      arguments.callee.loadForm_tab_subm_msgbg1 = function () {       
          $('#uifm_frm_subm_bgst_typ1_handle').show();
          $('#uifm_frm_subm_bgst_typ2_handle').hide();
             };
       arguments.callee.loadForm_tab_subm_msgbg2 = function () {       
          $('#uifm_frm_subm_bgst_typ1_handle').hide();
          $('#uifm_frm_subm_bgst_typ2_handle').show();
             };       
      arguments.callee.loadForm_tab_subm = function () {       
         $('#uifm_frm_subm_bgst_typ1_handle').hide();
          $('#uifm_frm_subm_bgst_typ2_handle').hide();
          var valinput=$('#uifm_frm_subm_bgst_handle').find('input').val();
               if(parseInt(valinput)===1){
                   $('#uifm_frm_subm_bgst_typ1_handle').show();
                    $('#uifm_frm_subm_bgst_typ2_handle').hide();
                    } else if (parseInt(valinput)===2) {
                   $('#uifm_frm_subm_bgst_typ1_handle').hide();
                    $('#uifm_frm_subm_bgst_typ2_handle').show();     
               }else{
                   $('#uifm_frm_subm_bgst_typ1_handle').hide();
                    $('#uifm_frm_subm_bgst_typ2_handle').hide();
               }
             };
       /* form skin tab content*/      
       arguments.callee.loadForm_tab_skin_delbgimg = function () {       
          $('#uifm_frm_skin_bg_srcimg_wrap').html('');
          $('#uifm_frm_skin_bg_imgurl').val('');
          //refresh live change
            rocketform.loadForm_tab_skin_updateBG();
             };
        /*background form setting*/
        arguments.callee.loadForm_tab_skin_updateBG = function () {
                var skin_bg_imgurl=$('#uifm_frm_skin_bg_imgurl').val();
                this.setUiData3('skin','form_background','image',skin_bg_imgurl);
                var obj_field= $('.uiform-preview-base');
                if(obj_field){
                rocketform.setDataOptToPrevForm(obj_field,'skin','form_background-image','');
                }
            };
            
         /*background panel*/
        arguments.callee.loadForm_tab_inp18_updateBG = function () {
                /*var skin_bg_imgurl=$('#uifm_frm_inp18_bg_imgurl').val();
                this.setUiData3('skin','form_background','image',skin_bg_imgurl);
                var obj_field= $('.uiform-preview-base');
                if(obj_field){
                rocketform.setDataOptToPrevForm(obj_field,'skin','form_background','image','');
                }*/
            };   
       /*wizard tab*/
       arguments.callee.wizardtab_addSubmitButton = function () {
          var current_content=$('.uiform-steps .uifm-current').find('a').attr('href');
          var obj=$(current_content);
          if(parseInt(obj.find('.uiform-wizardbtn').length)>0){
          }else{
              /*add button*/
              var el_field=$('.uiform-enable-fieldset').find('a.uiform-wizardbtn');
              rocketform.mainfields_addFieldToForm(el_field,39);
              /*go to form tab*/
              setTimeout(function(){
              $('.sfdc-nav-tabs a[href="#uiform-build-form-tab"]').sfdc_tab('show');    
              }, 2000); 
          }
       };
       arguments.callee.wizardtab_enableStatus = function () {
           var wiz_st=($('#uifm_frm_wiz_st').prop( "checked" ))?1:0;
           if(wiz_st===1){
               $('.uiform-step-list').show();
               //go to first position
                this.wizardtab_gotoFirstPosition();
                
                //check if wizards buttons added
                //this.wizardtab_addSubmitButton();
                //show wizard options
                $('.uiform_frm_wiz_main_content').show();
           }else{
               //go to first position
               $('.uiform-step-list').hide();
               $('.uiform_frm_wiz_main_content').hide();
               this.wizardtab_gotoFirstPosition();
           }
             //update to main data 
             rocketform.setUiData2('wizard','enable_st',wiz_st);
             };
       arguments.callee.wizardtab_changeTabTitle = function (nro) {
                var tabobj=$(".uiform-step-list li > a[data-tab-nro='"+nro+"']").find('.uifm-title');
                var tab_title=($('#uifm_frm_skin_tab'+nro+'_title').val())?$('#uifm_frm_skin_tab'+nro+'_title').val():'Tab title';
                tabobj.html(tab_title);
                //update to main data 
                rocketform.setUiData4('steps','tab_title',nro,'title',tab_title);
                
             };
             
             arguments.callee.saveform_cleanForm2 = function () {
            
            
            /*clean and fix wizard array issue*/
            var tmp_arr;
            var tmp_len;
            var tmp_i;   
            var tmp_new_arr ;
             
               tmp_arr=mainrformb['steps_src'];
                tmp_new_arr={}; 
                tmp_len = tmp_arr.length;
                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                {
                    if($.isArray(tmp_arr[tmp_i])){
                       tmp_new_arr[tmp_i]={};
                    }else{
                       tmp_new_arr[tmp_i]=tmp_arr[tmp_i];
                    }
                }
                
                mainrformb['steps_src']=tmp_new_arr; 
                
       };   
       arguments.callee.saveform_cleanForm = function () {
             try{   
                var numtabs=$('.uiform-steps li');
                var currentTab,currentIndex,currentVal,currentFields;
                 $.each(numtabs, function(index, value) {
                    currentTab= $(this).find('a').attr('href');
                    if(parseInt($(currentTab).length)!=0){
                        currentIndex=$(this).find('a').attr('data-tab-nro');
                        
                        currentFields=$(currentTab).find('.uiform-field');
                            if(parseInt(currentFields.length)!=0){
                                $.each(currentFields, function(index2, value2) {
                                   try{
                                      
                                        if(typeof mainrformb['steps_src'][currentIndex][$(this).attr('id')]=='undefined'){
                                              $(this).remove(); 
                                              rocketform.delUiData3('steps_src',currentIndex,$(this).attr('id'));
                                        }
                                        
                                   }catch(ex){
                                       
                                       $(this).remove();
                                       try{
                                           rocketform.delUiData3('steps_src',currentIndex,$(this).attr('id'));
                                       }catch(ex){}                                     
                                   }
                                });
                            }else{
                                
                            }
                    }else{
                       $(this).remove(); 
                       $(currentTab).remove();
                    }
                    
                });
            /*clean main data*/  
            var tmp_arr;
            var tmp_len;
            var tmp_i;
            
                        if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                          $.each(mainrformb['steps_src'], function(index3, value3) {
                              $.each(value3, function(index4, value4) {
                                    if(parseInt($('#'+index4).length)!=0){
                                       switch(parseInt(value4['type'])){
                                            case 8:
                                                /*radio button*/
                                            case 9:
                                                /*checkbox*/
                                            case 10:
                                                /*select*/
                                            case 11:
                                                /*multiselect*/    
                                                
                                                    /*clean data*/
                                                tmp_arr=mainrformb['steps_src'][index3][index4]['input2']['options'];
                                                var tmp_len = tmp_arr.length, tmp_i;
                                                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                                        tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                                if($.isArray(tmp_arr)){
                                                    tmp_arr.splice(0 ,tmp_len);
                                                    mainrformb['steps_src'][index3][index4]['input2']['options']=tmp_arr;
                                                }
                                                
                                                break;
                                        } 
                                    
                                    }else{
                                       rocketform.delUiData3('steps_src',index3,index4); 
                                    }
                                    
                                    
                                    
                                }); 
                          });  
                        }
                      
                /*clean fields are not placed on the form*/
               if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                          $.each(mainrformb['steps_src'], function(index3, value3) {
                              $.each(value3, function(index4, value4) {
                                     if(parseInt($('#'+index4).length)=== 0){
                                                switch(parseInt(value4['type'])){
                                                        case 1:
                                                        case 2:
                                                        case 3:
                                                        case 4:
                                                        case 5:
                                                            break;
                                                        default:
                                                            rocketform.delUiData3('steps_src',index3,index4);
                                                            break;
                                                    }
                                                }
                                });
                          });  
                        };
                
               //clean steps_src
                
                var tmp_arr = rocketform.getUiData('steps_src');
                var tmp_arr_new = {};
                var tmp_len = 0;
                    $.each(tmp_arr, function( key, value ) {
                        tmp_len++;
                        if(tmp_arr[key] && !$.isEmptyObject(tmp_arr[key])){
                            tmp_arr_new[key]=value;
                        }
                     
                    });
                
                   rocketform.setUiData('steps_src',tmp_arr_new);
                  //clean wizard array
                
                var tmpnum_list=$('#uifm_frm_skin_tabs_box .uifm_frm_skin_tab_content');
                var tmpTabs={};
                var tabCount=0;
                tmpnum_list.each(function (i) {
                    var tmpTab_inner_num=$(this).attr('data-tab-nro');
                    var tmpTab_inner={};
                    tmpTab_inner.title=$(this).find('.uifm_frm_skin_tab_title_evt').val();

                    //check if tab exists on main array, if not, remove from tab
                    if(mainrformb['steps_src'].hasOwnProperty(parseInt(tmpTab_inner_num))){

                        if(tmpTab_inner_num){
                         tmpTabs[tmpTab_inner_num]=tmpTab_inner;
                        }
                        tabCount++;

                    }else{
                        
                     
                       //remove from array
                       delete mainrformb['steps']['tab_title'][parseInt(tmpTab_inner_num)];
                       
                      var tmp_arr_2 = rocketform.getUiData2('steps','tab_title');
                      var tmp_arr_new_2 = {};
                      var tmp_len_2 = 0;
                        $.each(tmp_arr_2, function( key, value ) {
                            tmp_len_2++;
                            if(tmp_arr_2[key] && !$.isEmptyObject(tmp_arr_2[key])){
                                tmp_arr_new_2[key]=value;
                            }

                        });
                        rocketform.setUiData2('steps','tab_title',tmp_arr_new_2); 
                    
                    
                       //delete tab on preview
                        $('.uiform-step-list .uiform-steps li a[data-tab-nro="'+tmpTab_inner_num+'"]').parent().remove();
                        
                        //delete tab on settings
                        $(this).parent().remove();
                    
                    }


                 });
                this.setUiData2('steps','num_tabs',tabCount);
                 
                                          
               /*clean draggin fields by error- some user had this problem*/
                 $('.uiform-main-form').find('.uiform-draggable-field').remove();
            }/* end try*/
                catch (ex) {
               console.error("saveform_cleanForm : ", ex.message);
                }            
                        
       };
       arguments.callee.wizardtab_cleanTabs = function () {
                $('#uifm_frm_skin_tabs_box').html('');
                var numtabs=$('.uiform-steps li');
                var currentTab,currentIndex,currentVal,currentFields;
                 $.each(numtabs, function(index, value) {
                    currentTab= $(this).find('a').attr('href');
                    if(parseInt($(currentTab).length)!=0){
                        currentIndex=$(this).find('a').attr('data-tab-nro');
                        currentVal=$(this).find('a span.uifm-title').text();
                        rocketform.wizardtab_addTabController(currentIndex);
                        $('#uifm_frm_skin_tabs_box').find('#uifm_frm_skin_tab'+currentIndex+'_title').val(currentVal);
                        currentFields=$(currentTab).find('.uiform-field');
                            if(parseInt(currentFields.length)!=0){
                                $.each(currentFields, function(index2, value2) {
                                   try{
                                        if(typeof mainrformb['steps_src'][currentIndex][$(this).attr('id')]=='undefined'){
                                              $(this).remove(); 
                                              rocketform.delUiData3('steps_src',currentIndex,$(this).attr('id'));
                                        }
                                   }catch(ex){
                                       $(this).remove();
                                       try{
                                           rocketform.delUiData3('steps_src',currentIndex,$(this).attr('id'));
                                       }catch(ex){}                                     
                                   }
                                });
                            }
                       
                          
                          
                    }else{
                       $(this).remove(); 
                       $(currentTab).remove();
                    }
                    
                });
                
                 /*clean main data*/  
                        if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                          $.each(mainrformb['steps_src'], function(index3, value3) {
                              $.each(value3, function(index4, value4) {
                                    if(parseInt($('#'+index4).length)!=0){
                                        
                                    }else{
                                       rocketform.delUiData3('steps_src',index3,index4); 
                                    }
                                }); 
                          });  
                        }
                
                
             };      
       arguments.callee.wizardtab_addNewTab = function () {
               var num = $('.uiform-steps li').length;
               var newNum = new Number(num);
               var wiz_theme_typ=parseInt(this.getUiData2('wizard','theme_type'));
               var stringvar;
                switch(wiz_theme_typ)
                {
                case 0:
                case 1:
                    //tab heads
                     stringvar ='<li class="uifm-current">';
                        stringvar+='<a data-tab-nro="'+newNum+'" href="#uifm-step-tab-'+newNum+'">';
                        stringvar+='<span class="uifm-number">'+(newNum+1)+'</span>';
                        stringvar+='<span class="uifm-title">Tab title'+(newNum+1)+'</span>';
                        stringvar+='</a>';
                        stringvar+='</li>';

                        $('.uiform-steps').find('.uifm-current').removeClass('uifm-current').addClass('uifm-disabled');
                        $('.uiform-steps').append(stringvar);
                    break;
                }
               //add new to main data
               rocketform.addIndexUiData2('steps','tab_title',parseInt(newNum));
               rocketform.setUiData3('steps','tab_title',parseInt(newNum),{title:'Tab title '+(newNum)});
               
               //tab content
               var stringvar2 ='<div data-uifm-step="'+newNum+'" id="uifm-step-tab-'+newNum+'" class="uiform-step-pane">';
                   stringvar2+='<div id="" class="uiform-items-container uiform-tab-container"></div>';
                   stringvar2+='</div>';
                   $('.uiform-step-content').append(stringvar2);
               //manage tab event
               $(".uiform-step-pane").hide(); 
               $('#uifm-step-tab-'+newNum).show();
               
               //unbinding event and reload again
               $('ul.uiform-steps li').off('click');
               this.wizardtab_tabManageEvt();
               /* adding on tab*/
               rocketform.wizardtab_addTabController(newNum);
               //refresh sortable forms
               enableSortableItems();
               //check if wizards buttons added on preview section
               //this.wizardtab_addSubmitButton();
             };
      arguments.callee.wizardtab_addTabController = function (numvar) {
            try{
                var tmp_tmpl= wp.template("zgfm-frm-wiz-templates");
                var tmpTpl2 = $('<div></div>');
                tmpTpl2.append(tmp_tmpl());
                tmpTpl2.find('.uifm_frm_skin_tab_content').attr('data-tab-nro',numvar);
                tmpTpl2.find('.uifm_frm_skin_tab_title_evt').attr('id','uifm_frm_skin_tab'+numvar+'_title');
                tmpTpl2.find('.uifm_frm_skin_tab_title_evt').val('Tab title '+(numvar+1));
                tmpTpl2.find('.uifm_frm_skin_tab_title_evt').parent().find('label span').html((numvar+1));
               
                $('#uifm_frm_skin_tabs_box').append(tmpTpl2);
            }/* end try*/
            catch (ex) {
            console.error("wizardtab_addTabController : ", ex.message);
            }
      };
      arguments.callee.wizardtab_gotoFirstPosition = function () {
           //go to first tab
          $('.uiform-steps').find('.uifm-current').removeClass('uifm-current').addClass('uifm-disabled');
          $('.uiform-steps li:first').removeClass('uifm-disabled').addClass('uifm-current');
          //go to first content
          $('.uiform-step-content .uiform-step-pane').hide();
          $('.uiform-step-content .uiform-step-pane:first').show();
      };
      arguments.callee.wizardtab_deleteTab = function (element) {
          var el=$(element);
          var el_num=el.closest('.uifm_frm_skin_tab_content').data('tab-nro');
          if(parseInt(el_num)!=0){
              var tabobj=$(".uiform-step-list li > a[data-tab-nro='"+el_num+"']");
              
            tabobj.parent().remove();
            //remove content
            $('#uifm-step-tab-'+el_num).remove();
            this.wizardtab_gotoFirstPosition();
            el.closest('.uifm_frm_skin_tab_content').remove();

            //delete main data
             rocketform.spliceUiData3('steps','tab_title',parseInt(el_num));
             rocketform.spliceUiData3('steps','tab_cont',parseInt(el_num));            
             rocketform.spliceUiData2('steps_src',parseInt(el_num));
             var tmp_num_tabs=$(".uiform-step-list li > a").length;
             rocketform.setUiData('num_tabs',parseInt(tmp_num_tabs));

             //wizard tab refresh
             $.each($('.uiform-step-list li > a'), function(index, value) {
                           $(this).attr('data-tab-nro',index);
                           $(this).attr('href','#uifm-step-tab-'+index);
                 });   
             //wizard content refresh
             $.each($('.uiform-step-content > div'), function(index, value) {
                           $(this).attr('id','uifm-step-tab-'+index);
                           $(this).attr('data-uifm-step',index);
                 });

             //refresh tab settings
              rocketform.wizardtab_refreshTabSettings();

          }
          
      };
      arguments.callee.wizardtab_changeTheme = function (type) {
          this.setUiData2('wizard','theme_type',type);
          this.wizardtab_showOptions();
          //refresh tab
         rocketform.wizardtab_setDataToTabSettings();
          //refresh head tab 
          this.wizardtab_changeThemeOnPreview();
      };
      arguments.callee.wizardtab_changeThemeOnPreview = function () {
          
          var wiz_theme_typ=parseInt(this.getUiData2('wizard','theme_type'));
          this.wizardtab_gotoFirstPosition();
           $('ul.uiform-steps li').off('click');
         $('.uiform-step-list').html('');
         $('.uiform-step-list').attr('class','uiform-step-list');
         var elm_li=this.getUiData2('steps','tab_title');
         var string_html='';
         var count=0;
            switch(wiz_theme_typ)
            {
            case 0:
               $('.uiform-step-list').addClass('uiform-wiztheme0');
               string_html+='';
               string_html+='<ul class="uiform-steps">';
               
               $.each(elm_li, function(index, value) {
                  if(count===0){
                    string_html+='<li class="uifm-current">';
                  }else{
                    string_html+='<li class="uifm-disabled">';  
                  }
                    string_html+='<a href="#uifm-step-tab-'+index+'" data-tab-nro="'+index+'">';
                    string_html+='<span class="uifm-number">'+(parseInt(index)+1)+'</span>';
                    string_html+='<span class="uifm-title">'+value.title+'</span>';
                    string_html+='</a>';
                  string_html+='</li>';
                  count++;
                }); 
               string_html+='</ul>'; 
                $('.uiform-step-list').html(string_html);
                break;
             case 1:
                $('.uiform-step-list').addClass('uiform-wiztheme1');
                string_html+='';
               string_html+='<ul class="uiform-steps">';
               
               $.each(elm_li, function(index, value) {
                  if(count===0){
                    string_html+='<li class="uifm-current">';
                  }else{
                    string_html+='<li class="uifm-disabled">';  
                  }
                    string_html+='<a href="#uifm-step-tab-'+index+'" data-tab-nro="'+index+'">';
                    string_html+='<span class="uifm-number">'+(parseInt(index)+1)+'</span>';
                    string_html+='<span class="uifm-title">'+value.title+'</span>';
                    string_html+='</a>';
                  string_html+='</li>';
                  count++;
                }); 
               string_html+='</ul>'; 
                $('.uiform-step-list').html(string_html);
                break;
            }
            
            //unbinding event and reload again
            this.wizardtab_tabManageEvt();
      };
      arguments.callee.wizardtab_showOptions = function () {
          try{
            var clvars;
            clvars = [
            '#uifm_frm_wiz_tab_cont_wrap'    
            ,'#uifm_frm_wiz_tab_active_wrap'
            ,'#uifm_frm_wiz_tab_inactive_wrap'
            ,'#uifm_frm_wiz_tab_active_bgcolor_wrap'
            ,'#uifm_frm_wiz_tab_active_txtcolor_wrap'
            ,'#uifm_frm_wiz_tab_active_numtxtcolor_wrap'
            ,'#uifm_frm_wiz_tab_active_bg_numtxt_wrap'
            ,'#uifm_frm_wiz_tab_inactive_bgcolor_wrap'
            ,'#uifm_frm_wiz_tab_inactive_txtcolor_wrap'
            ,'#uifm_frm_wiz_tab_inactive_numtxtcolor_wrap'
            ,'#uifm_frm_wiz_tab_cont_bgcolor_wrap'
            ,'#uifm_frm_wiz_tab_cont_borcol_wrap'
            ,'#uifm_frm_wiz_tab_done_wrap'
            ,'#uifm_frm_wiz_tab_done_bgcolor_wrap'
            ,'#uifm_frm_wiz_tab_done_txtcolor_wrap'
            ,'#uifm_frm_wiz_tab_done_numtxtcolor_wrap'
        ];
        $.each(clvars,function(){
            $(String(this)).addClass("uifm-hide");
        });
        
        var wiz_theme_typ=parseInt(this.getUiData2('wizard','theme_type'));
        
        switch(wiz_theme_typ)
        {
         case 0:
                  clvars = [
                    '#uifm_frm_wiz_tab_cont_wrap'    
                    ,'#uifm_frm_wiz_tab_active_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_wrap'
                    ,'#uifm_frm_wiz_tab_active_bgcolor_wrap'
                    ,'#uifm_frm_wiz_tab_active_txtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_active_numtxtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_bgcolor_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_txtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_numtxtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_cont_bgcolor_wrap'
                    ,'#uifm_frm_wiz_tab_cont_borcol_wrap'
                    ,'#uifm_frm_wiz_tab_done_wrap'
                    ,'#uifm_frm_wiz_tab_done_bgcolor_wrap'
                    ,'#uifm_frm_wiz_tab_done_txtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_done_numtxtcolor_wrap'
                ];
                $.each(clvars,function(){
                    $(String(this)).removeClass("uifm-hide");
                });
             break;
         case 1:
                   clvars = [  
                    '#uifm_frm_wiz_tab_active_wrap'
                     ,'#uifm_frm_wiz_tab_active_bgcolor_wrap'
                     ,'#uifm_frm_wiz_tab_active_txtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_active_numtxtcolor_wrap'
                    ,'#uifm_frm_wiz_tab_active_bg_numtxt_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_bgcolor_wrap'
                    ,'#uifm_frm_wiz_tab_inactive_txtcolor_wrap'
                ];
                $.each(clvars,function(){
                    $(String(this)).removeClass("uifm-hide");
                });
             break;
        }
        }/* end try*/
        catch (ex) {
        console.error("wizardtab_showOptions : ", ex.message);
        }
        
      };
      arguments.callee.wizardtab_setDataToTabSettings = function () {
         
            try{
                
            var type=parseInt(this.getUiData2('wizard','theme_type'));
                    if(type){
                    $('#uifm_frm_wiz_theme_typ').val(type);
                    }   
            switch(type){
                case 0:
                     //tab current background color
                    var wiz_active_bgcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_bgcolor');
                    if(wiz_active_bgcol){
                    
                    $('#uifm_frm_wiz_tab_active_bgcolor').parent().colorpicker('setValue',wiz_active_bgcol);
                    $('#uifm_frm_wiz_tab_active_bgcolor').val(wiz_active_bgcol);
                    }
                    //tab current txt color
                    var wiz_active_txtcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_txtcolor');
                    if(wiz_active_txtcol){
                    
                    $('#uifm_frm_wiz_tab_active_txtcolor').parent().colorpicker('setValue',wiz_active_txtcol);
                    $('#uifm_frm_wiz_tab_active_txtcolor').val(wiz_active_txtcol);
                    }
                    //tab current numtxt color
                    var wiz_active_numtxtcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_numtxtcolor');
                    if(wiz_active_numtxtcol){              
                    
                    $('#uifm_frm_wiz_tab_active_numtxtcolor').parent().colorpicker('setValue',wiz_active_numtxtcol);
                        $('#uifm_frm_wiz_tab_active_numtxtcolor').val(wiz_active_numtxtcol);
                    }

                    //tab inactive background color
                    var wiz_inactive_bgcol=this.getUiData4('wizard','theme',type,'skin_tab_inac_bgcolor');
                    if(wiz_inactive_bgcol){
                    
                    $('#uifm_frm_wiz_tab_inactive_bgcolor').parent().colorpicker('setValue',wiz_inactive_bgcol);
                    $('#uifm_frm_wiz_tab_inactive_bgcolor').val(wiz_inactive_bgcol);
                    }
                    //tab current txt color
                    var wiz_inactive_txtcol=this.getUiData4('wizard','theme',type,'skin_tab_inac_txtcolor');
                    if(wiz_inactive_txtcol){
                    
                    $('#uifm_frm_wiz_tab_inactive_txtcolor').parent().colorpicker('setValue',wiz_inactive_txtcol);
                    $('#uifm_frm_wiz_tab_inactive_txtcolor').val(wiz_inactive_txtcol);
                    }
                    //tab inactive numtxt color
                    var wiz_inactive_numtxtcol=this.getUiData4('wizard','theme',type,'skin_tab_inac_numtxtcolor');
                    if(wiz_inactive_numtxtcol){
                    $('#uifm_frm_wiz_tab_inactive_numtxtcolor').parent().colorpicker('setValue',wiz_inactive_numtxtcol);
                    $('#uifm_frm_wiz_tab_inactive_numtxtcolor').val(wiz_inactive_numtxtcol);
                    }
                    //tab done background color
                    var wiz_done_bgcol=this.getUiData4('wizard','theme',type,'skin_tab_done_bgcolor');
                    if(wiz_done_bgcol){
                    
                    $('#uifm_frm_wiz_tab_done_bgcolor').parent().colorpicker('setValue',wiz_done_bgcol);
                    $('#uifm_frm_wiz_tab_done_bgcolor').val(wiz_done_bgcol);
                    }
                    //tab done txt color
                    var wiz_done_txtcol=this.getUiData4('wizard','theme',type,'skin_tab_done_txtcolor');
                    if(wiz_done_txtcol){
                    
                    $('#uifm_frm_wiz_tab_done_txtcolor').parent().colorpicker('setValue',wiz_done_txtcol);
                    $('#uifm_frm_wiz_tab_done_txtcolor').val(wiz_done_txtcol);
                    }
                    //tab done numtxt color
                    var wiz_done_numtxtcol=this.getUiData4('wizard','theme',type,'skin_tab_done_numtxtcolor');
                    if(wiz_done_numtxtcol){
                    $('#uifm_frm_wiz_tab_done_numtxtcolor').parent().colorpicker('setValue',wiz_done_numtxtcol);
                    $('#uifm_frm_wiz_tab_done_numtxtcolor').val(wiz_done_numtxtcol);
                    }
                    
                    //tab container bg color
                    var wiz_cont_bgcolor=this.getUiData4('wizard','theme',type,'skin_tab_cont_bgcolor');
                    if(wiz_cont_bgcolor){
                    $('#uifm_frm_wiz_tab_cont_bgcolor').parent().colorpicker('setValue',wiz_cont_bgcolor);
                    $('#uifm_frm_wiz_tab_cont_bgcolor').val(wiz_cont_bgcolor);
                    }
                    //tab container border color
                    var wiz_cont_borcol=this.getUiData4('wizard','theme',type,'skin_tab_cont_borcol');
                    if(wiz_cont_borcol){
                    $('#uifm_frm_wiz_tab_cont_borcol').parent().colorpicker('setValue',wiz_cont_borcol);
                    $('#uifm_frm_wiz_tab_cont_borcol').val(wiz_cont_borcol);
                    }
                     
                    break;
                case 1:
                     //tab current background color
                    var wiz_active_bgcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_bgcolor');
                    if(wiz_active_bgcol){
                    
                    $('#uifm_frm_wiz_tab_active_bgcolor').parent().colorpicker('setValue',wiz_active_bgcol);
                    $('#uifm_frm_wiz_tab_active_bgcolor').val(wiz_active_bgcol);
                    }
                    //tab current txt color
                    var wiz_active_txtcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_txtcolor');
                    if(wiz_active_txtcol){
                    
                    $('#uifm_frm_wiz_tab_active_txtcolor').parent().colorpicker('setValue',wiz_active_txtcol);
                    $('#uifm_frm_wiz_tab_active_txtcolor').val(wiz_active_txtcol);
                    }
                    //tab current numtxt color
                    var wiz_active_numtxtcol=this.getUiData4('wizard','theme',type,'skin_tab_cur_numtxtcolor');
                    if(wiz_active_numtxtcol){              
                    
                    $('#uifm_frm_wiz_tab_active_numtxtcolor').parent().colorpicker('setValue',wiz_active_numtxtcol);
                        $('#uifm_frm_wiz_tab_active_numtxtcolor').val(wiz_active_numtxtcol);
                    }
                    //tab current bg wrap numtxt color
                    var wiz_active_bg_numtxt=this.getUiData4('wizard','theme',type,'skin_tab_cur_bg_numtxt');
                    if(wiz_active_bg_numtxt){              
                    $('#uifm_frm_wiz_tab_active_bg_numtxt').parent().colorpicker('setValue',wiz_active_bg_numtxt);
                        $('#uifm_frm_wiz_tab_active_bg_numtxt').val(wiz_active_bg_numtxt);
                    }
                    
                    //tab inactive background color
                    var wiz_inactive_bgcol=this.getUiData4('wizard','theme',type,'skin_tab_inac_bgcolor');
                    if(wiz_inactive_bgcol){
                    
                    $('#uifm_frm_wiz_tab_inactive_bgcolor').parent().colorpicker('setValue',wiz_inactive_bgcol);
                    $('#uifm_frm_wiz_tab_inactive_bgcolor').val(wiz_inactive_bgcol);
                    }
                    //tab current txt color
                    var wiz_inactive_txtcol=this.getUiData4('wizard','theme',type,'skin_tab_inac_txtcolor');
                    if(wiz_inactive_txtcol){
                    
                    $('#uifm_frm_wiz_tab_inactive_txtcolor').parent().colorpicker('setValue',wiz_inactive_txtcol);
                    $('#uifm_frm_wiz_tab_inactive_txtcolor').val(wiz_inactive_txtcol);
                    }
                    
                    break;
            }
            
          }/* end try*/
             catch (ex) {
                console.error(" wizardtab_setDataToTabSettings : ", ex.message);
             }    
         
      };
      arguments.callee.wizardtab_refreshTabSettings = function () {
         try{
           //enable status
            var wiz_bg_st=(parseInt(this.getUiData2('wizard','enable_st'))===1)?true:false;
            $('#uifm_frm_wiz_st').bootstrapSwitchZgpb('state',wiz_bg_st);
             //painting tabs
             
                var wiz_tab_list=this.getUiData2('steps','tab_title');
                //cleaning all options
                $('#uifm_frm_skin_tabs_box').html('');
                
                
                $.each(wiz_tab_list, function(index, value) {
                    /* adding on tab*/
                   // if(parseInt(index)!=0){
                        rocketform.wizardtab_addTabController(index);    
                    //}
                    $('#uifm_frm_skin_tab'+index+'_title').val(value.title);
                });
                
                rocketform.wizardtab_setDataToTabSettings();
             }/* end try*/
             catch (ex) {
                console.error(" wizardtab_refreshTabSettings : ", ex.message);
             }   
      };
      arguments.callee.wizardtab_refreshPreview = function () {
          try{
              
         var wiz_theme_typ=parseInt(this.getUiData2('wizard','theme_type'));
          var  border_focus_str;
          var f_id='uifm_frm_wiz_css_head';
         
          switch(wiz_theme_typ){
              case 0:
                  //tab current background color
                var wiz_active_bgcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bgcolor');
                
               //tab current txt color
                var wiz_active_txtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_txtcolor');
                
                //tab current numtxt color
                var wiz_active_numtxtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_numtxtcolor');
                
                 //tab inactive background color
                var wiz_inactive_bgcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_bgcolor');
                
                //tab inactive txt color
                var wiz_inactive_txtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_txtcolor');
                
                //tab inactive numtxt color
                var wiz_inactive_numtxtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_numtxtcolor');
                
                //tab done background color
                var wiz_done_bgcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_bgcolor');
                
                //tab done txt color
                var wiz_done_txtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_txtcolor');
                
                //tab done numtxt color
                var wiz_done_numtxtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_numtxtcolor');
                
                //tab container bg color
                var wiz_cont_bgcolor=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cont_bgcolor');
                
                //tab container border color
                var wiz_cont_borcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cont_borcol');
                
          
                $('#'+f_id+'_tab').remove();
                border_focus_str='<style type="text/css" id="'+f_id+'_tab">';
               /*active*/
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-disabled a,';
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-disabled a:hover,';
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-disabled a:active {';
                border_focus_str+='background:'+wiz_inactive_bgcol+'!important;';
                border_focus_str+='color:'+wiz_inactive_txtcol+';';
                border_focus_str+='} ';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-number {';
                border_focus_str+='background-color: '+wiz_inactive_bgcol+'!important;';
                border_focus_str+='color:'+wiz_active_numtxtcol+';';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-number:after {';
                border_focus_str+=' border-left:14px solid '+wiz_active_bgcol+'!important;';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-current .uifm-number:before {';
                border_focus_str+='border-left-color: '+wiz_active_bgcol+'!important;';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-current .uifm-number:after {';
                border_focus_str+='border-left-color: '+wiz_active_bgcol+'!important;';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-disabled .uifm-number {';
                border_focus_str+='background-color: '+wiz_active_bgcol+'!important;';
                border_focus_str+='color:'+wiz_inactive_numtxtcol+';';
                border_focus_str+='}';
                /*inactive*/
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-current a,';
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-current a:hover,';
                border_focus_str+='.uiform-main-form .uiform-wiztheme0 .uiform-steps li.uifm-current a:active {';
                border_focus_str+='background:'+wiz_active_bgcol+'!important;';
                border_focus_str+='color:'+wiz_active_txtcol+';';
                border_focus_str+='} ';
                
                border_focus_str+='.uiform-wiztheme0 .uiform-steps .uifm-number:before{';
                border_focus_str+=' border-left:14px solid '+wiz_inactive_bgcol+'!important;';
                border_focus_str+='} ';
                
                border_focus_str+='.uiform-step-list.uiform-wiztheme0 {';
                if(parseInt(wiz_cont_borcol.length)!=0){
                border_focus_str+=' border:1px solid '+wiz_cont_borcol+'!important;';
                }
                if(parseInt(wiz_cont_bgcolor.length)!=0){
                border_focus_str+=' background-color: '+wiz_cont_bgcolor+'!important;';
                }
                border_focus_str+='} ';
                border_focus_str+='</style>';
                $('head').append(border_focus_str); 
                
                  break;
              case 1:
                  //tab current background color
                var wiz_active_bgcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bgcolor');
                
               //tab current txt color
                var wiz_active_txtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_txtcolor');
                
                //tab current numtxt color
                var wiz_active_numtxtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_numtxtcolor');
                
                //tab current bg numtxt color
                var wiz_active_bg_numtxt=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bg_numtxt');
                
                //tab inactive background color
                var wiz_inactive_bgcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_bgcolor');
                
                //tab inactive txt color
                var wiz_inactive_txtcol=this.getUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_txtcolor');
                
                   /*active*/
                $('#'+f_id+'_tab').remove();
                border_focus_str='<style type="text/css" id="'+f_id+'_tab">';
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-current::before,';
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-complete::before,';
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-current .uifm-number,';
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-complete .uifm-number {';
                border_focus_str+='border-color:'+wiz_active_bgcol+'!important;';
                border_focus_str+='} ';
                
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li .uifm-number{';
                border_focus_str+='background-color: '+wiz_active_bg_numtxt+'!important;';
                border_focus_str+='color:'+wiz_active_numtxtcol+';';
                border_focus_str+='border: 5px solid '+wiz_inactive_bgcol+';';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li .uifm-title{';
                border_focus_str+='color:'+wiz_inactive_txtcol+';';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li::before{';
                border_focus_str+='border-top: 4px solid '+wiz_inactive_bgcol+';';
                border_focus_str+='}';
                
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-complete .uifm-title,';
                border_focus_str+='.uiform-wiztheme1 .uiform-steps li.uifm-current .uifm-title {';
                border_focus_str+='color:'+wiz_active_txtcol+';';
                border_focus_str+='}';
                
                border_focus_str+='</style>';
                $('head').append(border_focus_str); 
                
                  break;
                 
          }
                    
         }/* end try*/
        catch (ex) {
        console.error(" wizardtab_refreshPreview : ", ex.message);
        } 
          
      }
      
      arguments.callee.wizardtab_saveChangesToMdata = function () {
          var wiz_st=($('#uifm_frm_wiz_st').prop( "checked" ))?1:0;
          var wiz_theme_typ=parseInt($('#uifm_frm_wiz_theme_typ').val());
          var wiz_active_bgcol=$('#uifm_frm_wiz_tab_active_bgcolor').val();
          var wiz_active_txtcol=$('#uifm_frm_wiz_tab_active_txtcolor').val();
          var wiz_active_numtxtcol=$('#uifm_frm_wiz_tab_active_numtxtcolor').val();
          var wiz_inactive_bgcol=$('#uifm_frm_wiz_tab_inactive_bgcolor').val();
          var wiz_inactive_txtcol=$('#uifm_frm_wiz_tab_inactive_txtcolor').val();
          var wiz_inactive_numtxtcol=$('#uifm_frm_wiz_tab_inactive_numtxtcolor').val();
          var wiz_done_bgcol=$('#uifm_frm_wiz_tab_done_bgcolor').val();
          var wiz_done_txtcol=$('#uifm_frm_wiz_tab_done_txtcolor').val();
          var wiz_done_numtxtcol=$('#uifm_frm_wiz_tab_done_numtxtcolor').val();
           var wiz_container_bgcol=$('#uifm_frm_wiz_tab_cont_bgcolor').val();
           var wiz_container_borcol=$('#uifm_frm_wiz_tab_cont_borcol').val();
        
       this.setUiData2('wizard','enable_st',wiz_st);
       this.setUiData2('wizard','theme_type',wiz_theme_typ);
       switch(wiz_theme_typ){
           case 0:
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bgcolor',wiz_active_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_txtcolor',wiz_active_txtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_numtxtcolor',wiz_active_numtxtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_bgcolor',wiz_inactive_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_txtcolor',wiz_inactive_txtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_numtxtcolor',wiz_inactive_numtxtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_bgcolor',wiz_done_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_txtcolor',wiz_done_txtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_done_numtxtcolor',wiz_done_numtxtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cont_bgcolor',wiz_container_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cont_borcol',wiz_container_borcol);
                break;
           case 1:
               var wiz_active_bg_numtxt=$('#uifm_frm_wiz_tab_active_bg_numtxt').val();
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bgcolor',wiz_active_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_txtcolor',wiz_active_txtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_numtxtcolor',wiz_active_numtxtcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_cur_bg_numtxt',wiz_active_bg_numtxt);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_bgcolor',wiz_inactive_bgcol);
                this.setUiData4('wizard','theme',wiz_theme_typ,'skin_tab_inac_txtcolor',wiz_inactive_txtcol);
                
                break;
       }
       
      };
     arguments.callee.wizardtab_tabManualEvt = function (element,selected) {
         var el;
         if(selected){
             var tmp_el=$(element).closest('.uifm_frm_skin_tab_content').attr('data-tab-nro');
             var tmp_tabhead=$('.uiform-step-list .uiform-steps a[data-tab-nro='+tmp_el+']');
             el=tmp_tabhead.parent();
         }else{
             el=$(element);
         }
          $("ul.uiform-steps li").removeClass("uifm-current").addClass("uifm-disabled");
                    el.addClass("uifm-current").removeClass("uifm-disabled"); 
                    $(".uiform-step-pane").hide();

                    var activeTab = el.find("a").attr("href");
                    
                    $(activeTab).show();
     };
       arguments.callee.wizardtab_tabManageEvt = function () {
                $('ul.uiform-steps li').on('click', function() {    
                   rocketform.wizardtab_tabManualEvt(this,false);
                    return false;
                });
             };
        arguments.callee.fieldsetting_updateName = function (step,id,name) {
            try{
               this.setUiData4('steps_src',String(step),String(id),'field_name',name);
               }/* end try*/
                catch (ex) {
                console.error("  updateName error : ", ex.message);
                }
             };
        arguments.callee.fieldsetting_deleteField = function (idselected) {
                  
                var fld_step=$('#'+idselected).closest('.uiform-step-pane').data('uifm-step');
                //delete from DOM
                $('#'+idselected).remove();
                rocketform.closeSettingTab();
                //delete from core data
                rocketform.delUiData3('steps_src',fld_step,idselected);
                var tmp_arr=mainrformb['steps_src'][fld_step];
                    var tmp_len = tmp_arr.length, tmp_i;
                    for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                            tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                    if($.isArray(tmp_arr)){
                        tmp_arr.splice(0 ,tmp_len);
                        mainrformb['steps_src'][fld_step]=tmp_arr;
                    }
             };
        
        arguments.callee.fieldsetting_deleteFieldFromPreview = function (el) {
            
            var box_title=$('#uifm_fld_del_box_title').val(),
            box_msg=$('#uifm_fld_del_box_msg').val(),
            btn1_title=$('#uifm_fld_del_box_bt1_title').val(),
            btn2_title=$('#uifm_fld_del_box_bt2_title').val();
            
                bootbox.dialog({
                    message: box_msg,
                    title: box_title,
                    buttons: {
                        fld_del_opt1: {
                            label: btn1_title,
                            className: "sfdc-btn-default",
                            callback: function() {
                                //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open'); 
                            }
                        },
                        fld_del_opt2: {
                            label: btn2_title,
                            className: "sfdc-btn-primary",
                            callback: function() {
                                var idselected=$(el).closest('.uiform-field').attr("id");  
                              rocketform.fieldsetting_deleteField(idselected); 
                              
                              //delete form variable
                              rocketform.formvariables_removeFromlist(idselected);
                              
                              //refresh customer email select
                              rocketform.fieldsdata_email_genListToIntMem();
                              
                              /*hiding tooltip after loading form*/
                                zgfm_back_helper.tooltip_removeall();
                                
                                 //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                            }
                        }
                    }
                    });
              
             };
        
        arguments.callee.fieldsetting_deleteFieldDialog = function () {
            
            var box_title=$('#uifm_fld_del_box_title').val(),
            box_msg=$('#uifm_fld_del_box_msg').val(),
            btn1_title=$('#uifm_fld_del_box_bt1_title').val(),
            btn2_title=$('#uifm_fld_del_box_bt2_title').val();
            
                bootbox.dialog({
                    message: box_msg,
                    title: box_title,
                    buttons: {
                        fld_del_opt1: {
                            label: btn1_title,
                            className: "sfdc-btn-default",
                            callback: function() {
                                 //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                            }
                        },
                        fld_del_opt2: {
                            label: btn2_title,
                            className: "sfdc-btn-primary",
                            callback: function() {
                               var idselected=$('#uifm-field-selected-id').val();  
                              rocketform.fields2_fieldsetting_deleteField(idselected); 
                               
                              //delete form variable
                              rocketform.formvariables_removeFromlist(idselected);
                              
                              //refresh customer email select
                              rocketform.fieldsdata_email_genListToIntMem();
                              
                              /*hiding tooltip after loading form*/
                                zgfm_back_helper.tooltip_removeall();
                                
                                 //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                            }
                        }
                    }
                    });
              
             };
             
             arguments.callee.mainfields_addFieldToForm = function (element,field_type) {
                //get current tab actived
                try{
                    var cur_step=$('.uiform-step-content .uiform-step-pane:visible').data('uifm-step');
                    var el=$(element).clone();
                   
                    $('.uiform-step-content #uifm-step-tab-'+cur_step+' .uiform-items-container:first').append(el);
                    rocketform.showLoader(1,true,true);
                    rocketform.getFieldsAfterDraggable(el,field_type,true,'');
               }/* end try*/
                catch (ex) {
                console.error("mainfields_addFieldToForm error : ", ex.message);
                }
             };
             arguments.callee.previewform_resizeBox = function (type) {
                 
                 var prev_box_desk_title=$('#uifm_frm_preview_msg_desktop_title').val();
                 var prev_box_tablet_title=$('#uifm_frm_preview_msg_tablet_title').val();
                 var prev_box_phone_title=$('#uifm_frm_preview_msg_phone_title').val();
                 
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').attr('class','sfdc-modal-dialog');
                 switch (parseInt(type)) {
                            case 1:
                                //desktop
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').animate({width:1100},200);
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').find('iframe').css('width',1070);
                                
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').find('.sfdc-modal-title').html(prev_box_desk_title);
                                
                                break;
                            case 2:
                                //tablet
                                 $('#uifm_preview_form').find('.sfdc-modal-dialog').animate({width:750},200);
                                 $('#uifm_preview_form').find('.sfdc-modal-dialog').find('iframe').css('width',720);
                                 $('#uifm_preview_form').find('.sfdc-modal-dialog').find('.sfdc-modal-title').html(prev_box_tablet_title);
                                break;
                            case 3:
                                //smartphone
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').animate({width:320},200).addClass('uifm_preview_phone');
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').find('iframe').css('width',300);
                                $('#uifm_preview_form').find('.sfdc-modal-dialog').find('.sfdc-modal-title').html(prev_box_phone_title);
                               
                                break;
                        }
                        
             };
             arguments.callee.previewform_showForm = function (type) {
                 var idform=$('#uifm_frm_main_id').val();
                 var prev_msg_notsaved=$('#uifm_frm_preview_msg_notsaved').val();
                 var prev_box_desk_title=$('#uifm_frm_preview_msg_desktop_title').val();
                 var prev_box_tablet_title=$('#uifm_frm_preview_msg_tablet_title').val();
                 var prev_box_phone_title=$('#uifm_frm_preview_msg_phone_title').val();
                 var windowWidth = $(window).width(); //retrieve current window width
                 var windowHeight = $(window).height(); //retrieve current window height
                 var documentWidth = $(document).width(); //retrieve current document width
                var documentHeight = $(document).height(); //retrieve current document height
                 if(parseInt(idform)>0){
                      $('#uifm_preview_form').removeData('bs.modal');
                    // $('#uifm_preview_form').sfdc_modal({remote: 'http://fiddle.jshell.net/bHmRB/51/show/' });
                        $('#uifm_preview_form').sfdc_modal('show');
                        switch (parseInt(type)) {
                            case 1:
                                //desktop
                                $('#uifm_preview_form').find('.sfdc-modal-title').text(prev_box_desk_title);
                                break;
                            case 2:
                                //tablet
                                $('#uifm_preview_form').find('.sfdc-modal-title').text(prev_box_tablet_title);
                                break;
                            case 3:
                                //smartphone
                                $('#uifm_preview_form').find('.sfdc-modal-title').text(prev_box_phone_title);
                                break;
                        }
                        
                        //hiding all tooltips
                 zgfm_back_helper.tooltip_removeall();
                        
                     $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_load_preview_form",
                            data: {
                            'action': 'rocket_fbuilder_load_preview_form',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'form_id':idform,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                            
                                $('#uifm_preview_form').find('.sfdc-modal-body').html(msg);
                                /*$('#uifm_preview_form').find('.sfdc-modal-body').css({width:'auto',
                               height:'auto', 
                              'max-height':'100%'});*/
                                rocketform.previewform_resizeBox(type);
                                /*rocketfm();   
                                rocketfm.loadform_init();*/
                            }
                        });
                     
                    
                 }else{
                      bootbox.alert(prev_msg_notsaved, function() {
                    });
                 }
             };
             
             arguments.callee.previewform_onClosePopUp = function () {
                 //closing popovers
                 $('.uiform_popover_frontend').popover('destroy');
             };
             
             arguments.callee.listform_duplicate = function () {
                 if($('.uiform-listform-chk-id').is(":checked")){
                     var data=$('#uiform-form-listform').serialize();
                     $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_listform_duplicate",
                            data:data+'&action=rocket_fbuilder_listform_duplicate&page=zgfm_form_builder&csrf_field_name='+uiform_vars.csrf_field_name,
                            success: function(msg) {
                                rocketform.redirect_tourl(uiform_vars.url_admin+'formbuilder/forms/list_uiforms');
                            }
                        });
                 }else{
                     $('#uifm_modal_msg').sfdc_modal('show');
                     $('#uifm_modal_msg .sfdc-modal-title').html($('#uifm_listform_popup_title').val());
                     $('#uifm_modal_msg .sfdc-modal-body').html('<p>'+$('#uifm_listform_popup_notforms').val()+'</p>');
                 }
             };
             
             arguments.callee.listform_selectallforms = function (element) {
                 var el=$(element);
                 if(el.is(":checked")){
                    $('.uiform-listform-chk-id').prop('checked',true); 
                 }else{
                     $('.uiform-listform-chk-id').prop('checked',false);
                    
                 }
                 
             };
             arguments.callee.modal_centerPos = function (el) {
                 el.each(function(i){
                    var $clone = $(this).clone().css('display', 'block').appendTo('body');
                    var top = Math.round(($clone.height() - $clone.find('.sfdc-modal-content').height()) / 2);
                    top = top > 0 ? top : 0;
                    $clone.remove();
                    $(this).find('.sfdc-modal-content').css("margin-top", top);
                });
             }
             
             arguments.callee.listform_updateStatus = function (form_st) {
                 
                 if($('.uiform-listform-chk-id').is(":checked")){
                     var data=$('#uiform-form-listform').serialize();
                     $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_listform_updatest",
                            data:data+'&action=rocket_fbuilder_listform_updatest&page=zgfm_form_builder&form_st='+form_st+'&zgfm_security='+uiform_vars.ajax_nonce+'&csrf_field_name='+uiform_vars.csrf_field_name,
                            success: function(msg) {
                                rocketform.redirect_tourl(uiform_vars.url_admin+'formbuilder/forms/list_uiforms');
                            }
                        });
                 }else{
                     $('#uifm_modal_msg').sfdc_modal('show');
                     $('#uifm_modal_msg .sfdc-modal-title').html($('#uifm_listform_popup_title').val());
                     $('#uifm_modal_msg .sfdc-modal-body').html('<p>'+$('#uifm_listform_popup_notforms').val()+'</p>');
                     $('#uifm_modal_msg').on('show.bs.modal',rocketform.modal_centerPos($('#uifm_modal_msg')));
                 }
                  
             };
             
             arguments.callee.listrecords_exportToCsv= function () {
                try{
                        var idrec=$('#uifm-record-form-cmb').val();
                       
                         $("body").append("<iframe src='" + uiform_vars.url_admin+ "formbuilder/records/action_csv_show_allrecords/?id="+idrec+"' style='display: none;' ></iframe>");
                               
                    }/* end try*/
                    catch (ex) {
                        console.error("listrecords_exportToCsv : ", ex.message);
                    } 
             };
             
             arguments.callee.listform_deleteFormById = function (idform) {
                 $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_delete_form_byid",
                            data: {
                            'action': 'rocket_fbuilder_delete_form',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'form_id':idform,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                            rocketform.redirect_tourl(uiform_vars.url_admin+'formbuilder/forms/list_uiforms');
                            }
                        }); 
             };
             arguments.callee.input2settings_labelOption = function (element) {
                 var el=$(element);
                 var optnro = el.closest('.uifm-fld-inp2-options-row').data('opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var opt_value=$('#uifm_frm_inp2_opt'+optnro+'_label').val();
                 
                 
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input2','options',optnro,'label',opt_value);
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 
                 //preview field
                 //var prev_el_sel=$('#'+f_id).find('.uifm-input2-wrap').find("[data-inp2-opt-index='" + optnro + "']");
                 
                 switch(parseInt(f_type)){
                    case 8:
                        /*radio button*/
                        $('#'+f_id).data('uiform_radiobtn').input2settings_preview_genAllOptions();
                        break;
                    case 9: 
                        /*checkbox*/
                        //prev_el_sel.find('.uifm-inp2-label').html(opt_value);
                        $('#'+f_id).data('uiform_checkbox').input2settings_preview_genAllOptions();
                        break;
                    case 10:
                        /*select*/
                        //prev_el_sel.html(opt_value);
                        
                        $('#'+f_id).data('uiform_select').input2settings_preview_genAllOptions();
                        
                        break;
                    case 11:
                        /*multiselect*/
                        //prev_el_sel.html(opt_value);
                        $('#'+f_id).data('uiform_multiselect').input2settings_preview_genAllOptions();
                        break; 
                    }
             };
             
             arguments.callee.input2settings_stl1_quickcolor = function (option) {
               var f_id= $('#uifm-field-selected-id').val();
               
               var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
               var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
               
               
               switch(parseInt(f_type)){
                   
                    case 10:
                        /*select*/
                       $('#'+f_id).data('uiform_select').input2settings_stl1_quickcolor(option);
                        break;
                    case 11:
                        /*multiselect*/
                       $('#'+f_id).data('uiform_multiselect').input2settings_stl1_quickcolor(option);
                        break; 
                    }
               
               
             };
             
             
              arguments.callee.input2settings_valueOption = function (element) {
                 var el=$(element);
                 var optnro = el.closest('.uifm-fld-inp2-options-row').data('opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var opt_value=$('#uiform-build-field-tab').find('#uifm_frm_inp2_opt'+optnro+'_value').val();
                 opt_value = uifm_stripHTML(opt_value);
                 
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                  
                 rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input2','options',optnro,'value',opt_value);
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 
                 
                  
             };
             
             arguments.callee.input2settings_statusRdoOption=function (element){
                 var el=$(element);
                 var f_id= $('#uifm-field-selected-id').val();
                 var type=$('#uifm-field-selected-type').val();
                 
                 switch(parseInt(type)){
                    case 8:
                        /*radio*/    
                         $('#'+f_id).data('uiform_radiobtn').input2settings_statusRdoOption(el);
                        break;
                    case 9:
                        /*checkbox*/
                         $('#'+f_id).data('uiform_checkbox').input2settings_statusRdoOption(el);
                        
                        break;
                    case 10:
                        /*select*/    
                         $('#'+f_id).data('uiform_select').input2settings_statusRdoOption(el);
                        break;
                    case 11:
                        /*multiselect*/
                         $('#'+f_id).data('uiform_multiselect').input2settings_statusRdoOption(el);
                        
                        break;      
                        
                 }
                 
                
             };
             
             arguments.callee.input17settings_deleteOption=function (element){
                 var el=$(element);
                 var f_id= $('#uifm-field-selected-id').val();
                 var opt_index=el.closest('.uifm-fld-inp17-options-row').data('opt-index');
                 
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 
                 //delete from setting tab
                 el.closest('.uifm-fld-inp17-options-row').remove();
                 //delete main data
                 rocketform.delUiData6('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(opt_index));
                 
                 var tmp_arr=mainrformb['steps_src'][parseInt(f_step)][f_id]['input17']['options'];
                                                var tmp_len = tmp_arr.length, tmp_i;
                                                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                                        tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                                if($.isArray(tmp_arr)){
                                                    tmp_arr.splice(0 ,tmp_len);
                                                    mainrformb['steps_src'][parseInt(f_step)][f_id]['input17']['options']=tmp_arr;
                                                }
                 
                 //preview field
                 var prev_el_sel=$('#'+f_id).find('.uifm-input17-wrap ').find("[data-inp17-opt-index='" + opt_index + "']");
                 prev_el_sel.remove();
                 
                 
                 
                 
             };
             
             arguments.callee.input17settings_deleteAllOptions=function (){
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'input17','options',{});
                 //preview
                 
                 switch(parseInt(f_type)){
                    case 41:
                        /*dyn checkbox*/    
                        $('#'+f_id).find('.uifm-dcheckbox-group').html('');
                        break;
                    case 42:
                        /*dyn radiobtn*/
                        $('#'+f_id).find('.uifm-dradiobtn-group').html('');
                        
                        break;
                 }
                 
                 //option editor
                 $('#uifm-fld-inp17-options-container').html('');
             };
             arguments.callee.input17settings_addNewOption=function (){
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 var newopt;
                 var img_obj_item;
                 var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||'1';
                 
                 var optindex = $('#uifm-fld-inp17-options-container .uifm-fld-inp17-options-row').length;
                while (parseInt($('#uifm-fld-inp17-options-container .uifm-fld-inp17-options-container .uifm-fld-inp17-options-row').length) != 0) {
                         optindex = parseInt(optindex)+1;
                    }
                 //set to main data
                 rocketform.addIndexUiData5('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex));
                 rocketform.setUiData6('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),{
                                     label:'Option 1',
                                     checked:0,
                                     price:0,
                                     img_list:{
                                         0:{
                                             img_full:'',
                                             img_th_150x150:'',
                                             title:'image 1'
                                         }
                                     },
                                     img_list_2:{},
                                     qty_st:'0',
                                     qty_max:'2'
                                    });
                 
                 switch(parseInt(thopt_mode)) {
                                case 2:
                                    rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',0);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',0,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',1);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',1,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',2);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',2,{img_full:''});
                                    break;
                                case 1:
                                default:
                                    
                            } 
                 
                 var options =this.getUiData6('steps_src',f_step,f_id,'input17','options',parseInt(optindex));
                 
                 switch(parseInt(f_type)){
                     case 41:
                         /*dinamic checkbox*/
                            newopt=$('#uifm_frm_inp17_templates').find('.uifm-fld-inp17-options-row').clone();
                            newopt.attr('data-opt-index',optindex);
                            
                            /*label*/
                            newopt.find('.uifm_frm_inp17_opt_label').val(options.label);
                            /*checkbox*/
                            newopt.find('.uifm_frm_inp17_opt_ckeck').prop( "checked",parseInt(options.checked));
                            /*price*/
                            newopt.find('.uifm_frm_inp17_opt_price').val(options.price);
                            /*qty_st*/
                            newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb();
                            if(parseInt(options.qty_st)){
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',true);
                            }else{
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',false);
                            }
                            
                            /*qty_max*/
                            newopt.find(".uifm_fld_inp17_spinner").TouchSpin({
                                verticalbuttons: true,
                                min: 1,
                                max: 1000000000,
                                stepinterval: 1,
                                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
                            });
                            newopt.find('.uifm_frm_inp17_opt_qty_max').val(options.qty_max);
                            
                            /*set images*/
                            
                            switch(parseInt(thopt_mode)) {
                                case 2:
                                    
                                        $.each(options.img_list_2, function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt2_imgwrap').clone();
                                            if(value2['img_full']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_full']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }
                                            img_obj_item.attr('data-opt-index',index2);
                                            // img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap').append(img_obj_item);
                                        });
                                        
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="0"]').find('.col-md-8 p').attr('class','alert alert-success').html('Checked');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="1"]').find('.col-md-8 p').attr('class','alert alert-warning').html('Hover');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="2"]').find('.col-md-8 p').attr('class','alert alert-info').html('Unchecked');
                                        
                                        
                                    
                                    break;
                                case 1:
                                default:
                                   if(options.img_list){
                                        $.each(options.img_list, function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt_imgwrap').clone();
                                            if(value2['img_th_150x150']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_th_150x150']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }

                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_wrap').append(img_obj_item);
                                        });
                                    }
                            }
                             
                            $('#uifm-fld-inp17-options-container').append(newopt);
                            /*enable autogrow*/
                            $("#uifm-fld-inp17-options-container .autogrow").autogrow();
                        break;
                        
                        case 42:
                         /*dinamic radiobtn*/
                            newopt=$('#uifm_frm_inp17_templates').find('.uifm-fld-inp17-options-row').clone();
                            newopt.attr('data-opt-index',optindex);
                            
                            /*label*/
                            newopt.find('.uifm_frm_inp17_opt_label').val(options.label);
                            /*checkbox*/
                            newopt.find('.uifm_frm_inp17_opt_ckeck').prop( "checked",parseInt(options.checked));
                            /*price*/
                            newopt.find('.uifm_frm_inp17_opt_price').val(options.price);
                            /*qty_st*/
                            newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb();
                            if(parseInt(options.qty_st)){
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',true);
                            }else{
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',false);
                            }
                            
                            /*qty_max*/
                            newopt.find(".uifm_fld_inp17_spinner").TouchSpin({
                                verticalbuttons: true,
                                min: 1,
                                max: 1000000000,
                                stepinterval: 1,
                                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
                            });
                            newopt.find('.uifm_frm_inp17_opt_qty_max').val(options.qty_max);
                            
                            /*set images*/
                            switch(parseInt(thopt_mode)) {
                                case 2:
                                    
                                        $.each(options.img_list_2, function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt2_imgwrap').clone();
                                            if(value2['img_full']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_full']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }
                                            img_obj_item.attr('data-opt-index',index2);
                                            // img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap').append(img_obj_item);
                                        });
                                        
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="0"]').find('.col-md-8 p').attr('class','alert alert-success').html('Checked');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="1"]').find('.col-md-8 p').attr('class','alert alert-warning').html('Hover');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="2"]').find('.col-md-8 p').attr('class','alert alert-info').html('Unchecked');
                                        
                                        
                                    
                                    break;
                                case 1:
                                default:
                                   if(options.img_list){
                                        $.each(options.img_list, function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt_imgwrap').clone();
                                            if(value2['img_th_150x150']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_th_150x150']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }

                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_wrap').append(img_obj_item);
                                        });
                                    }
                            }
                            $('#uifm-fld-inp17-options-container').append(newopt);
                            /*enable autogrow*/
                            $("#uifm-fld-inp17-options-container .autogrow").autogrow();
                        break;
                        
                 }
                 
                 //show options
                 rocketform.input17settings_showOptionbyLayMode(thopt_mode);
                 
                 //attach event to bootstrapSwitch
              newopt.find('.switch-field-17').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
                    var f_val=(state)?1:0;
                    rocketform.input17settings_updateOption($( this ),f_val,'qty_st');
                });
                
               newopt.find(".uifm_frm_inp17_opt_qty_max").on("change", function(e) {
                    var f_val=$(e.target).val();
                   rocketform.input17settings_updateOption($(e.target),f_val,'qty_max');
                });
               
               /*preview field*/
               rocketform.input17settings_preview_addNew(parseInt(optindex));
               
             };
             arguments.callee.input17settings_preview_addNew=function (optindex){
                  var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var options =this.getUiData6('steps_src',f_step,f_id,'input17','options',parseInt(optindex));
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 
                 var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||'1';
                 
                 var tmp_img_list;
                 switch(parseInt(thopt_mode)){
                     case 2:
                         tmp_img_list=options.img_list_2;
                         break;
                     case 1:
                     default:
                         tmp_img_list=options.img_list;
                 }
                 
                 var newopt;
                 var img_obj_item;
                 switch(parseInt(f_type)){
                     case 41:
                         /*dinamic checkbox*/
                         newopt=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item').clone();
                         newopt.attr('data-inp17-opt-index',optindex);
                         rocketform.input17settings_preview_setOption(newopt,optindex,'label',null,null,options.label);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'checked',null,null,options.checked);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'price',null,null,options.price);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'qty_st',null,null,options.qty_st);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'qty_max',null,null,options.qty_max);
                         /*set images*/
                            if(tmp_img_list){
                                $.each(tmp_img_list, function(index2, value2) {
                                    img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                    if(value2['img_full']){
                                        img_obj_item.attr('href',value2['img_full']);
                                    }else{
                                        img_obj_item.attr('href',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                    }
                                    if(value2['img_th_150x150']){
                                        img_obj_item.find('img').attr('src',value2['img_th_150x150']);
                                    }else{
                                        img_obj_item.find('img').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                    }
                                    img_obj_item.attr('title',value2['title']);
                                    newopt.find('.uifm-dcheckbox-item-gal-imgs').append(img_obj_item);
                                });
                            }
                         
                         $('#'+f_id).find('.uifm-dcheckbox-group').append(newopt);
                         /*apply plugin*/
                         newopt.uiformDCheckbox();
                        break;
                        case 42:
                         /*dinamic radiobtn*/
                         newopt=$('#uifm_frm_inp17_templates').find('.uifm-dradiobtn-item').clone();
                         newopt.attr('data-inp17-opt-index',optindex);
                         rocketform.input17settings_preview_setOption(newopt,optindex,'label',null,null,options.label);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'checked',null,null,options.checked);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'price',null,null,options.price);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'qty_st',null,null,options.qty_st);
                                    rocketform.input17settings_preview_setOption(newopt,optindex,'qty_max',null,null,options.qty_max);
                         /*set images*/
                            if(tmp_img_list){
                                $.each(tmp_img_list, function(index2, value2) {
                                    img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                    if(value2['img_full']){
                                        img_obj_item.attr('href',value2['img_full']);
                                    }else{
                                        img_obj_item.attr('href',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                    }
                                    if(value2['img_th_150x150']){
                                        img_obj_item.find('img').attr('src',value2['img_th_150x150']);
                                    }else{
                                        img_obj_item.find('img').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                    }
                                    img_obj_item.attr('title',value2['title']);
                                    newopt.find('.uifm-dcheckbox-item-gal-imgs').append(img_obj_item);
                                });
                            }
                         
                         $('#'+f_id).find('.uifm-dradiobtn-group').append(newopt);
                         /*apply plugin*/
                         newopt.uiformDCheckbox();
                        break;
                     }
                 
             }
             arguments.callee.input2settings_addNewRdoOption=function (){
                var newopt=$('#uifm_frm_inp2_templates').find('.uifm-fld-inp2-options-row').clone();
                var num = $('#uifm-fld-inp2-options-container .uifm-fld-inp2-options-row').length;
                
                var f_id= $('#uifm-field-selected-id').val();
                /*while (parseInt($("#"+f_id).find('.uifm-input2-wrap').find("[data-inp2-opt-index='" + optindex + "']").length) != 0) {
                         optindex = parseInt(optindex)+1;
                    }*/
                 
                 optindex = zgfm_back_helper.generateUniqueID(5);
                 var lenArrs = $("#uifm-fld-inp2-options-container").find('.uifm-fld-inp2-options-row').length;
                 var numorder=parseInt(lenArrs)+1;  
                 
                //add to input2 tab    
                newopt.attr('data-opt-index',optindex);
                
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                
                //cleaning
                if(parseInt(num)===0){
                    rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'input2','options',{});
                }
                
                switch(parseInt(f_type)){
                    case 8:
                        /*radio button*/
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+optindex+'_rdo');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('type','radio');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_rdo');
                        break;
                    case 9:
                        /*checkbox*/
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+optindex+'_chk');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_chk');
                        break;
                    case 10:
                        /*select*/
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+optindex+'_rdo');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('type','radio');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_rdo');
                        break;
                    case 11:
                        /*multiselect*/
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+optindex+'_chk');
                        newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_chk');
                        break;
                }
                
                 newopt.find('.uifm_frm_inp2_opt_label_evt').attr('id','uifm_frm_inp2_opt'+optindex+'_label');
                 newopt.find('.uifm_frm_inp2_opt_label_evt').val('New option');
                 
                 newopt.find('.uifm_frm_inp2_opt_value_evt').attr('id','uifm_frm_inp2_opt'+optindex+'_value');
                 newopt.find('.uifm_frm_inp2_opt_value_evt').val('New option');
                 
                 $('#uifm-fld-inp2-options-container').append(newopt);
                 
              
                 
                 //set to main data
                 rocketform.addIndexUiData5('steps_src',parseInt(f_step),f_id,'input2','options',optindex);
                 rocketform.setUiData6('steps_src',parseInt(f_step),f_id,'input2','options',optindex,{value:'Option',
                     label:'Option',
                     checked:0,
                     order:numorder,
                     id:optindex
                 });
                 
                    //preview field
                var f_balign;
                 var newoptprev;
                 switch(parseInt(f_type)){
                    case 8:
                        /*radio button*/
                        
                        /*newoptprev=$('#uifm_frm_inp2_templates').find('.sfdc-radio').clone();
                        newoptprev.attr('data-inp2-opt-index',optindex);
                         f_balign=this.getUiData5('steps_src',f_step,f_id,'input2','block_align');
                        if(parseInt(f_balign)===1){
                         newoptprev.attr('class','sfdc-radio-inline');   
                        }
                        newoptprev.find('.uifm-inp2-label').html('New option');
                         
                        $('#'+f_id).find('.uifm-input2-wrap').append(newoptprev);*/
                         $('#'+f_id).data('uiform_radiobtn').input2settings_preview_genAllOptions();      
                        break;
                    case 9:
                        /*checkbox*/
                        /*newoptprev=$('#uifm_frm_inp2_templates').find('.sfdc-checkbox').clone();
                         f_balign=this.getUiData5('steps_src',f_step,f_id,'input2','block_align');
                        if(parseInt(f_balign)===1){
                         newoptprev.attr('class','sfdc-checkbox-inline');   
                        }
                        newoptprev.attr('data-inp2-opt-index',optindex);
                        newoptprev.find('.uifm-inp2-label').html('New option');
                        $('#'+f_id).find('.uifm-input2-wrap').append(newoptprev);*/
                         $('#'+f_id).data('uiform_checkbox').input2settings_preview_genAllOptions();                    
                                             
                        break;
                    case 10:
                        /*select*/
                        
                        $('#'+f_id).data('uiform_select').input2settings_preview_genAllOptions();  
                        break;
                    case 11:
                        /*multiselect*/
                         
                        $('#'+f_id).data('uiform_multiselect').input2settings_preview_genAllOptions();
                        break;    
                        
                }
                 
             };
             
             arguments.callee.input2settings_deleteAllOptions=function (){
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'input2','options',{});
                 //preview
                 $('#'+f_id).find('.uifm-input2-wrap ').html('');
                 //option editor
                 $('#uifm-fld-inp2-options-container').html('');
             };
             
             arguments.callee.input2settings_fillBlankValues=function (){
                  var content=$('#uifm-fld-inp2-options-container');
                  
                  var vindex,tmp_label;
                 content.find('.uifm-fld-inp2-options-row').each(function (i) {
                             vindex = $(this).attr('data-opt-index');   
                             tmp_label = $('#uifm_frm_inp2_opt'+vindex+'_label').val();
                             
                             $('#uifm_frm_inp2_opt'+vindex+'_value').val(tmp_label).trigger("change");
                             
                            });
                  
             };
             
             arguments.callee.input2settings_ImportBulkData = function (){
                 try {
            
                        rocketform.fields_showModalOptions();

                        $.ajax({
                                            type: 'POST',
                                            url: rockfm_vars.uifm_siteurl+"formbuilder/fields/ajax_field_sel_impbulkdata",
                                            data: {
                                                'action': 'rocket_fbuilder_field_sel_impbulkdata',
                                                'page':'zgfm_form_builder',
                                                'zgfm_security':uiform_vars.ajax_nonce,
                                                'csrf_field_name':uiform_vars.csrf_field_name
                                                },
                                            success: function(msg) {
                                                $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                                                    $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html(msg.modal_body);
                                                    $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                                            }
                                        }); 

                    }/* end try*/
                        catch (ex) {
                        console.error("uiform-core.js input2settings_ImportBulkData ", ex.message);
                    }
             };
             
             
             arguments.callee.input2settings_ImportBulkData_process = function (){
                 var tmp_data=$('#zgfm-fld-sel-opt-bulkdata').val();
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 
                  
                 var allTextLines = tmp_data.split(/\r\n|\n/);
                    var headers = allTextLines[0].split('|');
                    var lines = [];

                    for (var i=0; i<allTextLines.length; i++) {
                        var data = allTextLines[i].split('|');
                        if (data.length == headers.length) {

                            var tarr = [];
                            for (var j=0; j<headers.length; j++) {
                                //tarr.push(headers[j]+":"+data[j]);
                                tarr.push(data[j]);
                            }
                            lines.push(tarr);
                        }
                    }
                 
                 //clean options
                 rocketform.input2settings_deleteAllOptions();
                 
                
                //generating new array obj 
                 var tmp_new_arr={};
                 var tmp_var1,tmp_var2,tmp_var3;
                 for (var i in lines){    
                     
                     tmp_var1=lines[i][0]||'';
                     tmp_var2=lines[i][1]||'';
                     tmp_var3=lines[i][2]||'';
                     
                     
                      tmp_new_arr[i]={
                                    value:tmp_var2,
                                    label:tmp_var1,
                                    checked:0
                                }
                 }
                 
                  rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'input2','options',tmp_new_arr);
                 
                   //preview field
                
                 switch(parseInt(f_type)){
                    case 8:
                       /*radio button*/
                        
                         $('#'+f_id).data('uiform_radiobtn').input2settings_preview_genAllOptions();   
                        break;
                    case 9:
                        /*checkbox*/
                      
                         $('#'+f_id).data('uiform_checkbox').input2settings_preview_genAllOptions();                    
                        break;
                    case 10:
                         /*select*/
                        
                        $('#'+f_id).data('uiform_select').input2settings_preview_genAllOptions();  
                        break;
                    case 11:
                       /*multiselect*/
                         
                        $('#'+f_id).data('uiform_multiselect').input2settings_preview_genAllOptions();
                        break;    
                        
                }
                
                //update tab settings
                rocketform.input2settings_tabeditor_generateAllOptions();
                
                //hide modal
                $('#zgpb-modal1').sfdc_modal('hide');
                
               
             }; 
             
             arguments.callee.clogic_removeAll=function(){
                 $('#uifm-conditional-logic-list').html('');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'clogic','list',[]);
             };
             arguments.callee.clogic_tabeditor_generateAllOptions=function(options){
                 $('#uifm-conditional-logic-list').html('');
                 var optindex;
                  var logic_row;
                  var logic_cont=$('#uifm-conditional-logic-list');
                  
                 $.each(options, function(index, value) {
                     if(value && parseInt($('#'+value['field_fire']).length)!=0){
                                    optindex = index;
                                logic_row=$('#uiform-set-clogic-tmpl .uifm-conditional-row').clone();
                                logic_row.attr('data-row-index',optindex);
                                logic_cont.append(logic_row);
                                /*get field*/   
                            rocketform.clogic_getListField(logic_row);

                            logic_row.find('.uifm_clogic_fieldsel').val(value['field_fire']).trigger('chosen:updated');
                            var field=rocketform.search_fieldById(value['field_fire']);
                            /*get match type*/   
                            rocketform.clogic_getTypeMatch(logic_row,field.type);
                            logic_row.find('.uifm_clogic_mtype select').val(value['mtype']).trigger('chosen:updated');
                            /*get match input*/   
                            rocketform.clogic_getMatchInput(logic_row,field);
                            switch(parseInt(field.type)){
                                case 8:
                                case 9:
                                case 10:
                                case 11:
                                case 41:
                                case 42:
                                //radio button & checkbox & select
                                if(parseInt(logic_row.find('.uifm_clogic_minput_1').find('option[value="'+value['minput']+'"]').length)!=0){
                                        logic_row.find('.uifm_clogic_minput_1').val(value['minput']).trigger('chosen:updated');
                                    }else{
                                      rocketform.clogic_tabeditor_removeifnomatch(index);
                                    }
                                break;
                                case 40:
                                                   
                                                    var tmp_val;
                                                    if(parseInt(value['minput'])===1){
                                                        tmp_val="1";
                                                    }else{
                                                        tmp_val="0";
                                                    }
                                                    logic_row.find('.uifm_clogic_minput_1').val(tmp_val).trigger('chosen:updated');
                                                    break;
                                case 16:
                                case 18:
                                    logic_row.find('.uifm_clogic_minput_2').val(value['minput']);
                                break;
                                }  
                     }else{
                         rocketform.clogic_tabeditor_removeifnomatch(index);
                         
                     }
                    
                    /*end for*/    
                 });
                 
             };
             
             arguments.callee.clogic_tabeditor_removeifnomatch=function(index){
                 var f_id= $('#uifm-field-selected-id').val();
                         var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                         var opt_index=index;
                         
                          //delete from setting tab
                            $('#uifm-conditional-logic-list').find('.uifm-conditional-row[data-row-index="'+index+'"]').remove();
                         //delete from core
                         rocketform.delUiData6('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(opt_index));
                            var tmp_arr=mainrformb['steps_src'][parseInt(f_step)][f_id]['clogic']['list'];
                                    var tmp_len = tmp_arr.length, tmp_i;
                                    for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                            tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                    if($.isArray(tmp_arr)){
                                        tmp_arr.splice(0 ,tmp_len);
                                        mainrformb['steps_src'][parseInt(f_step)][f_id]['clogic']['list']=tmp_arr;
                                    }
             }
             
             arguments.callee.input17settings_addNewImg=function(el){
                 el=$(el);
                 var f_id= $('#uifm-field-selected-id').val();
                 var item_img=el.closest('.uifm-fld-inp17-options-row');
                 var optindex=  item_img.attr('data-opt-index');
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var opt2index=el.closest('.uifm_frm_inp17_opt_imgwrap').attr('data-opt-index');
                
                 var newopt2_optwrap=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt_imgwrap').clone();
                 newopt2_optwrap.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                 newopt2_optwrap.find('.uifm_frm_inp17_opt_imgitem_title').val('image description'); 
                var num_imgs = item_img.find('.uifm_frm_inp17_opt_img_list_wrap .uifm_frm_inp17_opt_imgwrap').length;
                
                var newopt2_optindex = parseInt(num_imgs);
                while (parseInt(item_img.find('.uifm_frm_inp17_opt_img_list_wrap .uifm_frm_inp17_opt_imgwrap').find("[data-opt-index='" + optindex + "']").length) != 0) {
                         newopt2_optindex = parseInt(newopt2_optindex)+1;
                    }
                //add to input2 tab    
                newopt2_optwrap.attr('data-opt-index',newopt2_optindex);
               
               //add to tab view
                item_img.find('.uifm_frm_inp17_opt_img_list_wrap').append(newopt2_optwrap);
                //enable autogrow
                item_img.find('.uifm_frm_inp17_opt_img_list_wrap').find('.autogrow').autogrow();
                
               //add to form preview 
               
               //set to main data
                 rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(newopt2_optindex));
                      rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(newopt2_optindex),{img_full:'',img_th_150x150:'',title:'image description'});
                 
             };
             arguments.callee.input17settings_delImglistIndex=function(el){
                 el=$(el);
                 var f_id= $('#uifm-field-selected-id').val();
                 var item_img=el.closest('.uifm-fld-inp17-options-row');
                 var optindex=  item_img.attr('data-opt-index');
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var opt2index=el.closest('.uifm_frm_inp17_opt_imgwrap').attr('data-opt-index');
                 //delete from setting tab
                 el.closest('.uifm_frm_inp17_opt_imgwrap').remove();
                 //delete main data
                 rocketform.delUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(opt2index));
                 var tmp_arr=mainrformb['steps_src'][parseInt(f_step)][f_id]['input17']['options'][parseInt(optindex)]['img_list'];
                    var tmp_len = tmp_arr.length, tmp_i;
                    for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                            tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                    if($.isArray(tmp_arr)){
                        tmp_arr.splice(0 ,tmp_len);
                        mainrformb['steps_src'][parseInt(f_step)][f_id]['input17']['options'][parseInt(optindex)]['img_list']=tmp_arr;
                    }
                 //preview field
                 /*var prev_el_sel=$('#'+f_id).find('.uifm-input2-wrap ').find("[data-inp2-opt-index='" + opt_index + "']");
                 prev_el_sel.remove();*/
                 
             };
             
             arguments.callee.input17settings_labelOption=function(el){
                 el=$(el);
                 var item_img=el.closest('.uifm-fld-inp17-options-row');
                 var optindex=  item_img.attr('data-opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_val=el.val();
                
                var opt2index=el.closest('.uifm_frm_inp17_opt_imgwrap').attr('data-opt-index');

                /*storing to core data*/
                 rocketform.setUiData9('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(opt2index),'title',f_val);
                /*refreshing preview */ 
                 
             };
             
             arguments.callee.input17settings_preview_refreshImgs=function(item_main){
                 var optindex=  item_main.attr('data-inp17-opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var img_list=rocketform.getUiData7('steps_src',f_step,f_id,'input17','options',optindex,'img_list');
                 
                 var img_list_2=rocketform.getUiData7('steps_src',f_step,f_id,'input17','options',optindex,'img_list_2')||{};
                 var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||1;
                 
                 var newoptprev2;
                 item_main.find('.uifm-dcheckbox-item-gal-imgs').html('');
                 
                 switch(parseInt(thopt_mode)){
                     case 2:
                         if(img_list_2){
                             $.each(img_list_2, function(index, value) {
                                    if(value){
                                        newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                       newoptprev2.attr('data-inp17-opt2-index',index);
                                       item_main.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                                       rocketform.input17settings_preview_setOption(newoptprev2,optindex,'img_list_2',index,'img_full',value['img_full']);
                                    }

                                });
                         }
                         
                        break;
                     case 1:
                     default:
                        $.each(img_list, function(index, value) {
                            if(value){
                                newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                               newoptprev2.attr('data-inp17-opt2-index',index);
                               item_main.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                               rocketform.input17settings_preview_setOption(newoptprev2,optindex,'img_list',index,'title',value['title']);
                               rocketform.input17settings_preview_setOption(newoptprev2,optindex,'img_list',index,'img_full',value['img_full']);
                               rocketform.input17settings_preview_setOption(newoptprev2,optindex,'img_list',index,'img_th_150x150',value['img_th_150x150']);
                            }

                        }); 
                 }
                 item_main.uiformDCheckbox('refreshImgs');
                  
                 
             };
             
             arguments.callee.input18settings_savePaneBg=function(el,html){
                 
                 var imgurl = $('img',html).attr('src')||$(html).attr('src');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 //insert into tab
                 $('#uifm_frm_inp18_bg_srcimg_wrap').html('<img class="sfdc-img-thumbnail" src="'+imgurl+'">');
                 
                 //save to core
                 rocketform.setUiData6('steps_src',parseInt(f_step),f_id,'input18','pane_background','image',imgurl);
                 
                 //preview form
                 this.input18settings_preview_genAllOptions($('#'+f_id),'');
                 
                 
                 
             };
             
             arguments.callee.input17settings_saveSrcImgOption=function(el,html){
                 
                var item_img=el.closest('.uifm-fld-inp17-options-row');
                 var optindex=  item_img.attr('data-opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||1;
                 
                var opt2index;
                if(parseInt(thopt_mode)===2){
                    opt2index=el.closest('.uifm_frm_inp17_opt2_imgwrap').attr('data-opt-index');
                  }else{
                    opt2index=el.closest('.uifm_frm_inp17_opt_imgwrap').attr('data-opt-index');
                  }
                var imgurl = html;
                
                  //refresh image
                
                if(parseInt(thopt_mode)===2){
                    //refresh image
                    item_img.find('.uifm_frm_inp17_opt_img_list_2_wrap').find("[data-opt-index='" + opt2index + "']").find('.sfdc-img-thumbnail').attr('src',imgurl);
                     //store to data
                    rocketform.setUiData9('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list_2',parseInt(opt2index),'img_full',imgurl);
                    
                  }else{
                    //refresh image
                    item_img.find('.uifm_frm_inp17_opt_img_list_wrap').find("[data-opt-index='" + opt2index + "']").find('.sfdc-img-thumbnail').attr('src',imgurl);
                    //store to data
                    rocketform.setUiData9('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(opt2index),'img_full',imgurl);
                    //thumbnail
                    rocketform.setUiData9('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),'img_list',parseInt(opt2index),'img_th_150x150',imgurl);
                 
                  }
                 /*preview*/
                                var item_main;
                                switch(parseInt(f_type)){
                                    case 41:
                                        /*dinamic checkbox*/
                                        item_main=$('#'+f_id).find(".uifm-dcheckbox-item[data-inp17-opt-index='" + optindex + "']");
                                        break;
                                    case 42:
                                        /*dinamic radiobutton*/
                                        item_main=$('#'+f_id).find(".uifm-dradiobtn-item[data-inp17-opt-index='" + optindex + "']");
                                        break;
                                }
                                
                                rocketform.input17settings_preview_refreshImgs(item_main);
                
                 
             };
             arguments.callee.input17settings_changeSrcImg=function(element){
              var el=$(element);
              
              this.elfinder_showPopUp({
                                windowURL:uiform_vars.url_elfinder2,
                                windowName:'_blank',
                                height:490,
                                width:950,
                                centerScreen:1,
                                location:0
                            });
                  
                     window.processFile = function(file) {
                        rocketform.input17settings_saveSrcImgOption(el,file.url);
                    }
             };
             
             arguments.callee.input18settings_changeSrcImg=function(element){
              var el=$(element);
              
              this.elfinder_showPopUp({
                                windowURL:uiform_vars.url_elfinder2,
                                windowName:'_blank',
                                height:490,
                                width:950,
                                centerScreen:1,
                                location:0
                            });
                  
                     window.processFile = function(file) {
                        rocketform.input18settings_savePaneBg(el,file.url);
                    }
             };
             
             arguments.callee.elfinder_showPopUp=function(instanceSettings){
              
                    var defaultSettings = {
			centerBrowser:0, // center window over browser window? {1 (YES) or 0 (NO)}. overrides top and left
			centerScreen:0, // center window over entire screen? {1 (YES) or 0 (NO)}. overrides top and left
			height:500, // sets the height in pixels of the window.
			left:0, // left position when the window appears.
			location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
			menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
			resizable:0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
			scrollbars:0, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
			status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
			width:500, // sets the width in pixels of the window.
			windowName:null, // name of window set from the name attribute of the element that invokes the click
			windowURL:null, // url used for the popup
			top:0, // top position when the window appears.
			toolbar:0 // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
		};
		
		var settings = $.extend({}, defaultSettings, instanceSettings || {});
		
		var windowFeatures =    'height=' + settings.height +
								',width=' + settings.width +
								',toolbar=' + settings.toolbar +
								',scrollbars=' + settings.scrollbars +
								',status=' + settings.status + 
								',resizable=' + settings.resizable +
								',location=' + settings.location +
								',menuBar=' + settings.menubar;

				settings.windowName = this.name || settings.windowName;
				settings.windowURL = this.href || settings.windowURL;
				var centeredY,centeredX;
			
				if(settings.centerBrowser){
						
					if ($.browser.msie) {//hacked together for IE browsers
						centeredY = (window.screenTop - 120) + ((((document.documentElement.clientHeight + 120)/2) - (settings.height/2)));
						centeredX = window.screenLeft + ((((document.body.offsetWidth + 20)/2) - (settings.width/2)));
					}else{
						centeredY = window.screenY + (((window.outerHeight/2) - (settings.height/2)));
						centeredX = window.screenX + (((window.outerWidth/2) - (settings.width/2)));
					}
					window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
				}else if(settings.centerScreen){
					centeredY = (screen.height - settings.height)/2;
					centeredX = (screen.width - settings.width)/2;
                                        
					window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
				}else{
                                        
					window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + settings.left +',top=' + settings.top).focus();	
				}
				return false;
             };
             
             
             arguments.callee.input18settings_deleteBgImagePane=function(){
                 var f_id= $('#uifm-field-selected-id').val();
                  var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                  
                 //tab settings 
                 $('#uifm_frm_inp18_bg_srcimg_wrap').html('');
                 //save to core
                 rocketform.setUiData6('steps_src',parseInt(f_step),f_id,'input18','pane_background','image','');
                 //preview form
                 this.input18settings_preview_genAllOptions($('#'+f_id),'');
             };
             arguments.callee.input17settings_tabeditor_generateAllOptions=function(){
                 $('#uifm-fld-inp17-options-container').html('');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 var options =this.getUiData5('steps_src',f_step,f_id,'input17','options');
 
                 var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||'1';
                
                 var newopt;
                 var img_obj_item;
                 switch(parseInt(f_type)){
                     case 41:
                         /*dinamic checkbox*/
                         $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp17_templates').find('.uifm-fld-inp17-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            
                            /*label*/
                            newopt.find('.uifm_frm_inp17_opt_label').val(value['label']);
                            /*checkbox*/
                            newopt.find('.uifm_frm_inp17_opt_ckeck').prop( "checked",parseInt(value['checked']));
                            /*price*/
                            newopt.find('.uifm_frm_inp17_opt_price').val(value['price']);
                            /*qty_st*/
                            newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb();
                            if(parseInt(value['qty_st'])){
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',true);
                            }else{
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',false);
                            }
                            
                            /*qty_max*/
                            newopt.find(".uifm_fld_inp17_spinner").TouchSpin({
                                verticalbuttons: true,
                                min: 0,
                                max: 1000000000,
                                stepinterval: 1,
                                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
                            });
                            newopt.find('.uifm_frm_inp17_opt_qty_max').val(value['qty_max']);
                            
                            /*set images*/
                            switch(parseInt(thopt_mode)) {
                                case 2:
                                    if(!value['img_list_2'].length){
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',0);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',0,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',1);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',1,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',2);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',2,{img_full:''});
                                     
                                     value['img_list_2']= {
                                         0:{
                                             img_full:''
                                         },
                                         1:{
                                             img_full:''
                                         },
                                         2:{
                                             img_full:''
                                         }
                                     }; 
                                     
                                    }
                                        $.each(value['img_list_2'], function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt2_imgwrap').clone();
                                            if(value2['img_full']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_full']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }
                                            img_obj_item.attr('data-opt-index',index2);
//                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap').append(img_obj_item);
                                        });
                                        
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="0"]').find('.col-md-8 p').attr('class','alert alert-success').html('Checked');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="1"]').find('.col-md-8 p').attr('class','alert alert-warning').html('Hover');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="2"]').find('.col-md-8 p').attr('class','alert alert-info').html('Unchecked');
                                        
                                        
                                    
                                    break;
                                case 1:
                                default:
                                   
                                    if(value['img_list']){
                                        $.each(value['img_list'], function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt_imgwrap').clone();
                                            if(value2['img_th_150x150']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_th_150x150']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }

                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_wrap').append(img_obj_item);
                                        });
                                    }   
                            }
                            
                            $('#uifm-fld-inp17-options-container').append(newopt);
                            /*enable autogro*/
                            $("#uifm-fld-inp17-options-container .autogrow").autogrow();
                        });
                        break;
                        case 42:
                         /*dinamic radiobtn*/
                         $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp17_templates').find('.uifm-fld-inp17-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            
                            /*label*/
                            newopt.find('.uifm_frm_inp17_opt_label').val(value['label']);
                            /*checkbox*/
                            newopt.find('.uifm_frm_inp17_opt_ckeck').prop( "checked",parseInt(value['checked']));
                            /*price*/
                            newopt.find('.uifm_frm_inp17_opt_price').val(value['price']);
                            /*qty_st*/
                            newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb();
                            if(parseInt(value['qty_st'])){
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',true);
                            }else{
                                newopt.find('.uifm_frm_inp17_opt_qty_st').bootstrapSwitchZgpb('state',false);
                            }
                            
                            /*qty_max*/
                            newopt.find(".uifm_fld_inp17_spinner").TouchSpin({
                                verticalbuttons: true,
                                min: 0,
                                max: 1000000000,
                                stepinterval: 1,
                                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
                            });
                            newopt.find('.uifm_frm_inp17_opt_qty_max').val(value['qty_max']);
                            
                            /*set images*/
                            switch(parseInt(thopt_mode)) {
                                case 2:
                                    if(!value['img_list_2'].length){
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',0);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',0,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',1);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',1,{img_full:''});
                                     rocketform.addIndexUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',2);
                                     rocketform.setUiData8('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(index),'img_list_2',2,{img_full:''});
                                     
                                     value['img_list_2']= {
                                         0:{
                                             img_full:''
                                         },
                                         1:{
                                             img_full:''
                                         },
                                         2:{
                                             img_full:''
                                         }
                                     }; 
                                     
                                    }
                                        $.each(value['img_list_2'], function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt2_imgwrap').clone();
                                            if(value2['img_full']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_full']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }
                                            img_obj_item.attr('data-opt-index',index2);
//                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap').append(img_obj_item);
                                        });
                                        
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="0"]').find('.col-md-8 p').attr('class','alert alert-success').html('Checked');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="1"]').find('.col-md-8 p').attr('class','alert alert-warning').html('Hover');
                                        newopt.find('.uifm_frm_inp17_opt_img_list_2_wrap .uifm_frm_inp17_opt2_imgwrap[data-opt-index="2"]').find('.col-md-8 p').attr('class','alert alert-info').html('Unchecked');
                                       
                                    break;
                                case 1:
                                default:
                                    if(value['img_list']){
                                        $.each(value['img_list'], function(index2, value2) {
                                            img_obj_item=$('#uifm_frm_inp17_templates').find('.uifm_frm_inp17_opt_imgwrap').clone();
                                            if(value2['img_th_150x150']){
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',value2['img_th_150x150']);
                                            }else{
                                                img_obj_item.find('.sfdc-img-thumbnail').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');
                                            }

                                            img_obj_item.find('.uifm_frm_inp17_opt_imgitem_title').val(value2['title']);
                                            newopt.find('.uifm_frm_inp17_opt_img_list_wrap').append(img_obj_item);
                                        });
                                    }   
                            }
                            
                            $('#uifm-fld-inp17-options-container').append(newopt);
                            /*enable autogro*/
                            $("#uifm-fld-inp17-options-container .autogrow").autogrow();
                        });
                        break;
                 }
                 
                 //refresh images lists options
                 
                 rocketform.input17settings_showOptionbyLayMode(thopt_mode);
                 
                 //attach event to bootstrapSwitch
                 $('#uifm-fld-inp17-options-container .switch-field-17').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
                    var f_val=(state)?1:0;
                    rocketform.input17settings_updateOption($( this ),f_val,'qty_st');
                });
                
                $("#uifm-fld-inp17-options-container .uifm_frm_inp17_opt_qty_max").on("change", function(e) {

                    var f_val=$(e.target).val();
                   rocketform.input17settings_updateOption($(e.target),f_val,'qty_max');
                });
                 
             };
             
             arguments.callee.input17settings_showOptionbyLayMode=function(varmode){
                 if(parseInt(varmode)===2){
                    $('#uifm-fld-inp17-options-container .uifm_frm_inp17_opt_img_list_1').hide();
                    $('#uifm-fld-inp17-options-container .uifm_frm_inp17_opt_img_list_2').show();

                    $('#uifm_fld_inp17_thopt_zoom_wrap').hide();
                    $('#uifm_fld_inp17_thopt_usethmb_wrap').hide();
                    $('#uifm_fld_inp17_thopt_showcheckb_wrap').show();

                }else{
                    $('#uifm-fld-inp17-options-container .uifm_frm_inp17_opt_img_list_1').show();
                    $('#uifm-fld-inp17-options-container .uifm_frm_inp17_opt_img_list_2').hide();
                    $('#uifm_fld_inp17_thopt_zoom_wrap').show();
                    $('#uifm_fld_inp17_thopt_usethmb_wrap').show();
                    $('#uifm_fld_inp17_thopt_showcheckb_wrap').hide();
                }
             }
             
             arguments.callee.input17settings_enableCheckOption=function(el){
                el=$(el);
                var option=el.attr('data-option-store');
                var f_val=(el.is(':checked'))?1:0;
                var f_id= $('#uifm-field-selected-id').val();
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                
                var thopt_mode=this.getUiData5('steps_src',f_step,f_id,'input17','thopt_mode')||'1';
                
                rocketform.input17settings_updateOption(el,f_val,option);
                /*preview field*/
                var rowIndex=el.closest('.uifm-fld-inp17-options-row').attr('data-opt-index');
                
                var prevField;
                switch(parseInt(f_type)){
                     case 41:
                         /*dinamic checkbox*/
                         prevField=$('#'+f_id).find(".uifm-dcheckbox-item[data-inp17-opt-index='" + rowIndex + "']");
                       break;
                     case 42:
                        /*dinamic radiobtn*/
                        prevField=$('#'+f_id).find(".uifm-dradiobtn-item[data-inp17-opt-index='" + rowIndex + "']");
                       break;
                     }
                
                
                
                
                prevField.uiformDCheckbox('man_optChecked',f_val);
                
                switch(parseInt(thopt_mode)){
                    case 2:
                        prevField.uiformDCheckbox('man_mod2_refresh');
                        break;
                    case 1:
                    default:
                } 
                //var prevField_btnChk=prevField.find('.uifm-dcheckbox-item-chkst');
                //console.log('checkbox : '+prevField_btnChk.attr('class'));
             };
             arguments.callee.input17settings_onChangeOption=function(el){
                el=$(el);
                var option=el.attr('data-option-store');
                var f_val=el.val();
                rocketform.input17settings_updateOption(el,f_val,option);
                
                /*refreshing preview*/
                var f_id= $('#uifm-field-selected-id').val();
                
                rocketform.input17settings_preview_genAllOptions($('#'+f_id),'input17');
             };
             
             arguments.callee.input17settings_updateOption=function(obj,f_val,option){
                 var item_img=obj.closest('.uifm-fld-inp17-options-row');
                 var optindex=  item_img.attr('data-opt-index');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                /*storing to core data*/
                 rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'input17','options',parseInt(optindex),option,f_val);
                /*refreshing preview */
                var prevField;
                 switch(parseInt(f_type)){
                     case 41:
                     /*dinamic checkbox*/
                      prevField=$('#'+f_id).find(".uifm-dcheckbox-item[data-inp17-opt-index='" + optindex + "']");  
                       break;
                     case 42:
                     /*dinamic radiobtn*/
                      prevField=$('#'+f_id).find(".uifm-dradiobtn-item[data-inp17-opt-index='" + optindex + "']");
                       break;
                     }
                
                 switch(String(option)){
                     case 'qty_st':
                         prevField.uiformDCheckbox('man_optQtySt',f_val);
                         break;
                     case 'qty_max':
                         prevField.uiformDCheckbox('man_optQtyMax',f_val);
                         break;    
                 }
             };
             
             arguments.callee.input2settings_tabeditor_generateAllOptions=function(){
                 $('#uifm-fld-inp2-options-container').html('');
                 var f_id= $('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 var newopt;
                 
                 var options=this.getUiData5('steps_src',f_step,f_id,'input2','options');
                 switch(parseInt(f_type)){
                     case 8:
                         /*radio button*/
                         $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp2_templates').find('.uifm-fld-inp2-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+index+'_rdo');
                            newopt.find('.uifm_frm_inp2_opt_checked').prop( "checked",parseInt(value['checked']));
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('type','radio');
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_rdo');

                            newopt.find('.uifm_frm_inp2_opt_label_evt').attr('id','uifm_frm_inp2_opt'+index+'_label');
                            newopt.find('.uifm_frm_inp2_opt_label_evt').val(value['label']);
                            
                            newopt.find('.uifm_frm_inp2_opt_value_evt').attr('id','uifm_frm_inp2_opt'+index+'_value');
                            newopt.find('.uifm_frm_inp2_opt_value_evt').val(value['value']);
                            
                            $('#uifm-fld-inp2-options-container').append(newopt);
                        });
                        break;
                     case 9:
                         /*checkbox*/
                         $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp2_templates').find('.uifm-fld-inp2-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+index+'_chk');
                            newopt.find('.uifm_frm_inp2_opt_checked').prop( "checked",parseInt(value['checked']));
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_chk');

                            newopt.find('.uifm_frm_inp2_opt_label_evt').attr('id','uifm_frm_inp2_opt'+index+'_label');
                            newopt.find('.uifm_frm_inp2_opt_label_evt').val(value['label']);
                            
                            newopt.find('.uifm_frm_inp2_opt_value_evt').attr('id','uifm_frm_inp2_opt'+index+'_value');
                            newopt.find('.uifm_frm_inp2_opt_value_evt').val(value['value']);
                            
                            $('#uifm-fld-inp2-options-container').append(newopt);
                        });
                        break;
                     case 10:
                         /*select*/
                         $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp2_templates').find('.uifm-fld-inp2-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+index+'_rdo');
                            newopt.find('.uifm_frm_inp2_opt_checked').prop( "checked",parseInt(value['checked']));
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('type','radio');
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_rdo');

                            newopt.find('.uifm_frm_inp2_opt_label_evt').attr('id','uifm_frm_inp2_opt'+index+'_label');
                            newopt.find('.uifm_frm_inp2_opt_label_evt').val(value['label']);
                            
                            newopt.find('.uifm_frm_inp2_opt_value_evt').attr('id','uifm_frm_inp2_opt'+index+'_value');
                            newopt.find('.uifm_frm_inp2_opt_value_evt').val(value['value']);
                            
                            $('#uifm-fld-inp2-options-container').append(newopt);
                        });
                        break;
                     case 11:
                         /*multiselect*/
                          $.each(options, function(index, value) {
                            newopt=$('#uifm_frm_inp2_templates').find('.uifm-fld-inp2-options-row').clone();
                            newopt.attr('data-opt-index',index);
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('id','uifm_frm_inp2_opt'+index+'_chk');
                            newopt.find('.uifm_frm_inp2_opt_checked').prop( "checked",parseInt(value['checked']));
                            newopt.find('.uifm_frm_inp2_opt_checked').attr('name','uifm_inp2_chk');

                            newopt.find('.uifm_frm_inp2_opt_label_evt').attr('id','uifm_frm_inp2_opt'+index+'_label');
                            newopt.find('.uifm_frm_inp2_opt_label_evt').val(value['label']);
                            
                            newopt.find('.uifm_frm_inp2_opt_value_evt').attr('id','uifm_frm_inp2_opt'+index+'_value');
                            newopt.find('.uifm_frm_inp2_opt_value_evt').val(value['value']);
                            
                            $('#uifm-fld-inp2-options-container').append(newopt);
                        });
                        break;
                         
                 }
                 
                 
             };
             
             arguments.callee.input2settings_deleteOption=function (element){
                 
                 var el=$(element);
                 var f_id= $('#uifm-field-selected-id').val();
                 var opt_index=el.closest('.uifm-fld-inp2-options-row').data('opt-index');
                 
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var f_type=$('#uifm-field-selected-type').val();
                 //delete from setting tab
                 el.closest('.uifm-fld-inp2-options-row').remove();
                 //delete main data
                 rocketform.delUiData6('steps_src',parseInt(f_step),f_id,'input2','options',opt_index);
                 var tmp_arr=mainrformb['steps_src'][parseInt(f_step)][f_id]['input2']['options'];
                                                var tmp_len = tmp_arr.length, tmp_i;
                                                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                                        tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                                if($.isArray(tmp_arr)){
                                                    tmp_arr.splice(0 ,tmp_len);
                                                    mainrformb['steps_src'][parseInt(f_step)][f_id]['input2']['options']=tmp_arr;
                                                }
                 //preview field
                 /*var prev_el_sel=$('#'+f_id).find('.uifm-input2-wrap ').find("[data-inp2-opt-index='" + opt_index + "']");
                 prev_el_sel.remove();*/
                 switch(parseInt(f_type)){
                    case 8:
                        /*radio button*/
                        $('#'+f_id).data('uiform_radiobtn').input2settings_preview_genAllOptions();
                        break;
                    case 9: 
                        /*checkbox*/
                        //prev_el_sel.find('.uifm-inp2-label').html(opt_value);
                        $('#'+f_id).data('uiform_checkbox').input2settings_preview_genAllOptions();
                        break;
                    case 10:
                        /*select*/
                        //prev_el_sel.html(opt_value);
                        
                        $('#'+f_id).data('uiform_select').input2settings_preview_genAllOptions();
                        
                        break;
                    case 11:
                        /*multiselect*/
                        //prev_el_sel.html(opt_value);
                        $('#'+f_id).data('uiform_multiselect').input2settings_preview_genAllOptions();
                        break; 
                    }
                 
                 
             };
             
             
             arguments.callee.input2settings_preview_genAllOptions=function (obj,section,option){
                 //delete this function
                  
             };
             arguments.callee.input17settings_preview_setOption=function (obj,index,opt,index2,opt2,value){
                 switch(String(opt)){
                     case 'label':
                         obj.attr('title',value);
                         obj.attr('data-opt-label',value);
                         break;
                     case 'price':
                         obj.attr('data-opt-price',value);
                         break;
                     case 'checked':
                         obj.attr('data-opt-checked',value);
                         break;
                     case 'qty_st':
                         obj.attr('data-opt-qtyst',value);
                         break;
                     case 'qty_max':
                         obj.attr('data-opt-qtymax',value);
                         break;    
                     case 'img_list':
                         switch(String(opt2)){
                             case 'title':
                                 obj.attr('title',value);
                                 break;
                             case 'img_full':
                                 if(value){
                                    obj.attr('href',value);
                                 }else{
                                    obj.attr('href',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png');     
                                 }
                                 break;
                             case 'img_th_150x150':
                                 if(value){
                                    obj.find('img').attr('src',value);
                                 }else{
                                    obj.find('img').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png'); 
                                 }
                                 
                                 break;     
                         }
                         break;
                     case 'img_list_2':
                         switch(String(opt2)){
                             case 'img_full':
                                 if(value){
                                    obj.attr('href',value);
                                    obj.find('img').attr('src',value);
                                 }else{
                                    obj.attr('href',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png'); 
                                    obj.find('img').attr('src',uiform_vars.url_assets+'/common/imgs/uifm-question-mark.png'); 
                                 }
                                 break;    
                         }
                         break;    
                 }
             };
             
             arguments.callee.input18settings_preview_genAllOptions=function (obj,section){
                
                 var f_id=obj.attr('id');
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                
                var text_html_st=this.getUiData6('steps_src',f_step,f_id,'input18','text','show_st'),
                    text_html=this.getUiData6('steps_src',f_step,f_id,'input18','text','html_cont'),
                    text_html_pos=this.getUiData6('steps_src',f_step,f_id,'input18','text','html_pos'),
                    
                    marg_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_margin','show_st'),
                    marg_pos_top=this.getUiData6('steps_src',f_step,f_id,'input18','pane_margin','pos_top')||0,
                    marg_pos_right=this.getUiData6('steps_src',f_step,f_id,'input18','pane_margin','pos_right')||0,
                    marg_pos_bottom=this.getUiData6('steps_src',f_step,f_id,'input18','pane_margin','pos_bottom')||0,
                    marg_pos_left=this.getUiData6('steps_src',f_step,f_id,'input18','pane_margin','pos_left')||0,
                    
                    pad_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_padding','show_st'),
                    pad_pos_top=this.getUiData6('steps_src',f_step,f_id,'input18','pane_padding','pos_top')||0,
                    pad_pos_right=this.getUiData6('steps_src',f_step,f_id,'input18','pane_padding','pos_right')||0,
                    pad_pos_bottom=this.getUiData6('steps_src',f_step,f_id,'input18','pane_padding','pos_bottom')||0,
                    pad_pos_left=this.getUiData6('steps_src',f_step,f_id,'input18','pane_padding','pos_left')||0,
                    
                    bg_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','show_st'),
                    bg_type=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','type'),
                    bg_start_color=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','start_color'),
                    bg_end_color=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','end_color'),
                    bg_solid_color=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','solid_color'),
                    bg_image=this.getUiData6('steps_src',f_step,f_id,'input18','pane_background','image'),
                    
                    brad_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border_radius','show_st'),
                    brad_size=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border_radius','size'),
                    
                    border_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border','show_st'),
                    border_color=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border','color'),
                    border_style=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border','style'),
                    border_width=this.getUiData6('steps_src',f_step,f_id,'input18','pane_border','width'),
                    
                    shadow_show_st=this.getUiData6('steps_src',f_step,f_id,'input18','pane_shadow','show_st'),
                    shadow_color=this.getUiData6('steps_src',f_step,f_id,'input18','pane_shadow','color'),
                    shadow_h_shadow=this.getUiData6('steps_src',f_step,f_id,'input18','pane_shadow','h_shadow'),
                    shadow_v_shadow=this.getUiData6('steps_src',f_step,f_id,'input18','pane_shadow','v_shadow'),
                    shadow_blur=this.getUiData6('steps_src',f_step,f_id,'input18','pane_shadow','blur');
                    
                    
                    if(parseInt(text_html_st)===1){
                        obj.find('.uifm-inp31-txthtml-content').first().parent().show();
                        obj.find('.uifm-inp31-txthtml-content').first().html(decodeURIComponent(text_html));
                    }else{
                        obj.find('.uifm-inp31-txthtml-content').first().parent().hide();
                    }
                    
                    if(parseInt(marg_show_st)===1){
                        obj.find('.uifm-input31-container').first().css('margin',marg_pos_top+'px '+marg_pos_right+'px '+marg_pos_bottom+'px '+marg_pos_left+'px');
                    }else{
                        obj.find('.uifm-input31-container').first().removeCss('margin'); 
                    }
                    if(parseInt(pad_show_st)===1){
                        obj.find('.uifm-input31-container').first().css('padding',pad_pos_top+'px '+pad_pos_right+'px '+pad_pos_bottom+'px '+pad_pos_left+'px');
                    }else{
                        obj.find('.uifm-input31-container').first().removeCss('padding'); 
                    }
                    
                    var col_block=obj.find('.uifm-inp31-txthtml-content').first().parent();
                    var col_input=obj.find('.uifm-input31-main-wrap').first().parent();
                    var col_block_pos=parseInt(col_block.index());
                    
                    switch (parseInt(text_html_pos)) {
                        case 1:
                            //top
                            if(col_block_pos===1){
                                //return original pos
                                $(col_block).insertBefore(col_input);
                            }
                            obj.find('.uifm-inp31-txthtml-content').first().parent().attr('class', 'rkfm-inp18-col-sm-12');
                            obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-12');
                            break;
                        case 2:
                            //right
                            if(col_block_pos===0){
                                $(col_input).insertBefore(col_block);
                            }
                            
                            if(parseInt(text_html_st)===1){
                                 /*when text is shown*/
                                 obj.find('.uifm-inp31-txthtml-content').first().parent().attr('class', 'rkfm-inp18-col-sm-5');
                                obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-7');
                            }else{
                                obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-12');
                            }

                            

                            break;
                        case 3:
                            //bottom
                            if(col_block_pos===0){
                                $(col_input).insertBefore(col_block);
                            }
                            obj.find('.uifm-inp31-txthtml-content').first().parent().attr('class', 'rkfm-inp18-col-sm-12');
                            obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-12');
                            break;
                        case 0:
                        default:
                            //left
                            if(col_block_pos===1){
                                //return original pos
                                $(col_block).insertBefore(col_input);
                            }
                            
                             /*when text is shown*/
                            if(parseInt(text_html_st)===1){
                                obj.find('.uifm-inp31-txthtml-content').first().parent().attr('class', 'rkfm-inp18-col-sm-5');
                                obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-7'); 
                            }else{
                                obj.find('.uifm-inp31-txthtml-content').first().parent().siblings().attr('class', 'rkfm-inp18-col-sm-12');  
                            }
                            
                            
                            break;    
                    }
                    
                    
                    if(parseInt(bg_show_st)===1){
                        switch (parseInt(bg_type)) {
                             case 2:
                                 //gradient 
                                 obj.find('.uifm-input31-container').first().css({
                                         'background': bg_start_color, 
                                         'background-image': "-webkit-linear-gradient(top, "+bg_start_color+", "+bg_end_color+")", 
                                         'background-image': "-moz-linear-gradient(top, "+bg_start_color+", "+bg_end_color+")",
                                         'background-image': "-ms-linear-gradient(top, "+bg_start_color+", "+bg_end_color+")",
                                         'background-image': "-o-linear-gradient(top, "+bg_start_color+", "+bg_end_color+")",
                                         'background-image': "linear-gradient(to bottom, "+bg_start_color+","+bg_end_color+")"
                                     });
                                      
                                 break; 
                             case 1:
                             default:
                                 //solid
                                 if(bg_solid_color){
                                     obj.find('.uifm-input31-container').first().css('background',bg_solid_color);
                                 }
                                 

                             break;
                         }
                       
                       if(bg_image){
                            obj.find('.uifm-input31-container').first().removeCss('background-image');
                            obj.find('.uifm-input31-container').first().css({
                                             'background-image': "url('"+bg_image+"')", 
                                             'background-repeat': "repeat"
                                         });
                                         
                         }  

                     }else{
                        obj.find('.uifm-input31-container').first().removeCss('background'); 
                        obj.find('.uifm-input31-container').first().removeCss('background-image');
                         
                     }
                    /*border radius*/
                    if(parseInt(brad_show_st)===1){
                                obj.find('.uifm-input31-container').first().css('border-radius',brad_size+'px');
                            }else{
                                obj.find('.uifm-input31-container').first().removeCss('border-radius'); 
                            }
                    /*border*/
                    var border_sty;
                    if(parseInt(border_show_st)===1){
                                if(parseInt(border_style)===1){
                                border_sty='solid ';
                                }else{
                                border_sty='dotted ';    
                                }
                                border_sty+=border_color+' '+border_width+'px';
                                obj.find('.uifm-input31-container').first().css('border',border_sty);

                            }else{
                                obj.find('.uifm-input31-container').first().removeCss('border'); 
                            }

                    /*shadow*/
                    var style;
                    if(parseInt(shadow_show_st)===1){
                                  style=shadow_h_shadow+'px '+shadow_v_shadow+'px '+shadow_blur+'px '+shadow_color;
                                 obj.find('.uifm-input31-container').first().css('box-shadow',style);
                              }else{
                                 obj.find('.uifm-input31-container').first().removeCss('box-shadow');
                              }
                    
                
             };
             
             arguments.callee.input17settings_preview_genAllOptions=function (obj,section){
                
                var f_id=obj.attr('id');
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                var values=this.getUiData5('steps_src',f_step,f_id,section,'options');
                var thopt_mode= this.getUiData5('steps_src',f_step,f_id,section,'thopt_mode')||1;
                var f_thopt_height=this.getUiData5('steps_src',f_step,f_id,section,'thopt_height');
                var f_thopt_width=this.getUiData5('steps_src',f_step,f_id,section,'thopt_width');
                var f_thopt_zoom=this.getUiData5('steps_src',f_step,f_id,section,'thopt_zoom')||0;
                var f_thopt_usethmb=this.getUiData5('steps_src',f_step,f_id,section,'thopt_usethmb')||0;
                var f_thopt_showhvrtxt=this.getUiData5('steps_src',f_step,f_id,section,'thopt_showhvrtxt')||0;
                var f_thopt_showcheckb=this.getUiData5('steps_src',f_step,f_id,section,'thopt_showcheckb')||0;
                
                var newoptprev,newoptprev2;
                
                switch(parseInt(f_type)){
                    case 41:
                        /*dyn checkbox*/
                        
                        obj.find('.uifm-dcheckbox-group').html('');
                        obj.find('.uifm-dcheckbox-group').attr('data-thopt-height',f_thopt_height);
                        obj.find('.uifm-dcheckbox-group').attr('data-thopt-width',f_thopt_width);
                        obj.find('.uifm-dcheckbox-group').attr('data-opt-laymode',thopt_mode);
                        obj.find('.uifm-dcheckbox-group').attr('data-thopt-zoom',f_thopt_zoom);
                        obj.find('.uifm-dcheckbox-group').attr('data-thopt-showhvrtxt',f_thopt_showhvrtxt);
                        obj.find('.uifm-dcheckbox-group').attr('data-thopt-showcheckb',f_thopt_showcheckb);
                        
                         $.each(values, function(index, value) {
                                    newoptprev=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item').clone();
                                    newoptprev.attr('data-inp17-opt-index',index);
                                    obj.find('.uifm-dcheckbox-group').append(newoptprev);
                                    
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'label',null,null,value['label']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'checked',null,null,value['checked']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'price',null,null,value['price']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'qty_st',null,null,value['qty_st']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'qty_max',null,null,value['qty_max']);
                                    
                                    newoptprev.find('.uifm-dcheckbox-label').hide();
                                    newoptprev.find('.uifm-dcheckbox-label').html(value['label']);
                                    newoptprev.find('.uifm-dcheckbox-label').css('width',f_thopt_width);
                                    
                                    switch(parseInt(f_thopt_showhvrtxt)){
                                        case 3:
                                            newoptprev.find('.uifm-dcheckbox-label-up').show();
                                            break;
                                        case 2:
                                            newoptprev.find('.uifm-dcheckbox-label-below').show();
                                            break;    
                                    }
                                    
                                    switch(parseInt(thopt_mode)){
                                        case 2:
                                            if(value['img_list_2']){
                                                $.each(value['img_list_2'], function(index2, value2) {
                                                    newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                                    newoptprev2.attr('data-inp17-opt2-index',index2);
                                                    newoptprev.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list_2',index2,'img_full',value2['img_full']);

                                                });
                                            }
                                            break;
                                        case 1:
                                        default:
                                          if(value['img_list']){
                                                $.each(value['img_list'], function(index2, value2) {
                                                    newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                                    newoptprev2.attr('data-inp17-opt2-index',index2);
                                                    newoptprev.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'title',value2['title']);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_full',value2['img_full']);
                                                    if(parseInt(f_thopt_usethmb)===1){
                                                        rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_th_150x150',value2['img_th_150x150']);
                                                    }else{
                                                        rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_th_150x150',value2['img_full']);
                                                    }

                                                });
                                            }  
                                    }
                                  
                                    
                                });
                                
                          obj.find('.uifm-dcheckbox-item').uiformDCheckbox();
                        break;
                     case 42:
                        /*dyn radiobtn*/
                        obj.find('.uifm-dradiobtn-group').html('');
                        obj.find('.uifm-dradiobtn-group').attr('data-thopt-height',f_thopt_height);
                        obj.find('.uifm-dradiobtn-group').attr('data-thopt-width',f_thopt_width);
                        obj.find('.uifm-dradiobtn-group').attr('data-opt-laymode',thopt_mode);
                        obj.find('.uifm-dradiobtn-group').attr('data-thopt-zoom',f_thopt_zoom);
                        obj.find('.uifm-dradiobtn-group').attr('data-thopt-showhvrtxt',f_thopt_showhvrtxt);
                        obj.find('.uifm-dradiobtn-group').attr('data-thopt-showcheckb',f_thopt_showcheckb);
                        
                         $.each(values, function(index, value) {
                                    newoptprev=$('#uifm_frm_inp17_templates').find('.uifm-dradiobtn-item').clone();
                                    newoptprev.attr('data-inp17-opt-index',index);
                                    obj.find('.uifm-dradiobtn-group').append(newoptprev);
                                    
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'label',null,null,value['label']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'checked',null,null,value['checked']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'price',null,null,value['price']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'qty_st',null,null,value['qty_st']);
                                    rocketform.input17settings_preview_setOption(newoptprev,index,'qty_max',null,null,value['qty_max']);
                                    
                                    newoptprev.find('.uifm-dcheckbox-label').hide();
                                    newoptprev.find('.uifm-dcheckbox-label').html(value['label']);
                                    newoptprev.find('.uifm-dcheckbox-label').css('width',f_thopt_width);
                                    
                                    switch(parseInt(f_thopt_showhvrtxt)){
                                        case 3:
                                            newoptprev.find('.uifm-dcheckbox-label-up').show();
                                            break;
                                        case 2:
                                            newoptprev.find('.uifm-dcheckbox-label-below').show();
                                            break;    
                                    }
                                    
                                    switch(parseInt(thopt_mode)){
                                        case 2:
                                            if(value['img_list_2']){
                                                $.each(value['img_list_2'], function(index2, value2) {
                                                    newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                                    newoptprev2.attr('data-inp17-opt2-index',index2);
                                                    newoptprev.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list_2',index2,'img_full',value2['img_full']);

                                                });
                                            }
                                            break;
                                        case 1:
                                        default:
                                           if(value['img_list']){
                                                $.each(value['img_list'], function(index2, value2) {
                                                    newoptprev2=$('#uifm_frm_inp17_templates').find('.uifm-dcheckbox-item-imgsrc').clone();
                                                    newoptprev2.attr('data-inp17-opt2-index',index2);
                                                    newoptprev.find('.uifm-dcheckbox-item-gal-imgs').append(newoptprev2);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'title',value2['title']);
                                                    rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_full',value2['img_full']);
                                                    if(parseInt(f_thopt_usethmb)===1){ 
                                                        rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_th_150x150',value2['img_th_150x150']);
                                                    }else{
                                                        rocketform.input17settings_preview_setOption(newoptprev2,index,'img_list',index2,'img_th_150x150',value2['img_full']);
                                                    }


                                                });
                                            }  
                                    }
                                    
                                });
                          obj.find('.uifm-dradiobtn-item').uiformDCheckbox();
                        break;   
                }  
                
                //hide zoom

                if(parseInt(f_thopt_zoom)===0){
                    obj.find('.uifm-dcheckbox-item-showgallery').hide();
                }
                
             };
             
             arguments.callee.inputsettings_addingPrepAppe=function (element){
                 var el=$(element);
                  var option=el.data('option');
                 var sourcetxt=el.data('source-txt');
                 var mainpos=el.data('pos');
                 var newdata;
                 var f_val;
                 switch(parseInt(mainpos)){
                     case 1:
                          switch(parseInt(option)){
                              case 1:
                                  newdata=$('#'+sourcetxt).val();
                                  $('#uifm_fld_input_prep_preview').append(newdata);
                                  break;
                              case 2:
                              case 3:
                                  newdata=$('#'+sourcetxt).find('i').first().clone();
                                  $('#uifm_fld_input_prep_preview').append(newdata);
                                  break;
                              case 4:
                                  $('#uifm_fld_input_prep_preview').html('');
                                  break;
                          }
                         f_val=($('#uifm_fld_input_prep_preview').html())?encodeURIComponent($('#uifm_fld_input_prep_preview').html()):'';
                         
                         break;
                     case 2:
                         switch(parseInt(option)){
                              case 1:
                                  newdata=$('#'+sourcetxt).val();
                                  $('#uifm_fld_input_appe_preview').append(newdata);
                                  break;
                              case 2:
                              case 3:
                                  newdata=$('#'+sourcetxt).find('i').first().clone();
                                  $('#uifm_fld_input_appe_preview').append(newdata);
                                  break;
                              case 4:
                                  $('#uifm_fld_input_appe_preview').html('');
                                  break;
                          }
                          f_val=($('#uifm_fld_input_appe_preview').html())?encodeURIComponent($('#uifm_fld_input_appe_preview').html()):'';
                        break;
                 }
                 
                 
                 var f_id= $('#uifm-field-selected-id').val();
                var store=el.data('field-store');
                
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                var obj_field= $('#'+f_id);
                if(obj_field){
                rocketform.setDataOptToPrevField(obj_field,store,f_val);
                }
               
             };
             
             arguments.callee.previewfield_prepappTxtOnInput=function (obj,option){
                 var f_id= obj.attr('id');
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var cus_data,class_find,inp_opt;
                 
                 switch(option){
                     case 'prepe_txt':
                         inp_opt='prepe_txt';
                         class_find='.uifm-inp-preptxt';
                        break;
                     case 'append_txt':
                         inp_opt='append_txt';
                         class_find='.uifm-inp-apptxt';
                        break;
                 }
                 cus_data=decodeURIComponent(rocketform.getUiData5('steps_src',parseInt(f_step),f_id,'input',inp_opt));
                 obj.find(class_find).html(cus_data);
                 
             };
             
            
             arguments.callee.input5settings_loadRecaptcha = function(id,key_public,theme) {
                try{ 
                    if(key_public){
                        grecaptcha.render(id, {
                        'sitekey' : key_public,
                        'theme' : theme
                        });
                    }  
                }
                catch (ex) {
                console.error("input5settings_loadRecaptcha error : ", ex.message);
                }

            };
             arguments.callee.input6settings_refreshCaptcha = function (element) {
           var el=$(element);
           
           var obj_field=el.closest('.uiform-field');
           
           var f_id= obj_field.attr('id');
                            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            var txt_color_st=this.getUiData5('steps_src',f_step,f_id,'input6','txt_color_st');
                            var txt_color=this.getUiData5('steps_src',f_step,f_id,'input6','txt_color');
                            var background_st=this.getUiData5('steps_src',f_step,f_id,'input6','background_st');
                            var background_color=this.getUiData5('steps_src',f_step,f_id,'input6','background_color');
                            var distortion=this.getUiData5('steps_src',f_step,f_id,'input6','distortion');
                            var behind_lines_st=this.getUiData5('steps_src',f_step,f_id,'input6','behind_lines_st');
                            var behind_lines=this.getUiData5('steps_src',f_step,f_id,'input6','behind_lines');
                            var front_lines_st=this.getUiData5('steps_src',f_step,f_id,'input6','front_lines_st');
                            var front_lines=this.getUiData5('steps_src',f_step,f_id,'input6','front_lines');
                            
             var el_url=obj_field.find('.uifm-inp6-wrap-refrescaptcha a').data('rkurl');
                                
                                $.ajax({
                                                type: 'POST',
                                                url: rockfm_vars.uifm_siteurl+"formbuilder/fields/ajax_refresh_captcha",
                                                dataType: "json",
                                                data: {
                                                'action': 'rocket_backend_refreshcaptcha',
                                                'txt_color_st':txt_color_st,
                                                'txt_color':txt_color,
                                                'background_st':background_st,
                                                'background_color':background_color,
                                                'distortion':distortion,
                                                'behind_lines_st':behind_lines_st,
                                                'behind_lines':behind_lines,
                                                'front_lines_st':front_lines_st,
                                                'front_lines':front_lines,
                                                'zgfm_security':uiform_vars.ajax_nonce,
                                                'page':'zgfm_form_builder',
                                                'csrf_field_name':uiform_vars.csrf_field_name
                                                    },
                                                success: function(response) {
                                                obj_field.find('.uifm-inp6-captcha-img').attr('src',el_url+response.rkver);
                                                   obj_field.find('.uifm-inp6-wrap-refrescaptcha a').attr('data-rkver',response.rkver);
                                                    
                                                }
                                            });
             
      };
      arguments.callee.input11settings_updateField=function (obj,section,option){
          
          try{ 
                var f_id=obj.attr('id');
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                var f_inp;
                var f_div_color=this.getUiData5('steps_src',f_step,f_id,section,'div_color')||'';
                var f_div_col_st=this.getUiData5('steps_src',f_step,f_id,section,'div_col_st');
                var f_text_color=this.getUiData5('steps_src',f_step,f_id,section,'text_color');
                var f_text_val=this.getUiData5('steps_src',f_step,f_id,section,'text_val');
                
                 var border_focus_str;
        
                
                if(f_div_color.length && parseInt(f_div_col_st)===1){
                            if($('#'+f_id)){
                            $('#'+f_id+'_prev_fld_divider').remove();
                            border_focus_str='<style type="text/css" id="'+f_id+'_prev_fld_divider">';
                            border_focus_str+='#'+f_id+' .uiform-divider-text::before {';
                            border_focus_str+='background:'+f_div_color+'!important;';
                            border_focus_str+='} ';
                            border_focus_str+='#'+f_id+' .uiform-divider-text::after {';
                            border_focus_str+='background:'+f_div_color+'!important;';
                            border_focus_str+='} ';
                            border_focus_str+='</style>';
                                $('head').append(border_focus_str);
                        }
                }else{
                    $('#'+f_id+'_prev_fld_divider').remove();
                }
               
                
                obj.find('.uiform-divider-text').css('color',f_text_color);
                
                if(parseInt(f_text_val.length)!=0){
                obj.find('.uiform-divider-text').show().html(f_text_val);
                }else{
                obj.find('.uiform-divider-text').hide();
                }

                /*update divider bg text*/
                rocketform.previewform_elementBackground($('.uiform-main-form'),false);
            }
            catch (ex) {
            console.error("input11settings_updateField error : ", ex.message);
            }
         
      };
      arguments.callee.input9settings_updateField=function (obj,section){
          var f_type=obj.data('typefield');
          var f_id=obj.attr('id');
          var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
          var f_inp;
          var f_txt1=this.getUiData5('steps_src',f_step,f_id,section,'txt_star1');
          var f_txt2=this.getUiData5('steps_src',f_step,f_id,section,'txt_star2');
          var f_txt3=this.getUiData5('steps_src',f_step,f_id,section,'txt_star3');
          var f_txt4=this.getUiData5('steps_src',f_step,f_id,section,'txt_star4');
          var f_txt5=this.getUiData5('steps_src',f_step,f_id,section,'txt_star5');
          var f_txtnorate=this.getUiData5('steps_src',f_step,f_id,section,'txt_norate');
          
          
          f_inp=obj.find('.uifm-input-ratingstar');
          if(!f_inp.data('rating')){
            $(f_inp).rating({
            starCaptions: {1: f_txt1, 2: f_txt2, 3: f_txt3, 4: f_txt4, 5: f_txt5},
            clearCaption: f_txtnorate,
            starCaptionClasses: {1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"}
            });   
           }else{
              $(f_inp).rating('refresh', {starCaptions: {1: f_txt1, 2: f_txt2, 3: f_txt3, 4: f_txt4, 5: f_txt5},clearCaption: f_txtnorate});
           }
          
          
      };
      arguments.callee.input7settings_updateField=function (obj,section,option){
          var f_type=obj.data('typefield');
          var f_id=obj.attr('id');
          var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
          var f_inp;
          
          var f_language=this.getUiData5('steps_src',f_step,f_id,section,'language');
          var f_format=this.getUiData5('steps_src',f_step,f_id,section,'format');
          switch(parseInt(f_type)){
              case 24:
                  /*date picker*/
                  f_inp=obj.find('.uifm-input7-datepic');
                  if(!f_inp.data('DateTimePicker')){
                        f_inp.datetimepicker({
                                format: 'L'
                        });
                  }
                      
                  if(f_language){
                   f_inp.data('DateTimePicker').locale(f_language);   
                  }
                  
                  if(f_format){
                  f_inp.data('DateTimePicker').dayViewHeaderFormat(f_format);
                  f_inp.data('DateTimePicker').format(f_format);
                  }
                 
                  break;
              case 25:
                  /*time picker*/
                  f_inp=obj.find('.uifm-input7-timepic');
                  if(!f_inp.data('DateTimePicker')){
                    f_inp.datetimepicker({
                        format: 'LT'
                    });
                  }
                  break;
              case 26:
                  /* date time*/
                  f_inp=obj.find('.uifm-input7-datetimepic');
                  if(!f_inp.data('DateTimePicker')){
                    f_inp.datetimepicker();
                  }
                  if(f_language){
                   f_inp.data('DateTimePicker').locale(f_language);
                  }else{
                   f_inp.data('DateTimePicker').locale('en');   
                  }
                  if(f_format){
                  f_inp.data('DateTimePicker').dayViewHeaderFormat(f_format);    
                  }
                  break;
          }
      };
      
             arguments.callee.input6settings_checkCaptcha=function (obj,section,option){
                  
                        if(parseInt($('.uiform-main-form').find('.uiform-captcha').length)!=0){
                            
                            var rockfm_rcha_d=$('.uiform-main-form').find('.uifm-inp6-captcha');
                            if(parseInt(rockfm_rcha_d.length)>1){

                                rockfm_rcha_d.each(function (i) {
                                    if(parseInt(i)!=0){
                                        $(this).removeClass('uifm-inp6-captcha').html('Captcha is loaded once. Remove this field');
                                    }
                                });
                            }



                            var f_id= obj.attr('id');
                            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            var txt_color_st=this.getUiData5('steps_src',f_step,f_id,section,'txt_color_st');
                            var txt_color=this.getUiData5('steps_src',f_step,f_id,section,'txt_color');
                            var background_st=this.getUiData5('steps_src',f_step,f_id,section,'background_st');
                            var background_color=this.getUiData5('steps_src',f_step,f_id,section,'background_color');
                            var distortion=this.getUiData5('steps_src',f_step,f_id,section,'distortion');
                            var behind_lines_st=this.getUiData5('steps_src',f_step,f_id,section,'behind_lines_st');
                            var behind_lines=this.getUiData5('steps_src',f_step,f_id,section,'behind_lines');
                            var front_lines_st=this.getUiData5('steps_src',f_step,f_id,section,'front_lines_st');
                            var front_lines=this.getUiData5('steps_src',f_step,f_id,section,'front_lines');
                            
                            var f_values=this.getUiData4('steps_src',f_step,f_id,section);
                            
                             var valhash = CryptoJS.MD5(JSON.stringify(f_values));
                 
                            var f_checkhash=$('#'+f_id).find('.uifm-inp6-captcha-inputcode').attr('data-check-hash');

                            if(String(f_checkhash)===String(valhash)){
                            }else{
                                $('#'+f_id).find('.uifm-inp6-captcha-inputcode').attr('data-check-hash',valhash);
                                
                                //var el_data=obj.find('.uifm-inp6-wrap-refrescaptcha a').data('rkver');
                                var el_url=obj.find('.uifm-inp6-wrap-refrescaptcha a').data('rkurl');
                                
                                $.ajax({
                                                type: 'POST',
                                                url: rockfm_vars.uifm_siteurl+"formbuilder/fields/ajax_refresh_captcha",
                                                dataType: "json",
                                                data: {
                                                'action': 'rocket_backend_refreshcaptcha',
                                                'txt_color_st':txt_color_st,
                                                'txt_color':txt_color,
                                                'background_st':background_st,
                                                'background_color':background_color,
                                                'distortion':distortion,
                                                'behind_lines_st':behind_lines_st,
                                                'behind_lines':behind_lines,
                                                'front_lines_st':front_lines_st,
                                                'front_lines':front_lines,
                                                'page':'zgfm_form_builder',
                                                'csrf_field_name':uiform_vars.csrf_field_name
                                                    },
                                                success: function(response) {
                                                obj.find('.uifm-inp6-captcha-img').attr('src',el_url+response.rkver);
                                                    obj.find('.uifm-inp6-wrap-refrescaptcha a').attr('data-rkver',response.rkver);
                                                    
                                                }
                                            });
                                
                            }
                            
                        }
                    
                 
             };
             
             arguments.callee.input5settings_checkRecaptcha=function (obj,section,option){
                  
                   // if (typeof grecaptcha != "undefined") {
                        if(parseInt($('.uiform-main-form').find('.uifm-input-recaptcha').length)>0){
                            var uifm_rec_el;
                            var rockfm_rcha_d=$('.uiform-main-form').find('.uifm-input-recaptcha');
                            if(parseInt(rockfm_rcha_d.length)>1){

                                rockfm_rcha_d.each(function (i) {
                                    if(parseInt(i)!=0){
                                        $(this).removeClass('g-recaptcha').html('ReCaptcha is loaded once. Remove this field');
                                    }else{
                                        uifm_rec_el=$(this);

                                    }
                                });
                            }else{
                                uifm_rec_el=rockfm_rcha_d; 
                            }



                           var f_id= obj.attr('id');
                            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            var f_key_public=this.getUiData5('steps_src',f_step,f_id,'input5','g_key_public');
                            var f_theme=this.getUiData5('steps_src',f_step,f_id,section,'g_theme');
                             
                            
                            
                            
                           // switch(String(option)) {
                                //case 'g_key_public':
                                //case 'g_theme':
                                $('#uifmobj-'+f_id).html('');
                                
                                //adding preview recaptcha
                                    var f_theme_name;
                                    switch(parseInt(f_theme)){
                                        case 1:
                                        f_theme_name='dark';
                                        $('#uifmobj-'+f_id).html('<img src="'+uiform_vars.url_assets+'/backend/img/uifm_field_recaptcha_prev_black_img.png" />');
                                          break;
                                        default:
                                        $('#uifmobj-'+f_id).html('<img src="'+uiform_vars.url_assets+'/backend/img/uifm_field_recaptcha_prev_white_img.png" />');    
                                        f_theme_name='light';    
                                           break
                                    }
                                
                                   // break;
                            //}

                        }
                   // }else{
                        
                   // }
                 
             };
             
             arguments.callee.clogic_getListField=function (logic_row){
                 var field=$('#uiform-set-clogic-tmpl .uifm_clogic_fieldsel').clone();
                 var var_fields=this.getUiData('steps_src');
                 var val_selected=$('#uifm-field-selected-id').val();
                 var arr_types_allowed=[8,9,10,11,16,18,40,41,42];
                 var string_res='';
                 $.each(var_fields, function(index, value) {
                    $.each(value, function(index2, value2) {
                        if( (String(val_selected)!=String(value2.id))
                            && $.inArray(parseInt(value2.type),arr_types_allowed)>=0
                            ){
                            string_res+='<option data-type="'+value2.type+'" value="'+value2.id+'">'+value2.field_name+'</option>';
                        }
                       
                    });
                });
                 field.append(string_res);
                 logic_row.find('.uifm_clogic_field').append(field);
                logic_row.find('.uifm_clogic_fieldsel').chosen({width: "100%"});
                
             };
             
             arguments.callee.search_fieldById=function (field_id){
                 var var_fields=this.getUiData('steps_src');
                 for( var i in var_fields ) {
                     for( var i2 in var_fields[i] ) {
                        if(String(var_fields[i][i2].id)===String(field_id)){
                            return var_fields[i][i2];
                        }
                   }
                } 
                return false;
             }
             arguments.callee.viewchart_load=function (){
                  var idform=$('#uifm-record-form-cmb').val();
                rocketform.showLoader(1,true,true);
                        $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/records/ajax_load_viewchart",
                            data: {
                            'action': 'rocket_fbuilder_loadchart_byform',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'form_id':parseInt(idform),
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                                $('#uiform-viewchart-result').html('');
                                rocketform.viewchart_generate(msg.data);
                                rocketform.hideLoader();
                            }
                        });
                 
                 
             }
             
             arguments.callee.viewchart_generate=function (response){
                  
                 try{
                     Morris.Area({
                        // ID of the element in which to draw the chart.
                        element: 'uiform-viewchart-result',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: response,
                        // The name of the data record attribute that contains x-visitss.
                        xkey: 'days',
                        // A list of names of data record attributes that contain y-visitss.
                        ykeys: ['requests'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['requests'],
                        // Disables line smoothing
                        smooth: false
                        });
 
                    }
                catch(err) {
                    console.log('error viewchart_refresh: '+err.message);
                } 
             };
             arguments.callee.clogic_getTypeMatch=function (logic_row,type){
                 logic_row.find('.uifm_clogic_mtype').html('');
                 logic_row.find('.uifm_clogic_mtype').attr('data-loaded','0');
                 //add a loader just to know whether is refreshed
                 logic_row.find('.uifm_clogic_mtype').append('<i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin sfdc-spin1"></i>');
                
                     //remove loader
                     logic_row.find('.uifm_clogic_mtype').find('.sfdc-gly-spin').fadeOut( "slow" ).remove();
                     
                     var str;
                        switch(parseInt(type)){
                            case 8:
                            case 9:
                            case 10:
                            case 11:
                            case 40:
                            case 41:
                            case 42:
                             str=$('#uiform-set-clogic-tmpl .uifm_clogic_mtypeinp_1').clone();
                             break;
                            case 16:
                            case 18:
                            str=$('#uiform-set-clogic-tmpl .uifm_clogic_mtypeinp_2').clone();
                             break;
                        }

                        logic_row.find('.uifm_clogic_mtype').append(str);
                        logic_row.find('.uifm_clogic_mtypeinp').chosen({width: "100%"}); 
                        logic_row.find('.uifm_clogic_mtype').attr('data-loaded','1');
                 
                
             };
             
             arguments.callee.clogic_getMatchInput=function (logic_row,field){
                 logic_row.find('.uifm_clogic_minput').html('');
                 logic_row.find('.uifm_clogic_minput').attr('data-loaded','0');
                  //add a loader just to know whether is refreshed
                 logic_row.find('.uifm_clogic_minput').append('<i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin sfdc-spin1"></i>');
                
                     //remove loader
                     logic_row.find('.uifm_clogic_minput').find('.sfdc-gly-spin').fadeOut( "slow" ).remove();
                     
                        var str;
                        var str_opts;
                        var tmp_opts;
                        switch(parseInt(field.type)){
                            case 8:
                            case 9:
                            case 10:
                            case 11:     
                              str=$('#uiform-set-clogic-tmpl .uifm_clogic_minput_1').clone();  
                              tmp_opts=field.input2['options'];
                             if(tmp_opts){
                                 str_opts='';
                                 $.each(tmp_opts, function(index2, value2) {
                                       str_opts+='<option value="'+index2+'">'+value2.value+'</option>';
                                   });
                                str.append(str_opts);   
                             }
                             logic_row.find('.uifm_clogic_minput').append(str);
                             logic_row.find('.uifm_clogic_minput_1').chosen({width: "100%"});
                             break;
                            
                            case 42:
                            case 41:    
                              str=$('#uiform-set-clogic-tmpl .uifm_clogic_minput_1').clone();  
                              tmp_opts=field.input17['options'];
                             if(tmp_opts){
                                 str_opts='';
                                 $.each(tmp_opts, function(index2, value2) {
                                       str_opts+='<option value="'+index2+'">'+value2.label+'</option>';
                                   });
                                str.append(str_opts);   
                             }
                             logic_row.find('.uifm_clogic_minput').append(str);
                             logic_row.find('.uifm_clogic_minput_1').chosen({width: "100%"});
                             break; 
                              case 40:
                            /*switch*/
                             str=$('#uiform-set-clogic-tmpl .uifm_clogic_minput_1').clone();  
                              
                                 str_opts='';
                                 str_opts+='<option value="0">'+field.input15['txt_no']+'</option>';
                                 str_opts+='<option value="1">'+field.input15['txt_yes']+'</option>';
                                  
                                str.append(str_opts);   
                             
                             logic_row.find('.uifm_clogic_minput').append(str);
                             logic_row.find('.uifm_clogic_minput_1').chosen({width: "100%"});
                            
                                break; 
                            
                            case 16:
                            case 18:
                                str=$('#uiform-set-clogic-tmpl .uifm_clogic_minput_2').clone();  
                                var set_min=field.input4['set_min'],
                                   set_max=field.input4['set_max'],
                                   set_default=field.input4['set_default'],
                                   set_step=field.input4['set_step'];
                                 logic_row.find('.uifm_clogic_minput').append(str);  
                                 logic_row.find('.uifm_clogic_minput_2').TouchSpin({
                                           verticalbuttons: true,
                                           min: parseFloat(set_min),
                                           max: parseFloat(set_max),
                                           stepinterval: parseFloat(set_step),
                                           verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                           verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus',
                                           initval: parseFloat(set_default)
                                       });
                             break;
                        }
                     logic_row.find('.uifm_clogic_minput').attr('data-loaded','1');
                
                 
                  
             };
             arguments.callee.clogic_changeMtype=function (elm){
                 var el=$(elm);
                 var el_row=el.closest('.uifm-conditional-row');
                 var cl_sel_mtype=el_row.find('.uifm_clogic_mtype select').chosen().val();
                 var optnro=el_row.data('row-index');
                 var f_id=$('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optnro),'mtype',cl_sel_mtype);
                 
             };
             arguments.callee.clogic_changeMinput=function (elm){
                 var el=$(elm);
                 var el_row=el.closest('.uifm-conditional-row');
                 var optnro=el_row.data('row-index');
                 var f_id=$('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var cl_sel_id=el_row.find('.uifm_clogic_fieldsel').chosen().val();
                 var type=el_row.find('.uifm_clogic_fieldsel [value="'+cl_sel_id+'"]').data('type');
                  var cl_sel_minput;
                    switch(parseInt(type)){
                     case 8:
                     case 9:
                         /*radio button and checkbox*/
                     case 10:
                     case 11:
                     case 40:
                     case 41:    
                     case 42:
                         
                     cl_sel_minput=el_row.find('.uifm_clogic_minput_1').chosen().val();
                     
                      break;
                     case 16:
                     case 18:
                     cl_sel_minput=el_row.find('.uifm_clogic_minput_2').val();
                      break;
                    }
                 
                 rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optnro),'minput',cl_sel_minput);
             };
             arguments.callee.clogic_deleteConditional=function (elm){
                 var el=$(elm);
                 var f_id= $('#uifm-field-selected-id').val();
                 var opt_index=el.closest('.uifm-conditional-row').data('row-index');
                 
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 
                 //delete from setting tab
                 el.closest('.uifm-conditional-row').remove();
                 //delete main data
                 rocketform.delUiData6('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(opt_index));
                 var tmp_arr=mainrformb['steps_src'][parseInt(f_step)][f_id]['clogic']['list'];
                                                var tmp_len = tmp_arr.length, tmp_i;
                                                for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                                                        tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                                                if($.isArray(tmp_arr)){
                                                    tmp_arr.splice(0 ,tmp_len);
                                                    mainrformb['steps_src'][parseInt(f_step)][f_id]['clogic']['list']=tmp_arr;
                                                }
             };
             
            arguments.callee.clogic_changeField=function (elm){
                 var el=$(elm);
                 var el_row=el.closest('.uifm-conditional-row');
                 var f_id=$('#uifm-field-selected-id').val();
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 var optnro=el_row.data('row-index');
                 var row_field_val=el_row.find('.uifm_clogic_fieldsel').chosen().val();
                
                 
                 var field=this.search_fieldById(row_field_val);
                 /*get match type*/   
                 this.clogic_getTypeMatch(el_row,field.type);
                
                  var uifm_check_timer = setInterval(function(){
                     
                     if(parseInt(el_row.find('.uifm_clogic_mtype').attr('data-loaded'))===1){
                         
                           var cl_sel_mtype=el_row.find('.uifm_clogic_mtype select').chosen().val();   
                  
                          /*get match input*/   
                          rocketform.clogic_getMatchInput(el_row,field);
                          
                          var uifm_check2_timer = setInterval(function(){
                     
                                if(parseInt(el_row.find('.uifm_clogic_minput').attr('data-loaded'))===1){
                                        var cl_sel_minput;
                                            switch(parseInt(field.type)){
                                               case 8:
                                             case 9:
                                             case 10:
                                             case 11:
                                            case 41:
                                            case 42:
                                             cl_sel_minput=el_row.find('.uifm_clogic_minput_1').chosen().val();
                                              break;
                                             case 40:
                                             case 16:
                                             case 18:
                                             cl_sel_minput=el_row.find('.uifm_clogic_minput_2').val();
                                              break;
                                            }

                                       
                                        /*clean empty rows*/
                                         var tmp_list=rocketform.getUiData5('steps_src',parseInt(f_step),f_id,'clogic','list');

                                         if(tmp_list){
                                            $.each(tmp_list, function(index, value) {
                                                       if(String(value)==="" || value===null){
                                                           tmp_list.splice(index,1);
                                                       }
                                                    });
                                         }
                                        
                                        rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optnro),'field_fire',row_field_val);
                                        rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optnro),'mtype',cl_sel_mtype);
                                        rocketform.setUiData7('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optnro),'minput',cl_sel_minput);
                                         
                                    clearInterval(uifm_check2_timer);
                                    uifm_check2_timer=null;
                                }

                            },500); 
                          
                         
                         
                         clearInterval(uifm_check_timer);
                         uifm_check_timer=null;
                     }
                     
                 },500);
                  
                  
                 
             };
             arguments.callee.clogic_addNewConditional=function (){
                 var logic_cont=$('#uifm-conditional-logic-list');
                  
                 var num = $('#uifm-conditional-logic-list .uifm-conditional-row').length;
                 var optindex = parseInt(num);
                var f_id=$('#uifm-field-selected-id').val();
                 var logic_row=$('#uiform-set-clogic-tmpl .uifm-conditional-row').clone();
                     logic_row.attr('data-row-index',optindex);
                     logic_cont.append(logic_row);
                  /*get field*/   
                 rocketform.clogic_getListField(logic_row);
                     
                 var cl_sel_id=logic_row.find('.uifm_clogic_fieldsel').chosen().val();
                 var field=rocketform.search_fieldById(cl_sel_id);
                 
                  /*get match type*/   
                 this.clogic_getTypeMatch(logic_row,field.type);
                 
                 var uifm_check_timer = setInterval(function(){
                     
                     if(parseInt(logic_row.find('.uifm_clogic_mtype').attr('data-loaded'))===1){
                         
                           var cl_sel_mtype=logic_row.find('.uifm_clogic_mtype select').chosen().val();   
                  
                          /*get match input*/   
                          rocketform.clogic_getMatchInput(logic_row,field);
                          
                          var uifm_check2_timer = setInterval(function(){
                     
                                if(parseInt(logic_row.find('.uifm_clogic_minput').attr('data-loaded'))===1){
                                        var cl_sel_minput;
                                            switch(parseInt(field.type)){
                                               case 8:
                                             case 9:
                                             case 10:
                                             case 11:
                                            case 41:
                                            case 42:
                                             cl_sel_minput=logic_row.find('.uifm_clogic_minput_1').chosen().val();
                                              break;
                                             case 40: 
                                             case 16:
                                             case 18:
                                             cl_sel_minput=logic_row.find('.uifm_clogic_minput_2').val();
                                              break;
                                            }

                                        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');

                                        /*clean empty rows*/
                                         var tmp_list=rocketform.getUiData5('steps_src',parseInt(f_step),f_id,'clogic','list');

                                         if(tmp_list){
                                            $.each(tmp_list, function(index, value) {
                                                       if(String(value)==="" || value===null){
                                                           tmp_list.splice(index,1);
                                                       }
                                                    });
                                         }



                                        rocketform.setUiData5('steps_src',parseInt(f_step),f_id,'clogic','list',tmp_list);

                                        //set to main data
                                         rocketform.addIndexUiData5('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optindex));
                                         rocketform.setUiData6('steps_src',parseInt(f_step),f_id,'clogic','list',parseInt(optindex),{field_fire:cl_sel_id,
                                                             mtype:cl_sel_mtype,minput:cl_sel_minput}); 

                                        
                                    clearInterval(uifm_check2_timer);
                                    uifm_check2_timer=null;
                                }

                            },500); 
                          
                         
                         
                         clearInterval(uifm_check_timer);
                         uifm_check_timer=null;
                     }
                     
                 },500);
                 
               
                  
             };
             arguments.callee.fieldQuickOptions_selectField=function (id_field){      
                  var el=$('#'+id_field);
                  var quopts=el.find('.uiform-fields-quick-options');
                  if(quopts.find('.uiform-fields-qopt-select input').is(':checked')){
                     quopts.css('display','block');
                  }else{
                     quopts.removeCss('display');
                  }
                  this.fieldQuickOptions_selectField_showTabs();
             };
             
             arguments.callee.fieldQuickOptions_selectField_showTabs = function (){      
                   /*get enabled checkboxes*/
                   var numChecked=$('.uiform-main-form .uiform-fields-qopt-select input:checked').length;
                   
                   if(parseInt(numChecked)===1){
                      /*equal to one*/
                      rocketform.fieldQuickOptions_selectField_equalToOne();  
                   } else if (parseInt(numChecked)>1) {
                      /*more than one*/ 
                      rocketform.fieldQuickOptions_selectField_MoreThanOne();
                   } else {
                      /*zero*/ 
                      //cleaning setting tab
                     
                     rocketform.closeSettingTab();
                     if($(document).find('.uifm-highlight-edited')){
                        $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
                        }
                   }          
             };
             arguments.callee.fieldQuickOptions_EditField = function (el){
                 
                 var pickfield = $(el).closest('.zgpb-fields-quick-options2').parent();
                   /*disable all checkbox*/
                if(parseInt($('.uiform-main-form .uiform-fields-qopt-select input:checked').length)>0){
                    $('.uiform-main-form .uiform-fields-qopt-select input:checked').prop('checked',false);
                }
                $('.uiform-main-form .uiform-fields-qopt-select input').closest('.uiform-fields-quick-options').removeCss('display');
                
                //remove any tooltip or popover
                rocketform.previewfield_hidePopOver();
                rocketform.previewfield_helpblock_hidetooltip();
                
                 rocketform.fieldQuickOptions_loadFieldSelected(pickfield);
            };
            
            
            /**
            * Show edit settings of the field
            *
            * @since 1
            * @access private
            * @method fieldQuickOptions_EditField
            */ 
           arguments.callee.fields2_fieldQuickOptions_EditField = function (element,ismain) {

               //clean 
               $('#zgpb-editor-container .zgpb-fl-gs-block-style-hover').removeClass('zgpb-fl-gs-block-style-hover');

               var el=$(element),
                       type=el.closest('.zgpb-field-template').attr('data-typefield'),
                       id=el.closest('.zgpb-field-template').attr('id'),
                       addt=[];
               
                 var step_pane;
               var tmp_fld_load=[];
               switch(parseInt(type)){
                   case 1:
                   case 2:
                   case 3:
                   case 4:
                   case 5:
                       if(ismain){
                           addt['block']=0;
                       }else{
                           var block=el.closest('.zgpb-fl-gs-block-style').attr('data-zgpb-blocknum')||0;  
                           addt['block']=block;
                       }
                    
                        step_pane=$('#'+id).closest('.uiform-step-pane').data('uifm-step');
                        
                        rocketform.enableSettingTabOnPick(id,type);
                        
                        
                        tmp_fld_load['id']= id;
                        tmp_fld_load['typefield']= type;
                        tmp_fld_load['step_pane']= step_pane;
                        tmp_fld_load['addt']= addt;
                        tmp_fld_load['oncreation']= false;
                        
                        rocketform.loadFieldSettingTab(tmp_fld_load); 
                        
                       break;
                   default:
                       //other fields
                       el=$(element),
                       type=el.closest('.uiform-field').attr('data-typefield'),
                       id=el.closest('.uiform-field').attr('id'),
                       addt=[];
               
               
                        step_pane=$('#'+id).closest('.uiform-step-pane').data('uifm-step');
                          //show tabs and load data to preview
                        rocketform.enableSettingTabOnPick(id,type);
                        
                        tmp_fld_load['id']= id;
                        tmp_fld_load['typefield']= type;
                        tmp_fld_load['step_pane']= step_pane;
                        tmp_fld_load['addt']= addt;
                        tmp_fld_load['oncreation']= false;
                        
                        rocketform.loadFieldSettingTab(tmp_fld_load); 
                        
                        //add enhance
                        rocketform.setHighlightPicked($('#'+id));
                       break;
               }
              
           }
          
          arguments.callee.fields2_fieldQuickOptions_DuplicateField = function (id){
                
                rocketform.setInnerVariable('fields_load_settings', 2);
                
                //get obj
                var pickfield = $('#'+id);
                //get type of main parent
                var pickfield_type =pickfield.attr('data-typefield');
                
                var f_step=$('.uiform-step-content .uiform-step-pane:visible').data('uifm-step');
                
                var values_tmp
                    ,el_container
                    ,el_id
                     
                    ,el_children_count
                    ,el_children
                    ,children_tmp_a
                    ,children_tmp_ob
                    ,child_id
                    ,check_field;
                     
                 values_tmp= {};
                 //verify is container
                         el_container=(pickfield.data('iscontainer'))?pickfield.data('iscontainer'):0;
                         values_tmp.iscontainer=parseInt(el_container);
                         
                 values_tmp.num_tab=0;
                 values_tmp.type=pickfield_type;
                 
                 values_tmp.id=id;
                 
                
                 
                 if(el_container===1){
                     
                     rocketform.setInnerVariable('fields_flag_stored',[]);
                     
                           //values_tmp.children={};
                 
                            /*children count*/
                            el_children_count=pickfield.find('.zgpb-field-template').length;
                            values_tmp.count_children=parseInt(el_children_count);
                            /*children elements*/
                           el_children=pickfield.find('.zgpb-field-template')|| null;
                           if(parseInt(el_children_count)>0){
                               children_tmp_a =[];
                               $(el_children).each( function( index2, element2 ){
                                       child_id=($( this ).attr('id'))?$( this ).attr('id'):0;
                                       children_tmp_a.push(child_id);
                                       //children_tmp_ob[child_id]={};
                                   });
                               values_tmp.children_str=children_tmp_a.join(',');

                           }   
                            
                            
                            
                           //values_tmp.children_arr=children_tmp_ob;
                            values_tmp.inner=rocketform.getLayoutFormByStep_checkChildren(id,el_children,pickfield_type,pickfield,f_step);
                            
                            rocketform.setInnerVariable('fields_duplication_stored',values_tmp);
                           
                           
                           //console.log(JSON.stringify(values_tmp));
                           
                            //generate on preview
                            rocketform.fields2_fieldQuickOptions_Duplicate_process(pickfield,pickfield_type);
                            
                     
                 } else {
                    var sel_element=$('.uiform-enable-fieldset').find('a[data-type="'+pickfield_type+'"]');
                    var el=$(sel_element).clone();
                    el.insertAfter(pickfield);

                    /*show loader box and message*/

                    var new_parent_id=rocketform.getFieldsAfterDraggable(el,pickfield_type,true,pickfield.attr('id'));
                     
                 }
                 
                  //fields take time to load
              setTimeout(function(){ 
               rocketform.setInnerVariable('fields_load_settings', 1);  
              }, 1000);
     };
            
            
     arguments.callee.fields2_fieldQuickOptions_Duplicate_process = function (el_parent,type){
                var tmp_vars = rocketform.getInnerVariable('fields_duplication_stored');
                
                //get field button 
                var sel_element = $('.uiform-enable-fieldset').find('a[data-type="' + type + '"]').first();
                var el = $(sel_element).clone();
                //insert into preview
                el.insertAfter(el_parent);

                var f_step = $('.uiform-step-content .uiform-step-pane:visible').data('uifm-step');

                /*show loader box and message*/
                var new_parent_id = rocketform.getFieldsAfterDraggable(el, type, true, el_parent.attr('id'));
              
                rocketform.enableFieldPlugin(f_step, new_parent_id, type, rocketform.getUiData3('steps_src',f_step, new_parent_id));
                
                
                var tmp_f_id, tmp_f_type, tmp_sel_el, tmp_new_el, tmp_new_parent, tmp_new_parent_f, tmp_new_id, len_children;

                var uifm_afterdrag_timer;
                
                switch (parseInt(type)) {
                case 1:
                case 2: 
                case 3:
                case 4:
                case 5:
                    
                     uifm_afterdrag_timer = setInterval(function () {

                    if ($('#' + new_parent_id).find('.sfdc-container-fluid').length) {

                        if (parseInt(tmp_vars['inner'].length) != 0) {
                            $.each(tmp_vars['inner'], function (index2, value2) {

                                tmp_new_parent = $('#' + new_parent_id).find('> .sfdc-container-fluid .zgpb-fl-gs-block-style:eq(' + index2 + ')');
                                tmp_new_parent_f = tmp_new_parent.find('> .zgpb-fl-gs-block-inner');

                                len_children = $.map(value2['children'], function (n, i) {
                                    return i;
                                }).length;

                                if (parseInt(len_children) > 0) {
                                    $.each(value2['children'], function (index3, value3) {
                                        //get id
                                        tmp_f_id = value3['id'];
                                        tmp_f_type = value3['type'];

                                        //store data to use later
                                        rocketform.fieldQuickOptions_Duplicate_checkChildren(tmp_f_type, tmp_f_id, tmp_new_parent_f);
                                    });
                                }
                            });
                        }

                        //remove check function
                        clearInterval(uifm_afterdrag_timer);
                        uifm_afterdrag_timer = null;

                    }

                }, 1000);
                    
                    break;
                case 31:
                   
                     uifm_afterdrag_timer = setInterval(function () {
                        
                    if ($('#' + new_parent_id).find('> .uiform-field-wrap').length) {
                       
                        if (parseInt(tmp_vars['inner'].length) != 0) {
                            $.each(tmp_vars['inner'], function (index2, value2) {

                                tmp_new_parent = $('#' + new_parent_id).find('> .uiform-field-wrap').find('.uifm-input31-main-wrap').first();
                                tmp_new_parent_f = tmp_new_parent.find('> .uiform-grid-inner-col');

                                len_children = $.map(value2['children'], function (n, i) {
                                    return i;
                                }).length;

                                if (parseInt(len_children) > 0) {
                                    $.each(value2['children'], function (index3, value3) {
                                        //get id
                                        tmp_f_id = value3['id'];
                                        tmp_f_type = value3['type'];
                                       
                                        //store data to use later
                                        rocketform.fieldQuickOptions_Duplicate_checkChildren(tmp_f_type, tmp_f_id, tmp_new_parent_f);
                                    });
                                }
                            });
                        }

                        //remove check function
                        clearInterval(uifm_afterdrag_timer);
                        uifm_afterdrag_timer = null;

                    }

                }, 1000);
                    
                    break;
                }
                
               
     };    
                                        
     arguments.callee.fieldQuickOptions_Duplicate_checkChildren = function (tmp_f_type,tmp_f_id,tmp_new_parent_f){
         
          var tmp_new_id,tmp_sel_el,tmp_new_el,tmp_vars,tmp_new_parent,tmp_new_parent_f2,len_children,tmp_f_id2,tmp_f_type2;
         
         tmp_vars =  rocketform.getInnerVariable('fun_dupli_cur_field');
                 
         tmp_sel_el = $('.uiform-enable-fieldset').find('a[data-type="'+tmp_f_type+'"]');

            tmp_new_el = $(tmp_sel_el).clone();

            tmp_new_parent_f.append(tmp_new_el);

            //create field
            tmp_new_id=rocketform.getFieldsAfterDraggable(tmp_new_el,tmp_f_type,true,tmp_f_id);
            //refresh preview
             var f_step=$('.uiform-step-content .uiform-step-pane:visible').data('uifm-step');
            
            
            rocketform.enableFieldPlugin(f_step,tmp_new_id,tmp_f_type,rocketform.getUiData3('steps_src',f_step,tmp_new_id));
            
            
         var uifm_afterdrag_timer;
          switch (parseInt(tmp_f_type)) {
                case 1:
                case 2: 
                case 3:
                case 4:
                case 5:    
                    //column 4
                        
                    uifm_afterdrag_timer = setInterval(function(){
                        if($('#'+tmp_new_id).find('.sfdc-container-fluid').length){
                             
                            if(parseInt(tmp_vars['inner'].length)!=0){
                                $.each(tmp_vars['inner'], function(index2, value2) {



                                           tmp_new_parent=$('#'+tmp_new_id).find('> .sfdc-container-fluid .zgpb-fl-gs-block-style:eq('+index2+')');
                                           tmp_new_parent_f2 = tmp_new_parent.find('> .zgpb-fl-gs-block-inner');

                                           len_children = $.map(value2['children'], function(n, i) { return i; }).length;

                                           if(parseInt(len_children)>0){
                                              $.each(value2['children'], function(index3, value3) {
                                                  //get id
                                                  tmp_f_id2=value3['id'];
                                                  tmp_f_type2=value3['type'];


                                                  //store data to use later
                                                  rocketform.setInnerVariable('fun_dupli_cur_field',value3);

                                                  rocketform.fieldQuickOptions_Duplicate_checkChildren(tmp_f_type2,tmp_f_id2,tmp_new_parent_f2);






                                              });
                                          }   
                                });
                              } 
                              
                             //remove check function
                            clearInterval(uifm_afterdrag_timer);
                            uifm_afterdrag_timer=null;
                             
                        }
                     },1000);
                    break;
                default: 
                    


                    break;
            }
     };
     
                                         
            arguments.callee.fields2_fieldQuickOptions_deleteField = function(id){
        
        
                    var box_title=$('#zgpb_fld_del_box_title').val(),
                      box_msg=$('#zgpb_fld_del_box_msg').val(),
                      btn1_title=$('#zgpb_fld_del_box_bt1_title').val(),
                      btn2_title=$('#zgpb_fld_del_box_bt2_title').val();

                          bootbox.dialog({
                              message: box_msg,
                              title: box_title,
                              buttons: {
                                  fld_del_opt1: {
                                      label: btn1_title,
                                      className: "sfdc-btn-default",
                                      callback: function() {
                                           //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                      }
                                  },
                                  fld_del_opt2: {
                                      label: btn2_title,
                                      className: "sfdc-btn-primary",
                                      callback: function() {

                                           rocketform.fields2_fieldsetting_deleteField(id); 
                                           
                                           //delete form variable
                                            rocketform.formvariables_removeFromlist(id);

                                            //refresh customer email select
                                            rocketform.fieldsdata_email_genListToIntMem();

                                            /*hiding tooltip after loading form*/
                                             zgfm_back_helper.tooltip_removeall();
                                           
                                            //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                      }
                                  }
                              }
                              });
              }
            
            
            arguments.callee.fields2_fieldsetting_deleteField = function (idselected) {
                 
                //delete from core data
                var fld_step=$('#'+idselected).closest('.uiform-step-pane').data('uifm-step');
                fld_step= parseInt(fld_step);
                 
                rocketform.delUiData3('steps_src',fld_step,idselected);
                
                //closing tab
                rocketform.closeSettingTab();
                
                //cleaning any empty array
                 var tmp_arr=mainrformb['steps_src'][fld_step];
                    var tmp_len = tmp_arr.length, tmp_i;
                    for(tmp_i = 0; tmp_i < tmp_len; tmp_i++ )
                            tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
                    if($.isArray(tmp_arr)){
                        tmp_arr.splice(0 ,tmp_len);
                        mainrformb['steps_src'][fld_step]=tmp_arr;
                    }
                    
                //delete from DOM
                $('#'+idselected).remove();    
             };
            
            arguments.callee.fieldQuickOptions_DuplicateField = function (element){
                /*var pickfield = $(element).closest('.uiform-field');
                var cur_step=$('.uiform-step-content .uiform-step-pane:visible').data('uifm-step');
                var pickfield_type =pickfield.attr('data-typefield');
                var sel_element=$('.uiform-sidebar-fields').find('a[data-type="'+pickfield_type+'"]').first();
                var el=$(sel_element).clone();
                el.insertAfter(pickfield);
                rocketform.showLoader(2);
                rocketform.getFieldsAfterDraggable(el,pickfield_type,true,pickfield.attr('id'));*/
                    
            };
            
            arguments.callee.fieldQuickOptions_loadFieldSelected = function (pickfield){
                            
                            if(pickfield && pickfield.attr("id")){
                                var idselected= $('#uifm-field-selected-id').val();
                                
                                if(idselected!=pickfield.attr("id") || (!$('.uifm-tab-selectedfield').is(':visible') && idselected)){
                                    //hide popovers
                                    rocketform.previewfield_hidePopOver();
                                    rocketform.previewfield_removeAllPopovers();
                                    rocketform.previewfield_removeAllUndesiredObj(pickfield);
                                    
                                    //hide tooltip
                                    rocketform.previewfield_helpblock_hidetooltip();
                                    
                                    //show tabs and load data to preview
                                    rocketform.enableSettingTabOnPick(pickfield.attr("id"),pickfield.data("typefield"));
                                    //add enhance
                                    rocketform.setHighlightPicked(pickfield);
                                }
                                //show fields tabs
                                rocketform.enableSettingTabOption('uifm-label');
                            }
            };
             arguments.callee.fieldQuickOptions_selectField_equalToOne = function (){  
                   //rocketform.fieldQuickOptions_selectField_equalToOne();
                      rocketform.closeSettingTab();
                      var obj_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                      var pickfield;
                      $.each(obj_Checked, function(index, value) {
                            pickfield = $(this).closest('.uiform-field');
                            rocketform.fieldQuickOptions_loadFieldSelected(pickfield);
                        });
             };
             
             arguments.callee.fieldQuickOptions_selectField_MoreThanOne = function (){  
                 try{
                 var ObjChecked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                 var ObjChecked_length=$('.uiform-main-form .uiform-fields-qopt-select input:checked').length;
                 var arr = [];
                 var id_field;
                 var arr_f_input=[6,7,28,29,30];
                 var arr_f_input_cont=0;
                 
                 /*highlight field boxes*/
                if($(document).find('.uifm-highlight-edited')){
                   $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
                }
                
                 $.each(ObjChecked, function(index, value) {
                     var id_field=$(this).closest('.uiform-field').attr('data-typefield');
                     if($.inArray(parseInt(id_field),arr_f_input)< 0){
                         
                     }else{
                         arr_f_input_cont++;
                     }
                     arr.push(id_field);
                      /*highlight field boxes*/
                     $(this).closest('.uiform-field').addClass('uifm-highlight-edited');
                });
                
              
                /*clean id selected*/
                $('#uifm-field-selected-id').val('');
                var clvars;
                if(parseInt(ObjChecked_length)===arr_f_input_cont){
                     //cleaning setting tab
                    rocketform.cleanSettingTab();
                    clvars = [
                        '.uifm-tab-fld-label'
                        ,'.uifm-tab-fld-input'
                        ,'.uifm-tab-fld-helpblock'
                        ,'.uifm-set-section-label'
                        ,'.uifm-set-section-sublabel'
                        ,'.uifm-set-section-blocktxt'
                        ,'.uifm-set-section-input-valign'
                        ,'.uifm-set-section-inputtextbox'
                        ,'.uifm-set-section-inputboxbg'
                        ,'.uifm-set-section-inputboxborder'
                        ,'.uifm-set-section-helpblock'
                    ];
                    $.each(clvars,function(){
                        $(String(this)).removeClass("uifm-hide");
                    });
                }else{
                     //cleaning setting tab
                    rocketform.cleanSettingTab();
                    clvars = [
                        '.uifm-tab-fld-label'
                        ,'.uifm-tab-fld-helpblock'
                        ,'.uifm-set-section-label'
                        ,'.uifm-set-section-sublabel'
                        ,'.uifm-set-section-blocktxt'
                        ,'.uifm-set-section-helpblock'
                       
                    ];
                    $.each(clvars,function(){
                        $(String(this)).removeClass("uifm-hide");
                    });
                }
                
                /*label tab*/
                $('#uifm_fld_lbl_color').val('');
                $('#uifm_fld_lbl_sha_co').val('');
                $('#uifm_fld_sublbl_color').val('');
                $('#uifm_fld_sublbl_sha_co').val('');
                    }
                catch(err) {
                    console.log('error fieldQuickOptions_selectField_MoreThanOne: '+err.message);
                } 
             };
             
             arguments.callee.globalsettings_saveOptions=function (){      
                   rocketform.showLoader(3,true,true);
                   var data=$('#uifrm-setting-form').serialize();
                     $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/settings/ajax_save_options",
                            data:data+'&action=rocket_fbuilder_setting_saveOpts&page=zgfm_form_builder'+'&zgfm_security='+uiform_vars.ajax_nonce+'&csrf_field_name='+uiform_vars.csrf_field_name,
                            success: function(msg) {
rocketform.hideLoader();
                                rocketform.redirect_tourl(uiform_vars.url_admin+'formbuilder/settings/view_settings');
                            }
                        });
             };
             
             arguments.callee.guidedtour_showTextOnPreviewPane_recalc=function (){
                  if(parseInt($('.uiform-items-container').children().length) === 0){
                            /*var pos_top=$('.uiform-main-form').offset().top;
                            var pos_left=$('.uiform-main-form').offset().left;*/
                            var offsetLeft = $('.uiform-step-content').position().left - $('.uiform-step-content').closest('.uiform-preview-base').position().left;
                            //var offsetTop = $('.uiform-main-form').position().top - $('.uiform-preview-base').position().top;
                            var offsetTop = parseFloat($('.uiform-step-content').position().top)+25;
                            $('.uiform-newform-help-highlight').css({
                            'top': offsetTop,
                            'left':offsetLeft
                            });
                     }        
             };
             
             arguments.callee.guidedtour_showTextOnPreviewPane=function (show){      
                    if(show){
                        if(parseInt($('.uiform-items-container').children().length) === 0){
                            
                            $('.uiform-builder-preview').append($('.uiform-newform-help-highlight').parent().clone().html());
                            rocketform.guidedtour_showTextOnPreviewPane_recalc();
                        }  
                    }else{
                        if($('.uiform-builder-preview').find('.uiform-newform-help-highlight')){
                            $('.uiform-builder-preview').find('.uiform-newform-help-highlight').remove();
                        }
                        
                    }
             };
             arguments.callee.images_getThumnail=function (html){
                 var theClass = $('img',html).attr("class").match(/wp-image-[\w-]*\b/);
                 var tmp_class=theClass[0];
                 tmp_class=tmp_class.split('-');
                 var img_id=tmp_class[tmp_class.length-1];
                 $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_load_getthumbimg",
                            data: {
                            'action': 'rocket_fbuilder_getthumbimg',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'html':encodeURIComponent(html),
                            'img_src_full':$('img',html).attr("src"),
                            'img_id':img_id,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                                
                            }
                        });
             };
             
             arguments.callee.templates_load=function (number){
                   rocketform.showLoader(1,true,true);
                    $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_load_templateform",
                            data: {
                            'action': 'rocket_fbuilder_loadtemplate',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'number':number,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                                rocketform.loadFormToEditPanel(msg);
                                rocketform.loading_panelbox('rocketform-bk-dashboard',0);
                                
                                 //wizard refresh
                                rocketform.wizardform_refresh();
                                
                                //load form variables
                                rocketform.formvariables_genListToIntMem();
                                //load customer mail select options
                                rocketform.fieldsdata_email_genListToIntMem();
                                
                               
                                /*hide loader*/        
                                rocketform.loading_panelbox2(0);
                                
                                
                                
                            }
                        });
             };
             
             arguments.callee.wizardform_refresh = function(){
                      var wiz_st=(parseInt(rocketform.getUiData2('wizard','enable_st'))===1)?true:false;
                                if(wiz_st){
                                    
                                    $('.uiform-step-list').show();
                                        //show wizard options
                                        $('.uiform_frm_wiz_main_content').show();
                                    //refresh tab skin
                                    rocketform.wizardtab_refreshPreview();
                                    //refresh head tab 
                                    rocketform.wizardtab_changeThemeOnPreview();
                                    
                                    //refresh sortable forms
                                    enableSortableItems();
                                    //go to first position
                                    rocketform.wizardtab_gotoFirstPosition();
                                    
                                }else{
                                    //go to first position
                                    $('.uiform-step-list').hide();
                                    $('.uiform_frm_wiz_main_content').hide();
                                    rocketform.wizardtab_gotoFirstPosition();
                                }
                                //form skin
                            var form_tab_skin=rocketform.getUiData('skin');

                            var tab=$('#uiform-settings-tab3-2');
                            var obj_field=$('.uiform-preview-base');
                            $.each(form_tab_skin, function(i, value) {
                                            if($.isPlainObject(value)){
                                                    $.each(value, function(i2, value2) {
                                                        
                                                            rocketform.setDataOptToSetFormTab(tab,'skin',i+'-'+i2,value2);
                                                            rocketform.setDataOptToPrevForm(obj_field,'skin',i+'-'+i2,value2);
                                                        });
                                            }else{
                                                rocketform.setDataOptToSetFormTab(tab,'skin',i+'-'+'',value);
                                                rocketform.setDataOptToPrevForm(obj_field,'skin',i+'-',value);
                                            }

                                        });
             }
             
             arguments.callee.guidedtour_load=function (){
                 var obj=$('#uiform-container');
                 var getpage=$('[data-uiform-page]').attr('data-uiform-page');
                 var options;
                 var intro;
                 switch(String(getpage)){
                     case 'form_list':
                            intro = introJs();
                            intro.setOptions({
                                steps: [
                                {
                                    element: document.querySelector('#guidetour-flist-shortcode'),
                                    intro: document.querySelector('#guidetour-flist-shortcode').getAttribute("data-intro")
                                },
                                {
                                    element: document.querySelectorAll('.guidetour-flist-edit')[0],
                                    intro: document.querySelectorAll('.guidetour-flist-edit')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.guidetour-flist-del')[0],
                                    intro: document.querySelectorAll('.guidetour-flist-del')[0].getAttribute("data-intro"),
                                    position: 'left'
                                }
                                ]
                            });
                            intro.start();
                         break;
                     case 'form_edit':
                            intro = introJs();
                            intro.setOptions({
                                steps: [
                                {
                                    element: document.querySelectorAll('.uiform-sidebar-fields')[0],
                                    intro: document.querySelectorAll('.uiform-sidebar-fields')[0].getAttribute("data-intro"),
                                    position: 'right'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-preview-base')[0],
                                    intro: document.querySelectorAll('.uiform-preview-base')[0].getAttribute("data-intro"),
                                    position: 'right'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-builder-maintab-container')[0],
                                    intro: document.querySelectorAll('.uiform-builder-maintab-container')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-settings-main')[0],
                                    intro: document.querySelectorAll('.uiform-settings-main')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-settings-skin')[0],
                                    intro: document.querySelectorAll('.uiform-settings-skin')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-settings-wizard')[0],
                                    intro: document.querySelectorAll('.uiform-settings-wizard')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-settings-email')[0],
                                    intro: document.querySelectorAll('.uiform-settings-email')[0].getAttribute("data-intro"),
                                    position: 'left'
                                },
                                {
                                    element: document.querySelectorAll('.uiform-settings-subm')[0],
                                    intro: document.querySelectorAll('.uiform-settings-subm')[0].getAttribute("data-intro"),
                                    position: 'left'
                                }
                                ]
                            });
                            
                            intro.onbeforechange(function(targetElement) {

                    switch (this._currentStep)
                    {
                        case 0:
                            /*step 1*/
                           
                            break;
                        case 1:
                            /*step 2*/
                            /*rocketform.guidedtour_showTextOnPreviewPane();*/
                            break;
                        case 2:
                            /*step 2*/
                            
                            break;    
                        case 3:
                            /*step 2*/
                          
                            break;   
                        
                       
                        
                        
                       
                        default:

                    }

                });
                            
                            intro.start();
                         break;
                     default:
                         $('#uifm_modal_msg').sfdc_modal('show');
       $('#uifm_modal_msg .sfdc-modal-title').html($('#uifm_guidetour_popup_title').val());
       $('#uifm_modal_msg .sfdc-modal-body').html('<p>'+$('#uifm_guidetour_popup_notfound').val()+'</p>');
                         break;
                 }
                 
             };
             
             arguments.callee.input4settings_generateField=function (obj,section){
                 var f_id= obj.attr('id');
                 var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                 
                 var f_set_min=this.getUiData5('steps_src',f_step,f_id,section,'set_min');
                 var f_set_max=this.getUiData5('steps_src',f_step,f_id,section,'set_max');
                 var f_set_default=this.getUiData5('steps_src',f_step,f_id,section,'set_default');
                 var f_set_step=this.getUiData5('steps_src',f_step,f_id,section,'set_step');
                 
                 var f_type=this.getUiData4('steps_src',f_step,f_id,'type');
                 
                 var f_values=this.getUiData4('steps_src',f_step,f_id,section);
                 
                 var valhash = CryptoJS.MD5(JSON.stringify(f_values));
                 
                 var f_checkhash=$('#'+f_id).find('.uifm-inp4-fld').attr('data-check-hash');
                 
                 var f_src;
                 var tmp_el_slider;
                 /*check if plugin is binded*/
                 switch(parseInt(f_type)){
                         case 16:
                             /*slider*/
                             f_src=$('#'+f_id).find('.uifm-inp4-fld');
                             if (undefined == f_src.data('bootstrapSlider')) {
                                  /*fixing old version - get the input outside slider wrapper*/
                                  if(parseInt($('#'+f_id).find('.slider').find('.uifm-inp4-fld').length)!=0){
                                     tmp_el_slider = f_src.detach();
                                     $('#'+f_id).find('.uifm-input4-wrap').append(tmp_el_slider);
                                     f_src=$('#'+f_id).find('.uifm-inp4-fld');
                                  }
                                  f_src.parent().find('.slider').remove();
                                  f_src.bootstrapSlider(
                                    {
                                        step: parseFloat(f_set_step),
                                        min: parseFloat(f_set_min),
                                        max: parseFloat(f_set_max),
                                        value: parseFloat(f_set_default)
                                    }
                                    );    
                                }
                             break;
                          case 17:
                              /*range*/
                               f_src=$('#'+f_id).find('.uifm-inp4-fld');
                             var f_set_range1=this.getUiData5('steps_src',f_step,f_id,section,'set_range1');
                            var f_set_range2=this.getUiData5('steps_src',f_step,f_id,section,'set_range2');
                             if (undefined == f_src.data('bootstrapSlider')) {
                                  if(parseInt($('#'+f_id).find('.slider').find('.uifm-inp4-fld').length)!=0){
                                     tmp_el_slider = f_src.detach();
                                     $('#'+f_id).find('.uifm-input4-wrap').append(tmp_el_slider);
                                     f_src=$('#'+f_id).find('.uifm-inp4-fld');
                                  }
                                  
                                  f_src.parent().find('.slider').remove();
                                  f_src.bootstrapSlider(
                                    {
                                        step: parseFloat(f_set_step),
                                        min: parseFloat(f_set_min),
                                        max: parseFloat(f_set_max),
                                        range: true,
                                        value: [parseFloat(f_set_range1),parseFloat(f_set_range2)]
                                    }
                                    );
                                }
                              break;
                              
                 }
                 
                 if(String(f_checkhash)===String(valhash)){
                 }else{
                    $('#'+f_id).find('.uifm-inp4-fld').attr('data-check-hash',valhash); 
                    
                    switch(parseInt(f_type)){
                         case 16:
                             /*slider*/
                             
                             f_src.bootstrapSlider("setAttribute", "step", parseFloat(f_set_step));
                             f_src.bootstrapSlider("setAttribute", "min", parseFloat(f_set_min));
                             f_src.bootstrapSlider("setAttribute", "max", parseFloat(f_set_max));
                             f_src.bootstrapSlider("setAttribute", "value", parseFloat(f_set_default));
                             
                             f_src.bootstrapSlider('refresh');
                              
                           $('#'+f_id).find('.uifm-inp4-number').html(f_set_default);
                             break;
                         case 17:
                             /*range*/
                             f_src.bootstrapSlider("setAttribute", "step", parseFloat(f_set_step));
                             f_src.bootstrapSlider("setAttribute", "min", parseFloat(f_set_min));
                             f_src.bootstrapSlider("setAttribute", "max", parseFloat(f_set_max));
                             f_src.bootstrapSlider("setAttribute", "value", [parseFloat(f_set_range1),parseFloat(f_set_range2)]);
                             f_src.bootstrapSlider("setAttribute", "range", true);
                             
                             f_src.bootstrapSlider('refresh');
                             
                             break;
                         case 18:
                             /*spinner*/
                             f_src=$('#'+f_id).find('.uifm-input4-wrap');
                             f_src.find('.uifm-inp4-fld').val(parseFloat(f_set_default));
                             if(parseInt(f_src.find('.bootstrap-touchspin').length)!=0) {
                                f_src.find('.uifm-inp4-fld').trigger("touchspin.updatesettings", {
                                    min: parseFloat(f_set_min),
                                    max: parseFloat(f_set_max),
                                    stepinterval: parseFloat(f_set_step),
                                    initval: parseFloat(f_set_default)
                                });
                            }else{
                                f_src.find('.uifm-inp4-fld').TouchSpin({
                                    verticalbuttons: true,
                                    min: parseFloat(f_set_min),
                                    max: parseFloat(f_set_max),
                                    stepinterval: parseFloat(f_set_step),
                                    verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                                    verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus',
                                    initval: parseFloat(f_set_default)
                                });
                            }
                            var f_skin_maxwidth_st=this.getUiData5('steps_src',f_step,f_id,section,'skin_maxwidth_st');
                            var f_skin_maxwidth=this.getUiData5('steps_src',f_step,f_id,section,'skin_maxwidth');
                            
                            /*applying css*/
                            if(parseInt(f_skin_maxwidth_st)===1){
                                f_src.css('max-width',f_skin_maxwidth+'px');
                                f_src.css('width','100%');
                            }else{
                                f_src.removeCss('max-width');
                            }
                            
                             break;
                     }
                    
                    
                 }
                 
             };
             arguments.callee.backup_deleteStoredFile=function (el){
                 var delfile=el.attr('data-uifm-file');
                 rocketform.loading_panelbox2(1);
                $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/settings/ajax_backup_deletefile",
                            data: {
                            'action': 'uiform_fbuilder_setting_delbackupfile',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'uifm_frm_delfile':delfile,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function() {
                               rocketform.loading_panelbox2(0);
                               var re_url= uiform_vars.url_admin+'formbuilder/settings/backup_settings';
                                rocketform.redirect_tourl(re_url);
                            }
                        });
             };
             arguments.callee.backup_restoreBackup=function (el){
                 var resfile=el.attr('data-uifm-file');
                rocketform.loading_panelbox2(1);
                $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/settings/ajax_backup_restorefile",
                            data: {
                            'action': 'uiform_fbuilder_setting_restorebkpfile',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'uifm_frm_resfile':resfile,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function() {
                                rocketform.loading_panelbox2(0);
                                var msg=$('#uifm_bkp_msg_success_restore').val();
                                $('#uifm-backup-response').html(rocketform.alerts_global_msg(1,msg));
                               
                            }
                        });
             };
             arguments.callee.backup_PopUpRestore=function (el){
                var box_title=$('#uifm_bkp_restore_box_title').val(),
                box_msg=$('#uifm_fld_del_box_msg').val(),
                btn1_title=$('#uifm_fld_del_box_bt1_title').val(),
                btn2_title=$('#uifm_fld_del_box_bt2_title').val();

                    bootbox.dialog({
                        message: box_msg,
                        title: box_title,
                        buttons: {
                            fld_del_opt1: {
                                label: btn1_title,
                                className: "sfdc-btn-default",
                                callback: function() {
                                     //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                }
                            },
                            fld_del_opt2: {
                                label: btn2_title,
                                className: "sfdc-btn-primary",
                                callback: function() {
                                rocketform.backup_restoreBackup($(el)); 
                                 //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                
                                }
                            }
                        }
                        });
             };
             arguments.callee.showFeatureLocked=function(el){
               /*demo*/  
                     $('#uifm_modal_msg').sfdc_modal('show');
                     $('#uifm_modal_msg .sfdc-modal-title').html('Feature locked');
                     var str_output='';
                     //str_output+='<a target="_blank" href="https://codecanyon.net/item/zigaform-wordpress-form-builder/11057544?ref=Softdiscover">';
                     //str_output+='<img style="width:100%;" src="'+uiform_vars.url_assets+'/backend/image/express/express-banner-get-pro.png">';
                     //str_output+='</a>';
                      var obj=$(el);
                     
                     str_output = obj.attr('data-blocked-feature');
                     
                     $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/settings/ajax_blocked_getmessage",
                            data: {
                            'action': 'uiform_fbuilder_blocked_getmessage',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'message':str_output,
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(data) {
                                 $('#uifm_modal_msg .sfdc-modal-body').html(data.msg);
                            }
                        });
                     
                     
                     
                    
             };
             arguments.callee.backup_PopUpDelete=function (el){
                var box_title=$('#uifm_bkp_del_box_title').val(),
                box_msg=$('#uifm_fld_del_box_msg').val(),
                btn1_title=$('#uifm_fld_del_box_bt1_title').val(),
                btn2_title=$('#uifm_fld_del_box_bt2_title').val();
                
                    bootbox.dialog({
                        message: box_msg,
                        title: box_title,
                        buttons: {
                            fld_del_opt1: {
                                label: btn1_title,
                                className: "sfdc-btn-default",
                                callback: function() {
                                     //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                }
                            },
                            fld_del_opt2: {
                                label: btn2_title,
                                className: "sfdc-btn-primary",
                                callback: function() {
                                rocketform.backup_deleteStoredFile($(el)); 
                                 //remove modal class from body
                                             $('body').removeClass('sfdc-modal-open');
                                }
                            }
                        }
                        });
             };
             arguments.callee.backup_create=function (){
                  rocketform.loading_panelbox2(1);
                 $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/settings/ajax_backup_create",
                            data: {
                            'action': 'uiform_fbuilder_setting_backup',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'uifm_frm_namebackup':$('#_uifm_backup_namebkp').val(),
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function() {
                                rocketform.loading_panelbox2(0);
                                $('#_uifm_backup_namebkp').val('');
                                var re_url= uiform_vars.url_admin+'formbuilder/settings/backup_settings';
                                rocketform.redirect_tourl(re_url);
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                                
                            } 
                        });
             };
             arguments.callee.migrateToVersion3=function (){
                 /*load loader*/
                 rocketform.loading_panelbox2(1);
                 /*remove skin from every plugin*/
                 $.each(mainrformb['steps_src'], function(i, value) {
                            if($.isPlainObject(value)){
                                    $.each(value, function(i2, value2) {
                                            switch(parseInt(mainrformb['steps_src'][i][i2]['type'])){
                                                case 1:
                                                case 2:
                                                case 3:
                                                case 4:
                                                case 5:
                                                    delete mainrformb['steps_src'][i][i2]['skin'];
                                                    break;
                                                default:
                                                    delete mainrformb['steps_src'][i][i2]['skin'];
                                            }
                                            
                                             
                                        });
                            }else{
                                 
                            }

                        });
                 
                 
                 
                 this.migrateToVersion3_process();
             };
             
             arguments.callee.migrateToVersion3_process=function (){
                 //process fonts for fields
            var tmp_frm = mainrformb;
            
            $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_refresh_previewpanel",
                            data: {
                            'action': 'rocket_fbuilder_refreshpreviewpanel',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'uifm_frm_main_title':$('#uifm_frm_main_title').val(),
                            'uifm_frm_main_id':$('#uifm_frm_main_id').val(),
                            'form_data':encodeURIComponent(JSON.stringify(tmp_frm)),
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                                /*update vars*/
                                //msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                               msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                                var mainrformb_tmp = {
                                    main:msg.data.fmb_data['main'],
                                    skin:msg.data.fmb_data['skin'],
                                    wizard:msg.data.fmb_data['wizard'],
                                    onsubm:msg.data.fmb_data['onsubm'],
                                    num_tabs:msg.data.fmb_data['num_tabs'],
                                    steps: msg.data.fmb_data['steps'],
                                    steps_src:msg.data.fmb_data['steps_src']
                                };
                                mainrformb = $.extend( true,{}, mainrformb, mainrformb_tmp );
                                 
                                 $('.uiform-preview-base').html(msg.data.fmb_html_backend);
                                
                                //updating field columns
                               
                                var id,field_instance;
                                var set_option;
                                 $.each(mainrformb['steps_src'], function(i, value) {
                                    if($.isPlainObject(value)){
                                            $.each(value, function(i2, value2) {
                                                    switch(parseInt(mainrformb['steps_src'][i][i2]['type'])){
                                                        case 1:
                                                        case 2:
                                                        case 3:
                                                        case 4:
                                                        case 5:
                                                             set_option= mainrformb['steps_src'][i][i2];
                                                             id=mainrformb['steps_src'][i][i2]['id'];
                                                              
                                                             // set_option=data_field;
                                                            $('#'+id).zgpbld_gridsystem();

                                                            field_instance =$('#'+id).data('zgpbld_gridsystem');

                                                            //assign data to object
                                                            field_instance.setToDatalvl1('id',id);


                                                            switch (parseInt(mainrformb['steps_src'][i][i2]['type'])) {
                                                                    case 1:
                                                                        field_instance.setToDatalvl1('type',1);
                                                                        field_instance.setToDatalvl1('type_n','grid1');
                                                                        break;
                                                                    case 2:
                                                                        field_instance.setToDatalvl1('type',2);
                                                                        field_instance.setToDatalvl1('type_n','grid2');
                                                                        break;
                                                                    case 3:
                                                                        field_instance.setToDatalvl1('type',3);
                                                                        field_instance.setToDatalvl1('type_n','grid3');
                                                                        break;    
                                                                    case 4:
                                                                        field_instance.setToDatalvl1('type',4);
                                                                        field_instance.setToDatalvl1('type_n','grid4');
                                                                        break;
                                                                    case 5:
                                                                        //six columns
                                                                        field_instance.setToDatalvl1('type',5);
                                                                        field_instance.setToDatalvl1('type_n','grid6');
                                                                        break;    
                                                                }
                                                             
                                                                
                                                                //generate block attributes
                                                                field_instance.createBlockAttributes();
                                                                
                                                                //assign settings data
                                                                field_instance.update_settingsData(set_option);  

                                                                //assign step
                                                                field_instance.setStep(i);

                                                                //attach data to object
                                                                field_instance.updateVarData(id);

                                                                //assign data to data core
                                                                field_instance.setDataToCoreStore(i,id);

                                                                 
                                                                
                                                                
                                                            break;
                                                        default:
                                                           
                                                    }


                                                });
                                    }else{

                                    }

                                });
                                msg.data.fmb_data['steps_src']=mainrformb['steps_src'];
                                //load form
                                rocketform.loadFormToEditPanel(msg);
                                
                                //wizard refresh
                                rocketform.wizardform_refresh();
                                /*hide loader*/        
                                rocketform.loading_panelbox2(0);
                                     
                            }
                        });
             };
             
             arguments.callee.refreshPreviewSection_process=function (){
                 //process fonts for fields
            var tmp_frm = mainrformb;
            
            $.ajax({
                            type: 'POST',
                            url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_refresh_previewpanel",
                            data: {
                            'action': 'rocket_fbuilder_refreshpreviewpanel',
                            'page':'zgfm_form_builder',
                            'zgfm_security':uiform_vars.ajax_nonce,
                            'uifm_frm_main_title':$('#uifm_frm_main_title').val(),
                            'uifm_frm_main_id':$('#uifm_frm_main_id').val(),
                            'form_data':encodeURIComponent(JSON.stringify(tmp_frm)),
                            'csrf_field_name':uiform_vars.csrf_field_name
                                },
                            success: function(msg) {
                                /*update vars*/
                                //msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                               msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                                
                                //load form
                                rocketform.loadFormToEditPanel(msg);
                                
                                //wizard refresh
                                rocketform.wizardform_refresh();
                                /*hide loader*/        
                                rocketform.loading_panelbox2(0);
                                
                                       /*clean index of select fields and convert to string*/
                                if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                                           $.each(mainrformb['steps_src'], function(index3, value3) {
                                               $.each(value3, function(index4, value4) {

                                                                 switch(parseInt(value4['type'])){
                                                                         case 1:
                                                                         case 2:
                                                                         case 3:
                                                                         case 4:
                                                                         case 5:
                                                                             break;
                                                                         case 8:
                                                                         case 9:
                                                                         case 10:
                                                                         case 11:
                                                                             //check if there are not only numbers
                                                                             var tmp_opt=rocketform.getUiData5('steps_src',parseInt(index3),value4['id'],'input2','options');

                                                                            rocketform.setUiData5('steps_src',parseInt(index3),value4['id'],'input2','options',{});

                                                                              for (var key in tmp_opt) {
                                                                                       rocketform.addIndexUiData5('steps_src',parseInt(index3),value4['id'],'input2','options',String(key));
                                                                            rocketform.setUiData6('steps_src',parseInt(index3),value4['id'],'input2','options',String(key),{value:tmp_opt[key]['value'],
                                                                                                 label:tmp_opt[key]['label'],
                                                                                                 checked:tmp_opt[key]['checked'],
                                                                                                 order:tmp_opt[key]['order'],
                                                                                                 id:tmp_opt[key]['id']
                                                                                             });		

                                                                              } 

                                                                             break;
                                                                         default:
                                                                             
                                                                             break;
                                                                     }

                                                 });
                                           });  
                                         }
                            }
                        });
             };
             
             arguments.callee.refreshPreviewSection=function (){
                                
                 rocketform.loading_panelbox2(1);
                 rocketform.saveform_cleanForm();
        /*hide highlighted fields*/
         /*highlight field boxes*/
        if($(document).find('.uifm-highlight-edited')){
            $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
        }
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').prop('checked',false);
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').closest('.uiform-fields-quick-options').removeCss('display');
        this.closeSettingTab();
        //show loader
        rocketform.showLoader(2,true,true);
        
        //save tabs content
        this.saveTabContent();
       
         
        /*problem on form data variable when sending data, fixed putting on last */
                /*destroing rating star*/
               if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  var rockfm_tmp_rs=$('.uiform-main-form').find('.uifm-input-ratingstar');
                  rockfm_tmp_rs.each(function (i) {
                           $(this).rating('destroy');
                      });
                }
             // var html_backend=$(".uiform-preview-base").html();
              
              if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  $('.uiform-main-form').find('.uifm-input-ratingstar').each(function (i) {
                           rocketform.input9settings_updateField($(this).closest('.uiform-field'),'input9')
                      });
                }
                 
                this.refreshPreviewSection_process();
                
//clean tooltip
               $('.sfdc-tooltip').hide();
             };

             arguments.callee.refreshPreviewSectionFromData=function (){
                                
                 rocketform.loading_panelbox2(1);
                 //rocketform.saveform_cleanForm();
        /*hide highlighted fields*/
         /*highlight field boxes*/
        if($(document).find('.uifm-highlight-edited')){
            $(document).find('.uifm-highlight-edited').removeClass('uifm-highlight-edited');
        }
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').prop('checked',false);
        $('.uiform-main-form .uiform-fields-qopt-select input:checked').closest('.uiform-fields-quick-options').removeCss('display');
        this.closeSettingTab();
        //show loader
        rocketform.showLoader(2,true,true);
        
        var steps=this.getUiData('num_tabs');
        var tab_content={}, 
            tab_titles={},
            tabcontent_tmp,
            tabtitle_tmp;
       var var_steps_src=this.getUiData('steps_src');     
       /*get layout order*/
        if(parseInt(steps)>0){
            $.each(var_steps_src, function(i, value) {
                    /*generating for each step*/
                    tabcontent_tmp={};
                    tabcontent_tmp.content=rocketform.getLayoutFormByStep(i);
                    tab_content[i]=tabcontent_tmp;
                    //get title tabs
                   /* tabtitle_tmp={};
                    tabtitle_tmp.title='';
                    tab_titles[i]=tabtitle_tmp;*/ 
                });
        }
       this.setUiData2('steps','tab_cont',tab_content);
       

        //save tabs content
        //this.saveTabContent();
       
         
        /*problem on form data variable when sending data, fixed putting on last */
                /*destroing rating star*/
               if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  var rockfm_tmp_rs=$('.uiform-main-form').find('.uifm-input-ratingstar');
                  rockfm_tmp_rs.each(function (i) {
                           $(this).rating('destroy');
                      });
                }
             // var html_backend=$(".uiform-preview-base").html();
              
              if(parseInt($('.uiform-main-form').find('.uifm-input-ratingstar').length)!=0){
                  $('.uiform-main-form').find('.uifm-input-ratingstar').each(function (i) {
                           rocketform.input9settings_updateField($(this).closest('.uiform-field'),'input9')
                      });
                }
                
                this.refreshPreviewSection_process();
                
               //clean tooltip
               $('.sfdc-tooltip').hide();
             };
             
arguments.callee.form_getcode=function (form_id){
                  
                 
                        
                $.ajax({
                        type: 'POST',
                        url: rockfm_vars.uifm_siteurl+"formbuilder/forms/getcode",
                        data: {
                        'action': 'rocket_fbuilder_modal_form_getshorcodes',
                        'page':'zgfm_form_builder',
                        'zgfm_security':uiform_vars.ajax_nonce,
                        'form_id':form_id,
                            'csrf_field_name':uiform_vars.csrf_field_name
                            },
                        beforeSend: function() {
                                     $( "#uifm_modal_msg .sfdc-modal-body" ).html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
                                    },    
                        success: function(response) {
                             var arrJson = JSON && JSON.parse(response) || $.parseJSON(response);
                            $('#uifm_modal_msg').sfdc_modal('show');
                            $('#uifm_modal_msg .sfdc-modal-title').html(arrJson.html_title);
                            $('#uifm_modal_msg .sfdc-modal-body').html(arrJson.html);
                                 
                             
                        }
                    });        
                        
                        
                        
             };
             arguments.callee.modal_close=function (){
                $('#modaltemplate').sfdc_modal('hide');
             };

             arguments.callee.formvariables_genListToIntMem=function (){
                 rocketform.formvariables_generateTable();
                 return;
                 
                 
                 if(!rocketform.getInnerVariable('form_rec_vars')){
                     rocketform.setInnerVariable('form_rec_vars',[]);
                 }
                 
                 /*clean main data*/  
                        if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                            $.each(mainrformb['steps_src'], function(index3, value3) {
                              $.each(value3, function(index4, value4) {
                                    if(parseInt($('#'+index4).length)!=0){
                                       switch(parseInt(value4['type'])){
                                            case 6:case 7:case 8:case 9:case 10:case 11:case 12:case 13:case 15:
                                            case 16:case 17:case 18:case 21:case 22:case 23:case 24:case 25:case 26:case 28:case 29:case 30:case 40:case 41:case 42: case 43:
                                              rocketform.formvariables_addTolist(value4['id']);
                                            break;
                                        } 
                                    } 
                                }); 
                          });  
                        }
             
              
             };
             arguments.callee.formvariables_addTolist=function (value){
                 var temp;
                temp=this.getInnerVariable('form_rec_vars');
                if ($.inArray(value,temp)==-1) temp.push(value);
                this.setInnerVariable('form_rec_vars',temp);
                rocketform.formvariables_generateTable();
             };
             arguments.callee.formvariables_removeFromlist=function (id){
                 var temp;
                temp=this.getInnerVariable('form_rec_vars');
                var removeItem = id;
                temp = $.grep(temp, function(value) {
                    return value != removeItem;
                    });
                this.setInnerVariable('form_rec_vars',temp);
                rocketform.formvariables_generateTable();
             };
             arguments.callee.formvariables_generateTable=function (){
                 var id=$('#uifm_frm_main_id').val();

                //process fonts for fields
                 var tmp_frm = mainrformb;

                 $.ajax({
                                         type: 'POST',
                                         url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_variables_emailpage",
                                         data: {
                                             'action': 'rocket_fbuilder_variables_emailpage',
                                             'page':'zgfm_form_builder',
                                             'zgfm_security':uiform_vars.ajax_nonce,
                                             'form_id':id,
                                             'form_data':encodeURIComponent(JSON.stringify(tmp_frm)),
                                             'csrf_field_name':uiform_vars.csrf_field_name
                                             },
                                         success: function(msg) {
                                             $('#uiform-form-mailset-vars-tab-1 .uifm-tab-inner-vars-1').html(msg.message); 
                                         }
                                     });
             };
             
             arguments.callee.formvariables_findFieldName=function (id){
               var tmpval='';
               dance:
               for( var i in mainrformb['steps_src'] ) {
                        for( var j in mainrformb['steps_src'][i] ) {
                            if(String(mainrformb['steps_src'][i][j].id)===String(id)){
                                tmpval=mainrformb['steps_src'][i][j].field_name;
                                 break dance;
                               }
                        }
              }
              return tmpval; 
             };
             
             arguments.callee.formvariables_findFieldType=function (id){
               var tmpval='';
               dance:
               for( var i in mainrformb['steps_src'] ) {
                        for( var j in mainrformb['steps_src'][i] ) {
                            if(String(mainrformb['steps_src'][i][j].id)===String(id)){
                                tmpval=mainrformb['steps_src'][i][j].type;
                                 break dance;
                               }
                        }
              }
              return tmpval; 
             };
             
             arguments.callee.fieldsdata_email_genListToIntMem=function (){
                
                 rocketform.setInnerVariable('form_vars_fields_emailval',[]);
                 /*clean main data*/  
                        if(parseInt($.map(mainrformb['steps_src'], function(n, i) { return i; }).length)!=0){
                            $.each(mainrformb['steps_src'], function(index3, value3) {
                              $.each(value3, function(index4, value4) {
                                    if(parseInt($('#'+index4).length)!=0){
                                       switch(parseInt(value4['type'])){
                                            case 6:case 28:case 29:case 30:
                                                    if(parseInt(value4['validate']['typ_val'])===4){
                                                        rocketform.fieldsdata_email_addTolist(value4['id']);
                                                    }
                                            break;
                                        } 
                                    } 
                                }); 
                          });  
                        }  
                 //for customer area       
                 rocketform.customeremail_generateHtml();        
                 
                 //for admin email
                 
                 rocketform.adminemail_generateHtml();      
             };
             arguments.callee.fieldsdata_email_addTolist=function (value){
                 /*if(!rocketform.getInnerVariable('form_vars_fields_emailval')){
                   rocketform.setInnerVariable('form_vars_fields_emailval',[]);  
                 }*/
                
                var temp;
                temp=this.getInnerVariable('form_vars_fields_emailval');
                if ($.inArray(value,temp)==-1) temp.push(value);
                this.setInnerVariable('form_vars_fields_emailval',temp);
               
             };
             arguments.callee.customeremail_generateHtml=function (){
                
                $('#uifm_frm_email_usr_recipient').html('');
                 $('#uifm_frm_email_usr_recipient').append('<option value="">'+$('#uifm_frm_email_usr_recipient').attr('data-uifm-firstoption')+'</option>');
                
                var temp=this.getInnerVariable('form_vars_fields_emailval');
               
                $.each(temp, function(index, value) {
                     $('#uifm_frm_email_usr_recipient').append('<option value="'+value+'">'+rocketform.formvariables_findFieldName(value)+'</option>'); 
                });
                
                //assign value
                var customermail = rocketform.getUiData2('onsubm','mail_usr_recipient');
                 
                if(parseInt($("#uifm_frm_email_usr_recipient option[value='"+customermail+"']").length) > 0){
                    $("#uifm_frm_email_usr_recipient").val(customermail);
                }else{
                    $("#uifm_frm_email_usr_recipient").val("");
                    rocketform.setUiData2('onsubm','mail_usr_recipient',"");
                }
                 
             };
             
              arguments.callee.adminemail_generateHtml=function (){
                
                $('#uifm_frm_email_replyto').html('');
                 $('#uifm_frm_email_replyto').append('<option value="">'+$('#uifm_frm_email_replyto').attr('data-uifm-firstoption')+'</option>');
                
                var temp=this.getInnerVariable('form_vars_fields_emailval');
               
                $.each(temp, function(index, value) {
                     $('#uifm_frm_email_replyto').append('<option value="'+value+'">'+rocketform.formvariables_findFieldName(value)+'</option>'); 
                });
                
                //assign value
                var customermail = rocketform.getUiData2('onsubm','mail_replyto');
                 
                if(parseInt($("#uifm_frm_email_replyto option[value='"+customermail+"']").length) > 0){
                    $("#uifm_frm_email_replyto").val(customermail);
                }else{
                    $("#uifm_frm_email_replyto").val("");
                    rocketform.setUiData2('onsubm','mail_replyto',"");
                }
                 
             };
             
             arguments.callee.clogicgraph_popup=function (){
                 $( "#uiform-clogicgraph" ).dialog( "open" ); 
                  
                  $.ajax({
                        type: 'POST',
                        url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_preview_clogic_graph",
                        data: {
                        'action': 'rocket_fbuilder_preview_clogic_graph',
                        'page':'zgfm_form_builder',
                       'csrf_field_name':uiform_vars.csrf_field_name,
                        'zgfm_security':uiform_vars.ajax_nonce,
                        'form_data':encodeURIComponent(JSON.stringify(mainrformb)) 
                            },
                        beforeSend: function() {
                                     $( "#uiform-clogicgraph" ).html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
                                    },    
                        success: function(response) {
                             var arrJson = JSON && JSON.parse(response) || $.parseJSON(response);
                             $( "#uiform-clogicgraph" ).html(arrJson.html);
                        }
                    });
                  
                  
                 
                  
             };
            
                                                                                                                                                                    
    /**
     * Load settings of field
     *
     * @since 1
     * @access private
     * @method loadFieldSettingTab
     */          
    arguments.callee.loadFieldSettingTab = function (tmp_fld_load) {
        try{
            var block;
            
           var id=tmp_fld_load['id'];
           var type=tmp_fld_load['typefield'];
           var step_pane=tmp_fld_load['step_pane'];
           var addt=tmp_fld_load['addt'];
           var oncreation=tmp_fld_load['oncreation']||false;
           
           var field_vars=[];
           field_vars['oncreation']=oncreation;
           //field_vars['onprocess']=true;
           
            //show modal
            //load data on modal
            if(false){
                rocketform.fields_showModalOptions();
            }
             
             /*add loading on setting  tab*/
            rocketform.loading_boxField("zgfm-panel-right-field-tabopt",1);
            
            //add load flag on tab
            $('#uiform-build-field-tab').addClass('zgfm-fieldtab-flag-loading');
                            
             switch (parseInt(type)) {
                                                case 1:
                                                case 2:
                                                case 3:
                                                case 4:
                                                case 5:
                                                    //grid system
                                                    
                                                  block=(addt)?addt['block']:0;
                                                 
                                                     
                                                     
                                                    break;
                                               
                                                default: 
                                                    block=0;
                                            }  
             
             //fast load of field options
             var tmp_fast_load=uiform_vars.fields_fastload;
             if(parseInt(tmp_fast_load)===1){
                 var tmp_get_fieldOption;
                 switch (parseInt(type)) {
                                                case 1:
                                                case 2:
                                                case 3:
                                                case 4:
                                                case 5:
                                                case 8:
                                                case 9:
                                                case 10:
                                                case 11:    
                                                    //grid system
                                                
                                                     tmp_get_fieldOption = wp.template("zgfm-field-opt-type-"+type);
                                                    break;
                                                
                                                default:
                                                case 6:    
                                                    tmp_get_fieldOption = wp.template("zgfm-field-opt-type-6");
                                            } 
                 
                 
                 
                 
                 
                 let tmp_gfld = $("<div/>").html(tmp_get_fieldOption()).text();
                 
                 
                 //module when is premium
                 let tmp_arr;
                 if(parseInt(uiform_vars.app_is_lite) === 0){
                     tmp_arr={
                     "modal_body":tmp_gfld,
                     "field_id":id,
                     "field_type":type,
                     "field_block":block,
                     "addons":["func_anim"]
                    };  
                 } else{
                     tmp_arr={
                     "modal_body":tmp_gfld,
                     "field_id":id,
                     "field_type":type,
                     "field_block":block,
                     "addons":[]
                    }; 
                 }
                 //load data on tab 
                 //$('#uiform-build-field-tab').html(tmp_gfld);
                 
                 zgfm_back_fld_options.load_on_selecteField(tmp_fld_load,tmp_arr);
                 
             }else{
                $.ajax({
                                type: 'POST',
                                url: rockfm_vars.uifm_siteurl+"formbuilder/fields/ajax_field_option",
                                data: {
                                    'action': 'rocket_fbuilder_field_options',
                                    'page':'zgfm_form_builder',
                                    'csrf_field_name':uiform_vars.csrf_field_name,
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'field_id':id,
                                    'field_type':type,
                                    'field_block':block,
                                    },
                                success: function(msg) {
                                    
                                    zgfm_back_fld_options.load_on_selecteField(tmp_fld_load,msg);
                                    
                                }
                            });
             }
             
             
            // var My_New_Global_Settings =  tinyMCEPreInit.mceInit.content;
           
                             
        }/* end try*/
        catch (ex) {
            console.error(" error loadFieldSettingTab ", ex.message);
        }

    };
    
    /**
     * remove tinyMceEvent
     *
     * @since 1
     * @access private
     * @method init_tinymceEvent
     */ 
      arguments.callee.tinymceEvent_removeInst =function(){
          
          var editor;
          if($('#uiform-build-field-tab').find('#uifm_fld_msc_text')){
               if ( typeof tinyMCE != 'undefined') {
                                             editor = tinyMCE.get("uifm_fld_msc_text");
                                            if(editor){
                                               editor.remove(); 
                                            }
                                       }
          }
          
           if($('#uiform-build-field-tab').find('#uifm_fld_price_lbl_format')){
               if ( typeof tinyMCE != 'undefined') {
                                             editor = tinyMCE.get("uifm_fld_price_lbl_format");
                                            if(editor){
                                               editor.remove(); 
                                            }
                                       }
          }
          
          if($('#uiform-build-field-tab').find('#uifm_fld_inp3_html')){
              if ( typeof tinyMCE != 'undefined') {
                                             editor = tinyMCE.get("uifm_fld_inp3_html");
                                            if(editor){
                                               editor.remove(); 
                                            }
                                       }
          }
        
         if($('#uiform-build-field-tab').find('#uifm_frm_inp18_txt_cont')){
              if ( typeof tinyMCE != 'undefined') {
                                             editor = tinyMCE.get("uifm_frm_inp18_txt_cont");
                                            if(editor){
                                               editor.remove(); 
                                               
                                            }
                                       }
          }
         
      }
    
     /**
     * Init tinyMceEvent
     *
     * @since 1
     * @access private
     * @method init_tinymceEvent
     */ 
      arguments.callee.tinymceEvent_init =function(){
           /*this process is not needed in php scripts*/
          return;
                             var wpTxtContainer
                                  /*tinymce init*/
                               if($('#uiform-build-field-tab').find('#uifm_fld_msc_text')){
                                    wpTxtContainer="uifm_fld_msc_text";
                           
                                refEditor = tinyMCEPreInit.mceInit['zgpbrefeditor'],editorProps  = null;

                                if(typeof tinymce != 'undefined') {
                                         
                                                editorProps = tinymce.extend({}, refEditor);
                                                editorProps.selector = '#' + wpTxtContainer;
                                                editorProps.body_class = editorProps.body_class.replace('zgpbrefeditor', wpTxtContainer);
                                                tinyMCEPreInit.mceInit[wpTxtContainer] = editorProps;
                                                tinymce.init(editorProps);
                                        }               
                                 if(typeof quicktags != 'undefined') {                
                                                quicktags({id : wpTxtContainer});
                                                QTags._buttonsInit();
                                        } 
                                  window.wpActiveEditor = wpTxtContainer;
                               }   
                               
                               if($('#uiform-build-field-tab').find('#uifm_fld_inp3_html')){
                                    wpTxtContainer="uifm_fld_inp3_html";
                           
                                refEditor = tinyMCEPreInit.mceInit['zgpbrefeditor'],editorProps  = null;

                                if(typeof tinymce != 'undefined') {
                                         
                                                editorProps = tinymce.extend({}, refEditor);
                                                editorProps.selector = '#' + wpTxtContainer;
                                                editorProps.body_class = editorProps.body_class.replace('zgpbrefeditor', wpTxtContainer);
                                                tinyMCEPreInit.mceInit[wpTxtContainer] = editorProps;
                                                tinymce.init(editorProps);
                                        }               
                                 if(typeof quicktags != 'undefined') {                
                                                quicktags({id : wpTxtContainer});
                                                QTags._buttonsInit();
                                        } 
                                  window.wpActiveEditor = wpTxtContainer;
                               } 
                               
                               
                           /*tinymce end init*/
    }
    
           /**
     * Check integrity of tinymce
     *
     * @since 1
     * @access private
     * @method checkIntegrityTinyMCE
     */           
   arguments.callee.checkIntegrityTinyMCE = function (type) {
        
        var status=false;
        try {
         
            var rich = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
            if(rich){
                status=true;
            }
            
            
            return status;
        }
        catch(err) {
            console.log('error handled - checkIntegrityTinyMCE : '+err.message);
            return false;
        } 
        
    };
    
     /**
     * fields_events_bswitch
     *
     * @since 1
     * @access private
     * @method fields_events_bswitch
     */          
    arguments.callee.fields_events_bswitch = function (tab) {
        try{
             /*bootstrap switch*/
            $('.switch-field').bootstrapSwitchZgpb();
            $('.uifm-inp15-fld').bootstrapSwitchZgpb();
            
             $('#uiform-build-field-tab .switch-field').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
                var f_id= $('#uifm-field-selected-id').val();
                 var store=$( this ).data('field-store');
                 var f_store=store.split("-");
                 var f_sec=f_store[0];
                 var f_opt=f_store[1];
                 var f_val=(state)?1:0;
                 var f_step;
                 var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                 if(parseInt(field_Checked.length)>1){

                       obj_field= field_Checked.closest('.uiform-field');
                      $.each(obj_field, function(index2, value2) {
                         f_id=$(this).attr('id');
                         f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                         rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                         if($(this)){
                         rocketform.setDataOptToPrevField($(this),store,f_val);
                         } 
                      });

                 }else{
                     
                     f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                      
                     rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                     var obj_field= $('#'+f_id);
                     if(obj_field){
                     rocketform.setDataOptToPrevField(obj_field,store,f_val);
                     } 
                 }


             });
            
        }/* end try*/
        catch (ex) {
            console.error(" error fields_events_bswitch ", ex.message);
        }

    };
    
     /**
     * fields_events_spinner
     *
     * @since 1
     * @access private
     * @method fields_events_spinner
     */          
    arguments.callee.fields_events_spinner = function (tab) {
        try{
          
    
      
      $(".uifm_fld_inp4_spinner").TouchSpin({
        verticalbuttons: true,
        min: -1000000000,
        max: 1000000000,
        decimals: 3,
        step: 0.001,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });   
     $(".uifm_fld_inp6_spinner").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 5,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    }); 
    $(".uifm_fld_inp2_stl1").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 100,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    
    
    
   $(".uifm_fld_input16_spinner").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 200,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    
   
  
    $(".uifm_fld_inp17_thopt_spinner").TouchSpin({
        verticalbuttons: true,
        min: 35,
        max: 1000,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    $(".uifm_fld_inp17_thopt_spinner_2").TouchSpin({
        verticalbuttons: true,
        min: 50,
        max: 1000,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
    
     $(".uifm_fld_inp4_spinner,.uifm_fld_inp6_spinner,.uifm_fld_inp4_spinner,.uifm_fld_input16_spinner,.uifm_fld_inp2_stl1").on("change", function(e) {
            var f_id= $('#uifm-field-selected-id').val();
            var store=$(e.target).data('field-store');
            var f_store=store.split("-");
            var f_sec=f_store[0];
            var f_opt=f_store[1];
            var f_val=$(e.target).val();
            var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');   
            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
            var obj_field= $('#'+f_id);
            if(obj_field){
            rocketform.setDataOptToPrevField(obj_field,store,f_val);
            }   
        });
    
            
        }/* end try*/
        catch (ex) {
            console.error(" error fields_events_spinner ", ex.message);
        }

    };
    
     /**
     * fields_events_general
     *
     * @since 1
     * @access private
     * @method fields_events_general
     */          
    arguments.callee.fields_events_general = function (tab) {
        try{
            //cleaning textarea
            $('#uiform-build-field-tab .uifm_tinymce_obj').html('');
            
             
             tinymce.init({
                selector: '.uifm_tinymce_obj',
                theme: "modern",
                menubar: false,
                height: 200,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media contextmenu paste code'
                ],
                relative_urls : false,
                remove_script_host : false,
                convert_urls : true,
                browser_spellcheck : true ,
                verify_html: false,
                codemirror: {
                indentOnInit: true, // Whether or not to indent code on init.
                path: 'CodeMirror'
                },
                image_advtab: true,
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| image | media | link unlink anchor | forecolor backcolor | print preview code | youtube | qrcode | flickr | picasa ",
                file_browser_callback : elFinderBrowser,
                setup: function (ed) {
                        ed.on('change KeyUp', function(e) {
                            rocketform.captureEventTinyMCE(ed,e);
                        });
                    }
                });
            
            //refresh font menu
             uiformRefreshFontMenu();
           
            jQuery("#uiform-build-field-tab select.sfm").chosen().change(function(){
                
                 
                     var font_sel=jQuery(this).data('stylesFontMenu').uifm_preview_font_change();
                        var f_id= $('#uifm-field-selected-id').val();
                        var store=$( this ).data('field-store');
                        var f_store=store.split("-");
                        var f_sec=f_store[0];
                        var f_opt=f_store[1];
                        var f_val=JSON.stringify(font_sel);
 
                        var f_step;
                    var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                    if(parseInt(field_Checked.length)>1){
                        if(f_val){
                          obj_field= field_Checked.closest('.uiform-field');
                         $.each(obj_field, function(index2, value2) {
                            f_id=$(this).attr('id');
                            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                            if($(this)){
                            rocketform.setDataOptToPrevField($(this),store,f_val);
                            }
                         });
                        }  
                    }else{
                        f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                        rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                        var obj_field= $('#'+f_id);
                        if(obj_field){
                        rocketform.setDataOptToPrevField(obj_field,store,font_sel.family);
                        }
                    }
            });
            
              $('#uiform-build-field-tab select.sfm').change( function(){
                   
   
        });
            
            //icon picker
            $('button[role="iconpicker"],div[role="iconpicker"]').iconpicker();
            
            /*field name*/
    $(document).on( "change keyup focus keypress", "#uifm_fld_main_fldname", function(e) {
        //if(e) { e.stopPropagation(); e.preventDefault();}
        var fldname=$('#uifm_fld_main_fldname').val();
        var pickfield = $('#uifm-field-selected-id').val();
        var f_step = $('#'+pickfield).closest('.uiform-step-pane').data('uifm-step');
        rocketform.fieldsetting_updateName(f_step,pickfield,fldname);
    });
        
             /*form variables*/
     $('#uifm_fld_main_fldname').blur( function() {
            rocketform.formvariables_generateTable();
            /*customer client select*/
            rocketform.customeremail_generateHtml();
        });
            
              /*checkbox buttons groups*/
     $(".uifm-fld-val-opts .sfdc-btn-group > .sfdc-btn[data-settings-option='group-checkboxes']").click(function(){
        var element = $(this);
        var parent_val=element.parent().parent();
            var valbox;
            
             var f_id= $('#uifm-field-selected-id').val();
                var store=$( this ).data('field-store');
                var f_store=store.split("-");
                var f_sec=f_store[0];
                var f_opt=f_store[1];
               var f_val;
                var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
            
            if(!element.hasClass('sfdc-active')){
                
                //restore
                $('.uifm-custom-validator').hide();
                parent_val.find('.uifm-f-setoption-gchecks').not(element).removeClass('sfdc-active');
                //end restore
                 
                /*element.removeClass(function(){
                return $(this).data("toggle-disable")
                }).addClass(function(){
                    //return $(this).data("toggle-enable");
                    return "sfdc-active"
                });*/
                
                element.addClass('sfdc-active');
                
                valbox=element.data("field-select-box");
                $('.'+valbox).show();
                
                f_val=parseInt($(this).data("field-value"));
                
            }else{
                
               /* element.removeClass(function(){
               // return $(this).data("toggle-enable")
                return "sfdc-active"
                }).addClass(function(){
                    return $(this).data("toggle-disable")
                });*/
                element.removeClass('sfdc-active');
                
                valbox=element.data("field-select-box");
                $('.'+valbox).hide();
                 f_val=0;
            }
            //adding value to core data
               
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                var obj_field= $('#'+f_id);
                if(obj_field){
                rocketform.setDataOptToPrevField(obj_field,store,f_val);
                }
               
    });
     /*radio buttons groups*/
    $(".sfdc-btn-group > .sfdc-btn[data-settings-option='group-radiobutton']").click(function(e){
         
       
        var element = $(this),
            parent = element.parent();
            parent.children(".sfdc-btn[data-toggle-enable]").removeClass(function(){
               // return $(this).data("toggle-enable")
                return "sfdc-active"
            }).addClass(function(){
                //return $(this).data("toggle-disable")
                return ""
            }).children("input").prop('checked', false);
            //element.removeClass($(this).data("toggle-disable")).addClass(element.data("toggle-enable"));
            element.addClass("sfdc-active");
            
            element.children("input").prop('checked', true);
            /*if(element.children("input").is(":checked")){
                 
            }else{
                
            }*/
    });
    
    /*text editor */
       $(document).on( "keyup focus", '#uifm_fld_msc_text,#uifm_fld_inp3_html,#uifm_fld_price_lbl_format,#uifm_frm_inp18_txt_cont', function(e) {
        rocketform.captureEventTinyMCE2(e);
    });
     
       $(document).on( "click", ".uifm-f-setoption-btn", function(e) {
           if(e) { e.stopPropagation(); e.preventDefault();}
           
          
        var f_id= $('#uifm-field-selected-id').val();
        var store=$( this ).data('field-store');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=$( this ).find('input').val();
        var f_step;
        var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
        
        if(parseInt(field_Checked.length)>1){
             obj_field= field_Checked.closest('.uiform-field');   
             $.each(obj_field, function(index2, value2) {
                f_id=$(this).attr('id');
                f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                if($(this)){
                rocketform.setDataOptToPrevField($(this),store,f_val);
                }
             });
            
        }else{
            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
            
            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
            var obj_field= $('#'+f_id);
            if(obj_field){
            rocketform.setDataOptToPrevField(obj_field,store,f_val);
            }  
        }

    });
    
     /*fields - status*/
    $(document).on( "change", "#uiform-build-field-tab .uifm-f-setoption-st", function(e) {
        if(e) { e.stopPropagation(); e.preventDefault();}
        var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
       var f_id= $('#uifm-field-selected-id').val();
            var store=$( this ).data('field-store');
            var f_store=store.split("-");
            var f_sec=f_store[0];
            var f_opt=f_store[1];
            var f_val=$( this ).is(':checked');
            f_val=(f_val)?1:0;
            var f_step;
           
       if(parseInt(field_Checked.length)>1){
             obj_field= field_Checked.closest('.uiform-field'); 
             
             $.each(obj_field, function(index2, value2) {
                f_id=$(this).attr('id');
                f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                if($(this)){
                    rocketform.setDataOptToPrevField($(this),store,f_val);
                    }
             });     
        }else{
            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
            var obj_field= $('#'+f_id);
            if(obj_field){
            rocketform.setDataOptToPrevField(obj_field,store,f_val);
            } 
        }
    });
    
     /* options - picking from setting tab*/
    $(document).on( "change keyup", ".uifm-f-setoption", function(e) {
        if(e) { e.stopPropagation(); e.preventDefault();}
        var f_id= $('#uifm-field-selected-id').val();
            var store=$( this ).data('field-store');
            var f_store=store.split("-");
            var f_sec=f_store[0];
            var f_opt=f_store[1];
            var f_val=$( this ).val();
            var f_step;
         var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
       if(parseInt(field_Checked.length)>1){
            
             obj_field= field_Checked.closest('.uiform-field'); 
             
             $.each(obj_field, function(index2, value2) {
                f_id=$(this).attr('id');
                f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                if($(this)){
                    rocketform.setDataOptToPrevField($(this),store,f_val);
                    }
             });     
        }else{
            
           f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
           rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
           var obj_field= $('#'+f_id);
           if(obj_field){
               
            rocketform.setDataOptToPrevField(obj_field,store,f_val);
           }
        }
    });
    
     /*select, checkbox type changer*/  
      $("#uifm_fld_inp2_style_type").on("change", function(e) {
            var f_val=$(e.target).val();
             switch(parseInt(f_val)){
                 case 1:
                     $('.uifm-set-section-input2-stl1').show();
                     break;
                 default:
                     $('.uifm-set-section-input2-stl1').hide();
                     
             }
            //rocketform.wizardtab_changeTheme(f_val);
        });
    
    
    $(document).on( "change keyup", ".uifm-f-setoption-font", function(e) {
        
        if(e) { e.stopPropagation(); e.preventDefault();}
        
        var f_id= $('#uifm-field-selected-id').val();
            var store=$( this ).parent().find('select').data('field-store');
            var f_store=store.split("-");
            
            var f_sec=f_store[0];
            var f_opt=f_store[1];
            var f_val=$( this ).val();
           
            var f_step;
         var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
       if(parseInt(field_Checked.length)>1){
            
             obj_field= field_Checked.closest('.uiform-field'); 
             
             $.each(obj_field, function(index2, value2) {
                f_id=$(this).attr('id');
                f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                if($(this)){
                    rocketform.setDataOptToPrevField($(this),store,f_val);
                    }
             });     
        }else{
           f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
           rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
           var obj_field= $('#'+f_id);
           if(obj_field){
            rocketform.setDataOptToPrevField(obj_field,store,f_val);
           }
        }
    });
    
    
      /* text with input groups*/
    $(".sfdc-input-group-btn > .sfdc-btn").click(function(){
         var element = $(this),
             input=element.find('input');
         if(parseInt(input.val())===0){
            element.addClass('sfdc-active');
            input.val(1);
         }else{
            element.removeClass('sfdc-active'); 
            input.val(0);
         }
    });
    
     /*action for background color*/
    $('#uifm_fld_elbg_type_1').on('click', function () {
        $('#uifm_fld_elbg_color_1').closest('.sfdc-row').show();
        $('#uifm_fld_elbg_color_2').closest('.sfdc-row').hide();
        $('#uifm_fld_elbg_color_3').closest('.sfdc-row').hide();
    });
    $('#uifm_fld_elbg_type_2').on('click', function () {
        $('#uifm_fld_elbg_color_1').closest('.sfdc-row').hide();
        $('#uifm_fld_elbg_color_2').closest('.sfdc-row').show();
        $('#uifm_fld_elbg_color_3').closest('.sfdc-row').show();
    });
    
      $('#uifm_fld_val_reqicon_img,#uifm_fld_inp2_stl1_icmark').on('change', function(e) { 
          if(e) { e.stopPropagation(); e.preventDefault();}
        var f_id= $('#uifm-field-selected-id').val();
        var store=$( this ).data('field-store');
        var f_store=store.split("-");
        var f_sec=f_store[0];
        var f_opt=f_store[1];
        var f_val=e.icon;
        var f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
        rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
        var obj_field= $('#'+f_id);
         if(obj_field){
         rocketform.setDataOptToPrevField(obj_field,store,f_val);
         }
    });
    
    /*icon picker*/
   // $('button[role="iconpicker"]').iconpicker();
    
    /*clogic event button*/
     $('#uifm_frm_clogic_st').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
        var f_val=(state)?1:0;
        if(f_val===1){
            $('#uifm-show-conditional-logic').show();
        }else{
           $('#uifm-show-conditional-logic').hide(); 
        }
    });
      /* tooltip*/       
     $('[data-toggle="tooltip"]').tooltip({container: "body"});  
    
     var setfield_tab_active;
    /*double declaration*/
    
    $('.uiform-set-options-tabs ul.sfdc-nav-tabs').on('shown.bs.sfdc-tab', function (e) {
        //not using stop propagation because I need those action work together
        //if(e) { e.stopPropagation(); e.preventDefault();}
        //e.target // activated tab
        //e.relatedTarget // previous tab
        setfield_tab_active = $(e.target).data('uifm-title'); 
         
        rocketform.setInnerVariable('setfield_tab_active',setfield_tab_active);
        rocketform.previewfield_hidePopOver();
        })
    $('.uiformc-menu-wrap ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"],.uiform-set-options-tabs ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
        //e.target // activated tab
        //e.relatedTarget // previous tab
        /* hide popover and tooltips when changing tabs*/
       
        if(!$(e.target).hasClass('uifm-tab-fld-validation')){
          
            $('.sfdc-popover').popover('hide');
            
        }
        
        });
    
    $('.uiformc-menu-wrap ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"],.uiform-set-options-tabs ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
        //not using stop propagation because I need those action work together
        //if(e) { e.stopPropagation(); e.preventDefault();}
        //e.target // activated tab
        //e.relatedTarget // previous tab
        /* hide popover and tooltips when changing tabs*/
        setfield_tab_active = $(e.target).data('uifm-title'); 
         
         if(String(setfield_tab_active)==='helpb'){
             rocketform.setInnerVariable('setfield_tab_active',setfield_tab_active);
             
             var id=$('#uifm-field-selected-id').val();
            // var step=$('#'+id).closest('.uiform-step-pane').data('uifm-step');  
             rocketform.previewfield_elementTextarea($('#'+id),"help_block");
             
         }else{
            zgfm_back_helper.tooltip_removeall();
         }
           
        });
    
     /*selects*/
      $('.uifm_field_font_selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
        });
    
    
        }/* end try*/
        catch (ex) {
            console.error(" error fields_events_general ", ex.message);
        }

    };
    
    
     /**
     * fields2_events_cpicker
     *
     * @since 1
     * @access private
     * @method fields_events_cpicker
     */          
    arguments.callee.fields2_events_cpicker = function(tab){
        
       if(tab.find('.zgpb-custom-color').data("colorpicker")){
         
        }else{

            tab.find('.zgpb-custom-color').colorpicker();

            tab.find('.zgpb-custom-color').colorpicker().on('changeColor', function(ev){
               
               var f_store=$( this ).data('field-store');
               var f_val=$(this).find('input').val();
               
               rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);


            });    


         } 
   }
    
    /**
     * fields_events_cpicker
     *
     * @since 1
     * @access private
     * @method fields_events_cpicker
     */          
    arguments.callee.fields_events_cpicker = function (tab) {
        try{
            
            /*color picker*/
            tab.find('.uifm-custom-color').colorpicker(); 
            
            $('#uiform-build-field-tab .uifm-custom-color').colorpicker().on('changeColor', function(ev){
                    var f_id= $('#uifm-field-selected-id').val();
                    var store=$( this ).data('field-store');
                    var f_store=store.split("-");
                    var f_sec=f_store[0];
                    var f_opt=f_store[1];
                    var f_val=$(this).find('input').val();
                    var f_step;
                    var obj_field;
                    var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                    if(parseInt(field_Checked.length)>1){

                        if(f_val){
                          obj_field= field_Checked.closest('.uiform-field');

                         $.each(obj_field, function(index2, value2) {
                            f_id=$(this).attr('id');
                            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                            if($(this)){
                            rocketform.setDataOptToPrevField($(this),store,f_val);
                            }
                         });
                        }  
                    }else{

                        if(f_val){
                         f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                             obj_field= $('#'+f_id);
                            if(obj_field){
                            rocketform.setDataOptToPrevField(obj_field,store,f_val);
                            } 
                        }  
                    }


                });
            
        }/* end try*/
        catch (ex) {
            console.error(" error fields_events_cpicker ", ex.message);
        }

    };
    
    
    /**
     * fields_events_select
     *
     * @since 1
     * @access private
     * @method fields_events_select
     */          
    arguments.callee.fields_events_select = function (tab) {
        try{
              /*selects*/
            tab.find('.uifm_selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
              });
            tab.find('.selectpicker').selectpicker();

              }/* end try*/
              catch (ex) {
                  console.error(" error fields_events_cpicker ", ex.message);
              }

    };
    
    /**
     * fields_events_slider
     *
     * @since 1
     * @access private
     * @method fields_events_slider
     */          
    arguments.callee.fields_events_slider = function (tab) {
        try{
            
              /*bootstrap */
                tab.find('.uiform-opt-slider').bootstrapSlider();
            
            
                 $("#uiform-build-field-tab .uiform-opt-slider").on('slide', function(slideEvt) {
        
                    var f_id= $('#uifm-field-selected-id').val();
                    var store=$( this ).data('field-store');
                    var f_store=store.split("-");
                    var f_sec=f_store[0];
                    var f_opt=f_store[1];
                    var f_val=slideEvt.value;
                    var f_step;
                    var field_Checked=$('.uiform-main-form .uiform-fields-qopt-select input:checked');
                    if(parseInt(field_Checked.length)>1){
                         obj_field= field_Checked.closest('.uiform-field');
                         $.each(obj_field, function(index2, value2) {
                            f_id=$(this).attr('id');
                            f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                            rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                            if($(this)){
                                rocketform.setDataOptToPrevField($(this),store,f_val);
                                } 
                         });

                    }else{
                        f_step=$('#'+f_id).closest('.uiform-step-pane').data('uifm-step');
                        rocketform.setDataOptToCoreData(f_step,f_id,store,f_val);
                        var obj_field= $('#'+f_id);
                        if(obj_field){
                        rocketform.setDataOptToPrevField(obj_field,store,f_val);
                        }  
                    }

                });
        }/* end try*/
        catch (ex) {
            console.error(" error fields_events_slider ", ex.message);
        }

    };
    
    
    /**
     * fields2_events_slider
     *
     * @since 1
     * @access private
     * @method fields_events_slider
     */          
    arguments.callee.fields2_events_bswitch = function(tab){
       
        if(tab.find('.zgpb-switch-field').data("bootstrap-switch")){
         
        }else{
            tab.find('.zgpb-switch-field').bootstrapSwitchZgpb();
            
           tab.find('.zgpb-switch-field').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
                
                var f_store=$( this ).data('field-store');
                var f_val=(state)?1:0;
                
                rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
               
                 
            });
       } 
   }
   
   
   
   
   /**
     * fields2_events_groupbtn
     *
     * @since 1
     * @access private
     * @method fields_events_groupbtn
     */          
    arguments.callee.fields2_events_groupbtn = function(tab){
        
        if(tab.find('.sfdc-form-group').find('.zgpb-form-group-loaded').length){
             
        }else{
          
           tab.find('.sfdc-form-group').addClass('zgpb-form-group-loaded');
           
           tab.find(".zgpb-col-setoption-btn").on("click", function(e) {
               if(e) { e.stopPropagation(); e.preventDefault();}
               /*prevent double click*/
                e.preventDefault();
                var element = $(this),
                parent = element.parent();
                  
                parent.children(".sfdc-btn[data-toggle-enable]").removeClass(function(){
                    return $(this).data("toggle-enable")
                }).addClass(function(){
                    return $(this).data("toggle-disable")
                }).children("input").prop('checked', false);
                element.removeClass($(this).data("toggle-disable")).addClass(element.data("toggle-enable"));
                element.children("input").prop('checked', true);
            });
           
           
           tab.find(".zgpb-col-setoption-btn").on("click", function(e) {
               e.preventDefault();
                var f_store=$( this ).data('field-store');
                var f_val=parseInt($(this).data("field-value"));
                rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
            });
        }
        
   }
   
   /**
     * fields2_events_general
     *
     * @since 1
     * @access private
     * @method fields_events_general
     */          
    arguments.callee.fields2_events_general = function(){
       
        /*field name*/
    $(document).on( "change keyup focus keypress", "#uifm_fld_main_fldname", function(e) {
        //if(e) { e.stopPropagation(); e.preventDefault();}
        var fldname=$('#uifm_fld_main_fldname').val();
        var pickfield = $('#uifm-field-selected-id').val();
        var f_step = $('#'+pickfield).closest('.uiform-step-pane').data('uifm-step');
        rocketform.fieldsetting_updateName(f_step,pickfield,fldname);
    });
        
        
     $('#uifm-field-opt-content').find('a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function (e) {
                  
            /* $('.zgpb-scroll-pane-arrows').jScrollPane(
                {
                        showArrows: true,
                        horizontalGutter: 10
                }
                );*/
            });
            
       $(document).on( "change", "#uifm-field-opt-content .zgpb-f-setoption-st", function(e) {
           if(e) { e.stopPropagation(); e.preventDefault();}
     
        var f_store=$( this ).data('field-store');
        var f_val=($( this ).is(':checked'))?1:0;
        rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);   
      }); 
      
      
       $(document).on( "change keyup", "#uifm-field-opt-content .zgpb-f-setoption", function(e) {
        if(e) { e.stopPropagation(); e.preventDefault();}
            var f_store=$( this ).data('field-store');
            var f_val=$( this ).val();
            rocketform.updateModalFieldCoreAndPreview(f_store,f_val);
    });
    
     $(document).on( "click", "#uifm-field-opt-content .zgpb-f-setoption-btn", function(e) {
         if(e) { e.stopPropagation(); e.preventDefault();}
        var f_store=$( this ).data('field-store');
        var f_val=$( this ).find('input').val();
        rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
     });
       
   }
   
   
   /**
     * fields2_events_slider
     *
     * @since 1
     * @access private
     * @method fields_events_slider
     */          
    arguments.callee.fields2_events_slider = function(tab){
        
       tab.find('.zgpb-custom-slider').bootstrapSlider();
       
       tab.find('.zgpb-custom-slider').on('slide', function(slideEvt) {
                var f_store=$( this ).data('field-store');
                var f_val=slideEvt.value;
                rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
            });
   }
   
    /**
     * fields2_events_txts
     *
     * @since 1
     * @access private
     * @method fields_events_txts
     */          
    arguments.callee.fields2_events_txts = function(tab){
        tab.find('.zgpb-field-col-event-txt').on('change keyup focus keypress', function(e) {
            if(e) { e.stopPropagation(); e.preventDefault();}
                var f_store=$( this ).data('field-store');
                var f_val=$( this ).val();
                rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
            });
   }
   
   /**
     * fields2_events_spinner
     *
     * @since 1
     * @access private
     * @method fields_events_spinner
     */          
    arguments.callee.fields2_events_spinner = function(tab){
       
       if(tab.find(".zgpb_fld_settings_spinner").find('.bootstrap-touchspin-postfix').length){
         
           
       }else{
            tab.find(".zgpb_fld_settings_spinner").TouchSpin({
                verticalbuttons: true,
                min: 0,
                max: 1500,
                stepinterval: 1,
                verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
                verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
            }); 
                                               
       
       tab.find(".zgpb_fld_settings_spinner").on("change", function(e) {
          
           if(e) { e.stopPropagation(); e.preventDefault();}
            var f_store=$(e.target).data('field-store');
            var f_val=$(e.target).val();
            
            rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
        });
       } 
   }
   
     /**
     * fields2_events_bgimages
     *
     * @since 1
     * @access private
     * @method fields2_events_bgimages
     */          
    arguments.callee.modal_editfield_col_bg_delimg = function(){
        $('#zgpb_fld_col_bg_srcimg_wrap').html('');
        $('#zgpb_fld_col_bg_imgsource').val('');
        var f_store=$('#zgpb_fld_col_bg_imgsourcebtnadd').data('field-store');
         var f_val='';
        rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
    }
   
   /**
     * fields2_events_bgimages
     *
     * @since 1
     * @access private
     * @method fields2_events_bgimages
     */          
   arguments.callee.fields2_events_bgimages = function(tab){
         
      
       tab.find("#zgpb_fld_col_bg_imgsourcebtnadd").on("click", function(e) {
           if(e) { e.stopPropagation(); e.preventDefault();}
           
             var element=$(this);
            var formfield = "zgpb_fld_col_bg_imgsource";
            rocketform.elfinder_showPopUp({
                                windowURL:uiform_vars.url_elfinder2,
                                windowName:'_blank',
                                height:490,
                                width:950,
                                centerScreen:1,
                                location:0
                            });
                  
                     window.processFile = function(file) {
                        
                         //for newer versions, html throws just the image tag
                var imgurl = file.url;
                $('#'+ formfield).val(imgurl);
                $('#zgpb_fld_col_bg_srcimg_wrap').html('<img class="sfdc-img-thumbnail" src="' + imgurl + '" />');
                
                 var f_store=element.data('field-store');
                 var f_val=imgurl;
                  rocketform.fields2_updateModalFieldCoreAndPreview(f_store,f_val);
           }
             
	});
   };
     /**
     * updateModalFieldCoreAndPreview
     *
     * @since 1
     * @access private
     * @method fields_events_slider
     */          
    arguments.callee.fields2_updateModalFieldCoreAndPreview = function (f_store,f_val) {
       try{
       var f_id;
                var f_type;
                 f_id= $('#uifm-field-selected-id').val();
                           f_type= $('#uifm-field-selected-type').val();
                
                var addt=[];
                    switch(parseInt(f_type)){
                       case 1:
                       case 2:
                       case 3:
                       case 4:
                       case 5:   
                            
                           var block=$('#zgpb-field-selected-block').val();
                           addt['block']=block;
                           break;
                       default:
                          
                           break;
                    }
                   
                     rocketform.fields2_setDataOptToCoreData(f_id,f_type,f_store,f_val,addt);
                     var obj_field= $('#'+f_id);
                    if(obj_field){
                       rocketform.fields2_setDataOptToPrevField(obj_field,f_type,f_store,f_val,addt);
                    }
                    
       }/* end try*/
            catch (ex) {
            console.error("error fields2_updateModalFieldCoreAndPreview ", ex.message);
        }                
                    
   }
   
   /**
     * fields2 Set data to core
     *
     * @since 1
     * @access private
     * @method setDataOptToCoreData
     */
    arguments.callee.fields2_setDataOptToCoreData = function (id,f_type,f_store,value,addt) {
        
        try {
            var f_obj= $('#'+id);
            var tmp_vars;
            var tmp_vars_split;
            switch(parseInt(f_type)) {
               case 1:
               case 2:
               case 3:
               case 4:
               case 5:
                tmp_vars=[];
                tmp_vars_split=f_store.split('-');
                tmp_vars['id']=id;
                tmp_vars['block']=addt['block'];
                tmp_vars['opt1']=tmp_vars_split[0];
                tmp_vars['opt2']=tmp_vars_split[1];
                tmp_vars['opt3']=tmp_vars_split[2];
                tmp_vars['opt4']=value;
               
                 /*column*/
                    f_obj.data('zgpbld_gridsystem').setDataToCore(tmp_vars);
                break;
                case 6:
               default: 
                   
                   tmp_vars=[];
                 tmp_vars_split=f_store.split('-');
                 tmp_vars['id']=id;
                 tmp_vars['opt1']=tmp_vars_split[0]||'';
                 tmp_vars['opt2']=tmp_vars_split[1]||'';
                 tmp_vars['opt3']=tmp_vars_split[2]||'';
                 tmp_vars['opt4']=value;
                    switch (parseInt(f_type)) {
                            case 6:
                                //textbox
                                $('#'+id).data('uiform_textbox').setDataToCore(tmp_vars);
                            break;
                            case 7:
                                //textarea
                                $('#'+id).data('uiform_textarea').setDataToCore(tmp_vars);
                            break;
                            case 8:
                                //radio button field
                                //enable options related
                                $('#'+id).data('uiform_radiobtn').setDataToCore(tmp_vars);
                                break;
                            case 9:
                                //checkbox field
                                $('#'+id).data('uiform_checkbox').setDataToCore(tmp_vars);
                                break;
                            case 10:
                                //select field
                                $('#'+id).data('uiform_select').setDataToCore(tmp_vars); 
                                break;
                            case 11:
                                //multiselect field
                                $('#'+id).data('uiform_multiselect').setDataToCore(tmp_vars);
                                break;
                            case 12:
                                /*fileupload*/
                                $('#'+id).data('uiform_fileupload').setDataToCore(tmp_vars);
                                break;
                            case 13:
                                /*imageupload*/
                                $('#'+id).data('uiform_imageupload').setDataToCore(tmp_vars);
                                break;
                            case 14:
                                /*customhtml*/
                                $('#'+id).data('uiform_customhtml').setDataToCore(tmp_vars);
                                break;
                            case 15:
                                /*password*/
                                $('#'+id).data('uiform_password').setDataToCore(tmp_vars);
                                break;
                            case 16:
                                /*slider*/
                                $('#'+id).data('uiform_slider').setDataToCore(tmp_vars);
                                break;
                            case 17:
                                /*range*/
                                $('#'+id).data('uiform_range').setDataToCore(tmp_vars);
                                break;
                            case 18:
                                /*spinner*/
                                $('#'+id).data('uiform_spinner').setDataToCore(tmp_vars);
                                break;
                            case 19:
                                /*captcha*/
                                $('#'+id).data('uiform_captcha').setDataToCore(tmp_vars);
                                break;
                            case 20:
                                /*submit button*/
                                $('#'+id).data('uiform_submitbtn').setDataToCore(tmp_vars);
                                break;
                            case 21:
                                /*hidden field*/
                                $('#'+id).data('uiform_hiddeninput').setDataToCore(tmp_vars);
                                break;
                            case 22:
                                /*star rating*/
                                $('#'+id).data('uiform_ratingstar').setDataToCore(tmp_vars);   
                                break;
                            case 23:
                                /*color picker*/
                                $('#'+id).data('uiform_colorpicker').setDataToCore(tmp_vars);
                                break;    
                            case 24:
                                /*datepicker*/
                                $('#'+id).data('uiform_datepicker').setDataToCore(tmp_vars);
                                break;
                            case 25:
                                /*time picker*/
                                $('#'+id).data('uiform_timepicker').setDataToCore(tmp_vars);
                                break;
                            case 26:
                                /*date time*/
                                $('#'+id).data('uiform_datetime').setDataToCore(tmp_vars);
                                break;    
                            case 27:
                                /*recaptcha*/
                                $('#'+id).data('uiform_recaptcha').setDataToCore(tmp_vars);
                                break;
                            case 28:
                                /*prepended txt*/
                                $('#'+id).data('uiform_preptext').setDataToCore(tmp_vars);  
                                break;
                            case 29:
                                /*appended txt*/
                                $('#'+id).data('uiform_appetext').setDataToCore(tmp_vars);
                                break;
                            case 30:
                                /*prep - app txt*/
                                $('#'+id).data('uiform_prepapptext').setDataToCore(tmp_vars);
                                break;
                            case 31:
                                /* panel */
                                $('#'+id).data('uiform_panelfld').setDataToCore(tmp_vars);
                                break;
                            case 32:
                                /*divider*/
                                $('#'+id).data('uiform_divider').setDataToCore(tmp_vars);
                                break;
                            case 33:
                            case 34:
                            case 35:
                            case 36:
                            case 37:
                            case 38:
                                //heading
                                //enable options related
                                $('#'+id).data('uiform_heading').setDataToCore(tmp_vars);
                                break;
                            case 39:
                                /*wizard buttons*/
                                $('#'+id).data('uiform_wizardbtn').setDataToCore(tmp_vars);
                                break;
                            case 40:
                                /*wizard buttons*/
                                $('#'+id).data('uiform_switch').setDataToCore(tmp_vars);
                                break;
                            case 41:
                                /*dyn checkbox*/
                                $('#'+id).data('uiform_dyncheckbox').setDataToCore(tmp_vars);
                                break; 
                            case 42:
                                /*dyn radiobtn*/
                                $('#'+id).data('uiform_dynradiobtn').setDataToCore(tmp_vars); 
                                break;
                            case 43:
                                /*date beta*/
                                $('#'+id).data('uiform-datetime2').setDataToCore(tmp_vars); 
                                break;    

                        }
                                                                     
                 
                  
                   
                   
            } 
            
       
        }/* end try*/
            catch (ex) {
            console.error("error fields2_setDataOptToCoreData ", ex.message);
        }   
    };
   
   
   /**
     * fields2 reflect data to preview
     *
     * @since 1
     * @access private
     * @method setDataOptToPrevField
     */
    arguments.callee.fields2_setDataOptToPrevField = function (f_obj,f_type,f_store,value,addt) {
        
        try {
           switch(parseInt(f_type)) {
               case 1:
               case 2:
               case 3:
               case 4:
               case 5:
                 var tmp_vars=[];
                 var tmp_vars_split=f_store.split('-');
                 tmp_vars['block']=addt['block'];
                 tmp_vars['opt1']=tmp_vars_split[0];
                 tmp_vars['opt2']=tmp_vars_split[1];
                 tmp_vars['opt3']=tmp_vars_split[2];
                 tmp_vars['opt4']=value;
                 /*column*/
                 
                   f_obj.data('zgpbld_gridsystem').setOptionsToPreview(tmp_vars);
                    
                break;
            default:
                var tmp_vars=[];
                 var tmp_vars_split=f_store.split('-');
                 /*tmp_vars['opt1']=tmp_vars_split[0];
                 tmp_vars['opt2']=tmp_vars_split[1];
                 tmp_vars['opt3']=tmp_vars_split[2];*/
                 
                 rocketform.setDataOptToPrevField(f_obj,f_store,value);
             
            } 
       
        }/* end try*/
            catch (ex) {
            console.error("error fields2 setDataOptToPrevField ", ex.message);
        }   
    };
    
    /**
     * Rollback to previous form
     *
     * @since 1
     * @access private
     * @method rollback_openModal
     */
    arguments.callee.rollback_openModal = function () {
        
        var id=$('#uifm_frm_main_id').val();
        
        try {
            
            rocketform.fields_showModalOptions();
            
             $.ajax({
                                type: 'POST',
                                url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_rollback_openmodal",
                                data: {
                                    'action': 'rocket_fbuilder_rollback_openmodal',
                                    'page':'zgfm_form_builder',
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'form_id':id,
                                    'csrf_field_name':uiform_vars.csrf_field_name
                                    },
                                success: function(msg) {
                                    $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html(msg.modal_body);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                                }
                            });
       
        }/* end try*/
            catch (ex) {
            console.error("error rollback_openModal ", ex.message);
        }   
    };
    
    
    /**
     * Rollback to previous form
     *
     * @since 1
     * @access private
     * @method rollback_openModal
     */
    arguments.callee.rollback_process = function (id) {
        try {
            
            rocketform.fields_showModalOptions();
            
             $.ajax({
                                type: 'POST',
                                url: rockfm_vars.uifm_siteurl+"formbuilder/forms/ajax_rollback_process",
                                data: {
                                    'action': 'rocket_fbuilder_rollback_process',
                                    'page':'zgfm_form_builder',
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'log_id':id,
                                    'csrf_field_name':uiform_vars.csrf_field_name
                                    },
                                success: function(msg) {
                                      /*update vars*/
                                //msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                               msg.data.fmb_html_backend=decodeURIComponent(msg.data.fmb_html_backend);
                                
                                //load form
                                rocketform.loadFormToEditPanel(msg);
                                
                                //wizard refresh
                                rocketform.wizardform_refresh();
                                /*hide loader*/        
                                rocketform.loading_panelbox2(0);
                                
                                
                                /*hide modal*/
                                 $('#zgpb-modal1').sfdc_modal('hide');
                                
                                
                                }
                            });
       
        }/* end try*/
            catch (ex) {
            console.error("error rollback_openModal ", ex.message);
        }   
    };
    
    
      
     /**
     * Show modal
     *
     * @since 1
     * @access private
     * @method fields_showModalOptions
     */
    
     arguments.callee.fields_showModalOptions = function () {
        
       //$("#zgpb-modal1").find('.sfdc-modal-dialog').css({'top': 10, 'left' : 20});
      // $("#zgpb-modal1").find('.sfdc-modal-dialog').css({'top': 10, 'left' : "30%"});
       
       
       var $html_loading='<img src="'+uiform_vars.url_assets+'/backend/image/ajax-loader-black.gif'+'"/>';
       $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html($html_loading);
       $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html($html_loading);
       $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html($html_loading);
       
       
        
        $("#zgpb-modal1").find('.sfdc-modal-content').resizable({
            //alsoResize: ".modal-dialog",
            //minHeight: 150
        });
        $("#zgpb-modal1").find('.sfdc-modal-dialog').draggable();

        $("#zgpb-modal1").on('show.bs.modal', function () {
            $(this).find('.modal-body').css({
                'max-height':'100%'
            });
        });
        
         $("#zgpb-modal1").sfdc_modal({
            show: true,
            keyboard: true
        });
        
        
        
   }                                                                                                                                                                
     arguments.callee.modal_field_loader = function(status){
        var mod_body = $('#zgpb-modal1').find('.sfdc-modal-dialog .sfdc-modal-body');
        if(parseInt(status)===1){
            if(parseInt(mod_body.find('#zgpb-modal-field-loader').length)===0){
                var tmp_tmpl= wp.template("zgpb-modal-field-loader");
                mod_body.append(tmp_tmpl());
            }
        }else{
            if(mod_body.find('#zgpb-modal-field-loader')){
                 mod_body.find('#zgpb-modal-field-loader').remove();
            }
        }
        
    }                                                                                                                                                               
    
   arguments.callee.check_fieldExist = function(name,index,key) {
                try{
                    
                        if (typeof mainrformb[name][index][key] != "undefined") {
                            return true;
                         }else{
                             return false;
                         }
                    
                    }
                catch(err) {
                    return false;
                } 
            }; 
    arguments.callee.variables_openModal = function() {
        
        var id=$('#uifm_frm_main_id').val();
        
        rocketform.fields_showModalOptions();
        //save tabs content
        this.saveTabContent();

       //process fonts for fields
        var tmp_frm = mainrformb;
 
        $.ajax({
                                type: 'POST',
                                url: rockfm_vars.uifm_siteurl+'formbuilder/forms/ajax_variables_openmodal',
                                data: {
                                    'action': 'rocket_fbuilder_variables_openmodal',
                                    'page':'zgfm_form_builder',
                                    'zgfm_security':uiform_vars.ajax_nonce,
                                    'form_id':id,
                                    'form_data':encodeURIComponent(JSON.stringify(tmp_frm)),
                                    'csrf_field_name':uiform_vars.csrf_field_name
                                    },
                                success: function(msg) {
                                    $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-header-inner').html(msg.modal_header);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.sfdc-modal-body').html(msg.modal_body);
                                        $("#zgpb-modal1").find('.sfdc-modal-dialog').find('.zgpb-modal-footer-wrap').html(msg.modal_footer);
                                }
                            });
    };
                                                                                                                                                                    
};
})($uifm,window);
} 
rocketform();


