uifm_load_cssfiles();
var $uifm;
var rockfm_vars;
var ZIGAFORM_F_LITE=0;

if(ZIGAFORM_F_LITE===1){
    require.config({
        baseUrl: UIFORM_SRC,
        paths: {
            'jqueryInternal': 'assets/common/js/jquery/1.11.3/jquery.min',
            'jqueryNoConflict':'assets/frontend/js/jquery/jquery.no-conflict',
            jquery_ui: 'assets/common/js/jqueryui/1.11.4/jquery-ui.min',
            bootstrap: 'assets/common/bootstrap/3.3.7/js/bootstrap-sfdc',
            b_slider: 'assets/backend/js/bslider/4.12.1/bootstrap-slider.min',
            b_jasny: 'assets/common/js/bjasny/jasny-bootstrap',
            b_touchspin: 'assets/backend/js/btouchspin/jquery.bootstrap-touchspin',
            flatpickr: 'assets/common/js/flatpickr/4.5.2/flatpickr',
            flatpickr_moment: 'assets/common/js/flatpickr/4.5.2/l10n/all-lang',
            moment: 'assets/backend/js/bdatetime/moment-with-locales',
            b_dtpicker2: 'assets/backend/js/bdatetime/bootstrap-datetimepicker',
            b_star: 'assets/backend/js/bratestar/3.5.7/js/star-rating',
            b_cpicker: 'assets/backend/js/colorpicker/2.5/js/bootstrap-colorpicker',
            b_selpicker: 'assets/common/js/bselect/1.12.4/js/bootstrap-select-mod',
            b_switch: 'assets/backend/js/bswitch/bootstrap-switch',
            b_checkradios: 'assets/common/js/checkradio/2.2.2/js/jquery.checkradios',
            placeholder: 'assets/common/js/placeholder/ie.placeholder',
            j_form: 'assets/frontend/js/jquery.form',
            script1: 'assets/frontend/js/script',
            'blueimp-gallery-jquery': 'assets/common/js/blueimp/2.27.0/js/jquery.blueimp-gallery',
            'bootstrap-image-gallery': 'assets/common/js/bgallery/3.1.3/js/bootstrap-image-gallery',
            'iframescript': 'assets/frontend/js/iframe/4.1.1/iframeResizer.min'
        },
       waitSeconds: 0,
       map: {
            '*': {
                'blueimp-gallery': 'assets/common/js/blueimp/2.27.0/js/blueimp-gallery',

            }
        },
        "deps":[
            "jqueryNoConflict"
        ],
        shim: {
            'jqueryNoConflict': {exports: "$"},
            'jquery_ui': {
                deps: ['jqueryNoConflict'] },
            'bootstrap': {
                deps: ['jqueryNoConflict'] },
            'b_jasny': {
                deps: ['jqueryNoConflict','bootstrap'] },
            'b_slider': {
                deps: ['jqueryNoConflict'], 
                exports: '$.fn.slider'},
            'b_selpicker': {
                deps: ['jqueryNoConflict','bootstrap'], 
                exports: 'selectpicker'},
            'b_touchspin': {
                deps: ['jqueryNoConflict'] } ,
            'b_switch': {
                deps: ['jqueryNoConflict']},
            'flatpickr': {
                deps: ['jqueryNoConflict','bootstrap'], 
                exports: "Flatpickr"},
            'flatpickr_moment': {
                deps: ['flatpickr']},
            'b_dtpicker2': {
                deps: ['jqueryNoConflict','moment'], 
                exports: "$.fn.datepicker"},
            'moment': {
                deps: ['jqueryNoConflict']},
            'b_star': {
                deps: ['jqueryNoConflict']},
            'b_cpicker': {
                deps: ['jqueryNoConflict']},
            'j_form': {
                deps: ['jqueryNoConflict']},
            "blueimp-gallery": {
                "exports": "blueimpgal"
            }

        }
    });
}else{
    require.config({
    baseUrl: UIFORM_SRC,
    paths: {
        'jqueryInternal': 'assets/common/js/jquery/1.11.3/jquery.min',
        'jqueryNoConflict':'assets/frontend/js/jquery/jquery.no-conflict',
        jquery_ui: 'assets/common/js/jqueryui/1.11.4/jquery-ui.min',
        bootstrap: 'assets/common/bootstrap/3.3.7/js/bootstrap-sfdc',
        b_slider: 'assets/backend/js/bslider/4.12.1/bootstrap-slider.min',
        b_jasny: 'assets/common/js/bjasny/jasny-bootstrap',
        b_touchspin: 'assets/backend/js/btouchspin/jquery.bootstrap-touchspin',
        flatpickr: 'assets/common/js/flatpickr/4.5.2/flatpickr',
        flatpickr_moment: 'assets/common/js/flatpickr/4.5.2/l10n/all-lang',
        moment: 'assets/backend/js/bdatetime/moment-with-locales',
        b_dtpicker2: 'assets/backend/js/bdatetime/bootstrap-datetimepicker',
        b_star: 'assets/backend/js/bratestar/3.5.7/js/star-rating',
        b_cpicker: 'assets/backend/js/colorpicker/2.5/js/bootstrap-colorpicker',
        b_selpicker: 'assets/common/js/bselect/1.12.4/js/bootstrap-select-mod',
        b_switch: 'assets/backend/js/bswitch/bootstrap-switch',
        b_checkradios: 'assets/common/js/checkradio/2.2.2/js/jquery.checkradios',
        placeholder: 'assets/common/js/placeholder/ie.placeholder',
        j_form: 'assets/frontend/js/jquery.form',
        script1: 'assets/frontend/js/script',
        'blueimp-gallery-jquery': 'assets/common/js/blueimp/2.27.0/js/jquery.blueimp-gallery',
        'bootstrap-image-gallery': 'assets/common/js/bgallery/3.1.3/js/bootstrap-image-gallery',
        'waypoints': 'application/modules/addon_func_anim/views/frontend/assets/js/waypoints/2.0.2/waypoints.min',
        'iframescript': 'assets/frontend/js/iframe/4.1.1/iframeResizer.min'
    },
   waitSeconds: 0,
   map: {
        '*': {
            'blueimp-gallery': 'assets/common/js/blueimp/2.27.0/js/blueimp-gallery',
           
        }
    },
    "deps":[
        "jqueryNoConflict"
    ],
    shim: {
        'jqueryNoConflict': {exports: "$"},
        'jquery_ui': {
            deps: ['jqueryNoConflict'] },
        'bootstrap': {
            deps: ['jqueryInternal','jqueryNoConflict'] },
        'b_jasny': {
            deps: ['jqueryNoConflict','bootstrap'] },
        'b_slider': {
            deps: ['jqueryNoConflict'], 
            exports: '$.fn.slider'},
        'b_selpicker': {
            deps: ['jqueryNoConflict','bootstrap'], 
            exports: 'selectpicker'},
        
        'b_touchspin': {
            deps: ['jqueryNoConflict'] } ,
        'b_switch': {
            deps: ['jqueryNoConflict']},
        'flatpickr': {
            deps: ['jqueryNoConflict','bootstrap'], 
            exports: "Flatpickr"},
        'flatpickr_moment': {
            deps: ['flatpickr']},
        'b_dtpicker2': {
            deps: ['jqueryNoConflict','moment'], 
            exports: "$.fn.datepicker"},
        'moment': {
            deps: ['jqueryNoConflict']},
        'waypoints': {
            deps: ['jqueryNoConflict'], 
            exports: "$.fn.waypoint"},
        'b_star': {
            deps: ['jqueryNoConflict']},
        'b_cpicker': {
            deps: ['jqueryNoConflict']},
        'j_form': {
            deps: ['jqueryNoConflict']},
        "blueimp-gallery": {
            "exports": "blueimpgal"
        }
        
    }
});
}



