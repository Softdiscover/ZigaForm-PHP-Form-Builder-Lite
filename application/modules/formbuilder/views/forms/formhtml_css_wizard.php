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
ob_start();
?>
<?php 

if(isset($wizard['theme_type']))
{
$theme_type=(intval($wizard['theme_type']))?intval($wizard['theme_type']):0;

switch($theme_type){
    case 0:
        ?>
        #rockfm_form_<?php echo $idform;?> .uiform-step-list{
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cont_borcol'])){?>
            border:1px solid <?php echo $wizard['theme'][$theme_type]['skin_tab_cont_borcol'];?>;
            <?php }?>
           
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cont_bgcolor'])){?>
            background-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cont_bgcolor'];?>;
            <?php }?>
        }

        #rockfm_form_<?php echo $idform;?> .uiform-step-list {
           
            
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            position: relative;
            z-index: 4;
        }

       
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps{
            border-radius: 3px;
            list-style: none outside none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            position: relative;
        }
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li{
            display: inline-block;
            /*comoding*/
            float:left;
            margin: 0;
            padding: 0;
            position: relative;
            outline: none;
        }

        #rockfm_form_<?php echo $idform;?>  .uiform-main-form .uiform-steps li a{
            display: inline-block;
            font-size: 16px;
            height: 46px;
            line-height: 46px;
            margin: 0;
            padding: 0 20px 0 30px;
            text-decoration: none;
            width: auto;
        }

        /*just for backend*/
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li a{
            cursor: pointer!important;
        }
        .uiform-main-form .uiform-steps li.uifm-current a:focus{
            box-shadow:none!important;
        }
        #rockfm_form_<?php echo $idform;?>  .uiform-main-form .uiform-steps li.uifm-current a,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-current a:hover,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-current a:active
        {
        <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            background: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php } ?>
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_txtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_txtcolor'];?>;
            <?php } ?>
            cursor: default;
            outline: none;
        }
        
        #rockfm_form_<?php echo $idform;?>  .uiform-main-form .uiform-steps li.uifm-complete a,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-complete a:hover,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-complete a:active
        {
        <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_done_bgcolor'])){?>
            background: <?php echo $wizard['theme'][$theme_type]['skin_tab_done_bgcolor'];?>;
            <?php }?>
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_done_txtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_done_txtcolor'];?>;
            <?php }else{ ?>color:yellow; <?php }?>
            cursor: default;
            outline: none;
        }
        
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-disabled a:focus{
            box-shadow:none!important;
        }
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-disabled a,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-disabled a:hover,
        #rockfm_form_<?php echo $idform;?> .uiform-main-form .uiform-steps li.uifm-disabled a:active
        {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'])){?>
            background: <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'];?>;
            <?php } ?>
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_txtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_txtcolor'];?>;
            <?php }?>
            cursor: default;
            outline: none;
        }
        #rockfm_form_<?php echo $idform;?> .uifm_frm_skin_tab_content {
            border-bottom: 1px solid #CCCCCC;
            border-top: 1px solid #CCCCCC;
            padding: 20px 10px 10px;
            background: #eee;
            margin-top:5px;
        }
        #rockfm_form_<?php echo $idform;?> .uifm_frm_skin_tabs_options .btn-group{
            float:right;
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-number {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'])){?>
            background-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'];?>;
            <?php } ?>
            border-radius: 10px;
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'];?>;
            <?php }?>
            display: inline-block;
            float: left;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            margin-right: 10px;
            margin-top: 15px;
            min-width: 10px;
            padding: 3px 6px;
            text-align: center;
            white-space: nowrap;
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-number:before {
            position:absolute;
            top:-1px;
            right:-14px;
            display:block;
            z-index:2;
            border:24px solid transparent;
            border-right:0;
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'])){?>
            border-left:14px solid <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'];?>;
            <?php } ?>
            content:" "
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-number:after {
            position:absolute;
            top:-1px;
            right:-14px;
            display:block;
            z-index:1;
            border:24px solid transparent;
            border-right:0;
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            border-left:14px solid <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php }?>
            content:" ";
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps  a:first-child {
            border-bottom-left-radius: 3px;
            border-top-left-radius: 3px;
        }

        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-disabled .uifm-number {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            background-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php }?>
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_numtxtcolor'])){?>
                color: <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_numtxtcolor'];?>;
            <?php }?>
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-current a, 
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-current a:hover,
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-current a:active {
            background: #ECF0F1;
            color: #ECF0F1;
            cursor: default;
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-current .uifm-number:before {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            border-left-color:  <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php }?>
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-current .uifm-number:after {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            border-left-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php }?>
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-complete .uifm-number:before {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_done_bgcolor'])){?>
            border-left-color:  <?php echo $wizard['theme'][$theme_type]['skin_tab_done_bgcolor'];?>;
             <?php }?>
        }
        #rockfm_form_<?php echo $idform;?> .uiform-steps .uifm-complete .uifm-number:after {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_done_txtcolor'])){?>
            border-left-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_done_txtcolor'];?>;
            <?php }?>
        }
        <?php
        break;
    case 1:
        ?>
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps{
            display: table;
            list-style: outside none none;
            margin: 0;
            padding: 0;
            position: relative;
            width: 100%;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li a{
            box-shadow: none;
            text-decoration: none;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li {
            display: table-cell;
            text-align: center;
            width: 1%;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li .uifm-number {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bg_numtxt'])){?>
             background-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bg_numtxt'];?>;
            <?php }else{ ?>
             background-color: #ffffff;
            <?php } ?>
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'])){?>
             border: 5px solid <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'];?>;
            <?php } ?>
            border-radius: 100%;
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'];?>;
            <?php } ?>
            
            display: inline-block;
            font-size: 15px;
            height: 40px;
            line-height: 30px;
            position: relative;
            text-align: center;
            width: 40px;
            z-index: 2;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li::before {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'])){?>
            border-top: 4px solid <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_bgcolor'];?>;
            <?php } ?>
            content: "";
            display: block;
            font-size: 0;
            height: 1px;
            overflow: hidden;
            position: relative;
            top: 21px;
            width: 100%;
            z-index: 1;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.last-child::before {
            max-width: 50%;
            width: 50%;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li:last-child::before {
            max-width: 50%;
            width: 50%;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li:first-child::before {
            left: 50%;
            max-width: 51%;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-current::before,
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete::before,
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-current .uifm-number,
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete .uifm-number {
             <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'])){?>
            border-color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_bgcolor'];?>;
            <?php } ?>
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete .uifm-number {
            color: #fff;
            cursor: default;
            transition: transform 0.1s ease 0s;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete .uifm-number::before {
            background-color: #fff;
            border-radius: 100%;
            bottom: 0;
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_numtxtcolor'];?>;
            <?php } ?>
            content: "";
            display: block;
            font-size: 17px;
            font-family: FontAwesome;
            left: 0;
            line-height: 30px;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            z-index: 3;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete:hover .uifm-number {
            border-color: #80afd4;
            transform: scale(1.1);
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete:hover::before {
            border-color: #80afd4;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li .uifm-title {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_inac_txtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_inac_txtcolor'];?>;
            <?php } ?>
            display: block;
            font-size: 14px;
            margin-top: 4px;
            max-width: 100%;
            table-layout: fixed;
            text-align: center;
            word-wrap: break-word;
            z-index: 104;
        }
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-complete .uifm-title,
        #rockfm_form_<?php echo $idform;?> .rockfm-wiztheme1 .uiform-steps li.uifm-current .uifm-title {
            <?php if(!empty($wizard['theme'][$theme_type]['skin_tab_cur_txtcolor'])){?>
            color: <?php echo $wizard['theme'][$theme_type]['skin_tab_cur_txtcolor'];?>;
            <?php } ?>
        }
<?php
        break;
    ?>
<?php }

}?>
.uiform-step-footer{
    clear:both;
}
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>