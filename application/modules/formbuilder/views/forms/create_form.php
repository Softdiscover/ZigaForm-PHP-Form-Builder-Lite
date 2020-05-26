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
<div class="">
	<div class="uiform-editing-dashboard">
		
	
	<div class="uiformc-menu-wrap">
		<ul class="sfdc-nav sfdc-nav-tabs">
			<li class="sfdc-active">
				<a data-toggle="sfdc-tab" href="#uiformc-menu-sec1"><?php echo __( 'Form editor', 'FRocket_admin' ); ?></a></li>
			<li><a data-toggle="sfdc-tab"
				   class="uiform-settings-email"
				   data-intro="<?php echo __( 'email section. you can set mail options. e.g. the recipient mail', 'FRocket_admin' ); ?>"
				   href="#uiformc-menu-sec2"><?php echo __( 'Email Settings', 'FRocket_admin' ); ?></a></li>
			<li><a data-toggle="sfdc-tab"
				   class="uiform-settings-subm"
				   data-intro="<?php echo __( 'submission section. you can modify the success message and other messages', 'FRocket_admin' ); ?>"
				   href="#uiformc-menu-sec3"><?php echo __( 'On Submission', 'FRocket_admin' ); ?></a></li>
			<li><a data-toggle="sfdc-tab"
				   class="uiform-settings-main"
				   data-intro="<?php echo __( 'main settings', 'FRocket_admin' ); ?>"
				   href="#uiformc-menu-sec5"><?php echo __( 'Global settings', 'FRocket_admin' ); ?></a></li> 
								
			<?php if ( isset( $addons_actions['back_exttab_block'] ) ) { ?>
			
			<li><a data-toggle="sfdc-tab"
				   class="uiform-settings-extensions"
				   data-intro="<?php echo __( 'Extensions', 'FRocket_admin' ); ?>"
				   href="#uiformc-menu-sec7"><?php echo __( 'Extensions', 'FRocket_admin' ); ?></a>
			</li> 
			<?php } ?>
		</ul>
	</div>
	<div class="sfdc-tab-content">
		<div id="uiformc-menu-sec1" class="sfdc-tab-pane sfdc-in sfdc-active">
			<!-- editing form -->    
			<?php require 'create_form_main.php'; ?>
			<!--\end editing form -->
		</div>
		<div id="uiformc-menu-sec2" class="sfdc-tab-pane ">
			<div class="uiformc-tab-content-inner">
				<?php require 'settings_form_email.php'; ?>
			</div>
		</div>
		<div id="uiformc-menu-sec3" class="sfdc-tab-pane ">
			<div class="uiformc-tab-content-inner">
			   <?php require 'settings_form_submission.php'; ?>
			</div>
		</div>
		
		<div id="uiformc-menu-sec5" class="sfdc-tab-pane ">
		   <div class="uiformc-tab-content-inner2">
					<!-- Nav tabs -->
					<ul class="sfdc-nav sfdc-nav-tabs zgfm-nav-tabs-settings" role="tablist">
					  <li  class="sfdc-active"><a href="#zgfm-menu-main-tab-1"  role="tab" data-toggle="sfdc-tab"><?php echo __( 'Main', 'FRocket_admin' ); ?></a></li>
					  <li ><a href="#zgfm-menu-main-tab-2"  role="tab" data-toggle="sfdc-tab"><?php echo __( 'Import', 'FRocket_admin' ); ?></a></li>
					  <li ><a href="#zgfm-menu-main-tab-4"  class="zgfm_gsettings_additional" role="tab" data-toggle="sfdc-tab"><?php echo __( 'Additional', 'FRocket_admin' ); ?></a></li>
					  <li ><a href="#zgfm-menu-main-tab-5"  role="tab" data-toggle="sfdc-tab"><?php echo __( 'PDF', 'FRocket_admin' ); ?></a></li>
					  <li ><a href="#zgfm-menu-main-tab-6"  role="tab" data-toggle="sfdc-tab"><?php echo __( 'Email', 'FRocket_admin' ); ?></a></li>
					  <li ><a href="#zgfm-menu-main-tab-7"  role="tab" data-toggle="sfdc-tab"><?php echo __( 'Records', 'FRocket_admin' ); ?></a></li>
					</ul>
					<!-- Tab panes -->
					<div class="sfdc-tab-content">
					  <div  class="sfdc-tab-pane sfdc-in sfdc-active" id="zgfm-menu-main-tab-1">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main.php'; ?>
						  </div>
					  </div>
					  <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-2">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main_imp.php'; ?>
						  </div>
					  </div>
					  <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-4">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main_add.php'; ?>
						  </div>
					  </div>
					  <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-5">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main_pdf.php'; ?>
						  </div>
					  </div>
						<div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-6">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main_email.php'; ?>
						  </div>
					  </div>
					  <div  class="sfdc-tab-pane" id="zgfm-menu-main-tab-7">
						  <div class="uiformc-tab-content-inner3">
							<?php require 'settings_form_main_record.php'; ?>
						  </div>
					  </div>  
					</div>
				
			   
			</div>
		</div>
			   <?php if ( isset( $addons_actions['back_exttab_block'] ) ) { ?>
		<div id="uiformc-menu-sec7" class="sfdc-tab-pane ">
			<div class="uiformc-tab-content-inner2 clearfix">
					<!-- load modules -->
					<?php
					if ( ! empty( $modules_tab_extension ) ) {
						$count = 1;
						?>
				  <div class="sfdc-col-xs-3">
					  <ul class="sfdc-nav sfdc-nav-tabs tabs-left">
						<?php
						foreach ( $modules_tab_extension as $key => $value ) {
							?>
						  <li class="<?php echo ( $count === 1 ) ? 'sfdc-active' : ''; ?>">
							  <a data-toggle="sfdc-tab" href="#zgfm-extaddn-tabcont-<?php echo $key; ?>">
							  <?php echo $value['tab_link']['name']; ?>
							  </a>    
						  </li>
							<?php
							$count++;
						}
						?>
					  </ul>    
				  </div> 
					
					<div class="sfdc-col-xs-9">
						<div class="sfdc-tab-content">
							
							<?php
							$count = 1;
							foreach ( $modules_tab_extension as $key => $value ) {
								?>
							 <div id="zgfm-extaddn-tabcont-<?php echo $key; ?>" class="sfdc-tab-pane <?php echo ( $count === 1 ) ? 'sfdc-active' : ''; ?>">
								 <div class="zgfm-extaddn-tab-content-inner3">
									 <?php echo $value['tab_content']; ?>
								 </div>
							</div>
								<?php
								 $count++;
							}
							?>
				   
							
						</div>
						
					</div> 
					
					
					
						<?php

					}


					?>
	
	<!--/ load modules -->
			</div>
		</div>
		<?php } ?>
	</div>
