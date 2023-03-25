							<div class="row">
							 <div class="form-group">
								 <a class="del-logic-conditional" onclick="javascript:deleteCondLogic(this);" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a>
								<select data-order="<?php echo $order; ?>"  onchange="javascript:loadfielddata(this);"  class="chosen-select  ces_clogic_field" name="ces_clogic_field[<?php echo $order; ?>]" >
								<?php
								foreach ( $fields_list as $frow ) :
									?>
									<option value="<?php echo $frow->cef_id; ?>" >
									<?php echo $frow->cef_name; ?>
									</option>
									<?php
							  endforeach;
								?>
								<?php unset( $frow ); ?>
								</select>
								 <div class="show_field_match">
									 <select class="form-control" style="width: 100px;" name="ces_clogic_list_match[<?php echo $order; ?>]">
									 <?php
										if ( intval( $match_type ) === 2 ) {
											?>
									 <option value="1">is</option>
									 <option value="2"  >is not</option>
									 
											<?php
										} else {
											?>
									 <option value="1">is</option>
									 <option value="2">is not</option>
									 <option value="3">greater than</option>
									 <option value="4">less than</option>
										<?php } ?>
									</select>
								 </div>
								 
								  <div class="show_field_inputs">
									  
									</div>
								</div>
							  </div>
