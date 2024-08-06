if (typeof $uifm === 'undefined') {
	$uifm = jQuery;
}
var rocketfm = rocketfm || null;
if (!$uifm.isFunction(rocketfm)) {
	(function($, window) {
		window.rocketfm = rocketfm = $.rocketfm = function() {
			var uifmvariable = [];
			uifmvariable.innerVars = {};
			uifmvariable.externalVars = {};

			var cur_form_obj = null;

			var validators = {
				letters: {
					regex: /^[A-Za-z][A-Za-z\s]*$/,
				},
				numbers: {
					regex: /^(\s*\d+)+\s*$/,
				},
				numletter: {
					regex: /^[A-Za-z0-9-.,:;\s][A-Za-z0-9\s-.,:;]*$/,
				},
				postcode: {
					regex: /^.{3,}$/,
				},
				email: {
					regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,8}$/,
				},
				phone: {
					regex: /^[2-9]\d{2}-\d{3}-\d{4}$/,
				},
			};

			arguments.callee.setAccounting = function(obj) {
			};

			arguments.callee.initialize = function() {
				this.setExternalVars({});
			};
			arguments.callee.setExternalVars = function(_uifmvar) {
				uifmvariable.externalVars['fm_ids'] = _uifmvar.fm_ids || [];
				uifmvariable.externalVars['fm_loadmode'] = _uifmvar.fm_loadmode || '';
				uifmvariable.externalVars['is_demo'] = _uifmvar.is_demo || 0;
			};
			arguments.callee.getExternalVars = function(name) {
				if (uifmvariable.externalVars[name]) {
					return uifmvariable.externalVars[name];
				} else {
					return '';
				}
			};
			arguments.callee.setInnerVariable = function(name, value) {
				uifmvariable.innerVars[name] = value;
			};
			arguments.callee.setInnerVariable_byform = function(idform, name, value) {
				if (typeof uifmvariable.innerVars['var_form' + idform] == 'undefined') {
					uifmvariable.innerVars['var_form' + idform] = {};
				}
				uifmvariable.innerVars['var_form' + idform][name] = value;
			};
			arguments.callee.getInnerVariable = function(name) {
				if (uifmvariable.innerVars[name]) {
					return uifmvariable.innerVars[name];
				} else {
					return '';
				}
			};
			arguments.callee.getInnerVariable_byform = function(idform, name) {
				if (uifmvariable.innerVars['var_form' + idform]) {
					return uifmvariable.innerVars['var_form' + idform][name];
				} else {
					return '';
				}
			};
			arguments.callee.dumpvar3 = function(object) {
				return JSON.stringify(object, null, 2);
			};
			arguments.callee.dumpvar2 = function(object) {
				return JSON.stringify(object);
			};

			arguments.callee.dumpvar = function(object) {
				var seen = [];
				var json = JSON.stringify(object, function(key, val) {
					if (val != null && typeof val == 'object') {
						if (seen.indexOf(val) >= 0) return;
						seen.push(val);
					}
					return val;
				});
				return seen;
			};

			arguments.callee.showLogMessage = function(msg) {
				console.log(msg);
			};
			arguments.callee.validate_processValidation = function(value, type_val) {
				var isValid = false;
				if (value.length) {
					switch (parseInt(type_val)) {
						case 1:
							if (value.length && validators['letters'].regex.test(value)) {
								isValid = true;
							}
							break;
						case 2:
							if (value.length && validators['numletter'].regex.test(value)) {
								isValid = true;
							}
							break;
						case 3:
							if (value.length && validators['numbers'].regex.test(value)) {
								isValid = true;
							}
							break;
						case 4:
							value = $.trim(value);
							if (value.length && validators['email'].regex.test(value)) {
								isValid = true;
							}
							break;
						case 6:
							let field_obj = this.getInnerVariable('cur_field_obj'),
								customval = decodeURIComponent(field_obj.attr('data-val-cval_regex'));
							let regex = new RegExp(customval);
							if (value.length && regex.exec(value) !== null) {
								isValid = true;
							}

							break;
						case 5:
						default:
							if (value.length) {
								isValid = true;
							}
							break;
					}
				}
				return isValid;
			};

			arguments.callee.validate_applyPopOverOpt = function(element) {

				var tmp_cur_fm_obj = this.getInnerVariable('cur_form_obj') || 'body';

				var cus_placement;
				switch (parseInt($(element).data('val-pos'))) {
					case 1:
						cus_placement = 'right';
						break;
					case 2:
						cus_placement = 'bottom';
						break;
					case 3:
						cus_placement = 'left';
						break;
					case 0:
					default:
						cus_placement = 'top';
						break;
				}

				var options = {

					animation: false,
					html: true,
					placement: cus_placement,
					content: $(element).data('val-custxt') || 'Ops... this is required',
					trigger: 'manual',
					container: tmp_cur_fm_obj,
				};
				return options;
			};
			arguments.callee.validate_addInvalidFields = function(value) {
				var temp;
				temp = this.getInnerVariable('val_invalid_fields');
				temp.push(value);
				this.setInnerVariable('val_invalid_fields', temp);
			};

			arguments.callee.validate_field = function(el) {
				var field_id, field_type, field_value, val_type, val_custtext, val_pos, val_tip, val_tip_col, val_tip_bg, field_pop;
				field_id = el.attr('id');
				field_type = el.attr('data-typefield');
				val_type = el.data('val-type') || 0;
				val_pos = el.data('val-pos');
				val_tip = el.data('tip_col');
				val_tip_col = el.data('tip_col');
				val_tip_bg = el.data('tip_bg');
				this.setInnerVariable('cur_form_obj', el.closest('.rockfm-form'));

				this.setInnerVariable('cur_field_obj', el);

				var tmp_theme_type;
				var tempvar;
				var searchInput;
				switch (parseInt(field_type)) {
					case 6:
					case 7:
					case 15:
					case 28:

					case 29:

					case 30:

						field_value = el.find('.rockfm-txtbox-inp-val').val();
						field_pop = el.find('.rockfm-txtbox-inp-val');
						if (this.validate_processValidation(field_value, val_type)) {
							el.removeClass('rockfm-required');
							field_pop.removeClass('rockfm-val-error');

							field_pop.sfdc_popover('destroy');
						} else {
							el.addClass('rockfm-required');
							if (!field_pop.hasClass('rockfm-val-error')) {
								field_pop.addClass('rockfm-val-error');
							}

							field_pop
								.sfdc_popover('destroy')
								.sfdc_popover(this.validate_applyPopOverOpt(el))
								.sfdc_popover('show');
						}
						break;
					case 8:
					case 9:
					case 10:
					case 11:
					case 12:

					case 13:
					case 23:
					case 24:
					case 25:
					case 26:

					case 43:

						switch (parseInt(field_type)) {
							case 8:

								tmp_theme_type = el.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tempvar = el.find('.rockfm-inp2-rdo');

										searchInput = tempvar
											.map(function(index) {
												if (
													$(this)
														.parent()
														.hasClass('checked')
												) {
													return $(this).val();
												} else {
													return null;
												}
											})
											.toArray();

										break;
									default:
										tempvar = el.find('.rockfm-inp2-rdo');

										searchInput = tempvar
											.map(function(index) {
												if ($(this).is(':checked')) {
													return $(this).val();
												} else {
													return null;
												}
											})
											.toArray();

										break;
								}

								if (searchInput[0]) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-input2-wrap');
								break;
							case 9:
								tmp_theme_type = el.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tempvar = el.find('.rockfm-inp2-chk');

										searchInput = tempvar
											.map(function(index) {
												if (
													$(this)
														.parent()
														.hasClass('checked')
												) {
													return $(this).val();
												} else {
													return null;
												}
											})
											.toArray();

										break;
									default:
										tempvar = el.find('.rockfm-inp2-chk');

										searchInput = tempvar
											.map(function(index) {
												if ($(this).is(':checked')) {
													return $(this).val();
												} else {
													return null;
												}
											})
											.toArray();

										break;
								}

								if (searchInput[0]) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-input2-wrap');
								break;
							case 10:
								if (el.find('.rockfm-input2-wrap select option:selected').attr('data-uifm-inp-val').length > 0) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-input2-wrap');
								break;
							case 11:
								if (el.find('.rockfm-input2-wrap select option:selected').attr('data-uifm-inp-val').length > 0) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-input2-wrap');
								break;
							case 12:
								if (el.find('.rockfm-fileupload-wrap .fileinput-filename').html().length > 0) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-fileupload-wrap');
								break;
							case 13:
								if (el.find('.rockfm-fileupload-wrap .fileinput-preview').html().length > 0) {
									field_value = '1';
								} else {
									field_value = '';
								}
								field_pop = el.find('.rockfm-fileupload-wrap .fileinput-preview');
								break;
							case 23:
								field_value = el.find('.rockfm-colorpicker-wrap input').val();
								field_pop = el.find('.rockfm-colorpicker-wrap');
								break;
							case 24:
								field_value = el.find('.rockfm-input7-datepic input').val();
								field_pop = el.find('.rockfm-input7-datepic');
								break;
							case 25:
								field_value = el.find('.rockfm-input7-timepic input').val();
								field_pop = el.find('.rockfm-input7-timepic');
								break;
							case 26:
								field_value = el.find('.rockfm-input7-datetimepic input').val();
								field_pop = el.find('.rockfm-input7-datetimepic');
								break;
							case 43:
								field_value = el.find('.flatpickr-input').val();
								field_pop = el.find('.uifm-input-flatpickr');
								break;
						}

						if (this.validate_processValidation(field_value, val_type)) {
							el.removeClass('rockfm-required');
							field_pop.removeClass('rockfm-val-error');

							field_pop.sfdc_popover('destroy');
						} else {

							el.addClass('rockfm-required');
							if (!field_pop.hasClass('rockfm-val-error')) {
								field_pop.addClass('rockfm-val-error');
							}

							field_pop
								.sfdc_popover('destroy')
								.sfdc_popover(this.validate_applyPopOverOpt(el))
								.sfdc_popover('show');
						}
						break;
					case 0:
						break;
					default:
				}
			};
			arguments.callee.validate_enableHighlight = function(el) {
				try {
					var first_el = el
						.find('.rockfm-required')
						.not('.rockfm-conditional-hidden')
						.not('.rockfm-cond-hidden-children')
						.eq(0);
					var type = first_el.attr('data-typefield');
					var field_inp;
					switch (parseInt(type)) {
						case 6:
						case 15:
						case 28:
						case 29:
						case 30:
							field_inp = first_el.find('.rockfm-txtbox-inp-val');
							field_inp.focus();
							break;
						case 7:
							field_inp = first_el.find('.rockfm-txtbox-inp-val');
							field_inp.focus();
							break;
						case 8:
						case 9:
						case 10:
						case 11:
							field_inp = first_el.find('.rockfm-input2-wrap');
							break;
						case 12:
							field_inp = first_el.find('.rockfm-fileupload-wrap');
							break;
						case 13:
							field_inp = first_el.find('.rockfm-fileupload-wrap');
							break;
						case 23:
							field_inp = first_el.find('.rockfm-colorpicker-wrap');
							break;
						case 24:
							field_inp = first_el.find('.rockfm-input7-datepic');
							break;
						case 25:
							field_inp = first_el.find('.rockfm-input7-timepic');
							break;
						case 26:
							field_inp = first_el.find('.rockfm-input7-datetimepic');
							break;
						case 43:
							field_inp = first_el.find('.uifm-input-flatpickr');
							break;
						case 0:
							break;
						default:
					}

					var tmp_top;

					tmp_top = parseFloat(field_inp.first().offset().top) - 100;
					if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
						if ('parentIFrame' in window) {
							parentIFrame.scrollTo(0, tmp_top);
						}
					} else {
						$('html,body').animate(
							{
								scrollTop: tmp_top,
							},
							'slow'
						);
					}
				} catch (ex) {
					console.error('validate_enableHighlight : ', ex.message + ' - ' + type);
				}
			};
			arguments.callee.validate_form = function(el_form) {
				var el, valid;
				cur_form_obj = el_form;
				el_form
					.find('.rockfm-required')
					.not('.rockfm-conditional-hidden')
					.not('.rockfm-cond-hidden-children')
					.on('click change keyup focus keypress', function() {
						rocketfm.validate_field($(this));
					});

				el_form
					.find('.rockfm-required')
					.not('.rockfm-conditional-hidden')
					.not('.rockfm-cond-hidden-children')
					.each(function(index, element) {
						rocketfm.validate_field($(element));
					});

				el_form
					.find('.rockfm-required')
					.not('.rockfm-conditional-hidden')
					.not('.rockfm-cond-hidden-children')
					.find('.rockfm-colorpicker-wrap')
					.colorpicker()
					.on('changeColor', function(ev) {
						var tmp_fld = $(this).closest('.rockfm-field');
						rocketfm.validate_field(tmp_fld);
					});

				if (
					parseInt(
						el_form
							.find('.rockfm-required')
							.not('.rockfm-conditional-hidden')
							.not('.rockfm-cond-hidden-children').length
					) > 0
				) {
					valid = false;
					this.validate_enableHighlight(el_form);
				} else {
					valid = true;
				}
				return {
					isValid: valid,
					error: '',
				};
			};

			arguments.callee.submitForm_showMessage = function(el, response, obj_btn) {
				var msg_error = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Error! Form was not submitted.</div>';
				var form_id = el
					.parent()
					.find('._rockfm_form_id')
					.val();
				var msg = '';
				var tmp_msg = el.parent().find('.rockfm-alert-container');
				tmp_msg.html('');
				var tmp_redirect_st = 0;
				var tmp_redirect_url = '';

				if (response) {
					var arrJson = (JSON && JSON.parse(response)) || $.parseJSON(response);
					if (parseInt(arrJson.success) === 1) {

						if (parseInt(arrJson.sm_redirect_st) === 1) {
							tmp_redirect_st = 1;
							tmp_redirect_url = decodeURIComponent(arrJson.sm_redirect_url);
						} else {
							msg = decodeURIComponent(arrJson.show_message);
							el.hide();
						}

						try {
							if (parseInt($('.g-recaptcha').length) > 0) {
								delete zgfm_recaptcha_elems['recaptcha_' + form_id];
								$.each(zgfm_recaptcha_elems, function(index, value) {
									grecaptcha.reset(zgfm_recaptcha_elems[index]);
								});
							}
						} catch (err) {}
					} else {
						msg = decodeURIComponent(arrJson.form_error_msg) || msg_error;
					}
				} else {
					msg = msg_error;
				}
				if (tmp_redirect_st === 1) {
					rocketfm.redirect_tourl(tmp_redirect_url);
					return false;
				} else {
					if (msg) { 
						var tmp_msg; 
						tmp_msg = el.parent().find('.rockfm-alert-container'); 
						if (rocketfm.isMultiStepActive(el)) { 
						} 

 						tmp_msg.html(''); 
						tmp_msg.append('<div class="rockfm-alert-inner" >' + msg + '</div>'); 
						tmp_msg.show(); 

 						if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') { 
							if ('parentIFrame' in window) { 
								parentIFrame.size(); 
								parentIFrame.scrollTo(0, tmp_msg.offset().top); 
							} 
						} else { 
							$('html,body').animate( 
								{ 
									scrollTop: tmp_msg.offset().top, 
								}, 
								'slow' 
							); 
						} 
					} 

					$('.popover').sfdc_popover('hide');
					if ($('.uiform-main-form [data-toggle="tooltip"]').length) {
						$('.uiform-main-form [data-toggle="tooltip"]').tooltip('destroy');
					}
					obj_btn.removeAttr('disabled').html(obj_btn.attr('data-val-btn'));
				}
				$(document).trigger('zgfm.form.after_submit', {});
			};
			arguments.callee.ms_submitForm_submit = function(el, obj_btn) { 
				let parentFormObj = el.closest('.rockfm-form'); 

 				formId = parseInt(parentFormObj.find('._rockfm_form_parent_id').val()); 

 				isMockingSubmit = 'no'; 
				if (rockfm_vars.hasOwnProperty('forms') && rockfm_vars.forms.hasOwnProperty(formId) && rockfm_vars.forms[formId].hasOwnProperty('is_mocking_submit')) { 
					isMockingSubmit = rockfm_vars.forms[formId]['is_mocking_submit']; 
				} 

				if (String(isMockingSubmit) === 'yes') { 
					var tmp_msg = el.parent().find('.rockfm-alert-container'); 
					tmp_msg.html(''); 
					tmp_msg.append('<div class="rockfm-alert-inner" ><div class="rockfm-alert rockfm-alert-success"><b>Success!</b> Form was submitted successfully</div></div>'); 
					$('html,body').animate( 
						{ 
							scrollTop: tmp_msg.offset().top, 
						}, 
						'slow' 
					); 
					tmp_msg.show(); 
					el.hide(); 

 					return; 
				} 

				if (parentFormObj.find('.rockfm-fileupload-wrap').length) { 
					var options = { 
						url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_ms_submit_ajaxmode',
						beforeSend: function() {}, 
						type: 'POST', 
						beforeSubmit: function(formData, formObject, formOptions) { 
							formData.push({ 
								name: 'zgfm_security', 
								value: rockfm_vars.ajax_nonce, 
							}); 
							formData.push({ 
								name: 'zgfm_is_demo', 
								value: uifmvariable.externalVars['is_demo'], 
							}); 
						}, 
						beforeSerialize: function(form, options) { 
							parentFormObj.find('.rockfm-conditional-hidden', form).remove(); 
							parentFormObj.find('.rockfm-cond-hidden-children', form).remove(); 
							obj_btn.attr('disabled', 'disabled').html(obj_btn.attr('data-val-subm') + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin"></i>'); 
						}, 

 						uploadProgress: function(event, position, total, percentComplete) {}, 
						success: function() {}, 
						complete: function(response) { 
							obj_btn.removeAttr('disabled'); 
							rocketfm.submitForm_showMessage(parentFormObj, response.responseText, obj_btn); 
						}, 
						error: function() { 
							console.log('errors'); 
						}, 
					}; 
					parentFormObj.ajaxForm(options); 
					parentFormObj.submit(); 
				} else { 
					var data = parentFormObj.uifm_serialize(); 
					$.ajax({ 
						type: 'post', 
						url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_ms_submit_ajaxmode',
						data: data + '&zgfm_is_demo=' + uifmvariable.externalVars['is_demo'] + '&zgfm_security=' + rockfm_vars.ajax_nonce, 
						async: true, 
						dataType: 'html', 

 						beforeSend: function() { 
							obj_btn.attr('disabled', 'disabled').html(obj_btn.attr('data-val-subm') + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin"></i>'); 
						}, 
						success: function(response) { 
							obj_btn.removeAttr('disabled'); 
							rocketfm.submitForm_showMessage(parentFormObj, response, obj_btn); 
						}, 
					}); 
				} 
			}; 
			arguments.callee.submitForm_submit = function(el) {
				if (el.find('._rockfm_type_submit') && parseInt(el.find('._rockfm_type_submit').val()) === 1) {
					var obj_btn = el.find('.rockfm-submitbtn .rockfm-txtbox-inp-val');
					if (el.find('.rockfm-fileupload-wrap').length) {
						var options = {
							url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_submit_ajaxmode',
							beforeSend: function() {},
							type: 'POST',
							beforeSubmit: function(formData, formObject, formOptions) {
								formData.push({ name: 'zgfm_security', value: rockfm_vars.ajax_nonce });
								formData.push({ name: 'zgfm_is_demo', value: uifmvariable.externalVars['is_demo'] });
							},
							beforeSerialize: function(form, options) {
								el.find('.rockfm-conditional-hidden', form).remove();
								el.find('.rockfm-cond-hidden-children', form).remove();
								obj_btn.attr('disabled', 'disabled').html(obj_btn.attr('data-val-subm') + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin"></i>');
							},

							uploadProgress: function(event, position, total, percentComplete) {},
							success: function() {},
							complete: function(response) {
								obj_btn.removeAttr('disabled');
								rocketfm.submitForm_showMessage(el, response.responseText, obj_btn);
							},
							error: function() {
								console.log('errors');
							},
						};
						el.ajaxForm(options);
						el.submit();
					} else {
						var data = el.uifm_serialize();
						$.ajax({
							type: 'post',
							url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_submit_ajaxmode',
							data: data + '&zgfm_is_demo=' + uifmvariable.externalVars['is_demo'] + '&zgfm_security=' + rockfm_vars.ajax_nonce,
							async: true,
							dataType: 'html',

							beforeSend: function() {
								obj_btn.attr('disabled', 'disabled').html(obj_btn.attr('data-val-subm') + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin"></i>');
							},
							success: function(response) {
								obj_btn.removeAttr('disabled');
								rocketfm.submitForm_showMessage(el, response, obj_btn);
							},
						});
					}
				} else {
					el.find('.rockfm-conditional-hidden').remove();
					el.find('.rockfm-cond-hidden-children').remove();
					el.submit();
				}
			};
			arguments.callee.captcha_validate = function() {
				var el_form = this.getInnerVariable('val_curform_obj');
				var captcha_obj = $(el_form).find('.rockfm-inp6-captcha');
				var el_field = captcha_obj.closest('.rockfm-field');
				var obj_btn = $(el_form).find('.rockfm-submitbtn .rockfm-txtbox-inp-val');
				$.ajax({
					type: 'POST',
					url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_validate_captcha',
					dataType: 'json',
					data: {
						action: 'rocket_front_valcaptcha',
						zgfm_security: rockfm_vars.ajax_nonce,
						'rockfm-code': el_field.find('.rockfm-inp6-captcha-code').val(),
						'rockfm-inpcode': el_field.find('.rockfm-inp6-captcha-inputcode').val(),
					},
					beforeSend: function() {
						rocketfm.submit_changeModbutton(el_form, true);
					},
					success: function(response) {
						try {
							rocketfm.submit_changeModbutton(el_form, false);
							if (typeof response == 'object') {
								if (response.success === true) {
									rocketfm.captcha_response(true);
								} else {
									rocketfm.captcha_response(false);
								}
							} else {
								rocketfm.captcha_response(false);
							}
						} catch (ex) {
							rocketfm.captcha_response(false);
						}
					},
				});
			};

			arguments.callee.captcha_response = function(success) {
				var temp = this.getInnerVariable('val_curform_obj');
				if (success === true) {
					rocketfm.submitForm_submit(temp);
				} else {
					var tmp_captcha = $(temp).find('.rockfm-inp6-captcha-inputcode');
					var hidePopover = function() {
						tmp_captcha.sfdc_popover('hide');
					};
					tmp_captcha
						.sfdc_popover('destroy')
						.sfdc_popover(rocketfm.validate_applyPopOverOpt(tmp_captcha))
						.focus(hidePopover)
						.sfdc_popover('show');

					if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
						if ('parentIFrame' in window) {
							parentIFrame.scrollTo(0, tmp_captcha.offset().top - 40);
						}
					} else {
						$('html,body').animate(
							{
								scrollTop: tmp_captcha.offset().top - 40,
							},
							'slow'
						);
					}
				}
			};

			arguments.callee.submit_changeModbutton = function(form_obj, load) {
				var obj_btn, obj_btn2;

				if (parseInt($(form_obj).find('.rockfm-submitbtn .rockfm-txtbox-inp-val').length) > 0) {
					obj_btn = $(form_obj).find('.rockfm-submitbtn .rockfm-txtbox-inp-val');

					if (load === true) {
						obj_btn.attr('disabled', 'disabled').html(obj_btn.attr('data-val-subm') + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
					} else {
						obj_btn.removeAttr('disabled').html(obj_btn.attr('data-val-btn'));
					}
				} else if (parseInt($(form_obj).find('.rockfm-wizardbtn .rockfm-btn-wiznext').length) > 0) {
					obj_btn = $(form_obj).find('.rockfm-wizardbtn .rockfm-btn-wizprev');
					obj_btn2 = $(form_obj).find('.rockfm-wizardbtn .rockfm-btn-wiznext');

					var tab_cur_index = form_obj.find('.uiform-steps li.uifm-current').index();

					var tab_next_obj = form_obj.find('.uiform-steps li.uifm-current').next();
					var tab_next_index = tab_next_obj.index();

					var tmp_lbl;
					if (parseFloat(tab_cur_index) < parseFloat(tab_next_index)) {
						tmp_lbl = obj_btn2.attr('data-value-next');
					} else {
						tmp_lbl = obj_btn2.attr('data-value-last');
					}

					if (load === true) {
						obj_btn.attr('disabled', 'disabled');
						obj_btn2
							.attr('disabled', 'disabled')
							.find('.rockfm-inp-lbl')
							.html(tmp_lbl + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
					} else {
						obj_btn.removeAttr('disabled');
						obj_btn2
							.removeAttr('disabled')
							.find('.rockfm-inp-lbl')
							.html(tmp_lbl);
					}
				} else {
				}
			};
			arguments.callee.recaptchav3_validate = function() {
				var form_obj = this.getInnerVariable('val_curform_obj');

				grecaptcha.execute(form_obj.attr('data-zgfm-recaptchav3-sitekey'), { action: 'submit' }).then(function(token) {
					$.ajax({
						type: 'POST',
						url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_check_recaptchav3',
						dataType: 'json',
						data: {
							action: 'rocket_front_checkrecaptchav3',
							zgfm_security: rockfm_vars.ajax_nonce,
							zgfm_token: token,
							form_id: form_obj.find('._rockfm_form_id').val(),
						},
						beforeSend: function() {
							rocketfm.submit_changeModbutton(form_obj, true);
						},
						success: function(response) {
							try {
								rocketfm.submit_changeModbutton(form_obj, false);
								if (typeof response == 'object') {
									if (response.success === true) {
										rocketfm.recaptchav3_response(true);
									} else {
										rocketfm.recaptchav3_response(false);
									}
								} else {
									rocketfm.recaptchav3_response(false);
								}
							} catch (ex) {
								rocketfm.recaptchav3_response(false);
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							rocketfm.recaptchav3_response(false);
						},
					});
				});
			};

			arguments.callee.recaptcha_validate = function() {
				var form_obj = this.getInnerVariable('val_curform_obj');
				var field_id = form_obj
					.find('.g-recaptcha')
					.closest('.rockfm-recaptcha')
					.attr('data-idfield');
				var form_id = this.getInnerVariable('submitting_form_id');
				var response = grecaptcha.getResponse(zgfm_recaptcha_elems['recaptcha_' + form_id]);

				$.ajax({
					type: 'POST',
					url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_check_recaptcha',
					dataType: 'json',
					data: {
						action: 'rocket_front_checkrecaptcha',
						zgfm_security: rockfm_vars.ajax_nonce,
						'rockfm-uid-field': field_id,
						'rockfm-code-recaptcha': response,
						form_id: form_obj.find('._rockfm_form_id').val(),
					},
					beforeSend: function() {
						rocketfm.submit_changeModbutton(form_obj, true);
					},
					success: function(response) {
						try {
							rocketfm.submit_changeModbutton(form_obj, false);
							if (typeof response == 'object') {
								if (response.success === true) {
									rocketfm.recaptcha_response(true);
								} else {
									rocketfm.recaptcha_response(false);
								}
							} else {
								rocketfm.recaptcha_response(false);
							}
						} catch (ex) {
							rocketfm.recaptcha_response(false);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						rocketfm.recaptcha_response(false);
					},
				});
			};

			arguments.callee.captcha_refreshImage = function(element) {
				var el = $(element);
				var el_data = el.data('rkver');
				var el_url = el.data('rkurl');
				var obj_field = el.closest('.rockfm-field');

				$.ajax({
					type: 'POST',
					url: rockfm_vars.uifm_siteurl + 'uiformbuilder/ajax_refresh_captcha',
					dataType: 'json',
					data: {
						action: 'rocket_front_refreshcaptcha',
						zgfm_security: rockfm_vars.ajax_nonce,
						rkver: el_data,
					},
					success: function(response) {
						obj_field.find('.rockfm-inp6-captcha-img').attr('src', el_url + response.rkver);
						el.attr('data-rkver', response.rkver);
						obj_field.find('.rockfm-inp6-captcha-code').val(response.code);
					},
				});
			};

			arguments.callee.recaptcha_response = function(success) {
				var temp = this.getInnerVariable('val_curform_obj');
				if (success === true) {
					rocketfm.submitForm_submit(temp);
				} else {
					var tmp_captcha = $(temp).find('.rockfm-input5-wrap');
					var hidePopover = function() {
						tmp_captcha.sfdc_popover('hide');
					};
					tmp_captcha
						.sfdc_popover('destroy')
						.sfdc_popover(rocketfm.validate_applyPopOverOpt(tmp_captcha))
						.focus(hidePopover)
						.sfdc_popover('show');


					if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
						if ('parentIFrame' in window) {
							parentIFrame.scrollTo(0, tmp_captcha.offset().top - 40);
						}
					} else {
						$('html,body').animate(
							{
								scrollTop: tmp_captcha.offset().top - 40,
							},
							'slow'
						);
					}
				}
			};
			arguments.callee.loadFields = function(obj_form) {
				if (obj_form.find('.rockfm-input4-slider').length) {
					var rockfm_slider_d = obj_form.find('.rockfm-input4-slider');
					rockfm_slider_d.each(function(i) {
						$(this).bootstrapSlider();
						$(this)
							.parent()
							.parent()
							.find('.slider-tick-label')
							.hide();
						$(this)
							.parent()
							.parent()
							.find('.rockfm-input4-number')
							.text($(this).val());

						obj_form.find('.rockfm-input4-slider').on('slide', function(slideEvt) {
							$(this)
								.parent()
								.parent()
								.find('.rockfm-input4-number')
								.text(slideEvt.value);

							$(this)
								.parent()
								.parent()
								.find('.slider-tick-label')
								.show();
						});
					});
				}

				if (obj_form.find('.rockfm-input4-spinner').length) {
					var spinners = obj_form.find('.rockfm-input4-spinner'),
						s_min,
						s_max,
						s_step,
						s_value;
					spinners.each(function(i) {
						(s_min = $(this).attr('data-rockfm-min')), (s_max = $(this).attr('data-rockfm-max')), (s_step = $(this).attr('data-rockfm-step')), (s_value = $(this).attr('data-rockfm-value'));
						let s_decimals = $(this).attr('data-rockfm-decimal') || 0;
						$(this).TouchSpin({
							verticalbuttons: true,
							min: parseFloat(s_min),
							max: parseFloat(s_max),
							step: parseFloat(s_step),
							verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
							verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus',
							initval: parseFloat(s_value),
							decimals: parseFloat(s_decimals),
						});
					});
				}
				if (obj_form.find('.rockfm-input15-switch').length) {
					var rockfm_switch_d = obj_form.find('.rockfm-input15-switch');

					rockfm_switch_d.each(function(i) {
						$(this).bootstrapSwitchZgpb({
							onText: $(this).attr('data-uifm-txt-yes'),
							offText: $(this).attr('data-uifm-txt-no'),
						});
					});
				}
				if (obj_form.find('.rockfm-input17-wrap .uifm-dcheckbox-item').length) {
					obj_form.find('.rockfm-input17-wrap .uifm-dcheckbox-item').uiformDCheckbox();
				}

				if (obj_form.find('.rockfm-input17-wrap .uifm-dradiobtn-item').length) {
					obj_form.find('.rockfm-input17-wrap .uifm-dradiobtn-item').uiformDCheckbox();
				}
				if (obj_form.find('.g-recaptcha').length) {
					if (parseInt(obj_form.find('.g-recaptcha').length) > 0) {
						var rockfm_rcha_d = obj_form.find('.g-recaptcha');
						rockfm_rcha_d.each(function(i) {
							$(this).attr('id', 'zgfm_recaptcha_obj_' + obj_form.find('._rockfm_form_id').val());
						});
					}

					if (parseInt(obj_form.find('.g-recaptcha').length) > 1) {
						var rockfm_rcha_d = obj_form.find('.g-recaptcha');
						rockfm_rcha_d.each(function(i) {
							if (parseInt(i) != 0) {
								$(this)
									.removeClass('g-recaptcha')
									.html('ReCaptcha is loaded once. Remove this field');
							}
						});
					}

					if (!$('#zgfm_form_lib_recaptcha').length) {
						var rockfm_recaptcha = document.createElement('script');
						rockfm_recaptcha.type = 'text/javascript';
						rockfm_recaptcha.async = true;
						rockfm_recaptcha.id = 'zgfm_form_lib_recaptcha';
						rockfm_recaptcha.defer = 'defer';
						rockfm_recaptcha.src = 'https://www.google.com/recaptcha/api.js?onload=zgfm_recaptcha_onloadCallback&render=explicit';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(rockfm_recaptcha, s);
					}
				}

				if (parseInt(obj_form.attr('data-zgfm-recaptchav3-active')) === 1) {
					let siteKey = obj_form.attr('data-zgfm-recaptchav3-sitekey');
					var rockfm_recaptcha = document.createElement('script');
					rockfm_recaptcha.type = 'text/javascript';
					rockfm_recaptcha.async = true;
					rockfm_recaptcha.id = 'zgfm_form_lib_recaptchav3';
					rockfm_recaptcha.defer = 'defer';
					rockfm_recaptcha.src = 'https://www.google.com/recaptcha/api.js?render=' + siteKey;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(rockfm_recaptcha, s);
				}

				if (obj_form.find('.rockfm-captcha').length) {
					if (parseInt(obj_form.find('.rockfm-captcha').length) > 1) {
						var rockfm_capcha_d = obj_form.find('.rockfm-captcha');
						rockfm_capcha_d.each(function(i) {
							if (parseInt(i) != 0) {
								$(this)
									.find('.rockfm-inp6-captcha')
									.removeClass('rockfm-inp6-captcha')
									.html('Captcha is loaded once. Remove this field');
							}
						});
					}
					var rockfm_capcha_refobj = obj_form.find('.rockfm-captcha .rockfm-inp6-wrap-refrescaptcha a');
					rocketfm.captcha_refreshImage(rockfm_capcha_refobj);
				}


				if (obj_form.find('.rockfm-input7-datepic').length) {
					var rockfm_datepic_d = obj_form.find('.rockfm-input7-datepic');
					var rkfm_datepic_tmp1, rkfm_datepic_tmp2;
					rockfm_datepic_d.each(function(i) {
						$(this).datetimepicker({
							format: 'L',
						});
						rkfm_datepic_tmp1 = $(this).attr('data-rkfm-language');
						if (rkfm_datepic_tmp1) {
							$(this)
								.data('DateTimePicker')
								.locale(rkfm_datepic_tmp1);
						}
						rkfm_datepic_tmp2 = $(this).attr('data-rkfm-showformat');
						if (rkfm_datepic_tmp2) {
							$(this)
								.data('DateTimePicker')
								.dayViewHeaderFormat(rkfm_datepic_tmp2);
							$(this)
								.data('DateTimePicker')
								.format(rkfm_datepic_tmp2);
						}
					});
				}

				if (obj_form.find('.uifm-input-flatpickr').length) {
					var rockfm_datepic_d = obj_form.find('.uifm-input-flatpickr');
					var rkfm_datepic_tmp1, rkfm_datepic_tmp2;
					var flatpick_instance;
					rockfm_datepic_d.each(function(i) {
						var tmp = {};

						if (parseInt($(this).attr('data-rkfm-enabletime')) === 1) {
							tmp['enableTime'] = true;
						} else {
							tmp['enableTime'] = false;
						}

						if (parseInt($(this).attr('data-rkfm-nocalendar')) === 1) {
							tmp['noCalendar'] = true;
						} else {
							tmp['noCalendar'] = false;
						}

						if (parseInt($(this).attr('data-rkfm-time24hr')) === 1) {
							tmp['time_24hr'] = true;
						} else {
							tmp['time_24hr'] = false;
						}

						if (parseInt($(this).attr('data-rkfm-altinput')) === 1) {
							tmp['altInput'] = true;
						} else {
							tmp['altInput'] = false;
						}

						if (String($(this).attr('data-rkfm-altformat')).length > 0) {
							tmp['altFormat'] = $(this).attr('data-rkfm-altformat');
						} else {
							tmp['altFormat'] = 'F j, Y';
						}

						if (String($(this).attr('data-rkfm-dateformat')).length > 0) {
							tmp['dateFormat'] = $(this).attr('data-rkfm-dateformat');
						} else {
							tmp['dateFormat'] = 'Y-m-d';
						}

						tmp['locale'] = $(this).attr('data-rkfm-language');

						if (String($(this).attr('data-rkfm-mindate')).length > 0) {
							tmp['minDate'] = $(this).attr('data-rkfm-mindate');
						}

						if (String($(this).attr('data-rkfm-maxdate')).length > 0) {
							tmp['maxDate'] = $(this).attr('data-rkfm-maxdate');
						}

						if (String($(this).attr('data-rkfm-defaultdate')).length > 0) {
							tmp['defaultDate'] = $(this).attr('data-rkfm-defaultdate');
						}

						tmp['allowInput'] = true;

						if (parseInt($(this).attr('data-rkfm-isinline')) === 1) {
							tmp['inline'] = true;
						} else {
							tmp['wrap'] = true;
						}

						tmp['onChange'] = function(selectedDates, dateStr, instance) {
							$(instance.element)
								.find('input')
								.val(dateStr);
						};

						flatpick_instance = $(this).flatpickr(tmp);
						$(this).data('zgfm_flatpicker', flatpick_instance);
					});
				}

				if (obj_form.find('.rockfm-input7-timepic').length) {
					var rockfm_timepic_d = obj_form.find('.rockfm-input7-timepic');
					rockfm_timepic_d.each(function(i) {
						$(this).datetimepicker({
							format: 'LT',
						});
					});
				}
				if (obj_form.find('.rockfm-input7-datetimepic').length) {
					var rockfm_datetm_d = obj_form.find('.rockfm-input7-datetimepic');
					var rkfm_datetm_tmp1, rkfm_datetm_tmp2;
					rockfm_datetm_d.each(function(i) {
						$(this).datetimepicker({
							minDate: new Date(),
						});
						rkfm_datetm_tmp1 = $(this).attr('data-rkfm-language');
						if (rkfm_datetm_tmp1) {
							$(this)
								.data('DateTimePicker')
								.locale(rkfm_datetm_tmp1);
						}
						rkfm_datetm_tmp2 = $(this).attr('data-rkfm-showformat');
						if (rkfm_datetm_tmp2) {
							$(this)
								.data('DateTimePicker')
								.dayViewHeaderFormat(rkfm_datetm_tmp2);
						}
					});

				}

				if (obj_form.find('.rockfm-input-ratingstar').length) {
					var rockfm_rstar_d = obj_form.find('.rockfm-input-ratingstar');
					rockfm_rstar_d.each(function(i) {
						$(this).rating({
							starCaptions:
								{
									1: $(this).attr('data-uifm-txt-star1') || 'very bad',
									2: $(this).attr('data-uifm-txt-star2') || 'bad',
									3: $(this).attr('data-uifm-txt-star3') || 'ok',
									4: $(this).attr('data-uifm-txt-star4') || 'good',
									5: $(this).attr('data-uifm-txt-star5'),
								} || 'very good',
							clearCaption: $(this).attr('data-uifm-txt-norate'),
							starCaptionClasses: {
								1: 'text-danger',
								2: 'text-warning',
								3: 'text-info',
								4: 'text-primary',
								5: 'text-success',
							},
						});
					});
				}

				var tmp_load_obj;

				if (obj_form.find('.rockfm-input2-sel-styl1').length) {
					tmp_load_obj = obj_form.find('.rockfm-input2-sel-styl1');
					tmp_load_obj.each(function(i) {
						$(this).selectpicker({
							noneSelectedText: $(this)
								.parent()
								.attr('data-theme-stl1-txtnosel'),
							noneResultsText: $(this)
								.parent()
								.attr('data-theme-stl1-txtnomatch'),
							countSelectedText: $(this)
								.parent()
								.attr('data-theme-stl1-txtcountsel'),
						});
					});
				}

				if (obj_form.find('.rockfm-input2-sel-styl2').length) {
					tmp_load_obj = obj_form.find('.rockfm-input2-sel-styl2');
					tmp_load_obj.each(function(i) {
						$(this).select2({
							placeholder: 'Select an option',
							theme: 'classic',
							width: '100%',
						});
					});
				}

				if (obj_form.find('.rockfm-input2-chk-styl1').length) {
					tmp_load_obj = obj_form.find('.rockfm-input2-chk-styl1');
					var tmp_chk_icon;
					tmp_load_obj.each(function(i) {
						tmp_chk_icon = $(this).attr('data-chk-icon');
						$(this).checkradios({
							checkbox: {
								iconClass: tmp_chk_icon,
							},
							radio: {
								iconClass: tmp_chk_icon,
							},
						});
					});
				}

				if (obj_form.find('.rockfm-colorpicker-wrap').length) {
					var rockfm_cpicker_d = obj_form.find('.rockfm-colorpicker-wrap');
					rockfm_cpicker_d.each(function(i) {
						$(this).colorpicker();
					});
				}
				if (obj_form.find('[data-rockfm-gfont]').length) {
					var rockfm_tmp = obj_form.find('[data-rockfm-gfont]');
					var rockfm_uniq_font = [];
					rockfm_tmp.each(function(i) {
						if ($.inArray($(this).attr('data-rockfm-gfont'), rockfm_uniq_font) === -1) {
							var atImport = '@import url(//fonts.googleapis.com/css?family=' + $(this).attr('data-rockfm-gfont');
							$('<style>')
								.append(atImport)
								.appendTo('head');
							rockfm_uniq_font.push($(this).attr('data-rockfm-gfont'));
						}
					});
				}

				obj_form.zgfm_logicfrm();

				if (obj_form.find('.rockfm-clogic-fcond').length) {

					obj_form.data('zgfm_logicfrm').update_local_fields(
						obj_form
							.parent()
							.find('.rockfm_clogic_data')
							.val()
					);
					obj_form.data('zgfm_logicfrm').setData();
					obj_form.data('zgfm_logicfrm').refreshfields();
				}

				if (rocketfm.isMultiStepActive(obj_form)) {
					let parent = obj_form.closest('.rockfm-form');
					obj_form.data('zgfm_logicfrm').setParent(parent);

				} else {

					let btnObjs = $('.rockfm-submitbtn.rockfm-field [type="button"],.rockfm-submitbtn.rockfm-field [type="submit"]');

					let firstBtn = btnObjs.first();

					if (firstBtn.attr('data-ms-action') === undefined) {
						obj_form.on('click', '.rockfm-submitbtn.rockfm-field [type="button"],.rockfm-submitbtn.rockfm-field [type="submit"]', function(e) {
							e.preventDefault();
							e.stopPropagation();
							rocketfm.single_submitbtn_click_event($(e.target));
						});
					}
				}

				$('.uiform-main-form [data-toggle="tooltip"]').tooltip({
					selector: '',
					placement: 'top',
					container: obj_form,
					html: true,
				});

				obj_form.find('input, textarea').placeholder();

				$.each(obj_form.find('.rockfm-conditional-hidden'), function(i, val) {
					$(this)
						.find('.rockfm-field')
						.addClass('rockfm-cond-hidden-children');
				});

				if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
					if ('parentIFrame' in window) {
						parentIFrame.size(); 
					}
				}

				zgfm_front_helper.load_form_init_events(obj_form);

				if (rocketfm.isMultiStepActive(obj_form)) {
					obj_form.data('zgfm_logicfrm').connection_router();
				}

				wp.hooks.applyFilters('zgfmfront.initForm_loadAddLibs');
			};
			arguments.callee.common_submitbtn_click_event = function(element) {
				let btnObj = $(element);

				let multiStepFormCont = btnObj.closest('.rockfm-form');
				let isMultistep = multiStepFormCont.attr('data-zgfm-is-ms');
				if (parseInt(isMultistep) === 1) {
					rocketfm.multiple_submitbtn_click_event(element);
				} else {
					rocketfm.single_submitbtn_click_event(element);
				}
			};

			arguments.callee.multiple_submitbtn_click_event = function(element) {
				let btnObj = $(element);
				let obj_form = btnObj.closest('.rockfm_form_single');

				let btnContainer = btnObj.closest('.rockfm-submitbtn');

				if (String(btnObj.attr('data-ms-action')) === 'previous') {
					obj_form.data('zgfm_logicfrm').ms_load_prev_step();
				} else if (parseInt(btnContainer.attr('data-uifm_mm_is_last_step')) === 1) {
					rocketfm.setInnerVariable('submitting_form_id', obj_form.find('._rockfm_form_id').val());
					rocketfm.ms_submitForm_process(obj_form, btnObj);
				} else {
					obj_form.data('zgfm_logicfrm').ms_load_next_step();
				}
			};
			arguments.callee.single_submitbtn_click_event = function(element) {
				let btnObj = $(element);
				let obj_form = btnObj.closest('.rockfm-form');
				rocketfm.setInnerVariable('submitting_form_id', obj_form.find('._rockfm_form_id').val());

				rocketfm.submitForm_process(obj_form, btnObj);
			};

			arguments.callee.load_single_form = function(obj_form_list) {
				var obj_form;
				obj_form_list.each(function(i) {
					obj_form = $(this).find('.rockfm-form');
					if (!obj_form.hasClass('rockfm-form-mloaded')) {
						obj_form.addClass('rockfm-form-mloaded');

						if (obj_form.find('.rockfm_main_data')) {
							obj_form.zgpb_datafrm(obj_form.find('.rockfm_main_data').val());
						} else {
							obj_form.zgpb_datafrm();
						}

						if (parseInt(obj_form.data('zgpb_datafrm').getData('onload_scroll')) === 1) {
							if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
								if ('parentIFrame' in window) {
									parentIFrame.scrollTo(0, obj_form.offset().top);
								}
							} else {
								$('html,body').animate(
									{
										scrollTop: obj_form.offset().top,
									},
									'slow'
								);
							}
						}
						rocketfm.loadFields(obj_form);

						$(document).trigger('zgfm.form.init_loaded', {
							form: obj_form,
						});
					}
				});
			};

			arguments.callee.load_multistep_form = function(obj_form_list) {
				var obj_form;
				var parent_form;
				obj_form_list.each(function(i) {
					parent_form = $(this)
						.find('.rockfm-form')
						.first();

					obj_form = $(this).find('.rockfm-form .rockfm_form_single');

					if (!obj_form.hasClass('rockfm-form-mloaded')) {
						obj_form.addClass('rockfm-form-mloaded');

						if (parent_form.find('.rockfm_main_data')) {
							parent_form.zgpb_datafrm(parent_form.find('.rockfm_main_data').val());
						} else {
							parent_form.zgpb_datafrm();
						}

						parent_form.data('zgpb_datafrm').setConnections(parent_form.find('.rockfm_connection_data').val());
						parent_form.data('zgpb_datafrm').setExtra(parent_form.find('.rockfm_connection_extra').val());
						parent_form.data('zgpb_datafrm').setData('init_form', parent_form.find('.rockfm_data_initform').val());
						parent_form.data('zgpb_datafrm').setData('ms_current_parent_form_id', parent_form.find('._rockfm_form_parent_id').val());
						parent_form.data('zgpb_datafrm').setData('ms_form_current_id', parent_form.find('.rockfm_data_initform').val());

						parent_form.data('zgpb_datafrm').showSettings();
						if (parseInt(parent_form.data('zgpb_datafrm').getData('onload_scroll')) === 1) {
							if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
								if ('parentIFrame' in window) {
									parentIFrame.scrollTo(0, parent_form.offset().top);
								}
							} else {
								$('html,body').animate(
									{
										scrollTop: parent_form.offset().top,
									},
									'slow'
								);
							}
						}

						rocketfm.loadFields(obj_form);

						$(document).trigger('zgfm.form.init_loaded', {
							form: obj_form,
						});
					}
				});
			};
			arguments.callee.loadform_init = function() {
				let obj_form_list = $('.rockfm-form-container');

				if (obj_form_list.length) {
					this.load_single_form(obj_form_list);
				}

				let obj_form_list_multistep = $('.rockfm-form-container-ms');

				if (obj_form_list_multistep.length) {
					this.load_multistep_form(obj_form_list_multistep);
				}
			};


			arguments.callee.ms_submitForm_process = function(obj_form, e) {
				rocketfm.submitForm_process_beforeVal(
					function(data) {
						if (data.is_valid === true) {
							rocketfm.submitForm_process_validation(e, obj_form, function(data) {
								if (data.is_valid === true) {
									rocketfm.ms_submitForm_submit(obj_form, e);
								}
							});
						} else {
						}
					},
					function(error) {
						console.log('error ' + error.test);
					}
				);
			};


			arguments.callee.submitForm_process = function(obj_form, e) {
				rocketfm.submitForm_process_beforeVal(
					function(data) {
						if (data.is_valid === true) {
							rocketfm.submitForm_process_validation(e, obj_form, function(data) {
								if (data.is_valid === true) {
									rocketfm.submitForm_submit(obj_form, e); 
								}
							});
						}
					},
					function(error) {
						console.log('error ' + error.test);
					}
				);
			};
			arguments.callee.ms_validation_passed = function(obj_form) { 
				var el_form = obj_form; 
				this.setInnerVariable('val_curform_obj', el_form); 
				var res_val = this.validate_form(el_form); 

 				if (res_val.isValid) { 
					return true; 
				} 

 				return false; 
			}; 
			arguments.callee.submitForm_process_validation = function(e, obj_form, callback) {
				var el_form = obj_form;
				this.setInnerVariable('val_curform_obj', el_form);
				var res_val = this.validate_form(el_form);

				var events = rocketfm.getInnerVariable('submit_form_events');

				if (res_val.isValid) {
					if (el_form.find('.g-recaptcha').length) {
						this.recaptcha_validate();
					} else if (el_form.find('.rockfm-inp6-captcha').length) {
						this.captcha_validate();
					} else {
						if (zgfm_front_helper.event_isDefined_toEl(document, 'additional_validation.form', events)) {
							$(document).trigger('zgfm.form.additional_validation', [callback]);
						} else {
							callback({
								is_valid: true,
							});
						}
					}
				}
			};

			arguments.callee.submitForm_process_beforeVal = function(callback, errorCallback) {
				if (false) {
					errorCallback({ test: 'test1' });
				} else {
					var eventos = $(document).getZgfmEvents();

					rocketfm.setInnerVariable('submit_form_events', eventos);

					if (zgfm_front_helper.event_isDefined_toEl(document, 'before_submit.form', eventos)) {
						$(document).trigger('zgfm.form.before_submit', [callback]);
					} else {
						callback({
							is_valid: true,
						});
					}
				}
			};

			arguments.callee.previewfield_removeAllPopovers = function() {
				var tmp_popover = $('.uiform-main-form [aria-describedby^=popover]');
				if (tmp_popover) {
					$.each(tmp_popover, function(index, element) {
						$(element).sfdc_popover('destroy');
					});
				}
			};

			arguments.callee.refresh_fields = function(el) {
				let obj_form = this.getInnerVariable('val_curform_obj');
				if (obj_form.find('.rockfm-input17-wrap .uifm-dcheckbox-item').length) {
					obj_form.find('.rockfm-input17-wrap .uifm-dcheckbox-item').uiformDCheckbox('_refresh');
				}

				if (obj_form.find('.rockfm-input17-wrap .uifm-dradiobtn-item').length) {
					obj_form.find('.rockfm-input17-wrap .uifm-dradiobtn-item').uiformDCheckbox('_refresh');
				}
			};

			arguments.callee.wizard_nextButton = function(el) {
				var el_form = $(el).closest('.rockfm-form');
				this.setInnerVariable('val_curform_obj', el_form);
				rocketfm.setInnerVariable('submitting_form_id', el_form.find('._rockfm_form_id').val());

				var objform = $(el).closest('.rockfm-form');
				var objtabs = objform.find('.uiform-steps li');
				var tabs_num = objtabs.length;
				var tab_cur_index = objform.find('.uiform-steps li.uifm-current').index();

				var tab_next_obj = objform.find('.uiform-steps li.uifm-current').next();
				var tab_next_index = tab_next_obj.index();
				var gotab_next;
				var gotab_next_cont;
				var gotab_cur;
				var gotab_cur_cont;

				gotab_cur = objtabs.eq(tab_cur_index);
				gotab_cur_cont = $(gotab_cur)
					.find('a')
					.attr('data-tab-href');
				var obj_cur_form = objform.find(gotab_cur_cont);
				var res_val = this.validate_form(obj_cur_form);

				var events = rocketfm.getInnerVariable('submit_form_events');
				if (!events) {
					var eventos = $(document).getZgfmEvents();
					rocketfm.setInnerVariable('submit_form_events', eventos);
				}

				rocketfm.wizard_nextButton_validate(obj_cur_form, res_val, function(data) {
					if (data.is_valid === true) {
						rocketfm.previewfield_removeAllPopovers();

						if (parseInt(el_form.data('zgpb_datafrm').getData('onload_scroll')) === 1) {
							if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
								if ('parentIFrame' in window) {
									parentIFrame.scrollTo(0, el_form.offset().top);
								}
							} else {
								$('html,body').animate(
									{
										scrollTop: el_form.offset().top,
									},
									'slow'
								);
							}
						}

						gotab_cur.removeClass('uifm-current').addClass('uifm-complete');
						objform.find(gotab_cur_cont).hide();
						gotab_next = objtabs.eq(tab_next_index);
						gotab_next.removeClass('uifm-disabled').addClass('uifm-current');
						gotab_next_cont = $(gotab_next)
							.find('a')
							.attr('data-tab-href');
						objform.find(gotab_next_cont).show();

						var tmp_nex_cur_form = objform.find(gotab_next_cont);
						tmp_nex_cur_form.show();

						if (parseFloat(tab_cur_index) < parseFloat(tab_next_index)) {
							var tab_next2_obj_index = tab_next_obj.next().index();
							objform.find('.rockfm-btn-wizprev').removeAttr('disabled');

							if (parseFloat(tab_next2_obj_index) > 0 && parseFloat(tab_next2_obj_index) > parseFloat(tab_next_index)) {
							} else {
								var wiznext_lasttxt = tmp_nex_cur_form.find('.rockfm-btn-wiznext').attr('data-value-last') || 'finish';
								tmp_nex_cur_form
									.find('.rockfm-btn-wiznext')
									.find('.rockfm-inp-lbl')
									.html(wiznext_lasttxt);
							}
						} else {
							var obj_btn = el_form.find('.rockfm-btn-wiznext');
							obj_btn.html(obj_btn.html() + ' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
							obj_btn.attr('disabled', true);
							rocketfm.submitForm_submit(el_form);
						}
					}
				});

				if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
					if ('parentIFrame' in window) {
						parentIFrame.size(); 
					}
				}

				this.refresh_fields();
			};


			arguments.callee.wizard_nextButton_validate = function(el_form, res_val, callback) {
				var events = rocketfm.getInnerVariable('submit_form_events');

				if (res_val.isValid) {
					if (el_form.find('.g-recaptcha').length) {
						this.recaptcha_validate();
					} else if (el_form.find('.rockfm-inp6-captcha').length) {
						this.captcha_validate();
					} else {
						if (zgfm_front_helper.event_isDefined_toEl(document, 'form.wizbtn_additional_validation', events)) {
							$(document).trigger('zgfm.form.wizbtn_additional_validation', [callback]);
						} else {
							callback({
								is_valid: true,
							});
						}
					}
				}
			};

			arguments.callee.wizard_prevButton = function(el) {
				var objform = $(el).closest('.rockfm-form');
				var objtabs = objform.find('.uiform-steps li');
				var tabs_num = objtabs.length;
				var tab_cur_index = objform.find('.uiform-steps li.uifm-current').index();

				var tab_prev_obj = objform.find('.uiform-steps li.uifm-current').prev();
				var tab_prev_index = tab_prev_obj.index();
				var gotab_prev;
				var gotab_prev_cont;
				var gotab_cur;
				var gotab_cur_cont;
				if (tab_prev_obj) {
					gotab_cur = objtabs.eq(tab_cur_index);
					gotab_cur
						.removeClass('uifm-current')
						.removeClass('uifm-complete')
						.addClass('uifm-disabled');

					gotab_cur_cont = $(gotab_cur)
						.find('a')
						.attr('data-tab-href');
					objform.find(gotab_cur_cont).hide();
					gotab_prev = objtabs.eq(tab_prev_index);
					gotab_prev
						.removeClass('uifm-disabled')
						.removeClass('uifm-complete')
						.addClass('uifm-current');

					gotab_prev_cont = $(gotab_prev)
						.find('a')
						.attr('data-tab-href');
					objform.find(gotab_prev_cont).show();
				}

				if (parseFloat(tab_cur_index) > parseFloat(tab_prev_index)) {
					var tab_prev2_obj_index = tab_prev_obj.prev().index();
					if (parseFloat(tab_prev2_obj_index) >= 0 && parseFloat(tab_prev2_obj_index) < parseFloat(tab_prev_index)) {
					} else {
						this.previewfield_removeAllPopovers();
						var wiznext_ntxt =
							objform
								.find('#uifm-step-tab-' + tab_prev_index)
								.find('.rockfm-btn-wiznext')
								.attr('data-value-next') || 'next';
						objform.find('.rockfm-btn-wiznext .rockfm-inp-lbl').html(wiznext_ntxt);
						objform.find('.rockfm-btn-wizprev').attr('disabled', 'disabled');
					}
				}

				if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
					if ('parentIFrame' in window) {
						parentIFrame.size(); 
					}
				}
				$('.popover').sfdc_popover('hide');

				this.refresh_fields();
			};
			arguments.callee.add_formloaded = function(value) {
				var temp;
				temp = this.getInnerVariable('form_loaded');
				if (temp === '') {
					temp = [];
					this.setInnerVariable('form_loaded', []);
				}
				temp.push(value);
				this.setInnerVariable('form_loaded', temp);
			};
			arguments.callee.run_form = function(form_id) {
				var check_field = $.inArray(form_id, this.getInnerVariable('form_loaded'));
				if (check_field < 0) {
					this.add_formloaded(form_id);
					this.loadform_content(form_id);
				}
			};

			arguments.callee.test_slider = function() {
				console.log('ups slider');

				$('#ex2').slider();
			};

			arguments.callee.run_form2 = function(form_id) {
				var check_field = $.inArray(form_id, this.getInnerVariable('form_loaded'));
				if (check_field < 0) {
					this.add_formloaded(form_id);
					rocketfm.loadform_init();
				}
			};

			arguments.callee.loadform_content = function(form_id) {
				var form_obj = $('#uifm_container_' + form_id);
				$.ajax({
					async: true,
					type: 'post',
					url: UIFORM_WWW + 'uiformbuilder/getform',
					data: 'id=' + encodeURIComponent(form_id),
					dataType: 'html',
					beforeSend: function() {},
					success: function(response) {
						var msg;
						if (response) {
							var arrJson = $.parseJSON(response);

							if (arrJson.hasOwnProperty('success') && parseInt(arrJson['success']) === 0) {
								form_obj.html(arrJson['html_content']);
								return;
							}

							rockfm_vars = arrJson.rockfm_vars_arr;
							var scripts_arr = [];

							for (var key in rockfm_vars['enqueue_scripts']) {
								if (rockfm_vars['enqueue_scripts'].hasOwnProperty(key)) {
									for (var key2 in rockfm_vars['enqueue_scripts'][key]) {
										for (var key3 in rockfm_vars['enqueue_scripts'][key][key2]) {
											switch (key3) {
												case 'scripts':
													for (var key4 in rockfm_vars['enqueue_scripts'][key][key2][key3]) {
														scripts_arr.push(rockfm_vars['enqueue_scripts'][key][key2][key3][key4]['src']);
													}
													break;
												case 'styles':
													for (var key4 in rockfm_vars['enqueue_scripts'][key][key2][key3]) {
														zgfm_front_helper.uifm_load_one_cssfile(rockfm_vars['enqueue_scripts'][key][key2][key3][key4]['src'], rockfm_vars['enqueue_scripts'][key][key2][key3][key4]['id']);
													}

													break;
											}
										}
									}
								}
							}

							if ($.isArray(scripts_arr) && scripts_arr.length) {
								var l = new zgfm_Loader();
								l.require(scripts_arr, function() {
									msg = decodeURIComponent(arrJson.html_content);
									form_obj.html(msg);
									rocketfm.loadform_init();
								});
							} else {
								msg = decodeURIComponent(arrJson.html_content);
								form_obj.html(msg);
								rocketfm.loadform_init();
							}
						} else {
							msg = 'Error. Try refresh again.';
						}
					},
					complete: function() {},
					error: function(data, errorThrown) {
						console.log('request failed :' + errorThrown);
					},
				});
			};

			arguments.callee.modal_resizeWhenIframe = function() {
				if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
					if ('parentIFrame' in window) {
						var height = $('.uiform_modal_general')
							.find('.sfdc-modal-body')
							.height();
						parentIFrame.size(parseFloat(height) + 300); 
					}
				}
			};
			arguments.callee.modal_onclose = function() {
				if (String(uifmvariable.externalVars['fm_loadmode']) === 'iframe') {
					if ('parentIFrame' in window) {
						parentIFrame.size(); 
					}
				}
			};
			arguments.callee.redirect_tourl = function(redirect) {
				if (window.event) {
					window.event.returnValue = false;
					window.location = redirect;
				} else {
					location.href = redirect;
				}
			};

						arguments.callee.isMultiStepActive = function(obj) { 
				let multiStepFormCont = $(obj).closest('.rockfm-form'); 
				let isMultistep = multiStepFormCont.attr('data-zgfm-is-ms'); 
				if (parseInt(isMultistep) === 1) { 
					return true; 
				} 

 				return false; 
			}; 
		};
	})($uifm, window);
}

