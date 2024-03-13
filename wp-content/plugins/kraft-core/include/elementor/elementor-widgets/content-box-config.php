<?php
/**
 * Registers the content box shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Content_Box extends Widget_Base {
	
	public function get_name() {
		return 'kraft-content-box-widget';
	}

	public function get_title() {
		return esc_html__( 'Content Box', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-post-content';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {		
				
		$this->start_controls_section(
			'section_content_box',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);
		
		$this->add_control(
			'upper_heading',
			[
				'label' => esc_html__( 'Upper heading', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Upper Heading',			
				'description' => esc_html__( 'Enter upper heading for content box. (Note: leave blank if don\'\t want upper title).', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Heading',			
				'description' => esc_html__( 'Enter heading for the content box.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'kraft' ),				
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Enter description for the content box.',			
				'description' => esc_html__( 'Enter description for the content box.', 'kraft' ),				
			]
		);			
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_upper_heading_style',
			[
				'label' => esc_html__( 'Upper Heading Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);	
		
		$this->add_control(
			'upper_heading_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .content-box h4 small' => 'color: {{VALUE}}',
				],						
			]
		);				
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'upper_heading_typography',				
				'selector' => '{{WRAPPER}} .content-box h4 small',
			]
		);	
								
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);	
		
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .content-box h4 span' => 'color: {{VALUE}}',
				],						
			]
		);				
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',				
				'selector' => '{{WRAPPER}} .content-box h4 span',
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
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',				
				'selectors' => [
						'{{WRAPPER}} .content-box p' => 'color: {{VALUE}}',
				],					
			]
		);			
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',				
				'selector' => '{{WRAPPER}} .content-box p',
			]
		);	
		
		$this->end_controls_section();			
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/content-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/content-box.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Content_Box() );
