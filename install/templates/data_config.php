<?php
/**
 * Data config
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: data_config.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
?>
<div class="row">
	<div class="col-sm-4">
		
			<div id="breadcrumb">
				 <h3>Progress</h3>
					<ul  class="list-unstyled">
					<li > <i class="fa fa-check-square-o"></i> <span>Server requirements</span> </li>
					<li > <i class="fa fa-check-square-o"></i> Licence </li>
					<li > <i class="fa fa-check-square-o"></i> Database settings </li>
					<li class="current" > <i class="fa fa-arrow-right"></i> User information </li>
					<li ><i class="fa fa-square-o"></i> Completed </li>
				   </ul>
			</div>
		
		
	</div>
	<div class="col-sm-8">
		
<?php
if ( isset( $message ) ) {
	echo $message;
}
?>
<form class="form-horizontal" role="form" action="" method="POST">

	<h3>Configuration</h3>
	<div class="box-configuration">
		<div class="form-group">
			<label for="inputCompanyname" class="col-lg-4 control-label">Company Name:</label>
			<div class="col-lg-8">
				<input type="text" class="form-control" id="inputCompanyname" name="company_name" placeholder="" value="<?php echo isset( $_POST['company_name'] ) ? cleanhtml( $_POST['company_name'] ) : ''; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputsiteemail" class="col-lg-4 control-label">Site Email:</label>
			<div class="col-lg-8">
				<input type="text" class="form-control" id="inputsiteemail" name="site_email" placeholder="" value="<?php echo isset( $_POST['site_email'] ) ? cleanhtml( $_POST['site_email'] ) : ''; ?>">
			</div>
		</div>
	</div>
	<h3>Administrator Configuration</h3>
	<div class="box-configuration">
		<div class="form-group">
			<label for="inputAdminusername" class="col-lg-4 control-label">Admin Username:</label>
			<div class="col-lg-8">
				<input type="text" class="form-control" id="inputAdminusername" name="username" placeholder="" value="<?php echo isset( $_POST['username'] ) ? cleanhtml( $_POST['username'] ) : ''; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-lg-4 control-label">Password:</label>
			<div class="col-lg-8">
				<input type="password" class="form-control" id="inputPassword" name="password" placeholder="" >
			</div>
		</div>
		<div class="form-group">
			<label for="inputRepassword" class="col-lg-4 control-label">Confirm Password:</label>
			<div class="col-lg-8">
				<input type="password" class="form-control" id="inputRepassword" name="repassword" placeholder=""  >
			</div>
		</div>
	</div>
	<input type="hidden" name="mysqlhostname" value="<?php echo isset( $_POST['mysqlhostname'] ) ? cleanhtml( $_POST['mysqlhostname'] ) : ''; ?>">
	<input type="hidden" name="mysqlusername" value="<?php echo isset( $_POST['mysqlusername'] ) ? cleanhtml( $_POST['mysqlusername'] ) : ''; ?>">
	<input type="hidden" name="mysqlpassword" value="<?php echo isset( $_POST['mysqlpassword'] ) ? cleanhtml( $_POST['mysqlpassword'] ) : ''; ?>">
	<input type="hidden" name="mysqldbname" value="<?php echo isset( $_POST['mysqldbname'] ) ? cleanhtml( $_POST['mysqldbname'] ) : ''; ?>">
	<input type="hidden" name="mysqldbdriver" value="<?php echo isset( $_POST['mysqldbdriver'] ) ? cleanhtml( $_POST['mysqldbdriver'] ) : ''; ?>">
	<input type="hidden" name="ssloption" value="<?php echo isset( $_POST['ssloption'] ) ? cleanhtml( $_POST['ssloption'] ) : ''; ?>">
	
	<hr>
	<a class="btn btn-primary pull-left " href="?step=1">BACK</a>
	<button class="btn btn-primary pull-right " name="next" type="submit">NEXT</button>
<input type="hidden" value="4" name="step">
<input type="hidden" value="<?php echo $idsup; ?>" name="idsup">
</form>

	</div>
	
</div>
