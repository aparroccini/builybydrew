<?php
/**
 * Registers the subscription form shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_subscription_form extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-subscription-form.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-subscription-form.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_subscription_form_vc_map' ) ) {		
	
	function kraft_subscription_form_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Subscription Form", 'kraft' ),
			"description"			=> esc_html__( "Add subscription form", 'kraft' ),
			"base"					=> "kraft_subscription_form",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-subscription-form-icon",			
			"params"				=> array(											
				array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Title", 'kraft'),
						"description"	=> esc_html__("Enter title for subscription form.", 'kraft'),					
						"param_name"	=> "title",
						"value"			=> "Subscription form",						
				),
				array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Subtitle", 'kraft'),
						"description"	=> esc_html__("Enter subtitle for subscription form.", 'kraft'),					
						"param_name"	=> "subtitle",
						"value"			=> "Subscribe to our weekly newsletter.",						
				),
				array(
						"type"			=> "textfield",					
						"heading"		=> esc_html__("Placeholder text", 'kraft'),
						"description"	=> esc_html__("Enter placeholder text for form input field.", 'kraft'),					
						"param_name"	=> "placeholder_text",
						"value"			=> "Email address",						
				),						
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Button Text", 'kraft'),
					"param_name"	=> "button_text",					
					"description"	=> esc_html__("Enter text for form button.", 'kraft'),	
					"value"			=> "Sign up",	
				),
				array(
					"type"			=> "textfield",					
					"heading"		=> esc_html__("Mailchimp Form URL", 'kraft'),
					"description"	=> esc_html__("Enter Mailchimp form action URL.", 'kraft'),
					"admin_label"	=> true,
					"param_name"	=> "action_url",						
					'group'			=> esc_html__( 'Mailchimp Settings', 'kraft' ),
				),	
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'User Id', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "user_id",
					"description"	=> esc_html__('Enter your mailchimp user id.','kraft'),
					'group'			=> esc_html__( 'Mailchimp Settings', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'List Id', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "list_id",
					"description"	=> esc_html__('Enter your mailchimp list id.','kraft'),
					'group'			=> esc_html__( 'Mailchimp Settings', 'kraft' ),
				),
			)
		);	
	}

}

vc_lean_map( 'kraft_subscription_form', 'kraft_subscription_form_vc_map' );