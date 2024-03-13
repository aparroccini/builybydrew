<?php
/**
 * Registers the portfolio section shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Portfolio_Section extends Widget_Base {
	
	public function get_name() {
		return 'kraft-portfolio-section-widget';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Section', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-gallery-grid';
	}
	
	public function get_style_depends() {
		return [ 'ilightbox-dark-skin', 'ilightbox' ];
	}	
	
	public function get_script_depends() {
		
		if ( Plugin::$instance->editor->is_edit_mode() || Plugin::$instance->preview->is_preview_mode() ) {
			return [ 'jquery-cubeportfolio', 'scroll-magic', 'animation-gsap', 'tilt-jquery', 'jquery-requestAnimationFrame', 'jquery-mousewheel', 'ilightbox' ];
		}
		
		$scripts = [];
		
		$scripts[] = 'jquery-cubeportfolio';
		$scripts[] = 'jquery-requestAnimationFrame';
		$scripts[] = 'jquery-mousewheel';
		$scripts[] = 'ilightbox';				

		if ( $this->get_settings_for_display( 'display_type' ) == 'scroll-fadeIn' || $this->get_settings_for_display( 'display_type' ) == 'scroll-fadeInUp' ) {
			$scripts[] = 'scroll-magic';
			$scripts[] = 'animation-gsap';	
		}	
		
		if ( $this->get_settings_for_display( 'under_image_caption_animation' ) == 'tilt' ) {
			$scripts[] = 'tilt-jquery';	
		}
		
		return $scripts;
		
	}	
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'portfolio_layout',
			[
				'label' => esc_html__( 'Layout', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [								
								'grid'    => esc_html__( 'Grid', 'kraft' ),
								'masonry' => esc_html__( 'Masonry', 'kraft' ),
								'mosaic'  => esc_html__( 'Mosaic', 'kraft' ),													
							 ]
			]
		);

		$this->add_responsive_control(
			'portfolio_columns',
			[
				'label' => esc_html__( 'Columns', 'kraft' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
				],				
			]
		);
		
		$this->add_control(
			'load_more_feature',
			[
				'label' => esc_html__( 'Load more', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'no',			
				'description' => esc_html__( 'Check to enable load more feature for portfolio section.', 'kraft' ),			
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Query', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'no_of_items',
			[
				'label' => esc_html__( 'No of items', 'kraft' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '',
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Order by', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [									
								"date"		 => esc_html__( "Date", "kraft" ),
								"ID"		 => esc_html__( "ID", "kraft" ),
								"author"	 => esc_html__( "Author", "kraft" ),
								"title"		 => esc_html__( "Title", "kraft" ),
								"modified"	 => esc_html__( "Last Modified", "kraft" ),	
								"rand"		 => esc_html__( "Random", "kraft" ),				
								"menu_order" => esc_html__( "Custom Sort", "kraft" ),
								"inherit"	 => esc_html__( "Inherit", "kraft" ),
							 ],			
			]
		);
		
		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order arrangement', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [									
								"ASC"		 => esc_html__( "Ascending", "kraft" ),
								"DESC"		 => esc_html__( "Descending", "kraft" ),
								"inherit"	 => esc_html__( "Inherit", "kraft" ),								
							 ],	
				'separator' => 'after'
			]
		);
		
		$this->add_control(
			'categories_flag',
			[
				'label' => esc_html__( 'Exclude/Include portfolio categories', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'exclude',
				'label_block' => true,
				'options' => [									
								"exclude"	=> esc_html__( "Exclude", "kraft" ),
								"include"	=> esc_html__( "Include", "kraft" ),									
							 ],			
			]
		);
		
		$this->add_control(
			'exclude_categories',
			[
				'label' => esc_html__( 'Portfolio categories', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,					
				'description' => esc_html__( 'Enter portfolio categories slug to exclude those records (Note: separate values by commas (,)). Example branding,mobile-app.', 'kraft' ),				
			]
		);		
		
		$this->add_control(
			'portfolio_items_flag',
			[
				'label' => esc_html__( 'Exclude/Include portfolio items', 'kraft' ),
				'label_block' => true,						
				'type' => Controls_Manager::SELECT,
				'default' => 'exclude',
				'options' => [									
								"exclude"	=> esc_html__( "Exclude", "kraft" ),
								"include"	=> esc_html__( "Include", "kraft" ),									
							 ],			
			]
		);
		
		$this->add_control(
			'exclude_portfolio',
			[
				'label' => esc_html__( 'Portfolio IDs', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,			
				'description' => esc_html__( 'Enter portfolio IDs to exclude those records (Note: separate values by commas (,)).Example 2533,231.', 'kraft' ),				
			]
		);			
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_load_more',
			[
				'label' => esc_html__( 'Load More', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition'   => [ 'load_more_feature' => 'yes' ],
			]
		);
		
		$this->add_control(
			'load_more_using',
			[
				'label' => esc_html__( 'Type', 'kraft' ),			
				'type' => Controls_Manager::SELECT,
				'default' => 'click',
				'options' => [								
								'click' => esc_html__( 'Button click', 'kraft' ),
								'auto'  => esc_html__( 'Scroll', 'kraft' ),													
							 ],				
				'condition'   => [ 'load_more_feature' => 'yes' ],
			]
		);
		
		$this->add_control(
			'load_no_of_items',
			[
				'label' => esc_html__( 'No of items', 'kraft' ),				
				'type' => Controls_Manager::TEXT,							
				'condition'   => [ 'load_more_feature' => 'yes' ],				
			]
		);		
		
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button text', 'kraft' ),				
				'type' => Controls_Manager::TEXT,
				'default' => 'LOAD MORE',							
				'condition'   => [ 'load_more_feature' => 'yes', 'load_more_using' => 'click' ],				
			]
		);		
		
		$this->add_control(
			'button_loading_text',
			[
				'label' => esc_html__( 'Loading text', 'kraft' ),			
				'type' => Controls_Manager::TEXT,
				'default' => 'LOADING...',								
				'condition'   => [ 'load_more_feature' => 'yes', 'load_more_using' => 'click' ],				
			]
		);		
		
		$this->add_control(
			'button_load_text',
			[
				'label' => esc_html__( 'After load text', 'kraft' ),			
				'type' => Controls_Manager::TEXT,
				'default' => 'NO MORE WORKS',								
				'condition'   => [ 'load_more_feature' => 'yes' ],				
			]
		);		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_thumbnail_appearance',
			[
				'label' => esc_html__( 'Thumbnail Appearance', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,		
			]
		);
		
		$this->add_control(
			'content_position',
			[
				'label' => esc_html__( 'Content position', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'overlay',
				'options' => [								
								'overlay'   => esc_html__( 'Content Overlay', 'kraft' ),
								'under-image' => esc_html__( 'Content Under Image', 'kraft' ),													
							 ]
			]
		);
		
		$this->add_control(
			'content_alignment',
			[
				'label' => esc_html__( 'Content alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'alignCenter',
				'options' => [								
								'alignLeft'   => esc_html__( 'Left', 'kraft' ),
								'alignCenter' => esc_html__( 'Center', 'kraft' ),													
							 ],				
			]
		);
		
		$this->add_control(
			'overlay_caption_animation',
			[
				'label' => esc_html__( 'Hover Effect', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [								
								'none'				 => esc_html__( 'None', 'kraft' ),
								'pushTop'			 => esc_html__( 'Push Top', 'kraft' ),													
								'revealBottom'		 => esc_html__( 'Reveal Bottom', 'kraft' ),													
								'moveRight'			 => esc_html__( 'Move Right', 'kraft' ),													
								'overlayRightAlong'  => esc_html__( 'Overlay Right Along', 'kraft' ),													
								'overlayBottomAlong' => esc_html__( 'Overlay Bottom', 'kraft' ),													
								'minimal'			 => esc_html__( 'Minimal', 'kraft' ),													
								'fadeIn'			 => esc_html__( 'Fade In', 'kraft' ),													
								'opacity'			 => esc_html__( 'Opacity', 'kraft' ),													
								'zoom'				 => esc_html__( 'Zoom', 'kraft' ),													
								'ribbon'			 => esc_html__( 'Ribbon', 'kraft' ),													
								'shrink'			 => esc_html__( 'Shrink', 'kraft' ),													
							 ],				
				'condition'   => [ 'content_position' => 'overlay' ],
			]
		);
		
		$this->add_control(
			'under_image_caption_animation',
			[
				'label' => esc_html__( 'Hover Effect', 'kraft' ),			
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [								
								'none'	=> esc_html__( 'None', 'kraft' ),
								'zoom'	=> esc_html__( 'Zoom', 'kraft' ),	
								'custom-overlay' => esc_html__( 'Overlay', 'kraft' ),				
								'tilt'	=> esc_html__( 'Tilt', 'kraft' ),				
							 ],				
				'condition'   => [ 'content_position' => 'under-image' ],
			]
		);
		
		$this->add_control(
			'display_type',
			[
				'label' => esc_html__( 'Display Animation', 'kraft' ),			
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [								
								'default'		=> esc_html__( 'Default', 'kraft' ),
								'scroll-fadeIn'	=> esc_html__( 'Scroll FadeIn', 'kraft' ),													
								'scroll-fadeInUp' => esc_html__( 'Scroll FadeInUp', 'kraft' ),															
							 ],				
			]
		);
		
		$this->add_control(
			'horizontal_space',
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

		$this->add_control(
			'vertical_space',
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
			'hover_color',
			[
				'label' => esc_html__( 'Hover color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e8b927',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-wrap .cbp-caption-activeWrap' => 'background-color: {{VALUE}}',
				],		
				'condition'   => [ 'content_position' => 'overlay' ],				
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_filter_bar',
			[
				'label' => esc_html__( 'Filter Bar', 'kraft' ),
				'tab' => Controls_Manager::TAB_CONTENT,		
			]
		);
		
		$this->add_control(
			'show_filter',
			[
				'label' => esc_html__( 'Show category filter', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'description' => esc_html__( 'Check to show the filters in a portfolio section.', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'show_sub_category',
			[
				'label' => esc_html__( 'Show Sub category', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',			
				'condition'   => [ 'show_filter' => 'yes' ],
				'description' => esc_html__( 'Check to show sub categories filter in portfolio section.', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'show_all_category',
			[
				'label' => esc_html__( 'Show All filter', 'kraft' ),			
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
				'default' => 'yes',		
				'condition'   => [ 'show_filter' => 'yes' ],
				'description' => esc_html__( 'Choose to show/hide All filter by default in portfolio section.', 'kraft' ),			
			]
		);
		
		$this->add_control(
			'category_all_text',
			[
				'label' => esc_html__( 'Category All text', 'kraft' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => 'All',	
				'condition'   => [ 'show_filter' => 'yes', 'show_all_category' => 'yes' ],
			]
		);	
		
		$this->add_control(
			'category_text_color',
			[
				'label' => esc_html__( 'Category text color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#454545',
				'description' => esc_html__( 'Select idle color for filter category text.', 'kraft' ),
				'selectors' => [
						'{{WRAPPER}} .portfolio-wrap .cbp-l-filters-text .cbp-filter-item:not(.cbp-filter-item-active)' => 'color: {{VALUE}}',
				],				
				'condition'   => [ 'show_filter' => 'yes' ],
			]
		);
		
		$this->add_control(
			'filter_position',
			[
				'label' => esc_html__( 'Alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'text-justified',
				'options' => [								
								'text-justified' => esc_html__( 'Justified', 'kraft' ),
								'text-left'	  => esc_html__( 'Left', 'kraft' ),
								'text-center' => esc_html__( 'Center', 'kraft' ),	
								'text-right'  => esc_html__( 'Right', 'kraft' ),	
							 ],						
				'condition'   => [ 'show_filter' => 'yes' ],
			]
		);
		
		$this->add_control(
			'filter_animation',
			[
				'label' => esc_html__( 'Animation', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'quicksand',
				'options' => [								
								'fadeOut'		=> esc_html__( 'fadeOut', 'kraft' ),
								'quicksand'		=> esc_html__( 'quicksand', 'kraft' ),	
								'bounceLeft'	=> esc_html__( 'bounceLeft', 'kraft' ),	
								'bounceTop'		=> esc_html__( 'bounceTop', 'kraft' ),	
								'bounceBottom'  => esc_html__( 'bounceBottom', 'kraft' ),	
								'moveLeft'		=> esc_html__( 'moveLeft', 'kraft' ),	
								'slideLeft'		=> esc_html__( 'slideLeft', 'kraft' ),	
								'fadeOutTop'	=> esc_html__( 'fadeOutTop', 'kraft' ),	
								'sequentially'  => esc_html__( 'sequentially', 'kraft' ),	
								'skew'			=> esc_html__( 'skew', 'kraft' ),	
								'slideDelay'	=> esc_html__( 'slideDelay', 'kraft' ),	
								'3dFlip'		=> esc_html__( '3dFlip', 'kraft' ),	
								'rotateSides'	=> esc_html__( 'rotateSides', 'kraft' ),	
								'flipOutDelay'  => esc_html__( 'flipOutDelay', 'kraft' ),	
								'flipOut'		=> esc_html__( 'flipOut', 'kraft' ),	
								'unfold'		=> esc_html__( 'unfold', 'kraft' ),	
								'foldLeft'		=> esc_html__( 'foldLeft', 'kraft' ),	
								'scaleDown'		=> esc_html__( 'scaleDown', 'kraft' ),	
								'scaleSides'	=> esc_html__( 'scaleSides', 'kraft' ),	
								'frontRow'		=> esc_html__( 'frontRow', 'kraft' ),	
								'flipBottom'	=> esc_html__( 'flipBottom', 'kraft' ),	
								'rotateRoom'	=> esc_html__( 'rotateRoom', 'kraft' ),	
							 ],						
				'condition'   => [ 'show_filter' => 'yes' ],
			]
		);
		
		$this->add_control(
			'filter_orderby',
			[
				'label' => esc_html__( 'Order by', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [								
								'name'	  => esc_html__( 'Name', 'kraft' ),
								'term_id' => esc_html__( 'ID', 'kraft' ),	
								'count'   => esc_html__( 'Count', 'kraft' ),	
								'slug'    => esc_html__( 'Slug', 'kraft' ),	
							 ],						
				'condition'   => [ 'show_filter' => 'yes' ],
			]
		);
		
		$this->add_control(
			'filter_order',
			[
				'label' => esc_html__( 'Order', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [								
								'ASC'	=> esc_html__( 'Ascending', 'kraft' ),
								'DESC'  => esc_html__( 'Descending', 'kraft' ),	
								
							 ],								
				'condition'   => [ 'show_filter' => 'yes' ],
			]
		);
		
		$this->add_control(
			'filter_margin_bottom',
			[
				'label' => esc_html__( 'Margin botom', 'kraft' ),				
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 80,
					],					
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-wrap .cbp-l-filters-text' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'description' => esc_html__( 'Set the margin bottom for filter example: 10px.', 'kraft' ),
				'condition'   => [ 'show_filter' => 'yes' ],
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
				'label' => esc_html__( 'Title color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-wrap .cbp-l-grid-agency-title,{{WRAPPER}} .portfolio-wrap .cbp-l-caption-title' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .portfolio-wrap .cbp-l-grid-agency-title,{{WRAPPER}} .portfolio-wrap .cbp-l-caption-title',
			]
		);
		
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Subtitle color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',				
				'selectors' => [
						'{{WRAPPER}} .portfolio-wrap .cbp-l-grid-agency-desc,{{WRAPPER}} .portfolio-wrap .cbp-l-caption-desc' => 'color: {{VALUE}}',
				],			
			]
		);		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',				
				'selector' => '{{WRAPPER}} .portfolio-wrap .cbp-l-grid-agency-desc,{{WRAPPER}} .portfolio-wrap .cbp-l-caption-desc',
			]
		);
	
		
		$this->end_controls_section();	

	}


	protected function render( $instance = [] ) {
		
		global $post;
		
		if( locate_template( 'shortcodes/elementor/portfolio-section.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/portfolio-section.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Portfolio_Section() );
