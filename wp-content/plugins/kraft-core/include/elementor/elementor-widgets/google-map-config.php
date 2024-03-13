<?php
/**
 * Registers the google map shortcode and adds it to the Elementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Widget_Kraft_Google_Map extends Widget_Base {
	
	public function get_name() {
		return 'kraft-google-map-widget';
	}

	public function get_title() {
		return esc_html__( 'Google Map', 'kraft' );
	}

	public function get_icon() {		
		return 'eicon-google-maps';
	}	

	public function get_script_depends() {
		return [ 'google-map', 'gmaps' ];
	}		
	
	public function get_categories() {		
		return [ 'kraft' ];
	}	

	protected function register_controls() {		

		$this->start_controls_section(
			'map_section_content',
			array(
				'label' => esc_html__( 'Content', 'kraft' ),
			)
		);

		$this->add_control( 'map_type', [
			'label'       	=> esc_html__( 'Map Type', 'kraft' ),
			'type' 			=> Controls_Manager::SELECT,
			'default' 		=> 'basic',
			'options' 		=> [
									'basic'  	=> esc_html__( 'Basic', 'kraft' ),
									'marker'  	=> esc_html__( 'Multiple Marker', 'kraft' ),									
								]
		]);
	
		$this->add_control( 'map_lat',
			[
				'label' => esc_html__( 'Latitude', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '51.503324', 'kraft' ),
				'condition' => [
					'map_type' => ['basic']
				]
			]
		);

		$this->add_control( 'map_lng',
			[
				'label' => esc_html__( 'Longitude', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '-0.119543', 'kraft' ),
				'condition' => [
					'map_type' => ['basic']
				]
			]
		);	
		
		$this->end_controls_section();

		
		$this->start_controls_section(
			'section_google_map_basic_marker_params',
			[
				'label' => esc_html__( 'Marker Settings', 'kraft' ),
				'condition' => [
					'map_type' => ['basic']
				]
			]
		);

		$this->add_control(
			'map_basic_marker_title',
			[
				'label' => esc_html__( 'Title', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Google Map Title', 'kraft' )
			]
		);

		$this->add_control(
			'map_basic_marker_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Google map content', 'kraft' )
			]
		);
		
		$this->add_control(
			'map_basic_marker_icon_enable',
			[
				'label' => esc_html__( 'Custom Marker Icon', 'kraft' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'map_basic_marker_icon',
			[
				'label' => esc_html__( 'Marker Icon', 'kraft' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					// 'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'map_basic_marker_icon_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'map_basic_marker_icon_width',
			[
				'label' => esc_html__( 'Marker Width', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 32
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'condition' => [
					'map_basic_marker_icon_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'map_basic_marker_icon_height',
			[
				'label' => esc_html__( 'Marker Height', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 32
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'condition' => [
					'map_basic_marker_icon_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();
			

		$this->start_controls_section(
				'section_google_map_marker_params',
				[
					'label' => esc_html__( 'Marker Settings', 'kraft' ),
					'condition' => [
						'map_type' => ['marker' ]
					]
				]
		);

		$map_marker_repeater = new Repeater();

		$map_marker_repeater->add_control(
			'map_marker_lat',
			[
				'label' => esc_html__( 'Latitude', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '51.503324', 'kraft' ),
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_lng',
			[
				'label' => esc_html__( 'Longitude', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '-0.119543', 'kraft' ),
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_title',
			[
				'label' => esc_html__( 'Tooltip', 'kraft' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Marker Title', 'kraft' ),
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_content',
			[
				'label' => esc_html__( 'Content', 'kraft' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Marker Content. You can put html here.', 'kraft' ),
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_icon_enable',
			[
				'label' => esc_html__( 'Use Custom Icon', 'kraft' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => esc_html__( 'Yes', 'kraft' ),
				'label_off' => esc_html__( 'No', 'kraft' ),
				'return_value' => 'yes',
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_icon',
			[
				'label' => esc_html__( 'Custom Icon', 'kraft' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'map_marker_icon_enable' => 'yes'
				]
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_icon_width',
			[
				'label' => esc_html__( 'Icon Width', 'kraft' ),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( '32', 'kraft' ),
				'condition' => [
					'map_marker_icon_enable' => 'yes'
				]
			]
		);

		$map_marker_repeater->add_control(
			'map_marker_icon_height',
			[
				'label' => esc_html__( 'Icon Height', 'kraft' ),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( '32', 'kraft' ),
				'condition' => [
					'map_marker_icon_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'map_markers',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'kraftre',
				'default' => [
					[ 
						'map_marker_title' => esc_html__( 'Daffodil International University', 'kraft' ),
						'map_marker_lat' => esc_html__( '51.503324', 'kraft' ),
						'map_marker_lng' => esc_html__( '-0.119543', 'kraft' ),
					],
					[ 
						'map_marker_title' => esc_html__( 'National Parliament House', 'kraft' ),
						'map_marker_lat' => esc_html__( '23.7626233', 'kraft' ),
						'map_marker_lng' => esc_html__( '90.3777502', 'kraft' ),
					],
				],
				'fields' => $map_marker_repeater->get_controls(),
				'title_field' => '{{map_marker_title}}',
			]
		);

		$this->end_controls_section();	
	
		$this->start_controls_section(
			'section_map_controls',
			[
				'label'	=> esc_html__( 'Controls', 'kraft' )
			]
		);

		$this->add_control(
			'map_zoom',
			[
				'label' => esc_html__( 'Zoom Level', 'kraft' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => false,
				'default' => esc_html__( '14', 'kraft' ),
			]
		);

		$this->add_control(
			'map_streeview_control',
			[
				'label'                 => esc_html__( 'Street View Controls', 'kraft' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'true',
				'label_on'              => esc_html__( 'On', 'kraft' ),
				'label_off'             => esc_html__( 'Off', 'kraft' ),
				'return_value'          => 'true',
			]
		);

		$this->add_control(
			'map_type_control',
			[
				'label'                 => esc_html__( 'Map Type Control', 'kraft' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => esc_html__( 'On', 'kraft' ),
				'label_off'             => esc_html__( 'Off', 'kraft' ),
				'return_value'          => 'yes',
			]
		);

		$this->add_control(
			'map_zoom_control',
			[
				'label'                 => esc_html__( 'Zoom Control', 'kraft' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __( 'On', 'kraft' ),
				'label_off'             => __( 'Off', 'kraft' ),
				'return_value'          => 'yes',
			]
		);

		$this->add_control(
			'map_fullscreen_control',
			[
				'label'                 => esc_html__( 'Fullscreen Control', 'kraft' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => esc_html__( 'On', 'kraft' ),
				'label_off'             => esc_html__( 'Off', 'kraft' ),
				'return_value'          => 'yes',
			]
		);

		$this->add_control(
			'map_scroll_zoom',
			[
				'label'                 => esc_html__( 'Scroll Wheel Zoom', 'kraft' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => esc_html__( 'On', 'kraft' ),
				'label_off'             => esc_html__( 'Off', 'kraft' ),
				'return_value'          => 'yes',
			]
		);

		$this->end_controls_section();
			
		
		$this->start_controls_section(
			'section_google_map_theme_params',
			[
				'label'		=> esc_html__( 'Theme', 'kraft' ),			
			]
		);

		$this->add_control(
			'map_theme_source',
			[
				'label'		=> esc_html__( 'Theme Source', 'kraft' ),
				'type'		=> Controls_Manager::CHOOSE,
				'options' => [
					'gstandard' => [
						'title' => esc_html__( 'Google Standard', 'kraft' ),
						'icon' => 'fa fa-map',
					],
					'snazzymaps' => [
						'title' => esc_html__( 'Snazzy Maps', 'kraft' ),
						'icon' => 'fa fa-map-marker',
					],
					'custom' => [
						'title' => esc_html__( 'Custom', 'kraft' ),
						'icon' => 'fa fa-edit',
					],
				],
				'default'	=> 'gstandard'
			]
		);

		$this->add_control(
			'map_gstandards',
			[
				'label'                 => esc_html__( 'Google Themes', 'kraft' ),
				'type'                  => Controls_Manager::SELECT,
				'default'               => 'standard',
				'options'               => [
											'standard'     => esc_html__( 'Standard', 'kraft' ),
											'silver'       => esc_html__( 'Silver', 'kraft' ),
											'retro'        => esc_html__( 'Retro', 'kraft' ),
											'dark'         => esc_html__( 'Dark', 'kraft' ),
											'night'        => esc_html__( 'Night', 'kraft' ),
											'aubergine'    => esc_html__( 'Aubergine', 'kraft' )
										],
				'description'           => sprintf( '<a href="https://mapstyle.withgoogle.com/" target="_blank">%1$s</a> %2$s',__( 'Click here', 'kraft' ), __( 'to generate your own theme and use JSON within Custom style field.', 'kraft' ) ),
				'condition'	=> [
					'map_theme_source'	=> 'gstandard'
				]
			]
		);

		$this->add_control(
			'map_snazzymaps',
			[
				'label'                 => esc_html__( 'SnazzyMaps Themes', 'kraft' ),
				'type'                  => Controls_Manager::SELECT,
				'label_block'			=> true,
				'default'               => 'colorful',
				'options'               => [
												'default'		=> esc_html__( 'Default', 'kraft' ),
												'simple'		=> esc_html__( 'Simple', 'kraft' ),
												'colorful'		=> esc_html__( 'Colorful', 'kraft' ),
												'complex'		=> esc_html__( 'Complex', 'kraft' ),
												'dark'			=> esc_html__( 'Dark', 'kraft' ),
												'greyscale'		=> esc_html__( 'Greyscale', 'kraft' ),
												'light'			=> esc_html__( 'Light', 'kraft' ),
												'monochrome'	=> esc_html__( 'Monochrome', 'kraft' ),
												'nolabels'		=> esc_html__( 'No Labels', 'kraft' ),
												'twotone'		=> esc_html__( 'Two Tone', 'kraft' )
											],
				'description'           => sprintf( '<a href="https://snazzymaps.com/explore" target="_blank">%1$s</a> %2$s',__( 'Click here', 'kraft' ), __( 'to explore more themes and use JSON within custom style field.', 'kraft' ) ),
				'condition'	=> [
					'map_theme_source'	=> 'snazzymaps'
				]
			]
		);

		$this->add_control(
			'map_custom_style',
			[
				'label'                 => esc_html__( 'Custom Style', 'kraft' ),
				'description'           => sprintf( '<a href="https://mapstyle.withgoogle.com/" target="_blank">%1$s</a> %2$s',__( 'Click here', 'kraft' ), __( 'to get JSON style code to style your map', 'kraft' ) ),
				'type'                  => Controls_Manager::TEXTAREA,
				'condition'             => [
					'map_theme_source'     => 'custom',
				],
			]
		);

		$this->end_controls_section(); 
		
		
		$this->start_controls_section(
			'map_style_params',
			[
				'label' => esc_html__( 'Map Container', 'kraft' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control( 'map_max_width',
			[
				'label' => __( 'Width', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1140,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1400,
						'step' => 10,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .clbr-google-map' => 'max-width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control( 'map_max_height',
			[
				'label' => __( 'Height', 'kraft' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1400,
						'step' => 10,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .clbr-google-map' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control( 'map_alignment',
			[
				'label' => esc_html__( 'Alignment', 'kraft' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'kraft' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'kraft' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'kraft' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',	
			]
		);

		$this->end_controls_section();
		
	}


	protected function render( $instance = [] ) {
		
		$params = $this->get_settings_for_display();

		$this->add_render_attribute( 'map-wrap', [
			'class'		=> [ 'clbr-google-map' ],
			'id'		=> 'clbr-google-map-' . esc_attr( $this->get_id() ),
			'data-id'	=> esc_attr( $this->get_id() ),		
			'style'		=> $this->get_alignment( $params[ 'map_alignment' ] )
		]);
		
	?>
		<div class="clbr-google-map-wrapper">

			<div <?php echo $this->get_render_attribute_string( 'map-wrap' ); ?>  <?php echo kraft_build_data_attr( $this->get_data_attributes( $params ) ); ?> ></div>
	
			<div class="google-map-notice"></div>

		</div>
		
	<?php }


	private function get_data_attributes( $params ) {

		$data_attr = array();

		$data_attr[ 'data-map-type' ]  		  			  = ( $params[ 'map_type' ] )         				? $params[ 'map_type' ] : '';		
		$data_attr[ 'data-map-lat' ]  		  			  = ( $params[ 'map_lat' ] )          				? $params[ 'map_lat' ] : '';		
		$data_attr[ 'data-map-lng' ]		  			  = ( $params[ 'map_lng' ] )          				? $params[ 'map_lng' ] : '';			
				
		$data_attr[ 'data-map-basic-marker-title' ]    	  = ( $params[ 'map_basic_marker_title' ] )			? $params[ 'map_basic_marker_title' ] : '';
		$data_attr[ 'data-map-basic-marker-content' ]  	  = ( $params[ 'map_basic_marker_content' ] )		? $params[ 'map_basic_marker_content' ] : '';
		$data_attr[ 'data-map-basic-marker-icon-enable' ] = ( $params[ 'map_basic_marker_icon_enable' ] )	? $params[ 'map_basic_marker_icon_enable' ] : '';
		$data_attr[ 'data-map-basic-marker-icon' ]    	  = ( $params[ 'map_basic_marker_icon' ] ) 			? $params[ 'map_basic_marker_icon' ][ 'url' ]  : '';
		$data_attr[ 'data-map-basic-marker-icon-width' ]  = ( $params[ 'map_basic_marker_icon_width' ] ) 	? $params[ 'map_basic_marker_icon_width' ][ 'size' ] : '';
		$data_attr[ 'data-map-basic-marker-icon-height' ] = ( $params[ 'map_basic_marker_icon_height' ] )	? $params[ 'map_basic_marker_icon_height' ][ 'size' ]	:	'';
		$data_attr[ 'data-map-zoom' ]    	  			  = ( $params[ 'map_zoom' ] )         				? $params[ 'map_zoom' ] : '';
			
		$data_attr[ 'data-map-theme' ]					  = urlencode( json_encode( $this->get_map_theme( $params ) ) );
		$data_attr[ 'data-map-markers' ]				  = urlencode( json_encode( $params[ 'map_markers' ] ) );	

		$data_attr[ 'data-map-streeview-control' ]		  = ( $params[ 'map_streeview_control' ] ) 			? 'true': 'false';
		$data_attr[ 'data-map-type-control'	]			  = ( $params[ 'map_type_control' ] ) 				? 'true': 'false';
		$data_attr[ 'data-map-zoom-control' ]		   	  = ( $params[ 'map_zoom_control' ] ) 				? 'true': 'false';
		$data_attr[ 'data-map-fullscreen-control' ]		  = ( $params[ 'map_fullscreen_control' ] ) 		? 'true': 'false';
		$data_attr[ 'data-map-scroll-zoom' ]			  = ( $params[ 'map_scroll_zoom' ] ) 				? 'true': 'false';
		
		
		return $data_attr;

	}	

	
	protected function get_map_theme( $params ) {

		if( $params[ 'map_theme_source' ] == 'custom' ) {
			return strip_tags( $params[ 'map_custom_style' ] );
		} else {

			$themes = $this->get_google_map_themes();

			if( isset( $themes[ $params[ 'map_theme_source' ] ] [ $params[ 'map_gstandards' ] ] ) ) {
				return $themes[ $params[ 'map_theme_source' ] ] [ $params[ 'map_gstandards' ] ];
			} elseif( isset( $themes[ $params[ 'map_theme_source' ] ] [ $params[ 'map_snazzymaps' ]  ] ) ) {
				return $themes[ $params[ 'map_theme_source' ] ] [ $params[ 'map_snazzymaps' ] ];
			} else {
				return '';
			}
		}

	}

	protected function get_google_map_themes() {

		return [
			'gstandard'     => [
				'standard'  => '[]',
				'silver'    => '[{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]',
				'retro'     => '[{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}]',
				'dark'      => '[{"elementType":"geometry","stylers":[{"color":"#212121"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#212121"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#757575"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"administrative.land_parcel","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#181818"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"color":"#1b1b1b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8a8a8a"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#373737"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#3c3c3c"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#3d3d3d"}]}]',
				'night'     => '[{"elementType":"geometry","stylers":[{"color":"#242f3e"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#746855"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#242f3e"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#263c3f"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#6b9a76"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#38414e"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#212a37"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9ca5b3"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#746855"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#1f2835"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#f3d19c"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2f3948"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#17263c"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#515c6d"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#17263c"}]}]',
				'aubergine' => '[{"elementType":"geometry","stylers":[{"color":"#1d2c4d"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#8ec3b9"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#1a3646"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#64779e"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#334e87"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#023e58"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#283d6a"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#6f9ba5"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#023e58"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#3C7680"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#304a7d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2c6675"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#255763"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#b0d5ce"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#023e58"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#283d6a"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#3a4762"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0e1626"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#4e6d70"}]}]'
			],
			'snazzymaps'    => [
				'default'   => '[]',
				'simple'        => '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#6195a0"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":"0"},{"saturation":"0"},{"color":"#f5f5f2"},{"gamma":"1"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"lightness":"-3"},{"gamma":"1.00"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#bae5ce"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fac9a9"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"labels.icon","stylers":[{"hue":"#0a00ff"},{"saturation":"-77"},{"gamma":"0.57"},{"lightness":"0"}]},{"featureType":"transit.station.rail","elementType":"labels.text.fill","stylers":[{"color":"#43321e"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"hue":"#ff6c00"},{"lightness":"4"},{"gamma":"0.75"},{"saturation":"-68"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c7eced"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":"-49"},{"saturation":"-53"},{"gamma":"0.79"}]}]',
				'colorful'      => '[{"featureType":"all","elementType":"all","stylers":[{"color":"#ff7000"},{"lightness":"69"},{"saturation":"100"},{"weight":"1.17"},{"gamma":"2.04"}]},{"featureType":"all","elementType":"geometry","stylers":[{"color":"#cb8536"}]},{"featureType":"all","elementType":"labels","stylers":[{"color":"#ffb471"},{"lightness":"66"},{"saturation":"100"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"weight":2},{"gamma":0.8}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"lightness":"-8"},{"gamma":"0.98"},{"weight":"2.45"},{"saturation":"26"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20},{"color":"#ecc080"}]}]',
				'complex'       => '[{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}]',
				'dark'          => '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]',
				'greyscale'     => '[{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]',
				'light'         => '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#6195a0"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#e6f3d6"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#f4d2c5"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#f4f4f4"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#eaf6f8"}]}]',
				'monochrome'    => '[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]',
				'nolabels'      => '[{"elementType":"labels","stylers":[{"visibility":"off"},{"color":"#f49f53"}]},{"featureType":"landscape","stylers":[{"color":"#f9ddc5"},{"lightness":-7}]},{"featureType":"road","stylers":[{"color":"#813033"},{"lightness":43}]},{"featureType":"poi.business","stylers":[{"color":"#645c20"},{"lightness":38}]},{"featureType":"water","stylers":[{"color":"#1994bf"},{"saturation":-69},{"gamma":0.99},{"lightness":43}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#f19f53"},{"weight":1.3},{"visibility":"on"},{"lightness":16}]},{"featureType":"poi.business"},{"featureType":"poi.park","stylers":[{"color":"#645c20"},{"lightness":39}]},{"featureType":"poi.school","stylers":[{"color":"#a95521"},{"lightness":35}]},{},{"featureType":"poi.medical","elementType":"geometry.fill","stylers":[{"color":"#813033"},{"lightness":38},{"visibility":"off"}]},{},{},{},{},{},{},{},{},{},{},{},{"elementType":"labels"},{"featureType":"poi.sports_complex","stylers":[{"color":"#9e5916"},{"lightness":32}]},{},{"featureType":"poi.government","stylers":[{"color":"#9e5916"},{"lightness":46}]},{"featureType":"transit.station","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","stylers":[{"color":"#813033"},{"lightness":22}]},{"featureType":"transit","stylers":[{"lightness":38}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#f19f53"},{"lightness":-10}]},{},{},{}]',
				'twotone'       => '[{"stylers":[{"hue":"#007fff"},{"saturation":89}]},{"featureType":"water","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]}]',
			]
		];

	}

	protected function get_alignment( $align ) {
		
		if( $align == 'left' ) { return ''; }

		return $align == 'center' 
			? esc_attr('margin-left:auto;margin-right:auto;text-align:center;' )
			: esc_attr('margin-left:auto;margin-right:0;text-align:right;');

	}

	
}

Plugin::instance()->widgets_manager->register( new Elementor_Widget_Kraft_Google_Map() );
