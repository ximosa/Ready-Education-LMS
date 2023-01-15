<?php get_header(); ?>

<div id="content-wrap" class="edukul-container">
    <div id="site-content" class="site-content single-lesson clearfix">
        <div id="inner-content" class="inner-content-wrap">

			<div class="lesson-detail-wrap">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'educator/content-lesson' );
				endwhile; ?>
			</div>

        </div><!-- /#inner-content -->
    </div><!-- /#site-content -->

</div><!-- /#content-wrap -->

<?php get_footer(); ?>