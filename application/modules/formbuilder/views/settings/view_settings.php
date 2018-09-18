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
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>
<div id="uiform-container" data-uiform-page="" class="sfdc-wrap uiform-wrap">
        <div class="sfdc-col-md-12">
            <div class="space20"></div>
            <div class="uifm-settings-response"></div>
           
            <div class="uiform-settings-inner-box">
                <div class="sfdc-row">
        <div class="col-lg-12">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('Global Settings','FRocket_admin');?>
                </h5>
               
            </div>  
            <div class="widget-body">
               <div class="widget-forms clearfix">
                   <form 
                       id="uifrm-setting-form"
                       chartset="utf-8"
                       name="frmform"
                       class="sfdc-form-horizontal">
                       <div id="uiform-settings-inner-body">
                        <div class="sfdc-form-group">
                            <label class=" col-sm-2 control-label"><?php echo __('Language','FRocket_admin');?></label>
                            <div class="sfdc-col-sm-10">
                                <div class="span4">
                                    <select class="sfdc-form-control input-sm" name="language"  id="language" data-placeholder="Select here.." >
                                    <?php 
                                    foreach ($lang_list as $frow): 
                                        ?>
                                    <?php $sel = ($frow['val'] == $language) ? " selected=\"selected\"" : "" ?>
                                        <option value="<?php echo $frow['val']; ?>" <?php echo $sel; ?>>
                                            <?php echo $frow['label']; ?>
                                        </option>
                                        <?php 
                                    endforeach; 
                                        ?>
                                    <?php unset($frow); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                           
                           
                        </div>
                   </form>
               </div>
                
                <div class="clear"></div>
            </div>
            <div class="widget-footer">
                <?php if(UIFORM_DEMO===1){?> 
                  <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                            href="javascript:void(0);"
                            onclick="alert('this feature disabled on this demo');"
                            >
                            <i class="fa fa-floppy-o"></i>
                        <?php echo __('Save changes','FRocket_admin')?>
                        </a>
                <?php }else{?> 
                
                  <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                            href="javascript:void(0);"
                            onclick="rocketform.globalsettings_saveOptions();"
                            >
                            <i class="fa fa-floppy-o"></i>
                        <?php echo __('Save changes','FRocket_admin')?>
                        </a>
                <?php }?> 
        </div>
        </div> 
    </div>
    </div>
            </div>
        </div>
    
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function () {
    
});
//]]>
</script>