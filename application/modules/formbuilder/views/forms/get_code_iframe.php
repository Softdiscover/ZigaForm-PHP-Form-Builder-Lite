<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
<!-- begin zigaform code -->
<iframe src="<?php echo $url_form; ?>" 
        scrolling="no" 
        id="zgfm-iframe-<?php echo $form_id; ?>"
        frameborder="0" 
        style="border:none;width:100%;min-height:100px" 
        allowTransparency="true"></iframe>
<script type="text/javascript">
   var UIFORM_SRC = "<?php echo $base_url; ?>";
   var _uifmvar = {};
    _uifmvar.fm_ids = _uifmvar.fm_ids || [];
    _uifmvar.fm_ids.push('<?php echo $form_id; ?>');
    
 var rockfm_vars;     
 
  (function() {
        var uiform = document.createElement('script');
        uiform.type = 'text/javascript';
        uiform.async = true;
        uiform.src = ('https:' == document.location.protocol ? UIFORM_SRC : UIFORM_SRC) + '<?php echo ( UIFORM_DEBUG === 1 ) ? 'assets/frontend/js/front.iframe.debug.js' : 'assets/frontend/js/front.iframe.min.js'; ?>';
        var s = document.getElementsByTagName('script')[0];
               s.parentNode.insertBefore(uiform, s);
           })();</script>
<noscript>
       Powered by <a href="https://softdiscover.com/zigaform/?uifm_v=<?php echo model_settings::$db_config['version']; ?>" title="PHP Form Builder & Contact" >ZigaForm version <?php echo model_settings::$db_config['version']; ?></a>
</noscript>
<!-- end zigaform code -->
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
