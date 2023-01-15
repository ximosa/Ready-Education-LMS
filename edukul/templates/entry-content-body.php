<?php
/**
 * Entry Content / Body
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() ) {
	echo '<div class="post-content clearfix">';
	
	the_content();

	wp_link_pages( array(
		'before'      => '<p class="page-links">' . esc_html__( 'Pages:', 'edukul' ),
		'after'       => '</p>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

	echo '</div>';

} else {
	echo '<div class="post-content post-excerpt clearfix">';

	$content_style = edukul_get_mod( 'blog_content_style', 'style-1' );
	if ( $content_style == 'style-1' && ! is_search() ) {
		the_content();
	} else { the_excerpt(); }

	wp_link_pages( array(
		'before'      => '<p class="page-links">' . esc_html__( 'Pages:', 'edukul' ),
		'after'       => '</p>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

	echo '</div>';
} ?>