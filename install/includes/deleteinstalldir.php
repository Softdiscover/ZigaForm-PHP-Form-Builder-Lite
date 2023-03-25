<?php

require_once 'functions.php';

// ob_start();

	defined( 'HTDOCS_PATH' )
		|| define( 'HTDOCS_PATH', realpath( dirname( __FILE__ ) . '/../../' ) );

		$dir = HTDOCS_PATH . '/install';

		$it    = new RecursiveDirectoryIterator( $dir, RecursiveDirectoryIterator::SKIP_DOTS );
		$files = new RecursiveIteratorIterator(
			$it,
			RecursiveIteratorIterator::CHILD_FIRST
		);
		foreach ( $files as $file ) {
			if ( $file->isDir() ) {
				rmdir( $file->getRealPath() );
			} else {
				unlink( $file->getRealPath() );
			}
		}
		rmdir( $dir );

		if ( file_exists( $dir ) ) {
			$json['success'] = 0;
		} else {
			$json['success'] = 1;
		}


		$json = array();


		// ob_end_clean();

		echo json_encode( $json );


