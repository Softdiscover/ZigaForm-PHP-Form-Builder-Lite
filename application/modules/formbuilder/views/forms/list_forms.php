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
<div id="uiform-container" data-uiform-page="form_list" class="sfdc-wrap uiform-wrap zgfm_page_list_forms">
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="col-lg-12">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('Form List', 'FRocket_admin'); ?>
                </h5>
                <div class="widget-buttons">
                    
                    
                </div>
            </div>  
            <div class="widget-body">
                <div id="uiform-listform-options">
                    <div class="uiform-listform-options-col">
                           <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                       href="<?php echo site_url() . 'formbuilder/forms/choose_mode'; ?>">
                        <i class="fa fa-plus">
                        </i>
                        <?php echo __('Add new form', 'FRocket_admin'); ?>
                        </a>
                    </div>
                    <div class="uiform-listform-options-col">
                         <a class="sfdc-btn sfdc-btn-sm sfdc-btn-warning uiform-confirmation-func-action" 
                            data-dialog-title="<?php echo __('Disable Form', 'FRocket_admin'); ?>"
                            data-dialog-callback="rocketform.listform_updateStatus(2);"
                        href="javascript:void(0);">
                           
                        <?php echo __('Disable', 'FRocket_admin'); ?>
                        </a>
                    </div>
                    <div class="uiform-listform-options-col">
                         <a class="sfdc-btn sfdc-btn-sm sfdc-btn-info uiform-confirmation-func-action" 
                            data-dialog-title="<?php echo __('Enable Form', 'FRocket_admin'); ?>"
                            data-dialog-callback="rocketform.listform_updateStatus(1);"
                        href="javascript:void(0);">
                            
                        <?php echo __('Enable', 'FRocket_admin'); ?>
                        </a>
                    </div>
                    <div class="uiform-listform-options-col">
                        <a class="sfdc-btn sfdc-btn-sm sfdc-btn-danger uiform-confirmation-func-action" 
                           data-dialog-title="<?php echo __('Move to trash', 'FRocket_admin'); ?>"
                           data-dialog-callback="rocketform.listform_updateStatus(0);"
                        href="javascript:void(0);">
                            <i class="fa fa-trash-o"></i>
                        <?php echo __('Move to trash', 'FRocket_admin'); ?>
                        </a>
                    </div>
                    
                    <div class="uiform-listform-options-col">
                        
                             <?php if ( ZIGAFORM_F_LITE == 1) { ?>
                        <a class="sfdc-btn sfdc-btn-sm sfdc-btn-success" 
                           onclick="javascript:rocketform.showFeatureLocked(this);"
                            data-blocked-feature="Duplicate Form"
                             href="javascript:void(0);">
                         <i class="fa fa-files-o"></i>   
                                    <?php echo __('Duplicate', 'FRocket_admin'); ?> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span>
                        </a>
                        
                             <?php } else { ?>
                        <a class="sfdc-btn sfdc-btn-sm sfdc-btn-success uiform-confirmation-func-action" 
                           data-dialog-title="<?php echo __('Duplicate Form', 'FRocket_admin'); ?>"
                           data-dialog-callback="rocketform.listform_duplicate();"
                        href="javascript:void(0);">
                         <i class="fa fa-files-o"></i>   
                                 <?php echo __('Duplicate', 'FRocket_admin'); ?>
                        </a>
                             <?php } ?>
                        
                    </div>
                    <div class="uiform-listform-options-col">
                        <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                           data-target="#zgfm-listform-filter-panel"
                           data-toggle="sfdc-collapse"
                        href="javascript:void(0);">
                            <span class="sfdc-glyphicon sfdc-glyphicon-cog"></span>
                        <?php echo __('Advanced Search', 'FRocket_admin'); ?>
                        </a>
                    </div>
                      
                </div>
                <div class="zgfm-listform-searchbox-container">
                     <div id="zgfm-listform-filter-panel" class="sfdc-collapse filter-panel">
                        <div class="sfdc-panel sfdc-panel-default">
                            <div class="sfdc-panel-body">
                                <form id="zgfm-listform-filter-panel-form" class="sfdc-form-inline" role="form">
                                    <div class="sfdc-form-group">
                                        <label class="sfdc-filter-col" style="margin-right:0;" for="zgfm-listform-pref-perpage"><?php echo __('Rows per page', 'FRocket_admin'); ?>:</label>
                                        <select id="zgfm-listform-pref-perpage" name="zgfm-listform-pref-perpage" class="sfdc-form-control">
                                            <option value="2" <?php echo ( $per_page === 2 ) ? 'selected' : ''; ?> >2</option>
                                            <option value="3" <?php echo ( $per_page === 3 ) ? 'selected' : ''; ?> >3</option>
                                            <option value="4" <?php echo ( $per_page === 4 ) ? 'selected' : ''; ?> >4</option>
                                            <option value="5" <?php echo ( $per_page === 5 ) ? 'selected' : ''; ?> >5</option>
                                            <option value="6" <?php echo ( $per_page === 6 ) ? 'selected' : ''; ?> >6</option>
                                            <option value="7" <?php echo ( $per_page === 7 ) ? 'selected' : ''; ?> >7</option>
                                            <option value="8" <?php echo ( $per_page === 8 ) ? 'selected' : ''; ?> >8</option>
                                            <option value="9" <?php echo ( $per_page === 9 ) ? 'selected' : ''; ?> >9</option>
                                            <option value="10" <?php echo ( $per_page === 10 ) ? 'selected' : ''; ?> >10</option>
                                            <option value="15" <?php echo ( $per_page === 15 ) ? 'selected' : ''; ?> >15</option>
                                            <option value="20" <?php echo ( $per_page === 20 ) ? 'selected' : ''; ?> >20</option>
                                            <option value="30" <?php echo ( $per_page === 30 ) ? 'selected' : ''; ?> >30</option>
                                            <option value="40" <?php echo ( $per_page === 40 ) ? 'selected' : ''; ?> >40</option>
                                            <option value="50" <?php echo ( $per_page === 50 ) ? 'selected' : ''; ?> >50</option>
                                            <option value="100" <?php echo ( $per_page === 100 ) ? 'selected' : ''; ?> >100</option>
                                            <option value="200" <?php echo ( $per_page === 200 ) ? 'selected' : ''; ?> >200</option>
                                            <option value="300" <?php echo ( $per_page === 300 ) ? 'selected' : ''; ?> >300</option>
                                            <option value="400" <?php echo ( $per_page === 400 ) ? 'selected' : ''; ?> >400</option>
                                            <option value="500" <?php echo ( $per_page === 500 ) ? 'selected' : ''; ?> >500</option>
                                            <option value="1000" <?php echo ( $per_page === 1000 ) ? 'selected' : ''; ?> >1000</option>
                                            <option value="" <?php echo ( $per_page === 0 ) ? 'selected' : ''; ?> ><?php echo __('All', 'FRocket_admin'); ?></option>
                                        </select>                                
                                    </div> <!-- form group [rows] -->
                                    <div class="sfdc-form-group">
                                        <label class="sfdc-filter-col" style="margin-right:0;" for="zgfm-listform-pref-search"><?php echo __('Search', 'FRocket_admin'); ?>:</label>
                                        <div class="sfdc-input-group">
                                            <input type="text" class="sfdc-form-control sfdc-input-sm" value="<?php echo $search_txt; ?>" id="zgfm-listform-pref-search" name="zgfm-listform-pref-search">
                                            <span class="sfdc-input-group-btn">
                                                <button class="sfdc-btn sfdc-btn-default sfdc-btn-sm" type="button"><span class="sfdc-glyphicon sfdc-glyphicon-search"></span></button>
                                            </span>
                                        </div>
                                    </div><!-- form group [search] -->
                                    <div class="sfdc-form-group">
                                        <label class="sfdc-filter-col" style="margin-right:0;" for="zgfm-listform-pref-orderby"><?php echo __('Order by', 'FRocket_admin'); ?>:</label>
                                        <select id="zgfm-listform-pref-orderby" name="zgfm-listform-pref-orderby" class="sfdc-form-control">
                                            <option value="desc" <?php echo ( $orderby == 'desc' ) ? 'selected' : ''; ?> ><?php echo __('Descendent', 'FRocket_admin'); ?></option>
                                            <option value="asc" <?php echo ( $orderby == 'asc' ) ? 'selected' : ''; ?> ><?php echo __('Ascendent', 'FRocket_admin'); ?></option>
                                        </select>                                
                                    </div> <!-- form group [order by] --> 
                                    <div class="sfdc-form-group">    
                                        <!--<div class="sfdc-checkbox" style="margin-left:10px; margin-right:10px;">
                                            <label><input id="zgfm-listform-pref-remparam" name="zgfm-listform-pref-remparam" type="checkbox"> <?php echo __('Remember parameters', 'FRocket_admin'); ?></label>
                                        </div>-->
                                        <a href="javascript:void(0);" onclick="javascript:zgfm_back_general.formslist_search_refresh_save();" class="sfdc-btn sfdc-btn-default sfdc-filter-col">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-record"></span> <?php echo __('Save Settings', 'FRocket_admin'); ?>
                                        </a>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                    
                </div>
                <?php echo $subsubsub; ?>
                <div id="zgfm-back-listform-maintable-container" class="sfdc-clearfix"></div>
            </div> 
        </div> 
    </div>
    </div>
