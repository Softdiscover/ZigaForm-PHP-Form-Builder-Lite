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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo isset($charset)?$charset:'utf-8';?>">
        <?php if(!empty($font_google)){?>
        <link href='https://fonts.googleapis.com/css?family=<?php echo $font_google;?>' rel='stylesheet' type='text/css'>
        <?php } ?>
        <style type="text/css">
            <?php 
            if(!empty($font)){
                switch (intval($font)) {
                case 2:
                    ?>
                        body {
                        font-family: "DejaVu Sans Mono", monospace;
                        }
                    <?php
                    break;
                case 1:
                default:
                   ?>
                        
                    <?php
            } 
            }
           
            
            ?>
             
        </style>
        <?php echo isset($head_extra)?$head_extra:'';?>
    </head> 
    <body>
        <?php echo $content;?>
    </body>
</html> 
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>