(function($) {
	var zgfmLogicFrm = function(element, options) {
		var cur_parent_obj; 
		var cur_form_obj = $(element);
		var obj = this;
		var logical_fields = [];
		var fields_cond = [];
		var fields_fire = [];
		var cur_field_fire_value;
		var cur_field_fire_id;

		this.update_local_fields = function(options) { 
			logical_fields = (JSON && JSON.parse(options)) || $.parseJSON(options); 
		}; 

		this.publicMethod = function() {};

		var privateMethod = function() {};

		var runExtraTasks = function(field) {};
		this.setParent = function(parent) { 
			cur_parent_obj = parent; 
		}; 
		this.setData = function() {
			this.processData();
		};

		this.processData = function() {
			fields_cond = logical_fields.cond;
			fields_fire = logical_fields.fire;
		};

		this.getValueFieldFire = function(element) {
			cur_field_fire_value = $(element).val();
		};

		this.getValueFieldById = function(id_field, input) {
			var getrow = cur_form_obj.find('#rockfm_' + id_field);
			var tmp_theme_type;
			var response = {
				value_field: null,
				input_field: null,
			};
			if (getrow) {
				var type = getrow.attr('data-typefield');
				var tempvar;
				var searchInput;
				switch (parseInt(type)) {
					case 8:

						tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');

						switch (parseInt(tmp_theme_type)) {
							case 1:
								tempvar = getrow.find('.rockfm-inp2-rdo');

								searchInput = tempvar
									.map(function(index) {
										if (
											$(this)
												.parent()
												.hasClass('checked')
										) {
											return $(this).val();
										} else {
											return null;
										}
									})
									.toArray();

								response['value_field'] = searchInput[0];
								response['input_field'] = input;

								break;
							default:
								tempvar = getrow.find('.rockfm-inp2-rdo');

								searchInput = tempvar
									.map(function(index) {
										if ($(this).is(':checked')) {
											return $(this).val();
										} else {
											return null;
										}
									})
									.toArray();

								response['value_field'] = searchInput[0];
								response['input_field'] = input;
								break;
						}

						break;
					case 9:
						tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');

						switch (parseInt(tmp_theme_type)) {
							case 1:
								tempvar = getrow.find('.rockfm-inp2-chk');

								searchInput = tempvar
									.map(function(index) {
										if (
											$(this)
												.parent()
												.hasClass('checked')
										) {
											return $(this).val();
										} else {
											return null;
										}
									})
									.toArray();

								var tmp_found_val = '';
								if ($.inArray(input, searchInput) != -1) {
									tmp_found_val = input;
								} else {
									tmp_found_val = '';
								}

								response['value_field'] = tmp_found_val;
								response['input_field'] = input;
								break;
							default:
								tempvar = getrow.find('.rockfm-inp2-chk');
								searchInput = tempvar
									.map(function(index) {
										if ($(this).is(':checked')) {
											return $(this).val();
										} else {
											return null;
										}
									})
									.toArray();

								response['value_field'] = searchInput;
								response['input_field'] = input;
								break;
						}

						break;
					case 41:
						tempvar = getrow.find('.uifm-dcheckbox-item-chkst');

						searchInput = tempvar
							.map(function(index) {
								if ($(this).hasClass('uifm-dcheckbox-checked')) {
									return index;
								} else {
									return null;
								}
							})
							.toArray();

						response['value_field'] = searchInput;
						response['input_field'] = input;

						break;
					case 42:
						tempvar = getrow.find('.uifm-dcheckbox-item-chkst');

						searchInput = tempvar
							.map(function(index) {
								if ($(this).hasClass('uifm-dcheckbox-checked')) {
									return index;
								} else {
									return null;
								}
							})
							.toArray();

						response['value_field'] = searchInput[0];
						response['input_field'] = input;
						break;
					case 10:
						tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');

						switch (parseInt(tmp_theme_type)) {
							case 1:
								tempvar = getrow.find('.rockfm-input2-sel-styl1');
								response['value_field'] = tempvar.selectpicker('val');
								response['input_field'] = input;
								break;
							case 2:
								tempvar = getrow.find('.rockfm-input2-sel-styl2');
								response['value_field'] = tempvar.val();
								response['input_field'] = input;
								break;
							default:
								tempvar = getrow.find('.uifm-input2-opt-main');
								response['value_field'] = tempvar.val();
								response['input_field'] = input;
								break;
						}

						break;
					case 11:
						tmp_theme_type = getrow.find('.rockfm-input2-wrap').attr('data-theme-type');

						switch (parseInt(tmp_theme_type)) {
							case 1:
								tempvar = getrow.find('.rockfm-input2-sel-styl1');
								response['value_field'] = tempvar.selectpicker('val');
								response['input_field'] = input;

								break;
							case 2:
								searchInput = $.map(getrow.find('.rockfm-input2-sel-styl2 option:selected'), function(elem) {
									return $(elem).attr('value');
								});

								response['value_field'] = searchInput;
								response['input_field'] = input;
								break;
							default:
								searchInput = $.map(getrow.find('.uifm-input2-opt-main option:selected'), function(elem) {
									return $(elem).attr('value');
								});

								response['value_field'] = searchInput;
								response['input_field'] = input;
								break;
						}

						break;
					case 16:
						tempvar = getrow.find('.rockfm-input4-slider');
						response['value_field'] = tempvar.val();
						response['input_field'] = input;
						break;
					case 18:
						tempvar = getrow.find('.rockfm-input4-spinner');
						response['value_field'] = tempvar.val();
						response['input_field'] = input;
						break;
					case 40:

						var uifm_fld_value = getrow.find('.rockfm-input15-switch').bootstrapSwitchZgpb('state');
						var tmp_val = 0;
						if (uifm_fld_value) {
							tmp_val = 1;
						} else {
							tmp_val = 0;
						}
						tempvar = getrow.find('.rockfm-input15-switch');
						response['value_field'] = tmp_val;
						response['input_field'] = input;

						break;
				}
			}

			return response;
		};

		this.refreshfields = function() {
			var found = fields_cond;
			for (var i in found) {
				this.processFieldCond(found[i].field_cond);
			}
		};

		this.triggerConditional = function(element, id) {
			obj.refreshfields();
		};

		this.enableFields = function(element) {
			element.removeClass('rockfm-conditional-hidden');

			element.find('.rockfm-cond-hidden-children').removeClass('rockfm-cond-hidden-children');
		};

		this.disableFields = function(element) {
			element.addClass('rockfm-conditional-hidden');

			element.find('.rockfm-field').addClass('rockfm-cond-hidden-children');
		};

		this.processFieldCond = function(field_cond) {
			var getElement;
			getElement = cur_form_obj.find('#rockfm_' + field_cond);
			var foundsource = this.findFieldCond(field_cond);
			if (!foundsource) {
				return;
			}

			var required = parseInt(foundsource.req_match);
			var action = parseInt(foundsource.action);
			var list_source = foundsource.list;

			var match_count = 0;
			var fire_temp;
			var flag_firevisible;

			for (var i in list_source) {
				fire_temp = String(list_source[i].field_fire);
				if (cur_form_obj.find('#rockfm_' + fire_temp).is(':visible') || String(cur_form_obj.find('#rockfm_' + fire_temp).css('display')) === 'block') {
					flag_firevisible = true;
				} else {
					flag_firevisible = false;
				}
				if (flag_firevisible === true) {
					if (this.calculateMatchs(list_source[i].field_fire, list_source[i].minput, list_source[i].mtype) === true) {
						match_count++;
					}
				}
			}

			if (required > 0 && required <= match_count) {
				if (action === 1) {

					this.enableFields(getElement);
					getElement.show();
				} else if (action === 2) {

					this.disableFields(getElement);
					getElement.hide();
				}
			} else {
				if (action === 1) {

					this.disableFields(getElement);
					getElement.hide();
				} else if (action === 2) {

					this.enableFields(getElement);
					getElement.show();
				}
			}
		};

		this.calculateMatchs = function(field_fire, input, mtype) {
			var response;
			var fire_input = this.getValueFieldById(field_fire, input);
			switch (parseInt(mtype)) {
				case 1:
					if ($.isArray(fire_input.value_field)) {
						for (var i in fire_input.value_field) {
							if (String(fire_input.value_field[i]) === String(fire_input.input_field)) {
								response = true;
								break;
							} else {
								response = false;
							}
						}
					} else if ($.isNumeric(fire_input.value_field)) {
						if (parseFloat(fire_input.value_field) === parseFloat(fire_input.input_field)) {
							response = true;
						} else {
							response = false;
						}
					} else {
						if (String(fire_input.value_field) === String(fire_input.input_field)) {
							response = true;
						} else {
							response = false;
						}
					}

					break;
				case 2:
					if ($.isNumeric(fire_input.value_field)) {
						if (parseFloat(fire_input.value_field) != parseFloat(fire_input.input_field)) {
							response = true;
						} else {
							response = false;
						}
					} else {
						if (String(fire_input.value_field) != String(fire_input.input_field)) {
							response = true;
						} else {
							response = false;
						}
					}

					break;
				case 3:
					if (parseFloat(fire_input.value_field) >= parseFloat(fire_input.input_field)) {
						response = true;
					} else {
						response = false;
					}
					break;
				case 4:
					if (parseFloat(fire_input.value_field) <= parseFloat(fire_input.input_field)) {
						response = true;
					} else {
						response = false;
					}
					break;
			}
			return response;
		};

		this.findFieldFire = function(needle) {
			for (var i in fields_fire) {
				if (String(fields_fire[i].field_fire) === String(needle)) {
					return fields_fire[i].list;
				}
			}
		};

		this.findFieldCond = function(needle) {
			for (var i in fields_cond) {
				if (String(fields_cond[i].field_cond) === String(needle)) {
					return fields_cond[i];
				}
			}
		};

				this.connection_router = function() {

			let connections = cur_parent_obj.data('zgpb_datafrm').getData('connections');

			let initForm = cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id');

			if (!connections['conns_route'][initForm]['outputs'].length) {
				this.connection_final_step();
				return;
			}

			var fallbackFormId = 0;

			for (let key in connections['conns_route'][initForm]['outputs']) {
				if (connections['conns_route'][initForm]['outputs'].hasOwnProperty(key)) {
					let event = connections['conns_route'][initForm]['outputs'][key];

					let connTmp = connections['conns'][event['conn']];

					let fallBackTmp = parseInt(connTmp['rules']['is_fallback']);
					if (fallBackTmp === 1) {
						fallbackFormId = parseInt(connTmp['end']['id']);
					} else {
						let is_matched = this.connection_analyze(connTmp['rules']['list'], parseInt(connTmp['rules']['top_condition']));
						if (is_matched === true) {
							this.connection_next_step(parseInt(connTmp['end']['id']));
							return;
						}
					}
				}
			}

			if (fallbackFormId > 0) {
				this.connection_next_step(fallbackFormId);
			}
		};

		this.connection_final_step = function() {
			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_next_id', 0);
			cur_form_obj.find('.rockfm-submitbtn').attr('data-uifm_mm_is_last_step', 1);
		};

		this.connection_next_step = function(formId) {
			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_next_id', formId);

			if (
				!cur_parent_obj
					.data('zgpb_datafrm')
					.getData('ms_form_children')
					.hasOwnProperty(formId)
			) {
				$.ajax({
					type: 'POST',
					url: UIFORM_WWW + 'uiformbuilder/ajax_mm_get_child',
					dataType: 'json',
					async: true,
					data: {
						action: 'rocket_front_mm_get_child',
						zgfm_security: rockfm_vars.ajax_nonce,
						form_parent_id: cur_parent_obj.data('zgpb_datafrm').getData('ms_current_parent_form_id'),
						form_child_id: formId,
					},
					beforeSend: function() {},
					success: function(response) {
						try {
							cur_parent_obj.data('zgpb_datafrm').getData('ms_form_children')[formId] = {
								html_body: response.html,
							};

							$(`#rockfm_form_children_${cur_parent_obj.data('zgpb_datafrm').getData('ms_current_parent_form_id')}`).append(response.html);
						} catch (ex) {}
					},
				});
			}


			cur_form_obj.find('.rockfm-submitbtn').attr('data-uifm_mm_next_form', formId);
		};
		this.connection_analyze = function(list, top_condition) {
			var match_count = 0;

			var countItems = parseInt(list.length);

			for (let key2 in list) {
				if (list.hasOwnProperty(key2)) {
					let event2 = list[key2];
					let fieldFire = event2['field_fire'],
						minput = event2['minput'],
						mtype = event2['mtype'];

					if (cur_form_obj.data('zgfm_logicfrm').calculateMatchs(fieldFire, minput, mtype) === true) {
						match_count++;
					}
				}
			}

			if (top_condition === 1 && countItems === match_count) {
				return true;
			}

			if (top_condition === 2 && match_count > 0) {
				return true;
			}

			return false;
		};
		this.connection_analyze_condition = function(fieldFire, minput, mtype) {
			$result = false;
			return $result;
		};
		this.ms_load_prev_step = function() {
			let newCurrentForm = $(`#rockfm_form_${cur_parent_obj.data('zgpb_datafrm').getData('ms_form_previous_id')}`);
			newCurrentForm.show();

			let formCurrent = $(`#rockfm_form_${cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id')}`);
			formCurrent.hide();
			formCurrent.appendTo(`#rockfm_form_children_${cur_parent_obj.data('zgpb_datafrm').getData('ms_current_parent_form_id')}`);

			if (cur_parent_obj.find('.zgfm-progress-bar').length) {
				let progressBar = cur_parent_obj.data('zgpb_datafrm').getData('additional')['progressbar'];

				let progressBarObj = $('.zgfm-progress-bar');

				let previousFormId = cur_parent_obj.data('zgpb_datafrm').getData('ms_form_previous_id');

				let pbId = progressBar['forms'][previousFormId];

				progressBarObj
					.find(`[data-index="${pbId}"]`)
					.removeClass('uifm-complete')
					.addClass('uifm-current');

				previousFormId = cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id');
				pbId = progressBar['forms'][previousFormId];

				progressBarObj.find(`[data-index="${pbId}"]`).removeClass('uifm-current');
			}

			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_current_id', cur_parent_obj.data('zgpb_datafrm').getData('ms_form_previous_id'));

			if (parseInt(newCurrentForm.attr('data-zgfm_mm_previous_form')) > 0) {
				cur_parent_obj.data('zgpb_datafrm').setData('ms_form_previous_id', newCurrentForm.attr('data-zgfm_mm_previous_form'));
			} else {
				cur_parent_obj.data('zgpb_datafrm').setData('ms_form_previous_id', 0);
			}

			let btnObj = newCurrentForm.find(`.rockfm-submitbtn`).first();

			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_next_id', btnObj.attr('data-uifm_mm_next_form'));
		};
		this.ms_load_next_step = function() {
			if (!rocketfm.ms_validation_passed(cur_form_obj)) {
				return;
			}

			$(`#rockfm_form_${cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id')}`).hide();

			let parentFormId = cur_parent_obj.data('zgpb_datafrm').getData('ms_current_parent_form_id');

			let newForm = $(`#rockfm_form_${cur_parent_obj.data('zgpb_datafrm').getData('ms_form_next_id')}`);
			newForm.appendTo(`#rockfm_form_${parentFormId} .uiform-main-form`);

			newForm.attr('data-zgfm_mm_previous_form', cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id'));
			newForm.show();

			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_previous_id', cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id'));
			cur_parent_obj.data('zgpb_datafrm').setData('ms_form_current_id', cur_parent_obj.data('zgpb_datafrm').getData('ms_form_next_id'));

			rocketfm.loadFields(newForm);

			if (cur_parent_obj.find('.zgfm-progress-bar').length) {
				let progressBar = cur_parent_obj.data('zgpb_datafrm').getData('additional')['progressbar'];

				 				let progressBarObj = $('.zgfm-progress-bar');

				let previousFormId = cur_parent_obj.data('zgpb_datafrm').getData('ms_form_previous_id');

				 				let pbId = progressBar['forms'][previousFormId];

				 				progressBarObj
					.find(`[data-index="${pbId}"]`)
					.removeClass('uifm-current')
					.addClass('uifm-complete');

				previousFormId = cur_parent_obj.data('zgpb_datafrm').getData('ms_form_current_id');

				 				pbId = progressBar['forms'][previousFormId];

				progressBarObj
					.find(`[data-index="${pbId}"]`)
					.removeClass('uifm-complete')
					.addClass('uifm-current');
			}
		};
	};

	$.fn.zgfm_logicfrm = function(options) {
		return this.each(function() {
			var element = $(this);

			if (element.data('zgfm_logicfrm')) return;

			var myplugin = new zgfmLogicFrm(this, options);

			element.data('zgfm_logicfrm', myplugin);
		});
	};
})($uifm);

