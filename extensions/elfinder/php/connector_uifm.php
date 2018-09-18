<?php
error_reporting(0);
define('BASEPATH', realpath(dirname(__FILE__) . '/../../../'));
session_start();
 
require_once(BASEPATH. '/application/helpers/common_helper.php');

if (!defined('WEBPATH')) {
	define('WEBPATH', getRootWebPath());
}

define('UPLOAD_FOLDER', 'uploaded');

XSRFdefender('elFinder');

include_once BASEPATH . '/extensions/elfinder/php/elFinderConnector.class.php';
include_once BASEPATH . '/extensions/elfinder/php/elFinder.class.php';
include_once BASEPATH . '/extensions/elfinder/php/elFinderVolumeDriver.class.php';
include_once BASEPATH . '/extensions/elfinder/php/elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once SERVERPATH.'/'.ZENFOLDER.'/'.PLUGIN_FOLDER.'/elFinder/php/elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once SERVERPATH.'/'.ZENFOLDER.'/'.PLUGIN_FOLDER.'/elFinder/php/elFinderVolumeFTP.class.php';
// Required for Dropbox.com connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDropbox.class.php';
// # Dropbox volume driver need "dropbox-php's Dropbox" and "PHP OAuth extension" or "PEAR's HTTP_OAUTH package"
// * dropbox-php: http://www.dropbox-php.com/
// * PHP OAuth extension: http://pecl.php.net/package/oauth
// * PEAR�s HTTP_OAUTH package: http://pear.php.net/package/http_oauth
//  * HTTP_OAUTH package require HTTP_Request2 and Net_URL2
// Dropbox driver need next two settings. You can get at https://www.dropbox.com/developers
// define('ELFINDER_DROPBOX_CONSUMERKEY',    '');
// define('ELFINDER_DROPBOX_CONSUMERSECRET', '');

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 * */
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0	// if file/folder begins with '.' (dot)
                ? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
                : null;				 // else elFinder decide it itself
}

$opts = array();


	if (uifm_loggedin()) {
		$opts['roots'][0] = array(
						'driver'				 => 'LocalFileSystem',
						'startPath'			 => BASEPATH . '/' . UPLOAD_FOLDER . '/',
						'path'					 => BASEPATH . '/' . UPLOAD_FOLDER . '/',
						'URL'						 => WEBPATH . UPLOAD_FOLDER . '/',
						'mimeDetect'		 => 'internal',
						'tmbPath'				 => '.tmb',
						'utf8fix'				 => true,
						'tmbCrop'				 => false,
						'tmbBgColor'		 => 'transparent',
						'uploadAllow' => array('image'), # allow any images
                                                'uploadOrder'=> array( 'allow', 'deny' ),
						'accessControl'	 => 'access',
						'acceptedName'	 => '/^[^\.].*$/'
		);
	}


// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

