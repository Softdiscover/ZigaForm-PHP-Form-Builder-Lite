<?php

abstract class SFM_Group {

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

	public function get_menu_css() {
		if ( !empty( $this->menu_css ) ) {
			return $this->menu_css;
		}

		foreach( $this->get_fonts() as $font ) {
			$this->menu_css .= $font->get_menu_css();
		}

		return $this->menu_css;
	}

}