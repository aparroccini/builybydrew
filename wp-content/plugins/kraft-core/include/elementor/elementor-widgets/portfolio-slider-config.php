<?php
/**
 * Registers the portfolio slider shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Portfolio_Slider extends Widget_Base {
	
	public function get_name() {
		return 'kraft-portfolio-slider-widget';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Slider', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-slider-push';
	}
	
	public function get_style_depends() {
		
		if ( Plugin::$instance->editor->is_edit_mode() || Plugin::$instance->preview->is_preview_mode() ) {
			return [ 'ilightbox-dark-skin', 'ilightbox' ];
		}
		
		$styles = [];

		if ( $this->get_settings_for_display( 'slider_type' ) == 'multiple-projects' ) {			
			
			$styles[] = 'ilightbox-dark-skin';
			$styles[] = 'ilightbox';
		}	
		
		return $styles; 
		
	}	
	
	public function get_script_depends() {
		
		if ( Plugin::$instance->editor->is_edit_mode() || Plugin::$instance->preview->is_preview_mode() ) {
			return [ 'swiper', 'jquery-requestAnimationFrame', 'jquery-mousewheel', 'ilightbox' ];
		}
		
		$scripts = [];
		
		if ( $this->get_settings_for_display( 'slider_type' ) == 'single-project' || $this->get_settings_for_display( 'slider_type' ) == 'fullwidth-projects' ) {			
			$scripts[] = 'swiper';
		}		
		
		if ( $this->get_settings_for_display( 'slider_type' ) == 'multiple-projects' ) {			
			
			$scripts[] = 'swiper';
			$scripts[] = 'jquery-requestAnimationFrame';
			$scripts[] = 'jquery-mousewheel';
			$scripts[] = 'ilightbox';					
		}		
		
		return $scripts;
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'slider_type',
			[
				'label' => esc_html__( 'Slider Layout', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'single-project',
				'options' => [								
								'single-project'     => esc_html__( 'Single Slide Slider', 'kraft' ),							
								'multiple-projects'  => esc_html__( 'Multiple Slide Slider', 'kraft' ),											
								'fullwidth-projects' => esc_html__( 'Full Width Slide Slider', 'kraft' ),							
							 ],
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'portfolio_slider_text',
			[
				'label' => esc_html__( 'Link Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'View Project',											
				'condition'   => [ 'slider_type' => [ 'single-project', 'fullwidth-projects' ] ]
			]			
		);		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Query', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
					
		$this->add_control(
			'no_of_items',
			[
				'label' => esc_html__( 'No of items', 'kraft' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Order by', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [									
								"date"		 => esc_html__( "Date", "kraft" ),
								"ID"		 => esc_html__( "ID", "kraft" ),
								"author"	 => esc_html__( "Author", "kraft" ),
								"title"		 => esc_html__( "Title", "kraft" ),
								"modified"	 => esc_html__( "Last Modified", "kraft" ),	
								"rand"		 => esc_html__( "Random", "kraft" ),				
								"menu_order" => esc_html__( "Custom Sort", "kraft" ),
								"inherit"	 => esc_html__( "Inherit", "kraft" ),
							 ],			
			]
		);
		
		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order arrangement', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [									
								"ASC"		 => esc_html__( "Ascending", "kraft" ),
								"DESC"		 => esc_html__( "Descending", "kraft" ),
								"inherit"	 => esc_html__( "Inherit", "kraft" ),								
							 ],	
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'categories_flag',
			[
				'label' => esc_html__( 'Exclude/Include portfolio categories', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'exclude',
				'label_block' => true,
				'options' => [									
								"exclude"	=> esc_html__( "Exclude", "kraft" ),
								"include"	=> esc_html__( "Include", "kraft" ),									
							 ],			
			]
		);
		
		$this->add_control(
			'exclude_categories',
			[
				'label' => esc_html__( 'Portfolio categories', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,					
				'description' => esc_html__( 'Enter portfolio categories slug to exclude those records (Note: separate values by commas (,)). Example branding,mobile-app.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'portfolio_items_flag',
			[
				'label' => esc_html__( 'Exclude/Include portfolio items', 'kraft' ),
				'label_block' => true,						
				'type' => Controls_Manager::SELECT,
				'default' => 'exclude',
				'options' => [									
								"exclude"	=> esc_html__( "Exclude", "kraft" ),
								"include"	=> esc_html__( "Include", "kraft" ),									
							 ],			
			]
		);
		
		$this->add_control(
			'exclude_portfolio',
			[
				'label' => esc_html__( 'Portfolio IDs', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,			
				'description' => esc_html__( 'Enter portfolio IDs to exclude those records (Note: separate values by commas (,)).Example 2533,231.', 'kraft' ),				
			]
		);			
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_slide_settings',
			[
				'label' => esc_html__( 'Slide Settings', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,					
			]
		);	
		
		$this->add_responsive_control(
			'slider_per_view',
			[
				'label' => esc_html__( 'No of Slides (Per View)', 'kraft' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',					
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',					
				],				
				'description' => esc_html__( 'Number of slides per view (slides visible at the same time on slider container).', 'kraft' ),			
				'condition'   => [ 'slider_type' => 'multiple-projects' ],
			]
		);
		
		$this->add_control(
			'vertical_space',
			[
				'label' => esc_html__( 'Space between slides', 'kraft' ),				
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],					
				],				
				'description' => esc_html__( 'Distance between slides in px.', 'kraft' ),				
				'condition'   => [ 'slider_type' => 'multiple-projects' ],
			]
		);
		
		$this->add_control(
			'centered_slides',
			[
				'label' => esc_html__( 'Centered Slides', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'If true, then active slide will be centered, not always on the left side.', 'kraft' ),			
				'condition'   => [ 'slider_type' => 'multiple-projects' ],
			]
		);		
						
		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Set to true to enable continuous loop mode.', 'kraft' ),							
			]
		);
		
		$this->add_control(
			'tranisition_effect',
			[
				'label' => esc_html__( 'Transition effect', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [								
								'slide' => esc_html__( 'Slide', 'kraft' ),
								'fade'  => esc_html__( 'Fade', 'kraft' ),																
							 ],				
			]
		);
		
		
		$this->end_controls_section();		
		
		
		$this->start_controls_section(
			'section_slider_controls',
			[
				'label' => esc_html__( 'Slider Controls', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,						
			]
		);	
				
		$this->add_control(
			'navigation',
			[
				'label' => esc_html__( 'Show Navigation', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Show navigation on slider.', 'kraft' ),				
			]
		);
		
		$this->add_control(
			'pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Show pagination on slider.', 'kraft' ),							
			]
		);
		
		$this->add_control(
			'pagination_type',
			[
				'label' => esc_html__( 'Pagination type', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'bullets',
				'options' => [								
								'bullets' => esc_html__( 'Bullets', 'kraft' ),
								'fraction'  => esc_html__( 'Fraction', 'kraft' ),								
							 ],
				'condition'   => [ 'show_pagination' => 'yes' ],
			]
		);
		
		$this->add_control(
			'slideshow_speed',
			[
				'label' => esc_html__( 'Autoplay Delay', 'kraft' ),				
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 5000,
				],
				'range' => [
					'px' => [
						'min' => 3000,
						'max' => 8000,
					],					
				],				
				'description' => esc_html__( 'Delay between transitions (in ms).', 'kraft' ),								
			]
		);
		
		$this->add_control(
			'disable_on_interaction',
			[
				'label' => esc_html__( 'Disable on interaction', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Set to No and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction.', 'kraft' ),							
			]
		);

		$this->add_control(
			'slider_controls_scheme',
			[
				'label' => esc_html__( 'Slider Controls Scheme', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'dark-controls',
				'options' => [								
								'dark-controls' => esc_html__( 'Dark Scheme', 'kraft' ),
								'light-controls'  => esc_html__( 'Light Scheme', 'kraft' ),																
							],
				"description"	=> esc_html__("Set controls scheme for sliders navigation/pagination as per your requirement from here.", 'kraft'),
			]
		);
		
		
		$this->end_controls_section();			
		
		$this->start_controls_section(
			'section_thumbnail_style',
			[
				'label' => esc_html__( 'Thumbnail Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,							
				'conditions'  => [
									'relation' => 'or',
									'terms' => [
										[
											'name' => 'slider_type',
											'operator' => '==',
											'value' => 'single-project',
										],
										[
											'name' => 'slider_type',
											'operator' => '==',
											'value' => 'multiple-projects',
										],
									],
								],
			]
		);	
		
		$this->add_control(
			'content_position',
			[
				'label' => esc_html__( 'Content position', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'overlay',
				'options' => [								
								'overlay'   => esc_html__( 'Content Overlay', 'kraft' ),
								'under-image' => esc_html__( 'Content Under Image', 'kraft' ),													
							 ],
				'condition'   => [ 'slider_type' => 'multiple-projects' ]
				
			]
		);
		
		$this->add_control(
			'overlay_caption_animation',
			[
				'label' => esc_html__( 'Hover Effect', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'ribbon',
				'options' => [												
								'ribbon' => esc_html__( 'Ribbon', 'kraft' ),																					
							 ],				
				'condition'   => [ 'slider_type' => 'multiple-projects', 'content_position' => 'overlay' ],
			]
		);
		
		$this->add_control(
			'under_image_caption_animation',
			[
				'label' => esc_html__( 'Hover Effect', 'kraft' ),			
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [								
								'none'	=> esc_html__( 'None', 'kraft' ),							
								'custom-overlay' => esc_html__( 'Overlay', 'kraft' ),	
							 ],				
				'condition'   => [ 'slider_type' => 'multiple-projects', 'content_position' => 'under-image' ],
			]
		);
		
		$this->add_control(
			'hover_color',
			[
				'label' => esc_html__( 'Hover color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .kraft-swiper-container.multiple-projects.swiper-caption-ribbon .swiper-image-wrap .swiper-caption-activewrap' => 'background-color: {{VALUE}}',
				],		
				'condition'   => [ 'slider_type' => 'multiple-projects', 'content_position' => 'overlay' ],				
			]
		);
		
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(21,21,21,0.9)',				
				'selectors' => [
						'{{WRAPPER}} .kraft-swiper-container.single-project .swiper-slide-content-wrap .swiper-slide-item .swiper-title-wrap' => 'background-color: {{VALUE}}',
				],		
				'condition'   => [ 'slider_type' => [ 'single-project' ] ]
			]
		);
		
		$this->end_controls_section();			
	
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);	
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .kraft-swiper-container.single-project .swiper-slide-content-wrap .swiper-slide-item .swiper-title-wrap h1,
						{{WRAPPER}} .kraft-swiper-container.multiple-projects.swiper-caption-ribbon .swiper-title,
						{{WRAPPER}} .kraft-swiper-container.multiple-projects.content-under-image .swiper-title,
						{{WRAPPER}} .kraft-swiper-container.portfolio-fullwidth-slider .swiper-slide-item .swiper-image-wrap .swiper-title-wrap h1' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .kraft-swiper-container.single-project .swiper-slide-content-wrap .swiper-slide-item .swiper-title-wrap h1,
							   {{WRAPPER}} .kraft-swiper-container.multiple-projects.swiper-caption-ribbon .swiper-title,
							   {{WRAPPER}} .kraft-swiper-container.multiple-projects.content-under-image .swiper-title, 
							   {{WRAPPER}} .kraft-swiper-container.portfolio-fullwidth-slider .swiper-slide-item .swiper-image-wrap .swiper-title-wrap h1'
			]
		);
		
		$this->end_controls_section();			
		
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);	
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Subtitle color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',				
				'selectors' => [
						'{{WRAPPER}} .kraft-swiper-container.single-project .swiper-slide-content-wrap .swiper-slide-item .swiper-title-wrap a,
						 {{WRAPPER}} .kraft-swiper-container.multiple-projects .swiper-caption-body .swiper-subtitle,
						 {{WRAPPER}} .kraft-swiper-container.multiple-projects.content-under-image .swiper-subtitle,
						 {{WRAPPER}} .kraft-swiper-container.portfolio-fullwidth-slider .swiper-slide-item .swiper-image-wrap .swiper-title-wrap div' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',				
				'selector' => '{{WRAPPER}} .kraft-swiper-container.single-project .swiper-slide-content-wrap .swiper-slide-item .swiper-title-wrap a,
							   {{WRAPPER}} .kraft-swiper-container.multiple-projects .swiper-caption-body .swiper-subtitle,
							   {{WRAPPER}} .kraft-swiper-container.multiple-projects.content-under-image .swiper-subtitle,
							   {{WRAPPER}} .kraft-swiper-container.portfolio-fullwidth-slider .swiper-slide-item .swiper-image-wrap .swiper-title-wrap div',
				
			]
		);				
		
		
		$this->end_controls_section();		
		
	}


	protected function render( $instance = [] ) {
		
		global $post;
			
		if( locate_template( 'shortcodes/elementor/portfolio-slider.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/portfolio-slider.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Portfolio_Slider() );
