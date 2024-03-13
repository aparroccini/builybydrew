<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-align-center',
	'title' => esc_html__( 'Menu', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id'   => 'info_menu',
			'type' => 'info',
			'desc' => esc_html__( 'Menu settings', 'kraft' )
		),
		array(
			'id' => 'menu-style',
			'type'  => 'image_select',
			'title' => esc_html__( 'Menu style', 'kraft' ),
			'subtitle' => esc_html__( 'Select menu style.', 'kraft' ),			
			'options' => array(
                            'standard' => array( 'alt' => 'Standard menu', 'img' => KRAFT_CORE_URL . 'assets/images/options/header-standard.jpg' ),
                            'centered' => array( 'alt' => 'Centered menu', 'img' => KRAFT_CORE_URL . 'assets/images/options/header-centered.jpg' ),                        
							'hamburger-side' => array( 'alt' => 'Hamburger menu', 'img' => KRAFT_CORE_URL . 'assets/images/options/header-hamburger.jpg' ),                       
							'left-sidebar-menu' => array( 'alt' => 'Left Sidebar menu', 'img' => KRAFT_CORE_URL . 'assets/images/options/left-sidebar-menu.jpg' ),                       
                        ),
            'default' => 'standard'
		),
		array(
			'id'		=> 'menu-layout-switch',			
			'type'      => 'button_set',
			'options'   => array(
								'boxed'		 => esc_html__( 'Boxed', 'kraft' ),
								'full-width' => esc_html__( 'Full Width', 'kraft' ),
							),
			'title'		=> esc_html__( 'Menu width', 'kraft' ),
			'subtitle'	=> esc_html__( 'Select the menu width.', 'kraft' ),			
			'default'	=> 'boxed'
		),
		array(
			'id'		  => 'menu-display-switch',			
			'type'        => 'button_set',
			'options'     => array(
								'solid'			=> esc_html__( 'Solid', 'kraft' ),
								'transparent'   => esc_html__( 'Transparent', 'kraft' ),																
							),
			'title'		  => esc_html__( 'Menu display', 'kraft' ),
			'subtitle'    => esc_html__( 'Select the menu display.', 'kraft' ),			
			'default'     => 'solid',
			'required'	  => array( 
								array( 'menu-style', '=', array( 'standard', 'hamburger-side' ) ), 							
							)
		),		
		array(
			'id'		=> 'menu-sticky-switch',			
			'type'      => 'switch',			
			'title'		=> esc_html__( 'Menu sticky', 'kraft' ),
			'subtitle'  => esc_html__( 'Select the menu sticky.', 'kraft' ),			
			'default'   => '0',		
			'required' => array( 
							array( 'menu-style', '!=', array( 'hamburger-side', 'left-sidebar-menu' ) ), 							
						)
		),		
		array(
			'id'   => 'info_standard_menu',
			'type' => 'info',
			'desc' => esc_html__( 'Standard Menu', 'kraft' )
		),
		array(
			'id' => 'menu-font',
			'type' => 'typography',
			'title' => esc_html__( 'Text size', 'kraft' ),
			'subtitle' => esc_html__( 'Standard menu text size, applicable only on top level menu and not in dropdowns.', 'kraft' ),
			'font-family' => true,
			'font-weight' => true,
			'font-style' => true,
			'text-align' => false,
			'line-height' => false,
			'letter-spacing' => false,
			'subsets' => false,
			'color' => false,		
			'text-transform' => true,
			'preview' => false,
			'units' => 'px',
			'default' => array(		
				'font-family' => 'Roboto', 		
				'font-size' => '12px',		
				'font-weight' => '500',	
				'text-transform' => 'uppercase',	
			),
		),	
		array(
			'id' => 'menu-bg-color',
			'type' => 'color_rgba',
			'title' => esc_html__( 'Background color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose the standard menu background color from here.', 'kraft' ),			
			'transparent' => false,
			'default'   => array(
							'color' => '#ffffff',
							'alpha' => 1, 
							'rgba'  => '#ffffff'
						), 				
		),			
		array(
			'id'       => 'menu-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Links color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose standard menu link color for regular, hover and active state.', 'kraft' ),			
			'default'  => array(
				'regular'  => '#151515',
				'hover'    => 'rgba(21, 21, 21, 0.5)', 
				'active'   => 'rgba(21, 21, 21, 0.5)',			
			)
		),
		array(
			'id'             => 'menu-spacing',
			'type'           => 'spacing',			
			'mode'           => 'margin',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => esc_html__( 'Menu margin', 'kraft' ),
			'subtitle'       => esc_html__( 'Margin top/right/bottom/left (px).', 'kraft' ),			
			'default'        => array(
									'margin-top'     => '0px', 
									'margin-right'   => '0px', 
									'margin-bottom'  => '0px', 
									'margin-left'    => '0px',
									'units'          => 'px', 
								)
		),
		array(
			'id'             => 'menu-padding',
			'type'           => 'spacing',		
			'mode'           => 'padding',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => esc_html__( 'Menu padding', 'kraft' ),
			'subtitle'       => esc_html__( 'Padding top/right/bottom/left (px).', 'kraft' ),			
			'default'        => array(
									'padding-top'     => '20px', 
									'padding-right'   => '0px', 
									'padding-bottom'  => '20px', 
									'padding-left'    => '0px',
									'units'          => 'px', 
								)
		),
		array(
			'id'   => 'info_hamburger_menu',
			'type' => 'info',
			'desc' => esc_html__( 'Hamburger Menu', 'kraft' )
		),
		array(
			'id' => 'hamburger-menu-font',
			'type' => 'typography',
			'title' => esc_html__( 'Text size', 'kraft' ),
			'subtitle' => esc_html__( 'Hamburger menu text size, applicable only on top level menu and not in dropdowns.', 'kraft' ),
			'font-family' => true,
			'font-weight' => true,
			'font-style' => true,
			'text-align' => false,
			'line-height' => false,
			'letter-spacing' => false,
			'subsets' => false,
			'color' => false,		
			'text-transform' => true,
			'preview' => false,
			'units' => 'px',
			'default' => array(		
				'font-family' => 'Roboto', 		
				'font-size' => '28px',		
				'font-weight' => '500',	
				'text-transform' => 'initial',	
			),
		),	
		array(
			'id' => 'hamburger-menu-bg-color',
			'type' => 'color_rgba',
			'title' => esc_html__( 'Background color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose the hamburger menu background color from here.', 'kraft' ),		
			'transparent' => false,
			'default'   => array(
							'color' => '#1e1e1e',
							'alpha' => 1, 
							'rgba'  => '#1e1e1e'
						), 				
		),			
		array(
			'id'       => 'hamburger-menu-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Links color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose hamburger menu link color for regular, hover and active state.', 'kraft' ),			
			'default'  => array(
				'regular'  => '#fff',
				'hover'    => '#707070', 
				'active'   => '#707070',			
			)
		),	
		array(
			'id'   => 'info_transparent_menu_style',
			'type' => 'info',
			'desc' => esc_html__( 'Tranparent Menu', 'kraft' ),
			'required'	  => array( 
				array( 'menu-style', '=', array( 'standard', 'hamburger-side' ) ), 							
			)
		),
		array(
			'id'       => 'transparent-menu-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Links color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose transparent menu link color for regular, hover and active state.', 'kraft' ),			
			'default'  => array(
				'regular'  => '#000000',
				'hover'    => '#707070', 
				'active'   => '#707070',			
			),
			'required'	  => array( 
				array( 'menu-style', '=', array( 'standard', 'hamburger-side' ) ), 							
			)
		),		
		array(
			'id'   => 'info_menu_social',
			'type' => 'info',
			'desc' => esc_html__( 'Social Media', 'kraft' )
		),
		array(
			'id' => 'menu-social',
			'type' => 'switch',
			'title' => esc_html__( 'Social links', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the social media in the left sidebar menu.', 'kraft' ),			
			'default' => '1'
		),			
		array(
			'id'		=> 'menu-social-target',			
			'type'      => 'button_set',
			'options'   => array(
									'_blank'  => esc_html__( 'Blank page', 'kraft' ),
									'page'    => esc_html__( 'Same page', 'kraft' ),
							),
			'title'		=> esc_html__( 'Social target', 'kraft' ),
			'subtitle'	=> esc_html__( 'Select the menu social media link target.', 'kraft' ),			
			'default'	=> '_blank'
		),
		array(
			'id' => 'menu-social-icon',
			'type' => 'sorter',
			'title' => esc_html__( 'Social icons', 'kraft'),
			'subtitle' => esc_html__( 'Drag the social icons from "Available icons" section to "Menu icons" section.', 'kraft' ),			
			'description' => esc_html__( 'Social icon URL needs to be set in "Social Media" section in Theme options.', 'kraft' ),			
			'options' => array(
				'Available icons' => array(
					'placebo' => 'placebo',
					'fab fa-facebook-f' => 'Facebook',
					'fab fa-twitter' => 'Twitter',
					'fab fa-x-twitter' => 'X Twitter',
					'fab fa-google-plus-g' => 'Google+',
					'fab fa-linkedin-in' => 'Linkedin',
					'fab fa-tumblr' => 'Tumblr',
					'fab fa-dribbble' => 'Dribbble',
					'fab fa-pinterest-p' => 'Pinterest',
					'fab fa-youtube' => 'Youtube',
					'fab fa-vimeo-square' => 'Vimeo',
					'fab fa-flickr' => 'Flickr',
					'fab fa-github' => 'Github',
					'fab fa-instagram'	=> 'Instagram',
					'fab fa-dropbox' => 'Dropbox',										
					'far fa-envelope' => 'Mail',
					'fab fa-skype' => 'Skype',
					'fab fa-behance' => 'Behance',
					'fab fa-soundcloud' => 'Soundcloud',
					'fab fa-stack-overflow' => 'Stackoverflow',
					'fab fa-stack-exchange' => 'Stack-exchange',
					'fab fa-xing' => 'Xing',
					'fab fa-imdb' => 'IMDb',
					'fab fa-medium' => 'Medium',
					'fab fa-weixin' => 'WeChat'
				),
				'Menu icons' => array(
					'placebo' => 'placebo',
				)
			),
		),
		array(
			'id'   => 'info_custom_menu_social',
			'type' => 'info',
			'desc' => esc_html__( 'Custom Social', 'kraft' )
		),
		array(
			'id' => 'custom-menu-social-icon-1',
			'type' => 'text',
			'title' => esc_html__( 'Social Icon/Text', 'kraft' ),			
			'default' => ''
		),
		array(
			'id' => 'custom-menu-social-url-1',
			'type' => 'text',
			'title' => esc_html__( 'Social URL', 'kraft' ),			
			'default' => ''
		),		
		array(
			'id' => 'custom-menu-social-icon-2',
			'type' => 'text',
			'title' => esc_html__( 'Social Icon/Text', 'kraft' ),			
			'default' => ''
		),
		array(
			'id' => 'custom-menu-social-url-2',
			'type' => 'text',
			'title' => esc_html__( 'Social URL', 'kraft' ),			
			'default' => ''
		),		
	)
);
