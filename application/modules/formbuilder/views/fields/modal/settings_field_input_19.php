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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<div id="uifm-fld-inp-date2-box">
    
    <fieldset>
                    <legend><?php echo __('Margin', 'FRocket_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable time', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable time', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                       <input class="switch-field"
                                            data-field-store="input_date2-enabletime"
                                            id="uifm_fld_inp19_enabletime"
                                            type="checkbox"/>
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('No calendar', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('No calendar', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                       <input class="switch-field"
                                            data-field-store="input_date2-nocalendar"
                                            id="uifm_fld_inp19_nocalendar"
                                            type="checkbox"/>
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('time 24 hour', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('No calendar', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                       <input class="switch-field"
                                            data-field-store="input_date2-time_24hr"
                                            id="uifm_fld_inp19_time24hr"
                                            type="checkbox"/>
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Alternative input', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Alternative input', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                       <input class="switch-field"
                                            data-field-store="input_date2-altinput"
                                            id="uifm_fld_inp19_altinput"
                                            type="checkbox"/>
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Alternative input format', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Alternative format input', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        
                                       <input type="text" 
                                              class="sfdc-form-control uifm-f-setoption" 
                                              name="uifm_fld_inp19_altformat" 
                                              id="uifm_fld_inp19_altformat" data-field-store="input_date2-altformat"> 
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Inline display', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Inline display', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                       <input class="switch-field"
                                            data-field-store="input_date2-isinline"
                                            id="uifm_fld_inp19_isinline"
                                            type="checkbox"/>
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Date format', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Date format', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        
                                       <input type="text" 
                                              class="sfdc-form-control uifm-f-setoption" 
                                              name="uifm_fld_inp19_dateformat" 
                                              id="uifm_fld_inp19_dateformat" 
                                              data-field-store="input_date2-dateformat"> 
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Language', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Language', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <select id="uifm_fld_inp19_language" 
                                                style="width:73px;"
                                                onchange=""
                                                data-field-store="input_date2-language"
                                                class="sfdc-form-control uifm-f-setoption">
                                            <option value="en"><?php echo __('English', 'FRocket_admin'); ?></option>
                                            <option value="es"><?php echo __('Spanish', 'FRocket_admin'); ?></option>
                                            <option value="fr"><?php echo __('French', 'FRocket_admin'); ?></option>
                                            <option value="ir"><?php echo __('Italian', 'FRocket_admin'); ?></option>
                                            <option value="ja"><?php echo __('Japanese', 'FRocket_admin'); ?></option>
                                            <option value="pt"><?php echo __('Portuguese', 'FRocket_admin'); ?></option>
                                            <option value="ru"><?php echo __('Russian', 'FRocket_admin'); ?></option>
                                            <option value="zh"><?php echo __('Chinese', 'FRocket_admin'); ?></option>
                                            <option value="de"><?php echo __('German', 'FRocket_admin'); ?></option>
                                        </select>
                                        
                                       
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Minimum date', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Minimum date', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        
                                       <input type="text" 
                                              class="sfdc-form-control uifm-f-setoption" 
                                              name="uifm_fld_inp19_mindate" 
                                              id="uifm_fld_inp19_mindate" 
                                              data-field-store="input_date2-mindate"> 
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Maximum date', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Maximum date', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        
                                       <input type="text" 
                                              class="sfdc-form-control uifm-f-setoption" 
                                              name="uifm_fld_inp19_maxdate" 
                                              id="uifm_fld_inp19_maxdate" 
                                              data-field-store="input_date2-maxdate"> 
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Default date', 'FRocket_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Default date', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        
                                       <input type="text" 
                                              class="sfdc-form-control uifm-f-setoption" 
                                              name="uifm_fld_inp19_defaultdate" 
                                              id="uifm_fld_inp19_defaultdate" 
                                              data-field-store="input_date2-defaultdate"> 
                                        </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                    </div>
    </fieldset>                
    
</div> 
