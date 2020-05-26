<?php

class ClientSniffer {

	private /* String */ $user_agent;
	private /* Array  */ $db;

	private static /* Array */ $queues  = array();
	private static /* Array */ $traces  = array();
	private static /* Array */ $guesses = array();

	/* Extension utilities */

	private static function /* void */ teach( $context, $array ) {
		if ( ! isset( self::$queues[ $context[0] ] ) ) {
			self::$queues[ $context[0] ] = array();
		}
		if ( ! isset( self::$traces[ $context[1] ] ) ) {
			self::$traces[ $context[1] ] = array();
		}

		foreach ( $array as $item => $values ) {
			$synonyms = $values;

			if ( is_array( $values ) ) {
				if ( count( $values ) >= 2 && is_array( $values[1] ) ) {
					$synonyms = $values[0];

					if ( ! in_array( $item, self::$traces[ $context[1] ] ) ) {
						self::$traces[ $context[1] ][ $item ] = $values[1];
					}
				}
			}

			if ( ! $synonyms ) {
				$synonyms = $item;
			}

			if ( is_array( $synonyms ) ) {
				foreach ( $synonyms as $synonym ) {
					self::$queues[ $context[0] ][] = $synonym;
				}
			} else {
				self::$queues[ $context[0] ][] = $synonyms;
			}

			self::assume( array( $context[0] => $synonyms ), array( $context[0] => $item ) );
		}
	}

	public static function /* void */ assume( $if, $then ) {
		if ( ! is_array( $if ) || ! is_array( $then ) || count( $if ) == 0 || count( $then ) == 0 ) {
			return null;
		}

		self::$guesses[] = array( $if, $then );
	}

	public static function /* void */ systems( $array ) {
		self::teach( array( 'system_name', 'system_ver' ), $array );
	}

	public static function /* void */ browsers( $array ) {
		self::teach( array( 'browser_name', 'browser_ver' ), $array );
	}

	public static function /* void */ engines( $array ) {
		self::teach( array( 'engine_name', 'engine_ver' ), $array );
	}

	/* Static utilities */

	public static function /* boolean */ parse( $ua_string ) {
		if ( ! $ua_string || $ua_string == '' ) {
			return false;
		}

		$match = self::regexp( '/([a-z0-9]+\/?[0-9\.]* ?)+(\((?:[a-z0-9_\.\:\-\/ ]*(?:; )?)*\) ?)*(.*)/i', $ua_string );

		return $match;
	}

	private static function /* Array */ regexp( $regexp, $string ) {
		preg_match( $regexp, $string, $result );

		if ( count( $result ) > 1 && trim( implode( array_slice( $result, 1 ), '' ) ) != '' ) {
			return array_slice( $result, 1 );
		}

		return null;
	}

	/* String utilities */

	private function /* int */ search( $word, $string = null ) {
		$string = ( $string ) ? $string : $this->user_agent;
		$search = strpos( $string, $word );
		return ( ( $search !== false ) ? $search + strlen( $word ) : -1 );
	}

	private function /* String */ cut( $index ) {
		return ( substr( $this->user_agent, $index ) );
	}

	private function /* boolean */ contains( $word, $string = null ) {
		return ( $this->search( $word, $string ) != -1 );
	}

	/* Istance */

	public function /* Constructor */ __construct( $ua_string = null ) {
		if ( $ua_string && ! self::parse( $ua_string ) ) {
			die( 'Parsing has failed. Please provide a valid User-Agent string.' );
		}

		$this->user_agent = ( ( $ua_string ) ? $ua_string : $_SERVER['HTTP_USER_AGENT'] );

		$this->db = array(
			'system_name'  => null,
			'system_ver'   => null,

			'browser_name' => null,
			'browser_ver'  => null,

			'engine_name'  => null,
			'engine_ver'   => null,
		);

		$this->detect( array( 'system_name', 'system_ver' ) );
		$this->detect( array( 'browser_name', 'browser_ver' ) );
		$this->detect( array( 'engine_name', 'engine_ver' ) );

		$this->guess();
	}

	/* Database utilities */

	private function /* void */ set( $name, $value ) {
		$this->db[ $name ] = $value;
	}

	public function /* String */ get( $name ) {
		if ( isset( $this->db[ $name ] ) ) {
			return $this->db[ $name ];
		}

		return null;
	}

	public function /* boolean */ has( $name ) {
		return ( $this->get( $name ) != null );
	}

	public function /* String */ getUserAgent() {
		return $this->user_agent;
	}

	/* Detection utilities */

	private function /* void */ detect( $context ) {
		if ( ! isset( self::$queues[ $context[0] ] ) ) {
			return;
		}

		for ( $i = 0; $i < count( self::$queues[ $context[0] ] ) && ! $this->has( $context[0] ); ++$i ) {
			if ( $this->contains( self::$queues[ $context[0] ][ $i ] ) ) {
				$this->set( $context[0], self::$queues[ $context[0] ][ $i ] );
			}
		}

		if ( $this->has( $context[0] ) ) {
			$match = $this->trace( $context );
			if ( $match ) {
				$this->set( $context[1], trim( str_replace( '_', '.', $match[0] ), '.' ) );
			}
		}
	}

