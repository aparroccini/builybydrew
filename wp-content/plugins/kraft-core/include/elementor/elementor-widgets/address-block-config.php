<?php
/**
 * Registers the address block shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Address_Block extends Widget_Base {
	
	public function get_name() {
		return 'kraft-address-block-widget';
	}

	public function get_title() {
		return esc_html__( 'Address Block', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-post-content';
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {		
				
		$this->start_controls_section(
			'section_phone_content',
			[
				'label' => esc_html__( 'Phone Number', 'kraft' ),
			]
		);
		
		$this->add_control(
			'phone_no_title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Phone',			
				'description' => esc_html__( 'Enter label for phone number. For example, phone number, contact number, etc.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'phone_no',
			[
				'label' => esc_html__( 'Number', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '022844 998 234',			
				'description' => esc_html__( 'Enter phone number.', 'kraft' ),				
			]
		);				
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_fax_content',
			[
				'label' => esc_html__( 'Fax Number', 'kraft' ),
			]
		);
		
		$this->add_control(
			'fax_no_title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Fax',			
				'description' => esc_html__( 'Enter label for fax number. For example, fax, fax number, etc.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'fax_no',
			[
				'label' => esc_html__( 'Number', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '022844 998 234',			
				'description' => esc_html__( 'Enter fax number.', 'kraft' ),				
			]
		);				
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_email_content',
			[
				'label' => esc_html__( 'Email', 'kraft' ),
			]
		);
		
		$this->add_control(
			'email_title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Email',			
				'description' => esc_html__( 'Enter label for email address. For example, email, email address, etc.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'email',
			[
				'label' => esc_html__( 'Email Id', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'kraft@gmail.com',			
				'description' => esc_html__( 'Enter email address.', 'kraft' ),				
			]
		);				
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_address_content',
			[
				'label' => esc_html__( 'Address', 'kraft' ),
			]
		);
		
		$this->add_control(
			'address_title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Address',			
				'description' => esc_html__( 'Enter label for address. For example, address, mailing address, etc.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'address',
			[
				'label' => esc_html__( 'Address', 'kraft' ),				
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => '833 Indian Summer Court Carol Stream, IL 60188',			
				'description' => esc_html__( 'Enter address.', 'kraft' ),				
			]
		);				
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_phone_style',
			[
				'label' => esc_html__( 'Phone Number', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);
		
		$this->add_control(
			'phone_no_title_color',
			[
				'label' => esc_html__( 'Title Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .phone span.title' => 'color: {{VALUE}}',
				],						
			]				
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'phone_no_title_typography',				
				'selector' => '{{WRAPPER}} .contact-info .phone span.title',
			]
		);	
		
		$this->add_control(
			'phone_no_color',
			[
				'label' => esc_html__( 'Number Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .phone span' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'phone_no_typography',				
				'selector' => '{{WRAPPER}} .contact-info .phone span',
			]
		);	
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_fax_style',
			[
				'label' => esc_html__( 'Fax Number', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);
		
		$this->add_control(
			'fax_no_title_color',
			[
				'label' => esc_html__( 'Title Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .fax span.title' => 'color: {{VALUE}}',
				],						
			]				
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fax_no_title_typography',				
				'selector' => '{{WRAPPER}} .contact-info .fax span.title',
			]
		);	
		
		$this->add_control(
			'fax_no_color',
			[
				'label' => esc_html__( 'Number Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .fax span' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fax_no_typography',				
				'selector' => '{{WRAPPER}} .contact-info .fax span',
			]
		);	
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_email_style',
			[
				'label' => esc_html__( 'Email', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);
		
		$this->add_control(
			'email_title_color',
			[
				'label' => esc_html__( 'Title Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .email span.title' => 'color: {{VALUE}}',
				],						
			]				
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'email_title_typography',				
				'selector' => '{{WRAPPER}} .contact-info .email span.title',
			]
		);	
		
		$this->add_control(
			'email_color',
			[
				'label' => esc_html__( 'Email Id Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .email a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'email_typography',				
				'selector' => '{{WRAPPER}} .contact-info .email a',
			]
		);	
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_address_style',
			[
				'label' => esc_html__( 'Address', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);
		
		$this->add_control(
			'address_title_color',
			[
				'label' => esc_html__( 'Title Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .address span.title' => 'color: {{VALUE}}',
				],						
			]				
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'address_title_typography',				
				'selector' => '{{WRAPPER}} .contact-info .address span.title',
			]
		);	
		
		$this->add_control(
			'address_color',
			[
				'label' => esc_html__( 'Address Color', 'kraft' ),				
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .contact-info .address span' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'address_typography',				
				'selector' => '{{WRAPPER}} .contact-info .address span',
			]
		);	
		
		$this->end_controls_section();

		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/address-block.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/address-block.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Address_Block() );
