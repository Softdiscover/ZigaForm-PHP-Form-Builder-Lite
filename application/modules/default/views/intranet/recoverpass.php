<?php
/**
 * login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Universal_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v1.20 2014-04-28 02:52:40 Softdiscover $
 * @link      http://universal-form-builder.softdiscover.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div class="box-login">
	<div class="logo" style="float:none;text-align: center;"> 
		<img src="
		<?php
		echo base_url();
		?>
		assets/backend/img/logo-uiform.png" alt="uiForm - Universal Form Builder">          
	</div>
			<div class="row">
				<div class="sfdc-col-md-12">
						<div class="row">
									 <div class="recpass-message-txt">
										 <?php echo $message; ?>
									 </div>
						</div>
				</div>
			</div>
		</div>
	
