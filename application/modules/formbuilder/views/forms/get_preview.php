<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
<div id="uifm_frm_modal_html_loader"><img src="<?php echo base_url() . '/assets/backend/image/ajax-loader-black.gif'; ?>"></div>
<!-- begin zigaform code -->
<iframe src="<?php echo $url_form; ?>" 
        scrolling="no" 
        id="zgfm-iframe-<?php echo $form_id; ?>"
        frameborder="0" 
        style="border:none;width:100%;min-height:100px" 
        allowTransparency="true"></iframe>
        <script type="text/javascript">
            document.getElementById('zgfm-iframe-<?php echo $form_id; ?>').onload = function() {
                document.getElementById("uifm_frm_modal_html_loader").style.display = 'none';
                iFrameResize({
                    log: false,
                    onScroll: function(coords) {
                        /*console.log("[OVERRIDE] overrode scrollCallback x: " + coords.x + " y: " + coords.y);*/
                    }
                }, '#zgfm-iframe-<?php echo $form_id; ?>');
            };
        </script>
 
 
<!-- end zigaform code -->
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
