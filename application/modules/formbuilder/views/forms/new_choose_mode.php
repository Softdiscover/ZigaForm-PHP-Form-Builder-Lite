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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="sfdclauncher" id="zgfm_form_mode_choose">
  <div class="zgfm_container">
    <div class="option-cards">
      <div class="option-card" data-template="single">
        <img src="<?php echo base_url(); ?>/assets/backend/image/single-form.svg" alt="<?php echo __('Single Form', 'FRocket_admin'); ?>" class="option-svg">

        <p><?php echo __('Create Single Form', 'FRocket_admin'); ?></p>
      </div>
      <div class="option-card" data-template="multi">
        <img src="<?php echo base_url(); ?>/assets/backend/image/multi-step.svg" alt="<?php echo __('Multi-step Form', 'FRocket_admin'); ?>" class="option-svg">
        <p><?php echo __('Create Multi-step Form', 'FRocket_admin'); ?></p>
      </div>
    </div>
    <div class="template-selector single-template clearfix" data-type="single" >
      <p class="text-lg font-semibold"><?php echo __('Single Form Templates', 'FRocket_admin'); ?></p>
      <div class="thumbnails">
        <div class="tiny-card" onclick="zgfm_back_general.template_single_blank()">
          <div class="zgfm-thumbnail">

            <img src="<?php echo base_url(); ?>/assets/backend/image/templates/blankform.svg" alt="Blank">
          </div>
          <div class="title">

            <h3><?php echo __('Blank', 'FRocket_admin'); ?></h3>
          </div>
        </div>
      </div>
      <div class="preview">
        <div class="zgfm-card">
          <div class="card-content">
            <div class="card-image">
              <img src="<?php echo base_url() . "/assets/backend/image/ajax-loader-black.gif"; ?>" alt="Image">
            </div>
            <div class="card-details">
              <h2 class="card-title">Title</h2>
              <p class="card-description">Description</p>
              <button class="card-button" onclick="zgfm_back_general.template_loadTemplate(this)"><?php echo __('Create form with this template', 'FRocket_admin'); ?><i class="fa fa-spinner fa-spin loading-icon" style=""></i></button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="template-selector multi-template clearfix" data-type="multiple" >
      <p class="text-lg font-semibold"><?php echo __('Multi-step Form Templates', 'FRocket_admin'); ?></p>
      <div class="thumbnails">
        <div class="tiny-card" onclick="zgfm_back_general.template_multiple_blank()">
          <div class="zgfm-thumbnail">

            <img src="<?php echo base_url(); ?>/assets/backend/image/templates/blankform.svg" alt="Blank">
          </div>
          <div class="title">

            <h3><?php echo __('Blank', 'FRocket_admin'); ?></h3>
          </div>
        </div>
      </div>
      <div class="preview">
        <div class="zgfm-card">
          <div class="card-content">
            <div class="card-image">
              <img src="<?php echo base_url() . "/assets/backend/image/ajax-loader-black.gif"; ?>" alt="Image">
              <img src="<?php echo base_url() . "/assets/backend/image/ajax-loader-black.gif"; ?>" alt="Image">
            </div>
            <div class="card-details">
              <h2 class="card-title">Title</h2>
              <p class="card-description">Description</p>
              <button class="card-button" onclick="zgfm_back_general.template_loadTemplate(this)"><?php echo __('Create form with this template', 'FRocket_admin'); ?><i class="fa fa-spinner fa-spin loading-icon" style=""></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

<script>
  jQuery(document).ready(function($) {
    zgfm_back_general.template_selector();
  });
</script>