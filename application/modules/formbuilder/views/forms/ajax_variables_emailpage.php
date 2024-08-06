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
?>
<?php
ob_start();
?>
                            <div class="zgfm-modal-calc-wrap-table">
                                <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><?php echo __('Field', 'FRocket_admin'); ?></th>
                                            <th colspan="5"><?php echo __('Codes', 'FRocket_admin'); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('label', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('input', 'FRocket_admin'); ?></th>
                                            
                                            <th><?php echo __('quantity', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('wrapper', 'FRocket_admin'); ?> <a data-original-title="you can use this to show content depending if the field has ticked and has a value. if the field has no been ticked or doesnt have a value. the content inside this shortcode will not appear. " data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if ( ! empty($fmb_data)) {
                                            foreach ( $fmb_data['steps_src'] as $key => $value) {
                                                if (is_string($value)) {
                                                    continue;
                                                }
                                                foreach ( $value as $key2 => $value2) {
                                                    switch ( intval($value2['type'])) {
                                                        case 6:
                                                        case 7:
                                                        case 12:
                                                        case 13:
                                                        case 15:
                                                        case 22:
                                                        case 23:
                                                        case 24:
                                                        case 25:
                                                        case 26:
                                                        case 28:
                                                        case 29:
                                                        case 30:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            <td></td>
                                            
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                                         <?php

                                                            break;

                                                        case 8:
                                                        case 10:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input" atr2="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input" atr2="value"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                                        <?php
                                                            break;

                                                        case 9:
                                                        case 11:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input" atr2="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input" atr2="value" atr3="format" atr4="comma"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                                        <?php
                                                            break;
                                                        case 40:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                            <?php
                                                            break;
                                                        case 16:
                                                        case 17:
                                                        case 18:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input" atr2="value"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                                <?php
                                                            break;
                                                        case 41:
                                                        case 42:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="qty"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="<?php echo $value2['id']; ?>"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>
                                                                <?php
                                                            break;
                                                        case 21:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            
                                            <td></td>
                                            <td></td>
                                        </tr>
                                                            <?php
                                                            break;
                                                    }
                                                }
                                            }
                                        }

                                        ?>
                                        
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
