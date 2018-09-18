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
   <div class="rockfm-field-wrap ">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-12">
                         <div class="rockfm-divider-bar" 
                              data-uifm-tabnum="<?php echo $tab_num;?>"
                              >
                             <?php if(!empty($input11['text_val'])){?>
                            <span 
                                <?php
                                if(isset($input11['font_st']) && intval($input11['font_st'])===1){
                                    if(!empty($input11['font'])){
                                        $font_tmp=json_decode($input11['font'],true);
                                        if(isset($font_tmp['import_family'])){
                                        ?>
                                        data-rockfm-gfont="<?php echo $font_tmp['import_family'];?>"
                                    <?php
                                        } 
                                        }  
                                }
                                ?>
                                class="rockfm-divider-text"><?php echo $input11['text_val'];?></span>
                            <?php }?>
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