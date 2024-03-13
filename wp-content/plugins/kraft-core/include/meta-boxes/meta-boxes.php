<?php
/**
 * Registering meta boxes
 */
add_filter( 'rwmb_meta_boxes', 'kraft_register_meta_boxes' );

/**
 * Register meta boxes 
 
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */

if ( ! function_exists( 'kraft_register_meta_boxes' ) ) {	

	function kraft_register_meta_boxes( $meta_boxes ) {
	
		$prefix = KRAFT_META_PREFIX;

		require_once KRAFT_CORE_PATH . 'include/meta-boxes/blog.php';
		require_once KRAFT_CORE_PATH . 'include/meta-boxes/portfolio.php';
		require_once KRAFT_CORE_PATH . 'include/meta-boxes/page.php';
		

		return $meta_boxes;
	}

}


if ( ! function_exists( 'kraft_enqueue_metabox_custom_css' ) ) {	

	function kraft_enqueue_metabox_custom_css() {
		wp_enqueue_style( 'kraft-metabox-custom', KRAFT_CORE_URL . 'assets/css/metabox-custom.css', array(), KRAFT_CORE_VERSION );
	}

}

add_action( 'rwmb_enqueue_scripts', 'kraft_enqueue_metabox_custom_css' );