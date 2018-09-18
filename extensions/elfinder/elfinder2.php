<?php
define('BASEPATH', realpath(dirname(__FILE__) . '/../../'));
session_start();

require_once(BASEPATH. '/application/helpers/common_helper.php');
XSRFdefender('elFinder');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>
                <meta name="googlebot" content="noindex">
    <meta name="robots" content="noindex">
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" href="assets/js/jqueryui/jquery-ui.css" type="text/css" />
		<script src="assets/js/jquery.js" type="text/javascript"></script>
		<script src="assets/js/jqueryui/jquery-ui.js" type="text/javascript"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>
			

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
                   $().ready(function() {
                var elf = $('#elfinder').elfinder({
                   commands : [
							'open', 'reload', 'home', 'up', 'back', 'forward', 'getfile', 'quicklook',

				'download', 'rm', 'duplicate', 'rename', 'mkdir', 'mkfile', 'upload', 'copy',
								'cut', 'paste', 'edit', 'extract', 'archive', 'search',
								'resize',

			'info', 'view', 'help',
							'sort'
			],
							
							customData: {
							'XSRFToken':'<?php echo getXSRFToken('elFinder'); ?>',
											'origin':'tinyMCE'
							},
							url : 'php/connector_uifm.php', // connector URL (REQUIRED)
                                                        getFileCallback : function(file) {
                        window.opener.processFile(file);
                        window.close();
                    },
                    resizable: false
                }).elfinder('instance');
            });  
                    
            
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
