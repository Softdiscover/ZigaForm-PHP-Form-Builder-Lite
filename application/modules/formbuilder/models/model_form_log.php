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
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
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
class model_form_log extends CI_Model {


	public $table = '';

	/**
	 * model_forms::__construct()
	 *
	 * @return
	 */
	function __construct() {
		parent::__construct();
		$this->table = $this->db->dbprefix . 'uiform_form_log';
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


	function getListForms( $per_page = '', $segment = '' ) {
		$query = sprintf(
			'
            select uf.log_id,uf.log_frm_data,uf.log_frm_name,uf.log_frm_html,uf.log_frm_html_backend,uf.log_frm_html_css,uf.log_frm_id,uf.log_frm_hash,uf.flag_status,uf.created_date,uf.updated_date
            from %s uf
            where uf.flag_status>0 
            ORDER BY uf.updated_date desc
            ',
			$this->table
		);

		if ( $per_page != '' || $segment != '' ) {
			$segment = ( ! empty( $segment ) ) ? $segment : 0;
			$query  .= sprintf( ' limit %s,%s', $segment, $per_page );
		}

		$query2 = $this->db->query( $query );
		return $query2->result();
	}

	function getLogById( $id ) {
		$query = sprintf(
			'
            select uf.log_id,uf.log_frm_data,uf.log_frm_name,uf.log_frm_html,uf.log_frm_html_backend,uf.log_frm_html_css,uf.log_frm_id,uf.log_frm_hash,uf.flag_status,uf.created_date,uf.updated_date
            from %s uf
            where 
            uf.flag_status=1 and
            uf.log_id=%s  
            ',
			$this->table,
			$id
		);

		$query2 = $this->db->query( $query );

		return $query2->row();
	}


	function getAvailableLogById( $id ) {
		$query = sprintf(
			'
            select uf.log_id,uf.log_frm_data,uf.log_frm_name,uf.log_frm_html,uf.log_frm_html_backend,uf.log_frm_html_css,uf.log_frm_id,uf.log_frm_hash,uf.flag_status,uf.created_date,uf.updated_date
            from %s uf
            where 
            uf.flag_status=1 and
            uf.log_frm_id=%s 
            ORDER BY uf.updated_date desc
            ',
			$this->table,
			$id
		);

		 $query2 = $this->db->query( $query );
		return $query2->result();
	}

	function getLastLogById( $id ) {
		$query = sprintf(
			'
            select uf.log_id,uf.log_frm_data,uf.log_frm_name,uf.log_frm_html,uf.log_frm_html_backend,uf.log_frm_html_css,uf.log_frm_id,uf.log_frm_hash,uf.flag_status,uf.created_date,uf.updated_date
            from %s uf
            where uf.log_frm_id=%s
            ORDER BY uf.log_id desc
            LIMIT 1
            ',
			$this->table,
			$id
		);

		$query2 = $this->db->query( $query );
		return $query2->row();
	}

	function getOldLogById( $id ) {
		$query = sprintf(
			'
            select uf.log_id,uf.log_frm_data,uf.log_frm_name,uf.log_frm_html,uf.log_frm_html_backend,uf.log_frm_html_css,uf.log_frm_id,uf.log_frm_hash,uf.flag_status,uf.created_date,uf.updated_date
            from %s uf
            where uf.log_frm_id=%s
            ORDER BY uf.log_id asc
            LIMIT 1
            ',
			$this->table,
			$id
		);

		$query2 = $this->db->query( $query );
		return $query2->row();
	}

	function CountLogsByFormId( $id ) {
		$query  = sprintf(
			'
            select COUNT(*) AS counted
            from %s c
            where c.flag_status>0 
            and c.log_frm_id=%s
            ORDER BY c.updated_date desc
            ',
			$this->table,
			$id
		);
		$query2 = $this->db->query( $query );

		$row = $query2->row();
		if ( isset( $row->counted ) ) {
			return $row->counted;
		} else {
			return 0;
		}
	}


}

