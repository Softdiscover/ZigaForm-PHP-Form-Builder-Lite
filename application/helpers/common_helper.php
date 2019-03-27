<?php
/**
 * Common functions
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: common_helper.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Uiform_Form_Helper {

    public static function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
    public static function getroute() {
        $return = array();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //post
            $return['module'] = isset($_POST['mod']) ? Uiform_Form_Helper::sanitizeInput($_POST['mod']) : '';
            $return['controller'] = isset($_POST['controller']) ? Uiform_Form_Helper::sanitizeInput($_POST['controller']) : '';
            $return['action'] = isset($_POST['action']) ? Uiform_Form_Helper::sanitizeInput($_POST['action']) : '';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //get
            $return['module'] = isset($_GET['mod']) ? Uiform_Form_Helper::sanitizeInput($_GET['mod']) : '';
            $return['controller'] = isset($_GET['controller']) ? Uiform_Form_Helper::sanitizeInput($_GET['controller']) : '';
            $return['action'] = isset($_GET['action']) ? Uiform_Form_Helper::sanitizeInput($_GET['action']) : '';
        } else {
            //request
            $return['module'] = isset($_REQUEST['mod']) ? Uiform_Form_Helper::sanitizeInput($_REQUEST['mod']) : '';
            $return['controller'] = isset($_REQUEST['controller']) ? Uiform_Form_Helper::sanitizeInput($_REQUEST['controller']) : '';
            $return['action'] = isset($_REQUEST['action']) ? Uiform_Form_Helper::sanitizeInput($_REQUEST['action']) : '';
        }
        return $return;
    }
    
    public static function getHttpRequest($var) {
        $var=  strval($var);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //post
            $value = isset($_POST[$var]) ? Uiform_Form_Helper::sanitizeInput($_POST[$var]) :'';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //get
            $value = isset($_GET[$var]) ? Uiform_Form_Helper::sanitizeInput($_GET[$var]) :'';
        } else {
            //request
            $value = isset($_REQUEST[$var]) ? Uiform_Form_Helper::sanitizeInput($_REQUEST[$var]) :'';
        }
        
        return $value;
    }
    
    
    public static function array2xml($array, $xml = null) {
        if (!isset($xml)) {
            $xml = new SimpleXMLElement('<params/>');
        }
        foreach ($array as $key => $value) {
            if (is_array($value) || is_object($value)) {
                Uiform_Form_Helper::array2xml($value, $xml);
            } else {
                if (is_numeric($key)) {
                    if (is_string($value)) {
                        $xml->addChild('item', htmlentities($value,ENT_NOQUOTES, "UTF-8"));
                    } else {
                        $xml->addChild('item', $value);
                    }
                } elseif (is_string($value)) {
                    $xml->addChild($key, htmlentities($value,ENT_NOQUOTES, "UTF-8"));
                } else {
                    $xml->addChild($key, $value);
                }
            }
        }
        return $xml->asXML();
    }

    public static function generate_pagination() {
        
    }

    public static function convert_HexToRGB($hex) {
        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }

        // Get decimal values
        $arr = array();
        $arr[] = $r = hexdec(substr($hex, 0, 2));
        $arr[] = $g = hexdec(substr($hex, 2, 2));
        $arr[] = $b = hexdec(substr($hex, 4, 2));

        return $arr;
    }

    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeInput($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = stripslashes($string);
        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
        $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('/[\n\r\t]/', ' ', $string);
        $string = trim($string, "\x00..\x1F");
            
        //$string = sanitize_text_field($string);
        return $string;
    }
    
    /**
     * Sanitize input 2
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeInput_html($string) {
        $string = stripslashes($string);
        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
        $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('/[\n\r\t]/', ' ', $string);
        $string = trim($string, "\x00..\x1F");
        return $string;
    }
    
    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeFnamestring($string) {
        $string = preg_replace('/\s+/', '', $string);
        $string= preg_replace("/'/i", '', $string);
        $string= preg_replace('/"/i', '', $string);
        $string= preg_replace('/[^\pL\pN]+/', '', $string);
        $string = preg_replace("/[^a-zA-Z0-9]+/", "", $string);
        $string= strtolower($string);
        return $string;
    }
    
    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeFileName($string) {
        $string = preg_replace('/\s+/', '', $string);
        $string= preg_replace("/'/i", '', $string);
        $string= preg_replace('/"/i', '', $string);
        $string= preg_replace('/[^\pL\pN_-]+/', '', $string);
        $string = preg_replace("/[^a-zA-Z0-9_-]+/", "", $string);
        $string= strtolower($string);
        return $string;
    }

    /**
     * Sanitize recursive
     * 
     * @param string $data array
     * 
     * @return array
     */
    public static function sanitizeRecursive($data) {
        if (is_array($data)) {
            return array_map(array('Uiform_Form_Helper', 'sanitizeRecursive'), $data);
        } else {
            return Uiform_Form_Helper::sanitizeInput($data);
        }
    }
    
    /**
     * Sanitize recursive
     * 
     * @param string $data array
     * 
     * @return array
     */
    public static function sanitizeRecursive_html($data) {
        if (is_array($data)) {
            return array_map(array('Uiform_Form_Helper', 'sanitizeRecursive_html'), $data);
        } else {
            return Uiform_Form_Helper::sanitizeInput_html($data);
        }
    }
    

    public static function data_encrypt($string, $key) {
        $output = '';
        /*   if(function_exists("mcrypt_encrypt")) { */
        if (0) {
            $output = rtrim(
                    base64_encode(
                            mcrypt_encrypt(
                                    MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB, mcrypt_create_iv(
                                            mcrypt_get_iv_size(
                                                    MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB
                                            ), MCRYPT_RAND)
                            )
                    ), "\0"
            );
        } else {
            $result = '';
            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) + ord($keychar));
                $result .= $char;
            }
            $output = base64_encode($result);
        }


        return $output;
    }

    public static function data_decrypt($string, $key) {
        $output = '';
        /* if(function_exists("mcrypt_encrypt")) { */
        if (0) {
            $output = rtrim(
                    mcrypt_decrypt(
                            MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB, mcrypt_create_iv(
                                    mcrypt_get_iv_size(
                                            MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB
                                    ), MCRYPT_RAND
                            )
                    ), "\0"
            );
        } else {
            $result = '';
            $string = base64_decode($string);

            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) - ord($keychar));
                $result .= $char;
            }
            $output = $result;
        }

        return $output;
    }

    public static function base64url_encode($s) {
        return str_replace(array('+', '/'), array('-', '_'), base64_encode($s));
    }

    public static function base64url_decode($s) {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $s));
    }

    // Javascript/HTML hex encode 
    public static function encodeHex($input) {
        $temp = '';
        $length = strlen($input);
        for ($i = 0; $i < $length; $i++)
            $temp .= '%' . bin2hex($input[$i]);
        return $temp;
    }
    
    public static function check_field_length($data,$length) {
        return (strlen($data) > intval($length))? substr($data, 0, intval($length)):'';
    }
    
    public static function sql_quote( $value )
    {
        if( get_magic_quotes_gpc() )
        {
            $value = stripslashes( $value );
        }
        
        $value = addslashes( $value );
        
        return $value;
    }
    
    public static function form_store_fonts( $font_temp)
    {
       global $global_fonts_stored;
        if(!empty($font_temp['import_family']) && !in_array($font_temp['import_family'], $global_fonts_stored)){
        $global_fonts_stored[]= $font_temp['import_family'];
        }
    }
    
    public static function is_uiform_page()
    {
        $vget_page=(isset($_GET['page']))?Uiform_Form_Helper::sanitizeInput($_GET['page']):'';
        $vpost_page=(isset($_POST['page']))?Uiform_Form_Helper::sanitizeInput($_POST['page']):'';
        if(( $vget_page === 'zgfm_form_builder' ) || ( $vpost_page === 'zgfm_form_builder' )) {
            return true;
        }else{
            return false;
        }
    }
    
    public static function remove_non_tag_space($text){
    $len = strlen($text);
        $out = "";
        $in_tag = false;
        for ($i = 0; $i < $len; $i++) {
            $c = $text[$i];
            if ($c == '<')
                $in_tag = true;
            elseif ($c == '>')
                $in_tag = false;

            $out .= $c == " " ? ($in_tag ? $c : "") : $c;
        }
        return $out;
    }
    
    public static function assign_alert_container($msg,$type)
    {
        $return_msg='';
        switch ($type) {
            case 1:
                /*success*/
                $return_msg.='<div class="alert alert-success" role="alert">'.$msg.'</div>';
                break;
           case 2:
                /*info*/
                $return_msg.='<div class="alert alert-info" role="alert">'.$msg.'</div>';
                break;
           case 3:
                /*warning*/
                $return_msg.='<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                break;
           case 4:
                /*danger*/
                $return_msg.='<div class="alert alert-danger" role="alert">'.$msg.'</div>';
                break;  
            default:
                break;
        }
        return $return_msg;
    }
    
    /**
    * Verify if field is checked
    * 
    * @param int $row    value field
    * @param int $status status check
    * 
    * @return array
    */
    public static function getChecked($row, $status)
    {
        if ($row == $status) {
            echo "checked=\"checked\"";
        }
    }
    
    public static function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
    }
    public static function json_encode_advanced(array $arr, $sequential_keys = false, $quotes = false, $beautiful_json = false) {

           $output = Uiform_Form_Helper::isAssoc($arr) ? "{" : "[";
            $count = 0;
            foreach ($arr as $key => $value) {

                if (Uiform_Form_Helper::isAssoc($arr) || (!Uiform_Form_Helper::isAssoc($arr) && $sequential_keys == true )) {
                    $output .= ($quotes ? '"' : '') . $key . ($quotes ? '"' : '') . ' : ';
                }

                if (is_array($value)) {
                    $output .= Uiform_Form_Helper::json_encode_advanced($value, $sequential_keys, $quotes, $beautiful_json);
                }
                else if (is_bool($value)) {
                    $output .= ($value ? 'true' : 'false');
                }
                else if (is_numeric($value)) {
                    $output .= $value;
                }
                else if (is_object($value)) {
                    $output .= '0';
                }
                else {
                    $output .= ($quotes || $beautiful_json ? '"' : '') . $value . ($quotes || $beautiful_json ? '"' : '');
                }

                if (++$count < count($arr)) {
                    $output .= ', ';
                }
            }

            $output .= Uiform_Form_Helper::isAssoc($arr) ? "}" : "]";

            return $output;
        } 
        
        public static function isAssoc(array $arr) {
            if (array() === $arr) return false;
            return array_keys($arr) !== range(0, count($arr) - 1);
        }
        
        public static function get_font_library(){
            require_once( FCPATH . 'libs/styles-font-menu/plugin.php');
            $objsfm = new SFM_Plugin();
            
            return $objsfm;
        }
}


  /**
 * Escaping for textarea values.
 *
 * @param string $text
 *
 * @return string
 */
