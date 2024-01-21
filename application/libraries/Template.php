<?php
/**
 * Template
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: Template.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */


if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
/**
 * Template
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
class Template {


	var $template_data = array();

	/**
	 * Set name
	 *
	 * @param string $name  username
	 * @param string $value password
	 *
	 * @return  array
	 */
	function set( $name, $value ) {
		 $this->template_data[ $name ] = $value;
	}

	/**
	 * Load template
	 *
	 * @param string  $template  template
	 * @param string  $view      view
	 * @param string  $view_data view_data
	 * @param boolean $return    return
	 *
	 * @return  array
	 */
	function load( $template = '', $view = '', $view_data = array(), $return = false ) {
		$this->CI = & get_instance();
		$this->set( 'content', $this->CI->load->view( $view, $view_data, true ) );
		return $this->CI->load->view( $template, $this->template_data, $return );
	}

	/**
	 * Load partial
	 *
	 * @param string  $template  template
	 * @param string  $view      view
	 * @param string  $view_data view_data
	 * @param boolean $return    return
	 *
	 * @return  array
	 */
	function loadPartial( $template = '', $view = '', $view_data = array(), $return = false ) {
		$this->set( 'content', $this->template_data['controller']->load->view2( $view, $view_data, true ) );
		return $this->template_data['controller']->load->view2( $template, $this->template_data, $return );
	}

	/**
	 * Load partial 2
	 *
	 * @param string  $template  template
	 * @param string  $view      view
	 * @param string  $view_data view_data
	 * @param boolean $return    return
	 *
	 * @return  array
	 */
	function loadPartial2( $template = '', $view_data = array(), $return = false ) {
		 $this->set( 'content', $view_data );
		return $this->template_data['controller']->load->view2( $template, $this->template_data, $return );

	}

}

/*
 End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
