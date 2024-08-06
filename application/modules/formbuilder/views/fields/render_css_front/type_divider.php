<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
 
    #rockfm_<?php echo $id; ?> .rockfm-divider-text{
    
            display: flex;
         flex-direction: row;
         justify-content: center;
         align-items: center;
         <?php
            // input
            ?>
          <?php if ( $input11['text_size']) { ?>
            font-size:<?php echo $input11['text_size']; ?>px;
          <?php } ?>
        <?php if ( intval($input11['bold']) === 1) { ?>
            font-weight: bold;
        <?php } ?>
        <?php if ( intval($input11['italic']) === 1) { ?>
            font-style:italic;
        <?php } ?>
        <?php if ( intval($input11['underline']) === 1) { ?>
            text-decoration:underline;
        <?php } ?>
        <?php if ( ! empty($input11['text_color'])) { ?>
            color:<?php echo $input11['text_color']; ?>;
        <?php } ?>
        <?php if ( isset($input11['font_st']) && intval($input11['font_st']) === 1) { ?>
            <?php
            $font_temp = json_decode($input11['font'], true);
            if ( isset($font_temp['family'])) {
                ?>
            
            font-family:<?php echo $font_temp['family']; ?>;
                <?php
                // storing to global fonts
                Uiform_Form_Helper::form_store_fonts($font_temp);
                // end storing to global fonts
                ?>
            <?php } ?>
        <?php } ?> 
         margin: 0 1em;
          
         background:transparent;
          
    }
    
#rockfm_<?php echo $id; ?> .rockfm-divider-text::before{
  content: '';
  height: .125em;
 
  flex: 1;
  margin: 0 .25em 0 0;
  <?php if ( ! empty($input11['div_color']) && isset($input11['div_col_st']) && intval($input11['div_col_st']) === 1) { ?>
             background: <?php echo $input11['div_color']; ?>;
  <?php } ?>
}
#rockfm_<?php echo $id; ?> .rockfm-divider-text::after{
  content: '';
  height: .125em;
  <?php if ( ! empty($input11['div_color']) && isset($input11['div_col_st']) && intval($input11['div_col_st']) === 1) { ?>
             background: <?php echo $input11['div_color']; ?>;
  <?php } ?>
  flex: 1;
  margin: 0 0 0 .25em;
}
   
#rockfm_<?php echo $id; ?> .rockfm-divider-text.italic{
  font-style: italic;
}


#rockfm_<?php echo $id; ?> .rockfm-divider-text.italic::before,
#rockfm_<?php echo $id; ?> .rockfm-divider-text.italic::after{
  transform: skew(-18deg)
} 
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>
