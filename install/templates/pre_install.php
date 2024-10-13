<?php
/**
 * Pre install
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: pre_install.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
?>
<form class="form-horizontal" role="form" action="" method="POST">
<div class="row">
	<div class="col-sm-4">
		
			<div id="breadcrumb">
				 <h3>Progress</h3>
					<ul  class="list-unstyled">
					<li class="current"> <i class="fa fa-arrow-right"></i> <span>Server requirements</span> </li>
					<li > <i class="fa fa-square-o"></i> Licence </li>
					 <li > <i class="fa fa-square-o"></i> Database settings </li>
					  <li > <i class="fa fa-square-o"></i> User information </li>
				   <li ><i class="fa fa-square-o"></i> Completed </li>
				   </ul>
			</div>
		
		
	</div>
	<div class="col-sm-8">
		<h3>Server Configuration</h3>
<?php $error = false; ?>
<table class="table">
	<thead>
		<tr>
			<th>Settings</th>
			<th>Current Settings</th>
			<th>Required Settings</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody >
		<tr 
		<?php
		if ( ( phpversion() >= '5.0' ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"

			>
			<td>PHP Version</td>
			<td><?php echo phpversion(); ?></td>
			<td>5.2+</td>
			<td><?php echo ( phpversion() >= '5.0' ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr 
		<?php
		if ( ! ini_get( 'register_globals' ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td>Register Globals</td>
			<td><?php echo ( ini_get( 'register_globals' ) ) ? 'On' : 'Off'; ?></td>
			<td>Off</td>
			<td><?php echo ( ! ini_get( 'register_globals' ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>      
		<tr 
<?php
if ( ini_get( 'file_uploads' ) ) {
	$message = 'success';
} else {
	$message = 'danger';
	$error   = true;
}
?>
			class="<?php echo $message; ?>"
			>
			<td>File Uploads</td>
			<td><?php echo ( ini_get( 'file_uploads' ) ) ? 'On' : 'Off'; ?></td>
			<td>On</td>
			<td><?php echo ( ini_get( 'file_uploads' ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr 
<?php
if ( ! ini_get( 'session_auto_start' ) ) {
	$message = 'success';
} else {
	$message = 'danger';
	$error   = true;
}
?>
			class="<?php echo $message; ?>"
			>
			<td>Session Auto Start</td>
			<td><?php echo ( ini_get( 'session_auto_start' ) ) ? 'On' : 'Off'; ?></td>
			<td>Off</td>
			<td><?php echo ( ! ini_get( 'session_auto_start' ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr 
<?php
if ( extension_loaded( 'mysql' ) ) {
	$message = 'success';
} else {

	if ( extension_loaded( 'mysqli' ) ) {
		$message = 'success';
	} else {
		$message = 'danger';
		$error   = true;
	}
}
?>
			class="<?php echo $message; ?>"
			>
			<td>MySQL</td>
			<td><?php echo ( $message === 'success' ) ? 'On' : 'Off'; ?></td>
			<td>On</td>
			<td><?php echo ( $message === 'success' ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		  
	</tbody>
</table>
<h3>Directory & File Permissions</h3>
<p>
	If you see "Unwriteable" you need to change the permissions on the file or directory.
</p>
<?php
$pathDBconfigFile = '../application/config/database.php';
$pathrouteFile    = '../application/config/routes.php';
$pathconfigFile   = '../application/config/config.php';
$pathCacheFile   = '../application/cache/';
$pathLogsFile   = '../application/logs/';
?>
<table class="table">
	<thead>
		<tr>
			<th>Path</th>
			<th>Current Settings</th>
			<th>Required Settings</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<tr 
		<?php
		if ( is_writeable( $pathDBconfigFile ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td><?php echo ( is_writeable( $pathDBconfigFile ) ) ? 'Database' : '/application/config/database.php'; ?></td>
			<td><?php echo ( is_writeable( $pathDBconfigFile ) ) ? 'Writeable' : 'Unwriteable'; ?></td>
			<td>Writeable</td>
			<td><?php echo ( is_writeable( $pathDBconfigFile ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		
		<tr 
		<?php
		$pathhtaccessFile = '../index.php';
		if ( is_writeable( $pathhtaccessFile ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td><?php echo ( is_writeable( $pathhtaccessFile ) ) ? 'index' : '/index.php'; ?></td>
			<td><?php echo ( is_writeable( $pathhtaccessFile ) ) ? 'Writeable' : 'Unwriteable'; ?></td>
			<td>Writeable</td>
			<td><?php echo ( is_writeable( $pathhtaccessFile ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr 
		<?php
	 
		if ( is_writeable( $pathCacheFile ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td>Cache</td>
			<td><?php echo ( is_writeable( $pathCacheFile ) ) ? 'Writeable' : 'Unwriteable'; ?></td>
			<td>Writeable</td>
			<td><?php echo ( is_writeable( $pathCacheFile ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr
		<?php
	 
		if ( is_writeable( $pathLogsFile ) ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td>Logs</td>
			<td><?php echo ( is_writeable( $pathLogsFile ) ) ? 'Writeable' : 'Unwriteable'; ?></td>
			<td>Writeable</td>
			<td><?php echo ( is_writeable( $pathLogsFile ) ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
		<tr
		<?php
		$manifestData = manifestIsOk();
	    $manifestStatus = $manifestData['status'];
	    
		if ( $manifestStatus === true ) {
			$message = 'success';
		} else {
			$message = 'danger';
			$error   = true;
		}
		?>
			class="<?php echo $message; ?>"
			>
			<td>Integrity Check</td>
			<td><?php echo ( $manifestStatus === true  ) ? 'Complete' : 'Uncompleted, Files are missing or were modified. Make sure to upload it properly. you can compress and uncompress in your web host for fast way.'; ?>
			<?php  
			if(!empty($manifestData['failed'])){
			?>
			<ul>
			<?php
				foreach ($manifestData['failed'] as $key => $value) {
					?>
					<li><?php echo $value;?></li>
			<?php
				}
			?>
				
			</ul>	
			<?php
			}
			?>
			
			</td>
			<td>Complete</td>
			<td><?php echo ( $manifestStatus === true ) ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-exclamation-triangle"></i>'; ?></td>
		</tr>
	</tbody>
</table>
<input type="submit" class="btn btn-primary pull-right " value="next" >
 
	</div>
</div>
<input type="hidden" value="1" name="step">
</form>
