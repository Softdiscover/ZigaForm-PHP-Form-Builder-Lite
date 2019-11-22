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
 * Default intranet class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Intranet extends CI_Controller {

    /**
     * Intranet::__construct()
     * 
     * @return 
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('formbuilder/model_settings');
        $this->load->model('user/model_user');
       //check update
        $this->auth->checkupdate();
        
    }
    
     
    /**
     * Intranet::dashboard()
     * Print the dashboard of the HTML page.
     * 
     * @return void
     */
    public function dashboard() {
        $this->auth->authenticate(true);
        redirect(site_url() . 'default/dashboard/index');
    }

    /**
     * Intranet::login()
     * Print the login of the HTML page.
     * 
     * @return void
     */
    public function login() {
        $this->template->loadPartial('layout-login', 'intranet/login');
    }

    /**
     * Intranet::recoverpass()
     * Print the login of the HTML page.
     * 
     * @return void
     */
    public function recoverpass() {
        $data = array();
        $data['token'] = uniqid();

        $email_message = $this->load->view('intranet/recoverpass_mail', $data, true);

        //sending email
        $this->load->library('email', emailConfiguration(intval(model_settings::$db_config['type_email'])));
        $this->email->set_newline("\r\n");
        $this->email->from(model_settings::$db_config['admin_mail'], model_settings::$db_config['site_title']);
        $list = array();
        $list[] = model_settings::$db_config['admin_mail'];
        $this->email->to($list);

        $this->email->subject(model_settings::$db_config['site_title'] . ' - Recovery password');
        $this->email->set_mailtype("html");

        $this->email->message($email_message);
        if ($this->email->send()) {
            $data['message'] = "Recovery password link was sent to admin mail";
        } else {
            $data['message'] = "Error. Recovery password link was not sent to your mail because of your mail service is not working fine.";
        }
        /* get user data */
        $data_user = $this->model_user->getFirstUser();

        $data2 = array();
        $data2['use_password_token'] = $data['token'];
        $this->db->set($data2);
        $this->db->where('use_id', $data_user->use_id);
        $this->db->update($this->model_user->table);

        $this->template->loadPartial('layout-login', 'intranet/recoverpass', $data);
    }

    /**
     * Intranet::recoverpass()
     * Print the login of the HTML page.
     * 
     * @return void
     */
    public function processchangepassword() {
        $data = array();
        $data['pass_token'] = ($this->input->post('pass_token')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('pass_token')) : '';
        $data['username'] = ($this->input->post('username')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('username')) : '';
        $data['use_password'] = ($this->input->post('password')) ? md5(Uiform_Form_Helper::sanitizeInput($this->input->post('password'))) : '';

        $data_user = $this->model_user->getPasswordToken($data['pass_token']);
        $data2 = array();
        $data2['use_password_token'] = '';
        $data2['use_password'] = $data['use_password'];
        $this->db->set($data2);
        $this->db->where(array('use_id' => $data_user->use_id));
        $this->db->update($this->model_user->table);
        $this->session->set_flashdata('message', 'info: Password was updated');
        redirect(site_url() . 'admin');
    }

    /**
     * Intranet::recoverpass()
     * Print the login of the HTML page.
     * 
     * @return void
     */
    public function changepassword() {
        $pass_token = Uiform_Form_Helper::sanitizeInput($this->uri->segment(4, 0));
        $data = array();
        $data_user = $this->model_user->getPasswordToken($pass_token);
        if (!empty($data_user) && (string) $pass_token === $data_user->use_password_token) {
            $data['pass_token'] = $pass_token;
            $data['use_login'] = $data_user->use_login;
            $this->template->loadPartial('layout-login', 'intranet/changepassword', $data);
        } else {
            /* redirect to login */
            $this->session->set_flashdata('message', 'warning: Recovery password expired. Try again');
            redirect(site_url() . 'admin');
        }
    }

    /**
     * Intranet::settings()
     * Print the global settings of the HTML page.
     * 
     * @return array
     */
    public function settings() {
        $this->auth->authenticate(true);
        $data = array();
        $rdata = $this->model_settings->getSettings();
        $data['site_title'] = $rdata->site_title;
        $data['admin_mail'] = $rdata->admin_mail;
        $data['type_email'] = $rdata->type_email;
        $data['smtp_host'] = $rdata->smtp_host;
        $data['smtp_port'] = $rdata->smtp_port;
        $data['smtp_user'] = $rdata->smtp_user;
        $data['smtp_pass'] = $rdata->smtp_pass;
        $data['smtp_conn'] = $rdata->smtp_conn;        
        $data['sendmail_path'] = $rdata->sendmail_path;
        $data['language'] = $rdata->language;

        $data['lang_list'] = $this->config->item('lang_uri_abbr');

        $this->template->loadPartial('layout', 'intranet/settings', $data);
    }
    
    /**
     * Intranet::settings()
     * Print the global settings of the HTML page.
     * 
     * @return array
     */
    public function showfilemanager() {
        $this->auth->authenticate(true);
        $data = array();
       

        $this->template->loadPartial('layout-fmanager', 'intranet/showfilemanager', $data);
    }
    
    /**
     * Intranet::help()
     * Print the global settings of the HTML page.
     * 
     * @return array
     */
    public function help() {
        $this->auth->authenticate(true);
        $data = array();
        $this->template->loadPartial('layout_blank', 'intranet/help', $data);
    }
    
    /**
     * Intranet::about()
     * Print the global settings of the HTML page.
     * 
     * @return array
     */
    public function about() {
        $this->auth->authenticate(true);
        $data = array();
        $this->template->loadPartial('layout_blank', 'intranet/about', $data);
    }
    
    /**
     * Intranet::gopro()
     * Print the global settings of the HTML page.
     * 
     * @return array
     */
    public function gopro() {
        $this->auth->authenticate(true);
        $data = array();
        $this->template->loadPartial('layout_blank', 'intranet/gopro', $data);
    }

    /**
     * Intranet::savesettings()
     * Save the global settings
     * 
     * @return void
     */
    public function savesettings() {
        $this->auth->authenticate(true);
        // deleting cache before inserting data
        $this->cache->delete('settings');
        $data = array();
        $data['site_title'] = ($this->input->post('site_title')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('site_title')) : '';
        $data['admin_mail'] = ($this->input->post('admin_mail')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('admin_mail')) : '';
        $data['type_email'] = ($this->input->post('type_mail')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('type_mail')) : 1;
        $data['smtp_host'] = ($this->input->post('smtp_host')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('smtp_host')) : '';
        $data['smtp_port'] = ($this->input->post('smtp_port')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('smtp_port')) : '0';
        $data['smtp_user'] = ($this->input->post('smtp_user')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('smtp_user')) : '';
        $data['smtp_pass'] = ($this->input->post('smtp_pass')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('smtp_pass')) : '';
        $data['smtp_conn'] = ($this->input->post('smtp_conn')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('smtp_conn')) : '';
        $data['sendmail_path'] = ($this->input->post('sendmail_path')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('sendmail_path')) : '';
        $data['language'] = ($this->input->post('language')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('language')) : 'en';


        //inserting data
        $this->db->set($data);
        $this->db->where('id', 1);
        $this->db->update($this->model_settings->table);
        $this->session->set_flashdata('message', 'success: Settings was updated');
        redirect(site_url() . 'default/intranet/settings');
    }

    /**
     * Intranet::logout()
     * Logging out user
     * 
     * @return void
     */
    public function logout() {
        $this->auth->authenticate(true);
        $this->auth->logout('default/intranet/login');
    }

    /**
     * Intranet::authenticate()
     * Authenticating user
     * 
     * @return void
     */
    public function authenticate() {
        $redirect_to = $this->config->item('site_url') . 'default/intranet/dashboard';
        if ($this->auth->loggedIn() == false) {
            $data = array();
            $data['error'] = false;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[32]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', 'danger: Access denied - validation');
                redirect('/admin');
            } else {
                $this->auth->login(Uiform_Form_Helper::sanitizeInput($this->input->post('username')), Uiform_Form_Helper::sanitizeInput($this->input->post('password')), $redirect_to);
            }
        } else {
            redirect($redirect_to);
        }
    }

}
