<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<style>
.zgfm-page-pro-box {
  background: #ffffff;
  padding: 40px 20px;
  border-radius: 8px;
  max-width: 1000px;
  margin: 0 auto;
  box-shadow: 0 4px 30px rgba(0,0,0,0.05);
  text-align: center;
  font-family: "Segoe UI", Roboto, sans-serif;
}

.zgfm-page-pro-box h2 div {
  font-style: italic;
  color: #666;
  font-size: 24px;
  margin-top: 10px;
}

.zgfm-page-pro-box img {
  max-width: 200px;
  margin-bottom: 20px;
}

#zgfm-page-pro-table-compare {
  margin-top: 30px;
}

.zgfm-table-striped {
  border: 1px solid #ddd;
  border-radius: 6px;
  overflow: hidden;
}

.zgfm-table-striped thead th {
  background-color: #f1f1f1;
  font-weight: 600;
  text-align: center;
  font-size: 16px;
  color: #333;
}

.zgfm-table-striped tbody td {
  text-align: center;
  vertical-align: middle;
  padding: 15px;
  font-size: 15px;
}

.zgfm-table-striped tbody tr:nth-of-type(even) {
  background-color: #f9f9f9;
}

.zgfm-table-striped .tabco1 {
  text-align: left;
  font-weight: 500;
  color: #333;
}

.zgfm-table-striped .tabco2 {
  background-color: #fff;
}

.zgfm-table-striped .tabco3 {
  background-color: #e6f8ec;
}

.rightSign {
  color: #28a745;
  font-size: 18px;
}

.crossSign {
  color: #dc3545;
  font-size: 18px;
}

.zgfm-page-pro-button-box {
  margin-top: 40px;
  text-align: center;
}

.zgfm-page-pro-button-box .btn {
  margin: 10px;
  min-width: 200px;
  font-size: 16px;
  font-weight: 600;
  padding: 14px 24px;
  transition: 0.3s ease;
}

.zgfm-page-pro-button-box .btn-info {
  background-color: #17a2b8;
  border-color: #17a2b8;
}

.zgfm-page-pro-button-box .btn-success {
  background-color: #28a745;
  border-color: #28a745;
}

.zgfm-page-pro-button-box .btn:hover {
  opacity: 0.9;
  transform: translateY(-2px);
}
</style>

<div class="zgfm-page-pro-box sfdc-wrap">
  <img src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-header-logo.png" alt="Zigaform Logo">
  <h2>
    <div>
      <?php echo __('Upgrade from Lite to PRO', 'FRocket_admin'); ?>
    </div>
  </h2>

  <div id="zgfm-page-pro-table-compare">
    <div class="table-responsive">
      <table class="table table-condensed table-hover zgfm-table-striped">
        <thead>
          <tr>
            <th class="tabco1"><?php echo __('Features', 'FRocket_admin'); ?></th>
            <th class="tabco2"><?php echo __('Lite', 'FRocket_admin'); ?></th>
            <th class="tabco3"><?php echo __('PRO', 'FRocket_admin'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $features = [
            ['Drag and drop builder', true, true],
            ['Grid system', true, true],
            ['Skin customizer', true, true],
            ['Graphic chart', true, true],
            ['Form validation', true, true],
            ['Duplicate fields', true, true],
            ['42 form elements', true, true],
            ['Backup', true, true],
            ['Export & Import forms', true, true],
            ['Export Form records', true, true],
            ['Wizard forms', false, true],
            ['Conditional Logic', false, true],
            ['Animated effects', false, true],
            ['Filter and search submitted data', false, true],
            ['Duplication form', false, true],
            ['PDF feature', false, true],
            ['Priority Support', false, true],
            ['Plus Many Other Features...', false, true],
          ];

          foreach ($features as $feature) {
            echo '<tr>';
            echo '<td class="tabco1">' . esc_html__( $feature[0], 'FRocket_admin' ) . '</td>';
            echo '<td class="tabco2"><i class="fa ' . ($feature[1] ? 'fa-check rightSign' : 'fa-times crossSign') . '" aria-hidden="true"></i></td>';
            echo '<td class="tabco3"><i class="fa ' . ($feature[2] ? 'fa-check rightSign' : 'fa-times crossSign') . '" aria-hidden="true"></i></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="zgfm-page-pro-button-box">
    <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/"
       target="_blank"
       class="btn btn-info btn-lg">
      <i class="fa fa-cloud-download"></i>
      <span><?php echo __('DOWNLOAD', 'FRocket_admin'); ?></span>
    </a>
    <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/"
       target="_blank"
       class="btn btn-success btn-lg">
      <i class="fa fa-eye" aria-hidden="true"></i>
      <span><?php echo __('GET STARTED', 'FRocket_admin'); ?></span>
    </a>
  </div>
</div>
