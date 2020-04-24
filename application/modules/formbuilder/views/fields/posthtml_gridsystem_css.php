<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
<?php echo $id_str; ?>{

<?php
if ( isset( $skin['align']['show_st'] )
		&& intval( $skin['align']['show_st'] ) === 1 ) {
	?>
			<?php if ( ! empty( $skin['align']['max_width'] ) ) { ?>
				max-width: <?php echo $skin['align']['max_width']; ?>px;
			<?php } ?>
				margin-left: auto!important;
				margin-right: auto!important;
			<?php } ?>

<?php
if ( isset( $skin['background']['show_st'] )
		&& intval( $skin['background']['show_st'] ) === 1 ) {
	?>
	<?php
	//el_background
	switch ( intval( $skin['background']['type'] ) ) {
		case 1:
			  //solid
			if ( ! empty( $skin['background']['cl_solid_color'] ) ) {
				?>
								background-color:<?php echo $skin['background']['cl_solid_color']; ?>;
						<?php
			}
			break;
		case 2:
					 //gradient
			if ( ! empty( $skin['background']['cl_start_color'] ) && ! empty( $skin['background']['cl_start_color'] ) ) {
				?>
								background-color: <?php echo $skin['background']['cl_start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $skin['background']['cl_start_color']; ?>, <?php echo $skin['background']['cl_end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $skin['background']['cl_start_color']; ?>, <?php echo $skin['background']['cl_end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $skin['background']['cl_start_color']; ?>, <?php echo $skin['background']['cl_end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $skin['background']['cl_start_color']; ?>, <?php echo $skin['background']['cl_end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $skin['background']['cl_start_color']; ?>, <?php echo $skin['background']['cl_end_color']; ?>);
						<?php
			}
			break;
	}
	?>
			 <?php if ( isset( $skin['background']['img_source'] ) && ! empty( $skin['background']['img_source'] ) ) { ?>
					background-image:url("<?php echo $skin['background']['img_source']; ?>");
					  
				<?php } ?>
			  
			   <?php
				//repeat
				if ( isset( $skin['background']['img_repeat'] ) ) {

					switch ( intval( $skin['background']['img_repeat'] ) ) {
						case 1:
							//repeat-x
							$tmp_bg_str = 'repeat-x';
							break;
						case 2:
							//repeat-y
							$tmp_bg_str = 'repeat-y';
							break;
						case 3:
							//no-repeat
							$tmp_bg_str = 'no-repeat';
							break;
						case 4:
							//initial
							$tmp_bg_str = 'initial';
							break;
						case 5:
							//inherit
							$tmp_bg_str = 'inherit';
							break;
						case 0:
						default:
							$tmp_bg_str = 'auto';
							break;

					}

					?>
					
					background-repeat:<?php echo $tmp_bg_str; ?>;
				 <?php } ?>     
			   <?php
				//size
				if ( isset( $skin['background']['img_size_type'] ) ) {

					switch ( intval( $skin['background']['img_size_type'] ) ) {
						case 1:
							//length
							$tmp_bg_str = $skin['background']['img_size_len'];
							break;
						case 2:
							//percentage
							$tmp_bg_str = $skin['background']['img_size_len'];
							break;
						case 3:
							//cover
							$tmp_bg_str = 'cover';
							break;
						case 4:
							//contain
							$tmp_bg_str = 'contain';
							break;
						case 5:
							//initial
							$tmp_bg_str = 'initial';
							break;
						case 6:
							//inherit
							$tmp_bg_str = 'inherit';
							break;
						case 0:
						default:
							$tmp_bg_str = 'auto';
							break;

					}

					?>
					
					background-size:<?php echo $tmp_bg_str; ?>;
				 <?php } ?>        
					
				 <?php if ( isset( $skin['background']['img_position'] ) && ! empty( $skin['background']['img_position'] ) ) { ?>
				   background-position:<?php echo $skin['background']['img_position']; ?>;
					  
				<?php } ?>    
					
	   <?php } else { ?>
<?php } ?> 

	<?php
		 //el_border_radius
	if ( isset( $skin['border_radius']['show_st'] ) && intval( $skin['border_radius']['show_st'] ) === 1 ) {
		?>
			 -webkit-border-radius: <?php echo $skin['border_radius']['size']; ?>px;
				-moz-border-radius: <?php echo $skin['border_radius']['size']; ?>px;
				border-radius: <?php echo $skin['border_radius']['size']; ?>px;    
			<?php
	}
	?>
						 
	  <?php
		 //el_border
		if ( isset( $skin['border']['show_st'] )
				 && intval( $skin['border']['show_st'] ) === 1
				 && ! empty( $skin['border']['color'] )
				 ) {
			if ( intval( $skin['border']['type'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $skin['border']['color'];
			$size_tmp  = $skin['border']['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
		  
	 <?php
		 //shadow
		if ( isset( $skin['shadow']['show_st'] )
				 && intval( $skin['shadow']['show_st'] ) === 1
				 && ! empty( $skin['shadow']['color'] )
				 ) {
			   $x_tmp     = $skin['shadow']['h_shadow'] . 'px';
			   $y_tmp     = $skin['shadow']['v_shadow'] . 'px';
			   $blur_tmp  = $skin['shadow']['blur'] . 'px';
			   $color_tmp = $skin['shadow']['color'];
			?>
				box-shadow: <?php echo $x_tmp . ' ' . $y_tmp . ' ' . $blur_tmp . ' ' . $color_tmp; ?>;
			<?php

		}
		?>
		  
		<?php
		 //padding
		if ( isset( $skin['padding']['show_st'] ) && intval( $skin['padding']['show_st'] ) === 1 ) {
			?>
			 padding: <?php echo $skin['padding']['top']; ?>px <?php echo $skin['padding']['right']; ?>px <?php echo $skin['padding']['bottom']; ?>px <?php echo $skin['padding']['left']; ?>px;
				
			<?php
		} else {
			?>
			 padding:0px 0px 0px 0px;
		 <?php } ?>
		<?php
		 //margin
		if ( isset( $skin['margin']['show_st'] ) && intval( $skin['margin']['show_st'] ) === 1 ) {
			?>
			 margin: <?php echo $skin['margin']['top']; ?>px <?php echo $skin['margin']['right']; ?>px <?php echo $skin['margin']['bottom']; ?>px <?php echo $skin['margin']['left']; ?>px;
				
			<?php
		} else {
			?>
			 margin:0px 0px 0px 0px;
		 <?php } ?>
}


<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>
