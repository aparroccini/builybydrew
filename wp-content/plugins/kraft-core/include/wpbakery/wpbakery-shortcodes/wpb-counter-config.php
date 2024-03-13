<?php
/**
 * Registers the counter shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_counter extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-counter.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-counter.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_counter_vc_map' ) ) {	
	
	function kraft_counter_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Counter", 'kraft' ),
			"description"			=> esc_html__( "Add Counter", 'kraft' ),
			"base"					=> "kraft_counter",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-counter-icon",			
			"params"				=> array(
				array(
					"type"			=> "param_group",
					"heading"		=> esc_html__( 'Counter block data', 'kraft' ),
					"param_name"	=> "counter_block_data",					
					"description"	=> esc_html__( 'Enter the counter block data.', 'kraft' ),
					"value"			=> urlencode( json_encode( array(
										array(
											'counter_value'	=> '450+',
											'counter_title'	=> 'Projects Completed',											
										),
										array(
											'counter_value'	=> '123',
											'counter_title'	=> 'International Projects.',											
										),			
										array(
											'counter_value'	=> '99%',
											'counter_title'	=> 'Client Satisfaction.',											
										),								
										) ) ),
					"params"		=> array(
											array(
												"type"			=> "textfield",												
												"heading"		=> esc_html__("Counter value", 'kraft'),
												"description"	=> esc_html__("Enter counter value.", 'kraft'),
												"param_name"	=> "counter_value",
												"admin_label"	=> true,
												"value"			=> "",
											),
											array(
												"type"			=> "textarea",
												"heading"		=> esc_html__("Counter title", 'kraft'),
												"description"	=> esc_html__( 'Enter title for counter block.', 'kraft' ),												
												"param_name"	=> "counter_title",		
												"admin_label"	=> true,										
												"value"			=> "",
											),											
										),
				),				
				array(
					"type"		=> "dropdown",
					"heading"	=> esc_html__( "Counter Separator", 'kraft' ),
					"param_name" => "counter_separator",
					"value"	=> array(
									esc_html__( "Dark", 'kraft')	=> "sep-dark",
									esc_html__( "Light", 'kraft')	=> "sep-light"											
								),					
				),				
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Counter Font size", "kraft"),
					"param_name" => "counter_font_size",
					"value" => "28px",
					"description" => esc_html__("Set counter value font size.", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Counter Font Style", "kraft"),
					"param_name" => "counter_font_style",
					"value"	=> kraft_get_selected_heading_font_styles(),
					"std" => "500",
					"description" => esc_html__("Set counter value font style.", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Counter Color", "kraft"),
					"param_name" => "counter_color",
					"value" => "#151515",				
					"description" => esc_html__("Set counter value color", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),	
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Title Font size", "kraft"),
					"param_name" => "title_font_size",
					"value" => "16px",
					"description" => esc_html__("Set counter title font size.", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Title Font Style", "kraft"),
					"param_name" => "title_font_style",
					"value"	=> kraft_get_selected_body_font_styles(),
					"std" => "400",
					"description" => esc_html__("Set counter title font style.", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Title color", "kraft"),
					"param_name" => "title_color",
					"value" => "#151515",				
					"description" => esc_html__("Set counter title color", "kraft"),					
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),				
			)
		);	
	}

}

vc_lean_map( 'kraft_counter', 'kraft_counter_vc_map' );