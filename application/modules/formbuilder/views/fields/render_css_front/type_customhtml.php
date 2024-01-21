<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
  #rockfm_<?php echo $id; ?> .rockfm-input3-customhtml{
        <?php
        // input
        ?>
        <?php if ( $input3['size']) { ?>
            font-size:<?php echo $input3['size']; ?>px;
        <?php } ?>
        <?php if ( intval($input3['bold']) === 1) { ?>
            font-weight: bold;
        <?php } ?>
        <?php if ( intval($input3['italic']) === 1) { ?>
            font-style:italic;
        <?php } ?>
        <?php if ( intval($input3['underline']) === 1) { ?>
            text-decoration:underline;
        <?php } ?>
        <?php if ( ! empty($input3['color'])) { ?>
            color:<?php echo $input3['color']; ?>;
        <?php } ?>
        <?php if ( isset($input3['font_st']) && intval($input3['font_st']) === 1) { ?>
            <?php
            $font_temp = json_decode($input3['font'], true);
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
        <?php

        if ( isset($input3['val_align'])) {
            switch ( intval($input3['val_align'])) {
                case 1:
                    ?>
              text-align:center;
                    <?php
                    break;
                case 2:
                    ?>
              text-align:right;
                    <?php
                    break;
                case 0:
                default:
                    ?>
              text-align:left;
                    <?php
                    break;
            }
        }
        ?>
          
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
