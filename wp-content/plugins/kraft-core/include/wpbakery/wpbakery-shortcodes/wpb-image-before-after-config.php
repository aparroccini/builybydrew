<?php
/**
 * Registers the image before after shortcode and adds it to the Visual Composer 
 */

class WPBakeryShortCode_kraft_image_before_after extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		ob_start();
		
		if( locate_template( 'shortcodes/wpb-image-before-after.php' ) != '' ) {
			include( locate_template( 'shortcodes/wpb-image-before-after.php' ) );
		}
		
		return ob_get_clean();
	}	
}

if ( ! function_exists( 'kraft_image_before_after_vc_map' ) ) {		
	
	function kraft_image_before_after_vc_map() {
		
		return array(
			"name"					=> esc_html__( "Image Before After", 'kraft' ),
			"description"			=> esc_html__( "Add Images", 'kraft' ),
			"base"					=> "kraft_image_before_after",
			"category"				=> ucfirst( KRAFT_THEME_NAME ),
			"icon" 					=> "kraft-image-before-after-icon",			
			"params"				=> array(			
											array(
												"type"			=> "attach_images",
												"admin_label"	=> true,				
												"heading"		=> esc_html__( "Attach images", 'kraft' ),
												"param_name"	=> "before_after_image_ids",
												"description"	=> esc_html__( "Select images in pair of 2 for comparing.", 'kraft' ),					
											),	
										)
		);	
	}

}

vc_lean_map( 'kraft_image_before_after', 'kraft_image_before_after_vc_map' );