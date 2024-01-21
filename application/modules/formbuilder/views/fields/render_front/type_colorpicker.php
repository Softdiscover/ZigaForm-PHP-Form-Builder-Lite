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
ob_start();
?>
 <div class="sfdc-input-group rockfm-colorpicker-wrap"
      data-uifm-tabnum="<?php echo $tab_num; ?>"
     >
        <input type="text" value="" 
               name="uiform_fields[<?php echo $id; ?>]"
                    class="sfdc-form-control" />
        <span class="sfdc-input-group-addon"><i></i></span>
    </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
