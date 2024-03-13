<?php
/**
 * Registers the image gallery shortcode and adds it to the Visual Composer
 */

class WPBakeryShortCode_kraft_image_gallery extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-image-gallery.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-image-gallery.php' ) );
		}
		
		return ob_get_clean();
	}
}
	
if ( ! function_exists( 'kraft_image_gallery_vc_map' ) ) {		
	
	function kraft_image_gallery_vc_map() {		
		
		return array(
			"name"						=> esc_html__( "Image gallery", 'kraft' ),
			"description"				=> esc_html__( "Add image gallery.", 'kraft' ),
			"base"						=> "kraft_image_gallery",
			"category"					=> ucfirst( KRAFT_THEME_NAME ),
			"icon"						=> "kraft-image-gallery-icon",			
			"params"					=> array(	
				array(
					"type"			=> "attach_images",
					"admin_label"	=> true,				
					"heading"		=> esc_html__( "Attach images", 'kraft' ),
					"param_name"	=> "image_gallery_ids",
					"description"	=> esc_html__( "Select images for gallery.", 'kraft' ),					
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Gallery layout', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "gallery_layout",					
					"value"				=> array(
												esc_html__( 'Grid', 'kraft')    => 'grid',
												esc_html__( 'Mosaic', 'kraft')	=> 'mosaic',											
											),
					"description"		=> esc_html__("Set layout mode for gallery.", 'kraft')
				),			
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Gallery columns', 'kraft' ),
					"admin_label"		=> true,
					"param_name"		=> "gallery_columns",							
					"value"				=> array(
												esc_html__( '1 Column', 'kraft')   => '1',
												esc_html__( '2 Column', 'kraft')   => '2',
												esc_html__( '3 Column', 'kraft')   => '3',
												esc_html__( '4 Column', 'kraft')   => '4',											
												esc_html__( '5 Column', 'kraft')   => '5',											
												esc_html__( '6 Column', 'kraft')   => '6',
												esc_html__( '7 Column', 'kraft')   => '7',											
												esc_html__( '8 Column', 'kraft')   => '8',
											),
					"description"		=> esc_html__("Set the number of columns for gallery. (columns range should be from 1 - 8)", 'kraft')
				),			
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Horizontal Space", 'kraft' ),
					"param_name"		=> "gap_horizontal",
					"value"				=> "30",
					"description"		=> esc_html__('Set the horizontal space between each gallery item, Example 30. The value is in px.','kraft'),					
				),
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Vertical Space", 'kraft' ),
					"param_name"		=> "gap_vertical",
					"value"				=> "30",
					"description"		=> esc_html__('Set the vertical space between each gallery item, Example 30. The value is in px.','kraft'),					
				),			
				array(
					"type"			=> 'checkbox',
					"heading"		=> esc_html__( "Show lightbox", 'kraft' ),
					"param_name"	=> 'show_lightbox',					
				),				
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( 'Image Title', 'kraft' ),
					"param_name"	=> "image_title",					
					"description"	=> esc_html__( 'Show image title from image meta details in media library.', 'kraft' ),
					"group"			=> esc_html__( 'Image Meta', 'kraft' ),
				),
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( 'Image Caption', 'kraft' ),
					"param_name"	=> "image_caption",					
					"description"	=> esc_html__( 'Show image caption from image meta details in media library.', 'kraft' ),
					"group"			=> esc_html__( 'Image Meta', 'kraft' ),
				),
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( 'Image Description', 'kraft' ),
					"param_name"	=> "image_desc",					
					"description"	=> esc_html__( 'Show image description from image meta details in media library.', 'kraft' ),
					"group"			=> esc_html__( 'Image Meta', 'kraft' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Meta Alignment', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "meta_align",					
					"value"			=> array(
											esc_html__( 'Left Aligned', 'kraft')  => 'left-aligned',
											esc_html__( 'Center Aligned', 'kraft') => 'center-aligned',
											esc_html__( 'Right Aligned', 'kraft')  => 'right-aligned',
										),
					"description"	=> esc_html__("Image Meta alignment ie. caption and description.", 'kraft'),
					"group"			=> esc_html__( 'Image Meta', 'kraft' ),
				),			
				// Responsive Settings				
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet (Landscape view)', 'kraft' ),
					"param_name"	=> "tablet_landscape",
					"value"			=> "3",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablet landscape view.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet (Portrait view)', 'kraft' ),
					"param_name"	=> "tablet_portrait",
					"value"			=> "2",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablet portrait view.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> 'textfield',
					"heading"		=> esc_html__( 'Mobile', 'kraft' ),
					"param_name"	=> 'mobile',
					"value"			=> '1',	
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on mobile.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
			),
		);	
	}

}

vc_lean_map( 'kraft_image_gallery', 'kraft_image_gallery_vc_map' );