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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
  <div id="uiform-clogic-graph-box">
       <?php if(!empty($clogic['fire'])){?> 
        <ul class="uiform-tree">
            <?php foreach ($clogic['fire'] as $value) {
              ?>
            <li>
                <div class="sfdc-alert sfdc-alert-success" role="alert">
                    <b><?php echo __('Field Name', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value['field_fire_fname'];?></div> |
                    <b><?php echo __('Type', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value['field_fire_typen'];?></div> |
                    <b><?php echo __('Step', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value['field_fire_fstep'];?></div> 
                </div>
                <ul>
                    <?php foreach ($value['list'] as $value2) {  ?>
                    <li><div class="sfdc-alert sfdc-alert-info" role="alert">
                            <b><?php echo __('Field Name', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value2['field_cond_fname'];?></div> |
                            <b><?php echo __('Type', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value2['field_cond_typen'];?></div> |
                            <b><?php echo __('Step', 'FRocket_admin'); ?>:</b> <div class="uifm-clogic-graph-text1"><?php echo $value2['field_cond_fstep'];?></div> 
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </li>
          <?php  } ?> 
        </ul>
     <?php }else{ ?>
      
      <div class="sfdc-alert sfdc-alert-info" role="alert">
          <?php echo __('There is no conditional logic on the form.', 'FRocket_admin'); ?>
      </div>
      <?php }?>
 </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>