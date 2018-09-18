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
<div id="uiform-container" data-uiform-page="" class="sfdc-wrap uiform-wrap">
        <div class="sfdc-col-md-12">
            <div class="space20"></div>
            <div id="uifm-backup-response"></div>
           
            <div class="uiform-settings-inner-box">
                <div class="sfdc-row">
        <div class="col-lg-12">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('Backup','FRocket_admin');?>
                </h5>
               
            </div>  
            <div class="widget-body">
               <div class="widget-forms clearfix">
                  
                   <div class="sfdc-form-group">
                       <label class="sfdc-col-md-2 control-label"><?php echo __('Name backup','FRocket_admin');?></label>
                       <div class="sfdc-col-md-10">
                           <input type="text" id="_uifm_backup_namebkp" name="_uifm_backup_namebkp" style="max-width: 200px;display:inline;" class="sfdc-form-control"> 
                           <a class="uifm-global-tooltip" href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="top" 
                       data-original-title="<?php echo __('Enter a backup name or leave blank, current date will be assigned to backup name','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                       
                         <?php if(UIFORM_DEMO===1){?>
                           <button type="button"
                                   onclick="alert('this feature disabled on this demo');"
                                   class="sfdc-btn sfdc-btn-primary"><?php echo __('Create backup','FRocket_admin');?></button> 
                        <?php }else{?>
                          <button type="button"
                                   onclick="javascript:rocketform.backup_create(this);"
                                   class="sfdc-btn sfdc-btn-primary"><?php echo __('Create backup','FRocket_admin');?></button>  
                        <?php }?>
                       </div>
                   </div>
                   <div class="space20"></div>
                   <div class="sfdc-form-group">
                       
                       <div class="table-responsive">
                    <table class="table table-striped table-bordered dataTable" id="form_list">
                    <thead>
                        <tr>
                            <th style="max-width: 50px;"></th>
                            <th><?php echo __('Name','FRocket_admin')?></th>
                            <th><?php echo __('Size','FRocket_admin')?></th>
                            <th><?php echo __('Date','FRocket_admin')?></th>
                            <th><?php echo __('Options','FRocket_admin')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($files)){?>
<?php foreach ($files as $value): ?>
                        <tr>
                            <td> <i class="fa fa-database"></i></td>
                            <td><?php echo $value['file_name'];?></td>
                            <td><?php echo $value['file_size'];?></td>
                            <td><?php echo $value['file_date'];?></td>
                            <td>
                                <div class="sfdc-btn-group">
                                    <ul class="unstyled">
                                    <li><a 
                                            class="sfdc-btn sfdc-btn-sm sfdc-btn-info"
                                            href="<?php echo $value['file_url'];?>"  download>
                                            <i class="fa fa-cloud-download"></i> <?php echo __('Download','FRocket_admin')?></a></li>
                                     <li><a 
                                           class="sfdc-btn sfdc-btn-sm sfdc-btn-warning"
                                            data-uifm-file="<?php echo $value['file_name'];?>"
                                            onclick="javascript:rocketform.backup_PopUpRestore(this);"
                                           href="javascript:void(0);"><i class="fa fa-database"></i> <?php echo __('Restore Backup','FRocket_admin')?></a></li>
                                    <li><a 
                                           class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
                                            data-uifm-file="<?php echo $value['file_name'];?>"
                                            onclick="javascript:rocketform.backup_PopUpDelete(this);"
                                           href="javascript:void(0);"><i class="fa fa-trash-o"></i> <?php echo __('Delete','FRocket_admin')?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
    <?php 
endforeach; 
    ?>
                        <?php }else{?>
                        <tr>
                            <td colspan="5">
                            <div class="sfdc-alert sfdc-alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __('there is not backup stored. Create new one','FRocket_admin')?></div>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table> 
                  
                </div>
                       
                     
                   </div> 
                    <form  action="<?php echo site_url();?>formbuilder/settings/backup_settings" method="post" enctype="multipart/form-data">
                   <div class="sfdc-row">
                       <div class="sfdc-col-md-6">
                           <div class="fileinput fileinput-new sfdc-input-group" data-provides="fileinput">
                                <div class="sfdc-form-control" data-trigger="fileinput">
                                    <i class="sfdc-glyphicon sfdc-glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="sfdc-input-group-addon sfdc-btn sfdc-btn-default btn-file">
                                    <span class="fileinput-new"><?php echo __('Select file','FRocket_admin'); ?></span>
                                    <span class="fileinput-exists"><?php echo __('Change','FRocket_admin'); ?></span>
                                    <input name="uifm_bkp_fileupload" type="file" name="..."></span>
                                <a href="#" class="sfdc-input-group-addon sfdc-btn sfdc-btn-default fileinput-exists" 
                                    data-dismiss="fileinput"><?php echo __('Remove','FRocket_admin'); ?></a>
                            </div>
                       </div>
                       <div class="sfdc-col-md-6">
                           <?php if(UIFORM_DEMO===1){?>
                           
                        <?php }else{?>
                            <button type="submit" class="sfdc-btn sfdc-btn-primary" value="Submit"><i class="fa fa-upload"></i> <?php echo __('Upload Backup','FRocket_admin'); ?></button>
                        <?php }?>
        <input type="hidden" name="mod" value="formbuilder">
        <input type="hidden" name="controller" value="settings">
        <input type="hidden" name="action" value="backup_settings">
        <input type="hidden" name="_uifm_bkp_submit_file" value="1">
                       </div>
                   </div>
              
</form>
                         
                         
               </div>
                
                <div class="clear"></div>
            </div>
            <div class="widget-footer">
                <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                            href="javascript:void(0);"
                            onclick="rocketform.globalsettings_saveOptions();"
                            >
                            <i class="fa fa-floppy-o"></i>
                        <?php echo __('Save changes','FRocket_admin')?>
                        </a>
        </div>
        </div> 
    </div>
    </div>
            </div>
        </div>
    
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function () {
    
});
//]]>
</script>
<div style="display:none;">
    <input type="hidden" id="uifm_bkp_msg_success_restore" value="<?php echo __('Database backup success','FRocket_admin'); ?>" >
    <input type="hidden" id="uifm_bkp_del_box_title" value="<?php echo __('Delete File selected','FRocket_admin'); ?>" >
    <input type="hidden" id="uifm_bkp_restore_box_title" value="<?php echo __('Restore Backup','FRocket_admin'); ?>" >
</div>