(function($) {
	var zgpbDataFrm = function(element, options) {
		var cur_form_obj = $(element);
		var obj = this;

		var zgfmvariable = [];
		zgfmvariable.innerVars = {};

		var form_options = {};
		var defaults = {
			submit_ajax: '1',
			add_css: '',
			add_js: '',
			onload_scroll: '0',
			preload_noconflict: '0',
			pdf_charset: 'UTF-8',
			pdf_font: '2',
			connections: {}, 
			additional: {}, 
			init_form: 0, 
			ms_current_parent_form_id: 0, 
			ms_current_parent_form_ob: null, 
			ms_form_children: {}, 
			ms_form_next_id: 0, 
			ms_form_previous_id: 0, 
			ms_form_current_id: 0, 
		};
		if (options) {
			form_options = (JSON && JSON.parse(options)) || $.parseJSON(options);
		} else {
			form_options = {};
		}

		var settings = $.extend(true, {}, defaults, form_options);

		this.setInnerVariable = function(name, value) {
			zgfmvariable.innerVars[name] = value;
		};

		this.getInnerVariable = function(name) {
			if (zgfmvariable.innerVars[name]) {
				return zgfmvariable.innerVars[name];
			} else {
				return '';
			}
		};

		this.getData = function(name) {
			try {
				return settings[name];
			} catch (err) {
				return '';
			}
		};
		this.setConnections = function(value) { 
			let conn = (JSON && JSON.parse(value)) || $.parseJSON(value); 
			this.setData('connections', conn); 
		}; 
		this.setExtra = function(value) { 
			let conn = (JSON && JSON.parse(value)) || $.parseJSON(value); 
			this.setData('additional', conn); 
		}; 
		this.setData = function(name, value) {
			settings[name] = value;
		};

		this.publicMethod = function() {};

		var privateMethod = function() {};

		this.showData = function() {};
		this.showSettings = function() { 

			 		}; 
	};

	$.fn.zgpb_datafrm = function(options) {
		return this.each(function() {
			var element = $(this);

			if (element.data('zgpb_datafrm')) return;

			var myplugin = new zgpbDataFrm(this, options);

			element.data('zgpb_datafrm', myplugin);
		});
	};
})($uifm);

