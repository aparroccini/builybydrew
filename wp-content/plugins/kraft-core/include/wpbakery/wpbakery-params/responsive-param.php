<?php
/*

# Param Use -
	array(
	  	"type" => "kraft_responsive",
	  	"class" => "",
	  	"heading" => __("Font size", 'ct_vc'),
	  	"param_name" => "YOUR_PARAM_NAME_FONT_SIZE",
		"parent_class"  => "heading"
		"selector"  => "heading-tag"
	  	"unit"  => "px",								// use '%' or 'px'
	  	"media" => array(
	  	    // "Large Screen"      => '',
	  	    "Desktop"           => '28', 				// Here '28' is default value set for 'Desktop'
	  	    "Tablet"            => '',
	  	    "Tablet Portrait"   => '',
	  	    "Mobile Landscape"  => '',
	  	    "Mobile"            => '',
	  	),
 	),

*/

if( !class_exists( 'Kraft_Responsive' ) ) {

	class Kraft_Responsive {
	
		function __construct() {

			vc_add_shortcode_param( 'kraft_responsive', array( $this, 'responsive_callback' ),  KRAFT_CORE_URL . 'assets/js/wpbakery-param/responsive.js' );
		}

		function responsive_callback( $settings, $value ) {
		
			$dependency = '';
			$hidden_default_value = '';
			$parent_class  = $settings['parent_class'];
			$selector  = $settings['selector'];
			$property  = $settings['property'];
			$unit = $settings['unit'];
			$medias = $settings['media'];

			if( is_numeric( $value ) ) {
				$value = "{desktop:" . $value . 'px;}';
			}

			$uid = 'ct-responsive-'. rand( 1000, 9999 );

			$html  = '<div class="ct-responsive-wrapper" id="'.$uid.'" >';
				$html .= '  <div class="ct-responsive-items" >';

				foreach( $medias as $key => $default_value ) {
					
					switch ( $key ) {
						
						case 'Desktop':
							$class = 'required';
							$data_id  = strtolower( ( preg_replace( '/\s+/', '_', $key ) ) );
							$dashicon = "<i class='dashicons dashicons-desktop'></i>";
							$html .= $this->responsive_param_media( $class, $dashicon, $key, $default_value ,$unit, $data_id );
							$html .= "<div class='simplify'>
										<div class='ct-tooltip simplify-options'>" . esc_html__( "Responsive Options","kraft" ) . "</div>
										<i class='simplify-icon dashicons dashicons-arrow-right-alt2'></i>
									  </div>";
							
							$hidden_default_value .= 'desktop:' . $default_value . $unit . ';';
							
						break;
						case 'Tablet':
							$class = 'optional';
							$data_id  = strtolower( ( preg_replace( '/\s+/', '_', $key ) ) );
							$dashicon = "<i class='dashicons dashicons-tablet' style='transform: rotate(90deg);'></i>";
							$html .= $this->responsive_param_media( $class, $dashicon, $key, $default_value ,$unit, $data_id );
							
							$hidden_default_value .= 'tablet:' . $default_value . $unit . ';';
							
						break;
						case 'Tablet Portrait':
							$class = 'optional';
							$data_id  = strtolower( ( preg_replace( '/\s+/', '_', $key ) ) );
							$dashicon = "<i class='dashicons dashicons-tablet'></i>";
							$html .= $this->responsive_param_media( $class, $dashicon, $key, $default_value ,$unit, $data_id );
							
							$hidden_default_value .= 'tablet_portrait:' . $default_value . $unit . ';';
							
						break;
						case 'Mobile Landscape':
							$class = 'optional';
							$data_id  = strtolower( ( preg_replace( '/\s+/', '_', $key ) ) );
							$dashicon = "<i class='dashicons dashicons-smartphone' style='transform: rotate(90deg);'></i>";
							$html .= $this->responsive_param_media( $class, $dashicon, $key, $default_value ,$unit, $data_id );
							
							$hidden_default_value .= 'mobile_landscape:' . $default_value . $unit . ';';
							
						break;
						case 'Mobile':
							$class = 'optional';
							$data_id  = strtolower( ( preg_replace( '/\s+/', '_', $key ) ) );
							$dashicon = "<i class='dashicons dashicons-smartphone'></i>";
							$html .= $this->responsive_param_media( $class, $dashicon, $key, $default_value ,$unit, $data_id );
							
							$hidden_default_value .= 'mobile:' . $default_value . $unit . ';';
							
						break;
					}
				}
			$html .= '  </div>';
			$html .= $this->get_units( $unit );
			
			
			$hidden_default_value .= 'property:' . $property;
			
			if( $value == '' ) {
				$value = '.' . $parent_class . '_' . rand() . ' ' . $selector . '{' . $hidden_default_value . '}';
			}  
		
			$html .= '  <input type="hidden" data-unit="'.$unit.'" data-parent-class="'.$parent_class.'" data-selector="'.$selector.'" data-property="'.$property.'"  name="'.$settings['param_name'].'" class="wpb_vc_param_value ct-responsive-value '.$settings['param_name'].' '.$settings['type'].'_field" value="'.$value.'" '.$dependency.' />';

			$html .= '</div>';

			return $html;
		}
		
		function responsive_param_media( $class, $dashicon, $key, $default_value, $unit, $data_id ) {
			
			$tooltipVal  = str_replace( '_', ' ', $data_id );
			
			$html  = '  <div class="ct-responsive-item '.$class.' '.$data_id.' ">';
			$html .= '    <span class="ct-icon">';
        	$html .= '    	<div class="ct-tooltip '.$class.' '.$data_id.'">'.ucwords( $tooltipVal ).'</div>';
			$html .=          $dashicon;
			$html .= '     </span>';
			$html .= '    <input type="text" class="ct-responsive-input" data-default="'.$default_value.'" data-unit="'.$unit.'" data-id="'.$data_id.'" />';
			$html .= '  </div>';
			
			return $html;
		}
		
		function get_units( $unit ) {
			
			//  set units - px, em, %
			$html  = '<div class="ct-unit-section">';
			$html .= '  <label>'.$unit.'</label>';
			$html .= '</div>';
			
			return $html;
		}	
		
	}
}

if( class_exists( 'Kraft_Responsive' ) ) {
	$Kraft_Responsive = new Kraft_Responsive();
}
