<?php

if( ! class_exists( 'Kraft_Heading_Label_Param' ) ) {

	class Kraft_Heading_Label_Param {
	
		function __construct() {
			
			vc_add_shortcode_param( 'kraft_heading_label' , array( $this, 'param_heading_label_callback' ) );			
		}

		function param_heading_label_callback( $settings, $value ) {
		
			$dependency = '';
			
			$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
			$class = isset( $settings['class'] ) ? $settings['class'] : '';
			$text = isset( $settings['text'] ) ? $settings['text'] : '';
			
			$output = '<h4 '.$dependency.' class="wpb_vc_param_value '.$class.'">'.$text.'</h4>';
			$output .= '<input type="hidden" name="'.$settings['param_name'].'" class="wpb_vc_param_value ct-param-heading-label '.$settings['param_name'].' '.$settings['type'].'_field" value="'.$value.'" '.$dependency.'/>';
			
			return $output;
		}

	}
}

if( class_exists( 'Kraft_Heading_Label_Param' ) ) {

	$Kraft_Heading_Label_Param = new Kraft_Heading_Label_Param();
}
