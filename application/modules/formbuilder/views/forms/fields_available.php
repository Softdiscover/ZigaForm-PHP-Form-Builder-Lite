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
 * @link      https://softdiscover.com/zigaform/wordpress-form-builder/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<!-- Nav tabs -->
<ul class="sfdc-nav sfdc-nav-tabs">
  <li class="sfdc-active"><a href="#uiform-fields-tab-1" data-toggle="sfdc-tab"><?php echo __('Main fields', 'FRocket_admin'); ?></a></li>
  <li><a href="#uiform-fields-tab-2" data-toggle="sfdc-tab" class="last-child"><?php echo __('More fields', 'FRocket_admin'); ?></a></li>
  
</ul>
<!-- Tab panes -->
<div class="sfdc-tab-content">
  <div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-fields-tab-1">
      <div class="uiform-tab-content">
          <!-- Standard fields -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Standard Fields', 'FRocket_admin'); ?> </legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    
                                    <a href="javascript:void(0);" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,6);"
                                       data-type="6" class="uiform-draggable-field uiform-button3 uiform-textbox" 
                                       style=""> 
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                         <span class="sfdc-btn1-text">
                                         <?php echo __('Text Box', 'FRocket_admin'); ?> <i class="fa fa-outdent"></i> 
                                         </span> 
                                    </a>
                                    
                                    
                                </li>
                                <li>
                                    <a href="javascript:void(0);" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,7);"
                                       data-type="7" class="uiform-draggable-field uiform-button3 uiform-textarea" 
                                       style=""> 
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Text Area', 'FRocket_admin'); ?> <i class="fa fa-outdent"></i> 
                                        </span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,8);"
                                       data-type="8" class="uiform-draggable-field uiform-button3 uiform-radiobutton" 
                                       style=""> 
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Radio Button', 'FRocket_admin'); ?>  
                                        </span> 
                                    </a>
                                      
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-checkbox" 
                                       data-type="9" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,9);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Check Box', 'FRocket_admin'); ?> <i class=" sfdc-glyphicon sfdc-glyphicon-check"></i>
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-selectlist" 
                                       data-type="10" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,10);"
                                       href="javascript:void(0);">
                                        
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Select List', 'FRocket_admin'); ?> <i class="fa fa-list"></i>
                                        </span>  
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-multipleselect" 
                                       data-type="11" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,11);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Multiselect', 'FRocket_admin'); ?>  
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-submitbtn" 
                                       data-type="20" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,20);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Submit Button', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-spinner" 
                                       data-type="18" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,18);"
                                       href="javascript:void(0);">
                                          <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Spinner', 'FRocket_admin'); ?> <span class="icon-uifm-field-icon-spinner"></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-slider" 
                                       data-type="16" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,16);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Slider', 'FRocket_admin'); ?> <span class="icon-uifm-field-icon-slider"></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-range" 
                                       data-type="17" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,17);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Range', 'FRocket_admin'); ?> <i class="fa fa-sliders"></i>
                                        </span>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Grid System -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Grid System', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-column1" 
                                       data-type="1" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,1);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('1 Col', 'FRocket_admin'); ?> <span class="icon-fields-column1"></span>
                                        </span>
                                    
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-column2" 
                                       data-type="2" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,2);"
                                       href="javascript:void(0);">
                                          <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('2 Cols', 'FRocket_admin'); ?> <span class="icon-fields-column2"></span>
                                        </span> 
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-column3" 
                                       data-type="3" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,3);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('3 Cols', 'FRocket_admin'); ?> <span class="icon-fields-column3"></span>
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-column4" 
                                       data-type="4" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,4);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('4 Cols', 'FRocket_admin'); ?> <span class="icon-fields-column4"></span>
                                        </span>   
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-column6" 
                                       data-type="5" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,5);"
                                       href="javascript:void(0);">
                                          <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('6 Cols', 'FRocket_admin'); ?> <span class="icon-fields-column6"></span>
                                        </span> 
                                          
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Aditional Fields -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Additional Fields', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-ratingstar" 
                                       data-type="22" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,22);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Star rating', 'FRocket_admin'); ?> <i class=" sfdc-glyphicon sfdc-glyphicon-star"></i>
                                        </span>  
                                          
                                    </a>  
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-recaptcha" 
                                       data-type="27" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,27);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('ReCaptcha', 'FRocket_admin'); ?>  
                                        </span> 
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-customhtml" 
                                       data-type="14" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,14);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Custom Html', 'FRocket_admin'); ?>  
                                        </span>  
                                          
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-hiddeninput" 
                                       data-type="21" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,21);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Hidden Input', 'FRocket_admin'); ?>  
                                        </span>  
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-password" 
                                       data-type="15" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,15);"
                                       href="javascript:void(0);">
                                        
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Password', 'FRocket_admin'); ?>  
                                        </span>  
                                        
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-catpcha" 
                                       data-type="19" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,19);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Captcha', 'FRocket_admin'); ?>  <i class="fa fa-refresh"></i>
                                        </span>  
                                          
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-datepicker" 
                                       data-type="24" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,24);"
                                       href="javascript:void(0);">
                                        
                                           <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Date Picker', 'FRocket_admin'); ?>  
                                        </span>  
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-customhtml" 
                                       data-type="28" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,28);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Prepend', 'FRocket_admin'); ?> <span class="icon-uifm-field-icon-prepend"></span>
                                        </span>   
                                        
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Layout Elements -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Layout Elements', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <!--<li>
                                  <a class="uiform-draggable-field uiform-button3" href="javascript:addFieldToForm(1);">
                                    Group
                                </a>  
                                </li>-->
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-divider" 
                                       data-type="32" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,32);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Divider', 'FRocket_admin'); ?> <i class="fa fa-minus"></i>
                                        </span>  
                                        
                                          
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-divider" 
                                       data-type="33" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,33);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H1', 'FRocket_admin'); ?>  
                                        </span>  
                                        
                                        
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Uploads Fields -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Upload Fields', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-fileupload" 
                                       data-type="12" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,12);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('File Upload', 'FRocket_admin'); ?> <i class="fa fa-upload"></i>
                                        </span>   
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-imageupload" 
                                       data-type="13" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,13);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Image Upload', 'FRocket_admin'); ?>  
                                        </span>
                                          
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
           
      </div>
  </div>
  <div class="sfdc-tab-pane " id="uiform-fields-tab-2">
      <div class="uiform-tab-content">
           
          <!-- Picker Fields -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Picker Fields', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-datepicker" 
                                       data-type="24" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,24);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Date ', 'FRocket_admin'); ?> <i class="fa fa-calendar"></i>
                                        </span> 
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-colorpicker" 
                                       data-type="23" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,23);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Color', 'FRocket_admin'); ?> <i class="fa fa-eyedropper"></i>
                                        </span> 
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-timepicker" 
                                       data-type="25" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,25);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Time', 'FRocket_admin'); ?> <i class=" sfdc-glyphicon sfdc-glyphicon-time"></i>
                                        </span>  
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-datetime" 
                                       data-type="26" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,26);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Date and Time', 'FRocket_admin'); ?>  
                                        </span>   
                                          
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                </fieldset>
          </div>
          <!-- Prepend/Append Fields -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Prepend/Append Fields - Text Box', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-customhtml" 
                                       data-type="28" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,28);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Prepend', 'FRocket_admin'); ?> <span class="icon-uifm-field-icon-prepend"></span>
                                        </span>  
                                        
                                        
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-customhtml" 
                                       data-type="29" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,29);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Append', 'FRocket_admin'); ?> <span class="icon-uifm-field-icon-append"></span>
                                        </span> 
                                          
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-customhtml" 
                                       data-type="30" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,30);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Prepend/App', 'FRocket_admin'); ?>  
                                        </span>  
                                        
                                        
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Headings -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Headings', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading1" 
                                       data-type="33" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,33);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H1', 'FRocket_admin'); ?>  
                                        </span>   
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading2" 
                                       data-type="34" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,34);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H2', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading3" 
                                       data-type="35" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,35);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H3', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading3" 
                                       data-type="36" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,36);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H4', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading3" 
                                       data-type="37" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,37);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H5', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-heading3" 
                                       data-type="38" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,38);"
                                       href="javascript:void(0);">
                                       <span class="sfdc-btn1-icon-left"> 
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('Heading H6', 'FRocket_admin'); ?>  
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
           
            <?php if ( ZIGAFORM_F_LITE == 1) { ?>
            <?php } else { ?>
                                               <!-- Wizard elements -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Wizard elements', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    
                                     <a class="uiform-draggable-field uiform-button3 uiform-wizardbtn" 
                                                data-type="39" 
                                                onclick="javascript:rocketform.mainfields_addFieldToForm(this,39);"
                                                href="javascript:void(0);">
                                                    <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Wizard buttons', 'FRocket_admin'); ?>  
                                                   </span>
                                                
                                             </a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>

            <?php } ?>
           
       
          <!-- Others -->
          <div class="uiform-fields-group uiform-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Others', 'FRocket_admin'); ?></legend>
                    <div class="uiform-fieldset-inner">
                        <div class="sfdc-row">
                            <ul class="uiform-list-fields">
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-switch" 
                                       data-type="40" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,40);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Switch', 'FRocket_admin'); ?>  
                                                   </span>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-dcheckbox" 
                                       data-type="41" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,41);"
                                       href="javascript:void(0);">
                                        
                                         <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Dyn Checkbox', 'FRocket_admin'); ?>  
                                                   </span>
                                        
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-dradiobutton" 
                                       data-type="42" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,42);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Dyn RadioBtn', 'FRocket_admin'); ?>  
                                                   </span>
                                        
                                        
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-panelfld" 
                                       data-type="31" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,31);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Panel', 'FRocket_admin'); ?>  
                                                   </span>
                                        
                                        
                                    </a>
                                </li>
                                <li>
                                    <a class="uiform-draggable-field uiform-button3 uiform-panelfld" 
                                       data-type="43" 
                                       onclick="javascript:rocketform.mainfields_addFieldToForm(this,43);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left"> 
                                                       <span class="sfdc-glyphicon sfdc-glyphicon-move"></span> 
                                                   </span>
                                                   <span class="sfdc-btn1-text"> <?php echo __('Date', 'FRocket_admin'); ?>   <span style="color:red;">beta</span>
                                                   </span>
                                        
                                        
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
      </div> 
       
  </div>
</div>
                         
