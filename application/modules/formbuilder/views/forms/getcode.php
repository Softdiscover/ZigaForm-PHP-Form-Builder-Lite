<?php
/**
 * get code
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: getcode.php, v1.00 2014-01-15 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="space20"></div>
<div class="sfdc-row">
<div class="sfdc-col-lg-12">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="fa fa-list-alt"></i><h5><?php echo __('Your Form code','FRocket_admin');?>  </h5>
            </div>
            <div class="widget-body">
              <div class="widget-forms clearfix">
                 
                  <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('Widget code','FRocket_admin');?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea  onClick="this.select();"  style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo stripslashes($script)?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('iframe','FRocket_admin');?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();"   style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo stripslashes($iframe)?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('Url','FRocket_admin');?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();" style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo stripslashes($url)?></textarea>
                      </div>
                  </div>   
              </div>
            </div>
            <div class="widget-footer">
               
            </div>
          </div>
</div>
</div>