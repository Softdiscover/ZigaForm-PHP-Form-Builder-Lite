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

		$form_id = ( isset( $_POST['rec_id'] ) && $_POST['rec_id'] ) ? Uiform_Form_Helper::sanitizeInput( $_POST['rec_id'] ) : 0;
		$where   = array(
			'fbh_id' => $form_id,
		);
		$data    = array(
			'flag_status' => 0,
		);

		$this->db->set( $data );
		$this->db->where( $where );
		$this->db->update( $this->model_record->table );
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
		require_once APPPATH . '/helpers/clientsniffer.php';
		$data['info_useragent'] = $data2['info_useragent'] = ClientSniffer::test( array( $data_record->fbh_user_agent ) );
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
	 * Records::list_records()
	 *
	 * @return
	 */
	public function list_records( $offset = 0 ) {

		// list all forms
		$data   = $config = array();
		$offset = ( isset( $_GET['offset'] ) ) ? Uiform_Form_Helper::sanitizeInput( $_GET['offset'] ) : 0;
		// create pagination
		$this->load->library( 'pagination' );
		$config['base_url']             = site_url() . 'formbuilder/records/list_records';
		$config['total_rows']           = $this->model_record->CountRecords();
		$config['per_page']             = $this->per_page;
		$config['first_link']           = 'First';
		$config['last_link']            = 'Last';
		$config['full_tag_open']        = '<ul class="pagination pagination-sm">';
		$config['full_tag_close']       = '</ul>';
		$config['first_tag_open']       = '<li>';
		$config['first_tag_close']      = '</li>';
		$config['last_tag_open']        = '<li>';
		$config['last_tag_close']       = '</li>';
		$config['cur_tag_open']         = '<li><span>';
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
		$data['query']              = $this->model_record->getListRecords( $this->per_page, $offset );
		$data['pagination']         = $this->pagination->create_links();

		$this->template->loadPartial( 'layout', 'records/list_records', $data );
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
