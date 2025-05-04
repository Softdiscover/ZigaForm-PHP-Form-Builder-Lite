<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<style>
#zgfm-page-help-main {
  max-width: 1000px;
  margin: 0 auto;
  padding: 40px 20px;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
  font-family: "Segoe UI", Roboto, sans-serif;
}

#zgfm-page-help-main h1 {
  text-align: center;
  font-size: 32px;
  font-weight: 600;
  color: #333;
  margin-bottom: 30px;
}

.zgfm-page-help-title {
  background-color: #f1f9ff;
  border-left: 6px solid #17a2b8;
  padding: 20px;
  margin-bottom: 40px;
  font-size: 16px;
  color: #444;
  border-radius: 6px;
  display: flex;
  align-items: flex-start;
}

.zgfm-page-help-title .sfdc-glyphicon {
  font-size: 22px;
  color: #17a2b8;
  margin-right: 12px;
  margin-top: 2px;
}

.zgfm-page-about-panel-wrap .panel {
  border-radius: 6px;
  border: 1px solid #e3e3e3;
  box-shadow: 0 2px 15px rgba(0,0,0,0.03);
  transition: 0.3s;
  margin-bottom: 30px;
}

.zgfm-page-about-panel-wrap .panel:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.zgfm-page-about-panel-wrap .panel-heading {
  background-color: #f7f7f7;
  border-bottom: 1px solid #ddd;
  padding: 20px;
  display: flex;
  align-items: center;
}

.zgfm-page-about-panel-wrap .panel-heading i {
  font-size: 28px;
  color: #17a2b8;
  margin-right: 15px;
}

.zgfm-page-about-panel-wrap .panel-title {
  margin: 0;
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.zgfm-page-about-panel-wrap .panel-body {
  padding: 30px 20px;
}

.zgfm-page-about-panel-wrap h4 {
  font-size: 18px;
  margin-bottom: 15px;
  color: #444;
}

.zgfm-page-about-panel-wrap .btn {
  padding: 12px 24px;
  font-size: 16px;
  font-weight: 500;
  border-radius: 4px;
  transition: 0.2s;
}

.zgfm-page-about-panel-wrap .btn:hover {
  transform: translateY(-2px);
  opacity: 0.9;
}
</style>

<div id="zgfm-page-help-main" class="sfdc-wrap">
  <h1><?php echo __('HELP', 'FRocket_admin'); ?></h1>

  <div class="zgfm-page-help-title">
    <span class="sfdc-glyphicon sfdc-glyphicon-question-sign"></span>
    <?php echo __('Creating forms is a complex process and the logic to make all the magic happen smoothly may not work quickly with every site. With over a lot of softwares and a very complex server eco-system some forms may run into issues. This is why zigaform includes a detailed knowledge base that can help with many common issues. Resources to additional support to fit your needs can be found below. ', 'FRocket_admin'); ?>
  </div>

  <div class="zgfm-page-about-panel-wrap">
    <div class="row">
      <div class="col-md-6">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-cube fa-2x"></i>
            <h3 class="panel-title"><?php echo __('Knowledgebase', 'FRocket_admin'); ?></h3>
          </div>
          <div class="panel-body">
            <form role="form">
              <fieldset>
                <div class="text-center">
                  <h4><?php echo __('Online documentation', 'FRocket_admin'); ?></h4>
                  <p>
                    <a target="_blank"
                      href="https://php-form-builder.zigaform.com/docs"
                      class="btn btn-info btn-lg">
                      <?php echo __('User guide', 'FRocket_admin'); ?>
                    </a>
                  </p>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-lightbulb-o fa-2x"></i>
            <h3 class="panel-title"><?php echo __('Online Support', 'FRocket_admin'); ?></h3>
          </div>
          <div class="panel-body">
            <form role="form">
              <fieldset>
                <div class="text-center">
                  <h4><?php echo __('Get help from professionals', 'FRocket_admin'); ?></h4>
                  <p>
                    <a target="_blank"
                      href="https://php-form-builder.zigaform.com/#contact"
                      class="btn btn-info btn-lg">
                      <?php echo __('Get support', 'FRocket_admin'); ?>
                    </a>
                  </p>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
