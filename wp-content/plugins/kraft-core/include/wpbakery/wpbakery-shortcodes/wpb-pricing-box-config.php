<?php
/**
 * Registers the pricing box shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_pricing_box extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-pricing-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-pricing-box.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_pricing_box_vc_map' ) ) {		
	
	function kraft_pricing_box_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Pricing Box", 'kraft' ),
			"description"			=> esc_html__( "Add Pricing Box", 'kraft' ),
			"base"					=> "kraft_pricing_box",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-pricing-box-icon",			
			"params"				=> array(								
				array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Title", 'kraft'),
						"description"	=> esc_html__("Enter title for pricing box.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "title",
						"value"			=> "Title",						
				),	
				array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Price", 'kraft'),
						"description"	=> esc_html__("Enter the price and separate with a pipe | if you want to have subtitle.", 'kraft'),
						"admin_label"	=> true,
						"param_name"	=> "price",
						"value"			=> "$29|per hour",						
				),		
				array(
					"type"			=> "textarea_html",					
					"heading"		=> esc_html__( "Body", 'kraft' ),
					"param_name"	=> "content",
					"value"			=> '<ul>
											<li>upto 30 photos</li>
                                            <li>high quality camera</li>
                                            <li>retouched photos</li>
                                            <li>no photoproofing</li>
                                            <li>no stylist assistance</li>
										</ul>',
					"description"	=> esc_html__("Enter body text line. Every new line is a block.", 'kraft'),					
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
			)
		);	
		
	}

}

vc_lean_map( 'kraft_pricing_box', 'kraft_pricing_box_vc_map' );