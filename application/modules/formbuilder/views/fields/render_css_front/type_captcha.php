<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
 #rockfm_<?php echo $id; ?> .rockfm-inp6-captcha-label{
        <?php
        // input
        ?>
        <?php if ( $input6['indtext_size']) { ?>
            font-size:<?php echo $input6['indtext_size']; ?>px;
        <?php } ?>
        <?php if ( intval($input6['indtext_bold']) === 1) { ?>
            font-weight: bold;
        <?php } ?>
        <?php if ( intval($input6['indtext_italic']) === 1) { ?>
            font-style:italic;
        <?php } ?>
        <?php if ( intval($input6['indtext_underline']) === 1) { ?>
            text-decoration:underline;
        <?php } ?>
        <?php if ( isset($input6['indtext_color_st']) && intval($input6['indtext_color_st']) === 1) { ?>
            <?php if ( ! empty($input6['indtext_color'])) { ?>
            color:<?php echo $input6['indtext_color']; ?>;
            <?php } ?>
        <?php } ?>
        
          
    }
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;

