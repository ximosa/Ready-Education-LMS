<?php
/**
 * Metabox Options
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return the registered-widget array
function edukul_get_widget_registered() {
	global $wp_registered_sidebars;

	$widgets_areas = array();
	if ( ! empty( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $widget_area ) {
			$name = isset ( $widget_area['name'] ) ? $widget_area['name'] : '';
			$id = isset ( $widget_area['id'] ) ? $widget_area['id'] : '';
			if ( $name && $id ) {
				$widgets_areas[$id] = $name;
			}
		}
	}

	return $widgets_areas;
}

// Return the all-widget array
function edukul_get_widget_mods() {
	$new_arr = array();
	$widget_areas_mod = edukul_get_mod( 'widget_areas' );
	
	if (is_array($widget_areas_mod) || is_object($widget_areas_mod)) {
		foreach( $widget_areas_mod as $key ) {
			$new_arr[sanitize_key($key)] = $key;
		}
	}
	
	$widget_areas = edukul_get_widget_registered() + $new_arr;

	return $widget_areas;
}

// Registering meta boxes. Using Meta Box plugin: https://metabox.io/
function edukul_register_meta_boxes( $meta_boxes ) {

	// Custom Thumbnail
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Custom Thumbnail', 'edukul' ),
		'id'     => 'opt-meta-box-custom-thumbnail',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Image', 'edukul' ),
			    'type' => 'single_image',
			    'id'   => 'custom_thumbnail',
			),
			array(
				'name'    => esc_html__( 'Custom Thumbnail: Cropping', 'edukul' ),
				'id'      => 'custom_thumbnail_crop',
				'type'    => 'select',
				'options' => array(
					'square' => esc_html__( '740 x 740', 'edukul' ),
					'rectangle' => esc_html__( '740 x 500', 'edukul' ),
					'rectangle2' => esc_html__( '570 x 350', 'edukul' ),
					'rectangle3' => esc_html__( '570 x 730', 'edukul' ),
				),
				'std'     => 'square',
			),
		),
	);

	// Post Format Gallery
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'edukul' ),
		'id'     => 'opt-meta-box-post-format-gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'edukul' ),
				'id'   => 'gallery_images',
				'type' => 'image_advanced',
			),
		),
	);

	// Post Format Video
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo...)', 'edukul' ),
		'id'     => 'opt-meta-box-post-format-video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'edukul' ),
				'id'   => 'video_url',
				'type' => 'textarea',
			),
		)
	);

	// Partner
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Partner Settings', 'edukul' ),
		'id'     => 'opt-meta-box-partner',
		'pages'  => array( 'partner' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hyperlink', 'edukul' ),
				'id'   => 'partner_hyperlink',
				'type'       => 'text',
				'desc'  => esc_html__( "Partne's URL. Leave blank to disable (please 'http://' included).", 'edukul' )
			),
		)
	);

	// Gallery
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Gallery Settings', 'edukul' ),
		'id'     => 'opt-meta-box-gallery',
		'pages'  => array( 'gallery' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Title', 'edukul' ),
				'id'   => 'title',
				'type' => 'textarea',
			),
		)
	);

	// Courses
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Course Information', 'edukul' ),
		'id'     => 'opt-meta-box-course',
		'pages'  => array( EDR_PT_COURSE ),
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => esc_html__( 'Start Course', 'edukul' ),
				'id'   => 'start',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Duration', 'edukul' ),
				'id'   => 'duration',
				'type' => 'text',
			),
		)
	);

	// Lesson
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Lesson Information', 'edukul' ),
		'id'     => 'opt-meta-box-lesson',
		'pages'  => array( EDR_PT_LESSON ),
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => esc_html__( 'Duration', 'edukul' ),
				'id'   => 'lesson_duration',
				'type' => 'text',
			),
		)
	);

	// Event
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Event Settings', 'edukul' ),
		'id'     => 'opt-meta-box-event',
		'pages'  => array( 'event' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Title', 'edukul' ),
				'id'   => 'event_title',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Description', 'edukul' ),
				'id'   => 'event_desc',
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Location', 'edukul' ),
				'id'   => 'event_location',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Date', 'edukul' ),
				'id'   => 'event_date',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Time', 'edukul' ),
				'id'   => 'event_time',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Phone', 'edukul' ),
				'id'   => 'event_phone',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Custom Image', 'edukul' ),
			    'type' => 'single_image',
			    'id'   => 'event_image',
			),
			array(
				'name'    => esc_html__( 'Custom Image: Cropping', 'edukul' ),
				'id'      => 'event_image_crop',
				'type'    => 'select',
				'options' => array(
					'square' => esc_html__( '740 x 740', 'edukul' ),
					'rectangle' => esc_html__( '740 x 500', 'edukul' ),
					'rectangle2' => esc_html__( '570 x 350', 'edukul' ),
					'rectangle3' => esc_html__( '570 x 730', 'edukul' ),
				),
				'std'     => 'square',
			),
		)
	);

	// Member
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Member Information', 'edukul' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'member' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Link', 'edukul' ),
				'id'   => 'url',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Name', 'edukul' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'edukul' ),
				'id'   => 'position',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Text', 'edukul' ),
				'id'   => 'text',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Twitter', 'edukul' ),
				'id'   => 'twitter',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Facebook', 'edukul' ),
				'id'   => 'facebook',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'edukul' ),
				'id'   => 'linkedin',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'edukul' ),
				'id'   => 'instagram',
				'type'       => 'text',
			),
		)
	);

	// Testimonials
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Testimonials Information', 'edukul' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'testimonials' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'edukul' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'edukul' ),
				'id'   => 'position',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Text', 'edukul' ),
				'id'   => 'text',
				'type' => 'textarea',
			),
		)
	);

	// Top Bar Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Top-Bar Settings', 'edukul' ),
		'id'     => 'opt-meta-box-top-bar',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Style', 'edukul' ),
				'id'      => 'top_bar_style',
				'type'    => 'select',
				'options' => array(
					'hide' => esc_html__( 'Hide', 'edukul' ),
					'style-1' => esc_html__( 'Light', 'edukul' ),
					'style-2' => esc_html__( 'Blue', 'edukul' ),
				),
				'std'     => 'hide',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'edukul' ),
			    'id'	=> 'top_bar_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'edukul' ),
				'id'   => 'top_bar_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'edukul' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'edukul' ),
			    'id'	=> 'top_bar_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
		)
	);

	// Header Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Header Settings', 'edukul' ),
		'id'     => 'opt-meta-box-header',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Logo', 'edukul' ),
			    'type' => 'single_image',
			    'id'   => 'custom_header_logo',
			),
			array(
				'name'    => esc_html__( 'Style', 'edukul' ),
				'id'      => 'header_style',
				'type'    => 'select',
				'options' => array(
					'style-1' => esc_html__( 'Dark-Text', 'edukul' ),
					'style-2' => esc_html__( 'Light-Text', 'edukul' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'edukul' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'edukul' ),
				),
				'std'     => 'style-1',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'edukul' ),
			    'id'	=> 'header_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'edukul' ),
				'id'   => 'header_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'edukul' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'edukul' ),
			    'id'	=> 'header_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name'    => esc_html__( 'Current Menu Link', 'edukul' ),
				'id'      => 'menu_link_current',
				'type'    => 'select',
				'options' => array(
					'cur-menu-1' => esc_html__( 'Style 1', 'edukul' ),
					'cur-menu-2' => esc_html__( 'Style 2', 'edukul' ),
				),
				'std'     => 'cur-menu-1',
			),
		)
	);

	// Featured Title Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Featured Title Settings', 'edukul' ),
		'id'     => 'opt-meta-box-featured-title',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide?', 'edukul' ),
				'id'   => 'hide_featured_title',
				'type' => 'checkbox',
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'edukul' ),
				'id'		=>	'featured_title_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Title', 'edukul' ),
				'id'		=>	'custom_featured_title',
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Sub-Title', 'edukul' ),
				'id'		=>	'custom_featured_subtitle',
			),
		)
	);

	// Main Content Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Main Content Settings', 'edukul' ),
		'id'     => 'opt-meta-box-main-content',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Layout Position', 'edukul' ),
				'id'      => 'page_layout',
				'type'    => 'image_select',
				'options' => array(
					'no-sidebar'  => get_template_directory_uri() . '/assets/admin/img/full-content.png',
					'sidebar-left'  => get_template_directory_uri() . '/assets/admin/img/sidebar-left.png',
					'sidebar-right' => get_template_directory_uri() . '/assets/admin/img/sidebar-right.png',
				),
				'std' 		=> 'no-sidebar',
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'edukul' ),
				'id'      => 'page_sidebar',
				'type'    => 'select',
				'options' => edukul_get_widget_mods(),
				'std'     => 'sidebar-page',
				'desc'    => esc_html__( 'This option do not apply if Layout Position is full-width.', 'edukul' )
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'edukul' ),
				'id'		=>	'main_content_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'name' => esc_html__( 'Remove: Top & Bottom Padding?', 'edukul' ),
				'id'   => 'hide_padding_content',
				'type' => 'checkbox',
			),
		)
	);

	// Footer Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Footer Settings', 'edukul' ),
		'id'     => 'opt-meta-box-footer',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide: Footer?', 'edukul' ),
				'id'   => 'hide_footer',
				'type' => 'checkbox',
			),
			array(
			    'name'          => 'Footer Widget: Background',
			    'id'            => 'footer_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
			    'name'          => 'Bottom Bar: Background',
			    'id'            => 'bottom_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
				'name' => esc_html__( 'Hide: Line Footer?', 'edukul' ),
				'id'   => 'hide_line_footer',
				'type' => 'checkbox',
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'edukul_register_meta_boxes' );

// Enqueue script for handling actions with meta boxes
function edukul_admin_filter_meta_box() {
	wp_enqueue_script( 'edukul-metabox-script', get_template_directory_uri() . '/assets/admin/js/meta-boxes.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'edukul_admin_filter_meta_box' );