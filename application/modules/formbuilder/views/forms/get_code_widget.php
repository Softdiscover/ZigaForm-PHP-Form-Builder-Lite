<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
<!-- begin zigaform code -->
<div id="uifm_container_<?php echo $id_form; ?>" class="uiform-wrap sfdc-wrap"><img src="<?php echo $base_url; ?>assets/frontend/images/loader-form.gif"></div>
<script type="text/javascript">
	var UIFORM_WWW = "<?php echo $site_url; ?>";
	var UIFORM_SRC = "<?php echo $base_url; ?>";
	var _uifmvar = _uifmvar || {};
	_uifmvar.fm_ids = _uifmvar.fm_ids || [];
	_uifmvar.fm_ids.push(['<?php echo $id_form; ?>']);
   
var rockfm_vars;  
	<?php

	if ( isset( $lmode ) && $lmode != '' ) {
		switch ( intval( $lmode ) ) {
			case 1:
				 /*iframe*/
				?>
							 _uifmvar.fm_loadmode = "iframe";   
					 <?php
				break;
		}
	}
	?>
  
	 <?php
		if ( isset($preload_noconflict) && intval( $preload_noconflict ) === 1 ) {
			?>
	   _uifmvar.fm_preload_noconflict = "1";         
		<?php } ?>
	  
	(function(){var uiform = document.createElement('script');
		uiform.type = 'text/javascript';
		uiform.async = true;
		uiform.src = ('https:' == document.location.protocol ? UIFORM_SRC : UIFORM_SRC) + '<?php echo ( UIFORM_DEBUG === 1 ) ? 'assets/frontend/js/front.init.debug.js' : 'assets/frontend/js/front.init.min.js'; ?>';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(uiform, s);})();
</script>
<noscript>
	   Powered by <a href="https://zigaform.com/?uifm_v=<?php echo model_settings::$db_config['version']; ?>" title="PHP Form Builder & Contact " >ZigaForm version <?php echo model_settings::$db_config['version']; ?></a>
</noscript>
<!-- end zigaform code -->
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
