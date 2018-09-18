<?php

if ( isset($_GET['rkopt'])){

if (!defined('BASEPATH'))
        define('BASEPATH', dirname(__FILE__) . '/');
//require_once($wp_abs_path[0]."wp-load.php");    
require_once(BASEPATH . '../application/helpers/exporttocsv.php');
require_once(BASEPATH . '../application/helpers/common_helper.php');

    if(isset($_GET['rkopt']) && $_GET['rkopt']==='gencsv'){
        
       $tmp_html=(isset($_GET['rkcsv']) && $_GET['rkcsv'])?Uiform_Form_Helper::sanitizeInput_html($_GET['rkcsv']):'';
       $tmp_data=json_decode(Uiform_Form_Helper::base64url_decode($tmp_html),true);
       $tmp_formid=(isset($_GET['rk_form_id']) && $_GET['rk_form_id'])?Uiform_Form_Helper::sanitizeInput($_GET['rk_form_id']):0;
       $data=array();
       
       $tmp_ar=array();
       foreach ($tmp_data['datatable_head'] as $value) {
           $tmp_ar[]=$value['fieldname'];
       }
       $data[]=$tmp_ar;
       
       foreach ($tmp_data['datatable_body'] as $key => $value) {
           $tmp_ar=array();
            foreach ($value as $key=>$value2){
                if($key!='fbh_id'){
                    $tmp_ar[]=$value2;
                }
                
            }
            $data[]=$tmp_ar;
       }
       
        $tsv = new ExportDataCSV('browser');
        $tsv->filename = "csv_".$tmp_formid.".csv";
        
        $tsv->initialize();
        foreach($data as $row) {
                $tsv->addRow($row);
        }
        $tsv->finalize();
       
    }
   
}
?>
