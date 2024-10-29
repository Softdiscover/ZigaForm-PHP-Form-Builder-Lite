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
?>
<div class="">
  <div class="uiform-editing-dashboard">


    <div class="uiformc-menu-wrap">
      <ul class="sfdc-nav sfdc-nav-tabs">
        <?php if ($is_multistep === 'yes') { ?>
          <li class="sfdc-active">
            <a data-toggle="sfdc-tab" class="zgfm_firstPanel zgfm_tabAnchor" data-color="#01bcd6" href="#uiformc-menu-secmm"><?php echo __('Multi-step Manager', 'FRocket_admin'); ?></a>
          </li>
        <?php } ?>

        <li class="<?php if ($is_multistep !== 'yes') {
            ?>sfdc-active<?php
                   } ?>">
          <a data-toggle="sfdc-tab" class="zgfmyourselectedform" data-color="#333333" href="#uiformc-menu-sec1">
            <?php if ($is_multistep === 'yes') { ?>
                <?php echo __('Selected Form', 'FRocket_admin'); ?>
            <?php } else { ?>
                <?php echo __('Form editor', 'FRocket_admin'); ?>
            <?php } ?>
          </a>
        </li>

        <li><a data-toggle="sfdc-tab" class="uiform-settings-email zgfm_secondPanel zgfm_tabAnchor" data-color="#9d21b2" data-intro="<?php echo __('email section. you can set mail options. e.g. the recipient mail', 'FRocket_admin'); ?>" href="#uiformc-menu-sec2"><?php echo __('Email Settings', 'FRocket_admin'); ?></a></li>
        <li><a data-toggle="sfdc-tab" class="uiform-settings-subm zgfm_thirdPanel zgfm_tabAnchor" data-color="#ff6a16" data-intro="<?php echo __('submission section. you can modify the success message and other messages', 'FRocket_admin'); ?>" href="#uiformc-menu-sec3"><?php echo __('On Submission', 'FRocket_admin'); ?></a></li>
        <li><a data-toggle="sfdc-tab" class="uiform-settings-main zgfm_fourthPanel zgfm_tabAnchor" data-color="#fca901" data-intro="<?php echo __('main settings', 'FRocket_admin'); ?>" href="#uiformc-menu-sec5"><?php echo __('Global settings', 'FRocket_admin'); ?></a></li>
        <?php if (!empty($modules_tab_extension)) { ?>
          <li><a data-toggle="sfdc-tab" class="uiform-settings-extensions zgfm_fifthPanel zgfm_tabAnchor" data-color="#00748A" data-intro="<?php echo __('Extensions', 'FRocket_admin'); ?>" href="#uiformc-menu-sec7"><?php echo __('Extensions', 'FRocket_admin'); ?></a>
          </li>
        <?php } ?>

      </ul>
    </div>
    <div class="sfdc-tab-content">
      <?php if ($is_multistep === 'yes') { ?>
        <div id="uiformc-menu-secmm" class="sfdc-tab-pane sfdc-active">

          <div class="uiformc-tab-content-inner">
            <div id="zgfm-flow-section-wrapper">
              <div id="zgfmFlowSection">

                <div id="zgfm-flow-options">
                  <div class="row">
                    <div class="col">
                      <div class="btn-group btn-array" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" id="zgfm_m_addnewform" class="btn btn-primary"><?php echo __('Add New Form', 'FRocket_admin'); ?></button>
                        <button type="button" id="zgfm_m_showmodal" class="btn btn-primary"><?php echo __('Settings', 'FRocket_admin'); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if ( UIFORM_DEBUG === 1) {?>
                  <div class="btn-export" class="" id="zgfm_m_opt_export">Export</div>
                <?php }?>
                
                <div class="bar-zoom">
                  <i class="fa fa-search-minus" id="zgfm_m_opt_zoomout"></i>
                  <i class="fa fa-search" id="zgfm_m_opt_zoomreset"></i>
                  <i class="fa fa-search-plus" id="zgfm_m_opt_zoomin"></i>
                </div>
              </div>
              
              
            </div>

          </div>
          <div id="uifm_mm_connection_infobox" class="">
            <button id="uifm_mm_connection_infobox_btn_close" alt="Close" class="close-btn">&times;</button>
            <h2><?php echo __('Connection Settings', 'FRocket_admin'); ?></h2>
            <p><?php echo __('Add conditional logic for connection', 'FRocket_admin'); ?></p>
            <div id="uifm_content">

              <div class="uifm_show_graphic">
                <div class="uifm_container">
                  <div class="uifm_node" id="conn_node1">Node 1</div>
                  <div class="uifm_arrow"><i class="fa fa-arrow-right"></i></div>
                  <div class="uifm_node" id="conn_node2">Node 2</div>
                </div>
              </div>
              <div class="uifm_main_rules clearfix">
                <label class="col-sm-6 col-form-label col-form-label-sm"><?php echo __('Fallback', 'FRocket_admin'); ?>
                <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('It is used when connections do not meet the conditions.', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                </label>
                <div class="col-sm-6">
                <input 
                                        class="switch-field"
                                        id="uifm_mm_connection_infobox_fallback"
                                        type="checkbox"/>
                </div>
              </div>
              
              <div id="uifm_main_rules_dyn">
              
              
              
                <div class="uifm_main_rules">
                  <select  
                  style="width:358px;display: inline;" 
                  onchange="javascript:rocketform.getInnerVariable('multistepobj').clogic_changeTopCondition(this);"
                  class="sfdc-form-control ">
                    <option selected="selected" value="1"><?php echo __('All conditions must be met', 'FRocket_admin'); ?></option>
                    <option value="2"><?php echo __('At least one of the conditions must be satisfied', 'FRocket_admin'); ?></option>
                  </select>
                  <button id="uifm_mm_connection_infobox_newcond" type="button" class="sfdc-btn sfdc-btn-default"><?php echo __('Add new condition', 'FRocket_admin'); ?></button>
                </div>
                <div class="uifm_main_rules2"></div>
                
                <div class="uifm_mm_conn_adopts">
              <button id="uifm_mm_connection_infobox_btn_delete_connection" type="button" class="btn btn-danger"><?php echo __('Delete Connection', 'FRocket_admin'); ?></button>
              <button id="uifm_mm_connection_infobox_btn_delete_conditions" type="button" class="btn btn-warning"><?php echo __('Delete All conditions', 'FRocket_admin'); ?></button>
            </div>
                
              </div>
            </div>
           
            
          </div>
        </div>
      <?php } ?>
      <div id="uiformc-menu-sec1" class="sfdc-tab-pane <?php if ($is_multistep !== 'yes') {
            ?> sfdc-in sfdc-active<?php
                                                       } ?> <?php if ($is_multistep === 'yes') {
    ?>zgfm_mulstistep_mode<?php
                                                       } ?> ">
        <!-- editing form -->
        <?php require 'create_form_main.php'; ?>
        <!--\end editing form -->
      </div>
      <div id="uiformc-menu-sec2" class="sfdc-tab-pane ">
        <div class="uiformc-tab-content-inner">
          <?php require 'settings_form_email.php'; ?>
        </div>
      </div>
      <div id="uiformc-menu-sec3" class="sfdc-tab-pane ">
        <div class="uiformc-tab-content-inner">
          <?php require 'settings_form_submission.php'; ?>
        </div>
      </div>

      <div id="uiformc-menu-sec5" class="sfdc-tab-pane ">
        <div class="uiformc-tab-content-inner2">

          <!-- Nav tabs -->
          <ul class="sfdc-nav sfdc-nav-tabs zgfm-nav-tabs-settings" role="tablist">
            <li class="sfdc-active"><a href="#zgfm-menu-main-tab-1" role="tab" data-toggle="sfdc-tab"><?php echo __('Main', 'FRocket_admin'); ?></a></li>
            <li><a href="#zgfm-menu-main-tab-8" role="tab" data-toggle="sfdc-tab"><?php echo __('Recaptcha v3', 'FRocket_admin'); ?></a></li>
            
            <li><a href="#zgfm-menu-main-tab-4" class="zgfm_gsettings_additional" role="tab" data-toggle="sfdc-tab"><?php echo __('Additional', 'FRocket_admin'); ?></a></li>
            <li><a href="#zgfm-menu-main-tab-5" role="tab" data-toggle="sfdc-tab"><?php echo __('PDF', 'FRocket_admin'); ?></a></li>
            <li><a href="#zgfm-menu-main-tab-6" role="tab" data-toggle="sfdc-tab"><?php echo __('Email', 'FRocket_admin'); ?></a></li>
            <li><a href="#zgfm-menu-main-tab-7" role="tab" data-toggle="sfdc-tab"><?php echo __('Records', 'FRocket_admin'); ?></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="sfdc-tab-content">
            <div class="sfdc-tab-pane sfdc-in sfdc-active" id="zgfm-menu-main-tab-1">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main.php'; ?>
              </div>
            </div>
            <div class="sfdc-tab-pane" id="zgfm-menu-main-tab-8">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main_recaptcha.php'; ?>
              </div>
            </div>
           
            <div class="sfdc-tab-pane" id="zgfm-menu-main-tab-4">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main_add.php'; ?>
              </div>
            </div>
            <div class="sfdc-tab-pane" id="zgfm-menu-main-tab-5">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main_pdf.php'; ?>
              </div>
            </div>
            <div class="sfdc-tab-pane" id="zgfm-menu-main-tab-6">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main_email.php'; ?>
              </div>
            </div>
            <div class="sfdc-tab-pane" id="zgfm-menu-main-tab-7">
              <div class="uiformc-tab-content-inner3">
                <?php require 'settings_form_main_record.php'; ?>
              </div>
            </div>
          </div>


        </div>
      </div>
      <?php if (!empty($modules_tab_extension)) { ?>
        <div id="uiformc-menu-sec7" class="sfdc-tab-pane ">
          <div class="uiformc-tab-content-inner2 sfdc-clearfix">
            <!-- load modules -->
            <?php

            $count = 1;
            ?>
            <div class="sfdc-col-xs-3">
              <ul class="sfdc-nav sfdc-nav-tabs tabs-left">
                <?php
                foreach ($modules_tab_extension as $key => $value) {
                    ?>
                  <li class="<?php echo ($count === 1) ? 'sfdc-active' : ''; ?>">
                    <a data-toggle="sfdc-tab" href="#zgfm-extaddn-tabcont-<?php echo $key; ?>">
                      <?php echo $value['tab_link']['name']; ?>
                    </a>
                  </li>
                    <?php
                    $count++;
                }
                ?>
              </ul>
            </div>

            <div class="sfdc-col-xs-9">
              <div class="sfdc-tab-content">

                <?php
                $count = 1;
                foreach ($modules_tab_extension as $key => $value) {
                    ?>
                  <div id="zgfm-extaddn-tabcont-<?php echo $key; ?>" class="sfdc-tab-pane <?php echo ($count === 1) ? 'sfdc-active' : ''; ?>">
                    <div class="zgfm-extaddn-tab-content-inner3">
                      <?php echo $value['tab_content']; ?>
                    </div>
                  </div>
                    <?php
                    $count++;
                }
                ?>


              </div>

            </div>

            <!--/ load modules -->
          </div>
        </div>
      <?php } ?>
    </div>
    <div id="uiform-editing-mbuttons">
      <?php if (UIFORM_DEBUG === 1) { ?>
        <div class="zgfm-mbuttons-single">
          <div class="sfdc-dropdown">
            <button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo __('Dev Options', 'FRocket_admin'); ?>
              <span class="sfdc-caret"></span>
            </button>
            <ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
              <li><a onclick="javascript:rocketform.testing_summbox();" href="javascript:void(0);"><?php echo __('test', 'FRocket_admin'); ?> </a></li>
              <li><a onclick="javascript:rocketform.printmaindata();" href="javascript:void(0);"><?php echo __('Show data', 'FRocket_admin'); ?> </a></li>
              <?php if ($is_multistep === 'yes') { ?>
                <li><a onclick="javascript:rocketform.printmaindataMultistep();" href="javascript:void(0);"><?php echo __('Multistep - Show data', 'FRocket_admin'); ?> </a></li>
                <li><a onclick="javascript:rocketform.printmaindataMultistepSelectedForm();" href="javascript:void(0);"><?php echo __('Multistep - Show data, selected form', 'FRocket_admin'); ?> </a></li>
                <li><a onclick="javascript:rocketform.printmaindataMultistepSettings();" href="javascript:void(0);"><?php echo __('Multistep - show settings', 'FRocket_admin'); ?> </a></li>
                <li><a onclick="javascript:rocketform.multistepLimpiarForm();" href="javascript:void(0);"><?php echo __('Multistep - Limpiar form', 'FRocket_admin'); ?> </a></li>
                <li><a onclick="javascript:rocketform.multistepRefreshCurrentForm();" href="javascript:void(0);"><?php echo __('Multistep - Refresh Current Form', 'FRocket_admin'); ?> </a></li>
              <?php } ?>
              <li><a onclick="javascript:zgfm_back_fld_options.generate_field_htmldata();" href="javascript:void(0);"><?php echo __('Generate field static data', 'FRocket_admin'); ?> </a></li>
              <li><a onclick="javascript:zgfm_back_fld_options.generate_dbChecker();" href="javascript:void(0);"> Generate DB checker </a></li>
            </ul>
          </div>
        </div>

      <?php } ?>
      <div class="zgfm-mbuttons-single">
        <div class="sfdc-dropdown">
          <button class="sfdc-btn sfdc-btn-primary sfdc-dropdown-toggle" type="button" id="about-us" data-toggle="sfdc-dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo __('Options', 'FRocket_admin'); ?>
            <span class="sfdc-caret"></span>
          </button>
          <ul class="sfdc-dropdown-menu" aria-labelledby="about-us">
            <li><a onclick="javascript:rocketform.rollback_openModal();" href="javascript:void(0);"><i class="fa fa-retweet" aria-hidden="true"></i> <?php echo __('Rollback', 'FRocket_admin'); ?></a></li>
            <li><a onclick="javascript:rocketform.variables_openModal();" href="javascript:void(0);"><i class="fa fa-table" aria-hidden="true"></i> <?php echo __('Variables', 'FRocket_admin'); ?></a></li>
            <?php if (ZIGAFORM_F_LITE === 0) { ?>
              <li><a onclick="javascript:rocketform.clogicgraph_popup();" href="javascript:void(0);"><span class="fa fa-map"></span> <?php echo __('C.Logic Graph', 'FRocket_admin'); ?></a></li>
            <?php } ?>
            <li><a onclick="javascript:rocketform.refreshPreviewSection();" href="javascript:void(0);"><span class="fa fa-refresh"></span> <?php echo __('Refresh & Clean Form', 'FRocket_admin'); ?></a></li>

          </ul>
        </div>
      </div>
      <div class="zgfm-mbuttons-single">
        <a class="sfdc-btn sfdc-btn-primary" onclick="javascript:rocketform.previewform_showForm(1);" href="javascript:void(0);">
          <span class="fa fa-desktop"></span> <?php echo __('preview', 'FRocket_admin'); ?>
        </a>
      </div>
      <div class="zgfm-mbuttons-single">
        <?php if ($is_multistep === 'yes') { ?>
          <a class="sfdc-btn sfdc-btn-success" id="uiform-set-button-save" onclick="javascript:rocketform.saveMultiForm();" href="javascript:void(0);">
            <i class="fa fa-floppy-o"></i> <?php echo __('Save form', 'FRocket_admin'); ?>
          </a>
        <?php } else { ?>
          <a class="sfdc-btn sfdc-btn-success" id="uiform-set-button-save" onclick="javascript:rocketform.saveForm();" href="javascript:void(0);">
            <i class="fa fa-floppy-o"></i> <?php echo __('Save form', 'FRocket_admin'); ?>
          </a>
        <?php } ?>


      </div>



    </div>
  </div>

