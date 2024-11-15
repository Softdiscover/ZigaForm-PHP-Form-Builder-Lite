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
ob_start();
?>
 <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="uifm-inforecord-box-info">
                <ul>
                    
                <?php
                foreach ($record_info as $value) {
                    ?>
                    <?php if (is_array($value['value'])) { ?>   
                 <li><b><?php echo $value['field']; ?></b> 
                     <ul>
                         <?php
                         
                            if(isset($value['value']['qty']) || isset($value['value']['label'])){
                                ?>
                                <li>
                                       <?php
        
                                       if (isset($value['value']['qty']) && floatval($value['value']['qty']) > 0) {
                                           echo  $value['value']['qty'] . ' ' . __('Units', 'FRocket_admin');
                                       }elseif (isset($value['value']['label']) ) {
                                            echo  $value['value']['label'];
                                       }
       
                                       
                                       ?>
                                   
                                </li>
                               
                               
                               <?php
                            }else{
                                foreach ($value['value'] as $key2 => $value2) {
                                    ?>
                             <li>
                                    <?php
    
                                    echo $value2['label']??'';
                                    if (isset($value2['qty']) && floatval($value2['qty']) > 0) {
                                        echo ' - ' . $value2['qty'] . ' ' . __('Units', 'FRocket_admin') ;
                                    }
     
                                    ?>
                                
                             </li>
                            
                            
                            <?php
                            }
                            
                            } ?>
                     </ul>
                 </li>
                    <?php } else { ?>
                        <li>
                            <b><?php echo $value['field']; ?></b> :
                            <?php 
                                if (strpos($value['value'], "^,^") !== false) {
                                    // Explode the string by "^,^" delimiter
                                    $options = explode("^,^", $value['value']);
                                    echo "<ul class='records-option-list'>";
                                    foreach ($options as $option) {
                                        echo "<li><i class='fa fa-check-circle'></i> " . htmlspecialchars($option) . "</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    // If no "^,^", output the value directly
                                    echo htmlspecialchars($value['value']);
                                }
                            ?>
                        </li>
                    <?php } ?>
                      <?php
                }
                ?>
                
                </ul> 
                  
            </div>
        </div>
        
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
