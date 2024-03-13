<?php
/**
 * Registers the image before after shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Image_Before_After extends Widget_Base {
	
	public function get_name() {
		return 'kraft-image-before-after-widget';
	}

	public function get_title() {
		return esc_html__( 'Image Before After', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-image-before-after';
	}

	public function get_style_depends() {
		return [ 'cocoen' ];
	}	
	
	public function get_script_depends() {
		return [ 'cocoen' ];
	}
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_image_before_after_content',
			[
				'label' => esc_html__( 'Images Content', 'kraft' ),
			]
		);
			
		$this->add_control(
			'before_after_image_ids',
			[
				'label' => esc_html__( 'Image Selection', 'kraft' ),
				'type' => Controls_Manager::GALLERY,	
				'show_label' => false,				
				'dynamic' => [
					'active' => true,
				],				
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],	
				"description"	=> esc_html__("Select images in pair of 2 for comparing.", 'kraft')
			]
		);		
			
		$this->end_controls_section();			
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/image-before-after.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/image-before-after.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Image_Before_After() );
