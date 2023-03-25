<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="uifm_modal_msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="sfdc-modal-dialog">
		<div class="sfdc-modal-content">
			<div class="sfdc-modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				 <h4 class="sfdc-modal-title"></h4>

			</div>
			<div class="sfdc-modal-body"></div>
			<div class="sfdc-modal-footer">
				<button type="button" 
						class="btn btn-info"
						data-dismiss="modal"><?php echo __( 'Close', 'FRocket_admin' ); ?></button>
				
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 
