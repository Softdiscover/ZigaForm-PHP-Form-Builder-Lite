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
 
<div id="rockfm_<?php echo $id;?>"  
     data-idfield="<?php echo $id;?>"
     data-typefield="<?php echo $type;?>" 
     class="<?php echo $render_extraclass1;?>  rockfm-field 
     <?php if(isset($validate['typ_val']) && intval($validate['typ_val'])>0){?>
     rockfm-required
     <?php } ?>
     <?php if(isset($clogic) && intval($clogic['show_st'])===1){?>
     rockfm-clogic-fcond
     <?php } ?>
     <?php if(isset($price['enable_st']) && intval($price['enable_st'])===1){?>
     rockfm-costest-field
     <?php } ?>
     <?php echo $addon_extraclass;?>
     "
     <?php if(isset($clogic) && intval($clogic['show_st'])===1&& intval($clogic['f_show'])===1){?>
      style="display:none;"
     <?php } ?>
     <?php if(isset($validate['typ_val']) && intval($validate['typ_val'])>0){?>
     data-val-type="<?php echo $validate['typ_val'];?>"
     <?php
     $validate_custxt=$validate['typ_val_custxt'];
     if(empty($validate['typ_val_custxt'])){
                switch(intval($validate['typ_val'])){
                    case 1:
                        /*letter*/
                        $validate_custxt=__('Required only letters','FRocket_admin');
                        break;
                    case 2:
                        /*letter and numbers*/
                        $validate_custxt=__('Required only Letters and Numbers','FRocket_admin');
                        break;
                    case 3:
                        /*only numbers*/
                        $validate_custxt=__('Required only numbers','FRocket_admin');
                        break;
                    case 4:
                        /*email */
                        $validate_custxt=__('Required a valid mail','FRocket_admin');
                        break;
                    case 5:
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
     
     >
           <?php echo $render_block_container; ?>
    <!-- hidden data --> 
    <div class="rockfm-fld-data-hidden" style="display:none;">
        <div class="rockfm-fld-data-field_name"><?php echo $field_name;?></div>
    </div>
    <!--/ hidden data --> 
        </div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

if(isset($skin['custom_css']['ctm_id']) && !empty($skin['custom_css']['ctm_id'])){
ob_start();
?>
<div id="<?php echo $skin['custom_css']['ctm_id'];?>">
    <?php echo $cntACmp; ?>
</div>
<?php
$cntACmp2 = ob_get_contents();
$cntACmp2 = Uiform_Form_Helper::sanitize_output($cntACmp2);
ob_end_clean();
    echo $cntACmp2;
}else{
    echo $cntACmp;
}
?>