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
ob_start();
?>
<?php
$id_field = ( ! empty( $id ) ) ? $id : '';
?>
<div id="<?php echo $id_field; ?>"  data-typefield="31" data-iscontainer="1" class="uiform-panelfld uiform-field  uiform-field-childs zgpb-field-template">
			<div class="uiform-field-wrap">
				 <div class="uifm-input31-wrap">
								<div class="uifm-input31-container">
									 <div class="rkfm-inp18-row">
										 <div class="rkfm-inp18-col-sm-5">
											 <div class="uifm-inp31-txthtml-content"></div>
										 </div>
										 <div class="rkfm-inp18-col-sm-7">
											 <div class="uifm-input31-main-wrap">
												 <div class="uiform-items-container uiform-grid-inner-col">
													 [[%%fields%%]]
												 </div>
												  
											 </div>
										 </div>
									 </div>
								</div>
							</div>
				
			</div>
		</div>
 

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
