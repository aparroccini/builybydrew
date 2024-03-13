<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-align-center',
	'title' => esc_html__( 'Footer', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id'   => 'info_footer',
			'type' => 'info',
			'desc' => esc_html__( 'Footer settings', 'kraft' )
		),
		array(
			'id' => 'footer-style',
			'type'  => 'image_select',
			'title' => esc_html__( 'Footer style', 'kraft' ),
			'subtitle' => esc_html__( 'Select footer style.', 'kraft' ),			
			'options' => array(
                            'standard' => array( 'alt' => 'Standard footer', 'img' => KRAFT_CORE_URL . 'assets/images/options/footer-standard.jpg' ),
                            'centered' => array( 'alt' => 'Centered footer', 'img' => KRAFT_CORE_URL . 'assets/images/options/footer-centered.jpg' ),                          
                        ),
            'default' => 'standard'
		),
		array(
			'id'		=> 'footer-layout-switch',			
			'type'      => 'button_set',
			'options'   => array(
								'boxed'		 => esc_html__( 'Boxed', 'kraft' ),
								'full-width' => esc_html__( 'Full Width', 'kraft' ),
							),
			'title'		=> esc_html__( 'Footer full width', 'kraft' ),
			'subtitle'	=> esc_html__( 'Select the footer width.', 'kraft' ),			
			'default'	=> 'boxed'
		),	
		array(
			'id' => 'footer-bg-color',
			'type' => 'color_rgba',
			'title' => esc_html__( 'Footer background color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose the footer background color from here.', 'kraft' ),	
			'transparent' => false,
			'default'   => array(
							'color' => '#ffffff',
							'alpha' => 1, 
							'rgba'  => '#ffffff'
						), 				
		),		
		array(
			'id'             => 'footer-margin-spacing',
			'type'           => 'spacing',			
			'mode'           => 'margin',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => esc_html__( 'Footer margin', 'kraft' ),
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
			'id'             => 'footer-padding-spacing',
			'type'           => 'spacing',	
			'mode'           => 'padding',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => esc_html__( 'Footer padding', 'kraft' ),
			'subtitle'       => esc_html__( 'Padding top/right/bottom/left (px).', 'kraft' ),			
			'default'        => array(
									'padding-top'     => '35px', 
									'padding-right'   => '0px', 
									'padding-bottom'  => '34px', 
									'padding-left'    => '0px',
									'units'          => 'px', 
								)
		),
		array(
			'id' => 'footer-scrolltotop-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Scroll up button', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to add a scroll up button in the footer.', 'kraft' ),			
			'default' => '0'
		),		
		array(
			'id'   => 'info_footer_icon_text',
			'type' => 'info',
			'desc' => esc_html__( 'Footer icon/text/links', 'kraft' )
		),	
		array(
			'id'       => 'footer-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer text/icon color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose footer text/icon color for regular,hover,active etc.', 'kraft' ),
			'active'   => false,
			'default'  => array(
				'regular'  => '#707070',
				'hover'    => '#151515',				
			),
			'required' => array( 
							array( 'footer-style', '!=', 'centered' ), 							
						)
		),
		array(
			'id' => 'footer-icon-bg-color',
			'type' => 'color',
			'title' => esc_html__( 'Footer icon background color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose the footer icon background color from here.', 'kraft' ),		
			'transparent' => false,
			'default'   => '#151515', 	
			'required' => array( 
							array( 'footer-style', '!=', 'standard' ), 							
						)			
		),
		array(
			'id'       => 'footer-icon-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer icon color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose footer icon color for regular,hover,active etc.', 'kraft' ),
			'active'   => false,
			'default'  => array(
				'regular'  => 'rgba(44, 44, 44, 0.7)',
				'hover'    => 'rgba(44, 44, 44, 1)',				
			),
			'required' => array( 
							array( 'footer-style', '!=', 'standard' ), 							
						)
		),
		array(
			'id'       => 'footer-text-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer text color', 'kraft' ),
			'subtitle' => esc_html__( 'Choose footer text color for regular,hover,active etc.', 'kraft' ),
			'active'   => false,
			'default'  => array(
				'regular'  => 'rgba(44, 44, 44, 0.7)',
				'hover'    => 'rgba(44, 44, 44, 1)',				
			),
			'required' => array( 
							array( 'footer-style', '!=', 'standard' ), 							
						)
		),
		array(
			'id'   => 'info_footer_copyright',
			'type' => 'info',
			'desc' => esc_html__( 'Copyright text', 'kraft' )
		),
		array(
			'id' => 'footer-copyright',
			'type' => 'textarea',
			'title' => esc_html__( 'Copyright text', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter the copyright text.', 'kraft' ),			
			'default' => '&#169; 2023 CaliberThemes'
		),		
		array(
			'id'   => 'info_footer_social',
			'type' => 'info',
			'desc' => esc_html__( 'Social Media', 'kraft' )
		),
		array(
			'id' => 'footer-social',
			'type' => 'switch',
			'title' => esc_html__( 'Social links', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the social media in the footer.', 'kraft' ),			
			'default' => '1'
		),	
		array(
			'id'		=> 'footer-social-type',			
			'type'      => 'button_set',
			'options'   => array(
								'text'	=> esc_html__( 'Text', 'kraft' ),
								'icon'  => esc_html__( 'Icon', 'kraft' ),
							),
			'title'		=> esc_html__( 'Social type', 'kraft' ),
			'subtitle'	=> esc_html__( 'Show social media as icon or text.', 'kraft' ),			
			'default'	=> 'text'
		),		
		array(
			'id'		=> 'footer-social-target',			
			'type'      => 'button_set',
			'options'   => array(
									'_blank'  => esc_html__( 'Blank page', 'kraft' ),
									'page'    => esc_html__( 'Same page', 'kraft' ),
							),
			'title'		=> esc_html__( 'Social target', 'kraft' ),
			'subtitle'	=> esc_html__( 'Select the footer social media link target.', 'kraft' ),			
			'default'	=> '_blank'
		),
		array(
			'id' => 'footer-social-icon',
			'type' => 'sorter',
			'title' => esc_html__( 'Social icons', 'kraft'),
			'subtitle' => esc_html__( 'Drag the social icons from "Available icons" section to "Footer icons" section.', 'kraft' ),			
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
				'Footer icons' => array(
					'placebo' => 'placebo',
				)
			),
		),
		array(
			'id'   => 'info_custom_footer_social',
			'type' => 'info',
			'desc' => esc_html__( 'Custom Social', 'kraft' )
		),
		array(
			'id' => 'custom-footer-social-icon-1',
			'type' => 'text',
			'title' => esc_html__( 'Social Icon/Text', 'kraft' ),			
			'default' => ''
		),
		array(
			'id' => 'custom-footer-social-url-1',
			'type' => 'text',
			'title' => esc_html__( 'Social URL', 'kraft' ),			
			'default' => ''
		),		
		array(
			'id' => 'custom-footer-social-icon-2',
			'type' => 'text',
			'title' => esc_html__( 'Social Icon/Text', 'kraft' ),			
			'default' => ''
		),
		array(
			'id' => 'custom-footer-social-url-2',
			'type' => 'text',
			'title' => esc_html__( 'Social URL', 'kraft' ),			
			'default' => ''
		),		
	)
);
