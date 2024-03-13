<?php
/**
 * Registers the team member shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_team_member extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-team-member.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-team-member.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_team_member_vc_map' ) ) {		
	
	function kraft_team_member_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Team Member", 'kraft' ),
			"description"			=> esc_html__( "Add Team member", 'kraft' ),
			"base"					=> "kraft_team_member",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-team-member-icon",			
			"params"				=> array(							
				array(
					"type"			=> "attach_image",					
					"heading"		=> esc_html__("Avatar", 'kraft'),
					"param_name"	=> "avatar_img",					
					"description"	=> esc_html__("Select the image. (Recommended size 600X700).", 'kraft')
				),
				array(
					"type"			=> "textfield",					
					"heading"		=> esc_html__("Team member title", 'kraft'),
					"param_name"	=> "member_title",
					"admin_label"	=> true,					
					"description"	=> esc_html__("Example (John Doe).", 'kraft')
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__("Team member designation", 'kraft'),
					"param_name"	=> "designation",
					"admin_label"	=> true,					
					"description"	=> esc_html__("Example (Founder).", 'kraft')
				),	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Text Alignment", "kraft" ),
					"param_name"	=> "text_alignment",
					"std" 			=> "text-center",		
					"value"			=> array(
										esc_html__( "Center", "kraft" )	=> "text-center",
										esc_html__( "Left", "kraft")	=> "text-left",											
					),					
					"description"	=> esc_html__("Select text aligment for team title and designation.", "kraft")
				),									
				array(
					"type"			=> 'checkbox',
					"heading"		=> esc_html__( "Show social media for team member", 'kraft' ),
					"param_name"	=> 'show_social_media',
					"value"			=> array(
											esc_html__("Yes.", 'kraft' )	=> 'yes',
										),					
					"description"	=> esc_html__("If checked social media will be shown. If unchecked, social media will not be shown.", 'kraft'),
					"group"			=> esc_html__( 'Social Media', 'kraft' ),
				),
				array(
					"type"			=> 'checkbox',
					"heading"		=> esc_html__( "Show social media as icons", 'kraft' ),
					"param_name"	=> 'social_media_icons',
					"value"			=> array(
											esc_html__("Yes.", 'kraft' )	=> 'yes',
										),					
					"description"	=> esc_html__("If checked social media will be shown as icons.", 'kraft'),
					"group"			=> esc_html__( 'Social Media', 'kraft' ),
				),
				array(
					"type"			=> "param_group",
					"heading"		=> esc_html__( 'Social Media', 'kraft' ),
					"param_name"	=> "social_media",					
					"value"			=> urlencode( json_encode( array(
										array(
											'media_title'	=> 'Facebook',
											'media_url'		=> 'http://www.facebook.com',											
										),
										array(
											'media_title'	=> 'Twitter',
											'media_url'		=> 'http://www.twitter.com',											
										),
										array(
											'media_title'	=> 'Behance',
											'media_url'		=> 'http://www.behance.com',											
										),
										) ) ),					
					"params"		=> array(
											array(
												"type"			=> "textfield",												
												"heading"		=> esc_html__("Social media title", 'kraft'),
												"param_name"	=> "media_title",
												"admin_label"	=> true,											
												"description"	=> esc_html__("Enter social media text.", 'kraft')
											),											
											array(
												"type"			=> "textfield",
												"heading"		=> esc_html__("URL", 'kraft'),												
												"param_name"	=> "media_url",
												"admin_label"	=> true,
												"description"	=> esc_html__("Enter URL for the social media.",'kraft')
											),											
										),
					"group"			=> esc_html__( "Social Media", "kraft" ),
				),		
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "Title",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Font size", "kraft"),
					"param_name" => "title_font_size",
					"value" => "20px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Font weight", "kraft"),
					"param_name" => "title_font_weight",
					"value"	=> kraft_get_selected_heading_font_styles(),
					"std" => "500",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "title_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),	
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "Designation",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "textfield",					
					"heading" => esc_html__("Font size", "kraft"),
					"param_name" => "desig_font_size",
					"value" => "14px",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),				
				array(
					"type" => "dropdown",					
					"heading" => esc_html__("Font weight", "kraft"),
					"param_name" => "desig_font_weight",
					"value"	=> kraft_get_selected_body_font_styles(),
					"std" => "400",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),			
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "desig_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),		
				array(
					"type" => "kraft_heading_label",								
					"param_name" => "heading_label",
					"text" => "Social Icons",							
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type" => "colorpicker",					
					"heading" => esc_html__("Color", "kraft"),
					"param_name" => "social_icon_color",
					"value" => "#151515",									
					'group'	=> esc_html__( 'Style', 'kraft' ),
				),		
			)
		);	
	}

}

vc_lean_map( 'kraft_team_member', 'kraft_team_member_vc_map' );