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
 <div class="rockfm-input7-wrap">
        <div class="sfdc-form-group">
            <div class="rockfm-input7-timepic input-group date"
                  data-uifm-tabnum="<?php echo $tab_num; ?>"
                 >
                <input type="text"
                        
                        name="uiform_fields[<?php echo $id; ?>]"
                        class="sfdc-form-control">
                <span class="input-group-addon">
                    <span class="sfdc-glyphicon sfdc-glyphicon-time"></span>
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
