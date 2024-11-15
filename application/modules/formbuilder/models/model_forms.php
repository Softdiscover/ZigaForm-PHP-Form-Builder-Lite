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
class model_forms extends CI_Model
{


    public $table = '';
    public $tbformtype = '';
    public $tbformfields = '';
    /**
     * model_forms::__construct()
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix . 'uiform_form';
        $this->tbformtype   = $this->db->dbprefix . 'uiform_fields_type';
        $this->tbformfields = $this->db->dbprefix . 'uiform_fields';
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
    public function getListFormsFiltered($data)
    {

        $per_page   = $data['per_page'];
        $segment    = $data['segment'];
        $search_txt = $data['search_txt'];
        $orderby    = $data['orderby'];

        $query = sprintf(
            '
			select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
				uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2, uf.fmb_type
			from %s uf
			where uf.flag_status>0 and uf.fmb_type in (0,1)',
            $this->table
        );

        if ( ! empty($search_txt)) {
            $query .= " and  uf.fmb_name like '%" . $search_txt . "%' ";
        }

        $orderby = ( $orderby === 'asc' ) ? 'asc' : 'desc';

        $query .= sprintf(' ORDER BY uf.updated_date %s ', $orderby);

        if ( (int) $per_page > 0) {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', (int) $segment, (int) $per_page);
        }

         $query2 = $this->db->query($query);
        return $query2->result();
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
    public function getListTrashFormsFiltered($data)
    {

        $per_page   = $data['per_page'];
        $segment    = $data['segment'];
        $orderby    = $data['orderby'];

        $query = sprintf(
            '
			select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
				uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
			from %s uf
			where uf.flag_status=0 and uf.fmb_type in (0,1)',
            $this->table
        );

        $orderby = ( $orderby === 'asc' ) ? 'asc' : 'desc';

        $query .= sprintf(' ORDER BY uf.updated_date %s ', $orderby);

        if ( (int) $per_page > 0) {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', (int) $segment, (int) $per_page);
        }

        $query2 = $this->db->query($query);
        return $query2->result();
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
    public function getListForms($per_page = '', $segment = '')
    {
        $query = sprintf(
            '
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.flag_status>0  and uf.fmb_type in (0,1)
            ORDER BY uf.updated_date desc
            ',
            $this->table
        );

        if ( (int) $per_page > 0) {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', (int) $segment, (int) $per_page);
        }

        $query2 = $this->db->query($query);
        return $query2->result();
    }

    public function getFormById($id)
    {
        $query = sprintf(
            '
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date, uf.fmb_parent,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2,uf.fmb_rec_tpl_html,uf.fmb_rec_tpl_st, uf.fmb_type, uf.fmb_parent
            from %s uf
            where uf.fmb_id=%s  
            ',
            $this->table,
            $id
        );

        $query2 = $this->db->query($query);

        return $query2->row();
    }

    public function getTitleFormById($id)
    {
        $query = sprintf(
            '
            select uf.fmb_name
            from %s uf
            where uf.fmb_id=%s
            ',
            $this->table,
            (int) $id
        );

        $query2 = $this->db->query($query);

        return $query2->row();
    }

    public function getAvailableFormById($id)
    {
        $query = sprintf(
            '
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where 
            uf.flag_status=1 and
            uf.fmb_id=%s
            ',
            $this->table,
            (int) $id
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }
    public function getChildFormByParentId($id)
    {
        $query = sprintf(
            '
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2, uf.fmb_rec_tpl_html, uf.fmb_rec_tpl_st, uf.fmb_type, uf.fmb_parent
            from %s uf
            where 
            uf.flag_status=1 and
            uf.fmb_parent=%s
            ',
            $this->table,
            $id
        );

        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    public function getFieldsById($id)
    {
        $query = sprintf(
            '
            select
            	f.fmf_uniqueid,
            	f.fmf_id,
            	coalesce(NULLIF(f.fmf_fieldname, ""), CONCAT(t.fby_name, f.fmf_id)) as fieldname ,
            	f.type_fby_id,
            	f.fmf_data,
            	fm.fmb_id
            from
            	%s f
            join %s t on
            	f.type_fby_id = t.fby_id
            join %s fm on
            	fm.fmb_id = f.form_fmb_id
            where fm.fmb_id = %s
            ',
            $this->tbformfields,
            $this->tbformtype,
            $this->table,
            $id
        );

        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    public function getFieldNamesById($id_form)
    {
        $query  = sprintf(
            'select f.fmf_uniqueid,f.fmf_id, fm.fmb_type, coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname 
        from %s f 
        join %s t on f.type_fby_id=t.fby_id 
        join %s fm on fm.fmb_id=f.form_fmb_id
        where fm.fmb_id=%s and t.fby_id in (8,9,10,11,16,18,39,40,41,42)',
            $this->tbformfields,
            $this->tbformtype,
            $this->table,
            (int) $id_form
        );
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    public function getFormById_2($id)
    {
        $query = sprintf(
            '
            select uf.fmb_data2,uf.fmb_name, uf.fmb_type, uf.fmb_rec_tpl_st
            from %s uf
            where uf.fmb_id=%s
            ',
            $this->table,
            (int) $id
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }

    public function CountForms()
    {
        $query  = sprintf(
            '
            select COUNT(*) AS counted
            from %s c
            where c.flag_status>0  and c.fmb_type in (0,1)
            ORDER BY c.updated_date desc
            ',
            $this->table
        );
        $query2 = $this->db->query($query);

        $row = $query2->row();
        if ( isset($row->counted)) {
            return $row->counted;
        } else {
            return 0;
        }
    }
    
    public function CountFormsByParent($parent)
    {
        $query  = sprintf(
            'SELECT COUNT(*)  AS counted FROM %s WHERE fmb_parent = %s',
            $this->table,
            $parent
        );
        $query2 = $this->db->query($query);

        $row = $query2->row();
        if ( isset($row->counted)) {
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
    public function getFormDefault()
    {
         $this->db->select('c.*');
        $this->db->from('{PRE}uiform_form c');
        $this->db->where(array( 'c.flag_status' => 1 ));
        $this->db->where_in('c.fmb_type', array(0, 1));
         
        $this->db->limit(1);
        return $this->db->get()->row();
    }


    /**
     * model_forms::getListActiveForms()
     * Get list active form estimators
     *
     * @return array
     */
    public function getListActiveForms()
    {
         $this->db->select('c.fmb_id, c.fmb_name, c.updated_date, c.created_date, c.flag_status');
        $this->db->from('{PRE}uiform_form c');
        $this->db->where(array( 'c.flag_status' => 1 ));
        $this->db->where_in('c.fmb_type', array(0, 1));
        $this->db->order_by('c.updated_date desc');
         
        return $this->db->get()->result();
    }

    /*
    * list all and trash forms
    */
    public function ListTotals()
    {
        $query = sprintf(
            '
			SELECT 
			  SUM(CASE WHEN flag_status = 0 THEN 1 ELSE 0 END) AS r_trash,
			  SUM(CASE WHEN flag_status != 0 THEN 1 ELSE 0 END) AS r_all
			FROM %s 
			WHERE fmb_type in (0,1)
			',
            $this->table
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }
}
