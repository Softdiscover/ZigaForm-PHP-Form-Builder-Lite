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

<div class="uifm-set-section-input2">
	<div class="sfdc-row">
			<div class="sfdc-col-sm-12">
				<div class="sfdc-form-group">
					<label for=""><?php echo __( 'Settings label option', 'FRocket_admin' ); ?></label>
					<div class="sfdc-input-group">
						<div class="sfdc-input-group-btn" style="width:0.01%;">
							<select data-field-store="input2-size"
									id="uifm_fld_inp2_size"
									name="uifm_fld_inp2_size"
									data-live-search="true"
									data-width="150px"
									data-style="sfdc-btn-primary"
									class="uifm_field_font_selectpicker uifm-f-setoption-font">
								<optgroup label="Font size" data-max-options="2">
									<?php
									for ( $i = 8; $i <= 48; $i++ ) {
										?>
								<option value="<?php echo $i; ?>"><?php echo $i . ' px'; ?></option>
										<?php
									}
									?>
								</optgroup>
							</select>
						</div>
						<div class="sfdc-input-group-btn">
							<button data-field-store="input2-bold"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
								type="button">
								<i class="fa fa-bold"></i>
								<input type="hidden" id="uifm_fld_inp2_bold" name="uifm_fld_inp2_bold" value="0">
							</button>
							<button  data-field-store="input2-italic"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
									type="button"><i class="fa fa-italic"></i>
								<input type="hidden" id="uifm_fld_inp2_italic" name="uifm_fld_inp2_italic"  value="0">
							</button>
							<button  data-field-store="input2-underline"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
									type="button"><i class="fa fa-underline"></i>
								<input type="hidden" id="uifm_fld_inp2_u" name="uifm_fld_inp2_u" value="0">
							</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	<div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
					<label ><?php echo __( 'Color', 'FRocket_admin' ); ?></label>
					<div 
						data-field-store="input2-color"
						class="sfdc-input-group uifm-custom-color">
						<input type="text" value="" 
							   id="uifm_fld_inp2_color" 
							   name="uifm_fld_inp2_color" class="sfdc-form-control" />
						<span class="sfdc-input-group-addon"><i></i></span>
					</div>

				</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Font family', 'FRocket_admin' ); ?></label>
					<div class="sfdc-input-group uifm-custom-font">
						<?php
						$attributes    = array(
							'name'             => 'uifm_fld_inp2_font',
							'id'               => 'uifm_fld_inp2_font',
							'data-field-store' => 'input2-font',
						);
						$default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
						?>
						<?php $obj_sfm->get_view_menu( $attributes, $default_value ); ?>
						<span class="sfdc-input-group-addon">
						<input 
							data-field-store="input2-font_st"
							id="uifm_fld_inp2_font_st"
							name="uifm_fld_inp2_font_st"
							class="uifm-f-setoption-st"
							value="1"
							type="checkbox">
						</span>
						
					</div>

				</div>
			</div>
		</div>
	<div class="space20"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Options', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
   <div class="uifm-set-section-input2-optbox">
	   <div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<a href="javascript:void(0);"
			   onclick="javascript:rocketform.input2settings_addNewRdoOption();"
			   class="sfdc-btn sfdc-btn-sm sfdc-btn-success"
			   ><?php echo __( 'Add new option', 'FRocket_admin' ); ?></a>
			<button onclick="javascript:rocketform.input2settings_deleteAllOptions();" 
					class="sfdc-btn sfdc-btn-sm sfdc-btn-danger">
			 <i class="fa fa-trash-o"></i> <?php echo __( 'Remove all options', 'FRocket_admin' ); ?></button>
			 <button onclick="javascript:rocketform.input2settings_fillBlankValues();" 
					class="sfdc-btn sfdc-btn-sm sfdc-btn-success">
			 <i class="fa fa-trash-o"></i> <?php echo __( 'Copy Label to Value', 'FRocket_admin' ); ?></button>
			 <button onclick="javascript:rocketform.input2settings_ImportBulkData();" 
					class="sfdc-btn sfdc-btn-sm sfdc-btn-warning">
			 <i class="fa fa-trash-o"></i> <?php echo __( 'Import bulk data', 'FRocket_admin' ); ?></button>
		</div>
		</div>
	   <div class="space20"></div>
	   <div class="clearfix">
			<div class="sfdc-col-md-12">
				<div class="sfdc-col-md-1">
					<label ><?php echo __( 'Check', 'FRocket_admin' ); ?></label>   
				</div>
				<div class="sfdc-col-md-1">
					</div>
				<div class="sfdc-col-md-3">
					<label ><?php echo __( 'Label', 'FRocket_admin' ); ?></label>   
				</div>
				<div class="sfdc-col-md-4">
					<label ><?php echo __( 'Value', 'FRocket_admin' ); ?></label>   
				</div>
				<div class="sfdc-col-md-2">
					</div>
				</div>
				<div id="uifm-fld-inp2-options-container">
			</div>
		</div>
	   
   </div> 
	<div id="uifm-fld-inp2-block-align-box">
		<div class="sfdc-row">
			<div class="sfdc-col-md-12">
				<label ><?php echo __( 'Block alignment', 'FRocket_admin' ); ?></label>
				<div class="sfdc-controls sfdc-form-group">
					<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
						<label 
							data-field-store="input2-block_align"
							data-toggle-enable="sfdc-btn-success"
							data-toggle-disable="sfdc-btn-success"
							data-settings-option="group-radiobutton"
							class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
						<input type="radio"  
							id="uifm_fld_inp2_blo_align_1"
							value="0"> <i class="fa fa-align-left"></i> <?php echo __( 'Block', 'FRocket_admin' ); ?>
						</label>
						<label 
							data-field-store="input2-block_align"
							data-toggle-enable="sfdc-btn-success"
							data-toggle-disable="sfdc-btn-success"
							data-settings-option="group-radiobutton"
							class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
						<input type="radio"  
							id="uifm_fld_inp2_blo_align_2"
							value="1"> <i class="fa fa-align-center"></i> <?php echo __( 'Inline', 'FRocket_admin' ); ?>
						</label>

					</div>
				</div>
			</div>
		</div>
	</div>
	  <div class="space20"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Theme', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
   <div class="sfdc-row">
		<div class="sfdc-col-md-12">
			 <label ><?php echo __( 'Choose Theme', 'FRocket_admin' ); ?></label>
			<div class="sfdc-form-group">
				<select class="sfdc-form-control uifm-f-setoption"
						data-field-store="input2-style_type"
						id="uifm_fld_inp2_style_type">
					<option value="0"><?php echo __( 'Default', 'FRocket_admin' ); ?></option>
					<option value="1"><?php echo __( 'Theme 1', 'FRocket_admin' ); ?></option>
				</select>
			</div>
		</div> 
	</div>
	
	
	
	<?php
	if ( ! empty( $field_extra_src ) ) {
		echo $field_extra_src;
	}
	?>
	
   
	
</div>
