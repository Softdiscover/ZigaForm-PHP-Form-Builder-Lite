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
$layout_type=isset($input17['thopt_mode'])?intval($input17['thopt_mode']):1;
?>
<div data-uifm-tabnum="<?php echo $tab_num;?>"
     data-opt-laymode='<?php echo $layout_type;?>'
     data-thopt-height="<?php echo $input17['thopt_height'];?>"
     data-thopt-width="<?php echo $input17['thopt_width'];?>"
     data-thopt-zoom="<?php echo $input17['thopt_zoom'];?>"
     data-thopt-showhvrtxt="<?php echo isset($input17['thopt_showhvrtxt'])?$input17['thopt_showhvrtxt']:0;?>"
     data-thopt-showcheckb="<?php echo isset($input17['thopt_showcheckb'])?$input17['thopt_showcheckb']:0;?>"
     class="rockfm-input17-wrap">    
<?php

foreach ($input17['options'] as $key => $value) {
    $checked='';
    if(isset($value['checked']) && intval($value['checked'])===1){
        $checked='checked="checked"';    
    }
    ?>
    <div 
        data-backend="0"
        data-gal-id="blueimp-gallery<?php echo $form_id;?>"
        data-opt-label="<?php echo $value['label'];?>"
        data-opt-checked="<?php echo $value['checked'];?>"
        data-opt-isrdobtn="1"
        data-opt-price="<?php echo $value['price'];?>"
        data-opt-qtyst="<?php echo $value['qty_st'];?>"
        data-opt-qtymax="<?php echo $value['qty_max'];?>"
        data-inp17-opt-index="<?php echo $key;?>"
        data-toggle="tooltip" 
        data-placement="bottom" 
        data-html="true"
        title="<?php echo $value['label'];?>"
        class="uifm-dradiobtn-item">
        <div class="uifm-dcheckbox-item-wrap">
            <div class="uifm-dcheckbox-item-chkst sfdc-btn-default">
                <i class="fa fa-square-o"></i>
            </div>
            <div style="display:none" class="uifm-dcheckbox-item-qty-wrap">
                <div class="sfdc-input-group">
                    <span class="sfdc-input-group-btn">
                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="decrease">
                            <span class="sfdc-glyphicon sfdc-glyphicon-minus"></span>
                        </button>
                    </span>
                    <span class="sfdc-input-group-btn">
                        <input type="text" 
                                data-max="<?php echo $value['qty_max'];?>"
                                data-min="1"
                                class="uifm-dcheckbox-item-qty-num" value="1">   
                    </span>
                    <span class="sfdc-input-group-btn">
                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="increase">
                            <span class="sfdc-glyphicon sfdc-glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
            <?php if(isset($input17['thopt_zoom']) && intval($input17['thopt_zoom'])===1){?>
            <div class="uifm-dcheckbox-item-showgallery  sfdc-btn-primary">
                <i class="sfdc-glyphicon sfdc-glyphicon-search"></i>
            </div>
            <?php } ?>
            <div class="uifm-dcheckbox-item-nextimg sfdc-btn-primary">
                <i class="fa fa-chevron-right"></i>
            </div>
            <div class="uifm-dcheckbox-item-previmg sfdc-btn-primary">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div style="display: none;">
                <input class="uifm-dcheckbox-item-chkval"
                       name="uiform_fields[<?php echo $id;?>][<?php echo $key;?>]"
                       type="checkbox"  value="" <?php echo $checked;?> >
            </div>
            <!-- image gallery -->
            <div style="display:none;">
                <div class="uifm-dcheckbox-item-gal-imgs">
                    <?php 
                        switch (intval($layout_type)) {
                        case 2:
                        if(!empty($value['img_list_2'])){
                                foreach ($value['img_list_2'] as $key2 => $value2) {
                                   if(!empty($value2['img_full']) ){
                                    ?>
                                    <a 
                                        data-inp17-opt2-index="<?php echo $key2;?>"
                                        href="<?php echo isset($value2['img_full'])?$value2['img_full']:'';?>" 
                                        class="uifm-dcheckbox-item-imgsrc"
                                        title="" data-gallery="">
                                        <img src="<?php  
                                            echo isset($value2['img_full'])?$value2['img_full']:'';
                                        ?>"></a>
                                <?php
                                    }else{
                                        ?>
                                        <a 
                                            data-inp17-opt2-index="<?php echo $key2;?>"
                                        href="<?php echo base_url(); ?>/assets/common/imgs/uifm-question-mark.png" 
                                        class="uifm-dcheckbox-item-imgsrc"
                                        title="unknown" data-gallery="">
                                        <img src="<?php echo base_url(); ?>/assets/common/imgs/uifm-question-mark.png"></a>

                                        <?php
                                    }
                                }
                            }
                            break;
                        case 1:
                        default:
                         if(!empty($value['img_list'])){
                                foreach ($value['img_list'] as $key2 => $value2) {
                                   if(!empty($value2['img_full']) || !empty($value2['img_th_150x150'])){
                                    ?>
                                    <a 
                                        data-inp17-opt2-index="<?php echo $key2;?>"
                                        href="<?php echo isset($value2['img_full'])?$value2['img_full']:$value2['img_th_150x150'];?>" 
                                        class="uifm-dcheckbox-item-imgsrc"
                                        title="<?php echo $value2['title'];?>" data-gallery="">
                                        <img src="<?php  
                                        if(isset($input17['thopt_usethmb']) && intval($input17['thopt_usethmb'])===1){
                                            echo $value2['img_th_150x150'];
                                        }else{
                                            echo isset($value2['img_full'])?$value2['img_full']:$value2['img_th_150x150'];
                                        }


                                        ?>"></a>
                                <?php
                                    }else{
                                        ?>
                                        <a 
                                        data-inp17-opt2-index="0"
                                        href="<?php echo base_url(); ?>/assets/common/imgs/uifm-question-mark.png" 
                                        class="uifm-dcheckbox-item-imgsrc"
                                        title="unknown" data-gallery="">
                                        <img src="<?php echo base_url(); ?>/assets/common/imgs/uifm-question-mark.png"></a>

                                        <?php
                                    }
                                }
                            }
                            break;
                    }
                    ?>
                </div>
            </div>
            <canvas 
                data-uifm-nro="0"
                width="100" height="100" class="uifm-dcheckbox-item-viewport"></canvas>
        </div>
    </div>
<?php
}


?>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>