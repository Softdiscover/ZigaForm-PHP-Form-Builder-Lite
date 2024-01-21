<?php
/**
 * Index
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="space20"></div>
<?php
if ( $this->session->flashdata('message')) {
    $resp = explode(':', $this->session->flashdata('message'))
    ?>
    <div class="sfdc-alert sfdc-alert-<?php echo trim($resp[0]); ?>">
        <button data-dismiss="alert" class="close" type="button">×</button>
    <?php echo $resp[1]; ?>
    </div>
    <?php
}
?>
<div class="row">
<div class="col-lg-12">
    <div class="widget widget-padding span12">
        <div class="widget-header">
            <i class="fa fa-list-alt"></i>
            <h5><?php echo __('Users', 'FRocket_admin'); ?></h5>
            <div class="widget-buttons">
                <a class="tip" href="<?php echo site_url(); ?>user/intranet/createuser"><i class="fa fa-plus"></i></a>
            </div>
        </div>  
        <div class="widget-body">
            <table class="table table-striped table-bordered dataTable" id="users">
                <thead>
                    <tr>
                        <th><?php echo __('User', 'FRocket_admin'); ?></th>
                        <th><?php echo __('Created', 'FRocket_admin'); ?> </th>
                        <th><?php echo __('Status', 'FRocket_admin'); ?> </th>
                        <th><?php echo __('Options', 'FRocket_admin'); ?> </th>
                    </tr>
                </thead>
                <tbody>
<?php foreach ( $query as $row) : ?>
                        <tr>
                            <td><?php echo $row->use_login; ?></td>
                            <td><?php echo $row->created_date; ?></td>
                            <td>
    <?php
    if ( $row->flag_status) {
        ?>
                                    <span class="label label-success">

                                       <?php echo __('active', 'FRocket_admin'); ?>  
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
                                    <a href="#" data-toggle="dropdown" class="sfdc-btn sfdc-btn-default dropdown-toggle">
                                        <?php echo __('Action', 'FRocket_admin'); ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                         <?php if ( UIFORM_DEMO === 1) { ?> 
                                        <li><a href="javascript:void(0);"
                                            onclick="alert('this feature disabled on this demo');"><i class="fa fa-pencil-square-o"></i> <?php echo __('Edit User', 'FRocket_admin'); ?></a></li>
                                        <li><a href="javascript:void(0);"
                                            onclick="alert('this feature disabled on this demo');"><i class="fa fa-trash-o"></i> <?php echo __('Delete', 'FRocket_admin'); ?></a></li>
                                         <?php } else { ?> 
                                        <li><a href="<?php echo site_url(); ?>user/intranet/edituser/<?php echo $row->use_id; ?>"><i class="fa fa-pencil-square-o"></i> <?php echo __('Edit User', 'FRocket_admin'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>user/intranet/delete/<?php echo $row->use_id; ?>"><i class="fa fa-trash-o"></i> <?php echo __('Delete', 'FRocket_admin'); ?></a></li>
                                         <?php } ?> 
                                        
                                        
                                        
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
    <?php
endforeach;
?>
                </tbody>
            </table>
            <center>
                <div  class="pagination-wrap"><?php echo $this->pagination->create_links(); ?></div></center>
        </div>
    </div>
</div>    
</div>
