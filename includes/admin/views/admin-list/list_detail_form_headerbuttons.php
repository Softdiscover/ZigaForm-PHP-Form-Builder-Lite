<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div class="uiform-listform-options-col">
						 <a class="sfdc-btn sfdc-btn-sm sfdc-btn-warning uiform-confirmation-func-action" 
							data-dialog-title="<?php echo __( 'Disable Form', 'FRocket_admin' ); ?>"
							data-dialog-callback="zgfm_back_general.list_trashform_updateStatus(2);"
						href="javascript:void(0);">
						   
						<?php echo __( 'Disable', 'FRocket_admin' ); ?>
						</a>
					</div>
					<div class="uiform-listform-options-col">
						 <a class="sfdc-btn sfdc-btn-sm sfdc-btn-info uiform-confirmation-func-action" 
							data-dialog-title="<?php echo __( 'Enable Form', 'FRocket_admin' ); ?>"
							data-dialog-callback="zgfm_back_general.list_trashform_updateStatus(1);"
						href="javascript:void(0);">
							
						<?php echo __( 'Enable', 'FRocket_admin' ); ?>
						</a>
					</div>
					<div class="uiform-listform-options-col">
						<a class="sfdc-btn sfdc-btn-sm sfdc-btn-danger uiform-confirmation-func-action" 
						   data-dialog-title="<?php echo __( 'Delete Form', 'FRocket_admin' ); ?>"
						   data-dialog-callback="zgfm_back_general.list_trashform_updateStatus(0);"
						href="javascript:void(0);">
							<i class="fa fa-trash-o"></i>
						<?php echo __( 'Delete Permanently', 'FRocket_admin' ); ?>
						</a>
					</div>