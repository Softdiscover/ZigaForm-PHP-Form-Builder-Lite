
require.config({
    baseUrl: UIFORM_SRC,
    paths: {
       
        script1: 'assets/frontend/js/iframe/3.5.5/iframeResizer.min'
    },
   waitSeconds: 0
});

require(['script1'], 
function(iFrameResize) {
    for( var i in _uifmvar.fm_ids ) {
        iFrameResize({
				log                     : false,
                                autoResize: true,
                                sizeWidth: true,
                                scrollCallback: function (coords) {
                                    /*console.log("[OVERRIDE] overrode scrollCallback x: " + coords.x + " y: " + coords.y);*/
                                }
			},'#zgfm-iframe-'+_uifmvar.fm_ids[i]);
        
    }
    
    
                        
                        
});
