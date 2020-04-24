(function ($) {
	var zgpbld_grid = function (element, options) {
		var elem = $(element);
		var obj = this;
		var drag = null;
		var ID = elem.attr('id');
		var t; //grid_container
		var M = Math;
		var cur_side = null;
		var defaults = {
			data: {}
		};
		var settings = $.extend(true, {}, defaults, options);
		// Public method - can be called from client code
		this.publicMethod = function () {};

		// Private method - can only be called from within this object
		this.events_trigger = function () {
			//on events
		};

		this.drag_init = function (e) {
			try {
				var target = $(e.target).closest('.zgpb-fl-gs-block-style');
				//cur_side=target.closest('.zgpb-fl-gd-drag-line').attr('data-zgpb-side');

				var o = target.data(ID); //retrieve col's data
				g = t.g[o.i]; //current table

				//the initial position is kept
				g.ox = e.pageX; //drag position
				g.l = target.position().left; //left position of th column

				$(e.target).closest('.zgpb-fl-gridsystem-opt').css('display', 'block');
				$(e.target).closest('.zgpb-fl-gridsystem').find('.zgpb-fl-gd-opt-icon-handler').removeCss('background', '#CEFBF8');
				$(e.target).closest('.zgpb-fl-gridsystem-opt').find('.zgpb-fl-gd-opt-icon-handler').css('background', '#CEFBF8');

				//attach events

				$(document)
					.bind('mousemove.' + ID, obj.drag_move)
					.bind('mouseup.' + ID, obj.drag_over); //mousemove and mouseup events are bound
				$('head').append(
					"<style id='zgpb-grid-head-css' type='text/css'>*{cursor:e-resize!important;   -webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}</style>"
				); //change the mouse cursor
				drag = g;

				//debug
				paint_variables();
			} catch (ex) {
				/* end try*/
				console.error(' error drag_init ', ex.message);
			}
		};

		this.drag_move = function (e) {
			try {
				if (!drag) return;
				var x = e.pageX - drag.ox + drag.l; //next position according to horizontal mouse position increment

				var i = drag.i; //cell's min width

				drag.x = x;

				if (parseFloat(e.pageX) > parseFloat(drag.ox)) {
					syncCols(t, i, true);
				} else {
					syncCols(t, i, false);
				}

				// drag_order_columns(parseInt(drag.cur_igrid),parseInt(drag.i));

				//debug
				paint_variables();

				return false; //prevent text selection
			} catch (ex) {
				/* end try*/
				console.error(' error drag_move ', ex.message);
			}
		};
		var syncCols = function (t, i, right) {
			try {
				var inc,
					possible_index = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
					w,
					box_min_width,
					temp_col2,
					c = t.c[i],
					c2 = t.c[i + 1];

				if (right === true) {
					inc = drag.x - drag.l;

					w = c.w + inc;
					var w2 = c2.w - inc; //their new width is obtained

					box_min_width = (parseFloat(t.width()) * 8.333) / 100;
					temp_col2 = parseFloat(c.width()) + parseFloat(box_min_width) / 2;
				} else {
					inc = drag.l - drag.x;

					w = c.w - inc;
					var w2 = c2.w + inc; //their new width is obtained

					box_min_width = (parseFloat(t.width()) * 8.333) / 100;
					temp_col2 = parseFloat(c2.width()) + parseFloat(box_min_width) / 2;
				}

				if (right === true) {
					if (parseFloat(w) > temp_col2) {
						var c_new_igrid = parseInt(c.cur_igrid) + 1;
						var c2_new_igrid = parseInt(c2.cur_igrid) - 1;

						if ($.inArray(c_new_igrid, possible_index) > -1 && $.inArray(c2_new_igrid, possible_index) > -1) {
							c.attr('class', 'zgpb-fl-gs-block-style sfdc-col-md-' + c_new_igrid);
							c2.attr('class', 'zgpb-fl-gs-block-style sfdc-col-md-' + c2_new_igrid);

							c.cur_igrid = parseInt(c.cur_igrid) + 1;
							c2.cur_igrid = parseInt(c2.cur_igrid) - 1;

							c.attr('data-zgpb-width', c.width());
							c2.attr('data-zgpb-width', c2.width());

							c.attr('data-zgpb-blockcol', c.cur_igrid);
							c2.attr('data-zgpb-blockcol', c2.cur_igrid);
						}
					}
				} else {
					if (parseFloat(w2) > temp_col2) {
						var c_new_igrid = parseInt(c.cur_igrid) - 1;
						var c2_new_igrid = parseInt(c2.cur_igrid) + 1;

						if ($.inArray(c_new_igrid, possible_index) > -1 && $.inArray(c2_new_igrid, possible_index) > -1) {
							c.attr('class', 'zgpb-fl-gs-block-style sfdc-col-md-' + c_new_igrid);
							c2.attr('class', 'zgpb-fl-gs-block-style sfdc-col-md-' + c2_new_igrid);

							c.cur_igrid = parseInt(c.cur_igrid) - 1;
							c2.cur_igrid = parseInt(c2.cur_igrid) + 1;

							c.attr('data-zgpb-width', c.width());
							c2.attr('data-zgpb-width', c2.width());

							c.attr('data-zgpb-blockcol', c.cur_igrid);
							c2.attr('data-zgpb-blockcol', c2.cur_igrid);
						}
					}
				}

				//setNewColValues(w,w2);
			} catch (ex) {
				/* end try*/
				console.error(' error syncCols ', ex.message);
			}
		};

		this.drag_over = function (e) {
			try {
				$(document)
					.unbind('mousemove.' + ID)
					.unbind('mouseup.' + ID);
				$('#zgpb-grid-head-css').remove();

				drag = null;
				var c_tmp;

				$.each(t.c, function (index, element) {
					t.c[index].w = t.c[index].width();
				});

				$(e.target).closest('.zgpb-fl-gridsystem-opt').removeCss('display');
				$(e.target).closest('.zgpb-fl-gridsystem-opt').find('.zgpb-fl-gd-opt-icon-handler').removeCss('background', '#CEFBF8');

				//debug
				paint_variables();
			} catch (ex) {
				/* end try*/
				console.error(' error drag_over ', ex.message);
			}
		};

		var paint_variables = function () {
			try {
				return;
				var output = '<ul>';
				$.each(t.c, function (index, element) {
					output += '<li>index: ' + index + ' <=> w: ' + t.c[index].w + '</li>';
				});
				output += '</ul>';
				$('#table-variables').html(output);
			} catch (ex) {
				/* end try*/
				console.error(' error drag_over ', ex.message);
			}
		};

		this.drag_cancel = function () {};

		this.onHover = function (e) {
			try {
				if (e) {
					e.stopPropagation();
					e.preventDefault();
				}
				var tmp_target_id = $(e.target).closest('.zgpb-field-template').attr('id');
				var tmp_target_type = $(e.target).closest('.zgpb-field-template').attr('data-typefield');

				/*just temp solution*/
				switch (parseInt(tmp_target_type)) {
					case 1:
					case 2:
					case 3:
					case 4:
					case 5:
					case 6:
						//columns

						/*adding quick option to column*/

						var tmp_tmpl = wp.template('zgpb-quick-options');
						if (parseInt($(this).find('.zgpb-fields-quick-options').length) === 0) {
							$(this).append(
								tmp_tmpl({
									type: tmp_target_type,
									id: tmp_target_id
								})
							);
						}
						break;
					default:
						var tmp_tmpl = wp.template('zgpb-quick-options');
						if (parseInt($(this).find('.zgpb-fields-quick-options').length) === 0) {
							$(this).append(
								tmp_tmpl({
									type: $('#' + ID).attr('data-typefield'),
									id: tmp_target_id
								})
							);
						}
						break;
				}

				/*adding hover highlight*/

				var tmp_tmpl2 = wp.template('zgpb-field-hover-hlight');

				if (parseInt($(this).find('.zgpb-fields-hover-hlight-box').length) === 0) {
					$(this).append(tmp_tmpl2());
				}

				if (drag) return;

				/*remove highlight hover label*/
				if ($('#zgpb-editor-container').find('.zgpb-fl-gs-block-style-hover').length) {
					$('#zgpb-editor-container').find('.zgpb-fl-gs-block-style-hover').removeClass('zgpb-fl-gs-block-style-hover');
				}

				$(e.target).closest('.zgpb-fl-gs-block-style').addClass('zgpb-fl-gs-block-style-hover');
			} catch (ex) {
				/* end try*/
				console.error(' error onHover ', ex.message);
			}
		};

		this.offHover = function (e) {
			try {
				if (e) {
					e.stopPropagation();
					e.preventDefault();
				}

				if (parseInt($(this).find('.zgpb-fields-quick-options').length) > 0) {
					$(this).find('.zgpb-fields-quick-options').remove();
				}

				if (parseInt($(this).find('.zgpb-fields-hover-hlight-box').length) > 0) {
					$(this).find('.zgpb-fields-hover-hlight-box').remove();
				}

				if (drag) return;
				$(e.target).closest('.zgpb-fl-gs-block-style').removeClass('zgpb-fl-gs-block-style-hover');
			} catch (ex) {
				/* end try*/
				console.error(' error offHover ', ex.message);
			}
		};

		this.onWholeHover = function (e) {
			/*adding quick option to column*/

			try {
				var tmp_tmpl = wp.template('zgpb-quick-options-2');
				if (parseInt($(this).find('.zgpb-fields-quick-options2').length) === 0) {
					$(this).append(
						tmp_tmpl({
							type: $('#' + ID).attr('data-typefield'),
							id: ID
						})
					);
				}
			} catch (ex) {
				/* end try*/
				console.error(' error offHover ', ex.message);
			}
		};

		this.offWholeHover = function (e) {
			try {
				if (parseInt($(this).find('.zgpb-fields-quick-options2').length) > 0) {
					$(this).find('.zgpb-fields-quick-options2').remove();
				}
			} catch (ex) {
				/* end try*/
				console.error(' error offWholeHover ', ex.message);
			}
		};

		this.init = function () {
			this.events_trigger();

			t = elem;
			t.g = [];
			t.c = [];
			t.w = t.width();

			createGrips();
			//debug
			//paint_variables();
		};

		var createGrips = function () {
			try {
				var cols = t.find(' .sfdc-row > .zgpb-fl-gs-block-style');

				t.cols = cols;
				t.ln = cols.length;

				//events
				//t.on( "mouseenter", obj.onWholeHover );
				//t.on( "mouseleave", obj.offWholeHover );

				cols.each(function (i) {
					var c = $(this);
					var g = $(this);
					g.t = t;
					g.i = i;
					g.c = c;
					g.w = g.width();

					c.w = c.width();
					c.blocks = c.attr('data-blocks'); //some values are stored in the grip's node data
					c.attr('data-zgpb-width', c.width());
					g.cur_igrid = g.attr('class').match(/\d+/)[0];
					c.cur_igrid = c.attr('class').match(/\d+/)[0];
					c.mpercent = c.attr('data-maxpercent');
					t.g.push(g);
					t.c.push(c);

					//if (i < t.ln-1)
					// {

					g.find('.zgpb-fl-gd-drag-line').mousedown(obj.drag_init).mouseup(obj.drag_cancel); //bind the mousedown event to start dragging
					//}
					g.data(ID, { i: i, t: t.attr(ID) });

					//events
					$(this).on('mouseenter', obj.onHover);
					$(this).on('mouseleave', obj.offHover);
				});
			} catch (ex) {
				/* end try*/
				console.error(' error createGrips ', ex.message);
			}
		};

		this.init();
	};

	$.fn.zgpbld_grid = function (options) {
		return this.each(function () {
			var element = $(this);

			// Return early if this element already has a plugin instance
			if (element.data('zgpbld_grid')) return;

			// pass options to plugin constructor
			var myplugin = new zgpbld_grid(this, options);

			// Store plugin object in this element's data
			element.data('zgpbld_grid', myplugin);
		});
	};
})($uifm);
