<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
<!-- begin zigaform cached code -->
<script type="text/javascript"  src="<?php echo base_url(); ?>assets/common/js/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
	var $uifm=jQuery.noConflict();
	</script>

	
		<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-wrapper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-wrapper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/modals-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/popovers-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css" rel="stylesheet">
	
	<link href="<?php echo base_url(); ?>assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/bjasny/jasny-bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/flatpickr/4.6.2/flatpickr.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.7.14/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/css/bootstrap-colorpicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/css/bootstrap-select-mod.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/checkradio/2.2.2/css/jquery.checkradios.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/bratestar/3.5.7/css/star-rating.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/blueimp/2.16.0/css/blueimp-gallery.min.css" rel="stylesheet">
	
	<link href="<?php echo base_url(); ?>assets/common/js/bgallery/3.1.3/css/bootstrap-image-gallery.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/css.php" rel="stylesheet">
	
	<link href="<?php echo base_url(); ?>assets/frontend/css/rockfm_form<?php echo $id_form; ?>.css?<?php echo date( 'YmdHis' ); ?>" rel="stylesheet">
	
	<?php if ( ZIGAFORM_F_LITE === 0 ) { ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>application/modules/addon_func_anim/views/frontend/assets/js/waypoints/2.0.5/waypoints.min.js"></script>
	<?php } ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/iframe/4.1.1/iframeResizer.min.js"></script>
	
	<?php
	if ( $scripts ) {
		foreach ( $scripts as $key => $value ) {
			?>
			<script type="text/javascript" src="<?php echo $value; ?>"></script>
				<?php
		}
	}

	if ( $styles ) {
		foreach ( $styles as $key => $value ) {
			?>
		   <link href="<?php echo $value; ?>" rel="stylesheet">
				<?php
		}
	}

	?>
		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/js/bootstrap-sfdc.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bjasny/jasny-bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/flatpickr/4.6.2/flatpickr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/flatpickr/4.5.2/l10n/all-lang.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.7.14/moment-with-locales.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.7.14/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bratestar/3.5.7/js/star-rating.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/js/bootstrap-select-mod.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/checkradio/2.2.2/js/jquery.checkradios.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/placeholder/ie.placeholder.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/accounting/accounting.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/blueimp/2.16.0/js/blueimp-gallery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bgallery/3.1.3/js/bootstrap-image-gallery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/js.php"></script>
	
	
	
	
	
	<noscript>
	   Powered by <a href="https://zigaform.com/?uifm_v=<?php echo model_settings::$db_config['version']; ?>" title="PHP Form Builder & Contact " >ZigaForm version <?php echo model_settings::$db_config['version']; ?></a>
	</noscript>
<!-- end zigaform cached code -->
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