if(ZIGAFORM_F_LITE===1){
    require(["jqueryNoConflict"], 
        function(jQuery) {
             (function ($uifm) {
                    /*
                     * start using jQuery normally here
                     */
                     window.$uifm = $uifm;
                      //window.$uifm = $uifm = $; 
             require(['b_slider','script1','b_touchspin','b_switch','bootstrap','flatpickr','flatpickr_moment','b_dtpicker2','b_star','b_cpicker','j_form','blueimp-gallery','blueimp-gallery-jquery','b_selpicker','iframescript','b_checkradios','b_jasny','placeholder'], 
            function(slider,script,TouchSpin,BootstrapSwitch,_bootstrap,flatpickr,flatpickr_moment,datetimepicker,rating,colorpicker,ajaxSubmit,blueimpgal,selectpicker,iframescript) {

                _zgfm_loader_form(script,blueimpgal);

            });

             })(jQuery);

        });
}else{
    require(["jqueryNoConflict"], 
        function(jQuery) {
             (function ($uifm) {
                    /*
                     * start using jQuery normally here
                     */
                     window.$uifm = $uifm;
                      //window.$uifm = $uifm = $; 
             require(['b_slider','script1','b_touchspin','b_switch','bootstrap','flatpickr','flatpickr_moment','b_dtpicker2','b_star','b_cpicker','j_form','blueimp-gallery','blueimp-gallery-jquery','b_selpicker','iframescript','waypoints','b_checkradios','b_jasny','placeholder'], 
            function(slider,script,TouchSpin,BootstrapSwitch,_bootstrap,flatpickr,flatpickr_moment,datetimepicker,rating,colorpicker,ajaxSubmit,blueimpgal,selectpicker,waypoints,iframescript) {

                _zgfm_loader_form(script,blueimpgal);

            });

             })(jQuery);

        });
}


