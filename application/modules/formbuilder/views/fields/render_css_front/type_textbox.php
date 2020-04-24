<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
	   #rockfm_<?php echo $id; ?> .rockfm-txtbox-inp-val{
		<?php
		//input
		?>
		<?php if ( $input['size'] ) { ?>
			font-size:<?php echo $input['size']; ?>px;
		<?php } ?>
		<?php if ( intval( $input['bold'] ) === 1 ) { ?>
			font-weight: bold;
		<?php } ?>
		<?php if ( intval( $input['italic'] ) === 1 ) { ?>
			font-style:italic;
		<?php } ?>
		<?php if ( intval( $input['underline'] ) === 1 ) { ?>
			text-decoration:underline;
		<?php } ?>
		<?php if ( ! empty( $input['color'] ) ) { ?>
			color:<?php echo $input['color']; ?>;
		<?php } ?>
		<?php if ( isset( $input['font_st'] ) && intval( $input['font_st'] ) === 1 ) { ?>
			<?php
			$font_temp = json_decode( $input['font'], true );
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
		switch ( intval( $input['val_align'] ) ) {
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
		 <?php
			//el_background
			if ( isset( $el_background['show_st'] ) && intval( $el_background['show_st'] ) === 1 ) {
				switch ( intval( $el_background['type'] ) ) {
					case 1:
						//solid
						if ( ! empty( $el_background['solid_color'] ) ) {
							?>
								background:<?php echo $el_background['solid_color']; ?>;
							<?php
						}
						break;
					case 2:
						//gradient
						if ( ! empty( $el_background['start_color'] ) && ! empty( $el_background['end_color'] ) ) {
							?>
								background: <?php echo $el_background['start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $el_background['start_color']; ?>, <?php echo $el_background['end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $el_background['start_color']; ?>, <?php echo $el_background['end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $el_background['start_color']; ?>, <?php echo $el_background['end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $el_background['start_color']; ?>, <?php echo $el_background['end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $el_background['start_color']; ?>, <?php echo $el_background['end_color']; ?>);
							<?php
						}
						break;
				}
				?>
			<?php } ?>
		 <?php
			//el_border_radius
			if ( isset( $el_border_radius['show_st'] ) && intval( $el_border_radius['show_st'] ) === 1 ) {
				?>
			 -webkit-border-radius: <?php echo $el_border_radius['size']; ?>;
				-moz-border-radius: <?php echo $el_border_radius['size']; ?>;
				border-radius: <?php echo $el_border_radius['size']; ?>px;    
				 <?php
			}
			?>
		<?php
		 //el_border
		if ( isset( $el_border['show_st'] )
				 && intval( $el_border['show_st'] ) === 1
				 && ! empty( $el_border['color'] )
				 ) {
			if ( intval( $el_border['style'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $el_border['color'];
			$size_tmp  = $el_border['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
	}
	<?php
	//el_border
	if ( isset( $el_border['color_focus_st'] )
				 && intval( $el_border['color_focus_st'] ) === 1 ) {
		if ( intval( $el_border['style'] ) === 2 ) {
			$solid_tmp = 'dotted';
		} else {
			$solid_tmp = 'solid';
		}
			 $color_tmp = $el_border['color_focus'];
			 $size_tmp  = $el_border['width'];
		?>
				#rockfm_<?php echo $id; ?> .rockfm-txtbox-inp-val:focus{
				   border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
				}
			  <?php
	}
	?>
 
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp );
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
