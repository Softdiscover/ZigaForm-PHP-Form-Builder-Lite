<?php
/**
 * login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Universal_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v1.20 2014-04-28 02:52:40 Softdiscover $
 * @link      http://universal-form-builder.softdiscover.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="box-login">
    <div class="logo" style="float:none;text-align: center;"> 
        <img src="
        <?php
        echo base_url();
        ?>assets/backend/img/logo-uiform.png" alt="uiForm - Universal Form Builder">          
    </div>
            <div class="row">
                <div class="sfdc-col-md-12">
                        <div class="row">
                                        <div class="widget form-signin">
                                                <div class="widget-header">
                                                        <i class="fa fa-user"></i>
                                                        <h5><?php echo __('Change password', 'FRocket_admin'); ?> </h5>
                                                        <div style="display:block;clear: both;">
                                                            <?php
                                                            if ( $this->session->flashdata('message')) {
                                                                $resp = explode(':', $this->session->flashdata('message'))
                                                                ?>
                                                                <div class="sfdc-alert sfdc-alert-
                                                                <?php
                                                                echo trim($resp[0]);
                                                                ?>
                                                                ">
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
                                            <div class="widget-body sfdc-clearfix" style="padding:25px;">
                                                <!-- form elements section -->
                                                <?php
                                                echo form_open('default/intranet/processchangepassword/?', 'name="login"');
                                                ?>
                                                <div class="sfdc-form-group">
                                                    
                                                        <input name="username" class="sfdc-form-control col-md-12" value="<?php echo $use_login; ?>" readonly type="text" id="inputEmail" placeholder="Username">
                                                    
                                                </div>
                                                <div class="sfdc-form-group">
                                                    
                                                        <input name="password" class="sfdc-form-control col-md-12" type="password" id="inputPassword" placeholder="Password">
                                                    <input name="pass_token" type="hidden" value="<?php echo $pass_token; ?>">
                                                </div>
                                                <div class="space10"></div>
                                                <div class="sfdc-form-group">
                                                    
                                                        <input name="cpassword" class="sfdc-form-control col-md-12" type="password" id="inputPassword2" placeholder="<?php echo __('Confirm Password', 'FRocket_admin'); ?>">
                                                    
                                                </div>
                                                <div class="space10"></div>
                                                <button type="submit" class="sfdc-btn sfdc-btn-large sfdc-btn-primary"><?php echo __('Update password', 'FRocket_admin'); ?></button>
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
    <script>
           $uifm(document).ready(function ($) {
                   $('form').on('submit',function(){
                    if($('#inputPassword').val()!=$('#inputPassword2').val()){
                        alert('Password not matches');
                        return false;
                    }
                    return true;
                    });
            });
      
    </script>
