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
 <div class="table-responsive">
                    <form id="uiform-form-listform"
                          name="uiform-form-listform"
                          enctype="multipart/form-data"
                          method="post"
                          >
                        
                    
                    <table class="sfdc-table sfdc-table-striped sfdc-table-bordered dataTable" id="form_list">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox"
                                       
                                       onchange="rocketform.listform_selectallforms(this);"
                                       >
                            </th>
                            <th><?php echo __('Name Form', 'FRocket_admin'); ?></th>
                            <th 
                                id="guidetour-flist-shortcode"
                                data-intro="<?php echo __('Copy and paste the shortcode to your desired page', 'FRocket_admin'); ?>"
                                ><?php echo __('Shortcode', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Created', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Status', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Options', 'FRocket_admin'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( ! empty($query)) { ?>
                            <?php foreach ( $query as $row) : ?>
                        <tr>
                            <th>
                                <input type="checkbox"
                                        class="uiform-listform-chk-id"
                                       value="<?php echo $row->fmb_id; ?>"
                                       name="id[]"
                                       >
                            </th>
                            <td><?php echo $row->fmb_name; ?></td>
                            <td>
                                <a href="javascript:void(0);" onclick="javascript:rocketform.form_getcode(<?php echo $row->fmb_id; ?>);" class="sfdc-btn sfdc-btn-sm sfdc-btn-warning">
                                <?php echo __('Get shortcode', 'FRocket_admin'); ?></a>
                              
                            </td>
                            <td><?php echo $row->created_date; ?></td>
                            <td>
                                <?php
                                if ( intval($row->flag_status) === 1) {
                                    ?>
                                    <span class="label label-success">
                                       <?php echo __('Active', 'FRocket_admin'); ?> 
                                    </span>
                                    <?php
                                } elseif ( intval($row->flag_status) === 2) {
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
                                    <li>
                                    <?php if ( intval($row->fmb_type) === 0) { ?>
                                    <a 
                                            class="guidetour-flist-edit sfdc-btn sfdc-btn-sm sfdc-btn-info"
                                            data-intro="<?php echo __('Edit and load your custom form', 'FRocket_admin'); ?>"
                                            href="<?php echo site_url() . 'formbuilder/forms/create_uiform?form_id=' . $row->fmb_id; ?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Edit', 'FRocket_admin'); ?></a>
                                    <?php } elseif (intval($row->fmb_type) === 1) {?>        
                                    <a 
                                            class="guidetour-flist-edit sfdc-btn sfdc-btn-sm sfdc-btn-info"
                                            data-intro="<?php echo __('Edit and load your custom form', 'FRocket_admin'); ?>"
                                            href="<?php echo site_url() . 'formbuilder/forms/create_uiform/?is_multistep=yes&form_id=' . $row->fmb_id; ?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Edit', 'FRocket_admin'); ?></a>
                                    <?php } ?>
                                            </li>
                                            <li><a
                                                    class="zgfm-btn zgfm-btn-indigo"
                                                    href="<?php echo site_url() . 'formbuilder/records/info_records_byforms/?form_id=' . $row->fmb_id; ?>">
                                                <i class="fa fa-archive"></i> <?php echo __('Records', 'FRocket_admin'); ?></a></li>
                                    <li><a 
                                           class="guidetour-flist-del sfdc-btn sfdc-btn-sm sfdc-btn-danger uiform-confirmation-func-action"
                                            data-intro="<?php echo __('Move to trash', 'FRocket_admin'); ?>"
                                            data-dialog-title="<?php echo __('Move to trash', 'FRocket_admin'); ?>"
                                            data-dialog-callback="rocketform.listform_deleteFormById(<?php echo $row->fmb_id; ?>);"
                                           href="javascript:void(0);"><i class="fa fa-trash-o"></i> <?php echo __('Move to Trash ', 'FRocket_admin'); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                                <?php
                            endforeach;
                            ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="6">
                            <div class="sfdc-alert sfdc-alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __('there is not forms. Add new one', 'FRocket_admin'); ?></div>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table> 
                    </form>
                </div>
                
                <center>
                    <div  class="pagination-wrap"><?php echo $pagination; ?></div></center>
