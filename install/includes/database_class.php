<?php

class Database {

	// Function to the database and tables and fill them with the default data
	function create_database( $data ) {
		if ( isset( $data['mysqldbdriver'] ) && intval( $data['mysqldbdriver'] ) === 1 && extension_loaded( 'mysql' ) ) {
			return true;
		} elseif ( function_exists( 'mysqli_init' ) && extension_loaded( 'mysqli' ) ) {
			 // Connect to the database
			$mysqli = new mysqli( $data['mysqlhostname'], $data['mysqlusername'], $data['mysqlpassword'], '' );

			// Check for errors
			if ( mysqli_connect_errno() ) {
				return false;
			}

			// Create the prepared statement
			$mysqli->query( 'CREATE DATABASE IF NOT EXISTS ' . $data['mysqldbname'] );

			// Close the connection
			$mysqli->close();
			return true;
		} else {
			return false;
		}

	}

	// Function to create the tables and fill them with the default data
	function create_tables( $data ) {
			   $string_url = parse_url( $_SERVER['REQUEST_URI'] );
				$parts     = explode( '/', $string_url['path'] );
				$total     = count( $parts );
				$http_var  = isset( $_SERVER['HTTPS'] ) && strtolower( $_SERVER['HTTPS'] ) !== 'off' ? 'https' : 'http';
		if ( $total ) {
			array_pop( $parts );
			array_pop( $parts );
			$url = $http_var . '://' . $_SERVER['HTTP_HOST'] . implode( '/', $parts ) . '/';
		} else {
			$url = $http_var . '://' . $_SERVER['HTTP_HOST'] . $string_url['path'] . '/';
		}

		if ( isset( $data['mysqldbdriver'] ) && intval( $data['mysqldbdriver'] ) === 1 && extension_loaded( 'mysql' ) ) {
			 $link = mysql_connect( $data['mysqlhostname'], $data['mysqlusername'], $data['mysqlpassword'] );
			if ( ! $link ) {
					  $error = true;
					  // die('Could not connect: ' . mysql_error());
					  return false;
			}
			 mysql_query( 'CREATE DATABASE IF NOT EXISTS `' . $data['mysqldbname'] . '`;' );
			if ( ! mysql_select_db( $data['mysqldbname'], $link ) ) {
					   $error = true;
					   // die('Could not select database: ' . mysql_error());
					   return false;
			}

						  // Temporary variable, used to store current query
						  $templine = '';
			if ( ZIGAFORM_F_LITE === 1 ) {
				$lines = file( 'db/structure_lite.sql' );
			} else {
				$lines = file( 'db/structure.sql' );
			}

						  // Loop through each line
			foreach ( $lines as $line ) {
				// Skip it if it's a comment
				if ( substr( $line, 0, 2 ) == '--' || $line == '' ) {
							  continue;
				}

							  // Add this line to the current segment
							  $templine .= $line;
							  // If it has a semicolon at the end, it's the end of the query
				if ( substr( trim( $line ), -1, 1 ) == ';' ) {
					// Perform the query
					mysql_query( $templine ) or print( 'Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />' );
					// Reset temp variable to empty
					$templine = '';
				}
			}
						  mysql_close( $link );
						  return true;
		} elseif ( function_exists( 'mysqli_init' ) && extension_loaded( 'mysqli' ) ) {
			// Connect to the database
			$mysqli = new mysqli( $data['mysqlhostname'], $data['mysqlusername'], $data['mysqlpassword'], $data['mysqldbname'] );

			// Check for errors
			if ( mysqli_connect_errno() ) {
					return false;
			}

			if ( ZIGAFORM_F_LITE === 1 ) {
				$query2 = file_get_contents( 'db/structure_lite.sql' );
			} else {
				$query2 = file_get_contents( 'db/structure.sql' );
			}

			// Execute a multi query
			$mysqli->multi_query( $query2 );

			// Close the connection
			$mysqli->close();
			return true;
		} else {
			return false;
		}

	}