function escape_text( $text ) {
	$safe_text = htmlspecialchars($text, ENT_QUOTES );
	return $safe_text;
}  

/**
 * Verify if field is checked
 * 
 * @param int $row    value field
 * @param int $status status check
 * 
 * @return array
 */
function getChecked($row, $status)
{
    if ($row == $status) {
        echo "checked=\"checked\"";
    }
}

function time_stamp($session_time) {

    $ci =& get_instance();
    $time_difference = time() - $session_time;
    $seconds = $time_difference;
    $minutes = round($time_difference / 60);
    $hours = round($time_difference / 3600);
    $days = round($time_difference / 86400);
    $weeks = round($time_difference / 604800);
    $months = round($time_difference / 2419200);
    $years = round($time_difference / 29030400);

    if ($seconds <= 60) {
        echo "$seconds " . $ci->lang->line('_ACT_SECONDS') . $ci->lang->line('_ACT_AGO');
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            echo $ci->lang->line('_ACT_ONE') . $ci->lang->line('_ACT_AGO');
        } else {
            echo "$minutes " . $ci->lang->line('_ACT_MINUTES') . $ci->lang->line('_ACT_AGO');
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            echo $ci->lang->line('_ACT_HOUR'). $ci->lang->line('_ACT_AGO');
        } else {
            echo "$hours " .$ci->lang->line('_ACT_HOURS') . $ci->lang->line('_ACT_AGO');
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            echo $ci->lang->line('_ACT_DAY'). $ci->lang->line('_ACT_AGO');
        } else {
            echo "$days " . $ci->lang->line('_ACT_DAYS') . $ci->lang->line('_ACT_AGO');
        }
    } else if ($weeks <= 4) {
        if ($weeks == 1) {
            echo $ci->lang->line('_ACT_WEEK'). $ci->lang->line('_ACT_AGO');
        } else {
            echo "$weeks " .$ci->lang->line('_ACT_WEEKS') . $ci->lang->line('_ACT_AGO');
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            echo $ci->lang->line('_ACT_MONTH') . $ci->lang->line('_ACT_AGO');
        } else {
            echo "$months " .$ci->lang->line('_ACT_MONTHS') . $ci->lang->line('_ACT_AGO');
        }
    } else {
        if ($years == 1) {
            echo $ci->lang->line('_ACT_YEAR') . $ci->lang->line('_ACT_AGO');
        } else {
            echo "$years " .$ci->lang->line('_ACT_YEARS') . $ci->lang->line('_ACT_AGO');
        }
    }
}

