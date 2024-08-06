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
ob_start();
?>

<div id="zgfm-multistep-page">



  <div class="container-fluid">
    
    <div id="zgfm_tab_flat_style">

      <ul class="sfdc-nav sfdc-nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="tabToggle sfdc-active"><a href="#firstPanel" class="tabAnchor firstPanel text-center" data-color="#01bcd6" aria-controls="firstPanel" role="tab" data-toggle="sfdc-tab"><?php echo __('Multi-step Manager', 'FRocket_admin'); ?></a></li>
        <li class="shifter shifterBack tabToggle hidden"><a class="text-center"><i class="fa fa-angle-double-left"></i></a></li>
        <li role="presentation"><a href="#secondPanel" class="tabAnchor secondPanel text-center" data-color="#9d21b2" aria-controls="secondPanel" role="tab" data-toggle="sfdc-tab"><?php echo __('Email settings', 'FRocket_admin'); ?></a></li>
        <li role="presentation"><a href="#thirdPanel" class="tabAnchor thirdPanel text-center" data-color="#ff6a16" aria-controls="thirdPanel" role="tab" data-toggle="sfdc-tab"><?php echo __('On Submission', 'FRocket_admin'); ?></a></li>
        <li role="presentation"><a href="#fourthPanel" class="tabAnchor fourthPanel text-center" data-color="#fca901" aria-controls="fourthPanel" role="tab" data-toggle="sfdc-tab"><?php echo __('Global Settings', 'FRocket_admin'); ?></a></li>
        <li class="shifter shifterForward tabToggle"><a class="text-center"><i class="fa fa-angle-double-right"></i></a></li>
        <li role="presentation" class="tabToggle hidden"><a href="#fifthPanel" class="tabAnchor fifthPanel text-center" data-color="#333333" aria-controls="fifthPanel" role="sfdc-tab" data-toggle="tab">You Found Me!</a></li>
      </ul>

      <div class="sfdc-tab-content">

        <div role="tabpanel" class="sfdc-tab-pane sfdc-active" id="firstPanel">
          <div class="tabInner">
          
          
 
            <div id="zgfm-flow-section-wrapper">
              <div id="zgfmFlowSection">
              
              <div id="zgfm-flow-options">
                <div class="row">
                  <div class="col">
                    <div class="btn-group btn-array" role="group" aria-label="Button group with nested dropdown">
                      <button type="button" id="zgfm-m-addnewform" class="btn btn-primary"><?php echo __('Add New Form', 'FRocket_admin'); ?></button>
                      <button type="button" id="zgfm_m_showmodal" class="btn btn-primary"><?php echo __('Show Modal', 'FRocket_admin'); ?></button>
                      <button type="button" class="btn btn-primary">Button 3</button>
                    </div>
                  </div>
                </div>
              </div>
              
                <div class="btn-export" class="" onclick="editor.showExport()">Export</div>
                <div class="bar-zoom">
                  <i class="fa fa-search-minus" onclick="editor.zoom_out()"></i>
                  <i class="fa fa-search" onclick="editor.zoom_reset()"></i>
                  <i class="fa fa-search-plus" onclick="editor.zoom_in()"></i>
                </div>
              </div>
            </div>
            
            
          </div> <!-- /.tabInner -->
        </div> <!-- /.tabpanel -->

        <div role="tabpanel" class="sfdc-tab-pane" id="secondPanel">
          <div class="tabInner">
            <h2>Tab Two</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
            <button class="btn">Action</button>
          </div> <!-- /.tabInner -->
        </div> <!-- /.tabpanel -->

        <div role="tabpanel" class="sfdc-tab-pane" id="thirdPanel">
          <div class="tabInner">
            <h2>(2 + 1)rd Tab</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
            <button class="btn">Action</button>
          </div> <!-- /.tabInner -->
        </div> <!-- /.tabpanel -->

        <div role="tabpanel" class="sfdc-tab-pane" id="fourthPanel">
          <div class="tabInner">
            <h2>Fourth Tab</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
            <button class="btn">Action</button>
          </div> <!-- /.tabInner -->
        </div> <!-- /.tabpanel -->

        <div role="tabpanel" class="sfdc-tab-pane" id="fifthPanel">
          <div class="tabInner">
            <h2>You Found Me!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
            <button class="btn">Action</button>
          </div> <!-- /.tabInner -->
        </div> <!-- /.tabpanel -->

      </div> <!-- /.tab-content -->

    </div> <!-- /.tabWrap -->



  </div>


 


