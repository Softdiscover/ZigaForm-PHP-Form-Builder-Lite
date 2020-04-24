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

<div class="uifm-set-section-input16">
   
	<div class="space10"></div>
  <div class="sfdc-row">
			<div class="sfdc-col-md-12">
				<div class="sfdc-form-group">
					<label for=""><?php echo __( 'allowed extensions', 'FRocket_admin' ); ?></label>
					
						
							<textarea 
							   data-field-store="input16-extallowed"
							   id="uifm_fld_input16_extallowed"
							   name="uifm_fld_input16_extallowed"
							   style="width:100%;"
							   class="sfdc-form-control autogrow uifm-f-setoption"></textarea>
							<div class="space10"></div>   
					   <div class="sfdc-alert sfdc-alert-info" role="alert"><?php echo __( 'Put the extensions between commas', 'FRocket_admin' ); ?></div>
				</div>
			</div>
		</div>
	<div class="space10"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					
					<div class="">
						<div class="sfdc-col-md-3">
							<label ><?php echo __( 'Maximum size', 'FRocket_admin' ); ?> (MB)</label>
						</div>
						<div class="sfdc-col-md-9">
							<div class="sfdc-row">
								<div class="sfdc-col-sm-12">
										<div class="sfdc-form-group">
											<input  
											id="uifm_fld_input16_maxsize"
											data-field-store="input16-maxsize"
											class="uifm_fld_input16_spinner"
											type="text" value="2" >
										</div>
									</div>
							</div>
							
						</div>
					</div>
				</div>
			
		</div>
	</div>
	 <div class="space10"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					<label ><?php echo __( 'Attach files to mail notification', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-6">
							<input 
								   class="switch-field"
								   data-field-store="input16-attach_st"
								   id="uifm_fld_input16_attachst"
								   type="checkbox"/>
						</div>
						
					</div>
				</div>
			<div class="space10"></div>
		   <div class="sfdc-alert sfdc-alert-warning" role="alert"><?php echo __( 'if you enable attachment option, make sure your web server (hosting) and mail server support your maximum size file', 'FRocket_admin' ); ?></div>
		</div>
	</div>
	  <fieldset>
		<legend><?php echo __( 'Custom Translations', 'FRocket_admin' ); ?> </legend>
		 <div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <label ><?php echo __( 'Select image', 'FRocket_admin' ); ?></label>
			</div>
			<div class="sfdc-col-sm-8">
					<div class="sfdc-form-group">
					   <input type="text" class="sfdc-form-control uifm-f-setoption"
							  placeholder="" 
							  name="uifm_fld_input16_txtselimage"
							  id="uifm_fld_input16_txtselimage" 
							  data-field-store="input16-stl1-txt_selimage">
					</div>
				</div>
		</div>
	   <div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <label ><?php echo __( 'Change', 'FRocket_admin' ); ?></label>
			</div>
			<div class="sfdc-col-sm-8">
					<div class="sfdc-form-group">
					   <input type="text" class="sfdc-form-control uifm-f-setoption"
							  placeholder="" 
							  name="uifm_fld_input16_txtchange"
							  id="uifm_fld_input16_txtchange" 
							  data-field-store="input16-stl1-txt_change">
					</div>
				</div>
		</div>
		<div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <label ><?php echo __( 'Remove', 'FRocket_admin' ); ?></label>
			</div>
			<div class="sfdc-col-sm-8">
					<div class="sfdc-form-group">
					   <input type="text" class="sfdc-form-control uifm-f-setoption"
							  placeholder="" 
							  name="uifm_fld_input16_txtremove"
							  id="uifm_fld_input16_txtremove" 
							  data-field-store="input16-stl1-txt_remove">
					</div>
				</div>
		</div>
	</fieldset>
</div>
