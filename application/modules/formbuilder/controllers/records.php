<?php

/**
 * Intranet
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
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

use \Zigaform\Admin\List_data;

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
class Records extends BackendController {
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
	var $per_page = 50;
	protected $modules;

	/**
	 * Records::__construct()
	 *
	 * @return
	 */
	function __construct() {
		parent::__construct();
		$this->load->language_alt( model_settings::$db_config['language'] );
		$this->template->set( 'controller', $this );
		$this->load->model( 'model_forms' );
		$this->load->model( 'model_fields' );
		$this->load->model( 'model_record' );
	}

	public function ajax_list_record_updatest() {

		 
		$list_ids = ( isset( $_POST['id'] ) && $_POST['id'] ) ? array_map( array( 'Uiform_Form_Helper', 'sanitizeRecursive' ), $_POST['id'] ) : array();
		$form_st  = ( isset( $_POST['form_st'] ) && $_POST['form_st'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_st'] ) : '';
		$is_trash  = ( isset( $_POST['is_trash'] ) && $_POST['is_trash'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['is_trash'] ) : '';
		if ( $list_ids ) {

			if ( intval( $is_trash ) === 0 ) {
				switch ( intval( $form_st ) ) {
					case 1:
					case 2:
					case 0:
						foreach ( $list_ids as $value ) {
							$data  = array(
								'flag_status' => intval( $form_st ),
							);

							$this->db->set( $data );
							$this->db->where( 'fbh_id', $value );
							$this->db->update( $this->model_record->table );
						}
						break;
					default:
						break;
				}
			} else {
				switch ( intval( $form_st ) ) {
					case 1:
					case 2:
						foreach ( $list_ids as $value ) {
							$data  = array(
								'flag_status' => intval( $form_st ),
							);

							$this->db->set( $data );
							$this->db->where( 'fbh_id', $value );
							$this->db->update( $this->model_record->table );
						}
						break;
					case 0:
						foreach ( $list_ids as $value ) {

							$this->delete_form_process( $value );

						}

						break;
					default:
						# code...
						break;
				}
			}
		}
	}

	private function delete_form_process( $value ) {

		//remove from records
		$this->db->where( 'fbh_id', $value );
		$this->db->delete( $this->model_record->table );

	}

	/**
	 * Records::ajax_load_viewchart()
	 *
	 * @return
	 */
	public function ajax_load_viewchart() {

		$form_id = ( isset( $_POST['form_id'] ) && $_POST['form_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_id'] ) : 0;

		$data_chart = $this->model_record->getChartDataByIdForm( $form_id );

		$data         = array();
		$data['data'] = $data_chart;
		header( 'Content-Type: application/json' );
		echo json_encode( $data );
		die();
	}

	/**
	 * Records::ajax_load_savereport()
	 *
	 * @return
	 */
	public function ajax_load_savereport() {

		$form_id      = ( isset( $_POST['form_id'] ) && $_POST['form_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_id'] ) : 0;
		$data_fields  = ( isset( $_POST['data'] ) && ! empty( $_POST['data'] ) ) ? array_map( array( 'Uiform_Form_Helper', 'sanitizeRecursive' ), $_POST['data'] ) : array();
		$data_fields2 = ( isset( $_POST['data2'] ) && ! empty( $_POST['data2'] ) ) ? array_map( array( 'Uiform_Form_Helper', 'sanitizeRecursive' ), $_POST['data2'] ) : array();

		/* update all fields by form */
		$where = array( 'form_fmb_id' => $form_id );
		$data  = array( 'fmf_status_qu' => 0 );

		$this->db->set( $data );
		$this->db->where( $where );
		$this->db->update( $this->model_fields->table );
		// update the fields to show in list
		if ( ! empty( $data_fields ) ) {
			foreach ( $data_fields as $value ) {
				$where = array(
					'form_fmb_id'  => $form_id,
					'fmf_uniqueid' => $value,
				);
				$data  = array( 'fmf_status_qu' => 1 );

				$this->db->set( $data );
				$this->db->where( $where );
				$this->db->update( $this->model_fields->table );
			}
		}

		// update order for all fields according to form
		if ( ! empty( $data_fields2 ) ) {
			foreach ( $data_fields2 as $value ) {
				$where = array(
					'form_fmb_id'  => $form_id,
					'fmf_uniqueid' => $value['name'],
				);
				$data  = array( 'order_rec' => $value['value'] );

				$this->db->set( $data );
				$this->db->where( $where );
				$this->db->update( $this->model_fields->table );
			}
		}

		die();
	}

	/**
	 * Records::ajax_load_customreport()
	 *
	 * @return
	 */
	public function ajax_load_customreport() {

		$form_id = ( isset( $_POST['form_id'] ) && $_POST['form_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_id'] ) : 0;

		$all_fields = $this->model_record->getAllFieldsForReport( $form_id );

		$data                = array();
		$data['list_fields'] = $all_fields;

		$textfield_tmp = $this->load->view( 'formbuilder/records/custom_report_getAllfields', $data, true );
		echo $textfield_tmp;
		die();
	}

	/**
	 * Records::view_charts()
	 *
	 * @return
	 */
	public function view_charts() {

		$data               = array();
		$data['list_forms'] = $this->model_forms->getListForms();
		$this->template->loadPartial( 'layout', 'records/view_charts', $data );
	}

	/**
	 * Records::custom_report()
	 *
	 * @return
	 */
	public function custom_report() {

		$data               = array();
		$data['list_forms'] = $this->model_forms->getListForms();

		$this->template->loadPartial( 'layout', 'records/custom_report', $data );
	}

	/**
	 * Records::ajax_load_record_byform()
	 *
	 * @return
	 */
	public function ajax_load_record_byform() {

		$form_id = ( isset( $_POST['form_id'] ) && $_POST['form_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['form_id'] ) : 0;
		// records to show
		$name_fields            = $this->model_record->getNameFieldEnabledByForm( $form_id, true );
		$data                   = array();
		$data['datatable_head'] = $name_fields;
		// process record
		$flag_types = array();
		foreach ( $name_fields as $key => $value ) {

			$flag_types[ $key ] = $value->fby_id;

		}

		$pre_datatable_body = $this->model_record->getDetailRecord( $name_fields, $form_id );

		$new_record = array();
		foreach ( $pre_datatable_body as $key => $value ) {
			$count1 = 0;
			foreach ( $value as $key2 => $value2 ) {

				 $new_record[ $key ][ $key2 ] = $value2;

				if ( isset( $flag_types[ $count1 ] ) ) {
					switch ( intval( $flag_types[ $count1 ] ) ) {
						case 12:
						case 13:
							// checking if image exists
							if ( @is_array( getimagesize( $value2 ) ) ) {
								 $new_record[ $key ][ $key2 ] = '<img width="100px" src="' . $value2 . '"/>';
							}
							break;
						default:
							break;
					}
				}
				$count1++;

			}
		}

		$data['datatable_body'] = $new_record;
		$textfield_tmp          = $this->load->view( 'formbuilder/records/list_records_getdatatable', $data, true );
		echo $textfield_tmp;
		die();
	}

	/**
	 * Records::ajax_delete_record()
	 *
	 * @return
	 */
	public function ajax_delete_record() {

		$rec_id = ( isset( $_POST['rec_id'] ) && $_POST['rec_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['rec_id'] ) : 0;
		$is_trash = ( isset( $_POST['is_trash'] ) && $_POST['is_trash'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['is_trash'] ) : 0;

		if ( intval( $is_trash ) === 0 ) {
			$where   = array(
				'fbh_id' => $rec_id,
			);
			$data    = array(
				'flag_status' => 0,
			);

			$this->db->set( $data );
			$this->db->where( $where );
			$this->db->update( $this->model_record->table );
		} else {
			$this->delete_form_process( $rec_id );

		}

	}

	/**
	 * Records::info_records_byforms()
	 *
	 * @return
	 */
	public function info_records_byforms() {

		$data               = array();
		$data['list_forms'] = $this->model_forms->getListForms();
		$this->template->loadPartial( 'layout', 'records/list_records_byforms', $data );
	}

	/**
	 * Records::info_record()
	 *
	 * @return
	 */
	public function info_record() {

		$id_rec        = ( isset( $_GET['id_rec'] ) && $_GET['id_rec'] ) ? Uiform_Form_Helper::sanitizeInput( $_GET['id_rec'] ) : 0;
		$name_fields   = $this->model_record->getNameField( $id_rec );
		$form_rec_data = $this->model_record->getFormDataById( $id_rec );

		$name_fields_check = array();
		foreach ( $name_fields as $value ) {
			$name_fields_check[ $value->fmf_uniqueid ] = $value->fieldname;
		}
		$data_record     = $this->model_record->getRecordById( $id_rec );
		$record_user     = json_decode( $data_record->fbh_data, true );
		$new_record_user = array();

		foreach ( $record_user as $key => $value ) {
			if ( isset( $name_fields_check[ $key ] ) ) {
				$key = $name_fields_check[ $key ];
			}

			switch ( intval( $value['type'] ) ) {
				case 9:
				case 11:
					$new_record_user[] = array(
						'field' => $value['label'],
						'value' => $value['input_value'],
					);
					break;
				case 12:
				case 13:
					$value_new = $value['input'];
					// checking if image exists
					if ( @is_array( getimagesize( $value_new ) ) ) {
						 $value_new = '<img width="100px" src="' . $value_new . '"/>';
					}

					$new_record_user[] = array(
						'field' => $value['label'],
						'value' => $value_new,
					);
					break;
				default:
					  $new_record_user[] = array(
						  'field' => $value['label'],
						  'value' => $value['input'],
					  );
					break;
			}
		}

		$data                = array();
		$data2               = array();
		$data['record_id']   = $id_rec;
		$data['record_info'] = $data2['record_info'] = $new_record_user;
		$data['info_date']   = $data2['info_date'] = date( 'F j, Y, g:i a', strtotime( $data_record->created_date ) );
		$data['info_ip']     = $data2['info_ip'] = $data_record->created_ip;
		require_once APPPATH . 'helpers/Browser.php';
		$browser = new Browser( $data_record->fbh_user_agent );
		$data['info_useragent'] = $data2['info_useragent'] = $browser->getBrowser() . __( ' , version : ', 'frocket_front' ) . $browser->getVersion() . __( ' , platform : ', 'frocket_front' ) . $browser->getPlatform();
		$data['info_referer']   = $data2['info_referer'] = $data_record->fbh_referer;
		$data['form_name']      = $data2['form_name'] = $form_rec_data->fmb_name;
		$data2['info_labels']   = array(
			'title'           => __( 'Entry information', 'FRocket_admin' ),
			'info_submitted'  => __( 'Submitted form data', 'FRocket_admin' ),
			'info_additional' => __( 'Additional info', 'FRocket_admin' ),
			'info_date'       => __( 'Date', 'FRocket_admin' ),
			'info_ip'         => __( 'IP', 'FRocket_admin' ),
			'info_pc'         => __( 'Client PC info', 'FRocket_admin' ),
			'info_frmurl'     => __( 'Form URL', 'FRocket_admin' ),
			'form_name'       => __( 'Form name', 'FRocket_admin' ),
		);
		$data['info_export']    = Uiform_Form_Helper::base64url_encode( json_encode( $data2 ) );

		$data['fmb_rec_tpl_st']      = $form_rec_data->fmb_rec_tpl_st;
		$data['base_url']            = base_url();
			$data['form_id']         = $form_rec_data->form_fmb_id;
			$data['url_form']        = site_url() . 'formbuilder/frontend/pdf_show_record/?uifm_mode=pdf&is_html=1&id=' . $id_rec;
			$data['custom_template'] = $this->load->view( 'formbuilder/frontend/form_summary_custom', $data, true );

		$this->template->loadPartial( 'layout', 'records/info_record', $data );
	}

	/**
		 * list records
		 *
		 * @return void
		 */
	public function list_records() {
		$filter_data = get_option( 'zgfm_listrecords_searchfilter', true );
		$data2       = array();
		if ( empty( $filter_data ) && !isset($filter_data['orderby'])) {
			$data2['per_page']   = intval( $this->per_page );
			$data2['orderby']    = 'asc';
		} else {
			$data2['per_page']   = intval( $filter_data['per_page'] );
			$data2['orderby']    = $filter_data['orderby'];
		}

		$offset          = ( isset( $_GET['offset'] ) ) ? Uiform_Form_Helper::sanitizeInput( $_GET['offset'] ) : 0;
		$data2['offset'] = $offset;

		$form_data = $this->model_record->ListTotals();
		$data2['title'] = __( 'Records list', 'FRocket_admin' );
		$data2['all'] = $form_data->r_all;
		$data2['trash'] = $form_data->r_trash;
		$data2['header_buttons'] = List_data::get()->list_detail_record_headerbuttons();
		$data2['script_trigger'] = 'zgfm_back_general.recordslist_search_process();';
		$data2['subcurrent'] = 1;
		$data2['subsubsub'] = List_data::get()->subsubsub_records( $data2 );
		$data2['is_trash'] = 0;

		$content = List_data::get()->show_list( $data2 );
		echo $this->template->loadPartial2( 'layout', $content );
	}

	/**
	 * list trash records
	 *
	 * @return void
	 */
	public function list_trash_records() {
		$filter_data = get_option( 'zgfm_listrecords_searchfilter', true );
		$data2       = array();
		if ( empty( $filter_data ) && !isset($filter_data['orderby'])) {
			$data2['per_page']   = intval( $this->per_page );
			$data2['orderby']    = 'asc';
		} else {
			$data2['per_page']   = intval( $filter_data['per_page'] );
			$data2['orderby']    = $filter_data['orderby'];
		}

		$offset          = ( isset( $_GET['offset'] ) ) ? Uiform_Form_Helper::sanitizeInput( $_GET['offset'] ) : 0;
		$data2['offset'] = $offset;

		$form_data = $this->model_record->ListTotals();
		$data2['title'] = __( 'Records in trash', 'FRocket_admin' );
		$data2['all'] = $form_data->r_all;
		$data2['trash'] = $form_data->r_trash;
		$data2['header_buttons'] = List_data::get()->list_detail_trashrecord_headerbuttons();
		$data2['script_trigger'] = 'zgfm_back_general.recordslist_search_process();';
		$data2['subcurrent'] = 2;
		$data2['subsubsub'] = List_data::get()->subsubsub_records( $data2 );
		$data2['is_trash'] = 1;

		$content = List_data::get()->show_list( $data2 );
		echo $this->template->loadPartial2( 'layout', $content );
	}

	/**
	 * List trash forms
	 *
	 * @return void
	 */
	function ajax_recordlist_sendfilter() {

		$data_filter = ( isset( $_POST['data_filter'] ) && $_POST['data_filter'] ) ? $_POST['data_filter'] : '';

		$opt_save   = ( isset( $_POST['opt_save'] ) && $_POST['opt_save'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['opt_save'] ) : 0;
		$opt_offset = ( isset( $_POST['opt_offset'] ) && $_POST['opt_offset'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['opt_offset'] ) : 0;
		$is_trash = ( isset( $_POST['op_is_trash'] ) && $_POST['op_is_trash'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['op_is_trash'] ) : 0;

		parse_str( $data_filter, $data_filter_arr );

		$per_page   = $data_filter_arr['zgfm-listform-pref-perpage'];
		$orderby    = $data_filter_arr['zgfm-listform-pref-orderby'];

		$data               = array();
		$data['per_page']   = $per_page;
		$data['orderby']    = $orderby;
		$data['is_trash']    = $is_trash;

		update_option( 'zgfm_listrecords_searchfilter', $data );

		$data['segment'] = 0;
		$data['offset']  = $opt_offset;

		$result = $this->ajax_recordslist_refresh( $data );

		$json            = array();
		$json['content'] = $result;

		header( 'Content-Type: application/json' );
		echo json_encode( $json );
		die();
	}

	/**
	 * get forms in trash
	 *
	 * @param [type] $data
	 * @return void
	 */
	function ajax_recordslist_refresh( $data ) {

		$this->load->library( 'pagination' );

		$offset = $data['offset'];

		// list all forms
		$config                         = array();

		$tmp = $this->model_record->ListTotals();
		if ( intval( $data['is_trash'] ) === 0 ) {
			$config['base_url']             = site_url() . 'formbuilder/forms/list_records';
			$config['total_rows']           = $tmp->r_all;
		} else {
			$config['base_url']             = site_url() . 'formbuilder/forms/list_trash_records';
			$config['total_rows']           = $tmp->r_trash;
		}

		$config['per_page']             = $data['per_page'];
		$config['first_link']           = 'First';
		$config['last_link']            = 'Last';
		$config['full_tag_open']        = '<ul class="pagination pagination-sm">';
		$config['full_tag_close']       = '</ul>';
		$config['first_tag_open']       = '<li>';
		$config['first_tag_close']      = '</li>';
		$config['last_tag_open']        = '<li>';
		$config['last_tag_close']       = '</li>';
		$config['cur_tag_open']         = '<li class="zgfm-pagination-active"><span>';
		$config['cur_tag_close']        = '</span></li>';
		$config['next_tag_open']        = '<li>';
		$config['next_tag_close']       = '</li>';
		$config['prev_tag_open']        = '<li>';
		$config['prev_tag_close']       = '</li>';
		$config['num_tag_open']         = '<li>';
		$config['num_tag_close']        = '</li>';
		$config['page_query_string']    = true;
		$config['query_string_segment'] = 'offset';

		$this->pagination->initialize( $config );
		// If the pagination library doesn't recognize the current page add:
		$this->pagination->cur_page = $offset;

		$data2               = array();
		$data2['per_page']   = $data['per_page'];
		$data2['segment']    = $offset;
		$data2['orderby']    = $data['orderby'];
		$data2['is_trash']  = $data['is_trash'];

		if ( intval( $data2['is_trash'] ) === 0 ) {
			$data2['query'] = $this->model_record->getListAllRecordsFiltered( $data2 );
		} else {
			$data2['query'] = $this->model_record->getListTrashRecordsFiltered( $data2 );
		}

		$data2['pagination'] = $this->pagination->create_links();
		$data2['obj_list_data'] = List_data::get();

		if ( intval( $data2['is_trash'] ) === 0 ) {
			return List_data::get()->list_detail_records( $data2 );
		} else {
			return List_data::get()->list_detail_trashrecords( $data2 );
		}
	}


	public function action_pdf_show_record() {
		modules::run( 'formbuilder/frontend/pdf_show_record' );
	}

	public function action_csv_show_allrecords() {

		 $form_id = isset( $_GET['id'] ) ? Uiform_Form_Helper::sanitizeInput( $_GET['id'] ) : '';

		echo modules::run( 'formbuilder/records/csv_showAllForms', $form_id );

		die();
	}

	public function csv_showAllForms( $form_id ) {

		require_once APPPATH . '/helpers/exporttocsv.php';
		if ( false ) {
			$name_fields = $this->model_record->getNameFieldEnabledByForm( $form_id, true );
		} else {
			$name_fields = $this->model_record->getNameFieldEnabledByForm( $form_id, false );
		}
		$tmp_data                   = array();
		$tmp_data['datatable_head'] = $name_fields;
		$tmp_data['datatable_body'] = $this->model_record->getDetailRecord( $name_fields, $form_id );

		$data   = array();
		$tmp_ar = array();
		foreach ( $tmp_data['datatable_head'] as $value ) {
			$tmp_ar[] = $value->fieldname;
		}
		$data[] = $tmp_ar;

		foreach ( $tmp_data['datatable_body'] as $key => $value ) {
			$tmp_ar = array();
			foreach ( $value as $key => $value2 ) {
				//if ( $key != 'fbh_id' ) {
					$tmp_ar[] = $value2;
				//}
			}
			$data[] = $tmp_ar;
		}

		$tsv           = new ExportDataCSV( 'browser' );
		$tsv->filename = 'csv_' . $form_id . '.csv';

		$tsv->initialize();
		foreach ( $data as $row ) {
				$tsv->addRow( $row );
		}
		$tsv->finalize();
	}

}
