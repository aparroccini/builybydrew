<?php
/**
 * Registers the button shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_button extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-button.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-button.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_button_vc_map' ) ) {		

	function kraft_button_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Button", 'kraft' ),
			"description"			=> esc_html__( "Add Button", 'kraft' ),
			"base"					=> "kraft_button",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-button-icon",			
			"params"				=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'kraft' ),
					'param_name' => 'btn_text',	
					'admin_label' => true,		
					'value' => esc_html__( 'Click here', 'kraft' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'kraft' ),
					'param_name' => 'btn_link',
					'description' => esc_html__( 'Add link to button.', 'kraft' ),					
				),
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
				),									
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'kraft' ),
					'param_name' => 'btn_align',
					'value' => array(				
									esc_html__( 'Left', 'kraft' ) => 'text-left',
									esc_html__( 'Center', 'kraft' ) => 'text-center',
									esc_html__( 'Right', 'kraft' ) => 'text-right',
								),
					'description' => esc_html__( 'Select button alignment.', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Font size", "kraft" ),
					"param_name"	=> "button_font_size",
					"value"			=> "11px",			
					"description"	=> esc_html__("Enter the button font size.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" )					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Font weight", "kraft" ),
					"param_name"	=> "button_font_weight",
					"value"			=> kraft_get_selected_body_font_styles(),
					"std"           => '500', 
					"description"	=> esc_html__("Select font weight for button.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Letter Spacing", "kraft" ),
					"param_name"	=> "button_letter_spacing",				
					"description"	=> esc_html__("Enter the button letter spacing.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Padding Top/Bottom", "kraft" ),
					"param_name"	=> "button_padding_top_bottom",
					"value"			=> "16px",			
					"description"	=> esc_html__("Enter the button top/bottom padding.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" )					
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Padding Left/Right", "kraft" ),
					"param_name"	=> "button_padding_left_right",
					"value"			=> "34px",			
					"description"	=> esc_html__("Enter the button left/right padding.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" )					
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
					"group"			=> esc_html__( "Color", "kraft" )
				),		
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Button text color', 'kraft' ),
					"param_name"	=> "button_text_color",					
					"value"			=> "#ffffff",				
					"description"	=> esc_html__("Select color for button text.", 'kraft'),
					"group"			=> esc_html__( "Color", "kraft" )
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
					"group"			=> esc_html__( "Color", "kraft" )
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
					"group"			=> esc_html__( "Color", "kraft" )
				),				
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra Class', 'kraft' ),
					'description' => esc_html__( 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"', 'kraft' ),
					'param_name'  => 'class',
					'group'       => 'Extras'
				  )
							
			)
		);	
	}

}

vc_lean_map( 'kraft_button', 'kraft_button_vc_map' );
