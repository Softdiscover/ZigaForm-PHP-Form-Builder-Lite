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
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>
<div id="uiform-container" class="sfdc-wrap uiform-wrap">
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
           <select name="uifm-record-form"
                   onchange="javascript:rocketform.records_loadDataByForm();"
                   id="uifm-record-form-cmb"
                   >
            <?php foreach ($list_forms as $value) { ?>
            <option value="<?php echo $value->fmb_id;?>"><?php echo $value->fmb_name;?></option>
            <?php } ?>
            </select>
            <a  href="javascript:void(0);"
                onclick="javascript:rocketform.listrecords_exportToCsv();"
                   class="sfdc-btn sfdc-btn-primary">
                       <?php echo __('Export to csv','FRocket_admin');?></a>
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