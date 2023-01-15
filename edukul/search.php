<?php get_header(); 

if ( isset($_GET['post_type']) && defined('EDR_PT_COURSE') && $_GET['post_type'] == EDR_PT_COURSE ) {
	get_template_part( 'search-course' );
} else {
?>
    <div id="content-wrap" class="edukul-container">
		<?php if ( have_posts() ) : ?>
	        <div id="site-content" class="site-content clearfix">
	            <div id="inner-content" class="inner-content-wrap">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'templates/entry-search' ); ?>
					<?php endwhile; ?>
					<?php edukul_pagination(); ?>
	            </div><!-- /#inner-content -->
	        </div><!-- /#site-content -->

			<?php get_sidebar(); ?>
        <?php else: ?>
			<div class="search-not-found no-results">
				<div class="no-results-content">
					<div class="no-results-title">
						<h1><?php esc_html_e( 'Nothing Found', 'edukul' ); ?></h1>
					</div>
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'edukul' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- /.no-results -->
		<?php endif; ?>
    </div><!-- /#content-wrap -->

<?php } ?>    
<?php get_footer(); ?>



