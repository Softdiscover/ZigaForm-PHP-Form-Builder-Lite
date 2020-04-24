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
class model_fields extends CI_Model {


	public $table      = '';
	public $tbform     = '';
	public $tbformtype = '';

	/**
	 * model_forms::__construct()
	 *
	 * @return
	 */
	function __construct() {
		parent::__construct();

		$this->table      = $this->db->dbprefix . 'uiform_fields';
		$this->tbform     = $this->db->dbprefix . 'uiform_form';
		$this->tbformtype = $this->db->dbprefix . 'uiform_fields_type';
	}

	function queryGetListFieldsEnabled( $form_id ) {
		$query = sprintf(
			'select f.fmf_uniqueid,f.order_rec
            from %s f 
            where f.fmf_status_qu=1 and f.form_fmb_id=%s',
			$this->table,
			(int) $form_id
		);

		$query2 = $this->db->query( $query );
		return $query2->result();
	}

	function queryGetListFieldsById( $form_id ) {
		$query = sprintf(
			'select f.fmf_uniqueid,f.order_rec
            from %s f 
            where f.form_fmb_id=%s',
			$this->table,
			(int) $form_id
		);

		$query2 = $this->db->query( $query );
		return $query2->result();
	}

	function queryGetQtyFieldsEnabled( $form_id ) {
		$query  = sprintf(
			'select COUNT(*) as count
            from %s f 
            where f.fmf_status_qu=1 and f.form_fmb_id=%s',
			$this->table,
			(int) $form_id
		);
		$query2 = $this->db->query( $query );

		$row = $query2->row();
		if ( intval( $row->count ) > 0 ) {
			return 1;
		} else {
			return 0;
		}
	}

	function getFieldNameByUniqueId( $uid, $form_id ) {
		$query = sprintf(
			'
            select f.type_fby_id as type,f.fmf_data as data,coalesce(NULLIF(f.fmf_fieldname,""),CONCAT(t.fby_name,f.fmf_id)) as fieldname
            from %s f
            join %s t on f.type_fby_id=t.fby_id 
            join %s frm on f.form_fmb_id=frm.fmb_id
            where
            frm.fmb_id=%s
            and f.fmf_uniqueid="%s"',
			$this->table,
			$this->tbformtype,
			$this->tbform,
			(int) $form_id,
			$uid
		);

		$query2 = $this->db->query( $query );
		return $query2->row();
	}

	function getDataByUniqueId( $uid, $form_id ) {
		$query  = sprintf(
			'
            select fmf_data
            from %s f
            join %s frm
            where frm.fmb_id=%s
            and f.fmf_uniqueid="%s"
            ',
			$this->table,
			$this->tbform,
			(int) $form_id,
			$uid
		);
		$query2 = $this->db->query( $query );
		return $query2->row();
	}

}

