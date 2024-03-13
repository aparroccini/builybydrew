<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-admin-appearance',
	'title' => esc_html__( 'Custom CSS', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id'   => 'info_custom_css',
			'type' => 'info',			
			'desc' => esc_html__( 'Custom CSS', 'kraft' )
		),
		array(
			'id'     => 'section-start',
			'type'   => 'section',
			'class' => 'custom-css-section',
			'subtitle' => esc_html__( 'Enter your CSS code in the field below. Do not include any tags or HTML in the field. Custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', 'kraft' ),
			'indent' => true,
		),
		array(
            'id' => 'custom-css',
            'type' => 'ace_editor',         
            'mode' => 'css',
            'theme' => 'chrome',
			'class' => 'custom-css-field',
			'options' => array( 'minLines'=> 40, 'maxLines' => 100 ),           
        ),		
		array(
			'id' => 'section-end',
			'type' => 'section',
			'indent' => false,			
		),	
	)
);