function uifm_do_shortcode(){

    
}

/**
 * Returns the viewer's IP address
 * Deals with transparent proxies
 *
 * @return string
 */
function getUserIP() {
	$pattern = '~^([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.([01]?\\d\\d?|2[0-4]\\d|25[0-5])\\.([01]?\\d\\d?|2[0-4]\\d|25[0-5])$~';
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = Uiform_Form_Helper::sanitizeInput($_SERVER['HTTP_X_FORWARDED_FOR']);
		if (preg_match($pattern, $ip)) {
			return $ip;
		}
	}
	$ip = Uiform_Form_Helper::sanitizeInput($_SERVER['REMOTE_ADDR']);
	if (preg_match($pattern, $ip)) {
		return $ip;
	}
	return NULL;
}

/**
 *
 * Check if logged in (with specific rights)
 * Returns a true value if there is a user logged on with the required rights
 *
 * @param bit $rights rights required by the caller
 *
 * @return bool
 */
function uifm_loggedin() {
	if(isset($_SESSION['all_data'])){
           $sesdata = $_SESSION['all_data'];
        }else{
            $ci =& get_instance();
           $sesdata = $ci->session->all_userdata();
        }
        
        $_uifm_loggedin=false;
        
        if(isset($sesdata['loggedIn']) && $sesdata['loggedIn']==true){
            $_uifm_loggedin=true;
        }
        
        
	return $_uifm_loggedin;
}

