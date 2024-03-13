<?php
/**
 * Plugin Name: Kraft Core
 * Plugin URI: http://kraft.caliberthemes.com
 * Description:  Core Plugin for Kraft Theme.
 * Version: 1.4.9
 * Requires at least: 6.0 
 * Tested up to: 6.4
 * Requires PHP: 7.4+
 * Author: caliberthemes
 * Author URI: http://themeforest.net/user/caliberthemes
 * Text Domain: kraft
 */

// Plugin Version
define(	'KRAFT_CORE_VERSION', '1.4.9' );

// Plugin Folder Path.
if ( ! defined( 'KRAFT_CORE_PATH' ) ) {
	define( 'KRAFT_CORE_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'KRAFT_CORE_URL' ) ) {
	define( 'KRAFT_CORE_URL', plugin_dir_url( __FILE__ ) );
}

if( ! defined( 'KRAFT_THEME_NAME' )) {
	define(	'KRAFT_THEME_NAME', 'kraft' );
}

if ( ! class_exists( 'Kraft_Core_Plugin' ) ) {
	
	class Kraft_Core_Plugin {
		
		protected static $instance = null;

		/**
		 * Initialize the class    
		*/
		public function __construct() {
			
			add_action( 'after_setup_theme', array( $this, 'load_kraft_core_text_domain' ) );
			
			add_action( 'after_setup_theme', array( $this, 'include_files' ) );
			
			// Load scripts & styles.
			add_action( 'admin_enqueue_scripts',  array( $this, 'admin_scripts' ) );	
			
			add_action( 'wp_dashboard_setup', array( $this, 'remove_metabox_dashboard_widget' ), 20 );
					
		}
		
		/**
		 * Register the plugin text domain.		 
		 */
		public function load_kraft_core_text_domain() {
			load_plugin_textdomain( 'kraft-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
		
		
		/**
		 * Return an instance of this class.		
		*/
		public static function get_instance() {

			// If the single instance hasn't been set yet, set it now.
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;

		}
		
		/**
		 * Enqueues admin scripts.		 
		 */
		public function admin_scripts( $page ) {
			
			$screen = get_current_screen();		
	
			if( is_admin() && $screen -> id == 'portfolio_page_sort_portfolio' ) {
				
				wp_enqueue_style( 'kraft-sort-stylesheet', KRAFT_CORE_URL . 'assets/css/sort-stylesheet.css', array(), KRAFT_CORE_VERSION );
				wp_enqueue_script( 'jquery-ui-sortable' );
				wp_enqueue_script( 'kraft-sort-script', KRAFT_CORE_URL . 'assets/js/sort-script.js', array( 'jquery' ), KRAFT_CORE_VERSION, true );				
			}		

			if( is_admin() ) {

				wp_enqueue_style( 'kraft-admin', KRAFT_CORE_URL . 'assets/css/admin.css', array(), KRAFT_CORE_VERSION );
			}
			
		}
				
		/**
		* Include theme functions and classes   
		*/
	    public function include_files() {        
			
			require_once( KRAFT_CORE_PATH . 'include/functions/helper-functions.php' );

			$this -> register_options_panel();
			$this -> register_custom_post_types();						
			$this -> register_meta_boxes();
			$this -> register_page_builder();						
			
			require_once( KRAFT_CORE_PATH . 'include/classes/class-social-share.php' );			
			
	    }
	   
	    /**
		* Include Redux Framework for Options Panel
		*/
	    private function register_options_panel() {

			if ( !class_exists( 'ReduxFramework' ) && file_exists( KRAFT_CORE_PATH . 'include/vendor/redux-framework/redux-core/framework.php' ) ) {
    			require_once( KRAFT_CORE_PATH . 'include/vendor/redux-framework/redux-core/framework.php' );
			}

			if ( !isset( $kraft_theme_settings ) && file_exists( KRAFT_CORE_PATH . 'include/theme-options/options.php' ) ) {

				require_once( KRAFT_CORE_PATH . 'include/theme-options/class-redux-addons.php' );			
				
				$reduxFramework_addons = new ReduxFramework_Addons();

				require_once( KRAFT_CORE_PATH . 'include/theme-options/options.php' );
			}		
		   
	    }
		
		/**
		* Include Meta Box for theme metaboxes
		*/
		private function register_meta_boxes() {

			if( ! defined( 'KRAFT_META_PREFIX' )) {
				define( 'KRAFT_META_PREFIX', 'kraft_meta_' );
			}

			require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/meta-box.php' );				

			if( is_admin() ) {		

				require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/extension/meta-box-conditional-logic/meta-box-conditional-logic.php' );
				require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/extension/meta-box-group/meta-box-group.php' );
				require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/extension/meta-box-show-hide/meta-box-show-hide.php' );
				require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/extension/meta-box-tabs/meta-box-tabs.php' );
				require_once( KRAFT_CORE_PATH . 'include/vendor/meta-box/extension/meta-box-columns/meta-box-columns.php' );

				require_once( KRAFT_CORE_PATH . 'include/meta-boxes/meta-boxes.php' );
			}

		}
		
		/**
		* Include Elementor Page Builder
		*/
		private function register_page_builder() {
			
			if ( class_exists( 'Vc_Manager' ) ) {
				require_once( KRAFT_CORE_PATH . 'include/wpbakery/wpbakery-config.php');		
			}			
			
			if ( class_exists( 'Elementor\Plugin' ) ) {
				require_once( KRAFT_CORE_PATH . 'include/elementor/config.php');		
			}
		
		}
		
		/**
		* Include custom post types
		*/
		private function register_custom_post_types() {			
			
			require_once( KRAFT_CORE_PATH . 'include/classes/class-custom-post-type.php');		
			
			if ( class_exists( 'CPT' ) ) {
				require_once( KRAFT_CORE_PATH . 'include/custom-post/portfolio-config.php');		
			}
			
		}		

		public function remove_metabox_dashboard_widget() {

			remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		}

	}

}

// Load the instance of the plugin.
add_action( 'plugins_loaded', array( 'Kraft_Core_Plugin', 'get_instance' ) );

