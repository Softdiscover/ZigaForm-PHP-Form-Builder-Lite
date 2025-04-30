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
 <div class="rockfm-input7-wrap">
        <div class="sfdc-form-group">
        <div class="rockfm-input7-datepic input-group date"
             data-rkfm-showformat="<?php echo $input7['format']; ?>"
                   data-rkfm-language="<?php echo $input7['language']; ?>"
                   data-uifm-tabnum="<?php echo $tab_num; ?>"
             >
            <input type="text" 
                    
                   value=""
                   name="<?php echo $nameField; ?>"
                   class="sfdc-form-control">
            <span class="input-group-addon">
                <span class="fa fa-calendar"></span>
            </span>
        </div>
    </div>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
