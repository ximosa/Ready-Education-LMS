<?php
/**
 * Top Bar setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Top Bar 1 General
$this->sections['edukul_topbar_general_one'] = array(
	'title' => esc_html__( 'General', 'edukul' ),
	'panel' => 'edukul_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_one_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_one_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'edukul' ),
					'0.9' => esc_html__( '0.9', 'edukul' ),
					'0.8' => esc_html__( '0.8', 'edukul' ),
					'0.7' => esc_html__( '0.7', 'edukul' ),
					'0.6' => esc_html__( '0.6', 'edukul' ),
					'0.5' => esc_html__( '0.5', 'edukul' ),
					'0.4' => esc_html__( '0.4', 'edukul' ),
					'0.3' => esc_html__( '0.3', 'edukul' ),
					'0.2' => esc_html__( '0.2', 'edukul' ),
					'0.1' => esc_html__( '0.1', 'edukul' ),
					'0.0001' => esc_html__( '0', 'edukul' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_one_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_border_width',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'top_bar_one_border_color',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'border-color',
			),
		),
	),
);

// Top Bar 2 General
$this->sections['edukul_topbar_general_two'] = array(
	'title' => esc_html__( 'General', 'edukul' ),
	'panel' => 'edukul_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_two_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_two_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'edukul' ),
					'0.9' => esc_html__( '0.9', 'edukul' ),
					'0.8' => esc_html__( '0.8', 'edukul' ),
					'0.7' => esc_html__( '0.7', 'edukul' ),
					'0.6' => esc_html__( '0.6', 'edukul' ),
					'0.5' => esc_html__( '0.5', 'edukul' ),
					'0.4' => esc_html__( '0.4', 'edukul' ),
					'0.3' => esc_html__( '0.3', 'edukul' ),
					'0.2' => esc_html__( '0.2', 'edukul' ),
					'0.1' => esc_html__( '0.1', 'edukul' ),
					'0.0001' => esc_html__( '0', 'edukul' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_two_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_border_width',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'top_bar_two_border_color',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'border-color',
			),
		),
	),
);

// Top Bar Content
$this->sections['edukul_topbar_content'] = array(
	'title' => esc_html__( 'Content', 'edukul' ),
	'panel' => 'edukul_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_content_phone',
			'default' => '(+1) 212-946-2707',
			'control' => array(
				'label' => esc_html__( 'Phone', 'edukul' ),
				'type' => 'edukul_textarea',
				'rows' => 3,
				'active_callback' => 'edukul_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_email',
			'default' => 'info@Edukul.com',
			'control' => array(
				'label' => esc_html__( 'Email', 'edukul' ),
				'type' => 'edukul_textarea',
				'rows' => 3,
				'active_callback' => 'edukul_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_address',
			'default' => '112 W 34th St, New York',
			'control' => array(
				'label' => esc_html__( 'Address', 'edukul' ),
				'type' => 'edukul_textarea',
				'rows' => 3,
				'active_callback' => 'edukul_cac_has_topbar',
			),
		),
	),
);

// Top Bar Socials
$this->sections['edukul_topbar_social'] = array(
	'title' => esc_html__( 'Social', 'edukul' ),
	'panel' => 'edukul_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_social_text',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Text', 'edukul' ),
				'type' => 'edukul_textarea',
				'rows' => 3,
				'active_callback' => 'edukul_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_social_space_between',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Space Between Items', 'edukul' ),
				'description' => esc_html__( 'Example: 10px.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar',
			),
			'inline_css' => array(
				'target' => '#top-bar .top-bar-socials .icons a',
				'alter' => 'margin-left',
			),
		),
		array(
			'id' => 'top_bar_social_font_size',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Icon Size', 'edukul' ),
				'description' => esc_html__( 'Example: 20px.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_topbar',
			),
			'inline_css' => array(
				'target' => '#top-bar .top-bar-socials .icons a',
				'alter' => 'font-size',
			),
		),
	),
);

// Social settings
$social_options = edukul_topbar_social_options();
foreach ( $social_options as $key => $val ) {
	$this->sections['edukul_topbar_social']['settings'][] = array(
		'id' => 'top_bar_social_profiles[' . $key .']',
		'control' => array(
			'label' => $val['label'],
			'type' => 'text',
			'active_callback' => 'edukul_cac_has_topbar',
		),
	);
}

// Remove var from memory
unset( $social_options );