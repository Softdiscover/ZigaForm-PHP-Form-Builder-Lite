<?php

/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


/**
 * Model Setting class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
class model_addon extends CI_Model {

     
    public $table = "";
    public $tbaddon_details = "";

    function __construct() {
         parent::__construct();
        $this->table = $this->db->dbprefix . "uiform_addon";
        $this->tbaddon_details = $this->db->dbprefix . "uiform_addon_details";
    }

      function getListAddonsByBack() {
        $query = sprintf('
            select c.add_name
                    ,c.add_title
                    ,c.add_info
                    ,c.add_system
                    ,c.add_hasconfig
                    ,c.add_version
                    ,c.add_icon
                    ,c.add_installed
                    ,c.add_order
                    ,c.add_params
                    ,c.add_log
                    ,c.addonscol
                    ,c.flag_status
                    ,c.created_date
                    ,c.updated_date
                    ,c.created_ip
                    ,c.updated_ip
                    ,c.created_by
                    ,c.updated_by
                    ,c.add_xml
                    ,c.add_load_back
                    ,c.add_load_front
                    ,c.is_field
            from %s c
            where c.flag_status=1 
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    function getListAddonsByFront() {
        $query = sprintf('
            select c.add_name
                    ,c.add_title
                    ,c.add_info
                    ,c.add_system
                    ,c.add_hasconfig
                    ,c.add_version
                    ,c.add_icon
                    ,c.add_installed
                    ,c.add_order
                    ,c.add_params
                    ,c.add_log
                    ,c.addonscol
                    ,c.flag_status
                    ,c.created_date
                    ,c.updated_date
                    ,c.created_ip
                    ,c.updated_ip
                    ,c.created_by
                    ,c.updated_by
                    ,c.add_xml
                    ,c.add_load_back
                    ,c.add_load_front
                    ,c.is_field
            from %s c
            where c.flag_status=1 
            and c.add_load_front=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    function getActiveAddonsNamesOnBack(){
        $query = sprintf('
            select c.add_name
            from %s c
            where c.flag_status=1 
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        $query2 = $this->db->query($query);
        $tmp_result=$query2->result();
        
        
        $result=array();
        foreach ($tmp_result as $key => $value) {
            $result[]=$value->add_name;
        }
        
        return $result;
    }
    
    
    function getAddonsNamesOnBackByForm($idform){
        $query = sprintf('
            select c.add_name
            from %s c
	    left join %s ad on ad.add_name = c.add_name
            where c.flag_status=1 and ad.fmb_id=%s
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table,$this->tbaddon_details,$idform);
        
        $query2 = $this->db->query($query);
        $tmp_result=$query2->result();
        
        $result=array();
        foreach ($tmp_result as $key => $value) {
            $result[]=$value->add_name;
        }
        
        return $result;
    }
    
  
    
    function getListAddonsBySection($section='') {
        $query = sprintf('
            select c.add_name
                    ,c.add_title
                    ,c.add_info
                    ,c.add_system
                    ,c.add_hasconfig
                    ,c.add_version
                    ,c.add_icon
                    ,c.add_installed
                    ,c.add_order
                    ,c.add_params
                    ,c.add_log
                    ,c.addonscol
                    ,c.flag_status
                    ,c.created_date
                    ,c.updated_date
                    ,c.created_ip
                    ,c.updated_ip
                    ,c.created_by
                    ,c.updated_by
                    ,c.add_xml
                    ,c.add_load_back
                    ,c.add_load_front
                    ,c.is_field
            from %s c
            where c.flag_status=1 
            and c.add_section="%s"
            ORDER BY c.add_section_order desc
            ', $this->table,$section);
        
        $query2 = $this->db->query($query);
        return $query2->result();
    }
 
    
}

?>
