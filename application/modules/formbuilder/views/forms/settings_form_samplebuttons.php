<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<!-- checkbox group buttons -->
																		 <div class="sfdc-btn-group" data-toggle="buttons">
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-checkboxes"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="checkbox"  value="0"> B
																			</label>
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-checkboxes"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="checkbox"  value="0"> I
																			</label>
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-checkboxes"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="checkbox"  value="0"> U
																			</label>
																		</div>
<!-- checkbox group buttons -->
																		 <div class="sfdc-btn-group" data-toggle="buttons">
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-radiobutton"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="radio"  value="0"> B
																			</label>
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-radiobutton"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="radio"  value="0"> I
																			</label>
																			<label data-toggle-enable="sfdc-btn-primary"
																				data-toggle-disable="sfdc-btn-primary"
																				data-settings-option="group-radiobutton"
																				class="sfdc-btn sfdc-btn-primary" >
																			<input type="radio"  value="0"> U
																			</label>
																		</div>

 <div class="sfdc-row">
								<div class="sfdc-col-sm-8">
									
									<div class="sfdc-form-group">
										<label for="bar">Whole bar appended</label>

										<div class="sfdc-input-group">
											<input type="text" id="bar" class="sfdc-form-control">
											<div class="sfdc-input-group-btn">
												<button class="sfdc-btn sfdc-btn-danger" type="button"><i class="fa fa-pencil"></i></button>
												<button class="sfdc-btn sfdc-btn-warning" type="button"><i class="fa fa-plus"></i></button>
												<button class="sfdc-btn sfdc-btn-success" type="button"><i class="fa fa-refresh"></i></button>
											</div>
										</div>

									</div>
									<div class="sfdc-form-group">
										<label for="dropdown-appended">Actions dropdown</label>

										<div class="sfdc-input-group">
											<input type="text" id="dropdown-appended" class="sfdc-form-control">
											<div class="sfdc-input-group-btn">
												<button data-toggle="dropdown" class="sfdc-btn sfdc-btn-success dropdown-toggle">
													Action
													<i class="fa fa-caret-down"></i>
												</button>
												<ul class="dropdown-menu">
													<li><a href="#">Action</a></li>
													<li><a href="#">Another action</a></li>
													<li><a href="#">Something else here</a></li>
													<li class="divider"></li>
													<li><a href="#">Separated link</a></li>
												</ul>
											</div>
										</div>

									</div>
									<div class="sfdc-form-group">
										<label for="type-dropdown-appended">Types dropdown</label>

										<div class="sfdc-input-group">
											<input type="text" id="type-dropdown-appended" class="sfdc-form-control">
											<div class="sfdc-input-group-btn">
												<select data-style="sfdc-btn-primary" class="selectpicker" id="phone-type">
												<option>Type one</option>
												<option>Some another type</option>
												<option>Even more types</option>
												</select>
											</div>
										</div>
										<p class="help-block">You can select some type of a field just right in the place.</p>

									</div>
									<div class="sfdc-form-group">
										<label for="segmented-dropdown">Segmented dropdown</label>

										<div class="sfdc-input-group">
											<input type="text" class="sfdc-form-control" id="segmented-dropdown">
											<div class="sfdc-input-group-btn">
												<button tabindex="-1" class="sfdc-btn sfdc-btn-warning">Action</button>
												<button data-toggle="dropdown" class="sfdc-btn sfdc-btn-warning dropdown-toggle">
													<i class="fa fa-caret-down"></i>
												</button>
												<ul class="dropdown-menu">
													<li><a href="#">Action</a></li>
													<li><a href="#">Another action</a></li>
													<li><a href="#">Something else here</a></li>
													<li class="divider"></li>
													<li><a href="#">Separated link</a></li>
												</ul>
											</div>
										</div>
										<span class="help-block">Everything can be appended to the right</span>
									</div>
									<div class="sfdc-form-group">
					<label ><?php echo __( 'Text font size', 'FRocket_admin' ); ?></label>
					<div class="sfdc-controls sfdc-form-group">
					<select  class="chzn-select select-block-level" tabindex="-1" data-minimum-results-for-search="10" data-width="off" data-placeholder="<?php echo __( 'Select font size', 'FRocket_admin' ); ?>">
						<option value=""></option>
						<?php
						for ( $i = 8; $i <= 48; $i++ ) {
							?>
						<option value="<?php echo $i; ?>"><?php echo $i . ' px'; ?></option>
							<?php
						}
						?>
					</select>
				   </div>
				</div>
								</div>
							</div>
