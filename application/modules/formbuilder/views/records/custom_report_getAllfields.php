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
<div class="uifm-customreport" style="">
    <div class="">
        
          
            <table class="sfdc-col-md-12 sfdc-table-bordered sfdc-table-striped sfdc-table-condensed sfdc-cf">
                <thead class="sfdc-cf">
                    <tr>
                        <th><?php echo __('Enable', 'FRocket_admin'); ?></th>
                                        <th><?php echo __('Field name', 'FRocket_admin'); ?></th>
                        <th><?php echo __('Order', 'FRocket_admin'); ?></th>
                          
                    </tr>
                </thead>
                <tbody>
                             <?php
                                foreach ( $list_fields as $value) {
                                    ?>
                            
                    <tr>
                        <td  > <input  
                                                name="field_<?php echo $value->fmf_uniqueid; ?>" 
                                                value="<?php echo $value->fmf_uniqueid; ?>"
                                                type="checkbox"
                                                <?php if ( isset($value->fmf_status_qu) && intval($value->fmf_status_qu) === 1) { ?>
                                                checked
                                                <?php } ?>
                                                >
                                        </td>
                                        <td  ><?php echo $value->fieldname; ?></td>
                                        <td >
                                            
                                             <input name="<?php echo $value->fmf_uniqueid; ?>" 

                                                class="uifm-cusreport-order-rec"
                                                value="<?php echo intval($value->order_rec); ?>"/>
                                        </td>
                          
                    </tr>
                                    <?php
                                }
                                ?>
                </tbody>
            </table>
        </div>
  </div>    
      
 



<script type="text/javascript">
//<![CDATA[
$uifm(document).ready(function ($) {
 
       $(".uifm-cusreport-order-rec").TouchSpin({
        verticalbuttons: true,
       min: 0,
        max: 1000,
        stepinterval: 1,
        verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
        verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus'
    });
});
//]]>
</script>
