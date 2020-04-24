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
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<link href="<?php echo base_url(); ?>assets/intranet/print/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/intranet/print/css/style.css" rel="stylesheet">
<style type="text/css">
	.invoice_container h3{
		margin-left:-20px;
	}
	.invoice_container .invoice_date{
		 margin-left:-20px;
		 margin-bottom: 20px;
	}
	.invoice_container{
	   margin: 10px 20px 20px;
	}
  </style>
  <div style="width:600px;margin: 0 100px;">
	  <?php echo $html; ?>
  </div>
