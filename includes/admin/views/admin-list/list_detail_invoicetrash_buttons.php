<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<ul class="unstyled">
									 
								    <li><a href="javascript:void(0);" 
										   class="sfdc-btn sfdc-btn-danger uiform-confirmation-func-action"
										   data-dialog-title="<?php echo __( 'Delete permanently', 'FRocket_admin' ); ?>"
										   data-dialog-callback="zgfm_back_general.listform_deleteInvoiceById(<?php echo $id; ?>);"
										   data-recid="<?php echo $id; ?>">
											<i class="fa fa-trash-o"></i> <?php echo __( 'Delete', 'FRocket_admin' ); ?></a></li>
									</ul>
									
									 