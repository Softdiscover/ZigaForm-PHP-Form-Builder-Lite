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
            <h2><?php echo __('Import Form', 'FRocket_admin'); ?></h2>
        </div>
        <div class="sfdc-row">
            <div class="sfdc-alert sfdc-alert-info"><?php echo __('Import your forms using the export code. Paste the code in the text area and then press the Import button. You will be redirected to the editor panel.', 'FRocket_admin'); ?></div>
            <div id="zgfm-page-import-success-msg" style="display:none;" class="sfdc-alert sfdc-alert-success"><?php echo __('Success! Redirecting...', 'FRocket_admin'); ?></div>
        </div>
        <div class="sfdc-row">

            <div id="container-exporting-code">
                <textarea id="uifm_frm_exportform_code" onclick="this.select();" rows="10" style="width: 100%; padding: 5px; min-height: 92px;"></textarea>
                
                <button id="import" tooltip="<?php echo __('Import form', 'FRocket_admin'); ?>"><?php echo __('Import', 'FRocket_admin'); ?><i class="fa fa-spinner fa-spin loading-icon" style=""></i></button>
            </div>


        </div>
        <div class="space10"></div>
    </div>

</div>
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function() {

        rocketform.importFormFromExportCode();
         
    });
    //]]>
</script>