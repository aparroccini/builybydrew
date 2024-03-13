<?php
/**
 * Redux My Extension Field Class
 * Short description.
 *
 * @package Redux Extentions
 * @class   Redux_Extension_Typography_Font_Style
 * @version 1.0.0
 *
 * There is no free support for extension development.
 * This example is 'as is'.
 *
 * Please be sure to replace ALL instances of "My Extension" and "My_Extension" with the name of your actual
 * extension.
 *
 * Please also change the file name, so the 'my-extension' portion is also the name of your extension.
 * Please use dashes and not underscores in the filename.  Please use underscores instead of dashes in the classname.
 */

defined( 'ABSPATH' ) || exit;

// Don't duplicate me!
if ( ! class_exists( 'Redux_Typography_Font_Style', false ) ) {

	/**
	 * Main ReduxFramework_options_object class
	 *
	 * @since       1.0.0
	 */
	class Redux_Typography_Font_Style extends Redux_Field {
		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars
		 *
		 * @param array  $field  Field array.
		 * @param mixed  $value  Field values.
		 * @param object $parent ReduxFramework pointer.
		 *
		 * @throws ReflectionException Construct Exception.
		 */
		public function __construct( array $field, $value, $parent ) {
			parent::__construct( $field, $value, $parent );

			// Set default args for this field to avoid bad indexes. Change this to anything you use.
			$defaults = array(
				'options'          => array(),
				'stylesheet'       => '',
				'output'           => true,
				'enqueue'          => true,
				'enqueue_frontend' => true,
			);

			$this->field = wp_parse_args( $this->field, $defaults );
		}

		/**
		 * Field Render Function.
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @return      void
		 */
		public function render() {
			// Render the field.

            $font_styles = kraft_get_google_font_styles(  substr( $this->field[ 'id' ], 0, -6 ) );
			$font_style_options = array();
			
			foreach ( $font_styles as $index => $data ) {

				$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
				$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );

				$font_style_options[ $option_value ] = $option_label;
			}		

            $this->field[ 'data_class' ] = ( isset ( $this->field[ 'multi_layout' ] ) ) ? 'data-' . $this->field[ 'multi_layout' ] : 'data-full';

            if ( !empty ( $font_style_options ) && is_array ( $font_style_options ) ) {

                echo '<ul class="redux-font-styles ' . $this->field[ 'data_class' ] . '">';

                if ( !isset ( $this->value ) ) {
                    $this->value = array();
                }

                if ( !is_array ( $this->value ) ) {
                    $this->value = array();
                }
             
                foreach ( $font_style_options as $k => $v ) {

                    if ( empty ( $this->value[ $k ] ) ) {
                        $this->value[ $k ] = "";
                    }

                    echo '<li>';
                    echo '<label for="' . strtr ( $this->parent->args[ 'opt_name' ] . '[' . $this->field[ 'id' ] . '][' . $k . ']', array(
                        '[' => '_',
                        ']' => ''
                    ) ) . '_' . array_search ( $k, array_keys ( $font_style_options ) ) . '">';
                    echo '<input type="hidden" class="checkbox-check" data-val="1" name="' . $this->field[ 'name' ] . '[' . $k . ']' . $this->field[ 'name_suffix' ] . '" value="' . $this->value[ $k ] . '" ' . '/>';
                    echo '<input type="checkbox" class="checkbox ' . $this->field[ 'class' ] . '" id="' . strtr ( $this->parent->args[ 'opt_name' ] . '[' . $this->field[ 'id' ] . '][' . $k . ']', array(
                        '[' => '_',
                        ']' => ''
                    ) ) . '_' . array_search ( $k, array_keys ( $font_style_options ) ) . '" value="1" ' . checked ( $this->value[ $k ], '1', false ) . '/>';
                    echo ' ' . $v . '</label>';
                    echo '</li>';
                }

                echo '</ul>';
            } 
			
		}

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @return      void
		 */
		public function enqueue() {
			wp_enqueue_script(
				'redux-typography-font-style',
				$this->url . 'redux-typography-font-style.min.js',
				array( 'jquery', 'redux-js' ),
				$this->timestamp,
				true
			);

			wp_enqueue_style(
				'redux-typography-font-style',
				$this->url . 'redux-typography-font-style.css',
				array(),
				$this->timestamp
			);
		}
	}
}
