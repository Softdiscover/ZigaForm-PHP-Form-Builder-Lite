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
 * @link      https://softdiscover.com/zigaform/wordpress-form-builder/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

<?php
$style_pane = '';
if ( intval($tabindex) != 0) {
    $style_pane = 'style="display:none;"';
}
?>
<div data-uifm-step="<?php echo $tabindex; ?>"
     id="uifm-step-tab-<?php echo $tabindex; ?>"
     class="uiform-step-pane"
 >
        <div class="uiform-items-container uiform-tab-container ui-sortable">
            <?php echo $tab_html_fields; ?>
        </div>
    </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
