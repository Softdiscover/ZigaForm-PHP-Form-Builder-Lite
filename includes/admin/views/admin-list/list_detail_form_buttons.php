<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<ul class="unstyled">
								    
									<li><a 
										   class="guidetour-flist-del sfdc-btn sfdc-btn-sm sfdc-btn-danger uiform-confirmation-func-action"
											data-intro="<?php echo __( 'Delete form', 'FRocket_admin' ); ?>"
											data-dialog-title="<?php echo __( 'Delete Form', 'FRocket_admin' ); ?>"
											data-dialog-callback="zgfm_back_general.listform_deleteTrashFormById(<?php echo $id; ?>);"
										   href="javascript:void(0);"><i class="fa fa-trash-o"></i> <?php echo __( 'Delete', 'FRocket_admin' ); ?></a></li>
									</ul>