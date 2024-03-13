<?php
/**
 * Registers the list shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_list extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-list.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-list.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_list_vc_map' ) ) {		
	
	function kraft_list_vc_map() {

			return array(
				"name"					=> esc_html__( "List", 'kraft' ),
				"description"			=> esc_html__( "Add List", 'kraft' ),
				"base"					=> "kraft_list",
				"category"				=> ucfirst( KRAFT_THEME_NAME ),
				"icon" 					=> "kraft-list-icon",			
				"params"				=> array(								
					array(
						"type"				=> "dropdown",
						"heading"			=> esc_html__( 'List style', 'kraft' ),
						"admin_label"		=> true,
						"param_name"		=> "list_style",					
						"value"				=> array(
													esc_html__( 'Plain text', 'kraft')			=> 'plain-text',
													esc_html__( 'Text with hyphen', 'kraft')	=> 'hyphen-text',											
												),					
					),
					array(
						"type"			=> "textarea_html",					
						"heading"		=> esc_html__( "List Markup", 'kraft' ),
						"param_name"	=> "content",					
					),						
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "list_font_size",
						"value" => "17px",							
						'group'	=> esc_html__( 'Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "list_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "400",							
						'group'	=> esc_html__( 'Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "list_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Style', 'kraft' ),
					),	
				)
			);	
	}

}

vc_lean_map( 'kraft_list', 'kraft_list_vc_map' );