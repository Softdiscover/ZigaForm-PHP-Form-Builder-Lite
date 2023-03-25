<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<div style="display:block;width:100%;height: 100px;margin-top: 50px;"></div>
<input id="ex111" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
<script>
  
	window.onload = function () {
		
	$uifm(document).ready(function ($) {
		
		$('#ex111').bootstrapSlider({tooltip: 'always',step: 20000, min: 0, max: 200000,value: 200000});
		//$('#ex111').bootstrapSlider('destroy');
	   $('#ex111').bootstrapSlider('setAttribute',{tooltip: 'always',step: 1, min: 0, max: 100,value:0});
	   //$('#ex111').bootstrapSlider("setAttribute", "value", 200);
		//$('#ex111').bootstrapSlider('refresh',{tooltip: 'always',step: 1, min: 0, max: 100,value:0,range:false});
		//$('#ex111').bootstrapSlider('relayout');
	   $('#ex111').bootstrapSlider('refresh');
		//$('#ex111').bootstrapSlider('setValue', 7);
		
		 if($('#ex111').data('bootstrapSlider')){
								console.log('defined bootstralider');
							}else{
								console.log('not defined bootstralider');
							}
							
							if (undefined != $('#ex111').data('bootstrapSlider')) {
								  console.log('defined bootstralider');
								}else{
									
								}
		
	});
  
};
</script>
