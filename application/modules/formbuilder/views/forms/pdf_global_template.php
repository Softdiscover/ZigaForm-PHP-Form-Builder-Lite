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

if ( isset($html_wholecont) && intval($html_wholecont) === 1) {
    ?>
    <?php echo $content; ?>
    <?php
} else {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo isset($charset) ? $charset : 'utf-8'; ?>">
        <?php if ( ! empty($font_google)) { ?>
        <link href='https://fonts.googleapis.com/css?family=<?php echo $font_google; ?>' rel='stylesheet' type='text/css'>
        <?php } ?>
        <style type="text/css">
            <?php
            if ( isset($font)) {
                switch ( intval($font)) {
                    case 2:
                        // dejavu sans mono
                        ?>
                        body {
                        font-family: "DejaVu Sans Mono", monospace;
                        }
                        
                         * {
                            font-family: DejaVu Sans, sans-serif;
                          }
                        <?php
                        break;
                    case 3:
                        // korean
                        ?>
                           @font-face {
                            font-family: 'BMYEONSUNG';
                            font-style: normal;
                            font-weight: 400;
                            src: url("<?php echo base_url(); ?>/helpers/dompdf/lib/fonts/BMYEONSUNG_ttf.ttf") format('truetype');
                          }
                          * {
                            font-family: BMYEONSUNG,DejaVu Sans, sans-serif;
                          }
                        <?php
                        break;
                    case 4:
                        // japanese
                        ?>
                           @font-face {
                            font-family: 'mushin';
                            font-style: normal;
                            font-weight: 400;
                            src: url("<?php echo base_url(); ?>/helpers/dompdf/lib/fonts/mushin.otf") format('truetype');
                          }
                          * {
                            font-family: mushin,DejaVu Sans, sans-serif;
                          }
                        <?php
                        break;
                    case 5:
                        // chinese
                        ?>
                           @font-face {
                            font-family: 'chinese';
                            font-style: normal;
                            font-weight: 400;
                            src: url("<?php echo base_url(); ?>/helpers/dompdf/lib/fonts/chinesefont.ttf") format('truetype');
                          }
                          * {
                            font-family: chinese,DejaVu Sans, sans-serif;
                          }
                        <?php
                        break;
                    case 1:
                        // arial
                    default:
                        ?>
                        
                        <?php
                }
            }

            ?>
           
        </style>
         <?php echo $head_extra; ?>
        <?php if ( isset($is_html) && intval($is_html) === 1) { ?>       
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/frontend/js/iframe/4.1.1/iframeResizer.contentWindow.min.js"></script>
        <?php } ?>
        
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
