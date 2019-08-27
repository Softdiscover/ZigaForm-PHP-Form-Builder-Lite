<?php
 /**
 * Option API
 *
 * @package WordPress
 * @subpackage Option
 */

/**
 * Retrieves an option value based on an option name.
 *
 * If the option does not exist or does not have a value, then the return value
 * will be false. This is useful to check whether you need to install an option
 * and is commonly used during installation of plugin options and to test
 * whether upgrading is required.
 *
 * If the option was serialized then it will be unserialized when it is returned.
 *
 * Any scalar values will be returned as strings. You may coerce the return type of
 * a given option by registering an {@see 'option_$option'} filter callback.
 *
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $option  Name of option to retrieve. Expected to not be SQL-escaped.
 * @param mixed  $default Optional. Default value to return if the option does not exist.
 * @return mixed Value set for the option.
 */
function get_option( $option, $default = '' ) {
	
	$option = trim( $option );
	if ( empty( $option ) )
		return false;
 
	/**
	 * Filters the value of an existing option before it is retrieved.
	 *
	 * The dynamic portion of the hook name, `$option`, refers to the option name.
	 *
	 * Passing a truthy value to the filter will short-circuit retrieving
	 * the option value, returning the passed value instead.
	 *
	 * @since 1.5.0
	 * @since 4.4.0 The `$option` parameter was added.
	 *
	 * @param bool|mixed $pre_option Value to return instead of the option value.
	 *                               Default false to skip it.
	 * @param string     $option     Option name.
	 */
	/*$pre = apply_filters( "pre_option_{$option}", false, $option );
	if ( false !== $pre )
		return $pre;*/

	/*if ( defined( 'WP_SETUP_CONFIG' ) )
		return false;*/

	// Distinguish between `false` as a default, and not passing one.
	//$passed_default = func_num_args() > 1;

	
		// prevent non-existent options from triggering multiple queries
		//$notoptions = wp_cache_get( 'notoptions', 'options' );
		

		/*$alloptions = wp_load_alloptions();

		if ( isset( $alloptions[$option] ) ) {
			$value = $alloptions[$option];
		} else {
                    
			$value = wp_cache_get( $option, 'options' );

			if ( false === $value ) {
                            
				$row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", $option ) );

				// Has to be get_row instead of get_var because of funkiness with 0, false, null values
				if ( is_object( $row ) ) {
					$value = $row->option_value;
					wp_cache_add( $option, $value, 'options' );
				} else { // option does not exist, so we must cache its non-existence
					if ( ! is_array( $notoptions ) ) {
						 $notoptions = array();
					}
					$notoptions[$option] = true;
					wp_cache_set( 'notoptions', $notoptions, 'options' );

					
					//return apply_filters( "default_option_{$option}", $default, $option, $passed_default );
				}
                              
			}
		}*/
	
	

	/**
	 * Filters the value of an existing option.
	 *
	 * The dynamic portion of the hook name, `$option`, refers to the option name.
	 *
	 * @since 1.5.0 As 'option_' . $setting
	 * @since 3.0.0
	 * @since 4.4.0 The `$option` parameter was added.
	 *
	 * @param mixed  $value  Value of the option. If stored serialized, it will be
	 *                       unserialized prior to being returned.
	 * @param string $option Option name.
	 */
	//return apply_filters( "option_{$option}", maybe_unserialize( $value ), $option );
        
        $ci_inst=& get_instance();
      
     
            $query3 = sprintf("SELECT option_value FROM %s WHERE option_name = '%s' LIMIT 1",$ci_inst->db->dbprefix.'uiform_options', $option);
        
            $query4 = $ci_inst->db->query($query3);

            $row = $query4->row();
            
            
            if ( is_object( $row ) ) {
			$value = $row->option_value;
                        return maybe_unserialize( $value );
                }else{
                    return $default;
                }
             
        
       
        
}

/**
 * Update the value of an option that was already added.
 *
 * You do not need to serialize values. If the value needs to be serialized, then
 * it will be serialized before it is inserted into the database. Remember,
 * resources can not be serialized or added as an option.
 *
 * If the option does not exist, then the option will be added with the option value,
 * with an `$autoload` value of 'yes'.
 *
 * @since 1.0.0
 * @since 4.2.0 The `$autoload` parameter was added.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string      $option   Option name. Expected to not be SQL-escaped.
 * @param mixed       $value    Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @param string|bool $autoload Optional. Whether to load the option when WordPress starts up. For existing options,
 *                              `$autoload` can only be updated using `update_option()` if `$value` is also changed.
 *                              Accepts 'yes'|true to enable or 'no'|false to disable. For non-existent options,
 *                              the default value is 'yes'. Default null.
 * @return bool False if value was not updated and true if value was updated.
 */