<div id="uiform-editing-mbuttons">
		<?php if ( UIFORM_DEBUG === 1 ) { ?>
	 <div class="zgfm-mbuttons-single">
		<div class="sfdc-dropdown">
			<button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo __( 'Dev Options', 'FRocket_admin' ); ?> 
			<span class="sfdc-caret"></span>
			</button>
			<ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
			<li><a onclick="javascript:rocketform.testing_summbox();"
			href="javascript:void(0);"><?php echo __( 'test', 'FRocket_admin' ); ?> </a></li>
			<li><a onclick="javascript:rocketform.printmaindata();"
				href="javascript:void(0);"><?php echo __( 'Show data', 'FRocket_admin' ); ?> </a></li>
		   <li><a onclick="javascript:zgfm_back_fld_options.generate_field_htmldata();"
				href="javascript:void(0);"><?php echo __( 'Generate field static data', 'FRocket_admin' ); ?> </a></li>
			
			</ul>
			</div>
	</div>
	  
		<?php } ?>
	<div class="zgfm-mbuttons-single">
			<div class="sfdc-dropdown">
			<button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo __( 'Options', 'FRocket_admin' ); ?> 
			<span class="sfdc-caret"></span>
			</button>
			<ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
			<li><a onclick="javascript:rocketform.rollback_openModal();"
			href="javascript:void(0);"><i class="fa fa-retweet" aria-hidden="true"></i> <?php echo __( 'Rollback', 'FRocket_admin' ); ?></a></li>
			<li><a onclick="javascript:rocketform.variables_openModal();"
			href="javascript:void(0);"><i class="fa fa-table" aria-hidden="true"></i> <?php echo __( 'Variables', 'FRocket_admin' ); ?></a></li>
			<?php if ( ZIGAFORM_F_LITE === 0 ) { ?>     
			<li><a onclick="javascript:rocketform.clogicgraph_popup();"
			href="javascript:void(0);"><span class="fa fa-map"></span> <?php echo __( 'C.Logic Graph', 'FRocket_admin' ); ?></a></li>
			<?php } ?>
			<li><a onclick="javascript:rocketform.refreshPreviewSection();"
			href="javascript:void(0);"><span class="fa fa-refresh"></span> <?php echo __( 'Refresh & Clean Form', 'FRocket_admin' ); ?></a></li>
			</ul>
			</div>
	</div>
	<div class="zgfm-mbuttons-single">
		<a 
			class="sfdc-btn sfdc-btn-primary"
			onclick="javascript:rocketform.previewform_showForm(1);"
			href="javascript:void(0);">
		   <span class="fa fa-desktop"></span> <?php echo __( 'preview', 'FRocket_admin' ); ?>
		</a> 
	</div>
	<div class="zgfm-mbuttons-single">
		 <a 
			class="sfdc-btn sfdc-btn-success"
			id="uiform-set-button-save"
			onclick="javascript:rocketform.saveForm();"
			href="javascript:void(0);">
			<i class="fa fa-floppy-o"></i> <?php echo __( 'Save form', 'FRocket_admin' ); ?> 
		</a> 
	</div>
	  
		
		
	</div>
	</div>
   
</div>
<!--templates -->    
	<?php require 'templates_fields.php'; ?>
<!--\end templates -->
<!-- modals -->    
	<?php require 'create_form_modals.php'; ?>
<!--\ modals -->
<?php if ( intval( $fields_fastload ) === 1 ) { ?>
<!-- modals -->    
	<?php include 'fieldoptions_data.php'; ?>
<!--\ modals -->
<?php } ?>