/**
 * Prefix a table name with a user-defined string to avoid conflicts.
 * This MUST be used in all database queries.
 * @param string $tablename name of the table
 * @return prefixed table name
 * @since 0.6
 */
function prefix($tablename = NULL) {
	return '`' . 'cestimator_' . $tablename . '`';
}

/**
 * returns an XSRF token
 * @param striong $action
 */
function getXSRFToken($action) {
        if(isset($_SESSION['all_data'])){
           $sesdata = $_SESSION['all_data'];
        }else{
            $ci =& get_instance();
           $sesdata = $ci->session->all_userdata();
        }
        unset($sesdata['session_id']);
        unset($sesdata['last_activity']);
        
        
	return sha1($action . prefix(getUserIP()) . serialize($sesdata) );
}


/**
 * Checks for Cross Site Request Forgeries
 * @param string $action
 */
function XSRFdefender($action) {
	$token = getXSRFToken($action);
	if (!isset($_REQUEST['XSRFToken']) || $_REQUEST['XSRFToken'] != $token) {
		header("HTTP/1.0 302 Found");
		header("Status: 302 Found");
		header('Location: ' . getRootWebPath(). 'index.php/admin?action=external&error&msg=' . "Cross Site Request Forgery blocked");
		exit();
	}
	unset($_REQUEST['XSRFToken']);
	unset($_POST['XSRFToken']);
	unset($_GET['XSRFToken']);
}

function elFinder_tinymce() {

	$file = base_url() . 'extensions/elfinder/elfinder.php?XSRFToken=' . getXSRFToken('elFinder');
        
	?>
	<script type="text/javascript">
		// <!-- <![CDATA[
		function elFinderBrowser(field_name, url, type, win) {
			tinymce.activeEditor.windowManager.open({
				file: "<?php echo $file; ?>", // use an absolute path!
				title: 'File manager',
				width: 900,
				height: 450,
				close_previous: 'no',
				inline: 'yes', // This parameter only has an effect if you use the inlinepopups plugin!
				popup_css: false, // Disable TinyMCE's default popup CSS
				resizable: 'yes'
			}, {
				setUrl: function(url) {
                                         
                                            win.document.getElementById(field_name).value = url;
				}
			});
			return false;
		}
		// ]]> -->
	</script>

	<?php
}

function curPageURL() {
     $pageURL = 'http';
     if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }
     return $pageURL;
    }

    function getRootWebPath(){
        $tmp_web = curPageURL();
         
       $tmp_web = substr($tmp_web, 0, strpos($tmp_web, "extensions/elfinder"));
        return $tmp_web;
    }
    
 if (!function_exists('load_cleaned_view'))
{
    function load_cleaned_view($view, $data = NULL, $return_as_string = FALSE)
    {
        $CI =& get_instance();
        $content = $CI->load->view($view, $data, $return_as_string);

        if(!empty($data))
        {
            foreach ($data as $key => $value) $data[$key] = NULL;
            $CI->load->view($view, $data, TRUE);
        }
        return $content;
    }
}   
    
?>
