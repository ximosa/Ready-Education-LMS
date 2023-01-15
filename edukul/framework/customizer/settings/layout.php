<?php
/**
 * Layout setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Layout Style
$this->sections['edukul_layout_style'] = array(
	'title' => esc_html__( 'Layout Site', 'edukul' ),
	'panel' => 'edukul_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_style',
			'default' => 'full-width',
			'control' => array(
				'label' => esc_html__( 'Layout Style', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'full-width' => esc_html__( 'Full Width','edukul' ),
					'boxed' => esc_html__( 'Boxed','edukul' )
				),
			),
		),
		array(
			'id' => 'site_layout_boxed_shadow',
			'control' => array(
				'label' => esc_html__( 'Box Shadow', 'edukul' ),
				'type' => 'checkbox',
				'active_callback' => 'edukul_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'site_layout_wrapper_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Wrapper Margin', 'edukul' ),
				'desc' => esc_html__( 'Top Right Bottom Left. Default: 30px 0px 30px 0px.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'wrapper_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Outer Background Color', 'edukul' ),
				'type' => 'color',
				'active_callback' => 'edukul_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'wrapper_background_img',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image', 'edukul' ),
				'type' => 'image',
				'active_callback' => 'edukul_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'wrapper_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image Style', 'edukul' ),
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
				'active_callback' => 'edukul_cac_has_boxed_layout',
			),
		),
	),
);

// Layout Position
$this->sections['edukul_layout_position'] = array(
	'title' => esc_html__( 'Layout Position', 'edukul' ),
	'panel' => 'edukul_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Site Layout Position', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'edukul' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'edukul' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'edukul' ),
				),
				'desc' => esc_html__( 'Specify layout for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'edukul' )
			),
		),
		array(
			'id' => 'single_post_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Single Post Layout Position', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'edukul' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'edukul' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'edukul' ),
				),
				'desc' => esc_html__( 'Specify layout for all single post pages.', 'edukul' )
			),
		),
	),
);

// Layout Widths
$this->sections['edukul_layout_widths'] = array(
	'title' => esc_html__( 'Layout Widths', 'edukul' ),
	'panel' => 'edukul_layout',
	'settings' => array(
		array(
			'id' => 'site_desktop_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Container', 'edukul' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default: 1170px', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array( 
					'.site-layout-full-width .edukul-container',
					'.site-layout-boxed #page'
				),
				'alter' => 'width',
			),
		),
		array(
			'id' => 'left_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Content', 'edukul' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 66%', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '#site-content',
				'alter' => 'width',
			),
		),
		array(
			'id' => 'sidebar_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Sidebar', 'edukul' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 28%', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '#sidebar',
				'alter' => 'width',
			),
		),
	),
);