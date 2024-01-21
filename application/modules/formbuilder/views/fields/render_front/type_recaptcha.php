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
 <?php
    switch ( intval($input5['g_theme'])) {
        case 1:
            $input5_theme = 'dark';
            break;
        default:
            $input5_theme = 'light';
            break;
    }
    ?>
<div 
     <?php if ( intval($validate['typ_val']) > 0) { ?>
                data-val-type="<?php echo $validate['typ_val']; ?>"
                <?php
                $validate_custxt = $validate['typ_val_custxt'];
                if ( empty($validate['typ_val_custxt'])) {
                    switch ( intval($validate['typ_val'])) {
                        default:
                            /*required*/
                            $validate_custxt = __('this is required', 'FRocket_admin');
                            break;
                    }
                }
                ?>
                data-val-custxt="<?php echo $validate_custxt; ?>"
                data-val-pos="<?php echo $validate['pos']; ?>"
                data-val-tip-col="<?php echo $validate['tip_col']; ?>"
                data-val-tip-bg="<?php echo $validate['tip_bg']; ?>"
     <?php } ?>
    class="rockfm-input5-wrap">
        <div class="g-recaptcha" 
             data-sitekey="<?php echo $input5['g_key_public']; ?>"
             data-theme="<?php echo $input5_theme; ?>"
             ></div>
    </div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
