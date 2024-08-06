;(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define([], factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    root.ZgfmManager = factory();
  }
}(this, function() {
class ZgfmManager {
	constructor($uifm) {
		this.$uifm = $uifm;
		var id = document.getElementById('zgfmFlowSection');
		this.editor = new Drawflow(id);
		this.availableForms = {};
		this.activeNodeId = 0;
		this.activeFormId = 0;
		this.activeConnection = '';

		this.multistepSettings = {
			app_ver: '0.0.0',
			name: '',
			initial: 0,
			main: {
				submit_ajax: '1',
				add_css: '',
				add_js: '',
				onload_scroll: '0',
				preload_noconflict: '1',
				pdf_charset: 'UTF-8',
				pdf_font: '2',
				pdf_paper_size: 'a4',
				pdf_paper_orie: 'landscape',
				pdf_html_fullpage: '0',
				email_html_fullpage: '0',
				email_dissubm: '0',
			},
			skin: {
				form_width: {
					show_st: '0',
					max: '800',
				},
				form_padding: {
					show_st: '1',
					pos_top: '20',
					pos_right: '17',
					pos_bottom: '20',
					pos_left: '17',
				},
				form_background: {
					show_st: '1',
					type: '1',
					start_color: '#eeeeee',
					end_color: '#ffffff',
					solid_color: '#ffffff',
					image: '',
				},
				form_border_radius: {
					show_st: '0',
					size: '5',
				},
				form_border: {
					show_st: '0',
					color: '#000',
					style: '1',
					width: '1',
				},
				form_shadow: {
					show_st: '1',
					color: '#CCCCCC',
					h_shadow: '3',
					v_shadow: '3',
					blur: '10',
				},
			},
			onsubm: {
				sm_successtext: "<div class='rockfm-alert rockfm-alert-success' role='alert'>Success! Form was sent successfully.</div>",
				sm_boxmsg_bg_st: '0',
				sm_boxmsg_bg_type: '1',
				sm_boxmsg_bg_solid: '',
				sm_boxmsg_bg_start: '',
				sm_boxmsg_bg_end: '',
				sm_redirect_st: '0',
				sm_redirect_url: '',
				mail_from_email: '',
				mail_from_name: '',
				mail_template_msg: '',
				mail_recipient: '',
				mail_cc: '',
				mail_bcc: '',
				mail_subject: '',
				mail_usr_st: '0',
				mail_usr_template_msg: '',
				mail_usr_pdf_st: '0',
				mail_usr_pdf_store: '0',
				mail_usr_pdf_template_msg: '',
				mail_usr_pdf_fn: '',
				mail_usr_recipient: '',
				mail_usr_recipient_name: '',
				mail_usr_cc: '',
				mail_usr_bcc: '',
				mail_usr_subject: '',
			},
			availableConnections: {},
			availableNodes: {},
			connections: {},
			progressBar: {
				enable_st: '0',
				position: 'outertop',
				theme_type: 'numbers',
				theme: {
					default: {
						skin_tab_cur_bgcolor: '#4798E7',
						skin_tab_cur_txtcolor: '#ffffff',
						skin_tab_cur_numtxtcolor: '#4798E7',
						skin_tab_inac_bgcolor: '#ECF0F1',
						skin_tab_inac_txtcolor: '#95A5A6',
						skin_tab_inac_numtxtcolor: '#ECF0F1',
						skin_tab_done_bgcolor: '#9a8afa',
						skin_tab_done_txtcolor: '#ffffff',
						skin_tab_done_numtxtcolor: '#ECF0F1',
						skin_tab_cont_bgcolor: '#F9F9F9',
						skin_tab_cont_borcol: '#D4D4D4',
						skin_tab_default_txt_bgcolor: '#fff',
					},
					numbers: {
						skin_tab_cur_bgcolor: '#4798E7',
						skin_tab_cur_txtcolor: '#000000',
						skin_tab_cur_numtxtcolor: '#4798E7',
						skin_tab_cur_bg_numtxt: '#ffffff',
						skin_tab_inac_bgcolor: '#cccccc',
						skin_tab_inac_txtcolor: '#95A5A6',
					},
					numbers2: {
						skin_tab_cur_bgcolor: '#4798E7',
						skin_tab_cur_txtcolor: '#000000',
						skin_tab_inac_bgcolor: '#cccccc',
						skin_tab_inac_txtcolor: '#95A5A6',
					},
				},
				steps: {},
				progressBarAssigned: [],
			},
		};
	}
	saveRoute() {
		this.multistepSettings['connections'] = {};

		let df = this.getDrawflowArr();
		let df2 = df['drawflow']['zigaform']['data'];

		for (let key in df2) {
			if (df2.hasOwnProperty(key)) {
				let formId = df2[key]['data']['id'];

				this.multistepSettings['connections'][formId] = {
					inputs: [],
					outputs: [],
				};

				if (Object.keys(df2[key]['outputs']).length) {
					for (let key2 in df2[key]['outputs']['output_1']['connections']) {
						if (df2[key]['outputs']['output_1']['connections'].hasOwnProperty(key2)) {
							let formId2 = df2[df2[key]['outputs']['output_1']['connections'][key2]['node']]['data']['id'];
							this.multistepSettings['connections'][formId]['outputs'].push({
								form: formId2,
								conn: `${formId}__${formId2}`,
							});
						}
					}
				}

				if (Object.keys(df2[key]['inputs']).length) {
					for (let key2 in df2[key]['inputs']['input_1']['connections']) {
						if (df2[key]['inputs']['input_1']['connections'].hasOwnProperty(key2)) {
							let formId2 = df2[df2[key]['inputs']['input_1']['connections'][key2]['node']]['data']['id'];
							this.multistepSettings['connections'][formId]['inputs'].push({
								form: formId2,
								conn: `${formId}__${formId2}`,
							});
						}
					}
				}
			}
		}
	}
	rollbackLoadChildForms(children) {
		//var $uifm = this.$uifm;
		//var $editor = this.editor;

		const self = this;
		this.availableForms = {};
		for (let key in children) {
			if (children.hasOwnProperty(key)) {
				let tmpDataId = children[key]['id'];
				self.availableForms[tmpDataId] = {};
				self.availableForms[tmpDataId]['id'] = tmpDataId;
				self.availableForms[tmpDataId]['core'] = children[key]['data'];
				self.availableForms[tmpDataId]['preview'] = children[key]['preview'];
			}
		}
	}
	rollback(response) {
		this.multistepSettings = response.data.parent.data.data2;
		this.loadFormRollback(response);
		this.activeFormId = 0;
		this.$uifm('.sfdc-nav-tabs a[href="#uiformc-menu-secmm"]').sfdc_tab('show');
	}
	init() {
		const self = this;
		this.buttonsClicks();
		this.events();
		this.editor.reroute = true;
		// Add initial nodes
		this.editor.editor_mode = 'edit';
		this.editor.start();
		this.editor.addModule('zigaform');
		this.editor.changeModule('zigaform');
		var $uifm = this.$uifm;

		var $editor = this.editor;

		//tab event
		this.$uifm('.uiformc-menu-wrap ul.sfdc-nav-tabs a[data-toggle="sfdc-tab"]').on('shown.bs.sfdc-tab', function(e) {
			var newTab = $uifm(e.target);
			var previousTab = $uifm(e.relatedTarget);
			if (newTab.attr('href') === '#uiformc-menu-sec1') {
				if (self.activeFormId === 0) {
					self.$uifm('#uifm_mm_form_not_selected').show();
				} else {
					self.$uifm('#uifm_mm_form_not_selected').hide();
				}
			}

			if (previousTab.attr('href') === '#uiformc-menu-sec1') {
				if (self.activeFormId === 0) {
					return;
				}
				self.saveCurrentSelectedFormToCore();
			}
		});

		//node removed
		this.editor.on('uifmNodeUnselected', function(formId) {
			delete self.availableForms[formId];
		});

		//node selected
		this.editor.on('nodeSelected', function(nodeId) {
			// Perform actions when a node is selected
			const nodeInfo = $editor.getNodeFromId(nodeId);
			var formId = nodeInfo.data.id;
			self.activeFormId = formId;
			self.activeNodeId = nodeId;
			$uifm('#uifm_frm_main_id').val(formId);
			$uifm('.uiform-items-container').html('');
			rocketform.refreshPreviewSectionMultistep();

			//load progress bar settings
			self.progresstab_loadSettings(self, false, false);

			//refresh preview
			self.progresstab_refreshPreview();
		});
		this.editor.on('nodeUnselected', function(status) {
			self.activeFormId = 0;
			self.activeNodeId = 0;
			self.activeConnection = '';
		});

		//connection is created
		this.editor.on('connectionCreated', function(info) {
			addAnimationToConnection(info);
			let startNode = self.editor.getNodeFromId(info.output_id);
			let endNode = self.editor.getNodeFromId(info.input_id);

			let activeConn = `${startNode.data.id}__${endNode.data.id}`;

			self.multistepSettings['availableConnections'][activeConn] = {
				rules: {
					is_fallback: 0,
					top_condition: 1,
					list: [],
				},
				start: {},
				end: {},
			};

			self.multistepSettings['availableConnections'][activeConn]['start']['id'] = startNode.data.id;
			self.multistepSettings['availableConnections'][activeConn]['start']['name'] = self.availableForms[startNode.data.id].name;

			self.multistepSettings['availableConnections'][activeConn]['end']['id'] = endNode.data.id;
			self.multistepSettings['availableConnections'][activeConn]['end']['name'] = self.availableForms[endNode.data.id].name;

			self.activeConnection = activeConn;
		});

		//connection is removed
		this.editor.on('connectionRemoved', function(info) {
			let outputId = info.output_id,
				inputId = info.input_id;
			let startNode = self.editor.getNodeFromId(outputId);
			let endNode = self.editor.getNodeFromId(inputId);

			let activeConn = `${startNode.data.id}__${endNode.data.id}`;
			self.activeConnection = activeConn;

			delete self.multistepSettings.availableConnections[activeConn];
			self.modalConnSettings.removeClass('open');
			self.activeConnection = '';
		});

		//connection is selected
		this.editor.on('connectionSelected', function(info) {
			let outputId = info.output_id,
				inputId = info.input_id;

			//clean connection form
			self.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2').html('');

			self.modalConnSettings.addClass('open');

			let startNode = self.editor.getNodeFromId(outputId);
			let endNode = self.editor.getNodeFromId(inputId);

			let activeConn = `${startNode.data.id}__${endNode.data.id}`;
			self.activeConnection = activeConn;
			let form1Name = self.multistepSettings.availableConnections[activeConn]['start']['name'];
			let form2Name = self.multistepSettings.availableConnections[activeConn]['end']['name'];
			self.activeFormId = self.multistepSettings.availableConnections[activeConn]['start']['id'];
			self.$uifm('#uifm_mm_connection_infobox #conn_node1').html(form1Name);
			self.$uifm('#uifm_mm_connection_infobox #conn_node2').html(form2Name);

			var isFallback = parseInt(self.multistepSettings['availableConnections'][self.activeConnection]['rules']['is_fallback']) === 1 ? true : false;
			self.$uifm('#uifm_mm_connection_infobox_fallback').bootstrapSwitchZgpb('state', isFallback);

			if (isFallback === false) {
				self.$uifm('#uifm_main_rules_dyn').show();
			} else {
				self.$uifm('#uifm_main_rules_dyn').hide();
			}

			self.clogic_tabeditor_generateAllOptions(self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list']);
		});

		this.editor.on('connectionUnselected', function(state) {
			self.modalConnSettings.removeClass('open');
			self.activeConnection = '';
			self.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2').html('');
			self.activeFormId = 0;
		});

		const addAnimationToConnection = connection => {
			const connectionElem = $uifm(`.node_in_node-${connection.input_id}.node_out_node-${connection.output_id}`);
			const pathElem = connectionElem.find('path.main-path');

			if (pathElem.length) {
				// Add stroke-dasharray to the path
				pathElem.css({
					'stroke-dasharray': '10,5',
					animation: 'dash 2s linear infinite',
				});

				// Define keyframes for the animation
				const style = document.createElement('style');
				style.innerHTML = `
					@keyframes dash {
						to {
							stroke-dashoffset: -15;
						}
					}
				`;
				document.head.appendChild(style);
			}
		};

		/*this.editor.on('connectionCreated', connection => {
			
		});

		// Apply animation to existing connections after importing data
		/*for (const nodeId in data.drawflow.Home.data) {
			const node = data.drawflow.Home.data[nodeId];
			if (node.outputs) {
				for (const output in node.outputs) {
					const connections = node.outputs[output].connections;
					connections.forEach(connection => {
						addElectricFlowAnimation(connection);
					});
				}
			}
		}*/

		this.modalConnSettings = this.$uifm('#uifm_mm_connection_infobox');
	}
	clogic_tabeditor_generateAllOptions(options) {
		this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2').html('');
		const self = this;
		var optindex;
		var logic_row;
		var logic_cont = this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2');

		this.$uifm.each(options, function(index, value) {
			if (value) {
				optindex = index;
				logic_row = self.$uifm('#uiform-mm-set-clogic-tmpl .uifm-conditional-row').clone();
				logic_row.attr('data-row-index', optindex);
				logic_cont.append(logic_row);

				/*get field*/

				self.clogic_getListField(logic_row);

				logic_row
					.find('.uifm_clogic_fieldsel')
					.val(value['field_fire'])
					.trigger('chosen:updated');
				var field = self.search_fieldById(value['field_fire']);
				/*get match type*/

				self.clogic_getTypeMatch(logic_row, field.type);

				if (parseInt(logic_row.find('.uifm_clogic_mtype').attr('data-loaded')) === 1) {
					logic_row
						.find('.uifm_clogic_mtype select')
						.val(value['mtype'])
						.trigger('chosen:updated');
					/*get match input*/

					self.clogic_getMatchInput(logic_row, field);

					if (parseInt(logic_row.find('.uifm_clogic_minput').attr('data-loaded')) === 1) {
						switch (parseInt(field.type)) {
							case 8:
							case 9:
							case 10:
							case 11:
							case 41:
							case 42:
								//radio button & checkbox & select
								if (parseInt(logic_row.find('.uifm_clogic_minput_1').find('option[value="' + value['minput'] + '"]').length) != 0) {
									logic_row
										.find('.uifm_clogic_minput_1')
										.val(value['minput'])
										.trigger('chosen:updated');
								} else {
									self.clogic_tabeditor_removeifnomatch(index);
								}
								break;
							case 40:
								var tmp_val;
								if (parseInt(value['minput']) === 1) {
									tmp_val = '1';
								} else {
									tmp_val = '0';
								}
								logic_row
									.find('.uifm_clogic_minput_1')
									.val(tmp_val)
									.trigger('chosen:updated');
								break;
							case 16:
							case 18:
								logic_row.find('.uifm_clogic_minput_2').val(value['minput']);
								break;
						}
					}
				}
			} else {
				self.clogic_tabeditor_removeifnomatch(index);
			}

			/*end for*/
		});
	}
	clogic_tabeditor_removeifnomatch(index) {
		var opt_index = index;

		//delete from setting tab
		this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2')
			.find('.uifm-conditional-row[data-row-index="' + index + '"]')
			.remove();
		//delete from core

		delete this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'][parseInt(opt_index)];

		var tmp_arr = this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'];

		var tmp_len = tmp_arr.length,
			tmp_i;
		for (tmp_i = 0; tmp_i < tmp_len; tmp_i++) tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
		if (this.$uifm.isArray(tmp_arr)) {
			tmp_arr.splice(0, tmp_len);

			//rocketform.setUiData5('steps_src', parseInt(f_step), f_id, 'clogic', 'list', tmp_arr);
			this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'] = tmp_arr;
		}
	}
	clogic_deleteConditional(elm) {
		var el = this.$uifm(elm);

		var opt_index = el.closest('.uifm-conditional-row').data('row-index');

		//delete from setting tab
		el.closest('.uifm-conditional-row').remove();

		//delete main data

		delete this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'][parseInt(opt_index)];

		var tmp_arr = this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'];

		var tmp_len = tmp_arr.length,
			tmp_i;
		for (tmp_i = 0; tmp_i < tmp_len; tmp_i++) tmp_arr[tmp_i] && tmp_arr.push(tmp_arr[tmp_i]);
		if (this.$uifm.isArray(tmp_arr)) {
			tmp_arr.splice(0, tmp_len);
			this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'] = tmp_arr;
		}
	}
	clogic_getTypeMatch(logic_row, type) {
		logic_row.find('.uifm_clogic_mtype').html('');
		logic_row.find('.uifm_clogic_mtype').attr('data-loaded', '0');
		//add a loader just to know whether is refreshed
		logic_row.find('.uifm_clogic_mtype').append('<i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin sfdc-spin1"></i>');

		//remove loader
		logic_row
			.find('.uifm_clogic_mtype')
			.find('.sfdc-gly-spin')
			.fadeOut('slow')
			.remove();

		var str;
		switch (parseInt(type)) {
			case 8:
			case 9:
			case 10:
			case 11:
			case 40:
			case 41:
			case 42:
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_mtypeinp_1').clone();
				break;
			case 16:
			case 18:
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_mtypeinp_2').clone();
				break;
		}

		logic_row.find('.uifm_clogic_mtype').append(str);
		logic_row.find('.uifm_clogic_mtypeinp').chosen({ width: '100%' });
		logic_row.find('.uifm_clogic_mtype').attr('data-loaded', '1');
	}
	clogic_changeField(elm) {
		const self = this;
		var el = this.$uifm(elm);
		var el_row = el.closest('.uifm-conditional-row');

		var f_id = el.val();
		/*var f_step = this.$uifm('#' + f_id)
			.closest('.uiform-step-pane')
			.data('uifm-step');*/
		var f_step = 0;
		var optnro = el_row.data('row-index');
		var row_field_val = el_row
			.find('.uifm_clogic_fieldsel')
			.chosen()
			.val();

		var field = this.search_fieldById(row_field_val);

		/*get match type*/

		this.clogic_getTypeMatch(el_row, field.type);

		var uifm_check_timer = setInterval(function() {
			if (parseInt(el_row.find('.uifm_clogic_mtype').attr('data-loaded')) === 1) {
				var cl_sel_mtype = el_row
					.find('.uifm_clogic_mtype select')
					.chosen()
					.val();

				/*get match input*/
				self.clogic_getMatchInput(el_row, field);

				var uifm_check2_timer = setInterval(function() {
					if (parseInt(el_row.find('.uifm_clogic_minput').attr('data-loaded')) === 1) {
						var cl_sel_minput;
						switch (parseInt(field.type)) {
							case 8:
							case 9:
							case 10:
							case 11:
							case 41:
							case 42:
								cl_sel_minput = el_row
									.find('.uifm_clogic_minput_1')
									.chosen()
									.val();
								break;
							case 40:
							case 16:
							case 18:
								cl_sel_minput = el_row.find('.uifm_clogic_minput_2').val();
								break;
						}

						/*clean empty rows*/
						/*console.log(`f_step `, f_step);
						var tmp_list = rocketform.getUiData5('steps_src', parseInt(f_step), f_id, 'clogic', 'list');
						console.log('🚀 ~ ZgfmManager ~ varuifm_check2_timer=setInterval ~ tmp_list:', tmp_list);

						if (tmp_list) {
							self.$uifm.each(tmp_list, function(index, value) {
								if (String(value) === '' || value === null) {
									tmp_list.splice(index, 1);
								}
							});
						}*/

						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'][parseInt(optnro)]['field_fire'] = row_field_val;
						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'][parseInt(optnro)]['mtype'] = cl_sel_mtype;
						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'][parseInt(optnro)]['minput'] = cl_sel_minput;

						clearInterval(uifm_check2_timer);
						uifm_check2_timer = null;
					}
				}, 500);

				clearInterval(uifm_check_timer);
				uifm_check_timer = null;
			}
		}, 500);
	}
	clogic_changeMinput(elm) {
		var el = this.$uifm(elm);
		var el_row = el.closest('.uifm-conditional-row');
		var optnro = el_row.data('row-index');

		var f_step = 0;
		var cl_sel_id = el_row
			.find('.uifm_clogic_fieldsel')
			.chosen()
			.val();
		var type = el_row.find('.uifm_clogic_fieldsel [value="' + cl_sel_id + '"]').data('type');
		var cl_sel_minput;
		switch (parseInt(type)) {
			case 8:
			case 9:
			/*radio button and checkbox*/
			case 10:
			case 11:
			case 40:
			case 41:
			case 42:
				cl_sel_minput = el_row
					.find('.uifm_clogic_minput_1')
					.chosen()
					.val();

				break;
			case 16:
			case 18:
				cl_sel_minput = el_row.find('.uifm_clogic_minput_2').val();
				break;
		}
		this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'][parseInt(optnro)]['minput'] = cl_sel_minput;
	}
	clogic_changeMtype(elm) {
		var el = this.$uifm(elm);
		var el_row = el.closest('.uifm-conditional-row');
		var cl_sel_mtype = el_row
			.find('.uifm_clogic_mtype select')
			.chosen()
			.val();
		var optnro = el_row.data('row-index');

		this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'][parseInt(optnro)]['mtype'][cl_sel_mtype];
	}
	clogic_getListField(logic_row) {
		var field = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_fieldsel').clone();

		var var_fields = this.availableForms[this.multistepSettings['availableConnections'][this.activeConnection]['start']['id']]['core']['steps_src'];

		var arr_types_allowed = [8, 9, 10, 11, 16, 18, 40, 41, 42];
		var string_res = '';

		const self = this;
		this.$uifm.each(var_fields, function(index, value) {
			self.$uifm.each(value, function(index2, value2) {
				if (self.$uifm.inArray(parseInt(value2.type), arr_types_allowed) >= 0) {
					string_res += '<option data-type="' + value2.type + '" value="' + value2.id + '">' + value2.field_name + '</option>';
				}
			});
		});
		field.append(string_res);
		logic_row.find('.uifm_clogic_field').append(field);
		logic_row.find('.uifm_clogic_fieldsel').chosen({ width: '100%' });

		return true;
	}
	search_fieldById(field_id) {
		var var_fields = this.availableForms[this.multistepSettings['availableConnections'][this.activeConnection]['start']['id']]['core']['steps_src'];

		for (var i in var_fields) {
			for (var i2 in var_fields[i]) {
				if (String(var_fields[i][i2].id) === String(field_id)) {
					return var_fields[i][i2];
				}
			}
		}
		return false;
	}
	clogic_getMatchInput(logic_row, field) {
		logic_row.find('.uifm_clogic_minput').html('');
		logic_row.find('.uifm_clogic_minput').attr('data-loaded', '0');
		//add a loader just to know whether is refreshed
		logic_row.find('.uifm_clogic_minput').append('<i class="sfdc-glyphicon sfdc-glyphicon-refresh sfdc-gly-spin sfdc-spin1"></i>');

		//remove loader
		logic_row
			.find('.uifm_clogic_minput')
			.find('.sfdc-gly-spin')
			.fadeOut('slow')
			.remove();

		var str;
		var str_opts;
		var tmp_opts;
		switch (parseInt(field.type)) {
			case 8:
			case 9:
			case 10:
			case 11:
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_minput_1').clone();
				tmp_opts = field.input2['options'];
				if (tmp_opts) {
					str_opts = '';
					this.$uifm.each(tmp_opts, function(index2, value2) {
						str_opts += '<option value="' + index2 + '">' + value2.value + '</option>';
					});
					str.append(str_opts);
				}
				logic_row.find('.uifm_clogic_minput').append(str);
				logic_row.find('.uifm_clogic_minput_1').chosen({ width: '100%' });
				break;
			case 41:
			case 42:
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_minput_1').clone();
				tmp_opts = field.input17['options'];
				if (tmp_opts) {
					str_opts = '';
					this.$uifm.each(tmp_opts, function(index2, value2) {
						str_opts += '<option value="' + index2 + '">' + value2.label + '</option>';
					});
					str.append(str_opts);
				}
				logic_row.find('.uifm_clogic_minput').append(str);
				logic_row.find('.uifm_clogic_minput_1').chosen({ width: '100%' });
				break;
			case 40:
				/*switch*/
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_minput_1').clone();

				str_opts = '';
				str_opts += '<option value="0">' + field.input15['txt_no'] + '</option>';
				str_opts += '<option value="1">' + field.input15['txt_yes'] + '</option>';

				str.append(str_opts);

				logic_row.find('.uifm_clogic_minput').append(str);
				logic_row.find('.uifm_clogic_minput_1').chosen({ width: '100%' });

				break;
			case 16:
			case 18:
				str = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm_clogic_minput_2').clone();
				var set_min = field.input4['set_min'],
					set_max = field.input4['set_max'],
					set_default = field.input4['set_default'],
					set_step = field.input4['set_step'];
				logic_row.find('.uifm_clogic_minput').append(str);
				logic_row.find('.uifm_clogic_minput_2').TouchSpin({
					verticalbuttons: true,
					min: parseFloat(set_min),
					max: parseFloat(set_max),
					stepinterval: parseFloat(set_step),
					verticalupclass: 'sfdc-glyphicon sfdc-glyphicon-plus',
					verticaldownclass: 'sfdc-glyphicon sfdc-glyphicon-minus',
					initval: parseFloat(set_default),
				});
				break;
		}
		logic_row.find('.uifm_clogic_minput').attr('data-loaded', '1');
	}
	clogic_changeTopCondition(elm) {
		var el = this.$uifm(elm);
		let tmpVal = el.val();
		this.multistepSettings['availableConnections'][this.activeConnection]['rules']['top_condition'] = tmpVal;
	}
	clogic_addNewConditional() {
		const self = this;
		var logic_cont = this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2');
		var num = this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2 .uifm-conditional-row').length;
		var optindex = parseInt(num);

		var logic_row = this.$uifm('#uiform-mm-set-clogic-tmpl .uifm-conditional-row').clone();
		logic_row.attr('data-row-index', optindex);
		logic_cont.append(logic_row);

		/*get field*/
		this.clogic_getListField(logic_row);

		var cl_sel_id = logic_row
			.find('.uifm_clogic_fieldsel')
			.chosen()
			.val();
		var field = this.search_fieldById(cl_sel_id);

		/*get match type*/

		this.clogic_getTypeMatch(logic_row, field.type);

		var uifm_check_timer = setInterval(function() {
			console.log(` logic_row.find('.uifm_clogic_mtype').attr('data-loaded') ${logic_row.find('.uifm_clogic_mtype').attr('data-loaded')}`);
			if (parseInt(logic_row.find('.uifm_clogic_mtype').attr('data-loaded')) === 1) {
				var cl_sel_mtype = logic_row
					.find('.uifm_clogic_mtype select')
					.chosen()
					.val();

				/*get match input*/

				self.clogic_getMatchInput(logic_row, field);

				var uifm_check2_timer = setInterval(function() {
					if (parseInt(logic_row.find('.uifm_clogic_minput').attr('data-loaded')) === 1) {
						var cl_sel_minput;
						switch (parseInt(field.type)) {
							case 8:
							case 9:
							case 10:
							case 11:
							case 41:
							case 42:
								cl_sel_minput = logic_row
									.find('.uifm_clogic_minput_1')
									.chosen()
									.val();
								break;
							case 40:
							case 16:
							case 18:
								cl_sel_minput = logic_row.find('.uifm_clogic_minput_2').val();
								break;
						}

						var f_step = 0;

						/*clean empty rows*/

						var tmp_list = self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'];

						if (tmp_list) {
							self.$uifm.each(tmp_list, function(index, value) {
								if (String(value) === '' || value === null) {
									tmp_list.splice(index, 1);
								}
							});
						}

						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'] = tmp_list;

						//set to main data

						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'][parseInt(optindex)] = {};

						self.multistepSettings['availableConnections'][self.activeConnection]['rules']['list'][parseInt(optindex)] = {
							field_fire: cl_sel_id,
							mtype: cl_sel_mtype,
							minput: cl_sel_minput,
						};

						clearInterval(uifm_check2_timer);
						uifm_check2_timer = null;
					}
				}, 500);

				clearInterval(uifm_check_timer);
				uifm_check_timer = null;
			}
		}, 500);
	}

	debugCurrentSelectedForm() {
		return this.availableForms[this.activeFormId];
	}
	saveCurrentSelectedFormToCore() {
		if (this.activeFormId === 0) {
			return;
		}
		rocketform.saveFormOnBackground();

		let newName = $uifm('#uifm_frm_main_title').val() || '';
		
		if (newName!='') { 
			this.changeNodeName(this.activeNodeId, newName);
		}

		this.changeNodeName(this.activeNodeId, newName);

		this.availableForms[this.activeFormId]['name'] = newName;
		this.availableForms[this.activeFormId]['preview'] = $uifm('.uiform-preview-base').html();
	}
	events() {
		const self = this;
	}
	loadMultistep(data) {
		this.multistepSettings = this.$uifm.extend(true, {}, this.multistepSettings, data.data.fmb_data2);

		this.fixData();

		//update settings
		this.$uifm('#uifm_mm_settings_title').val(this.multistepSettings.name);
	}
	fixData() {
		if (this.$uifm.isArray(this.multistepSettings['availableConnections'])) {
			this.multistepSettings['availableConnections'] = {};
		}

		if (this.$uifm.isArray(this.multistepSettings['availableNodes'])) {
			this.multistepSettings['availableNodes'] = {};
		}
	}
	getUiData2 = function(name, index) {
		try {
			return this.multistepSettings[name][index];
		} catch (err) {
			console.log('error getUiData2: ' + err.message);
		}
	};
	spliceUiData3 = function(name, index, key) {
		if (parseInt(key) > -1) {
			this.multistepSettings[name][index].splice(parseInt(key), 1);
		}
	};
	delUiData3 = function(name, index, key) {
		delete this.multistepSettings[name][index][key];
	};
	addIndexUiData2 = function(name, index, value) {
		if (typeof this.multistepSettings[name][index] == 'undefined') {
		} else {
			this.multistepSettings[name][index][value] = {};
		}
	};
	setUiData3 = function(name, index, key, value) {
		if (!this.multistepSettings.hasOwnProperty(name)) {
			this.multistepSettings[name] = {};
		}
		if (!this.multistepSettings[name].hasOwnProperty(index)) {
			this.multistepSettings[name][index] = {};
		}

		this.multistepSettings[name][index][key] = value;
	};
	getUiData3 = function(name, index, key) {
		try {
			return this.multistepSettings[name][index][key];
		} catch (err) {
			console.log('error mm_getUiData3: ' + err.message);
		}
	};

	getUiData4 = function(name, index, key, option) {
		try {
			return this.multistepSettings[name][index][key][option];
		} catch (err) {
			console.log('error getUiData4: name: ' + name + ' index:' + index + ' key:' + key + ' option:' + option + ' error:' + err.message);
		}
	};
	setUiData4 = function(name, index, key, option, value) {
		if (!this.multistepSettings.hasOwnProperty(name)) {
			this.multistepSettings[name] = {};
		}
		if (!this.multistepSettings[name].hasOwnProperty(index)) {
			this.multistepSettings[name][index] = {};
		}

		if (!this.multistepSettings[name][index].hasOwnProperty(key)) {
			this.multistepSettings[name][index][key] = {};
		}

		this.multistepSettings[name][index][key][option] = value;
	};
	buttonsClicks() {
		const self = this;
		//add event to button
		this.button = document.getElementById('zgfm_m_showmodal');
		if (this.button) {
			this.button.addEventListener('click', this.handleClick.bind(this));
		}
		this.button2 = document.getElementById('zgfm_m_opt_export');
		if (this.button2) {
			this.button2.addEventListener('click', this.handleClickShowExport.bind(this));
		}
		this.button3 = document.getElementById('zgfm_m_opt_zoomreset');
		if (this.button3) {
			this.button3.addEventListener('click', this.handleClickZoomReset.bind(this));
		}
		this.button4 = document.getElementById('zgfm_m_opt_zoomin');
		if (this.button4) {
			this.button4.addEventListener('click', this.handleClickZoomIn.bind(this));
		}
		this.button5 = document.getElementById('zgfm_m_opt_zoomout');
		if (this.button5) {
			this.button5.addEventListener('click', this.handleClickZoomOut.bind(this));
		}

		this.button6 = document.getElementById('zgfm_m_addnewform');
		if (this.button6) {
			this.button6.addEventListener('click', this.handleClickNewForm.bind(this));
		}

		this.button7 = document.getElementById('uifm_mm_connection_infobox_btn_close');
		if (this.button7) {
			this.button7.addEventListener('click', this.handleClickConnBtnClose.bind(this));
		}

		this.button8 = document.getElementById('uifm_mm_connection_infobox_btn_delete_connection');
		if (this.button8) {
			this.button8.addEventListener('click', this.handleClickConnDelete.bind(this));
		}

		this.button9 = document.getElementById('uifm_mm_connection_infobox_newcond');
		if (this.button9) {
			this.button9.addEventListener('click', this.handleClickConnBtnNewCond.bind(this));
		}

		this.$uifm(document).on('change keyup focus keypress', '#uifm_mm_settings_title', function(e) {
			var f_val = self.$uifm(this).val();
			if (f_val) {
				self.multistepSettings['name'] = f_val;
			}
		});

		this.$uifm(document).on('change', '#uifm_mm_settings_initialform', function(e) {
			var f_val = self.$uifm(this).val();

			if (f_val === self.multistepSettings['initial']) {
				return;
			}

			if (parseInt(f_val) > 0) {
				self.multistepSettings['initial'] = f_val;

				let nodeId = self.multistepSettings['availableNodes'][f_val];

				//update editor
				self.updateNodeNumInToZero(self.editor, nodeId);
			}
		});

		this.$uifm('#uifm_mm_connection_infobox .switch-field').on('switchChange.bootstrapSwitchZgpb', function(event, state) {
			var f_val = state ? 1 : 0;
			self.multistepSettings['availableConnections'][self.activeConnection]['rules']['is_fallback'] = f_val;

			if (f_val === 0) {
				self.$uifm('#uifm_main_rules_dyn').show();
			} else {
				self.$uifm('#uifm_main_rules_dyn').hide();
			}
		});

		//progress bar
		this.$uifm(document).on('change', '#uifm_frm_pbar_theme_type', function(e) {
			var fVal = self.$uifm(this).val();
			self.multistepSettings['progressBar']['theme_type'] = fVal;
			self.progresstab_updateSettingsTheme(fVal);

			//refresh settings
			self.progresstab_loadSettings(self, true, true);
			//refresh preview
			self.progresstab_refreshPreview();
		});

		this.$uifm(document).on('change', '#uifm_frm_pbar_theme_position', function(e) {
			var fVal = self.$uifm(this).val();
			self.multistepSettings['progressBar']['position'] = fVal;

			//refresh preview
			self.progresstab_refreshPreview();
		});

		if (this.$uifm.fn.colorpicker) {
			this.$uifm('#uiform-settings-tab3-6')
				.find('.uifm-evt-progressbar-color')
				.colorpicker()
				.on('changeColor', function(ev) {
					var store = self.$uifm(this).data('form-store');

					var f_val = self
						.$uifm(this)
						.find('input')
						.val();
					if (f_val) {
						self.setUiData4('progressBar', 'theme', self.multistepSettings['progressBar']['theme_type'], store, f_val);

						//reresh preview
						self.progresstab_refreshPreview();
					}
				});
		}
	}

	updateNodeNumInToZero(editor, nodeId) {
		// Access the node's data
		var node = editor.getNodeFromId(nodeId);

		if (node) {
			// Remove connections related to the node's inputs
			var connectionsToRemove = [];
			for (let input in node.inputs) {
				node.inputs[input].connections.forEach(connection => {
					connectionsToRemove.push({
						node: connection.node,
						output: connection.output,
						input: input,
					});
				});
			}

			// Remove each connection
			connectionsToRemove.forEach(connection => {
				editor.removeSingleConnection(connection.node, nodeId, connection.output, connection.input);
			});

			// Update the num_in property to zero
			node.num_in = 0;

			// Redraw or refresh the node in the canvas
			editor.updateNodeDataFromId(nodeId, node.data);
		}
	}
	handleClickConnBtnDelAllCond() {
		this.$uifm('#uifm_mm_connection_infobox .uifm_main_rules2').html('');
		this.multistepSettings['availableConnections'][this.activeConnection]['rules']['list'] = [];
	}

	handleClickConnBtnNewCond() {
		this.clogic_addNewConditional();
	}
	handleClickConnBtnClose() {
		this.modalConnSettings.removeClass('open');
		this.editor.connection_selected.parentElement.querySelectorAll('.main-path').forEach((item, i) => {
			item.classList.remove('selected');
		});
	}
	handleClickConnDelete() {
		this.handleClickConnBtnClose();
		//remove from object
		delete this.multistepSettings['availableConnections'][this.activeConnection];

		//remove graphically
		this.editor.removeConnection();
	}
	loadFormRollback(response) {
		this.editor.reroute = true;

		const flow = {
			drawflow: {
				Home: {
					data: {},
				},
				zigaform: {},
			},
		};

		flow.drawflow.zigaform.data = JSON.parse(JSON.stringify(response.data.parent.data.data.data));

		let newtmp = flow.drawflow.zigaform.data;

		//adding proper format
		for (let key in newtmp) {
			if (newtmp.hasOwnProperty(key)) {
				for (let key2 in newtmp[key]) {
					if (newtmp[key].hasOwnProperty(key2)) {
						if (key2 === 'typenode') {
							newtmp[key]['typenode'] = false;
						}
					}
				}
			}
		}
		flow.drawflow.zigaform.data = newtmp;

		const dataToImport = flow;
		this.editor.clear();
		this.editor.import(dataToImport);

		//this.loadChildForms(newtmp);
		this.rollbackLoadChildForms(response.data.children.data);

		//adding electric effect to loaded connections
		let allConnections = this.$uifm('.connection');
		const pathElem = allConnections.find('path.main-path');
		if (pathElem.length) {
			// Add stroke-dasharray to the path
			pathElem.css({
				'stroke-dasharray': '10,5',
				animation: 'dash 2s linear infinite',
			});

			// Define keyframes for the animation
			const style = document.createElement('style');
			style.innerHTML = `
					@keyframes dash {
						to {
							stroke-dashoffset: -15;
						}
					}
				`;
			document.head.appendChild(style);
		}
	}
	loadForm(response) {
		this.editor.reroute = true;

		const flow = {
			drawflow: {
				Home: {
					data: {},
				},
				zigaform: {},
			},
		};

		let dataLoaded = response.data.fmb_data.data;

		if (this.$uifm.isArray(dataLoaded) && parseInt(dataLoaded.length) === 0) {
			return;
		}

		if (parseInt(Object.keys(dataLoaded).length) === 0) {
			return;
		}

		flow.drawflow.zigaform.data = JSON.parse(JSON.stringify(response.data.fmb_data.data));

		let newtmp = flow.drawflow.zigaform.data;

		//adding proper format
		for (let key in newtmp) {
			if (newtmp.hasOwnProperty(key)) {
				for (let key2 in newtmp[key]) {
					if (newtmp[key].hasOwnProperty(key2)) {
						if (key2 === 'typenode') {
							newtmp[key]['typenode'] = false;
						}
					}
				}
			}
		}
		flow.drawflow.zigaform.data = newtmp;

		const dataToImport = flow;
		this.editor.clear();
		this.editor.import(dataToImport);

		this.loadChildForms(newtmp);

		//adding electric effect to loaded connections
		let allConnections = this.$uifm('.connection');
		const pathElem = allConnections.find('path.main-path');
		if (pathElem.length) {
			// Add stroke-dasharray to the path
			pathElem.css({
				'stroke-dasharray': '10,5',
				animation: 'dash 2s linear infinite',
			});

			// Define keyframes for the animation
			const style = document.createElement('style');
			style.innerHTML = `
					@keyframes dash {
						to {
							stroke-dashoffset: -15;
						}
					}
				`;
			document.head.appendChild(style);
		}
	}

	loadChildForms(childNodes) {
		//var $uifm = this.$uifm;
		//var $editor = this.editor;

		const self = this;

		for (let key in childNodes) {
			if (childNodes.hasOwnProperty(key)) {
				let tmpDataId = childNodes[key]['data']['id'];
				this.$uifm.ajax({
					type: 'POST',
					url: rockfm_vars.uifm_siteurl + 'formbuilder/forms/ajax_mm_load_childform',
					async: false,
					data: {
						action: 'rocket_fbuilder_mm_load_childform',
						page: 'zgfm_form_builder',
						zgfm_security: uiform_vars.ajax_nonce,
						uifm_frm_main_child_id: tmpDataId,
						csrf_field_name: uiform_vars.csrf_field_name,
					},
					success: function(msg) {
						self.availableForms[tmpDataId] = {};
						self.availableForms[tmpDataId]['id'] = tmpDataId;
						self.availableForms[tmpDataId]['core'] = msg.data.fmb_data;
						self.availableForms[tmpDataId]['name'] = msg.data.fmb_name;
						self.availableForms[tmpDataId]['preview'] = msg.data.fmb_html_backend;
					},
				});
			}
		}
	}

	handleClick() {
		this.$uifm('#uifm_mm_settings_initialform').html('');

		for (let key in this.availableForms) {
			if (this.availableForms.hasOwnProperty(key)) {
				var newOption = this.$uifm('<option></option>')
					.attr('value', this.availableForms[key]['id'])
					.text(this.availableForms[key]['name']);
				this.$uifm('#uifm_mm_settings_initialform').append(newOption);
			}
		}

		this.$uifm('#uifm_mm_settings_initialform').val(this.multistepSettings['initial']);
		this.$uifm('#uifm_mm_settings_title').val(this.multistepSettings['name']);

		this.$uifm('#uifm_mm_general').sfdc_modal('show');
	}
	getDrawflowArr() {
		return this.editor.getDrawflowArr();
	}
	handleClickShowExport() {
		this.editor.showExport();
	}
	handleClickZoomReset() {
		this.editor.zoom_reset();
	}
	handleClickZoomIn() {
		this.editor.zoom_in();
	}
	handleClickZoomOut() {
		this.editor.zoom_out();
	}
	handleClickNewForm(event) {
		var $uifm = this.$uifm;
		var $editor = this.editor;

		const self = this;
		const formData = rocketform.getMainData();
		this.$uifm.ajax({
			type: 'POST',
			url: rockfm_vars.uifm_siteurl + 'multistep/dashboard/ajax_save_newform',
			async: true,
			data: {
				action: 'rocket_fbuilder_mm_save_newform',
				page: 'zgfm_form_builder',
				zgfm_security: uiform_vars.ajax_nonce,
				form_data: encodeURIComponent(JSON.stringify(formData)),
				uifm_frm_main_multistep_parent: this.$uifm('#uifm_frm_mm_main_id').val(),
				csrf_field_name: uiform_vars.csrf_field_name,
			},
			success: function(msg) {
				if (parseInt(msg.id) > 0) {
					$uifm('#uifm_frm_main_id').val(msg.id);
					var data = {};
					data.id = msg.id;

					let numberOfProperties = Object.keys(self.multistepSettings['availableNodes']).length;

					let nodeId;
					if (numberOfProperties == 0) {
						self.multistepSettings['availableNodes'] = {};
						nodeId = $editor.addNode(msg.name, 0, 1, 50, 100, '', data, msg.name);
						self.multistepSettings['initial'] = msg.id;
					} else {
						nodeId = $editor.addNode(msg.name, 1, 1, 50, 100, '', data, msg.name);
					}

					self.activeFormId = msg.id;
					self.availableForms[msg.id] = {};
					self.availableForms[msg.id]['core'] = JSON.parse(JSON.stringify(formData));
					self.availableForms[msg.id]['id'] = msg.id;
					self.availableForms[msg.id]['name'] = msg.name;
					self.availableForms[msg.id]['preview'] = `<div class="rockfm_form_hook_outertop"></div><div class="uiform-main-form" style="padding: 20px 17px; background: rgb(255, 255, 255); box-shadow: rgb(204, 204, 204) 3px 3px 10px;">
					 <div class="rockfm_form_hook_innertop"></div>
					 <div class="uiform-step-content" style="min-height:100px;">
					 <div data-uifm-step="0" id="uifm-step-tab-0" class="uiform-step-pane" style="">
					 <div id="" class="uiform-items-container uiform-tab-container ui-sortable"></div>
					 </div>
					 </div>
					 </div>`;
					self.changeNodeName(nodeId, msg.name);

					self.multistepSettings['availableNodes'][msg.id] = nodeId;

					/*self.$uifm('.drawflow-node').hover(
						function() {
							// Show #hidden-element
							self
								.$uifm(this)
								.find('.drawflow_uifm_opt_edit')
								.show();
						},
						function() {
							// Hide #hidden-element
							self
								.$uifm(this)
								.find('.drawflow_uifm_opt_edit')
								.hide();
						}
					);

					self.$uifm(`#node-${nodeId} .drawflow_uifm_opt_edit`).on('click', function() {
						self.editor.selectNode(nodeId);
						self.$uifm('.sfdc-nav-tabs a[href="#uiformc-menu-sec1"]').click();
					});*/
				} else {
					alert('Error');
				}
			},
		});
	}
	formvariables_generateTable_modal() {
		return this.formvariables_generateTable_process_main();
	}
	formvariables_generateTable() {
		this.$uifm('#uiform-form-mailset-vars-tab-1 .uifm-tab-inner-vars-1').html(this.formvariables_generateTable_process());
	}

	formvariables_generateTable_process_main() {
		let message = `
		 <div class="sfdc-wrap">
   <div id="zgfm-modal-calc-container">
      <div class="sfdc-alert sfdc-alert-info"> <strong>Info!</strong> Choose your variable. Under Backend tab, you will find variables to be used in mail notification or Submission message </div>
      <ul role="tablist" class="sfdc-nav sfdc-nav-tabs">
         <li class="sfdc-active"><a data-toggle="sfdc-tab" role="tab" href="#zgfm-modal-calc-tab-1" aria-expanded="true">Backend</a></li>
         <!-- <li><a data-toggle="sfdc-tab" role="tab" href="#zgfm-modal-calc-tab-2" aria-expanded="true">Frontend</a></li>--> 
      </ul>
      <div class="sfdc-tab-content">
         <div id="zgfm-modal-calc-tab-1" class="sfdc-tab-pane sfdc-in sfdc-active">
            <h3>Fields</h3>
          ${this.formvariables_generateTable_process()}
            <h3>Others</h3>
            <div class="zgfm-modal-calc-wrap-table">
               <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
                  <thead>
                     <tr>
                        <th width="150">variables</th>
                        <th>Code</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Summary of submitted data</td>
                        <td><textarea onclick="this.select();" style="width:298px;">[uifm_var opt="rec_summ"]</textarea></td>
                     </tr>
                     <tr>
                        <td>Form Url</td>
                        <td><textarea onclick="this.select();" style="width:298px;">[uifm_var opt="rec_url_fm"]</textarea></td>
                     </tr>
                     <tr>
                        <td>Form name</td>
                        <td><textarea onclick="this.select();" style="width: 284px;">[uifm_var opt="form_name"]</textarea></td>
                     </tr>
                     <tr>
                        <td>Form record id</td>
                        <td><textarea onclick="this.select();" style="width: 284px;">[uifm_var opt="rec_id"]</textarea></td>
                     </tr>
                     <tr>
                        <td>User IP</td>
                        <td><textarea onclick="this.select();">[uifm_var opt="user_ip"]</textarea></td>
                     </tr>
                     <tr>
                        <td>Logged Username</td>
                        <td><textarea onclick="this.select();">[uifm_var opt="logged_username"]</textarea></td>
                     </tr>
                     <tr>
                        <td>Logged email</td>
                        <td><textarea onclick="this.select();">[uifm_var opt="logged_email"]</textarea></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div id="zgfm-modal-calc-tab-2" class="sfdc-tab-pane" style="display:none;">
            <h3>Fields</h3>
            <div class="zgfm-modal-calc-wrap-table">
               <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
                  <thead>
                     <tr>
                        <th rowspan="2">Field</th>
                        <th colspan="4">Codes</th>
                     </tr>
                     <tr>
                        <th>label</th>
                        <th>input</th>
                     </tr>
                  </thead>
                  <tbody> </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
		`;
		return message;
	}

	formvariables_generateTable_process() {
		let message = ``;
		let counter = 1;
		for (let key in this.availableForms) {
			if (this.availableForms.hasOwnProperty(key)) {
				message += `<div class="uifm_mm_variables_section">`;
				message += `<div class="uifm_formname"><i class="fa fa-th-list" aria-hidden="true"></i> ${this.availableForms[key]['name']}</div>`;
				message += `<div class="zgfm-modal-calc-wrap-table">
                                <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">${this.$uifm('#uifm_mm_frm_variables_field').val()}</th>
                                            <th colspan="5">${this.$uifm('#uifm_mm_frm_variables_codes').val()}</th>
                                        </tr>
                                        <tr>
                                            <th>${this.$uifm('#uifm_mm_frm_variables_label').val()}</th>
                                            <th>${this.$uifm('#uifm_mm_frm_variables_input').val()}</th>
                                            
                                            <th>${this.$uifm('#uifm_mm_frm_variables_quantity').val()}</th>
                                            <th>${this.$uifm('#uifm_mm_frm_variables_wrapper').val()} <a data-original-title="you can use this to show content depending if the field has ticked and has a value. if the field has no been ticked or doesnt have a value. the content inside this shortcode will not appear. " data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

				for (let key2 in this.availableForms[key]['core']['steps_src']) {
					if (this.availableForms[key]['core']['steps_src'].hasOwnProperty(key2)) {
						for (let key3 in this.availableForms[key]['core']['steps_src'][key2]) {
							if (this.availableForms[key]['core']['steps_src'][key2].hasOwnProperty(key3)) {
								let fname = this.availableForms[key]['core']['steps_src'][key2][key3]['field_name'];

								let fid = this.availableForms[key]['core']['steps_src'][key2][key3]['id'];
								let ftype = this.availableForms[key]['core']['steps_src'][key2][key3]['type'];

								switch (parseInt(ftype)) {
									case 6:
									case 7:
									case 12:
									case 13:
									case 15:
									case 22:
									case 23:
									case 24:
									case 25:
									case 26:
									case 28:
									case 29:
									case 30:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input"]</textarea></td>
                                            <td></td>
                                            
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;
										break;
									case 8:
									case 10:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input" atr2="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input" atr2="value"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;
										break;

									case 9:
									case 11:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input" atr2="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input" atr2="value" atr3="format" atr4="comma" ]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;

										break;
									case 40:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;
										break;
									case 16:
									case 17:
									case 18:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input" atr2="value"]</textarea></td>
                                            
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;
										break;
									case 41:
									case 42:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input"]</textarea></td>
                                            
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="qty"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_wrap id="${fid}_${key}"]here goes your content if field have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                        </tr>`;
										break;
									case 21:
										message += `<tr>
                                            <td>${fname}</td>
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="${fid}_${key}" atr1="input"]</textarea></td>
                                            
                                            <td></td>
                                            <td></td>
                                        </tr>`;
										break;
									default:
										break;
								}
							}
						}
					}
				}

				message += `</tbody>
                                </table>
                            </div>`;

				message += `</div>`;
				counter++;
			}
		}
		return message;
	}
	changeNodeName(nodeId, newName) {
		const node = this.editor.getNodeFromId(nodeId);
		if (node) {
			// Update the node name in the data
			node.name = newName;

			// Update the node HTML content if necessary
			node.html = `<div>${newName}</div>`;

			// Re-render the node to reflect changes
			this.editor.updateNodeDataFromId(nodeId, node.data);
			this.editor.updateNodeNameFromId(nodeId, newName);
			// Update the Drawflow DOM element to reflect changes
			const nodeElement = document.querySelector(`#node-${node.id} .drawflow_content_node`);
			if (nodeElement) {
				nodeElement.innerHTML = node.html;
			}

			//this.editor.updateNodeContent(nodeId);
		}
	}

	progresstab_refreshPreview() {
		let progressBar = this.multistepSettings.progressBar;
		
		if (parseInt(progressBar.enable_st) === 0) { 
			return;
		}
		
		let container;
		switch (progressBar.position) {
			case 'outertop':
				container = this.$uifm('.rockfm_form_hook_outertop');

				break;
			case 'innertop':
				container = this.$uifm('.rockfm_form_hook_innertop');
				break;
			default:
				break;
		}
		this.$uifm('.rockfm_form_hook_outertop')
			.find('.zgfm-progress-bar')
			.remove();
		this.$uifm('.rockfm_form_hook_innertop')
			.find('.zgfm-progress-bar')
			.remove();

		let defaultClass;

		let type = progressBar.theme_type;
		var border_focus_str;
		var f_id = 'uifm_frm_wiz_css_head';
		switch (type) {
			case 'default':
				defaultClass = ' uiform-wiztheme0';

				//tab current numtxt color
				var skin_tab_default_txt_bgcolor = this.getUiData4('progressBar', 'theme', type, 'skin_tab_default_txt_bgcolor');

				//tab current background color
				var wiz_active_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');

				//tab current txt color
				var wiz_active_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');

				//tab current numtxt color
				var wiz_active_numtxtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_numtxtcolor');

				//tab inactive background color
				var wiz_inactive_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');

				//tab inactive txt color
				var wiz_inactive_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');

				//tab inactive numtxt color
				var wiz_inactive_numtxtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_numtxtcolor');

				//tab done background color
				var wiz_done_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_done_bgcolor');

				//tab done txt color
				var wiz_done_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_done_txtcolor');

				//tab done numtxt color
				var wiz_done_numtxtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_done_numtxtcolor');

				//tab container bg color
				var wiz_cont_bgcolor = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cont_bgcolor');

				//tab container border color
				var wiz_cont_borcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cont_borcol');

				this.$uifm('#' + f_id + '_tab').remove();
				border_focus_str = '<style type="text/css" id="' + f_id + '_tab">';

				border_focus_str += '.uiform-wiztheme0 {';
				if (parseInt(wiz_cont_borcol.length) != 0) {
					border_focus_str += ' border:1px solid ' + wiz_cont_borcol + ';';
				}
				if (parseInt(wiz_cont_bgcolor.length) != 0) {
					border_focus_str += ' background-color: ' + wiz_cont_bgcolor + ';';
				}
				border_focus_str += '} ';

				/*inactive*/
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li a,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li a:hover,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li a:active {';
				border_focus_str += 'background:' + wiz_inactive_bgcol + ';';
				border_focus_str += 'color:' + wiz_inactive_txtcol + ';';
				border_focus_str += '} ';

				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-number {';
				border_focus_str += 'background-color: ' + skin_tab_default_txt_bgcolor + '!important;';
				border_focus_str += 'color:' + wiz_inactive_numtxtcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-number:before {';
				border_focus_str += ' border-left:14px solid ' + wiz_inactive_bgcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-number:after {';
				border_focus_str += ' border-left:14px solid ' + wiz_inactive_bgcol + '!important;';
				border_focus_str += '}';
				/*active*/
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-current .uifm-number {';
				border_focus_str += 'color:' + wiz_active_numtxtcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-current .uifm-number:before {';
				border_focus_str += 'border-left-color: ' + wiz_active_bgcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-current .uifm-number:after {';
				border_focus_str += 'border-left-color: ' + wiz_active_bgcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-current a,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-current a:hover,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-current a:active {';
				border_focus_str += 'background:' + wiz_active_bgcol + '!important;';
				border_focus_str += 'color:' + wiz_active_txtcol + ';';
				border_focus_str += '} ';

				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-current .uifm-number:before{';
				border_focus_str += ' border-left:14px solid ' + wiz_inactive_bgcol + ';';
				border_focus_str += '} ';
				//completed
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-complete .uifm-number {';
				border_focus_str += 'color: ' + wiz_done_numtxtcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-complete .uifm-number:before {';
				border_focus_str += 'border-left-color: ' + wiz_done_bgcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps .uifm-complete .uifm-number:after {';
				border_focus_str += 'border-left-color: ' + wiz_done_bgcol + '!important;';
				border_focus_str += '}';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-complete a,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-complete a:hover,';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-complete a:active {';
				border_focus_str += 'background:' + wiz_done_bgcol + '!important;';
				border_focus_str += 'color:' + wiz_done_txtcol + ';';
				border_focus_str += '} ';
				border_focus_str += '.uiform-wiztheme0 .zgfm-pbar-steps li.uifm-complete .uifm-number:before{';
				border_focus_str += ' border-left:14px solid ' + wiz_done_bgcol + ';';
				border_focus_str += '} ';

				border_focus_str += '</style>';
				this.$uifm('head').append(border_focus_str);

				break;
			case 'numbers2':
				defaultClass = ' uiform-wiztheme3';

				//tab current background color
				var wiz_active_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');

				//tab current txt color
				var wiz_active_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');

				//tab inactive background color
				var wiz_inactive_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');

				//tab inactive txt color
				var wiz_inactive_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');

				/*active*/
				this.$uifm('#' + f_id + '_tab').remove();
				border_focus_str = '<style type="text/css" id="' + f_id + '_tab">';

				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li::before{';
				border_focus_str += 'background: ' + wiz_inactive_bgcol + ';';
				border_focus_str += 'color:' + wiz_inactive_txtcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li::after{';
				border_focus_str += 'background: ' + wiz_inactive_bgcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li.uifm-current:before,';
				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li.uifm-current:after,';
				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li.uifm-complete:before,';
				border_focus_str += '.uiform-wiztheme3 .zgfm-pbar-steps li.uifm-complete:after{';
				border_focus_str += 'background-color: ' + wiz_active_bgcol + '!important;';
				border_focus_str += 'color:' + wiz_active_txtcol + '!important;';
				border_focus_str += '}';

				border_focus_str += '</style>';
				this.$uifm('head').append(border_focus_str);

				break;
			case 'numbers':
				defaultClass = ' uiform-wiztheme1';

				//tab current background color
				var wiz_active_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');

				//tab current txt color
				var wiz_active_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');

				//tab current numtxt color
				var wiz_active_numtxtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_numtxtcolor');

				//tab current bg numtxt color
				var wiz_active_bg_numtxt = this.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bg_numtxt');

				//tab inactive background color
				var wiz_inactive_bgcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');

				//tab inactive txt color
				var wiz_inactive_txtcol = this.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');

				/*active*/
				this.$uifm('#' + f_id + '_tab').remove();
				border_focus_str = '<style type="text/css" id="' + f_id + '_tab">';
				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-current::before,';
				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-complete::before,';
				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-current .uifm-number,';
				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-complete .uifm-number {';
				border_focus_str += 'border-color:' + wiz_active_bgcol + '!important;';
				border_focus_str += '} ';

				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li .uifm-number{';
				border_focus_str += 'background-color: ' + wiz_active_bg_numtxt + ';';
				border_focus_str += 'color:' + wiz_active_numtxtcol + ';';
				border_focus_str += 'border: 5px solid ' + wiz_inactive_bgcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li .uifm-title{';
				border_focus_str += 'color:' + wiz_inactive_txtcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li::before{';
				border_focus_str += 'border-top: 4px solid ' + wiz_inactive_bgcol + ';';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-complete .uifm-title,';
				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-current .uifm-title {';
				border_focus_str += 'color:' + wiz_active_txtcol + '!important;';
				border_focus_str += '}';

				border_focus_str += '.uiform-wiztheme1 .zgfm-pbar-steps li.uifm-complete .uifm-number:before{';
				border_focus_str += 'background-color: ' + wiz_active_bg_numtxt + ';';
				border_focus_str += '}';

				border_focus_str += '</style>';
				this.$uifm('head').append(border_focus_str);

				break;
			default:
				break;
		}

		let progressBarObj = container.find('.zgfm-progress-bar');

		if (!progressBarObj.length) {
			container.append(`<div class="zgfm-progress-bar">
				
			</div>`);
			progressBarObj = container.find('.zgfm-progress-bar');
		}
		progressBarObj.html('');
		progressBarObj.append(`
			<div class="${defaultClass}">
					<ul class="zgfm-pbar-steps">     
	                </ul>
				</div>
		`);

		progressBarObj.find('.zgfm-pbar-steps').html('');

		//verify if form is assigned to progress bar
		var setCurrentStatus = false;
		var CurrentStatusGiven = false;

		if (this.multistepSettings['progressBar']['progressBarAssigned'].includes(String(this.activeFormId))) {
			setCurrentStatus = true;
		}

		//add steps
		let counter = 1;
		for (const key in progressBar.steps) {
			if (progressBar.steps.hasOwnProperty(key)) {
				const element = progressBar.steps[key];

				let className = '';
				if (setCurrentStatus === true) {
					if (element['forms'].includes(String(this.activeFormId))) {
						className = 'uifm-current';
						CurrentStatusGiven = true;
					}

					if (CurrentStatusGiven === false) {
						className = 'uifm-complete';
					}
				}

				let content;

				switch (type) {
					case 'numbers2':
						content = `
						<li data-index="${element.id}" class="${className}"></li>
					`;
						break;
					default:
						content = `
						<li data-index="${element.id}" class="${className}">
							<a >
								<span class="uifm-number">${counter}</span>
								<span class="uifm-title">${element.title}</span>
							</a>
						</li>
					`;
						break;
				}

				progressBarObj.find('.zgfm-pbar-steps').append(content);
			}
			counter++;
		}
	}
	progresstab_tabManualEvt(element) {
		let el = this.$uifm(element);

		let index = el.closest('.uifm_frm_skin_tab_content').attr('data-tab-key');
		this.setUiData4('progressBar', 'steps', index, 'title', el.val());

		//refresh preview
		this.progresstab_refreshPreview();
	}
	progresstab_addNewTab() {
		let progressBar = this.multistepSettings.progressBar;
		var order = parseInt(Object.keys(progressBar.steps).length);
		var newNum = zgfm_back_helper.generateUniqueID(5);
		/*var wiz_theme_typ = progressBar.theme_type;
		var stringvar;*/
		/*switch (wiz_theme_typ) {
			case 'default':
			case 'numbers':
				//tab heads
				stringvar = `
						<li class="uifm-current">
						<a data-tab-key="${newNum}">
						<span class="uifm-number">${order + 1}</span>
						<span class="uifm-title">Tab title ${order + 1}</span>
						</a>
						</li>
					`;

				this.$uifm('.uiform-steps')
					.find('.uifm-current')
					.removeClass('uifm-current')
					.addClass('uifm-disabled');
				this.$uifm('.uiform-steps').append(stringvar);
				break;
		}*/

		if (order === 0) {
			this.multistepSettings.progressBar.steps = {};
		}

		this.addIndexUiData2('progressBar', 'steps', newNum);

		let newStep = {
			title: `Tab title ${order + 1}`,
			forms: [],
			order: order,
			id: newNum,
		};
		this.setUiData3('progressBar', 'steps', newNum, newStep);

		//tab settings
		this.progresstab_addTabController(newStep);

		//add select2
		this.progresstab_select2_refresh();

		//refresh preview
		this.progresstab_refreshPreview();
	}
	progresstab_cleanTabs() {
		//settings
		this.$uifm('#uifm_frm_skin_tabs_box').html('');

		//core
		this.multistepSettings.progressBar.steps = {};

		//preview
		this.progresstab_refreshPreview();
	}
	progresstab_deleteTab(element) {
		const self = this;
		var el = this.$uifm(element);
		var el_num = el.closest('.uifm_frm_skin_tab_content').data('tab-key');

		//remove settings
		el.closest('.uifm_frm_skin_tab_content').remove();

		//delete previous
		let steps = this.getUiData3('progressBar', 'steps', el_num);

		for (const key in steps['forms']) {
			const element = steps['forms'][key];
			let arr = this.multistepSettings['progressBar'].progressBarAssigned;
			let index = arr.indexOf(element);
			if (index > -1) {
				this.multistepSettings['progressBar'].progressBarAssigned.splice(index, 1);
			}
		}

		//delete main data
		this.delUiData3('progressBar', 'steps', el_num);

		//refresh preview
		this.progresstab_refreshPreview();
	}
	progresstab_addTabController(newStep) {
		const self = this;
		var tmp_tmpl = wp.template('zgfm-frm-pbar-templates');
		var tmpTpl2 = this.$uifm('<div class="uifm_temporal_div"></div>');
		if (newStep.title === '') {
			newStep.title = 'Tab title ' + (parseInt(newStep.order) + 1);
		}

		tmpTpl2.append(tmp_tmpl());
		tmpTpl2.find('.uifm_frm_skin_tab_content').attr('data-tab-key', newStep.id);
		tmpTpl2.find('.uifm_frm_skin_tab_title_evt').attr('id', 'uifm_frm_skin_tab' + newStep.id + '_title');
		tmpTpl2.find('.uifm_frm_skin_tab_forms_evt').attr('id', 'uifm_frm_skin_tab' + newStep.id + '_forms');

		tmpTpl2.find('.uifm_frm_skin_tab_title_evt').val(newStep.title);
		tmpTpl2
			.find('.uifm_frm_skin_tab_title_evt')
			.parent()
			.find('label span')
			.html(parseInt(newStep.order) + 1);

		this.$uifm('#uifm_frm_skin_tabs_box').append(tmpTpl2.find('.uifm_frm_skin_tab_content'));

		//add options to select list
		if (newStep['forms'].length > 0) {
			let tmpOptions = this.progresstab_select2_data_load();
			let obj = this.$uifm('#uifm_frm_skin_tabs_box').find('#uifm_frm_skin_tab' + newStep.id + '_forms');
			obj.empty();
			tmpOptions.forEach(function(option) {
				obj.append(
					self.$uifm('<option>', {
						value: option.id,
						text: option.text,
					})
				);
			});

			obj.val(this.multistepSettings['progressBar']['steps'][newStep.id]['forms']);
		}
	}

	progresstab_select2_onUnselect(key, idToRemove) {
		let arr = this.multistepSettings['progressBar'].progressBarAssigned;
		let index = arr.indexOf(idToRemove);

		if (index > -1) {
			this.multistepSettings['progressBar'].progressBarAssigned.splice(index, 1);
		}

		let currentForms = this.multistepSettings['progressBar']['steps'][key]['forms'];
		index = currentForms.indexOf(idToRemove);

		if (index > -1) {
			this.multistepSettings['progressBar']['steps'][key]['forms'].splice(index, 1);
		}
	}
	progresstab_select2_onChange(inputs, key) {
		let currentForms = this.multistepSettings['progressBar']['steps'][key]['forms'];
		for (let index = 0; index < inputs.length; index++) {
			const element = inputs[index];

			if (!this.multistepSettings['progressBar'].progressBarAssigned.includes(element)) {
				currentForms.push(element);
				this.multistepSettings['progressBar'].progressBarAssigned.push(element);
			}
		}
		this.multistepSettings['progressBar']['steps'][key]['forms'] = currentForms;

		this.progresstab_select2_refresh();

		//refresh preview
		this.progresstab_refreshPreview();
	}

	progresstab_select2_refresh() {
		const self = this;
		let objs = this.$uifm('.uifm_frm_skin_tab_forms_evt');

		objs.each(function(index, element) {
			element = self.$uifm(element);

			if (element.data('select2')) {
				element.select2('destroy');
			}

			element.find('option').each(function() {
				let optionTmp = self.$uifm(this);

				if (self.multistepSettings['progressBar'].progressBarAssigned.includes(optionTmp.val())) {
					optionTmp.attr('disabled', true);
				} else {
					optionTmp.attr('disabled', false);
				}
			});
			//add event
			// Reinitialize the Select2 element

			element.select2({
				placeholder: 'Select an option',
				theme: 'classic',
				width: '100%',
				data: self.progresstab_select2_data(),
			});

			element.on('change.select2', function(e) {
				if (e) {
					e.stopPropagation();
					e.preventDefault();
				}
				let id = self.$uifm(e.target).attr('id');

				let currentObj = self.$uifm(`#${id}`);
				let inputs = currentObj.val();
				let key = currentObj.closest('.uifm_frm_skin_tab_content').attr('data-tab-key');
				self.progresstab_select2_onChange(inputs, key);

				//fix isssue: scrollbar stuck when selecting
				self.$uifm(this).select2('open');
				self.$uifm(this).select2('close');
			});

			element.on('select2:unselect', function(e) {
				if (e) {
					e.stopPropagation();
					e.preventDefault();
				}
				var data = e.params.data;

				let id = self.$uifm(e.target).attr('id');

				let currentObj = self.$uifm(`#${id}`);
				let inputs = currentObj.val();
				let key = currentObj.closest('.uifm_frm_skin_tab_content').attr('data-tab-key');

				self.progresstab_select2_onUnselect(key, data.id);
				self.progresstab_select2_onChange(inputs, key);

				//closing select list
				//fix isssue: scrollbar stuck when unselecting
				self.$uifm(this).select2('open');
				self.$uifm(this).select2('close');
			});
		});
	}
	progresstab_select2_data_load() {
		let newArr = [];
		for (const key in this.availableForms) {
			if (Object.hasOwnProperty.call(this.availableForms, key)) {
				const element = this.availableForms[key];

				newArr.push({
					id: element.id,
					text: element.name,
				});
			}
		}

		return newArr;
	}
	progresstab_select2_data() {
		let newArr = [];
		for (const key in this.availableForms) {
			if (Object.hasOwnProperty.call(this.availableForms, key)) {
				const element = this.availableForms[key];

				if (!this.multistepSettings['progressBar'].progressBarAssigned.includes(element.id)) {
					newArr.push({
						id: element.id,
						text: element.name,
					});
				}
			}
		}

		return newArr;
	}
	progresstab_hidePreview() {
		let progressBar = this.multistepSettings.progressBar;
		let container;
		switch (progressBar.position) {
			case 'outertop':
				container = this.$uifm('.rockfm_form_hook_outertop');
				break;
			case 'innertop':
				container = this.$uifm('.rockfm_form_hook_innertop');
				break;
			default:
				break;
		}

		let progressBarObj = container.find('.zgfm-progress-bar');
		if (progressBarObj.length) {
			progressBarObj.hide();
		}
	}
	progresstab_enableStatus() {
		var wiz_st = this.$uifm('#uifm_frm_pbar_st').prop('checked') ? 1 : 0;
		//update to main data
		this.multistepSettings['progressBar']['enable_st'] = wiz_st;
		if (wiz_st === 1) {
			//show options
			this.$uifm('.uiform_frm_pbar_main_content').show();

			//show preview
			this.progresstab_refreshPreview();
		} else {
			//hide options
			this.$uifm('.uiform_frm_pbar_main_content').hide();

			//hide preview
			this.progresstab_hidePreview();
		}
	}
	progresstab_updateSettingsTheme(fval) {
		this.$uifm('.zgfm_pbar_theme_options_container').hide();
		switch (fval) {
			case 'numbers':
				this.$uifm('#zgfm_pbar_theme_options_number').show();

				break;
			case 'numbers2':
				this.$uifm('#zgfm_pbar_theme_options_number2').show();
				break;
			case 'default':
				this.$uifm('#zgfm_pbar_theme_options_default').show();

				break;
		}
	}

	progresstab_loadSettings(self, skipType = true, skipSteps = true) {
		try {
			const self = this;
			//loading steps
			if (!skipSteps) {
				self.$uifm('#uifm_frm_skin_tabs_box').html('');

				let steps = self.getUiData2('progressBar', 'steps');
				for (const key in steps) {
					if (Object.hasOwnProperty.call(steps, key)) {
						const element = steps[key];
						self.progresstab_addTabController(element);
					}
				}

				self.progresstab_select2_refresh();
			}

			var status = parseInt(self.getUiData2('progressBar', 'enable_st')) === 1 ? true : false;
			self.$uifm('#uifm_frm_pbar_st').bootstrapSwitchZgpb('state', status);

			var type = self.getUiData2('progressBar', 'theme_type');

			if (type && !skipType) {
				self.$uifm('#uifm_frm_pbar_theme_type').val(type);
			}

			var position = self.getUiData2('progressBar', 'position');
			self.$uifm('#uifm_frm_pbar_theme_position').val(position);
			switch (type) {
				case 'default':
					//tab current global background color
					var skin_tab_default_txt_bgcolor = self.getUiData4('progressBar', 'theme', type, 'skin_tab_default_txt_bgcolor');

					if (skin_tab_default_txt_bgcolor) {
						self
							.$uifm('#uifm_frm_pbar_tab_inactive_bgcolor')
							.parent()
							.colorpicker('setValue', skin_tab_default_txt_bgcolor);
						self.$uifm('#uifm_frm_pbar_tab_inactive_bgcolor').val(skin_tab_default_txt_bgcolor);
					}

					//tab current background color
					var wiz_active_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');

					if (wiz_active_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_active_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_active_bgcol);
						self.$uifm('#uifm_frm_pbar_tab_active_bgcolor').val(wiz_active_bgcol);
					}
					//tab current txt color
					var wiz_active_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');
					if (wiz_active_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_active_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_active_txtcol);
						self.$uifm('#uifm_frm_pbar_tab_active_txtcolor').val(wiz_active_txtcol);
					}
					//tab current numtxt color
					var wiz_active_numtxtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_numtxtcolor');
					if (wiz_active_numtxtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_active_numtxtcolor')
							.parent()
							.colorpicker('setValue', wiz_active_numtxtcol);
						self.$uifm('#uifm_frm_pbar_tab_active_numtxtcolor').val(wiz_active_numtxtcol);
					}

					//tab inactive background color
					var wiz_inactive_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');
					if (wiz_inactive_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_inactive_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_bgcol);
						self.$uifm('#uifm_frm_pbar_tab_inactive_bgcolor').val(wiz_inactive_bgcol);
					}
					//tab current txt color
					var wiz_inactive_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');
					if (wiz_inactive_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_inactive_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_txtcol);
						self.$uifm('#uifm_frm_pbar_tab_inactive_txtcolor').val(wiz_inactive_txtcol);
					}
					//tab inactive numtxt color
					var wiz_inactive_numtxtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_numtxtcolor');
					if (wiz_inactive_numtxtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_inactive_numtxtcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_numtxtcol);
						self.$uifm('#uifm_frm_pbar_tab_inactive_numtxtcolor').val(wiz_inactive_numtxtcol);
					}
					//tab done background color
					var wiz_done_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_done_bgcolor');
					if (wiz_done_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_done_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_done_bgcol);
						self.$uifm('#uifm_frm_pbar_tab_done_bgcolor').val(wiz_done_bgcol);
					}
					//tab done txt color
					var wiz_done_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_done_txtcolor');
					if (wiz_done_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_done_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_done_txtcol);
						self.$uifm('#uifm_frm_pbar_tab_done_txtcolor').val(wiz_done_txtcol);
					}
					//tab done numtxt color
					var wiz_done_numtxtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_done_numtxtcolor');
					if (wiz_done_numtxtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_done_numtxtcolor')
							.parent()
							.colorpicker('setValue', wiz_done_numtxtcol);
						self.$uifm('#uifm_frm_pbar_tab_done_numtxtcolor').val(wiz_done_numtxtcol);
					}

					//tab container bg color
					var wiz_cont_bgcolor = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cont_bgcolor');
					if (wiz_cont_bgcolor) {
						self
							.$uifm('#uifm_frm_pbar_tab_cont_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_cont_bgcolor);
						self.$uifm('#uifm_frm_pbar_tab_cont_bgcolor').val(wiz_cont_bgcolor);
					}
					//tab container border color
					var wiz_cont_borcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cont_borcol');
					if (wiz_cont_borcol) {
						self
							.$uifm('#uifm_frm_pbar_tab_cont_borcol')
							.parent()
							.colorpicker('setValue', wiz_cont_borcol);
						self.$uifm('#uifm_frm_pbar_tab_cont_borcol').val(wiz_cont_borcol);
					}

					break;
				case 'numbers':
					//tab current background color
					var wiz_active_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');
					if (wiz_active_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab2_active_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_active_bgcol);
						self.$uifm('#uifm_frm_pbar_tab2_active_bgcolor').val(wiz_active_bgcol);
					}
					//tab current txt color
					var wiz_active_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');
					if (wiz_active_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab2_active_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_active_txtcol);
						self.$uifm('#uifm_frm_pbar_tab2_active_txtcolor').val(wiz_active_txtcol);
					}
					//tab current numtxt color
					var wiz_active_numtxtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_numtxtcolor');
					if (wiz_active_numtxtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab2_active_numtxtcolor')
							.parent()
							.colorpicker('setValue', wiz_active_numtxtcol);
						self.$uifm('#uifm_frm_pbar_tab2_active_numtxtcolor').val(wiz_active_numtxtcol);
					}
					//tab current bg wrap numtxt color
					var wiz_active_bg_numtxt = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bg_numtxt');

					if (wiz_active_bg_numtxt) {
						self
							.$uifm('#uifm_frm_pbar_tab2_active_bg_numtxt')
							.parent()
							.colorpicker('setValue', wiz_active_bg_numtxt);
						self.$uifm('#uifm_frm_pbar_tab2_active_bg_numtxt').val(wiz_active_bg_numtxt);
					}

					//tab inactive background color
					var wiz_inactive_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');
					if (wiz_inactive_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab2_inactive_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_bgcol);
						self.$uifm('#uifm_frm_pbar_tab2_inactive_bgcolor').val(wiz_inactive_bgcol);
					}
					//tab current txt color
					var wiz_inactive_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');
					if (wiz_inactive_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab2_inactive_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_txtcol);
						self.$uifm('#uifm_frm_pbar_tab2_inactive_txtcolor').val(wiz_inactive_txtcol);
					}

					break;
				case 'numbers2':
					//tab current background color
					var wiz_active_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_bgcolor');
					if (wiz_active_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab3_active_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_active_bgcol);
						self.$uifm('#uifm_frm_pbar_tab3_active_bgcolor').val(wiz_active_bgcol);
					}
					//tab current txt color
					var wiz_active_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_cur_txtcolor');
					if (wiz_active_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab3_active_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_active_txtcol);
						self.$uifm('#uifm_frm_pbar_tab3_active_txtcolor').val(wiz_active_txtcol);
					}

					//tab inactive background color
					var wiz_inactive_bgcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_bgcolor');
					if (wiz_inactive_bgcol) {
						self
							.$uifm('#uifm_frm_pbar_tab3_inactive_bgcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_bgcol);
						self.$uifm('#uifm_frm_pbar_tab3_inactive_bgcolor').val(wiz_inactive_bgcol);
					}
					//tab current txt color
					var wiz_inactive_txtcol = self.getUiData4('progressBar', 'theme', type, 'skin_tab_inac_txtcolor');
					if (wiz_inactive_txtcol) {
						self
							.$uifm('#uifm_frm_pbar_tab3_inactive_txtcolor')
							.parent()
							.colorpicker('setValue', wiz_inactive_txtcol);
						self.$uifm('#uifm_frm_pbar_tab3_inactive_txtcolor').val(wiz_inactive_txtcol);
					}

					break;
			}
		} catch (ex) {
			/* end try*/
			console.error(' progresstab_setDataToTabSettings : ', ex.message);
		}

		self.progresstab_updateSettingsTheme(self.getUiData2('progressBar', 'theme_type'));
	}
}

return ZgfmManager;
}));
