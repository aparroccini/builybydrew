<?php
/**
 * Registers the list block shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_list_block extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-list-block.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-list-block.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_list_block_vc_map' ) ) {		
	
function kraft_list_block_vc_map() {
		
		return array(
			"name"					=> esc_html__( "List Block", 'kraft' ),
			"description"			=> esc_html__( "Add List Block", 'kraft' ),
			"base"					=> "kraft_list_block",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-list-block-icon",			
			"params"				=> array(				
				array(
					"type"			=> "param_group",
					"heading"		=> esc_html__( 'List block data', 'kraft' ),
					"param_name"	=> "list_block_data",					
					"description"	=> esc_html__( 'Enter the list block data.', 'kraft' ),
					"value"			=> urlencode( json_encode( array(
										array(
											'heading'	=> 'Wilson University - 2016',
											'desc'		=> 'I am a graduate of the lauded design program at the California State University.',											
										),
										array(
											'heading'	=> 'Converse Studio (Current)',
											'desc'		=> 'I am currently working at converse digital studio as a product designer.',											
										),										
										) ) ),
					"params"		=> array(
											array(
												"type"			=> "textfield",												
												"heading"		=> esc_html__("Heading", 'kraft'),
												"description"	=> esc_html__("Enter heading text for list block.", 'kraft'),
												"param_name"	=> "heading",
												"admin_label"	=> true,
												"value"			=> "",
											),
											array(
												"type"			=> "textarea",
												"heading"		=> esc_html__("Description", 'kraft'),
												"description"	=> esc_html__( 'Enter description for list block.', 'kraft' ),												
												"param_name"	=> "desc",												
												"value"			=> "",
											),											
										),
					),		

					array(
						"type"				=> "checkbox",
						"heading"			=> esc_html__( 'Show Border', 'kraft' ),
						"param_name"		=> "bottom_border_flag",
						"value"				=> array(
												esc_html__( 'Yes', 'kraft' )	=> 'yes',
												),								
						"description"		=> esc_html__( "Show bottom border below list block.", 'kraft' ),					
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
						"value" => "18px",							
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
						"value" => "16px",							
						'group'	=> esc_html__( 'Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Line height", "kraft"),
						"param_name" => "desc_line_height",
						"value" => "24px",							
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

vc_lean_map( 'kraft_list_block', 'kraft_list_block_vc_map' );