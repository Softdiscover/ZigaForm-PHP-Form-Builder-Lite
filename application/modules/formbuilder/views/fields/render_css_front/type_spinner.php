<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
ob_start();
?>
      #rockfm_<?php echo $id;?> .rockfm-input4-wrap{
    <?php if(isset($input4['skin_maxwidth_st']) && intval($input4['skin_maxwidth_st'])===1){
        ?>
       width:100%;
       max-width: <?php echo $input4['skin_maxwidth'];?>px;
       <?php
    }?>
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