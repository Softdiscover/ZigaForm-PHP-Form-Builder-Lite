<?php
ob_start();
defined('HTDOCS_PATH')
        || define('HTDOCS_PATH', realpath(dirname(dirname(__FILE__))));
//include(HTDOCS_PATH.'/../common/css/bootstrap-widget.css');
//include(HTDOCS_PATH.'/../common/css/bootstrap-theme-widget.css');
//include(HTDOCS_PATH.'/../common/css/font-awesome.min.css');
//jasny
//include(HTDOCS_PATH.'/../common/js/bjasny/jasny-bootstrap.css');
//bootstrap slider
//include(HTDOCS_PATH.'/../backend/js/bslider/bootstrap-slider.css');
//bootstrap touchspin
//include(HTDOCS_PATH.'/../backend/js/btouchspin/jquery.bootstrap-touchspin.css');
//bootstrap date time picker
//include(HTDOCS_PATH.'/../backend/js/bdatetime/bootstrap-datetimepicker.css');
//rating star
//include(HTDOCS_PATH.'/../backend/js/bratestar/star-rating.css');
//color picker
//include(HTDOCS_PATH.'/../backend/js/colorpicker/bootstrap-colorpicker.css');
//jasny
include(HTDOCS_PATH.'/../frontend/css/global.css');
include(HTDOCS_PATH.'/../frontend/css/animations.css');
include(HTDOCS_PATH.'/../common/css/custom.css');
include(HTDOCS_PATH.'/../frontend/css/fixconflicts.css');
include(HTDOCS_PATH.'/../common/css/global-form.css');
/*dinamic checkbox*/
include(HTDOCS_PATH.'/../common/js/dcheckbox/uiform-dcheckbox.css');
include(HTDOCS_PATH.'/../common/js/dcheckbox/uiform-dradiobtn.css');
include(HTDOCS_PATH.'/../frontend/css/responsive.css');
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $cntACmp);
ob_end_clean();

//generate css
            ob_start();
            $pathCssFile = HTDOCS_PATH . '/../frontend/css/css.css';
            $f = fopen($pathCssFile, "w");
            fwrite($f, $cntACmp);
            fclose($f);
            ob_end_clean();

$expires = 60 * 60 * 24 * 7;
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
header("Cache-Control: maxage=" . $expires);
header('Content-type: text/css');
echo $cntACmp;
?>