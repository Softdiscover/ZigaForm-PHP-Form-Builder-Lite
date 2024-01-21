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
<div id="uiform-container" class="sfdc-wrap uiform-wrap">
        <div class="sfdc-col-md-12">
            <div class="space20"></div>
            <div class="sfdc-row">
                <div class="sfdc-col-md-12">
                <select name="uifm-record-form"
                        onchange="javascript:rocketform.viewchart_load();"
                        id="uifm-record-form-cmb"
                        >
                    <?php foreach ( $list_forms as $value) { ?>
                    <option value="<?php echo $value->fmb_id; ?>"><?php echo $value->fmb_name; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="sfdc-row">
                <h2><?php echo __('View chart', 'FRocket_admin'); ?></h2>
            </div>
            <div class="sfdc-row">
                <div class="sfdc-alert sfdc-alert-info"><?php echo __('Select your custom fields to be shown on list report', 'FRocket_admin'); ?></div>
            </div>
            <div class="sfdc-row">
                <div id="uiform-viewchart-result"   ></div>
            </div>
            <div class="space10"></div>
            
        </div>
    
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function () {

   
    rocketform.viewchart_load();
  
                   
});

//]]>
</script>
