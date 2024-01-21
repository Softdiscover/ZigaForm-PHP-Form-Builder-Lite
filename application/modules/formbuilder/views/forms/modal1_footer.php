<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://zigapage.softdiscover.com
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
  <button data-dismiss="modal" class="sfdc-btn sfdc-btn-primary" type="button"><?php echo __('Close', 'FRocket_admin'); ?></button> 
   
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
