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
if (!defined('BASEPATH')) {
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
class model_record extends CI_Model
{
    

    public $table = "";
    public $tbform = "";
    public $tbformtype = "";
    public $tbformfields = "";
    
    /**
     * model_forms::__construct()
     * 
     * @return 
     */
    function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix . "uiform_form_records";
        $this->tbform = $this->db->dbprefix . "uiform_form";
        $this->tbformtype = $this->db->dbprefix . "uiform_fields_type";
        $this->tbformfields = $this->db->dbprefix . "uiform_fields";
    }
    
    function getListRecords($per_page = '', $segment = '') {
        $query = sprintf('
            select c.*,f.fmb_name
            from %s c
            join %s f on c.form_fmb_id=f.fmb_id
            where c.flag_status>0
            ORDER BY c.created_date desc
            ', $this->table, $this->tbform);

        $query.=sprintf(' limit %s,%s', (int)$segment, (int)$per_page);
        $query2 = $this->db->query($query);
        return $query2->result();
    }

    function getDetailRecord($names,$form_id) {
        if(intval($form_id)>0){
            $unique_names=array();
            $sql = 'select ';
            $temp = array();
            
            foreach ($names as $value) {
                if(!in_array(Uiform_Form_Helper::sanitizeFnamestring($value->fieldname), $unique_names)){
                    $temp[] = "extractvalue(fbh_data_rec_xml,'/params/child::" . $value->fmf_uniqueid . "') AS " . Uiform_Form_Helper::sanitizeFnamestring($value->fieldname);
                    $unique_names[]=Uiform_Form_Helper::sanitizeFnamestring($value->fieldname);
                }else{
                    $temp[] = "extractvalue(fbh_data_rec_xml,'/params/child::" . $value->fmf_uniqueid . "') AS " . Uiform_Form_Helper::sanitizeFnamestring($value->fieldname).count($unique_names);
                    $unique_names[]=Uiform_Form_Helper::sanitizeFnamestring($value->fieldname).count($unique_names);
                }
            }
            
            $temp[] = "r.fbh_id";
            $temp[] = "r.created_date";
            $sql.=implode(',', $temp) . ' from %1$s r';
            $sql.=' join %2$s frm on frm.fmb_id=r.form_fmb_id
                where r.flag_status>0 and r.form_fmb_id=%3$s'; 
            $query = sprintf($sql,$this->table,$this->tbform,(int)$form_id);

            $query2 = $this->db->query($query);
            return $query2->result();
        }else{
            return array();
        }
        
    }
    
    function getFieldOptRecord($rec_id,$f_type=null,$f_id=null,$f_atr1=null,$f_atr2=null) {
        if(intval($rec_id)>0){
            $result='';
           
            switch (intval($f_type)) {
                case 8:
                case 10:
                    /*radio button, select*/
                    $sql = "select extractvalue(fbh_data_rec_xml,'/params/child::".$f_id."_chosen') AS uifmoptvalue,";
                    $sql.='r.fbh_id,r.created_date';
                    $sql.=' from %1$s r';
                    $sql.=' join %2$s frm on frm.fmb_id=r.form_fmb_id
                        where r.flag_status>0 and r.fbh_id=%3$s'; 
                    $query = sprintf($sql,$this->table,$this->tbform,(int)$rec_id);
                     $query2 = $this->db->query($query);

                    $row = $query2->row();
                    
                    $chosen = $row->uifmoptvalue;
                    //get value or label
                    $sql = 'select ';
                    $temp = array();
                    $temp[] = "extractvalue(fbh_data_rec_xml,'/params/child::" . $f_id."_input_".$chosen. "_".$f_atr1."') AS uifmoptvalue";
                    $temp[] = "r.fbh_id";
                    $temp[] = "r.created_date";
                    $sql.=implode(',', $temp) . ' from %1$s r';
                    $sql.=' join %2$s frm on frm.fmb_id=r.form_fmb_id
                        where r.flag_status>0 and r.fbh_id=%3$s'; 
                    $query = sprintf($sql,$this->table,$this->tbform,(int)$rec_id); 
                   
                    $query2 = $this->db->query($query);

                    $row = $query2->row();
                    if (isset($row->uifmoptvalue)) {
                        return $row->uifmoptvalue;
                    } else {
                        return '';
                    }
                    
                    
                    break;
                case 9:
                case 11:
                    /*checkbox , Multiple select*/
                    $sql = "select extractvalue(fbh_data_rec_xml,'/params/child::".$f_id."_input_".$f_atr1."') AS uifmoptvalue,";
                    $sql.='r.fbh_id,r.created_date';
                    $sql.=' from %1$s r';
                    $sql.=' join %2$s frm on frm.fmb_id=r.form_fmb_id
                        where r.flag_status>0 and r.fbh_id=%3$s'; 
                    $query = sprintf($sql,$this->table,$this->tbform,(int)$rec_id);
                   
                    $query2 = $this->db->query($query);

                    $row = $query2->row();
                    if (isset($row->uifmoptvalue)) {
                        return $row->uifmoptvalue;
                    } else {
                        return '';
                    }
                    
                    
                    break;    
                default:
                   $option = $f_id.'_'.$f_atr1; 
                    
                    
                   $sql = 'select ';
                    $temp = array();
                    $temp[] = "extractvalue(fbh_data_rec_xml,'/params/child::" . $option . "') AS uifmoptvalue";
                    $temp[] = "r.fbh_id";
                    $temp[] = "r.created_date";
                    $sql.=implode(',', $temp) . ' from %1$s r';
                    $sql.=' join %2$s frm on frm.fmb_id=r.form_fmb_id
                        where r.flag_status>0 and r.fbh_id=%3$s'; 
                    $query = sprintf($sql,$this->table,$this->tbform,(int)$rec_id); 
                    
                    $query2 = $this->db->query($query);

                    $row = $query2->row();
                    if (isset($row->uifmoptvalue)) {
                        return $row->uifmoptvalue;
                    } else {
                        return '';
                    }
                    break;
            }
            
            
            
           
            
        }else{
            return '';
        }
        
    }
    
    function getNameFieldEnabledByForm($id_form,$filter=false) {
        
        if(intval($id_form)>0){
            $tmp_qu='select t.fby_id,f.fmf_uniqueid, coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname 
                from %s f 
                join %s t on f.type_fby_id=t.fby_id 
                join %s fm on fm.fmb_id=f.form_fmb_id
                where f.type_fby_id in (6,7,8,9,10,11,12,13,15,16,17,18,21,22,23,24,25,26,28,29,30,39,40,41,42,43) and';
            
            if($filter===true){
                $tmp_qu.=' f.fmf_status_qu=1 and';
            }
                        
            $tmp_qu.=' fm.fmb_id=%s order by f.order_rec asc';
            
            $query = sprintf($tmp_qu, $this->tbformfields, $this->tbformtype, $this->tbform, (int)$id_form);
              
        $query2 = $this->db->query($query);
        return $query2->result();
        }else{
            return array();
        }
        
        
    }

    function getAllNameFieldEnabledByForm($id_field) {
        if(intval($id_field)>0){
            $query = sprintf('select f.fmf_uniqueid, coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname 
        from %s f 
        join %s t on f.type_fby_id=t.fby_id 
        join %s fm on fm.fmb_id=f.form_fmb_id
        where f.type_fby_id in (6,7,8,9,10,11,12,13,15,16,17,18,21,22,23,24,25,26,28,29,30,39,40,41,42,43) and
        fm.fmb_id=%s order by f.order_rec asc', $this->tbformfields, $this->tbformtype, $this->tbform, (int)$id_field);

        $query2 = $this->db->query($query);
        return $query2->result();
        }else{
            return array();
        }
        
        
    }
    function getFormDataById($id_rec){
        $query = sprintf('select  f.fmb_name, frec.form_fmb_id, f.fmb_data
        from %s frec
        join %s f on f.fmb_id=frec.form_fmb_id
        where frec.flag_status>0
        and frec.fbh_id=%s', $this->table,$this->tbform,$id_rec);
        
        $query2 = $this->db->query($query);
        return $query2->row();
    }
    function getAllFieldsForReport($id_form) {
        $query = sprintf('select f.fmf_status_qu,f.fmf_uniqueid, coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname , f.order_rec
            from %s f 
            join %s t on f.type_fby_id=t.fby_id 
            where f.form_fmb_id=%s and f.type_fby_id in (6,7,8,9,10,11,12,13,15,16,17,18,21,22,23,24,25,26,28,29,30,39,40,41,42,43)', $this->tbformfields, $this->tbformtype, (int)$id_form);
        $query2 = $this->db->query($query);
        return $query2->result();
    }

    function getNameField($id_field) {
        $query = sprintf('select f.fmf_uniqueid,f.fmf_id, coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname 
        from %s f 
        join %s t on f.type_fby_id=t.fby_id 
        join %s fm on fm.fmb_id=f.form_fmb_id
        join %s rc on rc.form_fmb_id=fm.fmb_id
        where rc.fbh_id=%s', $this->tbformfields, $this->tbformtype, $this->tbform, $this->table, (int)$id_field);
        $query2 = $this->db->query($query);
        return $query2->result();
    }

    function getChartDataByIdForm($id_field) {
        $query = 'SELECT 
                                DATE_FORMAT(r.created_date ,"%Y-%m-%d") as days, COUNT(r.fbh_id) as requests
                                FROM ' . $this->table . ' r
                                WHERE r.flag_status>0  
                                AND DATE_FORMAT(r.created_date,"%e") BETWEEN 1 AND 31
				AND r.form_fmb_id=' . (int)$id_field . '
                                GROUP BY DAY(r.created_date)
                                ORDER BY r.created_date ASC
                                limit 31';
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    function getRecordById($id) {
        $query = sprintf('
            select uf.*
            from %s uf
            where uf.fbh_id=%s
            ', $this->table, (int)$id);

        $query2 = $this->db->query($query);
        return $query2->row();
    }
    
    function getOptRecordById($field, $id) {
        $query = sprintf('
            select uf.%s
            from %s uf
            where uf.fbh_id=%s
            ',$field, $this->table, (int)$id);

        $query2 = $this->db->query($query);
        
            $row = $query2->row();
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }
    }

    function CountRecords() {
        $query = sprintf('
            select COUNT(*) AS counted
            from %s c
            join %s f on c.form_fmb_id=f.fmb_id
            where c.flag_status>0
            ORDER BY c.created_date desc
            ',$this->table, $this->tbform);
        $query2 = $this->db->query($query);
        
        $row = $query2->row();
        if (isset($row->counted)) {
            return $row->counted;
        } else {
            return 0;
        }
    }
    
    
    function getFieldDataById($id_rec,$ui_field){
        $query = sprintf('select f.type_fby_id as type,f.fmf_data
            from %s f
            join %s t on f.type_fby_id=t.fby_id 
            join %s frm on f.form_fmb_id=frm.fmb_id
	    join %s frc on frc.form_fmb_id=frm.fmb_id
            where frc.fbh_id = %s and f.fmf_uniqueid="%s"', $this->tbformfields,$this->tbformtype,$this->tbform,$this->table,$id_rec,$ui_field);
        
        $query2 = $this->db->query($query);
        return $query2->row();
    }
    
}
?>