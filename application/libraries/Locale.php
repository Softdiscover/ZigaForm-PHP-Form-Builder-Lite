<?php if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}

/*
Should be in : /application/librairies
Must be declare in /application/config/autoload.php in the
$autoload['libraries'] = array('your_other libraires','locale');
*/

require_once APPPATH . 'helpers/Gettext/src/autoloader.php';
require_once APPPATH . 'helpers/cldr-to-gettext-plural-rules/src/autoloader.php';

use Gettext\Translator;

class CI_Locale {


	var $lang_allowed = array(
		'en' => 'english',
		'es' => 'spanish',
		'fr' => 'french',
		'de' => 'german',
		'it' => 'italian',
		'pt' => 'portuguese',
		'ru' => 'russian',
		'ch' => 'chinese',
	); // Languages translated
	var $lang_default = 'en'; // default language
	var $domain       = 'yourdomain.com'; // name of the po files (I use the domain name , but It can be anything)
	var $lang         = '';


	function __construct() {

		$CI =& get_instance();
		$CI->load->library( 'form_validation' );
		$CI->load->library( 'session' );
		$CI->form_validation->set_rules( 'lang_select', 'lang_select', 'exact_length[2]' );
		$this->lang_default = 'en_US';

		if ( $CI->input->post( 'lang_select' ) ) {

			if ( $CI->form_validation->run() == true ) {
				$this->lang = $CI->input->post( 'lang_select' );
			} else {
				$this->lang = $this->lang_default;
			}

			$CI->session->set_userdata(
				array(
					'lang'     => $this->lang,
					'lang_txt' => $this->lang_allowed[ $this->lang ],
				)
			);

		} else {

			if ( ! $CI->session->userdata( 'lang' ) ) {

				if ( isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
									$this->lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
				} else {
					$this->lang = 'en_US';
				}

				if ( array_key_exists( $this->lang, $this->lang_allowed ) ) {

					$CI->session->set_userdata(
						array(
							'lang'     => $this->lang,
							'lang_txt' => $this->lang_allowed[ $this->lang ],
						)
					);

				} else {
					$CI->session->set_userdata(
						array(
							'lang'     => $this->lang_default,
							'lang_txt' => $this->lang_allowed[ $this->lang_default ],
						)
					);
				}
			}
		}

		$del = array( $CI->session->userdata( 'lang' ) => $CI->session->userdata( 'lang_txt' ) );
		$CI->session->set_userdata( 'lang_allowed', array_diff( $this->lang_allowed, $del ) );

			$this->load( $CI->session->userdata( 'lang' ) );

	}

		/**
		 * Load a language file
		 *
		 * @access  public
		 * @param   mixed   the name of the language file to be loaded. Can be an array
		 * @param   string  the language (english, etc.)
		 * @param   bool    return loaded array of translations
		 * @param   bool    add suffix to                              $langfile
		 * @param   string  alternative path to look for language file
		 * @return  mixed
		 */
	public function load( $lang = 'en_US' ) {
		   $lang_allowed = array(
			   'en' => 'en_US',
			   'es' => 'es_ES',
			   'fr' => 'fr_FR',
			   'de' => 'de_DE',
			   'it' => 'it_IT',
			   'pt' => 'pt_BR',
			   'ru' => 'ru_RU',
			   'ch' => 'zh_CN',
		   ); // Languages translated
		   if ( !empty( $lang_allowed[$lang] ) ) {
			   $lang_pre = $lang_allowed[$lang];
			} else if($lang !='') {	   
				$lang_pre = $lang;
		   } else {
			   $lang_pre = 'en_US';
		   }

		 

			// setlocale(LC_ALL, $CI->session->userdata('lang').'_'.strtoupper($CI->session->userdata('lang')).'.UTF-8');
		   // setlocale(LC_NUMERIC, $CI->session->userdata('lang').'_'.strtoupper($CI->session->userdata('lang')).'.UTF-8');
		   // bindtextdomain(strtolower($this->domain),  APPPATH.'/language/locales/');
		   // textdomain(strtolower($this->domain));

				// Create a new instance of the translator
				$t = new Translator();

				// Load the translations using any of the following ways:
				// die($CI->session->userdata('lang_txt'));
				// 3. using a Gettext\Translations instance (slower)
				$translations = Gettext\Translations::fromPoFile( FCPATH . 'i18n/languages/backend/wprockf-' . $lang_pre . '.po' );
				$t->loadTranslations( $translations );
				$translations = Gettext\Translations::fromPoFile( FCPATH . 'i18n/languages/front/wprockf-' . $lang_pre . '.po' );
				$t->loadTranslations( $translations );
				// Now you can use it in your templates

				$t->register();
			   // echo $CI->session->userdata('lang_txt');
			   // die();
				// echo __('if you enable attachment option, make sure your web server (hosting) and mail server support your maximum size file');

				// __e('Date');

			   // header('Content-Type: text/html; charset=utf-8');

				// die();
	}
}
