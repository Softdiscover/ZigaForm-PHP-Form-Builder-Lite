<select class="form-control" style="width: 100px;" name="ces_clogic_list_match[<?php echo $order; ?>]">
									 <?php if ( intval( $match_type ) === 2 ) { ?>
									 <option value="1">is</option>
									 <option value="2"  >is not</option>
									  
									 <?php } else { ?>
									 <option value="1">is</option>
									 <option value="2">is not</option>
									 <option value="3">greater than</option>
									 <option value="4">less than</option>
									 <?php } ?>
								 </select>
