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
class model_forms extends CI_Model
{
    
    public $table = "";
    
    /**
     * model_forms::__construct()
     * 
     * @return 
     */
    function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix . "uiform_form";
    }
    
     /**
     * formsmodel::getListForms()
     * List form estimator
     * 
     * @param int $per_page max number of form estimators
     * @param int $segment  Number of pagination
     * 
     * @return array
     */
    function getListFormsFiltered($data) {
        
        $per_page = $data['per_page'];
        $segment = $data['segment'];
        $search_txt = $data['search_txt'];
        $orderby = $data['orderby'];
        
        $query = sprintf('
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.flag_status>0 ', $this->table);

        if(!empty($search_txt)){
            $query.=" and  uf.fmb_name like '%".$search_txt."%' ";
        }
        
        $orderby=($orderby==='asc')?'asc':'desc';
        
        $query.=sprintf(" ORDER BY uf.updated_date %s ",$orderby);
        
        if ($per_page != '' || $segment != '') {
            $segment=(!empty($segment))?$segment:0;
            $query.=sprintf(' limit %s,%s', (int)$segment, (int)$per_page);
        }
        
         $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    /**
     * model_forms::getListForms()
     * List form estimator
     * 
     * @param int $per_page max number of form estimators
     * @param int $segment  Number of pagination
     * 
     * @return array
     */
    function getListForms($per_page = '', $segment = '') {
        $query = sprintf('
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.flag_status>0 
            ORDER BY uf.updated_date desc
            ', $this->table);

        if ($per_page != '' || $segment != '') {
            $segment=(!empty($segment))?$segment:0;
            $query.=sprintf(' limit %s,%s', (int)$segment,(int) $per_page);
        }
        
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    function getFormById($id) {
        $query = sprintf('
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.fmb_id=%s
            ', $this->table, (int)$id);
        
        $query2 = $this->db->query($query);
        
        return $query2->row();
    }
    
    function getTitleFormById($id) {
        $query = sprintf('
            select uf.fmb_name
            from %s uf
            where uf.fmb_id=%s
            ', $this->table, (int)$id);

        $query2 = $this->db->query($query);
        
        return $query2->row();
    }
    
    function getAvailableFormById($id) {
        $query = sprintf('
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where 
            uf.flag_status=1 and
            uf.fmb_id=%s
            ', $this->table, (int) $id);

        $query2 = $this->db->query($query);
        return $query2->row();
    }

    function getFormById_2($id) {
        $query = sprintf('
            select uf.fmb_data2,uf.fmb_name
            from %s uf
            where uf.fmb_id=%s
            ', $this->table, (int) $id);
         
        $query2 = $this->db->query($query);
        return $query2->row();
    }

    function CountForms() {
         $query = sprintf('
            select COUNT(*) AS counted
            from %s c
            where c.flag_status=1 
            ORDER BY c.updated_date desc
            ', $this->table);
        $query2 = $this->db->query($query);
        
        $row = $query2->row();
        if (isset($row->counted)) {
            return $row->counted;
        } else {
            return 0;
        }
    }
    
    /**
     * model_forms::getFormDefault()
     * Get form estimator by default
     * 
     * @return array
     */
    function getFormDefault()
    {
        $this->db->select('c.*');
        $this->db->from('{PRE}uiform_form c');
        $this->db->where(array('c.fmb_default' => 1));
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    
    
    /**
     * model_forms::getListActiveForms()
     * Get list active form estimators
     * 
     * @return array
     */
    function getListActiveForms()
    {
        $this->db->select('c.fmb_id, c.fmb_name, c.updated_date, c.created_date, c.flag_status');
        $this->db->from('{PRE}uiform_form c');
        $this->db->where(array('c.flag_status' => 1));
        $this->db->order_by('c.updated_date desc');
        return $this->db->get()->result();
    }
    
     
    
}
?>