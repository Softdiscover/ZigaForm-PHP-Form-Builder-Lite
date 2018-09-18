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

#rockfm_form_<?php echo $idform;?> .uiform-main-form{    
<?php if(isset($skin['form_background']['show_st']) 
        && intval($skin['form_background']['show_st'])===1){?>

    <?php 
         //el_background
         
             switch (intval($skin['form_background']['type'])) {
                        case 1:
                            //solid
                            if(!empty($skin['form_background']['solid_color'])){
                            ?>
                                background:<?php echo $skin['form_background']['solid_color'];?>;
                            <?php    
                            }
                            break;
                        case 2:
                            //gradient
                            if(!empty($skin['form_background']['start_color']) && !empty($skin['form_background']['end_color'])){ 
                            ?>
                                background: <?php echo $skin['form_background']['start_color'];?>;
                                background-image: -webkit-linear-gradient(top, <?php echo $skin['form_background']['start_color'];?>, <?php echo $skin['form_background']['end_color'];?>);
                                background-image: -moz-linear-gradient(top, <?php echo $skin['form_background']['start_color'];?>, <?php echo $skin['form_background']['end_color'];?>);
                                background-image: -ms-linear-gradient(top, <?php echo $skin['form_background']['start_color'];?>, <?php echo $skin['form_background']['end_color'];?>);
                                background-image: -o-linear-gradient(top, <?php echo $skin['form_background']['start_color'];?>, <?php echo $skin['form_background']['end_color'];?>);
                                background-image: linear-gradient(to bottom, <?php echo $skin['form_background']['start_color'];?>, <?php echo $skin['form_background']['end_color'];?>);
                            <?php    
                            }
                            break;
                    }
         ?>
             <?php if(isset($skin['form_background']['image']) && !empty($skin['form_background']['image'])){?>
                    background-image:url("<?php echo $skin['form_background']['image'];?>");
                    background-repeat:repeat;
                <?php } ?>
       <?php }else{?>
    
    padding:10px;
<?php } ?>                    
                                
        <?php 
         //el_border_radius
         if(isset($skin['form_border_radius']['show_st']) && intval($skin['form_border_radius']['show_st'])===1){
             ?>
             -webkit-border-radius: <?php echo $skin['form_border_radius']['size'];?>px;
                -moz-border-radius: <?php echo $skin['form_border_radius']['size'];?>px;
                border-radius: <?php echo $skin['form_border_radius']['size'];?>px;    
                 <?php
         }
         ?>
        <?php 
         //el_border
         if(isset($skin['form_border']['show_st']) 
                 && intval($skin['form_border']['show_st'])===1
                 && !empty($skin['form_border']['color'])
                 ){
             if(intval($skin['form_border']['style'])===2){
             $solid_tmp='dotted';    
             }else{
             $solid_tmp='solid';    
             }
             $color_tmp=$skin['form_border']['color'];
             $size_tmp=$skin['form_border']['width'];
             ?>
                border: <?php echo $solid_tmp;?> <?php echo $color_tmp;?> <?php echo $size_tmp;?>px;
            <?php
            
         }
         ?>
         <?php 
         //shadow
         if(isset($skin['form_shadow']['show_st']) 
                 && intval($skin['form_shadow']['show_st'])===1
                 && !empty($skin['form_shadow']['color'])
                 ){
                $x_tmp=$skin['form_shadow']['h_shadow'].'px';
                $y_tmp=$skin['form_shadow']['v_shadow'].'px';
                $blur_tmp=$skin['form_shadow']['blur'].'px';
                $color_tmp=$skin['form_shadow']['color'];
             ?>
                box-shadow: <?php echo $x_tmp.' '.$y_tmp.' '.$blur_tmp.' '.$color_tmp;?>;
            <?php
            
         }
         ?> 
          <?php 
         //padding
         if(isset($skin['form_padding']['show_st']) && intval($skin['form_padding']['show_st'])===1){
             ?>
             padding: <?php echo $skin['form_padding']['pos_top'];?>px <?php echo $skin['form_padding']['pos_right'];?>px <?php echo $skin['form_padding']['pos_bottom'];?>px <?php echo $skin['form_padding']['pos_left'];?>px;
                
         <?php
         }else{
         ?>
             padding:20px 20px 25px 20px;
         <?php }?>    
          <?php 
         //max width
         if(isset($skin['form_width']['show_st']) 
                 && intval($skin['form_width']['max'])>0
                 && intval($skin['form_width']['show_st'])===1){
             ?>
             max-width: <?php echo $skin['form_width']['max'];?>px;
                
         <?php
         }
         ?>     

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