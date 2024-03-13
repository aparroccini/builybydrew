<?php 
/* 
 * Return value for key
 *  
 */

if ( ! function_exists( 'kraft_get_option' ) ) {		

	function kraft_get_option( $key ) {

		global $kraft_theme_settings;	

		if ( class_exists( 'Kraft_Theme_Options' ) && isset( $kraft_theme_settings[ $key ] ) ) {
			$output = $kraft_theme_settings[ $key ];		
		}
		else {

			$default_options = kraft_theme_default_options();

			if( isset( $default_options[ $key ] ) ) {
				$output = $default_options[ $key ];		
			}
			else {
				$output = '';
			}			
		}	

		return $output;
	}
}


if ( ! function_exists( 'kraft_get_google_font_styles' ) ) {
	
	function kraft_get_google_font_styles( $font_param_name ) {

		$default_font_style = array( 
										array( 'id' => '400',       'name' => 'Regular' ), 
										array( 'id' => '400italic', 'name' => 'Italic' ),
										array( 'id' => '700',	    'name' => 'Bold' ), 
										array( 'id' => '700italic', 'name' => 'Bold Italic' ), 
									);

		$font_family = '';

		$font   = kraft_get_option( $font_param_name );

		if( !empty( $font ) ) {		
			$font_family = $font[ 'font-family' ];
		}

		$gFile = KRAFT_CORE_PATH . 'include/vendor/redux-framework/redux-core/inc/fields/typography/googlefonts.php';

		$fonts = include $gFile;	

		if( !empty( $fonts[ $font_family ] ) ) {		
			return $fonts[ $font_family ][ 'variants' ];
		}

		return $default_font_style;

	}
}	


if ( ! function_exists( 'kraft_get_selected_body_font_styles' ) ) {
	
	function kraft_get_selected_body_font_styles() {

		$font_style_array = array();

		$google_font_styles  = kraft_get_google_font_styles( 'body-font' );
		$body_selected_font_styles = kraft_get_option( 'body-font-style' );

		if( !empty( $google_font_styles ) ) {

			foreach ( $google_font_styles as $font_style ) {

				if( !empty( $body_selected_font_styles ) && $body_selected_font_styles[ $font_style['id'] ] == '1' ) {
					$font_style_array[] = $font_style;
				}
			}	
		}	

		return $font_style_array;	
	}
}

if ( ! function_exists( 'kraft_get_selected_heading_font_styles' ) ) {
	
	function kraft_get_selected_heading_font_styles() {

		$font_style_array = array();

		$google_font_styles  = kraft_get_google_font_styles( 'heading-font' );
		$heading_selected_font_styles = kraft_get_option( 'heading-font-style' );

		if( !empty( $google_font_styles ) ) {

			foreach ( $google_font_styles as $font_style ) {

				if( !empty( $heading_selected_font_styles ) && $heading_selected_font_styles[ $font_style['id'] ] == '1' ) {
					$font_style_array[] = $font_style;
				}
			}	
		}	

		return $font_style_array;	
	}
}


if ( ! function_exists( 'kraft_get_revslider_list' ) ) {
	
	function kraft_get_revslider_list() {

		if( class_exists( 'RevSlider' ) ) {		

			$slider = new RevSlider();
			$arrSliders = $slider->getArrSliders();

			$revsliders = array();
			if ( $arrSliders ) {
				foreach ( $arrSliders as $slider ) {
					/** @var $slider RevSlider */
					$revsliders[ $slider->getAlias() ] = $slider->getTitle();
				}
			} 
			else {
				$revsliders[ 'NO_SLIDER' ] = esc_html__( 'No sliders found', 'kraft' );
			}
		}
		else {
			$revsliders[ 'NO_SLIDER' ] = esc_html__( 'Slider Revolution is not active.', 'kraft' );
		}

		return $revsliders;
	}
}	

if ( ! function_exists( 'kraft_theme_default_options' ) ) {
	
	function kraft_theme_default_options() {	

		return array( 

			//General			
			'hide-title-switch' => '0',
			'body-background-color' => array(	'background-color' => '#fff', 'background-repeat' => 'no-repeat', 'background-position' => 'center center', 'background-size' => 'inherit',	'background-attachment' => 'fixed' ),				
			'minify-js-switch' => '1',														
			'multilingual-switch' => '1',

			//Branding
			'menu-logo' => array( 'url' => KRAFT_CORE_URL . 'assets/images/logo.png' ),
			'menu-retina-logo' => array( 'url' => KRAFT_CORE_URL . 'assets/images/logo2x.png' ),				

			//Menu			
			'menu-style' => 'standard',
			'menu-layout-switch' => 'boxed',
			'menu-sticky-switch' => '0',
			
			//typography
			'body-font' => array( 'font-family' => 'Roboto' ),
			'body-font-style' => array( '400' => '1', '500' => '1', '700' => '1' ),
							
			//Blog
			'blog-style'  => 'blog-classic-sidebar',	
			'blog-title'  => 'Blog',
			'blog-subtitle' => 'Thoughts and Upcomings are shared here.',				
			'blog-post-slider-navigation' => '0',			
			'blog-post-slider-pagination' => '1',					

			//Footer
			'footer-style'  => 'standard',				
			'footer-layout-switch'  => 'boxed',		
			'footer-scrolltotop-switch' => '0',
			'footer-copyright' => '&#169; 2020 CaliberThemes',			

		);	
	}
}

if ( ! function_exists( 'kraft_post_time' ) ) {	

	function kraft_post_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C ),
			get_the_date( 'd M Y' ),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date( 'd M Y' )
		);
		
		return $time_string;
	}
}


if ( ! function_exists( 'kraft_get_contact_form_7_posts' ) ) {

	function kraft_get_contact_form_7_posts(){
  
		$args = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1 );
	
		$cf7_form_list = [];
		
		if( $cf7_forms = get_posts( $args ) ) {

		  	foreach ( $cf7_forms as $form ) {

				$cf7_form_list[ $form->ID ] = $form->post_title;
		  	}
		}
		else {
			$cf7_form_list[ '0' ] = esc_html__( 'No contect From 7 form found', 'void' );
		}

	  	return $cf7_form_list;
	}

}

?>