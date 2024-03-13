<?php
/**
 * Registers the content box shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_content_box extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-content-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-content-box.php' ) );
		}
				
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_content_box_vc_map' ) ) {	
	
	function kraft_content_box_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Content Box", 'kraft' ),
			"description"			=> esc_html__( "Add Content Box", 'kraft' ),
			"base"					=> "kraft_content_box",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-content-box-icon",			
			"params"				=> array(				
				array(
					"type"			=> "textfield",					
					"heading"		=> esc_html__("Upper heading", 'kraft'),
					"param_name"	=> "upper_heading",
					"admin_label"	=> true,					
					"description"	=> esc_html__("Enter upper heading for content box. (Note: leave blank if don't want upper title).", 'kraft')
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Heading", 'kraft'),
					"param_name"	=> "heading",
					"admin_label"	=> true,					
					"description"	=> esc_html__("Enter heading for the content box.", 'kraft')
				),
				array(
					"type"			=> "textarea",					
					"heading"		=> esc_html__( "Description", 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "desc",
					"description"	=> esc_html__( "Enter description for the content box.", 'kraft' )
				),	
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "Heading",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Font size", "kraft"),
					"param_name" => "heading_font_size",
					"value" => "22px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Font weight", "kraft"),
					"param_name" => "heading_font_weight",
					"value"	=> kraft_get_selected_body_font_styles(),
					"std" => "500",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "heading_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),	
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "Description",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Font size", "kraft"),
					"param_name" => "desc_font_size",
					"value" => "17px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Line height", "kraft"),
					"param_name" => "desc_line_height",
					"value" => "27px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Font weight", "kraft"),
					"param_name" => "desc_font_weight",
					"value"	=> kraft_get_selected_body_font_styles(),
					"std" => "400",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "desc_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),	
			)
		);	
		
	}

}

vc_lean_map( 'kraft_content_box', 'kraft_content_box_vc_map' );