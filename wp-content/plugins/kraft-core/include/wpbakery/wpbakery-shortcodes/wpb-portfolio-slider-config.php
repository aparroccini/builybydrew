<?php
/**
 * Registers the portfolio slider shortcode and adds it to the Visual Composer
 */

class WPBakeryShortCode_kraft_portfolio_slider extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		global $post;
		
		if( isset( $atts[ 'slider_type' ] ) && $atts[ 'slider_type' ] == 'split-projects' ) { 
			
			if( locate_template( 'shortcodes/wpb-portfolio-split-slider.php' ) != '' ) {
				include( locate_template( 'shortcodes/wpb-portfolio-split-slider.php' ) );
			}						
		}
		else {			
		
			if( locate_template( 'shortcodes/wpb-portfolio-slider.php' ) != '' ) {
				include( locate_template( 'shortcodes/wpb-portfolio-slider.php' ) );
			}
		}
		
		return ob_get_clean();
	}
}

if ( ! function_exists( 'kraft_portfolio_slider_vc_map' ) ) {		
	
	function kraft_portfolio_slider_vc_map() {	
		
		return array(
			"name"						=> esc_html__( "Portfolio Slider", 'kraft' ),
			"description"				=> esc_html__( "Recent portfolio posts slider.", 'kraft' ),
			"base"						=> "kraft_portfolio_slider",
			"category"					=> ucfirst( KRAFT_THEME_NAME ),
			"icon"						=> "kraft-portfolio-slider-icon",
			"params"					=> array(	
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Slider Layout', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "slider_type",					
					"value"				=> array(
												esc_html__( 'Single Slide Slider', 'kraft')    => 'single-project',
												esc_html__( 'Multiple Slide Slider', 'kraft')	=> 'multiple-projects',											
												esc_html__( 'Split Slide Slider', 'kraft')	=> 'split-projects',											
												esc_html__( 'Full Width Slide Slider', 'kraft')	=> 'fullwidth-projects',											
											),
					"description"		=> esc_html__("Set layout mode for portfolio slider.", 'kraft')
				),	
				array(
					"type"				=> "textfield",
					"admin_label"		=> true,					
					"heading"			=> esc_html__("Link Text.", 'kraft'),
					"param_name"		=> "portfolio_slider_text",	
					"description"		=> esc_html__("Portfolio Slide Link Text.", 'kraft'),
					"dependency"		=> array(
											"element"	=> 'slider_type',
											"value"		=> array( 'single-project', 'fullwidth-projects' ),
										),		
					"value"				=> "View Project",
				),
				array(
					"type"				=> "textfield",
					"admin_label"		=> true,					
					"heading"			=> esc_html__("Number of portfolio items to display", 'kraft'),
					"param_name"		=> "no_of_items",					
					"description"		=> esc_html__("Limit the number of portfolio items in slide show if don't want to display all of them.", 'kraft' )		
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Order by", "kraft" ),
					"param_name"	=> "orderby",
					"value"			=> array(						
										esc_html__( "Date", "kraft" )			=> "date",
										esc_html__( "ID", "kraft" )				=> "ID",
										esc_html__( "Author", "kraft" )			=> "author",
										esc_html__( "Title", "kraft" )			=> "title",
										esc_html__( "Last Modified", "kraft" )	=> "modified",	
										esc_html__( "Random", "kraft" )			=> "rand",				
										esc_html__( "Custom Sort", "kraft" )	=> "menu_order",
										esc_html__( "Inherit", "kraft" )		=> "inherit",
									),								
				),
				array(
					"type"				=> "dropdown",				
					"heading"			=> esc_html__("Order arrangement", 'kraft'),
					"param_name"		=> "order",
					"value"				=> array(
											esc_html__('Ascending', 'kraft')	=>	'ASC',
											esc_html__('Descending', 'kraft')	=>	'DESC',
											esc_html__( "Inherit", "kraft" )		=> "inherit"
											),				
					"description"		=> esc_html__( "Choose the order in which the portfolio items has to be displayed.", 'kraft' ),				
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Exclude/Include portfolio categories', 'kraft' ),
					"param_name"		=> "categories_flag",
					"value"				=> array(
												esc_html__('Exclude', 'kraft') => 'exclude',
												esc_html__('Include', 'kraft') => 'include',												
											),				
					"std"				=> 'exclude',
					"description"		=> esc_html__( "Select exclude/include the portfolio categories in list below.", 'kraft' ),								
				),				
				array(
					"type"				=> "textfield",
					"heading"			=> esc_html__( "List portfolio categories", 'kraft' ),
					"param_name"		=> "exclude_categories",
					"description"		=> esc_html__( "Enter portfolio categories slug to exclude/include those records (Note: separate values by commas (,)). Example branding,mobile-app.", 'kraft' ),					
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Exclude/Include portfolio items', 'kraft' ),
					"param_name"		=> "portfolio_items_flag",
					"value"				=> array(
												esc_html__('Exclude', 'kraft') => 'exclude',
												esc_html__('Include', 'kraft') => 'include',												
											),				
					"std"				=> 'exclude',
					"description"		=> esc_html__( "Check to exclude the portfolio items in list below.", 'kraft' ),						
				),			
				array(
					"type"				=> "textfield",
					"heading"			=> esc_html__( "List portfolio items", 'kraft' ),
					"param_name"		=> "exclude_portfolio",
					"description"		=> esc_html__( "Enter portfolio IDs to exclude/include those records (Note: separate values by commas (,)).Example 2533,231.", 'kraft' ),					
				),					
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Slider per view', 'kraft' ),					
					"param_name"		=> "slider_per_view",					
					"value"				=> array(
												esc_html__( '2 Slide', 'kraft')    => '2',
												esc_html__( '3 Slide', 'kraft')    => '3',
												esc_html__( '4 Slide', 'kraft')    => '4',											
											),
					"dependency"		=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),		
					"group"				=> esc_html__( 'Slide Settings', 'kraft' ),
				),		
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Space between slides", 'kraft' ),
					"param_name"		=> "vertical_space",
					"dependency"		=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),
					"value"				=> "30",
					"description"		=> esc_html__('Distance between slides in px.','kraft'),		
					"dependency"		=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),		
					"group"				=> esc_html__( 'Slide Settings', 'kraft' ),
				),		
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Centered slides", 'kraft' ),
					"param_name"	=> "centered_slides",					
					"value"			=> array(
										 esc_html__( 'Yes', 'kraft' ) => 'yes',						
									   ),
					"description"	=> esc_html__( "If checked, then active slide will be centered, not always on the left side.", 'kraft' ),
					"std"			=> "yes",
					"dependency"		=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),		
					"group"				=> esc_html__( 'Slide Settings', 'kraft' ),
				),			
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Loop", 'kraft' ),
					"param_name"	=> "loop",					
					"value"			=> array(
										 esc_html__( 'Yes', 'kraft' ) => 'yes',						
									   ),
					"description"	=> esc_html__( "Set to true to enable continuous loop mode.", 'kraft' ),
					"std"			=> "yes",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"				=> esc_html__( 'Slide Settings', 'kraft' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Transition effect', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "tranisition_effect",					
					"value"			=> array(
											esc_html__( 'Slide', 'kraft')    => 'slide',
											esc_html__( 'Fade', 'kraft')	=> 'fade',											
										),
					"description"	=> esc_html__("Set transition effect for portfolio slide.", 'kraft'),
					"std"			=> "slide",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"			=> esc_html__( 'Slide Settings', 'kraft' ),
				),	
				array(
					"type"				=> "dropdown",				
					"heading"			=> esc_html__("Content position", 'kraft'),
					"param_name"		=> "content_position",
					"value"				=> array(
											esc_html__('Content overlay', 'kraft')		=>	'overlay',
											esc_html__('Content under image', 'kraft')	=>	'under-image'
											),			
					"dependency"		=> array(
												'element'	=> 'slider_type',
												'value'		=> 'multiple-projects',
											),	
					"description"		=> esc_html__( "Choose the content positioning for the portfolio item", 'kraft' ),
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),			
				array(
					"type"				=> "dropdown",					
					"heading"			=> esc_html__( "Hover Effect", 'kraft' ),
					"param_name"		=> "overlay_caption_animation",
					"value"				=> array(													
												esc_html__( 'Ribbon', 'kraft' )		=> 'ribbon',												
											),
					"dependency"		=> array(
												'element'	=> 'content_position',
												'value'		=> 'overlay',
											),	
					"description"		=> esc_html__( 'Choose the hover effect for portfolio item.', 'kraft' ),	
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),	
				array(
					"type"				=> "dropdown",					
					"heading"			=> esc_html__( "Hover Effect", 'kraft' ),
					"param_name"		=> "under_image_caption_animation",
					"value"				=> array(												
												esc_html__( 'None', 'kraft' )	    => 'none',																				
												esc_html__( 'Overlay', 'kraft' )	=> 'overlay',											
											),
					"dependency"		=> array(
												'element'	=> 'content_position',
												'value'		=> 'under-image',
											),	
					"description"		=> esc_html__( 'Choose the hover effect for portfolio item.', 'kraft' ),	
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Hover color', 'kraft' ),
					"param_name"	=> "hover_color",									
					"description"	=> esc_html__( 'Choose the color on hover for portfolio item.', 'kraft' ),
					"dependency"	=> array(
											'element'	=> 'content_position',
											'value'		=> 'overlay',
										),	
					"value"			=> "rgba(0, 0, 0, 0.9)",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Hover color', 'kraft' ),
					"param_name"	=> "single_slider_hover_color",									
					"description"	=> esc_html__( 'Choose the color on hover for portfolio item.', 'kraft' ),
					"dependency"	=> array(
											'element'	=> 'slider_type',
											'value'		=> 'single-project',
										),	
					"value"			=> "rgba(255, 255, 255, 0.9)",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Title color', 'kraft' ),
					"param_name"	=> "title_color",									
					"description"	=> esc_html__( 'Choose title color for portfolio item.', 'kraft' ),		
					"value"			=> "rgba(255, 255, 255, 0.9)",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),				
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Subtitle color', 'kraft' ),
					"param_name"	=> "subtitle_color",									
					"description"	=> esc_html__( 'Choose subtitle color for portfolio item.', 'kraft' ),					
					"value"			=> "rgba(255, 255, 255, 0.8)",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__( "Title font size", 'kraft' ),
					"param_name"	=> "title_font_size",
					"value"			=> "16px",
					"description"	=> esc_html__('Set the portfolio item title font size example 20px.','kraft'),					
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__( "Subtitle font size", 'kraft' ),
					"param_name"	=> "subtitle_font_size",
					"value"			=> "13px",
					"description"	=> esc_html__('Set the portfolio item subtitle font size example 14px.','kraft'),					
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Show Navigation", 'kraft' ),
					"description"	=> esc_html__( "Choose to show slider navigation", 'kraft' ),
					"param_name"	=> "navigation",					
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),				
					"std"			=> "yes",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),				
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Show pagination", 'kraft' ),
					"description"	=> esc_html__( "Check to show the slider pagination.", 'kraft' ),
					"param_name"	=> "pagination",					
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),
					"std"			=> "yes",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Pagination type', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "pagination_type",					
					"value"			=> array(
											esc_html__( 'Bullets', 'kraft') => 'bullets',
											esc_html__( 'Fraction', 'kraft') => 'fraction',											
										),				
					"std"			=> "slide",
					"dependency"	=> array(
											"element"	=> 'pagination',
											"value"		=> 'yes',
										),		
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),		
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Autoplay Delay", 'kraft' ),
					"param_name"	=> "slideshow_speed",
					"description"	=> esc_html__( 'Specify slideshow speed (in milliseconds). Default is 3500.', 'kraft' ),
					"value"			=> "3500",		
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),			
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Disable on interaction", 'kraft' ),
					"description"	=> esc_html__( "Set to No and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction.", 'kraft' ),
					"param_name"	=> "disable_on_interaction",					
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),				
					"std"			=> "yes",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"     => array( 'single-project', 'multiple-projects','fullwidth-projects' )											
										),		
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),		
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Slider Controls Scheme', 'kraft' ),				
					"param_name"	=> "slider_controls_scheme",					
					"value"			=> array(
											esc_html__( 'Dark Scheme', 'kraft')   => 'dark-controls',
											esc_html__( 'Light Scheme', 'kraft')	=> 'light-controls',											
										),
					"description"	=> esc_html__("Set controls scheme for sliders navigation/pagination as per your requirement from here.", 'kraft'),
					"std"			=> "dark-controls",				
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),		
				
				
				// Responsive Settings			
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet', 'kraft' ),
					"param_name"	=> "tablet",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),
					"value"			=> "3",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablets.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Mobile', 'kraft' ),
					"param_name"	=> "mobile",
					"dependency"	=> array(
											"element"	=> 'slider_type',
											"value"		=> 'multiple-projects',
										),
					"value"			=> "2",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on mobile landscape view.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),				
			),
		);	
	}

}

vc_lean_map( 'kraft_portfolio_slider', 'kraft_portfolio_slider_vc_map' );