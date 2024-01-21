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
<div class="uiform-set-field-wrap"  >
  <div class="space20"></div>
    
    <div class="sfdc-row">
        <div class="sfdc-form-group">
            <div class="sfdc-col-sm-4">
                <label ><?php echo __('Dimensions of paper sizes in points', 'FRocket_admin'); ?></label> 
            </div>
            <div class="sfdc-col-sm-8">
                 <select name="uifm_frm_main_pdf_papersize"
                        id="uifm_frm_main_pdf_papersize">
                     <?php foreach ( $pdf_paper_size as $key => $value) { ?>
                     <option value="<?php echo $key; ?>"><?php echo $key . ' - ' . $value[2] . 'x' . $value[3]; ?></option>
                      
                     <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="space10 zgfm-opt-divider-stl1"></div>
    <div class="sfdc-row">
        <div class="sfdc-form-group">
            <div class="sfdc-col-sm-4">
                <label ><?php echo __('Orientation of Paper', 'FRocket_admin'); ?></label> 
            </div>
            <div class="sfdc-col-sm-8">
                <select name="uifm_frm_main_pdf_paperorien"
                        id="uifm_frm_main_pdf_paperorien">
                    <option value="landscape"><?php echo __('landscape', 'FRocket_admin'); ?></option>
                    <option value="letter"><?php echo __('letter', 'FRocket_admin'); ?></option>
                    <option value="portrait"><?php echo __('portrait', 'FRocket_admin'); ?></option>
                </select>
            </div>
        </div>
    </div>
     <div class="space10 zgfm-opt-divider-stl1"></div> 
     <div class="sfdc-help-block">
                           <div class="sfdc-alert sfdc-alert-info">
                               <?php echo __('Options below are only included in the pdf when your html content doesn\'t have Body and Html tag ', 'FRocket_admin'); ?>
                    </div>
                            
                            
                         </div>
    <div class="sfdc-row">
        <div class="sfdc-form-group">
            <div class="sfdc-col-sm-4">
                <label ><?php echo __('SELECT CHARACTER ENCONDING', 'FRocket_admin'); ?></label> 
            </div>
            <div class="sfdc-col-sm-8">
                 <select name="uifm_frm_email_usr_pdf_charset"
                        id="uifm_frm_email_usr_pdf_charset">
                    <option value="UTF-8">Unicode (UTF-8)</option>
                    <option value="EUC-KR">Korean</option>
                    <option value="EUC-JP">Japanese (EUC)</option>
                    <option value="Shift_JIS">Japanese (Shift-JIS)</option>
                    <option value="Big5">Chinese Traditional (Big5)</option>
                    <option value="HZ">Chinese Simplified (HZ)</option>
                    <option value="GB2312">Chinese Simplified (GB2312)</option>
                    <option value="GB18030">Chinese Simplified (GB18030)</option>
                    <option value="ISO-8859-1">Western European (ISO)</option>
                    <option value="ISO-8859-9">Turkish (ISO)</option>
                    <option value="ISO-8859-15">Latin 9 (ISO)</option>
                    <option value="ISO-8859-8">Hebrew (ISO-Visual)</option>
                    <option value="ISO-8859-8-l">Hebrew (ISO-Logical)</option>
                    <option value="ISO-8859-7">Greek (ISO)</option>
                    <option value="ISO-8859-13">Estonian (ISO)</option>
                    <option value="ISO-8859-5">Cyrillic (ISO)</option>
                    <option value="ISO-8859-2">Central European (ISO)</option>
                    <option value="ISO-8859-4">Baltic (ISO)</option>
                    <option value="ISO-8859-6">Arabic (ISO)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="space10 zgfm-opt-divider-stl1"></div> 
    <div class="sfdc-row">
         <div class="sfdc-form-group">
            <div class="sfdc-col-sm-4">
                 <label ><?php echo __('TEXT FONT', 'FRocket_admin'); ?></label>
            </div>
            <div class="sfdc-col-sm-8">
                <select class="sfdc-form-control zgfm-sfdc-form-control" id="uifm_frm_email_usr_tmpl_pdf_font" name="uifm_frm_email_usr_tmpl_pdf_font">
                    <option value="1">Courier</option>
                    <option value="2">DejaVu Sans Mono</option>
                    <option value="3">Korean</option>
                    <option value="4">Japanese</option>
                    <option value="5">Chinese</option>
                </select>
                   
            </div> 
        </div>
    </div>
    <div class="space10 zgfm-opt-divider-stl1"></div>
     <div class="sfdc-row " style="display:none;">
        <!--> it will be removed in next future version updstes -->
        
            <div class="sfdc-form-group">
                <div class="sfdc-col-md-4">
                    <label for=""><?php echo __('CONTROL WHOLE HTML CONTENT OF PDF', 'FRocket_admin'); ?></label>
                </div>
                <div class="sfdc-col-md-8">
                    
                    <input class="switch-field"
                           id="uifm_frm_main_pdf_htmlfullpage"
                           name="uifm_frm_main_pdf_htmlfullpage"
                           type="checkbox"/>
                     <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('Enable control whole html content', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                       <p class="sfdc-help-block">
                             <div class="sfdc-alert sfdc-alert-info">
                               <?php echo __('When you active this option, you have to add html, head, and body tag in the template because it allows you to have whole control of html content for pdf generation. remember this is only for all pdf content of zigaform', 'FRocket_admin'); ?>
                             </div>
                       </p>
                </div>       
            </div>
    </div>
     <?php if ( ZIGAFORM_F_LITE == 1) { ?>
        <div id="zgfm-blocked-feature-pdf-box">
            <?php $message = __('PDF Export', 'FRocket_admin'); ?>
                <?php include APPPATH . '/modules/formbuilder/views/settings/blocked_getmessage.php'; ?>
            </div>
     <?php } else { ?>
     <?php } ?>
   
    
</div>
