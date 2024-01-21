<?php
/**
 * Sidebar
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: sidebar.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div id="wpfooter">
				<?php
				if ( ZIGAFORM_F_LITE ) {
						$url  = 'https://codecanyon.net/item/zigaform-php-form-builder-contact-survey/reviews/14889427';
						$text = __( 'Please rate <strong>Zigaform</strong> <a href="' . $url . '" target="_blank" rel="noopener" > &#9733;&#9733;&#9733;&#9733;&#9733; </a> on <a href="' . $url . '" target="_blank">Codecanyon.net</a> to help us spread the word. Thank you from the Zigaform team!', 'FRocket_admin' );
				} else {
					$url  = 'https://codecanyon.net/item/zigaform-php-form-builder-contact-survey/reviews/14889427';
					$text = __( 'Please rate <strong>Zigaform</strong> <a href="' . $url . '" target="_blank" rel="noopener" > &#9733;&#9733;&#9733;&#9733;&#9733; </a> on <a href="' . $url . '" target="_blank">Codecanyon.net</a> to help us spread the word. Thank you from the Zigaform team!', 'FRocket_admin' );
				}
					echo $text;
				?>
				  
			</div>
