<?php
/**
 * Shop setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Shop
$this->sections['edukul_shop_general'] = array(
	'title' => esc_html__( 'Main Shop', 'edukul' ),
	'panel' => 'edukul_shop',
	'settings' => array(
		array(
			'id' => 'shop_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Layout Position', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'edukul' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'edukul' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'edukul' ),
				),
				'desc' => esc_html__( 'Specify layout for main shop page.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title',
			'default' => esc_html__( 'Our Shop', 'edukul' ),
			'control' => array(
				'label' => esc_html__( 'Shop: Featured Title', 'edukul' ),
				'type' => 'edukul_textarea',
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop: Featured Title Background', 'edukul' ),
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_products_per_page',
			'default' => 6,
			'control' => array(
				'label' => esc_html__( 'Products Per Page', 'edukul' ),
				'type' => 'number',
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_columns',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Shop Columns', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_item_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Bottom Margin', 'edukul' ),
				'description' => esc_html__( 'Example: 30px.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_woo',
			),
			'inline_css' => array(
				'target' => '.products li',
				'alter' => 'margin-top',
			),
		),
	),
);

// Single Shop
$this->sections['edukul_single_shop_general'] = array(
	'title' => esc_html__( 'Single Shop', 'edukul' ),
	'panel' => 'edukul_shop',
	'settings' => array(
		array(
			'id' => 'shop_single_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Single Layout Position', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'edukul' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'edukul' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'edukul' ),
				),
				'desc' => esc_html__( 'Specify layout on the shop single page.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title',
			'default' => esc_html__( 'Our Shop', 'edukul' ),
			'control' => array(
				'label' => esc_html__( 'Shop Single: Featured Title', 'edukul' ),
				'type' => 'text',
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop Single: Featured Title Background', 'edukul' ),
				'active_callback' => 'edukul_cac_has_woo',
			),
		),
	),
);