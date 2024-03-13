<?php
/**
 * Registers the image box shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_image_box extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-image-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-image-box.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_image_box_vc_map' ) ) {		
	
	function kraft_image_box_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Image Box", 'kraft' ),
			"description"			=> esc_html__( "Add Image Box", 'kraft' ),
			"base"					=> "kraft_image_box",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-image-box-icon",			
			"params"				=> array(
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Image Alignment", "kraft" ),
					"param_name"	=> "image_alignment",
					"value"			=> array(
										esc_html__( "Top", "kraft" )	=> "top",
										esc_html__( "Left", "kraft")	=> "left",											
					),					
					"description"	=> esc_html__("Select image aligment for image box.", "kraft")
				),
				array(
					"type"			=> "attach_image",					
					"heading"		=> esc_html__("Image Selection", 'kraft'),
					"param_name"	=> "image_src",				
					"description"	=> esc_html__("Recommended size is 600X360", 'kraft')
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Heading", 'kraft'),
					"param_name"	=> "heading",
					"admin_label"	=> true,					
					"description"	=> esc_html__("Enter heading for image box.", 'kraft')
				),
				array(
					"type"			=> "textarea",					
					"heading"		=> esc_html__( "Description", 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "desc",
					"description"	=> esc_html__( 'Enter description for image box.', 'kraft' )
				),				
				array(
					"type"				=> "checkbox",
					"heading"			=> esc_html__( 'Background Color', 'kraft' ),
					"param_name"		=> "bg_color_flag",
					"value"				=> array(
											esc_html__( 'Yes', 'kraft' )	=> 'yes',
											),			
					"dependency"		=> array(
												'element'	=> 'image_alignment',
												'value'		=> 'left',
												),	
					"description"		=> esc_html__( "Check for background color.", 'kraft' ),					
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Color', 'kraft' ),
					"param_name"	=> "bg_color",									
					"description"	=> esc_html__( 'Choose color for background.', 'kraft' ),	
					"dependency"	=> array(
											'element'	=> 'bg_color_flag',
											'not_empty'	=> true,
											),	
					"value"			=> "#f7f7f7",					
				),	
				array(
					"type"			=> "dropdown",				
					"heading"		=> esc_html__("Button Style", 'kraft'),
					"param_name"	=> "button_style",			
					"value"			=> array(
											esc_html__( "Outlined", "kraft" )	=> "outlined",
											esc_html__( "Solid", "kraft")	    => "solid",											
										),					
					"description"	=> esc_html__("Select the button style.", 'kraft'),
					"group"			=> esc_html__( "Button", 'kraft' )
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Button Text", 'kraft'),
					"param_name"	=> "button_text",					
					"description"	=> esc_html__("Enter button text. (Note: Button will not be shown if left blank).", 'kraft'),
					"group"			=> esc_html__( "Button", 'kraft' )
				),
				array(
					"type"			=> "vc_link",
					"heading"		=> esc_html__( "URL (Link)", "kraft" ),
					"param_name"	=> "link",
					"description"	=> esc_html__( "Add link to button.", "kraft" ),
					"group"			=> esc_html__( "Button", "kraft" )
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

vc_lean_map( 'kraft_image_box', 'kraft_image_box_vc_map' );