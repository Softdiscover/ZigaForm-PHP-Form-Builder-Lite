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
	exit( 'No direct script access allowed' );
}
ob_start();
?>
 <div class="row">
		<div class="sfdc-col-md-12">
			<div class="uifm-inforecord-box-info">
				<ul>
					
			  <?php

				foreach ( $record_info as $value ) {
					?>
					<?php if ( is_array( $value['value'] ) ) { ?>   
				 <li><b><?php echo $value['field']; ?></b> 
					 <ul>
						 <?php
							foreach ( $value['value'] as $key2 => $value2 ) {
								?>
						 <li>
								<?php

								echo isset( $value2['label'] ) ? $value2['label'] : '';

								if ( isset( $value2['qty'] ) && floatval( $value2['qty'] ) > 0 ) {
									echo ' &#8594 ' . $value2['qty'] . ' ' . __( 'Units', 'FRocket_admin' ) . ' &#8594 ';
								}

								if ( isset( $value2['qty'] ) && floatval( $value2['qty'] ) > 0 && ! empty( $value2['label'] ) ) {

								} elseif ( ! empty( $value2['label'] ) ) {
									echo ' : ';
								} else {

								}
								?>
							   
						 </li>
						  
							<?php } ?>
					 </ul>
				 </li>
				 <?php } else { ?>
				 <li><b><?php echo $value['field']; ?></b> : <?php echo $value['value']; ?></li>
				 <?php } ?>
					<?php
				}
				?>
				
				</ul> 
				   
			</div>
		</div>
		
</div>
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
