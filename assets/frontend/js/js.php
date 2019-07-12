<?php
defined('HTDOCS_PATH')
        || define('HTDOCS_PATH', realpath(dirname(__FILE__) . '/../'));
require 'jsmin.php';

//$js1= file_get_contents(HTDOCS_PATH . '/../common/js/jquery/1.11.3/jquery.min.js');
//$js1.= file_get_contents(HTDOCS_PATH . '/../common/js/jqueryui/1.11.4/jquery-ui.min.js');

//$js1.= file_get_contents(HTDOCS_PATH . '/../common/js/bootstrap/3.2.0/bootstrap.min.js');
/*jasny*/
//$js1.= file_get_contents(HTDOCS_PATH . '/../common/js/bjasny/jasny-bootstrap.js');
//bootstrap slider
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/bslider/4.10.4/bootstrap-slider.min.js');
//bootstrap touchspin
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/btouchspin/jquery.bootstrap-touchspin.js');
//bootstrap datetimepicker
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/bdatetime/moment-with-locales.js');
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/bdatetime/bootstrap-datetimepicker.js');
//star rating
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/bratestar/star-rating.js');
//color picker
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/colorpicker/bootstrap-colorpicker.min.js');
//bootstrap switch
//$js1.= file_get_contents(HTDOCS_PATH . '/../backend/js/bswitch/bootstrap-switch.js');
//form
//$js1.= file_get_contents(HTDOCS_PATH . '/../frontend/js/jquery.form.js');
//blueimp
//$js1.= file_get_contents(HTDOCS_PATH . '/../common/js/blueimp/2.16.0/js/blueimp-gallery.min.js');
//bootstrap gallery
//$js1.= file_get_contents(HTDOCS_PATH . '/../common/js/bgallery/3.1.3/js/bootstrap-image-gallery.js');

$js= file_get_contents(HTDOCS_PATH . '/js/core.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-front-evts.js');
//$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-route.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-logical.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-data-prod.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-front-helper.js');
//$js.= file_get_contents(HTDOCS_PATH . '/js/jquery.form.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/global.js');
/*dinamic checkbox*/
$js.= file_get_contents(HTDOCS_PATH . '/../common/js/dcheckbox/uiform-dcheckbox.js');
$js1 = JSMin::minify($js);
//$js1.=$js;

$files = glob("*.js");
$files = array_combine($files, array_map("filemtime", $files));
arsort($files);

$latest_file = key($files);

//generate js
            ob_start();
            $pathCssFile = HTDOCS_PATH . '/../frontend/js/js.js';
            $f = fopen($pathCssFile, "w");
            fwrite($f, $js1);
            fclose($f);
            ob_end_clean();
header('Content-Type:application/x-javascript');
$expires = 60 * 60 * 24 * 7;
header("Last-Modified: ".gmdate("D, d M Y H:i:s", $files[$latest_file])." GMT"); 
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expires) . " GMT");
header("Cache-Control: max-age=$expires, must-revalidate");
echo $js;
?>