function _zgfm_loader_form(script,blueimpgal){
     window.blueimpgal=blueimpgal;
     
     rockfm_vars={"ajaxurl":"",
        "uifm_baseurl": UIFORM_SRC,
        "uifm_siteurl":UIFORM_WWW,
        "uifm_sfm_baseurl":UIFORM_SRC+"libs/styles-font-menu/styles-fonts/png/",
        "imagesurl":UIFORM_SRC+"assets/frontend/images"};
    
    for (var key in _uifmvar['addon']) {
            if (_uifmvar['addon'].hasOwnProperty(key)) {
                for (var key2 in _uifmvar['addon'][key]) {
                    for (var key3 in _uifmvar['addon'][key][key2]) {
                     
                    switch(key3){
                        case 'scripts':
                            for (var key4 in _uifmvar['addon'][key][key2][key3]) {
                               uifm_load_scripts(_uifmvar['addon'][key][key2][key3][key4]['src'],_uifmvar['addon'][key][key2][key3][key4]['id']);
                               
                            }
                            break;
                        case 'styles':
                            
                            for (var key4 in _uifmvar['addon'][key][key2][key3]) {
                                uifm_load_one_cssfile(_uifmvar['addon'][key][key2][key3][key4]['src'],_uifmvar['addon'][key][key2][key3][key4]['id']);
                            }
                            
                        break;
                    }
                   } 
                } 
               
            }
         }
    
    script(UIFORM_SRC+'assets/frontend/js/js.php', 'uifm_js');
    script.ready('uifm_js', function() {
    var  uifm_jq14 = $uifm; 
    (function ($) {
        rocketfm();
        rocketfm.initialize();
        rocketfm.setExternalVars(_uifmvar);
        
        $.each(_uifmvar.fm_ids, function( index, value ) {
            if(parseInt(value[0])>0){
                    rocketfm.run_form(value[0]);
            }
            
        });
     }(uifm_jq14));                
     });
}

 function uifm_load_scripts(src,id){
    if (!document.getElementById(id))
     {
         var s = document.createElement('script');
        s.src = src;
        s.async = true;
        document.head.appendChild(s);
        //return s;
     }
    
}

function uifm_load_one_cssfile(src,id){
    
    if (!document.getElementById(id))
     {
     var fileref=document.createElement("link");
                    fileref.setAttribute("rel", "stylesheet");
                    fileref.setAttribute("type", "text/css");
                    fileref.setAttribute("id", id);
                    fileref.setAttribute("media", "all");
                    fileref.setAttribute("href", src);
                    document.getElementsByTagName("head")[0].appendChild(fileref);                   
    }
    
                    
}