</div>



<div style="display:none;">
    <input type="hidden" id="uifm_listform_popup_title" value="<?php echo __('List form information', 'FRocket_admin'); ?>" >
    <input type="hidden" id="uifm_listform_offset_val" value="<?php echo $offset; ?>" >
    <input type="hidden" id="uifm_listform_popup_notforms" value="<?php echo __('there is no forms selected. select one at least', 'FRocket_admin'); ?>" >
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function ($) {
    $('#zgfm-listform-filter-panel').on('shown.bs.collapse', function (e) {
        /* Get clicked element that initiated the collapse...*/
        var $clickedBtn = $(e.target).data('bs.collapse').$trigger;
        /*add active to button*/
        $clickedBtn.addClass('sfdc-active');
    });
    $('#zgfm-listform-filter-panel').on('hidden.bs.collapse', function (e) {
        /* Get clicked element that initiated the collapse...*/
        var $clickedBtn = $(e.target).data('bs.collapse').$trigger;
        /*remove active to button*/
        $clickedBtn.removeClass('sfdc-active');
    });
    
    /*list form refresh params*/
    /*event filter */
      $(document).on( "keyup change","#zgfm-listform-pref-perpage,#zgfm-listform-pref-search,#zgfm-listform-pref-orderby" , function(e) {
        zgfm_back_general.formslist_search_refresh();
    });
    
    /*trigger filter */
    zgfm_back_general.formslist_search_refresh();
    
});
//]]>
</script>
