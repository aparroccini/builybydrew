<?php
/**
 * Handles Redux Addons.
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_Addons' ) ) {
	
    /**
     * Main ReduxFramework custom_field extension class   
     */
    class ReduxFramework_Addons {
		
		/**
		* An array of our custom field types.		
		*/
		public $field_types;		
		
		/**
		* The option-name.	 
		*/
		public $option_name = 'kraft_theme_settings';

				
        public function __construct() {       
			
			// An array of all the custom fields we have.
			$this->field_types = array(				
				'typography_font_style',				
			);			
			
			foreach ( $this->field_types as $field_type ) {
				add_action( 'redux/' . $this->option_name . '/field/class/' . $field_type, array( $this, 'register_' . $field_type ) );
			}
			
        }		   
		
		public function register_typography_font_style() {
			return  KRAFT_CORE_PATH . 'include/theme-options/custom-fields/typography_font_style/class-redux-typography-font-style.php';			
		}		
		
    }	
}

