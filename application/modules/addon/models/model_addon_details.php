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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if ( class_exists('model_addon_details')) {
    return;
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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
class model_addon_details extends CI_Model
{


    public $table   = '';
    public $tbaddon = '';

    public function __construct()
    {
         parent::__construct();
        $this->table   = $this->db->dbprefix . 'uiform_addon_details';
        $this->tbaddon = $this->db->dbprefix . 'uiform_addon';
    }
    public function getAddonsDataByForm($form_id)
    {
        $query = sprintf(
            '
            select ad.adet_data, ad.add_name, ad.fmb_id, ad.flag_status
            from %s c
		    left join %s ad on ad.add_name = c.add_name
            where c.flag_status=1 and ad.fmb_id=?
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ',
            $this->tbaddon,
            $this->table
        );

        $query2 = $this->db->query($query, array((int) $form_id));
        return $query2->result();
    }
    public function getAddonDataByForm($addon_name, $form_id)
    {
        $query = sprintf(
            '
            select ad.adet_data
            from %s c
		    left join %s ad on ad.add_name = c.add_name
            where c.flag_status=1 and ad.fmb_id=? and ad.add_name =?
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ',
            $this->tbaddon,
            $this->table
        );

        $query2 = $this->db->query($query, array((int) $form_id, $addon_name));
        return $query2->row();
    }


    public function existRecord($addon_name, $form_id)
    {
        $query   = sprintf(
            'select 
                COUNT(*) as count
                from %s ad
                where ad.add_name =? and ad.fmb_id=?',
            $this->table
        );
         $query2 = $this->db->query($query, array($addon_name, (int) $form_id));
         $row    = $query2->row();

        if ( intval($row->count) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
