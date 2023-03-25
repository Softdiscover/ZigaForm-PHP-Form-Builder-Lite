$uifm( document ).ready( function( $ ){

	// Add Google Fonts and Chosen to select elements
	// $('select.sfm').stylesFontMenu();

});

(function( $, google_fonts, standard_fonts ) {
	/**
	 * Build Google Fonts option list only once
	 */
	var standard_options = "<optgroup label='Standard Fonts'>",
		google_options = "<optgroup class='google-fonts' label='Google Fonts'>",
		google_styles = '<style>',
		is_readme = ( $('#styles-font-menu-readme').length > 0 ),
		i;

	for ( i=0; i < standard_fonts.fonts.length; i++ ){
		standard_options += "<option class='sf " + standard_fonts.fonts[i].classname + "' value='" + JSON.stringify( standard_fonts.fonts[i] ) + "'>" + standard_fonts.fonts[i].name + "</option>";
	}

	for ( i=0; i < google_fonts.fonts.length; i++ ){
		// Don't show if no preview
		if ( !is_readme && undefined === google_fonts.fonts[i].png_url ) {
			continue;
		}

		google_options += "<option class='gf " + google_fonts.fonts[i].classname + "' value='" + JSON.stringify( google_fonts.fonts[i] ) + "'>" + google_fonts.fonts[i].name + "</option>";

		google_styles += ".sfm ." + google_fonts.fonts[i].classname + " { background-image: url(" + rockfm_vars.uifm_sfm_baseurl+google_fonts.fonts[i].png_url + "); }\r";
	}

	standard_options += "</optgroup>";
	google_options += "</optgroup>";
	google_styles += "</style>";

	$('head').append( google_styles );


	/**
	 * Define jQuery plugin to act on and attach to select elements
	 */
	$.stylesFontMenu = function(element, options) {

		var plugin = this,
				$element = $(element);

		/**
		 * Default settings. Override by passing object to stylesFontMenu()
		 */
		var defaults = {
					"chosen_settings": {
						"allow_single_deselect": true,
						"inherit_select_classes": true,
						"width": "255px"
					}
				};

		plugin.settings = {};

		plugin.init = function() {
			plugin.settings = $.extend({}, defaults, options);

			plugin.populate_google_fonts();

			plugin.set_selected_option();

			$element.chosen( plugin.settings.chosen_settings );
		};

		plugin.populate_google_fonts = function() {
			$element
				.append( standard_options )
				.append( google_options )
				.each( function(){
					// If a selected option is set in <option data-selected="XXX">, select it.
					// @todo Not sure why this is here. Carried over from old Styles text selector. Check back when connecting to database.
					var selected = $(this).data('selected');
					$(this).find( 'option[value="' + selected + '"]' ).attr('selected', 'selected');
				} );
		};

		plugin.set_selected_option = function() {
			var value = JSON.stringify( $element.data( 'selected' ) );
	
			$element.find('option').each( function(){
				if ( value == $(this).val() ) {
					$(this).attr('selected', 'selected');
				}

			});
		};
                plugin.uifm_load_font = function(value) {
			// Clear font-family if nothing selected
			if ( '' === value ) {
				//$target_elements.css('font-family', '');
				return '';
			}

			// Convert JSON string value to JSON object
			var font = JSON.parse( value );
                        
			plugin.maybe_add_at_import_to_head( font );

			// Update font-family
			//$target_elements.css('font-family', font.family );
                        return font;
		};
                plugin.uifm_preview_font_change = function() {
			// Clear font-family if nothing selected
			if ( '' === $element.val() ) {
				//$target_elements.css('font-family', '');
				return '';
			}

			// Convert JSON string value to JSON object
			var font = JSON.parse( $element.val() );
			plugin.maybe_add_at_import_to_head( font );

			// Update font-family
			//$target_elements.css('font-family', font.family );
                        return font;
		};
		plugin.preview_font_change = function( $target_elements ) {
			// Clear font-family if nothing selected
			if ( '' === $element.val() ) {
				$target_elements.css('font-family', '');
				return true;
			}

			// Convert JSON string value to JSON object
			var font = JSON.parse( $element.val() );

			plugin.maybe_add_at_import_to_head( font );

			// Update font-family
			$target_elements.css('font-family', font.family );
		};

		plugin.maybe_add_at_import_to_head = function( font ) {
			// Add @import to <head> if needed 
			if ( undefined !== font.import_family ) {
				var atImport = google_fonts.import_template.replace( '@import_family@', font.import_family );
				$( '<style>' ).append( atImport ).appendTo( 'head' );
			}
		};

		plugin.init();

	};

	/**
	 * Attach this plugin instance to the target elements
	 * Access later with $('select.styles-font-menu').data('stylesFontMenu');
	 */
	$.fn.stylesFontMenu = function(options) {
		return this.each(function() {
			if (undefined === $(this).data('stylesFontMenu')) {
				var plugin = new $.stylesFontMenu(this, options);
				$(this).data('stylesFontMenu', plugin);
			}
		});
	};

})( $uifm, styles_google_options, styles_standard_fonts );