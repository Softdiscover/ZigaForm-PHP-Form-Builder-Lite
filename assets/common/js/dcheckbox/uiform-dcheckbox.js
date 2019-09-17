
(function() {
  var __slice = [].slice;

  (function($, window) {
    "use strict";
    var uiformDCheckbox;
    uiformDCheckbox = (function() {
     
     var uifm_dchkbox_var = [];
     uifm_dchkbox_var.innerVars = {};
     
    
     function uiformDCheckbox(element, options) {
        if (options == null) {
          options = {};
        }
        this.$element = $(element);
        this.options = $.extend({}, $.fn.uiformDCheckbox.defaults, {
          baseGalleryId:this.$element.data('gal-id'),
          opt_laymode:$(element).parent().attr('data-opt-laymode')||1,
          opt_checked:this.$element.data('opt-checked'),
          opt_isradiobtn:this.$element.data('opt-isrdobtn'),
          opt_qtyMax:this.$element.data('opt-qtymax'),
          opt_qtySt:this.$element.data('opt-qtyst'),
          opt_price:this.$element.data('opt-price'),
          opt_label:this.$element.data('opt-label'),
          opt_thopt_showhvrtxt:$(element).parent().attr('data-thopt-showhvrtxt')||0,
          opt_thopt_showcheckb:$(element).parent().attr('data-thopt-showcheckb')||0,
          opt_thopt_zoom:$(element).parent().attr('data-thopt-zoom')||0,
          opt_thopt_height:$(element).parent().attr('data-thopt-height')||100,
          opt_thopt_width:$(element).parent().attr('data-thopt-width')||100,
          backend:this.$element.data('backend'),
          baseClass: this.$element.data("base-class")
        }, options);
        
        
        
       /* this.$wrapper = $("<div>", {
          "class": (function(_this) {
            return function() {
              var classes;
              classes = ["" + _this.options.baseClass].concat(_this._getClasses(_this.options.wrapperClass));
              classes.push(_this.options.state ? "" + _this.options.baseClass + "-on" : "" + _this.options.baseClass + "-off");
              if (_this.options.size != null) {
                classes.push("" + _this.options.baseClass + "-" + _this.options.size);
              }
              if (_this.options.animate) {
                classes.push("" + _this.options.baseClass + "-animate");
              }
              if (_this.options.disabled) {
                classes.push("" + _this.options.baseClass + "-disabled");
              }
              if (_this.options.readonly) {
                classes.push("" + _this.options.baseClass + "-readonly");
              }
              if (_this.options.indeterminate) {
                classes.push("" + _this.options.baseClass + "-indeterminate");
              }
              if (_this.$element.attr("id")) {
                classes.push("" + _this.options.baseClass + "-id-" + (_this.$element.attr("id")));
              }
              return classes.join(" ");
            };
          })(this)()
        });
        this.$container = $("<div>", {
          "class": "" + this.options.baseClass + "-container"
        });
        this.$on = $("<span>", {
          html: this.options.onText,
          "class": "" + this.options.baseClass + "-handle-on " + this.options.baseClass + "-" + this.options.onColor
        });
        this.$off = $("<span>", {
          html: this.options.offText,
          "class": "" + this.options.baseClass + "-handle-off " + this.options.baseClass + "-" + this.options.offColor
        });
        this.$label = $("<label>", {
          html: this.options.labelText,
          "class": "" + this.options.baseClass + "-label"
        });
        if (this.options.indeterminate) {
          this.$element.prop("indeterminate", true);
        }*/
        
        //update thumbnail height and width
        
        
        this.$element.find('.uifm-dcheckbox-item-viewport').attr('height',this.options.opt_thopt_height);
        this.$element.find('.uifm-dcheckbox-item-viewport').attr('width',this.options.opt_thopt_width);
        //button show button gallery
        this.$opt_gal_btn_show=this.$element.find('.uifm-dcheckbox-item-showgallery');
        
        //object all button link images
        this.$opt_gal_links_a=this.$element.find('.uifm-dcheckbox-item-gal-imgs a');
      
      this.$opt_gal_box=this.$element.find('.uifm-dcheckbox-item-viewport');
      
        //object to button next image
        this.$opt_gal_next_img=this.$element.find('.uifm-dcheckbox-item-nextimg');
        //object to button prev image
        this.$opt_gal_prev_img=this.$element.find('.uifm-dcheckbox-item-previmg');
        
        var tmp_imglist=this.$element.find('.uifm-dcheckbox-item-gal-imgs a img');
        if(parseInt(tmp_imglist.length)<2){
            this.$opt_gal_next_img.removeClass('uifm-dcheckbox-item-nextimg').hide();
            this.$opt_gal_prev_img.removeClass('uifm-dcheckbox-item-previmg').hide();
        }
       
       //object of button checkbox
        this.$opt_gal_checkbox=this.$element.find('.uifm-dcheckbox-item-chkst');
        //object of button checkbox
        this.$inp_checkbox=this.$element.find('.uifm-dcheckbox-item-chkval');
        //object of input maximum
        this.$inp_checkbox_max=this.$element.find('.uifm-dcheckbox-item-qty-num');
        //object of spinner wrapper
        this.$spinner_wrapper=this.$element.find('.uifm-dcheckbox-item-qty-wrap')||null;
        
        //object of spinner buttons
        this.$spinner_buttons=this.$element.find('.uifm-dcheckbox-item-qty-wrap button')||null;
      
       this.$element.on("init.uiformDCheckbox", (function(_this) {
        
          return function() {
            return _this.options.onInit.apply(element, arguments);
          };
        })(this));
        
        
          // init preview
       if(parseInt(this.options.opt_laymode)===2){
           
                  this._mod2_initPreview();
             
       }else{
           
           if(parseInt(this.options.opt_thopt_zoom)===0){
               this.$element.find('.uifm-dcheckbox-item-showgallery').hide();
            }else{
               this.$element.find('.uifm-dcheckbox-item-showgallery').show(); 
            }
       }
      
       switch(parseInt(this.options.opt_thopt_showhvrtxt)){
          case 1:
              //enable tooltip
                this.$element.tooltip();
            break;
          case 0:
          case 2:
          case 3:
              this.$element.find('.uifm-dcheckbox-item-showgallery').hide();
              break;
      }
      
      if(parseInt(this.options.opt_thopt_showcheckb)===0){
               this.$opt_gal_checkbox.hide();
            }else{
               this.$opt_gal_checkbox.show();
            }
      
        
        
        this.$element.on("switchChange.uiformDCheckbox", (function(_this) {
          return function() {
            return _this.options.onSwitchChange.apply(element, arguments);
          };
        })(this));
        
      
       /* this.$container = this.$element.wrap(this.$container).parent();
        this.$wrapper = this.$container.wrap(this.$wrapper).parent();
        this.$element.before(this.$on).before(this.$label).before(this.$off).trigger("init.uiformDCheckbox");
        */
       
       if(parseInt(this.options.backend)===0){
            this._elementHandlers();
            this._handleHandlers();
       }
       // manage mouseout and mouseover
       this._elementHandlers2();
       
       this._galleryHandlers();
       
        //this._labelHandlers();
        //this._formHandler();
      
       this._get_items();
       this._refresh();
      }
      
                        
      uiformDCheckbox.prototype._constructor = uiformDCheckbox;
      
      uiformDCheckbox.prototype._refresh= function() {
          this._enableCheckboxVal(this.$opt_gal_checkbox,this);
          this._setValToChkBoxInput(this);
      };
      
       uiformDCheckbox.prototype._mod2_initPreview= function() {
          this.$element.find('.uifm-dcheckbox-item-nextimg').hide();
           this.$element.find('.uifm-dcheckbox-item-previmg').hide();
           this.$element.find('.uifm-dcheckbox-item-showgallery').hide();
           
                    if(parseInt(this.options.opt_checked)===0){
                        this._mode2_get_img(this.$element,2);
                    }else{
                        this._mode2_get_img(this.$element,0);
                    } 
      };
      
      uiformDCheckbox.prototype._get_items= function() {
      
      var _this=this;
      if(this.$element.length){
                            var tmp_num_elems=this.$element;
                            tmp_num_elems.each(function (i) {
                                
                            if(parseInt(_this.options.opt_laymode)===2){
                                    if(parseInt(_this.options.opt_checked)===1){
                                        _this._mode2_get_img(_this.$element,0);
                                    }else{
                                         _this._mode2_get_img(_this.$element,2);
                                    }
                                }else{
                                    _this._getImageToCanvas($(this),0,_this);
                                }
                            
                            });
                    }
      };
      
      uiformDCheckbox.prototype._getImageToCanvas= function(obj,opt,_this) {
             var ctx = obj.find('canvas')[0].getContext('2d');
             var tmp_can_width=parseInt(this.options.opt_thopt_width);
             var tmp_can_height=parseInt(this.options.opt_thopt_height);
             
                                var img = new Image();
                                img.onload = function(){
                                   // ctx.globalAlpha = 0.4;
                                    ctx.drawImage(img,0,0,tmp_can_width,tmp_can_height);
                                };
                                var getImgIndex=obj.find('canvas').attr('data-uifm-nro');
                                switch(parseInt(opt)){
                                    case 1:
                                       img.src = _this._getPrevImageGallery(obj,getImgIndex);  
                                       break;
                                    case 2:
                                       //next 
                                       img.src = _this._getNextImageGallery(obj,getImgIndex); 
                                        break;
                                    default:
                                    case 0:
                                    img.src = _this._getImageGallery(obj,getImgIndex);   
                                        break;
                                }
                                
                
      };
      
      uiformDCheckbox.prototype._getImageGallery= function(obj,_index) {
                
                var objimgs=obj.find('.uifm-dcheckbox-item-gal-imgs a img');
                var objcanvas=obj.find('canvas');
                if(objimgs.eq(_index).length){
                    objcanvas.attr('data-uifm-nro',_index);
                   return objimgs.eq(_index).attr('src')
                }else{
                    objcanvas.attr('data-uifm-nro',0);
                   return objimgs.eq(0).attr('src')
                }
            };
      
      uiformDCheckbox.prototype._getPrevImageGallery= function(obj,_index) {
                
                var objimgs=obj.find('.uifm-dcheckbox-item-gal-imgs a img');
                var objcanvas=obj.find('canvas');
                var newIndex=parseInt(_index)-1;
                if(objimgs.eq(newIndex).length){
                    objcanvas.attr('data-uifm-nro',newIndex);
                   return objimgs.eq(newIndex).attr('src');
                }else{
                   objcanvas.attr('data-uifm-nro',0);
                   return objimgs.eq(0).attr('src')
                }
            };
            
       uiformDCheckbox.prototype._mode2_get_img= function(obj,_index) {
                
                var ctx = obj.find('canvas')[0].getContext('2d');
             var tmp_can_width=parseInt(this.options.opt_thopt_width);
             var tmp_can_height=parseInt(this.options.opt_thopt_height);
             
                                var img = new Image();
                                img.onload = function(){
                                   // ctx.globalAlpha = 0.4;
                                    ctx.drawImage(img,0,0,tmp_can_width,tmp_can_height);
                                };
                              
                var objimgs=obj.find('.uifm-dcheckbox-item-gal-imgs a img');
                var objcanvas=obj.find('canvas');
                var newIndex=parseInt(_index);
                if(objimgs.eq(newIndex).length){
                    objcanvas.attr('data-uifm-nro',newIndex);
                   img.src=objimgs.eq(newIndex).attr('src');
                }else{
                   objcanvas.attr('data-uifm-nro',0);
                   img.src= objimgs.eq(0).attr('src')
                }
                 
            };
            
      uiformDCheckbox.prototype._getNextImageGallery= function(obj,_index) {
                
                var objimgs=obj.find('.uifm-dcheckbox-item-gal-imgs a img');
                var objcanvas=obj.find('canvas');
                var newIndex=parseInt(_index)+1;
                if(objimgs.eq(newIndex).length){
                    objcanvas.attr('data-uifm-nro',newIndex);
                   return objimgs.eq(newIndex).attr('src');
                }else{
                   objcanvas.attr('data-uifm-nro',0);
                   return objimgs.eq(0).attr('src')
                }
            };

      uiformDCheckbox.prototype._setInnerVariable = function(name, value) {
                uifm_dchkbox_var.innerVars[name] = value;
            };
      uiformDCheckbox.prototype._getInnerVariable = function(name) {
                if (uifm_dchkbox_var.innerVars[name]) {
                    return uifm_dchkbox_var.innerVars[name];
                } else {
                    return '';
                }
            };
    uiformDCheckbox.prototype.optChecked = function(value) {
        if (typeof value === "undefined") {
          return this.options.opt_checked;
        }
        this.options.opt_checked = value;
        return this.$element;
    };     
    uiformDCheckbox.prototype.man_optChecked = function(value) {
        this.optChecked(value);
        this._enableCheckboxVal(this.$opt_gal_checkbox,this);
        this._setValToChkBoxInput(this);
        return this.$element;
      };
      
      uiformDCheckbox.prototype.man_mod2_refresh = function() {
         this._mod2_initPreview();
      };
      
      uiformDCheckbox.prototype.optQtySt = function(value) {
        if (typeof value === "undefined") {
          return this.options.opt_qtySt;
        }
        this.options.opt_qtySt = value;
        return this.$element;
      };
      uiformDCheckbox.prototype.man_optQtySt = function(value) {
        this.optQtySt(value);
        if(value && parseInt(this.options.opt_checked)){
            this.$spinner_wrapper.show();
        }else{
            this.$spinner_wrapper.hide();
        }
        return this.$element;
      };
      uiformDCheckbox.prototype.refreshImgs = function() {
        
          if(parseInt(this.options.opt_laymode)===2){
            this._mod2_initPreview();
        }else{
            this._getImageToCanvas(this.$element,0,this);
        }
        return this.$element;
      };
      uiformDCheckbox.prototype.optQtyMax = function(value) {
        if (typeof value === "undefined") {
          return this.options.opt_qtyMax;
        }
        this.options.opt_qtyMax = value;
        return this.$element;
      };
      uiformDCheckbox.prototype.man_optQtyMax = function(value) {
        this.optQtyMax(value);
        this.$inp_checkbox_max.val(value);
       
        return this.$element;
      };
      uiformDCheckbox.prototype.onInit = function(value) {
        if (typeof value === "undefined") {
          return this.options.onInit;
        }
        if (!value) {
          value = $.fn.uiformDCheckbox.defaults.onInit;
        }
        this.options.onInit = value;
        return this.$element;
      };

      uiformDCheckbox.prototype.onSwitchChange = function(value) {
        if (typeof value === "undefined") {
          return this.options.onSwitchChange;
        }
        if (!value) {
          value = $.fn.uiformDCheckbox.defaults.onSwitchChange;
        }
        
        this.options.onSwitchChange = value;
        return this.$element;
      };
      
      uiformDCheckbox.prototype.get_totalCost = function() {
            var total;
            var input_spinner=this.$element.find('.uifm-dcheckbox-item-qty-num');
            total=parseFloat(input_spinner.val())*parseFloat(this.options.opt_price);
        return total;
      };
      uiformDCheckbox.prototype.get_labelOpt = function() {
        return this.options.opt_label;
      };
      uiformDCheckbox.prototype.onCostCalcProcess = function() {
         
          
          var obj_form= this.$element.closest('.rockfm-form');
            rocketfm.costest_fillSticky(obj_form);
            
        return this.$element;
      };
      
      uiformDCheckbox.prototype.destroy = function() {
        /*for reviewing*/
        var $form;
        $form = this.$element.closest("form");
        if ($form.length) {
          $form.off("reset.uiformDCheckbox").removeData("uifm-dynamic-checkbox");
        }
        this.$container.children().not(this.$element).remove();
        this.$element.unwrap().unwrap().off(".uiformDCheckbox").removeData("uifm-dynamic-checkbox");
        return this.$element;
      };

      uiformDCheckbox.prototype._elementHandlers = function() {
        return this.$element.on({
          "change.uiformDCheckbox": (function(_this) {
            return function(e, checked) {
             
              e.preventDefault();
              e.stopImmediatePropagation();
              
                //_this.onCostCalcProcess();
              return _this.$element;
            };
          })(this),
           "hover.uiformDCheckbox": (function(_this) {
            return function(e) {
              e.preventDefault();
            
            };
          })(this),
          "focus.uiformDCheckbox": (function(_this) {
            return function(e) {
              e.preventDefault();
              
            };
          })(this),
          "blur.uiformDCheckbox": (function(_this) {
            return function(e) {
              e.preventDefault();
              
            };
          })(this),
          "keydown.uiformDCheckbox": (function(_this) {
           
          })(this)
        });
      };
      
      uiformDCheckbox.prototype._elementHandlers2 = function() {
        return this.$element.on({
          "mouseover.uiformDCheckbox": (function(_this) {
            return function(e) {
              e.preventDefault();
             
                if(parseInt(_this.options.opt_laymode)===2){
                    if(parseInt(_this.options.opt_checked)===0 ){
                    _this._mode2_get_img(_this.$element,1);
                    } 
                } 
               
            };
          })(this),
          "mouseout.uiformDCheckbox": (function(_this) {
            return function(e) {
              e.preventDefault();
              
              if(parseInt(_this.options.opt_laymode)===2){
                    if(parseInt(_this.options.opt_checked)===1 ){
                        _this._mode2_get_img(_this.$element,0);
                    }else{
                         _this._mode2_get_img(_this.$element,2);
                    }
                }
            };
          })(this)
        });
      };
      
      uiformDCheckbox.prototype._galleryHandlers = function() {
       
        
        /*next button*/
        this.$opt_gal_next_img.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
           /* _this.state(false);
            return _this.$element.trigger("focus.uiformDCheckbox");*/
              e.preventDefault();
              if(parseInt(_this.options.opt_isradiobtn)===1){
                  _this._getImageToCanvas($(this).closest('.uifm-dradiobtn-item'),2,_this);
                }else{
                  _this._getImageToCanvas($(this).closest('.uifm-dcheckbox-item'),2,_this);
                }
              
              
          };
        })(this));
        
        /*prev button*/
        this.$opt_gal_prev_img.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
           /* _this.state(false);
            return _this.$element.trigger("focus.uiformDCheckbox");*/
              e.preventDefault();
              if(parseInt(_this.options.opt_isradiobtn)===1){
                  _this._getImageToCanvas($(this).closest('.uifm-dradiobtn-item'),1,_this);
                }else{
                    _this._getImageToCanvas($(this).closest('.uifm-dcheckbox-item'),1,_this);
                }
              
          };
        })(this));
        
      };
      
      uiformDCheckbox.prototype._handleHandlers = function() {
        //button - show gallery
        this.$opt_gal_btn_show.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
           /* _this.state(false);
            return _this.$element.trigger("focus.uiformDCheckbox");*/
              e.preventDefault();
              
              //triggering the gallery
              var borderless = true;
              
              
                $('#'+_this.options.baseGalleryId).data('useBootstrapModal', !borderless);
                $('#'+_this.options.baseGalleryId).data('container', '#'+_this.options.baseGalleryId);
                $('#'+_this.options.baseGalleryId).toggleClass('blueimp-gallery-controls', borderless);
                
                
                 var tmp_blueimpgal;
                try{
                    tmp_blueimpgal=blueimp.Gallery;
                }catch(err) {
                    tmp_blueimpgal=window.blueimpgal;
                } 
                 
                 tmp_blueimpgal(_this.$opt_gal_links_a, $('#'+_this.options.baseGalleryId).data());
                
                
          };
        })(this));
        
        /*checkbox button*/
        this.$opt_gal_checkbox.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
           /* _this.state(false);
            return _this.$element.trigger("focus.uiformDCheckbox");*/
             e.preventDefault();
              
             if(parseInt(_this.options.opt_isradiobtn)===1){
                  var tmp_index=$(this).closest('.uifm-dradiobtn-item').attr('data-inp17-opt-index');
                  var tmp_container=$(this).closest('.rockfm-input17-wrap');
                  var tmp_radiobtn_items=tmp_container.find('.uifm-dradiobtn-item');
                  
                  var tmp_item_index;
                  tmp_radiobtn_items.each(function (i) {
                                   
                                   tmp_item_index=$(this).attr('data-inp17-opt-index');
                                   
                                   if(parseInt(tmp_item_index)===parseInt(tmp_index)){
                                      // _this.man_optChecked(1);
                                      $(this).uiformDCheckbox('man_optChecked',1);
                                   }else{
                                       //_this.man_optChecked(0);
                                      $(this).uiformDCheckbox('man_optChecked',0); 
                                   }
                                   
                                    //refresh image
                                   if(parseInt(_this.options.opt_laymode)===2){
                                       $(this).uiformDCheckbox('man_mod2_refresh');
                                    } 
                                   
                                });
                  
                }else{
                  _this._gen_optChecked(this,_this);
                _this._enableCheckboxVal(this,_this);
                _this._setValToChkBoxInput(_this);
                }
            
             return _this.$element.trigger("change.uiformDCheckbox");
          };
        })(this));
        
        this.$opt_gal_box.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
              e.preventDefault();
             
             if(parseInt(_this.options.opt_isradiobtn)===1){
                  var tmp_index=$(this).closest('.uifm-dradiobtn-item').attr('data-inp17-opt-index');
                  var tmp_container=$(this).closest('.rockfm-input17-wrap');
                  var tmp_radiobtn_items=tmp_container.find('.uifm-dradiobtn-item');
                  
                  var tmp_item_index;
                  tmp_radiobtn_items.each(function (i) {
                                   
                                   tmp_item_index=$(this).attr('data-inp17-opt-index');
                                   
                                   if(parseInt(tmp_item_index)===parseInt(tmp_index)){
                                      // _this.man_optChecked(1);
                                      $(this).uiformDCheckbox('man_optChecked',1);
                                   }else{
                                       //_this.man_optChecked(0);
                                      $(this).uiformDCheckbox('man_optChecked',0); 
                                   }
                                    //refresh image
                                   if(parseInt(_this.options.opt_laymode)===2){
                                       $(this).uiformDCheckbox('man_mod2_refresh');
                                    } 
                                   
                                });
                  
                }else{
                    _this._gen_optChecked(_this.$opt_gal_checkbox,_this);
                    _this._enableCheckboxVal(_this.$opt_gal_checkbox,_this);
                    _this._setValToChkBoxInput(_this);
                }
              
             return _this.$element.trigger("change.uiformDCheckbox");
          };
        })(this));
        
         /*event quantity textbox*/
        this.$inp_checkbox_max.on("keyup", (function(_this) {
          return function(e) {
              e.preventDefault();
             _this._setValToChkBoxInput(_this);
             return _this.$element.trigger("change.uiformDCheckbox");
             
          };
        })(this));
        
        /*spinner button*/
        this.$spinner_buttons.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
           /* _this.state(false);
            return _this.$element.trigger("focus.uiformDCheckbox");*/
              e.preventDefault();
             _this._spinnerCounter(this,_this);
             _this._setValToChkBoxInput(_this);
             return _this.$element.trigger("change.uiformDCheckbox");
             
          };
        })(this));
        
        
        /*this.$off.on("click.uiformDCheckbox", (function(_this) {
          return function(e) {
            _this.state(true);
            return _this.$element.trigger("focus.uiformDCheckbox");
          };
        })(this));*/
      };
      
      uiformDCheckbox.prototype._spinnerCounter= function(el,_this) {
          var objbtn=$(el);
          var input_spinner=_this.$element.find('.uifm-dcheckbox-item-qty-num');
          if(_this.$element.find('.uifm-dcheckbox-item-qty-wrap button').hasClass('dcheckbox-disabled')){
            _this.$element.find('.uifm-dcheckbox-item-qty-wrap button').removeClass('dcheckbox-disabled');
          }
          
          if (objbtn.attr('data-value') == 'increase') {
              if ( input_spinner.attr('data-max') == undefined || 
                 parseInt(input_spinner.val()) < parseInt(input_spinner.attr('data-max')) 
         
                ) {
                    input_spinner.val(parseInt(input_spinner.val())+1);
                    if(parseInt(input_spinner.val())===parseInt(input_spinner.attr('data-max'))){
                        objbtn.addClass('dcheckbox-disabled');
                    }
                }else{
                    objbtn.addClass('dcheckbox-disabled');
                }
          }else{
               if ( input_spinner.attr('data-min') == undefined || parseInt(input_spinner.val()) > parseInt(input_spinner.attr('data-min')) ) {
                    input_spinner.val(parseInt(input_spinner.val())-1);
                    //verify if reached the minimum
                    if(parseInt(input_spinner.val())===parseInt(input_spinner.attr('data-min'))){
                        objbtn.addClass('dcheckbox-disabled');
                    }
                }else{
                    objbtn.addClass('dcheckbox-disabled');
                    
                }
          }
      
      };
      uiformDCheckbox.prototype._gen_optChecked= function(el,_this) {
          var objbtn=$(el);
          if(objbtn.hasClass('uifm-dcheckbox-checked')){
              _this.optChecked(0);
          }else{
              _this.optChecked(1);
          }
      };
      uiformDCheckbox.prototype._setValToChkBoxInput= function(_this) {
          _this.$inp_checkbox.val(_this.$inp_checkbox_max.val());
      };
      uiformDCheckbox.prototype._enableCheckboxVal= function(el,_this) {
          var objbtn=$(el);
          if(parseInt(this.options.opt_checked)===0){
              
              if(parseInt(this.options.opt_isradiobtn)===1){
                  objbtn.removeClass('uifm-dcheckbox-checked').html('<i class="fa fa-circle-o"></i>');
                }else{
                  objbtn.removeClass('uifm-dcheckbox-checked').html('<i class="fa fa-square-o"></i>');
                }
              _this.$inp_checkbox.prop('checked',false);
              //enable spinner
              if(_this.$spinner_wrapper&& parseInt(_this.options.opt_qtySt)===1){
                _this.$spinner_wrapper.hide();
              }
          }else{ 
              if(parseInt(this.options.opt_isradiobtn)===1){
                  objbtn.addClass('uifm-dcheckbox-checked').html('<i class="fa fa-check-circle-o"></i>');  
                }else{
                  objbtn.addClass('uifm-dcheckbox-checked').html('<i class="fa fa-check-square-o"></i>');  
                }
              _this.$inp_checkbox.prop('checked',true);
              //disable spinner
              if(_this.$spinner_wrapper && parseInt(_this.options.opt_qtySt)===1){
                _this.$spinner_wrapper.show();
              } 
          }
      };
      
     

      uiformDCheckbox.prototype._getClasses = function(classes) {
        var c, cls, _i, _len;
        if (!$.isArray(classes)) {
          return ["" + this.options.baseClass + "-" + classes];
        }
        cls = [];
        for (_i = 0, _len = classes.length; _i < _len; _i++) {
          c = classes[_i];
          cls.push("" + this.options.baseClass + "-" + c);
        }
        return cls;
      };

      return uiformDCheckbox;

    })();
    $.fn.uiformDCheckbox = function() {
      var args, option, ret;
      //read the first argument of the function
      option = arguments[0], 
      args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      ret = this;
      this.each(function() {
        var $this, data;
        $this = $(this);
        data = $this.data("uifm-dynamic-checkbox");
        if (!data) {
          $this.data("uifm-dynamic-checkbox", data = new uiformDCheckbox(this, option));
        }
        if (typeof option === "string") {
          return ret = data[option].apply(data, args);
        }
      });
      return ret;
    };
    $.fn.uiformDCheckbox.Constructor = uiformDCheckbox;
    return $.fn.uiformDCheckbox.defaults = {
      backend:'1',
      opt_isradiobtn:'0',
      baseClass: "uifm-dynamic-checkbox",
      onInit: function() {},
      onSwitchChange: function() {}
    };
})(window.$uifm, window);
// assign object this as a one parameter to the function
}).call(this);
