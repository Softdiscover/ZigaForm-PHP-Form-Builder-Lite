<?php if ( ! defined( 'BASEPATH' ) ) {
    exit( 'No direct script access allowed' );}

class Zgfm_security {

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function require_admin_ajax( $controller ) {
        if ( ! is_object( $controller ) || ! isset( $controller->auth ) ) {
            return false;
        }

        $controller->auth->authenticate( true );

        return $this->is_ajax_request();
    }

    public function is_ajax_request() {
        return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest';
    }

    public function post( $key, $default = null ) {
        $value = $this->ci->input->post( $key, true );

        return $value !== false ? $value : $default;
    }

    public function json_success( array $data = array() ) {
        return $this->json_response(
            array(
                'success' => true,
                'data'    => $data,
            )
        );
    }

    public function json_error( $message, array $data = array() ) {
        return $this->json_response(
            array(
                'success' => false,
                'message' => $message,
                'data'    => $data,
            )
        );
    }

    public function json_response( array $payload ) {
        $this->ci->output
            ->set_content_type( 'application/json' )
            ->set_output( json_encode( $payload ) );
    }
}
