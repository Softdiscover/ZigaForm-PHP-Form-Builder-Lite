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
 <button 
    data-uifm-tabnum="<?php echo $tab_num;?>"
    disabled="disabled"
    data-val-btn="<?php echo $input13['value_lbl'];?>"
    <?php if(isset($form_wizard['enable_st'])&& intval($form_wizard['enable_st'])===1&& count($tab_count['tab_title'])>1){?>
    onclick="javascript:rocketfm.wizard_prevButton(this);return false;"
    <?php }else{ ?>
    <?php }?>
    class="sfdc-btn rockfm-btn-wizprev">
        <i class="fa fa-arrow-left"></i>
        <div class="rockfm-inp-lbl"><?php echo $input13['value_lbl'];?></div>
</button>
<button 
    data-uifm-tabnum="<?php echo $tab_num;?>"
    data-value-last="<?php echo $input12['value_lbl_last'];?>"
    data-value-next="<?php echo $input12['value_lbl'];?>"
    <?php if(isset($form_wizard['enable_st'])&& intval($form_wizard['enable_st'])===1 && count($tab_count['tab_title'])>1){?>
    onclick="javascript:rocketfm.wizard_nextButton(this);return false;"
    <?php }else{ ?>
    type="submit"
    data-val-subm="<?php echo __('Sending','FRocket_admin'); ?>"
    onclick="javascript:rocketfm.submitForm(this);return false;"
    <?php }?>
    class="sfdc-btn rockfm-btn-wiznext">
        <div class="rockfm-inp-lbl"><?php echo $input12['value_lbl'];?></div>
        <i class="fa fa-arrow-right"></i>
</button>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>