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
ob_start();
?>
 <button data-uifm-tabnum="<?php echo $tab_num; ?>"
	   class="rockfm-txtbox-inp-val sfdc-btn"
			type="submit"
			data-val-btn="<?php echo $input['value']; ?>"
			data-val-subm="<?php echo __( 'Sending', 'FRocket_admin' ); ?>"
			
			 ><?php echo $input['value']; ?></button>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();

echo $cntACmp;
?>
