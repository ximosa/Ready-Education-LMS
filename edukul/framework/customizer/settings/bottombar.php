<?php
/**
 * Bottom Bar setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bottom Bar General
$this->sections['edukul_bottombar_general'] = array(
	'title' => esc_html__( 'General', 'edukul' ),
	'panel' => 'edukul_bottombar',
	'settings' => array(
		array(
			'id' => 'bottom_bar',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'edukul' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'bottom_copyright',
			'transport' => 'postMessage',
			'default' => '&copy; Edukul - Education WordPress Theme. All Rights Reserved.',
			'control' => array(
				'label' => esc_html__( 'Copyright', 'edukul' ),
				'type' => 'edukul_textarea',
				'active_callback' => 'edukul_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_padding',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'edukul' ),
				'active_callback'=> 'edukul_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'bottom_background',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'edukul' ),
				'active_callback'=> 'edukul_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'background',
			),
		),
		array(
			'id' => 'bottom_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'edukul' ),
				'active_callback' => 'edukul_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_background_img_style',
			'default' => 'repeat',
			'control' => array(
				'label' => esc_html__( 'Background Image Style', 'edukul' ),
				'type'  => 'image',
				'type'  => 'select',
				'choices' => array(
					''             => esc_html__( 'Default', 'edukul' ),
					'cover'        => esc_html__( 'Cover', 'edukul' ),
					'center-top'        => esc_html__( 'Center Top', 'edukul' ),
					'fixed-top'    => esc_html__( 'Fixed Top', 'edukul' ),
					'fixed'        => esc_html__( 'Fixed Center', 'edukul' ),
					'fixed-bottom' => esc_html__( 'Fixed Bottom', 'edukul' ),
					'repeat'       => esc_html__( 'Repeat', 'edukul' ),
					'repeat-x'     => esc_html__( 'Repeat-x', 'edukul' ),
					'repeat-y'     => esc_html__( 'Repeat-y', 'edukul' ),
				),
				'active_callback' => 'edukul_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'edukul' ),
				'active_callback'=> 'edukul_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'line_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Line Color', 'edukul' ),
				'active_callback'=> 'edukul_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap:before',
				'alter' => 'background-color',
			),
		),
	),
);