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
?>
<div id="uiform-container" class="sfdc-wrap uiform-wrap  zgfm_page_records_byform">
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
           <select name="uifm-record-form"
           class="sfdc-form-control"
                   onchange="javascript:rocketform.records_loadDataByForm();"
                   id="uifm-record-form-cmb"
                   >
                   <?php foreach ($list_forms as $value) { ?>
            <option value="<?php echo $value->fmb_id; ?>" <?php echo ($chosen_form == (int)$value->fmb_id)?'selected':''; ?> ><?php echo $value->fmb_name; ?></option>
            <?php } ?>
            </select>
            <?php if (ZIGAFORM_F_LITE === 1) { ?>
            <a  href="javascript:void(0);"
                onclick="javascript:rocketform.showFeatureLocked(this);"
                data-blocked-feature="<?php echo __('Export Records', 'FRocket_admin'); ?>"
                   class="zgfm-btn zgfm-btn-crimson">
                       <?php echo __('Export to csv', 'FRocket_admin'); ?>
                       <span class="rkfm-express-lock-wrap"><i class="fa fa-lock"></i></span>
                       </a>
                       <?php }else{ ?>
            <a  href="javascript:void(0);"
                onclick="javascript:rocketform.listrecords_exportToCsv();"
                   class="zgfm-btn zgfm-btn-crimson">
                       <?php echo __('Export to csv', 'FRocket_admin'); ?></a>
                       <?php } ?>
        </div>
        
    </div>
    <div class="sfdc-row">
        <div id="uifm-record-results">
            
        </div>
    </div>
    
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function () {
    
    rocketform.records_loadDataByForm();
});
//]]>
</script>
