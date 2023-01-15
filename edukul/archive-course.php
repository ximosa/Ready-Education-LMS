<?php get_header(); ?>

<div id="content-wrap" class="edukul-container">
    <div id="site-content" class="site-content archive-course clearfix">
        <div id="inner-content" class="inner-content-wrap">

			<?php if ( have_posts() ) : ?>

	        	<div class="edukul-courses style-3">
					<?php

					while ( have_posts() ) : the_post();

						if ( $post->post_type == 'edr_course' ) {
							Edr_View::template_part( 'content', 'course' );
						}
					endwhile; ?>
				</div>

			<?php wp_reset_postdata(); ?>

			<?php edukul_pagination(); ?>
			
			<?php endif; ?>

        </div><!-- /#inner-content -->
    </div><!-- /#site-content -->

</div><!-- /#content-wrap -->

<?php get_footer(); ?>