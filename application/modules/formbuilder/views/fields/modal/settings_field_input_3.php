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

<div class="uifm-set-section-input3">
   <div class="sfdc-row">
            <div class="sfdc-col-sm-12">
                <div class="sfdc-form-group">
                <label class="sfdc-control-label" for="">
                    <?php echo __('Custom html content','FRocket_admin'); ?>
                </label>
                <div class="sfdc-controls sfdc-form-group">
                    <?php
                    /*pending add this tinymce*/
                    $settings = array( 'media_buttons' => true,'textarea_rows'=>5,'wpautop'=> true);
			//wp_editor('', 'uifm_fld_inp3_html',$settings );
                    
                    ?>
                    <textarea 
                            class="uifm_tinymce_obj"
                            name="uifm_fld_inp3_html"
                            id="uifm_fld_inp3_html"></textarea>
                </div>
                                  
                </div>
            </div>
        </div>
</div>
