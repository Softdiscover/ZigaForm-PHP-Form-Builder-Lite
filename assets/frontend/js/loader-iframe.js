
require.config({
    baseUrl: UIFORM_SRC,
    paths: {
       
        script1: 'assets/frontend/js/iframe/4.1.1/iframeResizer.min'
    },
   waitSeconds: 0
});

require(['script1'], 
function(iFrameResize) {
    for( var i in _uifmvar.fm_ids ) {
        
        document.getElementById('zgfm-iframe-'+_uifmvar.fm_ids[i]).onload = function() {
         iFrameResize({
				log                     : false,
                                autoResize: true,
                                sizeWidth: true,
                                warningTimeout:0,
                                onScroll: function (coords) {
                                    /*console.log("[OVERRIDE] overrode scrollCallback x: " + coords.x + " y: " + coords.y);*/
                                }
			},'#zgfm-iframe-'+_uifmvar.fm_ids[i]);
    };
        
        
        
    }
    
    
                        
                        
});
