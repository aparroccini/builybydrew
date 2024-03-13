<?php
/**
 * Registers the cta shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_CTA extends Widget_Base {
	
	public function get_name() {
		return 'kraft-cta-widget';
	}

	public function get_title() {
		return esc_html__( 'CTA', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-call-to-action';
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {		
	
		$this->start_controls_section(
			'section_cta_content',
			[
				'label' => esc_html__( 'CTA Content', 'kraft' ),
			]
		);	

		$this->add_control(
			'cta_style',
			[
				'label' => esc_html__( 'CTA Style', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'style-2',
				'options' => [								
								'style-2' => esc_html__( 'Style 1', 'kraft' ),
								'style-3' => esc_html__( 'Style 2', 'kraft' ),															
							 ],				
			]
		);
		
		$this->add_control(
			'cta_text',
			[
				'label' => esc_html__( 'CTA Text', 'kraft' ),				
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'We are currently available to take next project.',
				'placeholder' => 'Enter your call to action text.',
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Button Type', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [								
								'default' => esc_html__( 'Default', 'kraft' ),
								'custom' => esc_html__( 'Custom', 'kraft' ),															
							 ],				
			]
		);
		
		$this->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'GET IN TOUCH',
				'placeholder' => 'Link Text.',
			]
		);
		
		$this->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link Url', 'kraft' ),
				'type' => Controls_Manager::URL,						
				'default' => [
					'url' => '#',
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'kraft' ),
			]
		);		
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_content',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),
				'condition'   => [ 'button_type' => [ 'custom' ] ]
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
			'section_cta_style',
			[
				'label' => esc_html__( 'CTA Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);		
				
		$this->add_control(
			'cta_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .cta h2' => 'color: {{VALUE}}',
				],						
			]
		);	
		
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',				
				'selectors' => [
						'{{WRAPPER}} .cta' => 'background-color: {{VALUE}}',
				],			
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cta_typography',				
				'selector' => '{{WRAPPER}} .cta h2',
			]
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,	
				'condition'   => [ 'button_type' => [ 'custom' ] ]	
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
				'default' => '#151515',				
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
		
		if( locate_template( 'shortcodes/elementor/call-to-action.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/call-to-action.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_CTA() );
