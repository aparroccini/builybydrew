<?php
/**
 * Registers the image box shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Image_Box extends Widget_Base {
	
	public function get_name() {
		return 'kraft-image-box-widget';
	}

	public function get_title() {
		return esc_html__( 'Image Box', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-image-box';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_image_box_content',
			[
				'label' => esc_html__( 'Image Box Content', 'kraft' ),
			]
		);

		$this->add_control(
			'image_alignment',
			[
				'label' => esc_html__( 'Image Alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [								
								'top'  => esc_html__( 'Top', 'kraft' ),
								'left' => esc_html__( 'Left', 'kraft' ),																
							 ],
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'image_src',
			[
				'label' => esc_html__( 'Image Selection', 'kraft' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],	
				"description"	=> esc_html__("Recommended size is 600X360", 'kraft')
			]
		);
		
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Heading',			
				'description' => esc_html__( 'Enter heading for the image box.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'kraft' ),				
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Enter description for the image box.',			
				'description' => esc_html__( 'Enter description for the image box.', 'kraft' ),				
			]
		);			
		
		$this->add_control(
			'bg_color_flag',
			[
				'label' => esc_html__( 'Background Color', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Check for background color.', 'kraft' ),	
				'condition' => [
								 'image_alignment' => 'left',
							   ],
			]
		);
		
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',				
				'selectors' => [
						'{{WRAPPER}} .img-box' => 'background-color: {{VALUE}}',
				],
				'condition' => [
								 'image_alignment' => 'left',
								 'bg_color_flag' => 'yes',					
							   ],
			]
		);
		
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),				
			]
		);	
		
		$this->add_control(
			'button_style',
			[
				'label' => esc_html__( 'Button Style', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'outlined',
				'options' => [								
								'outlined'  => esc_html__( 'Outlined', 'kraft' ),
								'solid'		=> esc_html__( 'Solid', 'kraft' ),																
							 ],
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'READ MORE',
				'placeholder' => 'Button Text.',
			]
		);
		
		$this->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Button Url', 'kraft' ),
				'type' => Controls_Manager::URL,			
				'placeholder' => esc_html__( 'https://your-link.com', 'kraft' ),
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
						'{{WRAPPER}} .img-box .box-content h4' => 'color: {{VALUE}}',
				],		
				'separator' => 'after',
			]
		);				
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',				
				'selector' => '{{WRAPPER}} .img-box .box-content h4',
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
						'{{WRAPPER}} .img-box .box-content p' => 'color: {{VALUE}}',
				],		
				'separator' => 'after',
			]
		);		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',				
				'selector' => '{{WRAPPER}} .img-box .box-content p',
			]
		);
		
		$this->end_controls_section();			
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/image-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/image-box.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Image_Box() );
