(function($){     
    var uifm_panels = [];
    var uifm_width_panel=0;
    var uifm_max_width_panel=0;
    var uifm_width_panel_center=0;
    var uifm_width_panel_left=0;
    var uifm_width_panel_right=0;
    var uipanel_object;
    var uipanel_main_content; 
    var uifm_footer_credit ;
    var uipanel_percentage=1;
    var uifm_panelleft_width=262;
    var uifm_panelright_width=520;
    
    var uifm_main_height = 0;
    var uifm_allpanel_height = 0;
    
	var init = function( tb, options){
            uipanel_main_content = $('#rocketform-bk-content');
            uifm_footer_credit =$('#wpfooter')||null;
		uipanel_object = $(tb);
                uifm_panels['left']=uipanel_object.find('.uifm-edit-panel-left');
                uifm_panels['center']=uipanel_object.find('.uifm-edit-panel-center');
                uifm_panels['right']=uipanel_object.find('.uifm-edit-panel-right');
                
                uifm_max_width_panel=uifm_width_panel=$('.uiform-editing-main').width();
                 
                calculatePanels();
	};
        var onPanelResize = function(){
		uifm_width_panel=$('.uiform-editing-main').width();
                if(uifm_width_panel>=uifm_max_width_panel){
                    uifm_max_width_panel=uifm_width_panel;
                }else{
                    uifm_width_panel=uifm_max_width_panel;
                }
                
                calculatePanels();
	};
        var calculatePanels = function(){
            /*left*/
            /*var innerwidthLeft=uipanel_object.find('.uiform-builder-fields').width();*/
            
            //left panel
            if($("#uifm-panel-arrow-left" ).hasClass( "uifm-layout-toggler-open" )){
            var innerwidthLeft=uifm_panelleft_width;
            innerwidthLeft+=17;    
            }else{
              innerwidthLeft=10;  
            }
            var newWidthPanelLeft;
                
            if(uipanel_percentage){
                newWidthPanelLeft=(parseFloat(innerwidthLeft)*100/parseFloat(uifm_width_panel)).toFixed(3);
            }else{
                newWidthPanelLeft=innerwidthLeft;
            }
                        
            //right panel
            var innerwidthRight;
            if($("#uifm-panel-arrow-right" ).hasClass( "uifm-layout-toggler-open" )){
             innerwidthRight=uifm_panelright_width;
            }else{
              innerwidthRight=10;  
            }
            
            var newWidthPanelRight;
            if(uipanel_percentage){
                newWidthPanelRight=(parseFloat(innerwidthRight)*100/parseFloat(uifm_width_panel)).toFixed(3);
            }else{
                newWidthPanelRight=innerwidthRight;
            }
            
            //center panel
            var newWidthPanelCenter;
            if(uipanel_percentage){
                newWidthPanelCenter = 100 - parseFloat(newWidthPanelRight)-parseFloat(newWidthPanelLeft);
            }else{
                newWidthPanelCenter = uifm_width_panel - parseFloat(newWidthPanelRight)-parseFloat(newWidthPanelLeft);
            }
             
            if(uipanel_percentage){
                uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'%');
            }else{
                uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'px');
            }
            
            uifm_width_panel_left=newWidthPanelLeft;
            if(uipanel_percentage){
                uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'%');
            }else{
                uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'px');
            }
            
            uifm_width_panel_center=newWidthPanelCenter;
            
            if(uipanel_percentage){
                uipanel_object.find('.uifm-edit-panel-right').css("width", newWidthPanelRight+'%');
            }else{
                uipanel_object.find('.uifm-edit-panel-right').css("width", newWidthPanelRight+'px');
            }
            uifm_width_panel_right=newWidthPanelRight;
            
            
            //calculating height of left panel
            
            
            //left panel
            var tmp_main_height=uipanel_main_content.height();
            //it happens sometimes the box starts with zero
            if(parseInt(tmp_main_height)===0){
                return;
            }
            
            
            if(parseInt(uifm_panels['left'].find('.uiform-builder-fields').height())===0){
                return;
            }
            
            
            var tmp_main_pos= uipanel_main_content.offset();
            //var tmp_main_pos_left = tmp_main_pos.left;
            var tmp_main_pos_top = tmp_main_pos.top;
            var tmp_main_pos_bottom = parseFloat(tmp_main_pos_top)+tmp_main_height;
            
            
            //it happens sometimes the box starts with zero
            if(parseInt(tmp_main_pos_bottom)===0){
                return;
            }
            
            //credit
            var tmp_footer_pos = uifm_footer_credit.offset();
            var tmp_footer_pos_left = tmp_footer_pos.left;
            var tmp_footer_pos_top = tmp_footer_pos.top;
             
            if(tmp_footer_pos_top>tmp_main_pos_bottom ){
                var tmp_diff = tmp_footer_pos_top - tmp_main_pos_bottom;
            uifm_main_height = tmp_main_height+tmp_diff -100;
            }else{
                uifm_main_height = tmp_main_height;
                
            }
            
             
            uipanel_main_content.css('height',uifm_main_height+'px');
         
         
              //update left panel
                var tmp_menu_height;
                var tmp_height_ret;
                 var tmp_pleft_height;
                var tmp_diff_inner_h;
                tmp_menu_height = $('.uiformc-menu-wrap').first().height();
                  //  console.log('tmp_menu_height '+tmp_menu_height);
                    tmp_pleft_height = uifm_panels['left'].find('.uiform-builder-fields').height();
                   // console.log('tmp_pleft_height '+tmp_pleft_height);


                     if(tmp_footer_pos_top>tmp_main_pos_bottom ){
                            tmp_diff_inner_h = (uifm_main_height - tmp_menu_height - tmp_pleft_height);
                                 if(tmp_diff_inner_h >0){
                                     tmp_height_ret = tmp_pleft_height + tmp_diff_inner_h;
                                 }else{
                                     tmp_height_ret = tmp_pleft_height  ;
                                 }

                                 
                               
                        }else{
                                tmp_height_ret = tmp_pleft_height  ;

                        }
                    uifm_allpanel_height = tmp_height_ret;
                     
                
                
                
                
                uifm_panels['left'].find('.uiform-builder-fields').height(uifm_allpanel_height);
                
          
         
            
            //update center panel
            uifm_panels['center'].find('.uiform-builder-preview').height(uifm_allpanel_height);
            
            //update right panel
            uifm_panels['right'].find('.uiform-builder-data').height(uifm_allpanel_height);
            
            
            
            $('.uiform-builder-maintab-container .uiform-tab-content').height(parseFloat(uifm_allpanel_height-170));
            //setting field inner panel with scroll
            /*var tmp_set_box=uipanel_object.find('.uifm-edit-panel-right .scroll-pane-arrows');
            var tmp_new_height_box=uipanel_object.find('.uiform-builder-data').height();
            tmp_new_height_box = parseFloat(tmp_new_height_box)-148;
            tmp_set_box.css('height',tmp_new_height_box+'px');*/
           
            
        }
        
        var onTogglerLeftPanel=function(){
            var newWidthPanelLeft;
            var bothWidthPanel;
            var newWidthPanelCenter;
            if($("#uifm-panel-arrow-left" ).hasClass( "uifm-layout-toggler-open" )){
                $("#uifm-panel-arrow-left" ).removeClass( "uifm-layout-toggler-open" );
                /*styling */
                if(uipanel_percentage){
                    newWidthPanelLeft=(parseFloat(10)*100/parseFloat(uifm_width_panel)).toFixed(3);
                }else{
                    newWidthPanelLeft=10;
                }
                
                /*current width*/
                bothWidthPanel=parseFloat(uifm_width_panel_left)+parseFloat(uifm_width_panel_center);
               newWidthPanelCenter=parseFloat(bothWidthPanel)-parseFloat(newWidthPanelLeft);
               
               if(uipanel_percentage){
                uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'%');
                uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'%');
               }else{
                uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'px');
                uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'px');   
               }
               
                
                uipanel_object.find('.uifm-edit-panel-left').addClass('uifm-panel-tog-left-closed');
                
                $('#uifm-panel-arrow-left').find('.uifm-arrow-open').css('display','none');
                $('#uifm-panel-arrow-left').find('.uifm-arrow-closed').css('display','block');
                $('.uiform-editing-main .uiform-builder-fields').hide();
                $( "#uifm-panel-arrow-left" ).addClass( "uifm-layout-toggler-close" );
                $('#uifm-panel-arrow-left').attr('title', 'Open');
            }else{
                $("#uifm-panel-arrow-left" ).removeClass( "uifm-layout-toggler-close" );
                uipanel_object.find('.uifm-edit-panel-left').removeClass( "uifm-panel-tog-left-closed" );
                var innerwidthLeft=uifm_panelleft_width;
                innerwidthLeft+=17;
                if(uipanel_percentage){
                    newWidthPanelLeft=(parseFloat(innerwidthLeft)*100/parseFloat(uifm_width_panel)).toFixed(3);
                }else{
                    newWidthPanelLeft=innerwidthLeft;
                }
                
                
                bothWidthPanel=parseFloat(uifm_width_panel_left)+parseFloat(uifm_width_panel_center);
                newWidthPanelCenter=parseFloat(bothWidthPanel)-parseFloat(newWidthPanelLeft);
                
                if(uipanel_percentage){
                  uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'%');
                  uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'%');  
                }else{
                  uipanel_object.find('.uifm-edit-panel-left').css("width", newWidthPanelLeft+'px');
                  uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'px');  
                }
                  
                
                $('#uifm-panel-arrow-left').find('.uifm-arrow-open').css('display','block');
                $('#uifm-panel-arrow-left').find('.uifm-arrow-closed').css('display','none');
                $('.uiform-editing-main .uiform-builder-fields').show();
                $( "#uifm-panel-arrow-left" ).addClass( "uifm-layout-toggler-open" );
                $('#uifm-panel-arrow-left').attr('title', 'Close');
            }
            //trigger resize - For grid
            $(window).trigger('resize'); 
        }
        
        var onTogglerRightPanel=function(){
            var newWidthPanelRight;
            var bothWidthPanel;
            var newWidthPanelCenter;
            if($("#uifm-panel-arrow-right" ).hasClass( "uifm-layout-toggler-open" )){
                $("#uifm-panel-arrow-right" ).removeClass( "uifm-layout-toggler-open" );
                /*styling */
                newWidthPanelRight=(parseFloat(10)*100/parseFloat(uifm_width_panel)).toFixed(3);
                
                /*current width*/
                bothWidthPanel=parseFloat(uifm_width_panel_right)+parseFloat(uifm_width_panel_center);
                
               newWidthPanelCenter=parseFloat(bothWidthPanel)-parseFloat(newWidthPanelRight);
               
               
               
               uipanel_object.find('.uifm-edit-panel-right').css("width", newWidthPanelRight+'%');
                uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'%');
                
                uipanel_object.find('.uifm-edit-panel-right').addClass('uifm-panel-tog-right-closed');
                
                $('#uifm-panel-arrow-right').find('.uifm-arrow-open').css('display','none');
                $('#uifm-panel-arrow-right').find('.uifm-arrow-closed').css('display','block');
                $('.uiform-editing-main .uiform-builder-data').hide();
                $( "#uifm-panel-arrow-right" ).addClass( "uifm-layout-toggler-close" );
                $('#uifm-panel-arrow-right').attr('title', 'Open');
            }else{
                $("#uifm-panel-arrow-right" ).removeClass( "uifm-layout-toggler-close" );
                uipanel_object.find('.uifm-edit-panel-right').removeClass( "uifm-panel-tog-right-closed" );
                var innerwidthRight=uifm_panelright_width;
                //var innerwidthRight=262;
                //innerwidthRight+=17;
                newWidthPanelRight=(parseFloat(innerwidthRight)*100/parseFloat(uifm_width_panel)).toFixed(3);
                bothWidthPanel=parseFloat(uifm_width_panel_right)+parseFloat(uifm_width_panel_center);
                newWidthPanelCenter=parseFloat(bothWidthPanel)-parseFloat(newWidthPanelRight);
                  uipanel_object.find('.uifm-edit-panel-right').css("width", newWidthPanelRight+'%');
                  uipanel_object.find('.uifm-edit-panel-center').css("width", newWidthPanelCenter+'%');
                
                $('#uifm-panel-arrow-right').find('.uifm-arrow-open').css('display','block');
                $('#uifm-panel-arrow-right').find('.uifm-arrow-closed').css('display','none');
                $('.uiform-editing-main .uiform-builder-data').show();
                $( "#uifm-panel-arrow-right" ).addClass( "uifm-layout-toggler-open" );
                $('#uifm-panel-arrow-right').attr('title', 'Close');
            }
            //trigger resize - For grid
            $(window).trigger('resize');
        }
    $.fn.extend({  
        ColumnToggle: function(options) {
            var defaults = {
                draggingClass: '',
		onResize: null
            }		
            var node=this;
			var options =  $.extend(defaults, options);
            return this.each(function() {
                        function resize_panel(){
                           onPanelResize();
                        }
                        $(window).resize(function () {
                        resize_panel();
                        });
                        $('#uifm-panel-arrow-left').click(function () {
                           onTogglerLeftPanel(); 
                        });
                        $('#uifm-panel-arrow-right').click(function () {
                           onTogglerRightPanel(); 
                        });
                        init( this, options);
                    });
                    
            
            
        }
    });
})($uifm);
