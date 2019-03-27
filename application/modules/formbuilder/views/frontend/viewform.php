<?php
/**
 * frontend home page
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      http://php-cost-estimator.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> </title>
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <meta name="author" content="Softdiscover Company">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0, private" >
    <meta http-equiv="Pragma" content="no-cache" >
    <meta http-equiv="Expires" content="0" >
     <script>
    window.iFrameResizer = {
        readyCallback: function(){
           /* var iframe_Id = window.parentIFrame.getId();*/
           
        }
    }
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/iframe/3.5.5/iframeResizer.contentWindow.min.js"></script>
    <style type="text/css">
        .space10 {
        height: 10px;
        border: none;
        display: block;
        padding: 0;
        clear: both;
        }
    </style>
  </head>
  <body>
  <?php
if (!empty($script)) {
    echo $script;
}
?>    
      <div class="space10"></div>
  </body>
</html>
