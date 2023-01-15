<?php
/**
 * Blog setting for Customizer
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Blog Posts General
$this->sections['edukul_blog_post'] = array(
	'title' => esc_html__( 'General', 'edukul' ),
	'panel' => 'edukul_blog',
	'settings' => array(
		array(
			'id' => 'blog_featured_title',
			'default' => esc_html__( 'Our News', 'edukul' ),
			'control' => array(
				'label' => esc_html__( 'Blog Featured Title', 'edukul' ),
				'type' => 'text',
			),
		),
		array(
			'id' => 'blog_entry_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Content Background Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.post-content-wrap',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'blog_entry_content_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Content Padding', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'blog_entry_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Bottom Margin', 'edukul' ),
				'description' => esc_html__( 'Example: 30px.', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry',
				'alter' => 'margin-top',
			),
		),
		array(
			'id' => 'blog_entry_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Entry Border Width', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'blog_entry_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Border Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'blog_entry_composer',
			'default' => 'meta,title,excerpt_content,readmore',
			'control' => array(
				'label' => esc_html__( 'Entry Content Elements', 'edukul' ),
				'type' => 'edukul-sortable',
				'object' => 'Edukul_Customize_Control_Sorter',
				'choices' => array(
					'meta'            => esc_html__( 'Meta', 'edukul' ),
					'title'           => esc_html__( 'Title', 'edukul' ),
					'excerpt_content' => esc_html__( 'Excerpt', 'edukul' ),
					'readmore'        => esc_html__( 'Read More', 'edukul' ),

				),
				'desc' => esc_html__( 'Drag and drop elements to re-order.', 'edukul' ),
			),
		),
	),
);

// Blog Posts Title
$this->sections['edukul_blog_post_title'] = array(
	'title' => esc_html__( 'Blog Post - Title', 'edukul' ),
	'panel' => 'edukul_blog',
	'settings' => array(
		array(
			'id' => 'blog_title_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-title a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_title_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color Hover', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Meta
$this->sections['edukul_blog_post_meta'] = array(
	'title' => esc_html__( 'Blog Post - Meta', 'edukul' ),
	'panel' => 'edukul_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_meta_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Meta Margin', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 20px 0.', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta',
				'alter' => 'margin',
			),
		),
		array(
			'id'  => 'blog_entry_meta_items',
			'default' => array( 'author', 'date', 'comments' ),
			'control' => array(
				'label' => esc_html__( 'Meta Items', 'edukul' ),
				'desc' => esc_html__( 'Click and drag and drop elements to re-order them.', 'edukul' ),
				'type' => 'edukul-sortable',
				'object' => 'Edukul_Customize_Control_Sorter',
				'choices' => array(
					'author'     => esc_html__( 'Author', 'edukul' ),
					'date'       => esc_html__( 'Date', 'edukul' ),
					'comments' => esc_html__( 'Comments', 'edukul' ),
					'categories' => esc_html__( 'Categories', 'edukul' ),
				),
			),
		),
		array(
			'id' => 'heading_blog_entry_meta_item',
			'control' => array(
				'type' => 'edukul-heading',
				'label' => esc_html__( 'Item Meta', 'edukul' ),
			),
		),
		array(
			'id' => 'blog_entry_meta_item_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color Hover', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Excerpt
$this->sections['edukul_blog_post_excerpt'] = array(
	'title' => esc_html__( 'Blog Post - Excerpt', 'edukul' ),
	'panel' => 'edukul_blog',
	'settings' => array(
		array(
			'id' => 'blog_content_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Content Style', 'edukul' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Normal', 'edukul' ),
					'style-2' => esc_html__( 'Excerpt', 'edukul' ),
				),
			),
		),
		array(
			'id' => 'blog_excerpt_length',
			'default' => '50',
			'control' => array(
				'label' => esc_html__( 'Excerpt length', 'edukul' ),
				'type' => 'text',
				'desc' => esc_html__( 'This option only apply for Content Style: Excerpt.', 'edukul' )
			),
		),
		array(
			'id' => 'blog_excerpt_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'edukul' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 30px 0.', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_excerpt_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'edukul' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Read More
$this->sections['edukul_blog_post_read_more'] = array(
	'title' => esc_html__( 'Blog Post - Read More', 'edukul' ),
	'panel' => 'edukul_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_button_read_more_text',
			'default' => esc_html__( 'Read More', 'edukul' ),
			'control' => array(
				'label' => esc_html__( 'Button Text', 'edukul' ),
				'type' => 'text',
			),
		),
	),
);

