<?php
defined('HTDOCS_PATH')
        || define('HTDOCS_PATH', realpath(dirname(__FILE__) . '/../'));
require 'jsmin.php';



$js= file_get_contents(HTDOCS_PATH . '/js/require/2.3.5/require.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/loader.js');

$js1 = JSMin::minify($js);


$files = glob("*.js");
$files = array_combine($files, array_map("filemtime", $files));
arsort($files);

$latest_file = key($files);

//generate js
            ob_start();
            $pathCssFile = HTDOCS_PATH . '/../frontend/js/init.js';
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