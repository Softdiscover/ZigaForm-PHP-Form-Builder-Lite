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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
if ( intval($html_wholecont) === 1) {
    ?>
    <?php echo $content; ?>
    <?php
} else {
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title></title>
  <style type="text/css">
    table.zgfm-mail-tmp-table {
       padding:0;
       border-collapse: collapse;
       border-style: solid;
       border-width: 1px;
       border-color: black;
    }
    table.zgfm-mail-tmp-table td {
       border: 1px solid #cccccc;
       padding:6px;
    }
    table.zgfm-mail-tmp-table div {
        
    }
</style>
</head>
<body>
    <?php echo $content; ?>
</body>
</html>
    <?php
}
?>
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
