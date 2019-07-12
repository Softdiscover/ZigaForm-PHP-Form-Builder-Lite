<?php
set_time_limit ( 300 );
defined('HTDOCS_PATH')
        || define('HTDOCS_PATH', realpath(dirname(__FILE__) . '/../'));
require 'jsmin.php';
$js= file_get_contents(HTDOCS_PATH . '/js/prev.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/init.js');
//rocket form
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-core.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-helper.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-tools.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-upgrade.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-err.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-general.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/zgfm-back-fld-options.js');
/*attribute change*/
//$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-grid.js');
/*fields*/
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_textbox.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_textarea.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_radiobtn.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_checkbox.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_select.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_multiselect.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_fileupload.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_imageupload.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_customhtml.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_password.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_preptext.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_appetext.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_prepapptext.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_slider.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_range.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_spinner.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_captcha.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_recaptcha.js');
/*temporal it will be removed later*/
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_datepicker.js');

$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_datepicker2.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_timepicker.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_datetime.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_divider.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_colorpicker.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_ratingstar.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_hiddeninput.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_submitbtn.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_panelfld.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_heading.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_wizardbtn.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_switch.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_dyncheckbox.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_dynradiobtn.js');
/* end fields*/
//$js.= file_get_contents(HTDOCS_PATH . '/js/uiform_gridsystem.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-f-gridsystem.js');
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-panel.js');
/*dinamic checkbox*/
$js.= file_get_contents(HTDOCS_PATH . '/../common/js/dcheckbox/uiform-dcheckbox.js');
/* functions */
$js.= file_get_contents(HTDOCS_PATH . '/js/functions.js');


//$js.= file_get_contents(HTDOCS_PATH . '/../common/bootstrap/3.3.7/js/bootstrap-sfdc.js');
//grid
$js.= file_get_contents(HTDOCS_PATH . '/js/zgpbld-grid.js');

/*settings*/
$js.= file_get_contents(HTDOCS_PATH . '/js/uiform-settings.js');
/*wordpress function*/
$js.= file_get_contents(HTDOCS_PATH . '/js/global-universal.js');

/*global*/
$js.= file_get_contents(HTDOCS_PATH . '/js/global.js');

$js1 = JSMin::minify($js);


$files = glob("*.js");
$files = array_combine($files, array_map("filemtime", $files));
arsort($files);

$latest_file = key($files);

//generate js
            ob_start();
            $pathCssFile = HTDOCS_PATH . '/../backend/js/admin-js.js';
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