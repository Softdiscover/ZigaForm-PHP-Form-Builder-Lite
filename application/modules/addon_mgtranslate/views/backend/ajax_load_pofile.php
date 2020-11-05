<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://zigaform.com
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
ob_start();
?>

<form 
   id="zgfm-mgtranslation-podata"
   chartset="utf-8"
   name="mgtranslationPoData"
   class="">
   <caption><b><?php echo __( 'Language', 'FRocket_admin' ); ?>:</b> <?php echo $lang; ?>, <b><?php echo __( 'Side', 'FRocket_admin' ); ?>:</b> <?php echo $side; ?>  </caption>
		<table class="table table-bordered table-striped">
		<colgroup>
	   <col span="1" style="width: 10%;">
	   <col span="1" style="width: 45%;">
	   <col span="1" style="width: 45%;">
	</colgroup>
		  <thead>
			<tr>
			  <th scope="">#</th>
			  <th scope="" class="text-nowrap"><?php echo __( 'Message ID', 'FRocket_admin' ); ?></th>
			  <th scope="" class="text-nowrap"><?php echo __( 'Translation', 'FRocket_admin' ); ?></th>
			</tr>
		  </thead>
		  <tbody>
		   
		  <?php
			$count = 1;
			$count_view = 1;
			foreach ( $entries as $key => $value ) {

				if ( ! $value['header'] ) {
					?>
			  <tr>
				  <th scope="row"><?php echo $count_view; ?></th>
				  <td><?php echo ( is_array( $value['msgid'] ) ) ? implode( '', $value['msgid'] ) : $value['msgid']; ?></td>
				  <td><textarea name="translation[<?php echo $count; ?>]" class="form-control" ><?php echo ( is_array( $value['msgstr'] ) ) ? implode( '', $value['msgstr'] ) : $value['msgstr']; ?></textarea></td>
			  </tr>
			  
					<?php
					$count_view++;
				}
					$count++;
			}


			?>
			
			
		  </tbody>
		</table>
		
		
		
</form>

<?php
$cntACmp = ob_get_contents();
$cntACmp = preg_replace( '/\s+/', ' ', $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