</div>


<!--templates -->
<?php require 'templates_fields.php'; ?>
<!--\end templates -->
<!-- modals -->
<?php require 'create_form_modals.php'; ?>
<!--\ modals -->
<?php if (intval($fields_fastload) !== 1) { ?>
  <!-- modals -->
    <?php
    for ($i = 1; $i <= 11; $i++) {
        if ($i == 7) {
            continue;
        }
        include APPPATH . '/modules/formbuilder/views/fields/render_back/fieldoptions_data_' . $i . '.php';
    }

    ?>
  <!--\ modals -->
<?php } ?>

<script>
  jQuery(document).ready(function($) {
    $('#uiform-panel-loadingst').hide();


    $('.tabAnchor').on('click', function() { // changes container bg to tab color stored in data attr
      var destBg = $(this).data('color');
      $('.sfdc-tab-content').css('background', destBg);
    });

    $('.shifter').on('click', function(e) { // shifts tabs
      e.preventDefault();
      $('.tabToggle').toggleClass('hidden');
    });


    $('.zgfm_tabAnchor').on('click', function() { // changes container bg to tab color stored in data attr
      var destBg = $(this).data('color');
      $('.uiformc-tab-content-inner').css('border-color', destBg);
      $('.uiformc-tab-content-inner2').css('border-color', destBg);
      $('.uiformc-tab-content-inner2').css('background-color', destBg);
    });


    $('a[href="#uiformc-menu-sec1"]').on('click', function() { // changes container bg to tab color stored in data attr
      setTimeout(() => {
        $('.uiform-editing-main').ColumnToggleRefresh();
      }, 500);
    });



  });
</script>