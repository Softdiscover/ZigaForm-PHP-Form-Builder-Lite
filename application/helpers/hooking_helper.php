<?php

if ( ! function_exists( 'get_hooking_instance' ) ) {
	function get_hooking_instance() {
		$ci = &get_instance();
		if ( ! isset( $ci->hooking ) ) {
			$ci->load->library( 'hooking' );
		}
		return $ci->hooking;
	}
}

if ( ! function_exists( 'add_action' ) ) {
	function add_action( $name, $callback, $priority = 50 ) {
		get_hooking_instance()->add_action( $name, $callback, $priority );
	}
}

if ( ! function_exists( 'remove_action' ) ) {
	function remove_action( $name, $callback ) {
		get_hooking_instance()->remove_action( $name, $callback );
	}
}

if ( ! function_exists( 'do_action' ) ) {
	function do_action( $name, $args = array() ) {

		get_hooking_instance()->do_action( $name, $args );
	}
}

if ( ! function_exists( 'add_filter' ) ) {
	function add_filter( $name, $callback, $priority = 50 ) {
		get_hooking_instance()->add_filter( $name, $callback, $priority );
	}
}

if ( ! function_exists( 'remove_filter' ) ) {
	function remove_filter( $name, $callback ) {
		get_hooking_instance()->remove_filter( $name, $callback );
	}
}

if ( ! function_exists( 'do_filter' ) ) {
	function do_filter( $name, $value ) {
		return get_hooking_instance()->do_filter( $name, $value );
	}
}


