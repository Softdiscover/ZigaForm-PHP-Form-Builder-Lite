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
 * @link      https://zigaform.com
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
ob_start();
?>

<div id="zgfm-page-translation" class='sfdclauncher'>

<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
	<h1><?php echo __( 'Translation Manager', 'FRocket_admin' ); ?></h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
	<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
	   
		<div class="form-group">
		<label for=""><?php echo __( 'Select Language', 'FRocket_admin' ); ?></label>
		<select id="mgtr-input-lang" class="form-control input-sm" name="language"  id="language" data-placeholder="Select here.." >
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
		<div class="form-group">
		<label for=""><?php echo __( 'Select side', 'FRocket_admin' ); ?></label>
		  <select id="mgtr-input-side" class="form-control">
					<option value="backend"><?php echo __( 'Admin-side', 'FRocket_admin' ); ?></option>
					<option value="front"><?php echo __( 'Client-side', 'FRocket_admin' ); ?></option>
				  </select>
		</div>
		
		<?php if ( UIFORM_DEBUG === 1 ) { ?>
		<div class="form-group">
		<label for=""><?php echo __( 'Fill empty spaces', 'FRocket_admin' ); ?></label>
		<button id="zgfm-translation-fillempty" onclick="zgfm_back_mgtranslate.page_fillEmptySpaces();" class="col-12 btn btn-primary btn-lg float-right" ><?php echo __( 'Fill empty spaces', 'FRocket_admin' ); ?></button>
		</div>
		<?php } ?>
		
		</div>  
	   
			<div class="col-md-12">
			   
			<div class="form-group">
			  <div class="alert alert-warning" role="alert">
			  <?php echo __( 'Warning! if you have some changes on the translations and you are about to make an upgrade of the software, make a backup before, just copying the po and mo files from the next directory: ', 'FRocket_admin' ); ?> <?php echo base_url() . 'i18n/'; ?><br>
			  <?php echo __( 'Then after the upgrade is done, just replace/overwrite the po and mo files using your backup in order to keep the changes. also you can send your translations to zigaform.com  in order to keep your translations on future version updates. ', 'FRocket_admin' ); ?>
		  </div>
		</div>
	   
				<div id="zgfmLanguageContent">
					<img src="<?php echo base_url() . '/assets/backend/image/ajax-loader-black.gif'; ?>">
				</div>
			</div>
		
		
		<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">   
		  
		<div class="form-group">
		  <div class="container">
			<div class="row">
			  <?php if ( UIFORM_DEMO != 1 ) { ?>
			  <div class="col"><button id="zgfm-translation-newlang" class="col-12 btn btn-secondary btn-lg float-left"><?php echo __( 'Create New Language', 'FRocket_admin' ); ?></button></div>
			  <div class="col"><button id="zgfm-translation-save" class="col-12 btn btn-primary btn-lg float-right" ><?php echo __( 'Save Changes', 'FRocket_admin' ); ?></button></div>
			  <?php } else { ?>
				<div class="col"><button onclick="javascript:alert('disabled on this demo');" class="col-12 btn btn-secondary btn-lg float-left"><?php echo __( 'Create New Language', 'FRocket_admin' ); ?></button></div>
			  <div class="col"><button onclick="javascript:alert('disabled on this demo');" class="col-12 btn btn-primary btn-lg float-right" ><?php echo __( 'Save Changes', 'FRocket_admin' ); ?></button></div>
			  <?php } ?>
			</div>
		  </div>
		</div>

	   
	</div>
  </div>
</div>

</div>
  
<?php include( FCPATH . 'application/views/footer-global.php' ); ?>
 
<?php
$cntACmp = ob_get_contents();
$cntACmp = preg_replace( '/\s+/', ' ', $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
