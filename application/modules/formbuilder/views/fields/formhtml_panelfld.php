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
?>
<?php
ob_start();
if ( isset( $input18['text']['html_cont'] ) ) {
	echo urldecode( $input18['text']['html_cont'] );
}
?>
<?php
$tmp_label_inner_html = ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
<?php
if ( isset( $input18['text']['html_pos'] ) && isset( $input18['text']['show_st'] ) && intval( $input18['text']['show_st'] ) === 1 ) {
	switch ( $input18['text']['html_pos'] ) {
		case 1:
			// top
			?>
						<div class="rkfm-col-sm-12">
							<div class="uifm-inp31-txthtml-content">
							<?php echo $tmp_label_inner_html; ?></div>
						</div>
						<div class="rkfm-col-sm-12">
							<div class="uifm-input31-main-wrap">[[%%fields%%]]</div>
						</div>
				<?php
			break;
		case 2:
			// right
			?>
				<div class="rkfm-col-sm-7">
							<div class="uifm-inp31-txthtml-content">
							<?php echo $tmp_label_inner_html; ?></div>
						</div>
						<div class="rkfm-col-sm-5">
							<div class="uifm-input31-main-wrap">[[%%fields%%]]</div>
						</div>
				<?php
			break;
		case 3:
			// bottom
			?>
				
						<div class="rkfm-col-sm-12">
							<div class="uifm-input31-main-wrap">[[%%fields%%]]</div>
						</div>
					<div class="rkfm-col-sm-12">
							<div class="uifm-inp31-txthtml-content">
							<?php echo $tmp_label_inner_html; ?></div>
						</div>
				<?php
			break;
		case 0:
		default:
			// left
			?>
				<div class="rkfm-col-sm-5">
							<div class="uifm-inp31-txthtml-content">
					<?php echo $tmp_label_inner_html; ?></div>
						</div>
						<div class="rkfm-col-sm-7">
							<div class="uifm-input31-main-wrap">[[%%fields%%]]</div>
						</div>
			<?php
			break;
	}
} else {
	?>
				  
						<div class="rkfm-inp18-col-sm-12">
							<div class="uifm-input31-main-wrap">[[%%fields%%]]</div>
						</div>
	<?php
}


?>
						
<?php
$tmp_input_html = ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
<div id="rockfm_<?php echo $id; ?>"  
	 data-idfield="<?php echo $id; ?>"
	 data-typefield="31" 
	 class="rockfm-panelfld rockfm-field 
	 <?php if ( isset( $clogic ) && intval( $clogic['show_st'] ) === 1 ) { ?>
	 rockfm-clogic-fcond
	 <?php } ?>
	 <?php if ( isset( $price['enable_st'] ) && intval( $price['enable_st'] ) === 1 ) { ?>
	 rockfm-costest-field
	 <?php } ?>
	 <?php echo ( ! empty( $addon_extraclass ) ) ? $addon_extraclass : ''; ?>
	 "
	<?php if ( isset( $clogic ) && intval( $clogic['show_st'] ) === 1 && intval( $clogic['f_show'] ) === 1 ) { ?>
	  style="display:none;"
	 <?php } ?>
	  
	 >
		   <div class="rockfm-field-wrap ">
			   <div class="rockfm-input31-container">
				   <div class="rkfm-row">
						
							<?php echo $tmp_input_html; ?>
						
				</div>
			   </div>
				
			</div>
		</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
