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
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="space20"></div>
<div class="sfdc-row">
<div class="sfdc-col-lg-12">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="fa fa-list-alt"></i><h5><?php echo __('Your Form code', 'FRocket_admin'); ?>  </h5>
            </div>
            <div class="widget-body">
              <div class="widget-forms sfdc-clearfix">
                 
                  <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('Widget code', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea  onClick="this.select();"  style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo  $script; ?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('iframe', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();"   style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo  $iframe; ?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('Url', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();" style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo  $url; ?></textarea>
                      </div>
                  </div>   
                  <div class="sfdc-row">
                        <div class="sfdc-col-md-12">
                            <div class="divider2">
                            <div class="mask"></div>
                            
                            </div>
                        </div>
                    </div>
     </div>
            </div>
            <div class="widget-footer">
               
            </div>
          </div>
</div>
</div>
<div class="space20"></div>
<div class="sfdc-row">
<div class="sfdc-col-lg-12">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="fa fa-list-alt"></i><h5><?php echo __('Cached Content', 'FRocket_admin'); ?>  </h5> <span style="color:red;"><i>(BETA)</i></span>
            </div>
            <div class="widget-body">
              <div class="widget-forms sfdc-clearfix">                  
                  
                  <div class="sfdc-alert sfdc-alert-info">
                                        <strong><?php echo __('Info', 'FRocket_admin'); ?></strong>  <?php echo __('Cached content allow to load directly the files needed for the form. just copy the "scripts" part and past into head tag or footer of your html content. And copy the "HTML content" and paste inside the body tag of your html content.', 'FRocket_admin'); ?> 
                                    </div>
                  <div class="sfdc-alert sfdc-alert-warning">
                                        <strong><?php echo __('Warning', 'FRocket_admin'); ?></strong>  <?php echo __('it will allow to load your form faster but when you make some change on backend, you will have to copy and paste again (refresh) the "scripts" and "HTML content" part. ', 'FRocket_admin'); ?> 
                                    </div>
                     <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('scripts', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();"
                                  style="height:100px;" rows="5"
                                  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo  $cached_scripts; ?></textarea>
                      </div>
                  </div>   
                  <div class="sfdc-form-group">
                    <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('HTML content', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();"
                                  style="height:100px;" rows="5"
                                  placeholder=""  class="sfdc-form-control sfdc-col-md-7"><?php echo  $cached_content; ?></textarea>
                      </div>
                  </div>   
              </div>
            </div>
            <div class="widget-footer">
               
            </div>
          </div>
</div>
</div>
