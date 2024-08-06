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
$nameField =  do_filter('uifm_ms_render_field_front', "uiform_fields[".$id."]", $id, $type);
?>
 <input class="rockfm-input-ratingstar"
       data-uifm-tabnum="<?php echo $tab_num; ?>"
       data-uifm-txt-star1="<?php echo $input9['txt_star1']; ?>"
       data-uifm-txt-star2="<?php echo $input9['txt_star2']; ?>"
       data-uifm-txt-star3="<?php echo $input9['txt_star3']; ?>"
       data-uifm-txt-star4="<?php echo $input9['txt_star4']; ?>"
       data-uifm-txt-star5="<?php echo $input9['txt_star5']; ?>"
       data-uifm-txt-norate="<?php echo $input9['txt_norate']; ?>"
       name="<?php echo $nameField; ?>"
                                     data-min="1" 
                                     data-max="5" 
                                     data-step="1">
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
