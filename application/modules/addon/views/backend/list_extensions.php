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
<div id="zgfm-extensions-page">
<div class="sfdclauncher sfdc-block1-container"  >
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="col-lg-12">

 <div class="widget widget-padding span12">
                <div class="widget-header">
                    <i class="fa fa-plug"></i>
                    <h5>
                        <?php echo __('Extensions', 'FRocket_admin'); ?>
                    </h5>
                    
                </div>  
                <div class="widget-body">
                     <ul>
                        <?php foreach ( $query as $key => $value) { ?>
                            <li>
                                    <div data-name="<?php echo $value->add_name; ?>"  class="zgfm-ext-block effect8">
                                    <div class="zgfm-ext-title"><?php echo $value->add_title; ?></div>
                                                <div class="zgfm-ext-info"><?php echo urldecode($value->add_info); ?></div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                        <div class="zgfm-ext-buttons">
                                                    
                                                        <?php
                                                        if ( ZIGAFORM_F_LITE === 0 || strval($value->add_name) === 'woocommerce' || strval($value->add_name) === 'mgtranslate') {
                                                            ?>
                                                            <?php if ( !isset($value->required_wp) || version_compare(PHP_VERSION, $value->required_php, '>=')) { ?>
                                                                    <?php if ( intval($value->flag_status) === 0) { ?>
                                                                    <!-- Indicates a successful or positive action -->
                                                                            <button data-status='1' onclick="javascript:zgfm_back_addon.listaddon_changeStatus(this);" type="button" class="btn btn-success"><?php echo __('Enable', 'FRocket_admin'); ?></button>
                                                                    <?php } else { ?>       
                                                                            <!-- Indicates caution should be taken with this action -->
                                                                            <button data-status='0' onclick="javascript:zgfm_back_addon.listaddon_changeStatus(this);" type="button" class="btn btn-warning"><?php echo __('Disable', 'FRocket_admin'); ?></button>
                                                                        <?php
                                                                    }
                                                            } else {
                                                                ?>
                                                                    <div class="sfdc-alert sfdc-alert-danger" role="alert">
                                                                <?php echo __('This addon is not compatible with your site. try to upgrade your site and fullfil the requirements.', 'FRocket_admin'); ?>
                                                                    </div>
                                                                    <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <button data-blocked-feature="This extension" onclick="javascript:rocketform.showFeatureLocked(this);" type="button" class="btn btn-danger"><?php echo __('locked', 'FRocket_admin'); ?> <i class="fa fa-lock"></i> </button>
                                                            <?php
                                                        }
                                                        ?>
                                                                   
                                                                    
                                                              
                                    </div>
                                        
                                        </div>
                                        <div class="col-md-6 list-options">
                                            <?php if ( ! empty($value->required_php)) { ?>
                                            <ul>
                                                <li><?php echo __('Requirements', 'FRocket_admin'); ?> : </li>
                                                
                                                <li><b><?php echo __('PHP', 'FRocket_admin'); ?></b> : 7.2+ 
                                                <?php
                                                if ( version_compare(PHP_VERSION, $value->required_php, '>=')) {
                                                    ?>
                                                     <i class="fa fa-check-square"></i> 
                                                <?php } else { ?>
                                                    <i class="fa fa-window-close" aria-hidden="true"></i>
                                                <?php } ?>
                                                </li>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>          
                                    
                                </div>

                            </li>   
                        <?php } ?>
                    </ul>
                </div>  
</div>

        </div>
     </div>
</div>          
</div>
