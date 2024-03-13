<?php
/**
 * Registers the image slider shortcode and adds it to the Visual Composer
 */

class WPBakeryShortCode_kraft_image_slider extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-image-slider.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-image-slider.php' ) );
		}
		
		return ob_get_clean();
	}	
	
}
	
if ( ! function_exists( 'kraft_image_slider_vc_map' ) ) {	
	
	function kraft_image_slider_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Image Slider", 'kraft' ),
			"description"			=> esc_html__( "Image Slider.", 'kraft' ),
			"base"					=> "kraft_image_slider",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon"					=> "kraft-image-slider-icon",
			"params"				=> array(				
				array(
					"type"			=> "attach_images",
					"admin_label"	=> true,				
					"heading"		=> esc_html__( "Attach images", 'kraft' ),
					"param_name"	=> "image_ids",
					"description"	=> esc_html__( "Select images for slider. (Note: all the images should be equal in size).", 'kraft' ),					
				),			
				array(
					"type"				=> "dropdown",
					"heading"			=> esc_html__( 'Slider per view', 'kraft' ),					
					"param_name"		=> "no_of_slides",					
					"value"				=> array(
												esc_html__( '1 Slide', 'kraft')    => '1',
												esc_html__( '2 Slide', 'kraft')    => '2',
												esc_html__( '3 Slide', 'kraft')    => '3',
												esc_html__( '4 Slide', 'kraft')    => '4',											
											),	
				),		
				array(
					"type"				=> "textfield",				
					"heading"			=> esc_html__( "Space between slides", 'kraft' ),
					"param_name"		=> "space_between_slides",				
					"value"				=> "30",
					"description"		=> esc_html__('Distance between slides in px.','kraft'),						
				),							
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Show Navigation", 'kraft' ),
					"description"	=> esc_html__( "Check to show the slider navigation", 'kraft' ),
					"param_name"	=> "navigation",
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),									
				),				
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Show pagination", 'kraft' ),
					"description"	=> esc_html__( "Check to show the slider pagination.", 'kraft' ),
					"param_name"	=> "pagination",
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),					
				),	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Transition effect', 'kraft' ),
					"admin_label"	=> true,
					"param_name"	=> "tranisition_effect",					
					"value"			=> array(
											esc_html__( 'Slide', 'kraft')    => 'slide',
											esc_html__( 'Fade', 'kraft')	=> 'fade',											
										),
					"description"	=> esc_html__("Set transition effect for portfolio slide.", 'kraft'),
					"std"			=> "slide",				
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),				
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( "Autoplay Delay", 'kraft' ),
					"param_name"	=> "autoplay_delay",
					"description"	=> esc_html__( 'Specify slideshow speed (in milliseconds). Default is 3500.', 'kraft' ),
					"value"			=> "3500",			
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),			
				array(
					"type"			=> "checkbox",
					"heading"		=> esc_html__( "Disable on interaction", 'kraft' ),
					"description"	=> esc_html__( "Set to No and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction.", 'kraft' ),
					"param_name"	=> "disable_on_interaction",					
					"value"			=> array(
											esc_html__( 'Yes', 'kraft' ) => 'yes'
										),				
					"std"			=> "yes",
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),	
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Slider Controls Scheme', 'kraft' ),				
					"param_name"	=> "slider_controls_scheme",					
					"value"			=> array(
											esc_html__( 'Dark Scheme', 'kraft')   => 'dark-controls',
											esc_html__( 'Light Scheme', 'kraft')	=> 'light-controls',											
										),
					"description"	=> esc_html__("Set controls scheme for sliders navigation/pagination as per your requirement from here.", 'kraft'),
					"std"			=> "dark-controls",				
					"group"			=> esc_html__( 'Slider Controls', 'kraft' ),
				),		
																		
				
				// Responsive Settings			
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Tablet', 'kraft' ),
					"param_name"	=> "no_of_slides_tablet",					
					"value"			=> "3",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on tablets.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html__( 'Mobile', 'kraft' ),
					"param_name"	=> "no_of_slides_mobile",				
					"value"			=> "1",					
					"description"	=> esc_html__( 'Specify the number of portfolio items to be displayed on mobile.', 'kraft' ),
					"group"			=> esc_html__( 'Responsive', 'kraft' ),
				),				
			)
		);	
	}

}

vc_lean_map( 'kraft_image_slider', 'kraft_image_slider_vc_map' );