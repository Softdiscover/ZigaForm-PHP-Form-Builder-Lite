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
$default_template = '';
ob_start();
?>
<div >
  <table width="600" cellspacing="5" cellpadding="5" border="0" style="background: #daf1f8; border: 1px solid #000000;">
    <tbody>
      <tr>
        <th style="background-color: #91c5f2;"><?php echo __('Summary', 'FRocket_admin'); ?><br />
          </th>
      </tr>
      <tr>
        <td valign="top" style="text-align: left;"><?php echo __('you information is shown on next:', 'FRocket_admin'); ?>:<br />
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
<div class="uiform-set-field-wrap">
    
     <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="divider2">
                                                <div class="mask"></div>
                                                <span><i><?php echo __('Custom Template ', 'FRocket_admin'); ?></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="sfdc-form-group">
                                                <label ><?php echo __('Enable custom template for Summary Records and PDF', 'FRocket_admin'); ?></label>
                                                <div class="sfdc-col-md-12">
                                                    <input 
                                                        class="switch-field"
                                                        id="uifm_frm_record_tpl_enable" 
                                                        
                                                        <?php
                                                        if ( isset($uifm_frm_record_tpl_enable)) {
                                                            echo ( intval($uifm_frm_record_tpl_enable) === 1 ) ? 'checked' : '';
                                                        }
                                                        ?>
                                                        
                                                        type="checkbox"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
    
    
    
                                    <div id="uifm-tab-inner-reo-tpl-3" >
                                         <div class="space10 zgfm-opt-divider-stl1"></div>
                                        <div class="sfdc-row">
                                       
                                            <div class="sfdc-col-sm-6">
                                                    <label><?php echo __('Sample ', 'FRocket_admin'); ?></label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <a href="javascript:void(0);" onclick="javascript:zgfm_back_tools.pdf_showsample('pdf_record_gen');" class="sfdc-btn sfdc-btn-primary">
                                                        <?php echo __('Show PDF sample', 'FRocket_admin'); ?>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div> 
                                        
                                        <div class="sfdc-row">
                                            <div class="sfdc-col-sm-12">
                                                <div class="sfdc-form-group">

                                                    <label class="sfdc-control-label" for="">
                                                        <?php echo __('Custom template ', 'FRocket_admin'); ?>
                                                    </label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <?php
                                                        /* pending add this tinymce */
                                                        $settings = array(
                                                            'media_buttons' => true,
                                                            'editor_height' => 725,
                                                            'textarea_rows' => 20,
                                                        );

                                                        if ( isset($uifm_frm_record_tpl_content)) {
                                                            $default_template = urldecode($uifm_frm_record_tpl_content);
                                                        }

                                                        // wp_editor($default_template, 'uifm_frm_record_tpl_content',$settings );
                                                        ?>
                                                        <textarea 
                                                        class="uifm_tinymce_obj"
                                                        name="uifm_frm_record_tpl_content"
                                                        id="uifm_frm_record_tpl_content"><?php echo $default_template; ?></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>    
</div>
<script type="text/javascript">
//<![CDATA[

 
jQuery(document).ready(function ($) {
    
 
  /* attach custom pdf to client*/
        $('#uifm_frm_record_tpl_enable').on('switchChange.bootstrapSwitchZgpb', function (event, state) {
            var f_val = (state) ? 1 : 0;
            if (f_val === 1) {
                $('#uifm-tab-inner-reo-tpl-3').show();
            } else {
                $('#uifm-tab-inner-reo-tpl-3').hide();
            }
        });

        var selectedValue = $('#uifm_frm_record_tpl_enable').bootstrapSwitchZgpb('state');
        if (selectedValue) {
            $('#uifm-tab-inner-reo-tpl-3').show();
        } else {
            $('#uifm-tab-inner-reo-tpl-3').hide();
        }
   
      
});


//]]>
</script>
