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
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

<div id="zgfm-page-newtranslation" class='sfdclauncher'>

 
<div class="form-group">
                    <label  for="inputNewLang"><?php echo __( 'Add a Wordpress locale code or a custom name', 'FRocket_admin' ); ?></label> 
										<input class="form-control" id="inputNewLang" required="" type="text"> 
										<span class="form-text small text-muted"><?php echo __( 'it is recommended to add Wordpress Local Code (e.g. nl_NL) as new translation name or just add a new custom name.', 'FRocket_admin' ); ?></span>
                  </div>
                  <div class="form-group">
                    
</div>
   
<?php
$cntACmp = ob_get_contents();
$cntACmp = preg_replace('/\s+/', ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>
