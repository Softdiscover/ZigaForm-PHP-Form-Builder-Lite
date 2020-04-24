<?php
/**
 * settings
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: settings.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-cost-estimator.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div class="space20"></div>
<?php
if ( $this->session->flashdata( 'message' ) ) {
	$resp = explode( ':', $this->session->flashdata( 'message' ) )
	?>
	<div class="alert alert-<?php echo trim( $resp[0] ); ?>">
		<button data-dismiss="alert" class="close" type="button">×</button>
	<?php echo $resp[1]; ?>
	</div>
	<?php
}
?>
<div class="">
<div class="sfdc-col-lg-12">
	<div class="widget widget-padding span12">
		<div class="widget-header">
			<i class="fa fa-list-alt"></i><h5><?php echo __( 'Settings', 'FRocket_admin' ); ?>  </h5>

		</div>
		<div class="widget-body">
			<div class="widget-forms clearfix">
				<?php
				$attributes = array(
					'class' => 'form-horizontal',
					'id'    => 'frmform',
					'name'  => 'frmform',
				);
				echo form_open( site_url() . 'default/intranet/savesettings', $attributes );
				?>
				
					<div class="sfdc-form-group">
						<label class=" col-sm-2 control-label"><?php echo __( 'Site title', 'FRocket_admin' ); ?></label>
						<div class="sfdc-col-sm-10">
							<input name="site_title" id="site_title" type="text" placeholder="<?php echo __( 'Site title', 'FRocket_admin' ); ?>" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $site_title ) ) ? $site_title : ''; ?>">
						</div>
					</div>
					<div class="sfdc-form-group">
						<label class=" col-sm-2 control-label"><?php echo __( 'Admin mail', 'FRocket_admin' ); ?></label>
						<div class="sfdc-col-sm-10">
							<input name="admin_mail" id="admin_mail" type="text" placeholder="<?php echo __( 'Admin mail', 'FRocket_admin' ); ?>" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $admin_mail ) ) ? $admin_mail : ''; ?>">
						</div>
					</div>
					  
					  
				<div class="sfdc-form-group">
					<label class=" col-sm-2 control-label"><?php echo __( 'Language', 'FRocket_admin' ); ?></label>
					  <div class="sfdc-col-sm-10">
						  <div class="span4">
						<select class="sfdc-form-control input-sm" name="language"  id="language" data-placeholder="<?php echo __( 'Select here ...', 'FRocket_admin' ); ?>" >
						<?php

						foreach ( $lang_list as $key => $frow ) :
							?>
							<?php $sel = ( $key == $language ) ? ' selected="selected"' : ''; ?>
							<option value="<?php echo $key; ?>" <?php echo $sel; ?>>
							  <?php echo $frow; ?>
							</option>
							<?php
						endforeach;
						?>
						<?php unset( $frow ); ?>
						</select>
						  </div>
						
					 </div>
				  </div>
					<div class="sfdc-form-group">
						<label class=" col-sm-2 control-label"><?php echo __( 'Mailer default', 'FRocket_admin' ); ?></label>
						<div class="sfdc-col-sm-10">
							<div class="span4">
								<select class="sfdc-form-control input-sm" name="type_mail" class="chzn-select" id="type_mail" data-placeholder="Select here.." >
									<?php
									$sel = ' selected="selected"';
									?>
									<option value="1" 
									<?php
									if ( intval( $type_email ) == 1 ) {
										echo $sel;
									}
									?>
									>PHP mailer</option>
									<option value="2" 
									<?php
									if ( intval( $type_email ) == 2 ) {
										echo $sel;
									}
									?>
									>SMTP</option>
									<option value="3" 
									<?php
									if ( intval( $type_email ) == 3 ) {
										echo $sel;
									}
									?>
									>Sendmail</option>
								</select>
							</div>    
						</div>
					</div> 
					<div class="showsmtp" >
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label">SMTP host</label>
							<div class="sfdc-col-sm-10">
								<input name="smtp_host" type="text" placeholder="<?php echo __( 'Type', 'FRocket_admin' ); ?> smtp host" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $smtp_host ) ) ? $smtp_host : ''; ?>">
							</div>
						</div>
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label">SMTP port</label>
							<div class="sfdc-col-sm-10">
								<input name="smtp_port" type="text" placeholder="<?php echo __( 'Type', 'FRocket_admin' ); ?> smtp port" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $smtp_port ) ) ? $smtp_port : ''; ?>">
							</div>
						</div>
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label">SMTP user</label>
							<div class="sfdc-col-sm-10">
								<input name="smtp_user" type="text" placeholder="<?php echo __( 'Type', 'FRocket_admin' ); ?> smtp user" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $smtp_user ) ) ? $smtp_user : ''; ?>">
							</div>
						</div>
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label">SMTP password</label>
							<div class="sfdc-col-sm-10">
								<input name="smtp_pass" type="password" placeholder="<?php echo __( 'Type', 'FRocket_admin' ); ?> smtp password" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $smtp_pass ) ) ? $smtp_pass : ''; ?>">
							</div>
						</div>
						
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label">SMTP Connection Security</label>
							<div class="sfdc-col-sm-10">
								
								<select class="sfdc-form-control input-sm" name="smtp_conn" class="chzn-select" id="smtp_conn" data-placeholder="Select here.." >
									<?php
									$sel = ' selected="selected"';
									?>
									<option value="ssl" 
									<?php
									if ( strval( $smtp_conn ) === 'ssl' ) {
										echo $sel;
									}
									?>
									>ssl</option>
									<option value="tls" 
									<?php
									if ( strval( $smtp_conn ) === 'tls' ) {
										echo $sel;
									}
									?>
									>tls</option>
									
								</select>


							</div>
						</div>
					</div>  
					<div class="showsmtp2" >
						<div class="sfdc-form-group">
							<label class=" col-sm-2 control-label"><?php echo __( 'Sendmail path', 'FRocket_admin' ); ?></label>
							<div class="sfdc-col-sm-10">
								<input name="sendmail_path" type="text" placeholder="<?php echo __( 'Type', 'FRocket_admin' ); ?> sendmail path" class="sfdc-form-control col-md-7" value="<?php echo ( isset( $sendmail_path ) ) ? $sendmail_path : ''; ?>">
							</div>
						</div>
					</div>  
				<?php
				echo form_close();
				?>
			</div>
		</div>
		<div class="widget-footer">
			 <?php if ( UIFORM_DEMO === 1 ) { ?> 
										
				<button  class="sfdc-btn sfdc-btn-primary" onclick="alert('this feature disabled on this demo');"  ><?php echo __( 'Save', 'FRocket_admin' ); ?></button>
				<?php } else { ?> 
					<button type="submit" class="sfdc-btn sfdc-btn-primary" onclick="javascript:uifmsetting.settings_saveFormSettings();"><?php echo __( 'Save', 'FRocket_admin' ); ?></button>

				<?php } ?> 
			<button type="button" class="sfdc-btn sfdc-btn-default"  onclick="javascript:uifmsetting.redirect('<?php echo site_url() . 'default/dashboard/index'; ?>');return false;" ><?php echo __( 'Cancel', 'FRocket_admin' ); ?></button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	// <![CDATA[
	jQuery(document).ready(function($) {
		var res2 = '<?php echo $type_email; ?>';
		(res2 == "2" ) ? $('.showsmtp').fadeIn().show() : $('.showsmtp').hide();
		(res2 == "3" ) ? $('.showsmtp2').fadeIn().show() : $('.showsmtp2').hide();
		$('#type_mail').change(function () {
			var res = $("#type_mail option:selected").val();
			(res == "2" ) ? $('.showsmtp').fadeIn().show() : $('.showsmtp').hide();
			(res == "3" ) ? $('.showsmtp2').fadeIn().show() : $('.showsmtp2').hide();
		});
	});
	// ]]>
</script>
