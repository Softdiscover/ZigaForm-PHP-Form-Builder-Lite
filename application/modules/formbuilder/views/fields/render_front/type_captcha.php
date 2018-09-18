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
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
<?php
$input6['ca_txt_gen']='7pfq7';
$captcha_rkver = Uiform_Form_Helper::base64url_encode(json_encode($input6));
?>
<div class="rockfm-input6-wrap">
    <div class="rockfm-inp6-captcha">
        <div class="rockfm-inp6-wrap-imagegen">
        <img width="175" 
             height="60" 
             title="CAPTCHA" 
             alt="CAPTCHA"
             src="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver=<?php echo $captcha_rkver;?>" 
             class="rockfm-inp6-captcha-img" 
             >
        
            <input type="hidden" 
                   value="L14qrGTc45G1Tb50" 
                   class="rockfm-inp6-captcha-code">
           
       <div class="rockfm-inp6-wrap-refrescaptcha">
            <a  title="Refresh captcha" 
                rel="nofollow"
                data-rkver="<?php echo $captcha_rkver;?>"
                data-rkurl="<?php echo base_url();?>libs/uiform-lib-captcha.php?rkver="
                onclick="javascript:rocketfm.captcha_refreshImage(this);"
                href="javascript:void(0);">
                <i class="fa fa-refresh"></i></a>
        </div>
    </div>
    <div class="rockfm-inp6-wrap-input-source"> 
        <input type="text" 
               size="6" 
               <?php if(intval($validate['typ_val'])>0){?>
                data-val-type="<?php echo $validate['typ_val'];?>"
                <?php
                $validate_custxt=$validate['typ_val_custxt'];
                if(empty($validate['typ_val_custxt'])){
                            switch(intval($validate['typ_val'])){
                                default:
                                    /*required*/
                                    $validate_custxt=__('this is required','FRocket_admin');
                                    break;
                            }

                        }
                ?>
                data-val-custxt="<?php echo $validate_custxt;?>"
                data-val-pos="<?php echo $validate['pos'];?>"
                data-val-tip-col="<?php echo $validate['tip_col'];?>"
                data-val-tip-bg="<?php echo $validate['tip_bg'];?>"
                <?php } ?>
               class="sfdc-form-control rockfm-inp6-captcha-inputcode">
        <label for="rockfm-inp6-captcha-inputcode" 
               class="rockfm-inp6-captcha-label"><?php echo __('CAPTCHA Code','FRocket_admin'); ?></label>
        <span ><i class="sfdc-glyphicon sfdc-glyphicon-asterisk"></i></span>
    </div>
    </div>
    
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>