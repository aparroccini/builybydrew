<?php
/**
 * Registers the list shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_List extends Widget_Base {
	
	public function get_name() {
		return 'kraft-list-widget';
	}

	public function get_title() {
		return esc_html__( 'List', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-editor-list-ul';
	}
		
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_list_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);
		
		$this->add_control(
			'list_style',
			[
				'label' => esc_html__( 'List Style', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'plain-text',
				'options' => [								
								'plain-text'  => esc_html__( 'Plain text', 'kraft' ),
								'hyphen-text' => esc_html__( 'Text with hyphen', 'kraft' ),																
							 ],
				'separator' => 'after'
			]
		);

		$this->add_control(
			'list_content',
			[				
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<ul>
								<li>Photoshop</li>
								<li>Social Media</li>
							  </ul>',				
				'title' => esc_html__( 'List Content', 'kraft' ),		
				'separator' => 'after',				
			]
		);
		
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_list_style',
			[
				'label' => esc_html__( 'List Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);						
		
		$this->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} ul > li' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',				
				'selector' => '{{WRAPPER}} ul > li',
			]
		);
		
		$this->end_controls_section();
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/list.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/list.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_List() );
