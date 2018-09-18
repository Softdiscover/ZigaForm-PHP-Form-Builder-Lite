<?php
/**
 * login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="box-login">
    <div class="logo" style="float:none;text-align: center;"> 
        <img src="<?php
echo base_url();
?>assets/backend/img/logo-uiform.png" alt="UiForm - PHP Form Builder & Contact Form">          
    </div>
            <div class="row">
                <div class="sfdc-col-md-12">
                        <div class="row">
                                        <div class="widget form-signin">
                                                <div class="widget-header">
                                                        <i class="fa fa-user"></i>
                                                        <h5><?php echo __('Enter your username and password','FRocket_admin'); ?> </h5>
                                                        <div style="display:block;clear: both;">
                                                            <?php
                                                            if ($this->session->flashdata('message')) {
                                                                $resp = explode(':', $this->session->flashdata('message'))
                                                                ?>
                                                                <div class="sfdc-alert sfdc-alert-<?php
                                                                echo trim($resp[0]);
                                                                ?>">
                                                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                                                    <?php
                                                                    echo $resp[1];
                                                                    ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?> 
                                                        </div>
                                                        
                                                        
                                                </div>  
                                            <div class="widget-body clearfix" style="padding:25px;">
                                                <!-- form elements section -->
                                                <?php
                                                echo form_open('default/intranet/authenticate/', 'name="login"');
                                                ?>
                                                <div class="sfdc-form-group  clearfix">
                                                    <?php if(UIFORM_DEMO===1){?> 
                                                            <input name="username" value="demo" class="sfdc-form-control col-md-12" type="text" id="inputEmail" placeholder="Username">
                                                        <?php }else{?> 
                                                            <input name="username" class="sfdc-form-control col-md-12" type="text" id="inputEmail" placeholder="Username">
                                                        <?php }?> 
                                                        
                                                   
                                                </div>
                                                <div class="sfdc-form-group  clearfix">
                                                    <?php if(UIFORM_DEMO===1){?> 
                                                            <input name="password" value="demo" class="sfdc-form-control col-md-12" type="password" id="inputPassword" placeholder="Password">
                                                        <?php }else{?> 
                                                            <input name="password" class="sfdc-form-control col-md-12" type="password" id="inputPassword" placeholder="Password">
                                                        <?php }?> 
                                                         
                                                         <?php if(UIFORM_DEMO===1){?> 
                                                            <small class="login-page-forgot-pass"><a href="#" onclick="alert('this feature disabled on this demo');" ><?php echo __('Forgot Password','FRocket_admin'); ?></a></small>
                                                        <?php }else{?> 
                                                            <small class="login-page-forgot-pass"><a href="<?php echo site_url();?>default/intranet/recoverpass"><?php echo __('Forgot Password','FRocket_admin'); ?></a></small>
                                                        <?php }?> 
                                                </div>
                                                <div class="space10"></div>
                                                <button type="submit" class="btn sfdc-btn-large sfdc-btn-primary"><?php echo __('Sign in','FRocket_admin'); ?></button>
                                                <?php
                                                echo form_close();
                                                ?>		
                                                <!-- /form elements section -->	
                                            </div>  
                                        </div>
                        </div>
                </div>
            </div>
        </div>
	
