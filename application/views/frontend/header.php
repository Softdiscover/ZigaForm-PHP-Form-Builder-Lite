<?php
/**
 * Frontend header
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: frontend_header.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="navbar navbar-default" data-enhance="false">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".sfdc-navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a data-ajax="false"  href="<?php echo site_url(); ?>" class="navbar-brand"><?php echo model_settings::$db_config['site_title']; ?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Form', 'frocket_front'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php 
                       
                        if(!empty($forms)){
                         
                          foreach ($forms as $value) { 
                            ?>
                            <li><a data-ajax="false" href="<?php echo site_url(); ?>?form=<?php echo $value->fmb_id; ?>"><?php echo $value->fmb_name; ?></a></li>
                        <?php
                        }   
                        }
                        ?>
                            
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>