<?php

$this->sections[] = array(
	'icon' => 'dashicons dashicons-share',
	'title' => esc_html__( 'Social Media', 'kraft' ),
	'heading' => '',
	'fields' => array(
		array(
			'id' => 'info_social',
			'type' => 'info',
			'title' => esc_html__( 'Enter your social network link. Please include "http://" or "https://" in the URL.', 'kraft' ),			
		),	
		array(
			'id' => 'url-fab-fa-facebook-f',
			'type' => 'text',
			'title' => esc_html__( 'Facebook URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Facebook URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-twitter',
			'type' => 'text',
			'title' => esc_html__( 'Twitter URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Twitter URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-x-twitter',
			'type' => 'text',
			'title' => esc_html__( 'X Twitter URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your X Twitter URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-google-plus-g',
			'type' => 'text',
			'title' => esc_html__( 'Google+ URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Google+ URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-linkedin-in',
			'type' => 'text',
			'title' => esc_html__( 'Linkedin URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Linkedin URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-tumblr',
			'type' => 'text',
			'title' => esc_html__( 'Tumblr URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Tumblr URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-dribbble',
			'type' => 'text',
			'title' => esc_html__( 'Dribbble URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Dribbble URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-pinterest-p',
			'type' => 'text',
			'title' => esc_html__( 'Pinterest URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Pinterest URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-youtube',
			'type' => 'text',
			'title' => esc_html__( 'Youtube URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Youtube URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-vimeo-square',
			'type' => 'text',
			'title' => esc_html__( 'Vimeo URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Vimeo URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-flickr',
			'type' => 'text',
			'title' => esc_html__( 'Flickr URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Flickr URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-github',
			'type' => 'text',
			'title' => esc_html__( 'Github URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Github URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-instagram',
			'type' => 'text',
			'title' => esc_html__( 'Instagram', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Instagram URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-dropbox',
			'type' => 'text',
			'title' => esc_html__( 'Dropbox', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Dropbox URL.', 'kraft' ),
			'default' => ''
		),				
		array(
			'id' => 'url-far-fa-envelope',
			'type' => 'text',
			'title' => esc_html__( 'Mail', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter the email eg. mail:abc@gmail.com.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-skype',
			'type' => 'text',
			'title' => esc_html__( 'Skype', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Skype URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-behance',
			'type' => 'text',
			'title' => esc_html__( 'Behance', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Behance URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-soundcloud',
			'type' => 'text',
			'title' => esc_html__( 'Soundcloud', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your soundcloud URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-stack-overflow',
			'type' => 'text',
			'title' => esc_html__( 'StackOverflow URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your StackOverflow URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-stack-exchange',
			'type' => 'text',
			'title' => esc_html__( 'StackExchange URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your StackExchange URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-xing',
			'type' => 'text',
			'title' => esc_html__( 'Xing URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Xing URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-imdb',
			'type' => 'text',
			'title' => esc_html__( 'IMDb URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your IMDb URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-medium',
			'type' => 'text',
			'title' => esc_html__( 'Medium URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your Medium URL.', 'kraft' ),
			'default' => ''
		),
		array(
			'id' => 'url-fab-fa-weixin',
			'type' => 'text',
			'title' => esc_html__( 'WeChat URL', 'kraft' ),
			'subtitle' => esc_html__( 'Please enter your WeChat url.', 'kraft' ),
			'default' => ''
		)
	)
);
