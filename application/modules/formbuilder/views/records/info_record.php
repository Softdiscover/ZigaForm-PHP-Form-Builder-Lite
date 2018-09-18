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
<div id="uiform-container" class="uiform-wrap uiform-page_records">
    <input type="hidden" id="rec_id" value="<?php echo $record_id;?>">
    
    <div id="uiform-inforecord-container">
         <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-6">
            <div class="uifm-inforecord-box-info clearfix">
                 <h1><?php echo $form_name;?></h1>
                <h4 class="zgfm-no-margin zgfm-margin-bottom-20"><?php echo __('Submitted form data','FRocket_admin');?></h4>
               
                <ul>
              <?php foreach ($record_info as $value) {
               ?>
                 <?php if(is_array($value['value'])){?>   
                 <li><b><?php echo $value['field'];?></b> 
                     <ul>
                         <?php foreach ($value['value'] as $key2 => $value2) {
                                  ?>
                         <li><?php 
                         
                         echo $value2['label'];
                            if(isset($value2['qty']) && floatval($value2['qty'])>0){
                             echo ' - '.$value2['qty'].' '.__('Units','FRocket_admin').' - ';   
                            }
                         
                            if(isset($value2['qty'])&& floatval($value2['qty'])>0 && !empty($value2['label'])  ){
                                
                            } elseif( !empty($value2['label'])  ){
                            echo ' : ';   
                            }else{
                             
                            }
                         ?>
                           
                         </li>
                         
                            <?php }?>
                     </ul>
                 </li>
                 <?php }else{ ?>
                 <li><b><?php echo $value['field'];?></b> : <?php echo $value['value'];?></li>
                 <?php }?>
              <?php  
                }?>
                 
                </ul>    
            </div>
        </div>
        <div class="sfdc-col-md-6">
            <div class="uifm-inforecord-box-info2">
                <h3><?php echo __('Additional info','FRocket_admin');?></h3>
                <ul >
                    <li>
                        <b><?php echo __('Date','FRocket_admin');?></b>:
                        <span><?php echo $info_date;?></span>
                    </li>
                    <li>
                        <b><?php echo __('IP','FRocket_admin');?></b>:
                        <span><?php echo $info_ip;?></span>
                    </li>
                    <li>
                        <b><?php echo __('Client PC info','FRocket_admin');?></b>:
                        <span ><?php echo $info_useragent;?></span>
                    </li>
                    <li>
                        <b><?php echo __('URL page','FRocket_admin');?></b>:
                        <span><?php echo $info_referer;?></span>
                    </li>
                    <li>
                        <b><?php echo __('Form name','FRocket_admin');?></b>:
                        <span><?php echo $form_name;?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="space10"></div>
   <div class="sfdc-row">
       <div class="sfdc-col-md-12">
         <?php if(ZIGAFORM_F_LITE == 1){ ?>
       <a 
    onclick="javascript:rocketform.showFeatureLocked(this);"
                  data-blocked-feature="PDF export"
                   href="javascript:void(0);"
    class="sfdc-btn sfdc-btn-warning"><i class="fa fa-file-pdf-o"></i> <?php echo __('Export to PDF','FRocket_admin');?> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span></a>
        <?php }else{ ?>
           
            <a 
    href="javascript:void(0);"
    onclick="javascript:rocketform.genpdf_inforecord(<?php echo $record_id;?>);"
    class="sfdc-btn sfdc-btn-warning"><i class="fa fa-file-pdf-o"></i> <?php echo __('Export to PDF','FRocket_admin');?></a>
        <?php } ?>   
           

       </div>
   </div>
</div>