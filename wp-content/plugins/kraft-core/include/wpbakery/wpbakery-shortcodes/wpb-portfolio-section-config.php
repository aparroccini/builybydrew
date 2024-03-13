<?php
/**
 * Registers the portfolio section shortcode and adds it to the Visual Composer
 */

class WPBakeryShortCode_kraft_portfolio_section extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		global $post;
		
		if( locate_template( 'shortcodes/wpb-portfolio-section.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-portfolio-section.php' ) );
		}
		
		return ob_get_clean();
	}
}


if ( ! function_exists( 'kraft_portfolio_section_vc_map' ) ) {		
	
	function kraft_portfolio_section_vc_map() {	
		
		return array(
			"name"						=> esc_html__( "Portfolio Section", 'kraft' ),
			"description"				=> esc_html__( "Recent portfolio posts section.", 'kraft' ),
			"base"						=> "kraft_portfolio_section",
			"category"					=> ucfirst( KRAFT_THEME_NAME ),
			"icon"						=> "kraft-portfolio-section-icon",			
			"params"					=> array(	
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Portfolio section layout', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "portfolio_layout",					
					"value"				=> array(
												esc_html__( 'Grid', 'kraft')    => 'grid',
												esc_html__( 'Masonry', 'kraft')    => 'masonry',
												esc_html__( 'Mosaic', 'kraft')	=> 'mosaic',											
											),
					"description"		=> esc_html__("Set layout mode for portfolio.", 'kraft')
				),			
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Portfolio columns', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "portfolio_columns",							
					"value"				=> array(
												esc_html__( '1 Column', 'kraft')   => '1',
												esc_html__( '2 Column', 'kraft')   => '2',
												esc_html__( '3 Column', 'kraft')   => '3',
												esc_html__( '4 Column', 'kraft')   => '4',											
												esc_html__( '5 Column', 'kraft')   => '5',											
												esc_html__( '6 Column', 'kraft')   => '6',
												esc_html__( '7 Column', 'kraft')   => '7',											
												esc_html__( '8 Column', 'kraft')   => '8',
											),
					"description"		=> esc_html__("Set the number of columns for portfolio items in a section. (columns range should be from 1 - 8)", 'kraft')
				),				
				array(
					"type"				=> "textfield",
					"admin_label"		=> true,					
					"heading"			=> esc_html__("Number of portfolio items to display", 'kraft'),
					"param_name"		=> "no_of_items",					
					"description"		=> esc_html__('Limit the number of portfolio items to be displayed in a portfolio section if want to display them on button click or on scroll.(Note: Leave blank if dont want to limit).', 'kraft')
				),
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Horizontal Space", 'kraft' ),
					"param_name"		=> "horizontal_space",
					"value"				=> "30",
					"description"		=> esc_html__('Set the horizontal space between each portfolio items, Example 30. The value is in px.','kraft'),					
				),
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Vertical Space", 'kraft' ),
					"param_name"		=> "vertical_space",
					"value"				=> "30",
					"description"		=> esc_html__('Set the vertical space between each portfolio items, Example 30. The value is in px.','kraft'),					
				),
				array(
					"type"				=> "checkbox",
					"heading"			=> esc_html__( 'Load more feature', 'kraft' ),
					"param_name"		=> "load_more_feature",
					"value"				=> array(
											esc_html__( 'Yes', 'kraft' )	=> 'yes',
											),				
					"description"		=> esc_html__( "Check to enable load more feature for portfolio section.", 'kraft' ),					
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Load more portfolio items on", 'kraft' ),
					"param_name"	=> "load_more_using",
					"dependency"	=> array(
										'element'	=> 'load_more_feature',
										'not_empty'	=> true,
										),	
					"value"			=> array(						
										esc_html__( "Button click", 'kraft')	=> "click",
										esc_html__( "Scroll", 'kraft' )			=> "auto",						
									),			
					"description"	=> esc_html__( "Choose how to load more porfolio items.", 'kraft' ),	
				),
				array(
					"type"			=> "textfield",							
					"heading"		=> esc_html__("Number of portfolio items to load", 'kraft'),
					"param_name"	=> "load_no_of_items",
					"dependency"	=> array(
										'element'	=> 'load_more_feature',
										'not_empty'	=> true,
									),					
					"description"	=> esc_html__( 'Limit the number of portfolio items to be load in a portfolio section on click or on scroll.', 'kraft')
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Button text", 'kraft' ),
					"param_name"	=> "button_text",
					"dependency"	=> array(
										'element'	=> 'load_more_using',
										'value'		=> 'click',
										),
					"value"			=> 'Load more',
					"description"	=> esc_html__( "Enter button text for initial state. For example, load more, more items, etc.", 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Button loading text", 'kraft' ),
					"param_name"	=> "button_loading_text",
					"dependency"	=> array(
										'element'	=> 'load_more_using',
										'value'		=> 'click',
										),	
					"value"			=> 'LOADING...',
					"description"	=> esc_html__( "Enter button text for loading state. For example, loading etc.", 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Button after load text", 'kraft' ),
					"param_name"	=> "button_load_text",
					"dependency"	=> array(
										'element'	=> 'load_more_using',
										'value'		=> 'click',
										),	
					"value"			=> 'No more works',
					"description"	=> esc_html__( "Enter button text for later state. For example, no more item, no more works, etc.", 'kraft' ),
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
					"group"				=> esc_html__( 'Query', 'kraft' ),
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
					"group"				=> esc_html__( 'Query', 'kraft' ),
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
					"group"				=> esc_html__( 'Query', 'kraft' ),
				),
				array(
					"type"				=> "textfield",
					"heading"			=> esc_html__( "List portfolio categories", 'kraft' ),
					"param_name"		=> "exclude_categories",
					"description"		=> esc_html__( "Enter portfolio categories slug to exclude/include those records (Note: separate values by commas (,)). Example branding,mobile-app.", 'kraft' ),
					"group"				=> esc_html__( 'Query', 'kraft' ),
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
					"group"				=> esc_html__( 'Query', 'kraft' ),
				),
				array(
					"type"				=> "textfield",
					"heading"			=> esc_html__( "List portfolio items", 'kraft' ),
					"param_name"		=> "exclude_portfolio",
					"description"		=> esc_html__( "Enter portfolio IDs to exclude/include those records (Note: separate values by commas (,)).Example 2533,231.", 'kraft' ),
					"group"				=> esc_html__( 'Query', 'kraft' ),
				),				
				array(
					"type"				=> "dropdown",				
					"heading"			=> esc_html__("Content position", 'kraft'),
					"param_name"		=> "content_position",
					"value"				=> array(
											esc_html__('Content overlay', 'kraft')		=>	'overlay',
											esc_html__('Content under image', 'kraft')	=>	'under-image'
											),				
					"description"		=> esc_html__( "Choose the content positioning for the portfolio item", 'kraft' ),
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"				=> "dropdown",				
					"heading"			=> esc_html__("Content alignment", 'kraft'),
					"param_name"		=> "content_alignment",
					"value"				=> array(
											esc_html__('Left', 'kraft')	=>	'alignLeft',
											esc_html__('Center', 'kraft')	=>	'alignCenter'
											),				
					"description"		=> esc_html__( "Choose the content alignment for the portfolio item", 'kraft' ),
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),		
				array(
					"type"				=> "dropdown",					
					"heading"			=> esc_html__( "Hover Effect", 'kraft' ),
					"param_name"		=> "overlay_caption_animation",
					"value"				=> array(
												esc_html__( 'None', 'kraft' )	             => 'none',	
												esc_html__( 'Push Top', 'kraft' )			 => 'pushTop',
												esc_html__( 'Reveal Bottom', 'kraft' )		 => 'revealBottom',
												esc_html__( 'Move Right', 'kraft' )			 => 'moveRight',
												esc_html__( 'Overlay Right Along', 'kraft' ) => 'overlayRightAlong',                        
												esc_html__( 'Minimal', 'kraft' )			 => 'minimal',                        
												esc_html__( 'Fade In', 'kraft' )			 => 'fadeIn',
												esc_html__( 'Opacity', 'kraft' )			 => 'opacity',
												esc_html__( 'Zoom', 'kraft' )				 => 'zoom',
												esc_html__( 'Ribbon', 'kraft' )				 => 'ribbon',
												esc_html__( 'Shrink', 'kraft' )				 => 'shrink',
												esc_html__( 'Overlay Bottom', 'kraft' )		 => 'overlayBottom',
												esc_html__( 'Overlay Bottom Push', 'kraft' )   => 'overlayBottomPush',
												esc_html__( 'Overlay Bottom Reveal', 'kraft' ) => 'overlayBottomReveal',
												esc_html__( 'Overlay Bottom Along', 'kraft' )  => 'overlayBottomAlong'
											),
					"dependency"	=> array(
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
												esc_html__( 'Zoom', 'kraft' )	    => 'zoom',											
												esc_html__( 'Overlay', 'kraft' )	=> 'custom-overlay',											
												esc_html__( 'Tilt', 'kraft' )		=> 'tilt',											
											),
					"dependency"	=> array(
											'element'	=> 'content_position',
											'value'		=> 'under-image',
										),	
					"description"		=> esc_html__( 'Choose the hover effect for portfolio item.', 'kraft' ),	
					"group"				=> esc_html__( 'Style', 'kraft' ),
				),
				array(
					"type"				=> "dropdown",					
					"heading"			=> esc_html__( "Display type", 'kraft' ),
					"param_name"		=> "display_type",
					"value"				=> array(												
												esc_html__( 'Default', 'kraft' )		=> 'default',																								
												esc_html__( 'Scroll FadeIn', 'kraft' )	=> 'scroll-fadeIn',											
												esc_html__( 'Scroll FadeInUp', 'kraft' ) => 'scroll-fadeInUp',											
											),				
					"description"		=> esc_html__( 'Display portfolio content with animation.', 'kraft' ),	
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
					"type"				=> "checkbox",
					"heading"			=> esc_html__( 'Show category filter', 'kraft' ),
					"param_name"		=> "show_filter",
					"value"				=> array(
											esc_html__( 'Yes', 'kraft' )	=> 'yes',
											),
					"std"				=> 'yes',
					"description"		=> esc_html__( "Check to show the filters in a portfolio section.", 'kraft' ),					
					"group"				=> esc_html__( 'Filter', 'kraft' ),
				),
				array(
					"type"				=> 'checkbox',
					"heading"			=> esc_html__( "Show Sub category", 'kraft' ),
					"param_name"		=> 'show_sub_category',							
					"value"				=> array(
											esc_html__( 'Yes', 'kraft' )	=> 'yes',
											),
					"std"				=> 'no',		
					"description"		=> esc_html__( "Check to show sub categories filter in portfolio section.", 'kraft' ),						
					"dependency"		=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),					
					"group"				=> esc_html__( "Filter", "kraft" )				
				),
				array(
					"type"				=> 'checkbox',
					"heading"			=> esc_html__( "Show All category", 'kraft' ),
					"param_name"		=> 'show_all_category',							
					"value"				=> array(
											esc_html__( 'Yes', 'kraft' )	=> 'yes',
											),
					"std"				=> 'yes',		
					"description"		=> esc_html__( "Check to show/hide 'All' categories by default in portfolio section.", 'kraft' ),						
					"dependency"		=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),					
					"group"				=> esc_html__( "Filter", "kraft" )				
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Category All text", 'kraft' ),
					"param_name"	=> "category_all_text",
					"dependency"	=> array(
											'element'	=> 'show_all_category',
											'not_empty'	=> true,
										),
					"description"		=> esc_html__( "Only applicable if Use theme as multilingual is on in Theme option > General tab.", 'kraft' ),						
					"value"			=> 'All',	
					"group"			=> esc_html__( "Filter", "kraft" )			
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Filter position', 'kraft' ),
					"param_name"		=> "filter_position",
					"value"				=> array(											
											esc_html__( 'Left', 'kraft')	=> 'text-left',
											esc_html__( 'Center', 'kraft')	=> 'text-center',											
											esc_html__( 'Right', 'kraft')	=> 'text-right',
											esc_html__( 'Justify', 'kraft')	=> 'text-justified',											
											),
					"dependency"	=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),						
					"description"		=> esc_html__( "Choose the position of a filter in portfolio section.", 'kraft' ),	
					"group"				=> esc_html__( 'Filter', 'kraft' ),
				),				
				array(
					"type"				=> "dropdown",					
					"heading"			=> esc_html__( "Filter animation", 'kraft' ),
					"param_name"		=> "filter_animation",
					"value"				=> array(
											esc_html__( 'fadeOut', 'kraft' ) => 'fadeOut',
											esc_html__( 'quicksand', 'kraft' ) => 'quicksand',
											esc_html__( 'bounceLeft', 'kraft' ) => 'bounceLeft',
											esc_html__( 'bounceTop', 'kraft' ) => 'bounceTop',
											esc_html__( 'bounceBottom', 'kraft' ) => 'bounceBottom',
											esc_html__( 'moveLeft', 'kraft' ) => 'moveLeft',
											esc_html__( 'slideLeft', 'kraft' ) => 'slideLeft',
											esc_html__( 'fadeOutTop', 'kraft' ) => 'fadeOutTop',
											esc_html__( 'sequentially', 'kraft' ) => 'sequentially',
											esc_html__( 'skew', 'kraft' ) => 'skew',
											esc_html__( 'slideDelay', 'kraft' ) => 'slideDelay',
											esc_html__( '3dFlip', 'kraft' ) => '3dflip',
											esc_html__( 'rotateSides', 'kraft' ) => 'rotateSides',
											esc_html__( 'flipOutDelay', 'kraft' ) => 'flipOutDelay',
											esc_html__( 'flipOut', 'kraft' ) => 'flipOut',
											esc_html__( 'unfold', 'kraft' ) => 'unfold',
											esc_html__( 'foldLeft', 'kraft' ) => 'foldLeft',
											esc_html__( 'scaleDown', 'kraft' ) => 'scaleDown',
											esc_html__( 'scaleSides', 'kraft' ) => 'scaleSides',
											esc_html__( 'frontRow', 'kraft' ) => 'frontRow',
											esc_html__( 'flipBottom', 'kraft' ) => 'flipBottom',
											esc_html__( 'rotateRoom' , 'kraft' ) => 'rotateRoom',
											),
					"description"		=> esc_html__( 'Choose the filter animation. Animation occurs when portfolio items are filtered.', 'kraft' ),
					"dependency"		=> array(
											'element'	=> 'show_filter',
											'not_empty' => true,
											),
					"group"				=> esc_html__( 'Filter', 'kraft' ),				
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( "Filter order by", "kraft" ),
					"param_name"	=> "filter_orderby",
					"value"			=> array(						
											esc_html__( "Name", "kraft" )		=> "name",
											esc_html__( "ID", "kraft" )			=> "term_id",
											esc_html__( "Count", "kraft" )		=> "count",
											esc_html__( "Slug", "kraft" )		=> "slug",											
										),
					"dependency"	=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),					
					"group"			=> esc_html__( 'Filter', 'kraft' ),
				),
				array(
					"type"			=> "dropdown",				
					"heading"		=> esc_html__("Filter order arrangement", 'kraft'),
					"param_name"	=> "filter_order",
					"value"			=> array(
											esc_html__('Ascending', 'kraft')	=>	'ASC',
											esc_html__('Descending', 'kraft')	=>	'DESC'
											),
					"dependency"	=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),					
					"description"	=> esc_html__( "Choose the order in which the filter has to be displayed.", 'kraft' ),
					"group"			=> esc_html__( 'Filter', 'kraft' ),
				),
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Filter margin botom", 'kraft' ),
					"param_name"		=> "filter_margin_bottom",
					"value"				=> "10px",
					"dependency"	=> array(
											'element'	=> 'show_filter',
											'not_empty'	=> true,
										),			
					"description"		=> esc_html__('Set the margin bottom for filter example: 10px.','kraft'),					
					"group"			    => esc_html__( 'Filter', 'kraft' ),
				),
				// Responsive Settings				
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet (Landscape view)', 'kraft' ),
					"param_name"	=> "tablet_landscape",
					"value"			=> "3",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablet landscape view.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet (Portrait view)', 'kraft' ),
					"param_name"	=> "tablet_portrait",
					"value"			=> "2",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablet portrait view.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> 'textfield',
					"heading"		=> esc_html__( 'Mobile', 'kraft' ),
					"param_name"	=> 'mobile',
					"value"			=> '1',	
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on mobile.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
			),
		);	
	}

}
vc_lean_map( 'kraft_portfolio_section', 'kraft_portfolio_section_vc_map' );
