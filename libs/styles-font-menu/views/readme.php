<div class="wrap" id="styles-font-menu-readme">

	<?php screen_icon(); ?>
	<h2><?php _e('Font Menu', 'styles-font-menu'); ?></h2>

	<p><a href="#" id="generate-previews">Generate Missing Font Previews</a></p>

	<h3 class="example-output">Example output</h3>
	<p><?php do_action( 'styles_font_menu' ); ?></p>

	<?php echo Markdown( file_get_contents( dirname( dirname( __FILE__ ) ) . '/readme.md' ) ); ?>


</div>

<script>

	/**
	 * Change heading font-family on menu change event
	 */
	(function($){

		var $headings = $( 'h2,h3', '#styles-font-menu-readme' );
		
		$('select.sfm').change( function(){
			$(this).data('stylesFontMenu').preview_font_change( $headings );
		});

	})(jQuery);

	/**
	 * Generate Font Previews
	 */
	(function($){

		var preview_gen = {
			"max_connections": 6,
			"google_fonts": [],
			"done": false,

			"init": function(){
				$.each( styles_google_options.fonts, function( index, font ){
					// Only generate missing previews
					if ( undefined === font.png_url ) {
						preview_gen.google_fonts.push( font.name )
					}
				});

				$('#generate-previews').click( function(){
					for (var i = 0; i < preview_gen.max_connections; i++ ) {
						preview_gen.generate_preview();
					};
					return false;
				} );

				// Testing
				// setTimeout( function(){ $('#generate-previews').click(); }, 500 );
			},

			"generate_preview": function(){

				if ( preview_gen.done ) {
					return;
				}

				if ( 0 == preview_gen.google_fonts.length && !preview_gen.done ) {
					preview_gen.done = true;
					$('#generate-previews').after( '<p>Done</p>' );
					return;
				}

				var name = preview_gen.google_fonts.pop(),
				    $status_text;

				$status_text = $( '<p>Generating ' + name + '<br/></p>' );
				$('#generate-previews').after( $status_text );

				$.get( styles_google_options.admin_ajax, {
					"action": "styles-font-preview",
					"font-family": name
				}, function( data, textStatus, jqXHR ){

					var img = $('<img>').attr( 'src', data ).addClass('sfm-preview');

					$status_text.append( img );

					preview_gen.generate_preview();

				} );
			}

		}
		
		preview_gen.init();

	})(jQuery);

	/**
	 * Modify readme.md content:
	 *  - Hide directions on how to get to this page
	 *  - Hide menu screenshot (live demo displayed above)
	 */
	(function($){

		// Remove image of example output
		$('h3.example-output').nextAll('h2').first().remove();
		$('img[src*="example-output.gif"]').remove();

		// Remove directions on how to get to this demo
		var $demo = $('h2:contains(Live Demo)');
		$demo.nextUntil('h2').remove();
		$demo.remove();

	})(jQuery);

</script>