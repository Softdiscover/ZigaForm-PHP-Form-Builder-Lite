<?php
/**
 * Footer
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: footer.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_modal_msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="sfdc-modal-dialog">
		<div class="sfdc-modal-content">
			<div class="sfdc-modal-header">
				<button type="button" class="sfdc-close" data-dismiss="modal" aria-hidden="true">&times;</button>
				 <h4 class="sfdc-modal-title"></h4>

			</div>
			<div class="sfdc-modal-body"></div>
			<div class="sfdc-modal-footer">
				<button type="button" 
						class="sfdc-btn sfdc-btn-default"
						data-dismiss="modal"><?php echo __( 'Close', 'FRocket_admin' ); ?></button>
				
			</div>
		</div>
		<!-- /.sfdc-modal-content -->
	</div>
	<!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_modal_alert_regen_msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="sfdc-modal-dialog">
		<div class="sfdc-modal-content">
			<div class="sfdc-modal-header">
				 <h4 class="sfdc-modal-title"></h4>
			</div>
			<div class="sfdc-modal-body"></div>
			<div class="sfdc-modal-footer">
				<button type="button" 
						class="sfdc-btn sfdc-btn-primary"
						onclick="javascript:rocketform.migrateToVersion3();rocketform.loadFormSaved_regen_closePopUp();"
						><?php echo __( 'Regenerate', 'FRocket_admin' ); ?></button>
				
				
			</div>
		</div>
		<!-- /.sfdc-modal-content -->
	</div>
	<!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->
<div style="display:none;" class="uifm_modal_caption">
	<input type="hidden" value="<?php echo __( 'Tour guide info', 'FRocket_admin' ); ?>" id="uifm_guidetour_popup_title">
	<input type="hidden" value="<?php echo __( 'there is not tour guide for this page. press the accept button', 'FRocket_admin' ); ?>" id="uifm_guidetour_popup_notfound">
	<input type="hidden" value="<?php echo __( 'Success! Updated successfully', 'FRocket_admin' ); ?>" id="uifm_globalopt_success">
	<input type="hidden" value="<?php echo __( 'Form was created', 'FRocket_admin' ); ?>" id="uifm_newform_popup_success">
	<input type="hidden" value="<?php echo __( 'Success! The form was created. Now just copy and paste the shortcode to your content', 'FRocket_admin' ); ?>" id="uifm_newform_popup_success_cont">
	<input type="hidden" value="<?php echo __( 'the form did not loaded properly. Press regenerate button in order to recover the form', 'FRocket_admin' ); ?>" id="alert_uifm_loading_reg_cont">
</div>
<div style="display:none;">
	
	<input type="hidden" id="alert_uifm_loading_reg_title" value="<?php echo __( 'Regenerate Form', 'FRocket_admin' ); ?>">
	
	<input type="hidden" id="uifm_fld_del_box_title" value="<?php echo __( 'Delete field selected', 'FRocket_admin' ); ?>" >
	<input type="hidden" id="uifm_fld_del_box_msg" value="<?php echo __( 'Are you sure?', 'FRocket_admin' ); ?>" >
	<input type="hidden" id="uifm_fld_del_box_bt1_title" value="<?php echo __( 'Cancel', 'FRocket_admin' ); ?>" >
	<input type="hidden" id="uifm_fld_del_box_bt2_title" value="<?php echo __( 'Yes', 'FRocket_admin' ); ?>" >
</div>
<div id="uiform-confirmation-func-action-dialog" style="display: none;">
	<?php echo __( 'Are you sure about this?', 'FRocket_admin' ); ?>
</div>
