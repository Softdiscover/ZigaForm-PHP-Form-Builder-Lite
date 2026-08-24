<?php  if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
*/

$active_group  = 'default';
$active_record = true;

$db['default']['hostname'] = defined( 'ZGFM_DB_HOST' ) ? ZGFM_DB_HOST : '';
$db['default']['username'] = defined( 'ZGFM_DB_USER' ) ? ZGFM_DB_USER : '';
$db['default']['password'] = defined( 'ZGFM_DB_PASS' ) ? ZGFM_DB_PASS : '';
$db['default']['database'] = defined( 'ZGFM_DB_NAME' ) ? ZGFM_DB_NAME : '';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = 'fbcf_';
$db['default']['pconnect'] = true;
$db['default']['db_debug'] = defined( 'ZGFM_DB_DEBUG' ) ? (bool) ZGFM_DB_DEBUG : false;
$db['default']['cache_on'] = false;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '{PRE}';
$db['default']['autoinit'] = true;
$db['default']['stricton'] = false;


/*
 End of file database.php */
/* Location: ./application/config/database.php */

