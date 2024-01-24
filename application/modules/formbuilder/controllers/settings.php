<?php

/**
 * Settings
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
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
class Settings extends BackendController
{
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
    protected $modules;
    public $CI;
    /**
     * Settings::__construct()
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_settings');
        $this->CI = &get_instance();
    }


    public function system_update_table()
    {

        $jsonFile = APPPATH . 'modules/formbuilder/views/settings/system_db.json';
        $prefix = 'fbcf_';
        // Read the JSON file content
        $jsonContent = file_get_contents($jsonFile);

        // Parse JSON content into an array
        $dataArray = json_decode($jsonContent, true);

        // Check if JSON decoding was successful
        if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
            die('Error decoding JSON: ' . json_last_error_msg());
        }

        foreach ($dataArray as $key => $value) {
            $tableName = $key;

            $query2 = $this->CI->db->query("SHOW TABLES LIKE '{$prefix}{$tableName}'");
            $row    = (array) $query2->row();
            $tableExists = (string) reset($row) === "{$prefix}{$tableName}";

            if (!$tableExists) {
                continue;
            }

            foreach ($value as $fieldToUpdate => $fieldData) {
                // Replace 'your_field_type' with the new type for the field
                $newFieldType = $fieldData['type'] ?? '';
                $newFieldNull = $fieldData['null'] == 'YES' ? '' : 'NOT NULL';
                $newFieldDefault = $fieldData['Default'] ? 'DEFAULT ' . $fieldData['Default'] : '';
                if (in_array($fieldData['Extra'], ['DEFAULT_GENERATED on update CURRENT_TIMESTAMP','DEFAULT_GENERATED'])) {
                    $fieldData['Extra'] = '';
                }
                $newFieldExtra = $fieldData['Extra'] ?? '';

                $sql = "ALTER TABLE {$prefix}{$tableName} MODIFY COLUMN {$fieldToUpdate} {$newFieldType} {$newFieldNull} {$newFieldDefault} {$newFieldExtra}";

                $this->CI->db->query($sql);
            }
        }
        $json = [];
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    public function ajax_blocked_getmessage()
    {
        // check_ajax_referer( 'zgfm_ajax_nonce', 'zgfm_security' );
        $message = (isset($_POST['message']) && $_POST['message']) ? Uiform_Form_Helper::sanitizeInput($_POST['message']) : '';

        $data            = array();
        $data['message'] = $message;
        $json            = array();
        $json['msg']     = $this->load->view('formbuilder/settings/blocked_getmessage', $data, true);
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Settings::backup_upload_file()
     *
     * @return
     */
    public function backup_upload_file()
    {

        require_once APPPATH . 'helpers/uiform_backup.php';
        $dbBackup = new Uiform_Backup();
        $dbBackup->uploadBackupFile();
    }

    /**
     * Settings::ajax_backup_create()
     *
     * @return
     */
    public function ajax_backup_create()
    {
        // memory limite undefined
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $json = array();

        $name_bkp = (isset($_POST['uifm_frm_namebackup']) && $_POST['uifm_frm_namebackup']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_namebackup']) : '';

        $tables       = array();
        $tables[] = 'fbcf_uiform_fields';
        $tables[] = 'fbcf_uiform_fields_type';
        $tables[] = 'fbcf_uiform_form';
        $tables[] = 'fbcf_uiform_form_log';
        $tables[] = 'fbcf_uiform_form_records';
        $tables[] = 'fbcf_uiform_settings';
        $tables[] = 'fbcf_uiform_user';
        $tables[] = 'fbcf_uiform_visitor';
        $tables[] = 'fbcf_uiform_options';

        $name_bkp = (!empty($name_bkp)) ? $name_bkp : date('d-M-Y_H-i-s');

        $this->load->helper('file');

        $CI = &get_instance();
        $CI->load->database();

        $db_name = $name_bkp . '.sql';
        $save    = FCPATH . '/backups/' . $db_name;

        if (extension_loaded('mysql') && (string) $CI->db->dbdriver === 'mysql') {
            $this->load->dbutil();
            require_once APPPATH . 'helpers/uiform_backup.php';

            $dbBackup = new Uiform_Backup();
            $backup   = $dbBackup->backup_database_mysql($CI->db->hostname, $CI->db->username, $CI->db->password, $CI->db->database, $tables);

            write_file($save, $backup);
        } else {
            require_once APPPATH . '/../libs/backup/MySQLDump.php';
            $dump = new MySQLDump(new mysqli($CI->db->hostname, $CI->db->username, $CI->db->password, $CI->db->database), 'utf8', $tables);
            $dump->save($save);
        }

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Settings::ajax_backup_restorefile()
     *
     * @return
     */
    public function ajax_backup_restorefile()
    {
        $json             = array();
        $uifm_frm_resfile = (isset($_POST['uifm_frm_resfile']) && $_POST['uifm_frm_resfile']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_resfile']) : '';
        require_once APPPATH . 'helpers/uiform_backup.php';
        $dbBackup = new Uiform_Backup();
        $CI       = &get_instance();
        $CI->load->database();
        if (extension_loaded('mysql') && (string) $CI->db->dbdriver === 'mysql') {
            $dbBackup->restoreBackup($uifm_frm_resfile, $CI->db->database, $CI->db->username, $CI->db->password, $CI->db->hostname);
        } else {
            $dir  = FCPATH . '/backups/';
            $file = $dir . $uifm_frm_resfile; // sql data file
            $args = file_get_contents($file); // get contents
            $dbBackup->mysqli_import_sql($file, $uifm_frm_resfile, $args, $CI->db->hostname, $CI->db->username, $CI->db->password, $CI->db->database); // execute
        }

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Settings::ajax_backup_deletefile()
     *
     * @return
     */
    public function ajax_backup_deletefile()
    {
        $json             = array();
        $uifm_frm_delfile = (isset($_POST['uifm_frm_delfile']) && $_POST['uifm_frm_delfile']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_delfile']) : '';
        $dir              = FCPATH . '/backups/';
        @unlink($dir . $uifm_frm_delfile);
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Settings::ajax_save_options()
     *
     * @return
     */
    public function ajax_save_options()
    {
        $opt_language     = (isset($_POST['language']) && $_POST['language']) ? Uiform_Form_Helper::sanitizeInput($_POST['language']) : '';
        $data             = array();
        $data['language'] = $opt_language;
        $where            = array(
            'id' => 1,
        );

        $opt_fields_fastload = (isset($_POST['uifm_frm_fields_fastload']) && $_POST['uifm_frm_fields_fastload']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_fields_fastload']) : 0;
        if ((string) $opt_fields_fastload === 'on') {
            update_option('zgfm_fields_fastload', 1);
        } else {
            update_option('zgfm_fields_fastload', 0);
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($this->model_settings->table);

        $result = $this->db->affected_rows();
        $json   = array();
        if ($result > 0) {
            $json['success'] = 1;
        } else {
            $json['success'] = 0;
        }

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Settings::view_settings()
     *
     * @return
     */
    public function view_settings()
    {
        $data  = array();
        $query = $this->model_settings->getOptions();

        $pofilespath = FCPATH . 'i18n/languages/backend/';
        $data['language']        = $query->language;
        $data['lang_list']       = Uiform_Form_Helper::getLanguageList($pofilespath);

        $data['fields_fastload'] = get_option('zgfm_fields_fastload', 0);

        $this->template->loadPartial('layout', 'settings/view_settings', $data);
    }

    /**
     * Settings::backup_settings()
     *
     * @return
     */
    public function backup_settings()
    {
        if (isset($_POST['_uifm_bkp_submit_file']) && intval($_POST['_uifm_bkp_submit_file']) === 1) {
            $this->backup_upload_file();
        }

        $data       = array();
        $dir        = FCPATH . '/backups/';
        $data_files = array();
        if (is_dir($dir)) {
            $getDir = dir($dir);
            while (false !== ($file = $getDir->read())) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if ($file != '.' && $file != '..' && $ext == 'sql') {
                    $temp_file              = array();
                    $temp_file['file_name'] = $file;
                    $temp_file['file_url']  = base_url() . '/backups/' . $file;
                    $temp_file['file_date'] = date('F d Y H:i:s.', filemtime($dir . $file));
                    $temp_file['file_size'] = Uiform_Form_Helper::human_filesize(filesize($dir . $file));
                    $data_files[]           = $temp_file;
                }
            }
        }
        $data['files'] = $data_files;
        $this->template->loadPartial('layout', 'settings/backup_settings', $data);
    }

    public function system_check()
    {
        $data = array();

        $all_tables_tmp = $this->model_settings->getAllDatabases();

        $uiform_tbs   = array();
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form_records';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_fields';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_fields_type';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_settings';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form_log';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon_details';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon_details_log';

        // tables
        $name_tb                                        = array();
        $name_tb[$this->db->dbprefix . 'uiform_form'] = 'Forms';
        $name_tb[$this->db->dbprefix . 'uiform_form_records']      = 'Records';
        $name_tb[$this->db->dbprefix . 'uiform_fields']            = 'Fields';
        $name_tb[$this->db->dbprefix . 'uiform_fields_type']       = 'Types';
        $name_tb[$this->db->dbprefix . 'uiform_settings']          = 'Settings';
        $name_tb[$this->db->dbprefix . 'uiform_form_log']          = 'Form Log';
        $name_tb[$this->db->dbprefix . 'uiform_addon']             = 'Addon';
        $name_tb[$this->db->dbprefix . 'uiform_addon_details']     = 'Addon detail';
        $name_tb[$this->db->dbprefix . 'uiform_addon_details_log'] = 'Addon log';

        $uiform_tbs_tmp = array();
        $count_err       = 0;
        foreach ($uiform_tbs as $value) {
            $tmp_tb            = array();
            $tmp_tb['table']   = $name_tb[$value];
            $tmp_tb['message'] = '';
            // check database
            (in_array($value, $all_tables_tmp)) ? $tmp_tb['status'] = 1 : $tmp_tb['status'] = 0;

            // check columns
            $tmp_check = $this->check_Database_Column($value);

            if (!empty($tmp_check['err_msgs'])) {
                $tmp_tb['status']  = 0;
                $tmp_tb['message'] = '<ul><li>' . implode('</li><li>', $tmp_check['err_msgs']) . '</li></ul>';
            }

            if ($tmp_tb['status'] === 0) {
                $count_err++;
            }

            $uiform_tbs_tmp[] = $tmp_tb;
        }

        $data['database_success'] = 1;
        if ($count_err > 0) {
            $data['database_success'] = 0;
        }

        $data['database_int'] = $uiform_tbs_tmp;

        $this->template->loadPartial('layout', 'formbuilder/settings/system_check', $data);
    }

    public function system_gendb_column()
    {

        $uiform_tbs   = array();
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form_records';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_fields';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_fields_type';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_settings';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_form_log';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon_details';
        $uiform_tbs[] = $this->db->dbprefix . 'uiform_addon_details_log';

        $tmp_all_db = array();

        foreach ($uiform_tbs as $value) {
            $row = $this->model_settings->getColsFromTable($value);

            $tmp_arr = array();
            if (!empty($row)) {
                foreach ($row as $key => $value2) {
                    $tmp_arr[$value2->Field] = [
                        'type' => $value2->Type,
                        'null' => $value2->Null,
                        'Default' => $value2->Default,
                        'Extra' => $value2->Extra,
                    ];
                }
            }

            $tmp_all_db[str_replace($this->db->dbprefix, '', $value)] = $tmp_arr;
        }

        // Encode the array into a JSON string.
        $encodedString = json_encode($tmp_all_db);

        // Save the JSON string to a text file.
        file_put_contents(APPPATH . 'modules/formbuilder/views/settings/system_db.json', $encodedString);

        die('database structure generated');
    }

    public function check_Database_Column($table)
    {

        // Retrieve the data from our text file.
        $fileContents = file_get_contents(APPPATH . 'modules/formbuilder/views/settings/system_db.json');

        // Convert the JSON string back into an array.
        $tmp_all_db = json_decode($fileContents, true);

        // $row= $wpdb->get_results("SHOW COLUMNS FROM " . $table );
        $row = $this->model_settings->getColsFromTable($table);
        // tables
        $resultado = array();

        $err_msgs = array();

        $table = str_replace($this->db->dbprefix, '', $table);

        $col_st = false;
        if (!empty($row)) {
            $tmp_arr = array();
            if (isset($tmp_all_db[$table])) {
                foreach ($row as $key => $value) {
                    if (isset($tmp_all_db[$table][$value->Field])) {
                        if (strpos(strval($value->Type), strval($tmp_all_db[$table][$value->Field]['type'])) !== false) {
                        } else {
                            $err_msgs[] = $value->Field . ' field - ' . $tmp_all_db[$table][$value->Field]['type'] . ' type is missing';
                        }
                    } else {
                        $err_msgs[] = $value->Field . ' field is missing';
                    }
                }
            } else {
                $err_msgs[] = $table . ' table is missing';
            }
        }

        $resultado['err_msgs'] = $err_msgs;

        return $resultado;
    }
}
