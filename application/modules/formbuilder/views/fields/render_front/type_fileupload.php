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
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
 <div data-uifm-tabnum="<?php echo $tab_num;?>"
     class="rockfm-fileupload-wrap">
    <div class="fileinput fileinput-new sfdc-input-group" data-provides="fileinput">
        <div class="sfdc-form-control" data-trigger="fileinput">
            <i class="sfdc-glyphicon sfdc-glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
        <span class="sfdc-input-group-addon sfdc-btn sfdc-btn-default btn-file">
            <span class="fileinput-new"><?php echo __('Select file','FRocket_admin'); ?></span>
            <span class="fileinput-exists"><?php echo __('Change','FRocket_admin'); ?></span>
            <input name="uiform_fields[<?php echo $id;?>]" type="file" name="..."></span>
        <a href="#" class="sfdc-input-group-addon sfdc-btn sfdc-btn-default fileinput-exists" 
            data-dismiss="fileinput"><?php echo __('Remove','FRocket_admin'); ?></a>
    </div>
    <input type="hidden" name="uiform_fields[<?php echo $id;?>]" value="uifm_fileinput">
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>