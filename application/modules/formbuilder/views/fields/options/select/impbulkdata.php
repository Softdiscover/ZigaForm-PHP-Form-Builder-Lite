<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<?php
ob_start();
?>
<div class='sfdc-wrap'>
	
	<div class="sfdc-alert sfdc-alert-info">
	<strong><?php echo __( 'Info', 'FRocket_admin' ); ?></strong> <?php echo __( 'Paste the csv content, the fields have to to be delimited by "|". the headears will go in the next order: label, value, price. Check the example:  ', 'FRocket_admin' ); ?> <a href="<?php echo base_url(); ?>assets/backend/sample/select-bulkdata.csv"><?php echo __( 'Download here', 'FRocket_admin' ); ?></a>
	</div>
	
	<div class="sfdc-alert sfdc-alert-danger">
	<strong><?php echo __( 'Warning', 'FRocket_admin' ); ?></strong> <?php echo __( 'The current options of the field will be removed after importing ', 'FRocket_admin' ); ?> 
	</div>
	
	<div>
	   <textarea class="sfdc-form-control" style="width: 100%; padding: 5px; min-height: 92px;" rows="10" id="zgfm-fld-sel-opt-bulkdata"></textarea> 
	</div>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
