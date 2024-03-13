<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-edit',
	'title' => esc_html__( 'Blog', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id'   => 'info_blog_styling',
			'type' => 'info',
			'desc' => esc_html__( 'Blog style', 'kraft' )
		),
		array(
			'id' => 'blog-style',
			'type' => 'radio',
			'title' => esc_html__( 'Blog style', 'kraft' ),
			'subtitle' => esc_html__( 'You can choose the blog style as per your requirement from here.', 'kraft' ),		
			'options' => array(
							'blog-classic-sidebar' => esc_html__( 'Blog classic with sidebar', 'kraft' ),
							'blog-classic-fullwidth' => esc_html__( 'Blog classic fullwidth', 'kraft' ),				
							'blog-list'	   => esc_html__( 'Blog list', 'kraft' ),
						),
			'default' => 'blog-classic-sidebar'
		),		
		array(
			'id'   => 'info_blog_banner',
			'type' => 'info',
			'desc' => esc_html__( 'Blog banner', 'kraft' )
		),
		array(
			'id' => 'blog-title',
			'type' => 'text',
			'title' => esc_html__( 'Title', 'kraft' ),
			'subtitle' => esc_html__( 'It will appear on post page.', 'kraft' ),			
			'default' => 'Blog'
		),
		array(
			'id' => 'blog-subtitle',
			'type' => 'text',
			'title' => esc_html__( 'Subtitle', 'kraft' ),
			'subtitle' => esc_html__( 'It will appear on post page.', 'kraft' ),			
			'default' => 'Thoughts and Upcomings are shared here.'
		),		
		array(
			'id'             => 'blog-banner-padding',
			'type'           => 'spacing',		
			'mode'           => 'padding',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => esc_html__( 'Banner padding', 'kraft' ),
			'subtitle'       => esc_html__( 'Padding top/right/bottom/left (px).', 'kraft' ),			
			'default'        => array(
									'padding-top'     => '12px', 
									'padding-right'   => '0px', 
									'padding-bottom'  => '15px', 
									'padding-left'    => '0px',
									'units'          => 'px', 
								)
		),
		array(
			'id'   => 'info_blog_label',
			'type' => 'info',
			'desc' => esc_html__( 'Blog label', 'kraft' )
		),
		array(
			'id' => 'blog-readmore-text',
			'type' => 'text',
			'title' => esc_html__( 'Read more label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for read more button.', 'kraft' ),	
			'default' => 'Read More'
		),		
		array(
			'id' => 'blog-next-text',
			'type' => 'text',
			'title' => esc_html__( 'Next post label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for next button.', 'kraft' ),	
			'default' => 'Next'
		),
		array(
			'id' => 'blog-prev-text',
			'type' => 'text',
			'title' => esc_html__( 'Previous post label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for prev button.', 'kraft' ),	
			'default' => 'Prev'
		),
		array(
			'id' => 'blog-social-share-title',
			'type' => 'text',
			'title' => esc_html__( 'Social share title', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for social share title.', 'kraft' ),	
			'default' => 'Share'
		),		
		array(
			'id'   => 'info_blog_meta',
			'type' => 'info',
			'desc' => esc_html__( 'Blog meta', 'kraft' )
		),		
		array(
			'id' => 'blog-social-sharing',
			'type' => 'switch',
			'title' => esc_html__( 'Social share icons', 'kraft' ),
			'subtitle' => esc_html__( 'You can show or hide the social sharing icons on your blog posts.', 'kraft' ),
			'default' => '1'
		),
		array(
			'id'		=> 'blog-social-type',			
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
			'id' => 'blog-share-icon',
			'type' => 'sorter',
			'title' => esc_html__( 'Social icons', 'kraft'),
			'subtitle' => esc_html__( 'Drag the social icons from "Available icons" section to "Post icons" section.', 'kraft' ),
			'options' => array(
				'Available icons' => array(
					'placebo' => 'placebo',
					'facebook-f' => 'Facebook',
					'twitter' => 'Twitter',
					'x-twitter' => 'X Twitter',
					'google-plus-g' => 'Google+',
					'pinterest-p' => 'Pinterest',
					'linkedin-in' => 'Linkedin',					
					'xing' => 'Xing',
				),
				'Post icons' => array(
					'placebo' => 'placebo',
				)
			),
		),	
		array(
			'id'   => 'info_blog_slider',
			'type' => 'info',
			'desc' => esc_html__( 'Blog post slider', 'kraft' )
		),		
		array(
			'id' => 'blog-post-slider-navigation',
			'type' => 'switch',
			'title' => esc_html__( 'Slider Navigation', 'kraft' ),
			'subtitle' => esc_html__( 'Show / Hide post silder navigation.', 'kraft' ),
			'default' => '0'
		),
		array(
			'id' => 'blog-post-slider-pagination',
			'type' => 'switch',
			'title' => esc_html__( 'Slider Pagination', 'kraft' ),
			'subtitle' => esc_html__( 'Show / Hide post silder pagination.', 'kraft' ),
			'default' => '1'
		),
		array(
			'id' => 'blog-post-slider-controls-scheme',
			'type' => 'radio',
			'title' => esc_html__( 'Slider Controls Scheme', 'kraft' ),
			'subtitle' => esc_html__( 'You can choose the controls scheme for sliders navigation/pagination as per your requirement from here.', 'kraft' ),		
			'options' => array(
							'dark-controls' => esc_html__( 'Dark scheme', 'kraft' ),							
							'light-controls'  => esc_html__( 'Light scheme', 'kraft' ),							
						),
			'default' => 'dark-controls'
		),
	)
);
