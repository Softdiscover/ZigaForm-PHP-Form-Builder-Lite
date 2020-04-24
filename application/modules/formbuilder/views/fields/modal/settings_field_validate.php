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
	<div class="uifm-set-section-validator">
	
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<label><?php echo __( 'Add validator', 'FRocket_admin' ); ?></label>
			<div class="controls form-group tooltip-val-container validators-options-container">
				
				<div class="uifm-fld-val-opts">
					<!-- checkbox group buttons -->
					<div class=" sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
							
							<!-- validetor button -->
							<label 
								id="uifm-custom-val-req-btn"
								data-field-store="validate-typ_val"
								data-field-value="5"
								data-field-select-box="uifm-custom-val-req"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks"  >
									 <?php echo __( 'Required', 'FRocket_admin' ); ?>
							</label>
							<!--/ validetor button -->
							<label 
								id="uifm-custom-val-regex-btn"
								data-field-store="validate-typ_val"
								data-field-value="6"
								data-field-select-box="uifm-custom-val-req"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks zgfm-set-section-custominput-box"  >
									 <?php echo __( 'Custom', 'FRocket_admin' ); ?>
							</label>
						  </div>
						<div class=" sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
							<!-- validetor button -->
							<label 
								id="uifm-custom-val-alpha-btn"
								data-field-store="validate-typ_val"
								data-field-value="1"
								data-field-select-box="uifm-custom-val-alpha"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary tooltip-val-demo uifm-f-setoption-gchecks"  >
									 <?php echo __( 'Letters', 'FRocket_admin' ); ?>
							</label>
							<!--/ validetor button -->
							<label 
								id="uifm-custom-val-alphanum-btn"
								data-field-store="validate-typ_val"
								data-field-value="2"
								data-field-select-box="uifm-custom-val-alphanum"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks" >
								 <?php echo __( 'Letter & Numbers', 'FRocket_admin' ); ?>
							</label>
						  </div>
						 <div class=" sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">   
							<label 
								id="uifm-custom-val-num-btn"
								data-field-store="validate-typ_val"
								data-field-value="3"
								data-field-select-box="uifm-custom-val-num"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks" >
								  <?php echo __( 'Only numbers', 'FRocket_admin' ); ?>
							</label>
							<label 
								id="uifm-custom-val-mail-btn"
								data-field-store="validate-typ_val"
								data-field-value="4"
								data-field-select-box="uifm-custom-val-mail"
								data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary uifm-f-setoption-gchecks" >
								 <?php echo __( 'Email', 'FRocket_admin' ); ?>
							</label>
						</div>
				</div>
				
						<!--<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">    
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> <?php echo __( 'Greater than', 'FRocket_admin' ); ?>
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
							<input type="checkbox"  value="0"> <?php echo __( 'Identical', 'FRocket_admin' ); ?>
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
								<input type="checkbox"  value="0"> <?php echo __( 'Less than', 'FRocket_admin' ); ?>
							</label>
							<label data-toggle-enable="sfdc-btn-primary"
								data-toggle-disable="sfdc-btn-primary"
								data-settings-option="group-checkboxes"
								class="sfdc-btn sfdc-btn-primary" >
								<input type="checkbox"  value="0"> <?php echo __( 'Length', 'FRocket_admin' ); ?>
							</label>
					   </div>-->
			</div>
		</div>
	</div>
	
		<div class="sfdc-row" id="uifm-custom-val-title-added" style="display:none;">
			<div class="sfdc-col-md-12">
				<label ><?php echo __( 'Validator: ', 'FRocket_admin' ); ?>
			</div>
		</div>
		<div class="uifm-custom-wrap-validators">
			<!-- Required -->
			<div class="uifm-custom-validator uifm-custom-val-req" style="display:none;">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Required', 'FRocket_admin' ); ?></label>
					</div>
				</div>
				<div class="uifm-custom-val-errormsg">
					<div class="sfdc-row">
						<div class="sfdc-col-md-12">
							<span class="uifm-custom-val-title1"><?php echo __( 'Translate error message ', 'FRocket_admin' ); ?></span>
						</div>
					</div>
					<div class="sfdc-row">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
								<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
								<input id="uifm-custom-val-req-deftxt"
									   type="hidden"
									   value="<?php echo __( 'this is required', 'FRocket_admin' ); ?>"
									   >
								<div>
									<?php echo __( 'this is required', 'FRocket_admin' ); ?>
								</div>
							</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<textarea 
										data-field-store="validate-typ_val_custxt"
											style="width:100%;padding: 5px;"
											  rows="2"
											  class="autogrow uifm-f-setoption uifm-custom-val-custxt"
											  id="uifm-custom-val-req-custxt"></textarea>
									</div>
						</div>
					</div>
					<div id="zgfm-field-val-custominput-box" style="display:none;" class="sfdc-row zgfm-set-section-custominput-box">
						<div class="sfdc-col-md-12">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom validation', 'FRocket_admin' ); ?></label>
									<div class="sfdc-alert sfdc-alert-warning">
										<strong><?php echo __( 'Info!', 'FRocket_admin' ); ?></strong> <?php echo __( 'Validation using a character pattern or regular expression', 'FRocket_admin' ); ?>
										e.g. <code>^[a-zA-Zа-яА-ЯёЁ'][a-zA-Z-а-яА-ЯёЁ' ]+[a-zA-Zа-яА-ЯёЁ']?$</code>
									</div>
							</div>
							<div class="sfdc-form-group">
								<input id="uifm-custom-val-req-regexinput" 
								data-field-store="validate-customval_regex"
										class="uifm-f-setoption sfdc-form-control"
									   placeholder="Add your character pattern here"
									   value="">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Alphabet -->
			<div class="uifm-custom-validator uifm-custom-val-alpha" style="display:none;">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Letters', 'FRocket_admin' ); ?></label>
					</div>
				</div>
				<div class="uifm-custom-val-errormsg">
					<div class="sfdc-row">
						<div class="sfdc-col-md-12">
							<span class="uifm-custom-val-title1"><?php echo __( 'Translate error message ', 'FRocket_admin' ); ?></span>
						</div>
					</div>
					<div class="sfdc-row">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
									<input id="uifm-custom-val-alpha-deftxt" 
									   type="hidden"
									   value="<?php echo __( 'Required only letters', 'FRocket_admin' ); ?>"
									   >
								<div>
									<?php echo __( 'Required only letters', 'FRocket_admin' ); ?>
								</div>
							</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<textarea data-field-store="validate-typ_val_custxt"
											style="width:100%;padding: 5px;"
											  rows="2"
											  class="autogrow uifm-f-setoption uifm-custom-val-custxt"
											  id="uifm-custom-val-alpha-custxt"></textarea>
									</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Alphabet numbers-->
			<div class="uifm-custom-validator uifm-custom-val-alphanum" style="display:none;">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Letters and Numbers', 'FRocket_admin' ); ?></label>
					</div>
				</div>
				<div class="uifm-custom-val-errormsg">
					<div class="sfdc-row">
						<div class="sfdc-col-md-12">
							<span class="uifm-custom-val-title1"><?php echo __( 'Translate error message ', 'FRocket_admin' ); ?></span>
						</div>
					</div>
					<div class="sfdc-row">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
									<input id="uifm-custom-val-alphanum-deftxt" 
									   type="hidden"
									   value="<?php echo __( 'Required only Letters and Numbers', 'FRocket_admin' ); ?>"
									   >
								<div>
									<?php echo __( 'Required only Letters and Numbers', 'FRocket_admin' ); ?>
								</div>
							</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<textarea data-field-store="validate-typ_val_custxt"
											  style="width:100%;padding: 5px;"
											  rows="2"
											  class="autogrow uifm-f-setoption uifm-custom-val-custxt"
											  id="uifm-custom-val-alphanum-custxt"></textarea>
									</div>
						</div>
					</div>
				</div>
			</div>
			 <!-- Only numbers-->
			<div class="uifm-custom-validator uifm-custom-val-num" style="display:none;">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Only numbers', 'FRocket_admin' ); ?></label>
					</div>
				</div>
				<div class="uifm-custom-val-errormsg">
					<div class="sfdc-row">
						<div class="sfdc-col-md-12">
							<span class="uifm-custom-val-title1"><?php echo __( 'Translate error message ', 'FRocket_admin' ); ?></span>
						</div>
					</div>
					<div class="sfdc-row">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
									<input id="uifm-custom-val-numbers-deftxt" 
									   type="hidden"
									   value="<?php echo __( 'Required only numbers', 'FRocket_admin' ); ?>"
									   >
								<div>
									<?php echo __( 'Required only numbers', 'FRocket_admin' ); ?>
								</div>
							</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<textarea data-field-store="validate-typ_val_custxt"
											  style="width:100%;padding: 5px;"
											  rows="2"
											  class="autogrow uifm-f-setoption uifm-custom-val-custxt"
											  id="uifm-custom-val-numbers-custxt"></textarea>
									</div>
						</div>
					</div>
				</div>
			</div>
			  <!-- Email -->
			<div class="uifm-custom-validator uifm-custom-val-mail" style="display:none;">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __( 'Validator configuration: ', 'FRocket_admin' ); ?> <?php echo __( 'Email', 'FRocket_admin' ); ?></label>
					</div>
				</div>
				<div class="uifm-custom-val-errormsg">
					<div class="sfdc-row">
						<div class="sfdc-col-md-12">
							<span class="uifm-custom-val-title1"><?php echo __( 'Translate error message ', 'FRocket_admin' ); ?></span>
						</div>
					</div>
					<div class="sfdc-row">
						<div class="sfdc-col-md-6">
							<div class="sfdc-form-group">
									<label ><?php echo __( 'Default Message', 'FRocket_admin' ); ?></label>
									<input id="uifm-custom-val-email-deftxt" 
									   type="hidden"
									   value="<?php echo __( 'Required a valid mail', 'FRocket_admin' ); ?>"
									   >
								<div>
									<?php echo __( 'Required a valid mail', 'FRocket_admin' ); ?>
								</div>
							</div>
						</div>
						<div class="sfdc-col-md-6">
									<div class="sfdc-form-group">
									<label ><?php echo __( 'Custom Error Message', 'FRocket_admin' ); ?></label>
									<textarea data-field-store="validate-typ_val_custxt"
											  style="width:100%;padding: 5px;"
											  rows="2"
											  class="autogrow uifm-f-setoption uifm-custom-val-custxt"
											  id="uifm-custom-val-email-custxt"></textarea>
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
					<label 
						data-field-store="validate-pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"
						   id="uifm_fld_val_pos_1" 
						   name="uifm_fld_val_pos"
						   value="0"> <i class="fa fa-hand-o-up"></i> <?php echo __( 'Top', 'FRocket_admin' ); ?>
					</label>
					<label 
						data-field-store="validate-pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"
						   id="uifm_fld_val_pos_2" 
						   name="uifm_fld_val_pos"
						   value="1"> <i class="fa fa-hand-o-right"></i> <?php echo __( 'Right', 'FRocket_admin' ); ?>
					</label>
					<label 
						data-field-store="validate-pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"
						   id="uifm_fld_val_pos_3" 
						   name="uifm_fld_val_pos"
						   value="2"> <i class="fa fa-hand-o-down"></i> <?php echo __( 'Bottom', 'FRocket_admin' ); ?>
					</label>
					<label 
						data-field-store="validate-pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"
						id="uifm_fld_val_pos_4" 
						name="uifm_fld_val_pos"
						value="3"> <i class="fa fa-hand-o-left"></i> <?php echo __( 'Left', 'FRocket_admin' ); ?>
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-6">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Text Color', 'FRocket_admin' ); ?></label>
					<div data-field-store="validate-tip_col"
						 class="sfdc-input-group uifm-custom-color">
						<input 
							type="text" 
							value="" 
							id="uifm_fld_val_tipcolor" 
							name="uifm_fld_val_tipcolor" class="sfdc-form-control" />
						<span class="sfdc-input-group-addon"><i></i></span>
					</div>

				</div>
			</div>
		 <div class="sfdc-col-sm-6">
			 <div class="sfdc-form-group">
					<label ><?php echo __( 'Background Color', 'FRocket_admin' ); ?></label>
					<div data-field-store="validate-tip_bg"
						 class="sfdc-input-group uifm-custom-color">
						<span class="sfdc-input-group-addon"><i></i></span>
						<input 
							type="text" 
							value="" 
							id="uifm_fld_val_tipbg" 
							name="uifm_fld_val_tipbg" class="sfdc-form-control" />
						
					</div>

				</div>
			</div>
		</div>    
		<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Required icon', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Set required icon', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<input class="switch-field"
							   data-field-store="validate-reqicon_st"
								id="uifm_fld_val_reqicon_st"
								name="uifm_fld_val_reqicon_st"
							   type="checkbox" />
					</div>
				</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Choose required icon', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
						<button 
							id="uifm_fld_val_reqicon_img"
							data-field-store="validate-reqicon_img"
							class="sfdc-btn sfdc-btn-default" 
							data-iconset="glyphicon"
							role="iconpicker">
						</button>
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
					<label 
						data-field-store="validate-reqicon_pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						id="uifm_fld_val_reqicon_pos_1" 
						name="uifm_fld_val_reqicon_pos_1"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"  value="0"> <i class="fa fa-asterisk"></i> <?php echo __( 'Before label', 'FRocket_admin' ); ?>
					</label>
					<label 
						data-field-store="validate-reqicon_pos"
						data-toggle-enable="sfdc-btn-success"
						data-toggle-disable="sfdc-btn-success"
						data-settings-option="group-radiobutton"
						id="uifm_fld_val_reqicon_pos_2" 
						name="uifm_fld_val_reqicon_pos_2"
						class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
					<input type="radio"  value="1"><i class="fa fa-asterisk"></i> <?php echo __( 'After label', 'FRocket_admin' ); ?>
					</label>
				</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	
</div>
