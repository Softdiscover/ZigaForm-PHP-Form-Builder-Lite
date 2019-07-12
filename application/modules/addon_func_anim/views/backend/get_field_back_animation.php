<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://zigapage.softdiscover.com
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

  <fieldset >
                    <legend><?php echo __('Animation','FRocket_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        <label for=""><?php echo __('Choose animation','FRocket_admin'); ?></label> 
                                        
                                    </div>
                                    <div class="sfdc-col-md-8">
                                        
                                        <?php echo $select_types;?>
                                        
                                      
                                        
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        
                                        <button type="button"
                                                id="zgfm-back-addon-anim-opt-animate"
                                                class="sfdc-btn sfdc-btn-info"><?php echo __('Show animation','FRocket_admin'); ?></button>
                                    </div>
                                    <div class="sfdc-col-md-8">
                                        <div id="zgfm-back-addon-anim-opt-preview">
                                            <div id="zgfm_addon_anim_sample_obj"></div>
                                        </div>
                                            
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                    <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        <label for=""><?php echo __('Animation delay','FRocket_admin'); ?></label> 
                                        
                                    </div>
                                    <div class="sfdc-col-md-8">
                                        <input  
                                                id="zgfm-back-addon-anim-opt-delay"
                                                class="zgpb_back_anim_spinner" 
                                                data-addn-field="delay"
                                                type="text" >
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                       <div class="space5"></div>
                       
                       
                    </div>
         </fieldset>



<script type="text/javascript">
$uifm(function($) 
	{
            /*console.log('oppa gangnam style');*/
     
	});
</script>
<?php
$cntACmp = ob_get_contents();

$cntACmp = preg_replace("/\s+/"," ", $cntACmp);
ob_end_clean();
echo $cntACmp;
?>