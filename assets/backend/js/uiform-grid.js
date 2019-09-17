    /**
               _ _____           _          _     _      
              | |  __ \         (_)        | |   | |     
      ___ ___ | | |__) |___  ___ _ ______ _| |__ | | ___ 
     / __/ _ \| |  _  // _ \/ __| |_  / _` | '_ \| |/ _ \
    | (_| (_) | | | \ \  __/\__ \ |/ / (_| | |_) | |  __/
     \___\___/|_|_|  \_\___||___/_/___\__,_|_.__/|_|\___|
	 
	v 1.3 - a jQuery plugin by Alvaro Prieto Lauroba
	
	Licences: MIT & GPL
	Feel free to use or modify this plugin as far as my full name is kept	
	
	If you are going to use this plugin in production environments it is 
	strongly recomended to use its minified version: colResizable.min.js

*/
//var destroy;
(function($){ 	
	
	var d = $(document); 		//window object
	var h = $("head");			//head object
	var drag = null;			//reference to the current grip that is being dragged
	var tables = [];			//array of the already processed tables (table.id as key)
	var count = 0;				//internal count to create unique IDs when needed.	
	
	//common strings for minification	(in the minified version there are plenty more)
	var ID = "id";	
	var PX = "px";
	var SIGNATURE ="JColResizer";
	
	//shortcuts
	var I = parseInt;
	var M = Math;
	//var ie =$.browser.msie;
        var ie =false;
	var S;
	try{S = sessionStorage;}catch(e){}	//Firefox crashes when executed as local file system
	
	//append required CSS rules  
	h.append("<style type='text/css'>  .JColResizer{table-layout:fixed;} .JColResizer td, .JColResizer th{overflow:hidden;padding-left:0!important; padding-right:0!important;}  .JCLRgrips{ height:0px; position:relative;} .JCLRgrip{margin-left:-5px; position:absolute; z-index:5; } .JCLRgrip .JColResizer{position:absolute;background-color:red;filter:alpha(opacity=1);opacity:0;width:10px;height:100%;top:0px} .JCLRLastGrip{position:absolute; width:1px; } .JCLRgripDrag{ border-left:1px dotted black;	}</style>");

	
	/**
	 * Function to allow column resizing for table objects. It is the starting point to apply the plugin.
	 * @param {DOM node} tb - refrence to the DOM table object to be enhanced
	 * @param {Object} options	- some customization values
	 */
	var init = function( tb, options){	
		var t = $(tb);	//the table object is wrapped
		if(options.disable) return destroy(t);				//the user is asking to destroy a previously colResized table
		var	id = t.id = t.attr(ID) || SIGNATURE+count++;	//its id is obtained, if null new one is generated		
		t.p = options.postbackSafe; 						//shortcut to detect postback safe 		
		if(!t.is("table") || tables[id]) return; 			//if the object is not a table or if it was already processed then it is ignored.
		t.addClass(SIGNATURE).attr(ID, id).before('<div class="JCLRgrips"/>');	//the grips container object is added. Signature class forces table rendering in fixed-layout mode to prevent column's min-width
		t.opt = options; t.g = []; t.c = []; t.w = t.width(); t.gc = t.prev();	//t.c and t.g are arrays of columns and grips respectively				
		if(options.marginLeft) t.gc.css("marginLeft", options.marginLeft);  	//if the table contains margins, it must be specified
		if(options.marginRight) t.gc.css("marginRight", options.marginRight);  	//since there is no (direct) way to obtain margin values in its original units (%, em, ...)
		t.cs = I(ie? tb.cellSpacing || tb.currentStyle.borderSpacing :t.css('border-spacing'))||2;	//table cellspacing (not even jQuery is fully cross-browser)
		t.b  = I(ie? tb.border || tb.currentStyle.borderLeftWidth :t.css('border-left-width'))||1;	//outer border width (again cross-browser isues)
		// if(!(tb.style.width || tb.width)) t.width(t.width()); //I am not an IE fan at all, but it is a pitty that only IE has the currentStyle attribute working as expected. For this reason I can not check easily if the table has an explicit width or if it is rendered as "auto"
		tables[id] = t; 	//the table object is stored using its id as key	
		createGrips(t);		//grips are created
               
	};


	/**
	 * This function allows to remove any enhancements performed by this plugin on a previously processed table.
	 * @param {jQuery ref} t - table object
	 */
	destroy = function(t){
		var id=t.attr(ID), t=tables[id];		//its table object is found
		if(!t||!t.is("table")) return;			//if none, then it wasnt processed	 
		t.removeClass(SIGNATURE).gc.remove();	//class and grips are removed
		delete tables[id];						//clean up data
	};


	/**
	 * Function to create all the grips associated with the table given by parameters 
	 * @param {jQuery ref} t - table object
	 */
	var createGrips = function(t){	
	
		var th = t.find(">thead>tr>th,>thead>tr>td");	//if table headers are specified in its semantically correct tag, are obtained
		if(!th.length) th = t.find(">tbody>tr:first>th,>tr:first>th,>tbody>tr:first>td, >tr:first>td");	 //but headers can also be included in different ways
		t.cg = t.find("col"); 						//a table can also contain a colgroup with col elements		
		t.ln = th.length;							//table length is stored	
		if(t.p && S && S[t.id])memento(t,th);		//if 'postbackSafe' is enabled and there is data for the current table, its coloumn layout is restored
		th.each(function(i){					//iterate through the table column headers			
			var c = $(this); 						//jquery wrap for the current column			
			var g = $(t.gc.append('<div class="JCLRgrip"></div>')[0].lastChild); //add the visual node to be used as grip
			g.t = t; g.i = i; g.c = c;	c.w =c.width();	c.blocks=c.attr('data-blocks');	//some values are stored in the grip's node data
                        c.mpercent=c.attr('data-maxpercent');
			t.g.push(g); t.c.push(c);						//the current grip and column are added to its table object
			c.width(c.w).removeAttr("width");				//the width of the column is converted into pixel-based measurements
			if (i < t.ln-1)	g.mousedown(onGripMouseDown).append(t.opt.gripInnerHtml).append('<div class="'+SIGNATURE+'" style="cursor:'+t.opt.hoverCursor+'"></div>'); //bind the mousedown event to start dragging 
			else g.addClass("JCLRLastGrip").removeClass("JCLRgrip");	//the last grip is used only to store data			
			g.data(SIGNATURE, {i:i, t:t.attr(ID)});						//grip index and its table name are stored in the HTML 												
		}); 	
		t.cg.removeAttr("width");	//remove the width attribute from elements in the colgroup (in any)
		syncGrips(t); 				//the grips are positioned according to the current table layout			
		//there is a small problem, some cells in the table could contain dimension values interfering with the 
		//width value set by this plugin. Those values are removed
		t.find('td, th').not(th).not('table th, table td').each(function(){  
			$(this).removeAttr('width');	//the width attribute is removed from all table cells which are not nested in other tables and dont belong to the header
		});	
	};
	

	/**
	 * Function to allow the persistence of columns dimensions after a browser postback. It is based in
	 * the HTML5 sessionStorage object, which can be emulated for older browsers using sessionstorage.js
	 * @param {jQuery ref} t - table object
	 * @param {jQuery ref} th - reference to the first row elements (only set in deserialization)
	 */
	var memento = function(t, th){ 
		var w,m=0,i=0,aux =[];
		if(th){										//in deserialization mode (after a postback)
			t.cg.removeAttr("width");
			if(t.opt.flush){ S[t.id] =""; return;} 	//if flush is activated, stored data is removed
			w = S[t.id].split(";");					//column widths is obtained
			for(;i<t.ln;i++){						//for each column
				aux.push(100*w[i]/w[t.ln]+"%"); 	//width is stored in an array since it will be required again a couple of lines ahead
				th.eq(i).css("width", aux[i] ); 	//each column width in % is resotred
			}			
			for(i=0;i<t.ln;i++)
				t.cg.eq(i).css("width", aux[i]);	//this code is required in order to create an inline CSS rule with higher precedence than an existing CSS class in the "col" elements
		}else{							//in serialization mode (after resizing a column)
			S[t.id] ="";				//clean up previous data
			for(i in t.c){				//iterate through columns
				w = t.c[i].width();		//width is obtained
				S[t.id] += w+";";		//width is appended to the sessionStorage object using ID as key
				m+=w;					//carriage is updated to obtain the full size used by columns
			}
			S[t.id]+=m;					//the last item of the serialized string is the table's active area (width), 
										//to be able to obtain % width value of each columns while deserializing
		}	
	};
	
	
	/**
	 * Function that places each grip in the correct position according to the current table layout	 * 
	 * @param {jQuery ref} t - table object
	 */
	var syncGrips = function (t){
            var temp_x;
		t.gc.width(t.w);			//the grip's container width is updated				
		for(var i=0; i<t.ln; i++){	//for each column
			var c = t.c[i];
                        temp_x =c.offset().left - t.offset().left + c.outerWidth() + t.cs / 2;
			t.g[i].css({			//height and position of the grip is updated according to the table layout
				left: setcollimits(t,temp_x,i,false)+ PX,
				height: t.opt.headerOnly? t.c[0].outerHeight() : t.outerHeight()				
			});			
		} 	
	};
	
	
	
	/**
	* This function updates column's width according to the horizontal position increment of the grip being
	* dragged. The function can be called while dragging if liveDragging is enabled and also from the onGripDragOver
	* event handler to synchronize grip's position with their related columns.
	* @param {jQuery ref} t - table object
	* @param {nunmber} i - index of the grip being dragged
	* @param {bool} isOver - to identify when the function is being called from the onGripDragOver event	
	*/
	var syncCols = function(t,i,isOver){
		var inc = drag.x-drag.l, c = t.c[i], c2 = t.c[i+1]; 			
		var w = c.w + inc;	var w2= c2.w- inc;	//their new width is obtained					
		c.width( w + PX);	c2.width(w2 + PX);	//and set
                c.attr('data-blocks',t.c[i].blocks);
                c2.attr('data-blocks',t.c[i+1].blocks);
                c.attr('data-maxpercent',t.c[i].mpercent);
		t.cg.eq(i).width( w + PX); t.cg.eq(i+1).width( w2 + PX);
		if(isOver){c.w=w; c2.w=w2;}
	};
        
        var setboundlimits=function(t,x,flag,drag_i){
                var temp_total=t.w;
                var temp_range=Math.round(100*x/temp_total);
                //var temp_range=temp_total;
                
                var theArray = [8.333, 16.666, 25, 33.333, 41.666,50,58.333,66.666,75,83.333,91.666];
                var goal = temp_range;
                var closest = null;
                var temp_index=null;
                
                $.each(theArray, function(index,element){
                if (closest == null || Math.abs(element - goal) < Math.abs(closest - goal)) {
                    closest = element;
                    temp_index=index;
                }
                });
                
                  if(flag){
                    //max
                     if(drag_i==(parseInt(t.ln)-2) ){
                        }else{
                            temp_index=temp_index-1;
                        }
                    //temp_index=(temp_index==(t.ln-1))?t.ln-1:temp_index-1;
                    closest=theArray[temp_index];
                    //$("#sample5Text4").html(' max contiguous cell: '+temp_index+' drag i:'+drag_i+' last index:'+(parseInt(t.ln)-2));
                    }else{
                    //min
                        if(drag_i==0){
                            
                        }else{
                            temp_index=temp_index+1;
                        }
                        //temp_index=(temp_index==0)?0:temp_index+1;
                        closest=theArray[temp_index];
                       // $("#sample5Text3").html(' min contiguous cell: '+temp_index+' drag i:'+drag_i);
                    }
                
                
                closest = M.max(8.333, M.min(91.666, closest));
                
                var temp_number=(parseFloat(temp_total)*parseFloat(closest))/100;
               // var temp_number=closest;
               
               
                return temp_number;
		//$("#sample5Text").html(t.w);   
        }
        
	var setcollimits=function(t,x,i,flag){
                //total width 
                var temp_total=t.w;
                //get percentage
                var goal=Math.round(100*x/temp_total);
                //points list
                var theArray = [0,8.3, 16.6, 25, 33.3, 41.6,50,58.3,66.6,75,83.3,91.6,100];
                var closest = null;
                var temp_index=null;
                
                $.each(theArray, function(index,element){
                    if (closest == null || Math.abs(element - goal) < Math.abs(closest - goal)) {
                        closest = element;
                        temp_index=index;
                    }
                });
                
                closest = M.max(8.3, M.min(91.6, closest));
                
                if(flag===true){
                    var found = $.map(theArray, function(val,index) {
                        return val == closest ? index : null;
                    });

                    //update data cols
                    var temp_c,temp_c1,temp_max,temp_min,temp_prev,temp_prev_val,temp_block_2,temp_block_1;
                    temp_c=t.c[i].mpercent;
                    temp_c1=t.c[i+1].mpercent;
                    
                    if(t.c[i-1]=== undefined){
                    temp_prev_val=0;
                    }else{
                    temp_prev_val=t.c[i-1].mpercent;    
                    }
                    temp_min=parseFloat(temp_c)-parseFloat(temp_prev_val);
                    temp_max=parseFloat(temp_c1)-parseFloat(temp_c);
                    temp_block_1=12*temp_min/100;
                    temp_block_2=12*temp_max/100;
                    t.c[i].blocks=Math.round(temp_block_1);
                    t.c[i+1].blocks=Math.round(temp_block_2);
                    t.c[i].mpercent=closest;
                }
                
                var temp_number=(parseFloat(temp_total)*parseFloat(closest))/100;
                
                //$("#sample5Text2").html(' temp_range: '+temp_range+'px closest: '+closest+'% real number: '+temp_number+'px'+'  tempindex:'+temp_index);   
                
                return temp_number;
		
        }
        
	/**
	 * Event handler used while dragging a grip. It checks if the next grip's position is valid and updates it. 
	 * @param {event} e - mousemove event binded to the window object
	 */
	var onGripDrag = function(e){	
		if(!drag) return; var t = drag.t;		//table object reference 
                //$('#onlydebugger').html('e.pageX :'+e.pageX+'  drag.ox:'+drag.ox+'  drag.l:'+drag.l);
		var x = e.pageX - drag.ox + drag.l;		//next position according to horizontal mouse position increment
		var mw = t.opt.minWidth, i = drag.i ;	//cell's min width
		var l = t.cs*1.5 + mw + t.b;

		var max = i == t.ln-1? t.w-l: t.g[i+1].position().left-t.cs-mw; //max position according to the contiguous cells
                max=setboundlimits(t,max,true,drag.i);
		var min = i? t.g[i-1].position().left+t.cs+mw: l;				//min position according to the contiguous cells
                min=setboundlimits(t,min,false,drag.i);
		
		x = M.max(min, M.min(max, x));				//apply boundings
                //set width and data cols
                x =setcollimits(t,x,i,true);
		drag.x = x;	 drag.css("left",  x + PX); 			//apply position increment		
			
		if(t.opt.liveDrag){ 								//if liveDrag is enabled
                        syncCols(t,i);
                        syncGrips(t);					//columns and grips are synchronized
			var cb = t.opt.onDrag;							//check if there is an onDrag callback
			if (cb) { e.currentTarget = t[0]; cb(e); }		//if any, it is fired			
		}
		
		return false; 	//prevent text selection				
	};
	

	/**
	 * Event handler fired when the dragging is over, updating table layout
	 */
	var onGripDragOver = function(e){	
		
		d.unbind('mousemove.'+SIGNATURE).unbind('mouseup.'+SIGNATURE);
		$("head :last-child").remove(); 				//remove the dragging cursor style	
		if(!drag) return;
		drag.removeClass(drag.t.opt.draggingClass);		//remove the grip's dragging css-class
		var t = drag.t, cb = t.opt.onResize; 			//get some values	
		if(drag.x){ 									//only if the column width has been changed
			syncCols(t,drag.i, true);	syncGrips(t);	//the columns and grips are updated
			if (cb) { e.currentTarget = t[0]; cb(e); }	//if there is a callback function, it is fired
		}	
		if(t.p && S) memento(t); 						//if postbackSafe is enabled and there is sessionStorage support, the new layout is serialized and stored
		drag = null;									//since the grip's dragging is over									
	};	
	
        
	/**
	 * Event handler fired when the grip's dragging is about to start. Its main goal is to set up events 
	 * and store some values used while dragging.
	 * @param {event} e - grip's mousedown event
	 */
	var onGripMouseDown = function(e){
		var o = $(this).data(SIGNATURE);			//retrieve grip's data
		var t = tables[o.t],  g = t.g[o.i];			//shortcuts for the table and grip objects
		g.ox = e.pageX;	g.l = g.position().left;	//the initial position is kept				
		d.bind('mousemove.'+SIGNATURE, onGripDrag).bind('mouseup.'+SIGNATURE,onGripDragOver);	//mousemove and mouseup events are bound
		h.append("<style type='text/css'>*{cursor:"+ t.opt.dragCursor +"!important}</style>"); 	//change the mouse cursor
		g.addClass(t.opt.draggingClass); 	//add the dragging class (to allow some visual feedback)				
		drag = g;							//the current grip is stored as the current dragging object
                //if the colum is locked (after browser resize), then c.w must be updated
		if(t.c[o.i].l) {
                 for(var i=0,c; i<t.ln; i++){
                 c=t.c[i]; 
                 c.l = false; 
                 c.w= c.width(); 
                    } 	
                }		
		return false; 	//prevent text selection
	};
	
	/**
	 * Event handler fired when the browser is resized. The main purpose of this function is to update
	 * table layout according to the browser's size synchronizing related grips 
	 */
	var onResize = function(){
		for(t in tables){		
			var t = tables[t], i, mw=0;				
			t.removeClass(SIGNATURE);						//firefox doesnt like layout-fixed in some cases
			if (t.w != t.width()) {							//if the the table's width has changed
				t.w = t.width();							//its new value is kept
				for(i=0; i<t.ln; i++) mw+= t.c[i].w;		//the active cells area is obtained
				//cell rendering is not as trivial as it might seem, and it is slightly different for
				//each browser. In the begining i had a big switch for each browser, but since the code
				//was extremelly ugly now I use a different approach with several reflows. This works 
				//pretty well but it's a bit slower. For now, lets keep things simple...   
				for(i=0; i<t.ln; i++) t.c[i].css("width", M.round(1000*t.c[i].w/mw)/10 + "%").l=true; 
				//c.l locks the column, telling us that its c.w is outdated									
			}
			syncGrips(t.addClass(SIGNATURE));
		}
	};		


	//bind resize event, to update grips position 
	//$(window).bind('resize.'+SIGNATURE, onResize); 


	

/**
	 * The plugin is added to the jQuery library
	 * @param {Object} options -  an object containg some basic customization values 
	 */
    $.fn.extend({  
        colResizable: function(options) {
            var defaults = {
				//attributes:
                draggingClass: '',	//css-class used when a grip is being dragged (for visual feedback purposes)
				gripInnerHtml:"<div class='uiform-grip-intersect'></div>",				//if it is required to use a custom grip it can be done using some custom HTML				
				liveDrag: true,				//enables table-layout updaing while dragging			
				minWidth: 15, 					//minimum width value in pixels allowed for a column 
				headerOnly: false,				//specifies that the size of the the column resizing anchors will be bounded to the size of the first row 
				hoverCursor: "e-resize",  		//cursor to be used on grip hover
				dragCursor: "e-resize",  		//cursor to be used while dragging
				postbackSafe: false, 			//when it is enabled, table layout can persist after postback. It requires browsers with sessionStorage support (it can be emulated with sessionStorage.js). Some browsers ony 
				flush: false, 					//when postbakSafe is enabled, and it is required to prevent layout restoration after postback, 'flush' will remove its associated layout data 
				marginLeft: null,				//in case the table contains any margins, colResizable needs to know the values used, e.g. "10%", "15em", "5px" ...
				marginRight: null, 				//in case the table contains any margins, colResizable needs to know the values used, e.g. "10%", "15em", "5px" ...
				disable: false,					//disables all the enhancements performed in a previously colResized table	
				//events:
				onDrag: null, 					//callback function to be fired during the column resizing process if liveDrag is enabled
				onResize: null					//callback function fired when the dragging process is over
            }		
            var node=this;
			var options =  $.extend(defaults, options);
            return this.each(function() {
                        function resize_grid(){
                           onResize();
                        }
                        
                        $(window).resize(function () {
                        resize_grid();
                        });
                        init( this, options);
                    });
                    
            
            
        }
    });
})($uifm);
