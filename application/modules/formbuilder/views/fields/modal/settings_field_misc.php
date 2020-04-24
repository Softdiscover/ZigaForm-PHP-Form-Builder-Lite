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
<div class="uiform-set-field-wrap" id="uiform-set-field-lbl-panel">
	<div class="space20"></div>
	<div class="uifm-set-section-helpblock">
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Help block', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
   <div class="sfdc-row">
			<div class="sfdc-col-sm-12">
				<div class="sfdc-form-group">
				  
				
				<label class="sfdc-control-label" for="">
					<?php echo __( 'Help block text', 'FRocket_admin' ); ?>
				</label>
				<div class="sfdc-controls sfdc-form-group">
					<?php
					$settings = array(
						'media_buttons' => true,
						'textarea_rows' => 5,
					);
					//wp_editor('', 'uifm_fld_msc_text',$settings );
					?>
					 <textarea 
							class="uifm_tinymce_obj"
							name="uifm_fld_msc_text"
							id="uifm_fld_msc_text"></textarea>
				</div>
								   
				</div>
			</div>
		</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Show help block', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<input class="switch-field" name="uifm_fld_lbl_block" type="checkbox" checked/>
					</div>
				</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Text Font', 'FRocket_admin' ); ?></label>
					<div class="sfdc-input-group uifm-custom-font">
						<input type="hidden" value="" name="uifm_fld_lbl_font">
						<?php do_action( 'styles_font_menu' ); ?>
						<span class="sfdc-input-group-addon">
						<input type="checkbox">
						</span>
					</div>

				</div>
			</div>
		</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label ><?php echo __( 'Help block alignment (temp - delete)', 'FRocket_admin' ); ?></label>
			<div class="sfdc-controls sfdc-form-group">
				<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-align-left"></i> Left
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-align-center"></i> Middle
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-align-right"></i> Right
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label ><?php echo __( 'Help block position', 'FRocket_admin' ); ?></label>
			<div class="sfdc-controls sfdc-form-group">
				<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
					<label data-toggle-enable="sfdc-btn-warning"
						data-toggle-disable="sfdc-btn-warning"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-warning" >
					<input type="radio"  value="0"> <i class="fa fa-hand-o-up"></i> At Top
					</label>
					<label data-toggle-enable="sfdc-btn-warning"
						data-toggle-disable="sfdc-btn-warning"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-warning" >
					<input type="radio"  value="0"> <i class="fa fa-hand-o-down"></i> At bottom
					</label>
					<label data-toggle-enable="sfdc-btn-warning"
						data-toggle-disable="sfdc-btn-warning"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-warning" >
					<input type="radio"  value="0"> <i class="fa fa-question-circle"></i> Tooltip
					</label>
					<label data-toggle-enable="sfdc-btn-warning"
						data-toggle-disable="sfdc-btn-warning"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-warning" >
					<input type="radio"  value="0"> <i class="fa fa-question-circle"></i> Pop up
					</label>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="uifm-set-section-validator">
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Validators', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-6">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Required', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<input class="switch-field" name="uifm_fld_lbl_block" type="checkbox" checked/>
					</div>
				</div>
			</div>
		 <div class="sfdc-col-sm-6">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Allow whitespace', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<input class="switch-field" name="uifm_fld_lbl_block" type="checkbox"/>
					</div>
				</div>
			</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label><?php echo __( 'Add validator', 'FRocket_admin' ); ?></label>
			<div class="controls form-group tooltip-val-container">
				
				<!-- checkbox group buttons -->
						<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
								<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary tooltip-val-demo"  >
							<input type="checkbox"  value="0"> Alphabet
							</label>
							
							
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> Alpha numeric
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> Only numbers
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> Email
							</label>
						</div>
						<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">    
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> Greater than
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> Identical
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
								<input type="checkbox"  value="0"> Less than
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
								<input type="checkbox"  value="0"> Length
							</label>
					   </div>
			</div>
		</div>
	</div>
	<div class="uifm-custom-validator">
		<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Less than', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
								   <div>
									   here goes the default error message
								   </div>
									</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<input type="text" value="" name="uifm_fld_inp_color" class="sfdc-form-control" />
									</div>
						</div>
					</div>
		</div>
		
	</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label ><?php echo __( 'Alert position', 'FRocket_admin' ); ?></label>
			<div class="sfdc-controls sfdc-form-group">
				<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-hand-o-up"></i> Top
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-hand-o-right"></i> Right
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-hand-o-down"></i> Bottom
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
						<input type="radio"  value="0"> <i class="fa fa-hand-o-left"></i> Left
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Set required icon', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<input class="switch-field" name="uifm_fld_lbl_block" type="checkbox" checked/>
					</div>
				</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Choose required icon', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<button class="sfdc-btn sfdc-btn-default" data-iconset="glyphicon" role="iconpicker"></button>
					</div>
				</div>
			</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-12">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Required icon position', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"> <i class="fa fa-asterisk"></i> <?php echo __( 'Before label', 'FRocket_admin' ); ?>
					</label>
					<label data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success" >
					<input type="radio"  value="0"><i class="fa fa-asterisk"></i> <?php echo __( 'After label', 'FRocket_admin' ); ?>
					</label>
				</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	
</div>
