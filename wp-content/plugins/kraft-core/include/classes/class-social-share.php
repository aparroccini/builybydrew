<?php
/**
 * Social Share Shortcode
 * 
 */

if( ! class_exists( 'Kraft_Social_Share' ) ) {	 
 
	class Kraft_Social_Share {

		public function __construct() {			
			
			add_shortcode( 'kraft_post_social_share', array( $this, 'render_post_social_share' ) );
			
			add_shortcode( 'kraft_portfolio_social_share', array( $this, 'render_portfolio_social_share' ) );
			
			add_action( 'wp_enqueue_scripts', array( $this, 'social_share_script' ) );
			
		}
		
		public function render_post_social_share( $args, $content = '' ) {
			
			$allow_social_sharing = kraft_get_option( 'blog-social-sharing' );
			$social_sharing_markup = ''; 
			
			$multilingual_switch = kraft_get_option( 'multilingual-switch' );		
			$social_share_title  = kraft_get_option( 'blog-social-share-title' );		
			
			$icons = kraft_get_option( 'blog-share-icon' );

			if( !empty( $icons ) ) {
				$icons = $icons[ 'Post icons' ];
			}
		

		   if ( $allow_social_sharing == 1 && count( $icons ) > 1 ) {

				$social_sharing_markup .= '<div class="socials-share-links">';
				
				$social_sharing_markup .= '<span class="screen-reader-text">' . esc_html__( 'Share', 'kraft' ) . '</span>';
				
				if( $multilingual_switch == 1 ) {						
					$social_sharing_markup .= '<h6>' . esc_html__( 'Share', 'kraft' ) . '</h6>';
				}
				else {
					$social_sharing_markup .= '<h6>' . $social_share_title . '</h6>';
				}
				
				$social_sharing_markup .= '<ul>';			

				foreach ( $icons as $icon => $name ) {

					if ( $icon !== reset( $icons ) ) {							

						$social_sharing_markup .= '<li>';

						$social_sharing_markup .= '<a href="#" data-network="' . esc_attr( $icon ) . '" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share post on ' . esc_attr( $icons[ $icon ] ) . '" >';						
						
						if ( kraft_get_option( 'blog-social-type' ) == 'icon' ) {
							$social_sharing_markup .= '<i class="fab fa-' . esc_attr( $icon ) . '"></i>';
						}
						else {
							$social_sharing_markup .= esc_html( $icons[ $icon ] );
						}
						
						$social_sharing_markup .= '</a>';

						$social_sharing_markup .= '</li>';

					}
				}

				$social_sharing_markup .= '</ul>';

				$social_sharing_markup .= '</div>';

			} 
			
			echo apply_filters( 'kraft_render_post_social_share', $social_sharing_markup );
			
		}
		
		public function render_portfolio_social_share( $args, $content = '' ) {			
									
			$allow_social_sharing = kraft_get_post_meta( 'share_portfolio' );
			$portfolio_social_sharing_markup = '';			
			
			$multilingual_switch = kraft_get_option( 'multilingual-switch' );		
			$social_share_title  = kraft_get_option( 'portfolio-social-share-title' );		
		
			$socials_icons       = kraft_get_post_meta( 'portfolio_socials_icons' );

			$share_facebook		 = kraft_get_post_meta( 'share_facebook' );
			$share_twitter		 = kraft_get_post_meta( 'share_twitter' );
			$share_x_twitter	 = kraft_get_post_meta( 'share_x_twitter' );
			$share_linkedin		 = kraft_get_post_meta( 'share_linkedin' );
			$share_googleplus	 = kraft_get_post_meta( 'share_googleplus' );
			$share_pinterest	 = kraft_get_post_meta( 'share_pinterest' );
			$share_xing			 = kraft_get_post_meta( 'share_xing' );
		

		   if ( $allow_social_sharing == 1 ) {

				$portfolio_social_sharing_markup .= '<li class="portfolio-social-share-links">';

				if( $multilingual_switch == 1 ) {
					$portfolio_social_sharing_markup .= '<span>' . esc_html( 'Share', 'kraft' ) . '</span>';
				}
				else {
					$portfolio_social_sharing_markup .= '<span>' . $social_share_title . '</span>';
				}
					
				if( $share_facebook ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="facebook-f" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Facebook" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-facebook-f"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>Facebook</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}
				
				if( $share_twitter ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="twitter" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Twitter" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-twitter"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>Twitter</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}

				if( $share_x_twitter ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="x-twitter" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on X Twitter" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-x-twitter"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>X Twitter</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}
				
				if( $share_linkedin ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="linkedin-in" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Linkedin" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-linkedin-in"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>LinkedIn</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}
				
				if( $share_googleplus ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="google-plus-g" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Google+" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-google-plus-g"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>Google+</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}
				
				if( $share_pinterest ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="pinterest-p" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Pinterest" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-pinterest-p"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>Pinterest</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}
				
				if( $share_xing ) {					
				
					$portfolio_social_sharing_markup .= '<a href="#" data-network="xing" data-shareurl="' . esc_url( get_the_permalink() ) . '" title="Share portfolio on Xing" >';		
					
					if( $socials_icons ) {
						$portfolio_social_sharing_markup .= '<i class="fab fa-xing"></i>';
					}
					else {
						$portfolio_social_sharing_markup .= '<span>Xing</span>';
					}
					
					$portfolio_social_sharing_markup .= '</a>';					
					
				}

			
				
				$portfolio_social_sharing_markup .= '</li>';
			
		    }
			
			
			return apply_filters( 'kraft_render_portfolio_social_share', $portfolio_social_sharing_markup );			
		
		}
		
		public function social_share_script() {
			
			wp_enqueue_script( 'kraft-socialshare-script', KRAFT_CORE_URL . 'assets/js/social-share.js', array( 'jquery' ), KRAFT_CORE_VERSION, true );				
		}
		
	}
	
	new Kraft_Social_Share();

}