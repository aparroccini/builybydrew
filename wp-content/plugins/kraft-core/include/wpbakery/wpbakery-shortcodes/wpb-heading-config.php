<?php
/**
 * Registers the Heading shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_heading extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-heading.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-heading.php' ) );
		}
				
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_heading_vc_map' ) ) {		
	
	function kraft_heading_vc_map() {	   
		
		return array(
			"name"					=> esc_html__( "Heading", 'kraft' ),
			"description"			=> esc_html__( "Add heading", 'kraft' ),
			"base"					=> "kraft_heading",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-heading-icon",			
			"params"				=> array(								
				array(
					"type"			=> "textarea",
					"heading"		=> esc_html__( "Heading", "kraft" ),
					"param_name"	=> "heading",
					"admin_label"	=> true,
					"value"			=> esc_html__( "This is custom heading element", "kraft" ),
					"description"	=> esc_html__( "Enter heading.", "kraft" ),					
				),
				array(
					"type"			=> "textarea",
					"heading"		=> esc_html__( "Sub heading", "kraft" ),
					"param_name"	=> "sub_heading",
					"admin_label"	=> true,					
					"description"	=> esc_html__( "Enter subheading.", "kraft" ),					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Element tag", "kraft" ),
					"param_name"	=> "element_tag",
					"value"			=> array(
										esc_html__( "H1", "kraft" )	=> "h1",
										esc_html__( "H2", "kraft")	=> "h2",
										esc_html__( "H3", "kraft")	=> "h3",											
										esc_html__( "H4", "kraft")	=> "h4",											
										esc_html__( "H5", "kraft")	=> "h5",											
										esc_html__( "H6", "kraft")	=> "h6",											
									),					
					"description"	=> esc_html__("Select element tag.", "kraft")
				),
				array(
					"type"			=> "colorpicker",					
					"heading"		=> esc_html__("Color", "kraft"),
					"param_name"	=> "heading_color",
					"value"			=> "#151515",									
					"group"			=> esc_html__( "Style", "kraft" ),
				),	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Font size", "kraft" ),
					"param_name"	=> "font_size",
					"value"			=> array(
										esc_html__( "Inherit", "kraft" )	=> "",
										esc_html__( "38px", "kraft" )	    => "font-size-38",
										esc_html__( "28px", "kraft" )	    => "font-size-28",
										esc_html__( "24px", "kraft" )	    => "font-size-24",
										esc_html__( "22px", "kraft" )	    => "font-size-22",
										esc_html__( "20px", "kraft" )	    => "font-size-20",
										esc_html__( "18px", "kraft" )	    => "font-size-18",
										esc_html__( "16px", "kraft" )	    => "font-size-16",																		
										esc_html__( "Custom", "kraft" )	    => "font-size-custom",																		
									),					
					"description"	=> esc_html__("Select font size.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" ),
				),			
				array(
					"type"			=> "kraft_responsive",
					"heading"		=> esc_html__( "Custom Font size", "kraft" ),
					"param_name"	=> "responsive_font_size",
					"unit"			=> "px",
					"parent_class"  => "heading-custom",
					"selector"      => ".font-size-custom",
					"property"      => "font-size",
					"media"			=> array(											
											"Desktop"           => '30',
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
					"group"			=> esc_html__( "Style", "kraft" ),
				),
				array(
					"type"			=> "kraft_responsive", //"type"			=> "textfield",
					"heading"		=> esc_html__( "Line height", "kraft" ),
					"param_name"	=> "responsive_line_height",
					"unit"			=> "px",
					"parent_class"  => "heading-custom",
					"selector"      => ".heading",
					"property"      => "line-height",
					"media"			=> array(											
											"Desktop"           => '',
											"Tablet"            => '',
											"Tablet Portrait"   => '',
											"Mobile Landscape"  => '',
											"Mobile"            => '',
										),						
					"description"	=> esc_html__("Enter the line height. eg 20px", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Font weight", "kraft" ),
					"param_name"	=> "font_weight",
					"value"			=> kraft_get_selected_heading_font_styles(),
					"description"	=> esc_html__("Select font style.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Text alignment", "kraft" ),
					"param_name"	=> "text_alignment",
					"value"			=> array(
										esc_html__( "Left", "kraft" )	=> "text-left",
										esc_html__( "Right", "kraft" )	=> "text-right",
										esc_html__( "Center", "kraft")	=> "text-center",
										esc_html__( "Justify", "kraft")	=> "text-justify",											
					),					
					"description"	=> esc_html__("Select text alignment.", "kraft"),
					"group"			=> esc_html__( "Style", "kraft" ),
				),					
			)
		);	
		
	}

}
vc_lean_map( 'kraft_heading', 'kraft_heading_vc_map' );