<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<div class="uiform-editing-header">
   <nav class="sfdc-navbar sfdc-navbar-default" role="navigation">
  <div class="sfdc-navbar-inner">
<div class="sfdc-navbar-header">
		  <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
			<span class="sr-only"><?php echo __( 'Toggle navigation', 'FRocket_admin' ); ?></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a href="javascript:location.reload();" class="navbar-brand"><img title="Rocket Form" src="<?php echo base_url(); ?>assets/backend/image/rockfm-logo-header.png"></a>
		</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="sfdc-nav sfdc-navbar-nav">
		  <li class="divider-menu"></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="fa fa-file"></span> <?php echo __( 'Forms', 'FRocket_admin' ); ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo site_url() . 'formbuilder/forms/create_uiform'; ?>"><?php echo __( 'New', 'FRocket_admin' ); ?></a></li>
			<?php if ( isset( $action ) && Uiform_Form_Helper::sanitizeInput( $action ) === 'create_uiform' ) { ?>
			<li><a href="javascript:void(0);" onclick="javascript:rocketform.saveForm();"><?php echo __( 'Save', 'FRocket_admin' ); ?></a></li>
			<?php } ?>
			<li class="divider"></li>
			<li><a href="<?php echo site_url() . 'formbuilder/forms/list_uiforms'; ?>"><?php echo __( 'List forms', 'FRocket_admin' ); ?></a></li>
		  </ul>
		</li>
		<?php
		$action = $this->uri->segment( '3' );
		if ( isset( $action ) && Uiform_Form_Helper::sanitizeInput( $action ) === 'create_uiform' ) {
			?>
		<li class="divider-menu"></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-file-text-o"></span> <?php echo __( 'Templates', 'FRocket_admin' ); ?> <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			  <li><a onclick="javascript:rocketform.templates_load(1);" 
				   href="javascript:void(0);"><?php echo __( 'Contact us', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(2);" 
				   href="javascript:void(0);"><?php echo __( 'Newsletter', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(3);" 
				   href="javascript:void(0);"><?php echo __( 'Survey Questionnaire', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(4);" 
				   href="javascript:void(0);"><?php echo __( 'Online event registration', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(5);" 
				   href="javascript:void(0);"><?php echo __( 'Reservation Request', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(6);" 
				   href="javascript:void(0);"><?php echo __( 'Purchase Order - Point Of Sale', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(7);" 
				   href="javascript:void(0);"><?php echo __( 'Website Design Request', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(8);" 
				   href="javascript:void(0);"><?php echo __( 'Job Application', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(9);" 
				   href="javascript:void(0);"><?php echo __( 'CV Submission', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(10);" 
				   href="javascript:void(0);"><?php echo __( 'Order form', 'FRocket_admin' ); ?></a>
			  </li>
			  <?php if ( ZIGAFORM_F_LITE == 1 ) { ?>
			   
				<?php } else { ?>
					  <li><a onclick="javascript:rocketform.templates_load(11);" 
						   href="javascript:void(0);"><?php echo __( 'wizard form', 'FRocket_admin' ); ?></a>
					  </li>
				<?php } ?>
			  <li><a onclick="javascript:rocketform.templates_load(12);" 
				   href="javascript:void(0);"><?php echo __( 'All fields', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(13);" 
				   href="javascript:void(0);"><?php echo __( 'Conditional Logic', 'FRocket_admin' ); ?></a>
			  </li>
			  <li><a onclick="javascript:rocketform.templates_load(14);" 
				   href="javascript:void(0);"><?php echo __( 'Custom skin', 'FRocket_admin' ); ?></a>
			  </li>
		  </ul>
		</li>
		<li class="divider-menu"></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" 
			 data-toggle="dropdown"><span class="fa fa-desktop"></span> <?php echo __( 'Preview', 'FRocket_admin' ); ?> <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a onclick="javascript:rocketform.previewform_showForm(1);" 
				   href="javascript:void(0);">
					   <?php echo __( 'desktop', 'FRocket_admin' ); ?></a></li>
			<li><a onclick="javascript:rocketform.previewform_showForm(2);" 
				   href="javascript:void(0);">
					   <?php echo __( 'Tablet', 'FRocket_admin' ); ?></a></li>
			<li><a onclick="javascript:rocketform.previewform_showForm(3);" 
				   href="javascript:void(0);">
					   <?php echo __( 'smartphone', 'FRocket_admin' ); ?></a></li>
		  </ul>
		</li>
		<?php } ?>
		<li class="divider-menu"></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <span class="fa fa-question-circle"></span> <?php echo __( 'Records', 'FRocket_admin' ); ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo site_url() . 'formbuilder/records/list_records'; ?>">
				<?php echo __( 'List all Forms', 'FRocket_admin' ); ?>
				</a>
			</li>
			
			   <?php if ( ZIGAFORM_F_LITE == 1 ) { ?>
			<li><a onclick="javascript:rocketform.showFeatureLocked(this);"
				  data-blocked-feature="Filter record"
				   href="javascript:void(0);">
					<?php echo __( 'Filter records', 'FRocket_admin' ); ?> <span class="rkfm-express-lock-wrap" 
						 ><i class="fa fa-lock"></i></span></a>
			   </li>
		   <?php } else { ?>
			  <li><a href="<?php echo site_url() . 'formbuilder/records/info_records_byforms'; ?>">
				   <?php echo __( 'List by Form', 'FRocket_admin' ); ?></a>
			</li>
		   <?php } ?>
			
			<?php if ( ZIGAFORM_F_LITE == 1 ) { ?>
				<li><a onclick="javascript:rocketform.showFeatureLocked(this);"
				  data-blocked-feature="Custom report"
				   href="javascript:void(0);">
				<?php echo __( 'Custom Report', 'FRocket_admin' ); ?> <span class="rkfm-express-lock-wrap" 
						 ><i class="fa fa-lock"></i></span></a>
				</li>
			<?php } else { ?>
				<li><a href="<?php echo site_url() . 'formbuilder/records/custom_report'; ?>">
					<?php echo __( 'Custom Report', 'FRocket_admin' ); ?></a>
				</li>
			<?php } ?>
			  
		  </ul>
		</li>
		<li class="divider-menu"></li>
		<li >
			<a href="<?php echo site_url() . 'formbuilder/forms/create_uiform?opt=import'; ?>">
				<i class="fa fa-reply"></i> <?php echo __( 'Import', 'FRocket_admin' ); ?></a></li>
		<li class="divider-menu"></li>
		<li ><a href="<?php echo site_url() . 'formbuilder/forms/export_form'; ?>">
			<i class="fa fa-share"></i> <?php echo __( 'Export', 'FRocket_admin' ); ?></a></li>
		<li class="divider-menu"></li>
		<li ><a href="<?php echo site_url() . 'formbuilder/records/view_charts'; ?>">
			<span class="fa fa-area-chart"></span> <?php echo __( 'Charts', 'FRocket_admin' ); ?> 
			</a>
		</li>
		<li class="divider-menu"></li>
		<li ><a href="<?php echo site_url() . 'formbuilder/settings/view_settings'; ?>">
			<i class="fa fa-cog"></i> <?php echo __( 'Form Settings', 'FRocket_admin' ); ?>
			</a>
		</li>
	   <li class="divider-menu"></li>
		<li ><a href="<?php echo site_url() . 'formbuilder/settings/backup_settings'; ?>">
			<i class="fa fa-cloud-download"></i> <?php echo __( 'Backup', 'FRocket_admin' ); ?>
			</a>
		</li>
		<li class="divider-menu"></li>
		<li ><a href="javascript:void(0);" onclick="javascript:rocketform.guidedtour_load();">
			<span class="fa fa-question-circle"></span> <?php echo __( 'Guided tour', 'FRocket_admin' ); ?>
			</a>
		</li>
		<li class="divider-menu"></li> 
		<li ><a href="<?php echo site_url() . 'formbuilder/settings/system_check'; ?>">
			<i class="fa fa-cog"></i> <?php echo __( 'System Check', 'FRocket_admin' ); ?>
			</a>
		</li>
		<li class="divider-menu"></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <span class="fa fa-life-ring"></span> <?php echo __( 'Help', 'FRocket_admin' ); ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="https://kb.softdiscover.com/docs/zigaform-php-form-builder/" target="_blank">
				<?php echo __( 'Documentation', 'FRocket_admin' ); ?>
				</a>
			</li>
			 <li><a href="https://github.com/Softdiscover/ZigaForm-PHP-Form-Builder-Lite/issues" target="_blank">
				   <?php echo __( 'Forum', 'FRocket_admin' ); ?></a>
			 </li>
			 <li><a href="https://www.fb.com/groups/zigaforms" target="_blank">
				   <?php echo __( 'Zigaform Community', 'FRocket_admin' ); ?></a>
			 </li>
		  </ul>
		</li>
		   <li class="divider-menu"></li>
		<li ><a href="<?php echo site_url() . 'addon/zfad_backend/list_extensions'; ?>">
			<span class="fa fa-plug"></span> <?php echo __( 'Extensions', 'FRocket_admin' ); ?>
			</a>
		</li>
	  </ul>
	  <div id="uifm-loading-box" style="display:none;">
		  <div class="uifm-alert"></div>
	  </div>
	   
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