if (typeof $uifm === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_evts = zgfm_front_evts || null;
if (!$uifm.isFunction(zgfm_front_evts)) {
	(function($, window) {
		'use strict';

		var zgfm_front_evts = function() {
			var zgfm_variable = [];
			zgfm_variable.innerVars = {};
			zgfm_variable.externalVars = {};

			this.initialize = function() {
				this.refresh_fieldDynBoxes();
			};

			this.refresh_fieldDynBoxes = function() {
				var obj = $('.rockfm-dyncheckbox');

			};
		};
		window.zgfm_front_evts = zgfm_front_evts = $.zgfm_front_evts = new zgfm_front_evts();
	})($uifm, window);
}

if (typeof $uifm === 'undefined') {
	$uifm = jQuery;
}
var zgfm_front_helper = zgfm_front_helper || null;
if (!$uifm.isFunction(zgfm_front_helper)) {
	(function($, window) {
		'use strict';

		var zgfm_front_helper = function() {

			 			this.initialize = function() {};

			var runExtraTasks = function(field, obj_form) {
				if (rocketfm.isMultiStepActive(obj_form)) { 
					obj_form.data('zgfm_logicfrm').connection_router(); 
				} 
			};

			this.event_isDefined_toEl = function(el, search_evt, list_events) {
				var flag = false;
				try {
					$.each(list_events, function(i, event) {
						if (String(i) === 'zgfm') {
							$.each(event, function(i2, handler) {
								if ($.isPlainObject(handler)) {
									$.each(handler, function(i3, handler3) {
										if (String(i3) === 'namespace') {
											if ($.isPlainObject(handler3)) {
												$.each(handler3, function(i4, handler4) {
												});
											} else {
												if (String(handler3) === String(search_evt)) {
													throw true;
												}
											}
										}
									});
								} else {
								}
							});
						}
					});
				} catch (e) {
					flag = e;
				}

				return flag;
			};

			this.load_cssfiles = function(id) {
				var uifm_loadcssfile = function(cssFilesArr) {
					for (var i in cssFilesArr) {
						if (!document.getElementById(cssFilesArr[i].id)) {
							var fileref = document.createElement('link');
							fileref.setAttribute('rel', 'stylesheet');
							fileref.setAttribute('type', 'text/css');
							fileref.setAttribute('id', cssFilesArr[i].id);
							fileref.setAttribute('media', 'all');
							fileref.setAttribute('href', cssFilesArr[i].href);
							document.getElementsByTagName('head')[0].appendChild(fileref);
						}
					}
				};

				var uifm_cssFiles = [{ id: 'uifm_b_css_form_' + id, href: rockfm_vars.url_plugin + '/assets/frontend/css/rockfm_form' + id + '.css?' + Math.round(+new Date() / 1000) }];
				uifm_loadcssfile(uifm_cssFiles);
			};
			this.load_form_event_selectlist = function(e, obj_form) { 
				if (e) { 
					e.preventDefault(); 
				} 
				wp.hooks.applyFilters('zgfmfront.events_before'); 

 				let tmp_field_id = $(this).attr('data-idfield'); 

 				if (obj_form.find('.rockfm-clogic-fcond').length) { 
					obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id); 
				} 

				if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') { 
					if ('parentIFrame' in window) { 
						parentIFrame.size(); 
					} 
				} 

				runExtraTasks($(this), obj_form); 

 				wp.hooks.applyFilters('zgfmfront.events_after'); 
			}; 
			this.load_form_init_events = function(obj_form) {
				var tmp_field;
				var tmp_field_id;
				var tmp_field_inp;
				var tmp_action;

				var tmp_theme_type;
				var all_fields = obj_form.find('.rockfm-field');

				$.each(all_fields, function() {
					tmp_field = $(this);
					if (tmp_field.length) {
						switch (parseInt(tmp_field.attr('data-typefield'))) {
							case 6:
							case 7:
							case 28:
							case 29:
							case 30:
								tmp_field_inp = tmp_field.find('.rockfm-txtbox-inp-val');
								break;
							case 8:
								tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tmp_field_inp = tmp_field.find('.checkradios-radio');
										break;
									default:
										tmp_field_inp = tmp_field.find('.rockfm-inp2-rdo');
										break;
								}
								break;
							case 9:
								tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tmp_field_inp = tmp_field.find('.checkradios-checkbox');
										break;
									default:
										tmp_field_inp = tmp_field.find('.rockfm-inp2-chk');
										break;
								}
								break;
							case 10:
							case 11:

								tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tmp_field_inp = tmp_field.find('.rockfm-input2-sel-styl1');
										break;
									case 2:
										tmp_field_inp = tmp_field.find('.rockfm-input2-sel-styl2');
										break;
									default:
										tmp_field_inp = tmp_field.find('.uifm-input2-opt-main');
										break;
								}

								break;
							case 16:
								tmp_field_inp = tmp_field.find('.rockfm-input4-slider');
								break;
							case 18:
								tmp_field_inp = tmp_field.find('.rockfm-input4-spinner');
								break;
							case 24:
								tmp_field_inp = tmp_field.find('.rockfm-input7-datepic');
								break;
							case 26:
								tmp_field_inp = tmp_field.find('.rockfm-input7-datetimepic');
								break;
							case 40:
								tmp_field_inp = tmp_field.find('.rockfm-input15-switch');
								break;
							case 41:
								tmp_field_inp = tmp_field.find('.uifm-dcheckbox-item');
								break;
							case 42:
								tmp_field_inp = tmp_field.find('.uifm-dradiobtn-item');
								break;
							case 43:
								tmp_field_inp = tmp_field.find('.uifm-input-flatpickr');
								break;
						}

						switch (parseInt(tmp_field.attr('data-typefield'))) {
							case 6: 
							case 7: 
							case 28: 
							case 29: 
							case 30: 
								tmp_action = 'change keyup';

								tmp_field_inp.on(tmp_action, function(e) {
									if (e) {
										e.preventDefault();
									}

									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}

									runExtraTasks($(this), obj_form); 
								});

								break;
							case 8:
							case 9:

								tmp_theme_type = tmp_field.find('.rockfm-input2-wrap').attr('data-theme-type');

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tmp_action = 'click change';
										break;
									default:
										tmp_action = 'change';
										break;
								}

								tmp_field_inp.on(tmp_action, function(e) {
									if (e) {
										e.preventDefault();
									}

									tmp_field_id = $(this).attr('data-idfield');
									if (obj_form.find('.rockfm-clogic-fcond').length) {
										obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id);
									}
									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}
									if (
										$(this)
											.closest('.rockfm-field')
											.hasClass('rockfm-required')
									) {
										rocketfm.validate_field($(this).closest('.rockfm-field'));
									}
									runExtraTasks($(this), obj_form); 
								});

								break;
							case 10:
							case 11:

								switch (parseInt(tmp_theme_type)) {
									case 1:
										tmp_field_inp.on('changed.bs.select', function(e) {
											zgfm_front_helper.load_form_event_selectlist(e, obj_form);
										});
										break;
									default:
										tmp_field_inp.on('change', function(e) {
											zgfm_front_helper.load_form_event_selectlist(e, obj_form);
										});
								}

								break;
							case 16:
								tmp_field_inp.on('slideStop', function(e) {
									if (e) {
										e.preventDefault();
									}
									tmp_field_id = $(this).attr('data-idfield');

									if (obj_form.find('.rockfm-clogic-fcond').length) {
										obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id);
									}

									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}

									runExtraTasks($(this), obj_form); 
								});
								break;
							case 18:
								tmp_field_inp.on('change keyup', function(e) {
									if (e) {
										e.preventDefault();
									}
									tmp_field_id = $(this).attr('data-idfield');

									if (obj_form.find('.rockfm-clogic-fcond').length) {
										obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id);
									}

									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}

									runExtraTasks($(this), obj_form); 
								});
								break;
							case 40:
								tmp_field_inp.on('switchChange.bootstrapSwitchZgpb', function(e) {
									if (e) {
										e.preventDefault();
									}
									tmp_field_id = $(this).attr('data-idfield');

									if (obj_form.find('.rockfm-clogic-fcond').length) {
										obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id);
									}

									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}

									runExtraTasks($(this), obj_form); 
								});
								break;
							case 41:
							case 42:
								tmp_field_inp.on('click', function(e) {
									if (e) {
										e.preventDefault();
									}
									tmp_field_id = $(this).attr('data-idfield');

									if (obj_form.find('.rockfm-clogic-fcond').length) {
										obj_form.data('zgfm_logicfrm').triggerConditional(e.target, tmp_field_id);
									}

									if (String(rocketfm.getExternalVars('fm_loadmode')) === 'iframe') {
										if ('parentIFrame' in window) {
											parentIFrame.size(); 
										}
									}

									runExtraTasks($(this), obj_form); 
								});

								break;
						}
					}
				});
			};

			this.uifm_load_scripts = function(src, id) {
				if (!document.getElementById(id)) {
					var s = document.createElement('script');
					s.src = src;
					s.async = true;
					document.head.appendChild(s);
				}
			};

			this.uifm_load_one_cssfile = function(src, id) {
				if (!document.getElementById(id)) {
					var fileref = document.createElement('link');
					fileref.setAttribute('rel', 'stylesheet');
					fileref.setAttribute('type', 'text/css');
					fileref.setAttribute('id', id);
					fileref.setAttribute('media', 'all');
					fileref.setAttribute('href', src);
					document.getElementsByTagName('head')[0].appendChild(fileref);
				}
			};
		};
		window.zgfm_front_helper = zgfm_front_helper = $.zgfm_front_helper = new zgfm_front_helper();
	})($uifm, window);
}

