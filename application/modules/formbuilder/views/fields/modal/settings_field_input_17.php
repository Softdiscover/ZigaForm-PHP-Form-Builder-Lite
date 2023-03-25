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
?>

<div class="uifm-set-section-input17">
   
<div class="uifm-set-section-input17-optbox">
	<div class="sfdc-row">
		<div class="sfdc-col-md-6">
		   <label ><?php echo __( 'Image Height', 'FRocket_admin' ); ?></label>
			<input  
				class="uifm-f-setoption uifm_fld_inp17_thopt_spinner"
			id="uifm_fld_inp17_thopt_height"
			data-field-store="input17-thopt_height"
			type="text" >
									
		</div>
		<div class="sfdc-col-md-6">
			   <label ><?php echo __( 'Image width', 'FRocket_admin' ); ?></label>
			<input  
				class="uifm-f-setoption uifm_fld_inp17_thopt_spinner_2"
			id="uifm_fld_inp17_thopt_width"
			data-field-store="input17-thopt_width"
			type="text" >
		</div>
	</div>
	
	 <div class="space20"></div>
	<div class="sfdc-row uifm_fld_inp17_thopt_mode_wrap">
		<div class="sfdc-col-md-3" >
		   <label ><?php echo __( 'Layout mode', 'FRocket_admin' ); ?></label>                     
		</div>
		<div class="sfdc-col-md-6" >
			   <select id="uifm_fld_inp17_thopt_mode" 
								style="width:73px;"
								onchange="javascript:zgfm_input17_onChangeLayout();"
								data-field-store="input17-thopt_mode"
								class="sfdc-form-control">
							<option value="1"><?php echo __( 'one', 'FRocket_admin' ); ?></option>
							<option value="2"><?php echo __( 'two', 'FRocket_admin' ); ?></option>
						</select>
		</div>
	</div>
	<div class="space10"></div>
	
	
	
	<div class="sfdc-row">
		<div class="sfdc-col-md-6" id="uifm_fld_inp17_thopt_zoom_wrap">
		   <label ><?php echo __( 'Show zoom option', 'FRocket_admin' ); ?></label>
			<input class="switch-field"
				   data-field-store="input17-thopt_zoom"
				   id="uifm_fld_inp17_thopt_zoom"
				   name="uifm_fld_inp17_thopt_zoom"
				   type="checkbox"/>
									
		</div>
		<div class="sfdc-col-md-6"id="uifm_fld_inp17_thopt_usethmb_wrap">
			   <label ><?php echo __( 'Use Thumbnail', 'FRocket_admin' ); ?></label>
			<input class="switch-field"
				   data-field-store="input17-thopt_usethmb"
				   id="uifm_fld_inp17_thopt_usethmb"
				   name="uifm_fld_inp17_thopt_usethmb"
				   type="checkbox"/>
		</div>
	</div>
	<div class="sfdc-row" >
		<div class="space10"></div>
			<div class="sfdc-col-md-12" id="uifm_fld_inp17_thopt_showhvrtxt_wrap" >
		   <label ><?php echo __( 'Label', 'FRocket_admin' ); ?></label>
			
		   <select id="uifm_fld_inp17_thopt_showhvrtxt"  
								data-field-store="input17-thopt_showhvrtxt"
								class="sfdc-form-control uifm-f-setoption">
							<option value="0"><?php echo __( 'hide', 'FRocket_admin' ); ?></option>
							<option value="1"><?php echo __( 'show on hover', 'FRocket_admin' ); ?></option>
							<option value="2"><?php echo __( 'put below image', 'FRocket_admin' ); ?></option>
							<option value="3"><?php echo __( 'put above image', 'FRocket_admin' ); ?></option>
						</select>
			
									
			</div>
		
		 <div class="sfdc-col-md-6" id="uifm_fld_inp17_thopt_showcheckb_wrap" >
		   <label ><?php echo __( 'Show Check Box', 'FRocket_admin' ); ?></label>
			<input class="switch-field"
				   data-field-store="input17-thopt_showcheckb"
				   id="uifm_fld_inp17_thopt_showcheckb"
				   name="uifm_fld_inp17_thopt_showcheckb"
				   type="checkbox"/>
									
			</div>
	</div>
	
	<div class="space10"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<a href="javascript:void(0);"
			   onclick="javascript:rocketform.input17settings_addNewOption();"
			   class="sfdc-btn sfdc-btn-sm sfdc-btn-success"
			   ><?php echo __( 'Add new option', 'FRocket_admin' ); ?></a>
			<button onclick="javascript:rocketform.input17settings_deleteAllOptions();" 
					class="sfdc-btn sfdc-btn-sm sfdc-btn-danger">
			 <i class="fa fa-trash-o"></i> <?php echo __( 'Remove all options', 'FRocket_admin' ); ?></button>
		</div>
		</div>
	   <div class="sfdc-row">
			<div class="sfdc-col-md-12">
				<div id="uifm-fld-inp17-options-container">
						
				</div>
			</div>
		</div>
	   
   </div>
</div>
