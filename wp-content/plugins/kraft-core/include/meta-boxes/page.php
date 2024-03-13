<?php

	// Page Meta Box
	$meta_boxes[] = array(
		'id'			=> 'page_meta_box',
		'title'			=> esc_html__( 'Page Settings', 'kraft' ),
		'post_types'	=> array( 'page', 'post', 'portfolio' ),		
		'tabs' => array(
				'page-background' => array(
					'label' => esc_html__( 'Background', 'kraft' ),
					'icon' => 'dashicons-format-image',
				),
				'menu' => array(
					'label' => esc_html__( 'Menu', 'kraft' ),
					'icon' => 'dashicons-menu',
				),
				'portfolio' => array(
					'label' => esc_html__( 'Portfolio', 'kraft' ),
					'icon' => 'dashicons-format-aside',
				),
			    'blog' => array(
					'label' => esc_html__( 'Blog', 'kraft' ),
					'icon' => 'dashicons-format-aside',
				),
				'footer' => array(
					'label' => esc_html__( 'Footer', 'kraft' ),
					'icon' => 'dashicons-align-center',
				),
		),
		'tab_style' => 'left',
		'fields'		=> array(
			/* Background Tab */		
			array(				
				'id'	=> "{$prefix}page_bgcolor_type_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_bgcolor_type_label">'.esc_html__( 'Page background', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'page-background'		
			),		
			array(				
				'id'	=> "{$prefix}page_bgcolor_type",
				'type'	=> 'select',
				'options'	=> array(
					'inherit'	=> esc_html__( 'Inherit', 'kraft' ),					
					'custom'	=> esc_html__( 'Custom', 'kraft' ),					
				),
				'desc'  => esc_html__( 'Select page background', 'kraft' ),
				'std'	=> 'inherit',		
				'columns' => 9,
				'tab' => 'page-background'
			),
			array(
				'type' => 'divider',
				'tab' => 'page-background',
				'hidden' => array( $prefix.'page_bgcolor_type', '!=', array( 'custom' ) ),		
			),					
			array(				
				'id'	=> "{$prefix}page_custom_color_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_custom_color_label">'.esc_html__( 'Background color', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_bgcolor_type', '!=', array( 'custom' ) ),		
				'tab' => 'page-background'		
			),				
			array(								
				'id'    => "{$prefix}page_custom_color",				
				'type'  => 'color',				
				'std'   => '#ffffff',	
				'columns' => 9,
				'hidden' => array( 'page_bgcolor_type', '!=', 'custom' ),
				'tab' => 'page-background'
			),
			array(
				'type' => 'divider',
				'tab' => 'page-background',
				'hidden' => array( $prefix.'page_bgcolor_type', '!=', array( 'custom' ) ),		
			),				
			array(				
				'id'	=> "{$prefix}page_custom_bg_image_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_custom_bg_image_label">'.esc_html__( 'Background image', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_bgcolor_type', '!=', array( 'custom' ) ),		
				'tab' => 'page-background'		
			),					
			array(				
				'id'    => "{$prefix}page_custom_bg_image",
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,		
				'columns' => 9,
				'hidden' => array( 'page_bgcolor_type', '!=', 'custom' ),
				'tab' => 'page-background'
			),	
			array(				
				'id'	=> "{$prefix}page_background_repeat",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_background_repeat"></label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_bgcolor_type', '!=', array( 'custom' ) ),		
				'tab' => 'page-background'		
			),								
			array(
				'name'	=> esc_html__( 'Repeat options', 'kraft' ),
				'id'	=> "{$prefix}page_custom_image_repeat",
				'type'	=> 'select',
				'options'	=> array(
					'no-repeat'	=> esc_html__( 'no-repeat', 'kraft' ),		
					'repeat'	=> esc_html__( 'repeat', 'kraft' ),
					'repeat-x'	=> esc_html__( 'repeat-x', 'kraft' ),
					'repeat-y'	=> esc_html__( 'repeat-y', 'kraft' ),							
				),				
				'std'	=> 'no-repeat',		
				'columns' => 3,							
				'hidden' => array( 'page_bgcolor_type', '!=', 'custom' ),
				'tab' => 'page-background'		
			),	
			array(
				'name'	=> esc_html__( 'Position X', 'kraft' ),
				'id'	=> "{$prefix}page_custom_image_position_x",
				'type'	=> 'select',
				'options'	=> array(
					'center'	=> esc_html__( 'center', 'kraft' ),		
					'left'		=> esc_html__( 'left', 'kraft' ),
					'right'		=> esc_html__( 'right', 'kraft' ),					
				),				
				'std'	=> 'center',
			    'columns' => 3,							
				'hidden' => array( 'page_bgcolor_type', '!=', 'custom' ),
				'tab' => 'page-background'		
			),
			array(
				'name'	=> esc_html__( 'Position Y', 'kraft' ),
				'id'	=> "{$prefix}page_custom_image_position_y",
				'type'	=> 'select',
				'options'	=> array(
					'center'	=> esc_html__( 'center', 'kraft' ),		
					'top'		=> esc_html__( 'top', 'kraft' ),
					'bottom'	=> esc_html__( 'bottom', 'kraft' ),					
				),				
				'std'	=> 'center',	
				'columns' => 3,							
				'hidden' => array( 'page_bgcolor_type', '!=', 'custom' ),
				'tab' => 'page-background'		
			),
						
			/* Menu Tab */			
			array(				
				'id'	=> "{$prefix}page_menu_type_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_type_label">'.esc_html__( 'Menu', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,					
				'tab' => 'menu'		
			),					
			array(				
				'id'	=> "{$prefix}page_menu_type",
				'type'	=> 'select',
				'options'	=> array(
					'inherit'	=> esc_html__( 'Inherit', 'kraft' ),					
					'custom'	=> esc_html__( 'Custom', 'kraft' ),					
				),
				'desc'  => esc_html__( 'Override the menu', 'kraft' ),
				'std'	=> 'inherit',	
				'columns' => 9,		
				'tab' => 'menu'
			),
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),					
			array(				
				'id'	=> "{$prefix}page_menu_style_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_style_label">'.esc_html__( 'Menu style', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'menu'		
			),	
			array(				
				'id'	=> "{$prefix}page_menu_style",
				'type'	=> 'radio',
				'options'	=> array(					
								'standard'	=> esc_html__( 'Standard menu', 'kraft' ),
								'centered'	=> esc_html__( 'Centered menu', 'kraft' ),			
								'hamburger-side' => esc_html__( 'Hamburger menu', 'kraft' ),			
								'left-sidebar-menu' => esc_html__( 'Left Sidebar menu', 'kraft' ),			
							),
				'std'		=> 'standard',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'menu'
			),
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_menu_sticky_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_sticky_label">'.esc_html__( 'Menu sticky', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'menu'		
			),				
			array(			
				'id'	=> "{$prefix}page_menu_sticky",
				'type'	=> 'checkbox',				
				'desc'  => esc_html__( 'check to enable sticky menu on page.', 'kraft' ),
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'menu'		
			),
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_menu_layout_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_layout_label">'.esc_html__( 'Menu layout', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'menu'		
			),						
			array(
				'id'	=> "{$prefix}page_menu_layout",
				'type'	=> 'radio',
				'options'	=> array(					
								'boxed'	=> esc_html__( 'Boxed layout', 'kraft' ),
								'full-width' => esc_html__( 'Fullwidth layout', 'kraft' ),			
							),
				'std'		=> 'boxed',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 9,		
				'tab' => 'menu'		
			),	
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),						
			array(				
				'id'	=> "{$prefix}page_menu_display_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_display_label">'.esc_html__( 'Menu display', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'menu'		
			),						
			array(
				'id'	=> "{$prefix}page_menu_display",
				'type'	=> 'radio',
				'options'	=> array(					
								'solid'	=> esc_html__( 'Solid', 'kraft' ),
								'transparent' => esc_html__( 'Transparent', 'kraft' ),			
							),
				'std'		=> 'solid',		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'columns' => 9,		
				'tab' => 'menu'		
			),
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_transparent_menu_link_color",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_transparent_menu_link_color">Transparent menu link color</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),		
				'tab' => 'menu'		
			),		
			array(				
				'name'  => esc_html__( 'Regular color', 'kraft' ),				
				'id'    => "{$prefix}page_transparent_menu_link_regular_color",				
				'type'  => 'color',				
				'std'   => '#ffffff',		
				'alpha_channel' => true,	
				'columns'  => 3,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),			
			array(				
				'name'  => esc_html__( 'Hover color', 'kraft' ),				
				'id'    => "{$prefix}page_transparent_menu_link_hover_color",				
				'type'  => 'color',				
				'std'   => 'rgba(255,255,255,.8)',		
				'alpha_channel' => true,
				'columns'  => 3,
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),						
				'tab' => 'menu'		
			),	
			array(				
				'name'  => esc_html__( 'Active color', 'kraft' ),				
				'id'    => "{$prefix}page_transparent_menu_link_active_color",				
				'type'  => 'color',				
				'std'   => 'rgba(255,255,255,.8)',		
				'alpha_channel' => true,
				'columns'  => 3,
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),						
				'tab' => 'menu'		
			),				
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),			
			array(				
				'id'	=> "{$prefix}page_menu_margin",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_margin">Menu margin</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),		
				'tab' => 'menu'		
			),		
			array(				
				'name'  => esc_html__( 'Top(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_margin_top",				
				'type'  => 'text',		
				'size'	=> '3',		
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),			
			array(				
				'name'  => esc_html__( 'Right(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_margin_right",				
				'type'  => 'text',	
				'size'	=> '3',			
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),
			array(				
				'name'  => esc_html__( 'Bottom(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_margin_bottom",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),						
			array(				
				'name'  => esc_html__( 'Left(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_margin_left",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),						
			array(				
				'id'	=> "{$prefix}page_menu_margin_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 1,	
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),		
				'tab' => 'menu'		
			),
			array(
				'type' => 'divider',
				'tab' => 'menu',
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
			),	
			array(				
				'id'	=> "{$prefix}page_menu_padding",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_menu_padding">Menu padding</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),		
				'tab' => 'menu'		
			),		
			array(				
				'name'  => esc_html__( 'Top(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_padding_top",				
				'type'  => 'text',		
				'size'	=> '3',				
				'std'   => '35',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),			
			array(				
				'name'  => esc_html__( 'Right(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_padding_right",				
				'type'  => 'text',		
				'size'	=> '3',				
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),
			array(				
				'name'  => esc_html__( 'Bottom(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_padding_bottom",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '34',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),						
			array(				
				'name'  => esc_html__( 'Left(px)', 'kraft' ),				
				'id'    => "{$prefix}page_menu_padding_left",				
				'type'  => 'text',		
				'size'	=> '3',				
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),
				'tab' => 'menu'		
			),			
			array(				
				'id'	=> "{$prefix}page_menu_padding_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 1,	
				'hidden' => array( $prefix.'page_menu_type', 'not in', array( 'custom' ) ),		
				'tab' => 'menu'		
			),		
						
			/* Portfolio Tab */
			array(				
				'id'	=> "{$prefix}page_portfolio_type_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_portfolio_type_label">'.esc_html__( 'Portfolio', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,					
				'tab' => 'portfolio'		
			),				
			array(				
				'id'	=> "{$prefix}page_portfolio_type",
				'type'	=> 'select',
				'options'	=> array(
					'inherit'	=> esc_html__( 'Inherit', 'kraft' ),					
					'custom'	=> esc_html__( 'Custom', 'kraft' ),					
				),
				'desc'  => esc_html__( 'Override the portfolio', 'kraft' ),
				'std'	=> 'inherit',	
				'columns' => 9,						
				'tab' => 'portfolio'
			),
			array(
				'type' => 'divider',
				'tab' => 'portfolio',
				'hidden' => array( $prefix.'page_portfolio_type', 'not in', array( 'custom' ) ),
			),		
			array(				
				'id'	=> "{$prefix}page_portfolio_nav_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_portfolio_nav_label">'.esc_html__( 'Navigation', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_portfolio_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'portfolio'		
			),				
			array(			
				'id'	=> "{$prefix}page_portfolio_navigation",
				'type'	=> 'select',
				'options'	=> array(								
						'0'	=> esc_html__( 'Disabled', 'kraft' ),
						'1'	=> esc_html__( 'Enabled', 'kraft' ),					
					),
				'std'	=> '1',
				'desc'	=> esc_html__( 'Show Portfolio navigation for current portfolio.', 'kraft' ),		
				'hidden' => array( $prefix.'page_portfolio_type', 'not in', array( 'custom' ) ),
				'columns' => 9,						
				'tab' => 'portfolio'
			),								
						
			/* Blog Tab */			
			array(				
				'id'	=> "{$prefix}page_blog_type_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_blog_type_label">'.esc_html__( 'Blog', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,					
				'tab' => 'blog'		
			),				
			array(				
				'id'	=> "{$prefix}page_blog_type",
				'type'	=> 'select',
				'options'	=> array(
					'inherit'	=> esc_html__( 'Inherit', 'kraft' ),					
					'custom'	=> esc_html__( 'Custom', 'kraft' ),					
				),
				'desc'  => esc_html__( 'Override the blog', 'kraft' ),
				'std'	=> 'inherit',	
				'columns' => 9,						
				'tab' => 'blog'
			),
			array(
				'type' => 'divider',
				'tab' => 'blog',
				'hidden' => array( $prefix.'page_blog_type', 'not in', array( 'custom' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_blog_style_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_blog_style_label">'.esc_html__( 'Blog style', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_blog_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'blog'		
			),
			array(				
				'id'	=> "{$prefix}page_blog_style",
				'type'	=> 'radio',
				'options'	=> array(					
								'blog-list'	   => esc_html__( 'Blog list', 'kraft' ),
								'blog-classic-fullwidth' => esc_html__( 'Blog classic fullwidth', 'kraft' ),				
								'blog-classic-sidebar' => esc_html__( 'Blog classic with sidebar', 'kraft' ),						
							),
				'std'		=> 'blog-list',		
				'hidden' => array( $prefix.'page_blog_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'blog'		
			),			
						
			/* Footer Tab */							
			array(				
				'id'	=> "{$prefix}page_footer_type_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_type_label">'.esc_html__( 'Footer', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,					
				'tab' => 'footer'		
			),				
			array(				
				'id'	=> "{$prefix}page_footer_type",
				'type'	=> 'select',
				'options'	=> array(
					'inherit'	=> esc_html__( 'Inherit', 'kraft' ),					
					'custom'	=> esc_html__( 'Custom', 'kraft' ),					
				),
				'desc'  => esc_html__( 'Override the footer', 'kraft' ),
				'std'	=> 'inherit',	
				'columns' => 9,						
				'tab' => 'footer'
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_footer_style_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_style_label">'.esc_html__( 'Footer style', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'footer'		
			),		
			array(				
				'id'	=> "{$prefix}page_footer_style",
				'type'	=> 'radio',
				'options'	=> array(					
								'standard'	=> esc_html__( 'Standard footer', 'kraft' ),
								'centered'	=> esc_html__( 'Centered footer', 'kraft' ),											
							),
				'std'		=> 'standard',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),		
			array(				
				'id'	=> "{$prefix}page_footer_layout_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_layout_label">'.esc_html__( 'Footer layout', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'footer'		
			),	
			array(				
				'id'	=> "{$prefix}page_footer_layout",
				'type'	=> 'radio',
				'options'	=> array(					
								'boxed'	=> esc_html__( 'Boxed layout', 'kraft' ),
								'full-width' => esc_html__( 'Fullwidth layout', 'kraft' ),			
							),
				'std'		=> 'boxed',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),					
			array(				
				'id'	=> "{$prefix}page_footer_bg_color_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_bg_color_label">'.esc_html__( 'Footer background color', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'footer'		
			),	
			array(		
				'id'    => "{$prefix}page_footer_bg_color",				
				'type'  => 'color',				
				'std'   => '#ffffff',		
				'alpha_channel' => true,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),					
			array(				
				'id'	=> "{$prefix}page_footer_icon_bg_color_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_icon_bg_color_label">'.esc_html__( 'Footer icon background color', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'columns' => 3,					
				'tab' => 'footer'		
			),	
			array(		
				'id'    => "{$prefix}page_footer_icon_bg_color",				
				'type'  => 'color',				
				'std'   => '#151515',			
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'columns' => 9,
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
			),					
			array(				
				'id'	=> "{$prefix}page_footer_icon_color",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_icon_color">Footer icon color</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),		
			array(				
				'name'  => esc_html__( 'Regular color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_icon_regular_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 0.7)',		
				'alpha_channel' => true,	
				'columns'  => 3,		
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),			
			array(				
				'name'  => esc_html__( 'Hover color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_icon_hover_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 1)',		
				'alpha_channel' => true,
				'columns'  => 3,
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),							
			array(				
				'id'	=> "{$prefix}page_footer_icon_color_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_footer_text_color",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_text_color">Footer text color</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),						
			array(				
				'name'  => esc_html__( 'Regular color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_text_regular_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 0.7)',		
				'alpha_channel' => true,	
				'columns'  => 3,		
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),			
			array(				
				'name'  => esc_html__( 'Hover color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_text_hover_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 0.7)',		
				'alpha_channel' => true,
				'columns'  => 3,
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),	
			array(				
				'id'	=> "{$prefix}page_footer_text_color_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'centered' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_footer_icon_text_color",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_icon_text_color">Footer icon/text color</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'standard' ) ),
				'tab' => 'footer'		
			),		
			array(				
				'name'  => esc_html__( 'Regular color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_icon_text_regular_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 0.7)',		
				'alpha_channel' => true,	
				'columns'  => 3,		
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'standard' ) ),
				'tab' => 'footer'		
			),			
			array(				
				'name'  => esc_html__( 'Hover color', 'kraft' ),				
				'id'    => "{$prefix}page_footer_icon_text_hover_color",				
				'type'  => 'color',				
				'std'   => 'rgba(44, 44, 44, 1)',		
				'alpha_channel' => true,
				'columns'  => 3,
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'standard' ) ),
				'tab' => 'footer'		
			),	
			array(				
				'id'	=> "{$prefix}page_footer_icon_text_color_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'standard' ) ),
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_style', 'not in', array( 'standard' ) ),
			),				
			array(				
				'id'	=> "{$prefix}page_footer_margin",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_margin">Footer margin</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),		
				'tab' => 'footer'		
			),		
			array(				
				'name'  => esc_html__( 'Top(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_margin_top",				
				'type'  => 'text',		
				'size'	=> '3',				
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),			
			array(				
				'name'  => esc_html__( 'Right(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_margin_right",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),
			array(				
				'name'  => esc_html__( 'Bottom(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_margin_bottom",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),						
			array(				
				'name'  => esc_html__( 'Left(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_margin_left",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),						
			array(				
				'id'	=> "{$prefix}page_footer_margin_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 1,	
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),		
				'tab' => 'footer'		
			),
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),	
			array(				
				'id'	=> "{$prefix}page_footer_padding",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_padding">Footer padding</label>					
						  </div>',		
				'columns' => 3,	
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),		
				'tab' => 'footer'		
			),		
			array(				
				'name'  => esc_html__( 'Top(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_padding_top",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '35',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),			
			array(				
				'name'  => esc_html__( 'Right(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_padding_right",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),
			array(				
				'name'  => esc_html__( 'Bottom(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_padding_bottom",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '34',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),						
			array(				
				'name'  => esc_html__( 'Left(px)', 'kraft' ),				
				'id'    => "{$prefix}page_footer_padding_left",				
				'type'  => 'text',	
				'size'	=> '3',					
				'std'   => '0',				
				'columns'  => 2,		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'tab' => 'footer'		
			),	
			array(				
				'id'	=> "{$prefix}page_footer_padding_blank",			
				'type' => 'custom_html',															
				'std' => '',		
				'columns' => 1,	
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),		
				'tab' => 'footer'		
			),		
			array(
				'type' => 'divider',
				'tab' => 'footer',
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
			),					
			array(				
				'id'	=> "{$prefix}page_footer_scroll_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_page_footer_scroll_label">'.esc_html__( 'Scroll up button', 'kraft' ).'</label>					
						  </div>',		
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 3,					
				'tab' => 'footer'		
			),				
			array(			
				'id'	=> "{$prefix}page_footer_scrolltop",
				'type'	=> 'checkbox',				
				'desc'  => esc_html__( 'check to activate to add a scroll up button in the footer.', 'kraft' ),
				'hidden' => array( $prefix.'page_footer_type', 'not in', array( 'custom' ) ),
				'columns' => 9,
				'tab' => 'footer'		
			),
						
		)
	);	

