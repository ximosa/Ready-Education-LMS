<?php
/**
 * General setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Accent Colors
$this->sections['edukul_accent_colors'] = array(
	'title' => esc_html__( 'Accent Colors', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'accent_color',
			'default' => '#ff9900',
			'control' => array(
				'label' => esc_html__( 'Accent Color', 'edukul' ),
				'type' => 'color',
			),
		),
	)
);

// Favicon
$this->sections['edukul_favicon'] = array(
	'title' => esc_html__( 'Favicon', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'favicon',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Site Icon', 'edukul' ),
				'type' => 'image',
				'description' => esc_html__( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512 pixels wide and tall.', 'edukul' ),
			),
		),
	)
);

// PreLoader
$this->sections['edukul_preloader'] = array(
	'title' => esc_html__( 'PreLoader', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'preloader',
			'default' => 'animsition',
			'control' => array(
				'label' => esc_html__( 'Preloader Option', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'animsition' => esc_html__( 'Enable','edukul' ),
					'' => esc_html__( 'Disable','edukul' )
				),
			),
		),
	)
);

// Top Bar Site
$this->sections['edukul_topbar_site'] = array(
	'title' => esc_html__( 'Top Bar Site', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'top_bar_site_style',
			'default' => 'hide',
			'control' => array(
				'label' => esc_html__( 'Top Bar Style', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'hide' => esc_html__( 'Hide', 'edukul' ),
					'style-1' => esc_html__( 'Light', 'edukul' ),
					'style-2' => esc_html__( 'Blue', 'edukul' ),
				),
				'desc' => esc_html__( 'Top Bar Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'edukul' )
			),
		),
	),
);

// Header Site
$this->sections['edukul_header_site'] = array(
	'title' => esc_html__( 'Header Site', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'header_site_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Header Style', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Dark-Text', 'edukul' ),
					'style-2' => esc_html__( 'Light-Text', 'edukul' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'edukul' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'edukul' ),
				),
				'desc' => esc_html__( 'Header Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'edukul' )
			),
		),
		array(
			'id' => 'header_fixed',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Header Fixed: Enable', 'edukul' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Scroll to top
$this->sections['edukul_scroll_top'] = array(
	'title' => esc_html__( 'Scroll Top Button', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'scroll_top',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'edukul' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Forms
$this->sections['edukul_general_forms'] = array(
	'title' => esc_html__( 'Forms', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		array(
			'id' => 'input_border_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Rounded', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'input_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'input_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'input_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'edukul' ),
				'description' => esc_html__( 'Enter a value in pixels. Example: 1px', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'input_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'color',
			),
		),
	),
);

// Responsive
$this->sections['edukul_responsive'] = array(
	'title' => esc_html__( 'Responsive', 'edukul' ),
	'panel' => 'edukul_general',
	'settings' => array(
		// Top Bar
		array(
			'id' => 'heading_top_bar',
			'control' => array(
				'type' => 'edukul-heading',
				'label' => esc_html__( 'Top Bar', 'edukul' ),
			),
		),
		array(
			'id' => 'mobile_hide_top_bar',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Hide: Top Bar on Mobile', 'edukul' ),
				'type' => 'checkbox',
			),
		),
		// Mobile Logo
		array(
			'id' => 'heading_mobile_logo',
			'control' => array(
				'type' => 'edukul-heading',
				'label' => esc_html__( 'Mobile Logo', 'edukul' ),
			),
		),
		array(
			'id' => 'mobile_logo_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Width', 'edukul' ),
				'description' => esc_html__( 'Example: 150px', 'edukul' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo',
				'alter' => 'max-width',
			),
		),
		array(
			'id' => 'mobile_logo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Margin', 'edukul' ),
				'description' => esc_html__( 'Example: 20px 0px 20px 0px', 'edukul' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo-inner',
				'alter' => 'margin',
			),
		),
		// Mobile Menu
		array(
			'id' => 'heading_mobile_menu',
			'control' => array(
				'type' => 'edukul-heading',
				'label' => esc_html__( 'Mobile Menu', 'edukul' ),
			),
		),
		array(
			'id' => 'mobile_menu_item_height',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Height', 'edukul' ),
				'description' => esc_html__( 'Example: 40px', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'#main-nav-mobi ul > li > a',
					'#main-nav-mobi .menu-item-has-children .arrow'
				),
				'alter' => 'line-height'
			),
		),
		array(
			'id' => 'mobile_menu_logo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo', 'edukul' ),
				'type' => 'image',
			),
		),
		array(
			'id' => 'mobile_menu_logo_width',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo: Width', 'edukul' ),
				'type' => 'text',
			),
		),
		// Featured Title
		array(
			'id' => 'heading_featured_title',
			'control' => array(
				'type' => 'edukul-heading',
				'label' => esc_html__( 'Mobile Featured Title', 'edukul' ),
			),
		),
		array(
			'id' => 'mobile_featured_title_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'edukul' ),
				'active_callback' => 'edukul_cac_has_featured_title',
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '.header-style-1 #featured-title .inner-wrap, .header-style-2 #featured-title .inner-wrap, .header-style-3 #featured-title .inner-wrap, .header-style-4 #featured-title .inner-wrap	',
				'alter' => 'padding',
			),
		),
	)
);