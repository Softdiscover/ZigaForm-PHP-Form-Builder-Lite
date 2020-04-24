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
ob_start();
?>
<?php

$tab_theme_type = ( isset( $tab_theme['theme_type'] ) ) ? intval( $tab_theme['theme_type'] ) : 0;
switch ( $tab_theme_type ) {
	case 1:
		$tab_theme_str = 'rockfm-wiztheme1';
		break;
	case 0:
	default:
		$tab_theme_str = 'rockfm-wiztheme0';
		break;
}

?>
<div class="uiform-step-list <?php echo $tab_theme_str; ?>" >
						<ul class="uiform-steps">
							<?php if ( count( $tab_title ) ) { ?>
								<?php $count = 1; ?>
								<?php
								foreach ( $tab_title as $key => $value ) {
									$tab_active = '';
									if ( $count === 1 ) {
										$tab_active = 'uifm-current';
									} else {
										$tab_active = 'uifm-disabled';
									}
									?>
							<li class="<?php echo $tab_active; ?>">
								<a data-tab-nro="<?php echo $key; ?>" href="#uifm-step-tab-<?php echo $key; ?>">
									<span class="uifm-number"><?php echo $count; ?></span>
									<span class="uifm-title"><?php echo $value['title']; ?></span>
								</a>
							</li>
									<?php $count++; ?>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
