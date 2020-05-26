<?php ( defined( 'BASEPATH' ) ) or exit( 'No direct script access allowed' );

// application/core/MY_Exceptions.php
class MY_Exceptions extends CI_Exceptions {

	public function show_404( $page = '', $log_error = true ) {
		include APPPATH . 'config/routes.php';

		// By default we log this, but allow a dev to skip it
		if ( $log_error ) {
			log_message( 'error', '404 Page Not Found --> ' . $page );
		}

		if ( ! empty( $route['404_override'] ) ) {
			$CI = & get_instance();
			$CI->output->set_status_header( '404' );
			$data            = array();
			$data['heading'] = '404 Page Not Found';
			$data['message'] = '<p>The page you requested was not found.</p>';
			$CI->load->view( 'default/error/error', $data );
			echo $CI->output->get_output();
			exit;
		} else {

			$heading = '404 Page Not Found';
			$message = 'The page you requested was not found.';
			echo $this->show_error( $heading, $message, 'error_404', 404 );
			exit;
		}
	}

}
