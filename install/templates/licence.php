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
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
?>
<div class="row">
	<div class="col-sm-4">
			<div id="breadcrumb">
				 <h3>Progress</h3>
					<ul  class="list-unstyled">
					<li > <i class="fa fa-check-square-o"></i> <span>Server requirements</span> </li>
					<li class="current" > <i class="fa fa-arrow-right"></i> Licence </li>
					<li > <i class="fa fa-square-o"></i> Database settings </li>
					<li > <i class="fa fa-square-o"></i> User information </li>
					<li ><i class="fa fa-square-o"></i> Completed </li>
				   </ul>
			</div>
	</div>
	<div class="col-sm-8">
		<h4>Step 2 out of 8 - License verification</h4>
		
		<div class="license-information">
			 <p>
Please type in the license key for the script that you can find inside your account on CodeCanyon.</p>
<form name="frmform" id="frmform" class="form-horizontal" role="form" action="" method="POST">
	<div class="form-group">
	<label for="inputusr3" class="col-sm-5 control-label">Codecanyon username</label>
	<div class="col-sm-7">
	  <input type="text" class="form-control" id="codecanyon_usr" name="codecanyon_usr" placeholder="Paste your codecanyon username here">
	</div>
  </div>
  <div class="form-group">
	<label for="inputEmail3" class="col-sm-5 control-label">Purchase Code</label>
	<div class="col-sm-7">
	  <input type="text" class="form-control" id="purchase_code" name="purchase_code" placeholder="Paste your purchase code here">
	</div>
  </div>
  
  <div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	  <div id="licence-button-next">
			<a href="javascript:void(0);" class="btn btn-primary pull-right"  onclick="javascript:saveLicense();">Next</a>
		</div>
	</div>
  </div>
	<input type="hidden" name="id" value="">
	<input type="hidden" value="2" name="step">
	<input type="hidden" value="1" name="appsupsend">
</form>
			 <h4> FAQ: How to get Purchase Code?</h4>
<ol>
	<li>Make sure that you logged in to your account.</li>
	<li>Visit your Downloads section, find the plugin, that you want to get a license key for, and click the button Download, then Licence Certificate.</li>
	<li>Find the Item Purchase Code in the text document and paste it.</li>
</ol>
<p>Please, see the image below:
<br>
<img src="assets/img/print-screen-licence.png" />
</p>
</div>
	</div>
</div>

