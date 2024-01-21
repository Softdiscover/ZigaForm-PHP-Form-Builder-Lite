<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>

<!-- begin zigaform cached code -->

<div id="uifm_container_<?php echo $id_form; ?>" class="uiform-wrap sfdc-wrap">


 <?php echo $html_content; ?>


</div>
<script type="text/javascript">
    var UIFORM_WWW = "<?php echo $site_url; ?>";
    var UIFORM_SRC = "<?php echo $base_url; ?>";
    var _uifmvar = _uifmvar || {};
    _uifmvar.fm_ids = _uifmvar.fm_ids || [];
    _uifmvar.fm_ids.push(['<?php echo $id_form; ?>']);
    
    var rockfm_vars=<?php echo json_encode($rockfm_vars_arr, JSON_PRETTY_PRINT); ?>;  
    
   var  uifm_jq14 = $uifm; 
    (function ($) {
        
         rocketfm();
        rocketfm.initialize();
        rocketfm.setAccounting(accounting);
        rocketfm.setExternalVars(_uifmvar);
        $.each(_uifmvar.fm_ids, function( index, value ) {
            rocketfm.run_form2(value[0]);
        });
         
        
     }(uifm_jq14));   
   
</script>
<!-- end zigaform cached code -->
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
