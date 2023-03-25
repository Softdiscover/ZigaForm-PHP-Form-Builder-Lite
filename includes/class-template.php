<?php
 
namespace Zigaform;

if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

class Template {

	/**
	* Main instance
	*
	* Ensure only one instance is loaded or can be loaded.
	*/
	public static function get() {
		static $instance;

		if ( is_null( $instance ) && ! ( $instance instanceof Template ) ) {
			$instance = new Template();
		}

		return $instance;
	}

	/**
	 * Render a template
	 *
	 * Allows parent/child themes to override the markup by placing the a file named basename( $default_template_path ) in their root folder,
	 * and also allows plugins or themes to override the markup by a filter. Themes might prefer that method if they place their templates
	 * in sub-directories to avoid cluttering the root folder. In both cases, the theme/plugin will have access to the variables so they can
	 * fully customize the output.
	 *
	 * @mvc @model
	 *
	 * @param  string $default_template_path The path to the template, relative to the plugin's `views` folder
	 * @param  array  $variables             An array of variables to pass into the template's scope, indexed with the variable name so that it can be extract()-ed
	 * @param  string $require               'once' to use require_once() | 'always' to use require()
	 * @return string
	 */
	public function render_template( $default_template_path = false, $variables = array(), $require = 'once' ) {
		
			$template_path = dirname( __DIR__ ) . '/includes/' . $default_template_path;
			  
		if ( is_file( $template_path ) ) {
			extract( $variables );
			ob_start();

			if ( 'always' == $require ) {
				require $template_path;
			} else {
				require_once $template_path;
			}
			$template_content = ob_get_clean();
			//$template_content = \apply_filters( 'zigaform_include_template_content', ob_get_clean(), $default_template_path, $template_path, $variables );
		} else {
			$template_content = '';
		}

		return $template_content;
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
	protected static function loadPartial( $template = '', $view = '', $view_data = array(), $return = false ) {
		$data            = array();
		$data['content'] = self::render_template( $view, $view_data );
		// $this->set('content', $this->template_data['controller']->load->view($view, $view_data, true));
		// return $this->template_data['controller']->load->view($template, $this->template_data, $return);
		echo self::render_layout( $template, $data );
	}

}