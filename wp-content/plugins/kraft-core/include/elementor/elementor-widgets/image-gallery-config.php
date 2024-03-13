<?php
/**
 * Registers the image gallery shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Image_Gallery extends Widget_Base {
	
	public function get_name() {
		return 'kraft-image-gallery-widget';
	}

	public function get_title() {
		return esc_html__( 'Image Gallery', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-gallery-justified';
	}
	
	public function get_style_depends() {
		
		if ( Plugin::$instance->editor->is_edit_mode() || Plugin::$instance->preview->is_preview_mode() ) {
			return [ 'ilightbox-dark-skin', 'ilightbox' ];
		}

		if ( $this->get_settings_for_display( 'show_lightbox' ) == 'yes' ) {
			return [ 'ilightbox-dark-skin', 'ilightbox' ];
		}	
		else {
			return [];
		}
		
	}	
	
	public function get_script_depends() {
		
		if ( Plugin::$instance->editor->is_edit_mode() || Plugin::$instance->preview->is_preview_mode() ) {
			return [ 'jquery-cubeportfolio', 'jquery-requestAnimationFrame', 'jquery-mousewheel', 'ilightbox' ];
		}
		
		$scripts = [];
		
		$scripts[] = 'jquery-cubeportfolio';

		if ( $this->get_settings_for_display( 'show_lightbox' ) == 'yes' ) {
			$scripts[] = 'jquery-requestAnimationFrame';
			$scripts[] = 'jquery-mousewheel';
			$scripts[] = 'ilightbox';
		}	
		
		return $scripts;		
		
	}	
			
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_gallery_content',
			[
				'label' => esc_html__( 'Gallery Content', 'kraft' ),
			]
		);
		
		$this->add_control(
			'image_gallery_ids',
			[
				'label' => esc_html__( 'Add Images', 'kraft' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],				
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'image_title',
			[
				'label' => esc_html__( 'Image Title', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => 'Show image title from image meta details in media library.'				
			]
		);
		
		$this->add_control(
			'image_caption',
			[
				'label' => esc_html__( 'Image Caption', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => 'Show image caption from image meta details in media library.'				
			]
		);		
		
		$this->add_control(
			'image_desc',
			[
				'label' => esc_html__( 'Image Description', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => 'Show image description from image meta details in media library.',
				'separator' => 'after'				
			]
		);
		
		$this->add_control(
			'meta_align',
			[
				'label' => esc_html__( 'Meta Alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'left-aligned',
				'options' => [										
								'left-aligned'  => esc_html__( 'Left Aligned', 'kraft' ),
								'center-aligned' => esc_html__( 'Center Aligned', 'kraft' ),		
								'right-aligned' => esc_html__( 'Right Aligned', 'kraft' ),	
							 ],
				'description' => 'Image Meta alignment ie. caption and description.'
				
			]
		);
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_gallery_settings',
			[
				'label' => esc_html__( 'Gallery Settings', 'kraft' ),
			]
		);
		
		$this->add_control(
			'gallery_layout',
			[
				'label' => esc_html__( 'Gallery layout', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [								
								'grid'   => esc_html__( 'Grid', 'kraft' ),
								'mosaic' => esc_html__( 'Mosaic', 'kraft' ),																
							 ],				
			]
		);
		
		$this->add_responsive_control(
			'gallery_columns',
			[
				'label' => esc_html__( 'Gallery columns', 'kraft' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'options' => [
					'1' => '1 Column',
					'2' => '2 Column',
					'3' => '3 Column',
					'4' => '4 Column',
					'5' => '5 Column',
					'6' => '6 Column',
					'7' => '7 Column',
					'8' => '8 Column',					
				],				
				'description' => esc_html__( 'Set the number of columns for gallery. (columns range should be from 1 - 8).', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'show_lightbox',
			[
				'label' => esc_html__( 'Show lightbox', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',						
			]
		);
		
		$this->add_control(
			'gap_horizontal',
			[
				'label' => esc_html__( 'Columns Gap', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],				
			]
		);

		$this->add_control(
			'gap_vertical',
			[
				'label' => esc_html__( 'Rows Gap', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],				
			]
		);
		
		$this->end_controls_section();	
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/image-gallery.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/image-gallery.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Image_Gallery() );
