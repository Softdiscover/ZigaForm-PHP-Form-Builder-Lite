$uifm(document).ready(function($) {
	zgfm_back_mgtranslate.initialize();
});

if (typeof $uifm === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_mgtranslate = zgfm_back_mgtranslate || null;
if (!$uifm.isFunction(zgfm_back_mgtranslate)) {
	(function($, window) {
		'use strict';

		var zgfm_back_mgtranslate = function() {
			var zgfm_variable = [];
			zgfm_variable.innerVars = {};
			zgfm_variable.externalVars = {};

			var obj_elem = this;

			this.page_fillEmptySpaces = function() {
				$('textarea').each(function(index, element) {
					let tmpObj = $(this);
					let tmpval = tmpObj.val();
					if (parseInt(tmpval.length) === 0) {
						let newVal = tmpObj
							.parent()
							.prev()
							.html();
						tmpObj.val(newVal);
						tmpObj.addClass('setChange');
					}
				});
			};

			this.initialize = function() {
				obj_elem.ajaxCallLoadTranslation();

				$('#zgfm-page-translation select').on('change', function() {
					obj_elem.ajaxCallLoadTranslation();
				});

				$('#zgfm-translation-newlang').click(function(event) {
					event.stopPropagation();
					event.preventDefault();

					$.ajax({
						type: 'POST', 
						url: rockfm_vars.uifm_siteurl + 'addon_mgtranslate/zfad_mgtranslate_back/ajax_new_lang',
						data: {
							action: 'zgfm_mgtranslate_newlang',
							page: 'zgfm_form_builder',
							zgfm_security: uiform_vars.ajax_nonce,
						},
						dataType: 'json', 
						encode: true,
						beforeSend: function() {
							$('#uifm_modal_msg .sfdc-modal-body').html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
						},
					})
						.done(function(data) {

							if (data.success) {
								$('#uifm_modal_msg').sfdc_modal({
									show: true,
									backdrop: 'static',
									keyboard: false,
								});
								$('#uifm_modal_msg .sfdc-modal-title').html(data.data.html_title);
								$('#uifm_modal_msg .sfdc-modal-body').html(data.data.html);
								$('#uifm_modal_msg .sfdc-modal-footer').html(data.data.html_buttons);

								$('#zgfm-mgtranslation-btn-createNewLang').click(function(event) {
									event.stopPropagation();
									event.preventDefault();

									let inputNewLang = $('#inputNewLang').val();
									if (parseInt(inputNewLang.length) === 0) {
										alert('Add the language name');
										return;
									}

									$.ajax({
										type: 'POST', 
										url: rockfm_vars.uifm_siteurl + 'addon_mgtranslate/zfad_mgtranslate_back/ajax_create_lang',
										data: {
											action: 'zgfm_mgtranslate_createlang',
											page: 'zgfm_form_builder',
											zgfm_security: uiform_vars.ajax_nonce,
											newlangname: inputNewLang,
										},
										dataType: 'json', 
										encode: true,
										beforeSend: function() {
											$('#uifm_modal_msg .sfdc-modal-body').html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
											$('#uifm_modal_msg .sfdc-modal-footer').html('');
										},
										success: function(result) {
											$('#uifm_modal_msg .sfdc-modal-title').html(result.data.html_title);
											$('#uifm_modal_msg .sfdc-modal-body').html(result.data.html);
											$('#uifm_modal_msg .sfdc-modal-footer').html(result.data.html_footer);

											$('#uifm_modal_msg').on('hide.bs.sfdc-modal', function() {
												var re_url = rockfm_vars.uifm_siteurl + 'addon_mgtranslate/zfad_mgtranslate_back/show_list';

												let redirect_tourl = function(redirect) {
													if (window.event) {
														window.event.returnValue = false;
														window.location = redirect;
													} else {
														location.href = redirect;
													}
												};
												redirect_tourl(re_url);
											});
										},
									});
								});
							} else {
							}
						});
				});

				$('#zgfm-translation-save').click(function(event) {
					event.stopPropagation();
					event.preventDefault();


					var tmpArrs = $('.setChange').serializeArray();

					if (parseInt(tmpArrs.length) === 0) {
						$('#uifm_modal_msg').sfdc_modal('show');
						$('#uifm_modal_msg .sfdc-modal-title').html('Translation Manager');
						$('#uifm_modal_msg .sfdc-modal-body').html('there is nothing to save');
						return;
					}

					$.ajax({
						type: 'POST', 
						url: rockfm_vars.uifm_siteurl + 'addon_mgtranslate/zfad_mgtranslate_back/ajax_save_pofile',
						data: $.param(tmpArrs) + '&action=zgfm_mgtranslate_savePo' + '&page=zgfm_form_builder&zgfm_security=' + uiform_vars.ajax_nonce + '&lang=' + $('#mgtr-input-lang').val() + '&side=' + $('#mgtr-input-side').val(),
						dataType: 'json', 
						encode: true,
						beforeSend: function() {
							$('#zgfm-translation-save').prop('disabled', true);
							$('#uifm_modal_msg .sfdc-modal-body').html(' <i class="sfdc-glyphicon sfdc-glyphicon-refresh gly-spin"></i>');
						},
					})
						.done(function(data) {
							if (data.success) {
								$('#uifm_modal_msg').sfdc_modal('show');
								$('#uifm_modal_msg .sfdc-modal-title').html(data.data.html_title);
								$('#uifm_modal_msg .sfdc-modal-body').html(data.data.html);
								$('#zgfm-translation-save').prop('disabled', false);
							} else {
								alert('Error! something went wrong');
							}
						});
				});
			};

			const ResOnSuccess = function(response) {
				let successMsg = '';
				if (response.success) {
					successMsg = response.data.content;
				} else {
					successMsg = `
					<div  class="alert alert-info alert-dismissible " role="alert">
					<strong>Select a language option in order to load the translations.</strong>
				  </div>
					`;
				}
				$('#zgfmLanguageContent').html(successMsg);

				$('#zgfm-page-translation textarea').on('focus', function() {
					$(this).addClass('setChange');
				});
			};

			this.ajaxCallLoadTranslation = function() {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: rockfm_vars.uifm_siteurl + 'addon_mgtranslate/zfad_mgtranslate_back/ajax_load_pofile',
					data: {
						action: 'zgfm_mgtranslate_loadPo',
						page: 'zgfm_form_builder',
						zgfm_security: uiform_vars.ajax_nonce,
						lang: $('#mgtr-input-lang').val(),
						side: $('#mgtr-input-side').val(),
					},
					beforeSend: function() {
						let tmpmsg = `<img src="${rockfm_vars.uifm_baseurl}/assets/backend/image/ajax-loader-black.gif">`;
						$('#zgfmLanguageContent').html(tmpmsg);
					},
					success: ResOnSuccess,
				});
			};

			this.upgrade_prev_3_4_1 = function() {};
		};
		window.zgfm_back_mgtranslate = zgfm_back_mgtranslate = $.zgfm_back_mgtranslate = new zgfm_back_mgtranslate();
	})($uifm, window);
}
