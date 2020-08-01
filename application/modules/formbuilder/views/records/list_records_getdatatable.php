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
?>

<table id="table_id" class="display">
	<thead>
		<tr>
			<?php foreach ( $datatable_head as $value ) { ?>
				 <th><?php echo $value->fieldname; ?></th>
			<?php } ?>
				 <th><?php echo __( 'Date', 'FRocket_admin' ); ?></th>
				 <th>ID</th>
				 <th><?php echo __( 'Options', 'FRocket_admin' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $datatable_body as $value ) { ?>
		<tr>
			<?php foreach ( $value as $key => $value2 ) { ?>
				<?php if ( $key != 'fbh_id' ) { ?>
					<td><?php echo $value2; ?></td>
				<?php } ?>
			<?php } ?>
			<td><?php echo $value['fbh_id'];?></td>
			<td>
				<div class="sfdc-btn-group">
				<ul class="unstyled">
				<li>
					<a 
						class="sfdc-btn sfdc-btn-sm sfdc-btn-info"
						href="<?php echo site_url() . 'formbuilder/records/info_record?id_rec=' . $value['fbh_id']; ?>"><i class="fa fa-pencil-square-o"></i> <?php echo __( 'Show detail', 'FRocket_admin' ); ?></a></li>
				</ul>
			</div>
			</td>
		</tr>    
		<?php } ?>
	</tbody>
</table>
