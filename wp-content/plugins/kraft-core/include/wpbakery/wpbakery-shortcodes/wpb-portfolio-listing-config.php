<?php
/**
 * Registers the portfolio listing shortcode and adds it to the Visual Composer
 */

class WPBakeryShortCode_kraft_portfolio_listing extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		global $post;
		
		if( locate_template( 'shortcodes/wpb-portfolio-listing.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-portfolio-listing.php' ) );
		}		
		
		return ob_get_clean();
	}
}

if ( ! function_exists( 'kraft_portfolio_listing_vc_map' ) ) {		
	
	function kraft_portfolio_listing_vc_map() {	
		
		return array(
			"name"						=> esc_html__( "Portfolio Listing", 'kraft' ),
			"description"				=> esc_html__( "Recent portfolio posts listing.", 'kraft' ),
			"base"						=> "kraft_portfolio_listing",
			"category"					=> ucfirst( KRAFT_THEME_NAME ),
			"icon"						=> "kraft-portfolio-listing-icon",
			"params"					=> array(	
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Listing Layout', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "listing_type",					
					"value"				=> array(
												esc_html__( 'Full Width', 'kraft')  => 'full-width',
												esc_html__( 'Zig Zag', 'kraft')	=> 'zig-zag',																							
											),
					"description"		=> esc_html__("Set layout mode for portfolio listing.", 'kraft')
				),	
				array(
					"type"				=> "textfield",
					"admin_label"		=> true,					
					"heading"			=> esc_html__("Link Text.", 'kraft'),
					"param_name"		=> "portfolio_link_text",	
					"description"		=> esc_html__("Portfolio Link Text.", 'kraft'),					
					"value"				=> "View Project",
				),
				array(
					"type"				=> "textfield",
					"admin_label"		=> true,					
					"heading"			=> esc_html__("Number of portfolio items to display", 'kraft'),
					"param_name"		=> "no_of_items",					
					"description"		=> esc_html__("Limit the number of portfolio items to display if don't want to display all of them.", 'kraft' )		
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
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Title color', 'kraft' ),
					"param_name"	=> "title_color",									
					"description"	=> esc_html__( 'Choose title color for portfolio item.', 'kraft' ),		
					"value"			=> "#151515",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),				
				array(
					"type"			=> "colorpicker",
					"heading"		=> esc_html__( 'Description color', 'kraft' ),
					"param_name"	=> "desc_color",									
					"description"	=> esc_html__( 'Choose description color for portfolio item.', 'kraft' ),					
					"value"			=> "#707070",
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__( "Title font size", 'kraft' ),
					"param_name"	=> "title_font_size",
					"value"			=> "36px",
					"description"	=> esc_html__('Set the portfolio item title font size example 16px.','kraft'),					
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__( "Description font size", 'kraft' ),
					"param_name"	=> "desc_font_size",
					"value"			=> "15px",
					"description"	=> esc_html__('Set the portfolio item description font size example 15px.','kraft'),					
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),	
				array(
					"type"			=> "textfield",				
					"heading"		=> esc_html__( "Description line height", 'kraft' ),
					"param_name"	=> "desc_line_height",
					"value"			=> "24px",
					"description"	=> esc_html__('Set the portfolio item description line height example 24px.','kraft'),					
					"group"			=> esc_html__( 'Style', 'kraft' ),
				),			
			),
		);	
	}

}

vc_lean_map( 'kraft_portfolio_listing', 'kraft_portfolio_listing_vc_map' );