<?php
/**
 * Registers the portfolio split slider shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Portfolio_Split_Slider extends Widget_Base {
	
	public function get_name() {
		return 'kraft-portfolio-split-slider-widget';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Split Slider', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-slider-vertical';
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);		
				
		$this->add_control(
			'portfolio_slider_text',
			[
				'label' => esc_html__( 'Link Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'View Project'			
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
						'{{WRAPPER}} .portfolio-split-slider .kraft-ms-right .kraft-ms-section .title-wrap h1' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .portfolio-split-slider .kraft-ms-right .kraft-ms-section .title-wrap h1'
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
						'{{WRAPPER}} .portfolio-split-slider .kraft-ms-right .kraft-ms-section .title-wrap p' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',				
				'selector' => '{{WRAPPER}} .portfolio-split-slider .kraft-ms-right .kraft-ms-section .title-wrap p',
				
			]
		);				
		
		
		$this->end_controls_section();		
		
	}
	
		
	protected function render( $instance = [] ) {
		
		global $post;	
				
		if( locate_template( 'shortcodes/elementor/portfolio-split-slider.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/portfolio-split-slider.php' ) );
		}						
				
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Portfolio_Split_Slider() );
