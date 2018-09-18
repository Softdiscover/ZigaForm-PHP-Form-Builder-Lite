<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
  #rockfm_<?php echo $id;?> .rockfm-divider-bar{
        <?php 
        //input
        ?>
        
        <?php if(!empty($input11['div_color']) && isset($input11['div_col_st']) && intval($input11['div_col_st'])===1){?>
             border-bottom: 1px solid <?php echo $input11['div_color'];?>;
        <?php } ?>
        
    }
   
    #rockfm_<?php echo $id;?> .rockfm-divider-text{
        <?php 
        //input
        ?>
        <?php if($input11['text_size']){?>
            font-size:<?php echo $input11['text_size'];?>px;
        <?php } ?>
        <?php if(intval($input11['bold'])===1){?>
            font-weight: bold;
        <?php } ?>
        <?php if(intval($input11['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($input11['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($input11['text_color'])){?>
            color:<?php echo $input11['text_color'];?>;
        <?php } ?>
        <?php if(isset($input11['font_st']) && intval($input11['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($input11['font'],true);
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
         
            
            <?php if(isset($form_skin['form_background']['show_st']) 
        && intval($form_skin['form_background']['show_st'])===1){?>

    <?php 
         //el_background
         
             switch (intval($form_skin['form_background']['type'])) {
                        case 1:
                            //solid
                            if(!empty($form_skin['form_background']['solid_color'])){
                            ?>
                                background:<?php echo $form_skin['form_background']['solid_color'];?>;
                            <?php    
                            }
                            break;
                        case 2:
                            //gradient
                            if(!empty($form_skin['form_background']['start_color']) && !empty($form_skin['form_background']['end_color'])){ 
                            ?>
                                background: <?php echo $form_skin['form_background']['start_color'];?>;
                                background-image: -webkit-linear-gradient(top, <?php echo $form_skin['form_background']['start_color'];?>, <?php echo $form_skin['form_background']['end_color'];?>);
                                background-image: -moz-linear-gradient(top, <?php echo $form_skin['form_background']['start_color'];?>, <?php echo $form_skin['form_background']['end_color'];?>);
                                background-image: -ms-linear-gradient(top, <?php echo $form_skin['form_background']['start_color'];?>, <?php echo $form_skin['form_background']['end_color'];?>);
                                background-image: -o-linear-gradient(top, <?php echo $form_skin['form_background']['start_color'];?>, <?php echo $form_skin['form_background']['end_color'];?>);
                                background-image: linear-gradient(to bottom, <?php echo $form_skin['form_background']['start_color'];?>, <?php echo $form_skin['form_background']['end_color'];?>);
                            <?php    
                            }
                            break;
                    }
         ?>
             <?php if(isset($form_skin['form_background']['image']) && !empty($form_skin['form_background']['image'])){?>
                    background-image:url("<?php echo $form_skin['form_background']['image'];?>");
                    background-repeat:repeat;
                <?php } ?>
       <?php }else{?>
    
    padding:10px;
<?php } ?> 
            
      
            
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