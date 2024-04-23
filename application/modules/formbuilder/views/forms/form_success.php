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
<div id="form_success_container">
        <div class="space20"></div>
        
          <div class="sfdc-alert sfdc-alert-success">
 <p><?php echo __('Success! The form was created. Go to url to see your changes or copy & paste widget code to your page', 'FRocket_admin'); ?></p>
          
</div>  
         <div class="sfdc-alert sfdc-alert-warning">
  <a target="_blank" href="<?php echo site_url() . '?form=' . $id_form; ?>"><?php echo site_url() . '?form=' . $id_form; ?></a>
</div>      
            
<div class="row">
<div class="col-lg-12">
        <div id="form_succes_wd_cont">
             <div class="widget widget-padding span12">
              
            <div class="widget-body">
              <div class="widget-forms sfdc-clearfix">
                  
                  <div class="sfdc-form-group">
                    <label class=" col-sm-2 control-label"><?php echo __('Widget code', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea  onClick="this.select();"  style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control col-md-7"><?php echo  $script; ?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" col-sm-2 control-label"><?php echo __('iframe', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();"   style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control col-md-7"><?php echo  $iframe; ?></textarea>
                      </div>
                  </div>
                  <div class="space10"></div>
                 <div class="sfdc-form-group">
                    <label class=" col-sm-2 control-label"><?php echo __('Url', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-sm-10">
                        <textarea onClick="this.select();" style="height:100px;" rows="5"  placeholder=""  class="sfdc-form-control col-md-7"><?php echo  $url; ?></textarea>
                      </div>
                  </div>   
              </div>
            </div>
              
          </div>
        </div>
          
</div>
    
</div>
        
    </div>
