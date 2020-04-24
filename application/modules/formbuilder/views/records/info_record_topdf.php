<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
body { font-family: verdana, sans-serif;} 
div.wrap-submitted-data{
padding:20px;	
background-color:#EEEEEE;
	}
div.wrap-additional{
padding:20px;	
background-color:#EEEEEE;
margin-top:20px;	
	}
</style>
</head>

<body>
<h1><?php echo $tmp_data['info_labels']['title']; ?></h1>
<div class="wrap-submitted-data">
	<h3><?php echo $tmp_data['info_labels']['info_submitted']; ?></h3>
	<ul>
	  <?php
		foreach ( $tmp_data['record_info'] as $value ) {
			?>
				 <?php if ( is_array( $value['value'] ) ) { ?>   
				 <li><b><?php echo $value['field']; ?></b> :
						<?php
						if ( isset( $value['value']['input'] ) && is_array( $value['value']['input'] ) ) {
							?>
							  
							<ul>
								<?php
								foreach ( $value['value']['input'] as $key2 => $value2 ) {
									?>
								<li>
									<?php

									echo $value2['label'];
									if ( isset( $value2['qty'] ) && floatval( $value2['qty'] ) > 0 ) {
										echo ' - ' . $value2['qty'] . ' ' . __( 'Units', 'FRocket_admin' ) . ' - ';
									}


									?>

								</li>

									<?php } ?>
							</ul> 
								<?php
						} else {
							echo $value['value']['input'];

						}
						?>
					  
					  
				 </li>
				 <?php } else { ?>
				 <li><b><?php echo $value['field']; ?></b> : <?php echo $value['value']; ?></li>
				 <?php } ?>
				<?php
		}
		?>
	</ul>
</div>


<div class="wrap-additional">
<h3><?php echo $tmp_data['info_labels']['info_additional']; ?></h3>
<ul >
	<li>
		<b><?php echo $tmp_data['info_labels']['info_date']; ?></b>:
		<span><?php echo $tmp_data['info_date']; ?></span>
	</li>
	<li>
		<b><?php echo $tmp_data['info_labels']['info_ip']; ?></b>:
		<span><?php echo $tmp_data['info_ip']; ?></span>
	</li>
	<li>
		<b><?php echo $tmp_data['info_labels']['info_pc']; ?></b>:
		<span ><?php echo $tmp_data['info_useragent']; ?> </span>
	</li>
	<li>
		<b><?php echo $tmp_data['info_labels']['info_frmurl']; ?></b>:
		<span><?php echo $tmp_data['info_referer']; ?> </span>
	</li>
	<li>
		<b><?php echo $tmp_data['info_labels']['form_name']; ?></b>:
		<span><?php echo $tmp_data['form_name']; ?> </span>
	</li>
	</ul>
</div>


</body> </html>

