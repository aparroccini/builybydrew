<?php
/**
 * Registers the team member shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Team_Member extends Widget_Base {
	
	public function get_name() {
		return 'kraft-team-member-widget';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-person';
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
			'member_image',
			[
				'label' => esc_html__( 'Member Avatar', 'kraft' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				],				
			]
		);

		$this->add_control(
			'member_name',
			[
				'label' => esc_html__( 'Name', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'kraft' )				
			]
		);
		
		$this->add_control(
			'member_job_title',
			[
				'label' => esc_html__( 'Job Position', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Software Engineer', 'kraft' )				
			]
		);		

		$this->add_control(
			'text_alignment',
			[
				'label' => esc_html__( 'Text Alignment', 'kraft' ),				
				'type' => Controls_Manager::SELECT,
				'default' => 'text-center',
				'options' => [								
								'text-center'  => esc_html__( 'Center', 'kraft' ),
								'text-left' => esc_html__( 'Left', 'kraft' ),																
							 ],
			]
		);		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
  			'member_social_profiles',
  			[
  				'label' => esc_html__( 'Social Profiles', 'kraft' ),			
  			]
  		);

		$this->add_control(
			'enable_social_profiles',
			[
				'label' => esc_html__( 'Display Social Profiles?', 'kraft' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'enable_social_icons',
			[
				'label' => esc_html__( 'Display Social Profiles as icons', 'kraft' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'social_profile_links',
			[
				'type' => Controls_Manager::REPEATER,
				'condition' => [
					'enable_social_profiles!' => '',
				],
				'default' => [
					[
						'social' => 'fa fa-facebook',
						'social_text' => 'Fb',
					],
					[
						'social' => 'fa fa-twitter',
						'social_text' => 'Tw',
					],
					[
						'social' => 'fa fa-google-plus',
						'social_text' => 'G+',
					],
					[
						'social' => 'fa fa-linkedin',
						'social_text' => 'Ln',
					],
				],
				'fields' => [
					[
						'name' => 'social',
						'label' => esc_html__( 'Icon', 'kraft' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-wordpress',
						'include' => [
							'fa fa-apple',
							'fa fa-behance',
							'fa fa-bitbucket',
							'fa fa-codepen',
							'fa fa-delicious',
							'fa fa-digg',
							'fa fa-dribbble',
							'fa fa-envelope',
							'fa fa-facebook',
							'fa fa-flickr',
							'fa fa-foursquare',
							'fa fa-github',
							'fa fa-google-plus',
							'fa fa-houzz',
							'fa fa-instagram',
							'fa fa-jsfiddle',
							'fa fa-linkedin',
							'fa fa-medium',
							'fa fa-pinterest',
							'fa fa-product-hunt',
							'fa fa-reddit',
							'fa fa-shopping-cart',
							'fa fa-slideshare',
							'fa fa-snapchat',
							'fa fa-soundcloud',
							'fa fa-spotify',
							'fa fa-stack-overflow',
							'fa fa-tripadvisor',
							'fa fa-tumblr',
							'fa fa-twitch',
							'fa fa-twitter',
							'fab fa-x-twitter',
							'fa fa-vimeo',
							'fa fa-vk',
							'fa fa-whatsapp',
							'fa fa-wordpress',
							'fa fa-xing',
							'fa fa-yelp',
							'fa fa-youtube',
						],
					],
					[
						'name' => 'social_text',
						'label' => esc_html__( 'Text', 'kraft' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,					
						'placeholder' => esc_html__( 'Enter Social Text', 'kraft' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'kraft' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'default' => [
							'url' => '',
							'is_external' => 'true',
						],
						'placeholder' => esc_html__( 'Place URL here', 'kraft' ),
					],
				],
				'title_field' => '<i class="{{ social }}"></i> {{{ social.replace( \'fa fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_member_name_style',
			[
				'label' => esc_html__( 'Name Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);						
		
		$this->add_control(
			'member_name_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .team-member .member-info h6 .member-title' => 'color: {{VALUE}}',
				],					
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'member_name_typography',				
				'selector' => '{{WRAPPER}} .team-member .member-info h6 .member-title',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_member_position_style',
			[
				'label' => esc_html__( 'Job Position Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);								
		
		$this->add_control(
			'member_position_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#707070',				
				'selectors' => [
						'{{WRAPPER}} .team-member .member-info h6 .member-position' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'member_position_typography',				
				'selector' => '{{WRAPPER}} .team-member .member-info h6 .member-position',
			]
		);
	
		
		$this->end_controls_section();				
		
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__( 'Social Style', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,		
			]
		);								
		
		$this->add_control(
			'social_color',
			[
				'label' => esc_html__( 'Color', 'kraft' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#151515',				
				'selectors' => [
						'{{WRAPPER}} .team-member .member-info .member-socials li a' => 'color: {{VALUE}}',
				],			
			]
		);
		
		$this->end_controls_section();				
		
	}

	protected function render( $instance = [] ) {		
		
		if( locate_template( 'shortcodes/elementor/team-member.php' ) != '' ) {
			include( locate_template( 'shortcodes/elementor/team-member.php' ) );
		}			
		
	}

}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Team_Member() );
