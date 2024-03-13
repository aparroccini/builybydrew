<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-admin-site',
	'title' => esc_html__( 'Map Settings', 'kraft' ),
	'heading' => '',	
	'fields' => array(	
		array(
			'id'   => 'info_google_map',
			'type' => 'info',
			'desc' => esc_html__( 'Google map settings', 'kraft' )
		),
		array(
			'id' => 'map-api-key',
			'type' => 'text',
			'title' => esc_html__( 'Google map API Key', 'kraft' ),
			'subtitle' => esc_html__( 'Enter the google map api key.', 'kraft' ),
			'default' => 'YOUR_API_KEY'
		),
		array(
			'id' => 'map-style',
			'type' => 'textarea',
			'title' => esc_html__( 'Map style', 'kraft' ),
			'subtitle' => esc_html__( 'Paste your preferred map style here. Check all the available map styles on https://snazzymaps.com', 'kraft' ),			
			'default' => '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]'
		),
	)
);
