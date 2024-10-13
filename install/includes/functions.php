<?php

function cleanhtml( $string, $trim = false ) {
	$string = filter_var( $string, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	$string = trim( $string );
	$string = stripslashes( $string );
	$string = strip_tags( $string );
	$string = str_replace( array( '‘', '’', '“', '”' ), array( "'", "'", '"', '"' ), $string );
	if ( $trim ) {
		$string = substr( $string, 0, $trim );
	}

	return $string;
}
// curl function
function apply_curl( $url ) {
	if ( is_callable( 'curl_init' ) ) {
		$ch = curl_init();
					curl_setopt( $ch, CURLOPT_URL, $url );
					// don't download content
					curl_setopt( $ch, CURLOPT_NOBODY, 1 );
					curl_setopt( $ch, CURLOPT_FAILONERROR, 1 );
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		if ( curl_exec( $ch ) !== false ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// get contents
function apply_getcontents( $url ) {
	return false;
	if ( @file_get_contents( $url, 0, null, 0, 1 ) ) {
		return true;} else {
		return false;}
}
// socks open
function apply_sockopen( $url ) {
	$fp = @fsockopen( $url, 80 );
	if ( $fp === false ) {
		return false;
	}
	return true;
}
// get headers
function apply_headers( $url ) {
	$headers = @get_headers( $url );
	if ( is_array( $headers ) ) {
		if ( strpos( $headers[0], '200' ) === false ) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;}
}

function do_post_request( $url, $data, $optional_headers = null ) {
	 $response = array();
	ob_start();
	$php_errormsg = 'something went wrong';
	$params       = array(
		'http' => array(
			'method'  => 'POST',
			'content' => $data,
		),
	);
	if ( $optional_headers !== null ) {
		$params['http']['header'] = $optional_headers;
	}
	$ctx = stream_context_create( $params );
	$fp  = @fopen( $url, 'rb', false, $ctx );
	if ( ! $fp ) {
		// throw new Exception("Problem with $url, $php_errormsg");
	}
	$response = @stream_get_contents( $fp );
	if ( $response === false ) {
		// throw new Exception("Problem reading data from $url, $php_errormsg");
	}
	ob_end_clean();
	return $response;
}

function calculateChecksum($filePath) {
	return hash_file('md5', $filePath);
}
function manifestIsOk(){
$status = true; 
	// Load the manifest file
	$cur = dirname(dirname(dirname(__FILE__))).'/';
	$manifestPath = $cur.'assets/backend/json/manifest.json';
	
	$manifest = json_decode(file_get_contents($manifestPath), true);
	
	// Function to calculate checksum of a file
	
	$failed=[];
	// Check the integrity of the uploaded files
	foreach ($manifest as $file => $expectedChecksum) {
		if(in_array($file, ['assets/backend/json/manifest.json','application/modules/formbuilder/views/forms/verify_pcode.php'
		])){
			continue;
		}
	    if (file_exists($cur.$file)) {
	        $actualChecksum = calculateChecksum($cur.$file);
	        if ($actualChecksum !== $expectedChecksum) {
	            $failed[]= $cur.$file;
	            $status = false;
	        }  
	    } else{
	        $failed[]= $cur.$file;
	        $status = false;
	    } 
	}
	
	return [
	'status'=> $status,
	'failed'=>$failed
	];
}