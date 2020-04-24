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
	exit( 'No direct script access allowed' );}
ob_start();
?>
<div class="rockfm-control-label">
	<label class="sfdc-control-label">
		
		<?php
			$req_icon_left  = '';
			$req_icon_right = '';
		if ( isset( $validate['reqicon_st'] ) && intval( $validate['reqicon_st'] ) === 1 ) {
			if ( isset( $validate['reqicon_pos'] ) && intval( $validate['reqicon_pos'] ) === 1 ) {
				$req_icon_right = '<i class="glyphicon ' . $validate['reqicon_img'] . '"></i>';
			} else {
				$req_icon_left = '<i class="glyphicon ' . $validate['reqicon_img'] . '"></i>';
			}
		}
		?>
		<span  
				class="rockfm-label">
				<?php
				if ( isset( $help_block['show_st'] ) && intval( $help_block['show_st'] ) === 1 ) {
					switch ( $help_block['pos'] ) {
						case 2:
							//tooltip
							?>
					<span 
						data-toggle="tooltip"
						data-placement="top"
						data-original-title="
							<?php
							if ( isset( $help_block['text'] ) ) {
								echo htmlentities( urldecode( $help_block['text'] ), ENT_QUOTES );
							}
							?>
						"
						data-field-option="rockfm-help-block"
						class="rockfm-label-helpblock">
						<span class="fa fa-question-circle"></span>
					</span>
							<?php
							break;
						case 3:
							//popup
							?>
					<a role="button"
						data-toggle="sfdc-modal"
						href="#modaltemplate_<?php echo $id; ?>"
						data-field-option="rockfm-help-block"
						class="rockfm-label-helpblock">
						<span class="fa fa-question-circle"></span>
					</a>
	  <!-- Modal -->
			<div  class="sfdc-modal sfdc-fade"  id="modaltemplate_<?php echo $id; ?>">
			<div class="sfdc-modal-dialog">
				<div class="sfdc-modal-content">
					<div class="sfdc-modal-header">
						<button type="button" class="close" 
						data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="sfdc-modal-title" id="myModalLabel">
						<span class=" fa fa-question-circle"></span>
						</h4>
					</div>
					<div class="sfdc-modal-body">
							<?php
							if ( isset( $help_block['text'] ) ) {
								echo urldecode( $help_block['text'] );
							}
							?>
					</div>
					<div class="sfdc-modal-footer">
						<button type="button" class="sfdc-btn sfdc-btn-default" 
						data-dismiss="modal"><?php echo __( 'Close', 'FRocket_admin' ); ?>
						</button>

					</div>
				</div><!-- /.sfdc-modal-content -->
			</div>
			</div><!-- /.modal --> 
							<?php
							break;

					}
				}
				?>
			<?php echo $req_icon_left; ?><?php echo isset( $label['text'] ) ? $label['text'] : ''; ?><?php echo $req_icon_right; ?></span>
		<span data-field-store="sublabel-text"
				data-field-option="rockfm-sublabel"
				class="rockfm-sublabel"><?php echo isset( $sublabel['text'] ) ? $sublabel['text'] : ''; ?></span>
	</label>

</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();

echo $cntACmp;
?>
