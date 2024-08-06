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
        <div class="rockfm_form_hook_outertop"></div>
    <div class="uiform-main-form">
        <div class="rockfm_form_hook_innertop"></div>
        <div class="uiform-step-list uiform-wiztheme0" style="display:none;">
                        <ul class="uiform-steps">
                            <li class="uifm-current">
                                <a data-tab-nro="0" href="#uifm-step-tab-0">
                                    <span class="uifm-number">1</span>
                                    <span class="uifm-title"><?php echo __('Tab title', 'FRocket_admin'); ?></span>
                                </a>
                            </li>
                        </ul>
            </div>
            <div class="uiform-step-content" style="min-height:100px;">
                <?php echo $form_content; ?>
                
            </div>
    </div>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
