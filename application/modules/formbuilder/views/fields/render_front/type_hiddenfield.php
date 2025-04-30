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
$nameField =  apply_filters('uifm_ms_render_field_front', "uiform_fields[".$id."]", $id, $type);
?>
 <textarea 
       data-uifm-tabnum="<?php echo $tab_num; ?>"
        style="display:none;"
       name="<?php echo $nameField; ?>"
       class="rockfm-txtbox-inp8-val sfdc-form-control" ><?php echo $input8['value']; ?></textarea>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
