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
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>
<?php
ob_start();
?>
<div class='uiform-wrap'>
    
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <?php if(!empty($content_top)){?>
                              <div class="sfdc-alert sfdc-alert-success">
                                        <?php echo $content_top;?>
                              </div>
                                <div class="space10"></div>
                              <?php } ?>
        </div>
    </div>
              <div class="sfdc-row">
                <div class="col-lg-12">
                          <div class="widget widget-padding span12">
                              
                            <div class="widget-body">
                              <div class="widget-forms clearfix">
                                  <div class="sfdc-alert sfdc-alert-info">
                                     <?php echo __('Copy and paste the shortcode to your wordpress site','FRocket_admin');?>
                                  </div>
                                  <div class="sfdc-form-group">
                                    <label class=" col-sm-2 control-label"><?php echo __('Shortcode','FRocket_admin');?></label>
                                      <div class="sfdc-col-sm-10">
                                        <div class="uifm-tab-box-vars-2"><textarea  onClick="this.select();"   rows="1"  placeholder=""  class="sfdc-form-control col-md-7">[zigaform id="<?php echo $form_id;?>"]</textarea></div>
                                      </div>
                                  </div>
                                  <div class="space10"></div>
                                  <div class="sfdc-alert sfdc-alert-warning">
                                    <?php echo __('Use the shortcode alternative in case the first shortcode does not work','FRocket_admin');?>
                                  </div>
                                 <div class="sfdc-form-group">
                                    <label class=" col-sm-2 control-label"><?php echo __('Shortcode alternative','FRocket_admin');?></label>
                                      <div class="sfdc-col-sm-10">
                                        <div class="uifm-tab-box-vars-2"><textarea onClick="this.select();"   rows="1"  placeholder=""  class="sfdc-form-control col-md-7">[zigaform id="<?php echo $form_id;?>" lmode="1"]</textarea></div>
                                      </div>
                                  </div>

                              </div>
                            </div>

                          </div>
                </div>
                </div>
          </div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>