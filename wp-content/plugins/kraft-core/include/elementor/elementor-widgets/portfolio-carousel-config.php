<?php
/**
 * Registers the portfolio carousel shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Portfolio_Carousel extends Widget_Base {
	
	public function get_name() {
		return 'kraft-portfolio-carousel-widget';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Carousel', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-slider-push';
	}
	
	public function get_style_depends() {		
		return [ 'ilightbox-dark-skin', 'ilightbox' ];			
	}	
	
	public function get_script_depends() {		
		return [ 'swiper', 'jquery-requestAnimationFrame', 'jquery-mousewheel', 'ilightbox' ];		
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {	
		
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

		$this->add_responsive_control(
			'slider_height',
			[
				'label' => esc_html__( 'Slider height', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,	
				'default' => '450px',	
				'tablet_default' => '350px',
				'mobile_default' => '250px',	
				'description' => esc_html__( 'Enter the slider height.', 'kraft' ),				
			]
		);	
		
		$this->add_control(
			'show_subtitle',
			[
				'label' => esc_html__( 'Show sub title', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Set to yes to show subtitle in portfolio item.', 'kraft' ),				
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
			]
		);	
					
		$this->add_control(
			'hover_color',
			[
				'label' => esc_html__( 'Hover color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0, 0, 0, 0.9)',				
				'selectors' => [
						'{{WRAPPER}} .kraft-swiper-container.multiple-portfolio-carousel .swiper-caption-wrap .swiper-caption-activewrap' => 'background-color: {{VALUE}}',
				],						
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
						'{{WRAPPER}} .kraft-swiper-container.multiple-portfolio-carousel .swiper-caption-wrap .swiper-caption-body .swiper-title' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .kraft-swiper-container.multiple-portfolio-carousel .swiper-caption-wrap .swiper-caption-body .swiper-title'
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
						'{{WRAPPER}} .kraft-swiper-container.multiple-portfolio-carousel .swiper-caption-wrap .swiper-caption-body .swiper-subtitle' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',				
				'selector' => '{{WRAPPER}} .kraft-swiper-container.multiple-portfolio-carousel .swiper-caption-wrap .swiper-caption-body .swiper-subtitle',
				
			]
		);				
		
		
		$this->end_controls_section();		
		
	}


	protected function render( $instance = [] ) {
		
		global $post;
			
		if( locate_template( 'shortcodes/elementor/portfolio-carousel.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/portfolio-carousel.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Portfolio_Carousel() );
