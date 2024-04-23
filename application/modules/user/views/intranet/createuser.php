<?php
/**
 * Create user
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: createuser.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="space20"></div>
<div class="row">
<div class="col-lg-12">
    <div class="widget widget-padding span12">
        <div class="widget-header">
            <i class="fa fa-list-alt"></i><h5><?php echo __('User Information', 'FRocket_admin'); ?> </h5>

        </div>
        <div class="widget-body">
            <div class="widget-forms sfdc-clearfix">
                <?php
                $use_id_var = ( isset($use_id) ) ? $use_id : '';
                $attributes = array(
                    'class' => 'form-horizontal',
                    'id'    => 'frmform',
                    'name'  => 'frmform',
                );
                echo form_open(site_url() . 'user/intranet/saveuser/' . $use_id_var, $attributes);
                ?>
                    <div class="sfdc-form-group">
                        <label class=" col-sm-2 control-label"><?php echo __('Username', 'FRocket_admin'); ?></label>
                        <div class="sfdc-col-sm-10">
                            <input name="use_login" type="text" placeholder="<?php echo __('Type username', 'FRocket_admin'); ?>" class="sfdc-form-control col-md-7" value="<?php echo ( isset($use_login) ) ? $use_login : ''; ?>">
                        </div>
                    </div>
                <div class="sfdc-form-group">
                        <label class=" col-sm-2 control-label"><?php echo __('Email', 'FRocket_admin'); ?></label>
                        <div class="sfdc-col-sm-10">
                            <input name="use_mail" type="text" placeholder="<?php echo __('Type email', 'FRocket_admin'); ?> " class="sfdc-form-control col-md-7" value="<?php echo ( isset($use_mail) ) ? $use_mail : ''; ?>">
                        </div>
                    </div>
                    <div class="sfdc-form-group">
                        <label class=" col-sm-2 control-label"><?php echo __('Password', 'FRocket_admin'); ?></label>
                        <div class="sfdc-col-sm-10">
                            <input name="use_password" id="use_password" type="password" placeholder="<?php echo __('Type password', 'FRocket_admin'); ?>" class="sfdc-form-control col-md-7" value="">
                        </div>
                    </div>
                    <div class="sfdc-form-group">
                        <label class=" col-sm-2 control-label"><?php echo __('Confirm password', 'FRocket_admin'); ?></label>
                        <div class="sfdc-col-sm-10">
                            <input name="use_password2" id="use_password2"  type="password" placeholder="<?php echo __('Confirm password', 'FRocket_admin'); ?>" class="sfdc-form-control col-md-7" value="">
                        </div>
                    </div>
                    <div class="sfdc-form-group">
                        <label class=" col-sm-2 control-label"><?php echo __('Status', 'FRocket_admin'); ?></label>
                        <div class="sfdc-col-sm-10">
                            <label class="sfdc-radio">
                                <input name="flag_status" id="optionsRadios1" value="1" type="radio" <?php getChecked($flag_status, 1); ?>>
                                <?php echo __('Enabled', 'FRocket_admin'); ?>
                            </label> 
                            <label class="sfdc-radio">
                                <input name="flag_status" id="optionsRadios2" value="0" type="radio" <?php getChecked($flag_status, 0); ?> >
                                <?php echo __('Disabled', 'FRocket_admin'); ?>
                            </label>
                        </div>
                    </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <div class="widget-footer">
               <?php if ( UIFORM_DEMO === 1) { ?> 
       <button  class="sfdc-btn sfdc-btn-primary" 
                                            onclick="alert('this feature disabled on this demo');"><?php echo __('Save', 'FRocket_admin'); ?></button>                                 
               <?php } else { ?> 
<button type="submit" class="sfdc-btn sfdc-btn-primary" onclick="javascript:uifmsetting.user_SaveUser();"><?php echo __('Save', 'FRocket_admin'); ?></button>
               <?php } ?> 
            
            
            
            <button type="button" class="sfdc-btn sfdc-btn-default"  onclick="javascript:uifmsetting.user_CancelUser();return false;" ><?php echo __('Cancel', 'FRocket_admin'); ?></button>
        </div>
    </div>
</div>
</div>
