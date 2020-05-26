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
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<!DOCTYPE html>
<html lang="en" class="uiform-wrap sfdc-wrap">
  <head>
	<meta charset="utf-8">
	<title><?php echo model_settings::$db_config['site_title']; ?> </title>
	<meta name="googlebot" content="noindex">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Softdiscover Company">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/common/img/favicon.ico" type="image/x-icon"/>
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/modals-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/popovers-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css" rel="stylesheet">
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
	<link href="<?php echo base_url(); ?>assets/backend/js/chosen/chosen.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/js/chosen/style.css" rel="stylesheet">
	<!-- color picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/css/bootstrap-colorpicker.css" rel="stylesheet">
	<!-- bootstrap select -->
	<link href="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/css/bootstrap-select-mod.css" rel="stylesheet">
	<!-- bootstrap switch -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.css" rel="stylesheet">
	<!-- bootstrap slider -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.css" rel="stylesheet">
	<!-- bootstrap touchspin -->
	<link href="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.css" rel="stylesheet">
	<!-- bootstrap icon picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/biconpicker/1.9.0/css/bootstrap-iconpicker.css" rel="stylesheet">
	<!-- bootstrap date time picker -->
	<link href="<?php echo base_url(); ?>assets/backend/js/bdatetime/bootstrap-datetimepicker.css" rel="stylesheet">
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
	<!-- filemanager-->
	<link href="<?php echo base_url(); ?>extensions/elfinder2/codemirror/lib/codemirror.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>extensions/elfinder2/codemirror/theme/3024-day.css" rel="stylesheet">
	
	<link rel="Favicon Icon" href="favicon.ico">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/common/js/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/backend/js/underscore-min.js"></script>
	<!-- filemanager-->
	<script type="text/javascript"  src="<?php echo base_url(); ?>extensions/elfinder2/codemirror/lib/codemirror.js"></script>
	
   <script type="text/javascript">
	var $uifm=jQuery.noConflict();
	var UIFORM_SRC = "<?php echo base_url(); ?>";
	</script>
	
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<?php if ( UIFORM_DEMO === 0 ) { ?>
   <script data-main="<?php echo base_url(); ?>extensions/elfinder2/main.default_alt2.js" src="<?php echo base_url(); ?>extensions/elfinder2/js/require.min.js"></script>
   <script>
			define('elFinderConfig', {
				// elFinder options (REQUIRED)
				// Documentation for client options:
				// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
				defaultOpts : {
					url : UIFORM_SRC+'extensions/elfinder2/php/connector.minimal_mode2.php' // connector URL (REQUIRED)
					,commandsOptions : {
						edit : {

												mimes : [],

												editors : [{

												mimes : ['text/plain', 'text/html', 'text/javascript', 'text/css', 'text/x-php', 'application/x-php'],

												load : function(textarea) {
													var mimeType = this.file.mime;
													var filename = this.file.name;
													// CodeMirror configure
													editor = CodeMirror.fromTextArea(textarea, {
														//mode: 'css',
														indentUnit: 4,
														lineNumbers: true,
														theme: "3024-day",
														viewportMargin: Infinity,
														lineWrapping: true,
														//gutters: ["CodeMirror-lint-markers"],
														lint: true
													});
													return editor;
													

												},
												close : function(textarea, instance) {
												this.myCodeMirror = null;
												},

												save: function(textarea, editor) {
													jQuery(textarea).val(editor.getValue());
													}

												} ]
												}
						,quicklook : {
							// to enable CAD-Files and 3D-Models preview with sharecad.org
							sharecadMimes : ['image/vnd.dwg', 'image/vnd.dxf', 'model/vnd.dwf', 'application/vnd.hp-hpgl', 'application/plt', 'application/step', 'model/iges', 'application/vnd.ms-pki.stl', 'application/sat', 'image/cgm', 'application/x-msmetafile'],
							// to enable preview with Google Docs Viewer
							googleDocsMimes : ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/postscript', 'application/rtf'],
							// to enable preview with Microsoft Office Online Viewer
							// these MIME types override "googleDocsMimes"
							officeOnlineMimes : ['application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.oasis.opendocument.text', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.presentation']
						}
					}
					// bootCalback calls at before elFinder boot up 
					,bootCallback : function(fm, extraObj) {
						/* any bind functions etc. */
						fm.bind('init', function() {
							// any your code
						});
						// for example set document.title dynamically.
						var title = document.title;
						fm.bind('open', function() {
							var path = '',
								cwd  = fm.cwd();
							if (cwd) {
								path = fm.path(cwd.hash) || null;
							}
							document.title = path? path + ':' + title : title;
						}).bind('destroy', function() {
							document.title = title;
						});
					},
										defaultView : 'list',
										resizable: true,
										height:  jQuery(window).height() - 200,
										customData: {
							'XSRFToken':'<?php echo getXSRFToken( 'elFinder' ); ?>'
							}
				},
								
				managers : {
					// 'DOM Element ID': { /* elFinder options of this DOM Element */ }
					'elfinder': {}
				},
							
						  
			});
		</script>
<?php } ?>  
  </head>
 <body class="tundra">
	
	<div id="wrapper">

	  <!-- Sidebar -->
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<?php $this->load->view( 'header' ); ?>   
	  </nav>

	  <div id="page-wrapper">
		  <div id="rocketform-bk-dashboard" class="sfdc-wrap">
			<div id="rocketform-bk-header">
				<?php require 'header-blank.php'; ?>
			</div>
			<div id="rocketform-bk-content">
				<div id="uiform-panel-loadingst" style="display:none;">
					<div class="uifm-loader-header-wrap">
						<div class="icon-uifm-logo-black"></div>
						<div class="uifm-loader-header-1"></div>
					</div>
				</div>
				<?php if ( UIFORM_DEMO === 0 ) { ?>
					<?php echo $content; ?>
					<?php
				} else {
					?>
				<div class="space20"></div>   
					<?php
					echo 'this feature is disabled on this demo';
				}
				?>
				<div class="clear"></div>
			</div>
			<div id="rocketform-bk-footer">
				<?php require 'footer.php'; ?>
			</div>
			 <?php require 'notice_footer.php'; ?>
		</div>
		<?php require 'captions.php'; ?>

	  </div><!-- /#page-wrapper -->

	</div><!-- /#wrapper -->
  </body>
</html>
