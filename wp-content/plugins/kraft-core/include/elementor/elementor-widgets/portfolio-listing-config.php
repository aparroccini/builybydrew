<?php
/**
 * Registers the portfolio listing shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Portfolio_Listing extends Widget_Base {
	
	public function get_name() {
		return 'kraft-portfolio-listing-widget';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Listing', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-post-list';
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_portfolio_listing',
			[
				'label' => esc_html__( 'Portfolio Listing', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);		
		
		$this->add_control(
			'listing_type',
			[
				'label' => esc_html__( 'Listing Layout', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'full-width',
				'options' => [								
								'full-width' => esc_html__( 'Full Width', 'kraft' ),
								'zig-zag' => esc_html__( 'Zig Zag', 'kraft' ),																
							 ],
				'description' => esc_html__( 'Set layout mode for portfolio listing.', 'kraft' ),				
				'separator' => 'after'
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
				'label' => esc_html__( 'Exclude portfolio categories', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,					
				'description' => esc_html__( 'Enter portfolio categories slug to exclude those records (Note: separate values by commas (,)). Example branding,mobile-app.', 'kraft' ),		
				'separator' => 'after'
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
				'label' => esc_html__( 'Exclude portfolio', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,			
				'description' => esc_html__( 'Enter portfolio IDs to exclude those records (Note: separate values by commas (,)).Example 2533,231.', 'kraft' ),		
				'separator' => 'after'
			]
		);		
		
		$this->add_control(
			'portfolio_link_text',
			[
				'label' => esc_html__( 'Link Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'View Project',		
				'description' => esc_html__( 'Portfolio Link Text.', 'kraft'),			
			]
		);		
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Background Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);			
		
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-listing-wrap .portfolio-list .list-content a' => 'color: {{VALUE}}',
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
				'default' => '#000000',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-listing-wrap .portfolio-list .pl-content h1' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .portfolio-listing-wrap .portfolio-list .pl-content h1',
			]
		);
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Description Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);	
		
		$this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-listing-wrap .portfolio-list .pl-content p' => 'color: {{VALUE}}',
				],			
			]
		);		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',				
				'selector' => '{{WRAPPER}} .portfolio-listing-wrap .portfolio-list .pl-content p',
			]
		);		
		
		$this->end_controls_section();		
	
	}


	protected function render( $instance = [] ) {
		
		global $post;
		
		if( locate_template( 'shortcodes/elementor/portfolio-listing.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/portfolio-listing.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Portfolio_Listing() );
