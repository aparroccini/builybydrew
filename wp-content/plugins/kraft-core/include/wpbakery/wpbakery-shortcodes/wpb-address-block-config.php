<?php

/**
 * Register Address Block shortcode with VC Composer 
 */

class WPBakeryShortCode_kraft_address_block extends WPBakeryShortCode {
		
	protected function content( $atts, $content = null ) {
		
		ob_start();		
		
		if( locate_template( 'shortcodes/wpb-address-block.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-address-block.php' ) );
		}
		
		return ob_get_clean();
	}	
	
}

if ( ! function_exists( 'kraft_address_block_vc_map' ) ) {
	
	function kraft_address_block_vc_map() {
	
	return array (			
				"name"					=> esc_html__( "Address Block", 'kraft' ),
				"description"			=> esc_html__( "Show off your contact data", 'kraft' ),
				"base"					=> "kraft_address_block",
				"icon" 					=> "kraft-address-block-icon",
				"category"				=> ucfirst( KRAFT_THEME_NAME ),			
				"params"				=> array(
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Phone number title", 'kraft'),
						"description"	=> esc_html__("Enter label for phone number. For example, phone number, contact number, etc.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "phone_title",
						"value"			=> "Phone",
						
					),		
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Phone number", 'kraft'),
						"description"	=> esc_html__("Enter phone number.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "phone",
						"value"			=> "022844 998 234",						
					),
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Fax number title", 'kraft'),
						"description"	=> esc_html__("Enter label for fax number. For example, fax, fax number, etc.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "fax_no_title",
						"value"			=> "Fax",						
					),	
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Fax number", 'kraft'),
						"description"	=> esc_html__("Enter fax number.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "fax",
						"value"			=> "022844 998 555",						
					),		
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Email title", 'kraft'),
						"description"	=> esc_html__("Enter label for email address. For example, email, email address, etc.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "email_title",
						"value"			=>  "Email",						
					),
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("E-mail", 'kraft'),
						"description"	=> esc_html__("Enter email address.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "email",
						"value"			=>  "kraft@gmail.com",						
					),				
					array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Address title", 'kraft'),
						"description"	=> esc_html__("Enter label for address. For example, address, mailing address, etc.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "address_title",					
						"value"			=> "Address",						
					),
					array(
						"type"			=> "textarea",					
						"heading"		=> esc_html__("Address", 'kraft'),
						"description"	=> esc_html__("Enter address.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "address",
						"value"			=> "833 Indian Summer Court Carol Stream, IL 60188",							
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Phone Title",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "phone_font_size",
						"value" => "18px",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "phone_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "500",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "phone_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Phone No",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "phone_no_font_size",
						"value" => "15px",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "phone_no_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "400",							
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "phone_no_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Phone Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Fax Title",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "fax_font_size",
						"value" => "18px",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "fax_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "500",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "fax_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Fax No",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "fax_no_font_size",
						"value" => "15px",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "fax_no_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "400",							
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "fax_no_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Fax Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Email Title",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "email_font_size",
						"value" => "18px",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "email_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "500",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "email_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Email Id",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "email_id_font_size",
						"value" => "15px",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "email_id_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "400",							
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "email_id_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Email Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Address Title",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "add_font_size",
						"value" => "18px",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "add_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "500",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "add_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),	
					array(
						"type" => "kraft_heading_label",								
						"param_name" => "heading_label",
						"text" => "Address",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),
					array(
						"type" => "textfield",					
						"heading" => esc_html__("Font size", "kraft"),
						"param_name" => "address_font_size",
						"value" => "15px",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),
					array(
						"type" => "dropdown",					
						"heading" => esc_html__("Font weight", "kraft"),
						"param_name" => "address_font_weight",
						"value"	=> kraft_get_selected_body_font_styles(),
						"std" => "400",							
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),			
					array(
						"type" => "colorpicker",					
						"heading" => esc_html__("Color", "kraft"),
						"param_name" => "address_color",
						"value" => "#151515",									
						'group'	=> esc_html__( 'Address Style', 'kraft' ),
					),	
				)
			);
	
}

}

vc_lean_map( 'kraft_address_block', 'kraft_address_block_vc_map' );
