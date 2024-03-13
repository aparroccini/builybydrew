<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-admin-generic',
	'title' => esc_html__( 'General', 'kraft' ),
	'heading' => '',	
	'fields' => array(			
		array(
			'id'   => 'info_page_title',
			'type' => 'info',
			'desc' => esc_html__( 'Page Title', 'kraft' )
		),		
		array(
			'id' => 'hide-title-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Hide title', 'kraft' ),
			'subtitle' => esc_html__( 'Hide title on the page.', 'kraft' ),			
			'default' => '1'			
		),
		array(
			'id'   => 'info_body_bg',
			'type' => 'info',
			'desc' => esc_html__( 'Background', 'kraft' )
		),
		array(
			'id' => 'body-background-color',
			'type' => 'background',
			'title' => esc_html__( 'Body background', 'kraft' ),
			'subtitle' => esc_html__( 'Body background with image, color,etc.', 'kraft' ),
			'background-color' => true,
			'background-repeat' => true,
			'background-attachment' => true,
			'background-position' => true,
			'background-image' => true,		
			'background-size' => true,					
			'transparent' => false,
			'default'  => array(
				'background-color' => '#fff',
				'background-repeat' => 'no-repeat',
				'background-position' => 'center center',
				'background-size' => 'inherit',
				'background-attachment' => 'fixed'
			)
		),		
		array(
			'id'   => 'info_lightbox',
			'type' => 'info',
			'desc' => esc_html__( 'Lightbox', 'kraft' )
		),	
		array(
			'id' => 'lightbox-skin',
			'type' => 'radio',
			'title' => esc_html__( 'Skin', 'kraft' ),
			'subtitle' => esc_html__( 'You can choose the skin for lightbox as per your requirement from here.', 'kraft' ),		
			'options' => array(
							'dark-skin' => esc_html__( 'Dark skin', 'kraft' ),							
							'metro-white-skin'  => esc_html__( 'Light skin', 'kraft' ),							
						),
			'default' => 'dark-skin'
		),
		array(
			'id'   => 'info_lazyload',
			'type' => 'info',
			'desc' => esc_html__( 'Lazy load', 'kraft' )
		),	
		array(
			'id' => 'lazy-load-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Lazy load', 'kraft' ),
			'subtitle' => esc_html__( 'You can activate/deactivate the lazy load for images in portfolio section, sliders.', 'kraft' ),			
			'default' => '1'			
		),		
		array(
			'id'   => 'info_javascript',
			'type' => 'info',
			'desc' => esc_html__( 'Javascript', 'kraft' )
		),
		array(
			'id' => 'minify-js-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Minify javascript', 'kraft' ),
			'subtitle' => esc_html__( 'You can minify the javascript in a single minified file.', 'kraft' ),			
			'default' => '1'			
		),			
		array(
			'id'   => 'info_multilingual',
			'type' => 'info',
			'desc' => esc_html__( 'Multilingual', 'kraft' )
		),
		array(
			'id' => 'multilingual-switch',
			'type' => 'switch',
			'title' => esc_html__( 'Use theme as multilingual', 'kraft' ),
			'subtitle' => esc_html__( 'Activate to use theme as multilingual.', 'kraft' ),			
			'default' => '0'			
		),				
	)
);
