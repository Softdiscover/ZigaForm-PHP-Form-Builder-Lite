<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>
<div id="uiform-container" data-uiform-page="form_list" class="sfdc-wrap uiform-wrap">
	<div class="space20"></div>
	<div class="">
		<div class="col-lg-12">
		<div class="widget widget-padding span12">
			<div class="widget-header">
				<i class="fa fa-list-alt"></i>
				<h5>
				<?php echo $title; ?>
				</h5>
				<div class="widget-buttons">
					
					
				</div>
			</div>  
			<div class="widget-body">
				<div id="uiform-listform-options">
				 <?php echo $header_buttons;?>
				</div>
				<div class="zgfm-listform-searchbox-container">
					 <div id="zgfm-listform-filter-panel">
						<div class="sfdc-panel sfdc-panel-default">
							<div class="sfdc-panel-body">
								<form id="zgfm-listform-filter-panel-form" class="sfdc-form-inline" role="form">
									<div class="sfdc-form-group">
										<label class="sfdc-filter-col" style="margin-right:0;" for="zgfm-listform-pref-perpage"><?php echo __( 'Rows per page', 'FRocket_admin' ); ?>:</label>
										<select id="zgfm-listform-pref-perpage" name="zgfm-listform-pref-perpage" class="sfdc-form-control">
										<option value="2" <?php echo ( $per_page === 2 ) ? 'selected' : ''; ?> >2</option>
											<option value="3" <?php echo ( $per_page === 3 ) ? 'selected' : ''; ?> >3</option>
											<option value="4" <?php echo ( $per_page === 4 ) ? 'selected' : ''; ?> >4</option>
											<option value="5" <?php echo ( $per_page === 5 ) ? 'selected' : ''; ?> >5</option>
											<option value="6" <?php echo ( $per_page === 6 ) ? 'selected' : ''; ?> >6</option>
											<option value="7" <?php echo ( $per_page === 7 ) ? 'selected' : ''; ?> >7</option>
											<option value="8" <?php echo ( $per_page === 8 ) ? 'selected' : ''; ?> >8</option>
											<option value="9" <?php echo ( $per_page === 9 ) ? 'selected' : ''; ?> >9</option>
											<option value="10" <?php echo ( $per_page === 10 ) ? 'selected' : ''; ?> >10</option>
											<option value="15" <?php echo ( $per_page === 15 ) ? 'selected' : ''; ?> >15</option>
											<option value="20" <?php echo ( $per_page === 20 ) ? 'selected' : ''; ?> >20</option>
											<option value="30" <?php echo ( $per_page === 30 ) ? 'selected' : ''; ?> >30</option>
											<option value="40" <?php echo ( $per_page === 40 ) ? 'selected' : ''; ?> >40</option>
											<option value="50" <?php echo ( $per_page === 50 ) ? 'selected' : ''; ?> >50</option>
											<option value="100" <?php echo ( $per_page === 100 ) ? 'selected' : ''; ?> >100</option>
											<option value="200" <?php echo ( $per_page === 200 ) ? 'selected' : ''; ?> >200</option>
											<option value="300" <?php echo ( $per_page === 300 ) ? 'selected' : ''; ?> >300</option>
											<option value="400" <?php echo ( $per_page === 400 ) ? 'selected' : ''; ?> >400</option>
											<option value="500" <?php echo ( $per_page === 500 ) ? 'selected' : ''; ?> >500</option>
											<option value="1000" <?php echo ( $per_page === 1000 ) ? 'selected' : ''; ?> >1000</option>
											<option value="" <?php echo ( $per_page === 0 ) ? 'selected' : ''; ?> ><?php echo __( 'All', 'FRocket_admin' ); ?></option>
										</select>                                
									</div> <!-- form group [rows] -->
								 
									<div class="sfdc-form-group">
										<label class="sfdc-filter-col" style="margin-right:0;" for="zgfm-listform-pref-orderby"><?php echo __( 'Order by', 'FRocket_admin' ); ?>:</label>
										<select id="zgfm-listform-pref-orderby" name="zgfm-listform-pref-orderby" class="sfdc-form-control">
											<option value="desc" <?php echo ( $orderby == 'desc' ) ? 'selected' : ''; ?> ><?php echo __( 'Descendent', 'FRocket_admin' ); ?></option>
											<option value="asc" <?php echo ( $orderby == 'asc' ) ? 'selected' : ''; ?> ><?php echo __( 'Ascendent', 'FRocket_admin' ); ?></option>
										</select>                                
									</div> <!-- form group [order by] --> 
								 
								</form>
							</div>
						</div>
					</div>   
					
				</div>
				<?php echo $subsubsub; ?>
				<div id="zgfm-back-listform-maintable-container" class="clearfix"></div>
			</div> 
		</div> 
	</div>
	</div>
</div>



<div style="display:none;">
	<input type="hidden" id="uifm_listform_popup_title" value="<?php echo __( 'List Record information', 'FRocket_admin' ); ?>" >
	<input type="hidden" id="uifm_listform_offset_val" value="<?php echo $offset; ?>" >
	<input type="hidden" id="uifm_listrecord_is_trash" value="<?php echo (!empty($is_trash))?1:0; ?>" >
	<input type="hidden" id="uifm_listform_popup_notforms" value="<?php echo __( 'there is no records selected', 'FRocket_admin' ); ?>" >
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function ($) {
 
	
	/*list form refresh params*/
	
   /*event filter */
	 $(document).on( "keyup change","#zgfm-listform-pref-perpage,#zgfm-listform-pref-search,#zgfm-listform-pref-orderby" , function(e) {
		<?php echo $script_trigger;?>
	});
	
	/*trigger filter */
	<?php echo $script_trigger;?>
	
});
//]]>
</script>