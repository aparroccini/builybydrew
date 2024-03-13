<?php

if( class_exists( 'CPT' ) ) {	
	
	$portfolio_slug = kraft_get_option( 'portfolio-slug-name' );

	$portfolio = new CPT( 
			array(  
					'post_type_name' => 'portfolio',
					'singular'	=> 'Portfolio Item',
					'plural'	=> 'Portfolio Items',				    
					'slug'		=> $portfolio_slug
				), 
			array( 'show_in_rest' => true, 'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ) )
	);

	// create a taxonomy
	$portfolio -> register_post_taxonomy( 
			array(
				'taxonomy_name' => 'portfolio_category',
				'singular'		=> 'Portfolio Category',
				'plural'		=> 'Portfolio Categories',
				'slug'			=> 'portfolio-category'
			),
			array( 'show_in_rest' => true ) 
	);
	
	// create a taxonomy
	$portfolio -> register_post_taxonomy( 
			array(
					'taxonomy_name' => 'portfolio_tag',
					'singular'		=> 'Portfolio Tag',
					'plural'		=> 'Portfolio Tags',
					'slug'			=> 'portfolio-tag'
			),
			array( 'show_in_rest' => true, 'hierarchical' => false ) 
	);

	$portfolio -> menu_icon( 'dashicons-portfolio' );

	$portfolio -> set_textdomain( 'kraft' );

	$portfolio -> submenu_page_settings( array(
						'parent_slug'		=> 'portfolio',
						'page_title'        => 'Sort Porfolio', 
						'menu_slug'			=> 'sort_portfolio', 
						'callback_function'	=> 'kraft_portfolio_posts_sort_callback' 
	));

	$portfolio->columns(array(
		'cb' 			 	 => '<input type="checkbox" />',
		'icon'  		 	 => esc_html__( 'Featured Image', 'kraft' ),
		'title' 		 	 => esc_html__( 'Title', 'kraft' ),
		'portfolio_type' 	 => esc_html__( 'Portfolio Type', 'kraft' ),
		'portfolio_category' => esc_html__( 'Portfolio Categories', 'kraft' ),
		'portfolio_tag' 	 => esc_html__( 'Portfolio Tags', 'kraft' ),
		'date' 			     => esc_html__( 'Date', 'kraft' ),
		'post_id' 			 => esc_html__( 'ID', 'kraft' ),
	));

	$portfolio->populate_column('portfolio_type', function( $column, $post ) {

		$portfolio_type = kraft_get_post_meta( 'portfolio_open' );

		if( $portfolio_type ) {
			echo ucfirst( $portfolio_type );
		}
	
	});
	
}


if ( ! function_exists( 'kraft_portfolio_posts_sort_callback' ) ) {	
		
	function kraft_portfolio_posts_sort_callback() {

		$portfolio = new WP_Query( 'post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC' );

	?>
		<div class="wrap">
			<h3><?php esc_html_e( 'Sort Porfolio', 'kraft' ); ?><img src="<?php echo esc_url( home_url('/') ); ?>wp-admin/images/loading.gif" id="loading-animation" /></h3>
				<ul id="slide-list">
					<?php if( $portfolio -> have_posts() ) : ?>
						<?php while ( $portfolio -> have_posts() ) { $portfolio -> the_post(); ?>
							<li id="<?php the_id(); ?>"><?php the_title(); ?></li>			
						<?php } ?>
					<?php else : ?>
						<li><?php esc_html_e( 'There is no Portfolio Created', 'kraft' ); ?></li>		
					<?php endif; ?>
				</ul>
		</div>
	<?php
	}

}

if ( ! function_exists( 'kraft_portfolio_posts_sort_order' ) ) {	
	
	function kraft_portfolio_posts_sort_order() {

		global $wpdb;

		$order = explode( ',', $_POST['order'] );
		$counter = 0;

		foreach ( $order as $slide_id ) {
			$wpdb -> update( $wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $slide_id ) );
			$counter++;
		}

		die(1);
	}

}

add_action( 'wp_ajax_portfolio_sort', 'kraft_portfolio_posts_sort_order' );