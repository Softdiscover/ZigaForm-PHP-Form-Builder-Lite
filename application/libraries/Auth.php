<?php

/**
 * Auth
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: Auth.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */

/**
 * Auth
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class Auth
{

	public $CI;
	var $_username;

	/**
	 * Auth::__construct()
	 *
	 * @return
	 */
	function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->helper('string');
		$this->CI->load->helper('cookie');
	}

	/**
	 * Auth::Auth
	 *
	 * @return void
	 */
	function Auth()
	{
		self::__construct();
	}

	/**
	 * login user
	 *
	 * @param string $username    username
	 * @param string $password    password
	 * @param string $redirect_to url to redirect
	 *
	 * @return  array
	 */
	function login($username, $password, $redirect_to = null)
	{
		$query = $this->CI->db->get_where(
			$this->CI->db->dbprefix . 'uiform_user',
			array(
				'use_login'    => $username,
				'use_password' => md5($password),
				'flag_status'  => 1,
			),
			1
		);
		if ($query->num_rows() === 1) {
			$row = $query->row();
			session_start();
			$data = array(
				'loggedIn'             => true,
				'sess_expire_on_close' => true,
				'time_stmp'            => strtotime(date('Y-m-d H:i:s')),
				'use_login'            => $row->use_login,
				'use_id'               => $row->use_id,
				'tmp_sess'             => session_id(),
			);
			$this->CI->session->set_userdata($data);
			$_SESSION['all_data'] = $this->CI->session->all_userdata();
			redirect($redirect_to);
		} else {
			$this->CI->session->set_flashdata('message', 'danger: Access denied');
			redirect('/admin');
		}
	}

	/**
	 * login user
	 *
	 * @param string $username    username
	 * @param string $password    password
	 * @param string $redirect_to url to redirect
	 *
	 * @return  array
	 */
	function checkupdate()
	{
		$version     = UIFORM_VERSION;
		$install_ver = (!empty(model_settings::$db_config['version'])) ? model_settings::$db_config['version'] : UIFORM_VERSION;



		if (version_compare($version, $install_ver, '>')) {

			if (version_compare($install_ver, '1.4', '<')) {
				$tbname = 'fbcf_uiform_form_records';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fbh_data_rec'");
					$row    = (array) $query2->row();

					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  fbh_data_rec longtext NOT NULL;';
						$this->CI->db->query($sql);
					}

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fbh_data_xml'");
					$row    = (array) $query2->row();
					if (!empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' CHANGE fbh_data_xml fbh_data_rec_xml longtext;';
						$this->CI->db->query($sql);
					}
				}
			}

			if (version_compare($install_ver, '1.4.7', '<')) {
				$tbname = 'fbcf_uiform_fields';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'order_frm'");
					$row    = (array) $query2->row();

					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  order_frm smallint(5) DEFAULT NULL;';
						$this->CI->db->query($sql);
					}

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'order_rec'");
					$row    = (array) $query2->row();

					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  order_rec smallint(5) DEFAULT NULL;';
						$this->CI->db->query($sql);
					}
				}
			}

			if (version_compare($install_ver, '3', '<')) {

				$tbname = 'fbcf_uiform_form_log';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) != $tbname) {
					$charset = '';
					// form log
					$sql = "CREATE  TABLE IF NOT EXISTS $tbname (
                                `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `log_frm_data` longtext,
                                `log_frm_name` varchar(255) DEFAULT NULL,
                                `log_frm_html` longtext,
                                `log_frm_html_backend` longtext,
                                `log_frm_html_css` longtext,
                                `log_frm_id` int(10) NOT NULL,
                                `log_frm_hash` varchar(255) NOT NULL,
                                `flag_status` smallint(5) DEFAULT '1',
                                `created_date` timestamp NULL,
                                `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `created_ip` varchar(100) DEFAULT NULL,
                                `updated_ip` varchar(100) DEFAULT NULL,
                                `created_by` varchar(100) DEFAULT NULL,
                                `updated_by` varchar(100) DEFAULT NULL,
                                PRIMARY KEY (`log_id`)
                            ) " . $charset . ';';

					$this->CI->db->query($sql);
				}
			}

			if (version_compare($install_ver, '3.7', '<')) {

				$tbname = 'fbcf_uiform_addon';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) != $tbname) {
					$charset = '';
					// form log
					$sql = "CREATE  TABLE IF NOT EXISTS $tbname (
                                `add_name` varchar(45) NOT NULL DEFAULT '',
                                `add_title` text ,
                                `add_info` text ,
                                `add_system` smallint(5) DEFAULT NULL,
                                `add_hasconfig` smallint(5) DEFAULT NULL,
                                `add_version` varchar(45)  DEFAULT NULL,
                                `add_icon` text ,
                                `add_installed` smallint(5) DEFAULT NULL,
                                `add_order` int(5) DEFAULT NULL,
                                `add_params` text ,
                                `add_log` text ,
                                `addonscol` varchar(45) DEFAULT NULL,
                                `flag_status` smallint(5)  DEFAULT 1,
                                `created_date` timestamp NULL,
                                `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `created_ip` varchar(100)  DEFAULT NULL,
                                `updated_ip` varchar(100)  DEFAULT NULL,
                                `created_by` varchar(100) DEFAULT NULL,
                                `updated_by` varchar(100) DEFAULT NULL,
                                `add_xml` text ,
                                `add_load_back` smallint(5) DEFAULT NULL,
                                `add_load_front` smallint(5) DEFAULT NULL,
                                `is_field` smallint(5) DEFAULT NULL,
                                PRIMARY KEY (`add_name`) 
                            ) " . $charset . ';';

					$this->CI->db->query($sql);

					$sql = "INSERT INTO $tbname VALUES ('func_anim', 'Animation effect', 'Animation effects to fields', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, '1980-01-01 00:00:01', '2018-01-31 10:35:14', NULL, NULL, NULL, NULL, NULL, 1, 1, 1);";
					$this->CI->db->query($sql);
				}

				$tbname = 'fbcf_uiform_addon_details';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) != $tbname) {
					$charset = '';
					// form log
					$sql = "CREATE  TABLE IF NOT EXISTS $tbname (
                                `add_name` varchar(45)  NOT NULL,
                                `fmb_id` int(10) NOT NULL,
                                `adet_data` longtext ,
                                `flag_status` smallint(5) DEFAULT 1,
                                `created_date` timestamp NULL,
                                `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `created_ip` varchar(100) DEFAULT NULL,
                                `updated_ip` varchar(100) DEFAULT NULL,
                                `created_by` varchar(100) DEFAULT NULL,
                                `updated_by` varchar(100) DEFAULT NULL,
                                PRIMARY KEY (`add_name`, `fmb_id`) 
                            ) " . $charset . ';';

					$this->CI->db->query($sql);
				}

				$tbname = 'fbcf_uiform_addon_details_log';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) != $tbname) {
					$charset = '';
					// form log
					$sql = "CREATE  TABLE IF NOT EXISTS $tbname (
                                `add_log_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `add_name` varchar(45)  NOT NULL,
                                `fmb_id` int(10) NOT NULL,
                                `adet_data` longtext  NULL,
                                `flag_status` smallint(5) DEFAULT 1,
                                `created_date` timestamp NULL,
                                `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                `created_ip` varchar(100) DEFAULT NULL,
                                `updated_ip` varchar(100) DEFAULT NULL,
                                `created_by` varchar(100) DEFAULT NULL,
                                `updated_by` varchar(100) DEFAULT NULL,
                                `log_id` int(5) NOT NULL,
                                PRIMARY KEY (`add_log_id`) 
                            ) " . $charset . ';';

					$this->CI->db->query($sql);
				}
			}

			// below 3.7.6.3
			if (version_compare($install_ver, '3.7.6.3', '<')) {

				$tbname = 'fbcf_uiform_addon';
				$query2  = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row     = (array) $query2->row();
				if ((string) reset($row) === $tbname) {
					try {
						$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'add_id'");
						$row    = (array) $query2->row();
					} catch (Exception $e) {
						$row = array();
					}
					if (!empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' DROP COLUMN `add_id`;';
						$this->CI->db->query($sql);
					}
				}
			}

			// below 3.8.5
			if (version_compare($install_ver, '3.8.5', '<')) {

				$tbname = 'fbcf_uiform_options';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) != $tbname) {
					$charset = '';
					// form log
					$sql = "CREATE  TABLE IF NOT EXISTS $tbname (
                                `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                                `option_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
                                `option_value` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                `autoload` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'yes',
                                PRIMARY KEY (`option_id`) USING BTREE,
                                UNIQUE INDEX `option_name`(`option_name`) USING BTREE
                            ) " . $charset . ';';

					$this->CI->db->query($sql);
				}
			}

			// below 3.9.5
			if (version_compare($install_ver, '3.9.5', '<')) {

				$tbname = 'fbcf_uiform_fields_type';
				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();
				if ((string) reset($row) == $tbname) {
					$charset = '';
					$sql = "INSERT INTO $tbname VALUES ('43', 'Date 2', '1', '1980-01-01 00:00:01', '2018-10-11 14:10:35', NULL, NULL, NULL, NULL) ON DUPLICATE KEY UPDATE flag_status = 1;";
					$this->CI->db->query($sql);
				}
			}

			// below 3.9.9.6.1
			if (version_compare($install_ver, '3.9.9.6.1', '<')) {
				$tbname = 'fbcf_uiform_form';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fmb_rec_tpl_html'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  fmb_rec_tpl_html longtext NULL;';
						$this->CI->db->query($sql);
					}

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fmb_rec_tpl_st'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  fmb_rec_tpl_st TINYINT(1) NULL DEFAULT 0;';
						$this->CI->db->query($sql);
					}
				}
			}

			// below 4.3
			if (version_compare($install_ver, '4.3', '<')) {
				$tbname = 'fbcf_uiform_settings';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'smtp_conn'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  smtp_conn varchar(255) DEFAULT NULL;';
						$this->CI->db->query($sql);
					}
				}
			}


			if (version_compare($install_ver, '7.0.0', '<')) {
				$tbname = 'fbcf_uiform_form';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fmb_type'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  fmb_type TINYINT(1) NULL DEFAULT 0;';
						$this->CI->db->query($sql);
					}

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'fmb_parent'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  fmb_parent BIGINT DEFAULT 0;';
						$this->CI->db->query($sql);
					}
				}
			}
			
			
			if ( version_compare($install_ver, '7.0.0', '<')) {
				$tbname = 'fbcf_uiform_form_log';

				$query2 = $this->CI->db->query("SHOW TABLES LIKE '$tbname'");
				$row    = (array) $query2->row();

				if ((string) reset($row) === $tbname) {

					$query2 = $this->CI->db->query('SHOW COLUMNS FROM ' . $tbname . " LIKE 'log_frm_parent'");
					$row    = (array) $query2->row();
					if (empty($row)) {
						$sql = 'ALTER TABLE ' . $tbname . ' ADD  log_frm_parent BIGINT DEFAULT 0;';
						$this->CI->db->query($sql);
					}
 
				}
			}
			
			// update

			$data  = array(
				'version' => $version,
			);
			$where = array(
				'id' => 1,
			);

			$this->CI->db->set($data);
			$this->CI->db->where($where);
			$this->CI->db->update($this->CI->db->dbprefix . 'uiform_settings');

			$this->CI->cache->delete('settings');
		}
	}


	/**
	 * check logged in status
	 *
	 * @return array
	 */
	function loggedIn()
	{
		return $this->CI->session->userdata('loggedIn');
	}

	/**
	 * logout user
	 *
	 * @param string $redirect_to link to redirect
	 *
	 * @return array
	 */
	function logout($redirect_to = null)
	{
		$this->CI->session->sess_destroy();
		delete_cookie('ci_cest');
		if ($redirect_to != null) {
			redirect($redirect_to);
		}
	}

	/**
	 * authenticate user
	 *
	 * @param string $restrict_to link to restrict
	 * @param string $redirect_to link to redirect
	 *
	 * @return array
	 */
	function authenticate($restrict_to = null, $redirect_to = null)
	{
		/*
		  $current_url =& get_instance(); //  get a reference to CodeIgniter
		 $tmp_class=$current_url->router->fetch_class(); // for Class name or controller
		 $tmp_method=$current_url->router->fetch_method(); // for method name
		  $tmp_module=$current_url->router->fetch_module(); // for method name

		*/
		$redirect_to = ($redirect_to == null) ? $this->CI->config->item('site_url') . 'default/intranet/login' : $redirect_to;

		if ($restrict_to !== null) {
			if ($this->loggedIn() == true) {
				return true;
			} else {
				redirect($redirect_to);
			}
		} else {
			show_error('area restricted');
		}
	}
}
