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
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
<?php
$id_field = ( ! empty( $id ) ) ? $id : '';
?>
<div id="<?php echo $id_field; ?>"  data-typefield="35" class="uiform-heading3 uiform-field uiform-field-childs zgpb-field-template">
			<div class="uiform-field-wrap">
				<div class="rkfm-row">
					<div class="rkfm-col-sm-2" style="display: none;">
						<div class="uifm-control-label">
							<label class="sfdc-control-label">
								<span 
								   data-field-option="uifm-help-block"
									class="uifm-label-helpblock uifm-f-option">
									<span class="fa fa-question-circle"></span>
								</span> 
							   <span  data-field-store="label-text"
									  data-field-option="uifm-label"
									  class="uifm-label uifm-f-option"><?php echo __( 'Textbox label', 'FRocket_admin' ); ?></span>
							   <span data-field-store="sublabel-text"
									  data-field-option="uifm-sublabel"
									  class="uifm-sublabel uifm-f-option"><?php echo __( 'Textbox sublabel', 'FRocket_admin' ); ?></span>
							</label>
						</div>
					</div>
					<div class="rkfm-col-sm-12">
						<div class="uifm-input-container">
							<div class="uifm-input-heading-wrap">
								<h3 class="uifm-txtbox-inp-val"><?php echo __( 'Type your heading H3 here', 'FRocket_admin' ); ?></h3>
							</div>
						</div>
						<div data-field-option="uifm-help-block"  style="display: none;" class="uifm-help-block uifm-f-option">
							<?php echo __( 'Help block text', 'FRocket_admin' ); ?>
						</div>
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
