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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/prev.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/init.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-core.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-helper.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-tools.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-upgrade.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-err.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-general.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgfm-back-fld-options.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_textbox.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_textarea.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_radiobtn.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_checkbox.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_select.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_multiselect.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_fileupload.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_imageupload.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_customhtml.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_password.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_preptext.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_appetext.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_prepapptext.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_slider.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_range.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_spinner.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_captcha.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_recaptcha.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datepicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datepicker2.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_timepicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_datetime.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_divider.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_colorpicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_ratingstar.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_hiddeninput.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_submitbtn.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_panelfld.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_heading.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_wizardbtn.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_switch.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_dyncheckbox.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform_dynradiobtn.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-f-gridsystem.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-panel.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/common/js/dcheckbox/uiform-dcheckbox.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/functions.js"></script>

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zgpbld-grid.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/uiform-settings.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/global-universal.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/global.js"></script>
 