</div>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jerosoler/Drawflow/dist/drawflow.min.css">

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
 
  });
  
  var id = document.getElementById("zgfmFlowSection");
  const editor = new Drawflow(id);
  editor.addModule('zigaform');
  editor.reroute = true;
  /*const dataToImport = {"drawflow":{"Home":{"data":{"1":{"id":1,"name":"welcome","data":{},"class":"welcome","html":"\n    <div>\n      <div class=\"title-box\">👏 Welcome!!</div>\n      <div class=\"box\">\n        <p>Simple flow library <b>demo</b>\n        <a href=\"https://github.com/jerosoler/Drawflow\" target=\"_blank\">Drawflow</a> by <b>Jero Soler</b></p><br>\n\n        <p>Multiple input / outputs<br>\n           Data sync nodes<br>\n           Import / export<br>\n           Modules support<br>\n           Simple use<br>\n           Type: Fixed or Edit<br>\n           Events: view console<br>\n           Pure Javascript<br>\n        </p>\n        <br>\n        <p><b><u>Shortkeys:</u></b></p>\n        <p>🎹 <b>Delete</b> for remove selected<br>\n        💠 Mouse Left Click == Move<br>\n        ❌ Mouse Right == Delete Option<br>\n        🔍 Ctrl + Wheel == Zoom<br>\n        📱 Mobile support<br>\n        ...</p>\n      </div>\n    </div>\n    ","typenode": false, "inputs":{},"outputs":{},"pos_x":50,"pos_y":50},"2":{"id":2,"name":"slack","data":{},"class":"slack","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-slack\"></i> Slack chat message</div>\n          </div>\n          ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1028,"pos_y":87},"3":{"id":3,"name":"telegram","data":{"channel":"channel_2"},"class":"telegram","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-telegram-plane\"></i> Telegram bot</div>\n            <div class=\"box\">\n              <p>Send to telegram</p>\n              <p>select channel</p>\n              <select df-channel>\n                <option value=\"channel_1\">Channel 1</option>\n                <option value=\"channel_2\">Channel 2</option>\n                <option value=\"channel_3\">Channel 3</option>\n                <option value=\"channel_4\">Channel 4</option>\n              </select>\n            </div>\n          </div>\n          ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1032,"pos_y":184},"4":{"id":4,"name":"email","data":{},"class":"email","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-at\"></i> Send Email </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"5","input":"output_1"}]}},"outputs":{},"pos_x":1033,"pos_y":439},"5":{"id":5,"name":"template","data":{"template":"Write your template"},"class":"template","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-code\"></i> Template</div>\n              <div class=\"box\">\n                Ger Vars\n                <textarea df-template></textarea>\n                Output template with vars\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"6","input":"output_1"}]}},"outputs":{"output_1":{"connections":[{"node":"4","output":"input_1"},{"node":"11","output":"input_1"}]}},"pos_x":607,"pos_y":304},"6":{"id":6,"name":"github","data":{"name":"https://github.com/jerosoler/Drawflow"},"class":"github","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-github \"></i> Github Stars</div>\n            <div class=\"box\">\n              <p>Enter repository url</p>\n            <input type=\"text\" df-name>\n            </div>\n          </div>\n          ","typenode": false, "inputs":{},"outputs":{"output_1":{"connections":[{"node":"5","output":"input_1"}]}},"pos_x":341,"pos_y":191},"7":{"id":7,"name":"facebook","data":{},"class":"facebook","html":"\n        <div>\n          <div class=\"title-box\"><i class=\"fab fa-facebook\"></i> Facebook Message</div>\n        </div>\n        ","typenode": false, "inputs":{},"outputs":{"output_1":{"connections":[{"node":"2","output":"input_1"},{"node":"3","output":"input_1"},{"node":"11","output":"input_1"}]}},"pos_x":347,"pos_y":87},"11":{"id":11,"name":"log","data":{},"class":"log","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-file-signature\"></i> Save log file </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"5","input":"output_1"},{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1031,"pos_y":363}}},"Other":{"data":{"8":{"id":8,"name":"personalized","data":{},"class":"personalized","html":"\n            <div>\n              Personalized\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"12","input":"output_1"},{"node":"12","input":"output_2"},{"node":"12","input":"output_3"},{"node":"12","input":"output_4"}]}},"outputs":{"output_1":{"connections":[{"node":"9","output":"input_1"}]}},"pos_x":764,"pos_y":227},"9":{"id":9,"name":"dbclick","data":{"name":"Hello World!!"},"class":"dbclick","html":"\n            <div>\n            <div class=\"title-box\"><i class=\"fas fa-mouse\"></i> Db Click</div>\n              <div class=\"box dbclickbox\" ondblclick=\"showpopup(event)\">\n                Db Click here\n                <div class=\"modal\" style=\"display:none\">\n                  <div class=\"modal-content\">\n                    <span class=\"close\" onclick=\"closemodal(event)\">&times;</span>\n                    Change your variable {name} !\n                    <input type=\"text\" df-name>\n                  </div>\n\n                </div>\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"8","input":"output_1"}]}},"outputs":{"output_1":{"connections":[{"node":"12","output":"input_2"}]}},"pos_x":209,"pos_y":38},"12":{"id":12,"name":"multiple","data":{},"class":"multiple","html":"\n            <div>\n              <div class=\"box\">\n                Multiple!\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[]},"input_2":{"connections":[{"node":"9","input":"output_1"}]},"input_3":{"connections":[]}},"outputs":{"output_1":{"connections":[{"node":"8","output":"input_1"}]},"output_2":{"connections":[{"node":"8","output":"input_1"}]},"output_3":{"connections":[{"node":"8","output":"input_1"}]},"output_4":{"connections":[{"node":"8","output":"input_1"}]}},"pos_x":179,"pos_y":272}}}}}
  editor.start();
  editor.import(dataToImport);*/
  // Add initial nodes
  editor.editor_mode = "edit";
  editor.start();
  const node1 = editor.addNode('test2', 1, 1, 50, 100, 'test2', {}, "Hello World");
  
  const mmanager = new ZgfmManager();
  mmanager.init($uifm);
  // Render Drawflow
  //editor.render();
</script>
<?php
$cntACmp = ob_get_contents();
//$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>