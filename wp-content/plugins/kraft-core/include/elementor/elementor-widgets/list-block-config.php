<?php
/**
 * Registers the list block shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_List_Block extends Widget_Base {
	
	public function get_name() {
		return 'kraft-list-block-widget';
	}

	public function get_title() {
		return esc_html__( 'List Block', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-text';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_list_block_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);

		$this->add_control(
			'list_block_content',
			[
				'type' => Controls_Manager::REPEATER,				
				'default' => [
					[					
						'title' => 'Title',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					],
					[					
						'title' => 'Title',
						'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					],							
				],
				'fields' => [						
					[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'kraft' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => 'Title',				
						'title' => esc_html__( 'Enter title.', 'kraft' ),
						'placeholder' => esc_html__( 'Enter title here.', 'kraft' ),
					],
					[								
						'name' => 'description',
						'label' => esc_html__( 'Description', 'kraft' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',				
						'title' => esc_html__( 'Enter description.', 'kraft' ),
						'placeholder' => esc_html__( 'Enter description here.', 'kraft' ),
					],				
				],
				'title_field' => '{{ title }}',
				'separator' => 'after'
			]
		);	
		
		$this->add_control(
			'show_border',
			[
				'label' => esc_html__( 'Show Border', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Show bottom border below list block.', 'kraft' ),			
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
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .desc-list-container .desc-list h6' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .desc-list-container .desc-list h6',
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
						'{{WRAPPER}} .desc-list-container .desc-list p' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',				
				'selector' => '{{WRAPPER}} .desc-list-container .desc-list p',
			]
		);
		
		$this->end_controls_section();
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/list-block.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/list-block.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_List_Block() );
