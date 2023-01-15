<?php
/**
 * Entry Content / Tags
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! edukul_get_mod( 'blog_single_tags', true ) )
	return;

$text = edukul_get_mod( 'blog_single_tags_text', '' );
if ( has_tag() ) {
	echo '<div class="post-tags clearfix">';
	echo '<span class="text">'. esc_html__( 'Tags: ', 'edukul' ) .'</span>';
	the_tags( esc_html( $text ),', ' );
	echo '</div>';
}

