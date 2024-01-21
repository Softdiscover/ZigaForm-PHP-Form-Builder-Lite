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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<?php
ob_start();
?>
<button type="button" class="sfdc-btn sfdc-btn-primary" data-dismiss="modal"><?php echo __('Close', 'FRocket_admin'); ?></button>
 <button onclick="javascript:rocketform.input2settings_ImportBulkData_process();" class="sfdc-btn sfdc-btn-success" type="button"><?php echo __('Import Data', 'FRocket_admin'); ?></button>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
