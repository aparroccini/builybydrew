<?php

if ( ! class_exists( 'Kraft_WPBakery_Page_Builder_Extend' ) ) {
	
	class Kraft_WPBakery_Page_Builder_Extend {
		
		public function __construct() {
			
			// Setup VC
			if ( function_exists( 'vc_set_as_theme' )) {
				vc_set_as_theme();
			}

			// Run on init
			add_action( 'init', array( $this, 'init' ), 20 );
			
			add_action( 'vc_backend_editor_render', array( $this, 'init_vc_extend_css' ) );
			
			//save post
			add_action( 'save_post', array( $this, 'save' ) );
			
			// Alter default templates
			add_filter( 'vc_load_default_templates', array( $this, 'default_templates' ) );		
			
		}
		
		
		/**
		 * Functions that run on init	 
		 */
		public function init() {			
			
			if( is_admin() ) {			

				// Set defaults for admin
				if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
					vc_set_default_editor_post_types( array( 'page', 'portfolio', 'templatera' ) );
				}

				// Set defaults for editor
				if ( function_exists( 'vc_editor_set_post_types ') ) {
					$types = vc_settings()->get( 'content_types' );
					if ( empty( $types  ) ) {
						vc_editor_set_post_types( array( 'page', 'portfolio' ) );
					}
				}
				
								
				if( function_exists( 'vc_add_shortcode_param' ) ) {
					$this->custom_vc_params();
				}			

				// Remove parameters
				$this -> remove_params();
				
			}
			
			//set shotcodes template directory
			if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
				vc_set_shortcodes_templates_dir( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-templates' );
			}				

			// Add Params
			if ( function_exists( 'vc_add_param' ) ) {
				require_once( KRAFT_CORE_PATH . 'include/wpbakery/add-params.php' );
			}  

			// Include custom modules
			if ( function_exists( 'vc_lean_map' ) ) {
				$this->custom_vc_shortcodes();
			}

		}
					
		
		/**
         * Remove Element params        
         */
        public function remove_params() {
           
            // Array of params to remove
            $params = array(             
							
				//Column text
				'vc_column_text' => array(    					
					'css_animation',									
					'el_class',					
                ),										               
				
				// Google Map
                'vc_gmaps'   => array(                   
				    'title',
				    'link',
					'size',
				    'css_animation',			  
				    'el_class',
				    'css'
                ),			
            );
         
            // Loop through and remove default Visual Composer params
			
			if ( function_exists( 'vc_remove_param' )) {				
			
				foreach ( $params as $key => $val ) {
					if ( ! is_array( $val ) ) {
						return;
					}
					foreach ( $val as $remove_param ) {
						vc_remove_param( $key, $remove_param );
					}
				}
			}

        }	
		
		/**
		* Maps custom params for the VC	 
		*/
	    private static function custom_vc_params() {		

		    require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-params/switch-button-param.php' );		
		    require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-params/heading-label-param.php' );	
		    require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-params/preview-image-param.php' );	
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-params/responsive-param.php' );	

	    }
				
		/**
		 * Maps custom shortcodes for the VC	 
		 */
		private static function custom_vc_shortcodes() {

			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-address-block-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-content-box-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-call-to-action-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-heading-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-image-box-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-image-gallery-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-image-slider-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-list-block-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-list-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-portfolio-section-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-portfolio-slider-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-pricing-box-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-subscription-form-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-team-member-config.php' );					
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-portfolio-listing-config.php' );					
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-image-before-after-config.php' );		
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-portfolio-carousel-config.php' );			
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-button-config.php' );			
			require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-shortcodes/wpb-counter-config.php' );			

		}

		/**
		 * Alter default templates	
		 */
		public static function default_templates( $templates ) {
			return array(); // remove all default templates
		}
		
		function init_vc_extend_css() {	
			wp_enqueue_style( 'kraft-vc-extend', KRAFT_CORE_URL . 'assets/css/vc-extend.css', array(), KRAFT_CORE_VERSION );		
		}
		
		public function save( $post_id ) {
		
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			$post = get_post( $post_id );
			
			delete_post_meta( $post_id, KRAFT_META_PREFIX . 'kraft_responsive_css' );

			$css = $this->parseShortcodesCustomCss( $post->post_content );

			$css = str_replace( '}', '}|', $css );

			$css_array = explode( '|', $css );

			$css_media_width_1824 = array();
			$css_media_width_1199 = array();
			$css_media_width_991  = array();
			$css_media_width_767  = array();
			$css_media_width_479  = array();


			foreach( $css_array as $css_selectors ) {		

				$css_selector = substr( $css_selectors, 0, strpos( $css_selectors, '{' ) );			
				$css_media = substr( $css_selectors, strpos( $css_selectors, '{' ) + 1, -1 );			

				$css_media_array = explode( ';', $css_media );
				$property = substr( $css_media, strpos( $css_media, 'property' ) );
				
				$property = explode( ':', $property );			

				foreach( $css_media_array as $css_media_property ) {

					$media = explode( ':', $css_media_property );						

					if( $media[0] == 'desktop' && $media[1] != '0px' && $media[1] != 'px' ) {				
						$css_media_width_1824[] =  $css_selector . " \n { " . $property[1] . ':' .  $media[1]     . "; } \n ";									
					}
					elseif( $media[0] == 'tablet' && $media[1] != '0px' && $media[1] != 'px' ) {					
						$css_media_width_1199[] =  $css_selector . " \n { " . $property[1] . ':' .  $media[1]     . "; } \n ";												
					}
					elseif( $media[0] == 'tablet_portrait' && $media[1] != '0px' && $media[1] != 'px' ) {
						$css_media_width_991[] =  $css_selector . " \n { " . $property[1] . ':' .  $media[1]     . "; } \n ";					
					}
					elseif( $media[0] == 'mobile_landscape' && $media[1] != '0px' && $media[1] != 'px' ) {
						$css_media_width_767[] =  $css_selector . " \n { " . $property[1] . ':' .  $media[1]     . "; } \n ";			
					}
					elseif( $media[0] == 'mobile' && $media[1] != '0px' && $media[1] != 'px' ) {
						$css_media_width_479[] =  $css_selector . " \n { " . $property[1] . ':' .  $media[1]     . "; } \n ";					
					}

				}	

			}

			$responsive_css = '';

			$responsive_css    = "\n" . implode( ' ', $css_media_width_1824 );
			$responsive_css   .= "\n@media (max-width: 1199px) { " . implode( ' ', $css_media_width_1199 )  . "\n}";
			$responsive_css   .= "\n@media (max-width: 991px)  { " . implode( ' ', $css_media_width_991 )   . "\n}";
			$responsive_css   .= "\n@media (max-width: 767px)  { " . implode( ' ', $css_media_width_767 )   . "\n}";
			$responsive_css   .= "\n@media (max-width: 479px)  { " . implode( ' ', $css_media_width_479 )   . "\n}";
			
			update_post_meta( $post_id, KRAFT_META_PREFIX . 'kraft_responsive_css', $responsive_css );	
		
		}
	
		public function parseShortcodesCustomCss( $content ) {
	
			$css = '';


			if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
				return $css;
			}

			WPBMap::addAllMappedShortcodes();
			preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );

			foreach ( $shortcodes[2] as $index => $tag ) {

				$shortcode = WPBMap::getShortCode( $tag );
				$attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );

				if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
					foreach ( $shortcode['params'] as $param ) {
						if ( isset( $param['type'] ) && 'kraft_responsive' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) ) {
							$css .= $attr_array[ $param['param_name'] ];
						}
					}
				}
			}

			foreach ( $shortcodes[5] as $shortcode_content ) {

				$css .= $this->parseShortcodesCustomCss( $shortcode_content );			

			}
			
			return $css;
		}
		
	}
	
	$kraft_wpbakery_page_builder_extend = new Kraft_WPBakery_Page_Builder_Extend();
	
}

