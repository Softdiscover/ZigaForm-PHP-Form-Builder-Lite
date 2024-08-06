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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div id="uiform-container" class="sfdc-wrap uiform-wrap zgfm-page-exporting">
    <div class="sfdc-col-md-12">
        <div class="space20"></div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <select onchange="javascript:rocketform.exportForm_loadCodebyForm();" id="uifm-list-form-cmb">
                    <?php foreach ($list_forms as $value) { ?>
                        <option value="<?php echo $value->fmb_id; ?>"><?php echo $value->fmb_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="sfdc-row">
            <h2><?php echo __('Export your form', 'FRocket_admin'); ?></h2>
        </div>
        <div class="sfdc-row">
            <div class="sfdc-alert sfdc-alert-info"><?php echo __('The export code is used for backing up your custom form. Click the COPY button to copy the export code to the clipboard. Then you can save it in a text file.', 'FRocket_admin'); ?></div>
        </div>
        <div class="sfdc-row">

            <div id="container-exporting-code">
                <textarea id="uifm_frm_exportform_code" onclick="this.select();" rows="10" style="width: 100%; padding: 5px; min-height: 92px;"></textarea>

                <button id="copy" tooltip="<?php echo __('Copy to clipboard', 'FRocket_admin'); ?>"><?php echo __('Copy', 'FRocket_admin'); ?><i class="fa fa-spinner fa-spin loading-icon" style=""></i></button>
            </div>


        </div>
        <div class="space10"></div>
    </div>

</div>
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function() {

        rocketform.exportForm_loadCodebyForm();
         
    });
    //]]>
</script>