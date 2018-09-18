<?php
/**
 * Completed
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: completed.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
?>
<form name="frmform" id="frmform"  class="form-horizontal" role="form" action="" method="POST">
<div class="row">
    <div class="col-sm-4">
            <div id="breadcrumb">
                 <h3>Progress</h3>
                    <ul  class="list-unstyled">
                    <li > <i class="fa fa-check-square-o"></i> <span>Server requirements</span> </li>
                    <li  > <i class="fa fa-check-square-o"></i> Licence </li>
                     <li > <i class="fa fa-check-square-o"></i> Database settings </li>
                      <li  > <i class="fa fa-check-square-o"></i> User information </li>
                   <li ><i class="fa fa-check-square-o"></i> Completed </li>
                   </ul>
            </div>
    </div>
    <div class="col-sm-8">   
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <?php
    $string_url = parse_url($_SERVER['REQUEST_URI']);
    $parts = explode('/', $string_url['path']);
    $total = count($parts);
    $http_var = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
    if ($total) {
        array_pop($parts);
        array_pop($parts);

        $url = $http_var.'://' . $_SERVER['HTTP_HOST'] . implode('/', $parts);
    } else {
        $url = $http_var.'://' . $_SERVER['HTTP_HOST'] . $string_url['path'];
    }
    ?>
    <h3>Installation completed</h3>
    <ol>
        <li>Please delete the install directory (/install) <a onclick="deleteInstallDir(this);" href="javascript:void(0);" class="btn btn-danger ">Delete Install dir</a></li>
    </ol>
    <p>Thank you for choosing UIFORM - FORM BUILDER & CONTACT FORM.<p>
        <h3>BACKEND</h3>
        <p><a href="<?php echo $url; ?>/index.php/admin" target="_blank"><?php echo $url; ?>/index.php/admin</a></p>
        <h3>FRONTEND</h3>
        <p><a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></p>
        <div class="space10"></div>
        
    <hr>
    </div>
    <input type="hidden" value="<?php echo $idsup;?>" id="idsup" name="idsup">
    <input type="hidden" value="3" name="appsupsend">
</div>
</form>
<script type="text/javascript">
    $(document).ready(function()
    {
       fireData1();
    }); 
</script>