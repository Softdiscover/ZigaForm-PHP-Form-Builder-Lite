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
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="col-lg-12">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('List Records.', 'FRocket_admin'); ?>
                </h5>
                
            </div>  
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dataTable" id="users">
                    <thead>
                        <tr>
                            <th><?php echo __('Name Form', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Created', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Status', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Options', 'FRocket_admin'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( ! empty($query)) { ?>
                            <?php foreach ( $query as $row) : ?>
                        <tr>
                            <td><?php echo $row->fmb_name; ?></td>
                            <td><?php echo $row->created_date; ?></td>
                            <td>
                                <?php
                                if ( intval($row->flag_status) === 1) {
                                    ?>
                                    <span class="label label-success">
                                       <?php echo __('Active', 'FRocket_admin'); ?> 
                                    </span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="label label-warning">

                                        <?php echo __('Inactive', 'FRocket_admin'); ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <div class="sfdc-btn-group">
                                    <ul class="unstyled">
                                    <li><a 
                                            class="sfdc-btn sfdc-btn-default"
                                            href="<?php echo site_url() . 'formbuilder/records/info_record?id_rec=' . $row->fbh_id; ?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Show', 'FRocket_admin'); ?></a></li>
                                    <li><a href="javascript:void(0);" 
                                           class="sfdc-btn sfdc-btn-danger uiform-confirmation-func-action"
                                           data-dialog-title="<?php echo __('Delete', 'FRocket_admin'); ?>"
                                           data-dialog-callback="rocketform.records_delreg(<?php echo $row->fbh_id; ?>);"
                                           data-recid="<?php echo $row->fbh_id; ?>">
                                            <i class="fa fa-trash-o"></i> <?php echo __('Delete', 'FRocket_admin'); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                                <?php
                            endforeach;
                            ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="5">
                            <div class="sfdc-alert sfdc-alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __('there is not forms. Add new one', 'FRocket_admin'); ?></div>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table>
                </div>
                
                <center>
                    <div  class="pagination-wrap"><?php echo $pagination; ?></div></center>
            </div> 
        </div> 
    </div>
    </div>
</div>