function update_option( $option, $value, $autoload = null ) {
	global $wpdb;

	$option = trim($option);
	if ( empty($option) )
		return false;

	
	if ( is_object( $value ) )
		$value = clone $value;

	//$value = sanitize_option( $option, $value );
	$old_value = get_option( $option );

	/**
	 * Filters a specific option before its value is (maybe) serialized and updated.
	 *
	 * The dynamic portion of the hook name, `$option`, refers to the option name.
	 *
	 * @since 2.6.0
	 * @since 4.4.0 The `$option` parameter was added.
	 *
	 * @param mixed  $value     The new, unserialized option value.
	 * @param mixed  $old_value The old option value.
	 * @param string $option    Option name.
	 */
	//$value = apply_filters( "pre_update_option_{$option}", $value, $old_value, $option );

	/**
	 * Filters an option before its value is (maybe) serialized and updated.
	 *
	 * @since 3.9.0
	 *
	 * @param mixed  $value     The new, unserialized option value.
	 * @param string $option    Name of the option.
	 * @param mixed  $old_value The old option value.
	 */
	//$value = apply_filters( 'pre_update_option', $value, $option, $old_value );

	/*
	 * If the new and old values are the same, no need to update.
	 *
	 * Unserialized values will be adequate in most cases. If the unserialized
	 * data differs, the (maybe) serialized data is checked to avoid
	 * unnecessary database calls for otherwise identical object instances.
	 *
	 * See https://core.trac.wordpress.org/ticket/38903
	 */
	if ( $value === $old_value || maybe_serialize( $value ) === maybe_serialize( $old_value ) ) {
		return false;
	}

	/** This filter is documented in wp-includes/option.php */
	/*if ( apply_filters( "default_option_{$option}", false, $option, false ) === $old_value ) {
		// Default setting for new options is 'yes'.
		if ( null === $autoload ) {
			$autoload = 'yes';
		}

		return add_option( $option, $value, '', $autoload );
	}*/

	$serialized_value = maybe_serialize( $value );

	/**
	 * Fires immediately before an option value is updated.
	 *
	 * @since 2.9.0
	 *
	 * @param string $option    Name of the option to update.
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 */
	//do_action( 'update_option', $option, $old_value, $value );

	$update_args = array(
		'option_value' => $serialized_value,
	);

	if ( null !== $autoload ) {
		$update_args['autoload'] = ( 'no' === $autoload || false === $autoload ) ? 'no' : 'yes';
	}

	//$result = $wpdb->update( $wpdb->options, $update_args, array( 'option_name' => $option ) );
        
        
        $ci_inst=& get_instance();
        
       /* $query = sprintf("SELECT option_value FROM %s WHERE option_name = %s LIMIT 1",$ci_inst->db->dbprefix.'uiform_options', $option);
        
        $query2 = $ci_inst->db->query($query);
        
        $row = $query2->row();
        if (!empty($row)) {
            return $row;
        } else {
            return '';
        }*/
        
        //check if table exist
    
        
        $query_find = sprintf("SELECT option_value FROM %s WHERE option_name = '%s' LIMIT 1",$ci_inst->db->dbprefix.'uiform_options', $option);
         $query2 = $ci_inst->db->query($query_find);
        $row = (Array)$query2->row();
       
        if (!empty($row)) {
           $where = "option_name = '".$option."'"; 
           
           $ci_inst->db->query($ci_inst->db->update_string($ci_inst->db->dbprefix.'uiform_options', $update_args, $where));
           
        }else{
            $update_args = array(
		'option_value' => $serialized_value,
                'option_name'=>$option,
                'autoload'=>'yes'
            );
            
            
            $ci_inst->db->query($ci_inst->db->insert_string($ci_inst->db->dbprefix.'uiform_options', $update_args));
            
        }
        
        
     
        
     
     
        /*$ci_inst->db->set($update_args);
        $ci_inst->db->where('option_name', $option);
        $ci_inst->db->update($ci_inst->db->dbprefix.'uiform_options');*/
        
	//if ( ! $result )
	//	return false;

	/*$notoptions = wp_cache_get( 'notoptions', 'options' );
	if ( is_array( $notoptions ) && isset( $notoptions[$option] ) ) {
		unset( $notoptions[$option] );
		wp_cache_set( 'notoptions', $notoptions, 'options' );
	}*/

	/*if ( ! wp_installing() ) {
		$alloptions = wp_load_alloptions();
		if ( isset( $alloptions[$option] ) ) {
			$alloptions[ $option ] = $serialized_value;
			wp_cache_set( 'alloptions', $alloptions, 'options' );
		} else {
			wp_cache_set( $option, $serialized_value, 'options' );
		}
	}*/

	/**
	 * Fires after the value of a specific option has been successfully updated.
	 *
	 * The dynamic portion of the hook name, `$option`, refers to the option name.
	 *
	 * @since 2.0.1
	 * @since 4.4.0 The `$option` parameter was added.
	 *
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 * @param string $option    Option name.
	 */
	//do_action( "update_option_{$option}", $old_value, $value, $option );

	/**
	 * Fires after the value of an option has been successfully updated.
	 *
	 * @since 2.9.0
	 *
	 * @param string $option    Name of the updated option.
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 */
	//do_action( 'updated_option', $option, $old_value, $value );
	return true;
}
