<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
 #rockfm_<?php echo $id; ?> .rockfm-input-container{
 <?php
	switch ( intval( $input14['obj_align'] ) ) {
		case 1:
			?>
			  text-align:center;
			<?php
			break;
		case 2:
			?>
			  text-align:right;
			  <?php
			break;
		case 0:
		default:
			?>
			  text-align:left;
			<?php
			break;
	}
	?>
}
   #rockfm_<?php echo $id; ?> .rockfm-btn-wiznext{
		<?php
		//input
		?>
		<?php if ( $input12['size'] ) { ?>
			font-size:<?php echo $input12['size']; ?>px;
		<?php } ?>
		<?php if ( intval( $input12['bold'] ) === 1 ) { ?>
			font-weight: bold;
		<?php } ?>
		<?php if ( intval( $input12['italic'] ) === 1 ) { ?>
			font-style:italic;
		<?php } ?>
		<?php if ( intval( $input12['underline'] ) === 1 ) { ?>
			text-decoration:underline;
		<?php } ?>
		<?php if ( ! empty( $input12['color'] ) ) { ?>
			color:<?php echo $input12['color']; ?>;
		<?php } ?>
		<?php if ( isset( $input12['font_st'] ) && intval( $input12['font_st'] ) === 1 ) { ?>
			<?php
			$font_temp = json_decode( $input12['font'], true );
			if ( isset( $font_temp['family'] ) ) {
				?>
			
			font-family:<?php echo $font_temp['family']; ?>;
				<?php
				//storing to global fonts
				Uiform_Form_Helper::form_store_fonts( $font_temp );
				//end storing to global fonts
				?>
			<?php } ?>
		<?php } ?>
		
		 <?php
			//el_background
			if ( isset( $el12_background['show_st'] ) && intval( $el12_background['show_st'] ) === 1 ) {
				switch ( intval( $el12_background['type'] ) ) {
					case 1:
						//solid
						if ( ! empty( $el12_background['solid_color'] ) ) {
							?>
								background:<?php echo $el12_background['solid_color']; ?>;
							<?php
						}
						break;
					case 2:
						//gradient
						if ( ! empty( $el12_background['start_color'] ) && ! empty( $el12_background['end_color'] ) ) {
							?>
								background: <?php echo $el12_background['start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $el12_background['start_color']; ?>, <?php echo $el12_background['end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $el12_background['start_color']; ?>, <?php echo $el12_background['end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $el12_background['start_color']; ?>, <?php echo $el12_background['end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $el12_background['start_color']; ?>, <?php echo $el12_background['end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $el12_background['start_color']; ?>, <?php echo $el12_background['end_color']; ?>);
							<?php
						}
						break;
				}
				?>
			<?php } ?>
		 <?php
			//el_border_radius
			if ( isset( $el12_border_radius['show_st'] ) && intval( $el12_border_radius['show_st'] ) === 1 ) {
				?>
			 -webkit-border-radius: <?php echo $el12_border_radius['size']; ?>;
				-moz-border-radius: <?php echo $el12_border_radius['size']; ?>;
				border-radius: <?php echo $el12_border_radius['size']; ?>px;    
				 <?php
			}
			?>
		<?php
		 //el_border
		if ( isset( $el12_border['show_st'] )
				 && intval( $el12_border['show_st'] ) === 1
				 && ! empty( $el12_border['color'] )
				 ) {
			if ( intval( $el12_border['style'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $el12_border['color'];
			$size_tmp  = $el12_border['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
	}
	<?php
	//el_border
	if ( isset( $el12_border['color_focus_st'] )
				 && intval( $el12_border['color_focus_st'] ) === 1 ) {
		if ( intval( $el12_border['style'] ) === 2 ) {
			$solid_tmp = 'dotted';
		} else {
			$solid_tmp = 'solid';
		}
			 $color_tmp = $el12_border['color_focus'];
			 $size_tmp  = $el12_border['width'];
		?>
				#rockfm_<?php echo $id; ?> .rockfm-btn-wiznext:focus{
				   border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
				}
			  <?php
	}
	?>

   #rockfm_<?php echo $id; ?> .rockfm-btn-wizprev{
		<?php
		//input
		?>
		<?php if ( $input13['size'] ) { ?>
			font-size:<?php echo $input13['size']; ?>px;
		<?php } ?>
		<?php if ( intval( $input13['bold'] ) === 1 ) { ?>
			font-weight: bold;
		<?php } ?>
		<?php if ( intval( $input13['italic'] ) === 1 ) { ?>
			font-style:italic;
		<?php } ?>
		<?php if ( intval( $input13['underline'] ) === 1 ) { ?>
			text-decoration:underline;
		<?php } ?>
		<?php if ( ! empty( $input13['color'] ) ) { ?>
			color:<?php echo $input13['color']; ?>;
		<?php } ?>
		<?php if ( isset( $input13['font_st'] ) && intval( $input13['font_st'] ) === 1 ) { ?>
			<?php
			$font_temp = json_decode( $input13['font'], true );
			if ( isset( $font_temp['family'] ) ) {
				?>
			
			font-family:<?php echo $font_temp['family']; ?>;
				<?php
				//storing to global fonts
				Uiform_Form_Helper::form_store_fonts( $font_temp );
				//end storing to global fonts
				?>
			<?php } ?>
		<?php } ?>
		
		 <?php
			//el_background
			if ( isset( $el13_background['show_st'] ) && intval( $el13_background['show_st'] ) === 1 ) {
				switch ( intval( $el13_background['type'] ) ) {
					case 1:
						//solid
						if ( ! empty( $el13_background['solid_color'] ) ) {
							?>
								background:<?php echo $el13_background['solid_color']; ?>;
							<?php
						}
						break;
					case 2:
						//gradient
						if ( ! empty( $el13_background['start_color'] ) && ! empty( $el13_background['end_color'] ) ) {
							?>
								background: <?php echo $el13_background['start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $el13_background['start_color']; ?>, <?php echo $el13_background['end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $el13_background['start_color']; ?>, <?php echo $el13_background['end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $el13_background['start_color']; ?>, <?php echo $el13_background['end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $el13_background['start_color']; ?>, <?php echo $el13_background['end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $el13_background['start_color']; ?>, <?php echo $el13_background['end_color']; ?>);
							<?php
						}
						break;
				}
				?>
			<?php } ?>
		 <?php
			//el_border_radius
			if ( isset( $el13_border_radius['show_st'] ) && intval( $el13_border_radius['show_st'] ) === 1 ) {
				?>
			 -webkit-border-radius: <?php echo $el13_border_radius['size']; ?>;
				-moz-border-radius: <?php echo $el13_border_radius['size']; ?>;
				border-radius: <?php echo $el13_border_radius['size']; ?>px;    
				 <?php
			}
			?>
		<?php
		 //el_border
		if ( isset( $el13_border['show_st'] )
				 && intval( $el13_border['show_st'] ) === 1
				 && ! empty( $el13_border['color'] )
				 ) {
			if ( intval( $el13_border['style'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $el13_border['color'];
			$size_tmp  = $el13_border['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
	}
	<?php
	//el_border
	if ( isset( $el13_border['color_focus_st'] )
				 && intval( $el13_border['color_focus_st'] ) === 1 ) {
		if ( intval( $el13_border['style'] ) === 2 ) {
			$solid_tmp = 'dotted';
		} else {
			$solid_tmp = 'solid';
		}
			 $color_tmp = $el13_border['color_focus'];
			 $size_tmp  = $el13_border['width'];
		?>
				#rockfm_<?php echo $id; ?> .rockfm-btn-wizprev:focus{
				   border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
				}
			  <?php
	}
	?>
					
				
   #rockfm_<?php echo $id; ?> .rockfm-help-block{
   <?php if ( isset( $help_block['font_st'] ) && intval( $help_block['font_st'] ) === 1 ) { ?>
		<?php
			$font_temp = json_decode( $help_block['font'], true );
		if ( isset( $font_temp['family'] ) ) {
			?>
			
			font-family:<?php echo $font_temp['family']; ?>;
			<?php
				//storing to global fonts
				Uiform_Form_Helper::form_store_fonts( $font_temp );
				//end storing to global fonts
			?>
		   <?php } ?> 
		<?php } ?>
   }
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp );
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
