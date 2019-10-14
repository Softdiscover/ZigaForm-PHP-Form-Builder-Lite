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

<select id="zgfm_fld_addn_anim_select"
        data-addn-field="type"
        class="selectpicker">
<?php foreach ($options as $key => $value) { 
    
        if(!empty($value['label'])){
            ?>
            <optgroup label="<?php echo $value['label'];?>">
            <?php
            foreach ($value['values'] as $key2 => $value2) {
                ?>
                  <option value="<?php echo $value2['value'];?>"><?php echo $key2;?></option>    
              <?php
                }
            ?>
             </optgroup>
            <?php
            
        }else{
            foreach ($value['values'] as $key2 => $value2) {
                ?>
                  <option value="<?php echo $value2;?>"><?php echo $key2;?></option>    
              <?php
            }
           
        }
    
    
} ?>
</select>

<?php
$cntACmp = ob_get_contents();

$cntACmp = preg_replace("/\s+/"," ", $cntACmp);
ob_end_clean();
echo $cntACmp;
?>