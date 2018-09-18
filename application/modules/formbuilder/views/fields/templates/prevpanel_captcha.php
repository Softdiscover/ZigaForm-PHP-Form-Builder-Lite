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
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
<?php 
$id_field=(!empty($id))?$id:'';
?>
<div id="<?php echo $id_field;?>"  data-typefield="19" class="uiform-captcha uiform-field uiform-field-childs zgpb-field-template">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label','FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel','FRocket_admin'); ?></span>
                            </label>
                             
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <div class="uifm-input-container">
                                 <div class="uifm-inp6-captcha">
                                <div class="uifm-inp6-wrap-imagegen">
                                <img width="175" 
                                    height="60" 
                                    title="CAPTCHA" 
                                    alt="CAPTCHA"
                                    src="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver=eyJjYV90eHRfZ2VuIjoiN3BmcTcifQ==" 
                                    class="uifm-inp6-captcha-img" 
                                    >

                                    <input type="hidden" 
                                        value="L14qrGTc45G1Tb50" 
                                        class="uifm-inp6-captcha-code">

                            <div class="uifm-inp6-wrap-refrescaptcha">
                                    <a  title="Refresh captcha" 
                                        rel="nofollow"
                                        data-rkver="eyJjYV90eHRfZ2VuIjoiN3BmcTcifQ=="
                                        data-rkurl="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver="
                                        onclick="javascript:rocketform.input6settings_refreshCaptcha(this);"
                                        href="javascript:void(0);">
                                        <i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                            <div class="uifm-inp6-wrap-input-source"> 
                                <input type="text" 
                                    size="6" 
                                    data-check-hash=""
                                    class="sfdc-form-control uifm-inp6-captcha-inputcode">
                                <label for="rockfm-inp6-captcha-inputcode" 
                                    class="rockfm-inp6-captcha-label"><?php echo __('CAPTCHA Code','FRocket_admin'); ?></label>
                                <span ><i class="sfdc-glyphicon sfdc-glyphicon-asterisk"></i></span>
                            </div>
                            </div>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text','FRocket_admin'); ?>
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
