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
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
  <div class="uifm-set-section-input2-stl1">
         <div class="sfdc-row">
             <div class="sfdc-col-md-12">
                  <label ><?php echo __('Theme 1', 'FRocket_admin'); ?></label>
                 <div class="sfdc-form-group">
                    
                        <div class="sfdc-col-md-3">
                            
                        </div>
                        <div class="sfdc-col-sm-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Icon', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                       <div class="sfdc-controls sfdc-form-group">
                                           <div 
                                               id="uifm_fld_inp2_stl1_icmark"
                                                data-field-store="input2-stl1-icon_mark"
                                                class="sfdc-btn sfdc-btn-default" 
                                                data-placement="top"
                                                data-iconset="fontawesome"
                                                
                                               data-search="true" data-search-text="Search..." role="iconpicker"></div>
                                           
                                        </div>
                                    </div>
                            </div>
                             <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Border Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                            <div  data-field-store="input2-stl1-border_color"  class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="uifm_fld_inp2_stl1_brdcolor"
                                                        name="uifm_fld_inp2_stl1_brdcolor"
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Background Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                            <div  data-field-store="input2-stl1-bg_color"  class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="uifm_fld_inp2_stl1_bgcolor"
                                                        name="uifm_fld_inp2_stl1_bgcolor"
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Icon Color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                            <div  data-field-store="input2-stl1-icon_color"  class="sfdc-input-group uifm-custom-color">
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                                <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="uifm_fld_inp2_stl1_iconcolor"
                                                        name="uifm_fld_inp2_stl1_iconcolor"
                                                        class="sfdc-form-control" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-4">
                                   <label ><?php echo __('Icon Size', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                         <input  
                                            id="uifm_fld_inp2_stl1_size"
                                            data-field-store="input2-stl1-size"
                                            class="uifm_fld_inp2_stl1"
                                            type="text" >
                                    </div>
                            </div>
                        </div>  
                 </div>
             </div>
         </div>
    </div>
    

<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
