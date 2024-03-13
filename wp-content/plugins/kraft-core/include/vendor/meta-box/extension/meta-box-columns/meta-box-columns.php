<?php
/**
 * Plugin Name: Meta Box Columns
 * Plugin URI: https://metabox.io/plugins/meta-box-columns/
 * Description: Display fields more beautiful by putting them into 12-columns grid.
 * Version: 1.0.2
 * Author: MetaBox.io
 * Author URI: https://metabox.io
 * License: GPL2+
 *
 * @package    Meta Box
 * @subpackage Meta Box Columns
 */

// Prevent loading this file directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'MB_Columns' ) ) {
	/**
	 * Main class.
	 */
	class MB_Columns {
		/**
		 * Store the total column of a row.
		 *
		 * @var int
		 */
		protected static $total_columns = 0;

		/**
		 * Add hooks to meta box
		 */
		public function __construct() {
			add_action( 'rwmb_enqueue_scripts', array( $this, 'enqueue' ) );
			add_filter( 'rwmb_normalize_field', array( $this, 'normalize_field' ) );
			add_action( 'rwmb_after', array( $this, 'add_close_div' ), 99 );
		}

		/**
		 * Enqueue scripts and styles for columns
		 */
		public function enqueue() {
			list( , $url ) = RWMB_Loader::get_path( dirname( __FILE__ ) );
			wp_enqueue_style( 'rwmb-columns', $url . 'columns.css', '', '1.0.0' );
		}

		/**
		 * Add column class to field and output opening/closing div for row
		 *
		 * @param array $field Field configuration.
		 *
		 * @return array
		 */
		public function normalize_field( $field ) {
			if ( empty( $field['columns'] ) ) {
				return $field;
			}

			// Column class.
			$field['class'] .= ' rwmb-column rwmb-column-' . $field['columns'];

			// First column: add .first class and opening div.
			if ( 0 === self::$total_columns ) {
				$field['class']  .= ' rwmb-column-first';
				$field['before'] = '<div class="rwmb-row">' . $field['before'];
			}

			self::$total_columns += $field['columns'];

			// Last column: add .last class, closing div and reset total count.
			if ( 12 <= self::$total_columns ) {
				$field['class'] .= ' rwmb-column-last';
				$field['after'] .= '</div>';
				self::$total_columns  = 0;
			}

			$field['class'] = trim( $field['class'] );
			return $field;
		}

		/**
		 * Add close div if total columns < 12.
		 */
		public function add_close_div() {
			if ( self::$total_columns > 0 ) {
				echo '</div>';
				self::$total_columns = 0;
			}
		}
	}

	new MB_Columns;
}
