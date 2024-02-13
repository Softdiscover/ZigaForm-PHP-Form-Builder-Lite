<?php
/**
 * Layout login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: layout-login.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<!DOCTYPE html>
<html lang="en" class="uiform-wrap">
  <head>
	<meta charset="utf-8">
	<title><?php echo model_settings::$db_config['site_title']; ?> </title>
	<meta name="googlebot" content="noindex">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Softdiscover Company">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/images/favicon.ico" type="image/x-icon"/>
	<!-- jquery ui -->
	<link href="<?php echo base_url(); ?>assets/common/js/jqueryui/1.10.3/themes/start/jquery-ui.min.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/modals-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/popovers-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css" rel="stylesheet">
	
	
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/4.3.1/css/bootstrap.css" rel="stylesheet">
	
	<!-- font awesome -->
	<link href="<?php echo base_url(); ?>assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom fonts -->
	<link href="<?php echo base_url(); ?>assets/backend/css/custom/style.css" rel="stylesheet">
	<!-- animate -->
	<link href="<?php echo base_url(); ?>assets/backend/css/animate.css" rel="stylesheet">
	<!-- jasny bootstrap -->
	<link href="<?php echo base_url(); ?>assets/common/js/bjasny/jasny-bootstrap.css" rel="stylesheet">
	<!-- jscrollpane -->
	<link href="<?php echo base_url(); ?>assets/backend/js/jscrollpane/jquery.jscrollpane.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/jscrollpane/jquery.jscrollpane.lozenge.css" rel="stylesheet">
	<!-- chosen -->
	<link href="<?php echo base_url(); ?>assets/backend/js/chosen/1.8.7/chosen.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/chosen/style.css" rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/css/bootstrap-colorpicker.css" rel="stylesheet">
	<!-- bootstrap select -->
	<link href="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/css/bootstrap-select-mod.css" rel="stylesheet">
	
	<!-- bootstrap select2 -->
	<link href="<?php echo base_url(); ?>/assets/common/js/select2/4.0.13/css/select2.min.css" rel="stylesheet">
	
	<!-- bootstrap switch -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.css" rel="stylesheet">
	<!-- bootstrap slider -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.css" rel="stylesheet">
	<!-- bootstrap touchspin -->
	<link href="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.css" rel="stylesheet">
	<!-- bootstrap icon picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/biconpicker/1.9.0/css/bootstrap-iconpicker.css" rel="stylesheet">
	<!-- bootstrap date time picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/bootstrap-datetimepicker.css" rel="stylesheet">
	<!-- bootstrap date 2 -->
	<link href="<?php echo base_url(); ?>assets/common/js/flatpickr/4.6.2/flatpickr.min.css" rel="stylesheet">
	
	<!-- star rating -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bratestar/star-rating.css" rel="stylesheet">
	<!-- data tables -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bdatatable/1.10.9/jquery.dataTables.css" rel="stylesheet">
	<!-- morris -->
	<link href="<?php echo base_url(); ?>assets/backend/js/graph/morris.css" rel="stylesheet">
	<!-- introjs -->
	<link href="<?php echo base_url(); ?>assets/backend/js/introjs/introjs.css" rel="stylesheet">
	<!-- blueimp gallery min -->
	<link href="<?php echo base_url(); ?>assets/common/js/blueimp/2.16.0/css/blueimp-gallery.min.css" rel="stylesheet">
	<!-- blueimp image gallery -->
	<link href="<?php echo base_url(); ?>assets/common/js/bgallery/3.1.3/css/bootstrap-image-gallery.css" rel="stylesheet">
	<!-- checkradio -->
	<link href="<?php echo base_url(); ?>assets/common/js/checkradio/2.2.2/css/jquery.checkradios.css" rel="stylesheet">
	
	
	<?php
	if ( UIFORM_DEBUG === 1 ) {
		?>

		<link href="<?php echo base_url(); ?>assets/backend/css/admin.debug.css?v<?php echo date( 'YmdHis' ); ?>" rel="stylesheet">

		<?php
	} else {
		?>
		<link href="<?php echo base_url(); ?>assets/backend/css/admin.min.css" rel="stylesheet">
		<?php
	}

	?>
	
	  <!-- codemirror -->
	<link href="<?php echo base_url(); ?>assets/common/js/codemirror/codemirror.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/codemirror/addon/fold/foldgutter.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/js/codemirror/theme/monokai.css" rel="stylesheet">
	
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/common/js/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/backend/js/underscore-min.js"></script>
	
	<script type="text/javascript">
	var $uifm=jQuery.noConflict();
	</script>
	
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/js/bootstrap-sfdc.js"></script>
	<!-- jasny bootstrap -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bjasny/jasny-bootstrap.js"></script>
	<!-- md5 -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/md5.js"></script>
	<!-- morris -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/graph/morris.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/graph/raphael-min.js"></script>
	<!-- retina -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/retina.js"></script>
	<!-- mousewheel -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jscrollpane/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jscrollpane/jquery.jscrollpane.min.js"></script>
	<!-- chosen -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/chosen/1.8.7/chosen.jquery.min.js"></script>
	<!-- color picker mode -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/js/bootstrap-colorpicker_mod.js"></script>
	<!-- bootstrap select -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/js/bootstrap-select-mod.js"></script>
	
	<!-- bootstrap select2 -->
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/common/js/select2/4.0.13/js/select2.full.min.js"></script>
	
	<!-- bootstrap switch -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.js"></script>
	<!-- bootstrap slider -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.js"></script>
	<!-- bootstrap touchspin -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.js"></script>
	<!-- date time -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/moment-with-locales.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/bootstrap-datetimepicker.js"></script>
	
	<!-- date time 2 -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/flatpickr/4.6.2/flatpickr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/flatpickr/4.6.2/l10n/all-lang.js"></script>
	
	<!-- auto grow -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.autogrow-textarea.js"></script>
	<!-- bootstrap iconpicker -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/biconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/biconpicker/1.9.0/js/bootstrap-iconpicker.js"></script>
	<!-- star rating -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bratestar/star-rating.js"></script>
	<!-- data tables -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatatable/1.10.9/jquery.dataTables.js"></script>
	<!-- bootbox -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bootbox/bootbox.js"></script>
	<!-- intro -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/introjs/intro.js"></script>
	<!-- blueimp gallery  -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/blueimp/2.16.0/js/blueimp-gallery.min.js"></script>
	<!-- blueimp image gallery  -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bgallery/3.1.3/js/bootstrap-image-gallery.js"></script>
	<!-- lz string -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/lzstring/lz-string.min.js"></script>
	<!-- tiny mce-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/tinymce/4.3.3/tinymce.min.js"></script>
   
	<!-- checkradios-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/checkradio/2.2.2/js/jquery.checkradios.js"></script>
	
	<!-- codemirror-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/codemirror.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/addon/fold/foldcode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/addon/fold/foldgutter.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/mode/javascript/javascript.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/mode/xml/xml.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/mode/css/css.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/keymap/sublime.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/addon/edit/closebrackets.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/addon/edit/matchbrackets.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/codemirror/addon/display/autorefresh.js"></script>
	
	<!-- disable autofill-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/disableautofill/jquery.disableAutoFill.js"></script>
	
	<script type='text/javascript'>
	var rockfm_vars={"ajaxurl":"",
		"uifm_baseurl":"<?php echo base_url(); ?>",
		"uifm_siteurl":"<?php echo site_url(); ?>",
		"uifm_sfm_baseurl":"<?php echo base_url(); ?>libs/styles-font-menu/styles-fonts/png/",
		"imagesurl":"<?php echo base_url(); ?>assets/frontend/images"};
   <?php

	$file1 = base_url() . 'extensions/elfinder2/elfinder.php?XSRFToken=' . getXSRFToken( 'elFinder' );
	$file2 = base_url() . 'extensions/elfinder2/elfinder2.php?XSRFToken=' . getXSRFToken( 'elFinder' );

	$tmp_uiform_vars = do_filter(
		'zgfm_back_filter_globalvars',
		array(
			'fields_fastload' => $fields_fastload,
			'url_admin'       => site_url() . 'admin',
			'url_plugin'      => '',
			'url_elfinder1'   => $file1,
			'url_elfinder2'   => $file2,
			'app_version'     => '',
			'app_is_lite'     => ZIGAFORM_F_LITE,
			'app_demo_st'     => UIFORM_DEMO,
			'url_assets'      => base_url() . '/assets',
			'csrf_field_name' => $this->security->get_csrf_hash(),
		)
	);
	?>
	
	 var uiform_vars = <?php echo Uiform_Form_Helper::_format_json( json_encode( $tmp_uiform_vars ) ); ?>;  
		

	</script>
	
		<?php
		if ( UIFORM_DEBUG === 1 ) {
			?>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/admin.debug.js?v=<?php echo date( 'YmdHis' ); ?>"></script>
			<?php
		} else {
			?>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/admin.min.js"></script>
			<?php
		}

		?>
   
  <!--- frontend -->
  
	 <?php
		elFinder_tinymce();
		?>
	<script type="text/javascript">
 
		
	   tinymce.init({
				selector: '.uifm_tinymce_obj',
				theme: "modern",
				menubar: false,
				height: 200,
				plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media contextmenu paste code fullpage'
				],
				relative_urls : false,
				remove_script_host : false,
				convert_urls : false,
				browser_spellcheck : false ,
				verify_html: false,
				codemirror: {
				indentOnInit: true, // Whether or not to indent code on init.
				path: 'CodeMirror'
				},
				image_advtab: true,
								apply_source_formatting : false,                //added option
				toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
				toolbar2: "| image | media | link unlink anchor | forecolor backcolor | print preview code | youtube | qrcode | flickr | picasa ",
				file_browser_callback : elFinderBrowser,
				setup: function (ed) {
						ed.on('change KeyUp', function(e) {
							rocketform.captureEventTinyMCE(ed,e);
						});
					}
				});
			   
		
				  
	
	</script>
	
	<!-- font menu-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>libs/styles-font-menu/js/styles-font-menu.js"></script>
	<link href="<?php echo base_url(); ?>libs/styles-font-menu/css/styles-font-menu.css" rel="stylesheet">
	
	<?php do_action( 'admin_enqueue_scripts' ); ?>
	<?php // $this->addon->load_addons_Head(); ?>

	<?php
	//load font lib
	require_once dirname( __FILE__ ) . '/../../libs/styles-font-menu/classes/sfm-plugin.php';
	$fontLib = new SFM_Plugin();
	$fontLib->print_scripts();
	?>

  </head>
   <body class="tundra ">
	
	<div id="wrapper">
		<form id="zgfm_edit_panel"
		  onsubmit="return false;"
		  enctype="multipart/form-data" 
		  action="" 
		  accept-charset="UTF-8" 
		  name="" 
		  method="post" 
		  autocomplete="off">
	  <!-- Sidebar -->
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<?php $this->load->view( 'header' ); ?>   
	  </nav>

	  <div id="page-wrapper">
		 <div id="rocketform-bk-dashboard" class="sfdc-wrap" style="display:none;" >

			<div id="rocketform-bk-header">
				<?php require 'header-uiform.php'; ?>
			</div>
			<div id="rocketform-bk-content">
				<div id="uiform-panel-loadingst">
			<div class="uifm-loader-header-wrap">
				<div class="icon-uifm-logo-black"></div>
				<div class="uifm-loader-header-1"></div>
			</div>
		</div>
				<?php echo $content; ?>
			   
			</div>
			<div id="rocketform-bk-footer">
				<?php require 'footer.php'; ?>
			</div>
			 <?php require 'notice_footer.php'; ?>
			  
		</div>
		<?php require 'captions.php'; ?> 

	  </div><!-- /#page-wrapper -->
	  </form> 
	</div><!-- /#wrapper -->

  </body>
</html>
