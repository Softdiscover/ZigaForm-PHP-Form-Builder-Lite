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
 * User intranet class
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Intranet extends CommonController
{
    /**
    * max number of user in order show by pagination
    *
    * @var int
    */
    var $per_page = 10;
    
    /**
    * name of user table
    *
    * @var string
    */
    var $table = '';
    
    /**
     * Intranet::__construct()
     * 
     * @return 
     */
    function __construct()
    {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('default/model_settings');
        $this->load->model('model_user');
        $this->table = $this->db->dbprefix . "uiform_user";
        
    }
    
    /**
     * Intranet::index()
     * List all users
     * 
     * @param int $offset Number of pagination
     * 
     * @return array
     */
    public function index($offset = 0)
    {
        //list all forms
        $data = $config = array();
        //create pagination
        $this->load->library('pagination');
        $config['base_url']        = site_url() . 'default/dashboard/index';
        $config['total_rows']      = $this->db->count_all($this->table);
        $config['per_page']        = $this->per_page;
        $config['first_link']      = 'First';
        $config['last_link']       = 'Last';
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close']  = '</ul>';
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li><span>';
        $config['cur_tag_close']   = '</span></li>';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        // If the pagination library doesn't recognize the current page add
        $this->pagination->cur_page = $offset;
        
        $data['query'] = $this->model_user->getList();
        $this->template->loadPartial('layout', 'intranet/index', $data);
    }
    
    /**
     * Intranet::createuser()
     * Create a new user
     * 
     * @return void
     */
    public function createuser()
    {
        $data                = array();
        $data['flag_status'] = 1;
        $this->template->loadPartial('layout', 'intranet/createuser', $data);
    }
    
    /**
     * Intranet::edituser()
     * Edit user by id
     * 
     * @return array
     */
    public function edituser()
    {
        $id_user = Uiform_Form_Helper::sanitizeInput($this->uri->segment(4, 0));
        $query   = $this->db->get_where($this->model_user->table, array('use_id' => $id_user), 1);
        if ($query->num_rows() === 1) {
            $data                = array();
            $rdata               = $this->model_user->getUserById($id_user);
            $data['use_id']      = $rdata->use_id;
            $data['use_login']   = $rdata->use_login;
            $data['use_mail']   = $rdata->use_mail;
            $data['flag_status'] = $rdata->flag_status;
            
            $this->template->loadPartial('layout', 'intranet/createuser', $data);
        } else {
            redirect(site_url() . 'user/intranet/index');
        }
        
    }
    
    /**
     * Intranet::delete()
     * Delete user by id
     * 
     * @param int $id_user id of user
     * 
     * @return void
     */
    function delete($id_user)
    {
        $this->db->where('use_id', $id_user)->delete($this->table);
        $this->session->set_flashdata('message', 'info: User was deleted');
        redirect(site_url() . 'user/intranet/index');
    }
    
    /**
     * Intranet::saveuser()
     * Save user information
     * 
     * @return void
     */
    public function saveuser()
    {
        $id_user              = Uiform_Form_Helper::sanitizeInput($this->uri->segment(4, 0));
        $flag_status          = ($this->input->post('flag_status')) ? Uiform_Form_Helper::sanitizeInput($this->input->post('flag_status')) : 0;
        $data                 = array();
        $data['use_login']    = Uiform_Form_Helper::sanitizeInput($this->input->post('use_login'));
        $data['use_mail']    = Uiform_Form_Helper::sanitizeInput($this->input->post('use_mail'));
        $data['use_password'] = md5(trim(Uiform_Form_Helper::sanitizeInput($this->input->post('use_password'))));
        $data['flag_status']  = $flag_status;
        $data['updated_ip']   = $_SERVER['REMOTE_ADDR'];
        $data['updated_by']   = 1;
        $data['updated_date'] = date('Y-m-d h:i:s');
        $query                = $this->db->get_where($this->model_user->table, array('use_id' => $id_user), 1);
        if ($query->num_rows() === 1) {
            $this->db->set($data);
            $this->db->where('use_id', $id_user);
            $this->db->update($this->model_user->table);
            $this->session->set_flashdata('message', 'success: Form was updated');
        } else {
            $data['created_ip']   = $_SERVER['REMOTE_ADDR'];
            $data['created_by']   = 1;
            $data['created_date'] = date('Y-m-d h:i:s');
            $this->db->set($data);
            $this->db->insert($this->model_user->table);
            $this->session->set_flashdata('message', 'success: User was created');
        }
        redirect(site_url() . 'user/intranet/index');
    }
}
?>
