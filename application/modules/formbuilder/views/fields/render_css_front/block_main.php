<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
    <?php echo $render_block_type;?>
    <?php echo $render_common_css;?>
    <?php echo $render_common_css2;?>
    <?php echo $render_addon_css;?>
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>