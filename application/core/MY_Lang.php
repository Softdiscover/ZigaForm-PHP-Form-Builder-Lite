<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* URI Language Identifier
* 
* Adds a language identifier prefix to all site_url links
* 
* @copyright     Copyright (c) 2011, Wiredesignz
* @version         0.24
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/
class MY_Lang extends CI_Lang
{
    function __construct() {
        
        global $RTR;
        
        $index_page    = $RTR->config->item('index_page');
        $lang_uri_abbr = $RTR->config->item('lang_uri_abbr');
        
        /* get the lang_abbr from uri segments */
        $lang_abbr = current($RTR->uri->segments);
         
        /* check for invalid abbreviation */
        if( ! isset($lang_uri_abbr[$lang_abbr])) {            
            
            $deft_abbr = $RTR->config->item('language_abbr');
            
            /* check for abbreviation to be ignored */
            if ($deft_abbr != $RTR->config->item('lang_ignore')) {
                
                /* check and set the default uri identifier */
                $index_page .= empty($index_page) ? $deft_abbr : "/$deft_abbr";
            
                /* redirect after inserting language id */
                header('Location: '.$RTR->config->item('base_url').$index_page.$RTR->uri->uri_string);
            }
            
            /* get the language name */
            $user_lang = $lang_uri_abbr[$deft_abbr];
        
        } else {
        
            /* get the language name */
            $user_lang = $lang_uri_abbr[$lang_abbr];
            
            /* reset config language to match the user language */
            $RTR->config->set_item('language', $user_lang);
            $RTR->config->set_item('language_abbr', $lang_abbr);
        
            /* check for abbreviation to be ignored */
            if ($lang_abbr != $RTR->config->item('lang_ignore')) {
             
                /* check and set the user uri identifier */
                   $index_page .= empty($index_page) ? $lang_abbr : "/$lang_abbr";
                
                /* reset uri segments and uri string */
                $RTR->uri->_reindex_segments(array_shift($RTR->uri->segments));
                $RTR->uri->uri_string = str_replace("/$lang_abbr/", '/', $RTR->uri->uri_string);
            }
        }
        
        /* reset the index_page value */
        $RTR->config->set_item('index_page', $index_page);        
        log_message('debug', "MY_Language Class Initialized");
    }
}

/* translate helper */
function t($line) {
    global $CI;
    return ($t = $CI->lang->line($line)) ? $t : $line;
}  