(function() {
	var __slice = [].slice;

	(function($, window) {
		'use strict';
		var uiformDCheckbox;
		uiformDCheckbox = (function() {
			var uifm_dchkbox_var = [];
			uifm_dchkbox_var.innerVars = {};
			var _this_obj;
			function uiformDCheckbox(element, options) {
				if (options == null) {
					options = {};
				}
				_this_obj = this;
				this.$element = $(element);
				this.options = $.extend(
					{},
					$.fn.uiformDCheckbox.defaults,
					{
						baseGalleryId: this.$element.data('gal-id'),
						opt_laymode:
							$(element)
								.parent()
								.attr('data-opt-laymode') || 1,
						opt_checked: this.$element.data('opt-checked'),
						opt_isradiobtn: this.$element.data('opt-isrdobtn'),
						opt_qtyMax: this.$element.data('opt-qtymax'),
						opt_qtySt: this.$element.data('opt-qtyst'),
						opt_price: this.$element.data('opt-price'),
						opt_label: this.$element.data('opt-label'),
						opt_thopt_showhvrtxt:
							$(element)
								.parent()
								.attr('data-thopt-showhvrtxt') || 0,
						opt_thopt_showcheckb:
							$(element)
								.parent()
								.attr('data-thopt-showcheckb') || 0,
						opt_thopt_zoom:
							$(element)
								.parent()
								.attr('data-thopt-zoom') || 0,
						opt_thopt_height:
							$(element)
								.parent()
								.attr('data-thopt-height') || 100,
						opt_thopt_width:
							$(element)
								.parent()
								.attr('data-thopt-width') || 100,
						backend: this.$element.data('backend') || 0,
						baseClass: this.$element.data('base-class'),
					},
					options
				);


				this.$element.find('.uifm-dcheckbox-item-viewport').attr('height', this.options.opt_thopt_height);
				this.$element.find('.uifm-dcheckbox-item-viewport').attr('width', this.options.opt_thopt_width);

				this.$opt_gal_btn_show = this.$element.find('.uifm-dcheckbox-item-showgallery');

				this.$opt_gal_links_a = this.$element.find('.uifm-dcheckbox-item-gal-imgs a');

				this.$opt_gal_box = this.$element.find('.uifm-dcheckbox-item-viewport');

				this.$opt_gal_next_img = this.$element.find('.uifm-dcheckbox-item-nextimg');
				this.$opt_gal_prev_img = this.$element.find('.uifm-dcheckbox-item-previmg');

				var tmp_imglist = this.$element.find('.uifm-dcheckbox-item-gal-imgs a img');
				if (parseInt(tmp_imglist.length) < 2) {
					this.$opt_gal_next_img.removeClass('uifm-dcheckbox-item-nextimg').hide();
					this.$opt_gal_prev_img.removeClass('uifm-dcheckbox-item-previmg').hide();
				}

				this.$opt_gal_checkbox = this.$element.find('.uifm-dcheckbox-item-chkst');
				this.$inp_checkbox = this.$element.find('.uifm-dcheckbox-item-chkval');
				this.$inp_checkbox_max = this.$element.find('.uifm-dcheckbox-item-qty-num');
				this.$spinner_wrapper = this.$element.find('.uifm-dcheckbox-item-qty-wrap') || null;

				this.$spinner_buttons = this.$element.find('.uifm-dcheckbox-item-qty-wrap button') || null;

				this.$element.on(
					'init.uiformDCheckbox',
					(function(_this) {
						return function() {
							return _this.options.onInit.apply(element, arguments);
						};
					})(this)
				);

				if (parseInt(_this_obj.options.backend) === 1) {
					this.$canvas_parent = this.$element.closest('.uifm-input17-wrap').width();
				} else {
					this.$canvas_parent = this.$element.closest('.rockfm-input17-wrap').width();
				}

				if (parseInt(this.options.opt_laymode) === 2) {
					this._mod2_initPreview();
				} else {
					if (parseInt(this.options.opt_thopt_zoom) === 0) {
						this.$element.find('.uifm-dcheckbox-item-showgallery').hide();
					} else {
						this.$element.find('.uifm-dcheckbox-item-showgallery').show();
					}
				}

				switch (parseInt(this.options.opt_thopt_showhvrtxt)) {
					case 1:
						this.$element.tooltip();
						break;
					case 0:
					case 2:
					case 3:
						this.$element.find('.uifm-dcheckbox-item-showgallery').hide();
						break;
				}

				if (parseInt(this.options.opt_thopt_showcheckb) === 0) {
					this.$opt_gal_checkbox.hide();
				} else {
					this.$opt_gal_checkbox.show();
				}

				this.$element.on(
					'switchChange.uiformDCheckbox',
					(function(_this) {
						return function() {
							return _this.options.onSwitchChange.apply(element, arguments);
						};
					})(this)
				);


				if (parseInt(_this_obj.options.backend) === 0) {
					this._elementHandlers();
					this._handleHandlers();
				}
				this._elementHandlers2();

				this._galleryHandlers();


				this._get_items();
				this._refresh();
			}

			uiformDCheckbox.prototype._constructor = uiformDCheckbox;

			uiformDCheckbox.prototype._refresh = function() {
				if (parseInt(_this_obj.options.backend) === 1) {
					this.$canvas_parent = this.$element.closest('.uifm-input17-wrap').width();
				} else {
					this.$canvas_parent = this.$element.closest('.rockfm-input17-wrap').width();
				}

				this._enableCheckboxVal(this.$opt_gal_checkbox, this);
				this._setValToChkBoxInput(this);
				this._get_items();
			};

			uiformDCheckbox.prototype._mod2_initPreview = function() {
				this.$element.find('.uifm-dcheckbox-item-nextimg').hide();
				this.$element.find('.uifm-dcheckbox-item-previmg').hide();
				this.$element.find('.uifm-dcheckbox-item-showgallery').hide();

				if (parseInt(this.options.opt_checked) === 0) {
					this._mode2_get_img(this.$element, 2);
				} else {
					this._mode2_get_img(this.$element, 0);
				}
			};

			uiformDCheckbox.prototype._get_items = function() {
				var _this = this;
				if (this.$element.length) {
					var tmp_num_elems = this.$element;
					tmp_num_elems.each(function(i) {
						if (parseInt(_this.options.opt_laymode) === 2) {
							if (parseInt(_this.options.opt_checked) === 1) {
								_this._mode2_get_img(_this.$element, 0);
							} else {
								_this._mode2_get_img(_this.$element, 2);
							}
						} else {
							_this._getImageToCanvas($(this), 0, _this);
						}
					});
				}
			};

			uiformDCheckbox.prototype._getImageToCanvas = function(obj, opt, _this) {
				var ctx = obj.find('canvas')[0].getContext('2d');
				var tmp_can_width = parseInt(this.options.opt_thopt_width);
				var tmp_can_height = parseInt(this.options.opt_thopt_height);

				var aspectRatio = tmp_can_width / tmp_can_height;

				var closestParentDiv = this.$canvas_parent;

				var new_width, new_height;
				if (tmp_can_width > closestParentDiv) {
					if (parseInt(closestParentDiv) > 0) {
						new_width = closestParentDiv;
					} else {
						new_width = tmp_can_width;
					}

					new_height = new_width / aspectRatio;
				} else {
					new_width = tmp_can_width;
					new_height = tmp_can_height;
				}

				var img = new Image();
				img.onload = function() {
					ctx.drawImage(img, 0, 0, new_width, new_height);
				};
				var getImgIndex = obj.find('canvas').attr('data-uifm-nro');
				switch (parseInt(opt)) {
					case 1:
						img.src = _this._getPrevImageGallery(obj, getImgIndex);
						break;
					case 2:
						img.src = _this._getNextImageGallery(obj, getImgIndex);
						break;
					default:
					case 0:
						img.src = _this._getImageGallery(obj, getImgIndex);
						break;
				}

				this.$element.find('.uifm-dcheckbox-item-viewport').attr('height', new_height);
				this.$element.find('.uifm-dcheckbox-item-viewport').attr('width', new_width);
			};

			uiformDCheckbox.prototype._getImageGallery = function(obj, _index) {
				var objimgs = obj.find('.uifm-dcheckbox-item-gal-imgs a img');
				var objcanvas = obj.find('canvas');
				if (objimgs.eq(_index).length) {
					objcanvas.attr('data-uifm-nro', _index);
					return objimgs.eq(_index).attr('src');
				} else {
					objcanvas.attr('data-uifm-nro', 0);
					return objimgs.eq(0).attr('src');
				}
			};

			uiformDCheckbox.prototype._getPrevImageGallery = function(obj, _index) {
				var objimgs = obj.find('.uifm-dcheckbox-item-gal-imgs a img');
				var objcanvas = obj.find('canvas');
				var newIndex = parseInt(_index) - 1;
				if (objimgs.eq(newIndex).length) {
					objcanvas.attr('data-uifm-nro', newIndex);
					return objimgs.eq(newIndex).attr('src');
				} else {
					objcanvas.attr('data-uifm-nro', 0);
					return objimgs.eq(0).attr('src');
				}
			};

			uiformDCheckbox.prototype._mode2_get_img = function(obj, _index) {
				var ctx = obj.find('canvas')[0].getContext('2d');
				var tmp_can_width = parseInt(this.options.opt_thopt_width);
				var tmp_can_height = parseInt(this.options.opt_thopt_height);

				var aspectRatio = tmp_can_width / tmp_can_height;

				var closestParentDiv = this.$canvas_parent;

				var new_width, new_height;
				if (tmp_can_width > closestParentDiv) {
					new_width = closestParentDiv;
					new_height = new_width / aspectRatio;
				} else {
					new_width = tmp_can_width;
					new_height = tmp_can_height;
				}

				var img = new Image();
				img.onload = function() {
					ctx.drawImage(img, 0, 0, new_width, new_height);
				};

				var objimgs = obj.find('.uifm-dcheckbox-item-gal-imgs a img');
				var objcanvas = obj.find('canvas');
				var newIndex = parseInt(_index);
				if (objimgs.eq(newIndex).length) {
					objcanvas.attr('data-uifm-nro', newIndex);
					img.src = objimgs.eq(newIndex).attr('src');
				} else {
					objcanvas.attr('data-uifm-nro', 0);
					img.src = objimgs.eq(0).attr('src');
				}

				this.$element.find('.uifm-dcheckbox-item-viewport').attr('height', new_height);
				this.$element.find('.uifm-dcheckbox-item-viewport').attr('width', new_width);
			};

			uiformDCheckbox.prototype._getNextImageGallery = function(obj, _index) {
				var objimgs = obj.find('.uifm-dcheckbox-item-gal-imgs a img');
				var objcanvas = obj.find('canvas');
				var newIndex = parseInt(_index) + 1;
				if (objimgs.eq(newIndex).length) {
					objcanvas.attr('data-uifm-nro', newIndex);
					return objimgs.eq(newIndex).attr('src');
				} else {
					objcanvas.attr('data-uifm-nro', 0);
					return objimgs.eq(0).attr('src');
				}
			};

			uiformDCheckbox.prototype._setInnerVariable = function(name, value) {
				uifm_dchkbox_var.innerVars[name] = value;
			};
			uiformDCheckbox.prototype._getInnerVariable = function(name) {
				if (uifm_dchkbox_var.innerVars[name]) {
					return uifm_dchkbox_var.innerVars[name];
				} else {
					return '';
				}
			};
			uiformDCheckbox.prototype.optChecked = function(value) {
				if (typeof value === 'undefined') {
					return this.options.opt_checked;
				}
				this.options.opt_checked = value;
				return this.$element;
			};
			uiformDCheckbox.prototype.man_optChecked = function(value) {
				this.optChecked(value);
				this._enableCheckboxVal(this.$opt_gal_checkbox, this);
				this._setValToChkBoxInput(this);
				return this.$element;
			};

			uiformDCheckbox.prototype.man_mod2_refresh = function() {
				this._mod2_initPreview();
			};

			uiformDCheckbox.prototype.optQtySt = function(value) {
				if (typeof value === 'undefined') {
					return this.options.opt_qtySt;
				}
				this.options.opt_qtySt = value;
				return this.$element;
			};
			uiformDCheckbox.prototype.man_optQtySt = function(value) {
				this.optQtySt(value);
				if (value && parseInt(this.options.opt_checked)) {
					this.$spinner_wrapper.show();
				} else {
					this.$spinner_wrapper.hide();
				}
				return this.$element;
			};
			uiformDCheckbox.prototype.refreshImgs = function() {
				if (parseInt(this.options.opt_laymode) === 2) {
					this._mod2_initPreview();
				} else {
					this._getImageToCanvas(this.$element, 0, this);
				}

				return this.$element;
			};
			uiformDCheckbox.prototype.optQtyMax = function(value) {
				if (typeof value === 'undefined') {
					return this.options.opt_qtyMax;
				}
				this.options.opt_qtyMax = value;
				return this.$element;
			};
			uiformDCheckbox.prototype.man_optQtyMax = function(value) {
				this.optQtyMax(value);
				this.$inp_checkbox_max.val(value);

				return this.$element;
			};
			uiformDCheckbox.prototype.onInit = function(value) {
				if (typeof value === 'undefined') {
					return this.options.onInit;
				}
				if (!value) {
					value = $.fn.uiformDCheckbox.defaults.onInit;
				}
				this.options.onInit = value;
				return this.$element;
			};

			uiformDCheckbox.prototype.onSwitchChange = function(value) {
				if (typeof value === 'undefined') {
					return this.options.onSwitchChange;
				}
				if (!value) {
					value = $.fn.uiformDCheckbox.defaults.onSwitchChange;
				}

				this.options.onSwitchChange = value;
				return this.$element;
			};

			uiformDCheckbox.prototype.get_totalCost = function() {
				var total;
				var input_spinner = this.$element.find('.uifm-dcheckbox-item-qty-num');
				total = parseFloat(input_spinner.val()) * parseFloat(this.options.opt_price);
				return total;
			};
			uiformDCheckbox.prototype.get_labelOpt = function() {
				return this.options.opt_label;
			};
			uiformDCheckbox.prototype.onCostCalcProcess = function() {
				var obj_form = this.$element.closest('.rockfm-form');

				return this.$element;
			};

			uiformDCheckbox.prototype.destroy = function() {
				var $form;
				$form = this.$element.closest('form');
				if ($form.length) {
					$form.off('reset.uiformDCheckbox').removeData('uifm-dynamic-checkbox');
				}
				this.$container
					.children()
					.not(this.$element)
					.remove();
				this.$element
					.unwrap()
					.unwrap()
					.off('.uiformDCheckbox')
					.removeData('uifm-dynamic-checkbox');
				return this.$element;
			};

			uiformDCheckbox.prototype._elementHandlers = function() {
				return this.$element.on({
					'change.uiformDCheckbox': (function(_this) {
						return function(e, checked) {
							e.preventDefault();
							e.stopImmediatePropagation();

							return _this.$element;
						};
					})(this),
					'hover.uiformDCheckbox': (function(_this) {
						return function(e) {
							e.preventDefault();
						};
					})(this),
					'focus.uiformDCheckbox': (function(_this) {
						return function(e) {
							e.preventDefault();
						};
					})(this),
					'blur.uiformDCheckbox': (function(_this) {
						return function(e) {
							e.preventDefault();
						};
					})(this),
					'keydown.uiformDCheckbox': (function(_this) {})(this),
				});
			};
			uiformDCheckbox.prototype._elementHandlers2 = function() {
				return this.$element.on({
					'mouseover.uiformDCheckbox': (function(_this) {
						return function(e) {
							e.preventDefault();

							if (parseInt(_this.options.opt_laymode) === 2) {
								if (parseInt(_this.options.opt_checked) === 0) {
									_this._mode2_get_img(_this.$element, 1);
								}
							}
						};
					})(this),
					'mouseout.uiformDCheckbox': (function(_this) {
						return function(e) {
							e.preventDefault();

							if (parseInt(_this.options.opt_laymode) === 2) {
								if (parseInt(_this.options.opt_checked) === 1) {
									_this._mode2_get_img(_this.$element, 0);
								} else {
									_this._mode2_get_img(_this.$element, 2);
								}
							}
						};
					})(this),
				});
			};
			uiformDCheckbox.prototype._galleryHandlers = function() {
				this.$opt_gal_next_img.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();
							if (parseInt(_this.options.opt_isradiobtn) === 1) {
								_this._getImageToCanvas($(this).closest('.uifm-dradiobtn-item'), 2, _this);
							} else {
								_this._getImageToCanvas($(this).closest('.uifm-dcheckbox-item'), 2, _this);
							}
						};
					})(this)
				);

				this.$opt_gal_prev_img.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();
							if (parseInt(_this.options.opt_isradiobtn) === 1) {
								_this._getImageToCanvas($(this).closest('.uifm-dradiobtn-item'), 1, _this);
							} else {
								_this._getImageToCanvas($(this).closest('.uifm-dcheckbox-item'), 1, _this);
							}
						};
					})(this)
				);
			};

			uiformDCheckbox.prototype._handleHandlers = function() {
				this.$opt_gal_btn_show.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();

							var borderless = true;

							$('#' + _this.options.baseGalleryId).data('useBootstrapModal', !borderless);
							$('#' + _this.options.baseGalleryId).data('container', '#' + _this.options.baseGalleryId);
							$('#' + _this.options.baseGalleryId).toggleClass('blueimp-gallery-controls', borderless);
							var tmp_blueimpgal;
							try {
								tmp_blueimpgal = blueimp.Gallery;
							} catch (err) {
								tmp_blueimpgal = window.blueimpgal;
							}

							tmp_blueimpgal(_this.$opt_gal_links_a, $('#' + _this.options.baseGalleryId).data());
						};
					})(this)
				);

				this.$opt_gal_checkbox.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();

							if (parseInt(_this.options.opt_isradiobtn) === 1) {
								var tmp_index = $(this)
									.closest('.uifm-dradiobtn-item')
									.attr('data-inp17-opt-index');

								if (parseInt(_this_obj.options.backend) === 1) {
									var tmp_container = $(this).closest('.uifm-input17-wrap');
								} else {
									var tmp_container = $(this).closest('.rockfm-input17-wrap');
								}

								var tmp_radiobtn_items = tmp_container.find('.uifm-dradiobtn-item');

								var tmp_item_index;
								tmp_radiobtn_items.each(function(i) {
									tmp_item_index = $(this).attr('data-inp17-opt-index');

									if (parseInt(tmp_item_index) === parseInt(tmp_index)) {

										$(this).uiformDCheckbox('man_optChecked', 1);
									} else {

										$(this).uiformDCheckbox('man_optChecked', 0);
									}

									if (parseInt(_this.options.opt_laymode) === 2) {
										$(this).uiformDCheckbox('man_mod2_refresh');
									}
								});
							} else {
								_this._gen_optChecked(this, _this);
								_this._enableCheckboxVal(this, _this);
								_this._setValToChkBoxInput(_this);
							}

							return _this.$element.trigger('change.uiformDCheckbox');
						};
					})(this)
				);

				this.$opt_gal_box.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();

							if (parseInt(_this.options.opt_isradiobtn) === 1) {
								var tmp_index = $(this)
									.closest('.uifm-dradiobtn-item')
									.attr('data-inp17-opt-index');

								if (parseInt(_this_obj.options.backend) === 1) {
									var tmp_container = $(this).closest('.uifm-input17-wrap');
								} else {
									var tmp_container = $(this).closest('.rockfm-input17-wrap');
								}
								var tmp_radiobtn_items = tmp_container.find('.uifm-dradiobtn-item');

								var tmp_item_index;
								tmp_radiobtn_items.each(function(i) {
									tmp_item_index = $(this).attr('data-inp17-opt-index');

									if (parseInt(tmp_item_index) === parseInt(tmp_index)) {
										$(this).uiformDCheckbox('man_optChecked', 1);
									} else {
										$(this).uiformDCheckbox('man_optChecked', 0);
									}

									if (parseInt(_this.options.opt_laymode) === 2) {
										$(this).uiformDCheckbox('man_mod2_refresh');
									}
								});
							} else {
								_this._gen_optChecked(_this.$opt_gal_checkbox, _this);
								_this._enableCheckboxVal(_this.$opt_gal_checkbox, _this);
								_this._setValToChkBoxInput(_this);
							}

							return _this.$element.trigger('change.uiformDCheckbox');
						};
					})(this)
				);

				this.$inp_checkbox_max.on(
					'keyup',
					(function(_this) {
						return function(e) {
							e.preventDefault();
							_this._setValToChkBoxInput(_this);
							return _this.$element.trigger('change.uiformDCheckbox');
						};
					})(this)
				);

				this.$spinner_buttons.on(
					'click.uiformDCheckbox',
					(function(_this) {
						return function(e) {
							e.preventDefault();
							_this._spinnerCounter(this, _this);
							_this._setValToChkBoxInput(_this);
							return _this.$element.trigger('change.uiformDCheckbox');
						};
					})(this)
				);

			};

			uiformDCheckbox.prototype._spinnerCounter = function(el, _this) {
				var objbtn = $(el);
				var input_spinner = _this.$element.find('.uifm-dcheckbox-item-qty-num');
				var input_visible_spinner = _this.$element.find('.uifm-dfield-input');
				if (_this.$element.find('.uifm-dcheckbox-item-qty-wrap button').hasClass('dcheckbox-disabled')) {
					_this.$element.find('.uifm-dcheckbox-item-qty-wrap button').removeClass('dcheckbox-disabled');
				}

				if (objbtn.attr('data-value') == 'increase') {
					if (input_spinner.attr('data-max') == undefined || parseInt(input_spinner.val()) < parseInt(input_spinner.attr('data-max'))) {
						input_visible_spinner.text(parseInt(input_spinner.val()) + 1);
						input_spinner.val(parseInt(input_spinner.val()) + 1);
						if (parseInt(input_spinner.val()) === parseInt(input_spinner.attr('data-max'))) {
							objbtn.addClass('dcheckbox-disabled');
						}
					} else {
						objbtn.addClass('dcheckbox-disabled');
					}
				} else {
					if (input_spinner.attr('data-min') == undefined || parseInt(input_spinner.val()) > parseInt(input_spinner.attr('data-min'))) {
						input_visible_spinner.text(parseInt(input_spinner.val()) - 1);
						input_spinner.val(parseInt(input_spinner.val()) - 1);
						if (parseInt(input_spinner.val()) === parseInt(input_spinner.attr('data-min'))) {
							objbtn.addClass('dcheckbox-disabled');
						}
					} else {
						objbtn.addClass('dcheckbox-disabled');
					}
				}
			};
			uiformDCheckbox.prototype._gen_optChecked = function(el, _this) {
				var objbtn = $(el);
				if (objbtn.hasClass('uifm-dcheckbox-checked')) {
					_this.optChecked(0);
				} else {
					_this.optChecked(1);
				}
			};
			uiformDCheckbox.prototype._setValToChkBoxInput = function(_this) {
				_this.$inp_checkbox.val(_this.$inp_checkbox_max.val());
			};
			uiformDCheckbox.prototype._enableCheckboxVal = function(el, _this) {
				var objbtn = $(el);
				if (parseInt(this.options.opt_checked) === 0) {
					if (parseInt(this.options.opt_isradiobtn) === 1) {
						objbtn.removeClass('uifm-dcheckbox-checked').html('<i class="fa fa-circle-o"></i>');
					} else {
						objbtn.removeClass('uifm-dcheckbox-checked').html('<i class="fa fa-square-o"></i>');
					}
					_this.$inp_checkbox.prop('checked', false);
					if (_this.$spinner_wrapper && parseInt(_this.options.opt_qtySt) === 1) {
						_this.$spinner_wrapper.hide();
					}
				} else {
					if (parseInt(this.options.opt_isradiobtn) === 1) {
						objbtn.addClass('uifm-dcheckbox-checked').html('<i class="fa fa-check-circle-o"></i>');
					} else {
						objbtn.addClass('uifm-dcheckbox-checked').html('<i class="fa fa-check-square-o"></i>');
					}
					_this.$inp_checkbox.prop('checked', true);
					if (_this.$spinner_wrapper && parseInt(_this.options.opt_qtySt) === 1) {
						_this.$spinner_wrapper.show();
					}
				}
			};

			uiformDCheckbox.prototype._getClasses = function(classes) {
				var c, cls, _i, _len;
				if (!$.isArray(classes)) {
					return ['' + this.options.baseClass + '-' + classes];
				}
				cls = [];
				for (_i = 0, _len = classes.length; _i < _len; _i++) {
					c = classes[_i];
					cls.push('' + this.options.baseClass + '-' + c);
				}
				return cls;
			};

			return uiformDCheckbox;
		})();
		$.fn.uiformDCheckbox = function() {
			var args, option, ret;
			(option = arguments[0]), (args = 2 <= arguments.length ? __slice.call(arguments, 1) : []);
			ret = this;
			this.each(function() {
				var $this, data;
				$this = $(this);
				data = $this.data('uifm-dynamic-checkbox');
				if (!data) {
					$this.data('uifm-dynamic-checkbox', (data = new uiformDCheckbox(this, option)));
				}
				if (typeof option === 'string') {
					return (ret = data[option].apply(data, args));
				}
			});
			return ret;
		};
		$.fn.uiformDCheckbox.Constructor = uiformDCheckbox;
		return ($.fn.uiformDCheckbox.defaults = {
			backend: '1',
			opt_isradiobtn: '0',
			baseClass: 'uifm-dynamic-checkbox',
			onInit: function() {},
			onSwitchChange: function() {},
		});
	})(window.$uifm, window);
}.call(this));

