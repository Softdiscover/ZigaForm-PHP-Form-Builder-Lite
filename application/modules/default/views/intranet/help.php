<?php
/**
 * settings
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: settings.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
 <div id="zgfm-page-help-main" class="sfdc-wrap">
    <h1><?php echo __('HELP', 'FRocket_admin'); ?></h1>
    <div class="zgfm-page-help-title">
        
        <span class="sfdc-glyphicon sfdc-glyphicon-question-sign"></span>
        
        <?php echo __('Creating forms is a complex process and the logic to make all the magic happen smoothly may not work quickly with every site. With over a lot of softwares and a very complex server eco-system some forms may run into issues. This is why zigaform includes a detailed knowledge base that can help with many common issues. Resources to additional support to fit your needs can be found below. ', 'FRocket_admin'); ?>
    </div>
    
      <div class="zgfm-page-about-panel-wrap">
        <div class="row">
                <div class="col-md-6">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cube fa-2x pull-left"></i>
                            <h3 class="panel-title">  <?php echo __('Knowledgebase', 'FRocket_admin'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="text-center">
                                        <h4><?php echo __('Online documentation', 'FRocket_admin'); ?></h4>
                                        <p>
                                           <a target="_blank"
                                               href="https://kb.softdiscover.com/docs/zigaform-php-form-builder/"
                                               class="btn btn-info btn-lg">
                                              <?php echo __('User guide', 'FRocket_admin'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-lightbulb-o fa-2x pull-left"></i>
                            <h3 class="panel-title"><?php echo __('Online Support', 'FRocket_admin'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="text-center">
                                        <h4><?php echo __('Get help from professionals', 'FRocket_admin'); ?></h4>
                                        <p>
                                           <a target="_blank"
                                               href="https://php-form-builder.zigaform.com/#contact"
                                               class="btn btn-info btn-lg">
                                              <?php echo __('Get support', 'FRocket_admin'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
        
    </div>
    
</div>
