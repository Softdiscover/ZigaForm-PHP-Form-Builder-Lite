<?php

class SFM_Single_Google extends SFM_Single_Standard {

	/**
	 * @var array Variant names
	 */
	protected $variants;

	/**
	 * @var array Info on active variant, for image previews
	 */
	protected $variant;

	/**
	 * @var array URLs to TTF files with variants as array keys.
	 */
	protected $files;

	/**
	 * Path and URL to the plugin directory and uploads directory
	 */
	protected $file_paths;

	/**
	 * @string Variation of name for insertion into @import CSS string.
	 */
	protected $import_family;

	protected $png_url;

	/**
	 * Values for this font that should go into JSON encoded <option> values
	 */
	protected $option_value_whitelist = array( 'family', 'name', 'import_family', 'classname', 'png_url' );

	/**
	 * @var array Options to pass to javascript
	 */
	protected $options;

	public function __construct( $args = array() ) {
		parent::__construct( $args );

		$this->variants = $args['variants'];
		$this->files = $args['files'];
		$this->import_family = $this->get_import_family();
	}

	public function get_import_family() {
		return str_replace( ' ', '+', $this->family ) . ':' . implode( ',', $this->variants );
	}

	/**
	 * This function can lead to get_remote_ttf
	 * For that reason, it shouldn't be called on init
	 * Right now, it's only called in an AJAX request for a font preview
	 */
	public function get_variant( $variant_request = false ) {
		if ( isset( $this->variant ) ) {
			return $this->variant;
		}

		if ( empty( $variant_request ) && isset( $_GET['variant'] ) ) {
			$variant_request = $_GET['variant'];
		}

		if ( empty( $variant_request ) ) {
			// No variant requested. Give default.
			if ( in_array( 'regular', (array) $this->variants ) ) {
				$variant_name = 'regular';
			}else {
				$variant_name = $this->variants[0];
			}
		}else if ( in_array( $variant_request, (array) $this->variants ) ) {
			// Variant requested and found
			$variant_name = $variant;
		}

		if ( !$variant_name ) {
			// Requested a variant, but none found
			$variants = implode( '</li><li>', array_keys( (array) $this->variants ) );
			wp_die( 'Variant not found. Variants: <ul><li>' . $variants . '</li></ul>' );
		}

		// Variant meta
		$this->variant = array();
		$this->variant['name']     = $variant_name;
		$this->variant['filename'] = $this->get_nicename() . '-' . $variant_name;
		$this->variant['png_path'] = $this->get_png_path();
		$this->variant['png_url']  = $this->get_png_url();
		$this->variant['ttf_path'] = $this->get_ttf_path();
		$this->variant['ttf_url']  = $this->get_ttf_url();

		return $this->variant;
	}

	public function get_file_paths() {
		if ( isset( $this->file_paths ) ) {
			return $this->file_paths;
		}
		
		$plugin = SFM_Plugin::get_instance();

		$uploads = wp_upload_dir();
		$fonts_dir = '/styles-fonts';

		$this->file_paths = array(
			'plugin' => array(
				'path' => $plugin->get_plugin_directory() . $fonts_dir,
				'url'  => $plugin->get_plugin_url() . $fonts_dir,
			),
			'uploads' => array(
				'path' => $uploads['basedir'] . $fonts_dir,
				'url'  => $uploads['baseurl'] . $fonts_dir,
			),
		);
		return $this->file_paths;
	}

	/**
	 * @return string Path or URL to file if it exists in paths listed in get_file_paths()
	 */
	public function get_file( $path_or_url = 'path', $ext = 'png', $return_cache_path = false ) {
		$variant = $this->get_variant();

		$target = "/$ext/" . $variant['filename'] . ".$ext";
		$locations = $this->get_file_paths();

		foreach ( $locations as $location ) {
			$path = $location[ 'path' ] . $target;
			$url  = $location[ 'url' ]  . $target;

			if ( file_exists( $path ) ) {
				if ( 'path' == $path_or_url ) {
					return $path;
				}else {
					return $url;
				}
			}
		}

		if ( $return_cache_path ) {
			return $locations['uploads']['path'] . $target;
		}

		return false;
	}

	/**
	 * @return string URL of image preview PNG for the active variant
	 */
	public function get_png_url() {
		return $this->get_file( 'url', 'png' );
	}

	/**
	 * @return string path of image preview PNG for the active variant
	 */
	public function get_png_path() {
		return $this->get_file( 'path', 'png');
	}

	public function get_png_cache_path() {
		return $this->get_file( 'path', 'png', true );
	}

	/**
	 * @return string path of TTF for the active variant
	 */
	public function get_ttf_path() {
		return $this->get_file( 'path', 'ttf' );
	}

	public function get_ttf_cache_path() {
		return $this->get_file( 'path', 'ttf', true );
	}

	/**
	 * @return string Remote (google) URL of TTF for the active variant
	 */
	public function get_ttf_url() {
		$variant = $this->get_variant();
		$variant_name = $variant['name'];

		return $this->files->{$variant_name};
	}

	/**
	 * @return string sanatized font family name for use in file names.
	 */
	public function get_nicename() {
		if ( isset( $this->nicename ) ) {
			return $this->nicename;
		}
		$this->nicename = strtolower( preg_replace( '/[^a-zA-Z0-9]/', '', $this->family ) );
		return $this->nicename;
	}

	/**
	 * @return string path to the cached or downloaded TTF file
	 */
	public function maybe_get_remote_ttf() {
		$ttf_path = $this->get_ttf_path();

		if ( file_exists( $ttf_path ) ) {
			return $ttf_path;
		}else {
			return $this->get_remote_ttf();
		}
	}

	/**
	 * @return string path to the cached TTF file received from remote request.
	 */
	public function get_remote_ttf() {
		// Load filesystem
		if ( !function_exists('WP_Filesystem')) { require ABSPATH . 'wp-admin/includes/file.php'; }
		global $wp_filesystem;
		WP_Filesystem();

		// Create cache directory
		$dir = dirname( $this->get_ttf_path() );
		if ( !is_dir( $dir ) && !wp_mkdir_p( $dir ) ) { 
			wp_die( "Please check permissions. Could not create directory $dir" );
		}

		// Cache remote TTF to filesystem
		$ttf_file_path = $wp_filesystem->put_contents(
			$this->get_ttf_cache_path(),
			$this->get_remote_ttf_contents(),
			FS_CHMOD_FILE // predefined mode settings for WP files
		);

		// Check file saved
		if ( !$ttf_file_path ) {
			wp_die( "Please check permissions. Could not write font to $dir" );
		}
		
		return $this->get_ttf_path();
	}

	/**
	 * @return binary The active variant's TTF file contents
	 */
	public function get_remote_ttf_contents() {
		$ttf_url = $this->get_ttf_url();

		if ( empty( $ttf_url ) ) {
			wp_die( 'Font URL not set.' );
		}
		
		$response = wp_remote_get( $ttf_url );

		if ( is_a( $response, 'WP_Error') ) {
			wp_die( "Attempt to get remote font returned an error.<br/>$ttf_url" );
		}

		return $response['body'];
	}
	
}