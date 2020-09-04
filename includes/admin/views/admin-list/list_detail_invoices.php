<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div class="table-responsive">
					<form id="uiform-form-listform"
						  name="uiform-form-listform"
						  enctype="multipart/form-data"
						  method="post"
						  >
						
					
					<table class="sfdc-table sfdc-table-striped sfdc-table-bordered dataTable" id="form_list">
					<thead>
						<tr>
							<th>
								<input type="checkbox"
									   
									   onchange="rocketform.listform_selectallforms(this);"
									   >
							</th>
							<th><?php echo __( 'ID', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Name Form', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Created', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Payment Status', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Amount', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Currency', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Status', 'FRocket_admin' ); ?></th>
							<th><?php echo __( 'Options', 'FRocket_admin' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $query ) ) { ?>
							<?php foreach ( $query as $row ) : ?>
						<tr>
							<th>
								<input type="checkbox"
										class="uiform-listform-chk-id"
									   value="<?php echo $row->pgr_id; ?>"
									   name="id[]"
									   >
							</th>
							<td><?php echo $row->pgr_id; ?></td>
							<td><?php echo $row->fmb_name; ?></td>
							<td><?php echo $row->created_date; ?></td>
							<td><?php echo $row->pgr_payment_status; ?></td>
							<td><?php echo $row->pgr_payment_amount; ?></td>
							<td><?php echo $row->pgr_currency; ?></td>
							<td>
								<?php
								if ( intval( $row->flag_status ) === 1 ) {
									?>
									<span class="label label-success">
									   <?php echo __( 'Active', 'FRocket_admin' ); ?> 
									</span>
									<?php
								} else {
									?>
									<span class="label label-warning">

										<?php echo __( 'Inactive', 'FRocket_admin' ); ?>
									</span>
									<?php
								}
								?>
							</td>
							<td>
								<div class="sfdc-btn-group">
								 <?php echo $obj_list_data->list_detail_invoice_buttons($row->pgr_id);?>
								</div>
							</td>
						</tr>
								<?php
endforeach;
							?>
						<?php } else { ?>
						<tr>
							<td colspan="6">
							<div class="sfdc-alert sfdc-alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __( 'there is nothing here', 'FRocket_admin' ); ?></div>
							</td>
						</tr>
						<?php } ?>
				</tbody>
				</table> 
					</form>
				</div>
				
				<center>
					<div  class="pagination-wrap"><?php echo $pagination; ?></div></center>
