<?php

class SFM_Group_Google extends SFM_Group {

	const font_api_url    = 'https://www.googleapis.com/webfonts/v1/webfonts';
	const import_template = '@import url(//fonts.googleapis.com/css?family=@import_family@);/r';

	/**
	 * @example Override with <code>add_filter( 'styles_google_fonts_cache_interval', function(){ return 60*60*24*1; } );</code>
	 * @var int Seconds before cache expires. Defaults to 15 days.
	 */
	var $cache_interval;

	/**
	 * @var stdClass Response from Google API listing all fonts
	 */
	protected $font_data;

	/**
	 * @var array Array of SFM_Single_Google instances instantiated from $font_data
	 */
	protected $fonts;

	/**
	 * @var string CSS for display of font previews in the menu.
	 */
	protected $menu_css;

	/**
	 * Values to pass to javascript
	 */
	protected $option_values;

	/**
	 * @var string path to JSON backup of Google API response. In case API fails or is unavailable.
	 */
	protected $api_fallback_file;

	public function __construct() {
		// $this->cache_interval = apply_filters( 'styles_google_fonts_cache_interval', 60*60*24*15 ); // 15 days
		$this->api_fallback_file = dirname( dirname( __FILE__ ) ) . '/js/google-fonts-api-fallback.json';
	}

	/**
	 * Fires when accessing $this->font_data from outside the class.
	 */
	public function get_font_data() {
		// If we already processed fonts, return them.
		if ( ! empty( $this->font_data ) ) {
			return $this->font_data;
		}

		// If fonts are cached in the transient, return them.
		$this->font_data = get_transient( 'styles_google_fonts' );
		if ( false !== $this->font_data ) {
			return $this->font_data;
		}

		/**
		 * If no cache, try connecting to Google API
		 * Requires API key be set:
		 *
		 * @example
		 *  add_filter( 'styles_google_font_api', create_function('', "return 'XXXXXXXX';" ) );
		 */
		$this->font_data = $this->remote_get_google_api();

		// If Google API failed, use the fallback file.
		if ( ! is_object( $this->font_data ) || ! is_array( $this->font_data->items ) ) {
			$this->font_data = $this->get_api_fallback();
			return $this->font_data;
		}

		// API returned some good data. Cache it to the transient
		// and update the fallback file.
		// set_transient( 'styles_google_font_data', $this->font_data, $this->cache_interval );
		$this->set_api_fallback();

		return $this->font_data;
	}

	/**
	 * Fires when accessing $this->fonts from outside the class.
	 */
	public function get_fonts() {
		if ( ! empty( $this->fonts ) ) {
			return $this->fonts; }

		$fonts = array();

		foreach ( (array) $this->get_font_data()->items as $font ) {
			// Exclude non-latin fonts
			if ( ! in_array( 'latin', $font->subsets ) ) {
				continue; }

			$fonts[] = new SFM_Single_Google(
				array(
					'family'   => $font->family,
					'name'     => $font->family,
					'variants' => $font->variants,
					'files'    => $font->files,
				)
			);

		}

		$this->fonts = $fonts;

		return $this->fonts;
	}

	/**
	 * Get individual font by name
	 *
	 * @return SFM_Single_Google
	 */
	public function get_font_by_name( $name ) {
		if ( empty( $name ) ) {
			wp_die( 'Please specify a font family to preview.' );
		}

		foreach ( $this->get_fonts() as $font ) {
			if ( $name == $font->family ) {
				return $font;
			}
		}
		return false;
	}

	/**
	 * Strip out unecessary metadata for passing to javascript
	 *
	 * @param array $font Font metadata, such as array( 'key', 'import_family', 'font_family', 'font_name' )
	 * @return array Same array, stripped of extra keys
	 */
	public function get_option_values() {
		if ( ! empty( $this->option_values ) ) {
			return $this->option_values; }

		foreach ( $this->get_fonts() as $font ) {
			$this->option_values['fonts'][] = $font->get_option_values();
		}

		$this->option_values['import_template'] = self::import_template;
		$this->option_values['admin_ajax']      = '';

		return $this->option_values;
	}

	/**
	 * Connect to the remote Google API. Fall back to get_api_fallback on failure.
	 */
	public function remote_get_google_api() {
		// API key must be set with this filter
		$api_key = apply_filters( 'styles_google_font_api', false );

		// Bail if no API key is set
		if ( false === $api_key ) {
			return $this->get_api_fallback(); }

		// Construct request
		$url      = add_query_arg( 'sort', apply_filters( 'styles_google_font_sort', 'popularity' ), self::font_api_url );
		$url      = add_query_arg( 'key', $api_key, $url );
		$response = wp_remote_get( $url );

		// If response is an error, use the fallback file
		if ( is_a( $response, 'WP_Error' ) ) {
			return $this->get_api_fallback(); }

		return json_decode( $response['body'] );
	}

	/**
	 * If the we don't have a Google API key, or the request fails,
	 * use the contents of this file instead.
	 *
	 * @todo Rework this and set_api_fallback to use transients and write to disk using WP_Filesystem so we don't have two caching mechanisms going on at once.
	 */
	public function get_api_fallback() {
		$this->fonts = json_decode( file_get_contents( $this->api_fallback_file ) );
		return $this->fonts;
	}

	/**
	 * Save Google Fonts API response to file for cases where we
	 * don't have an API key or the API request fails
	 *
	 * @todo Write with WP_Filesystem instead of file_put_contents
	 */
	public function set_api_fallback() {
		if ( ! empty( $this->font_data ) && is_writable( $this->api_fallback_file ) ) {
			file_put_contents( $this->api_fallback_file, json_encode( $this->font_data ) );
		}
	}

}
