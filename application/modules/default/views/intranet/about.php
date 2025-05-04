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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<style>
#zgfm-page-about-main {
  max-width: 1000px;
  margin: 0 auto;
  padding: 40px 20px;
  background-color: #fff;
  border-radius: 8px;
  font-family: "Segoe UI", Roboto, sans-serif;
  box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
}

#zgfm-page-about-main > div:first-child img {
  display: block;
  margin: 0 auto 20px auto;
  max-width: 200px;
}

#zgfm-page-about-main h1 {
  text-align: center;
  font-size: 32px;
  font-weight: 600;
  color: #333;
  margin-bottom: 30px;
}

.zgfm-page-about-title {
  font-size: 16px;
  text-align: center;
  margin-bottom: 40px;
  padding: 20px;
  background-color: #f1f9ff;
  border-left: 6px solid #17a2b8;
  border-radius: 6px;
  color: #444;
}

.zgfm-page-about-panel-wrap .panel {
  border-radius: 6px;
  border: 1px solid #e3e3e3;
  box-shadow: 0 2px 15px rgba(0,0,0,0.03);
  margin-bottom: 30px;
  transition: all 0.2s ease;
}

.zgfm-page-about-panel-wrap .panel:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
}

.zgfm-page-about-panel-wrap .panel-heading {
  background-color: #f7f7f7;
  padding: 20px;
  border-bottom: 1px solid #ddd;
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.zgfm-page-about-panel-wrap .panel-body {
  padding: 25px;
}

#zgfm-page-about-rate-icon {
  max-width: 160px;
  display: block;
  margin: 10px auto;
}

#zgfm-page-about-leavestars {
  text-align: center;
  margin-top: 10px;
  font-weight: 600;
  font-size: 16px;
}

.zgfm-page-about-helpnote {
  font-size: 14px;
  margin-top: 15px;
  color: #666;
  text-align: center;
}

#zgfm-page-about-shbuttons span {
  margin: 5px;
  display: inline-block;
}

@media (max-width: 768px) {
  .zgfm-page-about-panel-wrap .col-md-6 {
    margin-bottom: 20px;
  }
}
</style>

<script>var switchTo5x = true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<script>stLight.options({publisher: "595f29e833add90011bd1dc7"});</script>

<div id="zgfm-page-about-main">
  <div>
    <img src="<?php echo base_url(); ?>assets/backend/image/about/zigaform-header-logo.png"> 
  </div>

  <h1><?php echo __('ABOUT', 'FRocket_admin'); ?></h1>

  <div class="zgfm-page-about-title">
    <?php echo __('Zigaform is a drag and drop form builder with live preview which makes you to build your forms on few easy steps. Also it provides an advanced grid system and skin live customizer that makes you to build amazing forms.', 'FRocket_admin'); ?>
  </div>

  <div class="zgfm-page-about-panel-wrap">
    <div class="row">
      <div class="col-md-6">
        <div class="login-panel panel panel-default">
          <div class="panel-heading"><?php echo __('Rate Zigaform', 'FRocket_admin'); ?></div>
          <div class="panel-body">
            <form role="form">
              <fieldset>
                <?php if (ZIGAFORM_F_LITE == 1) { ?>
                  <div class="form-group">
                    <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/?utm_source=installed&utm_medium=referral" target="_blank">
                      <img id="zgfm-page-about-rate-icon" src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-rate-icon.png">
                    </a>
                    <div id="zgfm-page-about-leavestars">
                      <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/?utm_source=installed&utm_medium=referral" target="_blank"><?php echo __('Leave 5 Stars', 'FRocket_admin'); ?></a>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="form-group">
                    <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/?utm_source=installed&utm_medium=referral" target="_blank">
                      <img id="zgfm-page-about-rate-icon" src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-rate-icon.png">
                    </a>
                    <div id="zgfm-page-about-leavestars">
                      <a href="https://shop.softdiscover.com/downloads/zigaform-php-form-builder-contact-survey/?utm_source=installed&utm_medium=referral" target="_blank"><?php echo __('Leave 5 Stars', 'FRocket_admin'); ?></a>
                    </div>
                  </div>
                <?php } ?>
                <div class="zgfm-page-about-helpnote">
                  <?php echo __('Please leave 5 stars if you like the software and I’ll keep rolling new updates and cool features.', 'FRocket_admin'); ?>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="login-panel panel panel-default">
          <div class="panel-heading"><?php echo __('Spread the Word', 'FRocket_admin'); ?></div>
          <div class="panel-body">
            <form role="form">
              <fieldset>
                <div class="form-group">
                  <?php
                  $title = __('Create amazing forms with Zigaform', 'FRocket_admin');
                  $summary = __('Ultimate PHP Form Builder by zigaform.com', 'FRocket_admin');
                  $share_this_data = "st_url='https://php-form-builder.zigaform.com/' st_title='{$title}' st_summary='{$summary}'";
                  ?>
                  <div id="zgfm-page-about-shbuttons" align="center">
                    <span class='st_facebook_vcount' displayText='Facebook' <?php echo $share_this_data; ?> ></span>
                    <span class='st_twitter_vcount' displayText='Tweet' <?php echo $share_this_data; ?> ></span>
                    <span class='st_googleplus_vcount' displayText='Google +' <?php echo $share_this_data; ?> ></span>
                    <span class='st_linkedin_vcount' displayText='LinkedIn' <?php echo $share_this_data; ?> ></span>
                    <span class='st_email_vcount' displayText='Email' <?php echo $share_this_data; ?> ></span>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>