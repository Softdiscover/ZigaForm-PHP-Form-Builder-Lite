<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
    #rockfm_<?php echo $id;?> .rockfm-input2-wrap .rockfm-inp2-opt-label{
        <?php 
        //input
        ?>
        <?php if($input2['size']){?>
            font-size:<?php echo $input2['size'];?>px;
        <?php } ?>
        <?php if(intval($input2['bold'])===1){?>
            font-weight: bold;
        <?php } ?>
        <?php if(intval($input2['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($input2['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($input2['color'])){?>
            color:<?php echo $input2['color'];?>;
        <?php } ?>
        <?php if(isset($input2['font_st']) && intval($input2['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($input2['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
            <?php } ?>
            
        <?php } ?>
       
         
    }
 
    
   
   <?php if(isset($input2['style_type']) && intval($input2['style_type'])===1){?>
    #rockfm_<?php echo $id;?> .checkradios-checkbox, 
    #rockfm_<?php echo $id;?> .checkradios-radio {
        <?php if(!empty($input2['stl1']['border_color'])){?>
             border:2px solid <?php echo $input2['stl1']['border_color'];?>;
        <?php } ?>
        <?php if(!empty($input2['stl1']['bg_color'])){?>
             background: <?php echo $input2['stl1']['bg_color'];?>;
        <?php } ?>
        <?php if(!empty($input2['stl1']['icon_color'])){?>
             color: <?php echo $input2['stl1']['icon_color'];?>;
        <?php } ?>
        <?php if(!empty($input2['stl1']['size'])){?>
             font-size: <?php echo $input2['stl1']['size'];?>px;
        <?php } ?>
    }
    <?php } ?> 
 
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>