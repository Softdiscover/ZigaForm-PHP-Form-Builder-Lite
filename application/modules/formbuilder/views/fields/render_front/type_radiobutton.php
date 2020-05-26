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
<?php
$opt_class = 'sfdc-radio';
if ( isset( $input2['block_align'] ) && intval( $input2['block_align'] ) === 1 ) {
	$opt_class = 'sfdc-radio-inline';
}
?>
<?php
$defaul_class = 'rockfm-inp2-rdo';
if ( intval( $input2['style_type'] ) === 1 ) {
	$defaul_class .= ' rockfm-input2-chk-styl1';
}
?>
<div data-uifm-tabnum="<?php echo $tab_num; ?>"
	 data-theme-type="<?php echo $input2['style_type']; ?>"
	 class="rockfm-input2-wrap">    
<?php

foreach ( $input2['options'] as $key => $value ) {
	$checked = '';
	if ( isset( $value['checked'] ) && intval( $value['checked'] ) === 1 ) {
		$checked = 'checked="checked"';
	}
	?>
	<div 
		data-opt-index="<?php echo $key; ?>" 
		class="<?php echo $opt_class; ?>">
		<label>
			<span class="rockfm-inp2-opt-inp">
			<input type="radio"
				   data-chk-icon="<?php echo ( ! empty( $input2['stl1']['icon_mark'] ) ) ? 'fa ' . $input2['stl1']['icon_mark'] : 'fa fa-check'; ?>"
				   <?php echo $checked; ?>
				   value="<?php echo $key; ?>"
				   data-uifm-inp-val="
				   <?php
					if ( isset( $value['value'] ) ) {
						echo Uiform_Form_Helper::sanitizeInput( $value['value'] );}
					?>
					"
				   data-uifm-inp-label="
				   <?php
					if ( isset( $value['label'] ) ) {
						echo Uiform_Form_Helper::sanitizeInput( $value['label'] );}
					?>
					"
					
				   name="uiform_fields[<?php echo $id; ?>]"
				   class="<?php echo $defaul_class; ?>">
			</span>
			<span class="rockfm-inp2-label rockfm-inp2-opt-label">
			<?php
			if ( isset( $value['label'] ) ) {
				echo $value['label'];}
			?>
			</span>
			<?php
			if ( isset( $price['lbl_show_st'] ) && intval( $price['lbl_show_st'] ) === 1 ) {
				$tmp_price_label = urldecode( $price['lbl_show_format'] );
				$tmp_price_label = str_replace( '[uifm_price]', '<span class="uiform-stickybox-inp-price">' . $value['price'] . '</span>', $tmp_price_label );
				if ( ! empty( $tmp_price_label ) ) {
					?>
			<span class="rockfm-inp2-opt-price-lbl"><?php echo $tmp_price_label; ?></span>
					<?php
				}
			}
			?>
		</label>
	 </div>
	<?php
}


?>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();

echo $cntACmp;
?>
