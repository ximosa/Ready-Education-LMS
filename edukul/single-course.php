<?php get_header(); ?>

<div id="content-wrap" class="edukul-container">
    <div id="site-content" class="site-content single-course clearfix">
        <div id="inner-content" class="inner-content-wrap">

			<div class="course-detail-wrap">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'educator/content', 'single-course' );
				endwhile; ?>
			</div>

        </div><!-- /#inner-content -->
    </div><!-- /#site-content -->

    <?php get_sidebar(); ?>
</div><!-- /#content-wrap -->

<?php get_footer(); ?>
