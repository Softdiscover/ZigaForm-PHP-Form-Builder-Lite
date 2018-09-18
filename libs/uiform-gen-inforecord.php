<?php
if ( isset($_REQUEST['rkopt'])){
  
if ( !defined('BASEPATH') )
	define('BASEPATH', dirname(__FILE__) . '/');
require_once(BASEPATH . '../application/helpers/dompdf/dompdf_config.inc.php');
require_once(BASEPATH . '../application/helpers/common_helper.php');
    if(isset($_REQUEST['rkopt']) && $_REQUEST['rkopt']==='genpdf'){
       $tmp_data=(isset($_REQUEST['rkhtmltopdf']) && $_REQUEST['rkhtmltopdf'])?Uiform_Form_Helper::sanitizeInput_html($_REQUEST['rkhtmltopdf']):'';
       $tmp_data=json_decode(Uiform_Form_Helper::base64url_decode($tmp_data),true);
       
       ob_start();
       include(BASEPATH . '../application/modules/formbuilder/views/records/info_record_topdf.php');
      $cntACmp = ob_get_contents();
      $cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
        ob_end_clean();
        $tmp_html=$cntACmp ;
       
       $tmp_recid=(isset($_REQUEST['rk_rec_id']) && $_REQUEST['rk_rec_id'])?Uiform_Form_Helper::sanitizeInput_html($_REQUEST['rk_rec_id']):0;
        /* $dompdf = new DOMPDF();
        $dompdf->load_html($tmp_html,'UTF-8');
        $dompdf->set_paper('a4', 'portrait');// or landscape
        $dompdf->render();
       $dompdf->stream('entry_'.$tmp_recid.".pdf");*/
    }
   
}
?>
