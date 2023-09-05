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
<div class="uiform-set-field-wrap " >
  <div class="space20"></div>
	  
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
				
				 <div class="sfdc-col-sm-12">
					 <p class="help-block"><?php echo __( 'Get keys from Recaptcha page :  ', 'FRocket_admin' ); ?> <a href="https://www.google.com/recaptcha/" target="_blank" >https://www.google.com/recaptcha/</a> </p> 
				 </div>
				 
			</div>
		</div>	
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
				 <div class="sfdc-col-sm-4">
					 <label for=""><?php echo __( 'Enable Recaptcha Version 3', 'FRocket_admin' ); ?></label>
				 </div>
				<div class="sfdc-col-sm-8">
					<input class="switch-field"
								   id="uifm_frm_main_recaptchav3_enable"
								   name="uifm_frm_main_recaptchav3_enable"
								   type="checkbox"/>
					 <a href="javascript:void(0);"
					   data-toggle="tooltip" data-placement="right" 
					   data-original-title="<?php echo __( 'Enable Recaptcha v3', 'FRocket_admin' ); ?>"
					   ><span class="fa fa-question-circle"></span></a>
				</div>
			</div>
		</div>
		<div class="space10 zgfm-opt-divider-stl1"></div>
		
		<div class="sfdc-col-sm-12">
			<div class="sfdc-form-group">
				<div class="sfdc-col-sm-4">
					<label for=""><?php echo __( 'Site Key', 'FRocket_admin' ); ?> <a href="javascript:void(0);"
				   data-toggle="tooltip" data-placement="right" 
				   data-original-title="<?php echo __( 'This is required. Get Site key from recaptcha site. ', 'FRocket_admin' ); ?>"
				   ><span class="fa fa-question-circle"></span></a></label>
				</div>
				<div class="sfdc-col-sm-8">
					 <input type="text" 
						   id="uifm_frm_main_recaptchav3_sitekey"
						   name="uifm_frm_main_recaptchav3_sitekey"
						   style="width:100%;"
						   class="sfdc-form-control"/> 
						   
				</div>
			</div>
		</div>
	<div class="space10 zgfm-opt-divider-stl1"></div>
		
		<div class="sfdc-col-sm-12">
			<div class="sfdc-form-group">
				<div class="sfdc-col-sm-4">
					<label for=""><?php echo __( 'Secret Key', 'FRocket_admin' ); ?> <a href="javascript:void(0);"
				   data-toggle="tooltip" data-placement="right" 
				   data-original-title="<?php echo __( 'This is required. Get Secret key from recaptcha site. ', 'FRocket_admin' ); ?>"
				   ><span class="fa fa-question-circle"></span></a></label>
				</div>
				<div class="sfdc-col-sm-8">
					 <input type="text"
						   id="uifm_frm_main_recaptchav3_secretkey"
						   name="uifm_frm_main_recaptchav3_secretkey"
						   style="width:100%;"
						   class="sfdc-form-control"/> 
				</div>
			</div>
		</div>
		 
	</div>
 
	
</div>
