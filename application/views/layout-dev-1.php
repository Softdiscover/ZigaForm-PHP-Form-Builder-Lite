<?php
/**
 * Invoice pdf
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: invoice_pdf.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      http://php-cost-estimator.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/prev.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/init.js?<?php echo date( 'YmdHis' ); ?>"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-core.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-helper.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-tools.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-upgrade.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-err.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-general.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-fld-options.js?<?php echo date( 'YmdHis' ); ?>"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_textbox.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_textarea.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_radiobtn.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_checkbox.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_select.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_multiselect.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_fileupload.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_imageupload.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_customhtml.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_password.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_preptext.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_appetext.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_prepapptext.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_slider.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_range.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_spinner.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_captcha.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_recaptcha.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datepicker.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datepicker2.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_timepicker.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datetime.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_divider.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_colorpicker.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_ratingstar.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_hiddeninput.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_submitbtn.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_panelfld.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_heading.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_wizardbtn.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_switch.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_dyncheckbox.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_dynradiobtn.js?<?php echo date( 'YmdHis' ); ?>"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-f-gridsystem.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-panel.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/dcheckbox/uiform-dcheckbox.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/functions.js?<?php echo date( 'YmdHis' ); ?>"></script>

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgpbld-grid.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-settings.js?<?php echo date( 'YmdHis' ); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/global-universal.js?<?php echo date( 'YmdHis' ); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/global.js?<?php echo date( 'YmdHis' ); ?>"></script>
