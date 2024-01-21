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
$default_template = '';
ob_start();
?>
<div >
  <table width="600" cellspacing="5" cellpadding="5" border="0" style="background: #daf1f8; border: 1px solid #000000;">
    <tbody>
      <tr>
        <th style="background-color: #91c5f2;"><?php echo __('New form request', 'FRocket_admin'); ?><br />
          </th>
      </tr>
      <tr>
        <td valign="top" style="text-align: left;"><?php echo __('You are receiving a new form request', 'FRocket_admin'); ?>:<br />
          <br />
          [uifm_var opt="rec_summ"]<br />
          <br />
          </td>
      </tr>
      <tr>
        <td style="text-align: left;">
                    <?php echo __('Form information', 'FRocket_admin'); ?>:<br/>
<?php echo __('URL', 'FRocket_admin'); ?>:[uifm_var opt="rec_url_fm"]<br />
<?php echo __('Form', 'FRocket_admin'); ?>: [uifm_var opt="form_name"]<br />
                </td>
      </tr>
    </tbody>
  </table></div>
<?php
$default_template = ob_get_clean();
?>
<div class="uiform-set-field-wrap" id="uiform-set-form-email">
    <div class="sfdc-row">
        <div class="sfdc-col-md-6">
         <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Attributes', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_from_email"><?php echo __('From Mail', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('it email goes to from mail in the message', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_from_email"
                            value="<?php echo model_settings::$db_config['admin_mail']; ?>"
                            name="uifm_frm_from_email" 
                            placeholder="<?php echo __('Type From mail', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_from_name"><?php echo __('From Name', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this goes to From Name in the message attributes', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_from_name"
                            value="<?php echo __('Here goes your From Name', 'FRocket_admin'); ?>"
                            name="uifm_frm_from_name" 
                            placeholder="<?php echo __('Type From Name', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
            <div class="sfdc-row">
                <div class="sfdc-col-md-12">
                    <div class="divider2">
                    <div class="mask"></div>

                    </div>
                </div>
            </div>
            
             <div class="sfdc-row">
                 <div class="sfdc-col-md-1">
                      
                 </div> 
                <div class="sfdc-col-md-11">
                    <div class="sfdc-form-group">
                            <label ><?php echo __('Send email to the customer?', 'FRocket_admin'); ?></label>
                            
                                <div class="sfdc-col-md-12">
                                    <input 
                                        class="switch-field"
                                        id="uifm_frm_email_usr_sendst"
                                        type="checkbox"/>
                                </div>
                            
                        </div>
                </div>
            </div>
            <!-- tabs -->
               <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="divider2">
                        <div class="mask"></div>

                        </div>
                    </div>
                </div>
            <div id="uifm-form-emailpage-mailtabs">
                            <!-- Nav tabs -->
                            <ul class="sfdc-nav sfdc-nav-tabs">
                                <li class="sfdc-active"><a href="#uifm-form-emailpage-mailtabs-tab-1" data-toggle="sfdc-tab"><h4><?php echo __('Admin', 'FRocket_admin'); ?></h4></a></li>
                                <li><a href="#uifm-form-emailpage-mailtabs-tab-2" data-toggle="sfdc-tab" class="last-child"><h4><?php echo __('Customer', 'FRocket_admin'); ?></h4></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="sfdc-tab-content">
                                <div class="sfdc-tab-pane sfdc-in sfdc-active" id="uifm-form-emailpage-mailtabs-tab-1">
                                    <div class="uiform-tab-content2">
                                        <div class="uifm-tab-inner-vars-1">
                                           
            <h3><?php echo __('Admin email', 'FRocket_admin'); ?></h3>
              
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_email_recipient"><?php echo __('Recipient mail', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('This is the recipient mail. if you leave it blank, admin mail will be taken', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_email_recipient"
                            name="uifm_frm_email_recipient" 
                            value="<?php echo model_settings::$db_config['admin_mail']; ?>"
                            placeholder="<?php echo __('user1@testmail.com', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
     <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_email_subject"><?php echo __('Subject mail', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('it is the title of the message. do not leave blank', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_email_subject"
                            value="<?php echo __('Here goes your subject mail', 'FRocket_admin'); ?>"
                            name="uifm_frm_email_subject" 
                            placeholder="<?php echo __('Type subject', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_email_cc">CC (carbon copy)
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this mail will receive a copy of the email', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_email_cc"
                            name="uifm_frm_email_cc" 
                            placeholder="<?php echo __('user1@testmail.com,user2@testmail.com', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">
                    <label for="uifm_frm_email_bcc">BCC (Blind Carbon Copy)
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this mail will receive a copy of the email without letting the others notice it', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_email_bcc"
                            name="uifm_frm_email_bcc" 
                            placeholder="<?php echo __('user1@testmail.com,user2@testmail.com', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
      <div class="sfdc-row">
                    <div class="sfdc-col-sm-12">
                        <div class="sfdc-form-group">
                                <label for="uifm_frm_email_replyto"><?php echo __('Reply To', 'FRocket_admin'); ?> <i>(<?php echo __('Choose field to put as reply in mail message', 'FRocket_admin'); ?>)</i>
                                <a href="javascript:void(0);"
                                data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('if you leave it blank, reply option will not be taken it', 'FRocket_admin'); ?>"
                                ><span class="fa fa-question-circle"></span></a>
                                </label>
                                <select 
                                    class="sfdc-form-control"
                                    data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                                    placeholder="Choose mail"
                                    id="uifm_frm_email_replyto"
                                        name="uifm_frm_email_replyto" >
                                         <option value="" selected><?php echo __('Select Field or leave it blank', 'FRocket_admin'); ?></option>
                                </select>

                        </div>
                    </div>
                </div>           
    <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                      
                <label class="sfdc-control-label" for="">
                    <?php echo __('Email Template', 'FRocket_admin'); ?>
                </label>
                <div class="sfdc-controls sfdc-form-group">
                    <?php
                    /*pending add this tinymce*/
                    $settings = array(
                        'media_buttons' => true,
                        'editor_height' => 325,
                        'textarea_rows' => 20,
                    );
                    // wp_editor($default_template, 'uifm_frm_email_tmpl',$settings );
                    ?>
                    <textarea 
                                                    class="uifm_tinymce_obj"
                                                    name="uifm_frm_email_tmpl"
                                                    id="uifm_frm_email_tmpl"><?php echo $default_template; ?></textarea>
                </div>
                                   
                </div>
            </div>
    </div>
            <div class="sfdc-row">          
                <div class="sfdc-col-sm-6">
                        <label><?php echo __('Send email sample of template ', 'FRocket_admin'); ?></label>
                        <div class="sfdc-controls sfdc-form-group">
                            <a href="javascript:void(0);" onclick="javascript:zgfm_back_tools.email_sendsample('email_admin_tmpl');" class="sfdc-btn sfdc-btn-primary">
                            <?php echo __('Send sample', 'FRocket_admin'); ?>
                            </a>
                        </div>
                </div>
            </div> 
    
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-tab-pane" id="uifm-form-emailpage-mailtabs-tab-2">
                                    <div class="uiform-tab-content2">
                                       <div class="uifm-tab-inner-vars-2">
                                            
                                           <div id="uifm_frm_email_usr_sendst_boxinner_alert">
                                               <div class="sfdc-alert sfdc-alert-danger">
                                                <strong><?php echo __('Info!', 'FRocket_admin'); ?></strong> <?php echo sprintf(__('this option is disabled. Enable this feature changing "Send email to the customer" option to "On". %s This option is located above this tab. ', 'FRocket_admin'), '<img src="' . base_url() . '/assets/backend/img/uifm_settings_email_enableclientmail.png' . '">'); ?>
                                                </div>
                                           </div>
                                            <div id="uifm_frm_email_usr_sendst_boxinner">
                 <h3><?php echo __('Customer email', 'FRocket_admin'); ?></h3>
                  <div class="sfdc-row">
                    <div class="sfdc-col-sm-12">
                        <div class="sfdc-form-group">
                                <label for="uifm_frm_email_usr_recipient"><?php echo __('Recipient mail', 'FRocket_admin'); ?> <i>(<?php echo __('Choose field to receive notification (field needs to have email validation)', 'FRocket_admin'); ?>)</i>
                                <a href="javascript:void(0);"
                                data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('This is the recipient mail. if you leave it blank, admin mail will be taken', 'FRocket_admin'); ?>"
                                ><span class="fa fa-question-circle"></span></a>
                                </label>
                                <select 
                                    class="sfdc-form-control"
                                    data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                                    placeholder="Choose mail"
                                    id="uifm_frm_email_usr_recipient"
                                        name="uifm_frm_email_usr_recipient" >
                                         <option value="" selected><?php echo __('Select Field', 'FRocket_admin'); ?></option>
                                </select>

                        </div>
                    </div>
                </div>
                <div class="sfdc-row">
                    <div class="sfdc-col-sm-12">
                        <div class="sfdc-form-group">
                                <label for="uifm_frm_email_usr_subject"><?php echo __('Subject mail', 'FRocket_admin'); ?>
                                <a href="javascript:void(0);"
                                data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('it is the title of the message. do not leave blank', 'FRocket_admin'); ?>"
                                ><span class="fa fa-question-circle"></span></a>
                                </label>
                                <input type="text" 
                                        id="uifm_frm_email_usr_subject"
                                        value="<?php echo __('Here goes your subject mail', 'FRocket_admin'); ?>"
                                        name="uifm_frm_email_usr_subject" 
                                        placeholder="<?php echo __('Type subject', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
                        </div>
                    </div>
                </div>
                <div class="sfdc-row">
                    <div class="sfdc-col-sm-12">
                        <div class="sfdc-form-group">
                                <label for="uifm_frm_email_usr_cc">CC (carbon copy)
                                <a href="javascript:void(0);"
                                data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this mail will receive a copy of the email', 'FRocket_admin'); ?>"
                                ><span class="fa fa-question-circle"></span></a>
                                </label>
                                <input type="text" 
                                        id="uifm_frm_email_usr_cc"
                                        name="uifm_frm_email_usr_cc" 
                                        placeholder="<?php echo __('user1@testmail.com,user2@testmail.com', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
                        </div>
                    </div>
                </div>
                <div class="sfdc-row">
                    <div class="sfdc-col-sm-12">
                        <div class="sfdc-form-group">
                                <label for="uifm_frm_email_usr_bcc">BCC (Blind Carbon Copy)
                                <a href="javascript:void(0);"
                                data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this mail will receive a copy of the email without letting the others notice it', 'FRocket_admin'); ?>"
                                ><span class="fa fa-question-circle"></span></a>
                                </label>
                                <input type="text" 
                                        id="uifm_frm_email_usr_bcc"
                                        name="uifm_frm_email_usr_bcc" 
                                        placeholder="<?php echo __('user1@testmail.com,user2@testmail.com', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
                        </div>
                    </div>
                </div>
                <div class="sfdc-row">
                <div class="sfdc-col-sm-12">
                    <div class="sfdc-form-group">
                            <label for="uifm_frm_email_usr_replyto"><?php echo __('Reply To', 'FRocket_admin'); ?>
                            <a href="javascript:void(0);"
                            data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('if you leave it blank, reply option will not be taken it', 'FRocket_admin'); ?>"
                            ><span class="fa fa-question-circle"></span></a>
                            </label>
                            <input type="text" 
                                    id="uifm_frm_email_usr_replyto"
                                    name="uifm_frm_email_usr_replyto" 
                                    placeholder=""  class="sfdc-form-control">   
                    </div>
                </div>
                </div> 
                  
                <div class="sfdc-row">
                        <div class="sfdc-col-sm-12">
                            <div class="sfdc-form-group">

                            <label class="sfdc-control-label" for="">
                                <?php echo __('Email Template', 'FRocket_admin'); ?>
                            </label>
                            <div class="sfdc-controls sfdc-form-group">
                                <?php
                                /*pending add this tinymce*/
                                $settings = array(
                                    'media_buttons' => true,
                                    'editor_height' => 325,
                                    'textarea_rows' => 20,
                                );
                                    // wp_editor($default_template, 'uifm_frm_email_usr_tmpl',$settings );
                                ?>
                                <textarea 
                                                    class="uifm_tinymce_obj"
                                                    name="uifm_frm_email_usr_tmpl"
                                                    id="uifm_frm_email_usr_tmpl"><?php echo $default_template; ?></textarea>
                            </div>

                            </div>
                        </div>
                </div>
                  <div class="sfdc-row">
                        <div class="sfdc-col-sm-6">
                                <label><?php echo __('Send email sample of template ', 'FRocket_admin'); ?></label>
                                <div class="sfdc-controls sfdc-form-group">
                                    <a href="javascript:void(0);" onclick="javascript:zgfm_back_tools.email_sendsample('email_client_tmpl');" class="sfdc-btn sfdc-btn-primary">
                                    <?php echo __('Send sample', 'FRocket_admin'); ?>
                                    </a>
                                </div>
                        </div>
                    </div> 
                   <?php if ( ZIGAFORM_F_LITE == 1) { ?>
                   <?php } else { ?>
                 <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="divider2">
                                                <div class="mask"></div>
                                                <span><i><?php echo __('Attach pdf', 'FRocket_admin'); ?></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sfdc-row">
                                        <div class="sfdc-col-md-6">
                                            
                                              <div class="sfdc-form-group">
                                                                                    <label ><?php echo __('Attach custom pdf to customer mail message', 'FRocket_admin'); ?></label>

                                                                                    <div class="sfdc-col-md-12">
                                                                                        <input 
                                                                                            class="switch-field"
                                                                                            id="uifm_frm_email_usr_attachpdfst"
                                                                                            type="checkbox"/>
                                                                                    </div>

                                                                                </div>
                                            
                                          
                                            
                                        </div>
                                        <div class="sfdc-col-md-6">
                                            
                                        </div>
                                    </div>
                                    <div id="uifm-tab-inner-vars-3" >
                                        <div class="sfdc-row">
                                            <div class="sfdc-col-sm-12">
                                                <div class="sfdc-form-group">

                                                    <label class="sfdc-control-label" for="">
                                                        <?php echo __('Template for attachment pdf ', 'FRocket_admin'); ?>
                                                    </label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <?php
                                                        /* pending add this tinymce */
                                                        $settings = array(
                                                            'media_buttons' => true,
                                                            'editor_height' => 325,
                                                            'textarea_rows' => 20,
                                                        );
                                                        // wp_editor($default_template, 'uifm_frm_email_usr_tmpl_pdf',$settings );
                                                        ?>
                                                        <textarea 
                                                        class="uifm_tinymce_obj"
                                                        name="uifm_frm_email_usr_tmpl_pdf"
                                                        id="uifm_frm_email_usr_tmpl_pdf"><?php echo $default_template; ?></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="sfdc-row">
                                            <div class="sfdc-col-sm-6">
                                                <div class="sfdc-form-group">
                                                    <label for="uifm_frm_email_usr_bcc"><?php echo __('File name', 'FRocket_admin'); ?>
                                                        <a data-original-title="the attachd pdf will take this custom name" 
                                                           data-placement="right" data-toggle="tooltip"
                                                           href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                                    </label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <textarea 
                                                            class="sfdc-col-sm-12"
                                                        name="uifm_frm_email_usr_tmpl_pdf_fn"
                                                        id="uifm_frm_email_usr_tmpl_pdf_fn">attachment-pdf-[uifm_var opt="rec_id"]</textarea>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="sfdc-col-sm-6">
                                                 <label><?php echo __('Show PDF sample ', 'FRocket_admin'); ?></label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <a href="javascript:void(0);" onclick="javascript:zgfm_back_tools.pdf_showsample('pdf_email_attach');" class="sfdc-btn sfdc-btn-primary">
                                                        <?php echo __('Show sample', 'FRocket_admin'); ?>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div>


                                    </div>   
                   <?php } ?>
    
            </div>
                                            
                                            
                                            
            
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
            
 
        </div>
        <div class="sfdc-col-md-6">
   <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="divider2">
            <div class="mask"></div>
            <span><i><?php echo __('Variables', 'FRocket_admin'); ?></i></span>
            </div>
        </div>
    </div>
    <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                   <label class="sfdc-control-label" for=""><?php echo __('Variables', 'FRocket_admin'); ?>: <i>(<?php echo __('To be used in Email Template', 'FRocket_admin'); ?>)</i> </label>
                    
                        <div class="uifm-form-var-box">
                            <!-- Nav tabs -->
                            <ul class="sfdc-nav sfdc-nav-tabs">
                                <li class="sfdc-active"><a href="#uiform-form-mailset-vars-tab-1" data-toggle="sfdc-tab"><?php echo __('Form', 'FRocket_admin'); ?></a></li>
                                <li><a href="#uiform-form-mailset-vars-tab-2" data-toggle="sfdc-tab" class="last-child"><?php echo __('General', 'FRocket_admin'); ?></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="sfdc-tab-content">
                                <div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-form-mailset-vars-tab-1">
                                    <div class="uiform-tab-content2">
                                        <div class="uifm-tab-inner-vars-1">
                                            <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2"><?php echo __('Field', 'FRocket_admin'); ?></th>
                                                        <th colspan="3"><?php echo __('Codes', 'FRocket_admin'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo __('label', 'FRocket_admin'); ?></th>
                                                        <th><?php echo __('input', 'FRocket_admin'); ?></th>
                                                        <th><?php echo __('quantity', 'FRocket_admin'); ?></th>
                                                        <th><?php echo __('wrapper', 'FRocket_admin'); ?> <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" data-original-title="you can use this to show content depending if the field has ticked and has a value. if the field has no been ticked or doesnt have a value. the content inside this shortcode will not appear. "><span class="fa fa-question-circle"></span></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="sfdc-tab-pane" id="uiform-form-mailset-vars-tab-2">
                                    <div class="uiform-tab-content2">
                                       <div class="uifm-tab-inner-vars-2">
                                            <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
                                                <thead>
                                                    <tr>
                                                        <th width="150"><?php echo __('variables', 'FRocket_admin'); ?></th>
                                                        <th ><?php echo __('Code', 'FRocket_admin'); ?></th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo __('Summary of submitted data', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width:298px;" onclick="this.select();">[uifm_var opt="rec_summ"]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Form Url', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width:298px;" onclick="this.select();">[uifm_var opt="rec_url_fm"]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Form name', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width: 284px;" onclick="this.select();">[uifm_var opt="form_name"]</textarea></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><?php echo __('Form record id', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width: 284px;" onclick="this.select();">[uifm_var opt="rec_id"]</textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                </div>
            </div>
    </div>    
    
        </div>
    </div>
    
   
 
    
    <div class="sfdc-row">
        <div class="sfdc-col-md-6">
            
        </div>
        <div class="sfdc-col-md-6">
              
            
            
        </div>
        
        
    </div>
    
   
</div>
<script type="text/javascript">
//<![CDATA[

 
$uifm(document).ready(function ($) {
    
  
    $('#uifm_frm_email_usr_sendst').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
        var f_val=(state)?1:0;
        if(f_val===1){
            $('#uifm_frm_email_usr_sendst_boxinner').show();
            $('#uifm_frm_email_usr_sendst_boxinner_alert').hide();
        }else{
           $('#uifm_frm_email_usr_sendst_boxinner').hide(); 
           $('#uifm_frm_email_usr_sendst_boxinner_alert').show(); 
        }
    });
    
    var selectedValue=$('#uifm_frm_email_usr_sendst').bootstrapSwitchZgpb('state');
    if(selectedValue){
       $('#uifm_frm_email_usr_sendst_boxinner').show(); 
       $('#uifm_frm_email_usr_sendst_boxinner_alert').hide(); 
    }else{
        $('#uifm_frm_email_usr_sendst_boxinner').hide();
        $('#uifm_frm_email_usr_sendst_boxinner_alert').show();
    }
       
  /* attach custom pdf to client*/
        $('#uifm_frm_email_usr_attachpdfst').on('switchChange.bootstrapSwitchZgpb', function (event, state) {
            var f_val = (state) ? 1 : 0;
            if (f_val === 1) {
                $('#uifm-tab-inner-vars-3').show();
            } else {
                $('#uifm-tab-inner-vars-3').hide();
            }
        });

        var selectedValue = $('#uifm_frm_email_usr_attachpdfst').bootstrapSwitchZgpb('state');
        if (selectedValue) {
            $('#uifm-tab-inner-vars-3').show();
        } else {
            $('#uifm-tab-inner-vars-3').hide();
        }
      
});


//]]>
</script>
