<?php
/**
 * Json view
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: json_view.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<?php
$this->output->set_header('Content-Type: text/html; charset=UTF-8');
$this->output->set_header('X-Frame-Options: SAMEORIGIN');
$this->output->set_header('Access-Control-Allow-Origin: *');  
$this->output->set_header('Access-Control-Allow-Methods: PUT, GET, POST, OPTIONS');
$this->output->set_header('Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding');
   echo json_encode($json);
  
?>