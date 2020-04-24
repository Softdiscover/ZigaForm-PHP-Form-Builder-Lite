<?php
if ( isset( $_GET['rkver'] ) ) {

	if ( ! defined( 'BASEPATH' ) ) {
		define( 'BASEPATH', dirname( __FILE__ ) . '/' );
	}
	require_once( BASEPATH . '../application/helpers/common_helper.php' );
	require_once( BASEPATH . 'captcha/CaptchaBuilderInterface.php' );
	require_once( BASEPATH . 'captcha/PhraseBuilderInterface.php' );
	require_once( BASEPATH . 'captcha/CaptchaBuilder.php' );
	require_once( BASEPATH . 'captcha/PhraseBuilder.php' );

	if ( isset( $_GET['rkver'] ) ) {
		$captcha_opts     = Uiform_Form_Helper::sanitizeInput_html( $_GET['rkver'] );
		$captcha_opts_dec = Uiform_Form_Helper::base64url_decode( $captcha_opts );
		$cap_arr          = json_decode( $captcha_opts_dec, true );
		header( 'Content-type: image/jpeg' );
		if ( isset( $cap_arr['ca_txt_gen'] ) && ! empty( $cap_arr['ca_txt_gen'] ) ) {
			$captcha = new CaptchaBuilder( $cap_arr['ca_txt_gen'] );

			if ( isset( $cap_arr['txt_color_st'] ) && intval( $cap_arr['txt_color_st'] ) === 1 && ! empty( $cap_arr['txt_color'] ) ) {
				$tmp = Uiform_Form_Helper::convert_HexToRGB( $cap_arr['txt_color'] );
				$captcha->setTextColor( $tmp[0], $tmp[1], $tmp[2] );
			}

			if ( isset( $cap_arr['background_st'] ) && intval( $cap_arr['background_st'] ) === 1 && ! empty( $cap_arr['background_color'] ) ) {
				$tmp = Uiform_Form_Helper::convert_HexToRGB( $cap_arr['background_color'] );
				$captcha->setBackgroundColor( $tmp[0], $tmp[1], $tmp[2] );
			}

			if ( isset( $cap_arr['behind_lines_st'] ) && intval( $cap_arr['behind_lines_st'] ) === 1 && isset( $cap_arr['behind_lines'] ) ) {
				$captcha->setMaxBehindLines( intval( $cap_arr['behind_lines'] ) );
			}

			if ( isset( $cap_arr['front_lines_st'] ) && intval( $cap_arr['front_lines_st'] ) === 1 && isset( $cap_arr['front_lines'] ) ) {
				$captcha->setMaxFrontLines( intval( $cap_arr['front_lines'] ) );
			}

			if ( isset( $cap_arr['distortion'] ) ) {
				$captcha->setDistortion( (bool) $cap_arr['distortion'] );
			}

			$captcha->build();

			$captcha->output();
		}
	} else {
		header( 'Content-type: image/jpeg' );
		CaptchaBuilder::create()
				->build()
				->output();
	}
}

