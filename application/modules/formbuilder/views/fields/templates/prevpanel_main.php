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

<!--\ Fields templates -->
<div id="uiform-fields-templates" style="display:none;">
<!--\ TWO -->
<?php echo $uiform_grid_two; ?>
<!--\ textbox -->
 <?php echo $uiform_textbox; ?> 
   <!-- Modal -->
<div class="sfdc-modal sfdc-fade" id="modaltemplate" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="sfdc-modal-dialog">
      <div class="sfdc-modal-content">
         <div class="sfdc-modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="sfdc-modal-title" id="myModalLabel">
              <span class="fa fa-question-circle"></span>
            </h4>
         </div>
         <div class="sfdc-modal-body">
            
         </div>
         <div class="sfdc-modal-footer">
            <button type="button" class="sfdc-btn sfdc-btn-default" 
               data-dismiss="modal"><?php echo __('Close', 'FRocket_admin'); ?>
            </button>
            
         </div>
      </div><!-- /.sfdc-modal-content -->
</div>
</div><!-- /.modal --> 

</div><!--\ Fields templates -->
   
   
