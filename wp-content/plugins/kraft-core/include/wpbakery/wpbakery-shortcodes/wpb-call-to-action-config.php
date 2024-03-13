<?php
/**
 * Registers the cta shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_cta extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-call-to-action.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-call-to-action.php' ) );
		}																												
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_cta_vc_map' ) ) {			

	function kraft_cta_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Call to Action", 'kraft' ),
			"description"			=> esc_html__( "Add Call to Action", 'kraft' ),
			"base"					=> "kraft_cta",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-cta-icon",			
			"params"				=> array(	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "CTA Style", "kraft" ),
					"param_name"	=> "cta_style",
					"value"			=> array(
										esc_html__( "Style 1", "kraft" ) => "style-1",
										esc_html__( "Style 2", "kraft")	 => "style-2",
										esc_html__( "Style 3", "kraft")	 => "style-3",														
					),					
					"description"	=> esc_html__("Select call to action style.", "kraft")
				),	
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Enter your call to action text", 'kraft'),
					"param_name"	=> "cta_text",
					"admin_label"	=> true,					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Button Type", "kraft" ),
					"param_name"	=> "button_type",
					"value"			=> array(
										esc_html__( "Default", "kraft" ) => "default",
										esc_html__( "Custom", "kraft")	 => "custom",										
					),			
					"dependency"	=> array(
										'element' => 'cta_style',
										'value'	=> array( 'style-2', 'style-3' ),
										),			
					"description"	=> esc_html__("Select the type of button.", "kraft")
				),	
				array(
					"type"			=> "vc_link",
					"heading"		=> esc_html__( "Button (Link)", "kraft" ),
					"param_name"	=> "link",
					"description"	=> esc_html__( "Add button text and link.", "kraft" ),					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Text Alignment", "kraft" ),
					"param_name"	=> "text_alignment",
					"value"			=> array(
										esc_html__( "Left", "kraft" )	=> "text-left",
										esc_html__( "Center", "kraft")	=> "",											
					),					
					"dependency"	=> array(
											'element' => 'cta_style',
											'value'	=> array( 'style-1' ),
										),		
					"description"	=> esc_html__("Select text alignment.", "kraft")
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Background Color", "kraft"),
					"param_name" => "bg_color",
					"value" => "#f3f3f3",		
					"dependency"	=> array(
										'element' => 'cta_style',
										'value'	=> 'style-2',
										),	
					'group'	=> esc_html__( 'CTA Style', 'kraft' ),
				),	
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "CTA Text",							
					'group'	=> esc_html__( 'CTA Style', 'kraft' ),
				),
				array(
					"type"			=> "kraft_responsive",
					"heading"		=> esc_html__( "Font size", "kraft" ),
					"param_name"	=> "text_font_size",
					"unit"			=> "px",
					"parent_class"  => "cta",
					"selector"      => "h2",
					"property"      => "font-size",
					"media"			=> array(											
											"Desktop"           => '42',
											"Tablet"            => '',
											"Tablet Portrait"   => '',
											"Mobile Landscape"  => '',
											"Mobile"            => '',
										),	
					"dependency"	=> array(
											'element'	=> 'font_size',
											'value'		=> 'font-size-custom',
										),						
					"description"	=> esc_html__("Enter the font size.", "kraft"),				
					"group"			=> esc_html__( "CTA Style", "kraft" ),
				),
				array(
					"type"			=> "kraft_responsive",
					"heading"		=> esc_html__( "Line height", "kraft" ),
					"param_name"	=> "text_line_height",
					"unit"			=> "px",
					"parent_class"  => "cta",
					"selector"      => "h2",
					"property"      => "line-height",
					"media"			=> array(											
											"Desktop"           => '52',
											"Tablet"            => '',
											"Tablet Portrait"   => '',
											"Mobile Landscape"  => '',
											"Mobile"            => '',
										),						
					"description"	=> esc_html__("Enter the line height. eg 20px", "kraft"),
					"group"			=> esc_html__( "CTA Style", "kraft" ),
				),
				/*array(
					"type" => "textfield",					
					"heading" => esc_html__("Font size", "kraft"),
					"param_name" => "text_font_size",
					"value" => "42px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Line height", "kraft"),
					"param_name" => "text_line_height",
					"value" => "52px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),*/				
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Font weight", "kraft"),
					"param_name" => "text_font_weight",
					"value"	=> kraft_get_selected_heading_font_styles(),
					"std" => "500",							
					'group'	=> esc_html__( 'CTA Style', 'kraft' ),
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "text_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'CTA Style', 'kraft' ),
				),	
				/*array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'kraft' ),
					'param_name' => 'btn_text',	
					'admin_label' => true,		
					'value' => esc_html__( 'BUTTON', 'kraft' ),
					'group'	=> esc_html__( 'Button', 'kraft' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'kraft' ),
					'param_name' => 'btn_link',
					'description' => esc_html__( 'Add link to button.', 'kraft' ),
					'group'	=> esc_html__( 'Button', 'kraft' ),					
				),*/
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'kraft' ),
					'description' => esc_html__( 'Select button display style.', 'kraft' ),
					'param_name' => 'btn_style',
					'std' => 'solid',
					'value' => array(						
									esc_html__( 'Flat', 'kraft' ) => 'solid',
									esc_html__( 'Outline', 'kraft' ) => 'outlined',					
									esc_html__( 'Link', 'kraft' ) => 'link',					
								),		
					"dependency" => array(
										'element' => 'button_type',
										'value'	=> array( 'custom' ),
									),						
					'group'	=> esc_html__( 'Button', 'kraft' ),
				),		
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Button Arrow', 'kraft' ),
					'description'	=> esc_html__( 'Select button arrow.', 'kraft' ),
					'param_name'	=> 'button_arrow',	
					'std'			=> 'dark',	
					'value'			=> array(						
										esc_html__( 'Dark', 'kraft' ) => 'dark',					
										esc_html__( 'Light', 'kraft' ) => 'light',										
									),	
					"dependency"	=> array(
										"element" => "btn_style",
										"value" => array( "link" )
									),	
					'group'	=> esc_html__( 'Button', 'kraft' ),			
				),				
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Font size", "kraft" ),
					"param_name"	=> "button_font_size",
					"value"			=> "11px",	
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),						
					"description"	=> esc_html__("Enter the button font size.", "kraft"),
					"group"			=> esc_html__( "Button Style", "kraft" )					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Font weight", "kraft" ),
					"param_name"	=> "button_font_weight",
					"value"			=> kraft_get_selected_heading_font_styles(),
					"std"           => '500', 
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),				
					"description"	=> esc_html__("Select font weight for button.", "kraft"),
					"group"			=> esc_html__( "Button Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Letter Spacing", "kraft" ),
					"param_name"	=> "button_letter_spacing",				
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),				
					"description"	=> esc_html__("Enter the button letter spacing.", "kraft"),
					"group"			=> esc_html__( "Button Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Padding Top/Bottom", "kraft" ),
					"param_name"	=> "button_padding_top_bottom",
					"value"			=> "16px",			
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),				
					"description"	=> esc_html__("Enter the button top/bottom padding.", "kraft"),
					"group"			=> esc_html__( "Button Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Padding Left/Right", "kraft" ),
					"param_name"	=> "button_padding_left_right",
					"value"			=> "34px",			
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),				
					"description"	=> esc_html__("Enter the button left/right padding.", "kraft"),
					"group"			=> esc_html__( "Button Style", "kraft" )					
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Button BG color', 'kraft' ),
					"param_name"	=> "button_bg_color",					
					"value"			=> '#151515',
					"dependency"	=> array(
											"element" => "btn_style",
											"value" => array( "solid" )
										),		
					"description"	=> esc_html__("Select background color for button.", 'kraft'),
					"group"			=> esc_html__( "Button Color", "kraft" )
				),		
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Button text color', 'kraft' ),
					"param_name"	=> "button_text_color",					
					"value"			=> "#151515",		
					"dependency" 	=> array(
											'element' => 'button_type',
											'value'	=> array( 'custom' ),
										),						
					"description"	=> esc_html__("Select color for button text.", 'kraft'),
					"group"			=> esc_html__( "Button Color", "kraft" )
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Button hover color', 'kraft' ),
					"param_name"	=> "button_hover_color",					
					"value"			=> "#151515",
					"dependency"	=> array(
											"element" => "btn_style",
											"value" => array( "outlined" )
										),			
					"description"	=> esc_html__("Select color for button hover.", 'kraft'),
					"group"			=> esc_html__( "Button Color", "kraft" )
				),			
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Button hover text color', 'kraft' ),
					"param_name"	=> "button_hover_text_color",					
					"value"			=> "#ffffff",
					"dependency"	=> array(
											"element" => "btn_style",
											"value" => array( "outlined" )
										),				
					"description"	=> esc_html__("Select text color for button hover.", 'kraft'),
					"group"			=> esc_html__( "Button Color", "kraft" )
				),					
			)
		);	
	}

}

vc_lean_map( 'kraft_cta', 'kraft_cta_vc_map' );