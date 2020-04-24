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
<div id="uiform-container" data-uiform-page="" class="sfdc-wrap uiform-wrap">
		<div class="sfdc-col-md-12">
			<div class="space20"></div>
			<div class="uifm-settings-response"></div>
			
			<div class="uiform-settings-inner-box">
				<div class="sfdc-row">
		<div class="col-lg-12">
		<div class="widget widget-padding span12">
			<div class="widget-header">
				<i class="fa fa-list-alt"></i>
				<h5>
				<?php echo __( 'Global Settings', 'FRocket_admin' ); ?>
				</h5>
				
			</div>  
			<div class="widget-body">
			   <div class="widget-forms clearfix">
				   <form 
					   id="uifrm-setting-form"
					   chartset="utf-8"
					   name="frmform"
					   class="sfdc-form-horizontal">
					   <div id="uiform-settings-inner-body">
					   <!--<div class="sfdc-col-md-12">
								<div class="sfdc-form-group">
									
									<div class="sfdc-col-sm-4">
										 <label for=""><?php echo __( 'LANGUAGE', 'FRocket_admin' ); ?></label>  <a href="javascript:void(0);"
										   data-toggle="tooltip" data-placement="right" 
										   data-original-title="<?php echo __( 'it allows to change the language', 'FRocket_admin' ); ?>"
										   ><span class="fa fa-question-circle"></span></a>
									 </div>
									
									<div class="sfdc-col-sm-8">
									   <select class="sfdc-form-control input-sm" name="language"  id="language" data-placeholder="Select here.." >
									<?php
									foreach ( $lang_list as $frow ) :
										?>
										<?php $sel = ( $frow['val'] == $language ) ? ' selected="selected"' : ''; ?>
										<option value="<?php echo $frow['val']; ?>" <?php echo $sel; ?>>
											<?php echo $frow['label']; ?>
										</option>
										<?php
									endforeach;
									?>
									<?php unset( $frow ); ?>
									</select>
										
									</div>
								</div>
							</div> 
							<div class="space10 zgfm-opt-divider-stl1"></div> -->
							<div class="sfdc-col-md-12">
								<div class="sfdc-form-group">
									
									<div class="sfdc-col-sm-4">
										<label for=""><?php echo __( 'FIELDS FAST LOAD', 'FRocket_admin' ); ?><span style="color:red;">(beta)</span></label> <a href="javascript:void(0);"
										   data-toggle="tooltip" data-placement="right" 
										   data-original-title="<?php echo __( 'it allows to loads field options in a fast way.', 'FRocket_admin' ); ?>"
										   ><span class="fa fa-question-circle"></span></a>
											
											
									 </div>
									
									<div class="sfdc-col-sm-8">
										<input class="switch-field"
													   id="uifm_frm_fields_fastload"
													   name="uifm_frm_fields_fastload"
													   type="checkbox"/>
										  
									</div>
									
								</div>
								<div class="sfdc-alert sfdc-alert-warning">
										<strong><?php echo __( 'Info', 'FRocket_admin' ); ?></strong> <?php echo __( 'This feature is in beta test, so you if you enable option, maybe you could face some weird issues when loading field options. In case of that, just disable that option and report this issue at info@softdiscover.com ', 'FRocket_admin' ); ?> 
									</div>
							</div>
							
						</div>
				   </form>
			   </div>
				
				<div class="clear"></div>
			</div>
			<div class="widget-footer">
				<?php if ( UIFORM_DEMO === 1 ) { ?> 
				  <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
							href="javascript:void(0);"
							onclick="alert('this feature disabled on this demo');"
							>
							<i class="fa fa-floppy-o"></i>
						<?php echo __( 'Save changes', 'FRocket_admin' ); ?>
						</a>
				<?php } else { ?> 
				
				  <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
							href="javascript:void(0);"
							onclick="rocketform.globalsettings_saveOptions();"
							>
							<i class="fa fa-floppy-o"></i>
						<?php echo __( 'Save changes', 'FRocket_admin' ); ?>
						</a>
				<?php } ?> 
		</div>
		</div> 
	</div>
	</div>
			</div>
		</div>
	
</div>
<script type="text/javascript">
//<![CDATA[
$uifm(document).ready(function ($) {
		set_modalmode=(parseInt(<?php echo $fields_fastload; ?>)===1)?true:false;
	$('#uifm_frm_fields_fastload').bootstrapSwitchZgpb('state',set_modalmode);
});
//]]>
</script>
