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
                                   <label ><?php echo __('Quick color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                        <div class="sfdc-form-group">
                                           <button type="button" onclick="javascript:rocketform.input2settings_stl1_quickcolor(1);" class="sfdc-btn sfdc-btn-default sfdc-btn-sm">1</button>
                                            <button type="button"  onclick="javascript:rocketform.input2settings_stl1_quickcolor(2);" class="sfdc-btn sfdc-btn-primary sfdc-btn-sm">2</button>
                                            <button type="button" onclick="javascript:rocketform.input2settings_stl1_quickcolor(3);"  class="sfdc-btn sfdc-btn-success sfdc-btn-sm">3</button>
                                            <button type="button" onclick="javascript:rocketform.input2settings_stl1_quickcolor(4);"  class="sfdc-btn sfdc-btn-info sfdc-btn-sm">4</button>
                                            <button type="button" onclick="javascript:rocketform.input2settings_stl1_quickcolor(5);"  class="sfdc-btn sfdc-btn-warning sfdc-btn-sm">5</button>
                                            <button type="button" onclick="javascript:rocketform.input2settings_stl1_quickcolor(6);"  class="sfdc-btn sfdc-btn-danger sfdc-btn-sm">6</button>
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
                            <fieldset>
                                <legend><?php echo __('Background Color', 'FRocket_admin'); ?> </legend>
                                 <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('Start Color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                                <div  data-field-store="input2-stl1-bg1_color1"  class="sfdc-input-group uifm-custom-color">
                                                    <span class="sfdc-input-group-addon"><i></i></span>
                                                    <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                            type="text"
                                                            value=""
                                                            id="uifm_fld_inp2_stl1_bg1_color1"
                                                            name="uifm_fld_inp2_stl1_bg1_color1"
                                                            class="sfdc-form-control" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                 <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('End Color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                                <div  data-field-store="input2-stl1-bg1_color2"  class="sfdc-input-group uifm-custom-color">
                                                    <span class="sfdc-input-group-addon"><i></i></span>
                                                    <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                            type="text"
                                                            value=""
                                                            id="uifm_fld_inp2_stl1_bg1_color2"
                                                            name="uifm_fld_inp2_stl1_bg1_color2"
                                                            class="sfdc-form-control" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                           <fieldset>
                                <legend><?php echo __('Background color on hover', 'FRocket_admin'); ?> </legend>
                                 <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('Start Color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                                <div  data-field-store="input2-stl1-bg2_color1_h"  class="sfdc-input-group uifm-custom-color">
                                                    <span class="sfdc-input-group-addon"><i></i></span>
                                                    <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                            type="text"
                                                            value=""
                                                            id="uifm_fld_inp2_bg2_color1_h"
                                                            name="uifm_fld_inp2_bg2_color1_h"
                                                            class="sfdc-form-control" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                 <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('End Color', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                                <div  data-field-store="input2-stl1-bg2_color2_h"  class="sfdc-input-group uifm-custom-color">
                                                    <span class="sfdc-input-group-addon"><i></i></span>
                                                    <input  placeholder="<?php echo __('Pick the color', 'FRocket_admin'); ?>"
                                                            type="text"
                                                            value=""
                                                            id="uifm_fld_inp2_stl1_bg2_color2_h"
                                                            name="uifm_fld_inp2_stl1_bg2_color2_h"
                                                            class="sfdc-form-control" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
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
                                   <label ><?php echo __('Enable search option', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-8">
                                         <input class="switch-field"
                                          data-field-store="input2-stl1-search_st"
                                          id="uifm_fld_inp2_stl1_search_st"
                                          name="uifm_fld_inp2_stl1_search_st"
                                          type="checkbox"/>
                                    </div>
                            </div>
                            
                            <fieldset>
                                <legend><?php echo __('Custom Translations', 'FRocket_admin'); ?> </legend>
                                 <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('None selected text', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                               <input type="text" class="sfdc-form-control uifm-f-setoption"
                                                      placeholder="" 
                                                      name="uifm_fld_inp2_stl1_txtnoselected"
                                                      id="uifm_fld_inp2_stl1_txtnoselected" 
                                                      data-field-store="input2-stl1-txt_noselected">
                                            </div>
                                        </div>
                                </div>
                               <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('none result text', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                               <input type="text" class="sfdc-form-control uifm-f-setoption"
                                                      placeholder="" 
                                                      name="uifm_fld_inp2_stl1_txtnoresult"
                                                      id="uifm_fld_inp2_stl1_txtnoresult" 
                                                      data-field-store="input2-stl1-txt_noresult">
                                            </div>
                                        </div>
                                </div>
                                <div class="sfdc-row">
                                    <div class="sfdc-col-md-4">
                                       <label ><?php echo __('Count selected text', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-sm-8">
                                            <div class="sfdc-form-group">
                                               <input type="text" class="sfdc-form-control uifm-f-setoption"
                                                      placeholder="" 
                                                      name="uifm_fld_inp2_stl1_txtcountsel"
                                                      id="uifm_fld_inp2_stl1_txtcountsel" 
                                                      data-field-store="input2-stl1-txt_countsel">
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
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
