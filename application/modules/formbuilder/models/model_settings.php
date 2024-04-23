<?php
/**
 * form estimator model
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: model_forms.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Form estimator model
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://php-form-builder.zigaform.com/
 */
class model_settings extends CI_Model
{


    /**
     * register the global settings information
     *
     * @var array
     */
    public static $db_config = array();

    public $table = '';


    /**
     * model_forms::__construct()
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix . 'uiform_settings';
         $this->loadSettings();
    }

    public function getOptions()
    {
        $query = sprintf(
            '
            select uf.version,uf.type_email,uf.smtp_host,uf.smtp_port,uf.smtp_user,uf.smtp_pass,uf.smtp_conn,uf.sendmail_path,uf.language
            from %s uf
            where uf.id=%s
            ',
            $this->table,
            1
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }

    public function getLangOptions()
    {
        $query = sprintf(
            '
            select uf.language
            from %s uf
            where uf.id=%s
            ',
            $this->table,
            1
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }

    /**
     * model_settings::getSettings()
     * Get setting information
     *
     * @return array
     */
    public function getSettings()
    {
        $this->db->select('c.*');
        $this->db->from('{PRE}uiform_settings c');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    /**
     * model_settings::loadSettings()
     * Save global settings to cache
     *
     * @return array
     */
    protected function loadSettings()
    {
         $this->load->library('cache');
        $data = $this->cache->get('settings');
        if ( empty($data)) {
            $this->db->select('site_title, admin_mail, type_email,smtp_host,smtp_port,smtp_user,smtp_pass,smtp_conn,sendmail_path,language,version');
            $this->db->from('{PRE}uiform_settings');
            $this->db->where(array( 'id' => 1 ));
            $this->db->limit(1);
            $query = $this->db->get();
            if ( ! empty($query) && $query->num_rows() == 1) {
                $row                              = $query->row();
                self::$db_config['site_title']    = $row->site_title;
                self::$db_config['admin_mail']    = $row->admin_mail;
                self::$db_config['type_email']    = $row->type_email;
                self::$db_config['smtp_host']     = $row->smtp_host;
                self::$db_config['smtp_port']     = $row->smtp_port;
                self::$db_config['smtp_user']     = $row->smtp_user;
                self::$db_config['smtp_pass']     = $row->smtp_pass;
                self::$db_config['smtp_conn']     = $row->smtp_conn;
                self::$db_config['sendmail_path'] = $row->sendmail_path;
                self::$db_config['language']      = $row->language;
                self::$db_config['version']       = $row->version;

                $this->cache->write(self::$db_config, 'settings');
            }
        } else {
            self::$db_config['site_title']    = $data['site_title'];
            self::$db_config['admin_mail']    = $data['admin_mail'];
            self::$db_config['type_email']    = $data['type_email'];
            self::$db_config['smtp_host']     = $data['smtp_host'];
            self::$db_config['smtp_port']     = $data['smtp_port'];
            self::$db_config['smtp_user']     = $data['smtp_user'];
            self::$db_config['smtp_pass']     = $data['smtp_pass'];
            self::$db_config['smtp_conn']     = $data['smtp_conn'];
            self::$db_config['sendmail_path'] = $data['sendmail_path'];
            self::$db_config['language']      = $data['language'];
            self::$db_config['version']       = ( isset($data['version']) ) ? $data['version'] : 0;
        }
    }

    public function getAllDatabases()
    {
        // return $this->wpdb->get_results("SHOW TABLES", ARRAY_N);
        return (array) $this->db->list_tables();
    }

    public function getColsFromTable($table)
    {

        $query = sprintf('SHOW COLUMNS FROM %s', $table);

        $query2 = $this->db->query($query);
        return $query2->result();
    }
}
