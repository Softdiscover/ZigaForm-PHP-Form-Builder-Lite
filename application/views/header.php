<?php
/**
 * Header
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: header.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url(); ?>default/dashboard/index">
              <div class="logo"> 
                <img src="<?php echo base_url(); ?>assets/backend/img/logo-uiform.png" alt="Zigaform - PHP Form Builder">          
              </div>
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
         <?php $this->load->view('sidebar'); ?>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata("use_login");?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url(); ?>default/intranet/settings"><i class="fa fa-gear"></i> <?php echo __('Settings','FRocket_admin'); ?> </a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url(); ?>default/intranet/logout"><i class="fa fa-power-off"></i> <?php echo __('Log out','FRocket_admin'); ?></a></li>
              </ul>
            </li>
          </ul>
            
          
            
        </div><!-- /.navbar-collapse -->

