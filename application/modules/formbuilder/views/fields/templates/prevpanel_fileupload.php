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
ob_start();
?>
<?php
$id_field = ( ! empty( $id ) ) ? $id : '';
?>
<div id="<?php echo $id_field; ?>"  data-typefield="12" class="uiform-fileupload uiform-field uiform-field-childs zgpb-field-template">
			<div class="uiform-field-wrap">
				<div class="rkfm-row">
					<div class="rkfm-col-sm-2">
						<div class="uifm-control-label">
							
							<label class="sfdc-control-label">
								<span 
								   data-field-option="uifm-help-block"
									class="uifm-label-helpblock uifm-f-option">
									<span class="fa fa-question-circle"></span>
								</span> 
							   <span  data-field-store="label-text"
									  data-field-option="uifm-label"
									  class="uifm-label uifm-f-option"><?php echo __( 'Textbox label', 'FRocket_admin' ); ?></span>
							   <span data-field-store="sublabel-text"
									  data-field-option="uifm-sublabel"
									  class="uifm-sublabel uifm-f-option"><?php echo __( 'Textbox sublabel', 'FRocket_admin' ); ?></span>
							</label>
							  
						</div>
					</div>
					<div class="rkfm-col-sm-10">
						<div class="uifm-input-container">
							<div class="uifm-fileinput-wrap">
								<div class="fileinput fileinput-new sfdc-input-group" data-provides="fileinput">
								<div class="sfdc-form-control" data-trigger="fileinput">
									<i class="sfdc-glyphicon sfdc-glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
								<span class="sfdc-input-group-addon sfdc-btn sfdc-btn-default btn-file">
									<span class="fileinput-new"><?php echo __( 'Select file', 'FRocket_admin' ); ?></span>
									<span class="fileinput-exists"><?php echo __( 'Change', 'FRocket_admin' ); ?></span><input type="file" name="..."></span>
								<a href="#" class="sfdc-input-group-addon sfdc-btn sfdc-btn-default fileinput-exists" 
								   data-dismiss="fileinput"><?php echo __( 'Remove', 'FRocket_admin' ); ?></a>
								</div>
							</div>
						</div>
						<div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
							<?php echo __( 'Help block text', 'FRocket_admin' ); ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
