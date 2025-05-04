<?php
/**
 * Frontend layout
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: frontend_layout.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?php echo model_settings::$db_config['site_title']; ?> </title>

	<meta name="viewport" content="width=device-width, user-scalable=0">
	<meta name="author" content="Softdiscover Company">
	<meta http-equiv="X-UA-Compatible" content="IE=9">
	<meta http-equiv="X-UA-Compatible" content="IE=11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0, private" >
	<meta http-equiv="Pragma" content="no-cache" >
	<meta http-equiv="Expires" content="0" >
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/images/favicon.ico" type="image/x-icon"/>

	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-wrapper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-wrapper.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/modals-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/popovers-sfdc.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css" rel="stylesheet">

	  <!-- font awesome -->
	<link href="<?php echo base_url(); ?>assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/frontend/css/style-site.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lte IE 9]>
	  <script src="<?php echo base_url(); ?>assets/frontend/js/html5.js"></script>
	  <script src="<?php echo base_url(); ?>assets/frontend/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/common/js/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
	var $uifm=jQuery.noConflict();
	</script>

  <noscript>
	   Powered by <a href="https://softdiscover.com/zigaform/?uifm_v=<?php echo model_settings::$db_config['version']; ?>" title="PHP Form Builder" >ZigaForm version <?php echo model_settings::$db_config['version']; ?></a>
   </noscript>
  </head>
  <body class="sfdc-wrap" style="margin:0!important;" >
   <div id="wrap" >

   <div class="sfdc-container theme-showcase wrapper wrapper-white">
		<?php
    if(intval(model_settings::$db_config['opt_hide_form_front']) !== 1){
        $this->load->view( 'frontend/header' );
        echo $content;
    }else{
      ?>
      <div class="sfdc-panel sfdc-panel-default" style="margin: 60px auto; max-width: 600px; text-align: center; padding: 40px;">
        <div class="sfdc-panel-body">
          <i class="fa fa-info-circle" style="font-size: 48px; color: #888;"></i>
          <h3 style="margin-top: 20px;"><?php echo __( 'No public forms available', 'FRocket_admin' ); ?></h3>
          <p style="color: #555;"><?php echo __( 'Forms have been hidden by the site administrator.', 'FRocket_admin' ); ?></p>
        </div>
      </div>
        <?php
    }
    ?>
	 </div>

   </div><!-- wrap ends-->
	<?php $this->load->view( 'frontend/footer' ); ?>
  </body>
</html>
