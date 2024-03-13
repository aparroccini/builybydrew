<?php
/**
 * Registers the pricing box shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Pricing_Box extends Widget_Base {
	
	public function get_name() {
		return 'kraft-pricing-box-widget';
	}

	public function get_title() {
		return esc_html__( 'Pricing Box', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-price-table';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'kraft' )				
			]
		);
		
		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'kraft' ),
				"description" => esc_html__("Enter the price and separate with a pipe | if you want to have subtitle.", 'kraft'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '$29|per hour', 'kraft' ),
				'separator' => 'after',				
			]
		);		
		
		$this->add_control(
			'pricing_content',
			[				
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<ul>
								<li>upto 30 photos</li>
                                <li>high quality camera</li>
                                <li>retouched photos</li>
                                <li>no photoproofing</li>
                                <li>no stylist assistance</li>
							 </ul>',				
				'title' => esc_html__( 'Content', 'kraft' ),		
				'separator' => 'after',				
			]
		);
		
		$this->add_control(
			'button_text',
			[			
				'label' => esc_html__( 'Button Text', 'kraft' ),
				'type' => Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Enter button text', 'kraft' ),
				'default' => esc_html__( 'SIGN UP', 'kraft' ),
				'label_block' => true,							
			]				
		);		
		
		$this->add_control(
			'button_link',
			[			
				'label' => esc_html__( 'Button Link', 'kraft' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
					'default' => [
						'url' => '',
						'is_external' => 'true',
					],
				'placeholder' => esc_html__( 'Place URL here', 'kraft' ),	
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
						'{{WRAPPER}} .pricing h3' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .pricing h3',
			]
		);
		
		$this->end_controls_section();		
			
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);						
		
		$this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .pricing .pricing-price span' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',				
				'selector' => '{{WRAPPER}} .pricing .pricing-price span',
			]
		);
		
		$this->end_controls_section();
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/pricing-box.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/pricing-box.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Pricing_Box() );
