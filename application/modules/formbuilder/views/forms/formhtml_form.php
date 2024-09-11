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
ob_start();
?>
<div class="rockfm-form-container uiform-wrap sfdc-wrap">
<div class="rockfm-alert-container" style="display:none;"></div>
<form class="rockfm-form" 
      action="javascript:void(0);" 
      name="" 
      method="post" 
      data-zgfm-type="1"
      data-zgfm-version="<?php echo UIFORM_VERSION; ?>"
      data-zgfm-recaptchav3-active="<?php echo $main['recaptchav3_enable'] ?? 0; ?>"
      data-zgfm-recaptchav3-sitekey="<?php echo $main['recaptchav3_sitekey'] ?? ''; ?>"
      data-zgfm-recaptchav3-errmsg="<?php echo esc_attr(__('Recaptcha failed, refresh page and try again', 'FRocket_admin')); ?>"
      data-zgfm-is-ms="0"
      enctype="multipart/form-data" 
      id="rockfm_form_<?php echo $form_id; ?>">
 
    
    <input type="hidden" value="<?php echo esc_attr($form_id); ?>" class="_rockfm_form_id" name="_rockfm_form_id">
    <?php
    if ( isset($wizard['enable_st'])
            && intval($wizard['enable_st']) === 1
            && intval($tab_count) > 1
            ) {
        ?>
        <input type="hidden" value="1" class="_rockfm_wizard_st" >
    <?php } else { ?>
        <input type="hidden" value="0" class="_rockfm_wizard_st" >
    <?php } ?>
    <input type="hidden" value="<?php echo esc_attr(Uiform_Form_Helper::base64url_encode(urldecode($onsubm['sm_successtext']))); ?>" name="_rockfm_onsubm_smsg" class="_rockfm_onsubm_smsg" >
    <!--- ajax or post --->
    <?php if ( isset($main['submit_ajax']) && intval($main['submit_ajax']) === 1) { ?>
        <input type="hidden" value="1" class="_rockfm_type_submit" name="_rockfm_type_submit">
        <input type="hidden" value="rocket_front_submitajaxmode" name="action">
    <?php } else { ?>
        <input type="hidden" value="0" class="_rockfm_type_submit" name="_rockfm_type_submit">
    <?php } ?>
    
    <div class="uiform-main-form">
        <?php
        if ( intval($tab_count) > 1) {
            echo $form_tab_head;
        }
        ?>
            <div class="uiform-step-content" >
                <?php echo $form_content; ?>
                <div class="clear"></div>
            </div>
            <?php
            if ( intval($tab_count) > 1) {
                ?>
                <?php
                echo $form_tab_footer;
            }
            ?>
        
       
    </div>
    <?php if ( ! empty($clogic)) { ?>
        <textarea hidden="hidden" class="rockfm_clogic_data" style="display:none"><?php echo esc_html(htmlentities(Uiform_Form_Helper::raw_json_encode($clogic), ENT_QUOTES, 'UTF-8')); ?></textarea>
    <?php } ?>
        <textarea hidden="hidden" class="rockfm_main_data" style="display:none"><?php echo esc_html(htmlentities(Uiform_Form_Helper::raw_json_encode($main), ENT_QUOTES, 'UTF-8')); ?></textarea>
        
    <div class="space10"></div>
    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
        <div id="blueimp-gallery<?php echo $form_id; ?>" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="sfdc-modal sfdc-fade">
                <div class="sfdc-modal-dialog">
                    <div class="sfdc-modal-content">
                        <div class="sfdc-modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="sfdc-modal-title"></h4>
                        </div>
                        <div class="sfdc-modal-body next"></div>
                        <div class="sfdc-modal-footer">
                            <button type="button" class="sfdc-btn sfdc-btn-default pull-left prev">
                                <i class="sfdc-glyphicon sfdc-glyphicon-chevron-left"></i>
                                <?php echo __('Previous', 'FRocket_admin'); ?>
                            </button>
                            <button type="button" class="sfdc-btn sfdc-btn-primary next">
                                <?php echo __('Next', 'FRocket_admin'); ?>
                                <i class="sfdc-glyphicon sfdc-glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
 <?php if ( isset($main['add_js']) && ! empty($main['add_js'])) { ?>
  <!-- Additional javascript -->
   <script type="text/javascript">
        <?php echo  urldecode($main['add_js']); ?>
     </script>  
    <!-- adittional javascript -->
 <?php } ?>
  <!-- Modal -->
<div class="sfdc-modal sfdc-fade uiform_modal_general"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="sfdc-modal-title"></h4>

            </div>
            <div class="sfdc-modal-body"><div class="te"></div></div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-default"
                        data-dismiss="modal"><?php echo __('Close', 'FRocket_admin'); ?></button>
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->  
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
