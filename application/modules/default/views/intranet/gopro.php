<?php
/**
 * settings
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: settings.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
 <div class="zgfm-page-pro-box sfdc-wrap">
    <img src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-header-logo.png"> 
    <h2><div style="font-style:italic; color:gray">
            <?php echo __('Upgrade from Lite to PRO', 'FRocket_admin'); ?>
             </div></h2>
  

<div id="zgfm-page-pro-table-compare">
        <div class="">
       
      <hr class="White-Yellow">
            <div class="row">
        <table class="table table-condensed table-hover zgfm-table-striped">
<thead>
<tr>
<th class="tabco1 "><?php echo __('Features', 'FRocket_admin'); ?></th>
<th class="tabco2" > <?php echo __('Lite', 'FRocket_admin'); ?></th>
<th class="tabco3">  <?php echo __('PRO', 'FRocket_admin'); ?></th>
 
</tr>
</thead>
<tbody>
<tr>
<td class="tabco1" ><?php echo __('Drag and drop builder', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3"><i class="fa fa-check rightSign" aria-hidden="true"></i></td>

</tr>
<tr>
<td class="tabco1" ><?php echo __('Grid system', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>

</tr>

</tr>
<tr>
<td class="tabco1" ><?php echo __('Skin customizer', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>

<tr>
<td class="tabco1" ><?php echo __('Graphic chart', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>

<tr>
<td class="tabco1" ><?php echo __('Form validation', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Duplicate fields', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1"> <?php echo __('42 form elements', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Backup', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Export & Import forms', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Export Form records', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Wizard forms', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Conditional Logic', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Animated effects', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Filter and search submitted data', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></i></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Duplication form', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('PDF feature', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Priority Support', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></td>
</tr>
<tr>
<td class="tabco1" ><?php echo __('Plus Many Other Features...', 'FRocket_admin'); ?></td>
<td class="tabco2" ><i class="fa fa-times crossSign" aria-hidden="true"></i></td>
<td class="tabco3" ><i class="fa fa-check rightSign" aria-hidden="true"></td>
</tr>
</tbody>
</table>
      </div><!--row-->
    </div><!--container-->
</div> 
 
<div class="zgfm-page-pro-button-box">
  <div class="row">
    <div class="sfdc-col-sm-12">
      
      <p>
          <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/"
             target="_blank"
             class="btn btn-info btn-lg"><i class="fa fa-cloud-download"></i> <span><?php echo __('DOWNLOAD', 'FRocket_admin'); ?></span></a>
        <a 
            href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/"
             target="_blank"
            class="btn btn-success btn-lg"><i class="fa fa-eye" aria-hidden="true"></i> <span><?php echo __('GET STARTED', 'FRocket_admin'); ?></span></a>
      </p>
      
       
    </div>
  </div>
</div>

</div>
