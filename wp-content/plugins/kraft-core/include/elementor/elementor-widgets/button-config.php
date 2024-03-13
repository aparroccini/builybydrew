<?php
/**
 * Registers the button shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Button extends Widget_Base {
	
	public function get_name() {
		return 'kraft-button-widget';
	}

	public function get_title() {
		return esc_html__( 'Button', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-button';
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {		
	
		$this->start_controls_section(
			'section_button_content',
			[
				'label' => esc_html__( 'Button Content', 'kraft' ),
			]
		);	
		
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'Click here',
				'placeholder' => 'Button Text.',
			]
		);
		
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Url', 'kraft' ),
				'type' => Controls_Manager::URL,						
				'placeholder' => esc_html__( 'https://your-link.com', 'kraft' ),
				'default' => [
					'url' => '#',
				],
				'separator' => 'after'
			]
		);	
		
		$this->add_control(
			'button_style',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [								
								'solid' => esc_html__( 'Flat', 'kraft' ),
								'outlined' => esc_html__( 'Outlined', 'kraft' ),	
								'link' => esc_html__( 'Link', 'kraft' ),																
							 ],				
			]
		);

		$this->add_control(
			'button_align',
			[
				'label' => esc_html__( 'Alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'text-left',
				'options' => [								
								'text-left'   => esc_html__( 'Left', 'kraft' ),
								'text-center' => esc_html__( 'Center', 'kraft' ),																
								'text-right' => esc_html__( 'Right', 'kraft' ),																
							 ],			
			]
		);

		$this->add_control(
			'button_arrow',
			[
				'label' => esc_html__( 'Button Arrow', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => [								
								'dark'  => esc_html__( 'Dark', 'kraft' ),
								'light' => esc_html__( 'Light', 'kraft' ),																								
							 ],
				'condition'   => [ 'button_style' => [ 'link' ] ]
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);		
		
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button BG color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .kraft-btn-container .solid a' => 'background-color: {{VALUE}};border-color: {{VALUE}}',						
				],		
				'condition'   => [ 'button_style' => [ 'solid' ] ]	
			]
		);
				 
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Button text color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',				
				'selectors' => [
						'{{WRAPPER}} .kraft-btn-container .outlined a' => 'border-color: {{VALUE}}; color: {{VALUE}}',
						'{{WRAPPER}} .kraft-btn-container .solid a' => 'color: {{VALUE}}',
				],						
			]
		);	

		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Button hover color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .kraft-btn-container .outlined a:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],		
				'condition'   => [ 'button_style' => [ 'outlined' ] ]	
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => esc_html__( 'Button hover text color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',				
				'selectors' => [
						'{{WRAPPER}} .kraft-btn-container .outlined a:hover' => 'color: {{VALUE}}',
				],		
				'condition'   => [ 'button_style' => [ 'outlined' ] ]	
			]
		);		

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'kraft' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .kraft-btn-container a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',				
				'selector' => '{{WRAPPER}} .kraft-btn-container a',
			]
		);
		
		
		$this->end_controls_section();
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/button.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/button.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Button() );