(function($) {
	var rCRLF = /\r?\n/g,
		rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
		rsubmittable = /^(?:input|select|textarea|keygen)/i;
	var rcheckableType = /^(?:checkbox|radio)$/i;

	$.fn.getZgfmEvents = function() {
		if (typeof $._data == 'function') {
			return $._data(this.get(0), 'events') || {};
		} else if (typeof this.data == 'function') {
			return this.data('events') || {};
		}
		return {};
	};

	$.fn.removeCss = function() {
		var removedCss = $.makeArray(arguments);
		return this.each(function() {
			var e$ = $(this);
			var style = e$.attr('style');
			if (typeof style !== 'string') return;
			style = $.trim(style);
			var styles = style.split(/;+/);
			var sl = styles.length;
			for (var l = removedCss.length, i = 0; i < l; i++) {
				var r = removedCss[i];
				if (!r) continue;
				for (var j = 0; j < sl; ) {
					var sp = $.trim(styles[j]);
					if (!sp || (sp.indexOf(r) === 0 && $.trim(sp.substring(r.length)).indexOf(':') === 0)) {
						styles.splice(j, 1);
						sl--;
					} else {
						j++;
					}
				}
			}
			if (styles.length === 0) {
				e$.removeAttr('style');
			} else {
				e$.attr('style', styles.join(';'));
			}
		});
	};
	$.fn.extend({
		uifm_serialize: function() {
			return $.param(this.uifm_serializeArray());
		},
		uifm_serializeArray: function() {
			return this.map(function() {
				var elements = $.prop(this, 'elements');
				var exclude_array = [];
				var exclude_fields = $(this)
					.closest('.rockfm-form')
					.find('.rockfm-conditional-hidden :input,.rockfm-conditional-hidden select');
				exclude_array = $.map(exclude_fields, function(n, i) {
					return $(n).attr('name');
				});
				var new_elements = [];
				$.each(elements, function(i, val) {
					if (parseInt($.inArray($(val).attr('name'), exclude_array)) < 0) {
						new_elements.push(val);
					}
				});
				return new_elements ? $.makeArray(new_elements) : this;
			})
				.filter(function() {
					var type = this.type;
					return this.name && !$(this).is(':disabled') && rsubmittable.test(this.nodeName) && !rsubmitterTypes.test(type) && (this.checked || !rcheckableType.test(type));
				})
				.map(function(i, elem) {
					var val = $(this).val();
					return val == null
						? null
						: $.isArray(val)
						? $.map(val, function(val) {
								return { name: elem.name, value: val.replace(rCRLF, '\r\n') };
						  })
						: { name: elem.name, value: val.replace(rCRLF, '\r\n') };
				})
				.get();
		},
	});


	$('.uiform_modal_general').on('hidden.bs.modal', function() {
		rocketfm.modal_onclose();
	});

	$('.uiform_modal_general').on('shown.bs.modal', function() {
		rocketfm.modal_resizeWhenIframe();
	});
})($uifm);

var zgfm_recaptcha_elems = {};
var zgfm_recaptcha_onloadCallback = function() {
	var tmp_sitekey;
	var tmp_form_id;

	$uifm('.g-recaptcha').each(function(i) {
		tmp_sitekey = $uifm(this).attr('data-sitekey');
		tmp_form_id = $uifm(this)
			.closest('.rockfm-form')
			.find('._rockfm_form_id')
			.val();

		zgfm_recaptcha_elems['recaptcha_' + tmp_form_id] = grecaptcha.render('zgfm_recaptcha_obj_' + tmp_form_id, {
			sitekey: tmp_sitekey,
		});
	});
};
