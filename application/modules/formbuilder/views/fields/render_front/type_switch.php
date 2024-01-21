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
 <div class="rockfm-input15-wrap">
        <input class="rockfm-input15-switch" 
                type="checkbox"
                  
                data-uifm-tabnum="<?php echo $tab_num; ?>"
                data-uifm-txt-yes="<?php echo $input15['txt_yes']; ?>" 
                data-uifm-txt-no="<?php echo $input15['txt_no']; ?>"
                name="uiform_fields[<?php echo $id; ?>]"
                />
        
    </div>
 
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
