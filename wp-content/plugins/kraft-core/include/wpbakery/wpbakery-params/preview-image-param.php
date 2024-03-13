<?php

if( ! class_exists( 'Kraft_Preview_Image_Param' ) ) {

	class Kraft_Preview_Image_Param {
	
		function __construct() {
			
			vc_add_shortcode_param( 'kraft_preview_image' , array( $this, 'param_preview_image_callback' ), KRAFT_CORE_URL . 'assets/js/wpbakery-param/vc-extend.js' );				
		}

		function param_preview_image_callback( $settings, $value ) {
		
			$output = '';
			$default_show = '';
			$css_option = vc_get_dropdown_option( $settings, $value );

			$output .= '<div class="kraft-preview-image-main">';
			
			foreach ( $settings['value'] as $index => $data ) {
				
				if( $value == $data ) {
					$default_show = ' preview-image-show';
				}
				
				if( $data ) {
					$output .= '<div class="preview-image-hide '.$data.$default_show.'"><img src="'. KRAFT_CORE_URL . 'assets/images/preview-images/'.$data.'.jpg" alt="'.$index.'" /></div>';
				}
				
				$default_show = '';
			}
			
			$output .= '</div>';

			$output .= '<select style="display:none;" name="'. $settings['param_name']. '" class="wpb_vc_param_value wpb-input wpb-select kraft_preview_image_select '. $settings['param_name']
						   . ' ' . $settings['type']
						   . ' ' . $css_option
						   . '" data-option="' . $css_option . '">';
			
			if ( is_array( $value ) ) {
				$value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
			}
				
			foreach ( $settings['value'] as $index => $data ) {
				
				  if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
						$option_label = $data;
						$option_value = $data;
				  } 
				  elseif ( is_numeric( $index ) && is_array( $data ) ) {
						$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
						$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
				  } else {
						$option_value = $data;
						$option_label = $index;
				  }
				  
				  $selected = '';
				  
				  if ( $value !== '' && (string) $option_value === (string) $value ) {
					$selected = ' selected="selected"';
				  }
				  
				  $output .= '<option class="' . $option_value . '" value="' . $option_value . '" title="'.$option_value.'"' . $selected . '>'.$option_value.'</option>';
				  
				}
				
				$output .= '</select>';

				return $output;
		}

	}
}

if( class_exists( 'Kraft_Preview_Image_Param' ) ) {

	$Kraft_Preview_Image_Param = new Kraft_Preview_Image_Param();
}
