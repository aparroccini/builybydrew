<?php	

		// Portfolio Thumbnail Meta Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_thumbnail_box',
			'title'			=> esc_html__( 'Portfolio Thumbnail', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,		
			'fields'		=> array(						
				array(
					'name'  => esc_html__( 'Thumbnail title', 'kraft' ),
					'id'	=> "{$prefix}thumbnail_title",			
					'type'	=> 'text',
					'size'	=> '50'	
				),
				array(
					'name'	=> esc_html__( 'Thumbnail subtitle', 'kraft' ),
					'id'	=> "{$prefix}thumbnail_sub_title",				
					'type'	=> 'text',
					'size'	=> '50'
				),					
				array(
					'name'	=> esc_html__( 'Thumbnail description', 'kraft' ),
					'id'	=> "{$prefix}thumbnail_desc",				
					'type'	=> 'textarea',
					'size'	=> '50'
				),						
			)
		);	
		// End of Portfolio Thumbnail meta box
				
		// Portfolio Meta Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_settings_box',
			'title'			=> esc_html__( 'Portfolio Settings', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			'fields'		=> array(			
				array(
					'name'	=> esc_html__( 'Project type', 'kraft' ),
					'id'	=> "{$prefix}portfolio_open",
					'type'	=> 'radio',
					'options'	=> array(
						'lightbox'	=> esc_html__( 'Lightbox Project', 'kraft' ),					
						'page'		=> esc_html__( 'Page Project', 'kraft' ),					
						'external'	=> esc_html__( 'External Project', 'kraft' ),
					),
					'desc'	=> esc_html__( 'Select the project type you want to achieve.', 'kraft' ),		
					'std'	=> 'lightbox',
				),
				array(
					'name'	=> esc_html__( 'Lightbox type', 'kraft' ),
					'id'	=> "{$prefix}portfolio_type",
					'type'	=> 'select',
					'options'	=> array(					
						'image'		=> esc_html__( 'Single image', 'kraft' ),
						'gallery'	=> esc_html__( 'Image gallery', 'kraft' ),
						'video'		=> esc_html__( 'Video', 'kraft' ),
						'audio'		=> esc_html__( 'Audio', 'kraft' ),					
					),
					'attributes' => array(
										'style'  => 'width:332px',									
									),					    
					'std'			=> 'image',
					'hidden' => array( $prefix.'portfolio_open', '!=', 'lightbox' )
				),
				array(
					'name'  => esc_html__( 'Add image', 'kraft' ),
					'id'    => "{$prefix}image_url",
					'type'  => 'image_advanced',
					'max_file_uploads' => 1,				
					'hidden' => array( $prefix.'portfolio_type', '!=', 'image' )
				),
				array(
					'name'  => esc_html__( 'Video URL', 'kraft' ),
					'id'	=> "{$prefix}video_url",
					'desc'	=> esc_html__( 'Enter your video url here', 'kraft' ),
					'type'	=> 'text',	
					'size'	=> '50',				
					'hidden' => array( $prefix.'portfolio_type', '!=', 'video' )
				),
				array(
					'name'	=> esc_html__( 'Audio URL', 'kraft' ),
					'id'	=> "{$prefix}audio_url",
					'desc'	=> esc_html__( 'Enter your audio url here.', 'kraft' ),
					'type'	=> 'text',
					'size'	=> '50',
					'hidden' => array( $prefix.'portfolio_type', '!=', 'audio' )
				),
				array(
					'name'	=> esc_html__( 'Add images', 'kraft' ),
					'id'	=> "{$prefix}gallery_images",
					'type'	=> 'image_advanced',
					'max_file_uploads' => 50,
					'hidden' => array( $prefix.'portfolio_type', '!=', 'gallery' )
				),
				array(
					'name'	=> esc_html__( 'Show Image Meta', 'kraft' ),
					'id'	=> "{$prefix}lightbox_image_meta",
					'type'	=> 'checkbox_list',					
					'inline' => true,		
					'options'	=> array(						
						'image-title' => esc_html__( 'Image Title', 'kraft' ),					
						'image-caption'	=> esc_html__( 'Image Caption', 'kraft' ),
						'image-desc' => esc_html__( 'Image Description', 'kraft' ),
					),
					'desc'	=> esc_html__( 'Select the image meta to be shown, image meta is taken from image meta details in media library.', 'kraft' ),					
					'hidden' => array( $prefix.'portfolio_type', 'not in', array( 'image', 'gallery' ) )
				),			
				array(
					'name'  => esc_html__( 'External URL', 'kraft' ),
					'id'	=> "{$prefix}external_url",
					'desc'	=> esc_html__( 'Enter your external project url here', 'kraft' ),
					'type'	=> 'text',	
					'size'	=> '80',
					'hidden' => array( $prefix.'portfolio_open', '!=', 'external' )
				),
				array(
					'name'  => esc_html__( 'Target', 'kraft' ),
					'id'	=> "{$prefix}external_target",
					'desc'	=> esc_html__( 'Specify where to open the link.', 'kraft' ),
					'type'	=> 'radio',
					'options'	=> array(					
						'_self'		=> esc_html__( 'Self', 'kraft' ),
						'_blank'	=> esc_html__( 'Blank', 'kraft' ),					
					),
					'std'			=> '_self',				
					'hidden' => array( $prefix.'portfolio_open', '!=', 'external' )
				),
				array(
						'name'	=> esc_html__( 'Hero section', 'kraft' ),
						'id'	=> "{$prefix}hero_section_switch",
						'type'	=> 'radio',
						'options'	=> array(					
							'0'	=> esc_html__( 'Disabled', 'kraft' ),
							'1'	=> esc_html__( 'Enabled', 'kraft' ),					
						),
						'desc'	=> esc_html__( 'Hero section in portfolio page.', 'kraft' ),		
						'std'   => '0',
						'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )
				),			
				array(
					'name'	=> esc_html__( 'Page layout', 'kraft' ),
					'id'	=> "{$prefix}portfolio_page_layout",
					'type'	=> 'radio',
					'options'	=> array(
						'boxed'	  => esc_html__( 'Boxed', 'kraft' ),					
						'full-width' => esc_html__( 'Full width', 'kraft' ),										
					),
					'desc'	=> esc_html__( 'Layout in portfolio page.', 'kraft' ),				
					'std'	=> 'boxed',
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )
				),			
				array(
					'name'	=> esc_html__( 'Details section placement', 'kraft' ),
					'id'	=> "{$prefix}details_placement",
					'type'	=> 'select',
					'options'	=> array(
						'details-top'		=> esc_html__( 'Details on top', 'kraft' ),					
						'details-bottom'	=> esc_html__( 'Details on bottom', 'kraft' ),
						'details-left'		=> esc_html__( 'Details on left', 'kraft' ),
						'details-right'		=> esc_html__( 'Details on right', 'kraft' ),									
					),
					'attributes' => array(
										'style'  => 'width:332px',									
									),					
					'std'	=> 'details-top',
					'desc'	=> esc_html__( 'Placement of portfolio description and meta in portfolio page.', 'kraft' ),		
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )		
				),
				array(
					'name'	=> esc_html__( 'Media section', 'kraft' ),
					'id'	=> "{$prefix}portfolio_media_type",
					'type'	=> 'radio',
					'options'	=> array(
						'single-media'	=> esc_html__( 'Single type media', 'kraft' ),					
						'multiple-media' => esc_html__( 'Multiple type media', 'kraft' ),										
						'no-media' => esc_html__( 'No media', 'kraft' ),										
					),
					'std'	=> 'single-media',
					'desc'	=> esc_html__( 'Portfolio media type eg image, video, gallery in portfolio page.', 'kraft' ),		
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )
				),
				array(
					'name'	=> esc_html__( 'Elements placement', 'kraft' ),
					'id'	=> "{$prefix}page_builder_section_placement",
					'type'	=> 'select',
					'options'	=> array(
							'below-details-section'	=> esc_html__( 'Below details section', 'kraft' ),
							'below-media-section'	=> esc_html__( 'Below media section', 'kraft' ),						
					),
					'attributes' => array(
										'style'  => 'width:332px',									
									),					
					'std'	=> 'below-details-section',
					'desc'	=> esc_html__( 'Placement of page builder elements in portfolio page.', 'kraft' ),		
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )		
				),			
				array(
					'name'	=> esc_html__( 'Related portfolio', 'kraft' ),
					'id'	=> "{$prefix}page_related_portfolio_section",
					'type'	=> 'radio',
					'options'	=> array(					
							'0'	=> esc_html__( 'Disabled', 'kraft' ),
							'1'	=> esc_html__( 'Enabled', 'kraft' ),					
						),
					'std'	=> '1',
					'desc'	=> esc_html__( 'Show Related Portfolio section for current portfolio.', 'kraft' ),		
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )
				),		
				array(
					'name'	=> esc_html__( 'Portfolio Home', 'kraft' ),
					'id'	=> "{$prefix}page_portfolio_home_custom",
					'type'        => 'post',
					'post_type'   => 'page',
					'field_type'  => 'select_advanced',				
					'placeholder' => 'Inherit from Theme Options',
					'query_args'  => array(
						'post_status'    => 'publish',
						'posts_per_page' => - 1,
					),
					'desc'	=> esc_html__( 'Specify the page you want to use as index for this portfolio.', 'kraft' ),		
					'hidden' => array( $prefix.'portfolio_open', '!=', 'page' )
				),				
			)
		);	

		// End of Portfolio Meta Box
	
		// Portfolio Hero section Meta Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_hero_section_box',
			'title'			=> esc_html__( 'Portfolio Hero Section', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			'hidden'		=> array( $prefix.'hero_section_switch', '!=', '1' ),
			'fields'		=> array(
				array(
					'name'	=> esc_html__( 'Hero section type', 'kraft' ),
					'id'	=> "{$prefix}hero_section_type",
					'type'	=> 'select',
					'options'	=> array(					
						'image'		=> esc_html__( 'Single image', 'kraft' ),
						'slider'	=> esc_html__( 'Single Image slider', 'kraft' ),
						'multi-slider'	=> esc_html__( 'Multiple Image slider', 'kraft' ),
						'gallery'	 => esc_html__( 'Gallery', 'kraft' ),		
						'lightbox-gallery'	=> esc_html__( 'Lightbox Gallery', 'kraft' ),						
						'video'		=> esc_html__( 'Video', 'kraft' ),		
						'image-comparison' => esc_html__( 'Before After Image Comparison', 'kraft' ),								
						'rev-slider' => esc_html__( 'Slider Revolution', 'kraft' ),						
					),
					'attributes' => array(
										'style'  => 'width:332px',									
									),						
					'std'			=> 'image',				
				),
				array(
					'name'	=> esc_html__( 'Hero section height', 'kraft' ),
					'id'	=> "{$prefix}hero_section_height",
					'type'	=> 'radio',
					'options'	=> array(					
						'full-height' => esc_html__( 'Full height', 'kraft' ),
						'custom'	  => esc_html__( 'Custom height', 'kraft' ),				
					),
					'std'	=> 'full-height',			
					'hidden' => array( $prefix.'hero_section_type', 'in', array( 'multi-slider', 'gallery', 'lightbox-gallery', 'image-comparison' ) )		
				),
				array(
					'name'  => esc_html__( 'Custom height', 'kraft' ),
					'id'	=> "{$prefix}hero_custom_height",				
					'type'	=> 'text',	
					'std'	=> '600px',	
					'size'	=> '50',		
					'desc'	=> 'example: 500px',	
					'hidden' => array( $prefix.'hero_section_height', '!=', 'custom' )
				),							
				array(
					'name'  => esc_html__( 'Add image', 'kraft' ),
					'id'    => "{$prefix}hero_image_url",
					'type'  => 'image_advanced',
					'max_file_uploads' => 1,
					'hidden' => array( $prefix.'hero_section_type', '!=', 'image' )
				),		
				array(
					'name'  => esc_html__( 'Add image', 'kraft' ),
					'id'    => "{$prefix}hero_image_comparison",
					'type'  => 'image_advanced',
					'max_file_uploads' => 2,
					'hidden' => array( $prefix.'hero_section_type', '!=', 'image-comparison' )
				),						
				array(
					'name'	=> esc_html__( 'Add images', 'kraft' ),
					'id'	=> "{$prefix}hero_slider_images",
					'type'	=> 'image_advanced',
					'max_file_uploads' => 50,
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'slider', 'multi-slider' ) )
				),		
				array(
					'name'	=> esc_html__( 'Slider per view', 'kraft' ),
					'id'	=> "{$prefix}hero_slide_per_view",
					'type'	=> 'radio',
					'options'	=> array(														
									'2'		=> esc_html__( '2 Slide', 'kraft' ),
									'3'		=> esc_html__( '3 Slide', 'kraft' ),
									'4'		=> esc_html__( '4 Slide', 'kraft' ),						
									'5'		=> esc_html__( '5 Slide', 'kraft' ),						
									'6'		=> esc_html__( '6 Slide', 'kraft' ),						
									'7'		=> esc_html__( '7 Slide', 'kraft' ),						
									'8'		=> esc_html__( '8 Slide', 'kraft' ),						
								),
					'std'		=> '2',																				
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),					
				array(														
					'id'	=> "{$prefix}hero_responsive_slide_label",			
					'type' => 'custom_html',															
					'std' => '<div class="rwmb-label">
								<label for="kraft_responsive_slide">Responsive Slides</label>					
							  </div>',		
					'columns' => 3,	
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),					
				array(
					'name'  => esc_html__( 'Tablet Slide', 'kraft' ),
					'id'	=> "{$prefix}hero_tablet_slide",			
					'type'	=> 'select',
					'options'	=> array(													
									'2'		=> esc_html__( '2 Slide', 'kraft' ),
									'3'		=> esc_html__( '3 Slide', 'kraft' ),
									'4'		=> esc_html__( '4 Slide', 'kraft' ),						
									'5'		=> esc_html__( '5 Slide', 'kraft' ),						
									'6'		=> esc_html__( '6 Slide', 'kraft' ),						
									'7'		=> esc_html__( '7 Slide', 'kraft' ),						
									'8'		=> esc_html__( '8 Slide', 'kraft' ),						
								),							
					'std' => '2',		
					'columns' => 3,	
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),			
				array(
					'name'  => esc_html__( 'Mobile Slide', 'kraft' ),
					'id'	=> "{$prefix}hero_mobile_slide",			
					'type'	=> 'select',
					'options'	=> array(										
									'1'		=> esc_html__( '1 Slide', 'kraft' ),
									'2'		=> esc_html__( '2 Slide', 'kraft' ),
									'3'		=> esc_html__( '3 Slide', 'kraft' ),
									'4'		=> esc_html__( '4 Slide', 'kraft' ),						
									'5'		=> esc_html__( '5 Slide', 'kraft' ),						
									'6'		=> esc_html__( '6 Slide', 'kraft' ),						
									'7'		=> esc_html__( '7 Slide', 'kraft' ),						
									'8'		=> esc_html__( '8 Slide', 'kraft' ),						
								),						
					'std' => '2',
					'columns' => 6,		
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),													
				array(
					'name'  => esc_html__( 'Space between', 'kraft' ),
					'id'	=> "{$prefix}hero_slide_space",
					'desc'	=> esc_html__( 'Enter space between slide in (px).', 'kraft' ),
					'type'	=> 'text',	
					'size'	=> '0',				
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),			
				array(
					'name'	=> esc_html__( 'Centered slides', 'kraft' ),
					'id'	=> "{$prefix}hero_centered_slides",
					'desc'	=> esc_html__( 'If checked, then active slide will be centered, not always on the left side.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '0',
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),											
				array(
					'name'	=> esc_html__( 'Loop', 'kraft' ),
					'id'	=> "{$prefix}hero_loop",
					'desc'	=> esc_html__( 'Set to true to enable continuous loop mode.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '0',
					'hidden' => array( $prefix.'hero_section_type', '!=', 'multi-slider' )
				),	
				array(
					'name'	=> esc_html__( 'Transition effect', 'kraft' ),
					'id'	=> "{$prefix}hero_transition_effect",
					'desc'	=> esc_html__( 'Set transition effect for portfolio slide.', 'kraft' ),		
					'type'	=> 'radio',
					'options'	=> array(					
									'slide'	=> esc_html__( 'Slide', 'kraft' ),
									'fade'	=> esc_html__( 'Fade', 'kraft' ),									
								),
					'std'	=> 'slide',																				
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'slider', 'multi-slider' ) )
				),			
				array(
					'name'	=> esc_html__( 'Show Navigation', 'kraft' ),
					'id'	=> "{$prefix}hero_slider_navigation",
					'desc'	=> esc_html__( 'Choose to show slider navigation.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '0',
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'slider', 'multi-slider' ) )
				),		
				array(
					'name'	=> esc_html__( 'Show Pagination', 'kraft' ),
					'id'	=> "{$prefix}hero_slider_pagination",
					'desc'	=> esc_html__( 'Choose to show slider pagination.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '1',
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'slider', 'multi-slider' ) )
				),		
				array(
					'name'  => esc_html__( 'Autoplay Delay', 'kraft' ),
					'id'	=> "{$prefix}hero_autoplay_delay",
					'desc'	=> esc_html__( 'Specify slideshow speed (in milliseconds). Default is 3500.', 'kraft' ),
					'type'	=> 'text',	
					'value'	=> '3500',				
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'slider', 'multi-slider' ) )
				),						
				array(
					'name'	=> esc_html__( 'Add images', 'kraft' ),
					'id'	=> "{$prefix}hero_gallery_images",
					'type'	=> 'image_advanced',
					'max_file_uploads' => 50,
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )
				),
				array(
					'name'	=> esc_html__( 'Media layout', 'kraft' ),
					'id'	=> "{$prefix}hero_media_layout",
					'type'	=> 'radio',
					'options'	=> array(					
									'grid'		=> esc_html__( 'Grid', 'kraft' ),
									'mosaic'	=> esc_html__( 'Mosaic', 'kraft' ),																
								),
					'std'	 => 'grid',		
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )
				),	
				array(
					'name'	=> esc_html__( 'Image gallery columns', 'kraft' ),
					'id'	=> "{$prefix}hero_image_gallery_cols",
					'type'	=> 'radio',
					'options'	=> array(					
									'2'		=> esc_html__( '2 cols', 'kraft' ),
									'3'		=> esc_html__( '3 cols', 'kraft' ),
									'4'		=> esc_html__( '4 cols', 'kraft' ),						
									'5'		=> esc_html__( '5 cols', 'kraft' ),						
									'6'		=> esc_html__( '6 cols', 'kraft' ),						
									'7'		=> esc_html__( '7 cols', 'kraft' ),						
									'8'		=> esc_html__( '8 cols', 'kraft' ),						
								),
					'std'		=> '3',																				
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )
				),				
				array(														
					'id'	=> "{$prefix}hero_gap_label",			
					'type' => 'custom_html',															
					'std' => '<div class="rwmb-label">
								<label for="kraft_meta_gap">Gap between columns</label>					
							  </div>',		
					'columns' => 3,	
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )
				),					
				array(
					'name'  => esc_html__( 'Horizontal (px)', 'kraft' ),
					'id'	=> "{$prefix}hero_gap_horizontal",			
					'type'	=> 'text',
					'size'	=> '15',
					'std' => '30',		
					'columns' => 3,	
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )
				),			
				array(
					'name'  => esc_html__( 'Vertical (px)', 'kraft' ),
					'id'	=> "{$prefix}hero_gap_vertical",			
					'type'	=> 'text',
					'size'	=> '15',
					'std' => '30',
					'columns' => 6,		
					'hidden' => array( $prefix.'hero_section_type', 'not in', array( 'gallery', 'lightbox-gallery' ) )		
				),										
				array(
					'name'  => esc_html__( 'Video URL', 'kraft' ),
					'id'	=> "{$prefix}hero_video_url",
					'desc'	=> esc_html__( 'Enter your youtube video url here', 'kraft' ),
					'type'	=> 'text',	
					'size'	=> '50',				
					'hidden' => array( $prefix.'hero_section_type', '!=', 'video' )
				),
				array(
					'name'	=> esc_html__( 'Slider Revolution', 'kraft' ),
					'id'	=> "{$prefix}hero_rev_slider",
					'type'	=> 'select',
					'options'	=> kraft_get_revslider_list(),
					'desc' => esc_html__( 'Select slider revolution for hero section.', 'kraft' ),
					'hidden' => array( $prefix.'hero_section_type', '!=', 'rev-slider' )	
				),				
			)	
		);	
		// End of Portfolio Hero section meta box
	 			
		// Portfolio Title Meta Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_title_box',
			'title'			=> esc_html__( 'Portfolio Title', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			'hidden'		=> array( $prefix.'portfolio_open', '!=', 'page' ),
			'fields'		=> array(						
				array(
					'name'  => esc_html__( 'Title', 'kraft' ),
					'id'	=> "{$prefix}title",			
					'type'	=> 'text',
					'size'	=> '50'	
				),
				array(
					'name'	=> esc_html__( 'Subtitle', 'kraft' ),
					'id'	=> "{$prefix}sub_title",				
					'type'	=> 'text',
					'size'	=> '50'
				),					
			)
		);	
		// End of Portfolio Title meta box
				
					
		// Portfolio Media Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_multiple_media_box',
			'title'			=> esc_html__( 'Portfolio Multiple Media', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			'hidden'		=> array( $prefix.'portfolio_media_type', '!=', 'multiple-media' ),		
			'fields'		=> array(	
									array(
										'name'  => esc_html__( 'Space between media', 'kraft' ),
										'id'	=> "{$prefix}multi_media_space_between",
										'desc'	=> esc_html__( 'Enter space between the selected media in (px)', 'kraft' ),
										'type'	=> 'text',	
										'value' => '50'		
									),
									array(
										'id'    => "{$prefix}portfolio_multiple_media_groupbox",
										'type'  => 'group',								
										'clone' => true,				
										'sort_clone' => true,			
										'add_button' => 'Add more media',	
										//'hidden' => array( $prefix.'multiple_media_section_switch', '!=', '1' ),		
										'fields'	 => array(
															array(
																'name'	=> esc_html__( 'Media', 'kraft' ),
																'id'	=> "{$prefix}multi_media_display",
																'type'	=> 'select',
																'options'	=> array(					
																	'stack'		=> esc_html__( 'Fullwidth stack images', 'kraft' ),
																	'video'		=> esc_html__( 'Video', 'kraft' ),
																	'slider'	=> esc_html__( 'Image slider', 'kraft' ),
																	'gallery'	=> esc_html__( 'Image gallery', 'kraft' ),
																	'lightbox-gallery' => esc_html__( 'Image gallery (With Lightbox)', 'kraft' ),								
																	'image-comparison' => esc_html__( 'Before After Image Comparison', 'kraft' ),								
																),
																'attributes' => array(
																					'style'  => 'width:332px',									
																				),								
																'std'			=> 'stack',				
															),
															array(
																'name'	=> esc_html__( 'Media layout', 'kraft' ),
																'id'	=> "{$prefix}media_layout",
																'type'	=> 'radio',
																'options'	=> array(					
																	'grid'		=> esc_html__( 'Grid', 'kraft' ),
																	'mosaic'	=> esc_html__( 'Mosaic', 'kraft' ),																
																),
																'std'	 => 'grid',		
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'gallery', 'lightbox-gallery' ) )
															),
															array(
																'name'	=> esc_html__( 'Image gallery columns', 'kraft' ),
																'id'	=> "{$prefix}image_gallery_cols",
																'type'	=> 'radio',
																'options'	=> array(					
																					'2'		=> esc_html__( '2 cols', 'kraft' ),
																					'3'		=> esc_html__( '3 cols', 'kraft' ),
																					'4'		=> esc_html__( '4 cols', 'kraft' ),						
																					'5'		=> esc_html__( '5 cols', 'kraft' ),						
																					'6'		=> esc_html__( '6 cols', 'kraft' ),						
																					'7'		=> esc_html__( '7 cols', 'kraft' ),						
																					'8'		=> esc_html__( '8 cols', 'kraft' ),								
																				),
																'std'		=> '3',																				
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'gallery', 'lightbox-gallery' ) )
															),																		
															array(														
																'id'	=> "{$prefix}gap_label",			
																'type' => 'custom_html',															
																'std' => '<div class="rwmb-label">
																			<label for="kraft_meta_gap">Gap between columns</label>					
																		  </div>',		
																'columns' => 3,	
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'stack' ) )
															),					
															array(
																'name'  => esc_html__( 'Horizontal (px)', 'kraft' ),
																'id'	=> "{$prefix}gap_horizontal",			
																'type'	=> 'text',
																'size'	=> '15',
																'std' => '30',		
																'columns' => 3,	
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'stack' ) )
															),			
															array(
																'name'  => esc_html__( 'Vertical (px)', 'kraft' ),
																'id'	=> "{$prefix}gap_vertical",			
																'type'	=> 'text',
																'size'	=> '15',
																'std' => '30',
																'columns' => 6,		
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'stack' ) )		
															),		
															array(
																'name'	=> esc_html__( 'Video Source', 'kraft' ),
																'id'	=> "{$prefix}multi_media_video_source",
																'type'	=> 'select',										
																'options' => array(									
																				'video-url' => esc_html__( 'Video URL', 'kraft' ),					
																				'video-upload'	=> esc_html__( 'Upload Video', 'kraft' ),									
																			),
																'std' => 'video-url',
																'desc'	=> esc_html__( 'Select the source for video.', 'kraft' ),						
																'hidden' => array( $prefix.'multi_media_display', '!=', 'video' )
															),								
															array(
																'name'  => esc_html__( 'Video Url', 'kraft' ),
																'id'	=> "{$prefix}page_video_url",
																//'desc'	=> esc_html__( 'Enter your video url here', 'kraft' ),
																'type'	=> 'textarea',	
																'size'	=> '50',
																'clone'	=> true,
																'add_button' => 'Add more video',				
																'max_clone' => 5,			   
																'hidden' => array( $prefix.'multi_media_video_source', '!=', 'video-url' )
															),		
															array(
																'name'	=> esc_html__( 'Videos upload', 'kraft' ),
																'id'	=> "{$prefix}multi_media_video_upload",
																'type'	=> 'video',
																'max_file_uploads' => 10 ,
																'hidden' => array( $prefix.'multi_media_video_source', '!=', 'video-upload' )
															),						
															array(
																'name'	=> esc_html__( 'Images upload', 'kraft' ),
																'id'	=> "{$prefix}media_images",
																'type'	=> 'image_advanced',
																'max_file_uploads' => 50 ,
																'hidden' => array( $prefix.'multi_media_display', '=', 'video' )
															),		
															array(
																'name'	=> esc_html__( 'Show Navigation', 'kraft' ),
																'id'	=> "{$prefix}multi_media_slider_navigation",
																'desc'	=> esc_html__( 'Choose to show slider navigation.', 'kraft' ),		
																'type'	=> 'checkbox',					
																'std'   => '0',
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'slider' ) )
															),		
															array(
																'name'	=> esc_html__( 'Show Pagination', 'kraft' ),
																'id'	=> "{$prefix}multi_media_slider_pagination",
																'desc'	=> esc_html__( 'Choose to show slider pagination.', 'kraft' ),		
																'type'	=> 'checkbox',					
																'std'   => '1',
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'slider' ) )
															),
															array(
																'name'	=> esc_html__( 'Slider Loader', 'kraft' ),
																'id'	=> "{$prefix}multi_media_slider_loader",
																'type'	=> 'radio',						
																'options'	=> array(					
																					'lazy-load'	 => esc_html__( 'Lazy Load - Best for images with same height', 'kraft' ),
																					'pre-load'  => esc_html__( 'Preloader - Best for images with different height', 'kraft' ),						
																				),
																'std'	=> 'lazy-load',																	
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'slider' ) )
															),																					
															array(
																'name'	=> esc_html__( 'Show Image Meta', 'kraft' ),
																'id'	=> "{$prefix}multi_media_image_meta",
																'type'	=> 'checkbox_list',					
																'inline' => true,		
																'options'	=> array(																		
																	'image-title' => esc_html__( 'Image Title', 'kraft' ),					
																	'image-caption'	=> esc_html__( 'Image Caption', 'kraft' ),
																	'image-desc' => esc_html__( 'Image Description', 'kraft' ),
																),
																'desc'	=> esc_html__( 'Select the image meta to be shown, image meta is taken from image meta details in media library.', 'kraft' ),																	
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'stack', 'gallery', 'lightbox-gallery', 'video' ) )
															),						
															array(
																'name'	=> esc_html__( 'Image Meta Alignment', 'kraft' ),
																'id'	=> "{$prefix}multi_media_image_meta_align",
																'type'	=> 'select',					
																'std' => 'left-aligned',		
																'options'	=> array(																		
																	'left-aligned' => esc_html__( 'Left Align', 'kraft' ),					
																	'right-aligned'	=> esc_html__( 'Right Align', 'kraft' ),
																	'centered-aligned' => esc_html__( 'Center Align', 'kraft' ),
																),
																'desc'	=> esc_html__( 'Select the image meta ie. caption and description alignment.', 'kraft' ),																	
																'hidden' => array( $prefix.'multi_media_display', 'not in', array( 'stack', 'gallery', 'lightbox-gallery', 'video' ) )
															),									
														),
										),			
							)						
		);
															
		$meta_boxes[] = array(
			'id'			=> 'portfolio_single_media_box',
			'title'			=> esc_html__( 'Portfolio Single Media', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			//'hidden'		=> array( 'portfolio_open', '!=', 'page' ),
			'hidden'		=> array( $prefix.'portfolio_media_type', '!=', 'single-media' ),		
			'fields'		=> array(						
				array(
					'name'	=> esc_html__( 'Media', 'kraft' ),
					'id'	=> "{$prefix}media_display",
					'type'	=> 'select',
					'options'	=> array(					
						'stack'		=> esc_html__( 'Fullwidth stack images', 'kraft' ),
						'video'		=> esc_html__( 'Video', 'kraft' ),
						'slider'	=> esc_html__( 'Image slider', 'kraft' ),
						'gallery'	=> esc_html__( 'Image gallery', 'kraft' ),
						'lightbox-gallery' => esc_html__( 'Image gallery (With Lightbox)', 'kraft' ),								
						'mosaic-gallery' => esc_html__( 'Mosaic image gallery', 'kraft' ),	
						'mosaic-lightbox-gallery' => esc_html__( 'Mosaic image gallery (With Lightbox)', 'kraft' ),	
						'image-comparison' => esc_html__( 'Before After Image Comparison', 'kraft' ),								
					),
					'std'			=> 'stack',
					'attributes' => array(
										'style'  => 'width:332px',									
									),								
				),		
				array(
					'name'	=> esc_html__( 'Image gallery columns', 'kraft' ),
					'id'	=> "{$prefix}image_gallery_cols",
					'type'	=> 'radio',
					'options'	=> array(					
										'2'		=> esc_html__( '2 cols', 'kraft' ),
										'3'		=> esc_html__( '3 cols', 'kraft' ),
										'4'		=> esc_html__( '4 cols', 'kraft' ),						
										'5'		=> esc_html__( '5 cols', 'kraft' ),						
										'6'		=> esc_html__( '6 cols', 'kraft' ),						
										'7'		=> esc_html__( '7 cols', 'kraft' ),						
										'8'		=> esc_html__( '8 cols', 'kraft' ),												
									),
					'std'		=> '3',										
					'hidden' => array( $prefix.'media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery' ) )
				),			
				array(														
					'id'	=> "{$prefix}gap_label",			
					'type'  => 'custom_html',															
					'std'   => '<div class="rwmb-label">
									<label for="kraft_meta_gap">Gap between columns</label>					
								</div>',		
					'columns' => 3,	
					'hidden'  => array( $prefix.'media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery', 'stack' ) )
				),					
				array(
					'name'  => esc_html__( 'Horizontal (px)', 'kraft' ),
					'id'	=> "{$prefix}gap_horizontal",			
					'type'	=> 'text',
					'size'	=> '15',
					'std' => '30',		
					'columns' => 3,	
					'hidden' => array( $prefix.'media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery', 'stack' ) )
				),			
				array(
					'name'  => esc_html__( 'Vertical (px)', 'kraft' ),
					'id'	=> "{$prefix}gap_vertical",			
					'type'	=> 'text',
					'size'	=> '15',
					'std' => '30',
					'columns' => 6,		
					'hidden' => array( $prefix.'media_display', 'not in', array( 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery', 'stack' ) )
				),					
				array(
					'name'	=> esc_html__( 'Video Source', 'kraft' ),
					'id'	=> "{$prefix}single_media_video_source",
					'type'	=> 'select',										
					'options' => array(									
									'video-url' => esc_html__( 'Video URL', 'kraft' ),					
								    'video-upload'	=> esc_html__( 'Upload Video', 'kraft' ),									
								),
					'std'   => 'video-url',
					'desc'	=> esc_html__( 'Select the source for video.', 'kraft' ),						
					'hidden' => array( $prefix.'media_display', '!=', 'video' )
				),					
				array(
					'name'  => esc_html__( 'Video Url', 'kraft' ),
					'id'	=> "{$prefix}page_video_url",
					'desc'	=> esc_html__( 'Enter your video url here', 'kraft' ),
					'type'	=> 'textarea',	
					'size'	=> '50',
					'clone'	=> true,	
					'max_clone' => 5,			   
					'hidden' => array( $prefix.'single_media_video_source', '!=', 'video-url' )
				),			
				array(
					'name'	=> esc_html__( 'Videos upload', 'kraft' ),
					'id'	=> "{$prefix}media_video_upload",
					'type'	=> 'video',
					'max_file_uploads' => 10 ,
					'hidden' => array( $prefix.'single_media_video_source', '!=', 'video-upload' )
				),			
				array(
					'name'	=> esc_html__( 'Images upload', 'kraft' ),
					'id'	=> "{$prefix}media_images",
					'type'	=> 'image_advanced',
					'max_file_uploads' => 50 ,
					'hidden' => array( $prefix.'media_display', '=', 'video' )
				),
				array(
					'name'	=> esc_html__( 'Show Navigation', 'kraft' ),
					'id'	=> "{$prefix}single_media_slider_navigation",
					'desc'	=> esc_html__( 'Choose to show slider navigation.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '0',
					'hidden' => array( $prefix.'media_display', 'not in', array( 'slider' ) )
				),		
				array(
					'name'	=> esc_html__( 'Show Pagination', 'kraft' ),
					'id'	=> "{$prefix}single_media_slider_pagination",
					'desc'	=> esc_html__( 'Choose to show slider pagination.', 'kraft' ),		
					'type'	=> 'checkbox',					
					'std'   => '1',
					'hidden' => array( $prefix.'media_display', 'not in', array( 'slider' ) )
				),
				array(
					'name'	=> esc_html__( 'Slider Loader', 'kraft' ),
					'id'	=> "{$prefix}single_media_slider_loader",
					'options'	=> array(					
										'lazy-load'	 => esc_html__( 'Lazy Load - Best for images with same height', 'kraft' ),
										'pre-load'  => esc_html__( 'Preloader - Best for images with different height', 'kraft' ),						
									),
					'std' 	=> 'lazy-load',				
					'type'	=> 'radio',										
					'hidden' => array( $prefix.'media_display', 'not in', array( 'slider' ) )
				),										
				array(
					'name'	=> esc_html__( 'Show Image Meta', 'kraft' ),
					'id'	=> "{$prefix}single_media_image_meta",
					'type'	=> 'checkbox_list',					
					'inline' => true,		
					'options' => array(									
									'image-title' => esc_html__( 'Image Title', 'kraft' ),					
								    'image-caption'	=> esc_html__( 'Image Caption', 'kraft' ),
									'image-desc' => esc_html__( 'Image Description', 'kraft' ),
								),
					'desc'	=> esc_html__( 'Select the image meta to be shown, image meta is taken from image meta details in media library.', 'kraft' ),						
					'hidden' => array( $prefix.'media_display', 'not in', array( 'stack', 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery', 'video'  ) )
				),		
				array(
					'name'	=> esc_html__( 'Image Meta Alignment', 'kraft' ),
					'id'	=> "{$prefix}single_media_image_meta_align",
					'type'	=> 'select',					
					'std'   => 'left-aligned',		
					'options'	=> array(																		
									'left-aligned' => esc_html__( 'Left Align', 'kraft' ),					
									'right-aligned'	=> esc_html__( 'Right Align', 'kraft' ),
									'centered-aligned' => esc_html__( 'Center Align', 'kraft' ),
								),
					'desc'	=> esc_html__( 'Select the image meta ie. caption and description alignment.', 'kraft' ),																	
					'hidden' => array( $prefix.'media_display', 'not in', array( 'stack', 'gallery', 'lightbox-gallery', 'mosaic-gallery', 'mosaic-lightbox-gallery', 'video' ) )
				),				
			)
		);															
				
		// Portfolio Meta Box
		$meta_boxes[] = array(
			'id'			=> 'portfolio_meta_box',
			'title'			=> esc_html__( 'Portfolio Details', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,
			'hidden'		=> array( $prefix.'portfolio_open', '!=', 'page' ),
			'fields'		=> array(	
				array(
					'name'	=> esc_html__( 'Description', 'kraft' ),
					'id'	=> "{$prefix}portfolio_desc",				
					'type'	=> 'wysiwyg',
					'std'	=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.',	
					'options' => array( 'textarea_rows' => 15, )		
				),
				array(				
					'id'	=> "{$prefix}divider_3",
					'type'	=> 'divider'		
				),			
				array(
					'name'	=> esc_html__( 'Meta section', 'kraft' ),
					'id'	=> "{$prefix}meta_details_reqd",
					'type'	=> 'radio',
					'options'	=> array(					
									'1'	=> esc_html__( 'Enabled', 'kraft' ),			
									'0'	=> esc_html__( 'Disabled', 'kraft' ),												
								),
					'std'   => '1'		
				),			
				array(			
					'id'	=> "{$prefix}divider_4",				
					'type'	=> 'divider',
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),		
				),			
				array(
					'id'    => "{$prefix}portfolio_groupbox",
					'type'  => 'group',			
					'clone' => true,
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),
					'sort_clone' => false,
					'add_button' => 'Add more meta field',				
					'fields'	 => array(
									array(
										'id'	=> "{$prefix}new_title",
										'name'  => esc_html__( 'Title', 'kraft' ),
										'desc'  => esc_html__( 'Enter the title. For example, client, year, etc.', 'kraft' ),
										'type'  => 'text',
										'std'   => ""								
										),
									array(
										'id'    => "{$prefix}new_value",
										'name'  => esc_html__( 'Value', 'kraft' ),
										'desc'  => esc_html__( 'Enter the value. For example, client-name, 2016, etc. HTML a and br tag can also be used here.', 'kraft' ),
										'type'  => 'textarea',
										'rows'	=> 5,	
										'std'   => "",									
										),
									),
				),	
				array(
					'name'	=> esc_html__( 'Show Categories', 'kraft' ),
					'id'	=> "{$prefix}portfolio_meta_show_categories",
					'type'	=> 'checkbox',				
					'desc'  => esc_html__( 'check to show portfolio item categories.', 'kraft' ),
					'hidden' => array( 'meta_details_reqd', '!=', '1' ),
				),										
				array(
					'name'	=> esc_html__( 'Show Tags', 'kraft' ),
					'id'	=> "{$prefix}portfolio_meta_show_tags",
					'type'	=> 'checkbox',				
					'desc'  => esc_html__( 'check to show portfolio item tags.', 'kraft' ),
					'hidden' => array( 'meta_details_reqd', '!=', '1' ),
				),													
				array(			
					'id'	=> "{$prefix}divider_5",				
					'type'	=> 'divider',
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),		
				),			
				array(
					'name'	=> esc_html__( 'Social media section', 'kraft' ),
					'id'	=> "{$prefix}share_portfolio",
					'type'	=> 'radio',
					'options'	=> array(					
									'1'	=> esc_html__( 'Enabled', 'kraft' ),			
									'0'	=> esc_html__( 'Disabled', 'kraft' ),												
								),
					'desc'  => esc_html__( 'Enable or disable social media share in portfolio page.', 'kraft' ),		
					'std'   => '0',
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),
				),
				array(			
					'id'	=> "{$prefix}divider_6",				
					'type'	=> 'divider',		
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),		
				),			
				array(
					'name'	=> esc_html__( 'Social media icons', 'kraft' ),
					'id'	=> "{$prefix}portfolio_socials_icons",
					'type'	=> 'checkbox',				
					'desc'  => esc_html__( 'check to show/hide social media icons or social text.', 'kraft' ),
					'hidden' => array( 'meta_details_reqd', '!=', '1' ),
				),						
				array(														
					'id'	=> "{$prefix}gap_label",			
					'type'  => 'custom_html',															
					'std'   => '<div class="rwmb-label">
									<label for="kraft_meta_social">Select social network</label>					
								</div>',		
					'columns' => 3,	
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),							
				array(
					'name'	=> esc_html__( 'Facebook', 'kraft' ),
					'id'	=> "{$prefix}share_facebook",
					'type'	=> 'checkbox',	
					'columns' => 1,								
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),					
				array(
					'name'	=> esc_html__( 'Twitter', 'kraft' ),
					'id'	=> "{$prefix}share_twitter",
					'type'	=> 'checkbox',								
					'columns' => 1,	
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),
				array(
					'name'	=> esc_html__( 'X Twitter', 'kraft' ),
					'id'	=> "{$prefix}share_x_twitter",
					'type'	=> 'checkbox',								
					'columns' => 1,	
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),
				array(
					'name'	=> esc_html__( 'LinkedIn', 'kraft' ),
					'id'	=> "{$prefix}share_linkedin",
					'type'	=> 'checkbox',			
					'columns' => 1,			
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),				
				// array(
				// 	'name'	=> esc_html__( 'GooglePlus', 'kraft' ),
				// 	'id'	=> "{$prefix}share_googleplus",
				// 	'type'	=> 'checkbox',								
				// 	'columns' => 1,			
				// 	'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				// ),
				array(
					'name'	=> esc_html__( 'Pinterest', 'kraft' ),
					'id'	=> "{$prefix}share_pinterest",
					'type'	=> 'checkbox',		
					'columns' => 1,			
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),	
				array(
					'name'	=> esc_html__( 'Xing', 'kraft' ),
					'id'	=> "{$prefix}share_xing",
					'type'	=> 'checkbox',	
					'columns' => 4,							
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),
				),
				array(			
					'id'	=> "{$prefix}divider_7",				
					'type'	=> 'divider',	
					'hidden' => array( $prefix.'share_portfolio', '!=', '1' ),		
				),			
				array(
					'name'	=> esc_html__( 'Button section', 'kraft' ),
					'id'	=> "{$prefix}enable_button",
					'type'	=> 'radio',
					'options'	=> array(					
									'1'	=> esc_html__( 'Enabled', 'kraft' ),			
									'0'	=> esc_html__( 'Disabled', 'kraft' ),												
								),				
					'std'   => '0',
					'hidden' => array( $prefix.'meta_details_reqd', '!=', '1' ),
				),						
				array(			
					'id'	=> "{$prefix}divider_8",				
					'type'	=> 'divider',			
					'hidden' => array( $prefix.'enable_button', '!=', '1' ),
				),			
				array(
					'name'  => esc_html__( 'Text', 'kraft' ),
					'id'	=> "{$prefix}button_text",
					'desc'  => esc_html__( 'Example: LAUNCH', 'kraft' ),
					'hidden' => array( $prefix.'enable_button', '!=', '1' ),
					'type'  => 'text',
					'size'	=> '50'
				),		
				array(
					'name'	=> esc_html__( 'Style', 'kraft' ),
					'id'	=> "{$prefix}button_style",
					'type'	=> 'radio',
					'options'	=> array(					
						'outlined'	=> esc_html__( 'Outlined', 'kraft' ),					
						'solid'	    => esc_html__( 'Solid', 'kraft' ),						
					),									
					'hidden' => array( 'enable_button', '!=', '1' ),
				),						
				array(
					'name'  => esc_html__( 'URL', 'kraft' ),
					'id'	=> "{$prefix}button_url",				
					'desc'  => esc_html__( 'Example: http://www.google.com', 'kraft' ),
					'hidden' => array( $prefix.'enable_button', '!=', '1' ),
					'type'  => 'text',
					'size'	=> '50'
				),		
				array(
					'name'	=> esc_html__( 'Target', 'kraft' ),
					'id'	=> "{$prefix}button_target",
					'type'	=> 'radio',
					'options'	=> array(					
						'_self'		=> esc_html__( 'Same page', 'kraft' ),
						'_blank'	=> esc_html__( 'New page', 'kraft' ),					
					),				
					'std'   => '_blank',		
					'hidden' => array( $prefix.'enable_button', '!=', '1' ),
				),				

			)
		);				
					
		// Portfolio Related Works Meta Box
		$meta_boxes[] = array(
			'id'			=> 'related_portfolio_box',
			'title'			=> esc_html__( 'Related Portfolio', 'kraft' ),
			'post_types'	=> array( 'portfolio' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'autosave'		=> true,		
			'hidden'		=> array( $prefix.'page_related_portfolio_section', '!=', '1' ),		
			'fields'		=> array(						
				array(
					'name'  => esc_html__( 'Related Portfolio Title', 'kraft' ),
					'id'	=> "{$prefix}related_portfolio_title",			
					'type'	=> 'text',
					'desc'	=> 'Enter a title for related portfolio.',
					'size'	=> '50'					
				),							
				array(			
					'id'	=> "{$prefix}divider_8",				
					'type'	=> 'divider'							
				),
				array(				
					'name'  => esc_html__( 'Layout', 'kraft' ),
					'id'	=> "{$prefix}related_portfolio_layout",
					'type'	=> 'select',
					'options'	=> array(
										'grid'	 => esc_html__( 'Grid', 'kraft' ),					
										'slider' => esc_html__( 'Slider', 'kraft' ),					
									),
					'desc'  => esc_html__( 'Select related portfolio layout.', 'kraft' ),
					'std'	=> 'grid'					
				),
				array(			
					'id'	=> "{$prefix}divider_9",				
					'type'	=> 'divider'							
				),			
				array(
					'name'	=> esc_html__( 'Grid columns', 'kraft' ),
					'id'	=> "{$prefix}related_portfolio_grid_cols",
					'type'	=> 'radio',
					'options' => array(														
									'3'		=> esc_html__( '3 cols', 'kraft' ),
									'4'		=> esc_html__( '4 cols', 'kraft' ),						
									'5'		=> esc_html__( '5 cols', 'kraft' ),						
									'6'		=> esc_html__( '6 cols', 'kraft' ),						
								),
					'std'		=> '3',																				
					'hidden' => array( $prefix.'related_portfolio_layout', '!=', 'grid' )
				),		
				array(			
					'id'	=> "{$prefix}divider_10",				
					'type'	=> 'divider',
					'hidden' => array( $prefix.'related_portfolio_layout', '!=', 'grid' )
				),			
				array(
					'name'  => esc_html__( 'Filter By', 'kraft' ),
					'id'	=> "{$prefix}related_portfolio_filter",			
					'type'	=> 'select',
					'desc'	=> 'Choose the filter by for related portfolio.',
					'options'	=> array(
										"category"	=> esc_html__( "Category", "kraft" ),
										"portfolio"	=> esc_html__( "Portfolio", "kraft" ),													
									),
					'std'	=> 'inherit'						
				),
				array(			
					'id'	=> "{$prefix}divider_11",				
					'type'	=> 'divider',		
					'hidden' => array( $prefix.'related_portfolio_filter', '!=', 'category' )	
				),			
				array(
					'name'  => 'Filter By Category',
					'id'	=> "{$prefix}related_portfolio_filterby_category",			
					'type'  => 'taxonomy_advanced',				
					'taxonomy' => 'portfolio_category',
					'field_type' => 'checkbox_list',
					'hidden' => array( $prefix.'related_portfolio_filter', '!=', 'category' ),		
				),	
				array(			
					'id'	=> "{$prefix}divider_12",				
					'type'	=> 'divider',		
					'hidden' => array( $prefix.'related_portfolio_filter', '!=', 'portfolio' ),		
				),			
				array(
					'name'  => 'Filter By Portfolio',
					'id'	=> "{$prefix}related_portfolio_filterby_portfolio",		
					'type'  => 'post',					
					'post_type' => 'portfolio',					
					'field_type'  => 'checkbox_list',
					'inline' => true,		
					'multiple' => true,		
					'query_args'  => array(
						'post_status'    => 'publish',
						'posts_per_page' => - 1,
					),
					'hidden' => array( $prefix.'related_portfolio_filter', '!=', 'portfolio' ),				
				),			
							
			)
		);	
		// End of Portfolio Title meta box