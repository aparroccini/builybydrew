<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-dismiss',
	'title' => esc_html__( 'Page 404', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id'   => 'info_page404',
			'type' => 'info',
			'desc' => esc_html__( 'Page 404 settings', 'kraft' )
		),
		array(
			'id' => 'page-title',
			'type' => 'text',
			'title' => esc_html__( 'Page title', 'kraft' ),					
			'default' => '404'
		),
		array(
			'id' => 'page-subtitle',
			'type' => 'text',
			'title' => esc_html__( 'Page subtitle', 'kraft' ),			
			'default' => 'Sorry, the page requested couldn\'t be found.'
		),
		array(
			'id' => 'page-desc',
			'type' => 'textarea',
			'title' => esc_html__( 'Page description', 'kraft' ),			
			'default' => 'Sorry, the page The page you are looking for might have been removed had its name changed or its temporarily unavailable.'
		),
		array(
			'id' => 'page-btn-text',
			'type' => 'text',
			'title' => esc_html__( 'Button text', 'kraft' ),			
			'default' => 'Back to home'
		),
	)
);
