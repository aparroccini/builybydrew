<?php

	// Page Meta Box
	$meta_boxes[] = array(
		'id'			=> 'post_meta_featured_media_box',
		'title'			=> esc_html__( 'Featured Media', 'kraft' ),
		'post_types'	=> array( 'post' ),		
		'tabs' => array(
				'featured-image' => array(
					'label' => esc_html__( 'Image', 'kraft' ),
					'icon' => 'dashicons-format-image',
				),
				'featured-gallery' => array(
					'label' => esc_html__( 'Gallery/Slider', 'kraft' ),
					'icon' => 'dashicons-menu',
				),
			    'featured-video' => array(
					'label' => esc_html__( 'Video', 'kraft' ),
					'icon' => 'dashicons-format-aside',
				),
				'featured-audio' => array(
					'label' => esc_html__( 'Audio', 'kraft' ),
					'icon' => 'dashicons-align-center',
				),
				'featured-quote' => array(
					'label' => esc_html__( 'Quote', 'kraft' ),
					'icon' => 'dashicons-align-center',
				),
				'featured-link' => array(
					'label' => esc_html__( 'Link', 'kraft' ),
					'icon' => 'dashicons-align-center',
				),
		),
		'tab_style' => 'default',
		'fields'		=> array(
			/* Featured Image */	
			array(				
				'id'	=> "{$prefix}post_image_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_image_label">'.esc_html__( 'Image Upload', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-image'		
			),		
			array(
				'id'    => "{$prefix}post_image",									
				'type'  => 'image_advanced',
				'max_file_uploads' => 1,	
				'columns'  => 9,						
				'tab' => 'featured-image'			
			),			
			/* Gallery Image */	
			array(				
				'id'	=> "{$prefix}post_gallery_images_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_gallery_images_label">'.esc_html__( 'Images Upload', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-gallery'		
			),		
			array(
				'id'    => "{$prefix}post_gallery_images",									
				'type'  => 'image_advanced',
				'max_file_uploads' => 15,	
				'columns'  => 9,						
				'tab' => 'featured-gallery'			
			),		
			/* Video */	
			array(				
				'id'	=> "{$prefix}post_video_url_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_video_url_label">'.esc_html__( 'Video URL', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-video'		
			),		
			array(
				'id'    => "{$prefix}post_video_url",									
				'desc'  => esc_html__( 'Enter your video url here', 'kraft' ),
				'type'  => 'text',				
				'std'   => '',
				'size'	=> '50',	
				'columns'  => 9,						
				'tab' => 'featured-video'			
			),									
			/* Audio */	
			array(				
				'id'	=> "{$prefix}post_audio_url_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_audio_url_label">'.esc_html__( 'Audio URL', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-audio'		
			),		
			array(
				'id'    => "{$prefix}post_audio_url",									
				'desc'  => esc_html__( 'Enter your audio url here', 'kraft' ),
				'type'  => 'text',				
				'std'   => '',
				'size'	=> '50',	
				'columns'  => 9,						
				'tab' => 'featured-audio'			
			),		
			/* Quote */	
			array(				
				'id'	=> "{$prefix}post_quote_author_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_quote_author_label">'.esc_html__( 'Quote Author', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-quote'		
			),		
			array(
				'id'    => "{$prefix}post_quote_author",									
				'desc'  => esc_html__( 'Enter Quote Author Name Here', 'kraft' ),
				'type'  => 'text',				
				'std'   => '',
				'size'	=> '50',	
				'columns'  => 9,						
				'tab' => 'featured-quote'			
			),	
			/* Link */	
			array(				
				'id'	=> "{$prefix}post_link_url_label",			
				'type' => 'custom_html',															
				'std' => '<div class="kraft-rwmb-label">
							<label for="kraft_post_link_url_label">'.esc_html__( 'Link', 'kraft' ).'</label>					
						  </div>',		
				'columns' => 3,				
				'tab' => 'featured-link'		
			),		
			array(
				'id'    => "{$prefix}post_link_url",									
				'desc'  => esc_html__( 'Enter Post link url here', 'kraft' ),
				'type'  => 'text',				
				'std'   => '',
				'size'	=> '50',	
				'columns'  => 9,						
				'tab' => 'featured-link'			
			),											
		)
	);	
