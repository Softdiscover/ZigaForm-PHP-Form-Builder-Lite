<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
class Zigaform_b_notice {
    
    private $tables = array();
    private $suffix = 'd-M-Y_H-i-s';
    
    /**
     * Constructor
     *
     * @mvc Controller
     */
    public function __construct() {
      //  global $wpdb;
       // $this->wpdb = $wpdb;
        
        //admin notice
       // add_action( 'admin_notices',                  array( $this, 'notice_add' ) );
	//add_action( 'wp_ajax_zgfm_f_notice_dismiss', array( $this, 'notice_dismiss' ) );
       // add_action( 'wp_ajax_zgfm_f_notice_rated', array( $this, 'notice_rated' ) );
        
        //footer
	//add_filter( 'admin_footer_text', array( $this, 'notice_footer' ), 1, 2 );
       
    }
    
    
    /**
     * Adding admin notice
     *
     */
    public function notice_rated() {
        
            $data              = get_option( 'zigaform_f_notice_1', array() );
            $data['time'] 	 = time();
            $data['dismissed'] = true;
            $data['rated'] = true;

            update_option( 'zigaform_f_notice_1', $data );
            die();
    }
    
    
    /**
     * Adding admin notice
     *
     */
    public function notice_add() {
       
        //only for super admin
        if (!is_super_admin()) {
            return;
        }

        // Verify that we can do a check for reviews.
        $data = get_option('zigaform_f_notice_1');
        $time = time();
        $load = false;
        
        //if rated, not load
        if (( isset($data['rated']) && $data['rated'] ) ) {
                return;
        }
        
        
        if (!$data) {
            $data = array(
                'time' => $time,
                'dismissed' => false
            );
            $load = true;
        } else {
            // Check if it is dismissed
            $tmp_period= $data['time'] + DAY_IN_SECONDS;
            
            if (( isset($data['dismissed']) && !$data['dismissed'] ) 
                    && ( isset($data['time']) 
                    && ( $tmp_period <= $time ) )) {

                $load = true;
            }
        }

        // If not load, return early.
        if (!$load) {
            return;
        }
        
        // Update the notice option now.
        update_option('zigaform_f_notice_1', $data);

        // Fetch when plugin was initially installed
        $activated = get_option('zgfm_b_activated', array());

        $type = class_exists('UiformFormbuilder') ? 'pro' : 'lite';

        if (!empty($activated[$type])) {
            // continue if plugin is installed for at least 7 days
            $tmp_period= $activated[$type] + ( DAY_IN_SECONDS * 7 );
            if ($tmp_period > $time) {
                return;
            }
        } else {
            $activated[$type] = $time;
            update_option('zgfm_b_activated', $activated);
            return;
        } 
 
        // after 7 days, add the message
        include(dirname(__DIR__) . '/views/help/notice-1.php');
          
    }
    
   
    /**
     * Dismiss notice
     *
     */
    public function notice_dismiss() {

            $data              = get_option( 'zigaform_f_notice_1', array() );
            $data['time'] 	 = time();
            $data['dismissed'] = true;
            $data['rated'] = false;
            
            update_option( 'zigaform_f_notice_1', $data );
            die();
    }
    
    
    /**
     * When user is on zigaform admin page, display footer text that asks them to rate us.
     *
     */
    public function notice_footer( $text ) {

            global $current_screen;

            if ( (!empty( $current_screen->id ) && strpos( $current_screen->id, 'zgfm_form_builder' ) !== false )
                 || ( !empty( $current_screen->id ) && strpos( $current_screen->id, 'zigaform-builder-' ) !== false    )
                    ) {
                
                    if(ZIGAFORM_F_LITE){
                        $url  = 'https://wordpress.org/support/plugin/zigaform-form-builder-lite/reviews/?filter=5#new-post';
                        $text = sprintf( __( 'Please rate <strong>Zigaform</strong> <a href="%s" target="_blank" rel="noopener" >&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%s" target="_blank">WordPress.org</a> to help us spread the word. Thank you from the Zigaform team!', 'FRocket_admin' ), $url, $url );
                    }else{
                        $url  = 'https://1.envato.market/Ymxgq';
                        $text = sprintf( __( 'Please rate <strong>Zigaform</strong> <a href="%s" target="_blank" rel="noopener" >&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%s" target="_blank">Codecanyon.net</a> to help us spread the word. Thank you from the Zigaform team!', 'FRocket_admin' ), $url, $url );
                    }
                
                    
            }
            return $text;
    }
    
}

new Zigaform_b_notice();
?>
