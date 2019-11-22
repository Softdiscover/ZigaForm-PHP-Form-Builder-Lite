<?php

/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: intranet.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Estimator intranet class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Fields extends MX_Controller {
    /**
     * max number of forms in order show by pagination
     *
     * @var int
     */

    const VERSION = '0.1';

    /**
     * name of form estimator table
     *
     * @var string
     */
    var $table = "";
    var $per_page = 10;

    /**
     * Fields::__construct()
     * 
     * @return 
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_fields');
        $this->load->model('addon/model_addon');
        $this->auth->authenticate(true);
    }
    
    
            /**
     * Forms::ajax_dev generation field options
     * 
     * @return 
     */
    public function ajax_dev_genfieldopts() {
                
        $data_render=array();
        
        
        $array = array(1, 2, 3, 4,5,6,8,9,10,11);
        foreach ($array as $type) {
            switch (intval($type)) {
                case 1:
                    //1 col
                    $field_block = 0;
                    $data_render[$type]=$this->load_field_options($type, "", $field_block);
                    break;
                case 2:
                    //2 cols
                    $field_block = 0;
                    $data_render[$type]=$this->load_field_options($type, "", $field_block);
                    break;
                case 3:
                    //3 cols
                    $field_block = 0;
                    $data_render[$type]=$this->load_field_options($type, "", $field_block);
                    break;
                case 4:
                    //4 cols
                    $field_block = 0;
                    $data_render[$type]=$this->load_field_options($type, "", $field_block);
                    break;
                case 5:
                    // 6 cols
                    $field_block = 0;
                    $data_render[$type]=$this->load_field_options($type, "", $field_block);
                    break;
                case 6:

                    //textbox
                    $data_render[$type]=$this->load_field_options($type, "", null);
                    break;

                case 8:
                    //radio button
                    $data_render[$type]=$this->load_field_options($type, "", null);
                    break;
                case 9:
                    //checkbox
                    $data_render[$type]=$this->load_field_options($type, "", null);
                    break;
                case 10:
                    //select
                    $data_render[$type]=$this->load_field_options($type, "", null);
                    break;
                case 11:
                    //multiple select
                    $data_render[$type]=$this->load_field_options($type, "", null);
                    break;
                }
        }
        
        $html_output='';
        ob_start();
        ?>&lt;?php
        /**
         * Intranet
         *
         * PHP version 5
         *
         * @category  PHP
         * @package   Rocket_form
         * @author    Softdiscover &lt;info@softdiscover.com&gt;
         * @copyright 2015 Softdiscover
         * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
         * @link      http://wordpress-form-builder.uiform.com/
         */
        if (!defined('BASEPATH')) {exit('No direct script access allowed');}
        ?&gt;
        &lt;!-- options --&gt;<?php
        $html_output_head= ob_get_contents();
        ob_end_clean();
        
        $html_output.=html_entity_decode($html_output_head);
       
        $search2=base_url();
        $replace2="{{{data.site_url}}}";
        
        foreach ($data_render as $key => $value) {
            $html_output.='<script type="text/html" id="tmpl-zgfm-field-opt-type-'.$key.'">';
            $value= str_replace($search2, $replace2, $value);
            
            $html_output.= htmlentities($value);
            $html_output.='</script>';
            $html_output.='';
        }
        
        
        $fname=APPPATH."/modules/formbuilder/views/forms/fieldoptions_data.php";
        
        $fhandle = fopen($fname,"w");
        fwrite($fhandle,$html_output);
        fclose($fhandle);
        
                
         //echo json_encode($data_render);  
         die();
    }
    
    /**
     * Forms::ajax_delete_form_byid()
     * 
     * @return 
     */
    public function ajax_field_sel_impbulkdata() {
            
        $data=array();
        
        $json = array();
        $json['modal_header'] = '<h3>'.__('Import Bulk Data','FRocket_admin').'</h3>';
        $json['modal_body'] = $this->load->view('formbuilder/fields/options/select/impbulkdata', $data, true);
        $json['modal_footer'] = $this->load->view('formbuilder/fields/options/select/impbulkdata_footer', $data,true);
        
        //return data to ajax callback
        header('Content-Type: application/json');
        echo json_encode($json);
        die();    
    }
    
       /**
     * Get field option in order to customize the field
     * 
     * @return json
     */
    public function ajax_field_option() {

        //check_ajax_referer('zgfm_ajax_nonce', 'zgfm_security');

        $id = (isset($_POST['field_id'])) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['field_id'])) : '';
        $type = (isset($_POST['field_type'])) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['field_type'])) : '';
        $field_block = (isset($_POST['field_block'])) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['field_block'])) : '';
        $field_block = (isset($field_block) && intval($field_block) > 0) ? $field_block : 0;
        $json = array();

        
        $json['modal_body'] = $this->load_field_options($type, $id,$field_block);
        
        $json['field_id'] = $id;
        $json['field_type'] = $type;
        $json['field_block'] = $field_block;
        //addons    
        $json['addons'] = $this->model_addon->getActiveAddonsNamesOnBack();
        
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    
    /**
     * load field option by type
     * 
     * @return json
     */
    public function load_field_options($type, $id, $block = null) {
        $output = '';
                
        $data = array();
        switch (intval($type)) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $data['field_block'] = (isset($block) && intval($block) > 0) ? $block : 0;
                
                $data['is_row']=true;
                $data['message_picked_el']='';
                if(isset($block) && intval($block) > 0){
                    $data['is_row']=false;
                    $data['message_picked_el']=__('Column','FRocket_admin').' '.$block;
                }
                
                
                $data['modules_field_more']='';
                
                
                $output.= $this->load->view('formbuilder/fields/modal/field_opt_column', $data, true);
                break;
            
            default:    
                //textbox
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                switch (intval($type)) {
                    case 8:    
                        //radio button
                    case 9:    
                        //checkbox
                        $data['field_extra_src'] = $this->load->view('formbuilder/fields/modal/field_opt_checkbox_extra', $data, true);
                        break;
                    case 10:    
                        //select
                    case 11:    
                        //Multiple select
                        $data['field_extra_src'] = $this->load->view('formbuilder/fields/modal/field_opt_select_extra', $data, true);
                        break;
                    default:
                        break;
                }
                $data['modules_field_more']=$this->addon->get_modulesBySection('back_field_opt_more');   
                $data['obj_sfm'] = Uiform_Form_Helper::get_font_library();
                    $output.= $this->load->view('formbuilder/fields/modal/field_opt_text', $data, true);
                break;
            
            
        }

        return $output;
    }
    
    /**
     * Fields:: ajax_refresh_captcha()
     * 
     * @return 
     */
    public function ajax_refresh_captcha() {

        $length = 5;
        $charset = 'abcdefghijklmnpqrstuvwxyz123456789';
        $phrase = '';
        $chars = str_split($charset);

        for ($i = 0; $i < $length; $i++) {
            $phrase .= $chars[array_rand($chars)];
        }

        $resp = $resp2 = array();
        $resp['txt_color_st'] = (isset($_POST['txt_color_st'])) ? Uiform_Form_Helper::sanitizeInput($_POST['txt_color_st']) : '';
        $resp['txt_color'] = (isset($_POST['txt_color'])) ? Uiform_Form_Helper::sanitizeInput($_POST['txt_color']) : '';
        $resp['background_st'] = (isset($_POST['background_st'])) ? Uiform_Form_Helper::sanitizeInput($_POST['background_st']) : '';
        $resp['background_color'] = (isset($_POST['txt_color_st'])) ? Uiform_Form_Helper::sanitizeInput($_POST['background_color']) : '';
        $resp['distortion'] = (isset($_POST['distortion'])) ? Uiform_Form_Helper::sanitizeInput($_POST['distortion']) : '';
        $resp['behind_lines_st'] = (isset($_POST['behind_lines_st'])) ? Uiform_Form_Helper::sanitizeInput($_POST['behind_lines_st']) : '';
        $resp['behind_lines'] = (isset($_POST['behind_lines'])) ? Uiform_Form_Helper::sanitizeInput($_POST['behind_lines']) : '';
        $resp['front_lines_st'] = (isset($_POST['front_lines_st'])) ? Uiform_Form_Helper::sanitizeInput($_POST['front_lines_st']) : '';
        $resp['front_lines'] = (isset($_POST['front_lines'])) ? Uiform_Form_Helper::sanitizeInput($_POST['front_lines']) : '';
        $resp['ca_txt_gen'] = $phrase;

        $captcha_options = Uiform_Form_Helper::base64url_encode(json_encode($resp));
        $resp2 = array();
        $resp2['rkver'] = $captcha_options;
        //return data to ajax callback
        header('Content-Type: application/json');
        echo json_encode($resp2);
        die();
    }
    
    
    /**
     * Fields::edit_uiform()
     * 
     * @return 
     */
    public function edit_uiform() {

        $data = array();
        echo $this->load->view('formbuilder/forms/edit_form', $data, true);
    }
    
    
   
    public function formhtml_textbox($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_textbox_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_textarea($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_textarea_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_radiobtn($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_radiobtn_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_checkbox($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        
        return $this->formhtml_renderField($data);
    }

    public function formhtml_checkbox_css($data) {
        
        return $this->formhtml_renderCssField($data);

    }

    public function formhtml_select($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_select_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_multiselect($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_multiselect_css($data) {
        //using select css because it's the same
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_fileupload($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_fileupload_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_imageupload($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_imageupload_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_customhtml($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_customhtml_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_password($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_password_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_preptext($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_preptext_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_appetext($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_appetext_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_prepapptext($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_prepapptext_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    
    public function formhtml_panelfld($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_panelfld_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    
    public function formhtml_slider($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_slider_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_range($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_range_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_spinner($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_spinner_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_captcha($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_captcha_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_recaptcha($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_recaptcha_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_datepicker($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_datepicker_css($data) {
        return $this->formhtml_renderCssField($data);
    }
                    
    public function formhtml_date2($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_date2_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_timepicker($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_timepicker_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_datetime($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_datetime_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_submitbtn($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_submitbtn_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_hiddeninput($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_hiddeninput_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_ratingstar($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_ratingstar_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_colorpicker($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_colorpicker_css($data) {
        return $this->formhtml_renderCssField($data);
    }

    public function formhtml_divider($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_divider_css($data) {

        return $this->formhtml_renderCssField($data);
    }
    
    public function formhtml_wizardbtn($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_wizardbtn_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    public function formhtml_switch($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_switch_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    
    public function formhtml_dyncheckbox($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_dyncheckbox_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    public function formhtml_dynradiobtn($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_dynradiobtn_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    public function formhtml_heading($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return $this->formhtml_renderField($data);
    }

    public function formhtml_heading_css($data) {
        return $this->formhtml_renderCssField($data);
    }
    
    public function formhtml_renderCssField($data){
        
        $tmp_type=intval($data['type']);
        
        $output='';
        
        switch ($tmp_type) { 
            case 6:
               /*textbox*/
            case 7: case 8: case 9: case 10: case 11: case 12: case 13: case 14: case 15: case 16: case 17:
            case 18: case 19: case 20: case 21: case 22: case 23: case 24: case 25: case 26: case 27: case 28:case 29: case 30:
            case 32: case 33: case 34: case 35: case 36: case 37: case 38: case 39: case 40: case 41: case 42: case 43:
                
               $data['render_common_css'] = $this->load->view('formbuilder/fields/render_css_front/common_css', $data, true);
               $data['render_common_css2'] = $this->load->view('formbuilder/fields/render_css_front/common_css2', $data, true);
               $data['render_addon_css'] = $this->load->view('formbuilder/fields/render_css_front/addon_css', $data, true);
               
               switch ($tmp_type) {
                   case 6:
                    /*textbox*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_textbox', $data, true);
                        break;
                   case 7:
                    /*textarea*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_textarea', $data, true);
                        break;
                   case 8:
                    /*radio button*/  
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_radiobutton', $data, true);
                        break;
                    case 9:
                    /*checkbox*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_checkbox', $data, true);
                        break;
                    case 10:
                    /*select*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_select', $data, true);
                        break;
                    case 11:
                    /*multiselect*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_multiselect', $data, true);
                        break;
                    case 12:
                    /*file upload*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_fileupload', $data, true);
                        break;
                    case 13:
                    /*image upload*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_imageupload', $data, true);
                        break;
                    case 14:
                    /*custom html*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_customhtml', $data, true);
                        break;
                    case 15:
                    /*password*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_password', $data, true);
                        break;
                    case 16:
                    /*Slider*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_slider', $data, true);
                        break;
                    case 17:
                    /*range*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_range', $data, true);
                        break;
                    case 18:
                    /*spinner*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_spinner', $data, true);
                        break;
                    case 19:
                    /*captcha*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_captcha', $data, true);
                        break;
                    case 20:
                    /*submit button*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_submitbutton', $data, true);
                        break;
                    case 21:
                    /*hidden field*/
                    $data['render_block_type'] =  '';
                        break;
                    case 22:
                    /*star rating*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_starrating', $data, true);
                        break;
                    case 23:
                    /*color picker*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_colorpicker', $data, true);
                        break;
                    case 24:
                    /* date picker*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_datepicker', $data, true);
                        break;
                    case 25:
                    /* time picker*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_timepicker', $data, true);
                        break;
                    case 26:
                    /* date and time*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_datetime', $data, true);
                        break;
                    case 27:
                    /* recaptcha*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_recaptcha', $data, true);
                        break;
                    case 28:
                    /* prependtext*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_textbox', $data, true);
                        break;
                    case 29:
                    /* app text*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_textbox', $data, true);
                        break;
                    case 30:
                    /* app prep*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_textbox', $data, true);
                        break;
                    case 32:
                    /* divider*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_divider', $data, true);
                        break;
                    case 33:case 34:case 35:case 36:case 37:case 38:
                    /* heading 1*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_heading', $data, true);
                        break;
                    case 39:
                    /* wizard buttons*/
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_wizardbtn', $data, true);
                        break;
                    case 40:
                    /* switch */
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_switch', $data, true);
                        break;
                    case 41:
                    /* dyn checkbox */
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_dyncheckbox', $data, true);
                        break;
                    case 42:
                    /* dyn radio button */
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_dynradiobtn', $data, true);
                        break;
                    case 43:
                    /* date 2 */
                    $data['render_block_type'] =  $this->load->view('formbuilder/fields/render_css_front/type_date2', $data, true);
                        break;
                    
               }
               
               $output = $this->load->view('formbuilder/fields/render_css_front/block_main', $data, true);
               
                break;
            default:
               
            break;
        }
        
        return $output;
    }
    
    public function formhtml_renderField($data){
        
        $tmp_type=intval($data['type']);
        
        $output='';
        
        switch ($tmp_type) { 
            case 6:
               /*textbox*/
            case 7: case 8: case 9: case 10: case 11: case 12: case 13: case 14: case 15: case 16: case 17:
            case 18: case 19: case 20: case 21: case 22: case 23: case 24: case 25: case 26: case 27: case 28:case 29: case 30:
            case 33: case 34: case 35: case 36: case 37: case 38: case 39: case 40: case 41: case 42: case 43:
            
            
              
                
               $data['render_block_label'] =  $this->load->view('formbuilder/fields/render_front/block_label', $data, true);
                
               switch ($tmp_type) {
                   case 6:
                       /*textbox*/
                       $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_textbox', $data, true);
                       $data['render_extraclass1'] = 'rockfm-textbox ';
                       break;
                   
                   case 7:
                       /*textarea*/
                       $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_textarea', $data, true);
                       $data['render_extraclass1'] = 'rockfm-textarea ';
                       break;                    
                   case 8:
                    /*radio button*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_radiobutton', $data, true);
                        $data['render_extraclass1'] = 'rockfm-radiobtn ';
                     break;
                    case 9:
                    /*checkbox*/   
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_checkbox', $data, true);
                        $data['render_extraclass1'] = 'rockfm-checkbox ';
                     break;
                     case 10:
                    /*select*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_select', $data, true);
                        $data['render_extraclass1'] = 'rockfm-select ';
                        break; 
                    case 11:
                    /*multi select*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_multiselect', $data, true);
                        $data['render_extraclass1'] = 'rockfm-multiselect ';
                        break; 
                    case 12:
                    /*file upload*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_fileupload', $data, true);
                        $data['render_extraclass1'] = 'rockfm-fileupload ';
                        break; 
                    case 13:
                    /*Image upload*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_imageupload', $data, true);
                        $data['render_extraclass1'] = 'rockfm-imageupload';
                        break; 
                    case 14:
                    /*custom html*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_customhtml', $data, true);
                        $data['render_extraclass1'] = 'rockfm-customhtml';
                        break;
                    case 15:
                    /*password*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_password', $data, true);
                        $data['render_extraclass1'] = 'rockfm-password ';
                        break;
                    case 16:
                    /*slider*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_slider', $data, true);
                        $data['render_extraclass1'] = 'rockfm-slider ';
                        break;
                    case 17:
                    /*range*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_range', $data, true);
                        $data['render_extraclass1'] = 'rockfm-range ';
                        break;
                    case 18:
                    /*spinner*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_spinner', $data, true);
                        $data['render_extraclass1'] = 'rockfm-spinner ';
                        break;
                    case 19:
                    /*catpcha*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_captcha', $data, true);
                        $data['render_extraclass1'] = 'rockfm-captcha ';
                        break;
                    case 20:
                    /*submit button*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_subbtn', $data, true);
                        $data['render_extraclass1'] = 'rockfm-submitbtn ';
                        break;
                    case 21:
                    /*hidden field*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_hiddenfield', $data, true);
                        $data['render_extraclass1'] = 'rockfm-hiddeninput ';
                        break;
                    case 22:
                    /*star rating*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_starrating', $data, true);
                        $data['render_extraclass1'] = 'rockfm-ratingstar ';
                        break;
                    case 23:
                    /*color picker*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_colorpicker', $data, true);
                        $data['render_extraclass1'] = 'rockfm-colorpicker ';
                        break;
                    case 24:
                    /*Date picker*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_datepicker', $data, true);
                        $data['render_extraclass1'] = 'rockfm-datepicker ';
                        break;
                    case 25:
                    /*time picker*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_timepicker', $data, true);
                        $data['render_extraclass1'] = 'rockfm-timepicker ';
                        break;
                    case 26:
                    /*date time*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_datetime', $data, true);
                        $data['render_extraclass1'] = 'rockfm-datetime ';
                        break;
                    case 27:
                    /*recaptcha*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_recaptcha', $data, true);
                        $data['render_extraclass1'] = 'rockfm-recaptcha ';
                        break;
                    case 28:
                    /*prep text*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_preptext', $data, true);
                        $data['render_extraclass1'] = 'rockfm-preptext ';
                        break;
                    case 29:
                    /*app text*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_apptext', $data, true);
                        $data['render_extraclass1'] = 'rockfm-appetext ';
                        break;
                    case 30:
                    /*app prep*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_appprep', $data, true);
                        $data['render_extraclass1'] = 'rockfm-prepapptext ';
                        break;
                   
                   case 33:case 34:case 35:case 36:case 37:case 38:
                    /*heading*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_heading', $data, true);
                        $data['render_extraclass1'] = 'rockfm-heading ';
                        break;
                    case 39:
                    /*wizard button*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_wizardbtn', $data, true);
                        $data['render_extraclass1'] = 'rockfm-wizardbtn ';
                        break;
                    case 40:
                    /*switch*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_switch', $data, true);
                        $data['render_extraclass1'] = 'rockfm-switch ';
                        break;
                    case 41:
                    /*dyn checkbox*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_dyncheckbox', $data, true);
                        $data['render_extraclass1'] = 'rockfm-dyncheckbox ';
                        break;
                    case 42:
                    /*dyn radio button*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_dynradiobtn', $data, true);
                        $data['render_extraclass1'] = 'rockfm-dynradiobtn ';
                        break;
                    case 43:
                    /*date 2*/
                        $data['render_block_input'] =  $this->load->view('formbuilder/fields/render_front/type_date2', $data, true);
                        $data['render_extraclass1'] = 'rockfm-date2 ';
                        break;
               }
               
               $data['render_block_input_cont'] =  $this->load->view('formbuilder/fields/render_front/block_input_cont', $data, true);
               $data['render_block_container'] =  $this->load->view('formbuilder/fields/render_front/block_container', $data, true);
               
               $output = $this->load->view('formbuilder/fields/render_front/block_main', $data, true);
               
                break;
           case 32:
           /*divider*/
                $data['render_block_container'] =  $this->load->view('formbuilder/fields/render_front/type_divider', $data, true);
                $data['render_extraclass1'] = 'rockfm-divider ';
                 
                 $output = $this->load->view('formbuilder/fields/render_front/block_main', $data, true);
               break;
            default:
               
            break;
        }
        
        return $output;
    }

    /**
     * Fields::formhtml()
     * 
     * @return 
     */
    public function preview_fields() {
        $data = array();
        echo $this->load->view('formbuilder/fields/preview_fields', $data, true);
    }

    /**
     * Fields::formhtml()
     * 
     * @return 
     */
    public function generate_templates_fields() {
        $data = array();
        $data['id_field'] = '';
        $data['quick_options'] = $this->load->view('formbuilder/fields/templates/prevpanel_quickopts', $data, true);
        $data['uiform_grid_two'] = $this->load->view('formbuilder/fields/templates/prevpanel_textbox', $data, true);
        $data['uiform_textbox'] = $this->load->view('formbuilder/fields/templates/prevpanel_textbox', $data, true);
        $content = $this->load->view('formbuilder/fields/templates/prevpanel_main', $data, true);

        $pathfile = APPPATH . '/modules/formbuilder/views/fields/templates/testing_file.php';
        $fh = fopen($pathfile, "w");

        if (fwrite($fh, $content)) {
            return true;
        }
        fclose($fh);
    }
    
      /**
     * Generate grid system css
     * 
     * @return string
     */
    public function posthtml_gridsystem_css($data) {

        $str_output_2 = '';

        foreach ($data as $key => $value) {

            //$key -> main or blocks
            if (!empty($value) && is_array($value)) {

                if ((string) $key === "main") {
                    //send info of main
                    $str_output_2 .= $this->posthtml_gridsystem_css_block($data['id'], 0, $value);
                } else {

                    foreach ($value as $key2 => $value2) {
                        //$key2 -> skin or index
                        if (is_array($value2)) {
                            $str_output_2 .= $this->posthtml_gridsystem_css_block($data['id'], $key2, $value2);
                        }
                    }
                }
            }
        }


        return $str_output_2;
    }
    
     /**
     * Generate grid system blocks
     * 
     * @return string
     */
    public function posthtml_gridsystem_css_block($id, $block, $data) {

        $data2 = array();
        if (intval($block) === 0) {
            $data2['id_str'] = '#zgfb_' . $id . ' > .sfdc-container-fluid';
        } else {
            $data2['id_str'] = '#zgfb_' . $id . ' > .sfdc-container-fluid > .sfdc-row > .zgpb-fl-gs-block-style[data-zgpb-blocknum="' . $block . '"] >.zgpb-fl-gs-block-inner';
        }
        $data2['skin'] = isset($data['skin'])?$data['skin']:array();

        return $this->load->view('formbuilder/fields/posthtml_gridsystem_css', $data2, true);
    }
    

}
