<?php
/**
 * Settings model
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: settingsmodel.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */

/**
 * Visitor model
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
class model_visitor extends CI_Model
{


    public $table = '';
    /**
     * register the global settings information
     *
     * @var array
     */
    public static $db_config = array();

    /**
     * model_settings::__construct()
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix . 'uiform_visitor';
    }
    /**
     * Visitormodel::getLastMonth()
     * Get info last
     *
     * @param int $per_page max number of history forms
     * @param int $segment  Number of pagination
     *
     * @return array
     */
    public function getLastMonth()
    {
        $query = $this->db->query(
            "select a.d, a.requests,b.visits from (SELECT 
                                DATE(created_date) as d, COUNT(ceh_id) as requests
                                FROM cestimator_history
                                WHERE DATE_FORMAT(created_date,'%e') BETWEEN 1 AND 31
                                GROUP BY DAY(created_date)
                                ORDER BY created_date ASC
                                limit 31) a
                            join 
                            (SELECT 
                                DATE(vis_last_date) as d, COUNT(vis_id) as visits
                                FROM cestimator_visitor
                                WHERE DATE_FORMAT(vis_last_date,'%e') BETWEEN 1 AND 31
                                GROUP BY DATE_FORMAT(vis_last_date , '%Y-%m-%d')
                                ORDER BY vis_last_date ASC
                                limit 31) b on b.d=a.d"
        );
        return $query->result();
    }
}
