<?php

namespace Zigaform\Admin;

if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

use Zigaform\Template;

class List_data {


		/**
	 * Main instance
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 */
	public static function get() {
		static $instance;

		if ( is_null( $instance ) && ! ( $instance instanceof List_data ) ) {
			$instance = new List_data();
		}

		return $instance;
	}

	/**
	 * show list detail
	 */
	 public function list_detail($data2){
		
	    return Template::get()->render_template( 'admin/views/admin-list/list_detail.php', $data2, 'always' );
	 }
	
	/**
	 * show list detail records
	 */
	public function list_detail_records($data2){
		
	    return Template::get()->render_template( 'admin/views/admin-list/list_detail_records.php', $data2, 'always' );
	 }

	/**
	 * show list detail trash records
	 */
	public function list_detail_trashrecords($data2){
		
	    return Template::get()->render_template( 'admin/views/admin-list/list_detail_trashrecords.php', $data2, 'always' );
	 }

	/**
	 * show list detail records
	 */
	public function list_detail_invoices($data2){
		
	    return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoices.php', $data2, 'always' );
	 }

	/**
	 * show list detail trash records
	 */
	public function list_detail_invoicestrash($data2){
		
	    return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoicestrash.php', $data2, 'always' );
	 }

	/**
	 * header buttons use in record list
	 *
	 * @return void
	 */
	public function list_detail_record_headerbuttons(){
		$data=array();
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_record_headerbuttons.php', $data, 'always' );
	}
	
	/**
	 * header buttons use in record list
	 *
	 * @return void
	 */
	public function list_detail_invoice_headerbuttons(){
		$data=array();
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoice_headerbuttons.php', $data, 'always' );
	}
	
	/**
	 * header buttons use in record list
	 *
	 * @return void
	 */
	public function list_detail_trashrecord_headerbuttons(){
		$data=array();
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_trashrecord_headerbuttons.php', $data, 'always' );
	}
	
	/**
	 * header buttons use in record list
	 *
	 * @return void
	 */
	public function list_detail_invoicetrash_headerbuttons(){
		$data=array();
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoicetrash_headerbuttons.php', $data, 'always' );
	}
 
	/**
	 * header buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_form_headerbuttons(){
		$data=array();
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_form_headerbuttons.php', $data, 'always' );
	}
	
	/**
	 * buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_form_buttons($id){
		$data=array();
		$data['id']=$id;
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_form_buttons.php', $data, 'always' );
	}
	
	/**
	 * buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_record_buttons($id){
		$data=array();
		$data['id']=$id;
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_record_buttons.php', $data, 'always' );
	}
	
	/**
	 * buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_invoice_buttons($id){
		$data=array();
		$data['id']=$id;
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoice_buttons.php', $data, 'always' );
	}
	
	/**
	 * buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_trashrecord_buttons($id){
		$data=array();
		$data['id']=$id;
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_trashrecord_buttons.php', $data, 'always' );
	}
	
	/**
	 * buttons use in form list
	 *
	 * @return void
	 */
	public function list_detail_invoicetrash_buttons($id){
		$data=array();
		$data['id']=$id;
		return Template::get()->render_template( 'admin/views/admin-list/list_detail_invoicetrash_buttons.php', $data, 'always' );
	}
	
	/*
	* show list of records
	*/
	public function show_list($data2) {
		return Template::get()->render_template( 'admin/views/admin-list/show_list.php', $data2, 'always' );
	}


	/*
	* show all and trash
	*/
	public function subsubsub( $data ) {
		$data2          = array();
		$data2['all']   = $data['all'];
		$data2['trash'] = $data['trash'];
		$data2['subcurrent'] = $data['subcurrent'];
		return Template::get()->render_template( 'admin/views/admin-list/subsubsub.php', $data2, 'always' );

	}
	
	/*
	* show all and trash records
	*/
	public function subsubsub_records( $data ) {
		$data2          = array();
		$data2['all']   = $data['all'];
		$data2['trash'] = $data['trash'];
		$data2['subcurrent'] = $data['subcurrent'];
		return Template::get()->render_template( 'admin/views/admin-list/subsubsub_records.php', $data2, 'always' );

	}
	
	/*
	* show all and trash records
	*/
	public function subsubsub_invoices( $data ) {
		$data2          = array();
		$data2['all']   = $data['all'];
		$data2['trash'] = $data['trash'];
		$data2['subcurrent'] = $data['subcurrent'];
		return Template::get()->render_template( 'admin/views/admin-list/subsubsub_invoices.php', $data2, 'always' );

	}


}
