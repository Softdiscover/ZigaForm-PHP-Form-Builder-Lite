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
 <div class="rockfm-input19-wrap">
        <div class="sfdc-form-group">
        <div class="uifm-input-flatpickr sfdc-input-group date"
             data-rkfm-enabletime="<?php echo $input_date2['enabletime'];?>"
                   data-rkfm-nocalendar="<?php echo $input_date2['nocalendar'];?>"
                   data-rkfm-time24hr="<?php echo $input_date2['time_24hr'];?>"
                   data-rkfm-altinput="<?php echo $input_date2['altinput'];?>"
                   data-rkfm-altformat="<?php echo $input_date2['altformat'];?>"
                   data-rkfm-dateformat="<?php echo $input_date2['dateformat'];?>"
                   data-rkfm-language="<?php echo $input_date2['language'];?>"
                   data-rkfm-mindate="<?php echo $input_date2['mindate'];?>"
                   data-rkfm-maxdate="<?php echo $input_date2['maxdate'];?>"
                   data-rkfm-defaultdate="<?php echo $input_date2['defaultdate'];?>"
                   data-uifm-tabnum="<?php echo $tab_num;?>"
             >
            <input type="text" 
                   value=""
                   name="uiform_fields[<?php echo $id;?>]"
                   class="sfdc-form-control" data-input>
            <span class="sfdc-input-group-addon" data-toggle>
                <span class="fa fa-calendar"></span>
            </span>
            <span class="sfdc-input-group-addon" data-clear>
                <span class="fa fa-times"></span>
            </span>
        </div>
    </div>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>