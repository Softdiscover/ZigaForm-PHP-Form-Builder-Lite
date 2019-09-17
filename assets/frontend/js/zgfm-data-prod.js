/* @projectDescription Conditional logic for uiForm
 * @author Raimundo
 * @version 1.0
 * @website: http://www.softdiscover.com/
*/
(function($){
        
        var zgpbDataFrm = function(element, options){
            var cur_form_obj = $(element);
            var obj = this;
            
            var zgfmvariable = [];
            zgfmvariable.innerVars = {};
            
           var form_options = {};
           var defaults = {
                            submit_ajax:'1',
                            add_css:'',
                            add_js:'',
                            onload_scroll:'0',
                            preload_noconflict:'0',
                            pdf_charset:'UTF-8',
                            pdf_font:"2"
                        };
            if(options){
             form_options =  JSON && JSON.parse(options) || $.parseJSON(options);
            }else{
             form_options = {};   
            }
           
           var settings = $.extend(true,{}, defaults, form_options);
           
           this.setInnerVariable = function(name, value) {
                zgfmvariable.innerVars[name] = value;
            };
           
           this.getInnerVariable = function(name) {
                if (zgfmvariable.innerVars[name]) {
                    return zgfmvariable.innerVars[name];
                } else {
                    return '';
                }
            };
           
           this.getData = function(name) {
               try{
                   return settings[name];
                    }
                catch(err) {
                    return '';
                } 
               
                
            };
            this.setData = function(name,value) {
                settings[name]=value;
            };
           
           
            // Public method - can be called from client code
            this.publicMethod = function(){
            
            };

            // Private method - can only be called from within this object
            var privateMethod = function(){
            
            };
            
             
            this.showData = function(){
                 
            };
            
          
             
           
        };
        
        $.fn.zgpb_datafrm = function(options){
            return this.each(function(){
                var element = $(this);

                // Return early if this element already has a plugin instance
                if (element.data('zgpb_datafrm')) return;

                // pass options to plugin constructor
                var myplugin = new zgpbDataFrm(this, options);

                // Store plugin object in this element's data
                element.data('zgpb_datafrm', myplugin);
            });
        };
})($uifm);

