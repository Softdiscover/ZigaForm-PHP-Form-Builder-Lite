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
 * @link      http://zigapage.softdiscover.com
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
ob_start();
?>
<div id="uifm-field-opt-content">
	<input type="hidden" id="uifm-field-selected-id" value="<?php echo $field_id; ?>">
	<input type="hidden" id="uifm-field-selected-type" value="<?php echo $field_type; ?>">
	<input type="hidden" id="zgpb-field-selected-block" value="<?php echo $field_block; ?>">
	<div class="uiform-builder-maintab-container">
		
		<?php if ( $is_row ) { ?>
		<div class="uiform-set-panel-header">
			<div class="uiform-set-panel-header-inner">
				<div class="sfdc-row">
					<div class="sfdc-col-md-7">
						<div class="uifm-set-section-fieldname">
							<div class="uiform-set-panel-header-fldnme">
								<label for=""><?php echo __( 'Field name', 'FRocket_admin' ); ?> <a href="javascript:void(0);"
									data-toggle="tooltip" data-placement="right"
									data-original-title="<?php echo __( 'This is important to identify the field on reports and conditional logic', 'FRocket_admin' ); ?>"
									><span class="fa fa-question-circle"></span></a></label>
								<input type="text" id="uifm_fld_main_fldname" 
									   class="sfdc-form-control" 
									   placeholder="<?php echo __( 'Type field name', 'FRocket_admin' ); ?>">
							</div>
						</div>
					</div>
					<div class="sfdc-col-md-5">
						<div class="uiform-set-panel-header-opts">
						<span> <?php echo __( 'Options', 'FRocket_admin' ); ?>:</span>
						<div class="sfdc-btn-group ">

							<button class="sfdc-btn sfdc-btn-sm sfdc-btn-danger"
									onclick="javascript:rocketform.fieldsetting_deleteFieldDialog();">
								<i class="fa fa-trash-o"></i> <?php echo __( 'Remove', 'FRocket_admin' ); ?></button>
						</div>  
						</div>
					</div>
				</div>
			</div>
		</div> 
		<?php } else { ?>
		
		 <div class="uiform-set-panel-header">
			<div class="uiform-set-panel-header-inner">
				<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<div id="zgfm-field-col-fldname-lbl">
							<h4><span id="zgfm-field-col-fldname-lbl-bl1"></span><span id="zgfm-field-col-fldname-lbl-bl2"><?php echo $message_picked_el; ?></span></h4>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<?php } ?>
		
		<div class="uiform-set-panel-container">
			<div class="uiform-set-panel-1 ">
			
			<div class="uiform-set-options-tabs">
					<!-- Nav tabs -->
				<ul class="sfdc-nav sfdc-nav-tabs">
				  <li class="sfdc-active"><a href="#sfdc-fields-opt-col-1" data-toggle="sfdc-tab"><?php echo __( 'Skin', 'FRocket_admin' ); ?></a></li>
				  <li><a href="#sfdc-fields-opt-col-2" data-toggle="sfdc-tab" class="last-child"><?php echo __( 'More Options', 'FRocket_admin' ); ?></a></li>
				</ul> 
			</div>
			
			<!-- Tab panes -->
			<div class="sfdc-tab-content ">
			  <div class="sfdc-tab-pane sfdc-in sfdc-active" id="sfdc-fields-opt-col-1">
				  <div class="uiform-tab-content scroll-pane-arrows">
					  <div class="uiform-tab-content-inner">
						  <div class="uiform-set-field-wrap">
							   <div class="sfdc-tab-content2">
					  <div id="zgpb_fld_col_style_wrapper" style="display:none;">

						   <fieldset>
								<legend><?php echo __( 'Center', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">

									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable Center position', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable center position', 'FRocket_admin' ); ?>" 
													   data-placement="right" 
													   data-toggle="tooltip" 
													   href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													 <input class="zgpb-switch-field"
														data-field-store="skin-align-show_st"
														id="zgpb_fld_col_style_st"
														name="zgpb_fld_col_style_st"
														type="checkbox"/>

												</div>    

											</div>
										</div>
									</div>

									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable Width', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable Width', 'FRocket_admin' ); ?>"
													   data-placement="right" data-toggle="tooltip" href="javascript:void(0);">
														<span class="fa fa-question-circle"></span></a>


													<!-- <input class="zgpb-switch-field"
														data-field-store="skin-align-max_width_st"
														id="zgpb_fld_col_style_maxwidth_st"
														name="zgpb_fld_col_style_maxwidth_st"
														type="checkbox"/>-->
												</div> 
												<div class="sfdc-col-md-6">
														 <input  
															id="zgpb_fld_col_style_maxwidth"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-align-max_width"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="space5"></div>
								</div>
					 </fieldset>

					  </div>


					  <fieldset>
								<legend><?php echo __( 'Margin', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Top', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Top margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_margin_top"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-margin-top"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Bottom', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Bottom margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_margin_bottom"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-margin-bottom"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'left', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Left margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_margin_left"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-margin-left"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'right', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Right margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_margin_right"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-margin-right"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="space5"></div>
								</div>
					 </fieldset>

					  <fieldset>
								<legend><?php echo __( 'Padding', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Top', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Top margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_padding_top"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-padding-top"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Bottom', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Bottom margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_padding_bottom"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-padding-bottom"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'left', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Left margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_padding_left"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-padding-left"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'right', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Right margin (px)', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input  
															id="zgpb_fld_col_padding_right"
															class="zgpb_fld_settings_spinner" 
															data-field-store="skin-padding-right"
															type="text" >

												</div>    

											</div>
										</div>
									</div>
								   <div class="space5"></div>
								</div>
					 </fieldset> 


					 <fieldset>
								<legend><?php echo __( 'Text', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Color', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Color for texts inner field', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<div 
														data-field-store="skin-text-color"
														class="sfdc-input-group zgpb-custom-color">
														<input type="text" value="" 
															   id="zgpb_fld_col_text_color" 
															   name="zgpb_fld_col_text_color" class="sfdc-form-control" />
														<span class="sfdc-input-group-addon"><i></i></span>
													</div>


												</div>    

											</div>
										</div>
									</div>
								   <div class="space5"></div>
								</div>
					 </fieldset>

					 <fieldset>
								<legend><?php echo __( 'Background', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable background', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable background', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													   <input class="zgpb-switch-field"
														data-field-store="skin-background-show_st"
														id="zgpb_fld_col_bg_st"
														type="checkbox"/>
												</div>
											</div>
										</div>
									</div>
									 <div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Background type', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Choose background type', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													   <div class="sfdc-controls sfdc-form-group">
														<div class="sfdc-btn-group sfdc-btn-group-justified"
															 data-toggle="buttons">
															<label 
																data-field-store="skin-background-type"
																data-field-value="1"
																data-toggle-enable="sfdc-btn-warning"
																data-toggle-disable="sfdc-btn-warning"
																data-settings-option="sfdc-group-radiobutton"
																id="zgpb_fld_col_bg_type_1"
																class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
															<input type="radio"  value="1">  <?php echo __( 'Solid', 'FRocket_admin' ); ?>
															</label>
															<label 
																data-field-store="skin-background-type"
																data-field-value="2"
																data-toggle-enable="sfdc-btn-warning"
																data-toggle-disable="sfdc-btn-warning"
																data-settings-option="sfdc-group-radiobutton"
																id="zgpb_fld_col_bg_type_2"
																class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
															<input type="radio"  value="2" checked> <?php echo __( 'Gradient', 'FRocket_admin' ); ?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									 <div id="zgpb_fld_col_bg_type_1_cont">
										 <div class="zgpb-opt-divider-stl1"></div>
										<div class="sfdc-row ">
										   <div class="sfdc-col-md-12">
											   <div class="sfdc-form-group">
												   <div class="sfdc-col-md-6">
													   <label for=""><?php echo __( 'Color', 'FRocket_admin' ); ?></label> 
													   <a data-original-title="<?php echo __( 'Color for background', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												   </div>
												   <div class="sfdc-col-md-6">
													   <div 
														   data-field-store="skin-background-cl_solid_color"
														   class="sfdc-input-group zgpb-custom-color">
														   <input type="text" value="" 
																  id="zgpb_fld_col_bg_clsolidcolor" 
																  name="zgpb_fld_col_bg_clsolidcolor" class="sfdc-form-control" />
														   <span class="sfdc-input-group-addon"><i></i></span>
													   </div>


												   </div>    

											   </div>
										   </div>
									   </div>
									 </div>

									 <div id="zgpb_fld_col_bg_type_2_cont">
										<div class="zgpb-opt-divider-stl1"></div>
										<div class="sfdc-row ">
										   <div class="sfdc-col-md-12">
											   <div class="sfdc-form-group">
												   <div class="sfdc-col-md-6">
													   <label for=""><?php echo __( 'Start color', 'FRocket_admin' ); ?></label> 
													   <a data-original-title="<?php echo __( 'Start color for background', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												   </div>
												   <div class="sfdc-col-md-6">
													   <div 
														   data-field-store="skin-background-cl_start_color"
														   class="sfdc-input-group zgpb-custom-color">
														   <input type="text" value="" 
																  id="zgpb_fld_col_bg_clstartcolor" 
																  name="zgpb_fld_col_bg_clstartcolor" class="sfdc-form-control" />
														   <span class="sfdc-input-group-addon"><i></i></span>
													   </div>
												   </div>
											   </div>
										   </div>
									   </div>


									 <div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'End color', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'End color for background', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<div 
														data-field-store="skin-background-cl_end_color"
														class="sfdc-input-group zgpb-custom-color">
														<input type="text" value="" 
															   id="zgpb_fld_col_bg_clendcolor" 
															   name="zgpb_fld_col_bg_clendcolor" class="sfdc-form-control" />
														<span class="sfdc-input-group-addon"><i></i></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									 </div>

									  <div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Image', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Background image', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<div class="sfdc-form-group">
														<div class="zgpb_fld_col_bg_thumbnail" id="zgpb_fld_col_bg_srcimg_wrap">

														</div>
														<input 
															name="zgpb_fld_col_bg_imgsource" 
															id="zgpb_fld_col_bg_imgsource" 
															value=""                                                
															type="hidden">
															<input 
																data-field-store="skin-background-img_source"
																id="zgpb_fld_col_bg_imgsourcebtnadd" 
																value="<?php echo __( 'Update Image', 'FRocket_admin' ); ?>" 
																class="sfdc-btn sfdc-btn-default" 
																type="button">
															<a href="javascript:void(0);"
															   onclick="javascript:rocketform.modal_editfield_col_bg_delimg();"
															   class="sfdc-btn sfdc-btn-default"
															   >
																<i class="fa fa-trash-o"></i>
															</a>

													</div>
												</div>
											</div>
										</div>
									</div>
								   <div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Size', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Background size', 'FRocket_admin' ); ?>"
													   data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
													</a>
												</div>
												<div class="sfdc-col-md-6">
													<div class="sfdc-form-group">
													   <select 
															data-field-store="skin-background-img_size_type"
															id="zgpb_fld_col_bg_sizetype"
															name="zgpb_fld_col_bg_sizetype"
															class="sfdc-form-control zgpb-f-setoption">
																<option value="0">auto</option>
																<option value="1">length</option>
																<option value="2">percentage</option>
																<option value="3">cover</option>
																<option value="4">contain</option>
																<option value="5">initial</option>
																<option value="6">inherit</option>

														</select> 

														<div id="zgpb_fld_col_bg_sizetype_len_wrap">
															<div class="space10"></div>
															<input type="text" class="sfdc-form-control zgpb-f-setoption" 
															 name="zgpb_fld_col_bg_sizetype_len" 
															 id="zgpb_fld_col_bg_sizetype_len" 
															 data-field-store="skin-background-img_size_len">
														</div>


													</div>
												</div>
											</div>
										</div>
									</div> 
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Repeat', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Background repeat', 'FRocket_admin' ); ?>"
													   data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
													</a>
												</div>
												<div class="sfdc-col-md-6">
													<div class="sfdc-form-group">
													   <select 
															data-field-store="skin-background-img_repeat"
															id="zgpb_fld_col_bg_repeat"
															name="zgpb_fld_col_bg_repeat"
															class="sfdc-form-control zgpb-f-setoption">
																<option value="0">repeat</option>
																<option value="1">repeat-x</option>
																<option value="2">repeat-y</option>
																<option value="3">no-repeat</option>
																<option value="4">initial</option>
																<option value="5">inherit</option>
														</select> 

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Position', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Background position', 'FRocket_admin' ); ?>"
													   data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
													</a>
												</div>
												<div class="sfdc-col-md-6">
													<div class="sfdc-form-group">
													   <input type="text" class="sfdc-form-control zgpb-f-setoption" 
															 name="zgpb_fld_col_bg_pos" 
															 id="zgpb_fld_col_bg_pos" 
															 data-field-store="skin-background-img_position">

													</div>
												</div>
											</div>
										</div>
									</div>
								   <div class="space5"></div>

								</div>
					 </fieldset> 

					   <fieldset>
								<legend><?php echo __( 'Border', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable Border', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable border', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input class="zgpb-switch-field"
														data-field-store="skin-border-show_st"
														id="zgpb_fld_col_border_st"
														type="checkbox"/>
												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									   <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Color', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Color for border', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<div 
														data-field-store="skin-border-color"
														class="sfdc-input-group zgpb-custom-color">
														<input type="text" value="" 
															   id="zgpb_fld_col_border_color" 
															   name="zgpb_fld_col_border_color" class="sfdc-form-control" />
														<span class="sfdc-input-group-addon"><i></i></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									  <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Border type', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Choose border type', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													   <div class="sfdc-controls sfdc-form-group">
														<div class="sfdc-btn-group sfdc-btn-group-justified"
															 data-toggle="buttons">
															<label 
																data-field-store="skin-border-type"
																data-field-value="1"
																data-toggle-enable="sfdc-btn-warning"
																data-toggle-disable="sfdc-btn-warning"
																data-settings-option="sfdc-group-radiobutton"
																id="zgpb_fld_col_border_type_1"
																class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
															<input type="radio"  value="1">  <?php echo __( 'Solid', 'FRocket_admin' ); ?>
															</label>
															<label 
																data-field-store="skin-border-type"
																data-field-value="2"
																data-toggle-enable="sfdc-btn-warning"
																data-toggle-disable="sfdc-btn-warning"
																data-settings-option="sfdc-group-radiobutton"
																id="zgpb_fld_col_border_type_2"
																class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
															<input type="radio"  value="2" checked> <?php echo __( 'Dotted', 'FRocket_admin' ); ?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Width', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Border width', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input type="text" style="width:100%;"
													data-field-store="skin-border-width"
													data-slider-value="14"
													data-slider-step="1"
													data-slider-max="60"
													data-slider-min="0" 
													data-slider-id="" 
													id="zgpb_fld_col_border_width" 
													class="zgpb-custom-slider"> 
												</div>
											</div>
										</div>
									</div>

								   <div class="space5"></div>
								</div>
					 </fieldset>
					   <fieldset>
								<legend><?php echo __( 'Border radius', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable border radius', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable border radius', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													  <input class="zgpb-switch-field"
														data-field-store="skin-border_radius-show_st"
														id="zgpb_fld_col_bradius_st"
														type="checkbox"/>
												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Size', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Drag the slider to increase the size of border radius', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input type="text" style="width:100%;"
													data-field-store="skin-border_radius-size"
													data-slider-value="14"
													data-slider-step="1"
													data-slider-max="60"
													data-slider-min="0" 
													data-slider-id="" 
													id="zgpb_fld_col_bradius_size" 
													class="zgpb-custom-slider"> 

												</div>    

											</div>
										</div>
									</div>
								   <div class="space5"></div>
								</div>
					 </fieldset>
						<fieldset>
								<legend><?php echo __( 'Shadow', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Enable shadow', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Enable shadow', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													  <input class="zgpb-switch-field"
														data-field-store="skin-shadow-show_st"
														id="zgpb_fld_col_shadow_st"
														type="checkbox"/>
												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									 <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Color', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Shadow color', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													 <div 
														data-field-store="skin-shadow-color"
														class="sfdc-input-group zgpb-custom-color">
														<input type="text" value="" 
															   id="zgpb_fld_col_shadow_color" 
															   name="zgpb_fld_col_shadow_color" class="sfdc-form-control" />
														<span class="sfdc-input-group-addon"><i></i></span>
													</div>
												</div>    

											</div>
										</div>
									</div>

									<div class="zgpb-opt-divider-stl1"></div>
									  <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Horizontal', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Drag the slider to modify horizontal value', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input type="text" style="width:100%;"
													data-field-store="skin-shadow-h_shadow"
													data-slider-value="14"
													data-slider-step="1"
													data-slider-max="60"
													data-slider-min="0" 
													data-slider-id="" 
													id="zgpb_fld_col_shadow_h" 
													class="zgpb-custom-slider"> 

												</div>    

											</div>
										</div>
									</div>
									 <div class="zgpb-opt-divider-stl1"></div>
									  <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Vertical', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Drag the slider to modify vertical value', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input type="text" style="width:100%;"
													data-field-store="skin-shadow-v_shadow"
													data-slider-value="14"
													data-slider-step="1"
													data-slider-max="60"
													data-slider-min="0" 
													data-slider-id="" 
													id="zgpb_fld_col_shadow_v" 
													class="zgpb-custom-slider"> 

												</div>    

											</div>
										</div>
									</div>
									  <div class="zgpb-opt-divider-stl1"></div>
									  <div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Blur', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Drag the slider to modify blur value', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
													<input type="text" style="width:100%;"
													data-field-store="skin-shadow-blur"
													data-slider-value="14"
													data-slider-step="1"
													data-slider-max="60"
													data-slider-min="0" 
													data-slider-id="" 
													id="zgpb_fld_col_shadow_blur" 
													class="zgpb-custom-slider"> 

												</div>    

											</div>
										</div>
									</div>
								   <div class="space5"></div>
								</div>
					 </fieldset>
				  </div>
					
						  </div>
						
					  </div>    
				  </div>
			  </div>
			 <div class="sfdc-tab-pane " id="sfdc-fields-opt-col-2">
				  <div class="uiform-tab-content scroll-pane-arrows">
					  <div class="uiform-tab-content-inner">
				  <div class="sfdc-tab-content2">
					  <fieldset>
								<legend><?php echo __( 'Additional', 'FRocket_admin' ); ?> </legend>
								<div class="zgpb-modal-body-tab-inner">

									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'ID selector', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'ID selector let you control through css or javascript', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
												  <input type="text" 
														  data-field-store="skin-custom_css-ctm_id"
														 id="zgpb_fld_col_ctmid" name="zgpb_fld_col_ctmid" placeholder="" class="zgpb-field-col-event-txt sfdc-form-control">

												</div>    

											</div>
										</div>
									</div>
									<div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'CSS class', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'CSS class let you control through css or javascript', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
												  <input type="text" 
														 data-field-store="skin-custom_css-ctm_class"
														 id="zgpb_fld_col_ctmclass" name="zgpb_fld_col_ctmclass" placeholder="" class="zgpb-field-col-event-txt sfdc-form-control">

												</div>    

											</div>
										</div>
									</div>
									 <div class="zgpb-opt-divider-stl1"></div>
									<div class="sfdc-row ">
										<div class="sfdc-col-md-12">
											<div class="sfdc-form-group">
												<div class="sfdc-col-md-6">
													<label for=""><?php echo __( 'Additional css', 'FRocket_admin' ); ?></label> 
													<a data-original-title="<?php echo __( 'Additional css', 'FRocket_admin' ); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
												</div>
												<div class="sfdc-col-md-6">
												  <textarea class="zgpb-field-col-event-txt sfdc-form-control " 
															data-field-store="skin-custom_css-ctm_additional"
															style="width: 100%; height: 200px;" name="zgpb_fld_ctmaddt" id="zgpb_fld_ctmaddt"></textarea> 
												</div>    

											</div>
										</div>
									</div>
								   <div class="space5"></div>
								</div>
					 </fieldset>
				  </div> 
					  </div>    
				  </div>
			  </div>  
			</div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
zgfm_back_fld_options.selfld_field_opt_column();
</script>
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
