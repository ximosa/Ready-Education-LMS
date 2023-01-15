<?php
/**
 * Entry Search
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<div class="post-content-archive-wrap clearfix">
		<div class="post-content-wrap search-result">
			<?php
			get_template_part( 'templates/entry-content-title' );
			printf( '<div class="custom-post-date">%1$s</div>', get_the_date() );
			the_excerpt();
			?>
		</div><!-- /.post-content-wrap -->
	</div><!-- /.post-content-archive-wrap -->
</article><!-- /.hentry -->