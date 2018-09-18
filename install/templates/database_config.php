<?php
/**
 * Database config
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: database_config.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
?>
<div class="row">
    <div class="col-sm-4">
       
            <div id="breadcrumb">
                 <h3>Progress</h3>
                    <ul  class="list-unstyled">
                    <li > <i class="fa fa-check-square-o"></i> <span>Server requirements</span> </li>
                    <li > <i class="fa fa-check-square-o"></i> Licence </li>
                     <li class="current"  > <i class="fa fa-arrow-right"></i> Database settings </li>
                      <li > <i class="fa fa-square-o"></i> User information </li>
                   <li ><i class="fa fa-square-o"></i> Completed </li>
                   </ul>
            </div>
        
        
    </div>
    <div class="col-sm-8">
        <?php
if (isset($message)) {
    echo $message;
}
?>
<form class="form-horizontal" role="form" action="" method="POST">
    <h3>Database configuration</h3>
    <small>Create new database for the PHP Form builder</small>
    <div class="box-configuration">
        <div class="form-group">
            <label for="inputHostname" class="col-lg-4 control-label">MySQL Hostname:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="mysqlhostname" id="inputHostname" placeholder="" value="<?php echo isset($_POST['mysqlhostname']) ? cleanhtml($_POST['mysqlhostname']) : ''; ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputUsername" class="col-lg-4 control-label">MySQL User Name:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="mysqlusername" id="inputUsername" placeholder="" value="<?php echo isset($_POST['mysqlusername']) ? cleanhtml($_POST['mysqlusername']) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-4 control-label">MySQL Password:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="mysqlpassword" id="inputPassword" placeholder="" value="<?php echo isset($_POST['mysqlpassword']) ? cleanhtml($_POST['mysqlpassword']) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDBname" class="col-lg-4 control-label">MySQL Database Name:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="mysqldbname" id="inputDBname" placeholder="" value="<?php echo isset($_POST['mysqldbname']) ? cleanhtml($_POST['mysqldbname']) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <label   class="col-lg-4 control-label">SSL and HTTPS:</label>
            <div class="col-lg-8">
                 <input type="checkbox" value="1" name="ssloption">
                 <div class="alert alert-info">
  if your site is using SSL and HTTPS, check this option
</div>
            </div>
            
        </div>
        <div class="form-group">
            <label   class="col-lg-4 control-label">Driver:</label>
            <div class="col-lg-8">
                <select  name="mysqldbdriver" class="form-control">
                    
                    <?php if (extension_loaded('mysql')) { ?>
                        <option value="1"> Mysql</option>
                    <?php } ?>
                    <?php if (extension_loaded('mysqli')) { ?>
                        <option value="2"> Mysqli</option>
                    <?php } ?>
                    
                    
                    </select>
            </div>
        </div> 
    </div>

    <hr>
    <button class="btn btn-primary pull-right " name="next" type="submit">NEXT</button>
<input type="hidden" value="3" name="step">
<input type="hidden" value="<?php echo isset($idsup)?$idsup:'';?>" name="idsup">
</form>

    </div>
</div>
