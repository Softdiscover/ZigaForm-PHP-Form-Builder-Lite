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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

    <div data-zgfm-type="1" data-zgfm-version="<?php echo UIFORM_VERSION; ?>" 
    class="rockfm_form_single"
    id="rockfm_form_<?php echo $form_id; ?>">

        <input type="hidden" value="<?php echo esc_attr($form_id); ?>" class="_rockfm_form_id" name="_rockfm_form_id">
      
        <div class="uiform-main-form-child">
            <?php echo $form_content; ?>
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
    </div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>