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
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
 <div class="rockfm-input4-wrap">
		<input class="rockfm-input4-slider" 
				type="text"
				data-uifm-tabnum="<?php echo $tab_num; ?>"
				data-slider-min="<?php echo floatval( $input4['set_min'] ); ?>" 
				data-slider-max="<?php echo floatval( $input4['set_max'] ); ?>"
				data-slider-step="<?php echo floatval( $input4['set_step'] ); ?>"
				data-slider-value="[<?php echo floatval( $input4['set_range1'] ); ?>,<?php echo floatval( $input4['set_range2'] ); ?>]"
				data-slider-ticks="[<?php echo floatval( $input4['set_min'] ); ?>, <?php echo floatval( $input4['set_max'] ); ?>]"
				data-slider-ticks-labels='["<?php echo floatval( $input4['set_min'] ); ?>", "<?php echo floatval( $input4['set_max'] ); ?>"]'
				name="uiform_fields[<?php echo $id; ?>]"
				value="[<?php echo floatval( $input4['set_range1'] ); ?>,<?php echo floatval( $input4['set_range2'] ); ?>]"
				/>
	</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();

echo $cntACmp;
?>
