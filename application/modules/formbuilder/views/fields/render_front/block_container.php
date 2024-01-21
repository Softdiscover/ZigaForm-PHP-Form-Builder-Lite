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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
$field_laygrid = ( isset($txt_block['grid_layout']) ) ? $txt_block['grid_layout'] : 2;
?>
 <div class="rockfm-field-wrap ">
                <div class="rkfm-row">
                    <?php
                    if ( isset($txt_block['block_st']) && intval($txt_block['block_st']) === 1) {
                        $tmp_labblock_pos = Uiform_Form_Helper::field_label_blockpos_gridsys($field_laygrid);
                        ?>
                      
                        <?php
                        switch ( intval($txt_block['block_pos'])) {
                            case 1:
                                // top
                                ?>
                                    <div class="rkfm-col-sm-12 rockfm-wrap-label">
                                    <?php echo $render_block_label; ?>
                                    </div>
                                    <div class="rkfm-col-sm-12">
                                    <?php echo $render_block_input_cont; ?>
                                    </div>
                                    <?php
                                break;
                            case 2:
                                // right
                                ?>
                                     <div class="rkfm-col-sm-<?php echo $tmp_labblock_pos['left']; ?>">
                                    <?php echo $render_block_input_cont; ?>
                                    </div>
                                    <div class="rkfm-col-sm-<?php echo $tmp_labblock_pos['right']; ?> rockfm-wrap-label">
                                    <?php echo $render_block_label; ?>
                                    </div>
                                    <?php
                                break;
                            case 3:
                                // bottom
                                ?>
                                    <div class="rkfm-col-sm-12">
                                    <?php echo $render_block_input_cont; ?>
                                    </div>
                                    <div class="rkfm-col-sm-12 rockfm-wrap-label">
                                    <?php echo $render_block_label; ?>
                                    </div>
                                    <?php
                                break;
                            case 0:
                            default:
                                // left
                                ?>
                                    <div class="rkfm-col-sm-<?php echo $tmp_labblock_pos['left']; ?> rockfm-wrap-label">
                                    <?php echo $render_block_label; ?>
                                    </div>
                                    <div class="rkfm-col-sm-<?php echo $tmp_labblock_pos['right']; ?>">
                                    <?php echo $render_block_input_cont; ?>
                                    </div>
                                    <?php
                                break;
                        }
                        ?>
                    <?php } else { ?>
                        <div class="rkfm-col-sm-12">
                            <?php echo $render_block_input_cont; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