function uifm_load_cssfiles(){
 
    var uifm_loadcssfile = function(cssFilesArr){
               for(var i in cssFilesArr) { 
                    if (!document.getElementById(cssFilesArr[i].id))
                    {
                        var fileref=document.createElement("link");
                    fileref.setAttribute("rel", "stylesheet");
                    fileref.setAttribute("type", "text/css");
                    fileref.setAttribute("id", cssFilesArr[i].id);
                    fileref.setAttribute("media", "all");
                    fileref.setAttribute("href", cssFilesArr[i].href);
                    document.getElementsByTagName("head")[0].appendChild(fileref);
                    }
                }
                
        }

           //load css
        var uifm_cssFiles = [{id:"uifm_css_font_a",
                              href:UIFORM_SRC+'assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css'}
                          , {id:"uifm_css_b_jasny",
                              href:UIFORM_SRC+'assets/common/js/bjasny/jasny-bootstrap.css'}
                          , {id:"uifm_css_b_slider",
                              href:UIFORM_SRC+'assets/backend/js/bslider/4.12.1/bootstrap-slider.min.css'}
                          , {id:"uifm_css_b_touchspin",
                              href:UIFORM_SRC+'assets/backend/js/btouchspin/jquery.bootstrap-touchspin.css'}
                          , {id:"uifm_css_b_date",
                              href:UIFORM_SRC+'assets/common/js/flatpickr/4.5.2/flatpickr.min.css'}
                          , {id:"uifm_css_b_date_2",
                              href:UIFORM_SRC+'assets/backend/js/bdatetime/bootstrap-datetimepicker.css'}
                          , {id:"uifm_css_b_cpicker",
                              href:UIFORM_SRC+'assets/backend/js/colorpicker/2.5/css/bootstrap-colorpicker.css'}
                          , {id:"uifm_css_b_selpicker",
                              href:UIFORM_SRC+'assets/common/js/bselect/1.12.4/css/bootstrap-select-mod.css'}
                          , {id:"uifm_css_b_checkradio",
                              href:UIFORM_SRC+'assets/common/js/checkradio/2.2.2/css/jquery.checkradios.css'}
                          , {id:"uifm_css_star_rating",
                              href:UIFORM_SRC+'assets/backend/js/bratestar/3.5.7/css/star-rating.css'}
                          , {id:"uifm_css_b_switch",
                              href:UIFORM_SRC+'assets/backend/js/bswitch/bootstrap-switch.css'}
                          , {id:"uifm_css_blueimp",
                              href:UIFORM_SRC+'assets/common/js/blueimp/2.16.0/css/blueimp-gallery.min.css'}
                          , {id:"uifm_css_b_imgal",
                              href:UIFORM_SRC+'assets/common/js/bgallery/3.1.3/css/bootstrap-image-gallery.css'}
                          , {id:"uifm_css_global",
                              href:UIFORM_SRC+'assets/frontend/css/css.php'}
                            ];
               
            var uifm_preload_noconflict = _uifmvar.fm_preload_noconflict || "1";
            uifm_preload_noconflict =1;
            if(parseInt(uifm_preload_noconflict)===1){
                uifm_cssFiles.unshift({
                                id: 'uifm_css_bootstrap_w',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/bootstrap-wrapper.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme_w',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/bootstrap-theme-wrapper.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_bootstrap',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme_1',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme_2',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/modals-sfdc.css'
                                 }); 
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme_3',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/popovers-sfdc.css'
                                 }); 
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme_4',
                                href: UIFORM_SRC+'assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css'
                                 });                  
                /*uifm_cssFiles.unshift({
                                id: 'uifm_css_def_bootstrap',
                                href: UIFORM_SRC+'assets/common/js/bootstrap/custom/defbootstrap.css'
                                 });   */               
                                  
            }else{
                uifm_cssFiles.unshift({
                                id: 'uifm_css_bootstrap',
                                href: UIFORM_SRC+'assets/common/js/bootstrap/custom/bootstrap.css'
                                 });
                uifm_cssFiles.unshift({
                                id: 'uifm_css_b_theme',
                                href: UIFORM_SRC+'assets/common/js/bootstrap/custom/bootstrap-theme.css'
                                 });
            } 
           //load css of form      
              var tmp_element = {};
              var tmp_fmid;
              
              for(var i in _uifmvar.fm_ids) {
                tmp_fmid =_uifmvar.fm_ids[i][0]||null;
                if(parseInt(tmp_fmid)>0){
                    tmp_element = {
                                id: 'uifm_css_'+_uifmvar.fm_ids[i][0],
                                href: UIFORM_SRC+'assets/frontend/css/rockfm_form'+_uifmvar.fm_ids[i][0]+'.css?'+Math.round(+new Date()/1000)
                                 };
                   uifm_cssFiles.push(tmp_element);
                }
                  
              }
              
              uifm_loadcssfile(uifm_cssFiles);
              
}