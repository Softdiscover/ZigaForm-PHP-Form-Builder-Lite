<?php
class Commonmodel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get( $table, $per_page = '', $segment = '' ) {
		 $this->db->order_by( 'id desc' );
		return $this->db->get( $table, $per_page, $segment )->result();
	}

	function insert( $table, $data ) {
		$this->db->set( $data );
		$this->db->insert( $table );
	}

	function update( $table, $id, $data ) {
		 $this->db->update( $table, $data, array( 'id' => $id ) );
	}

	function delete( $table, $id, $module = false, $module_id = false ) {
		$this->db->where( 'id', $id )->delete( $table );
	}


	function encrypt( $data ) {
		  return sha1( $this->config->item( 'encryption_key' ) . $data );
	}
}

