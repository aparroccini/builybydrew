<?php
$output = '';
extract( shortcode_atts( array(	
    'zoom'					=>	'10',
	'map_height'			=>  '400px',	
	'map_width'				=>  '100%',	
    'latitude'				=>	'',
    'longitude'				=>	'',		
	'map_marker'			=>  '',	
), $atts ) );

wp_enqueue_script( 'google-map' );	 

$map_style = '';

if ( $map_height ) {
	$map_style = 'width:'.$map_width.';height:'.$map_height;
}

if ( $map_style ) {	
	$map_style = 'style = '.esc_attr( $map_style );
}

$map_id = rand( 0, 100 );

$output .= '<div class="map-block" '.$map_style.'>';
$output .= '<div id="googleMap_'.$map_id.'" class="google-map" data-zoom="'.esc_attr( $zoom ).'" data-latitude="'.esc_attr( $latitude ).'" data-longitude="'.esc_attr( $longitude ).'" data-mapmarker="'.wp_get_attachment_url( esc_attr( $map_marker ) ).'"></div>';
$output .= '</div>';

echo $output;