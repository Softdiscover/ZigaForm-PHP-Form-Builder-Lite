if (typeof $uifm === 'undefined') {
	$uifm = jQuery;
}
var zgfm_back_addon = zgfm_back_addon || null;
if (!$uifm.isFunction(zgfm_back_addon)) {
	(function ($, window) {
		'use strict';

		var zgfm_fn_addon = function () {
			var variable = [];
			variable.innerVars = {};
			variable.externalVars = {};

			var defaults = {
				data: {}
			};

			var settings = $.extend(true, {}, defaults);

			this.initialize = function () {};
			this.dump_data = function () {
				console.log(this.dumpvar3(settings));
			};
			/*
			 * Load overview of addon data
			 *
			 * @param {type} options
			 * @returns {undefined}
			 */
			this.load_initData = function (data_info) {
				settings = $.extend(true, {}, defaults, { data: data_info });
			};

			this.load_addon = function () {
				//load addons
				let tmp_addon_arr = uiform_vars.addon;

				var tmp_function;
				var tmp_controller;
				var addon_data;
				for (var property1 in tmp_addon_arr) {
					if ('onLoadForm_loadAddon' === String(property1)) {
						for (var property2 in tmp_addon_arr[property1]) {
							for (var property3 in tmp_addon_arr[property1][property2]) {
								tmp_controller = tmp_addon_arr[property1][property2][property3]['controller'];
								tmp_function = tmp_addon_arr[property1][property2][property3]['function'];

								addon_data = settings['data'][property3] || {};
								window[tmp_controller][tmp_function](addon_data);
							}
						}
					}
				}

				/* switch(String(addon_name)) {
                        case 'func_anim':
                           zgfm_back_addon_anim.load_settings(addon_data);
                            break;
                        default:
                            
                    }  */
			};

			/*
			 *  do actions
			 * @param string $action name of the action
			 * @param object $obj_data data of the object
			 * @returns {undefined}
			 */
			this.do_action = function (action, obj_data) {
				var tmp_data = {};

				let tmp_addon_arr = uiform_vars.addon;

				var tmp_function;
				var tmp_controller;
				var accepted_args;

				for (var property1 in tmp_addon_arr) {
					if (String(action) === String(property1)) {
						for (var property2 in tmp_addon_arr[property1]) {
							for (var property3 in tmp_addon_arr[property1][property2]) {
								tmp_controller = tmp_addon_arr[property1][property2][property3]['controller'];
								tmp_function = tmp_addon_arr[property1][property2][property3]['function'];
								accepted_args = tmp_addon_arr[property1][property2][property3]['accepted_args'];
								if (parseInt(accepted_args) === 1) {
									tmp_data[property3] = window[tmp_controller][tmp_function](obj_data);
								} else {
									tmp_data[property3] = window[tmp_controller][tmp_function]();
								}
							}
						}
					}
				}

				return tmp_data;
			};

			/*
			 * change addon status
			 */
			this.listaddon_changeStatus = function (el) {
				var elem = $(el);
				var tmp_addon_name = elem.closest('.zgfm-ext-block').attr('data-name');
				var status = elem.attr('data-status');
				$.ajax({
					type: 'POST',
					url: rockfm_vars.uifm_siteurl + 'addon/zfad_backend/listaddon_updateStatus',
					data: 'action=rocket_fbuilder_addon_status&page=zgfm_form_builder&add_name=' + tmp_addon_name + '&add_status=' + status + '&csrf_field_name=' + uiform_vars.csrf_field_name,
					success: function (msg) {
						rocketform.redirect_tourl(uiform_vars.url_admin + 'addon/zfad_backend/list_extensions');
					}
				});
			};

			this.setExternalVars = function () {};
			this.getExternalVars = function (name) {
				if (variable.externalVars[name]) {
					return variable.externalVars[name];
				} else {
					return '';
				}
			};
			this.setInnerVariable = function (name, value) {
				variable.innerVars[name] = value;
			};

			this.getInnerVariable = function (name) {
				if (variable.innerVars[name]) {
					return variable.innerVars[name];
				} else {
					return '';
				}
			};

			this.dumpvar3 = function (object) {
				return JSON.stringify(object, null, 2);
			};
			this.dumpvar2 = function (object) {
				return JSON.stringify(object);
			};

			this.dumpvar = function (object) {
				var seen = [];
				var json = JSON.stringify(object, function (key, val) {
					if (val != null && typeof val == 'object') {
						if (seen.indexOf(val) >= 0) return;
						seen.push(val);
					}
					return val;
				});
				return seen;
			};

			this.redirect_tourl = function (redirect) {
				if (window.event) {
					/*IE 6*/
					window.event.returnValue = false;
					window.location = redirect;
					//return false;
				} else {
					/*firefox*/
					location.href = redirect;
				}
			};

			this.printmaindata = function () {
				console.log(this.dumpvar3(settings));
				//zgfm_back_addon_anim.dump_data();
			};
		};
		window.zgfm_back_addon = zgfm_back_addon = $.zgfm_back_addon = new zgfm_fn_addon();
	})($uifm, window);
}
