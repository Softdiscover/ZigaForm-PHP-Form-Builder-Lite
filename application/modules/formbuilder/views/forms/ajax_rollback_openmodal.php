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
?>
<?php
ob_start();
?>
<div class='sfdc-wrap'>
    
    <div class="sfdc-alert sfdc-alert-info">
  <strong><?php echo __('Info!', 'FRocket_admin'); ?></strong> <?php echo __('Everytime you save form, a log is created. so you can rollback to your previous form configuration. just select the date and click rollback button.', 'FRocket_admin'); ?>
</div>
    
    <table   class="sfdc-table sfdc-table-striped sfdc-table-bordered dataTable ">
        <thead>
            <tr>

                <th><?php echo __('Name form', 'FRocket_admin'); ?></th>

                <th><?php echo __('Created', 'FRocket_admin'); ?></th>

                <th><?php echo __('Options', 'FRocket_admin'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $logs as $value) {
                ?>
            <tr>
                <td><?php echo $value['form_name']; ?></td>
                <td><?php echo $value['created_date']; ?></td>
                <td>
                    <div class="sfdc-btn-group">
                        <ul class="unstyled">
                            <li><a href="javascript:void(0);"
                                   onclick="javascript:rocketform.rollback_process(<?php echo $value['log_id']; ?>);"
                                   class="sfdc-btn sfdc-btn-sm sfdc-btn-info">
                                    <i class="fa fa-pencil-square-o"></i> <?php echo __('Rollback', 'FRocket_admin'); ?></a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            
                <?php
            }
            ?>
            
            


        </tbody>
    </table>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
