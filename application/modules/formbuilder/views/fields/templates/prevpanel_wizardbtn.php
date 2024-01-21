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
<?php
$id_field = ( ! empty($id) ) ? $id : '';
?>
<div id="<?php echo $id_field; ?>"  data-typefield="39" class="uiform-wizardbtn uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-12">
                        <div class="uifm-input-container">                               
                            <button class="sfdc-btn uiform-btn-wizprev uifm-txtbox-inp13-val">
                                    <i class="fa fa-arrow-left"></i>
                                    <div class="uifm-inp-lbl"><?php echo __('Prev', 'FRocket_admin'); ?></div>
                            </button>
                            <button class="sfdc-btn uiform-btn-wiznext uifm-txtbox-inp12-val">
                                   <div class="uifm-inp-lbl"><?php echo __('Next', 'FRocket_admin'); ?></div>
                                    <i class="fa fa-arrow-right"></i>
                            </button>                               
                        </div>
                        <div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text', 'FRocket_admin'); ?>
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
