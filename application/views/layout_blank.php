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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/images/favicon.ico" type="image/x-icon"/>
	<!-- jquery ui -->
	<link href="<?php echo base_url(); ?>assets/common/js/jqueryui/1.10.3/themes/start/jquery-ui.min.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/4.3.1/css/bootstrap.css" rel="stylesheet">
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
	<link href="<?php echo base_url(); ?>assets/backend/js/chosen/1.8.7/chosen.css" rel="stylesheet">
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
	<link href="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/bootstrap-datetimepicker.css" rel="stylesheet">
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/colorpicker/2.5/js/bootstrap-colorpicker.js"></script>
	<!-- bootstrap select -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/bselect/1.12.4/js/bootstrap-select-mod.js"></script>
	<!-- bootstrap switch -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bswitch/bootstrap-switch.js"></script>
	<!-- bootstrap slider -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bslider/4.12.1/bootstrap-slider.js"></script>
	<!-- bootstrap touchspin -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/btouchspin/jquery.bootstrap-touchspin.js"></script>
	<!-- date time -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/moment-with-locales.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bdatetime/4.17.45/bootstrap-datetimepicker.js"></script>
	<!-- auto grow -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.autogrow-textarea.js"></script>
	<!-- bootstrap iconpicker -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/biconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.js"></script>
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
	<!-- validation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery-validation/1.13.1/jquery.validate.min.js"></script>
	
	<!-- disable autofill-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/disableautofill/jquery.disableAutoFill.js"></script>
	
	<script type='text/javascript'>
	var rockfm_vars={"ajaxurl":"",
		"uifm_baseurl":"<?php echo base_url(); ?>",
		"uifm_siteurl":"<?php echo site_url(); ?>",
		"uifm_sfm_baseurl":"<?php echo base_url(); ?>libs/styles-font-menu/styles-fonts/png/",
		"imagesurl":"<?php echo base_url(); ?>assets/frontend/images"};
	var uiform_vars={"url_admin":"<?php echo site_url(); ?>",
		"url_plugin":"<?php echo base_url(); ?>",
		"app_version":"",
		"url_assets":"<?php echo base_url(); ?>assets",
		"app_demo_st":"<?php echo UIFORM_DEMO; ?>",
		"csrf_field_name":"<?php echo $this->security->get_csrf_hash(); ?>"
		};
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
  </head>
   <body class="tundra">
	
	<div id="wrapper">

	  <!-- Sidebar -->
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<?php $this->load->view( 'header' ); ?>   
	  </nav>

	  <div id="page-wrapper">
		  <div id="rocketform-bk-dashboard" class="sfdc-wrap">
		   
			<div id="rocketform-bk-content">
				<div id="uiform-panel-loadingst" style="display:none;">
					<div class="uifm-loader-header-wrap">
						<div class="icon-uifm-logo-black"></div>
						<div class="uifm-loader-header-1"></div>
					</div>
				</div>
				<?php echo $content; ?>
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