	private function /* Array */ trace( $context ) {
		$traces = self::$traces[ $context[1] ];

		$search = $this->get( $context[0] );
		$index  = $this->search( $search );
		$regexp = '/([0-9\._]*)/i';

		if ( isset( $traces[ $search ] ) ) {
			$index = -1;

			for ( $i = 0; $index == -1 && $i < count( $traces[ $search ] ); $i++ ) {
				$index = $this->search( $traces[ $search ][ $i ] );
			}
		}

		if ( $index == -1 ) {
			return null;
		}

		$string = trim( $this->cut( $index ), ' /' );
		$match  = self::regexp( $regexp, $string );

		return $match;
	}

	private function /* void */ guess() {
		foreach ( self::$guesses as $assumption ) {
			if ( is_array( $assumption ) && count( $assumption ) == 2 ) {
				$test = true;

				foreach ( $assumption[0] as $item => $values ) {
					$accum = false;

					if ( is_array( $values ) ) {
						foreach ( $values as $value ) {
							$accum = $accum || ( $this->get( $item ) == $value );
						}
					} else {
						$accum = ( $this->get( $item ) == $values );
					}

					$test = $test && $accum;
				}

				if ( $test ) {
					foreach ( $assumption[1] as $item => $value ) {
						$this->set( $item, $value );
					}
				}
			}
		}
	}

	public function /* String */ sniff() {
		/*$output = "<p><code>".$this->getUserAgent()."</code></p>\n";*/
		$output  = "<dl>\n";
		$output .= '<dt>OS</dt><dd>' . $this->get( 'system_name' ) . ' ' . $this->get( 'system_ver' ) . "</dd>\n";
		$output .= '<dt>Browser</dt><dd>' . $this->get( 'browser_name' ) . ' ' . $this->get( 'browser_ver' ) . "</dd>\n";
		$output .= '<dt>Engine</dt><dd>' . $this->get( 'engine_name' ) . ' ' . $this->get( 'engine_ver' ) . "</dd>\n";
		$output .= "</dl>\n";

		return $output;
	}

	public static function test( $tests ) {
		foreach ( $tests as $test ) {
			$sniffer = new self( $test );
			return $sniffer->sniff();
		}
	}

}

ClientSniffer::systems(
	array(
		'Windows' => array( 'Windows NT', 'Windows' ),
		'Mac OS'  => array( 'Mac OS X Leopard', 'Mac OS X', 'Mac', 'Macintosh', 'PowerPC', 'PPC' ),
		'Linux'   => array( 'Linux', 'FreeBSD', 'OpenBSD', 'NetBSD', 'SunOS', 'X11' ),
	)
);

ClientSniffer::browsers(
	array(
		'Links'             => null,
		'Midori'            => null,

		'Opera'             => array(
			null,
			array( 'Version', 'Opera' ),
		),

		'Camino'            => null,

		'Firefox'           => array( 'Firefox', 'Iceweasel', 'Minefield', 'Shiretoko', 'Namoroka', 'BonEcho', 'GranParadiso' ),
		'Internet Explorer' => array( 'MSIE' ),
		'Chrome'            => array( 'Chrome', 'ChromePlus', 'Iron' ),

		'Shiira'            => null,

		'Safari'            => array(
			null,
			array( 'Version' ),
		),

		'Konqueror'         => null,
		'iCab'              => null,

		'OmniWeb'           => null,
	)
);

ClientSniffer::engines(
	array(
		'WebKit'     => null,
		'KHTML'      => null,

		'Gecko'      => array(
			null,
			array( 'rv:' ),
		),

		'Trident'    => null,
		'Tasman'     => null,
		// "iCab"              => NULL,
			'Presto' => null,
	)
);


ClientSniffer::assume(
	array(
		'browser_name' => 'Internet Explorer',
		'system_name'  => 'Mac OS',
	),
	array( 'engine_name' => 'Tasman' )
);

ClientSniffer::assume(
	array(
		'browser_name' => 'Internet Explorer',
		'system_name'  => 'Windows',
	),
	array( 'engine_name' => 'Trident' )
);


ClientSniffer::assume(
	array(
		'browser_name' => 'Safari',
		'system_name'  => 'Linux',
	),
	array( 'engine_name' => null )
);

ClientSniffer::assume(
	array(
		'system_name' => 'Windows',
		'system_ver'  => array( '5', '5.0' ),
	),
	array( 'system_ver' => '2000' )
);

ClientSniffer::assume(
	array(
		'system_name' => 'Windows',
		'system_ver'  => array( '5.1', '5.2' ),
	),
	array( 'system_ver' => 'XP' )
);

ClientSniffer::assume(
	array(
		'system_name' => 'Windows',
		'system_ver'  => '6.0',
	),
	array( 'system_ver' => 'Vista' )
);

ClientSniffer::assume(
	array(
		'system_name' => 'Windows',
		'system_ver'  => array( '6.1', '6.2' ),
	),
	array( 'system_ver' => '7' )
);

ClientSniffer::assume(
	array(
		'browser_name' => 'OmniWeb',
	),
	array( 'engine_name' => 'WebKit' )
);

ClientSniffer::assume(
	array(
		'browser_name' => 'Konqueror',
		'engine_name'  => null,
	),
	array( 'engine_name' => 'KHTML' )
);

ClientSniffer::assume(
	array(
		'browser_name' => 'Opera',
		'engine_name'  => null,
	),
	array( 'engine_name' => 'Presto' )
);

