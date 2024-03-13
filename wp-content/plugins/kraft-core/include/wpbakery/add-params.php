<?php
/**
 * Add new params to Visual Composer elements 
 */

/*-----------------------------------------------------------------------------------*/
/*	- Rows
/*-----------------------------------------------------------------------------------*/

vc_add_param( 'vc_row',	array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Row stretch', 'kraft' ),
	'param_name' => 'full_width',
	'value' => array(
				esc_html__( 'Default', 'kraft' ) => '',
				esc_html__( 'Full width', 'kraft' ) => 'full-width',
				esc_html__( 'Stretch row', 'kraft' ) => 'stretch_row',
				esc_html__( 'Stretch row and content', 'kraft' ) => 'stretch_row_content',
				esc_html__( 'Stretch row and content (no paddings)', 'kraft' ) => 'stretch_row_content_no_spaces',
		),
	'description' => esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'kraft' ),
) );


/*-----------------------------------------------------------------------------------*/
/*	- Google Map
/*-----------------------------------------------------------------------------------*/

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Latitude', 'kraft' ),
	'admin_label'	=> true,
	'param_name'	=> 'latitude',
) );

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Longitude', 'kraft' ),
	'admin_label'	=> true,
	'param_name'	=> 'longitude',
) );

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Zoom', 'kraft' ),
	'admin_label'	=> true,
	'param_name'	=> 'zoom',
	'value'			=> '10',
) );

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Map height', 'kraft' ),	
	'param_name'	=> 'map_height',
	'value'			=> '400px',
) );

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Map width', 'kraft' ),	
	'param_name'	=> 'map_width',
	'value'			=> '100%',
) );

vc_add_param( 'vc_gmaps', array(
	'type'			=> 'attach_image',
	'heading'		=> esc_html__( 'Map Marker', 'kraft' ),
	'param_name'	=> 'map_marker',	
	'description'	=> esc_html__( 'Select image for map marker.', 'kraft' ),		
) );

/*-----------------------------------------------------------------------------------*/
/*	- Column text
/*-----------------------------------------------------------------------------------*/

vc_add_param( 'vc_column_text', array(
	"type"			=> "dropdown",
	"heading"		=> esc_html__( "Font Size", "kraft" ),
	"param_name"	=> "font_size",
	"value"			=> array(
							esc_html__( "Inherit", "kraft" ) => "",
							esc_html__( "16px", "kraft" ) => "para-16",
							esc_html__( "18px", "kraft" ) => "para-18",													
							esc_html__( "Custom", "kraft" ) => "custom",													
					),
	"description"	=> esc_html__("Select font size.", "kraft"),	
) );

vc_add_param( 'vc_column_text',	array(
	'type'			=> 'kraft_responsive',
	'heading'		=> esc_html__( 'Custom Font Size', 'kraft' ),
	'param_name'	=> 'custom_font_size',
	"unit"			=> "px",
	"parent_class"  => "wpb_text_column",
	"selector"      => ".wpb_wrapper",
	"property"      => "font-size",
	"media"			=> array(											
							"Desktop"           => '20',
							"Tablet"            => '',
							"Tablet Portrait"   => '',
							"Mobile Landscape"  => '',
							"Mobile"            => '',
					),	
	'dependency'	=> array(
						'element' => 'font_size',
						'value' => 'custom',
					),
	'description'	=> esc_html__( 'Enter the custom fontsize. eg 20px', 'kraft' ),	
));

vc_add_param( 'vc_column_text',	array(
	'type'			=> 'kraft_responsive',
	'heading'		=> esc_html__( 'Line Height', 'kraft' ),
	'param_name'	=> 'responsive_line_height',
	"unit"			=> "px",
	"parent_class"  => "wpb_text_column",
	"selector"      => ".wpb_wrapper",
	"property"      => "line-height",
	"media"			=> array(											
							"Desktop"           => '',
							"Tablet"            => '',
							"Tablet Portrait"   => '',
							"Mobile Landscape"  => '',
							"Mobile"            => '',
					),	
	'description'	=> esc_html__( 'Enter the line height. eg 20px', 'kraft' ),	
));

vc_add_param( 'vc_column_text', array(
	"type"			=> "dropdown",
	"heading"		=> esc_html__( "Font weight", "kraft" ),
	"param_name"	=> "font_weight",
	"value"			=> kraft_get_google_font_styles( 'body-font' ),
	"description"   => esc_html__("Select font weight.", "kraft"),	
) );
		
vc_add_param( 'vc_column_text',	array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Extra class name', 'kraft' ),
	'param_name'	=> 'el_class',
	'description'	=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'kraft' ),
	'weight'		=> 0,
));
