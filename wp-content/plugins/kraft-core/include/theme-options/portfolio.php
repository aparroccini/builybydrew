<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-portfolio',
	'title' => esc_html__( 'Portfolio', 'kraft' ),
	'heading' => '',
	'fields' => array(	
		array(
			'id'   => 'info_portfolio_nav',
			'type' => 'info',
			'desc' => esc_html__( 'Portfolio navigation', 'kraft' )
		),
		array(
			'id' => 'portfolio-slug-name',
			'type' => 'text',
			'title' => esc_html__( 'Portfolio slug', 'kraft' ),
			'desc' => esc_html__( 'The slug name cannot be the same name as a page name or the layout will break. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'kraft' ),	
			'default' => 'portfolio-item'
		),
		array(
			'id' => 'portfolio-nav-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Navigation bar', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the navigation bar in portfolio page.', 'kraft' ),			
			'default' => '1'			
		),				
		array(
			'id' => 'portfolio-page',
			'type' => 'select',
			'data' => 'pages',
			'title' => esc_html__( 'Navigation index', 'kraft' ),			
			'desc' => esc_html__( 'Specify the page you want to use as index.', 'kraft' ),					
		),
		array(
			'id' => 'portfolio-nav-loop-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Navigation loop', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the portfolio items in loop.', 'kraft' ),			
			'default' => '0'			
		),
		array(
			'id' => 'portfolio-related-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Related Portfolio', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the related portfolio items.', 'kraft' ),			
			'default' => '1'			
		),
		array(
			'id'   => 'info_portfolio_label',
			'type' => 'info',
			'desc' => esc_html__( 'Portfolio label', 'kraft' )
		),			
		array(
			'id' => 'portfolio-next-text',
			'type' => 'text',
			'title' => esc_html__( 'Next post label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for next button.', 'kraft' ),	
			'default' => 'Next'
		),
		array(
			'id' => 'portfolio-previous-text',
			'type' => 'text',
			'title' => esc_html__( 'Previous post label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for prev button.', 'kraft' ),	
			'default' => 'Prev'
		),
		array(
			'id' => 'portfolio-social-share-title',
			'type' => 'text',
			'title' => esc_html__( 'Social share title', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for social share title.', 'kraft' ),	
			'default' => 'Share'
		),			
		array(
			'id' => 'portfolio-filter-text',
			'type' => 'text',
			'title' => esc_html__( 'Portfolio filter label', 'kraft' ),
			'subtitle' => esc_html__( 'Enter a label for portfolio default filter : All.', 'kraft' ),	
			'default' => 'All'
		),
		array(
			'id'   => 'info_portfolio_section',
			'type' => 'info',
			'desc' => esc_html__( 'Portfolio section', 'kraft' )
		),	
		array(
			'id'		=> 'portfolio-lightbox-switch',			
			'type'      => 'button_set',
			'options'   => array(
								'single'   => esc_html__( 'Single Preview', 'kraft' ),
								'multiple' => esc_html__( 'Multiple Preview', 'kraft' ),
							),
			'title'		=> esc_html__( 'Portfolio Lightbox', 'kraft' ),
			'subtitle'	=> esc_html__( 'Select the lightbox type single or multiple preview for image, video and gallery.', 'kraft' ),			
			'default'	=> 'single'
		),
		array(
			'id' => 'portfolio-thumb-title-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Portfolio thumbnail title', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the title in portfolio thumbnail.', 'kraft' ),			
			'default' => '1'			
		),
		array(
			'id' => 'portfolio-thumb-subtitle-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Portfolio thumbnail sub title', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show the sub title in portfolio thumbnail.', 'kraft' ),			
			'default' => '1'			
		),
		array(
			'id' => 'portfolio-order-by',			
			'type'        => 'select',
			'options'     => array(
								"date"		 => esc_html__( "Date", "kraft" ),
								"ID"		 => esc_html__( "ID", "kraft" ),							
								"title"		 => esc_html__( "Title", "kraft" ),
								"modified"	 => esc_html__( "Last Modified", "kraft" ),										
								"rand"		 => esc_html__( "Random", "kraft" ),										
								"menu_order" => esc_html__( "Custom Sort", "kraft" )
							),
			'title' => esc_html__( 'Order By', 'kraft' ),
			'subtitle' => esc_html__( 'Select the portfolio order by.', 'kraft' ),			
			'default' => 'date'
		),
		array(
			'id' => 'portfolio-order-arrangement',			
			'type'        => 'select',
			'options'     => array(
								"ASC"	=> esc_html__( "Ascending", "kraft" ),
								"DESC"	=> esc_html__( "Descending", "kraft" ),
							),
			'title' => esc_html__( 'Order Arrangement', 'kraft' ),
			'subtitle' => esc_html__( 'Choose the order in which the portfolio items has to be displayed.', 'kraft' ),			
			'default' => 'ASC'
		),		
		array(
			'id'   => 'info_portfolio_slider',
			'type' => 'info',
			'desc' => esc_html__( 'Portfolio Details slider', 'kraft' )
		),				
		array(
			'id' => 'portfolio-slider-controls-scheme',
			'type' => 'radio',
			'title' => esc_html__( 'Slider Controls Scheme', 'kraft' ),
			'subtitle' => esc_html__( 'You can choose the controls scheme for sliders navigation/pagination as per your requirement from here.', 'kraft' ),		
			'options' => array(
							'dark-controls' => esc_html__( 'Dark scheme', 'kraft' ),							
							'light-controls'  => esc_html__( 'Light scheme', 'kraft' ),							
						),
			'default' => 'dark-controls'
		),
		array(
			'id'   => 'info_portfolio_archive',
			'type' => 'info',
			'desc' => esc_html__( 'Portfolio Category Archive', 'kraft' )
		),	
		array(
			'id' => 'portfolio-subcategory-filter-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Sub Category Filter', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to show sub cateogry filter on category archive page.', 'kraft' ),			
			'default' => '1'			
		),
		array(
			'id' => 'portfolio-exclude-list',
			'type' => 'text',
			'title' => esc_html__( 'Exclude Portfolio List', 'kraft' ),
			'subtitle' => esc_html__( 'Enter the portfolio ids which needs to be excluded in archive category.', 'kraft' ),								
		),
	)
);
