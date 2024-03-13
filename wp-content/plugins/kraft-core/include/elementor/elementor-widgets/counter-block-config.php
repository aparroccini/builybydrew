<?php
/**
 * Registers the counter block shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Counter_Block extends Widget_Base {
	
	public function get_name() {
		return 'kraft-counter-block-widget';
	}

	public function get_title() {
		return esc_html__( 'Counter Block', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-counter';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_counter_block_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);

		$this->add_control(
			'counter_block_content',
			[
				'type' => Controls_Manager::REPEATER,				
				'default' => [
					[					
						'counter_value'	=> '450+',
						'counter_title'	=> 'Projects Completed',	
					],
					[					
						'counter_value'	=> '123',
						'counter_title'	=> 'International Projects.',							
					],	
					[					
						'counter_value'	=> '99%',
						'counter_title'	=> 'Client Satisfaction.',										
					],								
				],
				'fields' => [						
					[
						'name' => 'counter_value',
						'label' => esc_html__( 'Counter value', 'kraft' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => '',				
						'title' => esc_html__( 'Counter value.', 'kraft' ),
						'placeholder' => esc_html__( 'Enter value for counter block.', 'kraft' ),
					],
					[								
						'name' => 'counter_title',
						'label' => esc_html__( 'Counter title', 'kraft' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => '',				
						'title' => esc_html__( 'Enter title for counter block.', 'kraft' ),
						'placeholder' => esc_html__( 'Enter title for counter block.', 'kraft' ),
					],				
				],
				'title_field' => '{{ counter_value }} - {{ counter_title }}',
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'counter_separator',
			[
				'label' => esc_html__( 'Counter Separator', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'sep-dark',
				'options' => [								
								'sep-dark' => esc_html__( 'Dark', 'kraft' ),
								'sep-light' => esc_html__( 'Light', 'kraft' ),																								
							 ],				
			]
		);		
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_counter_style',
			[
				'label' => esc_html__( 'Counter Value Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);						
		
		$this->add_control(
			'counter_value_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .kraft-counter-wrap .kraft-counter h4' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'counter_value_typography',				
				'selector' => '{{WRAPPER}} .kraft-counter-wrap .kraft-counter h4',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_counter_title_style',
			[
				'label' => esc_html__( 'Counter Title Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);						
		
		$this->add_control(
			'counter_title',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',				
				'selectors' => [
						'{{WRAPPER}} .kraft-counter-wrap .kraft-counter p' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'counter_title_typography',				
				'selector' => '{{WRAPPER}} .kraft-counter-wrap .kraft-counter p',
			]
		);
		
		$this->end_controls_section();
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/counter-block.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/counter-block.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Counter_Block() );
