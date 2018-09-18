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
 <div <?php
                                if(isset($input['font_st']) && intval($input['font_st'])===1){
                                    if(!empty($input['font']) && isset($font_tmp['import_family'])){
                                        $font_tmp=json_decode($input['font'],true);
                                        ?>
                                        data-rockfm-gfont="<?php echo $font_tmp['import_family'];?>"
                                    <?php
                                    }   
                                }
                                ?>></div>
<?php
    switch(intval($type)){
        case 33:
            ?>
             <h1 class="rockfm-heading"><?php echo $input['value'];?></h1>
            <?php
            break;
        case 34:
            ?>
             <h2 class="rockfm-heading"><?php echo $input['value'];?></h2>
            <?php
            break;
        case 35:
            ?>
             <h3 class="rockfm-heading"><?php echo $input['value'];?></h3>
            <?php
            break;
        case 36:
            ?>
             <h4 class="rockfm-heading"><?php echo $input['value'];?></h4>
            <?php
            break;
        case 37:
            ?>
             <h5 class="rockfm-heading"><?php echo $input['value'];?></h5>
            <?php
            break;
        case 38:
            ?>
             <h6 class="rockfm-heading"><?php echo $input['value'];?></h6>
            <?php
            break;
    }
?>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>