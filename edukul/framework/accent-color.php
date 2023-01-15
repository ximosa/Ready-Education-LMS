<?php
/**
 * Accent color
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'Edukul_Accent_Color' ) ) {
	class Edukul_Accent_Color {
		// Main constructor
		public function __construct() {
			add_filter( 'edukul_custom_colors_css', array( 'Edukul_Accent_Color', 'generate' ), 1 );
		}

		// Generates arrays of elements to target
		private static function arrays( $return ) {
			// Color
			$texts = apply_filters( 'edukul_accent_texts', array(
				'.text-accent-color',
				'.sticky-post',
				'#top-bar .top-bar-content .content:before',
				'.top-bar-style-1 #top-bar .top-bar-socials .icons a:hover',
				'#site-logo .site-logo-text:hover',
				'#main-nav .sub-menu li a:hover',
				'.search-style-fullscreen .search-submit:hover:after',
				'.header-style-1 #main-nav > ul > li > a:hover',
				'.header-style-1 #main-nav > ul > li.current-menu-item > a',
				'.header-style-1 #main-nav > ul > li.current-menu-parent > a',
				'.header-style-1 #main-nav > ul > li.current-menu-parent > a > span:after',
				'.header-style-1 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-1 #site-header .header-search-trigger:hover',
				'.header-style-2 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-2 #site-header .header-search-trigger:hover',
				'.header-style-3 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-3 #site-header .header-search-trigger:hover',
				'.header-style-4 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-4 #site-header .header-search-trigger:hover',
				'#featured-title #breadcrumbs a:hover',
				'.hentry .post-categories',
				'.hentry .page-links span',
				'.hentry .page-links a span',
				'.hentry .post-title a:hover',
				'.hentry .post-meta a:hover',
				'.hentry .post-meta .item .inner:before',
				'.hentry .post-tags a:hover',
				'.hentry .post-author .author-socials .socials a ',
				'#sidebar .widget.widget_recent_posts h3 a:hover',
				'#footer-widgets .widget.widget_recent_posts h3 a:hover',
				'.related-news .related-post .slick-next:hover:before',
				'.related-news .related-post .slick-prev:hover:before',
				'.widget.widget_archive ul li a:hover',
				'.widget.widget_categories ul li a:hover',
				'.widget.widget_meta ul li a:hover',
				'.widget.widget_nav_menu ul li a:hover',
				'.widget.widget_pages ul li a:hover',
				'.widget.widget_recent_entries ul li a:hover',
				'.widget.widget_recent_comments ul li a:hover',
				'.widget.widget_rss ul li a:hover',
				'#footer-widgets .widget.widget_archive ul li a:hover',
				'#footer-widgets .widget.widget_categories ul li a:hover',
				'#footer-widgets .widget.widget_meta ul li a:hover',
				'#footer-widgets .widget.widget_nav_menu ul li a:hover',
				'#footer-widgets .widget.widget_pages ul li a:hover',
				'#footer-widgets .widget.widget_recent_entries ul li a:hover',
				'#footer-widgets .widget.widget_recent_comments ul li a:hover',
				'#footer-widgets .widget.widget_rss ul li a:hover',
				'#sidebar .widget.widget_calendar caption',
				'#footer-widgets .widget.widget_calendar caption',
				'.widget.widget_nav_menu .menu > li.current-menu-item > a',
				'.widget.widget_nav_menu .menu > li.current-menu-item',
				'#sidebar .widget.widget_calendar tbody #today',
				'#sidebar .widget.widget_calendar tbody #today a',
				'#sidebar .widget_information ul li.accent-icon i',
				'#footer-widgets .widget_information ul li.accent-icon i',
				'#sidebar .widget.widget_twitter .authorstamp:before',
				'#footer-widgets .widget.widget_twitter .authorstamp:before',
				'.widget.widget_search .search-form .search-submit:before',
				'#sidebar .widget.widget_socials .socials a:hover',
				'#footer-widgets .widget.widget_socials .socials a:hover',
				'#sidebar .widget.widget_recent_posts h3 a:hover',
				'#footer-widgets .widget.widget_recent_posts h3 a:hover',
				'.no-results-content .search-form .search-submit:before',

				// shortcodes
				'.edukul-accordions .accordion-item .accordion-heading:hover',
				'.edukul-accordions .accordion-item.style-1.active .accordion-heading > .inner:before',
				'.edukul-accordions .accordion-item.style-2 .accordion-heading > .inner:before',
				'.edukul-links.link-style-1.accent',
				'.edukul-links.link-style-2.accent',
				'.edukul-links.link-style-2.accent > span:before',
				'.edukul-links.link-style-3.accent',
				'.edukul-links.link-style-4.accent',
				'.edukul-links.link-style-4.accent > .text:after',
				'.edukul-links.link-style-5.accent',
				'.edukul-button.outline.outline-accent',
				'.edukul-button.outline.outline-accent .icon',
				'.edukul-counter .icon.accent',
				'.edukul-counter .prefix.accent',
				'.edukul-counter .suffix.accent',
				'.edukul-counter .number.accent',
				'.edukul-divider.has-icon .icon-wrap > span.accent',
				'.edukul-single-heading .heading.accent',
				'.edukul-headings .heading.accent',
				'.edukul-icon.accent > .icon',
				'.edukul-image-box.style-1 .item .title a:hover',
				'.edukul-news .news-item .text-wrap .title a:hover',
				'.edukul-news .post-meta .item:before',
				'#gallery-filter .cbp-filter-item:hover',
				'#gallery-filter .cbp-filter-item.cbp-filter-item-active',
				'.edukul-progress .perc.accent',
				'.member-item .socials li a:hover',
				'.member-item .name a:hover',
				'.edukul-testimonials .position',
				'.edukul-testimonials-group .item .stars',
				'.edukul-list .icon.accent',
				'.edukul-price-table .price-name .heading.accent',
				'.edukul-price-table .price-name .sub-heading.accent',
				'.edukul-price-table .price-figure .currency.accent',
				'.edukul-price-table .price-figure .figure.accent',
				'.edr-course .edr-course__title a:hover',
				'.edr-course .edr_course__meta .category > a',
				'.edr-course .edr_course__info > span:before',
				'.single-course .edr-category .cat a:hover',
				'#course-program .edr-lessons li a:hover',
				'#course-program .edr-lessons li a:active',
				'.course-lesson-sidebar .forward a:hover',
				'.course-lesson-sidebar .edr-lessons li a:hover',
				'.post-navigation .nav-links a .navi:hover',
				'.event-box .meta > span:before',
				'.edukul-events-grid .event-box.style-1 .arrow:after',
				'.edukul-events-grid .event-box.style-4 .title a:hover',
				'.cf7-style-2 .name-wrap:before',
				'.cf7-style-2 .email-wrap:before',
				'.cf7-style-2 .message-wrap:before',
				'.owl-theme .owl-nav [class*="owl-"]:after',
				'.rating-print-wrapper .review-stars + .review-stars',

				 // Woocommerce
				'.woocommerce-page .woocommerce-MyAccount-content .woocommerce-info .button',
				'.products li .product-info .button',
				'.products li .product-info .added_to_cart',
				'.products li .product-cat:hover',
				'.products li h2:hover',
				'.woo-single-post-class .woocommerce-grouped-product-list-item__label a:hover',
				'.woo-single-post-class .summary .product_meta > span a',
				'.woocommerce .shop_table.cart .product-name a:hover',
				'.woocommerce-page .shop_table.cart .product-name a:hover',
				'.woocommerce-MyAccount-navigation ul li li a:hover',
				'.product_list_widget .product-title:hover',
				'.widget_recent_reviews .product_list_widget a:hover',
				'.widget_product_categories ul li a:hover',
				'.widget.widget_product_search .woocommerce-product-search .search-submit:hover:before',
				'.widget_shopping_cart_content ul li a:hover',

				 // Default Link
				 'a',
			) );

			// Background color
			$backgrounds = apply_filters( 'edukul_accent_backgrounds', array(
				'blockquote:before',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'bg-accent',
				'.tparrows.custom:hover',
				'.nav-top-cart-wrapper .shopping-cart-items-count',
				'.slick-dots li:after',
				'.post-media .slick-dots li.slick-active:after',
				'.hentry .post-link a',
				'.hentry .post-tags a:after',
				'.widget_mc4wp_form_widget .mc4wp-form .submit-wrap button',
				'#sidebar .widget.widget_recent_posts .recent-news .thumb.icon',
				'#footer-widgets .widget.widget_recent_posts .recent-news .thumb.icon',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',
				'#scroll-top:hover:before',

				// shortcodes
				'.edukul-accordions .accordion-item.style-2.active .accordion-heading',
				'.edukul-links.link-style-3.accent .line',
				'.edukul-links.link-style-4 .line',
				'.edukul-links.link-style-4.accent .line',
				'.edukul-links.link-style-1.accent > span:after',
				'.edukul-button.accent',
				'.edukul-button.outline.outline-accent:hover',
				'.edukul-content-box > .inner.accent',
				'.edukul-content-box > .inner.dark-accent',
				'.edukul-content-box > .inner.light-accent',
				'.edukul-tabs.style-2 .tab-title .item-title.active',
				'.edukul-tabs.style-3 .tab-title .item-title.active',
				'.edukul-single-heading .line.accent',
				'.edukul-headings .sep.accent',
				'.edukul-headings .heading > span',
				'.edukul-icon.accent-bg > .icon',
				'.edukul-images-carousel.has-borders:after',
				'.edukul-images-carousel.has-borders:before',
				'.edukul-images-carousel.has-arrows.arrow-bottom .owl-nav',
				'#gallery-filter .cbp-filter-item > span:after',
				'.gallery-box .text-wrap .icon a:hover',
				'.edukul-progress .progress-animate.accent',
				'.edukul-video-icon.accent a',
				'.edukul-membership.button-accent .edukul-button',
				'.edr-course .edr-course__category a:hover',
				'#review_form .comment-form input#submit',
				'.cf7-style-1 .name-wrap:before',
				'.cf7-style-1 .email-wrap:before',
				'.cf7-style-1 .courses-wrap:before',
				'.owl-theme .owl-dots .owl-dot span',

				// woocemmerce
				'.woocommerce-page .woo-single-post-class .summary .stock.in-stock',
				'.woocommerce-page .wc-proceed-to-checkout .button',
				'.woocommerce-page .return-to-shop a',
				'.woocommerce-page #payment #place_order',
				'.widget_price_filter .price_slider_amount .button:hover',
			) );

			// Border color
			$borders = apply_filters( 'edukul_accent_borders', array(
				'textarea:focus,input[type="text"]:focus,input[type="password"]:focus,input[type="datetime"]:focus,input[type="datetime-local"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="number"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="search"]:focus,input[type="tel"]:focus,input[type="color"]:focus',
				'.underline-solid:after, .underline-dotted:after, .underline-dashed:after' => array( 'bottom' ),
				'#footer-widgets .widget.widget_search .search-form .search-field[type="search"]:focus',
				'#footer-widgets .widget_mc4wp_form_widget .mc4wp-form .email-wrap input:focus',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',

				// shortcodes
				'.edukul-links.link-style-5.accent' => array( 'bottom' ),
				'.edukul-button.outline.outline-accent',
				'.edukul-button.outline.outline-accent:hover',
				'.divider-icon-before.accent',
				'.divider-icon-after.accent',
				'.edukul-divider.has-icon .divider-double.accent',
				'.edukul-tabs.style-2 .tab-title .item-title.active > span' => array( 'top' ),
				'.edukul-video-icon.white a:after' => array( 'left' ),
				'.edukul-video-icon.accent .circle',
				'.edukul-events-grid .event-box.style-1 .arrow',
				'.cf7-style-1 .right-wrap img',
				'.owl-theme .owl-nav [class*="owl-"]',
				// woocommerce
				'.widget_price_filter .ui-slider .ui-slider-handle',
			) );

			// Gradient color
			$gradients = apply_filters( 'edukul_accent_gradient', array(
				'.edukul-progress .progress-animate.accent.gradient'
			) );

			// Return array
			if ( 'texts' == $return ) {
				return $texts;
			} elseif ( 'backgrounds' == $return ) {
				return $backgrounds;
			} elseif ( 'borders' == $return ) {
				return $borders;
			} elseif ( 'gradients' == $return ) {
				return $gradients;
			}
		}

		// Generates the CSS output
		public static function generate( $output ) {

			// Get custom accent
			$default_accent = '#ff9900';
			$custom_accent  = edukul_get_mod( 'accent_color' );

			// Return if accent color is empty or equal to default
			if ( ! $custom_accent || ( $default_accent == $custom_accent ) )
				return $output;

			// Define css var
			$css = '';

			// Get arrays
			$texts       = self::arrays( 'texts' );
			$backgrounds = self::arrays( 'backgrounds' );
			$borders     = self::arrays( 'borders' );
			$gradients    = self::arrays( 'gradients' );

			// Texts
			if ( ! empty( $texts ) )
				$css .= implode( ',', $texts ) .'{color:'. $custom_accent .';}';

			// Backgrounds
			if ( ! empty( $backgrounds ) )
				$css .= implode( ',', $backgrounds ) .'{background-color:'. $custom_accent .';}';

			// Borders
			if ( ! empty( $borders ) ) {
				foreach ( $borders as $key => $val ) {
					if ( is_array( $val ) ) {
						$css .= $key .'{';
						foreach ( $val as $key => $val ) {
							$css .= 'border-'. $val .'-color:'. $custom_accent .';';
						}
						$css .= '}'; 
					} else {
						$css .= $val .'{border-color:'. $custom_accent .';}';
					}
				}
			}

			// Gradients
			if ( ! empty( $gradients ) )
				$css .= implode( ',', $gradients ) .'{background: '. edukul_hex2rgba($custom_accent, 1) .';background: -moz-linear-gradient(left, '. edukul_hex2rgba($custom_accent, 1) .' 0%, '. edukul_hex2rgba($custom_accent, 0.3) .' 100%);background: -webkit-linear-gradient( left, '. edukul_hex2rgba($custom_accent, 1) .' 0%, '. edukul_hex2rgba($custom_accent, 0.3) .' 100% );background: linear-gradient(to right, '. edukul_hex2rgba($custom_accent, 1) .' 0%, '. edukul_hex2rgba($custom_accent, 0.3) .' 100%) !important;}';

			// Return CSS
			if ( ! empty( $css ) )
				$output .= '/*ACCENT COLOR*/'. $css;

			// Return output css
			return $output;
		}
	}
}

new Edukul_Accent_Color();