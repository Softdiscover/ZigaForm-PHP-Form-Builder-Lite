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
class Settings extends MX_Controller {
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

    /**
     * Settings::__construct()
     * 
     * @return 
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_settings');
        $this->auth->authenticate(true);
    }
    
    
    public function ajax_blocked_getmessage() {
        // check_ajax_referer( 'zgfm_ajax_nonce', 'zgfm_security' );
        $message = (isset($_POST['message']) && $_POST['message']) ? Uiform_Form_Helper::sanitizeInput($_POST['message']) : '';
        
        $data=array();
        $data['message'] = $message;
        $json=array();
        $json['msg'] = $this->load->view('formbuilder/settings/blocked_getmessage', $data, true);
         header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Settings::backup_upload_file()
     * 
     * @return 
     */
    public function backup_upload_file() {

        require_once( APPPATH . 'helpers/uiform_backup.php');
        $dbBackup = new Uiform_Backup();
        $dbBackup->uploadBackupFile();
    }

    /**
     * Settings::ajax_backup_create()
     * 
     * @return 
     */
    public function ajax_backup_create() {
        $json = array();

        $name_bkp = (isset($_POST['uifm_frm_namebackup']) && $_POST['uifm_frm_namebackup']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_namebackup']) : '';

        $tables = array();
            $tables[] ='fbcf_uiform_fields';
            $tables[] ='fbcf_uiform_fields_type';
            $tables[] ='fbcf_uiform_form';
            $tables[] ='fbcf_uiform_form_log';
            $tables[] ='fbcf_uiform_form_records';
            $tables[] ='fbcf_uiform_settings';
            $tables[] ='fbcf_uiform_user';
            $tables[] ='fbcf_uiform_visitor';
        
           $name_bkp = (!empty($name_bkp))?$name_bkp:date('d-M-Y_H-i-s');
       
        
        require_once( APPPATH . 'helpers/uiform_backup.php');
        $dbBackup = new Uiform_Backup();
        
        $this->load->helper('file');
        
        $CI = & get_instance();
        $CI->load->database();
                
        if (extension_loaded('mysql') && (string)$CI->db->dbdriver==='mysql') {
            $this->load->dbutil();
            $prefs = array(
                'format' => 'sql',
                'filename' => $name_bkp . '.sql'
            );
            $backup = $dbBackup->backup_database_mysql($CI->db->hostname,$CI->db->username,$CI->db->password, $CI->db->database,$tables);
            $db_name = $name_bkp . '.sql';
            $save = FCPATH . '/backups/' . $db_name;
            
            write_file($save, $backup);
            //$this->load->helper('download');
            //force_download($db_name, $backup); 
            
        }else{
            
             
             
            $dir=FCPATH . 'backups';
            
            //mysqli
            $dbBackup->backup_database( $dir, $name_bkp, $CI->db->hostname,$CI->db->username,$CI->db->password, $CI->db->database,$tables);
            
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
    public function ajax_backup_restorefile() {
        $json = array();
        $uifm_frm_resfile = (isset($_POST['uifm_frm_resfile']) && $_POST['uifm_frm_resfile']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_resfile']) : '';
        require_once( APPPATH . 'helpers/uiform_backup.php');
        $dbBackup = new Uiform_Backup();
        $CI = & get_instance();
        $CI->load->database();
        if (extension_loaded('mysql') && (string)$CI->db->dbdriver==='mysql') {
            $dbBackup->restoreBackup($uifm_frm_resfile, $CI->db->database, $CI->db->username, $CI->db->password, $CI->db->hostname);
        }else{
            
            $dir = FCPATH . '/backups/';
            $file = $dir . $uifm_frm_resfile; // sql data file
            $args = file_get_contents($file); // get contents
            $dbBackup->mysqli_import_sql( $file,$uifm_frm_resfile,$args, $CI->db->hostname,$CI->db->username,$CI->db->password, $CI->db->database); // execute
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
    public function ajax_backup_deletefile() {
        $json = array();
        $uifm_frm_delfile = (isset($_POST['uifm_frm_delfile']) && $_POST['uifm_frm_delfile']) ? Uiform_Form_Helper::sanitizeInput($_POST['uifm_frm_delfile']) : '';
        $dir = FCPATH . '/backups/';
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
    public function ajax_save_options() {
        $opt_language = (isset($_POST['language']) && $_POST['language']) ? Uiform_Form_Helper::sanitizeInput($_POST['language']) : '';
        $data = array();
        $data['language'] = $opt_language;
        $where = array(
            'id' => 1
        );

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($this->model_settings->table);

        $result = $this->db->affected_rows();
        $json = array();
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
    public function view_settings() {
        $data = array();
        $query = $this->model_settings->getOptions();

        $list_lang = array();
        $list_lang[] = array('val' => '', 'label' => __('Select language', 'FRocket_admin'));
        $list_lang[] = array('val' => 'en', 'label' => __('english', 'FRocket_admin'));
        $list_lang[] = array('val' => 'es', 'label' => __('spanish', 'FRocket_admin'));
        $list_lang[] = array('val' => 'fr', 'label' => __('french', 'FRocket_admin'));
        $list_lang[] = array('val' => 'de', 'label' => __('german', 'FRocket_admin'));
        $list_lang[] = array('val' => 'it', 'label' => __('italian', 'FRocket_admin'));
        $list_lang[] = array('val' => 'pt', 'label' => __('portuguese', 'FRocket_admin'));
        $list_lang[] = array('val' => 'ru', 'label' => __('russian', 'FRocket_admin'));
        $list_lang[] = array('val' => 'zh', 'label' => __('chinese', 'FRocket_admin'));
        $data['language'] = $query->language;
        $data['lang_list'] = $list_lang;

        $this->template->loadPartial('layout', 'settings/view_settings', $data);
    }

    /**
     * Settings::backup_settings()
     * 
     * @return 
     */
    public function backup_settings() {
        if (isset($_POST['_uifm_bkp_submit_file']) && intval($_POST['_uifm_bkp_submit_file']) === 1) {
            $this->backup_upload_file();
        }

        $data = array();
        $dir = FCPATH . '/backups/';
        $data_files = array();
        if (is_dir($dir)) {
            $getDir = dir($dir);
            while (false !== ($file = $getDir->read())) {
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                if ($file != "." && $file != ".." && $ext == "sql") {
                    $temp_file = array();
                    $temp_file['file_name'] = $file;
                    $temp_file['file_url'] = base_url() . '/backups/' . $file;
                    $temp_file['file_date'] = date("F d Y H:i:s.", filemtime($dir . $file));
                    $temp_file['file_size']=Uiform_Form_Helper::human_filesize(filesize($dir.$file));
                    $data_files[] = $temp_file;
                }
            }
        }
        $data['files'] = $data_files;
        $this->template->loadPartial('layout', 'settings/backup_settings', $data);
    }
    
    public function system_check() {
        $data = array();
      
       $all_tables_tmp=$this->model_settings->getAllDatabases();
         
        $uiform_tbs=array();
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form_records";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_fields";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_fields_type";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_settings";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form_log";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon_details";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon_details_log";
 
        
        //tables
        $name_tb=array();
        $name_tb[$this->db->dbprefix . "uiform_form"]="Forms";
        $name_tb[$this->db->dbprefix . "uiform_form_records"]="Records";
        $name_tb[$this->db->dbprefix . "uiform_fields"]="Fields";
        $name_tb[$this->db->dbprefix . "uiform_fields_type"]="Types";
        $name_tb[$this->db->dbprefix . "uiform_settings"]="Settings";
        $name_tb[$this->db->dbprefix . "uiform_form_log"]="Form Log";
        $name_tb[$this->db->dbprefix . "uiform_addon"]="Addon";
        $name_tb[$this->db->dbprefix . "uiform_addon_details"]="Addon detail";
        $name_tb[$this->db->dbprefix . "uiform_addon_details_log"]="Addon log";

         $uiform_tbs_tmp=array();
        $count_err=0;
        foreach ($uiform_tbs as $value) {
           $tmp_tb=array();
            $tmp_tb['table']=$name_tb[$value];
            $tmp_tb['message'] = "";
            //check database
            (in_array($value, $all_tables_tmp))?$tmp_tb['status']=1:$tmp_tb['status']=0;
            
            //check columns
            $tmp_check=$this->check_Database_Column($value);
            
            if(!empty($tmp_check['err_msgs'])){
                $tmp_tb['status']=0;
                $tmp_tb['message'] = '<ul><li>'.implode("</li><li>", $tmp_check['err_msgs']).'</li></ul>';
            }
            
            if($tmp_tb['status']===0){
                $count_err++;
            }
            
            $uiform_tbs_tmp[]=$tmp_tb; 
        }
        
        $data['database_success']=1;
        if($count_err>0){
        $data['database_success']=0;    
        }
        
        $data['database_int']=$uiform_tbs_tmp;
         
        $this->template->loadPartial('layout', 'formbuilder/settings/system_check', $data);   
    }
    
     public function system_gendb_column(){
        
         $uiform_tbs=array();
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form_records";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_fields";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_fields_type";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_settings";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_form_log";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon_details";
        $uiform_tbs[] = $this->db->dbprefix . "uiform_addon_details_log";
        
        
        $tmp_all_db=array();
        
         foreach ($uiform_tbs as $value) {
            
            $row=$this->model_settings->getColsFromTable($value);
            
            //tables
            $resultado=array();
            
            $tmp_arr=array();
            if(!empty($row)){
                 foreach ($row as $key => $value2) {
                      $tmp_arr[]=$value2->Field;
                 }
            }
            
            $tmp_all_db[str_replace($this->db->dbprefix,'',$value)]=$tmp_arr;
        }
        
         

        //Encode the array into a JSON string.
        $encodedString = json_encode($tmp_all_db);

        //Save the JSON string to a text file.
        file_put_contents(APPPATH.'modules/formbuilder/views/settings/system_db.txt', $encodedString);
        
        die('database structure generated');
    }
    
    public function check_Database_Column($table){
        
        //Retrieve the data from our text file.
        $fileContents = file_get_contents(APPPATH.'modules/formbuilder/views/settings/system_db.txt');

        //Convert the JSON string back into an array.
        $tmp_all_db = json_decode($fileContents, true);
         
        //$row= $wpdb->get_results("SHOW COLUMNS FROM " . $table );
        $row=$this->model_settings->getColsFromTable($table);
        //tables
        $resultado=array();
        
        $err_msgs= array();
        
        $table = str_replace($this->db->dbprefix,'',$table);
        
        $col_st=false;
        if(!empty($row)){
            $tmp_arr=array();
             foreach ($row as $key => $value) {
                  if(isset($tmp_all_db[$table]) && in_array($value->Field, $tmp_all_db[$table])){
                 
                    if (($key2 = array_search($value->Field, $tmp_all_db[$table])) !== false) {
                            unset($tmp_all_db[$table][$key2]);
                        }
                    
                  }
             }
        }
        
        foreach ($tmp_all_db[$table] as $value) {
           $err_msgs[]=$value.' column is missing';
        }
        
       
        
        $resultado['err_msgs'] = $err_msgs;
        
        
        return $resultado;
        
        
    }
    

    

}
