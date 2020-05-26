<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
  #rockfm_<?php echo $id; ?> > .rockfm-field-wrap  > .rockfm-input31-container{    
<?php
if ( isset( $input18['pane_background']['show_st'] )
		&& intval( $input18['pane_background']['show_st'] ) === 1 ) {
	?>

	<?php
		 // el_background

	switch ( intval( $input18['pane_background']['type'] ) ) {
		case 1:
			  // solid
			if ( ! empty( $input18['pane_background']['solid_color'] ) ) {
				?>
								background:<?php echo $input18['pane_background']['solid_color']; ?>;
						<?php
			}
			break;
		case 2:
					 // gradient
			if ( ! empty( $input18['pane_background']['start_color'] ) && ! empty( $input18['pane_background']['end_color'] ) ) {
				?>
								background: <?php echo $input18['pane_background']['start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $input18['pane_background']['start_color']; ?>, <?php echo $input18['pane_background']['end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $input18['pane_background']['start_color']; ?>, <?php echo $input18['pane_background']['end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $input18['pane_background']['start_color']; ?>, <?php echo $input18['pane_background']['end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $input18['pane_background']['start_color']; ?>, <?php echo $input18['pane_background']['end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $input18['pane_background']['start_color']; ?>, <?php echo $input18['pane_background']['end_color']; ?>);
						<?php
			}
			break;
	}
	?>
			 <?php if ( isset( $input18['pane_background']['image'] ) && ! empty( $input18['pane_background']['image'] ) ) { ?>
					background-image:url("<?php echo $input18['pane_background']['image']; ?>");
					background-repeat:repeat;
				<?php } ?>
	   <?php } else { ?>
	
	padding:10px;
<?php } ?>                    
								
		<?php
		 // el_border_radius
		if ( isset( $input18['pane_border_radius']['show_st'] ) && intval( $input18['pane_border_radius']['show_st'] ) === 1 ) {
			?>
			 -webkit-border-radius: <?php echo $input18['pane_border_radius']['size']; ?>px;
				-moz-border-radius: <?php echo $input18['pane_border_radius']['size']; ?>px;
				border-radius: <?php echo $input18['pane_border_radius']['size']; ?>px;    
				<?php
		}
		?>
		<?php
		 // el_border
		if ( isset( $input18['pane_border']['show_st'] )
				 && intval( $input18['pane_border']['show_st'] ) === 1
				 && ! empty( $input18['pane_border']['color'] )
				 ) {
			if ( intval( $input18['pane_border']['style'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $input18['pane_border']['color'];
			$size_tmp  = $input18['pane_border']['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
		 <?php
			// shadow
			if ( isset( $input18['pane_shadow']['show_st'] )
				 && intval( $input18['pane_shadow']['show_st'] ) === 1
				 && ! empty( $input18['pane_shadow']['color'] )
				 ) {
				$x_tmp     = $input18['pane_shadow']['h_shadow'] . 'px';
				$y_tmp     = $input18['pane_shadow']['v_shadow'] . 'px';
				$blur_tmp  = $input18['pane_shadow']['blur'] . 'px';
				$color_tmp = $input18['pane_shadow']['color'];
				?>
				box-shadow: <?php echo $x_tmp . ' ' . $y_tmp . ' ' . $blur_tmp . ' ' . $color_tmp; ?>;
				<?php

			}
			?>
		  
		  <?php
			// padding
			if ( isset( $input18['pane_padding']['show_st'] ) && intval( $input18['pane_padding']['show_st'] ) === 1 ) {
				?>
			 padding: <?php echo $input18['pane_padding']['pos_top']; ?>px <?php echo $input18['pane_padding']['pos_right']; ?>px <?php echo $input18['pane_padding']['pos_bottom']; ?>px <?php echo $input18['pane_padding']['pos_left']; ?>px;
				
				<?php
			} else {
				?>
			
			<?php } ?>    
			
		 <?php
			// margin
			if ( isset( $input18['pane_margin']['show_st'] ) && intval( $input18['pane_margin']['show_st'] ) === 1 ) {
				?>
			 margin: <?php echo $input18['pane_margin']['pos_top']; ?>px <?php echo $input18['pane_margin']['pos_right']; ?>px <?php echo $input18['pane_margin']['pos_bottom']; ?>px <?php echo $input18['pane_margin']['pos_left']; ?>px;
				
				<?php
			} else {
				?>
			  
			<?php } ?>      
}


<?php // include('formhtml_common_css1.php'); ?>
<?php // include('formhtml_addon_css.php'); ?>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