	function save_settings( $data ) {
		$message = '';
		$status  = false;
		try {

			if ( isset( $data['mysqldbdriver'] ) && intval( $data['mysqldbdriver'] ) === 1 && extension_loaded( 'mysql' ) ) {
				  // Connect to the database
				$link = mysql_connect( $data['mysqlhostname'], $data['mysqlusername'], $data['mysqlpassword'] );
				if ( ! $link ) {
					die( 'Could not connect: ' . mysql_error() );
				}
				mysql_select_db( $data['mysqldbname'] );

				$username     = ( isset( $data['username'] ) ) ? $data['username'] : '';
				$password     = ( isset( $data['password'] ) ) ? cleanhtml( $data['password'] ) : '';
				$company_name = ( isset( $data['company_name'] ) ) ? cleanhtml( $data['company_name'] ) : '';
				$site_email   = ( isset( $data['site_email'] ) ) ? cleanhtml( $data['site_email'] ) : '';

				$query = sprintf(
					"UPDATE `fbcf_uiform_settings` SET 
                    site_title = '" . cleanhtml( $company_name ) . "',
                    created_date = '" . date( 'Y-m-d h:i:s' ) . "',
                    admin_mail = '" . cleanhtml( $site_email ) . "'"
				);
				mysql_query( $query );
				$updated = mysql_affected_rows();

				if ( intval( $updated ) > 0 ) {
					$query = sprintf(
						"UPDATE `fbcf_uiform_user` SET 
                        use_login = '" . cleanhtml( $username ) . "',
                        use_password = '" . md5( cleanhtml( $password ) ) . "',
                        use_mail = '" . cleanhtml( $site_email ) . "' WHERE use_id=1"
					);
					mysql_query( $query );
					$id = mysql_insert_id();
				}

				mysql_close( $link );
				if ( isset( $id ) && intval( $id ) > 0 ) {
					$status = true;
				}
				return true;
			} elseif ( function_exists( 'mysqli_init' ) && extension_loaded( 'mysqli' ) ) {

				// Connect to the database
				$mysqli = new mysqli( $data['mysqlhostname'], $data['mysqlusername'], $data['mysqlpassword'], $data['mysqldbname'] );

				// Check for errors
				if ( mysqli_connect_errno() ) {
					die( 'Could not connect: ' . mysqli_connect_error() );
				}
				$username     = ( isset( $data['username'] ) ) ? $data['username'] : '';
				$password     = ( isset( $data['password'] ) ) ? cleanhtml( $data['password'] ) : '';
				$company_name = ( isset( $data['company_name'] ) ) ? cleanhtml( $data['company_name'] ) : '';
				$site_email   = ( isset( $data['site_email'] ) ) ? cleanhtml( $data['site_email'] ) : '';

				$query = sprintf(
					"UPDATE `fbcf_uiform_settings` SET 
                    site_title = '" . cleanhtml( $company_name ) . "',
                    created_date = '" . date( 'Y-m-d h:i:s' ) . "',
                    admin_mail = '" . cleanhtml( $site_email ) . "' WHERE id=1"
				);
				$mysqli->query( $query );
				$updated = $mysqli->affected_rows;

				if ( intval( $updated ) > 0 ) {
					$query = sprintf(
						"UPDATE `fbcf_uiform_user` SET 
                        use_login = '" . cleanhtml( $username ) . "',
                        use_password = '" . md5( cleanhtml( $password ) ) . "',
                        use_mail = '" . cleanhtml( $site_email ) . "' WHERE use_id=1"
					);
					$mysqli->query( $query );
					$id = $mysqli->insert_id;
				}

				// Close the connection
				$mysqli->close();
				if ( isset( $id ) && intval( $id ) > 0 ) {
					$status = true;
				}
				return true;

			} else {
				$status = false;
				return false;
			}

			return $status;

		} catch ( Exception $e ) {
			$message = $e->getMessage();
			return false;
		}

	}

}
