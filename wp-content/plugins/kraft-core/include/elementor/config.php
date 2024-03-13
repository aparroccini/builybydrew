<?php

if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'Kraft_Elementor_Config' ) ) {
	

class Kraft_Elementor_Config {
	
	public $widgets, $controls;	

	public function __construct() {

		$this->widgets = [						
			'content-box-config',			
			'call-to-action-config',						
			'image-box-config',					
			'image-gallery-config',					
			'image-slider-config',					
			'list-block-config',					
			'list-config',					
			'portfolio-section-config',					
			'portfolio-slider-config',					
			'portfolio-listing-config',					
			'pricing-box-config',					
			'team-member-config',	
			'portfolio-split-slider-config',
			'image-before-after-config',
			'portfolio-carousel-config',					
			'button-config',					
			'counter-block-config',					
			'address-block-config',			
			'google-map-config',
			'contact-form-7-config'						
		];

		$this->controls = [
			'icon',
		];				
		
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_category' ) );
		
		add_action( 'elementor/widgets/register', array( $this, 'widgets_registered' ) );

	}
		
	public function register_category( $elements_manager ) {
		
		$category  = 'kraft';

		$elements_manager->add_category(
			$category,
			array(
				'title' => esc_html__( 'Kraft Elements', 'kraft' ),
				'icon'  => 'font',
			)			
		);
	}
	
	public function widgets_registered() {
		
		if ( ! defined( 'ELEMENTOR_PATH' ) || ! class_exists( 'Elementor\Widget_Base' ) || ! class_exists( 'Elementor\Plugin' ) ) {
			return false;
		}

		foreach ( $this->widgets as $widget ) {
			
			$template_file = KRAFT_CORE_PATH . 'include/elementor/elementor-widgets/' . $widget . '.php';						
			
			if ( file_exists( $template_file ) ) {
				require_once $template_file;
			}
		}		
		
	}
	
}
	
$kraft_elementor_config = new Kraft_Elementor_Config();

}