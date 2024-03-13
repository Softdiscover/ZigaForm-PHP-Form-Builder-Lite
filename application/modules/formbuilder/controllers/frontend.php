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
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
if ( ! defined('BASEPATH')) {
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
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
class Frontend extends FrontendController
{

    const VERSION = '1.2';

    private $flag_submitted    = 0;
    private $form_response     = array();
    private $form_rec_msg_summ = '';
    private $form_email_err    = array();
    private $current_form_id = '';

    const PREFIX = 'wprofmr_';

    /**
     * Frontend::__construct()
     *
     * @return
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_fields');
        $this->load->model('model_forms');
        $this->load->model('model_record');
        $this->load->model('visitor/model_visitor');
        $this->load->library('cache');

           /*shortcodes*/
        add_shortcode('uifm_wrap', array( &$this, 'shortcode_uifm_recvar_wrap' ));
        add_shortcode('uifm_recvar', array( &$this, 'shortcode_uifm_recvar' ));
        add_shortcode('zgfm_rfvar', array( &$this, 'shortcode_uifm_recfvar' ));
        add_shortcode('uifm_var', array( &$this, 'shortcode_uifm_form_var' ));

        /*shortcode calc*/
        add_shortcode('zgfm_fvar', array( &$this, 'shortcode_uifm_form_fvar' ));

        // check update
        $this->auth->checkupdate();
    }




    /**
     * Frontend::index()
     * Get all fields information by form id
     *
     * @return array
     */
    public function index()
    {

        $form_id = ( $this->input->get('form') ) ? $this->input->get('form') : 0;
        $website = 'cmsest';
        $ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        if ( ! isset($_COOKIE[ $website ])) {
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
            $hash       = hash('crc32', md5($ip . $user_agent));
            setcookie($website, $hash, time() + ( 60 * 60 * 24 * 30 ), '/');
        } else {
            $hash = $_COOKIE[ $website ];
        }
        $agent   = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        // visitor data
        /*
        $data3 = array();
        $data3['vis_uniqueid'] = $hash;
        $data3['vis_user_agent'] = $agent;
        $data3['vis_page'] = $_SERVER['REQUEST_URI'];
        $data3['vis_referer'] = $referer;
        $data3['vis_ip'] = $_SERVER['REMOTE_ADDR'];
        $this->db->set($data3);
        $this->db->insert($this->model_visitor->table);*/

        $data = array();
        if ( $form_id == 0) {
            $rdata = $this->model_forms->getFormDefault();
            if ( empty($rdata)) {
                $forms = $this->model_forms->getListActiveForms();
                if ( ! empty($forms)) {
                    foreach ( $forms as $value) {
                        $rdata = $this->model_forms->getFormById($value->fmb_id);
                        break 1;
                    }
                }
            }
        } else {
            $rdata = $this->model_forms->getFormById($form_id);
        }

        if ( ! empty($rdata)) {
            $data                 = array();
            $data['html_content'] = $rdata->fmb_html;
            $data['forms']        = $this->model_forms->getListActiveForms();

            $data['uniqueid'] = $hash;

            // get data from form
            $form_data        = $this->model_forms->getFormById_2($rdata->fmb_id);
            $form_data_onsubm = json_decode($form_data->fmb_data2, true);

            $preload_noconflict = ( isset($form_data_onsubm['main']['preload_noconflict']) ) ? $form_data_onsubm['main']['preload_noconflict'] : '1';

            $temp             = array();
            $temp['id_form']  = $rdata->fmb_id;
            $temp['site_url'] = site_url();
            $temp['base_url'] = base_url();

            $temp['preload_noconflict'] = $preload_noconflict;

            $data['script'] = $this->load->view('formbuilder/forms/get_code_widget', $temp, true);

            $message = ( $this->input->get('message') ) ? $this->input->get('message') : '';
            if ( ! empty($message)) {
                switch ( $message) {
                    case 'ppsuccess':
                        $data['message'] = __('paypal success message', 'FRocket_admin');
                        break;
                    case 'pperror':
                        $data['message'] = __('error found while submitting', 'FRocket_admin');
                        break;
                    case 'offlinesuccess':
                        $data['message'] = __('Offline success', 'FRocket_admin');
                        break;
                    default:
                        break;
                }
            }
        }

        $this->template->loadPartial('frontend/layout', 'frontend/index', $data);
    }


    /*
     * Generate cached form
     */
    public function generate_cache($form_id)
    {

        $this->auth->authenticate(true);

        $output            = array();
        $output['scripts'] = '';
        $output['html']    = '';

        if ( intval($form_id) === 0) {
            return $output;
        }

        $rdata = $this->model_forms->getFormById($form_id);

        $response         = array();
        $form_data_onsubm = json_decode($rdata->fmb_data2, true);
         $onload_scroll   = ( isset($form_data_onsubm['main']['onload_scroll']) ) ? $form_data_onsubm['main']['onload_scroll'] : '1';

            $preload_noconflict = ( isset($form_data_onsubm['main']['preload_noconflict']) ) ? $form_data_onsubm['main']['preload_noconflict'] : '1';

          // load form variables
            $form_variables                        = array();
            $form_variables['_uifmvar']['addon']   = self::$_addons_jsactions;
            $form_variables['_uifmvar']['is_demo'] = 0;
            $form_variables['_uifmvar']['is_dev']  = 0;
            $form_variables['onload_scroll']       = $onload_scroll;
            $form_variables['preload_noconflict']  = $preload_noconflict;
            $enqueue_scripts                       = do_filter('zgfm_front_enqueue_scripts', array());

            $data_scripts = array();
            $data_styles  = array();
        if ( ! empty($enqueue_scripts) && is_array($enqueue_scripts)) {
            foreach ( $enqueue_scripts as $key => $value) {
                if ( ! empty($value) && is_array($value)) {
                    foreach ( $value as $key2 => $value2) {
                        if ( ! empty($value2) && is_array($value2)) {
                            foreach ( $value2 as $key3 => $value3) {
                                switch ( strval($key3)) {
                                    case 'scripts':
                                        foreach ( $value3 as $key4 => $value4) {
                                            $data_scripts[] = $value4['src'];
                                        }
                                        break;
                                    case 'styles':
                                        foreach ( $value3 as $key4 => $value4) {
                                            $data_styles[] = $value4['src'];
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                    }
                }
            }
        }
            $data_scripts                       = array_unique($data_scripts);
            $data_styles                        = array_unique($data_styles);
            $response['site_url']               = site_url();
            $response['base_url']               = base_url();
            $response['id_form']                = $form_id;
            $response['scripts']                = $data_scripts;
            $response['styles']                 = $data_styles;
            $form_variables['ajaxurl']          = '';
            $form_variables['uifm_baseurl']     = base_url();
            $form_variables['uifm_siteurl']     = site_url();
            $form_variables['uifm_sfm_baseurl'] = base_url() . 'libs/styles-font-menu/styles-fonts/png/';
            $form_variables['imagesurl']        = base_url() . 'assets/frontend/images';
            $response['rockfm_vars_arr']        = $form_variables;

        if ( ! empty($rdata)) {
            $response['html_content'] = do_shortcode($rdata->fmb_html);
        }

        $output['scripts'] = $this->load->view('formbuilder/forms/get_code_cached_scripts', $response, true);
        $output['html']    = $this->load->view('formbuilder/forms/get_code_cached_html', $response, true);

        return $output;
    }


    /**
     * Frontend::getform()
     * Get form by form id
     *
     * @return array
     */
    public function getform()
    {

        $form_id = ( $this->input->post('id') ) ? Uiform_Form_Helper::sanitizeInput($this->input->post('id')) : 0;

        $website = 'uiform';
        $ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        if ( ! isset($_COOKIE[ $website ])) {
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
            $hash       = hash('crc32', md5($ip . $user_agent));
            setcookie($website, $hash, time() + ( 60 * 60 * 24 * 30 ), '/');
        } else {
            $hash = $_COOKIE[ $website ];
        }
        $agent   = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        // visitor data
        /*
        $data3 = array();
        $data3['vis_uniqueid'] = $hash;
        $data3['vis_user_agent'] = $agent;
        $data3['vis_page'] = $_SERVER['REQUEST_URI'];
        $data3['vis_referer'] = $referer;
        $data3['vis_ip'] = $_SERVER['REMOTE_ADDR'];
        $this->db->set($data3);
        $this->db->insert($this->model_visitor->table);*/

        $data     = array();
        $response = array();
        if ( intval($form_id) === 0) {
            return;
        }

        $rdata = $this->model_forms->getAvailableFormById($form_id);
        if ( empty($rdata)) {
            $response['success'] = '0';
            $response['html_content'] = '';
        } else {
            $form_data_onsubm = json_decode($rdata->fmb_data2, true);
            $onload_scroll   = ( isset($form_data_onsubm['main']['onload_scroll']) ) ? $form_data_onsubm['main']['onload_scroll'] : '1';

            $preload_noconflict = ( isset($form_data_onsubm['main']['preload_noconflict']) ) ? $form_data_onsubm['main']['preload_noconflict'] : '1';

            // load form variables
            $form_variables                        = array();
            $form_variables['_uifmvar']['addon']   = self::$_addons_jsactions;
            $form_variables['_uifmvar']['is_demo'] = 0;
            $form_variables['_uifmvar']['is_dev']  = 0;
            $form_variables['onload_scroll']       = $onload_scroll;
            $form_variables['preload_noconflict']  = $preload_noconflict;
            $form_variables['enqueue_scripts']     = do_filter('zgfm_front_enqueue_scripts', array());
            $form_variables['ajaxurl']             = '';
            $form_variables['uifm_baseurl']        = base_url();
            $form_variables['uifm_siteurl']        = site_url();
            $form_variables['uifm_sfm_baseurl']    = base_url() . 'libs/styles-font-menu/styles-fonts/png/';
            $form_variables['imagesurl']           = base_url() . 'assets/frontend/images';
            $response['rockfm_vars_arr']           = $form_variables;

            if ( ! empty($rdata)) {
                $response['success'] = '1';
                $response['html_content'] = Uiform_Form_Helper::encodeHex(do_shortcode($rdata->fmb_html));
            }
        }

        $data         = array();
        $data['json'] = $response;

        $this->load->view('html_view', $data);
    }

    public function get_summaryRecord($id_rec)
    {

        $form_id = ( isset($_POST['form_id']) ) ? Uiform_Form_Helper::sanitizeInput($_POST['form_id']) : '';

        $name_fields   = $this->model_record->getNameField($id_rec);
        $form_rec_data = $this->model_record->getFormDataById($id_rec);

        $form_data = json_decode($form_rec_data->fmb_data, true);

         $name_fields_check = array();
        foreach ( $name_fields as $value) {
            $name_fields_check[ $value->fmf_uniqueid ] = $value->fieldname;
        }
        $data_record     = $this->model_record->getRecordById($id_rec);
        $record_user     = json_decode($data_record->fbh_data, true);
        $new_record_user = array();
        foreach ( $record_user as $key => $value) {
            if ( isset($name_fields_check[ $key ])) {
                $key = $name_fields_check[ $key ];
            }
             $value['label'] = ( isset($value['label']) ) ? $value['label'] : 'not assigned';

            switch ( intval($value['type'])) {
                case 9:
                case 11:
                    $new_record_user[] = array(
                        'field' => $value['label'],
                        'value' => $value['input_value'],
                    );
                    break;
                case 12:
                case 13:
                    $value_new = $value['input'];
                    // checking if image exists
                    if (  !empty($value_new) && @is_array(getimagesize($value_new))) {
                             $value_new = '<img width="100px" src="' . $value_new . '"/>';
                    }

                         $new_record_user[] = array(
                             'field' => $value['label'],
                             'value' => $value_new,
                         );
                    break;
                default:
                      $new_record_user[] = array(
                          'field' => $value['label'],
                          'value' => $value['input'],
                      );
                    break;
            }
        }
        $data = array();

        $data['record_info'] = $new_record_user;

        $form_summary = $this->load->view('formbuilder/frontend/form_summary', $data, true);
        return $form_summary;
    }

    public function shortcode_uifm_recvar_wrap($atts, $content = null)
    {

        $vars = shortcode_atts(
            array(
                'id'   => '',
                'atr1' => 'input',
                'opt'  => '', // quick option
            ),
            $atts
        );

        $result = '';
        $output = '';

        switch ( strval($vars['opt'])) {
            case 'calc':
                break;
            default:
                $f_data = $this->model_record->getFieldDataById($this->flag_submitted, $vars['id']);
                switch (intval($f_data->type)) {
                    case 16:
                    case 17:
                    case 18:
                            $output = $this->model_record->getFieldOptRecord($this->flag_submitted, $f_data->type, $vars['id'], 'input', 'value');
                        break;
                    
                    default:
                        $output = $this->model_record->getFieldOptRecord($this->flag_submitted, $f_data->type, $vars['id'], $vars['atr1']);
                        break;
                }
                
                

                break;
        }

        if ( $output != '' && $output!='0') {
            $result = do_shortcode($content);
        } else {
            $result = '';
        }

         return $result;
    }

    public function shortcode_uifm_recvar($atts)
    {

        $vars = shortcode_atts(
            array(
                'id'   => '',
                'atr1' => 'input',
                'atr2' => '',
                'atr3' => '',
                'atr4' => '',
            ),
            $atts
        );

        $f_data = $this->model_record->getFieldDataById($this->flag_submitted, $vars['id']);

        $output = $this->model_record->getFieldOptRecord($this->flag_submitted, $f_data->type, $vars['id'], $vars['atr1'], $vars['atr2']);

            // apply price format
        switch ( strval($vars['atr3'])) {
            case 'price_format':
                break;
            case 'format':
                switch ( strval($vars['atr4'])) {
                    case 'list':
                        //format to field with multiple options
                        switch ( strval($f_data->type)) {
                            case '9':
                            case '11':
                                $tmpArr = explode('^,^', $output);
                                if ( is_array($tmpArr)) {
                                    $newString = '<ul>';
                                    foreach ( $tmpArr as $key => $value) {
                                            $newString .= '<li>' . $value . '</li>';
                                    }
                                    $newString .= '</ul>';
                                    $output = $newString;
                                }

                                break;

                            default:
                                # code...
                                break;
                        }
                        break;
                    case 'comma':
                            //format to field with multiple options
                        switch ( strval($f_data->type)) {
                            case '9':
                            case '11':
                                $tmpArr = explode('^,^', $output);
                                if ( is_array($tmpArr)) {
                                    $output = str_replace('^,^', ', ', $output);
                                }

                                break;

                            default:
                                # code...
                                break;
                        }
                        break;
                    default:
                        break;
                }

                break;
        }

        if ( $output != '') {
            return $output;
        } else {
            return '';
        }
    }

    public function shortcode_uifm_recfvar($atts)
    {

        $vars = shortcode_atts(
            array(
                'id'   => '',
                'atr1' => 'input',
            ),
            $atts
        );

        switch ( strval($vars['atr1'])) {
            case 'label':
                ob_start();
                ?>
               <span data-zgfm-id="<?php echo $vars['id']; ?>" data-zgfm-type="0" data-zgfm-atr="0" class="zgfm-recfvar-obj"></span>             
                <?php
                $output = ob_get_contents();
                ob_end_clean();
                break;
            case 'input':
                ob_start();
                ?>
               <span data-zgfm-id="<?php echo $vars['id']; ?>" data-zgfm-atr="1" class="zgfm-recfvar-obj"></span>             
                <?php
                $output = ob_get_contents();
                ob_end_clean();
                break;
            case 'amount':
                ob_start();
                ?>
               <span data-zgfm-id="<?php echo $vars['id']; ?>" data-zgfm-atr="2" class="zgfm-recfvar-obj"></span>             
                <?php
                $output = ob_get_contents();
                ob_end_clean();
                break;
            case 'qty':
                ob_start();
                ?>
               <span data-zgfm-id="<?php echo $vars['id']; ?>" data-zgfm-atr="3" class="zgfm-recfvar-obj"></span>             
                <?php
                $output = ob_get_contents();
                ob_end_clean();
                break;
        }

        if ( $output != '') {
            return $output;
        } else {
            return '';
        }
    }

    public function shortcode_uifm_form_fvar($atts)
    {
        $vars   = shortcode_atts(
            array(
                'atr1' => '',
                'atr2' => '',
                'atr3' => '',
                'opt'  => '', // quick option
            ),
            $atts
        );
        $output = '';

        if ( ! empty($vars['opt'])) {
            switch ( (string) $vars['opt']) {
                case 'calc':
                    ob_start();
                    if ( isset($vars['atr1']) && intval($vars['atr1']) >= 0) {
                        ?>
                            <div class="zgfm-f-calc-var-lbl zgfm-f-calc-var<?php echo $vars['atr1']; ?>-lbl"></div>             
                        <?php
                    }
                      $output = ob_get_contents();
                      ob_end_clean();

                    break;
                case 'form_cur_symbol':
                     ob_start();
                    ?>
                       <span class="uiform-stickybox-symbol"></span>
                       <?php
                        $output = ob_get_contents();
                        ob_end_clean();
                    break;
                case 'form_cur_code':
                    ob_start();
                    ?>
                       <span class="uiform-stickybox-currency"></span>
                       <?php
                        $output = ob_get_contents();
                        ob_end_clean();
                    break;
                case 'form_subtotal_amount':
                    ob_start();
                    ?>
                   <span class="uiform-stickybox-subtotal">0</span>
                    <?php

                    $output = ob_get_contents();
                    ob_end_clean();
                    break;
                case 'form_tax_amount':
                    ob_start();

                    ?>
                           <span class="uiform-stickybox-tax">0</span>
                       <?php

                        $output = ob_get_contents();
                        ob_end_clean();
                    break;
                case 'form_total_amount':
                    $output = '<span class="uiform-stickybox-total">0</span>';
                    break;
            }
        }

        if ( $output != '') {
            return $output;
        } else {
            return '';
        }
    }

    public function shortcode_uifm_form_var($atts)
    {

        $vars   = shortcode_atts(
            array(
                'atr1' => '0', // source 0=>fmb_data2; 1=>fmb_data
                'atr2' => '',
                'atr3' => '',
                'atr4' => '',
                'opt'  => '', // quick option
            ),
            $atts
        );
        $output = '';

        $rec_id = $this->flag_submitted;
        $data   = $this->model_record->getFormDataById($rec_id);
        if ( ! empty($vars['opt'])) {
            switch ( (string) $vars['opt']) {
                case 'rec_summ':
                    $tmp_data         = json_decode($data->fbh_data, true);
                    $form_data_onsubm = json_decode($data->fmb_data2, true);

                    $data2         = array();
                    $data2['data'] = $tmp_data;
                    $data2['show_only_value'] = ($vars['atr2'] === 'show_only_value')?'yes':'no';
                    $output        = $this->load->view('formbuilder/frontend/mail_generate_fields', $data2, true);
                    break;
                case 'rec_url_fm':
                     $output = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

                    break;
                case 'form_name':
                    $output = $data->fmb_name;
                    break;
                case 'rec_id':
                    $output = $rec_id;
                    break;
                case 'user_ip':
                    $data   = $this->model_record->getFormDataById($rec_id);
                    $output = $data->created_ip;
                    break;
                default:
            }
        } else {
        }

        // get data from form

        if ( $output != '') {
            return $output;
        } else {
            return '';
        }
    }


    /**
     * Frontend::ajax_submit_ajaxmode()
     *
     * @return
     */
    public function ajax_submit_ajaxmode()
    {
        $resp = array();
        $resp = $this->process_form();

        if ( isset($this->flag_submitted) && intval($this->flag_submitted) > 0) {
            $resp['success']      = ( isset($resp['success']) ) ? $resp['success'] : 0;
            $resp['show_message'] = ( isset($resp['show_message']) ) ? Uiform_Form_Helper::encodeHex(do_shortcode($resp['show_message'])) :
                    '<div class="rockfm-alert rockfm-alert-danger"><i class="fa fa-exclamation-triangle"></i> ' . __('Success! your form was submitted', 'frocket_front') . '</div>';
        } else {
            $resp['success']      = 0;
            $resp['show_message'] = '<div class="rockfm-alert rockfm-alert-danger"><i class="fa fa-exclamation-triangle"></i> ' . __('warning! Form was not submitted', 'frocket_front') . '</div>';
        }

        $data         = array();
        $data['json'] = $resp;

        $this->load->view('html_view', $data);
    }

    /**
     * Frontend::ajax_validate_captcha()
     *
     * @return
     */
    public function ajax_validate_captcha()
    {
        $rockfm_code     = ( isset($_POST['rockfm-code']) ) ? Uiform_Form_Helper::sanitizeInput($_POST['rockfm-code']) : '';
        $rockfm_inpcode  = ( isset($_POST['rockfm-inpcode']) ) ? Uiform_Form_Helper::sanitizeInput($_POST['rockfm-inpcode']) : '';
        $resp            = array();
        $resp['code']    = $rockfm_code;
        $resp['inpcode'] = $rockfm_inpcode;

        if ( ! empty($rockfm_code)) {
            $captcha_key  = 'Rocketform-' . $_SERVER['HTTP_HOST'];
            $captcha_resp = Uiform_Form_Helper::data_decrypt($rockfm_code, $captcha_key);
            $resp['resp'] = $captcha_resp;
            if ( (string) $captcha_resp === (string) ( $rockfm_inpcode )) {
                $resp['success'] = true;
            } else {
                $resp['success'] = false;
            }
        } else {
            $resp['success'] = false;
        }

        // return data to ajax callback
        header('Content-Type: text/html; charset=UTF-8');
        echo json_encode($resp);
        die();
    }

    /**
     * Frontend::ajax_refresh_captcha()
     *
     * @return
     */
    public function ajax_refresh_captcha()
    {
        $rkver = ( isset($_POST['rkver']) ) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['rkver'])) : 0;
        if ( $rkver) {
            $rkver     = Uiform_Form_Helper::base64url_decode(json_decode($rkver));
            $rkver_arr = json_decode($rkver, true);

            $length  = 5;
            $charset = 'abcdefghijklmnpqrstuvwxyz123456789';
            $phrase  = '';
            $chars   = str_split($charset);

            for ( $i = 0; $i < $length; $i++) {
                $phrase .= $chars[ array_rand($chars) ];
            }
            $captcha_data = array();

            if ( isset($rkver_arr['ca_txt_gen'])) {
                $rkver_arr['ca_txt_gen'] = $phrase;
                $captcha_data            = $rkver_arr;
            } else {
                $captcha_data['ca_txt_gen'] = $phrase;
            }
            $captcha_options = Uiform_Form_Helper::base64url_encode(json_encode($captcha_data));
            $resp            = array();
            $resp['rkver']   = $captcha_options;

            /* generate check code */
            $captcha_key  = 'Rocketform-' . $_SERVER['HTTP_HOST'];
            $resp['code'] = Uiform_Form_Helper::data_encrypt($phrase, $captcha_key);

            // return data to ajax callback
            $data         = array();
            $data['json'] = $resp;

            $this->load->view('html_view', $data);
        }
    }

    /**
     * Frontend::ajax_check_recaptcha()
     *
     * @return
     */
    public function ajax_check_recaptcha()
    {

        modules::run('formbuilder/uifmrecaptcha/front_verify_recaptcha', array());
    }
    
    public function ajax_check_recaptchav3()
    {

        modules::run('formbuilder/uifmrecaptcha/front_verify_recaptchav3', array());
    }
    
    /**
     * Frontend::process_form()
     *
     * @return
     */
    public function process_form()
    {
        try {
             // upload an image and document options
            $config                  = array();
            $config['upload_path']   = FCPATH . 'uploads';
            $config['allowed_types'] = 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG|pdf|doc|docx|xls|xlsx|zip|rar';
            $config['max_size']      = '2097152'; // 0 = no file size limit
            $config['overwrite']     = false;
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);

            $form_id               = ( $_POST['_rockfm_form_id'] ) ? Uiform_Form_Helper::sanitizeInput(trim($_POST['_rockfm_form_id'])) : 0;
            $is_demo               = ( $_POST['zgfm_is_demo'] ) ? intval(Uiform_Form_Helper::sanitizeInput(trim($_POST['zgfm_is_demo']))) : 0;
            $this->current_form_id = $form_id;
                $form_fields       = ( isset($_POST['uiform_fields']) && $_POST['uiform_fields'] ) ? array_map(array( 'Uiform_Form_Helper', 'sanitizeRecursive_html' ), $_POST['uiform_fields']) : array();
                $form_avars        = ( isset($_POST['zgfm_avars']) && $_POST['zgfm_avars'] ) ? array_map(array( 'Uiform_Form_Helper', 'sanitizeRecursive_html' ), $_POST['zgfm_avars']) : array();
                $form_f_tmp        = array();
                $form_f_rec_tmp    = array();

                $attachment_status = 0;
                $attachments       = array();  // initialize attachment array
                // get data from form
                $form_data        = $this->model_forms->getFormById_2($form_id);
                $form_data_onsubm = json_decode($form_data->fmb_data2, true);
                $form_data_name   = $form_data->fmb_name;

                // process fields
                $message_fields = '';
                $form_errors    = array();
                $mail_errors    = false;

                // other variables
                $form_f_avar = array();

            if ( ! empty($form_avars)) {
                foreach ( $form_avars as $key => $value) {
                    switch ( strval($key)) {
                        case 'calc':
                            foreach ( $value as $key2 => $value2) {
                                $form_f_avar['calc'][ $key2 ] = $value2;
                            }
                            break;
                        default:
                            break;
                    }
                }
            }

                // fields
            if ( ! empty($form_fields)) {
                foreach ( $form_fields as $key => $value) {
                    $tmp_field_name = $this->model_fields->getFieldNameByUniqueId($key, $form_id);

                    if ( ! isset($tmp_field_name->type)) {
                        $err_output = 'error $key:' . $key . ' - $form_id:' . $form_id;
                        if ( UIFORM_DEBUG === 1) {
                            $err_output .= ' - Last query: ' . htmlentities($this->db->last_query(), ENT_NOQUOTES, 'UTF-8');
                        }

                        throw new Exception($err_output);
                    }

                    /*for validation only*/
                    switch ( intval($tmp_field_name->type)) {
                        case 6:
                            /*textbox*/
                        case 28:
                        case 29:
                        case 30:
                            $tmp_fdata = json_decode($tmp_field_name->data, true);
                            if ( isset($tmp_fdata['validate']) && isset($tmp_fdata['validate']['typ_val']) && intval($tmp_fdata['validate']['typ_val']) === 4) {
                                // $mail_replyto=$value;
                            }
                            break;
                    }

                    /*storing to main array*/

                    switch ( intval($tmp_field_name->type)) {
                        case 9:
                            /*checkbox*/
                        case 11:
                            /*multiselect*/
                            $tmp_fdata = json_decode($tmp_field_name->data, true);

                            $tmp_options                     = array();
                            $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                            $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                            $tmp_f_values = array();

                            $tmp_inp_label = array();
                            $tmp_inp_value = array();

                            if ( is_array($value)) {
                                // for records
                                $tmp_options_rec = array();
                                foreach ( $value as $key2 => $value2) {
                                    $tmp_options_row          = array();
                                    $tmp_options_row['label'] = isset($tmp_fdata['input2']['options'][ $value2 ]['label']) ? $tmp_fdata['input2']['options'][ $value2 ]['label'] : '';
                                    $tmp_options_row['value'] = isset($tmp_fdata['input2']['options'][ $value2 ]['value']) ? $tmp_fdata['input2']['options'][ $value2 ]['value'] : '';
                                    $tmp_options_rec[]        = $tmp_options_row['value'];
                                    $tmp_f_values[]           = $value2;
                                }
                                $form_f_rec_tmp[ $key ] = implode('^,^', $tmp_options_rec);
                                // end for records

                                foreach ( $value as $key2 => $value2) {
                                    $tmp_options_row          = array();
                                    $tmp_options_row['label'] = isset($tmp_fdata['input2']['options'][ $value2 ]['label']) ? $tmp_fdata['input2']['options'][ $value2 ]['label'] : '';
                                    $tmp_options_row['value'] = isset($tmp_fdata['input2']['options'][ $value2 ]['value']) ? $tmp_fdata['input2']['options'][ $value2 ]['value'] : '';

                                    // store label
                                    $tmp_inp_label[] = $tmp_options_row['label'];
                                    $tmp_inp_value[] = $tmp_options_row['value'];

                                    if ( isset($tmp_fdata['input2']['options'][ $value2 ]) && $tmp_fdata['input2']['options'][ $value2 ]) {
                                        $tmp_options[ $value2 ] = $tmp_options_row;
                                    }
                                }
                            }

                            $form_f_tmp[ $key ]['input_label'] = implode('^,^', $tmp_inp_label);
                            $form_f_tmp[ $key ]['input_value'] = implode('^,^', $tmp_inp_value);

                            $form_f_tmp[ $key ]['chosen'] = implode(',', $tmp_f_values);
                            /*saving data to field array*/
                            $form_f_tmp[ $key ]['input'] = $tmp_options;

                            break;
                        case 8:
                                    /*radiobutton*/
                        case 10:
                             /*select*/

                             $tmp_fdata = json_decode($tmp_field_name->data, true);

                             $tmp_options                     = array();
                             $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                             $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                             $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                             $form_f_tmp[ $key ]['label']     = $tmp_field_label;
                             $form_f_tmp[ $key ]['chosen']    = implode(',', array( $value ));

                            // foreach ($value as $key2=>$value2) {
                                 $tmp_options_row          = array();
                                 $tmp_options_row['label'] = isset($tmp_fdata['input2']['options'][ $value ]['label']) ? $tmp_fdata['input2']['options'][ $value ]['label'] : '';
                                 $tmp_options_row['value'] = isset($tmp_fdata['input2']['options'][ $value ]['value']) ? $tmp_fdata['input2']['options'][ $value ]['value'] : '';
                                 // for records
                                 $form_f_rec_tmp[ $key ] = $tmp_options_row['label'];

                            if ( isset($tmp_fdata['input2']['options'][ $value ])) {
                                $tmp_options[ $value ] = $tmp_options_row;
                            }
                               // }
                             $form_f_tmp[ $key ]['input_label'] = $tmp_options_row['label'];
                             $form_f_tmp[ $key ]['input_value'] = $tmp_options_row['value'];
                             /*saving data to field array*/
                             $form_f_tmp[ $key ]['input'] = $tmp_options;

                            break;
                        case 12:
                            /* file input field */
                        case 13:
                            /*
                            image upload */
                            /* file input field */

                            $tmp_fdata = json_decode($tmp_field_name->data, true);

                            $tmp_options     = array();
                            $tmp_field_label = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;

                            $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                            $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                            $allowedext_default = array( 'aaaa', 'png', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'txt', 'rtf', 'zip', 'mp3', 'wma', 'wmv', 'mpg', 'flv', 'avi', 'jpg', 'jpeg', 'png', 'gif', 'ods', 'rar', 'ppt', 'tif', 'wav', 'mov', 'psd', 'eps', 'sit', 'sitx', 'cdr', 'ai', 'mp4', 'm4a', 'bmp', 'pps', 'aif', 'pdf' );
                            $custom_allowedext  = ( ! empty($tmp_fdata['input16']['extallowed']) ) ? array_map('trim', explode(',', $tmp_fdata['input16']['extallowed'])) : $allowedext_default;
                            $custom_maxsize     = ( ! empty($tmp_fdata['input16']['maxsize']) ) ? floatval($tmp_fdata['input16']['maxsize']) : 5;
                            $custom_attach_st   = ( isset($tmp_fdata['input16']['attach_st']) ) ? intval($tmp_fdata['input16']['attach_st']) : 0;

                            if ( isset($_FILES['uiform_fields']['name'][ $key ])
                                && ! empty($_FILES['uiform_fields']['name'][ $key ])) {
                                    $fileSize = $_FILES['uiform_fields']['size'][ $key ];
                                if ( floatval($fileSize) > $custom_maxsize * 1024 * 1024) {
                                    $form_errors[] = __('Error! The file exceeds the allowed size of', 'frocket_front') . ' ' . $custom_maxsize . ' MB';
                                }
                                    /* find attachment max size found */
                                    $attachment_status = ( $attachment_status < $custom_attach_st ) ? $custom_attach_st : $attachment_status;

                                    $ext = strtolower(substr($_FILES['uiform_fields']['name'][ $key ], strrpos($_FILES['uiform_fields']['name'][ $key ], '.') + 1));
                                if ( ! in_array($ext, $custom_allowedext)) {
                                    $form_errors[] = __('Error! Type of file is not allowed to upload', 'frocket_front');
                                }
                                if ( empty($form_errors)) {
                                    $config['allowed_types'] = '*';
                                    $config['max_size']      = $custom_maxsize * 1024 * 1024; // 0 = no file size limit
                                    $this->upload->initialize($config);

                                    $rename = 'file_' . md5(uniqid($_FILES['uiform_fields']['name'][ $key ], true));

                                    $_FILES['uiform_fields']['name'][ $key ] = $rename . '.' . strtolower($ext);

                                    // attachment

                                    if ( ! $this->upload->do_upload2($key)) {
                                        $form_errors[] = __('Error! File not uploaded - ' . $this->upload->display_errors('<span>', '</span>'), 'frocket_front');
                                    } else {
                                        $data_upload_files = $this->upload->data();
                                        $image             = base_url() . 'uploads/' . $data_upload_files['file_name'];
                                        // getting image uploaed
                                        if ( intval($custom_attach_st) === 1) {
                                            $attachments[] = $data_upload_files['file_path'] . $data_upload_files['file_name'];
                                        }

                                        $form_f_tmp[ $key ]['input'] = $image;
                                        $form_f_rec_tmp[ $key ]      = $image;
                                        $form_fields[ $key ]         = $image;
                                    }
                                }
                            } else {
                                unset($form_fields[ $key ]);
                                    $form_f_tmp[ $key ]['input'] = '';
                                    $form_f_rec_tmp[ $key ]      = '';
                            }
                            break;
                        case 16:
                            /*slider*/
                        case 18:
                            /*spinner*/
                            $tmp_fdata = json_decode($tmp_field_name->data, true);

                            $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                            $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                            // foreach ($value as $key2=>$value2) {
                                $tmp_options_row             = array();
                                $tmp_options_row['qty']      = floatval($value);
                                   $tmp_options_row['label'] = floatval($value);

                                   // for records
                                   $form_f_rec_tmp[ $key ] = $value;

                            // }
                            /*saving data to field array*/
                            $form_f_tmp[ $key ]['input'] = $tmp_options_row;

                            break;
                        case 40:
                            /*switch*/
                            $tmp_fdata = json_decode($tmp_field_name->data, true);

                            $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                            $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                            $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                            // foreach ($value as $key2=>$value2) {
                                $tmp_options_row = array();

                            if ( $value === 'on') {
                                $tmp_options_row['label'] = ( ! empty($tmp_fdata['input15']['txt_yes']) ) ? $tmp_fdata['input15']['txt_yes'] : $value;
                                $form_f_rec_tmp[ $key ]   = 1;
                            } else {
                                $tmp_options_row['label'] = ( ! empty($tmp_fdata['input15']['txt_no']) ) ? $tmp_fdata['input15']['txt_no'] : $value;
                                $form_f_rec_tmp[ $key ]   = 0;
                            }

                            // }
                            /*saving data to field array*/
                            $form_f_tmp[ $key ]['input'] = $tmp_options_row;

                            break;
                        case 41:
                            /*dyn checkbox*/
                        case 42:
                            /*dyn radiobtn*/
                                $tmp_fdata                       = json_decode($tmp_field_name->data, true);
                                $tmp_options                     = array();
                                $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                                $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                                $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                                $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                                // for records
                                $tmp_summary = array();

                            foreach ( $value as $key2 => $value2) {
                                $tmp_summary_inner = '';

                                if ( isset($tmp_fdata['input17']['options'][ $key2 ]['label'])) {
                                    $tmp_summary_inner .= $tmp_fdata['input17']['options'][ $key2 ]['label'];
                                }

                                if ( intval($value2) > 1) {
                                    $tmp_summary_inner .= ' - qty: ' . $value2;
                                }
                                $tmp_summary[] = $tmp_summary_inner;
                            }

                                $form_f_rec_tmp[ $key ] = implode('^,^', $tmp_summary);
                                // end for records

                            foreach ( $value as $key2 => $value2) {
                                $tmp_options_row          = array();
                                $tmp_options_row['label'] = $tmp_fdata['input17']['options'][ $key2 ]['label'];

                                if ( $tmp_fdata['input17']['options'][ $key2 ]) {
                                    $tmp_options_row['qty'] = $value2;
                                }

                                $tmp_options[] = $tmp_options_row;
                            }
                                /*saving data to field array*/
                                $form_f_tmp[ $key ]['input'] = $tmp_options;

                            break;
                        default:
                             $tmp_fdata                       = json_decode($tmp_field_name->data, true);
                             $tmp_field_label                 = ( ! empty($tmp_fdata['label']['text']) ) ? $tmp_fdata['label']['text'] : $tmp_field_name->fieldname;
                             $form_f_tmp[ $key ]['type']      = $tmp_field_name->type;
                             $form_f_tmp[ $key ]['fieldname'] = $tmp_field_name->fieldname;
                             $form_f_tmp[ $key ]['label']     = $tmp_field_label;

                            if ( is_array($value)) {
                                $tmp_options = array();
                                foreach ( $value as $value2) {
                                    $tmp_options[] = $value2;
                                }
                                $form_f_tmp[ $key ]['input'] = implode('^,^', $tmp_options);
                                // for records
                                $form_f_rec_tmp[ $key ] = implode('^,^', $tmp_options);
                            } else {
                                 $form_f_tmp[ $key ]['input'] = $value;
                                 // for records
                                 $form_f_rec_tmp[ $key ] = $value;
                            }

                            break;
                    }
                }
            }

            if ( count($form_errors) > 0) {
                $data                = array();
                $data['success']     = 0;
                $data['form_errors'] = count($form_errors);
                $tmp_err_msg         = '<ul>';
                foreach ( $form_errors as $value_er) {
                    $tmp_err_msg .= '<li>' . $value_er . '</li>';
                }
                    $tmp_err_msg           .= '</ul>';
                    $tmp_err_msg            = Uiform_Form_Helper::assign_alert_container($tmp_err_msg, 4);
                    $data['form_error_msg'] = $tmp_err_msg;
                    $this->form_response    = $data;
                    $data['form_error_msg'] = Uiform_Form_Helper::encodeHex($data['form_error_msg']);
                    return $data;
            }

                // generate mail html part
                //$this->form_rec_msg_summ = $this->load->view( 'formbuilder/frontend/mail_generate_fields', array( 'data' => $form_f_tmp ), true );

                // ending form process

                // save to form records
                $agent   = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
                $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

                 $form_f_rec_tmp = $this->process_DataRecord($form_f_tmp, $form_f_rec_tmp);

                $data                     = array();
                $data['fbh_data']         = json_encode($form_f_tmp);
                $data['fbh_data_rec']     = json_encode($form_f_rec_tmp);
                $data['created_ip']       = $_SERVER['REMOTE_ADDR'];
                $data['form_fmb_id']      = $form_id;
                $data['fbh_data_rec_xml'] = Uiform_Form_Helper::array2xml($form_f_rec_tmp);
                $data['fbh_user_agent']   = $agent;
                $data['fbh_page']         = $_SERVER['REQUEST_URI'];
                $data['fbh_referer']      = $referer;

                // generate uniqueid
            if ( ! isset($_COOKIE['uiform_fbuilder'])) {
                $ip         = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
                $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
                $hash       = hash('crc32', md5($ip . $user_agent));
                setcookie('uiform_fbuilder', $hash, time() + ( 60 * 60 * 24 * 30 ), '/');
            } else {
                $hash = $_COOKIE['uiform_fbuilder'];
            }

                // $data['vis_uniqueid'] = $hash;

                $this->db->set($data);
                $this->db->insert($this->model_record->table);

                $idActivate     = $this->db->insert_id();
                $json           = array();
                $json['status'] = 'created';
                $json['id']     = $idActivate;

                $this->flag_submitted          = $idActivate;
                self::$_form_data['form_id']   = $form_id;
                self::$_form_data['record_id'] = $idActivate;
                 // preparing mail

                // $this->load->library('email', emailConfiguration(intval(model_settings::$db_config['type_email'])));

                // is demo
            if ( $is_demo === 0) {
                $mail_from_email = ( isset($form_data_onsubm['onsubm']['mail_from_email']) ) ? $form_data_onsubm['onsubm']['mail_from_email'] : '';
                $mail_from_name  = ( isset($form_data_onsubm['onsubm']['mail_from_name']) ) ? $form_data_onsubm['onsubm']['mail_from_name'] : '';

                $mail_html_wholecont = isset($form_data_onsubm['main']['email_html_fullpage']) ? $form_data_onsubm['main']['email_html_fullpage'] : '0';
                $mail_pdf_wholecont  = isset($form_data_onsubm['main']['pdf_html_fullpage']) ? $form_data_onsubm['main']['pdf_html_fullpage'] : '0';

                // admin
                // mail template
                $mail_template_msg = ( isset($form_data_onsubm['onsubm']['mail_template_msg']) ) ? urldecode($form_data_onsubm['onsubm']['mail_template_msg']) : '';
                $mail_template_msg = do_shortcode($mail_template_msg);
                $mail_template_msg = html_entity_decode($mail_template_msg, ENT_QUOTES, 'UTF-8');
                $mail_template_msg = $this->load->view(
                    'formbuilder/frontend/mail_global_template',
                    array(
                        'content'        => $mail_template_msg,
                        'html_wholecont' => $mail_html_wholecont,
                    ),
                    true
                );

                $email_recipient = ( isset($form_data_onsubm['onsubm']['mail_recipient']) ) ? $form_data_onsubm['onsubm']['mail_recipient'] : model_settings::$db_config['admin_mail'];
                $email_cc        = ( isset($form_data_onsubm['onsubm']['mail_cc']) ) ? $form_data_onsubm['onsubm']['mail_cc'] : '';
                $email_bcc       = ( isset($form_data_onsubm['onsubm']['mail_bcc']) ) ? $form_data_onsubm['onsubm']['mail_bcc'] : '';
                $mail_subject    = ( isset($form_data_onsubm['onsubm']['mail_subject']) ) ? do_shortcode($form_data_onsubm['onsubm']['mail_subject']) : __('New form request', 'frocket_front');

                $mail_usr_recipient = ( isset($form_data_onsubm['onsubm']['mail_usr_recipient']) ) ? $form_data_onsubm['onsubm']['mail_usr_recipient'] : '';
                $mail_replyto       = ( isset($form_data_onsubm['onsubm']['mail_replyto']) ) ? $form_data_onsubm['onsubm']['mail_replyto'] : '';

                $data_mail                = array();
                $data_mail['from_mail']   = html_entity_decode(do_shortcode($mail_from_email));
                $data_mail['from_name']   = html_entity_decode(do_shortcode($mail_from_name));
                $data_mail['message']     = $mail_template_msg;
                $data_mail['subject']     = html_entity_decode($mail_subject);
                $data_mail['attachments'] = $attachments;
                $data_mail['to']          = trim($email_recipient);
                $data_mail['cc']          = array_map('trim', explode(',', $email_cc));
                $data_mail['bcc']         = array_map('trim', explode(',', $email_bcc));

                $tmp_replyto = $this->model_record->getFieldOptRecord($idActivate, '', $mail_replyto, 'input');
                if ( ! empty($tmp_replyto)) {
                    $data_mail['mail_replyto'] = $tmp_replyto;
                }

                if ( isset($form_data_onsubm['main']['email_dissubm']) && intval($form_data_onsubm['main']['email_dissubm']) === 1) {
                    $mail_errors = false;
                } else {
                    $mail_errors = $this->process_mail($data_mail);
                }

                // customer
                // mail template
                $mail_usr_st = ( isset($form_data_onsubm['onsubm']['mail_usr_st']) ) ? $form_data_onsubm['onsubm']['mail_usr_st'] : '0';
                if ( intval($mail_usr_st) === 1) {
                    $mail_template_msg = ( isset($form_data_onsubm['onsubm']['mail_usr_template_msg']) ) ? urldecode($form_data_onsubm['onsubm']['mail_usr_template_msg']) : '';
                    $mail_template_msg = do_shortcode($mail_template_msg);
                    $mail_template_msg = html_entity_decode($mail_template_msg, ENT_QUOTES, 'UTF-8');
                    $mail_template_msg = $this->load->view(
                        'formbuilder/frontend/mail_global_template',
                        array(
                            'content'        => $mail_template_msg,
                            'html_wholecont' => $mail_html_wholecont,
                        ),
                        true
                    );

                    $mail_usr_cc      = ( isset($form_data_onsubm['onsubm']['mail_usr_cc']) ) ? $form_data_onsubm['onsubm']['mail_usr_cc'] : '';
                    $mail_usr_bcc     = ( isset($form_data_onsubm['onsubm']['mail_usr_bcc']) ) ? $form_data_onsubm['onsubm']['mail_usr_bcc'] : '';
                    $mail_usr_replyto = ( isset($form_data_onsubm['onsubm']['mail_usr_replyto']) ) ? $form_data_onsubm['onsubm']['mail_usr_replyto'] : '';
                    $mail_usr_subject = ( isset($form_data_onsubm['onsubm']['mail_usr_subject']) ) ? do_shortcode($form_data_onsubm['onsubm']['mail_usr_subject']) : __('New form request', 'frocket_front');

                    $mail_usr_pdf_st = ( isset($form_data_onsubm['onsubm']['mail_usr_pdf_st']) ) ? $form_data_onsubm['onsubm']['mail_usr_pdf_st'] : '0';
                    if ( intval($mail_usr_pdf_st) === 1) {
                        $data_mail                              = array();
                        $mail_template_msg_pdf                  = ( isset($form_data_onsubm['onsubm']['mail_usr_pdf_template_msg']) ) ? urldecode($form_data_onsubm['onsubm']['mail_usr_pdf_template_msg']) : '';
                        $mail_template_msg_pdf                  = do_shortcode($mail_template_msg_pdf);
                        $data_mail['mail_usr_pdf_template_msg'] = $mail_template_msg_pdf;
                        $mail_pdf_fn                            = ( isset($form_data_onsubm['onsubm']['mail_usr_pdf_fn']) ) ? urldecode($form_data_onsubm['onsubm']['mail_usr_pdf_fn']) : '';
                        $mail_pdf_fn                            = do_shortcode($mail_pdf_fn);
                        $data_mail['mail_usr_pdf_fn']           = $mail_pdf_fn;
                        $data_mail['html_wholecont']            = $mail_pdf_wholecont;
                        $data_mail['rec_id']                    = $idActivate;
                        $data_mail['is_html']                   = 0;

                        $data_mail['charset']        = ( isset($form_data_onsubm['main']['pdf_charset']) ) ? $form_data_onsubm['main']['pdf_charset'] : '';
                        $data_mail['font']           = ( isset($form_data_onsubm['main']['pdf_font']) ) ? urldecode($form_data_onsubm['main']['pdf_font']) : '';
                        $data_mail['pdf_paper_size'] = ( isset($form_data_onsubm['main']['pdf_paper_size']) ) ? $form_data_onsubm['main']['pdf_paper_size'] : 'a4';
                        $data_mail['pdf_paper_orie'] = ( isset($form_data_onsubm['main']['pdf_paper_orie']) ) ? $form_data_onsubm['main']['pdf_paper_orie'] : 'landscape';

                        // $mail_pdf_font = (isset($form_data_onsubm['onsubm']['mail_usr_pdf_font'])) ? urldecode($form_data_onsubm['onsubm']['mail_usr_pdf_font']) : '';
                        // $data_mail['mail_usr_pdf_font']=$mail_pdf_font;
                        // $data_mail['mail_usr_pdf_charset']=(isset($form_data_onsubm['onsubm']['mail_usr_pdf_charset'])) ? $form_data_onsubm['onsubm']['mail_usr_pdf_charset'] : '';
                        $attachments[] = $this->process_custom_pdf($data_mail);
                    }

                    $data_mail                = array();
                    $data_mail['from_mail']   = html_entity_decode(do_shortcode($mail_from_email));
                    $data_mail['from_name']   = html_entity_decode(do_shortcode($mail_from_name));
                    $data_mail['message']     = $mail_template_msg;
                    $data_mail['subject']     = html_entity_decode(do_shortcode($mail_usr_subject));
                    $data_mail['attachments'] = $attachments;

                    $data_mail['to']  = $this->model_record->getFieldOptRecord($idActivate, '', $mail_usr_recipient, 'input');
                    $data_mail['cc']  = array_map('trim', explode(',', $mail_usr_cc));
                    $data_mail['bcc'] = array_map('trim', explode(',', $mail_usr_bcc));
                    if ( ! empty($mail_usr_replyto)) {
                        $data_mail['mail_replyto'] = $mail_usr_replyto;
                    }
                    if ( isset($form_data_onsubm['main']['email_dissubm']) && intval($form_data_onsubm['main']['email_dissubm']) === 1) {
                        $mail_errors = false;
                    } else {
                        $mail_errors = $this->process_mail($data_mail);
                    }
                }
            }
                // success message

                $tmp_sm_successtext = ( isset($form_data_onsubm['onsubm']['sm_successtext']) ) ? urldecode($form_data_onsubm['onsubm']['sm_successtext']) : '';
                $tmp_sm_successtext = do_shortcode($tmp_sm_successtext);

                // url redirection
                $tmp_sm_redirect_st  = ( isset($form_data_onsubm['onsubm']['sm_redirect_st']) ) ? $form_data_onsubm['onsubm']['sm_redirect_st'] : '0';
                $tmp_sm_redirect_url = ( isset($form_data_onsubm['onsubm']['sm_redirect_url']) ) ? urldecode($form_data_onsubm['onsubm']['sm_redirect_url']) : '';

                $data                    = array();
                $data['success']         = 1;
                $data['show_message']    = $tmp_sm_successtext;
                $data['sm_redirect_st']  = $tmp_sm_redirect_st;
                $data['sm_redirect_url'] = $tmp_sm_redirect_url;
                // $data['vis_uniqueid']=$hash;
                $data['form_errors']   = 0;
                $data['form_id']       = $form_id;
                $data['form_mail_err'] = $this->form_email_err;
                $data['mail_error']    = ( $mail_errors ) ? 1 : 0;
                $data['fbh_id']        = $idActivate;
                $this->form_response   = $data;

                modules::run('addon/zfad_frontend/addons_doActions', 'onSubmitForm_pos');

                return $data;
        } catch ( Exception $exception) {
            $data                = array();
            $data['success']     = 0;
            $data['form_errors'] = count($form_errors);
            $data['error_debug'] = __METHOD__ . ' error: ' . $exception->getMessage();
            $data['mail_error']  = ( $mail_errors ) ? 1 : 0;
            $this->form_response = $data;
            return $data;
        }
    }

    private function process_custom_pdf($data)
    {

        $output                  = '';
        $data2                   = array();
        $data2['rec_id']         = $data['rec_id'];
        $data2['content']        = $data['mail_usr_pdf_template_msg'];
        $data2['html_wholecont'] = $data['html_wholecont'];
        // $tmp_html = modules::run('formbuilder/frontend/pdf_global_template',$data2);
        $output = generate_pdf($data2['content'], $data['mail_usr_pdf_fn'], $data['pdf_paper_size'], $data['pdf_paper_orie'], false);

        return $output;
    }


    public function pdf_show_record()
    {
         $rec_id  = isset($_GET['id']) ? Uiform_Form_Helper::sanitizeInput($_GET['id']) : '';
         $is_html = isset($_GET['is_html']) ? Uiform_Form_Helper::sanitizeInput($_GET['is_html']) : 0;

         $form_data = $this->model_record->getFormDataById($rec_id);
         $this->current_form_id = $form_data->form_fmb_id;

        if ( intval($rec_id) > 0) {
            ob_start();
            ?>
        
                    <!-- if p tag is removed, title will dissapear, idk -->
                    <h1><?php echo $form_data->fmb_name; ?></h1>
                    <h4><?php echo __('Order summary', 'FRocket_admin'); ?></h4>
                  
                  <?php
                    echo modules::run('formbuilder/frontend/get_summaryRecord', $rec_id);
                    ?>
                
            <?php
            $content = ob_get_contents();
            ob_end_clean();

            // update form id
            $this->flag_submitted = $rec_id;

            // custom template
            if ( intval($form_data->fmb_rec_tpl_st) === 1) {
                $template_msg = do_shortcode($form_data->fmb_rec_tpl_html);
                $template_msg = html_entity_decode($template_msg, ENT_QUOTES, 'UTF-8');
                $content      = $template_msg;
            }

            $pos  = strpos($content, '</body>');
            $pos2 = strpos($content, '</html>');

            if ( $pos === false && $pos2 === false) {
                $full_page = 0;
            } else {
                $full_page = 1;
                if ( intval($is_html) === 1) {
                    $content = str_replace('</head>', '<script type="text/javascript" src="' . base_url() . '/assets/frontend/js/iframe/4.1.1/iframeResizer.contentWindow.min.js"></script></head>', $content);
                }
            }

            $output                  = '';
            $data2                   = array();
            $data2['rec_id']         = $rec_id;
            $data2['html_wholecont'] = $full_page;
            $data2['content']        = $content;
            $data2['is_html']        = $is_html;
            $tmp_res                 = modules::run('formbuilder/frontend/pdf_global_template', $data2);

            if ( intval($is_html) === 1) {
                header('Content-type: text/html');

                echo $tmp_res['content'];
            } else {
                generate_pdf($tmp_res['content'], 'record_' . $rec_id, $tmp_res['pdf_paper_size'], $tmp_res['pdf_paper_orie'], true);
            }

            die();
        }
    }

    public function pdf_global_template($data)
    {

        $rec_id  = $data['rec_id'];
        $temp    = $this->model_record->getFormDataById($rec_id);
        $form_id = $temp->form_fmb_id;

        $form_data        = $this->model_forms->getFormById_2($form_id);
        $form_data_onsubm = json_decode($form_data->fmb_data2, true);
        $pdf_charset      = ( isset($form_data_onsubm['main']['pdf_charset']) ) ? $form_data_onsubm['main']['pdf_charset'] : '';
        $pdf_font         = ( isset($form_data_onsubm['main']['pdf_font']) ) ? urldecode($form_data_onsubm['main']['pdf_font']) : '';
        $pdf_paper_size   = ( isset($form_data_onsubm['main']['pdf_paper_size']) ) ? $form_data_onsubm['main']['pdf_paper_size'] : 'a4';
        $pdf_paper_orie   = ( isset($form_data_onsubm['main']['pdf_paper_orie']) ) ? $form_data_onsubm['main']['pdf_paper_orie'] : 'landscape';

        $data2                   = array();
        $data2['font']           = $pdf_font;
        $data2['charset']        = $pdf_charset;
        $data2['pdf_paper_size'] = $pdf_paper_size;
        $data2['pdf_paper_orie'] = $pdf_paper_orie;
        $data2['head_extra']     = isset($data['head_extra']) ? $data['head_extra'] : '';
        $data2['content']        = $data['content'];
        $data2['html_wholecont'] = isset($data['html_wholecont']) ? $data['html_wholecont'] : '0';
        $data2['is_html']        = isset($data['is_html']) ? $data['is_html'] : '0';
        $data2['content']        = $this->load->view('formbuilder/forms/pdf_global_template', $data2, true);
        return $data2;
    }

    private function process_DataRecord($data1, $data2)
    {

        $data3 = array();

        if ( ! empty($data1)) {
            foreach ( $data1 as $key => $value) {
                if ( ! empty($value) && is_array($value)) {
                    foreach ( $value as $key2 => $value2) {
                        if ( is_array($value2)) {
                            // index
                            $temp_input = array();
                            $temp_cost  = array();
                            $temp_qty   = array();

                            if ( is_array($value2)) {
                                foreach ( $value2 as $key3 => $value3) {
                                    // values
                                    if ( is_array($value3)) {
                                        foreach ( $value3 as $key4 => $value4) {
                                            switch ( $key4) {
                                                case 'label':
                                                    $temp_input[] = $value4;
                                                    break;
                                                case 'cost':
                                                    $temp_cost[] = $value4;
                                                    break;
                                                case 'qty':
                                                    $temp_qty[] = $value4;
                                                    break;
                                                default:
                                            }
                                            $data3[ $key . '_' . $key2 . '_' . $key3 . '_' . $key4 ] = $value4;
                                        }
                                    } else {
                                         $data3[ $key . '_' . $key2 . '_' . $key3 ] = $value3;
                                    }
                                }
                            }

                            if ( ! empty($temp_input)) {
                                $data3[ $key . '_input' ] = implode('^,^', $temp_input);
                            }
                            if ( ! empty($temp_cost)) {
                                $data3[ $key . '_cost' ] = implode('^,^', $temp_cost);
                            }
                            if ( ! empty($temp_qty)) {
                                $data3[ $key . '_qty' ] = implode('^,^', $temp_qty);
                            }
                        } else {
                            $data3[ $key . '_' . $key2 ] = $value2;
                        }
                    }
                }
            }
        }
        $data3 = array_merge($data3, $data2);

        return $data3;
    }

    public function process_mail($data)
    {

        $mail_errors = false;
        // disable mail function
        if ( defined('ZF_DISABLE_EMAIL') && ZF_DISABLE_EMAIL === true) {
            return $mail_errors;
        }
       
                $data['from_name'] = ! empty($data['from_name']) ? $data['from_name'] : model_settings::$db_config['site_title'];

          
                $to = trim($data['to']);

        if ( preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $to)) {
            
            // phpmail library
            if ( version_compare(phpversion(), '8.0', '>=')) {
                require_once FCPATH . 'application/helpers/phpmailer/6.9.1/vendor/autoload.php';
                // Create a new PHPMailer instance
                $mail = new \PHPMailer\PHPMailer\PHPMailer();
            } else {
                require_once FCPATH . 'application/helpers/phpmailer/5.2.16/PHPMailerAutoload.php';
                // Create a new PHPMailer instance
                $mail = new PHPMailer();
            }
            

            if ( ! empty($data['mail_replyto'])
                && preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $data['mail_replyto'])) {
                $mail_replyto_name = substr($data['mail_replyto'], 0, strrpos($data['mail_replyto'], '@'));
                // $headers[] = "Reply-To: \"{$mail_replyto_name}\" <{$data['mail_replyto']}>";

                $mail->addReplyTo($data['mail_replyto'], $mail_replyto_name);

                // $this->email->reply_to($data['mail_replyto']);
                // $data['subject'].=" - ".$data['mail_replyto'];
            }
                // cc
            if ( ! empty($data['cc'])) {
                if ( is_array($data['cc'])) {
                    foreach ( $data['cc'] as $value) {
                        if ( preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $value)) {
                            // $headers[] = "Cc: {$value}";

                            $mail->addCC($value);

                            // $this->email->cc($value);
                        }
                    }
                }
            }

                // bcc
            if ( ! empty($data['bcc'])) {
                if ( is_array($data['bcc'])) {
                    foreach ( $data['bcc'] as $value) {
                        if ( preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $value)) {
                            // $headers[] = "Bcc: {$value}";

                            $mail->addBCC($value);

                            // $this->email->bcc($value);
                        }
                    }
                }
            }

                            // charset
                            $mail->CharSet = 'UTF-8';

                            // Set who the message is to be sent from
                            $mail->setFrom($data['from_mail'], $data['from_name']);
                            // Set who the message is to be sent to
                            $mail->addAddress($to);
                            // set html
                            $mail->isHTML(true);
                            // Set the subject line
                            $mail->Subject = $data['subject'];

                            $mail->Body    = $data['message'];
                            $mail->AltBody = preg_replace("/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags($data['message']))));

            switch ( intval(model_settings::$db_config['type_email'])) {
                case 2:
                    // smtp
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host       = model_settings::$db_config['smtp_host'];  // Specify main and backup SMTP servers e.g. smtp1.example.com;smtp2.example.com
                    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
                    $mail->Username   = model_settings::$db_config['smtp_user'];                 // SMTP username
                    $mail->Password   = model_settings::$db_config['smtp_pass'];                           // SMTP password
                    $mail->SMTPSecure = model_settings::$db_config['smtp_conn'];                             // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = model_settings::$db_config['smtp_port'];                                    // TCP port to connect to
                    break;
                case 3:
                    // sendmail
                    $mail->isSendmail();
                    break;
                case 1:
                default:
                    // mail

                    break;
            }

            if ( ! empty($data['attachments'])) {
                foreach ( $data['attachments'] as $attachment) {
                    $mail->addAttachment($attachment);
                    // $this->email->attach($attachment);
                }
            }

            if ( ! $mail->send()) {
                    $mail_errors            = true;
                    $this->form_email_err[] = $mail->ErrorInfo;
            } else {
                $mail_errors = false;
            }

            if ( false & ! empty($data['attachments'])) {
                foreach ( $data['attachments'] as $attachment) {
                    @unlink($attachment); // delete files after sending them
                }
            }
        } else {
            $mail_errors = true;
        }

        return $mail_errors;
    }


    /**
     * Frontend::viewform()
     *
     * @return
     */
    public function viewform()
    {
        $form_id = ( $this->input->get('form') ) ? Uiform_Form_Helper::sanitizeInput($this->input->get('form')) : 0;
        $lmode   = ( $this->input->get('lmode') ) ? Uiform_Form_Helper::sanitizeInput($this->input->get('lmode')) : '';

        if ( $form_id === 0) {
            return;
        }
        $website = 'uiform';
        $ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        if ( ! isset($_COOKIE[ $website ])) {
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
            $hash       = hash('crc32', md5($ip . $user_agent));
            setcookie($website, $hash, time() + ( 60 * 60 * 24 * 30 ), '/');
        } else {
            $hash = $_COOKIE[ $website ];
        }
        $agent   = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        // visitor data
        /*
        $data3 = array();
        $data3['vis_uniqueid'] = $hash;
        $data3['vis_user_agent'] = $agent;
        $data3['vis_page'] = $_SERVER['REQUEST_URI'];
        $data3['vis_referer'] = $referer;
        $data3['vis_ip'] = $_SERVER['REMOTE_ADDR'];
        $this->db->set($data3);
        $this->db->insert($this->model_visitor->table);*/

        $rdata            = $this->model_forms->getFormById($form_id);
        $data             = array();
        $data['uniqueid'] = $hash;
         // get data from form
            $form_data        = $this->model_forms->getFormById_2($rdata->fmb_id);
            $form_data_onsubm = json_decode($form_data->fmb_data2, true);

            $onload_scroll = ( isset($form_data_onsubm['main']['onload_scroll']) ) ? $form_data_onsubm['main']['onload_scroll'] : '1';

            $preload_noconflict = ( isset($form_data_onsubm['main']['preload_noconflict']) ) ? $form_data_onsubm['main']['preload_noconflict'] : '1';

            $temp                       = array();
            $temp['id_form']            = $rdata->fmb_id;
            $temp['site_url']           = site_url();
            $temp['base_url']           = base_url();
            $temp['lmode']              = $lmode;
            $temp['onload_scroll']      = $onload_scroll;
            $temp['preload_noconflict'] = $preload_noconflict;

            $data['script'] = $this->load->view('formbuilder/forms/get_code_widget', $temp, true);

        $this->load->view('formbuilder/frontend/viewform', $data);
    }
}
