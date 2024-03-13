<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-welcome-view-site',
	'title' => esc_html__( 'Branding', 'kraft' ),
	'heading' => '',
	'fields' => array(		
		array(
			'id'   => 'heading_dark_logo',
			'type' => 'info',
			'desc' => esc_html__( 'Dark Logo', 'kraft' )
		),	
	    array(
			'id' => 'menu-logo',
			'type' => 'media',
			'title' => esc_html__( 'Logo', 'kraft' ),
			'compiler' => 'true',			
			'default' => array( 'url' => KRAFT_CORE_URL . 'assets/images/logo.png' ),
		),	
		array(
			'id' => 'menu-retina-logo',
			'type' => 'media',
			'title' => esc_html__( 'High-DPI (retina) logo', 'kraft' ),
			'compiler' => 'true',			
			'default' => array( 'url' => KRAFT_CORE_URL . 'assets/images/logo2x.png' ),
		),
		array(
			'id'   => 'heading_light_logo',
			'type' => 'info',
			'desc' => esc_html__( 'Light Logo', 'kraft' )
		),	
		array(
			'id' => 'menu-light-logo',
			'type' => 'media',
			'title' => esc_html__( 'Logo', 'kraft' ),
			'compiler' => 'true',				
		),	
		array(
			'id' => 'menu-light-retina-logo',
			'type' => 'media',
			'title' => esc_html__( 'High-DPI (retina) logo', 'kraft' ),
			'compiler' => 'true',						
		),	
	),	
);
