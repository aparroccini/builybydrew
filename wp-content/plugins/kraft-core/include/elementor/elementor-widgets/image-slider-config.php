<?php
/**
 * Registers the image slider shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Image_Slider extends Widget_Base {
	
	public function get_name() {
		return 'kraft-image-slider-widget';
	}

	public function get_title() {
		return esc_html__( 'Image Slider', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-slides';
	}
	
	public function get_script_depends() {
		return [ 'swiper' ];
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_slider_content',
			[
				'label' => esc_html__( 'Slider Content', 'kraft' ),
			]
		);

		$this->add_control(
			'image_slider_ids',
			[
				'label' => esc_html__( 'Add Images', 'kraft' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);				
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_slide_settings',
			[
				'label' => esc_html__( 'Slide Settings', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,		
			]
		);	
		
		$this->add_responsive_control(
			'no_of_slides',
			[
				'label' => esc_html__( 'No of Slides (Per View)', 'kraft' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',				
				],				
				'description' => esc_html__( 'Number of slides per view (slides visible at the same time on slider container).', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'space_between_slides',
			[
				'label' => esc_html__( 'Space between slides', 'kraft' ),				
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],					
				],				
				'description' => esc_html__( 'Distance between slides in px.', 'kraft' ),				
			]
		);		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_slide_transition',
			[
				'label' => esc_html__( 'Slide Transition', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,		
			]
		);	
		
		$this->add_control(
			'tranisition_effect',
			[
				'label' => esc_html__( 'Transition effect', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [								
								'slide' => esc_html__( 'Slide', 'kraft' ),
								'fade'  => esc_html__( 'Fade', 'kraft' ),																
							 ]
			]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_slider_controls',
			[
				'label' => esc_html__( 'Slider Controls', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,		
			]
		);	
				
		$this->add_control(
			'navigation',
			[
				'label' => esc_html__( 'Show Navigation', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Show navigation on slider.', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Show pagination on slider.', 'kraft' ),			
			]
		);
	
		$this->add_control(
			'autoplay_delay',
			[
				'label' => esc_html__( 'Autoplay Delay', 'kraft' ),				
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 5000,
				],
				'range' => [
					'px' => [
						'min' => 3000,
						'max' => 8000,
					],					
				],				
				'description' => esc_html__( 'Delay between transitions (in ms).', 'kraft' ),				
			]
		);
		
		$this->add_control(
			'disable_on_interaction',
			[
				'label' => esc_html__( 'Disable on interaction', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Set to No and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction.', 'kraft' ),			
			]
		);

		$this->add_control(
			'slider_controls_scheme',
			[
				'label' => esc_html__( 'Slider Controls Scheme', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'dark-controls',
				'options' => [								
								'dark-controls' => esc_html__( 'Dark Scheme', 'kraft' ),
								'light-controls'  => esc_html__( 'Light Scheme', 'kraft' ),																
							],
				"description"	=> esc_html__("Set controls scheme for sliders navigation/pagination as per your requirement from here.", 'kraft'),
			]
		);
		
		
		$this->end_controls_section();	
		
		
	}


	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/image-slider.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/image-slider.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Image_Slider() );
