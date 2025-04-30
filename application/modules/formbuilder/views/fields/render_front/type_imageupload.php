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
 <div data-uifm-tabnum="<?php echo $tab_num; ?>"
     class="rockfm-fileupload-wrap">
    <div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-preview sfdc-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="sfdc-btn sfdc-btn-default btn-file">
            <span class="fileinput-new"><?php echo isset($input16['stl1']['txt_selimage']) ? $input16['stl1']['txt_selimage'] : __('Select file', 'FRocket_admin'); ?></span>
            <span class="fileinput-exists"><?php echo isset($input16['stl1']['txt_change']) ? $input16['stl1']['txt_change'] : __('Change', 'FRocket_admin'); ?></span>
            <input name="<?php echo $nameField; ?>" type="file" name="..."></span>
        <a href="#" class="sfdc-btn sfdc-btn-default fileinput-exists" data-dismiss="fileinput"><?php echo isset($input16['stl1']['txt_remove']) ? $input16['stl1']['txt_remove'] : __('Remove', 'FRocket_admin'); ?></a>
    </div>
    </div>
       <input type="hidden" name="<?php echo $nameField; ?>" value="uifm_fileinput">
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
