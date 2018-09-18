<?php

class SFM_Single_Standard {

	/**
	 * @var string Name of the font
	 */
	protected $name;

	/**
	 * Font family stack for output as CSS value
	 */
	protected $family;

	/**
	 * CSS class for output in Menu stylesheet
	 */
	protected $classname;

	/**
	 * Values for this font that should go into JSON encoded <option> values
	 */
	protected $option_value_whitelist = array( 'family', 'name', 'classname' );

	public function __construct( $args ) {
		$this->name = $args['name'];
		$this->family = $args['family'];
		$this->classname = $this->get_classname();
	}

	/**
	 * When we echo this class, output encoded JSON values
	 * 
	 * @return string JSON string of values
	 */
	public function __tostring() {
		return json_encode( $this->get_option_values() );
	}

	/**
	 * If client tries to access variables directly, pass to get() method
	 */
	public function __get( $target ) {
		return $this->get( $target );
	}

	/**
	 * If a get_XXX method exists for a variable, use it.
	 * Otherwise, return the variable value
	 */
	public function get( $target = 'fonts' ) {
		$method = 'get_' . $target;
		if ( method_exists( $this, $method ) ) {
			return $this->$method();
		}else if ( isset( $this->$target ) ){
			return $this->$target;
		}else {
			return false;
		}
	}

	/**
	 * Similar to WordPress sanatize_key.
	 * 
	 * @param string $key Name of a font.
	 * @return string Lowercase alphanumeric name of font without spaces.
	 */
	public function sanatize_key( $key ) {
		return strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $key ) );
	}

	/**
	 * Strip out unecessary metadata <select> option values
	 * 
	 * @param array $font Font metadata, such as array( 'key', 'import_family', 'font_family', 'font_name' )
	 * @return array Same array, stripped of extra keys
	 */
	public function get_option_values() {
		$option_values = array();

		foreach ( $this->option_value_whitelist as $key ) {
			$value = $this->get( $key );
			if ( !empty( $value ) ) {
				$option_values[ $key ] = htmlentities( $value );
			}
		}

		return $option_values;
	}

	/**
	 * Get CSS class for output in stylesheet
	 * 
	 * @return string CSS selector
	 */
	public function get_classname() {
		if ( !empty( $this->classname ) ) {
			return $this->classname;
		}
		$this->classname = $this->sanatize_key( $this->name );

		return $this->classname;
	}

	public function get_selector(){
		$plugin = SFM_Plugin::get_instance();

		return '.' . $plugin->menu_class . ' .' . $this->get_classname();
	}

	public function get_menu_css() {
		return $this->get_selector() . "{font-family:{$this->family}}" . PHP_EOL;
	}

}