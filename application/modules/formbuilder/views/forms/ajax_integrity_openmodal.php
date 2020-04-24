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
	
	<div class="sfdc-alert sfdc-alert-danger">
  <strong><?php echo __( 'Error!', 'FRocket_admin' ); ?></strong> <?php echo __( 'An error has ocurred. Use rollback option or load the form again. if the problem continues, report the issue on next:  ', 'FRocket_admin' ); ?> <a href="http://zigaform.com/contact/">http://zigaform.com/contact/</a>
</div>
  
	<div>
		
	</div>
   
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
